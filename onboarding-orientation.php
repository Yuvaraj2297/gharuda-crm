<?php include 'header.php'; ?>

 

<style>
    /* Workflow Stepper Bar */
    .journey-stepper-card {
        background: #ffffff;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 16px;
        padding: 20px 24px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        margin-bottom: 24px;
    }
    .journey-stepper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        overflow-x: auto;
        padding: 10px 4px 14px 4px;
        gap: 10px;
    }
    .journey-step-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 90px;
        position: relative;
        z-index: 1;
        cursor: pointer;
        transition: transform 0.2s ease;
    }
    .journey-step-item:hover {
        transform: translateY(-2px);
    }
    .journey-step-bubble {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        font-weight: 700;
        background: #f1f5f9;
        color: #64748b;
        border: 2px solid #cbd5e1;
        margin-bottom: 6px;
        transition: all 0.25s ease;
    }
    .journey-step-item.active .journey-step-bubble {
        background: var(--primary, #087a24);
        color: #ffffff;
        border-color: var(--primary, #087a24);
        box-shadow: 0 0 0 4px rgba(8, 122, 36, 0.15);
    }
    .journey-step-item.completed .journey-step-bubble {
        background: #e7f7eb;
        color: #087a24;
        border-color: #86efac;
    }
    .journey-step-title {
        font-size: 11px;
        font-weight: 700;
        color: #475569;
        line-height: 1.25;
        white-space: normal;
        max-width: 88px;
    }
    .journey-step-item.active .journey-step-title {
        color: var(--primary, #087a24);
    }
    .journey-connector {
        flex: 1;
        height: 2px;
        background: #e2e8f0;
        margin-top: -24px;
        min-width: 14px;
        position: relative;
    }
    .journey-connector.completed {
        background: #86efac;
    }

    /* Decision Fork Branch */
    .branch-fork-box {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border: 1px dashed #cbd5e1;
        border-radius: 12px;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .fork-badge-no {
        background: #fff4d9;
        color: #b56b00;
        border: 1px solid #fed7aa;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
    }
    .fork-badge-yes {
        background: #e7f7eb;
        color: #087a24;
        border: 1px solid #bbf7d0;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
    }

    /* KPI Metric Cards */
    .ori-kpi {
        min-height: 100px;
        padding: 18px;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 14px;
        background: var(--white, #ffffff);
        box-shadow: 0 4px 16px rgba(20, 30, 25, .04);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .ori-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(20, 30, 25, .08);
    }
    .ori-kpi .icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .ori-kpi .label {
        color: var(--ink-500, #64748b);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 3px;
    }
    .ori-kpi .value {
        color: var(--ink-900, #0f172a);
        font-size: 22px;
        font-weight: 800;
    }
    .ori-kpi .sub {
        color: var(--ink-500, #64748b);
        font-size: 11px;
        margin-top: 3px;
    }

    /* Segmented Navigation Tabs */
    .segmented-nav-wrap {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 4px;
        display: inline-flex;
        gap: 4px;
    }
    .segmented-tab-btn {
        border: none;
        background: transparent;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
        padding: 8px 18px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all .2s ease;
    }
    .segmented-tab-btn:hover {
        color: #1e293b;
        background: rgba(255, 255, 255, 0.7);
    }
    .segmented-tab-btn.active {
        background: #ffffff;
        color: var(--primary, #087a24);
        font-weight: 700;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }
    .segmented-tab-btn .badge-count {
        font-size: 11px;
        padding: 2px 8px;
        border-radius: 99px;
        background: #e2e8f0;
        color: #475569;
    }
    .segmented-tab-btn.active .badge-count {
        background: #e7f7eb;
        color: #087a24;
    }

    /* Filter Toolbar Card */
    .filter-toolbar-card {
        background: #ffffff;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 14px;
        padding: 16px 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
    }
    .form-label-filter {
        font-size: 11.5px;
        font-weight: 700;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin-bottom: 5px;
    }

    /* Badges for Workflow Steps */
    .wf-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 9px;
        border-radius: 99px;
        white-space: nowrap;
    }
    .wf-badge-scheduled { color: #0369a1; background: #e0f2fe; border: 1px solid #bae6fd; }
    .wf-badge-conducted { color: #854d0e; background: #fef9c3; border: 1px solid #fef08a; }
    .wf-badge-completed { color: #087a24; background: #e7f7eb; border: 1px solid #bbf7d0; }
    .wf-badge-pending { color: #b56b00; background: #fff4d9; border: 1px solid #fed7aa; }
    .wf-badge-notified { color: #4338ca; background: #e0e7ff; border: 1px solid #c7d2fe; }

    /* Progress bar */
    .progress-bar-thin {
        height: 6px;
        border-radius: 999px;
        background: #edf1ee;
        overflow: hidden;
        margin-top: 5px;
    }
    .progress-bar-thin span {
        display: block;
        height: 100%;
        border-radius: inherit;
        background: var(--primary, #087a24);
        transition: width 0.4s ease;
    }

    /* Certificate Modal Preview */
    .clearance-cert-frame {
        border: 2px dashed #087a24;
        background: #fbfdfb;
        border-radius: 16px;
        padding: 24px;
        position: relative;
    }
    .cert-seal {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: #e7f7eb;
        border: 2px solid #087a24;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #087a24;
        font-size: 28px;
    }

    /* Send Invite Link Modal & Components Styling */
    .invite-channel-card {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #ffffff;
        padding: 14px 16px;
        transition: all 0.2s ease;
    }
    .invite-channel-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
    }
    .invite-link-box {
        background: #f8fafc;
        border: 1.5px dashed #cbd5e1;
        border-radius: 12px;
        padding: 10px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .invite-link-input {
        font-family: 'Consolas', 'Courier New', monospace;
        font-size: 12.5px;
        color: #0f172a;
        background: transparent;
        border: none;
        width: 100%;
        outline: none;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .invite-preview-card {
        background: linear-gradient(145deg, #093817 0%, #0d4a20 100%);
        border-radius: 16px;
        padding: 20px;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(8, 122, 36, 0.2);
    }
    .invite-preview-inner {
        background: #ffffff;
        border-radius: 12px;
        padding: 18px;
        color: #1e293b;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    }
    .invite-badge-live {
        background: rgba(16, 185, 129, 0.15);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.3);
        font-size: 11px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 99px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .invite-pulse-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #10b981;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        animation: pulse-dot 1.8s infinite;
    }
    @keyframes pulse-dot {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }
    .toast-copy-feedback {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 99999;
        background: #0f172a;
        color: #ffffff;
        padding: 12px 20px;
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.25);
        display: none;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        font-weight: 600;
        animation: fadeInSlide .3s ease;
    }
    @keyframes fadeInSlide {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Induction & Orientation Management</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-person-check fs-6 text-success"></i>
            <span>Onboarding</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Induction Lifecycle Workflow</span>
        </nav>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <button type="button" class="btn btn-outline-secondary" onclick="window.print();">
            <i class="bi bi-printer me-1"></i> Print Report
        </button>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#workflowHelpModal">
            <i class="bi bi-diagram-3 me-1"></i> View Workflow Guide
        </button>
        <button type="button" class="btn btn-outline-primary" id="btnTopSendInvite">
            <i class="bi bi-send-check me-1"></i> Send Invite Link
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleInductionModal" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-plus-circle me-1"></i> New Induction / Schedule Session
        </button>
    </div>
</div>

<!-- Lifecycle Workflow Pipeline Banner -->
<div class="journey-stepper-card">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
        <div class="d-flex align-items-center gap-2">
            <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width:28px;height:28px;background:var(--primary, #087a24);font-size:13px;">
                <i class="bi bi-arrow-repeat"></i>
            </div>
            <span class="fw-bold text-dark" style="font-size:14px;">11-Stage Induction & Orientation Lifecycle Workflow</span>
        </div>
        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">
            <i class="bi bi-check2-circle me-1"></i> HRMS Automated Pipeline
        </span>
    </div>

    <!-- Stepper 10 Linear Steps + Step 11 Decision Fork -->
    <div class="journey-stepper">
        <!-- 1 -->
        <div class="journey-step-item completed" title="Step 1: Employee Selected for Induction">
            <div class="journey-step-bubble"><i class="bi bi-person-check"></i></div>
            <div class="journey-step-title">1. Employee Selected</div>
        </div>
        <div class="journey-connector completed"></div>

        <!-- 2 -->
        <div class="journey-step-item completed" title="Step 2: Induction Program Assigned">
            <div class="journey-step-bubble"><i class="bi bi-journal-check"></i></div>
            <div class="journey-step-title">2. Program Assigned</div>
        </div>
        <div class="journey-connector completed"></div>

        <!-- 3 -->
        <div class="journey-step-item completed" title="Step 3: Sessions Scheduled with Trainer">
            <div class="journey-step-bubble"><i class="bi bi-calendar-event"></i></div>
            <div class="journey-step-title">3. Sessions Scheduled</div>
        </div>
        <div class="journey-connector completed"></div>

        <!-- 4 -->
        <div class="journey-step-item completed" title="Step 4: Employee Notified via WhatsApp/Email">
            <div class="journey-step-bubble"><i class="bi bi-bell"></i></div>
            <div class="journey-step-title">4. Employee Notified</div>
        </div>
        <div class="journey-connector completed"></div>

        <!-- 5 -->
        <div class="journey-step-item completed" title="Step 5: Session Conducted">
            <div class="journey-step-bubble"><i class="bi bi-easel"></i></div>
            <div class="journey-step-title">5. Session Conducted</div>
        </div>
        <div class="journey-connector completed"></div>

        <!-- 6 -->
        <div class="journey-step-item active" title="Step 6: Attendance Captured">
            <div class="journey-step-bubble"><i class="bi bi-clipboard-check"></i></div>
            <div class="journey-step-title">6. Attendance Captured</div>
        </div>
        <div class="journey-connector"></div>

        <!-- 7 -->
        <div class="journey-step-item" title="Step 7: Materials / Policies Shared">
            <div class="journey-step-bubble"><i class="bi bi-file-earmark-text"></i></div>
            <div class="journey-step-title">7. Materials Shared</div>
        </div>
        <div class="journey-connector"></div>

        <!-- 8 -->
        <div class="journey-step-item" title="Step 8: Acknowledgement / Assessment">
            <div class="journey-step-bubble"><i class="bi bi-patch-question"></i></div>
            <div class="journey-step-title">8. Assessment / Ack</div>
        </div>
        <div class="journey-connector"></div>

        <!-- 9 -->
        <div class="journey-step-item" title="Step 9: Feedback Captured">
            <div class="journey-step-bubble"><i class="bi bi-star"></i></div>
            <div class="journey-step-title">9. Feedback Received</div>
        </div>
        <div class="journey-connector"></div>

        <!-- 10 -->
        <div class="journey-step-item" title="Step 10: Session Completed">
            <div class="journey-step-bubble"><i class="bi bi-check-circle"></i></div>
            <div class="journey-step-title">10. Session Completed</div>
        </div>
    </div>

    <!-- Step 11 Branching Decision Evaluation Banner -->
    <div class="branch-fork-box mt-3">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-signpost-split fs-5 text-primary"></i>
            <div>
                <strong class="text-dark" style="font-size:12.5px;">Step 11: All Mandatory Sessions Completed Check:</strong>
                <div class="text-muted" style="font-size:11px;">Evaluates whether the joiner completed all required modules (General, IT Security, Dept & Compliance).</div>
            </div>
        </div>
        <div class="ms-auto d-flex align-items-center gap-2 flex-wrap">
            <div class="fork-badge-no">
                <i class="bi bi-x-circle me-1"></i> No &rarr; <strong>Pending Sessions</strong> (Requires Follow-up)
            </div>
            <div class="fork-badge-yes">
                <i class="bi bi-check-circle-fill me-1"></i> Yes &rarr; <strong>Fully Certified</strong> (HR Induction Clearance)
            </div>
        </div>
    </div>
</div>

<!-- KPI Metric Cards -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="ori-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e0f2fe;color:#0369a1;"><i class="bi bi-people-fill"></i></div>
            <div>
                <div class="label">Total Joiners in Induction</div>
                <div class="value" id="kpiTotalJoiners">18 Joiners</div>
                <div class="sub">Across Engineering, Design & Sales</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ori-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fef3c7;color:#b45309;"><i class="bi bi-calendar-range"></i></div>
            <div>
                <div class="label">Scheduled / In Progress</div>
                <div class="value" id="kpiScheduledCount">7 Sessions</div>
                <div class="sub">Upcoming sessions notified</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ori-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff4d9;color:#b56b00;border:1px solid #fed7aa;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="label">Pending Mandatory Sessions</div>
                <div class="value text-warning-emphasis" id="kpiPendingBranch">6 Employees</div>
                <div class="sub"><strong class="text-warning-emphasis">Branch: No</strong> &bull; Need completion</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ori-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e7f7eb;color:#087a24;border:1px solid #bbf7d0;"><i class="bi bi-patch-check-fill"></i></div>
            <div>
                <div class="label">Induction Fully Certified</div>
                <div class="value text-success" id="kpiCertifiedBranch">12 Employees</div>
                <div class="sub"><strong class="text-success">Branch: Yes</strong> &bull; 100% Cleared</div>
            </div>
        </div>
    </div>
</div>

<!-- Dual Segmented Navigation Tabs (Sessions vs Employee Clearance Tracker) -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
    <div class="segmented-nav-wrap">
        <button type="button" class="segmented-tab-btn active" id="tabBtnSessions">
            <i class="bi bi-list-task"></i> Sessions Master Ledger
            <span class="badge-count" id="countBadgeSessions">8</span>
        </button>
        <button type="button" class="segmented-tab-btn" id="tabBtnClearance">
            <i class="bi bi-shield-check"></i> Employee Induction Clearance (Step 11 Decision)
            <span class="badge-count" id="countBadgeClearance">4</span>
        </button>
    </div>

    <div class="d-flex align-items-center gap-2">
        <span class="text-muted" style="font-size:12.5px;">
            <i class="bi bi-info-circle me-1 text-primary"></i> Real-time status sync with WhatsApp & Email Notification Dispatch
        </span>
    </div>
</div>

<!-- ========================================================================= -->
<!-- VIEW 1: SESSIONS MASTER LEDGER -->
<!-- ========================================================================= -->
<div id="viewSessionsMaster">
    <!-- Advanced Filter Toolbar -->
    <div class="filter-toolbar-card mb-3">
        <div class="row g-3 align-items-end">
            <div class="col-md-3 col-sm-6">
                <label class="form-label form-label-filter"><i class="bi bi-funnel me-1"></i> Workflow Stage Filter</label>
                <select class="form-select form-select-sm" id="filterWorkflowStage">
                    <option value="all" selected>All Stages</option>
                    <option value="Scheduled">3. Scheduled (Upcoming)</option>
                    <option value="Notified">4. Notified (Email/WhatsApp)</option>
                    <option value="Conducted">5 & 6. Conducted & Attendance</option>
                    <option value="Completed">10. Completed & Cleared</option>
                </select>
            </div>

            <div class="col-md-3 col-sm-6">
                <label class="form-label form-label-filter"><i class="bi bi-journal-bookmark me-1"></i> Induction Module</label>
                <select class="form-select form-select-sm" id="filterModuleCategory">
                    <option value="all" selected>All Programs</option>
                    <option value="General Company Induction">General Company Induction</option>
                    <option value="Department & Role Orientation">Department & Role Orientation</option>
                    <option value="IT & Data Security Setup">IT & Data Security Setup</option>
                    <option value="HR Policies & Code of Conduct">HR Policies & Code of Conduct</option>
                </select>
            </div>

            <div class="col-md-2 col-sm-6">
                <label class="form-label form-label-filter"><i class="bi bi-clipboard-check me-1"></i> Attendance</label>
                <select class="form-select form-select-sm" id="filterAttendance">
                    <option value="all" selected>All Attendance</option>
                    <option value="Present">Present</option>
                    <option value="Pending">Pending</option>
                    <option value="Absent">Absent / Reschedule</option>
                </select>
            </div>

            <div class="col-md-2 col-sm-6">
                <label class="form-label form-label-filter"><i class="bi bi-building me-1"></i> Department</label>
                <select class="form-select form-select-sm" id="filterDepartment">
                    <option value="all" selected>All Departments</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Design">Design</option>
                    <option value="Finance">Finance</option>
                    <option value="Marketing">Marketing</option>
                    <option value="HR">HR</option>
                    <option value="Operations">Operations</option>
                </select>
            </div>

            <div class="col-md-2 col-sm-12 text-md-end">
                <button type="button" class="btn btn-sm btn-outline-secondary w-100" id="btnResetSessionFilters">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filters
                </button>
            </div>
        </div>
    </div>

    <!-- Sessions Table Card -->
    <div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="induction-sessions-report">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
                <button type="button" class="btn export-btn-pdf" id="btnExportSessionsXls"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
                <span id="activeFilterBadge" class="badge bg-light text-dark border px-2 py-1">Showing: <strong>All Sessions</strong></span>
            </div>

            <div class="mt-search-wrap">
                <i class="bi bi-search mt-search-icon"></i>
                <input type="text" class="mt-search-input" placeholder="Search employee, session, trainer..." id="employeeSearch">
            </div>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0" id="orientationTable">
                <thead>
                    <tr>
                        <th class="text-nowrap">S.No</th>
                        <th class="text-nowrap">1. Employee Selected</th>
                        <th class="text-nowrap">2. Program Assigned</th>
                        <th class="text-nowrap">3. Schedule & Mode</th>
                        <th class="text-nowrap">4. Notified</th>
                        <th class="text-nowrap">5 & 6. Conduct & Attendance</th>
                        <th class="text-nowrap">7. Materials</th>
                        <th class="text-nowrap">8 & 9. Assessment & Feedback</th>
                        <th class="text-nowrap">10. Status</th>
                        <th class="text-nowrap text-end">Action</th>
                    </tr>
                </thead>
                <tbody id="pgBody">

                    <!-- Row 1: Scheduled & Notified -->
                    <tr class="ori-row"
                        data-ref="SES-2026-101"
                        data-empid="EMP-2026-041"
                        data-emp="Kavitha Raman"
                        data-email="kavitha.raman@gharudahr.com"
                        data-phone="+91 98401 23456"
                        data-role="UI/UX Designer"
                        data-dept="Design"
                        data-program="Department & Role Orientation"
                        data-title="Design System & UX Framework Walkthrough"
                        data-trainer="Amelia Curr (Design Lead)"
                        data-mode="In-person"
                        data-venue="Design Studio 2"
                        data-date="2026-09-18"
                        data-time="11:30 AM - 12:30 PM"
                        data-notified="Yes"
                        data-conducted="No"
                        data-attendance="Pending"
                        data-materials="Design_System_v2.pdf, Figma_Handbook.pdf"
                        data-assessment="Pending"
                        data-rating="Unrated"
                        data-feedback=""
                        data-status="Scheduled"
                        data-mandatory="Yes"
                    >
                        <td class="sno-value">1</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Kavitha">
                                <div>
                                    <div class="fw-bold text-dark">Kavitha Raman</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-041 • Design</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">Design System Walkthrough</div>
                            <div class="text-muted" style="font-size:11px;"><span class="badge bg-primary-subtle text-primary border me-1">Mandatory</span>Dept Orientation</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark text-nowrap" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>18-Sep-2026</div>
                            <div class="text-muted" style="font-size:11px;">11:30 AM • Design Studio 2</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-notified"><i class="bi bi-whatsapp"></i> WhatsApp & Email</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-scheduled"><i class="bi bi-clock"></i> Upcoming</span>
                            <div class="text-muted" style="font-size:11px;">Attendance: Pending</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><i class="bi bi-file-earmark-pdf text-danger me-1"></i>2 Files</span>
                        </td>
                        <td>
                            <span class="text-muted" style="font-size:11px;">Pending Conduct</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-scheduled">Scheduled</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-invite-row" title="Send Invitation Link & Access"><i class="bi bi-send-fill"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-execute-session" title="Execute & Update Workflow"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-view-session" title="View Full Details"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>

                    <!-- Row 2: Conducted, Attendance Captured, Assessment Passed -->
                    <tr class="ori-row"
                        data-ref="SES-2026-102"
                        data-empid="EMP-2026-041"
                        data-emp="Kavitha Raman"
                        data-email="kavitha.raman@gharudahr.com"
                        data-phone="+91 98401 23456"
                        data-role="UI/UX Designer"
                        data-dept="Design"
                        data-program="General Company Induction"
                        data-title="Vision, Culture, Founders & Org Chart"
                        data-trainer="Priya Sharma (HR Manager)"
                        data-mode="In-person"
                        data-venue="Auditorium - Level 3"
                        data-date="2026-09-12"
                        data-time="10:00 AM - 12:00 PM"
                        data-notified="Yes"
                        data-conducted="Yes"
                        data-attendance="Present"
                        data-materials="Employee_Handbook_2026.pdf, Culture_Code.pdf"
                        data-assessment="Passed (96%)"
                        data-rating="5.0"
                        data-feedback="Great interactive session, very clear company vision!"
                        data-status="Completed"
                        data-mandatory="Yes"
                    >
                        <td class="sno-value">2</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Kavitha">
                                <div>
                                    <div class="fw-bold text-dark">Kavitha Raman</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-041 • Design</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">Vision, Culture & Org Chart</div>
                            <div class="text-muted" style="font-size:11px;"><span class="badge bg-primary-subtle text-primary border me-1">Mandatory</span>General Induction</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark text-nowrap" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>12-Sep-2026</div>
                            <div class="text-muted" style="font-size:11px;">10:00 AM • Auditorium</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-notified"><i class="bi bi-check2"></i> Notified</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed"><i class="bi bi-check2-circle"></i> Conducted</span>
                            <div class="text-success fw-semibold" style="font-size:11px;"><i class="bi bi-check me-1"></i>Present</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><i class="bi bi-folder-check text-success me-1"></i>2 Policies</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-success" style="font-size:11.5px;"><i class="bi bi-patch-check me-1"></i>Passed (96%)</div>
                            <div class="text-warning" style="font-size:11px;">⭐⭐⭐⭐⭐ (5.0)</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed">Completed</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-invite-row" title="Send Invitation Link & Access"><i class="bi bi-send-fill"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-execute-session" title="Update Workflow"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-view-session" title="View Full Details"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>

                    <!-- Row 3: IT Security - Conducted, Assessment Passed -->
                    <tr class="ori-row"
                        data-ref="SES-2026-103"
                        data-empid="EMP-2026-042"
                        data-emp="Rajesh Kannan"
                        data-email="rajesh.k@gharudahr.com"
                        data-phone="+91 98842 67890"
                        data-role="Senior Fullstack Engineer"
                        data-dept="Engineering"
                        data-program="IT & Data Security Setup"
                        data-title="Data Privacy, VPN, MFA & Security Protocol"
                        data-trainer="Karthik V (InfoSec Lead)"
                        data-mode="Online"
                        data-venue="Google Meet (meet.google.com/xyz-sec)"
                        data-date="2026-09-14"
                        data-time="02:30 PM - 04:00 PM"
                        data-notified="Yes"
                        data-conducted="Yes"
                        data-attendance="Present"
                        data-materials="InfoSec_Policy_v4.pdf, VPN_Setup_Guide.pdf"
                        data-assessment="Passed (100%)"
                        data-rating="4.8"
                        data-feedback="Setup completed smoothly. Hardware keys enrolled."
                        data-status="Completed"
                        data-mandatory="Yes"
                    >
                        <td class="sno-value">3</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Rajesh">
                                <div>
                                    <div class="fw-bold text-dark">Rajesh Kannan</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-042 • Engineering</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">Data Privacy, VPN & MFA</div>
                            <div class="text-muted" style="font-size:11px;"><span class="badge bg-primary-subtle text-primary border me-1">Mandatory</span>IT & Security</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark text-nowrap" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>14-Sep-2026</div>
                            <div class="text-muted" style="font-size:11px;">02:30 PM • Google Meet</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-notified"><i class="bi bi-check2"></i> Notified</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed"><i class="bi bi-check2-circle"></i> Conducted</span>
                            <div class="text-success fw-semibold" style="font-size:11px;"><i class="bi bi-check me-1"></i>Present</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><i class="bi bi-shield-lock text-primary me-1"></i>Security Pack</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-success" style="font-size:11.5px;"><i class="bi bi-patch-check me-1"></i>Passed (100%)</div>
                            <div class="text-warning" style="font-size:11px;">⭐⭐⭐⭐⭐ (4.8)</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed">Completed</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-invite-row" title="Send Invitation Link & Access"><i class="bi bi-send-fill"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-execute-session" title="Update Workflow"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-view-session" title="View Full Details"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>

                    <!-- Row 4: HR Policies - In Progress / Conducted today -->
                    <tr class="ori-row"
                        data-ref="SES-2026-104"
                        data-empid="EMP-2026-043"
                        data-emp="Ananya Sen"
                        data-email="ananya.sen@gharudahr.com"
                        data-phone="+91 97908 11223"
                        data-role="Financial Analyst"
                        data-dept="Finance"
                        data-program="HR Policies & Code of Conduct"
                        data-title="Leave Policy, POSH, Code of Ethics & Appraisal"
                        data-trainer="Priya Sharma (HR Manager)"
                        data-mode="In-person"
                        data-venue="Conference Room A"
                        data-date="2026-09-16"
                        data-time="03:00 PM - 04:30 PM"
                        data-notified="Yes"
                        data-conducted="Yes"
                        data-attendance="Present"
                        data-materials="HR_Policy_Manual.pdf, POSH_Policy.pdf"
                        data-assessment="Pending Sign-off"
                        data-rating="Unrated"
                        data-feedback=""
                        data-status="Conducted"
                        data-mandatory="Yes"
                    >
                        <td class="sno-value">4</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Ananya">
                                <div>
                                    <div class="fw-bold text-dark">Ananya Sen</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-043 • Finance</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">POSH, Leaves & Ethics Code</div>
                            <div class="text-muted" style="font-size:11px;"><span class="badge bg-primary-subtle text-primary border me-1">Mandatory</span>HR Policies</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark text-nowrap" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>16-Sep-2026</div>
                            <div class="text-muted" style="font-size:11px;">03:00 PM • Conf Room A</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-notified"><i class="bi bi-whatsapp"></i> WhatsApp</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-conducted"><i class="bi bi-easel"></i> Conducted</span>
                            <div class="text-success fw-semibold" style="font-size:11px;"><i class="bi bi-check me-1"></i>Present</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><i class="bi bi-file-earmark-check text-success me-1"></i>2 Policies</span>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning-emphasis border">Pending Ack / Quiz</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-pending">Ack Pending</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-invite-row" title="Send Invitation Link & Access"><i class="bi bi-send-fill"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-execute-session" title="Capture Assessment & Feedback"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-view-session" title="View Full Details"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>

                    <!-- Row 5: Scheduled session with Absent / Reschedule -->
                    <tr class="ori-row"
                        data-ref="SES-2026-105"
                        data-empid="EMP-2026-044"
                        data-emp="Mohammed Farhan"
                        data-email="m.farhan@gharudahr.com"
                        data-phone="+91 99403 55678"
                        data-role="Digital Marketing Lead"
                        data-dept="Marketing"
                        data-program="Department & Role Orientation"
                        data-title="Campaigns, SEO Stack & Agency Handoff"
                        data-trainer="Sneha Roy (VP Marketing)"
                        data-mode="Hybrid"
                        data-venue="Room 4 & Zoom"
                        data-date="2026-09-15"
                        data-time="11:00 AM - 12:30 PM"
                        data-notified="Yes"
                        data-conducted="Yes"
                        data-attendance="Absent"
                        data-materials="Marketing_Playbook.pdf"
                        data-assessment="Pending"
                        data-rating="Unrated"
                        data-feedback="Employee was unwell; session to be rescheduled."
                        data-status="Scheduled"
                        data-mandatory="Yes"
                    >
                        <td class="sno-value">5</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-4.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Farhan">
                                <div>
                                    <div class="fw-bold text-dark">Mohammed Farhan</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-044 • Marketing</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">Campaigns & SEO Stack</div>
                            <div class="text-muted" style="font-size:11px;"><span class="badge bg-primary-subtle text-primary border me-1">Mandatory</span>Dept Orientation</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark text-nowrap" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>15-Sep-2026</div>
                            <div class="text-muted" style="font-size:11px;">11:00 AM • Room 4</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-notified"><i class="bi bi-envelope"></i> Email</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-conducted"><i class="bi bi-exclamation-triangle"></i> Conducted</span>
                            <div class="text-danger fw-semibold" style="font-size:11px;"><i class="bi bi-x me-1"></i>Absent / Re-sched</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><i class="bi bi-file-earmark-pdf text-danger me-1"></i>Playbook</span>
                        </td>
                        <td>
                            <span class="text-muted" style="font-size:11px;">Pending Re-run</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-pending">Reschedule Req</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-invite-row" title="Send Invitation Link & Access"><i class="bi bi-send-fill"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-execute-session" title="Reschedule & Update"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-view-session" title="View Full Details"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>

                    <!-- Row 6: Rajesh Kannan - General Induction (Completed) -->
                    <tr class="ori-row"
                        data-ref="SES-2026-106"
                        data-empid="EMP-2026-042"
                        data-emp="Rajesh Kannan"
                        data-email="rajesh.k@gharudahr.com"
                        data-phone="+91 98842 67890"
                        data-role="Senior Fullstack Engineer"
                        data-dept="Engineering"
                        data-program="General Company Induction"
                        data-title="Vision, Culture, Founders & Org Chart"
                        data-trainer="Priya Sharma (HR Manager)"
                        data-mode="In-person"
                        data-venue="Auditorium - Level 3"
                        data-date="2026-09-12"
                        data-time="10:00 AM - 12:00 PM"
                        data-notified="Yes"
                        data-conducted="Yes"
                        data-attendance="Present"
                        data-materials="Employee_Handbook_2026.pdf"
                        data-assessment="Passed (98%)"
                        data-rating="5.0"
                        data-feedback="Inspiring introductory session."
                        data-status="Completed"
                        data-mandatory="Yes"
                    >
                        <td class="sno-value">6</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Rajesh">
                                <div>
                                    <div class="fw-bold text-dark">Rajesh Kannan</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-042 • Engineering</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">Vision, Culture & Org Chart</div>
                            <div class="text-muted" style="font-size:11px;"><span class="badge bg-primary-subtle text-primary border me-1">Mandatory</span>General Induction</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark text-nowrap" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>12-Sep-2026</div>
                            <div class="text-muted" style="font-size:11px;">10:00 AM • Auditorium</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-notified"><i class="bi bi-check2"></i> Notified</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed"><i class="bi bi-check2-circle"></i> Conducted</span>
                            <div class="text-success fw-semibold" style="font-size:11px;"><i class="bi bi-check me-1"></i>Present</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><i class="bi bi-file-earmark-pdf text-danger me-1"></i>Handbook</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-success" style="font-size:11.5px;"><i class="bi bi-patch-check me-1"></i>Passed (98%)</div>
                            <div class="text-warning" style="font-size:11px;">⭐⭐⭐⭐⭐ (5.0)</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed">Completed</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-invite-row" title="Send Invitation Link & Access"><i class="bi bi-send-fill"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-execute-session" title="Update Workflow"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-view-session" title="View Full Details"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>

                    <!-- Row 7: Rajesh Kannan - Dept Orientation (Completed) -->
                    <tr class="ori-row"
                        data-ref="SES-2026-107"
                        data-empid="EMP-2026-042"
                        data-emp="Rajesh Kannan"
                        data-email="rajesh.k@gharudahr.com"
                        data-phone="+91 98842 67890"
                        data-role="Senior Fullstack Engineer"
                        data-dept="Engineering"
                        data-program="Department & Role Orientation"
                        data-title="Code Architecture, CI/CD Pipeline & GitHub Repos"
                        data-trainer="Sundar Pichai V (Tech Director)"
                        data-mode="In-person"
                        data-venue="Tech Lab 1"
                        data-date="2026-09-13"
                        data-time="03:00 PM - 05:00 PM"
                        data-notified="Yes"
                        data-conducted="Yes"
                        data-attendance="Present"
                        data-materials="Architecture_Blueprint.pdf, GitFlow_Cheatsheet.pdf"
                        data-assessment="Passed (95%)"
                        data-rating="5.0"
                        data-feedback="Clear onboarding repo and local dev container instructions."
                        data-status="Completed"
                        data-mandatory="Yes"
                    >
                        <td class="sno-value">7</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Rajesh">
                                <div>
                                    <div class="fw-bold text-dark">Rajesh Kannan</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-042 • Engineering</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">Code Architecture & CI/CD</div>
                            <div class="text-muted" style="font-size:11px;"><span class="badge bg-primary-subtle text-primary border me-1">Mandatory</span>Dept Orientation</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark text-nowrap" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>13-Sep-2026</div>
                            <div class="text-muted" style="font-size:11px;">03:00 PM • Tech Lab 1</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-notified"><i class="bi bi-check2"></i> Notified</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed"><i class="bi bi-check2-circle"></i> Conducted</span>
                            <div class="text-success fw-semibold" style="font-size:11px;"><i class="bi bi-check me-1"></i>Present</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><i class="bi bi-file-earmark-code text-primary me-1"></i>2 Tech Guides</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-success" style="font-size:11.5px;"><i class="bi bi-patch-check me-1"></i>Passed (95%)</div>
                            <div class="text-warning" style="font-size:11px;">⭐⭐⭐⭐⭐ (5.0)</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed">Completed</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-invite-row" title="Send Invitation Link & Access"><i class="bi bi-send-fill"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-execute-session" title="Update Workflow"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-view-session" title="View Full Details"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>

                    <!-- Row 8: Rajesh Kannan - HR Policies (Completed) -->
                    <tr class="ori-row"
                        data-ref="SES-2026-108"
                        data-empid="EMP-2026-042"
                        data-emp="Rajesh Kannan"
                        data-email="rajesh.k@gharudahr.com"
                        data-phone="+91 98842 67890"
                        data-role="Senior Fullstack Engineer"
                        data-dept="Engineering"
                        data-program="HR Policies & Code of Conduct"
                        data-title="Leave Policy, POSH, Code of Ethics & Appraisal"
                        data-trainer="Priya Sharma (HR Manager)"
                        data-mode="In-person"
                        data-venue="Conference Room A"
                        data-date="2026-09-14"
                        data-time="11:00 AM - 12:30 PM"
                        data-notified="Yes"
                        data-conducted="Yes"
                        data-attendance="Present"
                        data-materials="HR_Policy_Manual.pdf, POSH_Policy.pdf"
                        data-assessment="Passed (94%)"
                        data-rating="4.8"
                        data-feedback="All statutory policies understood and acknowledged."
                        data-status="Completed"
                        data-mandatory="Yes"
                    >
                        <td class="sno-value">8</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Rajesh">
                                <div>
                                    <div class="fw-bold text-dark">Rajesh Kannan</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-042 • Engineering</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">POSH, Leaves & Ethics Code</div>
                            <div class="text-muted" style="font-size:11px;"><span class="badge bg-primary-subtle text-primary border me-1">Mandatory</span>HR Policies</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark text-nowrap" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>14-Sep-2026</div>
                            <div class="text-muted" style="font-size:11px;">11:00 AM • Conf Room A</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-notified"><i class="bi bi-check2"></i> Notified</span>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed"><i class="bi bi-check2-circle"></i> Conducted</span>
                            <div class="text-success fw-semibold" style="font-size:11px;"><i class="bi bi-check me-1"></i>Present</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border"><i class="bi bi-file-earmark-check text-success me-1"></i>2 Policies</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-success" style="font-size:11.5px;"><i class="bi bi-patch-check me-1"></i>Passed (94%)</div>
                            <div class="text-warning" style="font-size:11px;">⭐⭐⭐⭐⭐ (4.8)</div>
                        </td>
                        <td>
                            <span class="wf-badge wf-badge-completed">Completed</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-invite-row" title="Send Invitation Link & Access"><i class="bi bi-send-fill"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-execute-session" title="Update Workflow"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-view-session" title="View Full Details"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Table Footer with Show Entries & Pagination -->
        <div class="d-flex justify-content-between align-items-center report-footer p-3">
            <div class="d-flex gap-2 align-items-center">
                <span class="small text-muted text-nowrap">Show:</span>
                <select class="form-select form-select-sm gh-w-auto" id="showEntries">
                    <option selected>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">8</strong> of <strong id="pgTotal">8</strong></span>
            </div>
            <nav>
                <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
            </nav>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- VIEW 2: EMPLOYEE INDUCTION CLEARANCE (STEP 11 DECISION EVALUATOR) -->
<!-- ========================================================================= -->
<div id="viewClearanceTracker" style="display:none;">
    <div class="filter-toolbar-card mb-3">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <label class="form-label form-label-filter"><i class="bi bi-shield-check me-1"></i> Step 11 Mandatory Status Filter</label>
                <select class="form-select form-select-sm" id="filterClearanceStatus">
                    <option value="all" selected>All Employees</option>
                    <option value="no">❌ Branch: No (Pending Mandatory Sessions)</option>
                    <option value="yes">✅ Branch: Yes (Induction Fully Certified)</option>
                </select>
            </div>
            <div class="col-md-5">
                <div class="text-muted" style="font-size:12px;">
                    <i class="bi bi-lightbulb text-warning me-1"></i>
                    <strong>Automated Step 11 Rule:</strong> Employees must clear all 4 Mandatory Induction modules (General Induction, IT Security, Dept Orientation, HR Policies) to receive their Induction Clearance Certificate.
                </div>
            </div>
            <div class="col-md-3 text-md-end">
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#scheduleInductionModal" style="background:var(--primary, #087a24);">
                    <i class="bi bi-calendar-plus me-1"></i> Schedule Missing Session
                </button>
            </div>
        </div>
    </div>

    <!-- Clearance Table -->
    <div class="card-custom p-0 overflow-hidden">
        <div class="table-responsive table-modern-wrap overflow-auto">
            <table class="table-modern w-100 mb-0">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Department & Role</th>
                        <th>Mandatory Modules Cleared</th>
                        <th>Progress</th>
                        <th>All Mandatory Completed?</th>
                        <th>Certificate / Clearance</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody id="clearanceTableBody">

                    <!-- Employee 1: Rajesh Kannan - 4/4 Completed -> Branch YES -->
                    <tr data-clearance-branch="yes" data-emp="Rajesh Kannan" data-empid="EMP-2026-042" data-dept="Engineering" data-role="Senior Fullstack Engineer">
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:36px;height:36px;border-radius:50%;" alt="Rajesh">
                                <div>
                                    <div class="fw-bold text-dark">Rajesh Kannan</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-042 • Joined 10-Sep-2026</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Engineering</div>
                            <div class="text-muted" style="font-size:11px;">Senior Fullstack Engineer</div>
                        </td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                <span class="badge bg-success-subtle text-success border"><i class="bi bi-check me-1"></i>General</span>
                                <span class="badge bg-success-subtle text-success border"><i class="bi bi-check me-1"></i>IT Security</span>
                                <span class="badge bg-success-subtle text-success border"><i class="bi bi-check me-1"></i>Dept Code</span>
                                <span class="badge bg-success-subtle text-success border"><i class="bi bi-check me-1"></i>HR Policies</span>
                            </div>
                        </td>
                        <td style="min-width:130px;">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="fw-bold text-success" style="font-size:12px;">4 of 4 Done</span>
                                <span class="fw-bold text-success" style="font-size:12px;">100%</span>
                            </div>
                            <div class="progress-bar-thin">
                                <span style="width:100%; background:#10b981;"></span>
                            </div>
                        </td>
                        <td>
                            <span class="fork-badge-yes"><i class="bi bi-check-circle-fill me-1"></i> Yes (All Done)</span>
                        </td>
                        <td>
                            <span class="badge bg-success text-white px-2 py-1"><i class="bi bi-patch-check-fill me-1"></i>Certified Cleared</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-success btn-view-certificate" 
                                    data-emp="Rajesh Kannan" 
                                    data-empid="EMP-2026-042" 
                                    data-dept="Engineering" 
                                    data-role="Senior Fullstack Engineer"
                                    data-certdate="14-Sep-2026"
                                    data-score="96.7%">
                                <i class="bi bi-award me-1"></i> View Certificate
                            </button>
                        </td>
                    </tr>

                    <!-- Employee 2: Kavitha Raman - 2/4 Completed -> Branch NO -->
                    <tr data-clearance-branch="no" data-emp="Kavitha Raman" data-empid="EMP-2026-041" data-dept="Design" data-role="UI/UX Designer">
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:36px;height:36px;border-radius:50%;" alt="Kavitha">
                                <div>
                                    <div class="fw-bold text-dark">Kavitha Raman</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-041 • Joined 10-Sep-2026</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Design</div>
                            <div class="text-muted" style="font-size:11px;">UI/UX Designer</div>
                        </td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                <span class="badge bg-success-subtle text-success border"><i class="bi bi-check me-1"></i>General</span>
                                <span class="badge bg-warning-subtle text-warning-emphasis border"><i class="bi bi-clock me-1"></i>Dept (18-Sep)</span>
                                <span class="badge bg-danger-subtle text-danger border"><i class="bi bi-exclamation me-1"></i>IT Security Pending</span>
                                <span class="badge bg-danger-subtle text-danger border"><i class="bi bi-exclamation me-1"></i>HR Policies Pending</span>
                            </div>
                        </td>
                        <td style="min-width:130px;">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="fw-bold text-warning-emphasis" style="font-size:12px;">1 of 4 Cleared</span>
                                <span class="fw-bold text-warning-emphasis" style="font-size:12px;">25%</span>
                            </div>
                            <div class="progress-bar-thin">
                                <span style="width:25%; background:#f59e0b;"></span>
                            </div>
                        </td>
                        <td>
                            <span class="fork-badge-no"><i class="bi bi-hourglass-split me-1"></i> No &bull; Pending Sessions</span>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning-emphasis border">3 Sessions Remaining</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-warning btn-view-pending-sessions"
                                    data-emp="Kavitha Raman"
                                    data-empid="EMP-2026-041"
                                    data-pending="Design System Walkthrough (Scheduled 18-Sep), IT Security Setup (Unscheduled), HR Policies & Code of Conduct (Unscheduled)">
                                <i class="bi bi-clock-history me-1"></i> View Pending Sessions
                            </button>
                        </td>
                    </tr>

                    <!-- Employee 3: Ananya Sen - 2/4 Completed -> Branch NO -->
                    <tr data-clearance-branch="no" data-emp="Ananya Sen" data-empid="EMP-2026-043" data-dept="Finance" data-role="Financial Analyst">
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:36px;height:36px;border-radius:50%;" alt="Ananya">
                                <div>
                                    <div class="fw-bold text-dark">Ananya Sen</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-043 • Joined 12-Sep-2026</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Finance</div>
                            <div class="text-muted" style="font-size:11px;">Financial Analyst</div>
                        </td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                <span class="badge bg-success-subtle text-success border"><i class="bi bi-check me-1"></i>General</span>
                                <span class="badge bg-success-subtle text-success border"><i class="bi bi-check me-1"></i>IT Security</span>
                                <span class="badge bg-warning-subtle text-warning-emphasis border"><i class="bi bi-clock me-1"></i>HR Ack Pending</span>
                                <span class="badge bg-danger-subtle text-danger border"><i class="bi bi-exclamation me-1"></i>Finance ERP Pending</span>
                            </div>
                        </td>
                        <td style="min-width:130px;">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="fw-bold text-warning-emphasis" style="font-size:12px;">2 of 4 Cleared</span>
                                <span class="fw-bold text-warning-emphasis" style="font-size:12px;">50%</span>
                            </div>
                            <div class="progress-bar-thin">
                                <span style="width:50%; background:#f59e0b;"></span>
                            </div>
                        </td>
                        <td>
                            <span class="fork-badge-no"><i class="bi bi-hourglass-split me-1"></i> No &bull; Pending Sessions</span>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning-emphasis border">2 Sessions Remaining</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-warning btn-view-pending-sessions"
                                    data-emp="Ananya Sen"
                                    data-empid="EMP-2026-043"
                                    data-pending="HR Policies Acknowledgement & Quiz, Finance ERP & Ledger Walkthrough">
                                <i class="bi bi-clock-history me-1"></i> View Pending Sessions
                            </button>
                        </td>
                    </tr>

                    <!-- Employee 4: Mohammed Farhan - 1/4 Completed -> Branch NO -->
                    <tr data-clearance-branch="no" data-emp="Mohammed Farhan" data-empid="EMP-2026-044" data-dept="Marketing" data-role="Digital Marketing Lead">
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-4.jpg" class="avatar-sm" style="width:36px;height:36px;border-radius:50%;" alt="Farhan">
                                <div>
                                    <div class="fw-bold text-dark">Mohammed Farhan</div>
                                    <div class="text-muted" style="font-size:11px;">EMP-2026-044 • Joined 14-Sep-2026</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Marketing</div>
                            <div class="text-muted" style="font-size:11px;">Digital Marketing Lead</div>
                        </td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                <span class="badge bg-success-subtle text-success border"><i class="bi bi-check me-1"></i>General</span>
                                <span class="badge bg-danger-subtle text-danger border"><i class="bi bi-x me-1"></i>Dept (Absent / Re-sched)</span>
                                <span class="badge bg-danger-subtle text-danger border"><i class="bi bi-exclamation me-1"></i>IT Security Pending</span>
                                <span class="badge bg-danger-subtle text-danger border"><i class="bi bi-exclamation me-1"></i>HR Policies Pending</span>
                            </div>
                        </td>
                        <td style="min-width:130px;">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="fw-bold text-warning-emphasis" style="font-size:12px;">1 of 4 Cleared</span>
                                <span class="fw-bold text-warning-emphasis" style="font-size:12px;">25%</span>
                            </div>
                            <div class="progress-bar-thin">
                                <span style="width:25%; background:#f59e0b;"></span>
                            </div>
                        </td>
                        <td>
                            <span class="fork-badge-no"><i class="bi bi-hourglass-split me-1"></i> No &bull; Pending Sessions</span>
                        </td>
                        <td>
                            <span class="badge bg-danger-subtle text-danger border">Absent / Re-sched Needed</span>
                        </td>
                        <td class="text-end text-nowrap">
                            <button type="button" class="btn btn-sm btn-outline-danger btn-view-pending-sessions"
                                    data-emp="Mohammed Farhan"
                                    data-empid="EMP-2026-044"
                                    data-pending="Dept Campaign Handoff (Absent - Re-schedule Needed), IT Security Setup, HR Policies & Code of Conduct">
                                <i class="bi bi-clock-history me-1"></i> View Pending Sessions
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL: SEND INDUCTION INVITATION & ACCESS LINK (PROFESSIONAL DESIGN) -->
<!-- ========================================================================= -->
<div class="modal fade" id="sendInviteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:18px;">
            <!-- Header -->
            <div class="modal-header border-0 pb-0" style="background:#f8fafc; border-top-left-radius:18px; border-top-right-radius:18px; padding:22px 26px 14px 26px;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold shadow-sm" style="width:48px;height:48px;background:linear-gradient(135deg, #087a24 0%, #10b981 100%);font-size:20px;">
                        <i class="bi bi-send-check-fill"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="modal-title fw-bold text-dark mb-0">Induction Invitation & Joining Access Hub</h4>
                            <span class="invite-badge-live"><span class="invite-pulse-dot"></span> Active Session Link</span>
                        </div>
                        <div class="text-muted" style="font-size:13px;">Dispatch instant invitation links, calendar invites (.ics), and WhatsApp notifications to new joiners</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4 pt-3">
                <!-- Session Context Banner -->
                <div class="p-3 mb-4 rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-3" style="background:#f0fdf4; border:1px solid #bbf7d0;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-circle bg-white text-success d-flex align-items-center justify-content-center fw-bold border border-success-subtle shadow-xs" style="width:44px;height:44px;font-size:16px;" id="inviteTargetInitial">
                            K
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <h5 class="fw-bold text-dark mb-0" id="inviteTargetName">Kavitha Raman</h5>
                                <span class="badge bg-success text-white" id="inviteTargetEmpId" style="font-size:11px;">EMP-2026-041</span>
                                <span class="badge bg-light text-dark border" id="inviteTargetDept">Design</span>
                            </div>
                            <div class="text-muted mt-1" style="font-size:12.5px;">
                                Role: <strong class="text-dark" id="inviteTargetRole">UI/UX Designer</strong> &bull; Program: <strong class="text-success" id="inviteTargetProgram">Department & Role Orientation</strong>
                            </div>
                        </div>
                    </div>
                    <div class="text-md-end">
                        <span class="badge bg-white text-dark border px-2 py-1 mb-1" id="inviteTargetRef"><i class="bi bi-hash text-muted"></i>SES-2026-101</span>
                        <div class="fw-semibold text-dark" style="font-size:12.5px;" id="inviteTargetDateTime"><i class="bi bi-calendar3 me-1 text-success"></i>18-Sep-2026 &bull; 11:30 AM</div>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Left Column: Links, Channels & Parameters -->
                    <div class="col-lg-7">
                        <!-- Section 1: Live Induction Joining Link -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark d-flex align-items-center justify-content-between mb-2" style="font-size:13px;">
                                <span><i class="bi bi-link-45deg text-success me-1 fs-5"></i> Secure Digital Induction & Joining Link</span>
                                <span class="badge bg-light text-muted border" style="font-size:10.5px;"><i class="bi bi-shield-lock me-1 text-success"></i>Token Encrypted &bull; Valid 7 Days</span>
                            </label>
                            <div class="invite-link-box mb-2">
                                <i class="bi bi-globe-americas text-muted fs-5"></i>
                                <input type="text" class="invite-link-input" id="inviteJoinLink" value="https://hrms.gharuda.com/induction/join?session=SES-2026-101&token=IND_87f2a9c4&emp=EMP-2026-041" readonly>
                                <button type="button" class="btn btn-sm btn-primary px-3 text-nowrap" id="btnCopyInviteLink" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                                    <i class="bi bi-clipboard-check me-1"></i> Copy Link
                                </button>
                            </div>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 text-muted" style="font-size:12px;">
                                <span><i class="bi bi-geo-alt text-danger me-1"></i> Venue / Platform: <strong class="text-dark" id="inviteVenuePlatform">Design Studio 2</strong></span>
                                <span class="text-success"><i class="bi bi-check2-all me-1"></i> Auto-registers attendance upon check-in</span>
                            </div>
                        </div>

                        <!-- Section 2: Multi-Channel Dispatch Switches -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark mb-2" style="font-size:13px;">
                                <i class="bi bi-broadcast text-primary me-1"></i> Delivery Channels & Instant Dispatches
                            </label>
                            
                            <div class="d-flex flex-column gap-3">
                                <!-- WhatsApp Channel -->
                                <div class="invite-channel-card">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white bg-success" style="width:32px;height:32px;font-size:16px;">
                                                <i class="bi bi-whatsapp"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark" style="font-size:13px;">WhatsApp Instant Invitation</div>
                                                <div class="text-muted" style="font-size:11.5px;">Send interactive message with calendar & portal link</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" type="checkbox" id="chkInviteWhatsApp" checked>
                                        </div>
                                    </div>
                                    <div class="row g-2 align-items-center">
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="invitePhone" value="+91 98401 23456" placeholder="Employee Phone Number">
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-sm btn-outline-success w-100" id="btnOpenWhatsAppDirect">
                                                <i class="bi bi-whatsapp me-1"></i> Open Web
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Channel -->
                                <div class="invite-channel-card">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white bg-primary" style="width:32px;height:32px;font-size:16px;">
                                                <i class="bi bi-envelope-at-fill"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark" style="font-size:13px;">Corporate & Personal Email Dispatch</div>
                                                <div class="text-muted" style="font-size:11.5px;">Includes rich calendar event (.ics), meeting room & agenda</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" type="checkbox" id="chkInviteEmail" checked>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-12">
                                            <input type="email" class="form-control form-control-sm" id="inviteEmail" value="kavitha.raman@gharudahr.com" placeholder="Employee Email">
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 mt-2 pt-2 border-top text-muted" style="font-size:11.5px;">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="chkAttachIcs" checked>
                                            <label class="form-check-label text-dark" for="chkAttachIcs">Attach Calendar (.ics)</label>
                                        </div>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="chkCcManager" checked>
                                            <label class="form-check-label text-dark" for="chkCcManager">CC Manager & Trainer</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section 3: Personalized Notes & Materials -->
                        <div>
                            <label class="form-label fw-bold text-dark mb-1" style="font-size:13px;">
                                <i class="bi bi-chat-left-quote text-warning me-1"></i> Custom Instructions / Orientation Welcome Message
                            </label>
                            <textarea class="form-control" id="inviteCustomMessage" rows="2" style="font-size:12.5px;" placeholder="Optional notes for candidate... e.g. Please bring your employee ID badge and ensure your corporate laptop has access.">Welcome to Gharuda! Please join 5 minutes prior to the session. You can review the attached orientation pack beforehand.</textarea>
                        </div>
                    </div>

                    <!-- Right Column: Live High-Fidelity Invitation Preview -->
                    <div class="col-lg-5">
                        <div class="invite-preview-container">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-stars text-warning fs-5"></i>
                                    <span class="fw-bold" style="font-size:13px; letter-spacing:0.4px;">LIVE INVITATION PREVIEW</span>
                                </div>
                                <span class="badge bg-white text-dark px-2 py-1" style="font-size:10px;">Official HRMS Card</span>
                            </div>

                            <div class="invite-preview-inner">
                                <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded bg-success text-white fw-bold d-flex align-items-center justify-content-center" style="width:24px;height:24px;font-size:11px;">G</div>
                                        <strong class="text-dark" style="font-size:12.5px;">Gharuda Technologies</strong>
                                    </div>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1" style="font-size:10.5px;">Orientation Invite</span>
                                </div>

                                <div class="mb-3">
                                    <div class="text-muted" style="font-size:11px; text-transform:uppercase; font-weight:700;">Induction Session Topic</div>
                                    <h6 class="fw-bold text-dark mb-1" id="previewSessionTitle">Design System & UX Framework Walkthrough</h6>
                                    <span class="badge bg-primary-subtle text-primary border" id="previewProgramCategory">Department & Role Orientation</span>
                                </div>

                                <div class="p-2.5 rounded-3 bg-light border mb-3" style="font-size:12px;">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <i class="bi bi-calendar3 text-success"></i>
                                        <span>Date: <strong class="text-dark" id="previewDate">18-Sep-2026</strong></span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <i class="bi bi-clock text-primary"></i>
                                        <span>Time: <strong class="text-dark" id="previewTime">11:30 AM - 12:30 PM</strong></span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <i class="bi bi-person-badge text-info"></i>
                                        <span>Trainer: <strong class="text-dark" id="previewTrainer">Amelia Curr (Design Lead)</strong></span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-geo-alt text-danger"></i>
                                        <span>Venue: <strong class="text-dark" id="previewVenue">Design Studio 2</strong></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-muted mb-1" style="font-size:11px; font-weight:700;">PRE-ATTACHED MATERIALS</div>
                                    <div class="d-flex flex-wrap gap-1" id="previewMaterialsBadges">
                                        <span class="badge bg-light text-dark border" style="font-size:10.5px;"><i class="bi bi-file-earmark-pdf text-danger me-1"></i>Design_System_v2.pdf</span>
                                        <span class="badge bg-light text-dark border" style="font-size:10.5px;"><i class="bi bi-file-earmark-pdf text-danger me-1"></i>Figma_Handbook.pdf</span>
                                    </div>
                                </div>

                                <div class="text-center pt-2">
                                    <div class="btn btn-sm btn-success w-100 fw-bold py-2 shadow-xs" style="background:var(--primary, #087a24); border:none;">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Join Orientation & Access Portal
                                    </div>
                                    <div class="text-muted mt-2" style="font-size:10.5px;">
                                        <i class="bi bi-info-circle me-1"></i> Link is unique to employee ID <span id="previewEmpIdFooter">EMP-2026-041</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer border-0 bg-light" style="border-bottom-left-radius:18px; border-bottom-right-radius:18px; padding:16px 26px;">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-secondary" id="btnCopyInviteMessage">
                    <i class="bi bi-chat-quote me-1"></i> Copy Full Text Message
                </button>
                <button type="button" class="btn btn-success" id="btnDispatchWhatsAppSingle" style="background:#25D366; border-color:#25D366; color:#ffffff;">
                    <i class="bi bi-whatsapp me-1"></i> Send via WhatsApp
                </button>
                <button type="button" class="btn btn-primary px-4" id="btnDispatchInvitesAll" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                    <i class="bi bi-send-check me-1"></i> Dispatch Official Invites Now
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL 1: NEW INDUCTION / SCHEDULE SESSION (STEPS 1 TO 4) -->
<!-- ========================================================================= -->
<div class="modal fade" id="scheduleInductionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-calendar-plus"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Schedule Induction Session</h4>
                        <div class="text-muted" style="font-size:13px;">Steps 1 to 4: Employee Selected &rarr; Program Assigned &rarr; Sessions Scheduled &rarr; Employee Notified</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="newInductionForm" onsubmit="return false;">
                <div class="modal-body p-4">
                    <!-- Step 1 & 2: Employee & Program -->
                    <div class="p-3 mb-3 rounded-3" style="background:#f8fafc; border:1px solid #e2e8f0;">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark" style="font-size:13px;">
                                    <span class="badge bg-primary text-white rounded-circle me-1">1</span> Employee Selected *
                                </label>
                                <select class="form-select" id="newEmpSelect" required>
                                    <option value="" disabled selected>-- Select New Joiner --</option>
                                    <option value="Kavitha Raman|EMP-2026-041|Design|UI/UX Designer|kavitha.raman@gharudahr.com|+91 98401 23456">Kavitha Raman (EMP-2026-041) - Design</option>
                                    <option value="Rajesh Kannan|EMP-2026-042|Engineering|Senior Fullstack Engineer|rajesh.k@gharudahr.com|+91 98842 67890">Rajesh Kannan (EMP-2026-042) - Engineering</option>
                                    <option value="Ananya Sen|EMP-2026-043|Finance|Financial Analyst|ananya.sen@gharudahr.com|+91 97908 11223">Ananya Sen (EMP-2026-043) - Finance</option>
                                    <option value="Mohammed Farhan|EMP-2026-044|Marketing|Digital Marketing Lead|m.farhan@gharudahr.com|+91 99403 55678">Mohammed Farhan (EMP-2026-044) - Marketing</option>
                                    <option value="Deepak Verma|EMP-2026-045|HR|HR Recruiter|deepak.v@gharudahr.com|+91 98410 99887">Deepak Verma (EMP-2026-045) - HR</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark" style="font-size:13px;">
                                    <span class="badge bg-primary text-white rounded-circle me-1">2</span> Induction Program Assigned *
                                </label>
                                <select class="form-select" id="newProgramSelect" required>
                                    <option value="General Company Induction|General Induction">General Induction (Vision, Culture, Founders & Org Chart)</option>
                                    <option value="Department & Role Orientation|Dept Orientation" selected>Department Orientation (Role KPIs, Tools & Tech Stack)</option>
                                    <option value="IT & Data Security Setup|IT & Security">IT & Security Orientation (VPN, MFA & InfoSec Policies)</option>
                                    <option value="HR Policies & Code of Conduct|HR Policies">HR Policies & Compliance (POSH, Leaves & Ethics Code)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Session Schedule Details -->
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark" style="font-size:13px;">
                            <span class="badge bg-primary text-white rounded-circle me-1">3</span> Sessions Scheduled
                        </label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted" style="font-size:12px;">Session Topic / Title *</label>
                                <input type="text" class="form-control" id="newSessionTitle" placeholder="e.g. Design System & UX Framework Walkthrough" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted" style="font-size:12px;">Trainer / Facilitator *</label>
                                <input type="text" class="form-control" id="newTrainer" placeholder="e.g. Amelia Curr (Design Lead)" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted" style="font-size:12px;">Scheduled Date *</label>
                                <input type="date" class="form-control" id="newDate" required value="2026-09-18">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted" style="font-size:12px;">Time Slot *</label>
                                <input type="text" class="form-control" id="newTime" placeholder="11:00 AM - 12:30 PM" required value="11:30 AM - 12:30 PM">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted" style="font-size:12px;">Mode *</label>
                                <select class="form-select" id="newMode">
                                    <option value="In-person">In-person</option>
                                    <option value="Online">Online (Google Meet / Zoom)</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text-muted" style="font-size:12px;">Venue / Online Meeting URL</label>
                                <input type="text" class="form-control" id="newVenue" placeholder="e.g. Design Studio 2 or meet.google.com/xyz-abc" value="Design Studio 2">
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Employee Notification Options -->
                    <div class="p-3 rounded-3" style="background:#f0fdf4; border:1px solid #bbf7d0;">
                        <label class="form-label fw-bold text-success mb-2" style="font-size:13px;">
                            <span class="badge bg-success text-white rounded-circle me-1">4</span> Employee Notified (Auto-Dispatch)
                        </label>
                        <div class="d-flex flex-column gap-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="chkNotifyWhatsApp" checked>
                                <label class="form-check-label fw-semibold text-dark" for="chkNotifyWhatsApp" style="font-size:13px;">
                                    <i class="bi bi-whatsapp text-success me-1"></i> Send Instant WhatsApp Notification & Calendar Invite (.ics)
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="chkNotifyEmail" checked>
                                <label class="form-check-label fw-semibold text-dark" for="chkNotifyEmail" style="font-size:13px;">
                                    <i class="bi bi-envelope-check text-primary me-1"></i> Send Official Calendar Invitation to Employee Corporate Email
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnSubmitNewSession" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                        <i class="bi bi-send-check me-1"></i> Schedule Session & Notify Employee
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL 2: SESSION EXECUTION & VERIFICATION HUB (STEPS 5 TO 10) -->
<!-- ========================================================================= -->
<div class="modal fade" id="sessionExecutionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Execute & Complete Induction Session</h4>
                        <div class="text-muted" style="font-size:13px;">Steps 5 to 10: Conduct &rarr; Attendance &rarr; Materials &rarr; Assessment &rarr; Feedback &rarr; Complete</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="execSessionForm" onsubmit="return false;">
                <div class="modal-body p-4">
                    <!-- Session Banner -->
                    <div class="p-3 mb-3 rounded-3" style="background:#eef7f0; border:1px solid #cce8d3;">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <div>
                                <span class="badge bg-success text-white mb-1" id="execSessionRef">SES-2026-101</span>
                                <h5 class="fw-bold text-dark mb-0" id="execSessionTitle">Design System & UX Framework Walkthrough</h5>
                                <div class="text-muted" style="font-size:12px;" id="execSessionEmpInfo">Kavitha Raman (EMP-2026-041) • Design</div>
                            </div>
                            <div class="text-end">
                                <div class="fw-semibold text-dark" id="execSessionSchedule">18-Sep-2026 • 11:30 AM</div>
                                <div class="text-muted" style="font-size:12px;" id="execSessionTrainer">Amelia Curr (Design Lead)</div>
                            </div>
                        </div>
                    </div>

                    <!-- Steps 5 & 6: Session Conducted & Attendance Captured -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">
                                <span class="badge bg-primary text-white rounded-circle me-1">5</span> Session Conducted *
                            </label>
                            <select class="form-select" id="execConductedStatus">
                                <option value="Yes">Yes - Session Successfully Conducted</option>
                                <option value="In Progress">In Progress (Currently Happening)</option>
                                <option value="No">No - Scheduled Upcoming</option>
                                <option value="Rescheduled">Rescheduled / Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">
                                <span class="badge bg-primary text-white rounded-circle me-1">6</span> Attendance Captured *
                            </label>
                            <select class="form-select" id="execAttendanceStatus">
                                <option value="Present">✅ Present (Participated in Full)</option>
                                <option value="Pending">⏳ Pending</option>
                                <option value="Absent">❌ Absent / Unexcused</option>
                            </select>
                        </div>
                    </div>

                    <!-- Step 7: Materials / Policies Shared -->
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark" style="font-size:13px;">
                            <span class="badge bg-primary text-white rounded-circle me-1">7</span> Materials / Policies Shared
                        </label>
                        <input type="text" class="form-control" id="execMaterials" placeholder="e.g. Design_System_v2.pdf, Figma_Handbook.pdf, Code_of_Conduct.pdf">
                        <div class="text-muted" style="font-size:11px;margin-top:3px;">
                            <i class="bi bi-paperclip"></i> Uploaded documents are automatically available in employee's digital onboarding portal.
                        </div>
                    </div>

                    <!-- Step 8: Acknowledgement & Assessment -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">
                                <span class="badge bg-primary text-white rounded-circle me-1">8</span> Acknowledgement / Assessment Score
                            </label>
                            <select class="form-select" id="execAssessment">
                                <option value="Passed (100%)">Passed (100% Score)</option>
                                <option value="Passed (95%)">Passed (95% Score)</option>
                                <option value="Passed (90%)">Passed (90% Score)</option>
                                <option value="Passed (80%)">Passed (80% Score)</option>
                                <option value="Digital Sign-off Completed">Digital Sign-off Completed</option>
                                <option value="Pending Sign-off">Pending Sign-off / Test</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">
                                <span class="badge bg-primary text-white rounded-circle me-1">9</span> Employee Feedback & Rating
                            </label>
                            <select class="form-select" id="execRating">
                                <option value="5.0">⭐⭐⭐⭐⭐ 5.0 / 5.0 (Excellent)</option>
                                <option value="4.8">⭐⭐⭐⭐⭐ 4.8 / 5.0 (Very Good)</option>
                                <option value="4.0">⭐⭐⭐⭐ 4.0 / 5.0 (Good)</option>
                                <option value="3.0">⭐⭐⭐ 3.0 / 5.0 (Average)</option>
                                <option value="Unrated">Unrated</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size:12.5px;">Employee Feedback Comments</label>
                        <textarea class="form-control" id="execFeedbackText" rows="2" placeholder="Enter remarks or feedback received from employee..."></textarea>
                    </div>

                    <!-- Step 10: Session Completed -->
                    <div class="p-3 rounded-3" style="background:#f8fafc; border:1px solid #e2e8f0;">
                        <label class="form-label fw-bold text-dark mb-1" style="font-size:13px;">
                            <span class="badge bg-success text-white rounded-circle me-1">10</span> Session Completed (Final Sign-off)
                        </label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted" style="font-size:12px;">Session Status *</label>
                                <select class="form-select" id="execSessionStatus">
                                    <option value="Completed">Completed (Signed Off)</option>
                                    <option value="Conducted">Conducted (Assessment In Review)</option>
                                    <option value="Scheduled">Scheduled (Upcoming)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted" style="font-size:12px;">Verified / Completed By</label>
                                <input type="text" class="form-control" id="execCompletedBy" value="HR Manager (Priya Sharma)">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSaveExecutionUpdate" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                        <i class="bi bi-check2-circle me-1"></i> Save Workflow Updates
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL 3: INDUCTION CLEARANCE CERTIFICATE (STEP 11: BRANCH YES) -->
<!-- ========================================================================= -->
<div class="modal fade" id="inductionCertificateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 pt-0">
                <div class="clearance-cert-frame text-center">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="cert-seal">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                    </div>
                    <span class="badge bg-success text-white px-3 py-1 mb-2">OFFICIAL HR INDUCTION CLEARANCE</span>
                    <h3 class="fw-bold text-dark font-display mb-1">Certificate of Induction Completion</h3>
                    <p class="text-muted" style="font-size:13px;">This certifies that the employee has successfully completed all mandatory orientation modules.</p>

                    <hr style="border-color:#bbf7d0; margin:16px 0;">

                    <h4 class="fw-bold text-success mb-1" id="certEmpName">Rajesh Kannan</h4>
                    <div class="text-muted mb-3" style="font-size:13px;">
                        <span id="certEmpId">EMP-2026-042</span> &bull; 
                        <span id="certEmpRole">Senior Fullstack Engineer</span> &bull; 
                        <span id="certEmpDept">Engineering</span>
                    </div>

                    <div class="row g-2 justify-content-center mb-4">
                        <div class="col-sm-3 col-6">
                            <div class="p-2 border rounded-3 bg-white">
                                <div class="text-muted" style="font-size:11px;">1. General Induction</div>
                                <strong class="text-success" style="font-size:12px;"><i class="bi bi-check-circle"></i> 100% Cleared</strong>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="p-2 border rounded-3 bg-white">
                                <div class="text-muted" style="font-size:11px;">2. IT Security</div>
                                <strong class="text-success" style="font-size:12px;"><i class="bi bi-check-circle"></i> 100% Cleared</strong>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="p-2 border rounded-3 bg-white">
                                <div class="text-muted" style="font-size:11px;">3. Dept Orientation</div>
                                <strong class="text-success" style="font-size:12px;"><i class="bi bi-check-circle"></i> 100% Cleared</strong>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="p-2 border rounded-3 bg-white">
                                <div class="text-muted" style="font-size:11px;">4. HR & Compliance</div>
                                <strong class="text-success" style="font-size:12px;"><i class="bi bi-check-circle"></i> 100% Cleared</strong>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center text-muted px-4" style="font-size:12px;">
                        <div>
                            <div>Issue Date: <strong class="text-dark" id="certIssueDate">14-Sep-2026</strong></div>
                            <div>Overall Assessment: <strong class="text-success" id="certScore">96.7%</strong></div>
                        </div>
                        <div class="text-end">
                            <div class="fw-bold text-dark">Gharuda HRMS Central Office</div>
                            <div>Authorized HR Sign-off Stamp</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-secondary" onclick="window.print();">
                    <i class="bi bi-printer me-1"></i> Print Certificate
                </button>
                <button type="button" class="btn btn-success" onclick="alert('Downloading high-resolution Clearance Certificate (PDF)...');">
                    <i class="bi bi-download me-1"></i> Download PDF
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL 4: PENDING SESSIONS BREAKDOWN (STEP 11: BRANCH NO) -->
<!-- ========================================================================= -->
<div class="modal fade" id="pendingSessionsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#fff4d9;">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-warning-emphasis fw-bold" style="width:36px;height:36px;background:#fef3c7;font-size:16px;">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-warning-emphasis mb-0">Pending Mandatory Sessions</h5>
                        <div class="text-muted" style="font-size:12px;">Step 11 Decision: Branch No (Incomplete)</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <p class="text-muted" style="font-size:13px;">
                    Employee <strong class="text-dark" id="pendingModalEmpName">Kavitha Raman</strong> has not yet completed all mandatory modules. The following sessions must be conducted and cleared before issuing induction certificate:
                </p>

                <div id="pendingSessionsList" class="d-flex flex-column gap-2 mb-3">
                    <!-- Dynamic session items inserted via JS -->
                </div>

                <div class="p-3 bg-light rounded-3 text-muted" style="font-size:12px;">
                    <i class="bi bi-bell text-primary me-1"></i> You can immediately schedule missing sessions using the button below. Automated notifications will be sent to the employee.
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleInductionModal" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                    <i class="bi bi-calendar-plus me-1"></i> Schedule Missing Session
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL 5: VIEW SESSION DETAILS & AGENDA MODAL -->
<!-- ========================================================================= -->
<div class="modal fade" id="viewSessionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-eye"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0" id="viewModalTitle">Session Details</h4>
                        <div class="text-muted" style="font-size:13px;" id="viewModalRef">SES-2026-101</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 bg-light">
                            <div class="text-muted" style="font-size:11px; text-transform:uppercase; font-weight:700;">Employee Selected</div>
                            <div class="fw-bold text-dark fs-6" id="viewEmp">Kavitha Raman</div>
                            <div class="text-muted" style="font-size:12px;" id="viewEmpMeta">EMP-2026-041 &bull; Design</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 bg-light">
                            <div class="text-muted" style="font-size:11px; text-transform:uppercase; font-weight:700;">Program Assigned</div>
                            <div class="fw-bold text-dark fs-6" id="viewProgram">Department & Role Orientation</div>
                            <div class="text-muted" style="font-size:12px;" id="viewTopic">Design System & UX Framework Walkthrough</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted" style="font-size:12px;">Trainer / Facilitator</div>
                        <div class="fw-semibold text-dark" id="viewTrainer">Amelia Curr</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted" style="font-size:12px;">Schedule & Mode</div>
                        <div class="fw-semibold text-dark" id="viewDateTime">18-Sep-2026 (11:30 AM)</div>
                        <div class="text-muted" style="font-size:11.5px;" id="viewModeVenue">In-person &bull; Design Studio 2</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted" style="font-size:12px;">Employee Notification</div>
                        <div class="fw-semibold text-success" id="viewNotified"><i class="bi bi-check-circle me-1"></i>WhatsApp & Email Sent</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted" style="font-size:12px;">Attendance Status</div>
                        <div class="fw-semibold text-dark" id="viewAttendance">Pending</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted" style="font-size:12px;">Assessment / Acknowledgement</div>
                        <div class="fw-semibold text-dark" id="viewAssessment">Pending</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted" style="font-size:12px;">Employee Rating</div>
                        <div class="fw-semibold text-warning" id="viewRating">Unrated</div>
                    </div>
                    <div class="col-12">
                        <div class="text-muted" style="font-size:12px;">Materials & Policies Shared</div>
                        <div class="p-2 border rounded-2 bg-white" id="viewMaterials">Design_System_v2.pdf, Figma_Handbook.pdf</div>
                    </div>
                    <div class="col-12">
                        <div class="text-muted" style="font-size:12px;">Feedback / Remarks</div>
                        <div class="p-2 border rounded-2 bg-white" id="viewFeedbackText">None recorded yet.</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL 6: WORKFLOW HELP & ARCHITECTURE MODAL -->
<!-- ========================================================================= -->
<div class="modal fade" id="workflowHelpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <h5 class="modal-title fw-bold text-dark">Induction Lifecycle Guide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="p-3 bg-light rounded-3 font-monospace" style="font-size:12px; line-height:1.7;">
                    Employee Selected<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    Induction Program Assigned<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    Sessions Scheduled<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    Employee Notified<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    Session Conducted<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    Attendance Captured<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    Materials / Policies Shared<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    Acknowledgement / Assessment<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    Feedback<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    Session Completed<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&darr;<br>
                    All Mandatory Sessions Completed?<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&boxur;&boxh;&boxh; No &rarr; Pending Sessions<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&boxdr;&boxh;&boxh; Yes &rarr; Fully Certified
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="background:var(--primary, #087a24);">Got it</button>
            </div>
        </div>
    </div>
</div>

<!-- Copy Feedback Toast -->
<div class="toast-copy-feedback" id="copyFeedbackToast">
    <i class="bi bi-check-circle-fill text-success fs-5"></i>
    <span id="copyToastMsg">Invitation link copied to clipboard!</span>
</div>

<!-- Define Filter Function globally BEFORE tabel.js runs -->


<script src="./assets/js/tabel.js"></script>

<script src="./assets/js/pages/onboarding-orientation.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
