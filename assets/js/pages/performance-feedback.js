/**
 * Gharuda CRM - Performance Feedback Page Script
 * File: assets/js/pages/performance-feedback.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
// Current Active Evaluator State (Default: Manager)
    let currentEvaluatorRole = 'manager';
    let currentEvaluatorName = 'Ravi Chandran (Reporting Manager)';
    let activeStatusFilter = 'all';
    let currentEvalCardId = 'card_arun';
    let currentEvalTitle = 'Senior Software Engineer';

    // =========================================================================
    // 1. ROBUST TAB SWITCHING HANDLER
    // =========================================================================
    function init360StageTabs() {
        const tabButtons = document.querySelectorAll('#stageTabsWrap .ln-stage-tab');
        const tabPanes = document.querySelectorAll('#pills-tabContent > .tab-pane');

        tabButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                tabButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                tabPanes.forEach(pane => {
                    pane.classList.remove('show', 'active');
                });

                const targetSelector = this.getAttribute('data-bs-target') || this.getAttribute('data-target') || this.getAttribute('href');
                if (targetSelector) {
                    const activePane = document.querySelector(targetSelector);
                    if (activePane) {
                        activePane.classList.add('show', 'active');
                    }
                }
            });
        });
    }

    function switchTab(tabId) {
        const targetBtn = document.querySelector(`#stageTabsWrap button[data-bs-target="${tabId}"]`);
        if (targetBtn) {
            targetBtn.click();
        }
    }

    // =========================================================================
    // 2. DYNAMIC CARD FILTERING BY EVALUATOR ROLE & STATUS
    // =========================================================================
    function applyCardFilters() {
        const cards = document.querySelectorAll('#reviewCardsGrid .review-card-item');
        let pendingRoleCount = 0;
        let visibleCount = 0;

        cards.forEach(card => {
            const cardRole = card.getAttribute('data-auth-role');
            const cardStatus = card.getAttribute('data-status');

            let matchesRole = false;
            if (currentEvaluatorRole === 'manager') {
                matchesRole = (cardRole === 'manager');
            } else if (currentEvaluatorRole === 'tl') {
                matchesRole = (cardRole === 'tl');
            } else if (currentEvaluatorRole === 'hr') {
                matchesRole = (cardRole === 'hr' || cardStatus === 'submitted');
            } else if (currentEvaluatorRole === 'employee') {
                matchesRole = true;
            }

            if (matchesRole && cardStatus === 'pending') {
                pendingRoleCount++;
            }

            let matchesStatus = (activeStatusFilter === 'all' || cardStatus === activeStatusFilter);

            if (matchesRole && matchesStatus) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        const pendingText = document.getElementById('pendingCountText');
        if (pendingText) {
            if (currentEvaluatorRole === 'manager') {
                pendingText.innerHTML = `<i class="bi bi-info-circle me-1"></i> You have <strong class="text-danger">${pendingRoleCount} pending reviews</strong> awaiting Manager evaluation`;
            } else if (currentEvaluatorRole === 'tl') {
                pendingText.innerHTML = `<i class="bi bi-info-circle me-1"></i> You have <strong class="text-warning">${pendingRoleCount} pending reviews</strong> awaiting Team Leader (TL) evaluation`;
            } else if (currentEvaluatorRole === 'hr') {
                pendingText.innerHTML = `<i class="bi bi-info-circle me-1"></i> You have <strong class="text-info">${pendingRoleCount} pending reviews</strong> awaiting HR Admin signoff`;
            } else {
                pendingText.innerHTML = `<i class="bi bi-lock-fill me-1 text-danger"></i> Viewing as Employee (Submission Locked)`;
            }
        }
    }

    // =========================================================================
    // 3. ROLE GOVERNANCE & ACCESS CONTROL HANDLER (HR, Manager, TL Only)
    // =========================================================================
    function switchEvaluatorRole(role, btn) {
        currentEvaluatorRole = role;

        const switcherButtons = document.querySelectorAll('#roleSwitcherWrap .role-sim-btn');
        switcherButtons.forEach(b => {
            b.className = 'role-sim-btn';
        });

        const authStatusBanner = document.getElementById('authStatusBanner');
        const authRestrictedBanner = document.getElementById('authRestrictedBanner');
        const roleCurrentTag = document.getElementById('roleCurrentTag');
        const activeRoleNameText = document.getElementById('activeRoleNameText');
        const reviewCards = document.querySelectorAll('#reviewCardsGrid .review-card');
        const evalButtons = document.querySelectorAll('#reviewCardsGrid .card-eval-btn');

        if (!btn) {
            btn = document.querySelector(`#roleSwitcherWrap button[data-role="${role}"]`);
        }

        if (role === 'manager') {
            if (btn) btn.classList.add('active', 'btn-mgr-active');
            currentEvaluatorName = 'Ravi Chandran (Reporting Manager)';
            activeRoleNameText.innerText = 'Reporting Manager (Ravi Chandran)';
            
            authStatusBanner.style.display = 'flex';
            authRestrictedBanner.style.display = 'none';
            roleCurrentTag.innerHTML = `<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1" style="font-size:11.5px;"><i class="bi bi-check-circle-fill me-1"></i> Authorized to Submit Feedback</span>`;

            reviewCards.forEach(card => card.classList.remove('is-locked'));
            evalButtons.forEach(b => {
                b.removeAttribute('disabled');
                b.style.pointerEvents = 'auto';
            });
            restoreCardButtonLabels();
            updateGlobalFlowStepper('mgr');
            showAppToast('Switched perspective to: 👔 Reporting Manager (Ravi Chandran) - Stage 1');

        } else if (role === 'tl') {
            if (btn) btn.classList.add('active', 'btn-tl-active');
            currentEvaluatorName = 'Karthik Raja (Team Leader - TL)';
            activeRoleNameText.innerText = 'Team Leader / TL (Karthik Raja)';

            authStatusBanner.style.display = 'flex';
            authRestrictedBanner.style.display = 'none';
            roleCurrentTag.innerHTML = `<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1" style="font-size:11.5px;"><i class="bi bi-check-circle-fill me-1"></i> Authorized to Submit Feedback</span>`;

            reviewCards.forEach(card => card.classList.remove('is-locked'));
            evalButtons.forEach(b => {
                b.removeAttribute('disabled');
                b.style.pointerEvents = 'auto';
            });
            restoreCardButtonLabels();
            updateGlobalFlowStepper('tl');
            showAppToast('Switched perspective to: 🎯 Team Leader / TL (Karthik Raja) - Stage 2');

        } else if (role === 'hr') {
            if (btn) btn.classList.add('active', 'btn-hr-active');
            currentEvaluatorName = 'Divya Ramesh (HR Administrator)';
            activeRoleNameText.innerText = 'HR Administrator (Divya Ramesh)';

            authStatusBanner.style.display = 'flex';
            authRestrictedBanner.style.display = 'none';
            roleCurrentTag.innerHTML = `<span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1" style="font-size:11.5px;"><i class="bi bi-check-circle-fill me-1"></i> Authorized to Submit Feedback</span>`;

            reviewCards.forEach(card => card.classList.remove('is-locked'));
            evalButtons.forEach(b => {
                b.removeAttribute('disabled');
                b.style.pointerEvents = 'auto';
            });
            restoreCardButtonLabels();
            updateGlobalFlowStepper('hr');
            showAppToast('Switched perspective to: 👑 HR Administrator (Divya Ramesh) - Stage 3');

        } else if (role === 'employee') {
            if (btn) btn.classList.add('active', 'btn-emp-active');
            currentEvaluatorName = 'Arun Kumar (General Employee)';

            authStatusBanner.style.display = 'none';
            authRestrictedBanner.style.display = 'flex';
            roleCurrentTag.innerHTML = `<span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1" style="font-size:11.5px;"><i class="bi bi-lock-fill me-1"></i> Submission Restricted (HR/Manager/TL Only)</span>`;

            reviewCards.forEach(card => card.classList.add('is-locked'));
            evalButtons.forEach(b => {
                b.setAttribute('disabled', 'true');
                b.style.pointerEvents = 'none';
                b.innerHTML = '<i class="bi bi-lock-fill me-1"></i> Locked: Only HR, Manager & TL Can Submit';
            });
            showAppToast('Access Restricted: Logged in as Employee. Feedback submission is locked.', true);
        }

        applyCardFilters();
    }

    function restoreCardButtonLabels() {
        const cardItems = document.querySelectorAll('.review-card-item');
        cardItems.forEach(item => {
            const status = item.getAttribute('data-status');
            const btn = item.querySelector('.card-eval-btn');
            if (!btn) return;
            if (status === 'pending') {
                btn.innerHTML = '<i class="bi bi-star me-1"></i> Start Feedback Evaluation';
            } else if (status === 'in_progress') {
                btn.innerHTML = '<i class="bi bi-pencil me-1"></i> Continue Feedback Draft';
            } else if (status === 'submitted') {
                btn.innerHTML = '<i class="bi bi-eye me-1"></i> View Submitted Evaluation';
            }
        });
    }

    // =========================================================================
    // 4. TAB 2 REVIEW STATUS FILTERING
    // =========================================================================
    function filterReviewCards(filter, btn) {
        document.querySelectorAll('#reviewFilterWrap .filter-pill-btn').forEach(b => {
            b.classList.remove('active', 'btn-dark');
            b.classList.add('btn-outline-secondary');
        });
        btn.classList.add('active', 'btn-dark');
        btn.classList.remove('btn-outline-secondary');

        activeStatusFilter = filter;
        applyCardFilters();
    }

    // =========================================================================
    // 5. EVALUATION MODAL DATA POPULATOR & SUBMISSION (Manager ➔ TL ➔ HR Admin)
    // =========================================================================
    function setupEvaluationForm(cardId, name, title, relationship, requiredRole) {
        if (currentEvaluatorRole === 'employee') {
            showAppToast('Access Denied: Only HR, Managers, and Team Leaders (TL) can evaluate feedback.', true);
            return;
        }

        currentEvalCardId = cardId;
        currentEvalTitle = title;
        document.getElementById('evalTargetName').innerText = name;
        const relBadge = document.getElementById('evalRelBadge');
        relBadge.innerText = relationship;

        if (relationship.includes('Manager')) {
            relBadge.className = 'role-badge role-badge-mgr';
            relBadge.innerHTML = '<i class="bi bi-person-badge-fill"></i> Manager Evaluation';
        } else if (relationship.includes('Team Leader') || relationship.includes('TL')) {
            relBadge.className = 'role-badge role-badge-tl';
            relBadge.innerHTML = '<i class="bi bi-compass-fill"></i> Team Leader (TL) Review';
        } else if (relationship.includes('HR')) {
            relBadge.className = 'role-badge role-badge-hr';
            relBadge.innerHTML = '<i class="bi bi-award-fill"></i> HR Admin Review';
        } else {
            relBadge.className = 'role-badge role-badge-mgr';
            relBadge.innerHTML = '<i class="bi bi-person-badge-fill"></i> ' + relationship;
        }

        const roleLabel = requiredRole || (currentEvaluatorRole === 'tl' ? 'Team Leader' : (currentEvaluatorRole === 'hr' ? 'HR Admin' : 'Manager'));
        document.getElementById('evalRoleText').innerText = roleLabel;
        const roleSelect = document.getElementById('evalRoleSelector');
        if (roleSelect) {
            roleSelect.value = roleLabel;
        }
    }

    function onModalRoleChange(newRole) {
        document.getElementById('evalRoleText').innerText = newRole;
    }

    // Submit Evaluation with Sequential Forwarding: Manager ➔ TL ➔ HR Admin ➔ Published
    function submitFeedbackEvaluation() {
        if (currentEvaluatorRole === 'employee') {
            showAppToast('Submission Blocked: Non-leadership employees cannot submit feedback.', true);
            return;
        }

        const employeeName = document.getElementById('evalTargetName').innerText;
        const evaluatorRole = document.getElementById('evalRoleText').innerText;
        const targetCard = document.getElementById(currentEvalCardId);

        $('#evaluationModal').modal('hide');

        if (evaluatorRole.includes('Manager')) {
            // Manager Stage Complete -> Move to TL Stage
            if (targetCard) {
                targetCard.setAttribute('data-auth-role', 'tl');
                
                const roleTag = targetCard.querySelector('.card-role-tag');
                if (roleTag) {
                    roleTag.className = 'role-badge role-badge-tl card-role-tag';
                    roleTag.innerHTML = '<i class="bi bi-compass-fill"></i> Stage 2: Team Leader (TL) Review';
                }

                const stepperWrap = targetCard.querySelector('.flow-stepper-wrap');
                if (stepperWrap) {
                    stepperWrap.innerHTML = `
                        <div class="flow-step-item"><div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 1. Mgr</div></div>
                        <div class="flow-arrow-line done"></div>
                        <div class="flow-step-item"><div class="flow-step-pill flow-step-active"><i class="bi bi-arrow-right-circle-fill"></i> 2. TL</div></div>
                        <div class="flow-arrow-line"></div>
                        <div class="flow-step-item"><div class="flow-step-pill flow-step-pending"><i class="bi bi-clock"></i> 3. HR</div></div>
                    `;
                }

                const evalName = targetCard.querySelector('.card-evaluator-name');
                if (evalName) evalName.innerText = 'Karthik Raja (TL)';

                const evalBtn = targetCard.querySelector('.card-eval-btn');
                if (evalBtn) {
                    evalBtn.setAttribute('onclick', `setupEvaluationForm('${currentEvalCardId}', '${employeeName}', '${currentEvalTitle}', 'Team Leader Review', 'Team Leader')`);
                    evalBtn.innerHTML = '<i class="bi bi-star me-1"></i> Start Feedback Evaluation';
                }
            }

            showAppToast(`👔 Manager feedback submitted for ${employeeName}! Moved to Team Leader (TL) for Stage 2 review.`);
            updateTab1TableRow(employeeName, 'tl', '4.5');
            applyCardFilters();

        } else if (evaluatorRole.includes('Team Leader') || evaluatorRole.includes('TL')) {
            // TL Stage Complete -> Move to HR Admin Stage
            if (targetCard) {
                targetCard.setAttribute('data-auth-role', 'hr');

                const roleTag = targetCard.querySelector('.card-role-tag');
                if (roleTag) {
                    roleTag.className = 'role-badge role-badge-hr card-role-tag';
                    roleTag.innerHTML = '<i class="bi bi-award-fill"></i> Stage 3: HR Admin Review';
                }

                const stepperWrap = targetCard.querySelector('.flow-stepper-wrap');
                if (stepperWrap) {
                    stepperWrap.innerHTML = `
                        <div class="flow-step-item"><div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 1. Mgr</div></div>
                        <div class="flow-arrow-line done"></div>
                        <div class="flow-step-item"><div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 2. TL</div></div>
                        <div class="flow-arrow-line done"></div>
                        <div class="flow-step-item"><div class="flow-step-pill flow-step-active"><i class="bi bi-arrow-right-circle-fill"></i> 3. HR</div></div>
                    `;
                }

                const evalName = targetCard.querySelector('.card-evaluator-name');
                if (evalName) evalName.innerText = 'Divya Ramesh (HR Admin)';

                const evalBtn = targetCard.querySelector('.card-eval-btn');
                if (evalBtn) {
                    evalBtn.setAttribute('onclick', `setupEvaluationForm('${currentEvalCardId}', '${employeeName}', '${currentEvalTitle}', 'HR Administrator Review', 'HR Admin')`);
                    evalBtn.innerHTML = '<i class="bi bi-star me-1"></i> Start Feedback Evaluation';
                }
            }

            showAppToast(`🎯 Team Leader feedback submitted for ${employeeName}! Moved to HR Admin for Stage 3 signoff.`);
            updateTab1TableRow(employeeName, 'hr', '4.5', '4.4');
            applyCardFilters();

        } else {
            // HR Admin Final Signoff -> Published
            if (targetCard) {
                targetCard.setAttribute('data-status', 'submitted');
                targetCard.setAttribute('data-auth-role', 'hr');

                const roleTag = targetCard.querySelector('.card-role-tag');
                if (roleTag) {
                    roleTag.className = 'role-badge role-badge-hr card-role-tag';
                    roleTag.innerHTML = '<i class="bi bi-check-circle-fill text-success"></i> Stage 4: Workflow Complete';
                }

                const statusBadge = targetCard.querySelector('.card-status-badge');
                if (statusBadge) {
                    statusBadge.className = 'badge bg-success-subtle text-success border border-success-subtle card-status-badge';
                    statusBadge.innerText = '🟢 Published';
                }

                const stepperWrap = targetCard.querySelector('.flow-stepper-wrap');
                if (stepperWrap) {
                    stepperWrap.innerHTML = `
                        <div class="flow-step-item"><div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 1. Mgr</div></div>
                        <div class="flow-arrow-line done"></div>
                        <div class="flow-step-item"><div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 2. TL</div></div>
                        <div class="flow-arrow-line done"></div>
                        <div class="flow-step-item"><div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 3. HR</div></div>
                    `;
                }

                const evalBtn = targetCard.querySelector('.card-eval-btn');
                if (evalBtn) {
                    evalBtn.className = 'btn btn-outline-secondary btn-sm w-100 card-eval-btn';
                    evalBtn.setAttribute('data-bs-target', '#viewReportModal');
                    evalBtn.removeAttribute('onclick');
                    evalBtn.innerHTML = '<i class="bi bi-eye me-1"></i> View Published 360° Report';
                }

                // Automatically add published employee report to Tab 3 ("My Feedback Report") dropdown & view
                addEmployeeToMyFeedbackReport(employeeName, currentEvalTitle, 'Engineering');

                // Automatically update Tab 1 Feedback Cycles table row to Completed with Report button!
                updateTab1TableRow(employeeName, 'completed', '4.5', '4.4', '4.5', '4.5 / 5.0');
            }

            showAppToast(`🎉 HR Admin final signoff complete for ${employeeName}! 360° Feedback workflow complete & report published.`);
            applyCardFilters();
        }
    }

    // Dynamic Stepper Pipeline Renderer (Manager ➔ TL ➔ HR Admin ➔ Published)
    function updateGlobalFlowStepper(activeStage) {
        const stepMgr = document.getElementById('gStepMgr');
        const stepTL = document.getElementById('gStepTL');
        const stepHR = document.getElementById('gStepHR');
        const stepDone = document.getElementById('gStepDone');
        const arrow1 = document.getElementById('gArrow1');
        const arrow2 = document.getElementById('gArrow2');
        const arrow3 = document.getElementById('gArrow3');

        if (!stepMgr || !stepTL || !stepHR) return;

        if (activeStage === 'mgr') {
            stepMgr.className = 'flow-step-pill flow-step-active';
            stepMgr.innerHTML = '<i class="bi bi-person-badge-fill"></i> 1. Manager Review (Active 🔵)';
            arrow1.className = 'flow-arrow-line';

            stepTL.className = 'flow-step-pill flow-step-pending';
            stepTL.innerHTML = '<i class="bi bi-compass"></i> 2. Team Leader (TL) Review';
            arrow2.className = 'flow-arrow-line';

            stepHR.className = 'flow-step-pill flow-step-pending';
            stepHR.innerHTML = '<i class="bi bi-award"></i> 3. HR Admin Final Signoff';
            arrow3.className = 'flow-arrow-line';

            stepDone.className = 'flow-step-pill flow-step-pending';

        } else if (activeStage === 'tl') {
            stepMgr.className = 'flow-step-pill flow-step-done';
            stepMgr.innerHTML = '<i class="bi bi-check-circle-fill"></i> 1. Manager Review (Done)';
            arrow1.className = 'flow-arrow-line done';

            stepTL.className = 'flow-step-pill flow-step-active';
            stepTL.innerHTML = '<i class="bi bi-compass-fill"></i> 2. Team Leader Review (Active 🔵)';

            stepHR.className = 'flow-step-pill flow-step-pending';
            arrow2.className = 'flow-arrow-line';

        } else if (activeStage === 'hr') {
            stepMgr.className = 'flow-step-pill flow-step-done';
            arrow1.className = 'flow-arrow-line done';

            stepTL.className = 'flow-step-pill flow-step-done';
            stepTL.innerHTML = '<i class="bi bi-check-circle-fill"></i> 2. Team Leader Review (Done)';
            arrow2.className = 'flow-arrow-line done';

            stepHR.className = 'flow-step-pill flow-step-active';
            stepHR.innerHTML = '<i class="bi bi-award-fill"></i> 3. HR Admin Final Signoff (Active 🔵)';

        } else if (activeStage === 'done') {
            stepMgr.className = 'flow-step-pill flow-step-done';
            stepTL.className = 'flow-step-pill flow-step-done';
            stepHR.className = 'flow-step-pill flow-step-done';
            stepDone.className = 'flow-step-pill flow-step-done';
            arrow1.className = 'flow-arrow-line done';
            arrow2.className = 'flow-arrow-line done';
            arrow3.className = 'flow-arrow-line done';
        }
    }

    // =========================================================================
    // 6. TOAST NOTIFICATION COMPONENT
    // =========================================================================
    function showAppToast(msg, isError = false) {
        const toast = document.getElementById('appToast');
        const msgSpan = document.getElementById('toastMsg');
        const icon = document.getElementById('toastIcon');

        if (!toast || !msgSpan) return;

        msgSpan.innerText = msg;
        if (isError) {
            toast.style.background = '#991b1b';
            icon.className = 'bi bi-shield-x text-warning fs-5';
        } else {
            toast.style.background = '#0f172a';
            icon.className = 'bi bi-check-circle-fill text-success fs-5';
        }

        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3800);
    }

    // =========================================================================
    // 7. UNIFIED EMPLOYEE REVIEW CREATOR (Popup Submission)
    // =========================================================================
    function createNewEmployeeReview() {
        const nameInput = document.getElementById('newEmpName');
        const roleInput = document.getElementById('newEmpRole');
        const deptSelect = document.getElementById('newEmpDept');
        const cycleSelect = document.getElementById('newEmpCycle');
        const mgrSelect = document.getElementById('newEmpMgr');
        const tlSelect = document.getElementById('newEmpTL');
        const hrSelect = document.getElementById('newEmpHR');
        const stageSelect = document.getElementById('newEmpStage');

        const name = nameInput ? nameInput.value.trim() : '';
        const role = roleInput ? roleInput.value.trim() : '';
        const dept = deptSelect ? deptSelect.value : 'Engineering';
        const cycle = cycleSelect ? cycleSelect.value : 'FY25-26 Annual 360° Review';
        const mgr = mgrSelect ? mgrSelect.value : 'Ravi Chandran (Manager)';
        const startingStage = stageSelect ? stageSelect.value : 'manager';

        if (!name || !role) {
            showAppToast('Please enter both Employee Full Name and Job Title.', true);
            return;
        }

        const uniqueId = 'card_emp_' + Date.now();
        const initials = name.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2) || 'EM';

        let stageBadgeHtml = '';
        let stepperHtml = '';
        let evaluatorName = mgr;

        if (startingStage === 'manager') {
            stageBadgeHtml = `<span class="role-badge role-badge-mgr card-role-tag"><i class="bi bi-person-badge-fill"></i> Stage 1: Manager Review</span>`;
            stepperHtml = `
                <div class="flow-step-item"><div class="flow-step-pill flow-step-active"><i class="bi bi-arrow-right-circle-fill"></i> 1. Mgr</div></div>
                <div class="flow-arrow-line"></div>
                <div class="flow-step-item"><div class="flow-step-pill flow-step-pending"><i class="bi bi-clock"></i> 2. TL</div></div>
                <div class="flow-arrow-line"></div>
                <div class="flow-step-item"><div class="flow-step-pill flow-step-pending"><i class="bi bi-clock"></i> 3. HR</div></div>
            `;
            evaluatorName = mgr;
        } else if (startingStage === 'tl') {
            stageBadgeHtml = `<span class="role-badge role-badge-tl card-role-tag"><i class="bi bi-compass-fill"></i> Stage 2: Team Leader (TL) Review</span>`;
            stepperHtml = `
                <div class="flow-step-item"><div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 1. Mgr</div></div>
                <div class="flow-arrow-line done"></div>
                <div class="flow-step-item"><div class="flow-step-pill flow-step-active"><i class="bi bi-arrow-right-circle-fill"></i> 2. TL</div></div>
                <div class="flow-arrow-line"></div>
                <div class="flow-step-item"><div class="flow-step-pill flow-step-pending"><i class="bi bi-clock"></i> 3. HR</div></div>
            `;
            evaluatorName = 'Karthik Raja (TL)';
        } else {
            stageBadgeHtml = `<span class="role-badge role-badge-hr card-role-tag"><i class="bi bi-award-fill"></i> Stage 3: HR Admin Review</span>`;
            stepperHtml = `
                <div class="flow-step-item"><div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 1. Mgr</div></div>
                <div class="flow-arrow-line done"></div>
                <div class="flow-step-item"><div class="flow-step-pill flow-step-done"><i class="bi bi-check-circle-fill"></i> 2. TL</div></div>
                <div class="flow-arrow-line done"></div>
                <div class="flow-step-item"><div class="flow-step-pill flow-step-active"><i class="bi bi-arrow-right-circle-fill"></i> 3. HR</div></div>
            `;
            evaluatorName = 'Divya Ramesh (HR Admin)';
        }

        const newCardHtml = `
            <div class="col-12 col-md-6 col-lg-4 review-card-item" data-status="pending" data-auth-role="${startingStage}" id="${uniqueId}">
                <div class="review-card h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            ${stageBadgeHtml}
                            <div class="d-flex align-items-center gap-1">
                                <span class="lock-overlay-tag"><i class="bi bi-lock-fill"></i> Locked</span>
                                <span class="badge bg-warning-subtle text-dark border border-warning card-status-badge">🟡 Active Review</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="rounded-circle border card-avatar d-grid place-items-center bg-success-subtle text-success fw-bold" style="width:48px; height:48px; font-size:18px;">${initials}</div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0">${name}</h6>
                                <div class="text-muted small">${role}</div>
                                <div class="text-secondary small" style="font-size:11px;">${dept}</div>
                            </div>
                        </div>

                        <div class="flow-stepper-wrap" style="font-size:9.5px;">
                            ${stepperHtml}
                        </div>

                        <div class="bg-light p-2 rounded-3 mb-3" style="font-size:12px;">
                            <div><strong>Cycle:</strong> ${cycle}</div>
                            <div class="text-muted"><strong>Due Date:</strong> 15 Apr 2026 (<span class="text-danger fw-bold">Newly Created</span>)</div>
                            <div class="text-secondary" style="font-size:11px;">Current Evaluator: <strong class="card-evaluator-name">${evaluatorName}</strong></div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm w-100 card-eval-btn" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" data-bs-toggle="modal" data-bs-target="#evaluationModal" onclick="setupEvaluationForm('${uniqueId}', '${name}', '${role}', 'Manager Review', 'Manager')">
                        <i class="bi bi-star me-1"></i> Start Feedback Evaluation
                    </button>
                </div>
            </div>
        `;

        const grid = document.getElementById('reviewCardsGrid');
        if (grid) {
            grid.insertAdjacentHTML('afterbegin', newCardHtml);
        }

        // Append new row to Tab 1 Feedback Cycles table
        const pgBody = document.getElementById('pgBody');
        if (pgBody) {
            const rowCount = pgBody.querySelectorAll('tr').length;
            const newRowHtml = `
                <tr data-status="pending" data-dept="${dept}" id="tr_${uniqueId}">
                    <td>${rowCount + 1}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle border d-grid place-items-center bg-success-subtle text-success fw-bold" style="width:34px; height:34px; font-size:13px;">${initials}</div>
                            <div>
                                <div class="fw-bold text-dark">${name}</div>
                                <div class="text-muted" style="font-size:11px;">${role}</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">${dept}</span></td>
                    <td class="fw-semibold">${cycle}</td>
                    <td class="fw-semibold text-secondary">--</td>
                    <td class="fw-semibold text-secondary">--</td>
                    <td class="fw-semibold text-secondary">--</td>
                    <td><span class="score-chip score-chip-pending"><i class="bi bi-hourglass-split me-1"></i>Pending</span></td>
                    <td><span class="status-capsule status-capsule-${startingStage === 'manager' ? 'mgr' : (startingStage === 'tl' ? 'tl' : 'hr')}"><i class="bi bi-clock-history me-1"></i> ${startingStage === 'manager' ? 'Stage 1: Mgr Review' : (startingStage === 'tl' ? 'Stage 2: TL Review' : 'Stage 3: HR Review')}</span></td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="alert('Reminder notification sent!')"><i class="bi bi-bell me-1"></i> Remind</button>
                    </td>
                </tr>
            `;
            pgBody.insertAdjacentHTML('beforeend', newRowHtml);
            filterTab1Table();
        }

        $('#createEmployeeReviewModal').modal('hide');

        switchTab('#tab-give');

        const roleBtn = document.querySelector(`#roleSwitcherWrap button[data-role="${startingStage}"]`);
        if (roleBtn) {
            switchEvaluatorRole(startingStage, roleBtn);
        } else {
            applyCardFilters();
        }

        showAppToast(`🎉 Review created for ${name}! Added under Stage 1: Manager Review list.`);
    }

    // =========================================================================
    // 8. TAB 1 DYNAMIC FILTER HANDLER (Status, Dept, Search)
    // =========================================================================
    let currentTab1Filter = 'all';

    function filterTab1Table(filter, btn) {
        if (filter) {
            currentTab1Filter = filter;
            document.querySelectorAll('#tab1FilterPillGroup .tab1-filter-pill').forEach(b => {
                b.classList.remove('active', 'btn-dark');
                b.classList.add('btn-outline-secondary');
            });
            if (btn) {
                btn.classList.add('active', 'btn-dark');
                btn.classList.remove('btn-outline-secondary');
            }
        }

        const selectedDept = document.getElementById('tab1DeptFilter') ? document.getElementById('tab1DeptFilter').value : 'all';
        const searchQuery = document.getElementById('tab1Search') ? document.getElementById('tab1Search').value.toLowerCase().trim() : '';

        const rows = document.querySelectorAll('#tab1EmployeeTable tbody tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const rowStatus = row.getAttribute('data-status');
            const rowDept = row.getAttribute('data-dept');
            const textContent = row.textContent.toLowerCase();

            let matchesStatus = (currentTab1Filter === 'all' || rowStatus === currentTab1Filter);
            let matchesDept = (selectedDept === 'all' || rowDept === selectedDept);
            let matchesSearch = (!searchQuery || textContent.includes(searchQuery));

            if (matchesStatus && matchesDept && matchesSearch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        const startEl = document.getElementById('pgStart');
        const endEl = document.getElementById('pgEnd');
        const totalEl = document.getElementById('pgTotal');
        if (startEl && endEl && totalEl) {
            startEl.innerText = visibleCount > 0 ? 1 : 0;
            endEl.innerText = visibleCount;
            totalEl.innerText = visibleCount;
        }
    }

    function updateTab1TableRow(empName, stage, mgrScore, tlScore, hrScore, overallScore) {
        if (!empName) return;
        const rows = document.querySelectorAll('#tab1EmployeeTable tbody tr');
        let targetRow = null;
        rows.forEach(row => {
            const nameEl = row.querySelector('.fw-bold.text-dark');
            if (nameEl && nameEl.innerText.trim().toLowerCase() === empName.trim().toLowerCase()) {
                targetRow = row;
            }
        });

        if (!targetRow) return;

        if (stage === 'tl') {
            targetRow.setAttribute('data-status', 'in_progress');
            const mgrCell = targetRow.cells[4];
            if (mgrCell) { mgrCell.className = 'fw-bold text-success'; mgrCell.innerText = mgrScore || '4.5'; }
            
            const statusCell = targetRow.cells[8];
            if (statusCell) statusCell.innerHTML = '<span class="status-capsule status-capsule-tl"><i class="bi bi-compass-fill me-1"></i> Stage 2: TL Review</span>';

        } else if (stage === 'hr') {
            targetRow.setAttribute('data-status', 'in_progress');
            const tlCell = targetRow.cells[5];
            if (tlCell) { tlCell.className = 'fw-bold text-primary'; tlCell.innerText = tlScore || '4.4'; }

            const statusCell = targetRow.cells[8];
            if (statusCell) statusCell.innerHTML = '<span class="status-capsule status-capsule-hr"><i class="bi bi-award-fill me-1"></i> Stage 3: HR Review</span>';

        } else if (stage === 'completed' || stage === 'published') {
            targetRow.setAttribute('data-status', 'completed');
            
            const mgrCell = targetRow.cells[4];
            if (mgrCell && (mgrCell.innerText.trim() === '--' || !mgrCell.innerText.trim())) { mgrCell.className = 'fw-bold text-success'; mgrCell.innerText = '4.5'; }
            
            const tlCell = targetRow.cells[5];
            if (tlCell && (tlCell.innerText.trim() === '--' || !tlCell.innerText.trim())) { tlCell.className = 'fw-bold text-primary'; tlCell.innerText = '4.4'; }

            const hrCell = targetRow.cells[6];
            if (hrCell) { hrCell.className = 'fw-bold text-dark'; hrCell.innerText = hrScore || '4.5'; }

            const overallCell = targetRow.cells[7];
            if (overallCell) {
                const scoreVal = overallScore ? parseFloat(overallScore) : 4.5;
                const chipClass = scoreVal >= 4.5 ? 'score-chip-high' : 'score-chip-good';
                overallCell.innerHTML = `<span class="score-chip ${chipClass}"><i class="bi bi-star-fill text-warning me-1"></i>${overallScore || '4.5 / 5.0'}</span>`;
            }

            const statusCell = targetRow.cells[8];
            if (statusCell) statusCell.innerHTML = '<span class="status-capsule status-capsule-completed"><i class="bi bi-check-circle-fill me-1"></i> Completed</span>';

            const actionCell = targetRow.cells[9];
            if (actionCell) {
                actionCell.className = 'text-end';
                actionCell.innerHTML = '<button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#viewReportModal"><i class="bi bi-file-earmark-text me-1"></i> Report</button>';
            }
        }

        filterTab1Table();
    }

    // =========================================================================
    // 9. INTERACTIVE STAR RATING HANDLER
    // =========================================================================
    function initStarRatings() {
        document.querySelectorAll('.interactive-stars').forEach(container => {
            const stars = container.querySelectorAll('.star-btn');
            const targetId = container.getAttribute('data-rating-target');
            const valSpan = document.getElementById(targetId + '_val');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const val = parseInt(this.getAttribute('data-val'));
                    stars.forEach((s, idx) => {
                        if (idx < val) s.classList.add('active');
                        else s.classList.remove('active');
                    });
                    if (valSpan) valSpan.innerText = val.toFixed(1) + ' / 5.0';
                });
            });
        });
    }

    // =========================================================================
    // 10. DYNAMIC REPORT POPULATOR HANDLER
    // =========================================================================
    function openReportForEmployee(empName, role, dept, overallScore, selfScore, mgrScore, peerScore, directScore, avatarUrl) {
        const nameEl = document.getElementById('repEmpName');
        const roleEl = document.getElementById('repEmpRole');
        const deptEl = document.getElementById('repEmpDept');
        const scoreEl = document.getElementById('repOverallScore');
        const avatarEl = document.getElementById('repEmpAvatar');
        const selfEl = document.getElementById('repSelfScore');
        const mgrEl = document.getElementById('repMgrScore');
        const peerEl = document.getElementById('repPeerScore');
        const directEl = document.getElementById('repDirectScore');

        if (nameEl) nameEl.innerText = empName || 'Arun Kumar';
        if (roleEl) roleEl.innerText = role || 'Senior Software Engineer';
        if (deptEl) deptEl.innerHTML = `<i class="bi bi-building me-1 text-success"></i> ${dept || 'Engineering'} Department • Core Platform & Architecture`;
        if (scoreEl) scoreEl.innerText = overallScore || '4.1';
        if (selfEl) selfEl.innerHTML = (selfScore || '4.2') + ' <span class="fs-6 text-muted font-sans font-normal">/ 5.0</span>';
        if (mgrEl) mgrEl.innerHTML = (mgrScore || '4.5') + ' <span class="fs-6 text-muted font-sans font-normal">/ 5.0</span>';
        if (peerEl) peerEl.innerHTML = (peerScore || '4.0') + ' <span class="fs-6 text-muted font-sans font-normal">/ 5.0</span>';
        if (directEl) directEl.innerHTML = (directScore || '3.8') + ' <span class="fs-6 text-muted font-sans font-normal">/ 5.0</span>';
        
        if (avatarEl && avatarUrl) {
            avatarEl.src = avatarUrl;
        }
    }

    // =========================================================================
    // 11. TAB 3 DYNAMIC REPORT SWITCHER & DEPARTMENT FILTER HANDLER
    // =========================================================================
    const tab3Data = {
        'arun': {
            name: 'Arun Kumar',
            role: 'Senior Software Engineer • Engineering Department',
            dept: 'Engineering',
            avatar: './assets/img/profile-1.jpg',
            score: '4.1',
            band: 'Exceeds Expectations',
            self: '4.2',
            mgr: '4.5',
            peers: '4.0',
            direct: '3.8',
            total: '4.1 / 5.0',
            matrix: [
                { comp: 'Communication & Clarity', self: '4.5', others: '4.1', gap: '-0.4 (Over-estimated)', gapClass: 'bg-warning-subtle text-dark border border-warning' },
                { comp: 'Teamwork & Collaboration', self: '4.0', others: '4.2', gap: '+0.2 (Hidden Strength)', gapClass: 'bg-success-subtle text-success border border-success-subtle' },
                { comp: 'Leadership & Ownership', self: '4.3', others: '3.7', gap: '-0.6 (Growth Area)', gapClass: 'bg-danger-subtle text-danger border border-danger-subtle' },
                { comp: 'Problem Solving & Speed', self: '4.4', others: '4.6', gap: '+0.2 (High Impact)', gapClass: 'bg-success-subtle text-success border border-success-subtle' }
            ]
        },
        'amelia': {
            name: 'Amelia Curr',
            role: 'Design Lead • UI/UX Design Department',
            dept: 'UI/UX Design',
            avatar: './assets/img/profile-2.jpg',
            score: '4.8',
            band: 'Outstanding Performer',
            self: '4.9',
            mgr: '4.8',
            peers: '4.7',
            direct: '4.8',
            total: '4.8 / 5.0',
            matrix: [
                { comp: 'Communication & Clarity', self: '4.9', others: '4.8', gap: '+0.1 (Aligned)', gapClass: 'bg-primary-subtle text-primary border border-primary-subtle' },
                { comp: 'Teamwork & Collaboration', self: '4.8', others: '4.9', gap: '+0.1 (High Impact)', gapClass: 'bg-success-subtle text-success border border-success-subtle' },
                { comp: 'Leadership & Ownership', self: '5.0', others: '4.7', gap: '+0.3 (Over-estimated)', gapClass: 'bg-warning-subtle text-dark border border-warning' },
                { comp: 'Problem Solving & Speed', self: '4.9', others: '4.8', gap: '+0.1 (High Impact)', gapClass: 'bg-success-subtle text-success border border-success-subtle' }
            ]
        },
        'sanjay': {
            name: 'Sanjay V',
            role: 'Associate Software Engineer • Engineering Department',
            dept: 'Engineering',
            avatar: './assets/img/profile-3.jpg',
            score: '4.5',
            band: 'Exceeds Expectations',
            self: '4.6',
            mgr: '4.4',
            peers: '4.5',
            direct: '4.4',
            total: '4.5 / 5.0',
            matrix: [
                { comp: 'Communication & Clarity', self: '4.5', others: '4.4', gap: '+0.1 (Aligned)', gapClass: 'bg-primary-subtle text-primary border border-primary-subtle' },
                { comp: 'Teamwork & Collaboration', self: '4.7', others: '4.6', gap: '+0.1 (High Impact)', gapClass: 'bg-success-subtle text-success border border-success-subtle' },
                { comp: 'Leadership & Ownership', self: '4.2', others: '4.3', gap: '+0.1 (Hidden Strength)', gapClass: 'bg-success-subtle text-success border border-success-subtle' },
                { comp: 'Problem Solving & Speed', self: '4.8', others: '4.7', gap: '+0.1 (High Impact)', gapClass: 'bg-success-subtle text-success border border-success-subtle' }
            ]
        },
        'daniel': {
            name: 'Daniel Martinez',
            role: 'DevOps & Cloud Lead • Infrastructure Department',
            dept: 'Infrastructure',
            avatar: './assets/img/profile-2.jpg',
            score: '4.65',
            band: 'Outstanding Performer',
            self: '4.8',
            mgr: '4.7',
            peers: '4.5',
            direct: '4.6',
            total: '4.65 / 5.0',
            matrix: [
                { comp: 'Communication & Clarity', self: '4.7', others: '4.6', gap: '+0.1 (Aligned)', gapClass: 'bg-primary-subtle text-primary border border-primary-subtle' },
                { comp: 'Teamwork & Collaboration', self: '4.8', others: '4.7', gap: '+0.1 (High Impact)', gapClass: 'bg-success-subtle text-success border border-success-subtle' },
                { comp: 'Leadership & Ownership', self: '4.9', others: '4.5', gap: '+0.4 (Over-estimated)', gapClass: 'bg-warning-subtle text-dark border border-warning' },
                { comp: 'Problem Solving & Speed', self: '4.8', others: '4.8', gap: '0.0 (Perfect Alignment)', gapClass: 'bg-success-subtle text-success border border-success-subtle' }
            ]
        },
        'priya': {
            name: 'Priya Sharma',
            role: 'Frontend Developer • UI/UX Design Department',
            dept: 'UI/UX Design',
            avatar: './assets/img/profile-3.jpg',
            score: '4.1',
            band: 'Meets Expectations',
            self: '4.2',
            mgr: '4.0',
            peers: '3.9',
            direct: '4.1',
            total: '4.1 / 5.0',
            matrix: [
                { comp: 'Communication & Clarity', self: '4.3', others: '4.0', gap: '-0.3 (Over-estimated)', gapClass: 'bg-warning-subtle text-dark border border-warning' },
                { comp: 'Teamwork & Collaboration', self: '4.1', others: '4.2', gap: '+0.1 (Hidden Strength)', gapClass: 'bg-success-subtle text-success border border-success-subtle' },
                { comp: 'Leadership & Ownership', self: '4.0', others: '3.8', gap: '-0.2 (Growth Area)', gapClass: 'bg-danger-subtle text-danger border border-danger-subtle' },
                { comp: 'Problem Solving & Speed', self: '4.4', others: '4.3', gap: '+0.1 (High Impact)', gapClass: 'bg-success-subtle text-success border border-success-subtle' }
            ]
        }
    };

    function switchTab3EmployeeReport(key) {
        const data = tab3Data[key] || tab3Data['arun'];
        
        const nameEl = document.getElementById('tab3HeroName');
        const roleEl = document.getElementById('tab3HeroRoleDept');
        const avatarEl = document.getElementById('tab3HeroAvatar');
        const scoreEl = document.getElementById('tab3HeroScore');
        const bandEl = document.getElementById('tab3HeroBand');

        if (nameEl) nameEl.innerText = data.name;
        if (roleEl) roleEl.innerText = data.role;
        if (avatarEl) avatarEl.src = data.avatar;
        if (scoreEl) scoreEl.innerText = data.score;
        if (bandEl) bandEl.innerText = data.band;
        
        const srcSelf = document.getElementById('tab3SrcSelf');
        const srcMgr = document.getElementById('tab3SrcMgr');
        const srcPeers = document.getElementById('tab3SrcPeers');
        const srcDirect = document.getElementById('tab3SrcDirect');
        const srcTotal = document.getElementById('tab3SrcTotal');

        if (srcSelf) srcSelf.innerText = data.self;
        if (srcMgr) srcMgr.innerText = data.mgr;
        if (srcPeers) srcPeers.innerText = data.peers;
        if (srcDirect) srcDirect.innerText = data.direct;
        if (srcTotal) srcTotal.innerText = data.total;

        const tbody = document.getElementById('tab3MatrixBody');
        if (tbody && data.matrix) {
            tbody.innerHTML = data.matrix.map(m => `
                <tr>
                    <td class="fw-semibold">${m.comp}</td>
                    <td class="text-center fw-bold">${m.self}</td>
                    <td class="text-center fw-bold text-primary">${m.others}</td>
                    <td class="text-center"><span class="badge ${m.gapClass}">${m.gap}</span></td>
                </tr>
            `).join('');
        }
    }

    function filterTab3Department() {
        const deptFilter = document.getElementById('tab3DeptFilter');
        const empSelect = document.getElementById('tab3EmpSelect');
        if (!deptFilter || !empSelect) return;

        const selectedDept = deptFilter.value;
        let firstMatchKey = null;

        Array.from(empSelect.options).forEach(opt => {
            const optDept = opt.getAttribute('data-dept');
            if (selectedDept === 'all' || optDept === selectedDept) {
                opt.style.display = '';
                if (!firstMatchKey) firstMatchKey = opt.value;
            } else {
                opt.style.display = 'none';
            }
        });

        if (firstMatchKey) {
            empSelect.value = firstMatchKey;
            switchTab3EmployeeReport(firstMatchKey);
        }

        // Also filter the results table below
        const tableRows = document.querySelectorAll('#pgBodyResults tr');
        tableRows.forEach(row => {
            const text = row.textContent;
            if (selectedDept === 'all' || text.includes(selectedDept)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function addEmployeeToMyFeedbackReport(empName, empRole, empDept) {
        if (!empName) return;
        const empSelect = document.getElementById('tab3EmpSelect');
        if (!empSelect) return;

        const key = empName.toLowerCase().replace(/[^a-z0-9]/g, '');
        const dept = empDept || 'Engineering';
        const role = empRole || 'Software Engineer';

        // Check if option already exists
        let existingOpt = empSelect.querySelector(`option[value="${key}"]`);
        if (!existingOpt) {
            const newOpt = document.createElement('option');
            newOpt.value = key;
            newOpt.setAttribute('data-dept', dept);
            newOpt.innerText = `${empName} (${role})`;
            empSelect.appendChild(newOpt);
            existingOpt = newOpt;
        }

        existingOpt.selected = true;

        // Add entry to tab3Data if not present
        if (!tab3Data[key]) {
            tab3Data[key] = {
                name: empName,
                role: `${role} • ${dept} Department`,
                dept: dept,
                avatar: './assets/img/profile-1.jpg',
                score: '4.5',
                band: 'Exceeds Expectations (HR Signed)',
                self: '4.6',
                mgr: '4.5',
                peers: '4.4',
                direct: '4.3',
                total: '4.5 / 5.0',
                matrix: [
                    { comp: 'Communication & Clarity', self: '4.6', others: '4.5', gap: '+0.1 (Aligned)', gapClass: 'bg-primary-subtle text-primary border border-primary-subtle' },
                    { comp: 'Teamwork & Collaboration', self: '4.7', others: '4.6', gap: '+0.1 (High Impact)', gapClass: 'bg-success-subtle text-success border border-success-subtle' },
                    { comp: 'Leadership & Ownership', self: '4.4', others: '4.3', gap: '+0.1 (Hidden Strength)', gapClass: 'bg-success-subtle text-success border border-success-subtle' },
                    { comp: 'Problem Solving & Speed', self: '4.8', others: '4.7', gap: '+0.1 (High Impact)', gapClass: 'bg-success-subtle text-success border border-success-subtle' }
                ]
            };
        }

        // Select the newly published employee and show their report live
        empSelect.value = key;
        switchTab3EmployeeReport(key);
    }

    // Initialize all components on DOM ready
    document.addEventListener('DOMContentLoaded', function() {
        init360StageTabs();
        initStarRatings();

        document.addEventListener('click', function(e) {
            const btn = e.target.closest('[data-bs-target="#viewReportModal"]');
            if (!btn) return;
            const row = btn.closest('tr');
            if (row) {
                const nameText = row.querySelector('.fw-bold.text-dark') ? row.querySelector('.fw-bold.text-dark').innerText.trim() : '';
                const roleText = row.querySelector('.text-muted') ? row.querySelector('.text-muted').innerText.trim() : '';
                const deptText = row.getAttribute('data-dept') || (row.children[2] ? row.children[2].innerText.trim() : 'Engineering');
                const img = row.querySelector('img');
                const avatarUrl = img ? img.src : null;
                
                let selfS = '4.2', mgrS = '4.5', peerS = '4.0', dirS = '3.8', overallS = '4.1';
                const cols = row.querySelectorAll('td');
                if (cols.length >= 8) {
                    selfS = cols[4] ? cols[4].innerText.trim() : '4.2';
                    mgrS = cols[5] ? cols[5].innerText.trim() : '4.5';
                    peerS = cols[6] ? cols[6].innerText.trim() : '4.0';
                    const scoreBadge = row.querySelector('.fs-6.fw-bold, .badge');
                    if (scoreBadge) {
                        const raw = scoreBadge.innerText.replace('/ 5.0', '').replace('🟢', '').replace('🟡', '').trim();
                        if (parseFloat(raw)) overallS = parseFloat(raw).toFixed(1);
                    }
                }
                openReportForEmployee(nameText, roleText, deptText, overallS, selfS, mgrS, peerS, dirS, avatarUrl);
            }
        });

        const mgrBtn = document.querySelector('#roleSwitcherWrap button[data-role="manager"]');
        if (mgrBtn) {
            switchEvaluatorRole('manager', mgrBtn);
        } else {
            applyCardFilters();
        }
    });
