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
<script src="./assets/js/pages/cticket-admin.js?v=<?php echo time(); ?>"></script>