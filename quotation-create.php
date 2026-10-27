<?php
include 'header.php';
$preClient = isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : (isset($_GET['client']) ? htmlspecialchars($_GET['client']) : '');
?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <a href="quotations.php" class="text-decoration-none text-muted hover-primary">Quotations</a>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">New Quotation</span>
            </nav>
            <h1 class="h3 fw-bold mb-0 text-dark">Create Quotation / Estimate</h1>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="quotations.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Back to Quotations
            </a>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="window.print();">
                <i class="bi bi-printer me-1"></i>Print Preview
            </button>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card border-0 shadow-sm rounded-3 p-4 mb-4 bg-white">
        <form id="createQuoteForm" action="quotations.php" method="GET">
            <!-- Header Info Row -->
            <div class="row g-3 mb-4 pb-4 border-bottom">
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Quotation Number</label>
                    <input type="text" class="form-control fw-bold text-primary" value="#QT-2026-<?php echo rand(100, 999); ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Client / Account <span class="text-danger">*</span></label>
                    <select class="form-select select2" name="customer" required>
                        <option value="">-- Choose Account --</option>
                        <option value="Power Spares Engineering" <?php if (stripos($preClient, 'Power Spares') !== false) echo 'selected'; ?>>Power Spares Engineering</option>
                        <option value="Zen Publications" <?php if (stripos($preClient, 'Zen') !== false) echo 'selected'; ?>>Zen Publications</option>
                        <option value="Hindustan Hydraulics" <?php if (stripos($preClient, 'Hindustan') !== false) echo 'selected'; ?>>Hindustan Hydraulics</option>
                        <option value="Anand Associates" <?php if (stripos($preClient, 'Anand') !== false) echo 'selected'; ?>>Anand Associates</option>
                        <option value="Lakshmi Pharma" <?php if (stripos($preClient, 'Lakshmi') !== false) echo 'selected'; ?>>Lakshmi Pharma</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Issue Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Valid Until <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime('+30 days')); ?>" required>
                </div>
            </div>

            <!-- Line Items Table -->
            <h5 class="fw-bold text-dark mb-3"><i class="bi bi-list-check text-primary me-2"></i>Line Items &amp; Services</h5>
            <div class="table-responsive mb-3">
                <table class="table table-bordered align-middle" id="quoteItemsTable">
                    <thead class="table-light">
                        <tr>
                            <th style="min-width: 250px;">Item / Service Description</th>
                            <th style="width: 140px;">Unit Price (₹)</th>
                            <th style="width: 100px;">Qty</th>
                            <th style="width: 140px;">Tax Rate</th>
                            <th style="width: 150px;">Line Total (₹)</th>
                            <th style="width: 50px;"></th>
                        </tr>
                    </thead>
                    <tbody id="quoteItemsTbody">
                        <tr>
                            <td>
                                <input type="text" class="form-control item-desc" value="Cloud CRM Enterprise License (Annual)" required>
                            </td>
                            <td>
                                <input type="number" class="form-control item-price" value="25000" min="0" oninput="calculateQuoteTotal()">
                            </td>
                            <td>
                                <input type="number" class="form-control item-qty" value="1" min="1" oninput="calculateQuoteTotal()">
                            </td>
                            <td>
                                <select class="form-select item-tax" onchange="calculateQuoteTotal()">
                                    <option value="18" selected>18% GST</option>
                                    <option value="12">12% GST</option>
                                    <option value="5">5% GST</option>
                                    <option value="0">0% Exempt</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control fw-bold item-total text-end" value="25,000" readonly>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeQuoteRow(this)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control item-desc" value="API Integration &amp; Pipeline Setup" required>
                            </td>
                            <td>
                                <input type="number" class="form-control item-price" value="15000" min="0" oninput="calculateQuoteTotal()">
                            </td>
                            <td>
                                <input type="number" class="form-control item-qty" value="1" min="1" oninput="calculateQuoteTotal()">
                            </td>
                            <td>
                                <select class="form-select item-tax" onchange="calculateQuoteTotal()">
                                    <option value="18" selected>18% GST</option>
                                    <option value="12">12% GST</option>
                                    <option value="5">5% GST</option>
                                    <option value="0">0% Exempt</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control fw-bold item-total text-end" value="15,000" readonly>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeQuoteRow(this)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-outline-primary btn-sm mb-4" onclick="addQuoteRow()">
                <i class="bi bi-plus-lg me-1"></i>Add Line Item
            </button>

            <!-- Calculation and Summary Row -->
            <div class="row justify-content-end mb-4">
                <div class="col-md-5">
                    <div class="card border rounded-3 p-3 bg-light-subtle">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Subtotal</span>
                            <span class="fw-bold" id="quoteSubtotal">₹40,000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Estimated GST (18%)</span>
                            <span class="fw-bold text-muted" id="quoteTax">₹7,200</span>
                        </div>
                        <div class="d-flex justify-content-between pt-2 border-top">
                            <span class="fw-bold text-dark fs-5">Grand Total</span>
                            <span class="fw-bold text-primary fs-5" id="quoteGrandTotal">₹47,200</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Terms & Notes -->
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold small">Payment Terms &amp; Conditions</label>
                    <textarea class="form-control" rows="3">1. Payment terms: Net 30 days from invoice date.
2. 50% advance upon milestone commencement.
3. Quotation valid for 30 calendar days from issue.</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold small">Client Note / Message</label>
                    <textarea class="form-control" rows="3" placeholder="Thank you for your business. Please contact your dedicated account executive for any questions..."></textarea>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top">
                <a href="quotations.php" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-send me-1"></i>Save &amp; Issue Quotation
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function calculateQuoteTotal() {
    var rows = document.querySelectorAll('#quoteItemsTbody tr');
    var subtotal = 0;
    var taxTotal = 0;

    rows.forEach(function(row) {
        var price = parseFloat(row.querySelector('.item-price').value) || 0;
        var qty = parseFloat(row.querySelector('.item-qty').value) || 0;
        var taxRate = parseFloat(row.querySelector('.item-tax').value) || 0;

        var lineTotal = price * qty;
        row.querySelector('.item-total').value = lineTotal.toLocaleString('en-IN');

        subtotal += lineTotal;
        taxTotal += (lineTotal * (taxRate / 100));
    });

    var grandTotal = subtotal + taxTotal;

    document.getElementById('quoteSubtotal').textContent = '₹' + subtotal.toLocaleString('en-IN');
    document.getElementById('quoteTax').textContent = '₹' + Math.round(taxTotal).toLocaleString('en-IN');
    document.getElementById('quoteGrandTotal').textContent = '₹' + Math.round(grandTotal).toLocaleString('en-IN');
}

function addQuoteRow() {
    var tbody = document.getElementById('quoteItemsTbody');
    var tr = document.createElement('tr');
    tr.innerHTML = '<td><input type="text" class="form-control item-desc" placeholder="Product or service name..." required></td>' +
        '<td><input type="number" class="form-control item-price" value="0" min="0" oninput="calculateQuoteTotal()"></td>' +
        '<td><input type="number" class="form-control item-qty" value="1" min="1" oninput="calculateQuoteTotal()"></td>' +
        '<td><select class="form-select item-tax" onchange="calculateQuoteTotal()"><option value="18" selected>18% GST</option><option value="12">12% GST</option><option value="5">5% GST</option><option value="0">0% Exempt</option></select></td>' +
        '<td><input type="text" class="form-control fw-bold item-total text-end" value="0" readonly></td>' +
        '<td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger" onclick="removeQuoteRow(this)"><i class="bi bi-trash"></i></button></td>';
    tbody.appendChild(tr);
    calculateQuoteTotal();
}

function removeQuoteRow(btn) {
    var rows = document.querySelectorAll('#quoteItemsTbody tr');
    if (rows.length > 1) {
        btn.closest('tr').remove();
        calculateQuoteTotal();
    } else {
        alert('At least one line item is required.');
    }
}
</script>

<?php include 'footer.php'; ?>
