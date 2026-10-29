<?php
include 'header.php';
$preInvoice = isset($_GET['invoice']) ? htmlspecialchars($_GET['invoice']) : '';
$preClient  = isset($_GET['client']) ? htmlspecialchars($_GET['client']) : (isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : '');
$preAmount  = isset($_GET['amount']) ? htmlspecialchars($_GET['amount']) : '';
?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Payments Received</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">₹46.2 Lakh Collected</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-credit-card-2-front fs-6"></i>
                <a href="invoices.php" class="text-decoration-none text-muted">Billing &amp; Finance</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Payments Received Ledger</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="invoices.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-ruled"></i><span>Invoices Ledger</span>
            </a>
            <a href="expenses.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-receipt"></i><span>Field Expenses</span>
            </a>
            <a href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-excel"></i><span>Download Excel</span>
            </a>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
                <i class="bi bi-plus-lg"></i><span>Record Payment</span>
            </button>
        </div>
    </div>

    <!-- Payment Metrics Cards (Bootstrap 5 Utilities) -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Total Realized Revenue</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-cash-stack"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹46,20,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-check2-circle me-1"></i>28 Payments Cleared</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Collected This Month</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-calendar-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹14,80,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> +18.4% vs Last Month</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Primary Payment Mode</span>
                    <span class="p-2 rounded-3 bg-info-subtle text-info"><i class="bi bi-bank"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">72% NEFT/RTGS</h3>
                <span class="text-muted small">Corporate Bank Transfers</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Average Settlement Time</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-speedometer2"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">14.2 Days</h3>
                <span class="text-muted small">From Invoice Generation</span>
            </div>
        </div>
    </div>

    <!-- Payments Ledger Table -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="card-head d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom p-3 mb-0">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-receipt-cutoff"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">Transactions &amp; Collections Ledger</h3>
                    <small class="text-muted">Official NEFT, RTGS, UPI &amp; Cheque receipts linked to GST Tax Invoices</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <select class="form-select form-select-sm" id="paymentModeFilter">
                    <option value="">All Modes</option>
                    <option value="NEFT">NEFT / RTGS</option>
                    <option value="UPI">UPI / QR</option>
                    <option value="Bank">Bank Transfer</option>
                    <option value="Cheque">Cheque</option>
                </select>
                <button type="button" class="btn btn-primary btn-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
                    <i class="bi bi-plus-lg me-1"></i>Record Payment
                </button>
            </div>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" id="paymentsTable" data-table-name="Payments_Received">
                <thead>
                    <tr>
                        <th>Payment #</th>
                        <th>Invoice #</th>
                        <th>Customer</th>
                        <th>Payment Mode</th>
                        <th>Transaction / UTR</th>
                        <th>Amount (INR)</th>
                        <th>Payment Date</th>
                        <th>CRM Action</th>
                    </tr>
                </thead>
                <tbody id="paymentsTbody">
                    <tr>
                        <td><strong class="text-primary">PAY-2026-001</strong></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold">INV-2026-081</a></td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Power Spares Engineering
                            </a>
                        </td>
                        <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">NEFT / RTGS</span></td>
                        <td><code class="text-dark">HDFC0001847291</code></td>
                        <td><strong class="text-success">₹14,75,000</strong></td>
                        <td>14-Oct-2026</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="View Receipt Voucher" onclick="viewReceipt('PAY-2026-001', 'INV-2026-081', 'Power Spares Engineering', '₹14,75,000', 'NEFT / RTGS', 'HDFC0001847291', '14-Oct-2026')"><i class="bi bi-receipt"></i></button>
                                <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                                <button type="button" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Print Receipt" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong class="text-primary">PAY-2026-002</strong></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold">INV-2026-094</a></td>
                        <td>
                            <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Hindustan Hydraulics
                            </a>
                        </td>
                        <td><span class="badge bg-info-subtle text-info border border-info-subtle">Bank Transfer</span></td>
                        <td><code class="text-dark">ICIC9928374612</code></td>
                        <td><strong class="text-success">₹9,91,200</strong></td>
                        <td>08-Oct-2026</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="View Receipt Voucher" onclick="viewReceipt('PAY-2026-002', 'INV-2026-094', 'Hindustan Hydraulics', '₹9,91,200', 'Bank Transfer', 'ICIC9928374612', '08-Oct-2026')"><i class="bi bi-receipt"></i></button>
                                <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                                <button type="button" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Print Receipt" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong class="text-primary">PAY-2026-003</strong></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold">INV-2026-004</a></td>
                        <td>
                            <a href="customer-view.php?id=4&amp;name=Gharuda+Software" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Gharuda Software
                            </a>
                        </td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">UPI / IMPS</span></td>
                        <td><code class="text-dark">UPI-88371902847</code></td>
                        <td><strong class="text-success">₹14,16,000</strong></td>
                        <td>01-Oct-2026</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="View Receipt Voucher" onclick="viewReceipt('PAY-2026-003', 'INV-2026-004', 'Gharuda Software', '₹14,16,000', 'UPI / IMPS', 'UPI-88371902847', '01-Oct-2026')"><i class="bi bi-receipt"></i></button>
                                <a href="customer-view.php?id=4&amp;name=Gharuda+Software" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                                <button type="button" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Print Receipt" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong class="text-primary">PAY-2026-004</strong></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold">INV-2026-088</a></td>
                        <td>
                            <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Zen Publications
                            </a>
                        </td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Cheque</span></td>
                        <td><code class="text-dark">CHQ-009482</code></td>
                        <td><strong class="text-success">₹7,37,800</strong></td>
                        <td>25-Sep-2026</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="View Receipt Voucher" onclick="viewReceipt('PAY-2026-004', 'INV-2026-088', 'Zen Publications', '₹7,37,800', 'Cheque', 'CHQ-009482', '25-Sep-2026')"><i class="bi bi-receipt"></i></button>
                                <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                                <button type="button" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Print Receipt" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

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
                                <option value="UPI / QR">UPI / QR Code</option>
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

<!-- Modal: View Receipt Voucher -->
<div class="modal fade" id="viewReceiptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3">
                <h5 class="modal-title fw-bold text-dark" id="vrModalTitle">Payment Receipt Voucher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="vrModalBody"></div>
            <div class="modal-footer border-top p-3 bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="window.print();"><i class="bi bi-printer me-1"></i>Print Voucher</button>
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

function viewReceipt(payId, invId, cust, amount, mode, utr, date) {
    document.getElementById('vrModalTitle').textContent = 'Receipt: ' + payId;
    document.getElementById('vrModalBody').innerHTML =
        '<div class="text-center p-3 mb-3 bg-success-subtle text-success rounded-3">' +
            '<i class="bi bi-patch-check-fill fs-1 d-block mb-1"></i>' +
            '<span class="small fw-bold text-uppercase">Payment Received &amp; Verified</span>' +
            '<div class="fs-3 fw-bold text-dark mt-1">' + amount + '</div>' +
        '</div>' +
        '<div class="row g-2 small">' +
            '<div class="col-6"><strong>Invoice:</strong> <span class="text-muted">' + invId + '</span></div>' +
            '<div class="col-6"><strong>Client:</strong> <span class="text-muted">' + cust + '</span></div>' +
            '<div class="col-6"><strong>Payment Mode:</strong> <span class="text-muted">' + mode + '</span></div>' +
            '<div class="col-6"><strong>Date Received:</strong> <span class="text-muted">' + date + '</span></div>' +
            '<div class="col-12"><strong>Transaction Ref / UTR:</strong> <code>' + utr + '</code></div>' +
        '</div>' +
        '<div class="border-top pt-3 mt-3 text-muted small">' +
            'This receipt serves as official acknowledgment of payment receipt into Gharuda Infotech accounts.' +
        '</div>';
    bootstrap.Modal.getOrCreateInstance(document.getElementById('viewReceiptModal')).show();
}

function savePayment() {
    var inv = document.getElementById('pInvoice').value;
    var cust = document.getElementById('pCustomer').value || 'Customer';
    var encCust = encodeURIComponent(cust);
    var amt = Number(document.getElementById('pAmount').value).toLocaleString('en-IN');
    var mode = document.getElementById('pMode').value;
    var utr = document.getElementById('pUtr').value;
    var date = document.getElementById('pDate').value;
    var payId = 'PAY-2026-00' + (document.querySelectorAll('#paymentsTable tbody tr').length + 1);

    try {
        var list = JSON.parse(localStorage.getItem('gh_new_payments') || '[]');
        list.unshift({ payId: payId, inv: inv, cust: cust, amt: amt, mode: mode, utr: utr, date: date });
        localStorage.setItem('gh_new_payments', JSON.stringify(list.slice(0, 20)));
    } catch (e) {}

    var tbody = document.getElementById('paymentsTbody');
    var tr = document.createElement('tr');
    tr.innerHTML =
        '<td><strong class="text-primary">' + payId + '</strong></td>' +
        '<td><a href="invoices.php" class="text-decoration-none fw-semibold">' + inv + '</a></td>' +
        '<td><a href="customer-view.php?id=1&name=' + encCust + '" class="text-dark text-decoration-none fw-semibold"><i class="bi bi-building me-1 text-muted"></i>' + cust + '</a></td>' +
        '<td><span class="badge bg-success-subtle text-success border border-success-subtle">' + mode + '</span></td>' +
        '<td><code class="text-dark">' + utr + '</code></td>' +
        '<td><strong class="text-success">₹' + amt + '</strong></td>' +
        '<td>' + date + '</td>' +
        '<td><div class="d-flex align-items-center gap-1 flex-nowrap">' +
            '<button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" onclick="viewReceipt(\'' + payId + '\', \'' + inv + '\', \'' + cust + '\', \'₹' + amt + '\', \'' + mode + '\', \'' + utr + '\', \'' + date + '\')"><i class="bi bi-receipt"></i></button>' +
            '<a href="customer-view.php?id=1&name=' + encCust + '" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>' +
            '<button type="button" class="btn btn-sm btn-light border text-dark px-2 py-1" onclick="window.print();"><i class="bi bi-printer"></i></button>' +
        '</div></td>';
    tbody.prepend(tr);

    var modalEl = document.getElementById('recordPaymentModal');
    var modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
    var tbl = document.getElementById('paymentsTable');
    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
}

document.addEventListener('DOMContentLoaded', function () {
    var tbody = document.getElementById('paymentsTbody');
    try {
        var list = JSON.parse(localStorage.getItem('gh_new_payments') || '[]');
        list.forEach(function (p) {
            if (!tbody) return;
            var encCust = encodeURIComponent(p.cust || 'Customer');
            var tr = document.createElement('tr');
            tr.innerHTML =
                '<td><strong class="text-primary">' + p.payId + '</strong></td>' +
                '<td><a href="invoices.php" class="text-decoration-none fw-semibold">' + p.inv + '</a></td>' +
                '<td><a href="customer-view.php?id=1&name=' + encCust + '" class="text-dark text-decoration-none fw-semibold"><i class="bi bi-building me-1 text-muted"></i>' + p.cust + '</a></td>' +
                '<td><span class="badge bg-success-subtle text-success border border-success-subtle">' + p.mode + '</span></td>' +
                '<td><code class="text-dark">' + p.utr + '</code></td>' +
                '<td><strong class="text-success">₹' + p.amt + '</strong></td>' +
                '<td>' + p.date + '</td>' +
                '<td><div class="d-flex align-items-center gap-1 flex-nowrap">' +
                    '<button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" onclick="viewReceipt(\'' + p.payId + '\', \'' + p.inv + '\', \'' + p.cust + '\', \'₹' + p.amt + '\', \'' + p.mode + '\', \'' + p.utr + '\', \'' + p.date + '\')"><i class="bi bi-receipt"></i></button>' +
                    '<a href="customer-view.php?id=1&name=' + encCust + '" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>' +
                    '<button type="button" class="btn btn-sm btn-light border text-dark px-2 py-1" onclick="window.print();"><i class="bi bi-printer"></i></button>' +
                '</div></td>';
            tbody.insertBefore(tr, tbody.firstChild);
        });
    } catch (e) {}

    var modeEl = document.getElementById('paymentModeFilter');
    if (modeEl) {
        modeEl.addEventListener('change', function () {
            var mode = modeEl.value.toLowerCase().trim();
            document.querySelectorAll('#paymentsTable tbody tr').forEach(function (tr) {
                tr.style.display = (!mode || tr.textContent.toLowerCase().indexOf(mode) !== -1) ? '' : 'none';
            });
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
