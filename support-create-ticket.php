<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <a href="support-tickets.php" class="text-decoration-none text-muted">Support &amp; Helpdesk</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="text-dark fw-semibold">Raise New Ticket</span>
            </nav>
            <h1 class="h3 fw-bold mb-0 text-dark">Create Support Ticket (Software &amp; Hardware SLA)</h1>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn btn-outline-primary btn-sm fw-semibold" onclick="fillTicketPreset('SW')">
                <i class="bi bi-code-slash me-1"></i>Test Software Bug Ticket
            </button>
            <button type="button" class="btn btn-outline-warning text-dark btn-sm fw-semibold" onclick="fillTicketPreset('HW')">
                <i class="bi bi-cpu me-1"></i>Test Hardware RMA Ticket
            </button>
            <a href="support-tickets.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Back to Tickets
            </a>
            <a href="ticket-dashboard.php" class="btn btn-outline-success btn-sm">
                <i class="bi bi-speedometer2 me-1"></i>Ticket Dashboard
            </a>
        </div>
    </div>

    <!-- Ticket Form -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
                <form id="createTicketForm">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4 pb-2 border-bottom">
                        <h5 class="fw-bold text-dark mb-0">
                            <i class="bi bi-ticket-perforated text-primary me-2"></i>Ticket Information &amp; SLA Routing
                        </h5>
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2" id="divisionBadge">
                            <i class="bi bi-code-square me-1"></i>Software &amp; Cloud Support
                        </span>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Business Division / Department <span class="text-danger">*</span></label>
                            <select class="form-select" id="tkDepartment" name="department" onchange="toggleDivisionFields()" required>
                                <option value="Software Support" selected>Software Support (SaaS / Cloud / ERP)</option>
                                <option value="Hardware Support">Hardware Support (Biometrics / CCTV / Field RMA)</option>
                                <option value="Tech Support">Tech Support (General IT)</option>
                                <option value="Sales">Sales &amp; Billing Support</option>
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label class="form-label fw-semibold small">Ticket Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tkSubject" name="subject" placeholder="Brief summary of the issue (e.g. API Webhook Timeout / Sensor Replacement)" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold small">Issue Category <span class="text-danger">*</span></label>
                            <select class="form-select" id="tkCategory" name="category" required>
                                <option value="API / Webhook Bug">SW - API / Webhook Bug</option>
                                <option value="Cloud Login / Server">SW - Cloud Login / Server</option>
                                <option value="Feature Request">SW - Feature / Change Request</option>
                                <option value="Device Replacement (RMA)">HW - Device Replacement (RMA)</option>
                                <option value="Biometric / Sensor Error">HW - Biometric / Sensor Error</option>
                                <option value="On-Site Cabling / Power">HW - On-Site Cabling / Power</option>
                                <option value="Billing & AMC">Billing &amp; AMC Inquiry</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Customer / Account <span class="text-danger">*</span></label>
                            <select class="form-select" id="tkCustomer" name="customer" required>
                                <option value="">-- Select Client Account --</option>
                                <option value="Gharuda Software">Gharuda Software (Software Client)</option>
                                <option value="Zen Publications">Zen Publications (Software Client)</option>
                                <option value="Power Spares Engineering">Power Spares Engineering (Hardware Client)</option>
                                <option value="Hindustan Hydraulics">Hindustan Hydraulics (Hardware Client)</option>
                                <option value="Apex Logistics Pvt Ltd">Apex Logistics Pvt Ltd (Enterprise Client)</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Contact Person &amp; Email / Mobile</label>
                            <input type="text" class="form-control" id="tkContactInfo" name="contact" placeholder="e.g. Rajesh Kumar (98400 11223 / support@client.com)">
                        </div>

                        <!-- Software Specific Fields -->
                        <div class="col-md-6" id="swEnvGroup">
                            <label class="form-label fw-semibold small text-primary"><i class="bi bi-cloud-check me-1"></i>Software Product / Environment</label>
                            <input type="text" class="form-control" id="tkSwEnv" placeholder="e.g. Gharuda Cloud ERP v4.2 - Production Instance">
                        </div>
                        <div class="col-md-6" id="swUrlGroup">
                            <label class="form-label fw-semibold small text-primary"><i class="bi bi-link-45deg me-1"></i>Affected Module / Endpoint URL</label>
                            <input type="text" class="form-control" id="tkSwUrl" placeholder="e.g. /api/v2/leads/webhook-sync">
                        </div>

                        <!-- Hardware Specific Fields -->
                        <div class="col-md-4 d-none" id="hwSerialGroup">
                            <label class="form-label fw-semibold small text-warning-emphasis"><i class="bi bi-upc-scan me-1"></i>Hardware Serial / MAC No.</label>
                            <input type="text" class="form-control" id="tkHwSerial" placeholder="e.g. SN-BIO-2026-9041">
                        </div>
                        <div class="col-md-4 d-none" id="hwWarrantyGroup">
                            <label class="form-label fw-semibold small text-warning-emphasis"><i class="bi bi-shield-check me-1"></i>Warranty / AMC Status</label>
                            <select class="form-select" id="tkHwWarranty">
                                <option value="Under 1-Yr OEM Warranty">Under 1-Yr OEM Warranty (Free RMA)</option>
                                <option value="Active Annual AMC">Active Annual AMC Contract</option>
                                <option value="Out of Warranty (Billable)">Out of Warranty (Billable Service)</option>
                            </select>
                        </div>
                        <div class="col-md-4 d-none" id="hwVisitGroup">
                            <label class="form-label fw-semibold small text-warning-emphasis"><i class="bi bi-geo-alt me-1"></i>Field Engineer Visit Needed?</label>
                            <select class="form-select" id="tkHwVisit">
                                <option value="Yes - On-Site Dispatch">Yes - Dispatch Field Technician</option>
                                <option value="Courier RMA Pickup">Courier RMA Pickup to Service Center</option>
                                <option value="Remote Diagnostics First">Remote Diagnostics First</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Priority <span class="text-danger">*</span></label>
                            <select class="form-select" id="tkPriority" name="priority">
                                <option value="Low">Low</option>
                                <option value="Medium" selected>Medium</option>
                                <option value="High">High</option>
                                <option value="Urgent">Critical / Urgent</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Assigned Support Engineer</label>
                            <select class="form-select" id="tkAssignee" name="assignee">
                                <option value="Harish D.">Harish D. (Lead Software Eng)</option>
                                <option value="Divya A.">Divya A. (Hardware &amp; RMA Specialist)</option>
                                <option value="Karthik R.">Karthik R. (Field Service Eng)</option>
                                <option value="Priya S.">Priya S. (Cloud &amp; Billing Desk)</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">SLA Policy</label>
                            <select class="form-select" id="tkSla" name="sla">
                                <option value="Standard (24h Resolution)">Standard (24h Resolution)</option>
                                <option value="Priority (4h Resolution)">Priority (4h Resolution)</option>
                                <option value="Urgent (1h Response)">Urgent (1h Response)</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold small">Issue Details, Logs &amp; Steps to Reproduce <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="tkDetails" name="details" rows="4" placeholder="Provide full context, error messages, device symptoms, and customer impact..." required></textarea>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-3 border-top mt-4">
                        <div class="small text-muted">
                            <i class="bi bi-info-circle me-1"></i>Submitting will log the ticket in <strong>Support Tickets</strong> and enable 1-click Follow-Up, Task Assignment, or Site Visit scheduling.
                        </div>
                        <div class="d-flex gap-2">
                            <a href="support-tickets.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="bi bi-send me-1"></i>Submit Ticket
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function toggleDivisionFields() {
    var dept = document.getElementById('tkDepartment').value;
    var isHw = (dept === 'Hardware Support');
    document.getElementById('swEnvGroup').classList.toggle('d-none', isHw);
    document.getElementById('swUrlGroup').classList.toggle('d-none', isHw);
    document.getElementById('hwSerialGroup').classList.toggle('d-none', !isHw);
    document.getElementById('hwWarrantyGroup').classList.toggle('d-none', !isHw);
    document.getElementById('hwVisitGroup').classList.toggle('d-none', !isHw);

    var badge = document.getElementById('divisionBadge');
    if (isHw) {
        badge.className = 'badge bg-warning-subtle text-dark border border-warning-subtle px-3 py-2';
        badge.innerHTML = '<i class="bi bi-cpu me-1"></i>Hardware &amp; Field Engineering';
    } else {
        badge.className = 'badge bg-success-subtle text-success border border-success-subtle px-3 py-2';
        badge.innerHTML = '<i class="bi bi-code-square me-1"></i>Software &amp; Cloud Support';
    }
}

function fillTicketPreset(type) {
    if (type === 'SW') {
        document.getElementById('tkDepartment').value = 'Software Support';
        toggleDivisionFields();
        document.getElementById('tkSubject').value = 'REST API Webhook Timeout during IndiaMART Lead Sync';
        document.getElementById('tkCategory').value = 'API / Webhook Bug';
        document.getElementById('tkCustomer').value = 'Gharuda Software';
        document.getElementById('tkContactInfo').value = 'Aravind Swamy (+91 98402 55110 / devops@gharudasoft.in)';
        document.getElementById('tkSwEnv').value = 'Gharuda Cloud CRM v4.2 (Production Tenant)';
        document.getElementById('tkSwUrl').value = 'POST https://crm.gharuda.in/api/v2/webhooks/indiamart';
        document.getElementById('tkPriority').value = 'High';
        document.getElementById('tkAssignee').value = 'Harish D.';
        document.getElementById('tkSla').value = 'Priority (4h Resolution)';
        document.getElementById('tkDetails').value = 'Webhook payloads from IndiaMART are returning HTTP 504 Gateway Timeout during peak hours (11:00 AM - 01:00 PM). Need async queue worker optimization and retry handler.';
    } else {
        document.getElementById('tkDepartment').value = 'Hardware Support';
        toggleDivisionFields();
        document.getElementById('tkSubject').value = 'Biometric Optical Sensor Failure - Device Replacement Needed';
        document.getElementById('tkCategory').value = 'Device Replacement (RMA)';
        document.getElementById('tkCustomer').value = 'Power Spares Engineering';
        document.getElementById('tkContactInfo').value = 'Suresh Babu (+91 94441 88219 / planthead@powerspares.in)';
        document.getElementById('tkHwSerial').value = 'SN-BIO-2026-9041';
        document.getElementById('tkHwWarranty').value = 'Under 1-Yr OEM Warranty';
        document.getElementById('tkHwVisit').value = 'Yes - On-Site Dispatch';
        document.getElementById('tkPriority').value = 'Urgent';
        document.getElementById('tkAssignee').value = 'Divya A.';
        document.getElementById('tkSla').value = 'Urgent (1h Response)';
        document.getElementById('tkDetails').value = 'Main factory gate eSSL Face & Fingerprint terminal optical sensor stopped scanning after voltage surge. Requires on-site field engineer inspection and standby unit replacement under OEM warranty.';
    }
}

document.getElementById('createTicketForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var dept = document.getElementById('tkDepartment').value;
    var isHw = (dept === 'Hardware Support');
    var now = new Date();
    var pad = function(n) { return n < 10 ? '0' + n : n; };
    var createdStr = pad(now.getDate()) + '-' + pad(now.getMonth() + 1) + '-' + now.getFullYear() + ' ' +
                     pad(now.getHours()) + ':' + pad(now.getMinutes()) + ':' + pad(now.getSeconds());

    var stored = [];
    try {
        stored = JSON.parse(localStorage.getItem('gh_support_tickets') || '[]');
    } catch (err) { stored = []; }

    var nextNo = 71 + stored.length;
    var newTicket = {
        id: Date.now(),
        no: nextNo,
        subject: document.getElementById('tkSubject').value.trim(),
        dotColor: isHw ? '#d97706' : '#16a34a',
        tags: isHw ? 'HW · RMA' : 'SW · Bug',
        department: dept,
        service: document.getElementById('tkCategory').value,
        contact: document.getElementById('tkCustomer').value,
        contactPerson: document.getElementById('tkContactInfo').value,
        status: 'Open',
        priority: document.getElementById('tkPriority').value,
        assignee: document.getElementById('tkAssignee').value,
        sla: document.getElementById('tkSla').value,
        serialOrEnv: isHw ? (document.getElementById('tkHwSerial').value || 'SN-BIO-2026-9041') : (document.getElementById('tkSwEnv').value || 'Cloud ERP v4.2'),
        details: document.getElementById('tkDetails').value.trim(),
        lastReply: 'Just Raised (Awaiting Triage)',
        created: createdStr,
        followups: [
            {
                time: createdStr,
                author: document.getElementById('tkCustomer').value,
                role: 'Client Raised Ticket',
                note: document.getElementById('tkDetails').value.trim(),
                status: 'Open'
            }
        ]
    };

    stored.unshift(newTicket);
    localStorage.setItem('gh_support_tickets', JSON.stringify(stored));
    window.location.href = 'support-tickets.php?created=' + nextNo;
});
</script>

<?php include 'footer.php'; ?>
