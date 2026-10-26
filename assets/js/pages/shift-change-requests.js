/**
 * Gharuda CRM - Shift Change Requests Page Script
 * File: assets/js/pages/shift-change-requests.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
    'use strict';

    function $id(id) { return document.getElementById(id); }

    function esc(value) {
        var div = document.createElement('div');
        div.appendChild(document.createTextNode(String(value == null ? '' : value)));
        return div.innerHTML;
    }

    function nowStamp() {
        var d = new Date();
        var mn = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var h = d.getHours();
        var suf = h >= 12 ? 'PM' : 'AM';
        var h12 = h % 12; if (h12 === 0) h12 = 12;
        return String(d.getDate()).padStart(2, '0') + ' ' + mn[d.getMonth()] + ' ' + d.getFullYear() +
            ', ' + String(h12).padStart(2, '0') + ':' + String(d.getMinutes()).padStart(2, '0') + ' ' + suf;
    }

    /* ---------------- demo data ---------------- */

    var requests = [
        {
            reqId: 'SCR-1042', createdAt: '03 Oct 2026, 09:12 AM',
            empName: 'Vijai', empCode: 'EMP41', avatar: 'profile-1.jpg',
            dayName: 'Monday', dateStr: '05 Oct 2026', scopeText: 'This day only',
            fromShift: 'General Shift', toShift: 'Morning Shift',
            reason: 'Early morning client stand-up call.',
            managerName: 'Shailni Raj', managerAvatar: 'profile-3.jpg',
            status: 'Pending'
        },
        {
            reqId: 'SCR-1041', createdAt: '03 Oct 2026, 08:40 AM',
            empName: 'Karthik Raja', empCode: 'EMP34', avatar: 'profile-2.jpg',
            dayName: 'Saturday', dateStr: '10 Oct 2026', scopeText: 'This day only',
            fromShift: 'Not assigned', toShift: 'Night Shift',
            reason: 'Requested an extra weekend night shift.', swapWith: 'with Mohammed Farhan',
            managerName: 'Shailni Raj', managerAvatar: 'profile-3.jpg',
            status: 'Pending'
        },
        {
            reqId: 'SCR-1040', createdAt: '02 Oct 2026, 06:05 PM',
            empName: 'Priya Sharma', empCode: 'EMP33', avatar: 'profile-3.jpg',
            dayName: 'Mon – Fri', dateStr: '06 Oct 2026', scopeText: '06 Oct 2026 to 10 Oct 2026',
            fromShift: 'General Shift', toShift: 'Evening Shift',
            reason: 'College exam preparation in the evenings.',
            managerName: 'Deepa Nair', managerAvatar: 'profile-1.jpg',
            status: 'Pending'
        },
        {
            reqId: 'SCR-1039', createdAt: '02 Oct 2026, 11:22 AM',
            empName: 'Mohammed Farhan', empCode: 'EMP32', avatar: 'profile-4.jpg',
            dayName: 'Thursday', dateStr: '08 Oct 2026', scopeText: 'This day only',
            fromShift: 'Morning Shift', toShift: 'General Shift',
            reason: 'Doctor appointment in the morning.',
            managerName: 'Shailni Raj', managerAvatar: 'profile-3.jpg',
            status: 'Approved', actedAt: '02 Oct 2026, 02:10 PM'
        },
        {
            reqId: 'SCR-1038', createdAt: '01 Oct 2026, 04:48 PM',
            empName: 'Deepa Nair', empCode: 'EMP31', avatar: 'profile-1.jpg',
            dayName: 'Friday', dateStr: '09 Oct 2026', scopeText: 'This day only',
            fromShift: 'General Shift', toShift: 'Morning Shift',
            reason: 'Family function in the evening.',
            managerName: 'Shailni Raj', managerAvatar: 'profile-3.jpg',
            status: 'Approved', actedAt: '01 Oct 2026, 05:15 PM'
        },
        {
            reqId: 'SCR-1037', createdAt: '30 Sep 2026, 10:30 AM',
            empName: 'venkatesanB', empCode: 'EMP36', avatar: 'profile-4.jpg',
            dayName: 'Wednesday', dateStr: '07 Oct 2026', scopeText: 'This day only',
            fromShift: 'General Shift', toShift: 'Night Shift',
            reason: 'Personal work during the day.',
            managerName: 'Shailni Raj', managerAvatar: 'profile-3.jpg',
            status: 'Rejected', actedAt: '30 Sep 2026, 12:05 PM',
            rejectReason: 'No coverage available for the night shift that day.'
        },
        {
            reqId: 'SCR-1036', createdAt: '29 Sep 2026, 03:15 PM',
            empName: 'Bhuvaneswari', empCode: 'EMP35', avatar: 'profile-1.jpg',
            dayName: 'Tuesday', dateStr: '06 Oct 2026', scopeText: 'This day only',
            fromShift: 'Morning Shift', toShift: 'Evening Shift',
            reason: 'Requested change, later withdrawn.',
            managerName: 'Deepa Nair', managerAvatar: 'profile-3.jpg',
            status: 'Withdrawn', actedAt: '29 Sep 2026, 06:40 PM'
        }
    ];

    /* Manager assignment demo roster, following shift-shedule.php's shift master. */
    var managerShifts = [
        { id: 'general', name: 'General Shift', code: 'GEN', start: '09:30', end: '18:30' },
        { id: 'morning', name: 'Morning Shift', code: 'MOR', start: '06:00', end: '14:00' },
        { id: 'evening', name: 'Evening Shift', code: 'EVE', start: '14:00', end: '22:00' },
        { id: 'night', name: 'Night Shift', code: 'NGT', start: '22:00', end: '06:00' }
    ];
    var managerRoster = [
        { code: 'EMP41', name: 'Vijai', avatar: 'profile-1.jpg', shiftId: 'general' },
        { code: 'EMP34', name: 'Karthik Raja', avatar: 'profile-2.jpg', shiftId: 'general' },
        { code: 'EMP33', name: 'Priya Sharma', avatar: 'profile-3.jpg', shiftId: 'general' },
        { code: 'EMP32', name: 'Mohammed Farhan', avatar: 'profile-4.jpg', shiftId: 'morning' },
        { code: 'EMP31', name: 'Deepa Nair', avatar: 'profile-1.jpg', shiftId: 'general' },
        { code: 'EMP36', name: 'venkatesanB', avatar: 'profile-4.jpg', shiftId: 'general' },
        { code: 'EMP35', name: 'Bhuvaneswari', avatar: 'profile-1.jpg', shiftId: 'morning' }
    ];

    var statusIcons = {
        Pending: 'bi-hourglass-split',
        Approved: 'bi-check-circle-fill',
        Rejected: 'bi-x-circle-fill',
        Withdrawn: 'bi-slash-circle'
    };

    var viewRole = 'manager';
    var body = $id('scrRequestsBody');
    var requestsTable = null;
    var currentStatusFilter = 'Pending';

    /* ---------------- toast ---------------- */

    function toast(message, icon) {
        var wrap = $id('scrToastWrap');
        if (!wrap) return;
        var el = document.createElement('div');
        el.className = 'scr-toast';
        el.innerHTML = '<i class="bi ' + (icon || 'bi-check-circle-fill') + '"></i><span>' + message + '</span>';
        wrap.appendChild(el);
        setTimeout(function () {
            el.classList.add('out');
            setTimeout(function () { el.remove(); }, 260);
        }, 3200);
    }

    function getManagerShift(id) {
        for (var i = 0; i < managerShifts.length; i++) {
            if (managerShifts[i].id === id) return managerShifts[i];
        }
        return null;
    }

    function getManagerEmployee(code) {
        for (var i = 0; i < managerRoster.length; i++) {
            if (managerRoster[i].code === code) return managerRoster[i];
        }
        return null;
    }

    function formatShiftTime(shift) {
        return shift ? shift.start + ' – ' + shift.end : 'No shift assigned';
    }

    function updateManagerShiftPreview() {
        var employeeSelect = $id('scrManagerEmployee');
        var shiftSelect = $id('scrManagerNewShift');
        var employee = employeeSelect ? getManagerEmployee(employeeSelect.value) : null;
        var current = employee ? getManagerShift(employee.shiftId) : null;
        var next = shiftSelect ? getManagerShift(shiftSelect.value) : null;

        $id('scrManagerCurrentShift').textContent = current ? current.name : (employee ? 'No shift assigned' : 'Select employee');
        $id('scrManagerCurrentTime').textContent = employee ? formatShiftTime(current) + ' · ' + employee.code : 'Current assignment';
        $id('scrManagerNewShiftPreview').textContent = next ? next.name : 'Select shift';
        $id('scrManagerNewTimePreview').textContent = next ? formatShiftTime(next) + ' · ' + next.code : 'Choose a shift below';
    }

    function initManagerShiftChange() {
        var employeeSelect = $id('scrManagerEmployee');
        var shiftSelect = $id('scrManagerNewShift');
        var modalEl = $id('scrManagerShiftChangeModal');
        var saveBtn = $id('scrManagerShiftSave');
        var effectiveFrom = $id('scrManagerEffectiveFrom');
        var effectiveTo = $id('scrManagerEffectiveTo');
        var effectiveToWrap = $id('scrManagerEffectiveToWrap');
        var errorEl = $id('scrManagerShiftError');
        if (!employeeSelect || !shiftSelect || !modalEl || !saveBtn) return;

        employeeSelect.innerHTML = '<option value="">Select employee</option>' + managerRoster.map(function (employee) {
            return '<option value="' + esc(employee.code) + '">' + esc(employee.name) + ' (' + esc(employee.code) + ')</option>';
        }).join('');
        shiftSelect.innerHTML = '<option value="">Select a different shift</option>' + managerShifts.map(function (shift) {
            return '<option value="' + esc(shift.id) + '">' + esc(shift.name) + ' · ' + esc(shift.start) + '–' + esc(shift.end) + '</option>';
        }).join('');

        var today = new Date();
        var todayValue = today.getFullYear() + '-' + String(today.getMonth() + 1).padStart(2, '0') + '-' + String(today.getDate()).padStart(2, '0');
        effectiveFrom.value = todayValue;
        effectiveTo.value = todayValue;
        effectiveFrom.min = todayValue;
        effectiveTo.min = todayValue;

        employeeSelect.value = managerRoster[0].code;
        shiftSelect.value = 'morning';
        updateManagerShiftPreview();

        var managerNativeChangeBound = false;
        function initializeManagerSelect2() {
            if (!window.jQuery || !jQuery.fn.select2) {
                if (!managerNativeChangeBound) {
                    employeeSelect.addEventListener('change', updateManagerShiftPreview);
                    shiftSelect.addEventListener('change', updateManagerShiftPreview);
                    managerNativeChangeBound = true;
                }
                return;
            }

            var $employeeSelect = jQuery(employeeSelect);
            var $shiftSelect = jQuery(shiftSelect);
            if (!$employeeSelect.data('select2')) {
                $employeeSelect.select2({
                    width: '100%',
                    dropdownParent: jQuery(modalEl),
                    placeholder: 'Select employee',
                    allowClear: true
                });
            }
            if (!$shiftSelect.data('select2')) {
                $shiftSelect.select2({
                    width: '100%',
                    dropdownParent: jQuery(modalEl),
                    placeholder: 'Select a different shift',
                    allowClear: true
                });
            }
            $employeeSelect.off('change.scrManagerShift').on('change.scrManagerShift', updateManagerShiftPreview);
            $shiftSelect.off('change.scrManagerShift').on('change.scrManagerShift', updateManagerShiftPreview);
        }

        /* Register after footer.php's global `.select2` initializer so its
           generated container cannot be mistaken for a source control. */
        if (window.jQuery) {
            jQuery(function () { initializeManagerSelect2(); });
        } else {
            window.addEventListener('load', initializeManagerSelect2, { once: true });
        }

        document.querySelectorAll('input[name="scrManagerDuration"]').forEach(function (radio) {
            radio.addEventListener('change', function () {
                var dateRange = radio.value === 'range' && radio.checked;
                effectiveToWrap.hidden = !dateRange;
                effectiveTo.required = dateRange;
                if (dateRange && !effectiveTo.value) effectiveTo.value = effectiveFrom.value || todayValue;
            });
        });

        modalEl.addEventListener('show.bs.modal', function () {
            errorEl.classList.remove('show');
            errorEl.textContent = '';
            updateManagerShiftPreview();
        });

        saveBtn.addEventListener('click', function () {
            var employee = getManagerEmployee(employeeSelect.value);
            var nextShift = getManagerShift(shiftSelect.value);
            var currentShift = employee ? getManagerShift(employee.shiftId) : null;
            var durationEl = document.querySelector('input[name="scrManagerDuration"]:checked');
            var isRange = durationEl && durationEl.value === 'range';
            var message = '';

            if (!employee) message = 'Select an employee to continue.';
            else if (!nextShift) message = 'Select the new shift to assign.';
            else if (currentShift && nextShift.id === currentShift.id) message = 'Choose a shift different from the current assignment.';
            else if (!effectiveFrom.value) message = 'Select an effective-from date.';
            else if (isRange && !effectiveTo.value) message = 'Select an effective-to date for the date range.';
            else if (isRange && effectiveTo.value < effectiveFrom.value) message = 'Effective-to date must be on or after the effective-from date.';

            if (message) {
                errorEl.textContent = message;
                errorEl.classList.add('show');
                return;
            }

            errorEl.textContent = '';
            errorEl.classList.remove('show');
            var previousName = currentShift ? currentShift.name : 'No shift';
            employee.shiftId = nextShift.id;
            employee.effectiveFrom = effectiveFrom.value;
            employee.effectiveTo = isRange ? effectiveTo.value : '';
            employee.remarks = $id('scrManagerShiftRemarks').value.trim();

            var durationText = isRange ? ('from ' + employee.effectiveFrom + ' to ' + employee.effectiveTo) : ('permanently from ' + employee.effectiveFrom);
            bootstrap.Modal.getOrCreateInstance(modalEl).hide();
            updateManagerShiftPreview();
            toast('<b>' + esc(employee.name) + '</b>: ' + esc(previousName) + ' → <b>' + esc(nextShift.name) + '</b>, ' + esc(durationText) + '.', 'bi-arrow-repeat');
        });
    }

    /* ---------------- shared table ---------------- */

    function render() {
        var pending = requests.filter(function (r) { return r.status === 'Pending'; }).length;
        var approved = requests.filter(function (r) { return r.status === 'Approved'; }).length;
        var rejected = requests.filter(function (r) { return r.status === 'Rejected'; }).length;
        var withdrawn = requests.filter(function (r) { return r.status === 'Withdrawn'; }).length;

        var selectedCount = requests.filter(function (r) { return r.status === currentStatusFilter; }).length;
        var pc = $id('scrPendingCount'); if (pc) pc.textContent = String(selectedCount);
        var tabPending = $id('scrTabPendingCount'); if (tabPending) tabPending.textContent = String(pending);
        var tabApproved = $id('scrTabApprovedCount'); if (tabApproved) tabApproved.textContent = String(approved);
        var tabRejected = $id('scrTabRejectedCount'); if (tabRejected) tabRejected.textContent = String(rejected);
        var tabWithdrawn = $id('scrTabWithdrawnCount'); if (tabWithdrawn) tabWithdrawn.textContent = String(withdrawn);

        var statusLabel = $id('scrCurrentStatusLabel');
        if (statusLabel) statusLabel.textContent = currentStatusFilter.toLowerCase();

        var filtered = requests.filter(function (r) { return r.status === currentStatusFilter; });
        if (!body) return;

        if (!filtered.length) {
            body.innerHTML = '<tr class="no-record-row"><td colspan="9" class="text-center text-muted py-4">No ' + esc(currentStatusFilter.toLowerCase()) + ' requests</td></tr>';
        } else {
            body.innerHTML = filtered.map(function (r, index) {
                var actionHtml = '';
                if (r.status === 'Pending' && viewRole === 'manager') {
                    actionHtml = '<div class="scr-row-actions"><button type="button" class="scr-approve-btn" data-req="' + esc(r.reqId) + '"><i class="bi bi-check2 me-1"></i>Approve</button><button type="button" class="scr-reject-btn" data-req="' + esc(r.reqId) + '"><i class="bi bi-x-lg me-1"></i>Reject</button></div>';
                } else {
                    actionHtml = '<span class="scr-action-done"><i class="bi bi-check2-circle me-1"></i>Reviewed</span>';
                }

                return '<tr data-id="' + esc(r.reqId) + '">' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td><div class="scr-table-primary"><i class="bi bi-calendar3 me-2 scr-ic-primary"></i>' + esc(r.createdAt) + '</div></td>' +
                    '<td><div class="scr-employee-cell"><img src="./assets/img/' + esc(r.avatar) + '" alt=""><div><div class="scr-table-primary">' + esc(r.empName) + '</div><div class="scr-table-meta">' + esc(r.empCode) + '</div></div></div></td>' +
                    '<td><div class="scr-table-primary">' + esc(r.dayName) + '</div><div class="scr-table-meta">' + esc(r.dateStr) + ' · ' + esc(r.scopeText) + '</div></td>' +
                    '<td><div class="scr-shift-compare-cell"><span class="scr-old">' + esc(r.fromShift) + '</span><i class="bi bi-arrow-right"></i><span class="scr-new">' + esc(r.toShift) + '</span></div></td>' +
                    '<td><div class="scr-reason-text">' + esc(r.reason) + '</div>' + (r.swapWith ? '<div class="scr-table-meta">' + esc(r.swapWith) + '</div>' : '') + '</td>' +
                    '<td><div class="scr-approver-cell"><img src="./assets/img/' + esc(r.managerAvatar) + '" alt=""><span>' + esc(r.managerName) + '</span></div></td>' +
                    '<td><span class="scr-status-pill ' + esc(r.status.toLowerCase()) + '"><i class="bi ' + (statusIcons[r.status] || 'bi-circle') + '"></i>' + esc(r.status) + '</span>' +
                        (r.actedAt ? '<div class="scr-table-meta">' + esc(r.actedAt) + '</div>' : '') +
                        (r.status === 'Rejected' ? ' <button type="button" class="scr-rejection-eye-btn scr-view-rejection" data-req="' + esc(r.reqId) + '" aria-label="View rejection reason for ' + esc(r.empName) + '" title="View rejection reason"><i class="bi bi-eye"></i></button>' : '') +
                    '</td>' +
                    '<td>' + actionHtml + '</td>' +
                '</tr>';
            }).join('');
        }

        var tableEl = document.getElementById('scrRequestsTable');
        if (tableEl) {
            if (tableEl.autoTable) {
                tableEl.autoTable.refresh();
            } else if (window.AutoMasterTable) {
                window.AutoMasterTable.init(tableEl);
            }
        }
    }

    function initRequestsTable() {
        if (!body) return;

        initManagerShiftChange();

        var statusTabs = $id('scrStatusTabs');
        if (statusTabs) {
            statusTabs.addEventListener('click', function (event) {
                var tab = event.target.closest('.scr-status-tab');
                if (!tab) return;
                currentStatusFilter = tab.getAttribute('data-status');
                statusTabs.querySelectorAll('.scr-status-tab').forEach(function (item) {
                    var isActive = item === tab;
                    item.classList.toggle('active', isActive);
                    item.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                });
                render();
            });
        }

        body.addEventListener('click', function (event) {
            var approveBtn = event.target.closest('.scr-approve-btn');
            var rejectBtn = event.target.closest('.scr-reject-btn');
            var viewRejectionBtn = event.target.closest('.scr-view-rejection');
            if (approveBtn) approveRequest(approveBtn.getAttribute('data-req'));
            if (rejectBtn) openRejectModal(rejectBtn.getAttribute('data-req'));
            if (viewRejectionBtn) openViewRejectionModal(viewRejectionBtn.getAttribute('data-req'));
        });

        render();
    }

    function findReq(id) {
        for (var i = 0; i < requests.length; i++) {
            if (requests[i].reqId === id) return requests[i];
        }
        return null;
    }

    /* ---------------- approve ---------------- */

    function approveRequest(reqId) {
        var req = findReq(reqId);
        if (!req || req.status !== 'Pending') return;

        req.status = 'Approved';
        req.actedAt = nowStamp();

        render();
        toast('<b>' + esc(req.empName) + '</b> approved. Schedule updated.', 'bi-check-circle-fill');
    }

    /* ---------------- view rejection ---------------- */

    var scrViewRejectionModalEl = $id('scrViewRejectionModal');
    var scrViewRejectionModal = null;

    function openViewRejectionModal(reqId) {
        var req = findReq(reqId);
        if (!req || req.status !== 'Rejected') return;

        $id('scrViewRejEmpAvatar').src = './assets/img/' + req.avatar;
        $id('scrViewRejEmpName').textContent = req.empName;
        $id('scrViewRejMeta').textContent = req.empCode;
        $id('scrViewRejDate').textContent = req.dayName + ' • ' + req.dateStr;

        $id('scrViewRejFromShift').textContent = req.fromShift || 'Not assigned';
        $id('scrViewRejToShift').textContent = req.toShift || '-';
        $id('scrViewRejReasonText').textContent = req.rejectReason ? req.rejectReason : 'No reason provided by the manager.';

        $id('scrViewRejMgrAvatar').src = './assets/img/' + req.managerAvatar;
        $id('scrViewRejMgrName').textContent = req.managerName;
        $id('scrViewRejMgrWhen').textContent = req.actedAt ? ('Rejected on ' + req.actedAt) : 'Rejected';

        if (scrViewRejectionModalEl && window.bootstrap) {
            if (!scrViewRejectionModal) {
                scrViewRejectionModal = bootstrap.Modal.getOrCreateInstance(scrViewRejectionModalEl);
            }
            scrViewRejectionModal.show();
        }
    }

    /* ---------------- reject ---------------- */

    var rejectContext = null;
    var scrRejectModalEl = $id('scrRejectModal');
    var scrRejectModal = null;

    function openRejectModal(reqId) {
        var req = findReq(reqId);
        if (!req || req.status !== 'Pending') return;

        rejectContext = req;
        $id('scrRejectEmpLine').innerHTML =
            '<i class="bi bi-person me-1"></i>' + esc(req.empName) + ' (' + esc(req.empCode) + ')' +
            ' — ' + esc(req.dayName) + ' ' + esc(req.dateStr) +
            ' → requesting <b>' + esc(req.toShift || '-') + '</b>';

        var reasonEl = $id('scr_reject_reason');
        reasonEl.value = '';
        $id('scrRejectRemarkCount').textContent = '0';

        if (scrRejectModalEl && window.bootstrap) {
            if (!scrRejectModal) {
                scrRejectModal = bootstrap.Modal.getOrCreateInstance(scrRejectModalEl);
            }
            scrRejectModal.show();
        }
    }

    var scrRejectReasonEl = $id('scr_reject_reason');
    if (scrRejectReasonEl) {
        scrRejectReasonEl.addEventListener('input', function () {
            $id('scrRejectRemarkCount').textContent = String(scrRejectReasonEl.value.length);
        });
    }

    var scrRejectConfirmBtn = $id('scrRejectConfirmBtn');
    if (scrRejectConfirmBtn) {
        scrRejectConfirmBtn.addEventListener('click', function () {
            if (!rejectContext) return;
            var req = rejectContext;

            req.status = 'Rejected';
            req.actedAt = nowStamp();
            req.rejectReason = $id('scr_reject_reason').value.trim();

            if (scrRejectModal) scrRejectModal.hide();
            rejectContext = null;

            render();
            toast('<b>' + esc(req.reqId) + '</b> has been rejected.', 'bi-x-circle-fill');
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initRequestsTable);
    } else {
        initRequestsTable();
    }
})();
