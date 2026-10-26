<?php include 'header.php'; ?>

 
 


<style>
    .ln-card-kpi {
        background: #ffffff;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 4px 16px rgba(10, 25, 47, 0.04);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .ln-card-kpi:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(10, 25, 47, 0.08);
    }

    .ln-kpi-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .ln-stage-tab {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 999px;
        background: #f1f5f9;
        color: #475569;
        font-size: 13px;
        font-weight: 700;
        border: 1px solid transparent;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .ln-stage-tab:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    .ln-stage-tab.active {
        background: var(--primary, #087a24);
        color: #ffffff;
    }

    .ln-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #0077b5;
        color: #ffffff;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 6px;
        text-decoration: none;
    }

    .ln-badge:hover {
        background: #005582;
        color: #ffffff;
    }

    .stage-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 99px;
    }

    .stage-screening {
        background: #e0f2fe;
        color: #0284c7;
    }

    .stage-tech {
        background: #fef3c7;
        color: #d97706;
    }

    .stage-hr {
        background: #f3e8ff;
        color: #9333ea;
    }

    .stage-offered {
        background: #dbeafe;
        color: #1e40af;
    }

    .stage-hired {
        background: #dcfce7;
        color: #15803d;
    }

    .stage-archived {
        background: #fee2e2;
        color: #b91c1c;
    }

    .rating-stars {
        color: #f59e0b;
        font-size: 13px;
    }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <h1 class="font-display fw-bold m-0" style="font-size:1.7rem;">Social & Web Candidate Applications</h1>
        </div>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-briefcase fs-6"></i>
            <span>Recruitment</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Social & Web Applicants</span>
        </nav>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <button class="btn btn-outline-success btn-view-tl-scorecard" type="button" data-bs-toggle="tooltip"
            title="Review Team Lead Scorecards & Ratings">
            <i class="bi bi-file-earmark-bar-graph me-1"></i> Review TL Scorecards
        </button>
        <button class="btn btn-outline-primary btn-schedule-interview-modal" type="button">
            <i class="bi bi-calendar2-plus me-1"></i> Schedule Interview & Assign TL
        </button>
        <button class="btn btn-outline-warning btn-reschedule-interview-modal" type="button" data-bs-toggle="tooltip"
            title="Reschedule missed or postponed candidate interview">
            <i class="bi bi-arrow-repeat me-1"></i> Reschedule Interview
        </button>
        <!-- <a href="linkedin-applications.php?action=download_zip" class="btn btn-primary" id="btnTopZip" data-bs-toggle="tooltip" title="Bulk download candidate resumes as a .zip package" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-file-earmark-zip me-1"></i> Bulk Download Resumes (.zip)
        </a> -->

        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addLinkedInApplicantModal"
            style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-person-plus me-1"></i> Add Candidate
        </button>
    </div>
</div>

<!-- Recruitment LinkedIn KPI Metrics -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="ln-card-kpi d-flex align-items-center gap-3">
            <div class="ln-kpi-icon" style="background:#e0f2fe; color:#0284c7;">
                <i class="bi bi-share"></i>
            </div>
            <div>
                <div class="text-muted fw-semibold" style="font-size:12px;">Total Social & Web Applicants</div>
                <div class="fw-bold text-dark" style="font-size:24px;" id="kpiTotalCount">3</div>
                <div class="text-success fw-bold" style="font-size:11px;"><i class="bi bi-arrow-up"></i> +18 this week
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ln-card-kpi d-flex align-items-center gap-3">
            <div class="ln-kpi-icon" style="background:#fef3c7; color:#d97706;">
                <i class="bi bi-person-walking"></i>
            </div>
            <div>
                <div class="text-muted fw-semibold" style="font-size:12px;">Walk-in Applications</div>
                <div class="fw-bold text-dark" style="font-size:24px;" id="kpiEasyApply">2</div>
                <div class="text-muted" style="font-size:11px;">Direct Candidate Walk-ins</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ln-card-kpi d-flex align-items-center gap-3">
            <div class="ln-kpi-icon" style="background:#f3e8ff; color:#9333ea;">
                <i class="bi bi-person-badge"></i>
            </div>
            <div>
                <div class="text-muted fw-semibold" style="font-size:12px;">Shortlisted / Interviewing</div>
                <div class="fw-bold text-dark" style="font-size:24px;" id="kpiShortlisted">3</div>
                <div class="text-muted" style="font-size:11px;">Active in Pipeline</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="ln-card-kpi d-flex align-items-center gap-3">
            <div class="ln-kpi-icon" style="background:#dcfce7; color:#15803d;">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div>
                <div class="text-muted fw-semibold" style="font-size:12px;">Hired & Offered</div>
                <div class="fw-bold text-dark" style="font-size:24px;" id="kpiHired">0</div>
                <div class="text-success fw-bold" style="font-size:11px;">14.2% Conversion Rate</div>
            </div>
        </div>
    </div>
</div>

<!-- Source Tabs Filter -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div class="d-flex align-items-center gap-2 flex-wrap" id="sourceTabsWrap">
        <button class="ln-stage-tab active" data-source="all">All Applicants</button>
        <button class="ln-stage-tab" data-source="walkin"><i class="bi bi-person-walking"></i> Walk-in
            Applications</button>
        <button class="ln-stage-tab" data-source="job_share"><i class="bi bi-share"></i> Job Share Link</button>
        <button class="ln-stage-tab" data-source="portal"><i class="bi bi-globe"></i> Careers Portal</button>
    </div>
</div>

<!-- Floating Batch Action Bar for Selected Candidates -->
<div id="batchActionBar"
    class="p-3 bg-dark text-white rounded-3 shadow-lg position-fixed bottom-0 start-50 translate-middle-x mb-4 d-none"
    style="z-index:9999; width:90%; max-width:600px;">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <i class="bi bi-check2-square text-success me-1"></i> <span class="fw-bold" id="batchSelectCount">0</span>
            Candidate(s) Selected
        </div>
        <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-sm btn-success" id="btnBatchZip"
                style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);"><i
                    class="bi bi-file-earmark-zip me-1"></i> Download Selected Resumes (.zip)</button>
            <button type="button" class="btn btn-sm btn-outline-light" id="btnBatchClear">Deselect All</button>
        </div>
    </div>
</div>

<!-- Table Card (toolbar & footer auto-created by master-table.js) -->
<div class="card-custom p-0" id="applicantsTableWrap">
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="applicantsTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Candidate Name</th>
                    <th class="text-nowrap">Email Address</th>
                    <th class="text-nowrap">Application Profile</th>
                    <th class="text-nowrap">Applied Position</th>
                    <th class="text-nowrap">Experience</th>
                    <th class="text-nowrap">Current Company</th>
                    <th class="text-nowrap">Expected CTC</th>
                    <th class="text-nowrap">Notice Period</th>
                    <th class="text-nowrap">Applied Date</th>
                    <th class="text-nowrap text-end">Action</th>
                </tr>
            </thead>
            <tbody id="applicantsTbody">
                <!-- Rows dynamically rendered by MasterTable -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal 1: Enterprise Candidate Profile & Dossier Drawer -->
<div class="modal fade" id="viewApplicantModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg" style="border-radius:20px; overflow:hidden;">
            <!-- Hero Header with Vibrant Green Gradient Theme -->
            <div class="modal-header border-0 p-4 text-white position-relative"
                style="background: linear-gradient(135deg, #053e14 0%, #087a24 50%, #0db839 100%);">
                <div class="d-flex align-items-center justify-content-between w-100 pe-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="position-relative">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold shadow"
                                id="modalAvatar"
                                style="width:60px;height:60px;min-width:60px;background:linear-gradient(135deg, #16c840 0%, #087a24 100%);font-size:24px;line-height:1;border:3px solid rgba(255,255,255,0.45);">
                                A
                            </div>
                            <span
                                class="position-absolute bottom-0 end-0 p-1 bg-success border border-2 border-white rounded-circle"
                                data-bs-toggle="tooltip" title="Active Candidate Profile">
                                <span class="visually-hidden">Active</span>
                            </span>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                <h4 class="modal-title fw-bold text-white mb-0" id="modalCandName"
                                    style="font-size:22px;">Candidate Name</h4>
                                <span
                                    class="badge text-white border border-white border-opacity-30 px-3 py-1 rounded-pill"
                                    style="font-size:11px; background:rgba(255,255,255,0.2); backdrop-filter:blur(8px);"
                                    id="modalCandId">LNK-2026-001</span>
                            </div>
                            <div class="text-white-50 d-flex align-items-center gap-2 flex-wrap"
                                style="font-size:13px;">
                                <span id="modalCandSubtitle" class="fw-semibold text-white">Senior UI/UX Designer</span>
                                <span>•</span>
                                <span class="badge bg-white text-dark fw-bold px-2.5 py-1 shadow-sm rounded-pill"
                                    style="font-size:11px;" id="modalSourceBadge">
                                    <i class="bi bi-person-walking me-1 text-success"></i> Walk-in Application
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4" style="background:#f8fafc;">
                <div class="row g-4">
                    <!-- Left Column: Detailed Candidate Profile Dossier (col-lg-7) -->
                    <div class="col-lg-7">

                        <!-- Contact & Verification Card -->
                        <div class="card border-0 shadow-sm mb-4"
                            style="border-radius:16px; background:#ffffff; border:1px solid #e2e8f0 !important;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2"
                                        style="font-size:14px;">
                                        <div class="rounded-3 p-1.5 bg-success-subtle text-success d-inline-flex align-items-center justify-content-center"
                                            style="width:32px;height:32px;">
                                            <i class="bi bi-person-lines-fill fs-6"></i>
                                        </div>
                                        Contact & Verification Details
                                    </h6>
                                    <span
                                        class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1.5 rounded-pill"
                                        style="font-size:11px; font-weight:600;">
                                        <i class="bi bi-patch-check-fill me-1"></i> Verified Profile
                                    </span>
                                </div>
                                <div class="row g-3 text-dark" style="font-size:13px;">
                                    <div class="col-md-6">
                                        <div class="text-muted fw-semibold mb-1.5"
                                            style="font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">
                                            Email Address</div>
                                        <div class="d-flex align-items-center justify-content-between rounded-3 border"
                                            style="background:#f8fafc; padding:10px 14px;">
                                            <a href="#" id="modalEmailLink"
                                                class="text-dark fw-semibold text-decoration-none text-truncate me-2"
                                                style="font-size:12.5px;"><span
                                                    id="modalEmail">ananya@example.com</span></a>
                                            <button class="btn btn-sm btn-link p-0 text-muted btn-copy-email"
                                                id="btnCopyEmail" data-bs-toggle="tooltip" title="Copy Email">
                                                <i class="bi bi-clipboard fs-6"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-muted fw-semibold mb-1.5"
                                            style="font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">
                                            Phone Number</div>
                                        <div class="d-flex align-items-center justify-content-between rounded-3 border"
                                            style="background:#f8fafc; padding:10px 14px;">
                                            <a href="#" id="modalPhoneLink"
                                                class="text-dark fw-semibold text-decoration-none text-truncate me-2"
                                                style="font-size:12.5px;"><span id="modalPhone">+91 98842
                                                    11223</span></a>
                                            <button class="btn btn-sm btn-link p-0 text-muted btn-copy-phone"
                                                id="btnCopyPhone" data-bs-toggle="tooltip" title="Copy Phone">
                                                <i class="bi bi-clipboard fs-6"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-muted fw-semibold mb-1.5"
                                            style="font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">
                                            LinkedIn Profile URL</div>
                                        <div class="d-flex align-items-center justify-content-between rounded-3 border"
                                            style="background:#f8fafc; padding:8px 12px 8px 14px;">
                                            <span class="text-muted text-truncate me-3" style="font-size:12.5px;"
                                                id="modalLinkedInUrlText">https://www.linkedin.com/in/...</span>
                                            <a href="#" id="modalLinkedInLink" target="_blank"
                                                class="btn btn-sm btn-primary text-nowrap fw-semibold px-3 py-1.5"
                                                style="background:#0077b5; border-color:#0077b5; font-size:12px; border-radius:8px;">
                                                <i class="bi bi-linkedin me-1"></i> Open Profile <i
                                                    class="bi bi-box-arrow-up-right ms-1" style="font-size:10px;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Experience & Compensation Card -->
                        <div class="card border-0 shadow-sm mb-4"
                            style="border-radius:16px; background:#ffffff; border:1px solid #e2e8f0 !important;">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                                    <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2"
                                        style="font-size:14px;">
                                        <div class="rounded-3 p-1.5 bg-success-subtle text-success d-inline-flex align-items-center justify-content-center"
                                            style="width:32px;height:32px;">
                                            <i class="bi bi-briefcase-fill fs-6"></i>
                                        </div>
                                        Professional Experience & Compensation
                                    </h6>
                                </div>
                                <div class="row g-3">
                                    <div class="col-6 col-md-4">
                                        <div class="rounded-3 border" style="background:#f8fafc; padding:12px 14px;">
                                            <div class="text-muted fw-semibold mb-1"
                                                style="font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">
                                                Total Experience</div>
                                            <div class="fw-bold text-dark" style="font-size:15px;" id="modalExp">5.5
                                                Years</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-8">
                                        <div class="rounded-3 border" style="background:#f8fafc; padding:12px 14px;">
                                            <div class="text-muted fw-semibold mb-1"
                                                style="font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">
                                                Current Organization</div>
                                            <div class="fw-bold text-dark text-truncate" style="font-size:15px;"
                                                id="modalCompany">Cognizant Digital</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="rounded-3 border" style="background:#f8fafc; padding:12px 14px;">
                                            <div class="text-muted fw-semibold mb-1"
                                                style="font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">
                                                Current CTC</div>
                                            <div class="fw-bold text-dark" style="font-size:15px;" id="modalCurrentCtc">
                                                ₹12.0 LPA</div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="rounded-3 border"
                                            style="background:#f0fdf4; border-color:#bbf7d0 !important; padding:12px 14px;">
                                            <div class="text-success-emphasis fw-semibold mb-1"
                                                style="font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">
                                                Expected CTC</div>
                                            <div class="d-flex align-items-center flex-wrap">
                                                <span class="fw-bold text-success" style="font-size:15px;"
                                                    id="modalExpectedCtc">₹17.5 LPA</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="rounded-3 border" style="background:#f8fafc; padding:12px 14px;">
                                            <div class="text-muted fw-semibold mb-1"
                                                style="font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">
                                                Notice Period</div>
                                            <div
                                                class="d-flex align-items-center justify-content-between flex-wrap gap-1">
                                                <span class="fw-bold text-dark" style="font-size:15px;"
                                                    id="modalNotice">15 Days</span>
                                                <span id="modalNoticeBadge"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Key Skills & Candidate Summary / Pitch Card -->
                        <div class="card border-0 shadow-sm"
                            style="border-radius:16px; background:#ffffff; border:1px solid #e2e8f0 !important;">
                            <div class="card-body p-4">
                                <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2"
                                    style="font-size:14px;">
                                    <div class="rounded-3 p-1.5 bg-warning-subtle text-warning-emphasis d-inline-flex align-items-center justify-content-center"
                                        style="width:32px;height:32px;">
                                        <i class="bi bi-stars fs-6"></i>
                                    </div>
                                    Technical Skills & Cover Note
                                </h6>
                                <div id="modalSkills" class="d-flex flex-wrap gap-2 mb-3"></div>

                                <div class="rounded-3 border position-relative"
                                    style="background:#f8fafc; border-left: 4px solid var(--primary, #087a24) !important; padding:16px;">
                                    <div class="text-muted position-absolute top-0 end-0 m-2"
                                        style="font-size:22px; opacity:0.25;">
                                        <i class="bi bi-quote"></i>
                                    </div>
                                    <div class="fw-semibold text-secondary mb-1.5"
                                        style="font-size:11px; text-transform:uppercase; letter-spacing:0.5px;">
                                        Candidate Cover Note / Introduction</div>
                                    <div class="text-dark fw-normal"
                                        style="font-size:13.5px; line-height:1.6; font-style:italic;" id="modalCover">
                                        "Hi Hiring Team, I saw this role on LinkedIn and am excited to apply! Over 5+
                                        years crafting enterprise SaaS product designs."
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column: HR Quick Actions (col-lg-5) -->
                    <div class="col-lg-5">

                        <!-- HR Quick Action Center Card -->
                        <div class="card border-0 shadow-sm"
                            style="border-radius:16px; background:#ffffff; border:1px solid #e2e8f0 !important;">
                            <div class="card-body p-4">
                                <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2"
                                    style="font-size:14px;">
                                    <div class="rounded-3 p-1.5 bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center"
                                        style="width:32px;height:32px;">
                                        <i class="bi bi-lightning-charge-fill fs-6"></i>
                                    </div>
                                    HR Quick Actions
                                </h6>

                                <div class="d-grid gap-3">


                                    <button type="button"
                                        class="btn btn-outline-danger text-start d-flex align-items-center justify-content-between"
                                        id="downloadResumeBtn"
                                        style="border-radius:12px; padding:14px 16px; border-color:#fee2e2; background:#fff5f5;">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-file-earmark-pdf-fill fs-4 text-danger"></i>
                                            <div>
                                                <div class="fw-bold text-dark" style="font-size:13px;">Download Resume
                                                </div>
                                                <div class="text-muted" style="font-size:11px;">PDF Format • Single
                                                    Dossier</div>
                                            </div>
                                        </div>
                                        <i class="bi bi-download text-muted fs-6"></i>
                                    </button>

                                    <a href="employee-creation.php"
                                        class="btn btn-success text-start d-flex align-items-center justify-content-between shadow-sm"
                                        style="background:var(--primary, #087a24); border-color:var(--primary, #087a24); border-radius:12px; padding:14px 16px;">
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-person-check-fill fs-4 text-white"></i>
                                            <div>
                                                <div class="fw-bold text-white" style="font-size:13px;">Fast-Track
                                                    Onboard</div>
                                                <div class="text-white-50" style="font-size:11px;">Convert to Active
                                                    Employee</div>
                                            </div>
                                        </div>
                                        <i class="bi bi-arrow-right-short fs-4 text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer border-top bg-white px-4 py-3 d-flex justify-content-between">
                <div class="text-muted small">
                    <i class="bi bi-shield-check text-success me-1"></i> Data synced directly via API integration
                </div>
                <button type="button" class="btn btn-outline-secondary px-4 fw-semibold" data-bs-dismiss="modal"
                    style="border-radius:10px;">Close Profile</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2: Add Candidate Manually / Import from LinkedIn -->
<div class="modal fade" id="addLinkedInApplicantModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold"><i class="bi bi-linkedin text-primary me-2"></i>Add Applicant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addApplicantForm">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Full Name *</label>
                        <input type="text" class="form-control" name="full_name" placeholder="e.g. Ramesh Kumar"
                            required>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Email Address *</label>
                            <input type="email" class="form-control" name="email" placeholder="ramesh@example.com"
                                required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="+91 98765 43210">
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">LinkedIn Profile URL *</label>
                        <input type="url" class="form-control" name="linkedin_url" placeholder="https://www.linkedin.com/in/username" required>
                    </div> -->
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Applied Position</label>
                            <select class="form-select select2" name="job_title">
                                <option value="Senior UI/UX Designer">Senior UI/UX Designer</option>
                                <option value="Lead Backend Engineer">Lead Backend Engineer</option>
                                <option value="iOS App Developer">iOS App Developer</option>
                                <option value="HR Talent Acquisition Specialist">HR Talent Acquisition Specialist
                                </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Total Experience</label>
                            <input type="text" class="form-control" name="experience" placeholder="e.g. 4.5 Years">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Expected CTC</label>
                            <input type="text" class="form-control" name="expected_ctc" placeholder="e.g. ₹16 LPA">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Notice Period</label>
                            <input type="text" class="form-control" name="notice_period"
                                placeholder="e.g. Immediate / 15 days">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"
                        style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">Save
                        Candidate</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 3: Share Job on LinkedIn Modal -->
<div class="modal fade" id="linkedinShareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold"><i class="bi bi-linkedin text-primary me-2"></i>Post & Share Job on
                    LinkedIn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Select Job Opening</label>
                    <select class="form-select select2" id="shareJobSelect">
                        <option value="JOB-101" data-title="Senior UI/UX Designer" data-exp="4-6 yrs"
                            data-loc="Chennai / Hybrid">Senior UI/UX Designer (JOB-101)</option>
                        <option value="JOB-102" data-title="Lead Backend Engineer" data-exp="5+ yrs"
                            data-loc="Bangalore / Remote">Lead Backend Engineer (JOB-102)</option>
                        <option value="JOB-103" data-title="iOS App Developer" data-exp="3-5 yrs" data-loc="Chennai">iOS
                            App Developer (JOB-103)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Direct Apply Link for
                        Candidates</label>
                    <div class="input-group">
                        <input type="text" class="form-control bg-light" id="shareApplyUrl" readonly>
                        <button class="btn btn-outline-secondary" type="button" id="copyShareUrlBtn">
                            <i class="bi bi-clipboard me-1"></i> Copy Link
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Pre-Formatted LinkedIn Post
                        Text</label>
                    <textarea class="form-control bg-light" id="sharePostTemplate" rows="4" readonly></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary w-100" id="copyPostTextBtn">
                        <i class="bi bi-copy me-1"></i> Copy Post Text
                    </button>
                    <a href="#" id="openLinkedInShareUrl" target="_blank" class="btn btn-primary w-100"
                        style="background:#0077b5; border-color:#0077b5;">
                        <i class="bi bi-linkedin me-1"></i> Post on LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 4: Forward Candidate Resume to Team Lead -->
<div class="modal fade" id="forwardTLModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold"
                        style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;line-height:1;text-align:center;">
                        <i class="bi bi-person-up"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Forward Resume to Team Lead</h4>
                        <div class="text-muted" style="font-size:13px;" id="forwardCandSubtitle">Shortlist Candidate &
                            Assign Team Lead for Technical Interview</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="forwardTLForm">
                <input type="hidden" id="forward_candidate_id" name="candidate_id">
                <input type="hidden" id="forward_candidate_name" name="candidate_name">
                <input type="hidden" id="forward_job_title" name="job_title">
                <input type="hidden" id="forward_source" name="source">
                <input type="hidden" name="action" value="assign_tl">

                <div class="modal-body p-4">
                    <!-- Candidate Summary Box -->
                    <div class="card p-3 bg-light border-0 mb-3" style="border-radius:12px;">
                        <h6 class="fw-bold text-dark mb-2"><i class="bi bi-person-badge text-primary me-1"></i>
                            Candidate Profile Summary</h6>
                        <div class="row g-2 text-dark" style="font-size:13px;">
                            <div class="col-md-6"><strong>Candidate Name:</strong> <span id="forwardDispName"
                                    class="fw-bold text-success">-</span></div>
                            <div class="col-md-6"><strong>Applied Position:</strong> <span id="forwardDispJob"
                                    class="fw-bold">-</span></div>
                            <div class="col-md-6"><strong>Experience & Company:</strong> <span
                                    id="forwardDispExp">-</span></div>
                            <div class="col-md-6"><strong>Source Channel:</strong> <span id="forwardDispSource"
                                    class="badge bg-light text-muted border">-</span></div>
                            <div class="col-12 mt-1"><strong>Key Skills:</strong> <span id="forwardDispSkills"
                                    class="text-muted">-</span></div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Select Target Team /
                                Department *</label>
                            <select class="form-select select2" id="forward_team_select" name="department" required>
                                <option value="Frontend Engineering Team" selected>Frontend Engineering Team</option>
                                <option value="Backend Engineering Team">Backend Engineering Team</option>
                                <option value="UI/UX Design Team">UI/UX Design Team</option>
                                <option value="Mobile / iOS Engineering Team">Mobile / iOS Engineering Team</option>
                                <option value="Marketing & PPC Team">Marketing & PPC Team</option>
                                <option value="HR & Talent Acquisition Team">HR & Talent Acquisition Team</option>
                                <option value="Finance & Accounts Team">Finance & Accounts Team</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Assign Team Lead (TL)
                                *</label>
                            <select class="form-select select2" id="forward_tl_select" name="assigned_tl" required>
                                <option value="Santhosh Kumar (Frontend Tech Lead)">Santhosh Kumar (Frontend Tech Lead)
                                </option>
                                <option value="Anand (Senior Frontend Lead)">Anand (Senior Frontend Lead)</option>
                                <option value="Karthik V (Backend Tech Lead)">Karthik V (Backend Tech Lead)</option>
                                <option value="Ramesh (Lead Architect)">Ramesh (Lead Architect)</option>
                                <option value="Deepak (Lead UI/UX Designer)">Deepak (Lead UI/UX Designer)</option>
                                <option value="Anitha R (iOS Mobile Lead)">Anitha R (iOS Mobile Lead)</option>
                                <option value="Priya S (Performance Marketing Lead)">Priya S (Performance Marketing
                                    Lead)</option>
                                <option value="Meena S (HR Operations Lead)">Meena S (HR Operations Lead)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Interview Evaluation Round
                                *</label>
                            <select class="form-select select2" name="round" required>
                                <option value="Tech & Coding Round 1">Technical Round 1 (Live Coding / Practical)
                                </option>
                                <option value="System Design & Architecture">System Design & Architecture</option>
                                <option value="Portfolio & UI/UX Design Review">Portfolio & UI/UX Design Review</option>
                                <option value="Domain & PPC Strategy Test">Domain & PPC Strategy Test</option>
                                <option value="Managerial & Culture Fit">Managerial & Culture Fit</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Evaluator Role</label>
                            <input type="text" class="form-control" name="tl_role" value="Technical Evaluator">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Manager Shortlist Notes & Key
                            Skill Focus Areas for TL</label>
                        <textarea class="form-control" name="instructions" rows="3"
                            placeholder="Provide instructions for Team Lead (e.g. Check React/Next.js experience, evaluate database indexing, assess design system familiarity)..."></textarea>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"
                        style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                        <i class="bi bi-send-check me-1"></i> Forward Resume to TL
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2: Schedule Candidate Interview & Assign to Team Lead (HR Action) -->
<div class="modal fade" id="scheduleInterviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold"
                        style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-calendar2-plus"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Schedule Candidate Interview & Assign TL</h4>
                        <div class="text-muted" style="font-size:13px;">Schedule Interview, Assign Team Lead Evaluator &
                            Send Calendar Invites</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="scheduleInterviewForm">
                <input type="hidden" id="schedCandidateId" name="candidate_id">
                <input type="hidden" id="schedCandidateName" name="candidate_name">
                <input type="hidden" id="schedJobTitle" name="job_title">
                <input type="hidden" id="schedSource" name="source">
                <input type="hidden" name="action" value="schedule_and_assign_tl">

                <div class="modal-body p-4">
                    <!-- Candidate Select Dropdown (Fetched from Table) -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;"><i
                                class="bi bi-person-check-fill text-success me-1"></i> Select Candidate from Table
                            Applications *</label>
                        <select class="form-select select2 fw-bold" id="schedCandidateSelect" required>
                            <option value="" disabled selected>-- Select Candidate from Applications Table --</option>
                        </select>
                    </div>

                    <!-- Candidate Info Display Box -->
                    <div class="p-3 mb-3 rounded-3 d-flex align-items-center justify-content-between"
                        style="background:#e8f7ea; border:1px solid #bbf7d0;">
                        <div>
                            <div class="fw-bold text-dark" style="font-size:14px;" id="schedDispName">Select a Candidate
                                Above</div>
                            <div class="text-muted" style="font-size:12px;" id="schedDispRole">Applied Position</div>
                        </div>
                        <span class="badge bg-success text-white px-3 py-1.5 rounded-pill" style="font-size:11.5px;"
                            id="schedDispSource">Walk-in Application</span>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Select Interview Round
                                *</label>
                            <select class="form-select select2" id="schedRoundSelect" name="round" required>
                                <option value="Technical Round 1 (Live Coding / Practical)">Technical Round 1 (Live
                                    Coding / Practical)</option>
                                <option value="Technical Round 2 (System Architecture / Portfolio)">Technical Round 2
                                    (System Architecture / Portfolio)</option>
                                <option value="Managerial & Culture Fit Discussion">Managerial & Culture Fit Discussion
                                </option>
                                <option value="Final Salary & Offer Negotiation">Final Salary & Offer Negotiation
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Assign Team Lead / Evaluator
                                *</label>
                            <select class="form-select select2" id="schedInterviewerSelect" name="interviewer" required>
                                <option value="Santhosh Kumar (Frontend Tech Lead)">Santhosh Kumar (Frontend Tech Lead)
                                </option>
                                <option value="Karthik V (Backend Tech Lead)">Karthik V (Backend Tech Lead)</option>
                                <option value="Anitha R (iOS Mobile Tech Lead)">Anitha R (iOS Mobile Tech Lead)</option>
                                <option value="Deepak (Lead UI/UX Designer)">Deepak (Lead UI/UX Designer)</option>
                                <option value="Ramesh (Principal Architect)">Ramesh (Principal Architect)</option>
                                <option value="Sarah Mitchell (HR Head)">Sarah Mitchell (HR Head)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <div class="date-picker">
                                <label class="form-label fw-semibold" style="font-size:13px;">Interview Date *</label>
                                <input type="text" class="date-input form-control" placeholder="DD-MM-YYYY"
                                    maxlength="10" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Start Time *</label>
                            <input type="time" class="form-control" id="schedTimeInput" name="interview_time"
                                value="11:00" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Duration</label>
                            <select class="form-select select2" id="schedDurationSelect" name="duration">
                                <option value="30 mins">30 minutes</option>
                                <option value="45 mins" selected>45 minutes</option>
                                <option value="60 mins">60 minutes</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Meeting Link / Room
                            Location</label>
                        <input type="text" class="form-control" id="schedLinkInput" name="meeting_link"
                            value="https://meet.google.com/xyz-abcd-efg"
                            placeholder="https://meet.google.com/... or Room 3B">
                    </div>

                    <!-- Contact & Send Channels -->
                    <div class="p-3 rounded-3 bg-light border mb-2">
                        <h6 class="fw-bold text-dark mb-3" style="font-size:13px;"><i
                                class="bi bi-send-fill me-1 text-success"></i> Invites & Notifications</h6>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:12.5px;"><i
                                        class="bi bi-envelope me-1 text-primary"></i> Candidate Email</label>
                                <input type="email" class="form-control" id="schedCandidateEmail" name="candidate_email"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:12.5px;"><i
                                        class="bi bi-whatsapp me-1 text-success"></i> WhatsApp Phone</label>
                                <input type="text" class="form-control" id="schedCandidatePhone" name="candidate_phone"
                                    required>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-4 flex-wrap pt-2 border-top">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sendEmailToggle" name="send_email"
                                    checked>
                                <label class="form-check-label fw-semibold" for="sendEmailToggle"
                                    style="font-size:12.5px;">
                                    <i class="bi bi-envelope-at-fill text-primary me-1"></i> Send Email Calendar Invite
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sendWhatsappToggle"
                                    name="send_whatsapp" checked>
                                <label class="form-check-label fw-semibold" for="sendWhatsappToggle"
                                    style="font-size:12.5px;">
                                    <i class="bi bi-whatsapp text-success me-1"></i> Send WhatsApp Message
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"
                        style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                        <i class="bi bi-calendar-check me-1"></i> Schedule Interview & Assign TL
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2B: Reschedule Candidate Interview (Missed / Follow-up Action) -->
<div class="modal fade" id="rescheduleInterviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#fffbeb;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold"
                        style="width:44px;height:44px;background:#d97706;font-size:18px;">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Reschedule Candidate Interview</h4>
                        <div class="text-muted" style="font-size:13px;">Reschedule Missed Interview, Update Slot &
                            Reassign TL Evaluator</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="rescheduleInterviewForm">
                <input type="hidden" id="reschedCandidateId" name="candidate_id">
                <input type="hidden" id="reschedCandidateName" name="candidate_name">
                <input type="hidden" id="reschedJobTitle" name="job_title">
                <input type="hidden" id="reschedSource" name="source">
                <input type="hidden" name="action" value="reschedule_and_assign_tl">

                <div class="modal-body p-4">
                    <!-- Alert Notice for Missed Interview -->
                    <div class="alert alert-warning border-0 d-flex align-items-center gap-2 mb-3"
                        style="background:#fef3c7; color:#92400e; border-radius:10px; font-size:13px;">
                        <i class="bi bi-exclamation-triangle-fill fs-5 flex-shrink-0"></i>
                        <div><strong>Reschedule Mode:</strong> Candidate missed or requested to move their scheduled
                            interview. Select new slot and notify candidate & TL.</div>
                    </div>

                    <!-- Candidate Select Dropdown -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;"><i
                                class="bi bi-person-check-fill text-warning me-1"></i> Select Candidate to Reschedule
                            *</label>
                        <select class="form-select select2 fw-bold" id="reschedCandidateSelect" required>
                            <option value="" disabled selected>-- Select Candidate from Applications Table --</option>
                        </select>
                    </div>

                    <!-- Candidate Info Display Box -->
                    <div class="p-3 mb-3 rounded-3 d-flex align-items-center justify-content-between"
                        style="background:#fffde7; border:1px solid #fef08a;">
                        <div>
                            <div class="fw-bold text-dark" style="font-size:14px;" id="reschedDispName">Select a
                                Candidate Above</div>
                            <div class="text-muted" style="font-size:12px;" id="reschedDispRole">Applied Position</div>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill" style="font-size:11.5px;"
                            id="reschedDispSource">Missed / Reschedule</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Reason for Rescheduling *</label>
                        <select class="form-select select2" id="reschedReasonSelect" name="reschedule_reason" required>
                            <option value="Candidate Missed Interview / No Show">Candidate Missed Scheduled Interview
                                (No Show)</option>
                            <option value="Candidate Requested Slot Change">Candidate Requested Time/Date Change
                            </option>
                            <option value="Interviewer / TL Unavailable">Interviewer / Team Lead Unavailable</option>
                            <option value="Technical / Meeting Link Issue">Technical / Network / Meeting Link Issue
                            </option>
                            <option value="Emergency Postponement">Emergency Postponement & Follow-up</option>
                        </select>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Select Interview Round
                                *</label>
                            <select class="form-select select2" id="reschedRoundSelect" name="round" required>
                                <option value="Technical Round 1 (Live Coding / Practical)">Technical Round 1 (Live
                                    Coding / Practical)</option>
                                <option value="Technical Round 2 (System Architecture / Portfolio)">Technical Round 2
                                    (System Architecture / Portfolio)</option>
                                <option value="Managerial & Culture Fit Discussion">Managerial & Culture Fit Discussion
                                </option>
                                <option value="Final Salary & Offer Negotiation">Final Salary & Offer Negotiation
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Assign / Reassign Team Lead
                                Evaluator *</label>
                            <select class="form-select select2" id="reschedInterviewerSelect" name="interviewer"
                                required>
                                <option value="Santhosh Kumar (Frontend Tech Lead)">Santhosh Kumar (Frontend Tech Lead)
                                </option>
                                <option value="Karthik V (Backend Tech Lead)">Karthik V (Backend Tech Lead)</option>
                                <option value="Anitha R (iOS Mobile Tech Lead)">Anitha R (iOS Mobile Tech Lead)</option>
                                <option value="Deepak (Lead UI/UX Designer)">Deepak (Lead UI/UX Designer)</option>
                                <option value="Ramesh (Principal Architect)">Ramesh (Principal Architect)</option>
                                <option value="Sarah Mitchell (HR Head)">Sarah Mitchell (HR Head)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">New Interview Date *</label>
                            <input type="date" class="form-control" id="reschedDateInput" name="interview_date"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">New Start Time *</label>
                            <input type="time" class="form-control" id="reschedTimeInput" name="interview_time"
                                value="14:00" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Duration</label>
                            <select class="form-select select2" id="reschedDurationSelect" name="duration">
                                <option value="30 mins">30 minutes</option>
                                <option value="45 mins" selected>45 minutes</option>
                                <option value="60 mins">60 minutes</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">New Meeting Link / Room
                            Location</label>
                        <input type="text" class="form-control" id="reschedLinkInput" name="meeting_link"
                            value="https://meet.google.com/xyz-abcd-efg"
                            placeholder="https://meet.google.com/... or Room 3B">
                    </div>

                    <!-- Contact & Send Channels -->
                    <div class="p-3 rounded-3 bg-light border mb-2">
                        <h6 class="fw-bold text-dark mb-3" style="font-size:13px;"><i
                                class="bi bi-send-fill me-1 text-warning"></i> Updated Invites & Reminders</h6>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:12.5px;"><i
                                        class="bi bi-envelope me-1 text-primary"></i> Candidate Email</label>
                                <input type="email" class="form-control" id="reschedCandidateEmail"
                                    name="candidate_email" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:12.5px;"><i
                                        class="bi bi-whatsapp me-1 text-success"></i> WhatsApp Phone</label>
                                <input type="text" class="form-control" id="reschedCandidatePhone"
                                    name="candidate_phone" required>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-4 flex-wrap pt-2 border-top">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="reschedSendEmailToggle"
                                    name="send_email" checked>
                                <label class="form-check-label fw-semibold" for="reschedSendEmailToggle"
                                    style="font-size:12.5px;">
                                    <i class="bi bi-envelope-at-fill text-primary me-1"></i> Send Rescheduled Email
                                    Invite
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="reschedSendWhatsappToggle"
                                    name="send_whatsapp" checked>
                                <label class="form-check-label fw-semibold" for="reschedSendWhatsappToggle"
                                    style="font-size:12.5px;">
                                    <i class="bi bi-whatsapp text-success me-1"></i> Send Rescheduled WhatsApp Message
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning fw-semibold text-dark"
                        style="background:#f59e0b; border-color:#f59e0b;">
                        <i class="bi bi-arrow-repeat me-1"></i> Reschedule Interview & Notify TL
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 3: View TL Scorecard Breakdown Popup in LinkedIn Applications -->
<div class="modal fade" id="viewTLScorecardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold"
                        id="tlScoreAvatar"
                        style="width:48px;height:48px;background:var(--primary, #087a24);font-size:20px;">
                        A
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="modal-title fw-bold text-dark mb-0" id="tlScoreCandName">Candidate Name</h4>
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1"
                                style="font-size:11px;" id="tlScoreStatusBadge"><i
                                    class="bi bi-check-circle-fill me-1"></i> Evaluated - Sent to HR</span>
                        </div>
                        <div class="text-muted" style="font-size:13px;" id="tlScoreSubtitle">Position • Interview Round
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <!-- Overview Header Card -->
                <div class="card p-3 bg-light border-0 mb-3" style="border-radius:12px;">
                    <div class="row g-2 text-dark" style="font-size:13px;">
                        <div class="col-6"><strong>Assigned Team Lead (TL):</strong> <span id="tlScoreEvaluator"
                                class="fw-bold text-primary">-</span></div>
                        <div class="col-6"><strong>Interview Round:</strong> <span id="tlScoreRoundText"
                                class="fw-bold text-dark">-</span></div>
                    </div>
                </div>

                <h6 class="fw-bold text-dark mb-3"><i class="bi bi-sliders text-success me-1"></i> Team Lead Performance
                    Ratings Breakdown</h6>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <div class="p-3 rounded-3 text-center border" style="background:#f8fafc;">
                            <div class="text-muted small fw-semibold mb-1">Technical / Domain</div>
                            <div class="fs-4 fw-extrabold text-primary" id="tlScoreTechVal">8.0 / 10</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded-3 text-center border" style="background:#f8fafc;">
                            <div class="text-muted small fw-semibold mb-1">Practical Task / Code</div>
                            <div class="fs-4 fw-extrabold text-primary" id="tlScorePracticalVal">8.0 / 10</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded-3 text-center border" style="background:#f8fafc;">
                            <div class="text-muted small fw-semibold mb-1">Communication & Culture</div>
                            <div class="fs-4 fw-extrabold text-primary" id="tlScoreCultureVal">8.0 / 10</div>
                        </div>
                    </div>
                </div>

                <!-- Overall Average Box -->
                <div class="p-3 mb-3 rounded-3 d-flex align-items-center justify-content-between"
                    style="background:#e8f7ea; border:1px solid #bbf7d0;">
                    <div>
                        <div class="fw-bold text-dark" style="font-size:13px;">Calculated Overall Interview Score:</div>
                        <div class="text-muted" style="font-size:11.5px;">Average of Technical, Practical, and Culture
                            scores submitted by TL</div>
                    </div>
                    <div class="fs-3 fw-extrabold text-success" id="tlScoreOverallVal">8.8 / 10</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">TL Recommendation:</label>
                    <div id="tlScoreRecBadge" class="fw-bold fs-6 text-dark">🚀 Strong Hire (Highly Recommended)</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Detailed TL Feedback &
                        Comments:</label>
                    <div class="p-3 bg-light border rounded-3 text-dark"
                        style="font-size:13px; min-height:80px; white-space:pre-wrap;" id="tlScoreCommentsBox">
                        "Candidate displayed exceptional problem solving and clean architecture knowledge."
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0 d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-danger fw-bold px-3" id="btnScoreReject"
                        onclick="updateCandidateStatusFromModal('Rejected')">
                        <i class="bi bi-x-circle-fill me-1"></i> Reject Candidate
                    </button>
                    <button type="button" class="btn btn-success fw-bold px-3" id="btnScoreApprove"
                        onclick="updateCandidateStatusFromModal('Approved')">
                        <i class="bi bi-check-circle-fill me-1"></i> Approve for Offer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="./assets/js/pages/linkedin-applications.js?v=<?php echo time(); ?>"></script>
 

<?php include 'footer.php'; ?>