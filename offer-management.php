<?php include 'header.php'; ?>


 
 

<style>
    .offer-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 99px;
    }

    .offer-accepted {
        background: #dcfce7;
        color: #15803d;
    }

    .offer-pending {
        background: #fff4d9;
        color: #b56b00;
    }

    .offer-draft {
        background: #f1f5f9;
        color: #475569;
    }

    .offer-declined {
        background: #fee2e2;
        color: #b91c1c;
    }

    /* PDF View Styling */
    .offer-pdf-paper {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 36px;
        font-family: 'Inter', 'Segoe UI', sans-serif;
        color: #1e293b;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    }

    .pdf-company-logo {
        height: 42px;
        width: auto;
    }

    .pdf-divider {
        height: 3px;
        background: linear-gradient(90deg, #087a24 0%, #16a34a 100%);
        border: none;
        margin: 16px 0 24px 0;
    }

    .salary-table th {
        background: #f8fafc;
        color: #475569;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .salary-table td {
        font-size: 13px;
    }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Job Offer Letters & Approvals</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-file-earmark-check fs-6 text-success"></i>
            <span>Recruitment</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Offer Letters</span>
        </nav>
    </div>
    <div class="d-flex gap-2">

        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#generateOfferModal"
            style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-plus-lg me-1"></i> Generate Offer Letter
        </button>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search (matching job-openings.php) -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="offer-letters-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i
                    class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search candidate, job title..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="offersTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Candidate Name</th>
                    <th class="text-nowrap">Email Address</th>
                    <th class="text-nowrap">Offered Designation</th>
                    <th class="text-nowrap">Department</th>
                    <th class="text-nowrap">Offered CTC</th>
                    <th class="text-nowrap">Monthly Gross</th>
                    <th class="text-nowrap">Target Joining</th>
                    <th class="text-nowrap">Approval State</th>
                    <th class="text-nowrap">Offer Status</th>
                    <th class="text-nowrap text-end">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr class="offer-row" data-candname="Kavitha Raman" data-email="kavitha.r@example.com"
                    data-phone="+91 98401 23456" data-job="Senior UI/UX Designer" data-dept="Design Department"
                    data-ctc="₹16,50,000 / yr" data-gross="₹1,37,500 / mo" data-basic="₹68,750" data-hra="₹34,375"
                    data-allowance="₹34,375" data-joining="15-Mar-2026" data-expiry="10-Mar-2026"
                    data-ref="GHR/2026/OFF-101" data-status="Accepted">
                    <td>1</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0"
                                style="width:34px;height:34px;background:var(--primary, #087a24);font-size:13px;">
                                K
                            </div>
                            <div class="fw-bold text-dark">Kavitha Raman</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>kavitha.r@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Senior UI/UX Designer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Design</span>
                    </td>
                    <td class="fw-semibold text-dark">UI/UX Design Team</td>
                    <td class="fw-bold text-success">₹16,50,000 / yr</td>
                    <td class="text-dark">₹1,37,500 / mo</td>
                    <td class="fw-semibold">15-Mar-2026</td>
                    <td style="font-size:12px;color:var(--ink-700);"><i
                            class="bi bi-check-circle-fill text-success me-1"></i> Approved (HR & CFO)</td>
                    <td><span class="offer-status-badge offer-accepted"><i class="bi bi-circle-fill"
                                style="font-size:7px;"></i> Accepted</span></td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-danger btn-view-offer-pdf"
                                data-bs-toggle="tooltip" title="View Official Offer Letter PDF">
                                <i class="bi bi-file-earmark-pdf-fill me-1"></i> View PDF
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-offer"
                                data-bs-toggle="tooltip" title="Send Offer via WhatsApp or Email">
                                <i class="bi bi-send-fill me-1"></i> Send
                            </button>
                            <a href="employee-create.php?prefill=Kavitha+Raman" class="btn btn-sm btn-success"
                                style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);"
                                data-bs-toggle="tooltip" title="Onboard to Employee Master">
                                <i class="bi bi-person-plus-fill me-1"></i> Onboard
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="offer-row" data-candname="Rahul Verma" data-email="rahul.v@example.com"
                    data-phone="+91 98765 43210" data-job="Lead Backend Engineer" data-dept="Engineering Department"
                    data-ctc="₹26,00,000 / yr" data-gross="₹2,16,666 / mo" data-basic="₹1,08,333" data-hra="₹54,166"
                    data-allowance="₹54,167" data-joining="01-Apr-2026" data-expiry="25-Mar-2026"
                    data-ref="GHR/2026/OFF-102" data-status="Accepted">
                    <td>2</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0"
                                style="width:34px;height:34px;background:var(--primary, #087a24);font-size:13px;">
                                R
                            </div>
                            <div class="fw-bold text-dark">Rahul Verma</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>rahul.v@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Lead Backend Engineer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Backend Eng</span>
                    </td>
                    <td class="fw-semibold text-dark">Backend Engineering Team</td>
                    <td class="fw-bold text-success">₹26,00,000 / yr</td>
                    <td class="text-dark">₹2,16,666 / mo</td>
                    <td class="fw-semibold">01-Apr-2026</td>
                    <td style="font-size:12px;color:var(--ink-700);"><i
                            class="bi bi-check-circle-fill text-success me-1"></i> Approved (HR & CEO)</td>
                    <td><span class="offer-status-badge offer-accepted"><i class="bi bi-circle-fill"
                                style="font-size:7px;"></i> Accepted</span></td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-danger btn-view-offer-pdf"
                                data-bs-toggle="tooltip" title="View Official Offer Letter PDF">
                                <i class="bi bi-file-earmark-pdf-fill me-1"></i> View PDF
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-offer"
                                data-bs-toggle="tooltip" title="Send Offer via WhatsApp or Email">
                                <i class="bi bi-send-fill me-1"></i> Send
                            </button>
                            <a href="employee-create.php?prefill=Rahul+Verma" class="btn btn-sm btn-success"
                                style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);"
                                data-bs-toggle="tooltip" title="Onboard to Employee Master">
                                <i class="bi bi-person-plus-fill me-1"></i> Onboard
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="offer-row" data-candname="Arun Kumar" data-email="arun.k@example.com"
                    data-phone="+91 97890 12345" data-job="Senior Backend Developer" data-dept="Engineering Department"
                    data-ctc="₹22,00,000 / yr" data-gross="₹1,83,333 / mo" data-basic="₹91,666" data-hra="₹45,833"
                    data-allowance="₹45,834" data-joining="10-Apr-2026" data-expiry="30-Mar-2026"
                    data-ref="GHR/2026/OFF-103" data-status="Awaiting Candidate">
                    <td>3</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0"
                                style="width:34px;height:34px;background:var(--primary, #087a24);font-size:13px;">
                                A
                            </div>
                            <div class="fw-bold text-dark">Arun Kumar</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>arun.k@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Senior Backend Developer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Backend Eng</span>
                    </td>
                    <td class="fw-semibold text-dark">Backend Engineering Team</td>
                    <td class="fw-bold text-success">₹22,00,000 / yr</td>
                    <td class="text-dark">₹1,83,333 / mo</td>
                    <td class="fw-semibold">10-Apr-2026</td>
                    <td style="font-size:12px;color:var(--ink-700);"><i
                            class="bi bi-check-circle-fill text-success me-1"></i> Approved (HR Head)</td>
                    <td><span class="offer-status-badge offer-pending"><i class="bi bi-circle-fill"
                                style="font-size:7px;"></i> Awaiting Candidate</span></td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-danger btn-view-offer-pdf"
                                data-bs-toggle="tooltip" title="View Official Offer Letter PDF">
                                <i class="bi bi-file-earmark-pdf-fill me-1"></i> View PDF
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-offer"
                                data-bs-toggle="tooltip" title="Send Offer via WhatsApp or Email">
                                <i class="bi bi-send-fill me-1"></i> Send
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="offer-row" data-candname="Ananya Sundaram" data-email="ananya.s@example.com"
                    data-phone="+91 98402 11223" data-job="Senior UI/UX Designer" data-dept="UI/UX Design Department"
                    data-ctc="₹18,00,000 / yr" data-gross="₹1,50,000 / mo" data-basic="₹75,000" data-hra="₹37,500"
                    data-allowance="₹37,500" data-joining="20-Mar-2026" data-expiry="15-Mar-2026"
                    data-ref="GHR/2026/OFF-104" data-status="Sent to Candidate">
                    <td>4</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0"
                                style="width:34px;height:34px;background:var(--primary, #087a24);font-size:13px;">
                                A
                            </div>
                            <div class="fw-bold text-dark">Ananya Sundaram</div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-medium text-dark" style="font-size:12.5px;"><i
                                class="bi bi-envelope me-1 text-secondary"></i>ananya.s@example.com</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark">Senior UI/UX Designer</div>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Design</span>
                    </td>
                    <td class="fw-semibold text-dark">UI/UX Design Team</td>
                    <td class="fw-bold text-success">₹18,00,000 / yr</td>
                    <td class="text-dark">₹1,50,000 / mo</td>
                    <td class="fw-semibold">20-Mar-2026</td>
                    <td style="font-size:12px;color:var(--ink-700);"><i
                            class="bi bi-check-circle-fill text-success me-1"></i> Approved (HR & CFO)</td>
                    <td><span class="offer-status-badge offer-pending"><i class="bi bi-circle-fill"
                                style="font-size:7px;"></i> Awaiting Candidate</span></td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-danger btn-view-offer-pdf"
                                data-bs-toggle="tooltip" title="View Official Offer Letter PDF">
                                <i class="bi bi-file-earmark-pdf-fill me-1"></i> View PDF
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-success btn-send-offer"
                                data-bs-toggle="tooltip" title="Send Offer via WhatsApp or Email">
                                <i class="bi bi-send-fill me-1"></i> Send
                            </button>
                        </div>
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
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong
                    id="pgEnd">4</strong> of <strong id="pgTotal">4</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal 1: Generate & Create Job Offer Letter -->
<div class="modal fade" id="generateOfferModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold"
                        style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-file-earmark-plus"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Generate Official Job Offer Letter</h4>
                        <div class="text-muted" style="font-size:13px;">Enter Full Candidate Compensation Structure,
                            Designation & Approval Workflow</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="generateOfferForm">
                <div class="modal-body p-4">

                    <!-- Candidate Selection Section -->
                    <div class="card p-3 bg-light border-0 mb-3" style="border-radius:12px;">
                        <h6 class="fw-bold text-dark mb-2"><i class="bi bi-person-badge text-success me-1"></i>
                            Candidate Profile Details</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:13px;">Select Shortlisted
                                    Candidate *</label>
                                <select class="form-select select2" id="offerCandidateSelect" name="candidate_name"
                                    required>
                                    <option value="Ananya Sundaram" data-email="ananya.s@example.com"
                                        data-job="Senior UI/UX Designer" data-ctc="1800000" selected>Ananya Sundaram
                                        (Senior UI/UX Designer - TL Score 8.8)</option>
                                    <option value="Siddharth Nair" data-email="sid.nair@example.com"
                                        data-job="iOS App Developer" data-ctc="1400000">Siddharth Nair (iOS App
                                        Developer - TL Score 7.5)</option>
                                    <option value="Arun Kumar" data-email="arun.k@example.com"
                                        data-job="Senior Backend Developer" data-ctc="2200000">Arun Kumar (Senior
                                        Backend Developer - TL Score 9.0)</option>
                                    <option value="Vikramaditya Rao" data-email="vikram.rao@example.com"
                                        data-job="Lead Backend Engineer" data-ctc="2600000">Vikramaditya Rao (Lead
                                        Backend Engineer - TL Score 9.5)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:13px;">Candidate Email Address
                                    *</label>
                                <input type="email" class="form-control" id="offerCandidateEmail" name="email"
                                    value="ananya.s@example.com" required>
                            </div>
                        </div>
                    </div>

                    <!-- Role & Department Details -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Offered Designation / Position
                                *</label>
                            <input type="text" class="form-control" id="offerJobTitle" name="job_title"
                                value="Senior UI/UX Designer" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Target Department *</label>
                            <select class="form-select select2" name="department" required>
                                <option value="UI/UX Design Department" selected>UI/UX Design Department</option>
                                <option value="Backend Engineering Department">Backend Engineering Department</option>
                                <option value="Mobile Engineering Department">Mobile Engineering Department</option>
                                <option value="HR & Talent Acquisition">HR & Talent Acquisition</option>
                                <option value="Finance & Accounts">Finance & Accounts</option>
                            </select>
                        </div>
                    </div>

                    <!-- Salary Breakdown Section -->
                    <div class="card p-3 border mb-3" style="border-radius:12px; background:#fcfdfc;">
                        <h6 class="fw-bold text-success mb-3"><i class="bi bi-cash-stack me-1"></i> CTC & Compensation
                            Breakdown</h6>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:13px;">Annual Cost to Company
                                    (CTC ₹) *</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" class="form-control fw-bold text-success" id="offerCtcInput"
                                        name="annual_ctc" value="1800000" placeholder="e.g. 1800000" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:13px;">Calculated Monthly Gross
                                    (₹)</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="text" class="form-control bg-light fw-bold" id="offerGrossDisplay"
                                        value="1,50,000 / month" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2 text-dark p-2 bg-light rounded-3" style="font-size:12.5px;">
                            <div class="col-md-4"><strong>Basic Salary (50%):</strong> <span id="offerBasicDisp"
                                    class="text-success fw-semibold">₹75,000 / mo</span></div>
                            <div class="col-md-4"><strong>HRA Allowance (25%):</strong> <span id="offerHraDisp"
                                    class="text-dark">₹37,500 / mo</span></div>
                            <div class="col-md-4"><strong>Special Allowance (25%):</strong> <span id="offerSpecialDisp"
                                    class="text-dark">₹37,500 / mo</span></div>
                        </div>
                    </div>

                    <!-- Joining Dates & Validity -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <div class="date-picker">
                                <label class="form-label fw-semibold" style="font-size:13px;">Target Joining Date
                                    *</label>
                                <input type="text" class="date-input form-control" placeholder="DD-MM-YYYY"
                                    maxlength="10" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="date-picker">
                                <label class="form-label fw-semibold" style="font-size:13px;">Offer Letter Expiry Date
                                    *</label>
                                <input type="text" class="date-input form-control" placeholder="DD-MM-YYYY"
                                    maxlength="10" autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Approval Workflow *</label>
                            <select class="form-select select2" name="approver">
                                <option value="Approved by HR Head & CFO" selected>HR Head & CFO Approval</option>
                                <option value="Approved by Managing Director">MD & CEO Approval</option>
                                <option value="HR Manager Draft">HR Manager Draft Only</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="font-size:13px;">Special Terms, Joining Bonus &
                            Relocation Notes</label>
                        <textarea class="form-control" name="notes" rows="2"
                            placeholder="Enter relocation allowance, joining bonus clause, or probation terms..."></textarea>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"
                        style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                        <i class="bi bi-file-earmark-check me-1"></i> Generate & Send Offer PDF
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2: Official Offer Letter PDF Viewer Modal -->
<div class="modal fade" id="viewOfferPdfModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header bg-dark text-white p-3">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-file-earmark-pdf-fill text-danger fs-4"></i>
                    <div>
                        <h5 class="modal-title fw-bold text-white mb-0" id="pdfModalTitle">Official Employment Offer
                            Letter Document</h5>
                        <div class="text-white-50" style="font-size:12px;" id="pdfModalSubtitle">Document Ref:
                            GHR/2026/OFF-101</div>
                    </div>
                </div>
                <div class="d-flex gap-2 align-items-center ms-auto">
                    <button type="button" class="btn btn-sm btn-outline-light" onclick="window.print();">
                        <i class="bi bi-printer me-1"></i> Print PDF
                    </button>
                    <button type="button" class="btn btn-sm btn-success"
                        style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);"
                        onclick="alert('Downloading official signed Offer Letter PDF...');">
                        <i class="bi bi-download me-1"></i> Download PDF
                    </button>
                    <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            </div>

            <div class="modal-body p-4 bg-light">
                <!-- PDF Document Paper View -->
                <div class="offer-pdf-paper">

                    <!-- Letter Header -->
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h3 class="fw-extrabold text-success mb-0" style="letter-spacing:-0.5px; font-weight:800;">
                                GHARUDA HR TECHNOLOGIES</h3>
                            <div class="text-muted" style="font-size:12px;">Enterprise Software & HR Solutions Pvt Ltd
                            </div>
                            <div class="text-muted" style="font-size:11px;">IT Park Tower, Phase 2, OMR Road, Chennai -
                                600096</div>
                        </div>
                        <div class="text-end">
                            <span
                                class="badge bg-success-subtle text-success border border-success-subtle fw-bold px-3 py-2"
                                style="font-size:12px;" id="pdfStatusBadge">OFFER LETTER</span>
                            <div class="text-muted mt-2" style="font-size:12px;">Date: <strong
                                    id="pdfDate">15-Sep-2026</strong></div>
                            <div class="text-muted" style="font-size:12px;">Ref: <strong
                                    id="pdfRefNo">GHR/2026/OFF-101</strong></div>
                        </div>
                    </div>

                    <hr class="pdf-divider">

                    <!-- Candidate Address Block -->
                    <div class="mb-4">
                        <div class="fw-bold text-dark" style="font-size:14px;" id="pdfCandName">Kavitha Raman</div>
                        <div class="text-muted" style="font-size:13px;" id="pdfCandEmail">kavitha.r@example.com</div>
                        <div class="text-muted" style="font-size:13px;" id="pdfCandPhone">+91 98401 23456</div>
                    </div>

                    <!-- Subject -->
                    <div class="mb-3 p-2 bg-light rounded-2 border">
                        <strong class="text-dark" style="font-size:13px;">Subject: Letter of Intent & Formal Offer of
                            Employment for the position of <span id="pdfSubjJob" class="text-success fw-bold">Senior
                                UI/UX Designer</span></strong>
                    </div>

                    <!-- Salutation & Opening Paragraph -->
                    <p style="font-size:13px; line-height:1.6;" class="text-dark">
                        Dear <strong id="pdfSaluteName">Kavitha Raman</strong>,<br><br>
                        Following our technical evaluations and interview discussions, we are pleased to offer you the
                        position of <strong id="pdfTextJob">Senior UI/UX Designer</strong> in the <strong
                            id="pdfTextDept">Design Department</strong> at <strong>Gharuda HR Technologies</strong>.
                    </p>

                    <p style="font-size:13px; line-height:1.6;" class="text-dark">
                        Your target date of joining will be <strong id="pdfTextJoining"
                            class="text-success">15-Mar-2026</strong> at our Chennai Development Center. This offer is
                        subject to your acceptance on or before <strong id="pdfTextExpiry">10-Mar-2026</strong>.
                    </p>

                    <!-- Salary Breakdown Annexure Table -->
                    <h6 class="fw-bold text-dark mt-4 mb-2"><i class="bi bi-file-earmark-text text-success me-1"></i>
                        Annexure A: Compensation & Salary Breakdown</h6>
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered salary-table mb-0">
                            <thead>
                                <tr>
                                    <th>Salary Component</th>
                                    <th class="text-end">Monthly Breakdown (₹)</th>
                                    <th class="text-end">Annual CTC (₹)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Basic Salary (50%)</td>
                                    <td class="text-end fw-semibold" id="pdfBasicMonthly">₹68,750</td>
                                    <td class="text-end" id="pdfBasicAnnual">₹8,25,000</td>
                                </tr>
                                <tr>
                                    <td>House Rent Allowance (HRA 25%)</td>
                                    <td class="text-end" id="pdfHraMonthly">₹34,375</td>
                                    <td class="text-end" id="pdfHraAnnual">₹4,12,500</td>
                                </tr>
                                <tr>
                                    <td>Special & Flexible Allowances (25%)</td>
                                    <td class="text-end" id="pdfAllowMonthly">₹34,375</td>
                                    <td class="text-end" id="pdfAllowAnnual">₹4,12,500</td>
                                </tr>
                                <tr class="table-success fw-bold">
                                    <td>Total Cost to Company (CTC)</td>
                                    <td class="text-end text-success fs-6" id="pdfGrossMonthly">₹1,37,500</td>
                                    <td class="text-end text-success fs-6" id="pdfCtcAnnual">₹16,50,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Terms & Signature Block -->
                    <p style="font-size:12.5px; line-height:1.6;" class="text-muted">
                        * Note: Deductions toward Provident Fund (PF), Professional Tax, and Income Tax (TDS) will apply
                        as per applicable statutory rules.
                    </p>

                    <div class="row pt-4 mt-4 border-top">
                        <div class="col-6">
                            <div class="fw-bold text-dark" style="font-size:13px;">For Gharuda HR Technologies</div>
                            <div class="mt-4 pt-2">
                                <img src="./assets/img/profile-1.jpg" class="rounded-circle me-2"
                                    style="width:36px;height:36px;" alt="HR Head">
                                <strong class="text-dark" style="font-size:13px;">Sarah Mitchell</strong>
                                <div class="text-muted" style="font-size:11px;">Head of Talent Acquisition & HR</div>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <div class="fw-bold text-dark" style="font-size:13px;">Candidate Acceptance</div>
                            <div class="mt-4 pt-3 text-muted" style="font-size:12px;">
                                _______________________<br>
                                <span id="pdfSignName">Kavitha Raman</span> (Signature & Date)
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close Preview</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3: Send Offer Letter via WhatsApp or Email -->
<div class="modal fade" id="sendOfferModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold"
                        style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-send-fill"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Send Official Offer Letter</h4>
                        <div class="text-muted" style="font-size:13px;" id="sendModalSubtitle">Dispatch Offer Document
                            to Candidate via Email or WhatsApp</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" id="sendCandRef">
                <input type="hidden" id="sendOfferLinkHidden">

                <div class="card p-3 bg-light border-0 mb-3" style="border-radius:12px;">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div>
                            <h6 class="fw-bold text-dark mb-0" id="sendCandName">Candidate Name</h6>
                            <div class="text-muted" style="font-size:12px;" id="sendCandRole">Role & Department</div>
                        </div>
                        <span
                            class="badge bg-success-subtle text-success border border-success-subtle fw-bold px-2 py-1"
                            style="font-size:11px;" id="sendOfferRef">GHR/2026/OFF-101</span>
                    </div>
                </div>

                <!-- Channel Tabs -->
                <ul class="nav nav-pills nav-justified mb-3 p-1 bg-light rounded-3" id="sendChannelTabs" role="tablist"
                    style="font-size:13px;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-semibold" id="wa-tab" data-bs-toggle="tab"
                            data-bs-target="#wa-pane" type="button" role="tab"><i
                                class="bi bi-whatsapp me-1 text-success"></i> WhatsApp</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-semibold" id="email-tab" data-bs-toggle="tab"
                            data-bs-target="#email-pane" type="button" role="tab"><i
                                class="bi bi-envelope-fill me-1 text-primary"></i> Email</button>
                    </li>
                </ul>

                <div class="tab-content" id="sendChannelContent">
                    <!-- WhatsApp Tab Pane -->
                    <div class="tab-pane fade show active" id="wa-pane" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;"><i
                                    class="bi bi-whatsapp text-success me-1"></i> WhatsApp Phone Number *</label>
                            <input type="text" class="form-control" id="sendWaPhone" value="+91 98401 23456"
                                placeholder="+91 98765 43210">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">WhatsApp Message
                                Preview</label>
                            <textarea class="form-control bg-light" id="sendWaMsg" rows="6"
                                style="font-size:12.5px; font-family:inherit;"></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-success w-100 fw-bold" id="btnSendWaNow"
                                style="background:#25D366; border-color:#25D366;">
                                <i class="bi bi-whatsapp me-1"></i> Open WhatsApp Web & Send
                            </button>
                        </div>
                    </div>

                    <!-- Email Tab Pane -->
                    <div class="tab-pane fade" id="email-pane" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;"><i
                                    class="bi bi-envelope-at-fill text-primary me-1"></i> Candidate Email Address
                                *</label>
                            <input type="email" class="form-control" id="sendEmailAddr" value="candidate@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Email Subject *</label>
                            <input type="text" class="form-control" id="sendEmailSubj"
                                value="Job Offer Letter - Gharuda HR Technologies">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Email Message Body</label>
                            <textarea class="form-control bg-light" id="sendEmailBody" rows="5"
                                style="font-size:12.5px;"></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary w-100 fw-bold" id="btnSendEmailNow">
                                <i class="bi bi-envelope-check-fill me-1"></i> Launch Email Client (Mailto)
                            </button>
                        </div>
                    </div>
                </div>

                <hr class="my-3">
                <div class="d-flex align-items-center justify-content-between text-muted flex-wrap gap-2"
                    style="font-size:12px;">
                    <span><i class="bi bi-link-45deg me-1 text-success"></i> Direct Document View Link:</span>
                    <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2" id="btnCopyOfferLink"
                        style="font-size:11.5px;">
                        <i class="bi bi-clipboard me-1"></i> Copy Link
                    </button>
                </div>

            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<script src="./assets/js/pages/offer-management.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>

 