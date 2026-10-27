<?php
$currentPage = 'input-block.php';
include 'header.php';
?>

<!-- =========================================================================
     PURE BOOTSTRAP 5 FORM CONTROLS & INPUT SHOWCASE
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
            <h1 class="h3 fw-bold text-dark mb-1">Form Controls & Inputs</h1>
            <p class="text-secondary small mb-0">Text inputs, selects, input groups, floating labels, checkboxes, and switches.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="ui-library.php" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bi bi-grid-fill me-1"></i> Full UI Library
            </a>
        </div>
    </div>

    <!-- Standard Form Inputs -->
    <div class="card border-0 rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fw-bold text-dark mb-0">1. Standard Text, Email & Password Controls</h6>
                <small class="text-secondary">Class: <code>.form-control</code>, <code>.form-label</code> &middot; Required Asterisk Rule: <strong>Label &lt;span class="text-danger"&gt;*&lt;/span&gt;</strong> (Next to label, never before)</small>
            </div>
            <span class="badge bg-primary-subtle text-primary fw-semibold px-2 py-1 rounded-pill">Standard Form</span>
        </div>
        <div class="card-body p-4">
            <div class="alert alert-light border small text-dark mb-4 py-2 px-3">
                <i class="bi bi-info-circle-fill text-primary me-2"></i>
                <strong>Label Asterisk Standard:</strong> Always place the required asterisk <code>*</code> <em>after / next to</em> the label text (e.g. <code>Full Name <span class="text-danger">*</span></code>). Never place it before the text.
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <label for="inputText" class="form-label small fw-semibold text-secondary">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputText" placeholder="e.g. Arun Kumar" required>
                </div>
                <div class="col-12 col-md-4">
                    <label for="inputEmail" class="form-label small fw-semibold text-secondary">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="name@company.com" required>
                </div>
                <div class="col-12 col-md-4">
                    <label for="inputPassword" class="form-label small fw-semibold text-secondary">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Enter secure password" required>
                </div>
                <div class="col-12 col-md-4">
                    <label for="inputSelect" class="form-label small fw-semibold text-secondary">Branch Location <span class="text-danger">*</span></label>
                    <select class="form-select" id="inputSelect" aria-label="Select option" required>
                        <option value="" selected>Choose branch location...</option>
                        <option value="1">Chennai - Anna Nagar</option>
                        <option value="2">Coimbatore - RS Puram</option>
                        <option value="3">Bengaluru - Indiranagar</option>
                    </select>
                </div>
                <div class="col-12 col-md-8">
                    <label for="textareaDesc" class="form-label small fw-semibold text-secondary">Notes &amp; Remarks (Optional)</label>
                    <textarea class="form-control" id="textareaDesc" rows="3" placeholder="Enter additional information..."></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Input Groups with Addons & Icons -->
    <div class="card border rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">2. Input Groups with Icons & Addons</h6>
            <small class="text-secondary">Class: <code>.input-group</code>, <code>.input-group-text</code></small>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-secondary">Username Prepend</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light">@</span>
                        <input type="text" class="form-control" placeholder="username">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-secondary">Currency Addon</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light">&#8377;</span>
                        <input type="number" class="form-control" placeholder="Amount">
                        <span class="input-group-text bg-light">.00</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-secondary">Search with Button</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search customer ID...">
                        <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Labels -->
    <div class="card border rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">3. Modern Floating Labels</h6>
            <small class="text-secondary">Class: <code>.form-floating</code></small>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                        <label for="floatingEmail">Email address</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select">
                            <option selected>Open selection menu</option>
                            <option value="1">Active Employee</option>
                            <option value="2">Probationary</option>
                            <option value="3">Notice Period</option>
                        </select>
                        <label for="floatingSelect">Employment Status</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Switches, Checkboxes & Radios -->
    <div class="card border rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom">
            <h6 class="fw-bold text-dark mb-0">4. Checkboxes, Radios & Switches</h6>
            <small class="text-secondary">Class: <code>.form-check</code>, <code>.form-switch</code></small>
        </div>
        <div class="card-body p-4">
            <div class="row g-4">
                <!-- Checkboxes -->
                <div class="col-md-4">
                    <h6 class="text-secondary small fw-bold text-uppercase mb-3">Checkboxes</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="check1">
                        <label class="form-check-label" for="check1">Default checkbox</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="check2" checked>
                        <label class="form-check-label" for="check2">Checked checkbox</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check3" disabled>
                        <label class="form-check-label text-muted" for="check3">Disabled checkbox</label>
                    </div>
                </div>

                <!-- Radios -->
                <div class="col-md-4">
                    <h6 class="text-secondary small fw-bold text-uppercase mb-3">Radio Buttons</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="demoRadio" id="radio1" checked>
                        <label class="form-check-label" for="radio1">Selected radio option</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="demoRadio" id="radio2">
                        <label class="form-check-label" for="radio2">Second radio option</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="demoRadio" id="radio3" disabled>
                        <label class="form-check-label text-muted" for="radio3">Disabled radio</label>
                    </div>
                </div>

                <!-- Switches -->
                <div class="col-md-4">
                    <h6 class="text-secondary small fw-bold text-uppercase mb-3">Form Switches</h6>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="switch1">
                        <label class="form-check-label" for="switch1">Default switch</label>
                    </div>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="switch2" checked>
                        <label class="form-check-label" for="switch2">Checked switch</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="switch3" disabled>
                        <label class="form-check-label text-muted" for="switch3">Disabled switch</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php'; ?>