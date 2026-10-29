<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Inventory &amp; Stock Control</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">48 Active SKUs</span>
                <span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-3 py-2 fw-semibold">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i>5 Low-Stock Reorder Alerts
                </span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-boxes fs-6"></i>
                <span>Inventory &amp; Procurement</span>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Stock &amp; Warehouse Ledger</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="product-catalog-master.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-box-seam"></i><span>Product Catalog Master</span>
            </a>
            <a href="purchase-orders.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-cart-check"></i><span>Purchase Orders (PO)</span>
            </a>
            <a href="purchase-order-create.php" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-bag-plus"></i><span>Raise Purchase Order</span>
            </a>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold" data-bs-toggle="modal" data-bs-target="#newInventoryItemModal">
                <i class="bi bi-plus-lg"></i><span>Add Stock SKU</span>
            </button>
        </div>
    </div>

    <!-- KPI Cards (100% Bootstrap 5 Utilities) -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Total Valuation (FIFO)</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-boxes"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹38,45,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-check2-circle me-1"></i>Across 3 Branch Warehouses</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Hardware &amp; License SKUs</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-upc-scan"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark" id="invTotalSkuCount">48 SKUs</h3>
                <span class="text-muted small">32 Hardware &middot; 16 Cloud Licenses</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Low Stock / Reorder Alert</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-exclamation-octagon"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-warning">5 Items</h3>
                <a href="purchase-order-create.php?sku=SKU-HW-102&amp;item=Biometric+Attendance+Terminal+Pro&amp;qty=25&amp;rate=8500" class="small fw-bold text-primary text-decoration-none">Raise Reorder PO &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">In-Transit Purchase Orders</span>
                    <span class="p-2 rounded-3 bg-info-subtle text-info"><i class="bi bi-truck"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">4 Open POs</h3>
                <a href="purchase-orders.php" class="small fw-bold text-success text-decoration-none">View GRN Queue &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="card-custom p-3 mb-3">
        <div class="row g-2 align-items-center justify-content-between">
            <div class="col-12 col-lg-auto">
                <div class="d-flex flex-wrap gap-1" id="invStatusTabs">
                    <button type="button" class="btn btn-sm btn-primary fw-semibold inv-filter-btn" data-filter="all">All SKUs</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold inv-filter-btn" data-filter="In Stock">In Stock</button>
                    <button type="button" class="btn btn-sm btn-outline-warning fw-semibold inv-filter-btn" data-filter="Low Stock">Low Stock (Reorder)</button>
                    <button type="button" class="btn btn-sm btn-outline-danger fw-semibold inv-filter-btn" data-filter="Out of Stock">Out of Stock</button>
                </div>
            </div>
            <div class="col-12 col-lg-auto">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <select class="form-select form-select-sm w-auto" id="invWarehouseFilter">
                        <option value="">All Warehouses / Branches</option>
                        <option value="Chennai HQ">Chennai HQ Warehouse</option>
                        <option value="Bengaluru Hub">Bengaluru Tech Hub</option>
                        <option value="Cloud Pool">Digital License Pool</option>
                    </select>
                    <div class="input-group input-group-sm w-auto">
                        <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" class="form-control" id="invSearchInput" placeholder="Search SKU, item, HSN...">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inventory Ledger Table -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="inventoryTable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">SKU Code</th>
                        <th>Item / Hardware / License</th>
                        <th>Category &amp; HSN</th>
                        <th>Warehouse</th>
                        <th class="text-center">Available Qty</th>
                        <th class="text-center">Reorder Level</th>
                        <th class="text-end">Unit Cost</th>
                        <th class="text-end">Selling Price</th>
                        <th>Stock Status</th>
                        <th class="text-end pe-3">ERP Actions</th>
                    </tr>
                </thead>
                <tbody id="inventoryTableBody">
                    <tr data-status="In Stock" data-warehouse="Cloud Pool">
                        <td class="ps-3 fw-bold text-primary">SKU-SW-101</td>
                        <td>
                            <div class="fw-bold text-dark">Gharuda Cloud CRM Enterprise (Annual Seat)</div>
                            <div class="small text-muted">Vendor: Internal Cloud Provisioning &middot; 18% GST</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">SaaS License</span>
                            <div class="small text-muted mt-1">SAC: 998315</div>
                        </td>
                        <td><span class="small fw-semibold">Cloud Pool</span></td>
                        <td class="text-center fw-bold text-success fs-6" data-qty-cell>140</td>
                        <td class="text-center text-muted small">25</td>
                        <td class="text-end text-muted">₹12,000</td>
                        <td class="text-end fw-bold text-dark">₹25,000</td>
                        <td data-status-cell><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">In Stock</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2 btn-adjust-stock" data-sku="SKU-SW-101" data-item="Gharuda Cloud CRM Enterprise" data-qty="140" title="Adjust Stock / GRN"><i class="bi bi-sliders"></i></button>
                                <a href="quotation-create.php?deal=Gharuda+Cloud+CRM+Enterprise&amp;value=25000" class="btn btn-outline-primary btn-sm py-0 px-2" title="Create Customer Quote"><i class="bi bi-file-earmark-text me-1"></i>Quote</a>
                                <a href="purchase-order-create.php?sku=SKU-SW-101&amp;item=Gharuda+Cloud+CRM+Enterprise&amp;qty=50&amp;rate=12000" class="btn btn-outline-success btn-sm py-0 px-2" title="Raise Purchase Order"><i class="bi bi-cart-plus me-1"></i>PO</a>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Low Stock" data-warehouse="Chennai HQ">
                        <td class="ps-3 fw-bold text-primary">SKU-HW-102</td>
                        <td>
                            <div class="fw-bold text-dark">Biometric Attendance &amp; Access Terminal Pro</div>
                            <div class="small text-muted">Vendor: Matrix Secure Systems Pvt Ltd &middot; 18% GST</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">Biometric Hardware</span>
                            <div class="small text-muted mt-1">HSN: 847160</div>
                        </td>
                        <td><span class="small fw-semibold">Chennai HQ</span></td>
                        <td class="text-center fw-bold text-warning fs-6" data-qty-cell>6</td>
                        <td class="text-center text-muted small">15</td>
                        <td class="text-end text-muted">₹8,500</td>
                        <td class="text-end fw-bold text-dark">₹14,500</td>
                        <td data-status-cell><span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Low Stock</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2 btn-adjust-stock" data-sku="SKU-HW-102" data-item="Biometric Attendance Terminal Pro" data-qty="6" title="Adjust Stock / GRN"><i class="bi bi-sliders"></i></button>
                                <a href="quotation-create.php?deal=Biometric+Attendance+Terminal+Pro&amp;value=14500" class="btn btn-outline-primary btn-sm py-0 px-2" title="Create Customer Quote"><i class="bi bi-file-earmark-text me-1"></i>Quote</a>
                                <a href="purchase-order-create.php?sku=SKU-HW-102&amp;item=Biometric+Attendance+Terminal+Pro&amp;vendor=Matrix+Secure+Systems+Pvt+Ltd&amp;qty=25&amp;rate=8500" class="btn btn-warning btn-sm py-0 px-2 fw-semibold" title="Raise Reorder PO Now"><i class="bi bi-cart-plus me-1"></i>Reorder PO</a>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="In Stock" data-warehouse="Bengaluru Hub">
                        <td class="ps-3 fw-bold text-primary">SKU-HW-103</td>
                        <td>
                            <div class="fw-bold text-dark">Industrial Barcode &amp; POS Scanner Kit</div>
                            <div class="small text-muted">Vendor: Honeywell AutoID India &middot; 18% GST</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">POS Hardware</span>
                            <div class="small text-muted mt-1">HSN: 847190</div>
                        </td>
                        <td><span class="small fw-semibold">Bengaluru Hub</span></td>
                        <td class="text-center fw-bold text-success fs-6" data-qty-cell>42</td>
                        <td class="text-center text-muted small">10</td>
                        <td class="text-end text-muted">₹4,200</td>
                        <td class="text-end fw-bold text-dark">₹7,800</td>
                        <td data-status-cell><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">In Stock</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2 btn-adjust-stock" data-sku="SKU-HW-103" data-item="Industrial Barcode & POS Scanner Kit" data-qty="42" title="Adjust Stock / GRN"><i class="bi bi-sliders"></i></button>
                                <a href="quotation-create.php?deal=Industrial+Barcode+POS+Scanner+Kit&amp;value=7800" class="btn btn-outline-primary btn-sm py-0 px-2" title="Create Customer Quote"><i class="bi bi-file-earmark-text me-1"></i>Quote</a>
                                <a href="purchase-order-create.php?sku=SKU-HW-103&amp;item=Industrial+Barcode+POS+Scanner+Kit&amp;vendor=Honeywell+AutoID+India&amp;qty=20&amp;rate=4200" class="btn btn-outline-success btn-sm py-0 px-2" title="Raise Purchase Order"><i class="bi bi-cart-plus me-1"></i>PO</a>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Low Stock" data-warehouse="Chennai HQ">
                        <td class="ps-3 fw-bold text-primary">SKU-NW-104</td>
                        <td>
                            <div class="fw-bold text-dark">Managed PoE+ 24-Port Gigabit Rack Switch</div>
                            <div class="small text-muted">Vendor: Netgear Enterprise Distribution &middot; 18% GST</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">Networking</span>
                            <div class="small text-muted mt-1">HSN: 851762</div>
                        </td>
                        <td><span class="small fw-semibold">Chennai HQ</span></td>
                        <td class="text-center fw-bold text-warning fs-6" data-qty-cell>4</td>
                        <td class="text-center text-muted small">10</td>
                        <td class="text-end text-muted">₹18,900</td>
                        <td class="text-end fw-bold text-dark">₹28,500</td>
                        <td data-status-cell><span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Low Stock</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2 btn-adjust-stock" data-sku="SKU-NW-104" data-item="Managed PoE+ 24-Port Gigabit Rack Switch" data-qty="4" title="Adjust Stock / GRN"><i class="bi bi-sliders"></i></button>
                                <a href="quotation-create.php?deal=Managed+PoE+24-Port+Gigabit+Switch&amp;value=28500" class="btn btn-outline-primary btn-sm py-0 px-2" title="Create Customer Quote"><i class="bi bi-file-earmark-text me-1"></i>Quote</a>
                                <a href="purchase-order-create.php?sku=SKU-NW-104&amp;item=Managed+PoE+24-Port+Gigabit+Switch&amp;vendor=Netgear+Enterprise+Distribution&amp;qty=15&amp;rate=18900" class="btn btn-warning btn-sm py-0 px-2 fw-semibold" title="Raise Reorder PO Now"><i class="bi bi-cart-plus me-1"></i>Reorder PO</a>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Out of Stock" data-warehouse="Chennai HQ">
                        <td class="ps-3 fw-bold text-primary">SKU-SV-105</td>
                        <td>
                            <div class="fw-bold text-dark">Dell PowerEdge R250 On-Prem ERP Appliance</div>
                            <div class="small text-muted">Vendor: Ingram Micro India Pvt Ltd &middot; 18% GST</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">Server Appliance</span>
                            <div class="small text-muted mt-1">HSN: 847150</div>
                        </td>
                        <td><span class="small fw-semibold">Chennai HQ</span></td>
                        <td class="text-center fw-bold text-danger fs-6" data-qty-cell>0</td>
                        <td class="text-center text-muted small">3</td>
                        <td class="text-end text-muted">₹1,15,000</td>
                        <td class="text-end fw-bold text-dark">₹1,65,000</td>
                        <td data-status-cell><span class="badge rounded-pill bg-danger-subtle text-danger border border-danger-subtle px-2 py-1">Out of Stock</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2 btn-adjust-stock" data-sku="SKU-SV-105" data-item="Dell PowerEdge R250 On-Prem ERP Appliance" data-qty="0" title="Adjust Stock / GRN"><i class="bi bi-sliders"></i></button>
                                <a href="quotation-create.php?deal=Dell+PowerEdge+R250+ERP+Appliance&amp;value=165000" class="btn btn-outline-primary btn-sm py-0 px-2" title="Create Customer Quote"><i class="bi bi-file-earmark-text me-1"></i>Quote</a>
                                <a href="purchase-order-create.php?sku=SKU-SV-105&amp;item=Dell+PowerEdge+R250+ERP+Appliance&amp;vendor=Ingram+Micro+India+Pvt+Ltd&amp;qty=5&amp;rate=115000" class="btn btn-danger btn-sm py-0 px-2 fw-semibold" title="Urgent Purchase Order"><i class="bi bi-cart-plus me-1"></i>Urgent PO</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Stock Adjustment / GRN Modal -->
<div class="modal fade" id="stockAdjustModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold"><i class="bi bi-sliders text-primary me-2"></i>Stock Adjustment / Inward GRN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="p-3 rounded-3 bg-light border mb-3">
                    <div class="small text-muted">Selected SKU</div>
                    <div class="fw-bold text-dark" id="adjSkuLabel">SKU-HW-102 &middot; Biometric Terminal</div>
                    <div class="small text-success fw-semibold mt-1">Current Available Stock: <span id="adjCurrentQty">6</span> Units</div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Adjustment Type</label>
                        <select class="form-select form-select-sm" id="adjType">
                            <option value="add">Inward Stock (GRN / PO Receipt)</option>
                            <option value="sub">Outward Dispatch (Client Project)</option>
                            <option value="set">Set Exact Physical Audit Count</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Quantity</label>
                        <input type="number" class="form-control form-control-sm" id="adjQtyInput" value="10" min="1">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-semibold">Reference PO / Delivery Challan / Notes</label>
                        <input type="text" class="form-control form-control-sm" id="adjRefInput" placeholder="e.g. PO-2026-042 / GRN-884">
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm fw-semibold" id="saveStockAdjustBtn"><i class="bi bi-check2-circle me-1"></i>Update Stock Ledger</button>
            </div>
        </div>
    </div>
</div>

<!-- Add New Inventory SKU Modal -->
<div class="modal fade" id="newInventoryItemModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold"><i class="bi bi-box-seam text-success me-2"></i>Add New Inventory SKU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">SKU Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="newSkuCode" value="SKU-HW-106">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-semibold">Item / Hardware / License Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="newSkuName" placeholder="e.g. Ubiquiti UniFi Wi-Fi 6 Access Point">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Category</label>
                        <select class="form-select form-select-sm" id="newSkuCategory">
                            <option value="Hardware">Hardware &amp; Devices</option>
                            <option value="SaaS License">SaaS / Cloud License</option>
                            <option value="Networking">Networking Gear</option>
                            <option value="Server Appliance">Server Appliance</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">HSN / SAC Code</label>
                        <input type="text" class="form-control form-control-sm" id="newSkuHsn" value="851762">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Warehouse / Branch</label>
                        <select class="form-select form-select-sm" id="newSkuWarehouse">
                            <option value="Chennai HQ">Chennai HQ</option>
                            <option value="Bengaluru Hub">Bengaluru Hub</option>
                            <option value="Cloud Pool">Cloud Pool</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">Opening Stock</label>
                        <input type="number" class="form-control form-control-sm" id="newSkuQty" value="20" min="0">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">Reorder Level</label>
                        <input type="number" class="form-control form-control-sm" id="newSkuReorder" value="5" min="1">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">Purchase Cost (₹)</label>
                        <input type="number" class="form-control form-control-sm" id="newSkuCost" value="9500" min="0">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">Selling Price (₹)</label>
                        <input type="number" class="form-control form-control-sm" id="newSkuPrice" value="14500" min="0">
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-semibold">Preferred Supplier / Vendor</label>
                        <input type="text" class="form-control form-control-sm" id="newSkuVendor" placeholder="e.g. Redington India Ltd">
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success btn-sm fw-semibold" id="saveNewSkuBtn"><i class="bi bi-check2-circle me-1"></i>Save Inventory SKU</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tbody = document.getElementById('inventoryTableBody');
    var activeRow = null;

    // Load newly created SKUs from localStorage
    try {
        var savedSkus = JSON.parse(localStorage.getItem('gh_new_inventory') || '[]');
        savedSkus.forEach(function (s) {
            appendSkuRow(s);
        });
    } catch (e) {}

    function appendSkuRow(s) {
        var qty = parseInt(s.qty, 10) || 0;
        var reorder = parseInt(s.reorder, 10) || 5;
        var status = qty <= 0 ? 'Out of Stock' : (qty <= reorder ? 'Low Stock' : 'In Stock');
        var badgeClass = status === 'In Stock' ? 'bg-success-subtle text-success border-success-subtle' :
                         (status === 'Low Stock' ? 'bg-warning-subtle text-warning border-warning-subtle' : 'bg-danger-subtle text-danger border-danger-subtle');
        var qtyClass = status === 'In Stock' ? 'text-success' : (status === 'Low Stock' ? 'text-warning' : 'text-danger');
        var tr = document.createElement('tr');
        tr.setAttribute('data-status', status);
        tr.setAttribute('data-warehouse', s.warehouse || 'Chennai HQ');
        tr.innerHTML =
            '<td class="ps-3 fw-bold text-primary">' + s.sku + '</td>' +
            '<td><div class="fw-bold text-dark">' + s.name + '</div><div class="small text-muted">Vendor: ' + (s.vendor || 'Approved Supplier') + ' &middot; 18% GST</div></td>' +
            '<td><span class="badge bg-light text-dark border">' + (s.category || 'Hardware') + '</span><div class="small text-muted mt-1">HSN: ' + (s.hsn || '8471') + '</div></td>' +
            '<td><span class="small fw-semibold">' + (s.warehouse || 'Chennai HQ') + '</span></td>' +
            '<td class="text-center fw-bold ' + qtyClass + ' fs-6" data-qty-cell>' + qty + '</td>' +
            '<td class="text-center text-muted small">' + reorder + '</td>' +
            '<td class="text-end text-muted">₹' + Number(s.cost || 0).toLocaleString('en-IN') + '</td>' +
            '<td class="text-end fw-bold text-dark">₹' + Number(s.price || 0).toLocaleString('en-IN') + '</td>' +
            '<td data-status-cell><span class="badge rounded-pill ' + badgeClass + ' border px-2 py-1">' + status + '</span></td>' +
            '<td class="text-end pe-3"><div class="d-inline-flex align-items-center gap-1">' +
            '<button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2 btn-adjust-stock" data-sku="' + s.sku + '" data-item="' + s.name + '" data-qty="' + qty + '"><i class="bi bi-sliders"></i></button>' +
            '<a href="quotation-create.php?deal=' + encodeURIComponent(s.name) + '&value=' + encodeURIComponent(s.price || 0) + '" class="btn btn-outline-primary btn-sm py-0 px-2"><i class="bi bi-file-earmark-text me-1"></i>Quote</a>' +
            '<a href="purchase-order-create.php?sku=' + encodeURIComponent(s.sku) + '&item=' + encodeURIComponent(s.name) + '&qty=20&rate=' + encodeURIComponent(s.cost || 0) + '" class="btn btn-outline-success btn-sm py-0 px-2"><i class="bi bi-cart-plus me-1"></i>PO</a>' +
            '</div></td>';
        tbody.insertBefore(tr, tbody.firstChild);
    }

    // Save New SKU
    var saveNewSkuBtn = document.getElementById('saveNewSkuBtn');
    if (saveNewSkuBtn) {
        saveNewSkuBtn.addEventListener('click', function () {
            var itemObj = {
                sku: document.getElementById('newSkuCode').value.trim() || 'SKU-NEW',
                name: document.getElementById('newSkuName').value.trim() || 'New Hardware SKU',
                category: document.getElementById('newSkuCategory').value,
                hsn: document.getElementById('newSkuHsn').value.trim(),
                warehouse: document.getElementById('newSkuWarehouse').value,
                qty: document.getElementById('newSkuQty').value,
                reorder: document.getElementById('newSkuReorder').value,
                cost: document.getElementById('newSkuCost').value,
                price: document.getElementById('newSkuPrice').value,
                vendor: document.getElementById('newSkuVendor').value.trim() || 'Redington India Ltd'
            };
            try {
                var arr = JSON.parse(localStorage.getItem('gh_new_inventory') || '[]');
                arr.push(itemObj);
                localStorage.setItem('gh_new_inventory', JSON.stringify(arr));
            } catch (e) {}
            appendSkuRow(itemObj);
            var modalEl = document.getElementById('newInventoryItemModal');
            if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
                bootstrap.Modal.getInstance(modalEl).hide();
            }
        });
    }

    // Open Stock Adjustment Modal
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.btn-adjust-stock');
        if (!btn) return;
        activeRow = btn.closest('tr');
        document.getElementById('adjSkuLabel').textContent = btn.getAttribute('data-sku') + ' · ' + btn.getAttribute('data-item');
        document.getElementById('adjCurrentQty').textContent = activeRow.querySelector('[data-qty-cell]').textContent.trim();
        if (window.bootstrap) {
            bootstrap.Modal.getOrCreateInstance(document.getElementById('stockAdjustModal')).show();
        }
    });

    // Save Stock Adjustment
    var saveAdjBtn = document.getElementById('saveStockAdjustBtn');
    if (saveAdjBtn) {
        saveAdjBtn.addEventListener('click', function () {
            if (!activeRow) return;
            var qtyCell = activeRow.querySelector('[data-qty-cell]');
            var statusCell = activeRow.querySelector('[data-status-cell]');
            var cur = parseInt(qtyCell.textContent.trim(), 10) || 0;
            var delta = parseInt(document.getElementById('adjQtyInput').value, 10) || 0;
            var mode = document.getElementById('adjType').value;
            var next = mode === 'add' ? cur + delta : (mode === 'sub' ? Math.max(0, cur - delta) : Math.max(0, delta));
            qtyCell.textContent = next;
            var status = next === 0 ? 'Out of Stock' : (next <= 10 ? 'Low Stock' : 'In Stock');
            activeRow.setAttribute('data-status', status);
            qtyCell.className = 'text-center fw-bold fs-6 ' + (status === 'In Stock' ? 'text-success' : (status === 'Low Stock' ? 'text-warning' : 'text-danger'));
            var badgeClass = status === 'In Stock' ? 'bg-success-subtle text-success border-success-subtle' :
                             (status === 'Low Stock' ? 'bg-warning-subtle text-warning border-warning-subtle' : 'bg-danger-subtle text-danger border-danger-subtle');
            statusCell.innerHTML = '<span class="badge rounded-pill ' + badgeClass + ' border px-2 py-1">' + status + '</span>';
            var modalEl = document.getElementById('stockAdjustModal');
            if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
                bootstrap.Modal.getInstance(modalEl).hide();
            }
        });
    }

    // Filter & Search
    var currentFilter = 'all';
    function applyInventoryFilter() {
        var q = (document.getElementById('invSearchInput').value || '').toLowerCase();
        var wh = document.getElementById('invWarehouseFilter').value;
        Array.prototype.forEach.call(tbody.querySelectorAll('tr'), function (tr) {
            var st = tr.getAttribute('data-status') || '';
            var rowWh = tr.getAttribute('data-warehouse') || '';
            var text = tr.textContent.toLowerCase();
            var matchStatus = (currentFilter === 'all') || (st === currentFilter);
            var matchWh = !wh || (rowWh === wh);
            var matchQ = !q || text.indexOf(q) !== -1;
            tr.classList.toggle('d-none', !(matchStatus && matchWh && matchQ));
        });
    }

    Array.prototype.forEach.call(document.querySelectorAll('.inv-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.inv-filter-btn'), function (b) {
                b.classList.remove('btn-primary');
                b.classList.add('btn-outline-secondary');
            });
            btn.classList.remove('btn-outline-secondary', 'btn-outline-warning', 'btn-outline-danger');
            btn.classList.add('btn-primary');
            currentFilter = btn.getAttribute('data-filter');
            applyInventoryFilter();
        });
    });

    document.getElementById('invSearchInput').addEventListener('input', applyInventoryFilter);
    document.getElementById('invWarehouseFilter').addEventListener('change', applyInventoryFilter);
});
</script>

<?php include 'footer.php'; ?>

