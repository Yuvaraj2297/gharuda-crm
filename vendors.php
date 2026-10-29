<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Vendors &amp; Suppliers Directory</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold" id="vendorTotalBadge">14 Approved Vendors</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-building-gear fs-6"></i>
                <a href="inventory.php" class="text-decoration-none text-muted">Inventory &amp; Procurement</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Vendors &amp; Suppliers Master</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="inventory.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-boxes"></i><span>Inventory Stock</span>
            </a>
            <a href="purchase-orders.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-cart-check"></i><span>Purchase Orders (PO)</span>
            </a>
            <a href="purchase-order-create.php" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-bag-plus"></i><span>Raise Purchase Order</span>
            </a>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold" data-bs-toggle="modal" data-bs-target="#newVendorModal">
                <i class="bi bi-plus-lg"></i><span>Onboard New Vendor</span>
            </button>
        </div>
    </div>

    <!-- KPI Cards (100% Bootstrap 5 Utilities) -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Approved Vendors</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-building-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">14 Suppliers</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-patch-check-fill me-1"></i>100% GSTIN Verified</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Total PO Volume (YTD)</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-cart-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹24,60,000</h3>
                <a href="purchase-orders.php" class="small fw-bold text-primary text-decoration-none">22 Active POs &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Open Payables (AP)</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-wallet2"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-warning">₹4,85,000</h3>
                <a href="expenses.php" class="small fw-bold text-dark text-decoration-none">4 Pending Vendor Bills &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">On-Time GRN SLA</span>
                    <span class="p-2 rounded-3 bg-info-subtle text-info"><i class="bi bi-truck"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">96.4%</h3>
                <span class="text-muted small">Avg Lead Time: 4.2 Days</span>
            </div>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="card-custom p-3 mb-3">
        <div class="row g-2 align-items-center justify-content-between">
            <div class="col-12 col-lg-auto">
                <div class="d-flex flex-wrap gap-1">
                    <button type="button" class="btn btn-sm btn-primary fw-semibold vnd-filter-btn" data-filter="all">All Vendors</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold vnd-filter-btn" data-filter="Hardware & Biometrics">Hardware &amp; Biometrics</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold vnd-filter-btn" data-filter="Servers & Cloud">Servers &amp; Cloud</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold vnd-filter-btn" data-filter="Networking & POS">Networking &amp; POS</button>
                </div>
            </div>
            <div class="col-12 col-lg-auto">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control" id="vendorSearchInput" placeholder="Search vendor, GSTIN, contact...">
                </div>
            </div>
        </div>
    </div>

    <!-- Vendors Directory Table -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="vendorsTable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Vendor Code</th>
                        <th>Supplier / Company Name</th>
                        <th>Supply Category</th>
                        <th>Account Manager &amp; Contact</th>
                        <th>GSTIN &amp; City</th>
                        <th>Credit Terms</th>
                        <th class="text-end">Total PO Value</th>
                        <th>Status</th>
                        <th class="text-end pe-3">ERP Actions</th>
                    </tr>
                </thead>
                <tbody id="vendorsTableBody">
                    <tr data-cat="Hardware & Biometrics">
                        <td class="ps-3 fw-bold text-primary">VND-2026-001</td>
                        <td>
                            <div class="fw-bold text-dark">Matrix Secure Systems Pvt Ltd</div>
                            <div class="small text-muted">Preferred OEM Partner &middot; Rating: 4.9/5</div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Hardware &amp; Biometrics</span></td>
                        <td>
                            <div class="fw-semibold text-dark">Kiran Deshmukh</div>
                            <div class="small text-muted">+91 98250 44112 &middot; sales@matrixsec.in</div>
                        </td>
                        <td>
                            <div class="small fw-semibold text-dark">24AABCM4412D1Z8</div>
                            <div class="small text-muted">Vadodara / Chennai</div>
                        </td>
                        <td><span class="badge bg-info-subtle text-info border border-info-subtle">Net 30 Days</span></td>
                        <td class="text-end fw-bold text-dark">₹6,85,000</td>
                        <td><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Approved</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="purchase-order-create.php?vendor=Matrix+Secure+Systems+Pvt+Ltd&amp;sku=SKU-HW-102&amp;item=Biometric+Attendance+Terminal+Pro&amp;qty=25&amp;rate=8500" class="btn btn-primary btn-sm py-0 px-2 fw-semibold"><i class="bi bi-cart-plus me-1"></i>Raise PO</a>
                                <a href="purchase-orders.php" class="btn btn-outline-secondary btn-sm py-0 px-2" title="View POs"><i class="bi bi-clock-history"></i></a>
                                <a href="https://wa.me/919825044112" target="_blank" class="btn btn-outline-success btn-sm py-0 px-2" title="WhatsApp Vendor"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-cat="Servers & Cloud">
                        <td class="ps-3 fw-bold text-primary">VND-2026-002</td>
                        <td>
                            <div class="fw-bold text-dark">Ingram Micro India Pvt Ltd</div>
                            <div class="small text-muted">Enterprise Tier-1 Distributor &middot; Rating: 4.8/5</div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Servers &amp; Cloud</span></td>
                        <td>
                            <div class="fw-semibold text-dark">Ananya Sundaram</div>
                            <div class="small text-muted">+91 98401 77230 &middot; enterprise@ingrammicro.in</div>
                        </td>
                        <td>
                            <div class="small fw-semibold text-dark">27AAACI1188E1Z2</div>
                            <div class="small text-muted">Mumbai / Chennai</div>
                        </td>
                        <td><span class="badge bg-info-subtle text-info border border-info-subtle">Net 45 Days</span></td>
                        <td class="text-end fw-bold text-dark">₹9,40,000</td>
                        <td><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Approved</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="purchase-order-create.php?vendor=Ingram+Micro+India+Pvt+Ltd&amp;sku=SKU-SV-105&amp;item=Dell+PowerEdge+R250+ERP+Appliance&amp;qty=3&amp;rate=115000" class="btn btn-primary btn-sm py-0 px-2 fw-semibold"><i class="bi bi-cart-plus me-1"></i>Raise PO</a>
                                <a href="purchase-orders.php" class="btn btn-outline-secondary btn-sm py-0 px-2" title="View POs"><i class="bi bi-clock-history"></i></a>
                                <a href="https://wa.me/919840177230" target="_blank" class="btn btn-outline-success btn-sm py-0 px-2" title="WhatsApp Vendor"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-cat="Networking & POS">
                        <td class="ps-3 fw-bold text-primary">VND-2026-003</td>
                        <td>
                            <div class="fw-bold text-dark">Honeywell AutoID India</div>
                            <div class="small text-muted">Authorized AIDC Supplier &middot; Rating: 4.9/5</div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Networking &amp; POS</span></td>
                        <td>
                            <div class="fw-semibold text-dark">Siddharth Menon</div>
                            <div class="small text-muted">+91 99001 55321 &middot; orders@honeywellaidc.in</div>
                        </td>
                        <td>
                            <div class="small fw-semibold text-dark">29AAACH7721B1Z4</div>
                            <div class="small text-muted">Bengaluru</div>
                        </td>
                        <td><span class="badge bg-info-subtle text-info border border-info-subtle">Net 30 Days</span></td>
                        <td class="text-end fw-bold text-dark">₹4,15,000</td>
                        <td><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Approved</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="purchase-order-create.php?vendor=Honeywell+AutoID+India&amp;sku=SKU-HW-103&amp;item=Industrial+Barcode+POS+Scanner+Kit&amp;qty=20&amp;rate=4200" class="btn btn-primary btn-sm py-0 px-2 fw-semibold"><i class="bi bi-cart-plus me-1"></i>Raise PO</a>
                                <a href="purchase-orders.php" class="btn btn-outline-secondary btn-sm py-0 px-2" title="View POs"><i class="bi bi-clock-history"></i></a>
                                <a href="https://wa.me/919900155321" target="_blank" class="btn btn-outline-success btn-sm py-0 px-2" title="WhatsApp Vendor"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-cat="Networking & POS">
                        <td class="ps-3 fw-bold text-primary">VND-2026-004</td>
                        <td>
                            <div class="fw-bold text-dark">Netgear Enterprise Distribution</div>
                            <div class="small text-muted">Commercial Switching Partner &middot; Rating: 4.7/5</div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Networking &amp; POS</span></td>
                        <td>
                            <div class="fw-semibold text-dark">Prakash Rajagopal</div>
                            <div class="small text-muted">+91 98412 88901 &middot; b2b@netgear-india.com</div>
                        </td>
                        <td>
                            <div class="small fw-semibold text-dark">33AABCN9920K1Z1</div>
                            <div class="small text-muted">Chennai</div>
                        </td>
                        <td><span class="badge bg-info-subtle text-info border border-info-subtle">Net 15 Days</span></td>
                        <td class="text-end fw-bold text-dark">₹4,20,000</td>
                        <td><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Approved</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="purchase-order-create.php?vendor=Netgear+Enterprise+Distribution&amp;sku=SKU-NW-104&amp;item=Managed+PoE+24-Port+Gigabit+Switch&amp;qty=15&amp;rate=18900" class="btn btn-primary btn-sm py-0 px-2 fw-semibold"><i class="bi bi-cart-plus me-1"></i>Raise PO</a>
                                <a href="purchase-orders.php" class="btn btn-outline-secondary btn-sm py-0 px-2" title="View POs"><i class="bi bi-clock-history"></i></a>
                                <a href="https://wa.me/919841288901" target="_blank" class="btn btn-outline-success btn-sm py-0 px-2" title="WhatsApp Vendor"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Onboard New Vendor Modal -->
<div class="modal fade" id="newVendorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold"><i class="bi bi-building-add text-primary me-2"></i>Onboard New Supplier / Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Vendor Code</label>
                        <input type="text" class="form-control form-control-sm fw-bold" id="vndCode" value="VND-2026-005">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small fw-semibold">Supplier / Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="vndName" placeholder="e.g. Redington India Ltd">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Supply Category</label>
                        <select class="form-select form-select-sm" id="vndCategory">
                            <option value="Hardware & Biometrics">Hardware &amp; Biometrics</option>
                            <option value="Servers & Cloud">Servers &amp; Cloud</option>
                            <option value="Networking & POS">Networking &amp; POS</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Vendor GSTIN <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" id="vndGstin" value="33AAACR5512H1Z9">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Credit / Payment Terms</label>
                        <select class="form-select form-select-sm" id="vndTerms">
                            <option value="Net 30 Days">Net 30 Days</option>
                            <option value="Net 45 Days">Net 45 Days</option>
                            <option value="Net 15 Days">Net 15 Days</option>
                            <option value="100% Advance">100% Advance</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Account Manager Name</label>
                        <input type="text" class="form-control form-control-sm" id="vndContact" placeholder="e.g. Ramesh Krishnan">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Mobile / WhatsApp</label>
                        <input type="text" class="form-control form-control-sm" id="vndPhone" placeholder="+91 98400 12345">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Order Desk Email</label>
                        <input type="email" class="form-control form-control-sm" id="vndEmail" placeholder="orders@supplier.in">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">City / Dispatch Hub</label>
                        <input type="text" class="form-control form-control-sm" id="vndCity" value="Chennai">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Bank &amp; IFSC (For NEFT/RTGS)</label>
                        <input type="text" class="form-control form-control-sm" id="vndBank" placeholder="HDFC Bank · HDFC0000124">
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-success btn-sm fw-semibold" id="saveAndRaisePoBtn"><i class="bi bi-cart-plus me-1"></i>Save &amp; Raise PO Now</button>
                <button type="button" class="btn btn-primary btn-sm fw-semibold" id="saveVendorBtn"><i class="bi bi-check2-circle me-1"></i>Save Vendor</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tbody = document.getElementById('vendorsTableBody');

    function appendVendorRow(v) {
        var tr = document.createElement('tr');
        tr.setAttribute('data-cat', v.category || 'Hardware & Biometrics');
        tr.innerHTML =
            '<td class="ps-3 fw-bold text-primary">' + v.code + '</td>' +
            '<td><div class="fw-bold text-dark">' + v.name + '</div><div class="small text-muted">Onboarded Supplier &middot; Bank Verified</div></td>' +
            '<td><span class="badge bg-light text-dark border">' + (v.category || 'Hardware & Biometrics') + '</span></td>' +
            '<td><div class="fw-semibold text-dark">' + (v.contact || 'Sales Desk') + '</div><div class="small text-muted">' + (v.phone || '+91 98400 00000') + ' &middot; ' + (v.email || 'orders@vendor.in') + '</div></td>' +
            '<td><div class="small fw-semibold text-dark">' + (v.gstin || '33AAACR5512H1Z9') + '</div><div class="small text-muted">' + (v.city || 'Chennai') + '</div></td>' +
            '<td><span class="badge bg-info-subtle text-info border border-info-subtle">' + (v.terms || 'Net 30 Days') + '</span></td>' +
            '<td class="text-end fw-bold text-dark">₹0</td>' +
            '<td><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Approved</span></td>' +
            '<td class="text-end pe-3"><div class="d-inline-flex align-items-center gap-1">' +
            '<a href="purchase-order-create.php?vendor=' + encodeURIComponent(v.name) + '" class="btn btn-primary btn-sm py-0 px-2 fw-semibold"><i class="bi bi-cart-plus me-1"></i>Raise PO</a>' +
            '<a href="purchase-orders.php" class="btn btn-outline-secondary btn-sm py-0 px-2"><i class="bi bi-clock-history"></i></a>' +
            '</div></td>';
        tbody.insertBefore(tr, tbody.firstChild);
    }

    try {
        var savedVnds = JSON.parse(localStorage.getItem('gh_new_vendors') || '[]');
        savedVnds.forEach(appendVendorRow);
    } catch (e) {}

    function persistVendor(goToPo) {
        var vObj = {
            code: document.getElementById('vndCode').value.trim() || 'VND-2026-NEW',
            name: document.getElementById('vndName').value.trim() || 'Redington India Ltd',
            category: document.getElementById('vndCategory').value,
            gstin: document.getElementById('vndGstin').value.trim(),
            terms: document.getElementById('vndTerms').value,
            contact: document.getElementById('vndContact').value.trim() || 'Account Manager',
            phone: document.getElementById('vndPhone').value.trim() || '+91 98400 12345',
            email: document.getElementById('vndEmail').value.trim() || 'sales@vendor.in',
            city: document.getElementById('vndCity').value.trim() || 'Chennai'
        };
        try {
            var arr = JSON.parse(localStorage.getItem('gh_new_vendors') || '[]');
            arr.push(vObj);
            localStorage.setItem('gh_new_vendors', JSON.stringify(arr));
        } catch (e) {}
        if (goToPo) {
            window.location.href = 'purchase-order-create.php?vendor=' + encodeURIComponent(vObj.name);
            return;
        }
        appendVendorRow(vObj);
        var modalEl = document.getElementById('newVendorModal');
        if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
            bootstrap.Modal.getInstance(modalEl).hide();
        }
    }

    document.getElementById('saveVendorBtn').addEventListener('click', function () { persistVendor(false); });
    document.getElementById('saveAndRaisePoBtn').addEventListener('click', function () { persistVendor(true); });

    // Filter & Search
    var curCat = 'all';
    function filterVendors() {
        var q = (document.getElementById('vendorSearchInput').value || '').toLowerCase();
        Array.prototype.forEach.call(tbody.querySelectorAll('tr'), function (tr) {
            var c = tr.getAttribute('data-cat') || '';
            var text = tr.textContent.toLowerCase();
            var matchC = (curCat === 'all') || (c === curCat);
            var matchQ = !q || text.indexOf(q) !== -1;
            tr.classList.toggle('d-none', !(matchC && matchQ));
        });
    }

    Array.prototype.forEach.call(document.querySelectorAll('.vnd-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.vnd-filter-btn'), function (b) {
                b.classList.remove('btn-primary');
                b.classList.add('btn-outline-secondary');
            });
            btn.classList.remove('btn-outline-secondary');
            btn.classList.add('btn-primary');
            curCat = btn.getAttribute('data-filter');
            filterVendors();
        });
    });

    document.getElementById('vendorSearchInput').addEventListener('input', filterVendors);
});
</script>

<?php include 'footer.php'; ?>

