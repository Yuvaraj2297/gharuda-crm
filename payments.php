<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <span>Finance &amp; Accounts</span>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Payments Received Ledger</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Payments Received</h1>
                <span class="badge bg-success-subtle text-success rounded-pill fw-semibold">₹46.2 Lakh Collected</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="invoices.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-file-earmark-ruled me-1"></i>Invoices
            </a>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#recordPaymentModal">
                <i class="bi bi-plus-lg me-1"></i>Record Payment
            </button>
        </div>
    </div>

    <!-- Payment Metrics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Total Realized Revenue</span>
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-cash-stack"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹46,20,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-check2-circle me-1"></i>28 Payments Cleared</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Collected This Month</span>
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-calendar-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹14,80,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> +18.4% vs Last Month</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Primary Payment Mode</span>
                    <span class="p-2 rounded-2 bg-info-subtle text-info"><i class="bi bi-bank"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">72% NEFT/RTGS</h3>
                <span class="text-muted small">Corporate Bank Transfers</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Average Settlement Time</span>
                    <span class="p-2 rounded-2 bg-warning-subtle text-warning"><i class="bi bi-speedometer2"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">14.2 Days</h3>
                <span class="text-muted small">From Invoice Generation</span>
            </div>
        </div>
    </div>

    <!-- Payments Ledger Table -->
    <div class="card border-0 shadow-sm rounded-3 bg-white overflow-hidden mb-4">
        <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-receipt-cutoff"></i></span>
                <h6 class="fw-bold mb-0 text-dark">Transactions &amp; Collections Ledger</h6>
            </div>
            <div class="d-flex align-items-center gap-2">
                <input type="text" class="form-control form-control-sm" id="paymentSearch" placeholder="Search payment # or client..." style="width: 240px;">
                <select class="form-select form-select-sm" id="paymentModeFilter" style="width: 140px;">
                    <option value="">All Modes</option>
                    <option value="NEFT">NEFT / RTGS</option>
                    <option value="UPI">UPI / QR</option>
                    <option value="Bank">Bank Transfer</option>
                    <option value="Cheque">Cheque</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable" id="paymentsTable" data-table-name="Payments Received">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="font-size:12px;font-weight:700;">PAYMENT #</th>
                        <th style="font-size:12px;font-weight:700;">INVOICE #</th>
                        <th style="font-size:12px;font-weight:700;">CUSTOMER</th>
                        <th style="font-size:12px;font-weight:700;">PAYMENT MODE</th>
                        <th style="font-size:12px;font-weight:700;">TRANSACTION / UTR</th>
                        <th style="font-size:12px;font-weight:700;">AMOUNT (INR)</th>
                        <th style="font-size:12px;font-weight:700;">PAYMENT DATE</th>
                        <th class="text-end pe-3" style="font-size:12px;font-weight:700;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13.5px;">
                    <tr>
                        <td class="ps-3"><strong class="text-primary">PAY-2026-001</strong></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold">INV-2026-001</a></td>
                        <td>
                            <a href="customer-view.php?id=1&name=Power+Spares+Engineering" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Power Spares Engineering
                            </a>
                        </td>
                        <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">NEFT / RTGS</span></td>
                        <td><code class="text-dark">HDFC0001847291</code></td>
                        <td><strong class="text-success fs-6">₹14,75,000</strong></td>
                        <td>14-Oct-2026</td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-outline-secondary py-1 px-2" title="View Receipt" onclick="viewReceipt('PAY-2026-001', 'INV-2026-001', 'Power Spares Engineering', '₹14,75,000', 'NEFT / RTGS', 'HDFC0001847291', '14-Oct-2026')"><i class="bi bi-receipt"></i></button>
                            <button class="btn btn-sm btn-outline-primary py-1 px-2" title="Download PDF Voucher" onclick="alert('Downloading Receipt Voucher for PAY-2026-001...')"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3"><strong class="text-primary">PAY-2026-002</strong></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold">INV-2026-003</a></td>
                        <td>
                            <a href="customer-view.php?id=3&name=Hindustan+Hydraulics" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Hindustan Hydraulics
                            </a>
                        </td>
                        <td><span class="badge bg-info-subtle text-info border border-info-subtle">Bank Transfer</span></td>
                        <td><code class="text-dark">ICIC9928374612</code></td>
                        <td><strong class="text-success fs-6">₹9,91,200</strong></td>
                        <td>08-Oct-2026</td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-outline-secondary py-1 px-2" title="View Receipt" onclick="viewReceipt('PAY-2026-002', 'INV-2026-003', 'Hindustan Hydraulics', '₹9,91,200', 'Bank Transfer', 'ICIC9928374612', '08-Oct-2026')"><i class="bi bi-receipt"></i></button>
                            <button class="btn btn-sm btn-outline-primary py-1 px-2" title="Download PDF Voucher" onclick="alert('Downloading Receipt Voucher for PAY-2026-002...')"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3"><strong class="text-primary">PAY-2026-003</strong></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold">INV-2026-004</a></td>
                        <td>
                            <a href="customer-view.php?id=4&name=Gharuda+Software" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Gharuda Software
                            </a>
                        </td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">UPI / IMPS</span></td>
                        <td><code class="text-dark">UPI-88371902847</code></td>
                        <td><strong class="text-success fs-6">₹14,16,000</strong></td>
                        <td>01-Oct-2026</td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-outline-secondary py-1 px-2" title="View Receipt" onclick="viewReceipt('PAY-2026-003', 'INV-2026-004', 'Gharuda Software', '₹14,16,000', 'UPI / IMPS', 'UPI-88371902847', '01-Oct-2026')"><i class="bi bi-receipt"></i></button>
                            <button class="btn btn-sm btn-outline-primary py-1 px-2" title="Download PDF Voucher" onclick="alert('Downloading Receipt Voucher for PAY-2026-003...')"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3"><strong class="text-primary">PAY-2026-004</strong></td>
                        <td><a href="invoices.php" class="text-decoration-none fw-semibold">INV-2026-002</a></td>
                        <td>
                            <a href="customer-view.php?id=2&name=Zen+Publications" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Zen Publications
                            </a>
                        </td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Cheque</span></td>
                        <td><code class="text-dark">CHQ-009482</code></td>
                        <td><strong class="text-success fs-6">₹7,37,800</strong></td>
                        <td>25-Sep-2026</td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-outline-secondary py-1 px-2" title="View Receipt" onclick="viewReceipt('PAY-2026-004', 'INV-2026-002', 'Zen Publications', '₹7,37,800', 'Cheque', 'CHQ-009482', '25-Sep-2026')"><i class="bi bi-receipt"></i></button>
                            <button class="btn btn-sm btn-outline-primary py-1 px-2" title="Download PDF Voucher" onclick="alert('Downloading Receipt Voucher for PAY-2026-004...')"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Record Payment -->
<div class="modal fade" id="recordPaymentModal" tabindex="-1" aria-labelledby="recordPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3">
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
                                <option value="INV-2026-001" data-cust="Power Spares Engineering" data-due="1475000">INV-2026-001 - Power Spares Engineering (₹14,75,000)</option>
                                <option value="INV-2026-002" data-cust="Zen Publications" data-due="737800">INV-2026-002 - Zen Publications (₹7,37,800)</option>
                                <option value="INV-2026-003" data-cust="Hindustan Hydraulics" data-due="991200">INV-2026-003 - Hindustan Hydraulics (₹9,91,200)</option>
                                <option value="INV-2026-005" data-cust="GG COMPANY" data-due="590000">INV-2026-005 - GG COMPANY (₹5,90,000)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Customer</label>
                            <input type="text" class="form-control bg-light" id="pCustomer" readonly placeholder="Auto-populated from Invoice">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Amount Received (INR ₹) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" id="pAmount" placeholder="e.g. 500000" required>
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
                            <input type="text" class="form-control" id="pUtr" placeholder="e.g. HDFC009283741" required>
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
                <div class="modal-footer border-top p-3">
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
            <div class="modal-body p-4" id="vrModalBody">
                <!-- Injected via JavaScript -->
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="alert('Receipt PDF printed / exported!')"><i class="bi bi-printer me-1"></i>Print Voucher</button>
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
    } else {
        document.getElementById('pCustomer').value = '';
        document.getElementById('pAmount').value = '';
    }
}

function viewReceipt(payId, invId, cust, amount, mode, utr, date) {
    document.getElementById('vrModalTitle').textContent = 'Receipt: ' + payId;
    document.getElementById('vrModalBody').innerHTML = `
        <div class="text-center p-3 mb-3 bg-success-subtle text-success rounded-3">
            <i class="bi bi-patch-check-fill fs-1 d-block mb-1"></i>
            <span class="small fw-bold text-uppercase tracking-wider">Payment Received & Verified</span>
            <div class="fs-3 fw-bold text-dark mt-1">${amount}</div>
        </div>
        <div class="row g-2 small">
            <div class="col-6"><strong>Invoice:</strong> <span class="text-muted">${invId}</span></div>
            <div class="col-6"><strong>Client:</strong> <span class="text-muted">${cust}</span></div>
            <div class="col-6"><strong>Payment Mode:</strong> <span class="text-muted">${mode}</span></div>
            <div class="col-6"><strong>Date Received:</strong> <span class="text-muted">${date}</span></div>
            <div class="col-12"><strong>Transaction Ref / UTR:</strong> <code>${utr}</code></div>
        </div>
        <div class="border-top pt-3 mt-3 text-muted small">
            This receipt serves as official acknowledgment of payment receipt into Gharuda Infotech accounts.
        </div>
    `;
    var modal = new bootstrap.Modal(document.getElementById('viewReceiptModal'));
    modal.show();
}

function savePayment() {
    var inv = document.getElementById('pInvoice').value;
    var cust = document.getElementById('pCustomer').value || 'Customer';
    var amt = Number(document.getElementById('pAmount').value).toLocaleString('en-IN');
    var mode = document.getElementById('pMode').value;
    var utr = document.getElementById('pUtr').value;
    var date = document.getElementById('pDate').value;
    var payId = 'PAY-2026-00' + (document.querySelectorAll('#paymentsTable tbody tr').length + 1);

    var tbody = document.querySelector('#paymentsTable tbody');
    var tr = document.createElement('tr');
    tr.innerHTML = `
        <td class="ps-3"><strong class="text-primary">${payId}</strong></td>
        <td><a href="invoices.php" class="text-decoration-none fw-semibold">${inv}</a></td>
        <td>
            <a href="customers.php" class="text-dark text-decoration-none fw-semibold">
                <i class="bi bi-building me-1 text-muted"></i>${cust}
            </a>
        </td>
        <td><span class="badge bg-success-subtle text-success border border-success-subtle">${mode}</span></td>
        <td><code class="text-dark">${utr}</code></td>
        <td><strong class="text-success fs-6">₹${amt}</strong></td>
        <td>${date}</td>
        <td class="text-end pe-3">
            <button class="btn btn-sm btn-outline-secondary py-1 px-2" onclick="viewReceipt('${payId}', '${inv}', '${cust}', '₹${amt}', '${mode}', '${utr}', '${date}')"><i class="bi bi-receipt"></i></button>
            <button class="btn btn-sm btn-outline-primary py-1 px-2" onclick="alert('Downloading Receipt...')"><i class="bi bi-download"></i></button>
        </td>
    `;
    tbody.prepend(tr);

    var modalEl = document.getElementById('recordPaymentModal');
    var modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
    var tbl = document.getElementById('paymentsTable');
    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
    alert('Payment ' + payId + ' recorded successfully!');
}

document.addEventListener('DOMContentLoaded', function () {
    var searchEl = document.getElementById('paymentSearch');
    var modeEl = document.getElementById('paymentModeFilter');
    function filterPayments() {
        var q = (searchEl ? searchEl.value : '').toLowerCase().trim();
        var mode = (modeEl ? modeEl.value : '').toLowerCase().trim();
        document.querySelectorAll('#paymentsTable tbody tr').forEach(function (tr) {
            var text = tr.textContent.toLowerCase();
            var matchQ = !q || text.indexOf(q) !== -1;
            var matchM = !mode || text.indexOf(mode) !== -1;
            tr.style.display = (matchQ && matchM) ? '' : 'none';
        });
    }
    if (searchEl) searchEl.addEventListener('input', filterPayments);
    if (modeEl) modeEl.addEventListener('change', filterPayments);
});
</script>

<?php include 'footer.php'; ?>
