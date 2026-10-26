<?php include 'header.php'; ?>

 

<style>
    /* KPI Metric Cards */
    .loan-kpi { min-height: 112px; padding: 18px; border: 1px solid var(--border-soft); border-radius: 14px; background: var(--white); box-shadow: 0 4px 16px rgba(20, 30, 25, .04); transition: transform .2s ease, box-shadow .2s ease; }
    .loan-kpi:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(20, 30, 25, .08); }
    .loan-kpi .icon { width: 44px; height: 44px; border-radius: 12px; display: grid; place-items: center; font-size: 20px; flex-shrink: 0; }
    .loan-kpi .label { color: var(--ink-500); font-size: 12px; font-weight: 700; margin-bottom: 3px; }
    .loan-kpi .value { color: var(--ink-900); font-size: 22px; font-weight: 800; }
    .loan-kpi .sub { color: var(--ink-500); font-size: 11px; margin-top: 3px; }
    
    /* Status Badges */
    .loan-status { display: inline-flex; align-items: center; gap: 6px; border-radius: 99px; padding: 5px 12px; font-size: 11.5px; font-weight: 700; }
    .loan-status i { font-size: 8px; }
    .loan-status.approved { color: #087a24; background: #e7f7eb; }
    .loan-status.pending { color: #b56b00; background: #fff4d9; }
    .loan-status.rejected { color: #be3035; background: #fdebed; }
    .loan-status.completed { color: #1e40af; background: #dbeafe; }

    /* Progress Stack */
    .loan-progress-stack { min-width: 140px; }
    .progress-bar-thin { height: 6px; border-radius: 999px; background: #edf1ee; overflow: hidden; margin-top: 6px; }
    .progress-bar-thin span { display: block; height: 100%; border-radius: inherit; background: var(--primary); transition: width 0.4s ease; }

    /* Action Buttons in Table */
    .action-btn-group {
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .btn-action-icon {
        width: 32px;
        height: 32px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-size: 13px;
        border: 1px solid transparent;
        transition: all .2s ease;
    }
    .btn-action-icon.btn-view-details {
        background: #f0fdf4;
        color: #15803d;
        border-color: #bbf7d0;
    }
    .btn-action-icon.btn-view-details:hover {
        background: #15803d;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(21, 128, 61, 0.25);
    }
    .btn-action-icon.btn-schedule {
        background: #eff6ff;
        color: #2563eb;
        border-color: #bfdbfe;
    }
    .btn-action-icon.btn-schedule:hover {
        background: #2563eb;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.25);
    }
    .btn-action-icon.btn-ledger {
        background: #fefce8;
        color: #a16207;
        border-color: #fef08a;
    }
    .btn-action-icon.btn-ledger:hover {
        background: #ca8a04;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(202, 138, 4, 0.25);
    }
    .btn-actions-dropdown {
        background: #ffffff;
        border: 1px solid #cbd5e1;
        color: #475569;
        font-size: 12px;
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all .2s ease;
    }
    .btn-actions-dropdown:hover, .btn-actions-dropdown[aria-expanded="true"] {
        background: #f1f5f9;
        color: #0f172a;
        border-color: #94a3b8;
    }
    .dropdown-menu-actions {
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        padding: 6px;
        font-size: 12.5px;
        min-width: 210px;
    }
    .dropdown-menu-actions .dropdown-item {
        border-radius: 8px;
        padding: 7px 12px;
        font-weight: 600;
        color: #334155;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all .15s ease;
    }
    .dropdown-menu-actions .dropdown-item:hover {
        background: #f8fafc;
        color: var(--primary-dark, #0ca308);
    }

    /* Modal Hero Header & Styling */
    .modal-hero-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid #e2e8f0;
        padding: 18px 24px;
    }
    .modal-kpi-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 14px;
        transition: transform .15s ease, box-shadow .15s ease;
    }
    .modal-kpi-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .modal-filter-pills .btn-filter-pill {
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 12px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        color: #64748b;
        transition: all .2s ease;
    }
    .modal-filter-pills .btn-filter-pill.active,
    .modal-filter-pills .btn-filter-pill:hover {
        background: var(--primary, #0ca308);
        color: #ffffff;
        border-color: var(--primary, #0ca308);
    }
    .schedule-table-wrap, .ledger-table-wrap {
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
        max-height: 340px;
    }
    .schedule-table thead th, .ledger-table thead th {
        position: sticky;
        top: 0;
        background: #f8fafc;
        z-index: 10;
        font-size: 11.5px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        font-weight: 700;
        color: #475569;
        border-bottom: 2px solid #e2e8f0;
    }
    .nav-tabs-details {
        border-bottom: 2px solid #e2e8f0;
        gap: 6px;
    }
    .nav-tabs-details .nav-link {
        color: #64748b;
        font-weight: 700;
        font-size: 13px;
        border: none;
        border-bottom: 3px solid transparent;
        padding: 10px 18px;
        border-radius: 0;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all .2s ease;
    }
    .nav-tabs-details .nav-link:hover {
        color: #0f172a;
    }
    .nav-tabs-details .nav-link.active {
        color: var(--primary, #0ca308);
        border-bottom-color: var(--primary, #0ca308);
        background: transparent;
    }
    .quick-amount-btn {
        font-size: 11.5px;
        padding: 2px 8px;
        border-radius: 6px;
        border: 1px solid #cbd5e1;
        background: #ffffff;
        color: #475569;
        font-weight: 600;
        cursor: pointer;
        transition: all .15s ease;
    }
    .quick-amount-btn:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    /* Filter Panel Styles matching Gharuda standard */
    .filters-card { position: relative; z-index: 50; }
    .filters-toggle-row { display: flex; align-items: center; justify-content: space-between; }
    .filters-toggle-btn { display: inline-flex; align-items: center; gap: 8px; background: var(--primary-light, #e8f7ea); color: var(--primary-dark, #0ca308); border: none; font-weight: 600; font-size: 13.5px; padding: 9px 16px; border-radius: 10px; cursor: pointer; transition: background .2s ease; }
    .filters-toggle-btn:hover { background: #d7f0da; }
    .filters-toggle-btn .chevron { transition: transform .35s cubic-bezier(.4, 0, .2, 1); font-size: 12px; }
    .filters-toggle-btn.open .chevron { transform: rotate(180deg); }
    .filters-collapse { max-height: 0; opacity: 0; overflow: hidden; transform: translateY(-8px); transition: max-height .45s cubic-bezier(.4, 0, .2, 1), opacity .35s ease, transform .4s cubic-bezier(.34, 1.1, .64, 1), margin .45s ease; margin-top: 0; }
    .filters-collapse.open { max-height: 600px; opacity: 1; transform: translateY(0); margin-top: 16px; }
    .filters-collapse .row > div { opacity: 0; transform: translateY(-6px); }
    .filters-collapse.open .row > div { animation: loanFieldIn .35s ease forwards; }
    @keyframes loanFieldIn { to { opacity: 1; transform: translateY(0); } }
    .active-filters-bar { position: relative; z-index: 1; display: flex; align-items: center; flex-wrap: wrap; gap: 8px; background: #fff; border: 1px solid var(--ink-100, #eef0f3); border-radius: 14px; padding: 0 14px; margin-bottom: 0; box-shadow: 0 2px 10px rgba(20, 20, 43, .04); max-height: 0; opacity: 0; overflow: hidden; border-width: 0; transform: translateY(-6px); transition: all .35s ease; }
    .active-filters-bar.show { max-height: 200px; opacity: 1; padding: 12px 14px; margin-bottom: 12px; border-width: 1px; transform: translateY(0); }
    .filter-chip { display: inline-flex; align-items: center; gap: 6px; background: var(--primary-light, #e8f7ea); color: var(--primary-dark, #0ca308); font-size: 12.5px; font-weight: 600; padding: 6px 12px; border-radius: 999px; }
    .filter-chip .chip-close { cursor: pointer; border: none; background: rgba(0,0,0,0.06); border-radius: 50%; width: 18px; height: 18px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px; margin-left: 4px; }
    .filter-chip .chip-close:hover { background: rgba(0,0,0,0.15); }
    .active-filters-clear { margin-left: auto; font-size: 12.5px; font-weight: 600; color: var(--accent-red, #ef4444); background: transparent; border: none; cursor: pointer; }
    
    /* Type Badges */
    .badge-loan-type { font-size: 11.5px; font-weight: 600; padding: 4px 10px; border-radius: 8px; }
    .badge-personal { background: #e0f2fe; color: #0284c7; }
    .badge-advance { background: #fef3c7; color: #d97706; }
    .badge-medical { background: #fee2e2; color: #dc2626; }
    .badge-education { background: #f3e8ff; color: #9333ea; }
</style>

<!-- Top Title Area -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Salary Advance & Company Loans</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-cash-coin fs-6"></i>
            <span>Loan & Advances</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Salary Advance & Loans</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#advanceModal">
            <i class="bi bi-lightning-charge me-1"></i> Quick 1-Month Advance
        </button>
        <a href="loan-apply.php" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Request Salary Advance
        </a>
    </div>
</div>

<!-- KPI Cards Overview -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="loan-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-bank"></i></div>
            <div>
                <div class="label">Total Disbursed (FY)</div>
                <div class="value">₹18.40L</div>
                <div class="sub">Across 24 active accounts</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="loan-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e9f7ec;color:#11872c;"><i class="bi bi-arrow-repeat"></i></div>
            <div>
                <div class="label">Monthly EMI Recovery</div>
                <div class="value">₹1.85L</div>
                <div class="sub">Auto-deducted via Payroll</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="loan-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="label">Pending Review</div>
                <div class="value" id="pendingCountDisplay">2</div>
                <div class="sub">Awaiting HR/Finance approval</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="loan-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fcebed;color:#d5474e;"><i class="bi bi-wallet2"></i></div>
            <div>
                <div class="label">Outstanding Principal</div>
                <div class="value">₹11.25L</div>
                <div class="sub">Current active loan balance</div>
            </div>
        </div>
    </div>
</div>

<!-- Filters Card -->
<div class="card-custom filters-card mb-3">
    <div class="filters-toggle-row">
        <span class="fw-semibold" style="font-size:14.5px;color:var(--ink-900);">
            <i class="bi bi-funnel me-1 text-primary"></i> Filter Loan & Advance Records
        </span>
        <button type="button" class="filters-toggle-btn" id="toggleLoanFiltersBtn">
            <span>Filters</span><i class="bi bi-chevron-down chevron"></i>
        </button>
    </div>
    <div class="filters-collapse" id="loanFiltersCollapse">
        <div class="row g-3 align-items-end pt-3">
            <div class="col-lg-3 col-md-6">
                <label class="form-label" style="font-size:12px;font-weight:700;color:var(--ink-700);">Search Employee</label>
                <input id="loanSearch" type="text" class="form-control" placeholder="Search by name, ID, or loan #">
            </div>
            <div class="col-lg-2 col-md-6">
                <label class="form-label" style="font-size:12px;font-weight:700;color:var(--ink-700);">Category</label>
                <select id="loanCategoryFilter" class="form-select">
                    <option value="">All Categories</option>
                    <option value="Personal Loan">Personal Loan</option>
                    <option value="Salary Advance">Salary Advance</option>
                    <option value="Medical Assistance">Medical Assistance</option>
                    <option value="Education Support">Education Support</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-6">
                <label class="form-label" style="font-size:12px;font-weight:700;color:var(--ink-700);">Department</label>
                <select id="loanDeptFilter" class="form-select">
                    <option value="">All Departments</option>
                    <option value="Design">Design</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Finance">Finance</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-6">
                <label class="form-label" style="font-size:12px;font-weight:700;color:var(--ink-700);">Status</label>
                <select id="loanStatusFilter" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="approved">Active / Approved</option>
                    <option value="pending">Pending Approval</option>
                    <option value="completed">Completed / Settled</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="col-lg-3 d-flex gap-2">
                <button id="clearLoanFilters" class="btn btn-reject flex-fill" type="button">Clear</button>
                <button id="applyLoanFilters" class="btn btn-primary flex-fill" type="button">
                    <i class="bi bi-funnel me-1"></i> Apply
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Active Filter Chips -->
<div class="active-filters-bar" id="loanActiveFiltersBar">
    <span style="font-size:12.5px;font-weight:600;color:var(--ink-500);"><i class="bi bi-funnel-fill me-1"></i>Active Filters:</span>
    <div class="d-flex flex-wrap gap-2" id="loanActiveFiltersList"></div>
    <button type="button" class="active-filters-clear" id="loanActiveFiltersClearAll">Clear All</button>
</div>

<!-- Main Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="loan-requests-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search employee..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="loanTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Ref #</th>
                    <th class="text-nowrap">Employee</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Principal</th>
                    <th class="text-nowrap">Tenure / EMI</th>
                    <th class="text-nowrap">Repaid / Balance</th>
                    <th class="text-nowrap">Request Date</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr class="loan-row" id="row-LN-2026-001" data-search="amelia curr emp0001 ln-2026-001" data-category="Personal Loan" data-dept="Design" data-status="approved">
                    <td>1</td>
                    <td class="fw-bold"><a href="javascript:void(0);" class="text-primary open-details-action" data-ref="LN-2026-001" data-tab="overview">LN-2026-001</a></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Amelia Curr">
                            <div>
                                <div class="fw-bold"><a href="javascript:void(0);" class="text-dark open-details-action text-decoration-none" data-ref="LN-2026-001" data-tab="overview">Amelia Curr</a></div>
                                <div class="text-muted" style="font-size:11px;">EMP0001 • Design</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge-loan-type badge-personal">Personal Loan</span></td>
                    <td class="fw-bold text-dark">₹1,20,000</td>
                    <td>
                        <div class="fw-semibold text-dark">12 mos</div>
                        <div class="text-muted" style="font-size:11.5px;">₹10,000/mo</div>
                    </td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11.5px;font-weight:700;">
                                <span class="text-success text-repaid-display">₹40,000</span>
                                <span class="text-muted text-balance-display">₹80,000</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-fill" style="width:33.3%;"></span></div>
                        </div>
                    </td>
                    <td style="font-size:12.5px;">15-Jan-2026</td>
                    <td><span class="loan-status approved"><i class="bi bi-circle-fill"></i> Active</span></td>
                    <td class="text-center">
                        <div class="action-btn-group">
                            <button type="button" class="btn btn-action-icon btn-view-details open-details-action" data-ref="LN-2026-001" data-tab="overview" data-bs-toggle="tooltip" data-bs-title="View Full Loan Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-action-icon btn-schedule open-details-action" data-ref="LN-2026-001" data-tab="schedule" data-bs-toggle="tooltip" data-bs-title="View EMI Schedule">
                                <i class="bi bi-calendar3"></i>
                            </button>
                        
                        </div>
                    </td>
                </tr>

                <tr class="loan-row" id="row-ADV-2026-088" data-search="daniel martinez emp0002 adv-2026-088" data-category="Salary Advance" data-dept="Engineering" data-status="pending">
                    <td>2</td>
                    <td class="fw-bold"><a href="javascript:void(0);" class="text-primary open-details-action" data-ref="ADV-2026-088" data-tab="overview">ADV-2026-088</a></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Daniel Martinez">
                            <div>
                                <div class="fw-bold"><a href="javascript:void(0);" class="text-dark open-details-action text-decoration-none" data-ref="ADV-2026-088" data-tab="overview">Daniel Martinez</a></div>
                                <div class="text-muted" style="font-size:11px;">EMP0002 • Engineering</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge-loan-type badge-advance">Salary Advance</span></td>
                    <td class="fw-bold text-dark">₹30,000</td>
                    <td>
                        <div class="fw-semibold text-dark">1 mo</div>
                        <div class="text-muted" style="font-size:11.5px;">₹30,000/mo</div>
                    </td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11.5px;font-weight:700;">
                                <span class="text-success text-repaid-display">₹0</span>
                                <span class="text-muted text-balance-display">₹30,000</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-fill" style="width:0%;"></span></div>
                        </div>
                    </td>
                    <td style="font-size:12.5px;">28-Feb-2026</td>
                    <td><span class="loan-status pending"><i class="bi bi-circle-fill"></i> Pending Approval</span></td>
                    <td class="text-center">
                        <div class="action-btn-group">
                            <button type="button" class="btn btn-action-icon btn-view-details open-details-action" data-ref="ADV-2026-088" data-tab="overview" data-bs-toggle="tooltip" data-bs-title="View Full Loan Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-action-icon btn-schedule open-details-action" data-ref="ADV-2026-088" data-tab="schedule" data-bs-toggle="tooltip" data-bs-title="View EMI Schedule">
                                <i class="bi bi-calendar3"></i>
                            </button>
                            
                            <button type="button" class="btn btn-sm btn-success approve-btn px-2" data-ref="ADV-2026-088" data-bs-toggle="tooltip" data-bs-title="Approve Request">
                                <i class="bi bi-check-lg"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger reject-btn px-2" data-ref="ADV-2026-088" data-bs-toggle="tooltip" data-bs-title="Reject">
                                <i class="bi bi-x-lg"></i>
                            </button>
                            
                        </div>
                    </td>
                </tr>

                <tr class="loan-row" id="row-LN-2026-004" data-search="david anderson emp0003 ln-2026-004" data-category="Medical Assistance" data-dept="Engineering" data-status="approved">
                    <td>3</td>
                    <td class="fw-bold"><a href="javascript:void(0);" class="text-primary open-details-action" data-ref="LN-2026-004" data-tab="overview">LN-2026-004</a></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="David Anderson">
                            <div>
                                <div class="fw-bold"><a href="javascript:void(0);" class="text-dark open-details-action text-decoration-none" data-ref="LN-2026-004" data-tab="overview">David Anderson</a></div>
                                <div class="text-muted" style="font-size:11px;">EMP0003 • Engineering</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge-loan-type badge-medical">Medical Assistance</span></td>
                    <td class="fw-bold text-dark">₹2,00,000</td>
                    <td>
                        <div class="fw-semibold text-dark">24 mos</div>
                        <div class="text-muted" style="font-size:11.5px;">₹8,333/mo</div>
                    </td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11.5px;font-weight:700;">
                                <span class="text-success text-repaid-display">₹1,00,000</span>
                                <span class="text-muted text-balance-display">₹1,00,000</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-fill" style="width:50%;"></span></div>
                        </div>
                    </td>
                    <td style="font-size:12.5px;">10-Nov-2025</td>
                    <td><span class="loan-status approved"><i class="bi bi-circle-fill"></i> Active</span></td>
                    <td class="text-center">
                        <div class="action-btn-group">
                            <button type="button" class="btn btn-action-icon btn-view-details open-details-action" data-ref="LN-2026-004" data-tab="overview" data-bs-toggle="tooltip" data-bs-title="View Full Loan Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-action-icon btn-schedule open-details-action" data-ref="LN-2026-004" data-tab="schedule" data-bs-toggle="tooltip" data-bs-title="View EMI Schedule">
                                <i class="bi bi-calendar3"></i>
                            </button>
                           
                            
                        </div>
                    </td>
                </tr>

                <tr class="loan-row" id="row-LN-2026-009" data-search="emily clark emp0004 ln-2026-009" data-category="Education Support" data-dept="Finance" data-status="completed">
                    <td>4</td>
                    <td class="fw-bold"><a href="javascript:void(0);" class="text-primary open-details-action" data-ref="LN-2026-009" data-tab="overview">LN-2026-009</a></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-4.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Emily Clark">
                            <div>
                                <div class="fw-bold"><a href="javascript:void(0);" class="text-dark open-details-action text-decoration-none" data-ref="LN-2026-009" data-tab="overview">Emily Clark</a></div>
                                <div class="text-muted" style="font-size:11px;">EMP0004 • Finance</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge-loan-type badge-education">Education Support</span></td>
                    <td class="fw-bold text-dark">₹80,000</td>
                    <td>
                        <div class="fw-semibold text-dark">8 mos</div>
                        <div class="text-muted" style="font-size:11.5px;">₹10,000/mo</div>
                    </td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11.5px;font-weight:700;">
                                <span class="text-success text-repaid-display">₹80,000</span>
                                <span class="text-muted text-balance-display">₹0</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-fill" style="width:100%;"></span></div>
                        </div>
                    </td>
                    <td style="font-size:12.5px;">05-Jun-2025</td>
                    <td><span class="loan-status completed"><i class="bi bi-circle-fill"></i> Settled</span></td>
                    <td class="text-center">
                        <div class="action-btn-group">
                            <button type="button" class="btn btn-action-icon btn-view-details open-details-action" data-ref="LN-2026-009" data-tab="overview" data-bs-toggle="tooltip" data-bs-title="View Full Loan Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-action-icon btn-schedule open-details-action" data-ref="LN-2026-009" data-tab="schedule" data-bs-toggle="tooltip" data-bs-title="View EMI Schedule">
                                <i class="bi bi-calendar3"></i>
                            </button>
                          
                            
                        </div>
                    </td>
                </tr>

                <tr class="loan-row" id="row-ADV-2026-092" data-search="sophia johnson emp0005 adv-2026-092" data-category="Salary Advance" data-dept="Marketing" data-status="pending">
                    <td>5</td>
                    <td class="fw-bold"><a href="javascript:void(0);" class="text-primary open-details-action" data-ref="ADV-2026-092" data-tab="overview">ADV-2026-092</a></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Sophia Johnson">
                            <div>
                                <div class="fw-bold"><a href="javascript:void(0);" class="text-dark open-details-action text-decoration-none" data-ref="ADV-2026-092" data-tab="overview">Sophia Johnson</a></div>
                                <div class="text-muted" style="font-size:11px;">EMP0005 • Marketing</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge-loan-type badge-advance">Salary Advance</span></td>
                    <td class="fw-bold text-dark">₹20,000</td>
                    <td>
                        <div class="fw-semibold text-dark">2 mos</div>
                        <div class="text-muted" style="font-size:11.5px;">₹10,000/mo</div>
                    </td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11.5px;font-weight:700;">
                                <span class="text-success text-repaid-display">₹0</span>
                                <span class="text-muted text-balance-display">₹20,000</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-fill" style="width:0%;"></span></div>
                        </div>
                    </td>
                    <td style="font-size:12.5px;">01-Mar-2026</td>
                    <td><span class="loan-status pending"><i class="bi bi-circle-fill"></i> Pending Approval</span></td>
                    <td class="text-center">
                        <div class="action-btn-group">
                            <button type="button" class="btn btn-action-icon btn-view-details open-details-action" data-ref="ADV-2026-092" data-tab="overview" data-bs-toggle="tooltip" data-bs-title="View Full Loan Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-action-icon btn-schedule open-details-action" data-ref="ADV-2026-092" data-tab="schedule" data-bs-toggle="tooltip" data-bs-title="View EMI Schedule">
                                <i class="bi bi-calendar3"></i>
                            </button>
                            
                            <button type="button" class="btn btn-sm btn-success approve-btn px-2" data-ref="ADV-2026-092" data-bs-toggle="tooltip" data-bs-title="Approve Request">
                                <i class="bi bi-check-lg"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger reject-btn px-2" data-ref="ADV-2026-092" data-bs-toggle="tooltip" data-bs-title="Reject">
                                <i class="bi bi-x-lg"></i>
                            </button>
                            
                        </div>
                    </td>
                </tr>

                <tr class="loan-row" id="row-LN-2026-012" data-search="michael brown emp0006 ln-2026-012" data-category="Personal Loan" data-dept="Design" data-status="approved">
                    <td>6</td>
                    <td class="fw-bold"><a href="javascript:void(0);" class="text-primary open-details-action" data-ref="LN-2026-012" data-tab="overview">LN-2026-012</a></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Michael Brown">
                            <div>
                                <div class="fw-bold"><a href="javascript:void(0);" class="text-dark open-details-action text-decoration-none" data-ref="LN-2026-012" data-tab="overview">Michael Brown</a></div>
                                <div class="text-muted" style="font-size:11px;">EMP0006 • Design</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge-loan-type badge-personal">Personal Loan</span></td>
                    <td class="fw-bold text-dark">₹1,50,000</td>
                    <td>
                        <div class="fw-semibold text-dark">18 mos</div>
                        <div class="text-muted" style="font-size:11.5px;">₹8,333/mo</div>
                    </td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11.5px;font-weight:700;">
                                <span class="text-success text-repaid-display">₹50,000</span>
                                <span class="text-muted text-balance-display">₹1,00,000</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-fill" style="width:33.3%;"></span></div>
                        </div>
                    </td>
                    <td style="font-size:12.5px;">20-Oct-2025</td>
                    <td><span class="loan-status approved"><i class="bi bi-circle-fill"></i> Active</span></td>
                    <td class="text-center">
                        <div class="action-btn-group">
                            <button type="button" class="btn btn-action-icon btn-view-details open-details-action" data-ref="LN-2026-012" data-tab="overview" data-bs-toggle="tooltip" data-bs-title="View Full Loan Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-action-icon btn-schedule open-details-action" data-ref="LN-2026-012" data-tab="schedule" data-bs-toggle="tooltip" data-bs-title="View EMI Schedule">
                                <i class="bi bi-calendar3"></i>
                            </button>
                            
                            
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Table Footer with Show Entries & Pagination -->
    <div class="d-flex justify-content-between align-items-center report-footer p-3">
        <div class="d-flex gap-2 align-items-center">
            <span class="small text-muted text-nowrap">Show:</span>
            <select class="form-select form-select-sm gh-w-auto" id="showEntries">
                <option selected>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">6</strong> of <strong id="pgTotal">6</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal: Quick Salary Advance -->
<div class="modal fade" id="advanceModal" tabindex="-1" aria-labelledby="advanceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning-subtle text-dark">
                <h5 class="modal-title fw-bold" id="advanceModalLabel">
                    <i class="bi bi-lightning-charge text-warning me-2"></i> Quick Salary Advance
                </h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="advanceForm">
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Select Employee *</label>
                        <select class="form-select" id="advanceEmpSelect" required>
                            <option value="">Choose Employee...</option>
                            <option value="Amelia Curr (EMP0001)">EMP0001 - Amelia Curr (Design)</option>
                            <option value="Daniel Martinez (EMP0002)">EMP0002 - Daniel Martinez (Engineering)</option>
                            <option value="Sophia Johnson (EMP0005)">EMP0005 - Sophia Johnson (Marketing)</option>
                        </select>
                        <small class="text-muted">Maximum advance allowed: Up to 50% of monthly net salary.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Advance Amount (₹) *</label>
                        <input type="number" class="form-control" id="advanceAmountInput" placeholder="e.g. 25000" min="1000" max="60000" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Recovery Installments *</label>
                        <select class="form-select" id="advanceTenureSelect">
                            <option value="1">1 Month (Deduct 100% in next payroll cycle)</option>
                            <option value="2">2 Months (Deduct 50% across 2 payroll cycles)</option>
                            <option value="3">3 Months (Deduct 33.3% across 3 payroll cycles)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Reason for Advance</label>
                        <input type="text" class="form-control" id="advanceReasonInput" placeholder="e.g. Family medical emergency, festival advance">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnSubmitAdvance">
                    <i class="bi bi-check-circle me-1"></i> Disburse Advance
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- COMPREHENSIVE LOAN DETAILS & ACTION HUB POPUP (WITH SCHEDULE & LEDGER)   -->
<!-- ========================================================================= -->
<div class="modal fade" id="loanDetailsModal" tabindex="-1" aria-labelledby="loanDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">
            <!-- Modal Hero Header -->
            <div class="modal-header modal-hero-header d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <img id="hubEmpAvatar" src="./assets/img/profile-1.jpg" class="avatar-sm rounded-circle border shadow-sm" style="width:48px;height:48px;object-fit:cover;" alt="Avatar">
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h5 class="modal-title fw-bold mb-0" id="loanDetailsModalLabel" style="color:var(--ink-900);">
                                <span id="hubLoanRef">LN-2026-001</span> • Loan Account Hub
                            </h5>
                            <span id="hubStatusBadge" class="loan-status approved"><i class="bi bi-circle-fill"></i> Active</span>
                        </div>
                        <div class="text-muted" style="font-size:12.5px;" id="hubSubHeader">
                            <strong class="text-dark" id="hubEmpName">Amelia Curr</strong> 
                            (<span id="hubEmpCode">EMP0001</span> • <span id="hubEmpDept">Design</span>) • 
                            <span class="badge bg-light text-dark border" id="hubCategoryBadge">Personal Loan</span> • 
                            Applied: <span id="hubApplyDate">15-Jan-2026</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print();" title="Print Details / Statement">
                        <i class="bi bi-printer"></i>
                    </button>
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
            </div>

            <!-- Top Financial Overview KPI Strip -->
            <div class="px-4 pt-3 pb-0 bg-white">
                <div class="row g-3 mb-3">
                    <div class="col-sm-6 col-lg-3">
                        <div class="modal-kpi-card" style="border-left: 4px solid #3b82f6;">
                            <span class="text-muted small d-block mb-1"><i class="bi bi-cash-stack text-primary me-1"></i> Loan Principal</span>
                            <h4 class="fw-bold mb-0 text-dark" id="hubPrincipalDisplay">₹1,20,000</h4>
                            <span class="text-muted" style="font-size:11px;" id="hubTenureSub">12 Months • Interest Free</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="modal-kpi-card" style="border-left: 4px solid #0284c7;">
                            <span class="text-muted small d-block mb-1"><i class="bi bi-calendar-check text-info me-1"></i> Monthly EMI</span>
                            <h4 class="fw-bold mb-0 text-primary" id="hubEmiDisplay">₹10,000</h4>
                            <span class="text-muted" style="font-size:11px;">Payroll Auto-Debit</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="modal-kpi-card" style="border-left: 4px solid #10b981;">
                            <span class="text-success small d-block mb-1"><i class="bi bi-check2-circle text-success me-1"></i> Total Recovered</span>
                            <h4 class="fw-bold mb-0 text-success" id="hubRecoveredDisplay">₹40,000</h4>
                            <span class="text-success" style="font-size:11px;" id="hubPaidCountDisplay">4 of 12 EMIs Cleared</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="modal-kpi-card" style="border-left: 4px solid #ef4444;">
                            <span class="text-danger small d-block mb-1"><i class="bi bi-hourglass-bottom text-danger me-1"></i> Outstanding Due</span>
                            <h4 class="fw-bold mb-0 text-danger" id="hubBalanceDisplay">₹80,000</h4>
                            <span class="text-danger" style="font-size:11px;" id="hubRemainCountDisplay">8 EMIs Remaining</span>
                        </div>
                    </div>
                </div>

                <!-- Recovery Progress Bar -->
                <div class="p-2 px-3 bg-light rounded border d-flex align-items-center justify-content-between gap-3 mb-3">
                    <div class="d-flex align-items-center gap-2" style="font-size:12px;font-weight:700;color:var(--ink-700);min-width:140px;">
                        <i class="bi bi-pie-chart text-success"></i> Recovery Progress:
                    </div>
                    <div class="progress flex-grow-1" style="height: 8px; border-radius: 99px;">
                        <div class="progress-bar bg-success" id="hubProgressBar" role="progressbar" style="width: 33.3%;"></div>
                    </div>
                    <span class="fw-bold text-success" id="hubProgressPercent" style="font-size:12px;min-width:70px;text-align:right;">33.3% Paid</span>
                </div>

                <!-- Modal Tabs Navigation -->
                <ul class="nav nav-tabs nav-tabs-details" id="loanHubTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tab-overview-btn" data-bs-toggle="tab" data-bs-target="#pane-overview" type="button" role="tab">
                            <i class="bi bi-info-circle"></i> 1. Loan Overview & Details
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-schedule-btn" data-bs-toggle="tab" data-bs-target="#pane-schedule" type="button" role="tab">
                            <i class="bi bi-calendar3"></i> 2. EMI Repayment Schedule
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-ledger-btn" data-bs-toggle="tab" data-bs-target="#pane-ledger" type="button" role="tab">
                            <i class="bi bi-journal-text"></i> 3. Manage Loan Ledger
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-foreclosure-btn" data-bs-toggle="tab" data-bs-target="#pane-foreclosure" type="button" role="tab">
                            <i class="bi bi-shield-check"></i> 4. Foreclosure & Settlement
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Modal Tab Content Panes -->
            <div class="modal-body p-4 bg-light">
                <div class="tab-content" id="loanHubTabContent">
                    
                    <!-- PANE 1: LOAN OVERVIEW & DETAILS -->
                    <div class="tab-pane fade show active" id="pane-overview" role="tabpanel">
                        <div class="row g-3">
                            <!-- Loan Parameters & Sanction Spec -->
                            <div class="col-lg-6">
                                <div class="bg-white p-3 rounded border h-100 shadow-sm">
                                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                        <i class="bi bi-file-earmark-text text-primary me-2"></i>Loan Agreement & Sanction Details
                                    </h6>
                                    <div class="row g-2" style="font-size:12.5px;">
                                        <div class="col-6 text-muted">Loan Category:</div>
                                        <div class="col-6 fw-bold text-dark" id="dtLoanCat">Personal Loan</div>

                                        <div class="col-6 text-muted">Sanction Reference #:</div>
                                        <div class="col-6 fw-bold text-primary" id="dtLoanRef">LN-2026-001</div>

                                        <div class="col-6 text-muted">Sanction Amount:</div>
                                        <div class="col-6 fw-bold text-dark" id="dtPrincipal">₹1,20,000</div>

                                        <div class="col-6 text-muted">Annual Interest Rate:</div>
                                        <div class="col-6 fw-bold text-success">0.0% (Company Welfare Facility)</div>

                                        <div class="col-6 text-muted">Repayment Tenure:</div>
                                        <div class="col-6 fw-bold text-dark" id="dtTenure">12 Months</div>

                                        <div class="col-6 text-muted">Monthly EMI Deduction:</div>
                                        <div class="col-6 fw-bold text-primary" id="dtEmi">₹10,000 / month</div>

                                        <div class="col-6 text-muted">Disbursal Date:</div>
                                        <div class="col-6 fw-bold text-dark" id="dtDisburseDate">15-Jan-2026</div>

                                        <div class="col-6 text-muted">Projected Maturity Date:</div>
                                        <div class="col-6 fw-bold text-dark" id="dtMaturityDate">31-Dec-2026</div>

                                        <div class="col-6 text-muted">Recovery Channel:</div>
                                        <div class="col-6 fw-bold text-dark">Automated Monthly Payroll Salary Slip</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Employee & Financial Mandate Details -->
                            <div class="col-lg-6">
                                <div class="bg-white p-3 rounded border h-100 shadow-sm">
                                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">
                                        <i class="bi bi-person-badge text-success me-2"></i>Borrower & Eligibility Details
                                    </h6>
                                    <div class="row g-2" style="font-size:12.5px;">
                                        <div class="col-6 text-muted">Employee Name:</div>
                                        <div class="col-6 fw-bold text-dark" id="dtEmpName">Amelia Curr</div>

                                        <div class="col-6 text-muted">Employee Code:</div>
                                        <div class="col-6 fw-bold text-dark" id="dtEmpCode">EMP0001</div>

                                        <div class="col-6 text-muted">Department:</div>
                                        <div class="col-6 fw-bold text-dark" id="dtEmpDept">Design</div>

                                        <div class="col-6 text-muted">Monthly Net Salary:</div>
                                        <div class="col-6 fw-bold text-dark" id="dtEmpSalary">₹75,000 / month</div>

                                        <div class="col-6 text-muted">Max Advance Limit:</div>
                                        <div class="col-6 fw-bold text-dark">₹1,50,000 (2x Monthly Net Salary)</div>

                                        <div class="col-6 text-muted">Disbursal Bank / Acc:</div>
                                        <div class="col-6 fw-bold text-dark">HDFC Bank ••••• 4920</div>

                                        <div class="col-6 text-muted">Purpose of Advance:</div>
                                        <div class="col-6 fw-semibold text-dark" id="dtPurpose">Personal emergency & home relocation support</div>

                                        <div class="col-6 text-muted">Guarantor / Approved By:</div>
                                        <div class="col-6 fw-bold text-success">HR Director & Finance Controller</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Action Shortcut Hub -->
                            <div class="col-12">
                                <div class="bg-white p-3 rounded border shadow-sm d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div>
                                        <h6 class="fw-bold mb-1 text-dark">Account Quick Shortcuts</h6>
                                        <span class="text-muted small">Switch directly into Amortization Schedule, Loan Ledger, or Post Repayments</span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="switchLoanModalTab('schedule');">
                                            <i class="bi bi-calendar3 me-1"></i> View EMI Schedule
                                        </button>
                                        <button type="button" class="btn btn-outline-success btn-sm" onclick="switchLoanModalTab('ledger');">
                                            <i class="bi bi-journal-text me-1"></i> Manage Loan Ledger
                                        </button>
                                        <button type="button" class="btn btn-outline-warning btn-sm text-dark" onclick="switchLoanModalTab('record-pay');">
                                            <i class="bi bi-plus-circle me-1"></i> + Record Payment
                                        </button>
                                        <button type="button" class="btn btn-outline-dark btn-sm" onclick="switchLoanModalTab('foreclosure');">
                                            <i class="bi bi-shield-check me-1"></i> Early Settlement
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PANE 2: EMI REPAYMENT SCHEDULE -->
                    <div class="tab-pane fade" id="pane-schedule" role="tabpanel">
                        <div class="bg-white p-3 rounded border shadow-sm">
                            <!-- Schedule Filter Pills & Toolbar -->
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                                <div class="d-flex align-items-center gap-2 modal-filter-pills" id="schedFilterPills">
                                    <button type="button" class="btn btn-filter-pill active" data-filter="all">All Installments (<span id="countSchedAll">12</span>)</button>
                                    <button type="button" class="btn btn-filter-pill" data-filter="deducted">Paid / Deducted (<span id="countSchedPaid">4</span>)</button>
                                    <button type="button" class="btn btn-filter-pill" data-filter="upcoming">Upcoming (<span id="countSchedUpcoming">1</span>)</button>
                                    <button type="button" class="btn btn-filter-pill" data-filter="scheduled">Scheduled (<span id="countSchedScheduled">7</span>)</button>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-success" id="btnExportScheduleCSV">
                                        <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export Schedule CSV
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print();">
                                        <i class="bi bi-printer me-1"></i> Print
                                    </button>
                                </div>
                            </div>

                            <!-- Schedule Table -->
                            <div class="schedule-table-wrap mb-3">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm text-center mb-0 schedule-table" style="font-size:12.5px;">
                                        <thead>
                                            <tr>
                                                <th>Inst. #</th>
                                                <th>Payroll Cycle</th>
                                                <th>Opening Balance</th>
                                                <th>Principal (₹)</th>
                                                <th>Interest (₹)</th>
                                                <th>EMI Amount (₹)</th>
                                                <th>Closing Balance</th>
                                                <th>Payment Mode</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="scheduleTableBody">
                                            <!-- Dynamically populated by JS -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Information Footnote -->
                            <div class="d-flex align-items-center gap-2 text-muted" style="font-size:12px;">
                                <i class="bi bi-info-circle text-primary"></i>
                                <span>Monthly installments are automatically debited from the salary payslip on the final calendar day of each pay period.</span>
                            </div>
                        </div>
                    </div>

                    <!-- PANE 3: MANAGE LOAN LEDGER -->
                    <div class="tab-pane fade" id="pane-ledger" role="tabpanel">
                        <div class="bg-white p-3 rounded border shadow-sm">
                            <!-- Sub Nav for History vs Manual Entry -->
                            <ul class="nav nav-pills mb-3" id="ledgerSubTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active btn-sm" id="ledger-history-tab" data-bs-toggle="pill" data-bs-target="#ledger-history" type="button" role="tab">
                                        <i class="bi bi-list-check me-1"></i> Transaction History Statements
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link btn-sm" id="ledger-entry-tab" data-bs-toggle="pill" data-bs-target="#ledger-entry" type="button" role="tab">
                                        <i class="bi bi-plus-circle me-1"></i> + Record Payment / Prepayment Entry
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content" id="ledgerSubTabContent">
                                <!-- Subtab 1: Transaction History -->
                                <div class="tab-pane fade show active" id="ledger-history" role="tabpanel">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                                        <div class="d-flex align-items-center gap-2 modal-filter-pills" id="ledgerFilterPills">
                                            <button type="button" class="btn btn-filter-pill active" data-filter="all">All Txns</button>
                                            <button type="button" class="btn btn-filter-pill" data-filter="payroll">Payroll Deductions</button>
                                            <button type="button" class="btn btn-filter-pill" data-filter="manual">Manual / Prepayments</button>
                                            <button type="button" class="btn btn-filter-pill" data-filter="disburse">Disbursements</button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" id="btnExportLedgerCSV">
                                                <i class="bi bi-download me-1"></i> Export Statement CSV
                                            </button>
                                        </div>
                                    </div>

                                    <div class="ledger-table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-sm text-center mb-0 ledger-table" style="font-size:12px;">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Txn Ref #</th>
                                                        <th>Type</th>
                                                        <th>Amount (₹)</th>
                                                        <th>Running Balance</th>
                                                        <th>Payment Mode</th>
                                                        <th>Processed By</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ledgerHistoryBody">
                                                    <!-- Dynamically populated by JS -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Subtab 2: Manual Repayment Entry -->
                                <div class="tab-pane fade" id="ledger-entry" role="tabpanel">
                                    <form id="ledgerPaymentForm" class="p-3 border rounded bg-light">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold" style="font-size:12px;">Payment Date *</label>
                                                <input type="date" class="form-control form-control-sm" id="ledgerPayDate" value="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <label class="form-label fw-bold mb-0" style="font-size:12px;">Amount (₹) *</label>
                                                    <div class="d-flex gap-1">
                                                        <button type="button" class="quick-amount-btn" id="btnQuickEmi">+1 EMI</button>
                                                        <button type="button" class="quick-amount-btn" id="btnQuickHalf">50% Bal</button>
                                                        <button type="button" class="quick-amount-btn" id="btnQuickFull">Full Bal</button>
                                                    </div>
                                                </div>
                                                <input type="number" class="form-control form-control-sm" id="ledgerPayAmount" placeholder="e.g. 10000" min="100" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-bold" style="font-size:12px;">Projected New Balance</label>
                                                <input type="text" class="form-control form-control-sm fw-bold text-success bg-white" id="ledgerProjectedBalance" readonly value="₹80,000">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" style="font-size:12px;">Transaction Type *</label>
                                                <select class="form-select form-select-sm" id="ledgerPayType" required>
                                                    <option value="Manual Partial Payment">Manual Partial Payment (Ad-hoc)</option>
                                                    <option value="Advance Prepayment">Advance Prepayment (EMI Reduction)</option>
                                                    <option value="Full Foreclosure">Full Foreclosure / Settlement</option>
                                                    <option value="Payroll Adjustment">Payroll Adjustment</option>
                                                    <option value="Interest Waiver">Interest / Penalty Waiver</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" style="font-size:12px;">Payment Mode / Channel *</label>
                                                <select class="form-select form-select-sm" id="ledgerPayMode" required>
                                                    <option value="UPI / GPay / PhonePe">UPI / Online Transfer</option>
                                                    <option value="NEFT / RTGS Bank Transfer">NEFT / RTGS Bank Transfer</option>
                                                    <option value="Payroll Auto-Debit">Payroll Salary Deduction</option>
                                                    <option value="Cash Receipt">Cash Receipt</option>
                                                    <option value="Cheque / DD">Cheque / Demand Draft</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" style="font-size:12px;">Transaction Reference / Receipt #</label>
                                                <input type="text" class="form-control form-control-sm" id="ledgerPayRef" placeholder="e.g. UPI-9384918239 or REC-10293">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold" style="font-size:12px;">Processed By / Admin Name</label>
                                                <input type="text" class="form-control form-control-sm" id="ledgerPayAdmin" value="Finance Admin">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size:12px;">Remarks / Note</label>
                                                <input type="text" class="form-control form-control-sm" id="ledgerPayRemarks" placeholder="e.g. Early prepayment from incentive/bonus payout">
                                            </div>

                                            <div class="col-12 text-end mt-3">
                                                <button type="button" class="btn btn-success btn-sm px-3" id="btnPostLedger">
                                                    <i class="bi bi-check-circle me-1"></i> Post Ledger Entry & Update Table
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PANE 4: FORECLOSURE & SETTLEMENT -->
                    <div class="tab-pane fade" id="pane-foreclosure" role="tabpanel">
                        <div class="bg-white p-3 rounded border shadow-sm">
                            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-shield-check text-primary me-2"></i>Full Foreclosure & Early Payoff Quote</h6>
                                    <span class="text-muted small">Instant one-click loan payoff & NOC completion</span>
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">0% Foreclosure Penalty</span>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <div class="p-3 border rounded bg-light">
                                        <span class="text-muted small d-block mb-1">Current Principal Balance</span>
                                        <h4 class="fw-bold text-dark mb-0" id="foreclosureBalDisplay">₹80,000</h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded bg-light">
                                        <span class="text-muted small d-block mb-1">Prepayment / Exit Fee</span>
                                        <h4 class="fw-bold text-success mb-0">₹0 (Nil)</h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded bg-light">
                                        <span class="text-muted small d-block mb-1">Net Payable for Full Closure</span>
                                        <h4 class="fw-bold text-primary mb-0" id="foreclosureTotalDisplay">₹80,000</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-info py-2 px-3 mb-3 d-flex align-items-center gap-2" style="font-size:12px;">
                                <i class="bi bi-info-circle-fill"></i>
                                <span>Once full settlement is processed, future payroll auto-debits will be stopped immediately and loan status will be marked as <strong>Completed / Settled</strong>.</span>
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-primary btn-sm" id="btnExecuteForeclosure">
                                    <i class="bi bi-check2-all me-1"></i> Settle & Close Loan Account Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-white justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <span class="text-muted small">Account ID: <strong id="hubFooterRef" class="text-dark">LN-2026-001</strong></span>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="window.print();">
                        <i class="bi bi-printer me-1"></i> Print Account Summary
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="./assets/js/tabel.js"></script>

<script src="./assets/js/pages/loan-requests.js?v=<?php echo time(); ?>"></script>
