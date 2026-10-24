<?php include 'header.php'; ?>

 

<style>
    .pay-kpi { min-height: 112px; padding: 18px; border: 1px solid var(--border-soft); border-radius: 14px; background: var(--white); box-shadow: 0 4px 16px rgba(20, 30, 25, .04); }
    .pay-kpi .icon { width: 44px; height: 44px; border-radius: 12px; display: grid; place-items: center; font-size: 20px; flex-shrink: 0; }
    .pay-kpi .label { color: var(--ink-500); font-size: 12px; font-weight: 700; margin-bottom: 3px; }
    .pay-kpi .value { color: var(--ink-900); font-size: 22px; font-weight: 800; }
    .pay-kpi .sub { color: var(--ink-500); font-size: 11px; margin-top: 3px; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Payroll & Compensation Financial Intelligence</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-currency-rupee fs-6"></i>
            <span>Reports & Analytics</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Payroll & Cost Analysis</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <a href="payroll-report.php" class="btn btn-outline-primary">
            <i class="bi bi-cash-stack me-1"></i> Payroll Master Report
        </a>
        <a href="loan-report.php" class="btn btn-outline-primary">
            <i class="bi bi-wallet2 me-1"></i> Loan & Advance Ledger
        </a>
    </div>
</div>

<!-- KPI Metric Cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="pay-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#eaf1ff;color:#3564e0;"><i class="bi bi-bank"></i></div>
            <div>
                <div class="label">Total Gross Salary Spend</div>
                <div class="value">₹18.45 Lakhs</div>
                <div class="sub">Current month payroll budget</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="pay-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e9f7ec;color:#11872c;"><i class="bi bi-wallet-fill"></i></div>
            <div>
                <div class="label">Net Pay Disbursed</div>
                <div class="value">₹15.82 Lakhs</div>
                <div class="sub">Direct bank transfer credit</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="pay-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#f3e8ff;color:#9333ea;"><i class="bi bi-file-earmark-ruled"></i></div>
            <div>
                <div class="label">Statutory Taxes (TDS+PF)</div>
                <div class="value">₹2.18 Lakhs</div>
                <div class="sub">Govt compliance liability</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="pay-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-arrow-repeat"></i></div>
            <div>
                <div class="label">Advance Salary Recovered</div>
                <div class="value">₹45,000</div>
                <div class="sub">Auto-recovered in monthly EMI</div>
            </div>
        </div>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="payroll-cost-analysis-report">
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
        <table class="table-modern w-100 mb-0" id="payrollCostTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Employee</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Gross Earnings</th>
                    <th class="text-nowrap">PF + ESI (Statutory)</th>
                    <th class="text-nowrap">Income Tax (TDS)</th>
                    <th class="text-nowrap">Salary Advance EMI</th>
                    <th class="text-nowrap">Net Disbursed</th>
                    <th class="text-nowrap">Disbursal Date</th>
                    <th class="text-nowrap">Status</th>
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
                    <td class="fw-bold text-dark">₹75,000</td>
                    <td>₹3,600</td>
                    <td>₹5,200</td>
                    <td><span class="badge bg-light text-muted">₹0</span></td>
                    <td class="fw-bold text-success">₹66,200</td>
                    <td class="text-nowrap">28-Feb-2026</td>
                    <td><span class="status-pill status-approved">Disbursed</span></td>
                    <td>
                        <a href="payroll-report.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Payslip"><i class="bi bi-receipt"></i></a>
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
                    <td class="fw-bold text-dark">₹90,000</td>
                    <td>₹3,600</td>
                    <td>₹7,500</td>
                    <td><span class="badge bg-danger-subtle text-danger fw-bold">₹10,000</span></td>
                    <td class="fw-bold text-success">₹68,900</td>
                    <td class="text-nowrap">28-Feb-2026</td>
                    <td><span class="status-pill status-approved">Disbursed</span></td>
                    <td>
                        <a href="payroll-report.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Payslip"><i class="bi bi-receipt"></i></a>
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
                    <td class="fw-bold text-dark">₹60,000</td>
                    <td>₹3,600</td>
                    <td>₹3,200</td>
                    <td><span class="badge bg-danger-subtle text-danger fw-bold">₹5,000</span></td>
                    <td class="fw-bold text-success">₹48,200</td>
                    <td class="text-nowrap">28-Feb-2026</td>
                    <td><span class="status-pill status-approved">Disbursed</span></td>
                    <td>
                        <a href="payroll-report.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Payslip"><i class="bi bi-receipt"></i></a>
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
                    <td class="fw-bold text-dark">₹65,000</td>
                    <td>₹3,600</td>
                    <td>₹4,100</td>
                    <td><span class="badge bg-light text-muted">₹0</span></td>
                    <td class="fw-bold text-success">₹57,300</td>
                    <td class="text-nowrap">28-Feb-2026</td>
                    <td><span class="status-pill status-approved">Disbursed</span></td>
                    <td>
                        <a href="payroll-report.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" data-bs-title="View Payslip"><i class="bi bi-receipt"></i></a>
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
