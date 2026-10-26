/**
 * Gharuda CRM - Projectwise Daily Task Report Page Script
 * File: assets/js/pages/projectwise-daily-task-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
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
