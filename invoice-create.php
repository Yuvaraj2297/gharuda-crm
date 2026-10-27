<?php 
include 'header.php'; 
$preCustomer = isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : (isset($_GET['client']) ? htmlspecialchars($_GET['client']) : '');
$preQuote = isset($_GET['quote']) ? htmlspecialchars($_GET['quote']) : '';
?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <a href="invoices.php" class="text-decoration-none text-muted hover-primary">Invoices</a>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">New Tax Invoice</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Create Tax Invoice</h1>
                <?php if ($preQuote): ?>
                <span class="badge bg-primary-subtle text-primary rounded-pill fw-semibold">Converted from Quote <?php echo $preQuote; ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="invoices.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Back to Invoices
            </a>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="window.print();">
                <i class="bi bi-printer me-1"></i>Print Preview
            </button>
        </div>
    </div>

    <!-- Main Invoice Builder Card -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
        <form id="createInvoiceForm" action="invoices.php" method="GET" onsubmit="event.preventDefault(); submitInvoice();">
            <!-- Header Meta Row -->
            <div class="row g-3 mb-4 pb-4 border-bottom">
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Invoice Number</label>
                    <input type="text" class="form-control fw-bold text-primary" id="invNumber" value="INV-2026-<?php echo rand(100, 999); ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Customer / Account <span class="text-danger">*</span></label>
                    <select class="form-select select2" id="invCustomer" required onchange="handleCustomerChange(this.value)">
                        <option value="">-- Choose Account --</option>
                        <option value="Power Spares Engineering" <?php if ($preCustomer == 'Power Spares Engineering') echo 'selected'; ?>>Power Spares Engineering</option>
                        <option value="Zen Publications" <?php if ($preCustomer == 'Zen Publications') echo 'selected'; ?>>Zen Publications</option>
                        <option value="Hindustan Hydraulics" <?php if ($preCustomer == 'Hindustan Hydraulics') echo 'selected'; ?>>Hindustan Hydraulics</option>
                        <option value="Gharuda Software" <?php if ($preCustomer == 'Gharuda Software') echo 'selected'; ?>>Gharuda Software</option>
                        <option value="GG COMPANY" <?php if ($preCustomer == 'GG COMPANY') echo 'selected'; ?>>GG COMPANY</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Invoice Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="invDate" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Payment Due Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="invDueDate" value="<?php echo date('Y-m-d', strtotime('+30 days')); ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold small">Client GSTIN / Tax ID</label>
                    <input type="text" class="form-control" id="invGstin" placeholder="e.g. 33AAAAA0000A1Z5" value="33AAACG1234F1ZP">
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-semibold small">Billing Address</label>
                    <input type="text" class="form-control" id="invAddress" placeholder="Street, City, State, PIN" value="1/2 VOC Street, Menabadu, Ambattur, Chennai 600006">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Payment Terms</label>
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
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="fw-bold mb-0 text-dark">Billable Items &amp; Services</h5>
                    <button type="button" class="btn btn-outline-primary btn-sm" id="addItemBtn" onclick="addRow();">
                        <i class="bi bi-plus-circle me-1"></i>Add Line Item
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle" id="itemsTable">
                        <thead class="table-light">
                            <tr class="text-muted small text-uppercase">
                                <th style="width: 40%;">Item / Service Description</th>
                                <th style="width: 14%;">HSN/SAC</th>
                                <th style="width: 10%;">Qty</th>
                                <th style="width: 16%;">Rate (₹)</th>
                                <th style="width: 15%;">Amount (₹)</th>
                                <th style="width: 5%; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="itemsBody">
                            <tr>
                                <td>
                                    <input type="text" class="form-control form-control-sm mb-1 fw-semibold item-name" value="Enterprise Software Implementation & AMC" placeholder="Service / Item name" required>
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
                                    <button type="button" class="btn btn-link text-danger p-0" onclick="removeRow(this);"><i class="bi bi-trash fs-6"></i></button>
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
                        <label class="form-label fw-semibold small">Bank &amp; Payment Details</label>
                        <div class="p-3 bg-light rounded-3 small">
                            <strong>Beneficiary:</strong> Gharuda Infotech Solutions Pvt Ltd<br>
                            <strong>Bank Name:</strong> HDFC Bank Ltd<br>
                            <strong>Account No:</strong> 50200084729184<br>
                            <strong>IFSC Code:</strong> HDFC0001847<br>
                            <strong>UPI VPA:</strong> gharuda@hdfcbank
                        </div>
                    </div>
                    <div>
                        <label class="form-label fw-semibold small">Client Notes / Terms</label>
                        <textarea class="form-control" rows="3" placeholder="Subject to Chennai jurisdiction. Interest @ 18% p.a. will be charged for delayed payments after due date.">Subject to Chennai jurisdiction. Payments are due within specified credit terms. Thank you for your business!</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card bg-light border-0 p-3 rounded-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Sub Total</span>
                            <span class="fw-bold" id="txtSubtotal">₹5,00,000.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">CGST (9%)</span>
                            <span class="fw-semibold text-muted" id="txtCgst">₹45,000.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">SGST (9%)</span>
                            <span class="fw-semibold text-muted" id="txtSgst">₹45,000.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Discount / Adjustment</span>
                            <input type="number" class="form-control form-control-sm text-end" id="invDiscount" value="0" style="width: 120px;" oninput="calcTotals();">
                        </div>
                        <hr class="my-2 text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold text-dark mb-0">Grand Total</h5>
                                <small class="text-muted" style="font-size:11px;">Inclusive of All Applicable Taxes</small>
                            </div>
                            <h3 class="fw-bold text-primary mb-0" id="txtGrandTotal">₹5,90,000.00</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Action Buttons -->
            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                <a href="invoices.php" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check2-circle me-1"></i>Issue Invoice &amp; Notify</button>
            </div>
        </form>
    </div>
</div>

<script>
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
    tr.innerHTML = `
        <td>
            <input type="text" class="form-control form-control-sm mb-1 fw-semibold item-name" placeholder="Service / Item name" required>
            <input type="text" class="form-control form-control-sm text-muted item-desc" placeholder="Description / Scope notes">
        </td>
        <td>
            <input type="text" class="form-control form-control-sm item-hsn" value="998313">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm item-qty text-center" value="1" min="1" oninput="calcTotals();">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm item-rate" value="10000" min="0" step="100" oninput="calcTotals();">
        </td>
        <td>
            <input type="text" class="form-control form-control-sm item-amount bg-light fw-bold text-end" value="10,000.00" readonly>
        </td>
        <td class="text-center">
            <button type="button" class="btn btn-link text-danger p-0" onclick="removeRow(this);"><i class="bi bi-trash fs-6"></i></button>
        </td>
    `;
    tbody.appendChild(tr);
    calcTotals();
}

function removeRow(btn) {
    var rows = document.querySelectorAll('#itemsBody tr');
    if (rows.length > 1) {
        btn.closest('tr').remove();
        calcTotals();
    } else {
        alert('An invoice must contain at least one line item.');
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

function submitInvoice() {
    var invNum = document.getElementById('invNumber').value;
    var cust = document.getElementById('invCustomer').value;
    alert('Invoice ' + invNum + ' for ' + cust + ' has been created successfully!');
    window.location.href = 'invoices.php';
}
</script>

<?php include 'footer.php'; ?>
