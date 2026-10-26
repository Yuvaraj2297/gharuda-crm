/**
 * Gharuda CRM - Package List Page Script
 * File: assets/js/pages/package-list.js
 */

document.addEventListener('DOMContentLoaded', function() {
        'use strict';

        var $ = window.jQuery;
        var DELIVERY = window.PL_DELIVERY || [];
        var esc = function(v) {
            return String(v == null ? '' : v).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        };
        var num = function(n) {
            return (Number(n) || 0).toLocaleString('en-IN', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        };

        function $id(id) {
            return document.getElementById(id);
        }

        /* ---------------- Static data (backend API response vandhathum replace pannunga) ---------------- */
        function mk(o) {
            return $.extend({
                id: 0,
                pl_no: '',
                customer: '',
                l: 0,
                w: 0,
                h: 0,
                volume: 0,
                amount: 0,
                discount: 0,
                after_discount: 0,
                status: 'Approved',
                delivery: 'Ready To Deliver',
                staff: '',
                voucher: '',
                date: ''
            }, o);
        }

        function normalize(r) {
            r.volume = (Number(r.l) || 0) * (Number(r.w) || 0) * (Number(r.h) || 0);
            r.dimension = num(r.l) + ' × ' + num(r.w) + ' × ' + num(r.h);
            r.after_discount = (Number(r.amount) || 0) - (Number(r.discount) || 0);
            return r;
        }

        var allData = [
            mk({
                id: 1,
                pl_no: 'PL3 - PACKING_LIST202610061808',
                customer: 'Abcd c',
                status: 'Approved',
                delivery: 'Ready To Deliver',
                staff: 'Admin User',
                voucher: 'IDV-0001',
                date: '2026-10-06'
            }),
            mk({
                id: 2,
                pl_no: 'PL3 - PACKING_LIST202609251130',
                customer: 'Sri Ganesh Traders',
                l: 1.2,
                w: 0.8,
                h: 0.6,
                amount: 45000,
                discount: 2500,
                status: 'Approved',
                delivery: 'Delivery In Progress',
                staff: 'Ravi Kumar',
                voucher: 'IDV-0002',
                date: '2026-09-25'
            }),
            mk({
                id: 3,
                pl_no: 'PL2 - PACKING_LIST202609221015',
                customer: 'Kovai Metals Pvt Ltd',
                l: 2,
                w: 1.5,
                h: 1,
                amount: 128000,
                discount: 8000,
                status: 'Not yet approve',
                delivery: 'Ready To Deliver',
                staff: 'Priya S',
                voucher: 'IDV-0003',
                date: '2026-09-22'
            }),
            mk({
                id: 4,
                pl_no: 'PL1 - PACKING_LIST202609300945',
                customer: 'Anand Industries',
                l: 0.9,
                w: 0.9,
                h: 0.9,
                amount: 22500,
                discount: 0,
                status: 'Reject',
                delivery: 'Not Delivered',
                staff: 'Karthik M',
                voucher: 'IDV-0004',
                date: '2026-09-30'
            }),
            mk({
                id: 5,
                pl_no: 'PL3 - PACKING_LIST202610021420',
                customer: 'Lakshmi Enterprises',
                l: 1,
                w: 1,
                h: 1.2,
                amount: 67000,
                discount: 1000,
                status: 'Approved',
                delivery: 'Delivered',
                staff: 'Admin User',
                voucher: 'IDV-0001',
                date: '2026-10-02'
            })
        ].map(normalize);

        function nextId() {
            return allData.reduce(function(m, r) {
                return Math.max(m, r.id);
            }, 0) + 1;
        }

        function findById(id) {
            return allData.filter(function(r) {
                return r.id === id;
            })[0];
        }

        /* ---------------- Table ---------------- */
        var DS_CLASS = {
            'Ready To Deliver': 'ds-ready',
            'Delivery In Progress': 'ds-progress',
            'Delivered': 'ds-delivered',
            'Received': 'ds-received',
            'Returned': 'ds-returned',
            'Not Delivered': 'ds-notdel'
        };
        var ST_CLASS = {
            'Approved': 'status-approved',
            'Not yet approve': 'status-pending',
            'Reject': 'status-rejected'
        };

        var cols = [{
                field: 'pl_no',
                title: 'Packing list number',
                sortable: true,
                render: function(v, r) {
                    return '<a href="#" class="pl-link" data-id="' + r.id + '">' + esc(v) + '</a>';
                }
            },
            {
                field: 'customer',
                title: 'Customer name',
                sortable: true
            },
            {
                field: 'dimension',
                title: 'Dimension',
                sortable: true
            },
            {
                field: 'volume',
                title: 'Volume(m3)',
                sortable: true,
                render: function(v) {
                    return num(v);
                }
            },
            {
                field: 'amount',
                title: 'Total amount',
                sortable: true,
                render: function(v) {
                    return num(v);
                }
            },
            {
                field: 'discount',
                title: 'Discount total',
                sortable: true,
                render: function(v) {
                    return num(v);
                }
            },
            {
                field: 'after_discount',
                title: 'Total after discount',
                sortable: true,
                render: function(v) {
                    return num(v);
                }
            },
            {
                field: 'status',
                title: 'Status',
                sortable: true,
                render: function(v) {
                    return '<span class="status-pill ' + (ST_CLASS[v] || 'status-pending') + '">' + esc(v) + '</span>';
                }
            },
            {
                field: 'delivery',
                title: 'Delivery status',
                sortable: true,
                render: function(v, r) {
                    var items = DELIVERY.map(function(d) {
                        return '<li><a class="dropdown-item pl-ds-item' + (d === v ? ' active' : '') + '" href="#" data-id="' + r.id + '" data-val="' + esc(d) + '">Mark as ' + esc(d) + '</a></li>';
                    }).join('');
                    return '<div class="pl-dd">' +
                        '<button type="button" class="pl-dd-toggle ' + (DS_CLASS[v] || '') + '" aria-expanded="false">' + esc(v) + ' <i class="bi bi-caret-down-fill"></i></button>' +
                        '<ul class="dropdown-menu pl-dd-menu">' + items + '</ul></div>';
                }
            },
            {
                field: null,
                title: 'Action',
                sortable: false,
                render: function(v, r) {
                    return '<div class="pl-actions">' +
                        '<button type="button" class="pl-act pl-act-view" data-pl-action="view" data-id="' + r.id + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="bi bi-eye"></i></button>' +
                        '</div>';
                }
            }
        ];

        var table = MasterTable.init({
            tableId: 'packingTable',
            tbodyId: 'packingTbody',
            data: allData,
            tableName: 'Packing List',
            primaryKey: 'id',
            showCheckbox: false,
            searchFields: ['pl_no', 'customer', 'dimension', 'status', 'delivery'],
            columns: cols
        });

        // Delivery status dropdown (fixed strategy so table overflow doesn't clip it)
        var tbodyEl = $id('packingTbody');
        tbodyEl.addEventListener('click', function(e) {
            var tg = e.target.closest('.pl-dd-toggle');
            if (tg) {
                e.preventDefault();
                var dd = bootstrap.Dropdown.getOrCreateInstance(tg, {
                    popperConfig: function(c) {
                        return Object.assign({}, c, {
                            strategy: 'fixed'
                        });
                    }
                });
                dd.toggle();
                return;
            }
            var it = e.target.closest('.pl-ds-item');
            if (it) {
                e.preventDefault();
                var rec = findById(Number(it.getAttribute('data-id')));
                if (rec) {
                    rec.delivery = it.getAttribute('data-val');
                    runFilter();
                }
                return;
            }
            var act = e.target.closest('[data-pl-action]');
            if (act) {
                e.preventDefault();
                handlePlAction(act.getAttribute('data-pl-action'), Number(act.getAttribute('data-id')));
                return;
            }

            var lk = e.target.closest('.pl-link');
            if (lk) e.preventDefault(); // packing list detail page connect pannanum
        });

        /* ---------------- Filters (Apply / Clear / chips) ---------------- */
        var FILTERS = [{
                id: 'f_from',
                label: 'From',
                input: true
            },
            {
                id: 'f_to',
                label: 'To',
                input: true
            },
            {
                id: 'f_staff',
                label: 'Staff'
            },
            {
                id: 'f_voucher',
                label: 'Voucher'
            },
            {
                id: 'f_status',
                label: 'Status',
                multi: true
            }
        ];
        var applied = {};

        function readControls() {
            var o = {};
            FILTERS.forEach(function(f) {
                var v = $('#' + f.id).val();
                o[f.id] = f.multi ? (v || []) : String(v || '').trim();
            });
            return o;
        }

        function runFilter() {
            var f = applied;
            var rows = allData.filter(function(r) {
                if (f.f_from && r.date < f.f_from) return false;
                if (f.f_to && r.date > f.f_to) return false;
                if (f.f_staff && r.staff !== f.f_staff) return false;
                if (f.f_voucher && r.voucher !== f.f_voucher) return false;
                if (f.f_status && f.f_status.length && f.f_status.indexOf(r.status) === -1) return false;
                return true;
            });
            table.setData(rows);
            renderChips();
        }

        function fmtDate(iso) {
            var p = String(iso).split('-');
            return p.length === 3 ? p[2] + '-' + p[1] + '-' + p[0] : iso;
        }

        function renderChips() {
            var list = $id('plActiveList'),
                n = 0;
            list.innerHTML = '';
            FILTERS.forEach(function(f) {
                var v = applied[f.id];
                if (!v || (f.multi && !v.length)) return;
                n++;
                var shown = f.multi ? v.join(', ') : (f.input ? fmtDate(v) : v);
                var chip = document.createElement('span');
                chip.className = 'leave-chip';
                var txt = document.createElement('span');
                txt.textContent = f.label + ': ' + shown;
                var close = document.createElement('button');
                close.type = 'button';
                close.className = 'leave-chip-close';
                close.setAttribute('aria-label', 'Remove ' + f.label + ' filter');
                close.innerHTML = '&times;';
                close.addEventListener('click', function() {
                    setControl(f.id, f.multi ? [] : '');
                    applied[f.id] = f.multi ? [] : '';
                    runFilter();
                });
                chip.appendChild(txt);
                chip.appendChild(close);
                list.appendChild(chip);
            });
            $id('plActiveBar').hidden = !n;
        }

        function setControl(id, v) {
            var el = $id(id);
            if (el.tagName === 'SELECT') $('#' + id).val(v).trigger('change');
            else el.value = v;
        }

        $id('plApply').addEventListener('click', function() {
            applied = readControls();
            runFilter();
        });

        function clearAll() {
            setControl('f_from', '');
            setControl('f_to', '');
            setControl('f_staff', '');
            setControl('f_voucher', '');
            setControl('f_status', []);
            applied = {};
            runFilter();
        }
        $id('plClear').addEventListener('click', clearAll);
        $id('plActiveClear').addEventListener('click', clearAll);

        $id('plFiltersToggle').addEventListener('click', function() {
            var panel = $id('plFiltersCollapse'),
                open = panel.classList.toggle('open');
            this.classList.toggle('open', open);
            this.querySelector('span').textContent = open ? 'Hide Filters' : 'Filters';
        });

        // Page load: default dates (image la irukura 21-09-2026 -> 06-10-2026) apply
        applied = readControls();
        runFilter();

        /* ---------------- Modals (packing + address) ---------------- */
        var modalEl = $id('packingModal');
        var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        var $m = $(modalEl);

        var addrEl = $id('addressModal');
        var addrModal = bootstrap.Modal.getOrCreateInstance(addrEl);
        var $am = $(addrEl);

        function initSelect2(scope, root) {
            scope.find('select.select2').each(function() {
                var $el = $(this);
                if ($el.data('select2')) $el.select2('destroy');
                $el.select2({
                    width: '100%',
                    dropdownParent: root
                });
            });
        }

        modalEl.addEventListener('shown.bs.modal', function() {
            initSelect2($m, $m);
        });

        addrEl.addEventListener('shown.bs.modal', function() {
            initSelect2($am, $am);
        });

        /* ---- Volume + totals auto-calc ---- */
        function recalcVolume() {
            var l = Number($id('pl_l').value) || 0,
                w = Number($id('pl_w').value) || 0,
                h = Number($id('pl_h').value) || 0;
            $id('pl_vol').value = String(Math.round(l * w * h * 1000) / 1000);
        }
        ['pl_l', 'pl_w', 'pl_h'].forEach(function(id) {
            $id(id).addEventListener('input', recalcVolume);
        });

        function recalcTotals() {
            var subtotal = 0, // static items table - backend connect panna automatic-a varum
                addl = Number($id('plAddDiscount').value) || 0,
                ship = Number($id('plShipFee').value) || 0;
            $id('plSubtotal').textContent = '\u20B9 ' + num(subtotal);
            $id('plTotalDiscount').textContent = '-\u20B9 ' + num(addl);
            $id('plTotalPay').textContent = '\u20B9 ' + num(subtotal - addl + ship);
        }
        ['plAddDiscount', 'plShipFee'].forEach(function(id) {
            $id(id).addEventListener('input', recalcTotals);
        });

        /* ---- Static items table: voucher OR customer select panna render ---- */
        var PL_ITEMS = [
            { code: '021878787', name: 'Square Tubes 40 × 40 - 1mm thick', qty: 3000, unit: 'Kilograms', rate: 0, tax: 'No Tax' },
            { code: '187878787', name: 'Rectangular Tube 40 × 40 1.2 mm', qty: 1800, unit: 'Kilograms', rate: 0, tax: 'No Tax' }
        ];
        var PL_TAXES = ['No Tax', 'GST 5%', 'GST 12%', 'GST 18%', 'GST 28%'];
        var plItemsHidden = false;

        function plItemsSelected() {
            return !!($id('pl_voucher').value || $id('pl_customer').value);
        }

        function renderPlItems() {
            var tb = $id('plItemsTbody');
            if (!tb) return;
            if (plItemsHidden || !plItemsSelected()) {
                tb.innerHTML = '<tr><td colspan="9" class="text-center text-muted py-4">No items added</td></tr>';
                return;
            }
            tb.innerHTML = PL_ITEMS.map(function(it, i) {
                var taxOpts = PL_TAXES.map(function(t) {
                    return '<option' + (t === it.tax ? ' selected' : '') + '>' + esc(t) + '</option>';
                }).join('');
                return '<tr data-idx="' + i + '">' +
                    '<td><div class="pl-item-cell"><i class="bi bi-grip-vertical pl-item-grip"></i>' +
                    '<span class="pl-item-chip">' + esc(it.code) + ',' + esc(it.name) +
                    ' </span></div></td>' +
                    '<td><input type="number" class="form-control form-control-sm pl-item-num" value="' + it.qty + '">' +
                    '<span class="pl-item-unit">' + esc(it.unit) + '</span></td>' +
                    '<td><input type="number" class="form-control form-control-sm pl-item-num" value="' + it.rate + '"></td>' +
                    '<td><select class="form-select form-select-sm pl-item-tax">' + taxOpts + '</select></td>' +
                    '<td><span class="pl-item-money">&#8377; 0.00</span></td>' +
                    '<td><input type="text" class="form-control form-control-sm pl-item-disc" placeholder="Discount"></td>' +
                    '<td><span class="pl-item-money">&#8377; 0.00</span></td>' +
                    '<td><span class="pl-item-money">&#8377; 0.00</span></td>' +
                    '<td class="text-center"><button type="button" class="pl-item-del"><i class="bi bi-trash"></i></button></td>' +
                    '</tr>';
            }).join('');
        }

        ['pl_voucher', 'pl_customer'].forEach(function(id) {
            $id(id).addEventListener('change', function() {
                plItemsHidden = false;
                renderPlItems();
            });
        });

        // Static row: delete + edit icon (backend connect panna idhu real aagum)
        $id('plItemsTbody').addEventListener('click', function(e) {
            if (e.target.closest('.pl-item-del')) {
                var row = e.target.closest('tr[data-idx]');
                if (row) row.remove();
                if (!$id('plItemsTbody').querySelector('tr[data-idx]')) {
                    plItemsHidden = true;
                    renderPlItems();
                }
                return;
            }
            if (e.target.closest('.pl-item-edit')) e.preventDefault();
        });

        /* ---- Packing modal open modes: add / edit / view ---- */
        function setFormDisabled(on) {
            $m.find('input, textarea, select, button.pl-addr-edit').each(function() {
                this.disabled = !!on;
            });
            $id('btnPackingSave').style.display = on ? 'none' : '';
        }

        function splitPlNo(full) {
            var s = String(full || ''),
                i = s.indexOf(' - ');
            if (i === -1) return { prefix: 'PL', rest: s };
            return { prefix: s.slice(0, i), rest: s.slice(i + 3) };
        }

        function openPacking(mode, rec) {
            $id('packingForm').reset();
            $m.find('select.select2').val('').trigger('change.select2');
            $id('packingModalLabel').innerHTML = mode === 'edit' ? 'Edit Packing List' : (mode === 'view' ? 'View Packing List' : 'Add Packing List');
            // reset address preview + totals
            $id('billToText').innerHTML = '--<br>--, --<br>--, --';
            $id('shipToText').innerHTML = '--<br>--, --<br>--, --';
            $id('plAddDiscount').value = 0;
            $id('plShipFee').value = 0;
            $id('plNoPrefix').textContent = 'PL4';
            $id('pl_no').value = 'PACKING_LIST' + new Date().toISOString().replace(/[-:T]/g, '').slice(0, 14);

            if (rec) {
                var pn = splitPlNo(rec.pl_no);
                $id('plNoPrefix').textContent = pn.prefix;
                $id('pl_no').value = pn.rest;
                $('#pl_voucher').val(rec.voucher || '').trigger('change');
                $('#pl_customer').val(rec.customer || '').trigger('change');
                $id('pl_l').value = rec.l || 0;
                $id('pl_w').value = rec.w || 0;
                $id('pl_h').value = rec.h || 0;
                $id('plAddDiscount').value = rec.discount || 0;
            }
            plItemsHidden = false;
            renderPlItems();
            setFormDisabled(mode === 'view');
            recalcVolume();
            recalcTotals();
            modal.show();
        }

        $id('btnAddPacking').addEventListener('click', function() {
            openPacking('add', null);
        });

        /* ---- Address modal (image 2) ---- */
        $id('btnEditAddress').addEventListener('click', function() {
            addrModal.show();
        });

        $id('btnAddressApply').addEventListener('click', function() {
            function block(sid) {
                var st = $id(sid + '_street').value.trim(),
                    ci = $id(sid + '_city').value.trim(),
                    sa = $id(sid + '_state').value.trim(),
                    zi = $id(sid + '_zip').value.trim(),
                    co = $('#' + sid + '_country').val() || '';
                var addr1 = [st, [ci, sa].filter(Boolean).join(', ')].filter(Boolean);
                var addr2 = [zi, co].filter(Boolean).join(', ');
                if (!addr1.length && !addr2) return '--<br>--, --<br>--, --';
                return (addr1[0] || '--') + '<br>' + (addr1[1] || '--, --') + '<br>' + (addr2 || '--, --');
            }
            $id('billToText').innerHTML = block('ad_bill');
            $id('shipToText').innerHTML = block('ad_ship');
            addrModal.hide();
        });

        /* ---- Save (add / edit) ---- */
        var editingId = null;
        $id('btnPackingSave').addEventListener('click', function() {
            var no = $id('pl_no').value.trim();
            var voucher = $id('pl_voucher').value;
            var customer = $id('pl_customer').value;

            $m.find('.is-invalid').removeClass('is-invalid');
            if (!voucher) {
                $id('pl_voucher').classList.add('is-invalid');
                alert('Inventory delivery voucher is required.');
                return;
            }
            if (!customer) {
                $id('pl_customer').classList.add('is-invalid');
                alert('Customer is required.');
                return;
            }
            if (!no) {
                $id('pl_no').classList.add('is-invalid');
                alert('Packing list number is required.');
                return;
            }

            var today = new Date().toISOString().slice(0, 10);
            var addl = Number($id('plAddDiscount').value) || 0;
            var ship = Number($id('plShipFee').value) || 0;
            var amount = 0 - addl + ship; // static items table (0)
            var fullNo = $id('plNoPrefix').textContent + ' - ' + no;

            var payload = {
                pl_no: fullNo,
                customer: customer,
                l: Number($id('pl_l').value) || 0,
                w: Number($id('pl_w').value) || 0,
                h: Number($id('pl_h').value) || 0,
                amount: amount,
                discount: addl,
                voucher: voucher,
                date: today
            };

            if (editingId) {
                var rec = findById(editingId);
                if (rec) {
                    Object.keys(payload).forEach(function(k) {
                        rec[k] = payload[k];
                    });
                    normalize(rec);
                }
                editingId = null;
            } else {
                allData.push(normalize(mk($.extend({
                    id: nextId(),
                    status: 'Not yet approve'
                }, payload))));
            }
            runFilter();
            modal.hide();
        });

        modalEl.addEventListener('hidden.bs.modal', function() {
            editingId = null;
            setFormDisabled(false);
        });

        /* ---------------- View modal (fullscreen: detail + shipping log) ---------------- */
        var viewEl = $id('viewModal');
        var viewModal = bootstrap.Modal.getOrCreateInstance(viewEl);

        // Tabs
        viewEl.querySelectorAll('.vw-tab').forEach(function(tab) {
            tab.addEventListener('click', function() {
                viewEl.querySelectorAll('.vw-tab').forEach(function(t) { t.classList.remove('active'); });
                tab.classList.add('active');
                var key = tab.getAttribute('data-vw-tab');
                $id('vwPaneDetail').hidden = key !== 'detail';
                $id('vwPaneLog').hidden = key !== 'log';
            });
        });

        function resetViewTabs() {
            viewEl.querySelectorAll('.vw-tab').forEach(function(t) {
                t.classList.toggle('active', t.getAttribute('data-vw-tab') === 'detail');
            });
            $id('vwPaneDetail').hidden = false;
            $id('vwPaneLog').hidden = true;
        }

        // Static detail items row (backend connect panna real data varum)
        function renderViewItems(rec) {
            $id('vwItemsBody').innerHTML =
                '<tr>' +
                '<td>1</td>' +
                '<td>8787878712454_Coil 1.5 \u00d7 95 IS1079D</td>' +
                '<td>2000.00 Kilograms</td>' +
                '<td class="num">' + num(0) + '</td>' +
                '<td class="num">0.00%</td>' +
                '<td class="num">' + num(0) + '</td>' +
                '<td class="num">' + num(0) + '</td>' +
                '<td class="num">' + num(0) + '</td>' +
                '<td class="num">' + num(0) + '</td>' +
                '</tr>';
            var disc = Number(rec.discount) || 0;
            $id('vwSubtotal').textContent = '\u20B9 ' + num(0);
            $id('vwTotalDisc').textContent = '\u20B9 ' + num(disc);
            $id('vwShipFee').textContent = '\u20B9 ' + num(0);
            $id('vwTotalPay').textContent = '\u20B9 ' + num((Number(rec.amount) || 0) + disc);
        }

        // Shipping log: submit + delete
        $id('btnLogSubmit').addEventListener('click', function() {
            var txt = $id('vwLogInput').value.trim();
            if (!txt) {
                $id('vwLogInput').focus();
                alert('Shipping log text is required.');
                return;
            }
            var item = document.createElement('div');
            item.className = 'vw-log-item';
            item.innerHTML = '<button type="button" class="vw-log-del" aria-label="Delete">&times;</button>' +
                '<div class="vw-log-meta"><span class="vw-log-dot"></span> JUST NOW</div>' +
                '<div class="vw-log-user"><span class="vw-log-avatar">AD</span> Admin User - ' + esc(txt) + '</div>';
            $id('vwLogList').insertBefore(item, $id('vwLogList').firstChild);
            $id('vwLogInput').value = '';
        });

        $id('vwLogList').addEventListener('click', function(e) {
            var del = e.target.closest('.vw-log-del');
            if (del) del.closest('.vw-log-item').remove();
        });

        /* ---------------- PDF download (image layout) ---------------- */
        function buildViewPdf(rec) {
            var disc = Number(rec.discount) || 0;
            var total = (Number(rec.amount) || 0) + disc;
            var dateStr = rec.date ? fmtDate(rec.date) + ' 18:08:22' : '-';
            var th = function(t, align) {
                return { text: t, fillColor: '#1f2937', color: '#ffffff', bold: true, alignment: align || 'left' };
            };

            var totals = [
                [{ text: 'Subtotal', bold: true, alignment: 'right' }, { text: '\u20B9 ' + num(0), bold: true, alignment: 'right' }],
                [{ text: 'Total discount', bold: true, alignment: 'right' }, { text: '\u20B9 ' + num(disc), bold: true, alignment: 'right' }],
                [{ text: 'Shipping fee', bold: true, alignment: 'right' }, { text: '\u20B9 ' + num(0), bold: true, alignment: 'right' }],
                [{ text: 'Total payment', bold: true, alignment: 'right', fillColor: '#eeeeee' }, { text: '\u20B9 ' + num(total), bold: true, alignment: 'right', fillColor: '#eeeeee' }]
            ];

            return {
                pageSize: 'A4',
                pageMargins: [40, 45, 40, 45],
                content: [
                    { text: 'Packing list', alignment: 'right', bold: true, fontSize: 24 },
                    { text: '# ' + (rec.pl_no || '-'), alignment: 'right', fontSize: 11, margin: [0, 4, 0, 28] },
                    {
                        columns: [
                            {
                                width: '50%',
                                stack: [
                                    { text: 'ghrA SOFTWARE TECHNOLOGY PRIVATE LIMITED', bold: true, fontSize: 12.5 },
                                    { text: 'PC 20 /3, 3rd Block, Mogappair West', margin: [0, 14, 0, 0], color: '#444444' },
                                    { text: 'Chennai - 560086 , Tamil Nadu', color: '#444444' },
                                    { text: 'India', color: '#444444' },
                                    { text: '9865321470', color: '#444444' },
                                    { text: 'GST Number: 29AABCR7796N000', color: '#444444' }
                                ]
                            },
                            {
                                width: '50%',
                                stack: [
                                    { text: [{ text: 'Bill To: ', bold: true }, { text: rec.customer || '-', color: '#2563eb' }], alignment: 'right', fontSize: 11.5 },
                                    { text: 'IN', alignment: 'right', margin: [0, 14, 0, 0], color: '#444444' },
                                    { text: 'Ship to: ', bold: true, alignment: 'right', margin: [0, 26, 0, 0], fontSize: 11.5 },
                                    { text: [{ text: 'Packaging Date ', bold: true }, { text: dateStr }], alignment: 'right', margin: [0, 26, 0, 0], fontSize: 11.5 }
                                ]
                            }
                        ],
                        columnGap: 0,
                        margin: [0, 0, 0, 24]
                    },
                    {
                        table: {
                            headerRows: 1,
                            widths: [18, '*', 78, 46, 44, 50, 52, 56, 58],
                            body: [
                                [th('#'), th('Commodity Code'), th('Quantity'), th('Rate', 'right'), th('Tax', 'right'), th('Subtotal', 'right'), th('Discount(%)', 'right'), th('Discount(money)', 'right'), th('Total payment', 'right')],
                                [
                                    { text: '1', alignment: 'left', color: '#111111' },
                                    { text: '8787878712454_Coil 1.5 \u00d7 95 IS1079D', color: '#111111' },
                                    { text: '2000.00 Kilograms', color: '#111111' },
                                    { text: num(0), alignment: 'right', color: '#111111' },
                                    { text: '0.00%', alignment: 'right', color: '#111111' },
                                    { text: num(0), alignment: 'right', color: '#111111' },
                                    { text: num(0), alignment: 'right', color: '#111111' },
                                    { text: num(0), alignment: 'right', color: '#111111' },
                                    { text: num(0), alignment: 'right', color: '#111111' }
                                ]
                            ]
                        },
                        layout: {
                            hLineWidth: function(i) { return i === 1 ? 1 : 0.5; },
                            vLineWidth: function() { return 0; },
                            hLineColor: function() { return '#d7dbe0'; },
                            paddingLeft: function() { return 6; },
                            paddingRight: function() { return 6; },
                            paddingTop: function() { return 7; },
                            paddingBottom: function() { return 7; }
                        },
                        fontSize: 9.5
                    },
                    {
                        columns: [
                            { width: '*', text: '' },
                            {
                                width: 250,
                                table: { widths: ['*', 'auto'], body: totals },
                                layout: {
                                    hLineWidth: function() { return 0; },
                                    vLineWidth: function() { return 0; },
                                    paddingTop: function() { return 8; },
                                    paddingBottom: function() { return 8; },
                                    paddingLeft: function() { return 10; },
                                    paddingRight: function() { return 10; }
                                }
                            }
                        ],
                        margin: [0, 26, 0, 0],
                        fontSize: 11.5
                    }
                ]
            };
        }

        $id('btnViewPdf').addEventListener('click', function() {
            var rec = viewRec;
            if (!rec) {
                alert('No packing list selected.');
                return;
            }
            if (typeof pdfMake === 'undefined') {
                alert('PDF library not loaded.');
                return;
            }
            var fname = String(rec.pl_no || 'PACKING_LIST').replace(/[^A-Za-z0-9_-]+/g, '_') + '.pdf';
            pdfMake.createPdf(buildViewPdf(rec)).download(fname);
        });

        /* ---------------- Row action: view ---------------- */
        var viewRec = null;

        function handlePlAction(action, id) {
            var rec = findById(id);
            if (!rec) return;

            if (action === 'view') {
                viewRec = rec;
                $id('vwPlNo').textContent = rec.pl_no || '-';
                $id('vwVoucher').textContent = rec.voucher || '-';
                $id('vwBillTo').textContent = rec.customer || '-';
                $id('vwShipTo').textContent = rec.customer || '-';
                $id('vwDate').textContent = rec.date ? fmtDate(rec.date) + ' 18:08:22' : '-';
                $id('vwHeadDate').textContent = rec.date ? fmtDate(rec.date) : '-';
                $id('vwStatus').innerHTML = '<span class="status-pill ' + (ST_CLASS[rec.status] || 'status-pending') + '">' + esc(rec.status) + '</span>';
                renderViewItems(rec);
                resetViewTabs();
                viewModal.show();
            }
        }

        // Page-level select2 (filters)
        $('.packing-page select.select2').select2({
            width: '100%',
            allowClear: false
        });
    });
