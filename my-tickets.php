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
<script src="./assets/js/pages/my-tickets.js?v=<?php echo time(); ?>"></script>
