<?php include 'header.php'; ?>

 

<style>
    /* ===== Active Filters Bar ===== */
    .active-filters-bar {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        background: #fff;
        border: 1px solid var(--ink-100, #eef0f3);
        border-radius: 14px;
        padding: 0 14px;
        margin-bottom: 0;
        box-shadow: 0 2px 10px rgba(20, 20, 43, 0.04);

        max-height: 0;
        opacity: 0;
        overflow: hidden;
        border-width: 0;
        transform: translateY(-6px);
        transition: max-height 0.4s cubic-bezier(.4, 0, .2, 1),
            opacity 0.3s ease,
            transform 0.35s cubic-bezier(.34, 1.2, .64, 1),
            padding 0.4s ease,
            margin 0.4s ease,
            border-width 0.3s ease;
    }

    .active-filters-bar.show {
        max-height: 200px;
        opacity: 1;
        padding: 12px 14px;
        margin-bottom: 12px;
        border-width: 1px;
        transform: translateY(0);
    }

    .active-filters-label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-500, #7a7f8c);
        white-space: nowrap;
        margin-right: 2px;
    }

    .filter-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--primary-light, #e8f7ea);
        color: var(--primary-dark, #0ca308);
        font-size: 12.5px;
        font-weight: 600;
        padding: 6px 8px 6px 12px;
        border-radius: 999px;
        opacity: 0;
        transform: translateY(-8px) scale(0.92);
        animation: chipIn 0.35s cubic-bezier(.34, 1.56, .64, 1) forwards;
    }

    @keyframes chipIn {
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .filter-chip .chip-key {
        font-weight: 500;
        color: var(--ink-500, #7a7f8c);
    }

    .filter-chip .chip-close {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.06);
        color: inherit;
        cursor: pointer;
        border: none;
        font-size: 11px;
        line-height: 1;
        transition: background 0.15s ease, transform 0.15s ease;
    }

    .filter-chip .chip-close:hover {
        background: rgba(0, 0, 0, 0.14);
        transform: rotate(90deg);
    }

    .filter-chip.removing {
        animation: chipOut 0.25s ease forwards;
    }

    @keyframes chipOut {
        to {
            opacity: 0;
            transform: translateY(-6px) scale(0.9);
            margin: 0 -100px 0 0;
            padding: 0;
            width: 0;
        }
    }

    .active-filters-clear {
        margin-left: auto;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--accent-red, #e5484d);
        background: transparent;
        border: none;
        cursor: pointer;
        white-space: nowrap;
    }

    .active-filters-clear:hover {
        text-decoration: underline;
    }

    .filters-card {
        position: relative;
        z-index: 50;
    }

    .filters-toggle-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .filters-toggle-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--primary-light, #e8f7ea);
        color: var(--primary-dark, #0ca308);
        border: none;
        font-weight: 600;
        font-size: 13.5px;
        padding: 9px 16px;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .filters-toggle-btn:hover {
        background: #d7f0da;
    }

    .filters-toggle-btn .chevron {
        transition: transform 0.35s cubic-bezier(.4, 0, .2, 1);
        font-size: 12px;
    }

    .filters-toggle-btn.open .chevron {
        transform: rotate(180deg);
    }

    .filters-collapse {
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transform: translateY(-8px);
        transition: max-height 0.45s cubic-bezier(.4, 0, .2, 1),
            opacity 0.35s ease,
            transform 0.4s cubic-bezier(.34, 1.1, .64, 1),
            margin 0.45s ease;
        margin-top: 0;
    }

    .filters-collapse.open {
        max-height: 600px;
        opacity: 1;
        transform: translateY(0);
        margin-top: 16px;
    }

    .filters-collapse .row>div {
        opacity: 0;
        transform: translateY(-6px);
    }

    .filters-collapse.open .row>div {
        animation: fieldIn 0.35s ease forwards;
    }

    .filters-collapse.open .row>div:nth-child(1) {
        animation-delay: 0.03s;
    }

    .filters-collapse.open .row>div:nth-child(2) {
        animation-delay: 0.06s;
    }

    .filters-collapse.open .row>div:nth-child(3) {
        animation-delay: 0.09s;
    }

    .filters-collapse.open .row>div:nth-child(4) {
        animation-delay: 0.12s;
    }

    .filters-collapse.open .row>div:nth-child(5) {
        animation-delay: 0.15s;
    }

    .filters-collapse.open .row>div:nth-child(6) {
        animation-delay: 0.18s;
    }
</style>



<style>
    .payroll-kpi {
        min-height: 112px;
        padding: 18px;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        background: var(--white);
        box-shadow: 0 4px 16px rgba(20, 30, 25, .04);
    }

    .payroll-kpi .icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 18px;
    }

    .payroll-kpi .label {
        color: var(--ink-500);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 3px;
    }

    .payroll-kpi .value {
        color: var(--ink-900);
        font-size: 20px;
        font-weight: 800;
    }

    .payroll-kpi .sub {
        color: var(--ink-500);
        font-size: 11px;
        margin-top: 3px;
    }

    .payroll-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border-radius: 99px;
        padding: 5px 10px;
        font-size: 11px;
        font-weight: 800;
    }

    .payroll-status i {
        font-size: 8px;
    }

    .payroll-status.paid {
        color: #087a24;
        background: #e7f7eb;
    }

    .payroll-status.processing {
        color: #9a6200;
        background: #fff4d9;
    }

    .payroll-status.hold {
        color: #be3035;
        background: #fdebed;
    }

    .payroll-status.draft {
        color: #6b7280;
        background: #f3f4f6;
    }

    .salary-stack {
        min-width: 145px;
    }

    .salary-stack .amount {
        font-weight: 800;
        color: var(--ink-900);
    }

    .salary-stack .bar {
        height: 5px;
        margin-top: 6px;
        overflow: hidden;
        border-radius: 999px;
        background: #edf1ee;
    }

    .salary-stack .bar span {
        display: block;
        height: 100%;
        border-radius: inherit;
        background: var(--primary);
    }
    /* Earning/Deduction column headers */
    .earning-col-th {
        /* background: var(--primary-light) !important; */
        /* color: var(--primary-dark) !important; */
        border-bottom:1px solid #fff !important;
        font-weight: 700 !important;
    }
    .earning-col-th span:first-child {
        width: 100%;
    }
    .deduction-col-th {
        /* background: #fdebed !important; */
        /* color: #be3035 !important; */
        border-bottom:1px solid #fff !important;
        font-weight: 700 !important;
    }
    .deduction-col-th span:first-child {
        width: 100%;
    }

    /* ===== Reusable Classes ===== */
    .page-title { font-size: 1.7rem; }
    .breadcrumb-nav { font-size: 13px; }
    .kpi-icon { width: 42px; height: 42px; border-radius: 12px; display: grid; place-items: center; font-size: 18px; }
    .kpi-icon-green { background: #e9f7ec; color: #11872c; }
    .kpi-icon-blue { background: #eaf1ff; color: #3564e0; }
    .kpi-icon-amber { background: #fff3dc; color: #b56b00; }
    .kpi-icon-red { background: #fcebed; color: #d5474e; }
    .filter-title-text { font-size: 14.5px; color: var(--ink-900); }
    .edit-modal-content { border-radius: 16px; border: none; overflow: hidden; }
    /* .edit-modal-header { background: linear-gradient(135deg, var(--primary), #0e7c3a); color: #fff; padding: 18px 24px; border: none; } */
    .edit-modal-title { font-size: 16px; }
    .edit-modal-subtitle { font-size: 12px; opacity: .85; }
    .edit-modal-body { padding: 24px; }
    .edit-modal-footer { padding: 16px 24px; border-top: 1px solid var(--border-soft); }
    .section-heading { display: flex; align-items: center; gap: 8px; margin-bottom: 4px; }
    .section-heading-icon { font-size: 14px; }
    .section-heading-icon-green { color: var(--primary); }
    .section-heading-icon-red { color: var(--accent-red); }
    .section-heading-text { font-size: 13px; font-weight: 700; color: var(--ink-900); }
    .input-prefix { border-radius: 10px 0 0 10px; font-weight: 700; font-size: 13px; border-color: var(--border-soft); }
    .input-prefix-green { background: var(--primary-light); color: var(--primary-dark); }
    .input-prefix-red { background: #fdebed; color: #be3035; }
    .form-input { border-radius: 0 10px 10px 0; font-size: 13px; }
    .form-label-sm { font-size: 12px; }
    .net-pay-box { padding: 10px; background: var(--primary-light); border-radius: 10px; text-align: center;width:100%; }
    .net-pay-label { font-size: 11px; font-weight: 600; color: var(--ink-500); }
    .net-pay-value { font-size: 18px; font-weight: 800; color: var(--primary-dark); }
    .divider { border-color: var(--border-soft); margin-top: 4px; }
    .modal-close-btn { border: none; background: rgba(255,255,255,.2); color: #fff; font-size: 18px; width: 32px; height: 32px; border-radius: 8px; display: grid; place-items: center; cursor: pointer; transition: background .15s; }
    .modal-close-btn:hover { background: rgba(255,255,255,.35); }

    /* ===== Extracted inline styles ===== */
    .rp-rounded-btn { border-radius: 10px; font-weight: 700; }
    .rp-modal-content { border-radius: 18px; border: none; overflow: hidden; }
    .rp-modal-head { padding: 28px 28px 0; text-align: center; }
    .rp-modal-body-center { padding: 28px; text-align: center; }
    .rp-icon-circle { width: 64px; height: 64px; border-radius: 50%; background: var(--primary-light); display: inline-flex; align-items: center; justify-content: center; margin-bottom: 14px; }
    .rp-icon-28 { font-size: 28px; color: var(--primary); }
    .rp-icon-32 { font-size: 32px; color: var(--primary); }
    .rp-modal-title { font-size: 18px; }
    .rp-modal-sub { font-size: 13px; }
    .rp-select-full { width: 100%; }
    .rp-select-r10 { border-radius: 10px; font-size: 13px; }
    .rp-summary-box { background: var(--primary-light); border-radius: 12px; padding: 16px; margin-bottom: 14px; }
    .rp-summary-key { font-size: 13px; font-weight: 600; color: var(--ink-500); }
    .rp-summary-val { font-size: 13px; font-weight: 700; color: var(--ink-900); }
    .rp-summary-val-red { font-size: 13px; font-weight: 700; color: var(--accent-red); }
    .rp-info-box { background: #f8f9fa; border-radius: 10px; padding: 12px 14px; display: flex; align-items: center; gap: 10px; }
    .rp-info-box-wide { width: 100%; }
    .rp-info-ico { color: var(--ink-500); font-size: 16px; }
    .rp-info-text { font-size: 12px; color: var(--ink-500); }
    .rp-modal-foot { padding: 0 28px 24px; display: flex; gap: 10px; }
    .rp-modal-foot-center { padding: 0 28px 24px; display: flex; gap: 10px; justify-content: center; }
    .rp-progress-track { height: 6px; background: #eef0f3; border-radius: 999px; overflow: hidden; margin-bottom: 8px; }
    .rp-progress-fill { height: 100%; width: 0%; background: var(--primary); border-radius: 999px; transition: width .3s ease; }
    .rp-progress-pct { font-size: 12px; font-weight: 600; color: var(--ink-500); }
    .rp-spinner { width: 36px; height: 36px; border: 3px solid var(--border-soft); border-top-color: var(--primary); border-radius: 50%; animation: spin 1s linear infinite; }
    .rp-btn-wide { border-radius: 10px; padding: 10px 28px; }
    .rp-section-label { font-size: 12.5px; font-weight: 700; color: var(--ink-500); }
    .rp-netpay-fill { height: 100%; display: flex; flex-direction: column; justify-content: center; }
    .input-suffix { border-radius: 0 10px 10px 0; font-size: 11px; }
    /* Show/hide toggle — used by this page and by assets/js/payroll.js (as-wizard buttons) */
    .rp-hidden { display: none !important; }
</style>

<!-- Page header -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1 page-title">Payroll Processing</h1>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary px-4 py-2 rp-rounded-btn" type="button" id="runPayrollTopBtn">
            <i class="bi bi-play-circle-fill me-1"></i> Run Payroll
        </button>
        <button class="btn btn-outline-primary" type="button" id="addSalaryBtn"><i class="bi bi-plus-circle me-1"></i> Add Salary Structure</button>
</div>
</div>

<!-- KPI cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="payroll-kpi d-flex align-items-center gap-3">
            <div class="icon kpi-icon kpi-icon-green"><i class="bi bi-people"></i></div>
            <div>
                <div class="label">Employees Processed</div>
                <div class="value">186</div>
                <div class="sub">of 198 active employees</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="payroll-kpi d-flex align-items-center gap-3">
            <div class="icon kpi-icon kpi-icon-blue"><i class="bi bi-wallet2"></i></div>
            <div>
                <div class="label">Gross Payroll</div>
                <div class="value">₹24.86L</div>
                <div class="sub">August 2026 cycle</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="payroll-kpi d-flex align-items-center gap-3">
            <div class="icon kpi-icon kpi-icon-amber"><i class="bi bi-receipt"></i></div>
            <div>
                <div class="label">Total Deductions</div>
                <div class="value">₹3.42L</div>
                <div class="sub">PF, ESI, TDS & loans</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="payroll-kpi d-flex align-items-center gap-3">
            <div class="icon kpi-icon kpi-icon-red"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="label">Pending Review</div>
                <div class="value">12</div>
                <div class="sub">Require approval</div>
            </div>
        </div>
    </div>
</div>

<!-- ===== Filters card ===== -->
<div class="card-custom mb-3 filters-card">
    <div class="filters-toggle-row">
        <span class="fw-semibold filter-title-text">
            <i class="bi bi-funnel me-1"></i> Filter Payroll
        </span>
        <button type="button" class="filters-toggle-btn" id="payrollFilterToggle">
            <span>Filters</span>
            <i class="bi bi-chevron-down chevron"></i>
        </button>
    </div>

    <div class="filters-collapse" id="payrollFilterCollapse">
        <div class="row g-3" id="payrollFiltersForm">
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label">Search Employee</label>
                <input type="text" class="form-control" placeholder="Name or ID" id="filterEmployee" data-label="Employee">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label">Department</label>
                <select class="form-select select2" id="filterDept" data-label="Department">
                    <option>All Departments</option>
                    <option>Design</option>
                    <option>Engineering</option>
                    <option>Finance</option>
                    <option>Marketing</option>
                    <option>HR</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label">Pay Period</label>
                <select class="form-select select2" id="filterPeriod" data-label="Pay Period">
                    <option>All Periods</option>
                    <option>Aug 2026</option>
                    <option>Jul 2026</option>
                    <option>Jun 2026</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label">Status</label>
                <select class="form-select select2" id="filterStatus" data-label="Status">
                    <option>All Status</option>
                    <option>Paid</option>
                    <option>Processing</option>
                    <option>On Hold</option>
                    <option>Draft</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 align-self-end">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-reject flex-fill text-nowrap flex-lg-grow-0" id="clearPayrollFilters">Clear Filters</button>
                    <button type="button" class="btn btn-primary flex-fill text-nowrap flex-lg-grow-0" id="applyPayrollFilters">
                        <i class="bi bi-funnel"></i> Apply Filters
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Active filters bar -->
<div class="active-filters-bar" id="payrollActiveFilters"></div>

<!-- Payroll table -->
<div id="payrollContentArea">

<!-- Table with small inline tabs -->
<div class="card-custom p-0 mb-3" id="payrollTableWrap">

<!-- Processed Tab Panel -->
<div class="table-responsive table-modern-wrap overflow-auto column-border" id="prPanelProcessed">
        <table class="table-modern w-100 stickyBlock datatable" id="payrollTable" data-table-name="Payroll Processing">
            <thead>
                <tr>
                    <th class="text-nowrap" rowspan="2">S.No</th>
                    <th class="text-nowrap" rowspan="2">Employee</th>
                    <th class="text-nowrap" rowspan="2">Department</th>
                    <th class="text-nowrap" rowspan="2">Pay Period</th>
                    <th class="text-nowrap" rowspan="2">Present</th>
                    <th class="text-nowrap" rowspan="2">Overtime (OT)</th>
                    <th class="text-nowrap" rowspan="2">Absent</th>
                    <th colspan="7" class="text-nowrap earning-col-th text-center">Earning Components</th>
                    <th class="text-nowrap" rowspan="2">Gross Salary</th>
                    <th colspan="4" class="text-nowrap deduction-col-th text-center">Deduction Components</th>
                    <th class="text-nowrap" rowspan="2">Net Pay</th>
                    <th class="text-nowrap" rowspan="2">Action</th>
                </tr>
                <tr>
                    <th class="text-nowrap earning-col-th">Basic</th>
                    <th class="text-nowrap earning-col-th">HRA</th>
                    <th class="text-nowrap earning-col-th">DA</th>
                    <th class="text-nowrap earning-col-th">Convey.</th>
                    <th class="text-nowrap earning-col-th">Medical</th>
                    <th class="text-nowrap earning-col-th">Special</th>
                    <th class="text-nowrap earning-col-th">OT Pay</th>
                    <th class="text-nowrap deduction-col-th">PF</th>
                    <th class="text-nowrap deduction-col-th">ESI</th>
                    <th class="text-nowrap deduction-col-th">Prof Tax</th>
                    <th class="text-nowrap deduction-col-th">TDS</th>
                </tr>
            </thead>
            <tbody id="payrollTbody"></tbody>
        </table>
    </div>
</div>

</div><!-- /#payrollContentArea -->


<!-- Run Payroll Modal -->
<style>
    .rp-type-card { border:2px solid var(--border-soft); border-radius:14px; padding:20px; text-align:center; cursor:pointer; transition:all .2s ease; background:#fff; }
    .rp-type-card:hover { border-color:var(--primary); background:var(--primary-light); transform:translateY(-2px); box-shadow:0 8px 20px rgba(22,163,74,.1); }
    .rp-type-card.selected { border-color:var(--primary); background:var(--primary-light); box-shadow:0 0 0 3px rgba(22,163,74,.12); }
    .rp-type-card .rp-type-icon { width:52px; height:52px; border-radius:14px; display:inline-flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:10px; }
    .rp-type-card .rp-type-name { font-size:14px; font-weight:700; color:var(--ink-900); margin-bottom:4px; }
    .rp-type-card .rp-type-desc { font-size:11.5px; color:var(--ink-500); line-height:1.4; }
    .rp-step { display:none; }
    .rp-step.active { display:block; }
    /* Compact cards for the 3-column type selector */
    .rp-type-card.rp-type-compact { padding:14px 8px; }
    .rp-type-compact .rp-type-icon { width:44px; height:44px; font-size:19px; border-radius:12px; }
    /* ===== Add Salary Structure stepper (1. Employee → 2. Earnings → 3. Deductions) ===== */
    .as-step { display:flex; align-items:center; gap:8px; }
    .as-step-dot { width:28px; height:28px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; font-size:12px; font-weight:800; background:#f3f4f6; color:var(--ink-500, #7a7f8c); border:2px solid var(--border-soft); transition:all .25s ease; flex-shrink:0; }
    .as-step-text { font-size:12.5px; font-weight:700; color:var(--ink-500, #7a7f8c); white-space:nowrap; }
    .as-step.active .as-step-dot { background:var(--primary); border-color:var(--primary); color:#fff; }
    .as-step.active .as-step-text { color:var(--primary-dark); }
    .as-step-line { flex:1; height:2px; background:var(--border-soft); margin:0 12px; border-radius:2px; position:relative; overflow:hidden; }
    .as-step-line::after { content:''; position:absolute; inset:0; background:var(--primary); transform:scaleX(0); transform-origin:left; transition:transform .3s ease; }
    .as-step-line.done::after { transform:scaleX(1); }
    .as-panel { display:none; }
    .as-panel.active { display:block; animation:asFade .25s ease; }
    @keyframes asFade { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:translateY(0); } }
    /* ===== Custom earning / deduction rows ===== */
    .as-custom-row { display:flex; align-items:flex-end; gap:10px; animation:asFade .25s ease; }
    .as-custom-row .form-label { margin-bottom:6px; }
    .as-custom-remove { border:1px solid var(--border-soft); background:#fff; color:var(--accent-red, #d5474e); width:38px; height:38px; border-radius:10px; display:inline-flex; align-items:center; justify-content:center; cursor:pointer; transition:all .15s ease; flex-shrink:0; }
    .as-custom-remove:hover { background:#fdebed; border-color:#f5c6c8; }
    @keyframes asFade { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:translateY(0); } }
</style>
<div class="modal fade" id="runPayrollModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rp-modal-content">
            <div class="rp-modal-head">
                <div class="rp-icon-circle">
                    <i class="bi bi-cash-stack rp-icon-28"></i>
                </div>
                <h5 class="fw-bold mb-1 rp-modal-title">Run Payroll</h5>
                <p class="text-muted mb-0 rp-modal-sub">Choose how you want to process payroll</p>
            </div>
            <div class="p-4">
                <!-- Step 1: Choose type -->
                <div class="rp-step active" id="rpStep1">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="rp-type-card rp-type-compact h-100" id="rpBulkCard">
                                <div class="rp-type-icon kpi-icon-green"><i class="bi bi-people-fill"></i></div>
                                <div class="rp-type-name">Bulk</div>
                                <div class="rp-type-desc">Process payroll for all 186 employees at once</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="rp-type-card rp-type-compact" id="rpDeptCard">
                                <div class="rp-type-icon kpi-icon-amber"><i class="bi bi-diagram-3-fill"></i></div>
                                <div class="rp-type-name">Department</div>
                                <div class="rp-type-desc">Process payroll for all employees in a selected department</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="rp-type-card rp-type-compact" id="rpIndividualCard">
                                <div class="rp-type-icon kpi-icon-blue"><i class="bi bi-person-fill"></i></div>
                                <div class="rp-type-name">Individual</div>
                                <div class="rp-type-desc">Process payroll for a single selected employee</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Step 2: Bulk -->
                <div class="rp-step" id="rpStep2Bulk">
                    <div class="mb-3">
                        <label class="form-label fw-bold form-label-sm">Pay Period</label>
                        <select class="form-select select2 rp-select-full" id="rpBulkPeriodSelect" data-label="Pay Period">
                            <option value="">Select month...</option>
                            <option value="Aug 2026">Aug 2026</option>
                            <option value="Jul 2026">Jul 2026</option>
                            <option value="Jun 2026">Jun 2026</option>
                            <option value="May 2026">May 2026</option>
                            <option value="Apr 2026">Apr 2026</option>
                        </select>
                    </div>
                    <div class="rp-summary-box">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="rp-summary-key">Pay Period</span>
                            <span class="rp-summary-val" id="rpBulkPeriodSummary">—</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="rp-summary-key">Employees</span>
                            <span class="rp-summary-val">186 employees</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="rp-summary-key">Estimated Gross</span>
                            <span class="rp-summary-val">₹24.86L</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="rp-summary-key">Estimated Deductions</span>
                            <span class="rp-summary-val-red">₹3.42L</span>
                        </div>
                    </div>
                    <div class="rp-info-box">
                        <i class="bi bi-info-circle rp-info-ico"></i>
                        <span class="rp-info-text">Payroll will be processed based on attendance records for the selected period.</span>
                    </div>
                </div>
                <!-- Step 2: Department -->
                <div class="rp-step" id="rpStep2Department">
                    <div class="mb-3">
                        <label class="form-label fw-bold form-label-sm">Select Department</label>
                        <select class="form-select select2 rp-select-full" id="rpDeptSelect">
                            <option value="">Choose a department...</option>
                            <option value="Design">Design</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="HR">HR</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold form-label-sm">Pay Period</label>
                        <select class="form-select select2 rp-select-full" id="rpDeptPeriodSelect">
                            <option value="">Select month...</option>
                            <option value="Aug 2026">Aug 2026</option>
                            <option value="Jul 2026">Jul 2026</option>
                            <option value="Jun 2026">Jun 2026</option>
                            <option value="May 2026">May 2026</option>
                            <option value="Apr 2026">Apr 2026</option>
                        </select>
                    </div>
                    <div class="rp-summary-box">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="rp-summary-key">Department</span>
                            <span class="rp-summary-val" id="rpDeptSummaryName">—</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="rp-summary-key">Employees</span>
                            <span class="rp-summary-val" id="rpDeptSummaryCount">—</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="rp-summary-key">Estimated Gross</span>
                            <span class="rp-summary-val" id="rpDeptSummaryGross">—</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="rp-summary-key">Estimated Deductions</span>
                            <span class="rp-summary-val-red" id="rpDeptSummaryDed">—</span>
                        </div>
                    </div>
                    <div class="rp-info-box">
                        <i class="bi bi-info-circle rp-info-ico"></i>
                        <span class="rp-info-text">Payroll will be processed for all employees in the selected department.</span>
                    </div>
                </div>
                <!-- Step 2: Individual -->
                <div class="rp-step" id="rpStep2Individual">
                    <div class="mb-3">
                        <label class="form-label fw-bold form-label-sm">Select Employee</label>
                        <select class="form-select select2 rp-select-full" id="rpEmpSelect">
                            <option value="">Choose an employee...</option>
                            <option value="EMP0001">Amelia Curr (EMP0001)</option>
                            <option value="EMP0002">Daniel Martinez (EMP0002)</option>
                            <option value="EMP0003">David Anderson (EMP0003)</option>
                            <option value="EMP0004">Emily Clark (EMP0004)</option>
                            <option value="EMP0005">Sophia Johnson (EMP0005)</option>
                            <option value="EMP0006">Michael Brown (EMP0006)</option>
                            <option value="EMP0007">Olivia Wilson (EMP0007)</option>
                            <option value="EMP0008">James Taylor (EMP0008)</option>
                            <option value="EMP0009">Isabella Moore (EMP0009)</option>
                            <option value="EMP0010">William Thomas (EMP0010)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold form-label-sm">Pay Period</label>
                        <select class="form-select select2 rp-select-full" id="rpIndPeriodSelect" data-label="Pay Period">
                            <option value="">Select month...</option>
                            <option value="Aug 2026">Aug 2026</option>
                            <option value="Jul 2026">Jul 2026</option>
                            <option value="Jun 2026">Jun 2026</option>
                            <option value="May 2026">May 2026</option>
                            <option value="Apr 2026">Apr 2026</option>
                        </select>
                    </div>
                    <div class="rp-info-box">
                        <i class="bi bi-info-circle rp-info-ico"></i>
                        <span class="rp-info-text">Payroll will be processed for the selected employee only.</span>
                    </div>
                </div>
            </div>
            <div class="rp-modal-foot">
                <button type="button" class="btn btn-reject flex-fill rp-hidden" id="rpBackBtn"><i class="bi bi-arrow-left me-1"></i> Back</button>
                <button type="button" class="btn btn-reject flex-fill" data-bs-dismiss="modal" id="rpCancelBtn">Cancel</button>
                <button type="button" class="btn btn-primary flex-fill" id="rpNextBtn" disabled>
                    <i class="bi bi-arrow-right me-1"></i> Next
                </button>
                <button type="button" class="btn btn-primary flex-fill rp-hidden" id="rpProcessBtn">
                    <i class="bi bi-play-circle me-1"></i> Process Payroll
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Payroll Processing Progress Modal -->
<div class="modal fade" id="payrollProgressModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rp-modal-content">
            <div class="rp-modal-body-center">
                <div id="rpSpinner" class="rp-icon-circle">
                    <div class="rp-spinner"></div>
                </div>
                <div id="rpCompleteIcon" class="rp-icon-circle rp-hidden">
                    <i class="bi bi-check-circle-fill rp-icon-32"></i>
                </div>
                <h5 class="fw-bold mb-1 rp-modal-title" id="rpProgressTitle">Processing Payroll...</h5>
                <p class="text-muted mb-3 rp-modal-sub" id="rpProgressSub">Calculating salaries for 186 employees</p>
                <div class="rp-progress-track">
                    <div id="rpProgressBar" class="rp-progress-fill"></div>
                </div>
                <span class="rp-progress-pct" id="rpProgressPct">0%</span>
            </div>
            <div class="rp-modal-foot-center">
                <button type="button" class="btn btn-primary rp-btn-wide rp-hidden" id="rpViewResultBtn">
                    <i class="bi bi-eye me-1"></i> View Result
                </button>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes spin {
    to { transform: rotate(360deg); }
}
</style>


<!-- Edit Salary Structure Modal -->
<div class="modal fade" id="editPayrollModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content edit-modal-content">
            <div class="modal-header edit-modal-header">
                <div>
                    <h5 class="modal-title fw-bold edit-modal-title">Edit Salary Structure</h5>
                    <p class="mb-0 edit-modal-subtitle" id="editPayrollEmpName"></p>
                </div>
                <button type="button" class="modal-close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body edit-modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="section-heading"><i class="bi bi-plus-circle section-heading-icon section-heading-icon-green"></i><span class="section-heading-text">Earning Components</span></div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold form-label-sm">Basic Salary</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="editBasic"></div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold form-label-sm">HRA</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="editHra"></div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold form-label-sm">Dearness Allowance</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="editDa"></div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold form-label-sm">Conveyance</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="editConvey"></div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold form-label-sm">Medical</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="editMedical"></div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold form-label-sm">Special Allowance</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="editSpecial"></div>
                    </div>
                    <div class="col-12"><hr class="divider"></div>
                    <div class="col-12">
                        <div class="section-heading"><i class="bi bi-dash-circle section-heading-icon section-heading-icon-red"></i><span class="section-heading-text">Deduction Components</span></div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold form-label-sm">PF</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-red">₹</span><input type="number" class="form-control form-input" id="editPf"></div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold form-label-sm">ESI</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-red">₹</span><input type="number" class="form-control form-input" id="editEsi"></div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold form-label-sm">Prof Tax</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-red">₹</span><input type="number" class="form-control form-input" id="editProfTax"></div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold form-label-sm">TDS</label>
                        <div class="input-group"><span class="input-group-text input-prefix input-prefix-red">₹</span><input type="number" class="form-control form-input" id="editTds"></div>
                    </div>
                    <div class="col-12"><hr class="divider"></div>
                    <div class="col-12">
                        <div class="section-heading"><i class="bi bi-calendar-check section-heading-icon section-heading-icon-green"></i><span class="section-heading-text">Attendance & Overtime</span></div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold form-label-sm">Present Days</label>
                        <input type="number" class="form-control form-input" id="editPresent" min="0" max="28">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold form-label-sm">OT Hours</label>
                        <div class="input-group">
                            <input type="number" step="0.5" class="form-control form-input" id="editOtHours" min="0" value="0">
                            <span class="input-group-text input-prefix input-suffix">hrs</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold form-label-sm">OT Pay (₹)</label>
                        <div class="input-group">
                            <span class="input-group-text input-prefix input-prefix-green">₹</span>
                            <input type="number" class="form-control form-input" id="editOtPay" value="0">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold form-label-sm">OT Work Timing</label>
                        <input type="text" class="form-control form-input" id="editOtTiming" placeholder="06:00 PM - 09:30 PM">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold form-label-sm">Absent Days</label>
                        <input type="number" class="form-control form-input" id="editAbsent" min="0" max="28">
                    </div>
                    <div class="col-12 mt-2">
                        <div class="net-pay-box">
                            <div class="net-pay-label">Net Pay Preview</div>
                            <div class="fw-bold net-pay-value" id="editNetPreview">₹0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer edit-modal-footer">
                <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="savePayrollBtn"><i class="bi bi-check-lg me-1"></i> Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Salary Structure Modal -->
<div class="modal fade" id="addSalaryModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content edit-modal-content">
            <div class="modal-header edit-modal-header">
                <div>
                    <h5 class="modal-title fw-bold edit-modal-title">Add Salary Structure</h5>
                    <p class="mb-0 edit-modal-subtitle">Create salary structure for an employee</p>
                </div>
                <button type="button" class="modal-close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body edit-modal-body">
                <!-- Stepper header: 1. Employee → 2. Earnings → 3. Deductions & Review -->
                <div class="d-flex align-items-center mb-4" id="asStepper">
                    <div class="as-step active" data-step="1">
                        <span class="as-step-dot">1</span><span class="as-step-text">Employee</span>
                    </div>
                    <div class="as-step-line"></div>
                    <div class="as-step" data-step="2">
                        <span class="as-step-dot">2</span><span class="as-step-text">Earnings</span>
                    </div>
                    <div class="as-step-line"></div>
                    <div class="as-step" data-step="3">
                        <span class="as-step-dot">3</span><span class="as-step-text">Deductions & Review</span>
                    </div>
                </div>

                <!-- STEP 1: Employee selection -->
                <div class="as-panel active" id="asPanel1">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold form-label-sm">Select Employee</label>
                            <select class="form-select rp-select-r10" id="addSalaryEmp"></select>
                        </div>
                        <div class="col-12">
                            <div class="rp-info-box">
                                <i class="bi bi-info-circle rp-info-ico"></i>
                                <span class="rp-info-text">Choose the employee for whom you want to create a salary structure. You can define earnings in the next step.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Earnings -->
                <div class="as-panel" id="asPanel2">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="section-heading"><i class="bi bi-plus-circle section-heading-icon section-heading-icon-green"></i><span class="section-heading-text">Earning Components</span></div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold form-label-sm">Basic Salary</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="addBasic" value="25000"></div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold form-label-sm">HRA</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="addHra" value="10000"></div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold form-label-sm">Dearness Allowance</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="addDa" value="5000"></div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold form-label-sm">Conveyance</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="addConvey" value="3200"></div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold form-label-sm">Medical</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="addMedical" value="2000"></div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold form-label-sm">Special Allowance</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-green">₹</span><input type="number" class="form-control form-input" id="addSpecial" value="4800"></div>
                        </div>
                        <div class="col-12">
                            <div class="rp-info-box">
                                <i class="bi bi-info-circle rp-info-ico"></i>
                                <span class="rp-info-text">Monthly gross earnings before deductions. Values are pre-filled with defaults — adjust as needed.</span>
                            </div>
                        </div>
                        <!-- Custom earnings -->
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="rp-section-label">CUSTOM EARNINGS (OPTIONAL)</span>
                                <button type="button" class="btn btn-sm btn-outline-primary" id="asAddCustomEarnBtn"><i class="bi bi-plus-lg me-1"></i>Add Custom Earning</button>
                            </div>
                            <div id="asCustomEarnList"></div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Deductions + Review -->
                <div class="as-panel" id="asPanel3">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="section-heading"><i class="bi bi-dash-circle section-heading-icon section-heading-icon-red"></i><span class="section-heading-text">Deduction Components</span></div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold form-label-sm">PF</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-red">₹</span><input type="number" class="form-control form-input" id="addPf" value="3000"></div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold form-label-sm">ESI</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-red">₹</span><input type="number" class="form-control form-input" id="addEsi" value="375"></div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold form-label-sm">Prof Tax</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-red">₹</span><input type="number" class="form-control form-input" id="addProfTax" value="200"></div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold form-label-sm">TDS</label>
                            <div class="input-group"><span class="input-group-text input-prefix input-prefix-red">₹</span><input type="number" class="form-control form-input" id="addTds" value="2500"></div>
                        </div>
                        <div class="col-md-8">
                            <div class="net-pay-box rp-netpay-fill">
                                <div class="net-pay-label">Net Pay Preview</div>
                                <div class="fw-bold net-pay-value" id="addNetPreview">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <div class="rp-info-box rp-info-box-wide">
                                <i class="bi bi-eye rp-info-ico"></i>
                                <span class="rp-info-text">Review everything, then save.</span>
                            </div>
                        </div>
                        <!-- Custom deductions -->
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="rp-section-label">CUSTOM DEDUCTIONS (OPTIONAL)</span>
                                <button type="button" class="btn btn-sm btn-outline-primary" id="asAddCustomDedBtn"><i class="bi bi-plus-lg me-1"></i>Add Custom Deduction</button>
                            </div>
                            <div id="asCustomDedList"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer edit-modal-footer">
                <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-primary rp-hidden" id="asBackBtn"><i class="bi bi-arrow-left me-1"></i> Back</button>
                <button type="button" class="btn btn-primary" id="asNextBtn"><i class="bi bi-arrow-right me-1"></i> Next</button>
                <button type="button" class="btn btn-primary rp-hidden" id="saveAddSalaryBtn"><i class="bi bi-check-lg me-1"></i> Save Salary Structure</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
    var contentArea = document.getElementById('payrollContentArea');
    var runTopBtn = document.getElementById('runPayrollTopBtn');
    var rpModal = document.getElementById('runPayrollModal');
    var progressModal = document.getElementById('payrollProgressModal');
    var processBtn = document.getElementById('rpProcessBtn');
    var viewResultBtn = document.getElementById('rpViewResultBtn');
    var progressBar = document.getElementById('rpProgressBar');
    var progressPct = document.getElementById('rpProgressPct');
    var progressTitle = document.getElementById('rpProgressTitle');
    var progressSub = document.getElementById('rpProgressSub');
    var spinner = document.getElementById('rpSpinner');
    var completeIcon = document.getElementById('rpCompleteIcon');
    var bsRpModal, bsProgressModal;

    // Bootstrap modals
    if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
        bsRpModal = bootstrap.Modal.getOrCreateInstance(rpModal);
        bsProgressModal = bootstrap.Modal.getOrCreateInstance(progressModal);
    }

    function showRpModal() {
        if (bsRpModal) bsRpModal.show();
    }

    var step1 = document.getElementById('rpStep1');
    var step2Bulk = document.getElementById('rpStep2Bulk');
    var step2Individual = document.getElementById('rpStep2Individual');
    var step2Department = document.getElementById('rpStep2Department');
    var backBtn = document.getElementById('rpBackBtn');
    var cancelBtn = document.getElementById('rpCancelBtn');
    var nextBtn = document.getElementById('rpNextBtn');
    var bulkCard = document.getElementById('rpBulkCard');
    var individualCard = document.getElementById('rpIndividualCard');
    var rpEmpSelect = document.getElementById('rpEmpSelect');
    var rpBulkPeriodSelect = document.getElementById('rpBulkPeriodSelect');
    var rpIndPeriodSelect = document.getElementById('rpIndPeriodSelect');
    var rpBulkPeriodSummary = document.getElementById('rpBulkPeriodSummary');
    var rpDeptCard = document.getElementById('rpDeptCard');
    var rpDeptSelect = document.getElementById('rpDeptSelect');
    var rpDeptPeriodSelect = document.getElementById('rpDeptPeriodSelect');
    var rpDeptSummaryName = document.getElementById('rpDeptSummaryName');
    var rpDeptSummaryCount = document.getElementById('rpDeptSummaryCount');
    var rpDeptSummaryGross = document.getElementById('rpDeptSummaryGross');
    var rpDeptSummaryDed = document.getElementById('rpDeptSummaryDed');
    // Per-department dummy numbers (demo) — count, gross (₹), deductions (₹)
    var RP_DEPT_STATS = {
        'Design':      { count: 42, gross: 5320000, ded: 731000 },
        'Engineering': { count: 58, gross: 7240000, ded: 998000 },
        'Finance':     { count: 24, gross: 3010000, ded: 415000 },
        'Marketing':   { count: 36, gross: 4520000, ded: 623000 },
        'HR':          { count: 26, gross: 3260000, ded: 449000 }
    };
    function rpFormatINR(n) {
        if (n >= 100000) return '₹' + (n / 100000).toFixed(2) + 'L';
        return '₹' + n.toLocaleString('en-IN');
    }
    function rpUpdateDeptSummary() {
        var dept = rpDeptSelect ? rpDeptSelect.value : '';
        var stats = RP_DEPT_STATS[dept];
        if (rpDeptSummaryName) rpDeptSummaryName.textContent = dept || '—';
        if (rpDeptSummaryCount) rpDeptSummaryCount.textContent = stats ? stats.count + ' employees' : '—';
        if (rpDeptSummaryGross) rpDeptSummaryGross.textContent = stats ? rpFormatINR(stats.gross) : '—';
        if (rpDeptSummaryDed) rpDeptSummaryDed.textContent = stats ? rpFormatINR(stats.ded) : '—';
    }
    var selectedType = '';

    function resetRpModal() {
        selectedType = '';
        step1.classList.add('active');
        step2Bulk.classList.remove('active');
        step2Individual.classList.remove('active');
        backBtn.classList.add('rp-hidden');
        nextBtn.classList.remove('rp-hidden');
        nextBtn.disabled = true;
        processBtn.classList.add('rp-hidden');
        cancelBtn.classList.remove('rp-hidden');
        bulkCard.classList.remove('selected');
        individualCard.classList.remove('selected');
        if (rpDeptCard) rpDeptCard.classList.remove('selected');
        if (rpEmpSelect) rpEmpSelect.value = '';
        if (rpEmpSelect && window.jQuery) jQuery(rpEmpSelect).val(null).trigger('change');
        if (rpBulkPeriodSelect) rpBulkPeriodSelect.value = '';
        if (rpBulkPeriodSelect && window.jQuery) jQuery(rpBulkPeriodSelect).val(null).trigger('change');
        if (rpIndPeriodSelect) rpIndPeriodSelect.value = '';
        if (rpIndPeriodSelect && window.jQuery) jQuery(rpIndPeriodSelect).val(null).trigger('change');
        if (rpDeptSelect) rpDeptSelect.value = '';
        if (rpDeptSelect && window.jQuery) jQuery(rpDeptSelect).val(null).trigger('change');
        if (rpDeptPeriodSelect) rpDeptPeriodSelect.value = '';
        if (rpDeptPeriodSelect && window.jQuery) jQuery(rpDeptPeriodSelect).val(null).trigger('change');
        if (rpBulkPeriodSummary) rpBulkPeriodSummary.textContent = '—';
        rpUpdateDeptSummary();
    }

    // Run Payroll top button click
    runTopBtn.addEventListener('click', function() {
        resetRpModal();
        showRpModal();
    });

    // Bulk card click
    bulkCard.addEventListener('click', function() {
        selectedType = 'bulk';
        bulkCard.classList.add('selected');
        individualCard.classList.remove('selected');
        if (rpDeptCard) rpDeptCard.classList.remove('selected');
        nextBtn.disabled = false;
    });

    // Individual card click
    individualCard.addEventListener('click', function() {
        selectedType = 'individual';
        individualCard.classList.add('selected');
        bulkCard.classList.remove('selected');
        if (rpDeptCard) rpDeptCard.classList.remove('selected');
        nextBtn.disabled = false;
    });

    // Department card click
    if (rpDeptCard) {
        rpDeptCard.addEventListener('click', function() {
            selectedType = 'department';
            rpDeptCard.classList.add('selected');
            bulkCard.classList.remove('selected');
            individualCard.classList.remove('selected');
            nextBtn.disabled = false;
        });
    }

    // Bulk period change -> update summary line
    if (rpBulkPeriodSelect) {
        rpBulkPeriodSelect.addEventListener('change', function() {
            if (rpBulkPeriodSummary) rpBulkPeriodSummary.textContent = this.value || '—';
        });
    }

    // Department select / period change -> update summary line
    if (rpDeptSelect) {
        rpDeptSelect.addEventListener('change', rpUpdateDeptSummary);
    }
    if (rpDeptPeriodSelect) {
        rpDeptPeriodSelect.addEventListener('change', function() {
            rpUpdateDeptSummary();
        });
    }

    // Next button click
    nextBtn.addEventListener('click', function() {
        if (selectedType === 'bulk') {
            step1.classList.remove('active');
            step2Bulk.classList.add('active');
        } else if (selectedType === 'department') {
            step1.classList.remove('active');
            step2Department.classList.add('active');
        } else if (selectedType === 'individual') {
            step1.classList.remove('active');
            step2Individual.classList.add('active');
        }
        backBtn.classList.remove('rp-hidden');
        nextBtn.classList.add('rp-hidden');
        processBtn.classList.remove('rp-hidden');
        cancelBtn.classList.add('rp-hidden');
    });

    // Back button click
    backBtn.addEventListener('click', function() {
        step2Bulk.classList.remove('active');
        step2Individual.classList.remove('active');
        if (step2Department) step2Department.classList.remove('active');
        step1.classList.add('active');
        backBtn.classList.add('rp-hidden');
        nextBtn.classList.remove('rp-hidden');
        nextBtn.disabled = false;
        processBtn.classList.add('rp-hidden');
        cancelBtn.classList.remove('rp-hidden');
    });

    // Process Payroll button click
    processBtn.addEventListener('click', function() {
        // Resolve the period select for the current type
        var periodSelect = selectedType === 'bulk' ? rpBulkPeriodSelect
            : (selectedType === 'department' ? rpDeptPeriodSelect : rpIndPeriodSelect);
        // Validate pay period selection
        if (!periodSelect || !periodSelect.value) {
            if (periodSelect && window.jQuery) jQuery(periodSelect).select2('open');
            else if (periodSelect) periodSelect.focus();
            return;
        }
        var payPeriod = periodSelect.value;
        // Validate department selection
        if (selectedType === 'department' && (!rpDeptSelect || !rpDeptSelect.value)) {
            if (window.jQuery) jQuery(rpDeptSelect).select2('open');
            else if (rpDeptSelect) rpDeptSelect.focus();
            return;
        }
        // Validate individual selection
        if (selectedType === 'individual' && (!rpEmpSelect || !rpEmpSelect.value)) {
            if (window.jQuery) jQuery(rpEmpSelect).select2('open');
            else rpEmpSelect.focus();
            return;
        }
        if (bsRpModal) bsRpModal.hide();
        var empLabel;
        if (selectedType === 'bulk') {
            empLabel = '186 employees';
        } else if (selectedType === 'department') {
            var stats = RP_DEPT_STATS[rpDeptSelect.value];
            empLabel = rpDeptSelect.value + ' department (' + (stats ? stats.count : 0) + ' employees)';
        } else {
            empLabel = rpEmpSelect.options[rpEmpSelect.selectedIndex].text;
        }
        // Reset progress
        progressBar.style.width = '0%';
        progressPct.textContent = '0%';
        progressTitle.textContent = 'Processing Payroll...';
        progressSub.textContent = 'Calculating salaries for ' + empLabel + ' — ' + payPeriod;
        spinner.classList.remove('rp-hidden');
        completeIcon.classList.add('rp-hidden');
        viewResultBtn.classList.add('rp-hidden');
        if (bsProgressModal) bsProgressModal.show();

        // Animate progress bar
        var pct = 0;
        var interval = setInterval(function() {
            pct += Math.random() * 15 + 5;
            if (pct >= 100) {
                pct = 100;
                clearInterval(interval);
                progressBar.style.width = '100%';
                progressPct.textContent = '100%';
                progressTitle.textContent = 'Payroll Processed!';
                progressSub.textContent = empLabel + ' processed successfully for ' + payPeriod;
                spinner.classList.add('rp-hidden');
                completeIcon.classList.remove('rp-hidden');
                viewResultBtn.classList.remove('rp-hidden');
                return;
            }
            progressBar.style.width = Math.round(pct) + '%';
            progressPct.textContent = Math.round(pct) + '%';
            if (pct > 40) progressSub.textContent = 'Validating deductions... (' + payPeriod + ')';
            if (pct > 70) progressSub.textContent = 'Finalizing payroll... (' + payPeriod + ')';
        }, 300);
    });

    // View Result button click
    viewResultBtn.addEventListener('click', function() {
        if (bsProgressModal) bsProgressModal.hide();
        // Show the payroll content
        contentArea.classList.remove('rp-hidden');
    });
});
</script>

<script src="./assets/js/payroll.js?v=<?= time() ?>"></script>

<?php include 'footer.php'; ?>