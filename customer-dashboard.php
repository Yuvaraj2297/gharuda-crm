<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Customer 360&deg; Dashboard</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">128 Active Accounts</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-pie-chart fs-6"></i>
                <a href="customers.php" class="text-decoration-none text-muted">Customers</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Customer 360&deg; Analytics</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="customer-new.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-building-add"></i><span>New Customer Onboarding</span>
            </a>
            <a href="customers.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-people"></i><span>Customers List</span>
            </a>
            <a href="contacts.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-person-badge"></i><span>Contacts</span>
            </a>
            <a href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-excel"></i><span>Download Excel</span>
            </a>
            <a href="customer-view.php?id=1" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-person-vcard"></i><span>360&deg; Workspace</span>
            </a>
        </div>
    </div>

    <!-- KPI Row (Bootstrap 5 Utilities) -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Total Revenue (LTV)</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-currency-rupee"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹42.8 Lakh</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> +14.2% YoY growth</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Active Accounts</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-buildings"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">128</h3>
                <span class="text-muted small">8 new this month</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Retention Rate</span>
                    <span class="p-2 rounded-3 bg-info-subtle text-info"><i class="bi bi-heart-pulse"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">94.6%</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-shield-check"></i> High Engagement</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Open Support Tickets</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-ticket-perforated"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">7</h3>
                <span class="text-muted small">All within SLA</span>
            </div>
        </div>
    </div>

    <!-- Top Client Accounts & Lifetime Metrics Table -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="card-head d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom p-3 mb-0">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-award"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">Top Client Accounts &amp; Lifetime Metrics</h3>
                    <small class="text-muted">360&deg; revenue, active projects, SLA health &amp; 1-click CRM actions</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="customer-new.php" class="btn btn-primary btn-sm fw-semibold">
                    <i class="bi bi-plus-lg me-1"></i>Onboard Customer
                </a>
                <a href="customers.php" class="btn btn-outline-primary btn-sm fw-semibold">View All Clients</a>
            </div>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" data-table-name="Top_Clients">
                <thead>
                    <tr>
                        <th>Account Name</th>
                        <th>Category</th>
                        <th>Industry</th>
                        <th>Lifetime Value</th>
                        <th>Active Projects</th>
                        <th>Health Score</th>
                        <th>CRM Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-primary text-white p-2 d-inline-flex align-items-center justify-content-center">PS</span>
                                <div>
                                    <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="fw-bold text-dark text-decoration-none">Power Spares Engineering</a>
                                    <div class="text-muted small">contact@powerspares.com</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Enterprise</span></td>
                        <td>Manufacturing</td>
                        <td class="fw-bold text-dark">₹12,50,000</td>
                        <td><a href="projects-list.php" class="badge bg-light text-dark border text-decoration-none">2 Active</a></td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">98% Excellent</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=Power+Spares+Engineering" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=Power+Spares+Engineering" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                                <a href="support-create-ticket.php" class="btn btn-sm btn-light border text-warning px-2 py-1" title="Raise Support Ticket"><i class="bi bi-headset"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-success text-white p-2 d-inline-flex align-items-center justify-content-center">ZP</span>
                                <div>
                                    <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="fw-bold text-dark text-decoration-none">Zen Publications</a>
                                    <div class="text-muted small">editor@zenpub.in</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-info-subtle text-info border border-info-subtle">VIP Account</span></td>
                        <td>Publishing &amp; Media</td>
                        <td class="fw-bold text-dark">₹8,90,000</td>
                        <td><a href="projects-list.php" class="badge bg-light text-dark border text-decoration-none">1 Active</a></td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">95% Excellent</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=Zen+Publications" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=Zen+Publications" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                                <a href="support-create-ticket.php" class="btn btn-sm btn-light border text-warning px-2 py-1" title="Raise Support Ticket"><i class="bi bi-headset"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-warning text-dark p-2 d-inline-flex align-items-center justify-content-center">HH</span>
                                <div>
                                    <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="fw-bold text-dark text-decoration-none">Hindustan Hydraulics</a>
                                    <div class="text-muted small">info@hindustanhydraulics.com</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">SME</span></td>
                        <td>Heavy Machinery</td>
                        <td class="fw-bold text-dark">₹6,20,000</td>
                        <td><a href="projects-list.php" class="badge bg-light text-dark border text-decoration-none">1 Active</a></td>
                        <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle">82% Good</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360° View"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Project"><i class="bi bi-briefcase"></i></a>
                                <a href="support-create-ticket.php" class="btn btn-sm btn-light border text-warning px-2 py-1" title="Raise Support Ticket"><i class="bi bi-headset"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
