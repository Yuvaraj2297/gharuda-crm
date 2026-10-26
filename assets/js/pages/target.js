/**
 * Gharuda CRM - Target Page Script
 * File: assets/js/pages/target.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
        'use strict';

        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var MONTHS_SHORT = MONTHS.map(function(m) { return m.slice(0, 3); });
        var activeYear = 2026;

        /* Target mock records for editing */
        var tgtData = [
            { id: 1, year: 2026, month: 2, staff: 'gharuda SOFTWARE', phone: '9500123456', sourcing: 0, bvnAct: 5, bvnAch: 6, bvvAct: 150000, bvvAch: 300400, cvvAct: 1000000, cvvAch: 0 },
            { id: 2, year: 2026, month: 2, staff: 'GEO Care', phone: '9841023456', sourcing: 0, bvnAct: 7, bvnAch: 0, bvvAct: 500000, bvvAch: 0, cvvAct: 3000000, cvvAch: 0 },
            { id: 3, year: 2026, month: 1, staff: 'GHARUDA SOFTWARE', phone: '9791023456', sourcing: 2, bvnAct: 4, bvnAch: 4, bvvAct: 120000, bvvAch: 135000, cvvAct: 800000, cvvAch: 910000 },
            { id: 4, year: 2026, month: 1, staff: 'Harish D.', phone: '9884023456', sourcing: 1, bvnAct: 3, bvnAch: 1, bvvAct: 90000, bvvAch: 25000, cvvAct: 500000, cvvAch: 160000 },
            { id: 5, year: 2026, month: 3, staff: 'Divya A.', phone: '9962023456', sourcing: 3, bvnAct: 6, bvnAch: 2, bvvAct: 200000, bvvAch: 75000, cvvAct: 1200000, cvvAch: 340000 },
            { id: 6, year: 2025, month: 12, staff: 'GHARUDA SOFTWARE', phone: '9791023456', sourcing: 1, bvnAct: 5, bvnAch: 5, bvvAct: 175000, bvvAch: 190000, cvvAct: 900000, cvvAch: 990000 },
            { id: 7, year: 2026, month: 4, staff: 'Karthik R.', phone: '9840123789', sourcing: 2, bvnAct: 4, bvnAch: 5, bvvAct: 140000, bvvAch: 180000, cvvAct: 750000, cvvAch: 820000 },
            { id: 8, year: 2026, month: 5, staff: 'Priya S.', phone: '9940123456', sourcing: 1, bvnAct: 5, bvnAch: 3, bvvAct: 160000, bvvAch: 95000, cvvAct: 850000, cvvAch: 410000 }
        ];

        /* Year pill click */
        var yearPills = document.getElementById('tgt5YearPills');
        if (yearPills) {
            yearPills.addEventListener('click', function(e) {
                var pill = e.target.closest('.tgt5-year-pill');
                if (!pill) return;
                yearPills.querySelectorAll('.tgt5-year-pill').forEach(function(p) { p.classList.remove('active'); });
                pill.classList.add('active');
                activeYear = Number(pill.getAttribute('data-year'));
                buildChart();
            });
        }

        /* Modal Select2 Init (re-destroy body-attached select2 and attach to modal) */
        function initTargetModalSelects() {
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('#tgt5Modal select.select2').each(function() {
                    var $this = $(this);
                    if ($this.data('select2')) {
                        $this.select2('destroy');
                    }
                    $this.select2({
                        dropdownParent: $('#tgt5Modal'),
                        width: '100%',
                        placeholder: $this.attr('data-placeholder') || 'Select...'
                    });
                });
            }
        }

        var modalEl = document.getElementById('tgt5Modal');
        if (modalEl) {
            modalEl.addEventListener('shown.bs.modal', function() {
                initTargetModalSelects();
            });
        }

        /* Helper to select matching value case-insensitively or append */
        function selectOrAdd(selEl, value) {
            if (!selEl || !value) return;
            var $sel = $(selEl);
            var foundVal = null;
            $sel.find('option').each(function() {
                if ($(this).val().toLowerCase() === String(value).toLowerCase() || $(this).text().toLowerCase() === String(value).toLowerCase()) {
                    foundVal = $(this).val();
                    return false;
                }
            });
            if (foundVal !== null) {
                $sel.val(foundVal).trigger('change');
            } else {
                var newOption = new Option(value, value, true, true);
                $sel.append(newOption).trigger('change');
            }
        }

        /* Modal Open / Edit */
        var editId = null;
        function openModal(rec) {
            editId = rec ? rec.id : null;
            var titleEl = document.getElementById('tgt5ModalTitle');
            if (titleEl) titleEl.textContent = rec ? 'Edit Target' : 'New Target';

            var yVal = rec ? String(rec.year) : String(activeYear);
            var mVal = rec ? String(rec.month) : String(new Date().getMonth() + 1);

            var ySel = $('#tgt5Year');
            var mSel = $('#tgt5MonthSel');
            var staffSel = document.getElementById('tgt5Staff');

            ySel.val(yVal).trigger('change');
            mSel.val(mVal).trigger('change');

            if (rec && rec.staff) {
                selectOrAdd(staffSel, rec.staff);
            } else {
                $(staffSel).val('').trigger('change');
            }

            var bvNum = document.getElementById('tgt5BvNumbers'); if (bvNum) bvNum.value = (rec && rec.bvnAct !== undefined) ? rec.bvnAct : '';
            var bvVal = document.getElementById('tgt5BusinessValue'); if (bvVal) bvVal.value = (rec && rec.bvvAct !== undefined) ? rec.bvvAct : '';
            var cvVal = document.getElementById('tgt5CollectionValue'); if (cvVal) cvVal.value = (rec && rec.cvvAct !== undefined) ? rec.cvvAct : '';

            bootstrap.Modal.getOrCreateInstance(document.getElementById('tgt5Modal')).show();
        }

        var createBtn = document.getElementById('tgt5CreateBtn');
        if (createBtn) {
            createBtn.addEventListener('click', function() {
                openModal(null);
            });
        }

        var submitBtn = document.getElementById('tgt5SubmitBtn');
        if (submitBtn) {
            submitBtn.addEventListener('click', function() {
                var staffVal = document.getElementById('tgt5Staff').value;
                var bvVal = document.getElementById('tgt5BusinessValue').value;
                var cvVal = document.getElementById('tgt5CollectionValue').value;
                if (!staffVal || bvVal === '' || cvVal === '') {
                    alert('Please fill all the required fields.');
                    return;
                }
                alert('Target saved successfully!');
                bootstrap.Modal.getOrCreateInstance(document.getElementById('tgt5Modal')).hide();
            });
        }

        /* Table actions delegation */
        var tableEl = document.getElementById('targetTable');
        if (tableEl) {
            tableEl.addEventListener('click', function(e) {
                var btn = e.target.closest('[data-t5act]');
                if (!btn) return;
                var act = btn.getAttribute('data-t5act');
                var id = Number(btn.getAttribute('data-id'));
                if (act === 'edit') {
                    var rec = tgtData.filter(function(r) { return r.id === id; })[0];
                    if (rec) openModal(rec);
                } else if (act === 'del') {
                    if (confirm('Delete this target?')) {
                        var tr = btn.closest('tr');
                        if (tr) tr.remove();
                    }
                }
            });
        }

        /* Chart */
        var chart = null;
        function inrShort(n) {
            if (n >= 10000000) return '\u20B9' + (n / 10000000).toFixed(2).replace(/\.00$/, '') + ' Cr';
            if (n >= 100000) return '\u20B9' + (n / 100000).toFixed(2).replace(/\.00$/, '') + ' L';
            if (n >= 1000) return '\u20B9' + (n / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
            return '\u20B9' + n;
        }

        function buildChart() {
            var subEl = document.getElementById('tgt5ChartSub');
            if (subEl) subEl.textContent = activeYear + ' · monthly totals, all staff';
            var bvT = [120000, 650000, 200000, 140000, 160000, 0, 0, 0, 0, 0, 0, 0];
            var bvA = [135000, 300400, 75000, 180000, 95000, 0, 0, 0, 0, 0, 0, 0];
            var cvT = [800000, 4000000, 1200000, 750000, 850000, 0, 0, 0, 0, 0, 0, 0];
            var cvA = [910000, 0, 340000, 820000, 410000, 0, 0, 0, 0, 0, 0, 0];

            var cv = document.getElementById('tgt5Chart');
            if (!cv || typeof Chart === 'undefined') return;
            if (chart) chart.destroy();
            chart = new Chart(cv, {
                data: {
                    labels: MONTHS_SHORT,
                    datasets: [
                        { type: 'bar', label: 'BV Target', data: bvT, backgroundColor: 'rgba(37,99,235,.15)', borderColor: '#2563eb', borderWidth: 1.5, borderRadius: 6, maxBarThickness: 22 },
                        { type: 'line', label: 'BV Achieved', data: bvA, borderColor: '#2563eb', backgroundColor: 'rgba(37,99,235,.08)', borderWidth: 2.5, tension: .35, fill: true, pointRadius: 3, pointBackgroundColor: '#2563eb' },
                        { type: 'bar', label: 'CV Target', data: cvT, backgroundColor: 'rgba(22,163,74,.15)', borderColor: '#16a34a', borderWidth: 1.5, borderRadius: 6, maxBarThickness: 22 },
                        { type: 'line', label: 'CV Achieved', data: cvA, borderColor: '#16a34a', backgroundColor: 'rgba(22,163,74,.08)', borderWidth: 2.5, tension: .35, fill: true, pointRadius: 3, pointBackgroundColor: '#16a34a' }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: { position: 'top', labels: { boxWidth: 12, font: { size: 11 } } },
                        tooltip: { callbacks: { label: function(c) { return ' ' + c.dataset.label + ': ' + inrShort(c.parsed.y); } } }
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { font: { size: 10 } } },
                        y: {
                            grid: { color: '#eef0f3' },
                            border: { display: false },
                            ticks: { font: { size: 10 }, callback: function(v) { return inrShort(v); } }
                        }
                    }
                }
            });
        }

        /* Chart.js lazy load */
        function loadChart(cb) {
            if (window.Chart && parseInt(Chart.version, 10) >= 3) return cb();
            var s = document.createElement('script');
            s.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';
            s.onload = cb;
            document.head.appendChild(s);
        }
        loadChart(function() {
            buildChart();
        });
    })();
