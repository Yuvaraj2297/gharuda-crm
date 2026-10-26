<?php include 'header.php'; ?>

 

<style>
    /* Modern Executive KPI & Card Styling */
    .rpt-kpi {
        min-height: 96px;
        padding: 16px;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 14px;
        background: var(--white, #ffffff);
        box-shadow: 0 4px 16px rgba(20, 30, 25, .04);
        transition: transform .2s ease;
    }
    .rpt-kpi:hover { transform: translateY(-2px); }
    .rpt-kpi .icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .rpt-kpi .label {
        color: var(--ink-500, #64748b);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .rpt-kpi .value {
        color: var(--ink-900, #0f172a);
        font-size: 22px;
        font-weight: 800;
    }
    .rpt-kpi .sub {
        color: var(--ink-500, #64748b);
        font-size: 11px;
        margin-top: 2px;
    }

    /* Executive Score Chips & Workflow Status Capsules */
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

    /* Toast Notification */
    .rpt-toast {
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
    .rpt-toast.show {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Performance Reports & Analytics</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-bar-chart-line fs-6 text-success"></i>
            <span>Performance Management</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Performance Reports</span>
        </nav>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <button class="btn btn-outline-danger" type="button" onclick="exportAnalyticsReport('PDF')">
            <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export PDF
        </button>
        <button class="btn btn-success" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" type="button" onclick="exportAnalyticsReport('Excel')">
            <i class="bi bi-file-earmark-excel-fill me-1"></i> Export Excel
        </button>
    </div>
</div>

<!-- 1. Executive Control Bar (Common Filters) -->
<div class="card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white border-start border-4 border-success">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-success-subtle text-success p-2 rounded-3 fs-5"><i class="bi bi-funnel-fill"></i></span>
            <div>
                <h6 class="fw-bold text-dark mb-0 font-display">Common Analytics Filter Panel</h6>
                <div class="text-muted small" style="font-size:12px;">Data Source: <strong class="text-success"><i class="bi bi-shield-check me-1"></i>Final HR Approved Performance Results</strong> (Goal/KPI ➔ Self ➔ Manager ➔ HR Approval)</div>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-light text-dark border px-2 py-1" style="font-size:11.5px;">
                <i class="bi bi-arrow-repeat me-1 text-success"></i> Real-time Sync Active
            </span>
        </div>
    </div>

    <!-- Common Filters Grid -->
    <div class="bg-light p-3 rounded-3 border">
        <div class="row g-2 align-items-center">
            <div class="col-6 col-md-2">
                <label class="form-label text-muted fw-bold mb-1" style="font-size:11px;"><i class="bi bi-calendar3 me-1"></i>Year</label>
                <select class="form-select form-select-sm border-secondary-subtle" id="rptFilterYear" onchange="applyAnalyticsFilters()">
                    <option value="all">All Years</option>
                    <option value="2026" selected>2026 (FY25-26)</option>
                    <option value="2025">2025 (FY24-25)</option>
                    <option value="2024">2024 (FY23-24)</option>
                </select>
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label text-muted fw-bold mb-1" style="font-size:11px;"><i class="bi bi-arrow-repeat me-1"></i>Performance Cycle</label>
                <select class="form-select form-select-sm border-secondary-subtle" id="rptFilterCycle" onchange="applyAnalyticsFilters()">
                    <option value="all" selected>All Cycles</option>
                    <option value="annual">FY25-26 Annual 360° Review</option>
                    <option value="q1">Q1 Leadership Check-in</option>
                    <option value="probation">Probationary 360 Evaluation</option>
                </select>
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label text-muted fw-bold mb-1" style="font-size:11px;"><i class="bi bi-building me-1"></i>Department</label>
                <select class="form-select form-select-sm border-secondary-subtle" id="rptFilterDept" onchange="applyAnalyticsFilters()">
                    <option value="all" selected>All Departments</option>
                    <option value="Engineering">Engineering</option>
                    <option value="UI/UX Design">UI/UX Design</option>
                    <option value="Infrastructure">Infrastructure</option>
                    <option value="Quality Assurance">Quality Assurance</option>
                    <option value="Human Resources">Human Resources</option>
                </select>
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label text-muted fw-bold mb-1" style="font-size:11px;"><i class="bi bi-person-badge me-1"></i>Designation</label>
                <select class="form-select form-select-sm border-secondary-subtle" id="rptFilterDesig" onchange="applyAnalyticsFilters()">
                    <option value="all" selected>All Designations</option>
                    <option value="Software Engineer">Software Engineer</option>
                    <option value="Design Lead">Design Lead</option>
                    <option value="DevOps Lead">DevOps Lead</option>
                    <option value="QA Engineer">QA Engineer</option>
                </select>
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label text-muted fw-bold mb-1" style="font-size:11px;"><i class="bi bi-person-gear me-1"></i>Manager</label>
                <select class="form-select form-select-sm border-secondary-subtle" id="rptFilterMgr" onchange="applyAnalyticsFilters()">
                    <option value="all" selected>All Managers</option>
                    <option value="Rajesh Sharma">Rajesh Sharma (Eng Director)</option>
                    <option value="Karthik Raja">Karthik Raja (TL)</option>
                    <option value="Divya Ramesh">Divya Ramesh (HR Admin)</option>
                </select>
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label text-muted fw-bold mb-1" style="font-size:11px;"><i class="bi bi-person-circle me-1 text-success"></i>Employee</label>
                <select class="form-select form-select-sm border-success fw-bold text-dark" id="rptFilterEmp" onchange="applyAnalyticsFilters()">
                    <option value="all" selected>All Employees</option>
                    <option value="Arun Kumar">Arun Kumar</option>
                    <option value="Amelia Curr">Amelia Curr</option>
                    <option value="Sanjay V">Sanjay V</option>
                    <option value="Daniel Martinez">Daniel Martinez</option>
                    <option value="Priya Sharma">Priya Sharma</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- 2. Performance Dashboard KPI Cards -->
<div class="row g-3 mb-4" id="rptKpiRow">
    <div class="col-sm-6 col-xl-2-4" style="flex: 0 0 auto; width: 20%;">
        <div class="rpt-kpi d-flex align-items-center gap-3 h-100">
            <div class="icon" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-people-fill"></i></div>
            <div>
                <div class="label">Total Employees</div>
                <div class="value" id="rptKpiTotalEmp">120</div>
                <div class="sub">Across 5 Depts</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-2-4" style="flex: 0 0 auto; width: 20%;">
        <div class="rpt-kpi d-flex align-items-center gap-3 h-100">
            <div class="icon" style="background:#dcfce7;color:#15803d;"><i class="bi bi-check-circle-fill"></i></div>
            <div>
                <div class="label">Completed Appraisals</div>
                <div class="value text-success" id="rptKpiCompleted">108 <span style="font-size:12px; font-weight:600; color:#15803d;">(90%)</span></div>
                <div class="sub">HR Approved</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-2-4" style="flex: 0 0 auto; width: 20%;">
        <div class="rpt-kpi d-flex align-items-center gap-3 h-100">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="label">Pending Appraisals</div>
                <div class="value text-warning" id="rptKpiPending">12 <span style="font-size:12px; font-weight:600; color:#b56b00;">(10%)</span></div>
                <div class="sub">In Workflow</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-2-4" style="flex: 0 0 auto; width: 20%;">
        <div class="rpt-kpi d-flex align-items-center gap-3 h-100">
            <div class="icon" style="background:#ecfdf5;color:#047857;"><i class="bi bi-star-fill text-warning me-1"></i></div>
            <div>
                <div class="label">Avg Performance Rating</div>
                <div class="value text-dark" id="rptKpiAvgRating">3.8 <span style="font-size:12px; font-weight:600; color:#64748b;">/ 5.0</span></div>
                <div class="sub text-success"><i class="bi bi-arrow-up-right me-1"></i>+0.3 vs Last Year</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-2-4" style="flex: 0 0 auto; width: 20%;">
        <div class="rpt-kpi d-flex align-items-center gap-3 h-100">
            <div class="icon" style="background:#f3e8ff;color:#7e22ce;"><i class="bi bi-trophy-fill"></i></div>
            <div>
                <div class="label">Avg KPI Achievement</div>
                <div class="value text-purple" style="color:#7e22ce;" id="rptKpiAvgGoal">84%</div>
                <div class="sub">Targets Met</div>
            </div>
        </div>
    </div>
</div>

<!-- 3. Section Grid: Rating Distribution & Department Performance -->
<div class="row g-4 mb-4">
    
    <!-- A. RATING DISTRIBUTION (Management Executive View) -->
    <div class="col-12 col-lg-5">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <h5 class="fw-bold text-dark mb-0 font-display"><i class="bi bi-pie-chart-fill text-success me-2"></i>3. Rating Distribution</h5>
                    <div class="text-muted small" style="font-size:11.5px;">Bell curve & score breakdown across organization</div>
                </div>
                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">1–5 Scale</span>
            </div>

            <!-- Visual Percentage Bar -->
            <div class="mb-3">
                <div class="d-flex justify-content-between text-muted small fw-bold mb-1" style="font-size:11.5px;">
                    <span>Organization Score Spread</span>
                    <span class="text-dark" id="rptRatingDistCount">108 Approved Reviews</span>
                </div>
                <div class="progress rounded-pill overflow-hidden" style="height: 18px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" id="rptRatingDistBar">
                    <div class="progress-bar bg-success" style="width: 10%;" title="Rating 5: 10%">5★ (10%)</div>
                    <div class="progress-bar bg-info" style="width: 35%;" title="Rating 4: 35%">4★ (35%)</div>
                    <div class="progress-bar bg-primary" style="width: 40%;" title="Rating 3: 40%">3★ (40%)</div>
                    <div class="progress-bar bg-warning" style="width: 12%;" title="Rating 2: 12%">2★ (12%)</div>
                    <div class="progress-bar bg-danger" style="width: 3%;" title="Rating 1: 3%">1★</div>
                </div>
            </div>

            <!-- Breakdown Table -->
            <div class="table-responsive">
                <table class="table table-sm table-hover align-middle mb-0" style="font-size:12.5px;">
                    <thead class="table-light">
                        <tr>
                            <th>Rating Grade</th>
                            <th class="text-center">Employees</th>
                            <th class="text-center">Share (%)</th>
                            <th class="text-end">Visual Bar</th>
                        </tr>
                    </thead>
                    <tbody id="rptRatingDistBody">
                        <tr>
                            <td>
                                <span class="badge bg-success-subtle text-success border border-success-subtle fw-bold">
                                    <i class="bi bi-star-fill text-warning me-1"></i> Rating 5 (Outstanding)
                                </span>
                            </td>
                            <td class="text-center fw-bold">12</td>
                            <td class="text-center fw-bold text-success">10%</td>
                            <td class="text-end" style="width: 110px;">
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 10%;"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="badge bg-info-subtle text-info border border-info-subtle fw-bold">
                                    <i class="bi bi-star-fill text-warning me-1"></i> Rating 4 (Exceeds)
                                </span>
                            </td>
                            <td class="text-center fw-bold">42</td>
                            <td class="text-center fw-bold text-info">35%</td>
                            <td class="text-end">
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-info" style="width: 35%;"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-bold">
                                    <i class="bi bi-star-fill text-warning me-1"></i> Rating 3 (Meets Expectations)
                                </span>
                            </td>
                            <td class="text-center fw-bold">48</td>
                            <td class="text-center fw-bold text-primary">40%</td>
                            <td class="text-end">
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: 40%;"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="badge bg-warning-subtle text-dark border border-warning fw-bold">
                                    <i class="bi bi-star-fill text-warning me-1"></i> Rating 2 (Needs Improvement)
                                </span>
                            </td>
                            <td class="text-center fw-bold">14</td>
                            <td class="text-center fw-bold text-warning">12%</td>
                            <td class="text-end">
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: 12%;"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle fw-bold">
                                    <i class="bi bi-star-fill text-warning me-1"></i> Rating 1 (Unsatisfactory)
                                </span>
                            </td>
                            <td class="text-center fw-bold">4</td>
                            <td class="text-center fw-bold text-danger">3%</td>
                            <td class="text-end">
                                <div class="progress rounded-pill" style="height: 8px;">
                                    <div class="progress-bar bg-danger" style="width: 3%;"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- B. DEPARTMENT PERFORMANCE BREAKDOWN -->
    <div class="col-12 col-lg-7">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <h5 class="fw-bold text-dark mb-0 font-display"><i class="bi bi-building text-primary me-2"></i>2. Department Performance Breakdown</h5>
                    <div class="text-muted small" style="font-size:11.5px;">Avg Rating, KPI Achievement & Employee Drill-down</div>
                </div>
                <span class="badge bg-light text-dark border"><i class="bi bi-diagram-3 me-1"></i>5 Departments</span>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0" style="font-size:12.5px;">
                    <thead class="table-light">
                        <tr>
                            <th>Department</th>
                            <th class="text-center">Headcount</th>
                            <th class="text-center">Avg Rating</th>
                            <th class="text-center">KPI Achievement</th>
                            <th class="text-center">Completion</th>
                            <th class="text-end">Drill-down</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="fw-bold text-dark"><i class="bi bi-code-slash text-primary me-1"></i> Engineering</div>
                                <div class="text-muted" style="font-size:10.5px;">Core Software & Systems</div>
                            </td>
                            <td class="text-center fw-bold">120</td>
                            <td class="text-center"><span class="score-chip score-chip-good">3.8 / 5.0</span></td>
                            <td class="text-center fw-bold text-success">84%</td>
                            <td class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle">92%</span></td>
                            <td class="text-end">
                                <a href="performance-department-report.php?dept=Engineering" class="btn btn-xs btn-outline-success rounded-pill px-2 py-1">
                                    <i class="bi bi-arrow-right-circle me-1"></i> View Dept Report
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold text-dark"><i class="bi bi-palette text-purple me-1" style="color:#7e22ce;"></i> UI/UX Design</div>
                                <div class="text-muted" style="font-size:10.5px;">Product Experience</div>
                            </td>
                            <td class="text-center fw-bold">35</td>
                            <td class="text-center"><span class="score-chip score-chip-high">4.2 / 5.0</span></td>
                            <td class="text-center fw-bold text-success">88%</td>
                            <td class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle">100%</span></td>
                            <td class="text-end">
                                <a href="performance-department-report.php?dept=UI%2FUX%20Design" class="btn btn-xs btn-outline-success rounded-pill px-2 py-1">
                                    <i class="bi bi-arrow-right-circle me-1"></i> View Dept Report
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold text-dark"><i class="bi bi-hdd-network text-info me-1"></i> Infrastructure</div>
                                <div class="text-muted" style="font-size:10.5px;">Cloud & DevOps Operations</div>
                            </td>
                            <td class="text-center fw-bold">28</td>
                            <td class="text-center"><span class="score-chip score-chip-high">4.0 / 5.0</span></td>
                            <td class="text-center fw-bold text-success">86%</td>
                            <td class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle">95%</span></td>
                            <td class="text-end">
                                <a href="performance-department-report.php?dept=Infrastructure" class="btn btn-xs btn-outline-success rounded-pill px-2 py-1">
                                    <i class="bi bi-arrow-right-circle me-1"></i> View Dept Report
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold text-dark"><i class="bi bi-bug text-warning me-1"></i> Quality Assurance</div>
                                <div class="text-muted" style="font-size:10.5px;">Testing & Automation</div>
                            </td>
                            <td class="text-center fw-bold">22</td>
                            <td class="text-center"><span class="score-chip score-chip-active">3.6 / 5.0</span></td>
                            <td class="text-center fw-bold text-primary">79%</td>
                            <td class="text-center"><span class="badge bg-info-subtle text-info border border-info-subtle">88%</span></td>
                            <td class="text-end">
                                <a href="performance-department-report.php?dept=Quality%20Assurance" class="btn btn-xs btn-outline-success rounded-pill px-2 py-1">
                                    <i class="bi bi-arrow-right-circle me-1"></i> View Dept Report
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="fw-bold text-dark"><i class="bi bi-people text-danger me-1"></i> Human Resources</div>
                                <div class="text-muted" style="font-size:10.5px;">People Operations</div>
                            </td>
                            <td class="text-center fw-bold">15</td>
                            <td class="text-center"><span class="score-chip score-chip-high">4.5 / 5.0</span></td>
                            <td class="text-center fw-bold text-success">92%</td>
                            <td class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle">100%</span></td>
                            <td class="text-end">
                                <a href="performance-department-report.php?dept=Human%20Resources" class="btn btn-xs btn-outline-success rounded-pill px-2 py-1">
                                    <i class="bi bi-arrow-right-circle me-1"></i> View Dept Report
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- 4. Section 3: EMPLOYEE PERFORMANCE HISTORY & MULTI-YEAR TREND (3-Year Profile) -->
<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <h5 class="fw-bold text-dark mb-1 font-display"><i class="bi bi-clock-history text-success me-2"></i>1. Employee Performance History & Multi-Year Trend</h5>
            <div class="text-muted small" style="font-size:12px;">Track 3-Year / 5-Year historical performance growth, KPI achievement rate, and approved final rating progression</div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <label class="form-label text-muted small mb-0 fw-bold"><i class="bi bi-person-bounding-box text-success me-1"></i>Select Employee Profile:</label>
            <select class="form-select form-select-sm border-success fw-bold text-dark" id="rptHistoryEmpSelect" style="width:230px;" onchange="renderEmployeeHistoryProfile(this.value)">
                <option value="Arun Kumar" selected>Arun Kumar (Senior Eng)</option>
                <option value="Amelia Curr">Amelia Curr (Design Lead)</option>
                <option value="Sanjay V">Sanjay V (Assoc Eng)</option>
                <option value="Daniel Martinez">Daniel Martinez (DevOps Lead)</option>
                <option value="Priya Sharma">Priya Sharma (Frontend Dev)</option>
            </select>
        </div>
    </div>

    <div class="row g-4 align-items-stretch" id="rptEmpHistoryContainer">
        <!-- Employee Summary Header Box -->
        <div class="col-12 col-lg-4">
            <div class="bg-light p-4 rounded-4 border h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="./assets/img/profile-1.jpg" id="histEmpAvatar" class="rounded-circle border" style="width:54px; height:54px; object-fit:cover;" alt="Emp">
                        <div>
                            <h5 class="fw-bold text-dark mb-0" id="histEmpName">Arun Kumar</h5>
                            <div class="text-muted small" id="histEmpRole">Senior Software Engineer</div>
                            <span class="badge bg-success-subtle text-success border border-success-subtle mt-1" id="histEmpDept">Engineering</span>
                        </div>
                    </div>
                    
                    <div class="p-3 bg-white rounded-3 border mb-3">
                        <div class="text-muted small mb-1 fw-bold">3-Year Growth Progression</div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small">Rating:</span>
                                <div class="fw-bold text-success fs-5">3.5 ➔ <span id="histLatestRating">4.5 / 5.0</span></div>
                            </div>
                            <div class="text-end">
                                <span class="text-muted small">KPI Trajectory:</span>
                                <div class="fw-bold text-primary fs-5">78% ➔ <span id="histLatestKpi">92%</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-success d-flex align-items-center gap-2 py-2 px-3 rounded-3 mb-0" style="font-size:12px;">
                        <i class="bi bi-graph-up-arrow fs-5 text-success"></i>
                        <div><strong>Top Performer Trajectory:</strong> Consistent year-on-year rating improvement of <strong>+1.0</strong> over 3 cycles.</div>
                    </div>
                </div>

                <div class="pt-3 border-top mt-3 text-muted small">
                    <i class="bi bi-shield-check text-success me-1"></i> Verified by HR Admin • Source: Final Approved Ratings
                </div>
            </div>
        </div>

        <!-- 3-Year Performance Trend History Table -->
        <div class="col-12 col-lg-8">
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0" style="font-size:13px;">
                    <thead class="table-light">
                        <tr>
                            <th>Performance Cycle / Year</th>
                            <th class="text-center">KPI Achievement (%)</th>
                            <th class="text-center">Self Rating</th>
                            <th class="text-center">Manager Rating</th>
                            <th class="text-center">HR Approved Final Rating</th>
                            <th class="text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody id="histTableBody">
                        <tr>
                            <td class="fw-bold text-dark">
                                <i class="bi bi-calendar-check text-success me-1"></i> FY25-26 Annual 360° Review (2026)
                            </td>
                            <td class="text-center fw-bold text-success">
                                92% <span class="badge bg-success-subtle text-success ms-1">+6%</span>
                            </td>
                            <td class="text-center fw-semibold text-secondary">4.2</td>
                            <td class="text-center fw-semibold text-primary">4.5</td>
                            <td class="text-center">
                                <span class="score-chip score-chip-high"><i class="bi bi-star-fill text-warning me-1"></i>4.5 / 5.0</span>
                            </td>
                            <td class="text-end">
                                <span class="status-capsule status-capsule-completed"><i class="bi bi-check-circle-fill me-1"></i> Approved</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-dark">
                                <i class="bi bi-calendar-check text-primary me-1"></i> FY24-25 Annual Review (2025)
                            </td>
                            <td class="text-center fw-bold text-primary">
                                86% <span class="badge bg-primary-subtle text-primary ms-1">+8%</span>
                            </td>
                            <td class="text-center fw-semibold text-secondary">4.0</td>
                            <td class="text-center fw-semibold text-primary">4.0</td>
                            <td class="text-center">
                                <span class="score-chip score-chip-good"><i class="bi bi-star-fill text-warning me-1"></i>4.0 / 5.0</span>
                            </td>
                            <td class="text-end">
                                <span class="status-capsule status-capsule-completed"><i class="bi bi-check-circle-fill me-1"></i> Approved</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-dark">
                                <i class="bi bi-calendar-check text-secondary me-1"></i> FY23-24 Annual Review (2024)
                            </td>
                            <td class="text-center fw-bold text-dark">
                                78%
                            </td>
                            <td class="text-center fw-semibold text-secondary">3.5</td>
                            <td class="text-center fw-semibold text-primary">3.5</td>
                            <td class="text-center">
                                <span class="score-chip score-chip-good"><i class="bi bi-star-fill text-warning me-1"></i>3.5 / 5.0</span>
                            </td>
                            <td class="text-end">
                                <span class="status-capsule status-capsule-completed"><i class="bi bi-check-circle-fill me-1"></i> Approved</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- Modal: Department Employee Drill-Down Modal -->
<div class="modal fade" id="deptDrillDownModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold text-dark" id="deptDrillModalTitle"><i class="bi bi-building text-success me-2"></i> Engineering - Employee Ratings Breakdown</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3 bg-light p-3 rounded-3 border">
                    <div>
                        <span class="text-muted small">Department:</span>
                        <strong class="text-dark d-block" id="deptModalName">Engineering</strong>
                    </div>
                    <div>
                        <span class="text-muted small">Headcount:</span>
                        <strong class="text-dark d-block text-center" id="deptModalCount">120 Employees</strong>
                    </div>
                    <div>
                        <span class="text-muted small">Avg Rating:</span>
                        <strong class="text-success d-block text-center" id="deptModalAvg">3.8 / 5.0</strong>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle mb-0" style="font-size:13px;">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Employee</th>
                                <th>Designation</th>
                                <th class="text-center">KPI %</th>
                                <th class="text-center">Manager Rating</th>
                                <th class="text-center">Final Approved Rating</th>
                            </tr>
                        </thead>
                        <tbody id="deptDrillBody">
                            <!-- Populated dynamically by JS -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="rptToast" class="rpt-toast">
    <i class="bi bi-info-circle-fill text-success fs-5"></i>
    <span id="rptToastMsg">Action completed successfully!</span>
</div>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/tabel.js"></script>

<script src="./assets/js/pages/performance-reports.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
