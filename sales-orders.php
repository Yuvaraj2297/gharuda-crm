<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/lead.css">

<main class="container-fluid px-0">
    <!-- Page Header & Action Bar -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-0 page-title">Sales Orders &amp; Dispatch</h1>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-2.5" data-bs-toggle="offcanvas" data-bs-target="#soFilterOffcanvas" aria-controls="soFilterOffcanvas" title="Filter Sales Orders">
                <i class="bi bi-funnel"></i>
                <span>Filters</span>
                <span class="badge bg-primary text-white rounded-pill px-1.5 py-0.5 d-none font-11" id="filterCountBadge">0</span>
            </button>
            <a href="sales-order-create.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-3">
                <i class="bi bi-plus-lg"></i><span>New Sales Order</span>
            </a>
        </div>
    </div>

    <!-- Sales Orders Directory Table Card -->
    <div class="card border shadow-sm rounded-3 bg-white overflow-hidden mb-4">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <div class="d-flex align-items-center gap-2">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-bag-check text-primary me-2"></i>Sales Orders Directory</h6>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2.5 py-1 font-12" id="soCountBadge">3 Orders</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold" id="exportSoCsvBtn">
                    <i class="bi bi-download"></i><span>Export CSV</span>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="salesOrdersTable">
                <thead class="table-light text-muted small text-uppercase font-11">
                    <tr>
                        <th class="ps-4">SO Number</th>
                        <th>Customer Account</th>
                        <th>Source Quote / Client PO</th>
                        <th>Items &amp; SKU Summary</th>
                        <th>Order Date</th>
                        <th>Delivery Date</th>
                        <th class="text-end">Order Total (GST)</th>
                        <th>Fulfillment Status</th>
                        <th class="text-end pe-4" style="min-width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody id="soTableBody">
                    <tr data-status="Confirmed" data-warehouse="Chennai HQ">
                        <td class="ps-4 fw-bold text-primary font-12">SO-2026-104</td>
                        <td>
                            <div class="fw-bold text-dark">Power Spares Engineering</div>
                            <div class="small text-muted font-11">Chennai HQ &middot; GSTIN Verified</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border font-11">QT-2026-084</span>
                            <div class="small text-muted mt-0.5 font-11">Client PO: PSE/PO/419</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark font-12">Gharuda Cloud CRM + 10 Biometric Terminals</div>
                            <div class="small text-success font-11"><i class="bi bi-check2-circle me-1"></i>Stock Reserved</div>
                        </td>
                        <td class="small text-muted">26-10-2026</td>
                        <td class="small fw-semibold text-dark">02-11-2026</td>
                        <td class="text-end fw-bold text-dark">&#8377;5,90,000</td>
                        <td data-so-status-cell><span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 font-11">Confirmed</span></td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end table-action-menu font-12 py-1">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Order Actions</li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 btn-dispatch-so" href="javascript:void(0)" data-so="SO-2026-104" data-client="Power Spares Engineering" data-items="Gharuda Cloud CRM + 10 Biometric Terminals">
                                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-truck"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Dispatch &amp; Challan</div>
                                                <div class="text-muted" style="font-size: 10px;">Create DC &amp; dispatch stock</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php?quote=QT-2026-084&amp;client=Power+Spares+Engineering&amp;amount=590000">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Convert to Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Issue GST billing invoice</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="project-create.php?so=SO-2026-104&amp;client=Power+Spares+Engineering&amp;project=Gharuda+Cloud+CRM+%26+Biometric+Setup&amp;amount=590000">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-briefcase"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Delivery Project</div>
                                                <div class="text-muted" style="font-size: 10px;">Schedule installation &amp; rollout</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-muted" href="javascript:void(0)" onclick="window.print()">
                                            <span class="action-icon-pill bg-light text-secondary border"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print Order Details</div>
                                                <div class="text-muted" style="font-size: 10px;">Download or print summary</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Backorder" data-warehouse="Coimbatore">
                        <td class="ps-4 fw-bold text-primary font-12">SO-2026-103</td>
                        <td>
                            <div class="fw-bold text-dark">Hindustan Hydraulics Pvt Ltd</div>
                            <div class="small text-muted font-11">Coimbatore &middot; Enterprise SLA</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border font-11">QT-2026-081</span>
                            <div class="small text-muted mt-0.5 font-11">Client PO: HH/2026/882</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark font-12">Dell PowerEdge R250 ERP Appliance (2 Units)</div>
                            <div class="small text-danger font-11"><i class="bi bi-exclamation-circle me-1"></i>SKU-SV-105 Out of Stock</div>
                        </td>
                        <td class="small text-muted">23-10-2026</td>
                        <td class="small fw-semibold text-dark">04-11-2026</td>
                        <td class="text-end fw-bold text-dark">&#8377;3,89,400</td>
                        <td data-so-status-cell><span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-1 font-11">Backorder</span></td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end table-action-menu font-12 py-1">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Order Actions</li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="purchase-order-create.php?sku=SKU-SV-105&amp;item=Dell+PowerEdge+R250+ERP+Appliance&amp;vendor=Ingram+Micro+India+Pvt+Ltd&amp;qty=2&amp;rate=115000">
                                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-cart-plus"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Raise Vendor PO</div>
                                                <div class="text-muted" style="font-size: 10px;">Procure backordered SKUs</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php?quote=QT-2026-081&amp;client=Hindustan+Hydraulics+Pvt+Ltd&amp;amount=389400">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Proforma / Tax Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Issue advance proforma invoice</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="project-create.php?so=SO-2026-103&amp;client=Hindustan+Hydraulics+%26+Pneumatics&amp;project=Dell+PowerEdge+R250+Server+Deployment&amp;amount=389400">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-briefcase"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Deployment Project</div>
                                                <div class="text-muted" style="font-size: 10px;">Configure server &amp; rack setup</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-muted" href="javascript:void(0)" onclick="window.print()">
                                            <span class="action-icon-pill bg-light text-secondary border"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print Order Details</div>
                                                <div class="text-muted" style="font-size: 10px;">Download or print summary</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Dispatched" data-warehouse="Bengaluru Hub">
                        <td class="ps-4 fw-bold text-primary font-12">SO-2026-102</td>
                        <td>
                            <div class="fw-bold text-dark">Zen Publications</div>
                            <div class="small text-muted font-11">Bengaluru &middot; Corporate Account</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border font-11">QT-2026-079</span>
                            <div class="small text-muted mt-0.5 font-11">Client PO: ZP-PO-114</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark font-12">Industrial Barcode &amp; POS Scanner Kit (15 Units)</div>
                            <div class="small text-muted font-11">Challan #DC-2026-209 &middot; BlueDart AWB #884120</div>
                        </td>
                        <td class="small text-muted">16-10-2026</td>
                        <td class="small fw-semibold text-success">20-10-2026</td>
                        <td class="text-end fw-bold text-dark">&#8377;1,38,060</td>
                        <td data-so-status-cell><span class="badge bg-success text-white border border-success rounded-pill px-2.5 py-1 font-11">Dispatched</span></td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                    <span>Actions</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end table-action-menu font-12 py-1">
                                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Order Actions</li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php?quote=QT-2026-079&amp;client=Zen+Publications&amp;amount=138060">
                                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">View / Tax Invoice</div>
                                                <div class="text-muted" style="font-size: 10px;">Check completed tax invoice</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="project-create.php?so=SO-2026-102&amp;client=Zen+Publications&amp;project=Barcode+%26+POS+Rollout&amp;amount=138060">
                                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-briefcase"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Installation Project</div>
                                                <div class="text-muted" style="font-size: 10px;">Track ongoing rollout status</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider my-1"></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-muted" href="javascript:void(0)" onclick="window.print()">
                                            <span class="action-icon-pill bg-light text-secondary border"><i class="bi bi-printer"></i></span>
                                            <div class="text-start">
                                                <div class="fw-semibold text-dark font-12">Print Delivery Challan</div>
                                                <div class="text-muted" style="font-size: 10px;">Print DC #DC-2026-209</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white border-top py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
            <span class="text-muted small" id="soSummaryText">Showing all sales orders</span>
            <nav aria-label="Table pagination">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</main>

<!-- ==================== OFFCANVAS SLIDER: SALES ORDERS FILTER DRAWER ==================== -->
<div class="offcanvas offcanvas-end border-start shadow-lg" tabindex="-1" id="soFilterOffcanvas" aria-labelledby="soFilterTitle" style="width: 360px;">
    <div class="offcanvas-header border-bottom py-3 px-4 bg-light">
        <div class="d-flex align-items-center gap-2">
            <span class="p-1.5 rounded-2 bg-primary-subtle text-primary d-inline-flex"><i class="bi bi-funnel fs-6"></i></span>
            <h5 class="offcanvas-title fw-bold text-dark fs-6 mb-0" id="soFilterTitle">Filter Sales Orders</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4 d-flex flex-column gap-3">
        <!-- Search Keyword -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Search Orders / Account</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                <input type="text" class="form-control" id="filterSoSearch" placeholder="SO #, client, quote, item...">
            </div>
        </div>

        <!-- Fulfillment Status Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Fulfillment Status</label>
            <select class="form-select form-select-sm" id="filterSoStatus">
                <option value="">All Fulfillment Statuses</option>
                <option value="Confirmed">Confirmed (Stock Reserved)</option>
                <option value="Backorder">Backorder (Needs PO)</option>
                <option value="Dispatched">Dispatched &amp; Delivered</option>
            </select>
        </div>

        <!-- Warehouse Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Fulfillment Warehouse</label>
            <select class="form-select form-select-sm" id="filterSoWarehouse">
                <option value="">All Warehouses</option>
                <option value="Chennai HQ">Chennai HQ Warehouse</option>
                <option value="Bengaluru Hub">Bengaluru Tech Hub</option>
                <option value="Coimbatore">Coimbatore Depot</option>
            </select>
        </div>

        <!-- Period Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Order Timeline</label>
            <select class="form-select form-select-sm" id="filterSoPeriod">
                <option value="all">All Timelines</option>
                <option value="this-month">This Month</option>
                <option value="this-quarter" selected>This Quarter (Q1 2026)</option>
                <option value="this-year">Full Year 2026</option>
            </select>
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 px-4 bg-light d-flex align-items-center justify-content-between">
        <button type="button" class="btn btn-outline-secondary btn-sm" id="resetSoFiltersBtn">
            <i class="bi bi-arrow-clockwise me-1"></i>Reset Filters
        </button>
        <button type="button" class="btn btn-primary btn-sm px-4 fw-semibold" data-bs-dismiss="offcanvas">
            Apply
        </button>
    </div>
</div>

<!-- Dispatch / Delivery Challan Modal -->
<div class="modal fade" id="dispatchOrderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold"><i class="bi bi-truck text-primary me-2"></i>Create Delivery Challan &amp; Dispatch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="p-3 rounded-3 bg-light border mb-3">
                    <div class="small text-muted" id="dcSoLabel">SO-2026-104 &middot; Power Spares Engineering</div>
                    <div class="fw-bold text-dark mt-1" id="dcItemsLabel">Gharuda Cloud CRM + 10 Biometric Terminals</div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Delivery Challan #</label>
                        <input type="text" class="form-control form-control-sm" id="dcNumber" value="DC-2026-214">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Dispatch Warehouse</label>
                        <select class="form-select form-select-sm" id="dcWarehouse">
                            <option value="Chennai HQ">Chennai HQ Warehouse</option>
                            <option value="Bengaluru Hub">Bengaluru Tech Hub</option>
                            <option value="Coimbatore">Coimbatore Depot</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Courier / Logistics Partner</label>
                        <input type="text" class="form-control form-control-sm" id="dcCourier" value="BlueDart Express / Direct">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Tracking / AWB / Vehicle #</label>
                        <input type="text" class="form-control form-control-sm" id="dcTracking" value="AWB-99402188">
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm fw-semibold" id="confirmDispatchBtn"><i class="bi bi-check2-circle me-1"></i>Confirm Dispatch &amp; Deduct Stock</button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== JAVASCRIPT: SALES ORDERS ENGINE ==================== -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var tbody = document.getElementById('soTableBody');
    var activeSoRow = null;

    // Restore new orders generated from CRM localStorage if any
    try {
        var savedSos = JSON.parse(localStorage.getItem('gh_new_sales_orders') || '[]');
        var seenSos = {};
        Array.from(tbody ? tbody.querySelectorAll('tr') : []).forEach(function(r) {
            var code = (r.cells[0] ? r.cells[0].textContent.trim() : '');
            if (code) seenSos[code] = true;
        });

        savedSos.forEach(function (s) {
            if (!tbody || !s.soNo) return;
            var cleanSo = String(s.soNo).trim();
            if (seenSos[cleanSo]) return;
            seenSos[cleanSo] = true;

            var encClient = encodeURIComponent(s.client || 'Client');
            var encSo = encodeURIComponent(cleanSo);
            var rawAmt = Number(String(s.total || s.rawTotal || '').replace(/[^0-9]/g, '')) || 150000;

            var tr = document.createElement('tr');
            tr.setAttribute('data-status', s.status || 'Confirmed');
            tr.setAttribute('data-warehouse', s.warehouse || 'Chennai HQ');
            tr.innerHTML =
                '<td class="ps-4 fw-bold text-primary font-12">' + cleanSo + '</td>' +
                '<td><div class="fw-bold text-dark">' + s.client + '</div><div class="small text-muted font-11">' + (s.warehouse || 'Chennai HQ') + '</div></td>' +
                '<td><span class="badge bg-light text-dark border font-11">' + (s.quoteRef || 'Direct SO') + '</span><div class="small text-muted mt-0.5 font-11">Client PO: ' + (s.clientPo || 'PO-CLIENT') + '</div></td>' +
                '<td><div class="fw-semibold text-dark font-12">' + s.summary + '</div><div class="small text-success font-11"><i class="bi bi-check2-circle me-1"></i>Stock Reserved</div></td>' +
                '<td class="small text-muted">' + (s.orderDate || 'Today') + '</td>' +
                '<td class="small fw-semibold text-dark">' + (s.deliveryDate || '05-Nov-2026') + '</td>' +
                '<td class="text-end fw-bold text-dark">' + (s.total || '₹0') + '</td>' +
                '<td data-so-status-cell><span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2.5 py-1 font-11">' + (s.status || 'Confirmed') + '</span></td>' +
                '<td class="text-end pe-4">' +
                    '<div class="dropdown">' +
                        '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                            '<span>Actions</span>' +
                        '</button>' +
                        '<ul class="dropdown-menu dropdown-menu-end table-action-menu font-12 py-1">' +
                            '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Order Actions</li>' +
                            '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 btn-dispatch-so" href="javascript:void(0)" data-so="' + cleanSo + '" data-client="' + (s.client || '') + '" data-items="' + (s.summary || '') + '"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-truck"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Dispatch &amp; Challan</div><div class="text-muted" style="font-size: 10px;">Create DC &amp; dispatch stock</div></div></a></li>' +
                            '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="invoice-create.php?quote=' + encSo + '&client=' + encClient + '&amount=' + rawAmt + '"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-receipt"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Convert to Invoice</div><div class="text-muted" style="font-size: 10px;">Issue GST billing invoice</div></div></a></li>' +
                            '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="project-create.php?so=' + encSo + '&client=' + encClient + '&project=' + encodeURIComponent(s.summary || '') + '&amount=' + rawAmt + '"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-briefcase"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Delivery Project</div><div class="text-muted" style="font-size: 10px;">Schedule installation &amp; rollout</div></div></a></li>' +
                            '<li><hr class="dropdown-divider my-1"></li>' +
                            '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-muted" href="javascript:void(0)" onclick="window.print()"><span class="action-icon-pill bg-light text-secondary border"><i class="bi bi-printer"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Print Order Details</div><div class="text-muted" style="font-size: 10px;">Download or print summary</div></div></a></li>' +
                        '</ul>' +
                    '</div>' +
                '</td>';
            tbody.insertBefore(tr, tbody.firstChild);
        });
    } catch (e) {}

    // Dispatch modal triggers
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.btn-dispatch-so');
        if (!btn) return;
        activeSoRow = btn.closest('tr');
        document.getElementById('dcSoLabel').textContent = btn.getAttribute('data-so') + ' · ' + btn.getAttribute('data-client');
        document.getElementById('dcItemsLabel').textContent = btn.getAttribute('data-items');
        if (window.bootstrap) {
            bootstrap.Modal.getOrCreateInstance(document.getElementById('dispatchOrderModal')).show();
        }
    });

    document.getElementById('confirmDispatchBtn').addEventListener('click', function () {
        if (!activeSoRow) return;
        activeSoRow.setAttribute('data-status', 'Dispatched');
        var stCell = activeSoRow.querySelector('[data-so-status-cell]');
        if (stCell) {
            stCell.innerHTML = '<span class="badge bg-success text-white border border-success rounded-pill px-2.5 py-1 font-11">Dispatched</span>';
        }
        var dispBtn = activeSoRow.querySelector('.btn-dispatch-so');
        if (dispBtn) {
            var li = dispBtn.closest('li');
            if (li) li.remove();
        }
        var modalEl = document.getElementById('dispatchOrderModal');
        if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
            bootstrap.Modal.getInstance(modalEl).hide();
        }
        applySoFilters();
    });

    // Universal Filter Engine (Offcanvas Slider)
    function applySoFilters() {
        var q = (document.getElementById('filterSoSearch') ? document.getElementById('filterSoSearch').value : '').toLowerCase().trim();
        var st = (document.getElementById('filterSoStatus') ? document.getElementById('filterSoStatus').value : '').toLowerCase();
        var wh = (document.getElementById('filterSoWarehouse') ? document.getElementById('filterSoWarehouse').value : '').toLowerCase();

        var activeCount = 0;
        if (q) activeCount++;
        if (st) activeCount++;
        if (wh) activeCount++;

        var badge = document.getElementById('filterCountBadge');
        if (badge) {
            badge.textContent = activeCount;
            badge.classList.toggle('d-none', activeCount === 0);
        }

        var visibleCount = 0;
        Array.from(tbody ? tbody.querySelectorAll('tr') : []).forEach(function(r) {
            var text = r.textContent.toLowerCase();
            var statusText = (r.getAttribute('data-status') || '').toLowerCase();
            var warehouseText = (r.getAttribute('data-warehouse') || '').toLowerCase();

            var matchQ = !q || text.indexOf(q) !== -1;
            var matchSt = !st || statusText.indexOf(st) !== -1;
            var matchWh = !wh || warehouseText.indexOf(wh) !== -1;

            var show = matchQ && matchSt && matchWh;
            r.style.display = show ? '' : 'none';
            if (show) visibleCount++;
        });

        var countBadge = document.getElementById('soCountBadge');
        if (countBadge) countBadge.textContent = visibleCount + ' Orders';

        var summaryText = document.getElementById('soSummaryText');
        if (summaryText) summaryText.textContent = 'Showing ' + visibleCount + ' of ' + (tbody ? tbody.children.length : 0) + ' sales orders';
    }

    var searchInput = document.getElementById('filterSoSearch');
    if (searchInput) searchInput.addEventListener('input', applySoFilters);

    var statusSelect = document.getElementById('filterSoStatus');
    if (statusSelect) statusSelect.addEventListener('change', applySoFilters);

    var whSelect = document.getElementById('filterSoWarehouse');
    if (whSelect) whSelect.addEventListener('change', applySoFilters);

    var resetBtn = document.getElementById('resetSoFiltersBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            if (searchInput) searchInput.value = '';
            if (statusSelect) statusSelect.value = '';
            if (whSelect) whSelect.value = '';
            applySoFilters();
        });
    }

    // Real-time Export CSV
    var exportBtn = document.getElementById('exportSoCsvBtn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            var rows = [
                ['SO Number', 'Customer Account', 'Source Quote / PO', 'Items Summary', 'Order Date', 'Delivery Date', 'Order Total', 'Fulfillment Status']
            ];
            Array.from(tbody ? tbody.querySelectorAll('tr') : []).forEach(function(r) {
                if (r.style.display === 'none') return;
                var cells = r.querySelectorAll('td');
                if (cells.length >= 8) {
                    rows.push([
                        cells[0].textContent.trim(),
                        cells[1].querySelector('.fw-bold') ? cells[1].querySelector('.fw-bold').textContent.trim() : cells[1].textContent.trim(),
                        cells[2].textContent.replace(/\s+/g, ' ').trim(),
                        cells[3].querySelector('.fw-semibold') ? cells[3].querySelector('.fw-semibold').textContent.trim() : cells[3].textContent.trim(),
                        cells[4].textContent.trim(),
                        cells[5].textContent.trim(),
                        cells[6].textContent.trim(),
                        cells[7].textContent.trim()
                    ]);
                }
            });
            var csvContent = 'data:text/csv;charset=utf-8,' + rows.map(function(e) {
                return e.map(function(v) { return '"' + String(v).replace(/"/g, '""') + '"'; }).join(',');
            }).join('\n');
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', 'sales_orders_export_' + new Date().toISOString().slice(0, 10) + '.csv');
            document.body.appendChild(link);
            link.click();
            link.remove();
        });
    }

    // Initial update
    applySoFilters();
});
</script>

<?php include 'footer.php'; ?>
