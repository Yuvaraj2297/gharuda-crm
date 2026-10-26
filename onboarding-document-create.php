<?php include 'header.php'; ?>

 

<style>
    .doc-category-card {
        background: #ffffff;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 4px 16px rgba(20, 30, 25, .03);
    }
    .doc-category-title {
        font-size: 15.5px;
        font-weight: 700;
        color: var(--ink-900);
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .doc-upload-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 16px;
        height: 100%;
        /* display: flex;
        flex-column;
        justify-content: space-between; */
        transition: all 0.2s ease;
    }
    .doc-upload-item:hover {
        border-color: var(--primary, #087a24);
        background: #f0fdf4;
    }
    .doc-label {
        font-size: 13px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 4px;
    }
    .doc-subtext {
        font-size: 11.5px;
        color: #64748b;
        margin-bottom: 12px;
    }
    .file-input-wrapper {
        position: relative;
    }
    .badge-cat {
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 99px;
    }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
    <div>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <a href="onboarding-documents.php" class="text-decoration-none text-muted"><i class="bi bi-file-earmark-check me-1"></i> Document Verification</a>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Submit Candidate KYC Documents</span>
        </nav>
        <h1 class="font-display fw-bold mb-0 mt-1" style="font-size:1.68rem;">Candidate Onboarding Document Submission</h1>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <a href="onboarding-documents.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Document Portal
        </a>
        <button type="submit" form="documentSubmissionForm" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-send-check me-1"></i> Submit All Documents
        </button>
    </div>
</div>

<form id="documentSubmissionForm">

    <!-- Candidate Selection Header Card -->
    <div class="card p-3 border mb-4 bg-light" style="border-radius:14px;">
        <div class="row g-3 align-items-center">
            <div class="col-md-5">
                <label class="form-label fw-bold" style="font-size:13px;">Select Candidate / New Joiner *</label>
                <select class="form-select" id="docCandidateSelect" name="candidate_id" required>
                    <option value="Kavitha Raman" data-dept="UI/UX Design Department" data-id="JOIN-2026-101" data-date="15-Mar-2026" selected>Kavitha Raman (Senior UI/UX Designer - JOIN-101)</option>
                    <option value="Rahul Verma" data-dept="Backend Engineering" data-id="JOIN-2026-102" data-date="01-Apr-2026">Rahul Verma (Lead Backend Engineer - JOIN-102)</option>
                    <option value="Siddharth Nair" data-dept="Mobile Engineering" data-id="JOIN-2026-103" data-date="20-Mar-2026">Siddharth Nair (iOS App Developer - JOIN-103)</option>
                    <option value="Ananya Sundaram" data-dept="UI/UX Design Department" data-id="JOIN-2026-104" data-date="20-Mar-2026">Ananya Sundaram (Senior UI/UX Designer - JOIN-104)</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label text-muted" style="font-size:12px;">Joiner ID</label>
                <div class="fw-bold text-dark" id="dispJoinerId">JOIN-2026-101</div>
            </div>
            <div class="col-md-2">
                <label class="form-label text-muted" style="font-size:12px;">Department</label>
                <div class="fw-bold text-success" id="dispDept">UI/UX Design</div>
            </div>
            <div class="col-md-2">
                <label class="form-label text-muted" style="font-size:12px;">Target Joining</label>
                <div class="fw-bold text-dark" id="dispJoiningDate">15-Mar-2026</div>
            </div>
        </div>
    </div>

    <!-- Category 1: Identity Documents -->
    <div class="doc-category-card">
        <div class="doc-category-title">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-person-badge-fill text-success fs-5"></i>
                <span>1. Identity Verification Documents</span>
            </div>
            <span class="badge-cat bg-success-subtle text-success border border-success-subtle">4 Document Requirements</span>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-card-text text-primary me-1"></i> Aadhaar Card</div>
                        <div class="doc-subtext">Front & Back combined PDF/Image</div>
                        <input type="text" class="form-control form-control-sm mb-2" name="aadhaar_num" placeholder="Enter Aadhaar Number">
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_aadhaar" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-credit-card-2-front text-success me-1"></i> PAN Card</div>
                        <div class="doc-subtext">Clear photo/scan of PAN Card</div>
                        <input type="text" class="form-control form-control-sm mb-2" name="pan_num" placeholder="Enter PAN Number (e.g. ABCDE1234F)">
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_pan" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-journal-bookmark text-info me-1"></i> Passport</div>
                        <div class="doc-subtext">First & Last page scan (Optional)</div>
                        <input type="text" class="form-control form-control-sm mb-2" name="passport_num" placeholder="Enter Passport Number">
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_passport" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-card-heading text-warning me-1"></i> Driving Licence / Voter ID</div>
                        <div class="doc-subtext">Government issued Photo ID Proof</div>
                        <input type="text" class="form-control form-control-sm mb-2" name="dl_voter_num" placeholder="Enter Licence / Voter ID">
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_dl_voter" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Category 2: Address Proof Documents -->
    <div class="doc-category-card">
        <div class="doc-category-title">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-geo-alt-fill text-success fs-5"></i>
                <span>2. Address Proof Documents</span>
            </div>
            <span class="badge-cat bg-primary-subtle text-primary border border-primary-subtle">4 Address Options</span>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-card-checklist text-success me-1"></i> Aadhaar (Address Proof)</div>
                        <div class="doc-subtext">Address page scan of Aadhaar</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_addr_aadhaar" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-journal-text text-info me-1"></i> Passport (Address Proof)</div>
                        <div class="doc-subtext">Address page scan of Passport</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_addr_passport" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-car-front text-warning me-1"></i> Driving Licence (Address)</div>
                        <div class="doc-subtext">Valid DL address proof copy</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_addr_dl" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-receipt text-danger me-1"></i> Official Address Proof</div>
                        <div class="doc-subtext">Utility Bill / Rental Agreement / Gas Bill</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_addr_utility" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Category 3: Education Certificates -->
    <div class="doc-category-card">
        <div class="doc-category-title">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-mortarboard-fill text-success fs-5"></i>
                <span>3. Education Certificates & Qualifications</span>
            </div>
            <span class="badge-cat bg-info-subtle text-info border border-info-subtle">5 Certificate Requirements</span>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-4 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-file-earmark-text text-primary me-1"></i> 10th Standard Certificate</div>
                        <div class="doc-subtext">SSLC / 10th Marksheet & Passing Cert</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_edu_10th" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-file-earmark-text text-primary me-1"></i> 12th Standard Certificate</div>
                        <div class="doc-subtext">HSC / 12th Marksheet & Passing Cert</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_edu_12th" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-award text-success me-1"></i> Degree Certificate</div>
                        <div class="doc-subtext">Bachelor's Degree / Provisional Certificate</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_edu_degree" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-6 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-award-fill text-purple me-1"></i> PG Certificate (Post Graduation)</div>
                        <div class="doc-subtext">Master's Degree / M.Tech / MBA Certificate (If applicable)</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_edu_pg" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-6 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-patch-check-fill text-warning me-1"></i> Professional Certifications</div>
                        <div class="doc-subtext">AWS, PMP, Scrum Master, Design Certifications, etc.</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_edu_prof" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Category 4: Employment History Documents -->
    <div class="doc-category-card">
        <div class="doc-category-title">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-building text-success fs-5"></i>
                <span>4. Employment History Documents</span>
            </div>
            <span class="badge-cat bg-warning-subtle text-warning border border-warning-subtle">5 Previous Employment Proofs</span>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-4 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-file-earmark-check text-success me-1"></i> Previous Company Offer Letter</div>
                        <div class="doc-subtext">Offer / Appointment Letter from last company</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_emp_offer" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-file-earmark-richtext text-primary me-1"></i> Experience Certificate</div>
                        <div class="doc-subtext">Official Experience Letter from previous employer</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_emp_exp" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-box-arrow-right text-danger me-1"></i> Relieving Letter</div>
                        <div class="doc-subtext">Relieving & Clearance letter from last employer</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_emp_relieving" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-6 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-cash-stack text-success me-1"></i> Last 3 Months Payslips</div>
                        <div class="doc-subtext">Combined PDF of last 3 consecutive salary slips</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_emp_payslips" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-6 mb-2">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-card-text text-secondary me-1"></i> Previous Employment Details</div>
                        <div class="doc-subtext">Form 16 / Tax Statement / Service Certificate</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_emp_details" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Category 5: Bank & Payroll Documents -->
    <div class="doc-category-card">
        <div class="doc-category-title">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-bank text-success fs-5"></i>
                <span>5. Bank Account & Payroll Verification</span>
            </div>
            <span class="badge-cat bg-danger-subtle text-danger border border-danger-subtle">3 Banking Documents</span>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-4">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-receipt-cutoff text-danger me-1"></i> Cancelled Cheque</div>
                        <div class="doc-subtext">Cancelled cheque displaying Account No & IFSC</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_bank_cheque" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-book text-primary me-1"></i> Bank Passbook</div>
                        <div class="doc-subtext">Passbook front page scan showing Name & Branch</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_bank_passbook" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-shield-check text-success me-1"></i> Bank Account Proof</div>
                        <div class="doc-subtext">Official Bank Statement / Online Portal Account Proof</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_bank_proof" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Category 6: Statutory & Other Documents -->
    <div class="doc-category-card">
        <div class="doc-category-title">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-medical text-success fs-5"></i>
                <span>6. Statutory, ESI, PF & Emergency Documents</span>
            </div>
            <span class="badge-cat bg-secondary-subtle text-secondary border border-secondary-subtle">4 Compliance Proofs</span>
        </div>

        <div class="row g-3">
            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-key text-primary me-1"></i> Universal Account No (UAN)</div>
                        <div class="doc-subtext">UAN Allotment Letter / EPFO Member Passbook</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_stat_uan" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-shield-lock text-success me-1"></i> PF Details / Form 11</div>
                        <div class="doc-subtext">EPFO Form 11 PF Declaration Document</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_stat_pf" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-hospital text-danger me-1"></i> ESI Details</div>
                        <div class="doc-subtext">ESIC Pechan Card / ESI Declaration (If applicable)</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_stat_esi" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="doc-upload-item">
                    <div>
                        <div class="doc-label"><i class="bi bi-telephone-plus text-warning me-1"></i> Emergency Contact Proof</div>
                        <div class="doc-subtext">Emergency Contact Form & Dependent ID Proof</div>
                    </div>
                    <input type="file" class="form-control form-control-sm" name="file_stat_emergency" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Form Action Footer -->
    <div class="d-flex align-items-center justify-content-end gap-2 mb-5">
        <a href="onboarding-documents.php" class="btn btn-light">Cancel</a>
        <button type="button" class="btn btn-outline-secondary" onclick="alert('Document draft saved!');">Save Draft</button>
        <button type="submit" class="btn btn-primary px-4" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-send-check me-1"></i> Submit All Documents for HR Verification
        </button>
    </div>

</form>

<script src="./assets/js/pages/onboarding-document-create.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
