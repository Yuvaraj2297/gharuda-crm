/**
 * Gharuda CRM - Organization Calendar Page Script
 * File: assets/js/pages/organization-calendar.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
/* Everything above is static HTML. This script only shows / hides things on click. */
(function () {
    var wrap    = document.getElementById('calWrap');
    var months  = wrap.querySelectorAll('.cal-month');
    var labels  = wrap.querySelectorAll('.cal-month-label');
    var prevBtn = document.getElementById('calPrev');
    var nextBtn = document.getElementById('calNext');
    var current = 0, todayIdx = 0;

    months.forEach(function (m, i) { if (m.classList.contains('active')) current = todayIdx = i; });

    /* ---------- Month navigation: show one month, hide the rest ---------- */
    function showMonth(i) {
        current = Math.max(0, Math.min(months.length - 1, i));
        months.forEach(function (m, k) { m.classList.toggle('active', k === current); });
        labels.forEach(function (l, k) { l.classList.toggle('active', k === current); });
        prevBtn.disabled = current === 0;
        nextBtn.disabled = current === months.length - 1;
    }
    prevBtn.addEventListener('click', function () { showMonth(current - 1); });
    nextBtn.addEventListener('click', function () { showMonth(current + 1); });
    document.getElementById('calToday').addEventListener('click', function () { showMonth(todayIdx); });

    /* ---------- View tabs: show Leave / Shift chips (click the active tab again = show all) ---------- */
    var tabs = document.querySelectorAll('#calViewTabs .cal-view-tab');
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var status = tab.getAttribute('data-status');
            if (wrap.getAttribute('data-view') === status) {
                wrap.setAttribute('data-view', '');
                tab.classList.remove('active');
            } else {
                wrap.setAttribute('data-view', status);
                tabs.forEach(function (t) { t.classList.toggle('active', t === tab); });
            }
        });
    });

    /* ---------- Filter panel show / hide ---------- */
    var filterBtn = document.getElementById('calFilterBtn');
    var filterPanel = document.getElementById('calFilterPanel');
    filterBtn.addEventListener('click', function () {
        filterPanel.classList.toggle('show');
        filterBtn.classList.toggle('active');
    });

    /* ---------- Shift modal: a shift chip shows only that shift's rows
       (uses the table's own search box, click the chip again to show all) ---------- */
    document.addEventListener('click', function (e) {
        var chip = e.target.closest('.sh-shift-chip');
        if (!chip) return;
        var body = chip.closest('.modal-body');
        var turnOn = !chip.classList.contains('active');
        body.querySelectorAll('.sh-shift-chip').forEach(function (c) { c.classList.remove('active'); });
        if (turnOn) chip.classList.add('active');
        var search = body.querySelector('.mt-search-input');
        if (search) {
            search.value = turnOn ? chip.getAttribute('data-shift') : '';
            search.dispatchEvent(new Event('input'));
        }
    });
})();
