<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <span>CRM</span>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Deals &amp; Pipeline</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Deals Pipeline</h1>
                <span class="badge bg-primary-subtle text-primary rounded-pill">₹84.5 Lakh Total Pipeline</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="quotations.php" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-file-earmark-text me-1"></i>Quotations
            </a>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newDealModal">
                <i class="bi bi-plus-lg me-1"></i>New Deal
            </button>
        </div>
    </div>

    <!-- Pipeline KPI Strip -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Total Pipeline Value</span>
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-cash-stack"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹84,50,000</h3>
                <span class="text-muted small">24 Active Opportunities</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Weighted Forecast</span>
                    <span class="p-2 rounded-2 bg-info-subtle text-info"><i class="bi bi-graph-up-arrow"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹52,80,000</h3>
                <span class="text-info small fw-semibold"><i class="bi bi-check2"></i> Based on stage probability</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Closed Won (This Month)</span>
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-trophy"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹18,25,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 5 Deals Finalized</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Average Deal Size</span>
                    <span class="p-2 rounded-2 bg-warning-subtle text-warning"><i class="bi bi-pie-chart"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹3,52,000</h3>
                <span class="text-muted small">Avg cycle: 26 days</span>
            </div>
        </div>
    </div>

    <!-- Filter Strip -->
    <div class="card border-0 shadow-sm rounded-3 p-3 mb-4 bg-white">
        <div class="row g-2 align-items-center">
            <div class="col-md-3">
                <select class="form-select form-select-sm select2" id="filterDealRep">
                    <option value="">All Sales Reps</option>
                    <option value="Harish">Harish D.</option>
                    <option value="Divya">Divya A.</option>
                    <option value="Karthik">Karthik R.</option>
                    <option value="Priya">Priya S.</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select form-select-sm select2" id="filterDealBrand">
                    <option value="">All Brands</option>
                    <option value="PhDAssistance">PhDAssistance</option>
                    <option value="GEOCare">GEO Care</option>
                    <option value="Gharuda">Gharuda Software</option>
                    <option value="Zen">Zen Publications</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select form-select-sm" id="filterDealPeriod">
                    <option value="this-quarter">This Quarter</option>
                    <option value="this-month">This Month</option>
                    <option value="this-year">Full Year 2026</option>
                </select>
            </div>
            <div class="col-md-3 text-md-end">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="location.reload();">
                    <i class="bi bi-arrow-clockwise me-1"></i>Reset Filters
                </button>
            </div>
        </div>
    </div>

    <!-- Deals Kanban Pipeline Columns -->
    <div class="d-flex gap-3 overflow-auto pb-4" style="min-height: 520px;">
        <!-- Column 1: Discovery / Qualified (20%) -->
        <div class="flex-shrink-0" style="width: 290px;">
            <div class="card border-0 shadow-sm rounded-3 bg-light-subtle h-100">
                <div class="card-header bg-transparent border-0 p-3 pb-2 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">1. Discovery / Qualified</h6>
                        <span class="text-muted small">₹14,50,000 &middot; 4 deals</span>
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary">20%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2">
                    <div class="card border shadow-sm p-3 rounded-3 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-primary-subtle text-primary small">Enterprise</span>
                            <span class="fw-bold text-primary">₹5,00,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">CRM Cloud Migration Pack</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Power Spares Eng.</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 20-Mar</span>
                            <span class="badge rounded-circle bg-primary text-white" style="width:24px;height:24px;line-height:24px;padding:0;">H</span>
                        </div>
                    </div>

                    <div class="card border shadow-sm p-3 rounded-3 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-info-subtle text-info small">SME</span>
                            <span class="fw-bold text-primary">₹3,50,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Website ERP Portal Revamp</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Anand Associates</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 28-Mar</span>
                            <span class="badge rounded-circle bg-info text-white" style="width:24px;height:24px;line-height:24px;padding:0;">D</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 2: Demo / Meeting Scheduled (40%) -->
        <div class="flex-shrink-0" style="width: 290px;">
            <div class="card border-0 shadow-sm rounded-3 bg-light-subtle h-100">
                <div class="card-header bg-transparent border-0 p-3 pb-2 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">2. Demo &amp; Evaluation</h6>
                        <span class="text-muted small">₹22,00,000 &middot; 3 deals</span>
                    </div>
                    <span class="badge bg-info-subtle text-info">40%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2">
                    <div class="card border shadow-sm p-3 rounded-3 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-danger-subtle text-danger small">Urgent</span>
                            <span class="fw-bold text-primary">₹12,00,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Annual AMC &amp; Tech SLA</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Hindustan Hydraulics</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 15-Mar</span>
                            <span class="badge rounded-circle bg-success text-white" style="width:24px;height:24px;line-height:24px;padding:0;">K</span>
                        </div>
                    </div>

                    <div class="card border shadow-sm p-3 rounded-3 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-primary-subtle text-primary small">Software</span>
                            <span class="fw-bold text-primary">₹6,50,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Inventory Barcode Add-on</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Kumar &amp; Sons</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 22-Mar</span>
                            <span class="badge rounded-circle bg-warning text-white" style="width:24px;height:24px;line-height:24px;padding:0;">P</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 3: Proposal / Quote Sent (60%) -->
        <div class="flex-shrink-0" style="width: 290px;">
            <div class="card border-0 shadow-sm rounded-3 bg-light-subtle h-100">
                <div class="card-header bg-transparent border-0 p-3 pb-2 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">3. Proposal Sent</h6>
                        <span class="text-muted small">₹28,75,000 &middot; 4 deals</span>
                    </div>
                    <span class="badge bg-warning-subtle text-warning">60%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2">
                    <div class="card border shadow-sm p-3 rounded-3 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-success-subtle text-success small">Quote #084</span>
                            <span class="fw-bold text-primary">₹8,90,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Digital Journal Publishing Engine</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Zen Publications</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 10-Mar</span>
                            <span class="badge rounded-circle bg-primary text-white" style="width:24px;height:24px;line-height:24px;padding:0;">H</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 4: Negotiation (80%) -->
        <div class="flex-shrink-0" style="width: 290px;">
            <div class="card border-0 shadow-sm rounded-3 bg-light-subtle h-100">
                <div class="card-header bg-transparent border-0 p-3 pb-2 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">4. Negotiation</h6>
                        <span class="text-muted small">₹11,00,000 &middot; 2 deals</span>
                    </div>
                    <span class="badge bg-primary-subtle text-primary">80%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2">
                    <div class="card border shadow-sm p-3 rounded-3 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-warning-subtle text-warning small">Terms Review</span>
                            <span class="fw-bold text-primary">₹6,20,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Mobile App iOS &amp; Android</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Lakshmi Pharma</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 05-Mar</span>
                            <span class="badge rounded-circle bg-info text-white" style="width:24px;height:24px;line-height:24px;padding:0;">D</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 5: Closed Won (100%) -->
        <div class="flex-shrink-0" style="width: 290px;">
            <div class="card border-0 shadow-sm rounded-3 bg-light-subtle h-100">
                <div class="card-header bg-transparent border-0 p-3 pb-2 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">5. Closed Won</h6>
                        <span class="text-muted small">₹18,25,000 &middot; 5 deals</span>
                    </div>
                    <span class="badge bg-success-subtle text-success">100%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2">
                    <div class="card border shadow-sm p-3 rounded-3 bg-white border-success">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-success text-white small"><i class="bi bi-check2"></i> Won</span>
                            <span class="fw-bold text-success">₹7,50,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">API Microservices Gateway</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>GHARUDA soft</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <a href="projects-list.php" class="btn btn-sm btn-outline-success py-0 px-2" style="font-size:11px;">Create Project</a>
                            <span class="badge rounded-circle bg-success text-white" style="width:24px;height:24px;line-height:24px;padding:0;">Y</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: New Deal -->
<div class="modal fade" id="newDealModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Create New Opportunity / Deal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="newDealForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Deal Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="e.g. ERP Cloud Migration" required>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small">Deal Value (₹) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="500000" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small">Expected Close Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Client / Lead Account</label>
                        <select class="form-select select2">
                            <option value="">Select Account</option>
                            <option value="1">Power Spares Engineering</option>
                            <option value="2">Zen Publications</option>
                            <option value="3">Hindustan Hydraulics</option>
                            <option value="4">Anand Associates</option>
                        </select>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small">Pipeline Stage</label>
                            <select class="form-select">
                                <option value="1">Discovery / Qualified</option>
                                <option value="2">Demo &amp; Evaluation</option>
                                <option value="3">Proposal Sent</option>
                                <option value="4">Negotiation</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small">Sales Rep</label>
                            <select class="form-select select2">
                                <option value="Harish">Harish D.</option>
                                <option value="Divya">Divya A.</option>
                                <option value="Karthik">Karthik R.</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Opportunity</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
