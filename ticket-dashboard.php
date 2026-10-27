<?php include 'header.php'; ?>

 

<style>
    /* ===== Dashboard KPI cards ===== */
    .tdash-kpi {
        border: 1.5px solid var(--border-soft, #eef0f3);
        border-radius: 14px;
        background: #fff;
        padding: 16px 18px;
        height: 100%;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }

    /* soft colour wash behind the icon side */
    .tdash-kpi::before {
        content: '';
        position: absolute;
        right: -28px;
        top: -28px;
        width: 92px;
        height: 92px;
        border-radius: 50%;
        background: var(--wash, rgba(12, 163, 8, .06));
        transition: transform .25s ease;
    }

    .tdash-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(20, 20, 43, .08);
    }

    .tdash-kpi:hover::before { transform: scale(1.25); }

    .tdash-kpi .k-val {
        font: 800 26px 'Sora', sans-serif;
        line-height: 1;
        color: var(--ink-900, #201a14);
    }

    .tdash-kpi .k-label {
        font-size: 12px;
        font-weight: 700;
        color: var(--ink-500, #6b7684);
        margin-top: 5px;
    }

    .tdash-kpi .k-ico {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 20px;
        flex-shrink: 0;
        position: relative;
        z-index: 1;
    }

    .tdash-kpi.kpi-breach { --wash: rgba(229, 72, 77, .08); }
    .tdash-kpi.kpi-breach .k-val { color: #be3035; }

    /* active quick-filter state (class-based) */
    .tdash-kpi.active {
        border: 2px solid var(--primary, #16a34a);
        background: #f4fcf6;
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .12);
    }

    .tdash-kpi.active .k-label { color: var(--primary-dark, #0ca308); }

    .tdash-kpi > div:last-child { position: relative; z-index: 1; }

    /* ===== Filters row ===== */
    .tdash-filter-select {
        min-width: 160px;
        font-size: 12.5px;
        font-weight: 600;
    }

    /* Select2 skin for dashboard filters (matches Create Ticket page) */
    #tdfCategory+.select2-container--default .select2-selection--single,
    #tdfPriority+.select2-container--default .select2-selection--single,
    #tdfStatus+.select2-container--default .select2-selection--single,
    #tdfDept+.select2-container--default .select2-selection--single {
        background: #f8f9fb;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        height: 38px;
        display: flex;
        align-items: center;
        padding: 6px 12px;
    }

    #tdfCategory+.select2-container--default .select2-selection--single .select2-selection__rendered,
    #tdfPriority+.select2-container--default .select2-selection--single .select2-selection__rendered,
    #tdfStatus+.select2-container--default .select2-selection--single .select2-selection__rendered,
    #tdfDept+.select2-container--default .select2-selection--single .select2-selection__rendered {
        color: var(--ink-900, #201a14);
        font-size: 12.5px;
        font-weight: 600;
        padding: 0;
        line-height: 1.4;
    }

    #tdfCategory+.select2-container--default .select2-selection--single .select2-selection__placeholder,
    #tdfPriority+.select2-container--default .select2-selection--single .select2-selection__placeholder,
    #tdfStatus+.select2-container--default .select2-selection--single .select2-selection__placeholder,
    #tdfDept+.select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #b0b5be;
        font-weight: 500;
    }

    #tdfCategory+.select2-container--default .select2-selection--single .select2-selection__arrow,
    #tdfPriority+.select2-container--default .select2-selection--single .select2-selection__arrow,
    #tdfStatus+.select2-container--default .select2-selection--single .select2-selection__arrow,
    #tdfDept+.select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px;
    }

    #tdfCategory+.select2-container--default.select2-container--focus .select2-selection--single,
    #tdfCategory+.select2-container--default.select2-container--open .select2-selection--single,
    #tdfPriority+.select2-container--default.select2-container--focus .select2-selection--single,
    #tdfPriority+.select2-container--default.select2-container--open .select2-selection--single,
    #tdfStatus+.select2-container--default.select2-container--focus .select2-selection--single,
    #tdfStatus+.select2-container--default.select2-container--open .select2-selection--single,
    #tdfDept+.select2-container--default.select2-container--focus .select2-selection--single,
    #tdfDept+.select2-container--default.select2-container--open .select2-selection--single {
        background: #fff;
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    /* ===== Status / priority badges ===== */
    .tkt-status-badge,
    .tkt-priority-badge {
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

    /* ===== Assignment drawer ===== */
    .assign-row {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 7px 10px;
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 10px;
        margin-bottom: 8px;
        cursor: pointer;
        transition: all .15s ease;
        background: #fff;
    }

    .assign-row:hover {
        border-color: var(--primary, #16a34a);
        background: #f4fcf6;
    }

    .assign-row .a-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: grid;
        place-items: center;
        font-size: 13px;
        font-weight: 800;
        color: #fff;
        flex-shrink: 0;
    }

    /* ===== Employee photo avatars (table) ===== */
    .emp-av {
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 0 2px #fff, 0 2px 6px rgba(20, 30, 25, .12);
    }

    .emp-av .emp-img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 2;
    }

    .emp-av .emp-init {
        position: absolute;
        inset: 0;
        display: grid;
        place-items: center;
        z-index: 1;
    }

    .assign-row .a-name {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-900, #201a14);
    }

    .assign-row .a-role {
        font-size: 10.5px;
        color: var(--ink-500, #6b7684);
    }

    .assign-row .a-count {
        margin-left: auto;
        font-size: 10.5px;
        font-weight: 800;
        background: #f3f4f6;
        color: var(--ink-700, #4b5563);
        padding: 3px 9px;
        border-radius: 99px;
    }

    .dept-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 99px;
        background: #eef2f7;
        color: #475569;
    }

    .dept-chip.hr { background: #eaf1ff; color: #3564e0; }
    .dept-chip.it { background: #ede9fe; color: #7c3aed; }
    .dept-chip.payroll { background: #e7f7eb; color: #087a24; }
    .dept-chip.finance { background: #fff4d9; color: #9a6200; }
    .dept-chip.admin { background: #fce7f3; color: #be185d; }

    /* ===== Category → Department routing card ===== */
    .dm-row {
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 12px;
        padding: 10px 12px;
        transition: border-color .15s ease, box-shadow .15s ease, transform .15s ease;
    }

    .dm-row:hover {
        border-color: var(--primary, #16a34a);
        box-shadow: 0 4px 14px rgba(20, 30, 25, .07);
        transform: translateY(-1px);
    }

    .dm-row .dm-head {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .dm-row .dm-ico {
        width: 30px;
        height: 30px;
        border-radius: 9px;
        display: grid;
        place-items: center;
        font-size: 14px;
        flex-shrink: 0;
    }

    .dm-row .dm-name {
        font-size: 12.5px;
        font-weight: 800;
        color: var(--ink-900, #201a14);
    }

    .dm-row .dm-new {
        margin-left: auto;
        font-size: 10px;
        font-weight: 800;
        border-radius: 99px;
        padding: 3px 9px;
    }

    .dm-row .dm-cats {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
        margin-top: 8px;
    }

    .dm-row .dm-cat {
        font-size: 9.5px;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 99px;
        background: #f3f4f6;
        color: var(--ink-700, #4b5563);
        white-space: nowrap;
    }

    .dm-row .dm-arrow {
        color: var(--ink-300, #b0b5be);
        font-size: 11px;
        flex-shrink: 0;
    }

    /* ===== Table row polish ===== */
    #allTicketsTable tbody tr { transition: background .15s ease; }

    #allTicketsTable tbody tr:hover { background: #f8faf9; }

    #allTicketsTable tbody td { vertical-align: middle; }

    /* SLA due-date micro text under badge */
    .sla-due {
        font-size: 10px;
        color: var(--ink-500, #6b7684);
        margin-top: 2px;
    }

    /* ===== Side cards ===== */
    .side-scroll {
        overflow-y: auto;
        scrollbar-width: thin;
    }

    .side-scroll::-webkit-scrollbar { width: 5px; }

    .side-scroll::-webkit-scrollbar-track { background: transparent; }

    .side-scroll::-webkit-scrollbar-thumb {
        background: #dfe3e9;
        border-radius: 99px;
    }

    #deptMapList { max-height: 230px; }

    #workloadList { max-height: 230px; }

    .side-card-title {
        font-size: 13.5px;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .side-card-title .sc-badge {
        margin-left: auto;
        font-size: 10.5px;
        font-weight: 800;
        border-radius: 99px;
        padding: 2px 9px;
        background: #f3f4f6;
        color: var(--ink-700, #4b5563);
    }

    .assign-row { position: relative; }

    .assign-row .a-bar {
        position: absolute;
        left: 0;
        top: 8px;
        bottom: 8px;
        width: 3px;
        border-radius: 99px;
        background: transparent;
    }

    .assign-row.bar-red .a-bar { background: #be3035; }
    .assign-row.bar-blue .a-bar { background: #3564e0; }
    .assign-row.bar-pink .a-bar { background: #be185d; }

    /* Workload mini progress bar */
    .wl-bar {
        height: 5px;
        border-radius: 99px;
        background: #eef0f3;
        overflow: hidden;
        margin-top: 5px;
    }

    .wl-bar span {
        display: block;
        height: 100%;
        border-radius: 99px;
        transition: width .35s ease;
    }

    /* ===== Manage modal — chat style conversation ===== */
    #amConversation {
        background: #f6f7f9;
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 12px;
        padding: 12px;
    }

    .am-msg {
        display: flex;
        gap: 8px;
        max-width: 85%;
    }

    .am-msg.staff { margin-left: auto; flex-direction: row-reverse; }

    .am-msg .am-av {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: grid;
        place-items: center;
        font-size: 10.5px;
        font-weight: 800;
        color: #fff;
        flex-shrink: 0;
        margin-top: 14px;
    }

    .am-msg .am-bubble {
        border-radius: 12px;
        padding: 8px 12px;
        font-size: 12.5px;
    }

    .am-msg.emp .am-bubble { background: #fff; border: 1px solid #e6e9ee; border-top-left-radius: 4px; }
    .am-msg.staff .am-bubble { background: #e8f7ea; border-top-right-radius: 4px; }

    .am-msg .am-meta {
        font-size: 10px;
        font-weight: 700;
        color: var(--ink-500, #6b7684);
        margin-bottom: 3px;
    }

    .am-msg .am-att {
        margin-top: 5px;
        color: #3564e0;
        font-weight: 700;
        font-size: 11px;
    }

    /* composer */
    .am-composer {
        border: 1px solid #eef0f3;
        border-radius: 10px;
        background: #f8f9fb;
        transition: all .15s ease;
    }

    .am-composer:focus-within {
        background: #fff;
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .am-composer textarea {
        border: none;
        background: transparent;
        resize: none;
        font-size: 13px;
        font-weight: 500;
    }

    .am-composer textarea:focus { outline: none; box-shadow: none; background: transparent; }

    /* ===== Page hero ===== */
    .tdash-hero {
        background: linear-gradient(115deg, #0c7a2e 0%, #16a34a 48%, #0d9488 100%);
        border-radius: 18px;
        padding: 24px 28px;
        position: relative;
        overflow: hidden;
        margin-bottom: 6px;
    }

    .tdash-hero::before,
    .tdash-hero::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, .09);
    }

    .tdash-hero::before { width: 190px; height: 190px; right: -50px; top: -80px; }

    .tdash-hero::after {
        width: 120px;
        height: 120px;
        right: 130px;
        bottom: -70px;
        background: rgba(255, 255, 255, .06);
    }

    .tdash-hero .hero-crumb {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 12.5px;
        color: rgba(255, 255, 255, .78);
        margin-bottom: 3px;
        position: relative;
        z-index: 1;
    }

    .tdash-hero h1 {
        color: #fff;
        font-family: 'Sora', sans-serif;
        font-size: 1.65rem;
        margin: 0;
        position: relative;
        z-index: 1;
        letter-spacing: -.3px;
    }

    .tdash-hero .hero-actions { position: relative; z-index: 1; }

    .tdash-hero .btn-hero-ghost {
        background: rgba(255, 255, 255, .16);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, .38);
        font-weight: 700;
        font-size: 13px;
        padding: 7px 16px;
        border-radius: 10px;
        transition: background .15s ease;
    }

    .tdash-hero .btn-hero-ghost:hover { background: rgba(255, 255, 255, .28); color: #fff; }

    /* ===== Filter toolbar (inside table card) ===== */
    .tdash-toolbar {
        border-top: 1px solid var(--border-soft, #eef0f3);
        background: #fafbfc;
    }

    .tdash-toolbar .tb-label {
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .6px;
        text-transform: uppercase;
        color: var(--ink-500, #6b7684);
        margin-bottom: 4px;
        display: block;
    }

    /* Sticky table head inside scroll wrapper */
    #allTicketsTable thead th {
        position: sticky;
        top: 0;
        z-index: 3;
        background: #f8f9fb;
        box-shadow: 0 1px 0 var(--border-soft, #eef0f3);
    }

    /* Empty state */
    .tdash-empty { padding: 40px 16px; text-align: center; }

    .tdash-empty .e-ico {
        width: 62px;
        height: 62px;
        border-radius: 50%;
        background: #f4fcf6;
        color: var(--primary, #16a34a);
        display: grid;
        place-items: center;
        font-size: 24px;
        margin: 0 auto 12px;
    }

    .tdash-empty .e-title { font-weight: 800; font-size: 14px; color: var(--ink-900, #201a14); }

    .tdash-empty .e-sub {
        font-size: 12px;
        color: var(--ink-500, #6b7684);
        margin-top: 3px;
    }

    /* ===== Fullscreen manage modal (two-column) ===== */
    .am-fs-content { background: #fff; }

    .am-fs-header {
        border-bottom: 1px solid var(--border-soft, #eef0f3);
        flex-shrink: 0;
    }

    .am-fs-header .btn { white-space: nowrap; }

    .am-fs-body {
        display: flex;
        flex: 1;
        min-height: 0;
        overflow: hidden;
    }

    .am-fs-left {
        width: 400px;
        flex-shrink: 0;
        background: #fafbfc;
        border-right: 1px solid var(--border-soft, #eef0f3);
        overflow-y: auto;
        padding: 18px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        scrollbar-width: thin;
    }

    .am-fs-left::-webkit-scrollbar { width: 5px; }

    .am-fs-left::-webkit-scrollbar-thumb {
        background: #dfe3e9;
        border-radius: 99px;
    }

    .am-card {
        background: #fff;
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 14px;
        padding: 16px;
        box-shadow: 0 1px 3px rgba(20, 30, 25, .04);
    }

    .am-desc {
        background: #f8f9fb;
        border-radius: 10px;
        padding: 11px 13px;
        font-size: 12.5px;
        font-weight: 500;
        white-space: pre-wrap;
    }

    .am-fs-right {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        min-height: 0;
    }

    .am-chat-head {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 800;
        font-size: 13.5px;
        padding: 12px 20px;
        border-bottom: 1px solid var(--border-soft, #eef0f3);
        flex-shrink: 0;
    }

    .am-chat-scroll {
        flex: 1;
        overflow-y: auto;
        padding: 18px 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        background:
            radial-gradient(circle at 20% 10%, rgba(12, 163, 8, .035), transparent 42%),
            radial-gradient(circle at 85% 90%, rgba(53, 100, 224, .035), transparent 42%),
            #f6f7f9;
        scrollbar-width: thin;
    }

    .am-chat-scroll::-webkit-scrollbar { width: 5px; }

    .am-chat-scroll::-webkit-scrollbar-thumb {
        background: #dfe3e9;
        border-radius: 99px;
    }

    .am-composer-wrap {
        padding: 12px 20px 14px;
        border-top: 1px solid var(--border-soft, #eef0f3);
        background: #fff;
        flex-shrink: 0;
    }

    .am-composer-wrap .am-hint {
        font-size: 10.5px;
        color: var(--ink-500, #6b7684);
        text-align: center;
        margin-top: 6px;
    }

    .am-send-btn {
        border-radius: 10px;
        width: 38px;
        height: 38px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
    }

    @media (max-width: 991.98px) {
        .am-fs-body { flex-direction: column; overflow-y: auto; }
        .am-fs-left { width: 100%; border-right: none; border-bottom: 1px solid var(--border-soft, #eef0f3); overflow: visible; }
        .am-fs-right { min-height: 480px; }
    }

    /* ===== Toast ===== */
    .tdash-toast {
        position: fixed;
        bottom: 26px;
        right: 26px;
        z-index: 3000;
        background: #101913;
        color: #fff;
        padding: 12px 18px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        font-weight: 600;
        box-shadow: 0 14px 34px rgba(0, 0, 0, .28);
        opacity: 0;
        transform: translateY(14px);
        transition: opacity .25s ease, transform .25s ease;
        pointer-events: none;
    }

    .tdash-toast.show { opacity: 1; transform: none; }

    .tdash-toast .t-ico {
        color: #4ade80;
        font-size: 15px;
    }
</style>

<!-- Hero -->
<div class="tdash-hero d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <div class="hero-crumb">
            <i class="bi bi-life-preserver"></i>
            <span>Helpdesk / Ticketing</span>
            <i class="bi bi-chevron-right" style="font-size:10px;"></i>
            <span class="fw-bold" style="color:#fff;">Dashboard</span>
        </div>
        <h1>Ticket Dashboard</h1>
    </div>
    <div class="hero-actions d-flex gap-2">
        <a href="support-tickets.php" class="btn btn-hero-ghost">
            <i class="bi bi-headset me-1"></i> All Tickets
        </a>
        <a href="ticket-reports.php" class="btn btn-hero-ghost">
            <i class="bi bi-clipboard-data me-1"></i> Ticket Reports
        </a>
        <a href="support-create-ticket.php" class="btn btn-light fw-bold" style="border-radius:10px;">
            <i class="bi bi-plus-lg me-1"></i> New Ticket
        </a>
    </div>
</div>

<!-- KPI Row -->
<div class="row g-3 mb-3">
    <div class="col-6 col-xl">
        <div class="tdash-kpi d-flex align-items-center gap-3" data-jump="all" style="--wash:rgba(53,100,224,.07);">
            <div class="k-ico" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-ticket-perforated"></i></div>
            <div>
                <div class="k-val" id="kpiTotal">0</div>
                <div class="k-label">Total Tickets</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl">
        <div class="tdash-kpi d-flex align-items-center gap-3" data-jump="open" style="--wash:rgba(217,119,6,.08);">
            <div class="k-ico" style="background:#fff4d9;color:#9a6200;"><i class="bi bi-inbox"></i></div>
            <div>
                <div class="k-val" id="kpiOpen">0</div>
                <div class="k-label">Open</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl">
        <div class="tdash-kpi d-flex align-items-center gap-3" data-jump="progress" style="--wash:rgba(124,58,237,.07);">
            <div class="k-ico" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="k-val" id="kpiProgress">0</div>
                <div class="k-label">In Progress</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl">
        <div class="tdash-kpi d-flex align-items-center gap-3" data-jump="resolved" style="--wash:rgba(12,163,8,.07);">
            <div class="k-ico" style="background:#e7f7eb;color:#087a24;"><i class="bi bi-check-circle"></i></div>
            <div>
                <div class="k-val" id="kpiResolved">0</div>
                <div class="k-label">Resolved</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl">
        <div class="tdash-kpi kpi-breach d-flex align-items-center gap-3" data-jump="breached" style="--wash:rgba(229,72,77,.08);">
            <div class="k-ico" style="background:#fdebed;color:#be3035;"><i class="bi bi-exclamation-triangle"></i></div>
            <div>
                <div class="k-val" id="kpiBreached">0</div>
                <div class="k-label">SLA Breached</div>
            </div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="card-custom filters-card mb-3">
    <div class="row g-3 align-items-end p-3">
        <div class="col-lg-3 col-md-6">
            <span class="tb-label">Category</span>
            <select id="tdfCategory" class="form-select form-select-sm tdash-filter-select">
                <option value="">All Categories</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-6">
            <span class="tb-label">Priority</span>
            <select id="tdfPriority" class="form-select form-select-sm tdash-filter-select">
                <option value="">All Priorities</option>
                <option>Low</option>
                <option>Medium</option>
                <option>High</option>
                <option>Urgent</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-6">
            <span class="tb-label">Status</span>
            <select id="tdfStatus" class="form-select form-select-sm tdash-filter-select">
                <option value="">All Statuses</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-6">
            <span class="tb-label">Department</span>
            <select id="tdfDept" class="form-select form-select-sm tdash-filter-select">
                <option value="">All Departments</option>
                <option>HR</option>
                <option>IT</option>
                <option>Payroll</option>
                <option>Finance</option>
                <option>Admin</option>
            </select>
        </div>
        <div class="col-lg-3 d-flex gap-2">
            <button id="tdfClear" class="btn btn-reject flex-fill" type="button">Clear</button>
            <button id="tdfApply" class="btn btn-primary flex-fill" type="button">
                <i class="bi bi-funnel me-1"></i> Apply
            </button>
        </div>
    </div>
</div>

<div class="row g-3">
    <!-- ===== All tickets table (full width) ===== -->
    <div class="col-12">
        <div class="card-custom js-report-table p-0 overflow-hidden d-flex flex-column" data-export-name="all-tickets">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
                <div class="fw-bold" style="font-size:14px;">
                    <i class="bi bi-ticket-detailed me-1 text-primary"></i> All Tickets
                    <span class="badge rounded-pill ms-1" style="background:#eaf1ff;color:#3564e0;font-size:11px;" id="tdfCountBadge">0</span>
                </div>
                <div class="mt-search-wrap">
                    <i class="bi bi-search mt-search-icon"></i>
                    <input type="text" class="mt-search-input" placeholder="Search ticket / employee..." id="tdashSearch">
                </div>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border flex-grow-1" style="max-height:560px;min-height:0;">
                <table class="table-modern w-100 mb-0" id="allTicketsTable">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Ticket</th>
                            <th class="text-nowrap">Employee</th>
                            <th class="text-nowrap">Category</th>
                            <th class="text-nowrap">Priority</th>
                            <th class="text-nowrap">Assigned To</th>
                            <th class="text-nowrap">SLA</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tdashBody">
                        <!-- Filled by JS -->
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center report-footer p-3">
                <span class="small text-muted">Showing <strong id="tdashShown">0</strong> of <strong id="tdashTotal">0</strong> tickets</span>
                <span class="small text-muted">Click a row to view &amp; manage the ticket</span>
            </div>
        </div>
    </div>

</div>

<!-- ===== Side cards row ===== -->
<div class="row g-3 align-items-stretch mt-0">
    <div class="col-xl-4 col-md-6 d-flex">
        <!-- Department auto-assignment map -->
        <div class="card-custom p-3 flex-grow-1">
            <div class="side-card-title mb-2">
                <i class="bi bi-diagram-3 text-primary"></i> Category → Department
                <span class="sc-badge" id="deptMapBadge">0</span>
            </div>
            <div class="d-flex flex-column gap-2 side-scroll" id="deptMapList">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 d-flex">
        <!-- Staff workload -->
        <div class="card-custom p-3 flex-grow-1">
            <div class="side-card-title mb-2">
                <i class="bi bi-people text-primary"></i> Staff Workload
            </div>
            <div id="workloadList" class="side-scroll">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12 d-flex">
        <!-- Quick pending actions -->
        <div class="card-custom p-3 flex-grow-1">
            <div class="side-card-title mb-2">
                <i class="bi bi-lightning-charge" style="color:#9a6200;"></i> Needs Attention
                <span class="sc-badge" id="attentionBadge" style="background:#fff4d9;color:#9a6200;">0</span>
            </div>
            <div class="d-flex flex-column gap-2" id="attentionList">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>
</div>

<!-- ===== Manage / Assign Ticket Modal (fullscreen two-column) ===== -->
<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0 rounded-0 am-fs-content">

            <div class="modal-header am-fs-header py-3">
                <div class="d-flex align-items-center gap-2 flex-wrap min-w-0">
                    <h5 class="modal-title fw-bold mb-0 me-1" id="amTicketId" style="font-family:'Sora',sans-serif;">TKT-1001</h5>
                    <span class="tkt-status-badge" id="amStatusBadge">Open</span>
                    <span class="tkt-priority-badge" id="amPriorityBadge">Medium</span>
                    <span class="fw-bold ms-2 text-truncate d-none d-md-block" id="amSubject" style="font-size:13.5px;color:var(--ink-500,#6b7684);"></span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-primary btn-sm" id="amUpdateBtn">
                        <i class="bi bi-check-circle me-1"></i> Update Ticket
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

            <div class="am-fs-body">
                <!-- Left: details + controls -->
                <div class="am-fs-left">
                    <div class="am-card">
                        <div class="side-card-title mb-2"><i class="bi bi-info-circle text-primary"></i> Ticket Information</div>
                        <div class="text-muted" style="font-size:12px;">
                            <div class="d-flex justify-content-between py-1 border-bottom"><span>Created By</span><strong class="text-dark" id="amEmp"></strong></div>
                            <div class="d-flex justify-content-between py-1 border-bottom"><span>Created</span><strong class="text-dark" id="amCreated"></strong></div>
                            <div class="d-flex justify-content-between py-1 border-bottom"><span>Category</span><strong class="text-dark" id="amCat"></strong></div>
                            <div class="d-flex justify-content-between py-1"><span>Preferred Contact</span><strong class="text-dark" id="amContact"></strong></div>
                        </div>
                    </div>

                    <div class="am-card">
                        <div class="side-card-title mb-2"><i class="bi bi-file-text text-primary"></i> Description</div>
                        <div class="am-desc" id="amDescription"></div>
                    </div>

                    <div class="am-card">
                        <div class="side-card-title mb-2"><i class="bi bi-sliders text-primary"></i> Manage</div>
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label fw-bold mb-1" style="font-size:11px;">Department</label>
                                <select class="form-select form-select-sm" id="amDept">
                                    <option value="">Select...</option>
                                    <option>HR</option>
                                    <option>IT</option>
                                    <option>Payroll</option>
                                    <option>Finance</option>
                                    <option>Admin</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold mb-1" style="font-size:11px;">Assign To</label>
                                <select class="form-select form-select-sm" id="amAssignee" disabled>
                                    <option value="">Select dept first</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold mb-1" style="font-size:11px;">Priority</label>
                                <select class="form-select form-select-sm" id="amPriority">
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                    <option>Urgent</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold mb-1" style="font-size:11px;">Status</label>
                                <select class="form-select form-select-sm" id="amStatus"></select>
                            </div>
                            <div class="col-12 form-text" style="font-size:10.5px;">
                                Flow: Open → Assigned → In Progress → Waiting for Employee → Resolved → Closed
                            </div>
                            <div class="col-12" id="amRejectWrap" style="display:none;">
                                <label class="form-label fw-bold mb-1" style="font-size:11px;">Rejection / Closing Note</label>
                                <input type="text" class="form-control form-control-sm" id="amRejectNote" placeholder="Reason shown to the employee">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: conversation + composer -->
                <div class="am-fs-right">
                    <div class="am-chat-head">
                        <i class="bi bi-chat-dots text-primary"></i> Conversation
                        <span class="sc-badge" id="amConvCount" style="background:#eaf1ff;color:#3564e0;">0</span>
                    </div>
                    <div class="am-chat-scroll" id="amConversation">
                        <!-- Filled by JS -->
                    </div>
                    <div class="am-composer-wrap">
                        <div class="am-composer d-flex align-items-end gap-2 p-2">
                            <textarea class="form-control" id="amReply" rows="1" placeholder="Reply to employee..."></textarea>
                            <button type="button" class="btn btn-primary am-send-btn" id="amSendBtn" title="Add to conversation">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                        <div class="am-hint">Reply is added to the conversation — Update Ticket saves assignment &amp; status changes</div>
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

    var modalEl = document.getElementById('assignModal');
    var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    var currentTicket = null;
    var quickFilter = '';

    /* ---------- KPIs ---------- */
    function renderKpis() {
        var c = TicketingData.counts();
        document.getElementById('kpiTotal').textContent = c.total;
        document.getElementById('kpiOpen').textContent = c.open;
        document.getElementById('kpiProgress').textContent = c.inProgress + c.assigned + c.waiting;
        document.getElementById('kpiResolved').textContent = c.resolved + c.closed;
        document.getElementById('kpiBreached').textContent = c.breached;
    }

    /* ---------- Filters ---------- */
    function populateFilters() {
        var catSel = document.getElementById('tdfCategory');
        TicketingData.categories.forEach(function (c) {
            var o = document.createElement('option');
            o.value = c.name; o.textContent = c.icon + ' ' + c.name;
            catSel.appendChild(o);
        });
        var stSel = document.getElementById('tdfStatus');
        ['Open', 'Assigned', 'In Progress', 'Waiting for Employee', 'Resolved', 'Closed', 'Reopened', 'Rejected', 'Cancelled'].forEach(function (s) {
            var o = document.createElement('option');
            o.value = s; o.textContent = s;
            stSel.appendChild(o);
        });
    }

    /* ---------- Select2 filters (self-healing init, same pattern as Create Ticket) ---------- */
    function buildDashSelect2(selector, placeholder) {
        if (!window.jQuery || !$.fn.select2) return;
        var $sel = $(selector);
        if (!$sel.length) return;
        var el = $sel[0];
        var optionCount = el.options.length;
        var healing = false;

        function setup() {
            healing = true;
            if ($sel.hasClass('select2-hidden-accessible')) $sel.select2('destroy');
            $sel.select2({
                width: '100%',
                dropdownParent: $(document.body),
                minimumResultsForSearch: 6,
                placeholder: placeholder || null,
                allowClear: !!placeholder
            });
            healing = false;
        }

        setup();

        var mo = new MutationObserver(function () {
            if (healing) return;
            if (el.options.length < optionCount) {
                mo.disconnect();
                setup();
                mo.observe(el, { childList: true });
            }
        });
        mo.observe(el, { childList: true });
    }

    function initDashSelect2() {
        buildDashSelect2('#tdfCategory', 'All Categories');
        buildDashSelect2('#tdfPriority', 'All Priorities');
        buildDashSelect2('#tdfStatus', 'All Statuses');
        buildDashSelect2('#tdfDept', 'All Departments');

        /* Live re-render on filter change (select2 fires native change) */
        ['#tdfCategory', '#tdfPriority', '#tdfStatus', '#tdfDept'].forEach(function (sel) {
            $(sel).on('change', renderTable);
        });
    }

    function getFiltered() {
        var q = document.getElementById('tdashSearch').value.trim().toLowerCase();
        var cat = document.getElementById('tdfCategory').value;
        var pr = document.getElementById('tdfPriority').value;
        var st = document.getElementById('tdfStatus').value;
        var dept = document.getElementById('tdfDept').value;

        return TicketingData.getAllTickets().filter(function (t) {
            if (quickFilter === 'breached' && TicketingData.slaState(t) !== 'breached') return false;
            if (quickFilter === 'open' && t.status !== 'Open') return false;
            if (quickFilter === 'assigned' && t.status !== 'Assigned') return false;
            if (quickFilter === 'pending' && ['Open', 'Assigned', 'In Progress', 'Waiting for Employee', 'Reopened'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'progress' && ['Assigned', 'In Progress', 'Waiting for Employee'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'resolved' && ['Resolved', 'Closed'].indexOf(t.status) === -1) return false;
            if (cat && t.category !== cat) return false;
            if (pr && t.priority !== pr) return false;
            if (st && t.status !== st) return false;
            if (dept && t.assignedDept !== dept && !(dept === 'IT' && ['IT Support', 'Internet', 'Access Request'].indexOf(t.category) !== -1 && !t.assignedDept)) return false;
            if (q && (t.id + ' ' + t.subject + ' ' + t.createdBy + ' ' + t.createdByEmp).toLowerCase().indexOf(q) === -1) return false;
            return true;
        });
    }

    /* ---------- Table ---------- */
    function slaBadge(t) {
        var s = TicketingData.slaState(t);
        var due = new Date(t.resolutionDueTs);
        var dueStr = due.toLocaleDateString([], { day: '2-digit', month: 'short' }) + ' ' +
            due.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        var dueHtml = '<div class="sla-due">Due ' + dueStr + '</div>';
        if (s === 'breached') return '<span class="badge rounded-pill" style="background:#fdebed;color:#be3035;font-size:10.5px;">Breached</span>' + dueHtml;
        if (s === 'at-risk') return '<span class="badge rounded-pill" style="background:#fff4d9;color:#9a6200;font-size:10.5px;">At Risk</span>' + dueHtml;
        return '<span class="badge rounded-pill" style="background:#e7f7eb;color:#087a24;font-size:10.5px;">On Track</span>' + dueHtml;
    }

    /* Employee photo avatars — deterministic pick from assets/img/profile-*.jpg,
       falls back to coloured initials if the image is missing */
    var EMPLOYEE_PHOTOS = ['./assets/img/profile-1.jpg', './assets/img/profile-2.jpg', './assets/img/profile-3.jpg', './assets/img/profile-4.jpg'];

    function employeePhoto(empId, name) {
        var key = String(empId || name || '');
        var hash = 0;
        for (var i = 0; i < key.length; i++) hash = (hash * 31 + key.charCodeAt(i)) >>> 0;
        return EMPLOYEE_PHOTOS[hash % EMPLOYEE_PHOTOS.length];
    }

    function empAvatarHtml(name, empId) {
        var initials = name.split(' ').map(function (p) { return p[0]; }).slice(0, 2).join('').toUpperCase();
        var colors = ['#3564e0', '#7c3aed', '#087a24', '#9a6200', '#be3035', '#be185d'];
        var color = colors[name.length % colors.length];
        return '<span class="a-avatar emp-av" style="background:' + color + ';width:34px;height:34px;font-size:11px;">' +
            '<img class="emp-img" src="' + employeePhoto(empId, name) + '" alt="" loading="lazy" ' +
            'onerror="this.style.display=\'none\';">' +
            '<span class="emp-init">' + initials + '</span>' +
            '</span>';
    }

    function renderTable() {
        var rows = getFiltered();
        document.getElementById('tdfCountBadge').textContent = rows.length;
        document.getElementById('tdashTotal').textContent = rows.length;
        document.getElementById('tdashShown').textContent = rows.length;

        var tbody = document.getElementById('tdashBody');
        if (!rows.length) {
            tbody.innerHTML = '<tr><td colspan="8"><div class="tdash-empty">' +
                '<div class="e-ico"><i class="bi bi-inbox"></i></div>' +
                '<div class="e-title">No tickets match the current filters</div>' +
                '<div class="e-sub">Try clearing a filter or searching a different keyword</div>' +
                '</div></td></tr>';
            return;
        }

        tbody.innerHTML = rows.map(function (t) {
            var st = TicketingData.statusMeta(t.status);
            var pr = TicketingData.priorityMeta(t.priority);
            var deptCls = (t.assignedDept || '').toLowerCase();
            return '<tr class="tkt-row" data-id="' + t.id + '" style="cursor:pointer;">' +
                '<td><span class="fw-bold text-primary">' + t.id + '</span><div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + t.createdDate + '</div></td>' +
                '<td><div class="d-flex align-items-center gap-2">' + empAvatarHtml(t.createdBy, t.createdByEmp) +
                    '<div><div class="fw-bold" style="font-size:12.5px;">' + TicketingData.escapeHtml(t.createdBy) + '</div>' +
                    '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + t.createdByEmp + '</div></div></div></td>' +
                '<td><span style="font-size:13px;">' + t.categoryIcon + '</span> <span class="fw-semibold" style="font-size:12.5px;">' + TicketingData.escapeHtml(t.category) + '</span>' +
                    '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + TicketingData.escapeHtml(t.subCategory) + '</div></td>' +
                '<td><span class="tkt-priority-badge" style="background:' + pr.bg + ';color:' + pr.color + ';">' + t.priority + '</span></td>' +
                '<td style="font-size:12px;">' + (t.assignedTo
                    ? TicketingData.escapeHtml(t.assignedTo) + (t.assignedDept ? '<div class="dept-chip ' + deptCls + ' mt-1" style="font-size:9.5px;">' + t.assignedDept + '</div>' : '')
                    : '<span class="badge rounded-pill" style="background:#f3f4f6;color:#6b7280;font-size:10px;">Unassigned</span>') + '</td>' +
                '<td>' + slaBadge(t) + '</td>' +
                '<td><span class="tkt-status-badge" style="background:' + st.bg + ';color:' + st.color + ';"><i class="bi ' + st.icon + '"></i>' + t.status + '</span></td>' +
                '<td class="text-center"><button class="btn btn-action-icon btn-view-details" data-bs-toggle="tooltip" data-bs-title="Manage Ticket"><i class="bi bi-pencil-square"></i></button></td>' +
                '</tr>';
        }).join('');
    }

    /* ---------- Side lists ---------- */
    function renderDeptMap() {
        var wrap = document.getElementById('deptMapList');
        var all = TicketingData.getAllTickets();
        var seen = {};
        var rows = [];

        var deptMeta = {
            'HR':      { icon: 'bi-people',           bg: '#eaf1ff', color: '#3564e0' },
            'IT':      { icon: 'bi-pc-display',       bg: '#ede9fe', color: '#7c3aed' },
            'Payroll': { icon: 'bi-cash-coin',        bg: '#e7f7eb', color: '#087a24' },
            'Finance': { icon: 'bi-bank',             bg: '#fff4d9', color: '#9a6200' },
            'Admin':   { icon: 'bi-building',         bg: '#fce7f3', color: '#be185d' }
        };

        TicketingData.categories.forEach(function (c) {
            if (seen[c.dept]) return;
            seen[c.dept] = true;
            var meta = deptMeta[c.dept] || { icon: 'bi-grid', bg: '#eef2f7', color: '#475569' };
            var cats = TicketingData.categories.filter(function (x) { return x.dept === c.dept; });
            var count = all.filter(function (t) {
                return t.category && !t.assignedTo && cats.some(function (x) { return x.name === t.category; });
            }).length;

            rows.push('<div class="dm-row">' +
                '<div class="dm-head">' +
                    '<span class="dm-ico" style="background:' + meta.bg + ';color:' + meta.color + ';"><i class="bi ' + meta.icon + '"></i></span>' +
                    '<span class="dept-chip ' + c.dept.toLowerCase() + '">' + c.dept + '</span>' +
                    '<i class="bi bi-arrow-right dm-arrow"></i>' +
                    (count
                        ? '<span class="dm-new" style="background:' + meta.bg + ';color:' + meta.color + ';">' + count + ' unassigned</span>'
                        : '<span class="dm-new" style="background:#e7f7eb;color:#087a24;"><i class="bi bi-check"></i> clear</span>') +
                '</div>' +
                '<div class="dm-cats">' +
                    cats.map(function (x) { return '<span class="dm-cat">' + x.icon + ' ' + TicketingData.escapeHtml(x.name) + '</span>'; }).join('') +
                '</div>' +
            '</div>');
        });
        document.getElementById('deptMapBadge').textContent = rows.length;
        wrap.innerHTML = rows.join('');
    }

    function renderWorkload() {
        var wrap = document.getElementById('workloadList');
        var staff = {};
        var maxActive = 1;
        Object.keys(TicketingData.deptAssignees).forEach(function (dept) {
            TicketingData.deptAssignees[dept].forEach(function (person) {
                var active = TicketingData.getAllTickets().filter(function (t) {
                    return t.assignedTo === person && ['Resolved', 'Closed', 'Rejected', 'Cancelled'].indexOf(t.status) === -1;
                }).length;
                staff[person] = { dept: dept, active: active };
                if (active > maxActive) maxActive = active;
            });
        });
        wrap.innerHTML = Object.keys(staff).map(function (person) {
            var s = staff[person];
            var color = s.active >= 3 ? '#be3035' : (s.active >= 1 ? '#9a6200' : '#087a24');
            var pct = Math.round((s.active / maxActive) * 100);
            return '<div class="assign-row">' +
                '<span class="a-avatar" style="background:' + (s.dept === 'IT' ? '#7c3aed' : s.dept === 'HR' ? '#3564e0' : s.dept === 'Finance' ? '#9a6200' : s.dept === 'Admin' ? '#be185d' : '#087a24') + ';">' +
                person.split(' ')[0][0] + '</span>' +
                '<div class="min-w-0 flex-grow-1"><div class="a-name text-truncate">' + TicketingData.escapeHtml(person) + '</div>' +
                '<div class="a-role">' + s.dept + '</div>' +
                '<div class="wl-bar"><span style="width:' + pct + '%;background:' + color + ';"></span></div></div>' +
                '<span class="a-count" style="background:' + color + '18;color:' + color + ';">' + s.active + ' active</span>' +
                '</div>';
        }).join('');
    }

    function renderAttention() {
        var wrap = document.getElementById('attentionList');
        var items = [];

        TicketingData.getAllTickets().forEach(function (t) {
            if (TicketingData.slaState(t) === 'breached') {
                items.push({ t: t, label: 'SLA breached', bg: '#fdebed', color: '#be3035' });
            } else if (!t.assignedTo) {
                items.push({ t: t, label: 'Unassigned', bg: '#eaf1ff', color: '#3564e0' });
            } else if (t.status === 'Waiting for Employee') {
                items.push({ t: t, label: 'Waiting on employee', bg: '#fce7f3', color: '#be185d' });
            }
        });

        document.getElementById('attentionBadge').textContent = items.length;

        if (!items.length) {
            wrap.innerHTML = '<div class="text-center text-muted py-3" style="font-size:12px;">All good — nothing pending 🎉</div>';
            return;
        }

        wrap.innerHTML = items.slice(0, 5).map(function (item) {
            var barCls = item.label === 'SLA breached' ? 'bar-red' : (item.label === 'Unassigned' ? 'bar-blue' : 'bar-pink');
            return '<div class="assign-row tkt-row ' + barCls + '" data-id="' + item.t.id + '">' +
                
                '<span style="font-size:15px;">' + item.t.categoryIcon + '</span>' +
                '<div class="min-w-0"><div class="a-name text-truncate">' + item.t.id + ' · ' + TicketingData.escapeHtml(item.t.subject) + '</div>' +
                '<div class="a-role">' + TicketingData.escapeHtml(item.t.createdBy) + ' · ' + item.t.createdDate + '</div></div>' +
                '<span class="badge rounded-pill ms-auto" style="background:' + item.bg + ';color:' + item.color + ';font-size:9.5px;">' + item.label + '</span>' +
                '</div>';
        }).join('');
    }

    /* ---------- Assign modal ---------- */
    function avatarColor(name) {
        var colors = ['#3564e0', '#7c3aed', '#087a24', '#9a6200', '#be3035', '#be185d'];
        return colors[name.length % colors.length];
    }

    function renderConversation(t) {
        var wrap = document.getElementById('amConversation');
        document.getElementById('amConvCount').textContent = (t.conversation || []).length + ' messages';
        wrap.innerHTML = (t.conversation || []).map(function (m) {
            var isStaff = m.by === 'staff';
            var initials = m.name.split(' ').map(function (p) { return p[0]; }).slice(0, 2).join('').toUpperCase();
            return '<div class="am-msg ' + (isStaff ? 'staff' : 'emp') + '">' +
                '<span class="am-av" style="background:' + avatarColor(m.name) + ';">' + initials + '</span>' +
                '<div><div class="am-meta">' + TicketingData.escapeHtml(m.name) + ' · ' + TicketingData.fmtTs(m.ts) + '</div>' +
                '<div class="am-bubble">' + TicketingData.escapeHtml(m.text) +
                (m.attachment ? '<div class="am-att"><i class="bi bi-paperclip me-1"></i>' + TicketingData.escapeHtml(m.attachment) + '</div>' : '') +
                '</div></div></div>';
        }).join('');
        wrap.scrollTop = wrap.scrollHeight;
    }

    function fillStatusOptions(t) {
        var sel = document.getElementById('amStatus');
        var opts = [t.status].concat(TicketingData.allowedNextStatuses(t));
        sel.innerHTML = opts.map(function (s) { return '<option>' + s + '</option>'; }).join('');
        sel.value = t.status;
        document.getElementById('amRejectWrap').style.display =
            (TicketingData.allowedNextStatuses(t).indexOf('Rejected') !== -1 && t.status !== 'Rejected') ? 'block' : 'none';
    }

    function openAssign(id) {
        var t = TicketingData.getTicket(id);
        if (!t) return;
        currentTicket = t;

        var st = TicketingData.statusMeta(t.status);
        var pr = TicketingData.priorityMeta(t.priority);
        document.getElementById('amTicketId').textContent = t.id;
        document.getElementById('amSubject').textContent = t.subject;
        document.getElementById('amEmp').textContent = t.createdBy + ' (' + t.createdByEmp + ')';
        document.getElementById('amCreated').textContent = t.createdDate;
        document.getElementById('amCat').textContent = t.categoryIcon + ' ' + t.category + ' · ' + t.subCategory;
        document.getElementById('amContact').textContent = t.preferredContact;
        document.getElementById('amDescription').textContent = t.description;
        document.getElementById('amStatusBadge').textContent = t.status;
        document.getElementById('amStatusBadge').style.cssText = 'background:' + st.bg + ';color:' + st.color + ';';
        document.getElementById('amPriorityBadge').textContent = t.priority;
        document.getElementById('amPriorityBadge').style.cssText = 'background:' + pr.bg + ';color:' + pr.color + ';';

        document.getElementById('amDept').value = t.assignedDept || '';
        document.getElementById('amPriority').value = t.priority;
        document.getElementById('amReply').value = '';
        document.getElementById('amRejectNote').value = '';
        fillAssignees(t.assignedDept || '', t.assignedTo || '');
        fillStatusOptions(t);
        renderConversation(t);

        modal.show();
    }

    function fillAssignees(dept, selected) {
        var sel = document.getElementById('amAssignee');
        if (!dept || !TicketingData.deptAssignees[dept]) {
            sel.innerHTML = '<option value="">Select a department first</option>';
            sel.disabled = true;
            return;
        }
        sel.disabled = false;
        sel.innerHTML = '<option value="">Select person...</option>' +
            TicketingData.deptAssignees[dept].map(function (p) {
                return '<option ' + (p === selected ? 'selected' : '') + '>' + p + '</option>';
            }).join('');
        if (selected) sel.value = selected;
    }

    document.getElementById('amDept').addEventListener('change', function () {
        fillAssignees(this.value, '');
    });

    /* Priority change → recalc SLA dates */
    document.getElementById('amPriority').addEventListener('change', function () {
        var sla = TicketingData.slaMatrix[this.value];
        if (currentTicket) {
            document.getElementById('amPriority').title = 'Response ' + sla.response + ' · Resolution ' + sla.resolution;
        }
    });

    /* ---------- Toast ---------- */
    var toastEl = null;
    var toastTimer = null;

    function showToast(msg) {
        if (!toastEl) {
            toastEl = document.createElement('div');
            toastEl.className = 'tdash-toast';
            toastEl.innerHTML = '<i class="bi bi-check-circle-fill t-ico"></i><span></span>';
            document.body.appendChild(toastEl);
        }
        toastEl.querySelector('span').textContent = msg;
        toastEl.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { toastEl.classList.remove('show'); }, 3200);
    }

    document.getElementById('amUpdateBtn').addEventListener('click', function () {
        if (!currentTicket) return;
        var dept = document.getElementById('amDept').value;
        var assignee = document.getElementById('amAssignee').value;
        var newStatus = document.getElementById('amStatus').value;
        var priority = document.getElementById('amPriority').value;
        var reply = document.getElementById('amReply').value.trim();
        var rejectNote = document.getElementById('amRejectNote').value.trim();

        var updates = {
            assignedDept: dept || null,
            assignedTo: assignee || null,
            priority: priority,
            status: newStatus
        };

        /* SLA recalc on priority change */
        if (priority !== currentTicket.priority) {
            var sla = TicketingData.slaMatrix[priority];
            updates.resolutionDueTs = new Date(new Date(currentTicket.createdTs).getTime() + sla.resolutionHrs * 3600000).toISOString();
        }

        if (newStatus === 'Resolved' && currentTicket.status !== 'Resolved') {
            updates.resolvedTs = new Date().toISOString();
        }
        if (newStatus === 'Rejected' || newStatus === 'Cancelled') {
            updates.rejectNote = rejectNote || 'Ticket ' + newStatus.toLowerCase() + ' by helpdesk';
        }
        if (newStatus === 'Reopened') {
            updates.resolvedTs = null;
        }

        TicketingData.updateTicket(currentTicket.id, updates);
        if (reply) {
            TicketingData.addReply(currentTicket.id, reply, null, true);
        }

        modal.hide();
        refresh();
        showToast(currentTicket.id + ' updated' + (reply ? ' · reply sent' : ''));
    });

    /* Composer: send button adds reply without closing the modal */
    function sendReplyOnly() {
        if (!currentTicket) return;
        var input = document.getElementById('amReply');
        var reply = input.value.trim();
        if (!reply) return;
        TicketingData.addReply(currentTicket.id, reply, null, true);
        input.value = '';
        input.style.height = 'auto';
        renderConversation(TicketingData.getTicket(currentTicket.id));
        showToast('Reply added to ' + currentTicket.id);
    }

    document.getElementById('amSendBtn').addEventListener('click', sendReplyOnly);

    document.getElementById('amReply').addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendReplyOnly();
        }
    });

    document.getElementById('amReply').addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 130) + 'px';
    });

    /* ---------- Events ---------- */
    document.addEventListener('click', function (e) {
        var row = e.target.closest('.tkt-row');
        if (row && row.getAttribute('data-id')) {
            openAssign(row.getAttribute('data-id'));
        }
    });

    document.getElementById('tdashSearch').addEventListener('input', renderTable);
    document.getElementById('tdfApply').addEventListener('click', renderTable);
    document.getElementById('tdfClear').addEventListener('click', function () {
        ['tdfCategory', 'tdfPriority', 'tdfStatus', 'tdfDept'].forEach(function (id) {
            var el = document.getElementById(id);
            el.value = '';
            if (window.jQuery && $(el).hasClass('select2-hidden-accessible')) $(el).trigger('change');
        });
        document.getElementById('tdashSearch').value = '';
        quickFilter = '';
        document.querySelectorAll('.tdash-kpi').forEach(function (x) { x.classList.remove('active'); });
        renderTable();
    });

    document.querySelectorAll('.tdash-kpi').forEach(function (k) {
        k.addEventListener('click', function () {
            var jump = k.getAttribute('data-jump');
            quickFilter = (quickFilter === jump) ? '' : jump;
            document.querySelectorAll('.tdash-kpi').forEach(function (x) { x.classList.remove('active'); });
            if (quickFilter) k.classList.add('active');
            renderTable();
        });
    });

    /* ---------- Refresh all ---------- */
    function refresh() {
        renderKpis();
        renderTable();
        renderDeptMap();
        renderWorkload();
        renderAttention();
    }

    populateFilters();
    refresh();

    /* Init select2 filters on jQuery ready — after global scripts have run */
    if (window.jQuery) {
        $(function () { initDashSelect2(); });
    }

    /* Sidebar quick-filter links (New / Assigned / Pending / Resolved / SLA) */
    var sidebarFilter = null;
    try { sidebarFilter = sessionStorage.getItem('tktQuickFilter'); sessionStorage.removeItem('tktQuickFilter'); } catch (e) { /* ignore */ }
    if (sidebarFilter) {
        quickFilter = sidebarFilter;
        document.querySelectorAll('.tdash-kpi').forEach(function (k) {
            if (k.getAttribute('data-jump') === quickFilter) k.classList.add('active');
        });
        renderTable();
    }

    /* Deep link: ticket-dashboard.php?ticket=TKT-1001 */
    var params = new URLSearchParams(window.location.search);
    if (params.get('ticket')) openAssign(params.get('ticket'));
})();
</script>
