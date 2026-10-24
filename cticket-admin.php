<?php include 'header.php'; ?>

 

<style>
    /* ===== Admin hero (dark slate → blue) ===== */
    .cta-hero {
        background: linear-gradient(115deg, #0f2744 0%, #1e4d8c 55%, #2563eb 100%);
        border-radius: 18px;
        padding: 22px 28px;
        position: relative;
        overflow: hidden;
        margin-bottom: 6px;
    }

    .cta-hero::before,
    .cta-hero::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, .09);
    }

    .cta-hero::before { width: 190px; height: 190px; right: -50px; top: -80px; }

    .cta-hero::after {
        width: 120px;
        height: 120px;
        right: 130px;
        bottom: -70px;
        background: rgba(255, 255, 255, .06);
    }

    .cta-hero .hero-crumb {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 12.5px;
        color: rgba(255, 255, 255, .8);
        margin-bottom: 3px;
        position: relative;
        z-index: 1;
    }

    .cta-hero h1 {
        color: #fff;
        font-family: 'Sora', sans-serif;
        font-size: 1.6rem;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .cta-hero .hero-actions { position: relative; z-index: 1; }

    .cta-hero .btn-hero-ghost {
        background: rgba(255, 255, 255, .16);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, .38);
        font-weight: 700;
        font-size: 13px;
        padding: 7px 16px;
        border-radius: 10px;
        transition: background .15s ease;
    }

    .cta-hero .btn-hero-ghost:hover { background: rgba(255, 255, 255, .28); color: #fff; }

    /* ===== KPI cards ===== */
    .cta-kpi {
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

    .cta-kpi::before {
        content: '';
        position: absolute;
        right: -28px;
        top: -28px;
        width: 92px;
        height: 92px;
        border-radius: 50%;
        background: var(--wash, rgba(37, 99, 235, .07));
        transition: transform .25s ease;
    }

    .cta-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(20, 20, 43, .08);
    }

    .cta-kpi:hover::before { transform: scale(1.25); }

    .cta-kpi .k-val {
        font: 800 26px 'Sora', sans-serif;
        line-height: 1;
        color: var(--ink-900, #201a14);
    }

    .cta-kpi .k-label {
        font-size: 12px;
        font-weight: 700;
        color: var(--ink-500, #6b7684);
        margin-top: 5px;
    }

    .cta-kpi .k-ico {
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

    .cta-kpi.active {
        border: 2px solid #2563eb;
        background: #f5f8ff;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .14);
    }

    .cta-kpi > div:last-child { position: relative; z-index: 1; }

    /* ===== Badges ===== */
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

    .prj-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 99px;
    }

    /* ===== Table ===== */
    #ctAllTable thead th {
        position: sticky;
        top: 0;
        z-index: 3;
        background: #f8f9fb;
        box-shadow: 0 1px 0 var(--border-soft, #eef0f3);
    }

    #ctAllTable tbody tr { transition: background .15s ease; }

    #ctAllTable tbody tr:hover { background: #f8fafc; }

    #ctAllTable tbody td { vertical-align: middle; }

    .sla-due {
        font-size: 10px;
        color: var(--ink-500, #6b7684);
        margin-top: 2px;
    }

    /* ===== Side cards ===== */
    .side-scroll { overflow-y: auto; scrollbar-width: thin; }

    .side-scroll::-webkit-scrollbar { width: 5px; }

    .side-scroll::-webkit-scrollbar-track { background: transparent; }

    .side-scroll::-webkit-scrollbar-thumb { background: #dfe3e9; border-radius: 99px; }

    #ctPrjList,
    #ctTeamList { max-height: 280px; }

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

    /* attention rows */
    .attn-row {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 10px;
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 10px;
        cursor: pointer;
        transition: border-color .15s ease;
        position: relative;
    }

    .attn-row:hover { border-color: #2563eb; background: #fafcff; }

    .attn-row .a-bar {
        position: absolute;
        left: 0;
        top: 8px;
        bottom: 8px;
        width: 3px;
        border-radius: 99px;
    }

    /* issue split bar */
    .split-bar {
        display: flex;
        height: 14px;
        border-radius: 99px;
        overflow: hidden;
        background: #eef0f3;
    }

    .split-bar span { height: 100%; transition: width .35s ease; }

    .split-legend { display: flex; gap: 14px; margin-top: 8px; flex-wrap: wrap; }

    .split-legend .lg { font-size: 11px; font-weight: 700; color: var(--ink-500, #6b7684); display: flex; align-items: center; gap: 5px; }

    .split-legend .dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }

    /* ===== Fullscreen manage modal ===== */
    .cm-fs-content { background: #fff; }

    .cm-fs-header { border-bottom: 1px solid var(--border-soft, #eef0f3); flex-shrink: 0; }

    .cm-fs-header .btn { white-space: nowrap; }

    .cm-fs-body { display: flex; flex: 1; min-height: 0; overflow: hidden; }

    .cm-fs-left {
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

    .cm-fs-left::-webkit-scrollbar { width: 5px; }

    .cm-fs-left::-webkit-scrollbar-thumb { background: #dfe3e9; border-radius: 99px; }

    .cm-card {
        background: #fff;
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 14px;
        padding: 16px;
        box-shadow: 0 1px 3px rgba(20, 30, 25, .04);
    }

    .cm-info-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        padding: 5px 0;
        border-bottom: 1px dashed var(--border-soft, #eef0f3);
        font-size: 12px;
    }

    .cm-info-row:last-child { border-bottom: none; }

    .cm-info-row .v { font-weight: 700; color: var(--ink-900, #201a14); text-align: right; }

    .cm-desc {
        background: #f8f9fb;
        border-radius: 10px;
        padding: 11px 13px;
        font-size: 12.5px;
        font-weight: 500;
        white-space: pre-wrap;
    }

    .cm-fs-right {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        min-height: 0;
    }

    .cm-chat-head {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 800;
        font-size: 13.5px;
        padding: 12px 20px;
        border-bottom: 1px solid var(--border-soft, #eef0f3);
        flex-shrink: 0;
    }

    .cm-chat-scroll {
        flex: 1;
        overflow-y: auto;
        padding: 18px 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        background:
            radial-gradient(circle at 20% 10%, rgba(37, 99, 235, .04), transparent 42%),
            radial-gradient(circle at 85% 90%, rgba(30, 77, 140, .04), transparent 42%),
            #f6f7f9;
        scrollbar-width: thin;
    }

    .cm-chat-scroll::-webkit-scrollbar { width: 5px; }

    .cm-chat-scroll::-webkit-scrollbar-thumb { background: #dfe3e9; border-radius: 99px; }

    .cm-msg { display: flex; gap: 8px; max-width: 85%; }

    .cm-msg.staff { margin-left: auto; flex-direction: row-reverse; }

    .cm-msg .m-av {
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

    .cm-msg .m-bubble { border-radius: 12px; padding: 8px 12px; font-size: 12.5px; }

    .cm-msg.customer .m-bubble { background: #fff; border: 1px solid #e6e9ee; border-top-left-radius: 4px; }

    .cm-msg.staff .m-bubble { background: #e5edff; border-top-right-radius: 4px; }

    .cm-msg .m-meta {
        font-size: 10px;
        font-weight: 700;
        color: var(--ink-500, #6b7684);
        margin-bottom: 3px;
    }

    .cm-msg .m-att {
        margin-top: 5px;
        color: #1d4ed8;
        font-weight: 700;
        font-size: 11px;
        border: 1px dashed #93c5fd;
        border-radius: 8px;
        padding: 3px 8px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #f5f9ff;
    }

    .cm-composer-wrap {
        padding: 12px 20px 14px;
        border-top: 1px solid var(--border-soft, #eef0f3);
        background: #fff;
        flex-shrink: 0;
    }

    .cm-composer {
        border: 1px solid #eef0f3;
        border-radius: 10px;
        background: #f8f9fb;
        transition: all .15s ease;
    }

    .cm-composer:focus-within {
        background: #fff;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
    }

    .cm-composer textarea {
        border: none;
        background: transparent;
        resize: none;
        font-size: 13px;
        font-weight: 500;
    }

    .cm-composer textarea:focus { outline: none; box-shadow: none; background: transparent; }

    .cm-send-btn {
        border-radius: 10px;
        width: 38px;
        height: 38px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
    }

    .cm-hint {
        font-size: 10.5px;
        color: var(--ink-500, #6b7684);
        text-align: center;
        margin-top: 6px;
    }

    @media (max-width: 991.98px) {
        .cm-fs-body { flex-direction: column; overflow-y: auto; }
        .cm-fs-left { width: 100%; border-right: none; border-bottom: 1px solid var(--border-soft, #eef0f3); overflow: visible; }
        .cm-fs-right { min-height: 480px; }
    }

    /* Toast */
    .cta-toast {
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

    .cta-toast.show { opacity: 1; transform: none; }

    .cta-toast .t-ico { color: #4ade80; font-size: 15px; }
</style>

<!-- Hero -->
<div class="cta-hero d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <div class="hero-crumb">
            <i class="bi bi-headset"></i>
            <span>Ticketing</span>
            <i class="bi bi-chevron-right" style="font-size:10px;"></i>
            <span class="fw-bold" style="color:#fff;">Customer Tickets</span>
        </div>
        <h1>Customer Ticket Dashboard</h1>
    </div>
    <div class="hero-actions d-flex gap-2">
        <a href="customer-dashboard.php" class="btn btn-hero-ghost">
            <i class="bi bi-person me-1"></i> Customer View
        </a>
        <a href="ticket-dashboard.php" class="btn btn-light fw-bold" style="border-radius:10px;">
            <i class="bi bi-people me-1"></i> Employee Tickets
        </a>
    </div>
</div>

<!-- KPI Row -->
<div class="row g-3 mb-3">
    <div class="col-6 col-xl">
        <div class="cta-kpi d-flex align-items-center gap-3" data-jump="all" style="--wash:rgba(37,99,235,.07);">
            <div class="k-ico" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-ticket-perforated"></i></div>
            <div>
                <div class="k-val" id="akTotal">0</div>
                <div class="k-label">Total Tickets</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl">
        <div class="cta-kpi d-flex align-items-center gap-3" data-jump="new" style="--wash:rgba(124,58,237,.07);">
            <div class="k-ico" style="background:#ede9fe;color:#7c3aed;"><i class="bi bi-inbox"></i></div>
            <div>
                <div class="k-val" id="akNew">0</div>
                <div class="k-label">New</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl">
        <div class="cta-kpi d-flex align-items-center gap-3" data-jump="progress" style="--wash:rgba(217,119,6,.08);">
            <div class="k-ico" style="background:#fff4d9;color:#9a6200;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="k-val" id="akProgress">0</div>
                <div class="k-label">In Progress</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl">
        <div class="cta-kpi d-flex align-items-center gap-3" data-jump="resolved" style="--wash:rgba(12,163,8,.07);">
            <div class="k-ico" style="background:#e7f7eb;color:#087a24;"><i class="bi bi-check-circle"></i></div>
            <div>
                <div class="k-val" id="akResolved">0</div>
                <div class="k-label">Resolved</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-xl">
        <div class="cta-kpi d-flex align-items-center gap-3" data-jump="high" style="--wash:rgba(229,72,77,.08);">
            <div class="k-ico" style="background:#fdebed;color:#be3035;"><i class="bi bi-exclamation-triangle"></i></div>
            <div>
                <div class="k-val" id="akHigh">0</div>
                <div class="k-label">High / Critical</div>
            </div>
        </div>
    </div>
</div>

<!-- All tickets table (full width) -->
<div class="card-custom p-0 overflow-hidden mb-3">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="fw-bold" style="font-size:14px;">
            <i class="bi bi-ticket-detailed me-1" style="color:#2563eb;"></i> All Customer Tickets
            <span class="badge rounded-pill ms-1" style="background:#eaf1ff;color:#3564e0;font-size:11px;" id="akCountBadge">0</span>
        </div>
        <div class="d-flex gap-2">
            <select id="akFProject" class="form-select form-select-sm" style="min-width:160px;font-size:12.5px;font-weight:600;">
                <option value="">All Projects</option>
            </select>
            <select id="akFIssue" class="form-select form-select-sm" style="min-width:160px;font-size:12.5px;font-weight:600;">
                <option value="">All Issue Types</option>
            </select>
            <select id="akFStatus" class="form-select form-select-sm" style="min-width:150px;font-size:12.5px;font-weight:600;">
                <option value="">All Statuses</option>
            </select>
            <div class="mt-search-wrap">
                <i class="bi bi-search mt-search-icon"></i>
                <input type="text" class="mt-search-input" placeholder="Search ticket / customer..." id="akSearch">
            </div>
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border" style="max-height:520px;">
        <table class="table-modern w-100 mb-0" id="ctAllTable">
            <thead>
                <tr>
                    <th class="text-nowrap">Ticket</th>
                    <th class="text-nowrap">Customer</th>
                    <th class="text-nowrap">Project</th>
                    <th class="text-nowrap">Issue Type</th>
                    <th class="text-nowrap">Priority</th>
                    <th class="text-nowrap">Assigned To</th>
                    <th class="text-nowrap">SLA</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap text-center">Action</th>
                </tr>
            </thead>
            <tbody id="akBody">
                <!-- Filled by JS -->
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center p-3" style="border-top:1px solid var(--border-soft,#eef0f3);">
        <span class="text-muted" style="font-size:12px;">Showing <strong id="akShown">0</strong> of <strong id="akTotalCount">0</strong> tickets</span>
        <span class="text-muted" style="font-size:12px;">Click a row to manage &amp; reply</span>
    </div>
</div>

<!-- ===== Side cards row ===== -->
<div class="row g-3 align-items-stretch">
    <div class="col-xl-4 col-md-6 d-flex">
        <div class="card-custom p-3 flex-grow-1">
            <div class="side-card-title mb-2">
                <i class="bi bi-kanban" style="color:#2563eb;"></i> Project-wise Tickets
                <span class="sc-badge" id="akPrjBadge">0</span>
            </div>
            <div class="d-flex flex-column gap-2 side-scroll" id="ctPrjList">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 d-flex">
        <div class="card-custom p-3 flex-grow-1">
            <div class="side-card-title mb-2">
                <i class="bi bi-people" style="color:#2563eb;"></i> Team Workload
            </div>
            <div class="d-flex flex-column gap-2 side-scroll" id="ctTeamList">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-12 d-flex">
        <div class="card-custom p-3 flex-grow-1 d-flex flex-column">
            <div class="side-card-title mb-2">
                <i class="bi bi-lightning-charge" style="color:#9a6200;"></i> Needs Attention
                <span class="sc-badge" id="akAttnBadge" style="background:#fff4d9;color:#9a6200;">0</span>
            </div>
            <div class="d-flex flex-column gap-2 side-scroll mb-3" id="ctAttnList" style="max-height:190px;">
                <!-- Filled by JS -->
            </div>

            <div class="side-card-title mb-2">
                <i class="bi bi-pie-chart" style="color:#2563eb;"></i> Bug vs Change Request
            </div>
            <div class="split-bar" id="akSplitBar">
                <span style="background:#be3035;" id="akSplitBugs"></span>
                <span style="background:#2563eb;" id="akSplitChanges"></span>
                <span style="background:#94a3b8;" id="akSplitOthers"></span>
            </div>
            <div class="split-legend">
                <span class="lg"><span class="dot" style="background:#be3035;"></span> Bugs <strong id="akBugsN">0</strong></span>
                <span class="lg"><span class="dot" style="background:#2563eb;"></span> Change / Feature <strong id="akChangesN">0</strong></span>
                <span class="lg"><span class="dot" style="background:#94a3b8;"></span> Others <strong id="akOthersN">0</strong></span>
            </div>
        </div>
    </div>
</div>

<!-- Quick Assign Modal -->
<div class="modal fade" id="quickAssignModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" style="font-size: 15px;">Assign Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="assignTicketId">
                <div class="mb-3">
                    <label class="form-label fw-semibold" style="font-size: 12px;">Select Person</label>
                    <select class="form-select form-select-sm" id="profileDropdown">
                        <option value="">-- Select Person --</option>
                        <option value="John Doe">John Doe</option>
                        <option value="Sarah Connor">Sarah Connor</option>
                        <option value="Alex Smith">Alex Smith</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm" id="saveAssignBtn">Assign Now</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Fullscreen Manage modal ===== -->
<div class="modal fade" id="akModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0 rounded-0 cm-fs-content">

            <div class="modal-header cm-fs-header py-3">
                <div class="d-flex align-items-center gap-2 flex-wrap min-w-0">
                    <h5 class="modal-title fw-bold mb-0 me-1" id="amId" style="font-family:'Sora',sans-serif;">TKT-2001</h5>
                    <span class="tkt-status-badge" id="amStatusBadge">New</span>
                    <span class="tkt-priority-badge" id="amPriorityBadge">High</span>
                    <span class="fw-bold ms-2 text-truncate d-none d-md-block" id="amSubject" style="font-size:13.5px;color:var(--ink-500,#6b7684);"></span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-primary btn-sm" id="amUpdateBtn">
                        <i class="bi bi-check-circle me-1"></i> Update Ticket
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

            <div class="cm-fs-body">
                <!-- Left: details + controls -->
                <div class="cm-fs-left">
                    <div class="cm-card">
                        <div class="fw-bold mb-2" style="font-size:13.5px;"><i class="bi bi-info-circle me-1" style="color:#2563eb;"></i>Ticket Information</div>
                        <div class="cm-info-row"><span class="text-muted">Customer</span><span class="v" id="amCustomer"></span></div>
                        <div class="cm-info-row"><span class="text-muted">Contact Person</span><span class="v" id="amContactPerson"></span></div>
                        <div class="cm-info-row"><span class="text-muted">Phone</span><span class="v" id="amContactPhone"></span></div>
                        <div class="cm-info-row"><span class="text-muted">Project</span><span class="v" id="amProject"></span></div>
                        <div class="cm-info-row"><span class="text-muted">Issue Type</span><span class="v" id="amIssue"></span></div>
                        <div class="cm-info-row"><span class="text-muted">Created</span><span class="v" id="amCreated"></span></div>
                        <div class="cm-info-row"><span class="text-muted">SLA Due</span><span class="v" id="amSla"></span></div>
                        <div class="cm-info-row"><span class="text-muted">Expected Date</span><span class="v" id="amExpected"></span></div>
                        <div class="cm-info-row"><span class="text-muted">Attachment</span><span class="v" id="amAttachment"></span></div>
                    </div>

                    <div class="cm-card">
                        <div class="fw-bold mb-2" style="font-size:13.5px;"><i class="bi bi-file-text me-1" style="color:#2563eb;"></i>Description</div>
                        <div class="cm-desc" id="amDesc"></div>
                    </div>

                    <div class="cm-card">
                        <div class="fw-bold mb-2" style="font-size:13.5px;"><i class="bi bi-sliders me-1" style="color:#2563eb;"></i>Manage</div>
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label fw-bold mb-1" style="font-size:11px;">Team</label>
                                <select class="form-select form-select-sm" id="amTeam">
                                    <option value="">Select...</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold mb-1" style="font-size:11px;">Assign To</label>
                                <select class="form-select form-select-sm" id="amAssignee" disabled>
                                    <option value="">Select team first</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold mb-1" style="font-size:11px;">Priority</label>
                                <select class="form-select form-select-sm" id="amPriority">
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                    <option>Critical</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold mb-1" style="font-size:11px;">Status</label>
                                <select class="form-select form-select-sm" id="amStatus"></select>
                            </div>
                            <div class="col-12 form-text" style="font-size:10.5px;">
                                Flow: New → Assigned → In Progress → Waiting for Customer → Resolved → Closed
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: conversation -->
                <div class="cm-fs-right">
                    <div class="cm-chat-head">
                        <i class="bi bi-chat-dots" style="color:#2563eb;"></i> Conversation
                        <span class="badge rounded-pill ms-1" style="background:#eaf1ff;color:#3564e0;font-size:10.5px;" id="amMsgCount">0</span>
                    </div>
                    <div class="cm-chat-scroll" id="amChat">
                        <!-- Filled by JS -->
                    </div>
                    <div class="cm-composer-wrap">
                        <div class="cm-composer d-flex align-items-end gap-2 p-2">
                            <textarea class="form-control" id="amReply" rows="1" placeholder="Reply to customer..."></textarea>
                            <button type="button" class="btn btn-primary cm-send-btn" id="amSendBtn" title="Send reply"><i class="bi bi-send"></i></button>
                        </div>
                        <div class="cm-hint">Enter to send · Reply appears in the customer's conversation · Update Ticket saves assignment &amp; status</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cta-toast" id="akToast"><i class="bi bi-check-circle-fill t-ico"></i><span></span></div>

<?php include 'footer.php'; ?>

<script src="./assets/js/cticket-data.js"></script>
<script>
(function () {
    'use strict';

    var modalEl = document.getElementById('akModal');
    var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    var quickAssignModalEl = document.getElementById('quickAssignModal');
    var quickAssignModal = bootstrap.Modal.getOrCreateInstance(quickAssignModalEl);
    
    var currentTicket = null;
    var quickFilter = '';
    var toastTimer = null;

    function showToast(msg) {
        var t = document.getElementById('akToast');
        t.querySelector('span').textContent = msg;
        t.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { t.classList.remove('show'); }, 3200);
    }

    /* ---------- KPIs ---------- */
    function renderKpis() {
        var c = CustomerTicketData.counts();
        document.getElementById('akTotal').textContent = c.total;
        document.getElementById('akNew').textContent = c.newT + c.reopened;
        document.getElementById('akProgress').textContent = c.assigned + c.inProgress + c.waiting;
        document.getElementById('akResolved').textContent = c.resolved + c.closed;
        document.getElementById('akHigh').textContent = c.highCritical;
    }

    /* ---------- Filters ---------- */
    function populateFilters() {
        var pj = document.getElementById('akFProject');
        CustomerTicketData.projects.forEach(function (p) {
            var o = document.createElement('option');
            o.value = p.id; o.textContent = p.icon + ' ' + p.name;
            pj.appendChild(o);
        });
        var it = document.getElementById('akFIssue');
        CustomerTicketData.issueTypes.forEach(function (i) {
            var o = document.createElement('option');
            o.value = i.name; o.textContent = i.icon + ' ' + i.name;
            it.appendChild(o);
        });
        var st = document.getElementById('akFStatus');
        ['New', 'Assigned', 'In Progress', 'Waiting for Customer', 'Resolved', 'Closed', 'Reopened'].forEach(function (s) {
            var o = document.createElement('option');
            o.value = s; o.textContent = s;
            st.appendChild(o);
        });
    }

    function getFiltered() {
        var q = document.getElementById('akSearch').value.trim().toLowerCase();
        var pj = document.getElementById('akFProject').value;
        var it = document.getElementById('akFIssue').value;
        var st = document.getElementById('akFStatus').value;

        return CustomerTicketData.getAllTickets().filter(function (t) {
            if (quickFilter === 'new' && ['New', 'Reopened'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'progress' && ['Assigned', 'In Progress', 'Waiting for Customer'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'resolved' && ['Resolved', 'Closed'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'high' && ['High', 'Critical'].indexOf(t.priority) === -1) return false;
            if (pj && t.projectId !== pj) return false;
            if (it && t.issueType !== it) return false;
            if (st && t.status !== st) return false;
            if (q && (t.id + ' ' + t.subject + ' ' + t.customerName + ' ' + t.customerOrg).toLowerCase().indexOf(q) === -1) return false;
            return true;
        });
    }

    /* ---------- Table ---------- */
    function slaBadge(t) {
        var s = CustomerTicketData.slaState(t);
        var due = new Date(t.resolutionDueTs);
        var dueStr = due.toLocaleDateString([], { day: '2-digit', month: 'short' }) + ' ' +
            due.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        var dueHtml = '<div class="sla-due">Due ' + dueStr + '</div>';
        if (s === 'breached') return '<span class="badge rounded-pill" style="background:#fdebed;color:#be3035;font-size:10.5px;">Breached</span>' + dueHtml;
        if (s === 'at-risk') return '<span class="badge rounded-pill" style="background:#fff4d9;color:#9a6200;font-size:10.5px;">At Risk</span>' + dueHtml;
        return '<span class="badge rounded-pill" style="background:#e7f7eb;color:#087a24;font-size:10.5px;">On Track</span>' + dueHtml;
    }

    function renderTable() {
        var rows = getFiltered();
        document.getElementById('akCountBadge').textContent = rows.length;
        document.getElementById('akShown').textContent = rows.length;
        document.getElementById('akTotalCount').textContent = rows.length;

        var tbody = document.getElementById('akBody');
        if (!rows.length) {
            tbody.innerHTML = '<tr><td colspan="9" class="text-center text-muted py-4">No tickets match the current filters</td></tr>';
            return;
        }

        tbody.innerHTML = rows.map(function (t) {
            var st = CustomerTicketData.statusMeta(t.status);
            var pr = CustomerTicketData.priorityMeta(t.priority);
            var pj = CustomerTicketData.getProject(t.projectId);
            var pjStyle = pj ? 'background:' + pj.bg + ';color:' + pj.color + ';' : 'background:#f3f4f6;color:#475569;';
            
            // Action Column: Status "New" ah irundha 'Assign' Button, illana standard 'Manage' Button
            var actionBtnHtml = '';
            if (t.status.toLowerCase() === 'new') {
                actionBtnHtml = '<button class="btn btn-sm btn-primary btn-assign-ticket text-nowrap" data-id="' + t.id + '" style="font-size:11px; padding:3px 8px;"><i class="bi bi-person-plus me-1"></i>Assign</button>';
            } else {
                actionBtnHtml = '<button class="btn btn-action-icon btn-view-details" data-bs-toggle="tooltip" data-bs-title="Manage Ticket"><i class="bi bi-pencil-square"></i></button>';
            }

            return '<tr class="ak-row" data-id="' + t.id + '" style="cursor:pointer;">' +
                '<td><span class="fw-bold" style="color:#2563eb;">' + t.id + '</span>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + t.createdDate + '</div></td>' +
                '<td><div class="fw-bold" style="font-size:12.5px;">' + CustomerTicketData.escapeHtml(t.customerName) + '</div>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + CustomerTicketData.escapeHtml(t.customerOrg) + '</div>' +
                (t.contactPhone ? '<div style="font-size:10.5px;color:#1d4ed8;"><i class="bi bi-telephone me-1"></i>' + CustomerTicketData.escapeHtml(t.contactPhone) + '</div>' : '') + '</td>' +
                '<td><span class="prj-chip" style="' + pjStyle + '"><span>' + t.projectIcon + '</span>' + CustomerTicketData.escapeHtml(t.projectName) + '</span></td>' +
                '<td><span style="font-size:13px;">' + t.issueIcon + '</span> <span style="font-size:12px;">' + CustomerTicketData.escapeHtml(t.issueType) + '</span></td>' +
                '<td><span class="tkt-priority-badge" style="background:' + pr.bg + ';color:' + pr.color + ';">' + t.priority + '</span></td>' +
                '<td style="font-size:12px;">' + (t.assignedTo
                    ? '<div class="fw-semibold">' + CustomerTicketData.escapeHtml(t.assignedTo) + '</div><div style="font-size:10px;color:var(--ink-500,#6b7684);">' + CustomerTicketData.escapeHtml(t.assignedTeam || '') + '</div>'
                    : '<span class="badge rounded-pill" style="background:#f3f4f6;color:#6b7280;font-size:10px;">Unassigned</span>') + '</td>' +
                '<td>' + slaBadge(t) + '</td>' +
                '<td><span class="tkt-status-badge" style="background:' + st.bg + ';color:' + st.color + ';"><i class="bi ' + st.icon + '"></i>' + t.status + '</span></td>' +
                '<td class="text-center">' + actionBtnHtml + '</td>' +
                '</tr>';
        }).join('');
    }

    /* ---------- Project-wise card ---------- */
    function renderProjects() {
        var wrap = document.getElementById('ctPrjList');
        var all = CustomerTicketData.getAllTickets();
        var rows = [];

        CustomerTicketData.projects.forEach(function (p) {
            var list = all.filter(function (t) { return t.projectId === p.id; });
            if (!list.length) return;
            var active = list.filter(function (t) { return ['Resolved', 'Closed'].indexOf(t.status) === -1; }).length;
            var unassigned = list.filter(function (t) { return !t.assignedTo; }).length;
            rows.push('<div class="attn-row ak-row" data-id="' + (list[0] ? list[0].id : '') + '">' +
                
                '<span style="font-size:15px;">' + p.icon + '</span>' +
                '<div class="min-w-0"><div class="fw-bold text-truncate" style="font-size:12px;">' + CustomerTicketData.escapeHtml(p.name) + '</div>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + list.length + ' tickets · ' + active + ' active</div></div>' +
                (unassigned
                    ? '<span class="badge rounded-pill ms-auto" style="background:' + p.bg + ';color:' + p.color + ';font-size:9.5px;">' + unassigned + ' unassigned</span>'
                    : '<span class="badge rounded-pill ms-auto" style="background:#e7f7eb;color:#087a24;font-size:9.5px;">✓ clear</span>') +
                '</div>');
        });

        document.getElementById('akPrjBadge').textContent = rows.length;
        wrap.innerHTML = rows.length ? rows.join('') : '<div class="text-center text-muted py-3" style="font-size:12px;">No tickets yet</div>';
    }

    /* ---------- Team workload card ---------- */
    function renderTeams() {
        var wrap = document.getElementById('ctTeamList');
        var people = {};
        var maxActive = 1;

        Object.keys(CustomerTicketData.teams).forEach(function (team) {
            CustomerTicketData.teams[team].forEach(function (person) {
                var active = CustomerTicketData.getAllTickets().filter(function (t) {
                    return t.assignedTo === person && ['Resolved', 'Closed'].indexOf(t.status) === -1;
                }).length;
                people[person] = { team: team, active: active };
                if (active > maxActive) maxActive = active;
            });
        });

        wrap.innerHTML = Object.keys(people).map(function (person) {
            var s = people[person];
            var color = s.active >= 3 ? '#be3035' : (s.active >= 1 ? '#9a6200' : '#087a24');
            var pct = Math.round((s.active / maxActive) * 100);
            var initials = person.split(' ')[0][0];
            var teamColor = { 'Development': '#2563eb', 'Design': '#7c3aed', 'Support': '#087a24', 'QA': '#9a6200' }[s.team] || '#475569';
            return '<div class="attn-row" style="cursor:default;">' +
                '<span style="width:32px;height:32px;border-radius:50%;display:grid;place-items:center;font-size:13px;font-weight:800;color:#fff;background:' + teamColor + ';flex-shrink:0;">' + initials + '</span>' +
                '<div class="min-w-0 flex-grow-1"><div class="fw-bold text-truncate" style="font-size:12px;">' + CustomerTicketData.escapeHtml(person) + '</div>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + s.team + '</div>' +
                '<div style="height:5px;border-radius:99px;background:#eef0f3;margin-top:5px;overflow:hidden;"><span style="display:block;height:100%;width:' + pct + '%;background:' + color + ';border-radius:99px;"></span></div></div>' +
                '<span class="badge rounded-pill ms-auto" style="background:' + color + '18;color:' + color + ';font-size:10px;">' + s.active + ' active</span>' +
                '</div>';
        }).join('');
    }

    /* ---------- Needs attention card ---------- */
    function renderAttention() {
        var wrap = document.getElementById('ctAttnList');
        var items = [];

        CustomerTicketData.getAllTickets().forEach(function (t) {
            if (CustomerTicketData.slaState(t) === 'breached') {
                items.push({ t: t, label: 'SLA breached', color: '#be3035', bar: '#be3035' });
            } else if (CustomerTicketData.overdueState(t)) {
                items.push({ t: t, label: 'Past expected date', color: '#c2410c', bar: '#c2410c' });
            } else if (!t.assignedTo) {
                items.push({ t: t, label: 'Unassigned', color: '#2563eb', bar: '#2563eb' });
            } else if (t.status === 'Waiting for Customer') {
                items.push({ t: t, label: 'Waiting on customer', color: '#be185d', bar: '#be185d' });
            }
        });

        document.getElementById('akAttnBadge').textContent = items.length;

        if (!items.length) {
            wrap.innerHTML = '<div class="text-center text-muted py-3" style="font-size:12px;">All good — nothing pending 🎉</div>';
            return;
        }

        wrap.innerHTML = items.slice(0, 5).map(function (item) {
            return '<div class="attn-row ak-row" data-id="' + item.t.id + '">' +
                
                '<span style="font-size:15px;">' + item.t.projectIcon + '</span>' +
                '<div class="min-w-0"><div class="fw-bold text-truncate" style="font-size:12px;">' + item.t.id + ' · ' + CustomerTicketData.escapeHtml(item.t.subject) + '</div>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + CustomerTicketData.escapeHtml(item.t.customerName) + ' · ' + item.t.createdDate + '</div></div>' +
                '<span class="badge rounded-pill ms-auto" style="background:' + item.color + '15;color:' + item.color + ';font-size:9.5px;">' + item.label + '</span>' +
                '</div>';
        }).join('');
    }

    /* ---------- Bug vs Change split ---------- */
    function renderSplit() {
        var s = CustomerTicketData.issueSplit();
        var total = s.bugs + s.changes + s.others || 1;
        document.getElementById('akSplitBugs').style.width = (s.bugs / total * 100) + '%';
        document.getElementById('akSplitChanges').style.width = (s.changes / total * 100) + '%';
        document.getElementById('akSplitOthers').style.width = (s.others / total * 100) + '%';
        document.getElementById('akBugsN').textContent = s.bugs;
        document.getElementById('akChangesN').textContent = s.changes;
        document.getElementById('akOthersN').textContent = s.others;
    }

    /* ---------- Manage modal ---------- */
    function avatarColor(name) {
        var colors = ['#3564e0', '#7c3aed', '#087a24', '#9a6200', '#be3035', '#be185d', '#0ea5e9'];
        return colors[name.length % colors.length];
    }

    function renderChat(t) {
        var wrap = document.getElementById('amChat');
        var msgs = t.conversation || [];
        document.getElementById('amMsgCount').textContent = msgs.length + ' messages';
        wrap.innerHTML = msgs.map(function (m) {
            var isStaff = m.by === 'staff';
            var initials = m.name.split(' ').map(function (p) { return p[0]; }).slice(0, 2).join('').toUpperCase();
            return '<div class="cm-msg ' + (isStaff ? 'staff' : 'customer') + '">' +
                '<span class="m-av" style="background:' + avatarColor(m.name) + ';">' + initials + '</span>' +
                '<div><div class="m-meta">' + CustomerTicketData.escapeHtml(m.name) + ' · ' + CustomerTicketData.fmtTs(m.ts) + '</div>' +
                '<div class="m-bubble">' + CustomerTicketData.escapeHtml(m.text) +
                (m.attachment ? '<div class="m-att"><i class="bi bi-paperclip"></i>' + CustomerTicketData.escapeHtml(m.attachment) + '</div>' : '') +
                '</div></div></div>';
        }).join('');
        wrap.scrollTop = wrap.scrollHeight;
    }

    function fillTeamOptions(selectedTeam, selectedPerson) {
        var sel = document.getElementById('amTeam');
        sel.innerHTML = '<option value="">Select...</option>' +
            Object.keys(CustomerTicketData.teams).map(function (team) {
                return '<option ' + (team === selectedTeam ? 'selected' : '') + '>' + team + '</option>';
            }).join('');
        fillAssignees(selectedTeam, selectedPerson);
    }

    function fillAssignees(team, selected) {
        var sel = document.getElementById('amAssignee');
        if (!team || !CustomerTicketData.teams[team]) {
            sel.innerHTML = '<option value="">Select team first</option>';
            sel.disabled = true;
            return;
        }
        sel.disabled = false;
        sel.innerHTML = '<option value="">Select person...</option>' +
            CustomerTicketData.teams[team].map(function (p) {
                return '<option ' + (p === selected ? 'selected' : '') + '>' + p + '</option>';
            }).join('');
        if (selected) sel.value = selected;
    }

    function fillStatusOptions(t) {
        var sel = document.getElementById('amStatus');
        var opts = [t.status].concat(CustomerTicketData.allowedNextStatuses(t));
        sel.innerHTML = opts.map(function (s) { return '<option>' + s + '</option>'; }).join('');
        sel.value = t.status;
    }

    function openManage(id) {
        var t = CustomerTicketData.getTicket(id);
        if (!t) return;
        currentTicket = t;

        var st = CustomerTicketData.statusMeta(t.status);
        var pr = CustomerTicketData.priorityMeta(t.priority);

        document.getElementById('amId').textContent = t.id;
        document.getElementById('amSubject').textContent = t.subject;
        document.getElementById('amStatusBadge').textContent = t.status;
        document.getElementById('amStatusBadge').style.cssText = 'background:' + st.bg + ';color:' + st.color + ';';
        document.getElementById('amPriorityBadge').textContent = t.priority;
        document.getElementById('amPriorityBadge').style.cssText = 'background:' + pr.bg + ';color:' + pr.color + ';';

        document.getElementById('amCustomer').textContent = t.customerName + ' (' + t.customerOrg + ')';
        document.getElementById('amContactPerson').textContent = t.contactPerson || t.customerName;
        document.getElementById('amContactPhone').innerHTML = t.contactPhone
            ? '<a href="tel:' + CustomerTicketData.escapeHtml(t.contactPhone) + '" style="color:#1d4ed8;text-decoration:none;"><i class="bi bi-telephone me-1"></i>' + CustomerTicketData.escapeHtml(t.contactPhone) + '</a>'
            : '—';
        document.getElementById('amProject').textContent = t.projectIcon + ' ' + t.projectName;
        document.getElementById('amIssue').textContent = t.issueIcon + ' ' + t.issueType;
        document.getElementById('amCreated').textContent = t.createdDate;
        var due = new Date(t.resolutionDueTs);
        document.getElementById('amSla').textContent = due.toLocaleDateString([], { day: '2-digit', month: 'short' }) + ' · ' + due.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        document.getElementById('amExpected').textContent = t.expectedDate || '—';
        document.getElementById('amAttachment').innerHTML = t.attachment
            ? '<span style="color:#1d4ed8;"><i class="bi bi-paperclip me-1"></i>' + CustomerTicketData.escapeHtml(t.attachment) + '</span>'
            : '—';
        document.getElementById('amDesc').textContent = t.description;

        document.getElementById('amPriority').value = t.priority;
        document.getElementById('amReply').value = '';
        fillTeamOptions(t.assignedTeam, t.assignedTo);
        fillStatusOptions(t);
        renderChat(t);

        modal.show();
    }

    document.getElementById('amTeam').addEventListener('change', function () {
        fillAssignees(this.value, '');
    });

    function sendReplyOnly() {
        if (!currentTicket) return;
        var input = document.getElementById('amReply');
        var text = input.value.trim();
        if (!text) return;
        var sender = document.getElementById('amAssignee').value || 'Support Team';
        CustomerTicketData.addReply(currentTicket.id, text, null, true, sender);
        input.value = '';
        input.style.height = 'auto';
        currentTicket = CustomerTicketData.getTicket(currentTicket.id);
        renderChat(currentTicket);
        showToast('Reply sent on ' + currentTicket.id);
    }

    document.getElementById('amSendBtn').addEventListener('click', sendReplyOnly);
    document.getElementById('amReply').addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); sendReplyOnly(); }
    });
    document.getElementById('amReply').addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 130) + 'px';
    });

    document.getElementById('amUpdateBtn').addEventListener('click', function () {
        if (!currentTicket) return;
        var team = document.getElementById('amTeam').value;
        var assignee = document.getElementById('amAssignee').value;
        var newStatus = document.getElementById('amStatus').value;
        var priority = document.getElementById('amPriority').value;

        var updates = {
            assignedTeam: team || null,
            assignedTo: assignee || null,
            priority: priority,
            status: newStatus
        };

        if (newStatus === 'Resolved' && currentTicket.status !== 'Resolved') {
            updates.resolvedTs = new Date().toISOString();
        }
        if (newStatus === 'Reopened') {
            updates.resolvedTs = null;
        }

        CustomerTicketData.updateTicket(currentTicket.id, updates);
        modal.hide();
        refresh();
        showToast(currentTicket.id + ' updated');
    });

    /* ---------- Events ---------- */
    document.addEventListener('click', function (e) {
        // Quick Assign button event
        var assignBtn = e.target.closest('.btn-assign-ticket');
        if (assignBtn) {
            e.stopPropagation(); // Row click event trigger aagamarukka
            var ticketId = assignBtn.getAttribute('data-id');
            document.getElementById('assignTicketId').value = ticketId;
            document.getElementById('profileDropdown').value = '';
            quickAssignModal.show();
            return;
        }

        // Row click event (Open manage modal)
        var row = e.target.closest('.ak-row');
        if (row && row.getAttribute('data-id')) openManage(row.getAttribute('data-id'));
    });

    // Save Assign Action
    document.getElementById('saveAssignBtn').addEventListener('click', function () {
        var ticketId = document.getElementById('assignTicketId').value;
        var selectedPerson = document.getElementById('profileDropdown').value;

        if (!selectedPerson) {
            alert('Please select a person to assign!');
            return;
        }

        CustomerTicketData.updateTicket(ticketId, {
            assignedTo: selectedPerson,
            status: 'Assigned' // Assign senjakapram status ah "Assigned" nu maathugiron
        });

        quickAssignModal.hide();
        refresh();
        showToast(ticketId + ' assigned to ' + selectedPerson);
    });

    document.getElementById('akSearch').addEventListener('input', renderTable);
    ['akFProject', 'akFIssue', 'akFStatus'].forEach(function (id) {
        document.getElementById(id).addEventListener('change', renderTable);
    });

    document.querySelectorAll('.cta-kpi').forEach(function (k) {
        k.addEventListener('click', function () {
            var jump = k.getAttribute('data-jump');
            quickFilter = (quickFilter === jump) ? '' : jump;
            document.querySelectorAll('.cta-kpi').forEach(function (x) { x.classList.remove('active'); });
            if (quickFilter) k.classList.add('active');
            renderTable();
        });
    });

    function refresh() {
        renderKpis();
        renderTable();
        renderProjects();
        renderTeams();
        renderAttention();
        renderSplit();
    }

    populateFilters();
    refresh();

    /* Sidebar quick-filter links (New / In Progress / Resolved / High-Critical) */
    var sidebarFilter = null;
    try { sidebarFilter = sessionStorage.getItem('ctQuickFilter'); sessionStorage.removeItem('ctQuickFilter'); } catch (e) { /* ignore */ }
    if (sidebarFilter) {
        quickFilter = sidebarFilter;
        document.querySelectorAll('.cta-kpi').forEach(function (k) {
            if (k.getAttribute('data-jump') === quickFilter) k.classList.add('active');
        });
        renderTable();
    }

    /* Deep link: cticket-admin.php?ticket=TKT-2001 */
    var params = new URLSearchParams(window.location.search);
    if (params.get('ticket')) openManage(params.get('ticket'));
})();
</script>