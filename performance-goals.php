<?php include 'header.php'; ?>

 

<style>
    .goal-progress-stack { min-width: 120px; }
    .progress-bar-thin { height: 6px; border-radius: 999px; background: #edf1ee; overflow: hidden; margin-top: 5px; }
    .progress-bar-thin span { display: block; height: 100%; border-radius: inherit; transition: width 0.4s ease; }
    .bg-green { background: #16a34a; }
    .bg-yellow { background: #ca8a04; }
    .bg-red { background: #dc2626; }
    .bg-blue { background: #2563eb; }

    .goal-status-ontrack { background: #dcfce7; color: #15803d; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; display: inline-flex; align-items: center; gap: 4px; }
    .goal-status-atrisk { background: #fee2e2; color: #b91c1c; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; display: inline-flex; align-items: center; gap: 4px; }
    .goal-status-done { background: #e0f2fe; color: #0369a1; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; display: inline-flex; align-items: center; gap: 4px; }

    .category-badge { font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 6px; }
    .cat-corp { background: #f3e8ff; color: #7e22ce; }
    .cat-dept { background: #e0e7ff; color: #4338ca; }
    .cat-ind { background: #f1f5f9; color: #475569; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Goals & OKRs Management</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-bullseye fs-6"></i>
            <span>Performance Management</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Goals & OKRs</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addGoalModal">
            <i class="bi bi-plus-lg me-1"></i> Create Goal / OKR
        </button>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="goals-okr-report">
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
        <table class="table-modern w-100 mb-0" id="goalsTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Goal / Objective Title</th>
                    <th class="text-nowrap">Scope & Category</th>
                    <th class="text-nowrap">Assigned Owner</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Weight</th>
                    <th class="text-nowrap">Key Result Target</th>
                    <th class="text-nowrap">Progress</th>
                    <th class="text-nowrap">Due Date</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr>
                    <td>1</td>
                    <td>
                        <div class="fw-bold text-dark">Enterprise Design System 2.0 Standardization</div>
                        <div class="text-muted" style="font-size:11px;">Deliver scalable Figma component library across web & mobile</div>
                    </td>
                    <td><span class="category-badge cat-dept">Departmental OKR</span></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:30px;height:30px;border-radius:50%;" alt="Amelia">
                            <div class="fw-semibold text-dark">Amelia Curr</div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Design</span></td>
                    <td class="fw-bold">35%</td>
                    <td class="text-dark fw-semibold">100% Component Coverage</td>
                    <td>
                        <div class="goal-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11px;font-weight:700;">
                                <span>85% Done</span>
                            </div>
                            <div class="progress-bar-thin"><span class="bg-green" style="width:85%;"></span></div>
                        </div>
                    </td>
                    <td class="text-nowrap" style="font-size:12px;">31-Mar-2026</td>
                    <td><span class="goal-status-ontrack"><i class="bi bi-check-circle-fill"></i> On Track</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="alert('Update progress for Design System OKR');" data-bs-toggle="tooltip" data-bs-title="Update Progress"><i class="bi bi-arrow-repeat"></i></button>
                            <button type="button" class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-title="Edit Goal"><i class="mdi mdi-pencil"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>
                        <div class="fw-bold text-dark">Core API Latency Reduction under 120ms</div>
                        <div class="text-muted" style="font-size:11px;">Refactor database indexes, caching, and connection pooling</div>
                    </td>
                    <td><span class="category-badge cat-corp">Strategic Company Goal</span></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:30px;height:30px;border-radius:50%;" alt="Daniel">
                            <div class="fw-semibold text-dark">Daniel Martinez</div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Engineering</span></td>
                    <td class="fw-bold">40%</td>
                    <td class="text-dark fw-semibold">P95 Latency &lt; 120ms</td>
                    <td>
                        <div class="goal-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11px;font-weight:700;">
                                <span>65% Done</span>
                            </div>
                            <div class="progress-bar-thin"><span class="bg-blue" style="width:65%;"></span></div>
                        </div>
                    </td>
                    <td class="text-nowrap" style="font-size:12px;">31-Mar-2026</td>
                    <td><span class="goal-status-ontrack"><i class="bi bi-check-circle-fill"></i> On Track</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="Update Progress"><i class="bi bi-arrow-repeat"></i></button>
                            <button type="button" class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-title="Edit Goal"><i class="mdi mdi-pencil"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        <div class="fw-bold text-dark">iOS Swift 6 Concurrency Migration</div>
                        <div class="text-muted" style="font-size:11px;">Modernize networking layer & offline synchronization engine</div>
                    </td>
                    <td><span class="category-badge cat-ind">Individual Goal</span></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:30px;height:30px;border-radius:50%;" alt="David">
                            <div class="fw-semibold text-dark">David Anderson</div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Engineering</span></td>
                    <td class="fw-bold">25%</td>
                    <td class="text-dark fw-semibold">Zero Thread Lock Crashes</td>
                    <td>
                        <div class="goal-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11px;font-weight:700;">
                                <span class="text-danger">30% Done</span>
                            </div>
                            <div class="progress-bar-thin"><span class="bg-red" style="width:30%;"></span></div>
                        </div>
                    </td>
                    <td class="text-nowrap" style="font-size:12px;">15-Mar-2026</td>
                    <td><span class="goal-status-atrisk"><i class="bi bi-exclamation-triangle-fill"></i> At Risk</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="Update Progress"><i class="bi bi-arrow-repeat"></i></button>
                            <button type="button" class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-title="Edit Goal"><i class="mdi mdi-pencil"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>
                        <div class="fw-bold text-dark">Q4 Financial Audit & Automated Tax Reconciliation</div>
                        <div class="text-muted" style="font-size:11px;">100% compliance with statutory TDS & GST filings</div>
                    </td>
                    <td><span class="category-badge cat-dept">Departmental OKR</span></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-4.jpg" class="avatar-sm" style="width:30px;height:30px;border-radius:50%;" alt="Emily">
                            <div class="fw-semibold text-dark">Emily Clark</div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Finance</span></td>
                    <td class="fw-bold">50%</td>
                    <td class="text-dark fw-semibold">Zero Audit Discrepancy</td>
                    <td>
                        <div class="goal-progress-stack">
                            <div class="d-flex justify-content-between" style="font-size:11px;font-weight:700;">
                                <span class="text-success">100% Done</span>
                            </div>
                            <div class="progress-bar-thin"><span class="bg-green" style="width:100%;"></span></div>
                        </div>
                    </td>
                    <td class="text-nowrap" style="font-size:12px;">28-Feb-2026</td>
                    <td><span class="goal-status-done"><i class="bi bi-check-all"></i> Completed</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Outcome"><i class="bi bi-eye"></i></button>
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
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">4</strong> of <strong id="pgTotal">4</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal: Create Goal / OKR -->
<div class="modal fade" id="addGoalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><i class="bi bi-bullseye text-primary me-2"></i> Create Goal / Key Result (OKR)</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Goal / Objective Title *</label>
                        <input type="text" class="form-control" placeholder="e.g. Implement High Availability Microservices Architecture" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Goal Category *</label>
                        <select class="form-select">
                            <option>Strategic Company Goal</option>
                            <option selected>Departmental OKR</option>
                            <option>Individual Performance Goal</option>
                            <option>Developmental / Learning Goal</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Assigned Owner / Lead *</label>
                        <select class="form-select select2" required>
                            <option>Amelia Curr (Design Lead)</option>
                            <option>Daniel Martinez (Engineering Lead)</option>
                            <option>Emily Clark (Finance Lead)</option>
                            <option>David Anderson (Senior Dev)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Appraisal Weightage (%) *</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="25" min="5" max="100">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Key Result Target *</label>
                        <input type="text" class="form-control" placeholder="e.g. 99.99% Uptime or 15 Clients" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Target Due Date *</label>
                        <input type="date" class="form-control" value="2026-03-31" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Description & Success Metrics</label>
                        <textarea class="form-control" rows="2" placeholder="Detail the expected outcome, success criteria, and verification methodology..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="alert('Goal & OKR created successfully!'); $('#addGoalModal').modal('hide');">
                    <i class="bi bi-check2-circle me-1"></i> Save Goal
                </button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>
