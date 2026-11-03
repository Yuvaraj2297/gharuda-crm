<?php include 'header.php'; ?>

<!-- DataTables / DatePicker CSS if available, plus custom Gharuda styles -->

<link rel="stylesheet" href="./assets/css/select2.css">

<main class="projects-report-wrapper py-3 pb-5">
    <div class="container-fluid px-3 px-md-4">
        
        <!-- Page Header & Action Bar -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
            <!-- LEFT: Icon badge + Title + Subtitle -->
            <div class="d-flex align-items-center gap-2.5">
                <div class="rounded-3 bg-info-subtle text-info d-flex align-items-center justify-content-center flex-shrink-0" style="width:36px;height:36px;font-size:18px;">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                </div>
                <div>
                    <h1 class="font-display fw-bold mb-0 page-title">Projects Report</h1>
                    <span class="text-muted font-11">Comprehensive project status, deadline &amp; deliverables overview</span>
                </div>
            </div>
            
            <!-- RIGHT: Actions -->
            <div class="d-flex align-items-center flex-wrap gap-2">
                <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#projReportFilterOffcanvas" aria-controls="projReportFilterOffcanvas">
                    <i class="bi bi-funnel"></i><span>Filters</span>
                    <span class="badge bg-primary rounded-pill d-none" id="projReportFilterCountBadge">0</span>
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" onclick="openDetailedOverviewModal()">
                    <i class="bi bi-bar-chart-steps"></i><span>Overview</span>
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" onclick="window.print()">
                    <i class="bi bi-printer"></i><span>Print</span>
                </button>
                <a href="project-create.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1">
                    <i class="bi bi-plus-lg"></i><span>New Project</span>
                </a>
            </div>
        </div>

        <!-- Projects Summary Section -->
        <div class="card border-0 shadow-sm rounded-3 p-3 mb-3 bg-white">
            <div class="fw-bold fs-6 mb-3 text-dark d-flex align-items-center">
                <i class="bi bi-file-earmark-text text-success me-2"></i> Projects Summary
            </div>
            <div class="row g-2 text-center">
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-2 rounded-3 bg-light" onclick="filterByStatus('Not Started')" role="button" style="cursor: pointer;">
                        <div class="fs-4 fw-bold text-secondary" id="cntNotStarted">2</div>
                        <div class="small text-muted fw-semibold">Not Started</div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-2 rounded-3 bg-light" onclick="filterByStatus('In Progress')" role="button" style="cursor: pointer;">
                        <div class="fs-4 fw-bold text-primary" id="cntInProgress">8</div>
                        <div class="small text-muted fw-semibold">In Progress</div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-2 rounded-3 bg-light" onclick="filterByStatus('On Hold')" role="button" style="cursor: pointer;">
                        <div class="fs-4 fw-bold text-warning" id="cntOnHold">1</div>
                        <div class="small text-muted fw-semibold">On Hold</div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-2 rounded-3 bg-light" onclick="filterByStatus('Cancelled')" role="button" style="cursor: pointer;">
                        <div class="fs-4 fw-bold text-danger" id="cntCancelled">1</div>
                        <div class="small text-muted fw-semibold">Cancelled</div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-2 rounded-3 bg-light" onclick="filterByStatus('test')" role="button" style="cursor: pointer;">
                        <div class="fs-4 fw-bold text-info" id="cntTest">1</div>
                        <div class="small text-muted fw-semibold">test</div>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-2">
                    <div class="p-2 rounded-3 bg-light" onclick="filterByStatus('Finished')" role="button" style="cursor: pointer;">
                        <div class="fs-4 fw-bold text-success" id="cntFinished">2</div>
                        <div class="small text-muted fw-semibold">Finished</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Grouped table card ===== -->
        <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden mb-3 bg-white" id="projectsReportTableWrap">
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-file-earmark-bar-graph text-primary me-2"></i> Project Detailed Ledger</h5>
            </div>

            <!-- Table (toolbar + export + column visibility + search + show entries + pagination auto-created by datatable class via auto-master-table.js) -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 datatable font-13" id="projectReportTable" data-table-name="Projects Report">
                    <thead class="table-light">
                        <tr>
                            <th rowspan="2" style="width:60px;">S.No</th>
                            <th rowspan="2" style="width:85px;">Project Id</th>
                            <th rowspan="2" style="min-width:150px;">Project Name</th>
                            <th rowspan="2" style="min-width:140px;">Customer Name</th>
                            <th colspan="2" class="thead-group gb-cvv text-center">Planned Date</th>
                            <th colspan="2" class="thead-group gb-cvv text-center">Actual Date</th>
                            <th rowspan="2" style="min-width:100px;">Difference</th>
                            <th rowspan="2" style="min-width:105px;">% Of Complete</th>
                            <th rowspan="2" style="min-width:105px;">Working Hrs</th>
                            <th rowspan="2" style="min-width:120px;">Project Status</th>
                            <th rowspan="2" style="min-width:130px;">Staffs</th>
                            <th rowspan="2" style="width:90px;">Action</th>
                        </tr>
                        <tr>
                            <th class="thead-sub text-center" data-col-title="Planned Start Date">Start Date</th>
                            <th class="thead-sub text-center" data-col-title="Planned End Date">End Date</th>
                            <th class="thead-sub text-center" data-col-title="Actual Start Date">Start Date</th>
                            <th class="thead-sub text-center" data-col-title="Actual End Date">End Date</th>
                        </tr>
                    </thead>
                    <tbody id="reportTableBody">
                        <tr data-status="In Progress" data-quicktag="today_deadline" data-staff="KOHA" data-customer="bel" data-start-date="2026-09-04" data-end-date="2026-09-30" data-project-id="19">
                            <td class="fw-bold text-muted">1</td>
                            <td class="fw-bold text-dark">19</td>
                            <td>
                                <a href="project-dashboard.php?id=19&name=KOKA&customer=bel" class="text-decoration-none fw-bold text-dark hover-primary">
                                    KOKA
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">bel</td>
                            <td class="fw-semibold">04-09-2026</td>
                            <td class="fw-semibold">30-09-2026</td>
                            <td class="text-muted">04-09-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">25%</span>
                            </td>
                            <td class="fw-semibold">14:30</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" data-bs-toggle="tooltip" title="KOHA Staff">KOHA</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(19, 'KOKA', 'bel')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="In Progress" data-quicktag="upcoming" data-staff="ST, AD, MK, KOHA" data-customer="Sugar Test" data-start-date="2026-06-29" data-end-date="2027-06-29" data-project-id="18">
                            <td class="fw-bold text-muted">2</td>
                            <td class="fw-bold text-dark">18</td>
                            <td>
                                <a href="project-dashboard.php?id=18&name=asd&customer=Sugar Test" class="text-decoration-none fw-bold text-dark hover-primary">
                                    asd
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Sugar Test</td>
                            <td class="fw-semibold">29-06-2026</td>
                            <td class="fw-semibold">29-06-2027</td>
                            <td class="text-muted">01-07-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">40%</span>
                            </td>
                            <td class="fw-semibold">32:00</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#eab308;" title="Staff 1">ST</div><div class="badge rounded-circle p-2 text-white" style="background:#3b82f6;" title="Staff 2">AD</div><div class="badge rounded-circle p-2 text-white" style="background:#ec4899;" title="Staff 3">MK</div><div class="badge rounded-circle p-2 text-white" style="background:#8b5cf6;" title="Staff 4">KOHA</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(18, 'asd', 'Sugar Test')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="In Progress" data-quicktag="today" data-staff="AD, MK" data-customer="Zen Publications" data-start-date="2026-08-15" data-end-date="2026-11-15" data-project-id="17">
                            <td class="fw-bold text-muted">3</td>
                            <td class="fw-bold text-dark">17</td>
                            <td>
                                <a href="project-dashboard.php?id=17&name=E-Commerce Portal&customer=Zen Publications" class="text-decoration-none fw-bold text-dark hover-primary">
                                    E-Commerce Portal
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Zen Publications</td>
                            <td class="fw-semibold">15-08-2026</td>
                            <td class="fw-semibold">15-11-2026</td>
                            <td class="text-muted">15-08-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">65%</span>
                            </td>
                            <td class="fw-semibold">84:15</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#3b82f6;" title="AD">AD</div><div class="badge rounded-circle p-2 text-white" style="background:#ec4899;" title="MK">MK</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(17, 'E-Commerce Portal', 'Zen Publications')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="Finished" data-quicktag="due_passed" data-staff="KOHA, ST" data-customer="GHARUDA soft" data-start-date="2026-05-01" data-end-date="2026-09-01" data-project-id="16">
                            <td class="fw-bold text-muted">4</td>
                            <td class="fw-bold text-dark">16</td>
                            <td>
                                <a href="project-dashboard.php?id=16&name=Mobile App iOS&customer=GHARUDA soft" class="text-decoration-none fw-bold text-dark hover-primary">
                                    Mobile App iOS
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">GHARUDA soft</td>
                            <td class="fw-semibold">01-05-2026</td>
                            <td class="fw-semibold">01-09-2026</td>
                            <td class="text-muted">01-05-2026</td>
                            <td class="text-muted">10-09-2026</td>
                            <td class="text-muted">+9 days</td>
                            <td>
                                <span class="badge bg-soft-success text-success border-success-subtle border px-2 py-1 fw-bold">100%</span>
                            </td>
                            <td class="fw-semibold">120:00</td>
                            <td>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-2">Finished</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#8b5cf6;" title="KOHA">KOHA</div><div class="badge rounded-circle p-2 text-white" style="background:#eab308;" title="ST">ST</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(16, 'Mobile App iOS', 'GHARUDA soft')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="In Progress" data-quicktag="upcoming" data-staff="ST" data-customer="Hindustan Hydraulics" data-start-date="2026-07-10" data-end-date="2026-08-25" data-project-id="15">
                            <td class="fw-bold text-muted">5</td>
                            <td class="fw-bold text-dark">15</td>
                            <td>
                                <a href="project-dashboard.php?id=15&name=Payment Gateway&customer=Hindustan Hydraulics" class="text-decoration-none fw-bold text-dark hover-primary">
                                    Payment Gateway
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Hindustan Hydraulics</td>
                            <td class="fw-semibold">10-07-2026</td>
                            <td class="fw-semibold">25-08-2026</td>
                            <td class="text-muted">12-07-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">80%</span>
                            </td>
                            <td class="fw-semibold">45:30</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#eab308;" title="ST">ST</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(15, 'Payment Gateway', 'Hindustan Hydraulics')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="Finished" data-quicktag="today" data-staff="AD, MK, KOHA" data-customer="Power Spares Engineering" data-start-date="2026-06-01" data-end-date="2026-08-30" data-project-id="14">
                            <td class="fw-bold text-muted">6</td>
                            <td class="fw-bold text-dark">14</td>
                            <td>
                                <a href="project-dashboard.php?id=14&name=CRM Cloud Migration&customer=Power Spares Engineering" class="text-decoration-none fw-bold text-dark hover-primary">
                                    CRM Cloud Migration
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Power Spares Engineering</td>
                            <td class="fw-semibold">01-06-2026</td>
                            <td class="fw-semibold">30-08-2026</td>
                            <td class="text-muted">01-06-2026</td>
                            <td class="text-muted">28-08-2026</td>
                            <td class="text-muted">-2 days</td>
                            <td>
                                <span class="badge bg-soft-success text-success border-success-subtle border px-2 py-1 fw-bold">100%</span>
                            </td>
                            <td class="fw-semibold">95:45</td>
                            <td>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-2">Finished</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#3b82f6;" title="AD">AD</div><div class="badge rounded-circle p-2 text-white" style="background:#ec4899;" title="MK">MK</div><div class="badge rounded-circle p-2 text-white" style="background:#8b5cf6;" title="KOHA">KOHA</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(14, 'CRM Cloud Migration', 'Power Spares Engineering')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="Not Started" data-quicktag="today_deadline" data-staff="ST" data-customer="Prabhu photos" data-start-date="2026-09-12" data-end-date="2026-10-30" data-project-id="13">
                            <td class="fw-bold text-muted">7</td>
                            <td class="fw-bold text-dark">13</td>
                            <td>
                                <a href="project-dashboard.php?id=13&name=Inventory ERP Module&customer=Prabhu photos" class="text-decoration-none fw-bold text-dark hover-primary">
                                    Inventory ERP Module
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Prabhu photos</td>
                            <td class="fw-semibold">12-09-2026</td>
                            <td class="fw-semibold">30-10-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">0%</span>
                            </td>
                            <td class="fw-semibold">00:00</td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1 rounded-2">Not Started</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#eab308;" title="ST">ST</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(13, 'Inventory ERP Module', 'Prabhu photos')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="On Hold" data-quicktag="due_passed" data-staff="MK" data-customer="bel" data-start-date="2026-06-15" data-end-date="2026-07-15" data-project-id="12">
                            <td class="fw-bold text-muted">8</td>
                            <td class="fw-bold text-dark">12</td>
                            <td>
                                <a href="project-dashboard.php?id=12&name=Supplier Portal Integration&customer=bel" class="text-decoration-none fw-bold text-dark hover-primary">
                                    Supplier Portal Integration
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">bel</td>
                            <td class="fw-semibold">15-06-2026</td>
                            <td class="fw-semibold">15-07-2026</td>
                            <td class="text-muted">15-06-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">+45 days</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">50%</span>
                            </td>
                            <td class="fw-semibold">38:00</td>
                            <td>
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2.5 py-1 rounded-2">On Hold</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#ec4899;" title="MK">MK</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(12, 'Supplier Portal Integration', 'bel')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="In Progress" data-quicktag="upcoming" data-staff="KOHA, AD" data-customer="GHARUDA" data-start-date="2026-08-01" data-end-date="2026-11-30" data-project-id="11">
                            <td class="fw-bold text-muted">9</td>
                            <td class="fw-bold text-dark">11</td>
                            <td>
                                <a href="project-dashboard.php?id=11&name=API Microservices Engine&customer=GHARUDA" class="text-decoration-none fw-bold text-dark hover-primary">
                                    API Microservices Engine
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">GHARUDA</td>
                            <td class="fw-semibold">01-08-2026</td>
                            <td class="fw-semibold">30-11-2026</td>
                            <td class="text-muted">05-08-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">55%</span>
                            </td>
                            <td class="fw-semibold">72:20</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#8b5cf6;" title="KOHA">KOHA</div><div class="badge rounded-circle p-2 text-white" style="background:#3b82f6;" title="AD">AD</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(11, 'API Microservices Engine', 'GHARUDA')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="Not Started" data-quicktag="today" data-staff="ST, MK" data-customer="Zen Publications" data-start-date="2026-07-20" data-end-date="2026-09-10" data-project-id="10">
                            <td class="fw-bold text-muted">10</td>
                            <td class="fw-bold text-dark">10</td>
                            <td>
                                <a href="project-dashboard.php?id=10&name=HRMS Attendance Biometric&customer=Zen Publications" class="text-decoration-none fw-bold text-dark hover-primary">
                                    HRMS Attendance Biometric
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Zen Publications</td>
                            <td class="fw-semibold">20-07-2026</td>
                            <td class="fw-semibold">10-09-2026</td>
                            <td class="text-muted">20-07-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">10%</span>
                            </td>
                            <td class="fw-semibold">18:00</td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1 rounded-2">Not Started</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#eab308;" title="ST">ST</div><div class="badge rounded-circle p-2 text-white" style="background:#ec4899;" title="MK">MK</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(10, 'HRMS Attendance Biometric', 'Zen Publications')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="In Progress" data-quicktag="today_deadline" data-staff="AD" data-customer="Power Spares Engineering" data-start-date="2026-09-01" data-end-date="2026-10-15" data-project-id="9">
                            <td class="fw-bold text-muted">11</td>
                            <td class="fw-bold text-dark">9</td>
                            <td>
                                <a href="project-dashboard.php?id=9&name=Warehouse Barcode Tracking&customer=Power Spares Engineering" class="text-decoration-none fw-bold text-dark hover-primary">
                                    Warehouse Barcode Tracking
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Power Spares Engineering</td>
                            <td class="fw-semibold">01-09-2026</td>
                            <td class="fw-semibold">15-10-2026</td>
                            <td class="text-muted">01-09-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">35%</span>
                            </td>
                            <td class="fw-semibold">28:00</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#3b82f6;" title="AD">AD</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(9, 'Warehouse Barcode Tracking', 'Power Spares Engineering')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="Cancelled" data-quicktag="due_passed" data-staff="KOHA" data-customer="Sugar Test" data-start-date="2026-04-10" data-end-date="2026-06-10" data-project-id="8">
                            <td class="fw-bold text-muted">12</td>
                            <td class="fw-bold text-dark">8</td>
                            <td>
                                <a href="project-dashboard.php?id=8&name=Client Portal v2&customer=Sugar Test" class="text-decoration-none fw-bold text-dark hover-primary">
                                    Client Portal v2
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Sugar Test</td>
                            <td class="fw-semibold">10-04-2026</td>
                            <td class="fw-semibold">10-06-2026</td>
                            <td class="text-muted">10-04-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">15%</span>
                            </td>
                            <td class="fw-semibold">18:30</td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2.5 py-1 rounded-2">Cancelled</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#8b5cf6;" title="KOHA">KOHA</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(8, 'Client Portal v2', 'Sugar Test')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="In Progress" data-quicktag="upcoming" data-staff="ST, MK" data-customer="Hindustan Hydraulics" data-start-date="2026-09-05" data-end-date="2026-10-25" data-project-id="7">
                            <td class="fw-bold text-muted">13</td>
                            <td class="fw-bold text-dark">7</td>
                            <td>
                                <a href="project-dashboard.php?id=7&name=Analytics Dashboard UI&customer=Hindustan Hydraulics" class="text-decoration-none fw-bold text-dark hover-primary">
                                    Analytics Dashboard UI
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Hindustan Hydraulics</td>
                            <td class="fw-semibold">05-09-2026</td>
                            <td class="fw-semibold">25-10-2026</td>
                            <td class="text-muted">05-09-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">75%</span>
                            </td>
                            <td class="fw-semibold">52:10</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#eab308;" title="ST">ST</div><div class="badge rounded-circle p-2 text-white" style="background:#ec4899;" title="MK">MK</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(7, 'Analytics Dashboard UI', 'Hindustan Hydraulics')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="test" data-quicktag="due_passed" data-staff="AD, KOHA" data-customer="GHARUDA soft" data-start-date="2026-08-15" data-end-date="2026-09-30" data-project-id="6">
                            <td class="fw-bold text-muted">14</td>
                            <td class="fw-bold text-dark">6</td>
                            <td>
                                <a href="project-dashboard.php?id=6&name=Security Penetration Audit&customer=GHARUDA soft" class="text-decoration-none fw-bold text-dark hover-primary">
                                    Security Penetration Audit
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">GHARUDA soft</td>
                            <td class="fw-semibold">15-08-2026</td>
                            <td class="fw-semibold">30-09-2026</td>
                            <td class="text-muted">15-08-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">+17 days</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">90%</span>
                            </td>
                            <td class="fw-semibold">40:00</td>
                            <td>
                                <span class="badge bg-info-subtle text-info border border-info-subtle px-2.5 py-1 rounded-2">test</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#3b82f6;" title="AD">AD</div><div class="badge rounded-circle p-2 text-white" style="background:#8b5cf6;" title="KOHA">KOHA</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(6, 'Security Penetration Audit', 'GHARUDA soft')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                        <tr data-status="In Progress" data-quicktag="today" data-staff="MK" data-customer="Prabhu photos" data-start-date="2026-10-01" data-end-date="2026-11-15" data-project-id="5">
                            <td class="fw-bold text-muted">15</td>
                            <td class="fw-bold text-dark">5</td>
                            <td>
                                <a href="project-dashboard.php?id=5&name=DevOps Pipeline Setup&customer=Prabhu photos" class="text-decoration-none fw-bold text-dark hover-primary">
                                    DevOps Pipeline Setup
                                </a>
                            </td>
                            <td class="fw-semibold text-secondary">Prabhu photos</td>
                            <td class="fw-semibold">01-10-2026</td>
                            <td class="fw-semibold">15-11-2026</td>
                            <td class="text-muted">01-10-2026</td>
                            <td class="text-muted">--</td>
                            <td class="text-muted">--</td>
                            <td>
                                <span class="badge bg-soft-primary text-primary border-primary-subtle border px-2 py-1 fw-bold">20%</span>
                            </td>
                            <td class="fw-semibold">12:00</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <div class="badge rounded-circle p-2 text-white" style="background:#ec4899;" title="MK">MK</div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary btn-action-add" onclick="openProjectMilestoneOffcanvas(5, 'DevOps Pipeline Setup', 'Prabhu photos')" title="View Project Milestones & Breakdown">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<!-- Projects Report Filter Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="projReportFilterOffcanvas" aria-labelledby="projReportFilterOffcanvasLabel" style="width: 360px;">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2" id="projReportFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Report
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="projectReportFilterForm" onsubmit="handleReportSearch(event)">
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filterStaffMember">Staff Members</label>
                <select class="form-select select2 form-select-sm" id="filterStaffMember" onchange="updateProjReportFilterBadge()">
                    <option value="Assigned" selected>Assigned</option>
                    <option value="All">All Staff Members</option>
                    <option value="KOHA">KOHA</option>
                    <option value="ST">ST</option>
                    <option value="AD">AD</option>
                    <option value="MK">MK</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filterFromDate">From Date</label>
                <input type="date" class="form-control form-control-sm" id="filterFromDate" onchange="updateProjReportFilterBadge()">
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filterToDate">To Date</label>
                <input type="date" class="form-control form-control-sm" id="filterToDate" onchange="updateProjReportFilterBadge()">
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1">Quick Action Filter</label>
                <select class="form-select form-select-sm" id="filterQuickTagSelect" onchange="filterByQuickTag(this.value); updateProjReportFilterBadge();">
                    <option value="">All Projects</option>
                    <option value="today_deadline">Today's Deadline</option>
                    <option value="upcoming">Upcoming Projects</option>
                    <option value="today">Today's Projects</option>
                    <option value="due_passed">Due Date Passed</option>
                </select>
            </div>
            <div class="d-none">
                <button type="submit" id="projReportHiddenSubmitBtn"></button>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" onclick="resetReportFilters()">Reset</button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" onclick="document.getElementById('projReportHiddenSubmitBtn').click()">Apply Filters</button>
    </div>
</div>

</main>

<!-- PROJECT MILESTONE OFFCANVAS DRAWER -->
<div class="offcanvas offcanvas-end" style="width: min(900px, 95vw);" tabindex="-1" id="projectMilestoneOffcanvas" aria-labelledby="milestoneOffcanvasLabel">
    <div class="offcanvas-header bg-dark text-white border-bottom">
        <div>
            <h5 class="offcanvas-title fw-bold m-0" id="milestoneOffcanvasLabel">
                <i class="bi bi-diagram-3-fill me-2 text-warning"></i> Project Milestones Breakdown
            </h5>
            <div class="small opacity-90 mt-1" id="milestoneProjectSubHeader">
                Project #<span id="offcanvasProjId">19</span>: <strong id="offcanvasProjName">KOKA</strong> | Customer: <span id="offcanvasCustomerName" class="badge bg-white text-success fw-bold ms-1">bel</span>
            </div>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body p-4">
        <!-- Milestone Summary KPI Cards -->
        <div class="card border-0 bg-light rounded-3 p-3 mb-3">
            <div class="row g-3 text-center align-items-center">
                <div class="col-4 border-end">
                    <div class="text-muted small fw-bold text-uppercase">Total Milestones</div>
                    <div class="fs-4 fw-extrabold text-success" id="kpiTotalMilestones">2</div>
                </div>
                <div class="col-4 border-end">
                    <div class="text-muted small fw-bold text-uppercase">Avg % Complete</div>
                    <div class="fs-4 fw-extrabold text-primary" id="kpiAvgMilestonePct">50%</div>
                </div>
                <div class="col-4">
                    <div class="text-muted small fw-bold text-uppercase">Project Status</div>
                    <div class="mt-1" id="kpiProjectStatusPill">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Milestone Top Control Bar -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="fw-bold text-dark fs-6">
                <i class="bi bi-flag-fill me-1 text-success"></i> Milestones List
            </div>
            <button type="button" class="btn btn-sm btn-primary fw-bold rounded-3 px-3 shadow-sm" onclick="openAddMilestoneModal()">
                <i class="bi bi-plus-lg me-1"></i> Add Milestone
            </button>
        </div>

        <!-- Milestone Table (Matching User Screenshot Headers) -->
        <div class="table-responsive rounded-3 border bg-white shadow-sm">
            <table class="table table-bordered table-hover align-middle text-center mb-0">
                <thead class="table-light">
                    <tr>
                        <th rowspan="2" style="min-width: 90px;">Milestone ID</th>
                        <th rowspan="2" style="min-width: 150px;">Milestone Name</th>
                        <th colspan="2" class="text-center">Planned Date</th>
                        <th colspan="2" class="text-center">Actual Date</th>
                        <th rowspan="2">Difference</th>
                        <th rowspan="2">% Of Complete</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2" style="min-width: 80px;">Action</th>
                    </tr>
                    <tr>
                        <th style="min-width: 95px;">Start Date</th>
                        <th style="min-width: 95px;">End Date</th>
                        <th style="min-width: 95px;">Start Date</th>
                        <th style="min-width: 95px;">End Date</th>
                    </tr>
                </thead>
                <tbody id="milestoneTableBody">
                    <!-- Dynamic Milestone Rows or Empty State -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="offcanvas-footer p-3 bg-light border-top d-flex align-items-center justify-content-between">
        <span class="text-muted small fw-semibold">
            <i class="bi bi-info-circle me-1 text-primary"></i> Milestone entries logged in real-time.
        </span>
        <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-outline-secondary btn-sm fw-bold rounded-2 px-3" onclick="window.print()">
                <i class="bi bi-printer me-1"></i> Print
            </button>
            <button type="button" class="btn btn-secondary btn-sm fw-bold rounded-2 px-3" data-bs-dismiss="offcanvas">
                Close
            </button>
        </div>
    </div>
</div>

<!-- ADD NEW MILESTONE MODAL -->
<div class="modal fade" id="addMilestoneModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle me-2"></i>Create New Milestone</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="addMilestoneForm" onsubmit="saveNewMilestone(event)">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark small">Milestone Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-3 py-2 px-3 fw-medium" id="mName" required placeholder="e.g. Design Wireframes / Database Setup">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold text-dark small">Planned Start Date</label>
                            <input type="date" class="form-control rounded-3" id="mPlannedStart" value="2026-10-17">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold text-dark small">Planned End Date</label>
                            <input type="date" class="form-control rounded-3" id="mPlannedEnd" value="2026-10-31">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold text-dark small">% Of Complete</label>
                            <input type="number" class="form-control rounded-3" id="mPct" min="0" max="100" value="0">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold text-dark small">Status</label>
                            <select class="form-select rounded-3" id="mStatus">
                                <option value="In Progress" selected>In Progress</option>
                                <option value="Completed">Completed</option>
                                <option value="Not Started">Not Started</option>
                                <option value="On Hold">On Hold</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 pt-2">
                        <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fw-bold px-4 shadow-sm" style="background: linear-gradient(135deg, var(--primary, #16a34a) 0%, var(--primary-dark, #0f7a38) 100%); border: none;">Save Milestone</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Project Overview Modal -->
<div class="modal fade" id="detailedOverviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-dark text-white rounded-top-4">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-bar-chart-steps text-info me-2"></i> Detailed Project Overview
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <div class="text-muted fs-12 uppercase font-bold">Total Active Projects</div>
                            <div class="fs-2 fw-extrabold text-primary">15</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <div class="text-muted fs-12 uppercase font-bold">Avg Completion Percentage</div>
                            <div class="fs-2 fw-extrabold text-success">45.3%</div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h6 class="fw-bold mb-2">Project Performance Breakdown</h6>
                    <p class="text-muted fs-13">All project milestones, timelines, and staff productivity logged for the current period.</p>
                </div>
            </div>
            <div class="modal-footer bg-light rounded-bottom-4">
                <button type="button" class="btn btn-secondary btn-sm px-4 fw-bold" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    var currentActiveProjectId = null;
    var currentActiveProjectName = '';
    var currentActiveCustomerName = '';

    // Sample Milestones Database per Project
    var projectMilestonesData = {
        '19': [
            { id: 'MS-101', name: 'Requirement Analysis & SRS', plannedStart: '04-09-2026', plannedEnd: '15-09-2026', actualStart: '04-09-2026', actualEnd: '14-09-2026', diff: '0 days', pct: '100%', status: 'Completed' },
            { id: 'MS-102', name: 'UI / UX Prototype & Wireframing', plannedStart: '16-09-2026', plannedEnd: '30-09-2026', actualStart: '16-09-2026', actualEnd: '--', diff: '--', pct: '40%', status: 'In Progress' }
        ],
        '18': [
            { id: 'MS-201', name: 'Database Architecture Setup', plannedStart: '29-06-2026', plannedEnd: '15-07-2026', actualStart: '29-06-2026', actualEnd: '10-07-2026', diff: '0 days', pct: '100%', status: 'Completed' }
        ],
        '17': [
            { id: 'MS-301', name: 'Product Catalog & Cart API', plannedStart: '15-08-2026', plannedEnd: '30-09-2026', actualStart: '15-08-2026', actualEnd: '28-09-2026', diff: '0 days', pct: '100%', status: 'Completed' },
            { id: 'MS-302', name: 'Stripe & PayPal Integration', plannedStart: '01-10-2026', plannedEnd: '15-11-2026', actualStart: '01-10-2026', actualEnd: '--', diff: '--', pct: '50%', status: 'In Progress' }
        ]
    };

    function openProjectMilestoneOffcanvas(projId, projName, customerName) {
        currentActiveProjectId = projId;
        currentActiveProjectName = projName || 'Project';
        currentActiveCustomerName = customerName || 'Client';

        document.getElementById('offcanvasProjId').innerText = projId;
        document.getElementById('offcanvasProjName').innerText = projName;
        document.getElementById('offcanvasCustomerName').innerText = customerName;

        renderMilestonesTable(projId);

        var offcanvasEl = document.getElementById('projectMilestoneOffcanvas');
        if (offcanvasEl) {
            if (offcanvasEl.parentNode !== document.body) {
                document.body.appendChild(offcanvasEl);
            }
            var bsOffcanvas = bootstrap.Offcanvas.getOrCreateInstance(offcanvasEl);
            bsOffcanvas.show();
        }
    }

    function renderMilestonesTable(projId) {
        var tbody = document.getElementById('milestoneTableBody');
        if (!tbody) return;

        var milestones = projectMilestonesData[projId] || [];
        var totalCount = milestones.length;
        document.getElementById('kpiTotalMilestones').innerText = totalCount;

        if (totalCount === 0) {
            document.getElementById('kpiAvgMilestonePct').innerText = '0%';
            tbody.innerHTML = '<tr><td colspan="10" class="py-5 text-center text-muted bg-light fw-bold">' +
                '<i class="bi bi-folder-x display-6 text-secondary d-block mb-2"></i>' +
                '<span class="fs-6">No Milestones logged for this project yet.</span><br>' +
                '<small class="text-secondary font-normal">Click "+ Add Milestone" button above to create the first milestone entry.</small>' +
            '</td></tr>';
            return;
        }

        var totalPctSum = 0;
        var html = '';

        milestones.forEach(function(m, idx) {
            var pctVal = parseInt(m.pct) || 0;
            totalPctSum += pctVal;

            var statusBadge = '<span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>';
            if (m.status === 'Completed') {
                statusBadge = '<span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-2">Completed</span>';
            } else if (m.status === 'Not Started') {
                statusBadge = '<span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1 rounded-2">Not Started</span>';
            } else if (m.status === 'On Hold') {
                statusBadge = '<span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2.5 py-1 rounded-2">On Hold</span>';
            }

            html += '<tr>' +
                '<td class="fw-bold text-dark">' + escapeHtml(m.id) + '</td>' +
                '<td class="fw-bold text-dark text-start">' + escapeHtml(m.name) + '</td>' +
                '<td class="fw-semibold">' + escapeHtml(m.plannedStart) + '</td>' +
                '<td class="fw-semibold">' + escapeHtml(m.plannedEnd) + '</td>' +
                '<td class="text-muted">' + escapeHtml(m.actualStart) + '</td>' +
                '<td class="text-muted">' + escapeHtml(m.actualEnd) + '</td>' +
                '<td class="text-muted">' + escapeHtml(m.diff) + '</td>' +
                '<td><span class="badge bg-soft-success text-success border border-success-subtle px-2 py-1 fw-bold">' + escapeHtml(m.pct) + '</span></td>' +
                '<td>' + statusBadge + '</td>' +
                '<td>' +
                    '<button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-2 p-1" onclick="deleteMilestone(\'' + projId + '\', ' + idx + ')" title="Delete Milestone">' +
                        '<i class="bi bi-trash-fill"></i>' +
                    '</button>' +
                '</td>' +
            '</tr>';
        });

        tbody.innerHTML = html;
        var avgPct = Math.round(totalPctSum / totalCount);
        document.getElementById('kpiAvgMilestonePct').innerText = avgPct + '%';
    }

    function openAddMilestoneModal() {
        document.getElementById('addMilestoneForm').reset();
        var modalEl = document.getElementById('addMilestoneModal');
        if (modalEl) {
            if (modalEl.parentNode !== document.body) {
                document.body.appendChild(modalEl);
            }
            var bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
            bsModal.show();
        }
    }

    function saveNewMilestone(e) {
        e.preventDefault();
        var projId = currentActiveProjectId || '19';
        if (!projectMilestonesData[projId]) {
            projectMilestonesData[projId] = [];
        }

        var mName = document.getElementById('mName').value;
        var mPlannedStart = document.getElementById('mPlannedStart').value || '2026-09-01';
        var mPlannedEnd = document.getElementById('mPlannedEnd').value || '2026-09-15';
        var mPct = document.getElementById('mPct').value + '%';
        var mStatus = document.getElementById('mStatus').value;

        var newId = 'MS-' + (projectMilestonesData[projId].length + 101);

        projectMilestonesData[projId].push({
            id: newId,
            name: mName,
            plannedStart: mPlannedStart,
            plannedEnd: mPlannedEnd,
            actualStart: '--',
            actualEnd: '--',
            diff: '--',
            pct: mPct,
            status: mStatus
        });

        renderMilestonesTable(projId);

        var modalEl = document.getElementById('addMilestoneModal');
        var bsModal = bootstrap.Modal.getInstance(modalEl);
        if (bsModal) bsModal.hide();
    }

    function deleteMilestone(projId, index) {
        if (confirm('Are you sure you want to delete this milestone entry?')) {
            if (projectMilestonesData[projId]) {
                projectMilestonesData[projId].splice(index, 1);
                renderMilestonesTable(projId);
            }
        }
    }

    /* AutoMasterTable Integration for External Filtering */
    var currentQuickTag = 'all';
    var currentStatusFilter = 'All';
    var currentStaffFilter = '';
    var fromDateVal = '';
    var toDateVal = '';

    window.attendanceRowMatches = function (tr) {
        if (!tr || tr.classList.contains('no-record-row')) return true;
        if (tr.closest('#projectReportTable')) {
            var st = tr.getAttribute('data-status') || '';
            var qt = tr.getAttribute('data-quicktag') || '';
            var sf = tr.getAttribute('data-staff') || '';
            var dStart = tr.getAttribute('data-start-date') || '';
            var dEnd = tr.getAttribute('data-end-date') || '';

            if (currentQuickTag !== 'all' && qt !== currentQuickTag) return false;
            if (currentStatusFilter !== 'All' && st !== currentStatusFilter) return false;
            if (currentStaffFilter && currentStaffFilter !== 'All' && currentStaffFilter !== 'Assigned' && sf.indexOf(currentStaffFilter) === -1) return false;
            if (fromDateVal && dStart && dStart < fromDateVal) return false;
            if (toDateVal && dEnd && dEnd > toDateVal) return false;

            return true;
        }
        return true;
    };

    function triggerTableFilter() {
        var tbl = document.getElementById('projectReportTable');
        if (tbl && tbl.autoTable && typeof tbl.autoTable.render === 'function') {
            tbl.autoTable.render();
        }
    }

    
    function updateProjReportFilterBadge() {
        var count = 0;
        var staff = document.getElementById('filterStaffMember');
        if (staff && staff.value && staff.value !== 'Assigned' && staff.value !== 'All') count++;
        var fromDate = document.getElementById('filterFromDate');
        if (fromDate && fromDate.value) count++;
        var toDate = document.getElementById('filterToDate');
        if (toDate && toDate.value) count++;
        var quick = document.getElementById('filterQuickTagSelect');
        if (quick && quick.value) count++;
        var badge = document.getElementById('projReportFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            if (count > 0) badge.classList.remove('d-none');
            else badge.classList.add('d-none');
        }
    }

    function handleReportSearch(e) {
        updateProjReportFilterBadge();
        e.preventDefault();
        var staffEl = document.getElementById('filterStaffMember');
        var fromEl = document.getElementById('filterFromDate');
        var toEl = document.getElementById('filterToDate');

        currentStaffFilter = staffEl ? staffEl.value : '';
        var fv = fromEl ? fromEl.value.trim() : '';
        var tv = toEl ? toEl.value.trim() : '';
        fromDateVal = convertToIso(fv);
        toDateVal = convertToIso(tv);

        triggerTableFilter();
    }

    function convertToIso(dateStr) {
        if (!dateStr) return '';
        if (/^\d{4}-\d{2}-\d{2}$/.test(dateStr)) return dateStr;
        var parts = dateStr.split('-');
        if (parts.length === 3) {
            return parts[2] + '-' + parts[1] + '-' + parts[0];
        }
        return dateStr;
    }

    function filterByQuickTag(tag) {
        currentQuickTag = tag;
        triggerTableFilter();
    }

    function filterByStatus(status) {
        currentStatusFilter = status;
        triggerTableFilter();
    }

    function resetReportFilters() {
        var form = document.getElementById('projectReportFilterForm');
        if (form) form.reset();
        if (window.jQuery && $('#filterStaffMember').length) {
            $('#filterStaffMember').val('Assigned').trigger('change');
        }
        currentQuickTag = 'all';
        currentStatusFilter = 'All';
        currentStaffFilter = '';
        fromDateVal = '';
        toDateVal = '';
        triggerTableFilter();
        updateProjReportFilterBadge();
    }

    function openDetailedOverviewModal() {
        var modalEl = document.getElementById('detailedOverviewModal');
        if (modalEl) {
            var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    }

    function escapeHtml(text) {
        if (!text) return '';
        return String(text).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (window.jQuery && $.fn.select2) {
            $('#filterStaffMember').select2({ minimumResultsForSearch: 6 });
        }
    });
</script>

<?php include 'footer.php'; ?>