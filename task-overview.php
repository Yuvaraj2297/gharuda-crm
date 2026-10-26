<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <a href="tasks-list.php" class="text-decoration-none text-muted hover-primary">Tasks</a>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Task Board Overview</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Tasks Kanban Board</h1>
                <span class="badge bg-primary-subtle text-primary rounded-pill">35 Active Tasks</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="tasks-list.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-list-task me-1"></i>List View
            </a>
            <a href="task-create.php" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>New Task
            </a>
        </div>
    </div>

    <!-- Filter Strip -->
    <div class="card border-0 shadow-sm rounded-3 p-3 mb-4 bg-white">
        <div class="row g-2 align-items-center">
            <div class="col-md-3">
                <select class="form-select form-select-sm select2" id="filterProject">
                    <option value="">All Projects</option>
                    <option value="1">CRM Cloud Migration</option>
                    <option value="2">E-Commerce Portal</option>
                    <option value="3">API Microservices</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select form-select-sm select2" id="filterAssignee">
                    <option value="">All Assignees</option>
                    <option value="Harish">Harish D.</option>
                    <option value="Divya">Divya A.</option>
                    <option value="Karthik">Karthik R.</option>
                    <option value="Priya">Priya S.</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select form-select-sm" id="filterPriority">
                    <option value="">All Priorities</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <div class="col-md-3 text-md-end">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="location.reload();">
                    <i class="bi bi-arrow-clockwise me-1"></i>Reset
                </button>
            </div>
        </div>
    </div>

    <!-- Kanban Board Columns -->
    <div class="row g-3">
        <!-- Col 1: Pending / Backlog -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 bg-light-subtle h-100">
                <div class="card-header bg-transparent border-0 d-flex align-items-center justify-content-between p-3 pb-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="p-1 rounded-circle bg-secondary"></span>
                        <h6 class="fw-bold text-dark mb-0">Pending / Backlog</h6>
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary rounded-pill">2</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2">
                    <!-- Task Card -->
                    <div class="card border shadow-sm p-3 rounded-2 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge bg-danger-subtle text-danger small">High</span>
                            <span class="text-muted small">#TK-108</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Payment Gateway Webhook Hookup</h6>
                        <span class="badge bg-light text-muted border mb-2 d-inline-block text-truncate" style="max-width:200px;">CRM Cloud Migration</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i>15-Feb</span>
                            <span class="badge rounded-circle bg-primary text-white" style="width:26px;height:26px;line-height:26px;padding:0;">K</span>
                        </div>
                    </div>
                    <!-- Task Card -->
                    <div class="card border shadow-sm p-3 rounded-2 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge bg-secondary-subtle text-secondary small">Low</span>
                            <span class="text-muted small">#TK-112</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Client Presentation Slide Review</h6>
                        <span class="badge bg-light text-muted border mb-2 d-inline-block text-truncate" style="max-width:200px;">General Tasks</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i>18-Feb</span>
                            <span class="badge rounded-circle bg-success text-white" style="width:26px;height:26px;line-height:26px;padding:0;">P</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Col 2: In Progress -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 bg-light-subtle h-100">
                <div class="card-header bg-transparent border-0 d-flex align-items-center justify-content-between p-3 pb-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="p-1 rounded-circle bg-primary"></span>
                        <h6 class="fw-bold text-dark mb-0">In Progress</h6>
                    </div>
                    <span class="badge bg-primary-subtle text-primary rounded-pill">2</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2">
                    <!-- Task Card -->
                    <div class="card border shadow-sm p-3 rounded-2 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge bg-warning-subtle text-warning small">Medium</span>
                            <span class="text-muted small">#TK-104</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Lead Status Workflow Automation</h6>
                        <span class="badge bg-light text-muted border mb-2 d-inline-block text-truncate" style="max-width:200px;">CRM Cloud Migration</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i>05-Feb</span>
                            <span class="badge rounded-circle bg-info text-white" style="width:26px;height:26px;line-height:26px;padding:0;">D</span>
                        </div>
                    </div>
                    <!-- Task Card -->
                    <div class="card border shadow-sm p-3 rounded-2 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge bg-danger-subtle text-danger small">Urgent</span>
                            <span class="text-muted small">#TK-105</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Customer View 360 CSS Optimization</h6>
                        <span class="badge bg-light text-muted border mb-2 d-inline-block text-truncate" style="max-width:200px;">UI Refactor</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i>Today</span>
                            <span class="badge rounded-circle bg-primary text-white" style="width:26px;height:26px;line-height:26px;padding:0;">H</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Col 3: Review -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 bg-light-subtle h-100">
                <div class="card-header bg-transparent border-0 d-flex align-items-center justify-content-between p-3 pb-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="p-1 rounded-circle bg-warning"></span>
                        <h6 class="fw-bold text-dark mb-0">Under Review</h6>
                    </div>
                    <span class="badge bg-warning-subtle text-warning rounded-pill">1</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2">
                    <!-- Task Card -->
                    <div class="card border shadow-sm p-3 rounded-2 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge bg-primary-subtle text-primary small">High</span>
                            <span class="text-muted small">#TK-099</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">CSV Bulk Lead Import Parser</h6>
                        <span class="badge bg-light text-muted border mb-2 d-inline-block text-truncate" style="max-width:200px;">Lead Core</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <span class="text-muted small"><i class="bi bi-calendar3 me-1"></i>30-Jan</span>
                            <span class="badge rounded-circle bg-success text-white" style="width:26px;height:26px;line-height:26px;padding:0;">Y</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Col 4: Completed -->
        <div class="col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 bg-light-subtle h-100">
                <div class="card-header bg-transparent border-0 d-flex align-items-center justify-content-between p-3 pb-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="p-1 rounded-circle bg-success"></span>
                        <h6 class="fw-bold text-dark mb-0">Completed</h6>
                    </div>
                    <span class="badge bg-success-subtle text-success rounded-pill">1</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2">
                    <!-- Task Card -->
                    <div class="card border shadow-sm p-3 rounded-2 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="badge bg-success-subtle text-success small">Done</span>
                            <span class="text-muted small">#TK-082</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1 text-decoration-line-through text-muted">Data Import &amp; Deduplication</h6>
                        <span class="badge bg-light text-muted border mb-2 d-inline-block text-truncate" style="max-width:200px;">CRM Cloud Migration</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <span class="text-muted small"><i class="bi bi-check2-all text-success me-1"></i>Completed</span>
                            <span class="badge rounded-circle bg-primary text-white" style="width:26px;height:26px;line-height:26px;padding:0;">H</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
