<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Purchase Orders (PO) &amp; Procurement</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">₹24.6 Lakh Active POs</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-cart-check fs-6"></i>
                <a href="inventory.php" class="text-decoration-none text-muted">Inventory &amp; Stock</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Purchase Orders &amp; GRN Ledger</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="inventory.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-boxes"></i><span>Inventory Stock</span>
            </a>
            <a href="vendors.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-building-gear"></i><span>Vendors Directory (14)</span>
            </a>
            <a href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-excel"></i><span>Download Excel</span>
            </a>
            <a href="purchase-order-create.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-plus-lg"></i><span>Create Purchase Order</span>
            </a>
        </div>
    </div>

    <!-- KPI Cards (100% Bootstrap 5 Utilities) -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Total Procurement (YTD)</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-bag-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹24,60,000</h3>
                <span class="text-muted small">22 Purchase Orders Issued</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Pending Goods Receipt (GRN)</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-truck"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-warning">4 Open POs</h3>
                <span class="text-muted small">Awaiting Warehouse Inward</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Goods Received (GRN Verified)</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-box-arrow-in-down"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-success">18 Completed</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-check2-all me-1"></i>Synced with Inventory</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Vendor Payables Due</span>
                    <span class="p-2 rounded-3 bg-danger-subtle text-danger"><i class="bi bi-cash-coin"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹4,85,000</h3>
                <a href="expenses.php" class="small fw-bold text-primary text-decoration-none">View Expenses &amp; Bills &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="card-custom p-3 mb-3">
        <div class="row g-2 align-items-center justify-content-between">
            <div class="col-12 col-lg-auto">
                <div class="d-flex flex-wrap gap-1">
                    <button type="button" class="btn btn-sm btn-primary fw-semibold po-filter-btn" data-filter="all">All POs</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold po-filter-btn" data-filter="Issued">Issued / In-Transit</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold po-filter-btn" data-filter="Received (GRN)">Received (GRN)</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold po-filter-btn" data-filter="Pending Approval">Pending Approval</button>
                </div>
            </div>
            <div class="col-12 col-lg-auto">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control" id="poSearchInput" placeholder="Search PO #, vendor, SKU...">
                </div>
            </div>
        </div>
    </div>

    <!-- Purchase Orders Table -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="poTable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">PO Number</th>
                        <th>Vendor / Supplier</th>
                        <th>Primary SKU / Description</th>
                        <th>Delivery Warehouse</th>
                        <th>Order Date</th>
                        <th>Expected Date</th>
                        <th class="text-end">Total (Inc. GST)</th>
                        <th>GRN / PO Status</th>
                        <th class="text-end pe-3">Procurement Actions</th>
                    </tr>
                </thead>
                <tbody id="poTableBody">
                    <tr data-status="Issued">
                        <td class="ps-3 fw-bold text-primary">PO-2026-044</td>
                        <td>
                            <div class="fw-bold text-dark">Matrix Secure Systems Pvt Ltd</div>
                            <div class="small text-muted">GSTIN: 24AABCM4412D1Z8</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Biometric Attendance Terminal Pro (25 Units)</div>
                            <div class="small text-muted">SKU: SKU-HW-102 &middot; Reorder Stock</div>
                        </td>
                        <td><span class="small fw-semibold">Chennai HQ</span></td>
                        <td class="small text-muted">24-10-2026</td>
                        <td class="small fw-semibold text-dark">31-10-2026</td>
                        <td class="text-end fw-bold text-dark">₹2,50,750</td>
                        <td data-po-status-cell><span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Issued</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <button type="button" class="btn btn-success btn-sm py-0 px-2 fw-semibold btn-receive-grn" data-po="PO-2026-044" data-vendor="Matrix Secure Systems Pvt Ltd" data-item="Biometric Attendance Terminal Pro (25 Units)">
                                    <i class="bi bi-box-arrow-in-down me-1"></i>Receive GRN
                                </button>
                                <a href="expenses.php" class="btn btn-outline-primary btn-sm py-0 px-2" title="Record Vendor Bill"><i class="bi bi-receipt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Issued">
                        <td class="ps-3 fw-bold text-primary">PO-2026-043</td>
                        <td>
                            <div class="fw-bold text-dark">Ingram Micro India Pvt Ltd</div>
                            <div class="small text-muted">GSTIN: 27AAACI1188E1Z2</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Dell PowerEdge R250 On-Prem ERP Appliance (3 Units)</div>
                            <div class="small text-muted">SKU: SKU-SV-105 &middot; Client Project: Hindustan Hydraulics</div>
                        </td>
                        <td><span class="small fw-semibold">Chennai HQ</span></td>
                        <td class="small text-muted">21-10-2026</td>
                        <td class="small fw-semibold text-dark">29-10-2026</td>
                        <td class="text-end fw-bold text-dark">₹4,07,100</td>
                        <td data-po-status-cell><span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Issued</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <button type="button" class="btn btn-success btn-sm py-0 px-2 fw-semibold btn-receive-grn" data-po="PO-2026-043" data-vendor="Ingram Micro India Pvt Ltd" data-item="Dell PowerEdge R250 ERP Appliance (3 Units)">
                                    <i class="bi bi-box-arrow-in-down me-1"></i>Receive GRN
                                </button>
                                <a href="expenses.php" class="btn btn-outline-primary btn-sm py-0 px-2" title="Record Vendor Bill"><i class="bi bi-receipt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Received (GRN)">
                        <td class="ps-3 fw-bold text-primary">PO-2026-042</td>
                        <td>
                            <div class="fw-bold text-dark">Honeywell AutoID India</div>
                            <div class="small text-muted">GSTIN: 29AAACH7721B1Z4</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Industrial Barcode &amp; POS Scanner Kit (30 Units)</div>
                            <div class="small text-muted">SKU: SKU-HW-103 &middot; GRN #GRN-2026-119</div>
                        </td>
                        <td><span class="small fw-semibold">Bengaluru Hub</span></td>
                        <td class="small text-muted">14-10-2026</td>
                        <td class="small fw-semibold text-success">19-10-2026</td>
                        <td class="text-end fw-bold text-dark">₹1,48,680</td>
                        <td data-po-status-cell><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Received (GRN)</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="inventory.php" class="btn btn-outline-success btn-sm py-0 px-2"><i class="bi bi-check2-circle me-1"></i>In Stock</a>
                                <a href="expenses.php" class="btn btn-outline-primary btn-sm py-0 px-2" title="View Vendor Payment"><i class="bi bi-receipt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Received (GRN)">
                        <td class="ps-3 fw-bold text-primary">PO-2026-041</td>
                        <td>
                            <div class="fw-bold text-dark">Netgear Enterprise Distribution</div>
                            <div class="small text-muted">GSTIN: 33AABCN9920K1Z1</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Managed PoE+ 24-Port Gigabit Rack Switch (12 Units)</div>
                            <div class="small text-muted">SKU: SKU-NW-104 &middot; GRN #GRN-2026-112</div>
                        </td>
                        <td><span class="small fw-semibold">Chennai HQ</span></td>
                        <td class="small text-muted">08-10-2026</td>
                        <td class="small fw-semibold text-success">12-10-2026</td>
                        <td class="text-end fw-bold text-dark">₹2,67,624</td>
                        <td data-po-status-cell><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Received (GRN)</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="inventory.php" class="btn btn-outline-success btn-sm py-0 px-2"><i class="bi bi-check2-circle me-1"></i>In Stock</a>
                                <a href="expenses.php" class="btn btn-outline-primary btn-sm py-0 px-2" title="View Vendor Payment"><i class="bi bi-receipt"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Receive Goods (GRN) Modal -->
<div class="modal fade" id="receiveGrnModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold"><i class="bi bi-box-arrow-in-down text-success me-2"></i>Confirm Goods Receipt Note (GRN)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="p-3 rounded-3 bg-light border mb-3">
                    <div class="small text-muted" id="grnPoLabel">PO-2026-044 &middot; Matrix Secure Systems</div>
                    <div class="fw-bold text-dark mt-1" id="grnItemLabel">Biometric Attendance Terminal Pro (25 Units)</div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Vendor Challan / Invoice #</label>
                        <input type="text" class="form-control form-control-sm" id="grnChallanNo" value="VND-INV-8841">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">GRN Received Date</label>
                        <input type="date" class="form-control form-control-sm" id="grnDate" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-semibold">Quality Inspection &amp; Warehouse Remarks</label>
                        <input type="text" class="form-control form-control-sm" id="grnRemarks" value="All units verified and inwarded to Chennai HQ rack.">
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success btn-sm fw-semibold" id="confirmGrnBtn"><i class="bi bi-check2-circle me-1"></i>Confirm GRN &amp; Update Stock</button>
            </div>
        </div>
    </div>
</div>

<!-- Approved Vendors Modal -->
<div class="modal fade" id="vendorDirectoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold"><i class="bi bi-building-gear text-primary me-2"></i>Approved Vendors &amp; Suppliers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">Vendor Name</th>
                                <th>Category</th>
                                <th>GSTIN</th>
                                <th>Credit Terms</th>
                                <th class="text-end pe-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3 fw-bold">Matrix Secure Systems Pvt Ltd</td>
                                <td>Biometric &amp; Access Control</td>
                                <td class="small text-muted">24AABCM4412D1Z8</td>
                                <td><span class="badge bg-light text-dark border">Net 30 Days</span></td>
                                <td class="text-end pe-3"><a href="purchase-order-create.php?vendor=Matrix+Secure+Systems+Pvt+Ltd" class="btn btn-outline-primary btn-sm py-0 px-2">Raise PO</a></td>
                            </tr>
                            <tr>
                                <td class="ps-3 fw-bold">Ingram Micro India Pvt Ltd</td>
                                <td>Servers &amp; Enterprise IT</td>
                                <td class="small text-muted">27AAACI1188E1Z2</td>
                                <td><span class="badge bg-light text-dark border">Net 45 Days</span></td>
                                <td class="text-end pe-3"><a href="purchase-order-create.php?vendor=Ingram+Micro+India+Pvt+Ltd" class="btn btn-outline-primary btn-sm py-0 px-2">Raise PO</a></td>
                            </tr>
                            <tr>
                                <td class="ps-3 fw-bold">Honeywell AutoID India</td>
                                <td>POS &amp; Barcode Scanners</td>
                                <td class="small text-muted">29AAACH7721B1Z4</td>
                                <td><span class="badge bg-light text-dark border">Net 30 Days</span></td>
                                <td class="text-end pe-3"><a href="purchase-order-create.php?vendor=Honeywell+AutoID+India" class="btn btn-outline-primary btn-sm py-0 px-2">Raise PO</a></td>
                            </tr>
                            <tr>
                                <td class="ps-3 fw-bold">Netgear Enterprise Distribution</td>
                                <td>Switches &amp; Wi-Fi 6 Gear</td>
                                <td class="small text-muted">33AABCN9920K1Z1</td>
                                <td><span class="badge bg-light text-dark border">Net 15 Days</span></td>
                                <td class="text-end pe-3"><a href="purchase-order-create.php?vendor=Netgear+Enterprise+Distribution" class="btn btn-outline-primary btn-sm py-0 px-2">Raise PO</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tbody = document.getElementById('poTableBody');
    var activePoRow = null;

    // Load newly created POs from localStorage
    try {
        var savedPos = JSON.parse(localStorage.getItem('gh_new_pos') || '[]');
        savedPos.forEach(function (p) {
            var isRec = p.status === 'Received (GRN)';
            var badgeClass = isRec ? 'bg-success-subtle text-success border-success-subtle' : 'bg-warning-subtle text-warning border-warning-subtle';
            var tr = document.createElement('tr');
            tr.setAttribute('data-status', p.status || 'Issued');
            tr.innerHTML =
                '<td class="ps-3 fw-bold text-primary">' + p.poNo + '</td>' +
                '<td><div class="fw-bold text-dark">' + p.vendor + '</div><div class="small text-muted">GSTIN: ' + (p.gstin || '33AABCG4421A1Z5') + '</div></td>' +
                '<td><div class="fw-semibold text-dark">' + p.summary + '</div><div class="small text-muted">SKU: ' + (p.sku || 'Multiple') + '</div></td>' +
                '<td><span class="small fw-semibold">' + (p.warehouse || 'Chennai HQ') + '</span></td>' +
                '<td class="small text-muted">' + (p.orderDate || '29-10-2026') + '</td>' +
                '<td class="small fw-semibold text-dark">' + (p.expectedDate || '05-11-2026') + '</td>' +
                '<td class="text-end fw-bold text-dark">' + p.total + '</td>' +
                '<td data-po-status-cell><span class="badge rounded-pill ' + badgeClass + ' border px-2 py-1">' + (p.status || 'Issued') + '</span></td>' +
                '<td class="text-end pe-3"><div class="d-inline-flex align-items-center gap-1">' +
                (isRec ? '<a href="inventory.php" class="btn btn-outline-success btn-sm py-0 px-2"><i class="bi bi-check2-circle me-1"></i>In Stock</a>' :
                '<button type="button" class="btn btn-success btn-sm py-0 px-2 fw-semibold btn-receive-grn" data-po="' + p.poNo + '" data-vendor="' + p.vendor + '" data-item="' + p.summary + '"><i class="bi bi-box-arrow-in-down me-1"></i>Receive GRN</button>') +
                '<a href="expenses.php" class="btn btn-outline-primary btn-sm py-0 px-2"><i class="bi bi-receipt"></i></a></div></td>';
            tbody.insertBefore(tr, tbody.firstChild);
        });
    } catch (e) {}

    // Receive GRN button
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.btn-receive-grn');
        if (!btn) return;
        activePoRow = btn.closest('tr');
        document.getElementById('grnPoLabel').textContent = btn.getAttribute('data-po') + ' · ' + btn.getAttribute('data-vendor');
        document.getElementById('grnItemLabel').textContent = btn.getAttribute('data-item');
        if (window.bootstrap) {
            bootstrap.Modal.getOrCreateInstance(document.getElementById('receiveGrnModal')).show();
        }
    });

    // Confirm GRN
    var confirmGrnBtn = document.getElementById('confirmGrnBtn');
    if (confirmGrnBtn) {
        confirmGrnBtn.addEventListener('click', function () {
            if (!activePoRow) return;
            activePoRow.setAttribute('data-status', 'Received (GRN)');
            var stCell = activePoRow.querySelector('[data-po-status-cell]');
            if (stCell) {
                stCell.innerHTML = '<span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Received (GRN)</span>';
            }
            var grnBtn = activePoRow.querySelector('.btn-receive-grn');
            if (grnBtn) {
                grnBtn.outerHTML = '<a href="inventory.php" class="btn btn-outline-success btn-sm py-0 px-2"><i class="bi bi-check2-circle me-1"></i>In Stock</a>';
            }
            var modalEl = document.getElementById('receiveGrnModal');
            if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
                bootstrap.Modal.getInstance(modalEl).hide();
            }
        });
    }

    // Filter & Search
    var currentPoFilter = 'all';
    function applyPoFilter() {
        var q = (document.getElementById('poSearchInput').value || '').toLowerCase();
        Array.prototype.forEach.call(tbody.querySelectorAll('tr'), function (tr) {
            var st = tr.getAttribute('data-status') || '';
            var text = tr.textContent.toLowerCase();
            var matchSt = (currentPoFilter === 'all') || (st === currentPoFilter);
            var matchQ = !q || text.indexOf(q) !== -1;
            tr.classList.toggle('d-none', !(matchSt && matchQ));
        });
    }

    Array.prototype.forEach.call(document.querySelectorAll('.po-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.po-filter-btn'), function (b) {
                b.classList.remove('btn-primary');
                b.classList.add('btn-outline-secondary');
            });
            btn.classList.remove('btn-outline-secondary');
            btn.classList.add('btn-primary');
            currentPoFilter = btn.getAttribute('data-filter');
            applyPoFilter();
        });
    });

    document.getElementById('poSearchInput').addEventListener('input', applyPoFilter);
});
</script>

<?php include 'footer.php'; ?>

