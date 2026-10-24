<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/quill-editor.css">
<link rel="stylesheet" href="./assets/css/past-meeting.css">

<div class="pm5-page">

    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div>
                <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Past Meeting</h1>
            </div>
        </div>
        <div class="pm5-pills">
            <a href="appointments.php" class="pm5-pill nav-green"><i class="bi bi-calendar2-week me-1"></i>Appointments</a>
            <a href="callbacks.php" class="pm5-pill nav-violet"><i class="bi bi-telephone-forward me-1"></i>Callbacks</a>
        </div>
    </div>

    <!-- Table (toolbar + export + column visibility + pagination auto-created by datatable class via auto-master-table.js) -->
    <div class="card-custom p-0 overflow-hidden" id="pm5TableWrap">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="pm5Table" data-table-name="Past Meetings">
                <thead>
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
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="27" title="Callback — Lakshmi Pharma">Callback — Lakshmi Pharma</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">27-09-2026 11:00 AM</span></td>
                        <td>
                            <span class="pm5-initiated" title="Priya S.">
                                <span class="pm5-avatar av-grey">P</span>Priya S.
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="AMC renewal follow-up call">AMC renewal follow-up call</span></td>
                        <td>External</td>
                        <td><span class="pm5-cal-note">Added to Google Calendar.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="27" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="27" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="27" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="25" data-status="Finished" data-source="Lead" data-date="2026-09-26" data-phone="9807456321" data-email="ravi.shankar@gmail.com" data-location="Gharuda Office, Chennai">
                        <td>2</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="25" title="Callback — Ravi Shankar">Callback — Ravi Shankar</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">26-09-2026 10:30 AM</span></td>
                        <td>
                            <span class="pm5-initiated" title="Harish D.">
                                <span class="pm5-avatar av-violet">H</span>Harish D.
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="Customer asked to call back about solar package">Customer asked to call back about solar package</span></td>
                        <td>Lead</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="25" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="25" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="25" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="24" data-status="Finished" data-source="Internal" data-date="2026-07-13" data-phone="9500123456" data-email="software@gharuda.com" data-location="HQ">
                        <td>3</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="24" title="Test Appointment">Test Appointment</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">13-07-2026 10:00 AM</span></td>
                        <td>
                            <span class="pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="pm5-avatar av-violet">G</span>GHRAUDA SOFTWARE
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="Testing">Testing</span></td>
                        <td>Internal</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="24" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="24" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="24" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="23" data-status="Finished" data-source="Internal" data-date="2026-12-06" data-phone="9500123456" data-email="software@gharuda.com" data-location="HQ">
                        <td>4</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="23" title="Testing OTP">Testing OTP</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">06-12-2026 06:00 PM</span></td>
                        <td>
                            <span class="pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="pm5-avatar av-violet">G</span>GHRAUDA SOFTWARE
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="test">test</span></td>
                        <td>Internal</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="23" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="23" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="23" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="19" data-status="Finished" data-source="Internal" data-date="2026-10-06" data-phone="9500123456" data-email="software@gharuda.com" data-location="HQ">
                        <td>5</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="19" title="Testing Project Dropdown">Testing Project Dropdown</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">06-10-2026 11:30 AM</span></td>
                        <td>
                            <span class="pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="pm5-avatar av-violet">G</span>GHRAUDA SOFTWARE
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="Testing 12345 678910">Testing 12345 678910</span></td>
                        <td>Internal</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="19" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="19" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="19" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="17" data-status="Missed" data-source="Lead" data-date="2026-05-11" data-phone="9500123456" data-email="lead.test1@gmail.com" data-location="Online">
                        <td>6</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="17" title="test 1">test 1</a>
                                <span class="pm5-status-txt st-missed">Missed</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">11-05-2026 05:00 PM</span></td>
                        <td>
                            <span class="pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="pm5-avatar av-violet">G</span>GHRAUDA SOFTWARE
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="test">test</span></td>
                        <td>Lead</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="17" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="17" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="17" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="13" data-status="Missed" data-source="Lead" data-date="2026-04-25" data-phone="9500123456" data-email="testing@gmail.com" data-location="Online">
                        <td>7</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="13" title="TESTING">TESTING</a>
                                <span class="pm5-status-txt st-missed">Missed</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">25-04-2026 09:00 AM</span></td>
                        <td>
                            <span class="pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="pm5-avatar av-violet">G</span>GHRAUDA SOFTWARE
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="Test">Test</span></td>
                        <td>Lead</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="13" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="13" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="13" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="12" data-status="Finished" data-source="Lead" data-date="2026-03-01" data-phone="9962023456" data-email="divya.tester@gmail.com" data-location="Chennai">
                        <td>8</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="12" title="GHARUDAtester">GHARUDAtester</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">01-03-2026 04:00 PM</span></td>
                        <td>
                            <span class="pm5-initiated" title="Divya A.">
                                <span class="pm5-avatar av-amber">D</span>Divya A.
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="tester">tester</span></td>
                        <td>Lead</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="12" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="12" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="12" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="11" data-status="Cancelled" data-source="External" data-date="2026-01-03" data-phone="9884023456" data-email="tester.ext@gmail.com" data-location="External Office">
                        <td>9</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="11" title="Tester">Tester</a>
                                <span class="pm5-status-txt st-cancelled">Cancelled</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">03-01-2026 03:24 PM</span></td>
                        <td>
                            <span class="pm5-initiated" title="Divya A.">
                                <span class="pm5-avatar av-amber">D</span>Divya A.
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="mnbvcxz">mnbvcxz</span></td>
                        <td>External</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="11" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="11" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="11" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="10" data-status="Finished" data-source="External" data-date="2026-01-02" data-phone="9884023456" data-email="tester2@gmail.com" data-location="Client Site">
                        <td>10</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="10" title="tester">tester</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">02-01-2026 06:45 PM</span></td>
                        <td>
                            <span class="pm5-initiated" title="Divya A.">
                                <span class="pm5-avatar av-amber">D</span>Divya A.
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="tester">tester</span></td>
                        <td>External</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="8" data-status="Finished" data-source="Internal" data-date="2025-12-13" data-phone="9500123456" data-email="magtech@security.com" data-location="Korattur">
                        <td>11</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="8" title="REG: Mag Tech security management">REG: Mag Tech security management</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">13-12-2025 02:00 PM</span></td>
                        <td>
                            <span class="pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="pm5-avatar av-violet">G</span>GHRAUDA SOFTWARE
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="Appointment fixed at Mag Tech security management system assigned to Raj Kumar at Korattur on 13th December 2025, 3.00 pm.">Appointment fixed at Mag Tech security management system assigned to Raj Kumar at Korattur on 13th December 2025, 3.00 pm.</span></td>
                        <td>Internal</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="7" data-status="Finished" data-source="Internal" data-date="2025-12-13" data-phone="9500123456" data-email="avtec@company.com" data-location="AVTEC premises">
                        <td>12</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="7" title="REG: Training on ERP software to Customer">REG: Training on ERP software to Customer</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">13-12-2025 11:00 AM</span></td>
                        <td>
                            <span class="pm5-initiated" title="GHRAUDA SOFTWARE">
                                <span class="pm5-avatar av-violet">G</span>GHRAUDA SOFTWARE
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="Customer asking for real time demo training on ERP software at AVTEC company on 13th December 2025, Saturdayat 11.00am.">Customer asking for real time demo training on ERP software at AVTEC company on 13th December 2025, Saturdayat 11.00am.</span></td>
                        <td>Internal</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="4" data-status="Finished" data-source="Lead" data-date="2025-10-27" data-phone="9962023456" data-email="appt@lead.com" data-location="Online">
                        <td>13</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="4" title="appointment">appointment</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">27-10-2025 03:50 PM</span></td>
                        <td>
                            <span class="pm5-initiated" title="Divya A.">
                                <span class="pm5-avatar av-amber">D</span>Divya A.
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="test">test</span></td>
                        <td>Lead</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="1" data-status="Finished" data-source="Lead" data-date="2025-10-25" data-phone="9962023456" data-email="divya.test@lead.com" data-location="Chennai">
                        <td>14</td>
                        <td>
                            <span class="pm5-subject-cell">
                                <a href="#" class="pm5-subject-link" data-id="1" title="test">test</a>
                                <span class="pm5-status-txt st-finished">Finished</span>
                            </span>
                        </td>
                        <td><span class="pm5-date-chip">25-10-2025 08:00 PM</span></td>
                        <td>
                            <span class="pm5-initiated" title="Divya A.">
                                <span class="pm5-avatar av-amber">D</span>Divya A.
                            </span>
                        </td>
                        <td><span class="pm5-desc" title="tedt attendance urgently">tedt attendance urgently</span></td>
                        <td>Lead</td>
                        <td><span class="pm5-cal-note">Not added to any calendar yet.</span></td>
                        <td>
                            <div class="pm5-actions-group">
                                <button type="button" class="pm5-act-btn act-view" data-pm5="view" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View"><i class="mdi mdi-eye-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-edit" data-pm5="edit" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="pm5-act-btn act-fb" data-pm5="feedback" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Request Feedback"><i class="mdi mdi-message-alert-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- ===== Meeting Overview (fullscreen view — apm apmViewModal style) ===== -->
<div class="modal fade pm5-view-modal" id="pm5ViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="pm5-view-body">
                    <button type="button" class="btn pm5-go-back" data-bs-dismiss="modal"><i class="bi bi-arrow-left me-1"></i>Go Back</button>

                    <div class="text-center">
                        <div class="pm5-overview-title">Meeting overview <a href="#" onclick="return false;" title="Open full page"><i class="bi bi-arrow-up-right"></i></a></div>
                        <div>
                            <span class="pm5-status-strip">
                                <span class="lbl">Meeting Status</span>
                                <span class="pm5-ov-status st-finished" id="pm5ViewStatus">FINISHED</span>
                            </span>
                        </div>
                    </div>

                    <div class="pm5-ov-grid">
                        <div>
                            <div class="pm5-ov-section-title">General Information</div>
                            <div class="pm5-ov-row"><span class="k">Initiated by</span><span class="v" id="pm5ViewInitiated">Harish D.</span></div>
                            <div class="pm5-ov-row"><span class="k">Subject</span><span class="v" id="pm5ViewSubject">Callback — Ravi Shankar</span></div>
                            <div class="pm5-ov-row pm5-ov-row-block"><span class="k">Description</span><span class="v" id="pm5ViewDesc">Customer asked to call back about solar package</span></div>
                            <div class="pm5-ov-row"><span class="k">Meeting Date</span><span class="v" id="pm5ViewDate">26-09-2026</span></div>
                            <div class="pm5-ov-row"><span class="k">Meeting scheduled to start at</span><span class="v" id="pm5ViewTime">10:30 AM</span></div>
                            <div class="pm5-ov-row">
                                <span class="k">Attendees</span>
                                <span class="v"><span class="pm5-ov-attendee" id="pm5ViewAttendeeChip">H</span></span>
                            </div>
                        </div>
                        <div>
                            <div class="pm5-ov-section-title">Additional Information</div>
                            <div class="pm5-ov-row"><span class="k">Source</span><span class="v" id="pm5ViewSource">Lead</span></div>
                            <div class="pm5-ov-row"><span class="k">Name</span><span class="v"><a href="#" onclick="return false;">Ravi Shankar</a></span></div>
                            <div class="pm5-ov-row"><span class="k">Email</span><span class="v"><a href="#" onclick="return false;">ravi.shankar@gmail.com</a></span></div>
                            <div class="pm5-ov-row">
                                <span class="k">Phone</span>
                                <span class="v" id="pm5ViewPhone">
                                    <span class="pm5-ov-phone-chip">SMS: 9807456321</span>
                                    <span class="pm5-ov-phone-chip">CALL: 9807456321</span>
                                </span>
                            </div>
                            <div class="pm5-ov-row"><span class="k">Location / Address</span><span class="v" id="pm5ViewLocation">Gharuda Office, Chennai</span></div>
                            <div class="pm5-ov-row pm5-ov-row-block"><span class="k">Added to Calendars</span><span class="v" id="pm5ViewCalendar">Not added to any calendar yet.</span></div>
                        </div>
                    </div>

                    <div class="pm5-ov-section-title">Meeting Reminders</div>
                    <div class="pm5-ov-row"><span class="k">Reminder notification by SMS triggered</span><span class="v" id="pm5ViewSmsReminder">Yes</span></div>
                    <div class="pm5-ov-row"><span class="k">Reminder notification by Email triggered</span><span class="v" id="pm5ViewEmailReminder">Yes</span></div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== Edit Appointment Modal (appointments.php apmEditModal flow) ===== -->
<div class="modal fade pm5-modal" id="pm5EditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square"></i>Edit Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">* Subject</label>
                        <input type="text" class="form-control" id="pm5EdSubject" autocomplete="off" value="Callback — Ravi Shankar">
                    </div>
                    <div class="col-12">
                        <label class="form-label">* Description</label>
                        <textarea class="form-control" id="pm5EdDesc" rows="3">Customer asked to call back about solar package</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Related</label>
                        <select class="form-select select2" id="pm5EdRelated">
                            <option value="Internal (Contact)">Internal (Contact)</option>
                            <option value="Internal (Lead)">Internal (Lead)</option>
                            <option value="External">External</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">* Name</label>
                        <input type="text" class="form-control" id="pm5EdName" autocomplete="off" value="Ravi Shankar">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">* Email</label>
                        <input type="email" class="form-control" id="pm5EdEmail" autocomplete="off" value="ravi.shankar@gmail.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone (Ex: +168 1234 5678)</label>
                        <input type="text" class="form-control" id="pm5EdPhone" autocomplete="off" value="+91 98074 56321">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">* Date / Time</label>
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
                        <label class="form-label">Appointment Location (optional)</label>
                        <input type="text" class="form-control" id="pm5EdLocation" autocomplete="off" value="Gharuda Office, Chennai">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">* Attendees</label>
                        <select class="form-select select2" id="pm5EdAttendees">
                            <option value="Imala ina, gharuda SOFTWARE">Imala ina, gharuda SOFTWARE</option>
                            <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                            <option value="Harish D.">Harish D.</option>
                            <option value="Divya A.">Divya A.</option>
                            <option value="Priya S.">Priya S.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Type</label>
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
                        <label class="form-label">Repeat every</label>
                        <select class="form-select select2" id="pm5EdRepeat">
                            <option value="">Non selected</option>
                            <option value="1 week">1 week</option>
                            <option value="2 weeks">2 weeks</option>
                            <option value="1 month">1 month</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="apm-cron-note">Please mark the checkboxes as checked if you want selected attendee and contact to receive reminders eg. if set 30 minutes before the appointment start. Note that this feature requires cron job to be configured.</div>
                        <div class="apm-notif-check mt-2">
                            <input class="form-check-input" type="checkbox" id="pm5EdSms" checked>
                            <label class="form-check-label" for="pm5EdSms">Send SMS Notifications</label>
                        </div>
                        <div class="apm-notif-check">
                            <input class="form-check-input" type="checkbox" id="pm5EdEmailNotif" checked>
                            <label class="form-check-label" for="pm5EdEmailNotif">Send Email Notifications</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Appointment notes</label>
                        <div class="apm-quill-wrap">
                            <div id="pm5EdQuill"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
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

            /* Toast Notification */
            var toastWrap = null;
            function showToast(msg) {
                if (!toastWrap) {
                    toastWrap = document.createElement('div');
                    toastWrap.className = 'pm5-toast-wrap';
                    document.body.appendChild(toastWrap);
                }
                var t = document.createElement('div');
                t.className = 'pm5-toast';
                t.innerHTML = '<span class="pm5-toast-ico"><i class="bi bi-bell-fill"></i></span>' +
                    '<span class="pm5-toast-msg"></span>' +
                    '<button type="button" class="pm5-toast-x" title="Close"><i class="bi bi-x-lg"></i></button>';
                t.querySelector('.pm5-toast-msg').textContent = msg;
                toastWrap.appendChild(t);

                function dismiss() {
                    t.classList.add('pm5-toast-out');
                    setTimeout(function () { t.remove(); }, 260);
                }
                t.querySelector('.pm5-toast-x').addEventListener('click', dismiss);
                setTimeout(dismiss, 5000);
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
                        if (document.getElementById('pm5ViewStatus')) {
                            var statusEl = document.getElementById('pm5ViewStatus');
                            statusEl.textContent = st.toUpperCase();
                            statusEl.className = 'pm5-ov-status ' + (st === 'Finished' ? 'st-finished' : (st === 'Missed' ? 'st-missed' : 'st-cancelled'));
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
                    }
                });
            }
        });
    })();
</script>
<?php include 'footer.php'; ?>
