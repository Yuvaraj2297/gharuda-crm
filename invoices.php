<?php include 'header.php'; ?>

<main class="inv-billing-page container-fluid px-0">
    <!-- Page Header & Action Bar in Single Row (lead.php & follow-up-list.php style, no breadcrumb, no stat cards) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;font-size:18px;">
                <i class="bi bi-receipt"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title fs-4">Invoices &amp; Billing Ledger</h1>
                <span class="text-muted font-11 d-none d-sm-inline">Track GST receivables, collect payments, issue tax invoices &amp; open Customer 360&deg; accounts</span>
            </div>
        </div>

        <!-- RIGHT: Actions in Single Row -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="invBillingStatusTabs" role="tablist">
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold inv-billing-filter-btn active" data-filter="all">All Invoices</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold inv-billing-filter-btn" data-filter="Paid">Paid</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold inv-billing-filter-btn" data-filter="Partially Paid">Partially Paid</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold inv-billing-filter-btn" data-filter="Overdue">Overdue</button>
            </div>

            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="offcanvas" data-bs-target="#invBillingFilterOffcanvas" aria-controls="invBillingFilterOffcanvas" id="invBillingOffcanvasFilterBtn">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="invBillingFilterCountBadge">0</span>
            </button>

            <div class="dropdown">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                    <i class="bi bi-lightning-charge-fill"></i><span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu" style="min-width: 245px;">
                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Billing Actions</li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php">
                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-plus-lg"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Create Tax Invoice</div>
                                <div class="text-muted" style="font-size:10px;">Issue new GST 18% invoice</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="quotations.php">
                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Quotations &amp; Proposals</div>
                                <div class="text-muted" style="font-size:10px;">Convert estimates to invoices</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="payments.php">
                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-credit-card-2-front"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Payments Received</div>
                                <div class="text-muted" style="font-size:10px;">View customer receipt ledger</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="expenses.php">
                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-wallet2"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Field Expenses</div>
                                <div class="text-muted" style="font-size:10px;">Track operational &amp; vendor bills</div>
                            </div>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx">
                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-file-earmark-excel"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Download ERP Excel</div>
                                <div class="text-muted" style="font-size:10px;">Export billing &amp; GST sheet</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <a href="invoice-create.php" class="btn btn-success btn-sm font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs">
                <i class="bi bi-plus-lg"></i><span>New Invoice</span>
            </a>
        </div>
    </div>

    <!-- Invoices Directory Table Card -->
    <div class="card-custom p-0 mb-4" style="overflow: visible;">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" id="invoicesTable" data-table-name="Invoices">
                <thead>
                    <tr>
                        <th class="ps-3" style="width: 60px;">S.No</th>
                        <th>Invoice #</th>
                        <th>Client / Account</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>
                        <th class="text-end">Total Amount</th>
                        <th class="text-end">Paid Amount</th>
                        <th class="text-end">Balance Due</th>
                        <th>Status</th>
                        <th class="text-end pe-3" style="width: 110px;">Action</th>
                    </tr>
                </thead>
                <tbody id="invoicesTbody">
                    <tr data-inv="INV-2026-081" data-client="Power Spares Engineering" data-client-id="1" data-milestone="M1: Advance Sign-off" data-inv-date="15-Jan-2026" data-due-date="15-Feb-2026" data-total="₹1,50,000" data-paid="₹1,50,000" data-balance="₹0" data-status="Paid">
                        <td class="ps-3">1</td>
                        <td class="fw-bold"><a href="#" class="inv-num-link" data-inv="INV-2026-081">#INV-2026-081</a></td>
                        <td>
                            <div class="fw-bold text-dark">Power Spares Engineering</div>
                            <div class="text-muted small">M1: Advance Sign-off</div>
                        </td>
                        <td class="small text-muted">15-Jan-2026</td>
                        <td class="small fw-semibold text-dark">15-Feb-2026</td>
                        <td class="text-end fw-bold text-dark">₹1,50,000</td>
                        <td class="text-end text-success fw-semibold" data-inv-paid-cell>₹1,50,000</td>
                        <td class="text-end text-muted" data-inv-bal-cell>₹0</td>
                        <td data-inv-status-cell><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Paid</span></td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Invoice Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-inv-360" data-inv="INV-2026-081">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Invoice 360&deg; Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Summary, GST &amp; payment status</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li data-inv-collect-li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="payments.php">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt-cutoff"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Payment Receipt</div>
                                                <div class="text-muted" style="font-size: 10px;">100% settled in ledger</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="customer-view.php?id=1&amp;name=Power+Spares+Engineering">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-person-vcard"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg; View</div>
                                                <div class="text-muted" style="font-size: 10px;">Open client billing profile</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" onclick="window.print();">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print / Download PDF</div>
                                                <div class="text-muted" style="font-size: 10px;">Generate tax invoice copy</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-inv" data-inv="INV-2026-081">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove invoice record</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-inv="INV-2026-088" data-client="Zen Publications" data-client-id="2" data-milestone="Digital Portal Integration" data-inv-date="22-Jan-2026" data-due-date="22-Feb-2026" data-total="₹2,50,000" data-paid="₹1,25,000" data-balance="₹1,25,000" data-status="Partially Paid">
                        <td class="ps-3">2</td>
                        <td class="fw-bold"><a href="#" class="inv-num-link" data-inv="INV-2026-088">#INV-2026-088</a></td>
                        <td>
                            <div class="fw-bold text-dark">Zen Publications</div>
                            <div class="text-muted small">Digital Portal Integration</div>
                        </td>
                        <td class="small text-muted">22-Jan-2026</td>
                        <td class="small fw-semibold text-dark">22-Feb-2026</td>
                        <td class="text-end fw-bold text-dark">₹2,50,000</td>
                        <td class="text-end text-success fw-semibold" data-inv-paid-cell>₹1,25,000</td>
                        <td class="text-end text-danger fw-bold" data-inv-bal-cell>₹1,25,000</td>
                        <td data-inv-status-cell><span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Partially Paid</span></td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Invoice Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-inv-360" data-inv="INV-2026-088">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Invoice 360&deg; Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Summary, GST &amp; payment status</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li data-inv-collect-li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cash-coin"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Collect Payment</div>
                                                <div class="text-muted" style="font-size: 10px;">Record customer receipt</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="payments.php?invoice=INV-2026-088&amp;client=Zen+Publications&amp;amount=125000">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-credit-card-2-front"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Record in Payments Ledger</div>
                                                <div class="text-muted" style="font-size: 10px;">Sync with bank UTR</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="customer-view.php?id=2&amp;name=Zen+Publications">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-person-vcard"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg; View</div>
                                                <div class="text-muted" style="font-size: 10px;">Open client billing profile</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" onclick="window.print();">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print / Download PDF</div>
                                                <div class="text-muted" style="font-size: 10px;">Generate tax invoice copy</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-inv" data-inv="INV-2026-088">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove invoice record</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-inv="INV-2026-094" data-client="Hindustan Hydraulics" data-client-id="3" data-milestone="Annual AMC Support" data-inv-date="10-Jan-2026" data-due-date="25-Jan-2026" data-total="₹2,80,000" data-paid="₹0" data-balance="₹2,80,000" data-status="Overdue">
                        <td class="ps-3">3</td>
                        <td class="fw-bold"><a href="#" class="inv-num-link" data-inv="INV-2026-094">#INV-2026-094</a></td>
                        <td>
                            <div class="fw-bold text-dark">Hindustan Hydraulics</div>
                            <div class="text-muted small">Annual AMC Support</div>
                        </td>
                        <td class="small text-muted">10-Jan-2026</td>
                        <td class="small fw-semibold text-danger">25-Jan-2026</td>
                        <td class="text-end fw-bold text-dark">₹2,80,000</td>
                        <td class="text-end text-success fw-semibold" data-inv-paid-cell>₹0</td>
                        <td class="text-end text-danger fw-bold" data-inv-bal-cell>₹2,80,000</td>
                        <td data-inv-status-cell><span class="badge rounded-pill bg-danger-subtle text-danger border border-danger-subtle px-2 py-1">Overdue</span></td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Invoice Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-inv-360" data-inv="INV-2026-094">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Invoice 360&deg; Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Summary, GST &amp; payment status</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li data-inv-collect-li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cash-coin"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Collect Payment</div>
                                                <div class="text-muted" style="font-size: 10px;">Record customer receipt</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="payments.php?invoice=INV-2026-094&amp;client=Hindustan+Hydraulics&amp;amount=280000">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-credit-card-2-front"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Record in Payments Ledger</div>
                                                <div class="text-muted" style="font-size: 10px;">Sync with bank UTR</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-person-vcard"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Customer 360&deg; View</div>
                                                <div class="text-muted" style="font-size: 10px;">Open client billing profile</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" onclick="window.print();">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print / Download PDF</div>
                                                <div class="text-muted" style="font-size: 10px;">Generate tax invoice copy</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-inv" data-inv="INV-2026-094">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove invoice record</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- ===== Invoices Filter Offcanvas (lead.php & follow-up-list.php style) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="invBillingFilterOffcanvas" aria-labelledby="invBillingFilterOffcanvasLabel" style="width: 380px;">
    <div class="offcanvas-header border-bottom py-3 px-3">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2 mb-0" id="invBillingFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Tax Invoices
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="invBillingStatusSelect">Payment Status</label>
            <select class="form-select select2 form-select-sm" id="invBillingStatusSelect">
                <option value="all">All Invoice Statuses</option>
                <option value="Paid">Paid</option>
                <option value="Partially Paid">Partially Paid</option>
                <option value="Overdue">Overdue</option>
                <option value="Unpaid">Unpaid</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="invBillingClientSelect">Client / Account</label>
            <select class="form-select select2 form-select-sm" id="invBillingClientSelect">
                <option value="">All Clients</option>
                <option value="Power Spares Engineering">Power Spares Engineering</option>
                <option value="Zen Publications">Zen Publications</option>
                <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="invBillingSearchInput">Keyword / Invoice #</label>
            <input type="text" class="form-control form-control-sm" id="invBillingSearchInput" placeholder="Search invoice #, client, milestone...">
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2 bg-light-subtle">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" id="invBillingResetFilterBtn">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" id="invBillingApplyFilterBtn">
            <i class="bi bi-funnel me-1"></i> Apply Filters
        </button>
    </div>
</div>

<!-- ===== Invoice 360° Overview Modal ===== -->
<div class="modal fade" id="invoiceDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-receipt fs-5"></i>
                    </span>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-5" id="invModalNum">#INV-2026-081</h5>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5" id="invModalStatus">Paid</span>
                        </div>
                        <div class="small text-muted" id="invModalClientSubtitle">Power Spares Engineering &middot; M1: Advance Sign-off</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-white">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Total Invoice Amount</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="invModalTotal">₹0</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Paid / Realized</span>
                            <h6 class="fw-bold text-success mb-0 fs-6" id="invModalPaid">₹0</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Balance Due</span>
                            <h6 class="fw-bold text-danger mb-0 fs-6" id="invModalBalance">₹0</h6>
                        </div>
                    </div>
                </div>

                <div class="card border border-light-subtle rounded-3 p-3 mb-4">
                    <h6 class="fw-bold text-dark mb-3 font-13 text-uppercase" style="letter-spacing:0.5px;">
                        <i class="bi bi-building text-primary me-1.5"></i>Billing &amp; Schedule Details
                    </h6>
                    <div class="row g-3 font-13">
                        <div class="col-sm-6">
                            <div class="text-muted small">Client / Account Name</div>
                            <div class="fw-semibold text-dark mt-0.5" id="invModalClient">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Project / Milestone</div>
                            <div class="fw-semibold text-dark mt-0.5" id="invModalMilestone">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Invoice Issue Date</div>
                            <div class="fw-semibold text-dark mt-0.5" id="invModalDate">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Payment Due Date</div>
                            <div class="fw-semibold text-dark mt-0.5" id="invModalDueDate">—</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">
                    <span class="text-muted small fw-semibold">Quick Actions:</span>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="button" class="btn btn-sm btn-success d-inline-flex align-items-center gap-1.5 fw-semibold font-12" id="invModalCollectBtn">
                            <i class="bi bi-cash-coin"></i> Collect Payment
                        </button>
                        <a href="customer-view.php" id="invModalCustomerBtn" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-person-vcard"></i> Customer 360&deg;
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1.5 fw-semibold font-12" onclick="window.print();">
                            <i class="bi bi-printer"></i> Print Invoice
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light-subtle py-2.5 px-4 border-top">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Record Payment -->
<div class="modal fade" id="recordPaymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom bg-light bg-opacity-50">
                <h5 class="modal-title fw-bold">Record Customer Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="recordPaymentForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Payment Amount Received (₹) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="modalPayAmt" placeholder="Enter amount" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Payment Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="modalPayDate" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Payment Mode</label>
                        <select class="form-select" id="modalPayMode">
                            <option value="NEFT / RTGS">Bank Transfer (NEFT / RTGS)</option>
                            <option value="UPI / QR">UPI / Digital QR</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-semibold small">Transaction / Reference #</label>
                        <input type="text" class="form-control" id="modalPayUtr" value="HDFC<?php echo rand(10000000, 99999999); ?>" placeholder="e.g. UTR / Cheque # / Ref ID">
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmInvoicePayBtn" data-bs-dismiss="modal"><i class="bi bi-check2-circle me-1"></i>Confirm Payment</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tbody = document.getElementById('invoicesTbody');
    var tableEl = document.getElementById('invoicesTable');
    var activeRow = null;
    var allInvoiceRows = Array.from(tbody.querySelectorAll('tr[data-inv]'));

    function buildInvoiceActionMenuHtml(invNum, cust, rawAmt, isPaid) {
        var safeInv = String(invNum || 'INV-2026').replace(/"/g, '&quot;');
        var encCust = encodeURIComponent(cust || 'Client');
        var encInv = encodeURIComponent(invNum || 'INV-2026');
        var encAmt = encodeURIComponent(rawAmt || '590000');

        var collectLi = isPaid
            ? '<li data-inv-collect-li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="payments.php"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt-cutoff"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">View Payment Receipt</div><div class="text-muted" style="font-size: 10px;">100% settled in ledger</div></div></a></li>'
            : '<li data-inv-collect-li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" data-bs-toggle="modal" data-bs-target="#recordPaymentModal"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cash-coin"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Collect Payment</div><div class="text-muted" style="font-size: 10px;">Record customer receipt</div></div></button></li>';

        return '<div class="dropdown">' +
            '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                '<span>Actions</span>' +
            '</button>' +
            '<ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">' +
                '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Invoice Actions</li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-inv-360" data-inv="' + safeInv + '"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Invoice 360&deg; Overview</div><div class="text-muted" style="font-size: 10px;">Summary, GST &amp; payment status</div></div></button></li>' +
                collectLi +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="payments.php?invoice=' + encInv + '&client=' + encCust + '&amount=' + encAmt + '"><span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-credit-card-2-front"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Record in Payments Ledger</div><div class="text-muted" style="font-size: 10px;">Sync with bank UTR</div></div></a></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="customer-view.php?id=1&name=' + encCust + '"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-person-vcard"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Customer 360&deg; View</div><div class="text-muted" style="font-size: 10px;">Open client billing profile</div></div></a></li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" onclick="window.print();"><span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-printer"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Print / Download PDF</div><div class="text-muted" style="font-size: 10px;">Generate tax invoice copy</div></div></button></li>' +
                '<li><hr class="dropdown-divider my-1"></li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-inv" data-inv="' + safeInv + '"><span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span><div class="text-start"><div class="fw-semibold text-danger font-12">Delete Invoice</div><div class="text-muted" style="font-size: 10px;">Remove invoice record</div></div></button></li>' +
            '</ul>' +
        '</div>';
    }

    try {
        var list = JSON.parse(localStorage.getItem('gh_new_invoices') || '[]');
        list.forEach(function (inv) {
            if (!tbody) return;
            var invNo = String(inv.invNum || 'INV-2026-NEW').replace(/^#/, '');
            var cust = inv.cust || 'Client';
            var total = inv.total || '₹0';
            var tr = document.createElement('tr');
            tr.setAttribute('data-inv', invNo);
            tr.setAttribute('data-client', cust);
            tr.setAttribute('data-client-id', '1');
            tr.setAttribute('data-milestone', 'Newly Issued Tax Invoice');
            tr.setAttribute('data-inv-date', inv.invDate || '29-Oct-2026');
            tr.setAttribute('data-due-date', inv.dueDate || '29-Nov-2026');
            tr.setAttribute('data-total', total);
            tr.setAttribute('data-paid', '₹0');
            tr.setAttribute('data-balance', total);
            tr.setAttribute('data-status', 'Unpaid');

            tr.innerHTML =
                '<td class="ps-3">1</td>' +
                '<td class="fw-bold"><a href="#" class="inv-num-link" data-inv="' + invNo + '">#' + invNo + '</a></td>' +
                '<td><div class="fw-bold text-dark">' + cust + '</div><div class="text-muted small">Newly Issued Tax Invoice</div></td>' +
                '<td class="small text-muted">' + (inv.invDate || '29-Oct-2026') + '</td>' +
                '<td class="small fw-semibold text-dark">' + (inv.dueDate || '29-Nov-2026') + '</td>' +
                '<td class="text-end fw-bold text-dark">' + total + '</td>' +
                '<td class="text-end text-success fw-semibold" data-inv-paid-cell>₹0</td>' +
                '<td class="text-end text-danger fw-bold" data-inv-bal-cell>' + total + '</td>' +
                '<td data-inv-status-cell><span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Unpaid</span></td>' +
                '<td class="text-end pe-3">' + buildInvoiceActionMenuHtml(invNo, cust, inv.rawAmount, false) + '</td>';

            tbody.insertBefore(tr, tbody.firstChild);
            allInvoiceRows.unshift(tr);
        });
    } catch (e) {}

    // Capture-phase dropdown delegation with viewport boundary & fixed popper strategy
    document.addEventListener('click', function (e) {
        var toggle = e.target.closest('.btn-table-action[data-bs-toggle="dropdown"]');
        if (toggle && window.bootstrap && bootstrap.Dropdown) {
            bootstrap.Dropdown.getOrCreateInstance(toggle, {
                boundary: 'viewport',
                popperConfig: { strategy: 'fixed' }
            });
        }
        var actItem = e.target.closest('.table-action-menu .dropdown-item');
        if (actItem && window.bootstrap && bootstrap.Dropdown) {
            var dd = actItem.closest('.dropdown');
            var btn = dd ? dd.querySelector('[data-bs-toggle="dropdown"]') : null;
            if (btn) {
                var inst = bootstrap.Dropdown.getInstance(btn);
                if (inst) inst.hide();
            }
        }
    }, true);

    // Invoice 360 Overview Modal
    window.openInvoice360Modal = function (tr) {
        if (!tr) return;
        activeRow = tr;
        var invNo = tr.getAttribute('data-inv') || '';
        var client = tr.getAttribute('data-client') || '';
        var clientId = tr.getAttribute('data-client-id') || '1';
        var milestone = tr.getAttribute('data-milestone') || 'Tax Invoice';
        var invDate = tr.getAttribute('data-inv-date') || '—';
        var dueDate = tr.getAttribute('data-due-date') || '—';
        var total = tr.getAttribute('data-total') || '₹0';
        var paid = tr.getAttribute('data-paid') || '₹0';
        var balance = tr.getAttribute('data-balance') || '₹0';
        var status = tr.getAttribute('data-status') || 'Unpaid';

        var setTxt = function (id, val) {
            var el = document.getElementById(id);
            if (el) el.textContent = val;
        };
        setTxt('invModalNum', '#' + invNo.replace(/^#/, ''));
        setTxt('invModalClientSubtitle', client + ' · ' + milestone);
        setTxt('invModalTotal', total);
        setTxt('invModalPaid', paid);
        setTxt('invModalBalance', balance);
        setTxt('invModalClient', client);
        setTxt('invModalMilestone', milestone);
        setTxt('invModalDate', invDate);
        setTxt('invModalDueDate', dueDate);

        var stBadge = document.getElementById('invModalStatus');
        if (stBadge) {
            stBadge.textContent = status;
            if (status === 'Paid') {
                stBadge.className = 'badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5';
            } else if (status === 'Overdue') {
                stBadge.className = 'badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill font-11 px-2.5 py-0.5';
            } else {
                stBadge.className = 'badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill font-11 px-2.5 py-0.5';
            }
        }

        var collectBtn = document.getElementById('invModalCollectBtn');
        if (collectBtn) {
            collectBtn.classList.toggle('d-none', status === 'Paid');
        }
        var custBtn = document.getElementById('invModalCustomerBtn');
        if (custBtn) {
            custBtn.href = 'customer-view.php?id=' + encodeURIComponent(clientId) + '&name=' + encodeURIComponent(client);
        }

        var modalEl = document.getElementById('invoiceDetailModal');
        if (modalEl && window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    };

    var invModalCollectBtn = document.getElementById('invModalCollectBtn');
    if (invModalCollectBtn) {
        invModalCollectBtn.addEventListener('click', function () {
            var detailModalEl = document.getElementById('invoiceDetailModal');
            if (detailModalEl && window.bootstrap && bootstrap.Modal) {
                var inst = bootstrap.Modal.getInstance(detailModalEl);
                if (inst) inst.hide();
            }
            if (activeRow) {
                var balText = (activeRow.getAttribute('data-balance') || '').replace(/[^0-9]/g, '');
                var amtInput = document.getElementById('modalPayAmt');
                if (amtInput && balText) amtInput.value = balText;
                if (window.bootstrap) {
                    bootstrap.Modal.getOrCreateInstance(document.getElementById('recordPaymentModal')).show();
                }
            }
        });
    }

    // Delegated Action Handlers (Invoice 360, Collect Payment, Delete Invoice)
    document.addEventListener('click', function (e) {
        var inv360Btn = e.target.closest('.btn-inv-360');
        if (inv360Btn) {
            e.preventDefault();
            var tr360 = inv360Btn.closest('tr');
            if (tr360) window.openInvoice360Modal(tr360);
            return;
        }

        var delBtn = e.target.closest('.btn-delete-inv');
        if (delBtn) {
            e.preventDefault();
            var trDel = delBtn.closest('tr');
            var invCode = delBtn.getAttribute('data-inv') || '';
            if (trDel && confirm('Are you sure you want to delete invoice "#' + invCode + '"?')) {
                allInvoiceRows = allInvoiceRows.filter(function (r) { return r !== trDel; });
                trDel.remove();
                applyInvoiceFilter();
            }
            return;
        }

        var btn = e.target.closest('[data-bs-target="#recordPaymentModal"]');
        if (!btn) return;
        activeRow = btn.closest('tr');
        if (activeRow) {
            var balText = (activeRow.getAttribute('data-balance') || '').replace(/[^0-9]/g, '');
            var amtInput = document.getElementById('modalPayAmt');
            if (amtInput && balText) amtInput.value = balText;
        }
    });

    // Table Row Click -> opens Invoice 360 Modal while safely ignoring Actions dropdown & interactive controls
    if (tableEl) {
        tableEl.addEventListener('click', function (e) {
            if (
                e.target.closest('input, button, select, textarea') ||
                e.target.closest('.btn-table-action') ||
                e.target.closest('.lead-act-btn') ||
                e.target.closest('.dropdown') ||
                e.target.closest('.dropdown-menu') ||
                e.target.closest('.table-action-menu') ||
                e.target.closest('[data-bs-toggle="dropdown"]') ||
                e.target.closest('a:not(.inv-num-link)')
            ) {
                return;
            }

            var cell = e.target.closest('td');
            if (cell && (cell.querySelector('.btn-table-action, .lead-act-btn, .dropdown') || cell.classList.contains('text-end'))) {
                return;
            }

            var tr = e.target.closest('tr[data-inv]');
            if (tr) {
                e.preventDefault();
                window.openInvoice360Modal(tr);
            }
        });
    }

    var confirmBtn = document.getElementById('confirmInvoicePayBtn');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function () {
            if (!activeRow) return;
            var invId = activeRow.getAttribute('data-inv') || '';
            var cust = activeRow.getAttribute('data-client') || 'Customer';
            var totalText = activeRow.getAttribute('data-total') || '₹0';
            var amtVal = Number(document.getElementById('modalPayAmt').value || 0).toLocaleString('en-IN');
            var modeVal = document.getElementById('modalPayMode').value;
            var utrVal = document.getElementById('modalPayUtr').value;
            var dateVal = document.getElementById('modalPayDate').value;

            try {
                var list = JSON.parse(localStorage.getItem('gh_new_payments') || '[]');
                list.unshift({ payId: 'PAY-2026-' + Math.floor(100 + Math.random() * 900), inv: invId, cust: cust, amt: amtVal, mode: modeVal, utr: utrVal, date: dateVal });
                localStorage.setItem('gh_new_payments', JSON.stringify(list.slice(0, 20)));
            } catch (e) {}

            activeRow.setAttribute('data-paid', totalText);
            activeRow.setAttribute('data-balance', '₹0');
            activeRow.setAttribute('data-status', 'Paid');

            var paidCell = activeRow.querySelector('[data-inv-paid-cell]');
            if (paidCell) paidCell.textContent = totalText;

            var balCell = activeRow.querySelector('[data-inv-bal-cell]');
            if (balCell) {
                balCell.textContent = '₹0';
                balCell.className = 'text-end text-muted';
            }

            var stCell = activeRow.querySelector('[data-inv-status-cell]');
            if (stCell) {
                stCell.innerHTML = '<span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Paid</span>';
            }

            var collectLi = activeRow.querySelector('[data-inv-collect-li]');
            if (collectLi) {
                collectLi.innerHTML = '<a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="payments.php"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt-cutoff"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">View Payment Receipt</div><div class="text-muted" style="font-size: 10px;">100% settled in ledger</div></div></a>';
            }

            applyInvoiceFilter();
        });
    }

    // Filter & Search State
    var currentInvFilter = 'all';

    function updateFilterBadge() {
        var count = 0;
        var q = (document.getElementById('invBillingSearchInput').value || '').trim();
        var client = document.getElementById('invBillingClientSelect') ? document.getElementById('invBillingClientSelect').value : '';
        if (currentInvFilter && currentInvFilter !== 'all') count++;
        if (client) count++;
        if (q) count++;

        var badge = document.getElementById('invBillingFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            badge.classList.toggle('d-none', count === 0);
        }
    }

    function applyInvoiceFilter() {
        var q = (document.getElementById('invBillingSearchInput').value || '').toLowerCase().trim();
        var client = document.getElementById('invBillingClientSelect') ? document.getElementById('invBillingClientSelect').value : '';
        var matched = [];

        allInvoiceRows.forEach(function (tr) {
            var st = tr.getAttribute('data-status') || '';
            var rowClient = tr.getAttribute('data-client') || '';
            var text = tr.textContent.toLowerCase();

            var matchSt = (currentInvFilter === 'all') || (st === currentInvFilter);
            var matchClient = !client || (rowClient === client);
            var matchQ = !q || text.indexOf(q) !== -1;

            if (matchSt && matchClient && matchQ) {
                tr.style.display = '';
                matched.push(tr);
            }
        });

        tbody.innerHTML = '';
        matched.forEach(function (tr) {
            tbody.appendChild(tr);
        });
        if (tableEl && tableEl.autoTable && typeof tableEl.autoTable.render === 'function') {
            tableEl.autoTable.render();
        }
        updateFilterBadge();
    }

    // Header Status Toggle Pills
    Array.prototype.forEach.call(document.querySelectorAll('.inv-billing-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.inv-billing-filter-btn'), function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            currentInvFilter = btn.getAttribute('data-filter') || 'all';
            var stSel = document.getElementById('invBillingStatusSelect');
            if (stSel) {
                stSel.value = currentInvFilter;
                if (window.jQuery && jQuery.fn.select2) jQuery(stSel).trigger('change.select2');
            }
            applyInvoiceFilter();
        });
    });

    // Offcanvas Apply Filters
    var applyBtn = document.getElementById('invBillingApplyFilterBtn');
    if (applyBtn) {
        applyBtn.addEventListener('click', function () {
            var stSel = document.getElementById('invBillingStatusSelect');
            if (stSel) {
                currentInvFilter = stSel.value || 'all';
                Array.prototype.forEach.call(document.querySelectorAll('.inv-billing-filter-btn'), function (b) {
                    b.classList.toggle('active', b.getAttribute('data-filter') === currentInvFilter);
                });
            }
            applyInvoiceFilter();
            var oc = document.getElementById('invBillingFilterOffcanvas');
            if (oc && window.bootstrap && bootstrap.Offcanvas) {
                var inst = bootstrap.Offcanvas.getInstance(oc);
                if (inst) inst.hide();
            }
        });
    }

    // Offcanvas Reset Filters
    var resetBtn = document.getElementById('invBillingResetFilterBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            currentInvFilter = 'all';
            document.getElementById('invBillingSearchInput').value = '';
            ['invBillingStatusSelect', 'invBillingClientSelect'].forEach(function (id) {
                var el = document.getElementById(id);
                if (el) {
                    el.value = id === 'invBillingStatusSelect' ? 'all' : '';
                    if (window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change.select2');
                }
            });
            Array.prototype.forEach.call(document.querySelectorAll('.inv-billing-filter-btn'), function (b) {
                b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
            });
            applyInvoiceFilter();
        });
    }
});
</script>

<?php include 'footer.php'; ?>
