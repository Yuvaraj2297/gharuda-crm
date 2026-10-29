<?php
include 'header.php';
$preCustomer = isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : (isset($_GET['client']) ? htmlspecialchars($_GET['client']) : '');
$preQuote    = isset($_GET['quote']) ? htmlspecialchars($_GET['quote']) : '';
?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Create Tax Invoice</h1>
                <?php if ($preQuote): ?>
                    <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-semibold">
                        <i class="bi bi-arrow-left-right me-1"></i>Converted from Quote #<?php echo $preQuote; ?>
                    </span>
                <?php elseif ($preCustomer): ?>
                    <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">
                        <i class="bi bi-building-check me-1"></i>Client: <?php echo $preCustomer; ?>
                    </span>
                <?php endif; ?>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-receipt fs-6"></i>
                <a href="invoices.php" class="text-decoration-none text-muted">Invoices &amp; Billing</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">New Tax Invoice</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="payments.php" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-credit-card-2-front"></i><span>Payments Ledger</span>
            </a>
            <a href="invoices.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-arrow-left"></i><span>Back to Invoices</span>
            </a>
            <button type="button" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold" onclick="window.print();">
                <i class="bi bi-printer"></i><span>Print Preview</span>
            </button>
        </div>
    </div>

    <!-- Main Invoice Builder Card -->
    <div class="card-custom p-3 p-md-4 mb-4">
        <form id="createInvoiceForm" onsubmit="event.preventDefault(); submitInvoice('list');">
            <!-- Header Meta Row -->
            <div class="row g-3 mb-4 pb-4 border-bottom">
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-dark" for="invNumber">Invoice Number</label>
                    <input type="text" class="form-control fw-bold text-primary bg-light" id="invNumber" value="INV-2026-<?php echo rand(100, 999); ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-dark" for="invCustomer">Customer / Account <span class="text-danger">*</span></label>
                    <select class="form-select select2" id="invCustomer" required onchange="handleCustomerChange(this.value)">
                        <option value="">-- Choose Account --</option>
                        <option value="Power Spares Engineering" <?php if ($preCustomer == 'Power Spares Engineering') echo 'selected'; ?>>Power Spares Engineering</option>
                        <option value="Zen Publications" <?php if ($preCustomer == 'Zen Publications') echo 'selected'; ?>>Zen Publications</option>
                        <option value="Hindustan Hydraulics" <?php if ($preCustomer == 'Hindustan Hydraulics') echo 'selected'; ?>>Hindustan Hydraulics</option>
                        <option value="Gharuda Software" <?php if ($preCustomer == 'Gharuda Software') echo 'selected'; ?>>Gharuda Software</option>
                        <option value="GG COMPANY" <?php if ($preCustomer == 'GG COMPANY') echo 'selected'; ?>>GG COMPANY</option>
                        <?php if ($preCustomer && !in_array($preCustomer, ['Power Spares Engineering', 'Zen Publications', 'Hindustan Hydraulics', 'Gharuda Software', 'GG COMPANY'])): ?>
                            <option value="<?php echo $preCustomer; ?>" selected><?php echo $preCustomer; ?></option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-dark" for="invDate">Invoice Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="invDate" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-dark" for="invDueDate">Payment Due Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="invDueDate" value="<?php echo date('Y-m-d', strtotime('+30 days')); ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold small text-dark" for="invGstin">Client GSTIN / Tax ID</label>
                    <input type="text" class="form-control text-uppercase" id="invGstin" placeholder="e.g. 33AAAAA0000A1Z5" value="33AAACG1234F1ZP">
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-semibold small text-dark" for="invAddress">Billing Address</label>
                    <input type="text" class="form-control" id="invAddress" placeholder="Street, City, State, PIN" value="Plot 42, SIDCO Industrial Estate, Ambattur, Chennai 600058">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-dark" for="invTerms">Payment Terms</label>
                    <select class="form-select" id="invTerms">
                        <option value="Net 30">Net 30 Days</option>
                        <option value="Net 15">Net 15 Days</option>
                        <option value="Due on Receipt">Due on Receipt</option>
                        <option value="Net 45">Net 45 Days</option>
                        <option value="Net 60">Net 60 Days</option>
                    </select>
                </div>
            </div>

            <!-- Line Items Table -->
            <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h5 class="fw-bold mb-0 text-dark fs-6">
                        <i class="bi bi-list-check text-primary me-2"></i>Billable Items &amp; Services
                    </h5>
                    <button type="button" class="btn btn-outline-primary btn-sm fw-semibold" id="addItemBtn" onclick="addRow();">
                        <i class="bi bi-plus-circle me-1"></i>Add Line Item
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0" id="itemsTable">
                        <thead class="table-light">
                            <tr class="text-muted small text-uppercase">
                                <th>Item / Service Description</th>
                                <th>HSN/SAC</th>
                                <th class="text-center">Qty</th>
                                <th>Rate (₹)</th>
                                <th class="text-end">Amount (₹)</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="itemsBody">
                            <tr>
                                <td>
                                    <input type="text" class="form-control form-control-sm mb-1 fw-semibold item-name" value="Enterprise Software Implementation &amp; AMC" placeholder="Service / Item name" required>
                                    <input type="text" class="form-control form-control-sm text-muted item-desc" value="Full rollout, API integration, and monthly SLA maintenance" placeholder="Description / Scope notes">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm item-hsn" value="998313">
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm item-qty text-center" value="1" min="1" oninput="calcTotals();">
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm item-rate" value="500000" min="0" step="100" oninput="calcTotals();">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm item-amount bg-light fw-bold text-end" value="5,00,000.00" readonly>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow(this);"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Calculation & Notes Row -->
            <div class="row g-4 pt-3 border-top">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-dark">Bank &amp; Payment Details</label>
                        <div class="p-3 bg-light border rounded-3 small">
                            <strong>Beneficiary:</strong> Gharuda Infotech Solutions Pvt Ltd<br>
                            <strong>Bank Name:</strong> HDFC Bank Ltd &middot; <strong>A/C No:</strong> 50200084729184<br>
                            <strong>IFSC Code:</strong> HDFC0001847 &middot; <strong>UPI VPA:</strong> gharuda@hdfcbank
                        </div>
                    </div>
                    <div>
                        <label class="form-label fw-semibold small text-dark">Client Notes / Terms</label>
                        <textarea class="form-control" rows="2">Subject to Chennai jurisdiction. Payments are due within specified credit terms. Thank you for your business!</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 rounded-3 bg-light border h-100 d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Sub Total</span>
                            <span class="fw-bold text-dark" id="txtSubtotal">₹5,00,000.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">CGST (9%)</span>
                            <span class="fw-semibold text-secondary" id="txtCgst">₹45,000.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">SGST (9%)</span>
                            <span class="fw-semibold text-secondary" id="txtSgst">₹45,000.00</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted small">Discount / Adjustment (₹)</span>
                            <div class="w-25">
                                <input type="number" class="form-control form-control-sm text-end" id="invDiscount" value="0" oninput="calcTotals();">
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold text-dark mb-0">Grand Total</h5>
                                <small class="text-muted">Inclusive of 18% GST</small>
                            </div>
                            <h3 class="fw-bold text-primary mb-0" id="txtGrandTotal">₹5,90,000.00</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Action Buttons -->
            <div class="d-flex justify-content-end flex-wrap gap-2 mt-4 pt-3 border-top">
                <a href="invoices.php" class="btn btn-outline-secondary">Cancel</a>
                <button type="button" class="btn btn-outline-success fw-semibold" onclick="submitInvoice('pay')">
                    <i class="bi bi-credit-card-2-front me-1"></i>Issue &amp; Record Payment Now
                </button>
                <button type="submit" class="btn btn-primary fw-bold px-4">
                    <i class="bi bi-check2-circle me-1"></i>Issue Invoice &amp; Notify
                </button>
            </div>
        </form>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    try {
        var sel = document.getElementById('invCustomer');
        var list = JSON.parse(localStorage.getItem('gh_new_customers') || '[]');
        list.forEach(function(c) {
            if (!c.company || !sel) return;
            var exists = Array.from(sel.options).some(function(o) { return o.value === c.company; });
            if (!exists) {
                var opt = document.createElement('option');
                opt.value = c.company;
                opt.textContent = c.company;
                sel.appendChild(opt);
            }
        });
    } catch (e) {}
    calcTotals();
});

function handleCustomerChange(cust) {
    var gstinMap = {
        'Power Spares Engineering': '33AAACG1234F1ZP',
        'Zen Publications': '33BBBPZ9876C1ZQ',
        'Hindustan Hydraulics': '33CCCHH5432D1ZR',
        'Gharuda Software': '33DDDG0123E1ZS',
        'GG COMPANY': '33AAACG5555M1ZT'
    };
    if (gstinMap[cust]) {
        document.getElementById('invGstin').value = gstinMap[cust];
    }
}

function addRow() {
    var tbody = document.getElementById('itemsBody');
    var tr = document.createElement('tr');
    tr.innerHTML =
        '<td>' +
            '<input type="text" class="form-control form-control-sm mb-1 fw-semibold item-name" placeholder="Service / Item name" required>' +
            '<input type="text" class="form-control form-control-sm text-muted item-desc" placeholder="Description / Scope notes">' +
        '</td>' +
        '<td><input type="text" class="form-control form-control-sm item-hsn" value="998313"></td>' +
        '<td><input type="number" class="form-control form-control-sm item-qty text-center" value="1" min="1" oninput="calcTotals();"></td>' +
        '<td><input type="number" class="form-control form-control-sm item-rate" value="10000" min="0" step="100" oninput="calcTotals();"></td>' +
        '<td><input type="text" class="form-control form-control-sm item-amount bg-light fw-bold text-end" value="10,000.00" readonly></td>' +
        '<td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger" onclick="removeRow(this);"><i class="bi bi-trash"></i></button></td>';
    tbody.appendChild(tr);
    calcTotals();
}

function removeRow(btn) {
    var rows = document.querySelectorAll('#itemsBody tr');
    if (rows.length > 1) {
        btn.closest('tr').remove();
        calcTotals();
    }
}

function calcTotals() {
    var subtotal = 0;
    var rows = document.querySelectorAll('#itemsBody tr');
    rows.forEach(function(row) {
        var qty = parseFloat(row.querySelector('.item-qty').value) || 0;
        var rate = parseFloat(row.querySelector('.item-rate').value) || 0;
        var amt = qty * rate;
        row.querySelector('.item-amount').value = amt.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        subtotal += amt;
    });

    var discount = parseFloat(document.getElementById('invDiscount').value) || 0;
    var taxable = Math.max(0, subtotal - discount);
    var cgst = taxable * 0.09;
    var sgst = taxable * 0.09;
    var grandTotal = taxable + cgst + sgst;

    document.getElementById('txtSubtotal').textContent = '₹' + subtotal.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('txtCgst').textContent = '₹' + cgst.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('txtSgst').textContent = '₹' + sgst.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('txtGrandTotal').textContent = '₹' + grandTotal.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function submitInvoice(nextMode) {
    var form = document.getElementById('createInvoiceForm');
    var cust = document.getElementById('invCustomer').value;
    if (!cust) {
        form.reportValidity();
        return;
    }
    var invNum = document.getElementById('invNumber').value;
    var invDate = document.getElementById('invDate').value;
    var dueDate = document.getElementById('invDueDate').value;
    var grandText = document.getElementById('txtGrandTotal').textContent;
    var rawNum = grandText.replace(/[^0-9.]/g, '').split('.')[0] || '590000';

    try {
        var list = JSON.parse(localStorage.getItem('gh_new_invoices') || '[]');
        list.unshift({ invNum: invNum, cust: cust, invDate: invDate, dueDate: dueDate, total: grandText, rawAmount: rawNum });
        localStorage.setItem('gh_new_invoices', JSON.stringify(list.slice(0, 20)));
    } catch (e) {}

    if (nextMode === 'pay') {
        window.location.href = 'payments.php?invoice=' + encodeURIComponent(invNum) + '&client=' + encodeURIComponent(cust) + '&amount=' + encodeURIComponent(rawNum);
        return;
    }
    window.location.href = 'invoices.php';
}
</script>

<?php include 'footer.php'; ?>
