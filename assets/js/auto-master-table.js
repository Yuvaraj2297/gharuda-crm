/**
 * AutoMasterTable — Automatic Table Enhancement
 * Simply add class="datatable" (or "data-table") to any <table class="table-modern">
 * and it will automatically generate:
 *   1. Columns visibility toggle button & offcanvas drawer
 *   2. Export button & dropdown (Copy, CSV, Excel, PDF, Print)
 *   3. Live Search input
 *   4. Show entries dropdown (10, 25, 50, 100)
 *   5. Showing X-Y of Z entries counter
 *   6. Full Pagination controls
 *   7. Header Sorting with ascending/descending indicators
 *   8. S.No auto-sequencing across pagination
 */
(function (window, document) {
    'use strict';

    // Inject shared styles if not already present
    function injectStyles() {
        if (document.getElementById('auto-master-table-styles')) return;
        var style = document.createElement('style');
        style.id = 'auto-master-table-styles';
        style.textContent =
            /* Export dropdown */
            '.mt-export-menu { position: relative; display: inline-block; }' +
            '.mt-export-dropdown { position: fixed; z-index: 1060; min-width: 160px; background: #fff; border: 1px solid var(--border-soft, #e2e8f0); border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,.12); padding: 6px; display: none; }' +
            '.mt-export-dropdown.show { display: block; }' +
            '.mt-export-item { display: flex; align-items: center; width: 100%; padding: 8px 12px; font-size: 12px; font-weight: 600; font-family: "Manrope", sans-serif; color: var(--ink-700, #334155); background: none; border: none; border-radius: 8px; cursor: pointer; transition: background .15s, color .15s; text-align: left; white-space: nowrap; }' +
            '.mt-export-item:hover { background: var(--primary-soft, #eef2ff); color: var(--primary, #4f46e5); }' +
            '.mt-export-item i { font-size: 14px; color: var(--ink-500, #64748b); }' +
            '.mt-export-item:hover i { color: var(--primary, #4f46e5); }' +
            /* Search */
            '.mt-search-wrap { position: relative; }' +
            '.mt-search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #6c757d; font-size: 14px; pointer-events: none; }' +
            '.mt-search-input { border: 1px solid var(--border-soft, #e2e8f0); border-radius: 10px; padding: 8px 14px 8px 36px; font-size: 12.5px; font-weight: 500; font-family: "Manrope", sans-serif; color: var(--ink-700, #334155); width: 230px; transition: border-color .2s, box-shadow .2s; }' +
            '.mt-search-input:focus { outline: none; border-color: var(--primary, #4f46e5); box-shadow: 0 0 0 3px var(--primary-soft, rgba(79, 70, 229, 0.15)); }' +
            '.mt-search-input::placeholder { color: #adb5bd; font-weight: 500; }' +
            /* Chevron */
            '.mt-export-trigger[aria-expanded="true"] .bi-chevron-down { transform: rotate(180deg); }' +
            '.bi-chevron-down { transition: transform .2s ease; }' +
            /* Sortable headers */
            'th.sortable { cursor: pointer; user-select: none; }' +
            'th.sortable .dt-col-header { display: flex; align-items: center; justify-content: space-between; gap: 6px; width: 100%; }' +
            'th.sortable .sort-arrows { display: flex; flex-direction: column; line-height: 1; flex-shrink: 0; }' +
            'th.sortable .sort-arrows i { font-size: 10px; color: var(--ink-300, #cbd5e1); transition: color .15s; }' +
            'th.sortable .sort-arrows i:hover { color: var(--primary, #4f46e5); }' +
            'th.sortable.sort-asc .sort-arrows .mdi-chevron-up, ' +
            'th.sortable.sort-desc .sort-arrows .mdi-chevron-down { color: var(--primary, #4f46e5); }' +
            /* Toolbar & footer spacing */
            '.auto-table-toolbar { border-bottom: 1px solid var(--border-soft, #f1f5f9); }';
        document.head.appendChild(style);
    }

    function escapeHtml(val) {
        if (val === null || val === undefined) return '';
        return String(val)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    var tableCounter = 0;

    function initTable(table, options) {
        if (!table || table.dataset.autoTableInit === 'true' || table.dataset.masterTableInit === 'true') return table ? table.autoTable : null;
        var existingWrap = table.closest('.card-custom') || table.closest('.card') || (table.parentElement && table.parentElement.classList.contains('table-responsive') ? table.parentElement.parentElement : table.parentElement);
        if (existingWrap && (existingWrap.querySelector('.auto-table-toolbar') || existingWrap.querySelector('.columns-btn'))) {
            table.dataset.autoTableInit = 'true';
            return table.autoTable || null;
        }
        table.dataset.autoTableInit = 'true';
        table.dataset.masterTableInit = 'true';

        injectStyles();
        options = options || {};

        tableCounter++;
        if (!table.id) {
            table.id = 'autoTable_' + tableCounter;
        }
        var tableId = table.id;
        var pfx = 'at_' + tableId + '_';

        var thead = table.querySelector('thead');
        var tbody = table.querySelector('tbody');
        if (!tbody) {
            tbody = document.createElement('tbody');
            table.appendChild(tbody);
        }

        var tableWrap = table.closest('.card-custom') || table.closest('.card') || (table.parentElement && table.parentElement.classList.contains('table-responsive') ? table.parentElement.parentElement : table.parentElement);
        var tableResponsive = table.closest('.table-responsive') || table;

        // Determine table name automatically from card title or heading (no data attribute required)
        var tableName = table.getAttribute('data-table-name');
        if (!tableName) {
            var titleEl = tableWrap ? tableWrap.querySelector('.card-title') : null;
            if (!titleEl) titleEl = document.querySelector('.card-title');
            tableName = titleEl ? titleEl.textContent.trim() : '';
        }
        var searchPlaceholder = tableName ? ('Search ' + escapeHtml(tableName.toLowerCase()) + '...') : 'Search...';

        // Generate IDs
        var ID = {
            offcanvas: pfx + 'offcanvas',
            offcanvasBody: pfx + 'offcanvasBody',
            columnsBtn: pfx + 'columnsBtn',
            exportTrigger: pfx + 'exportTrigger',
            exportDropdown: pfx + 'exportDropdown',
            copy: pfx + 'copyBtn',
            csv: pfx + 'csvBtn',
            excel: pfx + 'excelBtn',
            pdf: pfx + 'pdfBtn',
            print: pfx + 'printBtn',
            search: pfx + 'search',
            showEntries: pfx + 'showEntries',
            pgStart: pfx + 'pgStart',
            pgEnd: pfx + 'pgEnd',
            pgTotal: pfx + 'pgTotal',
            pgList: pfx + 'pgList'
        };

        // Build Toolbar (Columns, Export, Search)
        var toolbar = tableWrap ? (tableWrap.querySelector('.auto-table-toolbar') || tableWrap.querySelector('.columns-btn')) : null;
        if (!toolbar && tableWrap) {
            toolbar = document.createElement('div');
            toolbar.className = 'd-flex align-items-center justify-content-between flex-wrap gap-2 p-3 auto-table-toolbar';
            toolbar.innerHTML =
                '<div class="d-flex align-items-center gap-2 flex-wrap">' +
                '<button type="button" class="btn columns-btn" id="' + ID.columnsBtn + '"><i class="bi bi-eye me-1"></i>Columns</button>' +
                '<div class="mt-export-menu">' +
                '<button type="button" class="btn export-btn-pdf mt-export-trigger" id="' + ID.exportTrigger + '" aria-expanded="false">' +
                '<i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i>' +
                '</button>' +
                '<div class="mt-export-dropdown" id="' + ID.exportDropdown + '" role="menu">' +
                '<button type="button" class="mt-export-item" id="' + ID.copy + '"><i class="bi bi-clipboard me-2"></i>Copy</button>' +
                '<button type="button" class="mt-export-item" id="' + ID.csv + '"><i class="bi bi-filetype-csv me-2"></i>CSV</button>' +
                '<button type="button" class="mt-export-item" id="' + ID.excel + '"><i class="bi bi-filetype-xlsx me-2"></i>Excel</button>' +
                '<button type="button" class="mt-export-item" id="' + ID.pdf + '"><i class="bi bi-filetype-pdf me-2"></i>PDF</button>' +
                '<button type="button" class="mt-export-item" id="' + ID.print + '"><i class="bi bi-printer me-2"></i>Print</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="mt-search-wrap">' +
                '<i class="bi bi-search mt-search-icon"></i>' +
                '<input type="text" class="mt-search-input" id="' + ID.search + '" placeholder="' + searchPlaceholder + '">' +
                '</div>';

            if (tableResponsive && tableResponsive.parentElement === tableWrap) {
                tableWrap.insertBefore(toolbar, tableResponsive);
            } else {
                tableWrap.insertBefore(toolbar, tableWrap.firstChild);
            }
        }

        // Build Footer (Show Entries, Showing Info, Pagination)
        var footer = tableWrap.querySelector('.report-footer');
        if (!footer) {
            footer = document.createElement('div');
            footer.className = 'd-flex justify-content-between align-items-center report-footer p-3';
            footer.innerHTML =
                '<div class="d-flex gap-2 align-items-center">' +
                '<span class="small text-muted text-nowrap">Show:</span>' +
                '<select class="form-select form-select-sm gh-w-auto" id="' + ID.showEntries + '">' +
                '<option value="10" selected>10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '</select>' +
                '<span class="small text-muted text-nowrap">' +
                'Showing <strong id="' + ID.pgStart + '">0</strong>&ndash;<strong id="' + ID.pgEnd + '">0</strong> of <strong id="' + ID.pgTotal + '">0</strong>' +
                '</span>' +
                '</div>' +
                '<nav><ul class="pagination pagination-sm mb-0" id="' + ID.pgList + '"></ul></nav>';

            if (tableResponsive && tableResponsive.parentElement === tableWrap) {
                if (tableResponsive.nextSibling) {
                    tableWrap.insertBefore(footer, tableResponsive.nextSibling);
                } else {
                    tableWrap.appendChild(footer);
                }
            } else {
                tableWrap.appendChild(footer);
            }
        }

        // Build Column Visibility Offcanvas
        if (!document.getElementById(ID.offcanvas)) {
            var oc = document.createElement('div');
            oc.className = 'offcanvas offcanvas-end';
            oc.tabIndex = -1;
            oc.id = ID.offcanvas;
            oc.innerHTML =
                '<div class="offcanvas-header border-bottom border-light-subtle">' +
                '<h5 class="offcanvas-title fw-bold">Columns Visibility</h5>' +
                '<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>' +
                '</div>' +
                '<div class="offcanvas-body" id="' + ID.offcanvasBody + '"></div>';
            document.body.appendChild(oc);
        }

        // Elements
        var searchInput = document.getElementById(ID.search);
        var showSelect = document.getElementById(ID.showEntries);
        var pgList = document.getElementById(ID.pgList);
        var pgStart = document.getElementById(ID.pgStart);
        var pgEnd = document.getElementById(ID.pgEnd);
        var pgTotal = document.getElementById(ID.pgTotal);
        var exportTrigger = document.getElementById(ID.exportTrigger);
        var exportDropdown = document.getElementById(ID.exportDropdown);
        var columnsBtn = document.getElementById(ID.columnsBtn);

        // State
        var currentPage = 1;
        var sortCol = -1;
        var sortDir = 'asc';

        var ths = [];
        var columns = [];

        function getLeafThGrid() {
            var thead = table.querySelector('thead');
            if (!thead) return [];
            var trs = thead.querySelectorAll('tr');
            if (trs.length <= 1) {
                return Array.from(thead.querySelectorAll('th'));
            }
            var grid = [];
            trs.forEach(function (tr, r) {
                if (!grid[r]) grid[r] = [];
                var colIdx = 0;
                tr.querySelectorAll('th').forEach(function (th) {
                    while (grid[r][colIdx]) colIdx++;
                    var rowspan = parseInt(th.getAttribute('rowspan') || '1', 10);
                    var colspan = parseInt(th.getAttribute('colspan') || '1', 10);
                    for (var rs = 0; rs < rowspan; rs++) {
                        for (var cs = 0; cs < colspan; cs++) {
                            if (!grid[r + rs]) grid[r + rs] = [];
                            grid[r + rs][colIdx + cs] = th;
                        }
                    }
                    colIdx += colspan;
                });
            });
            var numCols = grid[0] ? grid[0].length : 0;
            var leafThs = [];
            for (var c = 0; c < numCols; c++) {
                var lastTh = null;
                for (var r = grid.length - 1; r >= 0; r--) {
                    if (grid[r] && grid[r][c]) {
                        lastTh = grid[r][c];
                        break;
                    }
                }
                leafThs.push(lastTh);
            }
            return leafThs;
        }

        function scanColumns() {
            ths = getLeafThGrid();
            columns = [];
            ths.forEach(function (th, idx) {
                var rawTitle = th ? (th.getAttribute('data-col-title') || th.textContent.trim()) : ('Col ' + (idx + 1));
                if (!rawTitle && th && th.querySelector('input[type="checkbox"]')) {
                    rawTitle = 'Select';
                }
                var title = rawTitle.replace(/\s+/g, ' ');
                var isSno = (th && th.hasAttribute('data-no-sno')) ? false : /^(s\.?no|#|no\.?|sl\.?no)$/i.test(title);
                var isAction = /^(action|actions|operation|operations)$/i.test(title) ||
                    (th && th.hasAttribute('data-no-export')) ||
                    Boolean(th && th.querySelector('button, .btn, a.btn'));

                // Check if column cells contain action buttons
                if (!isAction && !isSno) {
                    var sampleCell = tbody.querySelector('tr:not(.no-record-row) > td:nth-child(' + (idx + 1) + ')');
                    if (sampleCell && sampleCell.querySelector('.btn-group, .btn, button, .btn-edit, .btn-delete, .menu-trigger')) {
                        isAction = true;
                    }
                }

                var isSortable = th ? (!th.hasAttribute('data-no-sort') && !isAction) : false;

                columns.push({
                    index: idx,
                    title: title || ('Col ' + (idx + 1)),
                    isSno: isSno,
                    isAction: isAction,
                    isSortable: isSortable,
                    visible: true
                });
            });
        }
        scanColumns();

        // Column toggles builder
        function buildColumnToggles() {
            var body = document.getElementById(ID.offcanvasBody);
            if (!body) return;
            body.innerHTML = '';
            columns.forEach(function (col) {
                var row = document.createElement('div');
                row.className = 'p-3 py-2 border rounded mb-2';
                row.innerHTML =
                    '<div class="d-flex form-check form-switch justify-content-between align-items-center mb-0 ps-0 w-100">' +
                    '<label class="form-check-label fw-semibold">' + escapeHtml(col.title) + '</label>' +
                    '<input class="form-check-input" type="checkbox" data-col-index="' + col.index + '" ' + (col.visible ? 'checked' : '') + '>' +
                    '</div>';
                body.appendChild(row);
            });

            var restoreBtn = document.createElement('button');
            restoreBtn.type = 'button';
            restoreBtn.className = 'btn btn-sm btn-outline-primary mt-2';
            restoreBtn.textContent = 'Restore All';
            restoreBtn.addEventListener('click', function () {
                columns.forEach(function (c) { c.visible = true; });
                body.querySelectorAll('input[type="checkbox"]').forEach(function (sw) { sw.checked = true; });
                applyColumnVisibility();
            });
            body.appendChild(restoreBtn);
        }

        function applyColumnVisibility() {
            columns.forEach(function (col) {
                var th = ths[col.index];
                if (th) th.classList.toggle('d-none', !col.visible);
            });
            var rows = tbody.querySelectorAll('tr');
            rows.forEach(function (tr) {
                if (tr.classList.contains('no-record-row')) return;
                var tds = tr.children;
                columns.forEach(function (col) {
                    if (tds[col.index]) tds[col.index].classList.toggle('d-none', !col.visible);
                });
            });
        }

        // Delegate switch changes inside offcanvas body
        document.addEventListener('change', function (e) {
            var body = document.getElementById(ID.offcanvasBody);
            if (!body || !body.contains(e.target)) return;
            var idx = parseInt(e.target.getAttribute('data-col-index'), 10);
            if (!isNaN(idx) && columns[idx]) {
                columns[idx].visible = e.target.checked;
                applyColumnVisibility();
            }
        });

        if (columnsBtn) {
            columnsBtn.addEventListener('click', function () {
                buildColumnToggles();
                var el = document.getElementById(ID.offcanvas);
                if (el && window.bootstrap && window.bootstrap.Offcanvas) {
                    var oc = bootstrap.Offcanvas.getOrCreateInstance(el);
                    oc.show();
                }
            });
        }

        // Export Dropdown Positioning & Handling
        function positionExportDropdown() {
            if (!exportDropdown || !exportDropdown.classList.contains('show')) return;
            var rect = exportTrigger.getBoundingClientRect();
            var ddW = exportDropdown.offsetWidth || 160;
            var ddH = exportDropdown.offsetHeight || 200;
            var left = rect.left + (rect.width / 2) - (ddW / 2);
            left = Math.max(8, Math.min(left, window.innerWidth - ddW - 8));
            var top = rect.bottom + 6;
            if (top + ddH > window.innerHeight - 8) top = rect.top - ddH - 6;
            exportDropdown.style.left = left + 'px';
            exportDropdown.style.top = Math.max(8, top) + 'px';
        }

        function closeExportDropdown() {
            if (exportDropdown) exportDropdown.classList.remove('show');
            if (exportTrigger) exportTrigger.setAttribute('aria-expanded', 'false');
        }

        if (exportTrigger && exportDropdown) {
            exportTrigger.addEventListener('click', function (e) {
                e.stopPropagation();
                document.querySelectorAll('.mt-export-dropdown.show').forEach(function (d) {
                    if (d !== exportDropdown) d.classList.remove('show');
                });
                if (!exportDropdown.classList.contains('show')) {
                    exportDropdown.classList.add('show');
                    exportTrigger.setAttribute('aria-expanded', 'true');
                    positionExportDropdown();
                } else {
                    closeExportDropdown();
                }
            });

            document.addEventListener('click', function (e) {
                if (!exportDropdown.contains(e.target) && e.target !== exportTrigger) {
                    closeExportDropdown();
                }
            });

            window.addEventListener('resize', positionExportDropdown);
            window.addEventListener('scroll', positionExportDropdown, true);
        }

        // Export data extractors
        function getExportData() {
            var visibleCols = columns.filter(function (c) { return c.visible && !c.isAction; });
            var headers = visibleCols.map(function (c) { return c.title; });
            var filtered = getFilteredRows();
            var exportRows = filtered.map(function (tr, rowIndex) {
                var tds = tr.children;
                return visibleCols.map(function (c) {
                    if (c.isSno) return String(rowIndex + 1);
                    var td = tds[c.index];
                    if (!td) return '';
                    var badge = td.querySelector('.adj-status-badge, [data-status], .status-pill');
                    if (badge) return (badge.getAttribute('data-status') || badge.textContent).trim();
                    return td.textContent.trim().replace(/\s+/g, ' ');
                });
            });
            return { headers: headers, rows: exportRows, columns: visibleCols };
        }

        function downloadFile(content, fileName, mimeType) {
            var blob = new Blob(['\ufeff' + content], { type: mimeType });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = fileName;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }

        function exportCSV() {
            var d = getExportData();
            var csv = d.headers.map(function (h) { return '"' + h.replace(/"/g, '""') + '"'; }).join(',') + '\n' +
                d.rows.map(function (r) {
                    return r.map(function (c) { return '"' + String(c).replace(/"/g, '""') + '"'; }).join(',');
                }).join('\n');
            downloadFile(csv, (tableName || 'data') + '.csv', 'text/csv');
        }

        function exportExcel() {
            var d = getExportData();
            var sheetTitle = (tableName || 'Data').trim();
            var safeSheetName = sheetTitle.replace(/[\\\/:\*\?\[\]]/g, '').slice(0, 31) || 'Sheet1';
            var cols = d.columns || [];

            // Calculate widths per column
            var colWidths = cols.map(function (c) {
                var title = (c.title || '').toLowerCase();
                if (c.isSno) return 60;
                if (/code|id|pin|zip/i.test(title)) return 100;
                if (/status|state/i.test(title)) return 110;
                if (/date|time|dob|created|updated/i.test(title)) return 130;
                if (/name|description|address|title|email/i.test(title)) return 200;
                return 150;
            });

            var colGroupHtml = '<colgroup>' + colWidths.map(function (w) {
                return '<col width="' + w + '" style="width:' + w + 'px;">';
            }).join('') + '</colgroup>';

            // Table headers — plain white background, bold black text, solid border, starts directly at row 1
            var headerRowHtml = '<tr style="height:28px;">' + cols.map(function (c, i) {
                var title = (c.title || '').toLowerCase();
                var align = (c.isSno || /status|date|time|code|id/i.test(title)) ? 'center' : 'left';
                var w = colWidths[i];
                return '<th style="background-color:#ffffff;color:#000000;font-family:Calibri,Arial,sans-serif;font-size:11pt;font-weight:bold;text-align:' + align + ';vertical-align:middle;border:1px solid #000000;padding:6px 10px;width:' + w + 'px;" width="' + w + '">' + escapeHtml(c.title) + '</th>';
            }).join('') + '</tr>';

            // Data rows — plain white, standard black text, solid borders, text formatting for dates
            var dataRowsHtml = d.rows.map(function (r) {
                var cells = r.map(function (val, cIdx) {
                    var c = cols[cIdx] || {};
                    var title = (c.title || '').toLowerCase();
                    var strVal = String(val == null ? '' : val).trim();
                    var isDate = /date|time|dob/i.test(title) || /^\d{2}[-\/]\d{2}[-\/]\d{4}$/.test(strVal);

                    if (c.isSno) {
                        return '<td style="background-color:#ffffff;color:#000000;font-family:Calibri,Arial,sans-serif;font-size:10pt;text-align:center;vertical-align:middle;border:1px solid #000000;padding:5px 8px;mso-number-format:\'0\';">' + escapeHtml(strVal) + '</td>';
                    }

                    if (isDate) {
                        return '<td style="background-color:#ffffff;color:#000000;font-family:Calibri,Arial,sans-serif;font-size:10pt;text-align:center;vertical-align:middle;border:1px solid #000000;padding:5px 8px;mso-number-format:\'\\@\';">' + escapeHtml(strVal) + '</td>';
                    }

                    var isCenter = (c.isSno || /status|code|id|pin|zip/i.test(title));
                    var align = isCenter ? 'center' : 'left';
                    return '<td style="background-color:#ffffff;color:#000000;font-family:Calibri,Arial,sans-serif;font-size:10pt;text-align:' + align + ';vertical-align:middle;border:1px solid #000000;padding:5px 8px;mso-number-format:\'\\@\';">' + escapeHtml(strVal) + '</td>';
                }).join('');

                return '<tr style="height:24px;">' + cells + '</tr>';
            }).join('');

            var html =
                '<html xmlns:o="urn:schemas-microsoft-com:office:office"' +
                '      xmlns:x="urn:schemas-microsoft-com:office:excel"' +
                '      xmlns="http://www.w3.org/TR/REC-html40">' +
                '<head>' +
                '  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' +
                '  <!--[if gte mso 9]>' +
                '  <xml>' +
                '    <x:ExcelWorkbook>' +
                '      <x:ExcelWorksheets>' +
                '        <x:ExcelWorksheet>' +
                '          <x:Name>' + escapeHtml(safeSheetName) + '</x:Name>' +
                '          <x:WorksheetOptions>' +
                '            <x:DisplayGridlines/>' +
                '          </x:WorksheetOptions>' +
                '        </x:ExcelWorksheet>' +
                '      </x:ExcelWorksheets>' +
                '    </x:ExcelWorkbook>' +
                '  </xml>' +
                '  <![endif]-->' +
                '  <style>' +
                '    body { font-family: Calibri, Arial, sans-serif; margin: 0; padding: 0; }' +
                '    table { border-collapse: collapse; font-family: Calibri, Arial, sans-serif; }' +
                '    th, td { border: 1px solid #000000; }' +
                '  </style>' +
                '</head>' +
                '<body>' +
                '  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;font-family:Calibri,Arial,sans-serif;">' +
                colGroupHtml +
                headerRowHtml +
                dataRowsHtml +
                '  </table>' +
                '</body>' +
                '</html>';

            downloadFile(html, (sheetTitle || 'data') + '.xls', 'application/vnd.ms-excel');
        }

        function exportPDF() {
            var d = getExportData();
            var body = [d.headers.map(function (h) { return { text: h, bold: true }; })];
            d.rows.forEach(function (r) {
                body.push(r.map(function (c) { return String(c); }));
            });
            if (typeof pdfMake !== 'undefined') {
                pdfMake.createPdf({
                    content: [
                        { text: tableName || 'Data', fontSize: 14, bold: true, margin: [0, 0, 0, 10] },
                        { table: { headerRows: 1, body: body } }
                    ],
                    defaultStyle: { fontSize: 9 }
                }).download((tableName || 'data') + '.pdf');
            } else {
                printTable();
            }
        }

        function printTable() {
            var d = getExportData();
            var w = window.open('', '_blank');
            if (!w) { alert('Popup blocked. Please allow popups.'); return; }
            w.document.write(
                '<!DOCTYPE html><html><head><title>' + escapeHtml(tableName || 'Data') + '</title>' +
                '<style>body{font-family:sans-serif;padding:20px}table{border-collapse:collapse;width:100%}th,td{border:1px solid #ddd;padding:8px;font-size:12px;text-align:left}th{background:#f8fafc;font-weight:bold}</style>' +
                '</head><body><h2>' + escapeHtml(tableName || 'Data') + '</h2><table><thead><tr>' +
                d.headers.map(function (h) { return '<th>' + escapeHtml(h) + '</th>'; }).join('') +
                '</tr></thead><tbody>' +
                d.rows.map(function (r) {
                    return '<tr>' + r.map(function (c) { return '<td>' + escapeHtml(c) + '</td>'; }).join('') + '</tr>';
                }).join('') +
                '</tbody></table></body></html>'
            );
            w.document.close();
            w.print();
        }

        function copyToClipboard() {
            var d = getExportData();
            var text = d.headers.join('\t') + '\n' + d.rows.map(function (r) { return r.join('\t'); }).join('\n');
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(function () {
                    alert('Copied to clipboard!');
                }).catch(function () {
                    alert('Copy failed.');
                });
            } else {
                alert('Clipboard API not supported.');
            }
        }

        function bindBtn(id, fn) {
            var el = document.getElementById(id);
            if (el) el.addEventListener('click', function () { closeExportDropdown(); fn(); });
        }
        bindBtn(ID.copy, copyToClipboard);
        bindBtn(ID.csv, exportCSV);
        bindBtn(ID.excel, exportExcel);
        bindBtn(ID.pdf, exportPDF);
        bindBtn(ID.print, printTable);

        // Header Sort Handling
        function updateSortArrows() {
            ths.forEach(function (th, idx) {
                th.classList.remove('sort-asc', 'sort-desc');
                if (idx === sortCol) {
                    th.classList.add(sortDir === 'asc' ? 'sort-asc' : 'sort-desc');
                }
            });
        }

        columns.forEach(function (col) {
            if (!col.isSortable) return;
            var th = ths[col.index];
            if (!th) return;
            th.classList.add('sortable');
            if (!th.querySelector('.dt-col-header')) {
                var txt = th.textContent.trim();
                th.innerHTML = '<span class="dt-col-header"><span>' + escapeHtml(txt) + '</span><span class="sort-arrows"><i class="mdi mdi-chevron-up"></i><i class="mdi mdi-chevron-down"></i></span></span>';
            }
            th.addEventListener('click', function (e) {
                var upClicked = e.target.closest('.mdi-chevron-up');
                var downClicked = e.target.closest('.mdi-chevron-down');

                if (upClicked) {
                    sortCol = col.index;
                    sortDir = 'asc';
                } else if (downClicked) {
                    sortCol = col.index;
                    sortDir = 'desc';
                } else {
                    if (sortCol === col.index) {
                        sortDir = sortDir === 'asc' ? 'desc' : 'asc';
                    } else {
                        sortCol = col.index;
                        sortDir = 'asc';
                    }
                }
                updateSortArrows();
                render();
            });
        });

        // Rows extraction & filtering
        function getAllRows() {
            var rows = Array.from(tbody.children).filter(function (tr) {
                return tr.tagName === 'TR' && !tr.classList.contains('no-record-row');
            });
            rows.forEach(function (tr, i) {
                if (!tr.hasAttribute('data-orig-sno')) {
                    var cell0 = tr.children[0];
                    var origNum = cell0 ? parseInt(cell0.textContent.trim(), 10) : (i + 1);
                    tr.setAttribute('data-orig-sno', isNaN(origNum) ? (i + 1) : origNum);
                }
            });
            return rows;
        }

        function getCellText(tr, colIdx) {
            var td = tr.children[colIdx];
            if (!td) return '';
            var input = td.querySelector('input:not([type="checkbox"]):not([type="radio"]), select');
            if (input) return String(input.value || '').trim();
            var badge = td.querySelector('.status-pill, .adj-status-badge, [data-status], [data-sort], [data-value]');
            if (badge) {
                var attr = badge.getAttribute('data-status') || badge.getAttribute('data-sort') || badge.getAttribute('data-value');
                if (attr) return attr.trim();
                return badge.textContent.trim();
            }
            return td.textContent.trim();
        }

        function parseDate(str) {
            if (!str || typeof str !== 'string') return null;
            var s = str.trim();
            var dmy = s.match(/^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})(?:\s+(\d{1,2}):(\d{2})(?::(\d{2}))?)?$/);
            if (dmy) {
                var d = parseInt(dmy[1], 10);
                var m = parseInt(dmy[2], 10) - 1;
                var y = parseInt(dmy[3], 10);
                var h = dmy[4] ? parseInt(dmy[4], 10) : 0;
                var min = dmy[5] ? parseInt(dmy[5], 10) : 0;
                var sec = dmy[6] ? parseInt(dmy[6], 10) : 0;
                var dt = new Date(y, m, d, h, min, sec);
                if (!isNaN(dt.getTime())) return dt.getTime();
            }
            var ymd = s.match(/^(\d{4})[-\/](\d{1,2})[-\/](\d{1,2})(?:\s+(\d{1,2}):(\d{2})(?::(\d{2}))?)?$/);
            if (ymd) {
                var y2 = parseInt(ymd[1], 10);
                var m2 = parseInt(ymd[2], 10) - 1;
                var d2 = parseInt(ymd[3], 10);
                var h2 = ymd[4] ? parseInt(ymd[4], 10) : 0;
                var min2 = ymd[5] ? parseInt(ymd[5], 10) : 0;
                var sec2 = ymd[6] ? parseInt(ymd[6], 10) : 0;
                var dt2 = new Date(y2, m2, d2, h2, min2, sec2);
                if (!isNaN(dt2.getTime())) return dt2.getTime();
            }
            return null;
        }

        function parseNum(str) {
            if (!str || typeof str !== 'string') return null;
            var clean = str.trim().replace(/[₹$,\s%€£]/g, '');
            if (/^-?\d+(?:\.\d+)?$/.test(clean)) {
                var n = parseFloat(clean);
                if (!isNaN(n)) return n;
            }
            return null;
        }

        function getFilteredRows() {
            var query = searchInput ? searchInput.value.trim().toLowerCase() : '';
            var rows = getAllRows();

            if (typeof window.attendanceRowMatches === 'function' && (table.id === 'myReqTable' || table.id === 'attendanceTable' || table.id === 'leaveReportTable' || table.id === 'customersTable' || table.id === 'manageLeadsTable' || table.id === 'apmAppointmentsTable' || table.id === 'projectReportTable' || table.id === 'projectsListTable')) {
                rows = rows.filter(function (tr) {
                    return window.attendanceRowMatches(tr);
                });
            }

            if (query) {
                rows = rows.filter(function (tr) {
                    return columns.some(function (col) {
                        if (col.isAction) return false;
                        var cellText = getCellText(tr, col.index);
                        return cellText.toLowerCase().indexOf(query) !== -1;
                    });
                });
            }

            if (sortCol >= 0 && sortCol < columns.length) {
                var isSno = columns[sortCol].isSno;
                rows.sort(function (a, b) {
                    if (isSno) {
                        var aIdx = parseInt(a.getAttribute('data-orig-sno'), 10) || 0;
                        var bIdx = parseInt(b.getAttribute('data-orig-sno'), 10) || 0;
                        return sortDir === 'asc' ? (aIdx - bIdx) : (bIdx - aIdx);
                    }

                    var cellA = getCellText(a, sortCol);
                    var cellB = getCellText(b, sortCol);

                    var dateA = parseDate(cellA);
                    var dateB = parseDate(cellB);
                    if (dateA !== null && dateB !== null) {
                        return sortDir === 'asc' ? (dateA - dateB) : (dateB - dateA);
                    }

                    var numA = parseNum(cellA);
                    var numB = parseNum(cellB);
                    if (numA !== null && numB !== null) {
                        return sortDir === 'asc' ? (numA - numB) : (numB - numA);
                    }

                    var cmp = cellA.localeCompare(cellB, undefined, { numeric: true, sensitivity: 'base' });
                    return sortDir === 'asc' ? cmp : -cmp;
                });
            }

            return rows;
        }

        // Render Pagination UI
        function renderPagination(totalPages) {
            if (!pgList) return;
            pgList.innerHTML = '';

            function addPageItem(label, page, opts) {
                opts = opts || {};
                var li = document.createElement('li');
                li.className = 'page-item';
                if (opts.active) li.classList.add('active');
                if (opts.disabled) li.classList.add('disabled');

                if (opts.ellipsis) {
                    li.innerHTML = '<span class="page-link">&hellip;</span>';
                    pgList.appendChild(li);
                    return;
                }

                var a = document.createElement('a');
                a.className = 'page-link';
                a.href = '#';
                a.innerHTML = label;
                if (!opts.disabled) {
                    a.addEventListener('click', function (e) {
                        e.preventDefault();
                        currentPage = page;
                        render();
                    });
                }
                li.appendChild(a);
                pgList.appendChild(li);
            }

            addPageItem('<i class="mdi mdi-chevron-double-left"></i>', 1, { disabled: currentPage === 1 });
            addPageItem('<i class="mdi mdi-chevron-left"></i>', currentPage - 1, { disabled: currentPage === 1 });

            var maxB = 5;
            var sP = Math.max(1, currentPage - Math.floor(maxB / 2));
            var eP = Math.min(totalPages, sP + maxB - 1);
            if (eP - sP + 1 < maxB) sP = Math.max(1, eP - maxB + 1);

            if (sP > 1) {
                addPageItem('1', 1);
                if (sP > 2) addPageItem('', 0, { ellipsis: true });
            }

            for (var p = sP; p <= eP; p++) {
                addPageItem(String(p), p, { active: p === currentPage });
            }

            if (eP < totalPages) {
                if (eP < totalPages - 1) addPageItem('', 0, { ellipsis: true });
                addPageItem(String(totalPages), totalPages);
            }

            addPageItem('<i class="mdi mdi-chevron-right"></i>', currentPage + 1, { disabled: currentPage === totalPages });
            addPageItem('<i class="mdi mdi-chevron-double-right"></i>', totalPages, { disabled: currentPage === totalPages });
        }

        // Tooltip re-initialization
        function initTooltips() {
            if (!table || !window.bootstrap || !window.bootstrap.Tooltip) return;
            table.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) {
                var ex = bootstrap.Tooltip.getInstance(el);
                if (ex) ex.dispose();
                var tip = new bootstrap.Tooltip(el, { trigger: 'hover' });
                el.addEventListener('click', function () { tip.hide(); });
            });
        }

        // Main Render
        function render() {
            var currentThs = getLeafThGrid();
            if (currentThs.length !== columns.length) {
                scanColumns();
            }
            var allRows = getAllRows();
            var filtered = getFilteredRows();
            var pageSize = showSelect ? parseInt(showSelect.value, 10) || 10 : 10;
            var totalPages = Math.max(1, Math.ceil(filtered.length / pageSize));

            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            var startIdx = (currentPage - 1) * pageSize;
            var endIdx = startIdx + pageSize;

            isRendering = true;
            try {
                // Remove existing no-record-row
                var oldNoRec = tbody.querySelector('.no-record-row');
                if (oldNoRec) oldNoRec.remove();

                // Re-append filtered rows into tbody in sorted order so DOM reflects sort order
                filtered.forEach(function (tr) {
                    tbody.appendChild(tr);
                });

                // Hide all rows initially
                allRows.forEach(function (tr) {
                    tr.style.display = 'none';
                });

                if (filtered.length === 0) {
                    var noRec = document.createElement('tr');
                    noRec.className = 'no-record-row';
                    noRec.innerHTML = '<td colspan="' + columns.length + '" class="text-center text-muted py-4">No records found</td>';
                    tbody.appendChild(noRec);
                } else {
                    var pageRows = filtered.slice(startIdx, endIdx);
                    var isSnoCol = columns[0] && columns[0].isSno;
                    pageRows.forEach(function (tr, i) {
                        tr.style.display = '';
                        // Auto-update S.No
                        if (isSnoCol && tr.children[0]) {
                            var snoSpan = tr.children[0].querySelector('.sno-value');
                            var displaySno = (sortCol === 0 && sortDir === 'desc')
                                ? String(filtered.length - (startIdx + i))
                                : String(startIdx + i + 1);
                            if (snoSpan) {
                                snoSpan.textContent = displaySno;
                            } else {
                                tr.children[0].textContent = displaySno;
                            }
                        }
                    });
                }
            } finally {
                setTimeout(function () { isRendering = false; }, 30);
            }

            if (pgTotal) pgTotal.textContent = String(filtered.length);
            if (pgStart) pgStart.textContent = filtered.length ? String(startIdx + 1) : '0';
            if (pgEnd) pgEnd.textContent = filtered.length ? String(Math.min(endIdx, filtered.length)) : '0';

            renderPagination(totalPages);
            applyColumnVisibility();
            initTooltips();
        }

        // Listeners for Search and Show Entries
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                currentPage = 1;
                render();
            });
        }

        if (showSelect) {
            showSelect.addEventListener('change', function () {
                currentPage = 1;
                render();
            });
        }

        // MutationObserver on tbody to auto-update on row insertions/deletions
        var isRendering = false;
        var observer = new MutationObserver(function (mutations) {
            if (isRendering) return;
            var shouldUpdate = mutations.some(function (m) {
                return Array.from(m.addedNodes).some(function (n) {
                    return n.tagName === 'TR' && !n.classList.contains('no-record-row');
                }) || Array.from(m.removedNodes).some(function (n) {
                    return n.tagName === 'TR' && !n.classList.contains('no-record-row');
                });
            });

            if (shouldUpdate) {
                isRendering = true;
                render();
                setTimeout(function () { isRendering = false; }, 20);
            }
        });
        observer.observe(tbody, { childList: true });

        // Initial render
        render();

        // Exposed API on table
        table.autoTable = {
            refresh: function () {
                scanColumns();
                render();
            },
            render: function () {
                render();
            },
            goToPage: function (page) {
                currentPage = page;
                render();
            },
            addRow: function (trOrHtml) {
                var tr = trOrHtml;
                if (typeof trOrHtml === 'string') {
                    var tmp = document.createElement('tbody');
                    tmp.innerHTML = trOrHtml.trim();
                    tr = tmp.firstChild;
                }
                tbody.prepend(tr);
                currentPage = 1;
                render();
                return tr;
            },
            deleteRow: function (idOrTr) {
                var tr = typeof idOrTr === 'object' ? idOrTr : tbody.querySelector('tr[data-id="' + idOrTr + '"]');
                if (tr) {
                    tr.remove();
                    render();
                }
            },
            getFilteredRows: getFilteredRows,
            getAllRows: getAllRows
        };

        return table.autoTable;
    }

    // Auto-discover all tables on document
    function autoInit(container) {
        var root = container || document;
        var selector = 'table.datatable, table.data-table, table.table-auto, table.master-table';
        var tables = root.querySelectorAll(selector);
        tables.forEach(function (table) {
            if (table.dataset.autoTableInit === 'true' || table.dataset.masterTableInit === 'true') return;
            initTable(table);
        });
    }

    // Run automatically on DOMContentLoaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            autoInit();
        });
    } else {
        autoInit();
    }

    // Public exposure
    window.AutoMasterTable = {
        init: initTable,
        autoInit: autoInit
    };
    if (window.MasterTable) {
        window.MasterTable.autoInit = autoInit;
        window.MasterTable.bindTable = initTable;
    }

})(window, document);
