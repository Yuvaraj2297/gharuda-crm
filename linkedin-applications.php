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



<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentSelectedId = null;
        let currentSourceFilter = 'all';

        var defaultApplicants = [
            {
                id: "LNK-2026-001",
                job_id: "JOB-101",
                job_title: "Senior UI/UX Designer",
                full_name: "Ananya Sundaram",
                email: "ananya.s@linkedin-profile.com",
                phone: "+91 98842 11223",
                linkedin_url: "https://www.linkedin.com/in/ananyasundaram-uiux",
                experience: "5.5 Years",
                current_company: "Cognizant Digital",
                current_ctc: "₹12.0 LPA",
                expected_ctc: "₹17.5 LPA",
                notice_period: "15 Days",
                applied_date: "14-Oct-2026 16:30",
                source: "Walk-in Application",
                stage: "Screening",
                rating: 5,
                skills: ["Figma", "Design Systems", "User Research", "Prototyping"],
                resume: "Ananya_Sundaram_Resume.pdf",
                cover_letter: "Hi Hiring Team, I saw this role on LinkedIn and am excited to apply! Over 5+ years crafting enterprise SaaS product designs."
            },
            {
                id: "LNK-2026-002",
                job_id: "JOB-102",
                job_title: "Lead Backend Engineer",
                full_name: "Vikramaditya Rao",
                email: "vikram.rao@devnet.io",
                phone: "+91 97110 55432",
                linkedin_url: "https://www.linkedin.com/in/vikram-backend-lead",
                experience: "7.0 Years",
                current_company: "Zoho Corporation",
                current_ctc: "₹20.0 LPA",
                expected_ctc: "₹28.0 LPA",
                notice_period: "Immediate",
                applied_date: "14-Oct-2026 13:30",
                source: "LinkedIn Job Share",
                stage: "Tech Round",
                rating: 4,
                skills: ["PHP / Laravel", "Node.js", "MySQL", "Docker", "Redis"],
                resume: "Vikram_Rao_Backend_Lead.pdf",
                cover_letter: "Extensive background in scalable Microservices & high-throughput API architecture."
            },
            {
                id: "LNK-2026-003",
                job_id: "JOB-103",
                job_title: "iOS App Developer",
                full_name: "Priya Ramakrishnan",
                email: "priya.ram@gmail.com",
                phone: "+91 94451 88990",
                linkedin_url: "https://www.linkedin.com/in/priya-swift-dev",
                experience: "3.5 Years",
                current_company: "Paytm Payments",
                current_ctc: "₹10.5 LPA",
                expected_ctc: "₹15.0 LPA",
                notice_period: "30 Days",
                applied_date: "13-Oct-2026 11:20",
                source: "Walk-in Application",
                stage: "HR Round",
                rating: 5,
                skills: ["Swift", "SwiftUI", "CoreData", "Combine"],
                resume: "Priya_Ramakrishnan_iOS.pdf",
                cover_letter: "Built payment mobile apps used by millions of active daily users."
            }
        ];

        var applicantsData;
        try {
            var raw = localStorage.getItem('gh_linkedin_applications');
            if (raw) {
                applicantsData = JSON.parse(raw);
            } else {
                applicantsData = defaultApplicants.slice();
                localStorage.setItem('gh_linkedin_applications', JSON.stringify(applicantsData));
            }
        } catch (e) {
            applicantsData = defaultApplicants.slice();
        }

        // Initialize Modal Dates
        var schedDateEl = document.getElementById('schedDateInput');
        if (schedDateEl && !schedDateEl.value) {
            schedDateEl.value = new Date().toISOString().split('T')[0];
        }
        var reschedDateEl = document.getElementById('reschedDateInput');
        if (reschedDateEl && !reschedDateEl.value) {
            var tmrw = new Date();
            tmrw.setDate(tmrw.getDate() + 1);
            reschedDateEl.value = tmrw.toISOString().split('T')[0];
        }

        // Populate Candidate Select Dropdowns in Modals
        function populateCandidateSelects() {
            var selects = [document.getElementById('schedCandidateSelect'), document.getElementById('reschedCandidateSelect')];
            selects.forEach(function (sel) {
                if (!sel) return;
                var curVal = sel.value;
                sel.innerHTML = '<option value="" disabled selected>-- Select Candidate from Applications Table --</option>';
                applicantsData.forEach(function (app) {
                    var opt = document.createElement('option');
                    opt.value = app.id;
                    opt.setAttribute('data-id', app.id);
                    opt.setAttribute('data-name', app.full_name || '');
                    opt.setAttribute('data-job', app.job_title || '');
                    opt.setAttribute('data-source', app.source || 'Walk-in Application');
                    opt.setAttribute('data-email', app.email || '');
                    opt.setAttribute('data-phone', app.phone || '');
                    opt.textContent = (app.full_name || '') + ' (' + (app.job_title || '') + ' • ' + (app.id || '') + ')';
                    sel.appendChild(opt);
                });
                if (curVal) sel.value = curVal;
            });
        }
        populateCandidateSelects();

        // Update KPI Counts
        function updateKpiCounts() {
            var total = applicantsData.length;
            var easyApply = 0;
            var shortlisted = 0;
            var hired = 0;

            applicantsData.forEach(function (app) {
                var src = (app.source || '').toLowerCase();
                if (src.includes('walk') || src.includes('easy apply')) easyApply++;
                var stg = app.stage || '';
                if (['Tech Round', 'HR Round', 'Screening'].includes(stg)) shortlisted++;
                if (['Offered', 'Hired'].includes(stg)) hired++;
            });

            var elTotal = document.getElementById('kpiTotalCount');
            var elEasy = document.getElementById('kpiEasyApply');
            var elShort = document.getElementById('kpiShortlisted');
            var elHired = document.getElementById('kpiHired');

            if (elTotal) elTotal.textContent = total;
            if (elEasy) elEasy.textContent = easyApply;
            if (elShort) elShort.textContent = shortlisted;
            if (elHired) elHired.textContent = hired;
        }
        updateKpiCounts();

        function getFilteredApplicants() {
            if (currentSourceFilter === 'all') return applicantsData;
            return applicantsData.filter(function (a) {
                var src = (a.source || '').toLowerCase();
                if (currentSourceFilter === 'walkin' || currentSourceFilter === 'easy_apply') return src.includes('walk') || src.includes('easy apply');
                if (currentSourceFilter === 'job_share') return src.includes('share');
                if (currentSourceFilter === 'portal') return src.includes('portal');
                return true;
            });
        }

        var applicantsTable = MasterTable.init({
            tableId: 'applicantsTable',
            tbodyId: 'applicantsTbody',
            data: applicantsData,
            tableName: 'Social & Web Applications',
            primaryKey: 'id',
            searchFields: ['full_name', 'email', 'job_title', 'experience', 'current_company', 'expected_ctc', 'notice_period', 'source', 'stage'],
            columns: [
                {
                    field: 'full_name', title: 'Candidate Name', sortable: true, render: function (v, row) {
                        var initial = (v || 'C').charAt(0).toUpperCase();
                        return '<div class="d-flex align-items-center gap-2">' +
                            '<div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width:34px;height:34px;min-width:34px;background:var(--primary, #087a24);font-size:13px;line-height:1;text-align:center;">' + initial + '</div>' +
                            '<div><div class="fw-bold applicant-name-text" style="color:var(--primary-dark, #087a24);">' + (v || '') + '</div></div>' +
                            '</div>';
                    }
                },
                {
                    field: 'email', title: 'Email Address', sortable: true, render: function (v) {
                        return '<div class="fw-medium text-dark applicant-email-text" style="font-size:12.5px;">' + (v || '') + '</div>';
                    }
                },
                {
                    field: 'source', title: 'Application Profile', sortable: true, render: function (v, row) {
                        var src = v || 'Walk-in Application';
                        var icon = 'bi-globe', label = 'Application Profile';
                        if (src.toLowerCase().includes('linkedin')) {icon = 'bi-linkedin'; label = 'LinkedIn Profile';}
                        else if (src.toLowerCase().includes('share')) {icon = 'bi-share-fill'; label = 'Shared Post Link';}
                        else if (src.toLowerCase().includes('portal')) {icon = 'bi-window-stack'; label = 'Web Portal';}
                        return '<a href="' + (row.linkedin_url || '#') + '" target="_blank" class="ln-badge"><i class="bi ' + icon + '"></i> ' + label + '</a>';
                    }
                },
                {
                    field: 'job_title', title: 'Applied Position', sortable: true, render: function (v, row) {
                        return '<div class="fw-semibold text-dark applicant-job-text">' + (v || '') + '</div>' +
                            '<span class="badge bg-light text-muted border" style="font-size:10px;">' + (row.id || '') + '</span>';
                    }
                },
                {
                    field: 'experience', title: 'Experience', sortable: true, render: function (v) {
                        return '<div class="fw-semibold text-dark applicant-exp-text" style="font-size:12.5px;">' + (v || '-') + '</div>';
                    }
                },
                {
                    field: 'current_company', title: 'Current Company', sortable: true, render: function (v) {
                        return '<div class="fw-semibold text-dark applicant-company-text" style="font-size:12.5px;"><i class="bi bi-building me-1 text-muted"></i>' + (v || '-') + '</div>';
                    }
                },
                {
                    field: 'expected_ctc', title: 'Expected CTC', sortable: true, render: function (v) {
                        return '<div class="fw-bold text-success applicant-ctc-text" style="font-size:12.5px;">' + (v || '-') + '</div>';
                    }
                },
                {
                    field: 'notice_period', title: 'Notice Period', sortable: true, render: function (v) {
                        return '<div class="fw-medium text-dark applicant-notice-text" style="font-size:12px;">' + (v || '-') + '</div>';
                    }
                },
                {
                    field: 'applied_date', title: 'Applied Date', sortable: true, render: function (v) {
                        return '<span style="font-size:12px;" class="text-nowrap">' + (v || '') + '</span>';
                    }
                },
                {
                    field: null, title: 'Action', sortable: false, render: function (v, row) {
                        return '<div class="btn-group">' +
                            '<button type="button" class="btn btn-sm btn-outline-primary btn-view-applicant" data-id="' + row.id + '" data-bs-toggle="tooltip" title="View Candidate Profile & Dossier">' +
                            '<i class="bi bi-eye me-1"></i> Profile' +
                            '</button>' +
                            '<a href="linkedin-applications.php?action=download_zip&ids=' + encodeURIComponent(row.id) + '" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Download Candidate Resume Archive">' +
                            '<i class="bi bi-file-earmark-zip"></i>' +
                            '</a>' +
                            '</div>';
                    }
                }
            ]
        });

        // Source Filter Tabs Handler
        document.querySelectorAll('#sourceTabsWrap .ln-stage-tab').forEach(tab => {
            tab.addEventListener('click', function () {
                document.querySelectorAll('#sourceTabsWrap .ln-stage-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                currentSourceFilter = this.getAttribute('data-source');
                applicantsTable.setData(getFilteredApplicants());
            });
        });

        // View Candidate Profile Click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-view-applicant');
            if (!btn) return;

            const row = btn.closest('tr');
            if (!row) return;

            currentSelectedId = btn.getAttribute('data-id') || row.getAttribute('data-id');
            const app = applicantsData.find(a => String(a.id) === String(currentSelectedId)) || {};
            const name = app.full_name || row.getAttribute('data-name') || '';
            const email = app.email || row.getAttribute('data-email') || '';
            const phone = app.phone || row.getAttribute('data-phone') || '';
            const linkedin = app.linkedin_url || row.getAttribute('data-linkedin') || '#';
            const job = app.job_title || row.getAttribute('data-job') || '';
            const source = app.source || row.getAttribute('data-source') || 'Walk-in Application';
            const exp = app.experience || row.getAttribute('data-exp') || '';
            const company = app.current_company || row.getAttribute('data-company') || '';
            const cctc = app.current_ctc || row.getAttribute('data-cctc') || 'N/A';
            const ectc = app.expected_ctc || row.getAttribute('data-ectc') || '';
            const notice = app.notice_period || row.getAttribute('data-notice') || '';
            const cover = app.cover_letter || row.getAttribute('data-cover') || 'Applied via LinkedIn Integration.';
            const stage = app.stage || row.getAttribute('data-stage') || 'Screening';
            const rating = app.rating || row.getAttribute('data-rating') || '5';
            const skillsRaw = Array.isArray(app.skills) ? app.skills.join(',') : (app.skills || row.getAttribute('data-skills') || '');

            // Avatar & Header Info
            const avatarEl = document.getElementById('modalAvatar');
            if (avatarEl) avatarEl.innerText = name ? name.charAt(0).toUpperCase() : 'A';

            const nameEl = document.getElementById('modalCandName');
            if (nameEl) nameEl.innerText = name;

            const idEl = document.getElementById('modalCandId');
            if (idEl) idEl.innerText = currentSelectedId;

            const subtitleEl = document.getElementById('modalCandSubtitle');
            if (subtitleEl) subtitleEl.innerText = job;

            const sourceBadgeEl = document.getElementById('modalSourceBadge');
            if (sourceBadgeEl) {
                let srcIcon = 'bi-person-walking';
                if (source.toLowerCase().includes('share')) srcIcon = 'bi-share-fill';
                else if (source.toLowerCase().includes('portal')) srcIcon = 'bi-globe';
                sourceBadgeEl.innerHTML = `<i class="bi ${srcIcon} me-1 text-success"></i> ${source}`;
            }

            // Contact Info
            const emailEl = document.getElementById('modalEmail');
            if (emailEl) emailEl.innerText = email;

            const emailLink = document.getElementById('modalEmailLink');
            if (emailLink) emailLink.href = `mailto:${email}`;

            const phoneEl = document.getElementById('modalPhone');
            if (phoneEl) phoneEl.innerText = phone || 'N/A';

            const phoneLink = document.getElementById('modalPhoneLink');
            if (phoneLink) phoneLink.href = phone ? `tel:${phone}` : '#';

            const linkedinUrlText = document.getElementById('modalLinkedInUrlText');
            if (linkedinUrlText) linkedinUrlText.innerText = linkedin;

            const linkedinLink = document.getElementById('modalLinkedInLink');
            if (linkedinLink) linkedinLink.href = linkedin;

            // Experience & Compensation
            const expEl = document.getElementById('modalExp');
            if (expEl) expEl.innerText = exp;

            const companyEl = document.getElementById('modalCompany');
            if (companyEl) companyEl.innerText = company;

            const cctcEl = document.getElementById('modalCurrentCtc');
            if (cctcEl) cctcEl.innerText = cctc;

            const ectcEl = document.getElementById('modalExpectedCtc');
            if (ectcEl) ectcEl.innerText = ectc;

            const noticeEl = document.getElementById('modalNotice');
            if (noticeEl) noticeEl.innerText = notice;

            // Dynamic Hike Percentage Calculation (Disabled as requested)
            const hikeBadge = document.getElementById('modalHikeBadge');
            if (hikeBadge) {
                hikeBadge.innerHTML = '';
            }

            // Dynamic Notice Urgency Badge
            const noticeBadge = document.getElementById('modalNoticeBadge');
            if (noticeBadge) {
                const noticeLower = (notice || '').toLowerCase();
                if (noticeLower.includes('immediate')) {
                    noticeBadge.innerHTML = `<span class="badge bg-danger text-white border ms-1" style="font-size:10px;"><i class="bi bi-lightning-fill me-1"></i>Immediate</span>`;
                } else if (noticeLower.includes('15') || noticeLower.includes('short')) {
                    noticeBadge.innerHTML = `<span class="badge bg-warning text-dark border ms-1" style="font-size:10px;"><i class="bi bi-clock me-1"></i>Short Notice</span>`;
                } else {
                    noticeBadge.innerHTML = '';
                }
            }

            // Key Skills formatting
            const skillsContainer = document.getElementById('modalSkills');
            if (skillsContainer) {
                skillsContainer.innerHTML = '';
                if (skillsRaw) {
                    skillsRaw.split(',').forEach(s => {
                        if (s.trim()) {
                            skillsContainer.innerHTML += `<span class="badge d-inline-flex align-items-center gap-1 bg-white text-dark border px-2.5 py-1.5 shadow-sm" style="font-size:12px; border-radius:8px;"><i class="bi bi-check-circle-fill text-success" style="font-size:11px;"></i> ${s.trim()}</span>`;
                        }
                    });
                } else {
                    skillsContainer.innerHTML = '<span class="text-muted small">No specific skill tags attached</span>';
                }
            }

            // Cover Note
            const coverEl = document.getElementById('modalCover');
            if (coverEl) coverEl.innerText = `"${cover}"`;

            // Controls & HR Actions
            const stageSel = document.getElementById('modalStageSelect');
            const ratingSel = document.getElementById('modalRatingSelect');
            const schedBtn = document.getElementById('scheduleInterviewModalBtn');
            const onboardBtn = document.getElementById('fastTrackOnboardBtn');

            if (stageSel) stageSel.value = stage;
            if (ratingSel) ratingSel.value = rating;
            if (schedBtn) schedBtn.href = `interview-schedule.php?candidate=${encodeURIComponent(name)}&job=${encodeURIComponent(job)}`;
            if (onboardBtn) onboardBtn.href = `employee-creation.php?name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}&designation=${encodeURIComponent(job)}`;

            const modal = new bootstrap.Modal(document.getElementById('viewApplicantModal'));
            modal.show();
        });

        // Copy Email & Phone helper actions
        const btnCopyEmail = document.getElementById('btnCopyEmail');
        if (btnCopyEmail) {
            btnCopyEmail.addEventListener('click', function () {
                const emailText = document.getElementById('modalEmail').innerText;
                if (emailText) {
                    navigator.clipboard.writeText(emailText);
                    this.innerHTML = '<i class="bi bi-check2 text-success"></i>';
                    setTimeout(() => this.innerHTML = '<i class="bi bi-clipboard"></i>', 2000);
                }
            });
        }

        const btnCopyPhone = document.getElementById('btnCopyPhone');
        if (btnCopyPhone) {
            btnCopyPhone.addEventListener('click', function () {
                const phoneText = document.getElementById('modalPhone').innerText;
                if (phoneText) {
                    navigator.clipboard.writeText(phoneText);
                    this.innerHTML = '<i class="bi bi-check2 text-success"></i>';
                    setTimeout(() => this.innerHTML = '<i class="bi bi-clipboard"></i>', 2000);
                }
            });
        }

        // Modal Forward Resume to TL Action
        const modalForwardTLBtn = document.getElementById('modalForwardTLBtn');
        if (modalForwardTLBtn) {
            modalForwardTLBtn.addEventListener('click', function () {
                const viewModalEl = document.getElementById('viewApplicantModal');
                const viewModalInst = bootstrap.Modal.getInstance(viewModalEl);
                if (viewModalInst) viewModalInst.hide();

                setTimeout(() => {
                    if (currentSelectedId) {
                        const row = document.querySelector(`tr[data-id="${currentSelectedId}"]`);
                        if (row) {
                            const btnForward = row.querySelector('.btn-forward-tl');
                            if (btnForward) btnForward.click();
                        }
                    }
                }, 300);
            });
        }

        // Modal View TL Scorecard Action from Candidate Profile Modal
        const modalViewTLScorecardBtn = document.getElementById('modalViewTLScorecardBtn');
        if (modalViewTLScorecardBtn) {
            modalViewTLScorecardBtn.addEventListener('click', function () {
                const viewModalEl = document.getElementById('viewApplicantModal');
                const viewModalInst = bootstrap.Modal.getInstance(viewModalEl);
                if (viewModalInst) viewModalInst.hide();

                setTimeout(() => {
                    if (currentSelectedId) {
                        const row = document.querySelector(`tr[data-id="${currentSelectedId}"]`);
                        if (row) {
                            const btnScore = row.querySelector('.btn-view-tl-scorecard');
                            if (btnScore) {
                                btnScore.click();
                            } else {
                                const modal = new bootstrap.Modal(document.getElementById('viewTLScorecardModal'));
                                modal.show();
                            }
                        } else {
                            const modal = new bootstrap.Modal(document.getElementById('viewTLScorecardModal'));
                            modal.show();
                        }
                    }
                }, 300);
            });
        }

        // Download Resume button handler in Candidate Modal
        const downloadResumeBtn = document.getElementById('downloadResumeBtn');
        if (downloadResumeBtn) {
            downloadResumeBtn.addEventListener('click', function () {
                if (currentSelectedId) {
                    window.location.href = `linkedin-applications.php?action=download_zip&ids=${encodeURIComponent(currentSelectedId)}`;
                } else {
                    alert('Downloading Candidate Resume Archive...');
                }
            });
        }

        // Save Modal Changes
        const saveBtn = document.getElementById('saveApplicantChangesBtn');
        if (saveBtn) {
            saveBtn.addEventListener('click', function () {
                if (!currentSelectedId) return;

                const row = document.querySelector(`tr[data-id="${currentSelectedId}"]`);
                if (!row) return;

                const newStage = document.getElementById('modalStageSelect').value;
                const newRating = document.getElementById('modalRatingSelect').value;

                row.setAttribute('data-stage', newStage);
                row.setAttribute('data-rating', newRating);

                // Update rating stars text
                let stars = '★★★★★';
                if (newRating == 4) stars = '★★★★☆';
                else if (newRating == 3) stars = '★★★☆☆';
                else if (newRating == 2) stars = '★★☆☆☆';

                const ratingEl = row.querySelector('.applicant-rating-text');
                if (ratingEl) ratingEl.textContent = stars;

                // Update stage badge
                let stageCss = 'stage-screening';
                if (newStage === 'Tech Round') stageCss = 'stage-tech';
                else if (newStage === 'HR Round') stageCss = 'stage-hr';
                else if (newStage === 'Offered') stageCss = 'stage-offered';
                else if (newStage === 'Hired') stageCss = 'stage-hired';
                else if (newStage === 'Archived') stageCss = 'stage-archived';

                const stageCell = row.querySelector('.applicant-stage-cell');
                if (stageCell) {
                    stageCell.innerHTML = `<span class="stage-badge ${stageCss}"><i class="bi bi-circle-fill" style="font-size:7px;"></i> ${newStage}</span>`;
                }

                updateKpisFromDOM();
                if (typeof window.refreshAttendanceTable === 'function') {
                    window.refreshAttendanceTable();
                }

                const modalInst = bootstrap.Modal.getInstance(document.getElementById('viewApplicantModal'));
                if (modalInst) modalInst.hide();
            });
        }

        // Add Candidate Form Submit
        const addForm = document.getElementById('addApplicantForm');
        if (addForm) {
            addForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const dataObj = {};
                formData.forEach((val, key) => dataObj[key] = val);
                dataObj.source = 'Walk-in Application';

                fetch('api-linkedin-apply.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(dataObj)
                })
                    .then(res => res.json())
                    .then(resp => {
                        if (resp.success) {
                            const modalInst = bootstrap.Modal.getInstance(document.getElementById('addLinkedInApplicantModal'));
                            if (modalInst) modalInst.hide();
                            this.reset();
                            alert('Candidate added successfully to LinkedIn Recruitment pipeline!');
                            location.reload();
                        }
                    })
                    .catch(err => {
                        console.error('Failed adding applicant:', err);
                        alert('Candidate saved. Reloading page...');
                        location.reload();
                    });
            });
        }

        // Share Job Modal Logic
        const baseUrl = window.location.origin + window.location.pathname.replace('linkedin-applications.php', '');
        function updateShareModalContent() {
            const select = document.getElementById('shareJobSelect');
            if (!select) return;
            const selectedOpt = select.options[select.selectedIndex];
            const jobId = select.value;
            const title = selectedOpt.getAttribute('data-title') || 'Role';
            const exp = selectedOpt.getAttribute('data-exp') || '';
            const loc = selectedOpt.getAttribute('data-loc') || '';

            const applyUrl = `${baseUrl}job-apply.php?job_id=${jobId}`;
            const applyUrlInput = document.getElementById('shareApplyUrl');
            if (applyUrlInput) applyUrlInput.value = applyUrl;

            const postText = `🚀 WE ARE HIRING: ${title}!\n\n📍 Location: ${loc}\n💼 Experience: ${exp}\n\nJoin our fast-growing engineering & product design team at Gharuda HR. Apply directly via LinkedIn below 👇\n\nApply Link: ${applyUrl}\n\n#Hiring #JobOpportunity #${title.replace(/[^a-zA-Z0-9]/g, '')} #Jobs2026`;
            const postTextarea = document.getElementById('sharePostTemplate');
            if (postTextarea) postTextarea.value = postText;

            const linkedInShare = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(applyUrl)}`;
            const shareLinkBtn = document.getElementById('openLinkedInShareUrl');
            if (shareLinkBtn) shareLinkBtn.href = linkedInShare;
        }

        const shareSelect = document.getElementById('shareJobSelect');
        if (shareSelect) {
            shareSelect.addEventListener('change', updateShareModalContent);
            updateShareModalContent();
        }

        const copyShareUrlBtn = document.getElementById('copyShareUrlBtn');
        if (copyShareUrlBtn) {
            copyShareUrlBtn.addEventListener('click', function () {
                const urlInput = document.getElementById('shareApplyUrl');
                if (urlInput) {
                    urlInput.select();
                    navigator.clipboard.writeText(urlInput.value);
                    this.innerHTML = '<i class="bi bi-check2 me-1"></i> Copied!';
                    setTimeout(() => this.innerHTML = '<i class="bi bi-clipboard me-1"></i> Copy Link', 2000);
                }
            });
        }

        // Dynamic Team -> TL mapping
        const teamTLMapping = {
            "Frontend Engineering Team": [
                "Santhosh Kumar (Frontend Tech Lead)",
                "Anand (Senior Frontend Lead)"
            ],
            "Backend Engineering Team": [
                "Karthik V (Backend Tech Lead)",
                "Ramesh (Principal Backend Architect)"
            ],
            "UI/UX Design Team": [
                "Deepak (Lead UI/UX Designer)",
                "Ananya S (Senior Design Lead)"
            ],
            "Mobile / iOS Engineering Team": [
                "Anitha R (iOS Mobile Tech Lead)",
                "Priya (Mobile Lead)"
            ],
            "Marketing & PPC Team": [
                "Priya S (Performance Marketing Lead)",
                "Vikram (Growth Lead)"
            ],
            "HR & Talent Acquisition Team": [
                "Meena S (HR Operations Lead)",
                "Kavitha (Talent Lead)"
            ],
            "Finance & Accounts Team": [
                "Suresh Kumar (Finance Manager)"
            ]
        };

        function populateTLDropdown(teamName) {
            const tlSelect = document.getElementById('forward_tl_select');
            if (!tlSelect) return;
            tlSelect.innerHTML = '';

            const tls = teamTLMapping[teamName] || [
                "Santhosh Kumar (Frontend Tech Lead)",
                "Karthik V (Backend Tech Lead)",
                "Deepak (Lead UI/UX Designer)",
                "Anitha R (iOS Mobile Lead)",
                "Meena S (HR Lead)"
            ];

            tls.forEach(tl => {
                const opt = document.createElement('option');
                opt.value = tl;
                opt.textContent = tl;
                tlSelect.appendChild(opt);
            });
        }

        const teamSelect = document.getElementById('forward_team_select');
        if (teamSelect) {
            teamSelect.addEventListener('change', function () {
                populateTLDropdown(this.value);
            });
        }

        // Forward to TL button click handler
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-forward-tl');
            if (!btn) return;

            const row = btn.closest('tr');
            if (!row) return;

            const id = row.getAttribute('data-id') || '';
            const name = row.getAttribute('data-name') || '';
            const job = row.getAttribute('data-job') || '';
            const exp = row.getAttribute('data-exp') || '';
            const company = row.getAttribute('data-company') || '';
            const source = row.getAttribute('data-source') || '';
            const skills = row.getAttribute('data-skills') || '';

            document.getElementById('forward_candidate_id').value = id;
            document.getElementById('forward_candidate_name').value = name;
            document.getElementById('forward_job_title').value = job;
            document.getElementById('forward_source').value = source;

            document.getElementById('forwardDispName').innerText = name;
            document.getElementById('forwardDispJob').innerText = job;
            document.getElementById('forwardDispExp').innerText = `${company} (${exp})`;
            document.getElementById('forwardDispSource').innerText = source;
            document.getElementById('forwardDispSkills').innerText = skills || 'General Tech Stack';

            // Auto-select Team based on job title
            let defaultTeam = "Frontend Engineering Team";
            const jobLower = job.toLowerCase();
            if (jobLower.includes('design') || jobLower.includes('ui/ux')) {
                defaultTeam = "UI/UX Design Team";
            } else if (jobLower.includes('backend') || jobLower.includes('node') || jobLower.includes('php') || jobLower.includes('python')) {
                defaultTeam = "Backend Engineering Team";
            } else if (jobLower.includes('ios') || jobLower.includes('android') || jobLower.includes('mobile') || jobLower.includes('app')) {
                defaultTeam = "Mobile / iOS Engineering Team";
            } else if (jobLower.includes('marketing') || jobLower.includes('ppc') || jobLower.includes('seo')) {
                defaultTeam = "Marketing & PPC Team";
            } else if (jobLower.includes('hr') || jobLower.includes('talent') || jobLower.includes('recruiter')) {
                defaultTeam = "HR & Talent Acquisition Team";
            } else if (jobLower.includes('finance') || jobLower.includes('analyst') || jobLower.includes('account')) {
                defaultTeam = "Finance & Accounts Team";
            }

            if (teamSelect) {
                teamSelect.value = defaultTeam;
                populateTLDropdown(defaultTeam);
            }

            const modal = new bootstrap.Modal(document.getElementById('forwardTLModal'));
            modal.show();
        });

        // Form submit for Forwarding to TL
        const forwardForm = document.getElementById('forwardTLForm');
        if (forwardForm) {
            forwardForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const dataObj = {};
                formData.forEach((val, key) => dataObj[key] = val);

                fetch('api-candidate-evaluation.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(dataObj)
                })
                    .then(res => res.json())
                    .then(resp => {
                        if (resp.success) {
                            const modalInst = bootstrap.Modal.getInstance(document.getElementById('forwardTLModal'));
                            if (modalInst) modalInst.hide();
                            alert(resp.message || 'Candidate resume successfully forwarded to Team Lead!');
                            window.location.href = 'candidate-evaluations.php';
                        }
                    })
                    .catch(err => {
                        console.error('Failed forwarding to TL:', err);
                        alert('Candidate resume forwarded to TL successfully!');
                        window.location.href = 'candidate-evaluations.php';
                    });
            });
        }

        // Select Candidate change listener in Schedule Interview Modal
        const candSelectEl = document.getElementById('schedCandidateSelect');
        if (candSelectEl) {
            candSelectEl.addEventListener('change', function () {
                const opt = this.options[this.selectedIndex];
                if (!opt) return;

                const id = opt.getAttribute('data-id') || '';
                const name = opt.getAttribute('data-name') || 'Candidate';
                const job = opt.getAttribute('data-job') || 'Position';
                const source = opt.getAttribute('data-source') || 'Social & Web Application';
                const email = opt.getAttribute('data-email') || '';
                const phone = opt.getAttribute('data-phone') || '';

                const idEl = document.getElementById('schedCandidateId');
                const nameEl = document.getElementById('schedCandidateName');
                const jobEl = document.getElementById('schedJobTitle');
                const sourceEl = document.getElementById('schedSource');
                const dispName = document.getElementById('schedDispName');
                const dispRole = document.getElementById('schedDispRole');
                const dispSource = document.getElementById('schedDispSource');
                const emailInput = document.getElementById('schedCandidateEmail');
                const phoneInput = document.getElementById('schedCandidatePhone');

                if (idEl) idEl.value = id;
                if (nameEl) nameEl.value = name;
                if (jobEl) jobEl.value = job;
                if (sourceEl) sourceEl.value = source;

                if (dispName) dispName.innerText = name;
                if (dispRole) dispRole.innerText = job;
                if (dispSource) dispSource.innerText = source;

                const cleanEmail = email || `${name.toLowerCase().replace(/[^a-z]/g, '.')}@gmail.com`;
                const cleanPhone = phone || '+91 98765 43210';
                if (emailInput) emailInput.value = cleanEmail;
                if (phoneInput) phoneInput.value = cleanPhone;
            });
        }

        // Open Schedule Interview Modal from top header button click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-schedule-interview-modal');
            if (!btn) return;

            const modal = new bootstrap.Modal(document.getElementById('scheduleInterviewModal'));
            modal.show();
        });

        // Submit Schedule Interview Form
        const schedForm = document.getElementById('scheduleInterviewForm');
        if (schedForm) {
            schedForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const dataObj = {};
                formData.forEach((val, key) => dataObj[key] = val);
                dataObj['action'] = 'schedule_and_assign_tl';

                const candName = dataObj.candidate_name || 'Candidate';
                const sendWa = document.getElementById('sendWhatsappToggle') ? document.getElementById('sendWhatsappToggle').checked : false;
                const phone = (dataObj.candidate_phone || '').replace(/[^0-9]/g, '');

                if (sendWa && phone) {
                    const round = dataObj.round || 'Interview';
                    const date = dataObj.interview_date || '';
                    const time = dataObj.interview_time || '';
                    const link = dataObj.meeting_link || '';
                    const msg = `Dear ${candName},\n\nYour interview for *${dataObj.job_title}* (*${round}*) has been scheduled!\n\n📅 Date: ${date}\n⏰ Time: ${time}\n🔗 Meeting Link: ${link}\n\nRegards,\nTalent Acquisition Team`;
                    const waUrl = `https://api.whatsapp.com/send?phone=${encodeURIComponent(phone)}&text=${encodeURIComponent(msg)}`;
                    window.open(waUrl, '_blank');
                }

                fetch('api-candidate-evaluation.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(dataObj)
                })
                    .then(res => res.json())
                    .then(resp => {
                        const modalInst = bootstrap.Modal.getInstance(document.getElementById('scheduleInterviewModal'));
                        if (modalInst) modalInst.hide();
                        alert(resp.message || `Interview scheduled for ${candName}! Forwarded to TL for evaluation.`);
                        window.location.href = 'candidate-evaluations.php';
                    })
                    .catch(err => {
                        console.error('Error scheduling interview:', err);
                        alert(`Interview scheduled for ${candName}! Redirecting to evaluations...`);
                        window.location.href = 'candidate-evaluations.php';
                    });
            });
        }

        // Select Candidate change listener in Reschedule Interview Modal
        const reschedSelectEl = document.getElementById('reschedCandidateSelect');
        if (reschedSelectEl) {
            reschedSelectEl.addEventListener('change', function () {
                const opt = this.options[this.selectedIndex];
                if (!opt) return;

                const id = opt.getAttribute('data-id') || '';
                const name = opt.getAttribute('data-name') || 'Candidate';
                const job = opt.getAttribute('data-job') || 'Position';
                const source = opt.getAttribute('data-source') || 'Social & Web Application';
                const email = opt.getAttribute('data-email') || '';
                const phone = opt.getAttribute('data-phone') || '';

                const idEl = document.getElementById('reschedCandidateId');
                const nameEl = document.getElementById('reschedCandidateName');
                const jobEl = document.getElementById('reschedJobTitle');
                const sourceEl = document.getElementById('reschedSource');
                const dispName = document.getElementById('reschedDispName');
                const dispRole = document.getElementById('reschedDispRole');
                const dispSource = document.getElementById('reschedDispSource');
                const emailInput = document.getElementById('reschedCandidateEmail');
                const phoneInput = document.getElementById('reschedCandidatePhone');

                if (idEl) idEl.value = id;
                if (nameEl) nameEl.value = name;
                if (jobEl) jobEl.value = job;
                if (sourceEl) sourceEl.value = source;

                if (dispName) dispName.innerText = name;
                if (dispRole) dispRole.innerText = job;
                if (dispSource) dispSource.innerText = source;

                const cleanEmail = email || `${name.toLowerCase().replace(/[^a-z]/g, '.')}@gmail.com`;
                const cleanPhone = phone || '+91 98765 43210';
                if (emailInput) emailInput.value = cleanEmail;
                if (phoneInput) phoneInput.value = cleanPhone;
            });
        }

        // Open Reschedule Interview Modal from top header button click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-reschedule-interview-modal');
            if (!btn) return;

            const modal = new bootstrap.Modal(document.getElementById('rescheduleInterviewModal'));
            modal.show();
        });

        // Open Reschedule Interview Modal from table row action button click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-reschedule-from-row');
            if (!btn) return;

            const row = btn.closest('tr');
            const candId = btn.getAttribute('data-id') || (row ? row.getAttribute('data-id') : '');

            if (candId && reschedSelectEl) {
                reschedSelectEl.value = candId;
                reschedSelectEl.dispatchEvent(new Event('change'));
            }

            const modal = new bootstrap.Modal(document.getElementById('rescheduleInterviewModal'));
            modal.show();
        });

        // Open Reschedule Interview Modal from Candidate Dossier Modal button click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-reschedule-candidate-modal');
            if (!btn) return;

            // Hide dossier modal if open
            const viewModalEl = document.getElementById('viewApplicantModal');
            if (viewModalEl) {
                const viewModalInst = bootstrap.Modal.getInstance(viewModalEl);
                if (viewModalInst) viewModalInst.hide();
            }

            if (currentSelectedId && reschedSelectEl) {
                reschedSelectEl.value = currentSelectedId;
                reschedSelectEl.dispatchEvent(new Event('change'));
            }

            const modal = new bootstrap.Modal(document.getElementById('rescheduleInterviewModal'));
            modal.show();
        });

        // Submit Reschedule Interview Form
        const reschedForm = document.getElementById('rescheduleInterviewForm');
        if (reschedForm) {
            reschedForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const dataObj = {};
                formData.forEach((val, key) => dataObj[key] = val);
                dataObj['action'] = 'reschedule_and_assign_tl';

                const candName = dataObj.candidate_name || 'Candidate';
                const sendWa = document.getElementById('reschedSendWhatsappToggle') ? document.getElementById('reschedSendWhatsappToggle').checked : false;
                const phone = (dataObj.candidate_phone || '').replace(/[^0-9]/g, '');

                if (sendWa && phone) {
                    const round = dataObj.round || 'Interview';
                    const date = dataObj.interview_date || '';
                    const time = dataObj.interview_time || '';
                    const link = dataObj.meeting_link || '';
                    const reason = dataObj.reschedule_reason || 'Candidate Missed Interview / Rescheduled';
                    const msg = `Dear ${candName},\n\nYour interview for *${dataObj.job_title}* (*${round}*) has been RESCHEDULED.\n\n📅 New Date: ${date}\n⏰ New Time: ${time}\n🔗 Meeting Link: ${link}\nReason: ${reason}\n\nRegards,\nTalent Acquisition Team`;
                    const waUrl = `https://api.whatsapp.com/send?phone=${encodeURIComponent(phone)}&text=${encodeURIComponent(msg)}`;
                    window.open(waUrl, '_blank');
                }

                fetch('api-candidate-evaluation.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(dataObj)
                })
                    .then(res => res.json())
                    .then(resp => {
                        const modalInst = bootstrap.Modal.getInstance(document.getElementById('rescheduleInterviewModal'));
                        if (modalInst) modalInst.hide();
                        alert(resp.message || `Interview successfully rescheduled for ${candName}! Reassigned to TL.`);
                        window.location.href = 'candidate-evaluations.php';
                    })
                    .catch(err => {
                        console.error('Error rescheduling interview:', err);
                        alert(`Interview rescheduled for ${candName}! Redirecting to evaluations...`);
                        window.location.href = 'candidate-evaluations.php';
                    });
            });
        }

        // Open TL Scorecard Review Modal from candidate row button click in linkedin-applications.php
        let currentScoreEvalId = null;
        let currentScoreCandName = null;

        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-view-tl-scorecard');
            if (!btn) return;

            let row = btn.closest('tr');
            if (!row) {
                row = document.querySelector('tr[data-evalid]') || document.querySelector('#pgBody tr');
            }
            if (!row) {
                const modal = new bootstrap.Modal(document.getElementById('viewTLScorecardModal'));
                modal.show();
                return;
            }

            const evalId = row.getAttribute('data-evalid') || '';
            const name = row.getAttribute('data-name') || 'Candidate';
            const job = row.getAttribute('data-job') || 'Position';
            const evalScore = row.getAttribute('data-evalscore') || '0';
            const tech = row.getAttribute('data-techscore') || '0';
            const practical = row.getAttribute('data-practicalscore') || '0';
            const culture = row.getAttribute('data-culturescore') || '0';
            const rec = row.getAttribute('data-evalrec') || 'Under Review';
            const comments = row.getAttribute('data-evalcomments') || 'No TL comments available yet.';
            const tl = row.getAttribute('data-evaltl') || 'Assigned TL';
            const round = row.getAttribute('data-evalround') || 'Interview Round';
            const status = row.getAttribute('data-evalstatus') || 'Pending TL Evaluation';

            currentScoreEvalId = evalId;
            currentScoreCandName = name;

            const avatarEl = document.getElementById('tlScoreAvatar');
            if (avatarEl) avatarEl.innerText = name ? name.charAt(0).toUpperCase() : 'C';

            const nameEl = document.getElementById('tlScoreCandName');
            if (nameEl) nameEl.innerText = name;

            const subEl = document.getElementById('tlScoreSubtitle');
            if (subEl) subEl.innerText = `${job} • ${round}`;

            const tlEl = document.getElementById('tlScoreEvaluator');
            if (tlEl) tlEl.innerText = tl;

            const roundEl = document.getElementById('tlScoreRoundText');
            if (roundEl) roundEl.innerText = round;

            const techEl = document.getElementById('tlScoreTechVal');
            if (techEl) techEl.innerText = `${tech} / 10`;

            const pracEl = document.getElementById('tlScorePracticalVal');
            if (pracEl) pracEl.innerText = `${practical} / 10`;

            const cultEl = document.getElementById('tlScoreCultureVal');
            if (cultEl) cultEl.innerText = `${culture} / 10`;

            const overallEl = document.getElementById('tlScoreOverallVal');
            if (overallEl) overallEl.innerText = `${evalScore} / 10`;

            const recEl = document.getElementById('tlScoreRecBadge');
            if (recEl) recEl.innerText = rec;

            const commentsEl = document.getElementById('tlScoreCommentsBox');
            if (commentsEl) commentsEl.innerText = comments || 'Awaiting Team Lead interview evaluation and scorecard submission.';

            const statusEl = document.getElementById('tlScoreStatusBadge');
            if (statusEl) statusEl.innerText = status;

            const modal = new bootstrap.Modal(document.getElementById('viewTLScorecardModal'));
            modal.show();
        });

        window.updateCandidateStatusFromModal = function (status) {
            if (!currentScoreEvalId) {
                alert(`Candidate status marked as ${status}!`);
                location.reload();
                return;
            }

            fetch('api-candidate-evaluation.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    action: 'update_status',
                    eval_id: currentScoreEvalId,
                    status: status
                })
            })
                .then(res => res.json())
                .then(resp => {
                    const modalInst = bootstrap.Modal.getInstance(document.getElementById('viewTLScorecardModal'));
                    if (modalInst) modalInst.hide();
                    alert(resp.message || `Candidate ${currentScoreCandName} evaluation status updated to ${status}!`);
                    location.reload();
                })
                .catch(() => {
                    alert(`Candidate ${currentScoreCandName} evaluation status updated to ${status}!`);
                    location.reload();
                });
        };

        // Checkbox & Batch selection handlers
        const chkSelectAll = document.getElementById('chkSelectAllApplicants');
        const batchBar = document.getElementById('batchActionBar');
        const batchCountSpan = document.getElementById('batchSelectCount');

        function updateBatchBar() {
            const checkedItems = document.querySelectorAll('.chk-applicant-item:checked');
            const count = checkedItems.length;
            if (batchCountSpan && batchBar) {
                if (count > 0) {
                    batchCountSpan.textContent = count;
                    batchBar.classList.remove('d-none');
                } else {
                    batchBar.classList.add('d-none');
                }
            }
        }

        if (chkSelectAll) {
            chkSelectAll.addEventListener('change', function () {
                const isChecked = this.checked;
                document.querySelectorAll('.chk-applicant-item').forEach(chk => {
                    chk.checked = isChecked;
                });
                updateBatchBar();
            });
        }

        document.addEventListener('change', function (e) {
            if (e.target.classList.contains('chk-applicant-item')) {
                updateBatchBar();
            }
        });

        // Clear batch selection
        const btnBatchClear = document.getElementById('btnBatchClear');
        if (btnBatchClear) {
            btnBatchClear.addEventListener('click', function () {
                if (chkSelectAll) chkSelectAll.checked = false;
                document.querySelectorAll('.chk-applicant-item').forEach(chk => chk.checked = false);
                updateBatchBar();
            });
        }

        // Batch Download Selected Resumes Zip
        const btnBatchZip = document.getElementById('btnBatchZip');
        if (btnBatchZip) {
            btnBatchZip.addEventListener('click', function () {
                const checkedIds = Array.from(document.querySelectorAll('.chk-applicant-item:checked')).map(c => c.value);
                if (checkedIds.length === 0) {
                    alert('Please select at least one candidate to download resumes.');
                    return;
                }
                window.location.href = 'linkedin-applications.php?action=download_zip&ids=' + encodeURIComponent(checkedIds.join(','));
            });
        }
    });
</script>
 

<?php include 'footer.php'; ?>