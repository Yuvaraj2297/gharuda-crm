<?php
include 'header.php';

$projectId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '1';
$projectName = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'CRM Cloud Migration';
$clientName = isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : 'Power Spares Engineering';
?>

<div class="container-fluid px-0">
    <!-- Breadcrumb & Actions Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <a href="projects-list.php" class="text-decoration-none text-muted hover-primary">Projects</a>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold"><?php echo $projectName; ?></span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark"><?php echo $projectName; ?></h1>
                <span class="badge bg-success-subtle text-success px-2.5 py-1 rounded-pill fw-semibold">In Progress</span>
                <span class="badge bg-primary-subtle text-primary px-2.5 py-1 rounded-pill">ID: #PRJ-<?php echo str_pad($projectId, 4, '0', STR_PAD_LEFT); ?></span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="projects-list.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>All Projects
            </a>
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newMilestoneModal">
                <i class="bi bi-flag me-1"></i>Add Milestone
            </button>
            <a href="task-create.php?project_id=<?php echo $projectId; ?>" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>New Task
            </a>
        </div>
    </div>

    <!-- Project KPI Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Client / Organization</span>
                    <span class="p-2 rounded-2 bg-info-subtle text-info"><i class="bi bi-buildings"></i></span>
                </div>
                <h5 class="fw-bold mb-1 text-truncate" title="<?php echo $clientName; ?>"><?php echo $clientName; ?></h5>
                <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i>Started: 01-Jan-2026</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Overall Progress</span>
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-speedometer2"></i></span>
                </div>
                <div class="d-flex align-items-baseline gap-2 mb-2">
                    <h3 class="fw-bold mb-0 text-dark">68%</h3>
                    <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> On Track</span>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-success rounded-pill" role="progressbar" style="width: 68%;"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Budget & Spend</span>
                    <span class="p-2 rounded-2 bg-warning-subtle text-warning"><i class="bi bi-currency-rupee"></i></span>
                </div>
                <div class="d-flex align-items-baseline gap-2 mb-1">
                    <h4 class="fw-bold mb-0 text-dark">₹3,45,000</h4>
                    <span class="text-muted small">/ ₹5,00,000</span>
                </div>
                <span class="text-muted small">69% Budget Utilized</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Tasks Completion</span>
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-check2-circle"></i></span>
                </div>
                <div class="d-flex align-items-baseline gap-2 mb-1">
                    <h3 class="fw-bold mb-0 text-dark">24 / 35</h3>
                    <span class="text-muted small">Tasks</span>
                </div>
                <span class="text-muted small">11 Tasks Remaining</span>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-pills gap-2 mb-3 bg-white p-2 rounded-3 shadow-sm border" id="projectTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active px-3 py-2 rounded-2 fw-semibold" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-pane" type="button" role="tab">
                <i class="bi bi-grid-1x2 me-1"></i>Overview
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link px-3 py-2 rounded-2 fw-semibold" id="tasks-tab" data-bs-toggle="tab" data-bs-target="#tasks-pane" type="button" role="tab">
                <i class="bi bi-list-task me-1"></i>Tasks & Deliverables
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link px-3 py-2 rounded-2 fw-semibold" id="milestones-tab" data-bs-toggle="tab" data-bs-target="#milestones-pane" type="button" role="tab">
                <i class="bi bi-flag me-1"></i>Milestones
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link px-3 py-2 rounded-2 fw-semibold" id="team-tab" data-bs-toggle="tab" data-bs-target="#team-pane" type="button" role="tab">
                <i class="bi bi-people me-1"></i>Project Team
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link px-3 py-2 rounded-2 fw-semibold" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance-pane" type="button" role="tab">
                <i class="bi bi-cash-stack me-1"></i>Invoicing & Budget
            </button>
        </li>
    </ul>

    <!-- Tab Contents -->
    <div class="tab-content mb-4" id="projectTabContent">
        <!-- Overview Pane -->
        <div class="tab-pane fade show active" id="overview-pane" role="tabpanel">
            <div class="row g-3">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-3 p-4 mb-3">
                        <h6 class="fw-bold text-dark mb-3"><i class="bi bi-file-text me-2 text-primary"></i>Project Scope & Description</h6>
                        <p class="text-secondary leading-relaxed mb-4">
                            Implementation, migration, and stabilization of enterprise customer records into the unified CRM Cloud system for <?php echo $clientName; ?>. Scope encompasses legacy data extraction, pipeline integration, automated lead notifications, and production deployment with end-user training.
                        </p>
                        <div class="row g-3 pt-3 border-top">
                            <div class="col-sm-4">
                                <span class="text-muted small d-block">Project Type</span>
                                <span class="fw-bold text-dark">Fixed Cost / Cloud SLA</span>
                            </div>
                            <div class="col-sm-4">
                                <span class="text-muted small d-block">Target Deadline</span>
                                <span class="fw-bold text-dark">30-Apr-2026</span>
                            </div>
                            <div class="col-sm-4">
                                <span class="text-muted small d-block">Lead Project Manager</span>
                                <span class="fw-bold text-dark">Yuvaraj N.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="card border-0 shadow-sm rounded-3 p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="fw-bold text-dark mb-0"><i class="bi bi-clock-history me-2 text-primary"></i>Recent Project Activity</h6>
                            <a href="#" class="small text-decoration-none">View All</a>
                        </div>
                        <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                            <li class="d-flex align-items-start gap-3">
                                <span class="badge bg-success-subtle text-success p-2 rounded-circle"><i class="bi bi-check-lg"></i></span>
                                <div>
                                    <div class="fw-semibold text-dark small">Database schema validation completed</div>
                                    <span class="text-muted small">Updated by Karthik R. &middot; Today at 11:20 AM</span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start gap-3">
                                <span class="badge bg-primary-subtle text-primary p-2 rounded-circle"><i class="bi bi-chat-left-dots"></i></span>
                                <div>
                                    <div class="fw-semibold text-dark small">Milestone review meeting held with client team</div>
                                    <span class="text-muted small">Updated by Priya S. &middot; Yesterday at 04:45 PM</span>
                                </div>
                            </li>
                            <li class="d-flex align-items-start gap-3">
                                <span class="badge bg-warning-subtle text-warning p-2 rounded-circle"><i class="bi bi-upload"></i></span>
                                <div>
                                    <div class="fw-semibold text-dark small">API Integration specification v2.1 uploaded</div>
                                    <span class="text-muted small">Updated by Harish D. &middot; 24-Jan-2026</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-3 p-4 mb-3">
                        <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-lines-fill me-2 text-primary"></i>Client Details</h6>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width:44px;height:44px;">
                                <?php echo strtoupper(substr($clientName, 0, 1)); ?>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0"><?php echo $clientName; ?></h6>
                                <span class="text-muted small">Enterprise Account</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2 small text-secondary">
                            <div><i class="bi bi-envelope me-2"></i>contact@<?php echo strtolower(preg_replace('/[^a-z0-9]/', '', $clientName)); ?>.com</div>
                            <div><i class="bi bi-telephone me-2"></i>+91 98401 23456</div>
                            <div><i class="bi bi-geo-alt me-2"></i>Chennai, Tamil Nadu, India</div>
                        </div>
                        <a href="customers.php" class="btn btn-outline-secondary btn-sm w-100 mt-3">View Client Profile</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Pane -->
        <div class="tab-pane fade" id="tasks-pane" role="tabpanel">
            <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden">
                <div class="p-3 bg-white border-bottom d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold text-dark mb-0">Project Tasks (35)</h6>
                    <a href="task-create.php?project_id=<?php echo $projectId; ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i>Add Task
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 datatable" data-table-name="Project Tasks">
                        <thead class="table-light">
                            <tr>
                                <th>Task Name</th>
                                <th>Milestone</th>
                                <th>Assignee</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold text-dark">Data Import and Deduplication</td>
                                <td>Phase 1: Discovery</td>
                                <td>Harish D.</td>
                                <td>28-Jan-2026</td>
                                <td><span class="badge bg-danger-subtle text-danger">High</span></td>
                                <td><span class="badge bg-success-subtle text-success">Completed</span></td>
                                <td><a href="tasks-list.php" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Lead Status Workflow Automation</td>
                                <td>Phase 2: Configuration</td>
                                <td>Divya A.</td>
                                <td>05-Feb-2026</td>
                                <td><span class="badge bg-warning-subtle text-warning">Medium</span></td>
                                <td><span class="badge bg-primary-subtle text-primary">In Progress</span></td>
                                <td><a href="tasks-list.php" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Payment Gateway Webhook Hookup</td>
                                <td>Phase 3: Integration</td>
                                <td>Karthik R.</td>
                                <td>15-Feb-2026</td>
                                <td><span class="badge bg-danger-subtle text-danger">High</span></td>
                                <td><span class="badge bg-secondary-subtle text-secondary">Pending</span></td>
                                <td><a href="tasks-list.php" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Milestones Pane -->
        <div class="tab-pane fade" id="milestones-pane" role="tabpanel">
            <div class="card border-0 shadow-sm rounded-3 p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="fw-bold text-dark mb-0">Milestones & Phase Tracking</h6>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newMilestoneModal">
                        <i class="bi bi-plus-lg me-1"></i>New Milestone
                    </button>
                </div>
                <div class="d-flex flex-column gap-3">
                    <div class="p-3 border rounded-3 bg-light-subtle d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-success p-2 rounded-circle"><i class="bi bi-check-lg text-white"></i></span>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">M1: Requirements & Data Architecture</h6>
                                <span class="text-muted small">Completed on 15-Jan-2026 &middot; 100% Achieved</span>
                            </div>
                        </div>
                        <span class="badge bg-success-subtle text-success">Done</span>
                    </div>
                    <div class="p-3 border rounded-3 bg-white d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-primary p-2 rounded-circle"><i class="bi bi-clock text-white"></i></span>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">M2: Pipeline Configuration & API Hooks</h6>
                                <span class="text-muted small">Due on 10-Feb-2026 &middot; 65% Completed</span>
                            </div>
                        </div>
                        <span class="badge bg-primary-subtle text-primary">In Progress</span>
                    </div>
                    <div class="p-3 border rounded-3 bg-white d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-secondary p-2 rounded-circle"><i class="bi bi-circle text-white"></i></span>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">M3: Final UAT & Production Launch</h6>
                                <span class="text-muted small">Due on 30-Apr-2026 &middot; 0% Completed</span>
                            </div>
                        </div>
                        <span class="badge bg-secondary-subtle text-secondary">Upcoming</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Pane -->
        <div class="tab-pane fade" id="team-pane" role="tabpanel">
            <div class="card border-0 shadow-sm rounded-3 p-4">
                <h6 class="fw-bold text-dark mb-3">Project Assigned Team</h6>
                <div class="row g-3">
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 border rounded-3 text-center bg-white">
                            <img src="./assets/img/profile-1.jpg" class="rounded-circle mb-2 avatar-md" alt="">
                            <h6 class="fw-bold text-dark mb-0">Yuvaraj N.</h6>
                            <span class="text-muted small d-block mb-2">Project Manager</span>
                            <span class="badge bg-primary-subtle text-primary">Lead</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 border rounded-3 text-center bg-white">
                            <img src="./assets/img/profile-2.jpg" class="rounded-circle mb-2 avatar-md" alt="">
                            <h6 class="fw-bold text-dark mb-0">Harish D.</h6>
                            <span class="text-muted small d-block mb-2">Senior Developer</span>
                            <span class="badge bg-success-subtle text-success">Backend</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 border rounded-3 text-center bg-white">
                            <img src="./assets/img/profile-1.jpg" class="rounded-circle mb-2 avatar-md" alt="">
                            <h6 class="fw-bold text-dark mb-0">Divya A.</h6>
                            <span class="text-muted small d-block mb-2">Frontend Specialist</span>
                            <span class="badge bg-info-subtle text-info">UI/UX</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="p-3 border rounded-3 text-center bg-white">
                            <img src="./assets/img/profile-2.jpg" class="rounded-circle mb-2 avatar-md" alt="">
                            <h6 class="fw-bold text-dark mb-0">Karthik R.</h6>
                            <span class="text-muted small d-block mb-2">QA Specialist</span>
                            <span class="badge bg-warning-subtle text-warning">Testing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Finance Pane -->
        <div class="tab-pane fade" id="finance-pane" role="tabpanel">
            <div class="card border-0 shadow-sm rounded-3 p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h6 class="fw-bold text-dark mb-0">Invoices & Milestone Billing</h6>
                    <a href="expenses.php" class="btn btn-outline-primary btn-sm"><i class="bi bi-receipt me-1"></i>Record Expense</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Invoice #</th>
                                <th>Date</th>
                                <th>Milestone</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">#INV-2026-081</td>
                                <td>15-Jan-2026</td>
                                <td>M1: Advance & Discovery</td>
                                <td>₹1,50,000</td>
                                <td><span class="badge bg-success-subtle text-success">Paid</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">#INV-2026-094</td>
                                <td>10-Feb-2026</td>
                                <td>M2: Mid-phase Delivery</td>
                                <td>₹1,75,000</td>
                                <td><span class="badge bg-warning-subtle text-warning">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: New Milestone -->
<div class="modal fade" id="newMilestoneModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Project Milestone</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="newMilestoneForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Milestone Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="e.g. UAT Sign-off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Target Due Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Deliverables Description</label>
                        <textarea class="form-control" rows="3" placeholder="Key deliverables and acceptance criteria..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Milestone</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
