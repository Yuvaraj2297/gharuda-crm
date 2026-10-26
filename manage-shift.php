<?php include 'header.php'; ?>

 



<style>
    .shift-name-cell { display:flex; align-items:center; gap:10px; }
    .shift-dot { width:10px; height:10px; border-radius:3px; flex-shrink:0; }
    .shift-name-text { font-weight:700; font-size:13.5px; color:var(--ink-900); }
    .shift-tag { display:inline-flex; align-items:center; padding:3px 10px; border-radius:6px; font-size:11px; font-weight:700; border:1px solid; margin-left:8px; white-space:nowrap; }
    .shift-grid thead th.day-col { text-align:center; min-width:130px; }
    .shift-grid tbody td.day-col { text-align:center; font-size:13px; font-weight:600; color:var(--ink-900); white-space:nowrap; }
    .shift-grid tbody td.day-col.flexible { color:var(--ink-300); font-style:italic; font-weight:500; }
    .shift-actions-bar { display:flex; align-items:center; gap:10px; margin-left:auto; }
    .shift-actions-bar .btn { font-size:13px; font-weight:600; border-radius:10px; padding:8px 16px; }
    .btn-assign-shift, .btn-attendance-rule { display:inline-flex; align-items:center; gap:5px; color:var(--ink-700); background:#fff; border:1px solid var(--border-soft); }
    .btn-assign-shift:hover, .btn-attendance-rule:hover { background:var(--bg-app); color:var(--ink-900); }

    .table-modern.shiftBlock tbody tr td {
            padding: 16px 26px;
    }
</style>

<!-- Page header -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div class="w-100">
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Manage Shift</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap overflow-auto breadcrumb-text">
            <i class="bi bi-clock-history fs-6"></i>
            <span>Attendance Management</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Manage Shift</span>
        </nav>
    </div>
</div>

<!-- Shifts table card (table.php 2nd design) -->
<div class="card-custom p-0" id="shiftTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-clock-history"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Shifts (<span id="shiftCount">0</span>)</h3>
            </div>
        </div>
        <div class="shift-actions-bar flex-wrap text-nowrap">
            <a href="shift-shedule.php" class="btn btn-assign-shift btn-sm">Assign Shift <i class="bi bi-box-arrow-up-right" style="font-size:12px;"></i></a>
            <!-- <button type="button" class="btn btn-attendance-rule btn-sm">Attendance Rule</button> -->
            <a href="create-shift.php" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg me-1"></i> Create Shift</a>
        </div>
    </div>

    <!-- Toolbar auto-created by master-table.js -->

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 stickyBlock shiftBlock" id="shiftTable">
            <thead>
                <tr>
                    <th class="gh-cursor-pointer text-nowrap">S.No</th>
                    <th class="gh-cursor-pointer text-nowrap">
                        <div class="shift-name-header">
                            Shift Name
                        </div>
                    </th>
                    <th class="gh-cursor-pointer text-nowrap">Department</th>
                    <th class="gh-cursor-pointer text-nowrap">Position</th>
                    <th class="gh-cursor-pointer text-nowrap day-col">Sun</th>
                    <th class="gh-cursor-pointer text-nowrap day-col">Mon</th>
                    <th class="gh-cursor-pointer text-nowrap day-col">Tue</th>
                    <th class="gh-cursor-pointer text-nowrap day-col">Wed</th>
                    <th class="gh-cursor-pointer text-nowrap day-col">Thu</th>
                    <th class="gh-cursor-pointer text-nowrap day-col">Fri</th>
                    <th class="gh-cursor-pointer text-nowrap day-col">Sat</th>
                </tr>
            </thead>
            <tbody id="pgBody"></tbody>
        </table>
    </div>

    <!-- Footer auto-created by master-table.js -->

</div>





<?php include 'footer.php'; ?>

<script src="./assets/js/pages/manage-shift.js?v=<?php echo time(); ?>"></script>