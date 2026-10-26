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

<script>
    (function() {
        'use strict';

        /* ---------------- Constants ---------------- */
        var STATUS_POOL = ['Not Started', 'In Progress', 'Testing', 'Awaiting Feedback', 'Complete'];

        var STATUS_PILL = {
            'Not Started': 'st-not-started',
            'In Progress': 'st-in-progress',
            'Testing': 'st-testing',
            'Awaiting Feedback': 'st-awaiting',
            'Complete': 'st-complete'
        };

        var STATUS_COLOR = {
            'Not Started': '#94a3b8',
            'In Progress': '#2563eb',
            'Testing': '#f59e0b',
            'Awaiting Feedback': '#7c3aed',
            'Complete': '#16a34a'
        };

        var SUMMARY = [
            { status: 'Not Started', cls: 's-not-started', bar: 'bars-not-started' },
            { status: 'In Progress', cls: 's-in-progress', bar: 'bars-in-progress' },
            { status: 'Testing', cls: 's-testing', bar: 'bars-testing' },
            { status: 'Awaiting Feedback', cls: 's-awaiting', bar: 'bars-awaiting' },
            { status: 'Complete', cls: 's-complete', bar: 'bars-complete' }
        ];

        var STAFF = ['Harish D.', 'Divya A.', 'Priya S.', 'Karthik R.', 'Meena V.', 'Arun K.'];
        var ME = 'Harish D.';
        var PROJECTS = ['ERP Implementation', 'Solar AMC', 'HRMS Rollout', 'Website Revamp', 'Inventory App'];
        var QC_STATUSES = ['Pending', 'Passed', 'Failed'];
        var TAGS = ['Urgent', 'ERP', 'AMC', 'Client', 'Internal', 'Solar', 'Support'];
        var WORKS = ['Appointment', 'Follow-up', 'Site Visit', 'Demo', 'Documentation', 'Quotation', 'Installation', 'Support Call', 'Training', 'Audit'];
        var CLIENTS = ['Sundar', 'Shalu', 'Raj Kumar', 'Divya', 'Karthik', 'Meena', 'Arun', 'Priya', 'Vetri', 'Naveen'];

        var AV_CLASSES = ['av-violet', 'av-amber', 'av-blue', 'av-green', 'av-rose', 'av-grey'];

        /* Status plan — reference summary distribution (30/37/1/1/36 = 105) */
        var STATUS_PLAN = [];
        (function() {
            var plan = [
                ['Not Started', 30],
                ['In Progress', 37],
                ['Testing', 1],
                ['Awaiting Feedback', 1],
                ['Complete', 36]
            ];
            plan.forEach(function(p) {
                for (var i = 0; i < p[1]; i++) STATUS_PLAN.push(p[0]);
            });
        })();

        var TOTAL = STATUS_PLAN.length;   /* 105 */

        /* ---------------- Helpers ---------------- */
        function pad2(n) { return (n < 10 ? '0' : '') + n; }

        function mulberry32(a) {
            return function() {
                a |= 0;
                a = a + 0x6D2B79F5 | 0;
                var t = Math.imul(a ^ a >>> 15, 1 | a);
                t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t;
                return ((t ^ t >>> 14) >>> 0) / 4294967296;
            };
        }

        function toISO(d) {
            return d.getFullYear() + '-' + pad2(d.getMonth() + 1) + '-' + pad2(d.getDate());
        }

        function fmtDate(iso) {
            if (!iso) return '—';
            var p = iso.split('-');
            return p[2] + '-' + p[1] + '-' + p[0];
        }

        function esc(s) {
            return String(s == null ? '' : s)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        function initials(name) {
            return String(name).trim().charAt(0).toUpperCase();
        }

        function avatarClass(name) {
            var sum = 0;
            for (var i = 0; i < name.length; i++) sum += name.charCodeAt(i);
            return AV_CLASSES[sum % AV_CLASSES.length];
        }

        function addDays(d, n) {
            var x = new Date(d.getTime());
            x.setDate(x.getDate() + n);
            return x;
        }

        /* ---------------- Data (deterministic demo set) ---------------- */
        var today = new Date();
        today.setHours(0, 0, 0, 0);
        var TODAY_ISO = toISO(today);

        function makeTasks() {
            var rows = [];
            var rnd = mulberry32(20260928);

            for (var i = 0; i < TOTAL; i++) {
                /* 37 prime-a irukkuradhala (i * 37) % 105 oru bijection —
                   statuses plan-a follow aagum aana interleave aagi varum */
                var status = STATUS_PLAN[(i * 37) % TOTAL];

                var startOffset = -Math.floor(rnd() * 70);         /* past */
                var start = addDays(today, startOffset);
                var due = addDays(start, 1 + Math.floor(rnd() * 21));

                /* Quick filter buttons-ku results irukkanum */
                if (i % 17 === 0) due = new Date(today.getTime());
                if (i % 23 === 0) start = new Date(today.getTime());

                var progress = 0;
                if (status === 'In Progress') progress = Math.floor(rnd() * 10) * 10;
                else if (status === 'Testing') progress = 90;
                else if (status === 'Awaiting Feedback') progress = 95;
                else if (status === 'Complete') progress = 100;

                var assigned = STAFF[Math.floor(rnd() * STAFF.length)];
                var fCount = Math.floor(rnd() * 3) + 1;
                var followers = [];
                for (var f = 0; f < fCount; f++) {
                    followers.push(STAFF[Math.floor(rnd() * STAFF.length)]);
                }

                var tagCount = Math.floor(rnd() * 3);
                var tags = [];
                for (var g = 0; g < tagCount; g++) {
                    var tag = TAGS[Math.floor(rnd() * TAGS.length)];
                    if (tags.indexOf(tag) === -1) tags.push(tag);
                }

                var priority = rnd() < .2 ? 'High' : (rnd() < .65 ? 'Medium' : 'Low');
                var overdue = status !== 'Complete' && due < today;

                rows.push({
                    id: i + 1,
                    no: TOTAL - i,
                    name: WORKS[Math.floor(rnd() * WORKS.length)] + ': Contact name [ ' + CLIENTS[Math.floor(rnd() * CLIENTS.length)] + ' ]',
                    dependency: i > 3 && rnd() < .28 ? '#' + (TOTAL - i + 1) : '',
                    status: status,
                    progress: progress,
                    start: toISO(start),
                    due: toISO(due),
                    completed: status === 'Complete' ? toISO(addDays(due, -1)) : '',
                    timeTaken: status === 'Complete' ? (1 + Math.floor(rnd() * 6)) + 'd ' + Math.floor(rnd() * 8) + 'h' : '',
                    rating: status === 'Complete' ? (3 + Math.floor(rnd() * 3)) + '/5' : 'NA',
                    assigned: assigned,
                    followers: followers,
                    tags: tags,
                    priority: priority,
                    project: PROJECTS[Math.floor(rnd() * PROJECTS.length)],
                    qcStatus: QC_STATUSES[Math.floor(rnd() * QC_STATUSES.length)],
                    checklistDone: Math.floor(rnd() * 4),
                    checklistTotal: 3 + Math.floor(rnd() * 4),
                    dueCrossed: overdue ? Math.floor(rnd() * 3) + 1 : 0,
                    overdue: overdue
                });
            }

            return rows;
        }

        var tasks = makeTasks();

        /* ---------------- Element refs ---------------- */
        var staffSel = document.getElementById('tkStaff');
        var statusSel = document.getElementById('tkStatus');
        var fromInput = document.getElementById('tkFrom');
        var toInput = document.getElementById('tkTo');
        var projectSel = document.getElementById('tkProject');
        var qcSel = document.getElementById('tkQc');

        var tkTable = null;
        var quickFilter = '';

        /* ---------------- Select population ---------------- */
        function fillSelect(sel, allLabel, values) {
            var html = '<option value="">' + allLabel + '</option>';
            values.forEach(function(v) {
                html += '<option value="' + esc(v) + '">' + esc(v) + '</option>';
            });
            sel.innerHTML = html;
        }

        function populateFilters() {
            fillSelect(staffSel, 'All Staff', STAFF);
            fillSelect(statusSel, 'All Statuses', STATUS_POOL);
            fillSelect(projectSel, 'All Projects', PROJECTS);
            fillSelect(qcSel, 'Select QC Status', QC_STATUSES);

            fillSelect(document.getElementById('tkNewProject'), 'Select Project', PROJECTS);
            fillSelect(document.getElementById('tkNewAssigned'), 'Select Staff', STAFF);
            fillSelect(document.getElementById('tkNewStatus'), 'Status', STATUS_POOL);
        }

        /* ---------------- Filtering ---------------- */
        function matchesQuick(t) {
            if (!quickFilter) return true;
            if (quickFilter === 'todayDeadline') return t.due === TODAY_ISO;
            if (quickFilter === 'upcoming') return t.due > TODAY_ISO;
            if (quickFilter === 'todayTask') return t.start === TODAY_ISO;
            if (quickFilter === 'duePassed') return t.overdue;
            return true;
        }

        function parseToIso(str) {
            if (!str) return '';
            if (str.indexOf('-') !== -1) {
                var parts = str.split('-');
                if (parts[0].length === 2) {
                    return parts[2] + '-' + parts[1] + '-' + parts[0];
                }
            }
            return str;
        }

        function filteredTasks() {
            var staff = staffSel.value;
            var status = statusSel.value;
            var from = fromInput ? parseToIso(fromInput.value) : '';
            var to = toInput ? parseToIso(toInput.value) : '';
            var project = projectSel.value;
            var qc = qcSel.value;

            return tasks.filter(function(t) {
                if (staff && t.assigned !== staff) return false;
                if (status && t.status !== status) return false;
                if (from && t.start < from) return false;
                if (to && t.start > to) return false;
                if (project && t.project !== project) return false;
                if (qc && t.qcStatus !== qc) return false;
                return matchesQuick(t);
            });
        }

        /* ---------------- Summary strip ---------------- */
        function renderSummary() {
            var total = tasks.length;
            document.getElementById('tkSumGrid').innerHTML = SUMMARY.map(function(s) {
                var count = tasks.filter(function(t) { return t.status === s.status; }).length;
                var mine = tasks.filter(function(t) { return t.status === s.status && t.assigned === ME; }).length;
                var pct = total > 0 ? Math.round(count / total * 100) : 0;

                return '<div class="tk-sum">' +
                    '<div><span class="num ' + s.cls + '">' + count + '</span>' +
                    '<span class="lbl ' + s.cls + '">' + s.status + '</span></div>' +
                    '<div class="bar ' + s.bar + '"><span style="width:' + pct + '%;"></span></div>' +
                    '<div class="sub">Tasks assigned to me: ' + mine + '</div>' +
                    '</div>';
            }).join('');
        }

        function renderOverdueAlert() {
            var overdue = tasks.filter(function(t) {
                return t.status !== 'Complete' && t.status !== 'Not Started' && t.overdue;
            }).length;
            var el1 = document.getElementById('tkOverdueCount');
            var el2 = document.getElementById('tkOverdueCount2');
            if (el1) el1.textContent = overdue;
            if (el2) el2.textContent = overdue;
        }

        /* ---------------- Table ---------------- */
        if (typeof MasterTable !== 'undefined') {
            tkTable = MasterTable.init({
                tableId: 'tkTable',
                tbodyId: 'tkTbody',
                idPrefix: 'tk',
                data: [],
                tableName: 'Tasks',
                primaryKey: 'id',
                showCheckbox: true,
                searchFields: ['name', 'assigned', 'project', 'status', 'priority', 'tags'],
                columns: [
                    {
                        field: 'no',
                        title: '#',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-no">' + v + '</span>';
                        }
                    },
                    {
                        field: 'name',
                        title: 'Name',
                        sortable: true,
                        render: function(v, r) {
                            return '<span class="tk-name-cell">' +
                                '<span class="tk-name">' + esc(v) + '</span>' +
                                '<span class="tk-meta' + (r.overdue ? ' is-overdue' : '') + '">Total Checklist: ' + r.checklistDone + ' / ' + r.checklistTotal + '</span>' +
                                '<span class="tk-meta' + (r.overdue ? ' is-overdue' : '') + '">Total Due Date Crossed: ' + r.dueCrossed + '</span>' +
                                (r.overdue ? '<span class="tk-warn"><i class="bi bi-exclamation-triangle-fill"></i></span>' : '') +
                                '</span>';
                        }
                    },
                    {
                        field: 'dependency',
                        title: 'Dependency Task',
                        sortable: false,
                        render: function(v) {
                            return v ? '<span class="tk-no">' + esc(v) + '</span>' : '<span class="tk-muted">—</span>';
                        }
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-pill ' + (STATUS_PILL[v] || 'st-not-started') + '">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'progress',
                        title: 'Progress',
                        sortable: true,
                        render: function(v, r) {
                            return '<span class="tk-donut" style="--p:' + v + ';--dc:' + (STATUS_COLOR[r.status] || '#16a34a') + ';"><b>' + v + '%</b></span>';
                        }
                    },
                    {
                        field: 'start',
                        title: 'Start Date',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-date-txt">' + fmtDate(v) + '</span>';
                        }
                    },
                    {
                        field: 'due',
                        title: 'Due Date',
                        sortable: true,
                        render: function(v, r) {
                            return '<span class="tk-date-txt' + (r.overdue ? ' is-overdue' : '') + '">' + fmtDate(v) + '</span>';
                        }
                    },
                    {
                        field: 'completed',
                        title: 'Completed Date',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="tk-date-txt">' + fmtDate(v) + '</span>' : '<span class="tk-muted">—</span>';
                        }
                    },
                    {
                        field: 'timeTaken',
                        title: 'Time Taken',
                        sortable: false,
                        render: function(v) {
                            return v ? '<span class="tk-date-txt">' + esc(v) + '</span>' : '<span class="tk-muted">—</span>';
                        }
                    },
                    {
                        field: 'rating',
                        title: 'Rating',
                        sortable: false,
                        render: function(v) {
                            return v === 'NA' ? '<span class="tk-muted">NA</span>' : '<span class="tk-date-txt">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'assigned',
                        title: 'Assigned to',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-avatar ' + avatarClass(v) + '" title="' + esc(v) + '">' + initials(v) + '</span>';
                        }
                    },
                    {
                        field: 'followers',
                        title: 'Followers',
                        sortable: false,
                        render: function(v) {
                            if (!v || !v.length) return '<span class="tk-muted">—</span>';
                            var shown = v.slice(0, 3);
                            var html = '<span class="tk-avatars">' + shown.map(function(f) {
                                return '<span class="tk-avatar ' + avatarClass(f) + '" title="' + esc(f) + '">' + initials(f) + '</span>';
                            }).join('');
                            if (v.length > 3) html += '<span class="tk-avatar more">+' + (v.length - 3) + '</span>';
                            return html + '</span>';
                        }
                    },
                    {
                        field: 'tags',
                        title: 'Tags',
                        sortable: false,
                        render: function(v) {
                            if (!v || !v.length) return '<span class="tk-muted">—</span>';
                            return v.map(function(t) { return '<span class="tk-tag">' + esc(t) + '</span>'; }).join('');
                        }
                    },
                    {
                        field: 'priority',
                        title: 'Priority',
                        sortable: true,
                        render: function(v) {
                            var cls = v === 'High' ? 'p-high' : (v === 'Low' ? 'p-low' : 'p-medium');
                            return '<span class="tk-pri ' + cls + '">' + esc(v) + '</span>';
                        }
                    }
                ]
            });
        }

        /* ---------------- Render ---------------- */
        function renderAll() {
            var rows = filteredTasks();
            if (tkTable) tkTable.setData(rows);
        }

        /* ---------------- Bindings ---------------- */
        document.getElementById('tkSearchBtn').addEventListener('click', function() {
            renderAll();
            showToast(filteredTasks().length + ' tasks found');
        });

        document.getElementById('tkClearBtn').addEventListener('click', function() {
            resetFilters();
            showToast('Filters cleared');
        });

        function resetFilters() {
            staffSel.value = '';
            statusSel.value = '';
            if (fromInput) fromInput.value = '';
            if (toInput) toInput.value = '';
            projectSel.value = '';
            qcSel.value = '';
            quickFilter = '';
            document.querySelectorAll('.tk-quick-btn').forEach(function(b) { b.classList.remove('active'); });

            if (window.jQuery && jQuery.fn.select2) {
                ['#tkStaff', '#tkStatus', '#tkProject', '#tkQc'].forEach(function(id) {
                    jQuery(id).val('').trigger('change.select2');
                });
            }
            renderAll();
        }

        var quickContainer = document.querySelector('.tk-quick');
        if (quickContainer) {
            quickContainer.addEventListener('click', function(e) {
                var btn = e.target.closest('.tk-quick-btn');
                if (!btn) return;
                var key = btn.getAttribute('data-quick');

                if (key === 'reset') {
                    resetFilters();
                    showToast('Filters reset');
                    return;
                }

                var same = quickFilter === key;
                quickFilter = same ? '' : key;
                this.querySelectorAll('.tk-quick-btn').forEach(function(b) {
                    b.classList.toggle('active', !same && b === btn);
                });
                renderAll();
            });
        }

        /* ---------------- New Task modal ---------------- */
        var tkModalEl = document.getElementById('tkModal');
        var tkModal = null;

        function getTkModal() {
            if (!tkModal && tkModalEl && typeof bootstrap !== 'undefined') {
                tkModal = bootstrap.Modal.getOrCreateInstance(tkModalEl);
            }
            return tkModal;
        }

        function nextTaskNo() {
            return tasks.reduce(function(max, t) { return Math.max(max, t.no); }, 0) + 1;
        }

        var newBtn = document.getElementById('tkNewBtn');
        if (newBtn && newBtn.tagName === 'BUTTON') {
            newBtn.addEventListener('click', function() {
                document.getElementById('tkNewName').value = '';
                document.getElementById('tkNewName').classList.remove('is-invalid');
                document.getElementById('tkNewStart').value = TODAY_ISO;
                document.getElementById('tkNewDue').value = toISO(addDays(today, 7));
                document.getElementById('tkNewPriority').value = 'Medium';
                document.getElementById('tkNewProject').value = '';
                document.getElementById('tkNewAssigned').value = '';
                document.getElementById('tkNewStatus').value = 'Not Started';
                getTkModal().show();
            });
        }

        document.getElementById('tkNewSubmit').addEventListener('click', function() {
            var nameInput = document.getElementById('tkNewName');
            var startInput = document.getElementById('tkNewStart');
            var dueInput = document.getElementById('tkNewDue');
            var name = nameInput.value.trim();

            if (!name) {
                nameInput.classList.add('is-invalid');
                nameInput.focus();
                showToast('Please enter the task name');
                return;
            }
            if (!startInput.value || !dueInput.value) {
                showToast('Please pick the start and due dates');
                return;
            }

            var assigned = document.getElementById('tkNewAssigned').value || ME;
            var status = document.getElementById('tkNewStatus').value || 'Not Started';

            tasks.unshift({
                id: Date.now(),
                no: nextTaskNo(),
                name: name,
                dependency: '',
                status: status,
                progress: status === 'Complete' ? 100 : 0,
                start: startInput.value,
                due: dueInput.value,
                completed: '',
                timeTaken: '',
                rating: 'NA',
                assigned: assigned,
                followers: [ME],
                tags: [],
                priority: document.getElementById('tkNewPriority').value,
                project: document.getElementById('tkNewProject').value,
                qcStatus: 'Pending',
                checklistDone: 0,
                checklistTotal: 0,
                dueCrossed: dueInput.value < TODAY_ISO && status !== 'Complete' ? 1 : 0,
                overdue: dueInput.value < TODAY_ISO && status !== 'Complete'
            });

            getTkModal().hide();
            renderSummary();
            renderOverdueAlert();
            renderAll();
            showToast('Task "' + name + '" created');
        });

        if (tkModalEl) {
            /* Modal-kkulla select2 — dropdownParent fix (project idiom) */
            tkModalEl.addEventListener('shown.bs.modal', function() {
                if (window.jQuery && jQuery.fn.select2) {
                    jQuery('#tkModal .select2').each(function() {
                        var $s = jQuery(this);
                        if ($s.data('select2')) $s.select2('destroy');
                        $s.select2({ width: '100%', dropdownParent: jQuery(tkModalEl) });
                    });
                }
                document.getElementById('tkNewName').focus();
            });
        }

        /* ---------------- Toast ---------------- */
        var toastWrap = null;

        function getToastWrap() {
            if (!toastWrap) {
                toastWrap = document.createElement('div');
                toastWrap.className = 'tk-toast-wrap';
                document.body.appendChild(toastWrap);
            }
            return toastWrap;
        }

        function showToast(msg) {
            var wrap = getToastWrap();
            var t = document.createElement('div');
            t.className = 'tk-toast';
            t.innerHTML = '<span class="tk-toast-ico"><i class="bi bi-check-lg"></i></span>' +
                '<span class="tk-toast-msg"></span>' +
                '<button type="button" class="tk-toast-x" title="Close"><i class="bi bi-x-lg"></i></button>';
            t.querySelector('.tk-toast-msg').textContent = msg;
            wrap.appendChild(t);

            function dismiss() {
                t.classList.add('tk-toast-out');
                setTimeout(function() { t.remove(); }, 260);
            }
            t.querySelector('.tk-toast-x').addEventListener('click', dismiss);
            setTimeout(dismiss, 4000);
        }

        /* ---------------- Init ---------------- */
        populateFilters();
        renderSummary();
        renderOverdueAlert();
        renderAll();
    })();
</script>

<script src="./assets/js/date-picker.js"></script>
