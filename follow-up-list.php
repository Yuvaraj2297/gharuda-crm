<?php include 'header.php'; ?>

<?php
/* ---------------------------------------------------------------
   Follow Up List — lead.php Activity Stats "Follow Up" card click
   la open aagum. Range (today/weekly/monthly) + type (actual/completed)
   GET params vechu pre-set aagum.
---------------------------------------------------------------- */
$range = isset($_GET['range']) ? $_GET['range'] : 'today';
if (!in_array($range, ['today', 'weekly', 'monthly'], true)) $range = 'today';
$type = isset($_GET['type']) ? $_GET['type'] : 'actual';
if (!in_array($type, ['actual', 'completed'], true)) $type = 'actual';
?>

<style>
    /* ===== Follow Up List page — scoped to .ful-page ===== */
    .ful-page .ful-date-range {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-700);
        white-space: nowrap;
    }

    .ful-page .ful-date-range i {
        color: var(--primary);
    }

    /* ----- Range summary cards (matrix table oda improved version) ----- */
    .ful-page .ful-card {
        position: relative;
        height: 100%;
        overflow: hidden;
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        box-shadow: 0 2px 10px rgba(20, 20, 43, .04);
        padding: 14px 16px;
        cursor: pointer;
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }

    .ful-page .ful-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(20, 30, 20, .1);
    }

    .ful-page .ful-card.active {
        border-color: rgba(22, 163, 74, .45);
        box-shadow: 0 10px 26px rgba(22, 163, 74, .14), 0 0 0 3px rgba(22, 163, 74, .08);
    }

    .ful-page .ful-card::before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), #4ade80);
        opacity: .35;
        transition: opacity .18s ease;
    }

    .ful-page .ful-card.active::before {
        opacity: 1;
    }

    .ful-page .ful-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }

    .ful-page .ful-card-title {
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .04em;
        text-transform: uppercase;
        color: var(--ink-500);
    }

    .ful-page .ful-card-ico {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        background: var(--primary-light);
        color: var(--primary-dark);
        flex: 0 0 auto;
    }

    .ful-page .ful-card-num {
        font-size: 26px;
        font-weight: 800;
        color: var(--ink-900);
        line-height: 1.1;
        margin-top: 8px;
    }

    .ful-page .ful-card-sub {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--ink-500);
        margin-top: 2px;
    }

    .ful-page .ful-card-sub b {
        color: var(--primary-dark);
    }

    .ful-page .ful-card-sub.zero {
        color: var(--ink-500);
    }

    .ful-page .ful-card-sub .ful-sub-danger {
        color: #e5484d;
    }

    /* ----- Actual / Completed toggle ----- */
    .ful-page .ful-type-toggle {
        display: inline-flex;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
    }

    .ful-page .ful-type-toggle button {
        border: none;
        background: transparent;
        padding: 8px 16px;
        font-size: 12px;
        font-weight: 800;
        color: var(--ink-500);
        cursor: pointer;
        transition: .15s;
    }

    .ful-page .ful-type-toggle button.active {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .ful-page .ful-type-toggle button+button {
        border-left: 1px solid #eef0f3;
    }

    /* ----- Total value chip ----- */
    .ful-page .ful-total-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #f0fbf3 0%, #ffffff 80%);
        border: 1px solid rgba(22, 163, 74, .35);
        border-radius: 12px;
        padding: 8px 14px;
        font-size: 12px;
        font-weight: 700;
        color: var(--ink-700);
        white-space: nowrap;
    }

    .ful-page .ful-total-chip b {
        font-size: 14px;
        font-weight: 800;
        color: var(--primary-dark);
    }

    /* ----- Status / call chips ----- */
    .ful-page .ful-chip {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .ful-page .ful-chip.c-green { background: #dcfce7; color: #16a34a; }
    .ful-page .ful-chip.c-blue  { background: #dbeafe; color: #2563eb; }
    .ful-page .ful-chip.c-amber { background: #fef3c7; color: #d97706; }
    .ful-page .ful-chip.c-violet{ background: #ede9fe; color: #7c3aed; }
    .ful-page .ful-chip.c-red   { background: #fee2e2; color: #dc2626; }
    .ful-page .ful-chip.c-gray  { background: #f1f5f9; color: #64748b; }

    .ful-page .ful-name {
        font-weight: 700;
        color: var(--ink-900);
        text-decoration: none;
        cursor: default;
    }

    .ful-page .ful-name:hover {
        /* color: var(--primary-dark); */
        /* text-decoration: underline; */
    }

    .ful-page .ful-phone {
        color: var(--ink-700);
        text-decoration: none;
        white-space: nowrap;
    }

    .ful-page .ful-phone:hover {
        color: var(--primary-dark);
    }

    .ful-page .ful-val {
        font-weight: 800;
        color: var(--ink-900);
        white-space: nowrap;
    }

    .ful-page .table-modern thead th,
    .ful-page .table-modern tbody td {
        white-space: nowrap;
    }

    .ful-page .ful-empty {
        text-align: center;
        padding: 34px 10px !important;
        color: var(--ink-500);
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .ful-page .ful-card-num { font-size: 22px; }
    }
</style>

<main class="ful-page">
    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Follow Up List</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
                <i class="bi bi-person-lines-fill fs-6"></i>
                <span>CRM</span>
                <i class="bi bi-chevron-right"></i>
                <a href="lead.php" style="text-decoration:none;color:inherit;">Leads</a>
                <i class="bi bi-chevron-right"></i>
                <span class="fw-bold text-dark">Follow Up List</span>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <div class="ful-type-toggle" id="fulTypeToggle">
                <button type="button" data-type="actual">Actual</button>
                <button type="button" data-type="completed">Completed</button>
            </div>
            <div class="ful-date-range">
                <i class="bi bi-calendar3 me-1"></i>Date: <span id="fulToday"></span>
            </div>
        </div>
    </div>

    <!-- ===== Range summary cards (Activity / Closure matrix oda info, improved) ===== -->
    <div class="row g-3 mb-3">
        <div class="col-lg-4 col-md-6">
            <div class="ful-card" data-range="today">
                <div class="ful-card-top">
                    <span class="ful-card-title">Today Follow Up</span>
                    <span class="ful-card-ico"><i class="bi bi-sun"></i></span>
                </div>
                <div class="ful-card-num" id="fulCnt-today">0</div>
                <div class="ful-card-sub">Completed: <b id="fulCntDone-today">0</b></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="ful-card" data-range="weekly">
                <div class="ful-card-top">
                    <span class="ful-card-title">This Week</span>
                    <span class="ful-card-ico"><i class="bi bi-calendar-week"></i></span>
                </div>
                <div class="ful-card-num" id="fulCnt-weekly">0</div>
                <div class="ful-card-sub">Completed: <b id="fulCntDone-weekly">0</b></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="ful-card" data-range="monthly">
                <div class="ful-card-top">
                    <span class="ful-card-title">This Month</span>
                    <span class="ful-card-ico"><i class="bi bi-calendar3"></i></span>
                </div>
                <div class="ful-card-num" id="fulCnt-monthly">0</div>
                <div class="ful-card-sub">Completed: <b id="fulCntDone-monthly">0</b></div>
            </div>
        </div>
    </div>

    <!-- ===== Filters ===== -->
    <form class="card-custom mb-3 filters-card" autocomplete="off" onsubmit="return false;">
        <div class="row g-3 align-items-end">
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label" for="fulFrom">From Date</label>
                <input type="date" class="form-control" id="fulFrom">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label" for="fulTo">To Date</label>
                <input type="date" class="form-control" id="fulTo">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label" for="fulAssigned">Assigned</label>
                <select class="form-select select2" id="fulAssigned">
                    <option value="">Non selected</option>
                    <option>GHARUDA SOFTWARE</option>
                    <option>Harish D.</option>
                    <option>Divya A.</option>
                    <option>Karthik R.</option>
                    <option>Priya S.</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <label class="form-label" for="fulStatus">Status</label>
                <select class="form-select select2" id="fulStatus" multiple>
                    <option selected>Lead</option>
                    <option selected>Quotation</option>
                    <option selected>Followup</option>
                    <option selected>Qualified</option>
                    <option selected>DIRECT</option>
                    <option>New Enquiry</option>
                    <option>New</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-reject flex-fill text-nowrap" id="fulClear">Clear</button>
                    <button type="button" class="btn btn-primary flex-fill text-nowrap" id="fulSubmit">
                        <i class="bi bi-funnel me-1"></i>Submit
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- ===== Table card (MasterTable flow — toolbar/footer/search/export auto) ===== -->
    <div class="card-custom p-0 overflow-hidden">
        <!-- Total value + count chip (MasterTable toolbar ku mela) -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 px-3 pt-3 pb-0">
            <div class="ful-total-chip">
                <i class="bi bi-cash-stack" style="color:var(--primary-dark);"></i>
                Total Value : <b id="fulTotalValue">₹ 0.00</b>
            </div>
            <div class="small text-muted text-nowrap" id="fulShowing">Showing 0 follow-ups</div>
        </div>
        <!-- Table (toolbar auto-created by master-table.js) -->
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0" id="fulTable">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Company Name</th>
                        <th>Lead Value</th>
                        <th>Closure Date</th>
                        <th>Next Reminder Date</th>
                        <th>Product</th>
                        <th>Assigned</th>
                        <th>Sourcer</th>
                        <th>Status</th>
                        <th>Call Status</th>
                    </tr>
                </thead>
                <tbody id="fulTbody">
                    <!-- Rows injected by master-table.js -->
                </tbody>
            </table>
        </div>
        <!-- Footer (showing + pagination auto-created by master-table.js) -->
    </div>
</main>

<?php include 'footer.php'; ?>

<script src="./assets/js/pages/follow-up-list.js?v=<?php echo time(); ?>"></script>
