<?php include 'header.php'; ?>

 


<style>
    :root {
        --gh-emerald: #087a24;
        --gh-emerald-dark: #06601c;
        --gh-emerald-light: #e7f7eb;
        --gh-border: #e2e8f0;
    }

    .req-kpi {
        background: #ffffff;
        border: 1px solid var(--gh-border);
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: 0 4px 16px rgba(20, 30, 25, 0.04);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .req-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(20, 30, 25, 0.07);
    }
    .req-kpi .icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .req-kpi .label {
        color: #64748b;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .req-kpi .value {
        color: #0f172a;
        font-size: 22px;
        font-weight: 800;
    }
    .req-kpi .sub {
        color: #64748b;
        font-size: 11px;
        margin-top: 3px;
    }

    .badge-status-pending {
        background: #fff4d9;
        color: #b56b00;
        border: 1px solid #ffe6a3;
        padding: 5px 12px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .badge-status-posted {
        background: #e7f7eb;
        color: #087a24;
        border: 1px solid #bdf0c8;
        padding: 5px 12px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .badge-status-rejected {
        background: #fdebed;
        color: #be3035;
        border: 1px solid #f9c2c5;
        padding: 5px 12px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .tl-msg-box {
        background: #f8fafc;
        border-left: 4px solid var(--gh-emerald);
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 13px;
        color: #334155;
    }

    .priority-tag-urgent { background: #fee2e2; color: #dc2626; font-size: 11px; font-weight: 700; padding: 3px 8px; border-radius: 6px; }
    .priority-tag-high { background: #ffedd5; color: #ea580c; font-size: 11px; font-weight: 700; padding: 3px 8px; border-radius: 6px; }
    .priority-tag-normal { background: #e0f2fe; color: #0284c7; font-size: 11px; font-weight: 700; padding: 3px 8px; border-radius: 6px; }

    /* Action buttons */
    .btn-approve-post {
        background: linear-gradient(135deg, #087a24 0%, #06601c 100%);
        color: #ffffff !important;
        font-weight: 700;
        font-size: 12px;
        padding: 6px 14px;
        border-radius: 8px;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 2px 8px rgba(8, 122, 36, 0.25);
        transition: all 0.2s ease;
    }
    .btn-approve-post:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(8, 122, 36, 0.35);
        background: linear-gradient(135deg, #06601c 0%, #044815 100%);
    }

    .btn-new-req {
        background: linear-gradient(135deg, #087a24 0%, #06601c 100%);
        color: #ffffff !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 10px 20px;
        border-radius: 10px;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 14px rgba(8, 122, 36, 0.3);
    }
    /* Ultra-Rich Green Segmented Tab Control */
    .status-segment-control {
        display: inline-flex;
        align-items: center;
        background: #f0fdf4;
        padding: 4px;
        border-radius: 12px;
        border: 1px solid #bbf7d0;
        gap: 4px;
        box-shadow: inset 0 1px 3px rgba(8, 122, 36, 0.05);
    }
    .status-segment-btn {
        border: none;
        background: transparent;
        color: #166534;
        font-weight: 700;
        font-size: 12.5px;
        padding: 6px 14px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        line-height: 1.2;
    }
    .status-segment-btn * {
        pointer-events: none;
    }
    .status-segment-btn:hover {
        color: #064e3b;
        background: rgba(187, 247, 208, 0.5);
    }
    .status-segment-btn .segment-count {
        font-size: 11px;
        font-weight: 800;
        padding: 2px 8px;
        border-radius: 20px;
        background: #dcfce7;
        color: #166534;
        transition: all 0.2s ease;
    }
    .status-segment-btn.active {
        background: linear-gradient(135deg, #087a24 0%, #06601c 100%);
        color: #ffffff !important;
        box-shadow: 0 3px 10px rgba(8, 122, 36, 0.35);
    }
    .status-segment-btn.active .segment-count {
        background: #ffffff !important;
        color: #087a24 !important;
    }
    .status-segment-btn.active i {
        color: #ffffff !important;
    }

    /* Action Icon Buttons */
    .btn-action-icon {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        transition: all 0.22s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0;
        cursor: pointer;
    }

    .btn-action-icon:hover {
        transform: translateY(-2px);
    }

    .btn-action-reply {
        background: #f0fdf4;
        border: 1.5px solid #bbf7d0;
        color: #16a34a;
    }

    .btn-action-reply:hover {
        background: #dcfce7;
        border-color: #86efac;
        color: #15803d;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.22);
    }

    .btn-action-pending {
        background: #fffbeb;
        border: 1.5px solid #fef08a;
        color: #d97706;
    }

    .btn-action-pending:hover {
        background: #fef3c7;
        border-color: #fde68a;
        color: #b45309;
        box-shadow: 0 4px 12px rgba(217, 119, 6, 0.22);
    }

    .btn-action-edit {
        background: #f5f3ff;
        border: 1.5px solid #ddd6fe;
        color: #7c3aed;
    }

    .btn-action-edit:hover {
        background: #ede9fe;
        border-color: #c4b5fd;
        color: #6d28d9;
        box-shadow: 0 4px 12px rgba(124, 58, 237, 0.22);
    }
</style>

<div class="container-fluid px-4 py-3">
    <!-- Title & Navigation -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;"> Resources</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
                <i class="bi bi-briefcase fs-6"></i>
                <span>Recruitment</span>
                <i class="bi bi-chevron-right"></i>
                <span class="fw-bold text-dark"> Developer Requisitions</span>
            </nav>
        </div>
        <div class="d-flex gap-2">
            <!-- <a href="job-openings.php" class="btn btn-outline-secondary" style="border-radius:10px; font-weight:600;">
                <i class="bi bi-eye me-1"></i> View All Job Openings
            </a> -->
            <button type="button" class="btn btn-new-req" data-bs-toggle="modal" data-bs-target="#newRequisitionModal">
                <i class="bi bi-plus-circle-fill"></i>Resource Request for Project
            </button>
        </div>
    </div>

    <!-- Alert / Banner message explaining flow -->
    <!-- <div class="alert alert-success border-0 shadow-sm d-flex align-items-center gap-3 p-3 mb-4" style="border-radius:12px; background:#f0fdf4; border-left:4px solid #087a24 !important;">
        <div class="bg-success text-white rounded-circle p-2 d-grid place-items-center" style="width:36px; height:36px; flex-shrink:0;">
            <i class="bi bi-chat-left-text-fill fs-6"></i>
        </div>
        <div>
            <div class="fw-bold text-dark" style="font-size:14px;">Recruitment Request Flow (TL ➔ HR ➔ Job Posting)</div>
            <div class="text-muted" style="font-size:12.5px;">
                Team Leads (TL) submit resource requests when projects require developers. HR reviews the request message, verifies project requirements, and posts a new Job Opening with 1 click.
            </div>
        </div>
    </div> -->

    <!-- KPI Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="req-kpi d-flex align-items-center gap-3">
                <div class="icon" style="background:#eaf1ff; color:#3564e0;"><i class="bi bi-chat-square-dots"></i></div>
                <div>
                    <div class="label">Total TL Requests</div>
                    <div class="value" id="kpiTotalReqs">3</div>
                    <div class="sub">From active project leads</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="req-kpi d-flex align-items-center gap-3">
                <div class="icon" style="background:#fff3dc; color:#b56b00;"><i class="bi bi-hourglass-split"></i></div>
                <div>
                    <div class="label">Pending HR Review</div>
                    <div class="value text-warning" id="kpiPendingHr">2</div>
                    <div class="sub">Awaiting HR verification & job post</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="req-kpi d-flex align-items-center gap-3">
                <div class="icon" style="background:#e9f7ec; color:#11872c;"><i class="bi bi-check-circle-fill"></i></div>
                <div>
                    <div class="label">Approved & Job Posted</div>
                    <div class="value text-success" id="kpiApprovedPosted">1</div>
                    <div class="sub">Converted to active Job Openings</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="req-kpi d-flex align-items-center gap-3">
                <div class="icon" style="background:#f3e8ff; color:#9333ea;"><i class="bi bi-person-plus-fill"></i></div>
                <div>
                    <div class="label">Total Devs Requested</div>
                    <div class="value" style="color:#9333ea;" id="kpiTotalDevs">6</div>
                    <div class="sub">Developer openings requested</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="card-custom p-0" id="requisitionsTableWrap">
        <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-list-task"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">TL Requisitions List</h3>
                </div>
            </div>
            <div class="status-segment-control" id="statusFilterGroup">
                <button type="button" class="status-segment-btn active" data-filter="all">
                    <span>All</span> <span class="segment-count" id="countAll">3</span>
                </button>
                <button type="button" class="status-segment-btn" data-filter="Pending">
                    <i class="bi bi-circle-fill" style="font-size:6px; color:#b56b00;"></i>
                    <span>Pending</span> <span class="segment-count" id="countPending">2</span>
                </button>
                <button type="button" class="status-segment-btn" data-filter="Posted">
                    <i class="bi bi-circle-fill" style="font-size:6px; color:#087a24;"></i>
                    <span>Posted</span> <span class="segment-count" id="countPosted">1</span>
                </button>
            </div>
        </div>

        <!-- Table (toolbar & footer auto-created by master-table.js) -->
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0" id="requisitionsTable">
                <thead>
                    <tr>
                        <th class="text-nowrap">S.No</th>
                        <th class="text-nowrap">Project Name</th>
                        <th class="text-nowrap">Requested By</th>
                        <th class="text-nowrap">Requested Date</th>
                        <th class="text-nowrap">Developer Role Requested</th>
                        <th class="text-nowrap">Department</th>
                        <th class="text-nowrap">Experience</th>
                        <th class="text-nowrap text-center">Openings</th>
                        <th class="text-nowrap">Priority</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="requisitionsTbody">
                    <!-- Rows dynamically populated by MasterTable -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL 1: Submit New Developer Requisition (TL View) -->
<div class="modal fade" id="newRequisitionModal" tabindex="-1" aria-labelledby="newRequisitionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-bottom p-4" style="background:linear-gradient(135deg, #f8fafc 0%, #e7f7eb 100%);">
                <div>
                    <h5 class="modal-title fw-bold text-dark" id="newRequisitionModalLabel">
                        <i class="bi bi-person-plus-fill me-2" style="color:var(--gh-emerald);"></i> Submit Developer Requisition to HR
                    </h5>
                    <div class="text-muted" style="font-size:12.5px;">Team Lead request for developer resources required for a project</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formNewRequisition">
                <div class="modal-body p-4">
                    <input type="hidden" name="action" value="create_requisition">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Project Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="Project_Name" placeholder="Project Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Requested Position / Job Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="job_title" placeholder="e.g. Senior Fullstack React & Node Developer" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Department <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="department" required>
                                <option value="Engineering">Engineering</option>
                                <option value="Design">Design</option>
                                <option value="iOS Dev">iOS Dev</option>
                                <option value="Android Dev">Android Dev</option>
                                <option value="QA & Automation">QA & Automation</option>
                                <option value="DevOps & Cloud">DevOps & Cloud</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">No. of Developers Required <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="openings" value="2" min="1" max="20" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Priority Level <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="priority" required>
                                <option value="Urgent">High</option>
                                <option value="High" selected>Medium</option>
                                <option value="Normal">Low</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Experience Required</label>
                            <input type="text" class="form-control" name="experience" placeholder="e.g. 3-5 Years" value="3-5 Years">
                        </div>
                        <!-- <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Budget / CTC Estimate</label>
                            <input type="text" class="form-control" name="budget" placeholder="e.g. ₹14L - ₹18L CTC" value="₹12L - ₹18L">
                        </div> -->

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Requested By (TL Name) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="requested_by" value="Santhosh Kumar (Tech Lead)" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">TL Email Address</label>
                            <input type="email" class="form-control" name="tl_email" value="santhosh.k@gharuda.com">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Message / Note to HR <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="tl_message" rows="3" placeholder="Explain why developers are needed, required tech stack, project goals, client deadlines..." required>We urgently need 2 developers for our project module expansion starting next month. Please check and post a new job post for recruitment.</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-new-req" id="btnSubmitReq">
                        <i class="bi bi-send-fill me-1"></i> Send Request to HR
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL 2: Edit Requisition Details -->
<div class="modal fade" id="editReqModal" tabindex="-1" aria-labelledby="editReqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-bottom p-4" style="background:linear-gradient(135deg, #f8fafc 0%, #e7f7eb 100%);">
                <div>
                    <h5 class="modal-title fw-bold text-dark" id="editReqModalLabel">
                        <i class="bi bi-pencil-square me-2" style="color:var(--gh-emerald);"></i> Edit Requisition Details
                    </h5>
                    <div class="text-muted" style="font-size:12.5px;">Modify project requirements, requested openings, status, or notes for <span id="eReqIdBadge" class="fw-bold text-success">REQ-2026-000</span></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEditRequisition">
                <div class="modal-body p-4">
                    <input type="hidden" name="action" value="edit_requisition">
                    <input type="hidden" name="req_id" id="eReqId">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Project Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="project_name" id="eProjectName" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Requested Position / Job Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="job_title" id="eJobTitle" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Department <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="department" id="eDept" required>
                                <option value="Engineering">Engineering</option>
                                <option value="Design">Design</option>
                                <option value="iOS Dev">iOS Dev</option>
                                <option value="Android Dev">Android Dev</option>
                                <option value="QA & Automation">QA & Automation</option>
                                <option value="DevOps & Cloud">DevOps & Cloud</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Openings Count <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="openings" id="eOpenings" min="1" max="50" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Priority Level <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="priority" id="ePriority" required>
                                <option value="Urgent">Urgent - Client Deadline</option>
                                <option value="High">High Priority</option>
                                <option value="Normal">Normal</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Experience Required</label>
                            <input type="text" class="form-control" name="experience" id="eExp">
                        </div>
                        <!-- <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Budget / CTC Estimate</label>
                            <input type="text" class="form-control" name="budget" id="eBudget">
                        </div> -->

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Requested By (TL Name) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="requested_by" id="eRequestedBy" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">TL Email</label>
                            <input type="email" class="form-control" name="tl_email" id="eTlEmail">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Requisition Status <span class="text-danger">*</span></label>
                            <select class="form-select select2 fw-bold text-success" name="status" id="eStatus" required>
                                <option value="Pending HR Review">Pending HR Review</option>
                                <option value="Approved & Job Posted">Approved & Job Posted</option>
                                <option value="Under Review">Under Review</option>
                                <option value="On Hold">On Hold</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">TL Message / Project Requirement Notes</label>
                            <textarea class="form-control" name="tl_message" id="eTlMessage" rows="3" required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">HR Verification Notes & Comments</label>
                            <textarea class="form-control" name="hr_notes" id="eHrNotes" rows="2" placeholder="Notes from HR review..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success fw-bold" id="btnSaveEditReq" style="background:#087a24; border-color:#087a24;">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Requisition Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL 3: HR Approve & Publish Job Modal -->
<div class="modal fade" id="approvePostModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-bottom p-4" style="background:linear-gradient(135deg, #e7f7eb 0%, #ffffff 100%);">
                <div>
                    <h5 class="modal-title fw-bold text-dark">
                        <i class="bi bi-briefcase-fill me-2" style="color:var(--gh-emerald);"></i> HR Check: Post New Job Opening
                    </h5>
                    <div class="text-muted" style="font-size:12.5px;">Convert TL Request <span id="apReqId" class="fw-bold text-success">REQ-2026-XXX</span> into active Job Post</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formApprovePost">
                <div class="modal-body p-4">
                    <input type="hidden" name="action" value="approve_and_post">
                    <input type="hidden" name="req_id" id="apHiddenReqId">

                    <div class="alert alert-info py-2 px-3 mb-3 d-flex align-items-center gap-2" style="font-size:12.5px;">
                        <i class="bi bi-info-circle-fill fs-5 text-primary"></i>
                        <div>HR checked the TL request message! Review parameters below and click <b>Publish Job Opening</b>.</div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Job Posting Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="job_title" id="apJobTitle" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Openings <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="openings" id="apOpenings" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Department</label>
                            <input type="text" class="form-control" name="department" id="apDept" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Priority</label>
                            <input type="text" class="form-control" name="priority" id="apPriority" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Work Location</label>
                            <select class="form-select select2" name="location">
                                <option value="Bangalore (Hybrid)">Bangalore (Hybrid)</option>
                                <option value="Chennai (On-site)">Chennai (On-site)</option>
                                <option value="Hyderabad (Remote)">Hyderabad (Remote)</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Budget / Salary CTC Range</label>
                            <input type="text" class="form-control" name="budget" id="apBudget" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Job Posting Portals</label>
                            <div class="d-flex align-items-center gap-3 pt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="postLnk" checked>
                                    <label class="form-check-input-label fw-semibold text-primary" for="postLnk"><i class="bi bi-linkedin"></i> LinkedIn</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="postNaukri" checked>
                                    <label class="form-check-input-label fw-semibold text-primary" for="postNaukri"><i class="bi bi-briefcase-fill"></i> Naukri</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="postCareers" checked>
                                    <label class="form-check-input-label fw-semibold text-success" for="postCareers"><i class="bi bi-building"></i> Careers Page</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">HR Verification Notes & Comments</label>
                            <textarea class="form-control" name="hr_notes" rows="2" placeholder="e.g. Verified with Project Manager. Budget approved. Job requisition converted to active job post.">Verified project requirement message with TL. Budget approved. Job opening created & syndicated to recruitment portals.</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-approve-post" id="btnConfirmApprovePost">
                        <i class="bi bi-check-circle-fill me-1"></i> Publish Job Opening Now
                    </button>
                </div>
            </form>
    </div>
</div>
                                </div>
<!-- MODAL: View HR Reply & Communication Activity Timeline (Light Theme Professional UI) -->
<div class="modal fade" id="viewHrReplyModal" tabindex="-1" aria-labelledby="viewHrReplyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:20px; overflow:hidden; background:#ffffff;">
            <!-- Modal Header -->
            <div class="modal-header border-bottom p-4 pb-3 bg-white align-items-start justify-content-between">
                <div>
                    <div class="fw-bold text-muted small mb-1" style="font-size:11.5px; letter-spacing:0.5px; text-transform:uppercase;" id="vhrProjectName">Gharuda HRMS Enterprise</div>
                    <h5 class="modal-title fw-bold text-dark mb-2" style="font-size:1.25rem;" id="vhrJobTitle">
                        Senior React and Node.js Lead Developer
                    </h5>
                    <!-- Metric Pills Row -->
                    <div class="d-flex align-items-center gap-2 flex-wrap mt-2">
                        <span class="badge bg-light text-dark border px-3 py-1.5 rounded-pill font-monospace" style="font-size:12px; font-weight:600;">
                            <i class="bi bi-people me-1 text-secondary"></i> <span id="vhrOpenings">2</span> openings
                        </span>
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-1.5 rounded-pill fw-bold" style="font-size:12px;" id="vhrPriority">Urgent</span>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-bold" style="font-size:12.5px;" id="vhrStatusBadge">Approved & Job Posted</span>
                    <button type="button" class="btn-close rounded-circle p-2 bg-light border shadow-sm" data-bs-dismiss="modal" aria-label="Close" style="font-size:11px;"></button>
                </div>
            </div>

            <!-- Modal Body (Timeline View) -->
            <div class="modal-body p-4 pt-4 pb-4" style="background:#ffffff;">
                
                <!-- Vertical Timeline Wrapper -->
                <div class="position-relative ps-4 py-2 ms-2">
                    <!-- Vertical Connecting Line -->
                    <div class="position-absolute" style="left:7px; top:14px; bottom:36px; width:2px; background:#cbd5e1;"></div>

                    <!-- Timeline Item 1: TL Request -->
                    <div class="position-relative mb-4 pb-2">
                        <!-- Dot Indicator -->
                        <div class="position-absolute rounded-circle shadow-sm" style="left:-29px; top:4px; width:14px; height:14px; background:#94a3b8; border:3px solid #ffffff; box-shadow:0 0 0 2px #cbd5e1;"></div>
                        
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fw-bold text-dark" style="font-size:14px;">Request from <span id="vhrRequestedBy">Santhosh Kumar</span></span>
                            <span class="text-muted small fw-medium" id="vhrDateRequested">29-Sep-2026</span>
                        </div>
                        <div class="p-3.5 p-3 rounded-3 bg-white border text-dark shadow-xs" style="border-color:#e2e8f0 !important; font-size:14px; line-height:1.6; color:#1e293b !important;" id="vhrTlMessage">
                            We urgently need 2 Fullstack React + Node developers for module expansion. Client deadline is approaching end of next month.
                        </div>
                    </div>

                    <!-- Timeline Item 2: HR Response -->
                    <div class="position-relative">
                        <!-- Dot Indicator -->
                        <div class="position-absolute rounded-circle shadow-sm" style="left:-29px; top:4px; width:14px; height:14px; background:#16a34a; border:3px solid #ffffff; box-shadow:0 0 0 2px #bbf7d0;"></div>
                        
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="fw-bold text-success" style="font-size:14px; color:#15803d !important;">Reply from Priya Sharma, HR Lead</span>
                            <span class="text-muted small fw-medium" id="vhrReplyDate">01-Oct-2026 10:49</span>
                        </div>
                        <div class="p-3.5 p-3 rounded-3 border text-dark shadow-xs mb-3" style="background:#f0fdf4; border-color:#bbf7d0 !important; font-size:14px; line-height:1.6; color:#0f172a !important;" id="vhrHrReplyText">
                            Requisition approved. Position JOB-101 has been published on LinkedIn and Naukri. Applications are coming in.
                        </div>
                        <div id="vhrJobCodeLinkBox" style="display:none;" class="pt-1">
                            <a href="job-openings.php" class="btn text-white fw-bold px-4 py-2.5 shadow-sm" style="background:#087a24; border:none; border-radius:10px; font-size:13.5px; box-shadow:0 4px 14px rgba(8, 122, 36, 0.25);">
                                View live job posting ( <span id="vhrJobCodeText">JOB-101</span> ) <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
function openHrReplyModal(btn) {
    try {
        const dataStr = btn.getAttribute('data-req');
        if (!dataStr) return;
        const data = JSON.parse(dataStr);

        if (document.getElementById('vhrReqId')) document.getElementById('vhrReqId').textContent = data.req_id || 'REQ';
        if (document.getElementById('vhrProjectName')) document.getElementById('vhrProjectName').textContent = data.project_name || 'Project';
        if (document.getElementById('vhrJobTitle')) document.getElementById('vhrJobTitle').textContent = data.job_title || 'Developer';
        if (document.getElementById('vhrStatusBadge')) document.getElementById('vhrStatusBadge').textContent = data.status || 'Pending';
        if (document.getElementById('vhrRequestedBy')) document.getElementById('vhrRequestedBy').textContent = data.requested_by || 'Team Lead';
        if (document.getElementById('vhrDateRequested')) document.getElementById('vhrDateRequested').textContent = data.date_requested || '';
        if (document.getElementById('vhrTlMessage')) document.getElementById('vhrTlMessage').textContent = data.tl_message || 'No specific message provided.';
        if (document.getElementById('vhrOpenings')) document.getElementById('vhrOpenings').textContent = data.openings || '1';
        if (document.getElementById('vhrBudget')) document.getElementById('vhrBudget').textContent = data.budget || 'Best in Industry';
        if (document.getElementById('vhrPriority')) document.getElementById('vhrPriority').textContent = data.priority || 'Normal';
        
        if (document.getElementById('vhrHrReplyText')) document.getElementById('vhrHrReplyText').textContent = data.hr_reply || 'HR has reviewed and acknowledged the requisition.';
        if (document.getElementById('vhrReplyDate')) document.getElementById('vhrReplyDate').textContent = data.hr_reply_date || 'Recently';

        const jobCodeBox = document.getElementById('vhrJobCodeLinkBox');
        const jobCodeText = document.getElementById('vhrJobCodeText');
        if (jobCodeBox && jobCodeText) {
            if (data.job_code) {
                jobCodeText.textContent = data.job_code;
                jobCodeBox.style.display = 'block';
            } else {
                jobCodeBox.style.display = 'none';
            }
        }

        const modalEl = document.getElementById('viewHrReplyModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    } catch(err) {
        console.error("Error opening HR Reply Modal:", err);
    }
}

function openEditReqModal(btn) {
    try {
        const dataStr = btn.getAttribute('data-req');
        if (!dataStr) return;
        const req = JSON.parse(dataStr);

        if (document.getElementById('eReqIdBadge')) document.getElementById('eReqIdBadge').textContent = req.req_id;
        if (document.getElementById('eReqId')) document.getElementById('eReqId').value = req.req_id;
        if (document.getElementById('eProjectName')) document.getElementById('eProjectName').value = req.project_name || '';
        if (document.getElementById('eJobTitle')) document.getElementById('eJobTitle').value = req.job_title || '';
        if (document.getElementById('eDept')) document.getElementById('eDept').value = req.department || 'Engineering';
        if (document.getElementById('eOpenings')) document.getElementById('eOpenings').value = req.openings || 1;
        if (document.getElementById('ePriority')) document.getElementById('ePriority').value = req.priority || 'Normal';
        if (document.getElementById('eExp')) document.getElementById('eExp').value = req.experience || '';
        if (document.getElementById('eBudget')) document.getElementById('eBudget').value = req.budget || '';
        if (document.getElementById('eRequestedBy')) document.getElementById('eRequestedBy').value = req.requested_by || '';
        if (document.getElementById('eTlEmail')) document.getElementById('eTlEmail').value = req.tl_email || '';
        if (document.getElementById('eStatus')) document.getElementById('eStatus').value = req.status || 'Pending HR Review';
        if (document.getElementById('eTlMessage')) document.getElementById('eTlMessage').value = req.tl_message || '';
        if (document.getElementById('eHrNotes')) document.getElementById('eHrNotes').value = req.hr_notes || '';

        const modalEl = document.getElementById('editReqModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    } catch(err) {
        console.error("Error opening Edit Req Modal:", err);
    }
}

document.addEventListener('DOMContentLoaded', function() {

    var defaultReqData = [
        {
            req_id: "REQ-2026-001",
            project_name: "Gharuda HRMS Enterprise v2",
            job_title: "Senior React & Node.js Lead Developer",
            department: "Engineering",
            openings: 2,
            priority: "Urgent",
            experience: "4-6 Years",
            budget: "₹16L - ₹22L",
            status: "Pending HR Review",
            requested_by: "Santhosh Kumar (Tech Lead)",
            tl_email: "santhosh.k@gharuda.com",
            date_requested: "12-Oct-2026",
            tl_message: "We urgently need 2 Fullstack React + Node developers for module expansion. Client deadline is approaching end of next month. Please check and post this job opening as soon as possible.",
            job_code: "",
            hr_notes: ""
        },
        {
            req_id: "REQ-2026-002",
            project_name: "Fintech Core Banking API",
            job_title: "Go / Microservices Backend Architect",
            department: "Engineering",
            openings: 3,
            priority: "High",
            experience: "5-8 Years",
            budget: "₹22L - ₹30L",
            status: "Approved & Job Posted",
            requested_by: "Karthik V (Principal Lead)",
            tl_email: "karthik.v@gharuda.com",
            date_requested: "09-Oct-2026",
            tl_message: "High-throughput API microservices work requires senior Go backend developers experienced in distributed caching and Redis.",
            job_code: "JOB-102",
            hr_notes: "Job posted on LinkedIn & Naukri portals. Initial candidate screening in progress."
        },
        {
            req_id: "REQ-2026-003",
            project_name: "Retail Mobile App Solution",
            job_title: "iOS Native App Developer (SwiftUI)",
            department: "iOS Dev",
            openings: 1,
            priority: "Normal",
            experience: "3-5 Years",
            budget: "₹12L - ₹16L",
            status: "Pending HR Review",
            requested_by: "Anitha R (Mobile Lead)",
            tl_email: "anitha.r@gharuda.com",
            date_requested: "13-Oct-2026",
            tl_message: "iOS developer needed for payment gateway integration and checkout screen redesign in Sprint 4.",
            job_code: "",
            hr_notes: ""
        }
    ];

    var reqData;
    try {
        var stored = localStorage.getItem('gh_job_requisitions');
        if (stored) {
            reqData = JSON.parse(stored);
        } else {
            reqData = defaultReqData.slice();
            localStorage.setItem('gh_job_requisitions', JSON.stringify(reqData));
        }
    } catch(e) {
        reqData = defaultReqData.slice();
    }

    function saveReqData() {
        try {
            localStorage.setItem('gh_job_requisitions', JSON.stringify(reqData));
        } catch(e) {}
    }

    function updateKpiCounts() {
        var total = reqData.length;
        var pending = 0;
        var posted = 0;
        var devs = 0;
        reqData.forEach(function(r) {
            devs += parseInt(r.openings, 10) || 0;
            var st = (r.status || '').toLowerCase();
            if (st.includes('pending')) pending++;
            else if (st.includes('posted') || st.includes('approved')) posted++;
        });

        var elTotal = document.getElementById('kpiTotalReqs');
        var elPending = document.getElementById('kpiPendingHr');
        var elPosted = document.getElementById('kpiApprovedPosted');
        var elDevs = document.getElementById('kpiTotalDevs');

        if (elTotal) elTotal.textContent = total;
        if (elPending) elPending.textContent = pending;
        if (elPosted) elPosted.textContent = posted;
        if (elDevs) elDevs.textContent = devs;

        var cAll = document.getElementById('countAll');
        var cPending = document.getElementById('countPending');
        var cPosted = document.getElementById('countPosted');

        if (cAll) cAll.textContent = total;
        if (cPending) cPending.textContent = pending;
        if (cPosted) cPosted.textContent = posted;
    }

    var reqTable = MasterTable.init({
        tableId: 'requisitionsTable',
        tbodyId: 'requisitionsTbody',
        data: reqData,
        tableName: 'TL Developer Requisitions',
        primaryKey: 'req_id',
        searchFields: ['project_name', 'requested_by', 'job_title', 'department', 'experience', 'priority', 'status', 'date_requested'],
        columns: [
            { field: 'project_name', title: 'Project Name', sortable: true, render: function(v) {
                return '<div class="fw-bold text-dark">' + (v || '') + '</div>';
            }},
            { field: 'requested_by', title: 'Requested By', sortable: true, render: function(v) {
                return '<div class="fw-semibold text-dark"><i class="bi bi-person me-1 text-secondary"></i>' + (v || '') + '</div>';
            }},
            { field: 'date_requested', title: 'Requested Date', sortable: true, render: function(v) {
                return '<div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>' + (v || '') + '</div>';
            }},
            { field: 'job_title', title: 'Developer Role Requested', sortable: true, render: function(v, row) {
                var safeMsg = row.tl_message ? String(row.tl_message).replace(/"/g, '&quot;') : '';
                var msg = row.tl_message ? '<div class="text-truncate text-muted" style="max-width:240px; font-size:11.5px;" title="' + safeMsg + '"><i class="bi bi-quote me-1 text-primary"></i> ' + row.tl_message + '</div>' : '';
                return '<div class="fw-bold text-dark">' + (v || '') + '</div>' + msg;
            }},
            { field: 'department', title: 'Department', sortable: true, render: function(v) {
                return '<span class="badge bg-light text-dark border">' + (v || '') + '</span>';
            }},
            { field: 'experience', title: 'Experience', sortable: true, render: function(v) {
                return '<span class="fw-medium text-dark" style="font-size:12.5px;">' + (v || '') + '</span>';
            }},
            { field: 'openings', title: 'Openings', sortable: true, render: function(v) {
                return '<div class="text-center fw-bold fs-6 text-dark">' + (v || 1) + '</div>';
            }},
            { field: 'priority', title: 'Priority', sortable: true, render: function(v) {
                var prioClass = 'priority-tag-normal';
                if (v === 'Urgent') prioClass = 'priority-tag-urgent';
                else if (v === 'High') prioClass = 'priority-tag-high';
                return '<span class="' + prioClass + '">' + (v || 'Normal') + '</span>';
            }},
            { field: 'status', title: 'Status', sortable: true, render: function(v, row) {
                var statusClass = 'badge-status-pending';
                if (v === 'Approved & Job Posted') statusClass = 'badge-status-posted';
                else if (v === 'Rejected') statusClass = 'badge-status-rejected';
                var jCode = row.job_code ? '<div class="mt-1" style="font-size:11px;"><a href="job-openings.php" class="fw-bold text-success text-decoration-none"><i class="bi bi-link-45deg"></i> ' + row.job_code + '</a></div>' : '';
                return '<span class="' + statusClass + '"><i class="bi bi-circle-fill" style="font-size:7px;"></i> ' + (v || '') + '</span>' + jCode;
            }},
            { field: null, title: 'Action', sortable: false, render: function(v, row) {
                var reqStr = JSON.stringify(row).replace(/"/g, '&quot;');
                var replyBtn = row.hr_reply ?
                    '<button type="button" class="btn btn-action-icon btn-action-reply position-relative shadow-xs" onclick="openHrReplyModal(this)" data-bs-toggle="tooltip" data-bs-placement="top" title="View HR Reply & Activity Timeline" data-req="' + reqStr + '"><i class="bi bi-chat-left-text-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-success border border-white shadow-sm" style="font-size:9.5px; padding:3px 5px; transform: translate(-30%, -30%) !important;">1</span></button>' :
                    '<button type="button" class="btn btn-action-icon btn-action-pending shadow-xs" onclick="openHrReplyModal(this)" data-bs-toggle="tooltip" data-bs-placement="top" title="Pending HR Review (Click to view details)" data-req="' + reqStr + '"><i class="bi bi-clock-history"></i></button>';
                var editBtn = '<button type="button" class="btn btn-action-icon btn-action-edit shadow-xs" onclick="openEditReqModal(this)" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Requisition Details" data-req="' + reqStr + '"><i class="bi bi-pencil-fill" style="font-size:13.5px;"></i></button>';
                return '<div class="d-flex align-items-center justify-content-center gap-2">' + replyBtn + editBtn + '</div>';
            }}
        ]
    });

    updateKpiCounts();

    // Segment Filter Buttons
    var filterContainer = document.getElementById('statusFilterGroup');
    if (filterContainer) {
        var filterBtns = filterContainer.querySelectorAll('.status-segment-btn');
        filterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                filterBtns.forEach(function(b) { b.classList.remove('active'); });
                this.classList.add('active');
                var currentFilter = this.getAttribute('data-filter') || 'all';
                if (currentFilter === 'all') {
                    reqTable.setData(reqData);
                } else if (currentFilter === 'Pending') {
                    reqTable.setData(reqData.filter(function(r) { return (r.status || '').toLowerCase().includes('pending'); }));
                } else if (currentFilter === 'Posted') {
                    reqTable.setData(reqData.filter(function(r) { return (r.status || '').toLowerCase().includes('posted') || (r.status || '').toLowerCase().includes('approved'); }));
                }
            });
        });
    }

    // Form Submit: New Requisition (Client-side JS + Bootstrap modal)
    const formNew = document.getElementById('formNewRequisition');
    if (formNew) {
        formNew.addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            const d = new Date();
            const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            const dateStr = `${String(d.getDate()).padStart(2,'0')}-${months[d.getMonth()]}-${d.getFullYear()}`;
            const newId = 'REQ-2026-' + String(reqData.length + 1).padStart(3, '0');

            const newReq = {
                req_id: newId,
                project_name: (fd.get('Project_Name') || fd.get('project_name') || 'New Project').trim(),
                job_title: (fd.get('job_title') || 'Developer').trim(),
                department: fd.get('department') || 'Engineering',
                openings: parseInt(fd.get('openings'), 10) || 1,
                priority: fd.get('priority') || 'Normal',
                experience: fd.get('experience') || '3-5 Years',
                budget: fd.get('budget') || 'Best in Industry',
                status: 'Pending HR Review',
                requested_by: (fd.get('requested_by') || 'Team Lead').trim(),
                tl_email: (fd.get('tl_email') || 'tl@gharuda.com').trim(),
                date_requested: dateStr,
                tl_message: (fd.get('tl_message') || '').trim(),
                job_code: '',
                hr_notes: ''
            };

            reqData.unshift(newReq);
            saveReqData();
            reqTable.setData(reqData);
            updateKpiCounts();

            const modalEl = document.getElementById('newRequisitionModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }
            formNew.reset();
            alert('✅ Resource Requisition (' + newId + ') submitted to HR successfully!');
        });
    }

    // Form Submit: Edit Requisition (Client-side JS)
    const formEdit = document.getElementById('formEditRequisition');
    if (formEdit) {
        formEdit.addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            const reqId = fd.get('req_id');
            const item = reqData.find(function(r) { return r.req_id === reqId; });
            if (item) {
                item.project_name = fd.get('project_name') || item.project_name;
                item.job_title = fd.get('job_title') || item.job_title;
                item.department = fd.get('department') || item.department;
                item.openings = parseInt(fd.get('openings'), 10) || item.openings;
                item.priority = fd.get('priority') || item.priority;
                item.experience = fd.get('experience') || item.experience;
                item.requested_by = fd.get('requested_by') || item.requested_by;
                item.tl_email = fd.get('tl_email') || item.tl_email;
                item.status = fd.get('status') || item.status;
                item.tl_message = fd.get('tl_message') || item.tl_message;
                item.hr_notes = fd.get('hr_notes') || item.hr_notes;

                saveReqData();
                reqTable.setData(reqData);
                updateKpiCounts();

                const modalEl = document.getElementById('editReqModal');
                if (modalEl && typeof bootstrap !== 'undefined') {
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                }
                alert('✅ Requisition ' + reqId + ' updated successfully!');
            }
        });
    }

    // HR Approve Buttons in table
    document.querySelectorAll('.btn-hr-approve').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const dataStr = this.getAttribute('data-req');
            if (!dataStr) return;
            const req = JSON.parse(dataStr);
            openApproveModal(req);
        });
    });

    window.openApproveModal = function(req) {
        if (document.getElementById('apReqId')) document.getElementById('apReqId').textContent = req.req_id;
        if (document.getElementById('apHiddenReqId')) document.getElementById('apHiddenReqId').value = req.req_id;
        if (document.getElementById('apJobTitle')) document.getElementById('apJobTitle').value = req.job_title;
        if (document.getElementById('apOpenings')) document.getElementById('apOpenings').value = req.openings;
        if (document.getElementById('apDept')) document.getElementById('apDept').value = req.department;
        if (document.getElementById('apPriority')) document.getElementById('apPriority').value = req.priority;
        if (document.getElementById('apBudget')) document.getElementById('apBudget').value = req.budget || 'Best in Industry';

        const modalEl = document.getElementById('approvePostModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    };

    // HR Approve & Publish Form Submit (Client-side JS)
    const formApprove = document.getElementById('formApprovePost');
    if (formApprove) {
        formApprove.addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            const reqId = fd.get('req_id');
            const jobCode = 'JOB-' + Math.floor(105 + Math.random() * 95);
            const item = reqData.find(function(r) { return r.req_id === reqId; });
            if (item) {
                item.status = 'Approved & Job Posted';
                item.job_code = jobCode;
                item.hr_notes = fd.get('hr_notes') || 'Approved and posted as new Job Opening by HR.';

                saveReqData();
                reqTable.setData(reqData);
                updateKpiCounts();

                // Create job object and sync with localStorage for job-openings.php
                const createdJob = {
                    id: Date.now(),
                    code: jobCode,
                    title: fd.get('job_title') || item.job_title,
                    dept: fd.get('department') || item.department,
                    location: fd.get('location') || 'Bangalore (Hybrid)',
                    type: 'Full-Time',
                    openings: fd.get('openings') || item.openings,
                    exp: item.experience || '3-5 Years',
                    budget: fd.get('budget') || item.budget,
                    priority: fd.get('priority') || item.priority,
                    description: 'Created from TL Requisition for ' + item.project_name,
                    postLinkedin: true,
                    postNaukri: true,
                    postCareers: true
                };
                try {
                    localStorage.setItem('gh_newly_created_job', JSON.stringify(createdJob));
                } catch(e){}

                const modalEl = document.getElementById('approvePostModal');
                if (modalEl && typeof bootstrap !== 'undefined') {
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                }
                alert('✅ Requisition ' + reqId + ' checked & approved by HR! New job post ' + jobCode + ' has been published.');
            }
        });
    }

    // Initialize Bootstrap Tooltips for Action Icon Buttons
    try {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    } catch(e) {}
});
</script>

<?php include 'footer.php'; ?>
