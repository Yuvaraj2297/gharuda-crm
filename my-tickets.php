<?php include 'header.php'; ?>

 

<style>
    /* ===== My Tickets KPI strip ===== */
    .mtk-kpi {
        border: 1.5px solid var(--border-soft, #eef0f3);
        border-radius: 14px;
        background: #fff;
        padding: 14px 16px;
        cursor: pointer;
        height: 100%;
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }

    .mtk-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(20, 20, 43, .08);
    }

    .mtk-kpi .k-val {
        font: 800 22px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
        line-height: 1;
    }

    .mtk-kpi .k-label {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--ink-500, #6b7684);
        margin-top: 4px;
    }

    .mtk-kpi .k-ico {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
    }

    .mtk-kpi.active { border-width: 2px; }
    .mtk-kpi[data-filter="all"].active { border-color: #3564e0; background: #f5f8ff; }
    .mtk-kpi[data-filter="open"].active { border-color: #3564e0; background: #f5f8ff; }
    .mtk-kpi[data-filter="progress"].active { border-color: #d97706; background: #fffbf0; }
    .mtk-kpi[data-filter="resolved"].active { border-color: #16a34a; background: #f4fcf6; }

    /* ===== Status badge ===== */
    .tkt-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        white-space: nowrap;
    }

    .tkt-status-badge i { font-size: 11px; }

    .tkt-priority-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 11px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* ===== Fullscreen modal layout ===== */
    .tkt-fs-content {
        background: #f4f6f9;
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow: hidden;
    }

    .tkt-fs-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 14px 24px;
        background: #fff;
        border-bottom: 1px solid var(--border-soft, #eef0f3);
        flex-shrink: 0;
    }

    .tkt-fs-header .btn-close-custom {
        white-space: nowrap;
        flex-shrink: 0;
    }

    .tkt-fs-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: var(--primary-light, #e8f7ea);
        color: var(--primary-dark, #0ca308);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        flex-shrink: 0;
    }

    .tkt-fs-header .modal-title {
        font: 800 16px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
        line-height: 1.2;
    }

    .tkt-fs-subject {
        font-size: 12px;
        font-weight: 600;
        color: var(--ink-500, #6b7684);
    }

    .tkt-fs-body {
        flex: 1 1 auto;
        min-height: 0;
        display: flex;
        overflow: hidden;
    }

    /* LEFT — ticket details column */
    .tkt-fs-left {
        width: 500px;
        flex-shrink: 0;
        background: #fafbfc;
        border-right: 1px solid var(--border-soft, #eef0f3);
        overflow-y: auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .tkt-fs-sec-title {
        font: 700 12px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
        text-transform: uppercase;
        letter-spacing: .05em;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .tkt-fs-sec-title i { color: #3564e0; font-size: 13px; }

    /* RIGHT — conversation column */
    .tkt-fs-right {
        flex: 1 1 auto;
        min-width: 0;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .tkt-fs-chat-head {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 22px;
        background: #fff;
        border-bottom: 1px solid var(--border-soft, #eef0f3);
        font: 700 13px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
        flex-shrink: 0;
    }

    .tkt-fs-chat-head i { color: #3564e0; }

    .tkt-chat-count {
        margin-left: auto;
        font-size: 10.5px;
        font-weight: 700;
        color: var(--ink-500, #6b7684);
        background: #f3f4f6;
        padding: 3px 10px;
        border-radius: 99px;
    }

    /* ===== Chat (improved) ===== */
    .tkt-chat-wrap {
        flex: 1 1 auto;
        min-height: 0;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 16px;
        padding: 20px 24px;
        background:
            radial-gradient(circle at 20% 20%, rgba(12, 163, 8, .025) 0, transparent 40%),
            radial-gradient(circle at 80% 70%, rgba(53, 100, 224, .03) 0, transparent 45%),
            #f4f6f9;
    }

    .tkt-chat-wrap::-webkit-scrollbar { width: 7px; }
    .tkt-chat-wrap::-webkit-scrollbar-thumb { background: #d3d8de; border-radius: 99px; }
    .tkt-chat-wrap::-webkit-scrollbar-track { background: transparent; }

    .tkt-msg {
        max-width: 72%;
        display: flex;
        align-items: flex-end;
        gap: 9px;
    }

    .tkt-msg.staff {
        align-self: flex-start;
    }

    .tkt-msg.employee {
        align-self: flex-end;
        flex-direction: row-reverse;
    }

    .tkt-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 11.5px;
        font-weight: 800;
        color: #fff;
        flex-shrink: 0;
        box-shadow: 0 2px 6px rgba(20, 30, 25, .14);
    }

    .tkt-msg-main {
        display: flex;
        flex-direction: column;
        min-width: 0;
    }

    .tkt-msg .msg-meta {
        font-size: 10.5px;
        font-weight: 700;
        color: var(--ink-500, #6b7684);
        margin-bottom: 4px;
    }

    .tkt-msg.employee .msg-meta { text-align: right; }

    .tkt-msg .msg-bubble {
        border-radius: 16px;
        padding: 11px 15px;
        font-size: 13.5px;
        line-height: 1.5;
        font-weight: 500;
        color: var(--ink-900, #201a14);
        box-shadow: 0 1px 3px rgba(20, 30, 25, .07);
        word-break: break-word;
    }

    .tkt-msg.employee .msg-bubble {
        background: linear-gradient(135deg, #e8f7ea 0%, #dff3e3 100%);
        border-bottom-right-radius: 5px;
    }

    .tkt-msg.staff .msg-bubble {
        background: #fff;
        border: 1px solid #e8ebef;
        border-bottom-left-radius: 5px;
    }

    .tkt-msg .msg-attachment {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 700;
        color: #3564e0;
        background: #eaf1ff;
        border: 1px dashed #b9cdf5;
        padding: 5px 12px;
        border-radius: 9px;
        margin-top: 8px;
        text-decoration: none;
    }

    /* ===== Composer (reply) ===== */
    .tkt-fs-composer {
        display: flex;
        align-items: flex-end;
        gap: 10px;
        padding: 14px 22px;
        background: #fff;
        border-top: 1px solid var(--border-soft, #eef0f3);
        flex-shrink: 0;
    }

    .tkt-reply-file-btn {
        border: 1px solid var(--border-soft, #eef0f3);
        background: #f8f9fb;
        border-radius: 12px;
        width: 44px;
        height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: var(--ink-700, #4b5563);
        flex-shrink: 0;
        transition: all .15s ease;
    }

    .tkt-reply-file-btn:hover {
        border-color: var(--primary, #16a34a);
        color: var(--primary-dark, #0ca308);
        background: #f4fcf6;
    }

    .tkt-reply-file-btn.has-file {
        background: #eaf1ff;
        border-color: #b9cdf5;
        color: #3564e0;
        width: auto;
        padding: 0 14px;
        gap: 6px;
        font-size: 12px;
        font-weight: 700;
        max-width: 180px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .tkt-reply-input {
        flex: 1 1 auto;
        background: #f8f9fb;
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 14px;
        padding: 11px 16px;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink-900, #201a14);
        resize: none;
        min-height: 44px;
        max-height: 130px;
    }

    .tkt-reply-input:focus {
        background: #fff;
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .tkt-send-btn {
        height: 44px;
        border-radius: 12px;
        padding: 0 22px;
        font-weight: 700;
        font-size: 13.5px;
        flex-shrink: 0;
    }

    @media (max-width: 991.98px) {
        .tkt-fs-body { flex-direction: column; overflow-y: auto; }
        .tkt-fs-left { width: 100%; border-right: none; border-bottom: 1px solid var(--border-soft, #eef0f3); overflow: visible; flex-shrink: 0; }
        .tkt-fs-right { flex: 1 1 auto; min-height: 480px; }
        .tkt-msg { max-width: 86%; }
    }

    /* Ticket meta grid in modal — field chips */
    .tkt-meta-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }

    .tkt-meta-grid>div {
        background: #f8f9fb;
        border: 1px solid #f0f2f5;
        border-radius: 10px;
        padding: 8px 11px;
        min-width: 0;
    }

    .tkt-meta-grid .m-label {
        font-size: 9.5px;
        font-weight: 800;
        color: var(--ink-500, #6b7684);
        text-transform: uppercase;
        letter-spacing: .05em;
    }

    .tkt-meta-grid .m-value {
        font-size: 12px;
        font-weight: 700;
        color: var(--ink-900, #201a14);
        margin-top: 2px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* ===== Left panel cards ===== */
    .tkt-fs-card {
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 14px;
        padding: 16px;
        background: #fff;
        box-shadow: 0 1px 3px rgba(20, 30, 25, .04);
    }

    /* ===== Vertical timeline stepper ===== */
    .tkt-stepper {
        display: flex;
        flex-direction: column;
        margin: 2px 0 0;
    }

    .tkt-step {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        position: relative;
        padding-bottom: 16px;
    }

    .tkt-step:last-child { padding-bottom: 0; }

    /* vertical connector */
    .tkt-step::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 24px;
        bottom: -2px;
        width: 2px;
        background: #e3e7ec;
        border-radius: 2px;
    }

    .tkt-step:last-child::before { display: none; }

    .tkt-step.done::before { background: var(--primary, #16a34a); }

    .tkt-step.current::before {
        background: linear-gradient(to bottom, var(--primary, #16a34a), #e3e7ec);
    }

    .tkt-step .st-dot {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 800;
        flex-shrink: 0;
        position: relative;
        z-index: 1;
        background: #eef0f3;
        border: 2px solid #e3e7ec;
        color: #b0b5be;
    }

    .tkt-step.done .st-dot {
        background: var(--primary, #16a34a);
        border-color: var(--primary, #16a34a);
        color: #fff;
        font-size: 11px;
    }

    .tkt-step.current .st-dot {
        background: #fff;
        border-color: var(--primary, #16a34a);
        animation: tktPulse 2s infinite;
    }

    .tkt-step.current .st-dot::after {
        content: '';
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: var(--primary, #16a34a);
    }

    @keyframes tktPulse {
        0%   { box-shadow: 0 0 0 0 rgba(12, 163, 8, .28); }
        70%  { box-shadow: 0 0 0 8px rgba(12, 163, 8, 0); }
        100% { box-shadow: 0 0 0 0 rgba(12, 163, 8, 0); }
    }

    @media (prefers-reduced-motion: reduce) {
        .tkt-step.current .st-dot { animation: none; }
    }

    .tkt-step .st-info {
        display: flex;
        flex-direction: column;
        padding-top: 1px;
        min-width: 0;
    }

    .tkt-step .st-label {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-300, #b0b5be);
        line-height: 20px; /* align with dot */
    }

    .tkt-step.done .st-label { color: var(--ink-900, #201a14); }

    .tkt-step.current .st-label {
        color: var(--primary-dark, #0ca308);
        font-weight: 800;
    }

    .tkt-step .st-caption {
        font-size: 10.5px;
        font-weight: 600;
        color: var(--ink-300, #b0b5be);
        margin-top: 1px;
    }

    .tkt-step.current .st-caption { color: var(--primary, #16a34a); }

    /* Special status banner (Rejected / Cancelled / Reopened) */
    .tkt-status-banner {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        border-radius: 12px;
        padding: 12px 14px;
        border: 1px solid transparent;
    }

    .tkt-status-banner .sb-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
    }

    .tkt-status-banner .sb-title {
        font: 800 13px 'Sora', sans-serif;
        line-height: 1.3;
    }

    .tkt-status-banner .sb-note {
        font-size: 11.5px;
        font-weight: 600;
        margin-top: 2px;
        line-height: 1.45;
    }

    .tkt-status-banner.rejected { background: #fdebed; border-color: #f8cdd0; }
    .tkt-status-banner.rejected .sb-icon { background: #fff; color: #be3035; }
    .tkt-status-banner.rejected .sb-title, .tkt-status-banner.rejected .sb-note { color: #be3035; }

    .tkt-status-banner.cancelled { background: #f3f4f6; border-color: #e5e7eb; }
    .tkt-status-banner.cancelled .sb-icon { background: #fff; color: #6b7280; }
    .tkt-status-banner.cancelled .sb-title, .tkt-status-banner.cancelled .sb-note { color: #4b5563; }

    .tkt-status-banner.reopened { background: #ffedd5; border-color: #fed7aa; }
    .tkt-status-banner.reopened .sb-icon { background: #fff; color: #c2410c; }
    .tkt-status-banner.reopened .sb-title, .tkt-status-banner.reopened .sb-note { color: #c2410c; }

    /* Empty state */
    .mtk-empty { text-align: center; padding: 44px 16px; }
    .mtk-empty .empty-icon {
        width: 58px; height: 58px; margin: 0 auto 12px; border-radius: 16px;
        background: #f3f4f6; color: #b0b5be;
        display: flex; align-items: center; justify-content: center; font-size: 24px;
    }

    /* Table search */
    .mtk-search {
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 10px;
        padding: 8px 14px 8px 34px;
        font-size: 12.5px;
        font-weight: 600;
        width: 230px;
    }

    .mtk-search:focus { outline: none; border-color: var(--primary, #16a34a); }

    /* ===== Select2 filter styling ===== */
    #mtkCategoryFilter+.select2-container--default .select2-selection--single,
    #mtkStatusFilter+.select2-container--default .select2-selection--single {
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 10px;
        height: 38px;
        display: flex;
        align-items: center;
        padding: 4px 12px;
        background: #fff;
    }

    #mtkCategoryFilter+.select2-container--default .select2-selection--single .select2-selection__rendered,
    #mtkStatusFilter+.select2-container--default .select2-selection--single .select2-selection__rendered {
        color: var(--ink-900, #201a14);
        font-size: 12.5px;
        font-weight: 700;
        line-height: 1.4;
        padding: 0;
    }

    #mtkCategoryFilter+.select2-container--default .select2-selection--single .select2-selection__arrow,
    #mtkStatusFilter+.select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px;
    }

    #mtkCategoryFilter+.select2-container--default.select2-container--focus .select2-selection--single,
    #mtkCategoryFilter+.select2-container--default.select2-container--open .select2-selection--single,
    #mtkStatusFilter+.select2-container--default.select2-container--focus .select2-selection--single,
    #mtkStatusFilter+.select2-container--default.select2-container--open .select2-selection--single {
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    @media (max-width: 576px) {
        .tkt-meta-grid { grid-template-columns: 1fr; }
    }
</style>

<!-- Top Title Area -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">My Tickets</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-life-preserver fs-6"></i>
            <span>Helpdesk / Ticketing</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">My Tickets</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-primary" type="button" id="mtkResetBtn" data-bs-toggle="tooltip" data-bs-title="Reset demo data">
            <i class="bi bi-arrow-counterclockwise"></i>
        </button>
        <a href="ticketing.php" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Create Ticket
        </a>
    </div>
</div>

<!-- KPI filter strip -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="mtk-kpi d-flex align-items-center gap-3 active" data-filter="all">
            <div class="k-ico" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-ticket-perforated"></i></div>
            <div>
                <div class="k-val" id="mtkAll">0</div>
                <div class="k-label">All Tickets</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="mtk-kpi d-flex align-items-center gap-3" data-filter="open">
            <div class="k-ico" style="background:#fff4d9;color:#9a6200;"><i class="bi bi-inbox"></i></div>
            <div>
                <div class="k-val" id="mtkOpen">0</div>
                <div class="k-label">Open / Pending</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="mtk-kpi d-flex align-items-center gap-3" data-filter="progress">
            <div class="k-ico" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="k-val" id="mtkProgress">0</div>
                <div class="k-label">In Progress / Waiting</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="mtk-kpi d-flex align-items-center gap-3" data-filter="resolved">
            <div class="k-ico" style="background:#e7f7eb;color:#087a24;"><i class="bi bi-check-circle"></i></div>
            <div>
                <div class="k-val" id="mtkResolved">0</div>
                <div class="k-label">Resolved / Closed</div>
            </div>
        </div>
    </div>
</div>

<!-- Main table card -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="my-tickets">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <select class="form-select form-select-sm" id="mtkCategoryFilter" style="width:170px;">
                <option value="">All Categories</option>
            </select>
            <select class="form-select form-select-sm" id="mtkStatusFilter" style="width:150px;">
                <option value="">All Statuses</option>
            </select>
        </div>
        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search subject / ticket #..." id="mtkSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="myTicketsTable">
            <thead>
                <tr>
                    <th class="text-nowrap">Ticket ID</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Subject</th>
                    <th class="text-nowrap">Priority</th>
                    <th class="text-nowrap">Assigned To</th>
                    <th class="text-nowrap">SLA</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Created Date</th>
                    <th class="text-nowrap text-center">Action</th>
                </tr>
            </thead>
            <tbody id="mtkBody">
                <!-- Filled by JS -->
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center report-footer p-3">
        <div class="d-flex gap-2 align-items-center">
            <span class="small text-muted text-nowrap">Show:</span>
            <select class="form-select form-select-sm gh-w-auto" id="mtkShow">
                <option selected>10</option>
                <option>25</option>
                <option>50</option>
            </select>
            <span class="small text-muted text-nowrap">Showing <strong id="mtkStart">0</strong>–<strong id="mtkEnd">0</strong> of <strong id="mtkTotal">0</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="mtkPgList"></ul>
        </nav>
    </div>
</div>

<!-- ===== Ticket View Modal (fullscreen) ===== -->
<div class="modal fade" id="ticketViewModal" tabindex="-1" aria-labelledby="ticketViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0 rounded-0">

            <div class="tkt-fs-content">
                <!-- Header -->
                <div class="tkt-fs-header">
                    <div class="d-flex align-items-center gap-3 min-w-0">
                        <div class="tkt-fs-icon"><i class="bi bi-ticket-perforated"></i></div>
                        <div class="min-w-0">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <h5 class="modal-title mb-0" id="tvmTicketId">TKT-1001</h5>
                                <span class="tkt-status-badge" id="tvmStatusBadge">Open</span>
                                <span class="tkt-priority-badge" id="tvmPriorityBadge">Medium</span>
                                <span class="badge rounded-pill" id="tvmSlaBadge" style="font-size:10.5px;">SLA OK</span>
                            </div>
                            <div class="tkt-fs-subject text-truncate" id="tvmSubject">Missing Checkout Punch</div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3 btn-close-custom" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg me-1"></i> Close
                    </button>
                </div>

                <!-- Body: left details + right chat -->
                <div class="tkt-fs-body">
                    <!-- LEFT — ticket details -->
                    <div class="tkt-fs-left">
                        <div class="tkt-fs-card">
                            <div class="tkt-fs-sec-title"><i class="bi bi-diagram-2"></i> Progress</div>
                            <div class="tkt-stepper" id="tvmStepper"></div>
                        </div>

                        <div class="tkt-fs-card">
                            <div class="tkt-fs-sec-title"><i class="bi bi-info-circle"></i> Ticket Information</div>
                            <div class="tkt-meta-grid">
                                <div><div class="m-label">Category</div><div class="m-value" id="tvmCategory" title="">—</div></div>
                                <div><div class="m-label">Sub Category</div><div class="m-value" id="tvmSubCategory" title="">—</div></div>
                                <div><div class="m-label">Created By</div><div class="m-value" id="tvmCreatedBy" title="">—</div></div>
                                <div><div class="m-label">Assigned To</div><div class="m-value" id="tvmAssignedTo" title="">—</div></div>
                                <div><div class="m-label">Created Date</div><div class="m-value" id="tvmCreatedDate" title="">—</div></div>
                                <div><div class="m-label">Preferred Contact</div><div class="m-value" id="tvmContact" title="">—</div></div>
                                <div class="w-100"><div class="m-label">Resolution Due</div><div class="m-value" id="tvmResolutionDue" title="">—</div></div>
                                <div class="w-100"><div class="m-label">Attachment</div><div class="m-value" id="tvmAttachment">—</div></div>
                            </div>
                        </div>

                        <div class="tkt-fs-card">
                            <div class="tkt-fs-sec-title"><i class="bi bi-card-text"></i> Description</div>
                            <div style="font-size:12.5px;font-weight:500;line-height:1.55;color:var(--ink-900,#201a14);" id="tvmDescription">
                                —
                            </div>
                        </div>

                        <!-- Reopen / close actions for resolved tickets -->
                        <div class="d-flex gap-2" id="tvmResolvedActions" style="display:none;"></div>
                    </div>

                    <!-- RIGHT — conversation -->
                    <div class="tkt-fs-right">
                        <div class="tkt-fs-chat-head">
                            <i class="bi bi-chat-dots"></i> Conversation
                            <span class="tkt-chat-count" id="tvmChatCount">0 messages</span>
                        </div>

                        <div class="tkt-chat-wrap" id="tvmChat"></div>

                        <!-- Composer -->
                        <div class="tkt-fs-composer">
                            <button type="button" class="tkt-reply-file-btn" id="tvmReplyFileBtn" title="Attach file">
                                <i class="bi bi-paperclip"></i>
                            </button>
                            <input type="file" id="tvmReplyFile" hidden>
                            <textarea class="form-control tkt-reply-input" id="tvmReplyText" rows="1" placeholder="Type your reply..."></textarea>
                            <button type="button" class="btn btn-primary tkt-send-btn" id="tvmSendReply">
                                <i class="bi bi-send me-1"></i> Send
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="./assets/js/ticketing-data.js"></script>
<script>
(function () {
    'use strict';

    var modalEl = document.getElementById('ticketViewModal');
    var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    var currentTicket = null;
    var replyFileName = null;

    var activeFilter = 'all';
    var currentPage = 1;

    /* ---------- KPI counts ---------- */
    function renderKpis() {
        var mine = TicketingData.getMyTickets();
        var open = 0, progress = 0, resolved = 0;
        mine.forEach(function (t) {
            if (['Open', 'Assigned', 'Rejected', 'Cancelled', 'Reopened'].indexOf(t.status) !== -1) open++;
            else if (['In Progress', 'Waiting for Employee'].indexOf(t.status) !== -1) progress++;
            else resolved++;
        });
        document.getElementById('mtkAll').textContent = mine.length;
        document.getElementById('mtkOpen').textContent = open;
        document.getElementById('mtkProgress').textContent = progress;
        document.getElementById('mtkResolved').textContent = resolved;
    }

    /* ---------- Select2 filters (self-healing init) ---------- */
    var TICKET_CATEGORIES = TicketingData.categories.map(function (c) {
        return { id: c.name, text: c.icon + ' ' + c.name };
    });
    var TICKET_STATUSES = ['Open', 'Assigned', 'In Progress', 'Waiting for Employee', 'Resolved', 'Closed', 'Reopened', 'Rejected', 'Cancelled']
        .map(function (s) { return { id: s, text: s }; });

    function buildTicketSelect2(selector, options, width) {
        var $sel = $(selector);
        if (!$sel.length || !$.fn.select2) return;
        var el = $sel[0];
        var healing = false;

        function rebuildOptions() {
            el.innerHTML = '';
            options.forEach(function (item) {
                var o = document.createElement('option');
                o.value = item.id;
                o.textContent = item.text;
                el.appendChild(o);
            });
        }

        function setup() {
            healing = true;
            if ($sel.hasClass('select2-hidden-accessible')) $sel.select2('destroy');
            rebuildOptions();
            /* dropdownParent: body — the table card has overflow-hidden, which
               clips the default in-container dropdown and hides all options */
            $sel.select2({ width: width, dropdownParent: $(document.body), minimumResultsForSearch: 5 });
            $sel.val(options[0].id).trigger('change');
            healing = false;
        }

        setup();

        /* Self-heal: if any external script wipes the options after init,
           rebuild + re-init immediately (before the user can click) */
        var mo = new MutationObserver(function () {
            if (healing) return;
            if (el.querySelectorAll('option').length < options.length) {
                mo.disconnect();
                setup();
                mo.observe(el, { childList: true });
            }
        });
        mo.observe(el, { childList: true });
    }

    function initSelect2Filters() {
        if (!window.jQuery || !$.fn.select2) return; // native selects remain as fallback
        buildTicketSelect2('#mtkCategoryFilter', [{ id: '', text: 'All Categories' }].concat(TICKET_CATEGORIES), '190px');
        buildTicketSelect2('#mtkStatusFilter', [{ id: '', text: 'All Statuses' }].concat(TICKET_STATUSES), '175px');
    }

    /* ---------- Table ---------- */
    function getFiltered() {
        var q = document.getElementById('mtkSearch').value.trim().toLowerCase();
        var cat = document.getElementById('mtkCategoryFilter').value;
        var st = document.getElementById('mtkStatusFilter').value;

        return TicketingData.getMyTickets().filter(function (t) {
            if (activeFilter === 'open' && ['Open', 'Assigned', 'Reopened', 'Rejected', 'Cancelled'].indexOf(t.status) === -1) return false;
            if (activeFilter === 'progress' && ['In Progress', 'Waiting for Employee'].indexOf(t.status) === -1) return false;
            if (activeFilter === 'resolved' && ['Resolved', 'Closed'].indexOf(t.status) === -1) return false;
            if (cat && t.category !== cat) return false;
            if (st && t.status !== st) return false;
            if (q && (t.subject + ' ' + t.id).toLowerCase().indexOf(q) === -1) return false;
            return true;
        });
    }

    function slaBadgeHtml(t) {
        var s = TicketingData.slaState(t);
        if (s === 'breached') return '<span class="badge rounded-pill" style="background:#fdebed;color:#be3035;font-size:10.5px;">Breached</span>';
        if (s === 'at-risk') return '<span class="badge rounded-pill" style="background:#fff4d9;color:#9a6200;font-size:10.5px;">At Risk</span>';
        return '<span class="badge rounded-pill" style="background:#e7f7eb;color:#087a24;font-size:10.5px;">On Track</span>';
    }

    function renderTable() {
        var rows = getFiltered();
        var pageSize = parseInt(document.getElementById('mtkShow').value, 10) || 10;
        var totalPages = Math.max(1, Math.ceil(rows.length / pageSize));
        if (currentPage > totalPages) currentPage = totalPages;
        var start = (currentPage - 1) * pageSize;
        var pageRows = rows.slice(start, start + pageSize);

        var tbody = document.getElementById('mtkBody');
        if (!pageRows.length) {
            tbody.innerHTML = '<tr><td colspan="9"><div class="mtk-empty">' +
                '<div class="empty-icon"><i class="bi bi-ticket-perforated"></i></div>' +
                '<div class="fw-bold" style="font-family:\'Sora\',sans-serif;">No tickets found</div>' +
                '<div style="font-size:12px;color:var(--ink-500,#6b7684);">Create a ticket and it will appear here.</div></div></td></tr>';
        } else {
            tbody.innerHTML = pageRows.map(function (t) {
                var st = TicketingData.statusMeta(t.status);
                var pr = TicketingData.priorityMeta(t.priority);
                return '<tr>' +
                    '<td><a href="javascript:void(0);" class="fw-bold text-primary text-decoration-none tkt-open" data-id="' + t.id + '">' + t.id + '</a></td>' +
                    '<td><span style="font-size:13px;">' + t.categoryIcon + '</span> <span class="fw-semibold" style="font-size:12.5px;">' + TicketingData.escapeHtml(t.category) + '</span></td>' +
                    '<td style="max-width:220px;" class="text-truncate fw-semibold" title="' + TicketingData.escapeHtml(t.subject) + '">' + TicketingData.escapeHtml(t.subject) + '</td>' +
                    '<td><span class="tkt-priority-badge" style="background:' + pr.bg + ';color:' + pr.color + ';">' + t.priority + '</span></td>' +
                    '<td style="font-size:12.5px;">' + (t.assignedTo ? TicketingData.escapeHtml(t.assignedTo) : '<span class="text-muted">—</span>') + '</td>' +
                    '<td>' + slaBadgeHtml(t) + '</td>' +
                    '<td><span class="tkt-status-badge" style="background:' + st.bg + ';color:' + st.color + ';"><i class="bi ' + st.icon + '"></i>' + t.status + '</span></td>' +
                    '<td style="font-size:12.5px;">' + t.createdDate + '</td>' +
                    '<td class="text-center"><button class="btn btn-action-icon btn-primary btn-view-details tkt-open" data-id="' + t.id + '" data-bs-toggle="tooltip" data-bs-title="View Ticket"><i class="bi bi-eye"></i></button></td>' +
                    '</tr>';
            }).join('');
        }

        document.getElementById('mtkTotal').textContent = rows.length;
        document.getElementById('mtkStart').textContent = rows.length ? start + 1 : 0;
        document.getElementById('mtkEnd').textContent = rows.length ? start + pageRows.length : 0;
        renderPagination(totalPages);
        initTooltips();
    }

    function renderPagination(totalPages) {
        var pgList = document.getElementById('mtkPgList');
        pgList.innerHTML = '';
        function add(label, page, opts) {
            opts = opts || {};
            var li = document.createElement('li');
            li.className = 'page-item' + (opts.active ? ' active' : '') + (opts.disabled ? ' disabled' : '');
            var a = document.createElement('a');
            a.className = 'page-link'; a.href = '#'; a.innerHTML = label;
            if (!opts.disabled) {
                a.addEventListener('click', function (e) { e.preventDefault(); currentPage = page; renderTable(); });
            }
            li.appendChild(a); pgList.appendChild(li);
        }
        add('<i class="bi bi-chevron-left"></i>', currentPage - 1, { disabled: currentPage === 1 });
        for (var p = 1; p <= totalPages; p++) add(String(p), p, { active: p === currentPage });
        add('<i class="bi bi-chevron-right"></i>', currentPage + 1, { disabled: currentPage === totalPages });
    }

    function initTooltips() {
        document.querySelectorAll('#myTicketsTable [data-bs-toggle="tooltip"]').forEach(function (el) {
            var ex = bootstrap.Tooltip.getInstance(el); if (ex) ex.dispose();
            new bootstrap.Tooltip(el, { trigger: 'hover' });
        });
    }

    /* ---------- Ticket view modal ---------- */
    var STEP_CAPTIONS = {
        'Open': 'Ticket submitted',
        'Assigned': 'Assigned to department',
        'In Progress': 'Being worked on',
        'Waiting for Employee': 'Awaiting your reply',
        'Resolved': 'Issue resolved',
        'Closed': 'Ticket archived'
    };

    function buildStepper(t) {
        var wrap = document.getElementById('tvmStepper');
        var special = ['Rejected', 'Cancelled', 'Reopened'];
        if (special.indexOf(t.status) !== -1) {
            var cls = t.status.toLowerCase();
            var notes = {
                'Rejected': t.rejectNote || 'This ticket was rejected by the helpdesk team.',
                'Cancelled': t.rejectNote || 'This ticket was cancelled.',
                'Reopened': 'Ticket reopened — back with the support team.'
            };
            wrap.innerHTML = '<div class="tkt-status-banner ' + cls + '">' +
                '<span class="sb-icon"><i class="bi ' + TicketingData.statusMeta(t.status).icon + '"></i></span>' +
                '<div><div class="sb-title">' + t.status + '</div>' +
                '<div class="sb-note">' + TicketingData.escapeHtml(notes[t.status] || '') + '</div></div>' +
                '</div>';
            return;
        }
        var idx = TicketingData.statusFlow.indexOf(t.status);
        wrap.innerHTML = TicketingData.statusFlow.map(function (s, i) {
            var cls = i < idx ? 'done' : (i === idx ? 'current' : '');
            var dot = i < idx ? '<i class="bi bi-check-lg"></i>' : '';
            var caption = (i === idx) ? (STEP_CAPTIONS[s] || '') : '';
            return '<div class="tkt-step ' + cls + '">' +
                '<span class="st-dot">' + dot + '</span>' +
                '<span class="st-info"><span class="st-label">' + s + '</span>' +
                (caption ? '<span class="st-caption">' + caption + '</span>' : '') +
                '</span></div>';
        }).join('');
    }

    function avatarFor(name) {
        var initials = name.split(' ').map(function (p) { return p[0]; }).slice(0, 2).join('').toUpperCase();
        var colors = ['#3564e0', '#7c3aed', '#087a24', '#9a6200', '#be3035', '#be185d'];
        var color = colors[name.length % colors.length];
        return '<span class="tkt-avatar" style="background:' + color + ';">' + TicketingData.escapeHtml(initials) + '</span>';
    }

    function renderChat(t) {
        var chat = document.getElementById('tvmChat');
        document.getElementById('tvmChatCount').textContent =
            t.conversation.length + (t.conversation.length === 1 ? ' message' : ' messages');
        chat.innerHTML = t.conversation.map(function (m) {
            var att = m.attachment
                ? '<span class="msg-attachment"><i class="bi bi-paperclip"></i>' + TicketingData.escapeHtml(m.attachment) + '</span>'
                : '';
            return '<div class="tkt-msg ' + m.by + '">' + avatarFor(m.name) +
                '<div class="tkt-msg-main">' +
                    '<div class="msg-meta">' + TicketingData.escapeHtml(m.name) + ' · ' + TicketingData.fmtTs(m.ts) + '</div>' +
                    '<div class="msg-bubble">' + TicketingData.escapeHtml(m.text) + att + '</div>' +
                '</div>' +
                '</div>';
        }).join('');
        chat.scrollTop = chat.scrollHeight;
    }

    function resetComposer() {
        replyFileName = null;
        var fileBtn = document.getElementById('tvmReplyFileBtn');
        fileBtn.classList.remove('has-file');
        fileBtn.innerHTML = '<i class="bi bi-paperclip"></i>';
        document.getElementById('tvmReplyFile').value = '';
        var input = document.getElementById('tvmReplyText');
        input.value = '';
        input.style.height = 'auto';
    }

    function openTicket(id) {
        var t = TicketingData.getTicket(id);
        if (!t) return;
        currentTicket = t;
        resetComposer();

        var st = TicketingData.statusMeta(t.status);
        var pr = TicketingData.priorityMeta(t.priority);
        var sla = TicketingData.slaState(t);

        document.getElementById('tvmTicketId').textContent = t.id;
        document.getElementById('tvmSubject').textContent = t.subject;
        document.getElementById('tvmStatusBadge').textContent = t.status;
        document.getElementById('tvmStatusBadge').style.cssText = 'background:' + st.bg + ';color:' + st.color + ';';
        document.getElementById('tvmPriorityBadge').textContent = t.priority;
        document.getElementById('tvmPriorityBadge').style.cssText = 'background:' + pr.bg + ';color:' + pr.color + ';';

        var slaBadge = document.getElementById('tvmSlaBadge');
        slaBadge.textContent = sla === 'breached' ? 'SLA Breached' : (sla === 'at-risk' ? 'SLA At Risk' : 'SLA On Track');
        slaBadge.style.background = sla === 'breached' ? '#fdebed' : (sla === 'at-risk' ? '#fff4d9' : '#e7f7eb');
        slaBadge.style.color = sla === 'breached' ? '#be3035' : (sla === 'at-risk' ? '#9a6200' : '#087a24');

        document.getElementById('tvmDescription').textContent = t.description;
        document.getElementById('tvmCategory').textContent = t.categoryIcon + ' ' + t.category;
        document.getElementById('tvmSubCategory').textContent = t.subCategory;
        document.getElementById('tvmCreatedBy').textContent = t.createdBy + ' (' + t.createdByEmp + ')';
        document.getElementById('tvmAssignedTo').textContent = t.assignedTo || 'Not yet assigned';
        document.getElementById('tvmCreatedDate').textContent = t.createdDate;
        document.getElementById('tvmContact').textContent = t.preferredContact;
        document.getElementById('tvmResolutionDue').textContent = TicketingData.fmtTs(t.resolutionDueTs);
        /* truncated values → full text on hover */
        ['tvmCategory', 'tvmSubCategory', 'tvmCreatedBy', 'tvmAssignedTo', 'tvmCreatedDate', 'tvmContact', 'tvmResolutionDue'].forEach(function (mid) {
            var el = document.getElementById(mid);
            el.setAttribute('title', el.textContent);
        });
        document.getElementById('tvmAttachment').innerHTML = t.attachment
            ? '<span style="color:#3564e0;"><i class="bi bi-paperclip me-1"></i>' + TicketingData.escapeHtml(t.attachment) + '</span>'
            : '—';

        buildStepper(t);
        renderChat(t);

        /* Resolved → Reopen button for employee */
        var resActions = document.getElementById('tvmResolvedActions');
        resActions.style.display = 'none';
        resActions.innerHTML = '';
        if (t.status === 'Resolved') {
            resActions.style.display = 'flex';
            resActions.innerHTML = '<button type="button" class="btn btn-outline-warning btn-sm" id="tvmReopenBtn">' +
                '<i class="bi bi-arrow-counterclockwise me-1"></i> Reopen Ticket</button>';
            document.getElementById('tvmReopenBtn').addEventListener('click', function () {
                TicketingData.updateTicket(t.id, { status: 'Reopened' });
                modal.hide();
                refresh();
            });
        }

        modal.show();
    }

    document.getElementById('tvmSendReply').addEventListener('click', function () {
        var input = document.getElementById('tvmReplyText');
        var text = input.value.trim();
        if (!text || !currentTicket) return;
        TicketingData.addReply(currentTicket.id, text, replyFileName, false);
        resetComposer();
        openTicket(currentTicket.id);
        renderKpis();
        renderTable();
    });

    /* Enter = send, Shift+Enter = new line */
    document.getElementById('tvmReplyText').addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            document.getElementById('tvmSendReply').click();
        }
    });

    /* Composer auto-grow */
    document.getElementById('tvmReplyText').addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 130) + 'px';
    });

    document.getElementById('tvmReplyFileBtn').addEventListener('click', function () {
        document.getElementById('tvmReplyFile').click();
    });
    document.getElementById('tvmReplyFile').addEventListener('change', function (e) {
        replyFileName = e.target.files.length ? e.target.files[0].name : null;
        var fileBtn = document.getElementById('tvmReplyFileBtn');
        if (replyFileName) {
            fileBtn.classList.add('has-file');
            fileBtn.innerHTML = '<i class="bi bi-paperclip"></i>' + TicketingData.escapeHtml(replyFileName);
        } else {
            fileBtn.classList.remove('has-file');
            fileBtn.innerHTML = '<i class="bi bi-paperclip"></i>';
        }
    });

    /* ---------- Events ---------- */
    document.getElementById('mtkBody').addEventListener('click', function (e) {
        var btn = e.target.closest('.tkt-open');
        if (btn) openTicket(btn.getAttribute('data-id'));
    });

    document.getElementById('mtkSearch').addEventListener('input', function () { currentPage = 1; renderTable(); });
    /* Select2 fires change via jQuery — bind with jQuery so it fires reliably */
    $('#mtkCategoryFilter, #mtkStatusFilter').on('change', function () { currentPage = 1; renderTable(); });
    document.getElementById('mtkShow').addEventListener('change', function () { currentPage = 1; renderTable(); });

    document.querySelectorAll('.mtk-kpi').forEach(function (k) {
        k.addEventListener('click', function () {
            document.querySelectorAll('.mtk-kpi').forEach(function (x) { x.classList.remove('active'); });
            k.classList.add('active');
            activeFilter = k.getAttribute('data-filter');
            currentPage = 1;
            renderTable();
        });
    });

    document.getElementById('mtkResetBtn').addEventListener('click', function () {
        TicketingData.resetDemoData();
        refresh();
    });

    function refresh() {
        renderKpis();
        renderTable();
    }

    /* ---------- Init ---------- */
    /* Init select2 on jQuery ready — after every global script has run */
    if (window.jQuery) {
        $(function () { initSelect2Filters(); });
    }

    /* Deep-link: my-tickets.php?ticket=TKT-1001 */
    var params = new URLSearchParams(window.location.search);
    refresh();
    if (params.get('ticket')) openTicket(params.get('ticket'));
})();
</script>
