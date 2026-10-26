<?php include 'header.php'; ?>

 

<style>
    .task-status-done { color: #087a24; background: #e7f7eb; padding: 4px 9px; border-radius: 99px; font-size: 11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; }
    .task-status-pending { color: #b56b00; background: #fff4d9; padding: 4px 9px; border-radius: 99px; font-size: 11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; }
    .task-status-progress { color: #1e40af; background: #dbeafe; padding: 4px 9px; border-radius: 99px; font-size: 11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; }

    .milestone-badge { font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 6px; }
    .milestone-pre { background: #fef3c7; color: #b45309; }
    .milestone-day1 { background: #e0f2fe; color: #0369a1; }
    .milestone-week1 { background: #f3e8ff; color: #7e22ce; }
    .milestone-month1 { background: #dcfce7; color: #15803d; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Onboarding  Checklists</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-person-check fs-6"></i>
            <span>Onboarding</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark"> Checklists</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addTaskModal">
            <i class="bi bi-plus-lg me-1"></i> Add Checklist Task
        </button>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="onboarding-tasks-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search employee..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="tasksTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Task Description</th>
                    <th class="text-nowrap">Milestone Phase</th>
                    <th class="text-nowrap">Assigned Joiner</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Responsible Owner</th>
                    <th class="text-nowrap">Due Date</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr class="task-row"
                    data-title="Complete Background Verification & Address Proof"
                    data-phase="Pre-Boarding"
                    data-joiner="Kavitha Raman"
                    data-role="UI/UX Designer"
                    data-dept="Design"
                    data-owner="HR Operations"
                    data-duedate="2026-03-10"
                    data-status="Completed"
                >
                    <td class="sno-value">1</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <input class="form-check-input mt-0 task-checkbox" type="checkbox" checked>
                            <span class="fw-bold text-dark text-decoration-line-through text-muted">Complete Background Verification & Address Proof</span>
                        </div>
                    </td>
                    <td><span class="milestone-badge milestone-pre">Pre-Boarding</span></td>
                    <td>
                        <div class="fw-bold text-dark">Kavitha Raman</div>
                        <div class="text-muted" style="font-size:11px;">UI/UX Designer</div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Design</span></td>
                    <td>HR Operations</td>
                    <td class="text-nowrap">10-Mar-2026</td>
                    <td><span class="task-status-done"><i class="bi bi-check-circle-fill"></i> Completed</span></td>
                    <td>
                        <button type="button" class="btn btn-sm edit btn-edit-task" data-bs-toggle="tooltip" data-bs-title="Edit Task"><i class="mdi mdi-pencil"></i></button>
                    </td>
                </tr>

                <tr class="task-row"
                    data-title="Issue Hardware & Work Email ID (Laptop + Access Card)"
                    data-phase="Day 1 Induction"
                    data-joiner="Kavitha Raman"
                    data-role="UI/UX Designer"
                    data-dept="Design"
                    data-owner="IT Admin"
                    data-duedate="2026-03-15"
                    data-status="Completed"
                >
                    <td class="sno-value">2</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <input class="form-check-input mt-0 task-checkbox" type="checkbox" checked>
                            <span class="fw-bold text-dark text-decoration-line-through text-muted">Issue Hardware & Work Email ID (Laptop + Access Card)</span>
                        </div>
                    </td>
                    <td><span class="milestone-badge milestone-day1">Day 1</span></td>
                    <td>
                        <div class="fw-bold text-dark">Kavitha Raman</div>
                        <div class="text-muted" style="font-size:11px;">UI/UX Designer</div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Design</span></td>
                    <td>IT Admin</td>
                    <td class="text-nowrap">15-Mar-2026</td>
                    <td><span class="task-status-done"><i class="bi bi-check-circle-fill"></i> Completed</span></td>
                    <td>
                        <button type="button" class="btn btn-sm edit btn-edit-task" data-bs-toggle="tooltip" data-bs-title="Edit Task"><i class="mdi mdi-pencil"></i></button>
                    </td>
                </tr>

                <tr class="task-row"
                    data-title="Conduct HR Policy Briefing & Code of Conduct Sign-off"
                    data-phase="Day 1 Induction"
                    data-joiner="Rahul Verma"
                    data-role="Backend Engineer"
                    data-dept="Engineering"
                    data-owner="Sarah Mitchell (HR)"
                    data-duedate="2026-04-01"
                    data-status="Pending"
                >
                    <td class="sno-value">3</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <input class="form-check-input mt-0 task-checkbox" type="checkbox">
                            <span class="fw-bold text-dark">Conduct HR Policy Briefing & Code of Conduct Sign-off</span>
                        </div>
                    </td>
                    <td><span class="milestone-badge milestone-day1">Day 1</span></td>
                    <td>
                        <div class="fw-bold text-dark">Rahul Verma</div>
                        <div class="text-muted" style="font-size:11px;">Backend Engineer</div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Engineering</span></td>
                    <td>Sarah Mitchell (HR)</td>
                    <td class="text-nowrap">01-Apr-2026</td>
                    <td><span class="task-status-pending"><i class="bi bi-hourglass-split"></i> Pending</span></td>
                    <td>
                        <button type="button" class="btn btn-sm edit btn-edit-task" data-bs-toggle="tooltip" data-bs-title="Edit Task"><i class="mdi mdi-pencil"></i></button>
                    </td>
                </tr>

                <tr class="task-row"
                    data-title="Department Architecture Walkthrough & Buddy Pairing"
                    data-phase="Week 1 Milestones"
                    data-joiner="Siddharth Nair"
                    data-role="iOS App Developer"
                    data-dept="iOS Dev"
                    data-owner="David Anderson (Lead)"
                    data-duedate="2026-03-25"
                    data-status="In Progress"
                >
                    <td class="sno-value">4</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <input class="form-check-input mt-0 task-checkbox" type="checkbox">
                            <span class="fw-bold text-dark">Department Architecture Walkthrough & Buddy Pairing</span>
                        </div>
                    </td>
                    <td><span class="milestone-badge milestone-week1">Week 1</span></td>
                    <td>
                        <div class="fw-bold text-dark">Siddharth Nair</div>
                        <div class="text-muted" style="font-size:11px;">iOS App Developer</div>
                    </td>
                    <td><span class="badge bg-light text-dark border">iOS Dev</span></td>
                    <td>David Anderson (Lead)</td>
                    <td class="text-nowrap">25-Mar-2026</td>
                    <td><span class="task-status-progress"><i class="bi bi-arrow-repeat"></i> In Progress</span></td>
                    <td>
                        <button type="button" class="btn btn-sm edit btn-edit-task" data-bs-toggle="tooltip" data-bs-title="Edit Task"><i class="mdi mdi-pencil"></i></button>
                    </td>
                </tr>

                <tr class="task-row"
                    data-title="30-Day Performance Review & Probation Assessment"
                    data-phase="30-Day Review"
                    data-joiner="Priya Sundaram"
                    data-role="Financial Analyst"
                    data-dept="Finance"
                    data-owner="Emily Clark (Manager)"
                    data-duedate="2026-03-31"
                    data-status="Upcoming"
                >
                    <td class="sno-value">5</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <input class="form-check-input mt-0 task-checkbox" type="checkbox">
                            <span class="fw-bold text-dark">30-Day Performance Review & Probation Assessment</span>
                        </div>
                    </td>
                    <td><span class="milestone-badge milestone-month1">30-Day</span></td>
                    <td>
                        <div class="fw-bold text-dark">Priya Sundaram</div>
                        <div class="text-muted" style="font-size:11px;">Financial Analyst</div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Finance</span></td>
                    <td>Emily Clark (Manager)</td>
                    <td class="text-nowrap">31-Mar-2026</td>
                    <td><span class="task-status-pending"><i class="bi bi-clock-history"></i> Upcoming</span></td>
                    <td>
                        <button type="button" class="btn btn-sm edit btn-edit-task" data-bs-toggle="tooltip" data-bs-title="Edit Task"><i class="mdi mdi-pencil"></i></button>
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

<!-- Modal: Add Checklist Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><i class="bi bi-check2-square text-primary me-2"></i> Add Onboarding Checklist Task</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="addTaskForm" class="row g-3" onsubmit="return false;">
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Task Title *</label>
                        <input type="text" class="form-control" id="addTaskTitle" placeholder="e.g. Enroll in Corporate Health Insurance" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Milestone Phase *</label>
                        <select class="form-select" id="addTaskPhase">
                            <option value="Pre-Boarding">Pre-Boarding</option>
                            <option value="Day 1 Induction">Day 1 Induction</option>
                            <option value="Week 1 Milestones">Week 1 Milestones</option>
                            <option value="30-Day Review">30-Day Review</option>
                            <option value="60-90 Day Goal">60-90 Day Goal</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Assign to Joiner</label>
                        <select class="form-select" id="addTaskJoiner">
                            <option value="All Joiners (Template Default)">All Joiners (Template Default)</option>
                            <option value="Kavitha Raman">Kavitha Raman (UI/UX Designer)</option>
                            <option value="Rahul Verma">Rahul Verma (Backend Engineer)</option>
                            <option value="Siddharth Nair">Siddharth Nair (iOS App Developer)</option>
                            <option value="Priya Sundaram">Priya Sundaram (Financial Analyst)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Task Owner</label>
                        <input type="text" class="form-control" id="addTasgharudaner" placeholder="e.g. HR Ops, IT Support">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Due Date</label>
                        <input type="date" class="form-control" id="addTaskDueDate" value="2026-03-20">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnSaveAddTask">
                    <i class="bi bi-plus-circle me-1"></i> Add Task
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Edit Checklist Task -->
<div class="modal fade" id="editTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square text-primary me-2"></i> Edit Onboarding Task</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="editTaskForm" class="row g-3" onsubmit="return false;">
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Task Title *</label>
                        <input type="text" class="form-control" id="editTaskTitle" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Milestone Phase *</label>
                        <select class="form-select" id="editTaskPhase">
                            <option value="Pre-Boarding">Pre-Boarding</option>
                            <option value="Day 1 Induction">Day 1 Induction</option>
                            <option value="Week 1 Milestones">Week 1 Milestones</option>
                            <option value="30-Day Review">30-Day Review</option>
                            <option value="60-90 Day Goal">60-90 Day Goal</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Assign to Joiner</label>
                        <select class="form-select" id="editTaskJoiner">
                            <option value="All Joiners (Template Default)">All Joiners (Template Default)</option>
                            <option value="Kavitha Raman">Kavitha Raman (UI/UX Designer)</option>
                            <option value="Rahul Verma">Rahul Verma (Backend Engineer)</option>
                            <option value="Siddharth Nair">Siddharth Nair (iOS App Developer)</option>
                            <option value="Priya Sundaram">Priya Sundaram (Financial Analyst)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Task Owner</label>
                        <input type="text" class="form-control" id="editTasgharudaner">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Due Date</label>
                        <input type="date" class="form-control" id="editTaskDueDate">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Status</label>
                        <select class="form-select" id="editTaskStatus">
                            <option value="Completed">Completed</option>
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Upcoming">Upcoming</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnSaveEditTask">
                    <i class="bi bi-check-lg me-1"></i> Update Task
                </button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>

<script src="./assets/js/pages/onboarding-tasks.js?v=<?php echo time(); ?>"></script>
