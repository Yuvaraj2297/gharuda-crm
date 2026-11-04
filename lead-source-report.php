<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Single-Row Enterprise Page Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip bg-primary-subtle text-primary d-flex align-items-center justify-content-center rounded-3" style="width:42px;height:42px;">
                <i class="bi bi-diagram-3 fs-5"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title">Lead Source Report</h1>
                <p class="text-muted font-12 mb-0">Inbound channel performance, source-wise stage distribution &amp; conversion metrics</p>
            </div>
        </div>

        <div class="d-flex align-items-center flex-wrap gap-2">
            <!-- View Switcher Pills -->
            <ul class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="lsrTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link active lsr-tab rounded-pill px-3 py-1 font-12 fw-semibold" data-tab="overview">
                        <i class="bi bi-speedometer2 me-1"></i>Overview
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link lsr-tab rounded-pill px-3 py-1 font-12 fw-semibold" data-tab="sources">
                        <i class="bi bi-grid-3x3-gap-fill me-1"></i>All Sources
                    </button>
                </li>
            </ul>

            <!-- Offcanvas Filter Button -->
            <button type="button" class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs" data-bs-toggle="offcanvas" data-bs-target="#lsrFilterOffcanvas">
                <i class="bi bi-funnel text-primary"></i>
                <span>Filters</span>
                <span class="badge rounded-pill bg-primary text-white font-10 d-none" id="lsrFilterCountBadge">0</span>
            </button>

            <button type="button" class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs" onclick="window.print()">
                <i class="bi bi-printer text-secondary"></i>
                <span>Print</span>
            </button>
        </div>
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

    <!-- Slide-Over Offcanvas Filter Drawer -->
    <div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="lsrFilterOffcanvas" aria-labelledby="lsrFilterOffcanvasLabel" style="width: 380px;">
        <div class="offcanvas-header border-bottom bg-light py-3 px-4">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-chip bg-primary-subtle text-primary rounded-2 d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                    <i class="bi bi-sliders"></i>
                </div>
                <div>
                    <h6 class="offcanvas-title fw-bold mb-0 font-14" id="lsrFilterOffcanvasLabel">Filter Lead Source Report</h6>
                    <span class="text-muted font-11">Filter by source name &amp; date range</span>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-4 py-3">
            <form class="filters-card" autocomplete="off" onsubmit="return false;">
                <div class="mb-3">
                    <label class="form-label font-12 fw-semibold text-secondary mb-1" for="lsrSourceFilter">Lead Source</label>
                    <input type="text" class="form-control font-13" id="lsrSourceFilter" placeholder="e.g., INDIAMART, DIRECT, GOOGLE...">
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="lsrFrom">From Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="lsrFrom" name="from" value="17-10-2026" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="lsrTo">To Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="lsrTo" name="to" value="17-10-2026" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="offcanvas-footer border-top bg-light p-3 d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-semibold font-13" id="lsrClear">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
            </button>
            <button type="button" class="btn btn-primary flex-fill fw-semibold font-13" id="lsrApplyBtn" data-bs-dismiss="offcanvas">
                <i class="bi bi-check2-circle me-1"></i>Apply Filters
            </button>
        </div>
    </div>
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
        var DEFAULT_DATE = "17-10-2026";
        var sourceInput = document.getElementById("lsrSourceFilter");
        var fromInput = document.getElementById("lsrFrom");
        var toInput = document.getElementById("lsrTo");
        var heroDateSub = document.querySelector(".lsr-hero-sub");
        var applyBtn = document.getElementById("lsrApplyBtn");
        var clearBtn = document.getElementById("lsrClear");
        var badge = document.getElementById("lsrFilterCountBadge");

        function applyLsrFilter() {
            var srcVal = sourceInput ? sourceInput.value.trim().toLowerCase() : "";
            var fromVal = fromInput ? fromInput.value.trim() : "";
            var toVal = toInput ? toInput.value.trim() : "";

            var count = 0;
            if (srcVal) count++;
            if (fromVal && fromVal !== DEFAULT_DATE) count++;
            if (toVal && toVal !== DEFAULT_DATE) count++;
            if (badge) {
                badge.textContent = count;
                badge.classList.toggle("d-none", count === 0);
            }

            var label = (fromVal && toVal && fromVal !== toVal) ? (fromVal + " to " + toVal) : (fromVal || toVal || DEFAULT_DATE);
            if (heroDateSub) {
                heroDateSub.innerHTML = '<i class="bi bi-calendar3 me-1"></i>' + label + ' · combined result';
            }

            var sourceCards = document.querySelectorAll("#lsrPanel-sources .col-xl-4");
            sourceCards.forEach(function (col) {
                var titleEl = col.querySelector("h6");
                var titleTxt = titleEl ? titleEl.textContent.toLowerCase() : "";
                if (!srcVal || titleTxt.indexOf(srcVal) !== -1) {
                    col.classList.remove("d-none");
                } else {
                    col.classList.add("d-none");
                }
            });
        }

        if (applyBtn) {
            applyBtn.addEventListener("click", applyLsrFilter);
        }

        if (clearBtn) {
            clearBtn.addEventListener("click", function (e) {
                e.preventDefault();
                if (sourceInput) sourceInput.value = "";
                if (fromInput) fromInput.value = DEFAULT_DATE;
                if (toInput) toInput.value = DEFAULT_DATE;
                applyLsrFilter();
            });
        }
    });
</script>