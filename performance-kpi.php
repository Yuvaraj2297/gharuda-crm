<?php include 'header.php'; ?>

 

<style>
    .comp-badge { font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 6px; }
    .comp-func { background: #e0f2fe; color: #0369a1; }
    .comp-lead { background: #f3e8ff; color: #7e22ce; }
    .comp-behav { background: #fef3c7; color: #b45309; }
    .comp-qual { background: #dcfce7; color: #15803d; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">KPI & Competency Framework Library</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-speedometer2 fs-6"></i>
            <span>Performance Management</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">KPI & Competencies</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addKpiModal">
            <i class="bi bi-plus-lg me-1"></i> Add Competency KPI
        </button>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="kpi-competency-framework">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search employee..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="kpiTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Competency / KPI Title</th>
                    <th class="text-nowrap">Framework Category</th>
                    <th class="text-nowrap">Applicable Department / Roles</th>
                    <th class="text-nowrap">Measurement Standard</th>
                    <th class="text-nowrap">Default Weight</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr>
                    <td>1</td>
                    <td>
                        <div class="fw-bold text-dark">UI/UX Design Quality & Usability Testing</div>
                        <div class="text-muted" style="font-size:11px;">Figma component integrity, responsive usability & accessibility</div>
                    </td>
                    <td><span class="comp-badge comp-func">Functional Expertise</span></td>
                    <td><span class="badge bg-light text-dark border">Design (All Levels)</span></td>
                    <td class="text-dark fw-semibold">1-5 Star Likert Scale</td>
                    <td class="fw-bold">30%</td>
                    <td><span class="status-pill status-approved">Active</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-title="Edit KPI"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>
                        <div class="fw-bold text-dark">Code Quality, Unit Test Coverage & Clean Architecture</div>
                        <div class="text-muted" style="font-size:11px;">Maintain minimum 80% test coverage with zero critical Sonar vulnerabilities</div>
                    </td>
                    <td><span class="comp-badge comp-qual">Delivery & Quality</span></td>
                    <td><span class="badge bg-light text-dark border">Engineering (Devs & Leads)</span></td>
                    <td class="text-dark fw-semibold">Percentage Coverage &gt;= 80%</td>
                    <td class="fw-bold">35%</td>
                    <td><span class="status-pill status-approved">Active</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-title="Edit KPI"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        <div class="fw-bold text-dark">Team Mentorship & Technical Enablement</div>
                        <div class="text-muted" style="font-size:11px;">Active onboarding of juniors, code reviews, and tech talks</div>
                    </td>
                    <td><span class="comp-badge comp-lead">Leadership & Mentorship</span></td>
                    <td><span class="badge bg-light text-dark border">Senior / Lead Roles</span></td>
                    <td class="text-dark fw-semibold">Peer & Mentee Feedback Score</td>
                    <td class="fw-bold">20%</td>
                    <td><span class="status-pill status-approved">Active</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-title="Edit KPI"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>
                        <div class="fw-bold text-dark">Statutory Compliance & Financial Reporting Accuracy</div>
                        <div class="text-muted" style="font-size:11px;">Timely monthly close, zero compliance penalties, and variance checks</div>
                    </td>
                    <td><span class="comp-badge comp-func">Functional Expertise</span></td>
                    <td><span class="badge bg-light text-dark border">Finance & Accounts</span></td>
                    <td class="text-dark fw-semibold">Zero Discrepancy Standard</td>
                    <td class="fw-bold">40%</td>
                    <td><span class="status-pill status-approved">Active</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-title="Edit KPI"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>
                        <div class="fw-bold text-dark">Cross-Functional Collaboration & Agile Communication</div>
                        <div class="text-muted" style="font-size:11px;">Constructive communication across departments & sprint participation</div>
                    </td>
                    <td><span class="comp-badge comp-behav">Behavioral & Culture</span></td>
                    <td><span class="badge bg-light text-dark border">All Company Staff</span></td>
                    <td class="text-dark fw-semibold">360° Multi-Rater Assessment</td>
                    <td class="fw-bold">15%</td>
                    <td><span class="status-pill status-approved">Active</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-title="Edit KPI"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Table Footer with Show Entries & Pagination -->
    <div class="d-flex justify-content-between align-items-center report-footer p-3">
        <div class="d-flex gap-2 align-items-center">
            <span class="small text-muted text-nowrap">Show:</span>
            <select class="form-select form-select-sm gh-w-auto" id="showEntries">
                <option selected>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">5</strong> of <strong id="pgTotal">5</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal: Add KPI Competency -->
<div class="modal fade" id="addKpiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><i class="bi bi-speedometer2 text-primary me-2"></i> Add KPI / Competency Standard</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Competency / KPI Title *</label>
                        <input type="text" class="form-control" placeholder="e.g. Sprint Delivery Predictability & Velocity" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Framework Category *</label>
                        <select class="form-select">
                            <option>Functional Expertise</option>
                            <option>Delivery & Quality</option>
                            <option>Leadership & Mentorship</option>
                            <option>Behavioral & Culture</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Applicable Department *</label>
                        <select class="form-select select2">
                            <option>All Departments</option>
                            <option>Engineering</option>
                            <option>Design</option>
                            <option>Finance</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Measurement Standard *</label>
                        <input type="text" class="form-control" placeholder="e.g. 1-5 Star Likert Scale or % Metrics" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Default Weightage (%)</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="20" min="5" max="100">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Evaluation Guidelines & Behavioral Anchors</label>
                        <textarea class="form-control" rows="2" placeholder="Describe rating anchors (e.g. 1 = Unsatisfactory, 3 = Competent, 5 = Role Model)..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="alert('Competency KPI saved to framework library!'); $('#addKpiModal').modal('hide');">
                    <i class="bi bi-check2-circle me-1"></i> Save to Library
                </button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>
