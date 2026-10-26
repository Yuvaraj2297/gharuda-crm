<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    .st-page {
        padding: 24px 20px;
        background-color: #f8fafc;
        min-height: calc(100vh - 70px);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* Header Card */
    .st-header-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .st-title-group {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .st-title-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #f0fdf4;
        color: #087a24;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        box-shadow: 0 2px 6px rgba(8, 122, 36, 0.15);
    }

    .st-new-btn {
        background: #087a24;
        border: none;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 10px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(8, 122, 36, 0.25);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none !important;
        cursor: pointer;
    }

    .st-new-btn:hover {
        background: #06601c;
        box-shadow: 0 6px 16px rgba(8, 122, 36, 0.35);
    }

    .st-import-btn {
        background: #15803d;
        border: none;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 10px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(21, 128, 61, 0.25);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none !important;
        cursor: pointer;
    }

    .st-import-btn:hover {
        background: #166534;
        box-shadow: 0 6px 16px rgba(21, 128, 61, 0.35);
    }

    /* Filter Card */
    .st-filter-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
    }

    /* Summary Bar */
    .st-summary-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 18px 24px;
        margin-bottom: 24px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
    }

    .st-summary-title {
        font-size: 14px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .st-counter-list {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 24px;
    }

    .st-counter-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13.5px;
        font-weight: 700;
        color: #475569;
        cursor: pointer;
        transition: opacity 0.2s ease;
    }

    .st-counter-item:hover {
        opacity: 0.8;
    }

    .st-cnt-num {
        font-weight: 800;
        font-size: 15px;
    }

    .st-cnt-all { color: #087a24; }
    .st-cnt-cash { color: #16a34a; }
    .st-cnt-bank { color: #0284c7; }
    .st-cnt-billed { color: #9333ea; }

    .st-counter-divider {
        width: 1px;
        height: 18px;
        background-color: #cbd5e1;
    }

    /* Select2 Customization matching support-tickets.php */
    .select2-container--default .select2-selection--single {
        height: 42px !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 6px 12px !important;
        font-size: 13.5px !important;
        font-weight: 600 !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px !important;
        right: 10px !important;
    }

    .select2-container--default.select2-container--open .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #087a24 !important;
        box-shadow: 0 0 0 3.5px rgba(8, 122, 36, 0.18) !important;
    }

    .select2-dropdown {
        border-radius: 12px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12) !important;
        z-index: 99999 !important;
    }

    .select2-search__field {
        border-radius: 8px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 6px 12px !important;
    }

    /* Status & Billed Pills */
    .st-pill {
        display: inline-flex;
        align-items: center;
        padding: 3px 12px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 700;
        border: 1px solid transparent;
    }

    .exp-pill-billed { background: #f0fdf4; color: #16a34a; border-color: #bbf7d0; }
    .exp-pill-cash { background: #eff6ff; color: #2563eb; border-color: #bfdbfe; }
    .exp-pill-bank { background: #f0f9ff; color: #0284c7; border-color: #bae6fd; }

    .card-custom {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }
</style>

<main class="st-page">
    <!-- Header Card -->
    <div class="st-header-card">
        <div class="st-title-group">
            <div class="st-title-icon">
                <i class="bi bi-receipt"></i>
            </div>
            <div>
                <h3 class="fw-bold m-0 text-dark">Expenses Management</h3>
                <span class="text-muted small">Track organizational expenses, category breakdowns, vendors, and payment modes</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="expense-create.php" class="st-new-btn">
                <i class="bi bi-plus-lg"></i> Record Expense
            </a>
            <button type="button" class="st-import-btn" data-bs-toggle="modal" data-bs-target="#importExpensesModal">
                <i class="bi bi-upload"></i> Import Expenses
            </button>
        </div>
    </div>

    <!-- Filter Card -->
    <div class="st-filter-card">
        <div class="row g-3 align-items-center">
            <div class="col-md-3">
                <label class="form-label fw-bold text-secondary small mb-1" for="filterCategory">Expense Category</label>
                <select class="form-select select2" id="filterCategory">
                    <option value="">Select Expense Category</option>
                    <option value="Fleet: Work Order">Fleet: Work Order</option>
                    <option value="Food & Accomodation">Food & Accomodation</option>
                    <option value="Petrol">Petrol</option>
                    <option value="test">test</option>
                    <option value="Stationery">Stationery</option>
                    <option value="Hardware & Electronics">Hardware & Electronics</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold text-secondary small mb-1" for="filterPaymentMode">Payment Mode</label>
                <select class="form-select select2" id="filterPaymentMode">
                    <option value="">Non selected</option>
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank</option>
                    <option value="UPI">UPI</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold text-secondary small mb-1" for="filterFromDate">From Date</label>
                <input type="date" class="form-control form-control-sm" id="filterFromDate" style="height:42px; border-radius:10px; border:1.5px solid #cbd5e1; font-weight:600;">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold text-secondary small mb-1" for="filterToDate">To Date</label>
                <input type="date" class="form-control form-control-sm" id="filterToDate" style="height:42px; border-radius:10px; border:1.5px solid #cbd5e1; font-weight:600;">
            </div>
        </div>
    </div>

    <!-- Expenses Summary Counter Bar -->
    <div class="st-summary-card">
        <div class="st-summary-title">
            <i class="bi bi-pie-chart-fill text-primary"></i> Expenses Summary
        </div>
        <div class="st-counter-list">
            <div class="st-counter-item" onclick="filterExpensesByMode('')">
                <span class="st-cnt-num st-cnt-all" id="cntAll">11 Records</span>
                <span>Total Expenses</span>
            </div>
            <div class="st-counter-divider"></div>
            <div class="st-counter-item" onclick="filterExpensesByMode('Cash')">
                <span class="st-cnt-num st-cnt-cash" id="cntCash">₹ 2,47,000.00</span>
                <span>Cash Expenses</span>
            </div>
            <div class="st-counter-divider"></div>
            <div class="st-counter-item" onclick="filterExpensesByMode('Bank')">
                <span class="st-cnt-num st-cnt-bank" id="cntBank">₹ 65,500.00</span>
                <span>Bank / Online</span>
            </div>
            <div class="st-counter-divider"></div>
            <div class="st-counter-item" onclick="filterExpensesByBilled()">
                <span class="st-cnt-num st-cnt-billed" id="cntBilled">1 Billed</span>
                <span>Tax Billed</span>
            </div>
        </div>
    </div>

    <!-- Table Container matching support-tickets.php & master-table.js -->
    <div class="card-custom mb-4">
        <div class="table-responsive">
            <table class="table-modern master-table column-border" id="expTable">
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
                    </tr>
                </thead>
                <tbody id="expTbody"></tbody>
            </table>
        </div>
    </div>
</main>

<!-- MODAL 1: Record Expense Modal -->
<div class="modal fade" id="recordExpenseModal" tabindex="-1" aria-labelledby="recordExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-bottom p-4" style="background:linear-gradient(135deg, #087a24 0%, #06601c 100%); color:#ffffff;">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-receipt-cutoff fs-4"></i>
                    <h5 class="modal-title fw-bold text-white mb-0" id="recordExpenseModalLabel">Record New Expense</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formRecordExpense">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Expense Name / Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="exp_name" placeholder="e.g. Office Stationery / Fuel" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Amount (₹) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" name="amount" placeholder="e.g. 5000.00" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Expense Category <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="category" required>
                                <option value="Fleet: Work Order">Fleet: Work Order</option>
                                <option value="Food & Accomodation">Food & Accomodation</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Stationery">Stationery</option>
                                <option value="Hardware & Electronics">Hardware & Electronics</option>
                                <option value="Software & Subscriptions">Software & Subscriptions</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Payment Mode <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="payment_mode" required>
                                <option value="Cash">Cash</option>
                                <option value="Bank">Bank</option>
                                <option value="UPI">UPI</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Expense Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="exp_date" value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Project Name</label>
                            <input type="text" class="form-control" name="project" placeholder="e.g. Solar Panel Installation">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Customer Name</label>
                            <input type="text" class="form-control" name="customer" placeholder="e.g. Sundar Arumugam">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark" style="font-size:13px;">Invoice # / Reference #</label>
                            <input type="text" class="form-control" name="reference_no" placeholder="e.g. INV-256">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-bold" style="background:#087a24; border-color:#087a24;">
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
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-bottom p-4" style="background:linear-gradient(135deg, #15803d 0%, #166534 100%); color:#ffffff;">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-upload fs-4"></i>
                    <h5 class="modal-title fw-bold text-white mb-0" id="importExpensesModalLabel">Import Expenses File</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formImportExpenses">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark" style="font-size:13px;">Choose CSV / Excel File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" accept=".csv, .xlsx, .xls" required>
                        <div class="text-muted small mt-1">Supported file formats: .csv, .xlsx (Max size: 10MB)</div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-bold" style="background:#087a24; border-color:#087a24;">
                        <i class="bi bi-cloud-arrow-up-fill me-1"></i> Import Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/select2.js"></script>
<script src="./assets/js/master-table.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (window.jQuery && jQuery.fn.select2) {
            jQuery('.select2').select2({
                width: '100%'
            });
        }

        /* Sample Expense Records matching user attached image */
        var expensesData = [
            { id: 1, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 20,000.00', name: 'stationery', receipt: '', date: '09-04-2028', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
            { id: 2, category: 'Food & Accomodation', subCategory: '', amount: '₹ 2,000.00', name: 'Food Expense', receipt: '', date: '01-08-2026', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: '', vendor: '', billed: false },
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
                        render: function(v, row) {
                            return '<input type="checkbox" class="form-check-input exp-row-checkbox" data-id="' + row.id + '">';
                        }
                    },
                    {
                        field: 'category',
                        title: 'CATEGORY',
                        sortable: true,
                        render: function(v, row) {
                            var billedHtml = row.billed ? '<div class="mt-1"><span class="st-pill exp-pill-billed">Billed</span></div>' : '';
                            return '<div><a href="#" class="fw-bold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' + billedHtml + '</div>';
                        }
                    },
                    {
                        field: 'subCategory',
                        title: 'SUB CATEGORY',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'amount',
                        title: 'AMOUNT',
                        sortable: true,
                        render: function(v) {
                            return '<span class="fw-bold text-dark" style="font-size:13.5px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'name',
                        title: 'NAME',
                        sortable: true,
                        render: function(v) {
                            return '<a href="#" class="fw-semibold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>';
                        }
                    },
                    {
                        field: 'receipt',
                        title: 'RECEIPT',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'date',
                        title: 'DATE',
                        sortable: true,
                        render: function(v) {
                            return '<span class="text-muted" style="font-size:12.5px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'project',
                        title: 'PROJECT',
                        sortable: true,
                        render: function(v) {
                            return v ? '<a href="#" class="fw-semibold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' : '—';
                        }
                    },
                    {
                        field: 'attachment',
                        title: 'ATTACHMENT',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'customer',
                        title: 'CUSTOMER',
                        sortable: true,
                        render: function(v) {
                            return v ? '<a href="#" class="fw-semibold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' : '—';
                        }
                    },
                    {
                        field: 'invoice',
                        title: 'INVOICE',
                        sortable: true,
                        render: function(v) {
                            return v ? '<a href="#" class="fw-bold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' : '—';
                        }
                    },
                    {
                        field: 'reference',
                        title: 'REFERENCE #',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'paymentMode',
                        title: 'PAYMENT MODE',
                        sortable: true,
                        render: function(v) {
                            if (!v) return '—';
                            var cls = v === 'Cash' ? 'exp-pill-cash' : 'exp-pill-bank';
                            return '<span class="st-pill ' + cls + '">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'vendor',
                        title: 'VENDOR',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    }
                ]
            });
        }

        /* Category Filter listener */
        jQuery('#filterCategory').on('change', function() {
            var cat = jQuery(this).val();
            if (!window.expMasterTable) return;
            if (!cat) {
                window.expMasterTable.setData(expensesData);
            } else {
                var filtered = expensesData.filter(function(e) {
                    return e.category === cat;
                });
                window.expMasterTable.setData(filtered);
            }
        });

        /* Payment Mode Filter listener */
        jQuery('#filterPaymentMode').on('change', function() {
            var mode = jQuery(this).val();
            if (!window.expMasterTable) return;
            if (!mode) {
                window.expMasterTable.setData(expensesData);
            } else {
                var filtered = expensesData.filter(function(e) {
                    return e.paymentMode === mode;
                });
                window.expMasterTable.setData(filtered);
            }
        });
    });

    function toggleExpSelectAllRows(masterCheckbox) {
        var isChecked = masterCheckbox.checked;
        var checkboxes = document.querySelectorAll('.exp-row-checkbox');
        checkboxes.forEach(function(cb) {
            cb.checked = isChecked;
        });
    }

    function filterExpensesByMode(modeName) {
        if (!window.expMasterTable) return;
        if (!modeName) {
            window.expMasterTable.setData(expensesData);
            return;
        }
        var filtered = expensesData.filter(function(e) {
            return e.paymentMode === modeName;
        });
        window.expMasterTable.setData(filtered);
    }

    function filterExpensesByBilled() {
        if (!window.expMasterTable) return;
        var filtered = expensesData.filter(function(e) {
            return e.billed === true;
        });
        window.expMasterTable.setData(filtered);
    }
</script>

<?php include 'footer.php'; ?>
