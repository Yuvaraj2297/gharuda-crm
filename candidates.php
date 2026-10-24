<?php include 'header.php'; ?>

 

<style>
    .stage-tab-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 999px;
        background: #f1f5f9;
        color: var(--ink-700);
        font-size: 12.5px;
        font-weight: 700;
        text-decoration: none;
        border: 1px solid transparent;
        transition: all .2s ease;
        cursor: pointer;
    }
    .stage-tab-pill:hover {
        background: #e2e8f0;
        color: var(--ink-900);
    }
    .stage-tab-pill.active {
        background: var(--primary, #087a24);
        color: #fff;
    }
    .stage-tab-pill .count {
        background: rgba(0, 0, 0, 0.08);
        border-radius: 99px;
        padding: 2px 7px;
        font-size: 11px;
    }
    .stage-tab-pill.active .count {
        background: rgba(255, 255, 255, 0.25);
        color: #fff;
    }

    .rating-stars { color: #f59e0b; font-size: 13px; letter-spacing: 1px; }

    .stage-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 99px;
    }
    .stage-sourced { background: #f1f5f9; color: #475569; }
    .stage-screening { background: #e0f2fe; color: #0284c7; }
    .stage-tech { background: #fef3c7; color: #d97706; }
    .stage-hr { background: #f3e8ff; color: #9333ea; }
    .stage-offered { background: #dbeafe; color: #1e40af; }
    .stage-hired { background: #dcfce7; color: #15803d; }
    .stage-rejected { background: #fee2e2; color: #b91c1c; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Candidate ATS Pipeline</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-people fs-6 text-success"></i>
            <span>Recruitment</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Candidate Pipeline</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <!-- <a href="linkedin-applications.php" class="btn btn-outline-secondary">
            <i class="bi bi-share me-1 text-success"></i> Social & Web Applications
        </a>
        <a href="interview-schedule.php" class="btn btn-outline-success" style="color:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-calendar2-check me-1"></i> Interview Calendar
        </a> -->
        <!-- <button class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" type="button" data-bs-toggle="modal" data-bs-target="#addCandidateModal">
            <i class="bi bi-person-plus me-1"></i> Add Candidate
        </button> -->
    </div>
</div>

<!-- Pipeline Stage Navigation Tabs -->
<div class="d-flex align-items-center gap-2 flex-wrap mb-3" id="stageTabsWrap">
    <button class="stage-tab-pill active" data-stage="all">All Applicants <span class="count">14</span></button>
    <button class="stage-tab-pill" data-stage="screening">Screening <span class="count">3</span></button>
    <button class="stage-tab-pill" data-stage="tech">Tech Interview <span class="count">3</span></button>
    <button class="stage-tab-pill" data-stage="hr">HR Round <span class="count">2</span></button>
    <button class="stage-tab-pill" data-stage="offered">Offered <span class="count">2</span></button>
    <button class="stage-tab-pill" data-stage="hired">Hired <span class="count">2</span></button>
    <button class="stage-tab-pill" data-stage="rejected">Archived <span class="count">2</span></button>
</div>

<!-- Filter Card (Outside Table Card) -->
<div class="card border-0 shadow-sm p-3 mb-3.5 bg-white rounded-3">
    <div class="d-flex align-items-center justify-content-between mb-2.5 border-bottom pb-2">
        <div class="d-flex align-items-center gap-2">
            <div class="rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                <i class="bi bi-funnel-fill" style="font-size: 13px;"></i>
            </div>
            <h6 class="fw-bold text-dark mb-0" style="font-size: 13.5px;">Filter Candidates</h6>
        </div>
        <button type="button" class="btn btn-sm btn-link text-decoration-none text-muted p-0 fw-semibold" id="resetFiltersBtn" style="font-size: 12px;">
            <i class="bi bi-arrow-counterclockwise me-1"></i>Reset All Filters
        </button>
    </div>

    <div class="row g-3">
        <!-- Department Filter -->
        <div class="col-12 col-md-4">
            <label class="form-label text-muted fw-semibold small mb-1" style="font-size: 11.5px;">Department</label>
            <select class="form-select select2" id="deptFilterSelect">
                <option value="all">All Departments</option>
                <option value="Design">Design</option>
                <option value="Engineering">Engineering</option>
                <option value="Finance">Finance</option>
                <option value="Marketing">Marketing</option>
            </select>
        </div>

        <!-- Candidate / Employee Filter -->
        <div class="col-12 col-md-4">
            <label class="form-label text-muted fw-semibold small mb-1" style="font-size: 11.5px;">Candidate / Employee</label>
            <select class="form-select select2" id="candidateFilterSelect">
                <option value="all">All Candidates</option>
                <option value="Kavitha Raman">Kavitha Raman</option>
                <option value="Rahul Verma">Rahul Verma</option>
                <option value="Siddharth Rao">Siddharth Rao</option>
                <option value="Meera Krishnan">Meera Krishnan</option>
                <option value="Arjun Reddy">Arjun Reddy</option>
                <option value="Deepika Padukone">Deepika Padukone</option>
                <option value="Vikram Seth">Vikram Seth</option>
                <option value="Ananya Pandey">Ananya Pandey</option>
                <option value="Karthik Aryan">Karthik Aryan</option>
                <option value="Pooja Hegde">Pooja Hegde</option>
                <option value="Vijay Sethupathi">Vijay Sethupathi</option>
                <option value="Samantha Ruth">Samantha Ruth</option>
                <option value="Dhanush K">Dhanush K</option>
                <option value="Nayanthara S">Nayanthara S</option>
            </select>
        </div>

        <!-- HR Recruiter Filter -->
        <div class="col-12 col-md-4">
            <label class="form-label text-muted fw-semibold small mb-1" style="font-size: 11.5px;">HR Recruiter</label>
            <select class="form-select select2" id="hrFilterSelect">
                <option value="all">All HR Recruiters</option>
                <option value="Anitha Sharma">Anitha Sharma</option>
                <option value="Priya Nathan">Priya Nathan</option>
                <option value="Karthik V">Karthik V</option>
                <option value="Suresh Kumar">Suresh Kumar</option>
            </select>
        </div>
    </div>
</div>

<!-- Candidates Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="candidates-pipeline-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search candidate, skill, job..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="candidatesTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Candidate Name</th>
                    <th class="text-nowrap">Email Address</th>
                    <th class="text-nowrap">Applied Position</th>
                    <th class="text-nowrap">Experience & Company</th>
                    <th class="text-nowrap">Expected CTC</th>
                    <th class="text-nowrap">Notice Period</th>
                    <th class="text-nowrap">Hired / Managed By (HR)</th>
                    <th class="text-nowrap">Stage Status</th>
                    <th class="text-nowrap">Applied Date</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr class="cand-row" data-stage="offered" data-job="JOB-101" data-jobtitle="Senior UI/UX Designer" data-hr="Anitha Sharma">
                    <td>1</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Kavitha Raman">
                            <div class="fw-bold text-dark">Kavitha Raman</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>kavitha.r@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Senior UI/UX Designer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Design</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Freshworks (4.5 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹16.5 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">15 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-success-subtle text-success fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">AS</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Anitha Sharma</div>
                                <div class="text-muted" style="font-size:10.5px;">Senior HR</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-offered">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Offer Released
                        </span>
                    </td>
                    <td style="font-size:12px;">24-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="hired" data-job="JOB-102" data-jobtitle="Lead Backend Engineer" data-hr="Priya Nathan">
                    <td>2</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Rahul Verma">
                            <div class="fw-bold text-dark">Rahul Verma</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>rahul.v@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Lead Backend Engineer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Engineering</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Swiggy (6 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹26.0 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">Immediate</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">PN</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Priya Nathan</div>
                                <div class="text-muted" style="font-size:10.5px;">Lead Recruiter</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-hired">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Hired (Joining)
                        </span>
                    </td>
                    <td style="font-size:12px;">18-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                            <a href="employee-create.php?prefill=Rahul+Verma" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-title="Fast-Track Onboard Employee">
                                <i class="bi bi-person-check-fill"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="tech" data-job="JOB-103" data-jobtitle="iOS App Developer" data-hr="Karthik V">
                    <td>3</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Siddharth Nair">
                            <div class="fw-bold text-dark">Siddharth Nair</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>sid.nair@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">iOS App Developer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">iOS Dev</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Zoho (3.5 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹14.0 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">30 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-warning-subtle text-warning-emphasis fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">KV</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Karthik V</div>
                                <div class="text-muted" style="font-size:10.5px;">Tech Recruiter</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-tech">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Tech Round 2
                        </span>
                    </td>
                    <td style="font-size:12px;">22-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="screening" data-job="JOB-104" data-jobtitle="Financial Analyst" data-hr="Suresh Kumar">
                    <td>4</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-4.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Priya Sundaram">
                            <div class="fw-bold text-dark">Priya Sundaram</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>priya.s@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Financial Analyst</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Finance</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Deloitte (3 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹10.5 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">30 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-info-subtle text-info-emphasis fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">SK</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Suresh Kumar</div>
                                <div class="text-muted" style="font-size:10.5px;">HR Manager</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-screening">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Screening Call
                        </span>
                    </td>
                    <td style="font-size:12px;">26-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="hr" data-job="JOB-102" data-jobtitle="Lead Backend Engineer" data-hr="Anitha Sharma">
                    <td>5</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Arun Kumar">
                            <div class="fw-bold text-dark">Arun Kumar</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>arun.k@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Lead Backend Engineer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Engineering</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Cognizant (5 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹22.0 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">60 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-success-subtle text-success fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">AS</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Anitha Sharma</div>
                                <div class="text-muted" style="font-size:10.5px;">Senior HR</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-hr">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> HR Negotiation
                        </span>
                    </td>
                    <td style="font-size:12px;">20-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="screening" data-job="JOB-101" data-jobtitle="Senior UI/UX Designer" data-hr="Priya Nathan">
                    <td>6</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Meera Krishnan">
                            <div class="fw-bold text-dark">Meera Krishnan</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>meera.k@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Senior UI/UX Designer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Design</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Flipkart (4 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹17.0 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">30 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">PN</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Priya Nathan</div>
                                <div class="text-muted" style="font-size:10.5px;">Lead Recruiter</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-screening">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Screening Call
                        </span>
                    </td>
                    <td style="font-size:12px;">27-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="tech" data-job="JOB-102" data-jobtitle="Lead Backend Engineer" data-hr="Karthik V">
                    <td>7</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Karthik Rajan">
                            <div class="fw-bold text-dark">Karthik Rajan</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>karthik.r@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Lead Backend Engineer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Engineering</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Razorpay (5.5 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹24.0 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">15 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-warning-subtle text-warning-emphasis fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">KV</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Karthik V</div>
                                <div class="text-muted" style="font-size:10.5px;">Tech Recruiter</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-tech">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Tech Round 1
                        </span>
                    </td>
                    <td style="font-size:12px;">25-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="hr" data-job="JOB-104" data-jobtitle="Financial Analyst" data-hr="Suresh Kumar">
                    <td>8</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-4.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Deepa Balaji">
                            <div class="fw-bold text-dark">Deepa Balaji</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>deepa.b@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Financial Analyst</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Finance</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">KPMG (4 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹11.0 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">30 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-info-subtle text-info-emphasis fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">SK</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Suresh Kumar</div>
                                <div class="text-muted" style="font-size:10.5px;">HR Manager</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-hr">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> HR Negotiation
                        </span>
                    </td>
                    <td style="font-size:12px;">21-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="offered" data-job="JOB-103" data-jobtitle="iOS App Developer" data-hr="Anitha Sharma">
                    <td>9</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Ananya Sharma">
                            <div class="fw-bold text-dark">Ananya Sharma</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>ananya.s@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">iOS App Developer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">iOS Dev</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Paytm (3 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹15.0 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">Immediate</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-success-subtle text-success fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">AS</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Anitha Sharma</div>
                                <div class="text-muted" style="font-size:10.5px;">Senior HR</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-offered">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Offer Released
                        </span>
                    </td>
                    <td style="font-size:12px;">23-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="hired" data-job="JOB-105" data-jobtitle="Performance Marketing Specialist" data-hr="Priya Nathan">
                    <td>10</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Vikram Sethi">
                            <div class="fw-bold text-dark">Vikram Sethi</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>vikram.s@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Performance Marketing Specialist</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Marketing</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Nykaa (4.5 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹12.5 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">15 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">PN</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Priya Nathan</div>
                                <div class="text-muted" style="font-size:10.5px;">Lead Recruiter</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-hired">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Hired (Joining)
                        </span>
                    </td>
                    <td style="font-size:12px;">16-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                            <a href="employee-create.php?prefill=Vikram+Sethi" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-title="Fast-Track Onboard Employee">
                                <i class="bi bi-person-check-fill"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="rejected" data-job="JOB-101" data-jobtitle="Senior UI/UX Designer" data-hr="Suresh Kumar">
                    <td>11</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Rajesh Kannan">
                            <div class="fw-bold text-dark">Rajesh Kannan</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>rajesh.k@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Senior UI/UX Designer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Design</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Infosys (3 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-muted" style="font-size:12.5px;">₹11.0 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">60 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-info-subtle text-info-emphasis fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">SK</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Suresh Kumar</div>
                                <div class="text-muted" style="font-size:10.5px;">HR Manager</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-rejected">
                            <i class="bi bi-x-circle-fill" style="font-size:7px;"></i> Archived / Rejected
                        </span>
                    </td>
                    <td style="font-size:12px;">15-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="rejected" data-job="JOB-105" data-jobtitle="Performance Marketing Specialist" data-hr="Karthik V">
                    <td>12</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-4.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Sneha Reddy">
                            <div class="fw-bold text-dark">Sneha Reddy</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>sneha.r@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Performance Marketing Specialist</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Marketing</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Byjus (2 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-muted" style="font-size:12.5px;">₹9.0 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">30 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-warning-subtle text-warning-emphasis fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">KV</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Karthik V</div>
                                <div class="text-muted" style="font-size:10.5px;">Tech Recruiter</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-rejected">
                            <i class="bi bi-x-circle-fill" style="font-size:7px;"></i> Archived / Rejected
                        </span>
                    </td>
                    <td style="font-size:12px;">14-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="screening" data-job="JOB-103" data-jobtitle="iOS App Developer" data-hr="Anitha Sharma">
                    <td>13</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Divya Murugan">
                            <div class="fw-bold text-dark">Divya Murugan</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>divya.m@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">iOS App Developer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">iOS Dev</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">TCS (3.8 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹13.5 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">45 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-success-subtle text-success fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">AS</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Anitha Sharma</div>
                                <div class="text-muted" style="font-size:10.5px;">Senior HR</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-screening">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Screening Call
                        </span>
                    </td>
                    <td style="font-size:12px;">28-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="cand-row" data-stage="tech" data-job="JOB-101" data-jobtitle="Senior UI/UX Designer" data-hr="Priya Nathan">
                    <td>14</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Harish Raghavan">
                            <div class="fw-bold text-dark">Harish Raghavan</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-secondary"></i>harish.r@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Senior UI/UX Designer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Design</span>
                    </td>
                    <td>
                        <div class="text-dark fw-semibold" style="font-size:12px;">Wipro (5 yrs)</div>
                    </td>
                    <td>
                        <div class="fw-bold text-success" style="font-size:12.5px;">₹15.5 LPA</div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12px;">30 Days</div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;font-size:11px;">PN</div>
                            <div>
                                <div class="fw-semibold text-dark" style="font-size:12px;">Priya Nathan</div>
                                <div class="text-muted" style="font-size:10.5px;">Lead Recruiter</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="stage-badge stage-tech">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Tech Round 2
                        </span>
                    </td>
                    <td style="font-size:12px;">26-Feb-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                        </div>
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
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">10</strong> of <strong id="pgTotal">14</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal: Add Candidate -->
<div class="modal fade" id="addCandidateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><i class="bi bi-person-plus text-primary me-2"></i> Add Candidate to Talent Pool</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3" id="addCandidateForm" onsubmit="return false;">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Full Name *</label>
                        <input type="text" class="form-control" id="cand_name" placeholder="Candidate full name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Email Address *</label>
                        <input type="email" class="form-control" id="cand_email" placeholder="email@example.com" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Phone Number *</label>
                        <input type="text" class="form-control" id="cand_phone" placeholder="+91 98765 43210" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Applied Job Position *</label>
                        <select class="form-select select2" id="cand_job" required>
                            <option value="JOB-101" data-dept="Design" data-title="Senior UI/UX Designer">JOB-101 - Senior UI/UX Designer</option>
                            <option value="JOB-102" data-dept="Engineering" data-title="Lead Backend Engineer">JOB-102 - Lead Backend Engineer</option>
                            <option value="JOB-103" data-dept="iOS Dev" data-title="iOS App Developer">JOB-103 - iOS App Developer</option>
                            <option value="JOB-104" data-dept="Finance" data-title="Financial Analyst">JOB-104 - Financial Analyst</option>
                            <option value="JOB-105" data-dept="Marketing" data-title="Performance Marketing Specialist">JOB-105 - Performance Marketing Specialist</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Current Experience</label>
                        <input type="text" class="form-control" id="cand_exp" placeholder="e.g. 4.5 Years">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Current Company</label>
                        <input type="text" class="form-control" id="cand_company" placeholder="e.g. Infosys">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Expected CTC (₹)</label>
                        <input type="text" class="form-control" id="cand_ctc" placeholder="e.g. ₹16 LPA">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Notice Period</label>
                        <select class="form-select select2" id="cand_notice">
                            <option value="Immediate">Immediate Joiner</option>
                            <option value="15 Days">15 Days</option>
                            <option value="30 Days">30 Days</option>
                            <option value="60 Days">60 Days</option>
                            <option value="90 Days">90 Days</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Initial Stage</label>
                        <select class="form-select select2" id="cand_stage">
                            <option value="screening">Screening</option>
                            <option value="tech">Tech Interview</option>
                            <option value="hr">HR Round</option>
                            <option value="offered">Offered</option>
                            <option value="hired">Hired</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnSaveCandidate">
                    <i class="bi bi-check2-circle me-1"></i> Save Candidate
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Filter state for candidates pipeline
let currentCandidateStage = 'all';
let currentJobFilter = '';

// Check URL query parameters for stage or job filter
(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const stageParam = urlParams.get('stage');
    const jobParam = urlParams.get('job');
    if (stageParam) {
        currentCandidateStage = stageParam.toLowerCase();
    }
    if (jobParam) {
        currentJobFilter = jobParam.toLowerCase();
    }
})();

// External filter hook called by tabel.js
window.attendanceRowMatches = function(row) {
    if (!row || !row.classList || !row.classList.contains('cand-row')) return true;

    // Stage match
    const rowStage = (row.getAttribute('data-stage') || '').toLowerCase();
    const stageMatch = (currentCandidateStage === 'all') || (rowStage === currentCandidateStage);

    // Job match (if URL specified ?job=JOB-101)
    const rowJob = (row.getAttribute('data-job') || '').toLowerCase();
    const rowJobTitle = (row.getAttribute('data-jobtitle') || '').toLowerCase();
    const jobMatch = !currentJobFilter || rowJob.includes(currentJobFilter) || rowJobTitle.includes(currentJobFilter);

    // HR Recruiter match
    const hrSelect = document.getElementById('hrFilterSelect');
    const selectedHr = hrSelect ? hrSelect.value : 'all';
    const rowHr = row.getAttribute('data-hr') || '';
    const hrMatch = (selectedHr === 'all') || (rowHr === selectedHr);

    // Department match
    const deptSelect = document.getElementById('deptFilterSelect');
    const selectedDept = deptSelect ? deptSelect.value.toLowerCase() : 'all';
    const rowDept = (row.getAttribute('data-dept') || row.textContent).toLowerCase();
    const deptMatch = (selectedDept === 'all') || rowDept.includes(selectedDept);

    // Candidate / Employee match
    const candSelect = document.getElementById('candidateFilterSelect');
    const selectedCand = candSelect ? candSelect.value.toLowerCase() : 'all';
    const rowText = row.textContent.toLowerCase();
    const candMatch = (selectedCand === 'all') || rowText.includes(selectedCand);

    return stageMatch && jobMatch && hrMatch && deptMatch && candMatch;
};

// Calculate dynamic counts across all pipeline stages
function updateStageTabCounts() {
    const rows = document.querySelectorAll('#pgBody tr.cand-row');
    const counts = {
        all: 0,
        screening: 0,
        tech: 0,
        hr: 0,
        offered: 0,
        hired: 0,
        rejected: 0
    };

    rows.forEach(function(row) {
        const rowJob = (row.getAttribute('data-job') || '').toLowerCase();
        const rowJobTitle = (row.getAttribute('data-jobtitle') || '').toLowerCase();
        if (currentJobFilter && !rowJob.includes(currentJobFilter) && !rowJobTitle.includes(currentJobFilter)) {
            return;
        }

        counts.all++;
        const s = (row.getAttribute('data-stage') || '').toLowerCase();
        if (counts.hasOwnProperty(s)) {
            counts[s]++;
        }
    });

    document.querySelectorAll('.stage-tab-pill').forEach(function(btn) {
        const stage = btn.getAttribute('data-stage');
        const countSpan = btn.querySelector('.count');
        if (countSpan && counts.hasOwnProperty(stage)) {
            countSpan.textContent = counts[stage];
        }
    });
}
</script>

<script src="./assets/js/tabel.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Stage tab pill click handlers
    const stageTabs = document.querySelectorAll('.stage-tab-pill');

    // Pre-activate tab if from URL query parameter
    if (currentCandidateStage !== 'all') {
        stageTabs.forEach(function(tab) {
            if (tab.getAttribute('data-stage') === currentCandidateStage) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    stageTabs.forEach(function(tab) {
        tab.addEventListener('click', function(e) {
            e.preventDefault();

            stageTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            currentCandidateStage = this.getAttribute('data-stage') || 'all';

            // Trigger table re-render via tabel.js
            if (window.refreshAttendanceTable) {
                window.refreshAttendanceTable();
            }
        });
    });

    // Filter Change Handlers (Works with Select2 and standard selects)
    ['hrFilterSelect', 'deptFilterSelect', 'candidateFilterSelect'].forEach(function(id) {
        const el = document.getElementById(id);
        if (el) {
            $(el).on('change', function() {
                updateStageTabCounts();
                if (window.refreshAttendanceTable) {
                    window.refreshAttendanceTable();
                }
            });
        }
    });

    // Reset Filters Handler
    const resetFiltersBtn = document.getElementById('resetFiltersBtn');
    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const empSearch = document.getElementById('employeeSearch');
            if (empSearch) {
                empSearch.value = '';
                empSearch.dispatchEvent(new Event('input'));
            }
            
            ['hrFilterSelect', 'deptFilterSelect', 'candidateFilterSelect'].forEach(function(id) {
                const el = document.getElementById(id);
                if (el) {
                    $(el).val('all').trigger('change.select2');
                }
            });

            stageTabs.forEach(t => t.classList.remove('active'));
            const allTab = document.querySelector('.stage-tab-pill[data-stage="all"]');
            if (allTab) allTab.classList.add('active');
            currentCandidateStage = 'all';

            updateStageTabCounts();
            if (window.refreshAttendanceTable) {
                window.refreshAttendanceTable();
            }
        });
    }

    // Initial counts calculation
    updateStageTabCounts();

    // Add Candidate submission handler
    const btnSaveCandidate = document.getElementById('btnSaveCandidate');
    if (btnSaveCandidate) {
        btnSaveCandidate.addEventListener('click', function() {
            const name = document.getElementById('cand_name').value.trim();
            const email = document.getElementById('cand_email').value.trim();
            const phone = document.getElementById('cand_phone').value.trim();
            const jobSelect = document.getElementById('cand_job');
            const jobCode = jobSelect.value;
            const selectedOpt = jobSelect.options[jobSelect.selectedIndex];
            const dept = selectedOpt ? selectedOpt.getAttribute('data-dept') : 'General';
            const jobTitle = selectedOpt ? selectedOpt.getAttribute('data-title') : jobCode;
            const exp = document.getElementById('cand_exp').value.trim() || '2 Years';
            const company = document.getElementById('cand_company').value.trim() || 'Previous Org';
            const ctc = document.getElementById('cand_ctc').value.trim() || 'Best in Industry';
            const notice = document.getElementById('cand_notice').value;
            const stage = document.getElementById('cand_stage').value || 'screening';

            if (!name || !email) {
                alert('Please enter Candidate Name and Email.');
                return;
            }

            const tbody = document.getElementById('pgBody');
            const newId = tbody ? tbody.querySelectorAll('tr.cand-row').length + 1 : 1;
            const todayStr = new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }).replace(/ /g, '-');

            let stageBadgeClass = 'stage-screening';
            let stageBadgeText = 'Screening Call';
            if (stage === 'tech') {
                stageBadgeClass = 'stage-tech';
                stageBadgeText = 'Tech Round 1';
            } else if (stage === 'hr') {
                stageBadgeClass = 'stage-hr';
                stageBadgeText = 'HR Negotiation';
            } else if (stage === 'offered') {
                stageBadgeClass = 'stage-offered';
                stageBadgeText = 'Offer Released';
            } else if (stage === 'hired') {
                stageBadgeClass = 'stage-hired';
                stageBadgeText = 'Hired (Joining)';
            }

            const newTr = document.createElement('tr');
            newTr.className = 'cand-row';
            newTr.setAttribute('data-stage', stage);
            newTr.setAttribute('data-job', jobCode);
            newTr.setAttribute('data-jobtitle', jobTitle);

            newTr.innerHTML = `
                <td>${newId}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="${name}">
                        <div>
                            <div class="fw-bold text-dark">${name}</div>
                            <div class="text-muted" style="font-size:11px;">${email} • ${phone}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fw-semibold text-dark">${jobTitle}</div>
                    <span class="badge bg-light text-dark border" style="font-size:10.5px;">${dept}</span>
                </td>
                <td>
                    <div class="text-dark fw-semibold" style="font-size:12px;">${company} (${exp})</div>
                </td>
                <td>
                    <div class="fw-bold text-success" style="font-size:12.5px;">${ctc}</div>
                </td>
                <td>
                    <div class="fw-medium text-dark" style="font-size:12px;">${notice}</div>
                </td>
                <td>
                    <span class="stage-badge ${stageBadgeClass}">
                        <i class="bi bi-circle-fill" style="font-size:7px;"></i> ${stageBadgeText}
                    </span>
                </td>
                <td style="font-size:12px;">${todayStr}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </button>

                    </div>
                </td>
            `;

            if (tbody) {
                tbody.appendChild(newTr);
            }

            // Close modal & reset form
            const modalEl = document.getElementById('addCandidateModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                const inst = bootstrap.Modal.getInstance(modalEl);
                if (inst) inst.hide();
            }
            document.getElementById('addCandidateForm').reset();

            // Refresh table and counts
            updateStageTabCounts();
            if (window.refreshAttendanceTable) {
                window.refreshAttendanceTable();
            }
        });
    }
});
</script>

<?php include 'footer.php'; ?>
