<?php include 'header.php'; ?>

 

<style>
    :root {
        --gh-primary: #087a24;
        --gh-primary-hover: #065e1c;
        --gh-border: #e2e8f0;
        --gh-dark: #0f172a;
    }

    /* Top Navigation Tabs */
    .ot-nav-tabs {
        display: flex;
        gap: 8px;
        border-bottom: 2px solid #e2e8f0;
        margin-bottom: 24px;
        overflow-x: auto;
        padding-bottom: 2px;
    }

    .ot-tab-btn {
        background: transparent;
        border: none;
        padding: 10px 18px;
        font-size: 13.5px;
        font-weight: 700;
        color: #64748b;
        border-bottom: 3px solid transparent;
        margin-bottom: -2px;
        white-space: nowrap;
        transition: all 0.2s ease;
        border-radius: 6px 6px 0 0;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .ot-tab-btn:hover {
        color: var(--gh-primary);
        background: #f8fafc;
    }

    .ot-tab-btn.active {
        color: var(--gh-primary);
        border-bottom-color: var(--gh-primary);
        background: #f0fdf4;
    }

    .ot-tab-btn .badge-count {
        background: #e2e8f0;
        color: #334155;
        font-size: 11px;
        padding: 2px 7px;
        border-radius: 12px;
    }

    .ot-tab-btn.active .badge-count {
        background: var(--gh-primary);
        color: #ffffff;
    }

    /* KPI Cards */
    .ot-kpi-card {
        background: #ffffff;
        border: 1px solid var(--gh-border);
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: 0 4px 16px rgba(15, 23, 42, 0.03);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        height: 100%;
    }

    .ot-kpi-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.07);
    }

    .ot-kpi-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 20px;
        margin-bottom: 12px;
    }

    .ot-kpi-icon.emp { background: #e0f2fe; color: #0284c7; }
    .ot-kpi-icon.hours { background: #fef3c7; color: #d97706; }
    .ot-kpi-icon.approved { background: #dcfce7; color: #16a34a; }
    .ot-kpi-icon.rejected { background: #fee2e2; color: #dc2626; }
    .ot-kpi-icon.amount { background: #f3e8ff; color: #7e22ce; }

    /* Flow Stepper */
    .flow-stepper {
        display: flex;
        align-items: center;
        gap: 8px;
        overflow-x: auto;
        padding: 14px 18px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .flow-step {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        font-weight: 700;
        color: #475569;
        white-space: nowrap;
    }

    .flow-step-num {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        background: #cbd5e1;
        color: #0f172a;
        display: grid;
        place-items: center;
        font-size: 11px;
    }

    .flow-arrow {
        color: #94a3b8;
        font-size: 12px;
    }

    .ot-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11.5px;
        font-weight: 700;
    }
    .ot-badge.assigned { background: #e0f2fe; color: #0369a1; }
    .ot-badge.pending { background: #fef3c7; color: #b45309; }
    .ot-badge.approved { background: #dcfce7; color: #15803d; }
    .ot-badge.rejected { background: #fee2e2; color: #b91c1c; }

    .btn-action-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: 1px solid transparent;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        transition: all 0.2s ease;
    }

    .btn-action-icon.view { background: #f0fdf4; color: #15803d; border-color: #bbf7d0; }
    .btn-action-icon.view:hover { background: #15803d; color: #fff; }
    .btn-action-icon.edit { background: #eff6ff; color: #2563eb; border-color: #bfdbfe; }
    .btn-action-icon.edit:hover { background: #2563eb; color: #fff; }
</style>

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">
                <i class="bi bi-clock-history text-success"></i> Overtime (OT) Management & Approvals
            </h4>
            <p class="text-muted small mb-0">Company OT assignments, employee requests, manager approvals, biometric validation, and payroll payout integration.</p>
        </div>
        <div class="d-flex flex-wrap align-items-center gap-2">
            <button class="btn btn-sm btn-outline-success fw-bold px-3 py-2" data-bs-toggle="modal" data-bs-target="#assignOTModal">
                <i class="bi bi-building-add me-1"></i> Assign OT (Company / Manager)
            </button>
            <button class="btn btn-sm btn-success fw-bold px-3 py-2" data-bs-toggle="modal" data-bs-target="#requestOTModal">
                <i class="bi bi-person-plus me-1"></i> Apply OT Request (Employee)
            </button>
        </div>
    </div>

    <!-- Top KPI Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-xl-2 col-md-4">
            <div class="ot-kpi-card">
                <div class="ot-kpi-icon emp"><i class="bi bi-people-fill"></i></div>
                <div class="text-muted small fw-bold">Total OT Employees</div>
                <div class="fs-4 fw-extrabold text-dark" id="kpi-total-emp">25</div>
                <div class="small text-muted">Employees with OT</div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4">
            <div class="ot-kpi-card">
                <div class="ot-kpi-icon hours"><i class="bi bi-hourglass-split"></i></div>
                <div class="text-muted small fw-bold">Total OT Hours</div>
                <div class="fs-4 fw-extrabold text-warning" id="kpi-total-hours">186 hrs</div>
                <div class="small text-muted">Logged this month</div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4">
            <div class="ot-kpi-card">
                <div class="ot-kpi-icon approved"><i class="bi bi-check-circle-fill"></i></div>
                <div class="text-muted small fw-bold">Approved OT</div>
                <div class="fs-4 fw-extrabold text-success" id="kpi-approved-hours">170 hrs</div>
                <div class="small text-success fw-bold">Ready for Payroll</div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4">
            <div class="ot-kpi-card">
                <div class="ot-kpi-icon rejected"><i class="bi bi-x-circle-fill"></i></div>
                <div class="text-muted small fw-bold">Rejected OT</div>
                <div class="fs-4 fw-extrabold text-danger" id="kpi-rejected-hours">16 hrs</div>
                <div class="small text-danger fw-bold">Not Payable</div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4">
            <div class="ot-kpi-card">
                <div class="ot-kpi-icon hours bg-info-subtle text-info"><i class="bi bi-clock"></i></div>
                <div class="text-muted small fw-bold">Pending Review</div>
                <div class="fs-4 fw-extrabold text-info" id="kpi-pending-count">4</div>
                <div class="small text-info fw-bold">Awaiting Manager</div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4">
            <div class="ot-kpi-card border-purple-subtle bg-purple-subtle">
                <div class="ot-kpi-icon amount"><i class="bi bi-wallet2"></i></div>
                <div class="text-muted small fw-bold text-purple">Total OT Amount</div>
                <div class="fs-4 fw-extrabold text-purple" id="kpi-total-amount">₹ 28,500</div>
                <div class="small text-purple fw-bold">Calculated Payout</div>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="ot-nav-tabs">
        <button class="ot-tab-btn active" onclick="switchTab('queue', this)">
            <i class="bi bi-inbox-fill"></i> Approval Queue <span class="badge-count" id="badge-queue-count">4</span>
        </button>
        <button class="ot-tab-btn" onclick="switchTab('history', this)">
            <i class="bi bi-clock-history"></i> OT History <span class="badge-count" id="badge-history-count">18</span>
        </button>
        <button class="ot-tab-btn" onclick="switchTab('validation', this)">
            <i class="bi bi-fingerprint"></i> Attendance Validation <span class="badge-count text-success">Verified</span>
        </button>
        <button class="ot-tab-btn" onclick="switchTab('payroll', this)">
            <i class="bi bi-cash-stack"></i> Payroll Payout <span class="badge-count text-purple">₹28.5k</span>
        </button>
        <button class="ot-tab-btn" onclick="switchTab('reports', this)">
            <i class="bi bi-file-earmark-bar-graph"></i> OT Reports
        </button>
    </div>

    <!-- TAB 1: APPROVAL QUEUE (ASSIGNMENT & REQUESTS) -->
    <div id="tab-queue" class="tab-content-sec">
        <!-- Complete Flow Stepper -->
        <div class="flow-stepper">
            <div class="flow-step"><span class="flow-step-num">1</span> Initiate (Assign / Request)</div>
            <i class="bi bi-chevron-right flow-arrow"></i>
            <div class="flow-step"><span class="flow-step-num">2</span> Manager Review</div>
            <i class="bi bi-chevron-right flow-arrow"></i>
            <div class="flow-step"><span class="flow-step-num">3</span> Approve / Reject</div>
            <i class="bi bi-chevron-right flow-arrow"></i>
            <div class="flow-step"><span class="flow-step-num">4</span> Attendance Punch Validation</div>
            <i class="bi bi-chevron-right flow-arrow"></i>
            <div class="flow-step"><span class="flow-step-num">5</span> Payroll Payout</div>
            <i class="bi bi-chevron-right flow-arrow"></i>
            <div class="flow-step text-success"><span class="flow-step-num bg-success text-white">6</span> Complete</div>
        </div>

        <!-- Filter Bar for Tab 1: Approval Queue -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body p-3">
                <div class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-building me-1"></i> Filter Department</label>
                        <select class="form-select form-select-sm" id="queueDeptFilter" onchange="filterQueueTable()">
                            <option value="">All Departments</option>
                            <option value="Engineering">Engineering</option>
                            <option value="HR & Admin">HR & Admin</option>
                            <option value="Operations">Operations</option>
                            <option value="Sales">Sales & Marketing</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-person me-1"></i> Filter Employee</label>
                        <select class="form-select form-select-sm" id="queueEmpFilter" onchange="filterQueueTable()">
                            <option value="">All Employees</option>
                            <option value="Rajesh Kumar">Rajesh Kumar (EMP0102)</option>
                            <option value="Priya Sharma">Priya Sharma (EMP0105)</option>
                            <option value="Anish Verma">Anish Verma (EMP0142)</option>
                            <option value="Suresh Raina">Suresh Raina (EMP0190)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-search me-1"></i> Search Keyword</label>
                        <input type="text" class="form-control form-control-sm" id="searchQueue" placeholder="Search employee, project..." onkeyup="filterQueueTable()">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="ot-queue-report">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
                    <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
                </div>
                <div class="small text-muted fw-semibold">Showing filtered pending approval entries</div>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                <table class="table-modern w-100 mb-0" id="otQueueTable">
                    <thead>
                        <tr>
                            <th class="text-nowrap">S.No</th>
                            <th class="text-nowrap">Date</th>
                            <th class="text-nowrap">Employee ID & Name</th>
                            <th class="text-nowrap">Department</th>
                            <th class="text-nowrap">Initiated By</th>
                            <th class="text-nowrap">OT Time & Hours</th>
                            <th class="text-nowrap">Work / Project & Reason</th>
                            <th class="text-nowrap">OT Type</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>22 Sep 2026</td>
                            <td>
                                <div class="fw-bold text-dark">EMP0102 - Rajesh Kumar</div>
                                <div class="text-muted small">rajesh.k@company.com</div>
                            </td>
                            <td>Engineering</td>
                            <td><span class="badge bg-primary-subtle text-primary fw-bold"><i class="bi bi-building me-1"></i> Company Assigned</span></td>
                            <td>
                                <div class="fw-bold text-dark">6:00 PM – 9:00 PM</div>
                                <span class="badge bg-light text-dark border">3.0 Hours</span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">Production Support</div>
                                <div class="text-muted small">Release hotfix deployment support</div>
                            </td>
                            <td><span class="badge bg-success-subtle text-success">Standard 1.5x</span></td>
                            <td><span class="ot-badge assigned"><i class="bi bi-person-check-fill"></i> Assigned</span></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openReviewOTModal('OT-2026-901', 'Rajesh Kumar (EMP0102)', 'Engineering', '22 Sep 2026', '6:00 PM - 9:00 PM', '3.0 Hours', 'Production Support', 'Company Assigned', this)"><i class="bi bi-shield-check"></i> Review & Approve</button>
                                    <button class="btn btn-sm btn-outline-danger" title="Reject Request" onclick="rejectOTDirect(this)"><i class="bi bi-x-lg"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>22 Sep 2026</td>
                            <td>
                                <div class="fw-bold text-dark">EMP0105 - Priya Sharma</div>
                                <div class="text-muted small">priya.s@company.com</div>
                            </td>
                            <td>HR & Admin</td>
                            <td><span class="badge bg-info-subtle text-info fw-bold"><i class="bi bi-person me-1"></i> Employee Request</span></td>
                            <td>
                                <div class="fw-bold text-dark">6:30 PM – 8:30 PM</div>
                                <span class="badge bg-light text-dark border">2.0 Hours</span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">Monthly Payroll Processing</div>
                                <div class="text-muted small">Audit and verify September payslips</div>
                            </td>
                            <td><span class="badge bg-success-subtle text-success">Standard 1.5x</span></td>
                            <td><span class="ot-badge pending"><i class="bi bi-clock"></i> Pending Approval</span></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openReviewOTModal('OT-2026-902', 'Priya Sharma (EMP0105)', 'HR & Admin', '22 Sep 2026', '6:30 PM - 8:30 PM', '2.0 Hours', 'Monthly Payroll Audit', 'Employee Request', this)"><i class="bi bi-shield-check"></i> Review & Approve</button>
                                    <button class="btn btn-sm btn-outline-danger" title="Reject Request" onclick="rejectOTDirect(this)"><i class="bi bi-x-lg"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>21 Sep 2026</td>
                            <td>
                                <div class="fw-bold text-dark">EMP0142 - Anish Verma</div>
                                <div class="text-muted small">anish.v@company.com</div>
                            </td>
                            <td>Sales & Marketing</td>
                            <td><span class="badge bg-info-subtle text-info fw-bold"><i class="bi bi-person me-1"></i> Employee Request</span></td>
                            <td>
                                <div class="fw-bold text-dark">7:00 PM – 10:00 PM</div>
                                <span class="badge bg-light text-dark border">3.0 Hours</span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">Client Demo Call</div>
                                <div class="text-muted small">US Client product walkthrough presentation</div>
                            </td>
                            <td><span class="badge bg-warning-subtle text-warning-emphasis">Night Shift 1.5x</span></td>
                            <td><span class="ot-badge pending"><i class="bi bi-clock"></i> Pending Approval</span></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openReviewOTModal('OT-2026-903', 'Anish Verma (EMP0142)', 'Sales & Marketing', '21 Sep 2026', '7:00 PM - 10:00 PM', '3.0 Hours', 'Client Demo Presentation', 'Employee Request', this)"><i class="bi bi-shield-check"></i> Review & Approve</button>
                                    <button class="btn btn-sm btn-outline-danger" title="Reject Request" onclick="rejectOTDirect(this)"><i class="bi bi-x-lg"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>20 Sep 2026</td>
                            <td>
                                <div class="fw-bold text-dark">EMP0190 - Suresh Raina</div>
                                <div class="text-muted small">suresh.r@company.com</div>
                            </td>
                            <td>Operations</td>
                            <td><span class="badge bg-primary-subtle text-primary fw-bold"><i class="bi bi-building me-1"></i> Company Assigned</span></td>
                            <td>
                                <div class="fw-bold text-dark">10:00 AM – 4:00 PM</div>
                                <span class="badge bg-light text-dark border">6.0 Hours</span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">Sunday Warehouse Audit</div>
                                <div class="text-muted small">Quarterly physical inventory count</div>
                            </td>
                            <td><span class="badge bg-danger-subtle text-danger">Holiday 2.0x</span></td>
                            <td><span class="ot-badge assigned"><i class="bi bi-person-check-fill"></i> Assigned</span></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openReviewOTModal('OT-2026-904', 'Suresh Raina (EMP0190)', 'Operations', '20 Sep 2026', '10:00 AM - 4:00 PM', '6.0 Hours', 'Sunday Warehouse Audit', 'Company Assigned', this)"><i class="bi bi-shield-check"></i> Review & Approve</button>
                                    <button class="btn btn-sm btn-outline-danger" title="Reject Request" onclick="rejectOTDirect(this)"><i class="bi bi-x-lg"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- TAB 2: OT HISTORY -->
    <div id="tab-history" class="tab-content-sec d-none">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3 text-dark"><i class="bi bi-funnel-fill text-success me-2"></i> Filter OT History Archive</h6>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-muted">Department</label>
                        <select class="form-select form-select-sm" id="histDept" onchange="filterHistoryTable()">
                            <option value="">All Departments</option>
                            <option value="Engineering">Engineering</option>
                            <option value="HR & Admin">HR & Admin</option>
                            <option value="Operations">Operations</option>
                            <option value="Sales">Sales & Marketing</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-muted">Employee</label>
                        <select class="form-select form-select-sm" id="histEmp" onchange="filterHistoryTable()">
                            <option value="">All Employees</option>
                            <option value="Rajesh Kumar">Rajesh Kumar (EMP0102)</option>
                            <option value="Priya Sharma">Priya Sharma (EMP0105)</option>
                            <option value="Anish Verma">Anish Verma (EMP0142)</option>
                            <option value="Suresh Raina">Suresh Raina (EMP0190)</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-muted">Approval Status</label>
                        <select class="form-select form-select-sm" id="histStatus" onchange="filterHistoryTable()">
                            <option value="">All Statuses</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-muted">Search Employee / ID</label>
                        <input type="text" class="form-control form-control-sm" id="histSearch" placeholder="Name or ID..." onkeyup="filterHistoryTable()">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="ot-history-report">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
                    <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
                </div>

                <div class="mt-search-wrap">
                    <i class="bi bi-search mt-search-icon"></i>
                    <input type="text" class="mt-search-input" placeholder="Search history..." id="histSearchInput" onkeyup="filterHistoryTable()">
                </div>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                <table class="table-modern w-100 mb-0" id="otHistoryTable">
                    <thead>
                        <tr>
                            <th class="text-nowrap">S.No</th>
                            <th class="text-nowrap">Date</th>
                            <th class="text-nowrap">Employee</th>
                            <th class="text-nowrap">Department</th>
                            <th class="text-nowrap">OT Time Slot</th>
                            <th class="text-nowrap">OT Hours</th>
                            <th class="text-nowrap">Rate / Hr & Multiplier</th>
                            <th class="text-nowrap">Total OT Pay (₹)</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap">Approved By & Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>19 Sep 2026</td>
                            <td class="fw-bold text-dark">Rajesh Kumar (EMP0102)</td>
                            <td>Engineering</td>
                            <td>6:00 PM – 9:00 PM</td>
                            <td>3.0 hrs</td>
                            <td>₹ 100/hr × 1.5x</td>
                            <td class="fw-bold text-success">₹ 450</td>
                            <td><span class="ot-badge approved"><i class="bi bi-check-circle-fill"></i> Approved</span></td>
                            <td class="small text-muted">Approved by HR Manager (Production fix verified)</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>18 Sep 2026</td>
                            <td class="fw-bold text-dark">Priya Sharma (EMP0105)</td>
                            <td>HR & Admin</td>
                            <td>6:00 PM – 8:00 PM</td>
                            <td>2.0 hrs</td>
                            <td>₹ 100/hr × 1.5x</td>
                            <td class="fw-bold text-success">₹ 300</td>
                            <td><span class="ot-badge approved"><i class="bi bi-check-circle-fill"></i> Approved</span></td>
                            <td class="small text-muted">Approved by Admin Head</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>17 Sep 2026</td>
                            <td class="fw-bold text-dark">Suresh Raina (EMP0190)</td>
                            <td>Operations</td>
                            <td>5:30 PM – 9:30 PM</td>
                            <td>4.0 hrs</td>
                            <td>₹ 120/hr × 1.5x</td>
                            <td class="fw-bold text-success">₹ 720</td>
                            <td><span class="ot-badge approved"><i class="bi bi-check-circle-fill"></i> Approved</span></td>
                            <td class="small text-muted">Approved by Ops Director</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>15 Sep 2026</td>
                            <td class="fw-bold text-dark">Anish Verma (EMP0142)</td>
                            <td>Sales & Marketing</td>
                            <td>7:00 PM – 9:00 PM</td>
                            <td>2.0 hrs</td>
                            <td>₹ 90/hr × 1.5x</td>
                            <td class="fw-bold text-danger">₹ 0</td>
                            <td><span class="ot-badge rejected"><i class="bi bi-x-circle-fill"></i> Rejected</span></td>
                            <td class="small text-muted">Rejected (Prior manager pre-approval missing)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- TAB 3: ATTENDANCE PUNCH VALIDATION -->
    <div id="tab-validation" class="tab-content-sec d-none">
        <!-- Filter Bar for Tab 3 -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body p-3">
                <div class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-building me-1"></i> Filter Department</label>
                        <select class="form-select form-select-sm" id="valDeptFilter" onchange="filterValidationTable()">
                            <option value="">All Departments</option>
                            <option value="Engineering">Engineering</option>
                            <option value="HR & Admin">HR & Admin</option>
                            <option value="Operations">Operations</option>
                            <option value="Sales">Sales & Marketing</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-person me-1"></i> Filter Employee</label>
                        <select class="form-select form-select-sm" id="valEmpFilter" onchange="filterValidationTable()">
                            <option value="">All Employees</option>
                            <option value="Rajesh Kumar">Rajesh Kumar (EMP0102)</option>
                            <option value="Priya Sharma">Priya Sharma (EMP0105)</option>
                            <option value="Anish Verma">Anish Verma (EMP0142)</option>
                            <option value="Suresh Raina">Suresh Raina (EMP0190)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-search me-1"></i> Search Validation</label>
                        <input type="text" class="form-control form-control-sm" id="valSearchInput" placeholder="Search validation..." onkeyup="filterValidationTable()">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-custom js-report-table p-0 overflow-hidden mb-4" data-export-name="ot-validation-report">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
                    <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
                </div>
                <div class="small text-muted fw-semibold">Biometric Attendance Punch Verification</div>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                <table class="table-modern w-100 mb-0" id="otValidationTable">
                    <thead>
                        <tr>
                            <th class="text-nowrap">S.No</th>
                            <th class="text-nowrap">Employee</th>
                            <th class="text-nowrap">Department</th>
                            <th class="text-nowrap">Date</th>
                            <th class="text-nowrap">Shift Hours</th>
                            <th class="text-nowrap">Actual Punch Out</th>
                            <th class="text-nowrap">Approved OT Hours</th>
                            <th class="text-nowrap">Biometric Overstay</th>
                            <th class="text-nowrap">Validation Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="fw-bold text-dark">Rajesh Kumar (EMP0102)</td>
                            <td>Engineering</td>
                            <td>19 Sep 2026</td>
                            <td>9:00 AM – 6:00 PM</td>
                            <td><code class="text-primary fw-bold">9:05 PM</code></td>
                            <td>3.0 Hours</td>
                            <td>3 hrs 5 mins</td>
                            <td><span class="badge bg-success-subtle text-success fw-bold"><i class="bi bi-check-all"></i> Fully Validated</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="fw-bold text-dark">Priya Sharma (EMP0105)</td>
                            <td>HR & Admin</td>
                            <td>18 Sep 2026</td>
                            <td>9:00 AM – 6:00 PM</td>
                            <td><code class="text-primary fw-bold">8:02 PM</code></td>
                            <td>2.0 Hours</td>
                            <td>2 hrs 2 mins</td>
                            <td><span class="badge bg-success-subtle text-success fw-bold"><i class="bi bi-check-all"></i> Fully Validated</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="fw-bold text-dark">Suresh Raina (EMP0190)</td>
                            <td>Operations</td>
                            <td>17 Sep 2026</td>
                            <td>8:00 AM – 5:00 PM</td>
                            <td><code class="text-danger fw-bold">8:45 PM</code> (Early Exit)</td>
                            <td>4.0 Hours</td>
                            <td>3 hrs 45 mins</td>
                            <td><span class="badge bg-warning-subtle text-warning-emphasis fw-bold"><i class="bi bi-exclamation-triangle"></i> 15 Min Punch Shortfall</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- TAB 4: PAYROLL PAYOUT INTEGRATION -->
    <div id="tab-payroll" class="tab-content-sec d-none">
        <!-- Filter Bar for Tab 4 -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body p-3">
                <div class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-building me-1"></i> Filter Department</label>
                        <select class="form-select form-select-sm" id="payDeptFilter" onchange="filterPayrollTable()">
                            <option value="">All Departments</option>
                            <option value="Engineering">Engineering</option>
                            <option value="HR & Admin">HR & Admin</option>
                            <option value="Operations">Operations</option>
                            <option value="Sales">Sales & Marketing</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-person me-1"></i> Filter Employee</label>
                        <select class="form-select form-select-sm" id="payEmpFilter" onchange="filterPayrollTable()">
                            <option value="">All Employees</option>
                            <option value="Rajesh Kumar">Rajesh Kumar (EMP0102)</option>
                            <option value="Priya Sharma">Priya Sharma (EMP0105)</option>
                            <option value="Anish Verma">Anish Verma (EMP0142)</option>
                            <option value="Suresh Raina">Suresh Raina (EMP0190)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-search me-1"></i> Search Payroll</label>
                        <input type="text" class="form-control form-control-sm" id="payrollSearchInput" placeholder="Search payroll..." onkeyup="filterPayrollTable()">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="ot-payroll-report">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
                    <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
                    <button class="btn btn-sm btn-purple fw-bold ms-2" onclick="alert('OT Payroll calculations synced with monthly Salary Slips!')"><i class="bi bi-arrow-repeat me-1"></i> Sync to Payroll Slips</button>
                </div>
                <div class="small text-muted fw-semibold">Calculated OT Payout Summary</div>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                <table class="table-modern w-100 mb-0" id="otPayrollTable">
                    <thead>
                        <tr>
                            <th class="text-nowrap">S.No</th>
                            <th class="text-nowrap">Emp ID & Name</th>
                            <th class="text-nowrap">Department</th>
                            <th class="text-nowrap">Base Hourly Rate (₹)</th>
                            <th class="text-nowrap">Approved OT Hours</th>
                            <th class="text-nowrap">OT Multiplier Rate</th>
                            <th class="text-nowrap">Gross OT Payout (₹)</th>
                            <th class="text-nowrap">Payroll Slip Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="fw-bold text-dark">EMP0102 - Rajesh Kumar</td>
                            <td>Engineering</td>
                            <td>₹ 150 / hr</td>
                            <td>18.0 hrs</td>
                            <td>1.5x (₹ 225/hr)</td>
                            <td class="fw-bold text-success fs-6">₹ 4,050</td>
                            <td><span class="badge bg-success-subtle text-success">Synced to Payslip</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="fw-bold text-dark">EMP0105 - Priya Sharma</td>
                            <td>HR & Admin</td>
                            <td>₹ 140 / hr</td>
                            <td>12.0 hrs</td>
                            <td>1.5x (₹ 210/hr)</td>
                            <td class="fw-bold text-success fs-6">₹ 2,520</td>
                            <td><span class="badge bg-success-subtle text-success">Synced to Payslip</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="fw-bold text-dark">EMP0190 - Suresh Raina</td>
                            <td>Operations</td>
                            <td>₹ 130 / hr</td>
                            <td>24.0 hrs</td>
                            <td>2.0x Holiday (₹ 260/hr)</td>
                            <td class="fw-bold text-success fs-6">₹ 6,240</td>
                            <td><span class="badge bg-success-subtle text-success">Synced to Payslip</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- TAB 5: OT REPORTS & ANALYTICS -->
    <div id="tab-reports" class="tab-content-sec d-none">
        <!-- Filter Bar for Tab 5 -->
        <div class="card border-0 shadow-sm rounded-4 mb-3">
            <div class="card-body p-3">
                <div class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-building me-1"></i> Filter Department</label>
                        <select class="form-select form-select-sm" id="rptDeptFilter" onchange="filterReportsTable()">
                            <option value="">All Departments</option>
                            <option value="Engineering">Engineering</option>
                            <option value="HR & Admin">HR & Admin</option>
                            <option value="Operations">Operations</option>
                            <option value="Sales">Sales & Marketing</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-person me-1"></i> Filter Employee</label>
                        <select class="form-select form-select-sm" id="rptEmpFilter" onchange="filterReportsTable()">
                            <option value="">All Employees</option>
                            <option value="Rajesh Kumar">Rajesh Kumar (EMP0102)</option>
                            <option value="Priya Sharma">Priya Sharma (EMP0105)</option>
                            <option value="Anish Verma">Anish Verma (EMP0142)</option>
                            <option value="Suresh Raina">Suresh Raina (EMP0190)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted mb-1"><i class="bi bi-search me-1"></i> Search Report</label>
                        <input type="text" class="form-control form-control-sm" id="deptReportSearchInput" placeholder="Search department, employee..." onkeyup="filterReportsTable()">
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3 text-dark"><i class="bi bi-file-earmark-text text-success me-2"></i> HR Executive Overtime Summary Report</h6>
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded-4 border">
                            <div class="text-muted small fw-bold">Total OT Requests</div>
                            <div class="fs-4 fw-extrabold text-dark">29 Requests</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-success-subtle rounded-4 border border-success-subtle">
                            <div class="text-success small fw-bold">Approved Hours</div>
                            <div class="fs-4 fw-extrabold text-success">170 Hours (91.4%)</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-danger-subtle rounded-4 border border-danger-subtle">
                            <div class="text-danger small fw-bold">Rejected Hours</div>
                            <div class="fs-4 fw-extrabold text-danger">16 Hours (8.6%)</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-purple-subtle rounded-4 border border-purple-subtle">
                            <div class="text-purple small fw-bold">Total OT Expenditure</div>
                            <div class="fs-4 fw-extrabold text-purple">₹ 28,500</div>
                        </div>
                    </div>
                </div>

                <!-- Department Summary Table -->
                <h6 class="fw-bold mb-2 text-dark mt-2"><i class="bi bi-diagram-3-fill text-primary me-1"></i> Department-Wise OT Summary</h6>
                <div class="card-custom js-report-table p-0 overflow-hidden mb-4" data-export-name="ot-department-summary">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
                            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
                        </div>
                        <div class="small text-muted fw-semibold">Department Breakdown</div>
                    </div>

                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 mb-0" id="otDepartmentReportTable">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">S.No</th>
                                    <th class="text-nowrap">Department</th>
                                    <th class="text-nowrap">Total OT Employees</th>
                                    <th class="text-nowrap">Total OT Hours</th>
                                    <th class="text-nowrap">Approved Hours</th>
                                    <th class="text-nowrap">Rejected Hours</th>
                                    <th class="text-nowrap">Total Cost (₹)</th>
                                    <th class="text-nowrap text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="fw-bold text-dark">Engineering & IT</td>
                                    <td>10</td>
                                    <td>72 hrs</td>
                                    <td>68 hrs</td>
                                    <td>4 hrs</td>
                                    <td class="fw-bold text-success">₹ 11,200</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openDeptOTReportModal('Engineering & IT', '10 Employees', '72 hrs', '68 hrs', '4 hrs', '₹ 11,200')">
                                            <i class="bi bi-eye-fill me-1"></i> View Report
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="fw-bold text-dark">Operations & Logistics</td>
                                    <td>8</td>
                                    <td>60 hrs</td>
                                    <td>54 hrs</td>
                                    <td>6 hrs</td>
                                    <td class="fw-bold text-success">₹ 9,600</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openDeptOTReportModal('Operations & Logistics', '8 Employees', '60 hrs', '54 hrs', '6 hrs', '₹ 9,600')">
                                            <i class="bi bi-eye-fill me-1"></i> View Report
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="fw-bold text-dark">HR & Admin</td>
                                    <td>4</td>
                                    <td>30 hrs</td>
                                    <td>28 hrs</td>
                                    <td>2 hrs</td>
                                    <td class="fw-bold text-success">₹ 4,500</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openDeptOTReportModal('HR & Admin', '4 Employees', '30 hrs', '28 hrs', '2 hrs', '₹ 4,500')">
                                            <i class="bi bi-eye-fill me-1"></i> View Report
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="fw-bold text-dark">Sales & Marketing</td>
                                    <td>3</td>
                                    <td>24 hrs</td>
                                    <td>20 hrs</td>
                                    <td>4 hrs</td>
                                    <td class="fw-bold text-success">₹ 3,200</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openDeptOTReportModal('Sales & Marketing', '3 Employees', '24 hrs', '20 hrs', '4 hrs', '₹ 3,200')">
                                            <i class="bi bi-eye-fill me-1"></i> View Report
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Employee Overtime Salary Breakdown Report Table with Action Eye Modal Trigger -->
                <h6 class="fw-bold mb-2 text-dark mt-4"><i class="bi bi-wallet2 text-success me-1"></i> Employee Overtime Salary Payout & Calculation Report</h6>
                <div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="ot-employee-salary-report">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
                            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
                        </div>
                        <div class="small text-muted fw-semibold">Click "View OT Salary Details" to see rate calculations</div>
                    </div>

                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 mb-0" id="otEmployeeSalaryReportTable">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">S.No</th>
                                    <th class="text-nowrap">Employee ID & Name</th>
                                    <th class="text-nowrap">Department</th>
                                    <th class="text-nowrap">Monthly Salary (₹)</th>
                                    <th class="text-nowrap">Base Hourly Rate</th>
                                    <th class="text-nowrap">Approved OT Hours</th>
                                    <th class="text-nowrap">Standard (1.5x)</th>
                                    <th class="text-nowrap">Holiday (2.0x)</th>
                                    <th class="text-nowrap">Total OT Salary (₹)</th>
                                    <th class="text-nowrap text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="fw-bold text-dark">EMP0102 - Rajesh Kumar</div>
                                        <div class="text-muted small">rajesh.k@company.com</div>
                                    </td>
                                    <td>Engineering</td>
                                    <td>₹ 45,000 / mo</td>
                                    <td>₹ 216.35 / hr</td>
                                    <td><span class="badge bg-light text-dark border fw-bold">18.0 hrs</span></td>
                                    <td>12.0 hrs</td>
                                    <td>6.0 hrs</td>
                                    <td class="fw-bold text-success fs-6">₹ 5,841</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openOTSalaryModal('EMP0102', 'Rajesh Kumar', 'Engineering & IT', '₹ 45,000 / mo', '₹ 216.35 / hr', '18.0 Hours', '12.0 hrs (1.5x Rate)', '6.0 hrs (2.0x Rate)', '₹ 5,841')">
                                            <i class="bi bi-eye-fill"></i> View OT Salary Details
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="fw-bold text-dark">EMP0105 - Priya Sharma</div>
                                        <div class="text-muted small">priya.s@company.com</div>
                                    </td>
                                    <td>HR & Admin</td>
                                    <td>₹ 38,000 / mo</td>
                                    <td>₹ 182.69 / hr</td>
                                    <td><span class="badge bg-light text-dark border fw-bold">12.0 hrs</span></td>
                                    <td>12.0 hrs</td>
                                    <td>0.0 hrs</td>
                                    <td class="fw-bold text-success fs-6">₹ 3,288</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openOTSalaryModal('EMP0105', 'Priya Sharma', 'HR & Admin', '₹ 38,000 / mo', '₹ 182.69 / hr', '12.0 Hours', '12.0 hrs (1.5x Rate)', '0.0 hrs (2.0x Rate)', '₹ 3,288')">
                                            <i class="bi bi-eye-fill"></i> View OT Salary Details
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="fw-bold text-dark">EMP0190 - Suresh Raina</div>
                                        <div class="text-muted small">suresh.r@company.com</div>
                                    </td>
                                    <td>Operations</td>
                                    <td>₹ 40,000 / mo</td>
                                    <td>₹ 192.31 / hr</td>
                                    <td><span class="badge bg-light text-dark border fw-bold">24.0 hrs</span></td>
                                    <td>8.0 hrs</td>
                                    <td>16.0 hrs</td>
                                    <td class="fw-bold text-success fs-6">₹ 8,462</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openOTSalaryModal('EMP0190', 'Suresh Raina', 'Operations & Logistics', '₹ 40,000 / mo', '₹ 192.31 / hr', '24.0 Hours', '8.0 hrs (1.5x Rate)', '16.0 hrs (2.0x Rate)', '₹ 8,462')">
                                            <i class="bi bi-eye-fill"></i> View OT Salary Details
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="fw-bold text-dark">EMP0142 - Anish Verma</div>
                                        <div class="text-muted small">anish.v@company.com</div>
                                    </td>
                                    <td>Sales & Marketing</td>
                                    <td>₹ 35,000 / mo</td>
                                    <td>₹ 168.27 / hr</td>
                                    <td><span class="badge bg-light text-dark border fw-bold">10.0 hrs</span></td>
                                    <td>10.0 hrs</td>
                                    <td>0.0 hrs</td>
                                    <td class="fw-bold text-success fs-6">₹ 2,524</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openOTSalaryModal('EMP0142', 'Anish Verma', 'Sales & Marketing', '₹ 35,000 / mo', '₹ 168.27 / hr', '10.0 Hours', '10.0 hrs (1.5x Rate)', '0.0 hrs (2.0x Rate)', '₹ 2,524')">
                                            <i class="bi bi-eye-fill"></i> View OT Salary Details
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL 1: COMPANY / MANAGER OT ASSIGNMENT -->
<div class="modal fade" id="assignOTModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-building-add text-success me-2"></i> Company / Manager OT Assignment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="saveOTAssignment(event)">
                <div class="modal-body p-4">
                    <div class="alert alert-info py-2 px-3 small rounded-3 mb-3">
                        <i class="bi bi-info-circle-fill me-1"></i> HR/Manager assigns overtime work for production support, shift coverage, or urgent project deadlines. The employee will receive an instant notification.
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Select Employee <span class="text-danger">*</span></label>
                            <select class="form-select" id="asgnEmpSelect" onchange="autoFillAsgnDept()" required>
                                <option value="">-- Choose Employee --</option>
                                <option value="Rajesh Kumar (EMP0102)" data-dept="Engineering" data-shift="9:00 AM - 6:00 PM">Rajesh Kumar (EMP0102)</option>
                                <option value="Priya Sharma (EMP0105)" data-dept="HR & Admin" data-shift="9:00 AM - 6:00 PM">Priya Sharma (EMP0105)</option>
                                <option value="Anish Verma (EMP0142)" data-dept="Sales & Marketing" data-shift="9:00 AM - 6:00 PM">Anish Verma (EMP0142)</option>
                                <option value="Suresh Raina (EMP0190)" data-dept="Operations" data-shift="8:00 AM - 5:00 PM">Suresh Raina (EMP0190)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Department</label>
                            <input type="text" class="form-control bg-light" id="asgnDept" placeholder="Auto-filled Department" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">OT Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" value="2026-09-22" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Regular Shift</label>
                            <input type="text" class="form-control bg-light" id="asgnShift" value="9:00 AM - 6:00 PM" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">OT Type <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option value="Standard OT 1.5x">Standard OT (1.5x Pay)</option>
                                <option value="Holiday OT 2.0x">Weekend / Holiday OT (2.0x Pay)</option>
                                <option value="Night Shift 1.5x">Night Shift OT (1.5x Pay)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">OT Start Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="asgnStartTime" value="18:00" onchange="calcAsgnHours()" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">OT End Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="asgnEndTime" value="21:00" onchange="calcAsgnHours()" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Calculated OT Hours</label>
                            <input type="text" class="form-control bg-light fw-bold text-success" id="asgnHours" value="3.0 Hours" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-dark">Work / Project Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="e.g. Production Deployment / Client Demo" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-dark">Assignment Reason & Remarks</label>
                            <textarea class="form-control" rows="2" placeholder="Explain requirement for OT assignment..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success fw-bold px-4"><i class="bi bi-send-check me-1"></i> Assign OT & Notify Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL 2: EMPLOYEE OT REQUEST -->
<div class="modal fade" id="requestOTModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-person-plus text-primary me-2"></i> Employee OT Self-Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="saveOTRequest(event)">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Select Employee <span class="text-danger">*</span></label>
                            <select class="form-select" id="reqEmpSelect" required>
                                <option value="Rajesh Kumar (EMP0102)">Rajesh Kumar (EMP0102)</option>
                                <option value="Priya Sharma (EMP0105)">Priya Sharma (EMP0105)</option>
                                <option value="Anish Verma (EMP0142)">Anish Verma (EMP0142)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">OT Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" value="2026-09-22" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">OT Start Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="reqStartTime" value="18:30" onchange="calcReqHours()" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">OT End Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="reqEndTime" value="20:30" onchange="calcReqHours()" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-dark">Calculated OT Hours</label>
                            <input type="text" class="form-control bg-light fw-bold text-primary" id="reqHours" value="2.0 Hours" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-dark">Work / Task Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="e.g. Monthly Payroll Audit & Verification" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-dark">Reason for Overtime Request <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="2" placeholder="State reasons why overtime work is necessary..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-bold px-4"><i class="bi bi-send-check me-1"></i> Submit Request for Manager Approval</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL 3: MANAGER / HR REVIEW & APPROVAL -->
<div class="modal fade" id="reviewOTModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-shield-check text-success me-2"></i> Manager / HR Overtime Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="processOTDecision(event)">
                <div class="modal-body p-4">
                    <div class="bg-light p-3 rounded-4 mb-4 border">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <span class="text-muted small">OT Reference ID:</span>
                                <div class="fw-bold text-dark fs-6"><code id="m-ot-id" class="text-primary">OT-2026-901</code></div>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <span class="text-muted small">Initiation Path:</span>
                                <div><span id="m-ot-path" class="badge bg-primary-subtle text-primary">Company Assigned</span></div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <span class="text-muted small">Employee:</span>
                                <div id="m-ot-emp" class="fw-bold text-dark">Rajesh Kumar (EMP0102)</div>
                            </div>
                            <div class="col-md-6 mt-2 text-md-end">
                                <span class="text-muted small">OT Date & Time:</span>
                                <div id="m-ot-slot" class="fw-bold text-dark">22 Sep 2026 (6:00 PM - 9:00 PM)</div>
                            </div>
                            <div class="col-12 mt-2 pt-2 border-top d-flex justify-content-between">
                                <span>Requested Hours: <strong id="m-ot-hrs" class="text-warning">3.0 Hours</strong></span>
                                <span>Work / Project: <strong id="m-ot-work" class="text-dark">Production Support</strong></span>
                            </div>
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-pencil-square text-success me-1"></i> Manager Action & Approval Decision</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Approval Decision <span class="text-danger">*</span></label>
                            <select class="form-select fw-bold" id="m-ot-decision" required>
                                <option value="Approved" class="text-success fw-bold">✓ Approve OT</option>
                                <option value="Rejected" class="text-danger fw-bold">✗ Reject OT</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Approved OT Hours <span class="text-danger">*</span></label>
                            <input type="number" step="0.5" class="form-control fw-bold text-success fs-6" id="m-ot-appr-hrs" value="3.0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">OT Rate Multiplier</label>
                            <select class="form-select" id="m-ot-rate">
                                <option value="1.5">Standard 1.5x Hourly Rate</option>
                                <option value="2.0">Holiday / Sunday 2.0x Hourly Rate</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Base Hourly Rate (₹)</label>
                            <input type="number" class="form-control" id="m-ot-base-rate" value="150">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-dark">Manager / HR Remarks & Feedback Comments</label>
                            <textarea class="form-control" id="m-ot-comments" rows="2" placeholder="e.g. Verified production release support logs. Approved 3.0 hrs OT payout."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success fw-bold px-4"><i class="bi bi-shield-check me-1"></i> Save Decision & Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL 4: EMPLOYEE OT SALARY DETAILS POPUP -->
<div class="modal fade" id="otSalaryDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--gh-primary, #087a24);font-size:20px;">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Employee Overtime (OT) Salary & Payout Breakdown</h4>
                        <div class="text-muted small">Detailed rate calculation, multiplier breakdown, and payroll sync summary</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Employee Summary Banner -->
                <div class="card p-3 bg-light border-0 mb-4 rounded-3">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div>
                            <h5 class="fw-bold text-dark mb-1" id="modal-sal-empname">Rajesh Kumar (EMP0102)</h5>
                            <div class="text-muted small"><i class="bi bi-building me-1"></i> <span id="modal-sal-dept">Engineering & IT</span> • Official Payroll Status</div>
                        </div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle fw-bold px-3 py-2" style="font-size:12px;"><i class="bi bi-check-circle-fill me-1"></i> Synced to Salary Slip</span>
                    </div>
                </div>

                <!-- Salary KPI Calculations -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="p-3 bg-white border rounded-3 text-center">
                            <div class="text-muted small fw-bold">Monthly Base Salary</div>
                            <div class="fs-6 fw-bold text-dark" id="modal-sal-base">₹ 45,000 / mo</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white border rounded-3 text-center">
                            <div class="text-muted small fw-bold">Base Hourly Rate</div>
                            <div class="fs-6 fw-bold text-primary" id="modal-sal-rate">₹ 216.35 / hr</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white border rounded-3 text-center">
                            <div class="text-muted small fw-bold">Approved OT Hours</div>
                            <div class="fs-6 fw-bold text-warning" id="modal-sal-hrs">18.0 Hours</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-success-subtle border border-success-subtle rounded-3 text-center">
                            <div class="text-success small fw-bold">Total OT Payout</div>
                            <div class="fs-5 fw-extrabold text-success" id="modal-sal-payout">₹ 5,841</div>
                        </div>
                    </div>
                </div>

                <!-- Formula Breakdown Card -->
                <div class="p-3 bg-light rounded-3 mb-4 border" style="font-size:13px; line-height:1.6;">
                    <h6 class="fw-bold text-dark mb-2"><i class="bi bi-calculator text-primary me-1"></i> Calculation Formula & Multipliers:</h6>
                    <div class="row g-2">
                        <div class="col-md-6">
                            • <strong>Standard Shift OT (1.5x):</strong> <span id="modal-sal-std" class="fw-bold text-dark">12.0 hrs</span> × (Base Hourly × 1.5)
                        </div>
                        <div class="col-md-6">
                            • <strong>Holiday / Weekend OT (2.0x):</strong> <span id="modal-sal-hol" class="fw-bold text-dark">6.0 hrs</span> × (Base Hourly × 2.0)
                        </div>
                    </div>
                </div>

                <!-- Individual Itemized Overtime Logs -->
                <h6 class="fw-bold text-dark mb-2"><i class="bi bi-clock-history text-success me-1"></i> Itemized Overtime Log Entries</h6>
                <div class="table-responsive border rounded-3 mb-3">
                    <table class="table table-sm table-hover align-middle mb-0" style="font-size:12.5px;">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Work / Task Details</th>
                                <th>Hours</th>
                                <th>Multiplier</th>
                                <th class="text-end">Calculated Pay (₹)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>19 Sep 2026</td>
                                <td>Production Hotfix Deployment Support</td>
                                <td>3.0 hrs</td>
                                <td>1.5x Standard</td>
                                <td class="text-end fw-bold text-success">₹ 973.58</td>
                                <td><span class="badge bg-success-subtle text-success">Approved</span></td>
                            </tr>
                            <tr>
                                <td>12 Sep 2026</td>
                                <td>Database Server Migration (Night Shift)</td>
                                <td>4.0 hrs</td>
                                <td>1.5x Standard</td>
                                <td class="text-end fw-bold text-success">₹ 1,298.10</td>
                                <td><span class="badge bg-success-subtle text-success">Approved</span></td>
                            </tr>
                            <tr>
                                <td>06 Sep 2026</td>
                                <td>Sunday Stock Audit & System Verification</td>
                                <td>6.0 hrs</td>
                                <td>2.0x Holiday</td>
                                <td class="text-end fw-bold text-success">₹ 2,596.20</td>
                                <td><span class="badge bg-success-subtle text-success">Approved</span></td>
                            </tr>
                            <tr>
                                <td>02 Sep 2026</td>
                                <td>Release Build Deployment & Testing</td>
                                <td>5.0 hrs</td>
                                <td>1.5x Standard</td>
                                <td class="text-end fw-bold text-success">₹ 973.58</td>
                                <td><span class="badge bg-success-subtle text-success">Approved</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary" onclick="window.print();"><i class="bi bi-printer me-1"></i> Print Statement</button>
                <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL 5: DEPARTMENT OT REPORT & DOWNLOAD POPUP -->
<div class="modal fade" id="deptOTReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--gh-primary, #087a24);font-size:20px;">
                        <i class="bi bi-diagram-3-fill"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Department Overtime Breakdown & Audit Report</h4>
                        <div class="text-muted small">Departmental OT expenditure, employee contribution list, and download export</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Department Banner -->
                <div class="card p-3 bg-light border-0 mb-4 rounded-3">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div>
                            <h5 class="fw-bold text-dark mb-1" id="m-dept-title">Engineering & IT Department</h5>
                            <div class="text-muted small"><i class="bi bi-file-earmark-bar-graph me-1"></i> Overtime Audit & Financial Expenditure Summary</div>
                        </div>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-bold px-3 py-2" style="font-size:12px;" id="m-dept-emp-count">10 Employees</span>
                    </div>
                </div>

                <!-- Department KPI Grid -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="p-3 bg-white border rounded-3 text-center">
                            <div class="text-muted small fw-bold">Total Logged</div>
                            <div class="fs-6 fw-bold text-dark" id="m-dept-tot-hrs">72 hrs</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white border rounded-3 text-center">
                            <div class="text-muted small fw-bold">Approved Hours</div>
                            <div class="fs-6 fw-bold text-success" id="m-dept-appr-hrs">68 hrs</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white border rounded-3 text-center">
                            <div class="text-muted small fw-bold">Rejected Hours</div>
                            <div class="fs-6 fw-bold text-danger" id="m-dept-rej-hrs">4 hrs</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-purple-subtle border border-purple-subtle rounded-3 text-center">
                            <div class="text-purple small fw-bold">Total Department Cost</div>
                            <div class="fs-5 fw-extrabold text-purple" id="m-dept-cost">₹ 11,200</div>
                        </div>
                    </div>
                </div>

                <!-- Employee OT Breakdown Table inside Department -->
                <h6 class="fw-bold text-dark mb-2"><i class="bi bi-people-fill text-success me-1"></i> Department Employee OT Payout Breakdown</h6>
                <div class="table-responsive border rounded-3 mb-3">
                    <table class="table table-sm table-hover align-middle mb-0" style="font-size:12.5px;">
                        <thead class="table-light">
                            <tr>
                                <th>Employee</th>
                                <th>Role</th>
                                <th>Approved OT</th>
                                <th>Rate Multiplier</th>
                                <th class="text-end">Payout (₹)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="m-dept-emp-tbody">
                            <tr>
                                <td class="fw-bold text-dark">Rajesh Kumar (EMP0102)</td>
                                <td>Senior Developer</td>
                                <td>18.0 hrs</td>
                                <td>₹225 / hr (1.5x)</td>
                                <td class="text-end fw-bold text-success">₹ 4,050</td>
                                <td><span class="badge bg-success-subtle text-success">Approved</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Vikram Sethi (EMP0118)</td>
                                <td>DevOps Lead</td>
                                <td>24.0 hrs</td>
                                <td>₹250 / hr (2.0x)</td>
                                <td class="text-end fw-bold text-success">₹ 6,000</td>
                                <td><span class="badge bg-success-subtle text-success">Approved</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Sneha Reddy (EMP0125)</td>
                                <td>QA Automation Lead</td>
                                <td>26.0 hrs</td>
                                <td>₹215 / hr (1.5x)</td>
                                <td class="text-end fw-bold text-success">₹ 1,150</td>
                                <td><span class="badge bg-success-subtle text-success">Approved</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0 d-flex justify-content-between flex-wrap gap-2">
                <button type="button" class="btn btn-outline-secondary" onclick="window.print();">
                    <i class="bi bi-printer me-1"></i> Print / Download PDF
                </button>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success fw-bold" onclick="downloadDeptReportCSV()">
                        <i class="bi bi-file-earmark-spreadsheet me-1"></i> Download CSV Report
                    </button>
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/pages/overtime.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
