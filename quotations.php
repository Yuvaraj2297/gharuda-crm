<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <span>CRM</span>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Quotations &amp; Proposals</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Quotations</h1>
                <span class="badge bg-primary-subtle text-primary rounded-pill">18 Proposals Issued</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="deals.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-kanban me-1"></i>Deals Pipeline
            </a>
            <a href="quotation-create.php" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Create Quotation
            </a>
        </div>
    </div>

    <!-- Summary KPI Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Total Proposals Value</span>
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹64,20,000</h3>
                <span class="text-muted small">18 Quotations Sent</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Accepted / Won</span>
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-check-circle"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹32,50,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 50.6% Conversion</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Awaiting Client Response</span>
                    <span class="p-2 rounded-2 bg-warning-subtle text-warning"><i class="bi bi-hourglass-split"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹24,10,000</h3>
                <span class="text-muted small">7 Pending Follow-up</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Declined / Expired</span>
                    <span class="p-2 rounded-2 bg-danger-subtle text-danger"><i class="bi bi-x-circle"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹7,60,000</h3>
                <span class="text-muted small">2 Re-quote requested</span>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden mb-4">
        <div class="p-3 bg-white border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
            <h6 class="fw-bold text-dark mb-0">Quotations Directory</h6>
            <a href="quotation-create.php" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i>New Quote</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable" data-table-name="Quotations">
                <thead class="table-light">
                    <tr>
                        <th>Quote #</th>
                        <th>Client / Account</th>
                        <th>Issue Date</th>
                        <th>Valid Until</th>
                        <th>Taxable Amt</th>
                        <th>GST (18%)</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold text-primary">#QT-2026-084</td>
                        <td>
                            <div class="fw-bold text-dark">Power Spares Engineering</div>
                            <span class="text-muted small">contact@powerspares.com</span>
                        </td>
                        <td>20-Jan-2026</td>
                        <td>20-Feb-2026</td>
                        <td>₹5,00,000</td>
                        <td>₹90,000</td>
                        <td class="fw-bold text-dark">₹5,90,000</td>
                        <td><span class="badge bg-success-subtle text-success">Accepted</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <a href="invoice-create.php?quote=QT-2026-084&client=Power+Spares+Engineering" class="btn btn-sm btn-outline-success py-1 px-2" title="Convert to Tax Invoice"><i class="bi bi-file-earmark-plus me-1"></i>Invoice</a>
                                <a href="contracts.php?quote=QT-2026-084&client=Power+Spares+Engineering" class="btn btn-sm btn-light border py-1 px-2" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <a href="customer-view.php?id=1" class="btn btn-sm btn-light border py-1 px-2" title="View Customer"><i class="bi bi-eye"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">#QT-2026-089</td>
                        <td>
                            <div class="fw-bold text-dark">Zen Publications</div>
                            <span class="text-muted small">editor@zenpub.in</span>
                        </td>
                        <td>24-Jan-2026</td>
                        <td>24-Feb-2026</td>
                        <td>₹7,54,237</td>
                        <td>₹1,35,763</td>
                        <td class="fw-bold text-dark">₹8,90,000</td>
                        <td><span class="badge bg-warning-subtle text-warning">Sent / Pending</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <a href="invoice-create.php?quote=QT-2026-089&client=Zen+Publications" class="btn btn-sm btn-outline-success py-1 px-2" title="Convert to Tax Invoice"><i class="bi bi-file-earmark-plus me-1"></i>Invoice</a>
                                <a href="contracts.php?quote=QT-2026-089&client=Zen+Publications" class="btn btn-sm btn-light border py-1 px-2" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <a href="customer-view.php?id=2" class="btn btn-sm btn-light border py-1 px-2" title="View Customer"><i class="bi bi-eye"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">#QT-2026-092</td>
                        <td>
                            <div class="fw-bold text-dark">Hindustan Hydraulics</div>
                            <span class="text-muted small">info@hindustanhydraulics.com</span>
                        </td>
                        <td>28-Jan-2026</td>
                        <td>28-Feb-2026</td>
                        <td>₹10,16,949</td>
                        <td>₹1,83,051</td>
                        <td class="fw-bold text-dark">₹12,00,000</td>
                        <td><span class="badge bg-primary-subtle text-primary">In Negotiation</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <a href="invoice-create.php?quote=QT-2026-092&client=Hindustan+Hydraulics" class="btn btn-sm btn-outline-success py-1 px-2" title="Convert to Tax Invoice"><i class="bi bi-file-earmark-plus me-1"></i>Invoice</a>
                                <a href="contracts.php?quote=QT-2026-092&client=Hindustan+Hydraulics" class="btn btn-sm btn-light border py-1 px-2" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <a href="customer-view.php?id=3" class="btn btn-sm btn-light border py-1 px-2" title="View Customer"><i class="bi bi-eye"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
