<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/lead.css">

<main class="container-fluid px-0">
    <!-- Page Header (Single-row clean header) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-2.5">
            <span class="icon-chip bg-primary-subtle text-primary">
                <i class="bi bi-people"></i>
            </span>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title">Contacts Directory</h1>
                <span class="text-muted font-11">Manage customer decision makers, SPOCs, and account contacts</span>
            </div>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-2.5" data-bs-toggle="offcanvas" data-bs-target="#contactFilterOffcanvas" aria-controls="contactFilterOffcanvas" title="Filter Contacts">
                <i class="bi bi-funnel"></i>
                <span>Filters</span>
                <span class="badge bg-primary text-white rounded-pill px-1.5 py-0.5 d-none font-11" id="contactFilterCountBadge">0</span>
            </button>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-3" data-bs-toggle="modal" data-bs-target="#newContactModal">
                <i class="bi bi-person-plus"></i><span>New Contact</span>
            </button>
        </div>
    </div>

    <!-- Contacts Directory Table Card -->
    <div class="card border shadow-sm rounded-3 bg-white overflow-hidden mb-4">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <div class="d-flex align-items-center gap-2">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-person-badge text-primary me-2"></i>All Contacts Registry</h6>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2.5 py-1 font-12" id="contactsCountBadge">4 Contacts</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold" id="exportContactsCsvBtn" onclick="exportContactsCSV()">
                    <i class="bi bi-download"></i><span>Export CSV</span>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 font-13" id="globalContactsTable">
                <thead class="table-light text-muted small text-uppercase font-11">
                    <tr>
                        <th class="ps-4">Contact Name</th>
                        <th>Company / Account</th>
                        <th>Email</th>
                        <th>Role / Position</th>
                        <th>Phone</th>
                        <th>Active</th>
                        <th>Last Login</th>
                        <th class="text-end pe-4" style="min-width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody id="globalContactsBody">
                    <tr data-company="Power Spares Engineering" data-role="Managing Director" data-status="active">
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-primary-subtle text-primary border border-primary-subtle fw-bold p-2 d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">MS</span>
                                <div>
                                    <div class="fw-bold text-dark font-13">MOHAN S</div>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-11">Primary SPOC</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>Power Spares Engineering
                            </a>
                        </td>
                        <td><a href="mailto:kaviyarasu@ghratechnology.com" class="text-secondary text-decoration-none">kaviyarasu@ghratechnology.com</a></td>
                        <td><span class="badge bg-light text-dark border">Managing Director</span></td>
                        <td><a href="tel:9677063368" class="text-dark text-decoration-none">+91 96770 63368</a></td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td class="text-muted small">16-09-2026 11:53</td>
                        <td class="text-end pe-4">
                            <div class="dropdown text-end">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border table-action-menu">
                                    <li>
                                        <a class="dropdown-item" href="whatsapp-chat.php">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-whatsapp"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">WhatsApp Chat</div>
                                                <div class="text-muted" style="font-size: 10px;">Direct messaging</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="mailto:kaviyarasu@ghratechnology.com">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-envelope"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Send Email</div>
                                                <div class="text-muted" style="font-size: 10px;">Compose message</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="quotation-create.php?client=Power+Spares+Engineering">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Create Quotation</div>
                                                <div class="text-muted" style="font-size: 10px;">Generate proposal</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item" href="customer-view.php?id=1&amp;name=Power+Spares+Engineering">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-person-vcard"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg;</div>
                                                <div class="text-muted" style="font-size: 10px;">View full client profile</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-company="Zen Publications" data-role="Project Manager" data-status="active">
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-primary-subtle text-primary border border-primary-subtle fw-bold p-2 d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">KM</span>
                                <div>
                                    <div class="fw-bold text-dark font-13">Kaviyarasu M</div>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-11">Decision Maker</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>Zen Publications
                            </a>
                        </td>
                        <td><a href="mailto:kaviyarasu@gmail.com" class="text-secondary text-decoration-none">kaviyarasu@gmail.com</a></td>
                        <td><span class="badge bg-light text-dark border">Project Manager</span></td>
                        <td><a href="tel:9840123456" class="text-dark text-decoration-none">+91 98401 23456</a></td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td class="text-muted small">14-09-2026 10:20</td>
                        <td class="text-end pe-4">
                            <div class="dropdown text-end">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border table-action-menu">
                                    <li>
                                        <a class="dropdown-item" href="whatsapp-chat.php">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-whatsapp"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">WhatsApp Chat</div>
                                                <div class="text-muted" style="font-size: 10px;">Direct messaging</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="mailto:kaviyarasu@gmail.com">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-envelope"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Send Email</div>
                                                <div class="text-muted" style="font-size: 10px;">Compose message</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="quotation-create.php?client=Zen+Publications">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Create Quotation</div>
                                                <div class="text-muted" style="font-size: 10px;">Generate proposal</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item" href="customer-view.php?id=2&amp;name=Zen+Publications">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-person-vcard"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg;</div>
                                                <div class="text-muted" style="font-size: 10px;">View full client profile</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-company="Hindustan Hydraulics" data-role="Operations Head" data-status="active">
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-primary-subtle text-primary border border-primary-subtle fw-bold p-2 d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">SB</span>
                                <div>
                                    <div class="fw-bold text-dark font-13">Suresh Babu</div>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-11">Operations</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>Hindustan Hydraulics
                            </a>
                        </td>
                        <td><a href="mailto:suresh@hindustanhydraulics.com" class="text-secondary text-decoration-none">suresh@hindustanhydraulics.com</a></td>
                        <td><span class="badge bg-light text-dark border">Operations Head</span></td>
                        <td><a href="tel:9444123890" class="text-dark text-decoration-none">+91 94441 23890</a></td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td class="text-muted small">12-09-2026 15:45</td>
                        <td class="text-end pe-4">
                            <div class="dropdown text-end">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border table-action-menu">
                                    <li>
                                        <a class="dropdown-item" href="whatsapp-chat.php">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-whatsapp"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">WhatsApp Chat</div>
                                                <div class="text-muted" style="font-size: 10px;">Direct messaging</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="mailto:suresh@hindustanhydraulics.com">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-envelope"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Send Email</div>
                                                <div class="text-muted" style="font-size: 10px;">Compose message</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="quotation-create.php?client=Hindustan+Hydraulics">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Create Quotation</div>
                                                <div class="text-muted" style="font-size: 10px;">Generate proposal</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item" href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-person-vcard"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg;</div>
                                                <div class="text-muted" style="font-size: 10px;">View full client profile</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-company="GG COMPANY" data-role="Finance & Accounts" data-status="active">
                        <td class="ps-4">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-primary-subtle text-primary border border-primary-subtle fw-bold p-2 d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">PS</span>
                                <div>
                                    <div class="fw-bold text-dark font-13">Priya S</div>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-11">Finance SPOC</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=5&amp;name=GG+COMPANY" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>GG COMPANY
                            </a>
                        </td>
                        <td><a href="mailto:priya@ggcompany.com" class="text-secondary text-decoration-none">priya@ggcompany.com</a></td>
                        <td><span class="badge bg-light text-dark border">Finance &amp; Accounts</span></td>
                        <td><a href="tel:9841198765" class="text-dark text-decoration-none">+91 98411 98765</a></td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td class="text-muted small">09-09-2026 09:12</td>
                        <td class="text-end pe-4">
                            <div class="dropdown text-end">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border table-action-menu">
                                    <li>
                                        <a class="dropdown-item" href="whatsapp-chat.php">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-whatsapp"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">WhatsApp Chat</div>
                                                <div class="text-muted" style="font-size: 10px;">Direct messaging</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="mailto:priya@ggcompany.com">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-envelope"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Send Email</div>
                                                <div class="text-muted" style="font-size: 10px;">Compose message</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="quotation-create.php?client=GG+COMPANY">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Create Quotation</div>
                                                <div class="text-muted" style="font-size: 10px;">Generate proposal</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item" href="customer-view.php?id=5&amp;name=GG+COMPANY">
                                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-person-vcard"></i></div>
                                            <div>
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg;</div>
                                                <div class="text-muted" style="font-size: 10px;">View full client profile</div>
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

        <!-- Table Footer / Pagination -->
        <div class="p-3 border-top bg-light bg-opacity-25 d-flex align-items-center justify-content-between flex-wrap gap-2">
            <span class="text-muted font-12" id="contactsTableSummary">Showing 4 of 4 active contacts</span>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </div>
</main>

<!-- Filter Offcanvas Slider Drawer -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="contactFilterOffcanvas" aria-labelledby="contactFilterOffcanvasLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title font-16 fw-bold" id="contactFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary me-2"></i>Filter Contacts
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="contactFilterForm">
            <!-- Search Keyword -->
            <div class="mb-3">
                <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Search Keyword</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control" id="filterContactSearch" placeholder="Name, email, phone...">
                </div>
            </div>

            <!-- Customer Company -->
            <div class="mb-3">
                <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Company / Account</label>
                <select class="form-select" id="filterContactCompany">
                    <option value="">All Companies</option>
                    <option value="Power Spares Engineering">Power Spares Engineering</option>
                    <option value="Zen Publications">Zen Publications</option>
                    <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
                    <option value="Gharuda Software">Gharuda Software</option>
                    <option value="GG COMPANY">GG COMPANY</option>
                </select>
            </div>

            <!-- Role / Position -->
            <div class="mb-3">
                <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Role / Position</label>
                <select class="form-select" id="filterContactRole">
                    <option value="">All Roles</option>
                    <option value="Managing Director">Managing Director</option>
                    <option value="Project Manager">Project Manager</option>
                    <option value="Operations Head">Operations Head</option>
                    <option value="Finance & Accounts">Finance &amp; Accounts</option>
                </select>
            </div>

            <!-- Active Status -->
            <div class="mb-3">
                <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Status</label>
                <select class="form-select" id="filterContactStatus">
                    <option value="">All Statuses</option>
                    <option value="active">Active Only</option>
                    <option value="inactive">Inactive Only</option>
                </select>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer border-top p-3 bg-light d-flex gap-2">
        <button type="button" class="btn btn-outline-secondary w-50 font-13" onclick="clearContactFilters()">Reset</button>
        <button type="button" class="btn btn-primary w-50 font-13" onclick="applyContactFilters()">Apply Filters</button>
    </div>
</div>

<!-- Modal: New Contact (Pure Bootstrap 5 Utilities) -->
<div class="modal fade" id="newContactModal" tabindex="-1" aria-labelledby="newContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3 bg-light bg-opacity-50">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-person-plus-fill"></i></span>
                    <h5 class="modal-title fw-bold text-dark" id="newContactModalLabel">Add New Client Contact</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="newContactForm" onsubmit="event.preventDefault(); saveGlobalContact();">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Customer Company <span class="text-danger">*</span></label>
                            <select class="form-select" id="ncCompany" required>
                                <option value="">Select Customer Company...</option>
                                <option value="Power Spares Engineering">Power Spares Engineering</option>
                                <option value="Zen Publications">Zen Publications</option>
                                <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
                                <option value="Gharuda Software">Gharuda Software</option>
                                <option value="GG COMPANY">GG COMPANY</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Role / Job Position <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ncRole" placeholder="e.g. Procurement Lead / General Manager" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ncFirst" placeholder="First name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ncLast" placeholder="Last name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="ncEmail" placeholder="contact@company.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Phone Number</label>
                            <input type="tel" class="form-control" id="ncPhone" value="+91 ">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check2 me-1"></i>Save Contact</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function saveGlobalContact() {
    var company = document.getElementById('ncCompany').value;
    var encComp = encodeURIComponent(company);
    var role = document.getElementById('ncRole').value;
    var first = document.getElementById('ncFirst').value.trim();
    var last = document.getElementById('ncLast').value.trim();
    var name = first + ' ' + last;
    var initials = ((first.charAt(0) || 'C') + (last.charAt(0) || 'P')).toUpperCase();
    var email = document.getElementById('ncEmail').value.trim();
    var phone = document.getElementById('ncPhone').value.trim();

    var tbody = document.getElementById('globalContactsBody');
    var tr = document.createElement('tr');
    tr.setAttribute('data-company', company);
    tr.setAttribute('data-role', role);
    tr.setAttribute('data-status', 'active');

    tr.innerHTML =
        '<td class="ps-4"><div class="d-flex align-items-center gap-2">' +
            '<span class="badge rounded-circle bg-primary-subtle text-primary border border-primary-subtle fw-bold p-2 d-inline-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">' + initials + '</span>' +
            '<div><div class="fw-bold text-dark font-13">' + name + '</div><span class="badge bg-primary-subtle text-primary border border-primary-subtle font-11">Verified SPOC</span></div>' +
        '</div></td>' +
        '<td><a href="customer-view.php?id=1&name=' + encComp + '" class="text-dark fw-semibold text-decoration-none"><i class="bi bi-building me-1 text-muted"></i>' + company + '</a></td>' +
        '<td><a href="mailto:' + email + '" class="text-secondary text-decoration-none">' + email + '</a></td>' +
        '<td><span class="badge bg-light text-dark border">' + role + '</span></td>' +
        '<td><a href="tel:' + phone.replace(/\s+/g, '') + '" class="text-dark text-decoration-none">' + phone + '</a></td>' +
        '<td><div class="form-check form-switch mb-0"><input class="form-check-input" type="checkbox" role="switch" checked></div></td>' +
        '<td class="text-muted small">Just now</td>' +
        '<td class="text-end pe-4">' +
            '<div class="dropdown text-end">' +
                '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                    'Actions' +
                '</button>' +
                '<ul class="dropdown-menu dropdown-menu-end shadow border table-action-menu">' +
                    '<li><a class="dropdown-item" href="whatsapp-chat.php"><div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-whatsapp"></i></div><div><div class="fw-semibold text-dark font-12">WhatsApp Chat</div><div class="text-muted" style="font-size: 10px;">Direct messaging</div></div></a></li>' +
                    '<li><a class="dropdown-item" href="mailto:' + email + '"><div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-envelope"></i></div><div><div class="fw-semibold text-dark font-12">Send Email</div><div class="text-muted" style="font-size: 10px;">Compose message</div></div></a></li>' +
                    '<li><a class="dropdown-item" href="quotation-create.php?client=' + encComp + '"><div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></div><div><div class="fw-semibold text-dark font-12">Create Quotation</div><div class="text-muted" style="font-size: 10px;">Generate proposal</div></div></a></li>' +
                    '<li><hr class="dropdown-divider my-1"></li>' +
                    '<li><a class="dropdown-item" href="customer-view.php?id=1&name=' + encComp + '"><div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-person-vcard"></i></div><div><div class="fw-semibold text-dark font-12">Customer 360&deg;</div><div class="text-muted" style="font-size: 10px;">View full client profile</div></div></a></li>' +
                '</ul>' +
            '</div>' +
        '</td>';
    tbody.prepend(tr);

    var modalEl = document.getElementById('newContactModal');
    var modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
    document.getElementById('newContactForm').reset();
    updateContactsCount();
}

function updateContactsCount() {
    var rows = document.querySelectorAll('#globalContactsBody tr');
    var visible = 0;
    rows.forEach(function(r) {
        if (r.style.display !== 'none') visible++;
    });
    var badge = document.getElementById('contactsCountBadge');
    var summary = document.getElementById('contactsTableSummary');
    if (badge) badge.textContent = visible + ' Contacts';
    if (summary) summary.textContent = 'Showing ' + visible + ' of ' + rows.length + ' active contacts';
}

function applyContactFilters() {
    var search = (document.getElementById('filterContactSearch').value || '').toLowerCase().trim();
    var company = (document.getElementById('filterContactCompany').value || '').trim();
    var role = (document.getElementById('filterContactRole').value || '').trim();
    var status = (document.getElementById('filterContactStatus').value || '').trim();

    var activeCount = 0;
    if (search) activeCount++;
    if (company) activeCount++;
    if (role) activeCount++;
    if (status) activeCount++;

    var badge = document.getElementById('contactFilterCountBadge');
    if (badge) {
        if (activeCount > 0) {
            badge.textContent = activeCount;
            badge.classList.remove('d-none');
        } else {
            badge.classList.add('d-none');
        }
    }

    var rows = document.querySelectorAll('#globalContactsBody tr');
    rows.forEach(function(tr) {
        var text = tr.textContent.toLowerCase();
        var rowComp = tr.getAttribute('data-company') || '';
        var rowRole = tr.getAttribute('data-role') || '';
        var rowStatus = tr.getAttribute('data-status') || '';

        var matchSearch = !search || text.indexOf(search) !== -1;
        var matchCompany = !company || rowComp === company;
        var matchRole = !role || rowRole === role;
        var matchStatus = !status || rowStatus === status;

        if (matchSearch && matchCompany && matchRole && matchStatus) {
            tr.style.display = '';
        } else {
            tr.style.display = 'none';
        }
    });

    updateContactsCount();

    var offcanvasEl = document.getElementById('contactFilterOffcanvas');
    var offcanvas = bootstrap.Offcanvas.getInstance(offcanvasEl);
    if (offcanvas) offcanvas.hide();
}

function clearContactFilters() {
    document.getElementById('contactFilterForm').reset();
    applyContactFilters();
}

function exportContactsCSV() {
    var rows = document.querySelectorAll('#globalContactsTable tr');
    var csv = [];
    rows.forEach(function(row) {
        if (row.style.display === 'none') return;
        var cols = row.querySelectorAll('th, td');
        var rowData = [];
        // Extract first 7 columns (exclude actions)
        for (var i = 0; i < Math.min(cols.length - 1, 7); i++) {
            var text = cols[i].innerText.replace(/(\r\n|\n|\r)/gm, ' ').replace(/"/g, '""').trim();
            rowData.push('"' + text + '"');
        }
        if (rowData.length > 0) {
            csv.push(rowData.join(','));
        }
    });

    var csvContent = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv.join('\n'));
    var link = document.createElement('a');
    link.setAttribute('href', csvContent);
    var dateStr = new Date().toISOString().split('T')[0];
    link.setAttribute('download', 'contacts_export_' + dateStr + '.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>

<?php include 'footer.php'; ?>
