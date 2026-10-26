<?php include 'header.php'; ?>

 

<style>
    :root {
        --gh-primary: #087a24;
        --gh-primary-hover: #06601c;
        --gh-primary-light: #e7f7eb;
        --gh-slate-900: #0f172a;
        --gh-slate-700: #334155;
        --gh-slate-500: #64748b;
        --gh-slate-400: #94a3b8;
        --gh-border: #e2e8f0;
        --gh-bg: #f8fafc;
        --gh-card-bg: #ffffff;
        --gh-shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.05), 0 1px 2px rgba(15, 23, 42, 0.03);
        --gh-shadow-md: 0 4px 14px -2px rgba(15, 23, 42, 0.08), 0 2px 6px -1px rgba(15, 23, 42, 0.04);
    }

    .job-create-wrapper {
        background-color: var(--gh-bg);
        min-height: calc(100vh - 70px);
        padding-bottom: 4rem;
    }

    .create-job-card {
        background: #ffffff;
        border: 1px solid var(--gh-border);
        border-radius: 16px;
        box-shadow: var(--gh-shadow-md);
        overflow: hidden;
    }

    .create-job-header {
        padding: 24px 32px;
        background: #ffffff;
        border-bottom: 1px solid var(--gh-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
    }

    .create-job-title {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--gh-slate-900);
        margin: 0;
        letter-spacing: -0.02em;
    }

    .create-job-body {
        padding: 32px 36px;
    }

    .section-card-title {
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: var(--gh-slate-700);
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-section-divider {
        border-top: 1px solid var(--gh-border);
        margin: 28px 0;
    }

    .portal-input-card {
        background: #f8fafc;
        border: 1px solid var(--gh-border);
        border-radius: 12px;
        padding: 16px;
        transition: all 0.2s ease;
    }
    .portal-input-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }
</style>

<div class="job-create-wrapper">
    <div class="container-fluid px-4 py-3">
        <!-- Title & Action Bar -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <nav class="d-flex align-items-center gap-2 text-neutral mb-1" style="font-size:13px;">
                    <i class="bi bi-briefcase fs-6"></i>
                    <span>Recruitment</span>
                    <i class="bi bi-chevron-right"></i>
                    <a href="job-openings.php" class="text-decoration-none text-neutral">Job Openings</a>
                    <i class="bi bi-chevron-right"></i>
                    <span class="fw-bold text-dark">Post New Job Requisition</span>
                </nav>
                <h1 class="create-job-title"><i class="bi bi-plus-circle text-success me-2"></i> Post New Job Requisition</h1>
            </div>
            <div>
                <a href="job-openings.php" class="btn btn-outline-secondary fw-bold">
                    <i class="bi bi-arrow-left me-1"></i> Back to Openings
                </a>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="create-job-card">
            <div class="create-job-header">
                <div>
                    <h5 class="fw-bold mb-1 text-dark">Requisition Form & Multi-Channel Syndication</h5>
                    <div class="text-muted" style="font-size:13px;">Define position requirements, compensation, careers portal link, and office social syndication channels.</div>
                </div>
                <div>
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-bold" style="font-size:12px;">
                        <i class="bi bi-shield-check me-1"></i> Auto-Sync Active Requisition
                    </span>
                </div>
            </div>

            <div class="create-job-body">
                <form id="createJobPageForm" onsubmit="return false;">
                    
                    <!-- Section 1: Basic Position Details -->
                    <div class="section-card-title">
                        <i class="bi bi-info-circle text-primary fs-5"></i> 1. Basic Position Details
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-bold" style="font-size:12.5px;" for="page_job_title">Job Title / Position Name *</label>
                            <input type="text" class="form-control form-control-lg" id="page_job_title" placeholder="e.g. Senior Full Stack Engineer" required autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;" for="page_job_dept">Department *</label>
                            <select class="form-select form-select-lg" id="page_job_dept" required>
                                <option value="Design">Design</option>
                                <option value="Engineering" selected>Engineering</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                                <option value="iOS Dev">iOS Dev</option>
                                <option value="HR">HR</option>
                                <option value="Sales">Sales</option>
                                <option value="Operations">Operations</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;" for="page_job_location">Work Location *</label>
                            <input type="text" class="form-control" id="page_job_location" placeholder="e.g. Bangalore (Hybrid)" required autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;" for="page_job_type">Employment Type</label>
                            <select class="form-select" id="page_job_type">
                                <option value="Full-Time" selected>Full-Time</option>
                                <option value="Part-Time">Part-Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;" for="page_job_openings">No. of Openings *</label>
                            <input type="number" class="form-control" id="page_job_openings" value="2" min="1" required>
                        </div>
                    </div>

                    <div class="form-section-divider"></div>

                    <!-- Section 2: Scope & Budget -->
                    <div class="section-card-title">
                        <i class="bi bi-cash-stack text-success fs-5"></i> 2. Experience, Budget & Priority
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;" for="page_job_exp">Experience Required</label>
                            <input type="text" class="form-control" id="page_job_exp" placeholder="e.g. 3-5 Years" autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;" for="page_job_budget">Budget Range (Annual CTC)</label>
                            <input type="text" class="form-control" id="page_job_budget" placeholder="e.g. ₹15L - ₹20L" autocomplete="off">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;" for="page_job_priority">Hiring Priority</label>
                            <select class="form-select" id="page_job_priority">
                                <option value="Normal">Normal Priority</option>
                                <option value="High" selected>High Priority</option>
                                <option value="Urgent">Urgent Hiring</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold" style="font-size:12.5px;" for="page_job_desc">Job Description & Responsibilities</label>
                            <textarea class="form-control" id="page_job_desc" rows="4" placeholder="Provide overview of duties, qualifications and required tech stack..."></textarea>
                        </div>
                    </div>

                    <div class="form-section-divider"></div>

                    <!-- Section 3: Official Web Careers Link -->
                    <div class="section-card-title">
                        <i class="bi bi-link-45deg text-success fs-5"></i> 3. Official Shareable Web Careers Application Portal Link
                    </div>

                    <div class="p-3 rounded-3 mb-4" style="background:#f0fdf4; border:1px solid #bbf7d0;">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label fw-bold mb-0" style="font-size:13px; color:#087a24;">
                                <i class="bi bi-globe2 me-1"></i> Public Applicant Link (Generated for Careers Site)
                            </label>
                            <span class="badge bg-success text-white" style="font-size:11px;">Public Candidate Form</span>
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control bg-white fw-semibold" id="page_careers_link" readonly value="http://localhost/gharuda-hrms-new/careers.php?job=JOB-106">
                            <button class="btn btn-success fw-bold px-3" type="button" id="btnPageCopyCareersLink">
                                <i class="bi bi-clipboard me-1"></i> Copy Application Link
                            </button>
                            <a id="btnPagePreviewCareersLink" href="careers.php?job=JOB-106" target="_blank" class="btn btn-outline-success fw-bold px-3">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Test Portal
                            </a>
                        </div>
                        <div class="text-muted small" style="font-size:11.5px;">
                            <i class="bi bi-info-circle me-1"></i> Candidates submitting resumes through this URL will automatically be indexed in your HRMS Candidates & Requisition Pipeline.
                        </div>
                    </div>

                    <!-- Section 4: External Portals & Social Links -->
                    <div class="section-card-title">
                        <i class="bi bi-broadcast text-primary fs-5"></i> 4. Multi-Channel External Syndication & Office Social Links
                    </div>

                    <div class="row g-3 mb-4">
                        <!-- LinkedIn -->
                        <div class="col-md-6">
                            <div class="portal-input-card">
                                <div class="form-check form-switch d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-check-label fw-bold text-dark me-2" for="page_post_linkedin" style="font-size:13px;">
                                        <i class="bi bi-linkedin me-1" style="color:#0077b5;"></i> LinkedIn Jobs API & Company Page
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="page_post_linkedin" checked>
                                </div>
                                <input type="url" class="form-control form-control-sm bg-white" id="page_url_linkedin" placeholder="https://linkedin.com/company/gharuda/jobs" value="https://linkedin.com/company/gharuda-hr/jobs">
                                <div class="text-muted small mt-1" style="font-size:11px;">Office LinkedIn Organization / Post URL</div>
                            </div>
                        </div>

                        <!-- Naukri -->
                        <div class="col-md-6">
                            <div class="portal-input-card">
                                <div class="form-check form-switch d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-check-label fw-bold text-dark me-2" for="page_post_naukri" style="font-size:13px;">
                                        <i class="bi bi-briefcase-fill me-1" style="color:#005cbb;"></i> Naukri.com Recruiter
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="page_post_naukri" checked>
                                </div>
                                <input type="url" class="form-control form-control-sm bg-white" id="page_url_naukri" placeholder="https://recruiter.naukri.com/job-listings" value="https://recruiter.naukri.com/job-listings/gharuda">
                                <div class="text-muted small mt-1" style="font-size:11px;">Office Naukri Recruiter Listing URL</div>
                            </div>
                        </div>

                        <!-- Indeed -->
                        <div class="col-md-6">
                            <div class="portal-input-card">
                                <div class="form-check form-switch d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-check-label fw-bold text-dark me-2" for="page_post_indeed" style="font-size:13px;">
                                        <i class="bi bi-globe me-1" style="color:#2164f3;"></i> Indeed & Glassdoor Employer Feed
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="page_post_indeed" checked>
                                </div>
                                <input type="url" class="form-control form-control-sm bg-white" id="page_url_indeed" placeholder="https://indeed.com/cmp/gharuda/jobs" value="https://indeed.com/cmp/gharuda/jobs">
                                <div class="text-muted small mt-1" style="font-size:11px;">Office Indeed Employer Profile Page</div>
                            </div>
                        </div>

                        <!-- Web Portal -->
                        <div class="col-md-6">
                            <div class="portal-input-card" style="background:#f0fdf4; border-color:#bbf7d0;">
                                <div class="form-check form-switch d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-check-label fw-bold text-dark me-2" for="page_post_careers" style="font-size:13px;">
                                        <i class="bi bi-building me-1" style="color:#087a24;"></i> Company Official Careers Portal
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="page_post_careers" checked>
                                </div>
                                <input type="url" class="form-control form-control-sm bg-white fw-semibold" id="page_url_careers_display" readonly value="http://localhost/gharuda-hrms-new/careers.php">
                                <div class="text-muted small mt-1" style="font-size:11px;">Google for Jobs Schema Indexing Active</div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Social Channels -->
                    <div class="p-3 rounded-3 border bg-light mb-4">
                        <label class="form-label fw-bold mb-2" style="font-size:12.5px; color:var(--gh-slate-700);">
                            <i class="bi bi-share me-1 text-success"></i> Office Social Broadcast Links (WhatsApp / Instagram / Facebook)
                        </label>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-success fw-bold"><i class="bi bi-whatsapp"></i></span>
                                    <input type="text" class="form-control bg-white" id="page_url_whatsapp" placeholder="WhatsApp Broadcast link..." value="https://api.whatsapp.com/send?text=We%20are%20hiring!">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-primary fw-bold"><i class="bi bi-facebook me-1"></i> / <i class="bi bi-instagram text-danger ms-1 me-1"></i></span>
                                    <input type="url" class="form-control bg-white" id="page_url_social" placeholder="Office Instagram/FB Careers URL" value="https://facebook.com/gharuda.careers">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Footer Buttons -->
                    <div class="d-flex align-items-center justify-content-end gap-3 pt-3 border-top">
                        <a href="job-openings.php" class="btn btn-light px-4 fw-bold">Cancel</a>
                        <button type="button" class="btn btn-success px-4 py-2 fw-bold" id="btnPagePublishJob" style="background:var(--gh-primary); border-color:var(--gh-primary);">
                            <i class="bi bi-broadcast me-1"></i> Publish Requisition & Syndicated Social Links
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/pages/job-create.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
