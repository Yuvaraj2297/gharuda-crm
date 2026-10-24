<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/date-picker.css">
<link rel="stylesheet" href="./assets/css/table.css">
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    :root {
        --gh-primary: #0284c7;
        --gh-primary-hover: #0369a1;
        --gh-primary-light: #e0f2fe;
        --gh-success: #10b981;
        --gh-warning: #f59e0b;
        --gh-danger: #ef4444;
        --gh-dark: #0f172a;
        --gh-slate-700: #334155;
        --gh-slate-500: #64748b;
        --gh-border: #e2e8f0;
        --gh-bg-card: #ffffff;
        --gh-shadow-sm: 0 1px 3px rgba(15, 23, 42, 0.06), 0 1px 2px rgba(15, 23, 42, 0.04);
    }

    .report-wrapper {
        background-color: #f8fafc;
        min-height: calc(100vh - 70px);
        padding: 24px;
        padding-bottom: 4rem;
    }

    /* Top Page Header */
    .report-header-card {
        background: #ffffff;
        border: 1px solid var(--gh-border);
        border-radius: 14px;
        padding: 20px 24px;
        margin-bottom: 20px;
        box-shadow: var(--gh-shadow-sm);
    }

    .report-title {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--gh-dark);
        margin: 0;
        letter-spacing: -0.02em;
    }

    /* Filters Card */
    .report-filters-card {
        background: #ffffff;
        border: 1px solid var(--gh-border);
        border-radius: 14px;
        padding: 20px 24px;
        margin-bottom: 24px;
        box-shadow: var(--gh-shadow-sm);
        overflow: visible !important;
        position: relative;
    }

    .filter-label {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--gh-slate-500);
        margin-bottom: 6px;
        display: block;
    }

    .filter-control {
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        font-size: 13.5px;
        padding: 8px 14px;
        height: 40px;
        width: 100%;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        background-color: #fff;
    }

    .filter-control:focus {
        border-color: var(--gh-primary);
        box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
        outline: none;
    }

    .btn-search-report {
        background-color: #0284c7;
        color: #fff;
        font-weight: 700;
        font-size: 13.5px;
        padding: 8px 24px;
        height: 40px;
        border-radius: 8px;
        border: none;
        transition: background-color 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .btn-search-report:hover {
        background-color: #0369a1;
        color: #fff;
    }

    /* Avatar Stack */
    .member-avatar-stack {
        display: flex;
        align-items: center;
    }

    .member-avatar {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #ffffff;
        margin-left: -6px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    .member-avatar:first-child {
        margin-left: 0;
    }

    .avatar-ok { background-color: #f59e0b; }
    .avatar-as { background-color: #8b5cf6; }
    .avatar-sk { background-color: #0284c7; }
    .avatar-rm { background-color: #10b981; }

    .proj-link {
        font-weight: 600;
        color: #0284c7;
        text-decoration: none;
    }

    .proj-link:hover {
        color: #0369a1;
        text-decoration: underline;
    }

    /* Master Table Container matching employees-report.php */
    .card-custom {
        background: #ffffff;
        border: 1px solid var(--gh-border);
        border-radius: 14px;
        box-shadow: var(--gh-shadow-sm);
        overflow: hidden;
    }

    /* Columns & Export Button Badges (Exact design from employees-report.php) */
    .columns-btn {
        background-color: #fef3c7 !important;
        color: #d97706 !important;
        border: 1px solid #fde68a !important;
        font-weight: 700 !important;
        font-size: 12.5px !important;
        border-radius: 8px !important;
        padding: 6px 14px !important;
    }

    .columns-btn:hover {
        background-color: #fde68a !important;
        color: #b45309 !important;
    }

    .export-btn-pdf {
        background-color: #dcfce7 !important;
        color: #15803d !important;
        border: 1px solid #bbf7d0 !important;
        font-weight: 700 !important;
        font-size: 12.5px !important;
        border-radius: 8px !important;
        padding: 6px 14px !important;
    }

    /* Select2 Customization */
    .select2-container--default .select2-selection--single {
        height: 40px !important;
        border-radius: 8px !important;
        border: 1px solid #cbd5e1 !important;
        padding: 5px 10px !important;
        font-size: 13.5px !important;
        font-weight: 500 !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
        right: 10px !important;
    }

    .select2-container--default.select2-container--open .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.18) !important;
        outline: none !important;
    }

    .select2-dropdown {
        border-radius: 12px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12) !important;
        z-index: 99999 !important;
    }

    .select2-search__field {
        border-radius: 8px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 6px 12px !important;
    }

    /* Datepicker Overrides */
    .date-picker {
        position: relative !important;
        width: 100%;
        z-index: 1050;
    }

    .date-picker:focus-within {
        z-index: 1060;
    }

    .calendar-dropdown {
        position: absolute !important;
        z-index: 999999 !important;
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 16px !important;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.18) !important;
        outline: none !important;
    }

    .calendar-header {
        background: #16a34a !important;
        border-radius: 14px 14px 0 0 !important;
        padding: 10px 14px !important;
    }

    .calendar-header .custom-select {
        background: rgba(255, 255, 255, 0.2) !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        border-radius: 8px !important;
    }

    .calendar-header .month-input,
    .calendar-header .year-input,
    .calendar-header .select-arrow,
    .calendar-header .nav-btn {
        color: #ffffff !important;
    }

    .weekdays {
        background: #f1f5f9 !important;
        color: #334155 !important;
        font-weight: 700 !important;
    }

    .days .day.selected {
        border: 1.5px solid #10b981 !important;
        color: #16a34a !important;
        font-weight: 700 !important;
        border-radius: 8px !important;
        background: #f0fdf4 !important;
    }

    .days .day:hover {
        background: #dcfce7 !important;
        color: #15803d !important;
        border-radius: 8px !important;
    }

    .today-btn {
        color: #16a34a !important;
        font-weight: 700 !important;
    }
</style>

<div class="report-wrapper">
    <!-- Top Header Card -->
    <div class="report-header-card d-flex align-items-center justify-content-between">
        <h4 class="report-title">Projectwise Daily Activity Report:</h4>
        <div class="text-muted small">
            <i class="bi bi-calendar3 me-1"></i> <?= date('F d, Y') ?>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="report-filters-card">
        <form method="GET" action="" id="dailyReportFilterForm" onsubmit="event.preventDefault(); applyReportFilters();">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="filter-label" for="reportDate">Date</label>
                    <div class="date-picker">
                        <input type="text" id="reportDate" class="date-input form-control filter-control" value="<?= date('d-m-Y') ?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="filter-label" for="reportProjects">Projects</label>
                    <select id="reportProjects" class="form-select filter-control select2">
                        <option value="">Non selected</option>
                        <option value="all">All Projects</option>
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
                        <option value="Solar Panel Installation">Solar Panel Installation</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="filter-label" for="reportStatus">Working Status</label>
                    <select id="reportStatus" class="form-select filter-control select2">
                        <option value="">Non selected</option>
                        <option value="Yes">Yes (Working)</option>
                        <option value="No">No (Not Working)</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-search-report w-100">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Table Section Card matching employees-report.php -->
    <div class="card-custom mb-4">
        <div class="table-responsive">
            <table class="table-modern master-table column-border" id="dailyTaskReportTable">
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

    function applyReportFilters() {
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
