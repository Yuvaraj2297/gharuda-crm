<?php
include 'header.php';
$preClient = isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : (isset($_GET['client']) ? htmlspecialchars($_GET['client']) : '');
$preClone  = isset($_GET['clone']) ? htmlspecialchars($_GET['clone']) : '';
$preSku    = isset($_GET['sku']) ? htmlspecialchars($_GET['sku']) : '';
?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title"><?php echo $preClone ? 'Duplicate / Re-Quote Proposal' : 'Create Quotation / Estimate'; ?></h1>
                <?php if ($preClone): ?>
                    <span class="badge rounded-pill bg-info-subtle text-info border border-info-subtle px-3 py-2 fw-semibold">
                        <i class="bi bi-copy me-1"></i>Cloned from #<?php echo $preClone; ?>
                    </span>
                <?php endif; ?>
                <?php if ($preClient): ?>
                    <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">
                        <i class="bi bi-building-check me-1"></i>Client: <?php echo $preClient; ?>
                    </span>
                <?php endif; ?>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-file-earmark-text fs-6"></i>
                <a href="quotations.php" class="text-decoration-none text-muted">Quotations</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">New Quotation</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="product-catalog-master.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-box-seam"></i><span>Product Catalog (INV)</span>
            </a>
            <a href="quotations.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-arrow-left"></i><span>Back to Quotations</span>
            </a>
            <button type="button" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold" onclick="window.print();">
                <i class="bi bi-printer"></i><span>Print Preview</span>
            </button>
        </div>
    </div>

    <!-- Main Quotation Builder Card -->
    <div class="card-custom p-3 p-md-4 mb-4">
        <form id="createQuoteForm" onsubmit="event.preventDefault(); submitQuotation('list');">
            <!-- Header Info Row -->
            <div class="row g-3 mb-4 pb-4 border-bottom">
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-dark" for="qNumber">Quotation Number</label>
                    <input type="text" class="form-control fw-bold text-primary bg-light" id="qNumber" value="#QT-2026-<?php echo rand(100, 999); ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-dark" for="qCustomer">Client / Account <span class="text-danger">*</span></label>
                    <select class="form-select select2" id="qCustomer" name="customer" required>
                        <option value="">-- Choose Account --</option>
                        <option value="Power Spares Engineering" <?php if ($preClient == 'Power Spares Engineering') echo 'selected'; ?>>Power Spares Engineering</option>
                        <option value="Zen Publications" <?php if ($preClient == 'Zen Publications') echo 'selected'; ?>>Zen Publications</option>
                        <option value="Hindustan Hydraulics" <?php if ($preClient == 'Hindustan Hydraulics') echo 'selected'; ?>>Hindustan Hydraulics</option>
                        <option value="GG COMPANY" <?php if ($preClient == 'GG COMPANY') echo 'selected'; ?>>GG COMPANY</option>
                        <option value="Anand Associates" <?php if ($preClient == 'Anand Associates') echo 'selected'; ?>>Anand Associates</option>
                        <option value="Lakshmi Pharma" <?php if ($preClient == 'Lakshmi Pharma') echo 'selected'; ?>>Lakshmi Pharma</option>
                        <?php if ($preClient && !in_array($preClient, ['Power Spares Engineering', 'Zen Publications', 'Hindustan Hydraulics', 'GG COMPANY', 'Anand Associates', 'Lakshmi Pharma'])): ?>
                            <option value="<?php echo $preClient; ?>" selected><?php echo $preClient; ?></option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-dark" for="qIssueDate">Issue Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="qIssueDate" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-dark" for="qValidDate">Valid Until <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="qValidDate" value="<?php echo date('Y-m-d', strtotime('+30 days')); ?>" required>
                </div>
            </div>

            <!-- Line Items & Product Catalog Quick Picker -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                <h5 class="fw-bold text-dark mb-0 fs-6">
                    <i class="bi bi-list-check text-primary me-2"></i>Line Items &amp; Catalog Services
                </h5>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <select class="form-select form-select-sm" id="catalogQuickSelect" onchange="addCatalogSku(this)">
                        <option value="">+ Quick Add from Product Catalog (INV)...</option>
                        <option value="Cloud CRM Enterprise License (Annual)|250000|18">SKU-001 · Cloud CRM Enterprise License (₹2,50,000)</option>
                        <option value="Annual AMC & 24/7 Priority SLA Pack|120000|18">SKU-002 · Annual AMC &amp; Priority SLA (₹1,20,000)</option>
                        <option value="WhatsApp Business API & Chatbot Integration|45000|18">SKU-003 · WhatsApp API Integration (₹45,000)</option>
                        <option value="Mobile Field Force & Geo-Attendance Module|85000|18">SKU-004 · Mobile Field Force Module (₹85,000)</option>
                    </select>
                    <button type="button" class="btn btn-outline-primary btn-sm text-nowrap fw-semibold" onclick="addQuoteRow()">
                        <i class="bi bi-plus-lg me-1"></i>Add Blank Row
                    </button>
                </div>
            </div>

            <div class="table-responsive mb-4">
                <table class="table table-bordered align-middle mb-0" id="quoteItemsTable">
                    <thead class="table-light">
                        <tr class="small text-uppercase text-muted">
                            <th>Item / Service Description</th>
                            <th>Unit Price (₹)</th>
                            <th>Qty</th>
                            <th>Tax Rate</th>
                            <th class="text-end">Line Total (₹)</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="quoteItemsTbody">
                        <tr>
                            <td>
                                <input type="text" class="form-control item-desc" value="Cloud CRM Enterprise License (Annual)" required>
                            </td>
                            <td>
                                <input type="number" class="form-control item-price" value="250000" min="0" oninput="calculateQuoteTotal()">
                            </td>
                            <td>
                                <input type="number" class="form-control item-qty text-center" value="1" min="1" oninput="calculateQuoteTotal()">
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
                                <input type="text" class="form-control fw-bold item-total text-end bg-light" value="2,50,000" readonly>
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
                                <input type="number" class="form-control item-price" value="150000" min="0" oninput="calculateQuoteTotal()">
                            </td>
                            <td>
                                <input type="number" class="form-control item-qty text-center" value="1" min="1" oninput="calculateQuoteTotal()">
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
                                <input type="text" class="form-control fw-bold item-total text-end bg-light" value="1,50,000" readonly>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeQuoteRow(this)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Terms & Calculation Summary Row -->
            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-7">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-dark">Payment Terms &amp; Conditions</label>
                            <textarea class="form-control" rows="3">1. Payment terms: Net 30 days from invoice date.
2. 50% advance upon milestone commencement.
3. Quotation valid for 30 calendar days from issue.</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-dark">Client Note / Message</label>
                            <textarea class="form-control" rows="2" placeholder="Thank you for your business. Please contact your dedicated account executive for any questions..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="p-3 rounded-3 bg-light border h-100 d-flex flex-column justify-content-center">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Taxable Subtotal</span>
                            <span class="fw-bold text-dark" id="quoteSubtotal">₹4,00,000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted small">Estimated GST (18%)</span>
                            <span class="fw-semibold text-secondary" id="quoteTax">₹72,000</span>
                        </div>
                        <div class="d-flex justify-content-between pt-2 border-top mt-2">
                            <span class="fw-bold text-dark fs-5">Grand Total</span>
                            <span class="fw-bold text-primary fs-4" id="quoteGrandTotal">₹4,72,000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Multi-Action Submit Bar -->
            <div class="d-flex align-items-center justify-content-end flex-wrap gap-2 pt-3 border-top">
                <a href="quotations.php" class="btn btn-outline-secondary">Cancel</a>
                <button type="button" class="btn btn-outline-primary fw-semibold" onclick="submitQuotation('so')">
                    <i class="bi bi-bag-check me-1"></i>Save &amp; Convert to Sales Order
                </button>
                <button type="button" class="btn btn-outline-success fw-semibold" onclick="submitQuotation('invoice')">
                    <i class="bi bi-receipt me-1"></i>Save &amp; Convert to Tax Invoice
                </button>
                <button type="button" class="btn btn-outline-dark fw-semibold" onclick="submitQuotation('contract')">
                    <i class="bi bi-pen me-1"></i>Save &amp; Draft SLA Contract
                </button>
                <button type="submit" class="btn btn-primary fw-bold px-4">
                    <i class="bi bi-send me-1"></i>Save &amp; Issue Quotation
                </button>
            </div>
        </form>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load newly onboarded customers from localStorage into Client select
    try {
        var sel = document.getElementById('qCustomer');
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

    // Load custom SKUs from Product Catalog Master (gh_new_skus)
    try {
        var catSel = document.getElementById('catalogQuickSelect');
        var skus = JSON.parse(localStorage.getItem('gh_new_skus') || '[]');
        skus.forEach(function(s) {
            if (!catSel || !s.name) return;
            var opt = document.createElement('option');
            opt.value = s.name + '|' + (s.price || s.rate || 25000) + '|' + (s.gst || 18);
            opt.textContent = (s.sku || 'SKU') + ' · ' + s.name + ' (₹' + Number(s.price || s.rate || 25000).toLocaleString('en-IN') + ')';
            catSel.appendChild(opt);
        });
    } catch (e) {}

    // Pre-fill item / price if passed via ?item=...&price=... (from Catalog Quote or Duplicate Quote)
    var params = new URLSearchParams(window.location.search);
    var pItem = params.get('item');
    var pPrice = params.get('price');
    if (pItem) {
        var tbody = document.getElementById('quoteItemsTbody');
        if (tbody) {
            tbody.innerHTML = '';
            addQuoteRow(pItem, Number(pPrice) || 150000, 18);
        }
    }

    calculateQuoteTotal();
});

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

function addQuoteRow(desc, price, tax) {
    var tbody = document.getElementById('quoteItemsTbody');
    var tr = document.createElement('tr');
    tr.innerHTML =
        '<td><input type="text" class="form-control item-desc" value="' + (desc || '') + '" placeholder="Product or service name..." required></td>' +
        '<td><input type="number" class="form-control item-price" value="' + (price || 0) + '" min="0" oninput="calculateQuoteTotal()"></td>' +
        '<td><input type="number" class="form-control item-qty text-center" value="1" min="1" oninput="calculateQuoteTotal()"></td>' +
        '<td><select class="form-select item-tax" onchange="calculateQuoteTotal()">' +
            '<option value="18" ' + ((tax || 18) == 18 ? 'selected' : '') + '>18% GST</option>' +
            '<option value="12" ' + (tax == 12 ? 'selected' : '') + '>12% GST</option>' +
            '<option value="5" ' + (tax == 5 ? 'selected' : '') + '>5% GST</option>' +
            '<option value="0" ' + (tax === 0 ? 'selected' : '') + '>0% Exempt</option>' +
        '</select></td>' +
        '<td><input type="text" class="form-control fw-bold item-total text-end bg-light" value="0" readonly></td>' +
        '<td class="text-center"><button type="button" class="btn btn-sm btn-outline-danger" onclick="removeQuoteRow(this)"><i class="bi bi-trash"></i></button></td>';
    tbody.appendChild(tr);
    calculateQuoteTotal();
}

function addCatalogSku(sel) {
    if (!sel.value) return;
    var parts = sel.value.split('|');
    addQuoteRow(parts[0], Number(parts[1]) || 0, Number(parts[2]) || 18);
    sel.value = '';
}

function removeQuoteRow(btn) {
    var rows = document.querySelectorAll('#quoteItemsTbody tr');
    if (rows.length > 1) {
        btn.closest('tr').remove();
        calculateQuoteTotal();
    }
}

function submitQuotation(nextMode) {
    var form = document.getElementById('createQuoteForm');
    var cust = document.getElementById('qCustomer').value;
    if (!cust) {
        form.reportValidity();
        return;
    }
    var qNum = document.getElementById('qNumber').value.replace('#', '').trim();
    var issue = document.getElementById('qIssueDate').value;
    var valid = document.getElementById('qValidDate').value;
    var sub = document.getElementById('quoteSubtotal').textContent;
    var tax = document.getElementById('quoteTax').textContent;
    var grand = document.getElementById('quoteGrandTotal').textContent;
    var rawGrand = Number(String(grand || '').replace(/[^0-9]/g, '')) || 150000;
    var firstItemEl = document.querySelector('#quoteItemsTbody .item-desc');
    var firstItem = firstItemEl ? firstItemEl.value.trim() : 'Enterprise Solution';

    try {
        var list = JSON.parse(localStorage.getItem('gh_new_quotes') || '[]');
        // Remove any existing quote with the same qNum to prevent duplicates
        list = list.filter(function(item) {
            return String(item.qNum || '').replace('#', '').trim() !== qNum;
        });
        list.unshift({ qNum: qNum, cust: cust, issue: issue, valid: valid, sub: sub, tax: tax, grand: grand, item: firstItem });
        localStorage.setItem('gh_new_quotes', JSON.stringify(list.slice(0, 20)));
    } catch (e) {}

    var encCust = encodeURIComponent(cust);
    if (nextMode === 'so') {
        window.location.href = 'sales-order-create.php?quote=' + encodeURIComponent(qNum) + '&client=' + encCust + '&amount=' + rawGrand;
        return;
    }
    if (nextMode === 'invoice') {
        window.location.href = 'invoice-create.php?quote=' + encodeURIComponent(qNum) + '&client=' + encCust + '&amount=' + rawGrand;
        return;
    }
    if (nextMode === 'contract') {
        window.location.href = 'contracts.php?quote=' + encodeURIComponent(qNum) + '&client=' + encCust;
        return;
    }
    window.location.href = 'quotations.php';
}
</script>

<?php include 'footer.php'; ?>
