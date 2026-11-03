<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/quill-editor.css">
<link rel="stylesheet" href="./assets/css/lead.css">

<div class="container-fluid px-0">

    <!-- Page Header & Action Bar -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3 flex-wrap">
            <h1 class="font-display fw-bold mb-0 page-title">Appointments</h1>
            <div class="btn-group btn-group-sm" role="group" aria-label="Appointment view" id="apmViewTabs">
                <button type="button" class="btn btn-outline-secondary font-12 fw-semibold px-2.5 active" data-view="all" onclick="switchApmView('all')">
                    <i class="bi bi-calendar2-week me-1"></i>All Appointments
                </button>
                <button type="button" class="btn btn-outline-secondary font-12 fw-semibold px-2.5" data-view="schedule" onclick="switchApmView('schedule')">
                    <i class="bi bi-camera-video me-1"></i>Meeting Schedule
                </button>
            </div>
        </div>

        <div class="d-flex align-items-center flex-wrap gap-2">
            <!-- Filter Button triggering Offcanvas Drawer -->
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-2.5" data-bs-toggle="offcanvas" data-bs-target="#appointmentFilterOffcanvas" aria-controls="appointmentFilterOffcanvas" title="Filter Appointments">
                <i class="bi bi-funnel"></i>
                <span>Filters</span>
                <span class="badge bg-primary text-white rounded-pill px-1.5 py-0.5 d-none font-11" id="apmFilterCountBadge">0</span>
            </button>

            <!-- Unified Primary Appointment Booking Action Dropdown -->
            <div class="dropdown">
                <button class="btn btn-primary btn-sm dropdown-toggle d-inline-flex align-items-center gap-1.5 fw-semibold px-3 shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="apmMainCreateBtn">
                    <i class="bi bi-plus-lg"></i><span>Book Appointment</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2 table-action-menu" style="min-width: 270px;">
                    <li><h6 class="dropdown-header text-uppercase font-10 fw-bold tracking-wider text-muted px-2 mb-1">Select Meeting Type</h6></li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2 py-2 d-flex align-items-center gap-2.5" data-bs-toggle="modal" data-bs-target="#apmContactModal">
                            <div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-person-lines-fill"></i></div>
                            <div>
                                <div class="fw-semibold text-dark font-12">Client / Lead Meeting</div>
                                <div class="text-muted font-11">Customer, prospect or external meeting</div>
                            </div>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2 py-2 d-flex align-items-center gap-2.5" data-bs-toggle="modal" data-bs-target="#apmStaffModal">
                            <div class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-people-fill"></i></div>
                            <div>
                                <div class="fw-semibold text-dark font-12">Internal Staff Meeting</div>
                                <div class="text-muted font-11">Sync up with team &amp; department</div>
                            </div>
                        </button>
                    </li>
                    <li><hr class="dropdown-divider my-1.5"></li>
                    <li><h6 class="dropdown-header text-uppercase font-10 fw-bold tracking-wider text-muted px-2 mb-1">Quick Presets &amp; Follow-Up</h6></li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2 py-2 d-flex align-items-center gap-2.5" onclick="openQuickApptPreset('SW')">
                            <div class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-camera-video"></i></div>
                            <div>
                                <div class="fw-semibold text-dark font-12">Schedule SW Demo</div>
                                <div class="text-muted font-11">Product software walkthrough</div>
                            </div>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2 py-2 d-flex align-items-center gap-2.5" onclick="openQuickApptPreset('HW')">
                            <div class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-geo-alt"></i></div>
                            <div>
                                <div class="fw-semibold text-dark font-12">Schedule HW Site Survey</div>
                                <div class="text-muted font-11">Hardware &amp; site feasibility visit</div>
                            </div>
                        </button>
                    </li>
                    <li>
                        <a href="callbacks.php?new=1" class="dropdown-item rounded-2 py-2 d-flex align-items-center gap-2.5">
                            <div class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-telephone-forward"></i></div>
                            <div>
                                <div class="fw-semibold text-dark font-12">Log Callback Request</div>
                                <div class="text-muted font-11">Schedule customer phone callback</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="apmAllView">
        <!-- Hidden Compatibility Store for Legacy IDs -->
        <div class="d-none" aria-hidden="true">
            <span id="apmTodayMsg"></span>
            <span id="apmTodaySub"></span>
            <div id="apmNextWrap"><span id="apmNextTitle"></span><span id="apmNextDate"></span></div>
            <span id="apmTodayChip"></span>
            <button id="apmNewDropBtn"></button>
            <ul id="apmCreateMenu">
                <li><button data-create-type="contact"></button></li>
                <li><button data-create-type="staff"></button></li>
            </ul>
            <a href="callbacks.php?new=1" id="apmCallbackBtn"></a>
            <input type="text" id="apmDateRangeFilter">
            <button id="apmFilterBtn"></button>
            <ul id="apmFilterMenu">
                <li><button class="dropdown-item apm-list-item" data-status-filter=""></button></li>
            </ul>
            <div id="apmSummaryRow">
                <button class="apm-chip" data-summary="all"><span data-count="total">15</span></button>
                <button class="apm-chip" data-summary="upcoming"><span data-count="upcoming">1</span></button>
                <button class="apm-chip" data-summary="pending"><span data-count="pending">2</span></button>
                <button class="apm-chip" data-summary="cancelled"><span data-count="cancelled">1</span></button>
                <button class="apm-chip" data-summary="missed"><span data-count="missed">4</span></button>
                <button class="apm-chip" data-summary="finished"><span data-count="finished">7</span></button>
            </div>
        </div>

    <!-- Table (toolbar auto-created by master-table.js) -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
        <div class="table-responsive table-modern-wrap">
            <table class="table table-modern table-hover align-middle mb-0 datatable" id="apmAppointmentsTable" data-table-name="Appointments">
                <thead class="table-light">
                            <tr>
                                <th class="text-nowrap" style="width: 70px;">S.No</th>
                                <th class="text-nowrap">Subject</th>
                                <th class="text-nowrap">Appointment Date</th>
                                <th class="text-nowrap">Initiated by</th>
                                <th class="text-nowrap">Description</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Source</th>
                                <th class="text-nowrap">Added to Calendars</th>
                                <th class="text-nowrap" data-no-sort data-no-export style="width: 140px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="apmAppointmentsTbody">
                            <tr data-id="27" data-status="Finished" data-source="External" data-date="2026-09-27"
                                data-approved="1" data-callback="1">
                                <td>1</td>
                                <td><a href="#" class="apm-subject-link" data-id="27">Callback — Lakshmi Pharma</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">27-09-2026 11:00 AM</span></td>
                                <td><span class="apm-initiated" title="Priya S."><span
                                            class="apm-avatar av-amber">P</span>Priya S.</span></td>
                                <td>AMC renewal follow-up call</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-finished"
                                            data-status="Finished">FINISHED</span></span></td>
                                <td>External</td>
                                <td><span class="apm-cal-note">Added to Google Calendar.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="27"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="27"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="27"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="27"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="27"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="26" data-status="Pending Approval" data-source="Lead" data-date="2026-09-28"
                                data-approved="0" data-callback="1">
                                <td>2</td>
                                <td><a href="#" class="apm-subject-link" data-id="26">Callback — Meena Ramesh</a></td>
                                <td><span class="apm-date-chip">28-09-2026 03:00 PM</span></td>
                                <td><span class="apm-initiated" title="Divya A."><span
                                            class="apm-avatar av-grey">D</span>Divya A.</span></td>
                                <td>Reschedule requested for quotation discussion</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-pending apm-status-pill"
                                            data-status="Pending Approval" role="button" title="Change status">PENDING
                                            APPROVAL ▾</span></span></td>
                                <td>Lead</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="26"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="26"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="26"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="26"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="26"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="25" data-status="Scheduled" data-source="Lead" data-date="2026-09-26"
                                data-approved="1" data-callback="1">
                                <td>3</td>
                                <td><a href="#" class="apm-subject-link" data-id="25">Callback — Ravi Shankar</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">26-09-2026 10:30 AM</span></td>
                                <td><span class="apm-initiated" title="Harish D."><span
                                            class="apm-avatar av-violet">H</span>Harish D.</span></td>
                                <td>Customer asked to call back about solar package</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-scheduled"
                                            data-status="Scheduled">SCHEDULED</span></span></td>
                                <td>Lead</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="25"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="25"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="25"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="25"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="25"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="24" data-status="Finished" data-source="Internal" data-date="2026-07-13"
                                data-approved="1" data-callback="0">
                                <td>4</td>
                                <td><a href="#" class="apm-subject-link" data-id="24">Test Appointment</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">13-07-2026 10:00 AM</span></td>
                                <td><span class="apm-initiated" title="GHRAUDA SOFTWARE"><span
                                            class="apm-avatar av-violet">G</span>GHRAUDA SOFTWARE</span></td>
                                <td>Testing</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-finished"
                                            data-status="Finished">FINISHED</span></span></td>
                                <td>Internal</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="24"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="24"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="24"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="24"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="23" data-status="Finished" data-source="Internal" data-date="2026-12-06"
                                data-approved="0" data-callback="0">
                                <td>5</td>
                                <td><a href="#" class="apm-subject-link" data-id="23">Testing OTP</a></td>
                                <td><span class="apm-date-chip">06-12-2026 06:00 PM</span></td>
                                <td><span class="apm-initiated" title="GHRAUDA SOFTWARE"><span
                                            class="apm-avatar av-violet">G</span>GHRAUDA SOFTWARE</span></td>
                                <td>test</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-finished"
                                            data-status="Finished">FINISHED</span></span></td>
                                <td>Internal</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="23"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="23"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="23"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="23"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="22" data-status="Missed" data-source="Internal" data-date="2026-10-06"
                                data-approved="1" data-callback="0">
                                <td>6</td>
                                <td><a href="#" class="apm-subject-link" data-id="22">TESTING Project Filter</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">06-10-2026 09:00 AM</span></td>
                                <td><span class="apm-initiated" title="GHRAUDA SOFTWARE"><span
                                            class="apm-avatar av-violet">G</span>GHRAUDA SOFTWARE</span></td>
                                <td>TESTING</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-missed apm-status-pill"
                                            data-status="Missed" role="button" title="Change status">MISSED
                                            ▾</span></span></td>
                                <td>Internal</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="22"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="22"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="22"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="22"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="19" data-status="Finished" data-source="Internal" data-date="2026-10-06"
                                data-approved="1" data-callback="0">
                                <td>7</td>
                                <td><a href="#" class="apm-subject-link" data-id="19">Testing Project Dropdown</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">06-10-2026 11:30 AM</span></td>
                                <td><span class="apm-initiated" title="GHRAUDA SOFTWARE"><span
                                            class="apm-avatar av-violet">G</span>GHRAUDA SOFTWARE</span></td>
                                <td>Testing 12345 678910</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-finished"
                                            data-status="Finished">FINISHED</span></span></td>
                                <td>Internal</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="19"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="19"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="19"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="19"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="18" data-status="Missed" data-source="Internal" data-date="2026-10-06"
                                data-approved="1" data-callback="0">
                                <td>8</td>
                                <td><a href="#" class="apm-subject-link" data-id="18">Test</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">06-10-2026 09:00 AM</span></td>
                                <td><span class="apm-initiated" title="GHRAUDA SOFTWARE"><span
                                            class="apm-avatar av-violet">G</span>GHRAUDA SOFTWARE</span></td>
                                <td>sss</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-missed apm-status-pill"
                                            data-status="Missed" role="button" title="Change status">MISSED
                                            ▾</span></span></td>
                                <td>Internal</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="18"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="18"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="18"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="18"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="17" data-status="Missed" data-source="Lead" data-date="2026-05-11"
                                data-approved="1" data-callback="0">
                                <td>9</td>
                                <td><a href="#" class="apm-subject-link" data-id="17">test 1</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">11-05-2026 05:00 PM</span></td>
                                <td><span class="apm-initiated" title="GHRAUDA SOFTWARE"><span
                                            class="apm-avatar av-violet">G</span>GHRAUDA SOFTWARE</span></td>
                                <td>test</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-missed apm-status-pill"
                                            data-status="Missed" role="button" title="Change status">MISSED
                                            ▾</span></span></td>
                                <td>Lead</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="17"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="17"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="17"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="17"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="17"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="15" data-status="Pending Approval" data-source="Lead" data-date="2026-04-27"
                                data-approved="0" data-callback="0">
                                <td>10</td>
                                <td><a href="#" class="apm-subject-link" data-id="15">Testing</a></td>
                                <td><span class="apm-date-chip">27-04-2026 09:00 AM</span></td>
                                <td><span class="apm-initiated" title="Priya S."><span
                                            class="apm-avatar av-amber">P</span>Priya S.</span></td>
                                <td>Test</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-pending apm-status-pill"
                                            data-status="Pending Approval" role="button" title="Change status">PENDING
                                            APPROVAL ▾</span></span></td>
                                <td>Lead</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="15"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="15"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="15"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="15"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="15"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="14" data-status="Finished" data-source="Lead" data-date="2026-04-30"
                                data-approved="0" data-callback="0">
                                <td>11</td>
                                <td><a href="#" class="apm-subject-link" data-id="14">Testing for summary report</a>
                                </td>
                                <td><span class="apm-date-chip">30-04-2026 09:00 AM</span></td>
                                <td><span class="apm-initiated" title="Priya S."><span
                                            class="apm-avatar av-amber">P</span>Priya S.</span></td>
                                <td>Testing</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-finished"
                                            data-status="Finished">FINISHED</span></span></td>
                                <td>Lead</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="14"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="14"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="14"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="14"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="14"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="13" data-status="Missed" data-source="Lead" data-date="2026-04-25"
                                data-approved="1" data-callback="0">
                                <td>12</td>
                                <td><a href="#" class="apm-subject-link" data-id="13">TESTING</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">25-04-2026 09:00 AM</span></td>
                                <td><span class="apm-initiated" title="GHRAUDA SOFTWARE"><span
                                            class="apm-avatar av-violet">G</span>GHRAUDA SOFTWARE</span></td>
                                <td>Test</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-missed apm-status-pill"
                                            data-status="Missed" role="button" title="Change status">MISSED
                                            ▾</span></span></td>
                                <td>Lead</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="13"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="13"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="13"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="13"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="13"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="11" data-status="Cancelled" data-source="External" data-date="2026-01-03"
                                data-approved="1" data-callback="0">
                                <td>13</td>
                                <td><a href="#" class="apm-subject-link" data-id="11">Tester</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">03-01-2026 03:24 PM</span></td>
                                <td><span class="apm-initiated" title="Divya A."><span
                                            class="apm-avatar av-grey">D</span>Divya A.</span></td>
                                <td>mnbvcxz</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-cancelled apm-status-pill"
                                            data-status="Cancelled" role="button" title="Change status">CANCELLED
                                            ▾</span></span></td>
                                <td>External</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="11"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="11"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="11"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="11"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="11"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="10" data-status="Finished" data-source="External" data-date="2026-01-02"
                                data-approved="1" data-callback="0">
                                <td>14</td>
                                <td><a href="#" class="apm-subject-link" data-id="10">tester</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">02-01-2026 06:45 PM</span></td>
                                <td><span class="apm-initiated" title="Divya A."><span
                                            class="apm-avatar av-grey">D</span>Divya A.</span></td>
                                <td>tester</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-finished"
                                            data-status="Finished">FINISHED</span></span></td>
                                <td>External</td>
                                <td><span class="apm-cal-note">Added to Google Calendar.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="10"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="10"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="10"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="10"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="10"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-id="1" data-status="Finished" data-source="Lead" data-date="2025-10-25"
                                data-approved="1" data-callback="0">
                                <td>15</td>
                                <td><a href="#" class="apm-subject-link" data-id="1">test</a><span
                                        class="apm-approved-tag ms-1">Approved</span></td>
                                <td><span class="apm-date-chip">25-10-2025 08:00 PM</span></td>
                                <td><span class="apm-initiated" title="Divya A."><span
                                            class="apm-avatar av-grey">D</span>Divya A.</span></td>
                                <td>testt attendance urgently</td>
                                <td><span class="apm-status-cell"><span class="apm-status st-finished"
                                            data-status="Finished">FINISHED</span></span></td>
                                <td>Lead</td>
                                <td><span class="apm-cal-note">Not added to any calendar yet.</span></td>
                                <td>
                                    <div class="apm-actions-group">
                                        <button type="button" class="apm-act-btn act-view apm-view-btn" data-id="1"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="View"><i
                                                class="mdi mdi-eye-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-edit apm-edit-btn" data-id="1"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i
                                                class="mdi mdi-pencil-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-del apm-delete-btn" data-id="1"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i
                                                class="mdi mdi-trash-can-outline"></i></button>
                                        <button type="button" class="apm-act-btn act-task apm-newtask-btn" data-id="1"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="New Task"><i
                                                class="mdi mdi-email-plus-outline"></i></button>
                                        <button type="button" class="apm-act-btn apm-convert-btn" data-id="1"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Convert to Lead"><i
                                                class="mdi mdi-account-arrow-right-outline"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Footer (showing + pagination auto-created by master-table.js) -->
            </div>

    <!-- ===== Below: agenda + meetings report (side by side — pure Bootstrap 5) ===== -->
    <div class="row g-3">

        <!-- Today's agenda -->
        <div class="col-xl-6 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-clock-history me-2 text-primary"></i>Today's Agenda</h6>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle" id="apmAgenSub">4 upcoming</span>
                </div>
                <div class="card-body p-0" id="apmAgendaList">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 apm-agenda-item" data-date="2026-09-26" style="cursor:pointer;" title="Filter table to 26-09-2026">
                            <span class="badge bg-light text-dark border font-monospace px-2 py-1">10:30 AM</span>
                            <div class="flex-grow-1">
                                <div class="fw-semibold text-dark">Callback — Ravi Shankar</div>
                                <div class="d-flex align-items-center gap-2 mt-1 small">
                                    <span class="badge bg-primary-subtle text-primary">SCHEDULED</span>
                                    <span class="badge bg-secondary-subtle text-secondary">Lead</span>
                                    <span class="text-muted"><i class="bi bi-calendar3 me-1"></i>26-09-2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 apm-agenda-item" data-date="2026-09-27" style="cursor:pointer;" title="Filter table to 27-09-2026">
                            <span class="badge bg-light text-dark border font-monospace px-2 py-1">11:00 AM</span>
                            <div class="flex-grow-1">
                                <div class="fw-semibold text-dark">Callback — Lakshmi Pharma</div>
                                <div class="d-flex align-items-center gap-2 mt-1 small">
                                    <span class="badge bg-success-subtle text-success">FINISHED</span>
                                    <span class="badge bg-secondary-subtle text-secondary">External</span>
                                    <span class="text-muted"><i class="bi bi-calendar3 me-1"></i>27-09-2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 apm-agenda-item" data-date="2026-09-28" style="cursor:pointer;" title="Filter table to 28-09-2026">
                            <span class="badge bg-light text-dark border font-monospace px-2 py-1">03:00 PM</span>
                            <div class="flex-grow-1">
                                <div class="fw-semibold text-dark">Callback — Meena Ramesh</div>
                                <div class="d-flex align-items-center gap-2 mt-1 small">
                                    <span class="badge bg-warning-subtle text-warning">PENDING APPROVAL</span>
                                    <span class="badge bg-secondary-subtle text-secondary">Lead</span>
                                    <span class="text-muted"><i class="bi bi-calendar3 me-1"></i>28-09-2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 apm-agenda-item" data-date="2026-07-13" style="cursor:pointer;" title="Filter table to 13-07-2026">
                            <span class="badge bg-light text-dark border font-monospace px-2 py-1">10:00 AM</span>
                            <div class="flex-grow-1">
                                <div class="fw-semibold text-dark">Test Appointment</div>
                                <div class="d-flex align-items-center gap-2 mt-1 small">
                                    <span class="badge bg-success-subtle text-success">FINISHED</span>
                                    <span class="badge bg-secondary-subtle text-secondary">Internal</span>
                                    <span class="text-muted"><i class="bi bi-calendar3 me-1"></i>13-07-2026</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Meetings report -->
        <div class="col-xl-6 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 h-100 d-flex flex-column">
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-graph-up me-2 text-primary"></i>Meetings Report</h6>
                    <span class="badge bg-light text-secondary border">Last 7 days</span>
                </div>
                <div class="card-body p-3 flex-grow-1" id="apmReportList">
                    <div class="d-flex align-items-center justify-content-between gap-3 py-2 border-bottom">
                        <span class="text-secondary small fw-medium font-monospace" style="min-width:70px;">11-10</span>
                        <div class="progress flex-grow-1" style="height:6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center gap-1 small">
                            <span class="badge bg-success-subtle text-success" title="Attended"><i class="bi bi-check-circle-fill me-1"></i>1</span>
                            <span class="badge bg-danger-subtle text-danger" title="Missed"><i class="bi bi-x-circle-fill me-1"></i>0</span>
                            <span class="badge bg-secondary-subtle text-secondary" title="Cancelled"><i class="bi bi-dash-circle-fill me-1"></i>0</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-3 py-2 border-bottom">
                        <span class="text-secondary small fw-medium font-monospace" style="min-width:70px;">12-10</span>
                        <div class="progress flex-grow-1" style="height:6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center gap-1 small">
                            <span class="badge bg-success-subtle text-success" title="Attended"><i class="bi bi-check-circle-fill me-1"></i>2</span>
                            <span class="badge bg-danger-subtle text-danger" title="Missed"><i class="bi bi-x-circle-fill me-1"></i>0</span>
                            <span class="badge bg-secondary-subtle text-secondary" title="Cancelled"><i class="bi bi-dash-circle-fill me-1"></i>1</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-3 py-2 border-bottom">
                        <span class="text-secondary small fw-medium font-monospace" style="min-width:70px;">13-10</span>
                        <div class="progress flex-grow-1" style="height:6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center gap-1 small">
                            <span class="badge bg-success-subtle text-success" title="Attended"><i class="bi bi-check-circle-fill me-1"></i>3</span>
                            <span class="badge bg-danger-subtle text-danger" title="Missed"><i class="bi bi-x-circle-fill me-1"></i>1</span>
                            <span class="badge bg-secondary-subtle text-secondary" title="Cancelled"><i class="bi bi-dash-circle-fill me-1"></i>0</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-3 py-2 border-bottom">
                        <span class="text-secondary small fw-medium font-monospace" style="min-width:70px;">14-10</span>
                        <div class="progress flex-grow-1" style="height:6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center gap-1 small">
                            <span class="badge bg-success-subtle text-success" title="Attended"><i class="bi bi-check-circle-fill me-1"></i>1</span>
                            <span class="badge bg-danger-subtle text-danger" title="Missed"><i class="bi bi-x-circle-fill me-1"></i>1</span>
                            <span class="badge bg-secondary-subtle text-secondary" title="Cancelled"><i class="bi bi-dash-circle-fill me-1"></i>0</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-3 py-2 border-bottom">
                        <span class="text-secondary small fw-medium font-monospace" style="min-width:70px;">15-10</span>
                        <div class="progress flex-grow-1" style="height:6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center gap-1 small">
                            <span class="badge bg-success-subtle text-success" title="Attended"><i class="bi bi-check-circle-fill me-1"></i>1</span>
                            <span class="badge bg-danger-subtle text-danger" title="Missed"><i class="bi bi-x-circle-fill me-1"></i>0</span>
                            <span class="badge bg-secondary-subtle text-secondary" title="Cancelled"><i class="bi bi-dash-circle-fill me-1"></i>0</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-3 py-2 border-bottom">
                        <span class="text-secondary small fw-medium font-monospace" style="min-width:70px;">16-10</span>
                        <div class="progress flex-grow-1" style="height:6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center gap-1 small">
                            <span class="badge bg-success-subtle text-success" title="Attended"><i class="bi bi-check-circle-fill me-1"></i>2</span>
                            <span class="badge bg-danger-subtle text-danger" title="Missed"><i class="bi bi-x-circle-fill me-1"></i>0</span>
                            <span class="badge bg-secondary-subtle text-secondary" title="Cancelled"><i class="bi bi-dash-circle-fill me-1"></i>0</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-3 py-2">
                        <span class="badge bg-primary text-white font-monospace" style="min-width:70px;">17-10 · Today</span>
                        <div class="progress flex-grow-1" style="height:6px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center gap-1 small">
                            <span class="badge bg-success-subtle text-success" title="Attended"><i class="bi bi-check-circle-fill me-1"></i>2</span>
                            <span class="badge bg-danger-subtle text-danger" title="Missed"><i class="bi bi-x-circle-fill me-1"></i>1</span>
                            <span class="badge bg-secondary-subtle text-secondary" title="Cancelled"><i class="bi bi-dash-circle-fill me-1"></i>0</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light border-top py-2 px-3 d-flex justify-content-between small text-muted" id="apmReportTotal">
                    <span>Total <strong class="text-dark">14</strong> scheduled</span>
                    <span><strong class="text-success">10</strong> attended · <strong class="text-danger">3</strong> missed · <strong class="text-secondary">1</strong> other</span>
                </div>
            </div>
        </div>
    </div><!-- End row g-3 -->
    </div><!-- End #apmAllView -->

    <!-- ==================== Meeting Schedule View (Integrated from appointment-schedule.php) ==================== -->
    <div id="apmScheduleView" class="d-none">
        <!-- Meeting Schedule Table Card -->
        <div class="card border shadow-sm rounded-3 bg-white overflow-hidden mb-4">
            <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom flex-wrap gap-2">
                <div class="d-flex align-items-center gap-2">
                    <h6 class="fw-bold text-dark mb-0"><i class="bi bi-camera-video text-primary me-2"></i>Video &amp; Remote Meeting Schedule</h6>
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-2.5 py-1 font-12" id="msCountBadge">12 Meetings</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold" onclick="exportMeetingScheduleCSV()">
                        <i class="bi bi-download"></i><span>Export CSV</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold" onclick="openQuickApptPreset('SW')">
                        <i class="bi bi-plus-lg"></i><span>Schedule Video Demo</span>
                    </button>
                </div>
            </div>

            <!-- Filter bar inside card -->
            <div class="p-3 bg-light bg-opacity-50 border-bottom">
                <div class="row g-2 align-items-center">
                    <div class="col-md-3 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control" id="msSearch" placeholder="Search customer, staff, remark...">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select class="form-select form-select-sm" id="msTypeFilter">
                            <option value="">All Types (Customer / Lead)</option>
                            <option value="Customer">Customer</option>
                            <option value="Lead">Lead</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <select class="form-select form-select-sm" id="msStatusFilter">
                            <option value="">All Statuses</option>
                            <option value="Scheduled">Scheduled</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Missed">Missed</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white"><i class="bi bi-calendar3 text-muted"></i></span>
                            <input type="date" class="form-control form-control-sm" id="msFromDate" title="From Date" aria-label="From Date">
                            <span class="input-group-text bg-white text-muted px-1.5 font-11">to</span>
                            <input type="date" class="form-control form-control-sm" id="msToDate" title="To Date" aria-label="To Date">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 text-end">
                        <button type="button" class="btn btn-sm btn-outline-secondary w-100" onclick="clearMsFilters()">
                            <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 font-13" id="msTable">
                    <thead class="table-light text-muted small text-uppercase font-11">
                        <tr>
                            <th class="ps-4" style="width: 60px;">S.No</th>
                            <th style="min-width: 170px;">Customer / Lead</th>
                            <th style="min-width: 170px;">Customer Email</th>
                            <th style="min-width: 140px;">Staff SPOC</th>
                            <th style="width: 110px;">Type</th>
                            <th style="min-width: 200px;">Zoom / Video Meeting</th>
                            <th style="width: 110px;">Status</th>
                            <th style="min-width: 220px;">Remark</th>
                            <th class="text-end pe-4" style="width: 90px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="msTbody">
                        <!-- Populated dynamically via Javascript -->
                    </tbody>
                </table>
            </div>

            <div class="p-3 border-top bg-light bg-opacity-25 d-flex align-items-center justify-content-between flex-wrap gap-2">
                <span class="text-muted font-12" id="msTableSummary">Showing 12 of 12 meetings</span>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div><!-- End #apmScheduleView -->
</div><!-- End .container-fluid -->

<!-- ===== New Appointment Modal (Contact / Lead / External) ===== -->
<!-- ==================== OFFCANVAS SLIDER: APPOINTMENTS FILTER DRAWER ==================== -->
<div class="offcanvas offcanvas-end border-start shadow-lg" tabindex="-1" id="appointmentFilterOffcanvas" aria-labelledby="appointmentFilterTitle" style="width: 360px;">
    <div class="offcanvas-header border-bottom py-3 px-4 bg-light">
        <div class="d-flex align-items-center gap-2">
            <span class="p-1.5 rounded-2 bg-primary-subtle text-primary d-inline-flex"><i class="bi bi-funnel fs-6"></i></span>
            <h5 class="offcanvas-title fw-bold text-dark fs-6 mb-0" id="appointmentFilterTitle">Filter Appointments</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4 d-flex flex-column gap-3">
        <!-- Quick Preset Status Chips -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1.5">Quick Status</label>
            <div class="d-flex flex-wrap gap-1.5" id="drawerQuickChips">
                <button type="button" class="btn btn-xs btn-outline-secondary active apm-drawer-chip" data-val="all">All (15)</button>
                <button type="button" class="btn btn-xs btn-outline-primary apm-drawer-chip" data-val="upcoming">Upcoming (1)</button>
                <button type="button" class="btn btn-xs btn-outline-warning text-dark apm-drawer-chip" data-val="pending">Pending (2)</button>
                <button type="button" class="btn btn-xs btn-outline-success apm-drawer-chip" data-val="finished">Finished (7)</button>
                <button type="button" class="btn btn-xs btn-outline-secondary apm-drawer-chip" data-val="missed">Missed (4)</button>
                <button type="button" class="btn btn-xs btn-outline-danger apm-drawer-chip" data-val="cancelled">Cancelled (1)</button>
            </div>
        </div>

        <!-- Status Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Appointment Status</label>
            <select class="form-select form-select-sm" id="drawerFilterStatus">
                <option value="">All Statuses</option>
                <option value="Approved">Approved</option>
                <option value="Pending Approval">Pending Approval</option>
                <option value="Scheduled">Scheduled / Upcoming</option>
                <option value="Finished">Finished</option>
                <option value="Missed">Missed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>

        <!-- Source / Type -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Source / Audience</label>
            <select class="form-select form-select-sm" id="drawerFilterSource">
                <option value="">All Sources</option>
                <option value="Lead">Lead</option>
                <option value="External">External Contact</option>
                <option value="Internal">Internal Staff</option>
            </select>
        </div>

        <!-- Date Range Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Date Range</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white"><i class="bi bi-calendar3 text-muted"></i></span>
                <input type="text" class="form-control" id="drawerDateRange" placeholder="DD-MM-YYYY to DD-MM-YYYY" autocomplete="off">
            </div>
            <div class="form-text text-muted font-11">Filter by appointment date range</div>
        </div>

        <!-- Quick Links / Shortcuts -->
        <div class="pt-2 border-top">
            <label class="form-label fw-semibold small text-dark mb-2">Related Activity Views</label>
            <div class="d-flex flex-column gap-1.5">
                <a href="callbacks.php" class="btn btn-sm btn-light border text-start d-flex align-items-center justify-content-between text-secondary py-2">
                    <span class="d-inline-flex align-items-center gap-2"><i class="bi bi-telephone-forward text-primary"></i><span>Callbacks List</span></span>
                    <i class="bi bi-chevron-right font-11 text-muted"></i>
                </a>
                <a href="past-meeting.php" class="btn btn-sm btn-light border text-start d-flex align-items-center justify-content-between text-secondary py-2">
                    <span class="d-inline-flex align-items-center gap-2"><i class="bi bi-calendar-check text-success"></i><span>Past Meetings</span></span>
                    <i class="bi bi-chevron-right font-11 text-muted"></i>
                </a>
                <a href="mom.php" class="btn btn-sm btn-light border text-start d-flex align-items-center justify-content-between text-secondary py-2">
                    <span class="d-inline-flex align-items-center gap-2"><i class="bi bi-journal-text text-primary"></i><span>Minutes of Meeting (MOM)</span></span>
                    <i class="bi bi-chevron-right font-11 text-muted"></i>
                </a>
                <a href="summary-report.php" class="btn btn-sm btn-light border text-start d-flex align-items-center justify-content-between text-secondary py-2">
                    <span class="d-inline-flex align-items-center gap-2"><i class="bi bi-bar-chart-line text-warning"></i><span>Summary Report</span></span>
                    <i class="bi bi-chevron-right font-11 text-muted"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 bg-light d-flex align-items-center justify-content-between">
        <button type="button" class="btn btn-outline-secondary btn-sm fw-semibold px-3" onclick="resetAppointmentFilters()">
            <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm fw-semibold px-4" data-bs-dismiss="offcanvas" onclick="applyAppointmentDrawerFilters()">
            <i class="bi bi-check-lg me-1"></i>Apply Filters
        </button>
    </div>
</div>


<div class="modal fade apm-modal" id="apmContactModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-calendar-plus"></i>New appointment</h5>
                <div class="d-flex align-items-center gap-1 ms-auto me-2">
                    <button type="button" class="btn btn-xs btn-outline-success py-1 px-2 small fw-semibold" onclick="openQuickApptPreset('SW')"><i class="bi bi-camera-video me-1"></i>Fill SW Demo</button>
                    <button type="button" class="btn btn-xs btn-outline-warning text-dark py-1 px-2 small fw-semibold" onclick="openQuickApptPreset('HW')"><i class="bi bi-geo-alt me-1"></i>Fill HW Site Survey</button>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="apmCtSubject" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="apmCtDesc" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Related <span class="text-danger">*</span></label>
                        <select class="form-select select2" id="apmCtRelated">
                            <option value="">Non selected</option>
                            <option value="Contact">Internal (Contact)</option>
                            <option value="Lead">Lead</option>
                            <option value="External">External</option>
                        </select>
                    </div>
                    <!-- Related = Lead -> Leads searchable select -->
                    <div class="col-12" id="apmRelLeadBlock" style="display:none;">
                        <label class="form-label">Leads</label>
                        <select class="form-select select2" id="apmRelLead" data-placeholder="Select and begin typing">
                            <option value=""></option>
                            <option>Gharuda Software</option>
                            <option>Acme Corporation</option>
                            <option>Sunrise Enterprises</option>
                            <option>Bluewave Solutions</option>
                        </select>
                    </div>
                    <!-- Related = External -> Name, Email, Phone, Project -->
                    <div class="col-12" id="apmRelExternalBlock" style="display:none;">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" id="apmRelExtName" autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="apmRelExtEmail" autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Phone (Ex: +1 69 1234 5678)</label>
                                <input type="text" class="form-control" id="apmRelExtPhone" autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Project</label>
                                <select class="form-select select2" id="apmRelExtProject">
                                    <option value="">Non selected</option>
                                    <option>HRMS Implementation</option>
                                    <option>Website Revamp</option>
                                    <option>Mobile App Development</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Related = Internal (Contact) -> Contact select -->
                    <div class="col-12" id="apmRelInternalBlock" style="display:none;">
                        <label class="form-label">Contact</label>
                        <select class="form-select select2" id="apmRelContact">
                            <option value="">Non selected</option>
                            <option>Suresh Babu</option>
                            <option>Priya R</option>
                            <option>Karthik R</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date / Time <span class="text-danger">*</span></label>
                        <div class="row g-2">
                            <div class="col-7">
                                <div class="date-picker">
                                    <input type="text" class="date-input form-control" id="apmCtDateTime"
                                        placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="time-picker right-0">
                                    <input type="text" class="time-input form-control" id="apmCtTime"
                                        placeholder="HH:MM" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Location (optional)</label>
                        <input type="text" class="form-control" id="apmCtLocation" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Attendees <span class="text-danger">*</span></label>
                        <select class="form-select select2" id="apmCtAttendees">
                            <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                            <option value="Harish D.">Harish D.</option>
                            <option value="Divya A.">Divya A.</option>
                            <option value="Priya S.">Priya S.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Type</label>
                        <select class="form-select select2" id="apmCtType">
                            <option value="">Non selected</option>
                            <option value="SW - Online Product Demo (Meet/Zoom)" data-color="#16a34a">SW - Online Product Demo (Meet/Zoom)</option>
                            <option value="SW - Sprint & Scope Gathering" data-color="#2563eb">SW - Sprint &amp; Scope Gathering</option>
                            <option value="SW - Online Debug / Support Call" data-color="#06b6d4">SW - Online Debug / Support Call</option>
                            <option value="HW - On-site Site Survey & Cabling" data-color="#d97706">HW - On-site Site Survey &amp; Cabling</option>
                            <option value="HW - Device Installation & Setup" data-color="#0d9488">HW - Device Installation &amp; Setup</option>
                            <option value="HW - On-Site RMA / AMC Service Visit" data-color="#dc2626">HW - On-Site RMA / AMC Service Visit</option>
                            <option value="">Non selected</option>
                            <option value="SD - Online Demo" data-color="#16a34a">SD - Online Demo</option>
                            <option value="SD - Direct Visit - lead" data-color="#0d9488">SD - Direct Visit - lead
                            </option>
                            <option value="DEV - Direct Visit - customer" data-color="#9f1239">DEV - Direct Visit -
                                customer</option>
                            <option value="DEV - Customer visit - GHARUDA" data-color="#2563eb">DEV - Customer visit -
                                GHARUDA</option>
                            <option value="DEV - Online Demo - Customer" data-color="#dc2626">DEV - Online Demo -
                                Customer</option>
                            <option value="SD - GHARUDA Visit" data-color="#06b6d4">SD - GHARUDA Visit</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Repeat every</label>
                        <select class="form-select select2" id="apmCtRepeat">
                            <option value="">Non selected</option>
                            <option value="1 week">1 week</option>
                            <option value="2 weeks">2 weeks</option>
                            <option value="1 month">1 month</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="apm-cron-note">Please mark the checkboxes as checked if you want selected attendee
                            and contact to receive reminders eg. if set 30 minutes before the appointment start. Note
                            that this feature requires cron job to be configured.</div>
                        <div class="apm-notif-check mt-2">
                            <input class="form-check-input" type="checkbox" id="apmCtSms">
                            <label class="form-check-label" for="apmCtSms">SMS Notification</label>
                        </div>
                        <div class="apm-notif-check">
                            <input class="form-check-input" type="checkbox" id="apmCtEmail">
                            <label class="form-check-label" for="apmCtEmail">Email Notification</label>
                        </div>

                        <!-- SMS reminder value block (shown when SMS ticked) -->
                        <div id="apmSmsReminderBlock" style="display:none;" class="mt-2">
                            <label class="form-label" style="margin-bottom:6px;">Add value to receive an SMS
                                notification prior to your appointment (default 30 min before)</label>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="position-relative" style="flex:1;max-width:120px;">
                                    <input type="number" min="0" class="form-control" id="apmSmsReminderValue"
                                        placeholder="" style="padding-right:38px;">
                                    <button type="button" class="btn btn-sm btn-primary position-absolute"
                                        id="apmSmsReminderInfo"
                                        style="right:6px;top:50%;transform:translateY(-50%);width:24px;height:24px;padding:0;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Minutes before the appointment start">
                                        <i class="bi bi-info-circle" style="font-size:12px;"></i>
                                    </button>
                                </div>
                                <select class="form-select select2" id="apmSmsReminderUnit" style="max-width:140px;">
                                    <option value="minutes" selected>Minutes</option>
                                    <option value="hours">Hours</option>
                                    <option value="days">Days</option>
                                </select>
                            </div>
                        </div>

                        <!-- Email reminder value block (shown when Email ticked) -->
                        <div id="apmEmailReminderBlock" style="display:none;" class="mt-2">
                            <label class="form-label" style="margin-bottom:6px;">Add value to receive an email
                                notification prior to your appointment (default 30 min before)</label>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="position-relative" style="flex:1;max-width:120px;">
                                    <input type="number" min="0" class="form-control" id="apmEmailReminderValue"
                                        placeholder="" style="padding-right:38px;">
                                    <button type="button" class="btn btn-sm btn-primary position-absolute"
                                        id="apmEmailReminderInfo"
                                        style="right:6px;top:50%;transform:translateY(-50%);width:24px;height:24px;padding:0;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Minutes before the appointment start">
                                        <i class="bi bi-info-circle" style="font-size:12px;"></i>
                                    </button>
                                </div>
                                <select class="form-select select2" id="apmEmailReminderUnit" style="max-width:140px;">
                                    <option value="minutes" selected>Minutes</option>
                                    <option value="hours">Hours</option>
                                    <option value="days">Days</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Appointment notes</label>
                        <div class="apm-quill-wrap">
                            <div id="apmCtQuill"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="apmCtSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Internal Staff Appointment Modal ===== -->
<div class="modal fade apm-modal" id="apmStaffModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-people-fill"></i>Internal Staff Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="apmStSubject" autocomplete="off">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="apmStDesc" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Attendees <span class="text-danger">*</span></label>
                        <select class="form-select select2" id="apmStAttendees">
                            <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                            <option value="Harish D.">Harish D.</option>
                            <option value="Divya A.">Divya A.</option>
                            <option value="Priya S.">Priya S.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date / Time <span class="text-danger">*</span></label>
                        <div class="row g-2">
                            <div class="col-7">
                                <div class="date-picker">
                                    <input type="text" class="date-input form-control" id="apmStDateTime"
                                        placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="time-picker right-0">
                                    <input type="text" class="time-input form-control" id="apmStTime"
                                        placeholder="HH:MM" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Location (optional)</label>
                        <input type="text" class="form-control" id="apmStLocation" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Type</label>
                        <select class="form-select select2" id="apmStType">
                            <option value="">Non selected</option>
                            <option value="SD - Online Demo" data-color="#16a34a">SD - Online Demo</option>
                            <option value="SD - Direct Visit - lead" data-color="#0d9488">SD - Direct Visit - lead
                            </option>
                            <option value="DEV - Direct Visit - customer" data-color="#9f1239">DEV - Direct Visit -
                                customer</option>
                            <option value="DEV - Customer visit - GHARUDA" data-color="#2563eb">DEV - Customer visit -
                                GHARUDA</option>
                            <option value="DEV - Online Demo - Customer" data-color="#dc2626">DEV - Online Demo -
                                Customer</option>
                            <option value="SD - GHARUDA Visit" data-color="#06b6d4">SD - GHARUDA Visit</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Repeat every</label>
                        <select class="form-select select2" id="apmStRepeat">
                            <option value="">Non selected</option>
                            <option value="1 week">1 week</option>
                            <option value="2 weeks">2 weeks</option>
                            <option value="1 month">1 month</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="apm-cron-note">Please mark the checkboxes as checked if you want selected attendee
                            and contact to receive reminders eg. if set 30 minutes before the appointment start. Note
                            that this feature requires cron job to be configured.</div>
                        <div class="apm-notif-check mt-2">
                            <input class="form-check-input" type="checkbox" id="apmStEmail">
                            <label class="form-check-label" for="apmStEmail">Email Notification</label>
                        </div>

                        <!-- Email reminder value block (shown when Email ticked) -->
                        <div id="apmStEmailReminderBlock" style="display:none;" class="mt-2">
                            <label class="form-label" style="margin-bottom:6px;">Add value to receive an email
                                notification prior to your appointment (default 30 min before)</label>
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <div class="position-relative" style="flex:1;max-width:120px;">
                                    <input type="number" min="0" class="form-control" id="apmStEmailReminderValue"
                                        placeholder="" style="padding-right:38px;">
                                    <button type="button" class="btn btn-sm btn-primary position-absolute"
                                        id="apmStEmailReminderInfo"
                                        style="right:6px;top:50%;transform:translateY(-50%);width:24px;height:24px;padding:0;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Minutes before the appointment start">
                                        <i class="bi bi-info-circle" style="font-size:12px;"></i>
                                    </button>
                                </div>
                                <select class="form-select select2" id="apmStEmailReminderUnit"
                                    style="max-width:140px;">
                                    <option value="minutes" selected>Minutes</option>
                                    <option value="hours">Hours</option>
                                    <option value="days">Days</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Appointment notes</label>
                        <div class="apm-quill-wrap">
                            <div id="apmStQuill"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="apmStSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Edit Appointment Modal ===== -->
<div class="modal fade apm-modal" id="apmEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-pencil-square"></i>Edit Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="apmEdSubject" autocomplete="off"
                            value="Callback — Ravi Shankar">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="apmEdDesc"
                            rows="3">Customer asked to call back about solar package</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Related</label>
                        <select class="form-select select2" id="apmEdRelated">
                            <option value="Internal (Contact)">Internal (Contact)</option>
                            <option value="Internal (Lead)">Internal (Lead)</option>
                            <option value="External">External</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="apmEdName" autocomplete="off" value="Ravi Shankar">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="apmEdEmail" autocomplete="off"
                            value="ravi.shankar@gmail.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone (Ex: +168 1234 5678)</label>
                        <input type="text" class="form-control" id="apmEdPhone" autocomplete="off"
                            value="+91 98074 56321">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date / Time <span class="text-danger">*</span></label>
                        <div class="row g-2">
                            <div class="col-7">
                                <div class="date-picker">
                                    <input type="text" class="date-input form-control" id="apmEdDateTime"
                                        value="26-09-2026" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="time-picker right-0">
                                    <input type="text" class="time-input form-control" id="apmEdTime" value="10:30"
                                        placeholder="HH:MM" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Location (optional)</label>
                        <input type="text" class="form-control" id="apmEdLocation" autocomplete="off"
                            value="Gharuda Office, Chennai">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Attendees <span class="text-danger">*</span></label>
                        <select class="form-select select2" id="apmEdAttendees">
                            <option value="Imala ina, gharuda SOFTWARE">Imala ina, gharuda SOFTWARE</option>
                            <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                            <option value="Harish D.">Harish D.</option>
                            <option value="Divya A.">Divya A.</option>
                            <option value="Priya S.">Priya S.</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Appointment Type</label>
                        <select class="form-select select2" id="apmEdType">
                            <option value="">Non selected</option>
                            <option value="SD - Online Demo" data-color="#16a34a">SD - Online Demo</option>
                            <option value="SD - Direct Visit - lead" data-color="#0d9488">SD - Direct Visit - lead
                            </option>
                            <option value="DEV - Direct Visit - customer" data-color="#9f1239">DEV - Direct Visit -
                                customer</option>
                            <option value="DEV - Customer visit - GHARUDA" data-color="#2563eb">DEV - Customer visit -
                                GHARUDA</option>
                            <option value="DEV - Online Demo - Customer" data-color="#dc2626">DEV - Online Demo -
                                Customer</option>
                            <option value="SD - GHARUDA Visit" data-color="#06b6d4">SD - GHARUDA Visit</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Repeat every</label>
                        <select class="form-select select2" id="apmEdRepeat">
                            <option value="">Non selected</option>
                            <option value="1 week">1 week</option>
                            <option value="2 weeks">2 weeks</option>
                            <option value="1 month">1 month</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="apm-cron-note">Please mark the checkboxes as checked if you want selected attendee
                            and contact to receive reminders eg. if set 30 minutes before the appointment start. Note
                            that this feature requires cron job to be configured.</div>
                        <div class="apm-notif-check mt-2">
                            <input class="form-check-input" type="checkbox" id="apmEdSms">
                            <label class="form-check-label" for="apmEdSms">Send SMS Notifications</label>
                        </div>
                        <div class="apm-notif-check">
                            <input class="form-check-input" type="checkbox" id="apmEdEmailNotif">
                            <label class="form-check-label" for="apmEdEmailNotif">Send Email Notifications</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Appointment notes</label>
                        <div class="apm-quill-wrap">
                            <div id="apmEdQuill"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="apmEdSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Add New Task Modal (from lead.php) ===== -->
<div class="modal fade" id="apmNewTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width:620px;">
        <div class="modal-content" style="border:none;border-radius:12px;">

            <div class="modal-header">
                <h5>Add new task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Public / Billable -->
                <div class="tk-top-row">
                    <div class="tk-checks">
                        <label><input type="checkbox" id="atkPublic"> Public</label>
                        <label><input type="checkbox" id="atkBillable" checked> Billable</label>
                    </div>
                </div>
                <!-- Attach Files: drag & drop zone -->
                <div class="tk-drop" id="atkDropZone">
                    <i class="bi bi-cloud-arrow-up"></i>
                    <div class="t1">Drag &amp; drop files here, or <span>Browse</span></div>
                    <div class="t2">Images, documents, spreadsheets &mdash; you can attach multiple files</div>
                    <input type="file" id="atkAttachInput" multiple style="display:none;">
                </div>
                <div id="atkFileList"></div>
                <!-- Subject -->
                <div class="tk-field">
                    <label>Subject <span class="req">*</span></label>
                    <input type="text" class="form-control" id="atkSubject" placeholder="">
                </div>
                <!-- Hourly Rate -->
                <div class="tk-field">
                    <label>Hourly Rate</label>
                    <input type="number" class="form-control" id="atkHourlyRate" value="0">
                </div>
                <!-- Start Date / Due Date -->
                <div class="tk-2col">
                    <div class="tk-field">
                        <label>Start Date <span class="req">*</span></label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control" id="atkStartDate"
                                placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                        </div>
                    </div>
                    <div class="tk-field">
                        <label>Due Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control" id="atkDueDate" placeholder="DD-MM-YYYY"
                                maxlength="10" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- Repeat every / Priority -->
                <div class="tk-2col">
                    <div class="tk-field">
                        <label>Repeat every</label>
                        <select class="form-select select2" id="atkRepeat">
                            <option selected>Non selected</option>
                            <option>Every day</option>
                            <option>Every week</option>
                            <option>Every month</option>
                            <option>Every year</option>
                        </select>
                    </div>
                    <div class="tk-field">
                        <label>Priority</label>
                        <select class="form-select select2" id="atkPriority">
                            <option>Low</option>
                            <option selected>Medium</option>
                            <option>High</option>
                            <option>Urgent</option>
                        </select>
                    </div>
                </div>
                <!-- Related To / Proposal -->
                <div class="tk-2col">
                    <div class="tk-field">
                        <label>Related To</label>
                        <select class="form-select select2" id="atkRelatedTo">
                            <option selected>Proposal</option>
                            <option>Lead</option>
                            <option>Customer</option>
                            <option>Project</option>
                        </select>
                    </div>
                    <div class="tk-field">
                        <label>Proposal</label>
                        <select class="form-select select2" id="atkProposalSel">
                            <option selected>PRO-152</option>
                            <option>PRO-151</option>
                            <option>PRO-150</option>
                        </select>
                    </div>
                </div>
                <!-- Dependency -->
                <div class="tk-dep"><input type="checkbox" id="atkDependency"><label
                        for="atkDependency">Dependency</label></div>
                <!-- Assignees / Followers -->
                <div class="tk-2col">
                    <div class="tk-field">
                        <label>Assignees</label>
                        <select class="form-select select2" id="atkAssignees">
                            <option selected>GHARUDA SOFTWARE</option>
                            <option>GHRAUDA SOFTWARE</option>
                            <option>Priya R</option>
                            <option>Suresh Babu</option>
                        </select>
                    </div>
                    <div class="tk-field">
                        <label>Followers</label>
                        <select class="form-select select2" id="atkFollowers">
                            <option selected>Non selected</option>
                            <option>GHARUDA SOFTWARE</option>
                            <option>Priya R</option>
                        </select>
                    </div>
                </div>
                <!-- Insert Checklist Templates -->
                <div class="tk-field">
                    <label>Insert Checklist Templates</label>
                    <select class="form-select select2" id="atkChecklist">
                        <option selected>Non selected</option>
                        <option>Site Survey Checklist</option>
                        <option>Installation Checklist</option>
                        <option>Quotation Review Checklist</option>
                    </select>
                </div>
                <!-- Tags (chip input) -->
                <div class="tk-field">
                    <label>Tags <span class="req">*</span></label>
                    <div class="nl-tags-wrap" id="atkTagsWrap" style="max-width:100%;">
                        <div class="nl-tags-chips" id="atkTagsChips"></div>
                        <input type="text" class="nl-tags-input" id="atkTagsInput"
                            placeholder="Type and press Enter...">
                    </div>
                </div>
                <!-- Task Description -->
                <div class="tk-field">
                    <label>Task Description</label>
                    <textarea class="form-control" id="atkDescription" placeholder="Add description"></textarea>
                </div>
            </div>
            <!-- Footer -->
            <div class="tk-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="atkTaskSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Appointment Overview (fullscreen view — pure Bootstrap 5) ===== -->
<div class="modal fade" id="apmViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-light">
            <div class="modal-header bg-white border-bottom shadow-sm px-4 py-3">
                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-arrow-left me-1"></i>Go Back
                    </button>
                    <h5 class="modal-title fw-bold text-dark mb-0">Appointment Overview</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="container-fluid" style="max-width: 1000px;">
                    <!-- Status Banner Card -->
                    <div class="card border-0 shadow-sm rounded-3 mb-4 text-center p-4">
                        <h4 class="fw-bold text-dark mb-2" id="apmViewSubjectTitle">Appointment Overview</h4>
                        <div>
                            <span class="text-muted small text-uppercase fw-semibold me-2">Appointment Status:</span>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fs-6" id="apmViewStatus">SCHEDULED</span>
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
                                        <dd class="col-sm-7 fw-semibold text-dark" id="apmViewInitiated">Harish D.</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Subject</dt>
                                        <dd class="col-sm-7 fw-semibold text-dark" id="apmViewSubject">Callback — Ravi Shankar</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Description</dt>
                                        <dd class="col-sm-7 text-dark" id="apmViewDesc">Customer asked to call back about solar package</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Appointment Date</dt>
                                        <dd class="col-sm-7 fw-semibold text-dark" id="apmViewDate">26-09-2026</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Start Time</dt>
                                        <dd class="col-sm-7 fw-semibold text-dark" id="apmViewTime">10:30 AM</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Attendees</dt>
                                        <dd class="col-sm-7">
                                            <span class="badge bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width:28px;height:28px;" id="apmViewAttendeeChip">H</span>
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
                                        <dd class="col-sm-7"><span class="badge bg-secondary-subtle text-secondary" id="apmViewSource">Lead</span></dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Name</dt>
                                        <dd class="col-sm-7"><a href="#" class="text-decoration-none fw-semibold">Ravi Shankar</a></dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Email</dt>
                                        <dd class="col-sm-7"><a href="#" class="text-decoration-none">ravi.shankar@gmail.com</a></dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Phone</dt>
                                        <dd class="col-sm-7" id="apmViewPhone">
                                            <span class="badge bg-info-subtle text-info border border-info-subtle me-1">SMS: 9807456321</span>
                                            <span class="badge bg-success-subtle text-success border border-success-subtle">CALL: 9807456321</span>
                                        </dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Location</dt>
                                        <dd class="col-sm-7 text-dark" id="apmViewLocation">Gharuda Office, Chennai</dd>

                                        <dt class="col-sm-5 text-muted fw-normal">Email Tracking</dt>
                                        <dd class="col-sm-7 text-dark"><span class="badge bg-success-subtle text-success">Read</span></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <!-- Reminders Card -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-3">
                                <div class="card-header bg-white border-bottom py-3">
                                    <h6 class="fw-bold mb-0 text-primary"><i class="bi bi-bell me-2"></i>Appointment Reminders</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6 d-flex align-items-center justify-content-between p-3 bg-light rounded-2">
                                            <span class="text-muted">SMS notification triggered</span>
                                            <span class="badge bg-success-subtle text-success" id="apmViewSmsReminder"><i class="bi bi-check-circle me-1"></i>Yes</span>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center justify-content-between p-3 bg-light rounded-2">
                                            <span class="text-muted">Email notification triggered</span>
                                            <span class="badge bg-success-subtle text-success" id="apmViewEmailReminder"><i class="bi bi-check-circle me-1"></i>Yes</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white border-top py-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
                                    <button type="button" class="btn btn-outline-primary" id="apmViewRemindBtn">
                                        <i class="bi bi-send me-1"></i>Send Early Reminders
                                    </button>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-danger" id="apmViewCancelBtn">
                                            <i class="bi bi-x-circle me-1"></i>Cancel Appointment
                                        </button>
                                        <button type="button" class="btn btn-success" id="apmViewFinishBtn">
                                            <i class="bi bi-check-circle me-1"></i>Mark as Finished
                                        </button>
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


<!-- ===== New Lead Modal (copied from lead.php — shown fullscreen on Convert to Lead) ===== -->
<div class="modal fade" id="newLeadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fw-bold mb-0"><i class="bi bi-person-plus me-2 text-primary"></i>New Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="newLeadForm" class="d-flex flex-column overflow-auto">
                <div class="modal-body" class="d-flex flex-column overflow-auto">


                    <!-- Row 1: Status, Source, Assigned -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Status *</label>
                            <div class="nl-add-row">
                                <div class="nl-select-wrap">
                                    <select class="form-select select2 nl-select" id="nl_status"
                                        data-placeholder="Select status">
                                        <option value=""></option>
                                        <option>Lead</option>
                                        <option>Quotation</option>
                                        <option>Followup</option>
                                        <option>Qualified</option>
                                        <option>Negotiation</option>
                                        <option>Won</option>
                                        <option>Lost</option>
                                    </select>
                                </div>
                                <button type="button" class="nl-add-btn" data-nl-target="nl_status"
                                    title="Add new status"><i class="bi bi-plus-lg"></i></button>
                            </div>
                            <div class="nl-add-inline align-items-center gap-2" id="nlStatusAddInline">
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Type new status...">
                                <button type="button" class="btn btn-sm btn-primary nl-inline-save"
                                    style="width:30px;height:30px;"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary nl-inline-cancel"
                                    style="width:30px;height:30px;"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Source *</label>
                            <div class="nl-add-row">
                                <div class="nl-select-wrap">
                                    <select class="form-select select2 nl-select" id="nl_source"
                                        data-placeholder="Select source">
                                        <option value=""></option>
                                        <option>IndiaMart</option>
                                        <option>Website</option>
                                        <option>Facebook Ads</option>
                                        <option>Google Ads</option>
                                        <option>Referral</option>
                                        <option>Walk-in</option>
                                        <option>Cold Call</option>
                                    </select>
                                </div>
                                <button type="button" class="nl-add-btn" data-nl-target="nl_source"
                                    title="Add new source"><i class="bi bi-plus-lg"></i></button>
                            </div>
                            <div class="nl-add-inline align-items-center gap-2" id="nlSourceAddInline">
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Type new source...">
                                <button type="button" class="btn btn-sm btn-primary nl-inline-save"
                                    style="width:30px;height:30px;"><i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary nl-inline-cancel"
                                    style="width:30px;height:30px;"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Assigned *</label>
                            <select class="form-select select2 nl-select" id="nl_assigned"
                                data-placeholder="Select person">
                                <option value=""></option>
                                <option selected>GHARUDA SOFTWARE</option>
                                <option>Harish D.</option>
                                <option>Divya A.</option>
                                <option>Karthik R.</option>
                                <option>Priya S.</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 2: Sourcer, Brand, Lead Qualification -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Sourcer</label>
                            <select class="form-select select2 nl-select" id="nl_sourcer"
                                data-placeholder="Select sourcer">
                                <option value=""></option>
                                <option selected>GHARUDA SOFTWARE</option>
                                <option>Harish D.</option>
                                <option>Website Form</option>
                                <option>Facebook Ads</option>
                                <option>Referral</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Brand</label>
                            <select class="form-select select2 nl-select" id="nl_brand" data-placeholder="Select brand">
                                <option value=""></option>
                                <option>Product A</option>
                                <option>Product B</option>
                                <option>Product C</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Lead Qualification</label>
                            <select class="form-select select2 nl-select" id="nl_qualification"
                                data-placeholder="Select qualification">
                                <option value=""></option>
                                <option>Hot</option>
                                <option>Warm</option>
                                <option>Cold</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3: Tags -->
                    <div class="row g-3 mb-3">
                        <div class="col-12">
                            <label class="form-label"><i class="bi bi-tag me-1"></i>Tags</label>
                            <div class="nl-tags-wrap" id="nlTagsWrap">
                                <div class="nl-tags-chips" id="nlTagsChips"></div>
                                <input type="text" class="nl-tags-input" id="nlTagsInput"
                                    placeholder="Type and press Enter to add tag...">
                            </div>
                            <input type="hidden" id="nl_tags" value="">
                        </div>
                    </div>

                    <hr class="my-2">

                    <!-- Row 4: Company, Name, Enquiry Code + Address (full width) -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Company *</label>
                            <input type="text" class="form-control" id="nl_company" required placeholder="Company name">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Name *</label>
                            <input type="text" class="form-control" id="nl_name" required placeholder="Full name">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Enquiry Code</label>
                            <input type="text" class="form-control bg-light" id="nl_enquiry_code" value="ENQ-0171"
                                readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" id="nl_address" rows="2"
                                placeholder="Full address"></textarea>
                        </div>
                    </div>

                    <!-- Row 6: Position, Country, State -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Position</label>
                            <input type="text" class="form-control" id="nl_position" placeholder="e.g. Manager">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Country</label>
                            <select class="form-select select2 nl-select" id="nl_country"
                                data-placeholder="Select country">
                                <option value=""></option>
                                <option selected>India</option>
                                <option>United States</option>
                                <option>United Kingdom</option>
                                <option>UAE</option>
                                <option>Singapore</option>
                                <option>Australia</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">State</label>
                            <select class="form-select select2 nl-select" id="nl_state" data-placeholder="Select state">
                                <option value=""></option>
                                <option>Tamil Nadu</option>
                                <option>Karnataka</option>
                                <option>Maharashtra</option>
                                <option>Delhi</option>
                                <option>Kerala</option>
                                <option>Telangana</option>
                                <option>Gujarat</option>
                                <option>Rajasthan</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 7: Email, Website, Phone -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="nl_email" placeholder="email@example.com">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Website</label>
                            <input type="url" class="form-control" id="nl_website" placeholder="https://example.com">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" id="nl_phone" placeholder="10-digit mobile number">
                        </div>
                    </div>

                    <!-- Row 8: City, Area, Zip Code -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">City</label>
                            <select class="form-select select2 nl-select" id="nl_city" data-placeholder="Select city">
                                <option value=""></option>
                                <option>Chennai</option>
                                <option>Bangalore</option>
                                <option>Mumbai</option>
                                <option>Delhi</option>
                                <option>Hyderabad</option>
                                <option>Kochi</option>
                                <option>Pune</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Area</label>
                            <input type="text" class="form-control" id="nl_area" placeholder="e.g. T. Nagar">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="nl_zip" placeholder="e.g. 600001">
                        </div>
                    </div>

                    <!-- Row 9: Product, Lead value, Closure Date -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Product</label>
                            <select class="form-select select2 nl-select" id="nl_product"
                                data-placeholder="Choose product">
                                <option value=""></option>
                                <option>HRMS Subscription</option>
                                <option>Payroll Module</option>
                                <option>Attendance Module</option>
                                <option>Recruitment Module</option>
                                <option>Custom Development</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Lead value</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" id="nl_value" placeholder="0.00" step="0.01">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Closure Date</label>
                            <div class="date-picker">
                                <input type="text" class="date-input form-control" id="nl_closure_date"
                                    placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <!-- Row 10: Latitude, Longitude, Description -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Latitude (Google Maps)</label>
                            <input type="text" class="form-control" id="nl_lat" placeholder="e.g. 13.0827">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Longitude (Google Maps)</label>
                            <input type="text" class="form-control" id="nl_lng" placeholder="e.g. 80.2707">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" id="nl_description" rows="3"
                                placeholder="Any additional notes about this lead..."></textarea>
                        </div>
                    </div>

                    <hr class="my-2">

                    <!-- Item Table -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Items</label>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" style="font-size:13px;">
                                <thead>
                                    <tr class="table-light">
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                        <th style="width:50px;"></th>
                                    </tr>
                                </thead>
                                <tbody id="nlItemBody">
                                    <tr>
                                        <td><input type="text" class="form-control form-control-sm" placeholder="Code">
                                        </td>
                                        <td><input type="text" class="form-control form-control-sm" placeholder="Name">
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm" placeholder="0"
                                                min="1"></td>
                                        <td style="vertical-align: middle;"><button type="button"
                                                class="btn btn-sm btn-outline-danger nl-remove-item"><i
                                                    class="bi bi-trash"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="nlAddItem"><i
                                class="bi bi-plus-lg me-1"></i>Add Item</button>
                    </div>

                    <hr class="my-2">

                    <!-- Point of Contact -->
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <label class="form-label fw-bold mb-0">Point of Contact:</label>
                            <button type="button" class="btn btn-sm btn-primary" id="nlAddPoc"><i
                                    class="bi bi-plus-lg me-1"></i>Add More</button>
                        </div>
                        <div id="nlPocList">
                            <div class="row g-2 mb-2 nl-poc-row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" placeholder="Name">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control form-control-sm" placeholder="Phone No.">
                                </div>
                                <div class="col-md-3">
                                    <input type="email" class="form-control form-control-sm" placeholder="Email">
                                </div>
                                <div class="col-md-2 align-self-center">
                                    <button type="button" class="btn btn-sm btn-danger nl-remove-poc"><i
                                            class="bi bi-trash me-1"></i>Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i>Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./assets/js/quill-editor.js"></script>
<script>
    (function () {
        'use strict';

        var summaryFilter = 'all';
        var statusFilterVal = '';
        var dateRangeFrom = '';
        var dateRangeTo = '';
        var drawerSourceVal = '';

        /* External filter matcher used automatically by auto-master-table.js */
        window.attendanceRowMatches = function (tr) {
            if (!tr || tr.classList.contains('no-record-row')) return true;
            if (tr.closest('#apmAppointmentsTable')) {
                var st = tr.getAttribute('data-status') || '';
                var src = tr.getAttribute('data-source') || '';
                var app = tr.getAttribute('data-approved') === '1';
                var dVal = tr.getAttribute('data-date') || '';

                if (dateRangeFrom && dVal && dVal < dateRangeFrom) return false;
                if (dateRangeTo && dVal && dVal > dateRangeTo) return false;

                if (summaryFilter === 'upcoming' && st !== 'Scheduled') return false;
                if (summaryFilter === 'pending' && st !== 'Pending Approval') return false;
                if (summaryFilter === 'cancelled' && st !== 'Cancelled') return false;
                if (summaryFilter === 'missed' && st !== 'Missed') return false;
                if (summaryFilter === 'finished' && st !== 'Finished') return false;

                if (statusFilterVal) {
                    if (statusFilterVal === 'Approved' && !app) return false;
                    if (statusFilterVal === 'Upcoming' && st !== 'Scheduled') return false;
                    if (statusFilterVal === 'Internal' && src !== 'Internal') return false;
                    if (statusFilterVal === 'External' && src !== 'External') return false;
                    if (statusFilterVal === 'Lead' && src !== 'Lead') return false;
                    if (statusFilterVal !== 'Approved' && statusFilterVal !== 'Upcoming' && statusFilterVal !== 'Internal' && statusFilterVal !== 'External' && statusFilterVal !== 'Lead' && st !== statusFilterVal) return false;
                }
                if (drawerSourceVal && src !== drawerSourceVal) return false;
                return true;
            }
            return true;
        };

        function refreshTable() {
            var tableEl = document.getElementById('apmAppointmentsTable');
            if (tableEl && tableEl.autoTable && typeof tableEl.autoTable.render === 'function') {
                tableEl.autoTable.render();
            }
        }

        
        /* Appointment Filter Drawer Handlers */
        window.applyAppointmentDrawerFilters = function() {
            var quickChip = document.querySelector('.apm-drawer-chip.active');
            var quickVal = quickChip ? (quickChip.getAttribute('data-val') || 'all') : 'all';
            summaryFilter = quickVal;

            var statusSel = document.getElementById('drawerFilterStatus');
            statusFilterVal = statusSel ? statusSel.value : '';

            var srcSel = document.getElementById('drawerFilterSource');
            drawerSourceVal = srcSel ? srcSel.value : '';

            var dateRangeEl = document.getElementById('drawerDateRange');
            if (dateRangeEl) {
                var val = dateRangeEl.value.trim();
                var parts = val.split(' to ');
                function toISO(dStr) {
                    if (!dStr) return '';
                    var p = dStr.trim().split('-');
                    if (p.length === 3 && p[2].length === 4) return p[2] + '-' + p[1] + '-' + p[0];
                    return '';
                }
                if (parts.length === 2) {
                    dateRangeFrom = toISO(parts[0]);
                    dateRangeTo = toISO(parts[1]);
                } else if (parts.length === 1 && parts[0] && parts[0].length === 10) {
                    dateRangeFrom = toISO(parts[0]);
                    dateRangeTo = toISO(parts[0]);
                } else {
                    dateRangeFrom = '';
                    dateRangeTo = '';
                }
            }

            var count = 0;
            if (quickVal !== 'all') count++;
            if (statusFilterVal !== '') count++;
            if (drawerSourceVal !== '') count++;
            if (dateRangeFrom !== '' || dateRangeTo !== '') count++;

            var badge = document.getElementById('apmFilterCountBadge');
            if (badge) {
                badge.textContent = count;
                badge.classList.toggle('d-none', count === 0);
            }

            refreshTable();
        };

        window.resetAppointmentFilters = function() {
            var chips = document.querySelectorAll('.apm-drawer-chip');
            chips.forEach(function(c) { c.classList.remove('active'); });
            var allChip = document.querySelector('.apm-drawer-chip[data-val="all"]');
            if (allChip) allChip.classList.add('active');
            summaryFilter = 'all';

            if (document.getElementById('drawerFilterStatus')) document.getElementById('drawerFilterStatus').value = '';
            statusFilterVal = '';

            if (document.getElementById('drawerFilterSource')) document.getElementById('drawerFilterSource').value = '';
            drawerSourceVal = '';

            if (document.getElementById('drawerDateRange')) document.getElementById('drawerDateRange').value = '';
            dateRangeFrom = '';
            dateRangeTo = '';

            var badge = document.getElementById('apmFilterCountBadge');
            if (badge) {
                badge.textContent = '0';
                badge.classList.add('d-none');
            }

            refreshTable();
        };

        document.addEventListener('DOMContentLoaded', function () {
            var tableEl = document.getElementById('apmAppointmentsTable');
            if (window.AutoMasterTable && tableEl && !tableEl.autoTable) {
                window.AutoMasterTable.init(tableEl);
            }

            var contactModalEl = document.getElementById('apmContactModal');
            var staffModalEl = document.getElementById('apmStaffModal');
            var viewModalEl = document.getElementById('apmViewModal');
            var editModalEl = document.getElementById('apmEditModal');
            var newTaskModalEl = document.getElementById('apmNewTaskModal');
            var newLeadModalEl = document.getElementById('newLeadModal');

            var ctQuill = null, stQuill = null, edQuill = null;
            function initQuills() {
                if (typeof Quill === 'undefined') return;
                var toolbarOpts = [
                    [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline'],
                    [{ align: [] }],
                    [{ list: 'bullet' }, { list: 'ordered' }],
                    ['link'], ['clean']
                ];
                if (!ctQuill && document.querySelector('#apmCtQuill')) {
                    ctQuill = new Quill('#apmCtQuill', { theme: 'snow', placeholder: 'Write appointment notes here...', modules: { toolbar: toolbarOpts } });
                }
                if (!stQuill && document.querySelector('#apmStQuill')) {
                    stQuill = new Quill('#apmStQuill', { theme: 'snow', placeholder: 'Write appointment notes here...', modules: { toolbar: toolbarOpts } });
                }
                if (!edQuill && document.querySelector('#apmEdQuill')) {
                    edQuill = new Quill('#apmEdQuill', { theme: 'snow', placeholder: 'Write appointment notes here...', modules: { toolbar: toolbarOpts } });
                    edQuill.root.innerHTML = '<p>Customer requested quotation and demonstration for HRMS package.</p>';
                }
            }

            if (contactModalEl) contactModalEl.addEventListener('shown.bs.modal', initQuills);
            if (staffModalEl) staffModalEl.addEventListener('shown.bs.modal', initQuills);
            if (editModalEl) editModalEl.addEventListener('shown.bs.modal', initQuills);

            /* Table Row Actions */
            var tbody = document.getElementById('apmAppointmentsTbody');
            if (tbody) {
                tbody.addEventListener('click', function (e) {
                    var tr = e.target.closest('tr');
                    if (!tr) return;

                    var del = e.target.closest('.apm-delete-btn');
                    if (del) {
                        e.preventDefault();
                        if (tableEl && tableEl.autoTable && typeof tableEl.autoTable.deleteRow === 'function') {
                            tableEl.autoTable.deleteRow(tr);
                        } else {
                            tr.remove();
                        }
                        return;
                    }

                    var view = e.target.closest('.apm-view-btn') || e.target.closest('.apm-subject-link');
                    if (view) {
                        e.preventDefault();
                        var subj = tr.querySelector('.apm-subject-link') ? tr.querySelector('.apm-subject-link').textContent.trim() : 'Appointment';
                        var dt = tr.querySelector('.apm-date-chip') ? tr.querySelector('.apm-date-chip').textContent.trim() : '';
                        var st = tr.getAttribute('data-status') || 'SCHEDULED';
                        var src = tr.getAttribute('data-source') || 'Lead';
                        var init = tr.querySelector('.apm-initiated') ? tr.querySelector('.apm-initiated').textContent.trim() : 'Staff';

                        var statusEl = document.getElementById('apmViewStatus');
                        if (statusEl) {
                            statusEl.textContent = st.toUpperCase();
                            var badgeCls = st === 'Finished' ? 'bg-success-subtle text-success border-success-subtle' :
                                           (st === 'Missed' ? 'bg-warning-subtle text-warning border-warning-subtle' :
                                           (st === 'Cancelled' ? 'bg-danger-subtle text-danger border-danger-subtle' :
                                           (st === 'Pending Approval' ? 'bg-info-subtle text-info border-info-subtle' : 'bg-primary-subtle text-primary border-primary-subtle')));
                            statusEl.className = 'badge border px-3 py-2 fs-6 ' + badgeCls;
                        }
                        if (document.getElementById('apmViewSubject')) document.getElementById('apmViewSubject').textContent = subj;
                        if (document.getElementById('apmViewDate')) document.getElementById('apmViewDate').textContent = dt;
                        if (document.getElementById('apmViewInitiated')) document.getElementById('apmViewInitiated').textContent = init;
                        if (document.getElementById('apmViewSource')) document.getElementById('apmViewSource').textContent = src;
                        if (viewModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(viewModalEl).show();
                        }
                        return;
                    }

                    var edit = e.target.closest('.apm-edit-btn');
                    if (edit) {
                        e.preventDefault();
                        var editSubj = tr.querySelector('.apm-subject-link') ? tr.querySelector('.apm-subject-link').textContent.trim() : '';
                        if (document.getElementById('apmEdSubject')) document.getElementById('apmEdSubject').value = editSubj;
                        if (editModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(editModalEl).show();
                        }
                        return;
                    }

                    var task = e.target.closest('.apm-newtask-btn');
                    if (task) {
                        e.preventDefault();
                        var taskSubj = tr.querySelector('.apm-subject-link') ? tr.querySelector('.apm-subject-link').textContent.trim() : '';
                        var atkSubj = document.getElementById('atkSubject');
                        if (atkSubj) atkSubj.value = taskSubj;
                        if (newTaskModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(newTaskModalEl).show();
                        }
                        return;
                    }

                    var convert = e.target.closest('.apm-convert-btn');
                    if (convert) {
                        e.preventDefault();
                        if (newLeadModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(newLeadModalEl).show();
                        }
                        return;
                    }

                    var pill = e.target.closest('.apm-status-pill');
                    if (pill) {
                        e.preventDefault();
                        var cur = pill.getAttribute('data-status');
                        var next = cur === 'Missed' ? 'Finished' : (cur === 'Pending Approval' ? 'Finished' : (cur === 'Cancelled' ? 'Scheduled' : cur));
                        pill.setAttribute('data-status', next);
                        pill.textContent = next.toUpperCase() + ' ▾';
                        tr.setAttribute('data-status', next);
                    }
                });
            }

            /* Date Range Picker Filter */
            var rangeInput = document.getElementById('apmDateRangeFilter');
            if (rangeInput) {
                function parseRange() {
                    var val = rangeInput.value.trim();
                    var parts = val.split(' to ');
                    function toISO(dStr) {
                        if (!dStr) return '';
                        var p = dStr.trim().split('-');
                        if (p.length === 3 && p[2].length === 4) {
                            return p[2] + '-' + p[1] + '-' + p[0];
                        }
                        return '';
                    }
                    if (parts.length === 2) {
                        dateRangeFrom = toISO(parts[0]);
                        dateRangeTo = toISO(parts[1]);
                    } else if (parts.length === 1 && parts[0] && parts[0].length === 10) {
                        dateRangeFrom = toISO(parts[0]);
                        dateRangeTo = toISO(parts[0]);
                    } else {
                        dateRangeFrom = '';
                        dateRangeTo = '';
                    }
                    refreshTable();
                }
                rangeInput.addEventListener('input', parseRange);
                rangeInput.addEventListener('change', parseRange);
            }

                        document.querySelectorAll('.apm-drawer-chip').forEach(function(chip) {
                chip.addEventListener('click', function() {
                    document.querySelectorAll('.apm-drawer-chip').forEach(function(c) { c.classList.remove('active'); });
                    chip.classList.add('active');
                    applyAppointmentDrawerFilters();
                });
            });

            /* Summary Chips Filtering */
            document.querySelectorAll('.apm-chip').forEach(function (chip) {
                chip.addEventListener('click', function () {
                    document.querySelectorAll('.apm-chip').forEach(function (c) { c.classList.remove('active'); });
                    chip.classList.add('active');
                    summaryFilter = chip.getAttribute('data-summary') || 'all';
                    refreshTable();
                });
            });

            /* Status Filter Menu */
            var filterBtn = document.getElementById('apmFilterBtn');
            var filterMenu = document.getElementById('apmFilterMenu');
            if (filterBtn && filterMenu) {
                filterBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    filterMenu.classList.toggle('show');
                });
                document.addEventListener('click', function () {
                    filterMenu.classList.remove('show');
                });
                filterMenu.querySelectorAll('.apm-list-item').forEach(function (item) {
                    item.addEventListener('click', function () {
                        filterMenu.querySelectorAll('.apm-list-item').forEach(function (i) { i.classList.remove('active'); });
                        item.classList.add('active');
                        statusFilterVal = item.getAttribute('data-status-filter') || '';
                        filterBtn.classList.toggle('has-filter', statusFilterVal !== '');
                        refreshTable();
                    });
                });
            }

            /* Bootstrap Modal Select2 dropdownParent binding */
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('.modal').on('shown.bs.modal', function () {
                    var $m = $(this);
                    $m.find('select.select2').each(function () {
                        if ($(this).data('select2')) {
                            $(this).select2('destroy');
                        }
                        $(this).select2({
                            dropdownParent: $m,
                            width: '100%'
                        });
                    });
                });
            }

            /* Create Segment Dropdown */
            var newDropBtn = document.getElementById('apmNewDropBtn');
            var createMenu = document.getElementById('apmCreateMenu');
            if (newDropBtn && createMenu) {
                newDropBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    createMenu.classList.toggle('show');
                });
                document.addEventListener('click', function () {
                    createMenu.classList.remove('show');
                });
                createMenu.querySelectorAll('[data-create-type]').forEach(function (item) {
                    item.addEventListener('click', function () {
                        createMenu.classList.remove('show');
                        if (item.getAttribute('data-create-type') === 'staff') {
                            if (staffModalEl) bootstrap.Modal.getOrCreateInstance(staffModalEl).show();
                        } else {
                            if (contactModalEl) bootstrap.Modal.getOrCreateInstance(contactModalEl).show();
                        }
                    });
                });
            }

            /* Modal Submissions */
            var forms = ['apmCtSubmit', 'apmStSubmit', 'apmEdSubmit', 'atkTaskSubmit'];
            forms.forEach(function (btnId) {
                var btn = document.getElementById(btnId);
                if (btn) {
                    btn.addEventListener('click', function (e) {
                        e.preventDefault();
                        var modal = btn.closest('.modal');
                        if (modal && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(modal).hide();
                        }
                    });
                }
            });

            var nlForm = document.getElementById('newLeadForm');
            if (nlForm) {
                nlForm.addEventListener('submit', function (e) {
                    e.preventDefault();
                    if (newLeadModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(newLeadModalEl).hide();
                    }
                });
            }
        });
            /* Prepend dynamically scheduled appointments & handle SW/HW presets */
            function prependApptRow(appt) {
                var tbody = document.getElementById('apmAppointmentsTbody');
                if (!tbody) return;
                var tr = document.createElement('tr');
                tr.setAttribute('data-id', appt.id);
                tr.setAttribute('data-status', 'Scheduled');
                tr.setAttribute('data-source', appt.source || 'Lead');
                var badgeCls = (appt.div === 'HW') ? 'bg-warning-subtle text-dark border border-warning-subtle' : 'bg-success-subtle text-success border border-success-subtle';
                tr.innerHTML =
                    '<td><span class="badge ' + badgeCls + '">' + (appt.div || 'SW') + '</span></td>' +
                    '<td><a href="mom.php" class="apm-subject-link fw-bold text-primary">' + appt.subject + '</a><span class="apm-approved-tag ms-1">Approved</span></td>' +
                    '<td><span class="apm-date-chip">' + appt.datetime + '</span></td>' +
                    '<td><span class="apm-initiated"><span class="apm-avatar av-violet">' + (appt.attendee ? appt.attendee.charAt(0) : 'H') + '</span>' + (appt.attendee || 'Harish D.') + '</span></td>' +
                    '<td>' + appt.desc + ' <span class="badge bg-light text-secondary border ms-1">' + (appt.location || 'Online') + '</span></td>' +
                    '<td><span class="apm-status-cell"><span class="apm-status st-scheduled" data-status="Scheduled">SCHEDULED</span></span></td>' +
                    '<td>' + (appt.type || 'Client Meeting') + '</td>' +
                    '<td><span class="apm-cal-note text-success fw-semibold"><i class="bi bi-check2-circle me-1"></i>Synced to CRM Calendar</span></td>' +
                    '<td><div class="d-flex align-items-center gap-1">' +
                        '<a href="mom.php" class="btn btn-xs btn-success py-0 px-2 small fw-semibold" title="Record Minutes of Meeting"><i class="bi bi-journal-text me-1"></i>MOM</a>' +
                        '<a href="quotation-create.php" class="btn btn-xs btn-outline-primary py-0 px-2 small fw-semibold" title="Create Quotation">+ Quote</a>' +
                    '</div></td>';
                tbody.insertBefore(tr, tbody.firstChild);
            }

            try {
                var savedAppts = JSON.parse(localStorage.getItem('gh_scheduled_appts') || '[]');
                savedAppts.forEach(function(a) { prependApptRow(a); });
            } catch (err) {}

            var ctSubmitBtn = document.getElementById('apmCtSubmit');
            if (ctSubmitBtn) {
                ctSubmitBtn.addEventListener('click', function() {
                    var subj = document.getElementById('apmCtSubject').value.trim();
                    if (!subj) return;
                    var tp = document.getElementById('apmCtType').value || 'SW - Online Product Demo (Meet/Zoom)';
                    var dt = (document.getElementById('apmCtDateTime').value || '30-10-2026') + ' ' + (document.getElementById('apmCtTime').value || '11:30 AM');
                    var newAppt = {
                        id: Date.now(),
                        div: tp.indexOf('HW') === 0 ? 'HW' : 'SW',
                        subject: subj,
                        datetime: dt,
                        attendee: document.getElementById('apmCtAttendees').value || 'Harish D.',
                        desc: document.getElementById('apmCtDesc').value.trim() || 'Scheduled client session',
                        location: document.getElementById('apmCtLocation').value.trim() || 'Online / Client Site',
                        type: tp
                    };
                    prependApptRow(newAppt);
                    try {
                        var list = JSON.parse(localStorage.getItem('gh_scheduled_appts') || '[]');
                        list.push(newAppt);
                        localStorage.setItem('gh_scheduled_appts', JSON.stringify(list));
                    } catch (err) {}
                });
            }

            window.openQuickApptPreset = function(type, customSubj, customClient) {
                var cModal = document.getElementById('apmContactModal');
                if (type === 'HW') {
                    document.getElementById('apmCtSubject').value = customSubj || 'HW Factory Site Survey — Biometric & CCTV Cabling (Power Spares)';
                    document.getElementById('apmCtDesc').value = 'On-site technical inspection for biometric terminal mounting, power backup, and CAT6 cabling layout' + (customClient ? (' for ' + customClient) : '.');
                    document.getElementById('apmCtDateTime').value = '30-10-2026';
                    document.getElementById('apmCtTime').value = '03:00 PM';
                    document.getElementById('apmCtLocation').value = 'Ambattur Industrial Estate, Unit 4, Chennai';
                    if (window.jQuery) {
                        jQuery('#apmCtRelated').val('Lead').trigger('change');
                        jQuery('#apmCtAttendees').val('Divya A.').trigger('change');
                        jQuery('#apmCtType').val('HW - On-site Site Survey & Cabling').trigger('change');
                    }
                } else {
                    document.getElementById('apmCtSubject').value = customSubj || 'SW Live Product Demo — Gharuda Cloud ERP & Payroll (Zen Publications)';
                    document.getElementById('apmCtDesc').value = 'Online Google Meet screen-share product walkthrough, API integration architecture, and sprint scope discussion' + (customClient ? (' for ' + customClient) : '.');
                    document.getElementById('apmCtDateTime').value = '30-10-2026';
                    document.getElementById('apmCtTime').value = '11:30 AM';
                    document.getElementById('apmCtLocation').value = 'Google Meet (meet.google.com/ghr-erp-demo)';
                    if (window.jQuery) {
                        jQuery('#apmCtRelated').val('Lead').trigger('change');
                        jQuery('#apmCtAttendees').val('Harish D.').trigger('change');
                        jQuery('#apmCtType').val('SW - Online Product Demo (Meet/Zoom)').trigger('change');
                    }
                }
                if (cModal && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(cModal).show();
                }
            };

            /* Auto-open if redirected from Support Ticket (Visit / Call button) */
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('from_ticket')) {
                var tType = urlParams.get('type') || 'SW';
                var tSubj = urlParams.get('subject') || '';
                var tClient = urlParams.get('client') || '';
                setTimeout(function() {
                    window.openQuickApptPreset(tType, tSubj, tClient);
                }, 300);
            }
    
        /* ==================== APPOINTMENT VIEW SWITCHER & MEETING SCHEDULE ==================== */
        var scheduleMeetings = [
            { id: 1, customerName: 'Ravi Shankar', customerEmail: 'ravi.shankar@gmail.com', staffName: 'GHARUDA SOFTWARE', cl: 'Customer', zoom: 'https://zoom.us/j/98123456789', status: 'Scheduled', remark: 'Product demo for new enquiry' },
            { id: 2, customerName: 'Meena Ramesh', customerEmail: 'meena.ramesh@yahoo.com', staffName: 'Harish D.', cl: 'Lead', zoom: 'https://zoom.us/j/87291034567', status: 'Scheduled', remark: 'Quotation discussion — solar package' },
            { id: 3, customerName: 'Arun Kumar', customerEmail: 'arun.kumar@outlook.com', staffName: 'Divya A.', cl: 'Lead', zoom: 'https://zoom.us/j/76543210987', status: 'Completed', remark: 'Requirements collected, proposal pending' },
            { id: 4, customerName: 'Priya Sundar', customerEmail: 'priya.sundar@gmail.com', staffName: 'GHARUDA SOFTWARE', cl: 'Customer', zoom: 'https://zoom.us/j/65098765432', status: 'Cancelled', remark: 'Customer not available, reschedule needed' },
            { id: 5, customerName: 'Suresh Babu', customerEmail: 'suresh.babu@gmail.com', staffName: 'Priya S.', cl: 'Lead', zoom: 'https://zoom.us/j/54321098765', status: 'Scheduled', remark: 'Follow-up meeting for pending payment' },
            { id: 6, customerName: 'Lakshmi Pharma', customerEmail: 'info@lakshmipharma.in', staffName: 'Harish D.', cl: 'Customer', zoom: 'https://zoom.us/j/43219876543', status: 'Completed', remark: 'Annual maintenance contract reviewed' },
            { id: 7, customerName: 'Karthik Raja', customerEmail: 'karthik.raja@gmail.com', staffName: 'Divya A.', cl: 'Lead', zoom: 'https://zoom.us/j/32109876543', status: 'Missed', remark: 'Staff on leave — meeting not held' },
            { id: 8, customerName: 'Vasanth Auto Works', customerEmail: 'vasanth.auto@gmail.com', staffName: 'Priya S.', cl: 'Customer', zoom: 'https://zoom.us/j/21098765432', status: 'Scheduled', remark: 'Site discussion with engineer' },
            { id: 9, customerName: 'Kaveri Textiles', customerEmail: 'sales@kaveritex.in', staffName: 'GHARUDA SOFTWARE', cl: 'Lead', zoom: '', status: 'Scheduled', remark: 'Zoom link to be shared' },
            { id: 10, customerName: 'Balaji Electricals', customerEmail: 'balaji.elec@gmail.com', staffName: 'Harish D.', cl: 'Customer', zoom: 'https://zoom.us/j/10987654321', status: 'Completed', remark: 'Order confirmed for 5 inverters' },
            { id: 11, customerName: 'Sakthi Hardware', customerEmail: 'sakthi.hw@gmail.com', staffName: 'Divya A.', cl: 'Lead', zoom: 'https://zoom.us/j/19876543210', status: 'Cancelled', remark: 'Budget concern — customer paused' },
            { id: 12, customerName: 'Ambal Foods', customerEmail: 'contact@ambalfoods.in', staffName: 'Priya S.', cl: 'Customer', zoom: 'https://zoom.us/j/28765432109', status: 'Missed', remark: 'Network issue at customer side' }
        ];

        window.switchApmView = function(view) {
            var allView = document.getElementById('apmAllView');
            var schView = document.getElementById('apmScheduleView');
            var tabs = document.querySelectorAll('#apmViewTabs button');

            tabs.forEach(function(btn) {
                btn.classList.toggle('active', btn.getAttribute('data-view') === view);
            });

            if (view === 'schedule') {
                if (allView) allView.classList.add('d-none');
                if (schView) schView.classList.remove('d-none');
                renderMeetingSchedule();
                if (window.history && window.history.replaceState) {
                    window.history.replaceState(null, '', '?view=schedule');
                }
            } else {
                if (allView) allView.classList.remove('d-none');
                if (schView) schView.classList.add('d-none');
                if (window.history && window.history.replaceState) {
                    window.history.replaceState(null, '', 'appointments.php');
                }
            }
        };

        function renderMeetingSchedule() {
            var tbody = document.getElementById('msTbody');
            if (!tbody) return;

            var q = (document.getElementById('msSearch') ? document.getElementById('msSearch').value : '').toLowerCase().trim();
            var typeVal = (document.getElementById('msTypeFilter') ? document.getElementById('msTypeFilter').value : '').trim();
            var statusVal = (document.getElementById('msStatusFilter') ? document.getElementById('msStatusFilter').value : '').trim();

            var filtered = scheduleMeetings.filter(function(m) {
                var matchQ = !q || (m.customerName + ' ' + m.customerEmail + ' ' + m.staffName + ' ' + m.remark).toLowerCase().indexOf(q) !== -1;
                var matchType = !typeVal || m.cl === typeVal;
                var matchStatus = !statusVal || m.status === statusVal;
                return matchQ && matchType && matchStatus;
            });

            var html = '';
            filtered.forEach(function(m, idx) {
                var statusCls = m.status === 'Scheduled' ? 'bg-primary-subtle text-primary border-primary-subtle' :
                                m.status === 'Completed' ? 'bg-success-subtle text-success border-success-subtle' :
                                m.status === 'Cancelled' ? 'bg-danger-subtle text-danger border-danger-subtle' : 'bg-warning-subtle text-warning border-warning-subtle';

                var typeBadge = m.cl === 'Customer' ? '<span class="badge bg-purple-subtle text-purple border" style="background:#ede9fe;color:#6d28d9;"><i class="bi bi-person-check me-1"></i>Customer</span>' :
                                                      '<span class="badge bg-success-subtle text-success border border-success-subtle"><i class="bi bi-person-plus me-1"></i>Lead</span>';

                var zoomBtn = m.zoom ? '<a href="' + m.zoom + '" target="_blank" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1 py-0.5 px-2 font-12 fw-semibold"><i class="bi bi-camera-video-fill text-primary"></i>Join Zoom</a>' :
                                       '<span class="text-muted font-11"><i class="bi bi-dash me-1"></i>Not generated</span>';

                html += '<tr>' +
                    '<td class="ps-4 fw-semibold text-muted">' + (idx + 1) + '</td>' +
                    '<td><span class="fw-bold text-dark font-13">' + m.customerName + '</span></td>' +
                    '<td><a href="mailto:' + m.customerEmail + '" class="text-muted text-decoration-none font-12"><i class="bi bi-envelope me-1"></i>' + m.customerEmail + '</a></td>' +
                    '<td><span class="badge bg-light text-dark border font-11">' + m.staffName + '</span></td>' +
                    '<td>' + typeBadge + '</td>' +
                    '<td>' + zoomBtn + '</td>' +
                    '<td><span class="badge border font-11 ' + statusCls + '">' + m.status + '</span></td>' +
                    '<td><span class="text-muted font-12">' + m.remark + '</span></td>' +
                    '<td class="text-end pe-4">' +
                        '<div class="dropdown text-end">' +
                            '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">Actions</button>' +
                            '<ul class="dropdown-menu dropdown-menu-end shadow border table-action-menu">' +
                                (m.zoom ? '<li><a class="dropdown-item" href="' + m.zoom + '" target="_blank"><div class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-camera-video"></i></div><div><div class="fw-semibold text-dark font-12">Join Meeting</div><div class="text-muted" style="font-size:10px;">Launch video room</div></div></a></li>' : '') +
                                (m.zoom ? '<li><a class="dropdown-item" href="javascript:void(0)" onclick="navigator.clipboard.writeText(\'' + m.zoom + '\'); alert(\'Zoom link copied!\');"><div class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-clipboard-check"></i></div><div><div class="fw-semibold text-dark font-12">Copy Link</div><div class="text-muted" style="font-size:10px;">Copy URL to clipboard</div></div></a></li>' : '') +
                                '<li><a class="dropdown-item" href="javascript:void(0)" onclick="openQuickApptPreset(\'SW\', \'Demo for ' + m.customerName + '\', \'' + m.customerName + '\')"><div class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-calendar-event"></i></div><div><div class="fw-semibold text-dark font-12">Reschedule</div><div class="text-muted" style="font-size:10px;">Change time / date</div></div></a></li>' +
                            '</ul>' +
                        '</div>' +
                    '</td>' +
                '</tr>';
            });

            tbody.innerHTML = html || '<tr><td colspan="9" class="text-center py-4 text-muted">No meetings matching the selected filters</td></tr>';
            var countEl = document.getElementById('msCountBadge');
            var sumEl = document.getElementById('msTableSummary');
            if (countEl) countEl.textContent = filtered.length + ' Meetings';
            if (sumEl) sumEl.textContent = 'Showing ' + filtered.length + ' of ' + scheduleMeetings.length + ' meetings';
        }

        window.clearMsFilters = function() {
            if (document.getElementById('msSearch')) document.getElementById('msSearch').value = '';
            if (document.getElementById('msTypeFilter')) document.getElementById('msTypeFilter').value = '';
            if (document.getElementById('msStatusFilter')) document.getElementById('msStatusFilter').value = '';
            if (document.getElementById('msFromDate')) document.getElementById('msFromDate').value = '';
            if (document.getElementById('msToDate')) document.getElementById('msToDate').value = '';
            renderMeetingSchedule();
        };

        window.exportMeetingScheduleCSV = function() {
            var rows = [['S.No', 'Customer / Lead', 'Email', 'Staff SPOC', 'Type', 'Zoom Meeting Link', 'Status', 'Remark']];
            scheduleMeetings.forEach(function(m, i) {
                rows.push([i + 1, m.customerName, m.customerEmail, m.staffName, m.cl, m.zoom || 'N/A', m.status, m.remark]);
            });
            var csv = 'data:text/csv;charset=utf-8,' + rows.map(function(e) {
                return e.map(function(v) { return '"' + String(v).replace(/"/g, '""') + '"'; }).join(',');
            }).join('\n');
            var link = document.createElement('a');
            link.setAttribute('href', encodeURI(csv));
            link.setAttribute('download', 'meeting_schedule_' + new Date().toISOString().slice(0, 10) + '.csv');
            document.body.appendChild(link);
            link.click();
            link.remove();
        };

        // Wire event listeners on search/filters
        document.addEventListener('DOMContentLoaded', function() {
            var search = document.getElementById('msSearch');
            if (search) search.addEventListener('input', renderMeetingSchedule);
            var tf = document.getElementById('msTypeFilter');
            if (tf) tf.addEventListener('change', renderMeetingSchedule);
            var sf = document.getElementById('msStatusFilter');
            if (sf) sf.addEventListener('change', renderMeetingSchedule);

            // Check URL param ?view=schedule or #schedule
            var params = new URLSearchParams(window.location.search);
            if (params.get('view') === 'schedule' || window.location.hash === '#schedule') {
                switchApmView('schedule');
            }
        });

    })();
</script>


<?php include 'footer.php'; ?>