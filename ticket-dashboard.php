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
        <a href="ticket-reports.php" class="btn btn-hero-ghost">
            <i class="bi bi-clipboard-data me-1"></i> Ticket Reports
        </a>
        <a href="ticketing.php" class="btn btn-light fw-bold" style="border-radius:10px;">
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
<script src="./assets/js/pages/ticket-dashboard.js?v=<?php echo time(); ?>"></script>
