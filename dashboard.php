<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Executive CRM &amp; ERP Dashboard</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">FY 2026–27 Live Overview</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-speedometer2 fs-6"></i>
                <span>01. Dashboard</span>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Business KPIs, Pending Actions &amp; Performance</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="lead-dashboard.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-graph-up-arrow"></i><span>Sales Analytics</span>
            </a>
            <a href="customer-dashboard.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-pie-chart"></i><span>Customer 360&deg;</span>
            </a>
            <a href="project-dashboard.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-briefcase"></i><span>Project Dashboard</span>
            </a>
            <a href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx" class="btn btn-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-excel"></i><span>Download ERP Blueprint</span>
            </a>
        </div>
    </div>

    <!-- Top Executive KPI Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Active Pipeline &amp; Deals</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-kanban"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹84.50 Lakh</h3>
                <a href="deals.php" class="small fw-bold text-primary text-decoration-none">24 Active Deals &middot; 18 Quotes &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Confirmed Sales Orders</span>
                    <span class="p-2 rounded-3 bg-info-subtle text-info"><i class="bi bi-bag-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹44.20 Lakh</h3>
                <a href="sales-orders.php" class="small fw-bold text-info text-decoration-none">5 Ready for Dispatch &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Realized Revenue (Collected)</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-cash-stack"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-success">₹46.20 Lakh</h3>
                <a href="payments.php" class="small fw-bold text-success text-decoration-none">79.1% Collection Efficiency &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Inventory &amp; Open POs</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-boxes"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹38.45 Lakh</h3>
                <a href="inventory.php" class="small fw-bold text-warning text-decoration-none">5 Low-Stock Alerts &middot; 4 Open POs &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Pending Actions & Cross-Module Status -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-xl-7">
            <div class="card-custom p-0 overflow-hidden h-100">
                <div class="p-3 border-bottom d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0"><i class="bi bi-lightning-charge-fill text-warning me-2"></i>Today's Priority Actions Across Modules</h6>
                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle">6 Pending Actions</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">Module</th>
                                <th>Pending Action / Item</th>
                                <th>Account / Owner</th>
                                <th>Status</th>
                                <th class="text-end pe-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3"><span class="badge bg-success-subtle text-success fw-bold">02. LEADS</span></td>
                                <td class="fw-semibold text-dark">Convert Qualified Hot Lead #LD-187</td>
                                <td class="small text-muted">Suresh Babu &middot; Power Spares</td>
                                <td><span class="badge bg-warning-subtle text-warning">Hot Lead</span></td>
                                <td class="text-end pe-3"><a href="customer-new.php?from_lead=LD-187&amp;company=Power+Spares+Engineering" class="btn btn-primary btn-sm py-0 px-2">Onboard</a></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><span class="badge bg-info-subtle text-info fw-bold">02. SALES</span></td>
                                <td class="fw-semibold text-dark">Convert Approved Quote #QT-2026-084 to SO</td>
                                <td class="small text-muted">Power Spares Engineering (₹5.90L)</td>
                                <td><span class="badge bg-success-subtle text-success">Approved</span></td>
                                <td class="text-end pe-3"><a href="sales-order-create.php?quote=QT-2026-084&amp;client=Power+Spares+Engineering&amp;amount=590000" class="btn btn-outline-primary btn-sm py-0 px-2">Create SO</a></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><span class="badge bg-warning-subtle text-warning fw-bold">06. STOCK</span></td>
                                <td class="fw-semibold text-dark">Low Stock Reorder: Biometric Terminal (6 Left)</td>
                                <td class="small text-muted">Matrix Secure Systems Pvt Ltd</td>
                                <td><span class="badge bg-danger-subtle text-danger">Reorder Now</span></td>
                                <td class="text-end pe-3"><a href="purchase-order-create.php?sku=SKU-HW-102&amp;item=Biometric+Attendance+Terminal+Pro&amp;qty=25&amp;rate=8500" class="btn btn-warning btn-sm py-0 px-2 fw-semibold">Raise PO</a></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><span class="badge bg-primary-subtle text-primary fw-bold">06. GRN</span></td>
                                <td class="fw-semibold text-dark">Verify Inward GRN for #PO-2026-043</td>
                                <td class="small text-muted">Ingram Micro India (₹4.07L)</td>
                                <td><span class="badge bg-info-subtle text-info">In Transit</span></td>
                                <td class="text-end pe-3"><a href="purchase-orders.php" class="btn btn-outline-success btn-sm py-0 px-2">Receive GRN</a></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><span class="badge bg-secondary-subtle text-secondary fw-bold">07. BILLING</span></td>
                                <td class="fw-semibold text-dark">Collect Overdue Balance on #INV-2026-088</td>
                                <td class="small text-muted">Zen Publications (₹2.50L)</td>
                                <td><span class="badge bg-warning-subtle text-warning">Partially Paid</span></td>
                                <td class="text-end pe-3"><a href="payments.php?invoice=INV-2026-088&amp;client=Zen+Publications&amp;amount=125000" class="btn btn-success btn-sm py-0 px-2">Collect</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5">
            <div class="card-custom p-3 h-100">
                <h6 class="fw-bold mb-3"><i class="bi bi-grid-1x2-fill text-primary me-2"></i>14-Module Enterprise Directory</h6>
                <div class="row g-2">
                    <div class="col-6"><a href="lead.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-kanban text-success me-1"></i>02. Leads &amp; Sales</a></div>
                    <div class="col-6"><a href="customer-dashboard.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-person-vcard text-primary me-1"></i>03. Customers 360&deg;</a></div>
                    <div class="col-6"><a href="appointments.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-calendar2-week text-info me-1"></i>04. Meetings &amp; MOM</a></div>
                    <div class="col-6"><a href="project-dashboard.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-briefcase text-secondary me-1"></i>05. Projects &amp; Tasks</a></div>
                    <div class="col-6"><a href="inventory.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-boxes text-warning me-1"></i>06. Inventory &amp; PO</a></div>
                    <div class="col-6"><a href="invoices.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-receipt text-success me-1"></i>07. Billing &amp; Finance</a></div>
                    <div class="col-6"><a href="ticket-dashboard.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-headset text-danger me-1"></i>08. Support &amp; SLA</a></div>
                    <div class="col-6"><a href="target.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-bullseye text-primary me-1"></i>09. Sales Targets</a></div>
                    <div class="col-6"><a href="staff.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-people-fill text-info me-1"></i>10. Staff &amp; Field</a></div>
                    <div class="col-6"><a href="whatsapp-chat.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-chat-dots text-success me-1"></i>11. Communications</a></div>
                    <div class="col-6"><a href="employee-revenue-report.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-bar-chart-line text-warning me-1"></i>12. Reports &amp; BI</a></div>
                    <div class="col-6"><a href="settings.php" class="d-block p-2 rounded-3 border bg-light-subtle text-decoration-none text-dark small fw-semibold"><i class="bi bi-gear text-secondary me-1"></i>13–14. Masters &amp; Admin</a></div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

