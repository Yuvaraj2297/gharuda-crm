/**
 * Gharuda CRM - Summary Report Page Script
 * File: assets/js/pages/summary-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
        'use strict';

        var CUR_YEAR  = 2026;
        var CUR_MONTH = 10;

        var MONTHS       = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var MONTHS_SHORT = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var STAFF        = ['GHARUDA SOFTWARE', 'gharuda SOFTWARE', 'Harish D.', 'Divya A.', 'Priya S.'];
        var STATUSES     = ['Finished', 'Pending', 'Cancelled', 'Missed'];

        var STATUS_POOL = ['Finished', 'Finished', 'Finished', 'Finished', 'Finished', 'Pending', 'Pending', 'Cancelled', 'Missed'];

        var STATUS_COLOR = {
            'Finished': '#16a34a',
            'Pending': '#f59e0b',
            'Cancelled': '#ef4444',
            'Missed': '#64748b'
        };

        function pad2(n) { return (n < 10 ? '0' : '') + n; }

        function mulberry32(a) {
            return function() {
                a |= 0;
                a = a + 0x6D2B79F5 | 0;
                var t = Math.imul(a ^ a >>> 15, 1 | a);
                t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t;
                return ((t ^ t >>> 14) >>> 0) / 4294967296;
            };
        }

        /* Deterministic dataset */
        function makeAppointments() {
            var rows = [];
            var rnd = mulberry32(20260928);

            [CUR_YEAR - 1, CUR_YEAR].forEach(function(yr) {
                for (var m = 1; m <= 12; m++) {
                    var days = new Date(yr, m, 0).getDate();
                    for (var d = 1; d <= days; d++) {
                        var n = Math.floor(rnd() * 3);
                        if (yr === CUR_YEAR && m === CUR_MONTH && (d === 26 || d === 27)) n = 3;
                        for (var i = 0; i < n; i++) {
                            rows.push({
                                year: yr,
                                month: m,
                                day: d,
                                date: yr + '-' + pad2(m) + '-' + pad2(d),
                                status: STATUS_POOL[Math.floor(rnd() * STATUS_POOL.length)],
                                attendedBy: STAFF[Math.floor(rnd() * STAFF.length)],
                                initiatedBy: STAFF[Math.floor(rnd() * STAFF.length)]
                            });
                        }
                    }
                }
            });

            return rows;
        }

        var appointments = makeAppointments();

        /* Element refs */
        var attendedSel  = document.getElementById('sr5AttendedBy');
        var initiatedSel = document.getElementById('sr5InitiatedBy');
        var periodSel    = document.getElementById('sr5Period');
        var statusSel    = document.getElementById('sr5Status');
        var monthSel     = document.getElementById('sr5Month');
        var yearSel      = document.getElementById('sr5Year');

        var chart = null;

        function setFieldDisabled(sel, isDisabled) {
            if (!sel) return;
            sel.disabled = isDisabled;
            if (window.jQuery && jQuery.fn.select2) {
                jQuery(sel).prop('disabled', isDisabled);
            }
            var fld = sel.closest('.sr5-fld');
            if (fld) fld.classList.toggle('is-disabled', isDisabled);
        }

        function currentFilters() {
            return {
                attendedBy: attendedSel ? attendedSel.value : '',
                initiatedBy: initiatedSel ? initiatedSel.value : '',
                period: periodSel ? periodSel.value : 'date',
                status: statusSel ? statusSel.value : '',
                month: monthSel ? Number(monthSel.value) : CUR_MONTH,
                year: yearSel ? Number(yearSel.value) : CUR_YEAR
            };
        }

        function scopedRows(f) {
            return appointments.filter(function(r) {
                if (f.attendedBy && r.attendedBy !== f.attendedBy) return false;
                if (f.initiatedBy && r.initiatedBy !== f.initiatedBy) return false;
                if (f.status && r.status !== f.status) return false;
                if (f.period === 'date' || f.period === 'week') {
                    return r.year === f.year && r.month === f.month;
                }
                if (f.period === 'month') {
                    return r.year === f.year;
                }
                return true;
            });
        }

        function buildBuckets(f) {
            var labels = [];
            var keys = [];

            if (f.period === 'date') {
                var days = new Date(f.year, f.month, 0).getDate();
                for (var d = 1; d <= days; d++) {
                    labels.push(MONTHS_SHORT[f.month - 1] + ' ' + d);
                    keys.push('d' + d);
                }
            } else if (f.period === 'week') {
                for (var w = 1; w <= 5; w++) {
                    labels.push('Week ' + w);
                    keys.push('w' + w);
                }
            } else if (f.period === 'month') {
                MONTHS_SHORT.forEach(function(m, i) {
                    labels.push(m);
                    keys.push('m' + (i + 1));
                });
            } else {
                var years = [CUR_YEAR - 1, CUR_YEAR];
                years.forEach(function(y) {
                    labels.push(String(y));
                    keys.push('y' + y);
                });
            }

            return { labels: labels, keys: keys };
        }

        function keyOf(r, period) {
            if (period === 'date') return 'd' + r.day;
            if (period === 'week') return 'w' + Math.ceil(r.day / 7);
            if (period === 'month') return 'm' + r.month;
            return 'y' + r.year;
        }

        function renderKpis(rows) {
            var total = rows.length;
            var elTot = document.getElementById('sr5KpiTotal');
            var elTotSub = document.getElementById('sr5KpiTotalSub');
            if (elTot) elTot.textContent = total;
            if (elTotSub) elTotSub.textContent = 'All statuses' + (total ? '' : ' · no records');

            STATUSES.forEach(function(st) {
                var count = rows.filter(function(r) { return r.status === st; }).length;
                var share = total > 0 ? Math.round(count / total * 100) : 0;

                var elVal = document.getElementById('sr5Kpi' + st);
                var elBar = document.getElementById('sr5Bar' + st);
                var elSub = document.getElementById('sr5Sub' + st);
                var elLg  = document.getElementById('sr5Lg' + st);

                if (elVal) elVal.textContent = count;
                if (elBar) elBar.style.width = share + '%';
                if (elSub) elSub.textContent = share + '% of total';
                if (elLg) elLg.textContent = count;
            });

            var elEmpty = document.getElementById('sr5Empty');
            if (elEmpty) elEmpty.classList.toggle('show', total === 0);
        }

        /* Lazy Chart.js Loader */
        var chartQueue = [];
        var chartRequested = false;

        function loadChart(cb) {
            if (window.Chart && parseInt(Chart.version, 10) >= 3) return cb();
            chartQueue.push(cb);
            if (chartRequested) return;
            chartRequested = true;
            var s = document.createElement('script');
            s.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';
            s.onload = function() {
                chartRequested = false;
                var q = chartQueue;
                chartQueue = [];
                q.forEach(function(fn) { fn(); });
            };
            s.onerror = function() { chartRequested = false; };
            document.head.appendChild(s);
        }

        function chartTitle(f) {
            if (f.period === 'date') return 'Appointments by Date';
            if (f.period === 'week') return 'Appointments by Week';
            if (f.period === 'month') return 'Appointments by Month';
            return 'Appointments by Year';
        }

        function chartSub(f) {
            if (f.period === 'date' || f.period === 'week') return MONTHS[f.month - 1] + ' ' + f.year + ' · all staff';
            if (f.period === 'month') return f.year + ' · all staff';
            return 'All years · all staff';
        }

        function buildChart(rows, f) {
            var elTitle = document.getElementById('sr5ChartTitle');
            var elSub = document.getElementById('sr5ChartSub');
            if (elTitle) elTitle.textContent = chartTitle(f);
            if (elSub) elSub.textContent = chartSub(f);

            var buckets = buildBuckets(f);
            var index = {};
            buckets.keys.forEach(function(k, i) { index[k] = i; });

            var series = {};
            STATUSES.forEach(function(st) {
                series[st] = buckets.labels.map(function() { return 0; });
            });

            rows.forEach(function(r) {
                var i = index[keyOf(r, f.period)];
                if (i === undefined) return;
                series[r.status][i]++;
            });

            var canvas = document.getElementById('sr5Chart');
            if (!canvas || typeof Chart === 'undefined') return;

            Chart.defaults.font.family = getComputedStyle(document.body).fontFamily;
            if (chart) chart.destroy();

            chart = new Chart(canvas, {
                type: 'bar',
                data: {
                    labels: buckets.labels,
                    datasets: STATUSES.map(function(st) {
                        return {
                            label: st,
                            data: series[st],
                            backgroundColor: STATUS_COLOR[st],
                            borderRadius: 4,
                            maxBarThickness: 26
                        };
                    })
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(c) { return ' ' + c.dataset.label + ': ' + c.parsed.y; }
                            }
                        }
                    },
                    scales: {
                        x: {
                            stacked: true,
                            grid: { display: false },
                            border: { display: false },
                            ticks: { font: { size: 10 }, autoSkip: true, maxRotation: 0 }
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                            grid: { color: '#eef0f3' },
                            border: { display: false },
                            ticks: { font: { size: 10 }, precision: 0 }
                        }
                    }
                }
            });
        }

        var chartLoaded = false;

        function renderAll() {
            var f = currentFilters();

            setFieldDisabled(monthSel, f.period === 'month' || f.period === 'year');
            setFieldDisabled(yearSel, f.period === 'year');

            var rows = scopedRows(f);
            renderKpis(rows);

            if (chartLoaded) {
                buildChart(rows, f);
            } else {
                loadChart(function() {
                    chartLoaded = true;
                    buildChart(scopedRows(currentFilters()), currentFilters());
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            [attendedSel, initiatedSel, periodSel, statusSel, monthSel, yearSel].forEach(function(el) {
                if (el) el.addEventListener('change', renderAll);
            });

            var resetBtn = document.getElementById('sr5ResetBtn');
            if (resetBtn) {
                resetBtn.addEventListener('click', function() {
                    if (attendedSel) attendedSel.value = '';
                    if (initiatedSel) initiatedSel.value = '';
                    if (periodSel) periodSel.value = 'date';
                    if (statusSel) statusSel.value = '';
                    if (monthSel) monthSel.value = String(CUR_MONTH);
                    if (yearSel) yearSel.value = String(CUR_YEAR);

                    if (window.jQuery && jQuery.fn.select2) {
                        jQuery('#sr5AttendedBy, #sr5InitiatedBy, #sr5Period, #sr5Status, #sr5Month, #sr5Year').trigger('change.select2');
                    }
                    renderAll();
                });
            }

            renderAll();
        });
    })();
