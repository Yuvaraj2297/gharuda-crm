<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/summary-report.css">

<div class="sr5-page">

    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div>
                <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Summary Report</h1>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="appointments.php" class="btn btn-sm btn-outline-success"><i class="bi bi-calendar2-week me-1"></i>Appointments</a>
            <a href="callbacks.php" class="btn btn-sm btn-outline-primary"><i class="bi bi-telephone-forward me-1"></i>Callbacks</a>
            <a href="past-meeting.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-calendar-check me-1"></i>Past Meeting</a>
        </div>
    </div>

    <!-- Filter strip -->
    <div class="sr5-filter-card">
        <div class="sr5-filter-head">
            <div class="sr5-filter-title"><i class="bi bi-funnel-fill"></i>Filters</div>
            <button type="button" class="sr5-reset-btn" id="sr5ResetBtn">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
            </button>
        </div>
        <div class="sr5-filter-grid">
            <div class="sr5-fld">
                <label class="lbl" for="sr5AttendedBy">Appointment Attended By</label>
                <select class="form-select select2" id="sr5AttendedBy">
                    <option value="">All Staff</option>
                    <option value="GHARUDA SOFTWARE">GHARUDA SOFTWARE</option>
                    <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                    <option value="Harish D.">Harish D.</option>
                    <option value="Divya A.">Divya A.</option>
                    <option value="Priya S.">Priya S.</option>
                </select>
            </div>
            <div class="sr5-fld">
                <label class="lbl" for="sr5InitiatedBy">Appointment Initiated By</label>
                <select class="form-select select2" id="sr5InitiatedBy">
                    <option value="">All Staff</option>
                    <option value="GHARUDA SOFTWARE">GHARUDA SOFTWARE</option>
                    <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                    <option value="Harish D.">Harish D.</option>
                    <option value="Divya A.">Divya A.</option>
                    <option value="Priya S.">Priya S.</option>
                </select>
            </div>
            <div class="sr5-fld">
                <label class="lbl" for="sr5Period">Appointment Period</label>
                <select class="form-select select2" id="sr5Period">
                    <option value="date" selected>Appointment Period By Date</option>
                    <option value="week">Appointment Period By Week</option>
                    <option value="month">Appointment Period By Month</option>
                    <option value="year">Appointment Period By Year</option>
                </select>
            </div>
            <div class="sr5-fld">
                <label class="lbl" for="sr5Status">Appointment Status</label>
                <select class="form-select select2" id="sr5Status">
                    <option value="">All Statuses</option>
                    <option value="Finished" data-color="#16a34a">Finished</option>
                    <option value="Pending" data-color="#f59e0b">Pending</option>
                    <option value="Cancelled" data-color="#ef4444">Cancelled</option>
                    <option value="Missed" data-color="#64748b">Missed</option>
                </select>
            </div>
            <div class="sr5-fld">
                <label class="lbl" for="sr5Month">Appointment Month</label>
                <select class="form-select select2" id="sr5Month">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10" selected>October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="sr5-fld">
                <label class="lbl" for="sr5Year">Appointment Year</label>
                <select class="form-select select2" id="sr5Year">
                    <option value="2026" selected>2026</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                </select>
            </div>
        </div>
    </div>

    <!-- KPI cards -->
    <div class="sr5-kpi-grid">
        <div class="sr5-kpi k-total">
            <div class="top">
                <span class="ico"><i class="bi bi-calendar2-check"></i></span>
                <span class="lbl">Appointment Total</span>
            </div>
            <div class="val" id="sr5KpiTotal">148</div>
            <div class="sub" id="sr5KpiTotalSub">All statuses</div>
        </div>
        <div class="sr5-kpi k-finished">
            <div class="top">
                <span class="ico"><i class="bi bi-check2-circle"></i></span>
                <span class="lbl">Finished</span>
            </div>
            <div class="val" id="sr5KpiFinished">82</div>
            <div class="bar"><span id="sr5BarFinished" style="width:55%;"></span></div>
            <div class="sub" id="sr5SubFinished">55% of total</div>
        </div>
        <div class="sr5-kpi k-pending">
            <div class="top">
                <span class="ico"><i class="bi bi-hourglass-split"></i></span>
                <span class="lbl">Pending</span>
            </div>
            <div class="val" id="sr5KpiPending">34</div>
            <div class="bar"><span id="sr5BarPending" style="width:23%;"></span></div>
            <div class="sub" id="sr5SubPending">23% of total</div>
        </div>
        <div class="sr5-kpi k-cancelled">
            <div class="top">
                <span class="ico"><i class="bi bi-x-circle"></i></span>
                <span class="lbl">Cancelled</span>
            </div>
            <div class="val" id="sr5KpiCancelled">18</div>
            <div class="bar"><span id="sr5BarCancelled" style="width:12%;"></span></div>
            <div class="sub" id="sr5SubCancelled">12% of total</div>
        </div>
        <div class="sr5-kpi k-missed">
            <div class="top">
                <span class="ico"><i class="bi bi-exclamation-circle"></i></span>
                <span class="lbl">Missed</span>
            </div>
            <div class="val" id="sr5KpiMissed">14</div>
            <div class="bar"><span id="sr5BarMissed" style="width:10%;"></span></div>
            <div class="sub" id="sr5SubMissed">10% of total</div>
        </div>
    </div>

    <!-- Chart card -->
    <div class="sr5-chart-card">
        <div class="sr5-chart-head">
            <div>
                <div class="sr5-chart-title" id="sr5ChartTitle">Appointments by Date</div>
                <div class="sr5-chart-sub" id="sr5ChartSub">October 2026 · all staff</div>
            </div>
        </div>

        <div class="sr5-legend">
            <span class="sr5-lg-item"><span class="sr5-dot" style="background:#16a34a;"></span>Finished <b id="sr5LgFinished">82</b></span>
            <span class="sr5-lg-item"><span class="sr5-dot" style="background:#f59e0b;"></span>Pending <b id="sr5LgPending">34</b></span>
            <span class="sr5-lg-item"><span class="sr5-dot" style="background:#ef4444;"></span>Cancelled <b id="sr5LgCancelled">18</b></span>
            <span class="sr5-lg-item"><span class="sr5-dot" style="background:#64748b;"></span>Missed <b id="sr5LgMissed">14</b></span>
        </div>

        <div class="sr5-chart-wrap">
            <canvas id="sr5Chart"></canvas>
            <div class="sr5-empty" id="sr5Empty">
                <i class="bi bi-bar-chart"></i>
                <span>No appointments for the selected filters</span>
            </div>
        </div>
    </div>

</div>

<script>
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
</script>

<?php include 'footer.php'; ?>