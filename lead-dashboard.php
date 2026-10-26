<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- ===== Page header ===== -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark mb-0">Sales Analytics</h1>
        </div>
        <form method="get" class="d-inline-flex align-items-center gap-2 p-2 bg-white border rounded-3 shadow-sm">
            <i class="bi bi-calendar3 text-primary ms-1"></i>
            <select class="form-select form-select-sm select2 border-0" name="month" aria-label="Month" style="width: auto;">
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
            <select class="form-select form-select-sm select2 border-0" name="year" aria-label="Year" style="width: auto;">
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026" selected>2026</option>
                <option value="2027">2027</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm px-3">Apply</button>
        </form>
    </div>

    <!-- ===== Overview: spotlight + KPI grid ===== -->
    <div class="row g-3 mb-4">
        <div class="col-xl-4 col-lg-5">
            <div class="card border-0 shadow-sm rounded-3 h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="d-inline-flex align-items-center gap-2 fw-semibold text-dark">
                        <span class="badge bg-warning-subtle text-warning p-2 rounded-circle"><i class="bi bi-trophy-fill"></i></span>
                        Revenue by sales rep
                    </span>
                    <span class="badge bg-light text-secondary border">October 2026</span>
                </div>
                <div class="d-flex align-items-center gap-3 p-3 bg-light rounded-3 mb-3">
                    <div class="position-relative">
                        <span class="badge rounded-circle bg-primary text-white fs-4 d-inline-flex align-items-center justify-content-center" style="width:52px;height:52px;">G</span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark"><i class="bi bi-trophy-fill"></i></span>
                    </div>
                    <div>
                        <div class="fw-bold text-dark">GHARUDA SOFTWARE</div>
                        <div class="h4 fw-bold text-primary mb-1">₹ 999.00</div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="bi bi-patch-check-fill me-1"></i>Top performer</span>
                    </div>
                </div>
                <ul class="list-unstyled mb-3 flex-grow-1">
                    <li class="d-flex align-items-center gap-2 py-2 border-bottom">
                        <span class="badge bg-primary text-white rounded-circle" style="width:24px;height:24px;display:inline-flex;align-items:center;justify-content:center;">1</span>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between small fw-medium mb-1">
                                <span class="text-dark">GHARUDA SOFTWARE</span>
                                <span class="fw-bold text-dark">₹ 999.00</span>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width:100%"></div>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2 border-bottom">
                        <span class="badge bg-light text-secondary border rounded-circle" style="width:24px;height:24px;display:inline-flex;align-items:center;justify-content:center;">2</span>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between small fw-medium mb-1">
                                <span class="text-secondary">ASHISH</span>
                                <span class="text-muted">₹ 0.00</span>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width:0%"></div>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                        <span class="badge bg-light text-secondary border rounded-circle" style="width:24px;height:24px;display:inline-flex;align-items:center;justify-content:center;">3</span>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between small fw-medium mb-1">
                                <span class="text-secondary">Thilak Ma</span>
                                <span class="text-muted">₹ 0.00</span>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width:0%"></div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="d-flex justify-content-between align-items-center pt-3 border-top small">
                    <span class="text-muted"><i class="bi bi-people-fill me-1"></i>Team revenue · 3 reps</span>
                    <strong class="text-dark">₹ 999.00</strong>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="row g-3 h-100">
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 position-relative overflow-hidden">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success-subtle text-success p-2 rounded-2 fs-6"><i class="bi bi-people"></i></span>
                                <span class="text-muted small fw-semibold">Total customers</span>
                            </div>
                            <span class="badge bg-success-subtle text-success"><i class="bi bi-arrow-up-right me-1"></i>+13</span>
                        </div>
                        <div class="h3 fw-bold text-dark mb-0">43</div>
                        <div class="text-muted small mb-2">All time</div>
                        <svg class="w-100" style="height:34px;" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon points="0,34 0,31 14.29,27 28.57,21 42.86,19 57.14,15 71.43,11 85.71,9 100,5 100,34" fill="#16a34a" opacity=".12" />
                            <polyline points="0,31 14.29,27 28.57,21 42.86,19 57.14,15 71.43,11 85.71,9 100,5" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 position-relative overflow-hidden">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-person-plus"></i></span>
                                <span class="text-muted small fw-semibold">New customers</span>
                            </div>
                            <span class="badge bg-primary-subtle text-primary"><i class="bi bi-arrow-up-right me-1"></i>+4</span>
                        </div>
                        <div class="h3 fw-bold text-dark mb-0">4</div>
                        <div class="text-muted small mb-2">October 2026</div>
                        <svg class="w-100" style="height:34px;" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon points="0,34 0,31 14.29,24.5 28.57,24.5 42.86,18 57.14,18 71.43,11.5 85.71,11.5 100,5 100,34" fill="#3b82f6" opacity=".12" />
                            <polyline points="0,31 14.29,24.5 28.57,24.5 42.86,18 57.14,18 71.43,11.5 85.71,11.5 100,5" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 position-relative overflow-hidden">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-warning-subtle text-warning p-2 rounded-2 fs-6"><i class="bi bi-bullseye"></i></span>
                                <span class="text-muted small fw-semibold">Total leads</span>
                            </div>
                            <span class="badge bg-warning-subtle text-warning"><i class="bi bi-arrow-up-right me-1"></i>+2</span>
                        </div>
                        <div class="h3 fw-bold text-dark mb-0">2</div>
                        <div class="text-muted small mb-2">₹ 5.60</div>
                        <svg class="w-100" style="height:34px;" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon points="0,34 0,31 14.29,31 28.57,18 42.86,31 57.14,31 71.43,18 85.71,31 100,5 100,34" fill="#f59e0b" opacity=".12" />
                            <polyline points="0,31 14.29,31 28.57,18 42.86,31 57.14,31 71.43,18 85.71,31 100,5" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 position-relative overflow-hidden">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-danger-subtle text-danger p-2 rounded-2 fs-6"><i class="bi bi-x-circle"></i></span>
                                <span class="text-muted small fw-semibold">Leads lost</span>
                            </div>
                            <span class="badge bg-secondary-subtle text-secondary"><i class="bi bi-dash me-1"></i>±0</span>
                        </div>
                        <div class="h3 fw-bold text-dark mb-0">0</div>
                        <div class="text-muted small mb-2">₹ 0.00</div>
                        <svg class="w-100" style="height:34px;" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon points="0,34 0,17 14.29,17 28.57,17 42.86,17 57.14,17 71.43,17 85.71,17 100,17 100,34" fill="#ef4444" opacity=".12" />
                            <polyline points="0,17 14.29,17 28.57,17 42.86,17 57.14,17 71.43,17 85.71,17 100,17" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 position-relative overflow-hidden">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-info-subtle text-info p-2 rounded-2 fs-6"><i class="bi bi-file-earmark-text"></i></span>
                                <span class="text-muted small fw-semibold">Total quotes</span>
                            </div>
                            <span class="badge bg-secondary-subtle text-secondary"><i class="bi bi-dash me-1"></i>±0</span>
                        </div>
                        <div class="h3 fw-bold text-dark mb-0">9</div>
                        <div class="text-muted small mb-2">₹ 5,35,498.18</div>
                        <svg class="w-100" style="height:34px;" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon points="0,34 0,22.33 14.29,31 28.57,13.67 42.86,22.33 57.14,31 71.43,5 85.71,22.33 100,22.33 100,34" fill="#8b5cf6" opacity=".12" />
                            <polyline points="0,22.33 14.29,31 28.57,13.67 42.86,22.33 57.14,31 71.43,5 85.71,22.33 100,22.33" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100 position-relative overflow-hidden">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success-subtle text-success p-2 rounded-2 fs-6"><i class="bi bi-arrow-repeat"></i></span>
                                <span class="text-muted small fw-semibold">Quotes converted</span>
                            </div>
                            <span class="badge bg-success-subtle text-success"><i class="bi bi-arrow-up-right me-1"></i>+1</span>
                        </div>
                        <div class="h3 fw-bold text-dark mb-0">1</div>
                        <div class="text-muted small mb-2">₹ 119.18</div>
                        <svg class="w-100" style="height:34px;" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon points="0,34 0,31 14.29,31 28.57,31 42.86,5 57.14,31 71.43,31 85.71,31 100,5 100,34" fill="#16a34a" opacity=".12" />
                            <polyline points="0,31 14.29,31 28.57,31 42.86,5 57.14,31 71.43,31 85.71,31 100,5" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== Section tabs ===== -->
    <ul class="nav nav-pills gap-2 mb-4 bg-white p-2 border rounded-3 shadow-sm" id="ldTabs">
        <li class="nav-item">
            <button type="button" class="nav-link active py-2 px-3 ld-tab" data-tab="targets">
                <i class="bi bi-bullseye me-1"></i>Targets &amp; Team
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link py-2 px-3 ld-tab" data-tab="activity">
                <i class="bi bi-telephone me-1"></i>Calls &amp; Pipeline
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link py-2 px-3 ld-tab" data-tab="sales">
                <i class="bi bi-graph-up-arrow me-1"></i>Sales &amp; Funnel
            </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link py-2 px-3 ld-tab" data-tab="sources">
                <i class="bi bi-bar-chart me-1"></i>Sources &amp; Averages
            </button>
        </li>
    </ul>

    <!-- ===== PANEL: Targets & Team ===== -->
    <div class="ld-panel active" id="ldPanel-targets">
        <!-- ===== Targets ===== -->
        <div class="row g-3 mb-3">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success-subtle text-success p-2 rounded-2 fs-6"><i class="bi bi-flag"></i></span>
                            <h6 class="fw-bold mb-0 text-dark">Goals</h6>
                        </div>
                        <span class="badge bg-light text-secondary border">October 2026</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around flex-wrap gap-3 py-3">
                            <div class="position-relative text-center" style="width:120px;height:120px;">
                                <svg class="w-100 h-100" viewBox="0 0 100 100" aria-hidden="true">
                                    <circle cx="50" cy="50" r="42" fill="none" stroke="#eef0f3" stroke-width="9" />
                                    <circle cx="50" cy="50" r="42" fill="none" stroke="#16a34a" stroke-width="9"
                                        stroke-linecap="round" stroke-dasharray="263.89" stroke-dashoffset="263.89"
                                        transform="rotate(-90 50 50)" />
                                </svg>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <strong class="h4 fw-bold text-dark d-block mb-0">0%</strong>
                                    <span class="text-muted small">achieved</span>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <span class="text-muted small"><span class="badge rounded-circle bg-primary me-1" style="width:8px;height:8px;padding:0;"> </span>Total</span>
                                    <strong class="text-dark">₹ 0.00</strong>
                                </div>
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <span class="text-muted small"><span class="badge rounded-circle bg-success me-1" style="width:8px;height:8px;padding:0;"> </span>Achieved</span>
                                    <strong class="text-danger">₹ -1,05,708.24</strong>
                                </div>
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <span class="text-muted small"><span class="badge rounded-circle bg-danger me-1" style="width:8px;height:8px;padding:0;"> </span>Pending</span>
                                    <strong class="text-dark">₹ 0.00</strong>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-info py-2 px-3 small mb-0 rounded-2">
                            <i class="bi bi-info-circle me-1"></i>No target is set for October 2026.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success-subtle text-success p-2 rounded-2 fs-6"><i class="bi bi-cash-stack"></i></span>
                            <h6 class="fw-bold mb-0 text-dark">Revenue target</h6>
                        </div>
                        <span class="badge bg-light text-secondary border">October 2026</span>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around flex-wrap gap-3 py-3">
                            <div class="position-relative text-center" style="width:120px;height:120px;">
                                <svg class="w-100 h-100" viewBox="0 0 100 100" aria-hidden="true">
                                    <circle cx="50" cy="50" r="42" fill="none" stroke="#eef0f3" stroke-width="9" />
                                    <circle cx="50" cy="50" r="42" fill="none" stroke="#16a34a" stroke-width="9"
                                        stroke-linecap="round" stroke-dasharray="263.89" stroke-dashoffset="263.89"
                                        transform="rotate(-90 50 50)" />
                                </svg>
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <strong class="h4 fw-bold text-dark d-block mb-0">0%</strong>
                                    <span class="text-muted small">achieved</span>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <span class="text-muted small"><span class="badge rounded-circle bg-primary me-1" style="width:8px;height:8px;padding:0;"> </span>Total</span>
                                    <strong class="text-dark">₹ 0.00</strong>
                                </div>
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <span class="text-muted small"><span class="badge rounded-circle bg-success me-1" style="width:8px;height:8px;padding:0;"> </span>Achieved</span>
                                    <strong class="text-success">₹ 999.00</strong>
                                </div>
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <span class="text-muted small"><span class="badge rounded-circle bg-danger me-1" style="width:8px;height:8px;padding:0;"> </span>Pending</span>
                                    <strong class="text-dark">₹ 0.00</strong>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-info py-2 px-3 small mb-0 rounded-2">
                            <i class="bi bi-info-circle me-1"></i>No target is set for October 2026.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Staff-wise business summary ===== -->
        <div class="card border-0 shadow-sm rounded-3 mb-3 overflow-hidden">
            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-person-lines-fill"></i></span>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">Staff-wise business summary</h6>
                        <div class="small text-muted">Won deals · business wise</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-light text-secondary border"><i class="bi bi-people-fill me-1"></i>6 staff</span>
                    <div class="input-group input-group-sm" style="max-width:200px;">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control border-start-0" id="ldSumSearch" placeholder="Search staff..." autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0 text-center" id="ldSumTable">
                    <thead>
                        <tr>
                            <th rowspan="2" class="stick-1" style="background:#f4f6f8;">S.No</th>
                            <th rowspan="2" class="stick-2 left" style="background:#f4f6f8;">Staff name</th>
                            <th colspan="3" class="band band-b1">Current month<small>October 2026</small></th>
                            <th colspan="3" class="band band-b2">Quarterly<small>October 2026 to December 2026</small>
                            </th>
                            <th colspan="3" class="band band-b3">Halfly<small>October 2026 to March 2027</small></th>
                        </tr>
                        <tr>
                            <th class="sub-b1">Target</th>
                            <th class="sub-b1">Achieved</th>
                            <th class="sub-b1">%</th>
                            <th class="sub-b2">Target</th>
                            <th class="sub-b2">Achieved</th>
                            <th class="sub-b2">%</th>
                            <th class="sub-b3">Target</th>
                            <th class="sub-b3">Achieved</th>
                            <th class="sub-b3">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-staff="gharuda software">
                            <td class="stick-1">1</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-green">G</span>GHARUDA
                                    SOFTWARE</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="neg">₹ -1,05,708.24</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 49,11,854.69</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 49,11,854.69</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="ashish">
                            <td class="stick-1">2</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-blue">A</span>ASHISH</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="thilak ma">
                            <td class="stick-1">3</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-violet">T</span>Thilak Ma</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="kishore r">
                            <td class="stick-1">4</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-amber">K</span>KISHORE R</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="rokith r">
                            <td class="stick-1">5</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-red">R</span>Rokith R</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="prabhu s">
                            <td class="stick-1">6</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-green">P</span>Prabhu S</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="stick-1"></td>
                            <td class="stick-2 left"><i class="bi bi-people-fill me-1"></i>Team total</td>
                            <td>—</td>
                            <td class="neg">₹ -1,05,708.24</td>
                            <td>0%</td>
                            <td>—</td>
                            <td class="">₹ 49,11,854.69</td>
                            <td>0%</td>
                            <td>—</td>
                            <td class="">₹ 49,11,854.69</td>
                            <td>0%</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="ld-sum-empty" id="ldSumEmpty"><i class="bi bi-search me-1"></i>No staff found matching your
                    search</div>
            </div>
        </div>

    </div><!-- /ldPanel-targets -->

    <!-- ===== PANEL: Calls & Pipeline ===== -->
    <div class="ld-panel d-none" id="ldPanel-activity">
        <!-- ===== Calls & meetings + Pipeline ===== -->
        <div class="row g-3 mb-3">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success-subtle text-success p-2 rounded-2 fs-6"><i class="bi bi-telephone"></i></span>
                            <h6 class="fw-bold mb-0 text-dark">Calls &amp; meeting summary</h6>
                        </div>
                        <span class="badge bg-light text-secondary border">October 2026</span>
                    </div>
                    <div class="card-body p-3">
                        <div style="height: 320px; position: relative;"><canvas id="ldCallsChart"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-pie-chart"></i></span>
                            <h6 class="fw-bold mb-0 text-dark">Pipeline breakdown</h6>
                        </div>
                        <span class="badge bg-light text-secondary border">October 2026</span>
                    </div>
                    <div class="card-body p-3">
                        <div style="height: 220px; position: relative;"><canvas id="ldPipelineChart"></canvas></div>
                        <div class="mt-3" id="ldPipelineLegend"></div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /ldPanel-activity -->

    <!-- ===== PANEL: Sales & Funnel ===== -->
    <div class="ld-panel d-none" id="ldPanel-sales">
        <!-- ===== Sales - proposals / quotations ===== -->
        <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-graph-up-arrow"></i></span>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">Sales – proposals / quotations</h6>
                        <small class="text-muted">October 2026</small>
                    </div>
                </div>
                <div class="btn-group btn-group-sm" id="ldPropSeg" role="group" aria-label="Proposal period">
                    <button type="button" class="btn btn-outline-primary active" data-period="monthly">Monthly</button>
                    <button type="button" class="btn btn-outline-primary" data-period="weekly">Weekly</button>
                    <button type="button" class="btn btn-outline-primary" data-period="yearly">Yearly</button>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row g-2 mb-3" id="ldPropMetrics"></div>
                <div style="height: 320px; position: relative;"><canvas id="ldProposalChart"></canvas></div>
            </div>
        </div>

        <!-- ===== Sales funnel overview ===== -->
        <div class="card border-0 shadow-sm rounded-3 mb-3">
            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-warning-subtle text-warning p-2 rounded-2 fs-6"><i class="bi bi-funnel"></i></span>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">Sales funnel overview</h6>
                        <small class="text-muted">October 2026</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <select class="form-select form-select-sm select2" id="ldFunnelStaff" style="width: auto;" aria-label="Staff">
                        <option value="">All staff</option>
                        <option>Thilak</option>
                        <option>ASHISH</option>
                        <option>Rokith</option>
                        <option>Prabhu</option>
                        <option>KISHORE</option>
                        <option>GHARUDA</option>
                    </select>
                    <div class="btn-group btn-group-sm" id="ldFunnelSeg" role="group" aria-label="Funnel period">
                        <button type="button" class="btn btn-outline-primary" data-period="today">Today</button>
                        <button type="button" class="btn btn-outline-primary" data-period="weekly">Weekly</button>
                        <button type="button" class="btn btn-outline-primary active" data-period="monthly">Monthly</button>
                        <button type="button" class="btn btn-outline-primary" data-period="yearly">Yearly</button>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row g-2 mb-3" id="ldFunnelSteps"></div>
                <div style="height: 320px; position: relative;"><canvas id="ldFunnelChart"></canvas></div>
            </div>
        </div>

    </div><!-- /ldPanel-sales -->

    <!-- ===== PANEL: Sources & Averages ===== -->
    <div class="ld-panel d-none" id="ldPanel-sources">
        <!-- ===== Source-wise summary ===== -->
        <div class="row g-3 mb-3">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success-subtle text-success p-2 rounded-2 fs-6"><i class="bi bi-diagram-3"></i></span>
                            <h6 class="fw-bold mb-0 text-dark">Source-wise summary</h6>
                        </div>
                        <span class="badge bg-light text-secondary border">October 2026</span>
                    </div>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hover align-middle mb-0 text-center small">
                            <thead class="table-light sticky-top">
                                <tr>
                                    <th style="width:60px;">S.No</th>
                                    <th class="text-start">Source</th>
                                    <th style="min-width:170px;">Total lead</th>
                                    <th>Total quote</th>
                                    <th>Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-circle p-2">1</span></td>
                                    <td class="text-start fw-bold">IndiaMART</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">97</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:100%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>4</td>
                                    <td>17</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-circle p-2">2</span></td>
                                    <td class="text-start fw-bold">test</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">5</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:5%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>4</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-circle p-2">3</span></td>
                                    <td class="text-start fw-bold">Exihibition</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">3</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:3%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>3</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-light text-secondary border rounded-circle p-2">4</span></td>
                                    <td class="text-start fw-bold">Mail</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">2</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:2%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>5</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-light text-secondary border rounded-circle p-2">5</span></td>
                                    <td class="text-start fw-bold">Gokul(Reference)</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">1</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:1%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-light text-secondary border rounded-circle p-2">6</span></td>
                                    <td class="text-start fw-bold">Telegram</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">1</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:1%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-light text-secondary border rounded-circle p-2">7</span></td>
                                    <td class="text-start fw-bold">demo</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">0</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:0%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-light text-secondary border rounded-circle p-2">8</span></td>
                                    <td class="text-start fw-bold">Market</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">0</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:0%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-light text-secondary border rounded-circle p-2">9</span></td>
                                    <td class="text-start fw-bold">Facebook Lead Ads</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">0</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:0%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-light text-secondary border rounded-circle p-2">10</span></td>
                                    <td class="text-start fw-bold">Insta</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 justify-content-center">
                                            <span class="fw-bold" style="min-width:24px;">0</span>
                                            <div class="progress flex-grow-1" style="height:6px; min-width:80px;">
                                                <div class="progress-bar bg-primary" style="width:0%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-bar-chart"></i></span>
                            <h6 class="fw-bold mb-0 text-dark">Top lead sources</h6>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div style="height:330px; position: relative;"><canvas id="ldSourceChart"></canvas></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Average sales monthly ===== -->
        <div class="row g-3 mb-3">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success-subtle text-success p-2 rounded-2 fs-6"><i class="bi bi-graph-up"></i></span>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Average sales monthly</h6>
                                <small class="text-muted">October 2026</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="row g-2">
                            <div class="col-6 col-lg-12">
                                <div class="card border-0 bg-light p-2 rounded-3">
                                    <div class="d-flex align-items-center gap-2 text-muted small fw-semibold mb-1">
                                        <span class="badge bg-primary-subtle text-primary p-1 rounded-circle"><i class="bi bi-currency-rupee"></i></span>
                                        Revenue
                                    </div>
                                    <div class="fs-6 fw-bold text-danger">₹ -94,708.24</div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="card border-0 bg-light p-2 rounded-3">
                                    <div class="d-flex align-items-center gap-2 text-muted small fw-semibold mb-1">
                                        <span class="badge bg-success-subtle text-success p-1 rounded-circle"><i class="bi bi-stars"></i></span>
                                        Quality leads
                                    </div>
                                    <div class="fs-6 fw-bold text-dark">2 <small class="text-muted fw-normal">/ 150</small></div>
                                    <div class="progress mt-1" style="height: 4px;">
                                        <div class="progress-bar bg-success" style="width:2%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="card border-0 bg-light p-2 rounded-3">
                                    <div class="d-flex align-items-center gap-2 text-muted small fw-semibold mb-1">
                                        <span class="badge bg-warning-subtle text-warning p-1 rounded-circle"><i class="bi bi-trophy"></i></span>
                                        Win rate
                                    </div>
                                    <div class="fs-6 fw-bold text-dark">22.22%</div>
                                    <div class="small text-muted" style="font-size: 0.75rem;">Lead : 2 / Quote : 9</div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="card border-0 bg-light p-2 rounded-3">
                                    <div class="d-flex align-items-center gap-2 text-muted small fw-semibold mb-1">
                                        <span class="badge bg-danger-subtle text-danger p-1 rounded-circle"><i class="bi bi-hand-thumbs-down"></i></span>
                                        Lost rate
                                    </div>
                                    <div class="fs-6 fw-bold text-dark">0%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-info-subtle text-info p-2 rounded-2 fs-6"><i class="bi bi-bar-chart-line"></i></span>
                            <h6 class="fw-bold mb-0 text-dark" id="ldAvgTitle">Revenue by staff</h6>
                        </div>
                        <div class="btn-group btn-group-sm" id="ldAvgTabs" role="tablist" aria-label="Average sales view">
                            <button type="button" class="btn btn-outline-primary active" data-tab="revenue" role="tab">Revenue</button>
                            <button type="button" class="btn btn-outline-primary" data-tab="leads" role="tab">Leads</button>
                            <button type="button" class="btn btn-outline-primary" data-tab="wl" role="tab">W/L</button>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div style="height: 320px; position: relative;"><canvas id="ldAvgChart"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /ldPanel-sources -->
</main>

<script>
    (function () {
        var LD = { "period": "October 2026", "labels": [["1", "Thu"], ["2", "Fri"], ["3", "Sat"], ["4", "Sun"], ["5", "Mon"], ["6", "Tue"], ["7", "Wed"], ["8", "Thu"], ["9", "Fri"], ["10", "Sat"], ["11", "Sun"], ["12", "Mon"], ["13", "Tue"], ["14", "Wed"], ["15", "Thu"], ["16", "Fri"], ["17", "Sat"], ["18", "Sun"], ["19", "Mon"], ["20", "Tue"], ["21", "Wed"], ["22", "Thu"], ["23", "Fri"], ["24", "Sat"], ["25", "Sun"], ["26", "Mon"], ["27", "Tue"], ["28", "Wed"], ["29", "Thu"], ["30", "Fri"], ["31", "Sat"]], "daily": { "leads": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "quotes": [0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 3, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "pvalue": [0, 0, 0, 0, 0, 0, 0, 0, 85000, 0, 0, 0, 0, 0, 0, 14601, 0, 0, 0, 380000, 18000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "orders": [0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "ovalue": [0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "proforma": [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "pfvalue": [0, 0, 0, 0, 0, 0, 0, 0, 0, 101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "invoice": [0, 0, 0, 0, 0, 0, 0, 0, 0, 5000, 0, 0, 0, 0, 0, 0, 0, 0, -100000, 291.76, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "icount": [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "payments": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5999, 5000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "paycount": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] }, "yearly": { "leads": [2, 2, 1, 2, 2, 1, 3, 2, 1, 2, 2, 2], "quotes": [10, 7, 5, 11, 8, 5, 12, 9, 6, 9, 10, 7], "pvalue": [547361.1, 398080.8, 248800.5, 597121.2, 447840.9, 298560.6, 646881.3, 497601, 348320.7, 497601, 547361.1, 398080.8], "orders": [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1], "ovalue": [55000, 40000, 25000, 60000, 45000, 30000, 65000, 50000, 35000, 50000, 55000, 40000], "proforma": [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1], "pfvalue": [111.1, 80.8, 50.5, 121.2, 90.9, 60.6, 131.3, 101, 70.7, 101, 111.1, 80.8], "invoice": [-104179.06, -75766.59, -47354.12, -113649.89, -85237.42, -56824.94, -123120.71, -94708.24, -66295.77, -94708.24, -104179.06, -75766.59], "icount": [3, 2, 2, 4, 3, 2, 4, 3, 2, 3, 3, 2], "payments": [12098.9, 8799.2, 5499.5, 13198.8, 9899.1, 6599.4, 14298.7, 10999, 7699.3, 10999, 12098.9, 8799.2], "paycount": [2, 2, 1, 2, 2, 1, 3, 2, 1, 2, 2, 2] }, "yearMonths": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], "todayIdx": 16, "staff": ["Thilak", "ASHISH", "Rokith", "Prabhu", "KISHORE", "GHARUDA"], "calls": { "meeting": [0, 0, 0, 0, 0, 0], "call": [1, 0, 0, 0, 0, 0] }, "pipeline": [["Lead", 5.6, 5.6], ["Proposal", 535498.18, 535498.18], ["Estimate", 119.18, 119.18], ["Invoice", 98000.98, -98000.98]], "sources": [["IndiaMART", 97], ["test", 5], ["Exihibition", 3], ["Mail", 2], ["Gokul(Reference)", 1], ["Telegram", 1]], "avgMonths": ["October", "November", "December"], "avgRevenue": [[0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0], [5017562.93, 0, -105708.24]], "avgLeads": [[0, 0, 0], [0, 0, 0], [0, 0, 2], [0, 0, 0], [0, 0, 0], [40, 55, 17]], "avgWon": [12, 6, 2], "avgLost": [3, 2, 0] };

        // ===== Helpers =====
        function fmtInr(n, dec) {
            dec = (dec === undefined) ? 2 : dec;
            var neg = n < 0,
                s = Math.abs(n).toFixed(dec).split('.'),
                int = s[0],
                last3 = int.slice(-3),
                rest = int.slice(0, -3);
            if (rest) rest = rest.replace(/\B(?=(\d{2})+(?!\d))/g, ',') + ',';
            return '₹ ' + (neg ? '-' : '') + rest + last3 + (dec ? '.' + s[1] : '');
        }

        function shortInr(v) {
            var a = Math.abs(v),
                sign = v < 0 ? '-' : '';
            if (a >= 1e7) return sign + (a / 1e7) + 'Cr';
            if (a >= 1e5) return sign + (a / 1e5) + 'L';
            if (a >= 1e3) return sign + (a / 1e3) + 'K';
            return v;
        }

        function sum(arr) {
            return arr.reduce(function (a, b) {
                return a + b;
            }, 0);
        }

        function labelText(l) {
            return Array.isArray(l) ? l.join(' ') : l;
        }

        var C = {
            green: '#16a34a',
            blue: '#3b82f6',
            amber: '#f5b301',
            violet: '#8b5cf6',
            red: '#ef4444',
            grey: '#9ca3af',
            pink: '#ec4899'
        };
        var STAFF_COLORS = ['#3b82f6', '#16a34a', '#84cc16', '#8b5cf6', '#f59e0b', '#0f766e'];
        var GRID = {
            color: '#eef0f3',
            drawBorder: false
        };
        var charts = {};

        function ctxFor(id) {
            if (charts[id]) charts[id].destroy();
            return document.getElementById(id).getContext('2d');
        }

        function gradient(top, bottom) {
            return function (context) {
                var chart = context.chart,
                    area = chart.chartArea;
                if (!area) return top;
                var g = chart.ctx.createLinearGradient(0, area.top, 0, area.bottom);
                g.addColorStop(0, top);
                g.addColorStop(1, bottom);
                return g;
            };
        }

        // ===== Period aggregation (monthly = daily points) =====
        function agg(period, keys) {
            var out = {
                labels: [],
                series: {},
                unit: 'day'
            };
            keys.forEach(function (k) {
                out.series[k] = [];
            });

            if (period === 'yearly') {
                out.labels = LD.yearMonths;
                out.unit = 'month';
                keys.forEach(function (k) {
                    out.series[k] = LD.yearly[k].slice();
                });
            } else if (period === 'weekly') {
                out.unit = 'week';
                var n = LD.labels.length,
                    weeks = Math.ceil(n / 7);
                for (var w = 0; w < weeks; w++) {
                    var from = w * 7,
                        to = Math.min(from + 7, n);
                    out.labels.push(['W' + (w + 1), (from + 1) + '-' + to]);
                    keys.forEach(function (k) {
                        out.series[k].push(sum(LD.daily[k].slice(from, to)));
                    });
                }
            } else if (period === 'today') {
                out.labels = [LD.labels[LD.todayIdx]];
                keys.forEach(function (k) {
                    out.series[k] = [LD.daily[k][LD.todayIdx]];
                });
            } else {
                out.labels = LD.labels;
                keys.forEach(function (k) {
                    out.series[k] = LD.daily[k].slice();
                });
            }
            return out;
        }

        function baseOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'rectRounded',
                            boxWidth: 9,
                            boxHeight: 9,
                            padding: 14,
                            font: {
                                size: 11,
                                weight: '600'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#111827',
                        padding: 10,
                        cornerRadius: 8,
                        titleFont: {
                            size: 12,
                            weight: '700'
                        },
                        bodyFont: {
                            size: 12
                        },
                        boxPadding: 4,
                        callbacks: {
                            title: function (items) {
                                return items.length ? labelText(items[0].chart.data.labels[items[0].dataIndex]) : '';
                            },
                            label: function (c) {
                                var v = (c.parsed.y !== undefined && c.parsed.y !== null) ? c.parsed.y : c.parsed;
                                var money = c.dataset.label && c.dataset.label.indexOf('₹') > -1;
                                return ' ' + c.dataset.label + ': ' + (money ? fmtInr(v) : v);
                            }
                        }
                    }
                }
            };
        }

        function moneyAndCountScales() {
            return {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 10
                        },
                        maxRotation: 0
                    }
                },
                y: {
                    position: 'left',
                    grid: GRID,
                    border: {
                        display: false
                    },
                    ticks: {
                        callback: shortInr,
                        font: {
                            size: 10
                        }
                    }
                },
                y1: {
                    position: 'right',
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    },
                    border: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                }
            };
        }

        function metric(color, label, value) {
            return '<div class="col-6 col-md-3"><div class="card border-0 bg-light p-2 text-center rounded-3"><small class="text-muted fw-semibold">' + label + '</small><div class="fs-6 fw-bold text-dark mt-1">' + value + '</div></div></div>';
        }

        // ===== Proposals / quotations =====
        function buildProposals(period) {
            var a = agg(period, ['quotes', 'pvalue']),
                opt = baseOptions();
            opt.scales = moneyAndCountScales();

            charts.proposals = new Chart(ctxFor('ldProposalChart'), {
                data: {
                    labels: a.labels,
                    datasets: [{
                        type: 'bar',
                        label: 'Proposals count',
                        data: a.series.quotes,
                        backgroundColor: 'rgba(59,130,246,.55)',
                        hoverBackgroundColor: 'rgba(59,130,246,.85)',
                        borderRadius: 6,
                        maxBarThickness: 34,
                        yAxisID: 'y1',
                        order: 2
                    }, {
                        type: 'line',
                        label: 'Proposal value (₹)',
                        data: a.series.pvalue,
                        borderColor: C.green,
                        backgroundColor: gradient('rgba(22,163,74,.28)', 'rgba(22,163,74,0)'),
                        borderWidth: 2.5,
                        pointRadius: 3,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: C.green,
                        pointBorderWidth: 2,
                        tension: .35,
                        fill: true,
                        yAxisID: 'y',
                        order: 1
                    }]
                },
                options: opt
            });

            var counts = a.series.quotes,
                values = a.series.pvalue,
                total = sum(counts),
                totalVal = sum(values),
                active = values.filter(function (v) {
                    return v > 0;
                }).length,
                peakIdx = counts.indexOf(Math.max.apply(null, counts));
            document.getElementById('ldPropMetrics').innerHTML =
                metric(C.blue, 'Total proposals', total) +
                metric(C.green, 'Total value', fmtInr(totalVal)) +
                metric(C.amber, 'Average per ' + a.unit, fmtInr(active ? totalVal / active : 0)) +
                metric(C.violet, 'Peak ' + a.unit, total ? labelText(a.labels[peakIdx]) : '-');
        }

        // ===== Sales funnel =====
        function step(cls, icon, label, value, sub) {
            var bgSubtle = cls === 'blue' ? 'bg-primary-subtle text-primary' : (cls === 'green' ? 'bg-success-subtle text-success' : (cls === 'amber' ? 'bg-warning-subtle text-warning' : (cls === 'pink' ? 'bg-danger-subtle text-danger' : (cls === 'violet' ? 'bg-info-subtle text-info' : 'bg-secondary-subtle text-secondary'))));
            return '<div class="col"><div class="card border-0 bg-light p-2 rounded-3 h-100 text-center"><div class="d-flex align-items-center justify-content-center gap-1 text-muted small fw-semibold mb-1"><span class="badge ' + bgSubtle + ' p-1 rounded-circle"><i class="bi ' + icon + '"></i></span> ' + label + '</div><div class="fw-bold fs-6 text-dark">' + value + '</div><div class="small text-muted" style="font-size:0.75rem;">' + (sub || '&nbsp;') + '</div></div></div>';
        }

        function buildFunnel(period) {
            var keys = ['leads', 'quotes', 'pvalue', 'orders', 'ovalue', 'proforma', 'pfvalue', 'invoice', 'icount', 'payments', 'paycount'];
            var a = agg(period, keys),
                s = a.series;

            document.getElementById('ldFunnelSteps').innerHTML =
                '<div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-2 w-100 m-0">' +
                step('blue', 'bi-bullseye', 'Leads', sum(s.leads), '') +
                step('amber', 'bi-file-earmark-text', 'Quotes', sum(s.quotes), fmtInr(sum(s.pvalue))) +
                step('grey', 'bi-cart-check', 'Sales orders', sum(s.orders), fmtInr(sum(s.ovalue))) +
                step('pink', 'bi-receipt', 'Proforma', sum(s.proforma), fmtInr(sum(s.pfvalue))) +
                step('green', 'bi-cash-stack', 'Invoice value', fmtInr(sum(s.invoice)), sum(s.icount) + ' invoices') +
                step('violet', 'bi-wallet2', 'Payments', fmtInr(sum(s.payments)), sum(s.paycount) + ' payments') +
                '</div>';

            var opt = baseOptions();
            opt.scales = moneyAndCountScales();
            charts.funnel = new Chart(ctxFor('ldFunnelChart'), {
                data: {
                    labels: a.labels,
                    datasets: [{
                        type: 'bar',
                        label: 'Leads',
                        data: s.leads,
                        backgroundColor: 'rgba(59,130,246,.7)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'bar',
                        label: 'Quotes',
                        data: s.quotes,
                        backgroundColor: 'rgba(245,179,1,.75)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'bar',
                        label: 'Sales orders',
                        data: s.orders,
                        backgroundColor: 'rgba(156,163,175,.75)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'bar',
                        label: 'Proforma',
                        data: s.proforma,
                        backgroundColor: 'rgba(236,72,153,.65)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'line',
                        label: 'Invoice value (₹)',
                        data: s.invoice,
                        borderColor: C.green,
                        backgroundColor: C.green,
                        borderWidth: 2.5,
                        pointRadius: 3,
                        tension: .35,
                        yAxisID: 'y',
                        order: 1
                    },
                    {
                        type: 'line',
                        label: 'Payments (₹)',
                        data: s.payments,
                        borderColor: C.violet,
                        backgroundColor: C.violet,
                        borderWidth: 2.5,
                        borderDash: [5, 4],
                        pointRadius: 3,
                        tension: .35,
                        yAxisID: 'y',
                        order: 2
                    }
                    ]
                },
                options: opt
            });
        }

        // ===== Calls & meetings =====
        function buildCalls() {
            var opt = baseOptions();
            opt.scales = {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: GRID,
                    border: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                }
            };
            charts.calls = new Chart(ctxFor('ldCallsChart'), {
                type: 'bar',
                data: {
                    labels: LD.staff,
                    datasets: [{
                        label: 'Meeting',
                        data: LD.calls.meeting,
                        backgroundColor: 'rgba(59,130,246,.75)',
                        borderRadius: 6,
                        maxBarThickness: 30
                    }, {
                        label: 'Call summary',
                        data: LD.calls.call,
                        backgroundColor: 'rgba(22,163,74,.75)',
                        borderRadius: 6,
                        maxBarThickness: 30
                    }]
                },
                options: opt
            });
        }

        // ===== Pipeline doughnut =====
        function buildPipeline() {
            var colors = [C.blue, C.amber, C.green, C.violet],
                net = sum(LD.pipeline.map(function (p) {
                    return p[2];
                })),
                totalAbs = sum(LD.pipeline.map(function (p) {
                    return p[1];
                }));

            var centerText = {
                id: 'ldCenter',
                afterDraw: function (chart) {
                    var a = chart.chartArea,
                        x = (a.left + a.right) / 2,
                        y = (a.top + a.bottom) / 2,
                        c = chart.ctx,
                        ff = Chart.defaults.font.family;
                    c.save();
                    c.textAlign = 'center';
                    c.fillStyle = '#6b7280';
                    c.font = '600 11px ' + ff;
                    c.fillText('Net pipeline', x, y - 8);
                    c.fillStyle = '#111827';
                    c.font = '800 15px ' + ff;
                    c.fillText(fmtInr(net, 0), x, y + 12);
                    c.restore();
                }
            };

            var opt = baseOptions();
            opt.cutout = '68%';
            opt.plugins.legend.display = false;
            opt.plugins.tooltip.callbacks.label = function (c) {
                return ' ' + LD.pipeline[c.dataIndex][0] + ': ' + fmtInr(LD.pipeline[c.dataIndex][2]);
            };
            charts.pipeline = new Chart(ctxFor('ldPipelineChart'), {
                type: 'doughnut',
                data: {
                    labels: LD.pipeline.map(function (p) {
                        return p[0];
                    }),
                    datasets: [{
                        data: LD.pipeline.map(function (p) {
                            return p[1];
                        }),
                        backgroundColor: colors,
                        borderColor: '#fff',
                        borderWidth: 3,
                        hoverOffset: 6
                    }]
                },
                options: opt,
                plugins: [centerText]
            });

            document.getElementById('ldPipelineLegend').innerHTML = LD.pipeline.map(function (p, i) {
                var share = totalAbs ? Math.round(p[1] / totalAbs * 100) : 0;
                return '<div class="d-flex align-items-center justify-content-between py-1 border-bottom"><span class="d-flex align-items-center gap-2 small"><span class="badge rounded-circle p-1" style="background:' + colors[i] + '"> </span><span class="fw-semibold text-dark">' + p[0] + '</span> <span class="text-muted">(' + share + '%)</span></span><span class="fw-bold small text-dark">' + fmtInr(p[2]) + '</span></div>';
            }).join('');
        }

        // ===== Top lead sources (horizontal bars) =====
        function buildSources() {
            var opt = baseOptions();
            opt.indexAxis = 'y';
            opt.plugins.legend.display = false;
            opt.plugins.tooltip.callbacks.title = function (items) {
                return items[0].label;
            };
            opt.plugins.tooltip.callbacks.label = function (c) {
                return ' Total lead: ' + c.parsed.x;
            };
            opt.scales = {
                x: {
                    beginAtZero: true,
                    grid: GRID,
                    border: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11,
                            weight: '600'
                        }
                    }
                }
            };
            charts.sources = new Chart(ctxFor('ldSourceChart'), {
                type: 'bar',
                data: {
                    labels: LD.sources.map(function (s) {
                        return s[0];
                    }),
                    datasets: [{
                        data: LD.sources.map(function (s) {
                            return s[1];
                        }),
                        backgroundColor: gradient('rgba(22,163,74,.9)', 'rgba(74,222,128,.75)'),
                        borderRadius: 6,
                        maxBarThickness: 22
                    }]
                },
                options: opt
            });
        }

        // ===== Average sales tabs =====
        function buildAvg(tab) {
            var opt = baseOptions(),
                datasets, title, yTitle;

            if (tab === 'leads') {
                title = 'Leads by staff';
                yTitle = 'Leads';
                datasets = LD.staff.map(function (n, i) {
                    return {
                        label: n,
                        data: LD.avgLeads[i],
                        backgroundColor: STAFF_COLORS[i],
                        borderRadius: 6,
                        maxBarThickness: 26
                    };
                });
            } else if (tab === 'wl') {
                title = 'Won vs lost';
                yTitle = 'Deals';
                datasets = [{
                    label: 'Won',
                    data: LD.avgWon,
                    backgroundColor: C.green,
                    borderRadius: 6,
                    maxBarThickness: 34
                }, {
                    label: 'Lost',
                    data: LD.avgLost,
                    backgroundColor: C.red,
                    borderRadius: 6,
                    maxBarThickness: 34
                }];
            } else {
                title = 'Revenue by staff';
                yTitle = 'Amount';
                datasets = LD.staff.map(function (n, i) {
                    return {
                        label: n,
                        data: LD.avgRevenue[i],
                        backgroundColor: STAFF_COLORS[i],
                        borderRadius: 6,
                        maxBarThickness: 26
                    };
                });
            }
            document.getElementById('ldAvgTitle').textContent = title;

            opt.scales = {
                x: {
                    grid: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Month',
                        font: {
                            size: 10
                        }
                    }
                },
                y: {
                    grid: GRID,
                    border: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: yTitle,
                        font: {
                            size: 10
                        }
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                }
            };
            if (tab === 'revenue') {
                opt.scales.y.ticks.callback = shortInr;
                opt.plugins.tooltip.callbacks.label = function (c) {
                    return ' ' + c.dataset.label + ': ' + fmtInr(c.parsed.y);
                };
            }
            charts.avg = new Chart(ctxFor('ldAvgChart'), {
                type: 'bar',
                data: {
                    labels: LD.avgMonths,
                    datasets: datasets
                },
                options: opt
            });
        }

        // ===== Toggle wiring =====
        function bindSeg(id, handler) {
            var seg = document.getElementById(id);
            seg.querySelectorAll('button').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    seg.querySelectorAll('button').forEach(function (b) {
                        b.classList.remove('active');
                    });
                    btn.classList.add('active');
                    handler(btn.dataset.period || btn.dataset.tab);
                });
            });
        }

        // Backend hook: staff filter for the funnel. Define window.ldFunnelStaffChanged(value) to reload data via AJAX.
        var funnelStaff = document.getElementById('ldFunnelStaff');
        if (funnelStaff) {
            funnelStaff.addEventListener('change', function () {
                if (typeof window.ldFunnelStaffChanged === 'function') window.ldFunnelStaffChanged(this.value);
            });
            if (window.jQuery) {
                window.jQuery(funnelStaff).on('change.select2', function () {
                    if (typeof window.ldFunnelStaffChanged === 'function') window.ldFunnelStaffChanged(this.value);
                });
            }
        }

        function init() {
            Chart.defaults.font.family = getComputedStyle(document.body).fontFamily;
            Chart.defaults.color = '#6b7280';
            if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                Chart.defaults.animation = false;
            }
            buildCalls();
            buildPipeline();
            buildProposals('monthly');
            buildFunnel('monthly');
            buildSources();
            buildAvg('revenue');

            bindSeg('ldPropSeg', buildProposals);
            bindSeg('ldFunnelSeg', buildFunnel);
            bindSeg('ldAvgTabs', buildAvg);

            // Staff table search filter (hide & show rows)
            var sumSearch = document.getElementById('ldSumSearch');
            if (sumSearch) {
                sumSearch.addEventListener('input', function () {
                    var query = this.value.toLowerCase().trim();
                    var rows = document.querySelectorAll('#ldSumTable tbody tr');
                    var matched = 0;
                    rows.forEach(function (row) {
                        var staffName = (row.getAttribute('data-staff') || row.textContent).toLowerCase();
                        if (!query || staffName.indexOf(query) > -1) {
                            row.style.display = '';
                            matched++;
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    var emptyEl = document.getElementById('ldSumEmpty');
                    if (emptyEl) {
                        if (matched === 0) {
                            emptyEl.classList.add('show');
                        } else {
                            emptyEl.classList.remove('show');
                        }
                    }
                });
            }

        }

        // ===== Section tabs =====
        var ldTabs = document.querySelectorAll('#ldTabs .ld-tab');
        ldTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                ldTabs.forEach(function (t) { t.classList.remove('active'); });
                tab.classList.add('active');
                var name = tab.dataset.tab;
                document.querySelectorAll('.lead-dash-page .ld-panel').forEach(function (p) {
                    p.classList.remove('active');
                    p.classList.add('d-none');
                });
                var panel = document.getElementById('ldPanel-' + name);
                if (panel) {
                    panel.classList.remove('d-none');
                    panel.classList.add('active');
                    /* hidden canvases had 0 size — re-measure charts on show */
                    requestAnimationFrame(function () {
                        panel.querySelectorAll('canvas').forEach(function (cv) {
                            var ch = window.Chart && Chart.getChart ? Chart.getChart(cv) : null;
                            if (ch) ch.resize();
                        });
                    });
                }
            });
        });

        // Use the page's Chart.js if v3+ is already loaded, otherwise load v4 from cdnjs
        function loadChart(cb) {
            if (window.Chart && parseInt(Chart.version, 10) >= 3) return cb();
            var s = document.createElement('script');
            s.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';
            s.onload = cb;
            document.head.appendChild(s);
        }

        document.addEventListener('DOMContentLoaded', function () {
            loadChart(init);
        });
    })();
</script>
<?php include 'footer.php'; ?>
