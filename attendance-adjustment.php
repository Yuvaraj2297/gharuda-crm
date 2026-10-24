<?php include 'header.php'; ?>

 
 

<style>
    .month-nav {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .month-arrow {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: transparent;
        border-radius: 12px;
        background: transparent;
        color: var(--ink-900);
        cursor: pointer;
        transition: background .15s ease, color .15s ease, transform .15s ease;
    }

    .month-arrow.previews {
        margin-right: -49px;
        position: relative;
        border-radius: 50px;
        margin-top: -1px;
        z-index: 1;
    }

    .month-arrow.next {
        margin-left: -50px;
        position: relative;
        border-radius: 50px;
        margin-top: -1px;
    }

    .month-arrow:hover {
        color: var(--primary);
    }

    .month-nav input.date-input {
        box-shadow: unset;
        border: 1px solid var(--border-soft);
        border-radius: 10px;
        text-align: center;
        font-weight: 700;
    }

    .month-nav input.date-input:hover {
        border: 1px solid var(--primary);
    }

    .month-select-wrap {
        position: relative;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
    }
</style>

<?php
$employees = [
    ['id' => 41, 'name' => 'Salman', 'role' => 'Developer', 'branch' => 'Gharuda Infotech'],
    ['id' => 40, 'name' => 'Thangamuniyandi', 'role' => 'Senior Developer', 'branch' => 'Gharuda IT Park'],
    ['id' => 39, 'name' => 'Arun Kumar', 'role' => 'Developer', 'branch' => 'Gharuda Infotech'],
    ['id' => 38, 'name' => 'Mohammed Suhail', 'role' => 'Developer', 'branch' => 'Gharuda IT Park'],
    ['id' => 37, 'name' => 'Rajeshwaran', 'role' => 'Mobile App Developer', 'branch' => 'Gharuda Infotech'],
    ['id' => 36, 'name' => 'Subananthan', 'role' => 'Developer', 'branch' => 'Gharuda IT Park'],
    ['id' => 35, 'name' => 'Jayaraj JR', 'role' => 'Developer', 'branch' => 'Gharuda Infotech'],
    ['id' => 34, 'name' => 'Krishna Moorthy', 'role' => 'Developer', 'branch' => 'Gharuda IT Park'],
];

$branches = ['All Branches', 'Gharuda Infotech', 'Gharuda IT Park', 'Remote'];

$startDate = new DateTime('2026-08-01');
$days = [];
for ($i = 0; $i < 28; $i++) {
    $d = clone $startDate;
    $d->modify("+$i days");
    $days[] = ['num' => $d->format('d'), 'month' => $d->format('M'), 'day' => $d->format('D')];
}

$statuses = ['FD', 'HD', 'A', 'WO', 'LWP', 'OT'];
$attendance = [];
foreach ($employees as $e) {
    $row = [];
    foreach ($days as $di => $day) {
        if ($day['day'] === 'Sun') $row[] = 'WO';
        elseif ($day['day'] === 'Sat') $row[] = ($e['id'] % 3 === 0) ? 'HD' : 'FD';
        else $row[] = $statuses[array_rand($statuses)];
    }
    $attendance[$e['id']] = $row;
}
?>

<div class="card-custom p-0" id="adjTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Bulk Attendance Adjustments</h3>
            </div>
        </div>
    </div>

    <!-- Toolbar (auto-created by master-table.js) -->

    <!-- Status legend -->
    <div class="adj-legend d-flex align-items-center gap-3 p-3 border-bottom border-light-subtle">
        <span class="adj-legend-item"><span class="adj-status-badge adj-status-fd">FD - Full Day</span> </span>
        <span class="adj-legend-item"><span class="adj-status-badge adj-status-hd">HD - Half Day</span> </span>
        <span class="adj-legend-item"><span class="adj-status-badge adj-status-a">A - Absent</span> </span>
        <span class="adj-legend-item"><span class="adj-status-badge adj-status-wo">WO - Week Off</span> </span>
        <span class="adj-legend-item"><span class="adj-status-badge adj-status-lwp">LWP - Leave Without Pay</span> </span>
        <span class="adj-legend-item"><span class="adj-status-badge adj-status-ot">OT - Overtime</span> </span>
    </div>

    <div class="border-bottom border-light-subtle p-2">
        <div class="row">
            <div class="col-auto">
                <div class="month-nav">
                    <button class="month-arrow previews" aria-label="Previous year">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="">
                        <input type="text" class="date-input form-control adj-month-range-input" placeholder="01-Aug-2026 to 31-Aug-2026" autocomplete="off" disabled />
                    </div>
                    <button class="month-arrow next" aria-label="Next year">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select select2" id="edit_status">
                    <option value="Enable">Select Branch</option>
                    <option value="Enable">Nungambakam</option>
                    <option value="Disable">Tondaiarpet</option>
                </select>

            </div>
            <div class="col align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <button class="btn btn-primary" id="adjSaveBtn">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Date/branch filter bar -->
    <!-- <div class="adj-toolbar d-flex align-items-center flex-wrap gap-2 px-3 pt-2 pb-2">
        <div class="adj-date-range">
            <input type="text" class="adj-date-input" id="adjStartDate" value="01 Aug 2026" readonly>
            <span class="adj-date-sep">&rarr;</span>
            <input type="text" class="adj-date-input" id="adjEndDate" value="28 Aug 2026" readonly>
            <i class="bi bi-calendar3 adj-date-icon"></i>
        </div>
        <select class="form-select form-select-sm adj-branch-select" id="adjBranch">
            <option>Choose Branch</option>
            <?php foreach ($branches as $b): ?>
            <option value="<?= htmlspecialchars($b) ?>"><?= htmlspecialchars($b) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="button" class="btn btn-primary btn-sm" id="adjSearchBtn">
            <i class="bi bi-search me-1"></i>Search
        </button>
        <div class="ms-auto d-flex align-items-center gap-2">
            <button type="button" class="btn btn-outline-primary btn-sm" id="adjSaveBtn">
                <i class="bi bi-check2-circle me-1"></i>Save Changes
            </button>
            <button type="button" class="btn btn-outline-success btn-sm" id="adjExportBtn">
                <i class="bi bi-filetype-xlsx me-1"></i>Export Excel
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm" id="adjRefreshBtn" title="Refresh">
                <i class="bi bi-arrow-clockwise"></i>
            </button>
        </div>
    </div> -->

    <!-- Table -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern adj-table w-100 stickyBlock datatable" id="adjTable" data-table-name="Bulk Attendance Adjustments">
            <thead id="adjThead">
                <tr>
                    <th class="adj-sno-th">S.No</th>
                    <th class="adj-th adj-th-emp">Employee</th>
                    <th class="adj-th">Roles</th>
                    <th class="adj-th">Punch In Branch</th>
                    <?php foreach ($days as $day): ?>
                        <th class="adj-day-th" data-no-sort>
                            <div class="adj-day-label"><span class="adj-day-month"><?= strtoupper($day['month']) ?></span></div>
                            <div class="adj-day-num"><?= $day['num'] ?> <?= strtoupper($day['day']) ?></div>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody id="adjTbody">
                <?php foreach ($employees as $index => $emp): 
                    $empId = $emp['id'];
                    $attRow = $attendance[$empId] ?? [];
                    $imgIndex = (($empId - 34) % 4) + 1;
                ?>
                <tr data-id="<?= $empId ?>">
                    <td class="adj-sno"><?= $index + 1 ?></td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-<?= $imgIndex ?>.jpg" class="adj-emp-avatar" alt="<?= htmlspecialchars($emp['name']) ?>">
                            <div>
                                <div class="fw-bold"><?= htmlspecialchars($emp['name']) ?></div>
                                <div class="text-primary adj-emp-code">EMP<?= $empId ?></div>
                            </div>
                        </div>
                    </td>
                    <td><?= htmlspecialchars($emp['role']) ?></td>
                    <td><?= htmlspecialchars($emp['branch']) ?></td>
                    <?php foreach ($days as $di => $day): 
                        $st = $attRow[$di] ?? 'FD';
                        $cls = 'adj-status-' . strtolower($st);
                    ?>
                    <td>
                        <div class="adj-status-wrap" data-empid="<?= $empId ?>" data-dayidx="<?= $di ?>">
                            <span class="adj-status-badge <?= $cls ?>" data-status="<?= $st ?>">
                                <?= $st ?> <i class="bi bi-chevron-down ms-1 adj-badge-caret"></i>
                            </span>
                            <div class="adj-status-dropdown">
                                <?php foreach ($statuses as $s): ?>
                                    <button type="button" class="adj-status-option<?= $s === $st ? ' active' : '' ?>" data-val="<?= $s ?>"><?= $s ?></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Overtime Details Modal -->
<div class="modal fade" id="otDetailsModal" tabindex="-1" aria-labelledby="otDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg adj-ot-modal-content">
            <div class="modal-header bg-primary-subtle border-bottom border-light-subtle py-3 px-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-chip bg-primary text-white adj-icon-chip-40">
                        <i class="bi bi-clock-history fs-5"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 text-dark" id="otDetailsModalLabel">Overtime Work Details</h5>
                        <small class="text-muted" id="otModalSubtitle">Employee OT attendance & shift breakdown</small>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Employee Summary Card -->
                <div class="card border-0 bg-light p-3 mb-3 adj-ot-summary-card">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <img id="otModalEmpImg" src="./assets/img/profile-1.jpg" class="adj-ot-avatar" alt="Employee">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" id="otModalEmpName">Salman</h6>
                                <div class="text-muted small"><span id="otModalEmpRole">Developer</span> &bull; <span id="otModalEmpBranch" class="text-primary">Gharuda Infotech</span></div>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-2 adj-ot-date" id="otModalDate">12 AUG 2026 (WED)</span>
                        </div>
                    </div>
                </div>

                <!-- KPI Metric Strip -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 text-center bg-body">
                            <div class="text-muted small fw-semibold">SHIFT HOURS</div>
                            <div class="fs-5 fw-bold text-dark mt-1" id="otModalShiftHours">8.0 hrs</div>
                            <div class="text-secondary adj-ot-meta">09:00 AM - 06:00 PM</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 text-center bg-body">
                            <div class="text-muted small fw-semibold">TOTAL WORKED</div>
                            <div class="fs-5 fw-bold text-success mt-1" id="otModalWorkedHours">11.5 hrs</div>
                            <div class="text-secondary adj-ot-meta" id="otModalPunchRange">08:52 AM - 08:22 PM</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 text-center style-ot-kpi adj-ot-kpi">
                            <div class="small fw-bold text-primary">OVERTIME WORKED</div>
                            <div class="fs-4 fw-black text-primary mt-1" id="otModalOtHours">3.5 hrs</div>
                            <div class="text-primary-emphasis adj-ot-meta" id="otModalOtType">Regular Workday OT</div>
                        </div>
                    </div>
                </div>

                <!-- Details & Breakdown -->
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-dark small mb-1">Overtime Reason / Project</label>
                        <input type="text" class="form-control form-control-sm" id="otModalReason" value="Project Release Deployment & Server Migration">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-dark small mb-1">Approval Manager</label>
                        <input type="text" class="form-control form-control-sm" id="otModalManager" value="Thangamuniyandi (Senior Developer)" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-dark small mb-1">Adjust Approved OT Hours</label>
                        <div class="input-group input-group-sm">
                            <input type="number" step="0.5" class="form-control" id="otModalAdjustOtInput" value="3.5">
                            <span class="input-group-text">Hours</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold text-dark small mb-1">Adjustment Note / Remarks</label>
                        <input type="text" class="form-control form-control-sm" id="otModalRemarks" placeholder="Verified with biometric & supervisor logs">
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light px-4 py-3 border-top">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm px-4" id="otModalSaveBtn">
                    <i class="bi bi-check-circle me-1"></i> Confirm & Save OT
                </button>
            </div>
        </div>
    </div>
</div>


<style>
    /* ===== Toolbar ===== */
    .adj-toolbar {
        border-bottom: 1px solid var(--border-soft);
    }

    .adj-date-range {
        display: flex;
        align-items: center;
        gap: 6px;
        border: 1px solid var(--border-soft);
        border-radius: 8px;
        padding: 5px 10px;
        background: #fff;
    }

    .adj-date-input {
        border: none;
        outline: none;
        font-size: 12.5px;
        font-weight: 600;
        font-family: 'Manrope', sans-serif;
        color: var(--ink-700);
        background: transparent;
        width: 100px;
        cursor: pointer;
    }

    .adj-date-sep {
        color: var(--ink-300);
        font-size: 12px;
    }

    .adj-date-icon {
        color: var(--ink-500);
        font-size: 14px;
        margin-left: 4px;
    }

    .adj-branch-select {
        border: 1px solid var(--border-soft);
        border-radius: 8px;
        font-size: 12.5px;
        font-weight: 600;
        font-family: 'Manrope', sans-serif;
        color: var(--ink-700);
        min-width: 160px;
    }

    /* ===== Table header ===== */
    .adj-table thead th {
        background: var(--table-th);
        color: var(--table-black);
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        padding: 10px 14px;
        border-bottom: 2px solid var(--border-soft);
        text-align: left;
        white-space: nowrap;
    }

    .adj-sno-th {
        text-align: center;
        width: 50px;
        min-width: 50px;
    }

    .adj-th {
        text-align: left;
    }

    .adj-day-th {
        text-align: center;
        padding: 6px 8px !important;
        /* background: #e8f5e9 !important; */
        border-left: 1px solid var(--border-soft);
    }

    .adj-day-label {
        margin-bottom: 2px;
    }

    .adj-day-month {
        font-size: 9px;
        font-weight: 700;
        color: var(--ink-500);
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .adj-day-num {
        font-size: 11px;
        font-weight: 800;
        color: var(--primary-dark);
        text-transform: uppercase;
    }

    /* Sticky first 2 columns */
    .stickyBlock.adj-table th:nth-child(1),
    .stickyBlock.adj-table td:nth-child(1) {
        position: sticky;
        left: 0;
        z-index: 3;
        width: 50px;
        min-width: 50px;
        background: #fff;
    }

    .stickyBlock.adj-table th:nth-child(2),
    .stickyBlock.adj-table td:nth-child(2) {
        position: sticky;
        left: 50px;
        z-index: 3;
        width: 180px;
        min-width: 180px;
        background: #fff;
    }

    .stickyBlock.adj-table thead th:nth-child(1),
    .stickyBlock.adj-table thead th:nth-child(2) {
        z-index: 4;
        background: var(--table-th);
    }

    .stickyBlock.adj-table tbody tr:nth-child(even) td:nth-child(1),
    .stickyBlock.adj-table tbody tr:nth-child(even) td:nth-child(2) {
        background: #fff;
    }

    .stickyBlock.adj-table tbody tr:hover td:nth-child(1),
    .stickyBlock.adj-table tbody tr:hover td:nth-child(2) {
        background: var(--table-hover);
    }

    /* Ensure sticky th always visible */
    .stickyBlock.adj-table thead tr:nth-child(2) th:nth-child(1),
    .stickyBlock.adj-table thead tr:nth-child(2) th:nth-child(2) {
        z-index: 5;
    }

    /* Shadow on scroll */
    .is-scrolled .stickyBlock.adj-table td:nth-child(2),
    .is-scrolled .stickyBlock.adj-table th:nth-child(2) {
        box-shadow: inset -6px 0 6px -6px rgba(20, 30, 25, .28);
    }

    /* ===== Table body ===== */
    .adj-table tbody td {
        font-size: 12px;
        padding: 8px 10px;
        color: var(--ink-700);
        border-bottom: 1px solid var(--border-soft);
        vertical-align: middle;
        font-weight: 600;
        white-space: nowrap;
    }

    .adj-table tbody tr:hover td {
        background-color: var(--table-hover);
    }

    .adj-sno {
        text-align: center;
        width: 40px;
    }

    .adj-emp-cell {
        min-width: 160px;
    }

    /* ===== Status badges ===== */
    .adj-status-cell {
        text-align: center;
        padding: 4px 6px !important;
    }

    .adj-status-wrap {
        position: relative;
        display: inline-block;
    }

    .adj-status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 3px;
        min-width: 40px;
        padding: 3px 6px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.15s;
        border: 1px solid transparent;
    }

    .adj-status-badge:hover {
        border-color: var(--primary);
    }

    .adj-status-fd {
        background: var(--primary-soft);
        color: var(--primary-dark);
    }

    .adj-status-hd {
        background: var(--accent-amber-soft);
        color: #a3670a;
    }

    .adj-status-a {
        background: var(--accent-red-soft);
        color: #c0362c;
        font-weight: 800;
    }

    .adj-status-wo {
        background: #f1f3f5;
        color: #868e96;
    }

    .adj-status-lwp {
        background: #e8daef;
        color: #7d3c98;
    }

    .adj-status-ot {
        background: #e0f2fe;
        color: #0369a1;
    }

    /* ===== Dropdown ===== */
    .adj-status-dropdown {
        position: fixed;
        z-index: 1050;
        background: #fff;
        border: 1px solid var(--border-soft);
        border-radius: 8px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, .12);
        padding: 4px;
        display: none;
        min-width: 60px;
    }

    .adj-status-wrap.open .adj-status-dropdown {
        display: block;
    }

    .adj-status-option {
        display: block;
        width: 100%;
        padding: 5px 10px;
        border: none;
        background: none;
        font-size: 11px;
        font-weight: 700;
        font-family: 'Manrope', sans-serif;
        color: var(--ink-700);
        border-radius: 6px;
        cursor: pointer;
        text-align: center;
        transition: background 0.1s;
    }

    .adj-status-option:hover {
        background: var(--bg-app);
    }

    .adj-status-option.active {
        background: var(--primary);
        color: #fff;
    }

    .adj-status-option .adj-opt-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        margin-right: 6px;
        vertical-align: middle;
    }

    .adj-dot-fd {
        background: var(--primary);
    }

    .adj-dot-hd {
        background: var(--accent-amber);
    }

    .adj-dot-a {
        background: var(--accent-red);
    }

    .adj-dot-wo {
        background: #adb5bd;
    }

    .adj-dot-lwp {
        background: #7d3c98;
    }

    .adj-dot-ot {
        background: #0369a1;
    }

    .adj-status-option.active .adj-opt-dot {
        background: #fff;
    }

    /* Legend */
    .adj-legend {
        gap: 14px !important;
    }

    .adj-legend-item {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 600;
        color: var(--ink-700);
    }

    .adj-legend-item .adj-status-badge {
        cursor: default;
        font-size: 10px;
        padding: 2px 6px;
        min-width: 28px;
    }

    .adj-legend-item .adj-status-badge:hover {
        border-color: transparent;
    }

    /* ===== Extracted inline styles ===== */
    .adj-month-range-input { min-width: 280px; }
    .adj-th-emp { min-width: 180px; }
    .adj-emp-avatar { width: 30px; height: 30px; border-radius: 50%; object-fit: cover; }
    .adj-emp-code { font-size: 10px; }
    .adj-badge-caret { font-size: 8px; opacity: 0.7; }
    .adj-ot-modal-content { border-radius: 16px; overflow: hidden; }
    .adj-icon-chip-40 { width: 40px; height: 40px; border-radius: 10px; }
    .adj-ot-summary-card { border-radius: 12px; }
    .adj-ot-avatar { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; }
    .adj-ot-date { font-size: 13px; }
    .adj-ot-meta { font-size: 11px; }
    /* .border utility below is !important, so the KPI border needs !important too */
    .adj-ot-kpi { background: #e0f2fe; border-color: #bae6fd !important; }
</style>

<?php include 'footer.php'; ?>


<script>
    window.adjSeedData = <?php echo json_encode($employees, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
    window.adjAttendance = <?php echo json_encode($attendance, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
    window.adjStatuses = <?php echo json_encode($statuses); ?>;
    window.adjDays = <?php echo json_encode($days, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
</script>

<script>
    (function() {
        'use strict';

        var empData = window.adjSeedData || [];
        var adjDays = window.adjDays || [];
        var pendingOtContext = null;

        function openOtModal(wrap, badgeEl) {
            var empId = wrap.getAttribute('data-empid') || 41;
            var dayIdx = wrap.getAttribute('data-dayidx') || 0;
            var emp = empData.find(function(e) { return e.id == empId; }) || empData[0] || { name: 'Employee', role: 'Developer', branch: 'Gharuda Infotech', id: empId };
            var dayInfo = (adjDays && adjDays[dayIdx]) ? adjDays[dayIdx] : { num: '12', month: 'Aug', day: 'Wed' };

            var empNameEl = document.getElementById('otModalEmpName'); if (empNameEl) empNameEl.textContent = emp.name;
            var empRoleEl = document.getElementById('otModalEmpRole'); if (empRoleEl) empRoleEl.textContent = emp.role;
            var empBranchEl = document.getElementById('otModalEmpBranch'); if (empBranchEl) empBranchEl.textContent = emp.branch;
            var profileImgNum = ((emp.id - 34) % 4) + 1;
            var empImgEl = document.getElementById('otModalEmpImg'); if (empImgEl) empImgEl.src = './assets/img/profile-' + profileImgNum + '.jpg';
            
            var dateStr = (dayInfo.num || '12') + ' ' + (dayInfo.month || 'Aug').toUpperCase() + ' 2026 (' + (dayInfo.day || 'Wed').toUpperCase() + ')';
            var dateEl = document.getElementById('otModalDate'); if (dateEl) dateEl.textContent = dateStr;

            var seed = (parseInt(empId) * 7 + parseInt(dayIdx) * 3) % 4;
            var otHoursArr = ['3.5', '2.5', '4.0', '1.5'];
            var otHours = otHoursArr[seed];
            var shiftOutTimes = ['08:30 PM', '09:00 PM', '10:00 PM', '07:30 PM'];
            var otReasons = [
                'Project Release Deployment & Server Migration',
                'Urgent Bug Fixes & Code Review',
                'Database Optimization & Performance Tuning',
                'Client Demo Preparation & QA Testing'
            ];

            var shiftHoursEl = document.getElementById('otModalShiftHours'); if (shiftHoursEl) shiftHoursEl.textContent = '8.0 hrs';
            var workedHoursEl = document.getElementById('otModalWorkedHours'); if (workedHoursEl) workedHoursEl.textContent = (8 + parseFloat(otHours)) + ' hrs';
            var punchRangeEl = document.getElementById('otModalPunchRange'); if (punchRangeEl) punchRangeEl.textContent = '08:50 AM - ' + shiftOutTimes[seed];
            var otHoursEl = document.getElementById('otModalOtHours'); if (otHoursEl) otHoursEl.textContent = otHours + ' hrs';
            var otTypeEl = document.getElementById('otModalOtType'); if (otTypeEl) otTypeEl.textContent = (dayInfo.day === 'Sun' || dayInfo.day === 'Sat') ? 'Weekend / Holiday OT' : 'Regular Workday OT';
            var reasonEl = document.getElementById('otModalReason'); if (reasonEl) reasonEl.value = otReasons[seed];
            var adjustInputEl = document.getElementById('otModalAdjustOtInput'); if (adjustInputEl) adjustInputEl.value = otHours;
            var remarksEl = document.getElementById('otModalRemarks'); if (remarksEl) remarksEl.value = 'OT verified with biometric logs';

            pendingOtContext = { wrap: wrap, badgeEl: badgeEl };

            var modalEl = document.getElementById('otDetailsModal');
            if (modalEl && window.bootstrap) {
                var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.show();
            }
        }

        function handleBadgeClick(badge, e) {
            e.preventDefault();
            e.stopPropagation();
            var wrap = badge.closest('.adj-status-wrap');
            if (!wrap) return;
            var dd = wrap.querySelector('.adj-status-dropdown');
            var isOpen = wrap.classList.contains('open');
            document.querySelectorAll('.adj-status-wrap.open').forEach(function(w) {
                w.classList.remove('open');
            });
            if (!isOpen && dd) {
                wrap.classList.add('open');
                var r = badge.getBoundingClientRect();
                dd.style.left = r.left + 'px';
                dd.style.top = (r.bottom + 4) + 'px';
            }
        }

        function handleOptionClick(opt, e) {
            e.preventDefault();
            e.stopPropagation();
            var wrap = opt.closest('.adj-status-wrap');
            if (!wrap) return;
            var badgeEl = wrap.querySelector('.adj-status-badge');
            var v = opt.getAttribute('data-val');
            wrap.classList.remove('open');

            if (v === 'OT') {
                openOtModal(wrap, badgeEl);
            } else if (badgeEl) {
                badgeEl.innerHTML = v + ' <i class="bi bi-chevron-down ms-1 adj-badge-caret"></i>';
                badgeEl.setAttribute('data-status', v);
                badgeEl.className = 'adj-status-badge adj-status-' + v.toLowerCase();
                wrap.querySelectorAll('.adj-status-option').forEach(function(o) {
                    o.classList.toggle('active', o.getAttribute('data-val') === v);
                });
            }
        }

        // Event delegation on table body
        var tbody = document.getElementById('adjTbody');
        if (tbody) {
            tbody.addEventListener('click', function(e) {
                var badge = e.target.closest('.adj-status-badge');
                if (badge) {
                    handleBadgeClick(badge, e);
                    return;
                }
                var opt = e.target.closest('.adj-status-option');
                if (opt) {
                    handleOptionClick(opt, e);
                    return;
                }
            });
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.adj-status-wrap')) {
                document.querySelectorAll('.adj-status-wrap.open').forEach(function(w) {
                    w.classList.remove('open');
                });
            }
        });

        // OT Modal Save Handler
        var otSaveBtn = document.getElementById('otModalSaveBtn');
        if (otSaveBtn) {
            otSaveBtn.addEventListener('click', function() {
                if (pendingOtContext) {
                    var wrap = pendingOtContext.wrap;
                    var badgeEl = pendingOtContext.badgeEl;
                    var v = 'OT';
                    var adjInput = document.getElementById('otModalAdjustOtInput');
                    var adjHours = adjInput ? adjInput.value : '3.5';
                    if (badgeEl) {
                        badgeEl.innerHTML = v + ' <i class="bi bi-chevron-down ms-1 adj-badge-caret"></i>';
                        badgeEl.setAttribute('data-status', v);
                        badgeEl.setAttribute('title', 'Approved OT: ' + adjHours + ' hrs');
                        badgeEl.className = 'adj-status-badge adj-status-ot';
                    }
                    if (wrap) {
                        wrap.querySelectorAll('.adj-status-option').forEach(function(o) {
                            o.classList.toggle('active', o.getAttribute('data-val') === v);
                        });
                    }
                }
                var modalEl = document.getElementById('otDetailsModal');
                if (modalEl && window.bootstrap) {
                    var modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                }
            });
        }

        // Save Changes
        var saveBtn = document.getElementById('adjSaveBtn');
        if (saveBtn) {
            saveBtn.addEventListener('click', function() {
                var badges = document.querySelectorAll('#adjTbody .adj-status-badge');
                alert('Saved ' + badges.length + ' attendance records!');
            });
        }
    })();
</script>

 

<script>
    // Sticky shadow on scroll
    (function() {
        var wrap = document.querySelector('.table-responsive');
        if (!wrap) return;
        wrap.addEventListener('scroll', function() {
            wrap.classList.toggle('is-scrolled', wrap.scrollLeft > 0);
        });
    })();
</script>