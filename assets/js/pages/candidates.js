/**
 * Gharuda CRM - Candidates Page Script
 * File: assets/js/pages/candidates.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
// Filter state for candidates pipeline
let currentCandidateStage = 'all';
let currentJobFilter = '';

// Check URL query parameters for stage or job filter
(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const stageParam = urlParams.get('stage');
    const jobParam = urlParams.get('job');
    if (stageParam) {
        currentCandidateStage = stageParam.toLowerCase();
    }
    if (jobParam) {
        currentJobFilter = jobParam.toLowerCase();
    }
})();

// External filter hook called by tabel.js
window.attendanceRowMatches = function(row) {
    if (!row || !row.classList || !row.classList.contains('cand-row')) return true;

    // Stage match
    const rowStage = (row.getAttribute('data-stage') || '').toLowerCase();
    const stageMatch = (currentCandidateStage === 'all') || (rowStage === currentCandidateStage);

    // Job match (if URL specified ?job=JOB-101)
    const rowJob = (row.getAttribute('data-job') || '').toLowerCase();
    const rowJobTitle = (row.getAttribute('data-jobtitle') || '').toLowerCase();
    const jobMatch = !currentJobFilter || rowJob.includes(currentJobFilter) || rowJobTitle.includes(currentJobFilter);

    // HR Recruiter match
    const hrSelect = document.getElementById('hrFilterSelect');
    const selectedHr = hrSelect ? hrSelect.value : 'all';
    const rowHr = row.getAttribute('data-hr') || '';
    const hrMatch = (selectedHr === 'all') || (rowHr === selectedHr);

    // Department match
    const deptSelect = document.getElementById('deptFilterSelect');
    const selectedDept = deptSelect ? deptSelect.value.toLowerCase() : 'all';
    const rowDept = (row.getAttribute('data-dept') || row.textContent).toLowerCase();
    const deptMatch = (selectedDept === 'all') || rowDept.includes(selectedDept);

    // Candidate / Employee match
    const candSelect = document.getElementById('candidateFilterSelect');
    const selectedCand = candSelect ? candSelect.value.toLowerCase() : 'all';
    const rowText = row.textContent.toLowerCase();
    const candMatch = (selectedCand === 'all') || rowText.includes(selectedCand);

    return stageMatch && jobMatch && hrMatch && deptMatch && candMatch;
};

// Calculate dynamic counts across all pipeline stages
function updateStageTabCounts() {
    const rows = document.querySelectorAll('#pgBody tr.cand-row');
    const counts = {
        all: 0,
        screening: 0,
        tech: 0,
        hr: 0,
        offered: 0,
        hired: 0,
        rejected: 0
    };

    rows.forEach(function(row) {
        const rowJob = (row.getAttribute('data-job') || '').toLowerCase();
        const rowJobTitle = (row.getAttribute('data-jobtitle') || '').toLowerCase();
        if (currentJobFilter && !rowJob.includes(currentJobFilter) && !rowJobTitle.includes(currentJobFilter)) {
            return;
        }

        counts.all++;
        const s = (row.getAttribute('data-stage') || '').toLowerCase();
        if (counts.hasOwnProperty(s)) {
            counts[s]++;
        }
    });

    document.querySelectorAll('.stage-tab-pill').forEach(function(btn) {
        const stage = btn.getAttribute('data-stage');
        const countSpan = btn.querySelector('.count');
        if (countSpan && counts.hasOwnProperty(stage)) {
            countSpan.textContent = counts[stage];
        }
    });
}

/* ==========================================================================
   Script Block 2
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    // Stage tab pill click handlers
    const stageTabs = document.querySelectorAll('.stage-tab-pill');

    // Pre-activate tab if from URL query parameter
    if (currentCandidateStage !== 'all') {
        stageTabs.forEach(function(tab) {
            if (tab.getAttribute('data-stage') === currentCandidateStage) {
                tab.classList.add('active');
            } else {
                tab.classList.remove('active');
            }
        });
    }

    stageTabs.forEach(function(tab) {
        tab.addEventListener('click', function(e) {
            e.preventDefault();

            stageTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            currentCandidateStage = this.getAttribute('data-stage') || 'all';

            // Trigger table re-render via tabel.js
            if (window.refreshAttendanceTable) {
                window.refreshAttendanceTable();
            }
        });
    });

    // Filter Change Handlers (Works with Select2 and standard selects)
    ['hrFilterSelect', 'deptFilterSelect', 'candidateFilterSelect'].forEach(function(id) {
        const el = document.getElementById(id);
        if (el) {
            $(el).on('change', function() {
                updateStageTabCounts();
                if (window.refreshAttendanceTable) {
                    window.refreshAttendanceTable();
                }
            });
        }
    });

    // Reset Filters Handler
    const resetFiltersBtn = document.getElementById('resetFiltersBtn');
    if (resetFiltersBtn) {
        resetFiltersBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const empSearch = document.getElementById('employeeSearch');
            if (empSearch) {
                empSearch.value = '';
                empSearch.dispatchEvent(new Event('input'));
            }
            
            ['hrFilterSelect', 'deptFilterSelect', 'candidateFilterSelect'].forEach(function(id) {
                const el = document.getElementById(id);
                if (el) {
                    $(el).val('all').trigger('change.select2');
                }
            });

            stageTabs.forEach(t => t.classList.remove('active'));
            const allTab = document.querySelector('.stage-tab-pill[data-stage="all"]');
            if (allTab) allTab.classList.add('active');
            currentCandidateStage = 'all';

            updateStageTabCounts();
            if (window.refreshAttendanceTable) {
                window.refreshAttendanceTable();
            }
        });
    }

    // Initial counts calculation
    updateStageTabCounts();

    // Add Candidate submission handler
    const btnSaveCandidate = document.getElementById('btnSaveCandidate');
    if (btnSaveCandidate) {
        btnSaveCandidate.addEventListener('click', function() {
            const name = document.getElementById('cand_name').value.trim();
            const email = document.getElementById('cand_email').value.trim();
            const phone = document.getElementById('cand_phone').value.trim();
            const jobSelect = document.getElementById('cand_job');
            const jobCode = jobSelect.value;
            const selectedOpt = jobSelect.options[jobSelect.selectedIndex];
            const dept = selectedOpt ? selectedOpt.getAttribute('data-dept') : 'General';
            const jobTitle = selectedOpt ? selectedOpt.getAttribute('data-title') : jobCode;
            const exp = document.getElementById('cand_exp').value.trim() || '2 Years';
            const company = document.getElementById('cand_company').value.trim() || 'Previous Org';
            const ctc = document.getElementById('cand_ctc').value.trim() || 'Best in Industry';
            const notice = document.getElementById('cand_notice').value;
            const stage = document.getElementById('cand_stage').value || 'screening';

            if (!name || !email) {
                alert('Please enter Candidate Name and Email.');
                return;
            }

            const tbody = document.getElementById('pgBody');
            const newId = tbody ? tbody.querySelectorAll('tr.cand-row').length + 1 : 1;
            const todayStr = new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }).replace(/ /g, '-');

            let stageBadgeClass = 'stage-screening';
            let stageBadgeText = 'Screening Call';
            if (stage === 'tech') {
                stageBadgeClass = 'stage-tech';
                stageBadgeText = 'Tech Round 1';
            } else if (stage === 'hr') {
                stageBadgeClass = 'stage-hr';
                stageBadgeText = 'HR Negotiation';
            } else if (stage === 'offered') {
                stageBadgeClass = 'stage-offered';
                stageBadgeText = 'Offer Released';
            } else if (stage === 'hired') {
                stageBadgeClass = 'stage-hired';
                stageBadgeText = 'Hired (Joining)';
            }

            const newTr = document.createElement('tr');
            newTr.className = 'cand-row';
            newTr.setAttribute('data-stage', stage);
            newTr.setAttribute('data-job', jobCode);
            newTr.setAttribute('data-jobtitle', jobTitle);

            newTr.innerHTML = `
                <td>${newId}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="${name}">
                        <div>
                            <div class="fw-bold text-dark">${name}</div>
                            <div class="text-muted" style="font-size:11px;">${email} • ${phone}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fw-semibold text-dark">${jobTitle}</div>
                    <span class="badge bg-light text-dark border" style="font-size:10.5px;">${dept}</span>
                </td>
                <td>
                    <div class="text-dark fw-semibold" style="font-size:12px;">${company} (${exp})</div>
                </td>
                <td>
                    <div class="fw-bold text-success" style="font-size:12.5px;">${ctc}</div>
                </td>
                <td>
                    <div class="fw-medium text-dark" style="font-size:12px;">${notice}</div>
                </td>
                <td>
                    <span class="stage-badge ${stageBadgeClass}">
                        <i class="bi bi-circle-fill" style="font-size:7px;"></i> ${stageBadgeText}
                    </span>
                </td>
                <td style="font-size:12px;">${todayStr}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Download Resume (PDF)">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </button>

                    </div>
                </td>
            `;

            if (tbody) {
                tbody.appendChild(newTr);
            }

            // Close modal & reset form
            const modalEl = document.getElementById('addCandidateModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                const inst = bootstrap.Modal.getInstance(modalEl);
                if (inst) inst.hide();
            }
            document.getElementById('addCandidateForm').reset();

            // Refresh table and counts
            updateStageTabCounts();
            if (window.refreshAttendanceTable) {
                window.refreshAttendanceTable();
            }
        });
    }
});
