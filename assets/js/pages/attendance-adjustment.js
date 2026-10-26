/**
 * Gharuda CRM - Attendance Adjustment Page Script
 * File: assets/js/pages/attendance-adjustment.js
 */

/* --- Script Block 1 --- */
(function() {
        'use strict';

        var empData = window.adjSeedData || [];
        var adjDays = window.adjDays || [];
        var pendingOtContext = null;

        function openOtModal(wrap, badgeEl) {
            var empId = wrap.getAttribute('data-empid') || 41;
            var dayIdx = wrap.getAttribute('data-dayidx') || 0;
            var emp = empData.find(function(e) { return e.id == empId; }) || empData[0] || { name: 'Employee', role: 'Developer', branch: 'Gharuda Infotech', id: empId };
            var dayInfo = (adjDays && adjDays[dayIdx]) ? adjDays[dayIdx] : { num: '12', month: 'Aug', day: 'Wed' };

            var empNameEl = document.getElementById('otModalEmpName'); if (empNameEl) empNameEl.textContent = emp.name;
            var empRoleEl = document.getElementById('otModalEmpRole'); if (empRoleEl) empRoleEl.textContent = emp.role;
            var empBranchEl = document.getElementById('otModalEmpBranch'); if (empBranchEl) empBranchEl.textContent = emp.branch;
            var profileImgNum = ((emp.id - 34) % 4) + 1;
            var empImgEl = document.getElementById('otModalEmpImg'); if (empImgEl) empImgEl.src = './assets/img/profile-' + profileImgNum + '.jpg';
            
            var dateStr = (dayInfo.num || '12') + ' ' + (dayInfo.month || 'Aug').toUpperCase() + ' 2026 (' + (dayInfo.day || 'Wed').toUpperCase() + ')';
            var dateEl = document.getElementById('otModalDate'); if (dateEl) dateEl.textContent = dateStr;

            var seed = (parseInt(empId) * 7 + parseInt(dayIdx) * 3) % 4;
            var otHoursArr = ['3.5', '2.5', '4.0', '1.5'];
            var otHours = otHoursArr[seed];
            var shiftOutTimes = ['08:30 PM', '09:00 PM', '10:00 PM', '07:30 PM'];
            var otReasons = [
                'Project Release Deployment & Server Migration',
                'Urgent Bug Fixes & Code Review',
                'Database Optimization & Performance Tuning',
                'Client Demo Preparation & QA Testing'
            ];

            var shiftHoursEl = document.getElementById('otModalShiftHours'); if (shiftHoursEl) shiftHoursEl.textContent = '8.0 hrs';
            var workedHoursEl = document.getElementById('otModalWorkedHours'); if (workedHoursEl) workedHoursEl.textContent = (8 + parseFloat(otHours)) + ' hrs';
            var punchRangeEl = document.getElementById('otModalPunchRange'); if (punchRangeEl) punchRangeEl.textContent = '08:50 AM - ' + shiftOutTimes[seed];
            var otHoursEl = document.getElementById('otModalOtHours'); if (otHoursEl) otHoursEl.textContent = otHours + ' hrs';
            var otTypeEl = document.getElementById('otModalOtType'); if (otTypeEl) otTypeEl.textContent = (dayInfo.day === 'Sun' || dayInfo.day === 'Sat') ? 'Weekend / Holiday OT' : 'Regular Workday OT';
            var reasonEl = document.getElementById('otModalReason'); if (reasonEl) reasonEl.value = otReasons[seed];
            var adjustInputEl = document.getElementById('otModalAdjustOtInput'); if (adjustInputEl) adjustInputEl.value = otHours;
            var remarksEl = document.getElementById('otModalRemarks'); if (remarksEl) remarksEl.value = 'OT verified with biometric logs';

            pendingOtContext = { wrap: wrap, badgeEl: badgeEl };

            var modalEl = document.getElementById('otDetailsModal');
            if (modalEl && window.bootstrap) {
                var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.show();
            }
        }

        function handleBadgeClick(badge, e) {
            e.preventDefault();
            e.stopPropagation();
            var wrap = badge.closest('.adj-status-wrap');
            if (!wrap) return;
            var dd = wrap.querySelector('.adj-status-dropdown');
            var isOpen = wrap.classList.contains('open');
            document.querySelectorAll('.adj-status-wrap.open').forEach(function(w) {
                w.classList.remove('open');
            });
            if (!isOpen && dd) {
                wrap.classList.add('open');
                var r = badge.getBoundingClientRect();
                dd.style.left = r.left + 'px';
                dd.style.top = (r.bottom + 4) + 'px';
            }
        }

        function handleOptionClick(opt, e) {
            e.preventDefault();
            e.stopPropagation();
            var wrap = opt.closest('.adj-status-wrap');
            if (!wrap) return;
            var badgeEl = wrap.querySelector('.adj-status-badge');
            var v = opt.getAttribute('data-val');
            wrap.classList.remove('open');

            if (v === 'OT') {
                openOtModal(wrap, badgeEl);
            } else if (badgeEl) {
                badgeEl.innerHTML = v + ' <i class="bi bi-chevron-down ms-1 adj-badge-caret"></i>';
                badgeEl.setAttribute('data-status', v);
                badgeEl.className = 'adj-status-badge adj-status-' + v.toLowerCase();
                wrap.querySelectorAll('.adj-status-option').forEach(function(o) {
                    o.classList.toggle('active', o.getAttribute('data-val') === v);
                });
            }
        }

        // Event delegation on table body
        var tbody = document.getElementById('adjTbody');
        if (tbody) {
            tbody.addEventListener('click', function(e) {
                var badge = e.target.closest('.adj-status-badge');
                if (badge) {
                    handleBadgeClick(badge, e);
                    return;
                }
                var opt = e.target.closest('.adj-status-option');
                if (opt) {
                    handleOptionClick(opt, e);
                    return;
                }
            });
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.adj-status-wrap')) {
                document.querySelectorAll('.adj-status-wrap.open').forEach(function(w) {
                    w.classList.remove('open');
                });
            }
        });

        // OT Modal Save Handler
        var otSaveBtn = document.getElementById('otModalSaveBtn');
        if (otSaveBtn) {
            otSaveBtn.addEventListener('click', function() {
                if (pendingOtContext) {
                    var wrap = pendingOtContext.wrap;
                    var badgeEl = pendingOtContext.badgeEl;
                    var v = 'OT';
                    var adjInput = document.getElementById('otModalAdjustOtInput');
                    var adjHours = adjInput ? adjInput.value : '3.5';
                    if (badgeEl) {
                        badgeEl.innerHTML = v + ' <i class="bi bi-chevron-down ms-1 adj-badge-caret"></i>';
                        badgeEl.setAttribute('data-status', v);
                        badgeEl.setAttribute('title', 'Approved OT: ' + adjHours + ' hrs');
                        badgeEl.className = 'adj-status-badge adj-status-ot';
                    }
                    if (wrap) {
                        wrap.querySelectorAll('.adj-status-option').forEach(function(o) {
                            o.classList.toggle('active', o.getAttribute('data-val') === v);
                        });
                    }
                }
                var modalEl = document.getElementById('otDetailsModal');
                if (modalEl && window.bootstrap) {
                    var modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                }
            });
        }

        // Save Changes
        var saveBtn = document.getElementById('adjSaveBtn');
        if (saveBtn) {
            saveBtn.addEventListener('click', function() {
                var badges = document.querySelectorAll('#adjTbody .adj-status-badge');
                alert('Saved ' + badges.length + ' attendance records!');
            });
        }
    })();

/* --- Script Block 2 --- */
// Sticky shadow on scroll
    (function() {
        var wrap = document.querySelector('.table-responsive');
        if (!wrap) return;
        wrap.addEventListener('scroll', function() {
            wrap.classList.toggle('is-scrolled', wrap.scrollLeft > 0);
        });
    })();
