/**
 * Gharuda CRM - Score Card Page Script
 * File: assets/js/pages/score-card.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
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

    function applyScorecardFilters() {
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
