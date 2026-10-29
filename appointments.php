<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/quill-editor.css">

<div class="container-fluid px-0">

    <!-- Title row -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width:42px;height:42px;font-size:20px;">
                <i class="bi bi-calendar2-week"></i>
            </div>
            <div>
                <h4 class="fw-bold text-dark mb-0">Appointments</h4>
                <span class="text-muted small">Schedule, manage, and track customer meetings and internal sessions</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="callbacks.php" class="btn btn-sm btn-outline-primary"><i class="bi bi-telephone-forward me-1"></i>Callbacks</a>
            <a href="past-meeting.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-calendar-check me-1"></i>Past Meeting</a>
            <a href="mom.php" class="btn btn-sm btn-success fw-semibold"><i class="bi bi-journal-text me-1"></i>Minutes of Meeting (MOM)</a>
            <a href="summary-report.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-bar-chart-line me-1"></i>Summary Report</a>
        </div>
    </div>

    <!-- Today hero -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-primary-subtle bg-opacity-25">
        <div class="card-body p-3 p-md-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width:44px;height:44px;font-size:20px;">
                    <i class="bi bi-bell"></i>
                </div>
                <div>
                    <h5 class="fw-bold text-dark mb-1" id="apmTodayMsg">You have 2 appointments for today</h5>
                    <span class="text-secondary small" id="apmTodaySub">Today · 1 upcoming · 2 pending approval</span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <div class="bg-white rounded-3 p-2 px-3 shadow-sm border border-light" id="apmNextWrap" role="button" title="Next upcoming appointment">
                    <span class="badge bg-secondary-subtle text-secondary me-2">Next up</span>
                    <span class="fw-semibold text-dark me-2" id="apmNextTitle">Callback — Ravi Shankar</span>
                    <span class="badge bg-light text-dark font-monospace border" id="apmNextDate">26-09-2026 10:30 AM</span>
                </div>
                <span class="badge bg-white text-dark border shadow-sm p-2 px-3 font-monospace" id="apmTodayChip">17-10-2026</span>
            </div>
        </div>
    </div>

    <!-- Action row & Filters -->
    <div class="card border-0 shadow-sm rounded-3 mb-3 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <!-- Create dropdown -->
            <div class="dropdown">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="apmNewDropBtn">
                    <i class="bi bi-plus-lg me-1"></i>Create
                </button>
                <ul class="dropdown-menu shadow border-0" id="apmCreateMenu">
                    <li>
                        <button type="button" class="dropdown-item py-2 d-flex align-items-center gap-2" data-create-type="contact">
                            <i class="bi bi-person-lines-fill text-primary"></i>Contact, Lead, External
                        </button>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item py-2 d-flex align-items-center gap-2" data-create-type="staff">
                            <i class="bi bi-people-fill text-success"></i>Staff Meeting
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Callback button -->
            <a href="callbacks.php?new=1" class="btn btn-outline-primary btn-sm" id="apmCallbackBtn">
                <i class="bi bi-telephone-forward me-1"></i>Callback
            </a>

            <button type="button" class="btn btn-outline-success btn-sm fw-semibold" onclick="openQuickApptPreset('SW')">
                <i class="bi bi-camera-video me-1"></i>+ Schedule SW Demo
            </button>
            <button type="button" class="btn btn-outline-warning text-dark btn-sm fw-semibold" onclick="openQuickApptPreset('HW')">
                <i class="bi bi-geo-alt me-1"></i>+ Schedule HW Site Survey
            </button>

            <!-- Date Range Filter -->
            <div class="date-picker date-range-picker ms-auto" style="min-width:240px;max-width:260px;">
                <input type="text" class="date-input form-control form-control-sm" id="apmDateRangeFilter" placeholder="DD-MM-YYYY to DD-MM-YYYY" autocomplete="off">
            </div>

            <!-- Filter dropdown -->
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="apmFilterBtn" title="Filter by status">
                    <i class="bi bi-funnel me-1"></i>Filter
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0" id="apmFilterMenu" style="max-height: 280px; overflow-y: auto;">
                    <li><button type="button" class="dropdown-item apm-list-item active" data-status-filter="">All</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Approved">Approved</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Pending Approval">Pending Approval</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Cancelled">Cancelled</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Finished">Finished</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Upcoming">Upcoming</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Missed">Missed</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Internal">Internal</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="External">External</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Recurring">Recurring</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Lead">Lead</button></li>
                    <li><button type="button" class="dropdown-item apm-list-item" data-status-filter="Internal Staff">Internal Staff</button></li>
                </ul>
            </div>
        </div>

        <!-- Summary chips (click to filter the table) -->
        <div class="d-flex flex-wrap gap-2 pt-3 mt-3 border-top" id="apmSummaryRow">
            <button type="button" class="btn btn-sm btn-outline-primary active apm-chip" data-summary="all">
                Total <span class="badge bg-primary text-white ms-1" data-count="total">15</span>
            </button>
            <button type="button" class="btn btn-sm btn-outline-primary apm-chip" data-summary="upcoming">
                Upcoming <span class="badge bg-primary text-white ms-1" data-count="upcoming">1</span>
            </button>
            <button type="button" class="btn btn-sm btn-outline-warning apm-chip" data-summary="pending">
                Pending approval <span class="badge bg-warning text-dark ms-1" data-count="pending">2</span>
            </button>
            <button type="button" class="btn btn-sm btn-outline-danger apm-chip" data-summary="cancelled">
                Cancelled <span class="badge bg-danger text-white ms-1" data-count="cancelled">1</span>
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary apm-chip" data-summary="missed">
                Missed <span class="badge bg-secondary text-white ms-1" data-count="missed">4</span>
            </button>
            <button type="button" class="btn btn-sm btn-outline-success apm-chip" data-summary="finished">
                Finished <span class="badge bg-success text-white ms-1" data-count="finished">7</span>
            </button>
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
        </div>
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

    </div>

</div>

<!-- ===== New Appointment Modal (Contact / Lead / External) ===== -->
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
    })();
</script>


<?php include 'footer.php'; ?>