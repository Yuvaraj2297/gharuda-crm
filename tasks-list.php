<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/date-picker.css">

<style>
    /* ===== Date Picker Custom Styling matching view-leave reference image ===== */
    .tk-page .date-picker {
        position: relative;
        width: 100%;
    }

    .tk-page .date-picker .date-input {
        width: 100% !important;
        height: 44px !important;
        border-radius: 12px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 9px 14px !important;
        font-size: 13.5px !important;
        font-weight: 600 !important;
        color: #1e293b !important;
        background-color: #ffffff !important;
        transition: all 0.2s ease !important;
    }

    .tk-page .date-picker .date-input:hover,
    .tk-page .date-picker .date-input:focus {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3.5px rgba(16, 185, 129, 0.18) !important;
        outline: none !important;
    }

    .tk-page .date-picker .date-input::placeholder {
        color: #9ca3af !important;
        font-weight: 500 !important;
    }

    .tk-page .date-picker {
        position: relative !important;
        z-index: 1050;
    }

    .tk-page .date-picker:focus-within {
        z-index: 1060;
    }

    /* Popup Calendar Styling matching view-leave image */
    .calendar-dropdown {
        position: absolute !important;
        z-index: 999999 !important;
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 16px !important;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.18) !important;
        outline: none !important;
    }

    .calendar-header {
        background: #16a34a !important;
        border-radius: 14px 14px 0 0 !important;
        padding: 10px 14px !important;
    }

    .calendar-header .custom-select {
        background: rgba(255, 255, 255, 0.2) !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        border-radius: 8px !important;
    }

    .calendar-header .month-input,
    .calendar-header .year-input {
        color: #ffffff !important;
        font-weight: 700 !important;
    }

    .calendar-header .select-arrow {
        color: #ffffff !important;
    }

    .calendar-header .nav-btn {
        background: rgba(255, 255, 255, 0.2) !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        color: #ffffff !important;
        border-radius: 8px !important;
    }

    .weekdays {
        background: #f1f5f9 !important;
        color: #334155 !important;
        font-weight: 700 !important;
    }

    .days .day.selected {
        border: 1.5px solid #10b981 !important;
        color: #16a34a !important;
        font-weight: 700 !important;
        border-radius: 8px !important;
        background: #f0fdf4 !important;
    }

    .days .day:hover {
        background: #dcfce7 !important;
        color: #15803d !important;
        border-radius: 8px !important;
    }

    .today-btn {
        color: #16a34a !important;
        font-weight: 700 !important;
    }

    .clear-btn {
        color: #64748b !important;
        font-weight: 600 !important;
    }

<?php
/* ---------------------------------------------------------------
   Tasks List — "Tasks" (namba flow design).

   Flow (reference la irundhu):
     1. Title row  — New Task button
     2. Filter by  — Staff Members / Status / From Date / To Date /
                     Project / QC Status + Search
     3. Alert      — overdue tasks + quick filter buttons
                     (Today's Dead Line / Upcoming / Today's / Due Date
                      Passed / Reset Filters)
     4. Tasks Summary — Not Started · In Progress · Testing ·
                     Awaiting Feedback · Complete
     5. Task table — MasterTable (checkbox + S.No, name meta, status,
                     progress donut, dates, rating, assignee, tags,
                     priority). Toolbar + pagination auto-built.

   Design: title row (gradient icon tile + breadcrumb), white filter
   card with Select2, amber alert card with coloured quick chips,
   coloured summary strip, namba table with pills / donuts / avatars.
---------------------------------------------------------------- */
?>

<style>
    /* ===== Tasks List — scoped to .tk-page ===== */

    .tk-page .tk-title-ico {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        box-shadow: 0 8px 18px rgba(22, 163, 74, .28);
        flex-shrink: 0;
    }

    .tk-page .tk-new-btn {
        font-size: 12.5px;
        font-weight: 800;
        border: none;
        border-radius: 11px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: #fff;
        box-shadow: 0 4px 12px rgba(22, 163, 74, .3);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: .15s;
    }

    .tk-page .tk-new-btn:hover {
        background: linear-gradient(135deg, #15803d, #166534);
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(22, 163, 74, .32);
    }

    /* ===== Card shell ===== */
    .tk-page .tk-card {
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        box-shadow: 0 2px 10px rgba(20, 20, 43, .04);
        margin-bottom: 16px;
        overflow: visible !important;
        position: relative;
        /* table card-kku .card-custom kuduthirukkom (master-table toolbar/footer
           build aaga) — adhu padding-a neekkirom, inner sections-kku
           thangalukkana padding already irukku */
        padding: 0;
    }

    .tk-page .tk-card-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        padding: 14px 18px;
        border-bottom: 1px solid #f1f4f7;
        background: #fbfdfc;
    }

    .tk-page .tk-card-title {
        font-size: 14px;
        font-weight: 800;
        color: var(--ink-900);
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin: 0;
    }

    .tk-page .tk-card-title i {
        color: var(--primary);
    }

    .tk-page .tk-card-body {
        padding: 18px;
    }

    /* ===== Filter strip ===== */
    .tk-page .tk-filter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 14px 16px;
    }

    .tk-page .tk-fld .lbl {
        display: block;
        font-size: 11.5px;
        font-weight: 800;
        color: var(--ink-500);
        letter-spacing: .02em;
        margin-bottom: 6px;
    }

    .tk-page .tk-date {
        width: 100%;
        font-size: 13px;
        font-weight: 600;
        color: var(--ink-900);
        border: 1.5px solid #E3E5F5;
        border-radius: 10px;
        padding: 9px 12px;
        background: #fff;
        transition: .15s;
    }

    .tk-page .tk-date:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px var(--primary-light);
    }

    .tk-page .tk-filter-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 16px;
    }

    .tk-page .tk-search-btn {
        font-size: 12.5px;
        font-weight: 800;
        border: none;
        border-radius: 10px;
        padding: 10px 26px;
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: #fff;
        box-shadow: 0 2px 6px rgba(22, 163, 74, .3);
        transition: .15s;
    }

    .tk-page .tk-search-btn:hover {
        background: linear-gradient(135deg, #15803d, #166534);
        transform: translateY(-1px);
    }

    .tk-page .tk-ghost-btn {
        font-size: 12.5px;
        font-weight: 800;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        background: #fff;
        color: var(--ink-700);
        padding: 10px 18px;
        transition: .15s;
    }

    .tk-page .tk-ghost-btn:hover {
        border-color: var(--primary);
        color: var(--primary-dark);
        background: var(--primary-soft);
    }

    /* ===== Overdue alert ===== */
    .tk-page .tk-alert {
        background: linear-gradient(120deg, #fff7ed, #ffffff 65%);
        border: 1px solid #fed7aa;
        border-radius: 16px;
        padding: 16px 18px;
        margin-bottom: 16px;
    }

    .tk-page .tk-alert-top {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .tk-page .tk-alert-ico {
        width: 38px;
        height: 38px;
        border-radius: 12px;
        background: #ffedd5;
        color: #c2410c;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
    }

    .tk-page .tk-alert-title {
        font-size: 13.5px;
        font-weight: 800;
        color: #9a3412;
    }

    .tk-page .tk-alert-title b {
        color: #c2410c;
    }

    .tk-page .tk-alert-sub {
        font-size: 12px;
        font-weight: 600;
        color: #9a6b4a;
        margin-top: 2px;
    }

    .tk-page .tk-quick {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 14px;
    }

    .tk-page .tk-quick-btn {
        font-size: 11.5px;
        font-weight: 800;
        border: none;
        border-radius: 9px;
        padding: 8px 14px;
        color: #fff;
        transition: .15s;
    }

    .tk-page .tk-quick-btn:hover {
        transform: translateY(-1px);
        filter: brightness(.95);
    }

    .tk-page .tk-quick-btn.active {
        box-shadow: 0 0 0 3px rgba(17, 24, 39, .1);
    }

    .tk-page .tk-quick-btn.q-green { background: #16a34a; }
    .tk-page .tk-quick-btn.q-blue { background: #2563eb; }
    .tk-page .tk-quick-btn.q-red { background: #dc2626; }
    .tk-page .tk-quick-btn.q-maroon { background: #9f1239; }
    .tk-page .tk-quick-btn.q-amber { background: #f59e0b; }

    /* ===== Tasks summary ===== */
    .tk-page .tk-sum-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
        gap: 0;
    }

    .tk-page .tk-sum {
        padding: 4px 18px;
        border-right: 1px solid #f1f4f7;
    }

    .tk-page .tk-sum:last-child {
        border-right: none;
    }

    .tk-page .tk-sum .num {
        font-size: 24px;
        font-weight: 800;
        line-height: 1.1;
    }

    .tk-page .tk-sum .lbl {
        font-size: 12.5px;
        font-weight: 800;
        margin-left: 8px;
    }

    .tk-page .tk-sum .sub {
        font-size: 10.5px;
        font-weight: 700;
        color: var(--ink-500);
        margin-top: 4px;
    }

    .tk-page .tk-sum .bar {
        height: 5px;
        border-radius: 999px;
        background: #eef0f3;
        margin-top: 9px;
        overflow: hidden;
    }

    .tk-page .tk-sum .bar span {
        display: block;
        height: 100%;
        border-radius: 999px;
        transition: width .35s ease;
    }

    /* status colours */
    .tk-page .s-not-started { color: #64748b; }
    .tk-page .s-in-progress { color: #2563eb; }
    .tk-page .s-testing { color: #b45309; }
    .tk-page .s-awaiting { color: #7c3aed; }
    .tk-page .s-complete { color: #16a34a; }

    .tk-page .bars-not-started span { background: #94a3b8; }
    .tk-page .bars-in-progress span { background: #2563eb; }
    .tk-page .bars-testing span { background: #f59e0b; }
    .tk-page .bars-awaiting span { background: #7c3aed; }
    .tk-page .bars-complete span { background: #16a34a; }

    /* ===== Table cells ===== */
    .tk-page .tk-name-cell {
        display: flex;
        flex-direction: column;
        gap: 2px;
        max-width: 300px;
    }

    .tk-page .tk-name {
        font-weight: 700;
        color: #2563eb;
        font-size: 12.5px;
        line-height: 1.35;
        white-space: normal;
    }

    .tk-page .tk-meta {
        font-size: 10.5px;
        font-weight: 700;
        color: var(--ink-500);
    }

    .tk-page .tk-meta.is-overdue {
        color: #dc2626;
    }

    .tk-page .tk-warn {
        color: #f59e0b;
        font-size: 13px;
    }

    .tk-page .tk-no {
        font-weight: 800;
        color: var(--ink-900);
        font-size: 12.5px;
    }

    /* Status pill */
    .tk-page .tk-pill {
        display: inline-block;
        font-size: 10.5px;
        font-weight: 800;
        padding: 4px 11px;
        border-radius: 999px;
        white-space: nowrap;
    }

    .tk-page .tk-pill.st-not-started { background: #f1f5f9; color: #475569; }
    .tk-page .tk-pill.st-in-progress { background: #dbeafe; color: #1d4ed8; }
    .tk-page .tk-pill.st-testing { background: #fef3c7; color: #b45309; }
    .tk-page .tk-pill.st-awaiting { background: #ede9fe; color: #6d28d9; }
    .tk-page .tk-pill.st-complete { background: #dcfce7; color: #15803d; }

    /* Progress donut */
    .tk-page .tk-donut {
        --p: 0;
        position: relative;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: conic-gradient(var(--dc, #16a34a) calc(var(--p) * 1%), #eef0f3 0);
    }

    .tk-page .tk-donut::after {
        content: '';
        position: absolute;
        inset: 4px;
        border-radius: 50%;
        background: #fff;
    }

    .tk-page .tk-donut b {
        position: relative;
        font-size: 9.5px;
        font-weight: 800;
        color: var(--ink-700);
    }

    .tk-page .tk-date-txt {
        font-size: 12px;
        font-weight: 600;
        color: var(--ink-700);
        white-space: nowrap;
    }

    .tk-page .tk-date-txt.is-overdue {
        color: #dc2626;
        font-weight: 800;
    }

    .tk-page .tk-muted {
        color: var(--ink-500);
        font-weight: 700;
        font-size: 11.5px;
    }

    /* Assignee + followers avatars */
    .tk-page .tk-avatar {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 800;
        color: #fff;
        flex-shrink: 0;
        box-shadow: 0 0 0 2px #fff;
    }

    .tk-page .tk-avatar.av-violet { background: #6d28d9; }
    .tk-page .tk-avatar.av-amber { background: #eab308; }
    .tk-page .tk-avatar.av-blue { background: #2563eb; }
    .tk-page .tk-avatar.av-green { background: #16a34a; }
    .tk-page .tk-avatar.av-rose { background: #e11d48; }
    .tk-page .tk-avatar.av-grey { background: #94a3b8; }

    .tk-page .tk-avatars {
        display: inline-flex;
        align-items: center;
    }

    .tk-page .tk-avatars .tk-avatar {
        margin-left: -8px;
    }

    .tk-page .tk-avatars .tk-avatar:first-child {
        margin-left: 0;
    }

    .tk-page .tk-avatars .more {
        margin-left: -8px;
        background: #eef1f6;
        color: #64748b;
    }

    /* Tags */
    .tk-page .tk-tag {
        display: inline-block;
        font-size: 10px;
        font-weight: 800;
        border-radius: 6px;
        padding: 3px 8px;
        background: var(--primary-soft);
        color: var(--primary-dark);
        margin: 2px 3px 2px 0;
        white-space: nowrap;
    }

    /* Priority */
    .tk-page .tk-pri {
        display: inline-block;
        font-size: 10.5px;
        font-weight: 800;
        border-radius: 999px;
        padding: 4px 12px;
        white-space: nowrap;
    }

    .tk-page .tk-pri.p-high { background: #fee2e2; color: #b91c1c; }
    .tk-page .tk-pri.p-medium { background: #fef3c7; color: #b45309; }
    .tk-page .tk-pri.p-low { background: #dbeafe; color: #1d4ed8; }

    /* ===== New Task modal ===== */
    .tk-modal .modal-dialog {
        max-width: 620px;
    }

    .tk-modal .modal-content {
        border: none;
        border-radius: 16px;
        box-shadow: 0 20px 50px rgba(17, 24, 39, .18);
    }

    .tk-modal .modal-header {
        border-bottom: 1px solid #eef0f3;
        padding: 16px 20px;
    }

    .tk-modal .modal-title {
        font-size: 15.5px;
        font-weight: 800;
        color: #111827;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .tk-modal .modal-title i {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: var(--primary-soft);
        color: var(--primary-dark);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
    }

    .tk-modal .modal-body {
        padding: 20px;
    }

    .tk-modal .form-label {
        font-size: 12px;
        font-weight: 800;
        color: #374151;
        margin-bottom: 5px;
    }

    .tk-modal .form-control,
    .tk-modal .form-select {
        font-size: 13px;
        border-radius: 10px;
        border-color: #e5e7eb;
        padding: 9px 12px;
    }

    .tk-modal .form-control:focus,
    .tk-modal .form-select:focus {
        border-color: #86efac;
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .tk-modal .modal-footer {
        border-top: 1px solid #eef0f3;
        padding: 14px 20px;
    }

    /* ===== Toast ===== */
    .tk-toast-wrap {
        position: fixed;
        top: 16px;
        right: 16px;
        z-index: 2000;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .tk-toast {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        background: #dcfce7;
        color: #15803d;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        padding: 12px 14px;
        min-width: 300px;
        max-width: 400px;
        box-shadow: 0 8px 24px rgba(21, 128, 61, .18);
        font-size: 12.5px;
        font-weight: 600;
        line-height: 1.45;
        animation: tkToastIn .25s ease;
    }

    @keyframes tkToastIn {
        from { opacity: 0; transform: translateX(24px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .tk-toast.tk-toast-out {
        opacity: 0;
        transform: translateX(24px);
        transition: opacity .25s ease, transform .25s ease;
    }

    .tk-toast .tk-toast-ico {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        background: #16a34a;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
    }

    .tk-toast .tk-toast-x {
        border: none;
        background: transparent;
        color: #15803d;
        font-size: 14px;
        cursor: pointer;
        padding: 0 0 0 6px;
        line-height: 1;
        flex-shrink: 0;
        opacity: .7;
    }

    .tk-toast .tk-toast-x:hover {
        opacity: 1;
    }

    @media (max-width: 767px) {
        .tk-page .tk-sum {
            border-right: none;
            border-bottom: 1px solid #f1f4f7;
            padding: 12px 18px;
        }

        .tk-page .tk-sum:last-child {
            border-bottom: none;
        }
    }
</style>

<main class="tk-page">

    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="tk-title-ico"><i class="bi bi-check2-square"></i></div>
            <div>
                <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Tasks</h1>
                <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
                    <span>Project Management</span>
                    <i class="bi bi-chevron-right" style="font-size:10px;"></i>
                    <span>Tasks</span>
                    <i class="bi bi-chevron-right" style="font-size:10px;"></i>
                    <span class="fw-bold text-dark">Tasks List</span>
                </nav>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="task-overview.php" class="tk-ghost-btn text-decoration-none d-inline-flex align-items-center gap-2" style="padding: 10px 18px; border-radius: 11px; font-weight:800;">
                <i class="bi bi-grid-3x3-gap-fill"></i>Task Overview
            </a>
            <a href="task-create.php" class="tk-new-btn text-decoration-none" id="tkNewBtn">
                <i class="bi bi-plus-lg"></i>New Task
            </a>
        </div>
    </div>

    <!-- ===== Filter by ===== -->
    <div class="tk-card">
        <div class="tk-card-head">
            <h2 class="tk-card-title"><i class="bi bi-funnel-fill"></i>Filter by</h2>
        </div>
        <div class="tk-card-body">
            <div class="tk-filter-grid">
                <div class="tk-fld">
                    <label class="lbl" for="tkStaff">Staff Members</label>
                    <select class="form-select select2" id="tkStaff"></select>
                </div>
                <div class="tk-fld">
                    <label class="lbl" for="tkStatus">Status</label>
                    <select class="form-select select2" id="tkStatus"></select>
                </div>
                <div class="tk-fld">
                    <label class="lbl" for="tkFrom">From Date</label>
                    <div class="date-picker">
                        <input type="text" class="date-input tk-date form-control" id="tkFrom" placeholder="Select date" autocomplete="off">
                    </div>
                </div>
                <div class="tk-fld">
                    <label class="lbl" for="tkTo">To Date</label>
                    <div class="date-picker">
                        <input type="text" class="date-input tk-date form-control" id="tkTo" placeholder="Select date" autocomplete="off">
                    </div>
                </div>
                <div class="tk-fld">
                    <label class="lbl" for="tkProject">Project</label>
                    <select class="form-select select2" id="tkProject"></select>
                </div>
                <div class="tk-fld">
                    <label class="lbl" for="tkQc">QC Status</label>
                    <select class="form-select select2" id="tkQc"></select>
                </div>
            </div>
            <div class="tk-filter-actions">
                <button type="button" class="tk-search-btn" id="tkSearchBtn">Search</button>
                <button type="button" class="tk-ghost-btn" id="tkClearBtn">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Clear
                </button>
            </div>
        </div>
    </div>

    <!-- ===== Overdue alert + quick filters ===== -->
    <div class="tk-alert">
        <div class="tk-alert-top">
            <span class="tk-alert-ico"><i class="bi bi-exclamation-triangle-fill"></i></span>
            <div>
                <div class="tk-alert-title">Alert: <b id="tkOverdueCount">0</b> Tasks Overdue</div>
                <div class="tk-alert-sub">You currently have <span id="tkOverdueCount2">0</span> tasks in progress with due dates that have already passed.</div>
            </div>
        </div>
        <div class="tk-quick">
            <button type="button" class="tk-quick-btn q-green" data-quick="todayDeadline">Today's Dead Line Task</button>
            <button type="button" class="tk-quick-btn q-blue" data-quick="upcoming">Upcoming Task</button>
            <button type="button" class="tk-quick-btn q-red" data-quick="todayTask">Today's Task</button>
            <button type="button" class="tk-quick-btn q-maroon" data-quick="duePassed">Due Date Passed Task</button>
            <button type="button" class="tk-quick-btn q-amber" data-quick="reset">Reset Filters</button>
        </div>
    </div>

    <!-- ===== Tasks summary ===== -->
    <div class="tk-card">
        <div class="tk-card-head">
            <h2 class="tk-card-title"><i class="bi bi-clipboard-data-fill"></i>Tasks Summary</h2>
        </div>
        <div class="tk-card-body p-0">
            <div class="tk-sum-grid" id="tkSumGrid"></div>
        </div>
    </div>

    <!-- ===== Task table (toolbar + footer auto-created by master-table.js) =====
         NOTE: `.card-custom` MUST stay on this wrapper — master-table.js does
         table.closest('.card-custom') to inject the Columns/Export/search
         toolbar + pagination footer. -->
    <div class="tk-card card-custom">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0" id="tkTable">
                <thead>
                    <tr>
                        <th style="width:90px;" class="text-nowrap">S.No</th>
                        <th style="width:70px;">#</th>
                        <th class="text-nowrap" style="min-width:250px;">Name</th>
                        <th class="text-nowrap" style="width:130px;">Dependency Task</th>
                        <th class="text-nowrap" style="width:140px;">Status</th>
                        <th class="text-nowrap" style="width:90px;">Progress</th>
                        <th class="text-nowrap" style="width:115px;">Start Date</th>
                        <th class="text-nowrap" style="width:115px;">Due Date</th>
                        <th class="text-nowrap" style="width:120px;">Completed Date</th>
                        <th class="text-nowrap" style="width:100px;">Time Taken</th>
                        <th class="text-nowrap" style="width:80px;">Rating</th>
                        <th class="text-nowrap" style="width:100px;">Assigned to</th>
                        <th class="text-nowrap" style="width:120px;">Followers</th>
                        <th class="text-nowrap" style="width:150px;">Tags</th>
                        <th class="text-nowrap" style="width:100px;">Priority</th>
                    </tr>
                </thead>
                <tbody id="tkTbody">
                    <!-- rows injected by master-table.js -->
                </tbody>
            </table>
        </div>
    </div>

</main>

<!-- ===== New Task modal ===== -->
<div class="modal fade tk-modal" id="tkModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-plus-square-fill"></i>New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">* Task Name</label>
                        <input type="text" class="form-control" id="tkNewName" placeholder="Ex: Appointment: Contact name [ Sundar ]" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Project</label>
                        <select class="form-select" id="tkNewProject"></select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Assigned To</label>
                        <select class="form-select" id="tkNewAssigned"></select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">* Start Date</label>
                        <input type="date" class="form-control" id="tkNewStart">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">* Due Date</label>
                        <input type="date" class="form-control" id="tkNewDue">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Priority</label>
                        <select class="form-select" id="tkNewPriority">
                            <option value="High">High</option>
                            <option value="Medium" selected>Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="tkNewStatus"></select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tkNewSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="./assets/js/pages/tasks-list.js?v=<?php echo time(); ?>"></script>

<script src="./assets/js/date-picker.js"></script>
