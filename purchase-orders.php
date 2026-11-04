<?php include 'header.php'; ?>

<main class="po-page container-fluid px-0">
    <!-- Page Header & Action Bar in Single Row (lead.php & follow-up-list.php style, no breadcrumb, no stat cards) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;font-size:18px;">
                <i class="bi bi-cart-check"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title fs-4">Purchase Orders (PO) &amp; Procurement</h1>
                <span class="text-muted font-11 d-none d-sm-inline">Manage vendor purchase orders, inward GRN verification, warehouse deliveries &amp; supplier payables</span>
            </div>
        </div>

        <!-- RIGHT: Actions in Single Row -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="poStatusTabs" role="tablist">
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold po-filter-btn active" data-filter="all">All POs</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold po-filter-btn" data-filter="Issued">Issued / In-Transit</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold po-filter-btn" data-filter="Received (GRN)">Received (GRN)</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold po-filter-btn" data-filter="Pending Approval">Pending Approval</button>
            </div>

            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="offcanvas" data-bs-target="#poFilterOffcanvas" aria-controls="poFilterOffcanvas" id="poOffcanvasFilterBtn">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="poFilterCountBadge">0</span>
            </button>

            <div class="dropdown">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                    <i class="bi bi-lightning-charge-fill"></i><span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu" style="min-width: 245px;">
                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Procurement Actions</li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="purchase-order-create.php">
                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-plus-lg"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Create Purchase Order</div>
                                <div class="text-muted" style="font-size:10px;">Issue new vendor PO</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="inventory.php">
                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-boxes"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Inventory Stock Ledger</div>
                                <div class="text-muted" style="font-size:10px;">Check available warehouse SKUs</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="vendors.php">
                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-building-gear"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Vendors Directory (14)</div>
                                <div class="text-muted" style="font-size:10px;">Manage approved suppliers</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="expenses.php">
                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-receipt"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Vendor Bills &amp; Payables</div>
                                <div class="text-muted" style="font-size:10px;">Track procurement expenses</div>
                            </div>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx">
                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-file-earmark-excel"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Download ERP Excel</div>
                                <div class="text-muted" style="font-size:10px;">Export procurement sheet</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <a href="purchase-order-create.php" class="btn btn-success btn-sm font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs">
                <i class="bi bi-plus-lg"></i><span>New PO</span>
            </a>
        </div>
    </div>

    <!-- Purchase Orders Table -->
    <div class="card-custom p-0 mb-4" style="overflow: visible;">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0 datatable" id="poTable" data-table-name="Purchase Orders">
                <thead>
                    <tr>
                        <th class="ps-3" style="width: 60px;">S.No</th>
                        <th>PO Number</th>
                        <th>Vendor / Supplier</th>
                        <th>Primary SKU / Description</th>
                        <th>Delivery Warehouse</th>
                        <th>Order Date</th>
                        <th>Expected Date</th>
                        <th class="text-end">Total (Inc. GST)</th>
                        <th>GRN / PO Status</th>
                        <th class="text-end pe-3" style="width: 110px;">Action</th>
                    </tr>
                </thead>
                <tbody id="poTableBody">
                    <tr data-po="PO-2026-044" data-vendor="Matrix Secure Systems Pvt Ltd" data-gstin="24AABCM4412D1Z8" data-item="Biometric Attendance Terminal Pro (25 Units)" data-sku="SKU-HW-102" data-warehouse="Chennai HQ" data-order-date="24-10-2026" data-expected-date="31-10-2026" data-total="₹2,50,750" data-status="Issued">
                        <td class="ps-3">1</td>
                        <td class="fw-bold"><a href="#" class="po-num-link" data-po="PO-2026-044">PO-2026-044</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">PO Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-po-360" data-po="PO-2026-044">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-spreadsheet"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">PO 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Order summary, GST &amp; GRN log</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li data-grn-action-li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-receive-grn" data-po="PO-2026-044" data-vendor="Matrix Secure Systems Pvt Ltd" data-item="Biometric Attendance Terminal Pro (25 Units)">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-box-arrow-in-down"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Receive Goods (GRN)</div>
                                                <div class="text-muted" style="font-size: 10px;">Confirm inward &amp; update stock</div>
                                            </div>
                                        </button>
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
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=Matrix+Secure+Systems+Pvt+Ltd&amp;sku=SKU-HW-102">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-arrow-repeat"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Repeat / Reorder PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Create new PO for vendor</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-po" data-po="PO-2026-044">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove purchase order</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-po="PO-2026-043" data-vendor="Ingram Micro India Pvt Ltd" data-gstin="27AAACI1188E1Z2" data-item="Dell PowerEdge R250 On-Prem ERP Appliance (3 Units)" data-sku="SKU-SV-105" data-warehouse="Chennai HQ" data-order-date="21-10-2026" data-expected-date="29-10-2026" data-total="₹4,07,100" data-status="Issued">
                        <td class="ps-3">2</td>
                        <td class="fw-bold"><a href="#" class="po-num-link" data-po="PO-2026-043">PO-2026-043</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">PO Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-po-360" data-po="PO-2026-043">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-spreadsheet"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">PO 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Order summary, GST &amp; GRN log</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li data-grn-action-li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-receive-grn" data-po="PO-2026-043" data-vendor="Ingram Micro India Pvt Ltd" data-item="Dell PowerEdge R250 ERP Appliance (3 Units)">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-box-arrow-in-down"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Receive Goods (GRN)</div>
                                                <div class="text-muted" style="font-size: 10px;">Confirm inward &amp; update stock</div>
                                            </div>
                                        </button>
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
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=Ingram+Micro+India+Pvt+Ltd&amp;sku=SKU-SV-105">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-arrow-repeat"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Repeat / Reorder PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Create new PO for vendor</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-po" data-po="PO-2026-043">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove purchase order</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-po="PO-2026-042" data-vendor="Honeywell AutoID India" data-gstin="29AAACH7721B1Z4" data-item="Industrial Barcode &amp; POS Scanner Kit (30 Units)" data-sku="SKU-HW-103" data-warehouse="Bengaluru Hub" data-order-date="14-10-2026" data-expected-date="19-10-2026" data-total="₹1,48,680" data-status="Received (GRN)">
                        <td class="ps-3">3</td>
                        <td class="fw-bold"><a href="#" class="po-num-link" data-po="PO-2026-042">PO-2026-042</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">PO Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-po-360" data-po="PO-2026-042">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-spreadsheet"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">PO 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Order summary, GST &amp; GRN log</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li data-grn-action-li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="inventory.php">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-check2-circle"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View In-Stock Ledger</div>
                                                <div class="text-muted" style="font-size: 10px;">GRN verified &amp; synced</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="expenses.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Vendor Payment</div>
                                                <div class="text-muted" style="font-size: 10px;">Check bill settlement</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=Honeywell+AutoID+India&amp;sku=SKU-HW-103">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-arrow-repeat"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Repeat / Reorder PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Create new PO for vendor</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-po" data-po="PO-2026-042">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove purchase order</div>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-po="PO-2026-041" data-vendor="Netgear Enterprise Distribution" data-gstin="33AABCN9920K1Z1" data-item="Managed PoE+ 24-Port Gigabit Rack Switch (12 Units)" data-sku="SKU-NW-104" data-warehouse="Chennai HQ" data-order-date="08-10-2026" data-expected-date="12-10-2026" data-total="₹2,67,624" data-status="Received (GRN)">
                        <td class="ps-3">4</td>
                        <td class="fw-bold"><a href="#" class="po-num-link" data-po="PO-2026-041">PO-2026-041</a></td>
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
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">PO Actions</li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-po-360" data-po="PO-2026-041">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-spreadsheet"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">PO 360° Overview</div>
                                                <div class="text-muted" style="font-size: 10px;">Order summary, GST &amp; GRN log</div>
                                            </div>
                                        </button>
                                    </li>
                                    <li data-grn-action-li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="inventory.php">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-check2-circle"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View In-Stock Ledger</div>
                                                <div class="text-muted" style="font-size: 10px;">GRN verified &amp; synced</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="expenses.php">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View Vendor Payment</div>
                                                <div class="text-muted" style="font-size: 10px;">Check bill settlement</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=Netgear+Enterprise+Distribution&amp;sku=SKU-NW-104">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-arrow-repeat"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Repeat / Reorder PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Create new PO for vendor</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-po" data-po="PO-2026-041">
                                            <span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-danger font-12">Delete PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Remove purchase order</div>
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

<!-- ===== Purchase Orders Filter Offcanvas (lead.php & follow-up-list.php style) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="poFilterOffcanvas" aria-labelledby="poFilterOffcanvasLabel" style="width: 380px;">
    <div class="offcanvas-header border-bottom py-3 px-3">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2 mb-0" id="poFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Purchase Orders
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="poStatusFilterSelect">PO / GRN Status</label>
            <select class="form-select select2 form-select-sm" id="poStatusFilterSelect">
                <option value="all">All PO Statuses</option>
                <option value="Issued">Issued / In-Transit</option>
                <option value="Received (GRN)">Received (GRN)</option>
                <option value="Pending Approval">Pending Approval</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="poVendorFilter">Vendor / Supplier</label>
            <select class="form-select select2 form-select-sm" id="poVendorFilter">
                <option value="">All Vendors</option>
                <option value="Matrix Secure Systems Pvt Ltd">Matrix Secure Systems Pvt Ltd</option>
                <option value="Ingram Micro India Pvt Ltd">Ingram Micro India Pvt Ltd</option>
                <option value="Honeywell AutoID India">Honeywell AutoID India</option>
                <option value="Netgear Enterprise Distribution">Netgear Enterprise Distribution</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="poWarehouseFilter">Delivery Warehouse</label>
            <select class="form-select select2 form-select-sm" id="poWarehouseFilter">
                <option value="">All Warehouses</option>
                <option value="Chennai HQ">Chennai HQ</option>
                <option value="Bengaluru Hub">Bengaluru Hub</option>
                <option value="Cloud Pool">Cloud Pool</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="poSearchInput">Keyword / PO # / SKU</label>
            <input type="text" class="form-control form-control-sm" id="poSearchInput" placeholder="Search PO #, vendor, SKU...">
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2 bg-light-subtle">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" id="poResetFilterBtn">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" id="poApplyFilterBtn">
            <i class="bi bi-funnel me-1"></i> Apply Filters
        </button>
    </div>
</div>

<!-- ===== PO 360° Overview Modal ===== -->
<div class="modal fade" id="poDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-cart-check fs-5"></i>
                    </span>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-5" id="poModalNumber">PO-2026-044</h5>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill font-11 px-2.5 py-0.5" id="poModalStatus">Issued</span>
                        </div>
                        <div class="small text-muted" id="poModalVendorSubtitle">Vendor &amp; Procurement Details</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-white">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Total PO Value</span>
                            <h6 class="fw-bold text-success mb-0 fs-6" id="poModalTotal">₹0</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Primary SKU</span>
                            <h6 class="fw-bold text-primary mb-0 fs-6 text-truncate" id="poModalSku">—</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Order Date</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="poModalOrderDate">—</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Expected Delivery</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="poModalExpectedDate">—</h6>
                        </div>
                    </div>
                </div>

                <div class="card border border-light-subtle rounded-3 p-3 mb-4">
                    <h6 class="fw-bold text-dark mb-3 font-13 text-uppercase" style="letter-spacing:0.5px;">
                        <i class="bi bi-building-gear text-primary me-1.5"></i>Supplier &amp; Delivery Information
                    </h6>
                    <div class="row g-3 font-13">
                        <div class="col-sm-6">
                            <div class="text-muted small">Supplier / Vendor Name</div>
                            <div class="fw-semibold text-dark mt-0.5" id="poModalVendor">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Vendor GSTIN</div>
                            <div class="fw-semibold text-dark mt-0.5" id="poModalGstin">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Ordered Item Description</div>
                            <div class="fw-semibold text-dark mt-0.5" id="poModalItem">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Delivery Warehouse</div>
                            <div class="fw-semibold text-dark mt-0.5" id="poModalWarehouse">—</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">
                    <span class="text-muted small fw-semibold">Quick Actions:</span>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="button" class="btn btn-sm btn-success d-inline-flex align-items-center gap-1.5 fw-semibold font-12" id="poModalReceiveGrnBtn">
                            <i class="bi bi-box-arrow-in-down"></i> Receive Goods (GRN)
                        </button>
                        <a href="expenses.php" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-receipt"></i> Record Vendor Bill
                        </a>
                        <a href="#" id="poModalReorderBtn" class="btn btn-sm btn-outline-warning d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-arrow-repeat"></i> Repeat PO
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
    var tableEl = document.getElementById('poTable');
    var activePoRow = null;
    var allPoRows = [];

    function buildPoActionMenuHtml(poNo, vendor, item, sku, isRec) {
        var safePo = String(poNo || '').replace(/"/g, '&quot;');
        var safeVendor = String(vendor || '').replace(/"/g, '&quot;');
        var safeItem = String(item || '').replace(/"/g, '&quot;');
        var encVendor = encodeURIComponent(vendor || '');
        var encSku = encodeURIComponent(sku || '');

        var grnItem = isRec
            ? '<li data-grn-action-li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="inventory.php"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-check2-circle"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">View In-Stock Ledger</div><div class="text-muted" style="font-size: 10px;">GRN verified &amp; synced</div></div></a></li>'
            : '<li data-grn-action-li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-receive-grn" data-po="' + safePo + '" data-vendor="' + safeVendor + '" data-item="' + safeItem + '"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-box-arrow-in-down"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Receive Goods (GRN)</div><div class="text-muted" style="font-size: 10px;">Confirm inward &amp; update stock</div></div></button></li>';

        return '<div class="dropdown">' +
            '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                '<span>Actions</span>' +
            '</button>' +
            '<ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">' +
                '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">PO Actions</li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-po-360" data-po="' + safePo + '"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-file-earmark-spreadsheet"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">PO 360° Overview</div><div class="text-muted" style="font-size: 10px;">Order summary, GST &amp; GRN log</div></div></button></li>' +
                grnItem +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="expenses.php"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-receipt"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Record Vendor Bill</div><div class="text-muted" style="font-size: 10px;">Log payable in expenses</div></div></a></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="purchase-order-create.php?vendor=' + encVendor + '&sku=' + encSku + '"><span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-arrow-repeat"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Repeat / Reorder PO</div><div class="text-muted" style="font-size: 10px;">Create new PO for vendor</div></div></a></li>' +
                '<li><hr class="dropdown-divider my-1"></li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-po" data-po="' + safePo + '"><span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span><div class="text-start"><div class="fw-semibold text-danger font-12">Delete PO</div><div class="text-muted" style="font-size: 10px;">Remove purchase order</div></div></button></li>' +
            '</ul>' +
        '</div>';
    }

    // Initialize master row list and load newly created POs from localStorage
    allPoRows = Array.from(tbody.querySelectorAll('tr[data-po]'));
    try {
        var savedPos = JSON.parse(localStorage.getItem('gh_new_pos') || '[]');
        savedPos.forEach(function (p) {
            var st = p.status || 'Issued';
            var isRec = st === 'Received (GRN)';
            var badgeClass = isRec ? 'bg-success-subtle text-success border-success-subtle' : 'bg-warning-subtle text-warning border-warning-subtle';
            var tr = document.createElement('tr');
            tr.setAttribute('data-po', p.poNo || 'PO-NEW');
            tr.setAttribute('data-vendor', p.vendor || 'Approved Vendor');
            tr.setAttribute('data-gstin', p.gstin || '33AABCG4421A1Z5');
            tr.setAttribute('data-item', p.summary || 'Hardware / License Order');
            tr.setAttribute('data-sku', p.sku || 'Multiple');
            tr.setAttribute('data-warehouse', p.warehouse || 'Chennai HQ');
            tr.setAttribute('data-order-date', p.orderDate || '29-10-2026');
            tr.setAttribute('data-expected-date', p.expectedDate || '05-11-2026');
            tr.setAttribute('data-total', p.total || '₹0');
            tr.setAttribute('data-status', st);

            tr.innerHTML =
                '<td class="ps-3">1</td>' +
                '<td class="fw-bold"><a href="#" class="po-num-link" data-po="' + (p.poNo || 'PO-NEW') + '">' + (p.poNo || 'PO-NEW') + '</a></td>' +
                '<td><div class="fw-bold text-dark">' + (p.vendor || 'Approved Vendor') + '</div><div class="small text-muted">GSTIN: ' + (p.gstin || '33AABCG4421A1Z5') + '</div></td>' +
                '<td><div class="fw-semibold text-dark">' + (p.summary || 'Hardware / License Order') + '</div><div class="small text-muted">SKU: ' + (p.sku || 'Multiple') + '</div></td>' +
                '<td><span class="small fw-semibold">' + (p.warehouse || 'Chennai HQ') + '</span></td>' +
                '<td class="small text-muted">' + (p.orderDate || '29-10-2026') + '</td>' +
                '<td class="small fw-semibold text-dark">' + (p.expectedDate || '05-11-2026') + '</td>' +
                '<td class="text-end fw-bold text-dark">' + (p.total || '₹0') + '</td>' +
                '<td data-po-status-cell><span class="badge rounded-pill ' + badgeClass + ' border px-2 py-1">' + st + '</span></td>' +
                '<td class="text-end pe-3">' + buildPoActionMenuHtml(p.poNo, p.vendor, p.summary, p.sku, isRec) + '</td>';

            tbody.insertBefore(tr, tbody.firstChild);
            allPoRows.unshift(tr);
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

    // PO 360 Overview Modal
    window.openPo360Modal = function (tr) {
        if (!tr) return;
        activePoRow = tr;
        var poNo = tr.getAttribute('data-po') || '';
        var vendor = tr.getAttribute('data-vendor') || '';
        var gstin = tr.getAttribute('data-gstin') || '—';
        var item = tr.getAttribute('data-item') || '—';
        var sku = tr.getAttribute('data-sku') || '—';
        var warehouse = tr.getAttribute('data-warehouse') || 'Chennai HQ';
        var orderDate = tr.getAttribute('data-order-date') || '—';
        var expectedDate = tr.getAttribute('data-expected-date') || '—';
        var total = tr.getAttribute('data-total') || '₹0';
        var status = tr.getAttribute('data-status') || 'Issued';

        var setTxt = function (id, val) {
            var el = document.getElementById(id);
            if (el) el.textContent = val;
        };
        setTxt('poModalNumber', poNo);
        setTxt('poModalVendorSubtitle', vendor + ' · Delivery: ' + warehouse);
        setTxt('poModalTotal', total);
        setTxt('poModalSku', sku);
        setTxt('poModalOrderDate', orderDate);
        setTxt('poModalExpectedDate', expectedDate);
        setTxt('poModalVendor', vendor);
        setTxt('poModalGstin', gstin);
        setTxt('poModalItem', item);
        setTxt('poModalWarehouse', warehouse);

        var stBadge = document.getElementById('poModalStatus');
        if (stBadge) {
            stBadge.textContent = status;
            stBadge.className = status === 'Received (GRN)'
                ? 'badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5'
                : 'badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill font-11 px-2.5 py-0.5';
        }

        var recBtn = document.getElementById('poModalReceiveGrnBtn');
        if (recBtn) {
            recBtn.classList.toggle('d-none', status === 'Received (GRN)');
        }
        var reorderBtn = document.getElementById('poModalReorderBtn');
        if (reorderBtn) {
            reorderBtn.href = 'purchase-order-create.php?vendor=' + encodeURIComponent(vendor) + '&sku=' + encodeURIComponent(sku);
        }

        var modalEl = document.getElementById('poDetailModal');
        if (modalEl && window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    };

    var modalReceiveGrnBtn = document.getElementById('poModalReceiveGrnBtn');
    if (modalReceiveGrnBtn) {
        modalReceiveGrnBtn.addEventListener('click', function () {
            var detailModalEl = document.getElementById('poDetailModal');
            if (detailModalEl && window.bootstrap && bootstrap.Modal) {
                var inst = bootstrap.Modal.getInstance(detailModalEl);
                if (inst) inst.hide();
            }
            if (activePoRow) {
                document.getElementById('grnPoLabel').textContent = (activePoRow.getAttribute('data-po') || '') + ' · ' + (activePoRow.getAttribute('data-vendor') || '');
                document.getElementById('grnItemLabel').textContent = activePoRow.getAttribute('data-item') || '';
                if (window.bootstrap) {
                    bootstrap.Modal.getOrCreateInstance(document.getElementById('receiveGrnModal')).show();
                }
            }
        });
    }

    // Delegated Action Handlers (PO 360, Receive GRN, Delete PO)
    document.addEventListener('click', function (e) {
        var po360Btn = e.target.closest('.btn-po-360');
        if (po360Btn) {
            e.preventDefault();
            var tr360 = po360Btn.closest('tr');
            if (tr360) window.openPo360Modal(tr360);
            return;
        }

        var delBtn = e.target.closest('.btn-delete-po');
        if (delBtn) {
            e.preventDefault();
            var trDel = delBtn.closest('tr');
            var poCode = delBtn.getAttribute('data-po') || '';
            if (trDel && confirm('Are you sure you want to delete Purchase Order "' + poCode + '"?')) {
                allPoRows = allPoRows.filter(function (r) { return r !== trDel; });
                trDel.remove();
                applyPoFilter();
            }
            return;
        }

        var btn = e.target.closest('.btn-receive-grn');
        if (!btn) return;
        activePoRow = btn.closest('tr');
        document.getElementById('grnPoLabel').textContent = btn.getAttribute('data-po') + ' · ' + btn.getAttribute('data-vendor');
        document.getElementById('grnItemLabel').textContent = btn.getAttribute('data-item');
        if (window.bootstrap) {
            bootstrap.Modal.getOrCreateInstance(document.getElementById('receiveGrnModal')).show();
        }
    });

    // Table Row Click -> opens PO 360 Modal while safely ignoring Actions dropdown & interactive controls
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
                e.target.closest('a:not(.po-num-link)')
            ) {
                return;
            }

            var cell = e.target.closest('td');
            if (cell && (cell.querySelector('.btn-table-action, .lead-act-btn, .dropdown') || cell.classList.contains('text-end'))) {
                return;
            }

            var tr = e.target.closest('tr[data-po]');
            if (tr) {
                e.preventDefault();
                window.openPo360Modal(tr);
            }
        });
    }

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
            var grnLi = activePoRow.querySelector('[data-grn-action-li]');
            if (grnLi) {
                grnLi.innerHTML = '<a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="inventory.php"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-check2-circle"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">View In-Stock Ledger</div><div class="text-muted" style="font-size: 10px;">GRN verified &amp; synced</div></div></a>';
            }
            var modalEl = document.getElementById('receiveGrnModal');
            if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
                bootstrap.Modal.getInstance(modalEl).hide();
            }
            applyPoFilter();
        });
    }

    // Filter & Search State
    var currentPoFilter = 'all';

    function updateFilterBadge() {
        var count = 0;
        var q = (document.getElementById('poSearchInput').value || '').trim();
        var vnd = document.getElementById('poVendorFilter') ? document.getElementById('poVendorFilter').value : '';
        var wh = document.getElementById('poWarehouseFilter') ? document.getElementById('poWarehouseFilter').value : '';
        if (currentPoFilter && currentPoFilter !== 'all') count++;
        if (vnd) count++;
        if (wh) count++;
        if (q) count++;

        var badge = document.getElementById('poFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            badge.classList.toggle('d-none', count === 0);
        }
    }

    function applyPoFilter() {
        var q = (document.getElementById('poSearchInput').value || '').toLowerCase().trim();
        var vnd = document.getElementById('poVendorFilter') ? document.getElementById('poVendorFilter').value : '';
        var wh = document.getElementById('poWarehouseFilter') ? document.getElementById('poWarehouseFilter').value : '';
        var matched = [];

        allPoRows.forEach(function (tr) {
            var st = tr.getAttribute('data-status') || '';
            var rowVnd = tr.getAttribute('data-vendor') || '';
            var rowWh = tr.getAttribute('data-warehouse') || '';
            var text = tr.textContent.toLowerCase();

            var matchSt = (currentPoFilter === 'all') || (st === currentPoFilter);
            var matchVnd = !vnd || (rowVnd === vnd);
            var matchWh = !wh || (rowWh === wh);
            var matchQ = !q || text.indexOf(q) !== -1;

            if (matchSt && matchVnd && matchWh && matchQ) {
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
    Array.prototype.forEach.call(document.querySelectorAll('.po-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.po-filter-btn'), function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            currentPoFilter = btn.getAttribute('data-filter') || 'all';
            var stSel = document.getElementById('poStatusFilterSelect');
            if (stSel) {
                stSel.value = currentPoFilter;
                if (window.jQuery && jQuery.fn.select2) jQuery(stSel).trigger('change.select2');
            }
            applyPoFilter();
        });
    });

    // Offcanvas Apply Filters
    var applyBtn = document.getElementById('poApplyFilterBtn');
    if (applyBtn) {
        applyBtn.addEventListener('click', function () {
            var stSel = document.getElementById('poStatusFilterSelect');
            if (stSel) {
                currentPoFilter = stSel.value || 'all';
                Array.prototype.forEach.call(document.querySelectorAll('.po-filter-btn'), function (b) {
                    b.classList.toggle('active', b.getAttribute('data-filter') === currentPoFilter);
                });
            }
            applyPoFilter();
            var oc = document.getElementById('poFilterOffcanvas');
            if (oc && window.bootstrap && bootstrap.Offcanvas) {
                var inst = bootstrap.Offcanvas.getInstance(oc);
                if (inst) inst.hide();
            }
        });
    }

    // Offcanvas Reset Filters
    var resetBtn = document.getElementById('poResetFilterBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            currentPoFilter = 'all';
            document.getElementById('poSearchInput').value = '';
            ['poStatusFilterSelect', 'poVendorFilter', 'poWarehouseFilter'].forEach(function (id) {
                var el = document.getElementById(id);
                if (el) {
                    el.value = id === 'poStatusFilterSelect' ? 'all' : '';
                    if (window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change.select2');
                }
            });
            Array.prototype.forEach.call(document.querySelectorAll('.po-filter-btn'), function (b) {
                b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
            });
            applyPoFilter();
        });
    }
});
</script>

<?php include 'footer.php'; ?>
