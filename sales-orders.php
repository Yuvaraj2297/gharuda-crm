<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Sales Orders (SO) &amp; Dispatch Ledger</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">₹44.2 Lakh Confirmed Orders</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-bag-check fs-6"></i>
                <a href="quotations.php" class="text-decoration-none text-muted">CRM &amp; Quotations</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Sales Orders (Order-to-Cash)</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="quotations.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-text"></i><span>Quotations</span>
            </a>
            <a href="inventory.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-boxes"></i><span>Inventory Stock</span>
            </a>
            <a href="invoices.php" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-ruled"></i><span>Tax Invoices</span>
            </a>
            <a href="sales-order-create.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-plus-lg"></i><span>New Sales Order</span>
            </a>
        </div>
    </div>

    <!-- KPI Cards (100% Bootstrap 5 Utilities) -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Confirmed Sales Orders</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-bag-check-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹44,20,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 19 Orders Confirmed</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Ready for Dispatch</span>
                    <span class="p-2 rounded-3 bg-info-subtle text-info"><i class="bi bi-box-seam"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">5 Orders</h3>
                <span class="text-muted small">Stock Reserved in Warehouse</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Backordered (Needs PO)</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-exclamation-triangle"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-warning">2 Orders</h3>
                <a href="purchase-order-create.php" class="small fw-bold text-primary text-decoration-none">Raise Backorder PO &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Dispatched &amp; Invoiced</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-truck"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-success">12 Completed</h3>
                <a href="invoices.php" class="small fw-bold text-success text-decoration-none">Synced with Billing &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="card-custom p-3 mb-3">
        <div class="row g-2 align-items-center justify-content-between">
            <div class="col-12 col-lg-auto">
                <div class="d-flex flex-wrap gap-1">
                    <button type="button" class="btn btn-sm btn-primary fw-semibold so-filter-btn" data-filter="all">All Sales Orders</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold so-filter-btn" data-filter="Confirmed">Confirmed (Ready)</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary fw-semibold so-filter-btn" data-filter="Dispatched">Dispatched</button>
                    <button type="button" class="btn btn-sm btn-outline-warning fw-semibold so-filter-btn" data-filter="Backorder">Backorder (Needs PO)</button>
                </div>
            </div>
            <div class="col-12 col-lg-auto">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control" id="soSearchInput" placeholder="Search SO #, client, quote...">
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Orders Table -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="salesOrdersTable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">SO Number</th>
                        <th>Customer Account</th>
                        <th>Source Quote / Client PO</th>
                        <th>Items &amp; SKU Summary</th>
                        <th>Order Date</th>
                        <th>Delivery Date</th>
                        <th class="text-end">Order Total (GST)</th>
                        <th>Fulfillment Status</th>
                        <th class="text-end pe-3">ERP Actions (Dispatch / Bill)</th>
                    </tr>
                </thead>
                <tbody id="soTableBody">
                    <tr data-status="Confirmed">
                        <td class="ps-3 fw-bold text-primary">SO-2026-104</td>
                        <td>
                            <div class="fw-bold text-dark">Power Spares Engineering</div>
                            <div class="small text-muted">Chennai HQ &middot; GSTIN Verified</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">QT-2026-084</span>
                            <div class="small text-muted mt-1">Client PO: PSE/PO/419</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Gharuda Cloud CRM + 10 Biometric Terminals</div>
                            <div class="small text-success"><i class="bi bi-check2-circle me-1"></i>Stock Reserved</div>
                        </td>
                        <td class="small text-muted">26-10-2026</td>
                        <td class="small fw-semibold text-dark">02-11-2026</td>
                        <td class="text-end fw-bold text-dark">₹5,90,000</td>
                        <td data-so-status-cell><span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">Confirmed</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2 fw-semibold btn-dispatch-so" data-so="SO-2026-104" data-client="Power Spares Engineering" data-items="Gharuda Cloud CRM + 10 Biometric Terminals">
                                    <i class="bi bi-truck me-1"></i>Dispatch
                                </button>
                                <a href="invoice-create.php?quote=QT-2026-084&amp;client=Power+Spares+Engineering&amp;amount=590000" class="btn btn-success btn-sm py-0 px-2 fw-semibold" title="Convert SO to Tax Invoice">
                                    <i class="bi bi-file-earmark-ruled me-1"></i>Invoice
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Backorder">
                        <td class="ps-3 fw-bold text-primary">SO-2026-103</td>
                        <td>
                            <div class="fw-bold text-dark">Hindustan Hydraulics Pvt Ltd</div>
                            <div class="small text-muted">Coimbatore &middot; Enterprise SLA</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">QT-2026-081</span>
                            <div class="small text-muted mt-1">Client PO: HH/2026/882</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Dell PowerEdge R250 ERP Appliance (2 Units)</div>
                            <div class="small text-danger"><i class="bi bi-exclamation-circle me-1"></i>SKU-SV-105 Out of Stock</div>
                        </td>
                        <td class="small text-muted">23-10-2026</td>
                        <td class="small fw-semibold text-dark">04-11-2026</td>
                        <td class="text-end fw-bold text-dark">₹3,89,400</td>
                        <td data-so-status-cell><span class="badge rounded-pill bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Backorder</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="purchase-order-create.php?sku=SKU-SV-105&amp;item=Dell+PowerEdge+R250+ERP+Appliance&amp;vendor=Ingram+Micro+India+Pvt+Ltd&amp;qty=2&amp;rate=115000" class="btn btn-warning btn-sm py-0 px-2 fw-semibold" title="Raise Vendor PO for Backorder">
                                    <i class="bi bi-cart-plus me-1"></i>Raise PO
                                </a>
                                <a href="invoice-create.php?quote=QT-2026-081&amp;client=Hindustan+Hydraulics+Pvt+Ltd&amp;amount=389400" class="btn btn-outline-success btn-sm py-0 px-2" title="Proforma / Tax Invoice">
                                    <i class="bi bi-file-earmark-ruled me-1"></i>Invoice
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr data-status="Dispatched">
                        <td class="ps-3 fw-bold text-primary">SO-2026-102</td>
                        <td>
                            <div class="fw-bold text-dark">Zen Publications</div>
                            <div class="small text-muted">Bengaluru &middot; Corporate Account</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">QT-2026-079</span>
                            <div class="small text-muted mt-1">Client PO: ZP-PO-114</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Industrial Barcode &amp; POS Scanner Kit (15 Units)</div>
                            <div class="small text-muted">Challan #DC-2026-209 &middot; BlueDart AWB #884120</div>
                        </td>
                        <td class="small text-muted">16-10-2026</td>
                        <td class="small fw-semibold text-success">20-10-2026</td>
                        <td class="text-end fw-bold text-dark">₹1,38,060</td>
                        <td data-so-status-cell><span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Dispatched</span></td>
                        <td class="text-end pe-3">
                            <div class="d-inline-flex align-items-center gap-1">
                                <a href="invoice-create.php?quote=QT-2026-079&amp;client=Zen+Publications&amp;amount=138060" class="btn btn-success btn-sm py-0 px-2 fw-semibold">
                                    <i class="bi bi-file-earmark-ruled me-1"></i>Generate Invoice
                                </a>
                                <a href="projects-list.php" class="btn btn-outline-primary btn-sm py-0 px-2" title="Launch Installation Project"><i class="bi bi-briefcase"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

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

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tbody = document.getElementById('soTableBody');
    var activeSoRow = null;

    try {
        var savedSos = JSON.parse(localStorage.getItem('gh_new_sales_orders') || '[]');
        savedSos.forEach(function (s) {
            var tr = document.createElement('tr');
            tr.setAttribute('data-status', s.status || 'Confirmed');
            tr.innerHTML =
                '<td class="ps-3 fw-bold text-primary">' + s.soNo + '</td>' +
                '<td><div class="fw-bold text-dark">' + s.client + '</div><div class="small text-muted">' + (s.warehouse || 'Chennai HQ') + '</div></td>' +
                '<td><span class="badge bg-light text-dark border">' + (s.quoteRef || 'Direct SO') + '</span><div class="small text-muted mt-1">Client PO: ' + (s.clientPo || 'PO-CLIENT') + '</div></td>' +
                '<td><div class="fw-semibold text-dark">' + s.summary + '</div><div class="small text-success"><i class="bi bi-check2-circle me-1"></i>Stock Reserved</div></td>' +
                '<td class="small text-muted">' + (s.orderDate || '29-10-2026') + '</td>' +
                '<td class="small fw-semibold text-dark">' + (s.deliveryDate || '05-11-2026') + '</td>' +
                '<td class="text-end fw-bold text-dark">' + s.total + '</td>' +
                '<td data-so-status-cell><span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">' + (s.status || 'Confirmed') + '</span></td>' +
                '<td class="text-end pe-3"><div class="d-inline-flex align-items-center gap-1">' +
                '<button type="button" class="btn btn-outline-primary btn-sm py-0 px-2 fw-semibold btn-dispatch-so" data-so="' + s.soNo + '" data-client="' + s.client + '" data-items="' + s.summary + '"><i class="bi bi-truck me-1"></i>Dispatch</button>' +
                '<a href="invoice-create.php?quote=' + encodeURIComponent(s.soNo) + '&client=' + encodeURIComponent(s.client) + '&amount=' + encodeURIComponent(s.rawTotal || 150000) + '" class="btn btn-success btn-sm py-0 px-2 fw-semibold"><i class="bi bi-file-earmark-ruled me-1"></i>Invoice</a>' +
                '</div></td>';
            tbody.insertBefore(tr, tbody.firstChild);
        });
    } catch (e) {}

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
            stCell.innerHTML = '<span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2 py-1">Dispatched</span>';
        }
        var dispBtn = activeSoRow.querySelector('.btn-dispatch-so');
        if (dispBtn) {
            dispBtn.remove();
        }
        var modalEl = document.getElementById('dispatchOrderModal');
        if (window.bootstrap && bootstrap.Modal.getInstance(modalEl)) {
            bootstrap.Modal.getInstance(modalEl).hide();
        }
    });

    // Filter & Search
    var curFilter = 'all';
    function applySoFilter() {
        var q = (document.getElementById('soSearchInput').value || '').toLowerCase();
        Array.prototype.forEach.call(tbody.querySelectorAll('tr'), function (tr) {
            var st = tr.getAttribute('data-status') || '';
            var text = tr.textContent.toLowerCase();
            var matchSt = (curFilter === 'all') || (st === curFilter);
            var matchQ = !q || text.indexOf(q) !== -1;
            tr.classList.toggle('d-none', !(matchSt && matchQ));
        });
    }

    Array.prototype.forEach.call(document.querySelectorAll('.so-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.so-filter-btn'), function (b) {
                b.classList.remove('btn-primary');
                b.classList.add('btn-outline-secondary');
            });
            btn.classList.remove('btn-outline-secondary', 'btn-outline-warning');
            btn.classList.add('btn-primary');
            curFilter = btn.getAttribute('data-filter');
            applySoFilter();
        });
    });

    document.getElementById('soSearchInput').addEventListener('input', applySoFilter);
});
</script>

<?php include 'footer.php'; ?>

