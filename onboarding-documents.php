<?php include 'header.php'; ?>

 

<style>
    .doc-status-verified { color: #087a24; background: #e7f7eb; padding: 4px 10px; border-radius: 99px; font-size: 11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; }
    .doc-status-pending { color: #b56b00; background: #fff4d9; padding: 4px 10px; border-radius: 99px; font-size: 11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; }
    .doc-status-rejected { color: #be3035; background: #fdebed; padding: 4px 10px; border-radius: 99px; font-size: 11px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; }
    
    .category-pill { cursor: pointer; transition: all 0.2s ease; border: 1px solid #e2e8f0; font-size: 12px; font-weight: 600; padding: 6px 14px; border-radius: 8px; background: #ffffff; color: #475569; }
    .category-pill:hover, .category-pill.active { background: var(--primary, #087a24); color: #ffffff; border-color: var(--primary, #087a24); }

    .doc-cat-badge { font-weight: 600; font-size: 11px; padding: 4px 8px; border-radius: 6px; }
    .cat-identity { background: #e0f2fe; color: #0369a1; }
    .cat-address { background: #f0fdf4; color: #15803d; }
    .cat-education { background: #fef3c7; color: #b45309; }
    .cat-employment { background: #fae8ff; color: #86198f; }
    .cat-bank { background: #ecfeff; color: #0e7490; }
    .cat-statutory { background: #fff1f2; color: #be123c; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Document Verification & KYC Portal</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-person-check fs-6"></i>
            <span>Onboarding</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Document Verification</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-outline-secondary" type="button" onclick="alert('Document upload reminder email sent to all pending joiners!');">
            <i class="bi bi-envelope-arrow-up me-1"></i> Send Reminders
        </button>
        <a href="new-employee.php" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-file-earmark-plus me-1"></i> Upload & Submit Documents
        </a>
    </div>
</div>

<!-- Stats Bar -->
<div class="row g-3 mb-3">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 border-0 shadow-sm">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted fw-semibold small">Total Uploaded</span>
                    <h3 class="fw-bold mb-0 mt-1 text-dark">48</h3>
                </div>
                <div class="rounded-3 p-3 text-primary" style="background:#e7f7eb; color:var(--primary, #087a24) !important;">
                    <i class="bi bi-folder-check fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 border-0 shadow-sm">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted fw-semibold small">Verified & Approved</span>
                    <h3 class="fw-bold mb-0 mt-1 text-success">38</h3>
                </div>
                <div class="rounded-3 p-3 bg-success bg-opacity-10 text-success">
                    <i class="bi bi-shield-check fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 border-0 shadow-sm">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted fw-semibold small">Pending HR Review</span>
                    <h3 class="fw-bold mb-0 mt-1 text-warning">7</h3>
                </div>
                <div class="rounded-3 p-3 bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-hourglass-split fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 border-0 shadow-sm">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted fw-semibold small">Resubmission Needed</span>
                    <h3 class="fw-bold mb-0 mt-1 text-danger">3</h3>
                </div>
                <div class="rounded-3 p-3 bg-danger bg-opacity-10 text-danger">
                    <i class="bi bi-exclamation-triangle fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Category Quick Filter Bar -->
<div class="d-flex align-items-center gap-2 overflow-auto pb-2 mb-3">
    <span class="category-pill active"><i class="bi bi-grid-fill me-1"></i> All Categories (6)</span>
    <span class="category-pill"><i class="bi bi-card-heading me-1"></i> Identity</span>
    <span class="category-pill"><i class="bi bi-geo-alt me-1"></i> Address</span>
    <span class="category-pill"><i class="bi bi-journal-bookmark me-1"></i> Education</span>
    <span class="category-pill"><i class="bi bi-briefcase me-1"></i> Employment</span>
    <span class="category-pill"><i class="bi bi-bank me-1"></i> Bank / Payroll</span>
    <span class="category-pill"><i class="bi bi-file-earmark-text me-1"></i> Statutory / UAN</span>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="document-verification-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search joiner or document..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="documentsTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Joiner Name</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Document Type</th>
                    <th class="text-nowrap">Document / ID Number</th>
                    <th class="text-nowrap">Uploaded File</th>
                    <th class="text-nowrap">Upload Date</th>
                    <th class="text-nowrap">Verification Status</th>
                    <th class="text-nowrap">Verified By</th>
                    <th class="text-nowrap text-end">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <!-- Row 1: Identity -->
                <tr>
                    <td>1</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Kavitha Raman">
                            <div>
                                <a href="onboarding-document-view.php" class="fw-bold text-dark text-decoration-none">Kavitha Raman</a>
                                <div class="text-muted" style="font-size:11px;">UX Designer</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="doc-cat-badge cat-identity">Identity</span></td>
                    <td><span class="badge bg-light text-dark border">Aadhaar Card</span></td>
                    <td class="fw-bold text-dark">XXXX-XXXX-8921</td>
                    <td>
                        <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-secondary py-0 px-2" style="font-size:12px;">
                            <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> Aadhaar_Kavitha.pdf
                        </a>
                    </td>
                    <td>08-Mar-2026</td>
                    <td><span class="doc-status-verified"><i class="bi bi-check-circle-fill"></i> Verified</span></td>
                    <td>Sarah Mitchell (HR)</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Document Details"><i class="bi bi-eye me-1"></i> View Details</a>
                        </div>
                    </td>
                </tr>

                <!-- Row 2: Identity (PAN) -->
                <tr>
                    <td>2</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Rahul Verma">
                            <div>
                                <a href="onboarding-document-view.php" class="fw-bold text-dark text-decoration-none">Rahul Verma</a>
                                <div class="text-muted" style="font-size:11px;">Full Stack Dev</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="doc-cat-badge cat-identity">Identity</span></td>
                    <td><span class="badge bg-light text-dark border">PAN Card</span></td>
                    <td class="fw-bold text-dark">ABCDE1234F</td>
                    <td>
                        <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-secondary py-0 px-2" style="font-size:12px;">
                            <i class="bi bi-file-earmark-image me-1 text-primary"></i> PAN_Card_Rahul.jpg
                        </a>
                    </td>
                    <td>01-Mar-2026</td>
                    <td><span class="doc-status-pending"><i class="bi bi-hourglass-split"></i> Pending HR Review</span></td>
                    <td>Unassigned</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="onboarding-document-view.php" class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="Approve & View Details"><i class="bi bi-check-lg me-1"></i> View / Approve</a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="alert('Requested resubmission from candidate.');" data-bs-toggle="tooltip" title="Reject / Resubmit"><i class="bi bi-x-lg"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Row 3: Address -->
                <tr>
                    <td>3</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Siddharth Nair">
                            <div>
                                <a href="onboarding-document-view.php" class="fw-bold text-dark text-decoration-none">Siddharth Nair</a>
                                <div class="text-muted" style="font-size:11px;">iOS Dev</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="doc-cat-badge cat-address">Address</span></td>
                    <td><span class="badge bg-light text-dark border">Passport (Address Page)</span></td>
                    <td class="fw-bold text-dark">Z9876543</td>
                    <td>
                        <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-secondary py-0 px-2" style="font-size:12px;">
                            <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> Passport_Addr_Sid.pdf
                        </a>
                    </td>
                    <td>04-Mar-2026</td>
                    <td><span class="doc-status-verified"><i class="bi bi-check-circle-fill"></i> Verified</span></td>
                    <td>Sarah Mitchell (HR)</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Document Details"><i class="bi bi-eye me-1"></i> View Details</a>
                        </div>
                    </td>
                </tr>

                <!-- Row 4: Education -->
                <tr>
                    <td>4</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-4.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Priya Sundaram">
                            <div>
                                <a href="onboarding-document-view.php" class="fw-bold text-dark text-decoration-none">Priya Sundaram</a>
                                <div class="text-muted" style="font-size:11px;">Financial Analyst</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="doc-cat-badge cat-education">Education</span></td>
                    <td><span class="badge bg-light text-dark border">Degree Certificate</span></td>
                    <td class="fw-bold text-dark">MBA/FIN/2021/41</td>
                    <td>
                        <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-secondary py-0 px-2" style="font-size:12px;">
                            <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> MBA_Degree_Priya.pdf
                        </a>
                    </td>
                    <td>20-Feb-2026</td>
                    <td><span class="doc-status-verified"><i class="bi bi-check-circle-fill"></i> Verified</span></td>
                    <td>Sarah Mitchell (HR)</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Document Details"><i class="bi bi-eye me-1"></i> View Details</a>
                        </div>
                    </td>
                </tr>

                <!-- Row 5: Employment -->
                <tr>
                    <td>5</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Siddharth Nair">
                            <div>
                                <a href="onboarding-document-view.php" class="fw-bold text-dark text-decoration-none">Siddharth Nair</a>
                                <div class="text-muted" style="font-size:11px;">iOS Dev</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="doc-cat-badge cat-employment">Employment</span></td>
                    <td><span class="badge bg-light text-dark border">Relieving & Experience Letter</span></td>
                    <td class="fw-bold text-dark">ZOHO/EXP/2026/99</td>
                    <td>
                        <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-secondary py-0 px-2" style="font-size:12px;">
                            <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> Zoho_Relieving_Letter.pdf
                        </a>
                    </td>
                    <td>25-Feb-2026</td>
                    <td><span class="doc-status-verified"><i class="bi bi-check-circle-fill"></i> Verified</span></td>
                    <td>Sarah Mitchell (HR)</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Document Details"><i class="bi bi-eye me-1"></i> View Details</a>
                        </div>
                    </td>
                </tr>

                <!-- Row 6: Bank / Payroll -->
                <tr>
                    <td>6</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-5.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Ananya Gupta">
                            <div>
                                <a href="onboarding-document-view.php" class="fw-bold text-dark text-decoration-none">Ananya Gupta</a>
                                <div class="text-muted" style="font-size:11px;">HR Generalist</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="doc-cat-badge cat-bank">Bank / Payroll</span></td>
                    <td><span class="badge bg-light text-dark border">Cancelled Cheque</span></td>
                    <td class="fw-bold text-dark">HDFC 000123984712</td>
                    <td>
                        <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-secondary py-0 px-2" style="font-size:12px;">
                            <i class="bi bi-file-earmark-image me-1 text-primary"></i> HDFC_Cheque_Ananya.jpg
                        </a>
                    </td>
                    <td>10-Mar-2026</td>
                    <td><span class="doc-status-pending"><i class="bi bi-hourglass-split"></i> Pending HR Review</span></td>
                    <td>Unassigned</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="onboarding-document-view.php" class="btn btn-sm btn-success" data-bs-toggle="tooltip" title="Approve & View Details"><i class="bi bi-check-lg me-1"></i> View / Approve</a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="alert('Requested resubmission from candidate.');" data-bs-tooltip title="Reject / Resubmit"><i class="bi bi-x-lg"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Row 7: Statutory / UAN -->
                <tr>
                    <td>7</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Kavitha Raman">
                            <div>
                                <a href="onboarding-document-view.php" class="fw-bold text-dark text-decoration-none">Kavitha Raman</a>
                                <div class="text-muted" style="font-size:11px;">UX Designer</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="doc-cat-badge cat-statutory">Statutory / UAN</span></td>
                    <td><span class="badge bg-light text-dark border">UAN & PF Details Form 11</span></td>
                    <td class="fw-bold text-dark">UAN: 101293847561</td>
                    <td>
                        <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-secondary py-0 px-2" style="font-size:12px;">
                            <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> UAN_Form11_Kavitha.pdf
                        </a>
                    </td>
                    <td>09-Mar-2026</td>
                    <td><span class="doc-status-verified"><i class="bi bi-check-circle-fill"></i> Verified</span></td>
                    <td>Sarah Mitchell (HR)</td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="onboarding-document-view.php" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Document Details"><i class="bi bi-eye me-1"></i> View Details</a>
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
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">7</strong> of <strong id="pgTotal">7</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>

