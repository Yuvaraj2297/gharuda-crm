/**
 * Gharuda CRM - Candidate Evaluations Page Script
 * File: assets/js/pages/candidate-evaluations.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
let currentEvalFilter = 'all';

// Role View Switching Logic (TL Evaluation vs HR Score Review & Schedule)
window.switchRoleView = function(mode) {
    const isHr = (mode === 'hr');

    document.querySelectorAll('.hr-only-btn').forEach(el => el.style.display = isHr ? 'inline-block' : 'none');
    document.querySelectorAll('.tl-only-btn').forEach(el => el.style.display = isHr ? 'none' : 'inline-block');

    const btnTl = document.getElementById('btnModeTL');
    const btnHr = document.getElementById('btnModeHR');
    const pageTitle = document.getElementById('pageTitleText');
    const roleBadge = document.getElementById('roleBadgeText');
    const navSubtext = document.getElementById('navSubtext');

    if (isHr) {
        if (btnTl) btnTl.className = 'btn btn-sm btn-outline-success fw-semibold';
        if (btnHr) btnHr.className = 'btn btn-sm btn-primary active fw-semibold';
        if (pageTitle) pageTitle.innerText = "HR Candidate Score Review & Interview Scheduling";
        if (navSubtext) navSubtext.innerText = "HR Score Review & Scheduling";
        if (roleBadge) {
            roleBadge.className = "badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1 rounded-pill";
            roleBadge.innerHTML = '<i class="bi bi-shield-check me-1"></i> HR Mode: Schedule Candidate Interviews & Review TL Scorecard Marks';
        }
    } else {
        if (btnTl) btnTl.className = 'btn btn-sm btn-success active fw-semibold';
        if (btnHr) btnHr.className = 'btn btn-sm btn-outline-primary fw-semibold';
        if (pageTitle) pageTitle.innerText = "Team Lead Candidate Evaluations & Scorecards";
        if (navSubtext) navSubtext.innerText = "Team Lead Evaluations";
        if (roleBadge) {
            roleBadge.className = "badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill";
            roleBadge.innerHTML = '<i class="bi bi-pencil-square me-1"></i> TL Mode: Conduct Candidate Interview & Submit Performance Ratings';
        }
    }
};

// Hook used by tabel.js to filter rows based on external tabs
window.attendanceRowMatches = function(row) {
    if (!row || !row.getAttribute) return true;
    const status = (row.getAttribute('data-status') || '').toLowerCase();

    if (currentEvalFilter === 'pending_tl') return status.includes('pending tl');
    if (currentEvalFilter === 'sent_hr') return status.includes('sent to hr');
    if (currentEvalFilter === 'hr_approved') return status.includes('hr approved');

    return true;
};

/* ==========================================================================
   Script Block 2
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {

    // Auto-detect view query param (e.g. ?view=hr or ?role=hr)
    const urlParams = new URLSearchParams(window.location.search);
    const initialView = (urlParams.get('view') === 'hr' || urlParams.get('role') === 'hr') ? 'hr' : 'tl';
    switchRoleView(initialView);

    // Calculate Overall Score in Modal live
    function calculateOverall() {
        const t = parseFloat(document.getElementById('evalTechScore').value) || 0;
        const p = parseFloat(document.getElementById('evalPracticalScore').value) || 0;
        const c = parseFloat(document.getElementById('evalCultureScore').value) || 0;

        const avg = ((t + p + c) / 3).toFixed(1);
        document.getElementById('evalOverallDisplay').innerText = `${avg} / 10`;
    }

    document.querySelectorAll('.eval-score-input').forEach(input => {
        input.addEventListener('input', calculateOverall);
    });

    // Filter Tabs Handler
    document.querySelectorAll('#evalTabsWrap .eval-stage-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('#evalTabsWrap .eval-stage-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            currentEvalFilter = this.getAttribute('data-filter');
            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    });

    // Open Team Lead Scorecard Modal (Editable for TL / Read-Only for HR Score Breakdown)
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-evaluate-score, .btn-view-scorecard');
        if (!btn) return;

        const row = btn.closest('tr');
        if (!row) return;

        const isHrReview = btn.classList.contains('btn-view-scorecard');

        const evalId = row.getAttribute('data-evalid') || '';
        const name = row.getAttribute('data-candname') || '';
        const job = row.getAttribute('data-jobtitle') || '';
        const round = row.getAttribute('data-round') || '';
        const tl = row.getAttribute('data-tl') || '';
        const tech = row.getAttribute('data-techscore') || '8.0';
        const practical = row.getAttribute('data-practicalscore') || '8.0';
        const culture = row.getAttribute('data-culturescore') || '8.0';
        const rec = row.getAttribute('data-recommendation') || 'Hire';
        const comments = row.getAttribute('data-comments') || '';

        document.getElementById('evalModalId').value = evalId;
        document.getElementById('evalModalAvatar').innerText = name ? name.charAt(0).toUpperCase() : 'C';
        document.getElementById('evalModalName').innerText = name;
        document.getElementById('evalModalSubtitle').innerText = `${job} • ${round}`;
        document.getElementById('evalModalTL').innerText = tl;
        document.getElementById('evalModalRound').innerText = round;

        const techInput = document.getElementById('evalTechScore');
        const practicalInput = document.getElementById('evalPracticalScore');
        const cultureInput = document.getElementById('evalCultureScore');
        const recSelect = document.getElementById('evalRecommendation');
        const commentsTextarea = document.getElementById('evalComments');
        const readonlyBadge = document.getElementById('evalReadonlyBadge');
        const submitBtn = document.getElementById('evalSubmitBtn');
        const approveBtn = document.getElementById('evalApproveBtn');
        const rejectBtn = document.getElementById('evalRejectBtn');

        techInput.value = tech;
        practicalInput.value = practical;
        cultureInput.value = culture;
        recSelect.value = rec;
        commentsTextarea.value = comments;

        if (isHrReview) {
            techInput.readOnly = true;
            practicalInput.readOnly = true;
            cultureInput.readOnly = true;
            recSelect.disabled = true;
            commentsTextarea.readOnly = true;
            if (readonlyBadge) readonlyBadge.style.display = 'inline-block';
            if (submitBtn) submitBtn.style.display = 'none';
            if (approveBtn) approveBtn.style.display = 'inline-block';
            if (rejectBtn) rejectBtn.style.display = 'inline-block';
        } else {
            techInput.readOnly = false;
            practicalInput.readOnly = false;
            cultureInput.readOnly = false;
            recSelect.disabled = false;
            commentsTextarea.readOnly = false;
            if (readonlyBadge) readonlyBadge.style.display = 'none';
            if (submitBtn) submitBtn.style.display = 'inline-block';
            if (approveBtn) approveBtn.style.display = 'none';
            if (rejectBtn) rejectBtn.style.display = 'none';
        }

        calculateOverall();

        const modal = new bootstrap.Modal(document.getElementById('evaluateCandidateModal'));
        modal.show();
    });

    // Submit Evaluation Form
    const evalForm = document.getElementById('evaluateScoreForm');
    if (evalForm) {
        evalForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const dataObj = {};
            formData.forEach((val, key) => dataObj[key] = val);

            fetch('api-candidate-evaluation.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(dataObj)
            })
            .then(res => res.json())
            .then(resp => {
                if (resp.success) {
                    const modalInst = bootstrap.Modal.getInstance(document.getElementById('evaluateCandidateModal'));
                    if (modalInst) modalInst.hide();
                    alert(resp.message || 'Interview Scorecard & Performance Evaluation submitted and sent to HR!');
                    location.reload();
                }
            })
            .catch(err => {
                console.error('Failed submitting evaluation:', err);
                alert('Scorecard submitted. Reloading page...');
                location.reload();
            });
        });
    }

    window.handleCandidateStatusUpdate = function(status, targetEvalId, targetCandName) {
        const evalId = targetEvalId || (document.getElementById('evalModalId') ? document.getElementById('evalModalId').value : '');
        const candName = targetCandName || (document.getElementById('evalModalName') ? document.getElementById('evalModalName').innerText : 'Candidate');

        const recSelect = document.getElementById('evalRecommendation');
        if (recSelect) {
            if (status === 'Approved') recSelect.value = 'Hire';
            else if (status === 'Rejected') recSelect.value = 'Reject';
        }

        fetch('api-candidate-evaluation.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                action: 'update_status',
                eval_id: evalId,
                status: status
            })
        })
        .then(res => res.json())
        .catch(() => {})
        .finally(() => {
            const modalInst = bootstrap.Modal.getInstance(document.getElementById('evaluateCandidateModal'));
            if (modalInst) modalInst.hide();

            if (evalId) {
                const row = document.querySelector(`tr[data-evalid="${evalId}"]`);
                if (row) {
                    const statusBadge = row.querySelector('.status-pill, .badge');
                    if (statusBadge) {
                        if (status === 'Approved') {
                            statusBadge.className = 'badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill fw-bold';
                            statusBadge.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i> Approved';
                        } else {
                            statusBadge.className = 'badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-1 rounded-pill fw-bold';
                            statusBadge.innerHTML = '<i class="bi bi-x-circle-fill me-1"></i> Rejected';
                        }
                    }
                }
            }

            alert(`Candidate ${candName} evaluation has been marked as ${status}!`);
        });
    };

    // Dynamic Team -> TL mapping for Assign Modal
    const assignTeamTLMap = {
        "Frontend Engineering Team": [
            "Santhosh Kumar (Frontend Tech Lead)",
            "Anand (Senior Frontend Lead)"
        ],
        "Backend Engineering Team": [
            "Karthik V (Backend Tech Lead)",
            "Ramesh (Principal Backend Architect)"
        ],
        "UI/UX Design Team": [
            "Deepak (Lead UI/UX Designer)",
            "Ananya S (Senior Design Lead)"
        ],
        "Mobile / iOS Engineering Team": [
            "Anitha R (iOS Mobile Tech Lead)",
            "Priya (Mobile Lead)"
        ],
        "Marketing & PPC Team": [
            "Priya S (Performance Marketing Lead)",
            "Vikram (Growth Lead)"
        ],
        "HR & Talent Acquisition Team": [
            "Meena S (HR Operations Lead)",
            "Kavitha (Talent Lead)"
        ],
        "Finance & Accounts Team": [
            "Suresh Kumar (Finance Manager)"
        ]
    };

    const assignTeamSelect = document.getElementById('assign_team_select');
    if (assignTeamSelect) {
        assignTeamSelect.addEventListener('change', function() {
            const tlSelect = document.getElementById('assign_tl_select');
            if (!tlSelect) return;
            tlSelect.innerHTML = '';
            const tls = assignTeamTLMap[this.value] || ["Santhosh Kumar (Frontend Tech Lead)", "Karthik V (Backend Tech Lead)"];
            tls.forEach(tl => {
                const opt = document.createElement('option');
                opt.value = tl;
                opt.textContent = tl;
                tlSelect.appendChild(opt);
            });
        });
    }

    // Submit Assign to TL Form
    const assignForm = document.getElementById('assignTLForm');
    if (assignForm) {
        assignForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const selectEl = document.getElementById('assign_candidate_select');
            const selectedOpt = selectEl.options[selectEl.selectedIndex];

            const dataObj = {
                action: 'assign_tl',
                candidate_id: selectEl.value,
                candidate_name: selectedOpt.getAttribute('data-name') || 'Candidate',
                job_title: selectedOpt.getAttribute('data-job') || 'Position',
                source: selectedOpt.getAttribute('data-source') || 'Social & Web Portal',
                department: this.elements['department'].value,
                assigned_tl: this.elements['assigned_tl'].value,
                round: 'Technical Interview Evaluation',
                instructions: this.elements['instructions'].value
            };

            fetch('api-candidate-evaluation.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(dataObj)
            })
            .then(res => res.json())
            .then(resp => {
                if (resp.success) {
                    const modalInst = bootstrap.Modal.getInstance(document.getElementById('assignTLModal'));
                    if (modalInst) modalInst.hide();
                    alert(resp.message || 'Candidate resume shortlisted & forwarded to Team Lead!');
                    location.reload();
                }
            });
        });
    }

    // Open Schedule Interview Modal from Candidate Evaluations table
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-schedule-interview-modal');
        if (!btn) return;

        const row = btn.closest('tr');
        if (!row) return;

        const name = row.getAttribute('data-candname') || 'Candidate';
        const job = row.getAttribute('data-jobtitle') || 'Position';

        document.getElementById('schedCandidateName').value = name;
        document.getElementById('schedJobTitle').value = job;

        document.getElementById('schedDispName').innerText = name;
        document.getElementById('schedDispRole').innerText = job;

        // Auto pre-fill email and phone based on candidate name
        const cleanName = name.toLowerCase().replace(/[^a-z]/g, '.');
        document.getElementById('schedCandidateEmail').value = `${cleanName}@gmail.com`;
        document.getElementById('schedCandidatePhone').value = "+91 98765 43210";

        const modal = new bootstrap.Modal(document.getElementById('scheduleInterviewModal'));
        modal.show();
    });

    // Generate WhatsApp text message helper
    function generateWhatsappText() {
        const name = document.getElementById('schedCandidateName').value || 'Candidate';
        const job = document.getElementById('schedJobTitle').value || 'Position';
        const round = document.getElementById('schedRoundSelect').value || 'Interview Round';
        const interviewer = document.getElementById('schedInterviewerSelect').value || 'Interview Panel';
        const date = document.getElementById('schedDateInput').value || '';
        const time = document.getElementById('schedTimeInput').value || '';
        const link = document.getElementById('schedLinkInput').value || '';

        return `Dear ${name},\n\n` +
               `Your next interview for *${job}* (*${round}*) has been scheduled!\n\n` +
               `📅 Date: ${date}\n` +
               `⏰ Time: ${time}\n` +
               `👨‍💼 Interviewer: ${interviewer}\n` +
               `🔗 Meeting Link: ${link}\n\n` +
               `Please join 5 mins before start time. Wish you the very best!\n\n` +
               `Regards,\nTalent Acquisition Team`;
    }

    // Direct WhatsApp Button click
    const btnDirectWa = document.getElementById('btnOpenWhatsappDirect');
    if (btnDirectWa) {
        btnDirectWa.addEventListener('click', function() {
            const phone = document.getElementById('schedCandidatePhone').value.replace(/[^0-9]/g, '') || '919876543210';
            const msg = generateWhatsappText();
            const waUrl = `https://api.whatsapp.com/send?phone=${encodeURIComponent(phone)}&text=${encodeURIComponent(msg)}`;
            window.open(waUrl, '_blank');
        });
    }

    // Schedule Interview Form submit
    const schedForm = document.getElementById('scheduleInterviewForm');
    if (schedForm) {
        schedForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const sendEmail = document.getElementById('sendEmailToggle').checked;
            const sendWa = document.getElementById('sendWhatsappToggle').checked;
            const phone = document.getElementById('schedCandidatePhone').value.replace(/[^0-9]/g, '') || '919876543210';
            const email = document.getElementById('schedCandidateEmail').value;
            const candName = document.getElementById('schedCandidateName').value;

            if (sendWa) {
                const msg = generateWhatsappText();
                const waUrl = `https://api.whatsapp.com/send?phone=${encodeURIComponent(phone)}&text=${encodeURIComponent(msg)}`;
                window.open(waUrl, '_blank');
            }

            const modalInst = bootstrap.Modal.getInstance(document.getElementById('scheduleInterviewModal'));
            if (modalInst) modalInst.hide();

            let channelText = [];
            if (sendEmail) channelText.push(`Email Calendar Invite to ${email}`);
            if (sendWa) channelText.push(`WhatsApp Invite to ${phone}`);
            const finalChannels = channelText.length > 0 ? channelText.join(' and ') : 'Invites dispatched';

            alert(`Interview successfully scheduled for ${candName}!\n\n${finalChannels}. Redirecting to Interview Calendar...`);
            window.location.href = 'interview-schedule.php';
        });
    }
});
