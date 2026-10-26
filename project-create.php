<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/date-picker.css">
<link rel="stylesheet" href="./assets/css/quill-editor.css">

<main class="py-4 pb-5">
    <div class="container-fluid px-3 px-md-4">
        
        <!-- Header Row (CRM Standard Flow) -->
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width:48px; height:48px; font-size:22px;">
                    <i class="bi bi-folder-plus"></i>
                </div>
                <div>
                    <h1 class="font-display fw-bold mb-1 fs-3 text-dark">Add New Project</h1>
                    <nav class="d-flex align-items-center gap-2 small text-secondary">
                        <span>CRM</span>
                        <i class="bi bi-chevron-right" style="font-size:10px;"></i>
                        <a href="projects-list.php" class="text-secondary text-decoration-none fw-medium">Projects</a>
                        <i class="bi bi-chevron-right" style="font-size:10px;"></i>
                        <span class="fw-bold text-dark">Create Project</span>
                    </nav>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="projects-list.php" class="btn btn-outline-secondary px-3 py-2 fw-semibold rounded-2 shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> Back to Projects
                </a>
            </div>
        </div>

        <!-- Main Form Card Container -->
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white">
            
            <!-- Modern Nav Tabs -->
            <ul class="nav nav-tabs px-3 pt-2 bg-light border-bottom" id="projectCreateTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active fw-bold text-dark d-flex align-items-center gap-2" id="tabBtnProject" type="button" onclick="switchProjTab('project')">
                        <i class="bi bi-briefcase-fill text-primary"></i> Project Details
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link fw-semibold text-secondary d-flex align-items-center gap-2" id="tabBtnSettings" type="button" onclick="switchProjTab('settings')">
                        <i class="bi bi-gear-wide-connected"></i> Project Settings
                    </button>
                </li>
            </ul>

            <form id="createProjectMainForm" method="POST" action="#" onsubmit="handleSubmitProject(event)">
                
                <!-- ================= TAB 1: PROJECT FORM ================= -->
                <div class="p-4" id="tabContentProject">
                    <div class="row g-4">
                        
                        <!-- 1. Project Name -->
                        <div class="col-12">
                            <label class="form-label fw-bold text-dark small mb-1" for="projName">
                                <span class="text-danger">*</span> Project Name
                            </label>
                            <input type="text" class="form-control" id="projName" name="project_name" required placeholder="Enter project name (e.g. Website Redesign & SEO Portal)">
                        </div>

                        <!-- 2. Customer -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-1" for="projCustomer">
                                <span class="text-danger">*</span> Customer
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
                            <label class="form-label fw-bold text-dark small mb-1" for="projDevice">Device / Platform</label>
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
                                <label class="form-check-label fw-bold text-dark ms-1 small" for="calcTaskProgress">
                                    Calculate progress through tasks
                                </label>
                            </div>
                            
                            <div class="p-3 bg-light rounded-3 border">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="small fw-bold text-muted">Progress Indicator</span>
                                    <span class="small fw-bold text-dark" id="progressValText">0%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" id="progressFillBar" role="progressbar" style="width: 0%;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- 5. Billing Type & Status -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-1" for="projBillingType">
                                <span class="text-danger">*</span> Billing Type
                            </label>
                            <select class="form-select select2" id="projBillingType" name="billing_type" required data-placeholder="Select billing type">
                                <option value="Fixed Rate" selected>Fixed Rate</option>
                                <option value="Project Hours">Project Hours</option>
                                <option value="Task Hours">Task Hours</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-1" for="projStatus">Status</label>
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
                            <label class="form-label fw-bold text-dark small mb-1" for="projExtendLimit">Project Deadline Date Extend Limit</label>
                            <input type="text" class="form-control" id="projExtendLimit" name="extend_limit" placeholder="e.g. 0 days">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-1" for="projTotalRate">Total Rate</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted">₹</span>
                                <input type="text" class="form-control" id="projTotalRate" name="total_rate" placeholder="0.00">
                            </div>
                        </div>

                        <!-- 7. Estimated Hours & Members -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-1" for="projEstHours">Estimated Hours</label>
                            <input type="number" class="form-control" id="projEstHours" name="estimated_hours" placeholder="e.g. 100" min="0" step="any">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-1" for="projMembers">Members</label>
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
                            <label class="form-label fw-bold text-dark small mb-1" for="projFollower">Follower</label>
                            <select class="form-select select2" id="projFollower" name="follower" data-placeholder="Non selected">
                                <option value=""></option>
                                <option value="1">gharuda SOFTWARE</option>
                                <option value="2">Asif</option>
                                <option value="3">Sundar Arumugam</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-1" for="projSuperFollower">Super Follower</label>
                            <select class="form-select select2" id="projSuperFollower" name="super_follower" data-placeholder="Non selected">
                                <option value=""></option>
                                <option value="1">gharuda SOFTWARE</option>
                                <option value="2">Asif</option>
                                <option value="3">Sundar Arumugam</option>
                            </select>
                        </div>

                        <!-- 9. Start Date & Deadline (CRM Datepicker Flow) -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-1" for="projStartDate">
                                <span class="text-danger">*</span> Start Date
                            </label>
                            <div class="date-picker">
                                <input type="text" class="date-input form-control" id="projStartDate" name="start_date" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" value="<?= date('d-m-Y') ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small mb-1" for="projDeadline">Deadline</label>
                            <div class="date-picker">
                                <input type="text" class="date-input form-control" id="projDeadline" name="deadline" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                            </div>
                        </div>

                        <!-- 10. Tags -->
                        <div class="col-12">
                            <label class="form-label fw-bold text-dark small mb-1" for="projTags">
                                <i class="bi bi-tag-fill text-secondary me-1"></i> Tags
                            </label>
                            <input type="text" class="form-control" id="projTags" name="tags" placeholder="Tags (e.g. Web, Production, Solar, ERP)">
                        </div>

                        <!-- 11. Description (Quill Rich Text Editor Flow) -->
                        <div class="col-12">
                            <label class="form-label fw-bold text-dark small mb-1">Description</label>
                            <div class="border rounded-3 p-1 bg-white">
                                <div id="projectQuillEditor" style="min-height: 180px;"></div>
                                <textarea name="description" id="projDescription" class="d-none"></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- ================= TAB 2: PROJECT SETTINGS ================= -->
                <div class="p-4" id="tabContentSettings" style="display: none;">
                    
                    <!-- Contacts Notifications Selection -->
                    <div class="card p-3 rounded-3 mb-4 bg-light border-0">
                        <label class="form-label fw-bold text-dark small mb-2" for="projNotify">
                            <i class="bi bi-bell-fill me-1 text-success"></i> Send Contacts Notifications
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
                            <div class="card border-0 bg-light rounded-3 p-3">
                                <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center">
                                    <i class="bi bi-list-check me-2 text-primary"></i> Tasks &amp; Checklist Control
                                </div>
                                
                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to view tasks</div>
                                        <div class="text-muted small">Clients can view project task progression</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_tasks" checked>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to create tasks</div>
                                        <div class="text-muted small">Clients can submit new task requests</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_create_tasks" checked>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to comment on tasks</div>
                                        <div class="text-muted small">Enable collaborative comments on tasks</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_comment_tasks" checked>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to view task attachments</div>
                                        <div class="text-muted small">Show file attachments uploaded to tasks</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_attachments" checked>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to view checklist items</div>
                                        <div class="text-muted small">Show subtasks and checklist items</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_checklists" checked>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to upload task files</div>
                                        <div class="text-muted small">Clients can upload assets directly to tasks</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_upload_task_files" checked>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section B: Communication, Finance & Milestones -->
                        <div class="col-lg-6">
                            <div class="card border-0 bg-light rounded-3 p-3">
                                <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center">
                                    <i class="bi bi-shield-lock-fill me-2 text-primary"></i> Discussions, Finance &amp; Privacy
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to view discussions</div>
                                        <div class="text-muted small">Clients can read project discussions</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_discussions" checked>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to open discussions</div>
                                        <div class="text-muted small">Enable starting new discussion threads</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_open_discussions" checked>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to view milestones</div>
                                        <div class="text-muted small">Show project milestone timelines</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_milestones" checked>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to view Gantt chart</div>
                                        <div class="text-muted small">Display interactive Gantt schedule</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_gantt" checked>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div>
                                        <div class="fw-semibold text-dark small">Allow customer to view project finance</div>
                                        <div class="text-muted small">Invoices, estimates, and expenses</div>
                                    </div>
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" name="settings_view_finance">
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between py-2">
                                    <div>
                                        <div class="fw-semibold text-dark small">Hide project tasks from customer</div>
                                        <div class="text-muted small">Strict internal mode for all tasks</div>
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
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 p-4 bg-light border-top">
                    <div class="form-check m-0">
                        <input class="form-check-input" type="checkbox" id="sendCreatedEmail" name="send_created_email">
                        <label class="form-check-label fw-semibold text-secondary small" for="sendCreatedEmail" style="cursor:pointer;">
                            Send project created notification email to client
                        </label>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <a href="projects-list.php" class="btn btn-outline-secondary px-4 py-2 fw-semibold rounded-2">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold rounded-2 shadow-sm">
                            <i class="bi bi-check2-circle me-1"></i> Create Project
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</main>

<script src="./assets/js/quill-editor.js"></script>

<script src="./assets/js/pages/project-create.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
