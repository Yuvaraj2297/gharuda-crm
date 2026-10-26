<?php include 'header.php'; ?>

 

<style>
    .job-kpi { min-height: 112px; padding: 18px; border: 1px solid var(--border-soft); border-radius: 14px; background: var(--white); box-shadow: 0 4px 16px rgba(20, 30, 25, .04); transition: transform .2s ease; }
    .job-kpi:hover { transform: translateY(-2px); }
    .job-kpi .icon { width: 44px; height: 44px; border-radius: 12px; display: grid; place-items: center; font-size: 20px; flex-shrink: 0; }
    .job-kpi .label { color: var(--ink-500); font-size: 12px; font-weight: 700; margin-bottom: 3px; }
    .job-kpi .value { color: var(--ink-900); font-size: 22px; font-weight: 800; }
    .job-kpi .sub { color: var(--ink-500); font-size: 11px; margin-top: 3px; }

    .status-badge-open { color: #087a24; background: #e7f7eb; padding: 5px 12px; border-radius: 99px; font-size: 11.5px; font-weight: 700; display: inline-flex; align-items: center; gap: 5px; }
    .status-badge-draft { color: #5f6b7c; background: #eef2f6; padding: 5px 12px; border-radius: 99px; font-size: 11.5px; font-weight: 700; display: inline-flex; align-items: center; gap: 5px; }
    .status-badge-hold { color: #b56b00; background: #fff4d9; padding: 5px 12px; border-radius: 99px; font-size: 11.5px; font-weight: 700; display: inline-flex; align-items: center; gap: 5px; }
    .status-badge-closed { color: #be3035; background: #fdebed; padding: 5px 12px; border-radius: 99px; font-size: 11.5px; font-weight: 700; display: inline-flex; align-items: center; gap: 5px; }

    .priority-pill { font-size: 11px; font-weight: 700; padding: 3px 8px; border-radius: 6px; }
    .priority-urgent { background: #fee2e2; color: #dc2626; }
    .priority-high { background: #ffedd5; color: #ea580c; }
    .priority-normal { background: #e0f2fe; color: #0284c7; }

    /* Professional Portal Chips */
    .portal-chip {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        line-height: 1;
        white-space: nowrap;
        border: 1px solid transparent;
        transition: all 0.15s ease-in-out;
    }
    .portal-chip:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    }
    .portal-linkedin { background: #eff6ff; color: #0077b5; border-color: #bfdbfe; }
    .portal-naukri { background: #f0f5ff; color: #005cbb; border-color: #c6d7ff; }
    .portal-indeed { background: #f0f7ff; color: #2164f3; border-color: #c2d9ff; }
    .portal-careers { background: #f0fdf4; color: #087a24; border-color: #bbf7d0; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Job Openings & Requisitions</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-briefcase fs-6"></i>
            <span>Recruitment</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Job Openings</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-outline-primary position-relative fw-bold" id="btnOpenTlRequestsModal" data-bs-toggle="modal" data-bs-target="#tlRequestsModal" style="border-radius:8px;">
            <i class="bi bi-chat-left-text-fill text-primary me-1"></i> TL Requests & HR Reply
            <span class="badge bg-danger rounded-pill ms-1 d-none" id="tlPendingBadge" style="font-size:10px;">0 New</span>
        </button>
        <a href="job-create.php" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24); font-weight:700; border-radius:8px;">
            <i class="bi bi-plus-lg me-1"></i> Post New Job
        </a>
    </div>
</div>

<!-- KPI Cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="job-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e9f7ec;color:#11872c;"><i class="bi bi-briefcase"></i></div>
            <div>
                <div class="label">Active Open Positions</div>
                <div class="value">8</div>
                <div class="sub">Across 4 departments</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="job-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-person-lines-fill"></i></div>
            <div>
                <div class="label">Total Applicants</div>
                <div class="value">142</div>
                <div class="sub">28 this week</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="job-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-calendar-event"></i></div>
            <div>
                <div class="label">Interviews Scheduled</div>
                <div class="value">16</div>
                <div class="sub">Next 7 days</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="job-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#f3e8ff;color:#9333ea;"><i class="bi bi-file-earmark-check"></i></div>
            <div>
                <div class="label">Offers Released</div>
                <div class="value">5</div>
                <div class="sub">3 accepted, 2 pending</div>
            </div>
        </div>
    </div>
</div>

<!-- Table Card (toolbar & footer auto-created by master-table.js) -->
<div class="card-custom p-0" id="jobOpeningsTableWrap">
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="jobOpeningsTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Position Title</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Location & Type</th>
                    <th class="text-nowrap">Posted By (HR)</th>
                    <th class="text-nowrap">Posted Date</th>
                    <th class="text-nowrap text-center">Post Age</th>
                    <th class="text-nowrap text-center">Openings</th>
                    <th class="text-nowrap">Budget (CTC)</th>
                    <th class="text-nowrap">Priority</th>
                    <th class="text-nowrap">Posted Portals</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="jobOpeningsTbody">
                <!-- Rows dynamically rendered by MasterTable -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal: Create Job Opening -->
<div class="modal fade" id="createJobModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><i class="bi bi-briefcase text-primary me-2"></i> Post New Job Requisition</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3" id="createJobForm" onsubmit="return false;">
                    <div class="col-md-8">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Job Title *</label>
                        <input type="text" class="form-control" id="create_job_title" placeholder="e.g. Senior Full Stack Engineer" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Department *</label>
                        <select class="form-select select2" id="create_job_dept" required>
                            <option value="Design">Design</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="iOS Dev">iOS Dev</option>
                            <option value="HR">HR</option>
                            <option value="Sales">Sales</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Work Location *</label>
                        <input type="text" class="form-control" id="create_job_location" placeholder="e.g. Bangalore (Hybrid)" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Employment Type</label>
                        <select class="form-select select2" id="create_job_type">
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Internship">Internship</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">No. of Openings *</label>
                        <input type="number" class="form-control" id="create_job_openings" value="1" min="1" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Experience Required</label>
                        <input type="text" class="form-control" id="create_job_exp" placeholder="e.g. 3-5 Years">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Budget Range (CTC)</label>
                        <input type="text" class="form-control" id="create_job_budget" placeholder="e.g. ₹15L - ₹20L">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Priority</label>
                        <select class="form-select select2" id="create_job_priority">
                            <option value="Normal">Normal</option>
                            <option value="High">High</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Posted By (HR Name) *</label>
                        <input type="text" class="form-control" id="create_job_posted_by" value="Priya Sharma (HR Lead)" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Job Description & Key Responsibilities</label>
                        <textarea class="form-control" id="create_job_desc" rows="3" placeholder="Provide overview of duties, qualifications and required tech stack..."></textarea>
                    </div>

                    <!-- Official Shareable Careers Portal Link Box inside Post Popup -->
                    <div class="col-12 mt-3 pt-3 border-top">
                        <div class="p-3 rounded-3" style="background:#f0fdf4; border:1px solid #bbf7d0;">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <label class="form-label fw-bold mb-0" style="font-size:12.5px; color:#087a24;">
                                    <i class="bi bi-link-45deg me-1"></i> Official Careers Portal Application Link (Generated)
                                </label>
                                <span class="badge bg-success text-white" style="font-size:10px;">Public Application URL</span>
                            </div>
                            <div class="input-group mb-1">
                                <input type="text" class="form-control form-control-sm bg-white fw-semibold" id="modal_create_careers_link" readonly value="http://localhost/gharuda-hrms-new/careers.php">
                                <button class="btn btn-sm btn-success fw-bold" type="button" id="btnCopyModalCreateLink">
                                    <i class="bi bi-clipboard me-1"></i> Copy Link
                                </button>
                                <a id="btnPreviewModalCreateLink" href="careers.php" target="_blank" class="btn btn-sm btn-outline-success fw-bold">
                                    <i class="bi bi-box-arrow-up-right me-1"></i> Open Careers Page
                                </a>
                            </div>
                            <div class="text-muted small" style="font-size:11px;">
                                <i class="bi bi-info-circle me-1"></i> Candidates applying via this link from Social Media or Web will automatically land in your Candidate ATS Pipeline.
                            </div>
                        </div>
                    </div>

                    <!-- Multi-Channel External Auto-Posting & Office Social Links Section -->
                    <div class="col-12 mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label fw-bold mb-0" style="font-size:13px; color:var(--primary-dark);">
                                <i class="bi bi-broadcast me-1 text-primary"></i> Multi-Channel External Auto-Posting & Office Social Links
                            </label>
                            <span class="badge bg-success-subtle text-success" style="font-size:11px;"><i class="bi bi-lightning-charge me-1"></i>Instant Multi-Portal Sync</span>
                        </div>

                        <!-- 4 Syndication Cards with Social URL Inputs -->
                        <div class="row g-2 mb-3">
                            <!-- LinkedIn -->
                            <div class="col-md-6">
                                <div class="card p-3 border rounded-3 h-100 shadow-sm" style="background:#f8fafc;">
                                    <div class="form-check form-switch d-flex align-items-center justify-content-between mb-2">
                                        <label class="form-check-label fw-bold text-dark me-2" for="create_post_linkedin" style="font-size:12.5px;">
                                            <i class="bi bi-linkedin me-1" style="color:#0077b5;"></i> LinkedIn Jobs API & Page
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="create_post_linkedin" checked>
                                    </div>
                                    <input type="url" class="form-control form-control-sm bg-white" id="create_url_linkedin" placeholder="https://linkedin.com/company/gharuda/jobs" value="https://linkedin.com/company/gharuda-hr/jobs">
                                    <div class="text-muted small mt-1" style="font-size:10.5px;">Office LinkedIn Org Page / Post URL</div>
                                </div>
                            </div>

                            <!-- Naukri -->
                            <div class="col-md-6">
                                <div class="card p-3 border rounded-3 h-100 shadow-sm" style="background:#f8fafc;">
                                    <div class="form-check form-switch d-flex align-items-center justify-content-between mb-2">
                                        <label class="form-check-label fw-bold text-dark me-2" for="create_post_naukri" style="font-size:12.5px;">
                                            <i class="bi bi-briefcase-fill me-1" style="color:#005cbb;"></i> Naukri.com Recruiter
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="create_post_naukri" checked>
                                    </div>
                                    <input type="url" class="form-control form-control-sm bg-white" id="create_url_naukri" placeholder="https://recruiter.naukri.com/job-listings" value="https://recruiter.naukri.com/job-listings/gharuda">
                                    <div class="text-muted small mt-1" style="font-size:10.5px;">Office Naukri Recruiter Listing URL</div>
                                </div>
                            </div>

                            <!-- Indeed -->
                            <div class="col-md-6">
                                <div class="card p-3 border rounded-3 h-100 shadow-sm" style="background:#f8fafc;">
                                    <div class="form-check form-switch d-flex align-items-center justify-content-between mb-2">
                                        <label class="form-check-label fw-bold text-dark me-2" for="create_post_indeed" style="font-size:12.5px;">
                                            <i class="bi bi-globe me-1" style="color:#2164f3;"></i> Indeed & Glassdoor Feed
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="create_post_indeed" checked>
                                    </div>
                                    <input type="url" class="form-control form-control-sm bg-white" id="create_url_indeed" placeholder="https://indeed.com/cmp/gharuda/jobs" value="https://indeed.com/cmp/gharuda/jobs">
                                    <div class="text-muted small mt-1" style="font-size:10.5px;">Office Indeed Employer Page URL</div>
                                </div>
                            </div>

                            <!-- Official Web Portal -->
                            <div class="col-md-6">
                                <div class="card p-3 border rounded-3 h-100 shadow-sm" style="background:#f0fdf4; border-color:#bbf7d0!important;">
                                    <div class="form-check form-switch d-flex align-items-center justify-content-between mb-2">
                                        <label class="form-check-label fw-bold text-dark me-2" for="create_post_careers" style="font-size:12.5px;">
                                            <i class="bi bi-building me-1" style="color:#087a24;"></i> Official Web Careers Portal
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="create_post_careers" checked>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <input type="url" class="form-control bg-white fw-semibold" id="modal_create_careers_link" readonly value="http://localhost/gharuda-hrms-new/careers.php">
                                        <button class="btn btn-success fw-bold" type="button" id="btnCopyModalCreateLink">
                                            <i class="bi bi-clipboard me-1"></i> Copy
                                        </button>
                                    </div>
                                    <div class="text-muted small mt-1" style="font-size:10.5px;">Candidates apply via link directly into ATS</div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Office Social Channels (WhatsApp, Instagram, Facebook) -->
                        <div class="p-3 rounded-3 border bg-light">
                            <label class="form-label fw-bold mb-2" style="font-size:12px; color:var(--ink-700);">
                                <i class="bi bi-share me-1 text-success"></i> Office Social Broadcast Links (WhatsApp / Instagram / Facebook)
                            </label>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-white text-success"><i class="bi bi-whatsapp"></i></span>
                                        <input type="text" class="form-control bg-white" id="create_url_whatsapp" placeholder="WhatsApp Broadcast text link..." value="https://api.whatsapp.com/send?text=We%20are%20hiring!">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-white text-primary"><i class="bi bi-facebook"></i> / <i class="bi bi-instagram text-danger ms-1"></i></span>
                                        <input type="url" class="form-control bg-white" id="create_url_social" placeholder="Office Instagram/FB Careers URL" value="https://facebook.com/gharuda.careers">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnPublishJob" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                    <i class="bi bi-broadcast me-1"></i> Publish & Post Multi-Channel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Edit Job Opening -->
<div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="editJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-light border-bottom">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center" style="width:36px;height:36px;">
                        <i class="mdi mdi-pencil fs-5"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="editJobModalLabel">Edit Job Opening</h5>
                        <div class="text-muted" style="font-size:12px;">Job Code: <span class="badge bg-primary-subtle text-primary fw-bold" id="edit_job_code_badge">JOB-101</span></div>
                    </div>
                </div>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3" id="editJobForm" onsubmit="return false;">
                    <input type="hidden" id="edit_job_id">
                    <input type="hidden" id="edit_job_code">
                    <input type="hidden" id="edit_job_posted">
                    <input type="hidden" id="edit_job_applicants">

                    <div class="col-md-8">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_title">Position Title *</label>
                        <input type="text" class="form-control" id="edit_job_title" placeholder="e.g. Senior UI/UX Designer" required autocomplete="off">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_dept">Department *</label>
                        <select class="form-select select2" id="edit_job_dept" required>
                            <option value="Design">Design</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="iOS Dev">iOS Dev</option>
                            <option value="HR">HR</option>
                            <option value="Sales">Sales</option>
                            <option value="Operations">Operations</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_location">Work Location *</label>
                        <input type="text" class="form-control" id="edit_job_location" placeholder="e.g. Bangalore (Hybrid)" required autocomplete="off">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_type">Employment Type</label>
                        <select class="form-select select2" id="edit_job_type">
                            <option value="Full-Time">Full-Time</option>
                            <option value="Part-Time">Part-Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Internship">Internship</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_openings">No. of Openings *</label>
                        <input type="number" class="form-control" id="edit_job_openings" min="1" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_exp">Experience Required</label>
                        <input type="text" class="form-control" id="edit_job_exp" placeholder="e.g. 4-6 Years" autocomplete="off">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_budget">Budget Range (CTC)</label>
                        <input type="text" class="form-control" id="edit_job_budget" placeholder="e.g. ₹14L - ₹18L" autocomplete="off">
                    </div>

                    <div class="col-md-2 col-sm-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_priority">Priority</label>
                        <select class="form-select select2" id="edit_job_priority">
                            <option value="Normal">Normal</option>
                            <option value="High">High</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>

                    <div class="col-md-2 col-sm-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_status">Status</label>
                        <select class="form-select select2" id="edit_job_status">
                            <option value="Active">Active</option>
                            <option value="Draft">Draft</option>
                            <option value="On Hold">On Hold</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;" for="edit_job_desc">Job Description & Responsibilities</label>
                        <textarea class="form-control" id="edit_job_desc" rows="3" placeholder="Provide overview of duties, qualifications and required tech stack..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light-subtle border-top">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnSaveJobEdit">
                    <i class="mdi mdi-content-save me-1"></i> Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3: Cross-Post & Broadcast Job Requisition -->
<div class="modal fade" id="broadcastJobModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-broadcast"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Multi-Channel External Job Syndication</h4>
                        <div class="text-muted" style="font-size:13px;">Broadcast Job Requisition to LinkedIn, Naukri, Indeed & Company Website</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-4">
                <input type="hidden" id="broadcast_job_id">
                <div class="p-3 mb-3 rounded-3 border" style="background:#f0fdf4; border-color:#bbf7d0!important;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="fw-bold text-dark" id="broadcast_job_title" style="font-size:15px;">Senior UI/UX Designer</div>
                            <div class="text-muted" style="font-size:12px;">Job Code: <span class="fw-bold text-dark" id="broadcast_job_code">JOB-101</span> • Location: <span id="broadcast_job_loc">Bangalore (Hybrid)</span> • Budget: <span class="text-success fw-bold" id="broadcast_job_budget">₹14L - ₹18L</span></div>
                        </div>
                        <span class="badge bg-success" id="broadcast_job_status">Active Requisition</span>
                    </div>
                </div>

                <h6 class="fw-bold mb-2" style="font-size:13px;">Select External Portals for Multi-Post / Re-Sync:</h6>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 d-flex align-items-center justify-content-between" style="background:#ffffff;">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded d-flex align-items-center justify-content-center text-white" style="width:38px;height:38px;background:#0077b5;">
                                    <i class="bi bi-linkedin fs-5"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark" style="font-size:13px;">LinkedIn Jobs & Feed</div>
                                    <div class="text-muted" style="font-size:11px;">Direct Organization API Sync</div>
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input platform-toggle" type="checkbox" id="sync_linkedin" checked>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 d-flex align-items-center justify-content-between" style="background:#ffffff;">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded d-flex align-items-center justify-content-center text-white" style="width:38px;height:38px;background:#005cbb;">
                                    <i class="bi bi-briefcase-fill fs-5"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark" style="font-size:13px;">Naukri.com Recruiter</div>
                                    <div class="text-muted" style="font-size:11px;">Resdex & Job Posting API</div>
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input platform-toggle" type="checkbox" id="sync_naukri" checked>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 d-flex align-items-center justify-content-between" style="background:#ffffff;">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded d-flex align-items-center justify-content-center text-white" style="width:38px;height:38px;background:#2164f3;">
                                    <i class="bi bi-globe fs-5"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark" style="font-size:13px;">Indeed & Glassdoor</div>
                                    <div class="text-muted" style="font-size:11px;">XML Feed & One-Click Apply</div>
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input platform-toggle" type="checkbox" id="sync_indeed" checked>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 d-flex align-items-center justify-content-between" style="background:#ffffff;">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded d-flex align-items-center justify-content-center text-white" style="width:38px;height:38px;background:#087a24;">
                                    <i class="bi bi-building fs-5"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark" style="font-size:13px;">Company Career Website</div>
                                    <div class="text-muted" style="font-size:11px;">Google for Jobs Schema Indexing</div>
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input platform-toggle" type="checkbox" id="sync_careers" checked>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Direct Social & Careers Shareable Link Box -->
                <div class="p-3 mb-3 rounded-3" style="background:#f0fdf4; border:1px solid #bbf7d0;">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <label class="form-label fw-bold mb-0" style="font-size:12.5px; color:#087a24;">
                            <i class="bi bi-link-45deg me-1"></i> Official Shareable Job Application Link
                        </label>
                        <span class="badge bg-success text-white" style="font-size:10px;">Public Application URL</span>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control form-control-sm bg-white fw-semibold" id="broadcast_careers_link" readonly value="http://localhost/gharuda-hrms-new/careers.php?job=JOB-101">
                        <button class="btn btn-sm btn-success fw-bold" type="button" id="btnCopyBroadcastLink">
                            <i class="bi bi-clipboard me-1"></i> Copy Link
                        </button>
                        <a id="btnTestBroadcastLink" href="careers.php?job=JOB-101" target="_blank" class="btn btn-sm btn-outline-success fw-bold">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Test Link
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="text-muted small fw-bold" style="font-size:11px;">Quick Share to:</span>
                        <button type="button" class="btn btn-sm btn-outline-success py-0 px-2 rounded-2" style="font-size:11px;" id="shareWhatsappBtn">
                            <i class="bi bi-whatsapp me-1 text-success"></i> WhatsApp
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-2" style="font-size:11px;" id="shareLinkedinBtn">
                            <i class="bi bi-linkedin me-1" style="color:#0077b5;"></i> LinkedIn Post
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" style="font-size:12.5px;">Social & External Platform Share Message</label>
                    <textarea class="form-control" id="broadcast_caption" rows="2" placeholder="Auto-generated job broadcast caption...">🚀 We are hiring! Join our dynamic team as Senior UI/UX Designer. Apply directly on LinkedIn, Naukri, Indeed or our Career Portal.</textarea>
                </div>

                <div class="p-3 rounded-3 bg-light d-none" id="broadcastProgressArea">
                    <div class="fw-bold text-dark mb-2" style="font-size:12.5px;"><i class="bi bi-arrow-repeat me-1 text-primary"></i> Multi-Channel Live Broadcast Status:</div>
                    <div class="d-flex flex-column gap-2" style="font-size:12px;">
                        <div class="d-flex justify-content-between align-items-center p-2 bg-white rounded border" id="status_linkedin_row">
                            <span><i class="bi bi-linkedin me-2" style="color:#0077b5;"></i>LinkedIn Jobs API</span>
                            <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Published & Live</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2 bg-white rounded border" id="status_naukri_row">
                            <span><i class="bi bi-briefcase-fill me-2" style="color:#005cbb;"></i>Naukri Recruiter Resdex</span>
                            <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Published & Live</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2 bg-white rounded border" id="status_indeed_row">
                            <span><i class="bi bi-globe me-2" style="color:#2164f3;"></i>Indeed XML Feed</span>
                            <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Published & Live</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2 bg-white rounded border" id="status_careers_row">
                            <span><i class="bi bi-building me-2" style="color:#087a24;"></i>Company Careers Site</span>
                            <span class="badge bg-success text-white"><i class="bi bi-check-circle me-1"></i>Published & Live</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="btnExecuteBroadcast" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                    <i class="bi bi-send-check me-1"></i> Broadcast & Sync to All Platforms
                </button>
            </div>
        </div>
    </div>
</div>



<!-- MODAL: TL Resource Requests & HR Reply Hub (Executive Light Theme Master-Detail Layout) -->
<div class="modal fade" id="tlRequestsModal" tabindex="-1" aria-labelledby="tlRequestsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg" style="border-radius:20px; overflow:hidden; background:#ffffff; color:#0f172a; border:1px solid #e2e8f0;">
            
            <!-- Modal Header -->
            <div class="modal-header border-bottom px-4 py-3 bg-white" style="border-color:#e2e8f0 !important;">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-2.5 rounded-3" style="background:#e7f7eb; color:#087a24;">
                        <i class="bi bi-chat-left-text-fill fs-4"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0" style="font-size:20px; font-weight:700;" id="tlRequestsModalLabel">TL Resource Requisitions</h5>
                        <div class="text-muted small" style="font-size:13.5px;">Review developer requests from Team Leads and reply with status updates</div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary px-3 py-1.5 fw-bold" style="border-color:#cbd5e1; background:#ffffff; color:#334155; border-radius:8px; font-size:13px;" data-bs-dismiss="modal">Close</button>
            </div>

            <!-- Modal Body (2-Column Master Detail Light Theme) -->
            <div class="modal-body p-0" style="background:#ffffff;" id="tlRequestsModalBody">
                <div class="row g-0" id="tlRequestsContent">
                    <!-- Left Navigation Sidebar -->
                    <div class="col-md-4 col-lg-3 p-3 border-end" style="border-color:#e2e8f0 !important; background:#f8fafc;">
                        <div class="text-secondary small fw-bold mb-3 px-1 text-uppercase" id="tlActiveReqsCount" style="font-size:11px; letter-spacing:0.5px; color:#64748b !important;">
                            Active Requisitions
                        </div>
                        <div class="d-flex flex-column gap-2.5" id="reqListGroup">
                            <!-- Populated dynamically via JS -->
                        </div>
                    </div>

                    <!-- Right Detail Pane & Interactive Reply -->
                    <div class="col-md-8 col-lg-9 p-4" style="background:#ffffff;" id="reqDetailContainer">
                        <!-- Populated dynamically via JS -->
                    </div>
                </div>
                <div class="text-center py-5 d-none" id="tlRequestsEmpty">
                    <i class="bi bi-inbox text-muted display-4"></i>
                    <div class="fw-bold text-dark fs-5 mt-2">No Requests Found</div>
                    <div class="text-muted small">Team Lead resource requests will appear here.</div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="./assets/js/pages/job-openings.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>


