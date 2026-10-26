<?php
$currentPage = 'ui-library.php';
include 'header.php';
?>

<!-- =========================================================================
     PURE BOOTSTRAP 5 UI COMPONENT LIBRARY - GHARUDA CRM
     Clean, Standardized Design System & Developer Reference
     Zero Custom CSS Overrides - 100% Native Bootstrap 5.3 Utilities
     ========================================================================= -->

<div class="container-fluid px-0">

    <!-- Hero Header Card -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 bg-white">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-1 rounded-pill">
                            <i class="bi bi-bootstrap-fill me-1"></i> Bootstrap v5.3 Standard
                        </span>
                        <span class="badge bg-success-subtle text-success fw-semibold px-3 py-1 rounded-pill">
                            <i class="bi bi-check2-circle me-1"></i> Zero Custom CSS
                        </span>
                    </div>
                    <h1 class="h3 fw-bold text-dark mb-1">Gharuda CRM &middot; Pure Bootstrap UI Library</h1>
                    <p class="text-secondary small mb-0">
                        Production-ready UI building blocks crafted exclusively with native Bootstrap 5 utility classes. Click <strong>&ldquo;View Code&rdquo;</strong> on any component to copy clean, standard markup.
                    </p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="toggleAllCode()">
                        <i class="bi bi-code-slash me-1"></i> Toggle All Code
                    </button>
                    <a href="table.php" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                        <i class="bi bi-table me-1"></i> Pure Table Demo
                    </a>
                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#docsModal">
                        <i class="bi bi-book-half me-1"></i> Standards Guide
                    </button>
                </div>
            </div>
        </div>

        <!-- Sticky In-Page Navigation Bar -->
        <div class="card-footer bg-light-subtle border-top px-4 py-2 sticky-top" style="top: 70px; z-index: 1020;">
            <div class="d-flex align-items-center gap-2 overflow-auto py-1 text-nowrap">
                <span class="text-secondary small fw-bold text-uppercase me-2"><i class="bi bi-compass me-1"></i>Jump:</span>
                <a href="#sec-metrics" class="btn btn-sm btn-light border rounded-pill px-3">Metrics &amp; KPIs</a>
                <a href="#sec-buttons" class="btn btn-sm btn-light border rounded-pill px-3">Buttons &amp; Badges</a>
                <a href="#sec-forms" class="btn btn-sm btn-light border rounded-pill px-3">Forms &amp; Inputs</a>
                <a href="#sec-tables" class="btn btn-sm btn-light border rounded-pill px-3">Tables &amp; Grids</a>
                <a href="#sec-modals" class="btn btn-sm btn-light border rounded-pill px-3">Modals &amp; Drawers</a>
                <a href="#sec-alerts" class="btn btn-sm btn-light border rounded-pill px-3">Alerts &amp; Feedback</a>
                <a href="#sec-navs" class="btn btn-sm btn-light border rounded-pill px-3">Navs &amp; Accordions</a>
            </div>
        </div>
    </div>

    <!-- ===================================================================== -->
    <!-- SECTION 1: METRICS & STAT CARDS                                       -->
    <!-- ===================================================================== -->
    <div class="mb-4" id="sec-metrics">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-speedometer2 text-primary me-2"></i>1. CRM Metric &amp; KPI Cards</h5>
                <small class="text-secondary">Responsive stat cards using native grid, badges, and progress bars</small>
            </div>
            <button class="btn btn-outline-secondary btn-sm rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#code-metrics">
                <i class="bi bi-code-slash me-1"></i> View Code
            </button>
        </div>

        <!-- Metric Grid -->
        <div class="row g-3 mb-3">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 h-100 bg-white">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-secondary small fw-medium">Total Leads</span>
                            <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-people-fill fs-5"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline gap-2">
                            <h3 class="fw-bold mb-0 text-dark">4,289</h3>
                            <span class="badge bg-success-subtle text-success small rounded-pill">+14.8%</span>
                        </div>
                        <div class="progress mt-3" style="height: 5px;">
                            <div class="progress-bar bg-primary" style="width: 72%;"></div>
                        </div>
                        <span class="text-muted small d-block mt-2">vs. 3,736 last month</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 h-100 bg-white">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-secondary small fw-medium">Closed Won</span>
                            <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-currency-rupee fs-5"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline gap-2">
                            <h3 class="fw-bold mb-0 text-dark">&#8377; 84.50 L</h3>
                            <span class="badge bg-success-subtle text-success small rounded-pill">+22.4%</span>
                        </div>
                        <div class="progress mt-3" style="height: 5px;">
                            <div class="progress-bar bg-success" style="width: 85%;"></div>
                        </div>
                        <span class="text-muted small d-block mt-2">Target: &#8377; 1.00 Cr (85%)</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 h-100 bg-white">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-secondary small fw-medium">Appointments</span>
                            <div class="bg-info-subtle text-info rounded-3 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-calendar2-event-fill fs-5"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline gap-2">
                            <h3 class="fw-bold mb-0 text-dark">184</h3>
                            <span class="badge bg-info-subtle text-info small rounded-pill">18 Today</span>
                        </div>
                        <div class="progress mt-3" style="height: 5px;">
                            <div class="progress-bar bg-info" style="width: 60%;"></div>
                        </div>
                        <span class="text-muted small d-block mt-2">12 scheduled afternoon</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 h-100 bg-white">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="text-secondary small fw-medium">Pending Tickets</span>
                            <div class="bg-warning-subtle text-warning-emphasis rounded-3 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                <i class="bi bi-ticket-perforated-fill fs-5"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline gap-2">
                            <h3 class="fw-bold mb-0 text-dark">27</h3>
                            <span class="badge bg-danger-subtle text-danger small rounded-pill">4 Overdue</span>
                        </div>
                        <div class="progress mt-3" style="height: 5px;">
                            <div class="progress-bar bg-warning" style="width: 45%;"></div>
                        </div>
                        <span class="text-muted small d-block mt-2">Avg resolution: 3.2 hrs</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Collapsible Code Block -->
        <div class="collapse" id="code-metrics">
            <div class="card border-0 shadow-sm rounded-3 bg-dark text-light p-3 position-relative mb-3">
                <button class="btn btn-outline-light btn-sm position-absolute top-0 end-0 m-3" onclick="copySnippet('snippet-metrics')">
                    <i class="bi bi-clipboard me-1"></i> Copy
                </button>
                <pre class="m-0 small text-light" id="snippet-metrics"><code>&lt;div class="card border-0 shadow-sm rounded-3 bg-white"&gt;
    &lt;div class="card-body p-3"&gt;
        &lt;div class="d-flex align-items-center justify-content-between mb-2"&gt;
            &lt;span class="text-secondary small fw-medium"&gt;Total Leads&lt;/span&gt;
            &lt;div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;"&gt;
                &lt;i class="bi bi-people-fill fs-5"&gt;&lt;/i&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="d-flex align-items-baseline gap-2"&gt;
            &lt;h3 class="fw-bold mb-0 text-dark"&gt;4,289&lt;/h3&gt;
            &lt;span class="badge bg-success-subtle text-success small rounded-pill"&gt;+14.8%&lt;/span&gt;
        &lt;/div&gt;
        &lt;div class="progress mt-3" style="height: 5px;"&gt;
            &lt;div class="progress-bar bg-primary" style="width: 72%;"&gt;&lt;/div&gt;
        &lt;/div&gt;
        &lt;span class="text-muted small d-block mt-2"&gt;vs. 3,736 last month&lt;/span&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- ===================================================================== -->
    <!-- SECTION 2: BUTTONS & BADGES                                           -->
    <!-- ===================================================================== -->
    <div class="mb-4" id="sec-buttons">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-menu-button-wide text-primary me-2"></i>2. Buttons, Badges &amp; Status Indicators</h5>
                <small class="text-secondary">Solid, outline, pills, loading states, and modern subtle status badges</small>
            </div>
            <button class="btn btn-outline-secondary btn-sm rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#code-buttons">
                <i class="bi bi-code-slash me-1"></i> View Code
            </button>
        </div>

        <div class="card border-0 shadow-sm rounded-3 bg-white p-4 mb-3">
            <!-- Buttons Section -->
            <label class="form-label text-secondary small fw-bold text-uppercase d-block mb-2">Semantic Button Styles</label>
            <div class="d-flex gap-2 flex-wrap mb-4">
                <button type="button" class="btn btn-primary"><i class="bi bi-check2 me-1"></i> Primary</button>
                <button type="button" class="btn btn-secondary">Secondary</button>
                <button type="button" class="btn btn-success"><i class="bi bi-plus-lg me-1"></i> Success</button>
                <button type="button" class="btn btn-danger"><i class="bi bi-trash3 me-1"></i> Danger</button>
                <button type="button" class="btn btn-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Warning</button>
                <button type="button" class="btn btn-info text-white"><i class="bi bi-info-circle me-1"></i> Info</button>
                <button type="button" class="btn btn-dark">Dark</button>
                <button type="button" class="btn btn-light border">Light</button>
                <button type="button" class="btn btn-link text-decoration-none">Link Button</button>
            </div>

            <!-- Outline & Sizes -->
            <label class="form-label text-secondary small fw-bold text-uppercase d-block mb-2">Outline, Sizes &amp; Pills</label>
            <div class="d-flex gap-2 align-items-center flex-wrap mb-4">
                <button type="button" class="btn btn-outline-primary btn-sm"><i class="bi bi-save me-1"></i> Small Outline</button>
                <button type="button" class="btn btn-outline-secondary">Standard Outline</button>
                <button type="button" class="btn btn-outline-success btn-lg">Large Outline</button>
                <button type="button" class="btn btn-primary rounded-pill px-4">Primary Pill</button>
                <button type="button" class="btn btn-outline-danger rounded-pill px-4">Danger Pill</button>
                <button type="button" class="btn btn-primary" disabled>
                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    Loading...
                </button>
            </div>

            <!-- Button Groups -->
            <label class="form-label text-secondary small fw-bold text-uppercase d-block mb-2">Button Groups &amp; Dropdowns</label>
            <div class="d-flex gap-3 align-items-center flex-wrap mb-4">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-secondary active">Day</button>
                    <button type="button" class="btn btn-outline-secondary">Week</button>
                    <button type="button" class="btn btn-outline-secondary">Month</button>
                </div>

                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-down me-1"></i> Export</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-excel text-success me-2"></i>Export Excel</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Export PDF</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-text text-primary me-2"></i>Export CSV</a></li>
                    </ul>
                </div>

                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-outline-secondary" title="Edit"><i class="bi bi-pencil"></i></button>
                    <button type="button" class="btn btn-outline-secondary" title="Copy"><i class="bi bi-copy"></i></button>
                    <button type="button" class="btn btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
                </div>
            </div>

            <!-- Status Badges -->
            <label class="form-label text-secondary small fw-bold text-uppercase d-block mb-2">Modern Subtle Status Pills (Recommended)</label>
            <div class="d-flex gap-2 flex-wrap align-items-center mb-3">
                <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 fw-semibold">
                    <i class="bi bi-check-circle-fill me-1"></i> Active / Approved
                </span>
                <span class="badge rounded-pill bg-danger-subtle text-danger px-3 py-2 fw-semibold">
                    <i class="bi bi-x-circle-fill me-1"></i> Inactive / Rejected
                </span>
                <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis px-3 py-2 fw-semibold">
                    <i class="bi bi-clock-fill me-1"></i> Pending Review
                </span>
                <span class="badge rounded-pill bg-info-subtle text-info px-3 py-2 fw-semibold">
                    <i class="bi bi-info-circle-fill me-1"></i> In Progress
                </span>
                <span class="badge rounded-pill bg-primary-subtle text-primary px-3 py-2 fw-semibold">
                    <i class="bi bi-star-fill me-1"></i> High Priority
                </span>
                <span class="badge rounded-pill bg-secondary-subtle text-secondary px-3 py-2 fw-semibold">
                    <i class="bi bi-archive-fill me-1"></i> Archived
                </span>
                <span class="badge bg-light text-dark border py-2 px-3">
                    ID: <code class="text-primary fw-bold">#LEAD-9081</code>
                </span>
            </div>
        </div>

        <div class="collapse" id="code-buttons">
            <div class="card border-0 shadow-sm rounded-3 bg-dark text-light p-3 position-relative mb-3">
                <button class="btn btn-outline-light btn-sm position-absolute top-0 end-0 m-3" onclick="copySnippet('snippet-buttons')">
                    <i class="bi bi-clipboard me-1"></i> Copy
                </button>
                <pre class="m-0 small text-light" id="snippet-buttons"><code>&lt;!-- Pure Bootstrap Button Styles --&gt;
&lt;button class="btn btn-primary"&gt;Primary&lt;/button&gt;
&lt;button class="btn btn-outline-secondary btn-sm"&gt;Small Outline&lt;/button&gt;
&lt;button class="btn btn-success rounded-pill px-4"&gt;Success Pill&lt;/button&gt;

&lt;!-- Modern Subtle Status Pills --&gt;
&lt;span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 fw-semibold"&gt;
    &lt;i class="bi bi-check-circle-fill me-1"&gt;&lt;/i&gt; Active / Approved
&lt;/span&gt;
&lt;span class="badge rounded-pill bg-warning-subtle text-warning-emphasis px-3 py-2 fw-semibold"&gt;
    &lt;i class="bi bi-clock-fill me-1"&gt;&lt;/i&gt; Pending Review
&lt;/span&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- ===================================================================== -->
    <!-- SECTION 3: FORMS & INPUTS                                             -->
    <!-- ===================================================================== -->
    <div class="mb-4" id="sec-forms">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-input-cursor-text text-primary me-2"></i>3. Form Controls, Floating Labels &amp; Switches</h5>
                <small class="text-secondary">Clean input groups, select dropdowns, floating labels, validation states</small>
            </div>
            <button class="btn btn-outline-secondary btn-sm rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#code-forms">
                <i class="bi bi-code-slash me-1"></i> View Code
            </button>
        </div>

        <div class="card border-0 shadow-sm rounded-3 bg-white p-4 mb-3">
            <form class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-secondary">Contact Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Rahul Sharma" value="Rahul Sharma">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-secondary">Email Prepend</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="rahul@gharuda.com" value="rahul@gharuda.com">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-secondary">Currency Addon</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light">&#8377;</span>
                        <input type="number" class="form-control" placeholder="0.00" value="450000">
                        <span class="input-group-text bg-light">.00</span>
                    </div>
                </div>

                <!-- Floating Labels -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingCompany" placeholder="Company" value="Gharuda Technologies">
                        <label for="floatingCompany">Company / Organization</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="floatingLeadStage">
                            <option value="new">New Opportunity</option>
                            <option value="contacted" selected>Contacted / Qualified</option>
                            <option value="closed">Closed Won</option>
                        </select>
                        <label for="floatingLeadStage">Lead Stage</label>
                    </div>
                </div>

                <!-- Date Picker, Time Picker & Select2 -->
                <div class="col-md-3">
                    <label class="form-label small fw-semibold text-secondary">Date Picker (Calendar) <span class="text-danger">*</span></label>
                    <div class="date-picker">
                        <input type="text" class="form-control date-input" placeholder="DD-MM-YYYY" value="26-10-2026" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold text-secondary">Time Picker</label>
                    <div class="time-picker">
                        <input type="text" class="form-control time-input" placeholder="HH:MM" value="10:30" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold text-secondary">Select2 Single (Color Dot)</label>
                    <select class="form-select select2">
                        <option value="">Choose an option...</option>
                        <option value="lead1" selected data-color="#16a34a">SD - Direct Visit - Lead</option>
                        <option value="lead2" data-color="#2563eb">DEV - Customer Visit</option>
                        <option value="lead3" data-color="#f59e0b">SD - Online Demo</option>
                        <option value="lead4" data-color="#dc2626">Urgent High Priority</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold text-secondary">Select2 Multiple (Tags)</label>
                    <select class="form-select select2" multiple>
                        <option value="tag1" selected>Enterprise</option>
                        <option value="tag2" selected>Software</option>
                        <option value="tag3">Renewal</option>
                        <option value="tag4">Consulting</option>
                    </select>
                </div>

                <!-- Switches & Checks -->
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-secondary d-block">Switches</label>
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="swEmail" checked>
                        <label class="form-check-label" for="swEmail">Email Notifications</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="sw2FA">
                        <label class="form-check-label" for="sw2FA">Two-Factor Authentication</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-secondary d-block">Checkboxes &amp; Radios</label>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="chkWelcome" checked>
                        <label class="form-check-label" for="chkWelcome">Send onboarding welcome email</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="custTypeRad" id="radB2B" checked>
                        <label class="form-check-label" for="radB2B">Corporate B2B</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="custTypeRad" id="radB2C">
                        <label class="form-check-label" for="radB2C">Individual B2C</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-semibold text-secondary d-block">Validation Feedback</label>
                    <input type="text" class="form-control is-valid mb-1" value="33AAAAA0000A1Z5">
                    <div class="valid-feedback">Verified active GSTIN!</div>
                </div>
            </form>
        </div>

        <div class="collapse" id="code-forms">
            <div class="card border-0 shadow-sm rounded-3 bg-dark text-light p-3 position-relative mb-3">
                <button class="btn btn-outline-light btn-sm position-absolute top-0 end-0 m-3" onclick="copySnippet('snippet-forms')">
                    <i class="bi bi-clipboard me-1"></i> Copy
                </button>
                <pre class="m-0 small text-light" id="snippet-forms"><code>&lt;!-- Pure Bootstrap Input Group --&gt;
&lt;div class="input-group"&gt;
    &lt;span class="input-group-text bg-light"&gt;&lt;i class="bi bi-envelope"&gt;&lt;/i&gt;&lt;/span&gt;
    &lt;input type="email" class="form-control" placeholder="name@company.com"&gt;
&lt;/div&gt;

&lt;!-- Floating Label --&gt;
&lt;div class="form-floating"&gt;
    &lt;input type="text" class="form-control" id="floatingCompany" placeholder="Company"&gt;
    &lt;label for="floatingCompany"&gt;Company / Organization&lt;/label&gt;
&lt;/div&gt;

&lt;!-- Switch --&gt;
&lt;div class="form-check form-switch"&gt;
    &lt;input class="form-check-input" type="checkbox" role="switch" id="swEmail" checked&gt;
    &lt;label class="form-check-label" for="swEmail"&gt;Email Notifications&lt;/label&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- ===================================================================== -->
    <!-- SECTION 4: TABLES & DATA GRIDS                                        -->
    <!-- ===================================================================== -->
    <div class="mb-4" id="sec-tables">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-table text-primary me-2"></i>4. Data Tables &amp; Grids</h5>
                <small class="text-secondary">Clean table container, avatar headers, badge status, action dropdown, pagination</small>
            </div>
            <button class="btn btn-outline-secondary btn-sm rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#code-tables">
                <i class="bi bi-code-slash me-1"></i> View Code
            </button>
        </div>

        <div class="card border-0 shadow-sm rounded-3 bg-white mb-3">
            <!-- Header Toolbar -->
            <div class="card-header bg-white py-3 border-bottom d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="fw-bold text-dark">Active CRM Directory</span>
                    <span class="badge bg-secondary-subtle text-secondary rounded-pill">128 Total</span>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="input-group input-group-sm" style="max-width: 220px;">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" placeholder="Search records...">
                    </div>
                    <select class="form-select form-select-sm" style="width: auto;">
                        <option selected>All Roles</option>
                        <option>Engineering</option>
                        <option>HR</option>
                        <option>Sales</option>
                    </select>
                    <button type="button" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i> Add Record
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase text-secondary small fw-bold">
                        <tr>
                            <th scope="col" style="width: 40px;" class="text-center">
                                <input class="form-check-input" type="checkbox" id="checkAllDemo">
                            </th>
                            <th scope="col">Contact</th>
                            <th scope="col">Role &amp; Department</th>
                            <th scope="col">Status</th>
                            <th scope="col">Joined</th>
                            <th scope="col" class="text-end">Value</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="./assets/img/profile-1.jpg" class="rounded-circle object-fit-cover shadow-xs" width="36" height="36" alt="">
                                    <div>
                                        <div class="fw-semibold text-dark">Praveena Sundaram</div>
                                        <small class="text-secondary">praveena@gharuda.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-medium text-dark small">Senior HR Specialist</div>
                                <div class="text-secondary small">People Operations</div>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 fw-semibold">
                                    <i class="bi bi-check-circle-fill me-1"></i> Active
                                </span>
                            </td>
                            <td class="text-secondary small">04-Aug-2024</td>
                            <td class="text-end fw-semibold text-dark">&#8377; 65,000</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 30px; height: 30px;">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-eye text-primary me-2"></i>View</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil text-secondary me-2"></i>Edit</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="text-center"><input class="form-check-input" type="checkbox"></td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="./assets/img/profile-2.jpg" class="rounded-circle object-fit-cover" width="36" height="36" alt="">
                                    <div>
                                        <div class="fw-semibold text-dark">Keerthana V.</div>
                                        <small class="text-secondary">keerthana@gharuda.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-medium text-dark small">Lead Developer</div>
                                <div class="text-secondary small">Engineering</div>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis px-3 py-2 fw-semibold">
                                    <i class="bi bi-clock-fill me-1"></i> On Leave
                                </span>
                            </td>
                            <td class="text-secondary small">12-Jan-2023</td>
                            <td class="text-end fw-semibold text-dark">&#8377; 1,20,000</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 30px; height: 30px;">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-eye text-primary me-2"></i>View</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil text-secondary me-2"></i>Edit</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="card-footer bg-white py-3 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
                <span class="text-secondary small">Showing 1 to 2 of 128 entries</span>
                <nav aria-label="Table navigation">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="collapse" id="code-tables">
            <div class="card border-0 shadow-sm rounded-3 bg-dark text-light p-3 position-relative mb-3">
                <button class="btn btn-outline-light btn-sm position-absolute top-0 end-0 m-3" onclick="copySnippet('snippet-tables')">
                    <i class="bi bi-clipboard me-1"></i> Copy
                </button>
                <pre class="m-0 small text-light" id="snippet-tables"><code>&lt;div class="table-responsive"&gt;
    &lt;table class="table table-hover align-middle mb-0"&gt;
        &lt;thead class="table-light text-uppercase text-secondary small fw-bold"&gt;
            &lt;tr&gt;
                &lt;th&gt;Contact&lt;/th&gt;
                &lt;th&gt;Status&lt;/th&gt;
                &lt;th class="text-end"&gt;Value&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;tr&gt;
                &lt;td&gt;
                    &lt;div class="d-flex align-items-center gap-2"&gt;
                        &lt;img src="avatar.jpg" class="rounded-circle object-fit-cover" width="34" height="34"&gt;
                        &lt;span class="fw-semibold text-dark"&gt;Praveena&lt;/span&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;
                    &lt;span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 fw-semibold"&gt;Active&lt;/span&gt;
                &lt;/td&gt;
                &lt;td class="text-end fw-semibold text-dark"&gt;&#8377; 65,000&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- ===================================================================== -->
    <!-- SECTION 5: MODALS & OFFCANVAS                                         -->
    <!-- ===================================================================== -->
    <div class="mb-4" id="sec-modals">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-window-stack text-primary me-2"></i>5. Modals &amp; Offcanvas Side Drawers</h5>
                <small class="text-secondary">Standard dialogs, centered confirmations, scrollable text, and slide-out drawers</small>
            </div>
            <button class="btn btn-outline-secondary btn-sm rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#code-modals">
                <i class="bi bi-code-slash me-1"></i> View Code
            </button>
        </div>

        <div class="card border-0 shadow-sm rounded-3 bg-white p-4 mb-3">
            <label class="form-label text-secondary small fw-bold text-uppercase d-block mb-3">Live Modal Triggers</label>
            <div class="d-flex gap-2 flex-wrap mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalStandard">
                    <i class="bi bi-window me-1"></i> Standard Modal
                </button>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalLeadForm">
                    <i class="bi bi-person-plus me-1"></i> Centered Form Modal
                </button>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm">
                    <i class="bi bi-trash3 me-1"></i> Delete Confirm Modal
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalScrollable">
                    <i class="bi bi-arrows-vertical me-1"></i> Scrollable Modal
                </button>
            </div>

            <label class="form-label text-secondary small fw-bold text-uppercase d-block mb-3">Live Offcanvas Drawer Triggers</label>
            <div class="d-flex gap-2 flex-wrap">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#drawerCustomer">
                    <i class="bi bi-layout-sidebar-reverse me-1"></i> Right Customer Drawer
                </button>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="offcanvas" data-bs-target="#drawerFilter">
                    <i class="bi bi-funnel me-1"></i> Right Filter Drawer
                </button>
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="offcanvas" data-bs-target="#drawerBottom">
                    <i class="bi bi-layout-split me-1"></i> Bottom Action Sheet
                </button>
            </div>
        </div>

        <div class="collapse" id="code-modals">
            <div class="card border-0 shadow-sm rounded-3 bg-dark text-light p-3 position-relative mb-3">
                <button class="btn btn-outline-light btn-sm position-absolute top-0 end-0 m-3" onclick="copySnippet('snippet-modals')">
                    <i class="bi bi-clipboard me-1"></i> Copy
                </button>
                <pre class="m-0 small text-light" id="snippet-modals"><code>&lt;!-- Centered Modal --&gt;
&lt;div class="modal fade" id="modalExample" tabindex="-1"&gt;
    &lt;div class="modal-dialog modal-dialog-centered"&gt;
        &lt;div class="modal-content border-0 shadow rounded-3"&gt;
            &lt;div class="modal-header border-bottom"&gt;
                &lt;h5 class="modal-title fw-bold"&gt;Title&lt;/h5&gt;
                &lt;button type="button" class="btn-close" data-bs-dismiss="modal"&gt;&lt;/button&gt;
            &lt;/div&gt;
            &lt;div class="modal-body p-4"&gt;Content goes here...&lt;/div&gt;
            &lt;div class="modal-footer border-top"&gt;
                &lt;button class="btn btn-secondary" data-bs-dismiss="modal"&gt;Cancel&lt;/button&gt;
                &lt;button class="btn btn-primary"&gt;Confirm&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- ===================================================================== -->
    <!-- SECTION 6: ALERTS, FEEDBACK & TOASTS                                  -->
    <!-- ===================================================================== -->
    <div class="mb-4" id="sec-alerts">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-bell text-primary me-2"></i>6. Alerts, Feedback &amp; Live Toasts</h5>
                <small class="text-secondary">Dismissible alert callouts, live toast popups, and skeleton loaders</small>
            </div>
            <button class="btn btn-outline-secondary btn-sm rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#code-alerts">
                <i class="bi bi-code-slash me-1"></i> View Code
            </button>
        </div>

        <div class="card border-0 shadow-sm rounded-3 bg-white p-4 mb-3">
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill fs-5 me-3 flex-shrink-0"></i>
                <div><strong>Success!</strong> Customer record was updated successfully in the CRM database.</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-5 me-3 flex-shrink-0"></i>
                <div><strong>Attention required:</strong> 3 pending salary structures require supervisor authorization before Friday.</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                <i class="bi bi-x-octagon-fill fs-5 me-3 flex-shrink-0"></i>
                <div><strong>Connection Error:</strong> WhatsApp gateway token has expired. Please refresh your credentials.</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="d-flex align-items-center justify-content-between p-3 bg-light rounded-3 mt-3">
                <div>
                    <h6 class="fw-bold text-dark mb-1">Interactive Toast Notification</h6>
                    <small class="text-secondary">Triggers a pure Bootstrap floating alert at the bottom-right of the screen</small>
                </div>
                <button type="button" class="btn btn-primary btn-sm rounded-pill px-3" id="btnTriggerToast">
                    <i class="bi bi-bell-fill me-1"></i> Trigger Toast
                </button>
            </div>
        </div>

        <div class="collapse" id="code-alerts">
            <div class="card border-0 shadow-sm rounded-3 bg-dark text-light p-3 position-relative mb-3">
                <button class="btn btn-outline-light btn-sm position-absolute top-0 end-0 m-3" onclick="copySnippet('snippet-alerts')">
                    <i class="bi bi-clipboard me-1"></i> Copy
                </button>
                <pre class="m-0 small text-light" id="snippet-alerts"><code>&lt;!-- Dismissible Alert --&gt;
&lt;div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert"&gt;
    &lt;i class="bi bi-check-circle-fill fs-5 me-3 flex-shrink-0"&gt;&lt;/i&gt;
    &lt;div&gt;&lt;strong&gt;Success!&lt;/strong&gt; Record updated.&lt;/div&gt;
    &lt;button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"&gt;&lt;/button&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- ===================================================================== -->
    <!-- SECTION 7: NAVS, ACCORDIONS & LIST GROUPS                             -->
    <!-- ===================================================================== -->
    <div class="mb-4" id="sec-navs">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-segmented-nav text-primary me-2"></i>7. Navs, Tabs, Breadcrumbs &amp; Accordions</h5>
                <small class="text-secondary">Collapsible FAQ panels, tab navigation, breadcrumb navigation, and list groups</small>
            </div>
            <button class="btn btn-outline-secondary btn-sm rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#code-navs">
                <i class="bi bi-code-slash me-1"></i> View Code
            </button>
        </div>

        <div class="card border-0 shadow-sm rounded-3 bg-white p-4 mb-3">
            <div class="row g-4">
                <!-- Accordion -->
                <div class="col-lg-6">
                    <label class="form-label text-secondary small fw-bold text-uppercase d-block mb-3">Clean Accordion</label>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-light-subtle">
                            <h2 class="accordion-header" id="headingA">
                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseA" aria-expanded="true" aria-controls="collapseA">
                                    <i class="bi bi-shield-lock-fill text-primary me-2"></i> CRM Permission Architecture
                                </button>
                            </h2>
                            <div id="collapseA" class="accordion-collapse collapse show" aria-labelledby="headingA" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary small">
                                    Roles and access levels are controlled on a per-module basis (Leads, Customers, Appointments, Payroll). Each user profile inherits read, write, edit, and export rules.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-light-subtle">
                            <h2 class="accordion-header" id="headingB">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseB" aria-expanded="false" aria-controls="collapseB">
                                    <i class="bi bi-graph-up-arrow text-success me-2"></i> Sales Target Slabs
                                </button>
                            </h2>
                            <div id="collapseB" class="accordion-collapse collapse" aria-labelledby="headingB" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary small">
                                    Target slabs are mapped monthly and quarterly per sales executive. Real-time conversion tracking syncs directly with closed won deals.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Breadcrumbs & List Group -->
                <div class="col-lg-6">
                    <label class="form-label text-secondary small fw-bold text-uppercase d-block mb-3">Breadcrumb Hierarchy</label>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light p-3 rounded-3 mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="customers.php" class="text-decoration-none">Customers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Profile</li>
                        </ol>
                    </nav>

                    <label class="form-label text-secondary small fw-bold text-uppercase d-block mb-2">Interactive List Group</label>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center active" aria-current="true">
                            <div>
                                <div class="fw-bold">All Customers</div>
                                <small>Complete directory list</small>
                            </div>
                            <span class="badge bg-white text-primary rounded-pill">1,420</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-bold">Active Subscriptions</div>
                                <small class="text-secondary">Recurring annual contracts</small>
                            </div>
                            <span class="badge bg-success-subtle text-success rounded-pill">890</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="code-navs">
            <div class="card border-0 shadow-sm rounded-3 bg-dark text-light p-3 position-relative mb-3">
                <button class="btn btn-outline-light btn-sm position-absolute top-0 end-0 m-3" onclick="copySnippet('snippet-navs')">
                    <i class="bi bi-clipboard me-1"></i> Copy
                </button>
                <pre class="m-0 small text-light" id="snippet-navs"><code>&lt;!-- Pure Bootstrap Accordion --&gt;
&lt;div class="accordion" id="accordionExample"&gt;
    &lt;div class="accordion-item"&gt;
        &lt;h2 class="accordion-header"&gt;
            &lt;button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#col1"&gt;
                Section Header
            &lt;/button&gt;
        &lt;/h2&gt;
        &lt;div id="col1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample"&gt;
            &lt;div class="accordion-body small"&gt;Content body...&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

</div>

<!-- =========================================================================
     MODAL DIALOGS DEFINITIONS
     ========================================================================= -->

<!-- Standard Modal -->
<div class="modal fade" id="modalStandard" tabindex="-1" aria-labelledby="modalStandardLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold" id="modalStandardLabel">Standard Modal Window</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <p class="text-secondary mb-0">This is a standard pure Bootstrap modal dialog. Clean typography, standard header/body/footer structure, zero custom CSS.</p>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Centered Lead Form Modal -->
<div class="modal fade" id="modalLeadForm" tabindex="-1" aria-labelledby="modalLeadFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header border-bottom bg-light-subtle">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <h5 class="modal-title fw-bold" id="modalLeadFormLabel">Create New Lead</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Contact Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter contact name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Organization <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Company name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Phone Number</label>
                        <input type="tel" class="form-control" placeholder="+91 9876543210">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Lead Source</label>
                        <select class="form-select">
                            <option>Website Inquiry</option>
                            <option>LinkedIn Campaign</option>
                            <option>Referral</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top bg-light-subtle">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal"><i class="bi bi-check2 me-1"></i> Create Lead</button>
            </div>
        </div>
    </div>
</div>

<!-- Destructive Delete Modal -->
<div class="modal fade" id="modalDeleteConfirm" tabindex="-1" aria-labelledby="modalDeleteConfirmLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow rounded-3 text-center p-3">
            <div class="modal-body">
                <div class="text-danger mb-3 fs-1"><i class="bi bi-trash3-fill"></i></div>
                <h5 class="fw-bold text-dark mb-2">Delete Record?</h5>
                <p class="text-secondary small mb-4">This action cannot be undone. Are you sure you want to proceed?</p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn-sm px-3" data-bs-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scrollable Modal -->
<div class="modal fade" id="modalScrollable" tabindex="-1" aria-labelledby="modalScrollableLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold" id="modalScrollableLabel">Terms of Service &amp; Data Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-secondary small p-4">
                <h6 class="fw-bold text-dark">1. Data Ownership &amp; Storage</h6>
                <p>All CRM records, customer metadata, contact interactions, and document attachments belong solely to the licensee organization...</p>
                <h6 class="fw-bold text-dark mt-3">2. SLA Commitments</h6>
                <p>Gharuda CRM provides 99.9% uptime for core database transactions and reporting engines...</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
            </div>
        </div>
    </div>
</div>

<!-- Standards Guide Modal -->
<div class="modal fade" id="docsModal" tabindex="-1" aria-labelledby="docsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold" id="docsModalLabel">Pure Bootstrap Standards for Gharuda CRM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 small">
                <div class="alert alert-primary mb-3">
                    <strong>Rule:</strong> Do not create new CSS files in <code class="text-dark">assets/css/</code> for individual pages. Use standard Bootstrap 5.3 utilities.
                </div>
                <table class="table table-bordered table-sm align-middle mt-2 mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Old Custom CSS</th>
                            <th>Pure Bootstrap 5 Replacement</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>.card-custom</code></td>
                            <td><code>.card.border-0.shadow-sm.rounded-3</code></td>
                        </tr>
                        <tr>
                            <td><code>.table-modern</code></td>
                            <td><code>.table.table-hover.align-middle</code></td>
                        </tr>
                        <tr>
                            <td><code>.status-pill.status-approved</code></td>
                            <td><code>.badge.rounded-pill.bg-success-subtle.text-success</code></td>
                        </tr>
                        <tr>
                            <td><code>.status-pill.status-rejected</code></td>
                            <td><code>.badge.rounded-pill.bg-danger-subtle.text-danger</code></td>
                        </tr>
                        <tr>
                            <td><code>.emp-avatar</code></td>
                            <td><code>.rounded-circle.object-fit-cover</code> with width/height</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================================
     OFFCANVAS SIDE DRAWERS
     ========================================================================= -->

<!-- Right Customer Profile Drawer -->
<div class="offcanvas offcanvas-end border-0 shadow" tabindex="-1" id="drawerCustomer" aria-labelledby="drawerCustomerLabel" style="width: 400px;">
    <div class="offcanvas-header border-bottom bg-light-subtle">
        <div class="d-flex align-items-center gap-2">
            <img src="./assets/img/profile-1.jpg" class="rounded-circle object-fit-cover" width="36" height="36" alt="">
            <div>
                <h6 class="offcanvas-title fw-bold text-dark mb-0" id="drawerCustomerLabel">Praveena Sundaram</h6>
                <small class="text-secondary">Senior HR Specialist</small>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 fw-semibold mb-3">
            <i class="bi bi-check-circle-fill me-1"></i> Active Full-Time
        </span>
        <ul class="list-group list-group-flush border-bottom mb-4 small">
            <li class="list-group-item px-0 d-flex justify-content-between">
                <span class="text-secondary"><i class="bi bi-envelope me-2"></i>Email</span>
                <span class="fw-semibold text-dark">praveena@gharuda.com</span>
            </li>
            <li class="list-group-item px-0 d-flex justify-content-between">
                <span class="text-secondary"><i class="bi bi-telephone me-2"></i>Phone</span>
                <span class="fw-semibold text-dark">+91 94440 12345</span>
            </li>
            <li class="list-group-item px-0 d-flex justify-content-between">
                <span class="text-secondary"><i class="bi bi-geo-alt me-2"></i>Branch</span>
                <span class="fw-semibold text-dark">Chennai HQ</span>
            </li>
        </ul>
        <div class="d-grid gap-2">
            <a href="table.php" class="btn btn-primary btn-sm">View Attendance Logs</a>
        </div>
    </div>
</div>

<!-- Right Filter Drawer -->
<div class="offcanvas offcanvas-end border-0 shadow" tabindex="-1" id="drawerFilter" aria-labelledby="drawerFilterLabel" style="width: 360px;">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title fw-bold text-dark" id="drawerFilterLabel">
            <i class="bi bi-funnel-fill text-primary me-2"></i> Filter Records
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <form class="d-flex flex-column gap-3">
            <div>
                <label class="form-label small fw-semibold text-secondary">Branch Location</label>
                <select class="form-select form-select-sm">
                    <option selected>All Branches</option>
                    <option>Chennai Main</option>
                    <option>Coimbatore</option>
                </select>
            </div>
            <div>
                <label class="form-label small fw-semibold text-secondary">Date Range</label>
                <input type="date" class="form-control form-control-sm mb-2" value="2026-10-01">
                <input type="date" class="form-control form-control-sm" value="2026-10-31">
            </div>
        </form>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2">
        <button type="button" class="btn btn-outline-secondary btn-sm w-50" data-bs-dismiss="offcanvas">Reset</button>
        <button type="button" class="btn btn-primary btn-sm w-50" data-bs-dismiss="offcanvas">Apply</button>
    </div>
</div>

<!-- Bottom Action Sheet -->
<div class="offcanvas offcanvas-bottom border-0 shadow" tabindex="-1" id="drawerBottom" aria-labelledby="drawerBottomLabel" style="height: 200px;">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title fw-bold text-dark" id="drawerBottomLabel">
            <i class="bi bi-grid-fill text-primary me-2"></i> Quick Actions
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <div class="d-flex justify-content-around flex-wrap gap-3 text-center">
            <a href="buttons.php" class="text-decoration-none text-dark">
                <div class="bg-primary-subtle text-primary rounded-circle mx-auto mb-1 d-flex align-items-center justify-content-center" style="width: 46px; height: 46px;">
                    <i class="bi bi-menu-button-wide fs-5"></i>
                </div>
                <span class="small fw-semibold">Buttons</span>
            </a>
            <a href="input-block.php" class="text-decoration-none text-dark">
                <div class="bg-success-subtle text-success rounded-circle mx-auto mb-1 d-flex align-items-center justify-content-center" style="width: 46px; height: 46px;">
                    <i class="bi bi-input-cursor-text fs-5"></i>
                </div>
                <span class="small fw-semibold">Forms</span>
            </a>
            <a href="table.php" class="text-decoration-none text-dark">
                <div class="bg-info-subtle text-info rounded-circle mx-auto mb-1 d-flex align-items-center justify-content-center" style="width: 46px; height: 46px;">
                    <i class="bi bi-table fs-5"></i>
                </div>
                <span class="small fw-semibold">Tables</span>
            </a>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1090;">
    <div id="toastAlert" class="toast border-0 shadow rounded-3" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong class="me-auto">Notification</strong>
            <small class="text-white-50">Just now</small>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-white text-dark small" id="toastBodyText">
            Pure Bootstrap action executed successfully!
        </div>
    </div>
</div>

<!-- Interactive Utilities Script -->
<script src="./assets/js/pages/ui-library.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
