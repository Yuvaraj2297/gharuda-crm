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

<script>
    function showRptToast(msg) {
        const toast = document.getElementById('rptToast');
        const msgEl = document.getElementById('rptToastMsg');
        if (toast && msgEl) {
            msgEl.innerText = msg;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3500);
        }
    }

    // Master HR Approved Evaluation Dataset
    const masterEvaluations = [
        { year: '2026', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Arun Kumar', kpi: 92, self: 4.2, mgrRating: 4.5, final: 4.5, status: 'Approved' },
        { year: '2026', cycle: 'probation', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Karthik Raja', emp: 'Sanjay V', kpi: 88, self: 4.6, mgrRating: 4.4, final: 4.5, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Manoj Kumar', kpi: 75, self: 3.5, mgrRating: 3.8, final: 3.8, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Vikram Sethi', kpi: 95, self: 4.8, mgrRating: 4.8, final: 4.8, status: 'Approved' },
        { year: '2026', cycle: 'q1', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Deepa N', kpi: 84, self: 4.0, mgrRating: 4.1, final: 4.1, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Rajesh Sharma', emp: 'Amelia Curr', kpi: 96, self: 4.9, mgrRating: 4.8, final: 4.8, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Amelia Curr', emp: 'Priya Sharma', kpi: 85, self: 4.2, mgrRating: 4.0, final: 4.1, status: 'Approved' },
        { year: '2026', cycle: 'q1', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Amelia Curr', emp: 'Rohan Mehra', kpi: 90, self: 4.2, mgrRating: 4.3, final: 4.3, status: 'Approved' },
        { year: '2026', cycle: 'q1', dept: 'Infrastructure', desig: 'DevOps Lead', mgr: 'Rajesh Sharma', emp: 'Daniel Martinez', kpi: 94, self: 4.8, mgrRating: 4.7, final: 4.65, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Infrastructure', desig: 'DevOps Lead', mgr: 'Daniel Martinez', emp: 'Karthik Raja', kpi: 89, self: 4.2, mgrRating: 4.4, final: 4.4, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Quality Assurance', desig: 'QA Engineer', mgr: 'Karthik Raja', emp: 'Swati P', kpi: 82, self: 3.8, mgrRating: 3.9, final: 3.9, status: 'Approved' },
        { year: '2026', cycle: 'probation', dept: 'Quality Assurance', desig: 'QA Engineer', mgr: 'Karthik Raja', emp: 'Anand K', kpi: 78, self: 3.5, mgrRating: 3.6, final: 3.6, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Human Resources', desig: 'Design Lead', mgr: 'Divya Ramesh', emp: 'Divya Ramesh', kpi: 95, self: 4.9, mgrRating: 4.9, final: 4.9, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Human Resources', desig: 'Design Lead', mgr: 'Divya Ramesh', emp: 'Kavitha M', kpi: 90, self: 4.4, mgrRating: 4.5, final: 4.5, status: 'Approved' },
        
        // 2025 evaluations
        { year: '2025', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Arun Kumar', kpi: 86, self: 4.0, mgrRating: 4.0, final: 4.0, status: 'Approved' },
        { year: '2025', cycle: 'annual', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Rajesh Sharma', emp: 'Amelia Curr', kpi: 90, self: 4.5, mgrRating: 4.5, final: 4.5, status: 'Approved' },
        { year: '2025', cycle: 'annual', dept: 'Infrastructure', desig: 'DevOps Lead', mgr: 'Rajesh Sharma', emp: 'Daniel Martinez', kpi: 88, self: 4.4, mgrRating: 4.3, final: 4.3, status: 'Approved' },
        
        // 2024 evaluations
        { year: '2024', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Arun Kumar', kpi: 78, self: 3.5, mgrRating: 3.5, final: 3.5, status: 'Approved' },
        { year: '2024', cycle: 'annual', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Rajesh Sharma', emp: 'Amelia Curr', kpi: 84, self: 4.2, mgrRating: 4.2, final: 4.2, status: 'Approved' }
    ];

    const empHistoryData = {
        'Arun Kumar': {
            role: 'Senior Software Engineer',
            dept: 'Engineering',
            avatar: './assets/img/profile-1.jpg',
            badgeText: '<strong>Top Performer Trajectory:</strong> Consistent year-on-year rating improvement of <strong>+1.0</strong> over 3 cycles.',
            rows: [
                { cycle: 'FY25-26 Annual 360° Review (2026)', kpi: '92%', kpiBadge: '+6%', self: '4.2', mgr: '4.5', final: '4.5 / 5.0', chip: 'score-chip-high' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '86%', kpiBadge: '+8%', self: '4.0', mgr: '4.0', final: '4.0 / 5.0', chip: 'score-chip-good' },
                { cycle: 'FY23-24 Annual Review (2024)', kpi: '78%', kpiBadge: '', self: '3.5', mgr: '3.5', final: '3.5 / 5.0', chip: 'score-chip-good' }
            ]
        },
        'Amelia Curr': {
            role: 'Design Lead',
            dept: 'UI/UX Design',
            avatar: './assets/img/profile-1.jpg',
            badgeText: '<strong>Outstanding Design Leadership:</strong> Achieved 96% KPI completion rate & 4.8 final HR approved rating.',
            rows: [
                { cycle: 'FY25-26 Annual 360° Review (2026)', kpi: '96%', kpiBadge: '+6%', self: '4.9', mgr: '4.8', final: '4.8 / 5.0', chip: 'score-chip-high' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '90%', kpiBadge: '+6%', self: '4.5', mgr: '4.5', final: '4.5 / 5.0', chip: 'score-chip-high' },
                { cycle: 'FY23-24 Annual Review (2024)', kpi: '84%', kpiBadge: '', self: '4.2', mgr: '4.2', final: '4.2 / 5.0', chip: 'score-chip-good' }
            ]
        },
        'Sanjay V': {
            role: 'Associate Software Engineer',
            dept: 'Engineering',
            avatar: './assets/img/profile-1.jpg',
            badgeText: '<strong>Rapid Career Progression:</strong> Promoted from Associate to Software Engineer in 2 years with 4.5 rating.',
            rows: [
                { cycle: 'FY25-26 Probation Review (2026)', kpi: '88%', kpiBadge: '+8%', self: '4.6', mgr: '4.4', final: '4.5 / 5.0', chip: 'score-chip-high' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '80%', kpiBadge: '+5%', self: '4.0', mgr: '4.0', final: '4.0 / 5.0', chip: 'score-chip-good' },
                { cycle: 'FY23-24 Intern Review (2024)', kpi: '75%', kpiBadge: '', self: '3.8', mgr: '3.8', final: '3.8 / 5.0', chip: 'score-chip-good' }
            ]
        },
        'Daniel Martinez': {
            role: 'DevOps & Cloud Lead',
            dept: 'Infrastructure',
            avatar: './assets/img/profile-2.jpg',
            badgeText: '<strong>High Infrastructure Reliability:</strong> 99.99% uptime achieved across multi-cloud infrastructure.',
            rows: [
                { cycle: 'FY25-26 Leadership Check-in (2026)', kpi: '94%', kpiBadge: '+6%', self: '4.8', mgr: '4.7', final: '4.65 / 5.0', chip: 'score-chip-active' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '88%', kpiBadge: '+6%', self: '4.4', mgr: '4.3', final: '4.3 / 5.0', chip: 'score-chip-good' },
                { cycle: 'FY23-24 Annual Review (2024)', kpi: '82%', kpiBadge: '', self: '4.0', mgr: '4.0', final: '4.0 / 5.0', chip: 'score-chip-good' }
            ]
        },
        'Priya Sharma': {
            role: 'Frontend Developer',
            dept: 'UI/UX Design',
            avatar: './assets/img/profile-3.jpg',
            badgeText: '<strong>Consistent Skill Expansion:</strong> Mastered React.js & automated Cypress end-to-end testing.',
            rows: [
                { cycle: 'FY25-26 Annual Review (2026)', kpi: '85%', kpiBadge: '+7%', self: '4.2', mgr: '4.0', final: '4.1 / 5.0', chip: 'score-chip-warning' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '78%', kpiBadge: '+6%', self: '3.8', mgr: '3.8', final: '3.8 / 5.0', chip: 'score-chip-good' },
                { cycle: 'FY23-24 Probation Review (2024)', kpi: '72%', kpiBadge: '', self: '3.6', mgr: '3.6', final: '3.6 / 5.0', chip: 'score-chip-good' }
            ]
        }
    };

    function renderEmployeeHistoryProfile(empName) {
        const data = empHistoryData[empName] || empHistoryData['Arun Kumar'];
        const nameEl = document.getElementById('histEmpName');
        const roleEl = document.getElementById('histEmpRole');
        const deptEl = document.getElementById('histEmpDept');
        const avatarEl = document.getElementById('histEmpAvatar');
        const ratingEl = document.getElementById('histLatestRating');
        const kpiEl = document.getElementById('histLatestKpi');
        const badgeTextEl = document.getElementById('histEmpBadgeText');
        const tbody = document.getElementById('histTableBody');
        const selectEl = document.getElementById('rptHistoryEmpSelect');

        if (selectEl && selectEl.value !== empName) {
            selectEl.value = empName;
        }

        if (nameEl) nameEl.innerText = empName;
        if (roleEl) roleEl.innerText = data.role;
        if (deptEl) deptEl.innerText = data.dept;
        if (avatarEl && data.avatar) avatarEl.src = data.avatar;
        if (ratingEl) ratingEl.innerText = data.rows[0].final;
        if (kpiEl) kpiEl.innerText = data.rows[0].kpi;
        if (badgeTextEl && data.badgeText) badgeTextEl.innerHTML = data.badgeText;

        if (tbody) {
            tbody.innerHTML = data.rows.map(r => `
                <tr>
                    <td class="fw-bold text-dark">
                        <i class="bi bi-calendar-check text-success me-1"></i> ${r.cycle}
                    </td>
                    <td class="text-center fw-bold text-success">
                        ${r.kpi} ${r.kpiBadge ? `<span class="badge bg-success-subtle text-success ms-1">${r.kpiBadge}</span>` : ''}
                    </td>
                    <td class="text-center fw-semibold text-secondary">${r.self}</td>
                    <td class="text-center fw-semibold text-primary">${r.mgr}</td>
                    <td class="text-center">
                        <span class="score-chip ${r.chip}"><i class="bi bi-star-fill text-warning me-1"></i>${r.final}</span>
                    </td>
                    <td class="text-end">
                        <span class="status-capsule status-capsule-completed"><i class="bi bi-check-circle-fill me-1"></i> Approved</span>
                    </td>
                </tr>
            `).join('');
        }
    }

    const deptEmployeesData = {
        'Engineering': [
            { name: 'Arun Kumar', role: 'Senior Software Engineer', kpi: '92%', mgr: '4.5', final: '4.5 / 5.0', chip: 'score-chip-high' },
            { name: 'Sanjay V', role: 'Associate Software Engineer', kpi: '88%', mgr: '4.4', final: '4.5 / 5.0', chip: 'score-chip-high' },
            { name: 'Manoj Kumar', role: 'Junior Software Engineer', kpi: '75%', mgr: '3.8', final: '3.8 / 5.0', chip: 'score-chip-good' },
            { name: 'Vikram Sethi', role: 'Lead Architect', kpi: '95%', mgr: '4.8', final: '4.8 / 5.0', chip: 'score-chip-high' },
            { name: 'Deepa N', role: 'Backend Engineer', kpi: '84%', mgr: '4.1', final: '4.1 / 5.0', chip: 'score-chip-good' }
        ],
        'UI/UX Design': [
            { name: 'Amelia Curr', role: 'Design Lead', kpi: '96%', mgr: '4.8', final: '4.8 / 5.0', chip: 'score-chip-high' },
            { name: 'Priya Sharma', role: 'Frontend Developer', kpi: '85%', mgr: '4.0', final: '4.1 / 5.0', chip: 'score-chip-warning' },
            { name: 'Rohan Mehra', role: 'UI Specialist', kpi: '90%', mgr: '4.3', final: '4.3 / 5.0', chip: 'score-chip-good' }
        ],
        'Infrastructure': [
            { name: 'Daniel Martinez', role: 'DevOps & Cloud Lead', kpi: '94%', mgr: '4.7', final: '4.65 / 5.0', chip: 'score-chip-active' },
            { name: 'Karthik Raja', role: 'Systems Admin', kpi: '89%', mgr: '4.4', final: '4.4 / 5.0', chip: 'score-chip-good' }
        ],
        'Quality Assurance': [
            { name: 'Swati P', role: 'QA Lead', kpi: '82%', mgr: '3.9', final: '3.9 / 5.0', chip: 'score-chip-good' },
            { name: 'Anand K', role: 'Automation Engineer', kpi: '78%', mgr: '3.6', final: '3.6 / 5.0', chip: 'score-chip-good' }
        ],
        'Human Resources': [
            { name: 'Divya Ramesh', role: 'HR Admin', kpi: '95%', mgr: '4.9', final: '4.9 / 5.0', chip: 'score-chip-high' },
            { name: 'Kavitha M', role: 'Talent Specialist', kpi: '90%', mgr: '4.5', final: '4.5 / 5.0', chip: 'score-chip-high' }
        ]
    };

    function openDeptDrillDownModal(deptName) {
        const titleEl = document.getElementById('deptDrillModalTitle');
        const nameEl = document.getElementById('deptModalName');
        const countEl = document.getElementById('deptModalCount');
        const avgEl = document.getElementById('deptModalAvg');
        const bodyEl = document.getElementById('deptDrillBody');

        const list = deptEmployeesData[deptName] || deptEmployeesData['Engineering'];

        if (titleEl) titleEl.innerHTML = `<i class="bi bi-building text-success me-2"></i> ${deptName} - Employee Ratings Breakdown`;
        if (nameEl) nameEl.innerText = deptName;
        if (countEl) countEl.innerText = list.length + ' Employees Listed';

        let total = 0;
        list.forEach(e => total += parseFloat(e.final));
        const avg = (total / list.length).toFixed(1);
        if (avgEl) avgEl.innerText = avg + ' / 5.0';

        if (bodyEl) {
            bodyEl.innerHTML = list.map((emp, idx) => `
                <tr>
                    <td>${idx + 1}</td>
                    <td class="fw-bold text-dark">${emp.name}</td>
                    <td><span class="badge bg-light text-dark border">${emp.role}</span></td>
                    <td class="text-center fw-bold text-success">${emp.kpi}</td>
                    <td class="text-center fw-bold text-primary">${emp.mgr}</td>
                    <td class="text-center">
                        <span class="score-chip ${emp.chip}"><i class="bi bi-star-fill text-warning me-1"></i>${emp.final}</span>
                    </td>
                </tr>
            `).join('');
        }

        $('#deptDrillDownModal').modal('show');
    }

    // Dynamic Real-time Calculation Engine
    function applyAnalyticsFilters() {
        const year = document.getElementById('rptFilterYear') ? document.getElementById('rptFilterYear').value : 'all';
        const cycle = document.getElementById('rptFilterCycle') ? document.getElementById('rptFilterCycle').value : 'all';
        const dept = document.getElementById('rptFilterDept') ? document.getElementById('rptFilterDept').value : 'all';
        const desig = document.getElementById('rptFilterDesig') ? document.getElementById('rptFilterDesig').value : 'all';
        const mgr = document.getElementById('rptFilterMgr') ? document.getElementById('rptFilterMgr').value : 'all';
        const emp = document.getElementById('rptFilterEmp') ? document.getElementById('rptFilterEmp').value : 'all';

        // Filter evaluations dataset
        let filtered = masterEvaluations.filter(item => {
            if (year !== 'all' && item.year !== year) return false;
            if (cycle !== 'all' && item.cycle !== cycle) return false;
            if (dept !== 'all' && item.dept !== dept) return false;
            if (desig !== 'all' && item.desig !== desig) return false;
            if (mgr !== 'all' && item.mgr !== mgr) return false;
            if (emp !== 'all' && item.emp !== emp) return false;
            return true;
        });

        // Fallback to full master if overly strict filter yields empty
        if (filtered.length === 0) {
            filtered = masterEvaluations;
        }

        // Re-calculate KPI Metrics
        const totalEmp = filtered.length * 9; // Scaling factor to mimic company wide numbers
        const completed = Math.round(totalEmp * 0.90);
        const pending = totalEmp - completed;
        
        let sumRating = 0;
        let sumKpi = 0;
        filtered.forEach(item => {
            sumRating += item.final;
            sumKpi += item.kpi;
        });

        const avgRating = (sumRating / filtered.length).toFixed(1);
        const avgKpi = Math.round(sumKpi / filtered.length);

        // Update KPI Card UI
        const kpiEmpEl = document.getElementById('rptKpiTotalEmp');
        const kpiCompEl = document.getElementById('rptKpiCompleted');
        const kpiPendEl = document.getElementById('rptKpiPending');
        const kpiRatingEl = document.getElementById('rptKpiAvgRating');
        const kpiGoalEl = document.getElementById('rptKpiAvgGoal');

        if (kpiEmpEl) kpiEmpEl.innerText = totalEmp;
        if (kpiCompEl) kpiCompEl.innerHTML = `${completed} <span style="font-size:12px; font-weight:600; color:#15803d;">(90%)</span>`;
        if (kpiPendEl) kpiPendEl.innerHTML = `${pending} <span style="font-size:12px; font-weight:600; color:#b56b00;">(10%)</span>`;
        if (kpiRatingEl) kpiRatingEl.innerHTML = `${avgRating} <span style="font-size:12px; font-weight:600; color:#64748b;">/ 5.0</span>`;
        if (kpiGoalEl) kpiGoalEl.innerText = avgKpi + '%';

        // Recalculate Rating Bell Curve Distribution
        let r5 = 0, r4 = 0, r3 = 0, r2 = 0, r1 = 0;
        filtered.forEach(item => {
            if (item.final >= 4.5) r5++;
            else if (item.final >= 4.0) r4++;
            else if (item.final >= 3.5) r3++;
            else if (item.final >= 3.0) r2++;
            else r1++;
        });

        const totalFiltered = filtered.length;
        const p5 = Math.round((r5 / totalFiltered) * 100);
        const p4 = Math.round((r4 / totalFiltered) * 100);
        const p3 = Math.round((r3 / totalFiltered) * 100);
        const p2 = Math.round((r2 / totalFiltered) * 100);
        const p1 = Math.max(0, 100 - (p5 + p4 + p3 + p2));

        const distCountEl = document.getElementById('rptRatingDistCount');
        if (distCountEl) distCountEl.innerText = `${completed} Approved Reviews`;

        const distBarEl = document.getElementById('rptRatingDistBar');
        if (distBarEl) {
            distBarEl.innerHTML = `
                <div class="progress-bar bg-success" style="width: ${p5}%;" title="Rating 5: ${p5}%">5★ (${p5}%)</div>
                <div class="progress-bar bg-info" style="width: ${p4}%;" title="Rating 4: ${p4}%">4★ (${p4}%)</div>
                <div class="progress-bar bg-primary" style="width: ${p3}%;" title="Rating 3: ${p3}%">3★ (${p3}%)</div>
                <div class="progress-bar bg-warning" style="width: ${p2}%;" title="Rating 2: ${p2}%">2★ (${p2}%)</div>
                <div class="progress-bar bg-danger" style="width: ${p1}%;" title="Rating 1: ${p1}%">1★</div>
            `;
        }

        const distBodyEl = document.getElementById('rptRatingDistBody');
        if (distBodyEl) {
            distBodyEl.innerHTML = `
                <tr>
                    <td><span class="badge bg-success-subtle text-success border border-success-subtle fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 5 (Outstanding)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p5/100))}</td>
                    <td class="text-center fw-bold text-success">${p5}%</td>
                    <td class="text-end" style="width: 110px;"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-success" style="width: ${p5}%;"></div></div></td>
                </tr>
                <tr>
                    <td><span class="badge bg-info-subtle text-info border border-info-subtle fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 4 (Exceeds)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p4/100))}</td>
                    <td class="text-center fw-bold text-info">${p4}%</td>
                    <td class="text-end"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-info" style="width: ${p4}%;"></div></div></td>
                </tr>
                <tr>
                    <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 3 (Meets Expectations)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p3/100))}</td>
                    <td class="text-center fw-bold text-primary">${p3}%</td>
                    <td class="text-end"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-primary" style="width: ${p3}%;"></div></div></td>
                </tr>
                <tr>
                    <td><span class="badge bg-warning-subtle text-dark border border-warning fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 2 (Needs Improvement)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p2/100))}</td>
                    <td class="text-center fw-bold text-warning">${p2}%</td>
                    <td class="text-end"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-warning" style="width: ${p2}%;"></div></div></td>
                </tr>
                <tr>
                    <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 1 (Unsatisfactory)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p1/100))}</td>
                    <td class="text-center fw-bold text-danger">${p1}%</td>
                    <td class="text-end"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-danger" style="width: ${p1}%;"></div></div></td>
                </tr>
            `;
        }

        // Sync employee history profile view
        if (emp !== 'all') {
            renderEmployeeHistoryProfile(emp);
        }

        showRptToast(`📊 Performance Analytics synchronized! Filters active: Dept [${dept.toUpperCase()}] • Cycle [${cycle.toUpperCase()}] • Employee [${emp}]`);
    }

    // Export Handler (Excel CSV Download Blob & PDF Print View)
    function exportAnalyticsReport(format) {
        if (format === 'Excel') {
            const headers = ['Year', 'Cycle', 'Department', 'Designation', 'Manager', 'Employee', 'KPI Achievement (%)', 'Self Rating', 'Manager Rating', 'HR Approved Final Rating', 'Status'];
            const rows = masterEvaluations.map(e => [
                e.year,
                e.cycle.toUpperCase(),
                `"${e.dept}"`,
                `"${e.desig}"`,
                `"${e.mgr}"`,
                `"${e.emp}"`,
                `${e.kpi}%`,
                e.self,
                e.mgrRating,
                e.final,
                e.status
            ]);

            const csvContent = 'data:text/csv;charset=utf-8,' + [headers.join(','), ...rows.map(r => r.join(','))].join('\n');
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', `Gharuda_HRMS_Performance_Analytics_Report_${new Date().toISOString().slice(0, 10)}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            showRptToast('📥 Excel Analytics dataset generated & downloaded successfully!');
        } else if (format === 'PDF') {
            showRptToast('📄 Preparing PDF Analytics print layout...');
            setTimeout(() => {
                window.print();
            }, 500);
        }
    }

    // Initial render on page load
    $(document).ready(function() {
        renderEmployeeHistoryProfile('Arun Kumar');
    });
</script>

<?php include 'footer.php'; ?>
