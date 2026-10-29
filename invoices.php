<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Invoices &amp; Billing Ledger</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">₹58.4 Lakh Total Billed</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-receipt fs-6"></i>
                <span>Billing &amp; Finance</span>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Invoices Ledger</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="quotations.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-text"></i><span>Quotations</span>
            </a>
            <a href="payments.php" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-credit-card-2-front"></i><span>Payments Received</span>
            </a>
            <a href="expenses.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-wallet2"></i><span>Field Expenses</span>
            </a>
            <a href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-excel"></i><span>Download Excel</span>
            </a>
            <a href="invoice-create.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-plus-lg"></i><span>Create Tax Invoice</span>
            </a>
        </div>
    </div>

    <!-- Financial KPI Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Total Billed Revenue</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹58,40,000</h3>
                <span class="text-muted small">32 Invoices Issued</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Realized / Paid</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-check-circle"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹46,20,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 79.1% Collected</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Outstanding Balance</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-clock-history"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹12,20,000</h3>
                <span class="text-warning small fw-semibold">Pending Collection</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Overdue Invoices</span>
                    <span class="p-2 rounded-3 bg-danger-subtle text-danger"><i class="bi bi-exclamation-octagon"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹2,80,000</h3>
                <span class="text-danger small fw-semibold">3 Invoices Passed Due</span>
            </div>
        </div>
    </div>

    <!-- Invoices Directory Table Card -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="card-head d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom p-3 mb-0">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-receipt"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">Company Tax Invoices Directory</h3>
                    <small class="text-muted">Track GST receivables, collect payments, and open Customer 360&deg; accounts</small>
                </div>
            </div>
            <a href="invoice-create.php" class="btn btn-primary btn-sm fw-semibold">
                <i class="bi bi-plus-lg me-1"></i>New Tax Invoice
            </a>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" id="invoicesTable" data-table-name="Invoices">
                <thead>
                    <tr>
                        <th>Invoice #</th>
                        <th>Client / Account</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>
                        <th>Total Amount</th>
                        <th>Paid Amount</th>
                        <th>Balance Due</th>
                        <th>Status</th>
                        <th>CRM Action</th>
                    </tr>
                </thead>
                <tbody id="invoicesTbody">
                    <tr>
                        <td class="fw-bold text-primary">#INV-2026-081</td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="fw-bold text-dark text-decoration-none">Power Spares Engineering</a>
                            <div class="text-muted small">M1: Advance Sign-off</div>
                        </td>
                        <td>15-Jan-2026</td>
                        <td>15-Feb-2026</td>
                        <td class="fw-bold text-dark">₹1,50,000</td>
                        <td class="text-success fw-semibold">₹1,50,000</td>
                        <td class="text-muted">₹0</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">Paid</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="payments.php" class="btn btn-sm btn-light border text-success px-2 py-1" title="View Payment Receipt"><i class="bi bi-receipt-cutoff"></i></a>
                                <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                                <button type="button" class="btn btn-sm btn-light border px-2 py-1" title="Print Invoice" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">#INV-2026-088</td>
                        <td>
                            <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="fw-bold text-dark text-decoration-none">Zen Publications</a>
                            <div class="text-muted small">Digital Portal Integration</div>
                        </td>
                        <td>22-Jan-2026</td>
                        <td>22-Feb-2026</td>
                        <td class="fw-bold text-dark">₹2,50,000</td>
                        <td class="text-success fw-semibold">₹1,25,000</td>
                        <td class="text-danger fw-bold">₹1,25,000</td>
                        <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle">Partially Paid</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-primary py-1 px-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">Collect</button>
                                <a href="payments.php?invoice=INV-2026-088&amp;client=Zen+Publications&amp;amount=125000" class="btn btn-sm btn-light border text-success px-2 py-1" title="Record in Payments Ledger"><i class="bi bi-credit-card-2-front"></i></a>
                                <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                                <button type="button" class="btn btn-sm btn-light border px-2 py-1" title="Print Invoice" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">#INV-2026-094</td>
                        <td>
                            <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="fw-bold text-dark text-decoration-none">Hindustan Hydraulics</a>
                            <div class="text-muted small">Annual AMC Support</div>
                        </td>
                        <td>10-Jan-2026</td>
                        <td>25-Jan-2026</td>
                        <td class="fw-bold text-dark">₹2,80,000</td>
                        <td class="text-success fw-semibold">₹0</td>
                        <td class="text-danger fw-bold">₹2,80,000</td>
                        <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle">Overdue</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-primary py-1 px-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">Collect</button>
                                <a href="payments.php?invoice=INV-2026-094&amp;client=Hindustan+Hydraulics&amp;amount=280000" class="btn btn-sm btn-light border text-success px-2 py-1" title="Record in Payments Ledger"><i class="bi bi-credit-card-2-front"></i></a>
                                <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                                <button type="button" class="btn btn-sm btn-light border px-2 py-1" title="Print Invoice" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

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
    try {
        var list = JSON.parse(localStorage.getItem('gh_new_invoices') || '[]');
        list.forEach(function (inv) {
            if (!tbody) return;
            var encCust = encodeURIComponent(inv.cust || 'Client');
            var encInv = encodeURIComponent(inv.invNum || 'INV-2026');
            var rawAmt = encodeURIComponent(inv.rawAmount || '590000');
            var tr = document.createElement('tr');
            tr.innerHTML =
                '<td class="fw-bold text-primary">#' + inv.invNum + '</td>' +
                '<td><a href="customer-view.php?id=1&name=' + encCust + '" class="fw-bold text-dark text-decoration-none">' + inv.cust + '</a><div class="text-muted small">Newly Issued Tax Invoice</div></td>' +
                '<td>' + inv.invDate + '</td>' +
                '<td>' + inv.dueDate + '</td>' +
                '<td class="fw-bold text-dark">' + inv.total + '</td>' +
                '<td class="text-success fw-semibold">₹0</td>' +
                '<td class="text-danger fw-bold">' + inv.total + '</td>' +
                '<td><span class="badge bg-warning-subtle text-warning border border-warning-subtle">Unpaid</span></td>' +
                '<td><div class="d-flex align-items-center gap-1 flex-nowrap">' +
                    '<button type="button" class="btn btn-sm btn-primary py-1 px-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">Collect</button>' +
                    '<a href="payments.php?invoice=' + encInv + '&client=' + encCust + '&amount=' + rawAmt + '" class="btn btn-sm btn-light border text-success px-2 py-1" title="Record in Payments Ledger"><i class="bi bi-credit-card-2-front"></i></a>' +
                    '<a href="customer-view.php?id=1&name=' + encCust + '" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>' +
                    '<button type="button" class="btn btn-sm btn-light border px-2 py-1" title="Print Invoice" onclick="window.print();"><i class="bi bi-printer"></i></button>' +
                '</div></td>';
            tbody.insertBefore(tr, tbody.firstChild);
        });
    } catch (e) {}

    var activeRow = null;
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-bs-target="#recordPaymentModal"]');
        if (!btn) return;
        activeRow = btn.closest('tr');
        if (activeRow) {
            var balText = (activeRow.children[6] ? activeRow.children[6].textContent : '').replace(/[^0-9]/g, '');
            var amtInput = document.getElementById('modalPayAmt');
            if (amtInput && balText) amtInput.value = balText;
        }
    });

    var confirmBtn = document.getElementById('confirmInvoicePayBtn');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function () {
            if (!activeRow) return;
            var invId = activeRow.children[0].textContent.replace('#', '').trim();
            var custEl = activeRow.children[1].querySelector('a');
            var cust = custEl ? custEl.textContent.trim() : 'Customer';
            var totalText = activeRow.children[4].textContent;
            var amtVal = Number(document.getElementById('modalPayAmt').value || 0).toLocaleString('en-IN');
            var modeVal = document.getElementById('modalPayMode').value;
            var utrVal = document.getElementById('modalPayUtr').value;
            var dateVal = document.getElementById('modalPayDate').value;

            try {
                var list = JSON.parse(localStorage.getItem('gh_new_payments') || '[]');
                list.unshift({ payId: 'PAY-2026-' + Math.floor(100 + Math.random() * 900), inv: invId, cust: cust, amt: amtVal, mode: modeVal, utr: utrVal, date: dateVal });
                localStorage.setItem('gh_new_payments', JSON.stringify(list.slice(0, 20)));
            } catch (e) {}

            activeRow.children[5].textContent = totalText;
            activeRow.children[6].textContent = '₹0';
            activeRow.children[6].className = 'text-muted';
            activeRow.children[7].innerHTML = '<span class="badge bg-success-subtle text-success border border-success-subtle">Paid</span>';
        });
    }
});
</script>

<?php include 'footer.php'; ?>
