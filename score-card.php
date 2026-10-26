<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/date-picker.css">
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    :root {
        --gh-primary: #0284c7;
        --gh-primary-hover: #0369a1;
        --gh-primary-light: #e0f2fe;
        --gh-success: #10b981;
        --gh-success-hover: #059669;
        --gh-success-light: #dcfce7;
        --gh-warning: #f59e0b;
        --gh-warning-light: #fef3c7;
        --gh-danger: #ef4444;
        --gh-danger-light: #fee2e2;
        --gh-dark: #0f172a;
        --gh-slate-700: #334155;
        --gh-slate-500: #64748b;
        --gh-border: #e2e8f0;
        --gh-bg-card: #ffffff;
        --gh-shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.06), 0 1px 2px rgba(15, 23, 42, 0.04);
        --gh-shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    }

    .report-wrapper {
        background-color: #f8fafc;
        min-height: calc(100vh - 70px);
        padding: 24px;
        padding-bottom: 4rem;
    }

    /* Top Page Header Card */
    .report-header-card {
        background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
        border: 1px solid #bae6fd;
        border-radius: 16px;
        padding: 24px 28px;
        margin-bottom: 24px;
        box-shadow: var(--gh-shadow-sm);
        position: relative;
        overflow: hidden;
    }

    .report-header-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 100%;
        background: radial-gradient(circle, rgba(2, 132, 199, 0.08) 0%, rgba(255, 255, 255, 0) 70%);
        pointer-events: none;
    }

    .report-title {
        font-size: 1.45rem;
        font-weight: 800;
        color: var(--gh-dark);
        margin: 0;
        letter-spacing: -0.02em;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .report-subtitle {
        font-size: 13.5px;
        color: var(--gh-slate-500);
        margin-top: 4px;
        font-weight: 500;
    }

    /* Stat Cards Row */
    .stat-widget-card {
        background: #ffffff;
        border: 1px solid var(--gh-border);
        border-radius: 14px;
        padding: 16px 20px;
        box-shadow: var(--gh-shadow-sm);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        height: 100%;
    }

    .stat-widget-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--gh-shadow-md);
    }

    .stat-icon-wrapper {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .stat-val {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--gh-dark);
        line-height: 1.2;
    }

    .stat-lbl {
        font-size: 12px;
        font-weight: 600;
        color: var(--gh-slate-500);
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    /* Filters Card */
    .report-filters-card {
        background: #ffffff;
        border: 1px solid var(--gh-border);
        border-radius: 16px;
        padding: 22px 26px;
        margin-bottom: 24px;
        box-shadow: var(--gh-shadow-sm);
    }

    .filter-label {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--gh-slate-500);
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* ===== Select2 Custom Theme & Search Box ===== */
    .select2-container {
        width: 100% !important;
        font-family: inherit;
    }

    .select2-container--default .select2-selection--single {
        height: 44px !important;
        background-color: #ffffff !important;
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 12px !important;
        box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04) !important;
        transition: all 0.2s ease !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single:hover,
    .select2-container--default.select2-container--open .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3.5px rgba(16, 185, 129, 0.18) !important;
        outline: none !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 42px !important;
        padding-left: 14px !important;
        padding-right: 36px !important;
        color: #16a34a !important;
        font-weight: 700 !important;
        font-size: 13.5px !important;
        display: block !important;
        width: 100% !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        white-space: nowrap !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 44px !important;
        width: 32px !important;
        right: 8px !important;
        top: 0 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #10b981 transparent transparent transparent !important;
        border-width: 6px 5px 0 5px !important;
        margin: 0 !important;
        position: static !important;
        display: block !important;
        top: auto !important;
        left: auto !important;
    }

    .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
        border-color: transparent transparent #10b981 transparent !important;
        border-width: 0 5px 6px 5px !important;
        margin: 0 !important;
    }

    /* Popup Search Input Styling */
    .select2-dropdown {
        background-color: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 14px !important;
        box-shadow: 0 16px 36px -6px rgba(16, 185, 129, 0.14), 0 8px 24px rgba(15, 23, 42, 0.08) !important;
        overflow: hidden !important;
        padding: 6px !important;
        z-index: 1060 !important;
    }

    .select2-search--dropdown {
        padding: 8px 8px 6px 8px !important;
    }

    .select2-search--dropdown .select2-search__field {
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 8px !important;
        padding: 7px 12px !important;
        font-size: 13px !important;
        outline: none !important;
        color: #1e293b !important;
        font-weight: 500 !important;
    }

    .select2-search--dropdown .select2-search__field:focus {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15) !important;
    }

    .select2-container--default .select2-results__option {
        padding: 10px 16px !important;
        font-size: 13.5px !important;
        font-weight: 500 !important;
        color: #334155 !important;
        border-radius: 10px !important;
        margin-bottom: 2px !important;
    }

    .select2-container--default .select2-results__option--selected {
        background-color: #eef2f6 !important;
        color: #10b981 !important;
        font-weight: 700 !important;
    }

    /* ===== GREEN Submit Button ===== */
    .btn-search-report {
        background-color: #10b981 !important;
        color: #ffffff !important;
        font-weight: 700 !important;
        font-size: 14px !important;
        padding: 9px 24px !important;
        height: 44px !important;
        border-radius: 12px !important;
        border: none !important;
        transition: all 0.2s ease !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25) !important;
    }

    .btn-search-report:hover {
        background-color: #059669 !important;
        color: #ffffff !important;
        box-shadow: 0 6px 16px rgba(16, 185, 129, 0.35) !important;
        transform: translateY(-1px);
    }

    .btn-reset-report {
        background-color: #f1f5f9;
        color: var(--gh-slate-700);
        font-weight: 700;
        font-size: 14px;
        padding: 9px 18px;
        height: 44px;
        border-radius: 12px;
        border: 1px solid var(--gh-border);
        transition: background-color 0.2s ease;
    }

    .btn-reset-report:hover {
        background-color: #e2e8f0;
        color: var(--gh-dark);
    }

    /* Date Range Info Bar */
    .date-info-banner {
        background: linear-gradient(90deg, #ecfdf5 0%, #f0fdf4 100%);
        border: 1px solid #a7f3d0;
        border-radius: 12px;
        padding: 14px 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 1px 2px rgba(16, 185, 129, 0.05);
    }

    .date-info-title {
        font-size: 13.5px;
        font-weight: 700;
        color: #065f46;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .date-badge {
        background: #ffffff;
        border: 1px solid #6ee7b7;
        color: #047857;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 13px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.03);
    }

    /* Master Table Styling matching employees-report.php */
    .card-custom {
        background: #ffffff;
        border: 1px solid var(--gh-border);
        border-radius: 16px;
        box-shadow: var(--gh-shadow-sm);
        overflow: hidden;
    }

    .table-scorecard {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-scorecard th {
        background-color: #f8fafc;
        color: #475569;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        padding: 14px 16px;
        border-bottom: 2px solid var(--gh-border);
        vertical-align: middle;
        white-space: nowrap;
    }

    .table-scorecard td {
        padding: 14px 16px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        font-size: 13.5px;
        color: #1e293b;
    }

    .table-scorecard tbody tr:hover {
        background-color: #f8fafc;
    }

    /* Grouped Header Colors */
    th.th-header-completed {
        background-color: #15803d !important;
        color: #ffffff !important;
        text-align: center;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
    }

    th.th-header-sub-completed {
        background-color: #dcfce7 !important;
        color: #166534 !important;
        font-weight: 800 !important;
        text-align: center;
    }

    th.th-header-not-completed {
        background-color: #dc2626 !important;
        color: #ffffff !important;
        text-align: center;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
    }

    /* Status Pills & Badges */
    .emp-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 0 0 2px #e2e8f0;
    }

    .emp-name {
        font-weight: 700;
        color: var(--gh-dark);
        line-height: 1.3;
    }

    .emp-code {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--gh-slate-500);
    }

    .dept-badge {
        font-size: 11.5px;
        font-weight: 700;
        padding: 5px 12px;
        border-radius: 999px;
        display: inline-block;
    }

    .badge-sales { background: #e0f2fe; color: #0369a1; }
    .badge-designer { background: #f3e8ff; color: #6b21a8; }
    .badge-tech { background: #ffedd5; color: #c2410c; }
    .badge-marketing { background: #fce7f3; color: #be185d; }
    .badge-stores { background: #e0e7ff; color: #3730a3; }
    .badge-hr { background: #ccfbf1; color: #0f766e; }
    .badge-prod { background: #fef3c7; color: #b45309; }

    .last-week-pct {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 12.5px;
    }

    .pct-up { background: #dcfce7; color: #15803d; }
    .pct-zero { background: #f1f5f9; color: #64748b; }

    .count-pill {
        font-weight: 700;
        font-size: 13px;
        padding: 4px 12px;
        border-radius: 8px;
        display: inline-block;
        min-width: 32px;
        text-align: center;
    }

    .pill-planned { background: #e2e8f0; color: #334155; }
    .pill-ontime { background: #dcfce7; color: #15803d; }
    .pill-delay { background: #fef3c7; color: #b45309; }
    .pill-notcompleted { background: #fee2e2; color: #b91c1c; }

    .btn-commitment {
        background: #ffffff;
        border: 1.5px solid #cbd5e1;
        color: var(--gh-slate-700);
        font-weight: 600;
        font-size: 12px;
        padding: 6px 14px;
        border-radius: 8px;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-commitment:hover {
        border-color: var(--gh-primary);
        color: var(--gh-primary);
        background-color: var(--gh-primary-light);
    }
</style>

<div class="report-wrapper">

    <!-- Top Page Header Card -->
    <div class="report-header-card d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-primary-subtle text-primary fw-bold px-2.5 py-1 rounded-2">Performance Tracking</span>
                <span class="text-muted small"><i class="bi bi-clock me-1"></i> Weekly Score Card</span>
            </div>
            <h3 class="report-title">
                <i class="bi bi-card-checklist text-primary"></i> Score Card Report
            </h3>
            <div class="report-subtitle">
                Track weekly task commitments, completion efficiency, delay logs, and departmental performance scores.
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-outline-primary fw-bold btn-sm rounded-3 px-3 py-2" onclick="window.print();">
                <i class="bi bi-printer me-1"></i> Print Summary
            </button>
            <button type="button" class="btn btn-primary fw-bold btn-sm rounded-3 px-3 py-2" data-bs-toggle="modal" data-bs-target="#commitmentModal">
                <i class="bi bi-plus-lg me-1"></i> Add Commitment
            </button>
        </div>
    </div>

    <!-- Stat Widgets Row -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-primary-subtle text-primary">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <div class="stat-val" id="statTotalEmp">15</div>
                    <div class="stat-lbl">Staff Count</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-info-subtle text-info">
                    <i class="bi bi-list-task"></i>
                </div>
                <div>
                    <div class="stat-val" id="statPlannedTasks">26</div>
                    <div class="stat-lbl">Planned Tasks</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-success-subtle text-success">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div>
                    <div class="stat-val" id="statCompletedTasks">18</div>
                    <div class="stat-lbl">Completed</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-warning-subtle text-warning">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div>
                    <div class="stat-val" id="statDelayedTasks">3</div>
                    <div class="stat-lbl">Delayed Tasks</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-danger-subtle text-danger">
                    <i class="bi bi-x-circle-fill"></i>
                </div>
                <div>
                    <div class="stat-val" id="statNotCompletedTasks">5</div>
                    <div class="stat-lbl">Not Completed</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-indigo-subtle text-indigo" style="background:#e0e7ff;color:#4338ca;">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div>
                    <div class="stat-val" id="statAvgPct">75.4%</div>
                    <div class="stat-lbl">Avg Score %</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters Card -->
    <div class="report-filters-card">
        <form method="GET" action="" id="scorecardFilterForm" onsubmit="event.preventDefault(); applyScorecardFilters();">
            <div class="row g-3 align-items-end">
                <div class="col-12 col-sm-6 col-md-2">
                    <label class="filter-label" for="filterYear"><i class="bi bi-calendar3"></i> Year</label>
                    <select id="filterYear" class="form-select scorecard-select2">
                        <option value="2026" selected>2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <label class="filter-label" for="filterMonth"><i class="bi bi-calendar-month"></i> Month</label>
                    <select id="filterMonth" class="form-select scorecard-select2">
                        <option value="January" selected>January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <label class="filter-label" for="filterWeek"><i class="bi bi-calendar-week"></i> Week</label>
                    <select id="filterWeek" class="form-select scorecard-select2">
                        <option value="All" selected>All Weeks</option>
                        <option value="Week 1">Week 1</option>
                        <option value="Week 2">Week 2</option>
                        <option value="Week 3">Week 3</option>
                        <option value="Week 4">Week 4</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <label class="filter-label" for="filterDepartment"><i class="bi bi-diagram-3"></i> Department</label>
                    <select id="filterDepartment" class="form-select scorecard-select2">
                        <option value="All" selected>All Departments</option>
                        <option value="Sales">Sales</option>
                        <option value="Designer">Designer</option>
                        <option value="Tech Support">Tech Support</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Stores">Stores</option>
                        <option value="HR">HR</option>
                        <option value="Production">Production</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <label class="filter-label" for="filterStaff"><i class="bi bi-person-badge"></i> Staff</label>
                    <select id="filterStaff" class="form-select scorecard-select2">
                        <option value="All" selected>All Staff</option>
                        <option value="KOWSHIK SOFTWARE">KOWSHIK SOFTWARE</option>
                        <option value="ASHISH">ASHISH</option>
                        <option value="thilak ma">thilak ma</option>
                        <option value="Jude S">Jude S</option>
                        <option value="PREM KUMAR.R">PREM KUMAR.R</option>
                        <option value="Akash Kumar">Akash Kumar</option>
                        <option value="ARUN KUMAR">ARUN KUMAR</option>
                        <option value="Test Demo">Test Demo</option>
                        <option value="KOKASHALU K">KOKASHALU K</option>
                        <option value="Suresh A">Suresh A</option>
                        <option value="KOKA TESTER">KOKA TESTER</option>
                        <option value="koka SHALINI">koka SHALINI</option>
                        <option value="KISHORE R">KISHORE R</option>
                        <option value="shalu welcome Testing">shalu welcome Testing</option>
                        <option value="Aravindh K">Aravindh K</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-search-report flex-grow-1">
                        <i class="bi bi-funnel-fill"></i> Submit
                    </button>
                    <button type="button" class="btn btn-reset-report" title="Reset Filters" onclick="resetScorecardFilters();">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Date Range Info Banner matching image -->
    <!-- <div class="date-info-banner">
        <div class="date-info-title">
            <i class="bi bi-calendar2-range-fill text-success fs-5"></i>
            <span>Active Week Timeline:</span>
        </div>
        <div class="d-flex align-items-center gap-3 flex-wrap">
            <div>
                <span class="text-muted small me-1">Start Date:</span>
                <span class="date-badge" id="bannerStartDate">27-09-2026</span>
            </div>
            <div class="text-muted fw-bold">|</div>
            <div>
                <span class="text-muted small me-1">End Date:</span>
                <span class="date-badge" id="bannerEndDate">03-10-2026</span>
            </div>
        </div>
    </div> -->

    <!-- Master Table Section matching employee-report.php format -->
    <div class="card-custom mb-4">
        <div class="table-responsive">
            <table class="table-scorecard master-table" id="scorecardTable">
                <thead>
                    <tr>
                        <th rowspan="2" style="width: 50px;">S.No.</th>
                        <th rowspan="2">Employee Name</th>
                        <th rowspan="2">Employee Code</th>
                        <th rowspan="2">Department</th>
                        <th rowspan="2">Location</th>
                        <th rowspan="2">Last Week(%)</th>
                        <th rowspan="2">Planned Task</th>
                        <th colspan="2" class="th-header-completed">Completed Task</th>
                        <th rowspan="2" class="th-header-not-completed">Not Completed Task</th>
                        <th rowspan="2">Last Week Commitment</th>
                        <th rowspan="2">This Week Commitment</th>
                    </tr>
                    <tr>
                        <th class="th-header-sub-completed">On Time Completed Task</th>
                        <th class="th-header-sub-completed">Delay Time Completed Task</th>
                    </tr>
                </thead>
                <tbody id="scorecardTbody">
                    <!-- MasterTable JS dynamically populates content -->
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Commitment Edit / Add Modal -->
<div class="modal fade" id="commitmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header border-bottom border-light px-4 py-3">
                <h5 class="modal-title fw-bold text-dark d-flex align-items-center gap-2">
                    <i class="bi bi-pencil-square text-primary"></i> Update Weekly Commitment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="commitmentForm">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">SELECT STAFF</label>
                        <select id="modalStaffSelect" class="form-select scorecard-select2 rounded-3 py-2 fs-6">
                            <option value="KOWSHIK SOFTWARE">KOWSHIK SOFTWARE (KOKA0011)</option>
                            <option value="ASHISH">ASHISH (A1001)</option>
                            <option value="thilak ma">thilak ma (1234)</option>
                            <option value="Jude S">Jude S (4566)</option>
                            <option value="PREM KUMAR.R">PREM KUMAR.R (158357)</option>
                            <option value="Akash Kumar">Akash Kumar (11504)</option>
                            <option value="ARUN KUMAR">ARUN KUMAR (EMP-0001)</option>
                            <option value="Test Demo">Test Demo (TEST001)</option>
                            <option value="KOKASHALU K">KOKASHALU K (252525)</option>
                            <option value="Suresh A">Suresh A (212)</option>
                            <option value="KOKA TESTER">KOKA TESTER (0529)</option>
                            <option value="koka SHALINI">koka SHALINI (778877)</option>
                            <option value="KISHORE R">KISHORE R (EMP0001)</option>
                            <option value="shalu welcome Testing">shalu welcome Testing (12345)</option>
                            <option value="Aravindh K">Aravindh K (11505)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">THIS WEEK COMMITMENT</label>
                        <textarea id="modalCommitmentText" class="form-control rounded-3" rows="3" placeholder="e.g. 85% completion planned for CRM sprint..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top border-light px-4 py-3">
                <button type="button" class="btn btn-light fw-bold rounded-3 px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary fw-bold rounded-3 px-4" onclick="saveCommitmentModal();">Save Commitment</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="./assets/js/pages/score-card.js?v=<?php echo time(); ?>"></script>
