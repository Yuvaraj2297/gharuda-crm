<?php include 'header.php'; ?>

<main class="exp-page container-fluid px-0">
    <!-- Page Header & Action Bar in Single Row (lead.php & follow-up-list.php style, no breadcrumb, no stat cards) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;font-size:18px;">
                <i class="bi bi-receipt"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title fs-4">Expenses Management</h1>
                <span class="text-muted font-11 d-none d-sm-inline">Track organizational expenses, category breakdowns, vendor bills &amp; payment modes</span>
            </div>
        </div>

        <!-- RIGHT: Actions in Single Row -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="expModeTabs" role="tablist">
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold exp-filter-btn active" data-filter="all">All Expenses</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold exp-filter-btn" data-filter="Cash">Cash</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold exp-filter-btn" data-filter="Bank">Bank / Online</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold exp-filter-btn" data-filter="Billed">Tax Billed</button>
            </div>

            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="offcanvas" data-bs-target="#expFilterOffcanvas" aria-controls="expFilterOffcanvas" id="expOffcanvasFilterBtn">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="expFilterCountBadge">0</span>
            </button>

            <div class="dropdown">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                    <i class="bi bi-lightning-charge-fill"></i><span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu" style="min-width: 245px;">
                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Expense Actions</li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="expense-create.php">
                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-plus-lg"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Record New Expense</div>
                                <div class="text-muted" style="font-size:10px;">Open full expense entry form</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" data-bs-toggle="modal" data-bs-target="#recordExpenseModal">
                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-lightning"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Quick Expense Modal</div>
                                <div class="text-muted" style="font-size:10px;">Fast inline expense log</div>
                            </div>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" data-bs-toggle="modal" data-bs-target="#importExpensesModal">
                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-upload"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Import Expenses CSV</div>
                                <div class="text-muted" style="font-size:10px;">Bulk upload expense records</div>
                            </div>
                        </button>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="purchase-orders.php">
                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-cart-check"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Purchase Orders (PO)</div>
                                <div class="text-muted" style="font-size:10px;">Check vendor procurement bills</div>
                            </div>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoices.php">
                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-file-earmark-ruled"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Invoices &amp; Billing Ledger</div>
                                <div class="text-muted" style="font-size:10px;">View customer receivables</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <a href="expense-create.php" class="btn btn-success btn-sm font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs">
                <i class="bi bi-plus-lg"></i><span>Record Expense</span>
            </a>
        </div>
    </div>

    <!-- Table Container matching master-table.js -->
    <div class="card-custom p-0 mb-4" style="overflow: visible;">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern master-table column-border w-100 mb-0" id="expTable">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center;">#</th>
                        <th style="width: 40px; text-align: center;"><input type="checkbox" id="expSelectAllCheckbox" class="form-check-input" onclick="toggleExpSelectAllRows(this)"></th>
                        <th class="text-nowrap" style="min-width: 170px;">CATEGORY</th>
                        <th class="text-nowrap" style="width: 120px;">SUB CATEGORY</th>
                        <th class="text-nowrap" style="width: 130px;">AMOUNT</th>
                        <th class="text-nowrap" style="min-width: 140px;">NAME</th>
                        <th class="text-nowrap" style="width: 100px;">RECEIPT</th>
                        <th class="text-nowrap" style="width: 120px;">DATE</th>
                        <th class="text-nowrap" style="min-width: 160px;">PROJECT</th>
                        <th class="text-nowrap" style="width: 120px;">ATTACHMENT</th>
                        <th class="text-nowrap" style="min-width: 160px;">CUSTOMER</th>
                        <th class="text-nowrap" style="width: 110px;">INVOICE</th>
                        <th class="text-nowrap" style="width: 120px;">REFERENCE #</th>
                        <th class="text-nowrap" style="width: 130px;">PAYMENT MODE</th>
                        <th class="text-nowrap" style="width: 120px;">VENDOR</th>
                        <th class="text-nowrap text-end pe-3" style="width: 110px;">ACTION</th>
                    </tr>
                </thead>
                <tbody id="expTbody"></tbody>
            </table>
        </div>
    </div>
</main>

<!-- ===== Expenses Filter Offcanvas (lead.php & follow-up-list.php style) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="expFilterOffcanvas" aria-labelledby="expFilterOffcanvasLabel" style="width: 380px;">
    <div class="offcanvas-header border-bottom py-3 px-3">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2 mb-0" id="expFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Expenses
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="filterCategory">Expense Category</label>
            <select class="form-select select2 form-select-sm" id="filterCategory">
                <option value="">All Categories</option>
                <option value="Fleet: Work Order">Fleet: Work Order</option>
                <option value="Food & Accomodation">Food &amp; Accomodation</option>
                <option value="Petrol">Petrol</option>
                <option value="test">test</option>
                <option value="Stationery">Stationery</option>
                <option value="Hardware & Electronics">Hardware &amp; Electronics</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="filterPaymentMode">Payment Mode / Status</label>
            <select class="form-select select2 form-select-sm" id="filterPaymentMode">
                <option value="all">All Modes</option>
                <option value="Cash">Cash</option>
                <option value="Bank">Bank / Online</option>
                <option value="UPI">UPI</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Billed">Tax Billed</option>
            </select>
        </div>
        <div class="row g-2 mb-3">
            <div class="col-6">
                <label class="form-label text-muted small fw-bold mb-1" for="filterFromDate">From Date</label>
                <input type="date" class="form-control form-control-sm" id="filterFromDate">
            </div>
            <div class="col-6">
                <label class="form-label text-muted small fw-bold mb-1" for="filterToDate">To Date</label>
                <input type="date" class="form-control form-control-sm" id="filterToDate">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="filterExpKeyword">Keyword / Project / Customer</label>
            <input type="text" class="form-control form-control-sm" id="filterExpKeyword" placeholder="Search title, project, customer...">
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2 bg-light-subtle">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" id="expResetFilterBtn">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" id="expApplyFilterBtn">
            <i class="bi bi-funnel me-1"></i> Apply Filters
        </button>
    </div>
</div>

<!-- ===== Expense 360° Overview Modal ===== -->
<div class="modal fade" id="expDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-receipt fs-5"></i>
                    </span>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-5" id="expModalTitle">Expense Details</h5>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5" id="expModalModeBadge">Cash</span>
                        </div>
                        <div class="small text-muted" id="expModalCategorySubtitle">Category &middot; Expense Overview</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-white">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Expense Amount</span>
                            <h6 class="fw-bold text-success mb-0 fs-6" id="expModalAmount">₹0.00</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Payment Mode</span>
                            <h6 class="fw-bold text-primary mb-0 fs-6" id="expModalMode">—</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Expense Date</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="expModalDate">—</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Billing Status</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="expModalBilled">—</h6>
                        </div>
                    </div>
                </div>

                <div class="card border border-light-subtle rounded-3 p-3 mb-4">
                    <h6 class="fw-bold text-dark mb-3 font-13 text-uppercase" style="letter-spacing:0.5px;">
                        <i class="bi bi-folder2-open text-primary me-1.5"></i>Allocation &amp; Reference Information
                    </h6>
                    <div class="row g-3 font-13">
                        <div class="col-sm-6">
                            <div class="text-muted small">Expense Category</div>
                            <div class="fw-semibold text-dark mt-0.5" id="expModalCategory">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Project Name</div>
                            <div class="fw-semibold text-dark mt-0.5" id="expModalProject">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Customer / Client</div>
                            <div class="fw-semibold text-dark mt-0.5" id="expModalCustomer">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Invoice &amp; Reference #</div>
                            <div class="fw-semibold text-dark mt-0.5" id="expModalRef">—</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">
                    <span class="text-muted small fw-semibold">Quick Actions:</span>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <a href="expense-create.php" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-plus-lg"></i> Record New Expense
                        </a>
                        <a href="invoices.php" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-file-earmark-ruled"></i> View Invoices
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1.5 fw-semibold font-12" onclick="window.print();">
                            <i class="bi bi-printer"></i> Print Voucher
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

<!-- MODAL 1: Record Expense Modal -->
<div class="modal fade" id="recordExpenseModal" tabindex="-1" aria-labelledby="recordExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-receipt-cutoff"></i></span>
                    <h5 class="modal-title fw-bold text-dark mb-0" id="recordExpenseModalLabel">Record New Expense</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formRecordExpense">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Expense Name / Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="exp_name" placeholder="e.g. Office Stationery / Fuel" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Amount (₹) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" name="amount" placeholder="e.g. 5000.00" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Expense Category <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="category" required>
                                <option value="Fleet: Work Order">Fleet: Work Order</option>
                                <option value="Food & Accomodation">Food &amp; Accomodation</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Stationery">Stationery</option>
                                <option value="Hardware & Electronics">Hardware &amp; Electronics</option>
                                <option value="Software & Subscriptions">Software &amp; Subscriptions</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Payment Mode <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="payment_mode" required>
                                <option value="Cash">Cash</option>
                                <option value="Bank">Bank</option>
                                <option value="UPI">UPI</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Expense Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="exp_date" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Project Name</label>
                            <input type="text" class="form-control" name="project" placeholder="e.g. Solar Panel Installation">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Customer Name</label>
                            <input type="text" class="form-control" name="customer" placeholder="e.g. Sundar Arumugam">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Invoice # / Reference #</label>
                            <input type="text" class="form-control" name="reference_no" placeholder="e.g. INV-256">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold">
                        <i class="bi bi-check-circle-fill me-1"></i> Save Expense
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL 2: Import Expenses Modal -->
<div class="modal fade" id="importExpensesModal" tabindex="-1" aria-labelledby="importExpensesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-upload"></i></span>
                    <h5 class="modal-title fw-bold text-dark mb-0" id="importExpensesModalLabel">Import Expenses File</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formImportExpenses">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark small">Choose CSV / Excel File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" accept=".csv, .xlsx, .xls" required>
                        <div class="text-muted small mt-1">Supported file formats: .csv, .xlsx (Max size: 10MB)</div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold">
                        <i class="bi bi-cloud-arrow-up-fill me-1"></i> Import Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    if (typeof window.initSelect2Elements === 'function') {
        window.initSelect2Elements();
    }

    var expensesData = [
        { id: 1, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 20,000.00', name: 'stationery', receipt: '', date: '09-04-2028', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
        { id: 2, category: 'Food & Accomodation', subCategory: '', amount: '₹ 2,000.00', name: 'Food Expense', receipt: '', date: '01-08-2026', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
        { id: 3, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 5,000.00', name: 'Salarey', receipt: '', date: '02-05-2026', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
        { id: 4, category: 'test', subCategory: '', amount: '₹ 10,000.00', name: 'MONITOR', receipt: '', date: '10-09-2026', project: 'bel', attachment: '', customer: 'KOKA', invoice: 'INV-256', reference: '4567890', paymentMode: 'Bank', vendor: '', billed: true },
        { id: 5, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 50,000.00', name: 'Salary', receipt: '', date: '05-05-2026', project: 'Solar Panel Installation', attachment: '', customer: 'Sundar Arumugam', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
        { id: 6, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 50,000.00', name: 'freight charges', receipt: '', date: '30-09-2026', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
        { id: 7, category: 'Petrol', subCategory: '', amount: '₹ 50,000.00', name: 'Salary', receipt: '', date: '03-03-2028', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Bank', vendor: '', billed: false },
        { id: 8, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 15,000.00', name: 'Salary', receipt: '', date: '05-05-2026', project: 'Solar Panel Installation', attachment: '', customer: 'Sundar Arumugam', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
        { id: 9, category: 'Petrol', subCategory: '', amount: '₹ 500.00', name: 'petrol', receipt: '', date: '04-03-2026', project: '', attachment: '', customer: 'Power Spares Engineering', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
        { id: 10, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 50,000.00', name: 'Personal', receipt: '', date: '05-05-2026', project: 'Solar Panel Installation', attachment: '', customer: 'Sundar Arumugam', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
        { id: 11, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 5,000.00', name: 'Salary', receipt: '', date: '20-03-2026', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Bank', vendor: '', billed: false }
    ];

    function esc(s) {
        return String(s == null ? '' : s)
            .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }

    function buildExpActionMenuHtml(row) {
        var encCust = encodeURIComponent(row.customer || 'Client');
        return '<div class="dropdown text-end">' +
            '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                '<span>Actions</span>' +
            '</button>' +
            '<ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">' +
                '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Expense Actions</li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-exp-360" data-id="' + row.id + '"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-receipt"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Expense 360&deg; Overview</div><div class="text-muted" style="font-size: 10px;">Voucher details &amp; allocation</div></div></button></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="expense-create.php"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-pencil-square"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Duplicate / New Expense</div><div class="text-muted" style="font-size: 10px;">Record similar expense</div></div></a></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="invoices.php"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-file-earmark-ruled"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">View Invoices Ledger</div><div class="text-muted" style="font-size: 10px;">Check billable status</div></div></a></li>' +
                (row.customer ? '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="customer-view.php?id=1&name=' + encCust + '"><span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-person-vcard"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Customer 360&deg; View</div><div class="text-muted" style="font-size: 10px;">Open ' + esc(row.customer) + '</div></div></a></li>' : '') +
                '<li><hr class="dropdown-divider my-1"></li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-exp" data-id="' + row.id + '"><span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span><div class="text-start"><div class="fw-semibold text-danger font-12">Delete Expense</div><div class="text-muted" style="font-size: 10px;">Remove expense record</div></div></button></li>' +
            '</ul>' +
        '</div>';
    }

    window.expMasterTable = null;

    if (typeof MasterTable !== 'undefined') {
        window.expMasterTable = MasterTable.init({
            tableId: 'expTable',
            tbodyId: 'expTbody',
            idPrefix: 'exp',
            data: expensesData,
            tableName: 'Expenses_Report',
            primaryKey: 'id',
            searchFields: ['category', 'name', 'project', 'customer', 'invoice', 'reference', 'paymentMode'],
            columns: [
                {
                    field: null,
                    title: '<input type="checkbox" id="expSelectAllCheckbox" class="form-check-input" onclick="toggleExpSelectAllRows(this)">',
                    sortable: false,
                    render: function (v, row) {
                        return '<input type="checkbox" class="form-check-input exp-row-checkbox" data-id="' + row.id + '">';
                    }
                },
                {
                    field: 'category',
                    title: 'CATEGORY',
                    sortable: true,
                    render: function (v, row) {
                        var billedHtml = row.billed ? '<div class="mt-1"><span class="st-pill exp-pill-billed">Billed</span></div>' : '';
                        return '<div><a href="#" class="fw-bold text-primary text-decoration-none exp-row-link" data-id="' + row.id + '" style="font-size:13px;">' + esc(v) + '</a>' + billedHtml + '</div>';
                    }
                },
                {
                    field: 'subCategory',
                    title: 'SUB CATEGORY',
                    sortable: true,
                    render: function (v) {
                        return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                    }
                },
                {
                    field: 'amount',
                    title: 'AMOUNT',
                    sortable: true,
                    render: function (v) {
                        return '<span class="fw-bold text-dark" style="font-size:13.5px;">' + esc(v) + '</span>';
                    }
                },
                {
                    field: 'name',
                    title: 'NAME',
                    sortable: true,
                    render: function (v, row) {
                        return '<a href="#" class="fw-semibold text-primary text-decoration-none exp-row-link" data-id="' + row.id + '" style="font-size:13px;">' + esc(v) + '</a>';
                    }
                },
                {
                    field: 'receipt',
                    title: 'RECEIPT',
                    sortable: true,
                    render: function (v) {
                        return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                    }
                },
                {
                    field: 'date',
                    title: 'DATE',
                    sortable: true,
                    render: function (v) {
                        return '<span class="text-muted" style="font-size:12.5px;">' + esc(v) + '</span>';
                    }
                },
                {
                    field: 'project',
                    title: 'PROJECT',
                    sortable: true,
                    render: function (v) {
                        return v ? '<span class="fw-semibold text-dark" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                    }
                },
                {
                    field: 'attachment',
                    title: 'ATTACHMENT',
                    sortable: true,
                    render: function (v) {
                        return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                    }
                },
                {
                    field: 'customer',
                    title: 'CUSTOMER',
                    sortable: true,
                    render: function (v) {
                        return v ? '<span class="fw-semibold text-dark" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                    }
                },
                {
                    field: 'invoice',
                    title: 'INVOICE',
                    sortable: true,
                    render: function (v) {
                        return v ? '<a href="invoices.php" class="fw-bold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' : '—';
                    }
                },
                {
                    field: 'reference',
                    title: 'REFERENCE #',
                    sortable: true,
                    render: function (v) {
                        return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                    }
                },
                {
                    field: 'paymentMode',
                    title: 'PAYMENT MODE',
                    sortable: true,
                    render: function (v) {
                        if (!v) return '—';
                        var cls = v === 'Cash' ? 'exp-pill-cash' : 'exp-pill-bank';
                        return '<span class="st-pill ' + cls + '">' + esc(v) + '</span>';
                    }
                },
                {
                    field: 'vendor',
                    title: 'VENDOR',
                    sortable: true,
                    render: function (v) {
                        return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                    }
                },
                {
                    field: null,
                    title: 'ACTION',
                    sortable: false,
                    render: function (v, row) {
                        return buildExpActionMenuHtml(row);
                    }
                }
            ]
        });
    }

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

    window.openExpense360ModalById = function (id) {
        var numId = Number(id);
        var exp = null;
        for (var i = 0; i < expensesData.length; i++) {
            if (Number(expensesData[i].id) === numId) {
                exp = expensesData[i];
                break;
            }
        }
        if (!exp) return;

        var setTxt = function (elId, val) {
            var el = document.getElementById(elId);
            if (el) el.textContent = val;
        };

        setTxt('expModalTitle', exp.name || 'Expense Voucher');
        setTxt('expModalModeBadge', exp.paymentMode || 'Cash');
        setTxt('expModalCategorySubtitle', (exp.category || 'General') + ' · Expense ID #' + exp.id);
        setTxt('expModalAmount', exp.amount || '₹ 0.00');
        setTxt('expModalMode', exp.paymentMode || '—');
        setTxt('expModalDate', exp.date || '—');
        setTxt('expModalBilled', exp.billed ? 'Tax Billed' : 'Unbilled / Internal');
        setTxt('expModalCategory', exp.category || '—');
        setTxt('expModalProject', exp.project || '—');
        setTxt('expModalCustomer', exp.customer || '—');
        setTxt('expModalRef', (exp.invoice ? exp.invoice + ' / ' : '') + (exp.reference || '—'));

        var modalEl = document.getElementById('expDetailModal');
        if (modalEl && window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    };

    // Delegated Action Handlers (Expense 360 & Delete Expense)
    document.addEventListener('click', function (e) {
        var exp360Btn = e.target.closest('.btn-exp-360');
        if (exp360Btn) {
            e.preventDefault();
            window.openExpense360ModalById(exp360Btn.getAttribute('data-id'));
            return;
        }

        var delBtn = e.target.closest('.btn-delete-exp');
        if (delBtn) {
            e.preventDefault();
            var expId = Number(delBtn.getAttribute('data-id'));
            if (confirm('Are you sure you want to delete this expense record?')) {
                expensesData = expensesData.filter(function (item) { return Number(item.id) !== expId; });
                applyExpenseFilter();
            }
        }
    });

    // Safe Row Click -> opens Expense 360 Modal while ignoring checkboxes & Actions dropdown
    var tableEl = document.getElementById('expTable');
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
                e.target.closest('a:not(.exp-row-link)')
            ) {
                return;
            }

            var cell = e.target.closest('td');
            if (cell && (cell.querySelector('.exp-row-checkbox, .btn-table-action, .lead-act-btn, .dropdown') || cell.classList.contains('text-end'))) {
                return;
            }

            var tr = e.target.closest('tbody tr');
            if (tr) {
                var cb = tr.querySelector('.exp-row-checkbox[data-id]');
                if (cb) {
                    e.preventDefault();
                    window.openExpense360ModalById(cb.getAttribute('data-id'));
                }
            }
        });
    }

    // Save Quick Expense Modal
    var formRecord = document.getElementById('formRecordExpense');
    if (formRecord) {
        formRecord.addEventListener('submit', function (e) {
            e.preventDefault();
            var fd = new FormData(formRecord);
            var amtNum = Number(fd.get('amount') || 0).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            var newExp = {
                id: expensesData.length + 100,
                category: fd.get('category') || 'Stationery',
                subCategory: '',
                amount: '₹ ' + amtNum,
                name: fd.get('exp_name') || 'New Expense',
                receipt: '',
                date: fd.get('exp_date') || '29-10-2026',
                project: fd.get('project') || '',
                attachment: '',
                customer: fd.get('customer') || '',
                invoice: fd.get('reference_no') || '',
                reference: fd.get('reference_no') || '',
                paymentMode: fd.get('payment_mode') || 'Cash',
                vendor: '',
                billed: Boolean(fd.get('reference_no'))
            };
            expensesData.unshift(newExp);
            applyExpenseFilter();
            formRecord.reset();
            var mEl = document.getElementById('recordExpenseModal');
            if (mEl && window.bootstrap && bootstrap.Modal.getInstance(mEl)) {
                bootstrap.Modal.getInstance(mEl).hide();
            }
        });
    }

    // Filter & Search State
    var currentModeFilter = 'all';

    function updateFilterBadge() {
        var count = 0;
        var cat = document.getElementById('filterCategory') ? document.getElementById('filterCategory').value : '';
        var fromD = document.getElementById('filterFromDate') ? document.getElementById('filterFromDate').value : '';
        var toD = document.getElementById('filterToDate') ? document.getElementById('filterToDate').value : '';
        var kw = (document.getElementById('filterExpKeyword').value || '').trim();
        if (currentModeFilter && currentModeFilter !== 'all') count++;
        if (cat) count++;
        if (fromD || toD) count++;
        if (kw) count++;

        var badge = document.getElementById('expFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            badge.classList.toggle('d-none', count === 0);
        }
    }

    function applyExpenseFilter() {
        var cat = document.getElementById('filterCategory') ? document.getElementById('filterCategory').value : '';
        var kw = (document.getElementById('filterExpKeyword').value || '').toLowerCase().trim();

        var filtered = expensesData.filter(function (e) {
            var matchMode = true;
            if (currentModeFilter === 'Billed') {
                matchMode = e.billed === true;
            } else if (currentModeFilter && currentModeFilter !== 'all') {
                matchMode = e.paymentMode === currentModeFilter;
            }
            var matchCat = !cat || (e.category === cat);
            var hay = [e.category, e.name, e.project, e.customer, e.invoice, e.reference, e.paymentMode].join(' ').toLowerCase();
            var matchKw = !kw || (hay.indexOf(kw) !== -1);
            return matchMode && matchCat && matchKw;
        });

        if (window.expMasterTable) {
            window.expMasterTable.setData(filtered);
        }
        updateFilterBadge();
    }

    // Header Mode Toggle Pills
    Array.prototype.forEach.call(document.querySelectorAll('.exp-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.exp-filter-btn'), function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            currentModeFilter = btn.getAttribute('data-filter') || 'all';
            var modeSel = document.getElementById('filterPaymentMode');
            if (modeSel) {
                modeSel.value = currentModeFilter;
                if (window.jQuery && jQuery.fn.select2) jQuery(modeSel).trigger('change.select2');
            }
            applyExpenseFilter();
        });
    });

    // Offcanvas Apply Filters
    var applyBtn = document.getElementById('expApplyFilterBtn');
    if (applyBtn) {
        applyBtn.addEventListener('click', function () {
            var modeSel = document.getElementById('filterPaymentMode');
            if (modeSel) {
                currentModeFilter = modeSel.value || 'all';
                Array.prototype.forEach.call(document.querySelectorAll('.exp-filter-btn'), function (b) {
                    b.classList.toggle('active', b.getAttribute('data-filter') === currentModeFilter);
                });
            }
            applyExpenseFilter();
            var oc = document.getElementById('expFilterOffcanvas');
            if (oc && window.bootstrap && bootstrap.Offcanvas) {
                var inst = bootstrap.Offcanvas.getInstance(oc);
                if (inst) inst.hide();
            }
        });
    }

    // Offcanvas Reset Filters
    var resetBtn = document.getElementById('expResetFilterBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            currentModeFilter = 'all';
            document.getElementById('filterFromDate').value = '';
            document.getElementById('filterToDate').value = '';
            document.getElementById('filterExpKeyword').value = '';
            ['filterCategory', 'filterPaymentMode'].forEach(function (id) {
                var el = document.getElementById(id);
                if (el) {
                    el.value = id === 'filterPaymentMode' ? 'all' : '';
                    if (window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change.select2');
                }
            });
            Array.prototype.forEach.call(document.querySelectorAll('.exp-filter-btn'), function (b) {
                b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
            });
            applyExpenseFilter();
        });
    }
});

function toggleExpSelectAllRows(masterCheckbox) {
    var isChecked = masterCheckbox.checked;
    var checkboxes = document.querySelectorAll('.exp-row-checkbox');
    checkboxes.forEach(function (cb) {
        cb.checked = isChecked;
    });
}
</script>

<?php include 'footer.php'; ?>
