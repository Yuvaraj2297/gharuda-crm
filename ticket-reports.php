<?php include 'header.php'; ?>

 

<style>
    /* ===== Report KPI ===== */
    .tr-kpi {
        border: 1.5px solid var(--border-soft, #eef0f3);
        border-radius: 14px;
        background: #fff;
        padding: 16px 18px;
        height: 100%;
        transition: transform .18s ease, box-shadow .18s ease;
    }

    .tr-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(20, 20, 43, .08);
    }

    .tr-kpi .k-val {
        font: 800 24px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
        line-height: 1;
    }

    .tr-kpi .k-label {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--ink-500, #6b7684);
        margin-top: 5px;
    }

    .tr-kpi .k-ico {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 19px;
        flex-shrink: 0;
    }

    /* ===== Report cards ===== */
    .tr-card {
        border: 1.5px solid var(--border-soft, #eef0f3);
        border-radius: 14px;
        background: #fff;
        overflow: hidden;
        height: 100%;
    }

    .tr-card .tr-head {
        padding: 14px 18px;
        border-bottom: 1px solid var(--border-soft, #eef0f3);
        display: flex;
        align-items: center;
        gap: 8px;
        font: 700 13.5px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
    }

    .tr-card .tr-head i {
        color: #3564e0;
    }

    .tr-card .tr-body {
        padding: 14px 18px;
    }

    /* ===== Horizontal bar rows ===== */
    .tr-bar-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .tr-bar-row:last-child { margin-bottom: 0; }

    .tr-bar-row .b-label {
        width: 130px;
        font-size: 11.5px;
        font-weight: 700;
        color: var(--ink-700, #4b5563);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        flex-shrink: 0;
    }

    .tr-bar-row .b-track {
        flex: 1;
        height: 10px;
        background: #f3f4f6;
        border-radius: 99px;
        overflow: hidden;
    }

    .tr-bar-row .b-fill {
        height: 100%;
        border-radius: 99px;
        min-width: 4px;
        transition: width .5s ease;
    }

    .tr-bar-row .b-val {
        width: 30px;
        text-align: right;
        font-size: 11.5px;
        font-weight: 800;
        color: var(--ink-900, #201a14);
        flex-shrink: 0;
    }

    /* ===== Mini table ===== */
    .tr-mini-table {
        width: 100%;
        font-size: 12px;
    }

    .tr-mini-table th {
        font-size: 10.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .04em;
        color: var(--ink-500, #6b7684);
        padding: 6px 8px;
        border-bottom: 1.5px solid var(--border-soft, #eef0f3);
        white-space: nowrap;
    }

    .tr-mini-table td {
        padding: 8px;
        font-weight: 600;
        color: var(--ink-900, #201a14);
        border-bottom: 1px solid #f3f4f6;
    }

    .tr-mini-table tr:last-child td { border-bottom: none; }

    .tr-mini-table .num {
        text-align: right;
        font-variant-numeric: tabular-nums;
    }

    .dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        margin-right: 6px;
    }
</style>

<!-- Top Title Area -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Ticket Reports</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-life-preserver fs-6"></i>
            <span>Helpdesk / Ticketing</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Reports</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-primary" type="button" id="trExportBtn">
            <i class="bi bi-download me-1"></i> Export Report
        </button>
        <a href="ticket-dashboard.php" class="btn btn-primary">
            <i class="bi bi-speedometer2 me-1"></i> Ticket Dashboard
        </a>
    </div>
</div>

<!-- Summary KPIs -->
<div class="row g-3 mb-3">
    <div class="col-6 col-xl-2">
        <div class="tr-kpi d-flex align-items-center gap-3">
            <div class="k-ico" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-ticket-perforated"></i></div>
            <div>
                <div class="k-val" id="trTotal">0</div>
                <div class="k-label">Total Tickets</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-2">
        <div class="tr-kpi d-flex align-items-center gap-3">
            <div class="k-ico" style="background:#fff4d9;color:#9a6200;"><i class="bi bi-inbox"></i></div>
            <div>
                <div class="k-val" id="trPending">0</div>
                <div class="k-label">Pending Tickets</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-2">
        <div class="tr-kpi d-flex align-items-center gap-3">
            <div class="k-ico" style="background:#e7f7eb;color:#087a24;"><i class="bi bi-check-circle"></i></div>
            <div>
                <div class="k-val" id="trResolved">0</div>
                <div class="k-label">Resolved Tickets</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-2">
        <div class="tr-kpi d-flex align-items-center gap-3">
            <div class="k-ico" style="background:#ffedd5;color:#c2410c;"><i class="bi bi-arrow-counterclockwise"></i></div>
            <div>
                <div class="k-val" id="trReopened">0</div>
                <div class="k-label">Reopened Tickets</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-2">
        <div class="tr-kpi d-flex align-items-center gap-3">
            <div class="k-ico" style="background:#fdebed;color:#be3035;"><i class="bi bi-exclamation-triangle"></i></div>
            <div>
                <div class="k-val" id="trBreached">0</div>
                <div class="k-label">SLA Breached</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl-2">
        <div class="tr-kpi d-flex align-items-center gap-3">
            <div class="k-ico" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-stopwatch"></i></div>
            <div>
                <div class="k-val" id="trAvg">0h</div>
                <div class="k-label">Avg. Resolution Time</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">
    <!-- Category-wise -->
    <div class="col-lg-6">
        <div class="tr-card">
            <div class="tr-head"><i class="bi bi-tags"></i> Category-wise Tickets</div>
            <div class="tr-body" id="trCategoryBars">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>

    <!-- Priority-wise -->
    <div class="col-lg-6">
        <div class="tr-card">
            <div class="tr-head"><i class="bi bi-flag"></i> Priority-wise Tickets</div>
            <div class="tr-body" id="trPriorityBars">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">
    <!-- Department-wise -->
    <div class="col-lg-6">
        <div class="tr-card">
            <div class="tr-head"><i class="bi bi-building"></i> Department-wise Tickets</div>
            <div class="tr-body" id="trDeptBars">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>

    <!-- Status distribution -->
    <div class="col-lg-6">
        <div class="tr-card">
            <div class="tr-head"><i class="bi bi-diagram-2"></i> Status Distribution</div>
            <div class="tr-body" id="trStatusBars">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">
    <!-- Employee-wise -->
    <div class="col-lg-6">
        <div class="tr-card">
            <div class="tr-head"><i class="bi bi-people"></i> Employee-wise Tickets</div>
            <div class="tr-body p-0">
                <table class="tr-mini-table">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th class="num">Tickets</th>
                            <th class="num">Open</th>
                            <th class="num">Resolved</th>
                        </tr>
                    </thead>
                    <tbody id="trEmployeeRows"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SLA breach table -->
    <div class="col-lg-6">
        <div class="tr-card">
            <div class="tr-head"><i class="bi bi-exclamation-triangle" style="color:#be3035;"></i> SLA Breached Tickets</div>
            <div class="tr-body p-0">
                <table class="tr-mini-table">
                    <thead>
                        <tr>
                            <th>Ticket</th>
                            <th>Priority</th>
                            <th>Created</th>
                            <th class="num">Overdue By</th>
                        </tr>
                    </thead>
                    <tbody id="trSlaRows"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Monthly summary -->
<div class="tr-card mb-3">
    <div class="tr-head"><i class="bi bi-calendar-month"></i> Monthly Ticket Report</div>
    <div class="tr-body p-0">
        <table class="tr-mini-table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th class="num">Created</th>
                    <th class="num">Resolved</th>
                    <th class="num">Reopened</th>
                    <th class="num">SLA Breached</th>
                    <th class="num">Avg. Resolution (hrs)</th>
                </tr>
            </thead>
            <tbody id="trMonthlyRows"></tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="./assets/js/ticketing-data.js"></script>
<script src="./assets/js/pages/ticket-reports.js?v=<?php echo time(); ?>"></script>
