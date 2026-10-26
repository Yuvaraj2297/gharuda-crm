/**
 * Gharuda CRM - View Leave Page Script
 * File: assets/js/pages/view-leave.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
/* Demo employee list — same source as Add Manual Attendance modal.
   Each entry is [name, employee id, department]. It feeds the Reporting
   Manager select and the Assign Employee select further down the page. */
window.leavePageEmployees = [
    ['Amelia Curr', 'EMP0001', 'Design'],
    ['Daniel Martinez', 'EMP0002', 'Design'],
    ['David Anderson', 'EMP0003', 'iOS Dev'],
    ['Emily Clark', 'EMP0004', 'Business'],
    ['Sophia Johnson', 'EMP0005', 'Marketing']
];

/* ==========================================================================
   Script Block 2
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
        const scrollContainer = document.getElementById('balanceScroll');
        // const scrollLeftBtn = document.getElementById('balanceScrollLeft');
        // const scrollRightBtn = document.getElementById('balanceScrollRight');
        const scrollAmount = 220;

        // scrollLeftBtn.addEventListener('click', function() {
        //     scrollContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        // });

        // scrollRightBtn.addEventListener('click', function() {
        //     scrollContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        // });

        const tabBtns = document.querySelectorAll('.tab-switch .tab-btn');
        tabBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                tabBtns.forEach(function(b) { b.classList.remove('active'); });
                btn.classList.add('active');
            });
        });

        const holidayItems = [
            { date: '02 Apr, Fri', name: 'Good Friday' },
            { date: '01 May, Sat', name: 'May Day' },
            { date: '25 Dec, Sat', name: 'Christmas' }
        ];

        const leaveItems = [
            {
                from: '01 Feb, Mon',
                to: '02 Feb, Tue',
                type: 'Casual Leave',
                typeClass: 'type-casual',
                days: '2',
                status: 'Pending',
                statusClass: 'status-pending',
                statusIcon: 'bi-hourglass-split'
            },
            {
                from: '10 Aug, Wed',
                to: '12 Aug, Fri',
                type: 'Annual Leave',
                typeClass: 'type-annual',
                days: '3',
                status: 'Partial',
                approvedDays: '2',
                employee: 'Daniel Martinez',
                statusIcon: 'bi-check2-circle'
            },
            {
                from: '05 Sep, Mon',
                to: '06 Sep, Tue',
                type: 'Sick Leave',
                typeClass: 'type-sick',
                days: '2',
                status: 'Rejected',
                rejectionReason: 'Insufficient leave balance for remaining days',
                employee: 'Sophia Johnson',
                statusIcon: 'bi-x-circle-fill'
            }
        ];

        const historyLeaveItems = [
            {
                from: '15 Dec, Tue',
                to: '17 Dec, Thu',
                type: 'Annual Leave',
                typeClass: 'type-annual',
                days: '3',
                status: 'Approved',
                statusClass: 'status-approved',
                statusIcon: 'bi-check-circle-fill'
            },
            {
                from: '10 Nov, Wed',
                to: '11 Nov, Thu',
                type: 'Sick Leave',
                typeClass: 'type-sick',
                days: '2',
                status: 'Approved',
                statusClass: 'status-approved',
                statusIcon: 'bi-check-circle-fill'
            }
        ];

        let assignmentItems = [];

        function typeClassFor(t) {
            const s = (t || '').toLowerCase();
            if (s.indexOf('sick') > -1) return 'type-sick';
            if (s.indexOf('annual') > -1) return 'type-annual';
            if (s === 'pto') return 'type-pto';
            return 'type-casual';
        }

        function buildAssignmentRow(a) {
            return `
                <div class="leave-holiday-item leave-item">
                    <div class="date-col text-nowrap">
                        <span class="date-main">${a.year}</span>
                        <span class="date-to">Leave cycle</span>
                    </div>
                    <div class="details-col">
                        <div class="leave-type-indicator ${a.typeClass}"></div>
                        <div class="leave-info">
                            <div class="item-kind leave-kind"><i class="bi bi-person-plus"></i> Leave assignment</div>
                            <div class="leave-name">${a.type}</div>
                            <div class="leave-days">${a.days} Day(s) &middot; ${a.employee}</div>
                        </div>
                    </div>
                    <div class="status-col">
                        <span class="leave-status-pill status-approved">
                            <i class="bi bi-person-check-fill"></i>
                            Assigned
                        </span>
                    </div>
                </div>
            `;
        }

        let selectedCategory = 'all';
        function applyCategoryFilter(category) {
            selectedCategory = category;
            const activeTab = document.querySelector('.tab-switch .tab-btn.active');
            renderList(activeTab && activeTab.getAttribute('data-tab') === 'history', selectedCategory);
        }
        const categoryFilter = document.getElementById('leaveCategoryFilter');
        categoryFilter.addEventListener('change', function(event) {
            applyCategoryFilter(event.target.value);
        });
        if (window.jQuery) {
            jQuery(categoryFilter).on('select2:select', function(event) {
                applyCategoryFilter(event.params.data.id);
            });
        }

        function renderList(isHistory, category) {
            const listEl = document.getElementById('leaveHolidaysList');
            let html = '';

            if (!isHistory && category !== 'holidays') {
                assignmentItems.forEach(function(a) { html += buildAssignmentRow(a); });
            }

            const items = (category === 'holidays' && !isHistory) ? [] : (isHistory ? historyLeaveItems : leaveItems);

            items.forEach(function(item) {
                let statusHtml = '';
                if (item.status === 'Partial') {
                    statusHtml = '<span class="leave-status-pill status-approved"><i class="bi bi-check2-circle"></i> Partial (' + item.approvedDays + '/' + item.days + 'd)</span>';
                } else if (item.status === 'Rejected') {
                    statusHtml = '<span class="leave-status-pill status-rejected"><i class="bi bi-x-circle-fill"></i> Rejected';
                    if (item.rejectionReason) {
                        statusHtml += ' <i class="bi bi-eye" title="Rejection reason" data-employee="' + (item.employee || '') + '" data-reason="' + (item.rejectionReason || '') + '"></i></span>';
                    } else {
                        statusHtml += '</span>';
                    }
                } else {
                    statusHtml = '<span class="leave-status-pill ' + item.statusClass + '"><i class="bi ' + item.statusIcon + '"></i>' + item.status + '</span>';
                    if (item.status === 'Pending') {
                        statusHtml = '<div class="leave-status-wrap"><button type="button" class="leave-cancel-btn" data-cancel-leave title="Cancel this leave request"><i class="bi bi-x-circle"></i> Cancel</button>' + statusHtml + '</div>';
                    }
                }

                html += `
                    <div class="leave-holiday-item leave-item cursor-pointer">
                        <div class="date-col text-nowrap">
                            <span class="date-main">${item.from}</span>
                            <span class="date-to">to</span>
                            <span class="date-sub">${item.to}</span>
                        </div>
                        <div class="details-col">
                            <div class="leave-type-indicator ${item.typeClass}"></div>
                            <div class="leave-info">
                                <div class="item-kind leave-kind"><i class="bi bi-person-walking"></i> Leave request</div>
                                <div class="leave-name">${item.type}</div>
                                <div class="leave-days">${item.days} Day(s)</div>
                            </div>
                        </div>
                        <div class="status-col">
                            ${statusHtml}
                        </div>
                    </div>
                `;
            });

            if (!isHistory && category !== 'leaves') {
                holidayItems.forEach(function(h) {
                    html += `
                        <div class="leave-holiday-item">
                            <div class="date-col holiday-date">
                                <div class="holiday-icon">
                                    <i class="bi bi-calendar-heart"></i>
                                </div>
                                <div class="holiday-text">
                                    <span class="date-main">${h.date}</span>
                                </div>
                            </div>
                            <div class="details-col">
                                <div><div class="item-kind holiday-kind"><i class="bi bi-calendar-heart"></i> Public holiday</div><div class="holiday-name">${h.name}</div></div>
                            </div>
                            <div class="status-col">
                                <div class="holiday-acts">
                                    <button type="button" class="holiday-act-btn hol-edit" data-hol-edit="${h.name}" data-hol-date="${h.date}" title="Edit holiday" aria-label="Edit holiday"><i class="bi bi-pencil-fill"></i></button>
                                    <button type="button" class="holiday-act-btn hol-del" data-hol-del="${h.name}" title="Delete holiday" aria-label="Delete holiday"><i class="bi bi-trash3-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    `;
                });
            }

            listEl.innerHTML = html;
        }

        // Rejection reason eye icon click -> open reason modal
        document.getElementById('leaveHolidaysList').addEventListener('click', function(e) {
            var eye = e.target.closest('[data-reason]');
            if (!eye) return;
            var reasonModal = document.getElementById('leaveRejectReasonModal');
            var reasonText = document.getElementById('leaveRejectReasonText');
            var empText = document.getElementById('leaveRejectReasonEmployee');
            empText.textContent = eye.dataset.employee || '-';
            reasonText.textContent = eye.dataset.reason || 'No rejection reason provided';
            var bsModal = bootstrap.Modal.getInstance(reasonModal) || new bootstrap.Modal(reasonModal);
            bsModal.show();
        });

        /* ===== Partial leave row click -> decision modal (read-only) ===== */
        document.getElementById('leaveHolidaysList').addEventListener('click', function(e) {
            /* ignore clicks on buttons / pills (cancel, reason eye etc.) */
            if (e.target.closest('button') || e.target.closest('.leave-status-pill')) return;

            var row = e.target.closest('.leave-holiday-item.leave-item');
            if (!row) return;

            var pill = row.querySelector('.leave-status-pill');
            if (!pill || !/Partial/i.test(pill.textContent)) return;

            /* read row info */
            var from = (row.querySelector('.date-main') || {}).textContent || '-',
                to = (row.querySelector('.date-sub') || {}).textContent || '-',
                type = (row.querySelector('.leave-name') || {}).textContent || '-',
                days = (row.querySelector('.leave-days') || {}).textContent || '-',
                pillText = pill.textContent.replace(/\s+/g, ' ').trim();

            /* parse approved days from "Partial (2/3d)" */
            var m = pillText.match(/\((\d+)\/(\d+)d\)/),
                approved = m ? parseInt(m[1], 10) : 0,
                applied = m ? parseInt(m[2], 10) : (parseInt(days, 10) || 0),
                rejected = Math.max(0, applied - approved);

            /* fill modal */
            document.getElementById('partialEmpName').textContent = 'Daniel Martinez';
            document.getElementById('partialLeaveType').textContent = type.trim();
            document.getElementById('partialDates').textContent = from.trim() + ' to ' + to.trim();
            document.getElementById('partialAppliedDays').textContent = applied + ' Day(s)';
            document.getElementById('partialApprovedDays').textContent = approved + ' Day(s)';
            document.getElementById('partialRejectedDays').textContent = rejected + ' Day(s)';

            /* compute exact dates from row labels (trust row's day names, increment sequence) */
            var MN = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var WD = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            function parseRowDate(s) {
                var mm = s.trim().match(/(\d{1,2})\s+([A-Za-z]{3}),?\s*([A-Za-z]{3})?/);
                return mm ? { d: parseInt(mm[1], 10), m: MN.indexOf(mm[2]), w: mm[3] || null } : null;
            }
            var startRow = parseRowDate(from),
                endRow = parseRowDate(to),
                appliedDates = [];
            if (startRow && endRow) {
                /* build date list from `from` to `to` inclusive */
                var cur = { d: startRow.d, m: startRow.m, w: startRow.w },
                    guard = 0;
                while (guard++ < 60) {
                    appliedDates.push(cur.d + ' ' + MN[cur.m] + ', ' + (cur.w || ''));
                    if (cur.d === endRow.d && cur.m === endRow.m) break;
                    cur = { d: cur.d + 1, m: cur.m, w: cur.w };
                    var dim = new Date(new Date().getFullYear(), cur.m + 1, 0).getDate();
                    if (cur.d > dim) { cur.d = 1; cur.m = (cur.m + 1) % 12; }
                    if (cur.w) cur.w = WD[(WD.indexOf(cur.w) + 1) % 7];
                }
            }
            var approvedList = appliedDates.slice(0, approved),
                rejectedList = appliedDates.slice(approved);
            document.getElementById('partialApprovedSub').textContent = approvedList.join(', ') || '-';
            document.getElementById('partialRejectedSub').textContent = rejectedList.join(', ') || '-';

            var reason = row.getAttribute('data-reason') || '';
            var reasonBox = document.getElementById('partialReasonBox');
            var reasonText = document.getElementById('partialRejectReason');
            if (rejected > 0) {
                reasonBox.style.display = '';
                reasonText.textContent = reason || 'Approved days only — remaining day rejected due to insufficient team coverage on that date. Please re-apply with a different date if required.';
            } else {
                reasonBox.style.display = 'none';
            }

            var modal = document.getElementById('leavePartialModal');
            var bsModal = bootstrap.Modal.getInstance(modal) || new bootstrap.Modal(modal);
            bsModal.show();
        });

        function renderSelectedItem(item, isHoliday) {
            const listEl = document.getElementById('leaveHolidaysList');
            if (isHoliday) {
                listEl.innerHTML = `
                    <div class="leave-holiday-item selected-overview-item">
                        <div class="date-col holiday-date"><div class="holiday-icon"><i class="bi bi-calendar-heart"></i></div><div class="holiday-text"><span class="date-main">${item.date}</span></div></div>
                        <div class="details-col"><div><div class="item-kind holiday-kind"><i class="bi bi-calendar-heart"></i> Public holiday</div><div class="holiday-name">${item.name}</div></div></div>
                        <div class="status-col"><span class="leave-status-pill status-approved"><i class="bi bi-check-circle-fill"></i> Scheduled</span></div>
                    </div>`;
                return;
            }
            listEl.innerHTML = `
                <div class="leave-holiday-item leave-item selected-overview-item">
                    <div class="date-col text-nowrap"><span class="date-main">${item.from}</span><span class="date-to">to</span><span class="date-sub">${item.to}</span></div>
                    <div class="details-col"><div class="leave-type-indicator ${item.typeClass}"></div><div class="leave-info"><div class="item-kind leave-kind"><i class="bi bi-person-walking"></i> Leave request</div><div class="leave-name">${item.type}</div><div class="leave-days">${item.days} Day(s)</div></div></div>
                    <div class="status-col"><span class="leave-status-pill ${item.statusClass}"><i class="bi ${item.statusIcon}"></i> ${item.status}</span></div>
                </div>`;
        }

        document.querySelectorAll('.tab-switch .tab-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const tab = btn.getAttribute('data-tab');
                    renderList(tab === 'history', selectedCategory);
            });
        });

        /* Initial load: render upcoming tab content by default */
        renderList(false, selectedCategory);

        // Leave balance card click -> open Apply Leave modal with matching leave type preselected
        document.querySelectorAll('.leave-balance-card').forEach(function(card) {
            card.addEventListener('click', function() {
                const leaveType = card.getAttribute('data-leave-type');
                const leaveTypeSelect = document.getElementById('leaveApplyType');

                if (leaveTypeSelect && leaveType) {
                    let matched = false;
                    for (let i = 0; i < leaveTypeSelect.options.length; i++) {
                        if (leaveTypeSelect.options[i].value.toLowerCase() === leaveType.toLowerCase()) {
                            leaveTypeSelect.value = leaveTypeSelect.options[i].value;
                            matched = true;
                            break;
                        }
                    }
                    if (!matched) {
                        leaveTypeSelect.value = '';
                    }
                }

                const modalEl = document.getElementById('leaveApplyModal');
                const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
                modalInstance.show();
            });
        });

        /* ===== Assign Leave ===== */
        var assignEmployee = document.getElementById('assignEmployeeSelect');
        var assignType = document.getElementById('assignLeaveTypeSelect');
        var assignDaysInput = document.getElementById('assignDaysInput');
        var assignYear = document.getElementById('assignLeaveYear');
        var asbEmployee = document.getElementById('asbEmployee');
        var asbYear = document.getElementById('asbYear');
        var asbCurrent = document.getElementById('asbCurrent');
        var asbAdding = document.getElementById('asbAdding');
        var asbTotal = document.getElementById('asbTotal');

        function getAssignDays() {
            var d = parseInt(assignDaysInput.value, 10);
            return isNaN(d) || d < 1 ? 0 : d;
        }

        function lookupBalance(type) {
            var val = 0;
            document.querySelectorAll('.leave-balance-card').forEach(function(card) {
                if ((card.getAttribute('data-leave-type') || '').toLowerCase() === (type || '').toLowerCase()) {
                    val = parseInt(card.getAttribute('data-available'), 10) || 0;
                }
            });
            return val;
        }

        function updateAssignSummary() {
            var days = getAssignDays();
            var empIdx = assignEmployee.selectedIndex;
            var type = assignType.value;
            var current = lookupBalance(type);

            if (assignYear.value) asbYear.textContent = assignYear.value;

            if (empIdx > 0) {
                var opt = assignEmployee.options[empIdx];
                var img = opt.getAttribute('data-image') || './assets/img/profile-1.jpg';
                var empParts = (opt.text || '').trim().split(' — ');
                asbEmployee.innerHTML = '<img src="' + img + '" class="asb-emp-avatar" alt="">' +
                    '<div class="asb-emp-copy"><strong>' + (empParts[0] || opt.text) + '</strong><span>' + (empParts[1] || opt.value) + '</span></div>';
            } else {
                asbEmployee.innerHTML = '<span class="asb-emp-placeholder">Select an employee to preview the assignment</span>';
            }

            asbCurrent.textContent = current + ' Day(s)';
            asbAdding.textContent = '+ ' + days + ' Day(s)';
            asbTotal.textContent = (current + days) + ' Day(s)';
        }

        [assignEmployee, assignType, assignYear].forEach(function(el) {
            el && el.addEventListener('change', updateAssignSummary);
        });
        if (window.jQuery) {
            jQuery(assignType).on('select2:select', updateAssignSummary);
            jQuery(assignYear).on('select2:select', updateAssignSummary);
            jQuery(assignEmployee).on('select2:select', updateAssignSummary);
        }

        document.getElementById('assignDayMinus').addEventListener('click', function() {
            assignDaysInput.value = Math.max(getAssignDays() - 1, 1);
            updateAssignSummary();
        });

        document.getElementById('assignDayPlus').addEventListener('click', function() {
            assignDaysInput.value = getAssignDays() + 1;
            updateAssignSummary();
        });

        assignDaysInput.addEventListener('input', function() {
            assignDaysInput.value = assignDaysInput.value.replace(/[^0-9]/g, '');
            updateAssignSummary();
        });

        document.querySelectorAll('.assign-chip').forEach(function(chip) {
            chip.addEventListener('click', function() {
                assignDaysInput.value = getAssignDays() + parseInt(chip.getAttribute('data-add'), 10);
                updateAssignSummary();
            });
        });

        function refreshTabCounts() {
            var upcomingCount = document.querySelector('.tab-btn[data-tab="upcoming"] .tab-count');
            var historyCount = document.querySelector('.tab-btn[data-tab="history"] .tab-count');
            if (upcomingCount) upcomingCount.textContent = assignmentItems.length + leaveItems.length + holidayItems.length;
            if (historyCount) historyCount.textContent = historyLeaveItems.length;
        }

        document.getElementById('assignLeaveSubmit').addEventListener('click', function() {
            /* Bulk mode has its own upload handler */
            if (document.getElementById('assignBulkSection') && document.getElementById('assignBulkSection').classList.contains('show')) return;
            var days = getAssignDays();
            if (assignEmployee.selectedIndex < 1) { alert('Please select an employee.'); return; }
            if (!assignType.value) { alert('Please select a leave type.'); return; }
            if (days < 1) { alert('Days to assign must be at least 1.'); return; }

            var empOpt = assignEmployee.options[assignEmployee.selectedIndex];
            var empNameParts = (empOpt.text || '').trim().split(' — ');

            assignmentItems.unshift({
                employee: empNameParts[0] || empOpt.text,
                type: assignType.value,
                typeClass: typeClassFor(assignType.value),
                days: days,
                year: assignYear.value || '2026'
            });

            /* Bump the matching balance card */
            document.querySelectorAll('.leave-balance-card').forEach(function(card) {
                if ((card.getAttribute('data-leave-type') || '').toLowerCase() === assignType.value.toLowerCase()) {
                    var avail = (parseInt(card.getAttribute('data-available'), 10) || 0) + days;
                    card.setAttribute('data-available', avail);
                    var valEl = card.querySelector('.balance-row .value');
                    if (valEl) valEl.textContent = ': ' + avail;
                }
            });

            /* Switch to Upcoming tab so the new assignment is visible */
            var upcomingTab = document.querySelector('.tab-btn[data-tab="upcoming"]');
            if (upcomingTab && !upcomingTab.classList.contains('active')) upcomingTab.click();

            refreshTabCounts();
            var activeTab = document.querySelector('.tab-switch .tab-btn.active');
            renderList(activeTab && activeTab.getAttribute('data-tab') === 'history', selectedCategory);

            var ocEl = document.getElementById('assignLeaveOffcanvas');
            var inst = bootstrap.Offcanvas.getInstance(ocEl);
            if (inst) inst.hide();
        });

        document.getElementById('assignLeaveOffcanvas').addEventListener('hidden.bs.offcanvas', function() {
            assignDaysInput.value = '1';
            document.getElementById('assignNote').value = '';
            if (window.jQuery) {
                jQuery(assignEmployee).val(null).trigger('change');
                jQuery(assignType).val(null).trigger('change');
                jQuery(assignYear).val('2026').trigger('change');
            } else {
                assignEmployee.value = '';
                assignType.value = '';
                assignYear.value = '2026';
            }
            updateAssignSummary();
        });

        refreshTabCounts();
    });

/* ==========================================================================
   Script Block 3
   ========================================================================== */
/* Employee options for the Reporting Manager / Assign Employee selects.
       Single source is window.leavePageEmployees (defined at the top of the
       page). This runs inside <body> but before the Select2 inits further
       down, so those inits see every option. */
    (function () {
        var employees = window.leavePageEmployees || [];

        function fillEmployeeOptions(selectEl, withDept) {
            if (!selectEl) return;
            employees.forEach(function (emp) {
                var opt = document.createElement('option');
                opt.value = emp[1];
                opt.setAttribute('data-image', './assets/img/profile-1.jpg');
                if (withDept) opt.setAttribute('data-dept', emp[2]);
                opt.textContent = withDept ? (emp[0] + ' \u2014 ' + emp[1]) : emp[0];
                selectEl.appendChild(opt);
            });
        }

        fillEmployeeOptions(document.getElementById('leaveReportingManager'), false);
        fillEmployeeOptions(document.getElementById('assignEmployeeSelect'), true);
    })();

/* ==========================================================================
   Script Block 4
   ========================================================================== */
$('#employeeSelect').select2({
        width: '100%',
        placeholder: 'Select Employee',
        allowClear: true,
        dropdownParent: $('#leaveApplyModal'),

        templateResult: function (data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-option">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        },

        templateSelection: function (data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-selected">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        }
    });

    $('#leaveReportingManager').select2({
        width: '100%',
        placeholder: 'Select Reporting Manager',
        allowClear: true,
        dropdownParent: $('#leaveApplyModal'),

        templateResult: function (data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-option">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        },

        templateSelection: function (data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-selected">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        }
    });

    $('#permissionApprover').select2({
        width: '100%',
        placeholder: 'Select approver',
        allowClear: true,
        dropdownParent: $('#permissionApplyModal')
    });

    (function () {
        var modal = document.getElementById('permissionApplyModal'),
            formWrap = document.getElementById('permissionFormWrap'),
            resultWrap = document.getElementById('permissionResult'),
            resultSub = document.getElementById('permissionResultSub'),
            formFoot = document.getElementById('permissionFormFoot'),
            resultFoot = document.getElementById('permissionResultFoot'),
            submitBtn = document.getElementById('permissionApplySubmit'),
            dateInput = document.getElementById('permissionDate'),
            fromTimeInput = document.getElementById('permissionFromTime'),
            toTimeInput = document.getElementById('permissionToTime'),
            reasonInput = document.getElementById('permissionReason'),
            totalText = document.getElementById('permissionTotalText');

        var MAX_MINUTES = 120; // 2 hours

        function parseTimeToMinutes(str) {
            if (!str) return null;
            var m = str.trim().match(/^(\d{1,2}):(\d{2})$/);
            if (!m) return null;
            var h = parseInt(m[1], 10),
                min = parseInt(m[2], 10);
            if (h > 23 || min > 59) return null;
            return h * 60 + min;
        }

        function formatDuration(mins) {
            var h = Math.floor(mins / 60),
                m = mins % 60,
                parts = [];
            if (h) parts.push(h + 'h');
            if (m || !h) parts.push(m + 'm');
            return parts.join(' ');
        }

        // Returns the current duration in minutes, or null if inputs are
        // missing/invalid/out of order. Also updates the "Total" display.
        function recalcTotal() {
            var from = parseTimeToMinutes(fromTimeInput.value),
                to = parseTimeToMinutes(toTimeInput.value);

            totalText.classList.remove('is-ok', 'is-over');

            if (from === null || to === null) {
                totalText.textContent = '--';
                return null;
            }

            var diff = to - from;
            if (diff <= 0) {
                totalText.textContent = 'Invalid range';
                totalText.classList.add('is-over');
                return null;
            }

            totalText.textContent = formatDuration(diff);
            totalText.classList.add(diff > MAX_MINUTES ? 'is-over' : 'is-ok');
            return diff;
        }

        [fromTimeInput, toTimeInput].forEach(function (el) {
            el.addEventListener('input', recalcTotal);
            el.addEventListener('change', recalcTotal);
        });

        submitBtn.addEventListener('click', function () {
            var approver = jQuery('#permissionApprover').val();
            var totalMinutes = recalcTotal();

            if (!dateInput.value || !fromTimeInput.value || !toTimeInput.value || !approver || !reasonInput.value.trim()) {
                alert('Please fill date, time, approver and reason before submitting.');
                return;
            }
            if (totalMinutes === null) {
                alert('Please select a valid time range (To time should be after From time).');
                return;
            }
            if (totalMinutes > MAX_MINUTES) {
                alert('Permission time cannot be more than 2 hours. Please adjust the From/To time.');
                return;
            }

            formWrap.style.display = 'none';
            formFoot.classList.add('d-none');
            resultWrap.classList.add('show');
            resultFoot.classList.remove('d-none');
            resultSub.textContent = 'Sent to ' + approver + ' for approval (' + formatDuration(totalMinutes) + ').';
        });

        modal.addEventListener('hidden.bs.modal', function () {
            formWrap.style.display = '';
            formFoot.classList.remove('d-none');
            resultWrap.classList.remove('show');
            resultFoot.classList.add('d-none');
            dateInput.value = '';
            fromTimeInput.value = '';
            toTimeInput.value = '';
            reasonInput.value = '';
            totalText.textContent = '--';
            totalText.classList.remove('is-ok', 'is-over');
            jQuery('#permissionApprover').val(null).trigger('change');
        });
    })();

    (function () {
        var applyModal = document.getElementById('leaveApplyModal'),
            fromInput = document.getElementById('leaveApplyFromDate'),
            toInput = document.getElementById('leaveApplyToDate'),
            dayTypeSel = document.getElementById('leaveApplyDayType'),
            summaryEl = document.getElementById('leaveApplyDateSummary'),
            totalEl = document.getElementById('leaveApplyTotalDays'),
            availableEl = document.getElementById('availableBalance'),
            bookedEl = document.getElementById('currentlyBooked'),
            afterEl = document.getElementById('balanceAfterBooking'),
            estimatedEl = document.getElementById('estimatedBalance'),
            asOfEl = document.getElementById('balanceAsOfDate'),
            empSelect = document.getElementById('employeeSelect');

        var weekday = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        var employeeBalances = {
            '1': 14,
            '2': 7,
            '3': 10,
            '4': 8
        };

        var lastCardAvailable = null;

        function parseDMY(str) {
            var p = (str || '').split('-');
            if (p.length !== 3) return null;
            var d = new Date(p[2], p[1] - 1, p[0]);
            return isNaN(d.getTime()) ? null : d;
        }

        function fmt(d) {
            var dd = String(d.getDate()).padStart(2, '0'),
                months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return dd + '-' + months[d.getMonth()] + '-' + d.getFullYear();
        }

        function currentAvailable() {
            if (lastCardAvailable !== null) {
                return lastCardAvailable;
            }
            var val = employeeBalances[empSelect.value];
            return typeof val === 'number' ? val : (parseFloat(availableEl.textContent) || 0);
        }

        function recalc() {
            var fromDate = parseDMY(fromInput.value),
                toDate = parseDMY(toInput.value) || fromDate,
                dayType = dayTypeSel.value;

            if (!fromDate) {
                summaryEl.textContent = 'Select a date';
                totalEl.textContent = '0 Day(s)';
            } else {
                var label = weekday[fromDate.getDay()] + ' ' + fromInput.value;
                if (toDate && toInput.value && toInput.value !== fromInput.value) {
                    label += '  –  ' + weekday[toDate.getDay()] + ' ' + toInput.value;
                }
                summaryEl.textContent = label;

                var days = Math.round((toDate - fromDate) / 86400000) + 1;
                if (days < 1) days = 1;
                if (dayType !== 'Full Day') days = days > 1 ? days - 0.5 : 0.5;
                totalEl.textContent = days + ' Day(s)';
            }

            var daysVal = parseFloat(totalEl.textContent) || 0;
            var available = currentAvailable(),
                after = Math.max(available - daysVal, 0);

            availableEl.textContent = available;
            bookedEl.textContent = daysVal;
            afterEl.textContent = after;
            estimatedEl.textContent = after;
            asOfEl.textContent = fmt(new Date());
        }

        [fromInput, toInput, dayTypeSel, empSelect].forEach(function (el) {
            el && el.addEventListener('change', recalc);
        });

        document.querySelectorAll('.leave-balance-card').forEach(function (card) {
            card.addEventListener('click', function () {
                var avail = parseInt(card.getAttribute('data-available'), 10);
                lastCardAvailable = isNaN(avail) ? null : avail;
            });
        });

        applyModal.addEventListener('hidden.bs.modal', function () {
            lastCardAvailable = null;
        });

        applyModal.addEventListener('shown.bs.modal', recalc);

        document.getElementById('leaveApplySubmit') &&
            document.getElementById('leaveApplySubmit').addEventListener('click', function () {
                var instance = bootstrap.Modal.getInstance(applyModal);
                if (instance) instance.hide();
            });

        recalc();
    })();

/* ==========================================================================
   Script Block 5
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
        var bulkToggle = document.getElementById('btnBulkToggle');
        var singleSection = document.getElementById('singleHolidaySection');
        var bulkSection = document.getElementById('bulkUploadSection');
        var dropzone = document.getElementById('bulkDropzone');
        var fileInput = document.getElementById('bulkFileInput');
        var browseBtn = document.getElementById('dzBrowseBtn');
        var filePreview = document.getElementById('bulkFilePreview');
        var fileName = document.getElementById('bulkFileName');
        var fileSize = document.getElementById('bulkFileSize');
        var fileRemove = document.getElementById('bulkFileRemove');
        var submitBtn = document.getElementById('holidaySubmit');

        /* ---- Bulk toggle ---- */
        bulkToggle.addEventListener('click', function () {
            var isBulk = bulkSection.classList.contains('show');
            if (isBulk) {
                bulkSection.classList.remove('show');
                singleSection.classList.remove('hidden');
                bulkToggle.classList.remove('active');
                bulkToggle.innerHTML = '<i class="bi bi-upload"></i> Bulk';
            } else {
                singleSection.classList.add('hidden');
                bulkSection.classList.add('show');
                bulkToggle.classList.add('active');
                bulkToggle.innerHTML = '<i class="bi bi-pencil-square"></i> Single';
            }
        });

        /* ---- Dropzone interactions ---- */
        browseBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            fileInput.click();
        });

        dropzone.addEventListener('click', function () {
            fileInput.click();
        });

        dropzone.addEventListener('dragover', function (e) {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', function () {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', function (e) {
            e.preventDefault();
            dropzone.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                handleFile(e.dataTransfer.files[0]);
            }
        });

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length) {
                handleFile(fileInput.files[0]);
            }
        });

        function handleFile(file) {
            var validExts = ['.xlsx', '.xls', '.csv'];
            var ext = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
            if (validExts.indexOf(ext) === -1) {
                alert('Please upload a valid Excel or CSV file.');
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be under 5MB.');
                return;
            }
            fileName.textContent = file.name;
            fileSize.textContent = formatBytes(file.size);
            filePreview.classList.add('show');
            dropzone.style.display = 'none';
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            var k = 1024, sizes = ['Bytes', 'KB', 'MB', 'GB'];
            var i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        fileRemove.addEventListener('click', function () {
            fileInput.value = '';
            filePreview.classList.remove('show');
            dropzone.style.display = '';
        });

        /* ---- Submit button text changes based on mode ---- */
        var offcanvasEl = document.getElementById('holidayOffcanvas');
        offcanvasEl.addEventListener('show.bs.offcanvas', function () {
            updateSubmitBtn();
        });

        bulkToggle.addEventListener('click', function () {
            setTimeout(updateSubmitBtn, 50);
        });

        function updateSubmitBtn() {
            if (bulkSection.classList.contains('show')) {
                submitBtn.textContent = 'Upload';
            } else {
                submitBtn.textContent = 'Submit';
            }
        }

        /* ---- Sample Excel download ---- */
        document.getElementById('btnSampleDownload').addEventListener('click', function () {
            var csvContent = 'Holiday Name,Date,Holiday Type,Holiday Year\n';
            csvContent += 'Republic Day,26-01-2026,Public Holiday,2026\n';
            csvContent += 'Maha Shivaratri,18-03-2026,Public Holiday,2026\n';
            csvContent += 'Ugadi,28-03-2026,Public Holiday,2026\n';
            csvContent += 'Good Friday,02-04-2026,Public Holiday,2026\n';
            csvContent += 'May Day,01-05-2026,Public Holiday,2026\n';
            csvContent += 'Independence Day,15-08-2026,Public Holiday,2026\n';
            csvContent += 'Ganesh Chaturthi,26-08-2026,Optional Holiday,2026\n';
            csvContent += 'Gandhi Jayanti,02-10-2026,Public Holiday,2026\n';
            csvContent += 'Dasara,20-10-2026,Public Holiday,2026\n';
            csvContent += 'Diwali,20-11-2026,Public Holiday,2026\n';
            csvContent += 'Christmas,25-12-2026,Public Holiday,2026\n';

            var blob = new Blob([csvContent], {type: 'text/csv;charset=utf-8;'});
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'holiday_sample_upload.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });

        /* ---- Reset on offcanvas close ---- */
        offcanvasEl.addEventListener('hidden.bs.offcanvas', function () {
            singleSection.classList.remove('hidden');
            bulkSection.classList.remove('show');
            bulkToggle.classList.remove('active');
            bulkToggle.innerHTML = '<i class="bi bi-upload"></i> Bulk';
            fileInput.value = '';
            filePreview.classList.remove('show');
            dropzone.style.display = '';
            submitBtn.textContent = 'Submit';
        });
    });

/* ==========================================================================
   Script Block 6
   ========================================================================== */
/* ===== Holiday Edit / Delete actions ===== */
    document.addEventListener('DOMContentLoaded', function() {
        var listEl = document.getElementById('leaveHolidaysList');
        if (!listEl) return;

        /* holidayItems array access — it lives in another script scope,
           so re-read from DOM on every action instead of sharing state */
        function holidayToast(msg, ok) {
            var t = document.createElement('div');
            t.style.cssText = 'position:fixed;bottom:24px;right:24px;z-index:10000;display:flex;align-items:center;gap:8px;padding:12px 18px;border-radius:10px;font-size:13px;font-weight:600;background:' + (ok === false ? '#fef2f2;color:#b91c1c;border:1px solid #fecaca;' : '#f0fdf4;color:#15803d;border:1px solid #bbf7d0;') + 'box-shadow:0 8px 24px rgba(0,0,0,.15);opacity:0;transform:translateY(12px);transition:all .3s ease;';
            t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
            document.body.appendChild(t);
            setTimeout(function() { t.style.opacity = '1'; t.style.transform = 'translateY(0)'; }, 10);
            setTimeout(function() {
                t.style.opacity = '0';
                t.style.transform = 'translateY(12px)';
                setTimeout(function() { t.remove(); }, 350);
            }, 2600);
        }

        /* ---- Delegate clicks ---- */
        listEl.addEventListener('click', function(e) {
            var editBtn = e.target.closest('[data-hol-edit]'),
                delBtn = e.target.closest('[data-hol-del]');

            /* ---- Edit: open Add Holiday offcanvas prefilled ---- */
            if (editBtn) {
                var name = editBtn.getAttribute('data-hol-edit'),
                    dateStr = editBtn.getAttribute('data-hol-date'),
                    item = editBtn.closest('.leave-holiday-item');

                var ocTitle = document.querySelector('#holidayOffcanvas .offcanvas-title');
                if (ocTitle) ocTitle.innerHTML = '<span class="offcanvas-icon"><i class="bi bi-pencil-square"></i></span> Edit Holiday';
                var nameInput = document.getElementById('holidayName');
                if (nameInput) nameInput.value = name;

                /* mark edit mode + remember the row for submit updates */
                var oc = document.getElementById('holidayOffcanvas');
                oc.setAttribute('data-editing', name);
                if (item) item.setAttribute('data-editing-row', '1');

                /* keep the offcanvas submit in edit mode even after it closes */
                window.__holidayEditMode = { name: name, row: item };

                bootstrap.Offcanvas.getOrCreateInstance(oc).show();
                return;
            }

            /* ---- Delete: confirm + remove row ---- */
            if (delBtn) {
                var dName = delBtn.getAttribute('data-hol-del');
                if (!window.confirm('Delete holiday "' + dName + '"? This cannot be undone.')) return;
                var dRow = delBtn.closest('.leave-holiday-item');
                if (dRow) dRow.remove();
                holidayToast('Holiday "' + dName + '" deleted');
            }
        });

        /* ---- Offcanvas submit: if editing, update the row in place ---- */
        var ocEl2 = document.getElementById('holidayOffcanvas');
        var submitBtn2 = document.getElementById('holidaySubmit');
        if (ocEl2 && submitBtn2) {
            submitBtn2.addEventListener('click', function() {
                var editing = window.__holidayEditMode;
                if (!editing || !editing.row || !document.body.contains(editing.row)) return;

                var newName = (document.getElementById('holidayName') || {}).value || '',
                    newDate = (document.getElementById('holidayDate') || {}).value || '';
                if (!newName.trim()) return;

                /* update row text + button data */
                var row = editing.row;
                row.querySelector('.holiday-name').textContent = newName.trim();
                var dateMain = row.querySelector('.date-main');
                if (dateMain && newDate) {
                    var d = new Date(newDate);
                    if (!isNaN(d)) {
                        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                        dateMain.textContent = String(d.getDate()).padStart(2, '0') + ' ' + months[d.getMonth()] + ', ' + days[d.getDay()];
                    }
                }
                var eBtn = row.querySelector('[data-hol-edit]'),
                    dBtn = row.querySelector('[data-hol-del]');
                if (eBtn) { eBtn.setAttribute('data-hol-edit', newName.trim()); eBtn.setAttribute('data-hol-date', dateMain ? dateMain.textContent : newDate); }
                if (dBtn) dBtn.setAttribute('data-hol-del', newName.trim());

                window.__holidayEditMode = null;
                bootstrap.Offcanvas.getOrCreateInstance(ocEl2).hide();
                holidayToast('Holiday "' + newName.trim() + '" updated');
            });
        }

        /* ===== Cancel pending leave request ===== */
        listEl.addEventListener('click', function(e) {
            var cancelBtn = e.target.closest('[data-cancel-leave]');
            if (!cancelBtn) return;

            var row = cancelBtn.closest('.leave-holiday-item');
            if (!row) return;

            var leaveName = (row.querySelector('.leave-name') || {}).textContent || 'this leave';
            var dateMain = row.querySelector('.date-main');
            var dateLabel = dateMain ? dateMain.textContent.trim() : '';
            var when = dateLabel ? ' (' + dateLabel + ')' : '';

            if (!window.confirm('Cancel leave request "' + leaveName.trim() + '"' + when + '?')) return;

            /* swap status pill -> Cancelled */
            var wrap = cancelBtn.closest('.leave-status-wrap') || row.querySelector('.status-col');
            wrap.innerHTML = '<span class="leave-status-pill status-cancelled"><i class="bi bi-slash-circle-fill"></i> Cancelled</span>';

            holidayToast('Leave request "' + leaveName.trim() + '" cancelled');
        });
    });

/* ==========================================================================
   Script Block 7
   ========================================================================== */
(function () {
        var ocEl = document.getElementById('assignLeaveOffcanvas');
        if (!ocEl) return;

        /* Init Select2 after offcanvas shown — same pattern as Add Manual Attendance */
        ocEl.addEventListener('shown.bs.offcanvas', function () {
            if (typeof $ === 'undefined' || !$.fn.select2) return;
            $('#assignEmployeeSelect').select2({
                dropdownParent: $(ocEl),
                width: '100%',
                placeholder: 'Search employee…',
                allowClear: true,
                templateResult: function (data) {
                    if (!data.id) return data.text;
                    var img = $(data.element).data('image') || './assets/img/profile-1.jpg';
                    return $('<div class="select2-user-option"><img src="' + img + '" class="select2-user-image"><span>' + data.text + '</span></div>');
                },
                templateSelection: function (data) {
                    if (!data.id) return data.text;
                    var img = $(data.element).data('image') || './assets/img/profile-1.jpg';
                    return $('<div class="select2-user-selected"><img src="' + img + '" class="select2-user-image"><span>' + data.text + '</span></div>');
                }
            });
        });

        /* Destroy on close so it re-inits fresh next time */
        ocEl.addEventListener('hidden.bs.offcanvas', function () {
            if (typeof $ !== 'undefined' && $.fn.select2) {
                try {
                    $('#assignEmployeeSelect').select2('destroy');
                } catch (e) { }
            }
        });
    })();

/* ==========================================================================
   Script Block 8
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
        var assignOc = document.getElementById('assignLeaveOffcanvas');
        if (!assignOc) return;

        var bulkToggle = document.getElementById('assignBulkToggle');
        var singleSection = document.getElementById('assignSingleSection');
        var bulkSection = document.getElementById('assignBulkSection');
        var dropzone = document.getElementById('assignDropzone');
        var fileInput = document.getElementById('assignFileInput');
        var browseBtn = document.getElementById('assignBrowseBtn');
        var filePreview = document.getElementById('assignFilePreview');
        var fileName = document.getElementById('assignFileName');
        var fileSize = document.getElementById('assignFileSize');
        var fileRemove = document.getElementById('assignFileRemove');
        var submitBtn = document.getElementById('assignLeaveSubmit');

        var SUBMIT_SINGLE = '<i class="bi bi-check2"></i> Assign Leave';
        var SUBMIT_UPLOAD = '<i class="bi bi-cloud-arrow-up"></i> Upload';

        function updateSubmitBtn() {
            submitBtn.innerHTML = bulkSection.classList.contains('show') ? SUBMIT_UPLOAD : SUBMIT_SINGLE;
        }

        /* ---- Bulk / Single toggle ---- */
        bulkToggle.addEventListener('click', function () {
            var isBulk = bulkSection.classList.contains('show');
            if (isBulk) {
                bulkSection.classList.remove('show');
                singleSection.classList.remove('hidden');
                bulkToggle.classList.remove('active');
                bulkToggle.innerHTML = '<i class="bi bi-upload"></i> Bulk';
            } else {
                singleSection.classList.add('hidden');
                bulkSection.classList.add('show');
                bulkToggle.classList.add('active');
                bulkToggle.innerHTML = '<i class="bi bi-pencil-square"></i> Single';
            }
            updateSubmitBtn();
        });

        /* ---- Dropzone interactions ---- */
        browseBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            fileInput.click();
        });

        dropzone.addEventListener('click', function () {
            fileInput.click();
        });

        dropzone.addEventListener('dragover', function (e) {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', function () {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', function (e) {
            e.preventDefault();
            dropzone.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                handleFile(e.dataTransfer.files[0]);
            }
        });

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length) {
                handleFile(fileInput.files[0]);
            }
        });

        function handleFile(file) {
            var validExts = ['.xlsx', '.xls', '.csv'];
            var ext = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
            if (validExts.indexOf(ext) === -1) {
                alert('Please upload a valid Excel or CSV file.');
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be under 5MB.');
                return;
            }
            fileName.textContent = file.name;
            fileSize.textContent = formatBytes(file.size);
            filePreview.classList.add('show');
            dropzone.style.display = 'none';
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            var k = 1024, sizes = ['Bytes', 'KB', 'MB', 'GB'];
            var i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        fileRemove.addEventListener('click', function () {
            fileInput.value = '';
            filePreview.classList.remove('show');
            dropzone.style.display = '';
        });

        /* ---- Upload (bulk mode submit) ---- */
        submitBtn.addEventListener('click', function () {
            if (!bulkSection.classList.contains('show')) return;
            if (!fileInput.files.length) {
                alert('Please choose an Excel file to upload.');
                return;
            }
            var inst = bootstrap.Offcanvas.getInstance(assignOc);
            if (inst) inst.hide();
        });

        /* ---- Sample Excel download ---- */
        document.getElementById('assignSampleDownload').addEventListener('click', function () {
            var csvContent = 'Employee ID,Employee Name,Leave Type,Days,Leave Year,Note\n';
            csvContent += 'EMP0001,Arun Kumar,Casual Leave,12,2026,Annual quota\n';
            csvContent += 'EMP0002,Bala Kumar,Sick Leave,12,2026,Annual quota\n';
            csvContent += 'EMP0003,Chandran,Annual leave,10,2026,Carry forward\n';
            csvContent += 'EMP0004,Dinesh Kumar,PTO,5,2026,Project buffer\n';

            var blob = new Blob([csvContent], {type: 'text/csv;charset=utf-8;'});
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'assign_leave_sample.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });

        assignOc.addEventListener('show.bs.offcanvas', updateSubmitBtn);

        /* ---- Reset on offcanvas close ---- */
        assignOc.addEventListener('hidden.bs.offcanvas', function () {
            singleSection.classList.remove('hidden');
            bulkSection.classList.remove('show');
            bulkToggle.classList.remove('active');
            bulkToggle.innerHTML = '<i class="bi bi-upload"></i> Bulk';
            fileInput.value = '';
            filePreview.classList.remove('show');
            dropzone.style.display = '';
            updateSubmitBtn();
        });
    });
