<?php include 'header.php'; ?>


<link rel="stylesheet" href="./assets/css/select2.css">

<style>
.table-scorecard th, .table-scorecard td { font-size: 12.5px; vertical-align: middle; }
.badge-rate { font-size: 11px; font-weight: 700; padding: 4px 8px; border-radius: 6px; }
</style>

<div class="container-fluid px-3 px-md-4 py-3">

    <!-- Page Header & Action Bar -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title + Subtitle -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-warning-subtle text-warning d-flex align-items-center justify-content-center flex-shrink-0" style="width:36px;height:36px;font-size:18px;">
                <i class="bi bi-award"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title">Score Card</h1>
                <span class="text-muted font-11">Staff performance, weekly task commitments &amp; efficiency ratings</span>
            </div>
        </div>
        
        <!-- RIGHT: Filters + Actions -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#scorecardFilterOffcanvas" aria-controls="scorecardFilterOffcanvas">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="scorecardFilterCountBadge">0</span>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" onclick="window.print();">
                <i class="bi bi-printer"></i><span>Print</span>
            </button>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#commitmentModal">
                <i class="bi bi-plus-lg"></i><span>Add Commitment</span>
            </button>
        </div>
    </div>

    <!-- Stat Widgets Row -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-primary-subtle text-primary">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <div class="stat-val" id="statTotalEmp">15</div>
                    <div class="stat-lbl">Staff Count</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-info-subtle text-info">
                    <i class="bi bi-list-task"></i>
                </div>
                <div>
                    <div class="stat-val" id="statPlannedTasks">26</div>
                    <div class="stat-lbl">Planned Tasks</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-success-subtle text-success">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div>
                    <div class="stat-val" id="statCompletedTasks">18</div>
                    <div class="stat-lbl">Completed</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-warning-subtle text-warning">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div>
                    <div class="stat-val" id="statDelayedTasks">3</div>
                    <div class="stat-lbl">Delayed Tasks</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-danger-subtle text-danger">
                    <i class="bi bi-x-circle-fill"></i>
                </div>
                <div>
                    <div class="stat-val" id="statNotCompletedTasks">5</div>
                    <div class="stat-lbl">Not Completed</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="stat-widget-card d-flex align-items-center gap-3">
                <div class="stat-icon-wrapper bg-indigo-subtle text-indigo" style="background:#e0e7ff;color:#4338ca;">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div>
                    <div class="stat-val" id="statAvgPct">75.4%</div>
                    <div class="stat-lbl">Avg Score %</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Master Table Section matching employee-report.php format -->
    <div class="card-custom mb-4">
        <div class="table-responsive">
            <table class="table-scorecard master-table" id="scorecardTable">
                <thead>
                    <tr>
                        <th rowspan="2" style="width: 50px;">S.No.</th>
                        <th rowspan="2">Employee Name</th>
                        <th rowspan="2">Employee Code</th>
                        <th rowspan="2">Department</th>
                        <th rowspan="2">Location</th>
                        <th rowspan="2">Last Week(%)</th>
                        <th rowspan="2">Planned Task</th>
                        <th colspan="2" class="th-header-completed">Completed Task</th>
                        <th rowspan="2" class="th-header-not-completed">Not Completed Task</th>
                        <th rowspan="2">Last Week Commitment</th>
                        <th rowspan="2">This Week Commitment</th>
                    </tr>
                    <tr>
                        <th class="th-header-sub-completed">On Time Completed Task</th>
                        <th class="th-header-sub-completed">Delay Time Completed Task</th>
                    </tr>
                </thead>
                <tbody id="scorecardTbody">
                    <!-- MasterTable JS dynamically populates content -->
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Commitment Edit / Add Modal -->
<div class="modal fade" id="commitmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-header border-bottom border-light px-4 py-3">
                <h5 class="modal-title fw-bold text-dark d-flex align-items-center gap-2">
                    <i class="bi bi-pencil-square text-primary"></i> Update Weekly Commitment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="commitmentForm">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">SELECT STAFF</label>
                        <select id="modalStaffSelect" class="form-select scorecard-select2 rounded-3 py-2 fs-6">
                            <option value="KOWSHIK SOFTWARE">KOWSHIK SOFTWARE (KOKA0011)</option>
                            <option value="ASHISH">ASHISH (A1001)</option>
                            <option value="thilak ma">thilak ma (1234)</option>
                            <option value="Jude S">Jude S (4566)</option>
                            <option value="PREM KUMAR.R">PREM KUMAR.R (158357)</option>
                            <option value="Akash Kumar">Akash Kumar (11504)</option>
                            <option value="ARUN KUMAR">ARUN KUMAR (EMP-0001)</option>
                            <option value="Test Demo">Test Demo (TEST001)</option>
                            <option value="KOKASHALU K">KOKASHALU K (252525)</option>
                            <option value="Suresh A">Suresh A (212)</option>
                            <option value="KOKA TESTER">KOKA TESTER (0529)</option>
                            <option value="koka SHALINI">koka SHALINI (778877)</option>
                            <option value="KISHORE R">KISHORE R (EMP0001)</option>
                            <option value="shalu welcome Testing">shalu welcome Testing (12345)</option>
                            <option value="Aravindh K">Aravindh K (11505)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">THIS WEEK COMMITMENT</label>
                        <textarea id="modalCommitmentText" class="form-control rounded-3" rows="3" placeholder="e.g. 85% completion planned for CRM sprint..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top border-light px-4 py-3">
                <button type="button" class="btn btn-light fw-bold rounded-3 px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary fw-bold rounded-3 px-4" onclick="saveCommitmentModal();">Save Commitment</button>
            </div>
        </div>
    </div>
</div>


<!-- Scorecard Filter Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="scorecardFilterOffcanvas" aria-labelledby="scorecardFilterOffcanvasLabel" style="width: 360px;">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2" id="scorecardFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Score Card
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form method="GET" action="" id="scorecardFilterForm" onsubmit="event.preventDefault(); applyScorecardFilters();">
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filterYear"><i class="bi bi-calendar3 me-1"></i>Year</label>
                <select id="filterYear" class="form-select form-select-sm" onchange="updateScorecardFilterBadge()">
                    <option value="2026" selected>2026</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filterMonth"><i class="bi bi-calendar-month me-1"></i>Month</label>
                <select id="filterMonth" class="form-select form-select-sm" onchange="updateScorecardFilterBadge()">
                    <option value="January" selected>January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filterWeek"><i class="bi bi-calendar-week me-1"></i>Week</label>
                <select id="filterWeek" class="form-select form-select-sm" onchange="updateScorecardFilterBadge()">
                    <option value="All" selected>All Weeks</option>
                    <option value="Week 1">Week 1</option>
                    <option value="Week 2">Week 2</option>
                    <option value="Week 3">Week 3</option>
                    <option value="Week 4">Week 4</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filterDepartment"><i class="bi bi-diagram-3 me-1"></i>Department</label>
                <select id="filterDepartment" class="form-select form-select-sm" onchange="updateScorecardFilterBadge()">
                    <option value="All" selected>All Departments</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Architecture">Architecture</option>
                    <option value="Project Management">Project Management</option>
                    <option value="Quality Assurance">Quality Assurance</option>
                    <option value="HVAC & Electrical">HVAC & Electrical</option>
                    <option value="Structural Engineering">Structural Engineering</option>
                    <option value="Interior Design">Interior Design</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filterStaff"><i class="bi bi-person me-1"></i>Staff Member</label>
                <select id="filterStaff" class="form-select form-select-sm" onchange="updateScorecardFilterBadge()">
                    <option value="All" selected>All Staff Members</option>
                    <option value="Rajesh Kumar">Rajesh Kumar</option>
                    <option value="Priya Sharma">Priya Sharma</option>
                    <option value="Anand Verma">Anand Verma</option>
                    <option value="Karthik R">Karthik R</option>
                    <option value="Sneha Patel">Sneha Patel</option>
                    <option value="Manoj Tiwari">Manoj Tiwari</option>
                    <option value="Divya Nair">Divya Nair</option>
                    <option value="Venkatesh S">Venkatesh S</option>
                    <option value="Lakshmi Menon">Lakshmi Menon</option>
                    <option value="Arun Balaji">Arun Balaji</option>
                </select>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" onclick="resetScorecardFilters()">Reset</button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" onclick="applyScorecardFilters()">Apply Filters</button>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    // Initial Dataset matching exact image values and staff list
    var SCORECARD_DATA = [
        { id: 1, name: 'KOWSHIK SOFTWARE', code: 'KOKA0011', dept: 'Sales', location: '-', lastWeekPct: '1 / 50% ↑', planned: 3, onTime: 0, delayTime: 0, notCompleted: 0, lastCommitment: '80% - committed by chikki', thisCommitment: '' },
        { id: 2, name: 'ASHISH', code: 'A1001', dept: 'Sales', location: '-', lastWeekPct: '0', planned: 0, onTime: 0, delayTime: 0, notCompleted: 0, lastCommitment: '-', thisCommitment: '' },
        { id: 3, name: 'thilak ma', code: '1234', dept: 'Sales', location: '-', lastWeekPct: '0', planned: 0, onTime: 0, delayTime: 0, notCompleted: 0, lastCommitment: '-', thisCommitment: '' },
        { id: 4, name: 'Jude S', code: '4566', dept: 'Designer', location: 'West Mogappair', lastWeekPct: '2 / 100% ↑', planned: 4, onTime: 4, delayTime: 0, notCompleted: 0, lastCommitment: '100% - all tasks cleared', thisCommitment: '' },
        { id: 5, name: 'PREM KUMAR.R', code: '158357', dept: 'Tech Support', location: 'West Mogappair', lastWeekPct: '1 / 75% ↑', planned: 2, onTime: 2, delayTime: 0, notCompleted: 0, lastCommitment: '75% - ticket resolution', thisCommitment: '' },
        { id: 6, name: 'Akash Kumar', code: '11504', dept: 'Marketing', location: 'West Mogappair', lastWeekPct: '0', planned: 0, onTime: 0, delayTime: 0, notCompleted: 0, lastCommitment: '-', thisCommitment: '' },
        { id: 7, name: 'ARUN KUMAR', code: 'EMP-0001', dept: 'Stores', location: '-', lastWeekPct: '3 / 80% ↑', planned: 5, onTime: 3, delayTime: 1, notCompleted: 1, lastCommitment: '80% - target met', thisCommitment: '' },
        { id: 8, name: 'Test Demo', code: 'TEST001', dept: 'Stores', location: '-', lastWeekPct: '0', planned: 0, onTime: 0, delayTime: 0, notCompleted: 0, lastCommitment: '-', thisCommitment: '' },
        { id: 9, name: 'KOKASHALU K', code: '252525', dept: 'HR', location: '-', lastWeekPct: '1 / 90% ↑', planned: 4, onTime: 3, delayTime: 1, notCompleted: 0, lastCommitment: '90% - on schedule', thisCommitment: '' },
        { id: 10, name: 'Suresh A', code: '212', dept: 'Production', location: 'West Mogappair', lastWeekPct: '0', planned: 0, onTime: 0, delayTime: 0, notCompleted: 0, lastCommitment: '-', thisCommitment: '' },
        { id: 11, name: 'KOKA TESTER', code: '0529', dept: 'Tech Support', location: 'West Mogappair', lastWeekPct: '0', planned: 0, onTime: 0, delayTime: 0, notCompleted: 0, lastCommitment: '-', thisCommitment: '' },
        { id: 12, name: 'koka SHALINI', code: '778877', dept: 'Marketing', location: 'West Mogappair', lastWeekPct: '2 / 60% ↑', planned: 3, onTime: 1, delayTime: 1, notCompleted: 1, lastCommitment: '60% - lead follow-up', thisCommitment: '' },
        { id: 13, name: 'KISHORE R', code: 'EMP0001', dept: 'Sales', location: 'West Mogappair', lastWeekPct: '0', planned: 0, onTime: 0, delayTime: 0, notCompleted: 0, lastCommitment: '-', thisCommitment: '' },
        { id: 14, name: 'shalu welcome Testing', code: '12345', dept: 'HR', location: '-', lastWeekPct: '0', planned: 0, onTime: 0, delayTime: 0, notCompleted: 0, lastCommitment: '-', thisCommitment: '' },
        { id: 15, name: 'Aravindh K', code: '11505', dept: 'Marketing', location: 'West Mogappair', lastWeekPct: '1 / 100% ↑', planned: 2, onTime: 2, delayTime: 0, notCompleted: 0, lastCommitment: '100% - done', thisCommitment: '' }
    ];

    var scorecardMasterTable = null;

    // Run Select2 initialization AFTER footer.php loads jQuery & select2.js
    $(document).ready(function() {
        if ($.fn.select2) {
            $('.scorecard-select2').select2({
                width: '100%',
                minimumResultsForSearch: 0 // Always show search box inside popup!
            });
        }
        initScorecardTable(SCORECARD_DATA);
        updateSummaryStats(SCORECARD_DATA);
        updateScorecardFilterBadge();
    });

    function getDeptBadgeClass(dept) {
        switch(dept.toLowerCase()) {
            case 'sales': return 'badge-sales';
            case 'designer': return 'badge-designer';
            case 'tech support': return 'badge-tech';
            case 'marketing': return 'badge-marketing';
            case 'stores': return 'badge-stores';
            case 'hr': return 'badge-hr';
            case 'production': return 'badge-prod';
            default: return 'bg-light text-dark';
        }
    }

    function initScorecardTable(dataArray) {
        scorecardMasterTable = MasterTable.init({
            tableId: 'scorecardTable',
            tbodyId: 'scorecardTbody',
            data: dataArray,
            tableName: 'Staff Performance Score Card',
            primaryKey: 'id',
            searchFields: ['name', 'code', 'dept', 'location', 'lastCommitment'],
            columns: [
                { field: 'name', title: 'Employee Name', sortable: true, render: function(val, row) {
                    var imgIdx = ((row.id - 1) % 4) + 1;
                    return '<div class="d-flex align-items-center gap-2.5">' +
                        '<img src="./assets/img/profile-' + imgIdx + '.jpg" class="emp-avatar" alt="' + val + '">' +
                        '<div>' +
                            '<div class="emp-name">' + val + '</div>' +
                            '<div class="emp-code">Code: ' + row.code + '</div>' +
                        '</div>' +
                    '</div>';
                }},
                { field: 'code', title: 'Employee Code', sortable: true, render: function(val) {
                    return '<span class="fw-semibold text-secondary">' + val + '</span>';
                }},
                { field: 'dept', title: 'Department', sortable: true, render: function(val) {
                    var cls = getDeptBadgeClass(val);
                    return '<span class="dept-badge ' + cls + '">' + val + '</span>';
                }},
                { field: 'location', title: 'Location', sortable: true, render: function(val) {
                    return val !== '-' ? '<span class="text-dark fw-medium">' + val + '</span>' : '<span class="text-muted">-</span>';
                }},
                { field: 'lastWeekPct', title: 'Last Week(%)', sortable: true, render: function(val) {
                    if (val && val !== '0') {
                        return '<span class="last-week-pct pct-up">' + val + '</span>';
                    }
                    return '<span class="last-week-pct pct-zero">0</span>';
                }},
                { field: 'planned', title: 'Planned Task', sortable: true, render: function(val) {
                    return '<span class="count-pill pill-planned">' + val + '</span>';
                }},
                { field: 'onTime', title: 'On Time Completed Task', sortable: true, render: function(val) {
                    return '<span class="count-pill pill-ontime">' + val + '</span>';
                }},
                { field: 'delayTime', title: 'Delay Time Completed Task', sortable: true, render: function(val) {
                    return '<span class="count-pill pill-delay">' + val + '</span>';
                }},
                { field: 'notCompleted', title: 'Not Completed Task', sortable: true, render: function(val) {
                    return '<span class="count-pill pill-notcompleted">' + val + '</span>';
                }},
                { field: 'lastCommitment', title: 'Last Week Commitment', sortable: false, render: function(val) {
                    return val !== '-' ? '<span class="text-dark small fw-medium">' + val + '</span>' : '<span class="text-muted">-</span>';
                }},
                { field: 'thisCommitment', title: 'This Week Commitment', sortable: false, render: function(val, row) {
                    var text = row.thisCommitment || 'This Week Commitment';
                    return '<button type="button" class="btn-commitment" onclick="openCommitmentModal(' + row.id + ')">' +
                        '<i class="bi bi-pencil-square text-primary"></i> ' + text +
                    '</button>';
                }}
            ]
        });
    }

    function updateSummaryStats(data) {
        var totalEmp = data.length;
        var totalPlanned = 0;
        var totalCompleted = 0;
        var totalDelayed = 0;
        var totalNotCompleted = 0;

        data.forEach(function(row) {
            totalPlanned += (parseInt(row.planned) || 0);
            totalCompleted += (parseInt(row.onTime) || 0);
            totalDelayed += (parseInt(row.delayTime) || 0);
            totalNotCompleted += (parseInt(row.notCompleted) || 0);
        });

        document.getElementById('statTotalEmp').textContent = totalEmp;
        document.getElementById('statPlannedTasks').textContent = totalPlanned;
        document.getElementById('statCompletedTasks').textContent = totalCompleted;
        document.getElementById('statDelayedTasks').textContent = totalDelayed;
        document.getElementById('statNotCompletedTasks').textContent = totalNotCompleted;

        var avgScore = totalPlanned > 0 ? ((totalCompleted / totalPlanned) * 100).toFixed(1) + '%' : '80.0%';
        document.getElementById('statAvgPct').textContent = avgScore;
    }

    
    function updateScorecardFilterBadge() {
        var count = 0;
        var dept = document.getElementById('filterDepartment');
        if (dept && dept.value !== 'All') count++;
        var staff = document.getElementById('filterStaff');
        if (staff && staff.value !== 'All') count++;
        var week = document.getElementById('filterWeek');
        if (week && week.value !== 'All') count++;
        var badge = document.getElementById('scorecardFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            if (count > 0) badge.classList.remove('d-none');
            else badge.classList.add('d-none');
        }
    }

    function applyScorecardFilters() {
        updateScorecardFilterBadge();
        var dept = document.getElementById('filterDepartment').value;
        var staff = document.getElementById('filterStaff').value;

        var filtered = SCORECARD_DATA.filter(function(row) {
            var matchDept = (dept === 'All' || row.dept === dept);
            var matchStaff = (staff === 'All' || row.name === staff);
            return matchDept && matchStaff;
        });

        scorecardMasterTable.setData(filtered);
        updateSummaryStats(filtered);
    }

    function resetScorecardFilters() {
        document.getElementById('filterYear').value = '2026';
        document.getElementById('filterMonth').value = 'January';
        document.getElementById('filterWeek').value = 'All';
        document.getElementById('filterDepartment').value = 'All';
        document.getElementById('filterStaff').value = 'All';

        if (window.$ && $.fn.select2) {
            $('.scorecard-select2').trigger('change');
        }

        scorecardMasterTable.setData(SCORECARD_DATA);
        updateSummaryStats(SCORECARD_DATA);
        updateScorecardFilterBadge();
    }

    function openCommitmentModal(rowId) {
        var item = SCORECARD_DATA.find(function(r) { return r.id === rowId; });
        if (item) {
            document.getElementById('modalStaffSelect').value = item.name;
            if (window.$ && $.fn.select2) {
                $('#modalStaffSelect').trigger('change');
            }
            document.getElementById('modalCommitmentText').value = item.thisCommitment || '';
        }
        var modalEl = new bootstrap.Modal(document.getElementById('commitmentModal'));
        modalEl.show();
    }

    function saveCommitmentModal() {
        var selectedStaff = document.getElementById('modalStaffSelect').value;
        var text = document.getElementById('modalCommitmentText').value.trim();

        if (!text) {
            text = 'Committed for Week';
        }

        var item = SCORECARD_DATA.find(function(r) { return r.name === selectedStaff; });
        if (item) {
            item.thisCommitment = text;
            scorecardMasterTable.refresh();
        }

        var modalInstance = bootstrap.Modal.getInstance(document.getElementById('commitmentModal'));
        if (modalInstance) modalInstance.hide();
    }
</script>
