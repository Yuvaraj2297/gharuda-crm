<?php
include 'header.php';
$currentView = isset($_GET['view']) && $_GET['view'] === 'daily-report' ? 'daily-report' : 'tasks';
?>


<style>
.tk-sum-grid { display: flex; flex-wrap: wrap; gap: 12px; }
.tk-sum { flex: 1 1 140px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 10px 12px; }
.tk-sum .num { font-size: 1.25rem; font-weight: 700; margin-right: 6px; }
.tk-sum .lbl { font-size: 12px; font-weight: 600; }
.tk-sum .bar { height: 4px; background: #e2e8f0; border-radius: 2px; margin: 6px 0; overflow: hidden; }
.tk-sum .bar > span { display: block; height: 100%; background: #10b981; }
.tk-sum .sub { font-size: 11px; color: #64748b; }
</style>

<main class="container-fluid px-3 px-md-4 py-3">

    <!-- Page Header & Action Bar -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title + Subtitle -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-success-subtle text-success d-flex align-items-center justify-content-center flex-shrink-0" style="width:36px;height:36px;font-size:18px;">
                <i class="bi bi-check2-square"></i>
            </div>
            <div>
                <div class="d-flex align-items-center gap-2">
                    <h1 class="font-display fw-bold mb-0 page-title">Tasks</h1>
                    <span class="badge bg-danger-subtle text-danger px-2 py-0.5 rounded-pill font-11 d-none" id="tkOverdueBadge">
                        <span id="tkOverdueCount">0</span> Overdue
                    </span>
                    <span class="d-none" id="tkOverdueCount2">0</span>
                </div>
                <span class="text-muted font-11">Manage deliverables, team assignments &amp; daily activity</span>
            </div>
        </div>

        <!-- CENTER: View Switcher (All Tasks vs Daily Report) -->
        <div class="btn-group btn-group-sm p-1 bg-light rounded-pill border" role="group" id="tasksViewSwitcher">
            <button type="button" class="btn btn-sm rounded-pill px-3 py-1 fw-semibold <?= $currentView === 'tasks' ? 'btn-primary' : 'text-secondary' ?>" id="viewTabTasks" onclick="switchTaskView('tasks')">
                <i class="bi bi-list-task me-1"></i> All Tasks
            </button>
            <button type="button" class="btn btn-sm rounded-pill px-3 py-1 fw-semibold <?= $currentView === 'daily-report' ? 'btn-primary' : 'text-secondary' ?>" id="viewTabDailyReport" onclick="switchTaskView('daily-report')">
                <i class="bi bi-calendar2-check me-1"></i> Daily Task Report
            </button>
        </div>
        
        <!-- RIGHT: Filters + Actions -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#tasksFilterOffcanvas" aria-controls="tasksFilterOffcanvas" id="btnTasksFilter" <?= $currentView === 'daily-report' ? 'style="display:none;"' : '' ?>>
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="tasksFilterCountBadge">0</span>
            </button>
            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#dailyTaskFilterOffcanvas" aria-controls="dailyTaskFilterOffcanvas" id="btnDailyFilter" <?= $currentView !== 'daily-report' ? 'style="display:none;"' : '' ?>>
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="dailyTaskFilterCountBadge">0</span>
            </button>
            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" type="button" data-bs-toggle="collapse" data-bs-target="#tasksSummaryCollapse" id="btnTasksSummary" <?= $currentView === 'daily-report' ? 'style="display:none;"' : '' ?>>
                <i class="bi bi-bar-chart"></i><span>Summary</span>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" onclick="window.print()">
                <i class="bi bi-printer"></i><span>Print</span>
            </button>
            <a href="task-overview.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1">
                <i class="bi bi-grid-3x3-gap"></i><span>Overview</span>
            </a>
            <a href="task-create.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1" id="tkNewBtn">
                <i class="bi bi-plus-lg"></i><span>New Task</span>
            </a>
        </div>
    </div>

    <!-- VIEW 1: TASKS LIST -->
    <div id="viewTasksContainer" <?= $currentView === 'daily-report' ? 'style="display:none;"' : '' ?>>
<!-- Tasks Summary Collapsible Drawer -->
    <div class="collapse mb-3" id="tasksSummaryCollapse">
        <div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                <span class="fw-bold small text-dark"><i class="bi bi-clipboard-data text-primary me-2"></i>Tasks Summary Overview</span>
                <button type="button" class="btn-close" data-bs-toggle="collapse" data-bs-target="#tasksSummaryCollapse" aria-label="Close"></button>
            </div>
            <div class="tk-sum-grid pt-1" id="tkSumGrid"></div>
        </div>
    </div>
<!-- ===== Task table (toolbar + footer auto-created by master-table.js) =====
         NOTE: `.card-custom` MUST stay on this wrapper — master-table.js does
         table.closest('.card-custom') to inject the Columns/Export/search
         toolbar + pagination footer. -->
    <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden mb-3 bg-white card-custom">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table table-hover align-middle w-100 mb-0 font-13" id="tkTable">
                <thead>
                    <tr>
                        <th style="width:90px;" class="text-nowrap">S.No</th>
                        <th style="width:70px;">#</th>
                        <th class="text-nowrap" style="min-width:250px;">Name</th>
                        <th class="text-nowrap" style="width:130px;">Dependency Task</th>
                        <th class="text-nowrap" style="width:140px;">Status</th>
                        <th class="text-nowrap" style="width:90px;">Progress</th>
                        <th class="text-nowrap" style="width:115px;">Start Date</th>
                        <th class="text-nowrap" style="width:115px;">Due Date</th>
                        <th class="text-nowrap" style="width:120px;">Completed Date</th>
                        <th class="text-nowrap" style="width:100px;">Time Taken</th>
                        <th class="text-nowrap" style="width:80px;">Rating</th>
                        <th class="text-nowrap" style="width:100px;">Assigned to</th>
                        <th class="text-nowrap" style="width:120px;">Followers</th>
                        <th class="text-nowrap" style="width:150px;">Tags</th>
                        <th class="text-nowrap" style="width:100px;">Priority</th>
                    </tr>
                </thead>
                <tbody id="tkTbody">
                    <!-- rows injected by master-table.js -->
                </tbody>
            </table>
        </div>
    </div>



    </div>
    <!-- END VIEW 1: TASKS LIST -->

    <!-- VIEW 2: DAILY TASK REPORT -->
    <div id="viewDailyReportContainer" <?= $currentView !== 'daily-report' ? 'style="display:none;"' : '' ?>>
        <!-- Table Section Card matching employees-report.php -->
        <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden mb-3 bg-white card-custom">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 font-13 master-table column-border" id="dailyTaskReportTable">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th style="width: 40px; text-align: center;"><input type="checkbox" id="selectAllCheckbox" class="form-check-input" onclick="toggleSelectAllRows(this)"></th>
                            <th>PROJECT NAME</th>
                            <th>TASK COUNT</th>
                            <th>WORKING STATUS</th>
                            <th>MEMBERS</th>
                        </tr>
                    </thead>
                    <tbody id="dailyTaskReportBody">
                        <!-- Dynamic MasterTable Render -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END VIEW 2: DAILY TASK REPORT -->

<!-- Tasks Filter Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="tasksFilterOffcanvas" aria-labelledby="tasksFilterOffcanvasLabel" style="width: 360px;">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2" id="tasksFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Tasks
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="taskFilterForm" onsubmit="return false;">
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="tkStaff">Staff Members</label>
                <select class="form-select select2 form-select-sm" id="tkStaff" onchange="updateTasksFilterBadge()"></select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="tkStatus">Status</label>
                <select class="form-select select2 form-select-sm" id="tkStatus" onchange="updateTasksFilterBadge()"></select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="tkProject">Project</label>
                <select class="form-select select2 form-select-sm" id="tkProject" onchange="updateTasksFilterBadge()"></select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="tkQc">QC Status</label>
                <select class="form-select select2 form-select-sm" id="tkQc" onchange="updateTasksFilterBadge()"></select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="tkFrom">From Date</label>
                <input type="date" class="form-control form-control-sm" id="tkFrom" onchange="updateTasksFilterBadge()">
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="tkTo">To Date</label>
                <input type="date" class="form-control form-control-sm" id="tkTo" onchange="updateTasksFilterBadge()">
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1">Quick Action Filter</label>
                <div class="d-flex flex-wrap gap-1 tk-quick">
                    <button type="button" class="btn btn-xs btn-outline-success rounded-pill px-2 py-1 tk-quick-btn font-11" data-quick="todayDeadline">Today's Deadline</button>
                    <button type="button" class="btn btn-xs btn-outline-info rounded-pill px-2 py-1 tk-quick-btn font-11" data-quick="upcoming">Upcoming</button>
                    <button type="button" class="btn btn-xs btn-outline-primary rounded-pill px-2 py-1 tk-quick-btn font-11" data-quick="todayTask">Today's Tasks</button>
                    <button type="button" class="btn btn-xs btn-outline-danger rounded-pill px-2 py-1 tk-quick-btn font-11" data-quick="duePassed">Overdue / Due Passed</button>
                    <button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 py-1 tk-quick-btn font-11" data-quick="reset">Reset Quick</button>
                </div>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" id="tkClearBtn">Clear</button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" id="tkSearchBtn">Apply Filters</button>
    </div>


<!-- Daily Task Report Filter Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="dailyTaskFilterOffcanvas" aria-labelledby="dailyTaskFilterOffcanvasLabel" style="width: 360px;">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2" id="dailyTaskFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Daily Task Report
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form method="GET" action="" id="dailyReportFilterForm" onsubmit="event.preventDefault(); applyReportFilters();">
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="reportDate">Report Date</label>
                <input type="date" id="reportDate" class="form-control form-control-sm" value="<?= date('Y-m-d') ?>" onchange="updateDailyTaskFilterBadge()">
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="reportProjects">Projects</label>
                <select id="reportProjects" class="form-select form-select-sm select2" onchange="updateDailyTaskFilterBadge()">
                    <option value="">All Projects</option>
                    <option value="Test Project">Test Project</option>
                    <option value="NEW TEST">NEW TEST</option>
                    <option value="koka soft">koka soft</option>
                    <option value="welcome">welcome</option>
                    <option value="welcome123">welcome123</option>
                    <option value="KOKA Electrical Work">KOKA Electrical Work</option>
                    <option value="TEST PROJECT 2">TEST PROJECT 2</option>
                    <option value="koka book">koka book</option>
                    <option value="Tester">Tester</option>
                    <option value="Factory Interior">Factory Interior</option>
                    <option value="Construction project">Construction project</option>
                    <option value="Solar panel">Solar panel</option>
                    <option value="College Project">College Project</option>
                    <option value="painting">painting</option>
                    <option value="RSB Arch">RSB Arch</option>
                    <option value="Check and Charge">Check and Charge</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="reportStatus">Working Status</label>
                <select id="reportStatus" class="form-select form-select-sm select2" onchange="updateDailyTaskFilterBadge()">
                    <option value="">All Working Status</option>
                    <option value="Yes">Yes (Active Tasks)</option>
                    <option value="No">No (Idle)</option>
                </select>
            </div>
            <div class="d-none">
                <button type="submit" id="dailyTaskHiddenSubmit"></button>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" onclick="resetDailyTaskFilters()">Reset</button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" onclick="document.getElementById('dailyTaskHiddenSubmit').click()">Apply Filters</button>
    </div>
</div>
</div>

</main>

<!-- ===== New Task modal ===== -->
<div class="modal fade tk-modal" id="tkModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-plus-square-fill"></i>New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Task Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="tkNewName" placeholder="Ex: Appointment: Contact name [ Sundar ]" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Project</label>
                        <select class="form-select" id="tkNewProject"></select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Assigned To</label>
                        <select class="form-select" id="tkNewAssigned"></select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Start Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tkNewStart">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Due Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tkNewDue">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Priority</label>
                        <select class="form-select" id="tkNewPriority">
                            <option value="High">High</option>
                            <option value="Medium" selected>Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="tkNewStatus"></select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tkNewSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    window.updateTasksFilterBadge = function() {
        var count = 0;
        ['tkStaff', 'tkStatus', 'tkProject', 'tkQc', 'tkFrom', 'tkTo'].forEach(function(id) {
            var el = document.getElementById(id);
            if (el && el.value) count++;
        });
        var badge = document.getElementById('tasksFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            if (count > 0) badge.classList.remove('d-none');
            else badge.classList.add('d-none');
        }
    };

    (function() {
        'use strict';

        /* ---------------- Constants ---------------- */
        var STATUS_POOL = ['Not Started', 'In Progress', 'Testing', 'Awaiting Feedback', 'Complete'];

        var STATUS_PILL = {
            'Not Started': 'st-not-started',
            'In Progress': 'st-in-progress',
            'Testing': 'st-testing',
            'Awaiting Feedback': 'st-awaiting',
            'Complete': 'st-complete'
        };

        var STATUS_COLOR = {
            'Not Started': '#94a3b8',
            'In Progress': '#2563eb',
            'Testing': '#f59e0b',
            'Awaiting Feedback': '#7c3aed',
            'Complete': '#16a34a'
        };

        var SUMMARY = [
            { status: 'Not Started', cls: 's-not-started', bar: 'bars-not-started' },
            { status: 'In Progress', cls: 's-in-progress', bar: 'bars-in-progress' },
            { status: 'Testing', cls: 's-testing', bar: 'bars-testing' },
            { status: 'Awaiting Feedback', cls: 's-awaiting', bar: 'bars-awaiting' },
            { status: 'Complete', cls: 's-complete', bar: 'bars-complete' }
        ];

        var STAFF = ['Harish D.', 'Divya A.', 'Priya S.', 'Karthik R.', 'Meena V.', 'Arun K.'];
        var ME = 'Harish D.';
        var PROJECTS = ['ERP Implementation', 'Solar AMC', 'HRMS Rollout', 'Website Revamp', 'Inventory App'];
        var QC_STATUSES = ['Pending', 'Passed', 'Failed'];
        var TAGS = ['Urgent', 'ERP', 'AMC', 'Client', 'Internal', 'Solar', 'Support'];
        var WORKS = ['Appointment', 'Follow-up', 'Site Visit', 'Demo', 'Documentation', 'Quotation', 'Installation', 'Support Call', 'Training', 'Audit'];
        var CLIENTS = ['Sundar', 'Shalu', 'Raj Kumar', 'Divya', 'Karthik', 'Meena', 'Arun', 'Priya', 'Vetri', 'Naveen'];

        var AV_CLASSES = ['av-violet', 'av-amber', 'av-blue', 'av-green', 'av-rose', 'av-grey'];

        /* Status plan — reference summary distribution (30/37/1/1/36 = 105) */
        var STATUS_PLAN = [];
        (function() {
            var plan = [
                ['Not Started', 30],
                ['In Progress', 37],
                ['Testing', 1],
                ['Awaiting Feedback', 1],
                ['Complete', 36]
            ];
            plan.forEach(function(p) {
                for (var i = 0; i < p[1]; i++) STATUS_PLAN.push(p[0]);
            });
        })();

        var TOTAL = STATUS_PLAN.length;   /* 105 */

        /* ---------------- Helpers ---------------- */
        function pad2(n) { return (n < 10 ? '0' : '') + n; }

        function mulberry32(a) {
            return function() {
                a |= 0;
                a = a + 0x6D2B79F5 | 0;
                var t = Math.imul(a ^ a >>> 15, 1 | a);
                t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t;
                return ((t ^ t >>> 14) >>> 0) / 4294967296;
            };
        }

        function toISO(d) {
            return d.getFullYear() + '-' + pad2(d.getMonth() + 1) + '-' + pad2(d.getDate());
        }

        function fmtDate(iso) {
            if (!iso) return '—';
            var p = iso.split('-');
            return p[2] + '-' + p[1] + '-' + p[0];
        }

        function esc(s) {
            return String(s == null ? '' : s)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        function initials(name) {
            return String(name).trim().charAt(0).toUpperCase();
        }

        function avatarClass(name) {
            var sum = 0;
            for (var i = 0; i < name.length; i++) sum += name.charCodeAt(i);
            return AV_CLASSES[sum % AV_CLASSES.length];
        }

        function addDays(d, n) {
            var x = new Date(d.getTime());
            x.setDate(x.getDate() + n);
            return x;
        }

        /* ---------------- Data (deterministic demo set) ---------------- */
        var today = new Date();
        today.setHours(0, 0, 0, 0);
        var TODAY_ISO = toISO(today);

        function makeTasks() {
            var rows = [];
            var rnd = mulberry32(20260928);

            for (var i = 0; i < TOTAL; i++) {
                /* 37 prime-a irukkuradhala (i * 37) % 105 oru bijection —
                   statuses plan-a follow aagum aana interleave aagi varum */
                var status = STATUS_PLAN[(i * 37) % TOTAL];

                var startOffset = -Math.floor(rnd() * 70);         /* past */
                var start = addDays(today, startOffset);
                var due = addDays(start, 1 + Math.floor(rnd() * 21));

                /* Quick filter buttons-ku results irukkanum */
                if (i % 17 === 0) due = new Date(today.getTime());
                if (i % 23 === 0) start = new Date(today.getTime());

                var progress = 0;
                if (status === 'In Progress') progress = Math.floor(rnd() * 10) * 10;
                else if (status === 'Testing') progress = 90;
                else if (status === 'Awaiting Feedback') progress = 95;
                else if (status === 'Complete') progress = 100;

                var assigned = STAFF[Math.floor(rnd() * STAFF.length)];
                var fCount = Math.floor(rnd() * 3) + 1;
                var followers = [];
                for (var f = 0; f < fCount; f++) {
                    followers.push(STAFF[Math.floor(rnd() * STAFF.length)]);
                }

                var tagCount = Math.floor(rnd() * 3);
                var tags = [];
                for (var g = 0; g < tagCount; g++) {
                    var tag = TAGS[Math.floor(rnd() * TAGS.length)];
                    if (tags.indexOf(tag) === -1) tags.push(tag);
                }

                var priority = rnd() < .2 ? 'High' : (rnd() < .65 ? 'Medium' : 'Low');
                var overdue = status !== 'Complete' && due < today;

                rows.push({
                    id: i + 1,
                    no: TOTAL - i,
                    name: WORKS[Math.floor(rnd() * WORKS.length)] + ': Contact name [ ' + CLIENTS[Math.floor(rnd() * CLIENTS.length)] + ' ]',
                    dependency: i > 3 && rnd() < .28 ? '#' + (TOTAL - i + 1) : '',
                    status: status,
                    progress: progress,
                    start: toISO(start),
                    due: toISO(due),
                    completed: status === 'Complete' ? toISO(addDays(due, -1)) : '',
                    timeTaken: status === 'Complete' ? (1 + Math.floor(rnd() * 6)) + 'd ' + Math.floor(rnd() * 8) + 'h' : '',
                    rating: status === 'Complete' ? (3 + Math.floor(rnd() * 3)) + '/5' : 'NA',
                    assigned: assigned,
                    followers: followers,
                    tags: tags,
                    priority: priority,
                    project: PROJECTS[Math.floor(rnd() * PROJECTS.length)],
                    qcStatus: QC_STATUSES[Math.floor(rnd() * QC_STATUSES.length)],
                    checklistDone: Math.floor(rnd() * 4),
                    checklistTotal: 3 + Math.floor(rnd() * 4),
                    dueCrossed: overdue ? Math.floor(rnd() * 3) + 1 : 0,
                    overdue: overdue
                });
            }

            return rows;
        }

        var tasks = makeTasks();

        /* ---------------- Element refs ---------------- */
        var staffSel = document.getElementById('tkStaff');
        var statusSel = document.getElementById('tkStatus');
        var fromInput = document.getElementById('tkFrom');
        var toInput = document.getElementById('tkTo');
        var projectSel = document.getElementById('tkProject');
        var qcSel = document.getElementById('tkQc');

        var tkTable = null;
        var quickFilter = '';

        /* ---------------- Select population ---------------- */
        function fillSelect(sel, allLabel, values) {
            var html = '<option value="">' + allLabel + '</option>';
            values.forEach(function(v) {
                html += '<option value="' + esc(v) + '">' + esc(v) + '</option>';
            });
            sel.innerHTML = html;
        }

        function populateFilters() {
            fillSelect(staffSel, 'All Staff', STAFF);
            fillSelect(statusSel, 'All Statuses', STATUS_POOL);
            fillSelect(projectSel, 'All Projects', PROJECTS);
            fillSelect(qcSel, 'Select QC Status', QC_STATUSES);

            fillSelect(document.getElementById('tkNewProject'), 'Select Project', PROJECTS);
            fillSelect(document.getElementById('tkNewAssigned'), 'Select Staff', STAFF);
            fillSelect(document.getElementById('tkNewStatus'), 'Status', STATUS_POOL);
        }

        /* ---------------- Filtering ---------------- */
        function matchesQuick(t) {
            if (!quickFilter) return true;
            if (quickFilter === 'todayDeadline') return t.due === TODAY_ISO;
            if (quickFilter === 'upcoming') return t.due > TODAY_ISO;
            if (quickFilter === 'todayTask') return t.start === TODAY_ISO;
            if (quickFilter === 'duePassed') return t.overdue;
            return true;
        }

        function parseToIso(str) {
            if (!str) return '';
            if (str.indexOf('-') !== -1) {
                var parts = str.split('-');
                if (parts[0].length === 2) {
                    return parts[2] + '-' + parts[1] + '-' + parts[0];
                }
            }
            return str;
        }

        function filteredTasks() {
            var staff = staffSel.value;
            var status = statusSel.value;
            var from = fromInput ? parseToIso(fromInput.value) : '';
            var to = toInput ? parseToIso(toInput.value) : '';
            var project = projectSel.value;
            var qc = qcSel.value;

            return tasks.filter(function(t) {
                if (staff && t.assigned !== staff) return false;
                if (status && t.status !== status) return false;
                if (from && t.start < from) return false;
                if (to && t.start > to) return false;
                if (project && t.project !== project) return false;
                if (qc && t.qcStatus !== qc) return false;
                return matchesQuick(t);
            });
        }

        /* ---------------- Summary strip ---------------- */
        function renderSummary() {
            var total = tasks.length;
            document.getElementById('tkSumGrid').innerHTML = SUMMARY.map(function(s) {
                var count = tasks.filter(function(t) { return t.status === s.status; }).length;
                var mine = tasks.filter(function(t) { return t.status === s.status && t.assigned === ME; }).length;
                var pct = total > 0 ? Math.round(count / total * 100) : 0;

                return '<div class="tk-sum">' +
                    '<div><span class="num ' + s.cls + '">' + count + '</span>' +
                    '<span class="lbl ' + s.cls + '">' + s.status + '</span></div>' +
                    '<div class="bar ' + s.bar + '"><span style="width:' + pct + '%;"></span></div>' +
                    '<div class="sub">Tasks assigned to me: ' + mine + '</div>' +
                    '</div>';
            }).join('');
        }

        function renderOverdueAlert() {
            var overdue = tasks.filter(function(t) {
                return t.status !== 'Complete' && t.status !== 'Not Started' && t.overdue;
            }).length;
            var el1 = document.getElementById('tkOverdueCount');
            var el2 = document.getElementById('tkOverdueCount2');
            if (el1) el1.textContent = overdue;
            if (el2) el2.textContent = overdue;
        }

        /* ---------------- Table ---------------- */
        if (typeof MasterTable !== 'undefined') {
            tkTable = MasterTable.init({
                tableId: 'tkTable',
                tbodyId: 'tkTbody',
                idPrefix: 'tk',
                data: [],
                tableName: 'Tasks',
                primaryKey: 'id',
                showCheckbox: true,
                searchFields: ['name', 'assigned', 'project', 'status', 'priority', 'tags'],
                columns: [
                    {
                        field: 'no',
                        title: '#',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-no">' + v + '</span>';
                        }
                    },
                    {
                        field: 'name',
                        title: 'Name',
                        sortable: true,
                        render: function(v, r) {
                            return '<span class="tk-name-cell">' +
                                '<span class="tk-name">' + esc(v) + '</span>' +
                                '<span class="tk-meta' + (r.overdue ? ' is-overdue' : '') + '">Total Checklist: ' + r.checklistDone + ' / ' + r.checklistTotal + '</span>' +
                                '<span class="tk-meta' + (r.overdue ? ' is-overdue' : '') + '">Total Due Date Crossed: ' + r.dueCrossed + '</span>' +
                                (r.overdue ? '<span class="tk-warn"><i class="bi bi-exclamation-triangle-fill"></i></span>' : '') +
                                '</span>';
                        }
                    },
                    {
                        field: 'dependency',
                        title: 'Dependency Task',
                        sortable: false,
                        render: function(v) {
                            return v ? '<span class="tk-no">' + esc(v) + '</span>' : '<span class="tk-muted">—</span>';
                        }
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-pill ' + (STATUS_PILL[v] || 'st-not-started') + '">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'progress',
                        title: 'Progress',
                        sortable: true,
                        render: function(v, r) {
                            return '<span class="tk-donut" style="--p:' + v + ';--dc:' + (STATUS_COLOR[r.status] || '#16a34a') + ';"><b>' + v + '%</b></span>';
                        }
                    },
                    {
                        field: 'start',
                        title: 'Start Date',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-date-txt">' + fmtDate(v) + '</span>';
                        }
                    },
                    {
                        field: 'due',
                        title: 'Due Date',
                        sortable: true,
                        render: function(v, r) {
                            return '<span class="tk-date-txt' + (r.overdue ? ' is-overdue' : '') + '">' + fmtDate(v) + '</span>';
                        }
                    },
                    {
                        field: 'completed',
                        title: 'Completed Date',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="tk-date-txt">' + fmtDate(v) + '</span>' : '<span class="tk-muted">—</span>';
                        }
                    },
                    {
                        field: 'timeTaken',
                        title: 'Time Taken',
                        sortable: false,
                        render: function(v) {
                            return v ? '<span class="tk-date-txt">' + esc(v) + '</span>' : '<span class="tk-muted">—</span>';
                        }
                    },
                    {
                        field: 'rating',
                        title: 'Rating',
                        sortable: false,
                        render: function(v) {
                            return v === 'NA' ? '<span class="tk-muted">NA</span>' : '<span class="tk-date-txt">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'assigned',
                        title: 'Assigned to',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-avatar ' + avatarClass(v) + '" title="' + esc(v) + '">' + initials(v) + '</span>';
                        }
                    },
                    {
                        field: 'followers',
                        title: 'Followers',
                        sortable: false,
                        render: function(v) {
                            if (!v || !v.length) return '<span class="tk-muted">—</span>';
                            var shown = v.slice(0, 3);
                            var html = '<span class="tk-avatars">' + shown.map(function(f) {
                                return '<span class="tk-avatar ' + avatarClass(f) + '" title="' + esc(f) + '">' + initials(f) + '</span>';
                            }).join('');
                            if (v.length > 3) html += '<span class="tk-avatar more">+' + (v.length - 3) + '</span>';
                            return html + '</span>';
                        }
                    },
                    {
                        field: 'tags',
                        title: 'Tags',
                        sortable: false,
                        render: function(v) {
                            if (!v || !v.length) return '<span class="tk-muted">—</span>';
                            return v.map(function(t) { return '<span class="tk-tag">' + esc(t) + '</span>'; }).join('');
                        }
                    },
                    {
                        field: 'priority',
                        title: 'Priority',
                        sortable: true,
                        render: function(v) {
                            var cls = v === 'High' ? 'p-high' : (v === 'Low' ? 'p-low' : 'p-medium');
                            return '<span class="tk-pri ' + cls + '">' + esc(v) + '</span>';
                        }
                    }
                ]
            });
        }

        /* ---------------- Render ---------------- */
        function renderAll() {
        updateTasksFilterBadge();
            var rows = filteredTasks();
            if (tkTable) tkTable.setData(rows);
        }

        /* ---------------- Bindings ---------------- */
        var sBtn = document.getElementById('tkSearchBtn');
        if (sBtn) {
            sBtn.addEventListener('click', function() {
                renderAll();
                showToast(filteredTasks().length + ' tasks found');
            });
        }

        var cBtn = document.getElementById('tkClearBtn');
        if (cBtn) {
            cBtn.addEventListener('click', function() {
                resetFilters();
                showToast('Filters cleared');
            });
        }

        
    function updateTasksFilterBadge() {
        var count = 0;
        ['tkStaff', 'tkStatus', 'tkProject', 'tkQc', 'tkFrom', 'tkTo'].forEach(function(id) {
            var el = document.getElementById(id);
            if (el && el.value) count++;
        });
        if (typeof quickFilter !== 'undefined' && quickFilter) count++;
        var badge = document.getElementById('tasksFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            if (count > 0) badge.classList.remove('d-none');
            else badge.classList.add('d-none');
        }
    }
    window.updateTasksFilterBadge = updateTasksFilterBadge;

    function resetFilters() {
        setTimeout(updateTasksFilterBadge, 50);
            staffSel.value = '';
            statusSel.value = '';
            if (fromInput) fromInput.value = '';
            if (toInput) toInput.value = '';
            projectSel.value = '';
            qcSel.value = '';
            quickFilter = '';
            document.querySelectorAll('.tk-quick-btn').forEach(function(b) { b.classList.remove('active'); });

            if (window.jQuery && jQuery.fn.select2) {
                ['#tkStaff', '#tkStatus', '#tkProject', '#tkQc'].forEach(function(id) {
                    jQuery(id).val('').trigger('change.select2');
                });
            }
            renderAll();
        }

        var quickContainer = document.querySelector('.tk-quick');
        if (quickContainer) {
            quickContainer.addEventListener('click', function(e) {
                var btn = e.target.closest('.tk-quick-btn');
                if (!btn) return;
                var key = btn.getAttribute('data-quick');

                if (key === 'reset') {
                    resetFilters();
                    showToast('Filters reset');
                    return;
                }

                var same = quickFilter === key;
                quickFilter = same ? '' : key;
                this.querySelectorAll('.tk-quick-btn').forEach(function(b) {
                    b.classList.toggle('active', !same && b === btn);
                });
                renderAll();
            });
        }

        /* ---------------- New Task modal ---------------- */
        var tkModalEl = document.getElementById('tkModal');
        var tkModal = null;

        function getTkModal() {
            if (!tkModal && tkModalEl && typeof bootstrap !== 'undefined') {
                tkModal = bootstrap.Modal.getOrCreateInstance(tkModalEl);
            }
            return tkModal;
        }

        function nextTaskNo() {
            return tasks.reduce(function(max, t) { return Math.max(max, t.no); }, 0) + 1;
        }

        var newBtn = document.getElementById('tkNewBtn');
        if (newBtn && newBtn.tagName === 'BUTTON') {
            newBtn.addEventListener('click', function() {
                document.getElementById('tkNewName').value = '';
                document.getElementById('tkNewName').classList.remove('is-invalid');
                document.getElementById('tkNewStart').value = TODAY_ISO;
                document.getElementById('tkNewDue').value = toISO(addDays(today, 7));
                document.getElementById('tkNewPriority').value = 'Medium';
                document.getElementById('tkNewProject').value = '';
                document.getElementById('tkNewAssigned').value = '';
                document.getElementById('tkNewStatus').value = 'Not Started';
                getTkModal().show();
            });
        }

        document.getElementById('tkNewSubmit').addEventListener('click', function() {
            var nameInput = document.getElementById('tkNewName');
            var startInput = document.getElementById('tkNewStart');
            var dueInput = document.getElementById('tkNewDue');
            var name = nameInput.value.trim();

            if (!name) {
                nameInput.classList.add('is-invalid');
                nameInput.focus();
                showToast('Please enter the task name');
                return;
            }
            if (!startInput.value || !dueInput.value) {
                showToast('Please pick the start and due dates');
                return;
            }

            var assigned = document.getElementById('tkNewAssigned').value || ME;
            var status = document.getElementById('tkNewStatus').value || 'Not Started';

            tasks.unshift({
                id: Date.now(),
                no: nextTaskNo(),
                name: name,
                dependency: '',
                status: status,
                progress: status === 'Complete' ? 100 : 0,
                start: startInput.value,
                due: dueInput.value,
                completed: '',
                timeTaken: '',
                rating: 'NA',
                assigned: assigned,
                followers: [ME],
                tags: [],
                priority: document.getElementById('tkNewPriority').value,
                project: document.getElementById('tkNewProject').value,
                qcStatus: 'Pending',
                checklistDone: 0,
                checklistTotal: 0,
                dueCrossed: dueInput.value < TODAY_ISO && status !== 'Complete' ? 1 : 0,
                overdue: dueInput.value < TODAY_ISO && status !== 'Complete'
            });

            getTkModal().hide();
            renderSummary();
            renderOverdueAlert();
            renderAll();
            showToast('Task "' + name + '" created');
        });

        if (tkModalEl) {
            /* Modal-kkulla select2 — dropdownParent fix (project idiom) */
            tkModalEl.addEventListener('shown.bs.modal', function() {
                if (window.jQuery && jQuery.fn.select2) {
                    jQuery('#tkModal .select2').each(function() {
                        var $s = jQuery(this);
                        if ($s.data('select2')) $s.select2('destroy');
                        $s.select2({ width: '100%', dropdownParent: jQuery(tkModalEl) });
                    });
                }
                document.getElementById('tkNewName').focus();
            });
        }

        /* ---------------- Toast ---------------- */
        var toastWrap = null;

        function getToastWrap() {
            if (!toastWrap) {
                toastWrap = document.createElement('div');
                toastWrap.className = 'tk-toast-wrap';
                document.body.appendChild(toastWrap);
            }
            return toastWrap;
        }

        function showToast(msg) {
            var wrap = getToastWrap();
            var t = document.createElement('div');
            t.className = 'tk-toast';
            t.innerHTML = '<span class="tk-toast-ico"><i class="bi bi-check-lg"></i></span>' +
                '<span class="tk-toast-msg"></span>' +
                '<button type="button" class="tk-toast-x" title="Close"><i class="bi bi-x-lg"></i></button>';
            t.querySelector('.tk-toast-msg').textContent = msg;
            wrap.appendChild(t);

            function dismiss() {
                t.classList.add('tk-toast-out');
                setTimeout(function() { t.remove(); }, 260);
            }
            t.querySelector('.tk-toast-x').addEventListener('click', dismiss);
            setTimeout(dismiss, 4000);
        }

        /* ---------------- Init ---------------- */
        populateFilters();
        renderSummary();
        renderOverdueAlert();
        renderAll();
    })();
</script>

<script>
    /* ---------------- View Switcher (All Tasks vs Daily Report) ---------------- */
    function switchTaskView(view) {
        var tasksContainer = document.getElementById('viewTasksContainer');
        var dailyContainer = document.getElementById('viewDailyReportContainer');
        var tabTasks = document.getElementById('viewTabTasks');
        var tabDaily = document.getElementById('viewTabDailyReport');
        var btnTasksFilter = document.getElementById('btnTasksFilter');
        var btnDailyFilter = document.getElementById('btnDailyFilter');
        var btnSummary = document.getElementById('btnTasksSummary');

        if (view === 'daily-report') {
            if (tasksContainer) tasksContainer.style.display = 'none';
            if (dailyContainer) dailyContainer.style.display = 'block';
            if (tabTasks) tabTasks.className = 'btn btn-sm rounded-pill px-3 py-1 fw-semibold text-secondary';
            if (tabDaily) tabDaily.className = 'btn btn-sm rounded-pill px-3 py-1 fw-semibold btn-primary';
            if (btnTasksFilter) btnTasksFilter.style.display = 'none';
            if (btnDailyFilter) btnDailyFilter.style.display = '';
            if (btnSummary) btnSummary.style.display = 'none';
            if (typeof initDailyTaskTable === 'function' && !window.dailyTableInitialized) {
                initDailyTaskTable();
                window.dailyTableInitialized = true;
            }
            if (window.history && window.history.replaceState) {
                history.replaceState(null, '', 'tasks-list.php?view=daily-report');
            }
        } else {
            if (tasksContainer) tasksContainer.style.display = 'block';
            if (dailyContainer) dailyContainer.style.display = 'none';
            if (tabTasks) tabTasks.className = 'btn btn-sm rounded-pill px-3 py-1 fw-semibold btn-primary';
            if (tabDaily) tabDaily.className = 'btn btn-sm rounded-pill px-3 py-1 fw-semibold text-secondary';
            if (btnTasksFilter) btnTasksFilter.style.display = '';
            if (btnDailyFilter) btnDailyFilter.style.display = 'none';
            if (btnSummary) btnSummary.style.display = '';
            if (window.history && window.history.replaceState) {
                history.replaceState(null, '', 'tasks-list.php?view=tasks');
            }
        }
    }
    window.switchTaskView = switchTaskView;

    // Auto initialize daily report table if view is daily-report on page load
    document.addEventListener('DOMContentLoaded', function() {
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('view') === 'daily-report' && typeof initDailyTaskTable === 'function') {
            initDailyTaskTable();
            window.dailyTableInitialized = true;
        }
    });

    /* ---------------- Daily Task Report Script Logic ---------------- */
    $(document).ready(function() {
        if ($.fn.select2) {
            $('.select2').select2({
                width: '100%'
            });
        }
    });

    // Initial Report Data
    var reportProjectsData = [
        { id: 1, name: 'Test Project', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 2, name: 'NEW TEST', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 3, name: 'koka soft', tasks: 2, status: 'Yes', members: ['OK', 'AS'], membersStr: 'OK AS' },
        { id: 4, name: 'welcome', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 5, name: 'welcome123', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 6, name: 'KOKA Electrical Work', tasks: 5, status: 'Yes', members: ['OK', 'AS', 'RM'], membersStr: 'OK AS RM' },
        { id: 7, name: 'TEST PROJECT 2', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 8, name: 'koka book', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 9, name: 'Tester', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 10, name: 'Factory Interior', tasks: 3, status: 'Yes', members: ['SK', 'RM'], membersStr: 'SK RM' },
        { id: 11, name: 'Construction project', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 12, name: 'Solar panel', tasks: 4, status: 'Yes', members: ['AS', 'SK'], membersStr: 'AS SK' },
        { id: 13, name: 'College Project', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 14, name: 'painting', tasks: 2, status: 'Yes', members: ['OK'], membersStr: 'OK' },
        { id: 15, name: 'RSB Arch', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 16, name: 'Check and Charge', tasks: 0, status: 'No', members: [], membersStr: '' },
        { id: 17, name: 'Solar Panel Installation', tasks: 6, status: 'Yes', members: ['OK', 'AS', 'SK', 'RM'], membersStr: 'OK AS SK RM' }
    ];

    var dailyReportMasterTable = null;

    document.addEventListener('DOMContentLoaded', function() {
        initDailyTaskTable(reportProjectsData);
    });

    function initDailyTaskTable(dataArray) {
        dailyReportMasterTable = MasterTable.init({
            tableId: 'dailyTaskReportTable',
            tbodyId: 'dailyTaskReportBody',
            data: dataArray,
            tableName: 'Projectwise Daily Activity',
            primaryKey: 'id',
            searchFields: ['name', 'status', 'membersStr'],
            columns: [
                { field: null, title: '<input type="checkbox" id="selectAllCheckbox" class="form-check-input" onclick="toggleSelectAllRows(this)">', sortable: false, render: function(val, row) {
                    return '<input type="checkbox" class="form-check-input row-report-checkbox" data-id="' + row.id + '">';
                }},
                { field: 'name', title: 'PROJECT NAME', sortable: true, render: function(val, row) {
                    return '<a href="project-dashboard.php?id=' + row.id + '&name=' + encodeURIComponent(val) + '" class="proj-link">' + escapeHtml(val) + '</a>';
                }},
                { field: 'tasks', title: 'TASK COUNT', sortable: true, render: function(val) {
                    return '<span class="fw-bold ' + (val > 0 ? 'text-primary' : 'text-muted') + '">' + val + '</span>';
                }},
                { field: 'status', title: 'WORKING STATUS', sortable: true, render: function(val) {
                    if (val === 'Yes') {
                        return '<span class="status-pill" style="background:#dcfce7;color:#15803d;padding:4px 12px;border-radius:999px;font-weight:700;font-size:11.5px;"><i class="bi bi-check-circle-fill me-1"></i>Yes</span>';
                    } else {
                        return '<span class="status-pill" style="background:#f1f5f9;color:#64748b;padding:4px 12px;border-radius:999px;font-weight:600;font-size:11.5px;">No</span>';
                    }
                }},
                { field: 'members', title: 'MEMBERS', sortable: false, render: function(val) {
                    if (Array.isArray(val) && val.length > 0) {
                        var html = '<div class="member-avatar-stack">';
                        var classMap = {'OK': 'avatar-ok', 'AS': 'avatar-as', 'SK': 'avatar-sk', 'RM': 'avatar-rm'};
                        val.forEach(function(m) {
                            var cls = classMap[m] || 'avatar-ok';
                            html += '<div class="member-avatar ' + cls + '" data-bs-toggle="tooltip" title="Member ' + m + '">' + m + '</div>';
                        });
                        html += '</div>';
                        return html;
                    }
                    return '<span class="text-muted small">-</span>';
                }}
            ]
        });
    }

    function toggleSelectAllRows(masterCheckbox) {
        var isChecked = masterCheckbox.checked;
        var checkboxes = document.querySelectorAll('.row-report-checkbox');
        checkboxes.forEach(function(cb) {
            cb.checked = isChecked;
        });
    }

    
    function updateDailyTaskFilterBadge() {
        var count = 0;
        var proj = document.getElementById('reportProjects');
        if (proj && proj.value && proj.value !== 'all') count++;
        var status = document.getElementById('reportStatus');
        if (status && status.value) count++;
        var badge = document.getElementById('dailyTaskFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            if (count > 0) badge.classList.remove('d-none');
            else badge.classList.add('d-none');
        }
    }

    function resetDailyTaskFilters() {
        var proj = document.getElementById('reportProjects');
        if (proj) {
            proj.value = '';
            if (window.$ && $(proj).data('select2')) $(proj).val('').trigger('change');
        }
        var status = document.getElementById('reportStatus');
        if (status) {
            status.value = '';
            if (window.$ && $(status).data('select2')) $(status).val('').trigger('change');
        }
        updateDailyTaskFilterBadge();
        dailyReportMasterTable.setData(reportProjectsData);
    }

    function applyReportFilters() {
        updateDailyTaskFilterBadge();
        var selectedProj = document.getElementById('reportProjects').value.toLowerCase();
        var selectedStatus = document.getElementById('reportStatus').value;

        var filtered = reportProjectsData.filter(function(item) {
            var matchProj = (selectedProj === '' || selectedProj === 'all' || item.name.toLowerCase().includes(selectedProj));
            var matchStatus = (selectedStatus === '' || item.status === selectedStatus);
            return matchProj && matchStatus;
        });

        dailyReportMasterTable.setData(filtered);
    }

    function escapeHtml(text) {
        if (!text) return '';
        return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    }
</script>
