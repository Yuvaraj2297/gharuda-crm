/**
 * Gharuda CRM - Brand Target Page Script
 * File: assets/js/pages/brand-target.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
        'use strict';

        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var BRAND_COLORS = [
            { bg: '#eff6ff', fg: '#2563eb' },
            { bg: '#ecfdf5', fg: '#16a34a' },
            { bg: '#fffbeb', fg: '#d97706' },
            { bg: '#f5f3ff', fg: '#7c3aed' },
            { bg: '#fdf2f8', fg: '#db2777' },
            { bg: '#ecfeff', fg: '#0891b2' }
        ];

        function inrFmt(n) {
            var neg = n < 0;
            var s = Math.abs(n).toFixed(2).split('.');
            var int = s[0], last3 = int.slice(-3), rest = int.slice(0, -3);
            if (rest) rest = rest.replace(/\B(?=(\d{2})+(?!\d))/g, ',') + ',';
            return (neg ? '-₹ ' : '₹ ') + rest + last3 + '.' + s[1];
        }

        function brandStyle(name) {
            var h = 0;
            String(name).split('').forEach(function(c) { h = (h * 31 + c.charCodeAt(0)) % 997; });
            return BRAND_COLORS[h % BRAND_COLORS.length];
        }

        function brandInitials(name) {
            var w = String(name).trim().split(/\s+/);
            var s = w.length > 1 ? (w[0].charAt(0) + w[1].charAt(0)) : w[0].slice(0, 2);
            return s.toUpperCase();
        }

        function achPill(v, act) {
            var cls = v > act ? 'bg-success-subtle text-success border border-success-subtle' : v < act ? 'bg-danger-subtle text-danger border border-danger-subtle' : 'bg-light text-secondary border';
            var ico = v > act ? 'bi-arrow-up-right' : v < act ? 'bi-arrow-down-right' : 'bi-dash-lg';
            return '<span class="badge ' + cls + '"><i class="bi ' + ico + ' me-1"></i>' + inrFmt(v) + '</span>';
        }

        /* ---------- Date helper ---------- */
        function dateToMonthKey(dStr) {
            if (!dStr) return 0;
            var p = String(dStr).trim().split('-');
            if (p.length === 3) {
                var m = Number(p[1]), y = Number(p[2]);
                if (y && m) return y * 100 + m;
            }
            if (p.length === 2) {
                return Number(p[0]) * 100 + Number(p[1]);
            }
            return 0;
        }

        /* ---------- Filter strip handler ---------- */
        function applyFilters() {
            var brandVal = document.getElementById('bt5BrandFilter').value.trim();
            var fromKey = dateToMonthKey(document.getElementById('bt5FromDate').value);
            var toKey = dateToMonthKey(document.getElementById('bt5ToDate').value);

            if (fromKey && toKey && fromKey > toKey) {
                alert('From Date cannot be after To Date.');
                return;
            }

            var rows = document.querySelectorAll('#bt5Tbody tr[data-id]');
            rows.forEach(function(tr) {
                var rBrand = tr.getAttribute('data-brand') || '';
                var rYear = Number(tr.getAttribute('data-year') || 0);
                var rMonth = Number(tr.getAttribute('data-month') || 0);
                var rKey = rYear * 100 + rMonth;

                var show = true;
                if (brandVal && rBrand !== brandVal) show = false;
                if (fromKey && rKey < fromKey) show = false;
                if (toKey && rKey > toKey) show = false;

                tr.style.display = show ? '' : 'none';
            });
        }

        document.getElementById('bt5SearchBtn').addEventListener('click', applyFilters);

        ['bt5FromDate', 'bt5ToDate'].forEach(function(id) {
            var el = document.getElementById(id);
            if (el) {
                el.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') applyFilters();
                });
            }
        });

        /* ---------- Modal Edit / Create State ---------- */
        var editTr = null;
        var nextId = 11;

        document.getElementById('bt5CreateBtn').addEventListener('click', function() {
            editTr = null;
            document.getElementById('bt5ModalTitle').textContent = 'New Brand Target';
            document.getElementById('bt5Year').value = '2026';
            document.getElementById('bt5MonthSel').value = String(new Date().getMonth() + 1);
            document.getElementById('bt5Brand').value = '';
            document.getElementById('bt5CollectionValue').value = '';

            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('#bt5Year').val('2026').trigger('change.select2');
                $('#bt5MonthSel').val(String(new Date().getMonth() + 1)).trigger('change.select2');
                $('#bt5Brand').val('').trigger('change.select2');
            }

            bootstrap.Modal.getOrCreateInstance(document.getElementById('bt5Modal')).show();
        });

        /* ---------- Table Actions (Edit / Delete) ---------- */
        document.getElementById('bt5Table').addEventListener('click', function(e) {
            var btn = e.target.closest('[data-b5act]');
            if (!btn) return;
            var act = btn.getAttribute('data-b5act');
            var tr = btn.closest('tr');
            if (!tr) return;

            if (act === 'edit') {
                editTr = tr;
                var year = tr.getAttribute('data-year') || '2026';
                var month = tr.getAttribute('data-month') || '10';
                var brand = tr.getAttribute('data-brand') || '';
                var actual = tr.getAttribute('data-actual') || '0';

                document.getElementById('bt5ModalTitle').textContent = 'Edit Brand Target';
                document.getElementById('bt5Year').value = year;
                document.getElementById('bt5MonthSel').value = month;
                document.getElementById('bt5Brand').value = brand;
                document.getElementById('bt5CollectionValue').value = actual;

                if (typeof $ !== 'undefined' && $.fn.select2) {
                    $('#bt5Year').val(year).trigger('change.select2');
                    $('#bt5MonthSel').val(month).trigger('change.select2');
                    $('#bt5Brand').val(brand).trigger('change.select2');
                }

                bootstrap.Modal.getOrCreateInstance(document.getElementById('bt5Modal')).show();
            } else if (act === 'del') {
                if (confirm('Delete this brand target?')) {
                    tr.remove();
                }
            }
        });

        /* ---------- Modal Submit ---------- */
        document.getElementById('bt5SubmitBtn').addEventListener('click', function() {
            var yearVal = Number(document.getElementById('bt5Year').value);
            var monthVal = Number(document.getElementById('bt5MonthSel').value);
            var brandVal = document.getElementById('bt5Brand').value;
            var cvVal = document.getElementById('bt5CollectionValue').value;

            if (!yearVal || !monthVal || !brandVal || cvVal === '') {
                alert('Please fill all the required fields.');
                return;
            }

            var actNum = Number(cvVal) || 0;
            var monthName = MONTHS[monthVal - 1] + ' - ' + yearVal;
            var c = brandStyle(brandVal);
            var inits = brandInitials(brandVal);

            if (editTr) {
                var achNum = Number(editTr.getAttribute('data-achieved')) || 0;
                editTr.setAttribute('data-year', yearVal);
                editTr.setAttribute('data-month', monthVal);
                editTr.setAttribute('data-brand', brandVal);
                editTr.setAttribute('data-actual', actNum);

                editTr.cells[1].innerHTML = '<span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>' + monthName + '</span>';
                editTr.cells[2].innerHTML = '<div class="d-flex align-items-center gap-2"><span class="brand-chip" style="background:' + c.bg + ';color:' + c.fg + ';">' + inits + '</span><span class="fw-bold">' + brandVal + '</span></div>';
                editTr.cells[3].textContent = inrFmt(actNum);
                editTr.cells[4].innerHTML = achPill(achNum, actNum);
            } else {
                var newId = nextId++;
                var tbody = document.getElementById('bt5Tbody');
                var tr = document.createElement('tr');
                tr.setAttribute('data-id', newId);
                tr.setAttribute('data-year', yearVal);
                tr.setAttribute('data-month', monthVal);
                tr.setAttribute('data-brand', brandVal);
                tr.setAttribute('data-actual', actNum);
                tr.setAttribute('data-achieved', 0);

                var sNo = tbody.children.length + 1;
                tr.innerHTML =
                    '<td>' + sNo + '</td>' +
                    '<td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>' + monthName + '</span></td>' +
                    '<td><div class="d-flex align-items-center gap-2"><span class="brand-chip" style="background:' + c.bg + ';color:' + c.fg + ';">' + inits + '</span><span class="fw-bold">' + brandVal + '</span></div></td>' +
                    '<td>' + inrFmt(actNum) + '</td>' +
                    '<td>' + achPill(0, actNum) + '</td>' +
                    '<td>' +
                        '<div class="d-flex align-items-center gap-1">' +
                            '<button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="' + newId + '"><i class="bi bi-pencil-square"></i></button>' +
                            '<button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="' + newId + '"><i class="bi bi-x-lg"></i></button>' +
                        '</div>' +
                    '</td>';
                tbody.insertBefore(tr, tbody.firstChild);
            }

            bootstrap.Modal.getOrCreateInstance(document.getElementById('bt5Modal')).hide();
        });

        /* ---------- Init Modal & Filter Select2 ---------- */
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $('#bt5BrandFilter').select2({
                width: '100%',
                placeholder: 'All Brands',
                allowClear: true
            }).on('change', applyFilters);

            $('#bt5Modal').on('shown.bs.modal', function() {
                var $m = $(this);
                $m.find('select.select2').each(function() {
                    if ($(this).data('select2')) {
                        $(this).select2('destroy');
                    }
                    $(this).select2({
                        dropdownParent: $m,
                        width: '100%',
                        placeholder: $(this).attr('data-placeholder') || 'Select...'
                    });
                });
            });
        }
    })();
