<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/date-picker.css">

<main class="customers-page">
    <!-- Page Header & Breadcrumb -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Customers</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap overflow-auto breadcrumb-text">
                <i class="bi bi-people fs-6"></i><span>CRM</span><i class="bi bi-chevron-right"></i><span class="fw-bold text-dark">Customers</span>
            </nav>
        </div>

        <!-- Top Action Buttons (Bootstrap 5 Utilities) -->
        <div class="d-flex flex-wrap align-items-center gap-2">
            <button type="button" class="btn btn-primary d-inline-flex align-items-center gap-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#cvNewCustomerModal">
                <i class="bi bi-plus-lg"></i><span>Quick New Customer</span>
            </button>
            <a href="customer-new.php" class="btn btn-outline-primary d-inline-flex align-items-center gap-2 fw-semibold">
                <i class="bi bi-building-add"></i><span>Full Customer Onboarding</span>
            </a>
            <button type="button" class="btn btn-primary d-inline-flex align-items-center gap-2 fw-semibold" data-bs-toggle="offcanvas" data-bs-target="#custImportOffcanvas" aria-controls="custImportOffcanvas">
                <i class="bi bi-upload"></i><span>Import Customers</span>
            </button>
            <button type="button" class="btn btn-outline-primary d-inline-flex align-items-center gap-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#contactsModal">
                <i class="bi bi-person"></i><span>Contacts</span>
            </button>
            <button type="button" class="btn btn-outline-primary d-inline-flex align-items-center gap-2 fw-semibold" id="custFormSync">
                <i class="bi bi-arrow-repeat"></i><span>Form Sync</span>
            </button>
        </div>
    </div>

    <!-- Customers Summary Strip (Bootstrap 5 Grid + Utilities) -->
    <div class="card-custom mb-3 p-3 p-md-4">
        <div class="d-flex align-items-center gap-2 fw-bold text-dark mb-3">
            <i class="bi bi-file-earmark-text text-primary fs-5"></i>
            <span>Customers Summary</span>
        </div>
        <div class="row g-3" id="custSummary">
            <div class="col-6 col-md-4 col-xl-2">
                <div class="cust-summary-item active d-flex align-items-baseline gap-2 p-2 rounded-3 bg-light border border-success-subtle" role="button" data-filter="all">
                    <span class="fs-5 fw-bold text-dark num" id="sumTotal">7</span>
                    <span class="small fw-semibold text-dark text-decoration-underline lbl">Total Customers</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="cust-summary-item d-flex align-items-baseline gap-2 p-2 rounded-3 bg-success-subtle border border-success-subtle" role="button" data-filter="active">
                    <span class="fs-5 fw-bold text-success num" id="sumActive">5</span>
                    <span class="small fw-semibold text-success lbl">Active Customers</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="cust-summary-item d-flex align-items-baseline gap-2 p-2 rounded-3 bg-danger-subtle border border-danger-subtle" role="button" data-filter="inactive">
                    <span class="fs-5 fw-bold text-danger num" id="sumInactive">2</span>
                    <span class="small fw-semibold text-danger lbl">Inactive Customers</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="cust-summary-item d-flex align-items-baseline gap-2 p-2 rounded-3 bg-light border">
                    <span class="fs-5 fw-bold text-success num">30</span>
                    <span class="small fw-semibold text-secondary lbl">Active Contacts</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="cust-summary-item d-flex align-items-baseline gap-2 p-2 rounded-3 bg-light border">
                    <span class="fs-5 fw-bold text-danger num">0</span>
                    <span class="small fw-semibold text-secondary lbl">Inactive Contacts</span>
                </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <div class="cust-summary-item d-flex align-items-baseline gap-2 p-2 rounded-3 bg-light border">
                    <span class="fs-5 fw-bold text-dark num">0</span>
                    <span class="small fw-semibold text-secondary lbl">Logged In Today</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Customers Directory Card -->
    <div class="card-custom p-0" id="customersTableWrap">
        <div class="card-head d-flex align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">Customers Directory</h3>
                    <small class="text-muted">Manage B2B &amp; B2C accounts, primary contacts, GST billing, and 360&deg; lifecycle</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle fw-semibold" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-check2-square me-1"></i>Bulk actions
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border">
                        <li><button type="button" class="dropdown-item small fw-semibold" data-bulk="activate"><i class="bi bi-toggle-on text-success me-2"></i>Mark active</button></li>
                        <li><button type="button" class="dropdown-item small fw-semibold" data-bulk="deactivate"><i class="bi bi-toggle-off text-secondary me-2"></i>Mark inactive</button></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><button type="button" class="dropdown-item small fw-semibold text-danger" data-bulk="delete"><i class="bi bi-trash me-2"></i>Delete selected</button></li>
                    </ul>
                </div>
                <a href="customer-new.php" class="btn btn-outline-primary btn-sm" title="Full Customer Onboarding">
                    <i class="bi bi-building-add"></i>
                </a>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cvNewCustomerModal" title="Quick Add Customer">
                    <i class="mdi mdi-plus"></i>
                </button>
            </div>
        </div>

        <!-- Table (toolbar auto-created by datatable class) -->
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="customersTable" data-table-name="Customers">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="form-check-input" id="custCheckAll" aria-label="Select all"></th>
                        <th>S.No</th>
                        <th>Company</th>
                        <th>Primary Contact</th>
                        <th>Primary Email</th>
                        <th>Phone</th>
                        <th>Active</th>
                        <th>Groups</th>
                        <th>Date Created</th>
                        <th>Profession</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="pgBody">
                    <tr class="cust-row" data-id="46" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select GG COMPANY"></td>
                        <td class="fw-semibold text-neutral">46</td>
                        <td><a href="customer-view.php?id=1&amp;name=GG+COMPANY" class="fw-semibold text-dark text-decoration-none">GG COMPANY</a></td>
                        <td><a href="customer-view.php?id=1&amp;name=GG+COMPANY" class="text-secondary text-decoration-none">MOHAN S</a></td>
                        <td><a href="mailto:kaviyarasu@ghratechnology.com" class="text-secondary text-decoration-none">kaviyarasu@ghratechnology.com</a></td>
                        <td>
                            <span class="cust-phone d-inline-flex align-items-center gap-1" data-phone="9677063368">
                                <span class="phone-text">••••••3368</span>
                                <button type="button" class="btn btn-sm btn-link p-0 text-success js-reveal-phone" title="Show phone"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input js-active-toggle" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">Enterprise</span></td>
                        <td class="text-neutral">16-09-2026 11:53:29</td>
                        <td><span class="badge bg-light text-dark border">Builders</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=GG+COMPANY" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=GG+COMPANY" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=GG+COMPANY" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="cust-row" data-id="45" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select Test Entry"></td>
                        <td class="fw-semibold text-neutral">45</td>
                        <td><a href="customer-view.php?id=1&amp;name=Test+Entry" class="fw-semibold text-dark text-decoration-none">Test Entry</a></td>
                        <td><span class="text-muted">Rajesh K</span></td>
                        <td><a href="mailto:info@testentry.in" class="text-secondary text-decoration-none">info@testentry.in</a></td>
                        <td>
                            <span class="cust-phone d-inline-flex align-items-center gap-1">
                                <span class="text-muted small">No Permission!</span>
                                <button type="button" class="btn btn-sm btn-link p-0 text-secondary js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input js-active-toggle" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td></td>
                        <td class="text-neutral">04-09-2026 13:47:58</td>
                        <td><span class="badge bg-light text-dark border">Corporate</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=Test+Entry" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=Test+Entry" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=Test+Entry" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="cust-row" data-id="44" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select New Test"></td>
                        <td class="fw-semibold text-neutral">44</td>
                        <td><a href="customer-view.php?id=1&amp;name=New+Test" class="fw-semibold text-dark text-decoration-none">New Test</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="cust-phone d-inline-flex align-items-center gap-1">
                                <span class="text-muted small">No Permission!</span>
                                <button type="button" class="btn btn-sm btn-link p-0 text-secondary js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input js-active-toggle" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td></td>
                        <td class="text-neutral">04-09-2026 13:46:13</td>
                        <td></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=New+Test" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=New+Test" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=New+Test" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="cust-row" data-id="43" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select Test12"></td>
                        <td class="fw-semibold text-neutral">43</td>
                        <td><a href="customer-view.php?id=1&amp;name=Test12" class="fw-semibold text-dark text-decoration-none">Test12</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="cust-phone d-inline-flex align-items-center gap-1">
                                <span class="text-muted small">No Permission!</span>
                                <button type="button" class="btn btn-sm btn-link p-0 text-secondary js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input js-active-toggle" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td></td>
                        <td class="text-neutral">04-09-2026 13:11:05</td>
                        <td></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=Test12" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=Test12" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=Test12" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="cust-row" data-id="42" data-active="0">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select SGI"></td>
                        <td class="fw-semibold text-neutral">42</td>
                        <td><a href="customer-view.php?id=1&amp;name=SGI" class="fw-semibold text-dark text-decoration-none">SGI</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="cust-phone d-inline-flex align-items-center gap-1">
                                <span class="text-muted small">No Permission!</span>
                                <button type="button" class="btn btn-sm btn-link p-0 text-secondary js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input js-active-toggle" type="checkbox" role="switch" aria-label="Active">
                            </div>
                        </td>
                        <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Anand Mehta</span></td>
                        <td class="text-neutral">24-08-2026 17:41:35</td>
                        <td></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=SGI" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=SGI" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=SGI" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="cust-row" data-id="41" data-active="0">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select Bijlipay"></td>
                        <td class="fw-semibold text-neutral">41</td>
                        <td><a href="customer-view.php?id=1&amp;name=Bijlipay" class="fw-semibold text-dark text-decoration-none">Bijlipay</a></td>
                        <td><a href="customer-view.php?id=1&amp;name=Bijlipay" class="text-secondary text-decoration-none">Madhupriya S</a></td>
                        <td><a href="mailto:madhupriyas2911@gmail.com" class="text-secondary text-decoration-none">madhupriyas2911@gmail.com</a></td>
                        <td>
                            <span class="cust-phone d-inline-flex align-items-center gap-1">
                                <span class="text-muted small">No Permission!</span>
                                <button type="button" class="btn btn-sm btn-link p-0 text-secondary js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input js-active-toggle" type="checkbox" role="switch" aria-label="Active">
                            </div>
                        </td>
                        <td></td>
                        <td class="text-neutral">12-08-2026 12:47:10</td>
                        <td></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=Bijlipay" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=Bijlipay" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=Bijlipay" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="cust-row" data-id="40" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select SUNGWOO HITECH INDIA PRIVATE LIMITED"></td>
                        <td class="fw-semibold text-neutral">40</td>
                        <td><a href="customer-view.php?id=1&amp;name=SUNGWOO+HITECH+INDIA+PRIVATE+LIMITED" class="fw-semibold text-dark text-decoration-none">SUNGWOO HITECH INDIA PRIVATE LIMITED</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="cust-phone d-inline-flex align-items-center gap-1">
                                <span class="text-muted small">No Permission!</span>
                                <button type="button" class="btn btn-sm btn-link p-0 text-secondary js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input js-active-toggle" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td></td>
                        <td class="text-neutral">19-06-2026 15:05:20</td>
                        <td></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=SUNGWOO+HITECH+INDIA+PRIVATE+LIMITED" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=SUNGWOO+HITECH+INDIA+PRIVATE+LIMITED" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=SUNGWOO+HITECH+INDIA+PRIVATE+LIMITED" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Quick New Customer Modal (Pure Bootstrap 5 Utility Classes) -->
<div class="modal fade" id="cvNewCustomerModal" tabindex="-1" aria-labelledby="cvNewCustomerLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom bg-light bg-opacity-50 py-3 px-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-chip">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fs-5 fw-bold mb-0" id="cvNewCustomerLabel">Quick New Customer</h5>
                        <small class="text-muted fw-semibold">Customer Details &middot; Billing &amp; Shipping</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="customer-new.php" class="btn btn-outline-primary btn-sm fw-semibold">
                        <i class="bi bi-box-arrow-up-right me-1"></i>Open Full Onboarding Page
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body p-0">
                <div id="ncProfile">
                    <!-- Sub-tabs using Bootstrap 5 Nav Pills -->
                    <div class="d-flex align-items-center gap-2 px-4 py-3 bg-light border-bottom" aria-label="Profile sections">
                        <button type="button" class="btn btn-sm btn-primary fw-semibold cv-subtab active" data-sub="details">
                            <i class="bi bi-building me-1"></i>Customer Details
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold cv-subtab" data-sub="billing">
                            <i class="bi bi-geo-alt me-1"></i>Billing &amp; Shipping
                        </button>
                    </div>

                    <!-- Pane 1: Customer Details -->
                    <div class="cv-pane p-4" data-pane="details">
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="dShowContact" checked>
                            <label class="form-check-label small fw-semibold text-secondary" for="dShowContact">
                                Show primary contact full name on Invoices, Estimates, Payments &amp; Credit Notes
                            </label>
                        </div>

                        <div class="row g-3">
                            <div class="col-12 col-md-4 cv-field">
                                <label class="form-label fw-semibold small" for="dClientCode">Client Code</label>
                                <input class="form-control" id="dClientCode" placeholder="CUS-1047">
                            </div>
                            <div class="col-12 col-md-8 cv-field">
                                <label class="form-label fw-semibold small" for="dCompany">Company <span class="text-danger">*</span></label>
                                <input class="form-control" id="dCompany" placeholder="Enter legal company name">
                                <div class="text-danger small fw-semibold mt-1 cv-err" hidden>Company is required.</div>
                            </div>

                            <div class="col-12 col-md-6 cv-field">
                                <label class="form-label fw-semibold small" for="dPhone">Phone</label>
                                <input class="form-control" id="dPhone" placeholder="+91 98400 12345">
                            </div>
                            <div class="col-12 col-md-6 cv-field">
                                <label class="form-label fw-semibold small" for="dWebsite">Website</label>
                                <input class="form-control" id="dWebsite" placeholder="https://www.company.com">
                            </div>

                            <div class="col-12 col-md-4 cv-field">
                                <label class="form-label fw-semibold small" for="dGroups">Groups</label>
                                <div class="input-group">
                                    <select class="form-select cv-select" id="dGroups">
                                        <option value="">Non selected</option>
                                        <option>Anand Mehta</option>
                                        <option>VIP</option>
                                        <option>Retail</option>
                                    </select>
                                    <button type="button" class="btn btn-outline-secondary js-demo" title="Add group"><i class="bi bi-plus-lg"></i></button>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 cv-field">
                                <label class="form-label fw-semibold small" for="dCredit">Credit Days</label>
                                <select class="form-select cv-select" id="dCredit">
                                    <option>0</option><option selected>1</option><option>7</option><option>15</option><option>30</option><option>45</option><option>60</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 cv-field">
                                <label class="form-label fw-semibold small" for="dCurrency">Currency</label>
                                <select class="form-select cv-select" id="dCurrency">
                                    <option>System Default</option>
                                    <option selected>INR (₹)</option>
                                    <option>USD ($)</option>
                                    <option>EUR (€)</option>
                                </select>
                            </div>

                            <div class="col-12"><hr class="my-2"></div>

                            <div class="col-12 cv-field">
                                <label class="form-label fw-semibold small" for="dAddress">Address</label>
                                <textarea class="form-control" id="dAddress" rows="2"></textarea>
                            </div>
                            <div class="col-12 col-md-3 cv-field">
                                <label class="form-label fw-semibold small" for="dCountry">Country</label>
                                <select class="form-select cv-select" id="dCountry"><option selected>India</option><option>United States</option><option>United Kingdom</option><option>United Arab Emirates</option></select>
                            </div>
                            <div class="col-12 col-md-3 cv-field">
                                <label class="form-label fw-semibold small" for="dState">State</label>
                                <select class="form-select cv-select" id="dState"><option value="">Nothing selected</option><option selected>Tamil Nadu</option><option>Karnataka</option><option>Kerala</option><option>Maharashtra</option><option>Andhra Pradesh</option></select>
                            </div>
                            <div class="col-12 col-md-3 cv-field">
                                <label class="form-label fw-semibold small" for="dCity">City</label>
                                <select class="form-select cv-select" id="dCity"><option value="">Nothing selected</option><option selected>Chennai</option><option>Coimbatore</option><option>Madurai</option><option>Bengaluru</option><option>Kochi</option></select>
                            </div>
                            <div class="col-12 col-md-3 cv-field">
                                <label class="form-label fw-semibold small" for="dZip">Zip Code</label>
                                <input class="form-control" id="dZip" value="600006">
                            </div>

                            <div class="col-12 col-md-4 cv-field">
                                <label class="form-label fw-semibold small" for="dPan">PAN No</label>
                                <input class="form-control text-uppercase" id="dPan" maxlength="10">
                            </div>
                            <div class="col-12 col-md-4 cv-field">
                                <label class="form-label fw-semibold small" for="dGst">GST Number</label>
                                <input class="form-control text-uppercase" id="dGst" maxlength="15">
                            </div>
                            <div class="col-12 col-md-4 cv-field">
                                <label class="form-label fw-semibold small" for="dOpening">Opening Balance</label>
                                <input class="form-control" id="dOpening" placeholder="0.00" inputmode="decimal">
                            </div>
                        </div>
                    </div>

                    <!-- Pane 2: Billing & Shipping -->
                    <div class="cv-pane p-4 d-none" data-pane="billing">
                        <div class="row g-4">
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-3 bg-light border h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                                        <span class="fw-bold small text-uppercase text-dark">Billing Address</span>
                                        <button type="button" class="btn btn-sm btn-link p-0 text-success fw-semibold text-decoration-none" id="cvNewSameAsInfo">Same as Customer Info</button>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12 cv-field">
                                            <label class="form-label fw-semibold small" for="bStreet">Street</label>
                                            <textarea class="form-control" id="bStreet" rows="3"></textarea>
                                        </div>
                                        <div class="col-sm-6 cv-field">
                                            <label class="form-label fw-semibold small" for="bCountry">Country</label>
                                            <select class="form-select cv-select" id="bCountry"><option value="">Non selected</option><option selected>India</option><option>United States</option><option>United Kingdom</option><option>United Arab Emirates</option></select>
                                        </div>
                                        <div class="col-sm-6 cv-field">
                                            <label class="form-label fw-semibold small" for="bState">State</label>
                                            <select class="form-select cv-select" id="bState"><option value="">Nothing selected</option><option>Tamil Nadu</option><option>Karnataka</option><option>Kerala</option><option>Maharashtra</option><option>Andhra Pradesh</option></select>
                                        </div>
                                        <div class="col-sm-6 cv-field">
                                            <label class="form-label fw-semibold small" for="bCity">City</label>
                                            <select class="form-select cv-select" id="bCity"><option value="">Nothing selected</option><option selected>Chennai</option><option>Coimbatore</option><option>Madurai</option><option>Bengaluru</option><option>Kochi</option></select>
                                        </div>
                                        <div class="col-sm-6 cv-field">
                                            <label class="form-label fw-semibold small" for="bZip">Zip Code</label>
                                            <input class="form-control" id="bZip" value="600006">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-3 bg-light border h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                                        <span class="fw-bold small text-uppercase text-dark">Shipping Address</span>
                                        <button type="button" class="btn btn-sm btn-link p-0 text-success fw-semibold text-decoration-none" id="cvNewCopyBilling">Copy Billing Address</button>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12 cv-field">
                                            <label class="form-label fw-semibold small" for="sStreet">Street</label>
                                            <textarea class="form-control" id="sStreet" rows="3"></textarea>
                                        </div>
                                        <div class="col-sm-6 cv-field">
                                            <label class="form-label fw-semibold small" for="sCountry">Country</label>
                                            <select class="form-select cv-select" id="sCountry"><option value="">Non selected</option><option>India</option><option>United States</option><option>United Kingdom</option><option>United Arab Emirates</option></select>
                                        </div>
                                        <div class="col-sm-6 cv-field">
                                            <label class="form-label fw-semibold small" for="sState">State</label>
                                            <select class="form-select cv-select" id="sState"><option value="">Nothing selected</option><option>Tamil Nadu</option><option>Karnataka</option><option>Kerala</option><option>Maharashtra</option><option>Andhra Pradesh</option></select>
                                        </div>
                                        <div class="col-sm-6 cv-field">
                                            <label class="form-label fw-semibold small" for="sCity">City</label>
                                            <select class="form-select cv-select" id="sCity"><option value="">Nothing selected</option><option selected>Chennai</option><option>Coimbatore</option><option>Madurai</option><option>Bengaluru</option><option>Kochi</option></select>
                                        </div>
                                        <div class="col-sm-6 cv-field">
                                            <label class="form-label fw-semibold small" for="sZip">Zip Code</label>
                                            <input class="form-control" id="sZip">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 p-3 bg-light border-top" id="cvNewFormFoot">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary fw-semibold px-4" id="cvNewSubmit">Submit &amp; Onboard</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Import Customers Offcanvas (Pure Bootstrap 5 Utility Classes) -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="custImportOffcanvas" aria-labelledby="custImportTitle">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold" id="custImportTitle">
            <i class="bi bi-people text-success me-2"></i>Import Customers
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column gap-3">
        <div class="p-4 rounded-3 border border-2 border-success-subtle bg-success-subtle bg-opacity-25 text-center" role="button" id="custImportDropzone">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success text-white p-3 mb-2">
                <i class="bi bi-cloud-arrow-up fs-4"></i>
            </div>
            <h6 class="fw-bold text-dark mb-1">Upload customers spreadsheet</h6>
            <p class="small text-muted mb-1">Drop your Excel or CSV file here, or <span class="text-success fw-bold text-decoration-underline">browse</span>.</p>
            <small class="text-muted">Supports .xlsx, .xls, .csv</small>
        </div>

        <div class="d-none align-items-center gap-2 p-2 rounded-3 bg-success-subtle text-success fw-semibold small" id="custImportFile">
            <i class="bi bi-file-earmark-excel fs-5"></i>
            <span id="custImportFileName"></span>
        </div>

        <div class="d-none align-items-center justify-content-between p-2 rounded-3 bg-light border small" id="custImportCount">
            <span><i class="bi bi-people me-1"></i>Customers found</span>
            <strong class="text-success">7</strong>
        </div>

        <div>
            <button type="button" class="btn btn-outline-success btn-sm fw-semibold" id="custImportSample">
                <i class="bi bi-download me-1"></i>Download Sample CSV
            </button>
        </div>

        <div>
            <label class="form-label fw-semibold small" for="custImportInput"><span class="text-danger">* </span>Choose CSV File</label>
            <input type="file" class="form-control" id="custImportInput" accept=".xlsx,.xls,.csv">
        </div>

        <div>
            <label class="form-label fw-semibold small" for="custImportGroups">Groups</label>
            <div class="input-group">
                <select class="form-select" id="custImportGroups">
                    <option value="">Non selected</option>
                    <option>Anand Mehta</option>
                    <option>VIP</option>
                    <option>Retail</option>
                </select>
                <button type="button" class="btn btn-outline-secondary" id="custImportAddGroup" title="Add group"><i class="bi bi-plus-lg"></i></button>
            </div>
        </div>

        <div>
            <label class="form-label fw-semibold small" for="custImportPassword">Default password for all contacts</label>
            <input type="text" class="form-control" id="custImportPassword" autocomplete="off">
        </div>
    </div>
    <div class="p-3 border-top d-flex justify-content-end gap-2 bg-light">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="button" class="btn btn-primary" id="custImportConfirm" disabled><i class="bi bi-check-lg me-1"></i>Confirm Upload</button>
    </div>
</div>

<!-- Add New Customer Group Modal -->
<div class="modal fade" id="custGroupModal" tabindex="-1" aria-labelledby="custGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fs-5 fw-bold" id="custGroupModalLabel">Add New Customer Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label fw-semibold small" for="custGroupName"><span class="text-danger">* </span>Group Name</label>
                <input type="text" class="form-control" id="custGroupName" autocomplete="off">
                <div class="text-danger small mt-1" id="custGroupNameErr" hidden>Name is required.</div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="custGroupSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Contacts Fullscreen Modal -->
<div class="modal fade" id="contactsModal" tabindex="-1" aria-labelledby="contactsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-chip"><i class="bi bi-person-lines-fill"></i></div>
                    <div>
                        <h5 class="modal-title fs-5 fw-bold mb-0" id="contactsModalLabel">Contacts</h5>
                        <small class="text-muted fw-semibold">All customer contacts</small>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive table-modern-wrap overflow-auto column-border">
                    <table class="table-modern w-100" id="contactsTable">
                        <thead>
                            <tr>
                                <th class="text-nowrap">S.No</th>
                                <th class="text-nowrap">First Name</th>
                                <th class="text-nowrap">Last Name</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Company</th>
                                <th class="text-nowrap">Phone</th>
                                <th class="text-nowrap">Role Position</th>
                                <th class="text-nowrap">Last Login</th>
                                <th class="text-nowrap">Active</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody id="ctTbody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    /* Global Bootstrap 5 Toast Helper */
    function showBsToast(msg, ok) {
        var box = document.getElementById('ghToastContainer');
        if (!box) {
            box = document.createElement('div');
            box.id = 'ghToastContainer';
            box.className = 'toast-container position-fixed bottom-0 end-0 p-3';
            document.body.appendChild(box);
        }
        var el = document.createElement('div');
        el.className = 'toast align-items-center text-white border-0 show ' + (ok === false ? 'bg-danger' : 'bg-dark');
        el.setAttribute('role', 'alert');
        el.innerHTML =
            '<div class="d-flex">' +
                '<div class="toast-body d-flex align-items-center gap-2 fw-semibold">' +
                    '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill text-warning' : 'bi-check-circle-fill text-success') + '"></i>' +
                    '<span>' + msg + '</span>' +
                '</div>' +
                '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>' +
            '</div>';
        box.appendChild(el);
        setTimeout(function() {
            el.remove();
        }, 2800);
    }

    /* Quick New Customer Modal Logic */
    document.addEventListener('DOMContentLoaded', function() {
        var modalEl = document.getElementById('cvNewCustomerModal');
        if (!modalEl) return;
        var root = document.getElementById('ncProfile');
        var s2Ready = false;

        function initSelect2() {
            if (s2Ready) return;
            if (!(window.jQuery && jQuery.fn.select2)) return;
            jQuery('#ncProfile .cv-select').select2({
                width: '100%',
                dropdownParent: jQuery('#cvNewCustomerModal')
            });
            s2Ready = true;
        }
        modalEl.addEventListener('shown.bs.modal', initSelect2);

        modalEl.addEventListener('show.bs.modal', function() {
            root.querySelectorAll('button.cv-subtab').forEach(function(b, i) {
                b.classList.toggle('active', i === 0);
                b.classList.toggle('btn-primary', i === 0);
                b.classList.toggle('btn-outline-secondary', i !== 0);
            });
            root.querySelectorAll('.cv-pane').forEach(function(p) {
                p.classList.toggle('d-none', p.dataset.pane !== 'details');
            });
            root.querySelectorAll('.is-invalid').forEach(function(el) {
                el.classList.remove('is-invalid');
            });
            root.querySelectorAll('.cv-err').forEach(function(e) {
                e.hidden = true;
            });
        });

        var subtabs = root.querySelectorAll('button.cv-subtab'),
            panes = root.querySelectorAll('.cv-pane');
        subtabs.forEach(function(btn) {
            btn.addEventListener('click', function() {
                subtabs.forEach(function(b) {
                    var active = (b === btn);
                    b.classList.toggle('active', active);
                    b.classList.toggle('btn-primary', active);
                    b.classList.toggle('btn-outline-secondary', !active);
                });
                panes.forEach(function(p) {
                    p.classList.toggle('d-none', p.dataset.pane !== btn.dataset.sub);
                });
            });
        });

        function setVal(id, v) {
            var el = document.getElementById(id);
            if (!el) return;
            el.value = v;
            if (el.tagName === 'SELECT' && window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change');
        }

        function getVal(id) {
            var el = document.getElementById(id);
            return el ? el.value : '';
        }

        document.getElementById('cvNewSameAsInfo').addEventListener('click', function() {
            setVal('bStreet', getVal('dAddress'));
            setVal('bCountry', getVal('dCountry'));
            setVal('bState', getVal('dState'));
            setVal('bCity', getVal('dCity'));
            setVal('bZip', getVal('dZip'));
            showBsToast('Billing address copied from customer info');
        });
        document.getElementById('cvNewCopyBilling').addEventListener('click', function() {
            setVal('sStreet', getVal('bStreet'));
            setVal('sCountry', getVal('bCountry'));
            setVal('sState', getVal('bState'));
            setVal('sCity', getVal('bCity'));
            setVal('sZip', getVal('bZip'));
            showBsToast('Shipping address copied from billing');
        });
        root.querySelectorAll('.js-demo').forEach(function(b) {
            b.addEventListener('click', function() {
                var groupModal = document.getElementById('custGroupModal');
                if (groupModal && window.bootstrap) bootstrap.Modal.getOrCreateInstance(groupModal).show();
            });
        });

        function flag(id, bad) {
            var el = document.getElementById(id);
            if (!el) return;
            var field = el.closest('.cv-field');
            var err = field ? field.querySelector('.cv-err') : null;
            el.classList.toggle('is-invalid', bad);
            if (err) err.hidden = !bad;
        }
        document.getElementById('cvNewSubmit').addEventListener('click', function() {
            var compVal = getVal('dCompany').trim();
            var noCompany = !compVal;
            flag('dCompany', noCompany);
            if (noCompany) {
                var targetSub = root.querySelector('.cv-subtab[data-sub="details"]');
                if (targetSub) targetSub.click();
                showBsToast('Please fill the required Company field', false);
                return;
            }
            var pgBody = document.getElementById('pgBody');
            if (pgBody) {
                var enc = encodeURIComponent(compVal);
                var phoneVal = getVal('dPhone').trim() || '9840012345';
                var nowStr = new Date().toLocaleDateString('en-GB').replace(/\//g, '-') + ' 10:30:00';
                var tr = document.createElement('tr');
                tr.className = 'cust-row';
                tr.setAttribute('data-id', '47');
                tr.setAttribute('data-active', '1');
                tr.innerHTML =
                    '<td><input type="checkbox" class="form-check-input cust-check"></td>' +
                    '<td class="fw-semibold text-neutral">47</td>' +
                    '<td><a href="customer-view.php?id=1&name=' + enc + '" class="fw-semibold text-dark text-decoration-none">' + compVal + '</a></td>' +
                    '<td><a href="customer-view.php?id=1&name=' + enc + '" class="text-secondary text-decoration-none">Primary Contact</a></td>' +
                    '<td></td>' +
                    '<td><span class="cust-phone d-inline-flex align-items-center gap-1" data-phone="' + phoneVal + '"><span class="phone-text">' + phoneVal + '</span></span></td>' +
                    '<td><div class="form-check form-switch mb-0"><input class="form-check-input js-active-toggle" type="checkbox" role="switch" checked aria-label="Active"></div></td>' +
                    '<td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">' + (getVal('dGroups') || 'Corporate') + '</span></td>' +
                    '<td class="text-neutral">' + nowStr + '</td>' +
                    '<td><span class="badge bg-light text-dark border">Enterprise</span></td>' +
                    '<td><div class="d-flex align-items-center gap-1 flex-nowrap">' +
                        '<a href="customer-view.php?id=1&name=' + enc + '" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>' +
                        '<a href="quotation-create.php?client=' + enc + '" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>' +
                        '<a href="invoice-create.php?client=' + enc + '" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>' +
                        '<a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>' +
                    '</div></td>';
                pgBody.insertBefore(tr, pgBody.firstChild);
            }
            showBsToast('Customer "' + compVal + '" created & onboarded');
            if (window.bootstrap) bootstrap.Modal.getOrCreateInstance(modalEl).hide();
        });
    });

    /* Import Customers Offcanvas Logic */
    document.addEventListener('DOMContentLoaded', function() {
        var ocEl = document.getElementById('custImportOffcanvas');
        if (!ocEl) return;
        var input = document.getElementById('custImportInput');
        var dropzone = document.getElementById('custImportDropzone');
        var filePreview = document.getElementById('custImportFile');
        var fileName = document.getElementById('custImportFileName');
        var countBox = document.getElementById('custImportCount');
        var confirmBtn = document.getElementById('custImportConfirm');

        if (dropzone && input) {
            dropzone.addEventListener('click', function() {
                input.click();
            });

            input.addEventListener('change', function() {
                var file = input.files[0];
                if (!file) return;
                var ext = file.name.split('.').pop().toLowerCase();
                if (['xlsx', 'xls', 'csv'].indexOf(ext) === -1) {
                    showBsToast('Please upload a valid Excel or CSV file.', false);
                    input.value = '';
                    return;
                }
                fileName.textContent = file.name;
                filePreview.classList.remove('d-none');
                filePreview.classList.add('d-flex');
                countBox.classList.remove('d-none');
                countBox.classList.add('d-flex');
                confirmBtn.disabled = false;
            });

            confirmBtn.addEventListener('click', function() {
                if (!input.files[0]) return;
                showBsToast('7 customers are ready to import from ' + input.files[0].name + '.');
                if (window.bootstrap) bootstrap.Offcanvas.getOrCreateInstance(ocEl).hide();
            });
        }

        var groupsSel = document.getElementById('custImportGroups');
        if (groupsSel && window.jQuery && jQuery.fn.select2) {
            jQuery(groupsSel).select2({
                width: '100%',
                dropdownParent: jQuery('#custImportOffcanvas')
            });
        }

        var addGroupBtn = document.getElementById('custImportAddGroup');
        var groupModal = document.getElementById('custGroupModal');
        if (addGroupBtn && groupModal) {
            addGroupBtn.addEventListener('click', function() {
                document.getElementById('custGroupName').value = '';
                document.getElementById('custGroupNameErr').hidden = true;
                if (window.bootstrap) bootstrap.Modal.getOrCreateInstance(groupModal).show();
            });
        }

        var groupSubmit = document.getElementById('custGroupSubmit');
        if (groupSubmit && groupModal) {
            var groupName = document.getElementById('custGroupName'),
                groupNameErr = document.getElementById('custGroupNameErr');
            groupName.addEventListener('input', function() {
                groupNameErr.hidden = true;
            });
            groupSubmit.addEventListener('click', function() {
                var name = groupName.value.trim();
                if (!name) {
                    groupNameErr.hidden = false;
                    groupName.focus();
                    return;
                }
                ['custImportGroups', 'dGroups'].forEach(function(selId) {
                    var sel = document.getElementById(selId);
                    if (!sel) return;
                    var opt = document.createElement('option');
                    opt.value = name;
                    opt.textContent = name;
                    sel.appendChild(opt);
                    sel.value = name;
                    if (window.jQuery && jQuery.fn.select2) jQuery(sel).trigger('change');
                });
                groupName.value = '';
                if (window.bootstrap) bootstrap.Modal.getOrCreateInstance(groupModal).hide();
                showBsToast('Customer group "' + name + '" added');
            });
        }

        var sampleLink = document.getElementById('custImportSample');
        if (sampleLink) sampleLink.addEventListener('click', function() {
            var csv = 'Company,Primary Contact,Primary Email,Phone,Active,Groups,Profession\n' +
                'GG COMPANY,MOHAN S,kaviyarasu@ghratechnology.com,9677063368,1,,Builders\n' +
                'Bijlipay,Madhupriya S,madhupriyas2911@gmail.com,,0,,Retail\n' +
                'SUNGWOO HITECH INDIA PRIVATE LIMITED,,,,1,,Manufacturing';
            var blob = new Blob([csv], { type: 'text/csv' });
            var a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'customers-sample-template.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(a.href);
        });
    });

    /* Contacts Modal — MasterTable Flow */
    document.addEventListener('DOMContentLoaded', function() {
        var modalEl = document.getElementById('contactsModal');
        if (!modalEl || typeof MasterTable === 'undefined') return;

        var contactData = [
            { id: 1,  first_name: 'abul',        last_name: 'rahim',    email: 'amirtharaja@assureintermediary.com', company: 'asd',                               phone: '8807229955',     role: '',          last_login: '', active: 1 },
            { id: 2,  first_name: 'Heera',       last_name: 'B',        email: 'subraddy@subrascientific.in',        company: 'Subra',                             phone: '',               role: 'Manager',   last_login: '', active: 1 },
            { id: 3,  first_name: 'Jeevajothi',  last_name: 'SOFTWARE', email: 'GHARUDAsoftwares@gmail.com',         company: 'Abcde',                             phone: '09876543219',    role: '',          last_login: '', active: 1 },
            { id: 4,  first_name: 'GHARUDA',     last_name: 'SOFTWARE', email: 'madhupriya111999@gmail.com',         company: 'GHARUDA soft',                      phone: '09876543219',    role: '',          last_login: '', active: 1 },
            { id: 5,  first_name: 'kumar',       last_name: 'v',        email: 'stars.engineering@gmail.com',        company: 'Stars Engineering Equipment',       phone: '+91 93840 45159',role: 'Director',  last_login: '', active: 1 },
            { id: 6,  first_name: 'M.Suresh',    last_name: 'Kumar',    email: 'msk@mctindia.co',                    company: 'MICRO CONCEPT TOOLS',               phone: '+91 90030 65004',role: 'Managing Director', last_login: '', active: 1 },
            { id: 7,  first_name: 'Madhupriya',  last_name: 'S',        email: 'madhupriyas2911@gmail.com',          company: 'Bijlipay',                          phone: '+91 61485 33320',role: '',          last_login: '', active: 1 },
            { id: 8,  first_name: 'Mahesh',      last_name: 'A',        email: 'mahesh@gmail.com',                   company: 'Raja Enterprises',                  phone: '',               role: '',          last_login: '', active: 1 },
            { id: 9,  first_name: 'manikandan',  last_name: 'C',        email: 'hhp@industriahydraulic.in',          company: 'HINDUSTAN HYDRAULICS & PNEUMATICS', phone: '9840921889',     role: 'MAINT',     last_login: '', active: 1 },
            { id: 10, first_name: 'MOHAN',       last_name: 'S',        email: 'kaviyarasu@GHARUDAtechnology.com',   company: 'GG COMPANY',                        phone: '9677063368',     role: 'EVENT MANAGEMENT', last_login: '', active: 1 },
            { id: 11, first_name: 'Mr',          last_name: 'prabhu',   email: 'prabhu@gmail.com',                   company: 'Prabhu photos',                     phone: '8122780121',     role: '',          last_login: '', active: 1 },
            { id: 12, first_name: 'Mrs.Rani',    last_name: 'J',        email: 'uhp@universalhydraulic.in',          company: 'UNIVERSAL HYDRAULICS & PNEUMATICS', phone: '9500023351',     role: 'Sales',     last_login: '', active: 1 },
            { id: 13, first_name: 'selvakumar',  last_name: 'wtdg',     email: 'aaa2@gmail.com',                     company: 'gta',                               phone: '9384055381',     role: '',          last_login: '', active: 1 }
        ];

        var contactTable = MasterTable.init({
            tableId: 'contactsTable',
            tbodyId: 'ctTbody',
            idPrefix: 'ct',
            data: contactData,
            tableName: 'Contacts',
            primaryKey: 'id',
            searchFields: ['first_name', 'last_name', 'email', 'company', 'phone', 'role'],
            columns: [
                { field: 'first_name', title: 'First Name', sortable: true, render: function(val) {
                    return '<div class="d-flex align-items-center gap-2"><span class="badge rounded-circle bg-success-subtle text-success p-2"><i class="bi bi-person"></i></span><span class="fw-semibold text-dark">' + val + '</span></div>';
                } },
                { field: 'last_name', title: 'Last Name', sortable: true },
                { field: 'email', title: 'Email', sortable: true, render: function(val) {
                    return '<a href="mailto:' + val + '" class="text-secondary text-decoration-none">' + val + '</a>';
                } },
                { field: 'company', title: 'Company', sortable: true },
                { field: 'phone', title: 'Phone', sortable: true },
                { field: 'role', title: 'Role Position', sortable: true },
                { field: 'last_login', title: 'Last Login', sortable: true },
                { field: 'active', title: 'Active', sortable: false, render: function(val) {
                    return '<div class="form-check form-switch mb-0"><input class="form-check-input ct-switch-input" type="checkbox" role="switch" ' + (val ? 'checked' : '') + ' aria-label="Active"></div>';
                } },
                { field: null, title: 'Action', sortable: false, render: function(val, row) {
                    return '<div class="btn-group">' +
                        '<button type="button" class="btn btn-sm edit btn-edit" data-id="' + row.id + '" title="Edit"><i class="mdi mdi-pencil"></i></button>' +
                        '<button type="button" class="btn btn-sm danger btn-delete" data-id="' + row.id + '" title="Delete"><i class="mdi mdi-delete"></i></button>' +
                        '</div>';
                } }
            ],
            onEdit: function() {
                showBsToast('Edit contact');
            },
            onDelete: function(id) {
                contactTable.deleteItem(id);
                showBsToast('Contact deleted');
            }
        });

        modalEl.addEventListener('change', function(e) {
            if (e.target.matches('#ctTbody .ct-switch-input')) {
                var row = e.target.closest('tr'),
                    id = Number(row && row.dataset.id);
                contactTable.updateItem(id, { active: e.target.checked ? 1 : 0 });
                showBsToast('Contact marked ' + (e.target.checked ? 'active' : 'inactive'));
            }
        });
    });

    /* Main Customers Table Filtering, Bulk Actions, Active Switches & LocalStorage Sync */
    document.addEventListener('DOMContentLoaded', function() {
        var checkAll = document.getElementById('custCheckAll'),
            pgBody = document.getElementById('pgBody'),
            appliedFilter = 'all';

        // Load newly onboarded customers from customer-new.php via localStorage
        try {
            var stored = JSON.parse(localStorage.getItem('gh_new_customers') || '[]');
            stored.forEach(function(item, idx) {
                if (!pgBody) return;
                var enc = encodeURIComponent(item.company || 'Client');
                var tr = document.createElement('tr');
                tr.className = 'cust-row';
                tr.setAttribute('data-id', String(47 + idx));
                tr.setAttribute('data-active', '1');
                tr.innerHTML =
                    '<td><input type="checkbox" class="form-check-input cust-check"></td>' +
                    '<td class="fw-semibold text-neutral">' + (47 + idx) + '</td>' +
                    '<td><a href="customer-view.php?id=1&name=' + enc + '" class="fw-semibold text-dark text-decoration-none">' + (item.company || '') + '</a></td>' +
                    '<td><a href="customer-view.php?id=1&name=' + enc + '" class="text-secondary text-decoration-none">' + (item.contact || '') + '</a></td>' +
                    '<td><a href="mailto:' + (item.email || '') + '" class="text-secondary text-decoration-none">' + (item.email || '') + '</a></td>' +
                    '<td><span class="cust-phone d-inline-flex align-items-center gap-1" data-phone="' + (item.phone || '') + '"><span class="phone-text">' + (item.phone || '') + '</span></span></td>' +
                    '<td><div class="form-check form-switch mb-0"><input class="form-check-input js-active-toggle" type="checkbox" role="switch" checked aria-label="Active"></div></td>' +
                    '<td><span class="badge bg-success-subtle text-success border border-success-subtle">' + (item.group || 'Corporate') + '</span></td>' +
                    '<td class="text-neutral">' + (item.created || '') + '</td>' +
                    '<td><span class="badge bg-light text-dark border">Onboarded</span></td>' +
                    '<td><div class="d-flex align-items-center gap-1 flex-nowrap">' +
                        '<a href="customer-view.php?id=1&name=' + enc + '" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>' +
                        '<a href="quotation-create.php?client=' + enc + '" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>' +
                        '<a href="invoice-create.php?client=' + enc + '" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>' +
                        '<a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>' +
                    '</div></td>';
                pgBody.insertBefore(tr, pgBody.firstChild);
            });
        } catch (e) {}

        function refreshTable() {
            var tbl = document.getElementById('customersTable');
            if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') {
                tbl.autoTable.refresh();
            } else if (window.refreshAttendanceTable) {
                window.refreshAttendanceTable();
            }
        }

        function liveRows() {
            return Array.from(document.querySelectorAll('#pgBody .cust-row'));
        }

        window.attendanceRowMatches = function(row) {
            if (appliedFilter === 'active' && row.dataset.active !== '1') return false;
            if (appliedFilter === 'inactive' && row.dataset.active !== '0') return false;
            return true;
        };

        function updateSummary() {
            var list = liveRows(),
                active = list.filter(function(r) {
                    return r.dataset.active === '1';
                }).length;
            var elTot = document.getElementById('sumTotal'),
                elAct = document.getElementById('sumActive'),
                elIna = document.getElementById('sumInactive');
            if (elTot) elTot.textContent = list.length;
            if (elAct) elAct.textContent = active;
            if (elIna) elIna.textContent = list.length - active;
        }
        updateSummary();

        document.querySelectorAll('#custSummary [data-filter]').forEach(function(item) {
            item.addEventListener('click', function() {
                document.querySelectorAll('#custSummary .cust-summary-item .lbl').forEach(function(l) {
                    l.classList.remove('text-decoration-underline');
                });
                var lbl = this.querySelector('.lbl');
                if (lbl) lbl.classList.add('text-decoration-underline');
                appliedFilter = this.dataset.filter;
                refreshTable();
            });
        });

        var syncBtn = document.getElementById('custFormSync');
        if (syncBtn) {
            syncBtn.addEventListener('click', function() {
                showBsToast('Customer form sync completed');
            });
        }

        if (pgBody) {
            pgBody.addEventListener('change', function(e) {
                var row = e.target.closest('.cust-row');
                if (!row) return;
                if (e.target.classList.contains('cust-check')) {
                    row.classList.toggle('table-active', e.target.checked);
                    var vis = liveRows().filter(function(r) {
                        return r.style.display !== 'none';
                    });
                    if (checkAll) {
                        checkAll.checked = vis.length > 0 && vis.every(function(r) {
                            return r.querySelector('.cust-check').checked;
                        });
                    }
                }
                if (e.target.classList.contains('js-active-toggle')) {
                    row.dataset.active = e.target.checked ? '1' : '0';
                    updateSummary();
                    if (appliedFilter !== 'all') refreshTable();
                    showBsToast(e.target.checked ? 'Customer marked active' : 'Customer marked inactive');
                }
            });

            pgBody.addEventListener('click', function(e) {
                var reveal = e.target.closest('.js-reveal-phone');
                if (reveal) {
                    var wrap = reveal.closest('.cust-phone'),
                        shown = wrap.dataset.shown === '1';
                    wrap.querySelector('.phone-text').textContent = shown ? '••••••' + wrap.dataset.phone.slice(-4) : wrap.dataset.phone;
                    wrap.dataset.shown = shown ? '0' : '1';
                    reveal.querySelector('i').className = shown ? 'bi bi-eye-fill' : 'bi bi-eye-slash-fill';
                }
                if (e.target.closest('.js-no-permission')) {
                    showBsToast("You don't have permission to view this number", false);
                }
            });
        }

        if (checkAll) {
            checkAll.addEventListener('change', function() {
                var on = this.checked;
                liveRows().forEach(function(r) {
                    if (r.style.display === 'none') return;
                    var chk = r.querySelector('.cust-check');
                    if (chk) chk.checked = on;
                    r.classList.toggle('table-active', on);
                });
            });
        }

        document.querySelectorAll('[data-bulk]').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var selected = liveRows().filter(function(r) {
                    var chk = r.querySelector('.cust-check');
                    return chk && chk.checked;
                });
                if (!selected.length) {
                    showBsToast('Select at least one customer first', false);
                    return;
                }
                var action = this.dataset.bulk;
                if (action === 'delete') {
                    if (!confirm('Delete ' + selected.length + ' selected customer(s)?')) return;
                    selected.forEach(function(r) {
                        r.remove();
                    });
                } else {
                    var on = action === 'activate';
                    selected.forEach(function(r) {
                        r.dataset.active = on ? '1' : '0';
                        var tog = r.querySelector('.js-active-toggle');
                        if (tog) tog.checked = on;
                    });
                }
                if (checkAll) checkAll.checked = false;
                updateSummary();
                refreshTable();
                showBsToast('Bulk action applied to ' + selected.length + ' customer(s)');
            });
        });

        updateSummary();
        refreshTable();
    });
</script>
