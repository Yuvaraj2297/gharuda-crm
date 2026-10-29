<?php
include 'header.php';
$preSku    = isset($_GET['sku']) ? htmlspecialchars($_GET['sku']) : 'SKU-HW-102';
$preItem   = isset($_GET['item']) ? htmlspecialchars($_GET['item']) : 'Biometric Attendance Terminal Pro';
$preVendor = isset($_GET['vendor']) ? htmlspecialchars($_GET['vendor']) : 'Matrix Secure Systems Pvt Ltd';
$preQty    = isset($_GET['qty']) ? (int)$_GET['qty'] : 25;
$preRate   = isset($_GET['rate']) ? (float)$_GET['rate'] : 8500;
?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Create Purchase Order (PO)</h1>
                <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-semibold">PO #PO-2026-045</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-bag-plus fs-6"></i>
                <a href="inventory.php" class="text-decoration-none text-muted">Inventory</a>
                <i class="bi bi-chevron-right small"></i>
                <a href="purchase-orders.php" class="text-decoration-none text-muted">Purchase Orders</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">New Purchase Order</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="inventory.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-boxes"></i><span>Check Stock</span>
            </a>
            <a href="purchase-orders.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-arrow-left"></i><span>All Purchase Orders</span>
            </a>
        </div>
    </div>

    <div class="row g-3">
        <!-- Left Column: Vendor & Line Items -->
        <div class="col-12 col-xl-8">
            <div class="card-custom p-4 mb-3">
                <h6 class="fw-bold text-uppercase text-muted small mb-3"><i class="bi bi-building-gear text-primary me-1"></i>1. Supplier / Vendor &amp; Delivery Details</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Select Approved Vendor <span class="text-danger">*</span></label>
                        <select class="form-select form-select-sm" id="poVendorSelect">
                            <option value="Matrix Secure Systems Pvt Ltd" data-gstin="24AABCM4412D1Z8" <?php echo ($preVendor === 'Matrix Secure Systems Pvt Ltd') ? 'selected' : ''; ?>>Matrix Secure Systems Pvt Ltd</option>
                            <option value="Ingram Micro India Pvt Ltd" data-gstin="27AAACI1188E1Z2" <?php echo ($preVendor === 'Ingram Micro India Pvt Ltd') ? 'selected' : ''; ?>>Ingram Micro India Pvt Ltd</option>
                            <option value="Honeywell AutoID India" data-gstin="29AAACH7721B1Z4" <?php echo ($preVendor === 'Honeywell AutoID India') ? 'selected' : ''; ?>>Honeywell AutoID India</option>
                            <option value="Netgear Enterprise Distribution" data-gstin="33AABCN9920K1Z1" <?php echo ($preVendor === 'Netgear Enterprise Distribution') ? 'selected' : ''; ?>>Netgear Enterprise Distribution</option>
                            <option value="Redington India Ltd" data-gstin="33AAACR5512H1Z9">Redington India Ltd</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">PO Number</label>
                        <input type="text" class="form-control form-control-sm fw-bold" id="poNumberInput" value="PO-2026-045">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">Vendor GSTIN</label>
                        <input type="text" class="form-control form-control-sm" id="poVendorGstin" value="24AABCM4412D1Z8">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Delivery Warehouse / Branch</label>
                        <select class="form-select form-select-sm" id="poWarehouse">
                            <option value="Chennai HQ">Chennai HQ Warehouse</option>
                            <option value="Bengaluru Hub">Bengaluru Tech Hub</option>
                            <option value="Cloud Pool">Digital License Pool</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">PO Issue Date</label>
                        <input type="date" class="form-control form-control-sm" id="poIssueDate" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Expected Delivery Date</label>
                        <input type="date" class="form-control form-control-sm" id="poExpectedDate" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>">
                    </div>
                </div>
            </div>

            <!-- Line Items Card -->
            <div class="card-custom p-4 mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h6 class="fw-bold text-uppercase text-muted small mb-0"><i class="bi bi-list-check text-success me-1"></i>2. Purchase Order Line Items</h6>
                    <div class="d-flex flex-wrap gap-1">
                        <button type="button" class="btn btn-outline-warning btn-sm py-0 px-2 small quick-po-sku" data-sku="SKU-HW-102" data-item="Biometric Attendance Terminal Pro" data-hsn="847160" data-rate="8500" data-qty="25">+ Biometric Terminal (Low Stock)</button>
                        <button type="button" class="btn btn-outline-warning btn-sm py-0 px-2 small quick-po-sku" data-sku="SKU-NW-104" data-item="Managed PoE+ 24-Port Gigabit Switch" data-hsn="851762" data-rate="18900" data-qty="15">+ 24-Port Switch (Low Stock)</button>
                        <button type="button" class="btn btn-outline-danger btn-sm py-0 px-2 small quick-po-sku" data-sku="SKU-SV-105" data-item="Dell PowerEdge R250 ERP Appliance" data-hsn="847150" data-rate="115000" data-qty="3">+ Dell Server (Out of Stock)</button>
                    </div>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered align-middle mb-0" id="poItemsTable">
                        <thead class="table-light">
                            <tr>
                                <th>SKU Code</th>
                                <th>Item Description</th>
                                <th>HSN/SAC</th>
                                <th class="text-center">Order Qty</th>
                                <th class="text-end">Unit Cost (₹)</th>
                                <th class="text-center">GST %</th>
                                <th class="text-end">Line Total (₹)</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody id="poItemsBody">
                            <tr>
                                <td><input type="text" class="form-control form-control-sm po-sku" value="<?php echo $preSku; ?>"></td>
                                <td><input type="text" class="form-control form-control-sm po-item" value="<?php echo $preItem; ?>"></td>
                                <td><input type="text" class="form-control form-control-sm po-hsn" value="847160"></td>
                                <td><input type="number" class="form-control form-control-sm text-center po-qty" value="<?php echo $preQty; ?>" min="1"></td>
                                <td><input type="number" class="form-control form-control-sm text-end po-rate" value="<?php echo $preRate; ?>" min="0"></td>
                                <td>
                                    <select class="form-select form-select-sm po-gst">
                                        <option value="18" selected>18%</option>
                                        <option value="12">12%</option>
                                        <option value="28">28%</option>
                                        <option value="0">0%</option>
                                    </select>
                                </td>
                                <td class="text-end fw-bold po-line-total">₹0</td>
                                <td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm py-0 px-2 btn-remove-po-row"><i class="bi bi-trash"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm fw-semibold" id="addPoRowBtn"><i class="bi bi-plus-circle me-1"></i>Add Blank Row</button>
            </div>
        </div>

        <!-- Right Column: Tax Summary & Submit Actions -->
        <div class="col-12 col-xl-4">
            <div class="card-custom p-4 mb-3">
                <h6 class="fw-bold text-uppercase text-muted small mb-3"><i class="bi bi-calculator text-success me-1"></i>3. Procurement Summary (INR)</h6>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Taxable Subtotal</span>
                    <span class="fw-semibold text-dark" id="poSubtotalLabel">₹0</span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Input CGST (9%)</span>
                    <span class="fw-semibold text-dark" id="poCgstLabel">₹0</span>
                </div>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Input SGST (9%)</span>
                    <span class="fw-semibold text-dark" id="poSgstLabel">₹0</span>
                </div>
                <div class="d-flex justify-content-between py-3 mb-3 bg-light rounded-3 px-3 mt-2">
                    <span class="fw-bold text-dark">Grand Total (PO Value)</span>
                    <span class="fw-bold fs-5 text-success" id="poGrandTotalLabel">₹0</span>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Payment &amp; Shipping Terms</label>
                    <select class="form-select form-select-sm" id="poTerms">
                        <option value="Net 30 Days from GRN">Net 30 Days from GRN</option>
                        <option value="50% Advance, 50% on Delivery">50% Advance, 50% on Delivery</option>
                        <option value="100% Against Delivery">100% Against Delivery</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-primary fw-bold" id="issuePoBtn">
                        <i class="bi bi-send-check me-1"></i>Issue Purchase Order to Vendor
                    </button>
                    <button type="button" class="btn btn-success fw-bold" id="issueAndReceiveBtn">
                        <i class="bi bi-box-arrow-in-down me-1"></i>Issue PO &amp; Receive Stock Now (GRN)
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var body = document.getElementById('poItemsBody');
    var vndSelect = document.getElementById('poVendorSelect');

    // Sync newly onboarded vendors from localStorage
    try {
        var savedVnds = JSON.parse(localStorage.getItem('gh_new_vendors') || '[]');
        savedVnds.forEach(function (v) {
            if (v.name && vndSelect) {
                var opt = document.createElement('option');
                opt.value = v.name;
                opt.setAttribute('data-gstin', v.gstin || '33AAACR5512H1Z9');
                opt.textContent = v.name;
                vndSelect.appendChild(opt);
            }
        });
    } catch (e) {}

    function recalcPo() {
        var sub = 0;
        var tax = 0;
        Array.prototype.forEach.call(body.querySelectorAll('tr'), function (tr) {
            var q = parseFloat(tr.querySelector('.po-qty').value) || 0;
            var r = parseFloat(tr.querySelector('.po-rate').value) || 0;
            var g = parseFloat(tr.querySelector('.po-gst').value) || 0;
            var lineSub = q * r;
            var lineTax = lineSub * (g / 100);
            var lineTot = Math.round(lineSub + lineTax);
            sub += lineSub;
            tax += lineTax;
            tr.querySelector('.po-line-total').textContent = '₹' + lineTot.toLocaleString('en-IN');
        });
        var grand = Math.round(sub + tax);
        document.getElementById('poSubtotalLabel').textContent = '₹' + Math.round(sub).toLocaleString('en-IN');
        document.getElementById('poCgstLabel').textContent = '₹' + Math.round(tax / 2).toLocaleString('en-IN');
        document.getElementById('poSgstLabel').textContent = '₹' + Math.round(tax / 2).toLocaleString('en-IN');
        document.getElementById('poGrandTotalLabel').textContent = '₹' + grand.toLocaleString('en-IN');
    }

    function addPoRow(sku, item, hsn, qty, rate) {
        var tr = document.createElement('tr');
        tr.innerHTML =
            '<td><input type="text" class="form-control form-control-sm po-sku" value="' + (sku || 'SKU-HW-NEW') + '"></td>' +
            '<td><input type="text" class="form-control form-control-sm po-item" value="' + (item || '') + '"></td>' +
            '<td><input type="text" class="form-control form-control-sm po-hsn" value="' + (hsn || '8471') + '"></td>' +
            '<td><input type="number" class="form-control form-control-sm text-center po-qty" value="' + (qty || 10) + '" min="1"></td>' +
            '<td><input type="number" class="form-control form-control-sm text-end po-rate" value="' + (rate || 5000) + '" min="0"></td>' +
            '<td><select class="form-select form-select-sm po-gst"><option value="18" selected>18%</option><option value="12">12%</option><option value="28">28%</option><option value="0">0%</option></select></td>' +
            '<td class="text-end fw-bold po-line-total">₹0</td>' +
            '<td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm py-0 px-2 btn-remove-po-row"><i class="bi bi-trash"></i></button></td>';
        body.appendChild(tr);
        recalcPo();
    }

    body.addEventListener('input', recalcPo);
    body.addEventListener('change', recalcPo);
    body.addEventListener('click', function (e) {
        var rm = e.target.closest('.btn-remove-po-row');
        if (rm && body.querySelectorAll('tr').length > 1) {
            rm.closest('tr').remove();
            recalcPo();
        }
    });

    document.getElementById('addPoRowBtn').addEventListener('click', function () {
        addPoRow('SKU-HW-108', 'Hardware / License Item', '847160', 10, 5000);
    });

    Array.prototype.forEach.call(document.querySelectorAll('.quick-po-sku'), function (btn) {
        btn.addEventListener('click', function () {
            addPoRow(btn.getAttribute('data-sku'), btn.getAttribute('data-item'), btn.getAttribute('data-hsn'), btn.getAttribute('data-qty'), btn.getAttribute('data-rate'));
        });
    });

    function savePoAndRedirect(statusText) {
        var firstRow = body.querySelector('tr');
        var firstItem = firstRow ? firstRow.querySelector('.po-item').value : 'Hardware Order';
        var firstQty = firstRow ? firstRow.querySelector('.po-qty').value : '10';
        var firstSku = firstRow ? firstRow.querySelector('.po-sku').value : 'SKU-HW-102';
        var poObj = {
            poNo: document.getElementById('poNumberInput').value.trim() || 'PO-2026-045',
            vendor: document.getElementById('poVendorSelect').value,
            gstin: document.getElementById('poVendorGstin').value.trim(),
            warehouse: document.getElementById('poWarehouse').value,
            summary: firstItem + ' (' + firstQty + ' Units)',
            sku: firstSku,
            orderDate: document.getElementById('poIssueDate').value,
            expectedDate: document.getElementById('poExpectedDate').value,
            total: document.getElementById('poGrandTotalLabel').textContent,
            status: statusText
        };
        try {
            var arr = JSON.parse(localStorage.getItem('gh_new_pos') || '[]');
            arr.push(poObj);
            localStorage.setItem('gh_new_pos', JSON.stringify(arr));
        } catch (e) {}
        window.location.href = 'purchase-orders.php';
    }

    document.getElementById('issuePoBtn').addEventListener('click', function () {
        savePoAndRedirect('Issued');
    });
    document.getElementById('issueAndReceiveBtn').addEventListener('click', function () {
        savePoAndRedirect('Received (GRN)');
    });

    recalcPo();
});
</script>

<?php include 'footer.php'; ?>

