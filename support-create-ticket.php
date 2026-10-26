<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <a href="support-tickets.php" class="text-decoration-none text-muted hover-primary">Support</a>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Raise New Ticket</span>
            </nav>
            <h1 class="h3 fw-bold mb-0 text-dark">Create Support Ticket</h1>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="support-tickets.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i>Back to Tickets
            </a>
            <a href="ticket-dashboard.php" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-speedometer2 me-1"></i>Ticket Dashboard
            </a>
        </div>
    </div>

    <!-- Ticket Form -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm rounded-3 p-4">
                <form id="createTicketForm" action="support-tickets.php" method="GET">
                    <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom">
                        <i class="bi bi-ticket-perforated text-primary me-2"></i>Ticket Information
                    </h5>

                    <div class="row g-3 mb-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold small">Ticket Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subject" placeholder="Brief summary of the issue (e.g. Lead Export CSV parsing error)" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Category <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="category" required>
                                <option value="Technical">Technical Bug</option>
                                <option value="Billing">Billing &amp; Invoice</option>
                                <option value="Feature">Feature Request</option>
                                <option value="Account">Account Access</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Customer / Account <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="customer" required>
                                <option value="">-- Select Client --</option>
                                <option value="Power Spares Engineering">Power Spares Engineering</option>
                                <option value="Zen Publications">Zen Publications</option>
                                <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
                                <option value="Gharuda Software">Gharuda Software</option>
                                <option value="PhDAssistance">PhDAssistance</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small">Contact Email / Mobile</label>
                            <input type="text" class="form-control" name="contact" placeholder="contact@example.com or mobile">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Priority <span class="text-danger">*</span></label>
                            <select class="form-select" name="priority">
                                <option value="Low">Low</option>
                                <option value="Medium" selected>Medium</option>
                                <option value="High">High</option>
                                <option value="Urgent">Critical / Urgent</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">Assigned Support Agent</label>
                            <select class="form-select select2" name="assignee">
                                <option value="Harish D.">Harish D.</option>
                                <option value="Divya A.">Divya A.</option>
                                <option value="Karthik R.">Karthik R.</option>
                                <option value="Priya S.">Priya S.</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small">SLA Policy</label>
                            <select class="form-select" name="sla">
                                <option value="Standard">Standard (24h Resolution)</option>
                                <option value="Priority">Priority (4h Resolution)</option>
                                <option value="Urgent">Urgent (1h Response)</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold small">Issue Details &amp; Steps to Reproduce <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="details" rows="6" placeholder="Provide full context, error messages, and customer impact..." required></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold small">Attach Screenshot or Log File</label>
                            <input type="file" class="form-control" name="attachment">
                            <span class="text-muted small">Supported files: PNG, JPG, PDF, ZIP (Max 10MB)</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 pt-3 border-top mt-4">
                        <a href="support-tickets.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send me-1"></i>Submit Ticket
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
