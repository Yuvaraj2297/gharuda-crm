<?php include 'header.php'; ?>

 

<style>
    .pip-kpi { min-height: 112px; padding: 18px; border: 1px solid var(--border-soft); border-radius: 14px; background: var(--white); box-shadow: 0 4px 16px rgba(20, 30, 25, .04); transition: transform .2s ease; }
    .pip-kpi:hover { transform: translateY(-2px); }
    .pip-kpi .icon { width: 44px; height: 44px; border-radius: 12px; display: grid; place-items: center; font-size: 20px; flex-shrink: 0; }
    .pip-kpi .label { color: var(--ink-500); font-size: 12px; font-weight: 700; margin-bottom: 3px; }
    .pip-kpi .value { color: var(--ink-900); font-size: 22px; font-weight: 800; }
    .pip-kpi .sub { color: var(--ink-500); font-size: 11px; margin-top: 3px; }

    .pip-status-active { background: #fff4d9; color: #b56b00; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; display: inline-flex; align-items: center; gap: 4px; }
    .pip-status-success { background: #dcfce7; color: #15803d; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; display: inline-flex; align-items: center; gap: 4px; }
    .pip-status-extended { background: #e0f2fe; color: #0369a1; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; display: inline-flex; align-items: center; gap: 4px; }
    .pip-status-escalated { background: #fee2e2; color: #b91c1c; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; display: inline-flex; align-items: center; gap: 4px; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Performance Improvement Plans (PIP)</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-graph-up-arrow fs-6"></i>
            <span>Performance Management</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Performance (PIP)</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#initiatePipModal">
            <i class="bi bi-plus-lg me-1"></i> Initiate Improvement Plan
        </button>
    </div>
</div>

<!-- KPI Metric Cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="pip-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-person-gear"></i></div>
            <div>
                <div class="label">Active PIP Plans</div>
                <div class="value">2</div>
                <div class="sub">Under structured mentorship</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="pip-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e9f7ec;color:#11872c;"><i class="bi bi-check2-circle"></i></div>
            <div>
                <div class="label">Successfully Graduated</div>
                <div class="value">5</div>
                <div class="sub">Met performance standards</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="pip-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-calendar2-check"></i></div>
            <div>
                <div class="label">Weekly Check-ins Done</div>
                <div class="value">100%</div>
                <div class="sub">Consistent review cadence</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="pip-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fcebed;color:#d5474e;"><i class="bi bi-shield-exclamation"></i></div>
            <div>
                <div class="label">Escalated to HR Review</div>
                <div class="value">0</div>
                <div class="sub">Zero critical non-compliance</div>
            </div>
        </div>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="performance-pip-report">
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
        <table class="table-modern w-100 mb-0" id="pipTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Employee</th>
                    <th class="text-nowrap">Plan Focus Area</th>
                    <th class="text-nowrap">Assigned Mentor</th>
                    <th class="text-nowrap">Duration Window</th>
                    <th class="text-nowrap">Milestone Progress</th>
                    <th class="text-nowrap">Check-in Cadence</th>
                    <th class="text-nowrap">PIP Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr>
                    <td>1</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="David">
                            <div>
                                <div class="fw-bold text-dark">David Anderson</div>
                                <div class="text-muted" style="font-size:11px;">EMP0003 • Engineering</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark">Unit Test Automation & Code Delivery Velocity</div>
                        <div class="text-muted" style="font-size:11px;">Target: 85% test coverage on iOS modules</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Daniel Martinez</div>
                        <div class="text-muted" style="font-size:11px;">Engineering Lead</div>
                    </td>
                    <td class="text-nowrap fw-semibold">01-Mar to 31-Mar (30D)</td>
                    <td>
                        <div>
                            <div class="d-flex justify-content-between" style="font-size:11px;font-weight:700;">
                                <span>3 / 4 Milestones</span>
                                <span class="text-success">75%</span>
                            </div>
                            <div class="progress-bar-thin"><span class="bg-green" style="width:75%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Weekly on Fridays</span></td>
                    <td><span class="pip-status-active"><i class="bi bi-clock-history"></i> In Progress</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewMilestonesModal" data-bs-toggle="tooltip" data-bs-title="View Plan Details"><i class="bi bi-list-check"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Sophia">
                            <div>
                                <div class="fw-bold text-dark">Sophia Johnson</div>
                                <div class="text-muted" style="font-size:11px;">EMP0005 • Marketing</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark">Campaign Conversion Rate & Lead Generation ROI</div>
                        <div class="text-muted" style="font-size:11px;">Target: 3.5% qualified MQL-to-SQL pipeline</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Sarah Mitchell</div>
                        <div class="text-muted" style="font-size:11px;">HR & Growth Advisor</div>
                    </td>
                    <td class="text-nowrap fw-semibold">15-Feb to 15-Apr (60D)</td>
                    <td>
                        <div>
                            <div class="d-flex justify-content-between" style="font-size:11px;font-weight:700;">
                                <span>2 / 5 Milestones</span>
                                <span class="text-warning">40%</span>
                            </div>
                            <div class="progress-bar-thin"><span class="bg-yellow" style="width:40%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Bi-Weekly</span></td>
                    <td><span class="pip-status-active"><i class="bi bi-clock-history"></i> In Progress</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewMilestonesModal" data-bs-toggle="tooltip" data-bs-title="View Plan Details"><i class="bi bi-list-check"></i></button>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Michael">
                            <div>
                                <div class="fw-bold text-dark">Michael Brown</div>
                                <div class="text-muted" style="font-size:11px;">EMP0006 • Design</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark">Responsive Prototype Turnaround & Usability Adherence</div>
                        <div class="text-muted" style="font-size:11px;">Successfully delivered full suite of dashboard UI assets</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Amelia Curr</div>
                        <div class="text-muted" style="font-size:11px;">Design Lead</div>
                    </td>
                    <td class="text-nowrap fw-semibold">01-Jan to 31-Jan (30D)</td>
                    <td>
                        <div>
                            <div class="d-flex justify-content-between" style="font-size:11px;font-weight:700;">
                                <span>5 / 5 Milestones</span>
                                <span class="text-success">100%</span>
                            </div>
                            <div class="progress-bar-thin"><span class="bg-green" style="width:100%;"></span></div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Completed</span></td>
                    <td><span class="pip-status-success"><i class="bi bi-check2-all"></i> Graduated</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Certificate"><i class="bi bi-award"></i></button>
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
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">3</strong> of <strong id="pgTotal">3</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal: Initiate PIP Plan -->
<div class="modal fade" id="initiatePipModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><i class="bi bi-graph-up-arrow text-primary me-2"></i> Initiate Performance Improvement Plan (PIP)</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Employee *</label>
                        <select class="form-select select2" required>
                            <option>David Anderson (EMP0003 - Engineering)</option>
                            <option>Sophia Johnson (EMP0005 - Marketing)</option>
                            <option>Michael Brown (EMP0006 - Design)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Assigned Mentor / Lead *</label>
                        <select class="form-select select2" required>
                            <option>Daniel Martinez (Engineering Lead)</option>
                            <option>Amelia Curr (Design Lead)</option>
                            <option>Sarah Mitchell (HR Head)</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Primary Focus & Remediation Goals *</label>
                        <input type="text" class="form-control" placeholder="e.g. Unit Test Coverage & Sprint Velocity Remediation" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Plan Duration *</label>
                        <select class="form-select">
                            <option selected>30 Days</option>
                            <option>60 Days</option>
                            <option>90 Days</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Start Date *</label>
                        <input type="date" class="form-control" value="2026-03-01" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Review Cadence *</label>
                        <select class="form-select">
                            <option selected>Weekly on Fridays</option>
                            <option>Bi-Weekly Check-in</option>
                            <option>Monthly Milestone Check</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="alert('Performance Improvement Plan initiated and calendar check-ins scheduled!'); $('#initiatePipModal').modal('hide');">
                    <i class="bi bi-check2-circle me-1"></i> Start Improvement Plan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: View Milestone Checklist -->
<div class="modal fade" id="viewMilestonesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><i class="bi bi-list-check text-primary me-2"></i> PIP Milestone Evaluation Log</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex align-items-center justify-content-between p-3 bg-light rounded-3 mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <img src="./assets/img/profile-3.jpg" class="avatar-md" style="width:44px;height:44px;border-radius:50%;" alt="David">
                        <div>
                            <h6 class="fw-bold mb-0">David Anderson</h6>
                            <span class="text-muted" style="font-size:12px;">30-Day PIP • Mentor: Daniel Martinez</span>
                        </div>
                    </div>
                    <span class="pip-status-active"><i class="bi bi-clock-history"></i> 3 of 4 Milestones Met</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm table-bordered mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Milestone Objective</th>
                                <th>Target Deadline</th>
                                <th>Verification Proof</th>
                                <th>Mentor Sign-off</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">1</td>
                                <td>Write unit tests for authentication module (&gt;80% coverage)</td>
                                <td>Week 1</td>
                                <td><span class="badge bg-success-subtle text-success">Passed (84% Coverage)</span></td>
                                <td><i class="bi bi-check-circle-fill text-success"></i> Approved</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">2</td>
                                <td>Deliver User Settings feature within estimated sprint story points</td>
                                <td>Week 2</td>
                                <td><span class="badge bg-success-subtle text-success">Delivered on time</span></td>
                                <td><i class="bi bi-check-circle-fill text-success"></i> Approved</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">3</td>
                                <td>Refactor API retry logic with zero production Sentry errors</td>
                                <td>Week 3</td>
                                <td><span class="badge bg-success-subtle text-success">Zero Sentry errors</span></td>
                                <td><i class="bi bi-check-circle-fill text-success"></i> Approved</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">4</td>
                                <td>Lead sprint demo and document Swift 6 migration guidelines</td>
                                <td>Week 4</td>
                                <td><span class="badge bg-warning-subtle text-warning">In Progress</span></td>
                                <td><i class="bi bi-hourglass-split text-warning"></i> Pending Final Review</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>
