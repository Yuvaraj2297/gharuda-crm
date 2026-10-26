<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <span>Finance &amp; Accounts</span>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Invoices Ledger</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Invoices &amp; Billing</h1>
                <span class="badge bg-success-subtle text-success rounded-pill">₹58.4 Lakh Total Billed</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="quotations.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-file-earmark-text me-1"></i>Quotations
            </a>
            <a href="expenses.php" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-receipt me-1"></i>Field Expenses
            </a>
        </div>
    </div>

    <!-- Financial KPI Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Total Billed Revenue</span>
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹58,40,000</h3>
                <span class="text-muted small">32 Invoices Issued</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Realized / Paid</span>
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-check-circle"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹46,20,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 79.1% Collected</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Outstanding Balance</span>
                    <span class="p-2 rounded-2 bg-warning-subtle text-warning"><i class="bi bi-clock-history"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹12,20,000</h3>
                <span class="text-warning small fw-semibold">Pending Collection</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Overdue Invoices</span>
                    <span class="p-2 rounded-2 bg-danger-subtle text-danger"><i class="bi bi-exclamation-octagon"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹2,80,000</h3>
                <span class="text-danger small fw-semibold">3 Invoices Passed Due</span>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden mb-4">
        <div class="p-3 bg-white border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
            <h6 class="fw-bold text-dark mb-0">Company Invoices Directory</h6>
            <span class="badge bg-light text-muted border">Filtered by All Accounts</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable" data-table-name="Invoices">
                <thead class="table-light">
                    <tr>
                        <th>Invoice #</th>
                        <th>Client / Account</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>
                        <th>Total Amount</th>
                        <th>Paid Amount</th>
                        <th>Balance Due</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold text-primary">#INV-2026-081</td>
                        <td>
                            <div class="fw-bold text-dark">Power Spares Engineering</div>
                            <span class="text-muted small">M1: Advance Sign-off</span>
                        </td>
                        <td>15-Jan-2026</td>
                        <td>15-Feb-2026</td>
                        <td class="fw-bold text-dark">₹1,50,000</td>
                        <td class="text-success fw-semibold">₹1,50,000</td>
                        <td class="text-muted">₹0</td>
                        <td><span class="badge bg-success-subtle text-success">Paid</span></td>
                        <td>
                            <div class="btn-group">
                                <a href="customer-view.php?id=1" class="btn btn-sm btn-light border" title="View Account"><i class="bi bi-eye"></i></a>
                                <button type="button" class="btn btn-sm btn-light border" title="Print Invoice" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">#INV-2026-088</td>
                        <td>
                            <div class="fw-bold text-dark">Zen Publications</div>
                            <span class="text-muted small">Digital Portal Integration</span>
                        </td>
                        <td>22-Jan-2026</td>
                        <td>22-Feb-2026</td>
                        <td class="fw-bold text-dark">₹2,50,000</td>
                        <td class="text-success fw-semibold">₹1,25,000</td>
                        <td class="text-danger fw-bold">₹1,25,000</td>
                        <td><span class="badge bg-warning-subtle text-warning">Partially Paid</span></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">Collect</button>
                                <button type="button" class="btn btn-sm btn-light border" title="Print Invoice" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">#INV-2026-094</td>
                        <td>
                            <div class="fw-bold text-dark">Hindustan Hydraulics</div>
                            <span class="text-muted small">Annual AMC Support</span>
                        </td>
                        <td>10-Jan-2026</td>
                        <td>25-Jan-2026</td>
                        <td class="fw-bold text-dark">₹2,80,000</td>
                        <td class="text-success fw-semibold">₹0</td>
                        <td class="text-danger fw-bold">₹2,80,000</td>
                        <td><span class="badge bg-danger-subtle text-danger">Overdue</span></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">Collect</button>
                                <button type="button" class="btn btn-sm btn-light border" title="Print Invoice" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Record Payment -->
<div class="modal fade" id="recordPaymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Record Customer Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="recordPaymentForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Payment Amount Received (₹) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" placeholder="Enter amount" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Payment Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Payment Mode</label>
                        <select class="form-select select2">
                            <option value="NEFT">Bank Transfer (NEFT / RTGS)</option>
                            <option value="UPI">UPI / Digital QR</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Cash">Cash</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Transaction / Reference #</label>
                        <input type="text" class="form-control" placeholder="e.g. UTR / Cheque # / Ref ID">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Confirm Payment</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
