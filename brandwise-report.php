<?php include 'header.php'; ?>

<main class="container-fluid px-0">

    <!-- ===== Hero header + filters ===== -->
    <div class="card border-0 bg-primary text-white rounded-3 p-4 mb-3 shadow-sm position-relative overflow-hidden">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-white bg-opacity-25 text-white p-3 rounded-3 fs-4"><i class="bi bi-graph-up-arrow"></i></span>
                <div>
                    <h5 class="fw-bold mb-1 text-white">Sales Performance Dashboard</h5>
                    <small class="text-white-50">Brand-wise lead, conversion &amp; revenue analytics · 17-10-2026</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <div class="btn-group btn-group-sm bg-white bg-opacity-10 p-1 rounded-pill" id="bwrRange" role="group">
                    <button type="button" class="btn btn-sm text-white rounded-pill px-3 active" data-range="today">Today</button>
                    <button type="button" class="btn btn-sm text-white rounded-pill px-3" data-range="week">This Week</button>
                    <button type="button" class="btn btn-sm text-white rounded-pill px-3" data-range="month">This Month</button>
                    <button type="button" class="btn btn-sm text-white rounded-pill px-3" data-range="year">This Year</button>
                </div>
                <button type="button" class="btn btn-sm btn-light rounded-pill px-3 text-primary fw-semibold" id="bwrRefresh"><i class="bi bi-arrow-clockwise me-1"></i>Refresh</button>
            </div>
        </div>

        <form class="card border-0 bg-white bg-opacity-10 rounded-3 p-3 text-white row g-2 align-items-end" autocomplete="off">
            <div class="col-lg-2 col-md-3 col-6">
                <label class="form-label small fw-bold text-white-50 text-uppercase mb-1" for="bwrDate">Date</label>
                <div class="date-picker">
                    <input type="text" class="date-input form-control form-control-sm" id="bwrDate" placeholder="Select date" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <label class="form-label small fw-bold text-white-50 text-uppercase mb-1" for="bwrBrand">Brand</label>
                <select class="form-select form-select-sm select2" id="bwrBrand" data-placeholder="Non selected" data-allow-clear="true">
                    <option></option>
                    <option>PhD Assistance</option>
                    <option>Thesis Writing</option>
                    <option>Journal Support</option>
                    <option>Publication</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <label class="form-label small fw-bold text-white-50 text-uppercase mb-1" for="bwrProduct">Product</label>
                <select class="form-select form-select-sm select2" id="bwrProduct" data-placeholder="Choose Product" data-allow-clear="true">
                    <option></option>
                    <option>Thesis Writing</option>
                    <option>Journal Publication</option>
                    <option>PhD Assistance</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <label class="form-label small fw-bold text-white-50 text-uppercase mb-1" for="bwrSource">Lead Source</label>
                <select class="form-select form-select-sm select2" id="bwrSource" data-placeholder="Source" data-allow-clear="true">
                    <option></option>
                    <option>Indiamart</option>
                    <option>Website</option>
                    <option>Direct</option>
                    <option>Google</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <button type="button" class="btn btn-sm btn-light w-100 text-primary fw-bold"><i class="bi bi-search me-1"></i>Search</button>
            </div>
        </form>
    </div>
                <div class="bwr-hero-actions">
                    <div class="bwr-range" id="bwrRange">
                        <button type="button" data-range="today" class="active">Today</button>
                        <button type="button" data-range="week">This Week</button>
                        <button type="button" data-range="month">This Month</button>
                        <button type="button" data-range="year">This Year</button>
                    </div>
                    <button type="button" class="bwr-hero-btn" id="bwrRefresh"><i class="bi bi-arrow-clockwise me-1"></i>Refresh</button>
                </div>
            </div>

            <form class="bwr-filters row g-2 align-items-end" autocomplete="off">
                <div class="col-lg-2 col-md-3 col-6">
                    <label class="form-label" for="bwrDate">Date</label>
                    <div class="date-picker">
                        <input type="text" class="date-input form-control" id="bwrDate" placeholder="Select date" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <label class="form-label" for="bwrBrand">Brand</label>
                    <select class="form-select select2" id="bwrBrand" data-placeholder="Non selected" data-allow-clear="true">
                        <option></option>
                        <option>PhD Assistance</option>
                        <option>Thesis Writing</option>
                        <option>Journal Support</option>
                        <option>Publication</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <label class="form-label" for="bwrProduct">Product</label>
                    <select class="form-select select2" id="bwrProduct" data-placeholder="Choose Product" data-allow-clear="true">
                        <option></option>
                        <option>Thesis Writing</option>
                        <option>Journal Publication</option>
                        <option>PhD Assistance</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <label class="form-label" for="bwrSource">Lead Source</label>
                    <select class="form-select select2" id="bwrSource" data-placeholder="Source" data-allow-clear="true">
                        <option></option>
                        <option>Indiamart</option>
                        <option>Website</option>
                        <option>Direct</option>
                        <option>Google</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <button type="button" class="btn btn-search w-100"><i class="bi bi-search me-1"></i>Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ===== KPI cards (always visible) ===== -->
    <div class="row g-3 mb-3">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <small class="text-muted fw-bold text-uppercase d-block" style="font-size: 0.7rem; letter-spacing: 0.05em;">Total Leads</small>
                        <small class="text-muted" style="font-size: 0.75rem;">All sources</small>
                    </div>
                    <span class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-people-fill"></i></span>
                </div>
                <div class="fs-4 fw-bold text-dark">150</div>
                <div class="mt-2"><span class="badge bg-success-subtle text-success"><i class="bi bi-arrow-up-short"></i>16.8% vs last month</span></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <small class="text-muted fw-bold text-uppercase d-block" style="font-size: 0.7rem; letter-spacing: 0.05em;">Conversion Rate</small>
                        <small class="text-muted" style="font-size: 0.75rem;">Converted customers</small>
                    </div>
                    <span class="badge bg-warning-subtle text-warning p-2 rounded-2 fs-6"><i class="bi bi-graph-up-arrow"></i></span>
                </div>
                <div class="fs-4 fw-bold text-dark">17.3%</div>
                <div class="mt-2"><span class="badge bg-success-subtle text-success"><i class="bi bi-arrow-up-short"></i>17.3% vs last month</span></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <small class="text-muted fw-bold text-uppercase d-block" style="font-size: 0.7rem; letter-spacing: 0.05em;">Monthly Revenue</small>
                        <small class="text-muted" style="font-size: 0.75rem;">Current month</small>
                    </div>
                    <span class="badge bg-success-subtle text-success p-2 rounded-2 fs-6"><i class="bi bi-currency-rupee"></i></span>
                </div>
                <div class="fs-4 fw-bold text-dark">₹ 3,356,047</div>
                <div class="mt-2"><span class="badge bg-success-subtle text-success"><i class="bi bi-arrow-up-short"></i>9.0% vs last month</span></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <small class="text-muted fw-bold text-uppercase d-block" style="font-size: 0.7rem; letter-spacing: 0.05em;">Outstanding Balance</small>
                        <small class="text-muted" style="font-size: 0.75rem;">Across all brands</small>
                    </div>
                    <span class="badge bg-danger-subtle text-danger p-2 rounded-2 fs-6"><i class="bi bi-wallet2"></i></span>
                </div>
                <div class="fs-4 fw-bold text-dark">₹ 12,638,319</div>
                <div class="mt-2"><span class="badge bg-danger-subtle text-danger"><i class="bi bi-arrow-up-short"></i>3.2% vs last month</span></div>
            </div>
        </div>
    </div>

    <!-- ===== Section tabs ===== -->
    <ul class="nav nav-pills gap-2 mb-3" id="bwrTabs">
        <li class="nav-item">
            <button type="button" class="nav-link active bwr-tab" data-tab="overview"><i class="bi bi-speedometer2 me-1"></i>Overview</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link bwr-tab" data-tab="leads"><i class="bi bi-person-plus-fill me-1"></i>Lead Generation</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link bwr-tab" data-tab="qualification"><i class="bi bi-funnel-fill me-1"></i>Qualification &amp; Brands</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link bwr-tab" data-tab="geo"><i class="bi bi-globe-americas me-1"></i>Geography &amp; Products</button>
        </li>
    </ul>

    <!-- ============ PANEL: OVERVIEW ============ -->
    <div class="bwr-panel active" id="bwrPanel-overview" style="display: block;">
        <div class="card border-0 shadow-sm rounded-3 p-3 mb-3">
            <div class="bwr-sec-head">
                <div class="bwr-sec-title-l">
                    <div class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-trophy-fill"></i></div>
                    <div>
                        <div class="bwr-sec-title">Performance Summary</div>
                        <div class="bwr-sec-sub">Revenue trend, target progress and customer mix at a glance</div>
                    </div>
                </div>
                <span class="badge bg-light text-secondary border small"><i class="bi bi-cash-stack me-1"></i>₹ 812,000 revenue YTD</span>
            </div>
            <div class="row g-3">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="bwr-chart-head">
                            <span class="bwr-chart-title">Monthly Revenue Trend</span>
                            <span class="badge bg-light text-secondary border small">Jan – Dec</span>
                        </div>
                        <canvas id="bwrRevChart" height="235"></canvas>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="bwr-chart-head">
                            <span class="bwr-chart-title">Target vs Achieved</span>
                        </div>
                        <div class="bwr-target-wrap">
                            <div style="width:170px;height:170px;position:relative;">
                                <canvas id="bwrTargetChart" width="170" height="170"></canvas>
                                <div class="bwr-target-center">
                                    <div class="pct">68%</div>
                                    <div class="sub">40,800 / 60,000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="bwr-chart-head">
                            <span class="bwr-chart-title">Customer Insights</span>
                        </div>
                        <canvas id="bwrCustChart" height="215"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ PANEL: LEAD GENERATION ============ -->
    <div class="bwr-panel" id="bwrPanel-leads" style="display: none;">
        <div class="card border-0 shadow-sm rounded-3 p-3 mb-3">
            <div class="bwr-sec-head">
                <div class="bwr-sec-title-l">
                    <div class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-person-plus-fill"></i></div>
                    <div>
                        <div class="bwr-sec-title">Lead Generation &amp; Distribution</div>
                        <div class="bwr-sec-sub">Daily inflow, source-wise split and conversion behaviour</div>
                    </div>
                </div>
                <span class="badge bg-light text-secondary border small"><i class="bi bi-lightning-charge-fill me-1"></i>318 leads this period</span>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="bwr-chart-head">
                            <span class="bwr-chart-title">Leads by Date</span>
                            <span class="badge bg-light text-secondary border small">Last 30 days</span>
                        </div>
                        <canvas id="bwrLeadsDateChart" height="230"></canvas>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="bwr-chart-head">
                            <span class="bwr-chart-title">Leads by Source</span>
                            <span class="badge bg-light text-secondary border small">12 sources</span>
                        </div>
                        <canvas id="bwrLeadsSourceChart" height="230"></canvas>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="bwr-chart-head">
                    <span class="bwr-chart-title">Conversion Overview</span>
                    <div class="btn-group btn-group-sm" id="bwrHourSeg">
                        <button type="button" data-tab="day" class="active">Day</button>
                        <button type="button" data-tab="week">Week</button>
                        <button type="button" data-tab="month">Month</button>
                    </div>
                </div>
                <canvas id="bwrHourChart" height="200"></canvas>
            </div>
        </div>
    </div>

    <!-- ============ PANEL: QUALIFICATION & BRANDS ============ -->
    <div class="bwr-panel" id="bwrPanel-qualification" style="display: none;">
        <div class="card border-0 shadow-sm rounded-3 p-3 mb-3">
            <div class="bwr-sec-head">
                <div class="bwr-sec-title-l">
                    <div class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-funnel-fill"></i></div>
                    <div>
                        <div class="bwr-sec-title">Qualification &amp; Brand Performance</div>
                        <div class="bwr-sec-sub">SQL / MQL / UQL mix and conversion rate across brands</div>
                    </div>
                </div>
                <span class="badge bg-light text-secondary border small"><i class="bi bi-bullseye me-1"></i>100 qualified leads</span>
            </div>
            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="bwr-chart-head">
                            <span class="bwr-chart-title">Lead Qualification</span>
                        </div>
                        <canvas id="bwrQualChart" height="240"></canvas>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="bwr-chart-head">
                            <span class="bwr-chart-title">Conversion Rate by Brand</span>
                            <span class="badge bg-light text-secondary border small">Avg 13.2%</span>
                        </div>
                        <canvas id="bwrBrandConvChart" height="240"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ PANEL: GEOGRAPHY & PRODUCTS ============ -->
    <div class="bwr-panel" id="bwrPanel-geo" style="display: none;">
        <div class="card border-0 shadow-sm rounded-3 p-3 mb-3">
            <div class="bwr-sec-head">
                <div class="bwr-sec-title-l">
                    <div class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-globe-americas"></i></div>
                    <div>
                        <div class="bwr-sec-title">Country Specific Sales</div>
                        <div class="bwr-sec-sub">Revenue contribution by country</div>
                    </div>
                </div>
                <span class="badge bg-light text-secondary border small"><i class="bi bi-globe2 me-1"></i>5 countries · 100% share</span>
            </div>
            <div class="bwr-country-row">
                <span class="crank">1</span>
                <span class="cflag">🇮🇳</span>
                <span class="cname">India</span>
                <div class="cbar"><span style="width:100%"></span></div>
                <span class="cval">₹ 3,332,310.44</span>
                <span class="cpct">82%</span>
            </div>
            <div class="bwr-country-row">
                <span class="crank">2</span>
                <span class="cflag">🇺🇸</span>
                <span class="cname">United States</span>
                <div class="cbar"><span style="width:11%"></span></div>
                <span class="cval">₹ 412,000.00</span>
                <span class="cpct">9%</span>
            </div>
            <div class="bwr-country-row">
                <span class="crank">3</span>
                <span class="cflag">🇬🇧</span>
                <span class="cname">United Kingdom</span>
                <div class="cbar"><span style="width:5%"></span></div>
                <span class="cval">₹ 185,500.00</span>
                <span class="cpct">4%</span>
            </div>
            <div class="bwr-country-row">
                <span class="crank">4</span>
                <span class="cflag">🇦🇺</span>
                <span class="cname">Australia</span>
                <div class="cbar"><span style="width:4%"></span></div>
                <span class="cval">₹ 121,400.00</span>
                <span class="cpct">3%</span>
            </div>
            <div class="bwr-country-row">
                <span class="crank">5</span>
                <span class="cflag">🇩🇪</span>
                <span class="cname">Germany</span>
                <div class="cbar"><span style="width:2%"></span></div>
                <span class="cval">₹ 86,000.00</span>
                <span class="cpct">2%</span>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-3 p-3 mb-3">
            <div class="bwr-sec-head">
                <div class="bwr-sec-title-l">
                    <div class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-box-seam-fill"></i></div>
                    <div>
                        <div class="bwr-sec-title">Product / Service Performance</div>
                        <div class="bwr-sec-sub">Units sold per product, highest first</div>
                    </div>
                </div>
                <span class="badge bg-light text-secondary border small"><i class="bi bi-boxes me-1"></i>22 products tracked</span>
            </div>
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="bwr-chart-head">
                    <span class="bwr-chart-title">Revenue by Product</span>
                    <span class="badge bg-light text-secondary border small">Top: Full XL (92)</span>
                </div>
                <canvas id="bwrProductChart" height="420"></canvas>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

<script>
    /* Load Chart.js v4 if not already present */
    (function() {
        var bwrCharts = {};

        function init() {
            Chart.defaults.font.family = getComputedStyle(document.body).fontFamily;
            Chart.defaults.color = '#6b7684';
            Chart.defaults.plugins.legend.labels.boxWidth = 10;
            Chart.defaults.plugins.legend.labels.usePointStyle = true;

            var GREEN = '#16a34a',
                GREEN_D = '#0f7a38',
                GREEN_L = '#86efac';
            var AMBER = '#f59e0b',
                VIOLET = '#8b5cf6';

            var tooltipStyle = {
                backgroundColor: '#16202b',
                padding: 10,
                cornerRadius: 9,
                titleFont: {
                    weight: '700',
                    size: 12
                },
                bodyFont: {
                    size: 12
                },
                displayColors: true,
                boxPadding: 4
            };

            function grad(ctx, area, c1, c2) {
                if (!area) return c1;
                var g = ctx.createLinearGradient(0, area.top, 0, area.bottom);
                g.addColorStop(0, c1);
                g.addColorStop(1, c2);
                return g;
            }

            /* ---- Overview: Monthly revenue trend ---- */
            var revTrendData = [0, 120000, 280000, 152000, 48000, 204000, 0, 2000, 8000, 0, 0, 0];
            bwrCharts.rev = new Chart(document.getElementById('bwrRevChart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue',
                        data: revTrendData,
                        borderColor: GREEN,
                        backgroundColor: function(c) {
                            return grad(c.chart.ctx, c.chart.chartArea, 'rgba(22,163,74,.28)', 'rgba(22,163,74,.02)');
                        },
                        fill: true,
                        tension: .4,
                        pointRadius: 0,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: GREEN_D,
                        pointHoverBorderColor: '#fff',
                        pointHoverBorderWidth: 2,
                        borderWidth: 2.5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(20,20,43,.05)'
                            },
                            ticks: {
                                callback: function(v) {
                                    return v >= 1000 ? (v / 1000) + 'k' : v;
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            /* ---- Overview: Target gauge ---- */
            bwrCharts.target = new Chart(document.getElementById('bwrTargetChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Achieved', 'Remaining'],
                    datasets: [{
                        data: [68, 32],
                        backgroundColor: [GREEN, '#e8ecef'],
                        borderWidth: 0,
                        borderRadius: 10
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '76%',
                    rotation: -90,
                    circumference: 180,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    }
                }
            });

            /* ---- Overview: Customer insights ---- */
            bwrCharts.cust = new Chart(document.getElementById('bwrCustChart'), {
                type: 'doughnut',
                data: {
                    labels: ['New Customers', 'Repeat Customers'],
                    datasets: [{
                        data: [72, 28],
                        backgroundColor: [AMBER, VIOLET],
                        hoverOffset: 6,
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '64%',
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: tooltipStyle
                    }
                }
            });

            /* ---- Leads: by date ---- */
            var dateLabels = [];
            for (var d = 1; d <= 30; d++) dateLabels.push(d < 10 ? '0' + d : '' + d);
            var leadsByDateData = [4, 7, 6, 9, 8, 5, 3, 6, 8, 7, 10, 12, 9, 6, 8, 11, 9, 7, 12, 16, 10, 8, 9, 7, 6, 9, 11, 14, 87, 12];
            bwrCharts.leadsDate = new Chart(document.getElementById('bwrLeadsDateChart'), {
                type: 'line',
                data: {
                    labels: dateLabels,
                    datasets: [{
                        label: 'Leads',
                        data: leadsByDateData,
                        borderColor: GREEN,
                        backgroundColor: function(c) {
                            return grad(c.chart.ctx, c.chart.chartArea, 'rgba(22,163,74,.26)', 'rgba(22,163,74,.02)');
                        },
                        fill: true,
                        tension: .38,
                        pointRadius: 0,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: GREEN_D,
                        pointHoverBorderColor: '#fff',
                        pointHoverBorderWidth: 2,
                        borderWidth: 2.5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(20,20,43,.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 15
                            }
                        }
                    }
                }
            });

            /* ---- Leads: by source (sorted desc, top highlighted) ---- */
            var srcSorted = [
                ['Indiamart', 122],
                ['Direct', 12],
                ['Website', 9],
                ['Text', 8],
                ['Insta', 6],
                ['Exhibition', 5],
                ['Facebook', 5],
                ['LinkedIn', 4],
                ['Google', 4],
                ['Email', 3],
                ['Telegram', 3],
                ['Consultant/Referral', 2]
            ];
            var srcMax = srcSorted.length ? srcSorted[0][1] : 0;
            bwrCharts.leadsSource = new Chart(document.getElementById('bwrLeadsSourceChart'), {
                type: 'bar',
                data: {
                    labels: srcSorted.map(function(r) {
                        return r[0];
                    }),
                    datasets: [{
                        label: 'Leads',
                        data: srcSorted.map(function(r) {
                            return r[1];
                        }),
                        backgroundColor: srcSorted.map(function(r) {
                            return r[1] === srcMax ? GREEN_D : 'rgba(22,163,74,.55)';
                        }),
                        hoverBackgroundColor: GREEN,
                        borderRadius: 6,
                        maxBarThickness: 24
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(20,20,43,.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                maxRotation: 55,
                                minRotation: 40,
                                font: {
                                    size: 10
                                }
                            }
                        }
                    }
                }
            });

            /* ---- Leads: conversion overview (segmented) ---- */
            var hourLabelsDay = ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
            var hourData = {
                day: [0.2, 0.4, 0.3, 0.5, 0.6, 0.4, 0.3, 0.5, 0.7, 0.6, 0.8, 0.7, 0.9, 0.8, 0.6, 0.7, 0.5, 0.6, 0.4, 0.5, 0.3, 0.4, 0.2, 0.3],
                week: [0.5, 0.6, 0.55, 0.65, 0.7, 0.6, 0.75],
                month: [0.42, 0.5, 0.61, 0.48, 0.72, 0.66, 0.58, 0.7, 0.64, 0.75, 0.69, 0.8]
            };
            var hourLabelsWk = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            var hourLabelsMo = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            bwrCharts.hour = new Chart(document.getElementById('bwrHourChart'), {
                type: 'line',
                data: {
                    labels: hourLabelsDay,
                    datasets: [{
                        label: 'Conversion',
                        data: hourData.day,
                        borderColor: AMBER,
                        backgroundColor: function(c) {
                            return grad(c.chart.ctx, c.chart.chartArea, 'rgba(245,158,11,.22)', 'rgba(245,158,11,.02)');
                        },
                        fill: true,
                        tension: .38,
                        pointRadius: 0,
                        pointHoverRadius: 5,
                        borderWidth: 2.5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(20,20,43,.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 10
                                },
                                maxTicksLimit: 12
                            }
                        }
                    }
                }
            });

            document.querySelectorAll('#bwrHourSeg button').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('#bwrHourSeg button').forEach(function(b) {
                        b.classList.remove('active');
                    });
                    btn.classList.add('active');
                    var t = btn.dataset.tab;
                    bwrCharts.hour.data.labels = t === 'day' ? hourLabelsDay : (t === 'week' ? hourLabelsWk : hourLabelsMo);
                    bwrCharts.hour.data.datasets[0].data = hourData[t];
                    bwrCharts.hour.update();
                });
            });

            /* ---- Qualification: doughnut ---- */
            bwrCharts.qual = new Chart(document.getElementById('bwrQualChart'), {
                type: 'doughnut',
                data: {
                    labels: ['SQL', 'MQL', 'UQL'],
                    datasets: [{
                        data: [62, 23, 15],
                        backgroundColor: [GREEN_D, GREEN, GREEN_L],
                        hoverOffset: 6,
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: '64%',
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: tooltipStyle
                    }
                }
            });

            /* ---- Qualification: conversion by brand ---- */
            bwrCharts.brandConv = new Chart(document.getElementById('bwrBrandConvChart'), {
                type: 'bar',
                data: {
                    labels: ['PhD Assistance', 'Thesis Writing', 'Journal Support', 'Publication'],
                    datasets: [{
                        label: 'Conversion %',
                        data: [17.3, 14.1, 11.8, 9.6],
                        backgroundColor: function(c) {
                            return grad(c.chart.ctx, c.chart.chartArea, 'rgba(22,163,74,.9)', 'rgba(22,163,74,.45)');
                        },
                        borderRadius: 7,
                        maxBarThickness: 46
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(20,20,43,.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 10.5
                                }
                            }
                        }
                    }
                }
            });

            /* ---- Geography & Products: horizontal product bar ---- */
            var productLabels = ['Full XL', 'BX900', 'Membrana', '1.6 x 122', '1.6 x 115', 'BX000', 'Full', 'Catalise', 'Adenine', 'Adenoglycinth 2%', 'Adenoglycinth 5%', 'Adenoglycinth 10%', 'Adenoglycinth 3%', 'IWB Panel', 'SPM', 'Micro Thread', '1.6 x 127', 'B-Lead Material', 'Machine', 'Kit Top', 'BX400', 'Misc'];
            var productUnits = [92, 10, 3, 3, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];

            bwrCharts.product = new Chart(document.getElementById('bwrProductChart'), {
                type: 'bar',
                data: {
                    labels: productLabels,
                    datasets: [{
                        label: 'Units',
                        data: productUnits,
                        backgroundColor: 'rgba(22,163,74,.6)',
                        hoverBackgroundColor: GREEN,
                        borderRadius: 5,
                        maxBarThickness: 14
                    }]
                },
                options: {
                    indexAxis: 'y',
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: tooltipStyle
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(20,20,43,.05)'
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 10.5
                                }
                            }
                        }
                    }
                }
            });
        }

        function loadChart(cb) {
            if (window.Chart && parseInt(Chart.version, 10) >= 3) return cb();
            var s = document.createElement('script');
            s.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';
            s.onload = cb;
            document.head.appendChild(s);
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadChart(init);
        });
    })();

    /* ---- Tab switching (Hide & Show in JavaScript) + hero quick actions ---- */
    document.addEventListener('DOMContentLoaded', function() {
        /* Section tabs: pure JS display block / none */
        var tabs = document.querySelectorAll('#bwrTabs .bwr-tab');
        var panels = document.querySelectorAll('.bwr-panel');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                var targetName = tab.getAttribute('data-tab');

                /* Active class update for tabs */
                tabs.forEach(function(t) {
                    t.classList.remove('active');
                });
                tab.classList.add('active');

                /* Hide and Show panels with display block/none */
                panels.forEach(function(p) {
                    p.classList.remove('active');
                    p.style.display = 'none';
                });

                var activePanel = document.getElementById('bwrPanel-' + targetName);
                if (activePanel) {
                    activePanel.classList.add('active');
                    activePanel.style.display = 'block';

                    /* Re-measure charts that were hidden (canvas had 0 size) */
                    requestAnimationFrame(function() {
                        activePanel.querySelectorAll('canvas').forEach(function(cv) {
                            var ch = (typeof Chart !== 'undefined' && Chart.getChart) ? Chart.getChart(cv) : null;
                            if (ch) ch.resize();
                        });
                    });
                }
            });
        });

        /* Quick range chips toggle active */
        document.querySelectorAll('#bwrRange button').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('#bwrRange button').forEach(function(b) {
                    b.classList.remove('active');
                });
                btn.classList.add('active');
            });
        });

        /* Refresh */
        var refreshBtn = document.getElementById('bwrRefresh');
        if (refreshBtn) {
            refreshBtn.addEventListener('click', function() {
                window.location.reload();
            });
        }
    });
</script>