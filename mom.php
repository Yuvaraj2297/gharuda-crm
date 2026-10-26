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
                        <label class="form-label small fw-semibold text-secondary"><span class="text-danger">*</span> Document Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="momDocNo" readonly placeholder="Auto-generated">
                            <button type="button" class="btn btn-outline-secondary" id="momDocRegen" title="Regenerate number"><i class="bi bi-arrow-repeat"></i></button>
                        </div>
                        <div class="small text-muted mt-1">Auto-generated. Regenerates on demand.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary"><span class="text-danger">*</span> Customer Name</label>
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
                        <label class="form-label small fw-semibold text-secondary"><span class="text-danger">*</span> Project Name</label>
                        <select class="form-select select2" id="momProject" data-placeholder="-- Select Project --">
                            <option value=""></option>
                            <option>GHARUDA book</option>
                            <option>Check and Charge</option>
                            <option>Construction project</option>
                            <option>GHARUDA Electrical Work Project</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold text-secondary"><span class="text-danger">*</span> Appointment Subject</label>
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
                        <label class="form-label small fw-semibold text-secondary"><span class="text-danger">*</span> Initiated By</label>
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
<script src="./assets/js/pages/mom.js?v=<?php echo time(); ?>"></script>
<?php include 'footer.php'; ?>
