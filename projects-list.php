<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/date-picker.css">

<main class="projects-wrapper pb-5">
    <div class="container-fluid px-3 px-md-4">
        <!-- Title row (Gharuda CRM Standard Flow) -->
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
            <div class="d-flex align-items-center gap-3">
                <div>
                    <h1 class="font-display fw-bold mb-1 fs-3 text-dark">Projects Directory</h1>
                </div>
            </div>
            
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <a href="project-create.php" class="btn btn-primary d-inline-flex align-items-center gap-2 fw-semibold px-3 py-2 rounded-2 shadow-sm">
                    <i class="bi bi-plus-circle-fill"></i> Create Project
                </a>
                <button type="button" class="btn btn-outline-secondary bg-white px-3 py-2 fw-semibold rounded-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#newProjectModal">
                    <i class="bi bi-lightning-charge-fill me-1 text-success"></i> Quick Add
                </button>
                <button class="btn btn-outline-secondary bg-white text-secondary px-3 py-2 rounded-2 shadow-sm" id="toggleFilterBtn" data-bs-toggle="tooltip" title="Toggle Search Filters">
                    <i class="bi bi-funnel-fill"></i>
                </button>
                <button class="btn btn-outline-secondary bg-white text-secondary px-3 py-2 rounded-2 shadow-sm" onclick="reloadTableData()" data-bs-toggle="tooltip" title="Refresh Table Data">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </div>

        <!-- Filter Form Section -->
        <div class="card border-0 shadow-sm rounded-3 p-3 mb-3 bg-white" id="filterCardSection">
            <div class="fw-bold fs-6 mb-3 text-dark d-flex align-items-center">
                <i class="bi bi-sliders text-success me-2"></i> Advanced Project Filters
            </div>
            <form id="projectFilterForm" onsubmit="return false;">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label text-muted small fw-bold mb-1">Staff Member / Client</label>
                        <select class="form-select select2" id="filterStaff" data-placeholder="All Staff / Customers">
                            <option value="">All Staff / Customers</option>
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
                    <div class="col-lg-3 col-md-6">
                        <label class="form-label text-muted small fw-bold mb-1">From Start Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control" id="filterFromDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="form-label text-muted small fw-bold mb-1">To Deadline Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control" id="filterToDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <button class="btn btn-primary w-100 py-2 d-flex align-items-center justify-content-center gap-2 rounded-2 shadow-sm fw-semibold" onclick="applyProjectFilters()">
                            <i class="bi bi-search"></i> Apply Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Quick Action Filter Pills -->
        <div class="d-flex align-items-center gap-2 flex-wrap mb-3" id="quickFilterPills">
            <button type="button" class="btn btn-sm btn-outline-warning rounded-pill px-3 py-1 fw-semibold" onclick="filterByQuickPill('deadline_today')">
                <i class="bi bi-clock-history me-1"></i> Today's Deadline
            </button>
            <button type="button" class="btn btn-sm btn-outline-info rounded-pill px-3 py-1 fw-semibold" onclick="filterByQuickPill('upcoming')">
                <i class="bi bi-calendar-event me-1"></i> Upcoming Projects
            </button>
            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 fw-semibold" onclick="filterByQuickPill('today')">
                <i class="bi bi-calendar-check me-1"></i> Today's Projects
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1 fw-semibold" onclick="filterByQuickPill('overdue')">
                <i class="bi bi-exclamation-triangle me-1"></i> Overdue Projects
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3 py-1 fw-semibold" onclick="resetProjectFilters()">
                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filters
            </button>
            <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-1 fw-semibold" onclick="toggleSummaryOverview()">
                <i class="bi bi-bar-chart-line me-1"></i> Summary Overview
            </button>
        </div>

        <!-- Projects KPI Metrics & Activity Overview Card -->
        <div class="card border-0 shadow-sm rounded-3 p-3 mb-3 bg-white" id="summaryOverviewCard" style="display:none;">
            <div class="fw-bold fs-6 mb-3 text-dark d-flex align-items-center">
                <i class="bi bi-pie-chart-fill text-success me-2"></i> Project Lifecycle Summary
            </div>
            
            <div class="row g-3 mb-3">
                <div class="col-6 col-md-4 col-xl-2">
                    <div class="card border-0 bg-light p-3 text-center rounded-3">
                        <div class="fs-4 text-secondary mb-1"><i class="bi bi-circle"></i></div>
                        <div class="fs-4 fw-bold text-dark" id="count-not-started">0</div>
                        <div class="small text-muted fw-semibold">Not Started</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <div class="card border-0 bg-light p-3 text-center rounded-3">
                        <div class="fs-4 text-primary mb-1"><i class="bi bi-play-circle-fill"></i></div>
                        <div class="fs-4 fw-bold text-primary" id="count-in-progress">15</div>
                        <div class="small text-muted fw-semibold">In Progress</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <div class="card border-0 bg-light p-3 text-center rounded-3">
                        <div class="fs-4 text-warning mb-1"><i class="bi bi-pause-circle-fill"></i></div>
                        <div class="fs-4 fw-bold text-warning" id="count-on-hold">0</div>
                        <div class="small text-muted fw-semibold">On Hold</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <div class="card border-0 bg-light p-3 text-center rounded-3">
                        <div class="fs-4 text-danger mb-1"><i class="bi bi-x-circle-fill"></i></div>
                        <div class="fs-4 fw-bold text-danger" id="count-cancelled">0</div>
                        <div class="small text-muted fw-semibold">Cancelled</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <div class="card border-0 bg-light p-3 text-center rounded-3">
                        <div class="fs-4 text-info mb-1"><i class="bi bi-bug-fill"></i></div>
                        <div class="fs-4 fw-bold text-info" id="count-test">1</div>
                        <div class="small text-muted fw-semibold">Testing</div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <div class="card border-0 bg-light p-3 text-center rounded-3">
                        <div class="fs-4 text-success mb-1"><i class="bi bi-check-circle-fill"></i></div>
                        <div class="fs-4 fw-bold text-success" id="count-finished">1</div>
                        <div class="small text-muted fw-semibold">Finished</div>
                    </div>
                </div>
            </div>

            <div class="bg-light p-3 rounded-3">
                <div class="fw-bold text-dark small mb-2 d-flex align-items-center gap-2">
                    <i class="bi bi-activity text-secondary"></i> Activity Updates Timeline
                </div>
                <div class="row g-2 text-center">
                    <div class="col">
                        <div class="small text-muted">Last 24 Hours</div>
                        <div class="fw-bold text-primary small"><i class="bi bi-play-fill"></i> <strong>15</strong> Active In Progress</div>
                    </div>
                    <div class="col">
                        <div class="small text-muted">Last 3 Days</div>
                        <div class="fw-bold text-warning small"><i class="bi bi-pause-fill"></i> <strong>0</strong> On Hold Requests</div>
                    </div>
                    <div class="col">
                        <div class="small text-muted">Last 7 Days</div>
                        <div class="fw-bold text-danger small"><i class="bi bi-slash-circle"></i> <strong>0</strong> Cancelled</div>
                    </div>
                    <div class="col">
                        <div class="small text-muted">QA Review</div>
                        <div class="fw-bold text-info small"><i class="bi bi-gear-fill"></i> <strong>1</strong> In Testing</div>
                    </div>
                    <div class="col">
                        <div class="small text-muted">Milestones</div>
                        <div class="fw-bold text-success small"><i class="bi bi-check2-all"></i> <strong>1</strong> Finished</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Card Section -->
        <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden mb-3 bg-white" id="projectsTableWrap">
            <!-- Table (toolbar + export + column visibility + live search + show entries + pagination auto-created by datatable class via auto-master-table.js) -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 datatable" id="projectsListTable" data-table-name="Projects">
                    <thead class="table-light">
                        <tr>
                            <th class="text-nowrap" style="width: 50px;">S.No</th>
                            <th class="text-nowrap">Project Name</th>
                            <th class="text-nowrap">Customer</th>
                            <th class="text-nowrap">Tag</th>
                            <th class="text-nowrap text-center">Progress</th>
                            <th class="text-nowrap">Start Date</th>
                            <th class="text-nowrap">Deadline</th>
                            <th class="text-nowrap">Deadline Status</th>
                            <th class="text-nowrap">Team Members</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap text-center" style="min-width: 175px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="projectsTableBody">
                        <tr data-status="in-progress" data-customer="GHARUDA">
                            <td class="fw-bold text-muted">1</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-circle p-2">B</span>
                                    <span>bel</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">GHARUDA</td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 rounded-2">Web</span></td>
                            <td class="text-center">
                                <span class="badge bg-light border text-secondary fw-semibold">0%</span>
                            </td>
                            <td class="fw-semibold text-secondary">04-09-2026</td>
                            <td class="fw-semibold text-secondary">--</td>
                            <td>
                                <span class="remaining-tag badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-2 overdue">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Deadline passed (0d)
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-secondary-subtle text-secondary rounded-circle p-2" data-bs-toggle="tooltip" title="Member 1">M1</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">In Progress</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('bel')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('bel')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('bel', 'GHARUDA')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('bel')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr data-status="in-progress" data-customer="Asif">
                            <td class="fw-bold text-muted">2</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-circle p-2">S</span>
                                    <span>Sugar Test</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">Asif</td>
                            <td><span class="badge bg-secondary-subtle text-secondary border px-2 py-1 rounded-2">Testing</span></td>
                            <td class="text-center">
                                <span class="badge bg-light border text-secondary fw-semibold">0%</span>
                            </td>
                            <td class="fw-semibold text-secondary">29-04-2026</td>
                            <td class="fw-semibold text-secondary">29-09-2027</td>
                            <td>
                                <span class="remaining-tag badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-2 active">
                                    <i class="bi bi-clock-history me-1"></i> 370 days remaining
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-success-subtle text-success rounded-circle p-2" data-bs-toggle="tooltip" title="Dev 1">D1</span>
                                    <span class="badge bg-secondary-subtle text-secondary rounded-circle p-2" data-bs-toggle="tooltip" title="Dev 2">D2</span>
                                    <span class="badge bg-warning-subtle text-warning rounded-circle p-2" data-bs-toggle="tooltip" title="Dev 3">D3</span>
                                    <span class="badge bg-light border text-muted rounded-circle p-2" data-bs-toggle="tooltip" title="+10">+10</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">In Progress</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('Sugar Test')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('Sugar Test')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('Sugar Test', 'Asif')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('Sugar Test')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr data-status="in-progress" data-customer="Sundar Arumugam">
                            <td class="fw-bold text-muted">3</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-circle p-2">S</span>
                                    <span>Solar Panel Installation</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">Sundar Arumugam</td>
                            <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1 rounded-2">Solar</span></td>
                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold">100%</span>
                            </td>
                            <td class="fw-semibold text-secondary">05-05-2026</td>
                            <td class="fw-semibold text-secondary">05-06-2026</td>
                            <td>
                                <span class="remaining-tag badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-2 overdue">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Deadline passed (110d)
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-success-subtle text-success rounded-circle p-2" data-bs-toggle="tooltip" title="Sundar">SA</span>
                                    <span class="badge bg-secondary-subtle text-secondary rounded-circle p-2" data-bs-toggle="tooltip" title="Arun">AR</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">In Progress</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('Solar Panel Installation')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('Solar Panel Installation')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('Solar Panel Installation', 'Sundar Arumugam')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('Solar Panel Installation')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr data-status="in-progress" data-customer="Hindustan Hydraulics & Pneumatics">
                            <td class="fw-bold text-muted">4</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-circle p-2">C</span>
                                    <span>Check and Charge</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">Hindustan Hydraulics & Pneumatics</td>
                            <td><span class="badge bg-info-subtle text-info border px-2 py-1 rounded-2">Maintenance</span></td>
                            <td class="text-center">
                                <span class="badge bg-light border text-secondary fw-semibold">0%</span>
                            </td>
                            <td class="fw-semibold text-secondary">13-04-2026</td>
                            <td class="fw-semibold text-secondary">31-05-2026</td>
                            <td>
                                <span class="remaining-tag badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-2 overdue">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Deadline passed (115d)
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-warning-subtle text-warning rounded-circle p-2" data-bs-toggle="tooltip" title="Hindustan">HH</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">In Progress</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('Check and Charge')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('Check and Charge')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('Check and Charge', 'Hindustan Hydraulics & Pneumatics')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('Check and Charge')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr data-status="in-progress" data-customer="GHARUDA soft">
                            <td class="fw-bold text-muted">5</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-circle p-2">C</span>
                                    <span>Construction project</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">GHARUDA soft</td>
                            <td><span class="badge bg-primary-subtle text-primary border px-2 py-1 rounded-2">Civil</span></td>
                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold">100%</span>
                            </td>
                            <td class="fw-semibold text-secondary">14-02-2026</td>
                            <td class="fw-semibold text-secondary">30-04-2026</td>
                            <td>
                                <span class="remaining-tag badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-2 overdue">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Deadline passed (146d)
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-danger-subtle text-danger rounded-circle p-2" data-bs-toggle="tooltip" title="GHARUDA Dev">KS</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">In Progress</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('Construction project')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('Construction project')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('Construction project', 'GHARUDA soft')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('Construction project')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr data-status="in-progress" data-customer="Hindustan Hydraulics & Pneumatics">
                            <td class="fw-bold text-muted">6</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-circle p-2">R</span>
                                    <span>RBR Arch</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">Hindustan Hydraulics & Pneumatics</td>
                            <td><span class="badge bg-secondary-subtle text-secondary border px-2 py-1 rounded-2">Architecture</span></td>
                            <td class="text-center">
                                <span class="badge bg-light border text-secondary fw-semibold">0%</span>
                            </td>
                            <td class="fw-semibold text-secondary">28-03-2026</td>
                            <td class="fw-semibold text-secondary">27-03-2026</td>
                            <td>
                                <span class="remaining-tag badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-2 overdue">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Deadline passed (180d)
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-secondary-subtle text-secondary rounded-circle p-2" data-bs-toggle="tooltip" title="Arch Team">RA</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">In Progress</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('RBR Arch')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('RBR Arch')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('RBR Arch', 'Hindustan Hydraulics & Pneumatics')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('RBR Arch')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr data-status="in-progress" data-customer="Power Spares Engineering">
                            <td class="fw-bold text-muted">7</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-circle p-2">C</span>
                                    <span>College Project</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">Power Spares Engineering</td>
                            <td><span class="badge bg-info-subtle text-info border px-2 py-1 rounded-2">Education</span></td>
                            <td class="text-center">
                                <span class="badge bg-light border text-secondary fw-semibold">0%</span>
                            </td>
                            <td class="fw-semibold text-secondary">10-03-2026</td>
                            <td class="fw-semibold text-secondary">25-03-2026</td>
                            <td>
                                <span class="remaining-tag badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-2 overdue">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Deadline passed (182d)
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-success-subtle text-success rounded-circle p-2" data-bs-toggle="tooltip" title="Power Spares">PS</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">In Progress</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('College Project')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('College Project')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('College Project', 'Power Spares Engineering')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('College Project')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr data-status="in-progress" data-customer="Prabhu photos">
                            <td class="fw-bold text-muted">8</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-circle p-2">S</span>
                                    <span>Solar panel</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">Prabhu photos</td>
                            <td><span class="badge bg-warning-subtle text-warning border px-2 py-1 rounded-2">Hardware</span></td>
                            <td class="text-center">
                                <span class="badge bg-light border text-secondary fw-semibold">0%</span>
                            </td>
                            <td class="fw-semibold text-secondary">03-03-2026</td>
                            <td class="fw-semibold text-secondary">25-03-2026</td>
                            <td>
                                <span class="remaining-tag badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 rounded-2 overdue">
                                    <i class="bi bi-exclamation-circle-fill me-1"></i> Deadline passed (182d)
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-warning-subtle text-warning rounded-circle p-2" data-bs-toggle="tooltip" title="Prabhu Team">PP</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">In Progress</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('Solar panel')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('Solar panel')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('Solar panel', 'Prabhu photos')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('Solar panel')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr data-status="in-progress" data-customer="GHARUDA">
                            <td class="fw-bold text-muted">9</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-circle p-2">C</span>
                                    <span>Cloud Infrastructure Migration</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">GHARUDA</td>
                            <td><span class="badge bg-info-subtle text-info border px-2 py-1 rounded-2">Cloud</span></td>
                            <td class="text-center">
                                <span class="badge bg-light border text-secondary fw-semibold">65%</span>
                            </td>
                            <td class="fw-semibold text-secondary">15-05-2026</td>
                            <td class="fw-semibold text-secondary">30-11-2026</td>
                            <td>
                                <span class="remaining-tag badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-2 active">
                                    <i class="bi bi-clock-history me-1"></i> 120 days remaining
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-secondary-subtle text-secondary rounded-circle p-2" data-bs-toggle="tooltip" title="Cloud Team">CM</span>
                                    <span class="badge bg-success-subtle text-success rounded-circle p-2" data-bs-toggle="tooltip" title="Dev Lead">AS</span>
                                </div>
                            </td>
                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">In Progress</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('Cloud Infrastructure Migration')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('Cloud Infrastructure Migration')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('Cloud Infrastructure Migration', 'GHARUDA')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('Cloud Infrastructure Migration')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>

                        <tr data-status="finished" data-customer="Zen Publications">
                            <td class="fw-bold text-muted">10</td>
                            <td>
                                <a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-circle p-2">E</span>
                                    <span>E-Commerce Portal Upgrade</span>
                                </a>
                            </td>
                            <td class="fw-semibold text-dark">Zen Publications</td>
                            <td><span class="badge bg-success-subtle text-success border px-2 py-1 rounded-2">E-Commerce</span></td>
                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold">100%</span>
                            </td>
                            <td class="fw-semibold text-secondary">01-01-2026</td>
                            <td class="fw-semibold text-secondary">15-03-2026</td>
                            <td>
                                <span class="remaining-tag badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-2 active">
                                    <i class="bi bi-check-circle-fill text-success me-1"></i> Completed
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-warning-subtle text-warning rounded-circle p-2" data-bs-toggle="tooltip" title="Zen Lead">ZP</span>
                                    <span class="badge bg-secondary-subtle text-secondary rounded-circle p-2" data-bs-toggle="tooltip" title="UI Dev">DV</span>
                                </div>
                            </td>
                            <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-2">Finished</span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="project-dashboard.php" class="btn btn-light border text-primary" data-bs-toggle="tooltip" title="View Project"><i class="bi bi-eye"></i></a>
                                    <button type="button" onclick="editProject('E-Commerce Portal Upgrade')" class="btn btn-light border text-secondary" data-bs-toggle="tooltip" title="Edit Project"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" onclick="deleteProject('E-Commerce Portal Upgrade')" class="btn btn-light border text-danger" data-bs-toggle="tooltip" title="Delete Project"><i class="bi bi-trash"></i></button>
                                    <button type="button" onclick="openSendEmailModal('E-Commerce Portal Upgrade', 'Zen Publications')" class="btn btn-light border text-success" data-bs-toggle="tooltip" title="Send Email"><i class="bi bi-envelope"></i></button>
                                    <button type="button" onclick="copyProject('E-Commerce Portal Upgrade')" class="btn btn-light border text-info" data-bs-toggle="tooltip" title="Copy Project"><i class="bi bi-copy"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- MODAL: CREATE / EDIT PROJECT -->
<div class="modal fade" id="newProjectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4" style="overflow:unset;">
            <div class="modal-header border-bottom px-4 py-3 bg-light rounded-top-4">
                <h5 class="modal-title fw-bold text-dark" id="newProjectModalTitle">
                    <i class="bi bi-folder-plus me-2" style="color:var(--primary, #16a34a);"></i> Create New Project
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="newProjectForm" onsubmit="handleCreateProject(event)">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Project Name *</label>
                            <input type="text" class="form-control" id="modalProjectName" required placeholder="e.g. Website Development">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Customer / Client *</label>
                            <select class="form-select select2" id="modalCustomer" required data-placeholder="Select Customer">
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

                        <div class="col-md-4">
                            <label class="form-label fw-bold small text-muted">Billing Type</label>
                            <select class="form-select select2" id="modalBillingType" data-placeholder="Select Billing Type">
                                <option value=""></option>
                                <option value="Fixed Rate" selected>Fixed Rate</option>
                                <option value="Project Hours">Project Hours</option>
                                <option value="Task Hours">Task Hours</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold small text-muted">Start Date</label>
                            <div class="date-picker">
                                <input type="text" class="date-input form-control" id="modalStartDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" value="17-10-2026">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold small text-muted">Deadline</label>
                            <div class="date-picker">
                                <input type="text" class="date-input form-control" id="modalDeadline" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" value="31-12-2026">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Assigned Members</label>
                            <select class="form-select select2" id="modalMembers" multiple data-placeholder="Select staff members">
                                <option value="1">GHARUDA</option>
                                <option value="2">Asif</option>
                                <option value="3">Sundar Arumugam</option>
                                <option value="4">Arun</option>
                                <option value="5">Dev Lead</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Tags</label>
                            <input type="text" class="form-control" id="modalTags" placeholder="e.g. Web, Testing, Solar">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted">Project Description</label>
                            <textarea class="form-control" id="modalDescription" rows="3" placeholder="Enter brief overview..."></textarea>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-light fw-bold px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fw-bold px-4" style="background: linear-gradient(135deg, var(--primary, #16a34a) 0%, var(--primary-dark, #0f7a38) 100%); border: none;">Save Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL: SEND EMAIL -->
<div class="modal fade" id="sendEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom px-4 py-3 bg-success-subtle rounded-top-4">
                <h5 class="modal-title fw-bold text-success d-flex align-items-center gap-2">
                    <i class="bi bi-envelope-fill"></i> Send Project Email
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="sendEmailForm" onsubmit="handleSendEmail(event)">
                    <input type="hidden" id="emailProjectName">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Client / Recipient Email *</label>
                        <input type="email" class="form-control" id="emailTo" required placeholder="client@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Subject *</label>
                        <input type="text" class="form-control" id="emailSubject" required placeholder="Project Update Notification">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Email Message *</label>
                        <textarea class="form-control" id="emailBody" rows="4" required placeholder="Type your email body message here..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">SMTP Email Gateway</label>
                        <select class="form-select select2" id="emailGateway" data-placeholder="Select SMTP Gateway">
                            <option value=""></option>
                            <option value="Default HR System Mailer (SMTP)" selected>Default HR System Mailer (SMTP)</option>
                            <option value="Gharuda Corporate Mail">Gharuda Corporate Mail</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn btn-light fw-bold px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success fw-bold px-4">
                            <i class="bi bi-send-fill me-1"></i> Send Email Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    // Action Link Handlers
    function copyProject(name) {
        if (confirm('Are you sure you want to duplicate/copy project "' + name + '"?')) {
            alert('Project "' + name + '" copied successfully as a duplicate draft!');
        }
    }

    function editProject(name) {
        var modalEl = document.getElementById('newProjectModal');
        var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        document.getElementById('newProjectModalTitle').innerHTML = '<i class="bi bi-pencil-square me-2" style="color:var(--primary, #16a34a);"></i> Edit Project - ' + name;
        document.getElementById('modalProjectName').value = name;
        var rows = document.querySelectorAll('#projectsTableBody tr');
        rows.forEach(function(r) {
            if (r.innerText.indexOf(name) > -1) {
                var cust = r.getAttribute('data-customer') || '';
                if (cust && typeof $ !== 'undefined' && $.fn.select2) {
                    $('#modalCustomer').val(cust).trigger('change.select2');
                }
                var startDate = r.cells[5] ? r.cells[5].textContent.trim() : '';
                var deadline = r.cells[6] ? r.cells[6].textContent.trim() : '';
                if (startDate && startDate !== '--') {
                    document.getElementById('modalStartDate').value = startDate;
                }
                if (deadline && deadline !== '--') {
                    document.getElementById('modalDeadline').value = deadline;
                }
            }
        });
        modal.show();
    }

    function deleteProject(name) {
        if (confirm('Are you sure you want to DELETE project "' + name + '"? This action cannot be undone.')) {
            var rows = document.querySelectorAll('#projectsTableBody tr');
            rows.forEach(function(row) {
                if (row.innerText.indexOf(name) > -1) {
                    row.remove();
                }
            });
            alert('Project "' + name + '" deleted successfully.');
        }
    }

    function openSendEmailModal(projName, clientName) {
        document.getElementById('emailProjectName').value = projName;
        document.getElementById('emailSubject').value = 'Project Update: ' + projName + ' (' + clientName + ')';
        document.getElementById('emailTo').value = clientName.toLowerCase().replace(/\s+/g, '') + '@example.com';
        document.getElementById('emailBody').value = 'Dear ' + clientName + ',\n\nHere is the latest progress update regarding your project "' + projName + '".\n\nBest regards,\nProject Management Team';
        var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('sendEmailModal'));
        modal.show();
    }

    function handleSendEmail(e) {
        e.preventDefault();
        var modalEl = document.getElementById('sendEmailModal');
        var modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();
        alert('Email sent successfully!');
    }

    // Filter Toggle
    document.getElementById('toggleFilterBtn').addEventListener('click', function() {
        var card = document.getElementById('filterCardSection');
        if (card.style.display === 'none') {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });

    // Toggle Summary Overview Visibility
    function toggleSummaryOverview() {
        var card = document.getElementById('summaryOverviewCard');
        if (card.style.display === 'none') {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    }

    // Quick Action Filter Pills Logic
    function filterByQuickPill(type) {
        var rows = document.querySelectorAll('#projectsTableBody tr');
        rows.forEach(function(row) {
            var remainingTag = row.querySelector('.remaining-tag');
            if (!remainingTag) return;
            var isOverdue = remainingTag.classList.contains('overdue');
            var isActive = remainingTag.classList.contains('active');

            if (type === 'overdue') {
                row.style.display = isOverdue ? '' : 'none';
            } else if (type === 'upcoming') {
                row.style.display = isActive ? '' : 'none';
            } else if (type === 'today' || type === 'deadline_today') {
                row.style.display = (row.innerText.indexOf('0 days') > -1 || row.innerText.indexOf('0d') > -1) ? '' : 'none';
            } else {
                row.style.display = '';
            }
        });
    }

    // Helper to parse DD-MM-YYYY to comparable number YYYYMMDD
    function parseDmy(s) {
        if (!s) return null;
        var p = s.trim().split('-');
        if (p.length === 3) {
            var d = Number(p[0]), m = Number(p[1]), y = Number(p[2]);
            if (y && m && d) return y * 10000 + m * 100 + d;
        }
        return null;
    }

    // Reset Filters
    function resetProjectFilters() {
        document.getElementById('filterStaff').value = '';
        document.getElementById('filterFromDate').value = '';
        document.getElementById('filterToDate').value = '';
        if (window.jQuery && jQuery.fn.select2) {
            $('#filterStaff').val('').trigger('change.select2');
        }
        var rows = document.querySelectorAll('#projectsTableBody tr');
        rows.forEach(function(row) {
            row.style.display = '';
        });
    }

    // Apply Project Filters from form
    function applyProjectFilters() {
        var staff = document.getElementById('filterStaff').value.toLowerCase().trim();
        var fromVal = document.getElementById('filterFromDate').value.trim();
        var toVal = document.getElementById('filterToDate').value.trim();
        var fromKey = parseDmy(fromVal);
        var toKey = parseDmy(toVal);

        if (fromKey && toKey && fromKey > toKey) {
            alert('From Start Date cannot be after To Deadline Date.');
            return;
        }

        var rows = document.querySelectorAll('#projectsTableBody tr');
        rows.forEach(function(row) {
            var cust = row.getAttribute('data-customer') ? row.getAttribute('data-customer').toLowerCase() : '';
            var rowStartStr = row.cells[5] ? row.cells[5].textContent.trim() : '';
            var rowDeadStr = row.cells[6] ? row.cells[6].textContent.trim() : '';
            var rowStartKey = parseDmy(rowStartStr);
            var rowDeadKey = parseDmy(rowDeadStr);

            var matchesStaff = !staff || cust.indexOf(staff) > -1 || row.innerText.toLowerCase().indexOf(staff) > -1;
            var matchesFrom = !fromKey || (rowStartKey && rowStartKey >= fromKey);
            var matchesTo = !toKey || (rowDeadKey && rowDeadKey <= toKey);

            if (matchesStaff && matchesFrom && matchesTo) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    ['filterFromDate', 'filterToDate'].forEach(function(id) {
        var el = document.getElementById(id);
        if (el) {
            el.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') applyProjectFilters();
            });
        }
    });

    // Handle New Project Creation submit
    function handleCreateProject(e) {
        e.preventDefault();
        var name = document.getElementById('modalProjectName').value;
        var cust = document.getElementById('modalCustomer').value;
        var modalEl = document.getElementById('newProjectModal');
        var modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();
        alert('Project "' + name + '" created successfully!');
    }

    // Reload Data
    function reloadTableData() {
        resetProjectFilters();
    }

    // Modal & Filter Select2 Binding
    if (typeof $ !== 'undefined' && $.fn.select2) {
        $('#filterStaff').select2({
            width: '100%',
            placeholder: 'All Staff / Customers',
            allowClear: true
        });

        $('.modal').on('shown.bs.modal', function () {
            var $m = $(this);
            $m.find('select.select2').each(function () {
                if ($(this).data('select2')) {
                    $(this).select2('destroy');
                }
                $(this).select2({
                    dropdownParent: $m,
                    width: '100%',
                    placeholder: $(this).attr('data-placeholder') || 'Select...'
                });
            });
        });
    }
    document.addEventListener('DOMContentLoaded', function () {
        try {
            var savedProjects = JSON.parse(localStorage.getItem('gh_new_projects') || '[]');
            var tbody = document.getElementById('projectsTableBody');
            if (tbody && savedProjects.length > 0) {
                savedProjects.forEach(function (p) {
                    var initial = (p.name || 'P').charAt(0).toUpperCase();
                    var tr = document.createElement('tr');
                    tr.setAttribute('data-status', 'in-progress');
                    tr.setAttribute('data-customer', p.customer || 'Client');
                    tr.innerHTML =
                        '<td class="fw-bold text-primary">NEW</td>' +
                        '<td><a href="project-dashboard.php" class="text-decoration-none fw-bold text-dark d-flex align-items-center gap-2">' +
                        '<span class="badge bg-success-subtle text-success border border-success-subtle rounded-circle p-2">' + initial + '</span>' +
                        '<span>' + (p.name || 'New Project').replace(/</g, '&lt;') + '</span></a></td>' +
                        '<td class="fw-semibold text-dark">' + (p.customer || 'Client').replace(/</g, '&lt;') + '</td>' +
                        '<td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 rounded-2">' + (p.device || 'Web') + '</span></td>' +
                        '<td class="text-center"><span class="badge bg-light border text-secondary fw-semibold">0%</span></td>' +
                        '<td class="fw-semibold text-secondary">' + (p.startDate || '29-10-2026') + '</td>' +
                        '<td class="fw-semibold text-secondary">' + (p.deadline || '15-11-2026') + '</td>' +
                        '<td><span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 rounded-2"><i class="bi bi-check2-circle me-1"></i>Active Delivery</span></td>' +
                        '<td><div class="d-flex align-items-center gap-1"><span class="badge bg-primary-subtle text-primary rounded-circle p-2">PM</span></div></td>' +
                        '<td><span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1.5 rounded-2">' + (p.status || 'In Progress') + '</span></td>' +
                        '<td class="text-center"><div class="btn-group btn-group-sm" role="group">' +
                        '<a href="project-dashboard.php" class="btn btn-light border text-primary" title="View Project"><i class="bi bi-eye"></i></a>' +
                        '<a href="task-create.php" class="btn btn-light border text-success" title="Assign Tasks"><i class="bi bi-plus-circle"></i></a>' +
                        '</div></td>';
                    tbody.insertBefore(tr, tbody.firstChild);
                });
            }
        } catch (err) {}
    });
</script>