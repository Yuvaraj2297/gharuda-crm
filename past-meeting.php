<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/quill-editor.css">

<div class="container-fluid px-0">

    <!-- Title row -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width:42px;height:42px;font-size:20px;">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div>
                <h4 class="fw-bold text-dark mb-0">Past Meetings</h4>
                <span class="text-muted small">View and manage concluded and historic appointments</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="appointments.php" class="btn btn-sm btn-outline-success"><i class="bi bi-calendar2-week me-1"></i>Appointments</a>
            <a href="callbacks.php" class="btn btn-sm btn-outline-primary"><i class="bi bi-telephone-forward me-1"></i>Callbacks</a>
            <a href="summary-report.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-bar-chart-line me-1"></i>Summary Report</a>
        </div>
    </div>

    <!-- Table (toolbar + export + column visibility + pagination auto-created by datatable class via auto-master-table.js) -->
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden" id="pm5TableWrap">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable" id="pm5Table" data-table-name="Past Meetings">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">S.No</th>
                        <th style="min-width:220px;">Subject</th>
                        <th style="min-width:170px;">Appointment Date</th>
                        <th style="width:170px;">Initiated by</th>
                        <th style="min-width:300px;">Description</th>
                        <th style="width:100px;">Source</th>
                        <th style="min-width:180px;">Added to Calendars</th>
                        <th style="width:140px;">Action</th>
                    </tr>
                </thead>
                <tbody id="pm5Tbody">
                    <tr data-id="27" data-status="Finished" data-source="External" data-date="2026-09-27" data-phone="9884023456" data-email="lakshmi.pharma@gmail.com" data-location="Chennai">
                        <td>1</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="27" title="Callback — Lakshmi Pharma">Callback — Lakshmi Pharma</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">27-09-2026 11:00 AM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="Priya S.">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">P</span>
                                <span class="fw-medium text-dark">Priya S.</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="AMC renewal follow-up call">AMC renewal follow-up call</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">External</span></td>
                        <td><span class="pm5-cal-note text-muted small"><i class="bi bi-google text-primary me-1"></i>Added to Google Calendar.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="27" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="27" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="27" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="25" data-status="Finished" data-source="Lead" data-date="2026-09-26" data-phone="9807456321" data-email="ravi.shankar@gmail.com" data-location="Gharuda Office, Chennai">
                        <td>2</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="25" title="Callback — Ravi Shankar">Callback — Ravi Shankar</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">26-09-2026 10:30 AM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="Harish D.">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">H</span>
                                <span class="fw-medium text-dark">Harish D.</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="Customer asked to call back about solar package">Customer asked to call back about solar package</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Lead</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="25" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="25" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="25" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="24" data-status="Finished" data-source="Internal" data-date="2026-07-13" data-phone="9500123456" data-email="software@gharuda.com" data-location="HQ">
                        <td>3</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="24" title="Test Appointment">Test Appointment</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">13-07-2026 10:00 AM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">G</span>
                                <span class="fw-medium text-dark">GHRAUDA SOFTWARE</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="Testing">Testing</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Internal</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="24" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="24" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="24" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="23" data-status="Finished" data-source="Internal" data-date="2026-12-06" data-phone="9500123456" data-email="software@gharuda.com" data-location="HQ">
                        <td>4</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="23" title="Testing OTP">Testing OTP</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">06-12-2026 06:00 PM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">G</span>
                                <span class="fw-medium text-dark">GHRAUDA SOFTWARE</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="test">test</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Internal</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="23" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="23" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="23" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="19" data-status="Finished" data-source="Internal" data-date="2026-10-06" data-phone="9500123456" data-email="software@gharuda.com" data-location="HQ">
                        <td>5</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="19" title="Testing Project Dropdown">Testing Project Dropdown</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">06-10-2026 11:30 AM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">G</span>
                                <span class="fw-medium text-dark">GHRAUDA SOFTWARE</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="Testing 12345 678910">Testing 12345 678910</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Internal</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="19" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="19" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="19" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="17" data-status="Missed" data-source="Lead" data-date="2026-05-11" data-phone="9500123456" data-email="lead.test1@gmail.com" data-location="Online">
                        <td>6</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="17" title="test 1">test 1</a>
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle">Missed</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">11-05-2026 05:00 PM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">G</span>
                                <span class="fw-medium text-dark">GHRAUDA SOFTWARE</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="test">test</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Lead</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="17" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="17" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="17" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="13" data-status="Missed" data-source="Lead" data-date="2026-04-25" data-phone="9500123456" data-email="testing@gmail.com" data-location="Online">
                        <td>7</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="13" title="TESTING">TESTING</a>
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle">Missed</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">25-04-2026 09:00 AM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">G</span>
                                <span class="fw-medium text-dark">GHRAUDA SOFTWARE</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="Test">Test</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Lead</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="13" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="13" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="13" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="12" data-status="Finished" data-source="Lead" data-date="2026-03-01" data-phone="9962023456" data-email="divya.tester@gmail.com" data-location="Chennai">
                        <td>8</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="12" title="GHARUDAtester">GHARUDAtester</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">01-03-2026 04:00 PM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="Divya A.">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">D</span>
                                <span class="fw-medium text-dark">Divya A.</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="tester">tester</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Lead</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="12" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="12" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="12" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="11" data-status="Cancelled" data-source="External" data-date="2026-01-03" data-phone="9884023456" data-email="tester.ext@gmail.com" data-location="External Office">
                        <td>9</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="11" title="Tester">Tester</a>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle">Cancelled</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">03-01-2026 03:24 PM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="Divya A.">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">D</span>
                                <span class="fw-medium text-dark">Divya A.</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="mnbvcxz">mnbvcxz</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">External</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="11" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="11" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="11" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="10" data-status="Finished" data-source="External" data-date="2026-01-02" data-phone="9884023456" data-email="tester2@gmail.com" data-location="Client Site">
                        <td>10</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="10" title="tester">tester</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">02-01-2026 06:45 PM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="Divya A.">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">D</span>
                                <span class="fw-medium text-dark">Divya A.</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="tester">tester</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">External</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="8" data-status="Finished" data-source="Internal" data-date="2025-12-13" data-phone="9500123456" data-email="magtech@security.com" data-location="Korattur">
                        <td>11</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="8" title="REG: Mag Tech security management">REG: Mag Tech security management</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">13-12-2025 02:00 PM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">G</span>
                                <span class="fw-medium text-dark">GHRAUDA SOFTWARE</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="Appointment fixed at Mag Tech security management system assigned to Raj Kumar at Korattur on 13th December 2025, 3.00 pm.">Appointment fixed at Mag Tech security management system assigned to Raj Kumar at Korattur on 13th December 2025, 3.00 pm.</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Internal</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="7" data-status="Finished" data-source="Internal" data-date="2025-12-13" data-phone="9500123456" data-email="avtec@company.com" data-location="AVTEC premises">
                        <td>12</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="7" title="REG: Training on ERP software to Customer">REG: Training on ERP software to Customer</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">13-12-2025 11:00 AM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">G</span>
                                <span class="fw-medium text-dark">GHRAUDA SOFTWARE</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="Customer asking for real time demo training on ERP software at AVTEC company on 13th December 2025, Saturdayat 11.00am.">Customer asking for real time demo training on ERP software at AVTEC company on 13th December 2025, Saturdayat 11.00am.</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Internal</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="4" data-status="Finished" data-source="Lead" data-date="2025-10-27" data-phone="9962023456" data-email="appt@lead.com" data-location="Online">
                        <td>13</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="4" title="appointment">appointment</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">27-10-2025 03:50 PM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="Divya A.">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">D</span>
                                <span class="fw-medium text-dark">Divya A.</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="test">test</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Lead</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="1" data-status="Finished" data-source="Lead" data-date="2025-10-25" data-phone="9962023456" data-email="divya.test@lead.com" data-location="Chennai">
                        <td>14</td>
                        <td>
                            <div class="d-flex flex-column align-items-start gap-1">
                                <a href="#" class="pm5-subject-link text-primary fw-semibold text-decoration-none text-truncate" style="max-width:240px;" data-id="1" title="test">test</a>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Finished</span>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border font-monospace pm5-date-chip">25-10-2025 08:00 PM</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2 pm5-initiated" title="Divya A.">
                                <span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold p-0 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;font-size:12px;">D</span>
                                <span class="fw-medium text-dark">Divya A.</span>
                            </div>
                        </td>
                        <td><span class="pm5-desc text-secondary text-truncate d-inline-block" style="max-width:300px;" title="tedt attendance urgently">tedt attendance urgently</span></td>
                        <td><span class="badge bg-secondary-subtle text-secondary border">Lead</span></td>
                        <td><span class="pm5-cal-note text-muted small">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-outline-secondary" data-pm5="view" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="edit" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="btn btn-outline-secondary" data-pm5="feedback" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- ===== Meeting Overview (fullscreen view — pure Bootstrap 5) ===== -->
<div class="modal fade" id="pm5ViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-light">
            <div class="modal-header bg-white border-bottom shadow-sm px-4 py-3">
                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-arrow-left me-1"></i>Go Back
                    </button>
                    <h5 class="modal-title fw-bold text-dark mb-0">Meeting Overview</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="container-fluid" style="max-width: 1000px;">
                    <!-- Status Banner Card -->
                    <div class="card border-0 shadow-sm rounded-3 mb-4 text-center p-4">
                        <h4 class="fw-bold text-dark mb-2" id="pm5ViewSubjectTitle">Meeting Overview</h4>
                        <div>
                            <span class="text-muted small text-uppercase fw-semibold me-2">Meeting Status:</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fs-6" id="pm5ViewStatus">FINISHED</span>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- General Information -->
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm rounded-3 h-100">
                                <div class="card-header bg-white border-bottom py-3">
                                    <h6 class="fw-bold mb-0 text-primary"><i class="bi bi-info-circle me-2"></i>General Information</h6>
                                </div>
                                <div class="card-body">
                                    <dl class="row mb-0 gy-2">
                                        <dt class="col-sm-5 text-muted fw-normal">Initiated by</dt>
                                        <dd class="col-sm-7 fw-semibold text-dark" id="pm5ViewInitiated">Harish D.</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Subject</dt>
                                        <dd class="col-sm-7 fw-semibold text-dark" id="pm5ViewSubject">Callback — Ravi Shankar</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Description</dt>
                                        <dd class="col-sm-7 text-dark" id="pm5ViewDesc">Customer asked to call back about solar package</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Meeting Date</dt>
                                        <dd class="col-sm-7 fw-semibold text-dark" id="pm5ViewDate">26-09-2026</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Start Time</dt>
                                        <dd class="col-sm-7 fw-semibold text-dark" id="pm5ViewTime">10:30 AM</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Attendees</dt>
                                        <dd class="col-sm-7">
                                            <span class="badge bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;" id="pm5ViewAttendeeChip">H</span>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm rounded-3 h-100">
                                <div class="card-header bg-white border-bottom py-3">
                                    <h6 class="fw-bold mb-0 text-primary"><i class="bi bi-person-lines-fill me-2"></i>Additional Information</h6>
                                </div>
                                <div class="card-body">
                                    <dl class="row mb-0 gy-2">
                                        <dt class="col-sm-5 text-muted fw-normal">Source</dt>
                                        <dd class="col-sm-7"><span class="badge bg-secondary-subtle text-secondary" id="pm5ViewSource">Lead</span></dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Name</dt>
                                        <dd class="col-sm-7"><a href="#" class="text-decoration-none fw-semibold">Ravi Shankar</a></dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Email</dt>
                                        <dd class="col-sm-7"><a href="#" class="text-decoration-none">ravi.shankar@gmail.com</a></dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Phone</dt>
                                        <dd class="col-sm-7" id="pm5ViewPhone">
                                            <span class="badge bg-info-subtle text-info border border-info-subtle me-1">SMS: 9807456321</span>
                                            <span class="badge bg-success-subtle text-success border border-success-subtle">CALL: 9807456321</span>
                                        </dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Location</dt>
                                        <dd class="col-sm-7 text-dark" id="pm5ViewLocation">Gharuda Office, Chennai</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Calendars</dt>
                                        <dd class="col-sm-7 text-muted small" id="pm5ViewCalendar">Not added to any calendar yet.</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <!-- Reminders Card -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-3">
                                <div class="card-header bg-white border-bottom py-3">
                                    <h6 class="fw-bold mb-0 text-primary"><i class="bi bi-bell me-2"></i>Meeting Reminders</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6 d-flex align-items-center justify-content-between p-3 bg-light rounded-2">
                                            <span class="text-muted">SMS notification triggered</span>
                                            <span class="badge bg-success-subtle text-success" id="pm5ViewSmsReminder"><i class="bi bi-check-circle me-1"></i>Yes</span>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center justify-content-between p-3 bg-light rounded-2">
                                            <span class="text-muted">Email notification triggered</span>
                                            <span class="badge bg-success-subtle text-success" id="pm5ViewEmailReminder"><i class="bi bi-check-circle me-1"></i>Yes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== Edit Appointment Modal (pure Bootstrap 5) ===== -->
<div class="modal fade" id="pm5EditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-pencil-square me-2 text-primary"></i>Edit Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-semibold text-secondary">* Subject</label>
                        <input type="text" class="form-control" id="pm5EdSubject" autocomplete="off" value="Callback — Ravi Shankar">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold text-secondary">* Description</label>
                        <textarea class="form-control" id="pm5EdDesc" rows="3">Customer asked to call back about solar package</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Related</label>
                        <select class="form-select select2" id="pm5EdRelated">
                            <option value="Internal (Contact)">Internal (Contact)</option>
                            <option value="Internal (Lead)">Internal (Lead)</option>
                            <option value="External">External</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">* Name</label>
                        <input type="text" class="form-control" id="pm5EdName" autocomplete="off" value="Ravi Shankar">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">* Email</label>
                        <input type="email" class="form-control" id="pm5EdEmail" autocomplete="off" value="ravi.shankar@gmail.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Phone (Ex: +168 1234 5678)</label>
                        <input type="text" class="form-control" id="pm5EdPhone" autocomplete="off" value="+91 98074 56321">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">* Date / Time</label>
                        <div class="row g-2">
                            <div class="col-7">
                                <div class="date-picker">
                                    <input type="text" class="date-input form-control" id="pm5EdDateTime" value="26-09-2026" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="time-picker right-0">
                                    <input type="text" class="time-input form-control" id="pm5EdTime" value="10:30" placeholder="HH:MM" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Appointment Location (optional)</label>
                        <input type="text" class="form-control" id="pm5EdLocation" autocomplete="off" value="Gharuda Office, Chennai">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">* Attendees</label>
                        <select class="form-select select2" id="pm5EdAttendees">
                            <option value="Imala ina, gharuda SOFTWARE">Imala ina, gharuda SOFTWARE</option>
                            <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                            <option value="Harish D.">Harish D.</option>
                            <option value="Divya A.">Divya A.</option>
                            <option value="Priya S.">Priya S.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Appointment Type</label>
                        <select class="form-select select2" id="pm5EdType">
                            <option value="">Non selected</option>
                            <option value="SD - Online Demo" data-color="#16a34a" selected>SD - Online Demo</option>
                            <option value="SD - Direct Visit - lead" data-color="#0d9488">SD - Direct Visit - lead</option>
                            <option value="DEV - Direct Visit - customer" data-color="#9f1239">DEV - Direct Visit - customer</option>
                            <option value="DEV - Customer visit - GHARUDA" data-color="#2563eb">DEV - Customer visit - GHARUDA</option>
                            <option value="DEV - Online Demo - Customer" data-color="#dc2626">DEV - Online Demo - Customer</option>
                            <option value="SD - GHARUDA Visit" data-color="#06b6d4">SD - GHARUDA Visit</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Repeat every</label>
                        <select class="form-select select2" id="pm5EdRepeat">
                            <option value="">Non selected</option>
                            <option value="1 week">1 week</option>
                            <option value="2 weeks">2 weeks</option>
                            <option value="1 month">1 month</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="alert alert-info py-2 px-3 small border-0 mb-3">
                            <i class="bi bi-info-circle me-1"></i>Please mark the checkboxes as checked if you want selected attendee and contact to receive reminders eg. if set 30 minutes before the appointment start. Note that this feature requires cron job to be configured.
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="pm5EdSms" checked>
                            <label class="form-check-label" for="pm5EdSms">Send SMS Notifications</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pm5EdEmailNotif" checked>
                            <label class="form-check-label" for="pm5EdEmailNotif">Send Email Notifications</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold text-secondary">Appointment notes</label>
                        <div class="border rounded-2">
                            <div id="pm5EdQuill"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="pm5EdSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/quill-editor.js"></script>
<script>
    (function () {
        'use strict';

        document.addEventListener('DOMContentLoaded', function () {
            var tableEl = document.getElementById('pm5Table');
            if (window.AutoMasterTable && tableEl && !tableEl.autoTable) {
                window.AutoMasterTable.init(tableEl);
            }

            /* Select2 inside modal binding */
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('.modal').on('shown.bs.modal', function () {
                    var $m = $(this);
                    $m.find('select.select2').each(function () {
                        if ($(this).data('select2')) $(this).select2('destroy');
                        $(this).select2({
                            dropdownParent: $m,
                            width: '100%'
                        });
                    });
                });
            }

            /* Modals */
            var viewModalEl = document.getElementById('pm5ViewModal');
            var editModalEl = document.getElementById('pm5EditModal');
            var edQuill = null;

            function initEditQuill() {
                if (edQuill || typeof Quill === 'undefined' || !document.querySelector('#pm5EdQuill')) return;
                edQuill = new Quill('#pm5EdQuill', {
                    theme: 'snow',
                    placeholder: 'Write appointment notes here...',
                    modules: {
                        toolbar: [
                            [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                            ['bold', 'italic', 'underline'],
                            [{ align: [] }],
                            [{ list: 'bullet' }, { list: 'ordered' }],
                            ['link'], ['clean']
                        ]
                    }
                });
                edQuill.root.innerHTML = '<p>Sample appointment notes for past meeting record.</p>';
            }

            if (editModalEl) {
                editModalEl.addEventListener('shown.bs.modal', function () {
                    setTimeout(initEditQuill, 100);
                });
            }

            /* Pure Bootstrap 5 Toast Notification */
            var toastContainer = null;
            function showToast(msg) {
                if (!toastContainer) {
                    toastContainer = document.createElement('div');
                    toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
                    toastContainer.style.zIndex = '1090';
                    document.body.appendChild(toastContainer);
                }
                var toastEl = document.createElement('div');
                toastEl.className = 'toast align-items-center text-bg-primary border-0 shadow';
                toastEl.setAttribute('role', 'alert');
                toastEl.setAttribute('aria-live', 'assertive');
                toastEl.setAttribute('aria-atomic', 'true');
                toastEl.innerHTML = '<div class="d-flex"><div class="toast-body d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill fs-5"></i><span>' + msg + '</span></div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>';
                toastContainer.appendChild(toastEl);
                var bsToast = new bootstrap.Toast(toastEl, { delay: 4000 });
                bsToast.show();
                toastEl.addEventListener('hidden.bs.toast', function () { toastEl.remove(); });
            }

            /* Table Row Action Delegation */
            var tbody = document.getElementById('pm5Tbody');
            if (tbody) {
                tbody.addEventListener('click', function (e) {
                    var tr = e.target.closest('tr');
                    if (!tr) return;

                    var viewBtn = e.target.closest('[data-pm5="view"]') || e.target.closest('.pm5-subject-link');
                    if (viewBtn) {
                        e.preventDefault();
                        var subj = tr.querySelector('.pm5-subject-link') ? tr.querySelector('.pm5-subject-link').textContent.trim() : 'Meeting';
                        var st = tr.getAttribute('data-status') || 'FINISHED';
                        var dt = tr.querySelector('.pm5-date-chip') ? tr.querySelector('.pm5-date-chip').textContent.trim() : '';
                        var init = tr.querySelector('.pm5-initiated') ? tr.querySelector('.pm5-initiated').textContent.trim() : '';
                        var desc = tr.querySelector('.pm5-desc') ? tr.querySelector('.pm5-desc').textContent.trim() : '';
                        var src = tr.getAttribute('data-source') || '';
                        var cal = tr.querySelector('.pm5-cal-note') ? tr.querySelector('.pm5-cal-note').textContent.trim() : '';

                        if (document.getElementById('pm5ViewSubject')) document.getElementById('pm5ViewSubject').textContent = subj;
                        if (document.getElementById('pm5ViewSubjectTitle')) document.getElementById('pm5ViewSubjectTitle').textContent = subj;
                        if (document.getElementById('pm5ViewStatus')) {
                            var statusEl = document.getElementById('pm5ViewStatus');
                            statusEl.textContent = st.toUpperCase();
                            var badgeColor = st === 'Finished' ? 'bg-success-subtle text-success border-success-subtle' : (st === 'Missed' ? 'bg-warning-subtle text-warning border-warning-subtle' : 'bg-danger-subtle text-danger border-danger-subtle');
                            statusEl.className = 'badge border px-3 py-2 fs-6 ' + badgeColor;
                        }
                        if (document.getElementById('pm5ViewDate')) document.getElementById('pm5ViewDate').textContent = dt;
                        if (document.getElementById('pm5ViewInitiated')) document.getElementById('pm5ViewInitiated').textContent = init;
                        if (document.getElementById('pm5ViewDesc')) document.getElementById('pm5ViewDesc').textContent = desc;
                        if (document.getElementById('pm5ViewSource')) document.getElementById('pm5ViewSource').textContent = src;
                        if (document.getElementById('pm5ViewCalendar')) document.getElementById('pm5ViewCalendar').textContent = cal;

                        if (viewModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(viewModalEl).show();
                        }
                        return;
                    }

                    var editBtn = e.target.closest('[data-pm5="edit"]');
                    if (editBtn) {
                        e.preventDefault();
                        var editSubj = tr.querySelector('.pm5-subject-link') ? tr.querySelector('.pm5-subject-link').textContent.trim() : '';
                        var editDesc = tr.querySelector('.pm5-desc') ? tr.querySelector('.pm5-desc').textContent.trim() : '';
                        if (document.getElementById('pm5EdSubject')) document.getElementById('pm5EdSubject').value = editSubj;
                        if (document.getElementById('pm5EdDesc')) document.getElementById('pm5EdDesc').value = editDesc;
                        if (editModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(editModalEl).show();
                        }
                        return;
                    }

                    var fbBtn = e.target.closest('[data-pm5="feedback"]');
                    if (fbBtn) {
                        e.preventDefault();
                        showToast('Feedback was successfully requested. You will be notified by email if feedback is given!');
                        return;
                    }
                });
            }

            /* Edit submit */
            var edSubmit = document.getElementById('pm5EdSubmit');
            if (edSubmit) {
                edSubmit.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (editModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(editModalEl).hide();
                        showToast('Appointment updated successfully');
                    }
                });
            }
        });
    })();
</script>
<?php include 'footer.php'; ?>
