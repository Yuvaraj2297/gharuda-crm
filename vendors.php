<?php include 'header.php'; ?>

<main class="vnd-page container-fluid px-0">
    <!-- Page Header & Action Bar in Single Row (lead.php & follow-up-list.php style, no breadcrumb, no stat cards) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;font-size:18px;">
                <i class="bi bi-building-gear"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title fs-4">Vendors &amp; Suppliers Directory</h1>
                <span class="text-muted font-11 d-none d-sm-inline">Manage approved OEM suppliers, GSTIN verification, credit terms, purchase orders &amp; vendor payables</span>
            </div>
        </div>

        <!-- RIGHT: Actions in Single Row -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="vndCatTabs" role="tablist">
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold vnd-filter-btn active" data-filter="all">All Vendors</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold vnd-filter-btn" data-filter="Hardware & Biometrics">Hardware &amp; Biometrics</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold vnd-filter-btn" data-filter="Servers & Cloud">Servers &amp; Cloud</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold vnd-filter-btn" data-filter="Networking & POS">Networking &amp; POS</button>
            </div>

            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="offcanvas" data-bs-target="#vndFilterOffcanvas" aria-controls="vndFilterOffcanvas" id="vndOffcanvasFilterBtn">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="vndFilterCountBadge">0</span>
            </button>

            <div class="dropdown">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                    <i class="bi bi-lightning-charge-fill"></i><span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu" style="min-width: 245px;">
                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Supplier Actions</li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" data-bs-toggle="modal" data-bs-target="#newVendorModal">
                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-building-add"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Onboard New Vendor</div>
                                <div class="text-muted" style="font-size:10px;">Register approved OEM / distributor</div>
                            </div>
                        </button>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="purchase-order-create.php">
                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-bag-plus"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Raise Purchase Order</div>
                                <div class="text-muted" style="font-size:10px;">Create new vendor PO</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="purchase-orders.php">
                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-cart-check"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Purchase Orders (PO)</div>
                                <div class="text-muted" style="font-size:10px;">Track active POs &amp; GRNs</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="inventory.php">
                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-boxes"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Inventory Stock Ledger</div>
                                <div class="text-muted" style="font-size:10px;">Check available warehouse SKUs</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="expenses.php">
                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-receipt"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Vendor Bills &amp; Payables</div>
                                <div class="text-muted" style="font-size:10px;">Settle open vendor invoices</div>
                            </div>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx">
                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-file-earmark-excel"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Download ERP Excel</div>
                                <div class="text-muted" style="font-size:10px;">Export supplier master sheet</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <button type="button" class="btn btn-success btn-sm font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="modal" data-bs-target="#newVendorModal">
                <i class="bi bi-plus-lg"></i><span>New Vendor</span>
            </button>
        </div>
    </div>

    <!-- Vendors Directory Table -->
    <div class="card-custom p-0 mb-4" style="overflow: visible;">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0 datatable" id="vendorsTable" data-table-name="Vendors Directory">
                <thead>
                    <tr>
                        <th class="ps-3" style="width: 60px;">S.No</th>
                        <th>Vendor Code</th>
                        <th>Supplier / Company Name</th>
                        <th>Supply Category</th>
                        <th>Account Manager &amp; Contact</th>
                        <th>GSTIN &amp; City</th>
                        <th>Credit Terms</th>
                        <th class="text-end">Total PO Value</th>
                        <th>Status</th>
                        <th class="text-end pe-3" style="width: 110px;">Action</th>
                    </tr>
                </thead>
                <tbody id="vendorsTableBody">
                    <tr data-code="VND-2026-001" data-name="Matrix Secure Systems Pvt Ltd" data-subtitle="Preferred OEM Partner · Rating: 4.9/5" data-cat="Hardware & Biometrics" data-contact="Kiran Deshmukh" data-phone="+91 98250 44112" data-email="sales@matrixsec.in" data-gstin="24AABCM4412D1Z8" data-city="Vadodara / Chennai" data-terms="Net 30 Days" data-po-val="₹6,85,000" data-status="Approved" data-sku="SKU-HW-102" data-item="Biometric Attendance Terminal Pro" data-qty="25" data-rate="8500">
                        <td class="ps-3">1</td>
                        <td class="fw-bold"><a href="#" class="vnd-code-link" data-code="VND-2026-001">VND-2026-001</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Vendor Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-vnd-360" data-code="VND-2026-001">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-building-gear"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Vendor 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">GSTIN, contact &amp; PO ledger</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=Matrix+Secure+Systems+Pvt+Ltd&amp;sku=SKU-HW-102&amp;item=Biometric+Attendance+Terminal+Pro&amp;qty=25&amp;rate=8500">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise Purchase Order</div>
                                                <div class="text-muted" style="font-size: 10px;">Create new PO for supplier</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-orders.php">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-clock-history"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Purchase Orders</div>
                                                <div class="text-muted" style="font-size: 10px;">Check PO &amp; GRN history</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="expenses.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Record Vendor Bill</div>
                                                <div class="text-muted" style="font-size: 10px;">Log payable in expenses</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="https://wa.me/919825044112" target="_blank">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-whatsapp"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">WhatsApp Account Manager</div>
                                                <div class="text-muted" style="font-size: 10px;">Chat with Kiran Deshmukh</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-vnd" data-code="VND-2026-001">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Remove Vendor</div>
                                                <div class="text-muted" style="font-size: 10px;">Archive supplier record</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-code="VND-2026-002" data-name="Ingram Micro India Pvt Ltd" data-subtitle="Enterprise Tier-1 Distributor · Rating: 4.8/5" data-cat="Servers & Cloud" data-contact="Ananya Sundaram" data-phone="+91 98401 77230" data-email="enterprise@ingrammicro.in" data-gstin="27AAACI1188E1Z2" data-city="Mumbai / Chennai" data-terms="Net 45 Days" data-po-val="₹9,40,000" data-status="Approved" data-sku="SKU-SV-105" data-item="Dell PowerEdge R250 ERP Appliance" data-qty="3" data-rate="115000">
                        <td class="ps-3">2</td>
                        <td class="fw-bold"><a href="#" class="vnd-code-link" data-code="VND-2026-002">VND-2026-002</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Vendor Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-vnd-360" data-code="VND-2026-002">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-building-gear"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Vendor 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">GSTIN, contact &amp; PO ledger</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=Ingram+Micro+India+Pvt+Ltd&amp;sku=SKU-SV-105&amp;item=Dell+PowerEdge+R250+ERP+Appliance&amp;qty=3&amp;rate=115000">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise Purchase Order</div>
                                                <div class="text-muted" style="font-size: 10px;">Create new PO for supplier</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-orders.php">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-clock-history"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Purchase Orders</div>
                                                <div class="text-muted" style="font-size: 10px;">Check PO &amp; GRN history</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="expenses.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Record Vendor Bill</div>
                                                <div class="text-muted" style="font-size: 10px;">Log payable in expenses</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="https://wa.me/919840177230" target="_blank">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-whatsapp"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">WhatsApp Account Manager</div>
                                                <div class="text-muted" style="font-size: 10px;">Chat with Ananya Sundaram</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-vnd" data-code="VND-2026-002">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Remove Vendor</div>
                                                <div class="text-muted" style="font-size: 10px;">Archive supplier record</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-code="VND-2026-003" data-name="Honeywell AutoID India" data-subtitle="Authorized AIDC Supplier · Rating: 4.9/5" data-cat="Networking & POS" data-contact="Siddharth Menon" data-phone="+91 99001 55321" data-email="orders@honeywellaidc.in" data-gstin="29AAACH7721B1Z4" data-city="Bengaluru" data-terms="Net 30 Days" data-po-val="₹4,15,000" data-status="Approved" data-sku="SKU-HW-103" data-item="Industrial Barcode POS Scanner Kit" data-qty="20" data-rate="4200">
                        <td class="ps-3">3</td>
                        <td class="fw-bold"><a href="#" class="vnd-code-link" data-code="VND-2026-003">VND-2026-003</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Vendor Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-vnd-360" data-code="VND-2026-003">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-building-gear"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Vendor 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">GSTIN, contact &amp; PO ledger</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=Honeywell+AutoID+India&amp;sku=SKU-HW-103&amp;item=Industrial+Barcode+POS+Scanner+Kit&amp;qty=20&amp;rate=4200">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise Purchase Order</div>
                                                <div class="text-muted" style="font-size: 10px;">Create new PO for supplier</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-orders.php">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-clock-history"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Purchase Orders</div>
                                                <div class="text-muted" style="font-size: 10px;">Check PO &amp; GRN history</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="expenses.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Record Vendor Bill</div>
                                                <div class="text-muted" style="font-size: 10px;">Log payable in expenses</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="https://wa.me/919900155321" target="_blank">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-whatsapp"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">WhatsApp Account Manager</div>
                                                <div class="text-muted" style="font-size: 10px;">Chat with Siddharth Menon</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-vnd" data-code="VND-2026-003">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Remove Vendor</div>
                                                <div class="text-muted" style="font-size: 10px;">Archive supplier record</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-code="VND-2026-004" data-name="Netgear Enterprise Distribution" data-subtitle="Commercial Switching Partner · Rating: 4.7/5" data-cat="Networking & POS" data-contact="Prakash Rajagopal" data-phone="+91 98412 88901" data-email="b2b@netgear-india.com" data-gstin="33AABCN9920K1Z1" data-city="Chennai" data-terms="Net 15 Days" data-po-val="₹4,20,000" data-status="Approved" data-sku="SKU-NW-104" data-item="Managed PoE 24-Port Gigabit Switch" data-qty="15" data-rate="18900">
                        <td class="ps-3">4</td>
                        <td class="fw-bold"><a href="#" class="vnd-code-link" data-code="VND-2026-004">VND-2026-004</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Vendor Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-vnd-360" data-code="VND-2026-004">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-building-gear"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Vendor 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">GSTIN, contact &amp; PO ledger</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=Netgear+Enterprise+Distribution&amp;sku=SKU-NW-104&amp;item=Managed+PoE+24-Port+Gigabit+Switch&amp;qty=15&amp;rate=18900">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise Purchase Order</div>
                                                <div class="text-muted" style="font-size: 10px;">Create new PO for supplier</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-orders.php">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-clock-history"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Purchase Orders</div>
                                                <div class="text-muted" style="font-size: 10px;">Check PO &amp; GRN history</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="expenses.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Record Vendor Bill</div>
                                                <div class="text-muted" style="font-size: 10px;">Log payable in expenses</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="https://wa.me/919841288901" target="_blank">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-whatsapp"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">WhatsApp Account Manager</div>
                                                <div class="text-muted" style="font-size: 10px;">Chat with Prakash Rajagopal</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-vnd" data-code="VND-2026-004">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Remove Vendor</div>
                                                <div class="text-muted" style="font-size: 10px;">Archive supplier record</div>
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

<!-- ===== Vendors Filter Offcanvas (lead.php & follow-up-list.php style) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="vndFilterOffcanvas" aria-labelledby="vndFilterOffcanvasLabel" style="width: 380px;">
    <div class="offcanvas-header border-bottom py-3 px-3">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2 mb-0" id="vndFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Vendors &amp; Suppliers
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="vndCatFilterSelect">Supply Category</label>
            <select class="form-select select2 form-select-sm" id="vndCatFilterSelect">
                <option value="all">All Categories</option>
                <option value="Hardware & Biometrics">Hardware &amp; Biometrics</option>
                <option value="Servers & Cloud">Servers &amp; Cloud</option>
                <option value="Networking & POS">Networking &amp; POS</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="vndTermsFilterSelect">Credit / Payment Terms</label>
            <select class="form-select select2 form-select-sm" id="vndTermsFilterSelect">
                <option value="">All Credit Terms</option>
                <option value="Net 15 Days">Net 15 Days</option>
                <option value="Net 30 Days">Net 30 Days</option>
                <option value="Net 45 Days">Net 45 Days</option>
                <option value="100% Advance">100% Advance</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="vndCityFilterSelect">Dispatch City / Hub</label>
            <select class="form-select select2 form-select-sm" id="vndCityFilterSelect">
                <option value="">All Cities</option>
                <option value="Chennai">Chennai</option>
                <option value="Bengaluru">Bengaluru</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Vadodara">Vadodara</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="vendorSearchInput">Keyword / GSTIN / Contact</label>
            <input type="text" class="form-control form-control-sm" id="vendorSearchInput" placeholder="Search vendor, GSTIN, contact...">
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2 bg-light-subtle">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" id="vndResetFilterBtn">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" id="vndApplyFilterBtn">
            <i class="bi bi-funnel me-1"></i> Apply Filters
        </button>
    </div>
</div>

<!-- ===== Vendor 360° Overview Modal ===== -->
<div class="modal fade" id="vndDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-building-gear fs-5"></i>
                    </span>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-5" id="vndModalName">Matrix Secure Systems Pvt Ltd</h5>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5" id="vndModalStatus">Approved</span>
                        </div>
                        <div class="small text-muted" id="vndModalCodeSubtitle">VND-2026-001 &middot; Preferred OEM Partner</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-white">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Total PO Volume</span>
                            <h6 class="fw-bold text-success mb-0 fs-6" id="vndModalPoVal">₹0</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Credit Terms</span>
                            <h6 class="fw-bold text-primary mb-0 fs-6" id="vndModalTerms">Net 30 Days</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Supply Category</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6 text-truncate" id="vndModalCat">—</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Dispatch Hub</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6 text-truncate" id="vndModalCity">—</h6>
                        </div>
                    </div>
                </div>

                <div class="card border border-light-subtle rounded-3 p-3 mb-4">
                    <h6 class="fw-bold text-dark mb-3 font-13 text-uppercase" style="letter-spacing:0.5px;">
                        <i class="bi bi-person-vcard text-primary me-1.5"></i>Tax &amp; Account Manager Details
                    </h6>
                    <div class="row g-3 font-13">
                        <div class="col-sm-6">
                            <div class="text-muted small">Vendor GSTIN</div>
                            <div class="fw-semibold text-dark mt-0.5" id="vndModalGstin">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Account Manager</div>
                            <div class="fw-semibold text-dark mt-0.5" id="vndModalContact">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Mobile / WhatsApp</div>
                            <div class="fw-semibold text-dark mt-0.5" id="vndModalPhone">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Order Desk Email</div>
                            <div class="fw-semibold text-dark mt-0.5" id="vndModalEmail">—</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">
                    <span class="text-muted small fw-semibold">Quick Actions:</span>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <a href="purchase-order-create.php" id="vndModalRaisePoBtn" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-cart-plus"></i> Raise Purchase Order
                        </a>
                        <a href="purchase-orders.php" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-clock-history"></i> View PO Ledger
                        </a>
                        <a href="expenses.php" class="btn btn-sm btn-outline-info d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-receipt"></i> Record Bill
                        </a>
                        <a href="#" id="vndModalWhatsappBtn" target="_blank" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-whatsapp"></i> WhatsApp
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
    var tableEl = document.getElementById('vendorsTable');
    var allVendorRows = Array.from(tbody.querySelectorAll('tr[data-code]'));

    function buildVendorActionMenuHtml(v) {
        var safeCode = String(v.code || 'VND-NEW').replace(/"/g, '&quot;');
        var encName = encodeURIComponent(v.name || '');
        var cleanPhone = String(v.phone || '919840012345').replace(/[^0-9]/g, '');
        return '<div class="dropdown">' +
            '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                '<span>Actions</span>' +
            '</button>' +
            '<ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">' +
                '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Vendor Actions</li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-vnd-360" data-code="' + safeCode + '"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-building-gear"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Vendor 360° Overview</div><div class="text-muted" style="font-size: 10px;">GSTIN, contact &amp; PO ledger</div></div></button></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=' + encName + '"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-cart-plus"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Raise Purchase Order</div><div class="text-muted" style="font-size: 10px;">Create new PO for supplier</div></div></a></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-orders.php"><span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-clock-history"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">View Purchase Orders</div><div class="text-muted" style="font-size: 10px;">Check PO &amp; GRN history</div></div></a></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="expenses.php"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-receipt"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Record Vendor Bill</div><div class="text-muted" style="font-size: 10px;">Log payable in expenses</div></div></a></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="https://wa.me/' + cleanPhone + '" target="_blank"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-whatsapp"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">WhatsApp Account Manager</div><div class="text-muted" style="font-size: 10px;">Chat with ' + (v.contact || 'Account Manager') + '</div></div></a></li>' +
                '<li><hr class="dropdown-divider my-1"></li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-vnd" data-code="' + safeCode + '"><span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span><div class="text-start"><div class="fw-semibold text-danger font-12">Remove Vendor</div><div class="text-muted" style="font-size: 10px;">Archive supplier record</div></div></button></li>' +
            '</ul>' +
        '</div>';
    }

    function appendVendorRow(v) {
        var tr = document.createElement('tr');
        tr.setAttribute('data-code', v.code || 'VND-2026-NEW');
        tr.setAttribute('data-name', v.name || 'Approved Supplier');
        tr.setAttribute('data-subtitle', 'Onboarded Supplier · Bank Verified');
        tr.setAttribute('data-cat', v.category || 'Hardware & Biometrics');
        tr.setAttribute('data-contact', v.contact || 'Sales Desk');
        tr.setAttribute('data-phone', v.phone || '+91 98400 00000');
        tr.setAttribute('data-email', v.email || 'orders@vendor.in');
        tr.setAttribute('data-gstin', v.gstin || '33AAACR5512H1Z9');
        tr.setAttribute('data-city', v.city || 'Chennai');
        tr.setAttribute('data-terms', v.terms || 'Net 30 Days');
        tr.setAttribute('data-po-val', '₹0');
        tr.setAttribute('data-status', 'Approved');

        tr.innerHTML =
            '<td class="ps-3">1</td>' +
            '<td class="fw-bold"><a href="#" class="vnd-code-link" data-code="' + (v.code || 'VND-2026-NEW') + '">' + (v.code || 'VND-2026-NEW') + '</a></td>' +
            '<td><div class="fw-bold text-dark">' + (v.name || 'Approved Supplier') + '</div><div class="small text-muted">Onboarded Supplier &middot; Bank Verified</div></td>' +
            '<td><span class="badge bg-light text-dark border">' + (v.category || 'Hardware & Biometrics') + '</span></td>' +
            '<td><div class="fw-semibold text-dark">' + (v.contact || 'Sales Desk') + '</div><div class="small text-muted">' + (v.phone || '+91 98400 00000') + ' &middot; ' + (v.email || 'orders@vendor.in') + '</div></td>' +
            '<td><div class="small fw-semibold text-dark">' + (v.gstin || '33AAACR5512H1Z9') + '</div><div class="small text-muted">' + (v.city || 'Chennai') + '</div></td>' +
            '<td><span class="badge bg-info-subtle text-info border border-info-subtle">' + (v.terms || 'Net 30 Days') + '</span></td>' +
            '<td class="text-end fw-bold text-dark">₹0</td>' +
            '<td><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Approved</span></td>' +
            '<td class="text-end pe-3">' + buildVendorActionMenuHtml(v) + '</td>';

        tbody.insertBefore(tr, tbody.firstChild);
        allVendorRows.unshift(tr);
    }

    try {
        var savedVnds = JSON.parse(localStorage.getItem('gh_new_vendors') || '[]');
        savedVnds.forEach(appendVendorRow);
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

    // Vendor 360 Overview Modal
    window.openVendor360Modal = function (tr) {
        if (!tr) return;
        var code = tr.getAttribute('data-code') || '';
        var name = tr.getAttribute('data-name') || '';
        var subtitle = tr.getAttribute('data-subtitle') || 'Approved Supplier';
        var cat = tr.getAttribute('data-cat') || '—';
        var contact = tr.getAttribute('data-contact') || '—';
        var phone = tr.getAttribute('data-phone') || '—';
        var email = tr.getAttribute('data-email') || '—';
        var gstin = tr.getAttribute('data-gstin') || '—';
        var city = tr.getAttribute('data-city') || '—';
        var terms = tr.getAttribute('data-terms') || 'Net 30 Days';
        var poVal = tr.getAttribute('data-po-val') || '₹0';
        var status = tr.getAttribute('data-status') || 'Approved';

        var setTxt = function (id, val) {
            var el = document.getElementById(id);
            if (el) el.textContent = val;
        };
        setTxt('vndModalName', name);
        setTxt('vndModalStatus', status);
        setTxt('vndModalCodeSubtitle', code + ' · ' + subtitle);
        setTxt('vndModalPoVal', poVal);
        setTxt('vndModalTerms', terms);
        setTxt('vndModalCat', cat);
        setTxt('vndModalCity', city);
        setTxt('vndModalGstin', gstin);
        setTxt('vndModalContact', contact);
        setTxt('vndModalPhone', phone);
        setTxt('vndModalEmail', email);

        var raisePoBtn = document.getElementById('vndModalRaisePoBtn');
        if (raisePoBtn) {
            var url = 'purchase-order-create.php?vendor=' + encodeURIComponent(name);
            var sku = tr.getAttribute('data-sku');
            var item = tr.getAttribute('data-item');
            var qty = tr.getAttribute('data-qty');
            var rate = tr.getAttribute('data-rate');
            if (sku) url += '&sku=' + encodeURIComponent(sku);
            if (item) url += '&item=' + encodeURIComponent(item);
            if (qty) url += '&qty=' + encodeURIComponent(qty);
            if (rate) url += '&rate=' + encodeURIComponent(rate);
            raisePoBtn.href = url;
        }

        var waBtn = document.getElementById('vndModalWhatsappBtn');
        if (waBtn) {
            var cleanPhone = String(phone).replace(/[^0-9]/g, '') || '919840012345';
            waBtn.href = 'https://wa.me/' + cleanPhone;
        }

        var modalEl = document.getElementById('vndDetailModal');
        if (modalEl && window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    };

    // Delegated Action Handlers (Vendor 360 & Delete Vendor)
    document.addEventListener('click', function (e) {
        var vnd360Btn = e.target.closest('.btn-vnd-360');
        if (vnd360Btn) {
            e.preventDefault();
            var tr360 = vnd360Btn.closest('tr');
            if (tr360) window.openVendor360Modal(tr360);
            return;
        }

        var delBtn = e.target.closest('.btn-delete-vnd');
        if (delBtn) {
            e.preventDefault();
            var trDel = delBtn.closest('tr');
            var vCode = delBtn.getAttribute('data-code') || '';
            if (trDel && confirm('Are you sure you want to remove vendor "' + vCode + '"?')) {
                allVendorRows = allVendorRows.filter(function (r) { return r !== trDel; });
                trDel.remove();
                filterVendors();
            }
        }
    });

    // Table Row Click -> opens Vendor 360 Modal while safely ignoring Actions dropdown & interactive controls
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
                e.target.closest('a:not(.vnd-code-link)')
            ) {
                return;
            }

            var cell = e.target.closest('td');
            if (cell && (cell.querySelector('.btn-table-action, .lead-act-btn, .dropdown') || cell.classList.contains('text-end'))) {
                return;
            }

            var tr = e.target.closest('tr[data-code]');
            if (tr) {
                e.preventDefault();
                window.openVendor360Modal(tr);
            }
        });
    }

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
        filterVendors();
        var modalEl = document.getElementById('newVendorModal');
        if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
            bootstrap.Modal.getInstance(modalEl).hide();
        }
    }

    document.getElementById('saveVendorBtn').addEventListener('click', function () { persistVendor(false); });
    document.getElementById('saveAndRaisePoBtn').addEventListener('click', function () { persistVendor(true); });

    // Filter & Search State
    var curCat = 'all';

    function updateFilterBadge() {
        var count = 0;
        var q = (document.getElementById('vendorSearchInput').value || '').trim();
        var terms = document.getElementById('vndTermsFilterSelect') ? document.getElementById('vndTermsFilterSelect').value : '';
        var city = document.getElementById('vndCityFilterSelect') ? document.getElementById('vndCityFilterSelect').value : '';
        if (curCat && curCat !== 'all') count++;
        if (terms) count++;
        if (city) count++;
        if (q) count++;

        var badge = document.getElementById('vndFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            badge.classList.toggle('d-none', count === 0);
        }
    }

    function filterVendors() {
        var q = (document.getElementById('vendorSearchInput').value || '').toLowerCase().trim();
        var terms = document.getElementById('vndTermsFilterSelect') ? document.getElementById('vndTermsFilterSelect').value : '';
        var city = document.getElementById('vndCityFilterSelect') ? document.getElementById('vndCityFilterSelect').value.toLowerCase() : '';
        var matched = [];

        allVendorRows.forEach(function (tr) {
            var c = tr.getAttribute('data-cat') || '';
            var rowTerms = tr.getAttribute('data-terms') || '';
            var rowCity = (tr.getAttribute('data-city') || '').toLowerCase();
            var text = tr.textContent.toLowerCase();

            var matchC = (curCat === 'all') || (c === curCat);
            var matchTerms = !terms || (rowTerms === terms);
            var matchCity = !city || (rowCity.indexOf(city) !== -1);
            var matchQ = !q || text.indexOf(q) !== -1;

            if (matchC && matchTerms && matchCity && matchQ) {
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

    // Header Category Toggle Pills
    Array.prototype.forEach.call(document.querySelectorAll('.vnd-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.vnd-filter-btn'), function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            curCat = btn.getAttribute('data-filter') || 'all';
            var catSel = document.getElementById('vndCatFilterSelect');
            if (catSel) {
                catSel.value = curCat;
                if (window.jQuery && jQuery.fn.select2) jQuery(catSel).trigger('change.select2');
            }
            filterVendors();
        });
    });

    // Offcanvas Apply Filters
    var applyBtn = document.getElementById('vndApplyFilterBtn');
    if (applyBtn) {
        applyBtn.addEventListener('click', function () {
            var catSel = document.getElementById('vndCatFilterSelect');
            if (catSel) {
                curCat = catSel.value || 'all';
                Array.prototype.forEach.call(document.querySelectorAll('.vnd-filter-btn'), function (b) {
                    b.classList.toggle('active', b.getAttribute('data-filter') === curCat);
                });
            }
            filterVendors();
            var oc = document.getElementById('vndFilterOffcanvas');
            if (oc && window.bootstrap && bootstrap.Offcanvas) {
                var inst = bootstrap.Offcanvas.getInstance(oc);
                if (inst) inst.hide();
            }
        });
    }

    // Offcanvas Reset Filters
    var resetBtn = document.getElementById('vndResetFilterBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            curCat = 'all';
            document.getElementById('vendorSearchInput').value = '';
            ['vndCatFilterSelect', 'vndTermsFilterSelect', 'vndCityFilterSelect'].forEach(function (id) {
                var el = document.getElementById(id);
                if (el) {
                    el.value = id === 'vndCatFilterSelect' ? 'all' : '';
                    if (window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change.select2');
                }
            });
            Array.prototype.forEach.call(document.querySelectorAll('.vnd-filter-btn'), function (b) {
                b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
            });
            filterVendors();
        });
    }
});
</script>

<?php include 'footer.php'; ?>
