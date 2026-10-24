<?php include 'header.php'; ?>

<!-- Title & Action Bar -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Schedule Orientation & Induction Session</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-person-check fs-6 text-success"></i>
            <a href="onboarding-list.php" class="text-neutral text-decoration-none">Onboarding</a>
            <i class="bi bi-chevron-right"></i>
            <a href="onboarding-orientation.php" class="text-neutral text-decoration-none">Induction & Orientation</a>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Schedule Session</span>
        </nav>
    </div>
    <div>
        <a href="onboarding-orientation.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Orientation List
        </a>
    </div>
</div>

<form id="createOrientationForm" onsubmit="return false;">
    <!-- Card 1: Employee & Joining Details -->
    <div class="card card-custom border-0 shadow-sm mb-4" style="border-radius:14px;">
        <div class="card-header bg-light border-0 py-3 px-4" style="border-top-left-radius:14px; border-top-right-radius:14px;">
            <h6 class="fw-bold text-dark mb-0"><i class="bi bi-person-vcard text-success me-2 fs-5"></i> 1. Target Employee & Joining Details</h6>
        </div>
        <div class="card-body p-4">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="font-size:13px;">Select Target Employee / Batch *</label>
                    <select class="form-select" id="empSelect" required>
                        <option value="Kavitha Raman|EMP-2026-041|Design|UI/UX Designer|2026-03-10|Office (HQ - Chennai)|David Anderson">Kavitha Raman (EMP-2026-041 - UI/UX Designer)</option>
                        <option value="Rahul Verma|EMP-2026-042|Engineering|Backend Engineer|2026-03-15|Office (HQ)|Sarah Mitchell">Rahul Verma (EMP-2026-042 - Backend Eng)</option>
                        <option value="Siddharth Nair|EMP-2026-043|iOS Dev|iOS App Developer|2026-03-12|Remote (WFH)|David Anderson">Siddharth Nair (EMP-2026-043 - iOS Dev)</option>
                        <option value="Priya Sundaram|EMP-2026-044|Finance|Financial Analyst|2026-03-05|Branch Office|Emily Clark">Priya Sundaram (EMP-2026-044 - Finance)</option>
                        <option value="March 2026 Batch|BATCH-MAR-2026|Company-wide|All Departments|2026-03-01|Main Auditorium|HR Operations">March 2026 Batch (4 Joiners)</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Employee ID</label>
                    <input type="text" class="form-control bg-light" id="empId" value="EMP-2026-041" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold" style="font-size:13px;">Department</label>
                    <input type="text" class="form-control bg-light" id="empDept" value="Design Department" readonly>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold" style="font-size:13px;">Designation / Role</label>
                    <input type="text" class="form-control bg-light" id="empRole" value="UI/UX Designer" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold" style="font-size:13px;">Joining Date</label>
                    <input type="date" class="form-control" id="joiningDate" value="2026-03-10">
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold" style="font-size:13px;">Reporting Manager</label>
                    <input type="text" class="form-control" id="reportingManager" value="David Anderson">
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2: Orientation Program & Trainer Specifications -->
    <div class="card card-custom border-0 shadow-sm mb-4" style="border-radius:14px;">
        <div class="card-header bg-light border-0 py-3 px-4" style="border-top-left-radius:14px; border-top-right-radius:14px;">
            <h6 class="fw-bold text-dark mb-0"><i class="bi bi-journal-bookmark-fill text-primary me-2 fs-5"></i> 2. Orientation Program & Trainer Information</h6>
        </div>
        <div class="card-body p-4">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold" style="font-size:13px;">Orientation Type *</label>
                    <select class="form-select" id="oriType" required>
                        <option value="General Induction">General Induction (Company & HR Culture)</option>
                        <option value="Department Orientation" selected>Department Orientation (Tech / Process Deep-Dive)</option>
                        <option value="IT Orientation">IT & Security Orientation (VPN, Hardware & Credentials)</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label fw-semibold" style="font-size:13px;">Session / Program Title *</label>
                    <input type="text" class="form-control" id="programTitle" placeholder="e.g. Design System & UX Framework Walkthrough" value="Design System & UX Framework Walkthrough" required>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="font-size:13px;">Trainer / Coordinator Name *</label>
                    <input type="text" class="form-control" id="trainerName" placeholder="e.g. Amelia Curr" value="Amelia Curr" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="font-size:13px;">Trainer Role / Designation</label>
                    <input type="text" class="form-control" id="trainerRole" placeholder="e.g. Lead UI/UX Designer" value="Design Lead">
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3: Schedule, Mode & Venue Settings -->
    <div class="card card-custom border-0 shadow-sm mb-4" style="border-radius:14px;">
        <div class="card-header bg-light border-0 py-3 px-4" style="border-top-left-radius:14px; border-top-right-radius:14px;">
            <h6 class="fw-bold text-dark mb-0"><i class="bi bi-clock-history text-warning me-2 fs-5"></i> 3. Schedule, Mode & Venue / Meeting Link</h6>
        </div>
        <div class="card-body p-4">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold" style="font-size:13px;">Scheduled Date *</label>
                    <input type="date" class="form-control" id="scheduledDate" value="2026-03-17" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold" style="font-size:13px;">Start & End Time *</label>
                    <input type="text" class="form-control" id="scheduledTime" placeholder="e.g. 11:30 AM - 12:30 PM" value="11:30 AM - 12:30 PM" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold" style="font-size:13px;">Session Duration</label>
                    <select class="form-select" id="duration">
                        <option value="45 Minutes">45 Minutes</option>
                        <option value="1 Hour" selected>1 Hour</option>
                        <option value="2 Hours">2 Hours</option>
                        <option value="Half Day">Half Day Workshop</option>
                    </select>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold" style="font-size:13px;">Delivery Mode *</label>
                    <select class="form-select" id="deliveryMode" required>
                        <option value="In-person" selected>In-person (Onsite)</option>
                        <option value="Online">Online (Virtual)</option>
                        <option value="Hybrid">Hybrid (Onsite + Virtual)</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label fw-semibold" style="font-size:13px;">Venue Room / Meeting Link *</label>
                    <input type="text" class="form-control" id="venueLink" placeholder="e.g. Design Studio 2 or https://zoom.us/j/987654321" value="Design Studio 2" required>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 4: Materials & Remarks -->
    <div class="card card-custom border-0 shadow-sm mb-4" style="border-radius:14px;">
        <div class="card-header bg-light border-0 py-3 px-4" style="border-top-left-radius:14px; border-top-right-radius:14px;">
            <h6 class="fw-bold text-dark mb-0"><i class="bi bi-file-earmark-pdf text-danger me-2 fs-5"></i> 4. Training Materials & Initial Status</h6>
        </div>
        <div class="card-body p-4">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="font-size:13px;">Training Materials & Handbooks</label>
                    <input type="text" class="form-control" id="materials" placeholder="e.g. Design_System_v2.pdf, Figma_Handbook.pdf" value="Design_System_v2.pdf, Figma_Handbook.pdf">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold" style="font-size:13px;">Initial Session Status</label>
                    <select class="form-select" id="initialStatus">
                        <option value="Scheduled" selected>Scheduled</option>
                        <option value="In Progress">In Progress</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size:13px;">Additional Remarks & Preparation Notes</label>
                <textarea class="form-control" id="remarks" rows="2" placeholder="e.g. Bring personal workstation with Figma pre-installed.">Bring personal workstation with Figma pre-installed.</textarea>
            </div>
        </div>
    </div>

    <!-- Form Action Bar -->
    <div class="d-flex align-items-center justify-content-end gap-3 mb-5">
        <a href="onboarding-orientation.php" class="btn btn-light px-4">Cancel</a>
        <button type="button" class="btn btn-outline-secondary px-4" id="btnSaveDraft">Save Draft</button>
        <button type="submit" class="btn btn-primary px-4" id="btnSubmitForm" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-calendar-check me-1"></i> Schedule Session & Send Invites
        </button>
    </div>
</form>

<?php include 'footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const empSelect = document.getElementById('empSelect');
    if (empSelect) {
        empSelect.addEventListener('change', function() {
            const parts = this.value.split('|');
            document.getElementById('empId').value = parts[1] || '';
            document.getElementById('empDept').value = parts[2] || '';
            document.getElementById('empRole').value = parts[3] || '';
            if (parts[4]) document.getElementById('joiningDate').value = parts[4];
            if (parts[6]) document.getElementById('reportingManager').value = parts[6];
        });
    }

    const form = document.getElementById('createOrientationForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            window.location.href = 'onboarding-orientation.php';
        });
    }

    const btnDraft = document.getElementById('btnSaveDraft');
    if (btnDraft) {
        btnDraft.addEventListener('click', function() {
            window.location.href = 'onboarding-orientation.php';
        });
    }
});
</script>
