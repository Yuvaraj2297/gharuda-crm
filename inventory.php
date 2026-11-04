<?php include 'header.php'; ?>

<main class="inv-page container-fluid px-0">
    <!-- Page Header & Action Bar in Single Row (lead.php & follow-up-list.php style, no breadcrumb, no stat cards) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;font-size:18px;">
                <i class="bi bi-boxes"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title fs-4">Inventory &amp; Stock Control</h1>
                <span class="text-muted font-11 d-none d-sm-inline">Manage warehouse stock ledger, hardware &amp; license SKUs, reorder alerts &amp; GRN inward entries</span>
            </div>
        </div>

        <!-- RIGHT: Actions in Single Row -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="invStatusTabs" role="tablist">
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold inv-filter-btn active" data-filter="all">All SKUs</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold inv-filter-btn" data-filter="In Stock">In Stock</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold inv-filter-btn" data-filter="Low Stock">Low Stock</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold inv-filter-btn" data-filter="Out of Stock">Out of Stock</button>
            </div>

            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="offcanvas" data-bs-target="#invFilterOffcanvas" aria-controls="invFilterOffcanvas" id="invOffcanvasFilterBtn">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="invFilterCountBadge">0</span>
            </button>

            <div class="dropdown">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                    <i class="bi bi-lightning-charge-fill"></i><span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu" style="min-width: 245px;">
                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Inventory &amp; Procurement</li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" data-bs-toggle="modal" data-bs-target="#newInventoryItemModal">
                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-plus-lg"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Add Stock SKU</div>
                                <div class="text-muted" style="font-size:10px;">Create new hardware / license SKU</div>
                            </div>
                        </button>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="purchase-order-create.php">
                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-bag-plus"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Raise Purchase Order</div>
                                <div class="text-muted" style="font-size:10px;">Issue vendor PO for stock inward</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="purchase-orders.php">
                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-cart-check"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Purchase Orders (PO)</div>
                                <div class="text-muted" style="font-size:10px;">View open POs &amp; GRN queue</div>
                            </div>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="product-catalog-master.php">
                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-box-seam"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Product Catalog Master</div>
                                <div class="text-muted" style="font-size:10px;">Manage master items &amp; pricing</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <button type="button" class="btn btn-success btn-sm font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="modal" data-bs-target="#newInventoryItemModal">
                <i class="bi bi-plus-lg"></i><span>New SKU</span>
            </button>
        </div>
    </div>

    <!-- Inventory Ledger Table -->
    <div class="card-custom p-0 mb-4" style="overflow: visible;">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0 datatable" id="inventoryTable" data-table-name="Inventory Stock">
                <thead>
                    <tr>
                        <th class="ps-3" style="width: 60px;">S.No</th>
                        <th>SKU Code</th>
                        <th>Item / Hardware / License</th>
                        <th>Category &amp; HSN</th>
                        <th>Warehouse</th>
                        <th class="text-center">Available Qty</th>
                        <th class="text-center">Reorder Level</th>
                        <th class="text-end">Unit Cost</th>
                        <th class="text-end">Selling Price</th>
                        <th>Stock Status</th>
                        <th class="text-end pe-3" style="width: 110px;">Action</th>
                    </tr>
                </thead>
                <tbody id="inventoryTableBody">
                    <tr data-sku="SKU-SW-101" data-name="Gharuda Cloud CRM Enterprise (Annual Seat)" data-vendor="Internal Cloud Provisioning" data-category="SaaS License" data-hsn="998315" data-status="In Stock" data-warehouse="Cloud Pool" data-qty="140" data-reorder="25" data-cost="12000" data-price="25000">
                        <td class="ps-3">1</td>
                        <td class="fw-bold"><a href="#" class="inv-sku-link" data-sku="SKU-SW-101">SKU-SW-101</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">SKU Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-sku-360" data-sku="SKU-SW-101">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-box-seam"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">SKU 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Valuation, margin &amp; vendor info</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-adjust-stock" data-sku="SKU-SW-101" data-item="Gharuda Cloud CRM Enterprise" data-qty="140">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-sliders"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Adjust Stock / GRN</div>
                                                <div class="text-muted" style="font-size: 10px;">Inward receipt or dispatch</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="quotation-create.php?deal=Gharuda+Cloud+CRM+Enterprise&amp;value=25000">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-file-earmark-text"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Create Customer Quote</div>
                                                <div class="text-muted" style="font-size: 10px;">Issue GST proposal with SKU</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?sku=SKU-SW-101&amp;item=Gharuda+Cloud+CRM+Enterprise&amp;qty=50&amp;rate=12000">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise Purchase Order</div>
                                                <div class="text-muted" style="font-size: 10px;">Order stock from supplier</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-sku" data-sku="SKU-SW-101">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete SKU</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove from stock ledger</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-sku="SKU-HW-102" data-name="Biometric Attendance &amp; Access Terminal Pro" data-vendor="Matrix Secure Systems Pvt Ltd" data-category="Biometric Hardware" data-hsn="847160" data-status="Low Stock" data-warehouse="Chennai HQ" data-qty="6" data-reorder="15" data-cost="8500" data-price="14500">
                        <td class="ps-3">2</td>
                        <td class="fw-bold"><a href="#" class="inv-sku-link" data-sku="SKU-HW-102">SKU-HW-102</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">SKU Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-sku-360" data-sku="SKU-HW-102">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-box-seam"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">SKU 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Valuation, margin &amp; vendor info</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-adjust-stock" data-sku="SKU-HW-102" data-item="Biometric Attendance Terminal Pro" data-qty="6">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-sliders"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Adjust Stock / GRN</div>
                                                <div class="text-muted" style="font-size: 10px;">Inward receipt or dispatch</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="quotation-create.php?deal=Biometric+Attendance+Terminal+Pro&amp;value=14500">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-file-earmark-text"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Create Customer Quote</div>
                                                <div class="text-muted" style="font-size: 10px;">Issue GST proposal with SKU</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?sku=SKU-HW-102&amp;item=Biometric+Attendance+Terminal+Pro&amp;vendor=Matrix+Secure+Systems+Pvt+Ltd&amp;qty=25&amp;rate=8500">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise Reorder PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Restock low inventory item</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-sku" data-sku="SKU-HW-102">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete SKU</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove from stock ledger</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-sku="SKU-HW-103" data-name="Industrial Barcode &amp; POS Scanner Kit" data-vendor="Honeywell AutoID India" data-category="POS Hardware" data-hsn="847190" data-status="In Stock" data-warehouse="Bengaluru Hub" data-qty="42" data-reorder="10" data-cost="4200" data-price="7800">
                        <td class="ps-3">3</td>
                        <td class="fw-bold"><a href="#" class="inv-sku-link" data-sku="SKU-HW-103">SKU-HW-103</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">SKU Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-sku-360" data-sku="SKU-HW-103">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-box-seam"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">SKU 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Valuation, margin &amp; vendor info</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-adjust-stock" data-sku="SKU-HW-103" data-item="Industrial Barcode & POS Scanner Kit" data-qty="42">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-sliders"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Adjust Stock / GRN</div>
                                                <div class="text-muted" style="font-size: 10px;">Inward receipt or dispatch</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="quotation-create.php?deal=Industrial+Barcode+POS+Scanner+Kit&amp;value=7800">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-file-earmark-text"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Create Customer Quote</div>
                                                <div class="text-muted" style="font-size: 10px;">Issue GST proposal with SKU</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?sku=SKU-HW-103&amp;item=Industrial+Barcode+POS+Scanner+Kit&amp;vendor=Honeywell+AutoID+India&amp;qty=20&amp;rate=4200">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise Purchase Order</div>
                                                <div class="text-muted" style="font-size: 10px;">Order stock from supplier</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-sku" data-sku="SKU-HW-103">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete SKU</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove from stock ledger</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-sku="SKU-NW-104" data-name="Managed PoE+ 24-Port Gigabit Rack Switch" data-vendor="Netgear Enterprise Distribution" data-category="Networking" data-hsn="851762" data-status="Low Stock" data-warehouse="Chennai HQ" data-qty="4" data-reorder="10" data-cost="18900" data-price="28500">
                        <td class="ps-3">4</td>
                        <td class="fw-bold"><a href="#" class="inv-sku-link" data-sku="SKU-NW-104">SKU-NW-104</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">SKU Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-sku-360" data-sku="SKU-NW-104">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-box-seam"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">SKU 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Valuation, margin &amp; vendor info</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-adjust-stock" data-sku="SKU-NW-104" data-item="Managed PoE+ 24-Port Gigabit Rack Switch" data-qty="4">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-sliders"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Adjust Stock / GRN</div>
                                                <div class="text-muted" style="font-size: 10px;">Inward receipt or dispatch</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="quotation-create.php?deal=Managed+PoE+24-Port+Gigabit+Switch&amp;value=28500">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-file-earmark-text"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Create Customer Quote</div>
                                                <div class="text-muted" style="font-size: 10px;">Issue GST proposal with SKU</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?sku=SKU-NW-104&amp;item=Managed+PoE+24-Port+Gigabit+Switch&amp;vendor=Netgear+Enterprise+Distribution&amp;qty=15&amp;rate=18900">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise Reorder PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Restock low inventory item</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-sku" data-sku="SKU-NW-104">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete SKU</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove from stock ledger</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-sku="SKU-SV-105" data-name="Dell PowerEdge R250 On-Prem ERP Appliance" data-vendor="Ingram Micro India Pvt Ltd" data-category="Server Appliance" data-hsn="847150" data-status="Out of Stock" data-warehouse="Chennai HQ" data-qty="0" data-reorder="3" data-cost="115000" data-price="165000">
                        <td class="ps-3">5</td>
                        <td class="fw-bold"><a href="#" class="inv-sku-link" data-sku="SKU-SV-105">SKU-SV-105</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">SKU Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-sku-360" data-sku="SKU-SV-105">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-box-seam"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">SKU 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Valuation, margin &amp; vendor info</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-adjust-stock" data-sku="SKU-SV-105" data-item="Dell PowerEdge R250 On-Prem ERP Appliance" data-qty="0">
                                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-sliders"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Adjust Stock / GRN</div>
                                                <div class="text-muted" style="font-size: 10px;">Inward receipt or dispatch</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="quotation-create.php?deal=Dell+PowerEdge+R250+ERP+Appliance&amp;value=165000">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-file-earmark-text"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Create Customer Quote</div>
                                                <div class="text-muted" style="font-size: 10px;">Issue GST proposal with SKU</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?sku=SKU-SV-105&amp;item=Dell+PowerEdge+R250+ERP+Appliance&amp;vendor=Ingram+Micro+India+Pvt+Ltd&amp;qty=5&amp;rate=115000">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Urgent Purchase Order</div>
                                                <div class="text-muted" style="font-size: 10px;">Emergency stock procurement</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-sku" data-sku="SKU-SV-105">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete SKU</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove from stock ledger</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- ===== Inventory Filter Offcanvas (lead.php & follow-up-list.php style) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="invFilterOffcanvas" aria-labelledby="invFilterOffcanvasLabel" style="width: 380px;">
    <div class="offcanvas-header border-bottom py-3 px-3">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2 mb-0" id="invFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Inventory Ledger
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="invStatusFilterSelect">Stock Status</label>
            <select class="form-select select2 form-select-sm" id="invStatusFilterSelect">
                <option value="all">All Stock Statuses</option>
                <option value="In Stock">In Stock</option>
                <option value="Low Stock">Low Stock (Reorder)</option>
                <option value="Out of Stock">Out of Stock</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="invWarehouseFilter">Warehouse / Branch</label>
            <select class="form-select select2 form-select-sm" id="invWarehouseFilter">
                <option value="">All Warehouses / Branches</option>
                <option value="Chennai HQ">Chennai HQ Warehouse</option>
                <option value="Bengaluru Hub">Bengaluru Tech Hub</option>
                <option value="Cloud Pool">Digital License Pool</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="invCategoryFilter">Category</label>
            <select class="form-select select2 form-select-sm" id="invCategoryFilter">
                <option value="">All Categories</option>
                <option value="SaaS License">SaaS License</option>
                <option value="Biometric Hardware">Biometric Hardware</option>
                <option value="POS Hardware">POS Hardware</option>
                <option value="Networking">Networking</option>
                <option value="Server Appliance">Server Appliance</option>
                <option value="Hardware">Hardware &amp; Devices</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="invSearchInput">Keyword / SKU / HSN</label>
            <input type="text" class="form-control form-control-sm" id="invSearchInput" placeholder="Search SKU code, item name, vendor, HSN...">
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2 bg-light-subtle">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" id="invResetFilterBtn">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" id="invApplyFilterBtn">
            <i class="bi bi-funnel me-1"></i> Apply Filters
        </button>
    </div>
</div>

<!-- ===== SKU 360° Overview Modal ===== -->
<div class="modal fade" id="invDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-box-seam fs-5"></i>
                    </span>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-5" id="invModalName">SKU Overview</h5>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill font-11 px-2.5 py-0.5" id="invModalSku">SKU-SW-101</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5" id="invModalStatus">In Stock</span>
                        </div>
                        <div class="small text-muted" id="invModalVendor">Vendor &amp; Warehouse Details</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-white">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Available Qty</span>
                            <h6 class="fw-bold text-primary mb-0 fs-6" id="invModalQty">0 Units</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Unit Cost</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="invModalCost">₹0</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Selling Price</span>
                            <h6 class="fw-bold text-success mb-0 fs-6" id="invModalPrice">₹0</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Total Valuation</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="invModalValuation">₹0</h6>
                        </div>
                    </div>
                </div>

                <div class="card border border-light-subtle rounded-3 p-3 mb-4">
                    <h6 class="fw-bold text-dark mb-3 font-13 text-uppercase" style="letter-spacing:0.5px;">
                        <i class="bi bi-info-circle text-primary me-1.5"></i>Stock &amp; Tax Classification
                    </h6>
                    <div class="row g-3 font-13">
                        <div class="col-sm-6">
                            <div class="text-muted small">Category &amp; HSN / SAC</div>
                            <div class="fw-semibold text-dark mt-0.5" id="invModalCategory">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Warehouse Location</div>
                            <div class="fw-semibold text-dark mt-0.5" id="invModalWarehouse">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Reorder Threshold</div>
                            <div class="fw-semibold text-dark mt-0.5" id="invModalReorder">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Preferred Supplier</div>
                            <div class="fw-semibold text-dark mt-0.5" id="invModalSupplier">—</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">
                    <span class="text-muted small fw-semibold">Quick Actions:</span>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="button" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1.5 fw-semibold font-12" id="invModalAdjustBtn">
                            <i class="bi bi-sliders"></i> Adjust Stock / GRN
                        </button>
                        <a href="#" id="invModalQuoteBtn" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-file-earmark-text"></i> Create Customer Quote
                        </a>
                        <a href="#" id="invModalPoBtn" class="btn btn-sm btn-success d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-cart-plus"></i> Raise Purchase Order
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light-subtle py-2.5 px-4 border-top">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
    var tableEl = document.getElementById('inventoryTable');
    var activeRow = null;
    var allSkuRows = [];

    function buildActionMenuHtml(sku, name, vendor, qty, cost, price) {
        var encSku = encodeURIComponent(sku || '');
        var encName = encodeURIComponent(name || '');
        var encVendor = encodeURIComponent(vendor || '');
        var encCost = encodeURIComponent(cost || 0);
        var encPrice = encodeURIComponent(price || 0);
        var safeSku = String(sku || '').replace(/"/g, '&quot;');
        var safeName = String(name || '').replace(/"/g, '&quot;');

        return '<div class="dropdown">' +
            '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                '<span>Actions</span>' +
            '</button>' +
            '<ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">' +
                '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">SKU Actions</li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-sku-360" data-sku="' + safeSku + '"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-box-seam"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">SKU 360° Overview</div><div class="text-muted" style="font-size: 10px;">Valuation, margin &amp; vendor info</div></div></button></li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-adjust-stock" data-sku="' + safeSku + '" data-item="' + safeName + '" data-qty="' + qty + '"><span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-sliders"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Adjust Stock / GRN</div><div class="text-muted" style="font-size: 10px;">Inward receipt or dispatch</div></div></button></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="quotation-create.php?deal=' + encName + '&value=' + encPrice + '"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-file-earmark-text"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Create Customer Quote</div><div class="text-muted" style="font-size: 10px;">Issue GST proposal with SKU</div></div></a></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?sku=' + encSku + '&item=' + encName + '&vendor=' + encVendor + '&qty=20&rate=' + encCost + '"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cart-plus"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Raise Purchase Order</div><div class="text-muted" style="font-size: 10px;">Order stock from supplier</div></div></a></li>' +
                '<li><hr class="dropdown-divider my-1"></li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-sku" data-sku="' + safeSku + '"><span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span><div class="text-start"><div class="fw-semibold text-danger font-12">Delete SKU</div><div class="text-muted" style="font-size: 10px;">Remove from stock ledger</div></div></button></li>' +
            '</ul>' +
        '</div>';
    }

    function appendSkuRow(s) {
        var qty = parseInt(s.qty, 10) || 0;
        var reorder = parseInt(s.reorder, 10) || 5;
        var cost = Number(s.cost || 0);
        var price = Number(s.price || 0);
        var status = qty <= 0 ? 'Out of Stock' : (qty <= reorder ? 'Low Stock' : 'In Stock');
        var badgeClass = status === 'In Stock' ? 'bg-success-subtle text-success border-success-subtle' :
                         (status === 'Low Stock' ? 'bg-warning-subtle text-warning border-warning-subtle' : 'bg-danger-subtle text-danger border-danger-subtle');
        var qtyClass = status === 'In Stock' ? 'text-success' : (status === 'Low Stock' ? 'text-warning' : 'text-danger');
        var tr = document.createElement('tr');
        tr.setAttribute('data-sku', s.sku || 'SKU-NEW');
        tr.setAttribute('data-name', s.name || 'New Hardware SKU');
        tr.setAttribute('data-vendor', s.vendor || 'Approved Supplier');
        tr.setAttribute('data-category', s.category || 'Hardware');
        tr.setAttribute('data-hsn', s.hsn || '8471');
        tr.setAttribute('data-status', status);
        tr.setAttribute('data-warehouse', s.warehouse || 'Chennai HQ');
        tr.setAttribute('data-qty', String(qty));
        tr.setAttribute('data-reorder', String(reorder));
        tr.setAttribute('data-cost', String(cost));
        tr.setAttribute('data-price', String(price));

        tr.innerHTML =
            '<td class="ps-3">1</td>' +
            '<td class="fw-bold"><a href="#" class="inv-sku-link" data-sku="' + (s.sku || 'SKU-NEW') + '">' + (s.sku || 'SKU-NEW') + '</a></td>' +
            '<td><div class="fw-bold text-dark">' + (s.name || 'New Hardware SKU') + '</div><div class="small text-muted">Vendor: ' + (s.vendor || 'Approved Supplier') + ' &middot; 18% GST</div></td>' +
            '<td><span class="badge bg-light text-dark border">' + (s.category || 'Hardware') + '</span><div class="small text-muted mt-1">HSN: ' + (s.hsn || '8471') + '</div></td>' +
            '<td><span class="small fw-semibold">' + (s.warehouse || 'Chennai HQ') + '</span></td>' +
            '<td class="text-center fw-bold ' + qtyClass + ' fs-6" data-qty-cell>' + qty + '</td>' +
            '<td class="text-center text-muted small">' + reorder + '</td>' +
            '<td class="text-end text-muted">₹' + cost.toLocaleString('en-IN') + '</td>' +
            '<td class="text-end fw-bold text-dark">₹' + price.toLocaleString('en-IN') + '</td>' +
            '<td data-status-cell><span class="badge rounded-pill ' + badgeClass + ' border px-2 py-1">' + status + '</span></td>' +
            '<td class="text-end pe-3">' + buildActionMenuHtml(s.sku, s.name, s.vendor, qty, cost, price) + '</td>';

        tbody.insertBefore(tr, tbody.firstChild);
        allSkuRows.unshift(tr);
    }

    // Initialize master row list and load newly created SKUs from localStorage
    allSkuRows = Array.from(tbody.querySelectorAll('tr[data-sku]'));
    try {
        var savedSkus = JSON.parse(localStorage.getItem('gh_new_inventory') || '[]');
        savedSkus.forEach(function (s) {
            appendSkuRow(s);
        });
    } catch (e) {}

    // Capture-phase dropdown delegation with viewport boundary & fixed popper strategy
    document.addEventListener('click', function (e) {
        var toggle = e.target.closest('.btn-table-action[data-bs-toggle="dropdown"]');
        if (toggle && window.bootstrap && bootstrap.Dropdown) {
            bootstrap.Dropdown.getOrCreateInstance(toggle, {
                boundary: 'viewport',
                popperConfig: { strategy: 'fixed' }
            });
        }
        var actItem = e.target.closest('.table-action-menu .dropdown-item');
        if (actItem && window.bootstrap && bootstrap.Dropdown) {
            var dd = actItem.closest('.dropdown');
            var btn = dd ? dd.querySelector('[data-bs-toggle="dropdown"]') : null;
            if (btn) {
                var inst = bootstrap.Dropdown.getInstance(btn);
                if (inst) inst.hide();
            }
        }
    }, true);

    // SKU 360 Overview Modal
    window.openSku360Modal = function (tr) {
        if (!tr) return;
        activeRow = tr;
        var sku = tr.getAttribute('data-sku') || '';
        var name = tr.getAttribute('data-name') || '';
        var vendor = tr.getAttribute('data-vendor') || 'Approved Supplier';
        var category = tr.getAttribute('data-category') || 'Hardware';
        var hsn = tr.getAttribute('data-hsn') || '—';
        var status = tr.getAttribute('data-status') || 'In Stock';
        var warehouse = tr.getAttribute('data-warehouse') || 'Chennai HQ';
        var qtyCell = tr.querySelector('[data-qty-cell]');
        var qty = qtyCell ? (parseInt(qtyCell.textContent.trim(), 10) || 0) : (parseInt(tr.getAttribute('data-qty') || '0', 10));
        var reorder = parseInt(tr.getAttribute('data-reorder') || '5', 10);
        var cost = Number(tr.getAttribute('data-cost') || 0);
        var price = Number(tr.getAttribute('data-price') || 0);
        var valuation = qty * cost;

        var setTxt = function (id, val) {
            var el = document.getElementById(id);
            if (el) el.textContent = val;
        };
        setTxt('invModalName', name);
        setTxt('invModalSku', sku);
        setTxt('invModalVendor', 'Vendor: ' + vendor + ' · Warehouse: ' + warehouse);
        setTxt('invModalQty', qty + ' Units');
        setTxt('invModalCost', '₹' + cost.toLocaleString('en-IN'));
        setTxt('invModalPrice', '₹' + price.toLocaleString('en-IN'));
        setTxt('invModalValuation', '₹' + valuation.toLocaleString('en-IN'));
        setTxt('invModalCategory', category + ' (HSN/SAC: ' + hsn + ')');
        setTxt('invModalWarehouse', warehouse);
        setTxt('invModalReorder', reorder + ' Units');
        setTxt('invModalSupplier', vendor);

        var stBadge = document.getElementById('invModalStatus');
        if (stBadge) {
            stBadge.textContent = status;
            stBadge.className = status === 'In Stock'
                ? 'badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5'
                : (status === 'Low Stock'
                    ? 'badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill font-11 px-2.5 py-0.5'
                    : 'badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill font-11 px-2.5 py-0.5');
        }

        var quoteBtn = document.getElementById('invModalQuoteBtn');
        if (quoteBtn) quoteBtn.href = 'quotation-create.php?deal=' + encodeURIComponent(name) + '&value=' + encodeURIComponent(price);
        var poBtn = document.getElementById('invModalPoBtn');
        if (poBtn) poBtn.href = 'purchase-order-create.php?sku=' + encodeURIComponent(sku) + '&item=' + encodeURIComponent(name) + '&vendor=' + encodeURIComponent(vendor) + '&qty=20&rate=' + encodeURIComponent(cost);

        var modalEl = document.getElementById('invDetailModal');
        if (modalEl && window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    };

    var modalAdjustBtn = document.getElementById('invModalAdjustBtn');
    if (modalAdjustBtn) {
        modalAdjustBtn.addEventListener('click', function () {
            var detailModalEl = document.getElementById('invDetailModal');
            if (detailModalEl && window.bootstrap && bootstrap.Modal) {
                var inst = bootstrap.Modal.getInstance(detailModalEl);
                if (inst) inst.hide();
            }
            if (activeRow) {
                var sku = activeRow.getAttribute('data-sku') || '';
                var name = activeRow.getAttribute('data-name') || '';
                var qtyCell = activeRow.querySelector('[data-qty-cell]');
                document.getElementById('adjSkuLabel').textContent = sku + ' · ' + name;
                document.getElementById('adjCurrentQty').textContent = qtyCell ? qtyCell.textContent.trim() : '0';
                if (window.bootstrap) {
                    bootstrap.Modal.getOrCreateInstance(document.getElementById('stockAdjustModal')).show();
                }
            }
        });
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
            applyInventoryFilter();
            var modalEl = document.getElementById('newInventoryItemModal');
            if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
                bootstrap.Modal.getInstance(modalEl).hide();
            }
        });
    }

    // Delegated Action Handlers (SKU 360, Adjust Stock, Delete SKU)
    document.addEventListener('click', function (e) {
        var sku360Btn = e.target.closest('.btn-sku-360');
        if (sku360Btn) {
            e.preventDefault();
            var tr360 = sku360Btn.closest('tr');
            if (tr360) window.openSku360Modal(tr360);
            return;
        }

        var delBtn = e.target.closest('.btn-delete-sku');
        if (delBtn) {
            e.preventDefault();
            var trDel = delBtn.closest('tr');
            var skuCode = delBtn.getAttribute('data-sku') || '';
            if (trDel && confirm('Are you sure you want to delete SKU "' + skuCode + '" from the stock ledger?')) {
                allSkuRows = allSkuRows.filter(function (r) { return r !== trDel; });
                trDel.remove();
                applyInventoryFilter();
            }
            return;
        }

        var btn = e.target.closest('.btn-adjust-stock');
        if (!btn) return;
        activeRow = btn.closest('tr');
        document.getElementById('adjSkuLabel').textContent = btn.getAttribute('data-sku') + ' · ' + btn.getAttribute('data-item');
        document.getElementById('adjCurrentQty').textContent = activeRow.querySelector('[data-qty-cell]').textContent.trim();
        if (window.bootstrap) {
            bootstrap.Modal.getOrCreateInstance(document.getElementById('stockAdjustModal')).show();
        }
    });

    // Table Row Click -> opens SKU 360 Modal while safely ignoring Actions dropdown & interactive controls
    if (tableEl) {
        tableEl.addEventListener('click', function (e) {
            if (
                e.target.closest('input, button, select, textarea') ||
                e.target.closest('.btn-table-action') ||
                e.target.closest('.lead-act-btn') ||
                e.target.closest('.dropdown') ||
                e.target.closest('.dropdown-menu') ||
                e.target.closest('.table-action-menu') ||
                e.target.closest('[data-bs-toggle="dropdown"]') ||
                e.target.closest('a:not(.inv-sku-link)')
            ) {
                return;
            }

            var cell = e.target.closest('td');
            if (cell && (cell.querySelector('.btn-table-action, .lead-act-btn, .dropdown') || cell.classList.contains('text-end'))) {
                return;
            }

            var tr = e.target.closest('tr[data-sku]');
            if (tr) {
                e.preventDefault();
                window.openSku360Modal(tr);
            }
        });
    }

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
            activeRow.setAttribute('data-qty', String(next));
            var reorder = parseInt(activeRow.getAttribute('data-reorder') || '10', 10);
            var status = next === 0 ? 'Out of Stock' : (next <= reorder ? 'Low Stock' : 'In Stock');
            activeRow.setAttribute('data-status', status);
            qtyCell.className = 'text-center fw-bold fs-6 ' + (status === 'In Stock' ? 'text-success' : (status === 'Low Stock' ? 'text-warning' : 'text-danger'));
            var badgeClass = status === 'In Stock' ? 'bg-success-subtle text-success border-success-subtle' :
                             (status === 'Low Stock' ? 'bg-warning-subtle text-warning border-warning-subtle' : 'bg-danger-subtle text-danger border-danger-subtle');
            statusCell.innerHTML = '<span class="badge rounded-pill ' + badgeClass + ' border px-2 py-1">' + status + '</span>';
            var modalEl = document.getElementById('stockAdjustModal');
            if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
                bootstrap.Modal.getInstance(modalEl).hide();
            }
            applyInventoryFilter();
        });
    }

    // Filter & Search State
    var currentFilter = 'all';

    function updateFilterBadge() {
        var count = 0;
        var q = (document.getElementById('invSearchInput').value || '').trim();
        var wh = document.getElementById('invWarehouseFilter').value;
        var cat = document.getElementById('invCategoryFilter') ? document.getElementById('invCategoryFilter').value : '';
        if (currentFilter && currentFilter !== 'all') count++;
        if (wh) count++;
        if (cat) count++;
        if (q) count++;

        var badge = document.getElementById('invFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            badge.classList.toggle('d-none', count === 0);
        }
    }

    function applyInventoryFilter() {
        var q = (document.getElementById('invSearchInput').value || '').toLowerCase().trim();
        var wh = document.getElementById('invWarehouseFilter').value;
        var cat = document.getElementById('invCategoryFilter') ? document.getElementById('invCategoryFilter').value : '';
        var matched = [];

        allSkuRows.forEach(function (tr) {
            var st = tr.getAttribute('data-status') || '';
            var rowWh = tr.getAttribute('data-warehouse') || '';
            var rowCat = tr.getAttribute('data-category') || '';
            var text = tr.textContent.toLowerCase();

            var matchStatus = (currentFilter === 'all') || (st === currentFilter);
            var matchWh = !wh || (rowWh === wh);
            var matchCat = !cat || (rowCat === cat);
            var matchQ = !q || text.indexOf(q) !== -1;

            if (matchStatus && matchWh && matchCat && matchQ) {
                tr.style.display = '';
                matched.push(tr);
            }
        });

        tbody.innerHTML = '';
        matched.forEach(function (tr) {
            tbody.appendChild(tr);
        });
        if (tableEl && tableEl.autoTable && typeof tableEl.autoTable.render === 'function') {
            tableEl.autoTable.render();
        }
        updateFilterBadge();
    }

    // Header Status Toggle Pills
    Array.prototype.forEach.call(document.querySelectorAll('.inv-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.inv-filter-btn'), function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            currentFilter = btn.getAttribute('data-filter') || 'all';
            var stSel = document.getElementById('invStatusFilterSelect');
            if (stSel) {
                stSel.value = currentFilter;
                if (window.jQuery && jQuery.fn.select2) jQuery(stSel).trigger('change.select2');
            }
            applyInventoryFilter();
        });
    });

    // Offcanvas Apply Filters
    var applyBtn = document.getElementById('invApplyFilterBtn');
    if (applyBtn) {
        applyBtn.addEventListener('click', function () {
            var stSel = document.getElementById('invStatusFilterSelect');
            if (stSel) {
                currentFilter = stSel.value || 'all';
                Array.prototype.forEach.call(document.querySelectorAll('.inv-filter-btn'), function (b) {
                    b.classList.toggle('active', b.getAttribute('data-filter') === currentFilter);
                });
            }
            applyInventoryFilter();
            var oc = document.getElementById('invFilterOffcanvas');
            if (oc && window.bootstrap && bootstrap.Offcanvas) {
                var inst = bootstrap.Offcanvas.getInstance(oc);
                if (inst) inst.hide();
            }
        });
    }

    // Offcanvas Reset Filters
    var resetBtn = document.getElementById('invResetFilterBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            currentFilter = 'all';
            document.getElementById('invSearchInput').value = '';
            ['invStatusFilterSelect', 'invWarehouseFilter', 'invCategoryFilter'].forEach(function (id) {
                var el = document.getElementById(id);
                if (el) {
                    el.value = id === 'invStatusFilterSelect' ? 'all' : '';
                    if (window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change.select2');
                }
            });
            Array.prototype.forEach.call(document.querySelectorAll('.inv-filter-btn'), function (b) {
                b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
            });
            applyInventoryFilter();
        });
    }
});
</script>

<?php include 'footer.php'; ?>
