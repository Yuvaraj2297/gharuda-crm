<?php include 'header.php'; ?>

 
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    :root {
        --gh-primary: #087a24;
        --gh-primary-hover: #065e1c;
        --gh-primary-light: #e7f7eb;
        --gh-border: #e2e8f0;
        --gh-dark: #0f172a;
        --gh-muted: #64748b;
    }

    .font-display {
        font-family: 'Sora', 'Manrope', sans-serif;
    }

    /* KPI Stat Card Model (from onboarding-list.php) */
    .onb-kpi {
        min-height: 96px;
        padding: 16px;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 14px;
        background: var(--white, #ffffff);
        box-shadow: 0 4px 16px rgba(20, 30, 25, .04);
        transition: transform .2s ease;
    }
    .onb-kpi:hover { transform: translateY(-2px); }
    .onb-kpi .icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .onb-kpi .label {
        color: var(--ink-500, #64748b);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .onb-kpi .value {
        color: var(--ink-900, #0f172a);
        font-size: 22px;
        font-weight: 800;
    }
    .onb-kpi .sub {
        color: var(--ink-500, #64748b);
        font-size: 11px;
        margin-top: 2px;
    }

    /* Stage Tabs Model (from onboarding-list.php) */
    .ln-stage-tab {
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #475569;
        font-weight: 600;
        font-size: 12.5px;
        padding: 8px 18px;
        border-radius: 20px;
        transition: all 0.2s ease;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        user-select: none;
    }
    .ln-stage-tab:hover {
        background: #f8fafc;
        color: var(--primary, #087a24);
        border-color: #cbd5e1;
    }
    .ln-stage-tab.active {
        background: var(--primary, #087a24) !important;
        color: #fff !important;
        border-color: var(--primary, #087a24) !important;
        box-shadow: 0 4px 12px rgba(8, 122, 36, 0.25);
    }
    .tab-pane.fade.show {
        animation: tabFadeIn 0.2s ease-in-out;
    }
    @keyframes tabFadeIn {
        from { opacity: 0; transform: translateY(3px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Access Governance & Role Badges */
    .role-badge {
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 6px;
        letter-spacing: 0.2px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .role-badge-hr { background: #fdf2f8; color: #9d174d; border: 1px solid #fbcfe8; }
    .role-badge-mgr { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }
    .role-badge-tl { background: #f0fdf4; color: #15803d; border: 1px solid #bbf7d0; }
    .role-badge-emp { background: #f1f5f9; color: #64748b; border: 1px solid #cbd5e1; }

    .role-sim-btn {
        font-size: 12px;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background: #ffffff;
        color: #475569;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .role-sim-btn:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
    }
    .role-sim-btn.active {
        background: #0f172a;
        color: #ffffff;
        border-color: #0f172a;
        box-shadow: 0 2px 6px rgba(15, 23, 42, 0.2);
    }
    .role-sim-btn.active.btn-hr-active {
        background: #9d174d;
        border-color: #9d174d;
    }
    .role-sim-btn.active.btn-mgr-active {
        background: #1d4ed8;
        border-color: #1d4ed8;
    }
    .role-sim-btn.active.btn-tl-active {
        background: #15803d;
        border-color: #15803d;
    }
    .role-sim-btn.active.btn-emp-active {
        background: #dc2626;
        border-color: #dc2626;
    }

    /* Badge & Relationship Styles */
    .rel-badge { font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 6px; letter-spacing: 0.2px; display: inline-flex; align-items: center; gap: 4px; }
    .rel-self { background: #e0e7ff; color: #3730a3; }
    .rel-mgr { background: #f3e8ff; color: #7e22ce; }
    .rel-peer { background: #e0f2fe; color: #0369a1; }
    .rel-sub { background: #dcfce7; color: #15803d; }
    .rel-cross { background: #fef3c7; color: #b45309; }

    /* Review Card */
    .review-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 20px;
        position: relative;
        transition: all 0.25s ease;
    }
    .review-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }

    /* Locked State for Non-Authorized Roles (e.g. Employee) */
    .review-card.is-locked {
        background: #f8fafc;
        border-color: #e2e8f0;
        box-shadow: none;
    }
    .review-card.is-locked .card-avatar {
        filter: grayscale(1);
        opacity: 0.7;
    }
    .review-card .lock-overlay-tag {
        display: none;
    }

    /* Modern Executive 360 Score Chips & Workflow Status Capsules */
    .score-chip {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12.5px;
        font-weight: 700;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        transition: all 0.2s ease;
        letter-spacing: 0.1px;
    }
    .score-chip-high {
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
        color: #047857;
        border: 1px solid #a7f3d0;
    }
    .score-chip-good {
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        color: #15803d;
        border: 1px solid #bbf7d0;
    }
    .score-chip-active {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        color: #0284c7;
        border: 1px solid #bae6fd;
    }
    .score-chip-warning {
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
        color: #b45309;
        border: 1px solid #fde68a;
    }
    .score-chip-pending {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        color: #64748b;
        border: 1px solid #e2e8f0;
    }

    .status-capsule {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11.5px;
        font-weight: 600;
        letter-spacing: 0.2px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.06);
        white-space: nowrap;
    }
    .status-capsule-completed {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #ffffff;
    }
    .status-capsule-hr {
        background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        color: #ffffff;
    }
    .status-capsule-tl {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: #ffffff;
    }
    .status-capsule-mgr {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        color: #ffffff;
    }
    .status-capsule-pending {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        color: #ffffff;
    }
    .review-card.is-locked .lock-overlay-tag {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #fee2e2;
        color: #991b1b;
        font-size: 10.5px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 6px;
        border: 1px solid #fecaca;
    }
    .review-card.is-locked .card-eval-btn {
        background: #e2e8f0 !important;
        border-color: #cbd5e1 !important;
        color: #94a3b8 !important;
        cursor: not-allowed !important;
        box-shadow: none !important;
    }

    /* Dynamic Sequential Workflow Stepper Styles */
    .flow-stepper-wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 8px 10px;
        gap: 4px;
        margin-bottom: 12px;
    }
    .flow-step-item {
        flex: 1;
        text-align: center;
    }
    .flow-step-pill {
        font-size: 10px;
        font-weight: 700;
        padding: 3px 6px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        white-space: nowrap;
        transition: all 0.3s ease;
    }
    .flow-step-done { background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }
    .flow-step-active { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; animation: activePulse 1.8s infinite; }
    .flow-step-pending { background: #f1f5f9; color: #94a3b8; border: 1px solid #e2e8f0; }

    @keyframes activePulse {
        0% { box-shadow: 0 0 0 0 rgba(29, 78, 216, 0.4); }
        70% { box-shadow: 0 0 0 5px rgba(29, 78, 216, 0); }
        100% { box-shadow: 0 0 0 0 rgba(29, 78, 216, 0); }
    }

    .flow-arrow-line {
        width: 14px;
        height: 2px;
        background: #cbd5e1;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    .flow-arrow-line.done { background: #15803d; }

    /* Rating Stars */
    .star-rating {
        color: #f59e0b;
        font-size: 1.1rem;
        letter-spacing: 1px;
    }
    .interactive-stars .star-btn {
        font-size: 1.6rem;
        color: #cbd5e1;
        cursor: pointer;
        transition: color 0.15s ease;
    }
    .interactive-stars .star-btn:hover,
    .interactive-stars .star-btn.active {
        color: #f59e0b;
    }

    /* Action Card */
    .action-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-left: 4px solid var(--gh-primary);
        border-radius: 12px;
        padding: 18px;
    }

    /* Toast Notification */
    .feedback-toast {
        position: fixed;
        bottom: 24px;
        right: 24px;
        background: #0f172a;
        color: #fff;
        padding: 12px 20px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        z-index: 999999;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13.5px;
        font-weight: 500;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        pointer-events: none;
    }
    .feedback-toast.show {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    /* Select2 Modal Fix */
    .select2-container--open { z-index: 99999 !important; }
    .select2-dropdown { z-index: 99999 !important; border-radius: 10px !important; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">360° Continuous Feedback & Multi-Rater Reviews</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-chat-square-quote fs-6 text-success"></i>
            <span>Performance Management</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">360° Feedback</span>
        </nav>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <button class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" type="button" data-bs-toggle="modal" data-bs-target="#createEmployeeReviewModal">
            <i class="bi bi-person-plus-fill me-1"></i> Create Employee Review
        </button>
        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#createCycleModal">
            <i class="bi bi-arrow-repeat me-1"></i> New 360° Cycle
        </button>
    </div>
</div>

<!-- KPI Metric Cards (Matching onboarding-list.php onb-kpi model) -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="onb-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e8f7ea;color:#087a24;"><i class="bi bi-arrow-repeat"></i></div>
            <div>
                <div class="label">Active Feedback Cycles</div>
                <div class="value">3 Cycles</div>
                <div class="sub">FY25-26 Annual Review Live</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="onb-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="label">Pending Feedback Requests</div>
                <div class="value">8 Requests</div>
                <div class="sub">3 Due this week</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="onb-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e0f2fe;color:#0369a1;"><i class="bi bi-star-fill"></i></div>
            <div>
                <div class="label">Avg 360° Feedback Rating</div>
                <div class="value">4.2 <span style="font-size:13px; font-weight:600; color:#64748b;">/ 5.0</span></div>
                <div class="sub">+0.3 vs last quarter</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="onb-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#dcfce7;color:#15803d;"><i class="bi bi-journal-check"></i></div>
            <div>
                <div class="label">Development Plans Created</div>
                <div class="value">12 Plans</div>
                <div class="sub">Connected to Goals & OKRs</div>
            </div>
        </div>
    </div>
</div>

<!-- Filter Stage Tabs (Matching onboarding-list.php ln-stage-tab model) -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div class="d-flex align-items-center gap-2 flex-wrap" id="stageTabsWrap">
        <button class="ln-stage-tab active" id="tab-cycles-btn" data-bs-target="#tab-cycles" type="button">
            <i class="bi bi-arrow-repeat me-1"></i> 1. Feedback Cycles
        </button>
        <button class="ln-stage-tab" id="tab-give-btn" data-bs-target="#tab-give" type="button">
            <i class="bi bi-pencil-square me-1"></i> 2. Give Feedback <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill ms-1" style="font-size:10px; font-weight:700;"><i class="bi bi-shield-lock-fill me-1"></i>HR / Manager / TL</span>
        </button>
        <button class="ln-stage-tab" id="tab-my-report-btn" data-bs-target="#tab-my-report" type="button">
            <i class="bi bi-person-badge me-1"></i> 3. My Feedback Report
        </button>
    </div>
</div>

<!-- Tab Contents -->
<div class="tab-content" id="pills-tabContent">

    <!-- ==========================================
         TAB 1: FEEDBACK CYCLES (HR / Admin Flow)
         ========================================== -->
    <!-- ==========================================
         TAB 1: FEEDBACK CYCLES & COMPLETED EMPLOYEE REVIEWS
         ========================================== -->
    <div class="tab-pane fade show active" id="tab-cycles" role="tabpanel">
        <div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="360-feedback-cycles-report">
            <!-- Interactive Status & Dept Filter Bar -->
            <div class="p-3 bg-light border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2 flex-wrap" id="tab1FilterPillGroup">
                    <span class="fw-bold text-dark small"><i class="bi bi-funnel-fill text-success me-1"></i> Review Status Filter:</span>
                    <button class="btn btn-sm btn-dark tab1-filter-pill active" data-filter="all" onclick="filterTab1Table('all', this)">All Reviews (6)</button>
                    <button class="btn btn-sm btn-outline-success tab1-filter-pill" data-filter="completed" onclick="filterTab1Table('completed', this)">🟢 Finished / Completed (3)</button>
                    <button class="btn btn-sm btn-outline-warning tab1-filter-pill" data-filter="in_progress" onclick="filterTab1Table('in_progress', this)">🟡 Active / In-Progress (2)</button>
                    <button class="btn btn-sm btn-outline-secondary tab1-filter-pill" data-filter="pending" onclick="filterTab1Table('pending', this)">⚪ Pending (1)</button>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <select class="form-select form-select-sm" id="tab1DeptFilter" onchange="filterTab1Table()" style="width:160px;">
                        <option value="all" selected>All Departments</option>
                        <option value="Engineering">Engineering</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Infrastructure">Infrastructure</option>
                    </select>
                    <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
                    <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
                    <div class="mt-search-wrap">
                        <i class="bi bi-search mt-search-icon"></i>
                        <input type="text" class="mt-search-input" placeholder="Search employee..." id="tab1Search" onkeyup="filterTab1Table()">
                    </div>
                </div>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                <table class="table-modern w-100 mb-0" id="tab1EmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-nowrap">S.No</th>
                            <th class="text-nowrap">Employee</th>
                            <th class="text-nowrap">Department / Role</th>
                            <th class="text-nowrap">Feedback Cycle</th>
                            <th class="text-nowrap">Mgr Score</th>
                            <th class="text-nowrap">TL Score</th>
                            <th class="text-nowrap">HR Score</th>
                            <th class="text-nowrap">Overall 360°</th>
                            <th class="text-nowrap">Workflow Status</th>
                            <th class="text-nowrap text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody id="pgBody">
                        <tr data-status="completed" data-dept="Engineering">
                            <td>1</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="./assets/img/profile-1.jpg" class="rounded-circle border" style="width:34px; height:34px; object-fit:cover;" alt="Arun">
                                    <div>
                                        <div class="fw-bold text-dark">Arun Kumar</div>
                                        <div class="text-muted" style="font-size:11px;">Senior Software Engineer</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">Engineering</span></td>
                            <td class="fw-semibold">FY25-26 Annual 360° Review</td>
                            <td class="fw-bold text-success">4.5</td>
                            <td class="fw-bold text-primary">4.2</td>
                            <td class="fw-bold text-dark">4.0</td>
                            <td><span class="score-chip score-chip-good"><i class="bi bi-star-fill text-warning me-1"></i>4.1 <span class="text-muted fw-normal ms-1" style="font-size:10.5px;">/ 5.0</span></span></td>
                            <td><span class="status-capsule status-capsule-completed"><i class="bi bi-check-circle-fill me-1"></i> Completed</span></td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-file-earmark-text me-1"></i> Report</button>
                            </td>
                        </tr>
                        <tr data-status="completed" data-dept="UI/UX Design">
                            <td>2</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle border d-grid place-items-center bg-purple-subtle text-purple fw-bold" style="width:34px; height:34px; font-size:13px; background:#f3e8ff; color:#7e22ce;">AC</div>
                                    <div>
                                        <div class="fw-bold text-dark">Amelia Curr</div>
                                        <div class="text-muted" style="font-size:11px;">Design Lead</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">UI/UX Design</span></td>
                            <td class="fw-semibold">Q1 Leadership Check-in</td>
                            <td class="fw-bold text-success">4.9</td>
                            <td class="fw-bold text-primary">4.8</td>
                            <td class="fw-bold text-dark">4.7</td>
                            <td><span class="score-chip score-chip-high"><i class="bi bi-star-fill text-warning me-1"></i>4.8 <span class="text-muted fw-normal ms-1" style="font-size:10.5px;">/ 5.0</span></span></td>
                            <td><span class="status-capsule status-capsule-completed"><i class="bi bi-check-circle-fill me-1"></i> Completed</span></td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-file-earmark-text me-1"></i> Report</button>
                            </td>
                        </tr>
                        <tr data-status="completed" data-dept="Engineering">
                            <td>3</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle border d-grid place-items-center bg-light text-secondary fw-bold" style="width:34px; height:34px; font-size:13px;">SV</div>
                                    <div>
                                        <div class="fw-bold text-dark">Sanjay V</div>
                                        <div class="text-muted" style="font-size:11px;">Associate Software Engineer</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">Engineering</span></td>
                            <td class="fw-semibold">Probation 360 Review</td>
                            <td class="fw-bold text-success">4.6</td>
                            <td class="fw-bold text-primary">4.4</td>
                            <td class="fw-bold text-dark">4.5</td>
                            <td><span class="score-chip score-chip-high"><i class="bi bi-star-fill text-warning me-1"></i>4.5 <span class="text-muted fw-normal ms-1" style="font-size:10.5px;">/ 5.0</span></span></td>
                            <td><span class="status-capsule status-capsule-completed"><i class="bi bi-check-circle-fill me-1"></i> Completed</span></td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-file-earmark-text me-1"></i> Report</button>
                            </td>
                        </tr>
                        <tr data-status="in_progress" data-dept="Infrastructure">
                            <td>4</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="./assets/img/profile-2.jpg" class="rounded-circle border" style="width:34px; height:34px; object-fit:cover;" alt="Daniel">
                                    <div>
                                        <div class="fw-bold text-dark">Daniel Martinez</div>
                                        <div class="text-muted" style="font-size:11px;">DevOps & Cloud Lead</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">Infrastructure</span></td>
                            <td class="fw-semibold">Leadership Check-in</td>
                            <td class="fw-bold text-success">4.8</td>
                            <td class="fw-bold text-primary">4.7</td>
                            <td class="fw-bold text-dark">4.5</td>
                            <td><span class="score-chip score-chip-active"><i class="bi bi-star-fill text-warning me-1"></i>4.65 <span class="text-muted fw-normal ms-1" style="font-size:10.5px;">/ 5.0</span></span></td>
                            <td><span class="status-capsule status-capsule-hr"><i class="bi bi-award-fill me-1"></i> Stage 3: HR Review</span></td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-file-earmark-text me-1"></i> Report</button>
                            </td>
                        </tr>
                        <tr data-status="in_progress" data-dept="UI/UX Design">
                            <td>5</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="./assets/img/profile-3.jpg" class="rounded-circle border" style="width:34px; height:34px; object-fit:cover;" alt="Priya">
                                    <div>
                                        <div class="fw-bold text-dark">Priya Sharma</div>
                                        <div class="text-muted" style="font-size:11px;">Frontend Developer</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">UI/UX Design</span></td>
                            <td class="fw-semibold">FY25-26 Annual Review</td>
                            <td class="fw-bold text-success">4.2</td>
                            <td class="fw-bold text-primary">4.0</td>
                            <td class="fw-semibold text-secondary">--</td>
                            <td><span class="score-chip score-chip-warning"><i class="bi bi-star-fill text-warning me-1"></i>4.1 <span class="text-muted fw-normal ms-1" style="font-size:10.5px;">/ 5.0</span></span></td>
                            <td><span class="status-capsule status-capsule-tl"><i class="bi bi-compass-fill me-1"></i> Stage 2: TL Review</span></td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-file-earmark-text me-1"></i> Report</button>
                            </td>
                        </tr>
                        <tr data-status="pending" data-dept="Engineering">
                            <td>6</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle border d-grid place-items-center bg-light text-dark fw-bold" style="width:34px; height:34px; font-size:13px;">MK</div>
                                    <div>
                                        <div class="fw-bold text-dark">Manoj Kumar</div>
                                        <div class="text-muted" style="font-size:11px;">Junior Software Engineer</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">Engineering</span></td>
                            <td class="fw-semibold">FY25-26 Annual Review</td>
                            <td class="fw-semibold text-secondary">--</td>
                            <td class="fw-semibold text-secondary">--</td>
                            <td class="fw-semibold text-secondary">--</td>
                            <td><span class="score-chip score-chip-pending"><i class="bi bi-hourglass-split me-1"></i>Pending</span></td>
                            <td><span class="status-capsule status-capsule-pending"><i class="bi bi-clock-history me-1"></i> Stage 1: Pending (Manager)</span></td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="alert('Sent reminder to Manager!')"><i class="bi bi-bell me-1"></i> Remind</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer matching onboarding-list.php model -->
            <div class="d-flex justify-content-between align-items-center report-footer p-3">
                <div class="d-flex gap-2 align-items-center">
                    <span class="small text-muted text-nowrap">Show:</span>
                    <select class="form-select form-select-sm gh-w-auto" id="showEntries">
                        <option selected>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">6</strong> of <strong id="pgTotal">6</strong></span>
                </div>
                <nav>
                    <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- ==========================================
         TAB 2: GIVE FEEDBACK (Reviewer Portal Flow - Restricted to HR, Manager, TL)
         ========================================== -->
    <div class="tab-pane fade" id="tab-give" role="tabpanel">
        
        <!-- Unified 360° Continuous Feedback Sequential Workflow Pipeline & Perspective Switcher Card -->
        <div class="card border-0 shadow-sm rounded-4 p-3 mb-3 bg-white border-start border-4 border-primary">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle p-2 fs-6 rounded-3">
                        <i class="bi bi-diagram-3-fill fs-5"></i>
                    </span>
                    <div>
                        <h6 class="fw-bold text-dark mb-0 font-display">360° Feedback Evaluation Pipeline (Manager ➔ TL ➔ HR Admin)</h6>
                        <div class="text-muted" style="font-size:12.5px;">
                            Sequential Approval Flow: <strong class="text-dark">1. Manager Review</strong> ➔ Auto-forwards to <strong class="text-dark">2. Team Leader (TL) Review</strong> ➔ Auto-forwards to <strong class="text-dark">3. HR Admin Signoff</strong> ➔ <strong class="text-dark">4. Final Published Report</strong>.
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1" style="font-size:11.5px;">
                        <i class="bi bi-arrow-repeat me-1"></i> Auto-Forwarding Active
                    </span>
                </div>
            </div>

            <!-- Global Pipeline Stepper Graphic -->
            <div class="flow-stepper-wrap mb-3">
                <div class="flow-step-item">
                    <div class="flow-step-pill flow-step-active" id="gStepMgr">
                        <i class="bi bi-person-badge-fill"></i> 1. Manager Review (Active 🔵)
                    </div>
                </div>
                <div class="flow-arrow-line" id="gArrow1"></div>
                <div class="flow-step-item">
                    <div class="flow-step-pill flow-step-pending" id="gStepTL">
                        <i class="bi bi-compass"></i> 2. Team Leader (TL) Review
                    </div>
                </div>
                <div class="flow-arrow-line" id="gArrow2"></div>
                <div class="flow-step-item">
                    <div class="flow-step-pill flow-step-pending" id="gStepHR">
                        <i class="bi bi-award"></i> 3. HR Admin Final Signoff
                    </div>
                </div>
                <div class="flow-arrow-line" id="gArrow3"></div>
                <div class="flow-step-item">
                    <div class="flow-step-pill flow-step-pending" id="gStepDone">
                        <i class="bi bi-file-earmark-check-fill"></i> 4. Feedback Published
                    </div>
                </div>
            </div>

            <!-- Integrated Perspective Switcher Bar inside the SAME Card -->
            <div class="p-2 bg-light rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-2 border">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-person-bounding-box text-secondary"></i>
                    <span class="small fw-bold text-dark">Active Evaluator Perspective:</span>
                    <div class="d-flex gap-1 flex-wrap" id="roleSwitcherWrap">
                        <button type="button" class="role-sim-btn active btn-mgr-active" data-role="manager" onclick="switchEvaluatorRole('manager', this)">
                            <i class="bi bi-person-badge-fill me-1"></i> Manager (Ravi C)
                        </button>
                        <button type="button" class="role-sim-btn" data-role="tl" onclick="switchEvaluatorRole('tl', this)">
                            <i class="bi bi-compass-fill me-1"></i> Team Leader (Karthik R)
                        </button>
                        <button type="button" class="role-sim-btn" data-role="hr" onclick="switchEvaluatorRole('hr', this)">
                            <i class="bi bi-award-fill me-1"></i> HR Admin (Divya R)
                        </button>
                        <button type="button" class="role-sim-btn" data-role="employee" onclick="switchEvaluatorRole('employee', this)">
                            <i class="bi bi-person-x-fill me-1"></i> Employee (Arun K - Restricted)
                        </button>
                    </div>
                </div>
                <div id="roleCurrentTag">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1" style="font-size:11.5px;">
                        <i class="bi bi-check-circle-fill me-1"></i> Authorized to Submit Feedback
                    </span>
                </div>
            </div>
        </div>

        <!-- Dynamic Access Status Notice -->
        <div id="authStatusBanner" class="alert alert-success d-flex align-items-center justify-content-between p-3 rounded-3 border-success-subtle mb-3">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-patch-check-fill fs-5 text-success"></i>
                <div>
                    <strong>Authorized Session:</strong> You are logged in with leadership evaluation rights as <strong id="activeRoleNameText">Reporting Manager (Ravi Chandran)</strong>. You have permissions to complete assigned 360° reviews.
                </div>
            </div>
            <span class="badge bg-success text-white">🟢 Full Submission Access</span>
        </div>

        <div id="authRestrictedBanner" class="alert alert-danger d-flex align-items-center justify-content-between p-3 rounded-3 border-danger-subtle mb-3" style="display:none;">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-octagon-fill fs-5 text-danger"></i>
                <div>
                    <strong>Access Denied (View-Only Mode):</strong> You are currently viewing as <strong class="text-danger">General Employee (Arun Kumar)</strong>. Company governance states that 360° feedback can only be submitted by <strong class="text-dark">HR, Managers, and Team Leaders (TL)</strong>. All review actions below are locked.
                </div>
            </div>
            <span class="badge bg-danger text-white"><i class="bi bi-lock-fill me-1"></i> Submission Locked</span>
        </div>

        <!-- Filter Pills & Count -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
            <div class="d-flex gap-2 flex-wrap" id="reviewFilterWrap">
                <button class="btn btn-sm btn-dark filter-pill-btn active" data-filter="all" onclick="filterReviewCards('all', this)">All Reviews (6)</button>
                <button class="btn btn-sm btn-outline-warning filter-pill-btn" data-filter="pending" onclick="filterReviewCards('pending', this)">🟡 Pending (3)</button>
                <button class="btn btn-sm btn-outline-info filter-pill-btn" data-filter="in_progress" onclick="filterReviewCards('in_progress', this)">🔵 In Progress (1)</button>
                <button class="btn btn-sm btn-outline-success filter-pill-btn" data-filter="submitted" onclick="filterReviewCards('submitted', this)">🟢 Submitted (2)</button>
            </div>
            <div class="text-muted small" id="pendingCountText">
                <i class="bi bi-info-circle me-1"></i> You have <strong class="text-danger">3 pending reviews</strong> awaiting your evaluation
            </div>
        </div>

        <!-- 6 Role-Gated Review Cards with Live Sequential Flow Steppers (Manager ➔ TL ➔ HR Admin) -->
        <div class="row g-3" id="reviewCardsGrid">
            
            <!-- Card 1: Arun Kumar (Stage 1: Manager Review) -->
            <div class="col-12 col-md-6 col-lg-4 review-card-item" data-status="pending" data-auth-role="manager" id="card_arun">
                <div class="review-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="role-badge role-badge-mgr card-role-tag"><i class="bi bi-person-badge-fill"></i> Stage 1: Manager Review</span>
                            <div class="d-flex align-items-center gap-1">
                                <span class="lock-overlay-tag"><i class="bi bi-lock-fill"></i> Locked</span>
                                <span class="badge bg-warning-subtle text-dark border border-warning card-status-badge">🟡 Active Review</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <img src="./assets/img/profile-1.jpg" class="rounded-circle border card-avatar" style="width:48px; height:48px; object-fit:cover;" alt="Arun">
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Arun Kumar</h6>
                                <div class="text-muted small">Senior Software Engineer</div>
                                <div class="text-secondary small" style="font-size:11px;">Engineering • Core Platform</div>
                            </div>
                        </div>

                        <!-- Sequential Flow Stepper: Manager ➔ TL ➔ HR -->
                        <div class="flow-stepper-wrap" style="font-size:9.5px;">
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-active"><i class="bi bi-arrow-right-circle-fill"></i> 1. Mgr</div>
                            </div>
                            <div class="flow-arrow-line"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-pending"><i class="bi bi-clock"></i> 2. TL</div>
                            </div>
                            <div class="flow-arrow-line"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-pending"><i class="bi bi-clock"></i> 3. HR</div>
                            </div>
                        </div>

                        <div class="bg-light p-2 rounded-3 mb-3" style="font-size:12px;">
                            <div><strong>Cycle:</strong> FY25-26 Annual 360° Review</div>
                            <div class="text-muted"><strong>Due Date:</strong> 25 Mar 2026 (<span class="text-danger fw-bold">8 days left</span>)</div>
                            <div class="text-secondary" style="font-size:11px;">Current Evaluator: <strong class="card-evaluator-name">Ravi Chandran (Manager)</strong></div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm w-100 card-eval-btn" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" data-bs-toggle="modal" data-bs-target="#evaluationModal" onclick="setupEvaluationForm('card_arun', 'Arun Kumar', 'Senior Software Engineer', 'Manager Review', 'Manager')">
                        <i class="bi bi-star me-1"></i> Start Feedback Evaluation
                    </button>
                </div>
            </div>

            <!-- Card 2: Priya Sharma (Stage 2: Team Leader Review) -->
            <div class="col-12 col-md-6 col-lg-4 review-card-item" data-status="pending" data-auth-role="tl" id="card_priya">
                <div class="review-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="role-badge role-badge-tl card-role-tag"><i class="bi bi-compass-fill"></i> Stage 2: Team Leader (TL) Review</span>
                            <div class="d-flex align-items-center gap-1">
                                <span class="lock-overlay-tag"><i class="bi bi-lock-fill"></i> Locked</span>
                                <span class="badge bg-warning-subtle text-dark border border-warning card-status-badge">🟡 Active Review</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <img src="./assets/img/profile-3.jpg" class="rounded-circle border card-avatar" style="width:48px; height:48px; object-fit:cover;" alt="Priya">
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Priya Sharma</h6>
                                <div class="text-muted small">Frontend Developer</div>
                                <div class="text-secondary small" style="font-size:11px;">UI/UX Design & Web Team</div>
                            </div>
                        </div>

                        <!-- Sequential Flow Stepper: Manager ➔ TL ➔ HR -->
                        <div class="flow-stepper-wrap" style="font-size:9.5px;">
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 1. Mgr</div>
                            </div>
                            <div class="flow-arrow-line done"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-active"><i class="bi bi-arrow-right-circle-fill"></i> 2. TL</div>
                            </div>
                            <div class="flow-arrow-line"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-pending"><i class="bi bi-clock"></i> 3. HR</div>
                            </div>
                        </div>

                        <div class="bg-light p-2 rounded-3 mb-3" style="font-size:12px;">
                            <div><strong>Cycle:</strong> FY25-26 Annual 360° Review</div>
                            <div class="text-muted"><strong>Due Date:</strong> 25 Mar 2026 (<span class="text-danger fw-bold">8 days left</span>)</div>
                            <div class="text-secondary" style="font-size:11px;">Current Evaluator: <strong class="card-evaluator-name">Karthik Raja (TL)</strong></div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm w-100 card-eval-btn" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" data-bs-toggle="modal" data-bs-target="#evaluationModal" onclick="setupEvaluationForm('card_priya', 'Priya Sharma', 'Frontend Developer', 'Team Leader Review', 'Team Leader')">
                        <i class="bi bi-star me-1"></i> Start Feedback Evaluation
                    </button>
                </div>
            </div>

            <!-- Card 3: Daniel Martinez (Stage 3: HR Admin Review) -->
            <div class="col-12 col-md-6 col-lg-4 review-card-item" data-status="in_progress" data-auth-role="hr" id="card_daniel">
                <div class="review-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="role-badge role-badge-hr card-role-tag"><i class="bi bi-award-fill"></i> Stage 3: HR Admin Review</span>
                            <div class="d-flex align-items-center gap-1">
                                <span class="lock-overlay-tag"><i class="bi bi-lock-fill"></i> Locked</span>
                                <span class="badge bg-info-subtle text-dark border border-info card-status-badge">🔵 In Progress</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <img src="./assets/img/profile-2.jpg" class="rounded-circle border card-avatar" style="width:48px; height:48px; object-fit:cover;" alt="Daniel">
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Daniel Martinez</h6>
                                <div class="text-muted small">DevOps & Cloud Lead</div>
                                <div class="text-secondary small" style="font-size:11px;">Infrastructure Team</div>
                            </div>
                        </div>

                        <!-- Sequential Flow Stepper: Manager ➔ TL ➔ HR -->
                        <div class="flow-stepper-wrap" style="font-size:9.5px;">
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 1. Mgr</div>
                            </div>
                            <div class="flow-arrow-line done"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 2. TL</div>
                            </div>
                            <div class="flow-arrow-line done"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-active"><i class="bi bi-arrow-right-circle-fill"></i> 3. HR</div>
                            </div>
                        </div>

                        <div class="bg-light p-2 rounded-3 mb-3" style="font-size:12px;">
                            <div><strong>Cycle:</strong> Leadership 360 Check-in</div>
                            <div class="text-muted"><strong>Due Date:</strong> 30 Mar 2026 (Draft Saved)</div>
                            <div class="text-secondary" style="font-size:11px;">Current Evaluator: <strong class="card-evaluator-name">Divya Ramesh (HR Admin)</strong></div>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary btn-sm w-100 card-eval-btn" data-bs-toggle="modal" data-bs-target="#evaluationModal" onclick="setupEvaluationForm('card_daniel', 'Daniel Martinez', 'DevOps & Cloud Lead', 'HR Administrator Review', 'HR Admin')">
                        <i class="bi bi-pencil me-1"></i> Continue Feedback Draft
                    </button>
                </div>
            </div>

            <!-- Card 4: Manoj Kumar (Stage 1: Manager Review) -->
            <div class="col-12 col-md-6 col-lg-4 review-card-item" data-status="pending" data-auth-role="manager" id="card_manoj">
                <div class="review-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="role-badge role-badge-mgr card-role-tag"><i class="bi bi-person-badge-fill"></i> Stage 1: Manager Review</span>
                            <div class="d-flex align-items-center gap-1">
                                <span class="lock-overlay-tag"><i class="bi bi-lock-fill"></i> Locked</span>
                                <span class="badge bg-warning-subtle text-dark border border-warning card-status-badge">🟡 Pending</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="rounded-circle border card-avatar d-grid place-items-center bg-light text-dark fw-bold" style="width:48px; height:48px; font-size:18px;">MK</div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Manoj Kumar</h6>
                                <div class="text-muted small">Junior Software Engineer</div>
                                <div class="text-secondary small" style="font-size:11px;">Backend Engineering</div>
                            </div>
                        </div>

                        <!-- Sequential Flow Stepper: Manager ➔ TL ➔ HR -->
                        <div class="flow-stepper-wrap" style="font-size:9.5px;">
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-active"><i class="bi bi-arrow-right-circle-fill"></i> 1. Mgr</div>
                            </div>
                            <div class="flow-arrow-line"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-pending"><i class="bi bi-clock"></i> 2. TL</div>
                            </div>
                            <div class="flow-arrow-line"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-pending"><i class="bi bi-clock"></i> 3. HR</div>
                            </div>
                        </div>

                        <div class="bg-light p-2 rounded-3 mb-3" style="font-size:12px;">
                            <div><strong>Cycle:</strong> FY25-26 Annual 360° Review</div>
                            <div class="text-muted"><strong>Due Date:</strong> 28 Mar 2026 (<span class="text-danger fw-bold">11 days left</span>)</div>
                            <div class="text-secondary" style="font-size:11px;">Current Evaluator: <strong class="card-evaluator-name">Ravi Chandran (Manager)</strong></div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm w-100 card-eval-btn" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" data-bs-toggle="modal" data-bs-target="#evaluationModal" onclick="setupEvaluationForm('card_manoj', 'Manoj Kumar', 'Junior Software Engineer', 'Manager Review', 'Manager')">
                        <i class="bi bi-star me-1"></i> Start Feedback Evaluation
                    </button>
                </div>
            </div>

            <!-- Card 5: Amelia Curr (Stage 4: Completed & Published) -->
            <div class="col-12 col-md-6 col-lg-4 review-card-item" data-status="submitted" data-auth-role="hr" id="card_amelia">
                <div class="review-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="role-badge role-badge-hr card-role-tag"><i class="bi bi-check-circle-fill text-success"></i> Stage 4: Workflow Complete</span>
                            <div class="d-flex align-items-center gap-1">
                                <span class="lock-overlay-tag"><i class="bi bi-lock-fill"></i> Locked</span>
                                <span class="badge bg-success-subtle text-success border border-success-subtle card-status-badge">🟢 Published</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="rounded-circle border card-avatar d-grid place-items-center bg-purple-subtle text-purple fw-bold" style="width:48px; height:48px; font-size:18px; background:#f3e8ff; color:#7e22ce;">AC</div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Amelia Curr</h6>
                                <div class="text-muted small">Design Lead</div>
                                <div class="text-secondary small" style="font-size:11px;">Product Experience</div>
                            </div>
                        </div>

                        <!-- Sequential Flow Stepper: Manager ➔ TL ➔ HR -->
                        <div class="flow-stepper-wrap" style="font-size:9.5px;">
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 1. Mgr</div>
                            </div>
                            <div class="flow-arrow-line done"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 2. TL</div>
                            </div>
                            <div class="flow-arrow-line done"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 3. HR</div>
                            </div>
                        </div>

                        <div class="bg-light p-2 rounded-3 mb-3" style="font-size:12px;">
                            <div><strong>Cycle:</strong> Q1 Leadership Check-in</div>
                            <div class="text-muted"><strong>Submitted On:</strong> 12 Mar 2026 • Score: <strong>4.8 / 5.0</strong></div>
                            <div class="text-secondary" style="font-size:11px;">Final HR Signoff: <strong class="card-evaluator-name">Divya Ramesh (HR Admin)</strong></div>
                        </div>
                    </div>
                    <button class="btn btn-outline-secondary btn-sm w-100 card-eval-btn" data-bs-toggle="modal" data-bs-target="#viewReportModal">
                        <i class="bi bi-eye me-1"></i> View Published 360° Report
                    </button>
                </div>
            </div>

            <!-- Card 6: Sanjay V (Stage 4: Completed & Published) -->
            <div class="col-12 col-md-6 col-lg-4 review-card-item" data-status="submitted" data-auth-role="hr" id="card_sanjay">
                <div class="review-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="role-badge role-badge-hr card-role-tag"><i class="bi bi-check-circle-fill text-success"></i> Stage 4: Workflow Complete</span>
                            <div class="d-flex align-items-center gap-1">
                                <span class="lock-overlay-tag"><i class="bi bi-lock-fill"></i> Locked</span>
                                <span class="badge bg-success-subtle text-success border border-success-subtle card-status-badge">🟢 Published</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="rounded-circle border card-avatar d-grid place-items-center bg-light text-secondary fw-bold" style="width:48px; height:48px; font-size:18px;">SV</div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0">Sanjay V</h6>
                                <div class="text-muted small">Associate Software Engineer</div>
                                <div class="text-secondary small" style="font-size:11px;">Engineering Intern Cohort</div>
                            </div>
                        </div>

                        <!-- Sequential Flow Stepper: Manager ➔ TL ➔ HR -->
                        <div class="flow-stepper-wrap" style="font-size:9.5px;">
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 1. Mgr</div>
                            </div>
                            <div class="flow-arrow-line done"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 2. TL</div>
                            </div>
                            <div class="flow-arrow-line done"></div>
                            <div class="flow-step-item">
                                <div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 3. HR</div>
                            </div>
                        </div>

                        <div class="bg-light p-2 rounded-3 mb-3" style="font-size:12px;">
                            <div><strong>Cycle:</strong> Probation 360 Review</div>
                            <div class="text-muted"><strong>Submitted On:</strong> 14 Mar 2026 • Score: <strong>4.5 / 5.0</strong></div>
                            <div class="text-secondary" style="font-size:11px;">Final HR Signoff: <strong class="card-evaluator-name">Divya Ramesh (HR Admin)</strong></div>
                        </div>
                    </div>
                    <button class="btn btn-outline-secondary btn-sm w-100 card-eval-btn" data-bs-toggle="modal" data-bs-target="#viewReportModal">
                        <i class="bi bi-eye me-1"></i> View Published 360° Report
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- ==========================================
         TAB 3: MY FEEDBACK REPORT (Employee View)
         ========================================== -->
    <div class="tab-pane fade" id="tab-my-report" role="tabpanel">
        
        <!-- Department & Employee Selection Filter Bar for Reports -->
        <div class="card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white border-start border-4 border-success">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success-subtle text-success p-2 rounded-3 fs-5"><i class="bi bi-file-earmark-bar-graph-fill"></i></span>
                    <div>
                        <h6 class="fw-bold text-dark mb-0 font-display">Individual 360° Executive Feedback Reports</h6>
                        <div class="text-muted small" style="font-size:11.5px;">Filter by department or select employee to view real-time 360° multi-rater evaluation report</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div>
                        <label class="form-label text-muted small mb-1 fw-bold" style="font-size:11px;"><i class="bi bi-building me-1"></i>Filter Department</label>
                        <select id="tab3DeptFilter" class="form-select form-select-sm border-secondary-subtle" style="width:190px;" onchange="filterTab3Department()">
                            <option value="all">All Departments</option>
                            <option value="Engineering">Engineering</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Infrastructure">Infrastructure</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label text-muted small mb-1 fw-bold" style="font-size:11px;"><i class="bi bi-person-bounding-box me-1 text-success"></i>Select Employee Report</label>
                        <select id="tab3EmpSelect" class="form-select form-select-sm border-success fw-bold text-dark" style="width:250px;" onchange="switchTab3EmployeeReport(this.value)">
                            <option value="arun" data-dept="Engineering">Arun Kumar (Senior Software Engineer)</option>
                            <option value="amelia" data-dept="UI/UX Design">Amelia Curr (Design Lead)</option>
                            <option value="sanjay" data-dept="Engineering">Sanjay V (Associate Software Engineer)</option>
                            <option value="daniel" data-dept="Infrastructure">Daniel Martinez (DevOps Lead)</option>
                            <option value="priya" data-dept="UI/UX Design">Priya Sharma (Frontend Developer)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic Employee Report Card Header -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
            <div class="row align-items-center g-3">
                <div class="col-12 col-md-7">
                    <div class="d-flex align-items-center gap-3">
                        <img id="tab3HeroAvatar" src="./assets/img/profile-1.jpg" class="rounded-circle border border-2 border-success shadow-sm" style="width:64px; height:64px; object-fit:cover;" alt="Arun">
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <h4 class="fw-bold text-dark mb-0 font-display" id="tab3HeroName">Arun Kumar</h4>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">FY25-26 360° Report</span>
                            </div>
                            <div class="text-muted" id="tab3HeroRoleDept">Senior Software Engineer • Engineering Department</div>
                            <div class="small text-secondary mt-1"><i class="bi bi-calendar-check me-1 text-success"></i> Feedback aggregated from <strong>5 Reviewers</strong> (Self, Manager, 2 Peers, 1 Direct Report)</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 text-md-end">
                    <div class="p-3 bg-light rounded-3 d-inline-block text-start border shadow-sm">
                        <div class="text-muted small fw-semibold" style="font-size:10px; letter-spacing:0.5px;">OVERALL 360° SCORE</div>
                        <div class="d-flex align-items-baseline gap-2">
                            <span class="fs-1 fw-bold text-success font-display" id="tab3HeroScore">4.1</span>
                            <span class="fs-6 text-muted">/ 5.0</span>
                            <span class="star-rating">★★★★☆</span>
                        </div>
                        <div class="small text-success fw-bold"><i class="bi bi-trophy me-1"></i> <span id="tab3HeroBand">Exceeds Expectations</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <!-- Source Breakdown Card -->
            <div class="col-12 col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                    <h5 class="fw-bold text-dark mb-3 font-display"><i class="bi bi-pie-chart text-primary me-2"></i>Source Breakdown</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0" style="font-size:13.5px;">
                            <thead>
                                <tr class="border-bottom">
                                    <th>Reviewer Source</th>
                                    <th>Count</th>
                                    <th>Rating Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="rel-badge rel-self"><i class="bi bi-person me-1"></i> Self</span></td>
                                    <td>1</td>
                                    <td><span class="fw-bold text-dark" id="tab3SrcSelf">4.2</span> <span class="star-rating fs-6">★★★★☆</span></td>
                                </tr>
                                <tr>
                                    <td><span class="rel-badge rel-mgr"><i class="bi bi-person-badge me-1"></i> Manager</span></td>
                                    <td>1</td>
                                    <td><span class="fw-bold text-dark" id="tab3SrcMgr">4.5</span> <span class="star-rating fs-6">★★★★☆</span></td>
                                </tr>
                                <tr>
                                    <td><span class="rel-badge rel-peer"><i class="bi bi-people me-1"></i> Peers</span></td>
                                    <td>2</td>
                                    <td><span class="fw-bold text-dark" id="tab3SrcPeers">4.0</span> <span class="star-rating fs-6">★★★★☆</span></td>
                                </tr>
                                <tr>
                                    <td><span class="rel-badge rel-sub"><i class="bi bi-diagram-3 me-1"></i> Direct Reports</span></td>
                                    <td>1</td>
                                    <td><span class="fw-bold text-dark" id="tab3SrcDirect">3.8</span> <span class="star-rating fs-6">★★★☆☆</span></td>
                                </tr>
                                <tr class="table-light fw-bold border-top">
                                    <td>Overall Aggregated</td>
                                    <td>5 total</td>
                                    <td><span class="fw-bold text-success fs-6" id="tab3SrcTotal">4.1 / 5.0</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Self vs Others Comparison Matrix Table -->
            <div class="col-12 col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark mb-0 font-display"><i class="bi bi-sliders text-success me-2"></i>Self vs. Others Comparison</h5>
                        <span class="badge bg-light text-dark border">Competency Analysis</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0" style="font-size:13.5px;">
                            <thead class="table-light">
                                <tr>
                                    <th>Competency Area</th>
                                    <th class="text-center">Self</th>
                                    <th class="text-center">Others (Avg)</th>
                                    <th class="text-center">Variance / Perception</th>
                                </tr>
                            </thead>
                            <tbody id="tab3MatrixBody">
                                <tr>
                                    <td class="fw-semibold">Communication & Clarity</td>
                                    <td class="text-center fw-bold">4.5</td>
                                    <td class="text-center fw-bold text-primary">4.1</td>
                                    <td class="text-center"><span class="badge bg-warning-subtle text-dark border border-warning">-0.4 (Over-estimated)</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Teamwork & Collaboration</td>
                                    <td class="text-center fw-bold">4.0</td>
                                    <td class="text-center fw-bold text-primary">4.2</td>
                                    <td class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle">+0.2 (Hidden Strength)</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Leadership & Ownership</td>
                                    <td class="text-center fw-bold">4.3</td>
                                    <td class="text-center fw-bold text-primary">3.7</td>
                                    <td class="text-center"><span class="badge bg-danger-subtle text-danger border border-danger-subtle">-0.6 (Growth Area)</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Problem Solving & Speed</td>
                                    <td class="text-center fw-bold">4.4</td>
                                    <td class="text-center fw-bold text-primary">4.6</td>
                                    <td class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle">+0.2 (High Impact)</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- ==========================================
     MODALS SECTION
     ========================================== -->

<!-- Modal 1: New 360° Feedback Cycle Builder Wizard -->
<div class="modal fade" id="createCycleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-arrow-repeat text-success me-2"></i> Create New 360° Feedback Cycle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="cycleWizardForm" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Feedback Cycle Name *</label>
                        <input type="text" class="form-control" placeholder="e.g. Annual 360° Performance Review FY25-26" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Review Due Date *</label>
                        <input type="date" class="form-control" value="2026-04-15" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Employees to be Reviewed *</label>
                        <select class="form-select select2" multiple required>
                            <option selected>All Employees (Organization-wide)</option>
                            <option>Engineering Team</option>
                            <option>UI/UX Design Team</option>
                            <option>Finance Department</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Anonymity Protection</label>
                        <select class="form-select">
                            <option selected>Anonymous (Peer & Direct Report individual responses hidden)</option>
                            <option>Non-Anonymous (Reviewer names visible to Managers & HR)</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Competency Areas / Evaluation Questions *</label>
                        <div class="row g-2">
                            <div class="col-md-3">
                                <div class="form-check card p-2 mb-0">
                                    <input class="form-check-input ms-1" type="checkbox" checked id="comp1">
                                    <label class="form-check-label ms-2 text-dark fw-semibold" for="comp1" style="font-size:12px;">Communication</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check card p-2 mb-0">
                                    <input class="form-check-input ms-1" type="checkbox" checked id="comp2">
                                    <label class="form-check-label ms-2 text-dark fw-semibold" for="comp2" style="font-size:12px;">Teamwork</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check card p-2 mb-0">
                                    <input class="form-check-input ms-1" type="checkbox" checked id="comp3">
                                    <label class="form-check-label ms-2 text-dark fw-semibold" for="comp3" style="font-size:12px;">Leadership</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check card p-2 mb-0">
                                    <input class="form-check-input ms-1" type="checkbox" checked id="comp4">
                                    <label class="form-check-label ms-2 text-dark fw-semibold" for="comp4" style="font-size:12px;">Problem Solving</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" style="background:var(--primary, #087a24);" onclick="alert('New 360° Feedback Cycle Created & Notifications Queued!'); $('#createCycleModal').modal('hide');">
                    <i class="bi bi-check-circle me-1"></i> Launch 360° Cycle
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2: Create Employee Review & Assign Evaluators Modal Popup -->
<div class="modal fade" id="createEmployeeReviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-person-plus-fill text-success me-2"></i> Create Employee Review & Assign Evaluators</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-success d-flex align-items-center gap-2 py-2 px-3 mb-3 rounded-3 border-success-subtle" style="font-size:12.5px;">
                    <i class="bi bi-shield-check text-success fs-5"></i>
                    <div>
                        <strong>Sequential Workflow:</strong> Creating a review card initializes it for <strong class="text-dark">Stage 1: Manager Review</strong>. Once Manager submits, it auto-forwards to <strong class="text-dark">Stage 2: TL Review</strong> and then <strong class="text-dark">Stage 3: HR Admin Signoff</strong>.
                    </div>
                </div>
                <form id="createEmployeeReviewForm" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Employee Full Name *</label>
                        <input type="text" class="form-control" id="newEmpName" placeholder="e.g. Kavitha M" value="Kavitha M" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Job Title / Role *</label>
                        <input type="text" class="form-control" id="newEmpRole" placeholder="e.g. Fullstack Developer" value="Fullstack Developer" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Department *</label>
                        <select class="form-select" id="newEmpDept">
                            <option value="Engineering • Core Platform" selected>Engineering & Platform</option>
                            <option value="UI/UX Design & Web Team">UI/UX Design & Web</option>
                            <option value="Quality Assurance (QA)">Quality Assurance (QA)</option>
                            <option value="Product Management">Product Management</option>
                            <option value="Human Resources">Human Resources</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Feedback Cycle *</label>
                        <select class="form-select" id="newEmpCycle">
                            <option value="FY25-26 Annual 360° Review" selected>FY25-26 Annual 360° Review</option>
                            <option value="Q1 Leadership Check-in">Q1 Leadership Check-in</option>
                            <option value="Probationary 360° Evaluation">Probationary 360° Evaluation</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-primary" style="font-size:12.5px;">👔 Assigned Manager (Stage 1) *</label>
                        <select class="form-select" id="newEmpMgr">
                            <option value="Ravi Chandran (Manager)" selected>Ravi Chandran (Reporting Manager)</option>
                            <option value="Rajesh Pillai (Senior Manager)">Rajesh Pillai (VP Engineering)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-success" style="font-size:12.5px;">🎯 Assigned Team Leader / TL (Stage 2) *</label>
                        <select class="form-select" id="newEmpTL">
                            <option value="Karthik Raja (TL)" selected>Karthik Raja (Team Leader)</option>
                            <option value="Amelia Curr (Design Lead)">Amelia Curr (Design Lead)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color:#9d174d; font-size:12.5px;">👑 Assigned HR Admin (Stage 3) *</label>
                        <select class="form-select" id="newEmpHR">
                            <option value="Divya Ramesh (HR Admin)" selected>Divya Ramesh (Senior HR Manager)</option>
                            <option value="Pooja Hegde (HR Rep)">Pooja Hegde (Talent Specialist)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold text-dark" style="font-size:12.5px;">🚀 Starting Evaluation Stage *</label>
                        <select class="form-select fw-semibold" id="newEmpStage">
                            <option value="manager" selected>👔 Stage 1: Manager Review (Default)</option>
                            <option value="tl">🎯 Stage 2: Team Leader (TL) Review</option>
                            <option value="hr">👑 Stage 3: HR Admin Signoff</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" style="background:var(--primary, #087a24);" onclick="createNewEmployeeReview()">
                    <i class="bi bi-check-circle me-1"></i> Create & Dispatch Review Card
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Alias for backwards compatibility -->
<div class="modal fade" id="assignReviewersModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-people text-primary me-2"></i> Select Multi-Rater Feedback Providers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <p class="text-muted">Use our unified creation modal to assign evaluators and launch employee reviews.</p>
                <button class="btn btn-success" style="background:var(--primary, #087a24);" onclick="$('#assignReviewersModal').modal('hide'); $('#createEmployeeReviewModal').modal('show');">
                    <i class="bi bi-person-plus-fill me-1"></i> Open Unified Review Creator
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3: Interactive Feedback Evaluation Form -->
<div class="modal fade" id="evaluationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <h5 class="modal-title fw-bold text-dark mb-0"><i class="bi bi-star text-warning me-2"></i> 360° Feedback Evaluation Form</h5>
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-1 flex-wrap" style="font-size:12px;">
                        <span>Reviewing: <strong class="text-dark" id="evalTargetName">Arun Kumar</strong></span>
                        <span class="text-muted">•</span>
                        <span id="evalRelBadge" class="role-badge role-badge-mgr"><i class="bi bi-person-badge-fill"></i> Manager Evaluation</span>
                        <span class="text-muted">•</span>
                        <span class="badge bg-success-subtle text-success border border-success-subtle"><i class="bi bi-shield-check me-1"></i> Evaluator Role: <strong id="evalRoleText">Reporting Manager</strong></span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="evaluationForm">
                    <!-- Evaluator Role Verification Box -->
                    <div class="card p-3 mb-3 border bg-light-subtle rounded-3">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark mb-1"><i class="bi bi-person-badge-fill text-success me-1"></i> Evaluator Authorized Role *</label>
                                <select class="form-select form-select-sm fw-semibold" id="evalRoleSelector" onchange="onModalRoleChange(this.value)">
                                    <option value="Manager" selected>👔 Reporting Manager</option>
                                    <option value="Team Leader">🎯 Team Leader (TL)</option>
                                    <option value="HR Admin">👑 HR Administrator</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark mb-1"><i class="bi bi-shield-lock-fill text-primary me-1"></i> Access Authorization Status</label>
                                <div class="form-control form-control-sm bg-white text-success fw-bold d-flex align-items-center gap-1">
                                    <i class="bi bi-check-circle-fill text-success"></i> Verified: Leadership Evaluator Permitted
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 1: Communication -->
                    <div class="card p-3 mb-3 border-light-subtle bg-light-subtle rounded-3">
                        <h6 class="fw-bold text-dark mb-1">1. Communication & Clarity</h6>
                        <div class="text-muted small mb-2">Communicates clearly, listens effectively, and keeps stakeholders aligned.</div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="interactive-stars d-flex gap-1" data-rating-target="eval_comm">
                                <i class="bi bi-star-fill star-btn active" data-val="1"></i>
                                <i class="bi bi-star-fill star-btn active" data-val="2"></i>
                                <i class="bi bi-star-fill star-btn active" data-val="3"></i>
                                <i class="bi bi-star-fill star-btn active" data-val="4"></i>
                                <i class="bi bi-star-fill star-btn" data-val="5"></i>
                            </div>
                            <span class="fw-bold text-dark font-display" id="eval_comm_val">4.0 / 5.0</span>
                        </div>
                    </div>

                    <!-- Section 2: Teamwork -->
                    <div class="card p-3 mb-3 border-light-subtle bg-light-subtle rounded-3">
                        <h6 class="fw-bold text-dark mb-1">2. Teamwork & Collaboration</h6>
                        <div class="text-muted small mb-2">Collaborates constructively with peers, offers support, and builds positive team dynamics.</div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="interactive-stars d-flex gap-1" data-rating-target="eval_team">
                                <i class="bi bi-star-fill star-btn active" data-val="1"></i>
                                <i class="bi bi-star-fill star-btn active" data-val="2"></i>
                                <i class="bi bi-star-fill star-btn active" data-val="3"></i>
                                <i class="bi bi-star-fill star-btn active" data-val="4"></i>
                                <i class="bi bi-star-fill star-btn active" data-val="5"></i>
                            </div>
                            <span class="fw-bold text-dark font-display" id="eval_team_val">5.0 / 5.0</span>
                        </div>
                    </div>

                    <!-- Section 3: Leadership -->
                    <div class="card p-3 mb-3 border-light-subtle bg-light-subtle rounded-3">
                        <h6 class="fw-bold text-dark mb-1">3. Leadership & Ownership</h6>
                        <div class="text-muted small mb-2">Takes initiative, drives accountability, and guides team members toward project goals.</div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="interactive-stars d-flex gap-1" data-rating-target="eval_lead">
                                <i class="bi bi-star-fill star-btn active" data-val="1"></i>
                                <i class="bi bi-star-fill star-btn active" data-val="2"></i>
                                <i class="bi bi-star-fill star-btn active" data-val="3"></i>
                                <i class="bi bi-star-fill star-btn" data-val="4"></i>
                                <i class="bi bi-star-fill star-btn" data-val="5"></i>
                            </div>
                            <span class="fw-bold text-dark font-display" id="eval_lead_val">3.0 / 5.0</span>
                        </div>
                    </div>

                    <!-- Qualitative Comments -->
                    <div class="mb-3">
                        <label class="form-label fw-bold text-success" style="font-size:12.5px;">What does this person do exceptionally well? *</label>
                        <textarea class="form-control" rows="3" placeholder="Highlight key strengths, technical expertise, and positive collaboration impact..." required>Strong technical architecture knowledge and excellent problem solving speed during sprint deadlines.</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-warning" style="font-size:12.5px;">What can this person improve? (Development Areas) *</label>
                        <textarea class="form-control" rows="3" placeholder="Constructive suggestions for growth and skill expansion..." required>Could delegate routine testing tasks to junior engineers and expand leadership communication during large team meetings.</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Save as Draft</button>
                <button type="button" class="btn btn-success" style="background:var(--primary, #087a24);" onclick="submitFeedbackEvaluation()">
                    <i class="bi bi-check2-circle me-1"></i> Submit Feedback
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4: Add Development Action Plan -->
<div class="modal fade" id="addActionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-bullseye text-success me-2"></i> Create Development Action Plan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Employee Owner *</label>
                        <select class="form-select select2">
                            <option selected>Arun Kumar (Senior Engineer)</option>
                            <option>Priya Sharma (Frontend Dev)</option>
                            <option>Daniel Martinez (Engineering Lead)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Linked 360° Development Area *</label>
                        <select class="form-select">
                            <option selected>Leadership & Communication</option>
                            <option>Automated Testing & Architecture</option>
                            <option>Project Management & Delegation</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Action Plan Title *</label>
                        <input type="text" class="form-control" value="Executive Leadership & Task Delegation Training" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Concrete Action Steps (One per line) *</label>
                        <textarea class="form-control" rows="3" required>1. Attend Executive Leadership & Public Speaking Workshop
2. Conduct monthly technical knowledge sharing sessions
3. Delegate sprint deployment testing tasks to junior engineers</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Target Completion Date *</label>
                        <input type="date" class="form-control" value="2026-12-31" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Linked Goal / OKR Context</label>
                        <input type="text" class="form-control" value="OKR-2026-Q1: Build High Impact Tech Leadership">
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" style="background:var(--primary, #087a24);" onclick="alert('Development Action Plan Created & Connected with OKRs!'); $('#addActionModal').modal('hide');">
                    <i class="bi bi-check-circle me-1"></i> Save Action Plan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 5: Detailed 360° Feedback Printable Report View -->
<div class="modal fade" id="viewReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            
            <!-- Modal Header -->
            <div class="modal-header text-white p-3 px-4 d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-bottom: 3px solid #087a24;">
                <div class="d-flex align-items-center gap-3">
                    <span class="badge bg-success-subtle text-success p-2 rounded-3 fs-5" style="background: rgba(16,185,129,0.15) !important;"><i class="bi bi-file-earmark-check-fill text-success"></i></span>
                    <div>
                        <h5 class="modal-title fw-bold text-white mb-0 font-display">360° Executive Performance Report</h5>
                        <div class="text-white-50 small" style="font-size:11.5px;">Confidential Multi-Rater Feedback Summary • FY25-26</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1.5 rounded-pill font-display" style="font-size:11.5px;">
                        <i class="bi bi-patch-check-fill me-1"></i> HR Verified
                    </span>
                    <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4" style="background: #ffffff;">
                
                <!-- Employee Profile & Overall Rating Box -->
                <div class="p-3.5 bg-light rounded-4 border mb-4" style="border-left: 4px solid #087a24 !important;">
                    <div class="row align-items-center g-3">
                        <div class="col-12 col-md-8">
                            <div class="d-flex align-items-center gap-3">
                                <img id="repEmpAvatar" src="./assets/img/profile-1.jpg" class="rounded-circle border border-2 border-success shadow-sm" style="width:64px; height:64px; object-fit:cover;" alt="Employee">
                                <div>
                                    <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                        <h4 class="fw-bold text-dark mb-0 font-display" id="repEmpName">Arun Kumar</h4>
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1" id="repEmpRole" style="font-size:11.5px;">Senior Software Engineer</span>
                                    </div>
                                    <div class="text-muted small" id="repEmpDept"><i class="bi bi-building me-1 text-success"></i> Engineering Department</div>
                                    <div class="text-secondary mt-1" style="font-size:11px;"><i class="bi bi-calendar3 me-1"></i> Period: FY25-26 • 5 Raters (Self, Mgr, 2 Peers, Direct Rep)</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-md-end">
                            <div class="p-2.5 bg-white rounded-3 border d-inline-block text-center shadow-sm" style="min-width:140px;">
                                <div class="text-muted small fw-bold text-uppercase" style="font-size:9.5px; letter-spacing:0.5px;">Overall Rating</div>
                                <div class="d-flex align-items-baseline justify-content-center gap-1">
                                    <span class="fs-2 fw-bold text-success font-display" id="repOverallScore">4.1</span>
                                    <span class="fs-6 text-muted">/ 5.0</span>
                                </div>
                                <div class="text-warning small mb-1" style="font-size:12px;">★★★★☆</div>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-0.5" style="font-size:10.5px;">Exceeds Expectations</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4 Multi-Rater Score Grid -->
                <div class="row g-2 mb-4">
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-white rounded-3 border text-center shadow-sm">
                            <div class="text-muted small fw-semibold mb-1" style="font-size:10.5px;">SELF RATING</div>
                            <div class="fs-4 fw-bold text-dark font-display" id="repSelfScore">4.5 <span class="fs-6 text-muted font-normal">/ 5.0</span></div>
                            <div class="text-muted mt-1" style="font-size:10px;">1 Assessment</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-white rounded-3 border text-center shadow-sm border-top border-2 border-success">
                            <div class="text-muted small fw-semibold mb-1" style="font-size:10.5px;">MANAGER RATING</div>
                            <div class="fs-4 fw-bold text-success font-display" id="repMgrScore">4.2 <span class="fs-6 text-muted font-normal">/ 5.0</span></div>
                            <div class="text-muted mt-1" style="font-size:10px;">By Reporting Manager</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-white rounded-3 border text-center shadow-sm border-top border-2 border-info">
                            <div class="text-muted small fw-semibold mb-1" style="font-size:10.5px;">PEERS AVERAGE</div>
                            <div class="fs-4 fw-bold text-info font-display" id="repPeerScore">4.0 <span class="fs-6 text-muted font-normal">/ 5.0</span></div>
                            <div class="text-muted mt-1" style="font-size:10px;">2 Peer Reviews</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="p-3 bg-white rounded-3 border text-center shadow-sm border-top border-2 border-warning">
                            <div class="text-muted small fw-semibold mb-1" style="font-size:10.5px;">DIRECT REPORTS</div>
                            <div class="fs-4 fw-bold text-warning font-display" id="repDirectScore">3.8 <span class="fs-6 text-muted font-normal">/ 5.0</span></div>
                            <div class="text-muted mt-1" style="font-size:10px;">1 Direct Report</div>
                        </div>
                    </div>
                </div>

                <!-- Competency Breakdown Table -->
                <div class="mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="fw-bold text-dark mb-0 font-display" style="font-size:13.5px;"><i class="bi bi-sliders text-success me-2"></i>Competency Score Matrix</h6>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;"><i class="bi bi-shield-lock me-1"></i> Anonymized Inputs</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0" style="font-size:12.5px;">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:40%;">Competency Area</th>
                                    <th class="text-center" style="width:15%;">Self</th>
                                    <th class="text-center" style="width:15%;">Manager</th>
                                    <th class="text-center" style="width:15%;">Peers (Avg)</th>
                                    <th class="text-center" style="width:15%;">Direct Rep</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-semibold text-dark">Communication & Technical Clarity</td>
                                    <td class="text-center fw-bold">4.5</td>
                                    <td class="text-center fw-bold text-success">4.5</td>
                                    <td class="text-center fw-bold text-primary">4.0</td>
                                    <td class="text-center fw-bold text-warning">3.8</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-dark">Teamwork & Collaboration</td>
                                    <td class="text-center fw-bold">4.0</td>
                                    <td class="text-center fw-bold text-success">4.5</td>
                                    <td class="text-center fw-bold text-primary">4.2</td>
                                    <td class="text-center fw-bold text-warning">4.1</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-dark">Leadership & Task Ownership</td>
                                    <td class="text-center fw-bold">4.3</td>
                                    <td class="text-center fw-bold text-success">4.0</td>
                                    <td class="text-center fw-bold text-primary">3.5</td>
                                    <td class="text-center fw-bold text-warning">3.4</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-dark">Technical Problem Solving</td>
                                    <td class="text-center fw-bold">4.4</td>
                                    <td class="text-center fw-bold text-success">4.8</td>
                                    <td class="text-center fw-bold text-primary">4.5</td>
                                    <td class="text-center fw-bold text-warning">4.4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Key Strengths & Growth Areas -->
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <div class="p-3 rounded-3 h-100" style="background:#ecfdf5; border-left: 4px solid #10b981;">
                            <h6 class="fw-bold text-success mb-2 font-display" style="font-size:13px;"><i class="bi bi-hand-thumbs-up-fill me-1.5"></i>Top Strengths</h6>
                            <p class="text-dark mb-0" style="font-size:12px;">Problem solving speed, technical codebase clarity, cross-functional collaboration.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="p-3 rounded-3 h-100" style="background:#fffbeb; border-left: 4px solid #f59e0b;">
                            <h6 class="fw-bold text-warning mb-2 font-display" style="font-size:13px;"><i class="bi bi-lightbulb-fill me-1.5"></i>Development Focus</h6>
                            <p class="text-dark mb-0" style="font-size:12px;">Leadership communication, task delegation to junior devs, expanding test documentation.</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-light p-3 d-flex justify-content-between align-items-center">
                <span class="text-muted small" style="font-size:11.5px;"><i class="bi bi-info-circle me-1"></i> Generated for Gharuda HRMS Record</span>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success btn-sm px-3" style="background:var(--primary, #087a24);" onclick="window.print()">
                        <i class="bi bi-printer me-1"></i> Print Report
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm px-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification Container -->
<div id="appToast" class="feedback-toast">
    <i class="bi bi-check-circle-fill text-success fs-5" id="toastIcon"></i>
    <span id="toastMsg">Action completed successfully</span>
</div>

<script src="./assets/js/tabel.js"></script>

<script src="./assets/js/pages/performance-feedback.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
