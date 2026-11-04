<?php
include 'header.php';
$preInvoice = isset($_GET['invoice']) ? htmlspecialchars($_GET['invoice']) : '';
$preClient  = isset($_GET['client']) ? htmlspecialchars($_GET['client']) : (isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : '');
$preAmount  = isset($_GET['amount']) ? htmlspecialchars($_GET['amount']) : '';
?>

<main class="pay-page container-fluid px-0">
    <!-- Page Header & Action Bar in Single Row (lead.php & follow-up-list.php style, no breadcrumb, no stat cards) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;font-size:18px;">
                <i class="bi bi-credit-card-2-front"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title fs-4">Payments Received</h1>
                <span class="text-muted font-11 d-none d-sm-inline">Official NEFT, RTGS, UPI &amp; Cheque receipts linked to GST Tax Invoices</span>
            </div>
        </div>

        <!-- RIGHT: Actions in Single Row -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="payModeTabs" role="tablist">
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold pay-filter-btn active" data-filter="all">All Receipts</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold pay-filter-btn" data-filter="NEFT">NEFT / RTGS</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold pay-filter-btn" data-filter="Bank">Bank Transfer</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold pay-filter-btn" data-filter="UPI">UPI / IMPS</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold pay-filter-btn" data-filter="Cheque">Cheque</button>
            </div>

            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="offcanvas" data-bs-target="#payFilterOffcanvas" aria-controls="payFilterOffcanvas" id="payOffcanvasFilterBtn">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="payFilterCountBadge">0</span>
            </button>

            <div class="dropdown">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                    <i class="bi bi-lightning-charge-fill"></i><span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu" style="min-width: 245px;">
                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Collection Actions</li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-plus-lg"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Record Customer Payment</div>
                                <div class="text-muted" style="font-size:10px;">Issue official receipt voucher</div>
                            </div>
                        </button>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoices.php">
                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-ruled"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Invoices &amp; Billing Ledger</div>
                                <div class="text-muted" style="font-size:10px;">Check open GST receivables</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="expenses.php">
                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-receipt"></i></span>
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
                                <div class="text-muted" style="font-size:10px;">Export collections ledger</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <button type="button" class="btn btn-success btn-sm font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
                <i class="bi bi-plus-lg"></i><span>Record Payment</span>
            </button>
        </div>
    </div>

    <!-- Payments Ledger Table -->
    <div class="card-custom p-0 mb-4" style="overflow: visible;">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" id="paymentsTable" data-table-name="Payments_Received">
                <thead>
                    <tr>
                        <th class="ps-3" style="width: 60px;">S.No</th>
                        <th>Payment #</th>
                        <th>Invoice #</th>
                        <th>Customer</th>
                        <th>Payment Mode</th>
                        <th>Transaction / UTR</th>
                        <th class="text-end">Amount (INR)</th>
                        <th>Payment Date</th>
                        <th class="text-end pe-3" style="width: 110px;">Action</th>
                    </tr>
                </thead>
                <tbody id="paymentsTbody">
                    <tr data-pay="PAY-2026-001" data-inv="INV-2026-081" data-cust="Power Spares Engineering" data-cust-id="1" data-mode="NEFT / RTGS" data-utr="HDFC0001847291" data-amount="₹14,75,000" data-date="14-Oct-2026">
                        <td class="ps-3">1</td>
                        <td class="fw-bold"><a href="#" class="pay-num-link" data-pay="PAY-2026-001">PAY-2026-001</a></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold text-dark">INV-2026-081</a></td>
                        <td>
                            <div class="fw-bold text-dark"><i class="bi bi-building me-1 text-muted"></i>Power Spares Engineering</div>
                        </td>
                        <td><span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">NEFT / RTGS</span></td>
                        <td><code class="text-dark">HDFC0001847291</code></td>
                        <td class="text-end"><strong class="text-success">₹14,75,000</strong></td>
                        <td class="small text-muted">14-Oct-2026</td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Receipt Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-pay-360" data-pay="PAY-2026-001">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Payment 360&deg; Receipt</div>
                                                <div class="text-muted" style="font-size: 10px;">Voucher details &amp; UTR log</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="invoices.php">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-file-earmark-ruled"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Linked Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Open #INV-2026-081</div>
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
                                                <div class="fw-semibold text-dark font-12">Print Receipt Voucher</div>
                                                <div class="text-muted" style="font-size: 10px;">Download official copy</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-pay" data-pay="PAY-2026-001">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete Receipt</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove payment entry</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-pay="PAY-2026-002" data-inv="INV-2026-094" data-cust="Hindustan Hydraulics" data-cust-id="3" data-mode="Bank Transfer" data-utr="ICIC9928374612" data-amount="₹9,91,200" data-date="08-Oct-2026">
                        <td class="ps-3">2</td>
                        <td class="fw-bold"><a href="#" class="pay-num-link" data-pay="PAY-2026-002">PAY-2026-002</a></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold text-dark">INV-2026-094</a></td>
                        <td>
                            <div class="fw-bold text-dark"><i class="bi bi-building me-1 text-muted"></i>Hindustan Hydraulics</div>
                        </td>
                        <td><span class="badge rounded-pill bg-info-subtle text-info border border-info-subtle px-2 py-1">Bank Transfer</span></td>
                        <td><code class="text-dark">ICIC9928374612</code></td>
                        <td class="text-end"><strong class="text-success">₹9,91,200</strong></td>
                        <td class="small text-muted">08-Oct-2026</td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Receipt Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-pay-360" data-pay="PAY-2026-002">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Payment 360&deg; Receipt</div>
                                                <div class="text-muted" style="font-size: 10px;">Voucher details &amp; UTR log</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="invoices.php">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-file-earmark-ruled"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Linked Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Open #INV-2026-094</div>
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
                                                <div class="fw-semibold text-dark font-12">Print Receipt Voucher</div>
                                                <div class="text-muted" style="font-size: 10px;">Download official copy</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-pay" data-pay="PAY-2026-002">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete Receipt</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove payment entry</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-pay="PAY-2026-003" data-inv="INV-2026-004" data-cust="Gharuda Software" data-cust-id="4" data-mode="UPI / IMPS" data-utr="UPI-88371902847" data-amount="₹14,16,000" data-date="01-Oct-2026">
                        <td class="ps-3">3</td>
                        <td class="fw-bold"><a href="#" class="pay-num-link" data-pay="PAY-2026-003">PAY-2026-003</a></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold text-dark">INV-2026-004</a></td>
                        <td>
                            <div class="fw-bold text-dark"><i class="bi bi-building me-1 text-muted"></i>Gharuda Software</div>
                        </td>
                        <td><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">UPI / IMPS</span></td>
                        <td><code class="text-dark">UPI-88371902847</code></td>
                        <td class="text-end"><strong class="text-success">₹14,16,000</strong></td>
                        <td class="small text-muted">01-Oct-2026</td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Receipt Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-pay-360" data-pay="PAY-2026-003">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Payment 360&deg; Receipt</div>
                                                <div class="text-muted" style="font-size: 10px;">Voucher details &amp; UTR log</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="invoices.php">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-file-earmark-ruled"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Linked Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Open #INV-2026-004</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="customer-view.php?id=4&amp;name=Gharuda+Software">
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
                                                <div class="fw-semibold text-dark font-12">Print Receipt Voucher</div>
                                                <div class="text-muted" style="font-size: 10px;">Download official copy</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-pay" data-pay="PAY-2026-003">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete Receipt</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove payment entry</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-pay="PAY-2026-004" data-inv="INV-2026-088" data-cust="Zen Publications" data-cust-id="2" data-mode="Cheque" data-utr="CHQ-009482" data-amount="₹7,37,800" data-date="25-Sep-2026">
                        <td class="ps-3">4</td>
                        <td class="fw-bold"><a href="#" class="pay-num-link" data-pay="PAY-2026-004">PAY-2026-004</a></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold text-dark">INV-2026-088</a></td>
                        <td>
                            <div class="fw-bold text-dark"><i class="bi bi-building me-1 text-muted"></i>Zen Publications</div>
                        </td>
                        <td><span class="badge rounded-pill bg-secondary-subtle text-secondary border px-2 py-1">Cheque</span></td>
                        <td><code class="text-dark">CHQ-009482</code></td>
                        <td class="text-end"><strong class="text-success">₹7,37,800</strong></td>
                        <td class="small text-muted">25-Sep-2026</td>
                        <td class="text-end pe-3">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Receipt Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-pay-360" data-pay="PAY-2026-004">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Payment 360&deg; Receipt</div>
                                                <div class="text-muted" style="font-size: 10px;">Voucher details &amp; UTR log</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="invoices.php">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-file-earmark-ruled"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Linked Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Open #INV-2026-088</div>
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
                                                <div class="fw-semibold text-dark font-12">Print Receipt Voucher</div>
                                                <div class="text-muted" style="font-size: 10px;">Download official copy</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-pay" data-pay="PAY-2026-004">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete Receipt</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove payment entry</div>
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

<!-- ===== Payments Filter Offcanvas (lead.php & follow-up-list.php style) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="payFilterOffcanvas" aria-labelledby="payFilterOffcanvasLabel" style="width: 380px;">
    <div class="offcanvas-header border-bottom py-3 px-3">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2 mb-0" id="payFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Payment Receipts
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="payModeFilterSelect">Payment Mode</label>
            <select class="form-select select2 form-select-sm" id="payModeFilterSelect">
                <option value="all">All Payment Modes</option>
                <option value="NEFT">NEFT / RTGS</option>
                <option value="Bank">Bank Transfer</option>
                <option value="UPI">UPI / IMPS</option>
                <option value="Cheque">Cheque</option>
                <option value="Cash">Cash</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="payCustomerFilterSelect">Customer / Account</label>
            <select class="form-select select2 form-select-sm" id="payCustomerFilterSelect">
                <option value="">All Customers</option>
                <option value="Power Spares Engineering">Power Spares Engineering</option>
                <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
                <option value="Gharuda Software">Gharuda Software</option>
                <option value="Zen Publications">Zen Publications</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="paySearchInput">Keyword / Payment # / UTR</label>
            <input type="text" class="form-control form-control-sm" id="paySearchInput" placeholder="Search payment #, invoice #, UTR...">
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2 bg-light-subtle">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" id="payResetFilterBtn">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" id="payApplyFilterBtn">
            <i class="bi bi-funnel me-1"></i> Apply Filters
        </button>
    </div>
</div>

<!-- Modal: Record Payment -->
<div class="modal fade" id="recordPaymentModal" tabindex="-1" aria-labelledby="recordPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3 bg-light bg-opacity-50">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-credit-card-2-front"></i></span>
                    <h5 class="modal-title fw-bold text-dark" id="recordPaymentModalLabel">Record Customer Payment</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="recordPaymentForm" onsubmit="event.preventDefault(); savePayment();">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Select Invoice <span class="text-danger">*</span></label>
                            <select class="form-select" id="pInvoice" onchange="autoFillInvoiceCustomer(this.value)" required>
                                <option value="">Choose Pending Invoice...</option>
                                <option value="INV-2026-081" data-cust="Power Spares Engineering" data-due="150000" <?php if ($preInvoice == 'INV-2026-081') echo 'selected'; ?>>INV-2026-081 - Power Spares Engineering (₹1,50,000)</option>
                                <option value="INV-2026-088" data-cust="Zen Publications" data-due="125000" <?php if ($preInvoice == 'INV-2026-088') echo 'selected'; ?>>INV-2026-088 - Zen Publications (₹1,25,000)</option>
                                <option value="INV-2026-094" data-cust="Hindustan Hydraulics" data-due="280000" <?php if ($preInvoice == 'INV-2026-094') echo 'selected'; ?>>INV-2026-094 - Hindustan Hydraulics (₹2,80,000)</option>
                                <option value="INV-2026-005" data-cust="GG COMPANY" data-due="590000" <?php if ($preInvoice == 'INV-2026-005') echo 'selected'; ?>>INV-2026-005 - GG COMPANY (₹5,90,000)</option>
                                <?php if ($preInvoice && !in_array($preInvoice, ['INV-2026-081', 'INV-2026-088', 'INV-2026-094', 'INV-2026-005'])): ?>
                                    <option value="<?php echo $preInvoice; ?>" data-cust="<?php echo $preClient; ?>" data-due="<?php echo $preAmount; ?>" selected><?php echo $preInvoice . ' - ' . $preClient; ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Customer</label>
                            <input type="text" class="form-control bg-light" id="pCustomer" readonly value="<?php echo $preClient; ?>" placeholder="Auto-populated from Invoice">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Amount Received (INR ₹) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" id="pAmount" value="<?php echo $preAmount; ?>" placeholder="e.g. 500000" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Payment Mode <span class="text-danger">*</span></label>
                            <select class="form-select" id="pMode" required>
                                <option value="NEFT / RTGS">NEFT / RTGS</option>
                                <option value="Bank Transfer">Bank Transfer (IMPS)</option>
                                <option value="UPI / IMPS">UPI / IMPS</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Transaction Reference / UTR # <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="pUtr" placeholder="e.g. HDFC009283741" value="HDFC<?php echo rand(10000000, 99999999); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Payment Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="pDate" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Payment Notes / Bank Receipt Memo</label>
                            <textarea class="form-control" id="pNotes" rows="2" placeholder="e.g. Received via corporate HDFC account."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check2 me-1"></i>Record &amp; Issue Receipt</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ===== Payment 360° Receipt Voucher Modal ===== -->
<div class="modal fade" id="viewReceiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg overflow-hidden">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="rounded-circle bg-success-subtle text-success p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-patch-check-fill fs-5"></i>
                    </span>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-5" id="vrModalTitle">PAY-2026-001</h5>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5">Verified Receipt</span>
                        </div>
                        <div class="small text-muted" id="vrModalSubtitle">Official Payment Receipt Voucher</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-white" id="vrModalBody"></div>
            <div class="modal-footer border-top py-2.5 px-4 bg-light-subtle">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="window.print();"><i class="bi bi-printer me-1"></i>Print Voucher</button>
            </div>
        </div>
    </div>
</div>

<script>
function autoFillInvoiceCustomer(invId) {
    var select = document.getElementById('pInvoice');
    var opt = select.options[select.selectedIndex];
    if (opt && opt.getAttribute('data-cust')) {
        document.getElementById('pCustomer').value = opt.getAttribute('data-cust');
        document.getElementById('pAmount').value = opt.getAttribute('data-due') || '';
    }
}

function viewReceipt(payId, invId, cust, amount, mode, utr, date, custId) {
    document.getElementById('vrModalTitle').textContent = payId;
    document.getElementById('vrModalSubtitle').textContent = cust + ' · Linked Invoice: #' + String(invId || '').replace(/^#/, '');
    var cId = custId || '1';
    var encCust = encodeURIComponent(cust || 'Customer');
    document.getElementById('vrModalBody').innerHTML =
        '<div class="row g-3 mb-4">' +
            '<div class="col-sm-6 col-md-4">' +
                '<div class="p-3 rounded-3 bg-light border border-light-subtle">' +
                    '<span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Amount Received</span>' +
                    '<h6 class="fw-bold text-success mb-0 fs-6">' + amount + '</h6>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-6 col-md-4">' +
                '<div class="p-3 rounded-3 bg-light border border-light-subtle">' +
                    '<span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Payment Mode</span>' +
                    '<h6 class="fw-bold text-primary mb-0 fs-6">' + mode + '</h6>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-6 col-md-4">' +
                '<div class="p-3 rounded-3 bg-light border border-light-subtle">' +
                    '<span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Payment Date</span>' +
                    '<h6 class="fw-bold text-dark mb-0 fs-6">' + date + '</h6>' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="card border border-light-subtle rounded-3 p-3 mb-4">' +
            '<h6 class="fw-bold text-dark mb-3 font-13 text-uppercase" style="letter-spacing:0.5px;">' +
                '<i class="bi bi-bank text-primary me-1.5"></i>Transaction &amp; Invoice Details' +
            '</h6>' +
            '<div class="row g-3 font-13">' +
                '<div class="col-sm-6"><div class="text-muted small">Customer / Account</div><div class="fw-semibold text-dark mt-0.5">' + cust + '</div></div>' +
                '<div class="col-sm-6"><div class="text-muted small">Linked Tax Invoice #</div><div class="fw-semibold text-dark mt-0.5">' + invId + '</div></div>' +
                '<div class="col-sm-6"><div class="text-muted small">Transaction Ref / UTR</div><div class="fw-semibold text-dark mt-0.5"><code>' + utr + '</code></div></div>' +
                '<div class="col-sm-6"><div class="text-muted small">Verification Status</div><div class="fw-semibold text-success mt-0.5"><i class="bi bi-check2-circle me-1"></i>Cleared in Bank Ledger</div></div>' +
            '</div>' +
        '</div>' +
        '<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">' +
            '<span class="text-muted small">Official acknowledgment of payment receipt into Gharuda Infotech accounts.</span>' +
            '<div class="d-flex align-items-center gap-2">' +
                '<a href="invoices.php" class="btn btn-sm btn-outline-success fw-semibold font-12"><i class="bi bi-file-earmark-ruled me-1"></i>View Invoice</a>' +
                '<a href="customer-view.php?id=' + cId + '&name=' + encCust + '" class="btn btn-sm btn-outline-primary fw-semibold font-12"><i class="bi bi-person-vcard me-1"></i>Customer 360&deg;</a>' +
            '</div>' +
        '</div>';
    bootstrap.Modal.getOrCreateInstance(document.getElementById('viewReceiptModal')).show();
}

function buildPaymentActionMenuHtml(payId, invId, cust, custId) {
    var safePay = String(payId || 'PAY-2026').replace(/"/g, '&quot;');
    var safeInv = String(invId || 'INV-2026').replace(/"/g, '&quot;');
    var encCust = encodeURIComponent(cust || 'Customer');
    var cId = custId || '1';
    return '<div class="dropdown">' +
        '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
            '<span>Actions</span>' +
        '</button>' +
        '<ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">' +
            '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Receipt Actions</li>' +
            '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-pay-360" data-pay="' + safePay + '"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Payment 360&deg; Receipt</div><div class="text-muted" style="font-size: 10px;">Voucher details &amp; UTR log</div></div></button></li>' +
            '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="invoices.php"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-file-earmark-ruled"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">View Linked Invoice</div><div class="text-muted" style="font-size: 10px;">Open #' + safeInv + '</div></div></a></li>' +
            '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="customer-view.php?id=' + cId + '&name=' + encCust + '"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-person-vcard"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Customer 360&deg; View</div><div class="text-muted" style="font-size: 10px;">Open client billing profile</div></div></a></li>' +
            '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" onclick="window.print();"><span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-printer"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Print Receipt Voucher</div><div class="text-muted" style="font-size: 10px;">Download official copy</div></div></button></li>' +
            '<li><hr class="dropdown-divider my-1"></li>' +
            '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-pay" data-pay="' + safePay + '"><span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span><div class="text-start"><div class="fw-semibold text-danger font-12">Delete Receipt</div><div class="text-muted" style="font-size: 10px;">Remove payment entry</div></div></button></li>' +
        '</ul>' +
    '</div>';
}

var allPaymentRows = [];

function createPaymentRowElement(p) {
    var payId = p.payId || 'PAY-2026-NEW';
    var inv = p.inv || 'INV-2026-081';
    var cust = p.cust || 'Customer';
    var mode = p.mode || 'NEFT / RTGS';
    var utr = p.utr || 'HDFC00018472';
    var amtDisplay = String(p.amt || '0').indexOf('₹') === 0 ? p.amt : ('₹' + p.amt);
    var date = p.date || '29-Oct-2026';

    var tr = document.createElement('tr');
    tr.setAttribute('data-pay', payId);
    tr.setAttribute('data-inv', inv);
    tr.setAttribute('data-cust', cust);
    tr.setAttribute('data-cust-id', '1');
    tr.setAttribute('data-mode', mode);
    tr.setAttribute('data-utr', utr);
    tr.setAttribute('data-amount', amtDisplay);
    tr.setAttribute('data-date', date);

    tr.innerHTML =
        '<td class="ps-3">1</td>' +
        '<td class="fw-bold"><a href="#" class="pay-num-link" data-pay="' + payId + '">' + payId + '</a></td>' +
        '<td><a href="invoices.php" class="text-decoration-none fw-semibold text-dark">' + inv + '</a></td>' +
        '<td><div class="fw-bold text-dark"><i class="bi bi-building me-1 text-muted"></i>' + cust + '</div></td>' +
        '<td><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">' + mode + '</span></td>' +
        '<td><code class="text-dark">' + utr + '</code></td>' +
        '<td class="text-end"><strong class="text-success">' + amtDisplay + '</strong></td>' +
        '<td class="small text-muted">' + date + '</td>' +
        '<td class="text-end pe-3">' + buildPaymentActionMenuHtml(payId, inv, cust, '1') + '</td>';

    return tr;
}

function savePayment() {
    var inv = document.getElementById('pInvoice').value;
    var cust = document.getElementById('pCustomer').value || 'Customer';
    var amt = Number(document.getElementById('pAmount').value).toLocaleString('en-IN');
    var mode = document.getElementById('pMode').value;
    var utr = document.getElementById('pUtr').value;
    var date = document.getElementById('pDate').value;
    var payId = 'PAY-2026-00' + (allPaymentRows.length + 1);

    var pObj = { payId: payId, inv: inv, cust: cust, amt: amt, mode: mode, utr: utr, date: date };
    try {
        var list = JSON.parse(localStorage.getItem('gh_new_payments') || '[]');
        list.unshift(pObj);
        localStorage.setItem('gh_new_payments', JSON.stringify(list.slice(0, 20)));
    } catch (e) {}

    var tbody = document.getElementById('paymentsTbody');
    var tr = createPaymentRowElement(pObj);
    tbody.insertBefore(tr, tbody.firstChild);
    allPaymentRows.unshift(tr);

    var modalEl = document.getElementById('recordPaymentModal');
    var modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();

    if (typeof window.applyPaymentFilter === 'function') {
        window.applyPaymentFilter();
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var tbody = document.getElementById('paymentsTbody');
    var tableEl = document.getElementById('paymentsTable');
    allPaymentRows = Array.from(tbody.querySelectorAll('tr[data-pay]'));

    try {
        var list = JSON.parse(localStorage.getItem('gh_new_payments') || '[]');
        list.forEach(function (p) {
            if (!tbody) return;
            var tr = createPaymentRowElement(p);
            tbody.insertBefore(tr, tbody.firstChild);
            allPaymentRows.unshift(tr);
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

    function openRowReceiptModal(tr) {
        if (!tr) return;
        viewReceipt(
            tr.getAttribute('data-pay') || '',
            tr.getAttribute('data-inv') || '',
            tr.getAttribute('data-cust') || '',
            tr.getAttribute('data-amount') || '₹0',
            tr.getAttribute('data-mode') || '',
            tr.getAttribute('data-utr') || '',
            tr.getAttribute('data-date') || '',
            tr.getAttribute('data-cust-id') || '1'
        );
    }

    // Delegated Action Handlers (Payment 360 & Delete Receipt)
    document.addEventListener('click', function (e) {
        var pay360Btn = e.target.closest('.btn-pay-360');
        if (pay360Btn) {
            e.preventDefault();
            var tr360 = pay360Btn.closest('tr');
            if (tr360) openRowReceiptModal(tr360);
            return;
        }

        var delBtn = e.target.closest('.btn-delete-pay');
        if (delBtn) {
            e.preventDefault();
            var trDel = delBtn.closest('tr');
            var pCode = delBtn.getAttribute('data-pay') || '';
            if (trDel && confirm('Are you sure you want to delete payment receipt "' + pCode + '"?')) {
                allPaymentRows = allPaymentRows.filter(function (r) { return r !== trDel; });
                trDel.remove();
                window.applyPaymentFilter();
            }
        }
    });

    // Table Row Click -> opens Payment 360 Receipt Modal while safely ignoring Actions dropdown & interactive controls
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
                e.target.closest('a:not(.pay-num-link)')
            ) {
                return;
            }

            var cell = e.target.closest('td');
            if (cell && (cell.querySelector('.btn-table-action, .lead-act-btn, .dropdown') || cell.classList.contains('text-end'))) {
                return;
            }

            var tr = e.target.closest('tr[data-pay]');
            if (tr) {
                e.preventDefault();
                openRowReceiptModal(tr);
            }
        });
    }

    // Filter & Search State
    var currentPayFilter = 'all';

    function updateFilterBadge() {
        var count = 0;
        var q = (document.getElementById('paySearchInput').value || '').trim();
        var cust = document.getElementById('payCustomerFilterSelect') ? document.getElementById('payCustomerFilterSelect').value : '';
        if (currentPayFilter && currentPayFilter !== 'all') count++;
        if (cust) count++;
        if (q) count++;

        var badge = document.getElementById('payFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            badge.classList.toggle('d-none', count === 0);
        }
    }

    window.applyPaymentFilter = function () {
        var q = (document.getElementById('paySearchInput').value || '').toLowerCase().trim();
        var cust = document.getElementById('payCustomerFilterSelect') ? document.getElementById('payCustomerFilterSelect').value : '';
        var matched = [];

        allPaymentRows.forEach(function (tr) {
            var mode = (tr.getAttribute('data-mode') || '').toLowerCase();
            var rowCust = tr.getAttribute('data-cust') || '';
            var text = tr.textContent.toLowerCase();

            var matchMode = (currentPayFilter === 'all') || (mode.indexOf(currentPayFilter.toLowerCase()) !== -1);
            var matchCust = !cust || (rowCust === cust);
            var matchQ = !q || text.indexOf(q) !== -1;

            if (matchMode && matchCust && matchQ) {
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
    };

    // Header Mode Toggle Pills
    Array.prototype.forEach.call(document.querySelectorAll('.pay-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.pay-filter-btn'), function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            currentPayFilter = btn.getAttribute('data-filter') || 'all';
            var modeSel = document.getElementById('payModeFilterSelect');
            if (modeSel) {
                modeSel.value = currentPayFilter;
                if (window.jQuery && jQuery.fn.select2) jQuery(modeSel).trigger('change.select2');
            }
            window.applyPaymentFilter();
        });
    });

    // Offcanvas Apply Filters
    var applyBtn = document.getElementById('payApplyFilterBtn');
    if (applyBtn) {
        applyBtn.addEventListener('click', function () {
            var modeSel = document.getElementById('payModeFilterSelect');
            if (modeSel) {
                currentPayFilter = modeSel.value || 'all';
                Array.prototype.forEach.call(document.querySelectorAll('.pay-filter-btn'), function (b) {
                    b.classList.toggle('active', b.getAttribute('data-filter') === currentPayFilter);
                });
            }
            window.applyPaymentFilter();
            var oc = document.getElementById('payFilterOffcanvas');
            if (oc && window.bootstrap && bootstrap.Offcanvas) {
                var inst = bootstrap.Offcanvas.getInstance(oc);
                if (inst) inst.hide();
            }
        });
    }

    // Offcanvas Reset Filters
    var resetBtn = document.getElementById('payResetFilterBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            currentPayFilter = 'all';
            document.getElementById('paySearchInput').value = '';
            ['payModeFilterSelect', 'payCustomerFilterSelect'].forEach(function (id) {
                var el = document.getElementById(id);
                if (el) {
                    el.value = id === 'payModeFilterSelect' ? 'all' : '';
                    if (window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change.select2');
                }
            });
            Array.prototype.forEach.call(document.querySelectorAll('.pay-filter-btn'), function (b) {
                b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
            });
            window.applyPaymentFilter();
        });
    }

    <?php if ($preInvoice || $preClient): ?>
    autoFillInvoiceCustomer('<?php echo $preInvoice; ?>');
    if (window.bootstrap && bootstrap.Modal) {
        bootstrap.Modal.getOrCreateInstance(document.getElementById('recordPaymentModal')).show();
    }
    <?php endif; ?>
});
</script>

<?php include 'footer.php'; ?>
