<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <a href="customers.php" class="text-decoration-none text-muted hover-primary">Customers</a>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Customer Analytics</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Customer 360 Dashboard</h1>
                <span class="badge bg-success-subtle text-success rounded-pill">128 Active Accounts</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="customers.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-people me-1"></i>Customer Directory
            </a>
            <a href="customer-view.php?id=1" class="btn btn-primary btn-sm">
                <i class="bi bi-person-badge me-1"></i>Customer 360 View
            </a>
        </div>
    </div>

    <!-- KPI Row -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Total Revenue (LTV)</span>
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-currency-rupee"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹42.8 Lakh</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> +14.2% YoY growth</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Active Accounts</span>
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-buildings"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">128</h3>
                <span class="text-muted small">8 new this month</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Retention Rate</span>
                    <span class="p-2 rounded-2 bg-info-subtle text-info"><i class="bi bi-heart-pulse"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">94.6%</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-shield-check"></i> High Engagement</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Open Support Tickets</span>
                    <span class="p-2 rounded-2 bg-warning-subtle text-warning"><i class="bi bi-ticket-perforated"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">7</h3>
                <span class="text-muted small">All within SLA</span>
            </div>
        </div>
    </div>

    <!-- Customer Performance Table -->
    <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden mb-4">
        <div class="p-3 bg-white border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
            <h6 class="fw-bold text-dark mb-0"><i class="bi bi-award me-2 text-primary"></i>Top Client Accounts &amp; Lifetime Metrics</h6>
            <a href="customers.php" class="btn btn-outline-primary btn-sm">View All Clients</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable" data-table-name="Top Clients">
                <thead class="table-light">
                    <tr>
                        <th>Account Name</th>
                        <th>Category</th>
                        <th>Industry</th>
                        <th>Total Value</th>
                        <th>Active Projects</th>
                        <th>Health Score</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width:34px;height:34px;">P</div>
                                <div>
                                    <div class="fw-bold text-dark">Power Spares Engineering</div>
                                    <span class="text-muted small">contact@powerspares.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-primary-subtle text-primary">Enterprise</span></td>
                        <td>Manufacturing</td>
                        <td class="fw-bold text-dark">₹12,50,000</td>
                        <td>2 Active</td>
                        <td><span class="badge bg-success-subtle text-success">98% Excellent</span></td>
                        <td><a href="customer-view.php?id=1" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width:34px;height:34px;">Z</div>
                                <div>
                                    <div class="fw-bold text-dark">Zen Publications</div>
                                    <span class="text-muted small">editor@zenpub.in</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-info-subtle text-info">VIP Account</span></td>
                        <td>Publishing &amp; Media</td>
                        <td class="fw-bold text-dark">₹8,90,000</td>
                        <td>1 Active</td>
                        <td><span class="badge bg-success-subtle text-success">95% Excellent</span></td>
                        <td><a href="customer-view.php?id=2" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center fw-bold" style="width:34px;height:34px;">H</div>
                                <div>
                                    <div class="fw-bold text-dark">Hindustan Hydraulics</div>
                                    <span class="text-muted small">info@hindustanhydraulics.com</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-secondary-subtle text-secondary">SME</span></td>
                        <td>Heavy Machinery</td>
                        <td class="fw-bold text-dark">₹6,20,000</td>
                        <td>1 Active</td>
                        <td><span class="badge bg-warning-subtle text-warning">82% Good</span></td>
                        <td><a href="customer-view.php?id=3" class="btn btn-sm btn-light border"><i class="bi bi-eye"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
