<?php include 'header.php'; ?>
<style>
/* Scoped interactive styling for lead page components */
.ld-tab-panel:not(.active), .ap-panel:not(.active) { display: none !important; }
.ld-nav { display: flex; align-items: center; gap: 0.5rem; width: 100%; padding: 0.5rem 0.75rem; border: none; background: transparent; border-radius: 0.375rem; color: #495057; font-size: 0.875rem; text-align: left; transition: all 0.15s ease-in-out; }
.ld-nav:hover { background-color: #f8f9fa; color: #0d6efd; }
.ld-nav.active { background-color: #e7f1ff !important; color: #0d6efd !important; font-weight: 600; }
.ld-nav .badge { margin-left: auto; font-size: 0.75rem; }
.ld-pipe-step { display: inline-flex; align-items: center; gap: 0.25rem; padding: 0.35rem 0.75rem; border-radius: 50rem; font-size: 0.8125rem; font-weight: 500; }
.ld-pipe-step.done { background-color: #d1e7dd; color: #0f5132; }
.ld-pipe-step.current { background-color: #cfe2ff; color: #084298; font-weight: 600; }
.ld-pipe-step.pending { background-color: #f8f9fa; color: #6c757d; border: 1px dashed #ced4da; }
.ap-green-btn { background-color: #198754; color: #fff; border: 1px solid #198754; }
.ap-green-btn:hover { background-color: #157347; color: #fff; }
.ap-gray-btn { background-color: #f8f9fa; color: #212529; border: 1px solid #dee2e6; }
.ap-gray-btn:hover { background-color: #e9ecef; }
.ap-icon-btn { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 6px; border: 1px solid #dee2e6; background: #fff; color: #495057; cursor: pointer; }
.ap-icon-btn:hover { background-color: #f8f9fa; color: #0d6efd; }
.ap-dtab { padding: 0.35rem 0.85rem; border: 1px solid #dee2e6; background: #fff; border-radius: 0.375rem; color: #495057; font-size: 0.875rem; font-weight: 500; cursor: pointer; }
.ap-dtab:hover { background-color: #f8f9fa; }
.ap-dtab.active { background-color: #0d6efd !important; border-color: #0d6efd !important; color: #fff !important; }
.ld-prop-status { display: inline-block; padding: 0.2rem 0.55rem; border-radius: 50rem; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; }
.ld-prop-status.draft { background-color: #e2e3e5; color: #41464b; }
.ld-prop-status.accepted { background-color: #d1e7dd; color: #0f5132; }
.ld-prop-status.sent { background-color: #cff4fc; color: #055160; }
.ld-prop-status.rejected { background-color: #f8d7da; color: #842029; }
.apv-sign-canvas-wrap { position: relative; border: 1px dashed #ced4da; border-radius: 6px; background: #fafafa; height: 160px; }
.apv-sign-canvas-wrap canvas { width: 100%; height: 100%; }
.apv-sign-placeholder { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #adb5bd; pointer-events: none; font-size: 0.875rem; }
.af-drop, .at2-drop, .tk-drop { border: 2px dashed #ced4da; border-radius: 8px; padding: 1.5rem; text-align: center; background: #f8f9fa; cursor: pointer; transition: border-color .15s; }
.af-drop:hover, .at2-drop:hover, .tk-drop:hover { border-color: #0d6efd; background: #f1f7ff; }
.nl-tags-wrap { display: flex; flex-wrap: wrap; align-items: center; gap: 0.25rem; padding: 0.375rem 0.75rem; border: 1px solid #ced4da; border-radius: 0.375rem; background: #fff; min-height: 38px; }
.nl-tags-chips { display: flex; flex-wrap: wrap; gap: 0.25rem; }
.nl-tag-chip { display: inline-flex; align-items: center; gap: 0.25rem; background: #e9ecef; color: #495057; border-radius: 50rem; padding: 0.15rem 0.5rem; font-size: 0.75rem; font-weight: 500; }
.nl-tag-x { cursor: pointer; opacity: 0.6; } .nl-tag-x:hover { opacity: 1; }
.nl-tags-input { border: none; outline: none; background: transparent; flex-grow: 1; min-width: 120px; font-size: 0.875rem; padding: 0; }
</style>



<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div class="d-flex align-items-center gap-3">
        <div>
            <h1 class="font-display fw-bold mb-1 page-title page-title-lead">Lead Management</h1>
        </div>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <button type="button" class="btn btn-primary btn-new-lead" data-bs-toggle="modal" data-bs-target="#newLeadModal">
            <i class="bi bi-plus-lg me-1"></i> New Lead
        </button>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#importLeadsModal">
            <i class="bi bi-upload me-1"></i> Import Leads
        </button>
        <!-- <button type="button" class="btn btn-outline-secondary" id="formSyncBtn">
            <i class="bi bi-arrow-repeat me-1"></i> Form Sync
        </button> -->
    </div>
</div>

<!-- ===== Page view tabs ===== -->
<div class="d-flex gap-2 mb-3 border-bottom pb-2" id="lpTabs">
    <button type="button" class="btn btn-sm btn-primary lp-tab active" data-tab="leads"><i class="bi bi-table me-1"></i>All Leads</button>
    <button type="button" class="btn btn-sm btn-outline-primary lp-tab" data-tab="stats"><i class="bi bi-grid-3x3-gap-fill me-1"></i>Activity Stats</button>
</div>

<!-- ===== PANEL: Activity Stats ===== -->
<div class="lp-panel" id="lpPanel-stats">

    <!-- ===== Activity / Pipeline Stats — source-report style group cards ===== -->
    <div class="row g-3">
        <!-- Follow Up -->
        <div class="col-xl-4 col-md-6">
            <div class="card border shadow-sm h-100">
                <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-arrow-repeat text-primary fs-5"></i>
                        <span>Follow Up</span>
                    </div>
                    <span class="badge bg-primary-subtle text-primary rounded-pill">1</span>
                </div>
                <div class="card-body p-3">
                    <div class="text-uppercase text-muted fw-bold small mb-2">Actual</div>
                    <div class="d-flex gap-2 mb-3">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open fu-link" data-group="Follow Up" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-dark">0</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open fu-link" data-group="Follow Up" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-dark">0</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open fu-link" data-group="Follow Up" data-period="Monthly" data-range="monthly"><div class="small text-muted mb-1">Monthly</div><div class="fs-5 fw-bold text-primary">1</div></div>
                    </div>
                    <div class="text-uppercase text-muted fw-bold small mb-2">Completed</div>
                    <div class="d-flex gap-2">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open fu-link is-danger" data-group="Follow Up (Completed)" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-danger">0</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open fu-link" data-group="Follow Up (Completed)" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-muted">-</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open fu-link" data-group="Follow Up (Completed)" data-period="Monthly" data-range="monthly"><div class="small text-muted mb-1">Monthly</div><div class="fs-5 fw-bold text-muted">-</div></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment -->
        <div class="col-xl-4 col-md-6">
            <div class="card border shadow-sm h-100">
                <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-calendar2-week text-info fs-5"></i>
                        <span>Appointment</span>
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary rounded-pill">0</span>
                </div>
                <div class="card-body p-3">
                    <div class="text-uppercase text-muted fw-bold small mb-2">Actual</div>
                    <div class="d-flex gap-2 mb-3">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Appointment" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-dark">0</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Appointment" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-dark">0</div></div>
                    </div>
                    <div class="text-uppercase text-muted fw-bold small mb-2">Completed</div>
                    <div class="d-flex gap-2">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open is-danger" data-group="Appointment (Completed)" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-danger">0</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Appointment (Completed)" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-muted">0</div></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Calls (Activity) -->
        <div class="col-xl-4 col-md-6">
            <div class="card border shadow-sm h-100">
                <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-telephone-outbound text-warning fs-5"></i>
                        <span>Calls (Activity)</span>
                    </div>
                    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">3</span>
                </div>
                <div class="card-body p-3">
                    <div class="text-uppercase text-muted fw-bold small mb-2">Actual</div>
                    <div class="d-flex gap-2 mb-3">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Calls" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-dark">1</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Calls" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-dark">2</div></div>
                    </div>
                    <div class="text-uppercase text-muted fw-bold small mb-2">Completed</div>
                    <div class="d-flex gap-2">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Calls (Completed)" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-muted">-</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Calls (Completed)" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-muted">-</div></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hot Lead -->
        <div class="col-xl-4 col-md-6">
            <div class="card border shadow-sm h-100">
                <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-fire text-danger fs-5"></i>
                        <span>Hot Lead</span>
                    </div>
                    <span class="badge bg-danger-subtle text-danger rounded-pill">1</span>
                </div>
                <div class="card-body p-3">
                    <div class="text-uppercase text-muted fw-bold small mb-2">Actual</div>
                    <div class="d-flex gap-2 mb-3">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Hot Lead" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-dark">1</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Hot Lead" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-dark">1</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Hot Lead" data-period="Monthly" data-range="monthly"><div class="small text-muted mb-1">Monthly</div><div class="fs-5 fw-bold text-danger">1</div></div>
                    </div>
                    <div class="text-uppercase text-muted fw-bold small mb-2">Completed</div>
                    <div class="d-flex gap-2">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Hot Lead (Completed)" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-muted">-</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Hot Lead (Completed)" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-muted">-</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Hot Lead (Completed)" data-period="Monthly" data-range="monthly"><div class="small text-muted mb-1">Monthly</div><div class="fs-5 fw-bold text-muted">-</div></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Won -->
        <div class="col-xl-4 col-md-6">
            <div class="card border shadow-sm h-100">
                <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-trophy text-success fs-5"></i>
                        <span>Won</span>
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary rounded-pill">0</span>
                </div>
                <div class="card-body p-3">
                    <div class="text-uppercase text-muted fw-bold small mb-2">Actual</div>
                    <div class="d-flex gap-2 mb-3">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Won" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-dark">0 / ₹0.00</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Won" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-dark">0 / ₹0.00</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Won" data-period="Monthly" data-range="monthly"><div class="small text-muted mb-1">Monthly</div><div class="fs-5 fw-bold text-dark">0 / ₹0.00</div></div>
                    </div>
                    <div class="text-uppercase text-muted fw-bold small mb-2">Completed</div>
                    <div class="d-flex gap-2">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Won (Completed)" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-muted">-</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Won (Completed)" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-muted">-</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Won (Completed)" data-period="Monthly" data-range="monthly"><div class="small text-muted mb-1">Monthly</div><div class="fs-5 fw-bold text-muted">-</div></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Expected Closure -->
        <div class="col-xl-4 col-md-6">
            <div class="card border shadow-sm h-100">
                <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-flag text-primary fs-5"></i>
                        <span>Expected Closure</span>
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary rounded-pill">0</span>
                </div>
                <div class="card-body p-3">
                    <div class="text-uppercase text-muted fw-bold small mb-2">Actual</div>
                    <div class="d-flex gap-2 mb-3">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Expected Closure" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-dark">0 / ₹0.00</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Expected Closure" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-dark">0 / ₹0.00</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Expected Closure" data-period="Monthly" data-range="monthly"><div class="small text-muted mb-1">Monthly</div><div class="fs-5 fw-bold text-dark">0 / ₹0.00</div></div>
                    </div>
                    <div class="text-uppercase text-muted fw-bold small mb-2">Completed</div>
                    <div class="d-flex gap-2">
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Expected Closure (Completed)" data-period="Today" data-range="today"><div class="small text-muted mb-1">Today</div><div class="fs-5 fw-bold text-muted">-</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Expected Closure (Completed)" data-period="Weekly" data-range="weekly"><div class="small text-muted mb-1">Weekly</div><div class="fs-5 fw-bold text-muted">-</div></div>
                        <div class="flex-fill p-2 border rounded text-center bg-light-subtle cursor-pointer ast-open" data-group="Expected Closure (Completed)" data-period="Monthly" data-range="monthly"><div class="small text-muted mb-1">Monthly</div><div class="fs-5 fw-bold text-muted">-</div></div>
                    </div>
                </div>
            </div>
        </div>
</div>

</div><!-- /lpPanel-stats -->

<!-- ===== PANEL: All Leads ===== -->
<div class="lp-panel active" id="lpPanel-leads">

    <!-- ===== Filters card ===== -->
    <div class="card-custom mb-3 filters-card d-flex flex-column">
        <button type="button" class="filters-toggle-btn ms-auto" id="leadFilterToggle">
            <i class="bi bi-funnel"></i>
            <span>Filter by</span>
            <i class="bi bi-chevron-down chevron"></i>
        </button>
        <div class="filters-collapse" id="leadFilterCollapse">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">Staff Members</label>
                    <select class="form-select select2" id="filterStaff" data-label="Assigned">
                        <option value="">Assigned</option>
                        <option>Harish D.</option>
                        <option>Divya A.</option>
                        <option>Karthik R.</option>
                        <option>Priya S.</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">Sourcer</label>
                    <select class="form-select select2" id="filterSourcer" data-label="Sourcer">
                        <option value="">Sourcer</option>
                        <option>Harish D.</option>
                        <option>Website Form</option>
                        <option>Facebook Ads</option>
                        <option>Referral</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">Lead Status</label>
                    <select class="form-select select2" id="filterStatus" multiple data-label="Status">
                        <option selected>Lead</option>
                        <option selected>Quotation</option>
                        <option selected>Followup</option>
                        <option selected>Qualified</option>
                        <option selected>DIRECT</option>
                        <option>Negotiation</option>
                        <option>Won</option>
                        <option>Lost</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">Lead Score</label>
                    <select class="form-select select2" id="filterSource" data-label="Source">
                        <option value="">Source</option>
                        <option>Website</option>
                        <option>Facebook Ads</option>
                        <option>Google Ads</option>
                        <option>Referral</option>
                        <option>Walk-in</option>
                        <option>Cold Call</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">From date</label>
                    <input type="date" class="form-control" id="filterFromDate">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">To date</label>
                    <input type="date" class="form-control" id="filterToDate">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">Lead Type</label>
                    <select class="form-select select2" id="filterType" data-label="Lead Type">
                        <option value="">Additional Filters</option>
                        <option>Hot Lead</option>
                        <option>Warm Lead</option>
                        <option>Cold Lead</option>
                        <option>Repeat Customer</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">Closure Date Period</label>
                    <select class="form-select select2" id="filterClosurePeriod" data-label="Closure Period">
                        <option>All Time</option>
                        <option>This Week</option>
                        <option>This Month</option>
                        <option>This Quarter</option>
                        <option>This Year</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label">Last Contact</label>
                    <select class="form-select select2" id="filterLastContact" data-label="Last Contact">
                        <option>All Time</option>
                        <option>Today</option>
                        <option>This Week</option>
                        <option>This Month</option>
                        <option>This Quarter</option>
                        <option>This Year</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 align-self-end">
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-reject flex-fill text-nowrap" id="clearLeadFilters">Clear Filters</button>
                        <button type="button" class="btn btn-primary flex-fill text-nowrap" id="applyLeadFilters">
                            <i class="bi bi-funnel"></i> Apply
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active filters bar -->
    <div class="active-filters-bar" id="leadActiveFilters"></div>

    <!-- ===== Leads Table (MasterTable flow) ===== -->
    <div class="card-custom p-0 overflow-hidden">

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" id="leadsTable" data-table-name="Leads">
                <thead>
                    <tr>
                        <th class="text-nowrap">S.No</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">Company</th>
                        <th class="text-nowrap">Enquiry Code</th>
                        <th class="text-nowrap">Country</th>
                        <th class="text-nowrap">Stage %</th>
                        <th class="text-nowrap">Next Reminder Date</th>
                        <th class="text-nowrap">Closure Date</th>
                        <th class="text-nowrap">Activity Log</th>
                        <th class="text-nowrap">Phone</th>
                        <th class="text-nowrap">Product</th>
                        <th class="text-nowrap">Value</th>
                        <th class="text-nowrap">Tags</th>
                        <th class="text-nowrap">Assigned</th>
                        <th class="text-nowrap">Sourcer</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Source</th>
                        <th class="text-nowrap">Last Contact</th>
                        <th class="text-nowrap">Created</th>
                        <th class="text-nowrap">Profession</th>
                        <th class="text-nowrap">Lead Score</th>
                        <th class="text-nowrap">Appointment</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody id="leadsTbody">
                <tr data-id="1">
                    <td><span class="fw-semibold">5</span></td>
                    <td><a href="#" class="lead-name-link">Sample Data</a></td>
                    <td>Sample Data</td>
                    <td>Sample Data</td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><div class="stage-ring" style="--pct:0;--ring-color:#e5484d;"><span>0%</span></div></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-tag-pill">tag1</span> <span class="lead-tag-pill">tag2</span></td>
                    <td>Unassigned</td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><div class="dropdown lead-status-dd"><button type="button" class="lead-status-btn" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">Quotation <i class="bi bi-chevron-down fs-10"></i></button><ul class="dropdown-menu lead-status-menu"><li><a class="dropdown-item lead-status-item" href="#" data-val="Lead">Lead</a></li><li><a class="dropdown-item lead-status-item active" href="#" data-val="Quotation">Quotation</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Followup">Followup</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Qualified">Qualified</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="DIRECT">DIRECT</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New Enquiry">New Enquiry</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New">New</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Customer">Customer</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Waiting for Response">Waiting for Response</a></li></ul></div></td>
                    <td>Direct</td>
                    <td><span class="lead-link-text text-nowrap">21-03-2026 16:05:50</span></td>
                    <td><span class="lead-link-text text-nowrap">10-03-2026 12:54:36</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="fw-semibold">0</span></td>
                    <td><button type="button" class="lead-act-btn appt" title="Appointments" data-act="appt" data-id="1"><i class="bi bi-calendar2-week"></i></button></td>
                    <td><div class="d-flex align-items-center gap-1"><button type="button" class="lead-act-btn view" title="View" data-act="view" data-id="1"><i class="bi bi-eye"></i></button><button type="button" class="lead-act-btn edit" title="Edit" data-act="edit" data-id="1"><i class="bi bi-pencil-square"></i></button><button type="button" class="lead-act-btn del" title="Delete" data-act="del" data-id="1"><i class="bi bi-trash"></i></button><button type="button" class="lead-act-btn mail" title="Send to Email" data-act="mail" data-id="1"><i class="bi bi-envelope"></i></button></div></td>
                </tr>
                <tr data-id="2">
                    <td><span class="fw-semibold">4</span></td>
                    <td><a href="#" class="lead-name-link">test</a></td>
                    <td>q</td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td>India</td>
                    <td><div class="stage-ring" style="--pct:0;--ring-color:#e5484d;"><span>0%</span></div></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><a href="tel:8015603089" class="text-decoration-none fw-semibold">8015603089</a></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td>Harish D.</td>
                    <td>Harish D.</td>
                    <td><div class="dropdown lead-status-dd"><button type="button" class="lead-status-btn lead-sel-lead" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">Lead <i class="bi bi-chevron-down fs-10"></i></button><ul class="dropdown-menu lead-status-menu"><li><a class="dropdown-item lead-status-item active" href="#" data-val="Lead">Lead</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Quotation">Quotation</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Followup">Followup</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Qualified">Qualified</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="DIRECT">DIRECT</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New Enquiry">New Enquiry</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New">New</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Customer">Customer</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Waiting for Response">Waiting for Response</a></li></ul></div></td>
                    <td>Indiamart</td>
                    <td><span class="lead-link-text text-nowrap">02-03-2026 15:09:55</span></td>
                    <td><span class="lead-link-text text-nowrap">27-10-2025 10:26:19</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="fw-semibold">0</span></td>
                    <td><button type="button" class="lead-act-btn appt" title="Appointments" data-act="appt" data-id="2"><i class="bi bi-calendar2-week"></i></button></td>
                    <td><div class="d-flex align-items-center gap-1"><button type="button" class="lead-act-btn view" title="View" data-act="view" data-id="2"><i class="bi bi-eye"></i></button><button type="button" class="lead-act-btn edit" title="Edit" data-act="edit" data-id="2"><i class="bi bi-pencil-square"></i></button><button type="button" class="lead-act-btn del" title="Delete" data-act="del" data-id="2"><i class="bi bi-trash"></i></button><button type="button" class="lead-act-btn mail" title="Send to Email" data-act="mail" data-id="2"><i class="bi bi-envelope"></i></button></div></td>
                </tr>
                <tr data-id="3">
                    <td><span class="fw-semibold">3</span></td>
                    <td><a href="#" class="lead-name-link">Arun Kumar</a></td>
                    <td>Vetri Constructions</td>
                    <td>ENQ-0168</td>
                    <td>India</td>
                    <td><div class="stage-ring" style="--pct:65;--ring-color:#f0924a;"><span>65%</span></div></td>
                    <td><span class="text-nowrap">19-Sep-2026</span></td>
                    <td><span class="text-nowrap">30-Sep-2026</span></td>
                    <td><span class="text-nowrap">2 days ago</span></td>
                    <td><a href="tel:9840012345" class="text-decoration-none fw-semibold">9840012345</a></td>
                    <td>ERP Software License</td>
                    <td><span class="fw-bold text-success">₹85,000.00</span></td>
                    <td><span class="lead-tag-pill">Hot Lead</span> <span class="lead-tag-pill">Follow-up</span></td>
                    <td>Divya A.</td>
                    <td>Website Form</td>
                    <td><div class="dropdown lead-status-dd"><button type="button" class="lead-status-btn" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">Quotation <i class="bi bi-chevron-down fs-10"></i></button><ul class="dropdown-menu lead-status-menu"><li><a class="dropdown-item lead-status-item" href="#" data-val="Lead">Lead</a></li><li><a class="dropdown-item lead-status-item active" href="#" data-val="Quotation">Quotation</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Followup">Followup</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Qualified">Qualified</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="DIRECT">DIRECT</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New Enquiry">New Enquiry</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New">New</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Customer">Customer</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Waiting for Response">Waiting for Response</a></li></ul></div></td>
                    <td>Direct</td>
                    <td><span class="lead-link-text text-nowrap">27-04-2026 12:49:13</span></td>
                    <td><span class="lead-link-text text-nowrap">13-01-2026 12:53:55</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="fw-semibold">0</span></td>
                    <td><button type="button" class="lead-act-btn appt" title="Appointments" data-act="appt" data-id="3"><i class="bi bi-calendar2-week"></i></button></td>
                    <td><div class="d-flex align-items-center gap-1"><button type="button" class="lead-act-btn view" title="View" data-act="view" data-id="3"><i class="bi bi-eye"></i></button><button type="button" class="lead-act-btn edit" title="Edit" data-act="edit" data-id="3"><i class="bi bi-pencil-square"></i></button><button type="button" class="lead-act-btn del" title="Delete" data-act="del" data-id="3"><i class="bi bi-trash"></i></button><button type="button" class="lead-act-btn mail" title="Send to Email" data-act="mail" data-id="3"><i class="bi bi-envelope"></i></button></div></td>
                </tr>
                <tr data-id="4">
                    <td><span class="fw-semibold">2</span></td>
                    <td><a href="#" class="lead-name-link">Meena Ramesh</a></td>
                    <td>Sri Lakshmi Traders</td>
                    <td>ENQ-0167</td>
                    <td>India</td>
                    <td><div class="stage-ring" style="--pct:100;--ring-color:#0ca308;"><span>100%</span></div></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="text-nowrap">12-Sep-2026</span></td>
                    <td><span class="text-nowrap">5 days ago</span></td>
                    <td><a href="tel:9884456789" class="text-decoration-none fw-semibold">9884456789</a></td>
                    <td>HRMS Annual Subscription</td>
                    <td><span class="fw-bold text-success">₹141,629.00</span></td>
                    <td><span class="lead-tag-pill">Won</span></td>
                    <td>Karthik R.</td>
                    <td>Referral</td>
                    <td><div class="dropdown lead-status-dd"><button type="button" class="lead-status-btn" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">Quotation <i class="bi bi-chevron-down fs-10"></i></button><ul class="dropdown-menu lead-status-menu"><li><a class="dropdown-item lead-status-item" href="#" data-val="Lead">Lead</a></li><li><a class="dropdown-item lead-status-item active" href="#" data-val="Quotation">Quotation</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Followup">Followup</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Qualified">Qualified</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="DIRECT">DIRECT</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New Enquiry">New Enquiry</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New">New</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Customer">Customer</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Waiting for Response">Waiting for Response</a></li></ul></div></td>
                    <td>Direct</td>
                    <td><span class="lead-link-text text-nowrap">27-03-2026 10:37:58</span></td>
                    <td><span class="lead-link-text text-nowrap">27-03-2026 10:36:21</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="fw-semibold">0</span></td>
                    <td><button type="button" class="lead-act-btn appt" title="Appointments" data-act="appt" data-id="4"><i class="bi bi-calendar2-week"></i></button></td>
                    <td><div class="d-flex align-items-center gap-1"><button type="button" class="lead-act-btn view" title="View" data-act="view" data-id="4"><i class="bi bi-eye"></i></button><button type="button" class="lead-act-btn edit" title="Edit" data-act="edit" data-id="4"><i class="bi bi-pencil-square"></i></button><button type="button" class="lead-act-btn del" title="Delete" data-act="del" data-id="4"><i class="bi bi-trash"></i></button><button type="button" class="lead-act-btn mail" title="Send to Email" data-act="mail" data-id="4"><i class="bi bi-envelope"></i></button></div></td>
                </tr>
                <tr data-id="5">
                    <td><span class="fw-semibold">1</span></td>
                    <td><a href="#" class="lead-name-link">Suresh Babu</a></td>
                    <td>Anna Nagar Builders</td>
                    <td>ENQ-0166</td>
                    <td>India</td>
                    <td><div class="stage-ring" style="--pct:25;--ring-color:#4dabf7;"><span>25%</span></div></td>
                    <td><span class="text-nowrap">22-Sep-2026</span></td>
                    <td><span class="lead-empty-val">—</span></td>
                    <td><span class="text-nowrap">Today</span></td>
                    <td><a href="tel:9500123456" class="text-decoration-none fw-semibold">9500123456</a></td>
                    <td>Payroll Add-on Module</td>
                    <td><span class="fw-bold text-success">₹23,629.00</span></td>
                    <td><span class="lead-tag-pill">Warm Lead</span></td>
                    <td>Divya A.</td>
                    <td>Harish D.</td>
                    <td><div class="dropdown lead-status-dd"><button type="button" class="lead-status-btn lead-sel-lead" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">Lead <i class="bi bi-chevron-down fs-10"></i></button><ul class="dropdown-menu lead-status-menu"><li><a class="dropdown-item lead-status-item active" href="#" data-val="Lead">Lead</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Quotation">Quotation</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Followup">Followup</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Qualified">Qualified</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="DIRECT">DIRECT</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New Enquiry">New Enquiry</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="New">New</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Customer">Customer</a></li><li><a class="dropdown-item lead-status-item" href="#" data-val="Waiting for Response">Waiting for Response</a></li></ul></div></td>
                    <td>Exhibition</td>
                    <td><span class="lead-link-text text-nowrap">25-04-2026 14:42:55</span></td>
                    <td><span class="lead-link-text text-nowrap">27-11-2025 15:45:21</span></td>
                    <td>Builders</td>
                    <td><span class="fw-semibold">0</span></td>
                    <td><button type="button" class="lead-act-btn appt" title="Appointments" data-act="appt" data-id="5"><i class="bi bi-calendar2-week"></i></button></td>
                    <td><div class="d-flex align-items-center gap-1"><button type="button" class="lead-act-btn view" title="View" data-act="view" data-id="5"><i class="bi bi-eye"></i></button><button type="button" class="lead-act-btn edit" title="Edit" data-act="edit" data-id="5"><i class="bi bi-pencil-square"></i></button><button type="button" class="lead-act-btn del" title="Delete" data-act="del" data-id="5"><i class="bi bi-trash"></i></button><button type="button" class="lead-act-btn mail" title="Send to Email" data-act="mail" data-id="5"><i class="bi bi-envelope"></i></button></div></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div><!-- /lpPanel-leads -->



<!-- ===== New Lead Modal ===== -->
<div class="modal fade" id="newLeadModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0">
            <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-person-plus-fill"></i></div>
                    <div>
                        <h5 class="modal-title mb-0">New Lead</h5>
                        <div class="small text-muted"><i class="bi bi-lightning-charge me-1"></i>Capture every lead detail in one flow</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="newLeadForm" class="d-flex flex-column modal-flex-col">
                <div class="modal-body p-4 bg-light-subtle">
                    <div class="nl-body">

                    <!-- Section: Classification -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="row g-3">
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <div class="d-flex gap-2">
                                <div class="flex-grow-1">
                                    <select class="form-select select2 nl-select" id="nl_status" data-placeholder="Select status">
                                        <option value=""></option>
                                        <option>Lead</option>
                                        <option>Quotation</option>
                                        <option>Followup</option>
                                        <option>Qualified</option>
                                        <option>Negotiation</option>
                                        <option>Won</option>
                                        <option>Lost</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-outline-primary nl-add-btn" data-nl-target="nl_status" title="Add new status"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Source *</label>
                            <div class="d-flex gap-2">
                                <div class="flex-grow-1">
                                    <select class="form-select select2 nl-select" id="nl_source" data-placeholder="Select source">
                                        <option value=""></option>
                                        <option>IndiaMart</option>
                                        <option>Website</option>
                                        <option>Facebook Ads</option>
                                        <option>Google Ads</option>
                                        <option>Referral</option>
                                        <option>Walk-in</option>
                                        <option>Cold Call</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-outline-primary nl-add-btn" data-nl-target="nl_source" title="Add new source"><i class="bi bi-plus-lg"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Assigned <span class="text-danger">*</span></label>
                            <select class="form-select select2 nl-select" id="nl_assigned" data-placeholder="Select person">
                                <option value=""></option>
                                <option selected>GHARUDA SOFTWARE</option>
                                <option>Harish D.</option>
                                <option>Divya A.</option>
                                <option>Karthik R.</option>
                                <option>Priya S.</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Sourcer</label>
                            <select class="form-select select2 nl-select" id="nl_sourcer" data-placeholder="Select sourcer">
                                <option value=""></option>
                                <option selected>GHARUDA SOFTWARE</option>
                                <option>Harish D.</option>
                                <option>Website Form</option>
                                <option>Facebook Ads</option>
                                <option>Referral</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label">Lead Qualification</label>
                            <select class="form-select select2 nl-select" id="nl_qualification" data-placeholder="Select qualification">
                                <option value=""></option>
                                <option>Sales Qualified Lead</option>
                                <option>Marketing Qualified Lead</option>
                                <option>Unqualified Lead</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label"><i class="bi bi-tag me-1"></i>Tags</label>
                            <div class="nl-tags-wrap" id="nlTagsWrap">
                                <div class="nl-tags-chips" id="nlTagsChips"></div>
                                <input type="text" class="nl-tags-input" id="nlTagsInput" placeholder="Type and press Enter to add tag...">
                            </div>
                            <input type="hidden" id="nl_tags" value="">
                        </div>
                        </div>
                    </div>

                    <!-- Section: Contact Details -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Company <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nl_company" required placeholder="Company name">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nl_name" required placeholder="Full name">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Position</label>
                                <input type="text" class="form-control" id="nl_position" placeholder="e.g. Manager">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="nl_email" placeholder="email@example.com">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" id="nl_phone" placeholder="10-digit mobile number">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Website</label>
                                <input type="url" class="form-control" id="nl_website" placeholder="https://example.com">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Address</label>
                                <textarea class="form-control min-h-0" id="nl_address" rows="2" placeholder="Full address"></textarea>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Description</label>
                                <textarea class="form-control min-h-0" id="nl_description" rows="2" placeholder="Any additional notes..."></textarea>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Date Contacted</label>
                                <input type="date" class="form-control" id="nl_date_contacted">
                            </div>
                            <!-- <div class="col-lg-3 col-md-6">
                                <label class="form-label">Profession <span class="text-danger">*</span></label>
                                <select class="form-select select2 nl-select" id="nl_profession" data-placeholder="Select profession">
                                    <option value=""></option>
                                    <option>Architect</option>
                                    <option>Builders</option>
                                    <option>Contractor</option>
                                    <option>Consultant</option>
                                    <option>Dealer</option>
                                    <option>Distributor</option>
                                    <option>Engineer</option>
                                    <option>Interior Designer</option>
                                    <option>Other</option>
                                </select>
                            </div> -->
                            <div class="col-12">
                                <div class="d-flex flex-wrap gap-4 pt-1">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" id="nl_public">
                                        <label class="form-check-label" for="nl_public">Public</label>
                                    </div>
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" id="nl_contacted_today">
                                        <label class="form-check-label" for="nl_contacted_today">Contacted Today</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Company Profile — GST, Turnover, Employee Size, Customer Type -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Company GST</label>
                                <input type="text" class="form-control text-uppercase" id="nl_gst" placeholder="e.g. 33ABCDE1234F1Z5" maxlength="15">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Turnover</label>
                                <input type="text" class="form-control" id="nl_turnover" placeholder="e.g. ₹5 Cr – ₹10 Cr">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Employee Size</label>
                                <input type="text" class="form-control" id="nl_emp_size" placeholder="e.g. 51 – 200">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Customer Type</label>
                                <select class="form-select select2 nl-select" id="nl_cust_type" data-placeholder="Select type">
                                    <option value=""></option>
                                    <option>Reseller</option>
                                    <option>Direct Customer</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Location & Product -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Country</label>
                                <select class="form-select select2 nl-select" id="nl_country" data-placeholder="Select country">
                                    <option value=""></option>
                                    <option selected>India</option>
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                    <option>UAE</option>
                                    <option>Singapore</option>
                                    <option>Australia</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">State</label>
                                <select class="form-select select2 nl-select" id="nl_state" data-placeholder="Select state">
                                    <option value=""></option>
                                    <option>Tamil Nadu</option>
                                    <option>Karnataka</option>
                                    <option>Maharashtra</option>
                                    <option>Delhi</option>
                                    <option>Kerala</option>
                                    <option>Telangana</option>
                                    <option>Gujarat</option>
                                    <option>Rajasthan</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">City</label>
                                <select class="form-select select2 nl-select" id="nl_city" data-placeholder="Select city">
                                    <option value=""></option>
                                    <option>Chennai</option>
                                    <option>Bangalore</option>
                                    <option>Mumbai</option>
                                    <option>Delhi</option>
                                    <option>Hyderabad</option>
                                    <option>Kochi</option>
                                    <option>Pune</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Area</label>
                                <input type="text" class="form-control" id="nl_area" placeholder="e.g. T. Nagar">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="nl_zip" placeholder="e.g. 600001">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Latitude (Google Maps)</label>
                                <input type="text" class="form-control" id="nl_lat" placeholder="e.g. 13.0827">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Longitude (Google Maps)</label>
                                <input type="text" class="form-control" id="nl_lng" placeholder="e.g. 80.2707">
                            </div>
                        </div>
                    </div>

                    <!-- Section: Deal Info -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Lead value</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control rounded-start-0" id="nl_value" placeholder="0.00" step="0.01">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Product</label>
                                <select class="form-select select2 nl-select" id="nl_product" data-placeholder="Choose product">
                                    <option value=""></option>
                                    <option>HRMS Subscription</option>
                                    <option>Payroll Module</option>
                                    <option>Attendance Module</option>
                                    <option>Recruitment Module</option>
                                    <option>Custom Development</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Closure Date</label>
                                <input type="date" class="form-control" id="nl_closure_date">
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="form-label">Enquiry Code</label>
                                <input type="text" class="form-control nl-auto-chip" id="nl_enquiry_code" value="ENQ-0171" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Items & Point of Contact -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Items</label>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 fs-13">
                                    <thead>
                                        <tr class="table-light">
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Qty</th>
                                            <th class="col-w-50"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="nlItemBody">
                                        <tr>
                                            <td><input type="text" class="form-control form-control-sm" placeholder="Code"></td>
                                            <td><input type="text" class="form-control form-control-sm" placeholder="Name"></td>
                                            <td><input type="number" class="form-control form-control-sm" placeholder="0" min="1"></td>
                                            <td class="align-middle"><button type="button" class="btn btn-sm btn-outline-danger nl-remove-item"><i class="bi bi-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="nlAddItem"><i class="bi bi-plus-lg me-1"></i>Add Item</button>
                        </div>

                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <label class="form-label fw-bold mb-0">Point of Contact:</label>
                                <button type="button" class="btn btn-sm btn-primary" id="nlAddPoc"><i class="bi bi-plus-lg me-1"></i>Add More</button>
                            </div>
                            <div id="nlPocList">
                                <div class="row g-2 mb-2 nl-poc-row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm" placeholder="Name">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control form-control-sm" placeholder="Phone No.">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="email" class="form-control form-control-sm" placeholder="Email">
                                    </div>
                                    <div class="col-md-2 align-self-center">
                                        <button type="button" class="btn btn-sm btn-danger nl-remove-poc"><i class="bi bi-trash me-1"></i>Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div><!-- /nl-body -->
                </div>
                <div class="modal-footer bg-white border-top p-3 d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i>Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ===== New Lead: Add Option mini modal (+ button) ===== -->
<div class="modal fade" id="nlAddOptionModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="nlAddOptionTitle">Add New Option</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nlAddOptionInput" placeholder="Type new option...">
                <div class="form-text small text-muted"><i class="bi bi-info-circle me-1"></i>Press Enter to add quickly</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" id="nlAddOptionCancel">Cancel</button>
                <button type="button" class="btn btn-primary" id="nlAddOptionSave"><i class="bi bi-check-lg me-1"></i>Add</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== New Appointment Modal (copied from appointments.php — opens on table appointment icon) ===== -->
<div class="modal fade apm-modal" id="apmContactModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-calendar-plus"></i>New appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">* Subject</label>
                        <input type="text" class="form-control" id="apmCtSubject" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <label class="form-label">* Description</label>
                        <textarea class="form-control" id="apmCtDesc" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">* Related</label>
                        <select class="form-select" id="apmCtRelated">
                            <option value="">Non selected</option>
                            <option value="Contact">Internal (Contact)</option>
                            <option value="Lead">Lead</option>
                            <option value="External">External</option>
                        </select>
                    </div>
                    <!-- Related = Lead -> Leads searchable select -->
                    <div class="col-12 d-none" id="apmRelLeadBlock">
                        <label class="form-label">Leads</label>
                        <select class="form-select select2" id="apmRelLead" data-placeholder="Select and begin typing">
                            <option value=""></option>
                            <option>Gharuda Software</option>
                            <option>Acme Corporation</option>
                            <option>Sunrise Enterprises</option>
                            <option>Bluewave Solutions</option>
                        </select>
                    </div>
                    <!-- Related = External -> Name, Email, Phone, Project -->
                    <div class="col-12 d-none" id="apmRelExternalBlock">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="apmRelExtName" autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="apmRelExtEmail" autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Phone (Ex: +1 69 1234 5678)</label>
                                <input type="text" class="form-control" id="apmRelExtPhone" autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Project</label>
                                <select class="form-select" id="apmRelExtProject">
                                    <option value="">Non selected</option>
                                    <option>HRMS Implementation</option>
                                    <option>Website Revamp</option>
                                    <option>Mobile App Development</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Related = Internal (Contact) -> Contact select -->
                    <div class="col-12 d-none" id="apmRelInternalBlock">
                        <label class="form-label">Contact</label>
                        <select class="form-select" id="apmRelContact">
                            <option value="">Non selected</option>
                            <option>Suresh Babu</option>
                            <option>Priya R</option>
                            <option>Karthik R</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">* Date / Time</label>
                        <input type="datetime-local" class="form-control" id="apmCtDateTime">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Location (optional)</label>
                        <input type="text" class="form-control" id="apmCtLocation" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">* Attendees</label>
                        <select class="form-select" id="apmCtAttendees">
                            <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                            <option value="Harish D.">Harish D.</option>
                            <option value="Divya A.">Divya A.</option>
                            <option value="Priya S.">Priya S.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Type</label>
                        <select class="form-select select2" id="apmCtType">
                            <option value="">Non selected</option>
                            <option value="SD - Online Demo" data-color="#16a34a">SD - Online Demo</option>
                            <option value="SD - Direct Visit - lead" data-color="#0d9488">SD - Direct Visit - lead</option>
                            <option value="DEV - Direct Visit - customer" data-color="#9f1239">DEV - Direct Visit - customer</option>
                            <option value="DEV - Customer visit - GHARUDA" data-color="#2563eb">DEV - Customer visit - GHARUDA</option>
                            <option value="DEV - Online Demo - Customer" data-color="#dc2626">DEV - Online Demo - Customer</option>
                            <option value="SD - GHARUDA Visit" data-color="#06b6d4">SD - GHARUDA Visit</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Repeat every</label>
                        <select class="form-select" id="apmCtRepeat">
                            <option value="">Non selected</option>
                            <option value="1 week">1 week</option>
                            <option value="2 weeks">2 weeks</option>
                            <option value="1 month">1 month</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="apm-cron-note">Please mark the checkboxes as checked if you want selected attendee and contact to receive reminders eg. if set 30 minutes before the appointment start. Note that this feature requires cron job to be configured.</div>
                        <div class="apm-notif-check mt-2">
                            <input class="form-check-input" type="checkbox" id="apmCtSms">
                            <label class="form-check-label" for="apmCtSms">SMS Notification</label>
                        </div>
                        <div class="apm-notif-check">
                            <input class="form-check-input" type="checkbox" id="apmCtEmail">
                            <label class="form-check-label" for="apmCtEmail">Email Notification</label>
                        </div>

                        <!-- SMS reminder value block (shown when SMS ticked) -->
                        <div id="apmSmsReminderBlock" class="mt-2 d-none">
                            <label class="form-label mb-6px">Add value to receive an SMS notification prior to your appointment (default 30 min before)</label>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="position-relative reminder-input-wrap">
                                    <input type="number" min="0" class="form-control reminder-input" id="apmSmsReminderValue" placeholder="">
                                    <button type="button" class="btn btn-sm btn-primary position-absolute reminder-info-btn" id="apmSmsReminderInfo" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Minutes before the appointment start">
                                        <i class="bi bi-info-circle fs-12"></i>
                                    </button>
                                </div>
                                <select class="form-select reminder-unit-select" id="apmSmsReminderUnit">
                                    <option value="minutes" selected>Minutes</option>
                                    <option value="hours">Hours</option>
                                    <option value="days">Days</option>
                                </select>
                            </div>
                        </div>

                        <!-- Email reminder value block (shown when Email ticked) -->
                        <div id="apmEmailReminderBlock" class="mt-2 d-none">
                            <label class="form-label mb-6px">Add value to receive an email notification prior to your appointment (default 30 min before)</label>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="position-relative reminder-input-wrap">
                                    <input type="number" min="0" class="form-control reminder-input" id="apmEmailReminderValue" placeholder="">
                                    <button type="button" class="btn btn-sm btn-primary position-absolute reminder-info-btn" id="apmEmailReminderInfo" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Minutes before the appointment start">
                                        <i class="bi bi-info-circle fs-12"></i>
                                    </button>
                                </div>
                                <select class="form-select reminder-unit-select" id="apmEmailReminderUnit">
                                    <option value="minutes" selected>Minutes</option>
                                    <option value="hours">Hours</option>
                                    <option value="days">Days</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Appointment notes</label>
                        <div class="apm-quill-wrap">
                            <div id="apmCtQuill"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="apmCtSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Import Leads Modal ===== -->
<div class="modal fade" id="importLeadsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h5 class="fw-bold mb-0"><i class="bi bi-upload me-2 text-primary"></i>Import Leads</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label><span class="req">*</span>Choose CSV File</label>
                    <input type="file" class="form-control" id="importFile" accept=".csv,.xlsx,.xls">
                </div>
                <div class="mb-3">
                    <label><span class="req">*</span>Status (fallback)</label>
                    <div class="d-flex gap-2">
                        <select class="form-select" id="importStatus">
                            <option selected>Lead</option>
                            <option>Quotation</option>
                            <option>Followup</option>
                            <option>Qualified</option>
                            <option>DIRECT</option>
                            <option>New Enquiry</option>
                            <option>New</option>
                            <option>Customer</option>
                            <option>Waiting for Response</option>
                        </select>
                        <button type="button" class="btn btn-outline-primary im-inline-add" data-im-target="importStatus" title="Add new status"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div class="im-inline-wrap" id="imInlineStatus">
                        <input type="text" class="form-control form-control-sm" placeholder="New status name">
                        <button type="button" class="im-inline-add im-inline-save im-inline-primary"><i class="bi bi-check-lg"></i></button>
                    </div>
                </div>
                <div class="mb-3">
                    <label><span class="req">*</span>Source (fallback)</label>
                    <div class="d-flex gap-2">
                        <select class="form-select" id="importSource">
                            <option selected>Indiamart</option>
                            <option>Direct</option>
                            <option>Website Form</option>
                            <option>Facebook Ads</option>
                            <option>Google Ads</option>
                            <option>Referral</option>
                            <option>Exhibition</option>
                            <option>Walk-in</option>
                            <option>Cold Call</option>
                        </select>
                        <button type="button" class="btn btn-outline-primary im-inline-add" data-im-target="importSource" title="Add new source"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div class="im-inline-wrap" id="imInlineSource">
                        <input type="text" class="form-control form-control-sm" placeholder="New source name">
                        <button type="button" class="im-inline-add im-inline-save im-inline-primary"><i class="bi bi-check-lg"></i></button>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Responsible (Assignee)</label>
                    <select class="form-select" id="importAssignee">
                        <option value="" selected>Non selected</option>
                        <option>GHRAUDA SOFTWARE</option>
                        <option>Harish D.</option>
                        <option>Divya A.</option>
                        <option>Karthik R.</option>
                        <option>Priya S.</option>
                    </select>
                </div>
                <a href="#" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1 mb-3" id="importSampleLink"><i class="bi bi-download"></i>Download sample</a>
                <div class="modal-footer bg-light border-top p-3 d-flex justify-content-end gap-2 mt-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-primary" id="btnSimulateImport"><i class="bi bi-play-fill me-1"></i>Simulate Import</button>
                    <button type="button" class="btn btn-primary" id="btnDoImport"><i class="bi bi-upload me-1"></i>Import</button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- ===== Lead Detail Modal ===== -->
<div class="modal fade" id="leadDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0">

            <div class="modal-header border-bottom bg-white py-3 px-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3"><span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary-subtle text-primary p-2 fs-5"><i class="bi bi-person-lines-fill"></i></span><div><h5 class="modal-title fw-bold m-0 fs-5">
                    <span class="ico"><i class="bi bi-person-lines-fill"></i></span>
                    <div>
                        <h5><span class="ld-id"><span id="ldNumber">1</span> &ndash;</span> <span id="ldName">Suresh Babu</span><span class="ld-state-pill d-none" id="ldStatePill"></span></h5></div></div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0 overflow-hidden bg-light-subtle">
                <div class="d-flex flex-column flex-md-row h-100">
                    <aside class="ld-rail bg-white border-end p-2 d-flex flex-column gap-1" style="min-width: 200px; width: 220px;">
                        <div class="text-uppercase small fw-bold text-muted px-3 pt-2 pb-1">Lead</div>
                        <button class="ld-nav active" type="button" data-panel="ldPanelProfile"><i class="bi bi-person-vcard"></i>Profile</button>
                        <button class="ld-nav" type="button" data-panel="ldPanelProposals"><i class="bi bi-file-earmark-text"></i>Proposals <span class="badge">1</span></button>
                        <button class="ld-nav" type="button" data-panel="ldPanelAppointments"><i class="bi bi-calendar2-check"></i>Appointments</button>
                        <button class="ld-nav" type="button" data-panel="ldPanelTasks"><i class="bi bi-list-check"></i>Tasks <span class="badge">1</span></button>
                        <button class="ld-nav" type="button" data-panel="ldPanelAttachments"><i class="bi bi-paperclip"></i>Attachments <span class="badge">1</span></button>
                        <div class="text-uppercase small fw-bold text-muted px-3 pt-2 pb-1">Engage</div>
                        <button class="ld-nav" type="button" data-panel="ldPanelReminders"><i class="bi bi-bell"></i>Reminders</button>
                        <button class="ld-nav" type="button" data-panel="ldPanelNotes"><i class="bi bi-journal-text"></i>Notes <span class="badge" id="ldNotesBadge">1</span></button>
                        <button class="ld-nav" type="button" data-panel="ldPanelActivityLog"><i class="bi bi-clock-history"></i>Activity Log</button>
                        <div class="text-uppercase small fw-bold text-muted px-3 pt-2 pb-1">Insights</div>
                        <button class="ld-nav" type="button" data-panel="ldPanelLeadSource"><i class="bi bi-star"></i>Lead Score</button>
                        <button class="ld-nav" type="button" data-panel="ldPanelEmailLog"><i class="bi bi-envelope"></i>Email Log</button>
                    </aside>
                    <section class="ld-content flex-grow-1 p-4 overflow-auto">

                <!-- ===== Profile Tab Panel ===== -->
                <div class="ld-tab-panel active" id="ldPanelProfile">
                    <div class="ld-pipeline card border shadow-sm p-3 mb-3 bg-white d-flex flex-row align-items-center gap-2 flex-wrap">
                        <span class="ld-pipe-step done"><i class="bi bi-check-circle-fill"></i> Qualified</span>
                        <span class="ld-pipe-step done"><i class="bi bi-check-circle-fill"></i> Quote</span>
                        <span class="ld-pipe-step current">Negotiation</span>
                        <span class="ld-pipe-step pending">Closure</span>
                        <div class="ld-pipe-ring">
                            <div class="stage-ring stage-ring-lead"><span>65%</span></div>
                        </div>
                    </div>
                <div class="ld-contact-bar card border shadow-sm p-3 mb-3 bg-white d-flex flex-row align-items-center justify-content-between flex-wrap gap-2">
                    <span class="ld-act-dot" id="ldContactDot"></span>
                    <span class="ld-act-avatar d-none" id="ldContactAvatar">KO</span>
                    <span id="ldContactText"><b>GHRAUDA SOFTWARE</b> &middot; Created new proposal &nbsp;<a href="#">New Proposal</a> &nbsp; PRQ-147</span>
                        <div class="ld-contact-actions">
                            <button type="button" class="btn btn-sm ap-green-btn"><i class="bi bi-person-check me-1"></i>Convert to customer</button>
                            <button type="button" class="btn btn-sm ap-gray-btn" id="ldEditLeadBtn" title="Edit"><i class="bi bi-pencil-square"></i></button>
                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary btn-rounded-8-fs12"><i class="bi bi-printer"></i></button> -->
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm ap-gray-btn" data-bs-toggle="dropdown" aria-expanded="false">More <i class="bi bi-chevron-down fs-10"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end ld-more-menu">
                                    <li>
                                        <a class="dropdown-item ld-more-item" href="#"><i class="bi bi-arrow-counterclockwise me-2"></i>Mark as lost</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item ld-more-item" href="#"><i class="bi bi-x-lg me-2"></i>Mark as junk</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item ld-more-item ld-more-danger" href="#"><i class="bi bi-x-lg me-2"></i>Delete Lead</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <!-- Lead Info -->
                        <div class="col-12 col-xl-4"><div class="card border shadow-sm p-3 h-100 bg-white">
                            <div class="fw-bold fs-6 pb-2 mb-3 border-bottom text-dark">Lead Info</div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Name</span><span class="fw-medium text-dark text-end" id="ldInfoName">Suresh Babu</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Position</span><span class="fw-medium text-dark text-end" id="ldInfoPosition">Managing Director</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Email Address</span><span class="fw-medium text-dark text-end" id="ldInfoEmail"><a href="mailto:suresh.babu@annanagarbuilders.com">suresh.babu@annanagarbuilders.com</a></span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Website</span><span class="fw-medium text-dark text-end"><a href="https://annanagarbuilders.com" target="_blank">annanagarbuilders.com</a></span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Phone</span><span class="fw-medium text-dark text-end" id="ldInfoPhone"><a href="tel:9500123456">+91 95001 23456</a></span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Lead value</span><span class="ld-info-value text-crm-primary" id="ldInfoValue">₹23,629.00</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Company</span><span class="fw-medium text-dark text-end" id="ldInfoCompany">Anna Nagar Builders</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Address</span><span class="fw-medium text-dark text-end" id="ldInfoAddress">Old Machinery, Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Country</span><span class="fw-medium text-dark text-end">India</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">State</span><span class="fw-medium text-dark text-end">Tamil Nadu</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">City</span><span class="fw-medium text-dark text-end">Chennai</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Zip Code</span><span class="fw-medium text-dark text-end">600100</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Area</span><span class="fw-medium text-dark text-end">Pallikaranai</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Description</span><span class="fw-medium text-dark text-end">Client requires payroll, attendance tracking, and HRMS management integration.</span></div>
                        </div>
                        </div></div><!-- General Information -->
                        <div class="col-12 col-xl-4"><div class="card border shadow-sm p-3 h-100 bg-white">
                            <div class="fw-bold fs-6 pb-2 mb-3 border-bottom text-dark">General Information</div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Status</span><span class="fw-medium text-dark text-end"><span class="status-badge" id="ldInfoStatus">Lead</span></span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Source</span><span class="fw-medium text-dark text-end" id="ldInfoSource">Exhibition</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Assigned</span><span class="fw-medium text-dark text-end" id="ldInfoAssigned">Divya A.</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Sourcer</span><span class="fw-medium text-dark text-end" id="ldInfoSourcer">Harish D.</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Tags</span><span class="fw-medium text-dark text-end" id="ldInfoTags"><span class="lead-tag-pill">Warm Lead</span></span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Created</span><span class="fw-medium text-dark text-end">25-04-2026 14:42:55</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Last Contact</span><span class="fw-medium text-dark text-end">27-11-2025 15:45:21</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Public</span><span class="fw-medium text-dark text-end">No</span></div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Closure Date</span><span class="fw-medium text-dark text-end">15-07-2026 11:47:00</span></div>
                        </div>
                        </div></div><!-- Custom Fields -->
                        <div class="col-12 col-xl-4"><div class="card border shadow-sm p-3 h-100 bg-white">
                            <div class="fw-bold fs-6 pb-2 mb-3 border-bottom text-dark">Custom Fields</div>
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Profession</span><span class="fw-medium text-dark text-end">Builders</span></div>
                        </div></div></div>
                    <div class="card border shadow-sm p-3 bg-white mt-3">
                        <div class="fw-bold fs-6 pb-2 mb-2 border-bottom text-dark">Latest Activity</div>
                        <div class="ld-activity-empty" id="ldActivityEmpty"><i class="bi bi-clock-history"></i>No recent activity recorded.</div>
                    </div>
                </div><!-- /ld-tab-panel Profile -->

                <!-- ===== Proposals Tab Panel ===== -->
                <div class="ld-tab-panel" id="ldPanelProposals">

                    <div class="card-custom p-0 overflow-hidden card-flat">
                        <!-- Action buttons (toolbar auto-created by master-table.js) -->
                        <div class="d-flex align-items-center flex-wrap gap-2 p-3 pb-0">
                            <button type="button" class="btn btn-primary" id="npNewProposalBtn"><i class="bi bi-plus-lg me-1"></i>New Proposal</button>
                            <button type="button" class="btn btn-primary" id="ldAutoProposalBtn">Automatic Proposal</button>
                            <button type="button" class="btn btn-primary" id="ldManualProposalBtn">Manual Proposal</button>
                            <!-- <button type="button" class="btn btn-outline-primary" id="syncData">Sync Data </button> -->
                        </div>
                        <!-- Table (toolbar auto-created by datatable class) -->
                        <div class="table-responsive table-modern-wrap overflow-auto column-border">
                            <table class="table-modern w-100 datatable mb-0" id="npProposalsTable" data-table-name="Proposals">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Proposal #</th>
                                        <th>Subject</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Open Till</th>
                                        <th>Tags</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="npPropTbody">
                                    <tr data-id="147">
                                        <td>1</td>
                                        <td><a href="#" class="lead-name-link">PRO-147</a></td>
                                        <td><a href="#" class="lead-name-link">New Proposal</a></td>
                                        <td>₹ 0.00</td>
                                        <td>17-09-2026</td>
                                        <td>24-09-2026</td>
                                        <td>—</td>
                                        <td>17-09-2026 15:52:49</td>
                                        <td><span class="ld-prop-status draft">Draft</span></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1">
                                                <button type="button" class="lead-act-btn view np-act-view" data-id="147" title="View proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="lead-act-btn edit np-act-edit" data-id="147" title="Edit proposal"><i class="bi bi-pencil"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-id="145">
                                        <td>2</td>
                                        <td><a href="#" class="lead-name-link">PRO-145</a></td>
                                        <td><a href="#" class="lead-name-link">Solar Panel Installation 10 × 10</a></td>
                                        <td>₹ 1,18,000.00</td>
                                        <td>09-09-2026</td>
                                        <td>16-09-2026</td>
                                        <td>—</td>
                                        <td>09-09-2026 14:39:25</td>
                                        <td><span class="ld-prop-status accepted">Accepted</span></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1">
                                                <button type="button" class="lead-act-btn view np-act-view" data-id="145" title="View proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="lead-act-btn edit np-act-edit" data-id="145" title="Edit proposal"><i class="bi bi-pencil"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-id="140">
                                        <td>3</td>
                                        <td><a href="#" class="lead-name-link">PRO-140</a></td>
                                        <td><a href="#" class="lead-name-link">Product</a></td>
                                        <td>₹ 5,407.50</td>
                                        <td>21-08-2026</td>
                                        <td>28-08-2026</td>
                                        <td>—</td>
                                        <td>21-08-2026 14:13:03</td>
                                        <td><span class="ld-prop-status accepted">Accepted</span></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1">
                                                <button type="button" class="lead-act-btn view np-act-view" data-id="140" title="View proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="lead-act-btn edit np-act-edit" data-id="140" title="Edit proposal"><i class="bi bi-pencil"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /ld-tab-panel Proposals -->

                <!-- ===== Appointments Tab Panel ===== -->
                <div class="ld-tab-panel" id="ldPanelAppointments">

                    <div class="card-custom p-0 overflow-hidden card-flat">
                        <!-- Table (toolbar auto-created by datatable class) -->
                        <div class="table-responsive table-modern-wrap overflow-auto column-border">
                            <table class="table-modern w-100 datatable mb-0" id="apAppointmentsTable" data-table-name="Appointments">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Initiated By</th>
                                        <th>Attendees By</th>
                                        <th>Appointment Type</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="apApptTbody">
                                    <tr data-id="89">
                                        <td>1</td>
                                        <td><a href="#" class="lead-name-link">Site Visit – Initial Discussion</a></td>
                                        <td>18-09-2026 10:30 AM</td>
                                        <td>GHRAUDA SOFTWARE</td>
                                        <td>Suresh Babu, Priya R</td>
                                        <td>DEV - Customer visit - GHARUDA</td>
                                        <td>Site survey for 10×10 solar panel installation</td>
                                        <td><span class="ld-prop-status sent">Scheduled</span></td>
                                    </tr>
                                    <tr data-id="84">
                                        <td>2</td>
                                        <td><a href="#" class="lead-name-link">Product Demo Call</a></td>
                                        <td>12-09-2026 03:00 PM</td>
                                        <td>Priya R</td>
                                        <td>Suresh Babu</td>
                                        <td>DEV - Online Demo - Customer</td>
                                        <td>Demonstrated inverter product lineup &amp; pricing</td>
                                        <td><span class="ld-prop-status accepted">Completed</span></td>
                                    </tr>
                                    <tr data-id="76">
                                        <td>3</td>
                                        <td><a href="#" class="lead-name-link">Follow-up Discussion</a></td>
                                        <td>05-09-2026 11:00 AM</td>
                                        <td>GHRAUDA SOFTWARE</td>
                                        <td>Suresh Babu</td>
                                        <td>SD - Direct Visit - lead</td>
                                        <td>Discussed revised quotation terms</td>
                                        <td><span class="ld-prop-status accepted">Completed</span></td>
                                    </tr>
                                    <tr data-id="65">
                                        <td>4</td>
                                        <td><a href="#" class="lead-name-link">Quotation Review Meeting</a></td>
                                        <td>28-08-2026 04:30 PM</td>
                                        <td>Priya R</td>
                                        <td>Suresh Babu, Finance Team</td>
                                        <td>DEV - Customer visit - GHARUDA</td>
                                        <td>Reviewed pricing &amp; payment schedule</td>
                                        <td><span class="ld-prop-status rejected">Cancelled</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /ld-tab-panel Appointments -->
                <!-- ===== Tasks Tab Panel ===== -->
                <div class="ld-tab-panel" id="ldPanelTasks">
                    <div class="card-custom p-0 overflow-hidden card-flat">
                        <!-- Action buttons (toolbar auto-created by datatable class) -->
                        <div class="d-flex align-items-center flex-wrap gap-2 p-3 pb-0">
                            <button type="button" class="btn btn-primary" id="tkNewTaskBtn"><i class="bi bi-plus-lg me-1"></i>New Task</button>
                        </div>
                        <!-- Table -->
                        <div class="table-responsive table-modern-wrap overflow-auto column-border">
                            <table class="table-modern w-100 datatable mb-0" id="tkTasksTable" data-table-name="Tasks">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">#</th>
                                        <th class="text-nowrap">Name</th>
                                        <th class="text-nowrap">Status</th>
                                        <th class="text-nowrap">Start Date</th>
                                        <th class="text-nowrap">Due Date</th>
                                        <th class="text-nowrap">Assigned to</th>
                                        <th class="text-nowrap">Tags</th>
                                        <th class="text-nowrap">Priority</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#" class="lead-name-link">42</a></td>
                                        <td><a href="#" class="lead-name-link">Follow up call with client</a></td>
                                        <td><span class="ld-prop-status sent">In Progress</span></td>
                                        <td class="text-nowrap">19-09-2026</td>
                                        <td class="text-nowrap">25-09-2026</td>
                                        <td>GHRAUDA SOFTWARE</td>
                                        <td>followup</td>
                                        <td><span class="ld-prop-status rejected">High</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#" class="lead-name-link">39</a></td>
                                        <td><a href="#" class="lead-name-link">Prepare solar quotation document</a></td>
                                        <td><span class="ld-prop-status draft">Not Started</span></td>
                                        <td class="text-nowrap">18-09-2026</td>
                                        <td class="text-nowrap">22-09-2026</td>
                                        <td>Priya R</td>
                                        <td>quotation</td>
                                        <td><span class="ld-prop-status draft">Medium</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#" class="lead-name-link">35</a></td>
                                        <td><a href="#" class="lead-name-link">Site inspection report upload</a></td>
                                        <td><span class="ld-prop-status accepted">Completed</span></td>
                                        <td class="text-nowrap">12-09-2026</td>
                                        <td class="text-nowrap">15-09-2026</td>
                                        <td>GHRAUDA SOFTWARE</td>
                                        <td>inspection</td>
                                        <td><span class="ld-prop-status accepted">Low</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#" class="lead-name-link">31</a></td>
                                        <td><a href="#" class="lead-name-link">Collect pending payment from client</a></td>
                                        <td><span class="ld-prop-status sent">In Progress</span></td>
                                        <td class="text-nowrap">05-09-2026</td>
                                        <td class="text-nowrap">30-09-2026</td>
                                        <td>Priya R</td>
                                        <td>payment</td>
                                        <td><span class="ld-prop-status rejected">High</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#" class="lead-name-link">28</a></td>
                                        <td><a href="#" class="lead-name-link">Schedule product demo meeting</a></td>
                                        <td><span class="ld-prop-status accepted">Completed</span></td>
                                        <td class="text-nowrap">01-09-2026</td>
                                        <td class="text-nowrap">04-09-2026</td>
                                        <td>GHRAUDA SOFTWARE</td>
                                        <td>meeting</td>
                                        <td><span class="ld-prop-status draft">Medium</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /ld-tab-panel Tasks -->
                <!-- ===== Attachments Tab Panel ===== -->
                <div class="ld-tab-panel" id="ldPanelAttachments">

                    <div class="at-wrap">
                        <!-- Drop Zone -->
                        <div class="at-drop-zone" id="atDropZone"><i class="bi bi-cloud-arrow-up"></i>Drop files here to upload<small>or click to browse — PDF, DOCX, JPG, PNG</small></div>
                        <input type="file" id="atFileInput" multiple class="d-none">
                        <!-- Attachment Timeline -->
                        <div class="at-timeline" id="atList">
                            <div class="at-item">
                                <div class="at-meta"><span class="lbl">Date / Time :</span><br>21-08-2026 02:15:57 pm</div>
                                <div class="at-meta"><span class="lbl">Staff Name :</span><br>GHRAUDA SOFTWARE</div>
                                <div class="at-file">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                    <a href="#">PRO-140-GHRAUDAA-SOFTWARE-TECHNOLOGY-PRIVATE-LIMITED.pdf
                                        <span class="mime">application/pdf</span>
                                    </a>
                                </div>
                                <button type="button" class="at-del" title="Delete attachment"><i class="bi bi-x-lg"></i></button>
                            </div>
                            <div class="at-item">
                                <div class="at-meta"><span class="lbl">Date / Time :</span><br>17-09-2026 11:42:10 am</div>
                                <div class="at-meta"><span class="lbl">Staff Name :</span><br>Priya R</div>
                                <div class="at-file">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                    <a href="#">PRO-147-solar-panel-quotation-draft.pdf
                                        <span class="mime">application/pdf</span>
                                    </a>
                                </div>
                                <button type="button" class="at-del" title="Delete attachment"><i class="bi bi-x-lg"></i></button>
                            </div>
                            <div class="at-item">
                                <div class="at-meta"><span class="lbl">Date / Time :</span><br>12-09-2026 04:08:33 pm</div>
                                <div class="at-meta"><span class="lbl">Staff Name :</span><br>GHRAUDA SOFTWARE</div>
                                <div class="at-file">
                                    <i class="bi bi-file-earmark-image-fill text-success"></i>
                                    <a href="#">site-survey-photo-10x10.jpg
                                        <span class="mime">image/jpeg</span>
                                    </a>
                                </div>
                                <button type="button" class="at-del" title="Delete attachment"><i class="bi bi-x-lg"></i></button>
                            </div>
                            <div class="at-item">
                                <div class="at-meta"><span class="lbl">Date / Time :</span><br>05-09-2026 10:26:45 am</div>
                                <div class="at-meta"><span class="lbl">Staff Name :</span><br>Suresh Babu</div>
                                <div class="at-file">
                                    <i class="bi bi-file-earmark-word-fill text-primary"></i>
                                    <a href="#">revised-quotation-terms.docx
                                        <span class="mime">application/vnd.openxmlformats-officedocument.wordprocessingml.document</span>
                                    </a>
                                </div>
                                <button type="button" class="at-del" title="Delete attachment"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </div>
                    </div>
                </div><!-- /ld-tab-panel Attachments -->
                <!-- ===== Reminders Tab Panel ===== -->
                <div class="ld-tab-panel" id="ldPanelReminders">
                    <div class="card-custom p-0 overflow-hidden card-flat">

                        <!-- Action buttons (toolbar auto-created by datatable class) -->
                        <div class="d-flex align-items-center flex-wrap gap-2 p-3 pb-0">
                            <button type="button" class="btn btn-primary" id="ldSetReminderBtn"><i class="bi bi-bell me-1"></i>Set Lead Reminder</button>
                        </div>
                        <!-- Table (toolbar auto-created by datatable class) -->
                        <div class="table-responsive table-modern-wrap overflow-auto column-border">
                            <table class="table-modern w-100 datatable mb-0" id="ldRemindersTable" data-table-name="Lead Reminders">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">S.No</th>
                                        <th class="text-nowrap">Description</th>
                                        <th class="text-nowrap">Date</th>
                                        <th class="text-nowrap">Remind</th>
                                        <th class="text-nowrap">Is notified?</th>
                                        <th class="text-nowrap">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="ldRemTbody">
                                    <tr data-id="1">
                                        <td>1</td>
                                        <td>Call client regarding solar inverter quotation follow-up</td>
                                        <td>24-09-2026 11:00 AM</td>
                                        <td>GHRAUDA SOFTWARE</td>
                                        <td><span class="ld-prop-status accepted">Yes</span></td>
                                        <td><span class="ld-prop-status sent">Active</span></td>
                                    </tr>
                                    <tr data-id="2">
                                        <td>2</td>
                                        <td>Send updated technical proposal and AMC pricing</td>
                                        <td>27-09-2026 03:30 PM</td>
                                        <td>Priya R</td>
                                        <td><span class="ld-prop-status draft">No</span></td>
                                        <td><span class="ld-prop-status sent">Active</span></td>
                                    </tr>
                                    <tr data-id="3">
                                        <td>3</td>
                                        <td>Site survey appointment confirmation with Suresh Babu</td>
                                        <td>18-09-2026 10:00 AM</td>
                                        <td>GHRAUDA SOFTWARE</td>
                                        <td><span class="ld-prop-status accepted">Yes</span></td>
                                        <td><span class="ld-prop-status accepted">Completed</span></td>
                                    </tr>
                                    <tr data-id="4">
                                        <td>4</td>
                                        <td>Follow up on contract agreement sign-off</td>
                                        <td>02-10-2026 04:00 PM</td>
                                        <td>Admin</td>
                                        <td><span class="ld-prop-status draft">No</span></td>
                                        <td><span class="ld-prop-status sent">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ===== Notes Tab Panel ===== -->
                <div class="ld-tab-panel" id="ldPanelNotes">

                    <div class="ldn-wrap">
                        <div class="ldn-composer">
                            <textarea class="ldn-input" id="ldNoteInput" placeholder="Add note..."></textarea>
                            <div class="ldn-radios">
                                <label><input type="radio" name="ldNoteContact" id="ldNoteRadio1" value="contacted"> I got in touch with this lead</label>
                                <label><input type="radio" name="ldNoteContact" id="ldNoteRadio2" value="not-contacted" checked> I have not contacted this lead</label>
                            </div>
                            <div class="ldn-actions">
                                <button type="button" class="btn" id="ldNoteAdd">Add Note</button>
                            </div>
                        </div>
                        <div class="ldn-list" id="ldNoteList">
                            <div class="ldn-item" data-nid="1">
                                <span class="ldn-avatar">GHR</span>
                                <div class="ldn-body">
                                    <div class="ldn-name">GHARUDA SOFTWARE</div>
                                    <div class="ldn-date">Note added: 21-09-2026 12:59:33</div>
                                    <div class="ldn-text">test</div>
                                </div>
                                <div class="ldn-icons">
                                    <button type="button" class="ed" title="Edit note"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="dl" title="Delete note"><i class="bi bi-x-lg"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ===== Activity Log Tab Panel ===== -->
                <div class="ld-tab-panel" id="ldPanelActivityLog">

                    <div class="lda-wrap">
                        <div class="lda-feed" id="ldaFeed">
                            <div class="lda-item" data-aid="1">
                                <div class="lda-date">19-09-2026 14:51:59<span class="lda-ago">1 month ago</span></div>
                                <div class="lda-who">
                                    <span class="lda-avatar">GHR</span>
                                    <span class="lda-name">GHARUDA SOFTWARE</span>
                                    <span class="lda-text">- created lead</span>
                                </div>
                            </div>
                        </div>
                        <div class="lda-composer">
                            <textarea class="lda-input" id="ldaInput" placeholder="Enter Activity"></textarea>
                            <div class="lda-radios">
                                <label><input type="radio" name="ldaStatus" value="Answered"> Answered</label>
                                <label><input type="radio" name="ldaStatus" value="UnAnswered" checked> UnAnswered</label>
                            </div>
                            <div class="lda-actions">
                                <button type="button" class="btn" id="ldaSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ===== Lead Score Tab Panel ===== -->
                <div class="ld-tab-panel" id="ldPanelLeadSource">

                    <div class="lsc-wrap bg-light border m-3 rounded-3">
                        <div class="lsc-score-num">0</div>
                        <div class="lsc-score-label">Lead Score</div>
                        <div class="lsc-bar"><span class="progress-bar-w0"></span></div>
                        <div class="lsc-crit-head">Criteria Matched</div>
                        <div class="lsc-crit">
                            <span class="nm">Lead created from website form</span>
                            <span class="pts">+10 pts</span>
                            <span class="lsc-chip hit">Matched</span>
                        </div>
                        <div class="lsc-crit">
                            <span class="nm">Proposal generated for this lead</span>
                            <span class="pts">+15 pts</span>
                            <span class="lsc-chip hit">Matched</span>
                        </div>
                        <div class="lsc-crit">
                            <span class="nm">Proposal viewed by customer</span>
                            <span class="pts">+20 pts</span>
                            <span class="lsc-chip miss">Not matched</span>
                        </div>
                        <div class="lsc-crit">
                            <span class="nm">Call answered by lead</span>
                            <span class="pts">+25 pts</span>
                            <span class="lsc-chip miss">Not matched</span>
                        </div>
                        <div class="lsc-crit">
                            <span class="nm">Reminder set &amp; followed up</span>
                            <span class="pts">+10 pts</span>
                            <span class="lsc-chip miss">Not matched</span>
                        </div>
                        <div class="lsc-crit">
                            <span class="nm">Task completed for this lead</span>
                            <span class="pts">+20 pts</span>
                            <span class="lsc-chip miss">Not matched</span>
                        </div>
                    </div>
                </div>

                <!-- ===== Email Log Tab Panel ===== -->
                <div class="ld-tab-panel" id="ldPanelEmailLog">
                    <div class="card-custom p-0 overflow-hidden card-flat">
                        
                        <!-- Action buttons (toolbar auto-created by master-table.js) -->
                        <div class="d-flex align-items-center flex-wrap gap-2 p-3 pb-0">
                            <button type="button" class="btn btn-primary" id="ldSendEmailBtn"><i class="bi bi-envelope me-1"></i>Send Email</button>
                        </div>
                        <!-- Table (toolbar auto-created by datatable class) -->
                        <div class="table-responsive table-modern-wrap overflow-auto column-border">
                            <table class="table-modern w-100 datatable mb-0" id="ldEmailLogTable" data-table-name="Email Logs">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">ID</th>
                                        <th class="text-nowrap">Staff</th>
                                        <th class="text-nowrap">Subject</th>
                                        <th class="text-nowrap">Date</th>
                                        <th class="text-nowrap">Status</th>
                                        <th class="text-nowrap">Opened</th>
                                    </tr>
                                </thead>
                                <tbody id="ldEmailLogTbody">
                                    <tr data-id="101">
                                        <td>101</td>
                                        <td>GHRAUDA SOFTWARE</td>
                                        <td>Quotation for Solar Installation PRO-147</td>
                                        <td>18-09-2026 10:45 AM</td>
                                        <td><span class="ld-prop-status sent">Sent</span></td>
                                        <td><span class="ld-prop-status accepted">Yes</span></td>
                                    </tr>
                                    <tr data-id="98">
                                        <td>98</td>
                                        <td>Priya R</td>
                                        <td>Follow-up on Proposal Feedback PRO-145</td>
                                        <td>12-09-2026 04:20 PM</td>
                                        <td><span class="ld-prop-status sent">Sent</span></td>
                                        <td><span class="ld-prop-status accepted">Yes</span></td>
                                    </tr>
                                    <tr data-id="92">
                                        <td>92</td>
                                        <td>GHRAUDA SOFTWARE</td>
                                        <td>Product Brochure &amp; Specifications</td>
                                        <td>05-09-2026 09:30 AM</td>
                                        <td><span class="ld-prop-status sent">Sent</span></td>
                                        <td><span class="ld-prop-status draft">No</span></td>
                                    </tr>
                                    <tr data-id="85">
                                        <td>85</td>
                                        <td>Admin</td>
                                        <td>Welcome to GHARUDA CRM Solutions</td>
                                        <td>21-08-2026 02:15 PM</td>
                                        <td><span class="ld-prop-status sent">Sent</span></td>
                                        <td><span class="ld-prop-status accepted">Yes</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                    </section><!-- /ld-content -->
                </div><!-- /ld-body -->
            </div><!-- /modal-body -->
        </div>
    </div>
</div>

<!-- ===== Compose Email Modal (Send Email) ===== -->
<div class="modal fade" id="ldComposeEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5>Compose Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="text-uppercase">Send email using (SMTP)</label>
                    <select class="form-select" id="ldCeSmtp">
                        <option selected>USE SYSTEM SMTP ( info@GHRatechnology.com )</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Templates</label>
                    <select class="form-select" id="ldCeTemplate">
                        <option value="" selected>Non selected</option>
                        <option>Standard Quotation</option>
                        <option>Solar Installation</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Email To</label>
                    <input type="email" class="form-control" id="ldCeTo" placeholder="">
                </div>
                <div class="mb-3">
                    <label>Email CC</label>
                    <input type="email" class="form-control" id="ldCeCc" placeholder="">
                </div>
                <div class="mb-3">
                    <label>Email Subject</label>
                    <input type="text" class="form-control" id="ldCeSubject" placeholder="">
                </div>
                <div class="mb-3">
                    <label>Email Content</label>
                    <div class="ce-quill-wrap">
                        <div id="ldCeQuill"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Attachment</label>
                    <div class="ce-attach-row">
                        <input type="file" class="form-control" id="ldCeAttachment" multiple>
                        <button type="button" class="ce-add-file" id="ldCeAddFile" title="Add more attachments"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div id="ldCeFileList" class="mt-2"></div>
                </div>
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="ldCeSend">send</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Sync Data Modal ===== -->
<div class="modal fade" id="syncDataModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5>Sync Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info py-2 px-3 small mb-3">All proposal data is stored separately for each proposal after creation. Updating the lead info won't affect previously created proposals for this lead.</div>
                <div class="alert alert-info py-2 px-3 small mb-3">If you recently updated your lead info you can sync all new data to associated proposals.<br>Here is a list of fields you can sync.</div>
                <div class="mb-3">
                    <label>Address</label>
                    <textarea class="form-control" id="sdAddress" rows="3">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>City</label>
                            <input type="text" class="form-control" id="sdCity" value="910">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>State</label>
                            <input type="text" class="form-control" id="sdState" value="128">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Country</label>
                            <select class="form-select" id="sdCountry">
                                <option selected>India IN</option>
                                <option>USA</option>
                                <option>UK</option>
                                <option>UAE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Zip Code</label>
                            <input type="text" class="form-control" id="sdZip" value="600100">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" class="form-control" id="sdPhone" value="9876543218">
                </div>
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-primary" id="sdSyncNow">Sync Now</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Add New Item Modal (proposal items) ===== -->
<div class="modal fade" id="npAddItemModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-w460">
        <div class="modal-content">
            <div class="modal-header py-3">
                <h6 class="fw-bold mb-0 fs-15">Add New Item</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label"><span class="text-danger">*</span> Description</label>
                    <input type="text" class="form-control" id="npiDesc">
                </div>
                <div class="mb-3">
                    <label class="form-label">Long Description</label>
                    <textarea class="form-control" id="npiLongDesc" rows="4"></textarea>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label"><span class="text-danger">*</span> Rate - INR (Base Currency)</label>
                        <input type="number" class="form-control" id="npiRateInr" value="0.00" step="0.01">
                    </div>
                    <div class="col-6">
                        <label class="form-label">HSN Code</label>
                        <input type="text" class="form-control" id="npiHsn">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rate - USD</label>
                    <input type="number" class="form-control" id="npiRateUsd" value="0.00" step="0.01">
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label">Tax 1</label>
                        <select class="form-select" id="npiTax1">
                            <option selected>No Tax</option>
                            <option>GST 5%</option>
                            <option>GST 12%</option>
                            <option>GST 18%</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Tax 2</label>
                        <select class="form-select" id="npiTax2" disabled>
                            <option selected>No Tax</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Unit</label>
                    <input type="text" class="form-control" id="npiUnit">
                </div>
                <div class="mb-2">
                    <label class="form-label">Item Group</label>
                    <select class="form-select" id="npiGroup">
                        <option value="">Non selected</option>
                        <option>Software</option>
                        <option>Services</option>
                        <option>Hardware</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="npiSubmitBtn">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Proposal Preview Modal (view flow — reference design) ===== -->
<div class="modal fade" id="apProposalPreviewModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Gradient header: logo + title + status + actions -->
            <div class="modal-header bg-light border-bottom p-3">
                <button type="button" class="btn-close apv-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-5 shadow-sm" style="width:48px;height:48px;" id="apvLogo">KOH</div>
                    <div class="me-auto">
                        <h5 class="fw-bold mb-1 fs-18" id="apvNo"># PRO-000</h5>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span class="fs-12-5 text-slate" id="apvSubject">New Proposal</span>
                            <span class="badge bg-secondary rounded-pill" id="apvStatusChip">DRAFT</span>
                        </div>
                    </div>
                    <div class="d-flex gap-2 flex-wrap position-relative me-4 z-1">
                        <button type="button" class="btn btn-sm btn-outline-secondary" id="apvDownloadBtn"><i class="bi bi-download me-1"></i>Download</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" id="apvDeclineBtn"><i class="bi bi-x-lg me-1"></i>Decline</button>
                        <button type="button" class="btn btn-sm btn-primary apv-accept"><i class="bi bi-check-lg me-1"></i>Accept</button>
                    </div>
                </div>
            </div>

            <!-- Summary / Discussion tabs -->
            <div class="nav nav-pills p-2 bg-light border-bottom gap-2">
                <button type="button" class="btn btn-sm btn-primary apv-tab active" data-apvtab="summary"><i class="bi bi-file-text me-1"></i>Summary</button>
                <button type="button" class="btn btn-sm btn-outline-primary apv-tab" data-apvtab="discussion"><i class="bi bi-chat me-1"></i>Discussion</button>
            </div>

            <div class="modal-body">
                <div class="row g-4"><!-- LEFT: items card + totals + words --><div class="col-12 col-lg-7">
                        <div class="card border shadow-sm overflow-hidden mb-3">
                            <table class="table table-bordered align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="col-w-36">#</th>
                                        <th>Item</th>
                                        <th>HSN</th>
                                        <th class="text-end">Qty</th>
                                        <th class="text-end">Rate</th>
                                        <th class="text-end">Dis</th>
                                        <th class="text-end">GST</th>
                                        <th class="text-end">Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="apvItemBody"></tbody>
                            </table>
                            <div class="p-3 bg-light-subtle border-top d-flex flex-column gap-2 text-end">
                                <div class="d-flex justify-content-between align-items-center small"><span>Sub Total</span><span id="apvSubTotal">₹ 0.00</span></div>
                                <div class="apv-totals-row d-none" id="apvDiscountRow"><span id="apvDiscountLbl">0.00 (0.00%)</span><span id="apvDiscountVal">₹ 0.00</span></div>
                                <div class="d-flex justify-content-between align-items-center fw-bold fs-6 text-primary border-top pt-2 mt-1"><span>Total</span><span id="apvTotal">₹ 0.00</span></div>
                            </div>
                        </div>
                        <div class="small text-muted p-2 bg-light rounded border">With words: <b id="apvWords"></b></div>
                    </div>

                    <!-- RIGHT: summary / discussion panels --><div class="col-12 col-lg-5">
                        <div id="apvPanelSummary">
                            <div class="card border shadow-sm p-3 mb-3 bg-white">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="apv-client-av" id="apvClientAv">KO</div>
                                    <div class="min-w-0">
                                        <div class="fw-bold fs-13-5 text-darkest" id="apvClient">GHARUDA SOFTWARE TECHNOLOGY PRIVATE LIMITED</div>
                                        <a href="#" class="fs-12 text-primary text-decoration-none" id="apvEmail">gh123@gmail.com</a>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="fs-12-5 text-dark-gray line-height-1-8" id="apvAddress">
                                    PC 20 /3, 3rd Block, Mogappair West<br>
                                    Chennai - 560086 , Tamil Nadu<br>
                                    India
                                </div>
                                <div class="d-flex justify-content-between fs-12-5 text-dark-gray mt-2">
                                    <span class="text-subtle">Phone</span><b class="text-darkest" id="apvPhone">9865321470</b>
                                </div>
                                <div class="d-flex justify-content-between fs-12-5 text-dark-gray mt-1">
                                    <span class="text-subtle">GST Number</span><b class="text-darkest" id="apvGst">29AABCR7796N000</b>
                                </div>
                            </div>

                            <div class="card bg-primary text-white p-3 text-center rounded shadow-sm mb-3">
                                <span class="lbl">Proposal Total</span>
                                <span class="val" id="apvTotalBig">₹ 0.00</span>
                            </div>

                            <div class="card border shadow-sm p-3 mb-3 bg-white">
                                <div class="apv-sec-title">Proposal Information</div>
                                <div class="fs-12-5 text-dark-gray" id="apvRelInfo">Stantec</div>
                                <hr class="my-3">
                                <div class="apv-meta">
                                    <span class="k">Status</span><span class="v"><span class="apv-status-chip" id="apvStatus">Draft</span></span>
                                    <span class="k">Date</span><span class="v" id="apvDate">—</span>
                                    <span class="k">Open Till</span><span class="v" id="apvOpenTill">—</span>
                                </div>
                            </div>
                        </div>

                        <div id="apvPanelDiscussion" class="d-none">
                            <div class="card border shadow-sm p-3 mb-3 bg-white">
                                <div class="apv-sec-title">Discussion</div>
                                <div id="apvDiscList">
                                    <div class="apv-disc-item">
                                        <span class="apv-disc-av">GH</span>
                                        <div><b class="text-darkest">GHRAUDA SOFTWARE</b>
                                            <div class="text-dark-gray">Proposal shared with client for review.</div>
                                            <div class="fs-11 text-border-light mt-1">Just now</div>
                                        </div>
                                    </div>
                                </div>
                                <textarea class="form-control apv-disc-input mt-2" id="apvDiscInput" placeholder="Write a message..."></textarea>
                                <button type="button" class="btn btn-primary btn-sm mt-2 btn-rounded-8" id="apvDiscSend"><i class="bi bi-send me-1"></i>Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== Signature & Confirmation Of Identity Modal ===== -->
<div class="modal fade" id="apSignModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-w470">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Signature &amp; Confirmation Of Identity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-label fw-medium small text-muted mb-1"><span class="req">*</span> First Name</div>
                        <input type="text" class="form-control" id="apvSignFirst">
                    </div>
                    <div class="col-12">
                        <div class="form-label fw-medium small text-muted mb-1"><span class="req">*</span> Last Name</div>
                        <input type="text" class="form-control" id="apvSignLast">
                    </div>
                    <div class="col-12">
                        <div class="form-label fw-medium small text-muted mb-1">Email</div>
                        <input type="email" class="form-control" id="apvSignEmail">
                    </div>
                    <div class="col-12">
                        <div class="form-label fw-medium small text-muted mb-1">Signature</div>
                        <div class="apv-sign-canvas-wrap" id="apvSignWrap">
                            <canvas id="apvSignCanvas"></canvas>
                            <div class="apv-sign-placeholder" id="apvSignPlaceholder">Draw your signature here with mouse</div>
                        </div>
                        <div class="apv-sign-actions">
                            <button type="button" class="btn btn-outline-secondary" id="apvSignClear">Clear</button>
                            <button type="button" class="btn btn-outline-secondary" id="apvSignUndo">Undo</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="small text-muted mt-2">By clicking on "Sign", I consent to be legally bound by this electronic representation of my signature.</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelled</button>
                <button type="button" class="btn btn-primary" id="apvSignSubmit">Sign</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Automatic Proposal Fullscreen Modal ===== -->
<div class="modal fade" id="autoProposalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0">

            <div class="modal-header border-bottom bg-white py-3 px-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3"><span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary-subtle text-primary p-2 fs-5"><i class="bi bi-magic"></i></span><div><h5 class="modal-title fw-bold m-0 fs-5">Automatic Proposal</h5><div class="small text-muted" id="apLeadCtx"><i class="bi bi-person-badge me-1"></i>Lead #166 &ndash; Suresh Babu</div></div></div>
                    
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0 overflow-hidden bg-light-subtle">
                <div class="d-flex flex-column flex-lg-row h-100">
                    <!-- Left: proposals list -->
                    <div class="ap-list-pane col-12 col-lg-5 col-xl-4 border-end bg-white p-3 overflow-auto">
                        <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                            <button type="button" class="btn" id="apNewProposalBtn"><i class="bi bi-plus-lg me-1"></i>New Proposal</button>
                            <span class="toolbar-sep"></span>
                            <button type="button" class="btn active" id="apAutoBtn">Automatic Proposal</button>
                            <button type="button" class="btn" id="apManualBtn">Manual Proposal</button>
                            <!-- <button type="button" class="btn btn-outline-primary" id="syncData">Sync Data </button> -->
                        </div>
                        <!-- Table: MasterTable flow (toolbar/footer auto-created by master-table.js) -->
                        <div class="table-responsive table-modern-wrap overflow-auto column-border ap-table-wrap">
                            <table class="table-modern w-100 datatable mb-0" id="apProposalsTable" data-table-name="Proposals">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">S.No</th>
                                        <th class="text-nowrap">Proposal #</th>
                                        <th class="text-nowrap">Subject</th>
                                        <th class="text-nowrap">To</th>
                                        <th class="text-nowrap">Sub Total</th>
                                        <th class="text-nowrap">Total Tax</th>
                                        <th class="text-nowrap">Total</th>
                                        <th class="text-nowrap">Status</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="apPropTbody">
                                    <tr data-id="152" class="active">
                                        <td>1</td>
                                        <td><a href="#" class="lead-name-link">PRO-152</a></td>
                                        <td><a href="#" class="lead-name-link">New Proposal</a></td>
                                        <td>GHRA SOFTWARE TECHNOLOGY</td>
                                        <td>₹ 0.00</td>
                                        <td>₹ 0.00</td>
                                        <td>₹ 0.00</td>
                                        <td><span class="ld-prop-status draft">Draft</span></td>
                                        <td>
                                            <div class="ap-act-wrap">
                                                <button type="button" class="ap-act-btn ap-view" data-apact="view" data-id="152" data-bs-toggle="tooltip" data-bs-title="View Proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="ap-act-btn ap-edit" data-apact="edit" data-id="152" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="bi bi-pencil-square"></i></button>
                                                <button type="button" class="ap-act-btn ap-wa" data-apact="wa" data-id="152" data-bs-toggle="tooltip" data-bs-title="Send to Whatsapp"><i class="bi bi-whatsapp"></i></button>
                                                <button type="button" class="ap-act-btn ap-email" data-apact="email" data-id="152" data-bs-toggle="tooltip" data-bs-title="Send via Email"><i class="bi bi-envelope"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-id="151">
                                        <td>2</td>
                                        <td><a href="#" class="lead-name-link">PRO-151</a></td>
                                        <td><a href="#" class="lead-name-link">New Proposal</a></td>
                                        <td>GG COMPANY</td>
                                        <td>₹ 3,93,750.00</td>
                                        <td>₹ 3,75,000.00</td>
                                        <td>₹ 18,750.00</td>
                                        <td><span class="ld-prop-status draft">Draft</span></td>
                                        <td>
                                            <div class="ap-act-wrap">
                                                <button type="button" class="ap-act-btn ap-view" data-apact="view" data-id="151" data-bs-toggle="tooltip" data-bs-title="View Proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="ap-act-btn ap-edit" data-apact="edit" data-id="151" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="bi bi-pencil-square"></i></button>
                                                <button type="button" class="ap-act-btn ap-wa" data-apact="wa" data-id="151" data-bs-toggle="tooltip" data-bs-title="Send to Whatsapp"><i class="bi bi-whatsapp"></i></button>
                                                <button type="button" class="ap-act-btn ap-email" data-apact="email" data-id="151" data-bs-toggle="tooltip" data-bs-title="Send via Email"><i class="bi bi-envelope"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-id="148">
                                        <td>3</td>
                                        <td><a href="#" class="lead-name-link">PRO-148</a></td>
                                        <td><a href="#" class="lead-name-link">Test Quotation</a></td>
                                        <td>Sundar A</td>
                                        <td>₹ 119.18</td>
                                        <td>₹ 101.00</td>
                                        <td>₹ 18,172.00</td>
                                        <td><span class="ld-prop-status sent">Sent</span></td>
                                        <td>
                                            <div class="ap-act-wrap">
                                                <button type="button" class="ap-act-btn ap-view" data-apact="view" data-id="148" data-bs-toggle="tooltip" data-bs-title="View Proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="ap-act-btn ap-edit" data-apact="edit" data-id="148" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="bi bi-pencil-square"></i></button>
                                                <button type="button" class="ap-act-btn ap-wa" data-apact="wa" data-id="148" data-bs-toggle="tooltip" data-bs-title="Send to Whatsapp"><i class="bi bi-whatsapp"></i></button>
                                                <button type="button" class="ap-act-btn ap-email" data-apact="email" data-id="148" data-bs-toggle="tooltip" data-bs-title="Send via Email"><i class="bi bi-envelope"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-id="149">
                                        <td>4</td>
                                        <td><a href="#" class="lead-name-link">PRO-149</a></td>
                                        <td><a href="#" class="lead-name-link">New Proposal</a></td>
                                        <td>GHRA SOFTWARE TECHNOLOGY</td>
                                        <td>₹ 0.00</td>
                                        <td>₹ 0.00</td>
                                        <td>₹ 0.00</td>
                                        <td><span class="ld-prop-status accepted">Accepted</span></td>
                                        <td>
                                            <div class="ap-act-wrap">
                                                <button type="button" class="ap-act-btn ap-view" data-apact="view" data-id="149" data-bs-toggle="tooltip" data-bs-title="View Proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="ap-act-btn ap-edit" data-apact="edit" data-id="149" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="bi bi-pencil-square"></i></button>
                                                <button type="button" class="ap-act-btn ap-wa" data-apact="wa" data-id="149" data-bs-toggle="tooltip" data-bs-title="Send to Whatsapp"><i class="bi bi-whatsapp"></i></button>
                                                <button type="button" class="ap-act-btn ap-email" data-apact="email" data-id="149" data-bs-toggle="tooltip" data-bs-title="Send via Email"><i class="bi bi-envelope"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-id="150">
                                        <td>5</td>
                                        <td><a href="#" class="lead-name-link">PRO-150</a></td>
                                        <td><a href="#" class="lead-name-link">New Proposal</a></td>
                                        <td>GHRA SOFTWARE TECHNOLOGY</td>
                                        <td>₹ 0.00</td>
                                        <td>₹ 0.00</td>
                                        <td>₹ 0.00</td>
                                        <td><span class="ld-prop-status rejected">Rejected</span></td>
                                        <td>
                                            <div class="ap-act-wrap">
                                                <button type="button" class="ap-act-btn ap-view" data-apact="view" data-id="150" data-bs-toggle="tooltip" data-bs-title="View Proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="ap-act-btn ap-edit" data-apact="edit" data-id="150" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="bi bi-pencil-square"></i></button>
                                                <button type="button" class="ap-act-btn ap-wa" data-apact="wa" data-id="150" data-bs-toggle="tooltip" data-bs-title="Send to Whatsapp"><i class="bi bi-whatsapp"></i></button>
                                                <button type="button" class="ap-act-btn ap-email" data-apact="email" data-id="150" data-bs-toggle="tooltip" data-bs-title="Send via Email"><i class="bi bi-envelope"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-id="147">
                                        <td>6</td>
                                        <td><a href="#" class="lead-name-link">PRO-147</a></td>
                                        <td><a href="#" class="lead-name-link">Solar Panel Installation 10 × 10</a></td>
                                        <td>GHARUDA TECHNOLOGY</td>
                                        <td>₹ 1,18,000.00</td>
                                        <td>₹ 21,240.00</td>
                                        <td>₹ 1,39,240.00</td>
                                        <td><span class="ld-prop-status accepted">Accepted</span></td>
                                        <td>
                                            <div class="ap-act-wrap">
                                                <button type="button" class="ap-act-btn ap-view" data-apact="view" data-id="147" data-bs-toggle="tooltip" data-bs-title="View Proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="ap-act-btn ap-edit" data-apact="edit" data-id="147" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="bi bi-pencil-square"></i></button>
                                                <button type="button" class="ap-act-btn ap-wa" data-apact="wa" data-id="147" data-bs-toggle="tooltip" data-bs-title="Send to Whatsapp"><i class="bi bi-whatsapp"></i></button>
                                                <button type="button" class="ap-act-btn ap-email" data-apact="email" data-id="147" data-bs-toggle="tooltip" data-bs-title="Send via Email"><i class="bi bi-envelope"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-id="140">
                                        <td>7</td>
                                        <td><a href="#" class="lead-name-link">PRO-140</a></td>
                                        <td><a href="#" class="lead-name-link">Product</a></td>
                                        <td>SRL AKSHMI Traders</td>
                                        <td>₹ 5,407.50</td>
                                        <td>₹ 972.50</td>
                                        <td>₹ 6,380.00</td>
                                        <td><span class="ld-prop-status draft">Draft</span></td>
                                        <td>
                                            <div class="ap-act-wrap">
                                                <button type="button" class="ap-act-btn ap-view" data-apact="view" data-id="140" data-bs-toggle="tooltip" data-bs-title="View Proposal"><i class="bi bi-eye"></i></button>
                                                <button type="button" class="ap-act-btn ap-edit" data-apact="edit" data-id="140" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="bi bi-pencil-square"></i></button>
                                                <button type="button" class="ap-act-btn ap-wa" data-apact="wa" data-id="140" data-bs-toggle="tooltip" data-bs-title="Send to Whatsapp"><i class="bi bi-whatsapp"></i></button>
                                                <button type="button" class="ap-act-btn ap-email" data-apact="email" data-id="140" data-bs-toggle="tooltip" data-bs-title="Send via Email"><i class="bi bi-envelope"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Footer (showing + pagination auto-created by master-table.js) -->
                    </div>
                    <!-- Right: proposal detail -->
                    <div class="ap-detail-pane col-12 col-lg-7 col-xl-8 bg-light-subtle p-3 overflow-auto flex-grow-1">
                        <div class="nav nav-pills gap-2 mb-3 bg-white p-2 border rounded shadow-sm align-items-center">
                            <button class="ap-dtab ap-invoice-tab d-none" data-aptab="invoice" type="button">Invoice</button>
                            <button class="ap-dtab active" data-aptab="proposal" type="button">Proposal</button>
                            <button class="ap-dtab" data-aptab="comments" type="button">Comments</button>
                            <button class="ap-dtab" data-aptab="reminders" type="button">Reminders</button>
                            <button class="ap-dtab" data-aptab="tasks" type="button">Tasks</button>
                            <button class="ap-dtab" data-aptab="notes" type="button">Notes</button>
                            <button class="ap-dtab" data-aptab="templates" type="button">Templates <span class="badge bg-secondary rounded-pill">2</span></button>
                            <span class="ap-tab-icons">
                                <button class="ap-dtab ap-email-tab" type="button" title="Email proposal"><i class="bi bi-envelope"></i></button>
                                <button class="ap-dtab ap-preview-tab" type="button" title="Preview"><i class="bi bi-eye"></i></button>
                                <button class="ap-dtab ap-expand-tab" type="button" title="Expand"><i class="bi bi-arrows-fullscreen"></i></button>
                            </span>
                        </div>
                        <!-- Proposal panel -->
                        <div class="ap-panel active" data-appanel="proposal">
                            <div class="card border shadow-sm p-3 mb-3 bg-white d-flex flex-row align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <span class="ld-prop-status draft" id="apStatusChip">Draft</span>
                                    <button type="button" class="ap-icon-btn ms-auto" title="Edit" data-bs-toggle="modal" data-bs-target="#newProposalModal"><i class="bi bi-pencil-square"></i></button>
                                    <div class="dropdown ap-save-dd">
                                        <button type="button" class="ap-icon-btn gap-2 px-2 w-auto" title="Save" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false"><i class="bi bi-save"></i> <i class="bi bi-chevron-down fs-10"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end ap-save-menu">
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-file-earmark-pdf me-2"></i>View PDF</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-box-arrow-up-right me-2"></i>View PDF in New Tab</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-download me-2"></i>Download</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-printer me-2"></i>Print</a></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="ap-icon-btn" id="apSendEmailBtn" title="Send via email"><i class="bi bi-envelope"></i></button>
                                    <div class="dropdown">
                                        <button type="button" class="btn ap-gray-btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}'>More</button>
                                        <ul class="dropdown-menu dropdown-menu-end ap-save-menu">
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-eye me-2"></i>View Proposal</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-paperclip me-2"></i>Attach File</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-clipboard me-2"></i>Copy</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-envelope-check me-2"></i>Mark as Sent</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-envelope-open me-2"></i>Mark as Open</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-pencil-square me-2"></i>Mark as Revised</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-x-circle me-2"></i>Mark as Declined</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-check-circle me-2"></i>Mark as Accepted</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-alarm me-2"></i>Send Expiration Reminder</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item ap-save-item ap-more-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown">
                                        <button type="button" class="btn ap-green-btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}'>Convert</button>
                                        <ul class="dropdown-menu dropdown-menu-end ap-save-menu">
                                            <li><a class="dropdown-item ap-save-item" href="#">Estimate</a></li>
                                            <li><a class="dropdown-item ap-save-item" href="#">Invoice</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 ms-auto">
                                    <button type="button" class="btn ap-green-btn" id="apApprovalBtn"><i class="bi bi-send-check me-1"></i>Send approval request</button>
                                </div>
                            </div>
                            <div class="card border shadow-sm p-4 mb-3 bg-white d-flex flex-column flex-md-row justify-content-between gap-4">
                                <div class="flex-fill">
                                    <div class="fs-4 fw-bold text-primary mb-1" id="apPropNo">PRO-152</div>
                                    <div class="fs-6 fw-bold text-dark mb-2" id="apPropSubject">New Proposal</div>
                                    <div class="fw-bold fs-6 text-dark mb-1" id="apFromCompany">GHRA SOFTWARE TECHNOLOGY PRIVATE LIMITED</div>
                                    <div class="small text-muted line-height-1-6 mb-2" id="apFromAddr">PC 20 / 3, 3rd Block, Mogappair West<br>Chennai - 560086, Tamil Nadu<br>India<br>9865321470<br>GST Number: 29AABCR796N000</div>
                                </div>
                                <div class="flex-fill text-md-end">
                                    <div class="ap-to-label">To:</div>
                                    <div class="fw-bold fs-6 text-dark mb-1" id="apToName">GHRA SOFTWARE TECHNOLOGY</div>
                                    <div class="small text-muted line-height-1-6 mb-2" id="apToAddr">214, Velachery - Tambaram Main Rd, Narayanapuram,<br>Pallikaranai, Chennai, Tamil Nadu 600100</div>
                                    <div class="small text-muted line-height-1-6 mb-2" id="apToContact">IN 600100<br>9876543218<br><a href="mailto:pm@GHRatechnology.com">pm@GHRatechnology.com</a></div>
                                </div>
                            </div>
                            <div class="mb-2 text-end">
                                <div class="dropdown">
                                    <a href="#" class="ap-merge-link" data-bs-toggle="dropdown">Available merge fields</a>
                                    <div class="dropdown-menu dropdown-menu-end ap-merge-menu p-3 apv-dropdown-menu">
                                        <a href="#" class="ap-merge-field">{proposal_items}</a>
                                        <a href="#" class="ap-merge-field">{client_name}</a>
                                        <a href="#" class="ap-merge-field">{client_company}</a>
                                        <a href="#" class="ap-merge-field">{client_email}</a>
                                        <a href="#" class="ap-merge-field">{client_phone}</a>
                                        <a href="#" class="ap-merge-field">{proposal_number}</a>
                                        <a href="#" class="ap-merge-field">{proposal_date}</a>
                                        <a href="#" class="ap-merge-field">{open_till}</a>
                                        <a href="#" class="ap-merge-field">{sub_total}</a>
                                        <a href="#" class="ap-merge-field">{total_tax}</a>
                                        <a href="#" class="ap-merge-field">{total}</a>
                                        <a href="#" class="ap-merge-field">{company_name}</a>
                                        <a href="#" class="ap-merge-field">{company_phone}</a>
                                        <a href="#" class="ap-merge-field">{terms_conditions}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card border shadow-sm p-3 mb-3 bg-white">
                                <textarea id="apContentArea" spellcheck="false" class="form-control font-monospace border-0 bg-light-subtle" rows="18">Proposal: PRO-152
Subject: New Proposal
Prepared For: GHRA SOFTWARE TECHNOLOGY

Dear Client,

Thank you for your interest in our solutions. We are pleased to submit our formal quotation for your review.

Scope of Work &amp; Deliverables:
1. High-Performance ERP &amp; CRM Implementation
2. Custom Workflow Automation &amp; API Integration
3. Dedicated Cloud Infrastructure Deployment &amp; 24/7 Monitoring

Commercials &amp; Schedule:
- Estimated Completion: 30 Working Days
- Warranty &amp; Support: 1 Year Comprehensive Support included

For any clarifications or modifications, please feel free to reach out to our account manager.

Best Regards,
GHRA SOFTWARE TECHNOLOGY PRIVATE LIMITED</textarea>
                            </div>
                        </div>
                        <!-- Tracked emails sent panel -->
                        <div class="ap-panel" data-appanel="tracked-emails">
                            
                            <div class="card border shadow-sm p-3 mb-3 bg-white d-flex flex-row align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <span class="ld-prop-status sent">Tracked Emails</span>
                                    <button type="button" class="btn ap-gray-btn ms-auto" id="apTrackBackBtn"><i class="bi bi-arrow-left me-1"></i>Back to Proposal</button>
                                </div>
                            </div>
                            <div class="card-custom p-0 overflow-hidden card-flat">
                                <div class="d-flex align-items-center flex-wrap gap-2 p-3 pb-0">
                                    <div class="ap-track-title m-0">Emails sent for <b id="apTrackPropNo">PRO-152</b></div>
                                </div>
                                <div class="table-responsive table-modern-wrap overflow-auto column-border">
                                    <table class="table-modern w-100 datatable mb-0" id="apTrackTable" data-table-name="Tracked Emails">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">S.No</th>
                                                <th class="text-nowrap">To</th>
                                                <th class="text-nowrap">Subject</th>
                                                <th class="text-nowrap">Date Sent</th>
                                                <th class="text-nowrap">Status</th>
                                                <th class="text-nowrap">Opened</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="apTrackTbody">
                                            <tr data-id="1">
                                                <td>1</td>
                                                <td>pm@GHRatechnology.com</td>
                                                <td>Proposal PRO-152 – New Proposal</td>
                                                <td>19-09-2026 10:42 AM</td>
                                                <td>Sent</td>
                                                <td><span class="ld-prop-status accepted">Yes</span></td>
                                                <td>
                                                    <div class="ap-track-actions">
                                                        <button type="button" class="ap-icon-btn ap-track-resend" title="Resend" data-rid="1"><i class="bi bi-arrow-clockwise"></i></button>
                                                        <button type="button" class="ap-icon-btn ap-track-delete" title="Delete" data-rid="1"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-id="2">
                                                <td>2</td>
                                                <td>accounts@GHRatechnology.com</td>
                                                <td>Proposal PRO-152 – New Proposal</td>
                                                <td>17-09-2026 04:18 PM</td>
                                                <td>Sent</td>
                                                <td><span class="ld-prop-status draft">No</span></td>
                                                <td>
                                                    <div class="ap-track-actions">
                                                        <button type="button" class="ap-icon-btn ap-track-resend" title="Resend" data-rid="2"><i class="bi bi-arrow-clockwise"></i></button>
                                                        <button type="button" class="ap-icon-btn ap-track-delete" title="Delete" data-rid="2"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-id="3">
                                                <td>3</td>
                                                <td>sundar.a@gmail.com</td>
                                                <td>Test Quotation – PRO-148</td>
                                                <td>15-09-2026 11:10 AM</td>
                                                <td>Sent</td>
                                                <td><span class="ld-prop-status accepted">Yes</span></td>
                                                <td>
                                                    <div class="ap-track-actions">
                                                        <button type="button" class="ap-icon-btn ap-track-resend" title="Resend" data-rid="3"><i class="bi bi-arrow-clockwise"></i></button>
                                                        <button type="button" class="ap-icon-btn ap-track-delete" title="Delete" data-rid="3"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-id="4">
                                                <td>4</td>
                                                <td>meena@srlakshmi.in</td>
                                                <td>Product – PRO-140</td>
                                                <td>22-08-2026 09:25 AM</td>
                                                <td>Sent</td>
                                                <td><span class="ld-prop-status accepted">Yes</span></td>
                                                <td>
                                                    <div class="ap-track-actions">
                                                        <button type="button" class="ap-icon-btn ap-track-resend" title="Resend" data-rid="4"><i class="bi bi-arrow-clockwise"></i></button>
                                                        <button type="button" class="ap-icon-btn ap-track-delete" title="Delete" data-rid="4"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-id="5">
                                                <td>5</td>
                                                <td>pro@gharuraaitechnology.com</td>
                                                <td>Solar Panel Installation 10 × 10 – PRO-147</td>
                                                <td>10-09-2026 03:05 PM</td>
                                                <td>Sent</td>
                                                <td><span class="ld-prop-status accepted">Yes</span></td>
                                                <td>
                                                    <div class="ap-track-actions">
                                                        <button type="button" class="ap-icon-btn ap-track-resend" title="Resend" data-rid="5"><i class="bi bi-arrow-clockwise"></i></button>
                                                        <button type="button" class="ap-icon-btn ap-track-delete" title="Delete" data-rid="5"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr data-id="6">
                                                <td>6</td>
                                                <td>info@ggcompany.in</td>
                                                <td>Proposal PRO-151 – New Proposal</td>
                                                <td>18-09-2026 09:33 AM</td>
                                                <td>Sent</td>
                                                <td><span class="ld-prop-status draft">No</span></td>
                                                <td>
                                                    <div class="ap-track-actions">
                                                        <button type="button" class="ap-icon-btn ap-track-resend" title="Resend" data-rid="6"><i class="bi bi-arrow-clockwise"></i></button>
                                                        <button type="button" class="ap-icon-btn ap-track-delete" title="Delete" data-rid="6"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Footer (showing + pagination auto-created by master-table.js) -->
                            </div>
                        </div>
                        <!-- Tracked views panel (proposal viewed by customer) -->
                        <div class="ap-panel" data-appanel="tracked-views">
                            
                            <div class="card border shadow-sm p-3 mb-3 bg-white d-flex flex-row align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <span class="ld-prop-status accepted">Tracked Views</span>
                                    <button type="button" class="btn ap-gray-btn ms-auto" id="apViewBackBtn"><i class="bi bi-arrow-left me-1"></i>Back to Proposal</button>
                                </div>
                            </div>
                            <div class="card-custom p-0 overflow-hidden card-flat">
                                <div class="d-flex align-items-center flex-wrap gap-2 p-3 pb-0">
                                    <div class="ap-track-title m-0">Customer views for <b id="apViewPropNo">PRO-152</b></div>
                                </div>
                                <div class="table-responsive table-modern-wrap overflow-auto column-border">
                                    <table class="table-modern w-100 datatable mb-0" id="apViewTable" data-table-name="Customer Views">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">S.No</th>
                                                <th class="text-nowrap">Viewed By</th>
                                                <th class="text-nowrap">IP Address</th>
                                                <th class="text-nowrap">Date Viewed</th>
                                                <th class="text-nowrap">Device</th>
                                                <th class="text-nowrap">Total Views</th>
                                            </tr>
                                        </thead>
                                        <tbody id="apViewTbody">
                                            <tr data-id="1">
                                                <td>1</td>
                                                <td>pm@GHRatechnology.com</td>
                                                <td>103.21.58.14</td>
                                                <td>20-09-2026 04:12 PM</td>
                                                <td>Desktop · Chrome</td>
                                                <td>3</td>
                                            </tr>
                                            <tr data-id="2">
                                                <td>2</td>
                                                <td>pm@GHRatechnology.com</td>
                                                <td>103.21.58.14</td>
                                                <td>20-09-2026 10:05 AM</td>
                                                <td>Desktop · Chrome</td>
                                                <td>3</td>
                                            </tr>
                                            <tr data-id="3">
                                                <td>3</td>
                                                <td>accounts@GHRatechnology.com</td>
                                                <td>157.32.14.201</td>
                                                <td>18-09-2026 06:40 PM</td>
                                                <td>Mobile · Safari</td>
                                                <td>1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Footer (showing + pagination auto-created by master-table.js) -->
                            </div>
                        </div>
                        <!-- Invoice panel (INV-259 click → invoice view) -->
                        <div class="ap-panel" data-appanel="invoice">
                            <div class="card border shadow-sm p-3 mb-3 bg-white d-flex flex-row align-items-center justify-content-between flex-wrap gap-2">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <span class="ld-prop-status rejected" id="apInvStatusChip">Unpaid</span>
                                    <span class="ms-auto d-flex align-items-center gap-1">
                                        <button type="button" class="ap-icon-btn" title="Edit invoice"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="ap-icon-btn" title="Download invoice"><i class="bi bi-download"></i></button>
                                        <button type="button" class="ap-icon-btn" title="Email invoice"><i class="bi bi-envelope"></i></button>
                                        <div class="dropdown">
                                            <button type="button" class="btn ap-gray-btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}'>More</button>
                                            <ul class="dropdown-menu dropdown-menu-end ap-save-menu">
                                                <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-file-earmark-pdf me-2"></i>View PDF</a></li>
                                                <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-download me-2"></i>Download</a></li>
                                                <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-printer me-2"></i>Print</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item ap-save-item" href="#"><i class="bi bi-check-circle me-2"></i>Mark as Paid</a></li>
                                            </ul>
                                        </div>
                                        <button type="button" class="btn ap-green-btn" id="apInvPaymentBtn"><i class="bi bi-credit-card me-1"></i>Payment</button>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center gap-2 ms-auto">
                                    <button type="button" class="btn ap-green-btn" id="apInvWhatsappBtn"><i class="bi bi-whatsapp me-1"></i>Send to Whatsapp</button>
                                </div>
                            </div>
                            <div class="ap-doc pt-2">
                                <div class="flex-fill">
                                    <div class="ap-doc-no text-theme-blue">INV-259</div>
                                    <div class="fw-bold fs-6 text-dark mb-1">GHARUDA SOFTWARE TECHNOLOGY PRIVATE LIMITED</div>
                                    <div class="small text-muted line-height-1-6 mb-2">PC 20 / 3, 3rd Block, Mogappair West<br>Chennai - 560086, Tamil Nadu<br>India<br>9865321470<br>GST Number: 29AABCR7796N1O0O</div>
                                </div>
                                <div class="ap-doc-right text-end">
                                    <div class="fs-12 fw-bold text-dark-gray">Bill To</div>
                                    <div class="fs-12-5 fw-bold text-theme-blue my-1">GG COMPANY</div>
                                    <div class="inv-address-text">1/2 VOC STREET MENABADU AMBATTUR CHENNAI<br>Chennai<br>IN 6006</div>
                                    <table class="inv-meta-table">
                                        <tr><td class="inv-meta-label">Invoice Date:&nbsp;</td><td class="fw-bold">23-09-2026</td></tr>
                                        <tr><td class="inv-meta-label">Due Date:&nbsp;</td><td class="fw-bold">24-09-2026</td></tr>
                                        <tr><td class="inv-meta-label">Sale Agent:&nbsp;</td><td class="fw-bold">gharuda SOFTWARE</td></tr>
                                    </table>
                                </div>
                            </div>
                            <!-- Invoice items block: flex-shrink clip aaga koodadhu (kooda row maraiyadhu);
                                 overflow: visible → nearest scroll box .ap-panel aagi, table.css thead sticky work aagum -->
                            <div class="table-responsive table-modern-wrap column-border inv-table-wrap">
                                <table class="table-modern w-100 mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">#</th>
                                            <th class="text-nowrap">Item</th>
                                            <th class="text-nowrap">HSN</th>
                                            <th class="text-nowrap">Qty</th>
                                            <th class="text-nowrap">Rate</th>
                                            <th class="text-nowrap">Dis</th>
                                            <th class="text-nowrap">GST</th>
                                            <th class="text-nowrap">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>1</td><td>Ashwagandha 3% - 1212</td><td></td><td>1000 Kilograms</td><td>50.00</td><td>0.00</td><td>5</td><td>50,000.00</td></tr>
                                        <tr><td>2</td><td>Rubber Tubes - 111</td><td></td><td>5000 Kilograms</td><td>65.00</td><td>0.00</td><td>5</td><td>3,25,000.00</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="np-totals ap-totals-pad">
                                <div class="d-flex flex-column gap-2 text-end" style="min-width: 320px;">
                                    <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Sub Total</span><span class="fw-bold fs-6 text-dark">₹ 3,75,000.00</span></div>
                                    <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">GST 5% (5.00%)</span><span class="fw-bold fs-6 text-dark">₹ 18,750.00</span></div>
                                    <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Total</span><span class="fw-bold fs-6 text-dark">₹ 3,93,750.00</span></div>
                                    <div class="d-flex align-items-center justify-content-end gap-3"><span class="total-label text-danger fw-bold">Amount Due</span><span class="total-val text-danger" id="apInvAmountDue">₹ 3,93,750.00</span></div>
                                </div>
                            </div>
                        </div>
                        <!-- Comments panel -->
                        <div class="ap-panel" data-appanel="comments">
                            <div class="ap-cmt-row">
                                <textarea class="form-control" id="apCommentInput" placeholder="Write a comment..."></textarea>
                                <button type="button" class="btn btn-primary btn-rounded-8-fs12 align-self-end" id="apCommentPost">Post</button>
                            </div>
                            <div id="apCommentList">
                                <div class="ap-cmt-item"><b>GHRAUDA SOFTWARE</b> &middot; 20-09-2026 11:30 AM<br>Proposal generated automatically for this lead.</div>
                                <div class="ap-cmt-item"><b>Admin</b> &middot; 21-09-2026 02:15 PM<br>Client requested technical specification document. Sent via email.</div>
                            </div>
                            <!-- <div class="ap-empty">No other comments yet.</div> -->
                        </div>
                        <!-- Reminders panel -->
                        <div class="ap-panel" data-appanel="reminders">
                            
                            <div class="card-custom p-0 overflow-hidden card-flat">
                                <!-- Action buttons (toolbar auto-created by master-table.js) -->
                                <div class="d-flex align-items-center flex-wrap gap-2 p-3 pb-0">
                                    <button type="button" class="btn btn-primary" id="apSetReminderBtn"><i class="bi bi-bell me-1"></i>Set Proposal Reminder</button>
                                </div>
                                <!-- Table (toolbar auto-created by master-table.js) -->
                                <div class="table-responsive table-modern-wrap overflow-auto column-border">
                                    <table class="table-modern w-100 datatable mb-0" id="apRemindersTable" data-table-name="Proposal Reminders">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">S.No</th>
                                                <th class="text-nowrap">Description</th>
                                                <th class="text-nowrap">Date</th>
                                                <th class="text-nowrap">Remind</th>
                                                <th class="text-nowrap">Is notified?</th>
                                            </tr>
                                        </thead>
                                        <tbody id="apRemTbody">
                                            <tr data-id="1">
                                                <td>1</td>
                                                <td>Follow up on proposal feedback with Suresh Babu</td>
                                                <td>24-09-2026</td>
                                                <td>GHRA SOFTWARE</td>
                                                <td><span class="ld-prop-status accepted">Yes</span></td>
                                            </tr>
                                            <tr data-id="2">
                                                <td>2</td>
                                                <td>Send revised quote with discounted AMC pricing</td>
                                                <td>28-09-2026</td>
                                                <td>GHRA SOFTWARE</td>
                                                <td><span class="ld-prop-status draft">No</span></td>
                                            </tr>
                                            <tr data-id="3">
                                                <td>3</td>
                                                <td>Contract agreement signing follow-up call</td>
                                                <td>02-10-2026</td>
                                                <td>Admin</td>
                                                <td><span class="ld-prop-status draft">No</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Footer (showing + pagination auto-created by master-table.js) -->
                            </div>
                        </div>
                        <!-- Tasks panel -->
                        <div class="ap-panel" data-appanel="tasks">
                            
                            <div class="card-custom p-0 overflow-hidden card-flat">
                                <!-- Action buttons (toolbar auto-created by master-table.js) -->
                                <div class="d-flex align-items-center flex-wrap gap-2 p-3 pb-0">
                                    <button type="button" class="btn btn-primary" id="apNewTaskBtn"><i class="bi bi-plus-lg me-1"></i>New Task</button>
                                    <button type="button" class="btn icon-btn-outline ms-auto" title="Filter"><i class="bi bi-funnel"></i></button>
                                </div>
                                <!-- Table (toolbar auto-created by master-table.js) -->
                                <div class="table-responsive table-modern-wrap overflow-auto column-border">
                                    <table class="table-modern w-100 datatable mb-0" id="apTasksTable" data-table-name="Proposal Tasks">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">S.No</th>
                                                <th class="text-nowrap">Name</th>
                                                <th class="text-nowrap">Status</th>
                                                <th class="text-nowrap">Start Date</th>
                                                <th class="text-nowrap">Due Date</th>
                                                <th class="text-nowrap">Assigned to</th>
                                                <th class="text-nowrap">Tags</th>
                                                <th class="text-nowrap">Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody id="apTaskTbody">
                                            <tr data-id="1">
                                                <td>1</td>
                                                <td><a href="#" class="lead-name-link">Verify Technical Requirements</a></td>
                                                <td><span class="ld-prop-status accepted">Completed</span></td>
                                                <td>18-09-2026</td>
                                                <td>20-09-2026</td>
                                                <td>Suresh Babu</td>
                                                <td>Technical, CRM</td>
                                                <td><span class="ld-prop-status rejected">High</span></td>
                                            </tr>
                                            <tr data-id="2">
                                                <td>2</td>
                                                <td><a href="#" class="lead-name-link">Prepare Commercial Scope Document</a></td>
                                                <td><span class="ld-prop-status sent">In Progress</span></td>
                                                <td>21-09-2026</td>
                                                <td>25-09-2026</td>
                                                <td>GHRA SOFTWARE</td>
                                                <td>Proposal, Finance</td>
                                                <td><span class="ld-prop-status draft">Medium</span></td>
                                            </tr>
                                            <tr data-id="3">
                                                <td>3</td>
                                                <td><a href="#" class="lead-name-link">Client Negotiation &amp; Final Sign-off</a></td>
                                                <td><span class="ld-prop-status draft">Not Started</span></td>
                                                <td>26-09-2026</td>
                                                <td>30-09-2026</td>
                                                <td>Admin</td>
                                                <td>Sales</td>
                                                <td><span class="ld-prop-status rejected">Urgent</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Footer (showing + pagination auto-created by master-table.js) -->
                            </div>
                        </div>
                        <!-- Notes panel -->
                        <div class="ap-panel" data-appanel="notes">
                            <div class="ap-cmt-row">
                                <textarea class="form-control" id="apNoteInput" placeholder="Write a note..."></textarea>
                                <button type="button" class="btn btn-primary btn-rounded-8-fs12 align-self-end" id="apNotePost">Add Note</button>
                            </div>
                            <div id="apNoteList">
                                <div class="ap-cmt-item"><b>GHRAUDA SOFTWARE</b> &middot; 19-09-2026 10:45 AM<br>Client interested in 1-year annual maintenance contract addition.</div>
                                <div class="ap-cmt-item"><b>Admin</b> &middot; 22-09-2026 04:00 PM<br>Decision maker is traveling; follow up scheduled for next Monday.</div>
                            </div>
                        </div>
                        <!-- Templates panel -->
                        <div class="ap-panel" data-appanel="templates">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <button type="button" class="btn btn-primary" id="apAddTemplateBtn"><i class="bi bi-plus-lg me-1"></i>Add Template</button>
                            </div>
                            <div id="apTplCardList">
                                <div class="ap-tpl-card">
                                    <div>
                                        <div class="ap-tpl-name">Standard Quotation Template</div>
                                        <div class="ap-tpl-desc">Default quotation layout with items table, taxes and terms &amp; conditions.</div>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary ap-use-tpl btn-rounded-8-fs12" data-tpl="standard">Use</button>
                                </div>
                                <div class="ap-tpl-card">
                                    <div>
                                        <div class="ap-tpl-name">Solar Installation Template</div>
                                        <div class="ap-tpl-desc">Pre-built proposal for solar panel installation with site survey notes.</div>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary ap-use-tpl btn-rounded-8-fs12" data-tpl="solar">Use</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /modal-body -->
        </div>
    </div>
</div>

<!-- ===== Add Template Modal (Quill editor) ===== -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<div class="modal fade" id="apAddTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5>Add Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label><span class="req">*</span>Template Name</label>
                    <input type="text" class="form-control" id="apTplName" placeholder="">
                </div>
                <div class="mb-3">
                    <label>Template Content</label>
                    <div class="tp-quill-wrap">
                        <div id="apTplQuill"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="apTplSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Send Proposal to Email Modal ===== -->
<div class="modal fade" id="apSendEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5>Send Proposal to Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="se-check">
                    <input type="checkbox" id="apSeAttachPdf" checked>
                    <label for="apSeAttachPdf" class="cursor-pointer m-0">Attach PDF</label>
                </div>
                <div class="se-field">
                    <label>CC</label>
                    <input type="email" class="form-control" id="apSeCc" placeholder="">
                </div>
                <div class="se-tpl-label">Preview Template</div>
                <div class="se-quill-wrap">
                    <div id="apSendQuill"></div>
                </div>
            </div>
            <div class="se-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="apSeSend">send</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Attach File Modal (proposal) ===== -->
<div class="modal fade" id="apAttachFileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5>Attach File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="af-drop" id="apAfDrop">
                    <div class="txt">Drop files here to upload</div>
                    <input type="file" id="apAfInput" multiple class="d-none">
                </div>
                <div id="apAfList"></div>
            </div>
        </div>
    </div>
</div>

<!-- ===== Set Proposal Reminder Modal ===== -->
<div class="modal fade" id="setProposalReminderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5 class="fw-bold mb-0 fs-15 text-darkest"><i class="bi bi-question-circle me-2 text-subtle"></i>Set Proposal Reminder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label><span class="req">*</span>Date to be notified</label>
                    <input type="date" class="form-control" id="apReminderDate">
                </div>
                <div class="mb-3">
                    <label><span class="req">*</span>Set reminder to</label>
                    <select class="form-select" id="apReminderStaff">
                        <option selected>GHARUDA SOFTWARE</option>
                        <option>GHRAUDA SOFTWARE</option>
                        <option>Priya R</option>
                        <option>Harish D.</option>
                        <option>Divya A.</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label><span class="req">*</span>Description</label>
                    <textarea class="form-control" id="apReminderDesc" rows="4"></textarea>
                </div>
                <div class="rm-check"><input type="checkbox" id="apReminderEmail"><label for="apReminderEmail">Send also an email for this reminder</label></div>
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="apReminderSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Set Lead Reminder Modal ===== -->
<div class="modal fade" id="setLeadReminderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5 class="fw-bold mb-0 fs-15 text-darkest"><i class="bi bi-question-circle me-2 text-subtle"></i>Set Lead Reminder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body modal-body-pad-20-24">
                <div class="mb-3">
                    <label><span class="req">*</span>Date to be notified</label>
                    <input type="date" class="form-control" id="ldReminderDate">
                </div>
                <div class="mb-3">
                    <label><span class="req">*</span>Set reminder to</label>
                    <select class="form-select" id="ldReminderStaff">
                        <option selected>GHARUDA SOFTWARE</option>
                        <option>GHRAUDA SOFTWARE</option>
                        <option>Priya R</option>
                        <option>Harish D.</option>
                        <option>Divya A.</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label><span class="req">*</span>Description</label>
                    <textarea class="form-control" id="ldReminderDesc" rows="4"></textarea>
                </div>
                <div class="rm-check"><input type="checkbox" id="ldReminderEmail"><label for="ldReminderEmail">Send also an email for this reminder</label></div>
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="ldReminderSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Add New Task Modal (from Auto Proposal) ===== -->
<div class="modal fade" id="apAddTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5 class="fw-bold mb-0 fs-15 text-darkest">Add new task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Public / Billable -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex gap-3">
                        <label><input type="checkbox" id="apTaskPublic"> Public</label>
                        <label><input type="checkbox" id="apTaskBillable" checked> Billable</label>
                    </div>
                </div>
                <!-- Attach Files: drag & drop zone -->
                <div class="at2-drop" id="apTaskDropZone">
                    <i class="bi bi-cloud-arrow-up"></i>
                    <div class="t1">Drag &amp; drop files here, or <span>Browse</span></div>
                    <div class="t2">Images, documents, spreadsheets &mdash; you can attach multiple files</div>
                    <input type="file" id="apTaskAttachInput" multiple class="d-none">
                </div>
                <div id="apTaskFileList"></div>
                <!-- Subject -->
                <div class="mb-3">
                    <label><span class="req">*</span>Subject</label>
                    <input type="text" class="form-control" id="apTaskSubject">
                </div>
                <!-- Hourly Rate -->
                <div class="mb-3">
                    <label>Hourly Rate</label>
                    <input type="number" class="form-control" id="apTaskRate" value="0">
                </div>
                <!-- Start Date / Due Date -->
                <div class="at2-row">
                    <div class="mb-3">
                        <label><span class="req">*</span>Start Date</label>
                        <input type="date" class="form-control" id="apTaskStart" value="2026-09-21">
                    </div>
                    <div class="mb-3">
                        <label>Due Date</label>
                        <input type="date" class="form-control" id="apTaskDue">
                    </div>
                </div>
                <!-- Repeat every / Priority -->
                <div class="at2-row">
                    <div class="mb-3">
                        <label>Repeat every</label>
                        <select class="form-select" id="apTaskRepeat">
                            <option selected>Non selected</option>
                            <option>Daily</option>
                            <option>Every week</option>
                            <option>Every 2 weeks</option>
                            <option>Every month</option>
                            <option>Every 3 months</option>
                            <option>Every 6 months</option>
                            <option>Every year</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Priority</label>
                        <select class="form-select" id="apTaskPriority">
                            <option>Low</option>
                            <option selected>Medium</option>
                            <option>High</option>
                            <option>Urgent</option>
                        </select>
                    </div>
                </div>
                <!-- Related To / Proposal -->
                <div class="at2-row">
                    <div class="mb-3">
                        <label>Related To</label>
                        <select class="form-select" id="apTaskRelated">
                            <option selected>Proposal</option>
                            <option>Lead</option>
                            <option>Customer</option>
                            <option>Project</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Proposal</label>
                        <select class="form-select" id="apTaskProposalSel"></select>
                    </div>
                </div>
                <!-- Dependency -->
                <div class="at2-dep"><input type="checkbox" id="apTaskDependency"><label for="apTaskDependency">Dependency</label></div>
                <!-- Assignees / Followers -->
                <div class="at2-row">
                    <div class="mb-3">
                        <label>Assignees</label>
                        <select class="form-select" id="apTaskAssignees">
                            <option selected>GHARUDA SOFTWARE</option>
                            <option>GHRAUDA SOFTWARE</option>
                            <option>Priya R</option>
                            <option>Harish D.</option>
                            <option>Divya A.</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Followers</label>
                        <select class="form-select" id="apTaskFollowers">
                            <option selected>Non selected</option>
                            <option>GHARUDA SOFTWARE</option>
                            <option>GHRAUDA SOFTWARE</option>
                            <option>Priya R</option>
                        </select>
                    </div>
                </div>
                <!-- Insert Checklist Templates -->
                <div class="mb-3">
                    <label>Insert Checklist Templates</label>
                    <select class="form-select" id="apTaskChecklist">
                        <option selected>Non selected</option>
                        <option>Site survey checklist</option>
                        <option>Quotation checklist</option>
                    </select>
                </div>
                <!-- Tags (chip input) -->
                <div class="mb-3">
                    <label><span class="req">*</span>Tags</label>
                    <div class="nl-tags-wrap w-100" id="apTaskTagsWrap">
                        <div class="nl-tags-chips" id="apTaskTagsChips"></div>
                        <input type="text" class="nl-tags-input" id="apTaskTagsInput" placeholder="Type and press Enter...">
                    </div>
                </div>
                <!-- Task Description -->
                <div class="mb-3">
                    <label>Task Description</label>
                    <textarea class="form-control" id="apTaskDesc" rows="4" placeholder="Add description"></textarea>
                </div>
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="apTaskSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== New Proposal Modal ===== -->
<div class="modal fade" id="newProposalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0">
            
            <div class="modal-header border-bottom bg-white py-3 px-4 d-flex align-items-center justify-content-between"><h5 class="modal-title fw-bold m-0 fs-5">New Proposal</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <div class="modal-body p-4 bg-light-subtle">
                <div class="container-fluid px-0">
                    <div class="row g-4 mb-4">
                        <!-- Left Column -->
                        <div class="col-12 col-xl-6">
                            <div class="mb-3"><label><span class="req">*</span>Subject</label><input type="text" class="form-control" placeholder="Proposal subject"></div>
                            <div class="mb-3"><label><span class="req">*</span>Related</label><select class="form-select">
                                    <option selected>Lead</option>
                                    <option>Customer</option>
                                </select></div>
                            <div class="mb-3"><label><span class="req">*</span>Lead</label><select class="form-select" id="npLeadSelect">
                                    <option>Suresh - gh@gharuda.com</option>
                                    <option>Arun Kumar - info@vetri.co</option>
                                    <option>Meena Ramesh - meena@srlakshmi.in</option>
                                </select></div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label><span class="req">*</span>Date</label><input type="date" class="form-control" value="2026-09-19"></div>
<div class="col-md-6"><label>Open Till</label><input type="date" class="form-control" value="2026-09-26"></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label><span class="req">*</span>Currency</label><select class="form-select">
                                        <option selected>INR ₹</option>
                                        <option>USD $</option>
                                        <option>EUR €</option>
                                        <option>GBP £</option>
                                    </select></div>
<div class="col-md-6"><label>Discount type</label><select class="form-select">
                                        <option selected>No discount</option>
                                        <option>Before Tax</option>
                                        <option>After Tax</option>
                                    </select></div>
</div>
                            <div class="mb-3">
                                <label><i class="bi bi-tag me-1"></i>Tags</label>
                                <div class="nl-tags-wrap w-100" id="npTagsWrap">
                                    <div class="nl-tags-chips" id="npTagsChips"></div>
                                    <input type="text" class="nl-tags-input" id="npTagsInput" placeholder="Type and press Enter...">
                                </div>
                                <input type="hidden" id="np_tags" value="">
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch mt-2"><input class="form-check-input" type="checkbox" checked id="npAllowComments"><label class="form-check-label small fw-medium" for="npAllowComments">Allow Comments</label></div>
                            </div>
                        </div>
                        <!-- Right Column -->
                        <div class="col-12 col-xl-6">
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Status</label><select class="form-select">
                                        <option selected>Draft</option>
                                        <option>Sent</option>
                                        <option>Accepted</option>
                                        <option>Rejected</option>
                                    </select></div>
<div class="col-md-6"><label>Assigned</label><select class="form-select">
                                        <option selected>GHRAUDA SOFTWARE</option>
                                        <option>Harish D.</option>
                                        <option>Divya A.</option>
                                    </select></div>
</div>
                            <div class="mb-3"><label><span class="req">*</span>To</label><input type="text" class="form-control" value="GHARUDA TECHNOLOGY"></div>
                            <div class="mb-3"><label>Address</label><textarea class="form-control" rows="2">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100</textarea></div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Country</label><select class="form-select">
                                        <option selected>India</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select></div>
<div class="col-md-6"><label>State</label><select class="form-select">
                                        <option value="">Nothing selected</option>
                                        <option>Tamil Nadu</option>
                                        <option>Karnataka</option>
                                        <option>Maharashtra</option>
                                    </select></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>City</label><select class="form-select">
                                        <option value="">Nothing selected</option>
                                        <option>Chennai</option>
                                        <option>Bangalore</option>
                                        <option>Mumbai</option>
                                    </select></div>
<div class="col-md-6"><label>Zip Code</label><input type="text" class="form-control" value="600100"></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label><span class="req">*</span>Email</label><input type="email" class="form-control" value="gh@gharuda.com"></div>
<div class="col-md-6"><label>Phone</label><input type="text" class="form-control" value="9876543218"></div>
</div>
                        </div>
                    </div>

                    <!-- Items Section -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <select class="form-select" id="npAddItemSelect">
                                    <option value="">Add Item</option>
                                    <option>HRMS Subscription</option>
                                    <option>Payroll Module</option>
                                    <option>Custom Development</option>
                                    <option>Consulting Hours</option>
                                </select>
                                <button type="button" class="btn btn-primary" id="npAddItemBtn" title="Add item"><i class="bi bi-plus-lg"></i></button>
                            </div>
                            <div class="d-flex align-items-center gap-3 small text-muted">
                                <span>Show quantity as:</span>
                                <label><input type="radio" name="npQtyType" checked> Qty</label>
                                <label><input type="radio" name="npQtyType"> Hours</label>
                                <label><input type="radio" name="npQtyType"> Qty/Hours</label>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="col-w-30"><i class="bi bi-info-circle text-border-light"></i></th>
                                        <th>Item</th>
                                        <th class="col-w-200">Description</th>
                                        <th class="col-w-80">Qty</th>
                                        <th class="col-w-110">Rate</th>
                                        <th class="col-w-100">Discount %</th>
                                        <th class="col-w-110">Tax</th>
                                        <th class="col-w-110">Amount</th>
                                        <th class="col-w-36"><i class="bi bi-gear text-border-light"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="npItemBody">
                                    <tr>
                                        <td><i class="bi bi-info-circle text-border-light fs-12"></i></td>
                                        <td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>
                                        <td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>
                                        <td><input type="number" class="form-control" value="1" min="0"></td>
                                        <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                        <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                        <td><select class="form-select">
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></td>
                                        <td><span class="fw-bold text-darkest">₹ 0.00</span></td>
                                        <td><button type="button" class="btn btn-sm btn-primary rounded-circle np-check-btn" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Totals -->
                        <div class="d-flex justify-content-end mt-4">
                            <div class="d-flex flex-column gap-2 text-end" style="min-width: 320px;">
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Sub Total :</span><span class="fw-bold fs-6 text-dark">₹ 0.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Adjustment</span><input type="number" class="form-control col-w-120" value="0"><span class="fw-bold fs-6 text-dark">₹ 0.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Transport Amount</span><input type="number" class="form-control col-w-120" value="0"><span class="fw-bold fs-6 text-dark">₹ 0.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Total :</span><span class="fw-bold fs-5 text-primary">₹ 0.00</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Section -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="mb-3"><label>Client Note</label><textarea class="form-control" placeholder="Enter client note..."></textarea></div>
                        <div><label>Terms & Conditions</label><textarea class="form-control np-tc" placeholder="Enter terms and conditions..."></textarea></div>
                    </div>
                </div>
            </div><!-- /modal-body -->
            <!-- Footer -->
            <div class="modal-footer bg-white border-top p-3 d-flex align-items-center justify-content-between">
                <span class="small text-muted">Include proposal items with merge field anywhere in proposal content as {proposal_items}</span>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== New Estimate Modal (Convert ▾ -> Estimate) ===== -->
<div class="modal fade" id="newEstimateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0">
            
            <div class="modal-header border-bottom bg-white py-3 px-4 d-flex align-items-center justify-content-between"><h5 class="modal-title fw-bold m-0 fs-5"><i class="bi bi-file-earmark-text me-2 text-crm-primary"></i>New Estimate</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <div class="modal-body p-4 bg-light-subtle">
                <div class="container-fluid px-0">
                    <div class="row g-4 mb-4">
                        <!-- Left Column -->
                        <div class="col-12 col-xl-6">
                            <div class="mb-3"><label><span class="req">*</span>Subject</label><input type="text" class="form-control" value="Solar Panel Installation - Estimate"></div>
                            <div class="mb-3"><label><span class="req">*</span>Related</label><select class="form-select">
                                    <option selected>Lead</option>
                                    <option>Customer</option>
                                </select></div>
                            <div class="mb-3"><label><span class="req">*</span>Lead</label><select class="form-select">
                                    <option selected>Suresh - gh@gharuda.com</option>
                                    <option>Arun Kumar - info@vetri.co</option>
                                    <option>Meena Ramesh - meena@srlakshmi.in</option>
                                </select></div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label><span class="req">*</span>Date</label><input type="date" class="form-control" value="2026-09-23"></div>
<div class="col-md-6"><label>Open Till</label><input type="date" class="form-control" value="2026-09-30"></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label><span class="req">*</span>Currency</label><select class="form-select">
                                        <option selected>INR ₹</option>
                                        <option>USD $</option>
                                        <option>EUR €</option>
                                        <option>GBP £</option>
                                    </select></div>
<div class="col-md-6"><label>Discount type</label><select class="form-select">
                                        <option selected>No discount</option>
                                        <option>Before Tax</option>
                                        <option>After Tax</option>
                                    </select></div>
</div>
                            <div class="mb-3">
                                <label><i class="bi bi-tag me-1"></i>Tags</label>
                                <div class="nl-tags-wrap w-100">
                                    <div class="nl-tags-chips"><span class="nl-tag-chip">Estimate</span></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch mt-2"><input class="form-check-input" type="checkbox" checked id="esAllowComments"><label class="form-check-label small fw-medium" for="esAllowComments">Allow Comments</label></div>
                            </div>
                        </div>
                        <!-- Right Column -->
                        <div class="col-12 col-xl-6">
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Status</label><select class="form-select">
                                        <option selected>Draft</option>
                                        <option>Sent</option>
                                        <option>Accepted</option>
                                        <option>Rejected</option>
                                        <option>Expired</option>
                                    </select></div>
<div class="col-md-6"><label>Assigned</label><select class="form-select">
                                        <option selected>GHRAUDA SOFTWARE</option>
                                        <option>Harish D.</option>
                                        <option>Divya A.</option>
                                    </select></div>
</div>
                            <div class="mb-3"><label><span class="req">*</span>To</label><input type="text" class="form-control" value="GHARUDA TECHNOLOGY"></div>
                            <div class="mb-3"><label>Address</label><textarea class="form-control" rows="2">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100</textarea></div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Country</label><select class="form-select">
                                        <option selected>India</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select></div>
<div class="col-md-6"><label>State</label><select class="form-select">
                                        <option selected>Tamil Nadu</option>
                                        <option>Karnataka</option>
                                        <option>Maharashtra</option>
                                    </select></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>City</label><select class="form-select">
                                        <option selected>Chennai</option>
                                        <option>Bangalore</option>
                                        <option>Mumbai</option>
                                    </select></div>
<div class="col-md-6"><label>Zip Code</label><input type="text" class="form-control" value="600100"></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label><span class="req">*</span>Email</label><input type="email" class="form-control" value="gh@gharuda.com"></div>
<div class="col-md-6"><label>Phone</label><input type="text" class="form-control" value="9876543218"></div>
</div>
                        </div>
                    </div>

                    <!-- Items Section -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <select class="form-select">
                                    <option value="">Add Item</option>
                                    <option>HRMS Subscription</option>
                                    <option>Payroll Module</option>
                                    <option>Custom Development</option>
                                    <option>Consulting Hours</option>
                                </select>
                                <button type="button" class="btn btn-primary" title="Add item"><i class="bi bi-plus-lg"></i></button>
                            </div>
                            <div class="d-flex align-items-center gap-3 small text-muted">
                                <span>Show quantity as:</span>
                                <label><input type="radio" name="esQtyType" checked> Qty</label>
                                <label><input type="radio" name="esQtyType"> Hours</label>
                                <label><input type="radio" name="esQtyType"> Qty/Hours</label>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="col-w-30"><i class="bi bi-info-circle text-border-light"></i></th>
                                        <th>Item</th>
                                        <th class="col-w-200">Description</th>
                                        <th class="col-w-80">Qty</th>
                                        <th class="col-w-110">Rate</th>
                                        <th class="col-w-100">Discount %</th>
                                        <th class="col-w-110">Tax</th>
                                        <th class="col-w-110">Amount</th>
                                        <th class="col-w-36"><i class="bi bi-gear text-border-light"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="bi bi-info-circle text-border-light fs-12"></i></td>
                                        <td><textarea class="form-control" rows="2">10kW Solar Panel Kit</textarea></td>
                                        <td><textarea class="form-control" rows="2">Tier-1 mono PERC panels with 25yr warranty</textarea></td>
                                        <td><input type="number" class="form-control" value="1" min="0"></td>
                                        <td><input type="number" class="form-control" value="95000.00" step="0.01"></td>
                                        <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                        <td><select class="form-select">
                                                <option>No Tax</option>
                                                <option selected>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></td>
                                        <td><span class="fw-bold text-darkest">₹ 99,750.00</span></td>
                                        <td><button type="button" class="btn btn-sm btn-primary rounded-circle np-check-btn" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><i class="bi bi-info-circle text-border-light fs-12"></i></td>
                                        <td><textarea class="form-control" rows="2">Installation & Commissioning</textarea></td>
                                        <td><textarea class="form-control" rows="2">Onsite installation, wiring and net-metering support</textarea></td>
                                        <td><input type="number" class="form-control" value="1" min="0"></td>
                                        <td><input type="number" class="form-control" value="18000.00" step="0.01"></td>
                                        <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                        <td><select class="form-select">
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></td>
                                        <td><span class="fw-bold text-darkest">₹ 18,000.00</span></td>
                                        <td><button type="button" class="btn btn-sm btn-primary rounded-circle np-check-btn" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Totals -->
                        <div class="d-flex justify-content-end mt-4">
                            <div class="d-flex flex-column gap-2 text-end" style="min-width: 320px;">
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Sub Total :</span><span class="fw-bold fs-6 text-dark">₹ 1,13,000.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Adjustment</span><input type="number" class="form-control col-w-120" value="0"><span class="fw-bold fs-6 text-dark">₹ 0.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Transport Amount</span><input type="number" class="form-control col-w-120" value="0"><span class="fw-bold fs-6 text-dark">₹ 0.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Total :</span><span class="fw-bold fs-5 text-primary">₹ 1,13,000.00</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Section -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="mb-3"><label>Client Note</label><textarea class="form-control">Estimate valid for 7 days. Price inclusive of standard installation.</textarea></div>
                        <div><label>Terms & Conditions</label><textarea class="form-control np-tc">1. 50% advance payment required to confirm the order.
2. Installation timeline: 7 working days from advance receipt.
3. Net-metering approval handled by GHRA TECHNOLOGY.</textarea></div>
                    </div>
                </div>
            </div><!-- /modal-body -->
            <!-- Footer -->
            <div class="modal-footer bg-white border-top p-3 d-flex align-items-center justify-content-between">
                <span class="small text-muted">Include estimate items with merge field anywhere in estimate content as {estimate_items}</span>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== New Invoice Modal (Convert ▾ -> Invoice) ===== -->
<div class="modal fade" id="newInvoiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0">
            
            <div class="modal-header border-bottom bg-white py-3 px-4 d-flex align-items-center justify-content-between"><h5 class="modal-title fw-bold m-0 fs-5"><i class="bi bi-receipt me-2 text-crm-primary"></i>New Invoice</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <div class="modal-body p-4 bg-light-subtle">
                <div class="container-fluid px-0">
                    <div class="row g-4 mb-4">
                        <!-- Left Column -->
                        <div class="col-12 col-xl-6">
                            <div class="mb-3"><label><span class="req">*</span>Subject</label><input type="text" class="form-control" value="Solar Panel Installation - Invoice INV-259"></div>
                            <div class="mb-3"><label><span class="req">*</span>Related</label><select class="form-select">
                                    <option selected>Lead</option>
                                    <option>Customer</option>
                                </select></div>
                            <div class="mb-3"><label><span class="req">*</span>Lead</label><select class="form-select">
                                    <option selected>Suresh - gh@gharuda.com</option>
                                    <option>Arun Kumar - info@vetri.co</option>
                                    <option>Meena Ramesh - meena@srlakshmi.in</option>
                                </select></div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label><span class="req">*</span>Invoice Date</label><input type="date" class="form-control" value="2026-09-23"></div>
<div class="col-md-6"><label><span class="req">*</span>Due Date</label><input type="date" class="form-control" value="2026-09-30"></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label><span class="req">*</span>Currency</label><select class="form-select">
                                        <option selected>INR ₹</option>
                                        <option>USD $</option>
                                        <option>EUR €</option>
                                        <option>GBP £</option>
                                    </select></div>
<div class="col-md-6"><label>Discount type</label><select class="form-select">
                                        <option selected>No discount</option>
                                        <option>Before Tax</option>
                                        <option>After Tax</option>
                                    </select></div>
</div>
                            <div class="mb-3">
                                <label><i class="bi bi-tag me-1"></i>Tags</label>
                                <div class="nl-tags-wrap w-100">
                                    <div class="nl-tags-chips"><span class="nl-tag-chip">Invoice</span></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch mt-2"><input class="form-check-input" type="checkbox" checked id="invAllowComments"><label class="form-check-label small fw-medium" for="invAllowComments">Allow Comments</label></div>
                            </div>
                            <div class="mb-3"><label>Reference #</label><input type="text" class="form-control" value="INV-259"></div>
                        </div>
                        <!-- Right Column -->
                        <div class="col-12 col-xl-6">
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Status</label><select class="form-select">
                                        <option selected>Unpaid</option>
                                        <option>Paid</option>
                                        <option>Partially Paid</option>
                                        <option>Overdue</option>
                                        <option>Cancelled</option>
                                        <option>Draft</option>
                                    </select></div>
<div class="col-md-6"><label>Assigned</label><select class="form-select">
                                        <option selected>GHRAUDA SOFTWARE</option>
                                        <option>Harish D.</option>
                                        <option>Divya A.</option>
                                    </select></div>
</div>
                            <div class="mb-3"><label><span class="req">*</span>Bill To</label><input type="text" class="form-control" value="GHARUDA TECHNOLOGY"></div>
                            <div class="mb-3"><label>Address</label><textarea class="form-control" rows="2">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100</textarea></div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Country</label><select class="form-select">
                                        <option selected>India</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select></div>
<div class="col-md-6"><label>State</label><select class="form-select">
                                        <option selected>Tamil Nadu</option>
                                        <option>Karnataka</option>
                                        <option>Maharashtra</option>
                                    </select></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>City</label><select class="form-select">
                                        <option selected>Chennai</option>
                                        <option>Bangalore</option>
                                        <option>Mumbai</option>
                                    </select></div>
<div class="col-md-6"><label>Zip Code</label><input type="text" class="form-control" value="600100"></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label><span class="req">*</span>Email</label><input type="email" class="form-control" value="gh@gharuda.com"></div>
<div class="col-md-6"><label>Phone</label><input type="text" class="form-control" value="9876543218"></div>
</div>
                        </div>
                    </div>

                    <!-- Items Section -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <select class="form-select">
                                    <option value="">Add Item</option>
                                    <option>HRMS Subscription</option>
                                    <option>Payroll Module</option>
                                    <option>Custom Development</option>
                                    <option>Consulting Hours</option>
                                </select>
                                <button type="button" class="btn btn-primary" title="Add item"><i class="bi bi-plus-lg"></i></button>
                            </div>
                            <div class="d-flex align-items-center gap-3 small text-muted">
                                <span>Show quantity as:</span>
                                <label><input type="radio" name="invQtyType" checked> Qty</label>
                                <label><input type="radio" name="invQtyType"> Hours</label>
                                <label><input type="radio" name="invQtyType"> Qty/Hours</label>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="col-w-30"><i class="bi bi-info-circle text-border-light"></i></th>
                                        <th>Item</th>
                                        <th class="col-w-200">Description</th>
                                        <th class="col-w-80">Qty</th>
                                        <th class="col-w-110">Rate</th>
                                        <th class="col-w-100">Discount %</th>
                                        <th class="col-w-110">Tax</th>
                                        <th class="col-w-110">Amount</th>
                                        <th class="col-w-36"><i class="bi bi-gear text-border-light"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="bi bi-info-circle text-border-light fs-12"></i></td>
                                        <td><textarea class="form-control" rows="2">10kW Solar Panel Kit</textarea></td>
                                        <td><textarea class="form-control" rows="2">Tier-1 mono PERC panels with 25yr warranty</textarea></td>
                                        <td><input type="number" class="form-control" value="1" min="0"></td>
                                        <td><input type="number" class="form-control" value="95000.00" step="0.01"></td>
                                        <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                        <td><select class="form-select">
                                                <option>No Tax</option>
                                                <option selected>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></td>
                                        <td><span class="fw-bold text-darkest">₹ 99,750.00</span></td>
                                        <td><button type="button" class="btn btn-sm btn-primary rounded-circle np-check-btn" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><i class="bi bi-info-circle text-border-light fs-12"></i></td>
                                        <td><textarea class="form-control" rows="2">Installation & Commissioning</textarea></td>
                                        <td><textarea class="form-control" rows="2">Onsite installation, wiring and net-metering support</textarea></td>
                                        <td><input type="number" class="form-control" value="1" min="0"></td>
                                        <td><input type="number" class="form-control" value="18000.00" step="0.01"></td>
                                        <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                        <td><select class="form-select">
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></td>
                                        <td><span class="fw-bold text-darkest">₹ 18,000.00</span></td>
                                        <td><button type="button" class="btn btn-sm btn-primary rounded-circle np-check-btn" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Totals -->
                        <div class="d-flex justify-content-end mt-4">
                            <div class="d-flex flex-column gap-2 text-end" style="min-width: 320px;">
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Sub Total :</span><span class="fw-bold fs-6 text-dark">₹ 1,13,000.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Adjustment</span><input type="number" class="form-control col-w-120" value="0"><span class="fw-bold fs-6 text-dark">₹ 0.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Transport Amount</span><input type="number" class="form-control col-w-120" value="0"><span class="fw-bold fs-6 text-dark">₹ 0.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Amount Paid</span><input type="number" class="form-control col-w-120" value="0"><span class="fw-bold fs-6 text-dark">₹ 0.00</span></div>
                                <div class="d-flex align-items-center justify-content-end gap-3"><span class="small fw-semibold text-muted">Balance Due :</span><span class="fw-bold fs-5 text-primary">₹ 1,13,000.00</span></div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Section -->
                    <div class="card border shadow-sm p-4 mb-4 bg-white">
                        <div class="mb-3"><label>Client Note</label><textarea class="form-control">Payment due within 7 days. Invoice INV-259 generated from accepted proposal.</textarea></div>
                        <div><label>Terms & Conditions</label><textarea class="form-control np-tc">1. Payment via NEFT/UPI/Cheque in favour of GHRA TECHNOLOGY.
2. Late payments attract 2% interest per month.
3. Warranty as per manufacturer terms.</textarea></div>
                    </div>
                </div>
            </div><!-- /modal-body -->
            <!-- Footer -->
            <div class="modal-footer bg-white border-top p-3 d-flex align-items-center justify-content-between">
                <span class="small text-muted">Include invoice items with merge field anywhere in invoice content as {invoice_items}</span>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="niSubmitBtn">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== Record Payment Modal (Invoice panel → Payment) ===== -->
<div class="modal fade" id="apRecordPaymentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header border-bottom py-3 px-4">
                <h5 class="modal-title fs-5 fw-bold">Record Payment for <span class="text-theme-blue">INV-259</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpAmount"><span class="req">*</span>Amount Received</label>
                        <input type="text" class="form-control" id="rpAmount" value="393750.00">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpTxnId">Transaction ID</label>
                        <input type="text" class="form-control" id="rpTxnId" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpDate"><span class="req">*</span>Payment Date</label>
                        <input type="date" class="form-control" id="rpDate" value="2026-09-23">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpNote">Leave a note</label>
                        <textarea class="form-control resize-vertical" id="rpNote" rows="4" placeholder="Admin Note"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpMode"><span class="req">*</span>Payment Mode</label>
                        <select class="form-select" id="rpMode">
                            <option value="">Non selected</option>
                            <option>Cash</option>
                            <option>Bank Transfer</option>
                            <option>Cheque</option>
                            <option>UPI</option>
                            <option>Card</option>
                        </select>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpAgent">Sales Agent</label>
                        <select class="form-select" id="rpAgent">
                            <option value="">Non selected</option>
                            <option>gharuda SOFTWARE</option>
                            <option>GHRAUDA SOFTWARE</option>
                            <option>Harish D.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpDeposit">Deposit To</label>
                        <select class="form-select" id="rpDeposit">
                            <option value="">Non selected</option>
                            <option>Cash Account</option>
                            <option>HDFC Bank - ****4521</option>
                            <option>ICICI Bank - ****8830</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpAccount">Payment Account</label>
                        <select class="form-select" id="rpAccount">
                            <option value="">Non selected</option>
                            <option>HDFC Bank - ****4521</option>
                            <option>ICICI Bank - ****8830</option>
                            <option>Cash in Hand</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="d-flex align-items-center gap-2 fs-12-5 fw-semibold text-dark-gray cursor-pointer">
                            <input type="checkbox" class="form-check-input mt-0" id="rpNoEmail"> Do not send invoice payment recorded email to customer contacts
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top py-3 px-4">
                <button type="button" class="btn btn-danger btn-rounded-8-fs13" data-bs-dismiss="modal">Cancelled</button>
                <button type="button" class="btn btn-primary btn-rounded-8-fs13" id="rpSubmitBtn">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Payment Receipt View Modal (fullscreen) ===== -->
<div class="modal fade" id="apPaymentViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0">
            
            <div class="modal-body p-4 bg-light-subtle">
                <div class="row g-4">
                    <!-- Left: payment form summary -->
                    <div class="col-12 col-lg-5"><div class="card border shadow-sm p-4 bg-white">
                        <div class="fs-14 fw-bold text-darkest mb-3">Payment for Invoice <span class="text-theme-blue">INV-259</span></div>
                        <div class="mb-3"><label class="form-label fw-medium small text-muted mb-1"><span class="req">*</span> Amount Received</label><input type="text" class="form-control" id="pvAmount" readonly></div>
                        <div class="mb-3"><label class="form-label fw-medium small text-muted mb-1"><span class="req">*</span> Payment Date</label><input type="date" class="form-control" id="pvDate" readonly></div>
                        <div class="mb-3"><label class="form-label fw-medium small text-muted mb-1">Payment Mode</label><input type="text" class="form-control" id="pvMode" readonly></div>
                        <div class="mb-3"><label class="form-label fw-medium small text-muted mb-1">Transaction ID</label><input type="text" class="form-control" id="pvTxn" readonly placeholder="—"></div>
                        <div class="mb-3"><label class="form-label fw-medium small text-muted mb-1">Sale Agent</label><input type="text" class="form-control" id="pvAgent" readonly placeholder="—"></div>
                        <div class="mb-3"><label class="form-label fw-medium small text-muted mb-1">Note</label><textarea class="form-control" id="pvNote" rows="4" readonly placeholder="—"></textarea></div>
                        <div class="row g-2">
                            <div class="col-6"><label class="form-label fw-medium small text-muted mb-1">Payment Account</label><input type="text" class="form-control" id="pvAccount" readonly placeholder="Non selected"></div>
                            <div class="col-6"><label class="form-label fw-medium small text-muted mb-1">Deposit To</label><input type="text" class="form-control" id="pvDeposit" readonly placeholder="Non selected"></div>
                        </div>
                    </div>
                    <!-- Right: payment receipt -->
                    </div></div><div class="col-12 col-lg-7"><div class="card border shadow-sm p-4 bg-white">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="fs-14 fw-bold text-darkest">Payment</div>
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" class="ap-icon-btn" title="Email receipt"><i class="bi bi-envelope"></i></button>
                                <button type="button" class="ap-icon-btn" title="Download receipt"><i class="bi bi-download"></i></button>
                                <button type="button" class="ap-icon-btn" title="Print receipt"><i class="bi bi-printer"></i></button>
                                <button type="button" class="btn btn-danger btn-sm btn-rounded-8-pad" data-bs-dismiss="modal" title="Close"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-start gap-4 flex-wrap">
                            <div>
                                <div class="fs-12-5 fw-bold text-darkest">GHARUDA SOFTWARE TECHNOLOGY PRIVATE LIMITED</div>
                                <div class="inv-address-text">PC 20 / 3, 3rd Block, Mogappair West<br>Chennai - 560086, Tamil Nadu<br>India<br>9855321470<br>GST Number: 29AABCR7796N1O0O</div>
                            </div>
                            <div class="text-end">
                                <div class="fs-12 fw-bold text-theme-blue">GG COMPANY</div>
                                <div class="inv-address-text">1/2 VOC STREET MENABADU AMBATTUR CHENNAI<br>Chennai<br>IN 6006</div>
                            </div>
                        </div>
                        <div class="text-center fw-bold fs-5 my-3 text-uppercase text-primary border-bottom pb-2">PAYMENT RECEIPT</div>
                        <table class="pv-receipt-table">
                            <tr><td class="pv-receipt-td">Payment Date:</td><td class="pv-receipt-val" id="pvReceiptDate">23-09-2026</td></tr>
                            <tr><td class="pv-receipt-td">Payment Mode:</td><td class="pv-receipt-val" id="pvReceiptMode">Bank</td></tr>
                        </table>
                        <div class="card bg-light-subtle border text-center p-3 my-3 fw-bold fs-5">Total Amount<br><span class="fs-16" id="pvReceiptTotal">₹ 393,750.00</span></div>
                        <div class="fs-13 fw-bold text-muted my-3">Payment For</div>
                        <div class="table-responsive">
                            <table class="table-modern w-100 mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">Invoice Number</th>
                                        <th class="text-nowrap">Invoice Date</th>
                                        <th class="text-nowrap">Invoice Amount</th>
                                        <th class="text-nowrap">Payment Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>INV-259</td>
                                        <td>23-09-2026</td>
                                        <td>₹ 393,750.00</td>
                                        <td id="pvReceiptPaid">₹ 393,750.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div></div><!-- ===== New Task Modal ===== -->
<div class="modal fade" id="newTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-w620">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5>Add new task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Public / Billable -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex gap-3">
                        <label><input type="checkbox" id="tkPublic"> Public</label>
                        <label><input type="checkbox" id="tkBillable" checked> Billable</label>
                    </div>
                </div>
                <!-- Attach Files: drag & drop zone -->
                <div class="tk-drop" id="tkDropZone">
                    <i class="bi bi-cloud-arrow-up"></i>
                    <div class="t1">Drag &amp; drop files here, or <span>Browse</span></div>
                    <div class="t2">Images, documents, spreadsheets &mdash; you can attach multiple files</div>
                    <input type="file" id="tkAttachInput" multiple class="d-none">
                </div>
                <div id="tkFileList"></div>
                <!-- Subject -->
                <div class="mb-3">
                    <label><span class="req">*</span>Subject</label>
                    <input type="text" class="form-control" id="tkSubject" placeholder="">
                </div>
                <!-- Hourly Rate -->
                <div class="mb-3">
                    <label>Hourly Rate</label>
                    <input type="number" class="form-control" id="tkHourlyRate" value="0">
                </div>
                <!-- Start Date / Due Date -->
                <div class="tk-2col">
                    <div class="mb-3">
                        <label><span class="req">*</span>Start Date</label>
                        <input type="date" class="form-control" id="tkStartDate" value="2026-09-21">
                    </div>
                    <div class="mb-3">
                        <label>Due Date</label>
                        <input type="date" class="form-control" id="tkDueDate">
                    </div>
                </div>
                <!-- Repeat every / Priority -->
                <div class="tk-2col">
                    <div class="mb-3">
                        <label>Repeat every</label>
                        <select class="form-select" id="tkRepeat">
                            <option selected>Non selected</option>
                            <option>Every day</option>
                            <option>Every week</option>
                            <option>Every month</option>
                            <option>Every year</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Priority</label>
                        <select class="form-select" id="tkPriority">
                            <option>Low</option>
                            <option selected>Medium</option>
                            <option>High</option>
                            <option>Urgent</option>
                        </select>
                    </div>
                </div>
                <!-- Related To / Proposal -->
                <div class="tk-2col">
                    <div class="mb-3">
                        <label>Related To</label>
                        <select class="form-select" id="tkRelatedTo">
                            <option selected>Proposal</option>
                            <option>Lead</option>
                            <option>Customer</option>
                            <option>Project</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Proposal</label>
                        <select class="form-select" id="tkProposalSel">
                            <option selected>PRO-152</option>
                            <option>PRO-151</option>
                            <option>PRO-150</option>
                            <option>PRO-149</option>
                            <option>PRO-148</option>
                            <option>PRO-147</option>
                            <option>PRO-140</option>
                        </select>
                    </div>
                </div>
                <!-- Dependency -->
                <div class="tk-dep"><input type="checkbox" id="tkDependency"><label for="tkDependency">Dependency</label></div>
                <!-- Assignees / Followers -->
                <div class="tk-2col">
                    <div class="mb-3">
                        <label>Assignees</label>
                        <select class="form-select" id="tkAssignees">
                            <option selected>GHARUDA SOFTWARE</option>
                            <option>GHRAUDA SOFTWARE</option>
                            <option>Priya R</option>
                            <option>Suresh Babu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Followers</label>
                        <select class="form-select" id="tkFollowers">
                            <option selected>Non selected</option>
                            <option>GHARUDA SOFTWARE</option>
                            <option>GHRAUDA SOFTWARE</option>
                            <option>Priya R</option>
                        </select>
                    </div>
                </div>
                <!-- Insert Checklist Templates -->
                <div class="mb-3">
                    <label>Insert Checklist Templates</label>
                    <select class="form-select" id="tkChecklist">
                        <option selected>Non selected</option>
                        <option>Site Survey Checklist</option>
                        <option>Installation Checklist</option>
                        <option>Quotation Review Checklist</option>
                    </select>
                </div>
                <!-- Tags (chip input) -->
                <div class="mb-3">
                    <label><span class="req">*</span>Tags</label>
                    <div class="nl-tags-wrap w-100" id="tkTagsWrap">
                        <div class="nl-tags-chips" id="tkTagsChips"></div>
                        <input type="text" class="nl-tags-input" id="tkTagsInput" placeholder="Type and press Enter...">
                    </div>
                </div>
                <!-- Task Description -->
                <div class="mb-3">
                    <label>Task Description</label>
                    <textarea class="form-control" id="tkDescription" placeholder="Add description"></textarea>
                </div>
            </div>
            <!-- Footer -->
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tkTaskSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>
<script src="./assets/js/pages/lead.js?v=<?php echo time(); ?>"></script>



<?php include 'footer.php'; ?>