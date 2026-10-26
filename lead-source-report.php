<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Lead Source Report</h1>
        </div>
    </div>

    <!-- Filters -->
    <form method="get" class="card border-0 shadow-sm rounded-3 p-3 mb-3 filters-card" autocomplete="off">
        <div class="row g-3 align-items-end">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="lsrFrom">From Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="lsrFrom" name="from"
                        value="17-10-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="lsrTo">To Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="lsrTo" name="to"
                        value="17-10-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary flex-fill" id="lsrClear">Clear</button>
                    <button type="submit" class="btn btn-primary flex-fill"><i
                            class="bi bi-search me-1"></i>Search</button>
                </div>
            </div>
        </div>
    </form>

    <!-- ===== View tabs ===== -->
    <div class="lsr-tabs" id="lsrTabs">
        <button type="button" class="lsr-tab active" data-tab="overview"><i
                class="bi bi-speedometer2"></i>Overview</button>
        <button type="button" class="lsr-tab" data-tab="sources"><i class="bi bi-grid-3x3-gap-fill"></i>All
            Sources</button>
    </div>

    <!-- ============ PANEL: Overview ============ -->
    <div class="lsr-panel active" id="lsrPanel-overview">

        <div class="card border-0 bg-primary text-white rounded-3 p-4 mb-3 shadow-sm position-relative overflow-hidden">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 position-relative" style="z-index: 1;">
                <div>
                    <small class="text-white-50 text-uppercase fw-bold" style="letter-spacing: 0.8px;">Total leads across all sources</small>
                    <div class="display-5 fw-bold text-white mt-1">143</div>
                    <small class="text-white-50 mt-1 d-block lsr-hero-sub"><i class="bi bi-calendar3 me-1"></i>17-10-2026 · combined result</small>
                </div>
                <div class="d-flex gap-2 flex-wrap">
                    <div class="bg-white bg-opacity-25 rounded-3 p-2 px-3 text-center border border-white border-opacity-25">
                        <div class="fs-5 fw-bold text-white">17</div>
                        <small class="text-white-50">Sources</small>
                    </div>
                    <div class="bg-white bg-opacity-25 rounded-3 p-2 px-3 text-center border border-white border-opacity-25">
                        <div class="fs-5 fw-bold text-white text-truncate" style="max-width: 140px;" title="INDIAMART">INDIAMART</div>
                        <small class="text-white-50">Top source</small>
                    </div>
                    <div class="bg-white bg-opacity-25 rounded-3 p-2 px-3 text-center border border-white border-opacity-25">
                        <div class="fs-5 fw-bold text-white">8.4</div>
                        <small class="text-white-50">Avg / source</small>
                    </div>
                </div>
            </div>
        </div>
            <div class="lsr-hero-stats">
                <div class="lsr-hero-chip"><b>17</b>Sources</div>
                <div class="lsr-hero-chip"><b title="INDIAMART">INDIAMART</b>Top source</div>
                <div class="lsr-hero-chip"><b>8.4</b>Avg / source</div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
    <span class="badge bg-success-subtle text-success p-3 rounded-3 fs-5"><i class="bi bi-person-check-fill"></i></span>
    <div>
        <div class="fs-4 fw-bold text-dark">25</div>
        <small class="text-muted fw-semibold">Customer</small>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill ms-auto px-3 py-1">17%</span>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
    <span class="badge bg-primary-subtle text-primary p-3 rounded-3 fs-5"><i class="bi bi-person-fill"></i></span>
    <div>
        <div class="fs-4 fw-bold text-dark">101</div>
        <small class="text-muted fw-semibold">Lead</small>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill ms-auto px-3 py-1">71%</span>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
    <span class="badge bg-info-subtle text-info p-3 rounded-3 fs-5"><i class="bi bi-file-earmark-text"></i></span>
    <div>
        <div class="fs-4 fw-bold text-dark">8</div>
        <small class="text-muted fw-semibold">Quotation</small>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill ms-auto px-3 py-1">6%</span>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
    <span class="badge bg-warning-subtle text-warning p-3 rounded-3 fs-5"><i class="bi bi-hourglass-split"></i></span>
    <div>
        <div class="fs-4 fw-bold text-dark">1</div>
        <small class="text-muted fw-semibold">Waiting for Response</small>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill ms-auto px-3 py-1">1%</span>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
    <span class="badge bg-success-subtle text-success p-3 rounded-3 fs-5"><i class="bi bi-arrow-repeat"></i></span>
    <div>
        <div class="fs-4 fw-bold text-dark">4</div>
        <small class="text-muted fw-semibold">Followup</small>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill ms-auto px-3 py-1">3%</span>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
    <span class="badge bg-primary-subtle text-primary p-3 rounded-3 fs-5"><i class="bi bi-patch-check-fill"></i></span>
    <div>
        <div class="fs-4 fw-bold text-dark">0</div>
        <small class="text-muted fw-semibold">Qualified</small>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill ms-auto px-3 py-1">0%</span>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
    <span class="badge bg-danger-subtle text-danger p-3 rounded-3 fs-5"><i class="bi bi-signpost-2-fill"></i></span>
    <div>
        <div class="fs-4 fw-bold text-dark">1</div>
        <small class="text-muted fw-semibold">DIRECT</small>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill ms-auto px-3 py-1">1%</span>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
    <span class="badge bg-info-subtle text-info p-3 rounded-3 fs-5"><i class="bi bi-envelope-plus-fill"></i></span>
    <div>
        <div class="fs-4 fw-bold text-dark">0</div>
        <small class="text-muted fw-semibold">New Enquiry</small>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill ms-auto px-3 py-1">0%</span>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 d-flex flex-row align-items-center gap-3">
    <span class="badge bg-warning-subtle text-warning p-3 rounded-3 fs-5"><i class="bi bi-stars"></i></span>
    <div>
        <div class="fs-4 fw-bold text-dark">3</div>
        <small class="text-muted fw-semibold">New</small>
    </div>
    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill ms-auto px-3 py-1">2%</span>
</div>
            </div>
        </div>
    </div>

    <!-- ============ PANEL: All Sources ============ -->
    <div class="lsr-panel" id="lsrPanel-sources">

        <!-- Source cards -->
        <div class="row g-3">
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-warning-subtle text-dark border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="TOTAL">TOTAL</h6>
        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3">143</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">25</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">101</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">8</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">4</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">3</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="AGENCY">AGENCY</h6>
        <span class="badge bg-light text-secondary border rounded-pill px-3">0</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="DEMO">DEMO</h6>
        <span class="badge bg-light text-secondary border rounded-pill px-3">0</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="DIGITAL ADS">DIGITAL ADS</h6>
        <span class="badge bg-light text-secondary border rounded-pill px-3">0</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="DIRECT">DIRECT</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">8</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">3</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">3</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="EXIHIBITION">EXIHIBITION</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">3</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">2</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="FACEBOOK">FACEBOOK</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">1</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="FACEBOOK LEAD ADS">FACEBOOK LEAD ADS</h6>
        <span class="badge bg-light text-secondary border rounded-pill px-3">0</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="GOKUL(REFERENCE)">GOKUL(REFERENCE)</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">1</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="GOOGLE">GOOGLE</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">1</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="INDIAMART">INDIAMART</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">122</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">17</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">97</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">4</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">3</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="INSTA">INSTA</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">3</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">3</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="JUSTDIAL">JUSTDIAL</h6>
        <span class="badge bg-light text-secondary border rounded-pill px-3">0</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="LINKEDIN">LINKEDIN</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">1</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="MAIL">MAIL</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">2</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="MARKET">MARKET</h6>
        <span class="badge bg-light text-secondary border rounded-pill px-3">0</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="OFFICE VISIT">OFFICE VISIT</h6>
        <span class="badge bg-light text-secondary border rounded-pill px-3">0</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 overflow-hidden">
    <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
        <h6 class="fw-bold mb-0 text-dark text-truncate" title="TELEGRAM">TELEGRAM</h6>
        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3">1</span>
    </div>
    <div class="card-body p-3">
        <ul class="list-group list-group-flush border rounded-3 overflow-hidden">
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Customer</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Lead</span>
                    <span class="badge bg-primary-subtle text-primary fw-bold">1</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Quotation</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Waiting for Response</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Followup</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">Qualified</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">DIRECT</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New Enquiry</span>
                    <span class="text-muted">0</span>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between py-2 small">
                    <span class="text-muted">New</span>
                    <span class="text-muted">0</span>
                </li>
        </ul>
    </div>
</div>
            </div>
        </div>
    </div><!-- /lsrPanel-sources -->
</main>

<?php include 'footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // View tabs: Overview / All Sources (Hide & Show via JavaScript)
        var tabBtns = document.querySelectorAll("#lsrTabs .lsr-tab");
        var panels = document.querySelectorAll(".lsr-panel");

        tabBtns.forEach(function (tab) {
            tab.addEventListener("click", function (e) {
                e.preventDefault();
                tabBtns.forEach(function (t) { t.classList.remove("active"); });
                tab.classList.add("active");

                var targetTab = tab.getAttribute("data-tab");
                panels.forEach(function (p) {
                    if (p.id === "lsrPanel-" + targetTab) {
                        p.classList.add("active");
                        p.style.display = "block";
                    } else {
                        p.classList.remove("active");
                        p.style.display = "none";
                    }
                });
            });
        });

        // Filter search / clear client-side handling
        var filterForm = document.querySelector(".filters-card");
        var fromInput = document.getElementById("lsrFrom");
        var toInput = document.getElementById("lsrTo");
        var dateRangeLabel = document.querySelector(".lsr-date-range");
        var heroDateSub = document.querySelector(".lsr-hero-sub");

        if (filterForm) {
            filterForm.addEventListener("submit", function (e) {
                e.preventDefault();
                var fromVal = fromInput ? fromInput.value.trim() : "";
                var toVal = toInput ? toInput.value.trim() : "";
                var label = (fromVal && toVal && fromVal !== toVal) ? (fromVal + " to " + toVal) : (fromVal || toVal || "17-10-2026");
                if (dateRangeLabel) {
                    dateRangeLabel.innerHTML = '<i class="bi bi-calendar3 me-1"></i>Date: ' + label;
                }
                if (heroDateSub) {
                    heroDateSub.innerHTML = '<i class="bi bi-calendar3 me-1"></i>' + label + ' · combined result';
                }
            });
        }

        var clearBtn = document.getElementById("lsrClear");
        if (clearBtn) {
            clearBtn.addEventListener("click", function (e) {
                e.preventDefault();
                var today = "17-10-2026";
                if (fromInput) fromInput.value = today;
                if (toInput) toInput.value = today;
                if (dateRangeLabel) {
                    dateRangeLabel.innerHTML = '<i class="bi bi-calendar3 me-1"></i>Date: ' + today;
                }
                if (heroDateSub) {
                    heroDateSub.innerHTML = '<i class="bi bi-calendar3 me-1"></i>' + today + ' · combined result';
                }
            });
        }
    });
</script>