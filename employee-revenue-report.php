<?php include 'header.php'; ?>


<main class="container-fluid px-0">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Employee Revenue Report</h1>
        </div>
    </div>

    <!-- Summary cards -->
    <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
                <span class="badge bg-info-subtle text-info p-3 rounded-3 fs-5"><i class="bi bi-people"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Employees</small>
                    <div class="fs-4 fw-bold text-dark">8</div>
                    <small class="text-muted">In this report</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
                <span class="badge bg-success-subtle text-success p-3 rounded-3 fs-5"><i class="bi bi-person-check"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Success Leads</small>
                    <div class="fs-4 fw-bold text-dark">23</div>
                    <small class="text-muted">By assign</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
                <span class="badge bg-warning-subtle text-warning p-3 rounded-3 fs-5"><i class="bi bi-search"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Sourcer</small>
                    <div class="fs-4 fw-bold text-dark">83</div>
                    <small class="text-muted">Overall</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
                <span class="badge bg-primary-subtle text-primary p-3 rounded-3 fs-5"><i class="bi bi-geo-alt"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Total Visits</small>
                    <div class="fs-4 fw-bold text-dark">52</div>
                    <small class="text-muted">Overall</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
                <span class="badge bg-danger-subtle text-danger p-3 rounded-3 fs-5"><i class="bi bi-speedometer2"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Total Kilometers</small>
                    <div class="fs-4 fw-bold text-dark">0</div>
                    <small class="text-muted">Travelled</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <form method="get" class="card border-0 shadow-sm rounded-3 p-3 mb-3" id="revFiltersForm" autocomplete="off">
        <div class="row g-3 align-items-end">
            <div class="col-lg-4 col-md-12">
                <label class="form-label" for="revSearch">Name / Mobile / Employee Id</label>
                <input class="form-control" id="revSearch" name="search" placeholder="Enter Name / Mobile / Employee Id" value="">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="revFrom">From Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="revFrom" name="from" value="01-10-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="revTo">To Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="revTo" name="to" value="31-10-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="d-flex gap-2">
                    <a href="employee-revenue-report.php" class="btn btn-outline-secondary flex-fill" id="revClear">Clear</a>
                    <button type="submit" class="btn btn-primary flex-fill"><i class="bi bi-search me-1"></i>Search</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Employee cards -->
    <div class="row g-3" id="revCards">
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="EMP0001">
    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary rounded-circle p-2 fs-5"><i class="bi bi-person-circle"></i></span>
                <div>
                    <h6 class="fw-bold mb-0 text-dark" title="ghrA TESTER">ghrA TESTER</h6>
                    <small class="text-muted">EMP0001</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border small">Overall / Now</span>
        </div>
        <div class="card-body p-3 bg-light-subtle">
        </div>
    </div>
</div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-people"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-violet">
                                <span class="rev-icon"><i class="bi bi-search"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-amber">
                                <span class="rev-icon"><i class="bi bi-currency-rupee"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total BV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-wallet2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total CV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Visits</span>
                                        <span class="rev-value">1 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-red">
                                <span class="rev-icon"><i class="bi bi-speedometer2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Kilometers</span>
                                        <span class="rev-value">0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="EMP0002">
    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary rounded-circle p-2 fs-5"><i class="bi bi-person-circle"></i></span>
                <div>
                    <h6 class="fw-bold mb-0 text-dark" title="GHARUDA SOFTWARE">GHARUDA SOFTWARE</h6>
                    <small class="text-muted">EMP0002</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border small">Overall / Now</span>
        </div>
        <div class="card-body p-3 bg-light-subtle">
        </div>
    </div>
</div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-people"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-violet">
                                <span class="rev-icon"><i class="bi bi-search"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Sourcer</span>
                                        <span class="rev-value">82 / 2</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:2%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-amber">
                                <span class="rev-icon"><i class="bi bi-currency-rupee"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total BV</span>
                                        <span class="rev-value neg">₹ -105,708.24</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill neg" style="width:100%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-wallet2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total CV</span>
                                        <span class="rev-value">₹ 999.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:100%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Visits</span>
                                        <span class="rev-value">51 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-red">
                                <span class="rev-icon"><i class="bi bi-speedometer2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Kilometers</span>
                                        <span class="rev-value">0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="EMP0003">
    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary rounded-circle p-2 fs-5"><i class="bi bi-person-circle"></i></span>
                <div>
                    <h6 class="fw-bold mb-0 text-dark" title="ASHISH">ASHISH</h6>
                    <small class="text-muted">EMP0003</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border small">Overall / Now</span>
        </div>
        <div class="card-body p-3 bg-light-subtle">
        </div>
    </div>
</div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-people"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-violet">
                                <span class="rev-icon"><i class="bi bi-search"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-amber">
                                <span class="rev-icon"><i class="bi bi-currency-rupee"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total BV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-wallet2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total CV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Visits</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-red">
                                <span class="rev-icon"><i class="bi bi-speedometer2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Kilometers</span>
                                        <span class="rev-value">0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="EMP0004">
    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary rounded-circle p-2 fs-5"><i class="bi bi-person-circle"></i></span>
                <div>
                    <h6 class="fw-bold mb-0 text-dark" title="Thilak Ma">Thilak Ma</h6>
                    <small class="text-muted">EMP0004</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border small">Overall / Now</span>
        </div>
        <div class="card-body p-3 bg-light-subtle">
        </div>
    </div>
</div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-people"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-violet">
                                <span class="rev-icon"><i class="bi bi-search"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-amber">
                                <span class="rev-icon"><i class="bi bi-currency-rupee"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total BV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-wallet2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total CV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Visits</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-red">
                                <span class="rev-icon"><i class="bi bi-speedometer2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Kilometers</span>
                                        <span class="rev-value">0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="EMP0005">
    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary rounded-circle p-2 fs-5"><i class="bi bi-person-circle"></i></span>
                <div>
                    <h6 class="fw-bold mb-0 text-dark" title="Jude S">Jude S</h6>
                    <small class="text-muted">EMP0005</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border small">Overall / Now</span>
        </div>
        <div class="card-body p-3 bg-light-subtle">
        </div>
    </div>
</div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-people"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-violet">
                                <span class="rev-icon"><i class="bi bi-search"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-amber">
                                <span class="rev-icon"><i class="bi bi-currency-rupee"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total BV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-wallet2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total CV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Visits</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-red">
                                <span class="rev-icon"><i class="bi bi-speedometer2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Kilometers</span>
                                        <span class="rev-value">0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="EMP0006">
    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary rounded-circle p-2 fs-5"><i class="bi bi-person-circle"></i></span>
                <div>
                    <h6 class="fw-bold mb-0 text-dark" title="PREM KUMAR.R">PREM KUMAR.R</h6>
                    <small class="text-muted">EMP0006</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border small">Overall / Now</span>
        </div>
        <div class="card-body p-3 bg-light-subtle">
        </div>
    </div>
</div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-people"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-violet">
                                <span class="rev-icon"><i class="bi bi-search"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Sourcer</span>
                                        <span class="rev-value">1 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-amber">
                                <span class="rev-icon"><i class="bi bi-currency-rupee"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total BV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-wallet2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total CV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Visits</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-red">
                                <span class="rev-icon"><i class="bi bi-speedometer2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Kilometers</span>
                                        <span class="rev-value">0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="EMP0007">
    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary rounded-circle p-2 fs-5"><i class="bi bi-person-circle"></i></span>
                <div>
                    <h6 class="fw-bold mb-0 text-dark" title="Akash Kumar">Akash Kumar</h6>
                    <small class="text-muted">EMP0007</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border small">Overall / Now</span>
        </div>
        <div class="card-body p-3 bg-light-subtle">
        </div>
    </div>
</div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-people"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-violet">
                                <span class="rev-icon"><i class="bi bi-search"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-amber">
                                <span class="rev-icon"><i class="bi bi-currency-rupee"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total BV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-wallet2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total CV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Visits</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-red">
                                <span class="rev-icon"><i class="bi bi-speedometer2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Kilometers</span>
                                        <span class="rev-value">0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="EMP0008">
    <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary rounded-circle p-2 fs-5"><i class="bi bi-person-circle"></i></span>
                <div>
                    <h6 class="fw-bold mb-0 text-dark" title="ARUN KUMAR">ARUN KUMAR</h6>
                    <small class="text-muted">EMP0008</small>
                </div>
            </div>
            <span class="badge bg-light text-secondary border small">Overall / Now</span>
        </div>
        <div class="card-body p-3 bg-light-subtle">
        </div>
    </div>
</div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-people"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-violet">
                                <span class="rev-icon"><i class="bi bi-search"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Sourcer</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-amber">
                                <span class="rev-icon"><i class="bi bi-currency-rupee"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total BV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-wallet2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total CV</span>
                                        <span class="rev-value">₹ 0.00</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-blue">
                                <span class="rev-icon"><i class="bi bi-geo-alt"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Visits</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rev-metric rev-theme-red">
                                <span class="rev-icon"><i class="bi bi-speedometer2"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Total Kilometers</span>
                                        <span class="rev-value">0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </div>
</main>

<?php include 'footer.php'; ?>

