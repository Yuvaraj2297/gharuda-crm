<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Standard Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sales Performance Dashboard</h1>
            <nav class="breadcrumb-text d-flex align-items-center gap-1">
                <i class="bi bi-graph-up-arrow text-primary me-1"></i>
                <span>Reports</span>
                <i class="bi bi-chevron-right text-muted mx-1" style="font-size:10px;"></i>
                <span class="text-dark fw-semibold">Brand-wise Analytics</span>
                <span class="text-muted ms-2">&middot; 17-10-2026</span>
            </nav>
        </div>
        <div class="page-actions">
            <div class="btn-group btn-group-sm bg-light border p-1 rounded-pill" id="bwrRange" role="group">
                <button type="button" class="btn btn-sm btn-outline-primary active rounded-pill px-3" data-range="today">Today</button>
                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-range="week">This Week</button>
                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-range="month">This Month</button>
                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-range="year">This Year</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3" id="bwrRefresh">
                <i class="bi bi-arrow-clockwise me-1"></i> Refresh
            </button>
        </div>
    </div>

    <!-- Filters Card -->
    <form class="card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white" autocomplete="off">
        <div class="row g-3 align-items-end">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="bwrDate">Select Date</label>
                <div class="date-picker">
                    <input type="text" class="date-input form-control" id="bwrDate" placeholder="Select date" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="bwrBrand">Brand</label>
                <select class="form-select select2" id="bwrBrand" data-placeholder="Choose Brand" data-allow-clear="true">
                    <option></option>
                    <option>PhD Assistance</option>
                    <option>Thesis Writing</option>
                    <option>Journal Support</option>
                    <option>Publication</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="bwrProduct">Product</label>
                <select class="form-select select2" id="bwrProduct" data-placeholder="Choose Product" data-allow-clear="true">
                    <option></option>
                    <option>Thesis Writing</option>
                    <option>Journal Publication</option>
                    <option>PhD Assistance</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <label class="form-label" for="bwrSource">Lead Source</label>
                <select class="form-select select2" id="bwrSource" data-placeholder="Choose Source" data-allow-clear="true">
                    <option></option>
                    <option>Indiamart</option>
                    <option>Website</option>
                    <option>Direct</option>
                    <option>Google</option>
                </select>
            </div>
            <div class="col-lg-1 col-md-4 col-sm-12">
                <button type="button" class="btn btn-primary w-100">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- KPI Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <small class="text-muted fw-bold text-uppercase d-block" style="font-size: 0.72rem; letter-spacing: 0.05em;">Total Leads</small>
                        <small class="text-muted" style="font-size: 0.75rem;">All sources</small>
                    </div>
                    <span class="badge bg-primary-subtle text-primary p-2 rounded-3 fs-5"><i class="bi bi-people-fill"></i></span>
                </div>
                <div class="fs-3 fw-bold text-dark">150</div>
                <div class="mt-2">
                    <span class="badge bg-success-subtle text-success"><i class="bi bi-arrow-up-short"></i>16.8% vs last month</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <small class="text-muted fw-bold text-uppercase d-block" style="font-size: 0.72rem; letter-spacing: 0.05em;">Conversion Rate</small>
                        <small class="text-muted" style="font-size: 0.75rem;">Converted customers</small>
                    </div>
                    <span class="badge bg-warning-subtle text-warning p-2 rounded-3 fs-5"><i class="bi bi-graph-up-arrow"></i></span>
                </div>
                <div class="fs-3 fw-bold text-dark">17.3%</div>
                <div class="mt-2">
                    <span class="badge bg-success-subtle text-success"><i class="bi bi-arrow-up-short"></i>17.3% vs last month</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <small class="text-muted fw-bold text-uppercase d-block" style="font-size: 0.72rem; letter-spacing: 0.05em;">Monthly Revenue</small>
                        <small class="text-muted" style="font-size: 0.75rem;">Current month</small>
                    </div>
                    <span class="badge bg-success-subtle text-success p-2 rounded-3 fs-5"><i class="bi bi-currency-rupee"></i></span>
                </div>
                <div class="fs-3 fw-bold text-dark">&#8377; 3,356,047</div>
                <div class="mt-2">
                    <span class="badge bg-success-subtle text-success"><i class="bi bi-arrow-up-short"></i>9.0% vs last month</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <small class="text-muted fw-bold text-uppercase d-block" style="font-size: 0.72rem; letter-spacing: 0.05em;">Outstanding Balance</small>
                        <small class="text-muted" style="font-size: 0.75rem;">Across all brands</small>
                    </div>
                    <span class="badge bg-danger-subtle text-danger p-2 rounded-3 fs-5"><i class="bi bi-wallet2"></i></span>
                </div>
                <div class="fs-3 fw-bold text-dark">&#8377; 12,638,319</div>
                <div class="mt-2">
                    <span class="badge bg-danger-subtle text-danger"><i class="bi bi-arrow-up-short"></i>3.2% vs last month</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Tabs -->
    <ul class="nav nav-pills gap-2 mb-4 bg-white p-2 rounded-4 border shadow-sm" id="bwrTabs">
        <li class="nav-item">
            <button type="button" class="nav-link active bwr-tab rounded-pill px-3 py-2 fw-semibold" data-tab="overview">
                <i class="bi bi-speedometer2 me-1"></i> Overview
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link bwr-tab rounded-pill px-3 py-2 fw-semibold" data-tab="leads">
                <i class="bi bi-person-plus-fill me-1"></i> Lead Generation
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link bwr-tab rounded-pill px-3 py-2 fw-semibold" data-tab="qualification">
                <i class="bi bi-funnel-fill me-1"></i> Qualification &amp; Brands
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link bwr-tab rounded-pill px-3 py-2 fw-semibold" data-tab="geo">
                <i class="bi bi-globe-americas me-1"></i> Geography &amp; Products
            </button>
        </li>
    </ul>

    <!-- ============ PANEL: OVERVIEW ============ -->
    <div class="bwr-panel active" id="bwrPanel-overview" style="display: block;">
        <!-- Section Header: Performance Summary -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2">
                <div class="badge bg-primary-subtle text-primary p-2 rounded-3 fs-6"><i class="bi bi-trophy-fill"></i></div>
                <div>
                    <h5 class="fw-bold mb-0 text-dark">Performance Summary</h5>
                    <small class="text-muted">Revenue trend, target progress and customer mix at a glance</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill"><i class="bi bi-cash-stack me-1 text-success"></i>&#8377; 812,000 revenue YTD</span>
        </div>

        <!-- 3 Performance Summary Chart Cards -->
        <div class="row g-3 mb-4">
            <!-- Monthly Revenue Trend -->
            <div class="col-xl-6 col-lg-12">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="d-inline-block rounded-circle bg-success" style="width: 10px; height: 10px;"></span>
                                <span class="fw-bold text-dark fs-6">Monthly Revenue Trend</span>
                            </div>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">FY 2026</span>
                        </div>
                        <div style="position: relative; height: 260px; width: 100%;">
                            <canvas id="bwrRevChart"></canvas>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-3 mt-3 border-top text-muted small">
                        <span><i class="bi bi-graph-up-arrow text-success me-1"></i> Peak in March (&#8377; 280,000)</span>
                        <span class="fw-semibold text-dark">12 Months Trend</span>
                    </div>
                </div>
            </div>

            <!-- Target vs Achieved Gauge -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="d-inline-block rounded-circle bg-primary" style="width: 10px; height: 10px;"></span>
                                <span class="fw-bold text-dark fs-6">Target vs Achieved</span>
                            </div>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-1">Monthly</span>
                        </div>
                        
                        <div class="d-flex flex-column align-items-center justify-content-center py-2" style="min-height: 200px;">
                            <div class="position-relative" style="width: 210px; height: 125px;">
                                <canvas id="bwrTargetChart"></canvas>
                                <div class="position-absolute start-50 translate-middle-x text-center" style="bottom: 0;">
                                    <div class="fs-2 fw-bold text-success lh-1">68%</div>
                                    <span class="badge bg-success-subtle text-success small mt-1" style="font-size: 11px;">Target Met</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 d-flex justify-content-around text-center pt-3 mt-3 border-top">
                        <div>
                            <small class="text-muted d-block" style="font-size: 11px;">Achieved</small>
                            <span class="fw-bold text-success fs-6">&#8377; 40,800</span>
                        </div>
                        <div class="border-end"></div>
                        <div>
                            <small class="text-muted d-block" style="font-size: 11px;">Target Goal</small>
                            <span class="fw-bold text-muted fs-6">&#8377; 60,000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Insights -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="d-inline-block rounded-circle bg-warning" style="width: 10px; height: 10px;"></span>
                                <span class="fw-bold text-dark fs-6">Customer Insights</span>
                            </div>
                            <span class="badge bg-light text-secondary border rounded-pill px-2 py-1">Total 150</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center py-2" style="min-height: 200px;">
                            <div style="position: relative; height: 180px; width: 100%;">
                                <canvas id="bwrCustChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 d-flex justify-content-around text-center pt-3 mt-3 border-top">
                        <div>
                            <small class="text-muted d-block" style="font-size: 11px;">
                                <span class="d-inline-block rounded-circle me-1" style="width:8px;height:8px;background:#f59e0b;"></span>New
                            </small>
                            <span class="fw-bold text-dark fs-6">72% <small class="text-muted fw-normal">(108)</small></span>
                        </div>
                        <div class="border-end"></div>
                        <div>
                            <small class="text-muted d-block" style="font-size: 11px;">
                                <span class="d-inline-block rounded-circle me-1" style="width:8px;height:8px;background:#8b5cf6;"></span>Repeat
                            </small>
                            <span class="fw-bold text-dark fs-6">28% <small class="text-muted fw-normal">(42)</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ PANEL: LEAD GENERATION ============ -->
    <div class="bwr-panel" id="bwrPanel-leads" style="display: none;">
        <!-- Section Header -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2">
                <div class="badge bg-primary-subtle text-primary p-2 rounded-3 fs-6"><i class="bi bi-person-plus-fill"></i></div>
                <div>
                    <h5 class="fw-bold mb-0 text-dark">Lead Generation &amp; Distribution</h5>
                    <small class="text-muted">Daily inflow, source-wise split and conversion behaviour</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill"><i class="bi bi-lightning-charge-fill me-1 text-warning"></i>318 leads this period</span>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="d-inline-block rounded-circle bg-primary" style="width: 10px; height: 10px;"></span>
                            <span class="fw-bold text-dark fs-6">Leads by Date</span>
                        </div>
                        <span class="badge bg-light text-secondary border rounded-pill px-3 py-1">Last 30 days</span>
                    </div>
                    <div style="position: relative; height: 260px; width: 100%;">
                        <canvas id="bwrLeadsDateChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="d-inline-block rounded-circle bg-info" style="width: 10px; height: 10px;"></span>
                            <span class="fw-bold text-dark fs-6">Leads by Source</span>
                        </div>
                        <span class="badge bg-light text-secondary border rounded-pill px-3 py-1">12 sources</span>
                    </div>
                    <div style="position: relative; height: 260px; width: 100%;">
                        <canvas id="bwrLeadsSourceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="d-inline-block rounded-circle bg-success" style="width: 10px; height: 10px;"></span>
                    <span class="fw-bold text-dark fs-6">Conversion Overview</span>
                </div>
                <div class="btn-group btn-group-sm rounded-pill p-1 bg-light border" id="bwrHourSeg">
                    <button type="button" class="btn btn-sm btn-outline-primary active rounded-pill px-3" data-tab="day">Day</button>
                    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-tab="week">Week</button>
                    <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-tab="month">Month</button>
                </div>
            </div>
            <div style="position: relative; height: 220px; width: 100%;">
                <canvas id="bwrHourChart"></canvas>
            </div>
        </div>
    </div>

    <!-- ============ PANEL: QUALIFICATION & BRANDS ============ -->
    <div class="bwr-panel" id="bwrPanel-qualification" style="display: none;">
        <!-- Section Header -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2">
                <div class="badge bg-primary-subtle text-primary p-2 rounded-3 fs-6"><i class="bi bi-funnel-fill"></i></div>
                <div>
                    <h5 class="fw-bold mb-0 text-dark">Qualification &amp; Brand Performance</h5>
                    <small class="text-muted">SQL / MQL / UQL mix and conversion rate across brands</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill"><i class="bi bi-bullseye me-1 text-primary"></i>100 qualified leads</span>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="d-inline-block rounded-circle bg-primary" style="width: 10px; height: 10px;"></span>
                            <span class="fw-bold text-dark fs-6">Lead Qualification</span>
                        </div>
                    </div>
                    <div style="position: relative; height: 260px; width: 100%;">
                        <canvas id="bwrQualChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="d-inline-block rounded-circle bg-success" style="width: 10px; height: 10px;"></span>
                            <span class="fw-bold text-dark fs-6">Conversion Rate by Brand</span>
                        </div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">Avg 13.2%</span>
                    </div>
                    <div style="position: relative; height: 260px; width: 100%;">
                        <canvas id="bwrBrandConvChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ PANEL: GEOGRAPHY & PRODUCTS ============ -->
    <div class="bwr-panel" id="bwrPanel-geo" style="display: none;">
        <!-- Section Header -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2">
                <div class="badge bg-primary-subtle text-primary p-2 rounded-3 fs-6"><i class="bi bi-globe-americas"></i></div>
                <div>
                    <h5 class="fw-bold mb-0 text-dark">Country Specific Sales</h5>
                    <small class="text-muted">Revenue contribution by country</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill"><i class="bi bi-globe2 me-1 text-info"></i>5 countries &middot; 100% share</span>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="d-flex flex-column gap-3">
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border bg-light-subtle">
                    <span class="badge bg-primary text-white rounded-circle fs-6 fw-bold" style="width:30px; height:30px; display:inline-flex; align-items:center; justify-content:center;">1</span>
                    <span class="fs-4">&#127470;&#127475;</span>
                    <span class="fw-bold text-dark fs-6" style="min-width: 140px;">India</span>
                    <div class="progress flex-grow-1" style="height: 10px;">
                        <div class="progress-bar bg-success" style="width: 82%;"></div>
                    </div>
                    <span class="fw-bold text-dark text-nowrap fs-6" style="min-width: 130px; text-align: right;">&#8377; 3,332,310.44</span>
                    <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2 small fw-bold">82%</span>
                </div>
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border">
                    <span class="badge bg-light text-dark border rounded-circle fs-6 fw-bold" style="width:30px; height:30px; display:inline-flex; align-items:center; justify-content:center;">2</span>
                    <span class="fs-4">&#127482;&#127480;</span>
                    <span class="fw-bold text-dark fs-6" style="min-width: 140px;">United States</span>
                    <div class="progress flex-grow-1" style="height: 10px;">
                        <div class="progress-bar bg-primary" style="width: 11%;"></div>
                    </div>
                    <span class="fw-bold text-dark text-nowrap fs-6" style="min-width: 130px; text-align: right;">&#8377; 412,000.00</span>
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 small fw-bold">9%</span>
                </div>
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border">
                    <span class="badge bg-light text-dark border rounded-circle fs-6 fw-bold" style="width:30px; height:30px; display:inline-flex; align-items:center; justify-content:center;">3</span>
                    <span class="fs-4">&#127468;&#127463;</span>
                    <span class="fw-bold text-dark fs-6" style="min-width: 140px;">United Kingdom</span>
                    <div class="progress flex-grow-1" style="height: 10px;">
                        <div class="progress-bar bg-info" style="width: 5%;"></div>
                    </div>
                    <span class="fw-bold text-dark text-nowrap fs-6" style="min-width: 130px; text-align: right;">&#8377; 185,500.00</span>
                    <span class="badge bg-info-subtle text-info rounded-pill px-3 py-2 small fw-bold">4%</span>
                </div>
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border">
                    <span class="badge bg-light text-dark border rounded-circle fs-6 fw-bold" style="width:30px; height:30px; display:inline-flex; align-items:center; justify-content:center;">4</span>
                    <span class="fs-4">&#127462;&#127482;</span>
                    <span class="fw-bold text-dark fs-6" style="min-width: 140px;">Australia</span>
                    <div class="progress flex-grow-1" style="height: 10px;">
                        <div class="progress-bar bg-warning" style="width: 4%;"></div>
                    </div>
                    <span class="fw-bold text-dark text-nowrap fs-6" style="min-width: 130px; text-align: right;">&#8377; 121,400.00</span>
                    <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2 small fw-bold">3%</span>
                </div>
                <div class="d-flex align-items-center gap-3 p-3 rounded-3 border">
                    <span class="badge bg-light text-dark border rounded-circle fs-6 fw-bold" style="width:30px; height:30px; display:inline-flex; align-items:center; justify-content:center;">5</span>
                    <span class="fs-4">&#127465;&#127466;</span>
                    <span class="fw-bold text-dark fs-6" style="min-width: 140px;">Germany</span>
                    <div class="progress flex-grow-1" style="height: 10px;">
                        <div class="progress-bar bg-secondary" style="width: 2%;"></div>
                    </div>
                    <span class="fw-bold text-dark text-nowrap fs-6" style="min-width: 130px; text-align: right;">&#8377; 86,000.00</span>
                    <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2 small fw-bold">2%</span>
                </div>
            </div>
        </div>

        <!-- Product / Service Performance -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2">
                <div class="badge bg-primary-subtle text-primary p-2 rounded-3 fs-6"><i class="bi bi-box-seam-fill"></i></div>
                <div>
                    <h5 class="fw-bold mb-0 text-dark">Product / Service Performance</h5>
                    <small class="text-muted">Units sold per product, highest first</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill"><i class="bi bi-boxes me-1 text-primary"></i>22 products tracked</span>
        </div>
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="d-inline-block rounded-circle bg-primary" style="width: 10px; height: 10px;"></span>
                    <span class="fw-bold text-dark fs-6">Revenue by Product</span>
                </div>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1">Top: Full XL (92)</span>
            </div>
            <div style="position: relative; height: 420px; width: 100%;">
                <canvas id="bwrProductChart"></canvas>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

<script src="./assets/js/pages/brandwise-report.js?v=<?php echo time(); ?>"></script>