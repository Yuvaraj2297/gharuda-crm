// date and time picker

document.addEventListener("DOMContentLoaded", function () {
  /* ======================================
     MONTHS / WEEKDAYS (shared, read-only)
  ====================================== */

  const months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December",
  ];

  const weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

  /* ======================================
     SHARED VALIDATION HELPERS
     (used by both the single date-picker
     and the range date-picker below)
  ====================================== */

  /*
      Blocks invalid day/month digits AS THEY ARE TYPED
      (day can never become 32+ or start with a digit >3;
      month can never become 13+ or start with a digit >1).
      Splits the raw digit stream into repeating DD(2) MM(2) YYYY(4)
      segments — pass segmentCount = 1 for a single date, 2 for a
      "date to date" range. Any keystroke that would push a segment
      out of range is simply dropped.
  */
  function sanitizeDateDigits(raw, segmentCount) {
    const oneDate = [2, 2, 4]; // DD MM YYYY
    let segmentLens = [];
    for (let i = 0; i < segmentCount; i++) segmentLens = segmentLens.concat(oneDate);

    let result = "";
    let segIdx = 0;
    let segDigits = "";

    for (let i = 0; i < raw.length; i++) {
      if (segIdx >= segmentLens.length) break;

      const ch = raw[i];
      const digit = Number(ch);
      const posInSeg = segDigits.length;
      const segType = segIdx % 3; // 0 = day, 1 = month, 2 = year
      let accept = true;

      if (segType === 0) { // DD
        if (posInSeg === 0) {
          if (digit > 3) accept = false;
        } else {
          const val = Number(segDigits[0]) * 10 + digit;
          if (val < 1 || val > 31) accept = false;
        }
      } else if (segType === 1) { // MM
        if (posInSeg === 0) {
          if (digit > 1) accept = false;
        } else {
          const val = Number(segDigits[0]) * 10 + digit;
          if (val < 1 || val > 12) accept = false;
        }
      }
      // segType === 2 (YYYY): no digit-level restriction

      if (!accept) continue; // drop this keystroke, keep reading the rest

      segDigits += ch;

      if (segDigits.length === segmentLens[segIdx]) {
        result += segDigits;
        segIdx++;
        segDigits = "";
      }
    }

    result += segDigits; // keep whatever's left of an in-progress segment
    return result;
  }

  /*
      Catches combinations that pass the digit-level check above but
      are still impossible real dates (e.g. 31-02-2026, 30-02-2024).
      Works on ONE 8-digit chunk at a time; once a full date is formed
      and it doesn't round-trip through the JS Date object, the last
      typed digit of that chunk is dropped.
  */
  function trimInvalidDateChunk(chunk) {
    while (chunk.length === 8) {
      const day = Number(chunk.substring(0, 2));
      const month = Number(chunk.substring(2, 4)) - 1;
      const year = Number(chunk.substring(4, 8));
      if (year < 1) { chunk = chunk.substring(0, chunk.length - 1); continue; }
      const dt = new Date(year, month, day);
      if (dt.getDate() === day && dt.getMonth() === month && dt.getFullYear() === year) break;
      chunk = chunk.substring(0, chunk.length - 1);
    }
    return chunk;
  }

  function maskPart(v) {
    let value = v;
    if (value.length > 2) value = value.substring(0, 2) + "-" + value.substring(2);
    if (value.length > 5) value = value.substring(0, 5) + "-" + value.substring(5);
    return value;
  }

  function parsePart(v) {
    const day = Number(v.substring(0, 2));
    const month = Number(v.substring(2, 4)) - 1;
    const year = Number(v.substring(4, 8));
    if (year < 1 || year > 9999) return null;
    const dt = new Date(year, month, day);
    if (dt.getDate() === day && dt.getMonth() === month && dt.getFullYear() === year) return dt;
    return null;
  }

  /* ======================================
     INIT EVERY SINGLE .date-picker ON THE PAGE
     (skips .date-range-picker — that one is
     handled by initDateRangePicker below)
  ====================================== */

  document.querySelectorAll(".date-picker:not(.date-range-picker)").forEach(function (datePicker) {
    initDatePicker(datePicker);
  });

  function initDatePicker(datePicker) {
    /* Each instance gets its OWN scoped state + elements */

    const dateInput = datePicker.querySelector(".date-input");

    const today = new Date();

    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();
    let selectedDate = null;

    let calendarDropdown;

    /* ==================================
       CREATE CALENDAR
    ================================== */

    function createCalendar() {
      calendarDropdown = document.createElement("div");
      calendarDropdown.className = "calendar-dropdown";
      calendarDropdown.style.display = "none";

      calendarDropdown.innerHTML = `
        <div class="calendar-header">
          <div class="month-year-wrapper">
            <div class="custom-select">
              <input type="text" class="month-input" autocomplete="off">
              <span class="select-arrow">▼</span>
              <div class="options-dropdown month-dropdown"></div>
            </div>
            <div class="custom-select">
              <input type="text" class="year-input" maxlength="4" autocomplete="off">
              <span class="select-arrow">▼</span>
              <div class="options-dropdown year-dropdown"></div>
            </div>
          </div>
          <div class="navigation">
            <button type="button" class="nav-btn prev-month">‹</button>
            <button type="button" class="nav-btn next-month">›</button>
          </div>
        </div>

        <div class="weekdays">
          ${weekdays.map(function (day) {
        return `<div class="weekday">${day}</div>`;
      }).join("")}
        </div>

        <div class="days"></div>

        <div class="calendar-footer">
          <button type="button" class="footer-btn today-btn">Today</button>
          <button type="button" class="footer-btn clear-btn">Clear</button>
        </div>
      `;

      datePicker.appendChild(calendarDropdown);

      initializeCalendarEvents();
    }

    /* ==================================
       EVENTS (all scoped to calendarDropdown)
    ================================== */

    function initializeCalendarEvents() {
      const monthInput = calendarDropdown.querySelector(".month-input");
      const yearInput = calendarDropdown.querySelector(".year-input");
      const monthDropdown = calendarDropdown.querySelector(".month-dropdown");
      const yearDropdown = calendarDropdown.querySelector(".year-dropdown");
      const prevMonth = calendarDropdown.querySelector(".prev-month");
      const nextMonth = calendarDropdown.querySelector(".next-month");
      const todayBtn = calendarDropdown.querySelector(".today-btn");
      const clearBtn = calendarDropdown.querySelector(".clear-btn");

      monthInput.addEventListener("focus", function () {
        renderMonthOptions();
        monthDropdown.style.display = "block";
      });

      monthInput.addEventListener("input", function () {
        renderMonthOptions(this.value);
        monthDropdown.style.display = "block";
      });

      yearInput.addEventListener("focus", function () {
        renderYearOptions();
        yearDropdown.style.display = "block";
      });

      yearInput.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, "").substring(0, 4);
        renderYearOptions(this.value);
        yearDropdown.style.display = "block";

        if (this.value.length === 4) {
          currentYear = Number(this.value);
          renderCalendar();
        }
      });

      prevMonth.addEventListener("click", function () {
        currentMonth--;
        if (currentMonth < 0) {
          currentMonth = 11;
          currentYear--;
        }
        renderCalendar();
      });

      nextMonth.addEventListener("click", function () {
        currentMonth++;
        if (currentMonth > 11) {
          currentMonth = 0;
          currentYear++;
        }
        renderCalendar();
      });

      todayBtn.addEventListener("click", function () {
        selectDate(new Date());
      });

      clearBtn.addEventListener("click", function () {
        dateInput.value = "";
        selectedDate = null;
        currentMonth = today.getMonth();
        currentYear = today.getFullYear();
        renderCalendar();
      });

        document.addEventListener("click", function (event) {
          const path = event.composedPath();
          calendarDropdown.querySelectorAll(".custom-select").forEach(function (select) {
            if (!path.includes(select)) {
              select.querySelector(".options-dropdown").style.display = "none";
            }
          });
        });

    }

    /* ==================================
       OPEN / CLOSE
    ================================== */

    function openCalendar() {
      calendarDropdown.style.display = "block";
      renderCalendar();
    }

    function closeCalendar() {
      calendarDropdown.style.display = "none";
      calendarDropdown.querySelector(".month-dropdown").style.display = "none";
      calendarDropdown.querySelector(".year-dropdown").style.display = "none";
    }

    dateInput.addEventListener("focus", function () {
      openCalendar();
    });

    /* ==================================
       DATE INPUT TYPING (DD-MM-YYYY)
       invalid day/month digits are blocked as
       they're typed (see sanitizeDateDigits /
       trimInvalidDateChunk near the top of the file)
    ================================== */

    dateInput.addEventListener("input", function () {
      const rawDigits = this.value.replace(/\D/g, "").substring(0, 8);
      let value = trimInvalidDateChunk(sanitizeDateDigits(rawDigits, 1));

      if (value.length > 2) {
        value = value.substring(0, 2) + "-" + value.substring(2);
      }
      if (value.length > 5) {
        value = value.substring(0, 5) + "-" + value.substring(5);
      }

      this.value = value;

      if (value.length === 10) {
        const parts = value.split("-");
        const day = Number(parts[0]);
        const month = Number(parts[1]) - 1;
        const year = Number(parts[2]);

        if (year < 1 || year > 9999) return;

        const enteredDate = new Date(year, month, day);

        if (
          enteredDate.getDate() === day &&
          enteredDate.getMonth() === month &&
          enteredDate.getFullYear() === year
        ) {
          selectedDate = enteredDate;
          currentMonth = month;
          currentYear = year;
          renderCalendar();
        }
      }
    });

    /* ==================================
       HELPERS
    ================================== */

    function formatDate(date) {
      const day = String(date.getDate()).padStart(2, "0");
      const month = String(date.getMonth() + 1).padStart(2, "0");
      const year = String(date.getFullYear()).padStart(4, "0");
      return day + "-" + month + "-" + year;
    }

    function selectDate(date) {
      selectedDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());
      currentMonth = selectedDate.getMonth();
      currentYear = selectedDate.getFullYear();
      dateInput.value = formatDate(selectedDate);
      dateInput.dispatchEvent(new Event("change", { bubbles: true }));
      renderCalendar();
    }

    function renderMonthOptions(search = "") {
      const monthDropdown = calendarDropdown.querySelector(".month-dropdown");
      monthDropdown.innerHTML = "";

      months.forEach(function (month, index) {
        if (search && !month.toLowerCase().includes(search.toLowerCase())) return;

        const option = document.createElement("div");
        option.className = "option";
        option.textContent = month;

        if (index === currentMonth) option.classList.add("active");

        option.addEventListener("click", function () {
          currentMonth = index;
          monthDropdown.style.display = "none";
          renderCalendar();
        });

        monthDropdown.appendChild(option);
      });
    }

    function renderYearOptions(search = "") {
      const yearDropdown = calendarDropdown.querySelector(".year-dropdown");
      yearDropdown.innerHTML = "";

      let startYear, endYear;

      if (search) {
        startYear = 1;
        endYear = 9999;
      } else {
        startYear = Math.max(1, currentYear - 50);
        endYear = Math.min(9999, currentYear + 50);
      }

      for (let year = startYear; year <= endYear; year++) {
        if (search && !String(year).includes(search)) continue;

        const option = document.createElement("div");
        option.className = "option";
        option.textContent = year;

        if (year === currentYear) option.classList.add("active");

        option.addEventListener("click", function () {
          currentYear = year;
          yearDropdown.style.display = "none";
          renderCalendar();
        });

        yearDropdown.appendChild(option);
      }
    }

    function renderCalendar() {
      const daysContainer = calendarDropdown.querySelector(".days");
      const monthInput = calendarDropdown.querySelector(".month-input");
      const yearInput = calendarDropdown.querySelector(".year-input");

      daysContainer.innerHTML = "";
      monthInput.value = months[currentMonth];
      yearInput.value = currentYear;

      const firstDay = new Date(currentYear, currentMonth, 1).getDay();
      const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
      const previousMonthDays = new Date(currentYear, currentMonth, 0).getDate();

      for (let i = firstDay - 1; i >= 0; i--) {
        const date = previousMonthDays - i;
        const element = document.createElement("div");
        element.className = "day other-month";
        element.textContent = date;

        const previousDate = new Date(currentYear, currentMonth - 1, date);
        element.addEventListener("click", function () {
          selectDate(previousDate);
        });

        daysContainer.appendChild(element);
      }

      for (let date = 1; date <= daysInMonth; date++) {
        const element = document.createElement("div");
        element.className = "day";
        element.textContent = date;

        const currentDate = new Date(currentYear, currentMonth, date);

        if (
          date === today.getDate() &&
          currentMonth === today.getMonth() &&
          currentYear === today.getFullYear()
        ) {
          element.classList.add("today");
        }

        if (
          selectedDate &&
          date === selectedDate.getDate() &&
          currentMonth === selectedDate.getMonth() &&
          currentYear === selectedDate.getFullYear()
        ) {
          element.classList.add("selected");
        }

        element.addEventListener("click", function () {
          selectDate(currentDate);
        });

        daysContainer.appendChild(element);
      }

      const totalCells = firstDay + daysInMonth;
      const remainingCells = Math.ceil(totalCells / 7) * 7 - totalCells;

      for (let date = 1; date <= remainingCells; date++) {
        const element = document.createElement("div");
        element.className = "day other-month";
        element.textContent = date;

        const nextDate = new Date(currentYear, currentMonth + 1, date);
        element.addEventListener("click", function () {
          selectDate(nextDate);
        });

        daysContainer.appendChild(element);
      }
    }

    /* Outside click closes ONLY this instance */

    document.addEventListener("click", function (event) {
      const path = event.composedPath();
      if (!path.includes(datePicker)) {
        closeCalendar();
      }
    });

    createCalendar();
  }

  /* ======================================
     INIT EVERY .date-range-picker ON THE PAGE
     — dual calendar, "DD-MM-YYYY to DD-MM-YYYY"
  ====================================== */

  document.querySelectorAll(".date-range-picker").forEach(function (datePicker) {
    initDateRangePicker(datePicker);
  });

  function initDateRangePicker(datePicker) {
    const dateInput = datePicker.querySelector(".date-input");
    const today = new Date();

    // two independent panels; panel 1 defaults to "today", panel 2 to "next month"
    let panelStates = [
      { month: today.getMonth(), year: today.getFullYear() },
      nextMonthOf(today.getMonth(), today.getFullYear())
    ];

    let rangeStart = null;
    let rangeEnd = null;
    let calendarDropdown;

    function nextMonthOf(month, year) {
      let m = month + 1, y = year;
      if (m > 11) { m = 0; y++; }
      return { month: m, year: y };
    }

    function sameDate(a, b) {
      return a && b && a.getFullYear() === b.getFullYear() &&
             a.getMonth() === b.getMonth() && a.getDate() === b.getDate();
    }

    function formatDate(date) {
      const day = String(date.getDate()).padStart(2, "0");
      const month = String(date.getMonth() + 1).padStart(2, "0");
      const year = String(date.getFullYear()).padStart(4, "0");
      return day + "-" + month + "-" + year;
    }

    /* ---------------- build markup ---------------- */

    function panelMarkup(idx) {
      return `
        <div class="calendar-panel" data-panel="${idx}">
          <div class="calendar-header">
            <div class="month-year-wrapper">
              <div class="custom-select">
                <input type="text" class="month-input" autocomplete="off">
                <span class="select-arrow">▼</span>
                <div class="options-dropdown month-dropdown"></div>
              </div>
              <div class="custom-select">
                <input type="text" class="year-input" maxlength="4" autocomplete="off">
                <span class="select-arrow">▼</span>
                <div class="options-dropdown year-dropdown"></div>
              </div>
            </div>
            <div class="navigation">
              <button type="button" class="nav-btn prev-month">‹</button>
              <button type="button" class="nav-btn next-month">›</button>
            </div>
          </div>
          <div class="weekdays">
            ${weekdays.map(d => `<div class="weekday">${d}</div>`).join("")}
          </div>
          <div class="days"></div>
        </div>`;
    }

    function updatePanelDisabledState() {
      const panel1 = calendarDropdown.querySelector('.calendar-panel[data-panel="1"]');
      if (!rangeStart) {
        panel1.classList.add("disabled");
      } else {
        panel1.classList.remove("disabled");
      }
    }

    function createCalendars() {
      calendarDropdown = document.createElement("div");
      calendarDropdown.className = "calendar-dropdown range-dropdown";
      calendarDropdown.style.display = "none";

      calendarDropdown.innerHTML = `
        <div class="range-panels">
          ${panelMarkup(0)}
          ${panelMarkup(1)}
        </div>
        <div class="calendar-footer">
          <button type="button" class="footer-btn today-btn">Today</button>
          <button type="button" class="footer-btn clear-btn">Clear</button>
          <button type="button" class="footer-btn apply-btn">Apply</button>
        </div>
      `;

      datePicker.appendChild(calendarDropdown);

      [0, 1].forEach(initPanelEvents);
      initFooterEvents();
      renderAll();
      updatePanelDisabledState();

      document.addEventListener("click", function (event) {
        const path = event.composedPath();
        calendarDropdown.querySelectorAll(".custom-select").forEach(function (select) {
          if (!path.includes(select)) {
            select.querySelector(".options-dropdown").style.display = "none";
          }
        });
      });

    }

    /* ---------------- panel events (month/year select + nav) ---------------- */

    function initPanelEvents(idx) {
      const panelEl = calendarDropdown.querySelector(`.calendar-panel[data-panel="${idx}"]`);
      const monthInput = panelEl.querySelector(".month-input");
      const yearInput = panelEl.querySelector(".year-input");
      const monthDropdown = panelEl.querySelector(".month-dropdown");
      const yearDropdown = panelEl.querySelector(".year-dropdown");
      const prevMonth = panelEl.querySelector(".prev-month");
      const nextMonth = panelEl.querySelector(".next-month");

      monthInput.addEventListener("focus", function () {
        if (idx === 1 && !rangeStart) return;
        closeAllOptionDropdowns();
        renderMonthOptions(idx);
        monthDropdown.style.display = "block";
      });
      monthInput.addEventListener("input", function () {
        if (idx === 1 && !rangeStart) return;
        renderMonthOptions(idx, this.value);
        monthDropdown.style.display = "block";
      });

      yearInput.addEventListener("focus", function () {
        if (idx === 1 && !rangeStart) return; 
        closeAllOptionDropdowns();
        renderYearOptions(idx);
        yearDropdown.style.display = "block";
      });
      yearInput.addEventListener("input", function () {
        if (idx === 1 && !rangeStart) return;
        this.value = this.value.replace(/\D/g, "").substring(0, 4);
        renderYearOptions(idx, this.value);
        yearDropdown.style.display = "block";
        if (this.value.length === 4) {
          panelStates[idx].year = Number(this.value);
          renderPanel(idx);
        }
      });

      prevMonth.addEventListener("click", function () {
        if (idx === 1 && !rangeStart) return; 
        panelStates[idx].month--;
        if (panelStates[idx].month < 0) {
          panelStates[idx].month = 11;
          panelStates[idx].year--;
        }
        renderPanel(idx);
      });

      nextMonth.addEventListener("click", function () {
        if (idx === 1 && !rangeStart) return;
        panelStates[idx].month++;
        if (panelStates[idx].month > 11) {
          panelStates[idx].month = 0;
          panelStates[idx].year++;
        }
        renderPanel(idx);
      });
    }

    function initFooterEvents() {
      calendarDropdown.querySelector(".today-btn").addEventListener("click", function () {
        rangeStart = new Date(today.getFullYear(), today.getMonth(), today.getDate());
        rangeEnd = null;
        panelStates = [
          { month: today.getMonth(), year: today.getFullYear() },
          nextMonthOf(today.getMonth(), today.getFullYear())
        ];
        updateInputValue();
        renderAll();
        updatePanelDisabledState(); 
      });

      calendarDropdown.querySelector(".clear-btn").addEventListener("click", function () {
        rangeStart = null;
        rangeEnd = null;
        dateInput.value = "";
        renderAll();
        updatePanelDisabledState(); 
      });

      calendarDropdown.querySelector(".apply-btn").addEventListener("click", function () {
        closeCalendar();
      });
    }

    function closeAllOptionDropdowns() {
      calendarDropdown.querySelectorAll(".options-dropdown").forEach(d => d.style.display = "none");
    }

    /* ---------------- rendering ---------------- */

    function renderMonthOptions(idx, search = "") {
      const panelEl = calendarDropdown.querySelector(`.calendar-panel[data-panel="${idx}"]`);
      const monthDropdown = panelEl.querySelector(".month-dropdown");
      monthDropdown.innerHTML = "";

      months.forEach(function (month, mIdx) {
        if (search && !month.toLowerCase().includes(search.toLowerCase())) return;
        const option = document.createElement("div");
        option.className = "option";
        option.textContent = month;
        if (mIdx === panelStates[idx].month) option.classList.add("active");
        option.addEventListener("click", function () {
          panelStates[idx].month = mIdx;
          monthDropdown.style.display = "none";
          renderPanel(idx);
        });
        monthDropdown.appendChild(option);
      });
    }

    function renderYearOptions(idx, search = "") {
      const panelEl = calendarDropdown.querySelector(`.calendar-panel[data-panel="${idx}"]`);
      const yearDropdown = panelEl.querySelector(".year-dropdown");
      yearDropdown.innerHTML = "";

      let startYear, endYear;
      const currentYear = panelStates[idx].year;
      if (search) { startYear = 1; endYear = 9999; }
      else {
        startYear = Math.max(1, currentYear - 50);
        endYear = Math.min(9999, currentYear + 50);
      }

      for (let year = startYear; year <= endYear; year++) {
        if (search && !String(year).includes(search)) continue;
        const option = document.createElement("div");
        option.className = "option";
        option.textContent = year;
        if (year === currentYear) option.classList.add("active");
        option.addEventListener("click", function () {
          panelStates[idx].year = year;
          yearDropdown.style.display = "none";
          renderPanel(idx);
        });
        yearDropdown.appendChild(option);
      }
    }

    function renderPanel(idx) {
      const panelEl = calendarDropdown.querySelector(`.calendar-panel[data-panel="${idx}"]`);
      const daysContainer = panelEl.querySelector(".days");
      const monthInput = panelEl.querySelector(".month-input");
      const yearInput = panelEl.querySelector(".year-input");

      const { month: currentMonth, year: currentYear } = panelStates[idx];

      daysContainer.innerHTML = "";
      monthInput.value = months[currentMonth];
      yearInput.value = currentYear;

      const firstDay = new Date(currentYear, currentMonth, 1).getDay();
      const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
      const previousMonthDays = new Date(currentYear, currentMonth, 0).getDate();

      function makeDay(dateObj, isOtherMonth) {
        const element = document.createElement("div");
        element.className = "day" + (isOtherMonth ? " other-month" : "");
        element.textContent = dateObj.getDate();

        if (!isOtherMonth &&
            dateObj.getDate() === today.getDate() &&
            dateObj.getMonth() === today.getMonth() &&
            dateObj.getFullYear() === today.getFullYear()) {
          element.classList.add("today");
        }

        if (sameDate(dateObj, rangeStart)) element.classList.add("range-start");
        if (sameDate(dateObj, rangeEnd)) element.classList.add("range-end");
        if (rangeStart && rangeEnd && dateObj > rangeStart && dateObj < rangeEnd) {
          element.classList.add("in-range");
        }

        element.addEventListener("click", function () {
          if (idx === 1 && !rangeStart) return;
          handleDayClick(dateObj);
        });

        return element;
      }

      for (let d = firstDay - 1; d >= 0; d--) {
        const date = previousMonthDays - d;
        daysContainer.appendChild(makeDay(new Date(currentYear, currentMonth - 1, date), true));
      }
      for (let date = 1; date <= daysInMonth; date++) {
        daysContainer.appendChild(makeDay(new Date(currentYear, currentMonth, date), false));
      }
      const totalCells = firstDay + daysInMonth;
      const remainingCells = Math.ceil(totalCells / 7) * 7 - totalCells;
      for (let date = 1; date <= remainingCells; date++) {
        daysContainer.appendChild(makeDay(new Date(currentYear, currentMonth + 1, date), true));
      }
    }

    function renderAll() {
      renderPanel(0);
      renderPanel(1);
    }

    function handleDayClick(date) {
      if (!rangeStart || (rangeStart && rangeEnd)) {
        rangeStart = date;
        rangeEnd = null;
      } else {
        if (date < rangeStart) {
          rangeEnd = rangeStart;
          rangeStart = date;
        } else {
          rangeEnd = date;
        }
      }
      updateInputValue();
      renderAll();
      updatePanelDisabledState();
    }

    function updateInputValue() {
      if (rangeStart && rangeEnd) {
        dateInput.value = formatDate(rangeStart) + " to " + formatDate(rangeEnd);
      } else if (rangeStart) {
        dateInput.value = formatDate(rangeStart) + " to ";
      } else {
        dateInput.value = "";
      }
    }

    /* ---------------- typing: DD-MM-YYYY to DD-MM-YYYY ----------------
       invalid day/month digits are blocked as they're typed, and
       impossible full dates (e.g. 31-02-2026) get trimmed too — same
       rules as the single date-picker, just applied to 2 chunks.
    ------------------------------------------------------------------ */

    dateInput.addEventListener("input", function () {
      const rawDigits = this.value.replace(/\D/g, "").substring(0, 16);
      const sanitized = sanitizeDateDigits(rawDigits, 2);

      const firstRaw = sanitized.substring(0, 8);
      const secondRaw = sanitized.substring(8, 16);

      const first = trimInvalidDateChunk(firstRaw);
      // only trim the 2nd chunk once the 1st is a fully valid, untouched 8 digits
      const second = first.length === 8 ? trimInvalidDateChunk(secondRaw) : "";

      const digits = first + second;

      let out = maskPart(first);
      if (digits.length > 8) out += " to " + maskPart(second);

      this.value = out;

      if (first.length === 8) {
        const d1 = parsePart(first);
        if (d1) {
          rangeStart = d1;
          panelStates[0] = { month: d1.getMonth(), year: d1.getFullYear() };
        }
      } else {
        rangeStart = null;
      }

      if (second.length === 8) {
        const d2 = parsePart(second);
        if (d2) {
          rangeEnd = d2;
          panelStates[1] = { month: d2.getMonth(), year: d2.getFullYear() };
        }
      } else {
        rangeEnd = null;
      }

      renderAll();
    });

    /* ---------------- open / close ---------------- */

    function openCalendar() {
      calendarDropdown.style.display = "block";
      renderAll();
    }

    function closeCalendar() {
      calendarDropdown.style.display = "none";
      closeAllOptionDropdowns();
    }

    dateInput.addEventListener("focus", openCalendar);

    document.addEventListener("click", function (event) {
      const path = event.composedPath();
      if (!path.includes(datePicker)) {
        closeCalendar();
      }
    });

    createCalendars();
  }
});

/* ============================================================
   TIME PICKER — same scoped-instance approach
   (unchanged — no changes needed here)
============================================================ */

function initTimePicker(timePicker) {
    if (timePicker._timePickerInit) return; // prevent double-init
    timePicker._timePickerInit = true;
    const timeInput = timePicker.querySelector(".time-input");
    if (!timeInput) return; // safety: no input found, skip

    const now = new Date();
    let selectedHour = now.getHours();
    let selectedMinute = now.getMinutes();

    // If input already has a value, parse it (supports "HH:MM" 24h or "HH:MM AM/PM")
    if (timeInput.value) {
      var existingVal = timeInput.value.trim();
      var ampmMatch = existingVal.match(/(\d{1,2}):(\d{2})\s*(AM|PM)/i);
      var plainMatch = existingVal.match(/^(\d{1,2}):(\d{2})$/);
      if (ampmMatch) {
        var h = parseInt(ampmMatch[1], 10);
        var m = parseInt(ampmMatch[2], 10);
        var ap = ampmMatch[3].toUpperCase();
        if (ap === 'PM' && h !== 12) h += 12;
        if (ap === 'AM' && h === 12) h = 0;
        selectedHour = h;
        selectedMinute = m;
      } else if (plainMatch) {
        selectedHour = parseInt(plainMatch[1], 10);
        selectedMinute = parseInt(plainMatch[2], 10);
      }
    }

    let selectedAmPm = selectedHour >= 12 ? "PM" : "AM";

    let displayHour = selectedHour % 12;
    if (displayHour === 0) displayHour = 12;

    let timeDropdown;

    function createTimePicker() {
      timeDropdown = document.createElement("div");
      timeDropdown.className = "time-dropdown";
      timeDropdown.style.display = "none";

      timeDropdown.innerHTML = `
        <div class="time-header">Select Time</div>

        <div class="time-select-wrapper">
          <div class="time-select">
            <input type="text" class="hour-input" maxlength="2"
              value="${String(displayHour).padStart(2, '0')}" autocomplete="off">
            <span class="select-arrow">▼</span>
            <div class="options-dropdown hour-dropdown"></div>
          </div>

          <span class="time-colon">:</span>

          <div class="time-select">
            <input type="text" class="minute-input" maxlength="2"
              value="${String(selectedMinute).padStart(2, '0')}" autocomplete="off">
            <span class="select-arrow">▼</span>
            <div class="options-dropdown minute-dropdown"></div>
          </div>

          <div class="time-select">
            <input type="text" class="ampm-input" value="${selectedAmPm}" autocomplete="off">
            <span class="select-arrow">▼</span>
            <div class="options-dropdown ampm-dropdown"></div>
          </div>
        </div>

        <div class="time-footer">
          <button type="button" class="footer-btn now-btn">Now</button>
          <button type="button" class="footer-btn clear-btn">Clear</button>
          <button type="button" class="footer-btn apply-btn">Apply</button>
        </div>
      `;

      timePicker.appendChild(timeDropdown);

      // If inside a modal/scrollable container, re-parent to body for proper z-index & overflow
      var isInModal = !!timePicker.closest('.modal');
      if (isInModal) {
        document.body.appendChild(timeDropdown);
        timeDropdown._modalAnchor = timePicker;
      }

      initializeTimeEvents();

      /*
          NOTE: intentionally NOT calling updateTimeInput() here.
          Otherwise the main input auto-fills with "now" as soon as
          the page loads, before the user picks anything.
      */
    }

    var _positionUpdater = null;

    function _positionDropdown() {
      var inputEl = timePicker.querySelector('.time-input');
      if (inputEl && timeDropdown._modalAnchor) {
        var rect = inputEl.getBoundingClientRect();
        timeDropdown.style.top = (rect.bottom + 4) + 'px';
        timeDropdown.style.left = rect.left + 'px';
        timeDropdown.style.minWidth = rect.width + 'px';
      }
    }

    function openTimePicker() {
      if (timeDropdown._modalAnchor) {
        // Position the dropdown relative to the input using getBoundingClientRect
        var inputEl = timePicker.querySelector('.time-input');
        if (inputEl) {
          var rect = inputEl.getBoundingClientRect();
          timeDropdown.style.position = 'fixed';
          timeDropdown.style.zIndex = '9999';
          timeDropdown.style.top = (rect.bottom + 4) + 'px';
          timeDropdown.style.left = rect.left + 'px';
          timeDropdown.style.minWidth = rect.width + 'px';
        }
        // Update position on scroll/resize
        if (!_positionUpdater) {
          _positionUpdater = _positionDropdown;
          document.addEventListener('scroll', _positionUpdater, true);
          window.addEventListener('resize', _positionUpdater);
        }
      }
      timeDropdown.style.display = "block";
    }

    function closeTimePicker() {
      timeDropdown.style.display = "none";
      closeAllDropdowns();
      if (_positionUpdater) {
        document.removeEventListener('scroll', _positionUpdater, true);
        window.removeEventListener('resize', _positionUpdater);
        _positionUpdater = null;
      }
    }

    function closeAllDropdowns() {
      timeDropdown.querySelectorAll(".options-dropdown").forEach(function (dropdown) {
        dropdown.style.display = "none";
      });
    }

    function updateTimeInput() {
      let hour = selectedHour % 12;
      if (hour === 0) hour = 12;

      const hourText = String(hour).padStart(2, "0");
      const minuteText = String(selectedMinute).padStart(2, "0");

      timeInput.value = hourText + ":" + minuteText + " " + selectedAmPm;
    }

    let typedValueIsValid = false;

    timeInput.addEventListener("input", function () {
      let raw = this.value.toUpperCase();

      /*
          Strip everything except digits and A/P/M/space.
          Colon is deliberately excluded here — we recompute and
          re-insert it automatically below, so the user never has
          to type it themselves.
      */

      raw = raw.replace(/[^0-9APM\s]/g, "");

      /*
          Split into the digit run (HHMM, max 4) and a trailing
          AM/PM letter run, e.g. "1200 PM" -> digits "1200", letters "PM"
      */

      const match = raw.match(/^(\d{0,4})\s*([APM]{0,2})$/);

      const digits = match ? match[1] : raw.replace(/[^0-9]/g, "").substring(0, 4);
      const letters = match ? match[2] : "";

      let formatted = digits;

      if (digits.length > 2) {
        formatted = digits.substring(0, 2) + ":" + digits.substring(2);
      }

      if (letters) {
        formatted += (formatted ? " " : "") + letters;
      }

      this.value = formatted;
      parseTypedTime(formatted);
    });

    /*
        NORMALIZE ON BLUR

        While the user is still typing we do NOT touch what they've
        typed (see parseTypedTime below). Once they leave the field,
        if what they typed was a valid time, reformat it neatly to
        "HH:MM AM/PM". If it was incomplete/invalid, leave their text
        alone so they can keep fixing it next time they focus.
    */

    timeInput.addEventListener("blur", function () {
      if (typedValueIsValid) {
        updateTimeInput();
      }
    });

    function parseTypedTime(value) {
      let clean = value.replace(/\s/g, "").toUpperCase();

      let ampm = "";
      if (clean.includes("AM")) {
        ampm = "AM";
        clean = clean.replace("AM", "");
      }
      if (clean.includes("PM")) {
        ampm = "PM";
        clean = clean.replace("PM", "");
      }

      clean = clean.replace(":", "");

      if (clean.length < 3) {
        typedValueIsValid = false;
        return;
      }

      let hour, minute;

      if (clean.length === 3) {
        hour = Number(clean.substring(0, 1));
        minute = Number(clean.substring(1));
      } else {
        hour = Number(clean.substring(0, 2));
        minute = Number(clean.substring(2));
      }

      if (hour < 1 || hour > 12) {
        typedValueIsValid = false;
        return;
      }
      if (minute < 0 || minute > 59) {
        typedValueIsValid = false;
        return;
      }

      /*
          Require AM/PM to be typed before treating this as a
          COMPLETE, valid time. Otherwise "103" (still mid-typing
          towards "10:30 PM") would wrongly count as done.
      */

      if (!ampm) {
        typedValueIsValid = false;
        /* still sync the dropdown so it tracks hour/minute as typed */
        selectedMinute = minute;
        if (selectedAmPm === "AM") {
          selectedHour = hour === 12 ? 0 : hour;
        } else {
          selectedHour = hour === 12 ? 12 : hour + 12;
        }
        updateDropdownFromState();
        return;
      }

      typedValueIsValid = true;

      selectedAmPm = ampm;
      selectedMinute = minute;

      if (ampm === "AM") {
        selectedHour = hour === 12 ? 0 : hour;
      } else {
        selectedHour = hour === 12 ? 12 : hour + 12;
      }

      /* Sync the dropdown fields only — main input keeps what user typed */
      updateDropdownFromState();
    }

    /* Updates just the hour/minute/AM-PM fields inside the open dropdown */

    function updateDropdownFromState() {
      const hourInput = timeDropdown.querySelector(".hour-input");
      const minuteInput = timeDropdown.querySelector(".minute-input");
      const ampmInput = timeDropdown.querySelector(".ampm-input");

      let hour = selectedHour % 12;
      if (hour === 0) hour = 12;

      hourInput.value = String(hour).padStart(2, "0");
      minuteInput.value = String(selectedMinute).padStart(2, "0");
      ampmInput.value = selectedAmPm;
    }

    function updatePickerInputs() {
      const hourInput = timeDropdown.querySelector(".hour-input");
      const minuteInput = timeDropdown.querySelector(".minute-input");
      const ampmInput = timeDropdown.querySelector(".ampm-input");

      let hour = selectedHour % 12;
      if (hour === 0) hour = 12;

      hourInput.value = String(hour).padStart(2, "0");
      minuteInput.value = String(selectedMinute).padStart(2, "0");
      ampmInput.value = selectedAmPm;

      updateTimeInput();
    }

    function initializeTimeEvents() {
      const hourInput = timeDropdown.querySelector(".hour-input");
      const minuteInput = timeDropdown.querySelector(".minute-input");
      const ampmInput = timeDropdown.querySelector(".ampm-input");
      const hourDropdown = timeDropdown.querySelector(".hour-dropdown");
      const minuteDropdown = timeDropdown.querySelector(".minute-dropdown");
      const ampmDropdown = timeDropdown.querySelector(".ampm-dropdown");
      const nowBtn = timeDropdown.querySelector(".now-btn");
      const clearBtn = timeDropdown.querySelector(".clear-btn");
      const applyBtn = timeDropdown.querySelector(".apply-btn");

      /*
          Close the hour/minute/AM-PM option lists when the user presses
          anywhere else inside the picker (header, colon, footer...).
          BUT never when the press is on a .time-select (its input or its
          option list) -- otherwise the list is hidden on "mousedown",
          before the browser fires "click" on the option, so the chosen
          option never reaches the main time input.
      */
      timeDropdown.addEventListener("mousedown", function (event) {
        if (event.target.closest(".time-select")) return;
        closeAllDropdowns();
      });

      hourInput.addEventListener("focus", function () {
        closeAllDropdowns();
        renderHourOptions();
        hourDropdown.style.display = "block";
      });

      hourInput.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, "").substring(0, 2);
        const hour = Number(this.value);

        if (hour >= 1 && hour <= 12) {
          if (selectedAmPm === "AM") {
            selectedHour = hour === 12 ? 0 : hour;
          } else {
            selectedHour = hour === 12 ? 12 : hour + 12;
          }
          updateTimeInput();
        }
      });

      minuteInput.addEventListener("focus", function () {
        closeAllDropdowns();
        renderMinuteOptions();
        minuteDropdown.style.display = "block";
      });

      minuteInput.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, "").substring(0, 2);
        const minute = Number(this.value);

        if (minute >= 0 && minute <= 59) {
          selectedMinute = minute;
          updateTimeInput();
        }
      });

      ampmInput.addEventListener("focus", function () {
        closeAllDropdowns();
        renderAmPmOptions();
        ampmDropdown.style.display = "block";
      });

      ampmInput.addEventListener("input", function () {
        this.value = this.value.toUpperCase();

        if (this.value === "AM" || this.value === "PM") {
          selectedAmPm = this.value;
          let hour = selectedHour % 12;
          if (hour === 0) hour = 12;

          if (this.value === "AM") {
            selectedHour = hour === 12 ? 0 : hour;
          } else {
            selectedHour = hour === 12 ? 12 : hour + 12;
          }
          updateTimeInput();
        }
      });

      nowBtn.addEventListener("click", function () {
        const current = new Date();
        selectedHour = current.getHours();
        selectedMinute = current.getMinutes();
        selectedAmPm = selectedHour >= 12 ? "PM" : "AM";

        updatePickerInputs();
        updateTimeInput();
      });

      clearBtn.addEventListener("click", function () {
        timeInput.value = "";
        hourInput.value = "";
        minuteInput.value = "";
        ampmInput.value = "";
        closeAllDropdowns();
      });

      applyBtn.addEventListener("click", function () {
        updateTimeInput();
        closeTimePicker();
      });
    }

    function renderHourOptions() {
      const dropdown = timeDropdown.querySelector(".hour-dropdown");
      dropdown.innerHTML = "";

      for (let hour = 1; hour <= 12; hour++) {
        const option = document.createElement("div");
        option.className = "option";
        option.textContent = String(hour).padStart(2, "0");

        const currentHour = selectedHour % 12 === 0 ? 12 : selectedHour % 12;
        if (hour === currentHour) option.classList.add("active");

        option.addEventListener("click", function (e) {
          if (e) e.stopPropagation();
          if (selectedAmPm === "AM") {
            selectedHour = hour === 12 ? 0 : hour;
          } else {
            selectedHour = hour === 12 ? 12 : hour + 12;
          }
          updatePickerInputs();
          closeAllDropdowns();
        });

        dropdown.appendChild(option);
      }
    }

    function renderMinuteOptions() {
      const dropdown = timeDropdown.querySelector(".minute-dropdown");
      dropdown.innerHTML = "";

      for (let minute = 0; minute <= 59; minute++) {
        const option = document.createElement("div");
        option.className = "option";
        option.textContent = String(minute).padStart(2, "0");

        if (minute === selectedMinute) option.classList.add("active");

        option.addEventListener("click", function (e) {
          if (e) e.stopPropagation();
          selectedMinute = minute;
          updatePickerInputs();
          closeAllDropdowns();
        });

        dropdown.appendChild(option);
      }
    }

    function renderAmPmOptions() {
      const dropdown = timeDropdown.querySelector(".ampm-dropdown");
      dropdown.innerHTML = "";

      ["AM", "PM"].forEach(function (value) {
        const option = document.createElement("div");
        option.className = "option";
        option.textContent = value;

        if (value === selectedAmPm) option.classList.add("active");

        option.addEventListener("click", function (e) {
          if (e) e.stopPropagation();
          selectedAmPm = value;
          const hour = selectedHour % 12;

          if (value === "AM") {
            selectedHour = hour === 12 ? 0 : hour;
          } else {
            selectedHour = hour === 12 ? 12 : hour + 12;
          }
          updatePickerInputs();
          closeAllDropdowns();
        });

        dropdown.appendChild(option);
      });
    }

    timeInput.addEventListener("focus", function () {
      openTimePicker();
    });

    document.addEventListener("pointerdown", function (event) {
      const path = event.composedPath();
      const clickedInsidePicker = path.includes(timePicker);
      const clickedInsideDropdown = timeDropdown && path.includes(timeDropdown);

      if (!clickedInsidePicker && !clickedInsideDropdown) {
        closeTimePicker();
      }
    });

    createTimePicker();
}

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".time-picker").forEach(function (timePicker) {
    initTimePicker(timePicker);
  });
});