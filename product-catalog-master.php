<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Product &amp; Service Catalog Master</h1>
                <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-semibold" id="catalogCountBadge">6 Active Catalog Items</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-box-seam fs-6"></i>
                <span>13. Master Data</span>
                <i class="bi bi-chevron-right small"></i>
                <span>Catalog &amp; Project Masters</span>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Product Catalog</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="inventory.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-boxes"></i><span>06. Inventory &amp; Stock</span>
            </a>
            <a href="quotation-create.php" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-plus"></i><span>Create Quotation</span>
            </a>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
                <i class="bi bi-plus-lg"></i><span>Add Product / Service</span>
            </button>
        </div>
    </div>

    <!-- KPI Summary Row -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100 border-start border-4 border-primary">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <span class="small fw-bold text-uppercase text-muted">Total Catalog Items</span>
                    <span class="badge bg-primary-subtle text-primary rounded-pill"><i class="bi bi-box-seam"></i> Master</span>
                </div>
                <div class="fs-4 fw-bold text-dark">6 Products &amp; Services</div>
                <div class="small text-muted mt-1">Synced with Quotations &amp; Sales Orders</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100 border-start border-4 border-success">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <span class="small fw-bold text-uppercase text-muted">SaaS &amp; Licenses</span>
                    <span class="badge bg-success-subtle text-success rounded-pill">Recurring</span>
                </div>
                <div class="fs-4 fw-bold text-success">3 Cloud Modules</div>
                <div class="small text-muted mt-1">18% GST SAC 998314 Compliant</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100 border-start border-4 border-info">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <span class="small fw-bold text-uppercase text-muted">Hardware &amp; IoT SKUs</span>
                    <span class="badge bg-info-subtle text-info rounded-pill">Stock Tracked</span>
                </div>
                <div class="fs-4 fw-bold text-info">2 Hardware SKUs</div>
                <div class="small text-muted mt-1">Linked to <a href="inventory.php" class="text-decoration-none fw-semibold">Inventory Ledger</a></div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100 border-start border-4 border-warning">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <span class="small fw-bold text-uppercase text-muted">AMC &amp; Consulting</span>
                    <span class="badge bg-warning-subtle text-warning rounded-pill">Service SLA</span>
                </div>
                <div class="fs-4 fw-bold text-dark">1 Annual Package</div>
                <div class="small text-muted mt-1">Linked to <a href="contracts.php" class="text-decoration-none fw-semibold">Contracts &amp; SLAs</a></div>
            </div>
        </div>
    </div>

    <!-- Product Catalog Table -->
    <div class="card-custom p-0 overflow-hidden">
        <div class="card-head d-flex align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3 flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary-subtle text-primary p-2 rounded-3"><i class="bi bi-box-seam fs-6"></i></span>
                <div>
                    <h5 class="fw-bold mb-0 fs-6 text-dark">Master Product &amp; Service Rate Card</h5>
                    <div class="small text-muted">Standard unit pricing &amp; GST rates used across CRM Quotations, Sales Orders, and Tax Invoices</div>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="brand-master.php" class="btn btn-outline-secondary btn-sm fw-semibold">
                    <i class="bi bi-tags me-1"></i>Brands Master
                </a>
            </div>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="productCatalogTable" data-table-name="Product Catalog Master">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Product Code</th>
                        <th>Product / Service Name</th>
                        <th>Category &amp; Type</th>
                        <th>HSN / SAC</th>
                        <th class="text-end">Unit Selling Price</th>
                        <th>Tax Rate</th>
                        <th>Status</th>
                        <th class="text-end">CRM Action</th>
                    </tr>
                </thead>
                <tbody id="productCatalogBody">
                    <tr data-id="1">
                        <td>1</td>
                        <td class="fw-bold text-primary">SKU-SW-001</td>
                        <td>
                            <div class="fw-bold text-dark">Cloud CRM Enterprise License (Annual)</div>
                            <div class="small text-muted">Unlimited users, multi-branch &amp; workflow automation</div>
                        </td>
                        <td><span class="badge bg-primary-subtle text-primary">Software License</span></td>
                        <td class="small text-muted">SAC 998314</td>
                        <td class="text-end fw-bold text-dark">₹2,50,000</td>
                        <td><span class="badge bg-light text-dark border">18% GST</span></td>
                        <td><span class="status-pill status-approved">Active</span></td>
                        <td class="text-end">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="quotation-create.php?sku=SKU-SW-001&amp;item=Cloud+CRM+Enterprise+License+(Annual)&amp;rate=250000" class="btn btn-outline-success btn-sm py-0 px-2 fw-semibold" title="Add to Quotation">
                                    <i class="bi bi-file-earmark-plus"></i> Quote
                                </a>
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" onclick="openEditProductModal('SKU-SW-001', 'Cloud CRM Enterprise License (Annual)', 'Software License', '250000', '18% GST')" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="2">
                        <td>2</td>
                        <td class="fw-bold text-primary">SKU-HW-102</td>
                        <td>
                            <div class="fw-bold text-dark">Biometric Attendance Terminal Pro</div>
                            <div class="small text-muted">Face + Fingerprint IP65 terminal with cloud sync</div>
                        </td>
                        <td><span class="badge bg-info-subtle text-info">Hardware &amp; IoT</span></td>
                        <td class="small text-muted">HSN 847160</td>
                        <td class="text-end fw-bold text-dark">₹12,500</td>
                        <td><span class="badge bg-light text-dark border">18% GST</span></td>
                        <td><span class="status-pill status-approved">Active</span></td>
                        <td class="text-end">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="quotation-create.php?sku=SKU-HW-102&amp;item=Biometric+Attendance+Terminal+Pro&amp;rate=12500" class="btn btn-outline-success btn-sm py-0 px-2 fw-semibold" title="Add to Quotation">
                                    <i class="bi bi-file-earmark-plus"></i> Quote
                                </a>
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" onclick="openEditProductModal('SKU-HW-102', 'Biometric Attendance Terminal Pro', 'Hardware & IoT', '12500', '18% GST')" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="3">
                        <td>3</td>
                        <td class="fw-bold text-primary">SKU-SW-003</td>
                        <td>
                            <div class="fw-bold text-dark">WhatsApp &amp; Omnichannel API Suite</div>
                            <div class="small text-muted">Verified green-tick business messaging &amp; bot integration</div>
                        </td>
                        <td><span class="badge bg-primary-subtle text-primary">Integration</span></td>
                        <td class="small text-muted">SAC 998313</td>
                        <td class="text-end fw-bold text-dark">₹45,000</td>
                        <td><span class="badge bg-light text-dark border">18% GST</span></td>
                        <td><span class="status-pill status-approved">Active</span></td>
                        <td class="text-end">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="quotation-create.php?sku=SKU-SW-003&amp;item=WhatsApp+Omnichannel+API+Suite&amp;rate=45000" class="btn btn-outline-success btn-sm py-0 px-2 fw-semibold" title="Add to Quotation">
                                    <i class="bi bi-file-earmark-plus"></i> Quote
                                </a>
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" onclick="openEditProductModal('SKU-SW-003', 'WhatsApp & Omnichannel API Suite', 'Integration', '45000', '18% GST')" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="4">
                        <td>4</td>
                        <td class="fw-bold text-primary">SKU-HW-108</td>
                        <td>
                            <div class="fw-bold text-dark">Enterprise Rack Firewall 10G</div>
                            <div class="small text-muted">Next-Gen UTM appliance with 3-year threat subscription</div>
                        </td>
                        <td><span class="badge bg-info-subtle text-info">Networking Hardware</span></td>
                        <td class="small text-muted">HSN 851762</td>
                        <td class="text-end fw-bold text-dark">₹85,000</td>
                        <td><span class="badge bg-light text-dark border">18% GST</span></td>
                        <td><span class="status-pill status-approved">Active</span></td>
                        <td class="text-end">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="quotation-create.php?sku=SKU-HW-108&amp;item=Enterprise+Rack+Firewall+10G&amp;rate=85000" class="btn btn-outline-success btn-sm py-0 px-2 fw-semibold" title="Add to Quotation">
                                    <i class="bi bi-file-earmark-plus"></i> Quote
                                </a>
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" onclick="openEditProductModal('SKU-HW-108', 'Enterprise Rack Firewall 10G', 'Networking Hardware', '85000', '18% GST')" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="5">
                        <td>5</td>
                        <td class="fw-bold text-primary">SKU-SV-201</td>
                        <td>
                            <div class="fw-bold text-dark">Annual Maintenance Contract (AMC 24x7)</div>
                            <div class="small text-muted">Dedicated L1/L2/L3 SLA helpdesk &amp; preventive visits</div>
                        </td>
                        <td><span class="badge bg-warning-subtle text-warning">AMC &amp; Support</span></td>
                        <td class="small text-muted">SAC 998719</td>
                        <td class="text-end fw-bold text-dark">₹1,20,000</td>
                        <td><span class="badge bg-light text-dark border">18% GST</span></td>
                        <td><span class="status-pill status-approved">Active</span></td>
                        <td class="text-end">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="quotation-create.php?sku=SKU-SV-201&amp;item=Annual+Maintenance+Contract+(AMC+24x7)&amp;rate=120000" class="btn btn-outline-success btn-sm py-0 px-2 fw-semibold" title="Add to Quotation">
                                    <i class="bi bi-file-earmark-plus"></i> Quote
                                </a>
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" onclick="openEditProductModal('SKU-SV-201', 'Annual Maintenance Contract (AMC 24x7)', 'AMC & Support', '120000', '18% GST')" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="6">
                        <td>6</td>
                        <td class="fw-bold text-primary">SKU-SW-009</td>
                        <td>
                            <div class="fw-bold text-dark">Custom BI Analytics &amp; Report Builder</div>
                            <div class="small text-muted">Executive KPI dashboards, automated Excel/PDF scheduled exports</div>
                        </td>
                        <td><span class="badge bg-primary-subtle text-primary">Software Module</span></td>
                        <td class="small text-muted">SAC 998314</td>
                        <td class="text-end fw-bold text-dark">₹35,000</td>
                        <td><span class="badge bg-light text-dark border">18% GST</span></td>
                        <td><span class="status-pill status-approved">Active</span></td>
                        <td class="text-end">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="quotation-create.php?sku=SKU-SW-009&amp;item=Custom+BI+Analytics+Report+Builder&amp;rate=35000" class="btn btn-outline-success btn-sm py-0 px-2 fw-semibold" title="Add to Quotation">
                                    <i class="bi bi-file-earmark-plus"></i> Quote
                                </a>
                                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" onclick="openEditProductModal('SKU-SW-009', 'Custom BI Analytics & Report Builder', 'Software Module', '35000', '18% GST')" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Creation Modal -->
<div class="modal fade" id="creationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle text-primary me-2"></i>Add Product / Service to Catalog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="creationForm" onsubmit="event.preventDefault(); saveCatalogProduct();">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Product / SKU Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="prdCode" value="SKU-PRD-<?php echo rand(200, 999); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">HSN / SAC Code</label>
                            <input type="text" class="form-control" id="prdHsn" placeholder="e.g. SAC 998314">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Product / Service Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="prdName" placeholder="Enter Product or Service Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Category</label>
                            <select class="form-select" id="prdCategory">
                                <option value="Software License">Software License</option>
                                <option value="Hardware & IoT">Hardware &amp; IoT</option>
                                <option value="AMC & Support">AMC &amp; Support</option>
                                <option value="Consulting & Training">Consulting &amp; Training</option>
                                <option value="Integration">Integration</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Unit Selling Price (₹) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="prdPrice" placeholder="e.g. 25000" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">GST Tax Rate</label>
                            <select class="form-select" id="prdTax">
                                <option value="18% GST" selected>18% GST</option>
                                <option value="12% GST">12% GST</option>
                                <option value="28% GST">28% GST</option>
                                <option value="5% GST">5% GST</option>
                                <option value="0% Exempt">0% Exempt</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Status</label>
                            <select class="form-select" id="prdStatus">
                                <option value="Active" selected>Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-semibold">
                        <i class="bi bi-check2-circle me-1"></i>Save to Catalog &amp; Sync Stock
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square text-primary me-2"></i>Edit Catalog Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" onsubmit="event.preventDefault(); bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Product Code</label>
                            <input type="text" class="form-control bg-light fw-bold" id="editPrdCode" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Category</label>
                            <input type="text" class="form-control" id="editPrdCat">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small">Product / Service Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editPrdName" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Unit Selling Price (₹)</label>
                            <input type="number" class="form-control" id="editPrdPrice">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Tax Rate</label>
                            <input type="text" class="form-control" id="editPrdTax">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-semibold">
                        <i class="bi bi-check2-circle me-1"></i>Update Rate Card
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openEditProductModal(code, name, cat, price, tax) {
    document.getElementById('editPrdCode').value = code;
    document.getElementById('editPrdName').value = name;
    document.getElementById('editPrdCat').value = cat;
    document.getElementById('editPrdPrice').value = price;
    document.getElementById('editPrdTax').value = tax;
    new bootstrap.Modal(document.getElementById('editModal')).show();
}

function saveCatalogProduct() {
    var code = document.getElementById('prdCode').value.trim();
    var name = document.getElementById('prdName').value.trim();
    var hsn = document.getElementById('prdHsn').value.trim() || 'SAC 998314';
    var cat = document.getElementById('prdCategory').value;
    var price = parseFloat(document.getElementById('prdPrice').value) || 0;
    var tax = document.getElementById('prdTax').value;
    if (!code || !name) return;

    var list = [];
    try { list = JSON.parse(localStorage.getItem('gh_new_skus') || '[]'); } catch (e) {}
    list.unshift({
        sku: code,
        name: name,
        hsn: hsn,
        category: cat,
        sellPrice: price,
        costPrice: Math.round(price * 0.72),
        tax: tax,
        stock: 25,
        reorder: 5,
        warehouse: 'WH-CHN-01 · Chennai HQ'
    });
    localStorage.setItem('gh_new_skus', JSON.stringify(list));

    var modalEl = document.getElementById('creationModal');
    if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
        bootstrap.Modal.getInstance(modalEl).hide();
    }
    renderCatalogSkus();
}

function renderCatalogSkus() {
    var list = [];
    try { list = JSON.parse(localStorage.getItem('gh_new_skus') || '[]'); } catch (e) {}
    var tbody = document.getElementById('productCatalogBody');
    if (!tbody || !list.length) return;

    var existingCodes = {};
    tbody.querySelectorAll('tr').forEach(function (tr) {
        var cell = tr.cells[1];
        if (cell) existingCodes[cell.textContent.trim()] = true;
    });

    list.forEach(function (item, idx) {
        var code = item.sku || ('SKU-NEW-' + (idx + 1));
        if (existingCodes[code]) return;
        var price = Number(item.sellPrice || item.price || 0);
        var tr = document.createElement('tr');
        tr.innerHTML =
            '<td>New</td>' +
            '<td class="fw-bold text-primary">' + code + '</td>' +
            '<td><div class="fw-bold text-dark">' + (item.name || '') + '</div><div class="small text-muted">Synced across Catalog &amp; Inventory</div></td>' +
            '<td><span class="badge bg-primary-subtle text-primary">' + (item.category || 'Catalog Item') + '</span></td>' +
            '<td class="small text-muted">' + (item.hsn || 'SAC 998314') + '</td>' +
            '<td class="text-end fw-bold text-dark">₹' + price.toLocaleString('en-IN') + '</td>' +
            '<td><span class="badge bg-light text-dark border">' + (item.tax || '18% GST') + '</span></td>' +
            '<td><span class="status-pill status-approved">Active</span></td>' +
            '<td class="text-end">' +
                '<div class="d-inline-flex align-items-center gap-1">' +
                    '<a href="quotation-create.php?sku=' + encodeURIComponent(code) + '&item=' + encodeURIComponent(item.name || '') + '&rate=' + price + '" class="btn btn-outline-success btn-sm py-0 px-2 fw-semibold"><i class="bi bi-file-earmark-plus"></i> Quote</a>' +
                '</div>' +
            '</td>';
        tbody.insertBefore(tr, tbody.firstChild);
    });

    var badge = document.getElementById('catalogCountBadge');
    if (badge) {
        badge.textContent = tbody.querySelectorAll('tr').length + ' Active Catalog Items';
    }
}

document.addEventListener('DOMContentLoaded', renderCatalogSkus);
</script>

<?php include 'footer.php'; ?>
