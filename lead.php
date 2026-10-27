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

/* ===== New Lead Modal: Frozen Header & Footer with Independent Inner Scroll ===== */
#newLeadModal {
    overflow: hidden !important;
    padding: 0 !important;
}

#newLeadModal .modal-dialog,
#newLeadModal .modal-dialog.modal-fullscreen {
    height: 100vh !important;
    max-height: 100vh !important;
    width: 100vw !important;
    max-width: 100vw !important;
    margin: 0 !important;
    padding: 0 !important;
}

#newLeadModal .modal-content,
#newLeadModal form#newLeadForm {
    height: 100vh !important;
    max-height: 100vh !important;
    min-height: 100vh !important;
    display: flex !important;
    flex-direction: column !important;
    overflow: hidden !important;
    border-radius: 0 !important;
    margin: 0 !important;
    border: 0 !important;
}

#newLeadModal .modal-header {
    flex: 0 0 auto !important;
    flex-shrink: 0 !important;
    position: sticky !important;
    top: 0 !important;
    z-index: 1055 !important;
    background: #ffffff !important;
    border-bottom: 1px solid #e2e8f0 !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05) !important;
}

#newLeadModal .modal-body {
    flex: 1 1 0% !important;
    min-height: 0 !important;
    height: auto !important;
    max-height: none !important;
    overflow-y: auto !important;
    overflow-x: hidden !important;
    padding: 1.5rem !important;
    background-color: #f8fafc !important;
    -webkit-overflow-scrolling: touch;
    scroll-behavior: smooth;
}

/* Custom sleek scrollbar for New Lead modal body */
#newLeadModal .modal-body::-webkit-scrollbar {
    width: 8px;
}
#newLeadModal .modal-body::-webkit-scrollbar-track {
    background: #f1f5f9;
}
#newLeadModal .modal-body::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 4px;
}
#newLeadModal .modal-body::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

#newLeadModal .modal-footer {
    flex: 0 0 auto !important;
    flex-shrink: 0 !important;
    position: sticky !important;
    bottom: 0 !important;
    z-index: 1055 !important;
    background: #ffffff !important;
    border-top: 1px solid #e2e8f0 !important;
    box-shadow: 0 -4px 16px rgba(0, 0, 0, 0.08) !important;
    padding: 0.85rem 1.5rem !important;
}

#newLeadModal .nl-body {
    max-width: 1440px;
    margin: 0 auto;
}
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        /* ---- Page view tabs: All Leads / Activity Stats ---- */
        var lpTabs = document.querySelectorAll('#lpTabs .lp-tab');
        lpTabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                lpTabs.forEach(function(t) {
                    t.classList.remove('active', 'btn-primary');
                    t.classList.add('btn-outline-primary');
                });
                tab.classList.add('active', 'btn-primary');
                tab.classList.remove('btn-outline-primary');
                document.querySelectorAll('.lp-panel').forEach(function(p) {
                    p.classList.remove('active');
                });
                var panel = document.getElementById('lpPanel-' + tab.dataset.tab);
                if (panel) panel.classList.add('active');
                /* re-measure responsive tables inside the shown panel */
                window.dispatchEvent(new Event('resize'));
            });
        });

        /* ---- Activity Stats group cards: ovvoru period cell um clickable ----
           fu-link (Follow Up) cells → follow-up-list.php page redirect (range+type params)
           matha group cells → demo toast */
        var statsToastTimer = null;
        function showStatsToast(msg) {
            var old = document.getElementById('astToast');
            if (old) old.remove();
            var t = document.createElement('div');
            t.id = 'astToast';
            t.style.cssText = 'position:fixed;bottom:24px;left:50%;transform:translateX(-50%);background:#111827;color:#fff;padding:10px 18px;border-radius:10px;font-size:12.5px;font-weight:700;z-index:9999;box-shadow:0 10px 28px rgba(0,0,0,.25);opacity:0;transition:opacity .18s;';
            t.textContent = msg;
            document.body.appendChild(t);
            requestAnimationFrame(function() { t.style.opacity = '1'; });
            clearTimeout(statsToastTimer);
            statsToastTimer = setTimeout(function() {
                t.style.opacity = '0';
                setTimeout(function() { t.remove(); }, 250);
            }, 2600);
        }
        document.querySelectorAll('#lpPanel-stats .ast-open').forEach(function(cell) {
            cell.addEventListener('click', function() {
                var group = cell.getAttribute('data-group') || '';
                var period = cell.getAttribute('data-period') || '';
                var range = cell.getAttribute('data-range') || '';
                var isFu = cell.classList.contains('fu-link');
                var label = group + ' — ' + period;
                if (isFu) {
                    /* Follow Up cells → follow-up-list.php page open (range + type param oda) */
                    var fuType = label.indexOf('Completed') !== -1 ? 'completed' : 'actual';
                    window.location.href = 'follow-up-list.php?range=' + encodeURIComponent(range) + '&type=' + fuType;
                } else {
                    /* Matha group cells: group+period filter panni lead list kaatum (demo toast) */
                    showStatsToast('📋 ' + label + ' leads list open aagudhu… (' + range + ')');
                }
            });
        });
    });
</script>

<!-- ===== New Lead Modal ===== -->
<div class="modal fade" id="newLeadModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <form id="newLeadForm" class="modal-content border-0">
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
                <div class="modal-footer bg-white border-top p-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-3 text-muted small">
                        <span><i class="bi bi-shield-check text-success me-1"></i>All fields marked with <span class="text-danger fw-bold">*</span> are required</span>
                        <span class="d-none d-md-inline text-muted">&bull;</span>
                        <span class="d-none d-md-inline"><i class="bi bi-lightning-charge text-primary me-1"></i>Enquiry code auto-generated</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-outline-secondary px-3" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-1"></i>Close
                        </button>
                        <button type="button" class="btn btn-outline-danger px-3" id="nlFormResetBtn" onclick="document.getElementById('newLeadForm').reset(); if (typeof $ !== 'undefined') $('#newLeadModal .select2').val(null).trigger('change');">
                            <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                        </button>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold shadow-sm">
                            <i class="bi bi-check-lg me-1"></i>Submit Lead
                        </button>
                    </div>
                </div>
        </form>
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
                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="apmCtSubject" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="apmCtDesc" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Related <span class="text-danger">*</span></label>
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
                        <label class="form-label">Date / Time <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control" id="apmCtDateTime">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Location (optional)</label>
                        <input type="text" class="form-control" id="apmCtLocation" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Attendees <span class="text-danger">*</span></label>
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
                    <label>Choose CSV File <span class="req">*</span></label>
                    <input type="file" class="form-control" id="importFile" accept=".csv,.xlsx,.xls">
                </div>
                <div class="mb-3">
                    <label>Status (fallback) <span class="req">*</span></label>
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
                    <label>Source (fallback) <span class="req">*</span></label>
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
            <script>
                (function() {
                    var modal = document.getElementById('importLeadsModal');
                    if (!modal) return;
                    /* + button -> inline add row for status/source */
                    modal.querySelectorAll('.im-inline-add[data-im-target]').forEach(function(btn) {
                        btn.addEventListener('click', function() {
                            var wrap = btn.closest('.im-field').querySelector('.im-inline-wrap');
                            if (wrap) {
                                wrap.classList.toggle('show');
                                var inp = wrap.querySelector('input');
                                if (inp && wrap.classList.contains('show')) inp.focus();
                            }
                        });
                    });
                    /* inline save -> append option to sibling select */
                    modal.querySelectorAll('.im-inline-save').forEach(function(saveBtn) {
                        saveBtn.addEventListener('click', function() {
                            var wrap = saveBtn.closest('.im-inline-wrap');
                            var inp = wrap.querySelector('input');
                            var val = inp.value.trim();
                            if (!val) return;
                            var selId = wrap.id === 'imInlineStatus' ? 'importStatus' : 'importSource';
                            var sel = document.getElementById(selId);
                            var exists = Array.from(sel.options).some(function(o) {
                                return o.text.toLowerCase() === val.toLowerCase();
                            });
                            if (!exists) {
                                var opt = document.createElement('option');
                                opt.textContent = val;
                                sel.appendChild(opt);
                            }
                            sel.value = Array.from(sel.options).find(function(o) {
                                return o.text.toLowerCase() === val.toLowerCase();
                            }).value || val;
                            inp.value = '';
                            wrap.classList.remove('show');
                        });
                    });
                    /* Enter key in inline input triggers save */
                    modal.querySelectorAll('.im-inline-wrap input').forEach(function(inp) {
                        inp.addEventListener('keydown', function(e) {
                            if (e.key === 'Enter') {
                                e.preventDefault();
                                inp.closest('.im-inline-wrap').querySelector('.im-inline-save').click();
                            }
                        });
                    });
                    /* Download sample CSV (demo blob) */
                    var sampleLink = document.getElementById('importSampleLink');
                    if (sampleLink) sampleLink.addEventListener('click', function(e) {
                        e.preventDefault();
                        var csv = 'Name,Company,Phone,Email,Country,Product,Value,Tags,Profession\n' +
                            'Arun Kumar,Vetri Constructions,9840012345,arun@example.com,India,ERP Software License,85000,Hot Lead,Builder\n' +
                            'Meena Ramesh,Sri Lakshmi Traders,9884456789,meena@example.com,India,HRMS Annual Subscription,141629,Won,Retailer';
                        var blob = new Blob([csv], {
                            type: 'text/csv'
                        });
                        var a = document.createElement('a');
                        a.href = URL.createObjectURL(blob);
                        a.download = 'leads-sample-template.csv';
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                        URL.revokeObjectURL(a.href);
                    });
                    /* Simulate Import (demo) */
                    var simBtn = document.getElementById('btnSimulateImport');
                    if (simBtn) simBtn.addEventListener('click', function() {
                        var fileEl = document.getElementById('importFile');
                        if (!fileEl || !fileEl.files.length) {
                            alert('Please choose a CSV file first.');
                            return;
                        }
                        var original = simBtn.innerHTML;
                        simBtn.disabled = true;
                        simBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Simulating...';
                        setTimeout(function() {
                            simBtn.disabled = false;
                            simBtn.innerHTML = original;
                            alert('\u2705 Simulation complete: 2 leads will be imported (0 errors, 0 duplicates).');
                        }, 900);
                    });
                })();
            </script>
        </div>
    </div>
</div>

<!-- ===== Lead Detail Modal ===== -->
<div class="modal fade" id="leadDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content border-0">

            <div class="modal-header border-bottom bg-white py-3 px-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary-subtle text-primary p-2 fs-5" style="width:42px;height:42px;">
                        <i class="bi bi-person-lines-fill"></i>
                    </span>
                    <div>
                        <h5 class="modal-title fw-bold m-0 fs-5">
                            <span class="ld-id text-muted me-1">#<span id="ldNumber">1</span> &ndash;</span>
                            <span id="ldName" class="text-dark">Suresh Babu</span>
                            <span class="ld-state-pill d-none ms-2" id="ldStatePill"></span>
                        </h5>
                        <small class="text-muted" id="ldCompanySubtitle">Lead Overview &amp; Interaction History</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg me-1"></i> Close
                    </button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
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
                        <div class="col-12 col-xl-4">
                            <div class="card border shadow-sm p-3 h-100 bg-white">
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
                        </div><!-- /col Lead Info -->

                        <!-- General Information -->
                        <div class="col-12 col-xl-4">
                            <div class="card border shadow-sm p-3 h-100 bg-white">
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
                        </div><!-- /col General Information -->

                        <!-- Custom Fields -->
                        <div class="col-12 col-xl-4">
                            <div class="card border shadow-sm p-3 h-100 bg-white">
                                <div class="fw-bold fs-6 pb-2 mb-3 border-bottom text-dark">Custom Fields</div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-light small"><span class="text-muted">Profession</span><span class="fw-medium text-dark text-end">Builders</span></div>
                            </div>
                        </div><!-- /col Custom Fields -->
                    </div><!-- /row g-3 mb-3 -->

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
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="npiDesc">
                </div>
                <div class="mb-3">
                    <label class="form-label">Long Description</label>
                    <textarea class="form-control" id="npiLongDesc" rows="4"></textarea>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label class="form-label">Rate - INR (Base Currency) <span class="text-danger">*</span></label>
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
                    <label>Template Name <span class="req">*</span></label>
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
                    <label>Date to be notified <span class="req">*</span></label>
                    <input type="date" class="form-control" id="apReminderDate">
                </div>
                <div class="mb-3">
                    <label>Set reminder to <span class="req">*</span></label>
                    <select class="form-select" id="apReminderStaff">
                        <option selected>GHARUDA SOFTWARE</option>
                        <option>GHRAUDA SOFTWARE</option>
                        <option>Priya R</option>
                        <option>Harish D.</option>
                        <option>Divya A.</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Description <span class="req">*</span></label>
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
                    <label>Date to be notified <span class="req">*</span></label>
                    <input type="date" class="form-control" id="ldReminderDate">
                </div>
                <div class="mb-3">
                    <label>Set reminder to <span class="req">*</span></label>
                    <select class="form-select" id="ldReminderStaff">
                        <option selected>GHARUDA SOFTWARE</option>
                        <option>GHRAUDA SOFTWARE</option>
                        <option>Priya R</option>
                        <option>Harish D.</option>
                        <option>Divya A.</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Description <span class="req">*</span></label>
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
                    <label>Subject <span class="req">*</span></label>
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
                        <label>Start Date <span class="req">*</span></label>
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
                    <label>Tags <span class="req">*</span></label>
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
                            <div class="mb-3"><label>Subject <span class="req">*</span></label><input type="text" class="form-control" placeholder="Proposal subject"></div>
                            <div class="mb-3"><label>Related <span class="req">*</span></label><select class="form-select">
                                    <option selected>Lead</option>
                                    <option>Customer</option>
                                </select></div>
                            <div class="mb-3"><label>Lead <span class="req">*</span></label><select class="form-select" id="npLeadSelect">
                                    <option>Suresh - gh@gharuda.com</option>
                                    <option>Arun Kumar - info@vetri.co</option>
                                    <option>Meena Ramesh - meena@srlakshmi.in</option>
                                </select></div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Date <span class="req">*</span></label><input type="date" class="form-control" value="2026-09-19"></div>
<div class="col-md-6"><label>Open Till</label><input type="date" class="form-control" value="2026-09-26"></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Currency <span class="req">*</span></label><select class="form-select">
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
                            <div class="mb-3"><label>To <span class="req">*</span></label><input type="text" class="form-control" value="GHARUDA TECHNOLOGY"></div>
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
<div class="col-md-6"><label>Email <span class="req">*</span></label><input type="email" class="form-control" value="gh@gharuda.com"></div>
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
                            <div class="mb-3"><label>Subject <span class="req">*</span></label><input type="text" class="form-control" value="Solar Panel Installation - Estimate"></div>
                            <div class="mb-3"><label>Related <span class="req">*</span></label><select class="form-select">
                                    <option selected>Lead</option>
                                    <option>Customer</option>
                                </select></div>
                            <div class="mb-3"><label>Lead <span class="req">*</span></label><select class="form-select">
                                    <option selected>Suresh - gh@gharuda.com</option>
                                    <option>Arun Kumar - info@vetri.co</option>
                                    <option>Meena Ramesh - meena@srlakshmi.in</option>
                                </select></div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Date <span class="req">*</span></label><input type="date" class="form-control" value="2026-09-23"></div>
<div class="col-md-6"><label>Open Till</label><input type="date" class="form-control" value="2026-09-30"></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Currency <span class="req">*</span></label><select class="form-select">
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
                            <div class="mb-3"><label>To <span class="req">*</span></label><input type="text" class="form-control" value="GHARUDA TECHNOLOGY"></div>
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
<div class="col-md-6"><label>Email <span class="req">*</span></label><input type="email" class="form-control" value="gh@gharuda.com"></div>
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
                            <div class="mb-3"><label>Subject <span class="req">*</span></label><input type="text" class="form-control" value="Solar Panel Installation - Invoice INV-259"></div>
                            <div class="mb-3"><label>Related <span class="req">*</span></label><select class="form-select">
                                    <option selected>Lead</option>
                                    <option>Customer</option>
                                </select></div>
                            <div class="mb-3"><label>Lead <span class="req">*</span></label><select class="form-select">
                                    <option selected>Suresh - gh@gharuda.com</option>
                                    <option>Arun Kumar - info@vetri.co</option>
                                    <option>Meena Ramesh - meena@srlakshmi.in</option>
                                </select></div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Invoice Date <span class="req">*</span></label><input type="date" class="form-control" value="2026-09-23"></div>
<div class="col-md-6"><label>Due Date <span class="req">*</span></label><input type="date" class="form-control" value="2026-09-30"></div>
</div>
                            <div class="row g-3 mb-3">
<div class="col-md-6"><label>Currency <span class="req">*</span></label><select class="form-select">
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
                            <div class="mb-3"><label>Bill To <span class="req">*</span></label><input type="text" class="form-control" value="GHARUDA TECHNOLOGY"></div>
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
<div class="col-md-6"><label>Email <span class="req">*</span></label><input type="email" class="form-control" value="gh@gharuda.com"></div>
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
                        <label class="form-label fw-medium small text-muted mb-1" for="rpAmount">Amount Received <span class="req">*</span></label>
                        <input type="text" class="form-control" id="rpAmount" value="393750.00">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpTxnId">Transaction ID</label>
                        <input type="text" class="form-control" id="rpTxnId" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpDate">Payment Date <span class="req">*</span></label>
                        <input type="date" class="form-control" id="rpDate" value="2026-09-23">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpNote">Leave a note</label>
                        <textarea class="form-control resize-vertical" id="rpNote" rows="4" placeholder="Admin Note"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-medium small text-muted mb-1" for="rpMode">Payment Mode <span class="req">*</span></label>
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
                        <div class="mb-3"><label class="form-label fw-medium small text-muted mb-1">Amount Received <span class="req">*</span></label><input type="text" class="form-control" id="pvAmount" readonly></div>
                        <div class="mb-3"><label class="form-label fw-medium small text-muted mb-1">Payment Date <span class="req">*</span></label><input type="date" class="form-control" id="pvDate" readonly></div>
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
                    <label>Subject <span class="req">*</span></label>
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
                        <label>Start Date <span class="req">*</span></label>
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
                    <label>Tags <span class="req">*</span></label>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {

        /* ---- Select2 inside modals needs dropdownParent ---- */
        var nlModal = document.getElementById('newLeadModal');
        if (nlModal && typeof $ !== 'undefined' && $.fn.select2) {
            nlModal.addEventListener('shown.bs.modal', function() {
                $('#newLeadModal .select2').each(function() {
                    if ($(this).data('select2')) {
                        $(this).select2('destroy');
                    }
                    $(this).select2({
                        width: '100%',
                        dropdownParent: $(nlModal)
                    });
                });
            });
        }

        /* ---- New Task modal: drop zone, file list, tags chip, submit ---- */
        (function() {
            var modalEl = document.getElementById('newTaskModal');
            if (!modalEl) return;

            /* Attach files: drag & drop zone + selected file list */
            var dropZone = document.getElementById('tkDropZone');
            var fileInput = document.getElementById('tkAttachInput');
            var fileList = document.getElementById('tkFileList');

            function fileIcon(f) {
                var n = (f.name || '').toLowerCase();
                if (f.type.indexOf('image/') === 0 || /\.(png|jpe?g|gif|webp|svg)$/.test(n)) return 'bi-file-earmark-image';
                if (f.type === 'application/pdf' || n.indexOf('.pdf') !== -1) return 'bi-file-earmark-pdf';
                if (/\.docx?$/.test(n)) return 'bi-file-earmark-word';
                if (/\.xlsx?$/.test(n)) return 'bi-file-earmark-excel';
                return 'bi-file-earmark';
            }

            function fmtSize(bytes) {
                if (bytes >= 1048576) return (bytes / 1048576).toFixed(1) + ' MB';
                if (bytes >= 1024) return (bytes / 1024).toFixed(1) + ' KB';
                return bytes + ' B';
            }

            function addFiles(list) {
                Array.prototype.forEach.call(list, function(f) {
                    var item = document.createElement('div');
                    item.className = 'tk-file-item';
                    item.innerHTML = '<i class="bi ' + fileIcon(f) + '"></i>' +
                        '<span class="nm"></span><span class="sz"></span>' +
                        '<button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                    item.querySelector('.nm').textContent = f.name;
                    item.querySelector('.sz').textContent = fmtSize(f.size || 0);
                    item.querySelector('.rm').addEventListener('click', function() {
                        item.remove();
                    });
                    fileList.appendChild(item);
                });
            }
            if (dropZone && fileInput) {
                dropZone.addEventListener('click', function() {
                    fileInput.click();
                });
                dropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    dropZone.classList.add('dragover');
                });
                dropZone.addEventListener('dragleave', function() {
                    dropZone.classList.remove('dragover');
                });
                dropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    dropZone.classList.remove('dragover');
                    if (e.dataTransfer && e.dataTransfer.files.length) addFiles(e.dataTransfer.files);
                });
                fileInput.addEventListener('change', function() {
                    if (fileInput.files.length) addFiles(fileInput.files);
                    fileInput.value = '';
                });
            }

            /* Tags chip input (Enter to add, × to remove) */
            var tagsWrap = document.getElementById('tkTagsWrap');
            var tagsChips = document.getElementById('tkTagsChips');
            var tagsInput = document.getElementById('tkTagsInput');
            var tags = [];

            function addTag(text) {
                var val = (text || '').trim().replace(/,/g, '');
                if (!val || tags.indexOf(val) !== -1) return;
                tags.push(val);
                var chip = document.createElement('span');
                chip.className = 'nl-tag-chip';
                chip.innerHTML = '<span class="lbl"></span><button type="button" class="nl-tag-x" title="Remove">&times;</button>';
                chip.querySelector('.lbl').textContent = val;
                chip.querySelector('.nl-tag-x').addEventListener('click', function() {
                    var i = tags.indexOf(val);
                    if (i !== -1) tags.splice(i, 1);
                    chip.remove();
                });
                tagsChips.appendChild(chip);
            }
            if (tagsInput) {
                tagsInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ',') {
                        e.preventDefault();
                        addTag(tagsInput.value);
                        tagsInput.value = '';
                    }
                });
                tagsInput.addEventListener('blur', function() {
                    if (tagsInput.value.trim()) {
                        addTag(tagsInput.value);
                        tagsInput.value = '';
                    }
                });
                if (tagsWrap) tagsWrap.addEventListener('click', function() {
                    tagsInput.focus();
                });
            }

            /* Submit -> add row into lead detail Tasks table (tkTasksTable) */
            var submitBtn = document.getElementById('tkTaskSubmit');
            if (submitBtn) {
                submitBtn.addEventListener('click', function() {
                    var subject = document.getElementById('tkSubject');
                    var startDate = document.getElementById('tkStartDate');
                    if (!subject || !subject.value.trim()) {
                        subject.focus();
                        alert('Subject is required.');
                        return;
                    }
                    if (!startDate || !startDate.value) {
                        startDate.focus();
                        alert('Start date is required.');
                        return;
                    }

                    var tbody = document.querySelector('#tkTasksTable tbody');
                    if (tbody) {
                        var d = new Date(startDate.value + 'T00:00:00');
                        var fmt = function(dt) {
                            return ('0' + dt.getDate()).slice(-2) + '-' + ('0' + (dt.getMonth() + 1)).slice(-2) + '-' + dt.getFullYear();
                        };
                        var due = document.getElementById('tkDueDate');
                        var dueVal = due && due.value ? fmt(new Date(due.value + 'T00:00:00')) : '-';
                        var assignee = document.getElementById('tkAssignees');
                        var prio = document.getElementById('tkPriority');
                        var p = prio ? prio.value : 'Medium';
                        var pCls = p === 'Low' ? 'accepted' : (p === 'High' || p === 'Urgent') ? 'rejected' : 'draft';

                        var tr = document.createElement('tr');
                        var tdNo = document.createElement('td');
                        tdNo.innerHTML = '<a href="#" class="lead-name-link"></a>';
                        tdNo.querySelector('a').textContent = '43';
                        var tdName = document.createElement('td');
                        tdName.innerHTML = '<a href="#" class="lead-name-link"></a>';
                        tdName.querySelector('a').textContent = subject.value.trim();
                        var tdStatus = document.createElement('td');
                        tdStatus.innerHTML = '<span class="ld-prop-status draft">Not Started</span>';
                        var tdStart = document.createElement('td');
                        tdStart.className = 'text-nowrap';
                        tdStart.textContent = fmt(d);
                        var tdDue = document.createElement('td');
                        tdDue.className = 'text-nowrap';
                        tdDue.textContent = dueVal;
                        var tdAssigned = document.createElement('td');
                        tdAssigned.textContent = assignee ? assignee.value : '-';
                        var tdTags = document.createElement('td');
                        tdTags.textContent = tags.join(', ') || '-';
                        var tdPrio = document.createElement('td');
                        tdPrio.innerHTML = '<span class="ld-prop-status ' + pCls + '"></span>';
                        tdPrio.querySelector('span').textContent = p;
                        [tdNo, tdName, tdStatus, tdStart, tdDue, tdAssigned, tdTags, tdPrio].forEach(function(td) {
                            tr.appendChild(td);
                        });
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('tkTasksTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }

                    /* Close + reset */
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(modalEl).hide();
                    subject.value = '';
                    document.getElementById('tkHourlyRate').value = '0';
                    document.getElementById('tkDescription').value = '';
                    tags = [];
                    if (tagsChips) tagsChips.innerHTML = '';
                    if (fileList) fileList.innerHTML = '';
                    var dueReset = document.getElementById('tkDueDate');
                    if (dueReset) dueReset.value = '';
                });
            }
        })();        /* ---- Inline add (+) button for Status / Source: mini modal flow ---- */
        (function() {
            var addModal = document.getElementById('nlAddOptionModal');
            var addInput = document.getElementById('nlAddOptionInput');
            var addTitle = document.getElementById('nlAddOptionTitle');
            var addSave = document.getElementById('nlAddOptionSave');
            var addCancel = document.getElementById('nlAddOptionCancel');
            if (!addModal || !addInput || !addTitle || !addSave || !addCancel) return;
            var targetSelect = null;
            var targetLabel = '';


            function fieldLabel(sel) {
                var col = sel ? sel.closest('.col-lg-3, .col-md-6, .col-md-4, .col-lg-4, .col-12') : null;
                var lbl = col ? col.querySelector('label.form-label') : null;
                return lbl ? lbl.textContent.replace('*', '').trim() : 'Option';
            }


            document.querySelectorAll('.nl-add-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var targetId = btn.getAttribute('data-nl-target');
                    targetSelect = targetId ? document.getElementById(targetId) : null;
                    if (!targetSelect) return;
                    targetLabel = fieldLabel(targetSelect);
                    addTitle.textContent = 'Add New ' + targetLabel;
                    addInput.placeholder = 'Type new ' + targetLabel.toLowerCase() + '...';
                    addInput.value = '';
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(addModal).show();
                });
            });


            function saveOption() {
                var val = addInput.value.trim();
                if (!val) {
                    addInput.focus();
                    return;
                }
                var exists = Array.from(targetSelect.options).some(function(o) {
                    return o.value.toLowerCase() === val.toLowerCase();
                });
                if (!exists) {
                    targetSelect.appendChild(new Option(val, val, false, false));
                }
                targetSelect.value = val;
                if (typeof $ !== 'undefined' && $(targetSelect).data('select2')) {
                    $(targetSelect).trigger('change');
                }
                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(addModal).hide();
            }


            addSave.addEventListener('click', saveOption);
            addCancel.addEventListener('click', function() {
                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(addModal).hide();
            });
            addInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    saveOption();
                }
            });
        })();

        /* ---- Tags chip input ---- */
        (function() {
            var chipsWrap = document.getElementById('nlTagsChips');
            var input = document.getElementById('nlTagsInput');
            var hidden = document.getElementById('nl_tags');
            var wrap = document.getElementById('nlTagsWrap');
            if (!chipsWrap || !input || !hidden) return;
            var tags = [];

            function syncHidden() {
                hidden.value = tags.join(',');
            }

            function addTag(text) {
                var val = text.trim().replace(/,/g, '');
                if (!val || tags.indexOf(val) !== -1) return;
                tags.push(val);
                var chip = document.createElement('span');
                chip.className = 'nl-tag-chip';
                chip.innerHTML = val + '<button type="button" class="nl-tag-x" title="Remove">&times;</button>';
                chipsWrap.appendChild(chip);
                chip.querySelector('.nl-tag-x').addEventListener('click', function() {
                    var idx = tags.indexOf(val);
                    if (idx !== -1) tags.splice(idx, 1);
                    chip.remove();
                    syncHidden();
                });
                syncHidden();
            }

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    addTag(input.value);
                    input.value = '';
                }
                if (e.key === 'Backspace' && !input.value && tags.length) {
                    var last = chipsWrap.lastElementChild;
                    if (last) last.querySelector('.nl-tag-x').click();
                }
            });
            input.addEventListener('blur', function() {
                if (input.value.trim()) {
                    addTag(input.value);
                    input.value = '';
                }
            });
            if (wrap) wrap.addEventListener('click', function() {
                input.focus();
            });
        })();

        /* ---- Follow Up stats: Today/Weekly/Monthly -> follow-up-list.php ---- */
        document.querySelectorAll('.lead-stats-table .fu-link').forEach(function(cell) {
            cell.addEventListener('click', function() {
                var range = cell.getAttribute('data-range') || 'today';
                window.location.href = 'follow-up-list.php?range=' + encodeURIComponent(range);
            });
        });

        /* ---- Filter panel toggle (closed by default — open only on button click) ---- */
        var filterBtn = document.getElementById('leadFilterToggle');
        var filterCollapse = document.getElementById('leadFilterCollapse');
        if (filterBtn && filterCollapse) {
            filterBtn.addEventListener('click', function() {
                filterBtn.classList.toggle('open');
                filterCollapse.classList.toggle('open');
                if (filterCollapse.classList.contains('open') && typeof ghSyncSelect2 === 'function') {
                    ghSyncSelect2(filterCollapse);
                }
            });
        }

        /* ---- View toggle (list / grid) — visual only ---- */
        document.querySelectorAll('.lead-view-toggle button').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.lead-view-toggle button').forEach(function(b) {
                    b.classList.remove('active');
                });
                btn.classList.add('active');
            });
        });

        /* ---- Apply / Clear filters -> active filter chips ---- */
        var activeBar = document.getElementById('leadActiveFilters');

        function renderChips() {
            var chips = [];
            document.querySelectorAll('#leadFilterCollapse select, #leadFilterCollapse input').forEach(function(el) {
                var label = el.getAttribute('data-label');
                if (!label) return;
                var val = '';
                if (el.tagName === 'SELECT' && el.multiple) {
                    val = Array.from(el.selectedOptions).map(function(o) {
                        return o.text;
                    }).join(', ');
                } else if (el.tagName === 'SELECT') {
                    val = el.selectedOptions[0] ? el.selectedOptions[0].text : '';
                } else {
                    val = el.value;
                }
                if (!val) return;
                chips.push('<span class="filter-chip"><span class="chip-key">' + label + ':</span> ' + val + '<button type="button" class="chip-close">&times;</button></span>');
            });
            if (chips.length) {
                activeBar.innerHTML = chips.join('') + '<button type="button" class="active-filters-clear" id="leadClearAllChip">Clear All</button>';
                activeBar.classList.add('show');
            } else {
                activeBar.innerHTML = '';
                activeBar.classList.remove('show');
            }
        }
        var applyBtn = document.getElementById('applyLeadFilters');
        if (applyBtn) applyBtn.addEventListener('click', renderChips);
        var clearBtn = document.getElementById('clearLeadFilters');
        if (clearBtn) {
            clearBtn.addEventListener('click', function() {
                document.querySelectorAll('#leadFilterCollapse select').forEach(function(s) {
                    if (typeof $ !== 'undefined' && $(s).data('select2')) {
                        $(s).val(null).trigger('change');
                    }
                });
                document.querySelectorAll('#leadFilterCollapse input[type="date"]').forEach(function(i) {
                    i.value = '';
                });
                renderChips();
            });
        }
        document.addEventListener('click', function(e) {
            if (e.target && (e.target.id === 'leadClearAllChip' || e.target.closest('.chip-close'))) {
                activeBar.innerHTML = '';
                activeBar.classList.remove('show');
            }
        });

        /* ---- Leads table: MasterTable flow (search/sort/pagination/export/columns) ---- */
        var leadsData = [{
                id: 1,
                lead_no: 5,
                name: 'Sample Data',
                company: 'Sample Data',
                enq_code: 'Sample Data',
                country: null,
                stage_pct: 0,
                stage_color: '#e5484d',
                next_reminder: null,
                closure_date: null,
                activity_log: null,
                phone: null,
                product: null,
                value: null,
                tags: 'tag1, tag2',
                assigned: null,
                assigned_initials: '',
                assigned_color: '#c9c9d1',
                source: null,
                source_initial: '',
                source_color: '#3564e0',
                wa_phone: null,
                status: 'Quotation',
                source_name: 'Direct',
                last_contact: '21-03-2026 16:05:50',
                created: '10-03-2026 12:54:36',
                profession: null,
                lead_score: 0
            },
            {
                id: 2,
                lead_no: 4,
                name: 'test',
                company: 'q',
                enq_code: null,
                country: 'India',
                stage_pct: 0,
                stage_color: '#e5484d',
                next_reminder: null,
                closure_date: null,
                activity_log: null,
                phone: '8015603089',
                product: null,
                value: null,
                tags: null,
                assigned: 'Harish D.',
                assigned_initials: 'HD',
                assigned_color: '#7c3aed',
                source: 'Harish D.',
                source_initial: 'HD',
                source_color: '#7c3aed',
                wa_phone: '8015603089',
                status: 'Lead',
                source_name: 'Indiamart',
                last_contact: '02-03-2026 15:09:55',
                created: '27-10-2025 10:26:19',
                profession: null,
                lead_score: 0
            },
            {
                id: 3,
                lead_no: 3,
                name: 'Arun Kumar',
                company: 'Vetri Constructions',
                enq_code: 'ENQ-0168',
                country: 'India',
                stage_pct: 65,
                stage_color: '#f0924a',
                next_reminder: '19-Sep-2026',
                closure_date: '30-Sep-2026',
                activity_log: '2 days ago',
                phone: '9840012345',
                product: 'ERP Software License',
                value: 85000,
                tags: 'Hot Lead, Follow-up',
                assigned: 'Divya A.',
                assigned_initials: 'DA',
                assigned_color: '#0ca308',
                source: 'Website Form',
                source_initial: 'WF',
                source_color: '#3564e0',
                wa_phone: '9840012345',
                status: 'Quotation',
                source_name: 'Direct',
                last_contact: '27-04-2026 12:49:13',
                created: '13-01-2026 12:53:55',
                profession: null,
                lead_score: 0
            },
            {
                id: 4,
                lead_no: 2,
                name: 'Meena Ramesh',
                company: 'Sri Lakshmi Traders',
                enq_code: 'ENQ-0167',
                country: 'India',
                stage_pct: 100,
                stage_color: '#0ca308',
                next_reminder: null,
                closure_date: '12-Sep-2026',
                activity_log: '5 days ago',
                phone: '9884456789',
                product: 'HRMS Annual Subscription',
                value: 141629,
                tags: 'Won',
                assigned: 'Karthik R.',
                assigned_initials: 'KR',
                assigned_color: '#d6336c',
                source: 'Referral',
                source_initial: 'RF',
                source_color: '#f0924a',
                wa_phone: '9884456789',
                status: 'Quotation',
                source_name: 'Direct',
                last_contact: '27-03-2026 10:37:58',
                created: '27-03-2026 10:36:21',
                profession: null,
                lead_score: 0
            },
            {
                id: 5,
                lead_no: 1,
                name: 'Suresh Babu',
                company: 'Anna Nagar Builders',
                enq_code: 'ENQ-0166',
                country: 'India',
                stage_pct: 25,
                stage_color: '#4dabf7',
                next_reminder: '22-Sep-2026',
                closure_date: null,
                activity_log: 'Today',
                phone: '9500123456',
                product: 'Payroll Add-on Module',
                value: 23629,
                tags: 'Warm Lead',
                assigned: 'Divya A.',
                assigned_initials: 'DA',
                assigned_color: '#0ca308',
                source: 'Harish D.',
                source_initial: 'HD',
                source_color: '#7c3aed',
                wa_phone: '9500123456',
                status: 'Lead',
                source_name: 'Exhibition',
                last_contact: '25-04-2026 14:42:55',
                created: '27-11-2025 15:45:21',
                profession: 'Builders',
                lead_score: 0
            }
        ];

                /* Lead table compatibility object for auto-master-table */
        var leadsTable = {
            getData: function() { return leadsData; },
            render: function() {
                var tbl = document.getElementById('leadsTable');
                if (tbl && tbl.autoTable) tbl.autoTable.refresh();
            },
            deleteItem: function(id) {
                var tr = document.querySelector('#leadsTbody tr[data-id="' + id + '"]');
                if (tr) tr.remove();
                var tbl = document.getElementById('leadsTable');
                if (tbl && tbl.autoTable) tbl.autoTable.refresh();
            },
            updateItem: function(id, data) {
                var tr = document.querySelector('#leadsTbody tr[data-id="' + id + '"]');
                if (!tr) return;
                if (data.status) {
                    var btn = tr.querySelector('.lead-status-btn');
                    if (btn) {
                        btn.innerHTML = data.status + ' <i class="bi bi-chevron-down fs-10"></i>';
                        if (data.status === 'Lead') btn.classList.add('lead-sel-lead');
                        else btn.classList.remove('lead-sel-lead');
                    }
                    tr.querySelectorAll('.lead-status-item').forEach(function(a) {
                        a.classList.toggle('active', a.getAttribute('data-val') === data.status);
                    });
                }
                var tbl = document.getElementById('leadsTable');
                if (tbl && tbl.autoTable) tbl.autoTable.refresh();
            },
            getNextId: function() {
                return Date.now();
            },
            addItem: function(item) {
                var newId = item.id || Date.now();
                var newLeadNo = item.lead_no || 170;
                var valFormatted = item.value ? ('<span class="fw-bold text-success">₹' + Number(item.value).toLocaleString('en-IN', { minimumFractionDigits: 2 }) + '</span>') : '<span class="lead-empty-val">—</span>';
                var tagsHtml = item.tags ? item.tags.split(',').map(function(t){ return '<span class="lead-tag-pill">' + t.trim() + '</span>'; }).join(' ') : '<span class="lead-empty-val">—</span>';
                var assignedHtml = item.assigned ? item.assigned : 'Unassigned';
                var sourcerHtml = item.source ? item.source : '<span class="lead-empty-val">—</span>';

                var st = item.status || 'Lead';
                var opts = ['Lead', 'Quotation', 'Followup', 'Qualified', 'DIRECT', 'New Enquiry', 'New', 'Customer', 'Waiting for Response'];
                var statusDd = '<div class="dropdown lead-status-dd">' +
                    '<button type="button" class="lead-status-btn' + (st === 'Lead' ? ' lead-sel-lead' : '') + '" data-bs-toggle="dropdown" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' + st + ' <i class="bi bi-chevron-down fs-10"></i></button>' +
                    '<ul class="dropdown-menu lead-status-menu">' +
                    opts.map(function(o){
                        return '<li><a class="dropdown-item lead-status-item' + (o === st ? ' active' : '') + '" href="#" data-val="' + o + '">' + o + '</a></li>';
                    }).join('') +
                    '</ul></div>';

                var newTr = document.createElement('tr');
                newTr.setAttribute('data-id', newId);
                newTr.innerHTML = '<td><span class="fw-semibold">' + newLeadNo + '</span></td>' +
                    '<td><a href="#" class="lead-name-link">' + (item.name || '') + '</a></td>' +
                    '<td>' + (item.company || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td>' + (item.enq_code || ('ENQ-0' + newLeadNo)) + '</td>' +
                    '<td>' + (item.country || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td><div class="stage-ring" style="--pct:0;--ring-color:#e5484d;"><span>0%</span></div></td>' +
                    '<td><span class="lead-empty-val">—</span></td>' +
                    '<td><span class="lead-empty-val">—</span></td>' +
                    '<td><span class="text-nowrap">Just now</span></td>' +
                    '<td>' + (item.phone ? ('<a href="tel:' + item.phone + '" class="text-decoration-none fw-semibold">' + item.phone + '</a>') : '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td>' + (item.product || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td>' + valFormatted + '</td>' +
                    '<td>' + tagsHtml + '</td>' +
                    '<td>' + assignedHtml + '</td>' +
                    '<td>' + sourcerHtml + '</td>' +
                    '<td>' + statusDd + '</td>' +
                    '<td>' + (item.source_name || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td><span class="lead-link-text text-nowrap">Just now</span></td>' +
                    '<td><span class="lead-link-text text-nowrap">Just now</span></td>' +
                    '<td>' + (item.profession || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td><span class="fw-semibold">' + (item.lead_score || 0) + '</span></td>' +
                    '<td><button type="button" class="lead-act-btn appt" title="Appointments" data-act="appt" data-id="' + newId + '"><i class="bi bi-calendar2-week"></i></button></td>' +
                    '<td><div class="d-flex align-items-center gap-1">' +
                        '<button type="button" class="lead-act-btn view" title="View" data-act="view" data-id="' + newId + '"><i class="bi bi-eye"></i></button>' +
                        '<button type="button" class="lead-act-btn edit" title="Edit" data-act="edit" data-id="' + newId + '"><i class="bi bi-pencil-square"></i></button>' +
                        '<button type="button" class="lead-act-btn del" title="Delete" data-act="del" data-id="' + newId + '"><i class="bi bi-trash"></i></button>' +
                        '<button type="button" class="lead-act-btn mail" title="Send to Email" data-act="mail" data-id="' + newId + '"><i class="bi bi-envelope"></i></button>' +
                    '</div></td>';

                var tbodyEl = document.getElementById('leadsTbody');
                if (tbodyEl) tbodyEl.prepend(newTr);
                leadsData.unshift(item);
                var tbl = document.getElementById('leadsTable');
                if (tbl && tbl.autoTable) tbl.autoTable.refresh();
            }
        };


        /* ---- Action buttons: view / edit / delete / send to email ---- */
        var leadsActBody = document.getElementById('leadsTbody');
        if (leadsActBody) {
            leadsActBody.addEventListener('click', function(e) {
                var btn = e.target.closest('.lead-act-btn');
                if (!btn) return;
                e.stopPropagation();
                var act = btn.getAttribute('data-act');
                var id = Number(btn.getAttribute('data-id'));
                var rec = leadsTable ? leadsTable.getData().filter(function(r) {
                    return Number(r.id) === id;
                })[0] : null;

                if (act === 'view') {
                    var detailModal = document.getElementById('leadDetailModal');
                    if (detailModal && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(detailModal).show();
                    }
                } else if (act === 'edit') {
                    if (rec) {
                        document.getElementById('nl_name').value = rec.name || '';
                        document.getElementById('nl_company').value = (rec.company && rec.company !== '—') ? rec.company : '';
                        document.getElementById('nl_phone').value = (rec.phone && rec.phone !== '—') ? rec.phone : '';
                        document.getElementById('nl_value').value = rec.value || '';
                    }
                    var em = document.getElementById('newLeadModal');
                    if (em && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(em).show();
                } else if (act === 'del') {
                    if (confirm('Delete this lead?')) {
                        if (leadsTable) leadsTable.deleteItem(id);
                    }
                } else if (act === 'mail') {
                    /* Compose Email modal (image flow): ldSendEmailBtn handler moolama
                       Quill lazy-init + SMTP/Templates/Attachment form open aagum,
                       appuram lead details subject la pre-fill */
                    var sendBtnEl = document.getElementById('ldSendEmailBtn');
                    if (sendBtnEl) sendBtnEl.click();
                    var subj = document.getElementById('ldCeSubject');
                    if (subj && rec) subj.value = 'Lead #' + rec.lead_no + ' – ' + rec.name;
                } else if (act === 'appt') {
                    /* Appointment icon: new appointment modal (appointments.php oda apmContactModal copy) open aagum */
                    var apmModalEl = document.getElementById('apmContactModal');
                    if (apmModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(apmModalEl).show();
                    }
                }
            });
        }

        /* ---- Status profile-dropdown item click -> update lead status ---- */
        var leadsStatusBody = document.getElementById('leadsTbody');
        if (leadsStatusBody) {
            leadsStatusBody.addEventListener('click', function(e) {
                var item = e.target.closest('.lead-status-item');
                if (!item) return;
                e.preventDefault();
                var tr = item.closest('tr[data-id]');
                if (!tr || !leadsTable) return;
                var val = item.getAttribute('data-val');
                /* close the dropdown, then update row (re-render shows new pill) */
                var dd = item.closest('.dropdown');
                if (dd && typeof bootstrap !== 'undefined') {
                    var ddBtn = dd.querySelector('[data-bs-toggle="dropdown"]');
                    if (ddBtn) bootstrap.Dropdown.getOrCreateInstance(ddBtn).hide();
                }
                leadsTable.updateItem(Number(tr.getAttribute('data-id')), {
                    status: val
                });
            });
        }

        /* ---- New Appointment modal (appointments.php copy): Quill + toggles + submit ---- */
        if (document.getElementById('apmContactModal')) {
            var ctQuillLd = null;
            function initCtQuillLd() {
                if (ctQuillLd || typeof Quill === 'undefined') return;
                ctQuillLd = new Quill('#apmCtQuill', {
                    theme: 'snow',
                    placeholder: 'Write appointment notes here...',
                    modules: {
                        toolbar: [
                            [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                            ['bold', 'italic', 'underline'],
                            [{ align: [] }],
                            [{ list: 'bullet' }, { list: 'ordered' }],
                            ['link'],
                            ['clean']
                        ]
                    }
                });
            }
            var apmModalElLd = document.getElementById('apmContactModal');
            apmModalElLd.addEventListener('shown.bs.modal', initCtQuillLd);

            /* Related select -> conditional fields (Lead / External / Internal Contact) */
            var relSelLd = document.getElementById('apmCtRelated');
            var relBlocksLd = {
                Lead: document.getElementById('apmRelLeadBlock'),
                External: document.getElementById('apmRelExternalBlock'),
                Contact: document.getElementById('apmRelInternalBlock')
            };
            function toggleRelBlocksLd() {
                Object.keys(relBlocksLd).forEach(function(k) {
                    if (relBlocksLd[k]) relBlocksLd[k].style.display = (relSelLd.value === k) ? '' : 'none';
                });
            }
            relSelLd.addEventListener('change', toggleRelBlocksLd);

            /* Leads select2: dropdownParent inside modal + open on shown */
            apmModalElLd.addEventListener('shown.bs.modal', function() {
                if (typeof $ !== 'undefined' && $.fn.select2) {
                    $('#apmRelLead').each(function() {
                        if ($(this).data('select2')) $(this).select2('destroy');
                        $(this).select2({
                            width: '100%',
                            dropdownParent: $(apmModalElLd)
                        });
                    });
                }
            });

            /* Modal close -> reset related blocks */
            apmModalElLd.addEventListener('hidden.bs.modal', function() {
                relSelLd.value = '';
                toggleRelBlocksLd();
                if (typeof $ !== 'undefined') $('#apmRelLead').val(null).trigger('change');
            });

            /* SMS / Email notification checkboxes -> reminder value blocks */
            var smsChkLd = document.getElementById('apmCtSms');
            var smsBlockLd = document.getElementById('apmSmsReminderBlock');
            smsChkLd.addEventListener('change', function() {
                smsBlockLd.style.display = smsChkLd.checked ? '' : 'none';
            });
            var emailChkLd = document.getElementById('apmCtEmail');
            var emailBlockLd = document.getElementById('apmEmailReminderBlock');
            emailChkLd.addEventListener('change', function() {
                emailBlockLd.style.display = emailChkLd.checked ? '' : 'none';
            });

            /* Submit: demo action — modal close + form reset */
            document.getElementById('apmCtSubmit').addEventListener('click', function() {
                bootstrap.Modal.getOrCreateInstance(apmModalElLd).hide();
                apmModalElLd.querySelectorAll('input, textarea, select').forEach(function(el) {
                    if (el.type !== 'checkbox') el.value = '';
                });
                smsChkLd.checked = false;
                smsBlockLd.style.display = 'none';
                emailChkLd.checked = false;
                emailBlockLd.style.display = 'none';
                relSelLd.value = '';
                toggleRelBlocksLd();
                if (typeof $ !== 'undefined') $('#apmRelLead').val(null).trigger('change');
                ['apmRelExtName', 'apmRelExtEmail', 'apmRelExtPhone'].forEach(function(id) {
                    var el = document.getElementById(id);
                    if (el) el.value = '';
                });
                var projSel = document.getElementById('apmRelExtProject');
                if (projSel) projSel.value = '';
                var ctSel = document.getElementById('apmRelContact');
                if (ctSel) ctSel.value = '';
                if (ctQuillLd) ctQuillLd.root.innerHTML = '';
            });
        }

        /* ---- Sync Data buttons -> open Sync Data modal (image flow) ---- */
        document.querySelectorAll('#syncData').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var m = document.getElementById('syncDataModal');
                if (m && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(m).show();
            });
        });

        /* ---- Sync Now -> demo sync flow ---- */
        var sdSyncNow = document.getElementById('sdSyncNow');
        if (sdSyncNow) {
            sdSyncNow.addEventListener('click', function() {
                var original = sdSyncNow.innerHTML;
                sdSyncNow.disabled = true;
                sdSyncNow.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Syncing...';
                setTimeout(function() {
                    sdSyncNow.disabled = false;
                    sdSyncNow.innerHTML = original;
                    var m = document.getElementById('syncDataModal');
                    if (m && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(m).hide();
                    alert('\u2705 Lead data synced to associated proposals successfully.');
                }, 900);
            });
        }

        /* ---- Refresh button (re-render leads table) ---- */
        var refreshBtn = document.getElementById('leadRefreshBtn');
        if (refreshBtn) {
            refreshBtn.addEventListener('click', function() {
                var icon = refreshBtn.querySelector('i');
                icon.classList.add('spin-once');
                if (leadsTable) leadsTable.render();
                setTimeout(function() {
                    icon.classList.remove('spin-once');
                }, 600);
            });
        }

        /* ---- Form Sync button ---- */
        var formSyncBtn = document.getElementById('formSyncBtn');
        if (formSyncBtn) {
            formSyncBtn.addEventListener('click', function() {
                var original = formSyncBtn.innerHTML;
                formSyncBtn.disabled = true;
                formSyncBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Syncing...';
                setTimeout(function() {
                    formSyncBtn.disabled = false;
                    formSyncBtn.innerHTML = original;
                    alert('✅ Lead forms synced successfully. No new leads found.');
                }, 1000);
            });
        }

        /* ---- Import leads (demo) ---- */
        var btnDoImport = document.getElementById('btnDoImport');
        if (btnDoImport) {
            btnDoImport.addEventListener('click', function() {
                var modalEl = document.getElementById('importLeadsModal');
                if (modalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(modalEl).hide();
                }
                alert('📥 File received. Leads will be imported and appear in the table shortly.');
            });
        }

        /* ---- New Lead form: Enquiry Code auto-increment on modal open ---- */
        var nlEnqSeq = 171;
        var nlModalEl = document.getElementById('newLeadModal');
        var nlEnqEl = document.getElementById('nl_enquiry_code');
        if (nlModalEl && nlEnqEl) {
            nlModalEl.addEventListener('shown.bs.modal', function() {
                nlEnqEl.value = 'ENQ-0' + nlEnqSeq;
            });
        }

        /* ---- Contacted Today checkbox -> Date Contacted auto-fill ---- */
        (function() {
            var chk = document.getElementById('nl_contacted_today');
            var dtEl = document.getElementById('nl_date_contacted');
            if (!chk || !dtEl) return;
            chk.addEventListener('change', function() {
                if (chk.checked) {
                    var d = new Date();
                    var pad = function(n) {
                        return String(n).padStart(2, '0');
                    };
                    dtEl.value = d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate());
                } else {
                    dtEl.value = '';
                }
            });
        })();

        /* ---- New Lead form: append a demo row ---- */
        var newLeadForm = document.getElementById('newLeadForm');
        if (newLeadForm) {
            newLeadForm.addEventListener('submit', function(e) {
                e.preventDefault();
                var name = document.getElementById('nl_name').value.trim();
                var company = document.getElementById('nl_company').value.trim() || '—';
                var phone = document.getElementById('nl_phone').value.trim();
                var countryEl = document.getElementById('nl_country');
                var country = countryEl ? countryEl.selectedOptions[0].text : '—';
                var productEl = document.getElementById('nl_product');
                var product = productEl && productEl.selectedOptions[0] ? productEl.selectedOptions[0].text : '—';
                var value = document.getElementById('nl_value').value;
                var tagsRaw = document.getElementById('nl_tags').value.trim();
                var assignedEl = document.getElementById('nl_assigned');
                var assignedText = assignedEl ? assignedEl.selectedOptions[0].text : '—';
                var sourceEl = document.getElementById('nl_source');
                var sourceText = sourceEl ? sourceEl.selectedOptions[0].text : '—';
                var statusEl = document.getElementById('nl_status');
                var statusText = statusEl ? statusEl.selectedOptions[0].text : 'Lead';

                if (!name) return;

                /* Company GST format check (15 chars: 2 digits + 10 chars + 3 units) — illana block */
                var gstEl = document.getElementById('nl_gst');
                var gstVal = gstEl ? gstEl.value.trim().toUpperCase() : '';
                if (gstVal && !/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[0-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/.test(gstVal)) {
                    gstEl.classList.add('is-invalid');
                    gstEl.focus();
                    alert('❌ Invalid GST number format — e.g. 33ABCDE1234F1Z5');
                    return;
                }
                if (gstEl) gstEl.classList.remove('is-invalid');

                var initials = assignedText.split(' ').map(function(w) {
                    return w.charAt(0);
                }).join('').toUpperCase().slice(0, 2);
                var waPhone = phone.replace(/\D/g, '');

                if (leadsTable) {
                    var rowCount = leadsTable.getData().length;
                    leadsTable.addItem({
                        id: leadsTable.getNextId(),
                        lead_no: 170 + rowCount,
                        name: name,
                        company: company,
                        enq_code: 'ENQ-0' + (170 + rowCount),
                        country: country,
                        stage_pct: 0,
                        stage_color: '#e5484d',
                        next_reminder: null,
                        closure_date: null,
                        activity_log: 'Just now',
                        phone: phone,
                        product: product,
                        value: value,
                        tags: tagsRaw,
                        assigned: assignedText,
                        assigned_initials: initials,
                        assigned_color: '#7c3aed',
                        source: sourceText,
                        source_initial: sourceText.charAt(0),
                        source_color: '#3564e0',
                        wa_phone: waPhone,
                        status: statusText || 'Lead',
                        source_name: sourceText,
                        last_contact: 'Just now',
                        created: 'Just now',
                        profession: (function(){ var el = document.getElementById('nl_profession'); return el && el.value ? el.selectedOptions[0].text : null; })(),
                        lead_score: 0,
                        gst: gstVal,
                        turnover: (function(){ var el = document.getElementById('nl_turnover'); return el && el.value.trim() ? el.value.trim() : null; })(),
                        emp_size: (function(){ var el = document.getElementById('nl_emp_size'); return el && el.value.trim() ? el.value.trim() : null; })(),
                        customer_type: (function(){ var el = document.getElementById('nl_cust_type'); return el && el.value ? el.selectedOptions[0].text : null; })()
                    });
                }

                var modalEl = document.getElementById('newLeadModal');
                if (modalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(modalEl).hide();
                }
                newLeadForm.reset();
                if (typeof $ !== 'undefined') {
                    $('#newLeadModal .select2').val(null).trigger('change');
                }
                alert('✅ Lead "' + name + '" added successfully.');
                nlEnqSeq++;
            });
        }

        /* ---- Add / Remove Item rows ---- */
        var nlItemBody = document.getElementById('nlItemBody');
        var nlAddItem = document.getElementById('nlAddItem');
        if (nlAddItem && nlItemBody) {
            nlAddItem.addEventListener('click', function() {
                var tr = document.createElement('tr');
                tr.innerHTML = '<td><input type="text" class="form-control form-control-sm" placeholder="Code"></td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Name"></td>' +
                    '<td><input type="number" class="form-control form-control-sm" placeholder="0" min="1"></td>' +
                    '<td><button type="button" class="btn btn-sm btn-outline-danger nl-remove-item"><i class="bi bi-trash"></i></button></td>';
                nlItemBody.appendChild(tr);
            });
            nlItemBody.addEventListener('click', function(e) {
                var btn = e.target.closest('.nl-remove-item');
                if (btn) btn.closest('tr').remove();
            });
        }

        /* ---- Add / Remove Point of Contact rows ---- */
        var nlAddPoc = document.getElementById('nlAddPoc');
        var nlPocList = document.getElementById('nlPocList');
        if (nlAddPoc && nlPocList) {
            nlAddPoc.addEventListener('click', function() {
                var row = document.createElement('div');
                row.className = 'row g-2 mb-2 nl-poc-row';
                row.innerHTML = '<div class="col-md-4"><input type="text" class="form-control form-control-sm" placeholder="Name"></div>' +
                    '<div class="col-md-3"><input type="text" class="form-control form-control-sm" placeholder="Phone No."></div>' +
                    '<div class="col-md-3"><input type="email" class="form-control form-control-sm" placeholder="Email"></div>' +
                    '<div class="col-md-2"><button type="button" class="btn btn-sm btn-danger nl-remove-poc"><i class="bi bi-trash me-1"></i>Remove</button></div>';
                nlPocList.appendChild(row);
            });
            nlPocList.addEventListener('click', function(e) {
                var btn = e.target.closest('.nl-remove-poc');
                if (btn) btn.closest('.nl-poc-row').remove();
            });
        }

        /* ---- Lead detail: click any row cell to open static detail modal ---- */
        var leadsTableEl = document.getElementById('leadsTable');
        if (leadsTableEl) {
            leadsTableEl.addEventListener('click', function(e) {
                var nameLink = e.target.closest('.lead-name-link');
                if (nameLink) e.preventDefault();
                var tr = e.target.closest('tr[data-id]');
                if (!tr) return;
                /* ignore checkbox, whatsapp, action buttons and status dropdown clicks */
                if (e.target.closest('input[type=checkbox]') || e.target.closest('.whatsapp-quick-btn') || e.target.closest('.lead-act-btn') || e.target.closest('.lead-status-dd')) return;

                var detailModal = document.getElementById('leadDetailModal');
                if (detailModal && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(detailModal).show();
                }
            });
        }

        /* ---- Pipeline step click: image flow — current click = complete (+25% one time), done click = revert (-25% one time) ---- */
        var ldPipeWrap = document.querySelector('#leadDetailModal .ld-pipeline');
        if (ldPipeWrap) {
            var ldPipeSteps = ldPipeWrap.querySelectorAll('.ld-pipe-step');
            function ldPipeRefresh() {
                var doneCount = 0;
                var currentAssigned = false;
                ldPipeSteps.forEach(function(st) {
                    var icon = st.querySelector('i');
                    if (!icon) {
                        icon = document.createElement('i');
                        st.insertBefore(icon, st.firstChild);
                    }
                    if (st.classList.contains('done')) {
                        doneCount++;
                        st.classList.remove('current', 'pending');
                        icon.className = 'bi bi-check-circle-fill';
                    } else if (!currentAssigned) {
                        /* first incomplete step = current */
                        st.classList.remove('done', 'pending');
                        st.classList.add('current');
                        currentAssigned = true;
                        icon.className = 'bi bi-plus-circle';
                    } else {
                        st.classList.remove('done', 'current');
                        st.classList.add('pending');
                        icon.className = 'bi bi-plus-circle';
                    }
                });
                var pct = Math.round((doneCount / ldPipeSteps.length) * 100);
                var ring = document.querySelector('#leadDetailModal .ld-pipe-ring .stage-ring');
                var ringSpan = ring ? ring.querySelector('span') : null;
                if (ring && ringSpan) {
                    ringSpan.textContent = pct + '%';
                    ring.style.setProperty('--pct', pct);
                    var color = '#16a34a';
                    ring.style.setProperty('--ring-color', color);
                }
            }
            ldPipeWrap.addEventListener('click', function(e) {
                var step = e.target.closest('.ld-pipe-step');
                if (!step) return;
                /* oru stage oru thadava dha state maarum: current -> done (+25%), done -> revert (-25%) */
                if (step.classList.contains('done')) {
                    step.classList.remove('done');
                } else if (step.classList.contains('current')) {
                    step.classList.add('done');
                } else {
                    return; /* pending step ignore */
                }
                ldPipeRefresh();
            });
        }

        /* ---- More menu: Mark as lost / junk -> pill + activity + toast (reference flow) ---- */
        (function() {
            var moreMenu = document.querySelector('#leadDetailModal .ld-more-menu');
            if (!moreMenu) return;
            var pill = document.getElementById('ldStatePill');
            var dot = document.getElementById('ldContactDot');
            var avatar = document.getElementById('ldContactAvatar');
            var contactText = document.getElementById('ldContactText');
            var contactOriginal = contactText ? contactText.innerHTML : '';
            var state = {
                lost: false,
                junk: false
            };

            function showLdToast(message) {
                var container = document.getElementById('ldToastContainer');
                if (!container) {
                    container = document.createElement('div');
                    container.id = 'ldToastContainer';
                    container.className = 'toast-container position-fixed top-0 end-0 p-3';
                    container.style.zIndex = '3000';
                    document.body.appendChild(container);
                }
                var el = document.createElement('div');
                el.className = 'toast align-items-center border-0';
                el.setAttribute('role', 'alert');
                el.setAttribute('aria-atomic', 'true');
                el.style.background = '#0ca308';
                el.style.color = '#fff';
                el.innerHTML = '<div class="d-flex"><div class="toast-body"><i class="bi bi-bell me-2"></i>' + message +
                    '</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>';
                container.appendChild(el);
                var t = new bootstrap.Toast(el, {
                    delay: 2500
                });
                t.show();
                el.addEventListener('hidden.bs.toast', function() {
                    el.remove();
                });
            }

            function applyState() {
                /* header pill */
                if (pill) {
                    pill.className = 'ld-state-pill' + (state.lost ? ' st-lost' : state.junk ? ' st-junk' : '');
                    pill.textContent = state.lost ? 'Lost' : state.junk ? 'Junk' : '';
                    pill.style.display = (state.lost || state.junk) ? 'inline-block' : 'none';
                }
                /* contact bar: avatar + activity text */
                if (dot && avatar && contactText) {
                    var marked = state.lost || state.junk;
                    dot.style.display = marked ? 'none' : '';
                    avatar.style.display = marked ? 'inline-flex' : 'none';
                    contactText.innerHTML = marked
                        ? '<b>gharuda SOFTWARE</b> &middot; Marked as ' + (state.lost ? 'lost' : 'junk')
                        : contactOriginal;
                }
                /* more menu items swap */
                var danger = '<li><a class="dropdown-item ld-more-item ld-more-danger" href="#" data-ld-more="delete"><i class="bi bi-x-lg me-2"></i>Delete Lead</a></li>';
                if (state.lost) {
                    moreMenu.innerHTML = '<li><a class="dropdown-item ld-more-item" href="#" data-ld-more="unmark-lost">Unmark Lead as lost</a></li>' + danger;
                } else if (state.junk) {
                    moreMenu.innerHTML = '<li><a class="dropdown-item ld-more-item" href="#" data-ld-more="unmark-junk">Unmark Lead as junk</a></li>' + danger;
                } else {
                    moreMenu.innerHTML =
                        '<li><a class="dropdown-item ld-more-item" href="#" data-ld-more="lost"><i class="bi bi-arrow-counterclockwise me-2"></i>Mark as lost</a></li>' +
                        '<li><a class="dropdown-item ld-more-item" href="#" data-ld-more="junk"><i class="bi bi-x-lg me-2"></i>Mark as junk</a></li>' +
                        danger;
                }
            }

            moreMenu.addEventListener('click', function(e) {
                var item = e.target.closest('[data-ld-more]');
                if (!item) return;
                e.preventDefault();
                var act = item.getAttribute('data-ld-more');
                if (act === 'lost') {
                    state.lost = true;
                    state.junk = false;
                    applyState();
                    showLdToast('Lead marked as lost successfully');
                } else if (act === 'junk') {
                    state.junk = true;
                    state.lost = false;
                    applyState();
                    showLdToast('Lead marked as junk successfully');
                } else if (act === 'unmark-lost' || act === 'unmark-junk') {
                    state.lost = false;
                    state.junk = false;
                    applyState();
                }
            });

            applyState();
        })();

        /* ---- Lead detail: rail nav switching (delegated, data-panel) ---- */
        var ldRail = document.querySelector('#leadDetailModal .ld-rail');
        if (ldRail) {
            ldRail.addEventListener('click', function(e) {
                var btn = e.target.closest('.ld-nav');
                if (!btn) return;
                ldRail.querySelectorAll('.ld-nav').forEach(function(b) {
                    b.classList.remove('active');
                });
                btn.classList.add('active');
                var panelId = btn.getAttribute('data-panel');
                document.querySelectorAll('#leadDetailModal .ld-tab-panel').forEach(function(p) {
                    p.classList.remove('active');
                });
                var panel = document.getElementById(panelId);
                if (panel) panel.classList.add('active');
            });
        }

        /* ---- Lead detail: Notes tab -> Add Note flow ---- */
        (function() {
            var noteInput = document.getElementById('ldNoteInput');
            var noteList = document.getElementById('ldNoteList');
            var noteBadge = document.getElementById('ldNotesBadge');
            if (!noteInput || !noteList) return;
            var nextId = 2;

            function escN(s) {
                return String(s == null ? '' : s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            }

            function updateBadge() {
                if (noteBadge) noteBadge.textContent = noteList.querySelectorAll('.ldn-item').length;
            }

            function stamp() {
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                return pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' +
                    pad(d.getHours()) + ':' + pad(d.getMinutes()) + ':' + pad(d.getSeconds());
            }

            function bindIcons(item) {
                var ed = item.querySelector('.ldn-icons .ed');
                var dl = item.querySelector('.ldn-icons .dl');
                if (ed) ed.addEventListener('click', function() {
                    var txtEl = item.querySelector('.ldn-text');
                    noteInput.value = txtEl.textContent;
                    noteInput.focus();
                    item.remove();
                    updateBadge();
                });
                if (dl) dl.addEventListener('click', function() {
                    item.remove();
                    updateBadge();
                });
            }
            noteList.querySelectorAll('.ldn-item').forEach(bindIcons);

            document.getElementById('ldNoteAdd').addEventListener('click', function() {
                var val = noteInput.value.trim();
                if (!val) {
                    noteInput.focus();
                    return;
                }
                var item = document.createElement('div');
                item.className = 'ldn-item';
                item.setAttribute('data-nid', nextId++);
                item.innerHTML =
                    '<span class="ldn-avatar">GHR</span>' +
                    '<div class="ldn-body">' +
                    '<div class="ldn-name">GHARUDA SOFTWARE</div>' +
                    '<div class="ldn-date">Note added: ' + stamp() + '</div>' +
                    '<div class="ldn-text"></div>' +
                    '</div>' +
                    '<div class="ldn-icons">' +
                    '<button type="button" class="ed" title="Edit note"><i class="bi bi-pencil-square"></i></button>' +
                    '<button type="button" class="dl" title="Delete note"><i class="bi bi-x-lg"></i></button>' +
                    '</div>';
                item.querySelector('.ldn-text').textContent = val;
                noteList.insertBefore(item, noteList.firstChild);
                bindIcons(item);
                noteInput.value = '';
                noteInput.focus();
                updateBadge();
            });
            updateBadge();
        })();

        /* ---- Lead detail: Activity Log tab -> Enter Activity flow ---- */
        (function() {
            var ldaInput = document.getElementById('ldaInput');
            var ldaFeed = document.getElementById('ldaFeed');
            if (!ldaInput || !ldaFeed) return;
            var nextAid = 2;

            function stampA() {
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                return pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' +
                    pad(d.getHours()) + ':' + pad(d.getMinutes()) + ':' + pad(d.getSeconds());
            }
            document.getElementById('ldaSubmit').addEventListener('click', function() {
                var val = ldaInput.value.trim();
                if (!val) {
                    ldaInput.focus();
                    return;
                }
                var status = document.querySelector('input[name="ldaStatus"]:checked');
                var statusTxt = status ? status.value : 'UnAnswered';
                var item = document.createElement('div');
                item.className = 'lda-item';
                item.setAttribute('data-aid', nextAid++);
                item.innerHTML =
                    '<div class="lda-date">' + stampA() + '<span class="lda-ago">just now</span></div>' +
                    '<div class="lda-who">' +
                    '<span class="lda-avatar">GHR</span>' +
                    '<span class="lda-name">GHARUDA SOFTWARE</span>' +
                    '<span class="lda-text"></span>' +
                    '</div>';
                item.querySelector('.lda-text').textContent = '- ' + statusTxt + ' · ' + val;
                ldaFeed.insertBefore(item, ldaFeed.firstChild);
                ldaInput.value = '';
                ldaInput.focus();
            });
        })();

        /* ---- Stacked modal backdrop z-index fix ----
       Bootstrap appends backdrops at default z-index 1050; custom-z modals
       (1075/1085/1090) open panna backdrop parent modal ku keezha pogum.
       shown event la last backdrop ah modal z-index - 1 ku bump panrom. */
        (function() {
            var stackedModals = ['ldComposeEmailModal', 'setLeadReminderModal', 'newTaskModal', 'setProposalReminderModal', 'apAddTaskModal', 'apAddTemplateModal', 'syncDataModal', 'apSendEmailModal', 'apAttachFileModal', 'newEstimateModal', 'newInvoiceModal', 'apRecordPaymentModal', 'apPaymentViewModal', 'newLeadModal', 'nlAddOptionModal', 'newProposalModal', 'npAddItemModal', 'apProposalPreviewModal', 'apSignModal'];
            stackedModals.forEach(function(id) {
                var el = document.getElementById(id);
                if (!el) return;
                el.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(el).zIndex, 10) || 1090;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                });
            });
        })();

        /* ---- Lead detail: Email Log tab -> Send Email flow ---- */
        (function() {
            var escEl = function(s) {
                return String(s == null ? '' : s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            };
            var ldEmailTable = {
                addItem: function(r) {
                    var tbody = document.getElementById('ldEmailLogTbody') || (document.getElementById('ldEmailLogTable') ? document.getElementById('ldEmailLogTable').querySelector('tbody') : null);
                    if (tbody) {
                        var tr = document.createElement('tr');
                        tr.setAttribute('data-id', r.id || Date.now());
                        tr.innerHTML = '<td>' + escEl(r.id) + '</td>' +
                            '<td>' + escEl(r.staff) + '</td>' +
                            '<td>' + escEl(r.subject) + '</td>' +
                            '<td>' + escEl(r.date) + '</td>' +
                            '<td><span class="ld-prop-status ' + (r.status === 'Sent' ? 'sent' : 'draft') + '">' + escEl(r.status) + '</span></td>' +
                            '<td><span class="ld-prop-status ' + (r.opened === 'Yes' ? 'accepted' : 'draft') + '">' + escEl(r.opened) + '</span></td>';
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('ldEmailLogTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }
                }
            };

            /* Send Email button -> open Compose Email modal (lazy-init Quill) */
            var ceQuill = null;
            var ceTplSel = document.getElementById('ldCeTemplate');
            var fileList = document.getElementById('ldCeFileList');
            var sendEmailBtn = document.getElementById('ldSendEmailBtn');
            if (sendEmailBtn) sendEmailBtn.addEventListener('click', function() {
                var m = document.getElementById('ldComposeEmailModal');
                if (!m) return;
                if (!ceQuill && typeof Quill !== 'undefined') {
                    ceQuill = new Quill('#ldCeQuill', {
                        theme: 'snow',
                        placeholder: 'Write your email here...',
                        modules: {
                            toolbar: [
                                [{
                                    font: ['verdana', 'sans-serif', 'serif', 'monospace']
                                }, {
                                    size: ['small', false, 'large', 'huge']
                                }],
                                [{
                                    color: []
                                }, {
                                    background: []
                                }],
                                ['bold', 'italic', 'underline'],
                                [{
                                    align: []
                                }],
                                ['image', 'link'],
                                [{
                                    list: 'bullet'
                                }, {
                                    list: 'ordered'
                                }],
                                ['clean']
                            ]
                        }
                    });
                }
                var toEl = document.getElementById('ldCeTo');
                if (toEl && !toEl.value) {
                    var ldEmail = document.getElementById('ldEmail');
                    if (ldEmail && ldEmail.value) toEl.value = ldEmail.value;
                }
                bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* Templates select -> fill editor with template content */
            if (ceTplSel) ceTplSel.addEventListener('change', function() {
                if (!ceQuill) return;
                var tpls = {
                    'Standard Quotation': '<p>Dear {client_name},</p><p>Thank you for your interest. Please find our standard quotation attached for your review.</p><p>Regards,<br>GHARUDA SOFTWARE</p>',
                    'Solar Installation': '<p>Dear {client_name},</p><p>Thank you for choosing our solar installation services. Please find the detailed installation proposal attached.</p><p>Regards,<br>GHARUDA SOFTWARE</p>'
                };
                var html = tpls[ceTplSel.value];
                if (html) ceQuill.root.innerHTML = html;
            });

            /* Attachment: + button -> add another file input row */
            var addFileBtn = document.getElementById('ldCeAddFile');
            if (addFileBtn && fileList) {
                addFileBtn.addEventListener('click', function() {
                    var row = document.createElement('div');
                    row.className = 'ce-attach-row mt-2';
                    row.innerHTML = '<input type="file" class="form-control" multiple>' +
                        '<button type="button" class="ce-add-file" style="background:#dc2626;" title="Remove"><i class="bi bi-x-lg"></i></button>';
                    row.querySelector('button').addEventListener('click', function() {
                        row.remove();
                    });
                    fileList.appendChild(row);
                });
            }

            /* send -> validation + add row to email log table */
            var ceSendBtn = document.getElementById('ldCeSend');
            if (ceSendBtn) ceSendBtn.addEventListener('click', function() {
                var toEl = document.getElementById('ldCeTo');
                var subEl = document.getElementById('ldCeSubject');
                if (!toEl.value.trim()) {
                    alert('Email To is required.');
                    toEl.focus();
                    return;
                }
                if (!subEl.value.trim()) {
                    alert('Email Subject is required.');
                    subEl.focus();
                    return;
                }
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var dateStr = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + pad(d.getHours()) + ':' + pad(d.getMinutes());
                var ceModal = document.getElementById('ldComposeEmailModal');
                var original = ceSendBtn.innerHTML;
                ceSendBtn.disabled = true;
                ceSendBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Sending...';
                setTimeout(function() {
                    ceSendBtn.disabled = false;
                    ceSendBtn.innerHTML = original;
                    if (ldEmailTable) ldEmailTable.addItem({
                        id: Date.now(),
                        staff: 'GHARUDA SOFTWARE',
                        subject: subEl.value.trim(),
                        date: dateStr,
                        status: 'Sent',
                        opened: 'No'
                    });
                    alert('\u2705 Email sent to ' + toEl.value.trim() + '.');
                    bootstrap.Modal.getOrCreateInstance(ceModal).hide();
                    toEl.value = '';
                    document.getElementById('ldCeCc').value = '';
                    subEl.value = '';
                    if (ceQuill) ceQuill.setText('');
                    ceTplSel.value = '';
                    if (fileList) fileList.innerHTML = '';
                }, 800);
            });
        })();

        /* ---- Lead detail: Reminders tab -> Set Lead Reminder flow ---- */
        (function() {
            var escLd = function(s) {
                return String(s == null ? '' : s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            };
            var ldRemTable = {
                addItem: function(r) {
                    var tbody = document.getElementById('ldRemTbody') || (document.getElementById('ldRemindersTable') ? document.getElementById('ldRemindersTable').querySelector('tbody') : null);
                    if (tbody) {
                        var tr = document.createElement('tr');
                        tr.setAttribute('data-id', r.id || Date.now());
                        tr.innerHTML = '<td>' + escLd(r.desc) + '</td>' +
                            '<td>' + escLd(r.date) + '</td>' +
                            '<td>' + escLd(r.remindTo) + '</td>' +
                            '<td><span class="ld-prop-status ' + (r.notified === 'Yes' ? 'accepted' : 'draft') + '">' + escLd(r.notified) + '</span></td>' +
                            '<td><span class="ld-prop-status ' + (r.status === 'Active' ? 'sent' : 'draft') + '">' + escLd(r.status) + '</span></td>';
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('ldRemindersTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }
                }
            };

            /* Set Lead Reminder button -> open reminder modal */
            var ldSetRemBtn = document.getElementById('ldSetReminderBtn');
            if (ldSetRemBtn) ldSetRemBtn.addEventListener('click', function() {
                var m = document.getElementById('setLeadReminderModal');
                if (m && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* Reminder modal Submit -> add row to lead reminders table */
            var ldRemSubmit = document.getElementById('ldReminderSubmit');
            if (ldRemSubmit) ldRemSubmit.addEventListener('click', function() {
                var dateEl = document.getElementById('ldReminderDate');
                var staffEl = document.getElementById('ldReminderStaff');
                var descEl = document.getElementById('ldReminderDesc');
                var emailEl = document.getElementById('ldReminderEmail');
                if (!dateEl.value || !descEl.value.trim()) {
                    alert('Please fill all the required fields.');
                    return;
                }
                var d = new Date(dateEl.value + 'T00:00:00');
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var fmt = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                if (ldRemTable) ldRemTable.addItem({
                    id: Date.now(),
                    desc: descEl.value.trim(),
                    date: fmt,
                    remindTo: staffEl.value,
                    notified: 'No',
                    status: 'Active'
                });
                if (emailEl.checked) alert('\uD83D\uDCE7 Reminder email will also be sent to ' + staffEl.value + '.');
                bootstrap.Modal.getOrCreateInstance(document.getElementById('setLeadReminderModal')).hide();
                dateEl.value = '';
                descEl.value = '';
                emailEl.checked = false;
            });
        })();

        /* ---- Proposals table: Bridge for AutoMasterTable ---- */
        var npProposalsData = [
            { id: 147, no: 'PRO-147', subject: 'New Proposal', total: '₹ 0.00', date: '17-09-2026', openTill: '24-09-2026', tags: '—', created: '17-09-2026 15:52:49', status: 'Draft' },
            { id: 145, no: 'PRO-145', subject: 'Solar Panel Installation 10 × 10', total: '₹ 1,18,000.00', date: '09-09-2026', openTill: '16-09-2026', tags: '—', created: '09-09-2026 14:39:25', status: 'Accepted' },
            { id: 140, no: 'PRO-140', subject: 'Product', total: '₹ 5,407.50', date: '21-08-2026', openTill: '28-08-2026', tags: '—', created: '21-08-2026 14:13:03', status: 'Accepted' }
        ];
        var proposalsTable = {
            getData: function() { return npProposalsData; },
            render: function() {
                var tbl = document.getElementById('npProposalsTable');
                if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
            }
        };

        /* ---- Attachments: drop zone + upload + delete ---- */
        (function() {
            var dropZone = document.getElementById('atDropZone');
            var fileInput = document.getElementById('atFileInput');
            var list = document.getElementById('atList');
            if (!dropZone || !fileInput || !list) return;
            dropZone.addEventListener('click', function() {
                fileInput.click();
            });
            dropZone.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropZone.style.background = '#eefdf2';
            });
            dropZone.addEventListener('dragleave', function() {
                dropZone.style.background = '';
            });
            dropZone.addEventListener('drop', function(e) {
                e.preventDefault();
                dropZone.style.background = '';
                addFiles(e.dataTransfer.files);
            });
            fileInput.addEventListener('change', function() {
                addFiles(fileInput.files);
                fileInput.value = '';
            });

            function addFiles(files) {
                Array.from(files).forEach(function(f) {
                    var now = new Date();
                    var pad = function(n) {
                        return String(n).padStart(2, '0');
                    };
                    var dt = pad(now.getDate()) + '-' + pad(now.getMonth() + 1) + '-' + now.getFullYear() + ' ' + pad(now.getHours() % 12 || 12) + ':' + pad(now.getMinutes()) + ':' + pad(now.getSeconds()) + (now.getHours() >= 12 ? ' pm' : ' am');
                    var ext = (f.name.split('.').pop() || '').toLowerCase();
                    var isPdf = ext === 'pdf';
                    var isWord = ext === 'doc' || ext === 'docx';
                    var isImg = ext === 'jpg' || ext === 'jpeg' || ext === 'png' || ext === 'gif' || ext === 'webp';
                    var isXls = ext === 'xls' || ext === 'xlsx' || ext === 'csv';
                    var icoCls = isPdf ? 'bi-file-earmark-pdf-fill' : isWord ? 'bi-file-earmark-word-fill' : isImg ? 'bi-file-earmark-image-fill' : isXls ? 'bi-file-earmark-excel-fill' : 'bi-file-earmark-fill';
                    var icoCol = isPdf ? '#dc2626' : isWord ? '#2563eb' : isImg ? '#16a34a' : isXls ? '#16a34a' : '#6b7280';
                    var item = document.createElement('div');
                    item.className = 'at-item';
                    item.innerHTML = '<div class="at-meta"><span class="lbl">Date / Time :</span><br>' + dt + '</div>' +
                        '<div class="at-meta"><span class="lbl">Staff Name :</span><br>GHRAUDA SOFTWARE</div>' +
                        '<div class="at-file"><i class="bi ' + icoCls + '" style="color:' + icoCol + ';"></i><a href="#">' + f.name.replace(/</g, '&lt;') + '<span class="mime">' + (f.type || 'application/octet-stream') + '</span></a></div>' +
                        '<button type="button" class="at-del" title="Delete attachment"><i class="bi bi-x-lg"></i></button>';
                    list.prepend(item);
                    item.querySelector('.at-del').addEventListener('click', function() {
                        item.remove();
                    });
                });
            }
            list.addEventListener('click', function(e) {
                var del = e.target.closest('.at-del');
                if (del) del.closest('.at-item').remove();
            });
        })();

        /* ---- Appointments table: handled automatically by datatable class (AutoMasterTable) ---- */

        /* ---- New Proposal button -> open modal ---- */
        var npBtn = document.getElementById('npNewProposalBtn');
        if (npBtn) {
            npBtn.addEventListener('click', function() {
                var npModal = document.getElementById('newProposalModal');
                if (npModal && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(npModal).show();
                }
            });
        }

        /* ---- Manual Proposal button (lead detail Proposals tab) -> newLeadModal stacked open (leadDetailModal open-a irukum) ---- */
        var ldManualProposalBtn = document.getElementById('ldManualProposalBtn');
        if (ldManualProposalBtn) {
            ldManualProposalBtn.addEventListener('click', function() {
                var npModalM = document.getElementById('newProposalModal');
                if (npModalM && typeof bootstrap !== 'undefined') {
                    /* newProposalModal z-index 1085 > leadDetailModal 1055 — mela open aagum,
                       leadDetailModal close aagadhu. Backdrop fix stackedModals list la already irukku. */
                    bootstrap.Modal.getOrCreateInstance(npModalM).show();
                }
            });
        }

        /* ---- Proposals table edit icon -> open newProposalModal ---- */
        document.addEventListener('click', function(e) {
            var editBtn = e.target.closest('.np-act-edit');
            if (!editBtn) return;
            e.preventDefault();
            var npModalE = document.getElementById('newProposalModal');
            if (npModalE && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getOrCreateInstance(npModalE).show();
            }
        });

        /* ---- Modal swap helper: from-modal hide full-a complete aana appuram to-modal show ----
           hidden event miss aana safety fallback timer um ulla irukku */
        window.swapModal = window.swapModal || function(fromEl, toEl) {
            var openTarget = function() {
                bootstrap.Modal.getOrCreateInstance(toEl).show();
            };
            if (fromEl && fromEl.classList.contains('show')) {
                var opened = false;
                var openOnce = function() {
                    if (opened) return;
                    opened = true;
                    openTarget();
                };
                fromEl.addEventListener('hidden.bs.modal', openOnce, { once: true });
                setTimeout(openOnce, 600);
                bootstrap.Modal.getOrCreateInstance(fromEl).hide();
            } else {
                openTarget();
            }
        };

        /* ---- Lead detail edit (pencil) button -> newLeadModal mela open (leadDetailModal hide aagadhu) ---- */
        var ldEditLeadBtn = document.getElementById('ldEditLeadBtn');
        if (ldEditLeadBtn) {
            ldEditLeadBtn.addEventListener('click', function() {
                var newLeadM = document.getElementById('newLeadModal');
                if (newLeadM && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(newLeadM).show();
                }
            });
        }

        /* ---- Proposals table name/subject link click -> autoProposalModal (leadDetailModal hide aagi) ---- */
        document.addEventListener('click', function(e) {
            var nameLink = e.target.closest('#npProposalsTable .lead-name-link');
            if (!nameLink) return;
            e.preventDefault();
            var apModalE = document.getElementById('autoProposalModal');
            if (apModalE && typeof bootstrap !== 'undefined') {
                swapModal(document.getElementById('leadDetailModal'), apModalE);
            }
        });

        /* ---- New Task button -> open modal ---- */
        var tkBtn = document.getElementById('tkNewTaskBtn');
        if (tkBtn) {
            tkBtn.addEventListener('click', function() {
                var tkModal = document.getElementById('newTaskModal');
                if (tkModal && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(tkModal).show();
                }
            });
        }



        /* ---- Proposal tags chip input ---- */
        (function() {
            var chipsWrap = document.getElementById('npTagsChips');
            var input = document.getElementById('npTagsInput');
            var hidden = document.getElementById('np_tags');
            var wrap = document.getElementById('npTagsWrap');
            if (!chipsWrap || !input || !hidden) return;
            var tags = [];

            function syncHidden() {
                hidden.value = tags.join(',');
            }

            function addTag(text) {
                var val = text.trim().replace(/,/g, '');
                if (!val || tags.indexOf(val) !== -1) return;
                tags.push(val);
                var chip = document.createElement('span');
                chip.className = 'nl-tag-chip';
                chip.innerHTML = val + '<button type="button" class="nl-tag-x" title="Remove">&times;</button>';
                chipsWrap.appendChild(chip);
                chip.querySelector('.nl-tag-x').addEventListener('click', function() {
                    var idx = tags.indexOf(val);
                    if (idx !== -1) tags.splice(idx, 1);
                    chip.remove();
                    syncHidden();
                });
                syncHidden();
            }
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    addTag(input.value);
                    input.value = '';
                }
                if (e.key === 'Backspace' && !input.value && tags.length) {
                    var last = chipsWrap.lastElementChild;
                    if (last) last.querySelector('.nl-tag-x').click();
                }
            });
            input.addEventListener('blur', function() {
                if (input.value.trim()) {
                    addTag(input.value);
                    input.value = '';
                }
            });
            if (wrap) wrap.addEventListener('click', function() {
                input.focus();
            });
        })();

        /* ---- Proposal: add item via Add New Item modal (image flow) ---- */
        (function() {
            var addBtn = document.getElementById('npAddItemBtn');
            var itemBody = document.getElementById('npItemBody');
            var addSelect = document.getElementById('npAddItemSelect');
            if (!addBtn || !itemBody) return;
            var addModalEl = document.getElementById('npAddItemModal');
            function esc(s) {
                return String(s == null ? '' : s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
            }
            addBtn.addEventListener('click', function() {
                if (addModalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(addModalEl).show();
                }
            });
            /* Submit -> values vechu item row add + modal close + reset */
            var submitBtn = document.getElementById('npiSubmitBtn');
            if (submitBtn && addModalEl) {
                submitBtn.addEventListener('click', function() {
                    var desc = document.getElementById('npiDesc');
                    var longDesc = document.getElementById('npiLongDesc');
                    var rateInr = document.getElementById('npiRateInr');
                    var hsn = document.getElementById('npiHsn');
                    var rateUsd = document.getElementById('npiRateUsd');
                    var tax1 = document.getElementById('npiTax1');
                    var unit = document.getElementById('npiUnit');
                    var group = document.getElementById('npiGroup');
                    if (desc && !desc.value.trim()) {
                        desc.focus();
                        return;
                    }
                    var rate = parseFloat(rateInr && rateInr.value) || 0;
                    var taxVal = tax1 ? tax1.value : 'No Tax';
                    var tr = document.createElement('tr');
                    tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;" title="' + esc(hsn ? hsn.value : '') + ' | ' + esc(group ? group.value : '') + '"></i></td>' +
                        '<td><textarea class="form-control" placeholder="Description" rows="2">' + esc(desc ? desc.value : '') + '</textarea></td>' +
                        '<td><textarea class="form-control" placeholder="Long description" rows="2">' + esc(longDesc ? longDesc.value : '') + '</textarea></td>' +
                        '<td><input type="number" class="form-control" value="1" min="0"><div style="font-size:10px;color:#9ca3af;margin-top:2px;">' + esc(unit && unit.value ? unit.value : 'Unit') + '</div></td>' +
                        '<td><input type="number" class="form-control" value="' + rate.toFixed(2) + '" step="0.01" title="USD: ' + esc(rateUsd ? rateUsd.value : '0.00') + '"></td>' +
                        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                        '<td><select class="form-select"><option' + (taxVal === 'No Tax' ? ' selected' : '') + '>No Tax</option><option' + (taxVal === 'GST 5%' ? ' selected' : '') + '>GST 5%</option><option' + (taxVal === 'GST 12%' ? ' selected' : '') + '>GST 12%</option><option' + (taxVal === 'GST 18%' ? ' selected' : '') + '>GST 18%</option></select></td>' +
                        '<td><span style="font-weight:700;color:#111827;">₹ ' + rate.toFixed(2) + '</span></td>' +
                        '<td><button type="button" class="np-check-btn np-remove-item" title="Remove"><i class="bi bi-trash"></i></button></td>';
                    itemBody.appendChild(tr);
                    if (addSelect) addSelect.value = '';
                    bootstrap.Modal.getOrCreateInstance(addModalEl).hide();
                    /* form reset */
                    ['npiDesc', 'npiLongDesc', 'npiHsn', 'npiRateUsd', 'npiUnit'].forEach(function(id) {
                        var el = document.getElementById(id);
                        if (el) el.value = '';
                    });
                    if (rateInr) rateInr.value = '0.00';
                    if (tax1) tax1.value = 'No Tax';
                    if (group) group.value = '';
                });
            }
            /* np-check-btn (✓) click -> keezha extra tr block add (clicked row oda ✓ maaranum);
               trash (np-remove-item) click -> andha row remove */
            itemBody.addEventListener('click', function(e) {
                var btn = e.target.closest('button');
                if (!btn) return;
                if (btn.classList.contains('np-remove-item')) {
                    btn.closest('tr').remove();
                    return;
                }
                if (btn.classList.contains('np-check-btn')) {
                    var tr = document.createElement('tr');
                    tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                        '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                        '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                        '<td><input type="number" class="form-control" value="1" min="0"><div style="font-size:10px;color:#9ca3af;margin-top:2px;">Unit</div></td>' +
                        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                        '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
                        '<td><span style="font-weight:700;color:#111827;">\u20B9 0.00</span></td>' +
                        '<td><button type="button" class="np-check-btn np-remove-item" title="Remove"><i class="bi bi-trash"></i></button></td>';
                    btn.closest('tr').after(tr);
                    /* clicked row oda check icon appadiyae irukum — thirumba click panna innum tr add aagum */
                }
            });
        })();

        /* ---- Automatic Proposal fullscreen modal flow ---- */
        (function() {
            var modalEl = document.getElementById('autoProposalModal');
            if (!modalEl || typeof bootstrap === 'undefined') return;

            /* Close aana stray backdrop / scroll lock cleanup — page stuck avoid */
            modalEl.addEventListener('hidden.bs.modal', function() {
                setTimeout(function() {
                    if (document.querySelector('.modal.show')) return;
                    document.querySelectorAll('.modal-backdrop').forEach(function(b) { b.remove(); });
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                }, 60);
            });

            /* Open from the Proposals tab inside the lead detail modal (leadDetailModal hide aagadhu — mela open aagum) */
            var autoBtn = document.getElementById('ldAutoProposalBtn');
            if (autoBtn) {
                autoBtn.addEventListener('click', function() {
                    var ctx = document.getElementById('apLeadCtx');
                    var numEl = document.getElementById('ldNumber');
                    var nameEl = document.getElementById('ldName');
                    if (ctx && numEl && nameEl) ctx.textContent = 'Lead #' + numEl.textContent + ' \u2013 ' + nameEl.textContent;
                    if (typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(modalEl).show();
                    }
                });
            }

            /* ---- Demo data ---- */
            var apData = [{
                    id: 152,
                    no: 'PRO-152',
                    subject: 'New Proposal',
                    to: 'GHRA SOFTWARE TECHNOLOGY',
                    subTotal: '\u20B9 0.00',
                    tax: '\u20B9 0.00',
                    total: '\u20B9 0.00',
                    status: 'Draft',
                    phone: '9876543218',
                    email: 'pm@GHRatechnology.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 151,
                    no: 'PRO-151',
                    subject: 'New Proposal',
                    to: 'GG COMPANY',
                    subTotal: '\u20B9 3,93,750.00',
                    tax: '\u20B9 3,75,000.00',
                    total: '\u20B9 18,750.00',
                    status: 'Draft',
                    phone: '9840012345',
                    email: 'info@ggcompany.in',
                    action: '',
                    content: 'Dear {client_name},\n\nPlease find our proposal {proposal_number} below.\n\n{proposal_items}\n\nSub Total: {sub_total}\nTotal: {total}\n\nRegards,\n{company_name}'
                },
                {
                    id: 148,
                    no: 'PRO-148',
                    subject: 'Test Quotation',
                    to: 'Sundar A',
                    subTotal: '\u20B9 119.18',
                    tax: '\u20B9 101.00',
                    total: '\u20B9 18,172.00',
                    status: 'Sent',
                    phone: '9500123456',
                    email: 'sundar.a@gmail.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 149,
                    no: 'PRO-149',
                    subject: 'New Proposal',
                    to: 'GHRA SOFTWARE TECHNOLOGY',
                    subTotal: '\u20B9 0.00',
                    tax: '\u20B9 0.00',
                    total: '\u20B9 0.00',
                    status: 'Accepted',
                    phone: '9876543218',
                    email: 'pm@GHRatechnology.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 150,
                    no: 'PRO-150',
                    subject: 'New Proposal',
                    to: 'GHRA SOFTWARE TECHNOLOGY',
                    subTotal: '\u20B9 0.00',
                    tax: '\u20B9 0.00',
                    total: '\u20B9 0.00',
                    status: 'Rejected',
                    phone: '9876543218',
                    email: 'pm@GHRatechnology.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 147,
                    no: 'PRO-147',
                    subject: 'Solar Panel Installation 10 \u00d7 10',
                    to: 'GHARUDA TECHNOLOGY',
                    subTotal: '\u20B9 1,18,000.00',
                    tax: '\u20B9 21,240.00',
                    total: '\u20B9 1,39,240.00',
                    status: 'Accepted',
                    phone: '8015603089',
                    email: 'pro@gharuraaitechnology.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 140,
                    no: 'PRO-140',
                    subject: 'Product',
                    to: 'SRL AKSHMI Traders',
                    subTotal: '\u20B9 5,407.50',
                    tax: '\u20B9 972.50',
                    total: '\u20B9 6,380.00',
                    status: 'Draft',
                    phone: '9884456789',
                    email: 'meena@srlakshmi.in',
                    action: '',
                    content: '{proposal_items}'
                }
            ];
            var apState = {
                selected: 152
            };
            var apStatusMap = {
                'Draft': 'draft',
                'Sent': 'sent',
                'Accepted': 'accepted',
                'Rejected': 'rejected'
            };

            function esc(s) {
                return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;');
            }

            function statusChip(s) {
                return '<span class="ld-prop-status ' + (apStatusMap[s] || 'draft') + '">' + esc(s) + '</span>';
            }

            /* Row action buttons: Send to WhatsApp / Send to Email */
            /* ---- View flow: reference design preview modal populate ---- */
            var apvCurrentId = null; /* preview la open-a irukura proposal id */
            function numberToWordsIN(num) {
                var a = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
                var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
                function inWords(n) {
                    if (n < 20) return a[n];
                    if (n < 100) return b[Math.floor(n / 10)] + (n % 10 ? ' ' + a[n % 10] : '');
                    return a[Math.floor(n / 100)] + ' hundred' + (n % 100 ? ' ' + inWords(n % 100) : '');
                }
                num = Math.floor(num);
                if (!num) return 'Zero';
                var out = '';
                var crore = Math.floor(num / 10000000);
                num %= 10000000;
                var lakh = Math.floor(num / 100000);
                num %= 100000;
                var thousand = Math.floor(num / 1000);
                num %= 1000;
                if (crore) out += inWords(crore) + ' crore ';
                if (lakh) out += inWords(lakh) + ' lakh ';
                if (thousand) out += inWords(thousand) + ' thousand ';
                if (num) out += inWords(num);
                return out.trim().replace(/\b\w/g, function(c) {
                    return c.toUpperCase();
                });
            }

            function fillApPreview(r) {
                apvCurrentId = Number(r.id);
                var num = esc(r.no || '');
                document.getElementById('apvNo').textContent = '# ' + num;
                document.getElementById('apvSubject').textContent = r.subject || 'New Proposal';
                document.getElementById('apvLogo').textContent = (r.to || 'GHARUDA').replace(/[^A-Za-z]/g, '').slice(0, 3).toUpperCase() || 'KOH';
                document.getElementById('apvClient').textContent = r.to || '—';
                document.getElementById('apvClientAv').textContent = (r.to || 'KO').replace(/[^A-Za-z]/g, '').slice(0, 2).toUpperCase() || 'KO';
                document.getElementById('apvEmail').textContent = r.email || '—';
                document.getElementById('apvStatus').textContent = r.status || 'Draft';
                document.getElementById('apvStatusChip').textContent = (r.status || 'Draft').toUpperCase();
                /* status chip color: status ku thagundha maari */
                var chipEl = document.getElementById('apvStatusChip');
                var st = (r.status || 'Draft').toLowerCase();
                chipEl.style.background = (st === 'completed' || st === 'accepted') ? '#ecfdf5' : (st === 'cancelled' || st === 'declined') ? '#fef2f2' : '#f1f5f9';
                chipEl.style.borderColor = (st === 'completed' || st === 'accepted') ? '#a7f3d0' : (st === 'cancelled' || st === 'declined') ? '#fecaca' : '#e2e8f0';
                chipEl.style.color = (st === 'completed' || st === 'accepted') ? '#047857' : (st === 'cancelled' || st === 'declined') ? '#b91c1c' : '#475569';
                /* items: single demo row — data model la items illa, so summary la total mattum */
                var body = document.getElementById('apvItemBody');
                var totalNum = parseFloat(String(r.total || '0').replace(/[^0-9.]/g, '')) || 0;
                var subNum = parseFloat(String(r.subTotal || '0').replace(/[^0-9.]/g, '')) || 0;
                var inrFmt = function(n) {
                    return n.toLocaleString('en-IN', { minimumFractionDigits: 2 });
                };
                var rows = '<tr><td style="color:#9ca3af;">1</td><td><div class="apv-item-name">' + esc(r.subject || 'test') + '</div><div class="apv-item-sub">' + esc(r.subject || 'test') + '</div></td><td class="apv-item-sub">—</td><td style="text-align:right;">1</td>' +
                    '<td style="text-align:right;">' + inrFmt(subNum) + '</td>' +
                    '<td style="text-align:right;">5.00</td><td style="text-align:right;">0</td>' +
                    '<td style="text-align:right;font-weight:700;color:#111827;">' + inrFmt(totalNum) + '</td></tr>';
                body.innerHTML = rows;
                document.getElementById('apvSubTotal').textContent = '₹ ' + inrFmt(subNum);
                document.getElementById('apvTotal').textContent = '₹ ' + inrFmt(totalNum);
                document.getElementById('apvTotalBig').textContent = '₹ ' + inrFmt(totalNum);
                /* discount + words */
                var dRow = document.getElementById('apvDiscountRow');
                if (subNum && totalNum && subNum > totalNum) {
                    dRow.style.display = 'flex';
                    document.getElementById('apvDiscountLbl').textContent = ((subNum - totalNum).toFixed(2)) + ' (' + (((subNum - totalNum) / subNum) * 100).toFixed(2) + '%)';
                    document.getElementById('apvDiscountVal').textContent = '₹ ' + (subNum - totalNum).toLocaleString('en-IN', { minimumFractionDigits: 2 });
                } else {
                    dRow.style.display = 'none';
                }
                document.getElementById('apvWords').textContent = totalNum ? numberToWordsIN(totalNum) + ' Rupees Only' : '—';
                /* discussion reset to summary tab */
                switchApvTab('summary');
            }

            /* ---- Preview modal: Summary / Discussion tab switch ---- */
            function switchApvTab(name) {
                document.querySelectorAll('#apProposalPreviewModal .apv-tab').forEach(function(t) {
                    t.classList.toggle('active', t.getAttribute('data-apvtab') === name);
                });
                var s = document.getElementById('apvPanelSummary');
                var d = document.getElementById('apvPanelDiscussion');
                if (s) s.style.display = (name === 'summary') ? '' : 'none';
                if (d) d.style.display = (name === 'discussion') ? '' : 'none';
            }
            document.querySelectorAll('#apProposalPreviewModal .apv-tab').forEach(function(t) {
                t.addEventListener('click', function() {
                    switchApvTab(t.getAttribute('data-apvtab'));
                });
            });

            /* ---- Preview modal: discussion send ---- */
            var apvDiscSend = document.getElementById('apvDiscSend');
            if (apvDiscSend) {
                apvDiscSend.addEventListener('click', function() {
                    var inp = document.getElementById('apvDiscInput');
                    var list = document.getElementById('apvDiscList');
                    if (!inp || !list || !inp.value.trim()) return;
                    var item = document.createElement('div');
                    item.className = 'apv-disc-item';
                    item.innerHTML = '<span class="apv-disc-av" style="background:#16a34a;">YOU</span>' +
                        '<div><b style="color:#111827;">You</b>' +
                        '<div style="color:#374151;">' + esc(inp.value.trim()) + '</div>' +
                        '<div style="font-size:11px;color:#9ca3af;margin-top:2px;">Just now</div></div>';
                    list.appendChild(item);
                    inp.value = '';
                });
            }

            /* ---- Download button -> summary PDF download (pdfMake) ---- */
            var apvDownloadBtn = document.getElementById('apvDownloadBtn');
            if (apvDownloadBtn) {
                apvDownloadBtn.addEventListener('click', function() {
                    if (typeof pdfMake === 'undefined') {
                        alert('PDF library not loaded.');
                        return;
                    }
                    var get = function(id) {
                        var el = document.getElementById(id);
                        return el ? el.textContent.trim() : '';
                    };
                    /* address <br> tags-a newline aakka (PDF la multi-line) */
                    var getHtml = function(id) {
                        var el = document.getElementById(id);
                        return el ? el.innerHTML.replace(/<br\s*\/?>/gi, '\n').replace(/<[^>]+>/g, '').trim() : '';
                    };
                    /* items table rows DOM la irundhu extract */
                    var rows = [];
                    document.querySelectorAll('#apvItemBody tr').forEach(function(tr) {
                        var tds = tr.querySelectorAll('td');
                        if (tds.length < 8) return;
                        rows.push([
                            tds[0].textContent.trim(),
                            tds[1].textContent.trim().replace(/\s+/g, ' '),
                            tds[2].textContent.trim() || '-',
                            tds[3].textContent.trim(),
                            tds[4].textContent.trim(),
                            tds[5].textContent.trim(),
                            tds[6].textContent.trim(),
                            tds[7].textContent.trim()
                        ]);
                    });
                    var totalNum = parseFloat(String(get('apvTotal')).replace(/[^0-9.]/g, '')) || 0;
                    var body = [];
                    /* header block */
                    body.push({
                        columns: [{
                                text: get('apvLogo'),
                                bold: true,
                                fontSize: 16,
                                color: '#16a34a'
                            },
                            {
                                text: get('apvNo') + '\n' + get('apvSubject'),
                                alignment: 'right',
                                bold: true,
                                fontSize: 12
                            }
                        ],
                        margin: [0, 0, 0, 4]
                    });
                    body.push({
                        text: 'PROPOSAL SUMMARY',
                        fontSize: 9,
                        color: '#64748b',
                        margin: [0, 0, 0, 10]
                    });
                    /* client block */
                    body.push({
                        text: get('apvClient'),
                        bold: true,
                        fontSize: 11,
                        margin: [0, 0, 0, 2]
                    });
                    body.push({
                        text: getHtml('apvAddress'),
                        fontSize: 9.5,
                        color: '#475569',
                        margin: [0, 0, 0, 2]
                    });
                    body.push({
                        text: 'Phone: ' + get('apvPhone') + '  |  GST: ' + get('apvGst') + '  |  ' + get('apvEmail'),
                        fontSize: 9.5,
                        color: '#475569',
                        margin: [0, 0, 0, 12]
                    });
                    /* items table */
                    body.push({
                        table: {
                            headerRows: 1,
                            widths: ['5%', '35%', '10%', '8%', '12%', '8%', '8%', '14%'],
                            body: [
                                [{ text: '#', bold: true, fillColor: '#f1f5f9' },
                                    { text: 'ITEM', bold: true, fillColor: '#f1f5f9' },
                                    { text: 'HSN', bold: true, fillColor: '#f1f5f9' },
                                    { text: 'QTY', bold: true, fillColor: '#f1f5f9', alignment: 'right' },
                                    { text: 'RATE', bold: true, fillColor: '#f1f5f9', alignment: 'right' },
                                    { text: 'DIS', bold: true, fillColor: '#f1f5f9', alignment: 'right' },
                                    { text: 'GST', bold: true, fillColor: '#f1f5f9', alignment: 'right' },
                                    { text: 'AMOUNT', bold: true, fillColor: '#f1f5f9', alignment: 'right' }
                                ]
                            ].concat(rows.map(function(r) {
                                return [{ text: r[0] }, { text: r[1] }, { text: r[2] }, { text: r[3], alignment: 'right' }, { text: r[4], alignment: 'right' }, { text: r[5], alignment: 'right' }, { text: r[6], alignment: 'right' }, { text: r[7], alignment: 'right', bold: true }];
                            }))
                        },
                        fontSize: 9,
                        margin: [0, 0, 0, 10]
                    });
                    /* totals */
                    var totalsRows = [
                        [{ text: 'Sub Total', alignment: 'right', bold: true }, { text: get('apvSubTotal'), alignment: 'right', width: 'auto' }]
                    ];
                    var dRowEl = document.getElementById('apvDiscountRow');
                    if (dRowEl && dRowEl.style.display !== 'none') {
                        totalsRows.push([{ text: get('apvDiscountLbl'), alignment: 'right' }, { text: get('apvDiscountVal'), alignment: 'right' }]);
                    }
                    totalsRows.push([{ text: 'Total', alignment: 'right', bold: true, fontSize: 11 }, { text: get('apvTotal'), alignment: 'right', bold: true, fontSize: 11, color: '#16a34a' }]);
                    body.push({
                        table: {
                            widths: ['*', 110],
                            body: totalsRows
                        },
                        fontSize: 9.5,
                        margin: [0, 0, 0, 8],
                        layout: 'lightHorizontalLines'
                    });
                    body.push({
                        text: 'With words: ' + get('apvWords'),
                        italics: true,
                        fontSize: 9,
                        color: '#64748b',
                        margin: [0, 0, 0, 14]
                    });
                    /* info block */
                    body.push({
                        columns: [{
                                text: 'Proposal Information\nRelated: ' + get('apvRelInfo'),
                                fontSize: 9.5,
                                color: '#475569'
                            },
                            {
                                text: 'Status: ' + get('apvStatus') + '\nDate: ' + get('apvDate') + '\nOpen Till: ' + get('apvOpenTill'),
                                fontSize: 9.5,
                                color: '#475569',
                                alignment: 'right'
                            }
                        ]
                    });
                    var fileBase = (get('apvNo') || 'proposal').replace(/[^A-Za-z0-9-]/g, '');
                    pdfMake.createPdf({
                        content: body,
                        defaultStyle: {
                            font: 'Roboto'
                        },
                        pageSize: 'A4',
                        pageMargins: [36, 36, 36, 36]
                    }).download(fileBase + '-proposal.pdf');
                });
            }

            /* ---- Decline button -> status chip DECLINED (red) ---- */
            var apvDeclineBtn = document.getElementById('apvDeclineBtn');
            if (apvDeclineBtn) {
                apvDeclineBtn.addEventListener('click', function() {
                    var chip = document.getElementById('apvStatusChip');
                    if (chip) {
                        chip.textContent = 'DECLINED';
                        chip.style.background = '#fef2f2';
                        chip.style.borderColor = '#fecaca';
                        chip.style.color = '#b91c1c';
                    }
                    var statusEl = document.getElementById('apvStatus');
                    if (statusEl) {
                        statusEl.textContent = 'Declined';
                        statusEl.classList.remove('apv-status-chip');
                    }
                    /* record um update — modal close/reopen pannalum irukanum */
                    if (apvCurrentId != null) {
                        var rec = apData.filter(function(x) {
                            return Number(x.id) === apvCurrentId;
                        })[0];
                        if (rec) {
                            rec.status = 'Declined';
                            if (typeof apTable !== 'undefined' && apTable) apTable.updateItem(apvCurrentId, { status: 'Declined' });
                        }
                    }
                    /* discussion la declined note */
                    var list = document.getElementById('apvDiscList');
                    if (list) {
                        var item = document.createElement('div');
                        item.className = 'apv-disc-item';
                        item.innerHTML = '<span class="apv-disc-av" style="background:#b91c1c;">\u2715</span>' +
                            '<div><b style="color:#111827;">Declined</b>' +
                            '<div style="color:#374151;">Proposal was declined by the client.</div>' +
                            '<div style="font-size:11px;color:#9ca3af;margin-top:2px;">Just now</div></div>';
                        list.appendChild(item);
                    }
                });
            }

            /* ---- Signature & Confirmation Of Identity (Accept flow) ---- */
            (function() {
                var signModalEl = document.getElementById('apSignModal');
                var acceptBtn = document.querySelector('#apProposalPreviewModal .apv-accept');
                if (!signModalEl || !acceptBtn) return;
                var currentSignId = null;

                acceptBtn.addEventListener('click', function() {
                    currentSignId = apvCurrentId;
                    /* context: name fields-a client info vechu pre-fill */
                    var clientName = (document.getElementById('apvClient').textContent || '').trim();
                    var parts = clientName.split(/\s+/);
                    document.getElementById('apvSignFirst').value = parts[0] || '';
                    document.getElementById('apvSignLast').value = parts.length > 1 ? parts.slice(1).join(' ') : '';
                    document.getElementById('apvSignEmail').value = document.getElementById('apvEmail').textContent.trim();
                    if (typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(signModalEl).show();
                    }
                });

                /* ===== Signature pad: mouse + touch draw ===== */
                var canvas = document.getElementById('apvSignCanvas');
                var wrap = document.getElementById('apvSignWrap');
                var placeholder = document.getElementById('apvSignPlaceholder');
                var ctx = canvas.getContext('2d');
                var drawing = false;
                var strokes = []; /* undo ku stroke history */
                var curStroke = null;

                function resizeCanvas() {
                    /* devicePixelRatio sharp lines ku + content preserve */
                    var ratio = window.devicePixelRatio || 1;
                    canvas.width = canvas.offsetWidth * ratio;
                    canvas.height = canvas.offsetHeight * ratio;
                    ctx.scale(ratio, ratio);
                    ctx.lineCap = 'round';
                    ctx.lineJoin = 'round';
                    ctx.lineWidth = 2;
                    ctx.strokeStyle = '#0f172a';
                    /* puthu blank canvas la old strokes redraw */
                    strokes.forEach(function(s) {
                        drawStroke(s);
                    });
                }

                function drawStroke(s) {
                    if (!s || !s.length) return;
                    ctx.beginPath();
                    s.forEach(function(pt, i) {
                        if (i === 0) ctx.moveTo(pt.x, pt.y);
                        else ctx.lineTo(pt.x, pt.y);
                    });
                    if (s.length === 1) {
                        ctx.lineTo(s[0].x + 0.1, s[0].y + 0.1);
                    }
                    ctx.stroke();
                }

                function pos(e) {
                    var r = canvas.getBoundingClientRect();
                    return {
                        x: e.clientX - r.left,
                        y: e.clientY - r.top
                    };
                }

                function startDraw(e) {
                    drawing = true;
                    curStroke = [pos(e)];
                    placeholder.style.display = 'none';
                    wrap.classList.add('apv-has-sign');
                }

                function moveDraw(e) {
                    if (!drawing) return;
                    e.preventDefault();
                    curStroke.push(pos(e));
                    /* live segment draw */
                    var pts = curStroke;
                    ctx.beginPath();
                    ctx.moveTo(pts[pts.length - 2].x, pts[pts.length - 2].y);
                    ctx.lineTo(pts[pts.length - 1].x, pts[pts.length - 1].y);
                    ctx.stroke();
                }

                function endDraw() {
                    if (!drawing) return;
                    drawing = false;
                    strokes.push(curStroke);
                    curStroke = null;
                }

                canvas.addEventListener('mousedown', startDraw);
                window.addEventListener('mousemove', moveDraw);
                window.addEventListener('mouseup', endDraw);
                canvas.addEventListener('touchstart', function(e) {
                    e.preventDefault();
                    startDraw(e.touches[0]);
                }, { passive: false });
                canvas.addEventListener('touchmove', function(e) {
                    e.preventDefault();
                    moveDraw(e.touches[0]);
                }, { passive: false });
                canvas.addEventListener('touchend', endDraw);

                /* modal open aana odane canvas resize (width 0 issue avoid) */
                signModalEl.addEventListener('shown.bs.modal', resizeCanvas);
                window.addEventListener('resize', function() {
                    if (signModalEl.classList.contains('show')) resizeCanvas();
                });

                /* Clear */
                document.getElementById('apvSignClear').addEventListener('click', function() {
                    strokes = [];
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    placeholder.style.display = '';
                    wrap.classList.remove('apv-has-sign');
                });

                /* Undo: last stroke remove + redraw */
                document.getElementById('apvSignUndo').addEventListener('click', function() {
                    strokes.pop();
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    strokes.forEach(function(s) {
                        drawStroke(s);
                    });
                    if (!strokes.length) {
                        placeholder.style.display = '';
                        wrap.classList.remove('apv-has-sign');
                    }
                });

                /* Sign submit -> proposal Accepted + table refresh + close */
                document.getElementById('apvSignSubmit').addEventListener('click', function() {
                    var first = document.getElementById('apvSignFirst');
                    if (!first.value.trim()) {
                        first.focus();
                        return;
                    }
                    if (!strokes.length) {
                        wrap.focus();
                        return;
                    }
                    /* proposal status update */
                    if (currentSignId != null && typeof apTable !== 'undefined' && apTable) {
                        apTable.updateItem(currentSignId, { status: 'Accepted' });
                    }
                    /* preview modal status texts refresh */
                    var rec = apData.filter(function(x) {
                        return Number(x.id) === currentSignId;
                    })[0];
                    if (rec) {
                        rec.status = 'Accepted';
                        fillApPreview(rec);
                    }
                    /* signed-by note in discussion */
                    var list = document.getElementById('apvDiscList');
                    if (list) {
                        var item = document.createElement('div');
                        item.className = 'apv-disc-item';
                        item.innerHTML = '<span class="apv-disc-av" style="background:#16a34a;">\u2713</span>' +
                            '<div><b style="color:#111827;">Signed</b>' +
                            '<div style="color:#374151;">' + esc((first.value.trim() + ' ' + document.getElementById('apvSignLast').value.trim()).trim()) + ' signed the proposal.</div>' +
                            '<div style="font-size:11px;color:#9ca3af;margin-top:2px;">Just now</div></div>';
                        list.appendChild(item);
                    }
                    bootstrap.Modal.getOrCreateInstance(signModalEl).hide();
                });
            })();

            /* npProposalsTable view icon handler um indha function use panna — global-a expose */
            window.fillApPreview = fillApPreview;

            function apActionButtons(r) {
                var phone = String(r.phone || '').replace(/\D/g, '');
                var waMsg = encodeURIComponent('Hello, sharing proposal ' + r.no + ' - ' + r.subject + '. Total: ' + r.total);
                var wa = phone ?
                    '<a href="https://wa.me/91' + phone + '?text=' + waMsg + '" target="_blank" class="ap-act-btn ap-wa" data-bs-toggle="tooltip" data-bs-title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>' :
                    '<button type="button" class="ap-act-btn ap-wa" disabled data-bs-toggle="tooltip" data-bs-title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></button>';
                var mailBody = encodeURIComponent('Dear ' + r.to + ',\n\nPlease find our proposal ' + r.no + ' - ' + r.subject + '.\n\nTotal: ' + r.total + '\n\nRegards.');
                var mail = r.email ?
                    '<a href="mailto:' + r.email + '?subject=' + encodeURIComponent('Proposal ' + r.no + ' - ' + r.subject) + '&body=' + mailBody + '" class="ap-act-btn ap-mail" data-bs-toggle="tooltip" data-bs-title="Send to Email"><i class="bi bi-envelope"></i></a>' :
                    '<button type="button" class="ap-act-btn ap-mail" disabled data-bs-toggle="tooltip" data-bs-title="Send to Email"><i class="bi bi-envelope"></i></button>';
                /* Extra: view (content preview) + edit (newProposalModal) icons */
                var viewBtn = '<button type="button" class="ap-act-btn ap-view" data-apact="view" data-id="' + r.id + '" data-bs-toggle="tooltip" data-bs-title="View"><i class="bi bi-eye"></i></button>';
                var editBtn = '<button type="button" class="ap-act-btn ap-edit" data-apact="edit" data-id="' + r.id + '" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="bi bi-pencil-square"></i></button>';
                return '<div class="ap-act-wrap">' + viewBtn + editBtn + wa + mail + '</div>';
            }

            /* AutoMasterTable bridge for apProposalsTable */
            var apTable = {
                updateItem: function(id, patch) {
                    var tr = document.querySelector('#apProposalsTable tr[data-id="' + id + '"]');
                    if (tr && patch.status) {
                        var statusSpan = tr.querySelector('.ld-prop-status');
                        if (statusSpan) {
                            var s = patch.status.toLowerCase();
                            var cls = s === 'accepted' ? 'accepted' : (s === 'declined' ? 'rejected' : (s === 'sent' ? 'sent' : 'draft'));
                            statusSpan.className = 'ld-prop-status ' + cls;
                            statusSpan.textContent = patch.status;
                        }
                    }
                    var tbl = document.getElementById('apProposalsTable');
                    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                },
                refresh: function() {
                    var tbl = document.getElementById('apProposalsTable');
                    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                }
            };

            /* Keep the selected row highlighted after MasterTable re-renders (search/sort/page) */
            var apTbodyEl = document.getElementById('apPropTbody');
            if (apTbodyEl && typeof MutationObserver !== 'undefined') {
                new MutationObserver(function() {
                    apTbodyEl.querySelectorAll('tr[data-id]').forEach(function(tr) {
                        tr.classList.toggle('active', Number(tr.getAttribute('data-id')) === apState.selected);
                    });
                }).observe(apTbodyEl, {
                    childList: true
                });
            }

            /* ---- Reminders tab: Set Proposal Reminder flow ---- */
            var remData = [{
                    id: 1,
                    desc: 'Follow up on proposal feedback with Suresh Babu',
                    date: '24-09-2026',
                    remindTo: 'GHRA SOFTWARE',
                    notified: 'Yes'
                },
                {
                    id: 2,
                    desc: 'Send revised quote with discounted AMC pricing',
                    date: '28-09-2026',
                    remindTo: 'GHRA SOFTWARE',
                    notified: 'No'
                },
                {
                    id: 3,
                    desc: 'Contract agreement signing follow-up call',
                    date: '02-10-2026',
                    remindTo: 'Admin',
                    notified: 'No'
                }
            ];
            /* AutoMasterTable bridge for apRemindersTable */
            var remTable = {
                addItem: function(r) {
                    var tbody = document.getElementById('apRemTbody') || (document.getElementById('apRemindersTable') ? document.getElementById('apRemindersTable').querySelector('tbody') : null);
                    if (tbody) {
                        var tr = document.createElement('tr');
                        tr.setAttribute('data-id', r.id || Date.now());
                        tr.innerHTML = '<td>' + esc(r.desc) + '</td>' +
                            '<td>' + esc(r.date) + '</td>' +
                            '<td>' + esc(r.remindTo) + '</td>' +
                            '<td><span class="ld-prop-status ' + (r.notified === 'Yes' ? 'accepted' : 'draft') + '">' + esc(r.notified) + '</span></td>';
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('apRemindersTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }
                }
            };

            /* Set Proposal Reminder button -> open reminder modal */
            var setRemBtn = document.getElementById('apSetReminderBtn');
            if (setRemBtn) setRemBtn.addEventListener('click', function() {
                var m = document.getElementById('setProposalReminderModal');
                if (m) bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* Reminder modal Submit -> add row to reminders table */
            var remSubmit = document.getElementById('apReminderSubmit');
            if (remSubmit) remSubmit.addEventListener('click', function() {
                var dateEl = document.getElementById('apReminderDate');
                var staffEl = document.getElementById('apReminderStaff');
                var descEl = document.getElementById('apReminderDesc');
                var emailEl = document.getElementById('apReminderEmail');
                if (!dateEl.value || !descEl.value.trim()) {
                    alert('Please fill all the required fields.');
                    return;
                }
                var d = new Date(dateEl.value + 'T00:00:00');
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var fmt = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                if (remTable) remTable.addItem({
                    id: Date.now(),
                    desc: descEl.value.trim(),
                    date: fmt,
                    remindTo: staffEl.value,
                    notified: 'No'
                });
                if (emailEl.checked) alert('\uD83D\uDCE7 Reminder email will also be sent to ' + staffEl.value + '.');
                bootstrap.Modal.getOrCreateInstance(document.getElementById('setProposalReminderModal')).hide();
                dateEl.value = '';
                descEl.value = '';
                emailEl.checked = false;
            });

            /* ---- Tasks tab: New Task flow ---- */
            var taskData = [{
                    id: 1,
                    name: 'Verify Technical Requirements',
                    status: 'Completed',
                    start: '18-09-2026',
                    due: '20-09-2026',
                    assigned: 'Suresh Babu',
                    tags: 'Technical, CRM',
                    priority: 'High'
                },
                {
                    id: 2,
                    name: 'Prepare Commercial Scope Document',
                    status: 'In Progress',
                    start: '21-09-2026',
                    due: '25-09-2026',
                    assigned: 'GHRA SOFTWARE',
                    tags: 'Proposal, Finance',
                    priority: 'Medium'
                },
                {
                    id: 3,
                    name: 'Client Negotiation & Final Sign-off',
                    status: 'Not Started',
                    start: '26-09-2026',
                    due: '30-09-2026',
                    assigned: 'Admin',
                    tags: 'Sales',
                    priority: 'Urgent'
                }
            ];
            /* AutoMasterTable bridge for apTasksTable */
            var apTaskTable = {
                addItem: function(r) {
                    var tbody = document.getElementById('apTaskTbody') || (document.getElementById('apTasksTable') ? document.getElementById('apTasksTable').querySelector('tbody') : null);
                    if (tbody) {
                        var pCls = (r.priority === 'High' || r.priority === 'Urgent') ? 'rejected' : (r.priority === 'Low' ? 'accepted' : 'draft');
                        var sCls = r.status === 'Completed' ? 'accepted' : (r.status === 'Cancelled' ? 'rejected' : (r.status === 'In Progress' ? 'sent' : 'draft'));
                        var tr = document.createElement('tr');
                        tr.setAttribute('data-id', r.id || Date.now());
                        tr.innerHTML = '<td><a href="#" class="lead-name-link">' + esc(r.name) + '</a></td>' +
                            '<td><span class="ld-prop-status ' + sCls + '">' + esc(r.status) + '</span></td>' +
                            '<td>' + esc(r.start) + '</td>' +
                            '<td>' + esc(r.due) + '</td>' +
                            '<td>' + esc(r.assigned) + '</td>' +
                            '<td>' + esc(r.tags) + '</td>' +
                            '<td><span class="ld-prop-status ' + pCls + '">' + esc(r.priority) + '</span></td>';
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('apTasksTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }
                }
            };

            /* Populate the Proposal dropdown with current proposal numbers */
            (function() {
                var sel = document.getElementById('apTaskProposalSel');
                if (!sel) return;
                sel.innerHTML = apData.map(function(r) {
                    return '<option value="' + r.id + '"' + (r.id === apState.selected ? ' selected' : '') + '>' + esc(r.no) + '</option>';
                }).join('');
            })();

            /* New Task button -> open add task modal with current proposal pre-selected */
            var apNewTaskBtn = document.getElementById('apNewTaskBtn');
            if (apNewTaskBtn) apNewTaskBtn.addEventListener('click', function() {
                var sel = document.getElementById('apTaskProposalSel');
                if (sel && apState.selected) sel.value = String(apState.selected);
                var m = document.getElementById('apAddTaskModal');
                if (m) bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* Attach files: drag & drop + browse + selected file list */
            var apTaskFilesApi = {
                clear: function() {}
            };
            (function() {
                var drop = document.getElementById('apTaskDropZone');
                var input = document.getElementById('apTaskAttachInput');
                var list = document.getElementById('apTaskFileList');
                if (!drop || !input || !list) return;
                var files = [];
                drop.addEventListener('click', function() {
                    input.click();
                });
                drop.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    drop.classList.add('dragover');
                });
                drop.addEventListener('dragleave', function() {
                    drop.classList.remove('dragover');
                });
                drop.addEventListener('drop', function(e) {
                    e.preventDefault();
                    drop.classList.remove('dragover');
                    addFiles(e.dataTransfer.files);
                });
                input.addEventListener('change', function() {
                    addFiles(input.files);
                    input.value = '';
                });

                function fmtSize(b) {
                    if (b >= 1048576) return (b / 1048576).toFixed(1) + ' MB';
                    if (b >= 1024) return (b / 1024).toFixed(1) + ' KB';
                    return b + ' B';
                }

                function addFiles(fileArr) {
                    Array.from(fileArr).forEach(function(f) {
                        files.push(f);
                        var icon = 'bi-file-earmark';
                        if (f.type.indexOf('image') === 0) icon = 'bi-file-earmark-image';
                        else if (f.type.indexOf('pdf') !== -1) icon = 'bi-file-earmark-pdf';
                        else if (f.type.indexOf('word') !== -1 || /\.docx?$/.test(f.name)) icon = 'bi-file-earmark-word';
                        else if (f.type.indexOf('sheet') !== -1 || /\.xlsx?$/.test(f.name)) icon = 'bi-file-earmark-excel';
                        var item = document.createElement('div');
                        item.className = 'at2-file-item';
                        item.innerHTML = '<i class="bi ' + icon + '"></i><span class="nm">' + f.name.replace(/</g, '&lt;') + '</span><span class="sz">' + fmtSize(f.size) + '</span><button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                        list.appendChild(item);
                        item.querySelector('.rm').addEventListener('click', function() {
                            var idx = files.indexOf(f);
                            if (idx !== -1) files.splice(idx, 1);
                            item.remove();
                        });
                    });
                }
                apTaskFilesApi.clear = function() {
                    files = [];
                    list.innerHTML = '';
                };
            })();

            /* Task tags chip input */
            var apTaskTagsApi = (function() {
                var chipsWrap = document.getElementById('apTaskTagsChips');
                var input = document.getElementById('apTaskTagsInput');
                var wrap = document.getElementById('apTaskTagsWrap');
                if (!chipsWrap || !input) return {
                    get: function() {
                        return [];
                    },
                    clear: function() {}
                };
                var tags = [];

                function addTag(text) {
                    var val = text.trim().replace(/,/g, '');
                    if (!val || tags.indexOf(val) !== -1) return;
                    tags.push(val);
                    var chip = document.createElement('span');
                    chip.className = 'nl-tag-chip';
                    chip.innerHTML = val + '<button type="button" class="nl-tag-x" title="Remove">&times;</button>';
                    chipsWrap.appendChild(chip);
                    chip.querySelector('.nl-tag-x').addEventListener('click', function() {
                        var idx = tags.indexOf(val);
                        if (idx !== -1) tags.splice(idx, 1);
                        chip.remove();
                    });
                }
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ',') {
                        e.preventDefault();
                        addTag(input.value);
                        input.value = '';
                    }
                    if (e.key === 'Backspace' && !input.value && tags.length) {
                        var last = chipsWrap.lastElementChild;
                        if (last) last.querySelector('.nl-tag-x').click();
                    }
                });
                input.addEventListener('blur', function() {
                    if (input.value.trim()) {
                        addTag(input.value);
                        input.value = '';
                    }
                });
                if (wrap) wrap.addEventListener('click', function() {
                    input.focus();
                });
                return {
                    get: function() {
                        return tags.slice();
                    },
                    clear: function() {
                        tags = [];
                        chipsWrap.innerHTML = '';
                    }
                };
            })();

            /* Add task modal Submit -> add row to tasks table */
            var apTaskSubmitBtn = document.getElementById('apTaskSubmit');
            if (apTaskSubmitBtn) apTaskSubmitBtn.addEventListener('click', function() {
                var subj = document.getElementById('apTaskSubject').value.trim();
                var startEl = document.getElementById('apTaskStart');
                var dueEl = document.getElementById('apTaskDue');
                if (!subj || !startEl.value) {
                    alert('Please fill all the required fields.');
                    return;
                }
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };

                function fmt(v) {
                    if (!v) return '\u2014';
                    var d = new Date(v + 'T00:00:00');
                    return pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                }
                var tagList = apTaskTagsApi.get();
                if (apTaskTable) apTaskTable.addItem({
                    id: Date.now(),
                    name: subj,
                    status: 'Not Started',
                    start: fmt(startEl.value),
                    due: fmt(dueEl.value),
                    assigned: document.getElementById('apTaskAssignees').value,
                    tags: tagList.length ? tagList.join(', ') : '\u2014',
                    priority: document.getElementById('apTaskPriority').value
                });
                bootstrap.Modal.getOrCreateInstance(document.getElementById('apAddTaskModal')).hide();
                document.getElementById('apTaskSubject').value = '';
                document.getElementById('apTaskDesc').value = '';
                document.getElementById('apTaskDue').value = '';
                apTaskTagsApi.clear();
                apTaskFilesApi.clear();
            });

            function selectProposal(id) {
                apState.selected = id;
                var r = null;
                for (var i = 0; i < apData.length; i++) {
                    if (apData[i].id === id) {
                        r = apData[i];
                        break;
                    }
                }
                if (!r) return;
                document.getElementById('apPropNo').textContent = r.no;
                document.getElementById('apPropSubject').textContent = r.subject;
                document.getElementById('apToName').textContent = r.to;
                var chip = document.getElementById('apStatusChip');
                chip.className = 'ld-prop-status ' + (apStatusMap[r.status] || 'draft');
                chip.textContent = r.status;
                document.getElementById('apContentArea').value = r.content;
                document.querySelectorAll('#apPropTbody tr[data-id]').forEach(function(tr) {
                    tr.classList.toggle('active', Number(tr.getAttribute('data-id')) === id);
                });
            }

            /* Row click -> select & show detail (Action buttons handle themselves) */
            document.getElementById('apPropTbody').addEventListener('click', function(e) {
                /* view icon -> reference design maari proposal preview modal open */
                var viewBtn = e.target.closest('.ap-act-btn.ap-view');
                if (viewBtn) {
                    e.preventDefault();
                    e.stopPropagation();
                    var vid = Number(viewBtn.getAttribute('data-id'));
                    var rec = apData.filter(function(x) {
                        return Number(x.id) === vid;
                    })[0];
                    if (rec) fillApPreview(rec);
                    var pv = document.getElementById('apProposalPreviewModal');
                    if (pv && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(pv).show();
                    }
                    return;
                }
                /* edit icon -> proposal detail la load + newProposalModal open */
                var editBtn = e.target.closest('.ap-act-btn.ap-edit');
                if (editBtn) {
                    e.preventDefault();
                    e.stopPropagation();
                    var eid = Number(editBtn.getAttribute('data-id'));
                    selectProposal(eid);
                    var npModal = document.getElementById('newProposalModal');
                    if (npModal && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(npModal).show();
                    }
                    return;
                }
                if (e.target.closest('.ap-act-btn')) return;
                var tr = e.target.closest('tr[data-id]');
                if (!tr) return;
                e.preventDefault();
                selectProposal(Number(tr.getAttribute('data-id')));
            });

            /* Detail tabs */
            function switchTab(name) {
                var iconTab = document.querySelector('#autoProposalModal .ap-email-tab');
                if (iconTab) iconTab.classList.toggle('active', name === 'tracked-emails');
                document.querySelectorAll('#autoProposalModal .ap-dtab').forEach(function(t) {
                    if (!t.getAttribute('data-aptab')) return; /* icon-only tabs handled separately */
                    t.classList.toggle('active', t.getAttribute('data-aptab') === name);
                });
                document.querySelectorAll('#autoProposalModal .ap-panel').forEach(function(p) {
                    p.classList.toggle('active', p.getAttribute('data-appanel') === name);
                });
            }
            document.querySelectorAll('#autoProposalModal .ap-dtab').forEach(function(tab) {
                if (!tab.getAttribute('data-aptab')) return; /* icon tabs (e.g. tracked emails) bind their own handlers */
                tab.addEventListener('click', function() {
                    switchTab(tab.getAttribute('data-aptab'));
                });
            });

            /* Toolbar buttons */
            var openNewProposal = function() {
                var npModal = document.getElementById('newProposalModal');
                if (npModal) bootstrap.Modal.getOrCreateInstance(npModal).show();
            };
            var apNew = document.getElementById('apNewProposalBtn');
            if (apNew) apNew.addEventListener('click', openNewProposal);
            /* Manual Proposal -> newProposalModal stacked open (autoProposalModal open-a irukum, hide aagadhu) */
            var apManual = document.getElementById('apManualBtn');
            if (apManual) apManual.addEventListener('click', function() {
                var npModal = document.getElementById('newProposalModal');
                if (npModal && typeof bootstrap !== 'undefined') {
                    /* newProposalModal z-index 1085 > autoProposalModal 1075 — mela open aagum,
                       autoProposalModal close aagadhu. Backdrop fix stackedModals list la already irukku. */
                    bootstrap.Modal.getOrCreateInstance(npModal).show();
                }
            });
            var apAuto = document.getElementById('apAutoBtn');
            if (apAuto) apAuto.addEventListener('click', function() {
                if (apTable) apTable.refresh();
                if (apData.length) {
                    apState.selected = apData[0].id;
                    selectProposal(apState.selected);
                }
                switchTab('proposal');
            });

            /* Templates -> fill editor */
            var tplContent = {
                standard: 'Dear {client_name},\n\nThank you for your interest. Please find our proposal {proposal_number} dated {proposal_date} below.\n\n{proposal_items}\n\nSub Total: {sub_total}\nTotal Tax: {total_tax}\nTotal: {total}\n\nThis proposal is valid until {open_till}.\n\nTerms & Conditions:\n{terms_conditions}\n\nRegards,\n{company_name}\n{company_phone}',
                solar: 'Dear {client_name},\n\nBased on our site survey, here is your customized solar installation proposal {proposal_number}.\n\n{proposal_items}\n\nSystem Summary:\n- Site survey completed\n- Installation timeline: 7 working days\n- Net metering application handled end-to-end\n\nTotal: {total}\n\nValid until {open_till}.\n\nRegards,\n{company_name}'
            };
            document.querySelectorAll('.ap-use-tpl').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.getElementById('apContentArea').value = tplContent[btn.getAttribute('data-tpl')] || '';
                    switchTab('proposal');
                });
            });

            /* Merge fields -> insert into editor */
            document.querySelectorAll('.ap-merge-field').forEach(function(mf) {
                mf.addEventListener('click', function(e) {
                    e.preventDefault();
                    var area = document.getElementById('apContentArea');
                    var insert = mf.textContent;
                    var s = area.selectionStart,
                        epos = area.selectionEnd;
                    area.value = area.value.slice(0, s) + insert + area.value.slice(epos);
                    area.focus();
                    area.setSelectionRange(s + insert.length, s + insert.length);
                });
            });

            /* Comments */
            var postBtn = document.getElementById('apCommentPost');
            if (postBtn) postBtn.addEventListener('click', function() {
                var input = document.getElementById('apCommentInput');
                var txt = input.value.trim();
                if (!txt) return;
                var item = document.createElement('div');
                item.className = 'ap-cmt-item';
                item.innerHTML = '<b>GHRAUDA SOFTWARE</b> &middot; just now<br>' + txt.replace(/</g, '&lt;');
                document.getElementById('apCommentList').prepend(item);
                input.value = '';
            });

            /* Notes: add note (same flow as comments) */
            var notePostBtn = document.getElementById('apNotePost');
            if (notePostBtn) notePostBtn.addEventListener('click', function() {
                var input = document.getElementById('apNoteInput');
                var txt = input.value.trim();
                if (!txt) return;
                var item = document.createElement('div');
                item.className = 'ap-cmt-item';
                item.innerHTML = '<b>GHRAUDA SOFTWARE</b> &middot; just now<br>' + txt.replace(/</g, '&lt;');
                document.getElementById('apNoteList').prepend(item);
                input.value = '';
            });

            /* ---- Templates tab: Add Template (Quill editor) ---- */
            var apQuill = null;
            var apTplCount = 0;
            var apAddTplBtn = document.getElementById('apAddTemplateBtn');
            if (apAddTplBtn) {
                apAddTplBtn.addEventListener('click', function() {
                    var m = document.getElementById('apAddTemplateModal');
                    if (!m) return;
                    if (!apQuill && typeof Quill !== 'undefined') {
                        apQuill = new Quill('#apTplQuill', {
                            theme: 'snow',
                            placeholder: 'Write template content here...',
                            modules: {
                                toolbar: [
                                    [{
                                        font: ['verdana', 'sans-serif', 'serif', 'monospace']
                                    }, {
                                        size: ['small', false, 'large', 'huge']
                                    }],
                                    [{
                                        color: []
                                    }, {
                                        background: []
                                    }],
                                    ['bold', 'italic', 'underline'],
                                    [{
                                        align: []
                                    }],
                                    ['image', 'link'],
                                    [{
                                        list: 'bullet'
                                    }, {
                                        list: 'ordered'
                                    }],
                                    ['clean']
                                ]
                            }
                        });
                    }
                    bootstrap.Modal.getOrCreateInstance(m).show();
                });
            }

            /* Add Template modal Submit -> append template card */
            var apTplSubmitBtn = document.getElementById('apTplSubmit');
            if (apTplSubmitBtn) apTplSubmitBtn.addEventListener('click', function() {
                var nameEl = document.getElementById('apTplName');
                var name = nameEl.value.trim();
                if (!name) {
                    alert('Please enter a template name.');
                    nameEl.focus();
                    return;
                }
                var html = apQuill ? apQuill.root.innerHTML : '';
                var plain = apQuill ? apQuill.getText().trim() : '';
                apTplCount++;
                var card = document.createElement('div');
                card.className = 'ap-tpl-card';
                card.innerHTML = '<div><div class="ap-tpl-name">' + name.replace(/</g, '&lt;') + '</div>' +
                    '<div class="ap-tpl-desc">' + (plain ? plain.slice(0, 90).replace(/</g, '&lt;') : 'Custom template') + '</div></div>' +
                    '<div class="d-flex gap-2"><button type="button" class="btn btn-outline-primary ap-use-custom-tpl" style="font-size:12px;font-weight:700;border-radius:8px;">Use</button>' +
                    '<button type="button" class="btn btn-outline-danger ap-del-tpl" style="font-size:12px;font-weight:700;border-radius:8px;"><i class="bi bi-trash"></i></button></div>';
                document.getElementById('apTplCardList').appendChild(card);
                card.querySelector('.ap-use-custom-tpl').addEventListener('click', function() {
                    var area = document.getElementById('apContentArea');
                    if (area) area.value = html;
                    switchTab('proposal');
                });
                card.querySelector('.ap-del-tpl').addEventListener('click', function() {
                    card.remove();
                });
                bootstrap.Modal.getOrCreateInstance(document.getElementById('apAddTemplateModal')).hide();
                nameEl.value = '';
                if (apQuill) apQuill.setText('');
            });

            /* ---- Tracked emails sent (envelope icon) ---- */
            var trackData = [{
                    id: 1,
                    to: 'pm@GHRatechnology.com',
                    subject: 'Proposal PRO-152 \u2013 New Proposal',
                    dateSent: '19-09-2026 10:42 AM',
                    opened: 'Yes',
                    status: 'Sent'
                },
                {
                    id: 2,
                    to: 'accounts@GHRatechnology.com',
                    subject: 'Proposal PRO-152 \u2013 New Proposal',
                    dateSent: '17-09-2026 04:18 PM',
                    opened: 'No',
                    status: 'Sent'
                },
                {
                    id: 3,
                    to: 'sundar.a@gmail.com',
                    subject: 'Test Quotation \u2013 PRO-148',
                    dateSent: '15-09-2026 11:10 AM',
                    opened: 'Yes',
                    status: 'Sent'
                },
                {
                    id: 4,
                    to: 'meena@srlakshmi.in',
                    subject: 'Product \u2013 PRO-140',
                    dateSent: '22-08-2026 09:25 AM',
                    opened: 'Yes',
                    status: 'Sent'
                },
                {
                    id: 5,
                    to: 'pro@gharuraaitechnology.com',
                    subject: 'Solar Panel Installation 10 \u00d7 10 \u2013 PRO-147',
                    dateSent: '10-09-2026 03:05 PM',
                    opened: 'Yes',
                    status: 'Sent'
                },
                {
                    id: 6,
                    to: 'info@ggcompany.in',
                    subject: 'Proposal PRO-151 \u2013 New Proposal',
                    dateSent: '18-09-2026 09:33 AM',
                    opened: 'No',
                    status: 'Sent'
                }
            ];
            var trackChip = function(s) {
                return '<span class="ld-prop-status ' + ({
                    'Yes': 'accepted',
                    'No': 'draft'
                } [s] || 'draft') + '">' + s + '</span>';
            };
            /* AutoMasterTable bridge for apTrackTable */
            var trackTable = {
                deleteItem: function(id) {
                    var tr = document.querySelector('#apTrackTable tr[data-id="' + id + '"]');
                    if (tr) tr.remove();
                    var tbl = document.getElementById('apTrackTable');
                    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                }
            };
            /* Preview (eye) icon -> Tracked Views panel (proposal viewed by customer) */
            var viewData = [{
                    id: 1,
                    viewer: 'pm@GHRatechnology.com',
                    ip: '103.21.58.14',
                    dateViewed: '20-09-2026 04:12 PM',
                    device: 'Desktop · Chrome',
                    views: 3
                },
                {
                    id: 2,
                    viewer: 'pm@GHRatechnology.com',
                    ip: '103.21.58.14',
                    dateViewed: '20-09-2026 10:05 AM',
                    device: 'Desktop · Chrome',
                    views: 3
                },
                {
                    id: 3,
                    viewer: 'accounts@GHRatechnology.com',
                    ip: '157.32.14.201',
                    dateViewed: '18-09-2026 06:40 PM',
                    device: 'Mobile · Safari',
                    views: 1
                }
            ];
            /* AutoMasterTable bridge for apViewTable */
            var viewTable = {
                refresh: function() {
                    var tbl = document.getElementById('apViewTable');
                    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                }
            };
            var apPreviewTabBtn = document.querySelector('#autoProposalModal .ap-preview-tab');
            if (apPreviewTabBtn) apPreviewTabBtn.addEventListener('click', function() {
                var noEl = document.getElementById('apPropNo');
                var viewNo = document.getElementById('apViewPropNo');
                if (noEl && viewNo) viewNo.textContent = noEl.textContent;
                switchTab('tracked-views');
            });
            var apViewBack = document.getElementById('apViewBackBtn');
            if (apViewBack) apViewBack.addEventListener('click', function() {
                switchTab('proposal');
            });

            /* Expand (fullscreen) icon -> toggle the left proposals list pane */
            var apExpandTabBtn = document.querySelector('#autoProposalModal .ap-expand-tab');
            if (apExpandTabBtn) apExpandTabBtn.addEventListener('click', function() {
                var expanded = modalEl.classList.toggle('ap-expanded');
                apExpandTabBtn.classList.toggle('active', expanded);
                apExpandTabBtn.title = expanded ? 'Collapse' : 'Expand';
            });

            var apEmailTabBtn = document.querySelector('#autoProposalModal .ap-email-tab');
            if (apEmailTabBtn) apEmailTabBtn.addEventListener('click', function() {
                var noEl = document.getElementById('apPropNo');
                var trackNo = document.getElementById('apTrackPropNo');
                if (noEl && trackNo) trackNo.textContent = noEl.textContent;
                switchTab('tracked-emails');
            });
            var apTrackBack = document.getElementById('apTrackBackBtn');
            if (apTrackBack) apTrackBack.addEventListener('click', function() {
                switchTab('proposal');
            });
            var apTrackTbody = document.getElementById('apTrackTbody');
            if (apTrackTbody) apTrackTbody.addEventListener('click', function(e) {
                var resend = e.target.closest('.ap-track-resend');
                if (resend) {
                    var rid = Number(resend.getAttribute('data-rid'));
                    var rec = trackData.find(function(r) {
                        return r.id === rid;
                    });
                    var original = resend.innerHTML;
                    resend.disabled = true;
                    resend.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
                    setTimeout(function() {
                        resend.disabled = false;
                        resend.innerHTML = original;
                        alert('\u2705 Email resent to ' + (rec ? rec.to : 'recipient') + '.');
                    }, 800);
                    return;
                }
                var del = e.target.closest('.ap-track-delete');
                if (del) {
                    var rid = Number(del.getAttribute('data-rid'));
                    if (trackTable) trackTable.deleteItem(rid);
                }
            });

            /* Attach File modal: drop zone + file list */
            (function() {
                var drop = document.getElementById('apAfDrop');
                var input = document.getElementById('apAfInput');
                var list = document.getElementById('apAfList');
                if (!drop || !input || !list) return;

                function fmtSize(b) {
                    if (b >= 1048576) return (b / 1048576).toFixed(1) + ' MB';
                    if (b >= 1024) return (b / 1024).toFixed(1) + ' KB';
                    return b + ' B';
                }

                function addFiles(fileArr) {
                    Array.from(fileArr).forEach(function(f) {
                        var icon = 'bi-file-earmark';
                        if (f.type.indexOf('image') === 0) icon = 'bi-file-earmark-image';
                        else if (f.type.indexOf('pdf') !== -1) icon = 'bi-file-earmark-pdf';
                        else if (/\.docx?$/.test(f.name)) icon = 'bi-file-earmark-word';
                        else if (/\.xlsx?$/.test(f.name)) icon = 'bi-file-earmark-excel';
                        var item = document.createElement('div');
                        item.className = 'af-file-item';
                        item.innerHTML = '<i class="bi ' + icon + '"></i><span class="nm"></span><span class="sz"></span><button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                        item.querySelector('.nm').textContent = f.name;
                        item.querySelector('.sz').textContent = fmtSize(f.size || 0);
                        list.appendChild(item);
                        item.querySelector('.rm').addEventListener('click', function() {
                            item.remove();
                        });
                    });
                }

                drop.addEventListener('click', function() {
                    input.click();
                });
                drop.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    drop.classList.add('dragover');
                });
                drop.addEventListener('dragleave', function() {
                    drop.classList.remove('dragover');
                });
                drop.addEventListener('drop', function(e) {
                    e.preventDefault();
                    drop.classList.remove('dragover');
                    if (e.dataTransfer && e.dataTransfer.files.length) addFiles(e.dataTransfer.files);
                });
                input.addEventListener('change', function() {
                    if (input.files.length) addFiles(input.files);
                    input.value = '';
                });
            })();

            /* Send via email button -> Send Proposal to Email modal (image flow) */
            var apSeQuill = null;
            var apSendEmailBtn = document.getElementById('apSendEmailBtn');
            if (apSendEmailBtn) apSendEmailBtn.addEventListener('click', function() {
                var m = document.getElementById('apSendEmailModal');
                if (!m) return;
                if (!apSeQuill && typeof Quill !== 'undefined') {
                    apSeQuill = new Quill('#apSendQuill', {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                [{
                                    font: ['verdana', 'sans-serif', 'serif', 'monospace']
                                }, {
                                    size: ['small', false, 'large', 'huge']
                                }],
                                [{
                                    color: []
                                }, {
                                    background: []
                                }],
                                ['bold', 'italic', 'underline'],
                                [{
                                    align: []
                                }],
                                ['image', 'link'],
                                [{
                                    list: 'bullet'
                                }, {
                                    list: 'ordered'
                                }],
                                ['clean']
                            ]
                        }
                    });
                    apSeQuill.root.innerHTML =
                        '<p>Dear {proposal_proposal_to}</p>' +
                        '<p>Please find our attached proposal.</p>' +
                        '<p>This proposal is valid until: {proposal_open_till}<br>' +
                        'You can view the proposal on the following link: <a href="#">{proposal_number}</a></p>' +
                        "<p>Please don't hesitate to comment online if you have any questions.</p>" +
                        '<p>We look forward to your communication.</p>' +
                        '<p>Kind Regards,<br>{email_signature}</p>';
                }
                bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* send -> demo send flow */
            var apSeSend = document.getElementById('apSeSend');
            if (apSeSend) apSeSend.addEventListener('click', function() {
                var original = apSeSend.innerHTML;
                apSeSend.disabled = true;
                apSeSend.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Sending...';
                setTimeout(function() {
                    apSeSend.disabled = false;
                    apSeSend.innerHTML = original;
                    var m = document.getElementById('apSendEmailModal');
                    if (m) bootstrap.Modal.getOrCreateInstance(m).hide();
                    var cc = document.getElementById('apSeCc').value.trim();
                    alert('\u2705 Proposal emailed successfully' + (cc ? ' (CC: ' + cc + ')' : '') + '.');
                    document.getElementById('apSeCc').value = '';
                }, 800);
            });

            /* Quotation HTML builder (View PDF in New Tab) — image format la */
            var apBuildQuotationHtml = function() {
                var no = (document.getElementById('apPropNo') || {}).textContent || 'PRO-152';
                var subj = (document.getElementById('apPropSubject') || {}).textContent || 'New Proposal';
                var fromCo = (document.getElementById('apFromCompany') || {}).textContent || '';
                var fromAddr = (document.getElementById('apFromAddr') || {}).innerHTML || '';
                var toCo = (document.getElementById('apToName') || {}).textContent || '';
                var toAddr = (document.getElementById('apToAddr') || {}).innerHTML || '';
                var toContact = (document.getElementById('apToContact') || {}).innerHTML || '';
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var qDate = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                var till = new Date(d.getTime() + 7 * 86400000);
                var openTill = pad(till.getDate()) + '-' + pad(till.getMonth() + 1) + '-' + till.getFullYear();
                return '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Quotation ' + no + '</title><style>' +
                    'body{font-family:Arial,Helvetica,sans-serif;color:#1f2937;margin:0;background:#fff;}' +
                    '.page{max-width:820px;margin:0 auto;padding:40px 48px;}' +
                    'h1{font-size:20px;font-weight:bold;margin:0 0 22px;}' +
                    '.meta{font-size:13px;line-height:1.9;margin-bottom:26px;white-space:pre;}' +
                    '.addr-row{display:flex;justify-content:space-between;gap:40px;margin-bottom:26px;}' +
                    '.addr{font-size:12.5px;line-height:1.8;}' +
                    '.addr-title{font-weight:bold;margin-bottom:6px;font-size:13px;}' +
                    '.co{font-weight:bold;text-transform:uppercase;}' +
                    '.addr.right{text-align:right;}' +
                    '.subject{font-size:13px;margin:6px 0 18px;}' +
                    'table{width:100%;border-collapse:collapse;font-size:12.5px;margin-bottom:14px;}' +
                    'th{background:#334155;color:#fff;padding:9px 10px;text-align:left;font-weight:600;}' +
                    'td{padding:9px 10px;border-bottom:1px solid #f1f5f9;}' +
                    'tr.alt td{background:#f8fafc;}' +
                    'td.num,th.num{text-align:right;}' +
                    '.sum td{background:#f1f5f9;font-weight:bold;border:none;}' +
                    '.sum .lbl{text-align:right;}' +
                    '.row2{display:flex;justify-content:space-between;gap:40px;font-size:13px;margin-top:26px;}' +
                    '.sig{margin-top:70px;text-align:right;font-size:13px;}' +
                    '@media print{.page{padding:20px 24px;}}' +
                    '</style></head><body><div class="page">' +
                    '<h1>Quotation</h1>' +
                    '<div class="meta">Quotation#      : ' + no + '\nQuotation Date : ' + qDate + '\nOpen Till      : ' + openTill + '</div>' +
                    '<div class="addr-row">' +
                    '<div class="addr"><div class="addr-title">Quotation By Address:</div><div class="co">' + fromCo + '</div>' + fromAddr + '</div>' +
                    '<div class="addr right"><div class="addr-title">Quotation To Address:</div><div class="co">' + toCo + '</div>' + toAddr + '<br>' + toContact + '</div>' +
                    '</div>' +
                    '<div class="subject">' + subj + '</div>' +
                    '<table><thead><tr><th>S.No</th><th>Description</th><th>HSN</th><th>Qty</th><th class="num">Rate (\u20b9)</th><th class="num">Dis</th><th class="num">GST %</th><th class="num">Amount (\u20b9)</th></tr></thead>' +
                    '<tbody>' +
                    '<tr><td>1</td><td>Ashwagandha 3% - 1212</td><td></td><td>10 Kilograms</td><td class="num">0.00</td><td class="num">0.00</td><td class="num">0</td><td class="num">0.00</td></tr>' +
                    '<tr class="alt"><td>2</td><td>Ashwagandha - 454545</td><td></td><td>10 Kilograms</td><td class="num">0.00</td><td class="num">0.00</td><td class="num">0</td><td class="num">0.00</td></tr>' +
                    '</tbody>' +
                    '<tfoot>' +
                    '<tr class="sum"><td colspan="6"></td><td class="lbl">Sub Total</td><td class="num">\u20b9 0.00</td></tr>' +
                    '<tr class="sum"><td colspan="6"></td><td class="lbl">Total</td><td class="num">\u20b9 0.00</td></tr>' +
                    '</tfoot></table>' +
                    '<div class="row2"><div><b>Terms and Conditions:</b></div><div style="text-align:right;"><b>With words:</b><br>Rupees Only</div></div>' +
                    '<div class="row2"><div><b>Client Note:</b></div></div>' +
                    '<div class="sig">Authorized Signature:</div>' +
                    '</div></body></html>';
            };

            /* Customer proposal-view page builder (View Proposal) — image flow la */
            var apBuildProposalViewHtml = function() {
                var no = (document.getElementById('apPropNo') || {}).textContent || 'PRO-152';
                var subj = (document.getElementById('apPropSubject') || {}).textContent || 'New Proposal';
                var fromCo = (document.getElementById('apFromCompany') || {}).textContent || '';
                var fromAddr = (document.getElementById('apFromAddr') || {}).innerHTML || '';
                var toCo = (document.getElementById('apToName') || {}).textContent || '';
                var toAddr = (document.getElementById('apToAddr') || {}).innerHTML || '';
                var toContact = (document.getElementById('apToContact') || {}).innerHTML || '';
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var qDate = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                var till = new Date(d.getTime() + 7 * 86400000);
                var openTill = pad(till.getDate()) + '-' + pad(till.getMonth() + 1) + '-' + till.getFullYear();
                var shortName = fromCo.split(' ').slice(0, 1)[0] || 'ghrA';
                return '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Proposal ' + no + '</title><style>' +
                    '*{box-sizing:border-box;}' +
                    'body{font-family:"Segoe UI",Arial,Helvetica,sans-serif;color:#1f2937;margin:0;background:#eef1f5;padding:28px 20px;}' +
                    '.wrap{max-width:1060px;margin:0 auto;}' +
                    '.logo{width:130px;height:130px;border-radius:50%;background:#7c0f8e;color:#fff;display:flex;align-items:center;justify-content:center;font-size:30px;font-weight:800;letter-spacing:2px;margin:0 0 26px 60px;box-shadow:0 4px 14px rgba(124,15,142,.25);}' +
                    '.card{background:#fff;border-radius:14px;box-shadow:0 2px 12px rgba(15,23,42,.06);padding:26px 28px;margin-bottom:22px;}' +
                    '.head-row{display:flex;justify-content:space-between;align-items:flex-start;gap:24px;margin-bottom:20px;}' +
                    '.pno{font-size:22px;font-weight:800;margin:0 0 4px;}' +
                    '.psub{font-size:13px;color:#64748b;margin:0;}' +
                    '.hbtns{display:flex;gap:10px;flex-shrink:0;}' +
                    '.btn{border-radius:8px;padding:9px 16px;font-size:13px;font-weight:600;cursor:pointer;border:1px solid #d7dce3;background:#fff;color:#374151;display:inline-flex;align-items:center;gap:7px;transition:.15s;}' +
                    '.btn:hover{border-color:#94a3b8;}' +
                    '.btn.green{background:#16a34a;border-color:#16a34a;color:#fff;}' +
                    '.btn.green:hover{background:#15803d;}' +
                    '.btn.decline:hover{border-color:#dc2626;color:#dc2626;}' +
                    '.grid{display:grid;grid-template-columns:1.55fr 1fr;gap:26px;align-items:start;}' +
                    'table.items{width:100%;border-collapse:collapse;font-size:13px;}' +
                    'table.items th{background:#f1f5f9;color:#475569;font-weight:600;text-align:left;padding:10px 12px;border-bottom:1px solid #e2e8f0;white-space:nowrap;}' +
                    'table.items td{padding:12px;border-bottom:1px solid #f1f5f9;vertical-align:top;}' +
                    'tr.alt td{background:#f8fafc;}' +
                    'td.num,th.num{text-align:right;}' +
                    '.sumrow td{font-weight:700;background:#fff;}' +
                    '.sumlbl{text-align:right;font-weight:700;}' +
                    '.withwords{text-align:right;font-size:13px;color:#334155;padding:16px 4px 4px;}' +
                    '.dtabs{display:flex;gap:22px;border-bottom:1px solid #e2e8f0;margin-bottom:16px;}' +
                    '.dtab{padding:10px 2px;font-size:13.5px;font-weight:600;color:#64748b;cursor:pointer;border-bottom:2px solid transparent;display:flex;align-items:center;gap:7px;}' +
                    '.dtab.active{color:#2563eb;border-bottom-color:#2563eb;}' +
                    '.co-name{font-size:13.5px;font-weight:800;margin:0 0 10px;text-transform:uppercase;}' +
                    '.co-addr{font-size:12.5px;color:#475569;line-height:1.75;}' +
                    '.co-addr a{color:#2563eb;text-decoration:none;}' +
                    '.co-addr a:hover{text-decoration:underline;}' +
                    '.sec-title{font-size:13.5px;font-weight:800;margin:20px 0 8px;}' +
                    '.meta-tbl{width:100%;font-size:12.5px;border-collapse:collapse;margin-top:14px;}' +
                    '.meta-tbl td{padding:5px 0;}' +
                    '.meta-tbl td:first-child{color:#64748b;width:45%;}' +
                    '.meta-tbl td:last-child{font-weight:600;}' +
                    '.disc-empty{border:1px dashed #cbd5e1;border-radius:10px;padding:26px;text-align:center;color:#94a3b8;font-size:13px;}' +
                    '@media(max-width:860px){.grid{grid-template-columns:1fr;}.logo{margin-left:0;}.head-row{flex-direction:column;}}' +
                    '@media print{body{background:#fff;padding:0;}.hbtns,.dtabs{display:none;}}' +
                    '</style></head><body><div class="wrap">' +
                    '<div class="logo">' + shortName + '</div>' +
                    '<div class="card">' +
                    '<div class="head-row"><div><h1 class="pno"># ' + no + '</h1><p class="psub">' + subj + '</p></div>' +
                    '<div class="hbtns"><button class="btn" onclick="window.print()">\u2913 Download</button><button class="btn decline" onclick="alert(\'Proposal declined.\')">\u2715 Decline</button><button class="btn green" onclick="alert(\'Proposal accepted!\')">\u2713 Accept</button></div></div>' +
                    '<div class="grid"><div>' +
                    '<table class="items"><thead><tr><th>#</th><th>Item</th><th>HSN</th><th class="num">Qty</th><th class="num">Rate</th><th class="num">Dis</th><th class="num">GST</th><th class="num">Amount</th></tr></thead><tbody>' +
                    '<tr><td>1</td><td>Ashwagandha 3% - 1212</td><td></td><td class="num">10<br><span style="color:#94a3b8;font-size:11.5px;">Kilograms</span></td><td class="num">0.00</td><td class="num">0.00</td><td class="num">0</td><td class="num">0.00</td></tr>' +
                    '<tr class="alt"><td>2</td><td>Ashwagandha - 454545</td><td></td><td class="num">10<br><span style="color:#94a3b8;font-size:11.5px;">Kilograms</span></td><td class="num">0.00</td><td class="num">0.00</td><td class="num">0</td><td class="num">0.00</td></tr>' +
                    '</tbody><tfoot>' +
                    '<tr class="sumrow"><td colspan="6" class="sumlbl">Sub Total</td><td colspan="2" class="num">\u20b9 0.00</td></tr>' +
                    '<tr class="sumrow"><td colspan="6" class="sumlbl">Total</td><td colspan="2" class="num">\u20b9 0.00</td></tr>' +
                    '</tfoot></table>' +
                    '<div class="withwords">With words: Rupees Only</div>' +
                    '</div><div>' +
                    '<div class="dtabs"><span class="dtab active">\ud83d\udcc4 Summary</span><span class="dtab">\ud83d\udcac Discussion</span></div>' +
                    '<p class="co-name">' + fromCo + '</p>' +
                    '<div class="co-addr">' + fromAddr + '</div>' +
                    '<div class="sec-title">Proposal Information</div>' +
                    '<p class="co-name" style="margin-bottom:6px;">' + toCo + '</p>' +
                    '<div class="co-addr">' + toAddr + '<br>' + toContact + '</div>' +
                    '<table class="meta-tbl"><tr><td>Status</td><td>Sent</td></tr><tr><td>Date</td><td>' + qDate + '</td></tr><tr><td>Open Till</td><td>' + openTill + '</td></tr></table>' +
                    '</div></div></div>' +
                    '<div class="card"><div class="disc-empty">No discussion yet. Comments from the customer will appear here.</div></div>' +
                    '</div></body></html>';
            };

            /* Save + More dropdown actions (delegated — rendu menu layum work aagum) */
            document.addEventListener('click', function(e) {
                var item = e.target.closest('.ap-save-item');
                if (!item) return;
                e.preventDefault();
                var txt = item.textContent.trim();
                if (txt === 'Estimate') {
                    /* Estimate → direct modal open */
                    var esModal = document.getElementById('newEstimateModal');
                    if (esModal && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(esModal).show();
                    return;
                }
                if (txt === 'Invoice') {
                    /* Invoice → newInvoiceModal stacked open (Estimate maari; autoProposalModal hide aagadhu,
                       z-index 1085 > 1075, stackedModals list la backdrop fix irukku) */
                    var inInvModal = document.getElementById('newInvoiceModal');
                    if (inInvModal && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(inInvModal).show();
                    return;
                }
                if (txt === 'View Proposal') {
                    /* dropdown View Proposal → apProposalsTable eye button maari preview modal open
                       (apProposalPreviewModal z-index 1095 > autoProposalModal 1075 — stacked,
                       autoProposalModal close aagadhu; backdrop fix stackedModals list la irukku) */
                    var vpRec = apData.filter(function(x) {
                        return Number(x.id) === apState.selected;
                    })[0];
                    if (vpRec) fillApPreview(vpRec);
                    var pvModal = document.getElementById('apProposalPreviewModal');
                    if (pvModal && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(pvModal).show();
                    }
                    return;
                }
                if (txt === 'View PDF') {
                    var pdfWin2 = window.open('', '_blank');
                    if (pdfWin2) {
                        pdfWin2.document.write(apBuildQuotationHtml());
                        pdfWin2.document.close();
                    }
                    return;
                }
                if (txt === 'Attach File') {
                    var afm = document.getElementById('apAttachFileModal');
                    if (afm && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(afm).show();
                    return;
                }
                if (txt === 'Print') {
                    window.print();
                } else if (txt === 'View PDF in New Tab') {
                    var pdfWin = window.open('', '_blank');
                    if (pdfWin) {
                        pdfWin.document.write(apBuildQuotationHtml());
                        pdfWin.document.close();
                    }
                } else if (txt === 'Mark as Accepted') {
                    var chip = document.getElementById('apStatusChip');
                    if (chip) {
                        chip.textContent = 'Accepted';
                        chip.className = 'ld-prop-status accepted';
                    }
                } else if (txt === 'Mark as Declined') {
                    var chipD = document.getElementById('apStatusChip');
                    if (chipD) {
                        chipD.textContent = 'Rejected';
                        chipD.className = 'ld-prop-status rejected';
                    }
                } else if (txt === 'Mark as Sent') {
                    var chipS = document.getElementById('apStatusChip');
                    if (chipS) {
                        chipS.textContent = 'Sent';
                        chipS.className = 'ld-prop-status sent';
                    }
                } else if (txt === 'Delete') {
                    if (confirm('Delete this proposal?')) {
                        alert('\ud83d\uddd1 ' + document.getElementById('apPropNo').textContent + ' proposal deleted.');
                    }
                } else {
                    alert('\ud83d\udc4c ' + txt + ' — ' + document.getElementById('apPropNo').textContent + ' proposal.');
                }
            });

            /* New Invoice Submit → newInvoiceModal close; autoProposalModal-la green Convert dropdown button
               hide + INV-259 blue pill show (adhai click panna invoice view tab open) */
            var niSubmitBtn = document.getElementById('niSubmitBtn');
            if (niSubmitBtn) niSubmitBtn.addEventListener('click', function() {
                var nim = document.getElementById('newInvoiceModal');
                if (nim && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(nim).hide();

                var apModal = document.getElementById('autoProposalModal');
                if (!apModal) return;

                /* Green Convert dropdown button → remove (visually hide) */
                var convBtn = apModal.querySelector('.ap-actions-bar .ap-green-btn.dropdown-toggle');
                if (convBtn) convBtn.style.display = 'none';

                /* Blue INV-259 pill → show (first time la mattum create) */
                var invBtn = document.getElementById('apInvoiceNumBtn');
                if (!invBtn) {
                    invBtn = document.createElement('button');
                    invBtn.type = 'button';
                    invBtn.id = 'apInvoiceNumBtn';
                    invBtn.style.cssText = 'background:#2c6ce0;color:#fff;border:none;border-radius:8px;padding:7px 18px;font-size:13px;font-weight:800;letter-spacing:.4px;cursor:pointer;transition:.15s;font-family:inherit;';
                    invBtn.innerHTML = 'INV-259';
                    invBtn.addEventListener('click', function() {
                        /* INV-259 click → invoice view: first three tabs hide, Invoice tab show */
                        invBtn.style.display = 'none';
                        var hidden = 0;
                        apModal.querySelectorAll('.ap-tabs-row .ap-dtab[data-aptab]').forEach(function(t) {
                            if (t.classList.contains('ap-invoice-tab')) return;
                            if (hidden < 3) {
                                t.style.display = 'none';
                                hidden++;
                            }
                        });
                        var invTab = apModal.querySelector('.ap-invoice-tab');
                        if (invTab) invTab.style.display = '';
                        switchTab('invoice');
                    });
                }
                if (convBtn) {
                    convBtn.parentNode.insertBefore(invBtn, convBtn.nextSibling);
                } else if (!invBtn.isConnected) {
                    var bar = apModal.querySelector('.ap-actions-bar');
                    if (bar) bar.appendChild(invBtn);
                }
            });

            /* Proposals table (npProposalsTable) view icon -> apProposalPreviewModal show (reference design preview) */
            document.addEventListener('click', function(e) {
                var viewBtn = e.target.closest('.np-act-view');
                if (!viewBtn) return;
                e.preventDefault();
                var vid = Number(viewBtn.getAttribute('data-id'));
                var rec = (typeof proposalsTable !== 'undefined' && proposalsTable) ? proposalsTable.getData().filter(function(x) {
                    return Number(x.id) === vid;
                })[0] : null;
                if (rec) fillApPreview(rec);
                var pv = document.getElementById('apProposalPreviewModal');
                if (pv && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(pv).show();
                }
            });

            /* Payment button (invoice panel) → Record Payment modal */
            var rpBtn = document.getElementById('apInvPaymentBtn');
            if (rpBtn) rpBtn.addEventListener('click', function() {
                var rpm = document.getElementById('apRecordPaymentModal');
                if (rpm && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(rpm).show();
            });

            /* Record Payment submit — validate + toast + mark Paid */
            var rpSubmit = document.getElementById('rpSubmitBtn');
            if (rpSubmit) rpSubmit.addEventListener('click', function() {
                var amt = document.getElementById('rpAmount'),
                    dt = document.getElementById('rpDate'),
                    mode = document.getElementById('rpMode');
                if (!amt.value.trim()) {
                    amt.focus();
                    amt.style.borderColor = '#dc2626';
                    return;
                }
                if (!dt.value) {
                    dt.focus();
                    dt.style.borderColor = '#dc2626';
                    return;
                }
                if (!mode.value) {
                    mode.focus();
                    mode.style.borderColor = '#dc2626';
                    return;
                }
                var rpModalEl = document.getElementById('apRecordPaymentModal');
                if (rpModalEl && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(rpModalEl).hide();
                var chipEl = document.getElementById('apInvStatusChip');
                if (chipEl) {
                    chipEl.textContent = 'Paid';
                    chipEl.className = 'ld-prop-status accepted';
                }
                var dueLabel = document.getElementById('apInvAmountDue');
                if (dueLabel) dueLabel.textContent = '\u20b9 0.00';

                /* Payment button disable + pakathula View button add */
                var payBtn = document.getElementById('apInvPaymentBtn');
                if (payBtn) {
                    payBtn.disabled = true;
                    payBtn.style.opacity = '.55';
                    payBtn.style.cursor = 'not-allowed';
                    var pvBtn = document.getElementById('apInvPaymentViewBtn');
                    if (!pvBtn) {
                        pvBtn = document.createElement('button');
                        pvBtn.type = 'button';
                        pvBtn.id = 'apInvPaymentViewBtn';
                        pvBtn.className = 'ap-icon-btn';
                        pvBtn.title = 'View payment receipt';
                        pvBtn.innerHTML = '<i class="bi bi-eye"></i>';
                        pvBtn.addEventListener('click', function() {
                            /* Receipt modal la submitted values fill */
                            var amt = (document.getElementById('rpAmount') || {}).value || '393750.00';
                            var dtRaw = (document.getElementById('rpDate') || {}).value || '2026-09-23';
                            var mode = (document.getElementById('rpMode') || {}).value || 'Bank';
                            var txn = (document.getElementById('rpTxnId') || {}).value || '';
                            var agent = (document.getElementById('rpAgent') || {}).value || '';
                            var note = (document.getElementById('rpNote') || {}).value || '';
                            var acct = (document.getElementById('rpAccount') || {}).value || '';
                            var depo = (document.getElementById('rpDeposit') || {}).value || '';
                            var dtNice = dtRaw.split('-').reverse().join('-');
                            var amtFmt = '₹ ' + Number(String(amt).replace(/,/g, '') || 0).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                            document.getElementById('pvAmount').value = amt;
                            document.getElementById('pvDate').value = dtRaw;
                            document.getElementById('pvMode').value = mode;
                            document.getElementById('pvTxn').value = txn;
                            document.getElementById('pvAgent').value = agent;
                            document.getElementById('pvNote').value = note;
                            document.getElementById('pvAccount').value = acct;
                            document.getElementById('pvDeposit').value = depo;
                            document.getElementById('pvReceiptDate').textContent = dtNice;
                            document.getElementById('pvReceiptMode').textContent = mode;
                            document.getElementById('pvReceiptTotal').textContent = amtFmt;
                            document.getElementById('pvReceiptPaid').textContent = amtFmt;
                            var pvm = document.getElementById('apPaymentViewModal');
                            if (pvm && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(pvm).show();
                        });
                        payBtn.parentNode.insertBefore(pvBtn, payBtn.nextSibling);
                    }
                }
                alert('\u2705 Payment of \u20b9 ' + amt.value.trim() + ' recorded for INV-259.');
            });

            /* Send approval request (demo) */
            var apApproval = document.getElementById('apApprovalBtn');
            if (apApproval) apApproval.addEventListener('click', function() {
                var original = apApproval.innerHTML;
                apApproval.disabled = true;
                apApproval.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Sending...';
                setTimeout(function() {
                    apApproval.disabled = false;
                    apApproval.innerHTML = original;
                    alert('\u2705 Approval request sent for ' + document.getElementById('apPropNo').textContent + '.');
                }, 900);
            });

            selectProposal(apState.selected);
        })();
    });
</script>



<?php include 'footer.php'; ?>