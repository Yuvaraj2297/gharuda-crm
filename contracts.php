<?php
include 'header.php';
$preQuote  = isset($_GET['quote']) ? htmlspecialchars($_GET['quote']) : '';
$preClient = isset($_GET['client']) ? htmlspecialchars($_GET['client']) : (isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : '');
?>
<link rel="stylesheet" href="./assets/css/lead.css">

<main class="container-fluid px-0">
    <!-- Page Header & Action Bar -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-0 page-title">Contracts &amp; SLA Agreements</h1>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-2.5" data-bs-toggle="offcanvas" data-bs-target="#contractFilterOffcanvas" aria-controls="contractFilterOffcanvas" title="Filter Contracts">
                <i class="bi bi-funnel"></i>
                <span>Filters</span>
                <span class="badge bg-primary text-white rounded-pill px-1.5 py-0.5 d-none font-11" id="filterCountBadge">0</span>
            </button>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-3" data-bs-toggle="modal" data-bs-target="#newContractModal">
                <i class="bi bi-plus-lg"></i><span>New Contract</span>
            </button>
        </div>
    </div>

    <!-- Contracts Registry Table Card -->
    <div class="card border shadow-sm rounded-3 bg-white overflow-hidden mb-4">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <div class="d-flex align-items-center gap-2">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-file-earmark-ruled text-primary me-2"></i>Client Agreements Registry</h6>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2.5 py-1 font-12" id="contractCountBadge">4 Agreements</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold" id="exportContractCsvBtn">
                    <i class="bi bi-download"></i><span>Export CSV</span>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="contractsTable">
                <thead class="table-light text-muted small text-uppercase font-11">
                    <tr>
                        <th class="ps-4">Contract #</th>
                        <th>Subject / Scope</th>
                        <th>Customer Account</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th class="text-end pe-4" style="min-width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody id="contractsTbody">
                    <tr data-status="Active" data-type="Annual AMC">
                        <td class="ps-4 fw-bold text-primary font-12">CTR-2026-001</td>
                        <td>
                            <div class="fw-semibold text-dark font-12">Enterprise ERP &amp; Cloud Maintenance</div>
                            <div class="small text-muted font-11">Includes 24/7 SLA and quarterly server upgrades</div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Power Spares Engineering
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border font-11">Annual AMC</span></td>
                        <td><strong class="text-dark">&#8377;12,50,000</strong></td>
                        <td class="small">01-Jan-2026</td>
                        <td class="small">31-Dec-2026</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 font-11"><i class="bi bi-patch-check-fill me-1"></i>Active</span></td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end table-action-menu font-12 py-1">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Contract Actions</li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="javascript:void(0)" onclick="viewContract('CTR-2026-001', 'Enterprise ERP & Cloud Maintenance', 'Power Spares Engineering', '₹12,50,000', 'Annual AMC', '01-Jan-2026', '31-Dec-2026', 'Active')">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-eye"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Agreement</div>
                                                <div class="text-muted" style="font-size: 10px;">Inspect SLA terms &amp; scope</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php?client=Power+Spares+Engineering">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Convert to Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Raise milestone / AMC invoice</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="project-create.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-briefcase"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Delivery Project</div>
                                                <div class="text-muted" style="font-size: 10px;">Manage maintenance tasks</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="support-create-ticket.php">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-headset"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise SLA Ticket</div>
                                                <div class="text-muted" style="font-size: 10px;">Open priority support case</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="customer-view.php?id=1&amp;name=Power+Spares+Engineering">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-person-vcard"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg;</div>
                                                <div class="text-muted" style="font-size: 10px;">View complete client profile</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-muted" href="javascript:void(0)" onclick="window.print()">
                                            <span class="action-icon-pill bg-light text-secondary border"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print Contract</div>
                                                <div class="text-muted" style="font-size: 10px;">Download or print summary</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Expiring Soon" data-type="Software SLA">
                        <td class="ps-4 fw-bold text-primary font-12">CTR-2026-002</td>
                        <td>
                            <div class="fw-semibold text-dark font-12">Publishing CRM Portal Customization</div>
                            <div class="small text-muted font-11">Module delivery and annual API sync SLA</div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Zen Publications
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border font-11">Software SLA</span></td>
                        <td><strong class="text-dark">&#8377;8,40,000</strong></td>
                        <td class="small">15-Feb-2026</td>
                        <td class="small">14-Nov-2026</td>
                        <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-1 font-11"><i class="bi bi-clock-history me-1"></i>Expiring Soon</span></td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end table-action-menu font-12 py-1">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Contract Actions</li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="javascript:void(0)" onclick="viewContract('CTR-2026-002', 'Publishing CRM Portal Customization', 'Zen Publications', '₹8,40,000', 'Software SLA', '15-Feb-2026', '14-Nov-2026', 'Expiring Soon')">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-eye"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Agreement</div>
                                                <div class="text-muted" style="font-size: 10px;">Inspect SLA terms &amp; scope</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="quotation-create.php?client=Zen+Publications&amp;item=Annual+Software+SLA+Renewal&amp;price=840000">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-arrow-repeat"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Send Renewal Quote</div>
                                                <div class="text-muted" style="font-size: 10px;">Issue contract renewal quote</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php?client=Zen+Publications">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Convert to Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Raise milestone / AMC invoice</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="project-create.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-briefcase"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Delivery Project</div>
                                                <div class="text-muted" style="font-size: 10px;">Manage maintenance tasks</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="customer-view.php?id=2&amp;name=Zen+Publications">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-person-vcard"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg;</div>
                                                <div class="text-muted" style="font-size: 10px;">View complete client profile</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-muted" href="javascript:void(0)" onclick="window.print()">
                                            <span class="action-icon-pill bg-light text-secondary border"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print Contract</div>
                                                <div class="text-muted" style="font-size: 10px;">Download or print summary</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Active" data-type="Retainer">
                        <td class="ps-4 fw-bold text-primary font-12">CTR-2026-003</td>
                        <td>
                            <div class="fw-semibold text-dark font-12">Hydraulic Machinery Telemetry IoT Service</div>
                            <div class="small text-muted font-11">Telemetry sensor integration &amp; cloud storage</div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Hindustan Hydraulics
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border font-11">Retainer</span></td>
                        <td><strong class="text-dark">&#8377;18,00,000</strong></td>
                        <td class="small">01-Mar-2026</td>
                        <td class="small">28-Feb-2027</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 font-11"><i class="bi bi-patch-check-fill me-1"></i>Active</span></td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end table-action-menu font-12 py-1">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Contract Actions</li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="javascript:void(0)" onclick="viewContract('CTR-2026-003', 'Hydraulic Machinery Telemetry IoT Service', 'Hindustan Hydraulics', '₹18,00,000', 'Retainer', '01-Mar-2026', '28-Feb-2027', 'Active')">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-eye"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Agreement</div>
                                                <div class="text-muted" style="font-size: 10px;">Inspect SLA terms &amp; scope</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php?client=Hindustan+Hydraulics">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Convert to Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Raise milestone / AMC invoice</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="project-create.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-briefcase"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Delivery Project</div>
                                                <div class="text-muted" style="font-size: 10px;">Manage maintenance tasks</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-person-vcard"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg;</div>
                                                <div class="text-muted" style="font-size: 10px;">View complete client profile</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-muted" href="javascript:void(0)" onclick="window.print()">
                                            <span class="action-icon-pill bg-light text-secondary border"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print Contract</div>
                                                <div class="text-muted" style="font-size: 10px;">Download or print summary</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="In Negotiation" data-type="Retainer">
                        <td class="ps-4 fw-bold text-primary font-12">CTR-2026-004</td>
                        <td>
                            <div class="fw-semibold text-dark font-12">Mobile Application Retainer &amp; DevOps</div>
                            <div class="small text-muted font-11">Monthly sprint cycles and automated QA</div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=4&amp;name=Gharuda+Software" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Gharuda Software
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border font-11">Retainer</span></td>
                        <td><strong class="text-dark">&#8377;9,70,000</strong></td>
                        <td class="small">01-Apr-2026</td>
                        <td class="small">31-Mar-2027</td>
                        <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 font-11"><i class="bi bi-hourglass-split me-1"></i>In Negotiation</span></td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end table-action-menu font-12 py-1">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Contract Actions</li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="javascript:void(0)" onclick="viewContract('CTR-2026-004', 'Mobile Application Retainer & DevOps', 'Gharuda Software', '₹9,70,000', 'Retainer', '01-Apr-2026', '31-Mar-2027', 'In Negotiation')">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-eye"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Agreement</div>
                                                <div class="text-muted" style="font-size: 10px;">Inspect SLA terms &amp; scope</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php?client=Gharuda+Software">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Convert to Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Raise milestone / AMC invoice</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="project-create.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-briefcase"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Delivery Project</div>
                                                <div class="text-muted" style="font-size: 10px;">Manage maintenance tasks</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="customer-view.php?id=4&amp;name=Gharuda+Software">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-person-vcard"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg;</div>
                                                <div class="text-muted" style="font-size: 10px;">View complete client profile</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-muted" href="javascript:void(0)" onclick="window.print()">
                                            <span class="action-icon-pill bg-light text-secondary border"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print Contract</div>
                                                <div class="text-muted" style="font-size: 10px;">Download or print summary</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white border-top py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
            <span class="text-muted small" id="contractSummaryText">Showing all agreements</span>
            <nav aria-label="Table pagination">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</main>

<!-- ==================== OFFCANVAS SLIDER: CONTRACTS FILTER DRAWER ==================== -->
<div class="offcanvas offcanvas-end border-start shadow-lg" tabindex="-1" id="contractFilterOffcanvas" aria-labelledby="contractFilterTitle" style="width: 360px;">
    <div class="offcanvas-header border-bottom py-3 px-4 bg-light">
        <div class="d-flex align-items-center gap-2">
            <span class="p-1.5 rounded-2 bg-primary-subtle text-primary d-inline-flex"><i class="bi bi-funnel fs-6"></i></span>
            <h5 class="offcanvas-title fw-bold text-dark fs-6 mb-0" id="contractFilterTitle">Filter Contracts</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4 d-flex flex-column gap-3">
        <!-- Search Keyword -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Search Contract / Client</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                <input type="text" class="form-control" id="filterContractSearch" placeholder="Contract #, client, scope...">
            </div>
        </div>

        <!-- Status Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Contract Status</label>
            <select class="form-select form-select-sm" id="filterContractStatus">
                <option value="">All Statuses</option>
                <option value="Active">Active</option>
                <option value="Expiring Soon">Expiring Soon</option>
                <option value="In Negotiation">In Negotiation</option>
                <option value="Expired">Expired</option>
            </select>
        </div>

        <!-- Agreement Type Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Agreement Type</label>
            <select class="form-select form-select-sm" id="filterContractType">
                <option value="">All Agreement Types</option>
                <option value="Annual AMC">Annual AMC</option>
                <option value="Software SLA">Software SLA</option>
                <option value="Retainer">Monthly Retainer</option>
                <option value="Implementation">Implementation SOW</option>
                <option value="Consulting">Consulting Agreement</option>
            </select>
        </div>

        <!-- Period Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Timeline Period</label>
            <select class="form-select form-select-sm" id="filterContractPeriod">
                <option value="all">All Timelines</option>
                <option value="this-month">This Month</option>
                <option value="this-quarter" selected>This Quarter (Q1 2026)</option>
                <option value="this-year">Full Year 2026</option>
            </select>
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 px-4 bg-light d-flex align-items-center justify-content-between">
        <button type="button" class="btn btn-outline-secondary btn-sm" id="resetContractFiltersBtn">
            <i class="bi bi-arrow-clockwise me-1"></i>Reset Filters
        </button>
        <button type="button" class="btn btn-primary btn-sm px-4 fw-semibold" data-bs-dismiss="offcanvas">
            Apply
        </button>
    </div>
</div>

<!-- Modal: New Contract -->
<div class="modal fade" id="newContractModal" tabindex="-1" aria-labelledby="newContractModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3 bg-light bg-opacity-50">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-file-earmark-plus"></i></span>
                    <h5 class="modal-title fw-bold text-dark" id="newContractModalLabel">Create New Client Contract</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="newContractForm" onsubmit="event.preventDefault(); saveContract();">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label small fw-bold">Contract Subject / Scope <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cSubject" placeholder="e.g. Annual Software Maintenance SLA" value="<?php echo $preQuote ? 'SLA Agreement for Quote #' . $preQuote : ''; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Contract Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="cType" required>
                                <option value="Annual AMC">Annual AMC</option>
                                <option value="Software SLA">Software SLA</option>
                                <option value="Retainer">Monthly Retainer</option>
                                <option value="Implementation">Implementation SOW</option>
                                <option value="Consulting">Consulting Agreement</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Customer <span class="text-danger">*</span></label>
                            <select class="form-select" id="cCustomer" required>
                                <option value="">Select Client</option>
                                <option value="Power Spares Engineering" <?php if ($preClient == 'Power Spares Engineering') echo 'selected'; ?>>Power Spares Engineering</option>
                                <option value="Zen Publications" <?php if ($preClient == 'Zen Publications') echo 'selected'; ?>>Zen Publications</option>
                                <option value="Hindustan Hydraulics" <?php if ($preClient == 'Hindustan Hydraulics') echo 'selected'; ?>>Hindustan Hydraulics</option>
                                <option value="Gharuda Software" <?php if ($preClient == 'Gharuda Software') echo 'selected'; ?>>Gharuda Software</option>
                                <option value="GG COMPANY" <?php if ($preClient == 'GG COMPANY') echo 'selected'; ?>>GG COMPANY</option>
                                <?php if ($preClient && !in_array($preClient, ['Power Spares Engineering', 'Zen Publications', 'Hindustan Hydraulics', 'Gharuda Software', 'GG COMPANY'])): ?>
                                    <option value="<?php echo $preClient; ?>" selected><?php echo $preClient; ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Contract Value (INR ₹) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" id="cValue" placeholder="e.g. 500000" value="590000" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Start Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="cStartDate" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="cEndDate" value="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Terms &amp; Special Conditions</label>
                            <textarea class="form-control" id="cTerms" rows="3" placeholder="SLA response hours, penalty clauses, payment cycles...">Uptime guarantee 99.8%. Priority 1 response within 1 hour, resolution within 4 hours.</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-semibold"><i class="bi bi-check2 me-1"></i>Save &amp; Activate Contract</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: View Contract Details -->
<div class="modal fade" id="viewContractModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3">
                <h5 class="modal-title fw-bold text-dark" id="vcModalTitle">Contract Overview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="vcModalBody"></div>
            <div class="modal-footer border-top p-3 bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary fw-semibold" onclick="window.print();"><i class="bi bi-printer me-1"></i>Print PDF</button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== JAVASCRIPT: CONTRACTS REGISTRY ENGINE ==================== -->
<script>
function viewContract(id, subject, customer, value, type, start, end, status) {
    document.getElementById('vcModalTitle').textContent = id + ' · ' + subject;
    document.getElementById('vcModalBody').innerHTML =
        '<div class="d-flex align-items-center justify-content-between mb-3 p-3 bg-light rounded-3">' +
            '<div><span class="text-muted small d-block">Contract Value</span><strong class="fs-4 text-dark">' + value + '</strong></div>' +
            '<span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">' + status + '</span>' +
        '</div>' +
        '<div class="row g-2 mb-3 small">' +
            '<div class="col-6"><strong>Client:</strong> <span class="text-muted">' + customer + '</span></div>' +
            '<div class="col-6"><strong>Type:</strong> <span class="text-muted">' + type + '</span></div>' +
            '<div class="col-6"><strong>Start Date:</strong> <span class="text-muted">' + start + '</span></div>' +
            '<div class="col-6"><strong>End Date:</strong> <span class="text-muted">' + end + '</span></div>' +
        '</div>' +
        '<div class="border-top pt-3">' +
            '<h6 class="small fw-bold text-dark mb-1">SLA Commitments</h6>' +
            '<p class="text-muted small mb-0">Uptime guarantee 99.8%. Priority 1 issue resolution within 4 business hours. Scheduled maintenance outside standard operational hours.</p>' +
        '</div>';
    bootstrap.Modal.getOrCreateInstance(document.getElementById('viewContractModal')).show();
}

function saveContract() {
    var subject = document.getElementById('cSubject').value;
    var customer = document.getElementById('cCustomer').value;
    var encCust = encodeURIComponent(customer);
    var val = Number(document.getElementById('cValue').value).toLocaleString('en-IN');
    var type = document.getElementById('cType').value;
    var start = document.getElementById('cStartDate').value;
    var end = document.getElementById('cEndDate').value;
    var ctrId = 'CTR-2026-00' + (document.querySelectorAll('#contractsTable tbody tr').length + 1);

    var tbody = document.getElementById('contractsTbody');
    var tr = document.createElement('tr');
    tr.setAttribute('data-status', 'Active');
    tr.setAttribute('data-type', type);
    tr.innerHTML =
        '<td class="ps-4 fw-bold text-primary font-12">' + ctrId + '</td>' +
        '<td><div class="fw-semibold text-dark font-12">' + subject + '</div><div class="small text-muted font-11">Direct client agreement</div></td>' +
        '<td><a href="customer-view.php?id=1&name=' + encCust + '" class="text-dark text-decoration-none fw-semibold"><i class="bi bi-building me-1 text-muted"></i>' + customer + '</a></td>' +
        '<td><span class="badge bg-light text-dark border font-11">' + type + '</span></td>' +
        '<td><strong class="text-dark">&#8377;' + val + '</strong></td>' +
        '<td class="small">' + start + '</td>' +
        '<td class="small">' + end + '</td>' +
        '<td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 font-11"><i class="bi bi-patch-check-fill me-1"></i>Active</span></td>' +
        '<td class="text-end pe-4">' +
            '<div class="dropdown">' +
                '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                    '<span>Actions</span>' +
                '</button>' +
                '<ul class="dropdown-menu dropdown-menu-end table-action-menu font-12 py-1">' +
                    '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Contract Actions</li>' +
                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="javascript:void(0)" onclick="viewContract(\'' + ctrId + '\', \'' + subject.replace(/'/g, "\\'") + '\', \'' + customer.replace(/'/g, "\\'") + '\', \'₹' + val + '\', \'' + type + '\', \'' + start + '\', \'' + end + '\', \'Active\')"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-eye"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">View Agreement</div><div class="text-muted" style="font-size: 10px;">Inspect SLA terms &amp; scope</div></div></a></li>' +
                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php?client=' + encCust + '"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Convert to Invoice</div><div class="text-muted" style="font-size: 10px;">Raise milestone / AMC invoice</div></div></a></li>' +
                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="project-create.php"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-briefcase"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Delivery Project</div><div class="text-muted" style="font-size: 10px;">Manage maintenance tasks</div></div></a></li>' +
                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="customer-view.php?id=1&name=' + encCust + '"><span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-person-vcard"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Customer 360&deg;</div><div class="text-muted" style="font-size: 10px;">View complete client profile</div></div></a></li>' +
                    '<li><hr class="dropdown-divider my-1"></li>' +
                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-muted" href="javascript:void(0)" onclick="window.print()"><span class="action-icon-pill bg-light text-secondary border"><i class="bi bi-printer"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Print Contract</div><div class="text-muted" style="font-size: 10px;">Download or print summary</div></div></a></li>' +
                '</ul>' +
            '</div>' +
        '</td>';
    tbody.prepend(tr);

    var modalEl = document.getElementById('newContractModal');
    var modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
    applyContractFilters();
}

document.addEventListener('DOMContentLoaded', function () {
    var tbody = document.getElementById('contractsTbody');

    // Universal Filter Engine (Offcanvas Slider)
    function applyContractFilters() {
        var q = (document.getElementById('filterContractSearch') ? document.getElementById('filterContractSearch').value : '').toLowerCase().trim();
        var st = (document.getElementById('filterContractStatus') ? document.getElementById('filterContractStatus').value : '').toLowerCase();
        var tp = (document.getElementById('filterContractType') ? document.getElementById('filterContractType').value : '').toLowerCase();

        var activeCount = 0;
        if (q) activeCount++;
        if (st) activeCount++;
        if (tp) activeCount++;

        var badge = document.getElementById('filterCountBadge');
        if (badge) {
            badge.textContent = activeCount;
            badge.classList.toggle('d-none', activeCount === 0);
        }

        var visibleCount = 0;
        Array.from(tbody ? tbody.querySelectorAll('tr') : []).forEach(function(r) {
            var text = r.textContent.toLowerCase();
            var statusText = (r.getAttribute('data-status') || '').toLowerCase();
            var typeText = (r.getAttribute('data-type') || '').toLowerCase();

            var matchQ = !q || text.indexOf(q) !== -1;
            var matchSt = !st || statusText.indexOf(st) !== -1;
            var matchTp = !tp || typeText.indexOf(tp) !== -1;

            var show = matchQ && matchSt && matchTp;
            r.style.display = show ? '' : 'none';
            if (show) visibleCount++;
        });

        var countBadge = document.getElementById('contractCountBadge');
        if (countBadge) countBadge.textContent = visibleCount + ' Agreements';

        var summaryText = document.getElementById('contractSummaryText');
        if (summaryText) summaryText.textContent = 'Showing ' + visibleCount + ' of ' + (tbody ? tbody.children.length : 0) + ' agreements';
    }

    var searchInput = document.getElementById('filterContractSearch');
    if (searchInput) searchInput.addEventListener('input', applyContractFilters);

    var statusSelect = document.getElementById('filterContractStatus');
    if (statusSelect) statusSelect.addEventListener('change', applyContractFilters);

    var typeSelect = document.getElementById('filterContractType');
    if (typeSelect) typeSelect.addEventListener('change', applyContractFilters);

    var resetBtn = document.getElementById('resetContractFiltersBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            if (searchInput) searchInput.value = '';
            if (statusSelect) statusSelect.value = '';
            if (typeSelect) typeSelect.value = '';
            applyContractFilters();
        });
    }

    // Real-time Export CSV
    var exportBtn = document.getElementById('exportContractCsvBtn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            var rows = [
                ['Contract #', 'Subject / Scope', 'Customer Account', 'Type', 'Value', 'Start Date', 'End Date', 'Status']
            ];
            Array.from(tbody ? tbody.querySelectorAll('tr') : []).forEach(function(r) {
                if (r.style.display === 'none') return;
                var cells = r.querySelectorAll('td');
                if (cells.length >= 8) {
                    rows.push([
                        cells[0].textContent.trim(),
                        cells[1].querySelector('.fw-semibold') ? cells[1].querySelector('.fw-semibold').textContent.trim() : cells[1].textContent.trim(),
                        cells[2].textContent.replace(/\s+/g, ' ').trim(),
                        cells[3].textContent.trim(),
                        cells[4].textContent.trim(),
                        cells[5].textContent.trim(),
                        cells[6].textContent.trim(),
                        cells[7].textContent.trim()
                    ]);
                }
            });
            var csvContent = 'data:text/csv;charset=utf-8,' + rows.map(function(e) {
                return e.map(function(v) { return '"' + String(v).replace(/"/g, '""') + '"'; }).join(',');
            }).join('\n');
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', 'contracts_export_' + new Date().toISOString().slice(0, 10) + '.csv');
            document.body.appendChild(link);
            link.click();
            link.remove();
        });
    }

    // Initial update
    applyContractFilters();

    <?php if ($preClient || $preQuote): ?>
    if (window.bootstrap && bootstrap.Modal) {
        bootstrap.Modal.getOrCreateInstance(document.getElementById('newContractModal')).show();
    }
    <?php endif; ?>
});
</script>

<?php include 'footer.php'; ?>
