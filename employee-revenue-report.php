<?php include 'header.php'; ?>


<link rel="stylesheet" href="./assets/css/emp-revenue-report.css">



<main class="revenue-report-page">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Employee Revenue Report</h1>
        </div>
    </div>

    <!-- Summary cards -->
    <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4 col-xl text-nowrap">
            <div class="stat-card stat-theme-violet d-flex align-items-center gap-3">
                <div class="stat-icon stat-icon-lg"><i class="bi bi-people"></i></div>
                <div>
                    <div class="label">Employees</div>
                    <div class="value">8</div>
                    <div class="delta text-neutral">In this report</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl text-nowrap">
            <div class="stat-card stat-theme-primary d-flex align-items-center gap-3">
                <div class="stat-icon stat-icon-lg"><i class="bi bi-person-check"></i></div>
                <div>
                    <div class="label">Success Leads</div>
                    <div class="value">23</div>
                    <div class="delta text-neutral">By assign</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl text-nowrap">
            <div class="stat-card stat-theme-amber d-flex align-items-center gap-3">
                <div class="stat-icon stat-icon-lg"><i class="bi bi-search"></i></div>
                <div>
                    <div class="label">Sourcer</div>
                    <div class="value">83</div>
                    <div class="delta text-neutral">Overall</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl text-nowrap">
            <div class="stat-card stat-theme-blue d-flex align-items-center gap-3">
                <div class="stat-icon stat-icon-lg"><i class="bi bi-geo-alt"></i></div>
                <div>
                    <div class="label">Total Visits</div>
                    <div class="value">52</div>
                    <div class="delta text-neutral">Overall</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl text-nowrap">
            <div class="stat-card stat-theme-red d-flex align-items-center gap-3">
                <div class="stat-icon stat-icon-lg"><i class="bi bi-speedometer2"></i></div>
                <div>
                    <div class="label">Total Kilometers</div>
                    <div class="value">0</div>
                    <div class="delta text-neutral">Travelled</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <form method="get" class="card-custom mb-3 filters-card" id="revFiltersForm" autocomplete="off">
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
                    <a href="employee-revenue-report.php" class="btn btn-reject flex-fill" id="revClear">Clear</a>
                    <button type="submit" class="btn btn-primary flex-fill"><i class="bi bi-search me-1"></i>Search</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Employee cards -->
    <div class="row g-3" id="revCards">
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="EMP0001">
                <div class="rev-card">
                    <div class="rev-banner">
                        <svg viewBox="0 0 400 44" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M0 44 L0 30 C60 6 120 8 190 24 C260 40 320 34 400 12 L400 44 Z" fill="rgba(255,255,255,.28)" />
                            <path d="M0 44 L0 38 C70 20 140 26 210 34 C280 42 340 30 400 24 L400 44 Z" fill="#ffffff" />
                        </svg>
                        <div class="rev-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                    </div>
                    <div class="rev-name" title="ghrA TESTER">ghrA TESTER</div>

                    <div class="rev-body">
                        <div class="rev-colhead">Overall / Now</div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-person-check"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Assign</span>
                                        <span class="rev-value">1 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
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
                <div class="rev-card">
                    <div class="rev-banner">
                        <svg viewBox="0 0 400 44" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M0 44 L0 30 C60 6 120 8 190 24 C260 40 320 34 400 12 L400 44 Z" fill="rgba(255,255,255,.28)" />
                            <path d="M0 44 L0 38 C70 20 140 26 210 34 C280 42 340 30 400 24 L400 44 Z" fill="#ffffff" />
                        </svg>
                        <div class="rev-avatar">
                            <img src="./assets/img/profile-2.jpg" alt="GHARUDA SOFTWARE">
                        </div>
                    </div>
                    <div class="rev-name" title="GHARUDA SOFTWARE">GHARUDA SOFTWARE</div>

                    <div class="rev-body">
                        <div class="rev-colhead">Overall / Now</div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-person-check"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Assign</span>
                                        <span class="rev-value">17 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
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
                <div class="rev-card">
                    <div class="rev-banner">
                        <svg viewBox="0 0 400 44" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M0 44 L0 30 C60 6 120 8 190 24 C260 40 320 34 400 12 L400 44 Z" fill="rgba(255,255,255,.28)" />
                            <path d="M0 44 L0 38 C70 20 140 26 210 34 C280 42 340 30 400 24 L400 44 Z" fill="#ffffff" />
                        </svg>
                        <div class="rev-avatar">
                            <img src="./assets/img/profile-3.jpg" alt="ASHISH">
                        </div>
                    </div>
                    <div class="rev-name" title="ASHISH">ASHISH</div>

                    <div class="rev-body">
                        <div class="rev-colhead">Overall / Now</div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-person-check"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Assign</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
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
                <div class="rev-card">
                    <div class="rev-banner">
                        <svg viewBox="0 0 400 44" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M0 44 L0 30 C60 6 120 8 190 24 C260 40 320 34 400 12 L400 44 Z" fill="rgba(255,255,255,.28)" />
                            <path d="M0 44 L0 38 C70 20 140 26 210 34 C280 42 340 30 400 24 L400 44 Z" fill="#ffffff" />
                        </svg>
                        <div class="rev-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                    </div>
                    <div class="rev-name" title="Thilak Ma">Thilak Ma</div>

                    <div class="rev-body">
                        <div class="rev-colhead">Overall / Now</div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-person-check"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Assign</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
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
                <div class="rev-card">
                    <div class="rev-banner">
                        <svg viewBox="0 0 400 44" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M0 44 L0 30 C60 6 120 8 190 24 C260 40 320 34 400 12 L400 44 Z" fill="rgba(255,255,255,.28)" />
                            <path d="M0 44 L0 38 C70 20 140 26 210 34 C280 42 340 30 400 24 L400 44 Z" fill="#ffffff" />
                        </svg>
                        <div class="rev-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                    </div>
                    <div class="rev-name" title="Jude S">Jude S</div>

                    <div class="rev-body">
                        <div class="rev-colhead">Overall / Now</div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-person-check"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Assign</span>
                                        <span class="rev-value">4 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
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
                <div class="rev-card">
                    <div class="rev-banner">
                        <svg viewBox="0 0 400 44" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M0 44 L0 30 C60 6 120 8 190 24 C260 40 320 34 400 12 L400 44 Z" fill="rgba(255,255,255,.28)" />
                            <path d="M0 44 L0 38 C70 20 140 26 210 34 C280 42 340 30 400 24 L400 44 Z" fill="#ffffff" />
                        </svg>
                        <div class="rev-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                    </div>
                    <div class="rev-name" title="PREM KUMAR.R">PREM KUMAR.R</div>

                    <div class="rev-body">
                        <div class="rev-colhead">Overall / Now</div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-person-check"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Assign</span>
                                        <span class="rev-value">1 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
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
                <div class="rev-card">
                    <div class="rev-banner">
                        <svg viewBox="0 0 400 44" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M0 44 L0 30 C60 6 120 8 190 24 C260 40 320 34 400 12 L400 44 Z" fill="rgba(255,255,255,.28)" />
                            <path d="M0 44 L0 38 C70 20 140 26 210 34 C280 42 340 30 400 24 L400 44 Z" fill="#ffffff" />
                        </svg>
                        <div class="rev-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                    </div>
                    <div class="rev-name" title="Akash Kumar">Akash Kumar</div>

                    <div class="rev-body">
                        <div class="rev-colhead">Overall / Now</div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-person-check"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Assign</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
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
                <div class="rev-card">
                    <div class="rev-banner">
                        <svg viewBox="0 0 400 44" preserveAspectRatio="none" aria-hidden="true">
                            <path d="M0 44 L0 30 C60 6 120 8 190 24 C260 40 320 34 400 12 L400 44 Z" fill="rgba(255,255,255,.28)" />
                            <path d="M0 44 L0 38 C70 20 140 26 210 34 C280 42 340 30 400 24 L400 44 Z" fill="#ffffff" />
                        </svg>
                        <div class="rev-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                    </div>
                    <div class="rev-name" title="ARUN KUMAR">ARUN KUMAR</div>

                    <div class="rev-body">
                        <div class="rev-colhead">Overall / Now</div>
                            <div class="rev-metric rev-theme-green">
                                <span class="rev-icon"><i class="bi bi-person-check"></i></span>
                                <div class="rev-metric-main">
                                    <div class="rev-metric-top">
                                        <span class="rev-label">Success Leads By Assign</span>
                                        <span class="rev-value">0 / 0</span>
                                    </div>
                                    <div class="rev-track">
                                        <div class="rev-fill" style="width:0%"></div>
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

