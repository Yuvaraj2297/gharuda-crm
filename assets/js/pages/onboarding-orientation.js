/**
 * Gharuda CRM - Onboarding Orientation Page Script
 * File: assets/js/pages/onboarding-orientation.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
window.attendanceRowMatches = function(row) {
    if (!row || !row.getAttribute) return true;

    const rowStatus = (row.getAttribute('data-status') || '').trim();
    const rowConducted = (row.getAttribute('data-conducted') || '').trim();
    const rowProgram = (row.getAttribute('data-program') || '').trim();
    const rowAtt = (row.getAttribute('data-attendance') || '').trim();
    const rowDept = (row.getAttribute('data-dept') || '').trim();
    const rowNotified = (row.getAttribute('data-notified') || '').trim();

    // 1. Stage filter
    const filterWorkflowStage = document.getElementById('filterWorkflowStage');
    if (filterWorkflowStage && filterWorkflowStage.value !== 'all') {
        const selectedStage = filterWorkflowStage.value;
        if (selectedStage === 'Scheduled' && rowStatus !== 'Scheduled') return false;
        if (selectedStage === 'Notified' && rowNotified !== 'Yes') return false;
        if (selectedStage === 'Conducted' && rowConducted !== 'Yes') return false;
        if (selectedStage === 'Completed' && rowStatus !== 'Completed') return false;
    }

    // 2. Program module filter
    const filterModuleCategory = document.getElementById('filterModuleCategory');
    if (filterModuleCategory && filterModuleCategory.value !== 'all') {
        const selectedModule = filterModuleCategory.value;
        if (rowProgram !== selectedModule && !rowProgram.toLowerCase().includes(selectedModule.toLowerCase())) return false;
    }

    // 3. Attendance filter
    const filterAttendance = document.getElementById('filterAttendance');
    if (filterAttendance && filterAttendance.value !== 'all') {
        const selectedAtt = filterAttendance.value;
        if (rowAtt.toLowerCase() !== selectedAtt.toLowerCase()) return false;
    }

    // 4. Department filter
    const filterDepartment = document.getElementById('filterDepartment');
    if (filterDepartment && filterDepartment.value !== 'all') {
        const selectedDept = filterDepartment.value;
        if (rowDept.toLowerCase() !== selectedDept.toLowerCase()) return false;
    }

    return true;
};

/* ==========================================================================
   Script Block 2
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    // ---------------------------------------------------------
    // Toast Notification Helper
    // ---------------------------------------------------------
    function showToast(msg) {
        const toast = document.getElementById('copyFeedbackToast');
        const text = document.getElementById('copyToastMsg');
        if (toast && text) {
            text.textContent = msg;
            toast.style.display = 'flex';
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        }
    }

    // ---------------------------------------------------------
    // View Switcher (Sessions Master vs Clearance Tracker)
    // ---------------------------------------------------------
    const tabBtnSessions = document.getElementById('tabBtnSessions');
    const tabBtnClearance = document.getElementById('tabBtnClearance');
    const viewSessionsMaster = document.getElementById('viewSessionsMaster');
    const viewClearanceTracker = document.getElementById('viewClearanceTracker');

    if (tabBtnSessions && tabBtnClearance) {
        tabBtnSessions.addEventListener('click', function() {
            tabBtnSessions.classList.add('active');
            tabBtnClearance.classList.remove('active');
            viewSessionsMaster.style.display = 'block';
            viewClearanceTracker.style.display = 'none';
        });

        tabBtnClearance.addEventListener('click', function() {
            tabBtnClearance.classList.add('active');
            tabBtnSessions.classList.remove('active');
            viewSessionsMaster.style.display = 'none';
            viewClearanceTracker.style.display = 'block';
        });
    }

    // ---------------------------------------------------------
    // Sessions Filters Hook with tabel.js
    // ---------------------------------------------------------
    const filterWorkflowStage = document.getElementById('filterWorkflowStage');
    const filterModuleCategory = document.getElementById('filterModuleCategory');
    const filterAttendance = document.getElementById('filterAttendance');
    const filterDepartment = document.getElementById('filterDepartment');
    const employeeSearch = document.getElementById('employeeSearch');
    const btnResetSessionFilters = document.getElementById('btnResetSessionFilters');
    const activeFilterBadge = document.getElementById('activeFilterBadge');

    function triggerSessionsFilter() {
        if (employeeSearch) {
            employeeSearch.dispatchEvent(new Event('input'));
        }
        let desc = [];
        if (filterWorkflowStage && filterWorkflowStage.value !== 'all') desc.push(filterWorkflowStage.options[filterWorkflowStage.selectedIndex].text);
        if (filterModuleCategory && filterModuleCategory.value !== 'all') desc.push(filterModuleCategory.value);
        if (filterAttendance && filterAttendance.value !== 'all') desc.push('Attendance: ' + filterAttendance.value);
        if (filterDepartment && filterDepartment.value !== 'all') desc.push(filterDepartment.value);

        if (activeFilterBadge) {
            if (desc.length > 0) {
                activeFilterBadge.innerHTML = `Filter Active: <strong>${desc.join(' • ')}</strong>`;
                activeFilterBadge.className = 'badge bg-success-subtle text-success border border-success-subtle px-2 py-1';
            } else {
                activeFilterBadge.innerHTML = 'Showing: <strong>All Sessions</strong>';
                activeFilterBadge.className = 'badge bg-light text-dark border px-2 py-1';
            }
        }
    }

    if (filterWorkflowStage) filterWorkflowStage.addEventListener('change', triggerSessionsFilter);
    if (filterModuleCategory) filterModuleCategory.addEventListener('change', triggerSessionsFilter);
    if (filterAttendance) filterAttendance.addEventListener('change', triggerSessionsFilter);
    if (filterDepartment) filterDepartment.addEventListener('change', triggerSessionsFilter);

    if (btnResetSessionFilters) {
        btnResetSessionFilters.addEventListener('click', function() {
            if (filterWorkflowStage) filterWorkflowStage.value = 'all';
            if (filterModuleCategory) filterModuleCategory.value = 'all';
            if (filterAttendance) filterAttendance.value = 'all';
            if (filterDepartment) filterDepartment.value = 'all';
            if (employeeSearch) employeeSearch.value = '';
            triggerSessionsFilter();
        });
    }

    // Trigger on initial page load
    triggerSessionsFilter();

    // ---------------------------------------------------------
    // Clearance Table Filter (Step 11 Decision)
    // ---------------------------------------------------------
    const filterClearanceStatus = document.getElementById('filterClearanceStatus');
    if (filterClearanceStatus) {
        filterClearanceStatus.addEventListener('change', function() {
            const val = this.value;
            const rows = document.querySelectorAll('#clearanceTableBody tr');
            rows.forEach(row => {
                const branch = row.getAttribute('data-clearance-branch');
                if (val === 'all' || val === branch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }

    // ---------------------------------------------------------
    // SEND INVITE LINK MODAL (PROFESSIONAL DESIGN)
    // ---------------------------------------------------------
    let currentInviteRow = null;

    function populateAndOpenInviteModal(row) {
        currentInviteRow = row;

        const ref = row ? row.getAttribute('data-ref') : 'SES-2026-101';
        const empName = row ? row.getAttribute('data-emp') : 'Kavitha Raman';
        const empId = row ? row.getAttribute('data-empid') : 'EMP-2026-041';
        const empDept = row ? row.getAttribute('data-dept') : 'Design';
        const empRole = row ? row.getAttribute('data-role') : 'UI/UX Designer';
        const empEmail = row ? (row.getAttribute('data-email') || `${empName.toLowerCase().replace(/\s+/g, '.')}@gharudahr.com`) : 'kavitha.raman@gharudahr.com';
        const empPhone = row ? (row.getAttribute('data-phone') || '+91 98401 23456') : '+91 98401 23456';
        const program = row ? row.getAttribute('data-program') : 'Department & Role Orientation';
        const title = row ? row.getAttribute('data-title') : 'Design System & UX Framework Walkthrough';
        const trainer = row ? row.getAttribute('data-trainer') : 'Amelia Curr (Design Lead)';
        const date = row ? row.getAttribute('data-date') : '2026-09-18';
        const time = row ? row.getAttribute('data-time') : '11:30 AM - 12:30 PM';
        const venue = row ? row.getAttribute('data-venue') : 'Design Studio 2';
        const materials = row ? (row.getAttribute('data-materials') || 'Handbook.pdf') : 'Handbook.pdf';

        // Generate dynamic secure token
        const cleanToken = 'IND_' + Math.abs((ref + empId).split('').reduce((a,b)=>{a=((a<<5)-a)+b.charCodeAt(0);return a&a},0)).toString(16);
        const joinUrl = `https://hrms.gharuda.com/induction/join?session=${encodeURIComponent(ref)}&token=${cleanToken}&emp=${encodeURIComponent(empId)}`;

        // Populate modal elements
        document.getElementById('inviteTargetInitial').textContent = empName.charAt(0);
        document.getElementById('inviteTargetName').textContent = empName;
        document.getElementById('inviteTargetEmpId').textContent = empId;
        document.getElementById('inviteTargetDept').textContent = empDept;
        document.getElementById('inviteTargetRole').textContent = empRole;
        document.getElementById('inviteTargetProgram').textContent = program;
        document.getElementById('inviteTargetRef').innerHTML = `<i class="bi bi-hash text-muted"></i>${ref}`;
        document.getElementById('inviteTargetDateTime').innerHTML = `<i class="bi bi-calendar3 me-1 text-success"></i>${date} &bull; ${time}`;
        
        document.getElementById('inviteJoinLink').value = joinUrl;
        document.getElementById('inviteVenuePlatform').textContent = venue;
        document.getElementById('invitePhone').value = empPhone;
        document.getElementById('inviteEmail').value = empEmail;

        // Populate Preview Card
        document.getElementById('previewSessionTitle').textContent = title;
        document.getElementById('previewProgramCategory').textContent = program;
        document.getElementById('previewDate').textContent = date;
        document.getElementById('previewTime').textContent = time;
        document.getElementById('previewTrainer').textContent = trainer;
        document.getElementById('previewVenue').textContent = venue;
        document.getElementById('previewEmpIdFooter').textContent = empId;

        // Materials preview badges
        const matContainer = document.getElementById('previewMaterialsBadges');
        matContainer.innerHTML = '';
        materials.split(',').forEach(m => {
            if (m.trim()) {
                const badge = document.createElement('span');
                badge.className = 'badge bg-light text-dark border';
                badge.style.fontSize = '10.5px';
                badge.innerHTML = `<i class="bi bi-file-earmark-pdf text-danger me-1"></i>${m.trim()}`;
                matContainer.appendChild(badge);
            }
        });

        new bootstrap.Modal(document.getElementById('sendInviteModal')).show();
    }

    // Row Send Invite Button
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-send-invite-row');
        if (!btn) return;
        const row = btn.closest('tr');
        if (row) {
            populateAndOpenInviteModal(row);
        }
    });

    // Top action bar Send Invite Button
    const btnTopSendInvite = document.getElementById('btnTopSendInvite');
    if (btnTopSendInvite) {
        btnTopSendInvite.addEventListener('click', function() {
            const firstRow = document.querySelector('#pgBody tr.ori-row');
            populateAndOpenInviteModal(firstRow);
        });
    }

    // Copy Link Button
    const btnCopyInviteLink = document.getElementById('btnCopyInviteLink');
    if (btnCopyInviteLink) {
        btnCopyInviteLink.addEventListener('click', function() {
            const linkInput = document.getElementById('inviteJoinLink');
            linkInput.select();
            linkInput.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(linkInput.value).then(() => {
                showToast('Joining link successfully copied to clipboard!');
            }).catch(() => {
                showToast('Link copied!');
            });
        });
    }

    // Copy Full Text Message
    const btnCopyInviteMessage = document.getElementById('btnCopyInviteMessage');
    if (btnCopyInviteMessage) {
        btnCopyInviteMessage.addEventListener('click', function() {
            const empName = document.getElementById('inviteTargetName').textContent;
            const sessionTitle = document.getElementById('previewSessionTitle').textContent;
            const date = document.getElementById('previewDate').textContent;
            const time = document.getElementById('previewTime').textContent;
            const venue = document.getElementById('previewVenue').textContent;
            const trainer = document.getElementById('previewTrainer').textContent;
            const link = document.getElementById('inviteJoinLink').value;
            const custom = document.getElementById('inviteCustomMessage').value;

            const msg = `*Induction & Orientation Invitation - Gharuda HRMS*\n\nHello ${empName},\n\nYou are scheduled for the following mandatory orientation session:\n📌 *Topic:* ${sessionTitle}\n🗓 *Date:* ${date}\n⏰ *Time:* ${time}\n📍 *Venue/Platform:* ${venue}\n👨‍🏫 *Trainer:* ${trainer}\n\n🔗 *Access Link:* ${link}\n\n${custom ? '📝 *Note:* ' + custom + '\n\n' : ''}Best regards,\nHR Operations Team | Gharuda`;

            navigator.clipboard.writeText(msg).then(() => {
                showToast('Complete invitation text copied to clipboard!');
            });
        });
    }

    // Direct WhatsApp Button
    const btnOpenWhatsAppDirect = document.getElementById('btnOpenWhatsAppDirect');
    const btnDispatchWhatsAppSingle = document.getElementById('btnDispatchWhatsAppSingle');

    function sendViaWhatsApp() {
        const phone = document.getElementById('invitePhone').value.replace(/[^0-9]/g, '');
        const empName = document.getElementById('inviteTargetName').textContent;
        const sessionTitle = document.getElementById('previewSessionTitle').textContent;
        const date = document.getElementById('previewDate').textContent;
        const time = document.getElementById('previewTime').textContent;
        const venue = document.getElementById('previewVenue').textContent;
        const link = document.getElementById('inviteJoinLink').value;

        const text = encodeURIComponent(`Hello ${empName},\n\nYou are scheduled for your Induction Session: *${sessionTitle}* on *${date}* at *${time}* (${venue}).\n\nAccess your digital induction pass and materials here:\n${link}\n\n- Gharuda HRMS`);

        if (phone) {
            window.open(`https://wa.me/${phone}?text=${text}`, '_blank');
        } else {
            window.open(`https://api.whatsapp.com/send?text=${text}`, '_blank');
        }
    }

    if (btnOpenWhatsAppDirect) btnOpenWhatsAppDirect.addEventListener('click', sendViaWhatsApp);
    if (btnDispatchWhatsAppSingle) btnDispatchWhatsAppSingle.addEventListener('click', sendViaWhatsApp);

    // Dispatch All Invites (Email + WhatsApp + Calendar)
    const btnDispatchInvitesAll = document.getElementById('btnDispatchInvitesAll');
    if (btnDispatchInvitesAll) {
        btnDispatchInvitesAll.addEventListener('click', function() {
            const empName = document.getElementById('inviteTargetName').textContent;
            const empEmail = document.getElementById('inviteEmail').value;
            const isWa = document.getElementById('chkInviteWhatsApp').checked;
            const isEm = document.getElementById('chkInviteEmail').checked;

            let channels = [];
            if (isEm) channels.push(`Email (${empEmail})`);
            if (isWa) channels.push(`WhatsApp`);

            // Mark row as notified in UI
            if (currentInviteRow) {
                currentInviteRow.setAttribute('data-notified', 'Yes');
                const notifiedCell = currentInviteRow.children[4];
                if (notifiedCell) {
                    notifiedCell.innerHTML = `<span class="wf-badge wf-badge-notified"><i class="bi bi-send-check"></i> ${channels.join(' & ')}</span>`;
                }
            }

            bootstrap.Modal.getInstance(document.getElementById('sendInviteModal')).hide();
            showToast(`Official Induction Invites successfully dispatched to ${empName}!`);
            triggerSessionsFilter();
        });
    }

    // ---------------------------------------------------------
    // Execution Modal Handler (Steps 5 to 10)
    // ---------------------------------------------------------
    let currentExecRow = null;
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-execute-session');
        if (!btn) return;
        const row = btn.closest('tr');
        if (!row) return;
        currentExecRow = row;

        document.getElementById('execSessionRef').textContent = row.getAttribute('data-ref') || 'SES-2026';
        document.getElementById('execSessionTitle').textContent = row.getAttribute('data-title') || 'Induction Session';
        document.getElementById('execSessionEmpInfo').textContent = `${row.getAttribute('data-emp')} (${row.getAttribute('data-empid')}) • ${row.getAttribute('data-dept')}`;
        document.getElementById('execSessionSchedule').textContent = `${row.getAttribute('data-date')} • ${row.getAttribute('data-time')}`;
        document.getElementById('execSessionTrainer').textContent = row.getAttribute('data-trainer') || '';

        document.getElementById('execConductedStatus').value = row.getAttribute('data-conducted') === 'Yes' ? 'Yes' : 'No';
        document.getElementById('execAttendanceStatus').value = row.getAttribute('data-attendance') || 'Pending';
        document.getElementById('execMaterials').value = row.getAttribute('data-materials') || '';
        document.getElementById('execAssessment').value = row.getAttribute('data-assessment') || 'Digital Sign-off Completed';
        document.getElementById('execRating').value = row.getAttribute('data-rating') || '5.0';
        document.getElementById('execFeedbackText').value = row.getAttribute('data-feedback') || '';
        document.getElementById('execSessionStatus').value = row.getAttribute('data-status') || 'Scheduled';

        new bootstrap.Modal(document.getElementById('sessionExecutionModal')).show();
    });

    const btnSaveExecutionUpdate = document.getElementById('btnSaveExecutionUpdate');
    if (btnSaveExecutionUpdate) {
        btnSaveExecutionUpdate.addEventListener('click', function() {
            if (!currentExecRow) return;

            const conducted = document.getElementById('execConductedStatus').value;
            const att = document.getElementById('execAttendanceStatus').value;
            const mats = document.getElementById('execMaterials').value;
            const assess = document.getElementById('execAssessment').value;
            const rating = document.getElementById('execRating').value;
            const feedback = document.getElementById('execFeedbackText').value;
            const status = document.getElementById('execSessionStatus').value;

            currentExecRow.setAttribute('data-conducted', conducted);
            currentExecRow.setAttribute('data-attendance', att);
            currentExecRow.setAttribute('data-materials', mats);
            currentExecRow.setAttribute('data-assessment', assess);
            currentExecRow.setAttribute('data-rating', rating);
            currentExecRow.setAttribute('data-feedback', feedback);
            currentExecRow.setAttribute('data-status', status);

            // Update visible conduct & attendance cell
            const cell56 = currentExecRow.children[5];
            if (cell56) {
                if (conducted === 'Yes') {
                    cell56.innerHTML = `<span class="wf-badge wf-badge-completed"><i class="bi bi-check2-circle"></i> Conducted</span><div class="${att === 'Present' ? 'text-success' : (att === 'Absent' ? 'text-danger' : 'text-muted')} fw-semibold" style="font-size:11px;"><i class="bi bi-check me-1"></i>${att}</div>`;
                } else {
                    cell56.innerHTML = `<span class="wf-badge wf-badge-scheduled"><i class="bi bi-clock"></i> Upcoming</span><div class="text-muted" style="font-size:11px;">Attendance: ${att}</div>`;
                }
            }

            // Update status cell
            const cellStatus = currentExecRow.children[8];
            if (cellStatus) {
                if (status === 'Completed') cellStatus.innerHTML = `<span class="wf-badge wf-badge-completed">Completed</span>`;
                else if (status === 'Conducted') cellStatus.innerHTML = `<span class="wf-badge wf-badge-conducted">Conducted</span>`;
                else cellStatus.innerHTML = `<span class="wf-badge wf-badge-scheduled">Scheduled</span>`;
            }

            bootstrap.Modal.getInstance(document.getElementById('sessionExecutionModal')).hide();
            showToast('Session workflow successfully updated with attendance & assessment!');
            triggerSessionsFilter();
        });
    }

    // ---------------------------------------------------------
    // View Full Session Details Modal Handler
    // ---------------------------------------------------------
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-view-session');
        if (!btn) return;
        const row = btn.closest('tr');
        if (!row) return;

        document.getElementById('viewModalRef').textContent = row.getAttribute('data-ref') || 'SES-2026';
        document.getElementById('viewModalTitle').textContent = row.getAttribute('data-title') || 'Induction Session';
        document.getElementById('viewEmp').textContent = row.getAttribute('data-emp') || '';
        document.getElementById('viewEmpMeta').textContent = `${row.getAttribute('data-empid')} • ${row.getAttribute('data-dept')} • ${row.getAttribute('data-role')}`;
        document.getElementById('viewProgram').textContent = row.getAttribute('data-program') || '';
        document.getElementById('viewTopic').textContent = row.getAttribute('data-title') || '';
        document.getElementById('viewTrainer').textContent = row.getAttribute('data-trainer') || '';
        document.getElementById('viewDateTime').textContent = `${row.getAttribute('data-date')} (${row.getAttribute('data-time')})`;
        document.getElementById('viewModeVenue').textContent = `${row.getAttribute('data-mode')} • ${row.getAttribute('data-venue')}`;
        document.getElementById('viewNotified').innerHTML = row.getAttribute('data-notified') === 'Yes' ? '<i class="bi bi-check-circle me-1 text-success"></i> WhatsApp & Email Sent' : '<span class="text-muted">Not notified yet</span>';
        document.getElementById('viewAttendance').textContent = row.getAttribute('data-attendance') || 'Pending';
        document.getElementById('viewAssessment').textContent = row.getAttribute('data-assessment') || 'Pending';
        document.getElementById('viewRating').textContent = row.getAttribute('data-rating') || 'Unrated';
        document.getElementById('viewMaterials').textContent = row.getAttribute('data-materials') || 'No files attached';
        document.getElementById('viewFeedbackText').textContent = row.getAttribute('data-feedback') || 'No feedback comments recorded yet.';

        new bootstrap.Modal(document.getElementById('viewSessionModal')).show();
    });

    // ---------------------------------------------------------
    // Step 11: View Certificate Modal (Branch YES)
    // ---------------------------------------------------------
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-view-certificate');
        if (!btn) return;

        document.getElementById('certEmpName').textContent = btn.getAttribute('data-emp') || 'Employee';
        document.getElementById('certEmpId').textContent = btn.getAttribute('data-empid') || 'EMP';
        document.getElementById('certEmpRole').textContent = btn.getAttribute('data-role') || 'Role';
        document.getElementById('certEmpDept').textContent = btn.getAttribute('data-dept') || 'Dept';
        document.getElementById('certIssueDate').textContent = btn.getAttribute('data-certdate') || '14-Sep-2026';
        document.getElementById('certScore').textContent = btn.getAttribute('data-score') || '100%';

        new bootstrap.Modal(document.getElementById('inductionCertificateModal')).show();
    });

    // ---------------------------------------------------------
    // Step 11: View Pending Sessions Modal (Branch NO)
    // ---------------------------------------------------------
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-view-pending-sessions');
        if (!btn) return;

        const emp = btn.getAttribute('data-emp') || 'Employee';
        const pendingStr = btn.getAttribute('data-pending') || '';
        document.getElementById('pendingModalEmpName').textContent = emp;

        const container = document.getElementById('pendingSessionsList');
        container.innerHTML = '';

        const pendingItems = pendingStr.split(',');
        pendingItems.forEach((item, idx) => {
            if (item.trim()) {
                const div = document.createElement('div');
                div.className = 'p-2 border rounded-3 bg-white d-flex align-items-center justify-content-between';
                div.innerHTML = `
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-warning-subtle text-warning-emphasis border">${idx + 1}</span>
                        <strong class="text-dark" style="font-size:12.5px;">${item.trim()}</strong>
                    </div>
                    <span class="badge bg-danger-subtle text-danger border">Required</span>
                `;
                container.appendChild(div);
            }
        });

        new bootstrap.Modal(document.getElementById('pendingSessionsModal')).show();
    });

    // ---------------------------------------------------------
    // Schedule New Session Form Submission (Steps 1 to 4)
    // ---------------------------------------------------------
    const btnSubmitNewSession = document.getElementById('btnSubmitNewSession');
    if (btnSubmitNewSession) {
        btnSubmitNewSession.addEventListener('click', function() {
            const empVal = document.getElementById('newEmpSelect').value;
            const progVal = document.getElementById('newProgramSelect').value;
            const title = document.getElementById('newSessionTitle').value.trim();
            const trainer = document.getElementById('newTrainer').value.trim();
            const date = document.getElementById('newDate').value;
            const time = document.getElementById('newTime').value.trim();
            const mode = document.getElementById('newMode').value;
            const venue = document.getElementById('newVenue').value.trim();

            if (!empVal || !progVal || !title || !trainer || !date || !time) {
                alert('Please fill in all required fields (Employee, Program, Title, Trainer, Date and Time).');
                return;
            }

            const [empName, empId, empDept, empRole, empEmail, empPhone] = empVal.split('|');
            const [progTitle, progCategory] = progVal.split('|');

            const isWhatsApp = document.getElementById('chkNotifyWhatsApp').checked;
            const isEmail = document.getElementById('chkNotifyEmail').checked;
            const notifyChannel = isWhatsApp && isEmail ? 'WhatsApp & Email' : (isWhatsApp ? 'WhatsApp' : 'Email');

            // Append new row to orientationTable
            const tbody = document.getElementById('pgBody');
            const count = tbody.querySelectorAll('tr').length + 1;
            const tr = document.createElement('tr');
            tr.className = 'ori-row';
            tr.setAttribute('data-ref', `SES-2026-${100 + count}`);
            tr.setAttribute('data-empid', empId || 'EMP-2026-NEW');
            tr.setAttribute('data-emp', empName);
            tr.setAttribute('data-email', empEmail || `${empName.toLowerCase().replace(/\s+/g, '.')}@gharudahr.com`);
            tr.setAttribute('data-phone', empPhone || '+91 98400 00000');
            tr.setAttribute('data-role', empRole || 'New Joiner');
            tr.setAttribute('data-dept', empDept || 'General');
            tr.setAttribute('data-program', progTitle);
            tr.setAttribute('data-title', title);
            tr.setAttribute('data-trainer', trainer);
            tr.setAttribute('data-mode', mode);
            tr.setAttribute('data-venue', venue);
            tr.setAttribute('data-date', date);
            tr.setAttribute('data-time', time);
            tr.setAttribute('data-notified', 'Yes');
            tr.setAttribute('data-conducted', 'No');
            tr.setAttribute('data-attendance', 'Pending');
            tr.setAttribute('data-materials', 'Onboarding_Handbook.pdf');
            tr.setAttribute('data-assessment', 'Pending');
            tr.setAttribute('data-rating', 'Unrated');
            tr.setAttribute('data-feedback', '');
            tr.setAttribute('data-status', 'Scheduled');
            tr.setAttribute('data-mandatory', 'Yes');

            tr.innerHTML = `
                <td class="sno-value">${count}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width:34px;height:34px;font-size:12px;">${empName.charAt(0)}</div>
                        <div>
                            <div class="fw-bold text-dark">${empName}</div>
                            <div class="text-muted" style="font-size:11px;">${empId} • ${empDept}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fw-bold text-dark">${title}</div>
                    <div class="text-muted" style="font-size:11px;"><span class="badge bg-primary-subtle text-primary border me-1">Mandatory</span>${progTitle}</div>
                </td>
                <td>
                    <div class="fw-semibold text-dark text-nowrap" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>${date}</div>
                    <div class="text-muted" style="font-size:11px;">${time} • ${venue}</div>
                </td>
                <td>
                    <span class="wf-badge wf-badge-notified"><i class="bi bi-send-check"></i> ${notifyChannel}</span>
                </td>
                <td>
                    <span class="wf-badge wf-badge-scheduled"><i class="bi bi-clock"></i> Upcoming</span>
                    <div class="text-muted" style="font-size:11px;">Attendance: Pending</div>
                </td>
                <td>
                    <span class="badge bg-light text-dark border"><i class="bi bi-file-earmark-pdf text-danger me-1"></i>1 File</span>
                </td>
                <td>
                    <span class="text-muted" style="font-size:11px;">Pending Conduct</span>
                </td>
                <td>
                    <span class="wf-badge wf-badge-scheduled">Scheduled</span>
                </td>
                <td class="text-end text-nowrap">
                    <button type="button" class="btn btn-sm btn-outline-success btn-send-invite-row" title="Send Invitation Link & Access"><i class="bi bi-send-fill"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-primary btn-execute-session" title="Execute & Update Workflow"><i class="bi bi-pencil-square"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-secondary btn-view-session" title="View Full Details"><i class="bi bi-eye"></i></button>
                </td>
            `;

            tbody.prepend(tr);
            bootstrap.Modal.getInstance(document.getElementById('scheduleInductionModal')).hide();
            showToast(`Session scheduled & invites dispatched to ${empName} via ${notifyChannel}!`);
            triggerSessionsFilter();
        });
    }

    // Excel Export simulation
    const btnExportSessionsXls = document.getElementById('btnExportSessionsXls');
    if (btnExportSessionsXls) {
        btnExportSessionsXls.addEventListener('click', function() {
            showToast('Exporting official Induction & Orientation Lifecycle Report (.xlsx)...');
        });
    }
});
