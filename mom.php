<?php
$currentPage = 'mom.php';
include 'header.php';
?>

<!-- =========================================================================
     PURE BOOTSTRAP 5 MINUTES OF MEETING (MOM)
     Zero Custom CSS - Clean Native Bootstrap 5.3 Architecture
     ========================================================================= -->

<link rel="stylesheet" href="./assets/css/quill-editor.css">

<div class="container-fluid px-0">

    <!-- Title Row & Quick Nav -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 bg-white">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-1 rounded-pill">Appointments &amp; MOM</span>
                        <span class="badge bg-success-subtle text-success fw-semibold px-3 py-1 rounded-pill">Pure Bootstrap</span>
                    </div>
                    <h1 class="h3 fw-bold text-dark mb-1">Minutes of Meeting (MOM)</h1>
                    <p class="text-secondary small mb-0">Record, organize, review customer meetings and generate verified PDF minutes.</p>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill small">
                        <i class="bi bi-calendar3 me-1 text-primary"></i>Date: <span id="momToday" class="fw-bold">17-10-2026</span>
                    </span>
                    <a href="appointments.php" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                        <i class="bi bi-calendar2-week me-1"></i>Appointments
                    </a>
                    <a href="past-meeting.php" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                        <i class="bi bi-calendar-check me-1"></i>Past Meetings
                    </a>
                    <a href="quotation-create.php" class="btn btn-outline-success btn-sm rounded-pill px-3 fw-semibold">
                        <i class="bi bi-file-earmark-text me-1"></i>+ Send Quote
                    </a>
                    <a href="task-create.php" class="btn btn-outline-primary btn-sm rounded-pill px-3 fw-semibold">
                        <i class="bi bi-check2-square me-1"></i>+ Action Task
                    </a>
                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3" id="momNewBtn">
                        <i class="bi bi-plus-lg me-1"></i>New MOM
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending MOM Strip (Finished Appointments Requiring MOM) -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-white" id="momPendingStrip">
        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-1 fw-semibold">
                    <i class="bi bi-hourglass-split me-1"></i>Pending MOMs (<span id="momPendingCount">2</span>)
                </span>
                <span class="text-secondary small">Finished appointments awaiting minutes documentation</span>
            </div>
        </div>
        <div class="card-body p-3">
            <div class="d-flex gap-3 overflow-auto pb-1" id="momPendingRow">
                <!-- Appt 1 -->
                <div class="border rounded-3 p-3 bg-light-subtle d-flex justify-content-between align-items-center gap-3 flex-shrink-0" style="min-width: 320px;">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="small text-secondary"><i class="bi bi-clock me-1"></i>13-07-2026 10:00</span>
                            <span class="badge rounded-pill bg-primary-subtle text-primary small">DEV - Online</span>
                        </div>
                        <div class="fw-bold text-dark small mb-1">Test Appointment</div>
                        <div class="text-secondary small"><i class="bi bi-building me-1"></i>Raja Enterprises</div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 text-nowrap" data-pendingid="501">
                        <i class="bi bi-plus-lg me-1"></i>Create
                    </button>
                </div>

                <!-- Appt 2 -->
                <div class="border rounded-3 p-3 bg-light-subtle d-flex justify-content-between align-items-center gap-3 flex-shrink-0" style="min-width: 320px;">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="small text-secondary"><i class="bi bi-clock me-1"></i>21-07-2026 15:30</span>
                            <span class="badge rounded-pill bg-info-subtle text-info small">Onsite</span>
                        </div>
                        <div class="fw-bold text-dark small mb-1">Site Survey Discussion</div>
                        <div class="text-secondary small"><i class="bi bi-building me-1"></i>GODREJ</div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 text-nowrap" data-pendingid="502">
                        <i class="bi bi-plus-lg me-1"></i>Create
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat Metric Cards -->
    <div class="row g-3 mb-4">
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 h-100 bg-white">
                <div class="card-body p-3 d-flex align-items-center gap-3">
                    <div class="bg-success-subtle text-success rounded-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-journal-check fs-4"></i>
                    </div>
                    <div>
                        <div class="h4 fw-bold mb-0 text-dark" id="momStatTotal">5</div>
                        <div class="text-secondary small fw-medium">Total Minutes Recorded</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 h-100 bg-white">
                <div class="card-body p-3 d-flex align-items-center gap-3">
                    <div class="bg-warning-subtle text-warning-emphasis rounded-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-hourglass-split fs-4"></i>
                    </div>
                    <div>
                        <div class="h4 fw-bold mb-0 text-dark" id="momStatPending">2</div>
                        <div class="text-secondary small fw-medium">Pending Documentation</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 h-100 bg-white">
                <div class="card-body p-3 d-flex align-items-center gap-3">
                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                        <i class="bi bi-arrow-repeat fs-4"></i>
                    </div>
                    <div>
                        <div class="h4 fw-bold mb-0 text-dark" id="momStatCR">3</div>
                        <div class="text-secondary small fw-medium">Open Change Requests</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MOM List Table -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-white" id="momTableWrap">
        <div class="card-header bg-white py-3 border-bottom d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h6 class="fw-bold text-dark mb-0">Minutes of Meeting Directory</h6>
                <small class="text-secondary">Historical logs, attendee sign-offs, and downloadable PDF minutes</small>
            </div>
            <div class="d-flex align-items-center gap-2">
                <div class="input-group input-group-sm" style="max-width: 220px;">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control border-start-0" placeholder="Search MOM...">
                </div>
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="window.print()">
                    <i class="bi bi-printer me-1"></i> Print
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="momTable" data-table-name="Minutes of Meeting">
                <thead class="table-light text-uppercase text-secondary small fw-bold">
                    <tr>
                        <th style="width: 45px;" class="text-center">#</th>
                        <th>Document No</th>
                        <th>Customer</th>
                        <th>Project</th>
                        <th>Appointment Subject</th>
                        <th>Date &amp; Time</th>
                        <th>Initiated By</th>
                        <th>Attended By</th>
                        <th>Description</th>
                        <th>Attachment</th>
                        <th>Change Request</th>
                        <th>Created</th>
                        <th style="width: 110px;" class="text-center">Options</th>
                    </tr>
                </thead>
                <tbody id="momTbody">
                    <!-- Record 1 -->
                    <tr data-id="1">
                        <td class="text-center text-secondary small">1</td>
                        <td>
                            <a href="#" class="badge bg-light text-dark border px-2 py-1 text-decoration-none font-monospace" data-momdoc="1">
                                MOM-20260610-005
                            </a>
                        </td>
                        <td class="fw-semibold text-dark small">GODREJ</td>
                        <td class="text-secondary small">GHARUDA book</td>
                        <td><span class="fw-semibold text-dark small">GHARUDA Electrical Work Project</span></td>
                        <td class="text-secondary small">10-06-2026 09:00</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#d97706;" title="Madhu S">MS</span>
                                <span class="small text-dark">Madhu S</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#7c3aed;" title="Akash Kumar">AK</span>
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#2563eb;" title="ARUN KUMAR">AK</span>
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#0ca308;" title="GHARUDA TESTER">GT</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-secondary small text-truncate" style="max-width: 220px;" title="Discussion regarding project installation dates, electrical wiring specifications, and safety clearances.">
                                Discussion regarding project installation dates, electrical wiring specifications, and safety clearances.
                            </div>
                        </td>
                        <td><span class="text-muted small">&mdash;</span></td>
                        <td><span class="text-muted small">&mdash;</span></td>
                        <td class="text-secondary small">10-06-2026</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" title="Edit" data-momact="edit" data-id="1"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-outline-success" title="View PDF" data-momact="pdf" data-id="1"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="btn btn-outline-danger" title="Delete" data-momact="del" data-id="1"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Record 2 -->
                    <tr data-id="2">
                        <td class="text-center text-secondary small">2</td>
                        <td>
                            <a href="#" class="badge bg-light text-dark border px-2 py-1 text-decoration-none font-monospace" data-momdoc="2">
                                MOM-20260610-4C7A
                            </a>
                        </td>
                        <td class="fw-semibold text-dark small">Abcd c</td>
                        <td class="text-secondary small">Check and Charge</td>
                        <td><span class="fw-semibold text-dark small">Direct Visit</span></td>
                        <td class="text-secondary small">06-05-2026 09:00</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#dc2626;" title="ram krishnan">RK</span>
                                <span class="small text-dark">ram krishnan</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#0891b2;" title="Abarna Devi">AD</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-secondary small text-truncate" style="max-width: 220px;" title="Direct customer site review and status review with site team.">
                                Direct customer site review and status review with site team.
                            </div>
                        </td>
                        <td><span class="text-muted small">&mdash;</span></td>
                        <td><span class="text-muted small">&mdash;</span></td>
                        <td class="text-secondary small">10-06-2026</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" title="Edit" data-momact="edit" data-id="2"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-outline-success" title="View PDF" data-momact="pdf" data-id="2"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="btn btn-outline-danger" title="Delete" data-momact="del" data-id="2"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Record 3 -->
                    <tr data-id="3">
                        <td class="text-center text-secondary small">3</td>
                        <td>
                            <a href="#" class="badge bg-light text-dark border px-2 py-1 text-decoration-none font-monospace" data-momdoc="3">
                                MOMCP20260612-002
                            </a>
                        </td>
                        <td class="fw-semibold text-dark small">GHARUDA soft</td>
                        <td class="text-secondary small">Construction project</td>
                        <td><span class="fw-semibold text-dark small">REG: Mag Tech security management</span></td>
                        <td class="text-secondary small">13-12-2025 14:00</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#7c3aed;" title="gharuda SOFTWARE">GS</span>
                                <span class="small text-dark">gharuda SOFTWARE</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#2563eb;" title="ASHISH">AS</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-secondary small text-truncate" style="max-width: 220px;" title="The following requirements have been discussed. GHARUDA Software Technology Team handled the scope breakdown.">
                                Requirements discussed. GHARUDA Software Team handled scope breakdown.
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border small"><i class="bi bi-paperclip me-1"></i>mom_178...</span>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis small">2 CRs Pending</span>
                        </td>
                        <td class="text-secondary small">12-06-2026</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" title="Edit" data-momact="edit" data-id="3"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-outline-success" title="View PDF" data-momact="pdf" data-id="3"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="btn btn-outline-danger" title="Delete" data-momact="del" data-id="3"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Record 4 -->
                    <tr data-id="4">
                        <td class="text-center text-secondary small">4</td>
                        <td>
                            <a href="#" class="badge bg-light text-dark border px-2 py-1 text-decoration-none font-monospace" data-momdoc="4">
                                MOM-20260714-8F12
                            </a>
                        </td>
                        <td class="fw-semibold text-dark small">Raja Enterprises</td>
                        <td class="text-secondary small">GHARUDA Electrical Project</td>
                        <td><span class="fw-semibold text-dark small">Test Appointment</span></td>
                        <td class="text-secondary small">14-07-2026 10:00</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#d97706;" title="Madhu S">MS</span>
                                <span class="small text-dark">Madhu S</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#7c3aed;" title="Akash Kumar">AK</span>
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#d97706;" title="Madhu S">MS</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-secondary small text-truncate" style="max-width: 220px;" title="Detailed technical walkthrough on CRM integration and database schema migration.">
                                Detailed technical walkthrough on CRM integration.
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border small"><i class="bi bi-paperclip me-1"></i>notes_rev2.pdf</span>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-success-subtle text-success small">1 CR Done</span>
                        </td>
                        <td class="text-secondary small">14-07-2026</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" title="Edit" data-momact="edit" data-id="4"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-outline-success" title="View PDF" data-momact="pdf" data-id="4"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="btn btn-outline-danger" title="Delete" data-momact="del" data-id="4"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Record 5 -->
                    <tr data-id="5">
                        <td class="text-center text-secondary small">5</td>
                        <td>
                            <a href="#" class="badge bg-light text-dark border px-2 py-1 text-decoration-none font-monospace" data-momdoc="5">
                                MOM-20260802-9A4B
                            </a>
                        </td>
                        <td class="fw-semibold text-dark small">GHARUDA Tech</td>
                        <td class="text-secondary small">GHARUDA book</td>
                        <td><span class="fw-semibold text-dark small">Site Survey Discussion</span></td>
                        <td class="text-secondary small">02-08-2026 15:30</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#dc2626;" title="ram krishnan">RK</span>
                                <span class="small text-dark">ram krishnan</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#2563eb;" title="ARUN KUMAR">AK</span>
                                <span class="badge rounded-circle text-white p-2 d-inline-flex align-items-center justify-content-center" style="width:26px;height:26px;background:#0891b2;" title="Abarna Devi">AD</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-secondary small text-truncate" style="max-width: 220px;" title="Site survey finalized. Cable routing and network rack placement agreed upon by both teams.">
                                Site survey finalized. Cable routing and network placement agreed upon.
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border small"><i class="bi bi-paperclip me-1"></i>survey_ghr.pdf</span>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis small">1 CR Pending</span>
                        </td>
                        <td class="text-secondary small">02-08-2026</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" title="Edit" data-momact="edit" data-id="5"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-outline-success" title="View PDF" data-momact="pdf" data-id="5"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="btn btn-outline-danger" title="Delete" data-momact="del" data-id="5"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white py-3 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
            <span class="text-secondary small">Showing 1 to 5 of 5 entries</span>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</div>

<!-- =========================================================================
     NEW / EDIT MOM FULLSCREEN MODAL
     ========================================================================= -->
<div class="modal fade" id="momNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header border-bottom bg-light-subtle">
                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-journal-text me-2 text-primary"></i><span id="momModalTitle">New MOM</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Document Number <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="momDocNo" readonly placeholder="Auto-generated">
                            <button type="button" class="btn btn-outline-secondary" id="momDocRegen" title="Regenerate number"><i class="bi bi-arrow-repeat"></i></button>
                        </div>
                        <div class="small text-muted mt-1">Auto-generated. Regenerates on demand.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Customer Name <span class="text-danger">*</span></label>
                        <select class="form-select select2" id="momCustomer" data-placeholder="-- Select Customer --">
                            <option value=""></option>
                            <option>GODREJ</option>
                            <option>Raja Enterprises</option>
                            <option>GHARUDA soft</option>
                            <option>Abcd c</option>
                            <option>GHARUDA Software Technology</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Project Name <span class="text-danger">*</span></label>
                        <select class="form-select select2" id="momProject" data-placeholder="-- Select Project --">
                            <option value=""></option>
                            <option>GHARUDA book</option>
                            <option>Check and Charge</option>
                            <option>Construction project</option>
                            <option>GHARUDA Electrical Work Project</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Appointment Subject <span class="text-danger">*</span></label>
                        <select class="form-select select2" id="momApptSel" data-placeholder="-- Select Appointment --">
                            <option value=""></option>
                            <option>GHARUDA Electrical Work Project</option>
                            <option>Direct Visit</option>
                            <option>REG: Mag Tech security management</option>
                            <option>Test Appointment</option>
                            <option>Site Survey Discussion</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Appointment Date &amp; Time</label>
                        <input type="text" class="form-control" id="momDateTime" readonly placeholder="Auto-filled on appointment select">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary">Initiated By <span class="text-danger">*</span></label>
                        <select class="form-select select2" id="momInitiated" data-placeholder="-- Select Staff --">
                            <option value=""></option>
                            <option selected>gharuda SOFTWARE</option>
                            <option>Madhu S</option>
                            <option>ram krishnan</option>
                            <option>GHARUDA SOFTWARE</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-semibold text-secondary">Attended By</label>
                        <select class="form-select select2" id="momAttendees" multiple data-placeholder="-- Select Attendees --">
                            <option>Akash Kumar</option>
                            <option>ARUN KUMAR</option>
                            <option>GHARUDA TESTER</option>
                            <option>Abarna Devi</option>
                            <option>ASHISH</option>
                            <option>Madhu S</option>
                            <option>ram krishnan</option>
                        </select>
                    </div>
                </div>

                <!-- Attendee Details (Customer Side) -->
                <div class="mt-4">
                    <label class="form-label fw-bold small text-dark text-uppercase">Attendee Details (Customer Side)</label>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm align-middle mb-2">
                            <thead class="table-light text-secondary small">
                                <tr>
                                    <th style="width:22%;">Customer Name</th>
                                    <th style="width:18%;">Department</th>
                                    <th style="width:18%;">Designation</th>
                                    <th style="width:18%;">Email</th>
                                    <th style="width:16%;">Mobile</th>
                                    <th style="width:8%;text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="momAttBody">
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" placeholder="Name"></td>
                                    <td><input type="text" class="form-control form-control-sm" placeholder="Department"></td>
                                    <td><input type="text" class="form-control form-control-sm" placeholder="Designation"></td>
                                    <td><input type="email" class="form-control form-control-sm" placeholder="Email"></td>
                                    <td><input type="text" class="form-control form-control-sm" placeholder="Mobile"></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm rounded-circle p-1" title="Remove" style="width:28px;height:28px;"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" id="momAttAdd" title="Add attendee row">
                        <i class="bi bi-plus-lg me-1"></i>Add Row
                    </button>
                </div>

                <!-- Description (Quill) -->
                <div class="mt-4">
                    <label class="form-label fw-bold small text-dark text-uppercase">Description &amp; Meeting Minutes</label>
                    <div class="border rounded-3 p-1 bg-white">
                        <div id="momQuill" style="min-height: 160px;"></div>
                    </div>
                </div>

                <!-- Attachment -->
                <div class="mt-4">
                    <label class="form-label fw-bold small text-dark text-uppercase">Attachment</label>
                    <input type="file" class="form-control" id="momAttachment" style="max-width:460px;">
                    <div class="small text-muted mt-1">Upload relevant documentation (PDF, DOC, image, etc.)</div>
                </div>

                <!-- Change Request Rows -->
                <div class="mt-4">
                    <label class="form-label fw-bold small text-dark text-uppercase">Change Requests</label>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm align-middle mb-2">
                            <thead class="table-light text-secondary small">
                                <tr>
                                    <th style="width:32%;">Milestone</th>
                                    <th style="width:40%;">Task</th>
                                    <th style="width:20%;">Status</th>
                                    <th style="width:8%;text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="momCrBody">
                                <tr>
                                    <td>
                                        <select class="form-select form-select-sm select2" data-placeholder="-- Select Milestone --">
                                            <option value="">-- Select Milestone --</option>
                                            <option>Founder</option>
                                            <option>Beam</option>
                                            <option>Design</option>
                                            <option>Handover</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control form-control-sm" placeholder="Task description"></td>
                                    <td>
                                        <select class="form-select form-select-sm select2" data-placeholder="Status">
                                            <option selected>Pending</option>
                                            <option>Done</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm rounded-circle p-1" title="Remove" style="width:28px;height:28px;"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm rounded-pill" id="momCrAdd" title="Add change request row">
                        <i class="bi bi-plus-lg me-1"></i>Add Row
                    </button>
                </div>
            </div>
            <div class="modal-footer border-top bg-light-subtle">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary px-4" id="momSubmitBtn"><i class="bi bi-save me-1"></i>Save MOM</button>
            </div>
        </div>
    </div>
</div>

<!-- =========================================================================
     MOM DETAIL MODAL (Centered & Scrollable)
     ========================================================================= -->
<div class="modal fade" id="momDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content border-0 shadow rounded-3">
            <div class="modal-header border-bottom bg-light-subtle">
                <div>
                    <h5 class="modal-title fw-bold text-dark" id="momDTitle">MOM Details</h5>
                    <small class="text-secondary" id="momDSub">&mdash;</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="p-2 border rounded-3 bg-light-subtle">
                            <span class="text-secondary small d-block">Document No</span>
                            <span class="fw-bold text-dark small" id="momDDoc">&mdash;</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-2 border rounded-3 bg-light-subtle">
                            <span class="text-secondary small d-block">Customer</span>
                            <span class="fw-bold text-dark small" id="momDCustomer">&mdash;</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-2 border rounded-3 bg-light-subtle">
                            <span class="text-secondary small d-block">Project</span>
                            <span class="fw-bold text-dark small" id="momDProject">&mdash;</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-2 border rounded-3 bg-light-subtle">
                            <span class="text-secondary small d-block">Date &amp; Time</span>
                            <span class="fw-bold text-dark small" id="momDDateTime">&mdash;</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-2 border rounded-3 bg-light-subtle">
                            <span class="text-secondary small d-block">Initiated By</span>
                            <span class="fw-bold text-dark small" id="momDInitiated">&mdash;</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-2 border rounded-3 bg-light-subtle">
                            <span class="text-secondary small d-block">Attended By</span>
                            <span class="fw-bold text-dark small" id="momDAttendees">&mdash;</span>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-dark small text-uppercase mb-2">Customer-Side Attendees</h6>
                <div id="momDAttRows" class="mb-4"></div>

                <h6 class="fw-bold text-dark small text-uppercase mb-2">Discussion Notes</h6>
                <div class="p-3 bg-light rounded-3 text-secondary small mb-4" id="momDDesc">&mdash;</div>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 pt-2 border-top">
                    <div>
                        <span class="text-secondary small me-2">Attachment:</span>
                        <span id="momDAttachment" class="small fw-semibold">&mdash;</span>
                    </div>
                    <div>
                        <span class="text-secondary small me-2">Change Requests:</span>
                        <span id="momDCR" class="small">&mdash;</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top bg-light-subtle">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/quill-editor.js"></script>
<script>
    (function() {
        'use strict';

        /* ---------- Helpers ---------- */
        var pad = function(n) { return String(n).padStart(2, '0'); };
        function fmtDMY(d) { return pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear(); }

        var TODAY = new Date();
        var todayEl = document.getElementById('momToday');
        if (todayEl) todayEl.textContent = fmtDMY(TODAY);

        /* ---------- Data Records (for Modals & PDF) ---------- */
        var momPending = [
            { id: 501, subject: 'Test Appointment', customer: 'Raja Enterprises', when: '13-07-2026 10:00', mode: 'DEV - Online' },
            { id: 502, subject: 'Site Survey Discussion', customer: 'GODREJ', when: '21-07-2026 15:30', mode: 'Onsite' }
        ];

        var momData = [
            {
                id: 1, doc: 'MOM-20260610-005', customer: 'GODREJ', project: 'GHARUDA book',
                subject: 'GHARUDA Electrical Work Project', when: '10-06-2026 09:00',
                initiated: 'Madhu S', attendees: ['Akash Kumar', 'ARUN KUMAR', 'GHARUDA TESTER'],
                desc: 'Discussion regarding project installation dates, electrical wiring specifications, and safety clearances.', attachment: '', crs: [], created: '10-06-2026 19:10:24',
                attendeeDetails: []
            },
            {
                id: 2, doc: 'MOM-20260610-4C7A', customer: 'Abcd c', project: 'Check and Charge',
                subject: 'Direct Visit', when: '06-05-2026 09:00',
                initiated: 'ram krishnan', attendees: ['Abarna Devi'],
                desc: 'Direct customer site review and status review with site team.', attachment: '', crs: [], created: '10-06-2026 19:03:12',
                attendeeDetails: []
            },
            {
                id: 3, doc: 'MOMCP20260612-002', momcp: true, customer: 'GHARUDA soft', project: 'Construction project',
                subject: 'REG: Mag Tech security management', when: '13-12-2025 14:00',
                initiated: 'gharuda SOFTWARE', attendees: ['ASHISH'],
                desc: 'The following requirements have been discussed. GHARUDA Software Technology Team handled the scope breakdown.',
                attachment: 'mom_1781256060_6a2bc.pdf', crs: [
                    { title: 'Founder · INCO TERMS SHOULD COME IN MAST…', status: 'Pending' },
                    { title: 'Beam · FOR PAYMENT TERMS · NEED A DEF…', status: 'Pending' }
                ],
                attendeeDetails: [
                    { name: 'Rajesh Kannan', dept: 'Operations', desig: 'General Manager', email: 'rajesh@gharuda.com', mobile: '9840123456' }
                ],
                created: '12-06-2026 14:51:00'
            },
            {
                id: 4, doc: 'MOM-20260714-8F12', customer: 'Raja Enterprises', project: 'GHARUDA Electrical Work Project',
                subject: 'Test Appointment', when: '14-07-2026 10:00',
                initiated: 'Madhu S', attendees: ['Akash Kumar', 'Madhu S'],
                desc: 'Detailed technical walkthrough on CRM integration and database schema migration.',
                attachment: 'integration_notes_rev2.pdf', crs: [
                    { title: 'Design · Responsive UI Layout Fixes', status: 'Done' }
                ],
                attendeeDetails: [],
                created: '14-07-2026 11:45:10'
            },
            {
                id: 5, doc: 'MOM-20260802-9A4B', customer: 'GHARUDA Software Technology', project: 'GHARUDA book',
                subject: 'Site Survey Discussion', when: '02-08-2026 15:30',
                initiated: 'ram krishnan', attendees: ['ARUN KUMAR', 'Abarna Devi', 'ASHISH'],
                desc: 'Site survey finalized. Cable routing and network rack placement agreed upon by both teams.',
                attachment: 'site_survey_ghr.pdf', crs: [
                    { title: 'Handover · Final signoff document draft', status: 'Pending' }
                ],
                attendeeDetails: [],
                created: '02-08-2026 17:15:30'
            }
        ];

        /* ---------- Pending row click ---------- */
        var pendingRow = document.getElementById('momPendingRow');
        if (pendingRow) {
            pendingRow.addEventListener('click', function(e) {
                var btn = e.target.closest('[data-pendingid]');
                if (!btn) return;
                var appt = momPending.filter(function(a) { return a.id === Number(btn.getAttribute('data-pendingid')); })[0];
                openModal(appt);
            });
        }

        /* ---------- New MOM modal ---------- */
        var currentAppt = null;
        var editId = null;
        var momQuill = null;

        function genDocNo() {
            var now = new Date();
            return 'MOM' + now.getFullYear() + pad(now.getMonth() + 1) + pad(now.getDate()) + '-' +
                Math.random().toString(16).slice(2, 6).toUpperCase();
        }

        function initMomQuill() {
            if (momQuill || typeof Quill === 'undefined') return;
            momQuill = new Quill('#momQuill', {
                theme: 'snow',
                placeholder: 'Write meeting minutes / discussion points here...',
                modules: {
                    toolbar: [
                        [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                        ['bold', 'italic', 'underline'],
                        [{ align: [] }],
                        [{ list: 'bullet' }, { list: 'ordered' }],
                        ['image', 'link'],
                        ['clean']
                    ]
                }
            });
        }

        function initModalSelects() {
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('#momNewModal .select2').each(function() {
                    var $this = $(this);
                    if (!$this.hasClass("select2-hidden-accessible")) {
                        $this.select2({
                            dropdownParent: $('#momNewModal'),
                            width: '100%',
                            placeholder: $this.attr('data-placeholder') || ''
                        });
                    }
                });
            }
        }

        var newModalEl = document.getElementById('momNewModal');
        if (newModalEl) {
            newModalEl.addEventListener('shown.bs.modal', function() {
                initMomQuill();
                initModalSelects();
            });
        }

        var apptFillMap = {
            'GHARUDA Electrical Work Project': '10-06-2026 09:00',
            'Direct Visit': '06-05-2026 09:00',
            'REG: Mag Tech security management': '13-12-2025 14:00',
            'Test Appointment': '13-07-2026 10:00',
            'Site Survey Discussion': '21-07-2026 15:30'
        };

        var apptSel = document.getElementById('momApptSel');
        if (apptSel) {
            apptSel.addEventListener('change', function() {
                var dtInput = document.getElementById('momDateTime');
                if (dtInput) dtInput.value = apptFillMap[this.value] || '';
            });
        }

        var regenBtn = document.getElementById('momDocRegen');
        if (regenBtn) {
            regenBtn.addEventListener('click', function() {
                var docInput = document.getElementById('momDocNo');
                if (docInput) docInput.value = genDocNo();
            });
        }

        function attRowHtml() {
            return '<tr>' +
                '<td><input type="text" class="form-control form-control-sm" placeholder="Name"></td>' +
                '<td><input type="text" class="form-control form-control-sm" placeholder="Department"></td>' +
                '<td><input type="text" class="form-control form-control-sm" placeholder="Designation"></td>' +
                '<td><input type="email" class="form-control form-control-sm" placeholder="Email"></td>' +
                '<td><input type="text" class="form-control form-control-sm" placeholder="Mobile"></td>' +
                '<td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm rounded-circle p-1 mom-del-row" title="Remove" style="width:28px;height:28px;"><i class="bi bi-trash"></i></button></td>' +
                '</tr>';
        }

        var attAddBtn = document.getElementById('momAttAdd');
        if (attAddBtn) {
            attAddBtn.addEventListener('click', function() {
                var body = document.getElementById('momAttBody');
                if (body) body.insertAdjacentHTML('beforeend', attRowHtml());
            });
        }

        var attBody = document.getElementById('momAttBody');
        if (attBody) {
            attBody.addEventListener('click', function(e) {
                var btn = e.target.closest('.mom-del-row');
                if (btn) btn.closest('tr').remove();
            });
        }

        function crRowHtml() {
            return '<tr>' +
                '<td><select class="form-select form-select-sm select2" data-placeholder="-- Select Milestone --"><option value="">-- Select Milestone --</option><option>Founder</option><option>Beam</option><option>Design</option><option>Handover</option></select></td>' +
                '<td><input type="text" class="form-control form-control-sm" placeholder="Task description"></td>' +
                '<td><select class="form-select form-select-sm select2" data-placeholder="Status"><option selected>Pending</option><option>Done</option></select></td>' +
                '<td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm rounded-circle p-1 mom-del-row" title="Remove" style="width:28px;height:28px;"><i class="bi bi-trash"></i></button></td>' +
                '</tr>';
        }

        var crAddBtn = document.getElementById('momCrAdd');
        if (crAddBtn) {
            crAddBtn.addEventListener('click', function() {
                var body = document.getElementById('momCrBody');
                if (body) {
                    body.insertAdjacentHTML('beforeend', crRowHtml());
                    initModalSelects();
                }
            });
        }

        var crBody = document.getElementById('momCrBody');
        if (crBody) {
            crBody.addEventListener('click', function(e) {
                var btn = e.target.closest('.mom-del-row');
                if (btn) btn.closest('tr').remove();
            });
        }

        function resetMomForm() {
            var docEl = document.getElementById('momDocNo'); if (docEl) docEl.value = '';
            var dtEl = document.getElementById('momDateTime'); if (dtEl) dtEl.value = '';
            var apEl = document.getElementById('momApptSel'); if (apEl) apEl.value = '';
            var abEl = document.getElementById('momAttBody'); if (abEl) abEl.innerHTML = attRowHtml();
            var cbEl = document.getElementById('momCrBody'); if (cbEl) cbEl.innerHTML = crRowHtml();
            if (momQuill) momQuill.root.innerHTML = '';
            var attachInput = document.getElementById('momAttachment');
            if (attachInput) attachInput.value = '';
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('#momNewModal .select2').each(function() {
                    if ($(this).hasClass("select2-hidden-accessible")) {
                        $(this).val(null).trigger('change');
                    }
                });
            }
            initModalSelects();
        }

        function selectOrAdd(selEl, value) {
            if (!selEl || !value) return;
            if (!Array.from(selEl.options).some(function(o) { return o.text === value; })) {
                var o = document.createElement('option');
                o.textContent = value;
                selEl.appendChild(o);
            }
            if (typeof $ !== 'undefined' && $.fn.select2) $(selEl).val(value).trigger('change');
            else selEl.value = value;
        }

        function fillAttRows(details) {
            var html = (details || []).map(function(a) {
                return '<tr>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Name" value="' + (a.name || '') + '"></td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Department" value="' + (a.dept || '') + '"></td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Designation" value="' + (a.desig || '') + '"></td>' +
                    '<td><input type="email" class="form-control form-control-sm" placeholder="Email" value="' + (a.email || '') + '"></td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Mobile" value="' + (a.mobile || '') + '"></td>' +
                    '<td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm rounded-circle p-1 mom-del-row" title="Remove" style="width:28px;height:28px;"><i class="bi bi-trash"></i></button></td>' +
                    '</tr>';
            }).join('');
            var body = document.getElementById('momAttBody');
            if (body) body.innerHTML = html || attRowHtml();
        }

        function fillCrRows(crs) {
            var html = (crs || []).map(function(cr) {
                var parts = String(cr.title || '').split(' · ');
                var task = parts.slice(1).join(' · ');
                return '<tr>' +
                    '<td><select class="form-select form-select-sm select2" data-placeholder="-- Select Milestone --"><option value="">-- Select Milestone --</option><option>Founder</option><option>Beam</option><option>Design</option><option>Handover</option></select></td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Task" value="' + task + '"></td>' +
                    '<td><select class="form-select form-select-sm select2" data-placeholder="Status"><option selected>Pending</option><option>Done</option></select></td>' +
                    '<td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm rounded-circle p-1 mom-del-row" title="Remove" style="width:28px;height:28px;"><i class="bi bi-trash"></i></button></td>' +
                    '</tr>';
            }).join('');
            var body = document.getElementById('momCrBody');
            if (body) body.innerHTML = html || crRowHtml();
            var rows = document.querySelectorAll('#momCrBody tr');
            (crs || []).forEach(function(cr, i) {
                var tr = rows[i];
                if (!tr) return;
                var parts = String(cr.title || '').split(' · ');
                var mSel = tr.querySelector('select');
                var sSel = tr.querySelectorAll('select')[1];
                if (mSel && parts[0]) {
                    if (!Array.from(mSel.options).some(function(o) { return o.text === parts[0]; })) {
                        var o = document.createElement('option');
                        o.textContent = parts[0];
                        mSel.appendChild(o);
                    }
                    mSel.value = parts[0];
                }
                if (sSel) sSel.value = cr.status || 'Pending';
            });
            initModalSelects();
        }

        function openModal(appt) {
            currentAppt = appt || null;
            editId = null;
            resetMomForm();
            var titleEl = document.getElementById('momModalTitle');
            if (titleEl) titleEl.textContent = 'New MOM';
            var docEl = document.getElementById('momDocNo');
            if (docEl) docEl.value = genDocNo();
            if (appt) {
                selectOrAdd(document.getElementById('momCustomer'), appt.customer);
                selectOrAdd(document.getElementById('momApptSel'), appt.subject);
                var dtEl = document.getElementById('momDateTime');
                if (dtEl) dtEl.value = appt.when;
            }
            bootstrap.Modal.getOrCreateInstance(document.getElementById('momNewModal')).show();
        }

        function openEdit(rec) {
            currentAppt = null;
            editId = rec.id;
            resetMomForm();
            var titleEl = document.getElementById('momModalTitle');
            if (titleEl) titleEl.textContent = 'Edit MOM';
            var docEl = document.getElementById('momDocNo');
            if (docEl) docEl.value = rec.doc;
            selectOrAdd(document.getElementById('momCustomer'), rec.customer);
            selectOrAdd(document.getElementById('momProject'), rec.project);
            selectOrAdd(document.getElementById('momApptSel'), rec.subject);
            var dtEl = document.getElementById('momDateTime');
            if (dtEl) dtEl.value = rec.when;
            selectOrAdd(document.getElementById('momInitiated'), rec.initiated);
            var attSel = document.getElementById('momAttendees');
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $(attSel).val(rec.attendees).trigger('change');
            } else if (attSel) {
                Array.from(attSel.options).forEach(function(o) {
                    o.selected = rec.attendees.indexOf(o.text) !== -1;
                });
            }
            if (momQuill && rec.desc) {
                momQuill.root.innerHTML = '<p>' + rec.desc.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/\n/g, '</p><p>') + '</p>';
            }
            fillAttRows(rec.attendeeDetails || []);
            fillCrRows(rec.crs || []);
            bootstrap.Modal.getOrCreateInstance(document.getElementById('momNewModal')).show();
        }

        var newBtn = document.getElementById('momNewBtn');
        if (newBtn) {
            newBtn.addEventListener('click', function() {
                openModal(null);
            });
        }

        var submitBtn = document.getElementById('momSubmitBtn');
        if (submitBtn) {
            submitBtn.addEventListener('click', function() {
                var cust = document.getElementById('momCustomer').value;
                var proj = document.getElementById('momProject').value;
                var apptSubj = document.getElementById('momApptSel').value;
                var initiated = document.getElementById('momInitiated').value;
                if (!cust || !proj || !apptSubj || !initiated) {
                    alert('Please fill all the required fields.');
                    return;
                }
                alert('MOM saved successfully!');
                bootstrap.Modal.getOrCreateInstance(document.getElementById('momNewModal')).hide();
            });
        }

        /* ---------- Table Actions Delegation ---------- */
        var tableEl = document.getElementById('momTable');
        if (tableEl) {
            tableEl.addEventListener('click', function(e) {
                var docPill = e.target.closest('[data-momdoc]');
                if (docPill) {
                    var dId = Number(docPill.getAttribute('data-momdoc'));
                    var dRec = momData.filter(function(r) { return r.id === dId; })[0];
                    if (dRec) openDetail(dRec);
                    return;
                }
                var actEl = e.target.closest('[data-momact]');
                if (!actEl) return;
                var act = actEl.getAttribute('data-momact');
                var id = Number(actEl.getAttribute('data-id'));
                var rec = momData.filter(function(r) { return r.id === id; })[0];
                if (!rec) return;

                if (act === 'edit') {
                    openEdit(rec);
                } else if (act === 'pdf') {
                    buildMomPdf(rec);
                } else if (act === 'del') {
                    if (confirm('Delete this MOM?')) {
                        var tr = actEl.closest('tr');
                        if (tr) tr.remove();
                    }
                }
            });
        }

        /* ---------- Detail modal ---------- */
        function openDetail(rec) {
            document.getElementById('momDTitle').textContent = rec.subject;
            document.getElementById('momDSub').textContent = rec.project + ' · ' + rec.customer;
            document.getElementById('momDDoc').textContent = rec.doc;
            document.getElementById('momDCustomer').textContent = rec.customer;
            document.getElementById('momDProject').textContent = rec.project;
            document.getElementById('momDDateTime').textContent = rec.when;
            document.getElementById('momDInitiated').textContent = rec.initiated;
            document.getElementById('momDAttendees').textContent = (rec.attendees || []).join(', ');
            document.getElementById('momDAttachment').innerHTML = rec.attachment ?
                '<span class="badge bg-light text-dark border"><i class="bi bi-paperclip me-1"></i>' + rec.attachment + '</span>' : '&mdash;';
            document.getElementById('momDAttRows').innerHTML = (rec.attendeeDetails && rec.attendeeDetails.length) ?
                '<div class="table-responsive"><table class="table table-bordered table-sm align-middle"><thead class="table-light text-secondary small"><tr><th>Name</th><th>Department</th><th>Designation</th><th>Email</th><th>Mobile</th></tr></thead><tbody>' +
                rec.attendeeDetails.map(function(a) {
                    return '<tr><td>' + a.name + '</td><td>' + (a.dept || '—') + '</td><td>' + (a.desig || '—') + '</td><td>' + (a.email || '—') + '</td><td>' + (a.mobile || '—') + '</td></tr>';
                }).join('') + '</tbody></table></div>' :
                '<div class="small text-muted">No customer-side attendee details.</div>';
            document.getElementById('momDCR').innerHTML = (rec.crs && rec.crs.length) ?
                rec.crs.map(function(cr) {
                    var cls = cr.status === 'Pending' ? 'bg-warning-subtle text-warning-emphasis' : 'bg-success-subtle text-success';
                    return '<span class="badge rounded-pill ' + cls + ' me-1 mb-1">' + cr.title + '</span>';
                }).join(' ') : '&mdash;';
            document.getElementById('momDDesc').textContent = rec.desc || 'No discussion notes recorded.';
            bootstrap.Modal.getOrCreateInstance(document.getElementById('momDetailModal')).show();
        }

        /* ---------- MOM PDF (pdfMake — project green theme) ---------- */
        function buildMomPdf(rec) {
            if (typeof pdfMake === 'undefined') {
                alert('PDF library not loaded.');
                return;
            }
            var green = '#16a34a';
            var greenDark = '#0f7a38';
            var ink = '#111827';
            var muted = '#6b7280';
            var softGreen = '#e8f7ea';

            function secTitle(text) {
                return {
                    table: {
                        widths: [4, '*'],
                        body: [[
                            { text: '', fillColor: green },
                            { text: text, fontSize: 10.5, bold: true, color: ink, margin: [8, 1, 0, 1] }
                        ]]
                    },
                    layout: 'noBorders',
                    margin: [0, 0, 0, 6]
                };
            }

            var datePart = (rec.when || '').split(' ')[0] || '';
            var timePart = (rec.when || '').split(' ')[1] || '';

            var agendaSource = (rec.crs && rec.crs.length) ? rec.crs.map(function(cr) {
                var parts = String(cr.title || '').split(' · ');
                return {
                    task: parts.slice(1).join(' · ') || parts[0] || '',
                    presenter: rec.initiated || 'gharuda SOFTWARE',
                    status: cr.status || 'Pending',
                    milestone: parts[0] || '—'
                };
            }) : [
                { task: 'Scope & requirements walkthrough', presenter: rec.initiated || 'gharuda SOFTWARE', status: 'Done', milestone: 'Founder' },
                { task: 'Site requirements & constraints discussion', presenter: (rec.attendees && rec.attendees[0]) || 'gharuda SOFTWARE', status: 'In Progress', milestone: 'Beam' },
                { task: 'Timeline & delivery milestones review', presenter: 'gharuda SOFTWARE', status: 'Pending', milestone: 'Design' },
                { task: 'Next steps & action items assignment', presenter: (rec.attendees && rec.attendees[1]) || 'gharuda SOFTWARE', status: 'Pending', milestone: 'Design' }
            ];

            var statusStyle = function(s) {
                if (s === 'Done') return { text: s, color: '#15803d', bold: true, fillColor: '#ecfdf5', alignment: 'center' };
                if (s === 'In Progress') return { text: s, color: '#b45309', bold: true, fillColor: '#fef9c3', alignment: 'center' };
                return { text: s, color: '#b45309', bold: true, fillColor: '#fef3c7', alignment: 'center' };
            };

            var agendaRows = agendaSource.map(function(a, i) {
                var zebra = (i % 2 === 1) ? { fillColor: '#f7fbf7' } : {};
                return [
                    Object.assign({ text: a.task, color: ink, fontSize: 9.5 }, zebra),
                    Object.assign({ text: a.presenter, color: muted, fontSize: 9, alignment: 'center' }, zebra),
                    Object.assign({}, zebra, statusStyle(a.status)),
                    Object.assign({ text: a.milestone, color: muted, fontSize: 9, alignment: 'center' }, zebra)
                ];
            });

            var docDef = {
                pageSize: 'A4',
                pageMargins: [40, 0, 40, 40],
                content: [
                    {
                        table: {
                            widths: ['*'],
                            body: [[
                                {
                                    stack: [
                                        { text: 'MINUTES OF MEETING', color: '#ffffff', fontSize: 17, bold: true, characterSpacing: 1 },
                                        { text: rec.doc || '', color: '#d1fae5', fontSize: 10.5, bold: true, margin: [0, 4, 0, 0] }
                                    ],
                                    fillColor: greenDark,
                                    margin: [0, 18, 0, 18]
                                }
                            ]]
                        },
                        layout: 'noBorders',
                        margin: [-40, 0, -40, 18]
                    },
                    {
                        table: {
                            widths: ['*', '*'],
                            body: [[
                                {
                                    stack: [
                                        { text: 'DATE & TIME', fontSize: 8.5, bold: true, color: green, characterSpacing: .8 },
                                        { text: datePart, fontSize: 13, bold: true, color: ink, margin: [0, 3, 0, 0] },
                                        { text: timePart, fontSize: 10, color: muted, margin: [0, 2, 0, 0] }
                                    ],
                                    fillColor: softGreen,
                                    margin: [12, 10, 12, 10]
                                },
                                {
                                    stack: [
                                        { text: 'PROJECT', fontSize: 8.5, bold: true, color: green, characterSpacing: .8 },
                                        { text: rec.project || '—', fontSize: 13, bold: true, color: ink, margin: [0, 3, 0, 0] },
                                        { text: rec.customer || '', fontSize: 10, color: muted, margin: [0, 2, 0, 0] }
                                    ],
                                    fillColor: softGreen,
                                    margin: [12, 10, 12, 10]
                                }
                            ]]
                        },
                        layout: {
                            hLineWidth: function() { return 0; },
                            vLineWidth: function() { return 0; },
                            paddingLeft: function() { return 0; },
                            paddingRight: function() { return 0; },
                            paddingTop: function() { return 0; },
                            paddingBottom: function() { return 0; }
                        },
                        margin: [0, 0, 0, 14]
                    },
                    {
                        table: {
                            widths: [95, '*', 70, '*'],
                            body: [[
                                { text: 'Meeting Title:', fontSize: 9.5, bold: true, color: greenDark },
                                { text: rec.subject || '—', fontSize: 10.5, bold: true, color: ink },
                                { text: 'Customer:', fontSize: 9.5, bold: true, color: greenDark, alignment: 'right' },
                                { text: rec.customer || '—', fontSize: 10.5, bold: true, color: ink }
                            ],
                            [
                                { text: 'Initiated By:', fontSize: 9.5, bold: true, color: greenDark },
                                { text: rec.initiated || '—', fontSize: 10.5, color: ink },
                                { text: 'Created:', fontSize: 9.5, bold: true, color: greenDark, alignment: 'right' },
                                { text: rec.created || '—', fontSize: 10.5, color: ink }
                            ]]
                        },
                        layout: 'noBorders',
                        margin: [0, 0, 0, 12]
                    },
                    secTitle('Attendees'),
                    (function() {
                        var atts = rec.attendees || [];
                        var pillRows = [];
                        if (!atts.length) {
                            pillRows.push([{ text: 'No attendees recorded', color: muted, fontSize: 9.5, fillColor: softGreen, margin: [8, 6, 8, 6] }, { text: '', border: [false, false, false, false] }, { text: '', border: [false, false, false, false] }]);
                        } else {
                            for (var pi = 0; pi < atts.length; pi += 3) {
                                var chunk = atts.slice(pi, pi + 3).map(function(name) {
                                    return {
                                        text: name,
                                        fillColor: softGreen,
                                        color: greenDark,
                                        fontSize: 9.5,
                                        bold: true,
                                        margin: [8, 6, 8, 6]
                                    };
                                });
                                while (chunk.length < 3) chunk.push({ text: '', border: [false, false, false, false] });
                                pillRows.push(chunk);
                            }
                        }
                        return {
                            table: { widths: ['*', '*', '*'], body: pillRows },
                            layout: {
                                hLineWidth: function() { return 0; },
                                vLineWidth: function(i, node) { return i === 0 || i === node.table.body[0].length ? 0 : 4; },
                                vLineColor: function() { return '#ffffff'; },
                                paddingLeft: function() { return 0; },
                                paddingRight: function() { return 0; },
                                paddingTop: function() { return 0; },
                                paddingBottom: function() { return 0; }
                            },
                            margin: [0, 0, 0, 16]
                        };
                    })(),
                    rec.desc ? {
                        stack: [
                            secTitle('Discussion Notes'),
                            {
                                text: rec.desc,
                                fontSize: 9.5,
                                color: '#374151',
                                lineHeight: 1.45,
                                background: '#f8f9fa',
                                margin: [10, 8, 10, 8]
                            }
                        ],
                        margin: [0, 0, 0, 16]
                    } : { text: '', margin: [0, 0, 0, 4] },
                    secTitle('Agenda / Tasks'),
                    {
                        table: {
                            headerRows: 1,
                            widths: ['*', 95, 80, 85],
                            body: [
                                [
                                    { text: 'Agenda / Task', fillColor: greenDark, color: '#ffffff', fontSize: 9.5, bold: true, margin: [10, 6, 0, 6] },
                                    { text: 'Presenter', fillColor: greenDark, color: '#ffffff', fontSize: 9.5, bold: true, alignment: 'center', margin: [0, 6, 0, 6] },
                                    { text: 'Status', fillColor: greenDark, color: '#ffffff', fontSize: 9.5, bold: true, alignment: 'center', margin: [0, 6, 0, 6] },
                                    { text: 'Milestone', fillColor: greenDark, color: '#ffffff', fontSize: 9.5, bold: true, alignment: 'center', margin: [0, 6, 0, 6] }
                                ]
                            ].concat(agendaRows)
                        },
                        layout: {
                            hLineWidth: function(i) { return i === 0 ? 0 : .6; },
                            hLineColor: function() { return '#e5e7eb'; },
                            vLineWidth: function() { return 0; },
                            paddingTop: function() { return 5; },
                            paddingBottom: function() { return 5; }
                        },
                        margin: [0, 0, 0, 14]
                    },
                    (rec.attendeeDetails && rec.attendeeDetails.length) ? {
                        stack: [
                            secTitle('Customer Side Attendees'),
                            {
                                table: {
                                    headerRows: 1,
                                    widths: ['*', '*', '*', '*', '*'],
                                    body: [
                                        ['Name', 'Department', 'Designation', 'Email', 'Mobile'].map(function(h) {
                                            return { text: h, fillColor: softGreen, color: greenDark, fontSize: 9, bold: true, margin: [0, 5, 0, 5] };
                                        })
                                    ].concat(rec.attendeeDetails.map(function(a) {
                                        return [a.name || '', a.dept || '—', a.desig || '—', a.email || '—', a.mobile || '—'].map(function(v) {
                                            return { text: v, fontSize: 9, color: ink, margin: [0, 4, 0, 4] };
                                        });
                                    }))
                                },
                                layout: {
                                    hLineWidth: function(i) { return i === 0 ? 0 : .6; },
                                    hLineColor: function() { return '#e5e7eb'; },
                                    vLineWidth: function() { return 0; },
                                    paddingTop: function() { return 4; },
                                    paddingBottom: function() { return 4; }
                                }
                            }
                        ],
                        margin: [0, 0, 0, 10]
                    } : { text: '' },
                    {
                        canvas: [{ type: 'line', x1: 0, y1: 0, x2: 515, y2: 0, lineWidth: 1, lineColor: '#e5e7eb' }],
                        margin: [0, 6, 0, 8]
                    },
                    {
                        columns: [
                            { text: 'GHARUDA SOFTWARE · Minutes of Meeting', fontSize: 8.5, color: muted },
                            { text: 'Generated: ' + fmtDMY(new Date()), fontSize: 8.5, color: muted, alignment: 'right' }
                        ]
                    }
                ]
            };

            pdfMake.createPdf(docDef).open();
        }
    })();
</script>
<?php include 'footer.php'; ?>
