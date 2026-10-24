<?php include 'header.php'; ?>

 

<style>
    .analytics-kpi { min-height: 112px; padding: 18px; border: 1px solid var(--border-soft); border-radius: 14px; background: var(--white); box-shadow: 0 4px 16px rgba(20, 30, 25, .04); transition: transform .2s ease; }
    .analytics-kpi:hover { transform: translateY(-2px); }
    .analytics-kpi .icon { width: 44px; height: 44px; border-radius: 12px; display: grid; place-items: center; font-size: 20px; flex-shrink: 0; }
    .analytics-kpi .label { color: var(--ink-500); font-size: 12px; font-weight: 700; margin-bottom: 3px; }
    .analytics-kpi .value { color: var(--ink-900); font-size: 22px; font-weight: 800; }
    .analytics-kpi .sub { color: var(--ink-500); font-size: 11px; margin-top: 3px; }

    .risk-badge-low { background: #dcfce7; color: #15803d; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; }
    .risk-badge-med { background: #fff3dc; color: #b56b00; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; }
    .risk-badge-high { background: #fee2e2; color: #b91c1c; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 99px; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Executive HR Intelligence Dashboard</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-speedometer fs-6"></i>
            <span>Reports & Analytics</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Executive BI Dashboard</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <a href="reports-builder.php" class="btn btn-outline-primary">
            <i class="bi bi-file-earmark-spreadsheet me-1"></i> Custom Report Builder
        </a>
        <button class="btn btn-primary" type="button" onclick="window.print();">
            <i class="bi bi-printer me-1"></i> Print Executive Summary
        </button>
    </div>
</div>

<!-- KPI Metric Cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="analytics-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-people-fill"></i></div>
            <div>
                <div class="label">Total Active Workforce</div>
                <div class="value">24 Staff</div>
                <div class="sub text-success"><i class="bi bi-arrow-up-right"></i> +3 New Joiners (Q1)</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="analytics-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e9f7ec;color:#11872c;"><i class="bi bi-currency-rupee"></i></div>
            <div>
                <div class="label">Monthly Payroll Disbursal</div>
                <div class="value">₹18.45L</div>
                <div class="sub">100% on-time processing</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="analytics-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-graph-down"></i></div>
            <div>
                <div class="label">Annualized Attrition Rate</div>
                <div class="value">4.18%</div>
                <div class="sub text-success"><i class="bi bi-arrow-down-right"></i> Well below industry benchmark</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="analytics-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#f3e8ff;color:#9333ea;"><i class="bi bi-clock-history"></i></div>
            <div>
                <div class="label">Avg Employee Tenure</div>
                <div class="value">2.8 Years</div>
                <div class="sub">High organizational retention</div>
            </div>
        </div>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="executive-department-health-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search department..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="executiveTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Department Name</th>
                    <th class="text-nowrap">Headcount</th>
                    <th class="text-nowrap">Monthly Payroll Spend</th>
                    <th class="text-nowrap">Attendance Punctuality</th>
                    <th class="text-nowrap">Leave Utilization</th>
                    <th class="text-nowrap">Open Job Positions</th>
                    <th class="text-nowrap">Avg Performance Rating</th>
                    <th class="text-nowrap">Retention Risk</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr>
                    <td>1</td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-code-slash text-primary me-2"></i>Engineering & Tech</div>
                        <div class="text-muted" style="font-size:11px;">Backend, Frontend, iOS & QA</div>
                    </td>
                    <td class="fw-bold">10 Staff (41.6%)</td>
                    <td class="fw-bold text-dark">₹8.95 Lakhs</td>
                    <td><span class="badge bg-success-subtle text-success fw-bold">96.4%</span></td>
                    <td><span class="badge bg-light text-dark border">62%</span></td>
                    <td><span class="badge bg-primary text-white">2 Openings</span></td>
                    <td><span class="fw-bold text-warning">★ 4.6</span> / 5.0</td>
                    <td><span class="risk-badge-low"><i class="bi bi-shield-check"></i> Low Risk</span></td>
                    <td>
                        <a href="reports-headcount.php?dept=Engineering" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="Drilldown Report"><i class="bi bi-arrow-right-circle"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-palette text-info me-2"></i>Product & UI/UX Design</div>
                        <div class="text-muted" style="font-size:11px;">Design Systems & Research</div>
                    </td>
                    <td class="fw-bold">5 Staff (20.8%)</td>
                    <td class="fw-bold text-dark">₹3.80 Lakhs</td>
                    <td><span class="badge bg-success-subtle text-success fw-bold">98.1%</span></td>
                    <td><span class="badge bg-light text-dark border">54%</span></td>
                    <td><span class="badge bg-light text-muted border">0 Openings</span></td>
                    <td><span class="fw-bold text-warning">★ 4.8</span> / 5.0</td>
                    <td><span class="risk-badge-low"><i class="bi bi-shield-check"></i> Low Risk</span></td>
                    <td>
                        <a href="reports-headcount.php?dept=Design" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="Drilldown Report"><i class="bi bi-arrow-right-circle"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-calculator text-success me-2"></i>Finance & Accounts</div>
                        <div class="text-muted" style="font-size:11px;">Statutory, Payroll & Audit</div>
                    </td>
                    <td class="fw-bold">4 Staff (16.7%)</td>
                    <td class="fw-bold text-dark">₹2.65 Lakhs</td>
                    <td><span class="badge bg-success-subtle text-success fw-bold">97.5%</span></td>
                    <td><span class="badge bg-light text-dark border">48%</span></td>
                    <td><span class="badge bg-primary text-white">1 Opening</span></td>
                    <td><span class="fw-bold text-warning">★ 4.4</span> / 5.0</td>
                    <td><span class="risk-badge-low"><i class="bi bi-shield-check"></i> Low Risk</span></td>
                    <td>
                        <a href="reports-headcount.php?dept=Finance" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="Drilldown Report"><i class="bi bi-arrow-right-circle"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-megaphone text-warning me-2"></i>Marketing & Growth</div>
                        <div class="text-muted" style="font-size:11px;">Brand, Performance & SEO</div>
                    </td>
                    <td class="fw-bold">3 Staff (12.5%)</td>
                    <td class="fw-bold text-dark">₹1.85 Lakhs</td>
                    <td><span class="badge bg-warning-subtle text-warning fw-bold">91.8%</span></td>
                    <td><span class="badge bg-light text-dark border">71%</span></td>
                    <td><span class="badge bg-primary text-white">1 Opening</span></td>
                    <td><span class="fw-bold text-warning">★ 4.1</span> / 5.0</td>
                    <td><span class="risk-badge-med"><i class="bi bi-exclamation-circle"></i> Moderate</span></td>
                    <td>
                        <a href="reports-headcount.php?dept=Marketing" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="Drilldown Report"><i class="bi bi-arrow-right-circle"></i></a>
                    </td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-people text-secondary me-2"></i>Human Resources & Admin</div>
                        <div class="text-muted" style="font-size:11px;">Talent Acquisition & Ops</div>
                    </td>
                    <td class="fw-bold">2 Staff (8.3%)</td>
                    <td class="fw-bold text-dark">₹1.20 Lakhs</td>
                    <td><span class="badge bg-success-subtle text-success fw-bold">99.0%</span></td>
                    <td><span class="badge bg-light text-dark border">40%</span></td>
                    <td><span class="badge bg-light text-muted border">0 Openings</span></td>
                    <td><span class="fw-bold text-warning">★ 4.7</span> / 5.0</td>
                    <td><span class="risk-badge-low"><i class="bi bi-shield-check"></i> Low Risk</span></td>
                    <td>
                        <a href="reports-headcount.php?dept=HR" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="Drilldown Report"><i class="bi bi-arrow-right-circle"></i></a>
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

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>
