/**
 * Gharuda CRM - Projects Report Page Script
 * File: assets/js/pages/projects-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
var currentActiveProjectId = null;
    var currentActiveProjectName = '';
    var currentActiveCustomerName = '';

    // Sample Milestones Database per Project
    var projectMilestonesData = {
        '19': [
            { id: 'MS-101', name: 'Requirement Analysis & SRS', plannedStart: '04-09-2026', plannedEnd: '15-09-2026', actualStart: '04-09-2026', actualEnd: '14-09-2026', diff: '0 days', pct: '100%', status: 'Completed' },
            { id: 'MS-102', name: 'UI / UX Prototype & Wireframing', plannedStart: '16-09-2026', plannedEnd: '30-09-2026', actualStart: '16-09-2026', actualEnd: '--', diff: '--', pct: '40%', status: 'In Progress' }
        ],
        '18': [
            { id: 'MS-201', name: 'Database Architecture Setup', plannedStart: '29-06-2026', plannedEnd: '15-07-2026', actualStart: '29-06-2026', actualEnd: '10-07-2026', diff: '0 days', pct: '100%', status: 'Completed' }
        ],
        '17': [
            { id: 'MS-301', name: 'Product Catalog & Cart API', plannedStart: '15-08-2026', plannedEnd: '30-09-2026', actualStart: '15-08-2026', actualEnd: '28-09-2026', diff: '0 days', pct: '100%', status: 'Completed' },
            { id: 'MS-302', name: 'Stripe & PayPal Integration', plannedStart: '01-10-2026', plannedEnd: '15-11-2026', actualStart: '01-10-2026', actualEnd: '--', diff: '--', pct: '50%', status: 'In Progress' }
        ]
    };

    function openProjectMilestoneOffcanvas(projId, projName, customerName) {
        currentActiveProjectId = projId;
        currentActiveProjectName = projName || 'Project';
        currentActiveCustomerName = customerName || 'Client';

        document.getElementById('offcanvasProjId').innerText = projId;
        document.getElementById('offcanvasProjName').innerText = projName;
        document.getElementById('offcanvasCustomerName').innerText = customerName;

        renderMilestonesTable(projId);

        var offcanvasEl = document.getElementById('projectMilestoneOffcanvas');
        if (offcanvasEl) {
            if (offcanvasEl.parentNode !== document.body) {
                document.body.appendChild(offcanvasEl);
            }
            var bsOffcanvas = bootstrap.Offcanvas.getOrCreateInstance(offcanvasEl);
            bsOffcanvas.show();
        }
    }

    function renderMilestonesTable(projId) {
        var tbody = document.getElementById('milestoneTableBody');
        if (!tbody) return;

        var milestones = projectMilestonesData[projId] || [];
        var totalCount = milestones.length;
        document.getElementById('kpiTotalMilestones').innerText = totalCount;

        if (totalCount === 0) {
            document.getElementById('kpiAvgMilestonePct').innerText = '0%';
            tbody.innerHTML = '<tr><td colspan="10" class="py-5 text-center text-muted bg-light fw-bold">' +
                '<i class="bi bi-folder-x display-6 text-secondary d-block mb-2"></i>' +
                '<span class="fs-6">No Milestones logged for this project yet.</span><br>' +
                '<small class="text-secondary font-normal">Click "+ Add Milestone" button above to create the first milestone entry.</small>' +
            '</td></tr>';
            return;
        }

        var totalPctSum = 0;
        var html = '';

        milestones.forEach(function(m, idx) {
            var pctVal = parseInt(m.pct) || 0;
            totalPctSum += pctVal;

            var statusBadge = '<span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-2">In Progress</span>';
            if (m.status === 'Completed') {
                statusBadge = '<span class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1 rounded-2">Completed</span>';
            } else if (m.status === 'Not Started') {
                statusBadge = '<span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2.5 py-1 rounded-2">Not Started</span>';
            } else if (m.status === 'On Hold') {
                statusBadge = '<span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2.5 py-1 rounded-2">On Hold</span>';
            }

            html += '<tr>' +
                '<td class="fw-bold text-dark">' + escapeHtml(m.id) + '</td>' +
                '<td class="fw-bold text-dark text-start">' + escapeHtml(m.name) + '</td>' +
                '<td class="fw-semibold">' + escapeHtml(m.plannedStart) + '</td>' +
                '<td class="fw-semibold">' + escapeHtml(m.plannedEnd) + '</td>' +
                '<td class="text-muted">' + escapeHtml(m.actualStart) + '</td>' +
                '<td class="text-muted">' + escapeHtml(m.actualEnd) + '</td>' +
                '<td class="text-muted">' + escapeHtml(m.diff) + '</td>' +
                '<td><span class="badge bg-soft-success text-success border border-success-subtle px-2 py-1 fw-bold">' + escapeHtml(m.pct) + '</span></td>' +
                '<td>' + statusBadge + '</td>' +
                '<td>' +
                    '<button type="button" class="btn btn-sm btn-outline-danger border-0 rounded-2 p-1" onclick="deleteMilestone(\'' + projId + '\', ' + idx + ')" title="Delete Milestone">' +
                        '<i class="bi bi-trash-fill"></i>' +
                    '</button>' +
                '</td>' +
            '</tr>';
        });

        tbody.innerHTML = html;
        var avgPct = Math.round(totalPctSum / totalCount);
        document.getElementById('kpiAvgMilestonePct').innerText = avgPct + '%';
    }

    function openAddMilestoneModal() {
        document.getElementById('addMilestoneForm').reset();
        var modalEl = document.getElementById('addMilestoneModal');
        if (modalEl) {
            if (modalEl.parentNode !== document.body) {
                document.body.appendChild(modalEl);
            }
            var bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
            bsModal.show();
        }
    }

    function saveNewMilestone(e) {
        e.preventDefault();
        var projId = currentActiveProjectId || '19';
        if (!projectMilestonesData[projId]) {
            projectMilestonesData[projId] = [];
        }

        var mName = document.getElementById('mName').value;
        var mPlannedStart = document.getElementById('mPlannedStart').value || '2026-09-01';
        var mPlannedEnd = document.getElementById('mPlannedEnd').value || '2026-09-15';
        var mPct = document.getElementById('mPct').value + '%';
        var mStatus = document.getElementById('mStatus').value;

        var newId = 'MS-' + (projectMilestonesData[projId].length + 101);

        projectMilestonesData[projId].push({
            id: newId,
            name: mName,
            plannedStart: mPlannedStart,
            plannedEnd: mPlannedEnd,
            actualStart: '--',
            actualEnd: '--',
            diff: '--',
            pct: mPct,
            status: mStatus
        });

        renderMilestonesTable(projId);

        var modalEl = document.getElementById('addMilestoneModal');
        var bsModal = bootstrap.Modal.getInstance(modalEl);
        if (bsModal) bsModal.hide();
    }

    function deleteMilestone(projId, index) {
        if (confirm('Are you sure you want to delete this milestone entry?')) {
            if (projectMilestonesData[projId]) {
                projectMilestonesData[projId].splice(index, 1);
                renderMilestonesTable(projId);
            }
        }
    }

    /* AutoMasterTable Integration for External Filtering */
    var currentQuickTag = 'all';
    var currentStatusFilter = 'All';
    var currentStaffFilter = '';
    var fromDateVal = '';
    var toDateVal = '';

    window.attendanceRowMatches = function (tr) {
        if (!tr || tr.classList.contains('no-record-row')) return true;
        if (tr.closest('#projectReportTable')) {
            var st = tr.getAttribute('data-status') || '';
            var qt = tr.getAttribute('data-quicktag') || '';
            var sf = tr.getAttribute('data-staff') || '';
            var dStart = tr.getAttribute('data-start-date') || '';
            var dEnd = tr.getAttribute('data-end-date') || '';

            if (currentQuickTag !== 'all' && qt !== currentQuickTag) return false;
            if (currentStatusFilter !== 'All' && st !== currentStatusFilter) return false;
            if (currentStaffFilter && currentStaffFilter !== 'All' && currentStaffFilter !== 'Assigned' && sf.indexOf(currentStaffFilter) === -1) return false;
            if (fromDateVal && dStart && dStart < fromDateVal) return false;
            if (toDateVal && dEnd && dEnd > toDateVal) return false;

            return true;
        }
        return true;
    };

    function triggerTableFilter() {
        var tbl = document.getElementById('projectReportTable');
        if (tbl && tbl.autoTable && typeof tbl.autoTable.render === 'function') {
            tbl.autoTable.render();
        }
    }

    function handleReportSearch(e) {
        e.preventDefault();
        var staffEl = document.getElementById('filterStaffMember');
        var fromEl = document.getElementById('filterFromDate');
        var toEl = document.getElementById('filterToDate');

        currentStaffFilter = staffEl ? staffEl.value : '';
        var fv = fromEl ? fromEl.value.trim() : '';
        var tv = toEl ? toEl.value.trim() : '';
        fromDateVal = convertToIso(fv);
        toDateVal = convertToIso(tv);

        triggerTableFilter();
    }

    function convertToIso(dateStr) {
        if (!dateStr) return '';
        if (/^\d{4}-\d{2}-\d{2}$/.test(dateStr)) return dateStr;
        var parts = dateStr.split('-');
        if (parts.length === 3) {
            return parts[2] + '-' + parts[1] + '-' + parts[0];
        }
        return dateStr;
    }

    function filterByQuickTag(tag) {
        currentQuickTag = tag;
        triggerTableFilter();
    }

    function filterByStatus(status) {
        currentStatusFilter = status;
        triggerTableFilter();
    }

    function resetReportFilters() {
        var form = document.getElementById('projectReportFilterForm');
        if (form) form.reset();
        if (window.jQuery && $('#filterStaffMember').length) {
            $('#filterStaffMember').val('Assigned').trigger('change');
        }
        currentQuickTag = 'all';
        currentStatusFilter = 'All';
        currentStaffFilter = '';
        fromDateVal = '';
        toDateVal = '';
        triggerTableFilter();
    }

    function openDetailedOverviewModal() {
        var modalEl = document.getElementById('detailedOverviewModal');
        if (modalEl) {
            var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    }

    function escapeHtml(text) {
        if (!text) return '';
        return String(text).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (window.jQuery && $.fn.select2) {
            $('#filterStaffMember').select2({ minimumResultsForSearch: 6 });
        }
    });
