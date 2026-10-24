<?php include 'header.php'; ?>

 

<style>
    .att-kpi { min-height: 112px; padding: 18px; border: 1px solid var(--border-soft); border-radius: 14px; background: var(--white); box-shadow: 0 4px 16px rgba(20, 30, 25, .04); }
    .att-kpi .icon { width: 44px; height: 44px; border-radius: 12px; display: grid; place-items: center; font-size: 20px; flex-shrink: 0; }
    .att-kpi .label { color: var(--ink-500); font-size: 12px; font-weight: 700; margin-bottom: 3px; }
    .att-kpi .value { color: var(--ink-900); font-size: 22px; font-weight: 800; }
    .att-kpi .sub { color: var(--ink-500); font-size: 11px; margin-top: 3px; }

    .score-high { color: #15803d; font-weight: 700; }
    .score-med { color: #b45309; font-weight: 700; }
    .score-low { color: #b91c1c; font-weight: 700; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Attendance, Punctuality & Leave Insights</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-calendar-check fs-6"></i>
            <span>Reports & Analytics</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Attendance & Leave Insights</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <a href="attendance-report.php" class="btn btn-outline-primary">
            <i class="bi bi-clock-history me-1"></i> Monthly Attendance Report
        </a>
        <a href="leave-report.php" class="btn btn-outline-primary">
            <i class="bi bi-calendar-range me-1"></i> Leave Balance Ledger
        </a>
    </div>
</div>

<!-- KPI Metric Cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="att-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e9f7ec;color:#11872c;"><i class="bi bi-check2-circle"></i></div>
            <div>
                <div class="label">Overall Org Attendance</div>
                <div class="value">96.8%</div>
                <div class="sub">Current month benchmark</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="att-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-alarm"></i></div>
            <div>
                <div class="label">Punctuality Score</div>
                <div class="value">94.2%</div>
                <div class="sub">&lt; 15 min grace window</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="att-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-clock-fill"></i></div>
            <div>
                <div class="label">Overtime Hours Logged</div>
                <div class="value">142 Hrs</div>
                <div class="sub">Total across Engineering/IT</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="att-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#f3e8ff;color:#9333ea;"><i class="bi bi-calendar2-minus"></i></div>
            <div>
                <div class="label">Leaves Availed (MTD)</div>
                <div class="value">18 Days</div>
                <div class="sub">Average 0.75 days/employee</div>
            </div>
        </div>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="attendance-leave-insights-report">
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
        <table class="table-modern w-100 mb-0" id="attendanceInsightTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Employee</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Work Days</th>
                    <th class="text-nowrap">Days Present</th>
                    <th class="text-nowrap">Punctuality %</th>
                    <th class="text-nowrap">Late Arrivals</th>
                    <th class="text-nowrap">Overtime Logged</th>
                    <th class="text-nowrap">Paid Leaves</th>
                    <th class="text-nowrap">Unpaid LOP</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr>
                    <td>1</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:32px;height:32px;border-radius:50%;" alt="Amelia">
                            <div>
                                <div class="fw-bold text-dark">Amelia Curr</div>
                                <div class="text-muted" style="font-size:11px;">EMP0001</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Design</span></td>
                    <td class="fw-bold">22</td>
                    <td class="fw-bold text-success">22</td>
                    <td><span class="score-high">98.5%</span></td>
                    <td><span class="badge bg-light text-muted">0</span></td>
                    <td class="fw-semibold">8.5 Hrs</td>
                    <td><span class="badge bg-light text-dark border">0 Days</span></td>
                    <td><span class="badge bg-light text-muted">0</span></td>
                    <td>
                        <a href="attendance-report.php?user=Amelia+Curr" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Timesheet"><i class="bi bi-calendar-week"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:32px;height:32px;border-radius:50%;" alt="Daniel">
                            <div>
                                <div class="fw-bold text-dark">Daniel Martinez</div>
                                <div class="text-muted" style="font-size:11px;">EMP0002</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Engineering</span></td>
                    <td class="fw-bold">22</td>
                    <td class="fw-bold text-success">21</td>
                    <td><span class="score-high">96.0%</span></td>
                    <td><span class="badge bg-warning-subtle text-warning">1</span></td>
                    <td class="fw-semibold">14.0 Hrs</td>
                    <td><span class="badge bg-light text-dark border">1 Day (Casual)</span></td>
                    <td><span class="badge bg-light text-muted">0</span></td>
                    <td>
                        <a href="attendance-report.php?user=Daniel+Martinez" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Timesheet"><i class="bi bi-calendar-week"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:32px;height:32px;border-radius:50%;" alt="David">
                            <div>
                                <div class="fw-bold text-dark">David Anderson</div>
                                <div class="text-muted" style="font-size:11px;">EMP0003</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">iOS Dev</span></td>
                    <td class="fw-bold">22</td>
                    <td class="fw-bold text-success">20</td>
                    <td><span class="score-med">91.5%</span></td>
                    <td><span class="badge bg-warning-subtle text-warning">3</span></td>
                    <td class="fw-semibold">18.5 Hrs</td>
                    <td><span class="badge bg-light text-dark border">2 Days (Sick)</span></td>
                    <td><span class="badge bg-light text-muted">0</span></td>
                    <td>
                        <a href="attendance-report.php?user=David+Anderson" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Timesheet"><i class="bi bi-calendar-week"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-4.jpg" class="avatar-sm" style="width:32px;height:32px;border-radius:50%;" alt="Emily">
                            <div>
                                <div class="fw-bold text-dark">Emily Clark</div>
                                <div class="text-muted" style="font-size:11px;">EMP0004</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Finance</span></td>
                    <td class="fw-bold">22</td>
                    <td class="fw-bold text-success">22</td>
                    <td><span class="score-high">99.0%</span></td>
                    <td><span class="badge bg-light text-muted">0</span></td>
                    <td class="fw-semibold">6.0 Hrs</td>
                    <td><span class="badge bg-light text-dark border">0 Days</span></td>
                    <td><span class="badge bg-light text-muted">0</span></td>
                    <td>
                        <a href="attendance-report.php?user=Emily+Clark" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Timesheet"><i class="bi bi-calendar-week"></i></a>
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

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>
