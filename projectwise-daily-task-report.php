<?php include 'header.php'; ?>


<link rel="stylesheet" href="./assets/css/select2.css">



<div class="container-fluid px-3 px-md-4 py-3">

    <!-- Page Header & Action Bar -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title + Subtitle -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-secondary-subtle text-secondary d-flex align-items-center justify-content-center flex-shrink-0" style="width:36px;height:36px;font-size:18px;">
                <i class="bi bi-calendar2-check"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title">Daily Task Report</h1>
                <span class="text-muted font-11">Project-wise daily task activity, work status &amp; team allocation · <?= date('F d, Y') ?></span>
            </div>
        </div>
        
        <!-- RIGHT: Filters + Actions -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#dailyTaskFilterOffcanvas" aria-controls="dailyTaskFilterOffcanvas">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="dailyTaskFilterCountBadge">0</span>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1" onclick="window.print()">
                <i class="bi bi-printer"></i><span>Print</span>
            </button>
        </div>
    </div>

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

<!-- Include jQuery, Select2, DatePicker and MasterTable JS -->
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/select2.js"></script>
<script src="./assets/js/date-picker.js"></script>
<script src="master-table.js"></script>

<script>
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

<?php include 'footer.php'; ?>
