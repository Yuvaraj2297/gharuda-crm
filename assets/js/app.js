(function () {
    const railBtns = document.querySelectorAll('.rail-btn[data-panel-target], .rail-avatar[data-panel-target]');
    const sidePanel = document.getElementById('sidePanel');

    // If the side panel container is missing, rail button click handlers cannot
    // open it. Guard the whole rail/panel setup so button clicks do not throw
    // and other app behavior keeps working.
    if (!sidePanel) {
        console.warn('sidePanel (#sidePanel) missing; side rail button click handler disabled.');
        return;
    }

    const sbBackdrop = document.getElementById('sbBackdrop');
    const topbarToggle = document.querySelector('.sbToggle');
    const panelSections = document.querySelectorAll('.panel-section');
    const profileMenu = document.querySelector('.profile-menu');
    const profileMenuTrigger = document.getElementById('profileMenuTrigger');
    const profileMenuDropdown = document.getElementById('profileMenuDropdown');
    const quickCheckInBtn = document.getElementById('quickCheckInBtn');
    const quickCheckOutBtn = document.getElementById('quickCheckOutBtn');
    const quickBreakOutBtn = document.getElementById('quickBreakOutBtn');
    const quickBreakInBtn = document.getElementById('quickBreakInBtn');
    const quickLunchOutBtn = document.getElementById('quickLunchOutBtn');
    const quickLunchInBtn = document.getElementById('quickLunchInBtn');
    let lunchCompleted = false;

    function getAttendanceTime() {
        return new Date().toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit'
        });
    }

    function showAttendanceModal(action, time) {
        const existingModal = document.querySelector('.attendance-modal-backdrop');
        if (existingModal) existingModal.remove();
        const isCheckout = action === 'Check-out';
        const isBreak = action.indexOf('Break-') === 0;
        const isLunch = action.indexOf('Lunch-') === 0;
        const backdrop = document.createElement('div');
        backdrop.className = 'attendance-modal-backdrop';
        backdrop.innerHTML = `
                <div class="attendance-modal${isCheckout ? ' is-checkout' : ''}${isBreak ? ' is-break' : ''}${isLunch ? ' is-lunch' : ''}" role="dialog" aria-modal="true" aria-labelledby="attendanceModalTitle">
                    <button type="button" class="attendance-modal-close" aria-label="Close confirmation">&times;</button>
                    <div class="attendance-modal-status-icon">
                        <i class="mdi ${isCheckout ? 'mdi-clock-outline' : (isLunch ? 'mdi-silverware-fork-knife' : (isBreak ? 'mdi-coffee-outline' : 'mdi-clock-check-outline'))}"></i>
                    </div>
                    <span class="attendance-modal-kicker">ATTENDANCE UPDATED</span>
                    <h3 id="attendanceModalTitle">${action} successful</h3>
                    <p>Your attendance has been recorded successfully.</p>
                    <div class="attendance-modal-time">
                        <i class="mdi mdi-clock-outline"></i>
                        <span>${time}</span>
                    </div>
                    <button type="button" class="attendance-modal-done">Done</button>
                </div>`;
        document.body.appendChild(backdrop);

        const closeModal = function () { backdrop.remove(); };
        backdrop.querySelector('.attendance-modal-close').addEventListener('click', closeModal);
        backdrop.querySelector('.attendance-modal-done').addEventListener('click', closeModal);
        backdrop.addEventListener('click', function (event) {
            if (event.target === backdrop) closeModal();
        });
    }

    if (quickCheckInBtn && quickCheckOutBtn) {
        quickCheckInBtn.addEventListener('click', function () {
            const time = getAttendanceTime();
            quickCheckInBtn.hidden = true;
            quickCheckOutBtn.hidden = false;
            quickBreakOutBtn.hidden = false;
            quickLunchOutBtn.hidden = true;
            quickLunchInBtn.hidden = true;
            lunchCompleted = false;
            showAttendanceModal('Check-in', time);
        });

        quickCheckOutBtn.addEventListener('click', function () {
            const time = getAttendanceTime();
            quickCheckOutBtn.disabled = true;
            quickBreakOutBtn.hidden = true;
            quickBreakInBtn.hidden = true;
            quickLunchOutBtn.hidden = true;
            quickLunchInBtn.hidden = true;
            quickBreakOutBtn.disabled = true;
            quickBreakInBtn.disabled = true;
            quickLunchOutBtn.disabled = true;
            quickLunchInBtn.disabled = true;
            quickCheckOutBtn.title = 'Attendance completed';
            showAttendanceModal('Check-out', time);
        });

        quickBreakOutBtn.addEventListener('click', function () {
            const time = getAttendanceTime();
            quickBreakOutBtn.hidden = true;
            quickBreakInBtn.hidden = false;
            showAttendanceModal('Break-out', time);
        });

        quickBreakInBtn.addEventListener('click', function () {
            const time = getAttendanceTime();
            quickBreakInBtn.hidden = true;
            if (lunchCompleted) {
                showAttendanceModal('Break-in', time);
                quickBreakOutBtn.hidden = true;
            } else {
                quickLunchOutBtn.hidden = false;
                showAttendanceModal('Break-in', time);
            }
        });

        quickLunchOutBtn.addEventListener('click', function () {
            const time = getAttendanceTime();
            quickLunchOutBtn.hidden = true;
            quickLunchInBtn.hidden = false;
            showAttendanceModal('Lunch-out', time);
        });

        quickLunchInBtn.addEventListener('click', function () {
            const time = getAttendanceTime();
            quickLunchInBtn.hidden = true;
            quickBreakOutBtn.hidden = false;
            lunchCompleted = true;
            showAttendanceModal('Lunch-in', time);
        });
    }

    function positionProfileMenu() {
        if (!profileMenuDropdown.classList.contains('open')) return;
        const triggerRect = profileMenuTrigger.getBoundingClientRect();
        const dropdownWidth = profileMenuDropdown.offsetWidth || 210;
        const dropdownHeight = profileMenuDropdown.offsetHeight || 150;

        // Position to the right of trigger, aligned to top
        let left = triggerRect.right - dropdownWidth;
        let top = triggerRect.bottom + 8;

        // Keep within viewport horizontally
        left = Math.max(8, Math.min(left, window.innerWidth - dropdownWidth - 8));

        // If dropdown goes below viewport, show above trigger
        if (top + dropdownHeight > window.innerHeight - 8) {
            top = triggerRect.top - dropdownHeight - 8;
        }

        // Ensure top doesn't go above viewport
        top = Math.max(8, top);

        profileMenuDropdown.style.left = left + 'px';
        profileMenuDropdown.style.top = top + 'px';
    }

    if (profileMenu && profileMenuTrigger && profileMenuDropdown) {
        profileMenuTrigger.addEventListener('click', function () {
            const isOpen = profileMenuDropdown.classList.toggle('open');
            profileMenuTrigger.setAttribute('aria-expanded', String(isOpen));
            if (isOpen) positionProfileMenu();
        });

        document.addEventListener('click', function (event) {
            if (!profileMenu.contains(event.target)) {
                profileMenuDropdown.classList.remove('open');
                profileMenuTrigger.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Common action dropdowns use the same open state as the header avatar menu.
    function closeAppDropdown(dropdown) {
        if (!dropdown) return;
        dropdown.classList.remove('open');
        const trigger = dropdown.parentElement?.querySelector('[data-app-dropdown-trigger]');
        if (trigger) trigger.setAttribute('aria-expanded', 'false');
    }

    function positionAppDropdown(trigger, dropdown) {
        if (!dropdown.classList.contains('open')) return;
        const triggerRect = trigger.getBoundingClientRect();
        const dropdownWidth = dropdown.offsetWidth || 150;
        const dropdownHeight = dropdown.offsetHeight || 80;
        const left = Math.min(triggerRect.right - dropdownWidth, window.innerWidth - dropdownWidth - 8);
        let top = triggerRect.bottom + 6;
        if (top + dropdownHeight > window.innerHeight - 8) top = triggerRect.top - dropdownHeight - 6;
        dropdown.style.left = Math.max(8, left) + 'px';
        dropdown.style.top = Math.max(8, top) + 'px';
    }

    // Event delegation: works for dynamically created elements (e.g. MasterTable rows)
    document.addEventListener('click', function (e) {
        // Toggle: click on [data-app-dropdown-trigger]
        const trigger = e.target.closest('[data-app-dropdown-trigger]');
        if (trigger) {
            e.preventDefault();
            e.stopPropagation();
            const dropdown = trigger.parentElement.querySelector('[data-app-dropdown-menu]');
            if (!dropdown) return;
            // Close all other open dropdowns
            document.querySelectorAll('[data-app-dropdown-menu].open').forEach(function (od) {
                if (od !== dropdown) closeAppDropdown(od);
            });
            const isOpen = dropdown.classList.toggle('open');
            trigger.setAttribute('aria-expanded', String(isOpen));
            positionAppDropdown(trigger, dropdown);
            return;
        }
        // Close all open dropdowns on outside click
        document.querySelectorAll('[data-app-dropdown-menu].open').forEach(function (od) {
            closeAppDropdown(od);
        });
    });

    // Reposition open dropdowns on resize/scroll
    window.addEventListener('resize', function () {
        document.querySelectorAll('[data-app-dropdown-menu].open').forEach(function (dropdown) {
            const trigger = dropdown.parentElement.querySelector('[data-app-dropdown-trigger]');
            if (trigger) positionAppDropdown(trigger, dropdown);
        });
        // Reposition profile menu dropdown
        if (profileMenuDropdown && profileMenuDropdown.classList.contains('open')) {
            positionProfileMenu();
        }
    });
    window.addEventListener('scroll', function () {
        document.querySelectorAll('[data-app-dropdown-menu].open').forEach(function (dropdown) {
            const trigger = dropdown.parentElement.querySelector('[data-app-dropdown-trigger]');
            if (trigger) positionAppDropdown(trigger, dropdown);
        });
        // Reposition profile menu dropdown
        if (profileMenuDropdown && profileMenuDropdown.classList.contains('open')) {
            positionProfileMenu();
        }
    }, true);

    // indicator elements + rail container ref
    const railIndicator = document.getElementById('railIndicator');
    const panelIndicator = document.getElementById('panelIndicator');
    const iconRail = document.querySelector('.icon-rail');

    // remembers whichever section was last shown, so the plain
    // topbar show/hide toggle can reopen the same view untouched
    let currentPanelTarget = null;
    let indicatorUpdateTimer = null;

    // Show ONLY the clicked group's nav-labels inside the panel — every
    // other group is hidden, so clicking a rail icon swaps the content
    // instead of stacking every section together.
    function showOnlySection(target) {
        if (!target) return;
        currentPanelTarget = target;
        panelSections.forEach(sec => {
            const secPanel = sec.dataset.panel;
            const isMatch = (secPanel === target) ||
                (target === 'account' && secPanel === 'Settings');
            if (isMatch) {
                sec.style.display = '';
                sec.classList.add('highlight');
            } else {
                sec.style.display = 'none';
                sec.classList.remove('highlight');
            }
        });
    }

    // moves both the rail-side and panel-side indicator lines to sit
    // right beside the currently active rail button, so they read as
    // one continuous border touching both the rail and the panel
    function updateIndicators(btn) {
        if (!btn || !railIndicator || !iconRail || !isPanelOpen()) return;

        const btnRect = btn.getBoundingClientRect();
        const railRect = iconRail.getBoundingClientRect();

        const topInRail = btnRect.top - railRect.top + (btnRect.height / 2) - 1;

        railIndicator.style.top = topInRail + 'px';
        railIndicator.classList.add('show');

        if (panelIndicator && sidePanel) {
            const panelRect = sidePanel.getBoundingClientRect();
            const topInPanel = btnRect.top - panelRect.top;
            panelIndicator.style.top = topInPanel + 'px';
            panelIndicator.style.height = btnRect.height + 'px';
            panelIndicator.classList.add('show');
        }
    }

    function hideIndicators() {
        railIndicator?.classList.remove('show');
        panelIndicator?.classList.remove('show');
    }

    function setActiveRail(btn) {
        document.querySelectorAll('.rail-btn').forEach(b => b.classList.remove('active-rail'));
        if (btn && btn.classList.contains('rail-btn')) {
            btn.classList.add('active-rail');
            // wait a frame so layout/panel-open transition settles before measuring
            requestAnimationFrame(() => updateIndicators(btn));
        }
    }

    function isPanelOpen() {
        return sidePanel.classList.contains('open');
    }

    // Rail icon click: pick this icon's group, show it exclusively,
    // and open the panel.
    function openPanelForTarget(target, btn) {
        showOnlySection(target);
        setActiveRail(btn);
        sidePanel.classList.add('open');
        document.body.classList.add('panel-open');
        // update again after the width transition finishes (panel width animates)
        clearTimeout(indicatorUpdateTimer);
        indicatorUpdateTimer = setTimeout(() => updateIndicators(btn), 340);
    }

    // Plain show/hide toggle — used by the topbar icon. It never swaps
    // the icon itself and never changes which section/rail-icon is
    // active; it only opens or closes the panel with whatever content
    // was already selected (falls back to the current active page's
    // group the very first time).
    function togglePanelVisibility() {
        if (isPanelOpen()) {
            clearTimeout(indicatorUpdateTimer);
            indicatorUpdateTimer = null;
            sidePanel.classList.remove('open');
            document.body.classList.remove('panel-open');
            hideIndicators();
            return;
        }
        if (!currentPanelTarget) {
            showOnlySection(defaultPanelTarget());
        }
        sidePanel.classList.add('open');
        document.body.classList.add('panel-open');
        const activeBtn = document.querySelector('.rail-btn.active-rail');
        if (activeBtn) {
            requestAnimationFrame(() => updateIndicators(activeBtn));
            clearTimeout(indicatorUpdateTimer);
            indicatorUpdateTimer = setTimeout(() => updateIndicators(activeBtn), 340);
        }
    }

    function defaultPanelTarget() {
        const activeSection = document.querySelector('.panel-section .nav-link-custom.active')?.closest('.panel-section');
        if (activeSection && activeSection.dataset.panel) return activeSection.dataset.panel;
        const curPage = window.location.pathname.split('/').pop().toLowerCase().split('?')[0] || '';
        if (curPage === 'dashboard.php' || curPage === 'index.php' || !curPage) {
            return 'dashboard';
        }
        return '';
    }

    function closePanel() {
        clearTimeout(indicatorUpdateTimer);
        indicatorUpdateTimer = null;
        sidePanel.classList.remove('open');
        document.body.classList.remove('panel-open');
        hideIndicators();
    }

    railBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.dataset.panelTarget;
            const alreadyActiveOpen = isPanelOpen() && btn.classList.contains('active-rail');
            if (alreadyActiveOpen) {
                closePanel();
            } else {
                openPanelForTarget(target, btn);
            }
        });
    });

    // topbar icon: fixed icon, only hides/shows the sidebar panel
    if (topbarToggle) {
        topbarToggle.addEventListener('click', togglePanelVisibility);
    }

    sbBackdrop.addEventListener('click', closePanel);

    // .org-toggle-btn தவிர்க்கப்பட்டது (Mobile View Fix)
    document.querySelectorAll('.side-panel .nav-link-custom:not(.org-toggle-btn)').forEach(link => {
        link.addEventListener('click', () => {
            if (window.matchMedia('(max-width: 991px)').matches) closePanel();
        });
    });

    // keep indicators aligned if the rail icons themselves scroll,
    // or the window resizes while the panel is open
    document.querySelector('.icon-rail-scroll')?.addEventListener('scroll', () => {
        const activeBtn = document.querySelector('.rail-btn.active-rail');
        if (activeBtn && isPanelOpen()) updateIndicators(activeBtn);
    });

    window.addEventListener('resize', () => {
        const activeBtn = document.querySelector('.rail-btn.active-rail');
        if (activeBtn && isPanelOpen()) updateIndicators(activeBtn);
    });

    // ================================================================
    // ON LOAD FIX: Active Rail & Panel Sync
    // ================================================================
    let activeRailBtn = document.querySelector('.rail-btn.active-rail');
    let initialTarget = activeRailBtn ? activeRailBtn.dataset.panelTarget : defaultPanelTarget();

    if (!activeRailBtn && initialTarget) {
        activeRailBtn = document.querySelector(`.rail-btn[data-panel-target="${initialTarget}"]`);
        if (activeRailBtn) activeRailBtn.classList.add('active-rail');
    }

    // பொருத்தமான Panel பகுதி மட்டுமே காட்டப்படும்
    if (initialTarget) {
        showOnlySection(initialTarget);
    }

    // Panel ஏற்கனவே Open-ஆக இருந்தால் indicators-ஐ Update செய்யவும்
    if (activeRailBtn && isPanelOpen()) {
        requestAnimationFrame(() => updateIndicators(activeRailBtn));
    }
})();

// ================================================================
// Common profile-menu dropdown toggle (used by payroll, leave-report,
// check-in-check-out, payslip, organization-policy, etc.)
// ================================================================
window.toggleActionMenu = function(btn) {
    var dd = btn.nextElementSibling;
    if (!dd) return;
    // Close all other open dropdowns
    document.querySelectorAll('.action-dropdown-open').forEach(function(d) {
        if (d !== dd) { d.style.display = 'none'; d.classList.remove('action-dropdown-open'); }
    });
    if (dd.classList.contains('action-dropdown-open')) {
        dd.style.display = 'none';
        dd.classList.remove('action-dropdown-open');
        btn.setAttribute('aria-expanded', 'false');
        // Return teleported dropdown to its original location in the DOM
        if (dd._teleportedHome) {
            dd.parentNode.removeChild(dd);
            if (dd._homeParent) dd._homeParent.appendChild(dd);
            dd._teleportedHome = false;
            dd._homeParent = null;
        }
        return;
    }
    // Teleport dropdown to <body> so it escapes any table/card stacking context and z-index limits
    if (!dd._teleportedHome) {
        dd._homeParent = dd.parentNode;
        dd.parentNode.removeChild(dd);
        document.body.appendChild(dd);
        dd._teleportedHome = true;
    }
    // Measure dropdown dimensions off-screen first
    dd.style.cssText = 'display:flex !important;flex-direction:column;position:fixed;z-index:1200;width:180px;padding:8px;background:var(--bg-card);border:1px solid var(--border-soft);border-radius:12px;box-shadow:0 14px 32px rgba(20,30,25,.14);opacity:0;visibility:hidden;pointer-events:none;left:-9999px;top:0;';
    var ddH = dd.offsetHeight, ddW = dd.offsetWidth || 180;
    var r = btn.getBoundingClientRect();
    var gap = 4, vw = window.innerWidth, vh = window.innerHeight;
    // Horizontal: align right edge of dropdown with right edge of button
    var left = r.right - ddW;
    if (left < 8) left = 8;
    if (left + ddW > vw - 8) left = vw - ddW - 8;
    // Vertical: prefer below, flip above if not enough space
    var top = r.bottom + gap;
    if (top + ddH > vh - 8) top = r.top - ddH - gap;
    if (top < 8) top = 8;
    dd.style.cssText = 'display:flex !important;flex-direction:column;position:fixed;z-index:1200;width:' + ddW + 'px;padding:8px;background:var(--bg-card);border:1px solid var(--border-soft);border-radius:12px;box-shadow:0 14px 32px rgba(20,30,25,.14);opacity:1;visibility:visible;transform:translateY(0);transition:opacity .16s,transform .16s,visibility .16s;left:' + left + 'px;top:' + top + 'px;';
    dd.classList.add('action-dropdown-open');
    btn.setAttribute('aria-expanded', 'true');
};

// Close profile-menu dropdowns on outside click or scroll
function closeAllActionDropdowns() {
    document.querySelectorAll('.action-dropdown-open').forEach(function(d) {
        d.style.display = 'none';
        d.classList.remove('action-dropdown-open');
        var trigger = d.previousElementSibling;
        if (trigger) trigger.setAttribute('aria-expanded', 'false');
        // Return teleported dropdown to its original location in the DOM
        if (d._teleportedHome) {
            d.parentNode.removeChild(d);
            if (d._homeParent) d._homeParent.appendChild(d);
            d._teleportedHome = false;
            d._homeParent = null;
        }
    });
}

document.addEventListener('click', function(e) {
    if (!e.target.closest('.profile-menu')) {
        closeAllActionDropdowns();
    }
});

document.addEventListener('scroll', function(e) {
    closeAllActionDropdowns();
}, true);

window.addEventListener('resize', function() {
    closeAllActionDropdowns();
});

// ================================================================
// Single Instance Toggle Fix for Submenus (Bootstrap Conflict Prevented)
// ================================================================
document.addEventListener('DOMContentLoaded', function () {
    // 1. Ensure active sublinks expand parent collapse on load
    const activeSubLink = document.querySelector('.side-panel .collapse .nav-link-custom.active');
    if (activeSubLink) {
        const parentCollapse = activeSubLink.closest('.collapse');
        if (parentCollapse) {
            parentCollapse.classList.add('show');
            const parentToggle = document.querySelector(`[href="#${parentCollapse.id}"], [data-bs-target="#${parentCollapse.id}"]`);
            if (parentToggle) {
                parentToggle.setAttribute('aria-expanded', 'true');
                parentToggle.classList.remove('collapsed');
            }
        }
    }

    // 2. Delegate click event with event propagation prevention
    document.addEventListener('click', function (e) {
        const toggleBtn = e.target.closest('.org-toggle-btn');
        if (!toggleBtn) return;

        // Prevent Bootstrap JS / standard link actions from double-triggering
        e.preventDefault();
        e.stopPropagation();

        const targetId = toggleBtn.getAttribute('href') || toggleBtn.getAttribute('data-bs-target');
        if (!targetId || targetId === '#') return;

        const targetMenu = document.querySelector(targetId);
        if (!targetMenu) return;

        // Bootstrap Collapse JS-ஐ பயன்படுத்தி சீராக இயக்கவும் (Bootstrap இருந்தால்)
        if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
            let bsCollapse = bootstrap.Collapse.getInstance(targetMenu);
            if (!bsCollapse) {
                bsCollapse = new bootstrap.Collapse(targetMenu, { toggle: false });
            }
            bsCollapse.toggle();
        } else {
            // Manual Fallback Toggle
            const isOpen = targetMenu.classList.contains('show');
            if (isOpen) {
                toggleBtn.setAttribute('aria-expanded', 'false');
                toggleBtn.classList.add('collapsed');
                targetMenu.classList.remove('show');
            } else {
                toggleBtn.setAttribute('aria-expanded', 'true');
                toggleBtn.classList.remove('collapsed');
                targetMenu.classList.add('show');
            }
        }
    });
});