<?php include 'header.php'; ?>

 

 

<style>
    .rec-kpi {
        min-height: 112px;
        padding: 18px;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        background: var(--white);
        box-shadow: 0 4px 16px rgba(20, 30, 25, .04);
        transition: transform .2s ease;
    }

    .rec-kpi:hover {
        transform: translateY(-2px);
    }

    .rec-kpi .icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .rec-kpi .label {
        color: var(--ink-500);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 3px;
    }

    .rec-kpi .value {
        color: var(--ink-900);
        font-size: 22px;
        font-weight: 800;
    }

    .rec-kpi .sub {
        color: var(--ink-500);
        font-size: 11px;
        margin-top: 3px;
    }

    .status-badge-hired {
        color: #087a24;
        background: #e7f7eb;
        padding: 4px 10px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .status-badge-onboarding {
        color: #0284c7;
        background: #e0f2fe;
        padding: 4px 10px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .status-badge-waiting {
        color: #b56b00;
        background: #fff4d9;
        padding: 4px 10px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .status-badge-interviewing {
        color: #9333ea;
        background: #f3e8ff;
        padding: 4px 10px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .status-badge-offered {
        color: #2563eb;
        background: #eff6ff;
        padding: 4px 10px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Recruitment Analytics & Status Reports</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-bar-chart-line fs-6"></i>
            <span>Recruitment</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Recruitment Reports</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-secondary" onclick="window.print();">
            <i class="bi bi-printer me-1"></i> Print Report
        </button>
        <a href="linkedin-applications.php?action=download_zip" class="btn btn-outline-primary">
            <i class="bi bi-file-earmark-zip me-1"></i> Bulk Resumes (.zip)
        </a>
    </div>
</div>

<!-- Filter Card with Datepicker & Status Filter -->
<div class="card border-0 shadow-sm rounded-3 mb-3 p-3 bg-white">
    <div class="row g-2 align-items-end">
        <div class="col-lg-3 col-md-4">
            <label class="form-label fw-bold small mb-1"><i class="bi bi-calendar-range me-1 text-primary"></i> Date
                Filter Preset</label>
            <select class="form-select form-select-sm select2" id="datePresetSelect">
                <option value="all">All Dates</option>
                <option value="last_month" selected>Last Month Hired (Aug 2026)</option>
                <option value="this_month">This Month (Sep 2026)</option>
                <option value="last_30">Last 30 Days</option>
                <option value="custom">Custom Datepicker Range</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-3">
            <div class="date-picker">
                <label class="form-label fw-bold small mb-1">From Date (Datepicker)</label>
                <input type="text" class="date-input form-control" placeholder="DD-MM-YYYY" maxlength="10"
                    autocomplete="off" />
            </div>
        </div>
        <div class="col-lg-2 col-md-3">
            <div class="date-picker">
                <label class="form-label fw-bold small mb-1">To Date (Datepicker)</label>
                <input type="text" class="date-input form-control" placeholder="DD-MM-YYYY" maxlength="10"
                    autocomplete="off" />
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <label class="form-label fw-bold small mb-1"><i class="bi bi-funnel me-1 text-primary"></i> Employee
                Status</label>
            <select class="form-select form-select-sm select2" id="statusFilterSelect">
                <option value="all" selected>All Statuses (Hired, Onboarding, Waiting List)</option>
                <option value="Hired">🟢 Hired Employees (Last Month / Hired)</option>
                <option value="Onboarding">🚀 Onboarding Employees</option>
                <option value="Waiting List">⏳ Waiting-List Candidates</option>
                <option value="Interviewing">💬 Interviewing / Shortlisted</option>
                <option value="Offered">📝 Offer Extended</option>
            </select>
        </div>
        <div class="col-lg-2 col-md-6 d-flex gap-1">
            <button class="btn btn-sm btn-primary w-100" id="btnFilterApply"
                style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                <i class="bi bi-filter me-1"></i> Apply Filter
            </button>
            <button class="btn btn-sm btn-outline-secondary" id="btnFilterReset" title="Reset Filters">
                <i class="bi bi-arrow-counterclockwise"></i>
            </button>
        </div>
    </div>
</div>

<!-- Dynamic KPI Cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="rec-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e7f7eb;color:#087a24;"><i class="bi bi-check-circle-fill"></i></div>
            <div>
                <div class="label">Hired Employees</div>
                <div class="value" id="kpiHiredCount">3</div>
                <div class="sub" id="kpiHiredSub">In selected range</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="rec-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-rocket-takeoff-fill"></i></div>
            <div>
                <div class="label">Onboarding Employees</div>
                <div class="value" id="kpiOnboardingCount">3</div>
                <div class="sub">Active induction program</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="rec-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-clock-history"></i></div>
            <div>
                <div class="label">Waiting-List Candidates</div>
                <div class="value" id="kpiWaitingCount">3</div>
                <div class="sub">Reserve candidate pool</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="rec-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#f3e8ff;color:#9333ea;"><i class="bi bi-person-lines-fill"></i></div>
            <div>
                <div class="label">Total Records Found</div>
                <div class="value" id="kpiTotalRecords">11</div>
                <div class="sub">Matching filter criteria</div>
            </div>
        </div>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="recruitment-candidate-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i
                    class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
            <span class="badge bg-light text-muted border px-2 py-1" id="filterStatusBadge">Filtered: Last Month Hired
                (Aug 2026)</span>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search candidate, job, department..."
                id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="recruitmentReportTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Candidate Name</th>
                    <th class="text-nowrap">Email Address</th>
                    <th class="text-nowrap">Applied Position & Dept</th>
                    <th class="text-nowrap">Sourcing Channel</th>
                    <th class="text-nowrap">Recruitment Status</th>
                    <th class="text-nowrap">Hired / Action Date</th>
                    <th class="text-nowrap">Reporting Manager / Facilitator</th>
                    <th class="text-nowrap text-end">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <!-- Row 1: Last Month Hired -->
                <tr class="report-row" data-id="1" data-status="Hired" data-date="2026-08-15" data-dept="Design">
                    <td class="row-sno">1</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Rahul Verma</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>rahul.v@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">Senior UI/UX Designer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">Design</span>
                    </td>
                    <td><span class="badge text-white" style="background:#0077b5;font-size:10px;"><i
                                class="bi bi-linkedin me-1"></i>LinkedIn</span></td>
                    <td><span class="status-badge-hired"><i class="bi bi-circle-fill" style="font-size:7px;"></i>
                            Hired</span></td>
                    <td class="fw-bold text-dark hired-date">15-Aug-2026</td>
                    <td>David Anderson (Design Lead)</td>
                    <td class="text-end">
                        <a href="linkedin-applications.php?action=download_zip&ids=LNK-2026-001"
                            class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Download Resume">
                            <i class="bi bi-file-earmark-zip"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 2: Last Month Hired -->
                <tr class="report-row" data-id="2" data-status="Hired" data-date="2026-08-22" data-dept="Engineering">
                    <td class="row-sno">2</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Ananya Sundaram</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>ananya.s@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">Lead Frontend Engineer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">Engineering</span>
                    </td>
                    <td><span class="badge text-white" style="background:#087a24;font-size:10px;"><i
                                class="bi bi-building me-1"></i>Careers Site</span></td>
                    <td><span class="status-badge-hired"><i class="bi bi-circle-fill" style="font-size:7px;"></i>
                            Hired</span></td>
                    <td class="fw-bold text-dark hired-date">22-Aug-2026</td>
                    <td>Santhosh Kumar (Tech Lead)</td>
                    <td class="text-end">
                        <a href="linkedin-applications.php?action=download_zip&ids=LNK-2026-002"
                            class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Download Resume">
                            <i class="bi bi-file-earmark-zip"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 3: Last Month Hired -->
                <tr class="report-row" data-id="3" data-status="Hired" data-date="2026-08-28" data-dept="Engineering">
                    <td class="row-sno">3</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Karthik V</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>karthik.v@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">Backend Tech Lead</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">Engineering</span>
                    </td>
                    <td><span class="badge text-white" style="background:#005cbb;font-size:10px;"><i
                                class="bi bi-briefcase-fill me-1"></i>Naukri</span></td>
                    <td><span class="status-badge-hired"><i class="bi bi-circle-fill" style="font-size:7px;"></i>
                            Hired</span></td>
                    <td class="fw-bold text-dark hired-date">28-Aug-2026</td>
                    <td>Ramesh (Engineering Director)</td>
                    <td class="text-end">
                        <a href="linkedin-applications.php?action=download_zip&ids=LNK-2026-003"
                            class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Download Resume">
                            <i class="bi bi-file-earmark-zip"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 4: Onboarding Employee -->
                <tr class="report-row" data-id="4" data-status="Onboarding" data-date="2026-09-05"
                    data-dept="Engineering">
                    <td class="row-sno">4</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">David Martinez</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>david.m@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">IT Security Specialist</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">Engineering</span>
                    </td>
                    <td><span class="badge text-white" style="background:#0077b5;font-size:10px;"><i
                                class="bi bi-linkedin me-1"></i>LinkedIn</span></td>
                    <td><span class="status-badge-onboarding"><i class="bi bi-rocket-takeoff"
                                style="font-size:7px;"></i> Onboarding</span></td>
                    <td class="fw-bold text-dark hired-date">05-Sep-2026</td>
                    <td>Daniel Martinez (IT Head)</td>
                    <td class="text-end">
                        <a href="onboarding-orientation.php" class="btn btn-sm btn-outline-primary"
                            data-bs-toggle="tooltip" title="View Onboarding Induction">
                            <i class="bi bi-calendar-check"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 5: Onboarding Employee -->
                <tr class="report-row" data-id="5" data-status="Onboarding" data-date="2026-09-10"
                    data-dept="Engineering">
                    <td class="row-sno">5</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Sarah Mitchell</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>sarah.m@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">Senior DevOps Engineer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">Engineering</span>
                    </td>
                    <td><span class="badge text-white" style="background:#2164f3;font-size:10px;"><i
                                class="bi bi-globe me-1"></i>Indeed</span></td>
                    <td><span class="status-badge-onboarding"><i class="bi bi-rocket-takeoff"
                                style="font-size:7px;"></i> Onboarding</span></td>
                    <td class="fw-bold text-dark hired-date">10-Sep-2026</td>
                    <td>Alex Turner (Cloud Manager)</td>
                    <td class="text-end">
                        <a href="onboarding-orientation.php" class="btn btn-sm btn-outline-primary"
                            data-bs-toggle="tooltip" title="View Onboarding Induction">
                            <i class="bi bi-calendar-check"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 6: Onboarding Employee -->
                <tr class="report-row" data-id="6" data-status="Onboarding" data-date="2026-09-12" data-dept="Finance">
                    <td class="row-sno">6</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Emily Clarke</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>emily.c@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">Financial Analyst</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">Finance</span>
                    </td>
                    <td><span class="badge text-white" style="background:#087a24;font-size:10px;"><i
                                class="bi bi-building me-1"></i>Careers Site</span></td>
                    <td><span class="status-badge-onboarding"><i class="bi bi-rocket-takeoff"
                                style="font-size:7px;"></i> Onboarding</span></td>
                    <td class="fw-bold text-dark hired-date">12-Sep-2026</td>
                    <td>Suresh Kumar (Finance Lead)</td>
                    <td class="text-end">
                        <a href="onboarding-orientation.php" class="btn btn-sm btn-outline-primary"
                            data-bs-toggle="tooltip" title="View Onboarding Induction">
                            <i class="bi bi-calendar-check"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 7: Waiting List Candidate -->
                <tr class="report-row" data-id="7" data-status="Waiting List" data-date="2026-08-29"
                    data-dept="iOS Dev">
                    <td class="row-sno">7</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Priya Ramakrishnan</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>priya.ram@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">iOS App Developer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">iOS Dev</span>
                    </td>
                    <td><span class="badge text-white" style="background:#0077b5;font-size:10px;"><i
                                class="bi bi-linkedin me-1"></i>LinkedIn</span></td>
                    <td><span class="status-badge-waiting"><i class="bi bi-clock-history" style="font-size:7px;"></i>
                            Waiting List</span></td>
                    <td class="fw-bold text-dark hired-date">29-Aug-2026</td>
                    <td>Anitha R (Mobile Tech Lead)</td>
                    <td class="text-end">
                        <a href="linkedin-applications.php?action=download_zip&ids=LNK-2026-003"
                            class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Download Resume">
                            <i class="bi bi-file-earmark-zip"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 8: Waiting List Candidate -->
                <tr class="report-row" data-id="8" data-status="Waiting List" data-date="2026-09-02"
                    data-dept="Engineering">
                    <td class="row-sno">8</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Vikramaditya Rao</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>vikram.rao@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">Cloud Infrastructure Architect</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">Engineering</span>
                    </td>
                    <td><span class="badge text-white" style="background:#005cbb;font-size:10px;"><i
                                class="bi bi-briefcase-fill me-1"></i>Naukri</span></td>
                    <td><span class="status-badge-waiting"><i class="bi bi-clock-history" style="font-size:7px;"></i>
                            Waiting List</span></td>
                    <td class="fw-bold text-dark hired-date">02-Sep-2026</td>
                    <td>Karthik V (Backend Tech Lead)</td>
                    <td class="text-end">
                        <a href="linkedin-applications.php?action=download_zip&ids=LNK-2026-002"
                            class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Download Resume">
                            <i class="bi bi-file-earmark-zip"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 9: Waiting List Candidate -->
                <tr class="report-row" data-id="9" data-status="Waiting List" data-date="2026-09-08" data-dept="HR">
                    <td class="row-sno">9</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Kavitha Raman</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>kavitha.r@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">HR Operations Partner</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">HR</span>
                    </td>
                    <td><span class="badge text-white" style="background:#087a24;font-size:10px;"><i
                                class="bi bi-building me-1"></i>Careers Site</span></td>
                    <td><span class="status-badge-waiting"><i class="bi bi-clock-history" style="font-size:7px;"></i>
                            Waiting List</span></td>
                    <td class="fw-bold text-dark hired-date">08-Sep-2026</td>
                    <td>Meena S (HR Operations Lead)</td>
                    <td class="text-end">
                        <a href="linkedin-applications.php" class="btn btn-sm btn-outline-secondary"
                            data-bs-toggle="tooltip" title="View Profile">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 10: Offer Extended -->
                <tr class="report-row" data-id="10" data-status="Offered" data-date="2026-09-14" data-dept="Marketing">
                    <td class="row-sno">10</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Rajesh Kumar</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>rajesh.k@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">Performance Marketing Specialist</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">Marketing</span>
                    </td>
                    <td><span class="badge text-white" style="background:#0077b5;font-size:10px;"><i
                                class="bi bi-linkedin me-1"></i>LinkedIn</span></td>
                    <td><span class="status-badge-offered"><i class="bi bi-file-earmark-check"
                                style="font-size:7px;"></i> Offer Extended</span></td>
                    <td class="fw-bold text-dark hired-date">14-Sep-2026</td>
                    <td>Priya S (Marketing Lead)</td>
                    <td class="text-end">
                        <a href="offer-management.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                            title="View Offer Management">
                            <i class="bi bi-file-earmark-text"></i>
                        </a>
                    </td>
                </tr>

                <!-- Row 11: Interviewing -->
                <tr class="report-row" data-id="11" data-status="Interviewing" data-date="2026-09-15"
                    data-dept="Engineering">
                    <td class="row-sno">11</td>
                    <td>
                        <div class="fw-bold text-dark candidate-name">Sneha Reddy</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>sneha.r@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark job-title">Full Stack Engineer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10px;">Engineering</span>
                    </td>
                    <td><span class="badge text-white" style="background:#2164f3;font-size:10px;"><i
                                class="bi bi-globe me-1"></i>Indeed</span></td>
                    <td><span class="status-badge-interviewing"><i class="bi bi-chat-dots" style="font-size:7px;"></i>
                            Interviewing</span></td>
                    <td class="fw-bold text-dark hired-date">15-Sep-2026</td>
                    <td>Santhosh Kumar (Tech Lead)</td>
                    <td class="text-end">
                        <a href="interview-schedule.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                            title="View Interview Schedule">
                            <i class="bi bi-calendar-event"></i>
                        </a>
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
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong
                    id="pgEnd">11</strong> of <strong id="pgTotal">11</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<script src="./assets/js/pages/recruitment-report.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>

 
