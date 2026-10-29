<?php
include 'header.php';
$preQuote  = isset($_GET['quote']) ? htmlspecialchars($_GET['quote']) : 'QT-2026-089';
$preClient = isset($_GET['client']) ? htmlspecialchars($_GET['client']) : 'Power Spares Engineering';
$preAmount = isset($_GET['amount']) ? (float)$_GET['amount'] : 145000;
?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Create Sales Order (SO)</h1>
                <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-semibold">SO #SO-2026-105</span>
                <?php if (!empty($_GET['quote'])): ?>
                    <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">
                        <i class="bi bi-link-45deg me-1"></i>Converted from Quote #<?php echo $preQuote; ?>
                    </span>
                <?php endif; ?>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-bag-check fs-6"></i>
                <a href="quotations.php" class="text-decoration-none text-muted">Quotations</a>
                <i class="bi bi-chevron-right small"></i>
                <a href="sales-orders.php" class="text-decoration-none text-muted">Sales Orders</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">New Sales Order</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="inventory.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-boxes"></i><span>Check Warehouse Stock</span>
            </a>
            <a href="sales-orders.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-arrow-left"></i><span>All Sales Orders</span>
            </a>
        </div>
    </div>

    <div class="row g-3">
        <!-- Left Column: Customer & Line Items -->
        <div class="col-12 col-xl-8">
            <div class="card-custom p-4 mb-3">
                <h6 class="fw-bold text-uppercase text-muted small mb-3"><i class="bi bi-building text-primary me-1"></i>1. Customer Account &amp; Order Reference</h6>
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label small fw-semibold">Customer Account <span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" id="soClientSelect">
                            <option value="<?php echo $preClient; ?>" selected><?php echo $preClient; ?></option>
                            <option value="Zen Publications">Zen Publications</option>
                            <option value="Hindustan Hydraulics Pvt Ltd">Hindustan Hydraulics Pvt Ltd</option>
                            <option value="Apex Global Logistics Ltd">Apex Global Logistics Ltd</option>
                            <option value="Mehta Systems Pvt Ltd">Mehta Systems Pvt Ltd</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">Sales Order #</label>
                        <input type="text" class="form-control form-control-sm fw-bold" id="soNumberInput" value="SO-2026-105">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Source Quotation #</label>
                        <input type="text" class="form-control form-control-sm" id="soQuoteRef" value="<?php echo $preQuote; ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Customer PO Reference #</label>
                        <input type="text" class="form-control form-control-sm" id="soClientPo" value="CUST/PO/2026/904">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Dispatch Warehouse</label>
                        <select class="form-select form-select-sm" id="soWarehouse">
                            <option value="Chennai HQ">Chennai HQ Warehouse</option>
                            <option value="Bengaluru Hub">Bengaluru Tech Hub</option>
                            <option value="Cloud Pool">Digital License Pool</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Committed Delivery Date</label>
                        <input type="date" class="form-control form-control-sm" id="soDeliveryDate" value="<?php echo date('Y-m-d', strtotime('+5 days')); ?>">
                    </div>
                </div>
            </div>

            <!-- Line Items Card -->
            <div class="card-custom p-4 mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h6 class="fw-bold text-uppercase text-muted small mb-0"><i class="bi bi-box-seam text-success me-1"></i>2. Sales Order Items &amp; Stock Reservation</h6>
                    <div class="d-flex flex-wrap gap-1">
                        <button type="button" class="btn btn-outline-success btn-sm py-0 px-2 small quick-so-sku" data-sku="SKU-SW-101" data-item="Gharuda Cloud CRM Enterprise License" data-stock="In Stock (140)" data-rate="25000" data-qty="5">+ Cloud CRM (In Stock)</button>
                        <button type="button" class="btn btn-outline-warning btn-sm py-0 px-2 small quick-so-sku" data-sku="SKU-HW-102" data-item="Biometric Attendance Terminal Pro" data-stock="Low Stock (6)" data-rate="14500" data-qty="10">+ Biometric Terminal</button>
                        <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2 small quick-so-sku" data-sku="SKU-HW-103" data-item="Industrial Barcode & POS Scanner Kit" data-stock="In Stock (42)" data-rate="7800" data-qty="10">+ POS Scanner</button>
                    </div>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered align-middle mb-0" id="soItemsTable">
                        <thead class="table-light">
                            <tr>
                                <th>SKU Code</th>
                                <th>Product / Service Description</th>
                                <th>Stock Status</th>
                                <th class="text-center">Order Qty</th>
                                <th class="text-end">Unit Price (₹)</th>
                                <th class="text-center">GST %</th>
                                <th class="text-end">Line Total (₹)</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody id="soItemsBody">
                            <tr>
                                <td><input type="text" class="form-control form-control-sm so-sku" value="SKU-HW-102"></td>
                                <td><input type="text" class="form-control form-control-sm so-item" value="Biometric Attendance &amp; Access Terminal Pro"></td>
                                <td><span class="badge bg-success-subtle text-success border border-success-subtle">Reserved</span></td>
                                <td><input type="number" class="form-control form-control-sm text-center so-qty" value="10" min="1"></td>
                                <td><input type="number" class="form-control form-control-sm text-end so-rate" value="<?php echo ($preAmount > 0 ? round($preAmount / 10) : 14500); ?>" min="0"></td>
                                <td>
                                    <select class="form-select form-select-sm so-gst">
                                        <option value="18" selected>18%</option>
                                        <option value="12">12%</option>
                                        <option value="0">0%</option>
                                    </select>
                                </td>
                                <td class="text-end fw-bold so-line-total">₹0</td>
                                <td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm py-0 px-2 btn-remove-so-row"><i class="bi bi-trash"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm fw-semibold" id="addSoRowBtn"><i class="bi bi-plus-circle me-1"></i>Add Line Item</button>
            </div>
        </div>

        <!-- Right Column: Order Summary & Actions -->
        <div class="col-12 col-xl-4">
            <div class="card-custom p-4 mb-3">
                <h6 class="fw-bold text-uppercase text-muted small mb-3"><i class="bi bi-calculator text-success me-1"></i>3. Sales Order Summary (INR)</h6>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Taxable Order Value</span>
                    <span class="fw-semibold text-dark" id="soSubtotalLabel">₹0</span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Output CGST (9%)</span>
                    <span class="fw-semibold text-dark" id="soCgstLabel">₹0</span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Output SGST (9%)</span>
                    <span class="fw-semibold text-dark" id="soSgstLabel">₹0</span>
                </div>
                <div class="d-flex justify-content-between py-3 mb-3 bg-light rounded-3 px-3 mt-2">
                    <span class="fw-bold text-dark">Grand Total (SO Value)</span>
                    <span class="fw-bold fs-5 text-success" id="soGrandTotalLabel">₹0</span>
                </div>

                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary fw-bold" id="confirmSoBtn">
                        <i class="bi bi-bag-check me-1"></i>Confirm Sales Order &amp; Reserve Stock
                    </button>
                    <button type="button" class="btn btn-success fw-bold" id="confirmSoAndBillBtn">
                        <i class="bi bi-file-earmark-ruled me-1"></i>Confirm SO &amp; Generate Tax Invoice
                    </button>
                    <button type="button" class="btn btn-outline-warning fw-bold" id="confirmSoAndPoBtn">
                        <i class="bi bi-cart-plus me-1"></i>Confirm SO &amp; Raise Backorder PO
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var body = document.getElementById('soItemsBody');
    var clientSel = document.getElementById('soClientSelect');
    var rawGrandTotal = 0;

    // Load dynamically onboarded customers
    try {
        var custs = JSON.parse(localStorage.getItem('gh_new_customers') || '[]');
        custs.forEach(function (c) {
            if (c.companyName) {
                var opt = document.createElement('option');
                opt.value = c.companyName;
                opt.textContent = c.companyName;
                clientSel.appendChild(opt);
            }
        });
    } catch (e) {}

    function recalcSo() {
        var sub = 0;
        var tax = 0;
        Array.prototype.forEach.call(body.querySelectorAll('tr'), function (tr) {
            var q = parseFloat(tr.querySelector('.so-qty').value) || 0;
            var r = parseFloat(tr.querySelector('.so-rate').value) || 0;
            var g = parseFloat(tr.querySelector('.so-gst').value) || 0;
            var lSub = q * r;
            var lTax = lSub * (g / 100);
            var lTot = Math.round(lSub + lTax);
            sub += lSub;
            tax += lTax;
            tr.querySelector('.so-line-total').textContent = '₹' + lTot.toLocaleString('en-IN');
        });
        rawGrandTotal = Math.round(sub + tax);
        document.getElementById('soSubtotalLabel').textContent = '₹' + Math.round(sub).toLocaleString('en-IN');
        document.getElementById('soCgstLabel').textContent = '₹' + Math.round(tax / 2).toLocaleString('en-IN');
        document.getElementById('soSgstLabel').textContent = '₹' + Math.round(tax / 2).toLocaleString('en-IN');
        document.getElementById('soGrandTotalLabel').textContent = '₹' + rawGrandTotal.toLocaleString('en-IN');
    }

    function addSoRow(sku, item, stock, qty, rate) {
        var tr = document.createElement('tr');
        tr.innerHTML =
            '<td><input type="text" class="form-control form-control-sm so-sku" value="' + (sku || 'SKU-SW-101') + '"></td>' +
            '<td><input type="text" class="form-control form-control-sm so-item" value="' + (item || '') + '"></td>' +
            '<td><span class="badge bg-success-subtle text-success border border-success-subtle">' + (stock || 'Reserved') + '</span></td>' +
            '<td><input type="number" class="form-control form-control-sm text-center so-qty" value="' + (qty || 5) + '" min="1"></td>' +
            '<td><input type="number" class="form-control form-control-sm text-end so-rate" value="' + (rate || 15000) + '" min="0"></td>' +
            '<td><select class="form-select form-select-sm so-gst"><option value="18" selected>18%</option><option value="12">12%</option><option value="0">0%</option></select></td>' +
            '<td class="text-end fw-bold so-line-total">₹0</td>' +
            '<td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm py-0 px-2 btn-remove-so-row"><i class="bi bi-trash"></i></button></td>';
        body.appendChild(tr);
        recalcSo();
    }

    body.addEventListener('input', recalcSo);
    body.addEventListener('change', recalcSo);
    body.addEventListener('click', function (e) {
        var rm = e.target.closest('.btn-remove-so-row');
        if (rm && body.querySelectorAll('tr').length > 1) {
            rm.closest('tr').remove();
            recalcSo();
        }
    });

    document.getElementById('addSoRowBtn').addEventListener('click', function () {
        addSoRow('SKU-SW-101', 'Additional Software / Hardware Item', 'Reserved', 1, 10000);
    });

    Array.prototype.forEach.call(document.querySelectorAll('.quick-so-sku'), function (btn) {
        btn.addEventListener('click', function () {
            addSoRow(btn.getAttribute('data-sku'), btn.getAttribute('data-item'), btn.getAttribute('data-stock'), btn.getAttribute('data-qty'), btn.getAttribute('data-rate'));
        });
    });

    function saveSo(nextAction) {
        var firstRow = body.querySelector('tr');
        var firstItem = firstRow ? firstRow.querySelector('.so-item').value : 'Client Order';
        var firstQty = firstRow ? firstRow.querySelector('.so-qty').value : '1';
        var firstSku = firstRow ? firstRow.querySelector('.so-sku').value : 'SKU-HW-102';
        var soObj = {
            soNo: document.getElementById('soNumberInput').value.trim() || 'SO-2026-105',
            client: clientSel.value,
            quoteRef: document.getElementById('soQuoteRef').value.trim(),
            clientPo: document.getElementById('soClientPo').value.trim(),
            warehouse: document.getElementById('soWarehouse').value,
            summary: firstItem + ' (' + firstQty + ' Units)',
            orderDate: '29-10-2026',
            deliveryDate: document.getElementById('soDeliveryDate').value,
            total: document.getElementById('soGrandTotalLabel').textContent,
            rawTotal: rawGrandTotal,
            status: nextAction === 'po' ? 'Backorder' : 'Confirmed'
        };
        try {
            var arr = JSON.parse(localStorage.getItem('gh_new_sales_orders') || '[]');
            arr.push(soObj);
            localStorage.setItem('gh_new_sales_orders', JSON.stringify(arr));
        } catch (e) {}

        if (nextAction === 'invoice') {
            window.location.href = 'invoice-create.php?quote=' + encodeURIComponent(soObj.soNo) + '&client=' + encodeURIComponent(soObj.client) + '&amount=' + encodeURIComponent(rawGrandTotal);
        } else if (nextAction === 'po') {
            window.location.href = 'purchase-order-create.php?sku=' + encodeURIComponent(firstSku) + '&item=' + encodeURIComponent(firstItem) + '&qty=' + encodeURIComponent(firstQty);
        } else {
            window.location.href = 'sales-orders.php';
        }
    }

    document.getElementById('confirmSoBtn').addEventListener('click', function () { saveSo('list'); });
    document.getElementById('confirmSoAndBillBtn').addEventListener('click', function () { saveSo('invoice'); });
    document.getElementById('confirmSoAndPoBtn').addEventListener('click', function () { saveSo('po'); });

    recalcSo();
});
</script>

<?php include 'footer.php'; ?>

