<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/lead.css">

<main class="container-fluid px-0">
    <!-- Page Header & Action Bar -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-1 page-title">Deals &amp; Opportunities</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-briefcase fs-6 text-primary"></i>
                <a href="lead.php" class="text-decoration-none text-muted">CRM</a>
                <i class="bi bi-chevron-right small text-muted"></i>
                <span class="fw-bold text-dark">Deals &amp; Sales Pipeline</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold px-3" data-bs-toggle="modal" data-bs-target="#newDealModal">
                <i class="bi bi-plus-lg"></i><span>New Deal</span>
            </button>
        </div>
    </div>

    <!-- Filter & View Switcher Bar -->
    <div class="card border shadow-sm py-2.5 px-3 mb-3 rounded-3 bg-white">
        <div class="row g-2 align-items-center">
            <!-- Search Keyword -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control border-start-0" id="filterDealSearch" placeholder="Search deal, client, product...">
                </div>
            </div>
            <!-- Filter by Sales Rep -->
            <div class="col-6 col-md-3 col-lg-2">
                <select class="form-select form-select-sm" id="filterDealRep">
                    <option value="">All Sales Reps</option>
                    <option value="Harish">Harish D.</option>
                    <option value="Divya">Divya A.</option>
                    <option value="Karthik">Karthik R.</option>
                    <option value="Priya">Priya S.</option>
                </select>
            </div>
            <!-- Filter by Brand -->
            <div class="col-6 col-md-3 col-lg-2">
                <select class="form-select form-select-sm" id="filterDealBrand">
                    <option value="">All Brands</option>
                    <option value="Gharuda Software">Gharuda Software</option>
                    <option value="PhDAssistance">PhDAssistance</option>
                    <option value="GEOCare">GEO Care</option>
                    <option value="Zen Publications">Zen Publications</option>
                </select>
            </div>
            <!-- Filter by Period -->
            <div class="col-6 col-md-2 col-lg-2">
                <select class="form-select form-select-sm" id="filterDealPeriod">
                    <option value="this-quarter">This Quarter</option>
                    <option value="this-month">This Month</option>
                    <option value="this-year">Full Year 2026</option>
                </select>
            </div>
            <!-- View Mode Switcher -->
            <div class="col-12 col-md-auto ms-auto d-flex align-items-center justify-content-end gap-2">
                <div class="btn-group btn-group-sm" role="group" id="dealViewToggle">
                    <button type="button" class="btn btn-outline-primary active px-3 fw-semibold" id="btnViewKanban" title="Kanban Pipeline Board">
                        <i class="bi bi-kanban me-1.5"></i>Kanban
                    </button>
                    <button type="button" class="btn btn-outline-primary px-3 fw-semibold" id="btnViewTable" title="Deals Table List">
                        <i class="bi bi-table me-1.5"></i>Table List
                    </button>
                </div>
                <button type="button" class="btn btn-outline-secondary btn-sm" id="resetDealFiltersBtn" title="Reset Filters">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- ==================== VIEW 1: HORIZONTAL SCROLLABLE KANBAN PIPELINE ==================== -->
    <div id="dealKanbanView" class="pb-4">
        <div class="kanban-board-scroll" id="dealsKanbanRow">
            
            <!-- Stage 1: Discovery (20%) -->
            <div class="kanban-col" data-stage-id="1" data-prob="20">
                <div class="card border shadow-sm rounded-3 bg-light h-100">
                    <div class="card-header bg-white border-bottom border-top border-3 border-primary p-3 d-flex align-items-center justify-content-between rounded-top-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-6 d-flex align-items-center gap-1.5">
                                <span class="badge rounded-circle p-1 bg-primary me-1" style="width:7px;height:7px;"></span>
                                <span>1. Discovery</span>
                            </h6>
                            <span class="text-muted small col-stat-info mt-1 d-block">&#8377;18,50,000 &middot; 2 deals</span>
                        </div>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-1 small fw-semibold">20%</span>
                    </div>
                    <div class="card-body p-2.5 d-flex flex-column gap-2.5 deal-col-body deal-col-dropzone" data-col-index="0" data-stage="Discovery">
                        <!-- Deal Card 1 -->
                        <div class="card border shadow-sm p-3 rounded-3 bg-white deal-k-card" data-deal-id="DL-101" data-val="1500000" data-client="Power Spares Engineering" data-title="CRM Cloud Migration Pack" data-rep="Harish D." data-stage="Discovery" data-prob="20" data-close="20-Mar-2026" data-brand="Gharuda Software" role="button">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-0.5 small">Enterprise</span>
                                <span class="fw-bold text-dark fs-6">&#8377;15,00,000</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 deal-title-link">CRM Cloud Migration Pack</h6>
                            <span class="text-muted small d-block mb-2 text-truncate"><i class="bi bi-building me-1 text-secondary"></i>Power Spares Engineering</span>
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                                <span><i class="bi bi-calendar3 me-1"></i>Close: 20-Mar</span>
                                <span class="badge rounded-circle bg-primary text-white p-1 px-2" title="Harish D.">H</span>
                            </div>
                        </div>

                        <!-- Deal Card 2 -->
                        <div class="card border shadow-sm p-3 rounded-3 bg-white deal-k-card" data-deal-id="DL-102" data-val="350000" data-client="Anand Associates" data-title="Website ERP Portal Revamp" data-rep="Divya A." data-stage="Discovery" data-prob="20" data-close="28-Mar-2026" data-brand="PhDAssistance" role="button">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2 py-0.5 small">SME</span>
                                <span class="fw-bold text-dark fs-6">&#8377;3,50,000</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 deal-title-link">Website ERP Portal Revamp</h6>
                            <span class="text-muted small d-block mb-2 text-truncate"><i class="bi bi-building me-1 text-secondary"></i>Anand Associates</span>
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                                <span><i class="bi bi-calendar3 me-1"></i>Close: 28-Mar</span>
                                <span class="badge rounded-circle bg-info text-white p-1 px-2" title="Divya A.">D</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stage 2: Demo & Evaluation (40%) -->
            <div class="kanban-col" data-stage-id="2" data-prob="40">
                <div class="card border shadow-sm rounded-3 bg-light h-100">
                    <div class="card-header bg-white border-bottom border-top border-3 border-info p-3 d-flex align-items-center justify-content-between rounded-top-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-6 d-flex align-items-center gap-1.5">
                                <span class="badge rounded-circle p-1 bg-info me-1" style="width:7px;height:7px;"></span>
                                <span>2. Demo &amp; Eval</span>
                            </h6>
                            <span class="text-muted small col-stat-info mt-1 d-block">&#8377;18,50,000 &middot; 2 deals</span>
                        </div>
                        <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2 py-1 small fw-semibold">40%</span>
                    </div>
                    <div class="card-body p-2.5 d-flex flex-column gap-2.5 deal-col-body deal-col-dropzone" data-col-index="1" data-stage="Demo &amp; Eval">
                        <!-- Deal Card 3 -->
                        <div class="card border shadow-sm p-3 rounded-3 bg-white deal-k-card" data-deal-id="DL-103" data-val="1200000" data-client="Hindustan Hydraulics" data-title="Annual AMC &amp; Tech SLA" data-rep="Karthik R." data-stage="Demo &amp; Eval" data-prob="40" data-close="15-Mar-2026" data-brand="Gharuda Software" role="button">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2 py-0.5 small">Urgent</span>
                                <span class="fw-bold text-dark fs-6">&#8377;12,00,000</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 deal-title-link">Annual AMC &amp; Tech SLA</h6>
                            <span class="text-muted small d-block mb-2 text-truncate"><i class="bi bi-building me-1 text-secondary"></i>Hindustan Hydraulics</span>
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                                <span><i class="bi bi-calendar3 me-1"></i>Close: 15-Mar</span>
                                <span class="badge rounded-circle bg-success text-white p-1 px-2" title="Karthik R.">K</span>
                            </div>
                        </div>

                        <!-- Deal Card 4 -->
                        <div class="card border shadow-sm p-3 rounded-3 bg-white deal-k-card" data-deal-id="DL-104" data-val="650000" data-client="Kumar &amp; Sons" data-title="Inventory Barcode Add-on" data-rep="Priya S." data-stage="Demo &amp; Eval" data-prob="40" data-close="22-Mar-2026" data-brand="GEOCare" role="button">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-0.5 small">Software</span>
                                <span class="fw-bold text-dark fs-6">&#8377;6,50,000</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 deal-title-link">Inventory Barcode Add-on</h6>
                            <span class="text-muted small d-block mb-2 text-truncate"><i class="bi bi-building me-1 text-secondary"></i>Kumar &amp; Sons</span>
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                                <span><i class="bi bi-calendar3 me-1"></i>Close: 22-Mar</span>
                                <span class="badge rounded-circle bg-warning text-dark p-1 px-2" title="Priya S.">P</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stage 3: Proposal Sent (60%) -->
            <div class="kanban-col" data-stage-id="3" data-prob="60">
                <div class="card border shadow-sm rounded-3 bg-light h-100">
                    <div class="card-header bg-white border-bottom border-top border-3 border-warning p-3 d-flex align-items-center justify-content-between rounded-top-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-6 d-flex align-items-center gap-1.5">
                                <span class="badge rounded-circle p-1 bg-warning me-1" style="width:7px;height:7px;"></span>
                                <span>3. Proposal Sent</span>
                            </h6>
                            <span class="text-muted small col-stat-info mt-1 d-block">&#8377;8,90,000 &middot; 1 deal</span>
                        </div>
                        <span class="badge bg-warning-subtle text-dark border border-warning-subtle rounded-pill px-2 py-1 small fw-semibold">60%</span>
                    </div>
                    <div class="card-body p-2.5 d-flex flex-column gap-2.5 deal-col-body deal-col-dropzone" data-col-index="2" data-stage="Proposal Sent">
                        <!-- Deal Card 5 -->
                        <div class="card border shadow-sm p-3 rounded-3 bg-white deal-k-card" data-deal-id="DL-105" data-val="890000" data-client="Zen Publications" data-title="Digital Journal Publishing Engine" data-rep="Harish D." data-stage="Proposal Sent" data-prob="60" data-close="10-Mar-2026" data-brand="Zen Publications" role="button">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-0.5 small">Quote #089</span>
                                <span class="fw-bold text-dark fs-6">&#8377;8,90,000</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 deal-title-link">Digital Journal Publishing Engine</h6>
                            <span class="text-muted small d-block mb-2 text-truncate"><i class="bi bi-building me-1 text-secondary"></i>Zen Publications</span>
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                                <span><i class="bi bi-calendar3 me-1"></i>Close: 10-Mar</span>
                                <span class="badge rounded-circle bg-primary text-white p-1 px-2" title="Harish D.">H</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stage 4: Negotiation (80%) -->
            <div class="kanban-col" data-stage-id="4" data-prob="80">
                <div class="card border shadow-sm rounded-3 bg-light h-100">
                    <div class="card-header bg-white border-bottom border-top border-3 border-secondary p-3 d-flex align-items-center justify-content-between rounded-top-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-0 fs-6 d-flex align-items-center gap-1.5">
                                <span class="badge rounded-circle p-1 bg-secondary me-1" style="width:7px;height:7px;"></span>
                                <span>4. Negotiation</span>
                            </h6>
                            <span class="text-muted small col-stat-info mt-1 d-block">&#8377;6,20,000 &middot; 1 deal</span>
                        </div>
                        <span class="badge bg-secondary-subtle text-dark border border-secondary-subtle rounded-pill px-2 py-1 small fw-semibold">80%</span>
                    </div>
                    <div class="card-body p-2.5 d-flex flex-column gap-2.5 deal-col-body deal-col-dropzone" data-col-index="3" data-stage="Negotiation">
                        <!-- Deal Card 6 -->
                        <div class="card border shadow-sm p-3 rounded-3 bg-white deal-k-card" data-deal-id="DL-106" data-val="620000" data-client="Lakshmi Pharma" data-title="Mobile App iOS &amp; Android" data-rep="Divya A." data-stage="Negotiation" data-prob="80" data-close="05-Mar-2026" data-brand="Gharuda Software" role="button">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-warning-subtle text-dark border border-warning-subtle rounded-pill px-2 py-0.5 small">Terms Review</span>
                                <span class="fw-bold text-dark fs-6">&#8377;6,20,000</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 deal-title-link">Mobile App iOS &amp; Android</h6>
                            <span class="text-muted small d-block mb-2 text-truncate"><i class="bi bi-building me-1 text-secondary"></i>Lakshmi Pharma</span>
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                                <span><i class="bi bi-calendar3 me-1"></i>Close: 05-Mar</span>
                                <span class="badge rounded-circle bg-info text-white p-1 px-2" title="Divya A.">D</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stage 5: Closed Won (100%) -->
            <div class="kanban-col" data-stage-id="5" data-prob="100">
                <div class="card border shadow-sm rounded-3 bg-light h-100">
                    <div class="card-header bg-white border-bottom border-top border-3 border-success p-3 d-flex align-items-center justify-content-between rounded-top-3">
                        <div>
                            <h6 class="fw-bold text-success mb-0 fs-6 d-flex align-items-center gap-1.5">
                                <i class="bi bi-trophy-fill me-1"></i>
                                <span>5. Closed Won</span>
                            </h6>
                            <span class="text-muted small col-stat-info mt-1 d-block">&#8377;7,50,000 &middot; 1 deal</span>
                        </div>
                        <span class="badge bg-success text-white border border-success rounded-pill px-2 py-1 small fw-semibold">100%</span>
                    </div>
                    <div class="card-body p-2.5 d-flex flex-column gap-2.5 deal-col-body deal-col-dropzone" data-col-index="4" data-stage="Closed Won">
                        <!-- Deal Card 7 -->
                        <div class="card border border-success-subtle shadow-sm p-3 rounded-3 bg-white deal-k-card" data-deal-id="DL-107" data-val="750000" data-client="Gharuda Software" data-title="API Microservices Gateway" data-rep="Harish D." data-stage="Closed Won" data-prob="100" data-close="Won Today" data-brand="Gharuda Software" role="button">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-success text-white rounded-pill px-2 py-0.5 small"><i class="bi bi-check2"></i> Won</span>
                                <span class="fw-bold text-success fs-6">&#8377;7,50,000</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 deal-title-link">API Microservices Gateway</h6>
                            <span class="text-muted small d-block mb-2 text-truncate"><i class="bi bi-building me-1 text-secondary"></i>Gharuda Software</span>
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                                <span><i class="bi bi-calendar3 me-1"></i>Won: Today</span>
                                <span class="badge rounded-circle bg-success text-white p-1 px-2" title="Harish D.">H</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stage 6: Closed Lost (0%) -->
            <div class="kanban-col" data-stage-id="6" data-prob="0">
                <div class="card border shadow-sm rounded-3 bg-light h-100">
                    <div class="card-header bg-white border-bottom border-top border-3 border-danger p-3 d-flex align-items-center justify-content-between rounded-top-3">
                        <div>
                            <h6 class="fw-bold text-danger mb-0 fs-6 d-flex align-items-center gap-1.5">
                                <i class="bi bi-x-circle-fill me-1"></i>
                                <span>6. Closed Lost</span>
                            </h6>
                            <span class="text-muted small col-stat-info mt-1 d-block">&#8377;4,20,000 &middot; 1 deal</span>
                        </div>
                        <span class="badge bg-danger text-white border border-danger rounded-pill px-2 py-1 small fw-semibold">0%</span>
                    </div>
                    <div class="card-body p-2.5 d-flex flex-column gap-2.5 deal-col-body deal-col-dropzone" data-col-index="5" data-stage="Closed Lost">
                        <!-- Deal Card 8 -->
                        <div class="card border border-danger-subtle shadow-sm p-3 rounded-3 bg-white opacity-75 deal-k-card" data-deal-id="DL-108" data-val="420000" data-client="Kalyan Steels" data-title="Legacy ERP Integration" data-rep="Ramesh V." data-stage="Closed Lost" data-prob="0" data-close="28-Feb-2026" data-brand="Gharuda Software" role="button">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2 py-0.5 small"><i class="bi bi-x"></i> Lost</span>
                                <span class="fw-bold text-muted text-decoration-line-through fs-6">&#8377;4,20,000</span>
                            </div>
                            <h6 class="fw-bold text-dark mb-1 deal-title-link">Legacy ERP Integration</h6>
                            <span class="text-muted small d-block mb-1 text-truncate"><i class="bi bi-building me-1 text-secondary"></i>Kalyan Steels</span>
                            <span class="badge bg-light text-danger border border-danger-subtle small mb-2 d-inline-block text-truncate"><i class="bi bi-info-circle me-1"></i>Budget Constraint</span>
                            <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                                <span><i class="bi bi-calendar3 me-1"></i>Lost: 28-Feb</span>
                                <span class="badge rounded-circle bg-secondary text-white p-1 px-2" title="Ramesh V.">R</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ==================== VIEW 2: DEALS TABLE LIST ==================== -->
    <div id="dealTableView" class="d-none pb-4">
        <div class="card border shadow-sm rounded-3 bg-white overflow-hidden">
            <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
                <div class="d-flex align-items-center gap-2">
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-list-check me-2 text-primary"></i>All Deals &amp; Opportunities</h6>
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-2.5 py-1" id="tableDealsCountBadge">7 Deals</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold" id="exportDealsCsvBtn">
                        <i class="bi bi-download"></i><span>Export CSV</span>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="dealsDataTable">
                    <thead class="table-light text-muted small text-uppercase">
                        <tr>
                            <th class="ps-4">Deal ID</th>
                            <th>Deal Title</th>
                            <th>Client / Account</th>
                            <th>Pipeline Stage</th>
                            <th>Deal Value</th>
                            <th>Probability</th>
                            <th>Weighted Value</th>
                            <th>Expected Close</th>
                            <th>Owner</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="dealsTableBody">
                        <!-- Populated by JavaScript renderTableView() -->
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white border-top py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <span class="text-muted small" id="tableSummaryText">Showing all opportunities</span>
                <nav aria-label="Table pagination">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>

<!-- ==================== MODAL: CREATE NEW DEAL ==================== -->
<div class="modal fade" id="newDealModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom bg-light bg-opacity-50 py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-circle bg-primary-subtle text-primary d-inline-flex"><i class="bi bi-briefcase-fill fs-5"></i></span>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0">Create New Deal / Opportunity</h5>
                        <div class="small text-muted">Register a qualified commercial deal into the sales pipeline</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="newDealForm" onsubmit="return false;">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold small text-dark">Deal Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ndTitle" placeholder="e.g. Enterprise Cloud ERP &amp; POS Setup" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-dark">Brand / Entity <span class="text-danger">*</span></label>
                            <select class="form-select" id="ndBrand">
                                <option value="Gharuda Software" selected>Gharuda Software</option>
                                <option value="PhDAssistance">PhDAssistance</option>
                                <option value="GEOCare">GEO Care</option>
                                <option value="Zen Publications">Zen Publications</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-dark">Client / Lead Account <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ndClient" placeholder="e.g. Power Spares Engineering" list="existingClientsList" required>
                            <datalist id="existingClientsList">
                                <option value="Power Spares Engineering">
                                <option value="Zen Publications">
                                <option value="Hindustan Hydraulics">
                                <option value="Lakshmi Pharma">
                                <option value="Anand Associates">
                                <option value="Kumar &amp; Sons">
                                <option value="Vetri Constructions">
                            </datalist>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-dark">Deal Value (&#8377;) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">&#8377;</span>
                                <input type="number" class="form-control" id="ndAmount" placeholder="500000" min="1000" step="500" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-dark">Initial Stage</label>
                            <select class="form-select" id="ndStage">
                                <option value="1" data-prob="20" selected>1. Discovery (20%)</option>
                                <option value="2" data-prob="40">2. Demo &amp; Eval (40%)</option>
                                <option value="3" data-prob="60">3. Proposal Sent (60%)</option>
                                <option value="4" data-prob="80">4. Negotiation (80%)</option>
                                <option value="5" data-prob="100">5. Closed Won (100%)</option>
                                <option value="6" data-prob="0">6. Closed Lost (0%)</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-dark">Expected Close Date</label>
                            <input type="date" class="form-control" id="ndCloseDate" value="<?php echo date('Y-m-d', strtotime('+14 days')); ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-dark">Sales Representative</label>
                            <select class="form-select" id="ndRep">
                                <option value="Harish D." selected>Harish D.</option>
                                <option value="Divya A.">Divya A.</option>
                                <option value="Karthik R.">Karthik R.</option>
                                <option value="Priya S.">Priya S.</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold small text-dark">Opportunity Scope &amp; Commercial Notes</label>
                            <textarea class="form-control" id="ndNotes" rows="2" placeholder="Key deliverables, budget constraints, technical specs or timeline..."></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light py-3 px-4">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary fw-semibold px-4" id="saveNewDealBtn">
                    <i class="bi bi-check2-circle me-1"></i>Save Opportunity
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== MODAL: INTERACTIVE DEAL DETAIL VIEW ==================== -->
<div class="modal fade" id="dealDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom bg-light py-3 px-4">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary text-white" id="ddIdBadge">DL-101</span>
                    <h5 class="modal-title fw-bold text-dark mb-0" id="ddTitleHeading">Deal Details</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Commercial Highlights Card -->
                <div class="p-3 bg-light rounded-3 mb-3 border d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div>
                        <span class="text-muted small d-block">Account / Client:</span>
                        <h5 class="fw-bold text-dark mb-0" id="ddClientName">Power Spares Engineering</h5>
                    </div>
                    <div class="text-md-end">
                        <span class="text-muted small d-block">Deal Value:</span>
                        <h4 class="fw-bold text-primary mb-0" id="ddDealAmount">&#8377;15,00,000</h4>
                    </div>
                </div>

                <!-- Stage Progress Strip -->
                <div class="mb-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <label class="form-label fw-semibold small text-dark mb-0">Pipeline Progress</label>
                        <span class="badge bg-primary-subtle text-primary fw-bold" id="ddStageBadge">Discovery (20%)</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-primary" role="progressbar" id="ddProgressBar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <!-- Quick Change Stage Selector -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-dark">Move Pipeline Stage</label>
                        <select class="form-select form-select-sm" id="ddStageSelect">
                            <option value="Discovery">1. Discovery (20%)</option>
                            <option value="Demo &amp; Eval">2. Demo &amp; Eval (40%)</option>
                            <option value="Proposal Sent">3. Proposal Sent (60%)</option>
                            <option value="Negotiation">4. Negotiation (80%)</option>
                            <option value="Closed Won">5. Closed Won (100%)</option>
                            <option value="Closed Lost">6. Closed Lost (0%)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-dark">Expected Close Date</label>
                        <input type="text" class="form-control form-control-sm" id="ddCloseDate" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-dark">Sales Owner</label>
                        <input type="text" class="form-control form-control-sm" id="ddOwner" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-dark">Brand / Portfolio</label>
                        <input type="text" class="form-control form-control-sm" id="ddBrand" readonly>
                    </div>
                </div>

                <!-- Action CTAs: Direct ERP / Quotation Downstream -->
                <div class="card border rounded-3 p-3 bg-light-subtle">
                    <span class="fw-semibold small text-dark d-block mb-2"><i class="bi bi-lightning-charge text-warning me-1"></i>Next Downstream Actions</span>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="button" class="btn btn-outline-primary btn-sm" id="ddBtnCreateQuote">
                            <i class="bi bi-file-earmark-text me-1"></i>Create Quotation
                        </button>
                        <button type="button" class="btn btn-outline-success btn-sm" id="ddBtnCreateSO">
                            <i class="bi bi-bag-check me-1"></i>Generate Sales Order
                        </button>
                        <button type="button" class="btn btn-outline-info btn-sm" id="ddBtnCreateProject">
                            <i class="bi bi-briefcase me-1"></i>Launch Project
                        </button>
                        <button type="button" class="btn btn-success btn-sm ms-auto" id="ddBtnMarkWon">
                            <i class="bi bi-trophy me-1"></i>Mark Closed Won
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light py-2 px-4">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm fw-semibold" id="ddBtnSaveStage">Update Stage</button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== MODAL: STRICT DEAL WON VERIFICATION GATE ==================== -->
<div class="modal fade" id="dealWonVerificationModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header bg-success-subtle border-bottom py-3 px-4">
                <h5 class="modal-title fw-bold text-success d-flex align-items-center gap-2">
                    <i class="bi bi-trophy-fill"></i> Deal Won Governance Gate
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="p-3 bg-light rounded-3 mb-3 border">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted small">Account:</span>
                        <strong class="text-dark" id="wonClientName">-</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Deal Value:</span>
                        <strong class="text-success fs-5" id="wonDealAmount">&#8377;0</strong>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-dark">Commercial Verification <span class="text-danger">*</span></label>
                    <div class="form-check p-2 bg-white rounded border">
                        <input class="form-check-input ms-0 me-2" type="checkbox" id="wonQuoteAttached" checked>
                        <label class="form-check-label small fw-semibold" for="wonQuoteAttached">
                            Valid approved quotation or signed SLA contract confirmed
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-dark">Next Automated ERP Action</label>
                    <select class="form-select" id="wonNextActionSelect">
                        <option value="so" selected>1. Create Sales Order (SO) &amp; Reserve Inventory</option>
                        <option value="invoice">2. Direct Tax Invoice (Services / Cloud Licensing)</option>
                        <option value="stay">3. Mark Won Only (Hold for Client Purchase Order)</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer bg-light py-2 px-4">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success btn-sm fw-bold px-3" onclick="confirmDealWonAction()">
                    <i class="bi bi-check2-circle me-1"></i>Confirm &amp; Close Won
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== MODAL: STRICT DEAL LOST REASON CAPTURE ==================== -->
<div class="modal fade" id="dealLostReasonModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header bg-danger-subtle border-bottom py-3 px-4">
                <h5 class="modal-title fw-bold text-danger d-flex align-items-center gap-2">
                    <i class="bi bi-x-circle-fill"></i> Closed Lost Reason Required
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <p class="small text-muted mb-3">Enterprise CRM governance requires recording a root-cause for losing <strong id="lostClientName">-</strong>.</p>
                <div class="mb-3">
                    <label class="form-label fw-bold small text-dark">Loss Reason Category <span class="text-danger">*</span></label>
                    <select class="form-select" id="lostReasonSelect" required>
                        <option value="">-- Choose Reason --</option>
                        <option value="pricing">Competitor Won on Lower Price</option>
                        <option value="features">Product Features / Technical Gap</option>
                        <option value="budget">Client Budget Cut / Delayed Indefinitely</option>
                        <option value="timing">Decision Postponed (Recycle to Lead Nurture)</option>
                        <option value="unresponsive">Client Non-responsive / Contact Left</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small text-dark">Winning Competitor (Optional)</label>
                    <input type="text" class="form-control form-control-sm" id="lostCompetitorInput" placeholder="e.g. Competitor X / Internal Build">
                </div>
                <div class="mb-2">
                    <label class="form-label fw-bold small text-dark">Loss Retrospective Notes</label>
                    <textarea class="form-control form-control-sm" rows="2" placeholder="Key takeaways for product &amp; sales management..."></textarea>
                </div>
            </div>
            <div class="modal-footer bg-light py-2 px-4">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger btn-sm fw-bold px-3" onclick="confirmDealLostAction()">
                    <i class="bi bi-check2 me-1"></i>Record Loss &amp; Close Deal
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== JAVASCRIPT: DEAL ENGINE ==================== -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var colBodies = document.querySelectorAll('.deal-col-body');
    var draggedCard = null;
    var currentActiveDealCard = null;

    function parseRupees(str) {
        return Number(String(str || '').replace(/[^0-9]/g, '')) || 0;
    }

    function formatRupees(num) {
        return '₹' + Number(num || 0).toLocaleString('en-IN');
    }

    function getStageProb(stageName) {
        switch (stageName) {
            case 'Discovery': return 20;
            case 'Demo & Eval': return 40;
            case 'Proposal Sent': return 60;
            case 'Negotiation': return 80;
            case 'Closed Won': return 100;
            default: return 0;
        }
    }

    // Update Kanban Column totals and Top KPI summaries
    function updateMetrics() {
        var totalPipeline = 0;
        var weightedForecast = 0;
        var wonTotal = 0;
        var activeDealCount = 0;

        colBodies.forEach(function (colBody) {
            var cards = Array.prototype.slice.call(colBody.querySelectorAll('.deal-k-card')).filter(function (c) {
                return !c.classList.contains('d-none');
            });
            var sum = 0;
            var stage = colBody.getAttribute('data-stage') || 'Discovery';
            var prob = getStageProb(stage);

            cards.forEach(function (c) {
                var val = parseRupees(c.getAttribute('data-val'));
                sum += val;
                if (stage !== 'Closed Lost') {
                    totalPipeline += val;
                    weightedForecast += Math.round(val * (prob / 100));
                    activeDealCount++;
                }
                if (stage === 'Closed Won') {
                    wonTotal += val;
                }
            });

            var headerSub = colBody.parentElement.querySelector('.col-stat-info');
            if (headerSub) {
                headerSub.innerHTML = formatRupees(sum) + ' &middot; ' + cards.length + (cards.length === 1 ? ' deal' : ' deals');
            }
        });

        // Update Top Strip
        var kpiTotal = document.getElementById('kpiTotalVal');
        var kpiForecast = document.getElementById('kpiForecastVal');
        var kpiWon = document.getElementById('kpiWonVal');
        var kpiActive = document.getElementById('kpiActiveDealsCount');
        var topBadge = document.getElementById('topPipelineBadge');

        if (kpiTotal) kpiTotal.textContent = formatRupees(totalPipeline);
        if (kpiForecast) kpiForecast.textContent = formatRupees(weightedForecast);
        if (kpiWon) kpiWon.textContent = formatRupees(wonTotal);
        if (kpiActive) kpiActive.textContent = activeDealCount;
        if (topBadge) topBadge.innerHTML = '<i class="bi bi-currency-rupee me-1"></i>' + (totalPipeline / 100000).toFixed(1) + ' Lakh Total Pipeline';

        // Synchronize Table View
        renderTableView();
    }

    // Enhance individual card with drag & clean single-line quick actions
    function enhanceCard(card) {
        if (card.classList.contains('enhanced-card')) return;
        card.classList.add('enhanced-card');
        card.setAttribute('draggable', 'true');

        var val = parseRupees(card.getAttribute('data-val'));
        var clientName = card.getAttribute('data-client') || 'Client Account';
        var dealTitle = card.getAttribute('data-title') || 'Enterprise Opportunity';
        var encClient = encodeURIComponent(clientName);

        // Quick ERP action strip - Single clean line using Bootstrap 5 utility classes
        if (!card.querySelector('.deal-quick-actions')) {
            var actBar = document.createElement('div');
            actBar.className = 'deal-quick-actions d-flex align-items-center justify-content-between pt-2 mt-2 border-top';
            actBar.innerHTML =
                '<div class="d-flex align-items-center gap-1">' +
                    '<a href="quotations.php?client=' + encClient + '" class="btn btn-sm btn-outline-primary py-0 px-2 fw-semibold small text-decoration-none" title="Create Quotation"><i class="bi bi-file-earmark-text me-1"></i>Quote</a>' +
                    '<a href="sales-order-create.php?client=' + encClient + '&amount=' + val + '" class="btn btn-sm btn-outline-success py-0 px-2 fw-semibold small text-decoration-none" title="Create Sales Order"><i class="bi bi-bag-check me-1"></i>SO</a>' +
                '</div>' +
                '<button type="button" class="btn btn-sm btn-light border py-0 px-2 text-muted btn-open-detail" title="View Opportunity Details"><i class="bi bi-eye"></i></button>';
            card.appendChild(actBar);
        }

        // Open Detail Modal on Card Click
        card.addEventListener('click', function (e) {
            if (e.target.closest('a') || e.target.closest('select')) return;
            openDealDetail(card);
        });

        // Drag start & end
        card.addEventListener('dragstart', function (e) {
            draggedCard = card;
            card.classList.add('opacity-50');
            e.dataTransfer.effectAllowed = 'move';
        });
        card.addEventListener('dragend', function () {
            card.classList.remove('opacity-50');
            draggedCard = null;
            colBodies.forEach(function (cb) { cb.classList.remove('drag-hover'); });
            updateMetrics();
        });
    }

    // Open Deal Detail Modal
    function openDealDetail(card) {
        currentActiveDealCard = card;
        var dealId = card.getAttribute('data-deal-id') || 'DL-101';
        var title = card.getAttribute('data-title') || 'Enterprise Opportunity';
        var client = card.getAttribute('data-client') || 'Client Account';
        var val = parseRupees(card.getAttribute('data-val'));
        var stage = card.getAttribute('data-stage') || 'Discovery';
        var prob = card.getAttribute('data-prob') || '20';
        var closeDate = card.getAttribute('data-close') || '14 Days';
        var rep = card.getAttribute('data-rep') || 'Harish D.';
        var brand = card.getAttribute('data-brand') || 'Gharuda Software';

        document.getElementById('ddIdBadge').textContent = dealId;
        document.getElementById('ddTitleHeading').textContent = title;
        document.getElementById('ddClientName').textContent = client;
        document.getElementById('ddDealAmount').textContent = formatRupees(val);
        document.getElementById('ddStageBadge').textContent = stage + ' (' + prob + '%)';
        document.getElementById('ddProgressBar').style.width = prob + '%';
        document.getElementById('ddProgressBar').setAttribute('aria-valuenow', prob);
        document.getElementById('ddCloseDate').value = closeDate;
        document.getElementById('ddOwner').value = rep;
        document.getElementById('ddBrand').value = brand;

        var stageSelect = document.getElementById('ddStageSelect');
        if (stageSelect) stageSelect.value = stage;

        var modal = new bootstrap.Modal(document.getElementById('dealDetailModal'));
        modal.show();
    }

    // Drag and Drop Handling on Columns
    var pendingDropCard = null;
    var pendingTargetCol = null;

    colBodies.forEach(function (colBody, colIndex) {
        Array.prototype.slice.call(colBody.children).forEach(enhanceCard);

        colBody.addEventListener('dragover', function (e) {
            e.preventDefault();
            e.dataTransfer.dropEffect = 'move';
            colBody.classList.add('drag-hover');
        });
        colBody.addEventListener('dragleave', function () {
            colBody.classList.remove('drag-hover');
        });
        colBody.addEventListener('drop', function (e) {
            e.preventDefault();
            colBody.classList.remove('drag-hover');
            if (!draggedCard) return;

            var targetStage = colBody.getAttribute('data-stage');
            // Column index 4: Closed Won
            if (colIndex === 4) {
                pendingDropCard = draggedCard;
                pendingTargetCol = colBody;
                var clientName = draggedCard.getAttribute('data-client') || 'Client';
                var dealVal = draggedCard.getAttribute('data-val') || '0';
                document.getElementById('wonClientName').textContent = clientName;
                document.getElementById('wonDealAmount').textContent = formatRupees(dealVal);
                var wonModal = new bootstrap.Modal(document.getElementById('dealWonVerificationModal'));
                wonModal.show();
                return;
            }

            // Column index 5: Closed Lost
            if (colIndex === 5) {
                pendingDropCard = draggedCard;
                pendingTargetCol = colBody;
                var clientNameLost = draggedCard.getAttribute('data-client') || 'Client';
                document.getElementById('lostClientName').textContent = clientNameLost;
                var lostModal = new bootstrap.Modal(document.getElementById('dealLostReasonModal'));
                lostModal.show();
                return;
            }

            // Normal stage move
            draggedCard.setAttribute('data-stage', targetStage);
            draggedCard.setAttribute('data-prob', getStageProb(targetStage));
            colBody.appendChild(draggedCard);
            updateMetrics();
        });
    });

    // Governance: Confirm Won
    window.confirmDealWonAction = function () {
        if (!pendingDropCard || !pendingTargetCol) return;
        var quoteCheck = document.getElementById('wonQuoteAttached');
        if (quoteCheck && !quoteCheck.checked) {
            alert('Cannot mark as Won without verifying an approved Quotation or Commercial Contract.');
            return;
        }
        var nextAction = document.getElementById('wonNextActionSelect').value;
        pendingDropCard.setAttribute('data-stage', 'Closed Won');
        pendingDropCard.setAttribute('data-prob', 100);
        pendingTargetCol.appendChild(pendingDropCard);
        updateMetrics();

        var client = pendingDropCard.getAttribute('data-client') || 'Client';
        var val = pendingDropCard.getAttribute('data-val') || '0';
        bootstrap.Modal.getInstance(document.getElementById('dealWonVerificationModal')).hide();

        if (nextAction === 'so') {
            window.location.href = 'sales-order-create.php?client=' + encodeURIComponent(client) + '&amount=' + val;
        } else if (nextAction === 'invoice') {
            window.location.href = 'invoice-create.php?client=' + encodeURIComponent(client) + '&amount=' + val;
        }
        pendingDropCard = null;
        pendingTargetCol = null;
    };

    // Governance: Confirm Lost
    window.confirmDealLostAction = function () {
        if (!pendingDropCard || !pendingTargetCol) return;
        var reason = document.getElementById('lostReasonSelect').value;
        if (!reason) {
            alert('Please select a mandatory Loss Reason before closing this deal as Lost.');
            return;
        }
        pendingDropCard.setAttribute('data-stage', 'Closed Lost');
        pendingDropCard.setAttribute('data-prob', 0);
        pendingTargetCol.appendChild(pendingDropCard);
        updateMetrics();
        bootstrap.Modal.getInstance(document.getElementById('dealLostReasonModal')).hide();
        pendingDropCard = null;
        pendingTargetCol = null;
    };

    // Update Stage from Detail Modal
    var btnSaveStage = document.getElementById('ddBtnSaveStage');
    if (btnSaveStage) {
        btnSaveStage.addEventListener('click', function () {
            if (!currentActiveDealCard) return;
            var newStage = document.getElementById('ddStageSelect').value;
            var targetCol = null;

            colBodies.forEach(function (col) {
                if (col.getAttribute('data-stage') === newStage) targetCol = col;
            });

            if (targetCol) {
                currentActiveDealCard.setAttribute('data-stage', newStage);
                currentActiveDealCard.setAttribute('data-prob', getStageProb(newStage));
                targetCol.prepend(currentActiveDealCard);
                updateMetrics();
            }
            bootstrap.Modal.getInstance(document.getElementById('dealDetailModal')).hide();
        });
    }

    // Save New Deal
    var saveBtn = document.getElementById('saveNewDealBtn');
    if (saveBtn) {
        saveBtn.addEventListener('click', function () {
            var title = document.getElementById('ndTitle').value.trim();
            var client = document.getElementById('ndClient').value.trim();
            var amount = Number(document.getElementById('ndAmount').value) || 0;
            var stageSelect = document.getElementById('ndStage');
            var stageIdx = Number(stageSelect.value) - 1;
            var stageName = stageSelect.options[stageSelect.selectedIndex].text.split('(')[0].replace(/^\d+\.\s*/, '').trim();
            var prob = Number(stageSelect.options[stageSelect.selectedIndex].getAttribute('data-prob')) || 20;
            var closeDate = document.getElementById('ndCloseDate').value || '14 Days';
            var rep = document.getElementById('ndRep').value || 'Harish D.';
            var brand = document.getElementById('ndBrand').value || 'Gharuda Software';

            if (!title || !client || amount <= 0) {
                alert('Please provide a valid Deal Title, Client Account, and Deal Value.');
                return;
            }

            var dealId = 'DL-' + Math.floor(100 + Math.random() * 900);
            var repInitial = rep.charAt(0).toUpperCase();

            var newCard = document.createElement('div');
            newCard.className = 'card border shadow-sm p-3 rounded-3 bg-white deal-k-card';
            newCard.setAttribute('data-deal-id', dealId);
            newCard.setAttribute('data-val', amount);
            newCard.setAttribute('data-client', client);
            newCard.setAttribute('data-title', title);
            newCard.setAttribute('data-rep', rep);
            newCard.setAttribute('data-stage', stageName);
            newCard.setAttribute('data-prob', prob);
            newCard.setAttribute('data-close', closeDate);
            newCard.setAttribute('data-brand', brand);
            newCard.setAttribute('role', 'button');

            newCard.innerHTML =
                '<div class="d-flex align-items-center justify-content-between mb-2">' +
                    '<span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-0.5 small">New Deal</span>' +
                    '<span class="fw-bold text-dark fs-6">' + formatRupees(amount) + '</span>' +
                '</div>' +
                '<h6 class="fw-bold text-dark mb-1 deal-title-link">' + title.replace(/</g, '&lt;') + '</h6>' +
                '<span class="text-muted small d-block mb-2 text-truncate"><i class="bi bi-building me-1 text-secondary"></i>' + client.replace(/</g, '&lt;') + '</span>' +
                '<div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">' +
                    '<span><i class="bi bi-calendar3 me-1"></i>Close: ' + closeDate + '</span>' +
                    '<span class="badge rounded-circle bg-primary text-white p-1 px-2" title="' + rep + '">' + repInitial + '</span>' +
                '</div>';

            var targetCol = colBodies[Math.min(Math.max(0, stageIdx), colBodies.length - 1)];
            if (targetCol) {
                targetCol.prepend(newCard);
                enhanceCard(newCard);
                updateMetrics();
            }

            document.getElementById('newDealForm').reset();
            bootstrap.Modal.getInstance(document.getElementById('newDealModal')).hide();
        });
    }

    // Render Table View dynamically using Bootstrap 5 classes
    function renderTableView() {
        var tbody = document.getElementById('dealsTableBody');
        if (!tbody) return;
        tbody.innerHTML = '';

        var cards = document.querySelectorAll('.deal-k-card');
        var count = 0;

        cards.forEach(function (c) {
            if (c.classList.contains('d-none')) return;
            count++;
            var dealId = c.getAttribute('data-deal-id') || 'DL-101';
            var title = c.getAttribute('data-title') || 'Enterprise Deal';
            var client = c.getAttribute('data-client') || 'Client Account';
            var val = parseRupees(c.getAttribute('data-val'));
            var stage = c.getAttribute('data-stage') || 'Discovery';
            var prob = Number(c.getAttribute('data-prob')) || 20;
            var weighted = Math.round(val * (prob / 100));
            var closeDate = c.getAttribute('data-close') || '14 Days';
            var rep = c.getAttribute('data-rep') || 'Harish D.';

            var stageBadgeClass = 'bg-primary-subtle text-primary border-primary-subtle';
            var progressBg = 'bg-primary';

            if (stage === 'Discovery') {
                stageBadgeClass = 'bg-primary-subtle text-primary border-primary-subtle';
                progressBg = 'bg-primary';
            } else if (stage === 'Demo & Eval') {
                stageBadgeClass = 'bg-info-subtle text-info border-info-subtle';
                progressBg = 'bg-info';
            } else if (stage === 'Proposal Sent') {
                stageBadgeClass = 'bg-warning-subtle text-dark border-warning-subtle';
                progressBg = 'bg-warning';
            } else if (stage === 'Negotiation') {
                stageBadgeClass = 'bg-secondary-subtle text-dark border-secondary-subtle';
                progressBg = 'bg-secondary';
            } else if (stage === 'Closed Won') {
                stageBadgeClass = 'bg-success text-white border-success';
                progressBg = 'bg-success';
            } else if (stage === 'Closed Lost') {
                stageBadgeClass = 'bg-danger text-white border-danger';
                progressBg = 'bg-danger';
            }

            var tr = document.createElement('tr');
            tr.innerHTML =
                '<td class="ps-4 fw-semibold text-primary small">' + dealId + '</td>' +
                '<td><a href="javascript:void(0)" class="fw-bold text-dark text-decoration-none tbl-deal-title">' + title + '</a></td>' +
                '<td><span class="text-muted small"><i class="bi bi-building me-1 text-secondary"></i>' + client + '</span></td>' +
                '<td><span class="badge ' + stageBadgeClass + ' border px-2 py-1 rounded-pill small">' + stage + '</span></td>' +
                '<td class="fw-bold text-dark">' + formatRupees(val) + '</td>' +
                '<td>' +
                    '<div class="d-flex align-items-center gap-2">' +
                        '<span class="small fw-semibold" style="min-width: 32px;">' + prob + '%</span>' +
                        '<div class="progress flex-grow-1" style="height: 6px; min-width: 55px;">' +
                            '<div class="progress-bar ' + progressBg + '" style="width: ' + prob + '%;"></div>' +
                        '</div>' +
                    '</div>' +
                '</td>' +
                '<td class="fw-semibold text-muted small">' + formatRupees(weighted) + '</td>' +
                '<td><span class="small text-muted">' + closeDate + '</span></td>' +
                '<td><span class="badge bg-light text-dark border">' + rep + '</span></td>' +
                '<td class="text-end pe-4">' +
                    '<div class="btn-group btn-group-sm">' +
                        '<button type="button" class="btn btn-light border py-1 px-2 btn-tbl-view" title="View Opportunity Details"><i class="bi bi-eye text-primary"></i></button>' +
                        '<a href="quotations.php?client=' + encodeURIComponent(client) + '" class="btn btn-light border py-1 px-2" title="Create Quotation"><i class="bi bi-file-earmark-text text-success"></i></a>' +
                    '</div>' +
                '</td>';

            tr.querySelector('.tbl-deal-title').addEventListener('click', function () { openDealDetail(c); });
            tr.querySelector('.btn-tbl-view').addEventListener('click', function () { openDealDetail(c); });
            tbody.appendChild(tr);
        });

        var countBadge = document.getElementById('tableDealsCountBadge');
        if (countBadge) countBadge.textContent = count + ' Deals';

        var summaryText = document.getElementById('tableSummaryText');
        if (summaryText) summaryText.textContent = 'Showing ' + count + ' of ' + count + ' active opportunities';
    }

    // Toggle Kanban vs Table Views
    var btnKanban = document.getElementById('btnViewKanban');
    var btnTable = document.getElementById('btnViewTable');
    var kanbanView = document.getElementById('dealKanbanView');
    var tableView = document.getElementById('dealTableView');

    if (btnKanban && btnTable) {
        btnKanban.addEventListener('click', function () {
            btnKanban.classList.add('active');
            btnTable.classList.remove('active');
            kanbanView.classList.remove('d-none');
            tableView.classList.add('d-none');
            localStorage.setItem('deal_view_mode', 'kanban');
        });
        btnTable.addEventListener('click', function () {
            btnTable.classList.add('active');
            btnKanban.classList.remove('active');
            kanbanView.classList.add('d-none');
            tableView.classList.remove('d-none');
            renderTableView();
            localStorage.setItem('deal_view_mode', 'table');
        });

        // Restore view preference
        var savedMode = localStorage.getItem('deal_view_mode');
        if (savedMode === 'table') {
            btnTable.click();
        }
    }

    // Real-time Export CSV
    var exportBtn = document.getElementById('exportDealsCsvBtn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function () {
            var rows = [
                ['Deal ID', 'Deal Title', 'Client Account', 'Stage', 'Deal Value (INR)', 'Probability (%)', 'Weighted Value (INR)', 'Expected Close', 'Owner', 'Brand']
            ];
            document.querySelectorAll('.deal-k-card').forEach(function (c) {
                if (c.classList.contains('d-none')) return;
                var val = parseRupees(c.getAttribute('data-val'));
                var prob = Number(c.getAttribute('data-prob')) || 0;
                rows.push([
                    c.getAttribute('data-deal-id') || '',
                    c.getAttribute('data-title') || '',
                    c.getAttribute('data-client') || '',
                    c.getAttribute('data-stage') || '',
                    val,
                    prob + '%',
                    Math.round(val * (prob / 100)),
                    c.getAttribute('data-close') || '',
                    c.getAttribute('data-rep') || '',
                    c.getAttribute('data-brand') || ''
                ]);
            });
            var csvContent = 'data:text/csv;charset=utf-8,' + rows.map(function (e) {
                return e.map(function (v) { return '"' + String(v).replace(/"/g, '""') + '"'; }).join(',');
            }).join('\n');
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', 'deals_pipeline_' + new Date().toISOString().slice(0, 10) + '.csv');
            document.body.appendChild(link);
            link.click();
            link.remove();
        });
    }

    // Universal Filter Engine
    function applyFilters() {
        var q = (document.getElementById('filterDealSearch') ? document.getElementById('filterDealSearch').value : '').toLowerCase().trim();
        var rep = (document.getElementById('filterDealRep') ? document.getElementById('filterDealRep').value : '').toLowerCase();
        var brand = (document.getElementById('filterDealBrand') ? document.getElementById('filterDealBrand').value : '').toLowerCase();

        document.querySelectorAll('.deal-k-card').forEach(function (card) {
            var title = (card.getAttribute('data-title') || '').toLowerCase();
            var client = (card.getAttribute('data-client') || '').toLowerCase();
            var cardRep = (card.getAttribute('data-rep') || '').toLowerCase();
            var cardBrand = (card.getAttribute('data-brand') || '').toLowerCase();

            var matchSearch = !q || title.includes(q) || client.includes(q);
            var matchRep = !rep || cardRep.includes(rep);
            var matchBrand = !brand || cardBrand.includes(brand);

            card.classList.toggle('d-none', !(matchSearch && matchRep && matchBrand));
        });

        updateMetrics();
    }

    var searchInput = document.getElementById('filterDealSearch');
    if (searchInput) searchInput.addEventListener('input', applyFilters);

    var repSelect = document.getElementById('filterDealRep');
    if (repSelect) repSelect.addEventListener('change', applyFilters);

    var brandSelect = document.getElementById('filterDealBrand');
    if (brandSelect) brandSelect.addEventListener('change', applyFilters);

    var resetBtn = document.getElementById('resetDealFiltersBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            if (searchInput) searchInput.value = '';
            if (repSelect) repSelect.value = '';
            if (brandSelect) brandSelect.value = '';
            applyFilters();
        });
    }

    // Initial calculation
    updateMetrics();
});
</script>

<?php include 'footer.php'; ?>
