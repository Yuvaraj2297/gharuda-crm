/**
 * Gharuda HRMS - Header & Sidebar Layout Scripts
 * Handles:
 * 1. Bell Notification Offcanvas & pending notification actions (approve/reject/count)
 * 2. Active Menu highlight, submenus expand, rail navigation state
 */
(function () {
    'use strict';

    function initHeaderLayout() {
        /* ========================================================
           1. BELL NOTIFICATION & OFFCANVAS
           ======================================================== */
        (function () {
            var bell = document.getElementById('bellIcon');
            var ocEl = document.getElementById('bellNotifOffcanvas');
            if (bell && ocEl) {
                bell.addEventListener('click', function (e) {
                    e.stopPropagation();
                    /* Bootstrap loads at the bottom of the page (footer.php), so
                       resolve the Offcanvas instance lazily at click time instead
                       of at script parse time. */
                    if (window.bootstrap && bootstrap.Offcanvas) {
                        bootstrap.Offcanvas.getOrCreateInstance(ocEl).show();
                    }
                });
            }

            /* ----- Leave notification: hover Approve / Reject icons ----- */
            var list = document.getElementById('notifPendingList');
            var countPill = ocEl ? ocEl.querySelector('.notif-count-pill') : null;
            var badgeDot = bell ? bell.querySelector('.badge-dot') : null;

            function refreshCount() {
                var remaining = list ? list.children.length : 0;
                if (countPill) countPill.textContent = remaining + ' new';
                if (badgeDot) {
                    badgeDot.textContent = String(remaining);
                    badgeDot.style.display = remaining > 0 ? '' : 'none';
                }
            }

            if (list) {
                list.addEventListener('click', function (e) {
                    var btn = e.target.closest('.notif-ico-btn');
                    if (!btn) return;
                    e.preventDefault();
                    e.stopPropagation();

                    var item = btn.closest('.bell-notif-item');
                    if (!item || item.dataset.decided) return;
                    item.dataset.decided = '1';

                    var isApprove = btn.getAttribute('data-action') === 'approve';
                    item.style.opacity = '.45';
                    item.style.pointerEvents = 'none';

                    /* swap the icon pair for a spinner while "saving" */
                    var actions = item.querySelector('.notif-hover-actions');
                    if (actions) {
                        actions.style.display = 'inline-flex';
                        actions.innerHTML = '<span class="spinner-border spinner-border-sm text-muted"></span>';
                    }

                    setTimeout(function () {
                        item.style.transition = 'opacity .35s ease, transform .35s ease';
                        item.style.opacity = '0';
                        item.style.transform = 'translateX(24px)';
                        setTimeout(function () {
                            item.remove();
                            refreshCount();
                        }, 350);
                    }, 600);
                });
            }
        })();

        /* ========================================================
           2. ACTIVE-MENU & SIDEBAR STATE
           ======================================================== */
        (function () {
            // Helper to extract clean filename without query, hash, or path
            var getBaseName = function (path) {
                if (!path) return '';
                return path.split('#')[0].split('?')[0].split('/').pop().trim();
            };

            // Current page filename
            var cur = (window.GH_CURRENT_PAGE || getBaseName(location.pathname) || 'index.php').toLowerCase();
            var curClean = cur.replace(/\.php$/i, '');

            // Normalize strings to handle aliases, typos, and slight spelling differences
            var normalizeName = function (s) {
                if (!s) return '';
                var n = getBaseName(s).toLowerCase().replace(/\.php$/i, '').replace(/[-_]/g, '');
                // Alias mappings for common variations
                if (n === 'countr' || n === 'country' || n === 'countryy') return 'country';
                if (n === 'vendar' || n === 'vendor' || n === 'bgvvendar' || n === 'bgvvendor') return 'bgvvendor';
                if (n === 'shedule' || n === 'schedule' || n === 'shiftshedule' || n === 'shiftschedule') return 'shiftschedule';
                return n;
            };

            var curNorm = normalizeName(cur);

            // Flexible match tester: exact match, extension-less match, or alias/typo match
            var isPageMatch = function (target) {
                if (!target) return false;
                var t = getBaseName(target).toLowerCase();
                if (!t || t === '#' || t.indexOf('javascript:') === 0) return false;

                // 1. Exact match (e.g. country.php === country.php)
                if (t === cur) return true;

                // 2. Extension-less match (e.g. country === country)
                var tClean = t.replace(/\.php$/i, '');
                if (tClean === curClean) return true;

                // 3. Normalized alias/typo match (e.g. countr <-> country <-> countryy)
                if (normalizeName(tClean) === curNorm) return true;

                return false;
            };

            var $$ = function (sel) { return Array.prototype.slice.call(document.querySelectorAll(sel)); };
            var setToggle = function (el, on) {
                if (!el) return;
                el.classList.toggle('collapsed', !on);
                el.setAttribute('aria-expanded', on ? 'true' : 'false');
            };

            /* ---- Step 1: Dynamic scan of all sidebar links ---- */
            var matchedLinks = [];
            var activePanelSection = null;

            $$('.side-panel a[href]').forEach(function (a) {
                if (a.hasAttribute('data-bs-toggle')) return;

                var href = a.getAttribute('href');
                var activePagesAttr = a.getAttribute('data-active-pages') || '';
                var activePages = activePagesAttr.split(',').map(function (s) { return s.trim(); }).filter(Boolean);

                var hit = isPageMatch(href);
                if (!hit && activePages.length > 0) {
                    for (var i = 0; i < activePages.length; i++) {
                        if (isPageMatch(activePages[i])) {
                            hit = true;
                            break;
                        }
                    }
                }

                if (hit) {
                    a.classList.add('active');
                    matchedLinks.push(a);
                    if (!activePanelSection) {
                        activePanelSection = a.closest('.panel-section');
                    }
                }
            });

            /* ---- Step 2: Open nested submenus & find active panel section ---- */
            matchedLinks.forEach(function (a) {
                var el = a.parentElement;
                while (el && el !== document.body && !el.classList.contains('panel-section')) {
                    if (el.classList.contains('tree-submenu')) {
                        el.classList.add('show');
                        if (el.id) {
                            $$('[href="#' + el.id + '"], [data-bs-target="#' + el.id + '"]').forEach(function (t) {
                                setToggle(t, true);
                            });
                        }
                    }
                    el = el.parentElement;
                }
            });

            /* ---- Step 3: Activate matching Rail Button ---- */
            function activateRailByPanel(panelName) {
                if (!panelName) return false;
                var clean = panelName.trim().toLowerCase();
                var found = false;
                $$('.rail-btn[data-panel-target]').forEach(function (btn) {
                    var target = (btn.getAttribute('data-panel-target') || '').trim().toLowerCase();
                    if (target === clean) {
                        btn.classList.add('active-rail');
                        found = true;
                    } else {
                        btn.classList.remove('active-rail');
                    }
                });
                return found;
            }

            var railActivated = false;
            if (activePanelSection) {
                var panelName = activePanelSection.getAttribute('data-panel');
                railActivated = activateRailByPanel(panelName);
            }

            /* ---- Step 4: Fallback for sub-pages not directly listed in sidebar ---- */
            var has = function (arr) {
                for (var i = 0; i < arr.length; i++) {
                    if (isPageMatch(arr[i])) return true;
                }
                return false;
            };

            var masterPages = [
                'lead-stage.php', 'lead-stages-master.php', 'lead-sources-master.php', 'lead-status-master.php',
                'brand-master.php', 'product-catalog-master.php', 'visit-activity-types.php', 'customer-categories.php',
                'industry-verticals.php', 'payment-terms-master.php', 'meeting-types-master.php', 'meeting-outcomes-master.php',
                'sales-target-slabs.php', 'project-types-master.php', 'milestone-templates.php', 'ticket-categories.php',
                'sla-policies.php', 'sla-policies-severity.php', 'group-master.php', 'currency-master.php',
                'countr.php', 'country.php', 'countryy.php', 'state.php', 'district.php', 'branch.php',
                'department.php', 'jobtype.php', 'team.php', 'position.php', 'designation.php',
                'employee-type.php', 'relieving-type.php', 'notice-period.php', 'shift.php',
                'permission-modules.php', 'role.php', 'leave-type.php', 'holiday-type.php',
                'bgv-vendar.php', 'bgv-vendor.php', 'documents-generate.php', 'document-upload.php', 'work-location.php'
            ];
            var recruitmentPages = ['job-requisitions.php', 'job-openings.php', 'linkedin-applications.php', 'candidate-evaluations.php', 'candidates.php', 'interview-schedule.php', 'offer-management.php', 'recruitment-report.php'];
            var orgPages = ['organization.php', 'employee-tree.php', 'organization-policy.php', 'organization-calendar.php'];
            var empCreatePages = ['employee-creation.php', 'employee-setup.php', 'ess-submissions.php', 'ess-inprogress.php'];
            var empPages = ['new-employee.php', 'employees-report.php', 'employee-insurance.php'];
            var shiftPages = ['manage-shift.php', 'create-shift.php', 'shift-shedule.php', 'shift-change-requests.php'];
            var loanPages = ['loan-requests.php', 'loan-apply.php', 'loan-type.php', 'loan-report.php'];
            var payrollPages = ['attendance-adjustment.php', 'salary-structure.php', 'payroll-report.php', 'payslip.php'];
            var attPages = ['attendance-report.php', 'check-in-check-out.php', 'punch-in-reports.php', 'overtime.php'];
            var leavePages = ['view-leave.php', 'leave-report.php', 'permission-requests.php'];
            var onboardingPages = ['onboarding-list.php', 'onboarding-tasks.php', 'onboarding-documents.php', 'onboarding-assets.php', 'onboarding-orientation.php'];
            var performancePages = ['performance-appraisal.php', 'performance-goals.php', 'performance-kpi.php', 'performance-feedback.php', 'performance-reports.php', 'performance-pip.php'];
            var reportsPages = ['reports-dashboard.php', 'reports-headcount.php', 'reports-attendance.php', 'reports-payroll.php', 'reports-attrition.php', 'reports-builder.php'];
            var ticketEmpPages = ['ticketing.php', 'my-tickets.php'];
            var ticketAdminPages = ['ticket-dashboard.php', 'ticket-reports.php'];
            var custSelfPages = ['customer-dashboard.php', 'customer-create-ticket.php', 'customer-my-tickets.php'];
            var custAdminPages = ['cticket-admin.php'];
            var leadCorePages = ['lead.php', 'lead-map.php', 'lead-dashboard.php', 'employee-revenue-report.php', 'employee-lead-report.php', 'lead-source-report.php', 'staff-visting-report.php', 'staff-visiting-location-report.php', 'brandwise-report.php', 'deals.php', 'quotations.php', 'quotation-create.php', 'contracts.php', 'follow-up-list.php'];
            var leadMgrPages = ['manage-leads.php', 'sms-chat.php', 'mailbox.php', 'whatsapp-chat.php'];
            var leadReportPages = ['lead-filter.php'];
            var apptMomPages = ['appointments.php', 'appointment-schedule.php', 'mom.php', 'past-meeting.php', 'callbacks.php', 'summary-report.php', 'appointment-types.php'];
            var projectCorePages = ['project-dashboard.php', 'projects-list.php', 'projects-report.php', 'projectwise-daily-task-report.php', 'project-create.php'];
            var taskCorePages = ['tasks-list.php', 'task-create.php', 'task-overview.php', 'score-card.php'];
            var customerPages = ['customers.php', 'customer-view.php', 'customer-new.php', 'customer-import.php', 'customer-dashboard.php', 'contacts.php'];
            var inventoryPages = ['commodity-list.php', 'inventry-receive-voucher.php', 'inventry-deliver-voucher.php', 'package-list.php', 'internal-deliver-note.php', 'loss-adjustment.php', 'return-order-management.php', 'warehouse.php', 'inventory-history.php', 'stock-summary-report.php', 'inventory-settings.php'];
            var manufacturingPages = ['manufacturing-dashboard.php', 'manufacturing-order.php', 'product-management.php', 'product-variant.php'];
            var supportPages = ['support-tickets.php', 'support-create-ticket.php', 'ticket-dashboard.php', 'ticket-reports.php', 'my-tickets.php'];
            var expensePages = ['expenses.php', 'expense-create.php', 'invoices.php', 'invoice-create.php', 'payments.php', 'contracts.php'];
            var pettyCashPages = ['petty-cash.php', 'petty-cash-list.php', 'petty-cash-report.php'];
            var apptPages = ['appointments.php', 'appointment-schedule.php', 'past-meeting.php', 'callbacks.php', 'summary-report.php', 'appointment-types.php'];

            var F = {};
            F.isMasterActive = has(masterPages);
            F.isRecruitmentActive = has(recruitmentPages);
            F.isOrgActive = has(orgPages);
            F.isEmpCreateActive = has(empCreatePages);
            F.isEmpActive = has(empPages);
            F.isShiftActive = has(shiftPages);
            F.isLoanActive = has(loanPages);
            F.isPayrollActive = has(payrollPages);
            F.isHrMgmtActive = F.isOrgActive || F.isEmpCreateActive || F.isEmpActive || F.isShiftActive || F.isLoanActive || F.isPayrollActive;
            F.isAttActive = has(attPages);
            F.isLeaveActive = has(leavePages);
            F.isTimesheetLeaveRailActive = F.isAttActive || F.isLeaveActive;
            F.isOnboardingActive = has(onboardingPages);
            F.isPerformanceActive = has(performancePages);
            F.isReportsActive = has(reportsPages);
            F.isHrRecordRailActive = F.isOnboardingActive || F.isPerformanceActive || F.isReportsActive;
            F.isTicketEmpActive = has(ticketEmpPages);
            F.isTicketAdminActive = has(ticketAdminPages);
            F.isCustSelfActive = has(custSelfPages);
            F.isCustAdminActive = has(custAdminPages);
            F.isTicketActive = F.isTicketEmpActive || F.isTicketAdminActive || F.isCustSelfActive || F.isCustAdminActive;
            F.isLeadCoreActive = has(leadCorePages);
            F.isLeadMgrActive = has(leadMgrPages);
            F.isLeadReportActive = has(leadReportPages);
            F.isLeadActive = F.isLeadCoreActive || F.isLeadMgrActive || F.isLeadReportActive;
            F.isApptMomActive = has(apptMomPages);
            F.isApptActive = has(apptPages);
            F.isTargetActive = cur === 'target.php' || cur === 'brand-target.php';
            F.isProjectCoreActive = has(projectCorePages);
            F.isTaskCoreActive = has(taskCorePages);
            F.isProjectMgmtActive = F.isProjectCoreActive || F.isTaskCoreActive;
            F.isCustomersActive = has(customerPages);
            F.isSupportActive = has(supportPages);
            F.isExpenseActive = has(expensePages);
            F.isPettyCashActive = has(pettyCashPages);
            F.isInventoryActive = has(inventoryPages);
            F.isManufacturingActive = has(manufacturingPages);
            F.isDashboardActive = cur === 'dashboard.php' || cur === 'index.php';

            // Only apply rail-flag toggles if dynamic scan hasn't already activated the rail
            if (!railActivated) {
                var flagActivated = false;
                $$('[data-rail-flag]').forEach(function (el) {
                    var isAct = !!F[el.getAttribute('data-rail-flag')];
                    if (isAct && !flagActivated) {
                        el.classList.add('active-rail');
                        flagActivated = true;
                        railActivated = true;
                    } else {
                        el.classList.remove('active-rail');
                    }
                });
                if (!flagActivated && F.isRecruitmentActive) {
                    var rr = document.querySelector('.rail-btn[data-panel-target="recruitment"]');
                    if (rr) {
                        rr.classList.add('active-rail');
                        railActivated = true;
                    }
                }
            } else {
                // If dynamic scan already activated a rail button, ensure all other rail buttons do not have active-rail
                var activeBtns = $$('.rail-btn.active-rail');
                if (activeBtns.length > 1) {
                    for (var bIdx = 1; bIdx < activeBtns.length; bIdx++) {
                        activeBtns[bIdx].classList.remove('active-rail');
                    }
                }
            }

            // Other data-* flags (collapse/accordion/show states)
            $$('[data-active-flag]').forEach(function (el) { el.classList.toggle('active', !!F[el.getAttribute('data-active-flag')]); });
            $$('[data-show-pages]').forEach(function (el) { el.classList.toggle('show', el.getAttribute('data-show-pages').split(',').indexOf(cur) !== -1); });
            $$('[data-toggle-pages]').forEach(function (el) { setToggle(el, el.getAttribute('data-toggle-pages').split(',').indexOf(cur) !== -1); });
            $$('[data-toggle-flag]').forEach(function (el) { setToggle(el, !!F[el.getAttribute('data-toggle-flag')]); });
            $$('[data-show-flag]').forEach(function (el) { el.classList.toggle('show', !!F[el.getAttribute('data-show-flag')]); });
        })();
    }

    if (document.getElementById('sidePanel')) {
        initHeaderLayout();
    } else if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initHeaderLayout);
    } else {
        initHeaderLayout();
    }
})();
