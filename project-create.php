<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/date-picker.css">
<link rel="stylesheet" href="./assets/css/quill-editor.css">

<!-- Inline Styles for Project Creation (Guaranteed Zero-Cache Enterprise Polish) -->
<style id="crmProjectCreateInlineStyles">
    .nl-crm-sheet {
        max-width: 1220px;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    /* Horizontal Wireframe Label-Input Alignment Engine */
    .crm-field-row {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        margin-bottom: 12px !important;
        min-height: 38px !important;
        width: 100% !important;
    }
    .crm-field-row.align-items-start {
        align-items: flex-start !important;
    }
    .crm-field-label {
        flex: 0 0 160px !important;
        width: 160px !important;
        max-width: 160px !important;
        min-width: 160px !important;
        text-align: right !important;
        margin-bottom: 0 !important;
        padding-right: 14px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        color: #1e293b !important;
        line-height: 1.35 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
        gap: 2px !important;
    }
    .crm-field-label .req-star {
        color: #ef4444 !important;
        font-weight: 700 !important;
        margin-left: 1px !important;
    }
    .crm-field-label .crm-colon {
        color: #64748b !important;
        font-weight: 700 !important;
        margin-left: 2px !important;
    }
    .crm-field-control {
        flex: 1 1 auto !important;
        min-width: 0 !important;
        width: auto !important;
    }

    /* Form Inputs & Selects: 38px height, 4px radius, #c5c4d3 border */
    .nl-crm-sheet .form-control,
    .nl-crm-sheet .form-select,
    .nl-crm-sheet .select2-container--default .select2-selection--single,
    .nl-crm-sheet .select2-container--default .select2-selection--multiple {
        height: 38px !important;
        min-height: 38px !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        color: #0f172a !important;
        background-color: #ffffff !important;
        border: 1px solid #c5c4d3 !important;
        border-radius: 4px !important;
        padding: 6px 12px !important;
        line-height: 1.4 !important;
        box-shadow: none !important;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
    }
    .nl-crm-sheet .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 24px !important;
        padding-left: 0 !important;
        color: #0f172a !important;
    }
    .nl-crm-sheet .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px !important;
    }
    .nl-crm-sheet .select2-container--default .select2-selection--multiple {
        height: auto !important;
        min-height: 38px !important;
        padding: 2px 8px !important;
    }
    .nl-crm-sheet .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #f1f5f9 !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 3px !important;
        padding: 2px 6px !important;
        font-size: 12px !important;
        color: #1e293b !important;
    }
    .nl-crm-sheet .form-select {
        background-position: right 0.75rem center !important;
        background-size: 12px 10px !important;
        padding-right: 2rem !important;
        cursor: pointer !important;
    }

    /* Focus States */
    .nl-crm-sheet .form-control:focus,
    .nl-crm-sheet .form-select:focus,
    .nl-crm-sheet .select2-container--default.select2-container--focus .select2-selection--single,
    .nl-crm-sheet .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #16a34a !important;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.15) !important;
        outline: none !important;
        background-color: #ffffff !important;
    }

    /* Required Red Indicator on Left Edge (Zoho CRM Standard) */
    .nl-crm-sheet .crm-required,
    .nl-crm-sheet .form-control[required],
    .nl-crm-sheet .form-select[required],
    .nl-crm-sheet .select2-required .select2-selection {
        border-left: 3.5px solid #ef4444 !important;
    }

    /* Seamless Input Group Styling */
    .nl-crm-sheet .input-group {
        display: flex !important;
        flex-wrap: nowrap !important;
        position: relative !important;
        width: 100% !important;
        border-radius: 4px !important;
    }
    .nl-crm-sheet .input-group > :first-child:not(:last-child) {
        border-top-left-radius: 4px !important;
        border-bottom-left-radius: 4px !important;
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }
    .nl-crm-sheet .input-group > :last-child:not(:first-child) {
        border-top-right-radius: 4px !important;
        border-bottom-right-radius: 4px !important;
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }
    .nl-crm-sheet .input-group > .input-group-text,
    .nl-crm-sheet .input-group > .nl-addon-text {
        background-color: #f8fafc !important;
        border: 1px solid #c5c4d3 !important;
        border-right: none !important;
        color: #475569 !important;
        font-size: 12.5px !important;
        font-weight: 600 !important;
        padding: 0 12px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    .nl-crm-sheet .input-group > input {
        border-left: 1px solid #c5c4d3 !important;
    }

    /* Section Dividers & Badges */
    .nl-crm-sheet .crm-section-divider {
        background: #f8fafc !important;
        border: 1px solid #e2e8f0 !important;
        border-left: 4px solid #16a34a !important;
        padding: 8px 16px !important;
        margin: 22px 0 16px 0 !important;
        border-radius: 4px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
    }
    .nl-crm-sheet .crm-section-divider.mt-0 {
        margin-top: 0 !important;
    }
    .nl-crm-sheet .crm-section-title {
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #0f172a !important;
        margin: 0 !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        letter-spacing: 0.3px !important;
        text-transform: uppercase !important;
    }
    .nl-crm-sheet .crm-section-badge {
        font-size: 11px !important;
        font-weight: 600 !important;
        padding: 2px 8px !important;
        border-radius: 4px !important;
        background: #f0fdf4 !important;
        color: #16a34a !important;
        border: 1px solid #bbf7d0 !important;
    }

    /* Nav Tabs Zoho CRM Polish */
    .nl-crm-sheet .nav-tabs {
        border-bottom: 1px solid #e2e8f0 !important;
        background-color: #f8fafc !important;
        padding: 6px 16px 0 16px !important;
        gap: 4px !important;
    }
    .nl-crm-sheet .nav-tabs .nav-link {
        font-size: 13px !important;
        font-weight: 600 !important;
        color: #64748b !important;
        border: 1px solid transparent !important;
        border-top-left-radius: 6px !important;
        border-top-right-radius: 6px !important;
        padding: 8px 18px !important;
        background: transparent !important;
        transition: all 0.15s ease !important;
    }
    .nl-crm-sheet .nav-tabs .nav-link:hover {
        color: #1e293b !important;
        background-color: #f1f5f9 !important;
    }
    .nl-crm-sheet .nav-tabs .nav-link.active {
        color: #0f172a !important;
        background-color: #ffffff !important;
        border-color: #e2e8f0 #e2e8f0 #ffffff !important;
        border-top: 2.5px solid #16a34a !important;
    }

    /* Primary Save Button (Gharuda Enterprise Green #16a34a) */
    .nl-crm-sheet .btn-save-project,
    .btn-save-project {
        background-color: #16a34a !important;
        border-color: #16a34a !important;
        color: #ffffff !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        padding: 7px 20px !important;
        border-radius: 4px !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        transition: all 0.15s ease !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05) !important;
    }
    .nl-crm-sheet .btn-save-project:hover,
    .btn-save-project:hover {
        background-color: #15803d !important;
        border-color: #15803d !important;
        color: #ffffff !important;
        box-shadow: 0 2px 6px rgba(22, 163, 74, 0.25) !important;
    }

    /* Progress Widget Box */
    .nl-progress-box {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        padding: 10px 14px;
    }

    /* Permission Rows */
    .crm-perm-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        padding: 16px;
    }
    .crm-perm-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 9px 0;
        border-bottom: 1px solid #f1f5f9;
    }
    .crm-perm-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    @media (max-width: 991.98px) {
        .crm-field-row {
            flex-direction: column !important;
            align-items: flex-start !important;
            margin-bottom: 14px !important;
        }
        .crm-field-label {
            flex: 0 0 auto !important;
            width: 100% !important;
            max-width: 100% !important;
            min-width: 0 !important;
            text-align: left !important;
            padding-right: 0 !important;
            margin-bottom: 4px !important;
            justify-content: flex-start !important;
        }
        .crm-field-control {
            width: 100% !important;
        }
    }
</style>

<main class="container-fluid px-0 py-3 bg-light-subtle min-vh-100">
    <div class="nl-crm-sheet shadow-sm">
        <form id="createProjectMainForm" method="POST" action="#" onsubmit="handleSubmitProject(event)">

            <!-- Top Sticky Header Bar (Synchronized with Bottom Action Bar) -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 px-4 py-3 border-bottom bg-white sticky-top shadow-xs" style="z-index: 1020;">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <a href="projects-list.php" class="text-decoration-none text-muted fw-medium font-13">
                        <i class="bi bi-arrow-left me-1"></i>Back to Projects
                    </a>
                    <span class="text-muted">|</span>
                    <h5 class="mb-0 fw-bold text-dark font-16 d-flex align-items-center gap-2">
                        <i class="bi bi-folder-plus text-success"></i>
                        <span>Add New Project</span>
                    </h5>
                    <span class="badge bg-success-subtle text-success border border-success-subtle font-11 ms-2">Standard Layout</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="projects-list.php" class="btn btn-outline-secondary btn-sm px-3 fw-medium">Cancel</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3 fw-medium" onclick="document.getElementById('createProjectMainForm').reset();">Reset</button>
                    <button type="submit" class="btn btn-save-project btn-sm">
                        <i class="bi bi-check-lg"></i>Create Project
                    </button>
                </div>
            </div>

            <!-- Tab Switcher Navigation -->
            <ul class="nav nav-tabs" id="projectCreateTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active d-flex align-items-center gap-2" id="tabBtnProject" type="button" onclick="switchProjTab('project')">
                        <i class="bi bi-briefcase-fill text-success"></i>
                        <span>Project Details</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link d-flex align-items-center gap-2" id="tabBtnSettings" type="button" onclick="switchProjTab('settings')">
                        <i class="bi bi-gear-wide-connected"></i>
                        <span>Client Permissions &amp; Settings</span>
                    </button>
                </li>
            </ul>

            <!-- ================= TAB 1: PROJECT DETAILS ================= -->
            <div class="p-3 p-md-4 p-xl-4 bg-white" id="tabContentProject">

                <!-- SECTION 1: Project Identity & Client Profile -->
                <div class="crm-section-divider mt-0">
                    <div class="crm-section-title">
                        <i class="bi bi-building text-primary fs-5"></i>
                        <span>Project Identity &amp; Client Profile</span>
                    </div>
                    <span class="crm-section-badge">Core Parameters</span>
                </div>

                <div class="row gx-4 gx-xl-5">
                    <!-- Full Width: Project Name -->
                    <div class="col-12">
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-2 col-form-label text-sm-end crm-field-label" for="projName">
                                Project Name<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-10 crm-field-control">
                                <input type="text" class="form-control crm-required" id="projName" name="project_name" required placeholder="Enter project name (e.g. Website Redesign & SEO Portal)">
                            </div>
                        </div>
                    </div>

                    <!-- Left Column -->
                    <div class="col-12 col-lg-6">
                        <!-- Customer -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projCustomer">
                                Customer<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control select2-required">
                                <select class="form-select select2 crm-required" id="projCustomer" name="customer_id" required data-placeholder="Select and begin typing...">
                                    <option value=""></option>
                                    <option value="GHARUDA">GHARUDA</option>
                                    <option value="Asif">Asif</option>
                                    <option value="Sundar Arumugam">Sundar Arumugam</option>
                                    <option value="Hindustan Hydraulics & Pneumatics">Hindustan Hydraulics &amp; Pneumatics</option>
                                    <option value="GHARUDA soft">GHARUDA soft</option>
                                    <option value="Power Spares Engineering">Power Spares Engineering</option>
                                    <option value="Prabhu photos">Prabhu photos</option>
                                    <option value="Zen Publications">Zen Publications</option>
                                </select>
                            </div>
                        </div>

                        <!-- Device / Platform -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projDevice">
                                Platform / Device<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select select2" id="projDevice" name="device" data-placeholder="Select platform">
                                    <option value=""></option>
                                    <option value="Web">Web Application</option>
                                    <option value="Mobile">Mobile App (Android/iOS)</option>
                                    <option value="Desktop">Desktop Software</option>
                                    <option value="Hardware">Hardware / IoT</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-12 col-lg-6">
                        <!-- Progress Calculation Switch & Bar -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="calcTaskProgress">
                                Task Progress<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <div class="nl-progress-box">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" type="checkbox" id="calcTaskProgress" name="calc_progress_tasks" checked onchange="toggleProgressCalc(this)">
                                            <label class="form-check-label font-12 fw-medium text-dark ms-1" for="calcTaskProgress">
                                                Calculate via tasks
                                            </label>
                                        </div>
                                        <span class="font-12 fw-bold text-success" id="progressValText">0%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" id="progressFillBar" role="progressbar" style="width: 0%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projStatus">
                                Project Status<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select select2" id="projStatus" name="status" data-placeholder="Select status">
                                    <option value="In Progress" selected>In Progress</option>
                                    <option value="Not Started">Not Started</option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Testing">Testing</option>
                                    <option value="Finished">Finished</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- SECTION 2: Billing, Budget & Commercial Terms -->
                <div class="crm-section-divider">
                    <div class="crm-section-title">
                        <i class="bi bi-cash-stack text-primary fs-5"></i>
                        <span>Billing, Budget &amp; Commercial Terms</span>
                    </div>
                    <span class="crm-section-badge">Financial Scope</span>
                </div>

                <div class="row gx-4 gx-xl-5">
                    <!-- Left Column -->
                    <div class="col-12 col-lg-6">
                        <!-- Billing Type -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projBillingType">
                                Billing Type<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select select2 crm-required" id="projBillingType" name="billing_type" required data-placeholder="Select billing type">
                                    <option value="Fixed Rate" selected>Fixed Rate</option>
                                    <option value="Project Hours">Project Hours</option>
                                    <option value="Task Hours">Task Hours</option>
                                </select>
                            </div>
                        </div>

                        <!-- Total Rate -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projTotalRate">
                                Total Rate / Value<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <div class="input-group">
                                    <span class="input-group-text nl-addon-text">₹</span>
                                    <input type="text" class="form-control" id="projTotalRate" name="total_rate" placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-12 col-lg-6">
                        <!-- Estimated Hours -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projEstHours">
                                Estimated Hours<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <div class="input-group">
                                    <span class="input-group-text nl-addon-text"><i class="bi bi-clock"></i></span>
                                    <input type="number" class="form-control" id="projEstHours" name="estimated_hours" placeholder="e.g. 100" min="0" step="any">
                                </div>
                            </div>
                        </div>

                        <!-- Deadline Extend Limit -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projExtendLimit">
                                Extend Limit<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="text" class="form-control" id="projExtendLimit" name="extend_limit" placeholder="e.g. 0 days">
                            </div>
                        </div>
                    </div>
                </div>


                <!-- SECTION 3: Timelines & Resource Allocation -->
                <div class="crm-section-divider">
                    <div class="crm-section-title">
                        <i class="bi bi-people text-primary fs-5"></i>
                        <span>Timelines &amp; Resource Allocation</span>
                    </div>
                    <span class="crm-section-badge">Execution Matrix</span>
                </div>

                <div class="row gx-4 gx-xl-5">
                    <!-- Left Column -->
                    <div class="col-12 col-lg-6">
                        <!-- Start Date -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projStartDate">
                                Start Date<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <div class="input-group">
                                    <span class="input-group-text nl-addon-text"><i class="bi bi-calendar-event"></i></span>
                                    <input type="text" class="date-input form-control crm-required" id="projStartDate" name="start_date" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" value="<?= date('d-m-Y') ?>" required>
                                </div>
                            </div>
                        </div>

                        <!-- Deadline -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projDeadline">
                                Deadline<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <div class="input-group">
                                    <span class="input-group-text nl-addon-text"><i class="bi bi-flag"></i></span>
                                    <input type="text" class="date-input form-control" id="projDeadline" name="deadline" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <!-- Project Tags -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projTags">
                                Tags<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <div class="input-group">
                                    <span class="input-group-text nl-addon-text"><i class="bi bi-tags"></i></span>
                                    <input type="text" class="form-control" id="projTags" name="tags" placeholder="e.g. Web, Production, Solar, ERP">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-12 col-lg-6">
                        <!-- Team Members (Multiple) -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projMembers">
                                Team Members<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select select2" id="projMembers" name="members[]" multiple data-placeholder="Select staff members">
                                    <option value="gharuda SOFTWARE" selected>gharuda SOFTWARE</option>
                                    <option value="Asif">Asif</option>
                                    <option value="Sundar Arumugam">Sundar Arumugam</option>
                                    <option value="Arun">Arun</option>
                                    <option value="GHARUDA">GHARUDA</option>
                                </select>
                            </div>
                        </div>

                        <!-- Follower -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projFollower">
                                Project Follower<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select select2" id="projFollower" name="follower" data-placeholder="Non selected">
                                    <option value=""></option>
                                    <option value="1">gharuda SOFTWARE</option>
                                    <option value="2">Asif</option>
                                    <option value="3">Sundar Arumugam</option>
                                </select>
                            </div>
                        </div>

                        <!-- Super Follower -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="projSuperFollower">
                                Super Follower<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select select2" id="projSuperFollower" name="super_follower" data-placeholder="Non selected">
                                    <option value=""></option>
                                    <option value="1">gharuda SOFTWARE</option>
                                    <option value="2">Asif</option>
                                    <option value="3">Sundar Arumugam</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- SECTION 4: Project Specification & Scope of Work -->
                <div class="crm-section-divider">
                    <div class="crm-section-title">
                        <i class="bi bi-file-earmark-richtext text-primary fs-5"></i>
                        <span>Project Specification &amp; Scope of Work</span>
                    </div>
                    <span class="crm-section-badge">Deliverables</span>
                </div>

                <div class="row gx-4 gx-xl-5">
                    <div class="col-12">
                        <div class="row align-items-start crm-field-row">
                            <label class="col-sm-2 col-form-label text-sm-end crm-field-label" for="projectQuillEditor">
                                Scope &amp; Details<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-10 crm-field-control">
                                <div class="border rounded-2 p-1 bg-white" style="border-color: #c5c4d3 !important;">
                                    <div id="projectQuillEditor" style="min-height: 180px;"></div>
                                    <textarea name="description" id="projDescription" class="d-none"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- ================= TAB 2: CLIENT PERMISSIONS & SETTINGS ================= -->
            <div class="p-3 p-md-4 p-xl-4 bg-white" id="tabContentSettings" style="display: none;">

                <!-- SECTION 1: Notifications Rule -->
                <div class="crm-section-divider mt-0">
                    <div class="crm-section-title">
                        <i class="bi bi-bell text-primary fs-5"></i>
                        <span>Client Notification Strategy</span>
                    </div>
                    <span class="crm-section-badge">Email Automations</span>
                </div>

                <div class="row gx-4 gx-xl-5 mb-4">
                    <div class="col-12 col-lg-8">
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-3 col-form-label text-sm-end crm-field-label" for="projNotify">
                                Notifications<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-9 crm-field-control">
                                <select class="form-select select2" id="projNotify" name="notify_contacts" data-placeholder="Select notification rule">
                                    <option value="all" selected>To all contacts with notifications for projects enabled</option>
                                    <option value="primary">To primary contact only</option>
                                    <option value="none">Do not send notifications</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: Granular Permissions -->
                <div class="crm-section-divider">
                    <div class="crm-section-title">
                        <i class="bi bi-shield-check text-primary fs-5"></i>
                        <span>Client Portal Permissions Matrix</span>
                    </div>
                    <span class="crm-section-badge">Access Control</span>
                </div>

                <div class="row g-4">
                    <!-- Column A: Tasks & Checklists -->
                    <div class="col-12 col-lg-6">
                        <div class="crm-perm-card">
                            <div class="fw-bold text-dark font-13 pb-2 border-bottom d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-list-check text-primary"></i>
                                <span>Tasks &amp; Checklist Control</span>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to view tasks</div>
                                    <div class="text-muted font-11">Clients can view project task progression</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_view_tasks" checked>
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to create tasks</div>
                                    <div class="text-muted font-11">Clients can submit new task requests</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_create_tasks" checked>
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to comment on tasks</div>
                                    <div class="text-muted font-11">Enable collaborative comments on tasks</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_comment_tasks" checked>
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to view task attachments</div>
                                    <div class="text-muted font-11">Show file attachments uploaded to tasks</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_view_attachments" checked>
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to view checklist items</div>
                                    <div class="text-muted font-11">Show subtasks and checklist items</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_view_checklists" checked>
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to upload task files</div>
                                    <div class="text-muted font-11">Clients can upload assets directly to tasks</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_upload_task_files" checked>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column B: Discussions, Finance & Milestones -->
                    <div class="col-12 col-lg-6">
                        <div class="crm-perm-card">
                            <div class="fw-bold text-dark font-13 pb-2 border-bottom d-flex align-items-center gap-2 mb-2">
                                <i class="bi bi-shield-lock-fill text-primary"></i>
                                <span>Discussions, Finance &amp; Privacy</span>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to view discussions</div>
                                    <div class="text-muted font-11">Clients can read project discussions</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_view_discussions" checked>
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to open discussions</div>
                                    <div class="text-muted font-11">Enable starting new discussion threads</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_open_discussions" checked>
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to view milestones</div>
                                    <div class="text-muted font-11">Show project milestone timelines</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_view_milestones" checked>
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to view Gantt chart</div>
                                    <div class="text-muted font-11">Display interactive Gantt schedule</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_view_gantt" checked>
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Allow customer to view project finance</div>
                                    <div class="text-muted font-11">Invoices, estimates, and expenses</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_view_finance">
                                </div>
                            </div>

                            <div class="crm-perm-item">
                                <div>
                                    <div class="fw-semibold text-dark font-13">Hide project tasks from customer</div>
                                    <div class="text-muted font-11">Strict internal mode for all tasks</div>
                                </div>
                                <div class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" name="settings_hide_tasks">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sticky Bottom Footer Action Bar -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 px-4 py-3 border-top bg-white sticky-bottom shadow-xs">
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <div class="font-12 text-muted d-flex align-items-center gap-1.5">
                        <i class="bi bi-shield-check text-success me-1"></i>Fields marked with <span class="text-danger fw-bold">*</span> (red border) are required
                    </div>
                    <span class="text-muted d-none d-md-inline">&bull;</span>
                    <div class="form-check m-0">
                        <input class="form-check-input" type="checkbox" id="sendCreatedEmail" name="send_created_email">
                        <label class="form-check-label font-12 fw-medium text-secondary" for="sendCreatedEmail" style="cursor:pointer;">
                            Send created notification email to client
                        </label>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="projects-list.php" class="btn btn-outline-secondary btn-sm px-3 fw-medium">Cancel</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3 fw-medium" onclick="document.getElementById('createProjectMainForm').reset();">Reset</button>
                    <button type="submit" class="btn btn-save-project btn-sm">
                        <i class="bi bi-check-lg"></i>Create Project
                    </button>
                </div>
            </div>

        </form>
    </div>
</main>

<script src="./assets/js/quill-editor.js"></script>

<script>
    // Tab Switcher
    function switchProjTab(tabName) {
        var btnProject = document.getElementById('tabBtnProject');
        var btnSettings = document.getElementById('tabBtnSettings');
        var contentProject = document.getElementById('tabContentProject');
        var contentSettings = document.getElementById('tabContentSettings');

        if (tabName === 'project') {
            btnProject.classList.add('active');
            btnSettings.classList.remove('active');
            contentProject.style.display = 'block';
            contentSettings.style.display = 'none';
        } else {
            btnSettings.classList.add('active');
            btnProject.classList.remove('active');
            contentSettings.style.display = 'block';
            contentProject.style.display = 'none';
        }
    }

    // Toggle Task Progress Calculation
    function toggleProgressCalc(chk) {
        var fill = document.getElementById('progressFillBar');
        var text = document.getElementById('progressValText');
        if (chk.checked) {
            fill.style.width = '0%';
            text.innerText = '0%';
        } else {
            fill.style.width = '50%';
            text.innerText = '50%';
        }
    }

    // Quill Rich Text Editor Instance
    var quill = null;
    function initProjectQuill() {
        if (quill || typeof Quill === 'undefined') return;
        quill = new Quill('#projectQuillEditor', {
            theme: 'snow',
            placeholder: 'Write detailed project scope, milestones, deliverables, and instructions...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    [{ 'font': [] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['link', 'image', 'clean']
                ]
            }
        });

        quill.on('text-change', function() {
            var descArea = document.getElementById('projDescription');
            if (descArea) {
                var text = quill.getText().trim();
                descArea.value = text.length > 0 ? quill.root.innerHTML : '';
            }
        });
    }

    // Form Submit Handler
    function handleSubmitProject(e) {
        e.preventDefault();
        var name = document.getElementById('projName').value.trim();
        var customer = document.getElementById('projCustomer').value;

        if (!name) {
            alert('Please enter a Project Name.');
            document.getElementById('projName').focus();
            return;
        }

        if (!customer) {
            alert('Please select a Customer.');
            if (window.jQuery) {
                $('#projCustomer').select2('open');
            } else {
                document.getElementById('projCustomer').focus();
            }
            return;
        }

        // Make sure Quill content is synced to hidden textarea
        if (quill) {
            var text = quill.getText().trim();
            document.getElementById('projDescription').value = text.length > 0 ? quill.root.innerHTML : '';
        }

        try {
            var savedProjects = JSON.parse(localStorage.getItem('gh_new_projects') || '[]');
            savedProjects.unshift({
                name: name,
                customer: customer,
                device: document.getElementById('projDevice').value || 'Web',
                status: document.getElementById('projStatus').value || 'In Progress',
                rate: document.getElementById('projTotalRate').value || '0',
                startDate: document.getElementById('projStartDate').value || '29-10-2026',
                deadline: document.getElementById('projDeadline').value || '15-11-2026'
            });
            localStorage.setItem('gh_new_projects', JSON.stringify(savedProjects.slice(0, 20)));
        } catch (err) {}
        alert('Project "' + name + '" created successfully!');
        window.location.href = 'projects-list.php';
    }

    // Initialize Select2 and Quill on DOM ready
    document.addEventListener("DOMContentLoaded", function () {
        initProjectQuill();

        if (typeof jQuery !== 'undefined' && jQuery.fn.select2) {
            jQuery('.select2').each(function() {
                var $this = jQuery(this);
                if (!$this.hasClass("select2-hidden-accessible")) {
                    $this.select2({
                        width: '100%',
                        placeholder: $this.attr('data-placeholder') || '',
                        allowClear: !$this.prop('required')
                    });
                }
            });
        }
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var params = new URLSearchParams(window.location.search);
    var qProject = params.get('project') || '';
    var qClient = params.get('client') || '';
    var qAmount = params.get('amount') || '';
    var qSo = params.get('so') || '';

    if (qProject && document.getElementById('projName')) {
        document.getElementById('projName').value = qProject;
    }
    if (qAmount && document.getElementById('projTotalRate')) {
        document.getElementById('projTotalRate').value = qAmount;
    }
    if (qClient && document.getElementById('projCustomer')) {
        var custSel = document.getElementById('projCustomer');
        var foundOpt = false;
        for (var i = 0; i < custSel.options.length; i++) {
            if (custSel.options[i].value.toLowerCase() === qClient.toLowerCase()) {
                custSel.value = custSel.options[i].value;
                foundOpt = true;
                break;
            }
        }
        if (!foundOpt) {
            var newOpt = document.createElement('option');
            newOpt.value = qClient;
            newOpt.textContent = qClient;
            newOpt.selected = true;
            custSel.appendChild(newOpt);
        }
        setTimeout(function () {
            if (typeof jQuery !== 'undefined') {
                jQuery(custSel).val(custSel.value).trigger('change');
            }
        }, 150);
    }
    if (qProject || qClient || qSo) {
        var formCard = document.querySelector('#createProjectMainForm');
        if (formCard) {
            var banner = document.createElement('div');
            banner.className = 'alert alert-success d-flex align-items-center justify-content-between m-3 mb-0 py-2 px-3 rounded-2 border-0 shadow-sm font-13';
            banner.innerHTML = '<div><i class="bi bi-check-circle-fill me-2"></i><strong>Delivery Hand-off Active:</strong> Pre-filled from ' + (qSo ? 'Sales Order <b>' + qSo.replace(/</g, '&lt;') + '</b>' : 'Won Deal') + ' for <b>' + (qClient || 'Client').replace(/</g, '&lt;') + '</b>.</div><span class="badge bg-success text-white font-11">Sales &rarr; Project</span>';
            formCard.insertBefore(banner, formCard.firstChild);
        }
    }
});
</script>
<?php include 'footer.php'; ?>
