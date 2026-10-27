<?php include 'header.php'; ?>

<main class="py-4 pb-5">
    <div class="container-fluid px-3 px-md-4">
        
        <!-- Header & Breadcrumbs -->
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-4">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 text-white d-flex align-items-center justify-content-center shadow-sm" style="width:48px; height:48px; font-size:22px; background: linear-gradient(135deg, #013376 0%, #16a34a 100%);">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <div>
                    <h1 class="h3 fw-bold mb-1 text-dark">Add New Staff Member</h1>
                    <nav class="d-flex align-items-center gap-2 small text-secondary">
                        <span>Team &amp; HR</span>
                        <i class="bi bi-chevron-right fs-10"></i>
                        <a href="staff.php" class="text-secondary text-decoration-none fw-medium">Staff &amp; Sales Force</a>
                        <i class="bi bi-chevron-right fs-10"></i>
                        <span class="fw-bold text-dark">Onboard Staff</span>
                    </nav>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="staff.php" class="btn btn-outline-secondary px-3 py-2 fw-semibold rounded-2 shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> Back to Staff Directory
                </a>
            </div>
        </div>

        <!-- Form Card Container -->
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white mb-4">
            
            <!-- Quick Stepper / Progress Bar -->
            <div class="px-4 py-3 bg-light border-bottom d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center gap-4 flex-wrap">
                    <a href="#section-personal" class="text-decoration-none text-dark fw-semibold small d-flex align-items-center gap-2">
                        <span class="badge rounded-circle bg-primary text-white p-1 d-inline-flex align-items-center justify-content-center" style="width:22px; height:22px;">1</span>
                        <span>Personal Details</span>
                    </a>
                    <a href="#section-role" class="text-decoration-none text-secondary fw-semibold small d-flex align-items-center gap-2">
                        <span class="badge rounded-circle bg-secondary text-white p-1 d-inline-flex align-items-center justify-content-center" style="width:22px; height:22px;">2</span>
                        <span>Role &amp; Territory</span>
                    </a>
                    <a href="#section-quota" class="text-decoration-none text-secondary fw-semibold small d-flex align-items-center gap-2">
                        <span class="badge rounded-circle bg-secondary text-white p-1 d-inline-flex align-items-center justify-content-center" style="width:22px; height:22px;">3</span>
                        <span>Targets &amp; KPIs</span>
                    </a>
                    <a href="#section-security" class="text-decoration-none text-secondary fw-semibold small d-flex align-items-center gap-2">
                        <span class="badge rounded-circle bg-secondary text-white p-1 d-inline-flex align-items-center justify-content-center" style="width:22px; height:22px;">4</span>
                        <span>App Access &amp; Security</span>
                    </a>
                </div>
                <div class="text-muted small">
                    <i class="bi bi-shield-lock-fill text-success me-1"></i> Standard Employee Master Record
                </div>
            </div>

            <form id="createStaffForm" method="POST" action="staff.php?created=1" onsubmit="handleStaffSubmit(event)">
                <div class="p-4">
                    
                    <!-- SECTION 1: Personal & Contact Information -->
                    <div id="section-personal" class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                            <i class="bi bi-person-bounding-box text-primary fs-5"></i>
                            <h5 class="fw-bold mb-0 text-dark">1. Personal &amp; Contact Details</h5>
                        </div>

                        <div class="row g-4">
                            <!-- Avatar Preview & Upload -->
                            <div class="col-12 col-md-3">
                                <label class="form-label fw-bold small text-muted">Profile Photo</label>
                                <div class="d-flex flex-column align-items-center justify-content-center p-3 border rounded-3 bg-light text-center h-100" style="min-height: 180px;">
                                    <div id="avatarPreviewContainer" class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold mb-2 shadow-sm" style="width:84px; height:84px; font-size:28px; background: linear-gradient(135deg, #16a34a 0%, #013376 100%);">
                                        <span id="avatarInitials">SM</span>
                                    </div>
                                    <label class="btn btn-sm btn-outline-primary px-3 mt-2" style="cursor: pointer;">
                                        <i class="bi bi-camera me-1"></i> Upload Photo
                                        <input type="file" id="staffAvatarInput" class="d-none" accept="image/*" onchange="previewStaffAvatar(event)">
                                    </label>
                                    <small class="text-muted mt-1 fs-11">PNG, JPG or WEBP (Max 2MB)</small>
                                </div>
                            </div>

                            <div class="col-12 col-md-9">
                                <div class="row g-3">
                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark small mb-1" for="staffFullName">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control shadow-none" id="staffFullName" name="full_name" required placeholder="e.g. Ramesh Krishnan" oninput="updateStaffInitials(this.value)">
                                    </div>

                                    <!-- Employee ID -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark small mb-1" for="staffEmpId">Employee ID / Code <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-muted small"><i class="bi bi-hash"></i></span>
                                            <input type="text" class="form-control shadow-none" id="staffEmpId" name="emp_id" required value="EMP-1009" placeholder="EMP-1009">
                                        </div>
                                    </div>

                                    <!-- Official Work Email -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark small mb-1" for="staffWorkEmail">Work Email (CRM Login) <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-muted small"><i class="bi bi-envelope"></i></span>
                                            <input type="email" class="form-control shadow-none" id="staffWorkEmail" name="work_email" required placeholder="ramesh.k@gharuda.com">
                                        </div>
                                    </div>

                                    <!-- Mobile Phone -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark small mb-1" for="staffPhone">Mobile Number (WhatsApp &amp; Calls) <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-muted small fw-semibold">+91</span>
                                            <input type="tel" class="form-control shadow-none" id="staffPhone" name="phone" required placeholder="98765 43210" pattern="[0-9]{10}" maxlength="10">
                                        </div>
                                    </div>

                                    <!-- Date of Joining -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark small mb-1" for="staffDoj">Date of Joining <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control shadow-none" id="staffDoj" name="date_of_joining" value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>

                                    <!-- Emergency Phone / Blood Group -->
                                    <div class="col-md-6">
                                        <div class="row g-2">
                                            <div class="col-7">
                                                <label class="form-label fw-bold text-dark small mb-1" for="staffEmergency">
                                                    Emergency Contact
                                                </label>
                                                <input type="tel" class="form-control shadow-none" id="staffEmergency" name="emergency_phone" placeholder="98400 11223">
                                            </div>
                                            <div class="col-5">
                                                <label class="form-label fw-bold text-dark small mb-1" for="staffBlood">
                                                    Blood Group
                                                </label>
                                                <select class="form-select shadow-none" id="staffBlood" name="blood_group">
                                                    <option value="O+">O+</option>
                                                    <option value="A+">A+</option>
                                                    <option value="B+">B+</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="O-">O-</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB-">AB-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: Role, Branch & Territory -->
                    <div id="section-role" class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                            <i class="bi bi-briefcase-fill text-primary fs-5"></i>
                            <h5 class="fw-bold mb-0 text-dark">2. Role, Branch &amp; Field Territory</h5>
                        </div>

                        <div class="row g-3">
                            <!-- Designation / Role -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffRole">Designation / Role <span class="text-danger">*</span></label>
                                <select class="form-select shadow-none" id="staffRole" name="role" required>
                                    <option value="Enterprise AE">Enterprise AE (Account Executive)</option>
                                    <option value="Field Sales Officer" selected>Field Sales Officer (B2B)</option>
                                    <option value="Sales Representative">Sales Representative</option>
                                    <option value="Sales Manager">Sales Manager</option>
                                    <option value="Support Engineer">Support Engineer</option>
                                    <option value="Telecaller">Inside Sales / Telecaller</option>
                                    <option value="Solutions Architect">Solutions Pre-Sales Architect</option>
                                </select>
                            </div>

                            <!-- Department -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffDept">Department <span class="text-danger">*</span></label>
                                <select class="form-select shadow-none" id="staffDept" name="department" required>
                                    <option value="Field Sales" selected>Direct &amp; Field Sales</option>
                                    <option value="Enterprise Sales">Enterprise Business Group</option>
                                    <option value="Customer Success">Customer Success &amp; Support</option>
                                    <option value="Operations">Operations &amp; Delivery</option>
                                    <option value="Finance">Accounts &amp; Billing</option>
                                </select>
                            </div>

                            <!-- Branch Location -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffBranch">Operating Branch <span class="text-danger">*</span></label>
                                <select class="form-select shadow-none" id="staffBranch" name="branch" required>
                                    <option value="Bangalore HQ" selected>Bangalore HQ (Indiranagar)</option>
                                    <option value="Chennai Central">Chennai Central (Anna Nagar)</option>
                                    <option value="Mumbai South">Mumbai South (BKC)</option>
                                    <option value="Hyderabad">Hyderabad (HITEC City)</option>
                                    <option value="Delhi NCR">Delhi NCR (Cyber City)</option>
                                    <option value="Pune">Pune (Kharadi)</option>
                                </select>
                            </div>

                            <!-- Assigned Sales Territory -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffTerritory">Assigned Sales Territory <span class="text-danger">*</span></label>
                                <input type="text" class="form-control shadow-none" id="staffTerritory" name="territory" required placeholder="e.g. South Bangalore - Electronic City & Hosur" value="Bangalore Tech Corridor">
                            </div>

                            <!-- Reporting Manager -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffManager">
                                    Reporting Supervisor / Lead
                                </label>
                                <select class="form-select shadow-none" id="staffManager" name="reporting_manager">
                                    <option value="Sundar Arumugam">Sundar Arumugam (Director of Sales)</option>
                                    <option value="Rajesh Sharma" selected>Rajesh Sharma (Regional Head - South)</option>
                                    <option value="Pooja Rao">Pooja Rao (Enterprise Lead)</option>
                                    <option value="Anita Rao">Anita Rao (Support Lead)</option>
                                </select>
                            </div>

                            <!-- Employment Type -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffEmpType">
                                    Employment Type
                                </label>
                                <select class="form-select shadow-none" id="staffEmpType" name="employment_type">
                                    <option value="Full-time Regular" selected>Full-time Regular</option>
                                    <option value="Probationary">Probationary (6 Months)</option>
                                    <option value="Contractual">Contractual / Consultant</option>
                                    <option value="Intern">Trainee / Intern</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: Sales Targets, Quotas & KPIs -->
                    <div id="section-quota" class="mb-5">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                            <i class="bi bi-graph-up-arrow text-primary fs-5"></i>
                            <h5 class="fw-bold mb-0 text-dark">3. Quota Targets &amp; Performance KPIs</h5>
                        </div>

                        <div class="row g-3">
                            <!-- Monthly Target Quota -->
                            <div class="col-md-3">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffTargetQuota">Monthly Revenue Quota (₹) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted small">₹</span>
                                    <input type="number" class="form-control shadow-none" id="staffTargetQuota" name="target_quota" required value="500000" step="50000" placeholder="500000">
                                </div>
                                <small class="text-muted fs-11">Default target for monthly sales commission tracking</small>
                            </div>

                            <!-- Daily Field Visits Target -->
                            <div class="col-md-3">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffVisitTarget">
                                    Daily Field Visits Quota
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control shadow-none" id="staffVisitTarget" name="daily_visits_target" value="5" min="1" max="25">
                                    <span class="input-group-text bg-light text-muted small">Visits / Day</span>
                                </div>
                                <small class="text-muted fs-11">Tracked via Field Visit GPS check-ins</small>
                            </div>

                            <!-- Concurrent Leads Pipeline Capacity -->
                            <div class="col-md-3">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffMaxLeads">
                                    Max Concurrent Active Leads
                                </label>
                                <div class="input-group">
                                    <input type="number" class="form-control shadow-none" id="staffMaxLeads" name="max_leads" value="30" min="5" max="200">
                                    <span class="input-group-text bg-light text-muted small">Leads</span>
                                </div>
                                <small class="text-muted fs-11">Auto lead-distribution throttle threshold</small>
                            </div>

                            <!-- Incentive Slab -->
                            <div class="col-md-3">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffCommissionTier">
                                    Incentive &amp; Commission Slab
                                </label>
                                <select class="form-select shadow-none" id="staffCommissionTier" name="commission_tier">
                                    <option value="Tier 1">Tier 1 &bull; 2.5% on Closed Deals</option>
                                    <option value="Tier 2" selected>Tier 2 &bull; 4.0% Standard Field</option>
                                    <option value="Tier 3">Tier 3 &bull; 5.5% Enterprise High-Value</option>
                                    <option value="Fixed Bonus">Fixed Bonus &amp; Flat SPIFFs</option>
                                </select>
                                <small class="text-muted fs-11">Calculated automatically on invoice payout</small>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 4: App Access, Security & Mobile Permissions -->
                    <div id="section-security" class="mb-4">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                            <i class="bi bi-shield-lock-fill text-primary fs-5"></i>
                            <h5 class="fw-bold mb-0 text-dark">4. Portal Credentials &amp; Mobile App Permissions</h5>
                        </div>

                        <div class="row g-3">
                            <!-- System Username -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffUsername">Login Username <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted small"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control shadow-none" id="staffUsername" name="username" required placeholder="e.g. ramesh.krishnan">
                                </div>
                            </div>

                            <!-- Initial Password -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffPassword">Temporary Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted small"><i class="bi bi-key"></i></span>
                                    <input type="password" class="form-control shadow-none" id="staffPassword" name="password" required value="Gharuda@2026">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()"><i class="bi bi-eye" id="pwdEye"></i></button>
                                </div>
                                <small class="text-muted fs-11">User will be prompted to reset password on first login</small>
                            </div>

                            <!-- Access Role Profile -->
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small mb-1" for="staffAccessRole">
                                    CRM Access Role Permission
                                </label>
                                <select class="form-select shadow-none" id="staffAccessRole" name="access_role">
                                    <option value="Field Sales Executive" selected>Field Sales Rep (Assigned Leads Only)</option>
                                    <option value="Branch Manager">Branch Manager (Branch Wide Visibility)</option>
                                    <option value="Support Agent">Support Agent (Tickets &amp; Clients)</option>
                                    <option value="Administrator">Administrator (Full Access)</option>
                                </select>
                            </div>

                            <!-- Mobile App Feature Toggles -->
                            <div class="col-12 mt-4">
                                <div class="p-3 rounded-3 border bg-light">
                                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-phone me-2 text-primary"></i>Mobile &amp; Field Attendance Permissions</h6>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="gpsTrackingSwitch" name="enable_gps" checked>
                                                <label class="form-check-label fw-semibold text-dark small" for="gpsTrackingSwitch">
                                                    Live GPS Location Tracking
                                                </label>
                                                <div class="text-muted fs-11">Track live route during active shift hours for visit auditing</div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="geofenceSwitch" name="enable_geofence" checked>
                                                <label class="form-check-label fw-semibold text-dark small" for="geofenceSwitch">
                                                    Geofence Radius Check-in
                                                </label>
                                                <div class="text-muted fs-11">Require reps to be within 200m of customer site to log visit</div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="welcomeEmailSwitch" name="send_welcome_email" checked>
                                                <label class="form-check-label fw-semibold text-dark small" for="welcomeEmailSwitch">
                                                    Email Welcome Kit &amp; Mobile App Link
                                                </label>
                                                <div class="text-muted fs-11">Instantly dispatch download link and temporary credentials</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="d-flex align-items-center justify-content-between pt-4 border-top mt-4 flex-wrap gap-3">
                        <a href="staff.php" class="btn btn-outline-secondary px-4 py-2">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </a>

                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn btn-light border px-3 py-2 text-secondary" onclick="saveStaffDraft()">
                                <i class="bi bi-bookmark me-1"></i> Save as Draft
                            </button>
                            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm" style="background:#16a34a; border-color:#16a34a;">
                                <i class="bi bi-check-circle-fill me-1"></i> Save &amp; Onboard Staff Member
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
</main>

<style>
.fs-10 { font-size: 10px !important; }
.fs-11 { font-size: 11px !important; }
.fs-12 { font-size: 12px !important; }
.form-check-input:checked {
    background-color: #16a34a;
    border-color: #16a34a;
}
.btn-primary:hover {
    background-color: #15803d !important;
    border-color: #15803d !important;
}
</style>

<script>
function updateStaffInitials(name) {
    const initialsContainer = document.getElementById('avatarInitials');
    const usernameInput = document.getElementById('staffUsername');
    const emailInput = document.getElementById('staffWorkEmail');
    
    if (!name || name.trim() === '') {
        initialsContainer.textContent = 'SM';
        return;
    }
    
    const parts = name.trim().split(/\s+/);
    let initials = '';
    if (parts.length === 1) {
        initials = parts[0].substring(0, 2).toUpperCase();
    } else {
        initials = (parts[0][0] + parts[parts.length - 1][0]).toUpperCase();
    }
    initialsContainer.textContent = initials;
    
    // Auto-suggest username if blank
    if (!usernameInput.dataset.manualEdit) {
        const cleanName = parts.join('.').toLowerCase().replace(/[^a-z0-9.]/g, '');
        usernameInput.value = cleanName;
        if (!emailInput.dataset.manualEdit) {
            emailInput.value = cleanName + '@gharuda.com';
        }
    }
}

document.getElementById('staffUsername').addEventListener('input', function() {
    this.dataset.manualEdit = 'true';
});
document.getElementById('staffWorkEmail').addEventListener('input', function() {
    this.dataset.manualEdit = 'true';
});

function togglePasswordVisibility() {
    const pwdInput = document.getElementById('staffPassword');
    const eyeIcon = document.getElementById('pwdEye');
    if (pwdInput.type === 'password') {
        pwdInput.type = 'text';
        eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
        pwdInput.type = 'password';
        eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
    }
}

let staffAvatarDataUrl = null;

function previewStaffAvatar(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            staffAvatarDataUrl = e.target.result;
            const container = document.getElementById('avatarPreviewContainer');
            container.innerHTML = `<img src="${e.target.result}" alt="Staff Photo" class="w-100 h-100 rounded-circle object-fit-cover">`;
        };
        reader.readAsDataURL(file);
    }
}

function saveStaffDraft() {
    const name = document.getElementById('staffFullName').value.trim() || 'Untitled Staff';
    alert(`Draft saved successfully for "${name}". You can resume anytime from Drafts.`);
}

function handleStaffSubmit(event) {
    event.preventDefault();
    const form = document.getElementById('createStaffForm');
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    const name = document.getElementById('staffFullName').value.trim();
    const empId = document.getElementById('staffEmpId').value.trim();
    const role = document.getElementById('staffRole').value;
    const dept = document.getElementById('staffDept') ? document.getElementById('staffDept').value : 'Direct & Field Sales';
    const branch = document.getElementById('staffBranch') ? document.getElementById('staffBranch').value : 'Bangalore HQ';
    const email = document.getElementById('staffWorkEmail').value.trim();
    const rawPhone = document.getElementById('staffPhone').value.trim();
    const phone = rawPhone.startsWith('+91') ? rawPhone : '+91 ' + rawPhone;
    const quota = parseInt(document.getElementById('staffTargetQuota').value) || 500000;
    const initials = document.getElementById('avatarInitials').textContent.trim() || 'SM';

    const newStaff = {
        name,
        empid: empId,
        role,
        department: dept,
        branch,
        email,
        phone,
        target: quota,
        status: 'Active',
        avatarImg: staffAvatarDataUrl,
        initials,
        leads: 0,
        deals: 0,
        visits: 0,
        attainmentPct: 0
    };

    try {
        let stored = JSON.parse(localStorage.getItem('gharuda_custom_staff') || '[]');
        // Prepend new staff member, deduplicate by empid
        stored = stored.filter(s => s.empid !== empId);
        stored.unshift(newStaff);
        localStorage.setItem('gharuda_custom_staff', JSON.stringify(stored));
    } catch(err) {
        console.error('Failed to save to localStorage:', err);
    }

    sessionStorage.setItem('newStaffAdded', JSON.stringify(newStaff));
    window.location.href = 'staff.php?created=1';
}
</script>

<?php include 'footer.php'; ?>
