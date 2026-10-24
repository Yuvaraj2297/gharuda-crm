// Employee Reports Table
// Features:
// 1. Show Entries
// 2. Search
// 3. Showing X-Y of Z
// 4. Pagination
// 5. No Records Found message

(function () {

  document.querySelectorAll('.js-report-table').forEach(function (reportTable) {

    // Prevent same table from being initialized twice
    if (reportTable.dataset.paginationInitialized === 'true') {
      return;
    }

    reportTable.dataset.paginationInitialized = 'true';


    // -----------------------------------------
    // CURRENT TABLE ELEMENTS
    // -----------------------------------------

    const tbody = reportTable.querySelector('#pgBody');
    const showSelect = reportTable.querySelector('#showEntries');
    const searchInput = reportTable.querySelector('#employeeSearch'); // may be null, that's OK
    const pgList = reportTable.querySelector('#pgList');
    const pgStart = reportTable.querySelector('#pgStart');
    const pgEnd = reportTable.querySelector('#pgEnd');
    const pgTotal = reportTable.querySelector('#pgTotal');


    // searchInput is NOT required anymore — pagination should work
    // even if the search box isn't present on the page.
    if (!tbody || !showSelect || !pgList) {
      return;
    }


    // -----------------------------------------
    // STORE ORIGINAL DATA ROWS ONLY
    // -----------------------------------------

    const rows = Array.from(
      tbody.children
    ).filter(function (row) {
      return (
        row.tagName.toLowerCase() === 'tr' &&
        !row.classList.contains('no-record-row')
      );
    });


    let currentPage = 1;


    // =========================================
    // REMOVE NO RECORD ROW
    // =========================================

    function removeNoRecordRow() {

      tbody
        .querySelectorAll('.no-record-row')
        .forEach(function (row) {
          row.remove();
        });

    }


    // =========================================
    // GET FILTERED ROWS
    // =========================================

    function getFilteredRows() {

      const searchValue = searchInput
        ? searchInput.value.trim().toLowerCase()
        : '';


      return rows.filter(function (row) {
        const matchesSearch = !searchValue || row.textContent
          .toLowerCase()
          .includes(searchValue);
        const matchesExternalFilter = typeof window.attendanceRowMatches === 'function'
          ? window.attendanceRowMatches(row)
          : true;

        return matchesSearch && matchesExternalFilter;

      });

    }


    // =========================================
    // RENDER TABLE
    // =========================================

    function render() {

      const pageSize =
        parseInt(showSelect.value, 10) || 10;


      const filteredRows =
        getFilteredRows();


      const total =
        filteredRows.length;


      const totalPages =
        total > 0
          ? Math.ceil(total / pageSize)
          : 1;


      // -------------------------------------
      // Correct current page
      // -------------------------------------

      if (currentPage > totalPages) {
        currentPage = totalPages;
      }


      if (currentPage < 1) {
        currentPage = 1;
      }


      // -------------------------------------
      // ALWAYS REMOVE OLD NO RECORD ROW
      // -------------------------------------

      removeNoRecordRow();


      // -------------------------------------
      // HIDE ORIGINAL ROWS
      // -------------------------------------

      rows.forEach(function (row) {

        row.style.display = 'none';

      });


      // =====================================
      // NO RECORDS
      // =====================================

      if (total === 0) {

        const columnCount =
          reportTable.querySelectorAll(
            'thead th'
          ).length;


        const noRecordRow =
          document.createElement('tr');


        noRecordRow.className =
          'no-record-row';


        noRecordRow.innerHTML = `
                    <td colspan="${columnCount}"
                        class="text-center">

                        <div class="d-flex flex-column align-items-center justify-content-center text-muted">

                            <span class="mt-1">
                                No Records Found
                            </span>

                        </div>

                    </td>
                `;


        tbody.appendChild(noRecordRow);


        // Showing
        if (pgStart) {
          pgStart.textContent = '0';
        }

        if (pgEnd) {
          pgEnd.textContent = '0';
        }

        if (pgTotal) {
          pgTotal.textContent = '0';
        }


        // Remove pagination
        pgList.innerHTML = '';


        return;
      }


      // =====================================
      // SHOW DATA
      // =====================================

      const startIndex =
        (currentPage - 1) * pageSize;


      const endIndex =
        Math.min(
          startIndex + pageSize,
          total
        );


      filteredRows
        .slice(startIndex, endIndex)
        .forEach(function (row, rowIndex) {

          row.style.display = '';
          const serialNumber = row.querySelector('.sno-value');
          if (serialNumber) {
            serialNumber.textContent = String(startIndex + rowIndex + 1);
          }

        });


      // =====================================
      // SHOWING X - Y OF Z
      // =====================================

      if (pgStart) {
        pgStart.textContent =
          startIndex + 1;
      }


      if (pgEnd) {
        pgEnd.textContent =
          endIndex;
      }


      if (pgTotal) {
        pgTotal.textContent =
          total;
      }


      // =====================================
      // PAGINATION
      // =====================================

      renderPagination(totalPages);

    }


    // =========================================
    // GO TO PAGE
    // =========================================

    function goToPage(page) {

      currentPage = page;

      render();

    }


    // =========================================
    // CREATE PAGINATION ITEM
    // =========================================

    function createItem(
      label,
      page,
      options = {}
    ) {

      const li =
        document.createElement('li');


      li.className =
        'page-item';


      if (options.active) {
        li.classList.add('active');
      }


      if (options.disabled) {
        li.classList.add('disabled');
      }


      // Ellipsis
      if (options.ellipsis) {

        li.innerHTML = `
                    <span class="page-link">
                        …
                    </span>
                `;

        return li;
      }


      const link =
        document.createElement('a');


      link.className =
        'page-link';


      link.href = '#';


      link.innerHTML =
        label;


      if (!options.disabled) {

        link.addEventListener(
          'click',
          function (event) {

            event.preventDefault();

            goToPage(page);

          }
        );

      }


      li.appendChild(link);


      return li;

    }


    // =========================================
    // RENDER PAGINATION
    // =========================================

    function renderPagination(totalPages) {

      pgList.innerHTML = '';


      // -------------------------------------
      // FIRST
      // -------------------------------------

      pgList.appendChild(
        createItem(
          '<i class="mdi mdi-chevron-double-left"></i>',
          1,
          {
            disabled:
              currentPage === 1
          }
        )
      );


      // -------------------------------------
      // PREVIOUS
      // -------------------------------------

      pgList.appendChild(
        createItem(
          '<i class="mdi mdi-chevron-left"></i>',
          currentPage - 1,
          {
            disabled:
              currentPage === 1
          }
        )
      );


      const maxButtons = 5;


      let startPage =
        Math.max(
          1,
          currentPage -
          Math.floor(maxButtons / 2)
        );


      let endPage =
        Math.min(
          totalPages,
          startPage + maxButtons - 1
        );


      if (
        endPage - startPage + 1 <
        maxButtons
      ) {

        startPage =
          Math.max(
            1,
            endPage - maxButtons + 1
          );

      }


      // -------------------------------------
      // FIRST PAGE
      // -------------------------------------

      if (startPage > 1) {

        pgList.appendChild(
          createItem('1', 1)
        );


        if (startPage > 2) {

          pgList.appendChild(
            createItem(
              '',
              0,
              {
                ellipsis: true
              }
            )
          );

        }

      }


      // -------------------------------------
      // PAGE NUMBERS
      // -------------------------------------

      for (
        let page = startPage;
        page <= endPage;
        page++
      ) {

        pgList.appendChild(
          createItem(
            String(page),
            page,
            {
              active:
                page === currentPage
            }
          )
        );

      }


      // -------------------------------------
      // LAST PAGE
      // -------------------------------------

      if (endPage < totalPages) {

        if (
          endPage <
          totalPages - 1
        ) {

          pgList.appendChild(
            createItem(
              '',
              0,
              {
                ellipsis: true
              }
            )
          );

        }


        pgList.appendChild(
          createItem(
            String(totalPages),
            totalPages
          )
        );

      }


      // -------------------------------------
      // NEXT
      // -------------------------------------

      pgList.appendChild(
        createItem(
          '<i class="mdi mdi-chevron-right"></i>',
          currentPage + 1,
          {
            disabled:
              currentPage === totalPages
          }
        )
      );


      // -------------------------------------
      // LAST
      // -------------------------------------

      pgList.appendChild(
        createItem(
          '<i class="mdi mdi-chevron-double-right"></i>',
          totalPages,
          {
            disabled:
              currentPage === totalPages
          }
        )
      );

    }


    // =========================================
    // SHOW ENTRIES
    // =========================================

    showSelect.addEventListener(
      'change',
      function () {

        currentPage = 1;

        render();

      }
    );


    // =========================================
    // SEARCH (optional — only wire up if the
    // search box actually exists on this page)
    // =========================================

    if (searchInput) {
      searchInput.addEventListener(
        'input',
        function () {

          currentPage = 1;

          render();

        }
      );
    }


    // =========================================
    // INITIAL LOAD
    // =========================================

    render();
    window.refreshAttendanceTable = function () {
      currentPage = 1;
      render();
    };

  });

})();


// column visibility

document.addEventListener('DOMContentLoaded', function () {

  function createSharedOffcanvas() {
    let existing = document.getElementById('ocR');
    if (existing) return existing;

    const offcanvasHTML = `
            <div class="offcanvas offcanvas-end" tabindex="-1" id="ocR">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Columns Visibility</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body column-toggle-body"></div>
            </div>`;

    document.body.insertAdjacentHTML('beforeend', offcanvasHTML);
    return document.getElementById('ocR');
  }

  const sharedOffcanvasEl = createSharedOffcanvas();
  const sharedOffcanvas = new bootstrap.Offcanvas(sharedOffcanvasEl);

  let activeTable = null; // currently open table ah track pannurom

  // column visibility button
  document.querySelectorAll('.columns-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      const wrapper = this.closest('.js-report-table');   // <-- fix
      const table = wrapper ? wrapper.querySelector('table') : null;

      if (!table) {
        console.error('Table not found inside wrapper');
        return;
      }

      activeTable = table;
      renderColumnSwitches(table);
      sharedOffcanvas.show();
    });
  });

  function renderColumnSwitches(table) {
    const body = document.querySelector('#ocR .column-toggle-body');
    body.innerHTML = '';

    const ths = table.querySelectorAll('thead th');

    ths.forEach((th, index) => {
      const label = th.textContent.trim();
      const isHidden = th.classList.contains('d-none');

      const row = document.createElement('div');
      row.className = 'row mb-2 g-0';
      row.innerHTML = `
                <div class="col-12 p-3 py-2 border rounded">
                    <div class="d-flex form-check form-switch justify-content-between align-items-center mb-0 ps-0 w-100">
                        <label class="form-check-label fw-semibold">${label}</label>
                        <input class="form-check-input col-toggle-switch" type="checkbox"
                               data-col-index="${index}" ${isHidden ? '' : 'checked'}>
                    </div>
                </div>`;
      body.appendChild(row);
    });
  }

  document.addEventListener('change', function (e) {
    if (!e.target.classList.contains('col-toggle-switch')) return;
    if (!activeTable) return;

    const colIndex = parseInt(e.target.dataset.colIndex, 10);
    const show = e.target.checked;

    activeTable.querySelectorAll('tr').forEach(row => {
      const cell = row.children[colIndex];
      if (cell) cell.classList.toggle('d-none', !show);
    });
  });

});


// export button
document.querySelectorAll('.export-btn, .export-btn-exl').forEach(btn => {
  btn.addEventListener('click', function () {
    const wrapper = this.closest('.js-report-table');   // <-- fix
    const table = wrapper ? wrapper.querySelector('table') : null;

    if (!table) {
      console.error('Table not found for export');
      return;
    }

    if (typeof window.exportDepartmentTable === 'function' && wrapper.id === 'departmentTableWrap') {
      window.exportDepartmentTable(wrapper);
      return;
    }

    if (typeof window.exportPositionTable === 'function' && wrapper.id === 'positionTableWrap') {
      window.exportPositionTable(wrapper);
      return;
    }

    if (typeof window.exportDocumentUploadTable === 'function' && wrapper.id === 'documentUploadTableWrap') {
      window.exportDocumentUploadTable(wrapper);
      return;
    }

    if (typeof window.exportWorkLocationTable === 'function' && wrapper.id === 'workLocationTableWrap') {
      window.exportWorkLocationTable(wrapper);
      return;
    }

    if (typeof window.exportTeamTable === 'function' && wrapper.id === 'teamTableWrap') {
      window.exportTeamTable(wrapper);
      return;
    }

    if (typeof window.exportStateTable === 'function' && wrapper.id === 'stateTableWrap') {
      window.exportStateTable(wrapper);
      return;
    }

    if (typeof window.exportDistrictTable === 'function' && wrapper.id === 'districtTableWrap') {
      window.exportDistrictTable(wrapper);
      return;
    }

    exportTableToExcel(table, wrapper);
  });
});

function exportTableToExcel(table, wrapper) {
  // table ah clone pannurom (original ah touch pannama)
  const clonedTable = table.cloneNode(true);

  // hidden columns (d-none) ah remove pannurom
  const hiddenCells = clonedTable.querySelectorAll('.d-none');
  hiddenCells.forEach(cell => cell.remove());

  // Action column (Edit/Delete buttons) ah remove pannurom
  clonedTable.querySelectorAll('tr').forEach(row => {
    row.querySelectorAll('th, td').forEach(cell => {
      if (cell.querySelector('button, .btn, .btn-group')) cell.remove();
    });
  });

  // Clean styles & text on all th and td - no colors, plain white and black borders
  clonedTable.setAttribute('border', '1');
  clonedTable.setAttribute('cellpadding', '0');
  clonedTable.setAttribute('cellspacing', '0');
  clonedTable.style.borderCollapse = 'collapse';
  clonedTable.style.fontFamily = 'Calibri, Arial, sans-serif';

  clonedTable.querySelectorAll('th').forEach(th => {
    const text = th.textContent.trim().replace(/\s+/g, ' ');
    th.removeAttribute('class');
    const isCenter = /s\.?no|#|status|date/i.test(text);
    th.style.cssText = `background-color:#ffffff;color:#000000;font-family:Calibri,Arial,sans-serif;font-size:11pt;font-weight:bold;text-align:${isCenter ? 'center' : 'left'};vertical-align:middle;border:1px solid #000000;padding:6px 10px;`;
    th.textContent = text;
  });

  clonedTable.querySelectorAll('td').forEach(td => {
    const text = td.textContent.trim().replace(/\s+/g, ' ');
    td.removeAttribute('class');
    td.style.cssText = 'background-color:#ffffff;color:#000000;font-family:Calibri,Arial,sans-serif;font-size:10pt;vertical-align:middle;border:1px solid #000000;padding:5px 8px;mso-number-format:\\@;';
    td.textContent = text;
  });

  const exportName = wrapper?.dataset.exportName || 'table-export';
  const today = new Date().toISOString().slice(0, 10);

  // Excel recognize pannura HTML format
  const excelHTML = `
        <html xmlns:o="urn:schemas-microsoft-com:office:office"
              xmlns:x="urn:schemas-microsoft-com:office:excel"
              xmlns="http://www.w3.org/TR/REC-html40">
        <head>
            <meta charset="UTF-8">
            <style>
              body { font-family: Calibri, Arial, sans-serif; margin: 0; padding: 0; }
              table { border-collapse: collapse; font-family: Calibri, Arial, sans-serif; }
              th, td { border: 1px solid #000000; }
            </style>
            <!--[if gte mso 9]>
            <xml>
                <x:ExcelWorkbook>
                    <x:ExcelWorksheets>
                        <x:ExcelWorksheet>
                            <x:Name>Sheet1</x:Name>
                            <x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions>
                        </x:ExcelWorksheet>
                    </x:ExcelWorksheets>
                </x:ExcelWorkbook>
            </xml>
            <![endif]-->
        </head>
        <body>${clonedTable.outerHTML}</body>
        </html>`;

  const blob = new Blob(['\ufeff' + excelHTML], { type: 'application/vnd.ms-excel' });
  const url = URL.createObjectURL(blob);

  const link = document.createElement('a');
  link.href = url;
  link.download = `${exportName}-${today}.xls`;
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
  URL.revokeObjectURL(url);
}