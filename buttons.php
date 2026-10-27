<?php
$currentPage = 'buttons.php';
include 'header.php';
?>

<!-- =========================================================================
     PURE BOOTSTRAP 5 BUTTONS & BADGES SHOWCASE
     Zero Custom CSS - 100% Native Bootstrap 5.3 Classes
     ========================================================================= -->

<div class="container-fluid px-0">

    <!-- Top Navigation Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 bg-white p-4 rounded-3 border">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-1 rounded-pill">UI Standard</span>
                <span class="badge bg-secondary-subtle text-dark fw-semibold px-3 py-1 rounded-pill">Solid Colors &middot; Zero Shadows</span>
            </div>
            <h1 class="h3 fw-bold text-dark mb-1">Buttons &amp; Actions System</h1>
            <p class="text-secondary small mb-0">Single solid colors (no two-color gradient mixing), strict 2-5 palette enforcement, and zero drop shadows.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="ui-library.php" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bi bi-grid-fill me-1"></i> Full UI Library
            </a>
        </div>
    </div>

    <!-- Solid Buttons -->
    <div class="card border-0 rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fw-bold text-dark mb-0">1. Core 2&ndash;5 Color Action Buttons</h6>
                <small class="text-secondary">Class: <code>.btn .btn-[color]</code> &middot; Solid single-hue styling (two-color gradients disabled)</small>
            </div>
            <span class="badge bg-success-subtle text-success">Compliant</span>
        </div>
        <div class="card-body p-4">
            <div class="alert alert-light border small text-dark mb-3 py-2 px-3">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <strong>Single Color Rule:</strong> Buttons are styled in clean, solid brand tones. Two-color mixed gradients and glowing box shadows have been disabled for crisp, professional readability.
            </div>
            <div class="d-flex justify-content-start gap-2 align-items-center flex-wrap">
                <button type="button" class="btn btn-primary"><i class="bi bi-check2 me-1"></i> Primary (Brand Green)</button>
                <button type="button" class="btn btn-secondary">Secondary (Charcoal / Navy)</button>
                <button type="button" class="btn btn-danger"><i class="bi bi-trash3 me-1"></i> Danger (Delete / Reject)</button>
                <button type="button" class="btn btn-outline-primary">Outline Primary</button>
                <button type="button" class="btn btn-outline-secondary">Outline Secondary</button>
                <button type="button" class="btn btn-light border">Light Neutral</button>
                <button type="button" class="btn btn-link text-decoration-none">Text Link</button>
            </div>
        </div>
    </div>

    <!-- Outline Buttons -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">Outline Buttons</h6>
            <small class="text-secondary">Class: <code>.btn .btn-outline-[color]</code></small>
        </div>
        <div class="card-body p-4">
            <div class="d-flex justify-content-start gap-2 align-items-center flex-wrap">
                <button type="button" class="btn btn-outline-primary">Primary</button>
                <button type="button" class="btn btn-outline-secondary">Secondary</button>
                <button type="button" class="btn btn-outline-success">Success</button>
                <button type="button" class="btn btn-outline-danger">Danger</button>
                <button type="button" class="btn btn-outline-warning">Warning</button>
                <button type="button" class="btn btn-outline-info">Info</button>
                <button type="button" class="btn btn-outline-dark">Dark</button>
            </div>
        </div>
    </div>

    <!-- Button Sizes & Pill Shapes -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">Button Sizes & Pill Radii</h6>
            <small class="text-secondary">Classes: <code>.btn-lg</code>, <code>.btn-sm</code>, <code>.rounded-pill</code></small>
        </div>
        <div class="card-body p-4">
            <div class="d-flex justify-content-start gap-3 align-items-center flex-wrap mb-4">
                <button type="button" class="btn btn-primary btn-lg">Large Button (.btn-lg)</button>
                <button type="button" class="btn btn-primary">Standard Button</button>
                <button type="button" class="btn btn-primary btn-sm">Small Button (.btn-sm)</button>
            </div>
            <div class="d-flex justify-content-start gap-3 align-items-center flex-wrap">
                <button type="button" class="btn btn-primary rounded-pill px-4">Primary Pill</button>
                <button type="button" class="btn btn-outline-success rounded-pill px-4">Outline Pill</button>
                <button type="button" class="btn btn-danger rounded-pill px-4">Danger Pill</button>
            </div>
        </div>
    </div>

    <!-- Button Groups & Split Dropdowns -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">Button Groups & Split Dropdowns</h6>
            <small class="text-secondary">Class: <code>.btn-group</code>, <code>.dropdown-toggle-split</code></small>
        </div>
        <div class="card-body p-4">
            <div class="d-flex justify-content-start gap-3 align-items-center flex-wrap">
                <!-- Group 1 -->
                <div class="btn-group" role="group" aria-label="View toggle">
                    <button type="button" class="btn btn-outline-secondary active"><i class="bi bi-list-task me-1"></i> List</button>
                    <button type="button" class="btn btn-outline-secondary"><i class="bi bi-kanban me-1"></i> Board</button>
                    <button type="button" class="btn btn-outline-secondary"><i class="bi bi-calendar3 me-1"></i> Calendar</button>
                </div>

                <!-- Split Dropdown -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary"><i class="bi bi-cloud-arrow-down me-1"></i> Export Data</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-excel text-success me-2"></i>Export Excel</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Export PDF</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-text text-primary me-2"></i>Export CSV</a></li>
                    </ul>
                </div>

                <!-- Icon Action Group -->
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-outline-secondary" title="View"><i class="bi bi-eye"></i></button>
                    <button type="button" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button type="button" class="btn btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Disabled & Loading States -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">States: Disabled & Loading Spinners</h6>
            <small class="text-secondary">Class: <code>disabled</code>, <code>.spinner-border-sm</code></small>
        </div>
        <div class="card-body p-4">
            <div class="d-flex justify-content-start gap-3 align-items-center flex-wrap">
                <button type="button" class="btn btn-primary" disabled>Disabled Primary</button>
                <button type="button" class="btn btn-outline-secondary" disabled>Disabled Outline</button>
                <button type="button" class="btn btn-primary" disabled>
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    Processing...
                </button>
                <button type="button" class="btn btn-outline-primary" disabled>
                    <span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>
                    Syncing...
                </button>
            </div>
        </div>
    </div>

    <!-- Badges & Status Pills -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">CRM Status Badges & Pills</h6>
            <small class="text-secondary">Class: <code>.badge .rounded-pill .bg-*-subtle .text-*</code></small>
        </div>
        <div class="card-body p-4">
            <label class="form-label text-secondary small fw-semibold text-uppercase d-block mb-3">Modern Subtle Status Pills</label>
            <div class="d-flex justify-content-start gap-2 align-items-center flex-wrap mb-4">
                <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 fw-semibold">
                    <i class="bi bi-check-circle-fill me-1"></i> Active / Paid
                </span>
                <span class="badge rounded-pill bg-danger-subtle text-danger px-3 py-2 fw-semibold">
                    <i class="bi bi-x-circle-fill me-1"></i> Overdue / Inactive
                </span>
                <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis px-3 py-2 fw-semibold">
                    <i class="bi bi-clock-fill me-1"></i> Pending Approval
                </span>
                <span class="badge rounded-pill bg-info-subtle text-info px-3 py-2 fw-semibold">
                    <i class="bi bi-info-circle-fill me-1"></i> In Discussion
                </span>
                <span class="badge rounded-pill bg-primary-subtle text-primary px-3 py-2 fw-semibold">
                    <i class="bi bi-star-fill me-1"></i> High Priority
                </span>
            </div>

            <label class="form-label text-secondary small fw-semibold text-uppercase d-block mb-3">Solid Classic Badges</label>
            <div class="d-flex justify-content-start gap-2 align-items-center flex-wrap">
                <span class="badge bg-primary">Primary</span>
                <span class="badge bg-secondary">Secondary</span>
                <span class="badge bg-info text-white">Info</span>
                <span class="badge bg-warning text-dark">Warning</span>
                <span class="badge bg-danger">Danger</span>
                <span class="badge bg-success">Success</span>
                <span class="badge bg-dark">Dark</span>
                <span class="badge bg-light text-dark border">Light Border</span>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php'; ?>