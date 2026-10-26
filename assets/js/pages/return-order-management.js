/**
 * Gharuda CRM - Return Order Management Page Script
 * File: assets/js/pages/return-order-management.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var $ = window.jQuery;
    var esc = function (v) {
        return String(v == null ? '' : v)
            .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    };
    function $id(id) { return document.getElementById(id); }

    /* ---- Static Sample Data ---- */
    function mk(o) {
        return $.extend({
            id: 0, order_no: '', customer: '', total_amount: 0, discount: 0,
            total_after_discount: 0, date_created: '', type: '', status: 'Draft',
            staff: '', notes: ''
        }, o);
    }

    var allData = [
        mk({ id: 1, order_no: 'ORN-0001', customer: 'Abcd c',               total_amount: 5000,  discount: 200,  total_after_discount: 4800,  date_created: '07-10-2026', type: 'Return',  status: 'Approved', staff: 'Ravi Kumar',  notes: '' }),
        mk({ id: 2, order_no: 'ORN-0002', customer: 'Sri Ganesh Traders',   total_amount: 12000, discount: 1000, total_after_discount: 11000, date_created: '06-10-2026', type: 'Receive', status: 'Draft',    staff: 'Admin User', notes: 'Stock reconciliation' }),
        mk({ id: 3, order_no: 'ORN-0003', customer: 'Kovai Metals Pvt Ltd', total_amount: 8500,  discount: 500,  total_after_discount: 8000,  date_created: '02-10-2026', type: 'Export',  status: 'Approved', staff: 'Priya S',    notes: 'Export shipment' }),
        mk({ id: 4, order_no: 'ORN-0004', customer: 'Anand Industries',     total_amount: 3200,  discount: 0,    total_after_discount: 3200,  date_created: '28-09-2026', type: 'Return',  status: 'Reject',   staff: 'Karthik M',  notes: 'Mismatch entry' }),
        mk({ id: 5, order_no: 'ORN-0005', customer: 'Lakshmi Enterprises',  total_amount: 15000, discount: 2000, total_after_discount: 13000, date_created: '25-09-2026', type: 'Receive', status: 'Approved', staff: 'Ravi Kumar',  notes: '' })
    ];

    function findById(id) { return allData.filter(function (r) { return r.id === id; })[0]; }

    var ST_CLASS = {
        'Approved': 'rom-status-approved',
        'Adjusted': 'rom-status-adjusted',
        'Draft':    'rom-status-draft',
        'Reject':   'rom-status-reject'
    };

    /* ---- Table Columns ---- */
    var cols = [
        { field: 'order_no',             title: 'Order Return Number',  sortable: true },
        { field: 'customer',             title: 'Customer name',        sortable: true },
        { field: 'total_amount',         title: 'Total amount',         sortable: true,
            render: function (v) { return '&#8377;' + Number(v).toLocaleString('en-IN'); } },
        { field: 'discount',             title: 'Discount total',       sortable: true,
            render: function (v) { return '&#8377;' + Number(v).toLocaleString('en-IN'); } },
        { field: 'total_after_discount', title: 'Total after discount', sortable: true,
            render: function (v) { return '&#8377;' + Number(v).toLocaleString('en-IN'); } },
        { field: 'date_created',         title: 'Date created',         sortable: true },
        { field: 'type',                 title: 'Type',                 sortable: true },
        { field: 'status',               title: 'Status',               sortable: true,
            render: function (v) {
                return '<span class="rom-status-pill ' + (ST_CLASS[v] || 'rom-status-draft') + '">' + esc(v) + '</span>';
            }
        },
        { field: null, title: 'Options', sortable: false,
            render: function (v, r) {
                return '<div class="rom-actions">' +
                    '<button type="button" class="rom-act rom-act-view" data-rom-action="view" data-id="' + r.id + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View"><i class="bi bi-eye"></i></button>' +
                    '<button type="button" class="rom-act rom-act-delete" data-rom-action="delete" data-id="' + r.id + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="bi bi-x-lg"></i></button>' +
                    '</div>';
            }
        }
    ];

    var table = MasterTable.init({
        tableId:      'romTable',
        tbodyId:      'romTbody',
        data:         allData,
        tableName:    'Return Order Management',
        primaryKey:   'id',
        showCheckbox: false,
        searchFields: ['order_no', 'customer', 'type', 'status', 'date_created', 'staff'],
        columns:      cols
    });

    /* ---- Table Click Actions ---- */
    $id('romTbody').addEventListener('click', function (e) {
        var act = e.target.closest('[data-rom-action]');
        if (act) {
            e.preventDefault();
            handleRomAction(act.getAttribute('data-rom-action'), Number(act.getAttribute('data-id')));
        }
    });

    /* ---- Filters ---- */
    var FILTERS = [
        { id: 'f_from_date', label: 'From date' },
        { id: 'f_to_date',   label: 'To date'   },
        { id: 'f_type',      label: 'Type'      },
        { id: 'f_staff',     label: 'Staff'     },
        { id: 'f_status',    label: 'Status'    }
    ];
    var applied = {};

    function readControls() {
        var o = {};
        FILTERS.forEach(function (f) {
            o[f.id] = String($('#' + f.id).val() || '').trim();
        });
        return o;
    }

    function runFilter() {
        var f = applied;
        var rows = allData.filter(function (r) {
            if (f.f_status && r.status !== f.f_status) return false;
            if (f.f_type   && r.type   !== f.f_type)   return false;
            if (f.f_staff  && r.staff  !== f.f_staff)  return false;
            if (f.f_from_date || f.f_to_date) {
                var parts   = r.date_created.split('-'); // DD-MM-YYYY
                var rowDate = parts[2] + '-' + parts[1] + '-' + parts[0];
                if (f.f_from_date && rowDate < f.f_from_date) return false;
                if (f.f_to_date   && rowDate > f.f_to_date)   return false;
            }
            return true;
        });
        table.setData(rows);
        renderChips();
    }

    function renderChips() {
        var list = $id('romActiveList'), n = 0;
        list.innerHTML = '';
        FILTERS.forEach(function (f) {
            var v = applied[f.id];
            if (!v) return;
            n++;
            var chip  = document.createElement('span');
            chip.className = 'leave-chip';
            var txt   = document.createElement('span');
            txt.textContent = f.label + ': ' + v;
            var close = document.createElement('button');
            close.type = 'button';
            close.className = 'leave-chip-close';
            close.innerHTML = '&times;';
            close.addEventListener('click', function () {
                setControl(f.id, '');
                applied[f.id] = '';
                runFilter();
            });
            chip.appendChild(txt);
            chip.appendChild(close);
            list.appendChild(chip);
        });
        $id('romActiveBar').hidden = !n;
    }

    function setControl(id, v) {
        var el = $id(id);
        if (el && el.tagName === 'SELECT') $('#' + id).val(v).trigger('change');
        else if (el) el.value = v;
    }

    $id('romApply').addEventListener('click', function () {
        applied = readControls();
        runFilter();
    });

    function clearAll() {
        FILTERS.forEach(function (f) { setControl(f.id, ''); });
        applied = {};
        runFilter();
    }
    $id('romClear').addEventListener('click', clearAll);
    $id('romActiveClear').addEventListener('click', clearAll);

    $id('romFiltersToggle').addEventListener('click', function () {
        var panel = $id('romFiltersCollapse'), open = panel.classList.toggle('open');
        this.classList.toggle('open', open);
        this.querySelector('span').textContent = open ? 'Hide Filters' : 'Filters';
    });

    applied = readControls();
    runFilter();

    /* ---- Total After Discount Auto-calc ---- */
    function calcDiscount() {
        var total    = parseFloat($id('rom_total_amount').value) || 0;
        var discount = parseFloat($id('rom_discount').value)     || 0;
        $id('rom_total_after_discount').value = (total - discount).toFixed(2);
    }
    $id('rom_total_amount').addEventListener('input', calcDiscount);
    $id('rom_discount').addEventListener('input', calcDiscount);

    /* ---- Add Modal ---- */
    var modalEl = $id('romModal');
    var modal   = bootstrap.Modal.getOrCreateInstance(modalEl);
    var $m      = $(modalEl);

    function initSelect2(scope, root) {
        scope.find('select.select2').each(function () {
            var $el = $(this);
            if ($el.data('select2')) $el.select2('destroy');
            $el.select2({ width: '100%', dropdownParent: root });
        });
    }

    modalEl.addEventListener('shown.bs.modal', function () { initSelect2($m, $m); });

    function openRomModal() {
        $id('romForm').reset();
        $m.find('select.select2').val('').trigger('change.select2');
        $id('rom_total_after_discount').value = '';
        modal.show();
    }

    $id('btnRomReceiptReturn').addEventListener('click', function () {
        var rrModalEl  = $id('receiptReturnModal');
        var rrModal    = bootstrap.Modal.getOrCreateInstance(rrModalEl);
        var $rr        = $(rrModalEl);

        // Reset form
        $id('receiptReturnForm').reset();
        $id('rr_order_date').value   = new Date().toISOString().slice(0,16);
        $id('rr_date_created').value = new Date().toISOString().slice(0,16);
        $id('rrItemsTbody').innerHTML =
            '<tr id="rrNoItems"><td colspan="9" style="padding:18px;text-align:center;border:1px solid #e2e8f0;color:#94a3b8;font-size:12.5px;">' +
            '<i class="bi bi-plus-circle me-1"></i> Click the <strong>+</strong> button above to add items</td></tr>';
        $id('rr_subtotal').textContent      = '₹ 0.00';
        $id('rr_total_discount').textContent = '₹ 0.00';
        $id('rr_total_payment').textContent  = '₹ 0.00';
        $id('rr_add_discount').value = 0;

        rrModalEl.addEventListener('shown.bs.modal', function onShown() {
            $rr.find('select.select2').each(function () {
                var $el = $(this);
                if ($el.data('select2')) $el.select2('destroy');
                $el.select2({ width: '100%', dropdownParent: $rr });
            });
            rrModalEl.removeEventListener('shown.bs.modal', onShown);
        }, { once: true });

        // Add item row
        var rrRowCount = 0;
        $id('btnRrAddItem').onclick = function () {
            rrRowCount++;
            var noRow = $id('rrNoItems');
            if (noRow) noRow.remove();
            var tr = document.createElement('tr');
            tr.id  = 'rrRow_' + rrRowCount;
            tr.innerHTML =
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="text" class="form-control form-control-sm rr-item-name" placeholder="Item name">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="number" class="form-control form-control-sm rr-qty" value="1" min="0" step="0.01">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="number" class="form-control form-control-sm rr-rate" value="0" min="0" step="0.01">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="number" class="form-control form-control-sm rr-tax" value="0" min="0" step="0.01" placeholder="%">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;text-align:right;" class="rr-subtotal-cell">0.00</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="number" class="form-control form-control-sm rr-discount-pct" value="0" min="0" max="100" step="0.01" placeholder="%">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;text-align:right;" class="rr-discount-money-cell">0.00</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;text-align:right;font-weight:600;" class="rr-total-cell">0.00</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;text-align:center;">' +
                    '<button type="button" class="btn btn-sm btn-danger px-2  rr-del-row" data-row="rrRow_' + rrRowCount + '" style="font-size:11px;"><i class="bi bi-trash"></i></button>' +
                '</td>';
            $id('rrItemsTbody').appendChild(tr);

            // Row calc on input change
            tr.addEventListener('input', function () { calcRrRow(tr); calcRrSummary(); });
        };

        function calcRrRow(tr) {
            var qty      = parseFloat(tr.querySelector('.rr-qty').value)          || 0;
            var rate     = parseFloat(tr.querySelector('.rr-rate').value)         || 0;
            var tax      = parseFloat(tr.querySelector('.rr-tax').value)          || 0;
            var discPct  = parseFloat(tr.querySelector('.rr-discount-pct').value) || 0;
            var subtotal = qty * rate * (1 + tax / 100);
            var discMon  = subtotal * discPct / 100;
            var total    = subtotal - discMon;
            tr.querySelector('.rr-subtotal-cell').textContent     = subtotal.toFixed(2);
            tr.querySelector('.rr-discount-money-cell').textContent = discMon.toFixed(2);
            tr.querySelector('.rr-total-cell').textContent        = total.toFixed(2);
        }

        function calcRrSummary() {
            var subtotal = 0, discMon = 0, totalPay = 0;
            $id('rrItemsTbody').querySelectorAll('tr').forEach(function (tr) {
                var sc = tr.querySelector('.rr-subtotal-cell');
                var dc = tr.querySelector('.rr-discount-money-cell');
                var tc = tr.querySelector('.rr-total-cell');
                if (sc) subtotal += parseFloat(sc.textContent) || 0;
                if (dc) discMon  += parseFloat(dc.textContent) || 0;
                if (tc) totalPay += parseFloat(tc.textContent) || 0;
            });
            var addDisc = parseFloat($id('rr_add_discount').value) || 0;
            discMon  += addDisc;
            totalPay -= addDisc;
            $id('rr_subtotal').textContent       = '₹ ' + subtotal.toFixed(2);
            $id('rr_total_discount').textContent  = '₹ ' + discMon.toFixed(2);
            $id('rr_total_payment').textContent   = '₹ ' + totalPay.toFixed(2);
        }

        $id('rr_add_discount').addEventListener('input', calcRrSummary);

        // Delete row
        $id('rrItemsTbody').addEventListener('click', function (e) {
            var btn = e.target.closest('.rr-del-row');
            if (btn) {
                var rowId = btn.getAttribute('data-row');
                var row   = $id(rowId);
                if (row) row.remove();
                if (!$id('rrItemsTbody').querySelector('tr')) {
                    $id('rrItemsTbody').innerHTML =
                        '<tr id="rrNoItems"><td colspan="9" style="padding:18px;text-align:center;border:1px solid #e2e8f0;color:#94a3b8;font-size:12.5px;">' +
                        '<i class="bi bi-plus-circle me-1"></i> Click the <strong>+</strong> button above to add items</td></tr>';
                }
                calcRrSummary();
            }
        });

        // Save
        $id('btnRrSave').onclick = function () {
            if (!$('#rr_customer').val()) { alert('Please select a Customer.'); return; }
            alert('Receipt return order saved successfully!');
            rrModal.hide();
        };
        $id('btnRrSaveSend').onclick = function () {
            if (!$('#rr_customer').val()) { alert('Please select a Customer.'); return; }
            alert('Receipt return order saved and request sent!');
            rrModal.hide();
        };

        rrModal.show();
    });

    $id('btnRomDeliveryReturn').addEventListener('click', function () {
        var drModalEl  = $id('deliveryReturnModal');
        var drModal    = bootstrap.Modal.getOrCreateInstance(drModalEl);
        var $dr        = $(drModalEl);

        // Reset form
        $id('deliveryReturnForm').reset();
        $id('dr_order_date').value   = new Date().toISOString().slice(0,16);
        $id('dr_date_created').value = new Date().toISOString().slice(0,16);
        $id('dr_return_no').value    = 'DELIVERY_RETURN' + new Date().toISOString().slice(0,10).replace(/-/g,'') + Math.floor(10000 + Math.random() * 90000);
        $id('drItemsTbody').innerHTML =
            '<tr id="drNoItems"><td colspan="9" style="padding:18px;text-align:center;border:1px solid #e2e8f0;color:#94a3b8;font-size:12.5px;">' +
            '<i class="bi bi-plus-circle me-1"></i> Click the <strong>+</strong> button above to add items</td></tr>';
        $id('dr_subtotal').textContent       = '₹ 0.00';
        $id('dr_total_discount').textContent = '-₹ 0.00';
        $id('dr_total_payment').textContent  = '₹ 0.00';
        $id('dr_add_discount').value = 0;

        drModalEl.addEventListener('shown.bs.modal', function onShown() {
            $dr.find('select.select2').each(function () {
                var $el = $(this);
                if ($el.data('select2')) $el.select2('destroy');
                $el.select2({ width: '100%', dropdownParent: $dr });
            });
            drModalEl.removeEventListener('shown.bs.modal', onShown);
        }, { once: true });

        // Add item row
        var drRowCount = 0;
        $id('btnDrAddItem').onclick = function () {
            drRowCount++;
            var noRow = $id('drNoItems');
            if (noRow) noRow.remove();
            var tr = document.createElement('tr');
            tr.id  = 'drRow_' + drRowCount;
            tr.innerHTML =
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="text" class="form-control form-control-sm dr-item-name" placeholder="Item name">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="number" class="form-control form-control-sm dr-qty" value="1" min="0" step="0.01">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="number" class="form-control form-control-sm dr-price" value="0" min="0" step="0.01">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="number" class="form-control form-control-sm dr-tax" value="0" min="0" step="0.01" placeholder="%">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;text-align:right;" class="dr-subtotal-cell">0.00</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;">' +
                    '<input type="number" class="form-control form-control-sm dr-discount-pct" value="0" min="0" max="100" step="0.01" placeholder="%">' +
                '</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;text-align:right;" class="dr-discount-money-cell">0.00</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;text-align:right;font-weight:600;" class="dr-total-cell">0.00</td>' +
                '<td style="padding:6px;border:1px solid #e2e8f0;text-align:center;">' +
                    '<button type="button" class="btn btn-sm btn-danger px-2 dr-del-row" data-row="drRow_' + drRowCount + '" style="font-size:11px;"><i class="bi bi-trash"></i></button>' +
                '</td>';
            $id('drItemsTbody').appendChild(tr);

            // Row calc on input change
            tr.addEventListener('input', function () { calcDrRow(tr); calcDrSummary(); });
        };

        function calcDrRow(tr) {
            var qty      = parseFloat(tr.querySelector('.dr-qty').value)          || 0;
            var price    = parseFloat(tr.querySelector('.dr-price').value)        || 0;
            var tax      = parseFloat(tr.querySelector('.dr-tax').value)          || 0;
            var discPct  = parseFloat(tr.querySelector('.dr-discount-pct').value) || 0;
            var subtotal = qty * price * (1 + tax / 100);
            var discMon  = subtotal * discPct / 100;
            var total    = subtotal - discMon;
            tr.querySelector('.dr-subtotal-cell').textContent       = subtotal.toFixed(2);
            tr.querySelector('.dr-discount-money-cell').textContent = discMon.toFixed(2);
            tr.querySelector('.dr-total-cell').textContent          = total.toFixed(2);
        }

        function calcDrSummary() {
            var subtotal = 0, discMon = 0, totalPay = 0;
            $id('drItemsTbody').querySelectorAll('tr').forEach(function (tr) {
                var sc = tr.querySelector('.dr-subtotal-cell');
                var dc = tr.querySelector('.dr-discount-money-cell');
                var tc = tr.querySelector('.dr-total-cell');
                if (sc) subtotal += parseFloat(sc.textContent) || 0;
                if (dc) discMon  += parseFloat(dc.textContent) || 0;
                if (tc) totalPay += parseFloat(tc.textContent) || 0;
            });
            var addDisc = parseFloat($id('dr_add_discount').value) || 0;
            discMon  += addDisc;
            totalPay -= addDisc;
            $id('dr_subtotal').textContent       = '₹ ' + subtotal.toFixed(2);
            $id('dr_total_discount').textContent = '-₹ ' + discMon.toFixed(2);
            $id('dr_total_payment').textContent  = '₹ ' + totalPay.toFixed(2);
        }

        $id('dr_add_discount').addEventListener('input', calcDrSummary);

        // Delete row
        $id('drItemsTbody').addEventListener('click', function (e) {
            var btn = e.target.closest('.dr-del-row');
            if (btn) {
                var rowId = btn.getAttribute('data-row');
                var row   = $id(rowId);
                if (row) row.remove();
                if (!$id('drItemsTbody').querySelector('tr')) {
                    $id('drItemsTbody').innerHTML =
                        '<tr id="drNoItems"><td colspan="9" style="padding:18px;text-align:center;border:1px solid #e2e8f0;color:#94a3b8;font-size:12.5px;">' +
                        '<i class="bi bi-plus-circle me-1"></i> Click the <strong>+</strong> button above to add items</td></tr>';
                }
                calcDrSummary();
            }
        });

        // Save
        $id('btnDrSave').onclick = function () {
            if (!$('#dr_vendor').val()) { alert('Please select a Vendor.'); return; }
            if (!$id('dr_email').value.trim()) { alert('Please enter Email.'); return; }
            if (!$id('dr_phone').value.trim()) { alert('Please enter Phone Number.'); return; }
            alert('Delivery return purchasing goods saved successfully!');
            drModal.hide();
        };
        $id('btnDrSaveSend').onclick = function () {
            if (!$('#dr_vendor').val()) { alert('Please select a Vendor.'); return; }
            if (!$id('dr_email').value.trim()) { alert('Please enter Email.'); return; }
            if (!$id('dr_phone').value.trim()) { alert('Please enter Phone Number.'); return; }
            alert('Delivery return purchasing goods saved and request sent!');
            drModal.hide();
        };

        drModal.show();
    });

    $id('btnRomSave').addEventListener('click', function () {
        var orderNo  = $id('rom_order_no').value.trim();
        var customer = $('#rom_customer').val();
        var type     = $('#rom_type').val();
        var staff    = $('#rom_staff').val();

        if (!orderNo)  { alert('Please enter Order Return Number.'); return; }
        if (!customer) { alert('Please select Customer.'); return; }
        if (!type)     { alert('Please select Type.'); return; }
        if (!staff)    { alert('Please select Staff.'); return; }

        alert('Return Order saved successfully!');
        modal.hide();
    });

    /* ---- View Modal ---- */
    var viewEl    = $id('romViewModal');
    var viewModal = bootstrap.Modal.getOrCreateInstance(viewEl);

    function handleRomAction(action, id) {
        var rec = findById(id);
        if (!rec) return;

        if (action === 'view') {
            var statusEl  = $id('vwRomStatusBadge');
            var statusVal = rec.status || 'Draft';
            statusEl.textContent = statusVal;
            statusEl.className   = 'vw-status-badge ' + statusVal.toLowerCase();

            $id('vwRomOrderNo').textContent     = rec.order_no     || '\u2014';
            $id('vwRomCustomer').textContent    = rec.customer     || '\u2014';
            $id('vwRomType').textContent        = rec.type         || '\u2014';
            $id('vwRomStaff').textContent       = rec.staff        || '\u2014';
            $id('vwRomDateCreated').textContent = rec.date_created || '\u2014';
            $id('vwRomTotal').textContent       = rec.total_amount         ? '\u20B9' + Number(rec.total_amount).toLocaleString('en-IN')         : '\u2014';
            $id('vwRomDiscount').textContent    = '\u20B9' + Number(rec.discount || 0).toLocaleString('en-IN');
            $id('vwRomTotalAfter').textContent  = rec.total_after_discount ? '\u20B9' + Number(rec.total_after_discount).toLocaleString('en-IN') : '\u2014';

            var notesEl = $id('vwRomNotes');
            notesEl.innerHTML = rec.notes
                ? esc(rec.notes)
                : '<span class="empty">No notes provided</span>';

            viewModal.show();

        } else if (action === 'delete') {
            if (confirm('Are you sure you want to delete this record?')) {
                allData = allData.filter(function (item) { return item.id !== id; });
                runFilter();
            }
        }
    }

    /* ---- Initialize Page Select2 ---- */
    $('.rom-page select.select2').select2({ width: '100%', allowClear: false });
});
