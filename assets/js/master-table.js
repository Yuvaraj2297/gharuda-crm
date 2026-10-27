/**
 * MasterTable — reusable table module for all master data pages.
 * Auto-creates offcanvas, export dropdown, and injects shared CSS.
 */
var MasterTable = (function () {
    'use strict';

    // ---- Inject shared CSS once ----
    var cssInjected = false;
    function injectCSS() {
        if (cssInjected) return;
        cssInjected = true;
        var style = document.createElement('style');
        style.textContent =
            /* Export dropdown */
            '.mt-export-menu{position:relative}' +
            '.mt-export-dropdown{position:fixed;z-index:1050;min-width:160px;background:#fff;border:1px solid var(--border-soft);border-radius:10px;box-shadow:0 8px 24px rgba(0,0,0,.12);padding:6px;display:none}' +
            '.mt-export-dropdown.show{display:block}' +
            '.mt-export-item{display:flex;align-items:center;width:100%;padding:8px 12px;font-size:12px;font-weight:600;font-family:"Manrope",sans-serif;color:var(--ink-700);background:none;border:none;border-radius:8px;cursor:pointer;transition:background .12s;text-align:left;white-space:nowrap}' +
            '.mt-export-item:hover{background:var(--primary-soft);color:var(--primary-dark)}' +
            '.mt-export-item i{font-size:14px;color:var(--ink-500)}' +
            '.mt-export-item:hover i{color:var(--primary)}' +
            /* Search */
            '.mt-search-wrap{position:relative}' +
            '.mt-search-icon{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#6c757d;font-size:14px;pointer-events:none}' +
            '.mt-search-input{border:1px solid var(--border-soft);border-radius:10px;padding:8px 14px 8px 36px;font-size:12.5px;font-weight:500;font-family:"Manrope",sans-serif;color:var(--ink-700);width:220px;transition:border-color .2s,box-shadow .2s}' +
            '.mt-search-input:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-soft)}' +
            '.mt-search-input::placeholder{color:#adb5bd;font-weight:500}' +
            /* Chevron */
            '.mt-export-trigger[aria-expanded="true"] .bi-chevron-down{transform:rotate(180deg)}' +
            '.bi-chevron-down{transition:transform .2s ease}'+
            /* Sort arrows */
            'th.sortable{cursor:pointer;user-select:none}'+
            'th.sortable .dt-col-header{display:flex;align-items:center;justify-content:space-between;gap:6px;width:100%}'+
            'th.sortable .sort-arrows{display:flex;flex-direction:column;line-height:1;flex-shrink:0}'+
            'th.sortable .sort-arrows i{font-size:10px;color:var(--ink-300);transition:color .15s}'+
            'th.sortable.sort-asc .sort-arrows .mdi-chevron-up,'+
            'th.sortable.sort-desc .sort-arrows .mdi-chevron-down{color:var(--primary)}';
        document.head.appendChild(style);
    }

    function escapeHtml(value) {
        return String(value).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#039;');
    }

    function init(cfg) {
        injectCSS();

        var data = Array.isArray(cfg.data) ? cfg.data.slice() : [];
        var nextId = data.reduce(function(m,r){ return Math.max(m,Number(r[cfg.primaryKey||'id'])||0); },0)+1;
        var currentPage = 1, sortCol = -1, sortDir = 'asc';
        var snoDesc = !!cfg.snoDesc; // S.No numbers count descending (N..1) instead of ascending (1..N)
        var colCount = cfg.columns.length + (cfg.hideSno ? 0 : 1);
        var colVisible = []; for(var ci=0;ci<colCount;ci++) colVisible.push(true);
        var colTitles = ['S.No']; cfg.columns.forEach(function(c){ colTitles.push(c.title); });

        // Fixed common IDs. cfg.idPrefix lets multiple MasterTable instances
        // co-exist on one page (e.g. main table + nested tables) without ID clashes.
        var pfx = cfg.idPrefix ? cfg.idPrefix + '-' : '';
        var ID = {
            offcanvas: pfx + 'mtOffcanvas', offcanvasBody: pfx + 'mtOffcanvasBody',
            columnsBtn: pfx + 'mtColumnsBtn', exportTrigger: pfx + 'mtExportTrigger', exportDropdown: pfx + 'mtExportDropdown',
            copy: pfx + 'mtCopyBtn', csv: pfx + 'mtCsvBtn', excel: pfx + 'mtExcelBtn', pdf: pfx + 'mtPdfBtn', print: pfx + 'mtPrintBtn',
            search: pfx + 'mtSearch', showEntries: pfx + 'mtShowEntries',
            pgStart: pfx + 'mtStart', pgEnd: pfx + 'mtEnd', pgTotal: pfx + 'mtTotal', pgList: pfx + 'pgList'
        };

        // Resolve table ref early
        var table = document.getElementById(cfg.tableId);
        if (table) {
            table.dataset.autoTableInit = 'true';
            table.dataset.masterTableInit = 'true';
        }
        var tableWrap = table ? (table.closest('.card-custom') || table.closest('.card') || (table.parentElement && table.parentElement.classList.contains('table-responsive') ? table.parentElement.parentElement : table.parentElement)) : null;

        // Graceful no-op: table (or tbody) missing in the DOM (e.g. panel not
        // rendered on the server). Return a safe stub so the calling script
        // keeps running and later tables on the page still initialise.
        var tbodyEarly = document.getElementById(cfg.tbodyId);
        if (!table || !tbodyEarly) {
            return {
                render: function() {}, addItem: function() {}, updateItem: function() {},
                deleteItem: function() {}, getNextId: function() { return 1; },
                getData: function() { return Array.isArray(cfg.data) ? cfg.data.slice() : []; },
                getFilteredRows: function() { return []; },
                refresh: function() {}, setData: function() {}
            };
        }

        // ---- Auto-create offcanvas ----
        if (!document.getElementById(ID.offcanvas)) {
            var oc = document.createElement('div');
            oc.className = 'offcanvas offcanvas-end'; oc.tabIndex = -1; oc.id = ID.offcanvas;
            oc.innerHTML = '<div class="offcanvas-header border-bottom border-light-subtle">' +
                '<h5 class="offcanvas-title fw-bold">Columns Visibility</h5>' +
                '<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button></div>' +
                '<div class="offcanvas-body" id="' + ID.offcanvasBody + '"></div>';
            document.body.appendChild(oc);
        }

        // ---- Auto-create toolbar ----
        function buildToolbar() {
            if (!tableWrap) return;
            if (document.getElementById(ID.columnsBtn) || tableWrap.querySelector('.columns-btn') || tableWrap.querySelector('.auto-table-toolbar')) return;
            var toolbar = document.createElement('div');
            toolbar.className = 'd-flex align-items-center justify-content-between flex-wrap gap-2 p-3 auto-table-toolbar';
            toolbar.innerHTML =
                '<div class="d-flex align-items-center gap-2 flex-wrap">' +
                    '<button type="button" class="btn columns-btn" id="' + ID.columnsBtn + '"><i class="bi bi-eye me-1"></i>Columns</button>' +
                    '<div class="mt-export-menu">' +
                        '<button type="button" class="btn export-btn-pdf mt-export-trigger" id="' + ID.exportTrigger + '" aria-expanded="false">' +
                            '<i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>' +
                        '<div class="mt-export-dropdown" id="' + ID.exportDropdown + '" role="menu">' +
                            '<button type="button" class="mt-export-item" id="' + ID.copy + '"><i class="bi bi-clipboard me-2"></i>Copy</button>' +
                            '<button type="button" class="mt-export-item" id="' + ID.csv + '"><i class="bi bi-filetype-csv me-2"></i>CSV</button>' +
                            '<button type="button" class="mt-export-item" id="' + ID.excel + '"><i class="bi bi-filetype-xlsx me-2"></i>Excel</button>' +
                            '<button type="button" class="mt-export-item" id="' + ID.pdf + '"><i class="bi bi-filetype-pdf me-2"></i>PDF</button>' +
                            '<button type="button" class="mt-export-item" id="' + ID.print + '"><i class="bi bi-printer me-2"></i>Print</button>' +
                        '</div></div></div>' +
                '<div class="mt-search-wrap"><i class="bi bi-search mt-search-icon"></i>' +
                    '<input type="text" class="mt-search-input" id="' + ID.search + '" placeholder="Search ' + (cfg.tableName || 'data').toLowerCase() + '..."></div>';
            var tableResponsive = tableWrap.querySelector('.table-responsive');
            if (tableResponsive) tableWrap.insertBefore(toolbar, tableResponsive);
            else tableWrap.appendChild(toolbar);
        }
        buildToolbar();

        // ---- Auto-create footer ----
        function buildFooter() {
            if (!tableWrap) return;
            if (document.getElementById(ID.showEntries) || tableWrap.querySelector('.report-footer')) return;
            var footer = document.createElement('div');
            footer.className = 'd-flex justify-content-between align-items-center report-footer p-3';
            footer.innerHTML =
                '<div class="d-flex gap-2 align-items-center">' +
                    '<span class="small text-muted text-nowrap">Show:</span>' +
                    '<select class="form-select form-select-sm gh-w-auto" id="' + ID.showEntries + '">' +
                        '<option selected>10</option><option>25</option><option>50</option><option>100</option></select>' +
                    '<span class="small text-muted text-nowrap">Showing <strong id="' + ID.pgStart + '">0</strong>&ndash;<strong id="' + ID.pgEnd + '">0</strong> of <strong id="' + ID.pgTotal + '">0</strong></span>' +
                '</div>' +
                '<nav><ul class="pagination pagination-sm mb-0" id="' + ID.pgList + '"></ul></nav>';
            tableWrap.appendChild(footer);
        }
        buildFooter();

        // ---- DOM refs ----
        var tbody = document.getElementById(cfg.tbodyId);
        var searchInput = document.getElementById(ID.search);
        var showSelect = document.getElementById(ID.showEntries);
        var pgList = document.getElementById(ID.pgList);
        var pgStart = document.getElementById(ID.pgStart);
        var pgEnd = document.getElementById(ID.pgEnd);
        var pgTotal = document.getElementById(ID.pgTotal);

        var creationModalEl = document.getElementById('creationModal');
        var editModalEl = document.getElementById('editModal');
        var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;
        var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

        function parseDateVal(str) {
            if (!str || typeof str !== 'string') return null;
            var s = str.trim();
            var dmy = s.match(/^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})(?:\s+(\d{1,2}):(\d{2})(?::(\d{2}))?)?$/);
            if (dmy) {
                var dt = new Date(parseInt(dmy[3], 10), parseInt(dmy[2], 10) - 1, parseInt(dmy[1], 10));
                if (!isNaN(dt.getTime())) return dt.getTime();
            }
            var ymd = s.match(/^(\d{4})[-\/](\d{1,2})[-\/](\d{1,2})(?:\s+(\d{1,2}):(\d{2})(?::(\d{2}))?)?$/);
            if (ymd) {
                var dt2 = new Date(parseInt(ymd[1], 10), parseInt(ymd[2], 10) - 1, parseInt(ymd[3], 10));
                if (!isNaN(dt2.getTime())) return dt2.getTime();
            }
            return null;
        }

        function parseNumVal(str) {
            if (typeof str === 'number') return str;
            if (!str || typeof str !== 'string') return null;
            var clean = str.trim().replace(/[₹$,\s%€£]/g, '');
            if (/^-?\d+(?:\.\d+)?$/.test(clean)) {
                var n = parseFloat(clean);
                if (!isNaN(n)) return n;
            }
            return null;
        }

        // ---- Filter + Sort ----
        function getFilteredRows() {
            var query = searchInput ? searchInput.value.trim().toLowerCase() : '';
            var rows = data.slice();
            if (query && cfg.searchFields) {
                rows = rows.filter(function(row){
                    return cfg.searchFields.some(function(f){
                        return String(row[f]||'').toLowerCase().includes(query);
                    });
                });
            }
            if (sortCol >= 0 && sortCol < cfg.columns.length) {
                var field = cfg.columns[sortCol].field;
                if (field) {
                    rows.sort(function(a,b){
                        var va = a[field] == null ? '' : a[field];
                        var vb = b[field] == null ? '' : b[field];
                        var da = parseDateVal(va), db = parseDateVal(vb);
                        if (da !== null && db !== null) return sortDir === 'asc' ? da - db : db - da;
                        var na = parseNumVal(va), nb = parseNumVal(vb);
                        if (na !== null && nb !== null) return sortDir === 'asc' ? na - nb : nb - na;
                        var cmp = String(va).localeCompare(String(vb), undefined, { numeric: true, sensitivity: 'base' });
                        return sortDir === 'asc' ? cmp : -cmp;
                    });
                }
            }
            return rows;
        }

        // ---- Build row ----
        function buildRowHtml(row, serialNo) {
            var pk = cfg.primaryKey||'id';
            var chk = cfg.showCheckbox ? '<input type="checkbox" class="form-check-input me-2 row-select" data-id="'+row[pk]+'"> ' : '';
            var cells = cfg.hideSno ? '' : '<td>'+chk+serialNo+'</td>';
            cfg.columns.forEach(function(col){
                var val = row[col.field];
                cells += '<td>'+(col.render?col.render(val,row,escapeHtml):escapeHtml(val))+'</td>';
            });
            return '<tr data-id="'+row[pk]+'">'+cells+'</tr>';
        }

        // ---- Render ----
        function renderTable() {
            var filtered = getFilteredRows();
            var pageSize = showSelect ? parseInt(showSelect.value,10)||10 : 10;
            var totalPages = Math.max(1, Math.ceil(filtered.length/pageSize));
            if(currentPage>totalPages) currentPage=totalPages;
            if(currentPage<1) currentPage=1;
            var startIdx = (currentPage-1)*pageSize;
            var pageRows = filtered.slice(startIdx, startIdx+pageSize);

            if(!pageRows.length){
                tbody.innerHTML='<tr><td colspan="'+colCount+'" class="text-center text-muted py-4">No records found</td></tr>';
            } else {
                tbody.innerHTML = pageRows.map(function(r,i){
                    /* snoDesc: highest number on the first row (N, N-1, ... 1) */
                    var sno = snoDesc ? (filtered.length - (startIdx + i)) : (startIdx + i + 1);
                    return buildRowHtml(r, sno);
                }).join('');
            }
            if(pgTotal) pgTotal.textContent=String(filtered.length);
            if(pgStart) pgStart.textContent=filtered.length?String(startIdx+1):'0';
            if(pgEnd) pgEnd.textContent=filtered.length?String(startIdx+pageRows.length):'0';
            renderPagination(totalPages);
            applyColumnVisibility();
            initTooltips();
        }

        // ---- Pagination ----
        function renderPagination(totalPages) {
            if(!pgList) return;
            pgList.innerHTML='';
            function addItem(label,page,opts){
                opts=opts||{};
                var li=document.createElement('li'); li.className='page-item';
                if(opts.active) li.classList.add('active');
                if(opts.disabled) li.classList.add('disabled');
                if(opts.ellipsis){ li.innerHTML='<span class="page-link">\u2026</span>'; pgList.appendChild(li); return; }
                var a=document.createElement('a'); a.className='page-link'; a.href='#'; a.innerHTML=label;
                if(!opts.disabled){ a.addEventListener('click',function(e){ e.preventDefault(); currentPage=page; renderTable(); }); }
                li.appendChild(a); pgList.appendChild(li);
            }
            addItem('<i class="mdi mdi-chevron-double-left"></i>',1,{disabled:currentPage===1});
            addItem('<i class="mdi mdi-chevron-left"></i>',currentPage-1,{disabled:currentPage===1});
            var maxB=5, sP=Math.max(1,currentPage-Math.floor(maxB/2)), eP=Math.min(totalPages,sP+maxB-1);
            if(eP-sP+1<maxB) sP=Math.max(1,eP-maxB+1);
            if(sP>1){ addItem('1',1); if(sP>2) addItem('',0,{ellipsis:true}); }
            for(var p=sP;p<=eP;p++) addItem(String(p),p,{active:p===currentPage});
            if(eP<totalPages){ if(eP<totalPages-1) addItem('',0,{ellipsis:true}); addItem(String(totalPages),totalPages); }
            addItem('<i class="mdi mdi-chevron-right"></i>',currentPage+1,{disabled:currentPage===totalPages});
            addItem('<i class="mdi mdi-chevron-double-right"></i>',totalPages,{disabled:currentPage===totalPages});
        }

        // ---- Column visibility ----
        function applyColumnVisibility() {
            if(!table) return;
            var ths = table.querySelectorAll('thead th');
            ths.forEach(function(th,i){
                if(i < colVisible.length) th.classList.toggle('d-none',!colVisible[i]);
            });
            tbody.querySelectorAll('tr').forEach(function(row){
                row.querySelectorAll('td').forEach(function(td,i){
                    if(i < colVisible.length) td.classList.toggle('d-none',!colVisible[i]);
                });
            });
        }

        function buildColumnToggles() {
            var body = document.getElementById(ID.offcanvasBody);
            if(!body) return;
            body.innerHTML='';
            colTitles.forEach(function(title,i){
                var row=document.createElement('div'); row.className='p-3 py-2 border rounded mb-2';
                row.innerHTML='<div class="d-flex form-check form-switch justify-content-between align-items-center mb-0 ps-0 w-100">'+
                    '<label class="form-check-label fw-semibold">'+title+'</label>'+
                    '<input class="form-check-input" type="checkbox" data-col-index="'+i+'" '+(colVisible[i]?'checked':'')+'></div>';
                body.appendChild(row);
            });
            var restoreBtn=document.createElement('button'); restoreBtn.type='button';
            restoreBtn.className='btn btn-sm btn-outline-primary mt-2'; restoreBtn.textContent='Restore All';
            restoreBtn.addEventListener('click',function(){
                for(var ri=0;ri<colCount;ri++) colVisible[ri]=true;
                body.querySelectorAll('input[type="checkbox"]').forEach(function(sw){sw.checked=true;});
                applyColumnVisibility();
            });
            body.appendChild(restoreBtn);
        }

        document.addEventListener('change',function(e){
            var body=document.getElementById(ID.offcanvasBody);
            if(!body||!body.contains(e.target)) return;
            var idx=parseInt(e.target.getAttribute('data-col-index'),10);
            if(!isNaN(idx)){ colVisible[idx]=e.target.checked; applyColumnVisibility(); }
        });

        // ---- Export helpers ----
        function getExportData(){
            var filtered=getFilteredRows(), headers=[], fieldIndices=[];
            cfg.columns.forEach(function(col,i){ if(colVisible[i+1]&&col.field){ headers.push(col.title); fieldIndices.push(i); } });
            var pk=cfg.primaryKey||'id';
            var rows=filtered.map(function(row){
                var r=[row[pk]]; fieldIndices.forEach(function(fi){
                    var col = cfg.columns[fi];
                    var val = row[col.field];
                    // For employee columns with render function, combine emp_id and name
                    if(col.field === 'emp_id' && row.name){
                        r.push(val + ' - ' + row.name);
                    } else {
                        r.push(val);
                    }
                }); return r;
            });
            headers.unshift('ID');
            return {headers:headers,rows:rows};
        }
        function downloadFile(c,f,m){ var b=new Blob(['\ufeff'+c],{type:m}),u=URL.createObjectURL(b),l=document.createElement('a'); l.href=u; l.download=f; document.body.appendChild(l); l.click(); document.body.removeChild(l); URL.revokeObjectURL(u); }
        function exportCSV(){ var d=getExportData(); downloadFile(d.headers.join(',')+'\n'+d.rows.map(function(r){return r.map(function(c){return '"'+String(c).replace(/"/g,'""')+'"';}).join(',');}).join('\n'),(cfg.tableName||'data')+'.csv','text/csv'); }
        function exportExcel(){
            var d=getExportData();
            var sheetTitle=(cfg.tableName||'Data').trim();
            var safeSheetName=sheetTitle.replace(/[\\\/:\*\?\[\]]/g,'').slice(0,31)||'Sheet1';
            var colWidths = d.headers.map(function(h){
                var title = (h || '').toLowerCase();
                if (/s\.?no|#/i.test(title)) return 60;
                if (/code|id|pin|zip/i.test(title)) return 100;
                if (/status|state/i.test(title)) return 110;
                if (/date|time|dob|created|updated/i.test(title)) return 130;
                if (/name|description|address|title|email/i.test(title)) return 200;
                return 150;
            });
            var colGroupHtml = '<colgroup>' + colWidths.map(function (w) {
                return '<col width="' + w + '" style="width:' + w + 'px;">';
            }).join('') + '</colgroup>';
            var headerRow='<tr style="height:28px;">'+d.headers.map(function(h,i){
                var align=/s\.?no|#|status|date/i.test(h)?'center':'left';
                var w = colWidths[i] || 150;
                return '<th style="background-color:#ffffff;color:#000000;font-family:Calibri,Arial,sans-serif;font-size:11pt;font-weight:bold;text-align:'+align+';vertical-align:middle;border:1px solid #000000;padding:6px 10px;width:'+w+'px;" width="'+w+'">'+h+'</th>';
            }).join('')+'</tr>';
            var dataRows=d.rows.map(function(r){
                return '<tr style="height:24px;">'+r.map(function(c,cIdx){
                    var h=d.headers[cIdx]||'';
                    var s=String(c==null?'':c).trim();
                    var align=(/s\.?no|#|status|date|code|id/i.test(h))?'center':'left';
                    return '<td style="background-color:#ffffff;color:#000000;font-family:Calibri,Arial,sans-serif;font-size:10pt;text-align:'+align+';vertical-align:middle;border:1px solid #000000;padding:5px 8px;mso-number-format:\'\\@\';">'+s+'</td>';
                }).join('')+'</tr>';
            }).join('');
            var html='<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>'+safeSheetName+'</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><style>body{font-family:Calibri,Arial,sans-serif;margin:0;padding:0;}table{border-collapse:collapse;font-family:Calibri,Arial,sans-serif;}th,td{border:1px solid #000000;}</style></head><body><table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;font-family:Calibri,Arial,sans-serif;">'+colGroupHtml+headerRow+dataRows+'</table></body></html>';
            downloadFile(html,(sheetTitle||'data')+'.xls','application/vnd.ms-excel');
        }
        function exportPDF(){ var d=getExportData(); var body=[d.headers.map(function(h){return{text:h,bold:true};})]; d.rows.forEach(function(r){body.push(r.map(function(c){return String(c);}));}); if(typeof pdfMake!=='undefined'){pdfMake.createPdf({content:[{table:{headerRows:1,body:body}}],defaultStyle:{fontSize:10}}).download((cfg.tableName||'data')+'.pdf');}else{alert('PDF library not loaded.');} }
        function printTable(){ var d=getExportData(); var w=window.open('','_blank'); w.document.write('<html><head><title>'+(cfg.tableName||'Data')+'</title><style>table{border-collapse:collapse;width:100%}th,td{border:1px solid #ddd;padding:8px;text-align:left}th{background:#f5f5f5;font-weight:bold}</style></head><body><h2>'+(cfg.tableName||'Data')+'</h2><table><thead><tr>'+d.headers.map(function(h){return '<th>'+h+'</th>';}).join('')+'</tr></thead><tbody>'+d.rows.map(function(r){return '<tr>'+r.map(function(c){return '<td>'+c+'</td>';}).join('')+'</tr>';}).join('')+'</tbody></table></body></html>'); w.document.close(); w.print(); }
        function copyToClipboard(){ var d=getExportData(); navigator.clipboard.writeText(d.headers.join('\t')+'\n'+d.rows.map(function(r){return r.join('\t');}).join('\n')).then(function(){alert('Copied!');}).catch(function(){alert('Copy failed.');}); }

        // ---- Export dropdown ----
        var exportTrigger=document.getElementById(ID.exportTrigger);
        var exportDropdown=document.getElementById(ID.exportDropdown);

        function positionExportDropdown(){
            if(!exportDropdown||!exportDropdown.classList.contains('show')) return;
            var rect=exportTrigger.getBoundingClientRect(), ddW=exportDropdown.offsetWidth||160, ddH=exportDropdown.offsetHeight||200;
            var left=rect.left+(rect.width/2)-(ddW/2); left=Math.max(8,Math.min(left,window.innerWidth-ddW-8));
            var top=rect.bottom+6; if(top+ddH>window.innerHeight-8) top=rect.top-ddH-6;
            exportDropdown.style.left=left+'px'; exportDropdown.style.top=Math.max(8,top)+'px';
        }
        function closeExportDropdown(){ if(exportDropdown) exportDropdown.classList.remove('show'); if(exportTrigger) exportTrigger.setAttribute('aria-expanded','false'); }

        if(exportTrigger&&exportDropdown){
            exportTrigger.addEventListener('click',function(e){
                e.stopPropagation();
                document.querySelectorAll('.mt-export-dropdown.show').forEach(function(d){d.classList.remove('show');});
                if(!exportDropdown.classList.contains('show')){ exportDropdown.classList.add('show'); exportTrigger.setAttribute('aria-expanded','true'); positionExportDropdown(); }
                else closeExportDropdown();
            });
            document.addEventListener('click',function(e){ if(!exportDropdown.contains(e.target)&&e.target!==exportTrigger) closeExportDropdown(); });
            window.addEventListener('resize',positionExportDropdown);
            window.addEventListener('scroll',positionExportDropdown,true);
        }

        function bindExportBtn(id,fn){ var el=document.getElementById(id); if(el) el.addEventListener('click',function(){closeExportDropdown();fn();}); }
        bindExportBtn(ID.copy,copyToClipboard);
        bindExportBtn(ID.csv,exportCSV);
        bindExportBtn(ID.excel,exportExcel);
        bindExportBtn(ID.pdf,exportPDF);
        bindExportBtn(ID.print,printTable);

        // ---- Columns button ----
        var columnsBtn=document.getElementById(ID.columnsBtn);
        if(columnsBtn){
            columnsBtn.addEventListener('click',function(){
                buildColumnToggles();
                var el=document.getElementById(ID.offcanvas);
                if(el){ var oc=bootstrap.Offcanvas.getOrCreateInstance(el); oc.show(); }
            });
        }

        // ---- Tooltip ----
        function initTooltips(){
            if(!table) return;
            table.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el){
                var ex=bootstrap.Tooltip.getInstance(el); if(ex) ex.dispose();
                var tip=new bootstrap.Tooltip(el,{trigger:'hover'});
                el.addEventListener('click',function(){ tip.hide(); });
            });
        }

        // ---- Search ----
        if(searchInput) searchInput.addEventListener('input',function(){currentPage=1;renderTable();});
        // ---- Show entries ----
        if(showSelect) showSelect.addEventListener('change',function(){currentPage=1;renderTable();});

        // ---- Sort ----
        // Collect all data <th> elements from headers (skipping S.No and colspan-only headers)
        function getAllSortableTh(){
            if(!table) return [];
            var result = [];
            var theadRows = table.querySelectorAll('thead tr');
            if(theadRows.length <= 1){
                // Single row header — skip first th (S.No) unless hideSno
                var first = !cfg.hideSno;
                theadRows[0].querySelectorAll('th').forEach(function(th){
                    if(first){ first = false; return; } // skip S.No
                    result.push(th);
                });
            } else {
                // Multi-row header
                var firstRow = theadRows[0];
                var first = !cfg.hideSno;
                firstRow.querySelectorAll('th').forEach(function(th){
                    if(first){ first = false; return; } // skip S.No (rowspan)
                    if(!th.getAttribute('colspan')) result.push(th); // only rowspan th
                });
                var lastRow = theadRows[theadRows.length - 1];
                lastRow.querySelectorAll('th').forEach(function(th){ result.push(th); });
            }
            return result;
        }
        function updateSortArrows(){
            var allTh = getAllSortableTh();
            var idx = 0;
            allTh.forEach(function(th){
                th.classList.remove('sort-asc','sort-desc');
                while(idx < cfg.columns.length && cfg.columns[idx] && !cfg.columns[idx].sortable) idx++;
                if(idx === sortCol) th.classList.add(sortDir==='asc'?'sort-asc':'sort-desc');
                idx++;
            });
        }
        if(table){
            var allTh = getAllSortableTh();
            var sortIdx = 0;
            allTh.forEach(function(th){
                while(sortIdx < cfg.columns.length && cfg.columns[sortIdx] && !cfg.columns[sortIdx].sortable) sortIdx++;
                if(sortIdx >= cfg.columns.length) return;
                th.classList.add('sortable');
                if(!th.querySelector('.dt-col-header')){
                    var txt=th.textContent.trim();
                    th.innerHTML='<span class="dt-col-header"><span>'+txt+'</span><span class="sort-arrows"><i class="mdi mdi-chevron-up"></i><i class="mdi mdi-chevron-down"></i></span></span>';
                }
                var colIdx = sortIdx;
                th.addEventListener('click',function(e){
                    var upClicked = e.target.closest('.mdi-chevron-up');
                    var downClicked = e.target.closest('.mdi-chevron-down');
                    if (upClicked) {
                        sortCol = colIdx;
                        sortDir = 'asc';
                    } else if (downClicked) {
                        sortCol = colIdx;
                        sortDir = 'desc';
                    } else {
                        if(sortCol===colIdx) sortDir=sortDir==='asc'?'desc':'asc';
                        else{ sortCol=colIdx; sortDir='asc'; }
                    }
                    updateSortArrows();
                    renderTable();
                });
                sortIdx++;
            });
        }

        // ---- Select-all checkbox ----
        if(cfg.showCheckbox && table){
            var firstTh = table.querySelector('thead th');
            if(firstTh){
                var chk = document.createElement('input');
                chk.type='checkbox'; chk.className='form-check-input me-2 select-all-chk';
                firstTh.innerHTML='';
                firstTh.appendChild(chk);
                firstTh.appendChild(document.createTextNode('S.No'));
                firstTh.style.textAlign='center';
                firstTh.style.verticalAlign='middle';
                chk.addEventListener('change',function(){
                    tbody.querySelectorAll('.row-select').forEach(function(r){ r.checked=chk.checked; });
                });
            }
        }

        // ---- Row actions ----
        if(tbody){
            tbody.addEventListener('click',function(e){
                var editBtn=e.target.closest('.btn-edit'), deleteBtn=e.target.closest('.btn-delete');
                var pk=cfg.primaryKey||'id';
                if(editBtn&&cfg.onEdit){
                    var id=Number(editBtn.getAttribute('data-id'));
                    var record=data.find(function(r){return Number(r[pk])===id;});
                    if(record) cfg.onEdit(record,editModal);
                }
                if(deleteBtn&&cfg.onDelete){
                    cfg.onDelete(Number(deleteBtn.getAttribute('data-id')),data);
                    renderTable();
                }
            });
        }

        // ---- CRUD ----
        function addItem(row){ data.unshift(row); currentPage=1; renderTable(); }
        function updateItem(id,updates){
            var pk=cfg.primaryKey||'id';
            data=data.map(function(r){
                if(Number(r[pk])===id){ var m={}; for(var k in r)m[k]=r[k]; for(var u in updates)m[u]=updates[u]; return m; }
                return r;
            });
            renderTable();
        }
        function deleteItem(id){ var pk=cfg.primaryKey||'id'; data=data.filter(function(r){return Number(r[pk])!==id;}); renderTable(); }
        function getNextId(){ return nextId++; }

        // Only render rows if not skipRender (e.g. PHP-rendered tables)
        if (cfg.skipRender) {
            // Still set up pagination info for PHP-rendered tables
            var filtered = getFilteredRows();
            var pageSize = showSelect ? parseInt(showSelect.value, 10) || 10 : 10;
            var totalPages = Math.max(1, Math.ceil(filtered.length / pageSize));
            if (pgTotal) pgTotal.textContent = String(filtered.length);
            if (pgStart) pgStart.textContent = filtered.length ? '1' : '0';
            if (pgEnd) pgEnd.textContent = filtered.length ? String(Math.min(pageSize, filtered.length)) : '0';
            renderPagination(totalPages);
            applyColumnVisibility();
            initTooltips();
        } else {
            renderTable();
        }

        return { render:renderTable, addItem:addItem, updateItem:updateItem, deleteItem:deleteItem, getNextId:getNextId, getData:function(){return data;}, getFilteredRows:getFilteredRows, refresh:function(){currentPage=1;renderTable();}, setData:function(newArr){ data=newArr.slice(); currentPage=1; renderTable(); } };
    }

    return { init:init, injectCSS:injectCSS };
})();
