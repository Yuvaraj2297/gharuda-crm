<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">
<link rel="stylesheet" href="./assets/css/date-picker.css">
<link rel="stylesheet" href="./assets/css/quill-editor.css">
<link rel="stylesheet" href="./assets/css/project-create.css">

<main class="prj-create-page">
    <div class="container-fluid px-0">
        
        <!-- Header Row (CRM Standard Flow) -->
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
            <div class="d-flex align-items-center gap-3">
                <div class="prj-title-ico">
                    <i class="bi bi-folder-plus"></i>
                </div>
                <div>
                    <h1 class="font-display fw-bold mb-1" style="font-size:1.65rem; color:#0f172a;">Add New Project</h1>
                    <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
                        <span>CRM</span>
                        <i class="bi bi-chevron-right" style="font-size:10px;"></i>
                        <a href="projects-list.php" class="text-secondary text-decoration-none fw-medium">Projects</a>
                        <i class="bi bi-chevron-right" style="font-size:10px;"></i>
                        <span class="fw-bold text-dark">Create Project</span>
                    </nav>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="projects-list.php" class="btn btn-outline-secondary px-3 py-2 fw-semibold" style="border-radius:9px; font-size:13.5px;">
                    <i class="bi bi-arrow-left me-1"></i> Back to Projects
                </a>
            </div>
        </div>

        <!-- Main Form Card Container -->
        <div class="prj-main-card">
            
            <!-- Modern Nav Tabs -->
            <div class="prj-nav-tabs">
                <button type="button" class="prj-tab-btn active" id="tabBtnProject" onclick="switchProjTab('project')">
                    <i class="bi bi-briefcase-fill"></i> Project Details
                </button>
                <button type="button" class="prj-tab-btn" id="tabBtnSettings" onclick="switchProjTab('settings')">
                    <i class="bi bi-gear-wide-connected"></i> Project Settings
                </button>
            </div>

            <form id="createProjectMainForm" method="POST" action="#" onsubmit="handleSubmitProject(event)">
                
                <!-- ================= TAB 1: PROJECT FORM ================= -->
                <div class="prj-pane" id="tabContentProject">
                    <div class="row g-4">
                        
                        <!-- 1. Project Name -->
                        <div class="col-12">
                            <label class="form-label-custom" for="projName">
                                <span class="required-star">*</span> Project Name
                            </label>
                            <input type="text" class="form-control-custom form-control" id="projName" name="project_name" required placeholder="Enter project name (e.g. Website Redesign & SEO Portal)">
                        </div>

                        <!-- 2. Customer -->
                        <div class="col-md-6">
                            <label class="form-label-custom" for="projCustomer">
                                <span class="required-star">*</span> Customer
                            </label>
                            <select class="form-select select2" id="projCustomer" name="customer_id" required data-placeholder="Select and begin typing...">
                                <option value=""></option>
                                <option value="GHARUDA">GHARUDA</option>
                                <option value="Asif">Asif</option>
                                <option value="Sundar Arumugam">Sundar Arumugam</option>
                                <option value="Hindustan Hydraulics & Pneumatics">Hindustan Hydraulics & Pneumatics</option>
                                <option value="GHARUDA soft">GHARUDA soft</option>
                                <option value="Power Spares Engineering">Power Spares Engineering</option>
                                <option value="Prabhu photos">Prabhu photos</option>
                                <option value="Zen Publications">Zen Publications</option>
                            </select>
                        </div>

                        <!-- 3. Device -->
                        <div class="col-md-6">
                            <label class="form-label-custom" for="projDevice">Device / Platform</label>
                            <select class="form-select select2" id="projDevice" name="device" data-placeholder="Non selected">
                                <option value=""></option>
                                <option value="Web">Web Application</option>
                                <option value="Mobile">Mobile App (Android/iOS)</option>
                                <option value="Desktop">Desktop Software</option>
                                <option value="Hardware">Hardware / IoT</option>
                            </select>
                        </div>

                        <!-- 4. Calculate progress through tasks Switch & Bar -->
                        <div class="col-12">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="calcTaskProgress" name="calc_progress_tasks" checked onchange="toggleProgressCalc(this)">
                                <label class="form-check-label fw-bold text-dark ms-1" for="calcTaskProgress" style="font-size:13.5px;">
                                    Calculate progress through tasks
                                </label>
                            </div>
                            
                            <div class="proj-progress-box">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="small fw-bold text-muted">Progress Indicator</span>
                                    <span class="progress-val-text" id="progressValText">0%</span>
                                </div>
                                <div class="progress-bar-custom">
                                    <div class="progress-fill-custom" id="progressFillBar"></div>
                                </div>
                            </div>
                        </div>

                        <!-- 5. Billing Type & Status -->
                        <div class="col-md-6">
                            <label class="form-label-custom" for="projBillingType">
                                <span class="required-star">*</span> Billing Type
                            </label>
                            <select class="form-select select2" id="projBillingType" name="billing_type" required data-placeholder="Select billing type">
                                <option value="Fixed Rate" selected>Fixed Rate</option>
                                <option value="Project Hours">Project Hours</option>
                                <option value="Task Hours">Task Hours</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom" for="projStatus">Status</label>
                            <select class="form-select select2" id="projStatus" name="status" data-placeholder="Select status">
                                <option value="In Progress" selected>In Progress</option>
                                <option value="Not Started">Not Started</option>
                                <option value="On Hold">On Hold</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Testing">Testing</option>
                                <option value="Finished">Finished</option>
                            </select>
                        </div>

                        <!-- 6. Project Deadline Date Extend Limit & Total Rate -->
                        <div class="col-md-6">
                            <label class="form-label-custom" for="projExtendLimit">Project Deadline Date Extend Limit</label>
                            <input type="text" class="form-control-custom form-control" id="projExtendLimit" name="extend_limit" placeholder="e.g. 0 days">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom" for="projTotalRate">Total Rate</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-end-0" style="border-radius:9px 0 0 9px;">₹</span>
                                <input type="text" class="form-control-custom form-control border-start-0" id="projTotalRate" name="total_rate" placeholder="0.00" style="border-radius:0 9px 9px 0;">
                            </div>
                        </div>

                        <!-- 7. Estimated Hours & Members -->
                        <div class="col-md-6">
                            <label class="form-label-custom" for="projEstHours">Estimated Hours</label>
                            <input type="number" class="form-control-custom form-control" id="projEstHours" name="estimated_hours" placeholder="e.g. 100" min="0" step="any">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom" for="projMembers">Members</label>
                            <select class="form-select select2" id="projMembers" name="members[]" multiple data-placeholder="Select staff members">
                                <option value="gharuda SOFTWARE" selected>gharuda SOFTWARE</option>
                                <option value="Asif">Asif</option>
                                <option value="Sundar Arumugam">Sundar Arumugam</option>
                                <option value="Arun">Arun</option>
                                <option value="GHARUDA">GHARUDA</option>
                            </select>
                        </div>

                        <!-- 8. Follower & Super Follower -->
                        <div class="col-md-6">
                            <label class="form-label-custom" for="projFollower">Follower</label>
                            <select class="form-select select2" id="projFollower" name="follower" data-placeholder="Non selected">
                                <option value=""></option>
                                <option value="1">gharuda SOFTWARE</option>
                                <option value="2">Asif</option>
                                <option value="3">Sundar Arumugam</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom" for="projSuperFollower">Super Follower</label>
                            <select class="form-select select2" id="projSuperFollower" name="super_follower" data-placeholder="Non selected">
                                <option value=""></option>
                                <option value="1">gharuda SOFTWARE</option>
                                <option value="2">Asif</option>
                                <option value="3">Sundar Arumugam</option>
                            </select>
                        </div>

                        <!-- 9. Start Date & Deadline (CRM Datepicker Flow) -->
                        <div class="col-md-6">
                            <label class="form-label-custom" for="projStartDate">
                                <span class="required-star">*</span> Start Date
                            </label>
                            <div class="date-picker">
                                <input type="text" class="date-input form-control" id="projStartDate" name="start_date" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" value="<?= date('d-m-Y') ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-custom" for="projDeadline">Deadline</label>
                            <div class="date-picker">
                                <input type="text" class="date-input form-control" id="projDeadline" name="deadline" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                            </div>
                        </div>

                        <!-- 10. Tags -->
                        <div class="col-12">
                            <label class="form-label-custom" for="projTags">
                                <i class="bi bi-tag-fill text-secondary me-1"></i> Tags
                            </label>
                            <input type="text" class="form-control-custom form-control" id="projTags" name="tags" placeholder="Tags (e.g. Web, Production, Solar, ERP)">
                        </div>

                        <!-- 11. Description (Quill Rich Text Editor Flow) -->
                        <div class="col-12">
                            <label class="form-label-custom">Description</label>
                            <div class="cv-prj-quill-wrap">
                                <div id="projectQuillEditor"></div>
                                <textarea name="description" id="projDescription" class="d-none"></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ================= TAB 2: PROJECT SETTINGS ================= -->
                <div class="prj-pane" id="tabContentSettings" style="display: none;">
                    
                    <!-- Contacts Notifications Selection -->
                    <div class="card p-3 rounded-3 mb-4" style="background: var(--primary-soft, #eafaf1); border: 1px solid var(--primary-lightTwo, #d0eddb);">
                        <label class="form-label-custom mb-2" for="projNotify">
                            <i class="bi bi-bell-fill me-1" style="color: var(--primary, #16a34a);"></i> Send Contacts Notifications
                        </label>
                        <select class="form-select select2" id="projNotify" name="notify_contacts" data-placeholder="Select notification rule">
                            <option value="all" selected>To all contacts with notifications for projects enabled</option>
                            <option value="primary">To primary contact only</option>
                            <option value="none">Do not send notifications</option>
                        </select>
                    </div>

                    <div class="row g-4">
                        
                        <!-- Section A: Tasks & Comments -->
                        <div class="col-lg-6">
                            <div class="settings-section-card">
                                <div class="settings-card-header">
                                    <span><i class="bi bi-list-check me-2"></i>Tasks &amp; Checklist Control</span>
                                </div>
                                
                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to view tasks</span>
                                        <span class="setting-sub">Clients can view project task progression</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_tasks" checked>
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to create tasks</span>
                                        <span class="setting-sub">Clients can submit new task requests</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_create_tasks" checked>
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to comment on tasks</span>
                                        <span class="setting-sub">Enable collaborative comments on tasks</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_comment_tasks" checked>
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to view task attachments</span>
                                        <span class="setting-sub">Show file attachments uploaded to tasks</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_attachments" checked>
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to view checklist items</span>
                                        <span class="setting-sub">Show subtasks and checklist items</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_checklists" checked>
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to upload task files</span>
                                        <span class="setting-sub">Clients can upload assets directly to tasks</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_upload_task_files" checked>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section B: Communication, Finance & Milestones -->
                        <div class="col-lg-6">
                            <div class="settings-section-card">
                                <div class="settings-card-header">
                                    <span><i class="bi bi-shield-lock-fill me-2"></i>Discussions, Finance &amp; Privacy</span>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to view discussions</span>
                                        <span class="setting-sub">Clients can read project discussions</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_discussions" checked>
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to open discussions</span>
                                        <span class="setting-sub">Enable starting new discussion threads</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_open_discussions" checked>
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to view milestones</span>
                                        <span class="setting-sub">Show project milestone timelines</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_milestones" checked>
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to view Gantt chart</span>
                                        <span class="setting-sub">Display interactive Gantt schedule</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_gantt" checked>
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Allow customer to view project finance</span>
                                        <span class="setting-sub">Invoices, estimates, and expenses</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_finance">
                                    </div>
                                </div>

                                <div class="setting-item">
                                    <div>
                                        <span class="setting-label">Hide project tasks from customer</span>
                                        <span class="setting-sub">Strict internal mode for all tasks</span>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_hide_tasks">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Footer Submit Bar -->
                <div class="form-footer-bar">
                    <div class="form-check m-0">
                        <input class="form-check-input" type="checkbox" id="sendCreatedEmail" name="send_created_email">
                        <label class="form-check-label fw-semibold text-secondary" for="sendCreatedEmail" style="font-size:13.5px; cursor:pointer;">
                            Send project created notification email to client
                        </label>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a href="projects-list.php" class="btn-cancel-proj">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                        <button type="submit" class="btn-submit-proj">
                            <i class="bi bi-check2-circle"></i> Create Project
                        </button>
                    </div>
                </div>

            </form>

        </div>
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
            $('#projCustomer').select2('open');
            return;
        }

        // Make sure Quill content is synced to hidden textarea
        if (quill) {
            var text = quill.getText().trim();
            document.getElementById('projDescription').value = text.length > 0 ? quill.root.innerHTML : '';
        }

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

<?php include 'footer.php'; ?>
