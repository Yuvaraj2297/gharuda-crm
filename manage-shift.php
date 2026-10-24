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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var wrap = document.querySelector('.table-modern-wrap');
        if (!wrap) return;
        function toggleStickyShadow() {
            wrap.classList.toggle('is-scrolled', wrap.scrollLeft > 0);
        }
        wrap.addEventListener('scroll', toggleStickyShadow);
        toggleStickyShadow();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var wrap = document.querySelector('.table-modern-wrap');
        if (!wrap) return;
        function toggleStickyShadow() {
            wrap.classList.toggle('is-scrolled', wrap.scrollLeft > 0);
        }
        wrap.addEventListener('scroll', toggleStickyShadow);
        toggleStickyShadow();
    });
</script>

<?php include 'footer.php'; ?>

<script>
    var shiftData = [
        { id: 1, shift_name: 'Default Shift', tag: 'Default', tag_color: '#3b82f6', dot_color: '#3b82f6', timing: { start: '10:00', end: '19:00' }, status: 'Enable', department: 'All Departments', position: 'All Positions' },
        { id: 2, shift_name: 'Open Shift', tag: 'System Defined', tag_color: '#f59e0b', dot_color: '#f59e0b', timing: null, status: 'Enable', department: 'All Departments', position: 'All Positions' },
        { id: 3, shift_name: 'Morning Shift', tag: '', tag_color: '', dot_color: '#16a34a', timing: { start: '06:00', end: '14:00' }, status: 'Enable', department: 'Developer', position: 'Frontend' },
        { id: 4, shift_name: 'Night Shift', tag: '', tag_color: '', dot_color: '#8b5cf6', timing: { start: '22:00', end: '06:00' }, status: 'Enable', department: 'Developer', position: 'Backend' }
    ];
    var shiftDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    // Update shift count
    document.getElementById('shiftCount').textContent = shiftData.length;

    // Build tbody rows
    var tbody = document.getElementById('pgBody');
    var html = '';
    shiftData.forEach(function(s, i) {
        html += '<tr data-id="' + s.id + '">';
        html += '<td data-label="S.No">' + (i + 1) + '</td>';
        html += '<td data-label="Shift Name"><div class="shift-name-cell">';
        html += '<span class="shift-dot" style="background:' + s.dot_color + ';"></span>';
        html += '<span class="shift-name-text">' + s.shift_name + '</span>';
        if (s.tag) {
            html += '<span class="shift-tag" style="color:' + s.tag_color + ';border-color:' + s.tag_color + '20;background:' + s.tag_color + '10;">' + s.tag + '</span>';
        }
        html += '</div></td>';
        html += '<td data-label="Department">' + (s.department || '-') + '</td>';
        html += '<td data-label="Position">' + (s.position || '-') + '</td>';
        shiftDays.forEach(function(d) {
            if (s.timing) {
                var startTime = formatTime(s.timing.start);
                var endTime = formatTime(s.timing.end);
                html += '<td class="day-col" data-label="' + d + '">' + startTime + ' - ' + endTime + '</td>';
            } else {
                html += '<td class="day-col flexible" data-label="' + d + '">Flexible timing</td>';
            }
        });
        html += '</tr>';
    });
    tbody.innerHTML = html;

    function formatTime(timeStr) {
        var parts = timeStr.split(':');
        var h = parseInt(parts[0], 10);
        var m = parts[1];
        var ampm = h >= 12 ? 'PM' : 'AM';
        h = h % 12;
        if (h === 0) h = 12;
        return h + ':' + m + ' ' + ampm;
    }

    MasterTable.init({
        tableId: 'shiftTable',
        tbodyId: 'pgBody',
        data: shiftData,
        tableName: 'Shift',
        primaryKey: 'id',
        searchFields: ['shift_name', 'tag', 'status'],
        columns: [
            { field: 'shift_name', title: 'Shift Name', sortable: true },
            { field: 'department', title: 'Department', sortable: true },
            { field: 'position', title: 'Position', sortable: true },
            { field: 'status', title: 'Status', sortable: true }
        ],
        skipRender: true,
        onEdit: function () {},
        onDelete: function () {}
    });
</script>