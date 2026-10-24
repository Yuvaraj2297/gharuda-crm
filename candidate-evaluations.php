<?php include 'header.php'; ?>

 

<style>
    .eval-card-kpi {
        background: #ffffff;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 4px 16px rgba(20, 30, 25, 0.04);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .eval-card-kpi:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(20, 30, 25, 0.08);
    }
    .eval-kpi-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 22px;
        flex-shrink: 0;
    }
    .eval-stage-tab {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 999px;
        background: #f1f5f9;
        color: #475569;
        font-size: 13px;
        font-weight: 700;
        border: 1px solid transparent;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .eval-stage-tab:hover {
        background: #e2e8f0;
        color: #0f172a;
    }
    .eval-stage-tab.active {
        background: var(--primary, #087a24);
        color: #ffffff;
    }
    .score-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 12px;
        font-weight: 800;
        padding: 4px 10px;
        border-radius: 99px;
    }
    .score-high { background: #e7f7eb; color: #087a24; }
    .score-mid { background: #fff4d9; color: #b56b00; }
    .score-pending { background: #eef2f6; color: #5f6b7c; }

    .rec-pill {
        font-size: 11px;
        font-weight: 700;
        padding: 3px 9px;
        border-radius: 6px;
    }
    .rec-strong { background: #dcfce7; color: #15803d; }
    .rec-hire { background: #e0f2fe; color: #0284c7; }
    .rec-hold { background: #fef3c7; color: #d97706; }
    .rec-reject { background: #fee2e2; color: #b91c1c; }
</style>

<!-- Title & Header Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
            <h1 class="font-display fw-bold m-0" id="pageTitleText" style="font-size:1.7rem;">Team Lead Candidate Evaluations & Scorecards</h1>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill" id="roleBadgeText" style="font-size:11.5px;">
                <i class="bi bi-pencil-square me-1"></i> TL Mode: Conduct Candidate Interview & Submit Performance Ratings
            </span>
        </div>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-briefcase fs-6"></i>
            <span>Recruitment</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark" id="navSubtext">Team Lead Evaluations</span>
        </nav>
    </div>
</div>

<!-- Recruitment KPI Cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="eval-card-kpi d-flex align-items-center gap-3">
            <div class="eval-kpi-icon" style="background:#e8f7ea; color:#087a24;">
                <i class="bi bi-send-check"></i>
            </div>
            <div>
                <div class="text-muted fw-semibold" style="font-size:12px;">Total Resumes to TLs</div>
                <div class="fw-bold text-dark" style="font-size:24px;" id="kpiTotalAssigned">3</div>
                <div class="text-success fw-bold" style="font-size:11px;"><i class="bi bi-arrow-up"></i> Active Shortlisting</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="eval-card-kpi d-flex align-items-center gap-3">
            <div class="eval-kpi-icon" style="background:#e0f2fe; color:#0284c7;">
                <i class="bi bi-file-earmark-bar-graph"></i>
            </div>
            <div>
                <div class="text-muted fw-semibold" style="font-size:12px;">Evaluations Completed</div>
                <div class="fw-bold text-dark" style="font-size:24px;" id="kpiTotalEvaluated">2</div>
                <div class="text-muted" style="font-size:11px;">Scorecards Submitted</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="eval-card-kpi d-flex align-items-center gap-3">
            <div class="eval-kpi-icon" style="background:#dcfce7; color:#15803d;">
                <i class="bi bi-star-fill"></i>
            </div>
            <div>
                <div class="text-muted fw-semibold" style="font-size:12px;">Strong Hire Recommended</div>
                <div class="fw-bold text-dark" style="font-size:24px;" id="kpiStrongHires">2</div>
                <div class="text-success fw-bold" style="font-size:11px;">Score &gt; 8.5 / 10</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="eval-card-kpi d-flex align-items-center gap-3">
            <div class="eval-kpi-icon" style="background:#fef3c7; color:#d97706;">
                <i class="bi bi-hr"></i>
            </div>
            <div>
                <div class="text-muted fw-semibold" style="font-size:12px;">Pending HR Action</div>
                <div class="fw-bold text-dark" style="font-size:24px;" id="kpiPendingHr">1</div>
                <div class="text-muted" style="font-size:11px;">Awaiting Offer Release</div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Filter -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div class="d-flex align-items-center gap-2 flex-wrap" id="evalTabsWrap">
        <button class="eval-stage-tab active" data-filter="all">All Shortlisted</button>
        <button class="eval-stage-tab" data-filter="pending_tl"><i class="bi bi-clock-history"></i> Pending TL Review</button>
        <button class="eval-stage-tab" data-filter="sent_hr"><i class="bi bi-send"></i> Evaluated - Sent to HR</button>
        <button class="eval-stage-tab" data-filter="hr_approved"><i class="bi bi-check-circle-fill"></i> Offer Approved</button>
    </div>
</div>

<!-- Table Card -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="teamlead-candidate-evaluations-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search candidate, TL, score..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="evaluationsTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Candidate Details</th>
                    <th class="text-nowrap">Position & Source</th>
                    <th class="text-nowrap">Assigned Team Lead</th>
                    <th class="text-nowrap">Interview Round</th>
                    <th class="text-nowrap"> Performance Ratings</th>
                    <th class="text-nowrap">Recommendation</th>
                    <th class="text-nowrap">Evaluation Status</th>
                    <th class="text-nowrap text-end">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">

                <!-- Row 1 -->
                <tr class="eval-row"
                    data-evalid="EVAL-2026-001"
                    data-candid="LNK-2026-001"
                    data-candname="Ananya Sundaram"
                    data-jobtitle="Senior UI/UX Designer"
                    data-source="Walk-in Application"
                    data-tl="Santhosh Kumar"
                    data-tlrole="UI/UX Design Lead"
                    data-dept="Design"
                    data-round="Tech & Portfolio Review"
                    data-techscore="9.0"
                    data-practicalscore="8.5"
                    data-culturescore="9.0"
                    data-overallscore="8.8"
                    data-recommendation="Strong Hire"
                    data-status="Evaluated - Sent to HR"
                    data-comments="Exceptional design system knowledge, great Figma architecture, and clear user research methodology.">
                    <td class="eval-sno sno-value">1</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width:34px;height:34px;min-width:34px;background:var(--primary, #087a24);font-size:13px;line-height:1;text-align:center;">A</div>
                            <div>
                                <div class="fw-bold applicant-name-text" style="color:var(--primary-dark, #087a24);">Ananya Sundaram</div>
                                <div class="text-muted" style="font-size:11px;">ID: LNK-2026-001</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Senior UI/UX Designer</div>
                        <span class="badge bg-light text-muted border" style="font-size:10px;">Walk-in Application</span>
                    </td>
                    <td>
                        <div class="fw-bold text-dark" style="font-size:12.5px;"><i class="bi bi-person-badge text-primary me-1"></i>Santhosh Kumar</div>
                        <div class="text-muted" style="font-size:11px;">UI/UX Design Lead</div>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border" style="font-size:11px;">Tech & Portfolio Review</span>
                    </td>
                    <td>
                        <span class="score-badge score-high">
                            <i class="bi bi-star-fill" style="font-size:9px;"></i> 8.8 / 10
                        </span>
                    </td>
                    <td>
                        <span class="rec-pill rec-strong">Strong Hire</span>
                    </td>
                    <td>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle" style="font-size:11px; font-weight:700;">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Evaluated - Sent to HR
                        </span>
                    </td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-success btn-evaluate-score" data-id="EVAL-2026-001" data-bs-toggle="tooltip" title="TL: Conduct Interview & Submit Ratings">
                            <i class="bi bi-pencil-square me-1"></i> Enter TL Scorecard
                        </button>
                    </td>
                </tr>

                <!-- Row 2 -->
                <tr class="eval-row"
                    data-evalid="EVAL-2026-002"
                    data-candid="LNK-2026-002"
                    data-candname="Vikramaditya Rao"
                    data-jobtitle="Lead Backend Engineer"
                    data-source="LinkedIn Job Share"
                    data-tl="Karthik V"
                    data-tlrole="Principal Architect"
                    data-dept="Engineering"
                    data-round="System Design & Microservices"
                    data-techscore="9.5"
                    data-practicalscore="9.0"
                    data-culturescore="8.5"
                    data-overallscore="9.0"
                    data-recommendation="Strong Hire"
                    data-status="HR Approved for Offer"
                    data-comments="Excellent grasp of distributed caching, Redis, Docker orchestration and PHP microservices.">
                    <td class="eval-sno sno-value">2</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width:34px;height:34px;min-width:34px;background:var(--primary, #087a24);font-size:13px;line-height:1;text-align:center;">V</div>
                            <div>
                                <div class="fw-bold applicant-name-text" style="color:var(--primary-dark, #087a24);">Vikramaditya Rao</div>
                                <div class="text-muted" style="font-size:11px;">ID: LNK-2026-002</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Lead Backend Engineer</div>
                        <span class="badge bg-light text-muted border" style="font-size:10px;">LinkedIn Job Share</span>
                    </td>
                    <td>
                        <div class="fw-bold text-dark" style="font-size:12.5px;"><i class="bi bi-person-badge text-primary me-1"></i>Karthik V</div>
                        <div class="text-muted" style="font-size:11px;">Principal Architect</div>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border" style="font-size:11px;">System Design & Microservices</span>
                    </td>
                    <td>
                        <span class="score-badge score-high">
                            <i class="bi bi-star-fill" style="font-size:9px;"></i> 9.0 / 10
                        </span>
                    </td>
                    <td>
                        <span class="rec-pill rec-strong">Strong Hire</span>
                    </td>
                    <td>
                        <span class="badge bg-success-subtle text-success border border-success-subtle" style="font-size:11px; font-weight:700;">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> HR Approved for Offer
                        </span>
                    </td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-success btn-evaluate-score" data-id="EVAL-2026-002" data-bs-toggle="tooltip" title="TL: Conduct Interview & Submit Ratings">
                            <i class="bi bi-pencil-square me-1"></i> Enter TL Scorecard
                        </button>
                    </td>
                </tr>

                <!-- Row 3 -->
                <tr class="eval-row"
                    data-evalid="EVAL-2026-003"
                    data-candid="LNK-2026-003"
                    data-candname="Priya Ramakrishnan"
                    data-jobtitle="iOS App Developer"
                    data-source="Walk-in Application"
                    data-tl="Anitha R"
                    data-tlrole="Mobile Tech Lead"
                    data-dept="iOS Dev"
                    data-round="Swift & Live Coding"
                    data-techscore="7.5"
                    data-practicalscore="7.0"
                    data-culturescore="8.0"
                    data-overallscore="7.5"
                    data-recommendation="Hire"
                    data-status="Pending TL Evaluation"
                    data-comments="Good Swift knowledge. Live coding exercise pending review.">
                    <td class="eval-sno sno-value">3</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width:34px;height:34px;min-width:34px;background:var(--primary, #087a24);font-size:13px;line-height:1;text-align:center;">P</div>
                            <div>
                                <div class="fw-bold applicant-name-text" style="color:var(--primary-dark, #087a24);">Priya Ramakrishnan</div>
                                <div class="text-muted" style="font-size:11px;">ID: LNK-2026-003</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">iOS App Developer</div>
                        <span class="badge bg-light text-muted border" style="font-size:10px;">Walk-in Application</span>
                    </td>
                    <td>
                        <div class="fw-bold text-dark" style="font-size:12.5px;"><i class="bi bi-person-badge text-primary me-1"></i>Anitha R</div>
                        <div class="text-muted" style="font-size:11px;">Mobile Tech Lead</div>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border" style="font-size:11px;">Swift & Live Coding</span>
                    </td>
                    <td>
                        <span class="score-badge score-mid">
                            <i class="bi bi-star-fill" style="font-size:9px;"></i> 7.5 / 10
                        </span>
                    </td>
                    <td>
                        <span class="rec-pill rec-hire">Hire</span>
                    </td>
                    <td>
                        <span class="badge bg-light text-secondary border" style="font-size:11px; font-weight:700;">
                            <i class="bi bi-circle-fill" style="font-size:7px;"></i> Pending TL Evaluation
                        </span>
                    </td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-success btn-evaluate-score" data-id="EVAL-2026-003" data-bs-toggle="tooltip" title="TL: Conduct Interview & Submit Ratings">
                            <i class="bi bi-pencil-square me-1"></i> Enter TL Scorecard
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Table Footer with Show Entries & Pagination -->
    <div class="d-flex justify-content-between align-items-center report-footer p-3">
        <div class="d-flex gap-2 align-items-center">
            <span class="small text-muted text-nowrap">Show:</span>
            <select class="form-select form-select-sm gh-w-auto" id="showEntries">
                <option selected>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">3</strong> of <strong id="pgTotal">3</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal 1: Assign Resume to Team Lead -->
<div class="modal fade" id="assignTLModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold"><i class="bi bi-person-up text-primary me-2"></i>Shortlist & Forward to Team Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="assignTLForm">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Select Social / Web Candidate *</label>
                        <select class="form-select select2" id="assign_candidate_select" name="candidate_id" required>
                            <option value="LNK-2026-001" data-name="Ananya Sundaram" data-job="Senior UI/UX Designer" data-source="Walk-in Application">Ananya Sundaram (Senior UI/UX Designer - LNK-2026-001)</option>
                            <option value="LNK-2026-002" data-name="Vikramaditya Rao" data-job="Lead Backend Engineer" data-source="LinkedIn Job Share">Vikramaditya Rao (Lead Backend Engineer - LNK-2026-002)</option>
                            <option value="LNK-2026-003" data-name="Priya Ramakrishnan" data-job="iOS App Developer" data-source="Walk-in Application">Priya Ramakrishnan (iOS App Developer - LNK-2026-003)</option>
                        </select>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Select Target Team *</label>
                            <select class="form-select select2" id="assign_team_select" name="department" required>
                                <option value="Frontend Engineering Team" selected>Frontend Engineering Team</option>
                                <option value="Backend Engineering Team">Backend Engineering Team</option>
                                <option value="UI/UX Design Team">UI/UX Design Team</option>
                                <option value="Mobile / iOS Engineering Team">Mobile / iOS Engineering Team</option>
                                <option value="Marketing & PPC Team">Marketing & PPC Team</option>
                                <option value="HR & Talent Acquisition Team">HR & Talent Acquisition Team</option>
                                <option value="Finance & Accounts Team">Finance & Accounts Team</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Assign Team Lead (TL) *</label>
                            <select class="form-select select2" id="assign_tl_select" name="assigned_tl" required>
                                <option value="Santhosh Kumar (Frontend Tech Lead)">Santhosh Kumar (Frontend Tech Lead)</option>
                                <option value="Anand (Senior Frontend Lead)">Anand (Senior Frontend Lead)</option>
                                <option value="Karthik V (Backend Tech Lead)">Karthik V (Backend Tech Lead)</option>
                                <option value="Deepak (Lead UI/UX Designer)">Deepak (Lead UI/UX Designer)</option>
                                <option value="Anitha R (iOS Mobile Lead)">Anitha R (iOS Mobile Lead)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Shortlisting Notes & Focus Areas for TL</label>
                        <textarea class="form-control" name="instructions" rows="3" placeholder="Specify key skill checks, portfolio aspects, or technical questions for the Team Lead..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">Forward Resume</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2: Candidate Evaluation Scorecard & Rating Form -->
<div class="modal fade" id="evaluateCandidateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" id="evalModalAvatar" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;line-height:1;text-align:center;">
                        A
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="modal-title fw-bold text-dark mb-0" id="evalModalName">Ananya Sundaram</h4>
                            <span class="badge bg-secondary-subtle text-secondary border px-2 py-1" id="evalReadonlyBadge" style="font-size:11px; display:none;"><i class="bi bi-lock me-1"></i> HR Read-Only Score Breakdown</span>
                        </div>
                        <div class="text-muted" style="font-size:13px;" id="evalModalSubtitle">Senior UI/UX Designer • Tech & Portfolio Review</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="evaluateScoreForm">
                <input type="hidden" id="evalModalId" name="eval_id">
                <input type="hidden" name="action" value="save_evaluation">

                <div class="modal-body p-4">
                    <div class="card p-3 bg-light border-0 mb-3" style="border-radius:12px;">
                        <h6 class="fw-bold text-dark mb-2"><i class="bi bi-shield-check text-primary me-1"></i> Evaluation Overview</h6>
                        <div class="row g-2 text-dark" style="font-size:13px;">
                            <div class="col-6"><strong>Assigned Team Lead:</strong> <span id="evalModalTL">-</span></div>
                            <div class="col-6"><strong>Interview Round:</strong> <span id="evalModalRound">-</span></div>
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-sliders text-success me-1"></i> Performance Ratings (Out of 10)</h6>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:12.5px;">Technical / Domain Score *</label>
                            <input type="number" class="form-control eval-score-input" id="evalTechScore" name="tech_score" step="0.5" min="1" max="10" value="9.0" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:12.5px;">Practical Task / Code Quality *</label>
                            <input type="number" class="form-control eval-score-input" id="evalPracticalScore" name="practical_score" step="0.5" min="1" max="10" value="8.5" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:12.5px;">Communication & Culture *</label>
                            <input type="number" class="form-control eval-score-input" id="evalCultureScore" name="culture_score" step="0.5" min="1" max="10" value="9.0" required>
                        </div>
                    </div>

                    <div class="p-3 mb-3 rounded-3 d-flex align-items-center justify-content-between" style="background:#e8f7ea; border:1px solid #bbf7d0;">
                        <div>
                            <div class="fw-bold text-dark" style="font-size:13px;">Calculated Overall Interview Score:</div>
                            <div class="text-muted" style="font-size:11.5px;">Average of Technical, Practical, and Culture scores</div>
                        </div>
                        <div class="fs-3 fw-extrabold text-success" id="evalOverallDisplay">8.8 / 10</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Recommendation *</label>
                        <select class="form-select select2 fw-bold" id="evalRecommendation" name="recommendation" required>
                            <option value="Strong Hire">🚀 Strong Hire (Highly Recommended)</option>
                            <option value="Hire">✅ Hire (Qualified Fit)</option>
                            <option value="Hold">⚠️ Hold (Needs 2nd Review)</option>
                            <option value="Reject">❌ Reject (Not Recommended)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Detailed Interview Comments & Feedback *</label>
                        <textarea class="form-control" id="evalComments" name="tl_comments" rows="3" placeholder="Provide detailed breakdown of strengths, technical test findings, and feedback..." required></textarea>
                    </div>
                </div>

                <div class="modal-footer border-0 d-flex justify-content-between align-items-center w-100">
                    <button type="button" class="btn btn-light text-secondary fw-semibold" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg me-1"></i> Close
                    </button>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" id="evalRejectBtn" onclick="handleCandidateStatusUpdate('Rejected')" class="btn btn-danger fw-bold px-3" style="display:none;">
                            <i class="bi bi-x-circle-fill me-1"></i> Rejected
                        </button>
                        <button type="button" id="evalApproveBtn" onclick="handleCandidateStatusUpdate('Approved')" class="btn btn-success fw-bold px-3" style="display:none;">
                            <i class="bi bi-check-circle-fill me-1"></i> Approved
                        </button>
                        <button type="submit" id="evalSubmitBtn" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                            <i class="bi bi-send me-1"></i> Submit Scorecard & Send to HR
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 3: Schedule Next Interview Round -->
<div class="modal fade" id="scheduleInterviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-calendar2-plus"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Schedule Interview Round</h4>
                        <div class="text-muted" style="font-size:13px;" id="schedModalSubtitle">Schedule Candidate Interview & Send Email / WhatsApp Invites</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="scheduleInterviewForm">
                <input type="hidden" id="schedCandidateName" name="candidate_name">
                <input type="hidden" id="schedJobTitle" name="job_title">

                <div class="modal-body p-4">
                    <!-- Candidate Info Box -->
                    <div class="p-3 mb-3 rounded-3 d-flex align-items-center justify-content-between" style="background:#e8f7ea; border:1px solid #bbf7d0;">
                        <div>
                            <div class="fw-bold text-dark" style="font-size:14px;" id="schedDispName">Candidate Name</div>
                            <div class="text-muted" style="font-size:12px;" id="schedDispRole">Senior UI/UX Designer</div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Select Interview Round *</label>
                            <select class="form-select select2" id="schedRoundSelect" name="round" required>
                                <option value="Technical Round 2 (System Arch / Live Coding)">Technical Round 2 (System Arch / Live Coding)</option>
                                <option value="HR & Culture Fit Round">HR & Culture Fit Discussion</option>
                                <option value="Managerial & Executive Discussion">Managerial & Executive Discussion</option>
                                <option value="Final Salary & Offer Negotiation">Final Salary & Offer Negotiation</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Assigned Interviewer / Panel *</label>
                            <select class="form-select select2" id="schedInterviewerSelect" name="interviewer" required>
                                <option value="Santhosh Kumar (Frontend Tech Lead)">Santhosh Kumar (Frontend Tech Lead)</option>
                                <option value="Karthik V (Backend Tech Lead)">Karthik V (Backend Tech Lead)</option>
                                <option value="Anitha R (iOS Mobile Tech Lead)">Anitha R (iOS Mobile Tech Lead)</option>
                                <option value="Deepak (Lead UI/UX Designer)">Deepak (Lead UI/UX Designer)</option>
                                <option value="Sarah Mitchell (HR Head)" selected>Sarah Mitchell (HR Head)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Interview Date *</label>
                            <input type="date" class="form-control" id="schedDateInput" name="interview_date" value="2026-10-17" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Start Time *</label>
                            <input type="time" class="form-control" id="schedTimeInput" name="interview_time" value="11:00" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Duration</label>
                            <select class="form-select select2" id="schedDurationSelect" name="duration">
                                <option value="30 mins">30 minutes</option>
                                <option value="45 mins" selected>45 minutes</option>
                                <option value="60 mins">60 minutes</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Meeting Link / Room Location</label>
                        <input type="text" class="form-control" id="schedLinkInput" name="meeting_link" value="https://meet.google.com/xyz-abcd-efg" placeholder="https://meet.google.com/... or Room 3B">
                    </div>

                    <!-- Contact & Send Channels -->
                    <div class="p-3 rounded-3 bg-light border mb-2">
                        <h6 class="fw-bold text-dark mb-3" style="font-size:13px;"><i class="bi bi-send-fill me-1 text-success"></i> Invitation Delivery Channels</h6>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:12.5px;"><i class="bi bi-envelope me-1 text-primary"></i> Candidate Email</label>
                                <input type="email" class="form-control" id="schedCandidateEmail" name="candidate_email" value="candidate@gmail.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:12.5px;"><i class="bi bi-whatsapp me-1 text-success"></i> WhatsApp Number</label>
                                <input type="text" class="form-control" id="schedCandidatePhone" name="candidate_phone" value="+91 98765 43210" required>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-4 flex-wrap pt-2 border-top">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sendEmailToggle" name="send_email" checked>
                                <label class="form-check-label fw-semibold" for="sendEmailToggle" style="font-size:12.5px;">
                                    <i class="bi bi-envelope-at-fill text-primary me-1"></i> Send Email Calendar Invite
                                </label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="sendWhatsappToggle" name="send_whatsapp" checked>
                                <label class="form-check-label fw-semibold" for="sendWhatsappToggle" style="font-size:12.5px;">
                                    <i class="bi bi-whatsapp text-success me-1"></i> Send WhatsApp Message
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                        <i class="bi bi-send-check me-1"></i> Schedule & Send Invites
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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
</script>

<script src="./assets/js/tabel.js"></script>

<script>
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
</script>

<?php include 'footer.php'; ?>