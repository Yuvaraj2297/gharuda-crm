<?php
$currentPage = 'modal&offcanvas.php';
include 'header.php';
?>

<!-- =========================================================================
     PURE BOOTSTRAP 5 MODALS & OFFCANVAS SHOWCASE
     Zero Custom CSS - 100% Native Bootstrap 5.3 Classes
     ========================================================================= -->

<div class="container-fluid px-0">

    <!-- Top Navigation Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 bg-white p-4 rounded-4 border">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-1 rounded-pill">UI Elements</span>
                <span class="badge bg-success-subtle text-success fw-semibold px-3 py-1 rounded-pill">Pure Bootstrap</span>
            </div>
            <h1 class="h3 fw-bold text-dark mb-1">Modals & Offcanvas Drawers</h1>
            <p class="text-secondary small mb-0">Dialogs, popup confirmations, and responsive slide-out drawer panels.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="ui-library.php" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bi bi-grid-fill me-1"></i> Full UI Library
            </a>
        </div>
    </div>

    <!-- Modals Section -->
    <div class="card border rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">1. Native Bootstrap Modals</h6>
            <small class="text-secondary">Class: <code>.modal</code>, <code>.modal-dialog</code>, <code>.modal-sm</code>, <code>.modal-lg</code>, <code>.modal-fullscreen</code></small>
        </div>
        <div class="card-body p-4">
            <p class="text-secondary small mb-3">Click any button below to launch the respective modal window:</p>
            <div class="d-flex justify-content-start gap-3 align-items-center flex-wrap">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sampleModal">
                    <i class="bi bi-window me-1"></i> Standard Modal
                </button>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                    <i class="bi bi-window-dash me-1"></i> Small Modal (.modal-sm)
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#largeModal">
                    <i class="bi bi-aspect-ratio me-1"></i> Large Modal (.modal-lg)
                </button>
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                    <i class="bi bi-arrows-fullscreen me-1"></i> Fullscreen Modal
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">
                    <i class="bi bi-trash3 me-1"></i> Centered Confirm Modal
                </button>
            </div>
        </div>
    </div>

    <!-- Offcanvas Section -->
    <div class="card border rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">2. Bootstrap Offcanvas Side Drawers</h6>
            <small class="text-secondary">Class: <code>.offcanvas-start</code>, <code>.offcanvas-end</code>, <code>.offcanvas-top</code>, <code>.offcanvas-bottom</code></small>
        </div>
        <div class="card-body p-4">
            <p class="text-secondary small mb-3">Click to open offcanvas drawers from any edge of the viewport:</p>
            <div class="d-flex justify-content-start gap-3 align-items-center flex-wrap">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                    <i class="bi bi-layout-sidebar-reverse me-1"></i> Offcanvas Right
                </button>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
                    <i class="bi bi-layout-sidebar me-1"></i> Offcanvas Left
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop">
                    <i class="bi bi-layout-split me-1"></i> Offcanvas Top
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom">
                    <i class="bi bi-layout-text-window-reverse me-1"></i> Offcanvas Bottom
                </button>
            </div>
        </div>
    </div>

</div>

<!-- =========================================================================
     MODALS
     ========================================================================= -->

<!-- Standard Modal -->
<div class="modal fade" id="sampleModal" tabindex="-1" aria-labelledby="sampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold" id="sampleModalLabel">Standard Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <p class="text-secondary mb-0">This is a standard pure Bootstrap modal dialog with clean typography and zero custom CSS.</p>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Small Modal -->
<div class="modal fade" id="smallModal" tabindex="-1" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header border-bottom">
                <h6 class="modal-title fw-bold" id="smallModalLabel">Quick Action</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 text-secondary small">
                Are you sure you want to mark this task as complete?
            </div>
            <div class="modal-footer border-top p-2">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Large Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold" id="largeModalLabel">Customer Details Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Organization Name</label>
                        <input type="text" class="form-control" value="Gharuda Infotech Pvt Ltd" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Contact Email</label>
                        <input type="email" class="form-control" value="support@gharuda.com" readonly>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-semibold text-secondary">Address</label>
                        <textarea class="form-control" rows="2" readonly>Level 4, IT Tower, Anna Nagar, Chennai, Tamil Nadu - 600040</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Edit Customer</button>
            </div>
        </div>
    </div>
</div>

<!-- Fullscreen Modal -->
<div class="modal fade" id="fullscreenModal" tabindex="-1" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header border-bottom bg-light">
                <h5 class="modal-title fw-bold" id="fullscreenModalLabel">Fullscreen Analytics View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-1"></i> Fullscreen modal allows maximum screen real estate for complex data tables and analytics reports.
                </div>
                <p class="text-secondary">Full viewport canvas ready for large charts and spreadsheet views.</p>
            </div>
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close Fullscreen</button>
            </div>
        </div>
    </div>
</div>

<!-- Centered Confirm Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow rounded-3 text-center p-3">
            <div class="modal-body">
                <div class="text-danger mb-3 fs-1"><i class="bi bi-exclamation-triangle-fill"></i></div>
                <h5 class="fw-bold text-dark mb-2">Delete Lead?</h5>
                <p class="text-secondary small mb-4">This action will remove all attached logs and reminders.</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn-sm px-3" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================================
     OFFCANVAS DRAWERS
     ========================================================================= -->

<!-- Right Offcanvas -->
<div class="offcanvas offcanvas-end border-0 shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold" id="offcanvasRightLabel">Right Drawer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <p class="text-secondary small">Slide-out drawer on the right edge. Ideal for quick details, customer previews, and secondary workflows.</p>
    </div>
</div>

<!-- Left Offcanvas -->
<div class="offcanvas offcanvas-start border-0 shadow" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold" id="offcanvasLeftLabel">Left Drawer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <p class="text-secondary small">Slide-out drawer on the left edge. Great for navigation drawers and filter lists.</p>
    </div>
</div>

<!-- Top Offcanvas -->
<div class="offcanvas offcanvas-top border-0 shadow" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel" style="height: 200px;">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold" id="offcanvasTopLabel">Top Notification Banner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <p class="text-secondary small mb-0">System-wide announcement or top banner drawer.</p>
    </div>
</div>

<!-- Bottom Offcanvas -->
<div class="offcanvas offcanvas-bottom border-0 shadow" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" style="height: 220px;">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold" id="offcanvasBottomLabel">Bottom Action Sheet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <p class="text-secondary small mb-0">Mobile-friendly bottom sheet for quick CRM actions and batch operations.</p>
    </div>
</div>

<?php include 'footer.php'; ?>