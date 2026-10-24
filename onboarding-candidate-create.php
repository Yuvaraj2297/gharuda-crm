<?php include 'header.php'; ?>

 

<style>
    .section-card {
        background: #ffffff;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 4px 16px rgba(20, 30, 25, .03);
    }
    .section-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--ink-900);
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .dropzone-box {
        border: 2px dashed #cbd5e1;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        background: #f8fafc;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .dropzone-box:hover {
        border-color: var(--primary, #087a24);
        background: #f0fdf4;
    }
    .form-label-custom {
        font-size: 13px;
        font-weight: 600;
        color: #334155;
    }
    .table-sub-header {
        background: #f1f5f9;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        color: #475569;
    }
</style>

<!-- Navigation & Action Bar -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
    <div>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <a href="onboarding-list.php" class="text-decoration-none text-muted"><i class="bi bi-person-check me-1"></i> Onboarding Pipeline</a>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Add Candidate</span>
        </nav>
        <h1 class="font-display fw-bold mb-0 mt-1" style="font-size:1.68rem;">Enroll New Candidate into Onboarding</h1>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <a href="onboarding-list.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Joining Pipeline
        </a>
        <button type="submit" form="addCandidateForm" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-check2-circle me-1"></i> Submit Candidate
        </button>
    </div>
</div>

<form id="addCandidateForm">

    <!-- Section 1: Candidate Personal & Statutory Details (Matching User Screenshots) -->
    <div class="section-card">
        <div class="section-title">
            <i class="bi bi-person-badge-fill text-success fs-5"></i>
            <span>Candidate Personal & Identification Details</span>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label form-label-custom">First Name *</label>
                <input type="text" class="form-control" name="first_name" placeholder="Enter first name" required>
            </div>
            <div class="col-md-6">
                <label class="form-label form-label-custom">Last Name *</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label form-label-custom">Email ID *</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            </div>
            <div class="col-md-6">
                <label class="form-label form-label-custom">Official Email</label>
                <input type="email" class="form-control" name="official_email" placeholder="name@gharudahr.com">
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label form-label-custom">Phone Number *</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-flag-fill me-1 text-success"></i> +91</span>
                    <input type="text" class="form-control" name="phone" placeholder="81234 56789" required>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label form-label-custom">UAN Number</label>
                <input type="text" class="form-control" name="uan" placeholder="100987654321">
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label form-label-custom">Aadhaar Card Number</label>
                <input type="text" class="form-control" name="aadhaar" placeholder="9876-5432-1098">
            </div>
            <div class="col-md-6">
                <label class="form-label form-label-custom">PAN Card Number</label>
                <input type="text" class="form-control" name="pan" placeholder="ABCDE1234F">
            </div>
        </div>

        <div>
            <label class="form-label form-label-custom">Photo Upload</label>
            <div class="dropzone-box" onclick="document.getElementById('photoInput').click();">
                <i class="bi bi-cloud-arrow-up text-success fs-2 mb-2"></i>
                <div class="fw-bold text-dark" style="font-size:13.5px;">
                    Upload from <span class="text-success text-decoration-underline">Desktop</span> / <span class="text-success text-decoration-underline">Zoho WorkDrive</span> / <span class="text-success text-decoration-underline">Others</span>
                </div>
                <div class="text-muted" style="font-size:11.5px;">Files supported: JPG, PNG, GIF, JPEG • Max. size is 5 MB</div>
                <input type="file" id="photoInput" name="photo" style="display:none;" accept="image/*">
            </div>
        </div>
    </div>

    <!-- Section 2: Address Details (Matching Screenshot #1) -->
    <div class="section-card">
        <div class="section-title">
            <i class="bi bi-geo-alt-fill text-success fs-5"></i>
            <span>Address Details</span>
        </div>

        <!-- Present Address -->
        <h6 class="fw-bold text-dark mb-3" style="font-size:13.5px;">Present Address</h6>
        <div class="row g-3 mb-3">
            <div class="col-12">
                <input type="text" class="form-control mb-2" id="pres_line1" name="pres_line1" placeholder="Address line 1">
                <input type="text" class="form-control" id="pres_line2" name="pres_line2" placeholder="Address line 2">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="pres_city" name="pres_city" placeholder="City">
            </div>
            <div class="col-md-4">
                <select class="form-select" id="pres_country" name="pres_country">
                    <option value="India" selected>India</option>
                    <option value="United States">United States</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="Singapore">Singapore</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="pres_state" name="pres_state">
                    <option value="Tamil Nadu" selected>Tamil Nadu</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Kerala">Kerala</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="pres_pincode" name="pres_pincode" placeholder="Postal Code">
            </div>
        </div>

        <hr class="my-4">

        <!-- Permanent Address -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h6 class="fw-bold text-dark m-0" style="font-size:13.5px;">Permanent Address</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sameAsPresent">
                <label class="form-check-label fw-semibold text-dark" style="font-size:13px;" for="sameAsPresent">
                    Same as Present address
                </label>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12">
                <input type="text" class="form-control mb-2" id="perm_line1" name="perm_line1" placeholder="Address line 1">
                <input type="text" class="form-control" id="perm_line2" name="perm_line2" placeholder="Address line 2">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="perm_city" name="perm_city" placeholder="City">
            </div>
            <div class="col-md-4">
                <select class="form-select" id="perm_country" name="perm_country">
                    <option value="India" selected>India</option>
                    <option value="United States">United States</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="Singapore">Singapore</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="perm_state" name="perm_state">
                    <option value="Tamil Nadu" selected>Tamil Nadu</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Kerala">Kerala</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="perm_pincode" name="perm_pincode" placeholder="Postal Code">
            </div>
        </div>
    </div>

    <!-- Section 3: Professional Details (Matching Screenshot #2) -->
    <div class="section-card">
        <div class="section-title">
            <i class="bi bi-briefcase-fill text-success fs-5"></i>
            <span>Professional Details</span>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label form-label-custom">Experience</label>
                <input type="text" class="form-control" name="experience" placeholder="e.g. 4 Years 6 Months">
            </div>
            <div class="col-md-6">
                <label class="form-label form-label-custom">Location</label>
                <select class="form-select" name="location">
                    <option value="Chennai HQ" selected>Chennai HQ</option>
                    <option value="Bangalore Branch">Bangalore Branch</option>
                    <option value="Hyderabad Tech Hub">Hyderabad Tech Hub</option>
                    <option value="Remote / Hybrid">Remote / Hybrid</option>
                </select>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label form-label-custom">Source of Hire</label>
                <select class="form-select" name="source_of_hire">
                    <option value="LinkedIn Easy Apply" selected>LinkedIn Easy Apply</option>
                    <option value="Company Careers Page">Company Careers Page</option>
                    <option value="Employee Referral">Employee Referral</option>
                    <option value="Naukri / Job Portal">Naukri / Job Portal</option>
                    <option value="Campus Recruitment">Campus Recruitment</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label form-label-custom">Title / Position</label>
                <select class="form-select" name="title">
                    <option value="Senior UI/UX Designer" selected>Senior UI/UX Designer</option>
                    <option value="Lead Backend Engineer">Lead Backend Engineer</option>
                    <option value="iOS App Developer">iOS App Developer</option>
                    <option value="Financial Analyst">Financial Analyst</option>
                    <option value="HR Operations Lead">HR Operations Lead</option>
                </select>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label form-label-custom">Skill Set</label>
                <textarea class="form-control" name="skill_set" rows="3" placeholder="Figma, React.js, Node.js, System Architecture, Swift..."></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label form-label-custom">Current Salary (Annual CTC ₹)</label>
                <input type="text" class="form-control mb-3" name="current_salary" placeholder="e.g. ₹16,50,000">

                <label class="form-label form-label-custom">Department</label>
                <select class="form-select" name="department">
                    <option value="UI/UX Design Department" selected>UI/UX Design Department</option>
                    <option value="Backend Engineering">Backend Engineering</option>
                    <option value="Mobile Engineering">Mobile Engineering</option>
                    <option value="Finance Department">Finance Department</option>
                    <option value="HR & Operations">HR & Operations</option>
                </select>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label form-label-custom">Highest Qualification</label>
                <input type="text" class="form-control mb-3" name="highest_qualification" placeholder="e.g. B.Tech / M.Sc Computer Science">

                <label class="form-label form-label-custom">Additional Information</label>
                <textarea class="form-control" name="additional_info" rows="3" placeholder="Enter special perks, relocation notes or probation details..."></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label form-label-custom">Offer Letter File Upload</label>
                <div class="dropzone-box mb-3" onclick="document.getElementById('offerFileInput').click();">
                    <i class="bi bi-file-earmark-pdf text-success fs-3 mb-1"></i>
                    <div class="fw-bold text-dark" style="font-size:13px;">
                        Upload from <span class="text-success text-decoration-underline">Desktop</span> / <span class="text-success text-decoration-underline">Zoho WorkDrive</span> / <span class="text-success text-decoration-underline">Others</span>
                    </div>
                    <div class="text-muted" style="font-size:11px;">Max. size is 5 MB</div>
                    <input type="file" id="offerFileInput" name="offer_letter_file" style="display:none;" accept=".pdf,.doc,.docx">
                </div>

                <label class="form-label form-label-custom">Tentative Joining Date</label>
                <input type="date" class="form-control" name="joining_date" value="2026-03-20">
            </div>
        </div>
    </div>

    <!-- Section 4: Education History Table (Matching Screenshot #3) -->
    <div class="section-card">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="section-title m-0 border-0 p-0">
                <i class="bi bi-mortarboard-fill text-success fs-5"></i>
                <span>Education History</span>
            </div>
            <button type="button" class="btn btn-sm btn-outline-success" id="addEduRowBtn">
                <i class="bi bi-plus-lg me-1"></i> Add Row
            </button>
        </div>

        <div class="table-responsive border rounded-3 overflow-hidden">
            <table class="table table-bordered mb-0" id="educationTable">
                <thead class="table-sub-header">
                    <tr>
                        <th style="width:25%;">School / College Name</th>
                        <th style="width:20%;">Degree / Diploma</th>
                        <th style="width:20%;">Field(s) of Study</th>
                        <th style="width:15%;">Date of Completion</th>
                        <th style="width:15%;">Additional Notes</th>
                        <th style="width:5%;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control form-control-sm" name="edu_school[]" placeholder="College / University Name"></td>
                        <td><input type="text" class="form-control form-control-sm" name="edu_degree[]" placeholder="B.E / B.Tech / M.Sc"></td>
                        <td><input type="text" class="form-control form-control-sm" name="edu_field[]" placeholder="Computer Science / Design"></td>
                        <td><input type="date" class="form-control form-control-sm" name="edu_date[]"></td>
                        <td><textarea class="form-control form-control-sm" name="edu_notes[]" rows="1" placeholder="First Class with Distinction"></textarea></td>
                        <td class="text-center align-middle">
                            <button type="button" class="btn btn-sm btn-link text-danger p-0 delete-row-btn"><i class="bi bi-trash fs-6"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section 5: Experience History Table (Matching Screenshot #3) -->
    <div class="section-card">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="section-title m-0 border-0 p-0">
                <i class="bi bi-building text-success fs-5"></i>
                <span>Work Experience History</span>
            </div>
            <button type="button" class="btn btn-sm btn-outline-success" id="addExpRowBtn">
                <i class="bi bi-plus-lg me-1"></i> Add Row
            </button>
        </div>

        <div class="table-responsive border rounded-3 overflow-hidden">
            <table class="table table-bordered mb-0" id="experienceTable">
                <thead class="table-sub-header">
                    <tr>
                        <th style="width:20%;">Occupation / Designation</th>
                        <th style="width:20%;">Company Name</th>
                        <th style="width:25%;">Summary / Key Responsibilities</th>
                        <th style="width:15%;">Duration</th>
                        <th style="width:15%;">Currently Work Here</th>
                        <th style="width:5%;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control form-control-sm" name="exp_occupation[]" placeholder="UI/UX Designer"></td>
                        <td><input type="text" class="form-control form-control-sm" name="exp_company[]" placeholder="Freshworks"></td>
                        <td><textarea class="form-control form-control-sm" name="exp_summary[]" rows="1" placeholder="Lead Figma design system architecture..."></textarea></td>
                        <td><input type="text" class="form-control form-control-sm" name="exp_duration[]" placeholder="3 Years 2 Months"></td>
                        <td>
                            <select class="form-select form-select-sm" name="exp_current[]">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </td>
                        <td class="text-center align-middle">
                            <button type="button" class="btn btn-sm btn-link text-danger p-0 delete-row-btn"><i class="bi bi-trash fs-6"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Page Footer Action Buttons -->
    <div class="d-flex align-items-center justify-content-end gap-2 mb-5">
        <a href="onboarding-list.php" class="btn btn-light">Cancel</a>
        <button type="button" class="btn btn-outline-secondary" onclick="alert('Draft saved!');">Save Draft</button>
        <button type="button" class="btn btn-outline-success" onclick="document.getElementById('addCandidateForm').reset();">Submit and New</button>
        <button type="submit" class="btn btn-primary px-4" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-check2-circle me-1"></i> Submit Candidate
        </button>
    </div>

</form>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // Auto-fill Permanent Address when "Same as Present address" checkbox is checked
    const sameCheckbox = document.getElementById('sameAsPresent');
    if (sameCheckbox) {
        sameCheckbox.addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('perm_line1').value = document.getElementById('pres_line1').value;
                document.getElementById('perm_line2').value = document.getElementById('pres_line2').value;
                document.getElementById('perm_city').value = document.getElementById('pres_city').value;
                document.getElementById('perm_country').value = document.getElementById('pres_country').value;
                document.getElementById('perm_state').value = document.getElementById('pres_state').value;
                document.getElementById('perm_pincode').value = document.getElementById('pres_pincode').value;
            }
        });
    }

    // Add Dynamic Education Row
    const addEduRowBtn = document.getElementById('addEduRowBtn');
    if (addEduRowBtn) {
        addEduRowBtn.addEventListener('click', function() {
            const tbody = document.querySelector('#educationTable tbody');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><input type="text" class="form-control form-control-sm" name="edu_school[]" placeholder="College / University Name"></td>
                <td><input type="text" class="form-control form-control-sm" name="edu_degree[]" placeholder="B.E / B.Tech / M.Sc"></td>
                <td><input type="text" class="form-control form-control-sm" name="edu_field[]" placeholder="Computer Science / Design"></td>
                <td><input type="date" class="form-control form-control-sm" name="edu_date[]"></td>
                <td><textarea class="form-control form-control-sm" name="edu_notes[]" rows="1" placeholder="Additional Notes"></textarea></td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-sm btn-link text-danger p-0 delete-row-btn"><i class="bi bi-trash fs-6"></i></button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // Add Dynamic Experience Row
    const addExpRowBtn = document.getElementById('addExpRowBtn');
    if (addExpRowBtn) {
        addExpRowBtn.addEventListener('click', function() {
            const tbody = document.querySelector('#experienceTable tbody');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><input type="text" class="form-control form-control-sm" name="exp_occupation[]" placeholder="Designation"></td>
                <td><input type="text" class="form-control form-control-sm" name="exp_company[]" placeholder="Company Name"></td>
                <td><textarea class="form-control form-control-sm" name="exp_summary[]" rows="1" placeholder="Responsibilities"></textarea></td>
                <td><input type="text" class="form-control form-control-sm" name="exp_duration[]" placeholder="Duration"></td>
                <td>
                    <select class="form-select form-select-sm" name="exp_current[]">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-sm btn-link text-danger p-0 delete-row-btn"><i class="bi bi-trash fs-6"></i></button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // Dynamic Row Deletion Delegation
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.delete-row-btn');
        if (!btn) return;
        const tr = btn.closest('tr');
        if (tr) tr.remove();
    });

    // Form Submit Handler
    const form = document.getElementById('addCandidateForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('New onboarding candidate successfully created and added to the joining pipeline!');
            window.location.href = 'onboarding-list.php';
        });
    }
});
</script>

<?php include 'footer.php'; ?>
