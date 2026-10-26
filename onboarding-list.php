<?php include 'header.php'; ?>

 

<style>
    .onb-kpi {
        min-height: 96px;
        padding: 16px;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        background: var(--white);
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
        color: var(--ink-500);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .onb-kpi .value {
        color: var(--ink-900);
        font-size: 22px;
        font-weight: 800;
    }
    .onb-kpi .sub {
        color: var(--ink-500);
        font-size: 11px;
        margin-top: 2px;
    }

    .stage-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 99px;
    }
    .stage-preboarding { background: #fff4d9; color: #b56b00; }
    .stage-induction { background: #e0f2fe; color: #0369a1; }
    .stage-training { background: #f3e8ff; color: #7e22ce; }
    .stage-completed { background: #dcfce7; color: #15803d; }

    .ln-stage-tab {
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #475569;
        font-weight: 600;
        font-size: 12.5px;
        padding: 6px 14px;
        border-radius: 20px;
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .ln-stage-tab:hover {
        background: #f8fafc;
        color: var(--primary, #087a24);
    }
    .ln-stage-tab.active {
        background: var(--primary, #087a24) !important;
        color: #fff !important;
        border-color: var(--primary, #087a24) !important;
    }

    .pan-badge {
        font-family: monospace;
        font-weight: 700;
        letter-spacing: 0.5px;
        background: #f1f5f9;
        color: #334155;
        padding: 2px 7px;
        border-radius: 4px;
        font-size: 11.5px;
    }

    .dropzone-box {
        border: 2px dashed #cbd5e1;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        background: #f8fafc;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .dropzone-box:hover {
        border-color: var(--primary, #087a24);
        background: #f0fdf4;
    }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Candidate Onboarding & Joining Pipeline</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-person-check fs-6 text-success"></i>
            <span>Onboarding</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Joining Pipeline</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <!-- <a href="onboarding-tasks.php" class="btn btn-outline-success">
            <i class="bi bi-check2-square me-1"></i> Task Checklists
        </a> -->
        <a href="new-employee.php" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-person-plus-fill me-1"></i> Add Candidate
        </a>
    </div>
</div>

<!-- KPI Metric Cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="onb-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e8f7ea;color:#087a24;"><i class="bi bi-people-fill"></i></div>
            <div>
                <div class="label">Total Onboarding Candidates</div>
                <div class="value">8 Joiners</div>
                <div class="sub">Active pre-boarding pipeline</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="onb-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="label">In Pre-Boarding</div>
                <div class="value">3 Candidates</div>
                <div class="sub">Document verification in progress</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="onb-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e0f2fe;color:#0369a1;"><i class="bi bi-calendar-event"></i></div>
            <div>
                <div class="label">Day 1 Induction Scheduled</div>
                <div class="value">3 Candidates</div>
                <div class="sub">Scheduled for next Monday</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="onb-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#dcfce7;color:#15803d;"><i class="bi bi-check2-circle"></i></div>
            <div>
                <div class="label">Completed & Onboarded</div>
                <div class="value">2 Employees</div>
                <div class="sub">Transferred to Employee Master</div>
            </div>
        </div>
    </div>
</div>

<!-- Filter Tabs -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div class="d-flex align-items-center gap-2 flex-wrap" id="onbTabsWrap">
        <button class="ln-stage-tab active" data-filter="all">All Candidates <span class="badge bg-light text-dark border ms-1">8</span></button>
        <button class="ln-stage-tab" data-filter="preboarding">Pre-Boarding <span class="badge bg-light text-dark border ms-1">3</span></button>
        <button class="ln-stage-tab" data-filter="induction">Day 1 Induction <span class="badge bg-light text-dark border ms-1">3</span></button>
        <button class="ln-stage-tab" data-filter="completed">Onboarded <span class="badge bg-light text-dark border ms-1">2</span></button>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search (matching job-openings.php model) -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="onboarding-candidates-pipeline-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search first name, email, PAN, Aadhaar..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="onboardingTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">First Name</th>
                    <th class="text-nowrap">Last Name</th>
                    <th class="text-nowrap">Email ID</th>
                    <th class="text-nowrap">Official Email</th>
                    <th class="text-nowrap">Onboarding Status</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Source of Hire</th>
                    <th class="text-nowrap">PAN Card Number</th>
                    <th class="text-nowrap">Aadhaar Card Number</th>
                    <th class="text-nowrap text-end">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr class="onb-row" 
                    data-fname="Kavitha"
                    data-lname="Raman"
                    data-email="kavitha.r@example.com"
                    data-offemail="kavitha.r@gharudahr.com"
                    data-phone="+91 98401 23456"
                    data-status="Day 1 Induction"
                    data-statuscode="induction"
                    data-dept="UI/UX Design Department"
                    data-source="LinkedIn Easy Apply"
                    data-pan="ABCDE1234F"
                    data-aadhaar="9876-5432-1098"
                    data-uan="100987654321"
                >
                    <td>1</td>
                    <td class="fw-bold text-dark">Kavitha</td>
                    <td class="fw-bold text-dark">Raman</td>
                    <td class="text-dark" style="font-size:12.5px;">kavitha.r@example.com</td>
                    <td class="fw-semibold text-success" style="font-size:12.5px;">kavitha.r@gharudahr.com</td>
                    <td><span class="stage-pill stage-induction"><i class="bi bi-circle-fill" style="font-size:7px;"></i> Day 1 Induction</span></td>
                    <td><span class="badge bg-light text-dark border">Design</span></td>
                    <td style="font-size:12px;">LinkedIn Easy Apply</td>
                    <td><span class="pan-badge">ABCDE1234F</span></td>
                    <td style="font-size:12px; font-family:monospace;">9876-5432-1098</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-cand-details" data-bs-toggle="tooltip" title="View Complete Candidate Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="new-employee.php?prefill=Kavitha+Raman" class="btn btn-sm btn-success" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" data-bs-toggle="tooltip" title="Finalize Onboarding to Employee Master">
                                <i class="bi bi-person-check-fill me-1"></i> Onboard
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="onb-row" 
                    data-fname="Rahul"
                    data-lname="Verma"
                    data-email="rahul.v@example.com"
                    data-offemail="rahul.v@gharudahr.com"
                    data-phone="+91 98765 43210"
                    data-status="Pre-Boarding"
                    data-statuscode="preboarding"
                    data-dept="Backend Engineering"
                    data-source="LinkedIn Job Share"
                    data-pan="FGHIJ5678K"
                    data-aadhaar="8765-4321-0987"
                    data-uan="100876543210"
                >
                    <td>2</td>
                    <td class="fw-bold text-dark">Rahul</td>
                    <td class="fw-bold text-dark">Verma</td>
                    <td class="text-dark" style="font-size:12.5px;">rahul.v@example.com</td>
                    <td class="fw-semibold text-success" style="font-size:12.5px;">rahul.v@gharudahr.com</td>
                    <td><span class="stage-pill stage-preboarding"><i class="bi bi-circle-fill" style="font-size:7px;"></i> Pre-Boarding</span></td>
                    <td><span class="badge bg-light text-dark border">Backend Eng</span></td>
                    <td style="font-size:12px;">LinkedIn Job Share</td>
                    <td><span class="pan-badge">FGHIJ5678K</span></td>
                    <td style="font-size:12px; font-family:monospace;">8765-4321-0987</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-cand-details" data-bs-toggle="tooltip" title="View Complete Candidate Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="new-employee.php?prefill=Rahul+Verma" class="btn btn-sm btn-success" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" data-bs-toggle="tooltip" title="Finalize Onboarding to Employee Master">
                                <i class="bi bi-person-check-fill me-1"></i> Onboard
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="onb-row" 
                    data-fname="Siddharth"
                    data-lname="Nair"
                    data-email="sid.nair@example.com"
                    data-offemail="siddharth.n@gharudahr.com"
                    data-phone="+91 94441 89012"
                    data-status="In Training"
                    data-statuscode="preboarding"
                    data-dept="Mobile Engineering"
                    data-source="Company Careers Page"
                    data-pan="KLMNO9012P"
                    data-aadhaar="7654-3210-9876"
                    data-uan="100765432109"
                >
                    <td>3</td>
                    <td class="fw-bold text-dark">Siddharth</td>
                    <td class="fw-bold text-dark">Nair</td>
                    <td class="text-dark" style="font-size:12.5px;">sid.nair@example.com</td>
                    <td class="fw-semibold text-success" style="font-size:12.5px;">siddharth.n@gharudahr.com</td>
                    <td><span class="stage-pill stage-training"><i class="bi bi-circle-fill" style="font-size:7px;"></i> In Training</span></td>
                    <td><span class="badge bg-light text-dark border">Mobile Dev</span></td>
                    <td style="font-size:12px;">Company Careers Page</td>
                    <td><span class="pan-badge">KLMNO9012P</span></td>
                    <td style="font-size:12px; font-family:monospace;">7654-3210-9876</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-cand-details" data-bs-toggle="tooltip" title="View Complete Candidate Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="new-employee.php?prefill=Siddharth+Nair" class="btn btn-sm btn-success" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" data-bs-toggle="tooltip" title="Finalize Onboarding to Employee Master">
                                <i class="bi bi-person-check-fill me-1"></i> Onboard
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="onb-row" 
                    data-fname="Ananya"
                    data-lname="Sundaram"
                    data-email="ananya.s@example.com"
                    data-offemail="ananya.s@gharudahr.com"
                    data-phone="+91 98402 11223"
                    data-status="Pre-Boarding"
                    data-statuscode="preboarding"
                    data-dept="UI/UX Design Department"
                    data-source="Employee Referral"
                    data-pan="PQRST3456U"
                    data-aadhaar="6543-2109-8765"
                    data-uan="100654321098"
                >
                    <td>4</td>
                    <td class="fw-bold text-dark">Ananya</td>
                    <td class="fw-bold text-dark">Sundaram</td>
                    <td class="text-dark" style="font-size:12.5px;">ananya.s@example.com</td>
                    <td class="fw-semibold text-success" style="font-size:12.5px;">ananya.s@gharudahr.com</td>
                    <td><span class="stage-pill stage-preboarding"><i class="bi bi-circle-fill" style="font-size:7px;"></i> Pre-Boarding</span></td>
                    <td><span class="badge bg-light text-dark border">Design</span></td>
                    <td style="font-size:12px;">Employee Referral</td>
                    <td><span class="pan-badge">PQRST3456U</span></td>
                    <td style="font-size:12px; font-family:monospace;">6543-2109-8765</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-cand-details" data-bs-toggle="tooltip" title="View Complete Candidate Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="new-employee.php?prefill=Ananya+Sundaram" class="btn btn-sm btn-success" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" data-bs-toggle="tooltip" title="Finalize Onboarding to Employee Master">
                                <i class="bi bi-person-check-fill me-1"></i> Onboard
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="onb-row" 
                    data-fname="Priya"
                    data-lname="Sundaram"
                    data-email="priya.s@example.com"
                    data-offemail="priya.s@gharudahr.com"
                    data-phone="+91 91234 56780"
                    data-status="Onboarded"
                    data-statuscode="completed"
                    data-dept="Finance Department"
                    data-source="Naukri.com"
                    data-pan="UVWXY7890Z"
                    data-aadhaar="5432-1098-7654"
                    data-uan="100543210987"
                >
                    <td>5</td>
                    <td class="fw-bold text-dark">Priya</td>
                    <td class="fw-bold text-dark">Sundaram</td>
                    <td class="text-dark" style="font-size:12.5px;">priya.s@example.com</td>
                    <td class="fw-semibold text-success" style="font-size:12.5px;">priya.s@gharudahr.com</td>
                    <td><span class="stage-pill stage-completed"><i class="bi bi-check-circle-fill" style="font-size:7px;"></i> Onboarded</span></td>
                    <td><span class="badge bg-light text-dark border">Finance</span></td>
                    <td style="font-size:12px;">Naukri.com</td>
                    <td><span class="pan-badge">UVWXY7890Z</span></td>
                    <td style="font-size:12px; font-family:monospace;">5432-1098-7654</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-cand-details" data-bs-toggle="tooltip" title="View Complete Candidate Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="new-employee.php" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="View in Employee Master">
                                <i class="bi bi-person-vcard"></i>
                            </a>
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
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">5</strong> of <strong id="pgTotal">5</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal 1: Add Candidate Modal (Matching User's Screenshot Form Fields & Layout) -->
<div class="modal fade" id="addCandidateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Add Candidate to Pre-Onboarding</h4>
                        <div class="text-muted" style="font-size:13px;">Gather Personal, Professional & Identification Details for Onboarding Paperwork</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="addCandidateForm">
                <div class="modal-body p-4">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-lines-fill text-success me-1"></i> Candidate Details</h6>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">First Name *</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter first name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Last Name *</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Personal Email ID *</label>
                            <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Official Email</label>
                            <input type="email" class="form-control" name="official_email" placeholder="name@gharudahr.com">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Phone Number *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-flag-fill me-1 text-success"></i> +91</span>
                                <input type="text" class="form-control" name="phone" placeholder="81234 56789" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Target Department *</label>
                            <select class="form-select" name="department" required>
                                <option value="UI/UX Design Department">UI/UX Design Department</option>
                                <option value="Backend Engineering">Backend Engineering</option>
                                <option value="Mobile Engineering">Mobile Engineering</option>
                                <option value="Finance Department">Finance Department</option>
                                <option value="Marketing & Growth">Marketing & Growth</option>
                                <option value="HR & Operations">HR & Operations</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">UAN Number</label>
                            <input type="text" class="form-control" name="uan" placeholder="100987654321">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Aadhaar Card Number</label>
                            <input type="text" class="form-control" name="aadhaar" placeholder="9876-5432-1098">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">PAN Card Number</label>
                            <input type="text" class="form-control" name="pan" placeholder="ABCDE1234F">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Candidate Photo Upload</label>
                        <div class="dropzone-box" onclick="document.getElementById('photoInput').click();">
                            <i class="bi bi-cloud-arrow-up text-success fs-2 mb-2"></i>
                            <div class="fw-bold text-dark" style="font-size:13.5px;">
                                Upload from <span class="text-success text-decoration-underline">Desktop</span> / <span class="text-success text-decoration-underline">WorkDrive</span> / <span class="text-success text-decoration-underline">Others</span>
                            </div>
                            <div class="text-muted" style="font-size:11.5px;">Files supported: JPG, PNG, GIF, JPEG • Max. size is 5 MB</div>
                            <input type="file" id="photoInput" name="photo" style="display:none;" accept="image/*">
                        </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-secondary" onclick="alert('Draft saved!');">Save Draft</button>
                    <button type="button" class="btn btn-outline-success" onclick="document.getElementById('addCandidateForm').reset();">Submit and New</button>
                    <button type="submit" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                        <i class="bi bi-check2-circle me-1"></i> Submit Candidate
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2: View Full Candidate Onboarding Details -->
<div class="modal fade" id="viewCandidateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" id="candAvatar" style="width:48px;height:48px;background:var(--primary, #087a24);font-size:20px;">
                        K
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0" id="candNameDisplay">Kavitha Raman</h4>
                        <div class="text-muted" style="font-size:13px;" id="candRoleDisplay">UI/UX Design Department • LinkedIn Easy Apply</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="card p-3 bg-light border-0 mb-3" style="border-radius:12px;">
                    <h6 class="fw-bold text-dark mb-2"><i class="bi bi-person-lines-fill text-success me-1"></i> Contact & Email Information</h6>
                    <div class="row g-2 text-dark" style="font-size:13px;">
                        <div class="col-md-6"><strong>Personal Email:</strong> <span id="candEmail">-</span></div>
                        <div class="col-md-6"><strong>Official Email:</strong> <span id="candOffEmail" class="text-success fw-bold">-</span></div>
                        <div class="col-md-6"><strong>Phone Number:</strong> <span id="candPhone">-</span></div>
                        <div class="col-md-6"><strong>Source of Hire:</strong> <span id="candSource" class="badge bg-light text-dark border">-</span></div>
                    </div>
                </div>

                <div class="card p-3 border mb-3" style="border-radius:12px;">
                    <h6 class="fw-bold text-dark mb-2"><i class="bi bi-card-heading text-primary me-1"></i> Statutory & Government Identification Numbers</h6>
                    <div class="row g-2 text-dark" style="font-size:13px;">
                        <div class="col-md-4"><strong>PAN Card Number:</strong> <br><span id="candPan" class="pan-badge">-</span></div>
                        <div class="col-md-4"><strong>Aadhaar Card Number:</strong> <br><span id="candAadhaar" class="fw-bold" style="font-family:monospace;">-</span></div>
                        <div class="col-md-4"><strong>UAN Number:</strong> <br><span id="candUan" class="fw-bold" style="font-family:monospace;">-</span></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentFilter = 'all';

    // Hook used by tabel.js to filter rows based on external tabs
    window.attendanceRowMatches = function(row) {
        if (!row || !row.getAttribute) return true;
        const code = (row.getAttribute('data-statuscode') || '').toLowerCase();

        if (currentFilter === 'preboarding') return code === 'preboarding';
        if (currentFilter === 'induction') return code === 'induction';
        if (currentFilter === 'completed') return code === 'completed';

        return true;
    };

    // Filter Tabs Handler
    document.querySelectorAll('#onbTabsWrap .ln-stage-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('#onbTabsWrap .ln-stage-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            currentFilter = this.getAttribute('data-filter');
            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    });

    // View Candidate Details Click
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-view-cand-details');
        if (!btn) return;

        const row = btn.closest('tr');
        if (!row) return;

        const fname = row.getAttribute('data-fname') || '';
        const lname = row.getAttribute('data-lname') || '';
        const fullName = `${fname} ${lname}`;
        const email = row.getAttribute('data-email') || '';
        const offemail = row.getAttribute('data-offemail') || '';
        const phone = row.getAttribute('data-phone') || '';
        const dept = row.getAttribute('data-dept') || '';
        const source = row.getAttribute('data-source') || '';
        const pan = row.getAttribute('data-pan') || '-';
        const aadhaar = row.getAttribute('data-aadhaar') || '-';
        const uan = row.getAttribute('data-uan') || '-';

        document.getElementById('candAvatar').innerText = fname ? fname.charAt(0).toUpperCase() : 'C';
        document.getElementById('candNameDisplay').innerText = fullName;
        document.getElementById('candRoleDisplay').innerText = `${dept} • ${source}`;
        document.getElementById('candEmail').innerText = email;
        document.getElementById('candOffEmail').innerText = offemail;
        document.getElementById('candPhone').innerText = phone;
        document.getElementById('candSource').innerText = source;
        document.getElementById('candPan').innerText = pan;
        document.getElementById('candAadhaar').innerText = aadhaar;
        document.getElementById('candUan').innerText = uan;

        const modal = new bootstrap.Modal(document.getElementById('viewCandidateModal'));
        modal.show();
    });

    // Form Submit for Add Candidate
    const addForm = document.getElementById('addCandidateForm');
    if (addForm) {
        addForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const modalInst = bootstrap.Modal.getInstance(document.getElementById('addCandidateModal'));
            if (modalInst) modalInst.hide();
            alert('New candidate successfully added to onboarding pipeline!');
            location.reload();
        });
    }
});
</script>

<?php include 'footer.php'; ?>
