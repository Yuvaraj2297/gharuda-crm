<?php include 'header.php'; ?>

 

<style>
    /* KPI Metric Cards */
    .loan-kpi {
        min-height: 112px;
        padding: 18px;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        background: var(--white);
        box-shadow: 0 4px 16px rgba(20, 30, 25, .04);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .loan-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(20, 30, 25, .08);
    }
    .loan-kpi .icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .loan-kpi .label {
        color: var(--ink-500);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 3px;
    }
    .loan-kpi .value {
        color: var(--ink-900);
        font-size: 22px;
        font-weight: 800;
    }
    .loan-kpi .sub {
        color: var(--ink-500);
        font-size: 11px;
        margin-top: 3px;
    }
    
    /* Status Badges */
    .ledger-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 99px;
        white-space: nowrap;
    }
    .ledger-badge.completed {
        color: #087a24;
        background: #e7f7eb;
        border: 1px solid #bbf7d0;
    }
    .ledger-badge.pending {
        color: #b56b00;
        background: #fff4d9;
        border: 1px solid #fed7aa;
    }

    /* Progress Stack */
    .loan-progress-stack {
        min-width: 130px;
    }
    .progress-bar-thin {
        height: 6px;
        border-radius: 999px;
        background: #edf1ee;
        overflow: hidden;
        margin-top: 5px;
    }
    .progress-bar-thin span {
        display: block;
        height: 100%;
        border-radius: inherit;
        background: var(--primary, #087a24);
        transition: width 0.4s ease;
    }
    .progress-bar-thin span.progress-pending {
        background: #f59e0b;
    }
    .progress-bar-thin span.progress-completed {
        background: #10b981;
    }

    /* Filter Pills */
    .filter-pills-wrap {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 4px;
        display: inline-flex;
        gap: 4px;
    }
    .filter-pill-btn {
        border: none;
        background: transparent;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
        padding: 7px 16px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all .2s ease;
    }
    .filter-pill-btn:hover {
        color: #1e293b;
        background: rgba(255,255,255,0.7);
    }
    .filter-pill-btn.active {
        background: #ffffff;
        color: var(--primary, #087a24);
        font-weight: 700;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .filter-pill-btn .pill-counter {
        font-size: 11px;
        padding: 2px 7px;
        border-radius: 99px;
        background: #e2e8f0;
        color: #475569;
    }
    .filter-pill-btn.active .pill-counter {
        background: #e7f7eb;
        color: #087a24;
    }
    .filter-pill-btn.pill-pending.active .pill-counter {
        background: #fef3c7;
        color: #b45309;
    }
    .filter-pill-btn.pill-completed.active .pill-counter {
        background: #dcfce7;
        color: #15803d;
    }

    /* Ultra-Professional Filter Deck */
    .filter-deck-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        margin-bottom: 24px;
        overflow: hidden;
        transition: all 0.25s ease;
    }
    .filter-deck-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid #e2e8f0;
        padding: 14px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }
    .filter-deck-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 700;
        color: #0f172a;
    }
    .filter-deck-title-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #e7f7eb;
        color: #087a24;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
    }
    .filter-deck-body {
        padding: 18px 20px;
    }
    
    /* Preset Filter Chips */
    .preset-chip-group {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        padding-bottom: 14px;
        margin-bottom: 16px;
        border-bottom: 1px dashed #e2e8f0;
    }
    .preset-chip-label {
        font-size: 11.5px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .preset-chip {
        font-size: 12px;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 99px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #475569;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .preset-chip:hover {
        background: #ffffff;
        border-color: #cbd5e1;
        color: #0f172a;
        transform: translateY(-1px);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
    }
    .preset-chip.active {
        background: #e7f7eb;
        border-color: #86efac;
        color: #087a24;
        font-weight: 700;
        box-shadow: 0 2px 6px rgba(8, 122, 36, 0.12);
    }

    /* Custom Filter Controls with icons */
    .filter-field-wrap {
        position: relative;
    }
    .filter-field-icon {
        position: absolute;
        left: 12px;
        top: 35px;
        color: #94a3b8;
        font-size: 13.5px;
        pointer-events: none;
        z-index: 2;
    }
    .filter-select-custom {
        padding-left: 34px !important;
        font-size: 12.5px;
        font-weight: 600;
        color: #1e293b;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        height: 38px;
        transition: all 0.2s ease;
        background-color: #ffffff;
    }
    .filter-select-custom:focus {
        border-color: #087a24;
        box-shadow: 0 0 0 3px rgba(8, 122, 36, 0.12);
    }
    .filter-select-custom.has-value {
        border-color: #86efac;
        background-color: #f6fdf8;
    }

    .form-label-filter {
        font-size: 11.5px;
        font-weight: 700;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin-bottom: 5px;
    }

    /* Active Filter Tags Bar */
    .active-tags-container {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        padding-top: 14px;
        margin-top: 14px;
        border-top: 1px solid #f1f5f9;
    }
    .active-filter-tag {
        font-size: 11.5px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 8px;
        background: #f1f5f9;
        color: #334155;
        border: 1px solid #e2e8f0;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        animation: tagPop .2s ease;
    }
    @keyframes tagPop {
        from { transform: scale(0.9); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
    .active-filter-tag .btn-remove-tag {
        border: none;
        background: transparent;
        color: #94a3b8;
        font-size: 13px;
        cursor: pointer;
        padding: 0;
        display: flex;
        align-items: center;
        line-height: 1;
    }
    .active-filter-tag .btn-remove-tag:hover {
        color: #ef4444;
    }
    .btn-clear-all-tags {
        font-size: 11.5px;
        font-weight: 700;
        color: #dc2626;
        text-decoration: none;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 6px;
        transition: background 0.15s ease;
    }
    .btn-clear-all-tags:hover {
        background: #fee2e2;
    }

    /* Statement Modal */
    .modal-hero-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-bottom: 1px solid #e2e8f0;
        padding: 20px 24px;
    }
</style>

<!-- Title Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Loan & Advance Ledger Report</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-bar-chart-line fs-6 text-success"></i>
            <span>Loan & Advances</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Deduction & Recovery Ledger</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <a href="loan-requests.php" class="btn btn-outline-success">
            <i class="bi bi-card-checklist me-1"></i> Loan Requests
        </a>
        <button class="btn btn-outline-secondary" onclick="window.print();">
            <i class="bi bi-printer me-1"></i> Print Statement
        </button>
        <button class="btn btn-primary" id="btnExportLedger" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export Excel
        </button>
    </div>
</div>

<!-- KPI Summary Cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="loan-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-cash-stack"></i></div>
            <div>
                <div class="label">Total Disbursed</div>
                <div class="value" id="kpiTotalDisbursed">₹24,50,000</div>
                <div class="sub">Life-to-date sanctioned sum</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="loan-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e9f7ec;color:#11872c;"><i class="bi bi-check2-all"></i></div>
            <div>
                <div class="label">Total Recovered</div>
                <div class="value" id="kpiTotalRecovered">₹13,25,000</div>
                <div class="sub"><span class="badge bg-success-subtle text-success fw-bold me-1">54.1%</span> Via payroll auto-deductions</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="loan-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="label">Pending Balance (To Recover)</div>
                <div class="value text-warning-emphasis" id="kpiPendingBalance">₹11,25,000</div>
                <div class="sub"><strong id="kpiPendingCount">12</strong> ongoing active employee accounts</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="loan-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0;"><i class="bi bi-patch-check-fill"></i></div>
            <div>
                <div class="label">Fully Settled Accounts</div>
                <div class="value text-success" id="kpiSettledCount">8 Accounts</div>
                <div class="sub"><strong id="kpiSettledAmount">₹8,20,000</strong> completely recovered</div>
            </div>
        </div>
    </div>
</div>

<!-- Ultra-Professional Ledger Filter Deck -->
<div class="filter-deck-card">
    <div class="filter-deck-header">
        <div class="filter-deck-title">
            <div class="filter-deck-title-icon">
                <i class="bi bi-sliders2-vertical"></i>
            </div>
            <div>
                <span class="d-block text-dark">Advanced Ledger Query & Filters</span>
                <span class="text-muted fw-normal" style="font-size:11.5px;">Filter by category, department, tenure, and repayment completion</span>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2 flex-wrap">
            <div class="filter-pills-wrap">
                <button type="button" class="filter-pill-btn active" data-status-filter="all" id="pillTabAll">
                    <i class="bi bi-grid-fill"></i> All Accounts
                    <span class="pill-counter" id="cntAll">20</span>
                </button>
                <button type="button" class="filter-pill-btn pill-pending" data-status-filter="Pending" id="pillTabPending">
                    <i class="bi bi-hourglass-split text-warning"></i> Pending Repayments
                    <span class="pill-counter" id="cntPending">12</span>
                </button>
                <button type="button" class="filter-pill-btn pill-completed" data-status-filter="Completed" id="pillTabCompleted">
                    <i class="bi bi-check-circle-fill text-success"></i> Fully Settled
                    <span class="pill-counter" id="cntCompleted">8</span>
                </button>
            </div>
        </div>
    </div>

    <div class="filter-deck-body">
        <!-- Quick Preset Filter Chips -->
        <div class="preset-chip-group">
            <span class="preset-chip-label"><i class="bi bi-lightning-charge-fill text-warning"></i> Quick Presets:</span>
            <button type="button" class="preset-chip" data-preset="high-balance">
                <i class="bi bi-cash text-danger"></i> High Balance (&ge; ₹1,00,000)
            </button>
            <button type="button" class="preset-chip" data-preset="near-complete">
                <i class="bi bi-pie-chart text-success"></i> Near Completion (&gt; 70%)
            </button>
            <button type="button" class="preset-chip" data-preset="salary-adv">
                <i class="bi bi-wallet2 text-warning"></i> Salary Advance
            </button>
            <button type="button" class="preset-chip" data-preset="medical">
                <i class="bi bi-heart-pulse text-danger"></i> Medical Assistance
            </button>
            <button type="button" class="preset-chip" data-preset="eng-dept">
                <i class="bi bi-code-slash text-primary"></i> Engineering
            </button>
            <button type="button" class="preset-chip" data-preset="long-tenure">
                <i class="bi bi-calendar-range text-info"></i> Long Tenure (&gt; 12 EMIs)
            </button>
        </div>

        <!-- 6-Column Filter Inputs Grid -->
        <div class="row g-3 align-items-end">
            <div class="col-lg-2 col-md-4 filter-field-wrap">
                <label class="form-label form-label-filter"><i class="bi bi-funnel me-1 text-muted"></i> Payment Status</label>
                <i class="bi bi-shield-check filter-field-icon"></i>
                <select class="form-select form-select-sm filter-select-custom" id="filterPaymentStatus">
                    <option value="all" selected>All Payment Statuses</option>
                    <option value="Pending">⏳ Pending Repayments</option>
                    <option value="Completed">✅ Fully Settled</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-4 filter-field-wrap">
                <label class="form-label form-label-filter"><i class="bi bi-tags me-1 text-muted"></i> Loan Category</label>
                <i class="bi bi-tag-fill filter-field-icon"></i>
                <select class="form-select form-select-sm filter-select-custom" id="filterLoanCategory">
                    <option value="all" selected>All Categories</option>
                    <option value="Personal Loan">Personal Loan</option>
                    <option value="Medical Assistance">Medical Assistance</option>
                    <option value="Education Support">Education Support</option>
                    <option value="Salary Advance">Salary Advance</option>
                    <option value="Home Loan">Home Loan Assistance</option>
                    <option value="Vehicle Loan">Vehicle Loan</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-4 filter-field-wrap">
                <label class="form-label form-label-filter"><i class="bi bi-pie-chart me-1 text-muted"></i> Progress</label>
                <i class="bi bi-pie-chart-fill filter-field-icon"></i>
                <select class="form-select form-select-sm filter-select-custom" id="filterRepaymentProgress">
                    <option value="all" selected>All Progress</option>
                    <option value="low">&lt; 30% Repaid</option>
                    <option value="mid">30% - 70% Repaid</option>
                    <option value="high">&gt; 70% Repaid</option>
                    <option value="full">100% Completed</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-4 filter-field-wrap">
                <label class="form-label form-label-filter"><i class="bi bi-building me-1 text-muted"></i> Department</label>
                <i class="bi bi-buildings-fill filter-field-icon"></i>
                <select class="form-select form-select-sm filter-select-custom" id="filterDepartment">
                    <option value="all" selected>All Departments</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Design">Design</option>
                    <option value="Finance">Finance</option>
                    <option value="Marketing">Marketing</option>
                    <option value="HR">HR</option>
                    <option value="Operations">Operations</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-4 filter-field-wrap">
                <label class="form-label form-label-filter"><i class="bi bi-person me-1 text-muted"></i> Employee Name</label>
                <i class="bi bi-person-fill filter-field-icon"></i>
                <select class="form-select form-select-sm filter-select-custom" id="filterEmployee">
                    <option value="all" selected>All Employees</option>
                    <option value="Salman">EMP0041 - Salman</option>
                    <option value="Thangamuniyandi">EMP0040 - Thangamuniyandi</option>
                    <option value="Arun Kumar">EMP0039 - Arun Kumar</option>
                    <option value="Mohammed Suhail">EMP0038 - Mohammed Suhail</option>
                    <option value="Rajeshwaran">EMP0037 - Rajeshwaran</option>
                    <option value="Subananthan">EMP0036 - Subananthan</option>
                    <option value="Jayaraj JR">EMP0035 - Jayaraj JR</option>
                    <option value="Krishna Moorthy">EMP0034 - Krishna Moorthy</option>
                    <option value="Amelia Curr">EMP0001 - Amelia Curr</option>
                    <option value="Daniel Martinez">EMP0002 - Daniel Martinez</option>
                    <option value="David Anderson">EMP0003 - David Anderson</option>
                    <option value="Emily Clark">EMP0004 - Emily Clark</option>
                    <option value="Sophia Johnson">EMP0005 - Sophia Johnson</option>
                    <option value="Michael Brown">EMP0006 - Michael Brown</option>
                    <option value="Olivia Wilson">EMP0007 - Olivia Wilson</option>
                    <option value="James Taylor">EMP0008 - James Taylor</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-4">
                <button type="button" class="btn btn-sm btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2" id="btnResetLoanFilters" style="height:38px; border-radius:10px; font-weight:600;">
                    <i class="bi bi-arrow-counterclockwise fs-6"></i> Reset Filters
                </button>
            </div>
        </div>

        <!-- Active Filter Tags Display Bar -->
        <div class="active-tags-container" id="activeTagsContainer" style="display:none;">
            <span class="text-muted fw-bold" style="font-size:11.5px;"><i class="bi bi-check2-circle text-success me-1"></i> Active Filters:</span>
            <div class="d-flex align-items-center gap-2 flex-wrap" id="activeTagsList">
                <!-- Tags generated dynamically -->
            </div>
            <button type="button" class="btn-clear-all-tags ms-auto" id="btnClearAllTags">
                <i class="bi bi-trash3 me-1"></i> Clear All
            </button>
        </div>
    </div>
</div>

<!-- Ledger Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="loan-recovery-ledger-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
            <span class="badge bg-light text-dark border px-2 py-1" style="font-size:12px;" id="activeFilterBadge">
                Showing: <strong>All 20 Records</strong>
            </span>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search employee name, code, loan ref..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="loanLedgerTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Ref #</th>
                    <th class="text-nowrap">Employee</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Disbursed (₹)</th>
                    <th class="text-nowrap">Recovered (₹)</th>
                    <th class="text-nowrap">Balance Due (₹)</th>
                    <th class="text-nowrap">Repayment Progress</th>
                    <th class="text-nowrap">EMI Tenure</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap text-end">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <!-- Row 1: Pending -->
                <tr data-status="Pending" data-category="Personal Loan" data-dept="Finance" data-progress="33" data-balance="80000" data-disbursed="120000" data-recovered="40000" data-emi="10000" data-tenure="4/12" data-ref="LN-2026-001" data-emp="Amelia Curr" data-empid="EMP0001">
                    <td>1</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-001</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#3b82f6;font-size:12px;">AC</div>
                            <div>
                                <div class="fw-bold text-dark">Amelia Curr</div>
                                <div class="text-muted" style="font-size:11px;">EMP0001</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-person me-1 text-primary"></i>Personal Loan</span></td>
                    <td class="text-muted">Finance</td>
                    <td class="fw-semibold text-dark">₹1,20,000</td>
                    <td class="fw-bold text-success">₹40,000</td>
                    <td class="fw-bold text-warning-emphasis">₹80,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">33.3%</span>
                                <span class="text-muted">₹80K Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 33.3%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">4 of 12 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 2: Pending -->
                <tr data-status="Pending" data-category="Medical Assistance" data-dept="Engineering" data-progress="33" data-balance="100000" data-disbursed="150000" data-recovered="50000" data-emi="8333" data-tenure="6/18" data-ref="LN-2026-004" data-emp="David Anderson" data-empid="EMP0003">
                    <td>2</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-004</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#ef4444;font-size:12px;">DA</div>
                            <div>
                                <div class="fw-bold text-dark">David Anderson</div>
                                <div class="text-muted" style="font-size:11px;">EMP0003</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-heart-pulse me-1 text-danger"></i>Medical Assistance</span></td>
                    <td class="text-muted">Engineering</td>
                    <td class="fw-semibold text-dark">₹1,50,000</td>
                    <td class="fw-bold text-success">₹50,000</td>
                    <td class="fw-bold text-warning-emphasis">₹1,00,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">33.3%</span>
                                <span class="text-muted">₹1.0L Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 33.3%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">6 of 18 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 3: Completed -->
                <tr data-status="Completed" data-category="Education Support" data-dept="Design" data-progress="100" data-balance="0" data-disbursed="120000" data-recovered="120000" data-emi="10000" data-tenure="12/12" data-ref="LN-2026-009" data-emp="Emily Clark" data-empid="EMP0004">
                    <td>3</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-009</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#10b981;font-size:12px;">EC</div>
                            <div>
                                <div class="fw-bold text-dark">Emily Clark</div>
                                <div class="text-muted" style="font-size:11px;">EMP0004</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-book me-1 text-info"></i>Education Support</span></td>
                    <td class="text-muted">Design</td>
                    <td class="fw-semibold text-dark">₹1,20,000</td>
                    <td class="fw-bold text-success">₹1,20,000</td>
                    <td class="fw-bold text-success">₹0</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-success">100%</span>
                                <span class="text-success fw-semibold">Cleared</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-completed" style="width: 100%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success-subtle text-success border">12 of 12 EMIs</span></td>
                    <td><span class="ledger-badge completed"><i class="bi bi-check-circle-fill"></i> Fully Settled</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 4: Pending -->
                <tr data-status="Pending" data-category="Personal Loan" data-dept="Engineering" data-progress="33" data-balance="100000" data-disbursed="150000" data-recovered="50000" data-emi="8333" data-tenure="6/18" data-ref="LN-2026-012" data-emp="Michael Brown" data-empid="EMP0006">
                    <td>4</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-012</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#6366f1;font-size:12px;">MB</div>
                            <div>
                                <div class="fw-bold text-dark">Michael Brown</div>
                                <div class="text-muted" style="font-size:11px;">EMP0006</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-person me-1 text-primary"></i>Personal Loan</span></td>
                    <td class="text-muted">Engineering</td>
                    <td class="fw-semibold text-dark">₹1,50,000</td>
                    <td class="fw-bold text-success">₹50,000</td>
                    <td class="fw-bold text-warning-emphasis">₹1,00,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">33.3%</span>
                                <span class="text-muted">₹1.0L Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 33.3%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">6 of 18 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 5: Completed -->
                <tr data-status="Completed" data-category="Salary Advance" data-dept="Marketing" data-progress="100" data-balance="0" data-disbursed="45000" data-recovered="45000" data-emi="15000" data-tenure="3/3" data-ref="ADV-2026-077" data-emp="James Taylor" data-empid="EMP0008">
                    <td>5</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">ADV-2026-077</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#f59e0b;font-size:12px;">JT</div>
                            <div>
                                <div class="fw-bold text-dark">James Taylor</div>
                                <div class="text-muted" style="font-size:11px;">EMP0008</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-wallet2 me-1 text-warning"></i>Salary Advance</span></td>
                    <td class="text-muted">Marketing</td>
                    <td class="fw-semibold text-dark">₹45,000</td>
                    <td class="fw-bold text-success">₹45,000</td>
                    <td class="fw-bold text-success">₹0</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-success">100%</span>
                                <span class="text-success fw-semibold">Cleared</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-completed" style="width: 100%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success-subtle text-success border">3 of 3 EMIs</span></td>
                    <td><span class="ledger-badge completed"><i class="bi bi-check-circle-fill"></i> Fully Settled</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 6: Pending -->
                <tr data-status="Pending" data-category="Home Loan" data-dept="Engineering" data-progress="25" data-balance="225000" data-disbursed="300000" data-recovered="75000" data-emi="12500" data-tenure="6/24" data-ref="LN-2026-015" data-emp="Sarah Jenkins" data-empid="EMP0012">
                    <td>6</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-015</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#ec4899;font-size:12px;">SJ</div>
                            <div>
                                <div class="fw-bold text-dark">Sarah Jenkins</div>
                                <div class="text-muted" style="font-size:11px;">EMP0012</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-house me-1 text-primary"></i>Home Loan</span></td>
                    <td class="text-muted">Engineering</td>
                    <td class="fw-semibold text-dark">₹3,00,000</td>
                    <td class="fw-bold text-success">₹75,000</td>
                    <td class="fw-bold text-warning-emphasis">₹2,25,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">25.0%</span>
                                <span class="text-muted">₹2.25L Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 25%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">6 of 24 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 7: Completed -->
                <tr data-status="Completed" data-category="Personal Loan" data-dept="Finance" data-progress="100" data-balance="0" data-disbursed="100000" data-recovered="100000" data-emi="10000" data-tenure="10/10" data-ref="LN-2026-003" data-emp="Robert Wilson" data-empid="EMP0009">
                    <td>7</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-003</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#8b5cf6;font-size:12px;">RW</div>
                            <div>
                                <div class="fw-bold text-dark">Robert Wilson</div>
                                <div class="text-muted" style="font-size:11px;">EMP0009</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-person me-1 text-primary"></i>Personal Loan</span></td>
                    <td class="text-muted">Finance</td>
                    <td class="fw-semibold text-dark">₹1,00,000</td>
                    <td class="fw-bold text-success">₹1,00,000</td>
                    <td class="fw-bold text-success">₹0</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-success">100%</span>
                                <span class="text-success fw-semibold">Cleared</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-completed" style="width: 100%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success-subtle text-success border">10 of 10 EMIs</span></td>
                    <td><span class="ledger-badge completed"><i class="bi bi-check-circle-fill"></i> Fully Settled</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 8: Pending -->
                <tr data-status="Pending" data-category="Vehicle Loan" data-dept="Operations" data-progress="75" data-balance="50000" data-disbursed="200000" data-recovered="150000" data-emi="8333" data-tenure="18/24" data-ref="LN-2026-018" data-emp="Rajesh Kumar" data-empid="EMP0015">
                    <td>8</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-018</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#0ea5e9;font-size:12px;">RK</div>
                            <div>
                                <div class="fw-bold text-dark">Rajesh Kumar</div>
                                <div class="text-muted" style="font-size:11px;">EMP0015</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-car-front me-1 text-primary"></i>Vehicle Loan</span></td>
                    <td class="text-muted">Operations</td>
                    <td class="fw-semibold text-dark">₹2,00,000</td>
                    <td class="fw-bold text-success">₹1,50,000</td>
                    <td class="fw-bold text-warning-emphasis">₹50,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">75.0%</span>
                                <span class="text-muted">₹50K Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 75%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">18 of 24 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 9: Completed -->
                <tr data-status="Completed" data-category="Medical Assistance" data-dept="Design" data-progress="100" data-balance="0" data-disbursed="75000" data-recovered="75000" data-emi="12500" data-tenure="6/6" data-ref="LN-2026-006" data-emp="Kavitha Raman" data-empid="EMP0011">
                    <td>9</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-006</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#14b8a6;font-size:12px;">KR</div>
                            <div>
                                <div class="fw-bold text-dark">Kavitha Raman</div>
                                <div class="text-muted" style="font-size:11px;">EMP0011</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-heart-pulse me-1 text-danger"></i>Medical Assistance</span></td>
                    <td class="text-muted">Design</td>
                    <td class="fw-semibold text-dark">₹75,000</td>
                    <td class="fw-bold text-success">₹75,000</td>
                    <td class="fw-bold text-success">₹0</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-success">100%</span>
                                <span class="text-success fw-semibold">Cleared</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-completed" style="width: 100%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success-subtle text-success border">6 of 6 EMIs</span></td>
                    <td><span class="ledger-badge completed"><i class="bi bi-check-circle-fill"></i> Fully Settled</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 10: Pending -->
                <tr data-status="Pending" data-category="Salary Advance" data-dept="HR" data-progress="50" data-balance="20000" data-disbursed="40000" data-recovered="20000" data-emi="10000" data-tenure="2/4" data-ref="ADV-2026-081" data-emp="Ananya Sharma" data-empid="EMP0018">
                    <td>10</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">ADV-2026-081</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#a855f7;font-size:12px;">AS</div>
                            <div>
                                <div class="fw-bold text-dark">Ananya Sharma</div>
                                <div class="text-muted" style="font-size:11px;">EMP0018</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-wallet2 me-1 text-warning"></i>Salary Advance</span></td>
                    <td class="text-muted">HR</td>
                    <td class="fw-semibold text-dark">₹40,000</td>
                    <td class="fw-bold text-success">₹20,000</td>
                    <td class="fw-bold text-warning-emphasis">₹20,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">50.0%</span>
                                <span class="text-muted">₹20K Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 50%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">2 of 4 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 11: Pending -->
                <tr data-status="Pending" data-category="Education Support" data-dept="Engineering" data-progress="67" data-balance="60000" data-disbursed="180000" data-recovered="120000" data-emi="10000" data-tenure="12/18" data-ref="LN-2026-022" data-emp="Vikram Sethi" data-empid="EMP0021">
                    <td>11</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-022</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#f97316;font-size:12px;">VS</div>
                            <div>
                                <div class="fw-bold text-dark">Vikram Sethi</div>
                                <div class="text-muted" style="font-size:11px;">EMP0021</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-book me-1 text-info"></i>Education Support</span></td>
                    <td class="text-muted">Engineering</td>
                    <td class="fw-semibold text-dark">₹1,80,000</td>
                    <td class="fw-bold text-success">₹1,20,000</td>
                    <td class="fw-bold text-warning-emphasis">₹60,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">66.7%</span>
                                <span class="text-muted">₹60K Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 66.7%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">12 of 18 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 12: Completed -->
                <tr data-status="Completed" data-category="Salary Advance" data-dept="Operations" data-progress="100" data-balance="0" data-disbursed="30000" data-recovered="30000" data-emi="15000" data-tenure="2/2" data-ref="ADV-2026-083" data-emp="Siddharth Nair" data-empid="EMP0014">
                    <td>12</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">ADV-2026-083</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#64748b;font-size:12px;">SN</div>
                            <div>
                                <div class="fw-bold text-dark">Siddharth Nair</div>
                                <div class="text-muted" style="font-size:11px;">EMP0014</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-wallet2 me-1 text-warning"></i>Salary Advance</span></td>
                    <td class="text-muted">Operations</td>
                    <td class="fw-semibold text-dark">₹30,000</td>
                    <td class="fw-bold text-success">₹30,000</td>
                    <td class="fw-bold text-success">₹0</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-success">100%</span>
                                <span class="text-success fw-semibold">Cleared</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-completed" style="width: 100%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success-subtle text-success border">2 of 2 EMIs</span></td>
                    <td><span class="ledger-badge completed"><i class="bi bi-check-circle-fill"></i> Fully Settled</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 13: Pending -->
                <tr data-status="Pending" data-category="Medical Assistance" data-dept="Finance" data-progress="75" data-balance="20000" data-disbursed="80000" data-recovered="60000" data-emi="10000" data-tenure="6/8" data-ref="LN-2026-027" data-emp="Priya Patel" data-empid="EMP0025">
                    <td>13</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-027</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#ec4899;font-size:12px;">PP</div>
                            <div>
                                <div class="fw-bold text-dark">Priya Patel</div>
                                <div class="text-muted" style="font-size:11px;">EMP0025</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-heart-pulse me-1 text-danger"></i>Medical Assistance</span></td>
                    <td class="text-muted">Finance</td>
                    <td class="fw-semibold text-dark">₹80,000</td>
                    <td class="fw-bold text-success">₹60,000</td>
                    <td class="fw-bold text-warning-emphasis">₹20,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">75.0%</span>
                                <span class="text-muted">₹20K Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 75%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">6 of 8 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 14: Completed -->
                <tr data-status="Completed" data-category="Education Support" data-dept="Marketing" data-progress="100" data-balance="0" data-disbursed="150000" data-recovered="150000" data-emi="10000" data-tenure="15/15" data-ref="LN-2026-008" data-emp="Meera Joseph" data-empid="EMP0019">
                    <td>14</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-008</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#0284c7;font-size:12px;">MJ</div>
                            <div>
                                <div class="fw-bold text-dark">Meera Joseph</div>
                                <div class="text-muted" style="font-size:11px;">EMP0019</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-book me-1 text-info"></i>Education Support</span></td>
                    <td class="text-muted">Marketing</td>
                    <td class="fw-semibold text-dark">₹1,50,000</td>
                    <td class="fw-bold text-success">₹1,50,000</td>
                    <td class="fw-bold text-success">₹0</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-success">100%</span>
                                <span class="text-success fw-semibold">Cleared</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-completed" style="width: 100%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success-subtle text-success border">15 of 15 EMIs</span></td>
                    <td><span class="ledger-badge completed"><i class="bi bi-check-circle-fill"></i> Fully Settled</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 15: Pending -->
                <tr data-status="Pending" data-category="Personal Loan" data-dept="Design" data-progress="25" data-balance="75000" data-disbursed="100000" data-recovered="25000" data-emi="8333" data-tenure="3/12" data-ref="LN-2026-031" data-emp="Karthik Raja" data-empid="EMP0028">
                    <td>15</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-031</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#e11d48;font-size:12px;">KR</div>
                            <div>
                                <div class="fw-bold text-dark">Karthik Raja</div>
                                <div class="text-muted" style="font-size:11px;">EMP0028</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-person me-1 text-primary"></i>Personal Loan</span></td>
                    <td class="text-muted">Design</td>
                    <td class="fw-semibold text-dark">₹1,00,000</td>
                    <td class="fw-bold text-success">₹25,000</td>
                    <td class="fw-bold text-warning-emphasis">₹75,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">25.0%</span>
                                <span class="text-muted">₹75K Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 25%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">3 of 12 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 16: Completed -->
                <tr data-status="Completed" data-category="Personal Loan" data-dept="HR" data-progress="100" data-balance="0" data-disbursed="90000" data-recovered="90000" data-emi="10000" data-tenure="9/9" data-ref="LN-2026-010" data-emp="Deepak Varma" data-empid="EMP0022">
                    <td>16</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-010</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#475569;font-size:12px;">DV</div>
                            <div>
                                <div class="fw-bold text-dark">Deepak Varma</div>
                                <div class="text-muted" style="font-size:11px;">EMP0022</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-person me-1 text-primary"></i>Personal Loan</span></td>
                    <td class="text-muted">HR</td>
                    <td class="fw-semibold text-dark">₹90,000</td>
                    <td class="fw-bold text-success">₹90,000</td>
                    <td class="fw-bold text-success">₹0</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-success">100%</span>
                                <span class="text-success fw-semibold">Cleared</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-completed" style="width: 100%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success-subtle text-success border">9 of 9 EMIs</span></td>
                    <td><span class="ledger-badge completed"><i class="bi bi-check-circle-fill"></i> Fully Settled</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 17: Pending -->
                <tr data-status="Pending" data-category="Salary Advance" data-dept="Finance" data-progress="75" data-balance="12500" data-disbursed="50000" data-recovered="37500" data-emi="12500" data-tenure="3/4" data-ref="ADV-2026-089" data-emp="Divya Nair" data-empid="EMP0032">
                    <td>17</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">ADV-2026-089</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#065f46;font-size:12px;">DN</div>
                            <div>
                                <div class="fw-bold text-dark">Divya Nair</div>
                                <div class="text-muted" style="font-size:11px;">EMP0032</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-wallet2 me-1 text-warning"></i>Salary Advance</span></td>
                    <td class="text-muted">Finance</td>
                    <td class="fw-semibold text-dark">₹50,000</td>
                    <td class="fw-bold text-success">₹37,500</td>
                    <td class="fw-bold text-warning-emphasis">₹12,500</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">75.0%</span>
                                <span class="text-muted">₹12.5K Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 75%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">3 of 4 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 18: Completed -->
                <tr data-status="Completed" data-category="Vehicle Loan" data-dept="Operations" data-progress="100" data-balance="0" data-disbursed="140000" data-recovered="140000" data-emi="10000" data-tenure="14/14" data-ref="LN-2026-014" data-emp="Shalini Menon" data-empid="EMP0030">
                    <td>18</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-014</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#be123c;font-size:12px;">SM</div>
                            <div>
                                <div class="fw-bold text-dark">Shalini Menon</div>
                                <div class="text-muted" style="font-size:11px;">EMP0030</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-car-front me-1 text-primary"></i>Vehicle Loan</span></td>
                    <td class="text-muted">Operations</td>
                    <td class="fw-semibold text-dark">₹1,40,000</td>
                    <td class="fw-bold text-success">₹1,40,000</td>
                    <td class="fw-bold text-success">₹0</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-success">100%</span>
                                <span class="text-success fw-semibold">Cleared</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-completed" style="width: 100%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success-subtle text-success border">14 of 14 EMIs</span></td>
                    <td><span class="ledger-badge completed"><i class="bi bi-check-circle-fill"></i> Fully Settled</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 19: Pending -->
                <tr data-status="Pending" data-category="Home Loan" data-dept="Engineering" data-progress="40" data-balance="150000" data-disbursed="250000" data-recovered="100000" data-emi="10416" data-tenure="10/24" data-ref="LN-2026-035" data-emp="Arunachalam V" data-empid="EMP0035">
                    <td>19</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-035</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#4338ca;font-size:12px;">AV</div>
                            <div>
                                <div class="fw-bold text-dark">Arunachalam V</div>
                                <div class="text-muted" style="font-size:11px;">EMP0035</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-house me-1 text-primary"></i>Home Loan</span></td>
                    <td class="text-muted">Engineering</td>
                    <td class="fw-semibold text-dark">₹2,50,000</td>
                    <td class="fw-bold text-success">₹1,00,000</td>
                    <td class="fw-bold text-warning-emphasis">₹1,50,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">40.0%</span>
                                <span class="text-muted">₹1.50L Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 40%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">10 of 24 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
                    </td>
                </tr>

                <!-- Row 20: Pending -->
                <tr data-status="Pending" data-category="Vehicle Loan" data-dept="Marketing" data-progress="25" data-balance="120000" data-disbursed="160000" data-recovered="40000" data-emi="10000" data-tenure="4/16" data-ref="LN-2026-040" data-emp="Sneha Reddy" data-empid="EMP0040">
                    <td>20</td>
                    <td class="fw-bold" style="color:var(--primary-dark);">LN-2026-040</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#c2410c;font-size:12px;">SR</div>
                            <div>
                                <div class="fw-bold text-dark">Sneha Reddy</div>
                                <div class="text-muted" style="font-size:11px;">EMP0040</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border"><i class="bi bi-car-front me-1 text-primary"></i>Vehicle Loan</span></td>
                    <td class="text-muted">Marketing</td>
                    <td class="fw-semibold text-dark">₹1,60,000</td>
                    <td class="fw-bold text-success">₹40,000</td>
                    <td class="fw-bold text-warning-emphasis">₹1,20,000</td>
                    <td>
                        <div class="loan-progress-stack">
                            <div class="d-flex justify-content-between small" style="font-size:11px;">
                                <span class="fw-bold text-dark">25.0%</span>
                                <span class="text-muted">₹1.20L Left</span>
                            </div>
                            <div class="progress-bar-thin"><span class="progress-pending" style="width: 25%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">4 of 16 EMIs</span></td>
                    <td><span class="ledger-badge pending"><i class="bi bi-hourglass-split"></i> Pending Repayment</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-statement" data-bs-toggle="tooltip" title="View Repayment Statement">
                            <i class="bi bi-file-earmark-text"></i> Statement
                        </button>
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
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">10</strong> of <strong id="pgTotal">20</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal: Repayment Schedule & Statement Breakdown -->
<div class="modal fade" id="loanStatementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header modal-hero-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-receipt-cutoff"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0" id="stmtModalTitle">Loan Recovery Statement</h4>
                        <div class="text-muted" style="font-size:13px;" id="stmtModalSubtitle">Detailed monthly recovery ledger and payroll deductions</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-4 bg-light">
                <!-- Loan Summary Card -->
                <div class="card p-3 border-0 shadow-sm rounded-3 mb-3 bg-white">
                    <div class="row g-3" style="font-size:13px;">
                        <div class="col-md-3">
                            <span class="text-muted d-block small">Employee Name</span>
                            <strong class="text-dark" id="stmtEmpName">Amelia Curr</strong>
                            <div class="text-muted small" id="stmtEmpId">EMP0001</div>
                        </div>
                        <div class="col-md-3">
                            <span class="text-muted d-block small">Loan Reference</span>
                            <strong class="text-primary" id="stmtLoanRef">LN-2026-001</strong>
                            <div class="text-muted small" id="stmtLoanCat">Personal Loan</div>
                        </div>
                        <div class="col-md-3">
                            <span class="text-muted d-block small">Total Disbursed</span>
                            <strong class="text-dark fs-6" id="stmtDisbursed">₹1,20,000</strong>
                            <div class="text-success small fw-semibold" id="stmtRecovered">Recovered: ₹40,000</div>
                        </div>
                        <div class="col-md-3">
                            <span class="text-muted d-block small">Balance Due</span>
                            <strong class="text-warning-emphasis fs-6" id="stmtBalance">₹80,000</strong>
                            <div id="stmtStatusBadge"></div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Deductions Table -->
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white">
                    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-clock-history text-success me-2"></i>Deduction Schedule History</h6>
                        <span class="badge bg-light text-muted border" id="stmtTenureInfo">4 of 12 EMIs Cleared</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0" style="font-size:12.5px;">
                            <thead class="table-light">
                                <tr>
                                    <th>EMI #</th>
                                    <th>Payroll Month</th>
                                    <th>Principal Recovered</th>
                                    <th>Monthly EMI</th>
                                    <th>Remaining Balance</th>
                                    <th class="text-end">Recovery State</th>
                                </tr>
                            </thead>
                            <tbody id="stmtScheduleBody">
                                <!-- Populated dynamically by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer border-0 bg-white">
                <button type="button" class="btn btn-outline-secondary" onclick="window.print();">
                    <i class="bi bi-printer me-1"></i> Print Statement
                </button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Global Filter Definition for tabel.js -->


<script src="./assets/js/tabel.js"></script>

<script src="./assets/js/pages/loan-report.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
