<?php
include 'header.php';
$selectedProjectId = isset($_GET['project_id']) ? htmlspecialchars($_GET['project_id']) : '';
?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <a href="tasks-list.php" class="text-decoration-none text-muted hover-primary">Tasks</a>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Create New Task</span>
            </nav>
            <h1 class="h3 fw-bold mb-0 text-dark">Create Task</h1>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="tasks-list.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Back to Tasks
            </a>
            <a href="task-overview.php" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-kanban me-1"></i>Task Board
            </a>
        </div>
    </div>

    <!-- Main Card -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-3 p-4">
                <form id="createTaskForm" action="tasks-list.php" method="GET">
                    <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom">
                        <i class="bi bi-check2-square text-primary me-2"></i>Task Details
                    </h5>

                    <div class="row g-3 mb-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Task Subject / Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" placeholder="e.g. Follow up on software contract proposal" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Related Project</label>
                            <select class="form-select select2" name="project_id">
                                <option value="">-- No Related Project --</option>
                                <option value="1" <?php echo $selectedProjectId === '1' ? 'selected' : ''; ?>>CRM Cloud Migration</option>
                                <option value="2">E-Commerce Portal Integration</option>
                                <option value="3">API Microservices Engine</option>
                                <option value="4">Mobile App iOS & Android</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Related Client / Customer</label>
                            <select class="form-select select2" name="customer_id">
                                <option value="">-- Select Client / Account --</option>
                                <option value="1">Power Spares Engineering</option>
                                <option value="2">Zen Publications</option>
                                <option value="3">Hindustan Hydraulics</option>
                                <option value="4">Gharuda Software</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Assignee <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="assignee" required>
                                <option value="Harish D.">Harish D.</option>
                                <option value="Divya A.">Divya A.</option>
                                <option value="Karthik R.">Karthik R.</option>
                                <option value="Priya S.">Priya S.</option>
                                <option value="Arun K.">Arun K.</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Priority <span class="text-danger">*</span></label>
                            <select class="form-select" name="priority">
                                <option value="Low">Low</option>
                                <option value="Medium" selected>Medium</option>
                                <option value="High">High</option>
                                <option value="Urgent">Urgent</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Status</label>
                            <select class="form-select" name="status">
                                <option value="Pending" selected>Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Start Date</label>
                            <input type="date" class="form-control" name="start_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Due Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="due_date" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold small">Task Description & Instructions</label>
                            <textarea class="form-control" name="description" rows="5" placeholder="Provide detailed task description, deliverables, links, or notes..."></textarea>
                        </div>

                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" id="sendNotifCheck" checked>
                                <label class="form-check-label small fw-semibold" for="sendNotifCheck">
                                    Notify assignee via email and in-app bell notification
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top mt-4">
                        <a href="tasks-list.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg me-1"></i>Create Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
