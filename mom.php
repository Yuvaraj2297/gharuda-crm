<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">
<link rel="stylesheet" href="./assets/css/quill-editor.css">
<link rel="stylesheet" href="./assets/css/mom.css">

<main class="mom-page">
    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Minutes of Meeting</h1>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <div class="mom-date-range">
                <i class="bi bi-calendar3 me-1"></i>Date: <span id="momToday">17-10-2026</span>
            </div>
            <div class="mom-pills d-flex align-items-center gap-2">
                <a href="appointments.php" class="btn btn-outline-secondary btn-sm"><i class="bi bi-calendar2-week me-1"></i>Appointments</a>
                <a href="past-meeting.php" class="btn btn-outline-secondary btn-sm"><i class="bi bi-calendar-check me-1"></i>Past Meeting</a>
                <a href="callbacks.php" class="btn btn-outline-secondary btn-sm"><i class="bi bi-telephone-forward me-1"></i>Callbacks</a>
            </div>
            <button type="button" class="btn btn-primary btn-sm" id="momNewBtn">
                <i class="bi bi-plus-lg me-1"></i>New MOM
            </button>
        </div>
    </div>

    <!-- ===== Pending MOM strip (finished appointments without MOM) ===== -->
    <div class="mom-pending-strip" id="momPendingStrip">
        <div class="mom-pending-head">
            <span class="pulse-dot"></span>
            Pending MOM — Finished Appointments (<span id="momPendingCount">2</span>)
        </div>
        <div class="mom-pending-row" id="momPendingRow">
            <div class="mom-appt-chip">
                <div class="mom-appt-info">
                    <span class="mom-appt-when">13-07-2026 10:00</span>
                    <span class="badge rounded-pill" style="background:#eef2ff;color:#4f46e5;font-size:9.5px;font-weight:800;margin-left:6px;vertical-align:middle;">DEV - Online</span>
                    <div class="mom-appt-title">Test Appointment</div>
                    <div class="mom-appt-meta"><i class="bi bi-building me-1"></i>Raja Enterprises</div>
                </div>
                <button type="button" class="mom-create-btn" data-pendingid="501"><i class="bi bi-plus-lg me-1"></i>Create MOM</button>
            </div>
            <div class="mom-appt-chip">
                <div class="mom-appt-info">
                    <span class="mom-appt-when">21-07-2026 15:30</span>
                    <span class="badge rounded-pill" style="background:#eef2ff;color:#4f46e5;font-size:9.5px;font-weight:800;margin-left:6px;vertical-align:middle;">Onsite</span>
                    <div class="mom-appt-title">Site Survey Discussion</div>
                    <div class="mom-appt-meta"><i class="bi bi-building me-1"></i>GODREJ</div>
                </div>
                <button type="button" class="mom-create-btn" data-pendingid="502"><i class="bi bi-plus-lg me-1"></i>Create MOM</button>
            </div>
        </div>
    </div>

    <!-- ===== Stat chips ===== -->
    <div class="row g-3 mb-3">
        <div class="col-xl-4 col-md-6">
            <div class="mom-stat">
                <span class="mom-stat-ico t-green"><i class="bi bi-journal-check"></i></span>
                <div>
                    <div class="mom-stat-val" id="momStatTotal">5</div>
                    <div class="mom-stat-lbl">Total MOMs</div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="mom-stat">
                <span class="mom-stat-ico t-amber"><i class="bi bi-hourglass-split"></i></span>
                <div>
                    <div class="mom-stat-val" id="momStatPending">2</div>
                    <div class="mom-stat-lbl">Pending MOMs (appointments)</div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="mom-stat">
                <span class="mom-stat-ico t-blue"><i class="bi bi-arrow-repeat"></i></span>
                <div>
                    <div class="mom-stat-val" id="momStatCR">3</div>
                    <div class="mom-stat-lbl">Open change requests</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== MOM list (jobtype.php table flow with datatable class) ===== -->
    <div class="card-custom p-0 overflow-hidden" id="momTableWrap">
        <!-- Table (toolbar + export + column visibility + pagination auto-created by datatable class via auto-master-table.js) -->
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="momTable" data-table-name="Minutes of Meeting">
                <thead>
                    <tr>
                        <th style="width: 60px;">S.No</th>
                        <th>Document Number</th>
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
                        <th style="width: 110px;">Options</th>
                    </tr>
                </thead>
                <tbody id="momTbody">
                    <tr data-id="1">
                        <td>1</td>
                        <td><a href="#" class="mom-doc-pill" data-momdoc="1" onclick="return false;" style="text-decoration:none;">MOM-20260610-005</a></td>
                        <td>GODREJ</td>
                        <td>GHARUDA book</td>
                        <td><span class="fw-bold" style="font-size:12px;">GHARUDA Electrical Work Project</span></td>
                        <td>10-06-2026 09:00</td>
                        <td><span class="mom-person"><span class="mom-av" style="background:#d97706;" title="Madhu S">MS</span>Madhu S</span></td>
                        <td>
                            <span class="mom-av-stack">
                                <span class="mom-av" style="background:#7c3aed;" title="Akash Kumar">AK</span>
                                <span class="mom-av" style="background:#2563eb;" title="ARUN KUMAR">AK</span>
                                <span class="mom-av" style="background:#0ca308;" title="GHARUDA TESTER">GT</span>
                            </span>
                        </td>
                        <td><div class="mom-desc">Discussion regarding project installation dates, electrical wiring specifications, and safety clearances.</div></td>
                        <td><span class="text-muted">—</span></td>
                        <td><span class="text-muted">—</span></td>
                        <td>10-06-2026 19:10:24</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="mom-mini-btn edit" title="Edit" data-momact="edit" data-id="1" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(53,100,224,.1);color:#3564e0;font-size:12.5px;cursor:pointer;"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="mom-mini-btn pdf" title="View PDF" data-momact="pdf" data-id="1" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(22,163,74,.1);color:#16a34a;font-size:12.5px;cursor:pointer;"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="mom-mini-btn del" title="Delete" data-momact="del" data-id="1" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(229,72,77,.1);color:#e5484d;font-size:12.5px;cursor:pointer;"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="2">
                        <td>2</td>
                        <td><a href="#" class="mom-doc-pill" data-momdoc="2" onclick="return false;" style="text-decoration:none;">MOM-20260610-4C7A</a></td>
                        <td>Abcd c</td>
                        <td>Check and Charge</td>
                        <td><span class="fw-bold" style="font-size:12px;">Direct Visit</span></td>
                        <td>06-05-2026 09:00</td>
                        <td><span class="mom-person"><span class="mom-av" style="background:#dc2626;" title="ram krishnan">RK</span>ram krishnan</span></td>
                        <td>
                            <span class="mom-av-stack">
                                <span class="mom-av" style="background:#0891b2;" title="Abarna Devi">AD</span>
                            </span>
                        </td>
                        <td><div class="mom-desc">Direct customer site review and status review with site team.</div></td>
                        <td><span class="text-muted">—</span></td>
                        <td><span class="text-muted">—</span></td>
                        <td>10-06-2026 19:03:12</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="mom-mini-btn edit" title="Edit" data-momact="edit" data-id="2" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(53,100,224,.1);color:#3564e0;font-size:12.5px;cursor:pointer;"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="mom-mini-btn pdf" title="View PDF" data-momact="pdf" data-id="2" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(22,163,74,.1);color:#16a34a;font-size:12.5px;cursor:pointer;"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="mom-mini-btn del" title="Delete" data-momact="del" data-id="2" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(229,72,77,.1);color:#e5484d;font-size:12.5px;cursor:pointer;"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="3">
                        <td>3</td>
                        <td><a href="#" class="mom-doc-pill momcp" data-momdoc="3" onclick="return false;" style="text-decoration:none;">MOMCP20260612-002</a></td>
                        <td>GHARUDA soft</td>
                        <td>Construction project</td>
                        <td><span class="fw-bold" style="font-size:12px;">REG: Mag Tech security management</span></td>
                        <td>13-12-2025 14:00</td>
                        <td><span class="mom-person"><span class="mom-av" style="background:#7c3aed;" title="gharuda SOFTWARE">GS</span>gharuda SOFTWARE</span></td>
                        <td>
                            <span class="mom-av-stack">
                                <span class="mom-av" style="background:#2563eb;" title="ASHISH">AS</span>
                            </span>
                        </td>
                        <td><div class="mom-desc">The following requirements have been discussed. GHARUDA Software Technology Team handled the scope breakdown.</div></td>
                        <td><span class="mom-attach"><i class="bi bi-paperclip"></i><span>mom_1781256060_6a2bc.pdf</span></span></td>
                        <td>
                            <div class="mom-cr">
                                <span class="mom-cr-chip pending" title="Founder · INCO TERMS SHOULD COME IN MAST…">Founder · INCO TERMS SHOULD COME IN MAST…</span>
                                <span class="mom-cr-chip pending" title="Beam · FOR PAYMENT TERMS · NEED A DEF…">Beam · FOR PAYMENT TERMS · NEED A DEF…</span>
                            </div>
                        </td>
                        <td>12-06-2026 14:51:00</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="mom-mini-btn edit" title="Edit" data-momact="edit" data-id="3" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(53,100,224,.1);color:#3564e0;font-size:12.5px;cursor:pointer;"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="mom-mini-btn pdf" title="View PDF" data-momact="pdf" data-id="3" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(22,163,74,.1);color:#16a34a;font-size:12.5px;cursor:pointer;"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="mom-mini-btn del" title="Delete" data-momact="del" data-id="3" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(229,72,77,.1);color:#e5484d;font-size:12.5px;cursor:pointer;"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="4">
                        <td>4</td>
                        <td><a href="#" class="mom-doc-pill" data-momdoc="4" onclick="return false;" style="text-decoration:none;">MOM-20260714-8F12</a></td>
                        <td>Raja Enterprises</td>
                        <td>GHARUDA Electrical Work Project</td>
                        <td><span class="fw-bold" style="font-size:12px;">Test Appointment</span></td>
                        <td>14-07-2026 10:00</td>
                        <td><span class="mom-person"><span class="mom-av" style="background:#d97706;" title="Madhu S">MS</span>Madhu S</span></td>
                        <td>
                            <span class="mom-av-stack">
                                <span class="mom-av" style="background:#7c3aed;" title="Akash Kumar">AK</span>
                                <span class="mom-av" style="background:#d97706;" title="Madhu S">MS</span>
                            </span>
                        </td>
                        <td><div class="mom-desc">Detailed technical walkthrough on CRM integration and database schema migration.</div></td>
                        <td><span class="mom-attach"><i class="bi bi-paperclip"></i><span>integration_notes_rev2.pdf</span></span></td>
                        <td>
                            <div class="mom-cr">
                                <span class="mom-cr-chip done" title="Design · Responsive UI Layout Fixes">Design · Responsive UI Layout Fixes</span>
                            </div>
                        </td>
                        <td>14-07-2026 11:45:10</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="mom-mini-btn edit" title="Edit" data-momact="edit" data-id="4" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(53,100,224,.1);color:#3564e0;font-size:12.5px;cursor:pointer;"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="mom-mini-btn pdf" title="View PDF" data-momact="pdf" data-id="4" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(22,163,74,.1);color:#16a34a;font-size:12.5px;cursor:pointer;"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="mom-mini-btn del" title="Delete" data-momact="del" data-id="4" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(229,72,77,.1);color:#e5484d;font-size:12.5px;cursor:pointer;"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="5">
                        <td>5</td>
                        <td><a href="#" class="mom-doc-pill" data-momdoc="5" onclick="return false;" style="text-decoration:none;">MOM-20260802-9A4B</a></td>
                        <td>GHARUDA Software Technology</td>
                        <td>GHARUDA book</td>
                        <td><span class="fw-bold" style="font-size:12px;">Site Survey Discussion</span></td>
                        <td>02-08-2026 15:30</td>
                        <td><span class="mom-person"><span class="mom-av" style="background:#dc2626;" title="ram krishnan">RK</span>ram krishnan</span></td>
                        <td>
                            <span class="mom-av-stack">
                                <span class="mom-av" style="background:#2563eb;" title="ARUN KUMAR">AK</span>
                                <span class="mom-av" style="background:#0891b2;" title="Abarna Devi">AD</span>
                                <span class="mom-av" style="background:#7c3aed;" title="ASHISH">AS</span>
                            </span>
                        </td>
                        <td><div class="mom-desc">Site survey finalized. Cable routing and network rack placement agreed upon by both teams.</div></td>
                        <td><span class="mom-attach"><i class="bi bi-paperclip"></i><span>site_survey_ghr.pdf</span></span></td>
                        <td>
                            <div class="mom-cr">
                                <span class="mom-cr-chip pending" title="Handover · Final signoff document draft">Handover · Final signoff document draft</span>
                            </div>
                        </td>
                        <td>02-08-2026 17:15:30</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="mom-mini-btn edit" title="Edit" data-momact="edit" data-id="5" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(53,100,224,.1);color:#3564e0;font-size:12.5px;cursor:pointer;"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="mom-mini-btn pdf" title="View PDF" data-momact="pdf" data-id="5" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(22,163,74,.1);color:#16a34a;font-size:12.5px;cursor:pointer;"><i class="bi bi-file-earmark-pdf"></i></button>
                                <button type="button" class="mom-mini-btn del" title="Delete" data-momact="del" data-id="5" style="width:28px;height:28px;border-radius:8px;border:none;background:rgba(229,72,77,.1);color:#e5484d;font-size:12.5px;cursor:pointer;"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- ===== New MOM Modal (fullscreen — reference image flow) ===== -->
<div class="modal fade" id="momNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="fw-bold mb-0" style="font-size:15.5px;"><i class="bi bi-journal-text me-2 text-primary"></i><span id="momModalTitle">New MOM</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Document Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control autofill" id="momDocNo" readonly placeholder="Auto-generated">
                            <button type="button" class="btn btn-outline-secondary" id="momDocRegen" title="Regenerate number"><i class="bi bi-arrow-repeat"></i></button>
                        </div>
                        <div class="small text-muted mt-1" style="font-size:11px;">Auto-generated. Regenerates when project is selected.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Customer Name</label>
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
                        <label class="form-label"><span style="color:#dc2626;">*</span> Project Name</label>
                        <select class="form-select select2" id="momProject" data-placeholder="-- Select Project --">
                            <option value=""></option>
                            <option>GHARUDA book</option>
                            <option>Check and Charge</option>
                            <option>Construction project</option>
                            <option>GHARUDA Electrical Work Project</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Appointment Subject</label>
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
                        <label class="form-label">Appointment Date &amp; Time</label>
                        <input type="text" class="form-control autofill" id="momDateTime" readonly placeholder="Auto-filled on appointment select">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Initiated By</label>
                        <select class="form-select select2" id="momInitiated" data-placeholder="-- Select Staff --">
                            <option value=""></option>
                            <option selected>gharuda SOFTWARE</option>
                            <option>Madhu S</option>
                            <option>ram krishnan</option>
                            <option>GHARUDA SOFTWARE</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Attended By</label>
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
                    <label class="form-label fw-bold">Attendee Details (Customer Side)</label>
                    <div class="table-responsive">
                        <table class="momx-table">
                            <thead>
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
                                    <td><input type="text" class="form-control" placeholder="Name"></td>
                                    <td><input type="text" class="form-control" placeholder="Department"></td>
                                    <td><input type="text" class="form-control" placeholder="Designation"></td>
                                    <td><input type="email" class="form-control" placeholder="Email"></td>
                                    <td><input type="text" class="form-control" placeholder="Mobile"></td>
                                    <td style="text-align:center;"><button type="button" class="momx-del-btn" title="Remove"><i class="bi bi-trash"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="momx-add-btn mt-2" id="momAttAdd" title="Add attendee row"><i class="bi bi-plus-lg"></i></button>
                </div>

                <!-- Description (Quill) -->
                <div class="mt-4">
                    <label class="form-label fw-bold">Description</label>
                    <div class="momx-quill-wrap">
                        <div id="momQuill"></div>
                    </div>
                </div>

                <!-- Attachment -->
                <div class="mt-4">
                    <label class="form-label fw-bold">Attachment</label>
                    <input type="file" class="form-control" id="momAttachment" style="max-width:460px;">
                    <div class="small text-muted mt-1" style="font-size:11px;">Upload a file (PDF, DOC, image, etc.)</div>
                </div>

                <!-- Change Request rows -->
                <div class="mt-4">
                    <label class="form-label fw-bold">Change Request</label>
                    <div class="table-responsive">
                        <table class="momx-table">
                            <thead>
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
                                        <select class="form-select select2" data-placeholder="-- Select Milestone --">
                                            <option value="">-- Select Milestone --</option>
                                            <option>Founder</option>
                                            <option>Beam</option>
                                            <option>Design</option>
                                            <option>Handover</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" placeholder="Task"></td>
                                    <td>
                                        <select class="form-select select2" data-placeholder="Status">
                                            <option selected>Pending</option>
                                            <option>Done</option>
                                        </select>
                                    </td>
                                    <td style="text-align:center;"><button type="button" class="momx-del-btn" title="Remove"><i class="bi bi-trash"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="momx-add-btn mt-2" id="momCrAdd" title="Add change request row"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="momSubmitBtn"><i class="bi bi-save me-1"></i>Save MOM</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== MOM Detail Modal ===== -->
<div class="modal fade" id="momDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="mom-d-head">
                <div>
                    <div class="mom-d-title" id="momDTitle">MOM</div>
                    <div class="mom-d-sub" id="momDSub">—</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="mom-d-body">
                <div class="mom-d-grid">
                    <div class="mom-d-item"><div class="lbl">Document Number</div><div class="val" id="momDDoc">—</div></div>
                    <div class="mom-d-item"><div class="lbl">Customer</div><div class="val" id="momDCustomer">—</div></div>
                    <div class="mom-d-item"><div class="lbl">Project</div><div class="val" id="momDProject">—</div></div>
                    <div class="mom-d-item"><div class="lbl">Date &amp; Time</div><div class="val" id="momDDateTime">—</div></div>
                    <div class="mom-d-item"><div class="lbl">Initiated By</div><div class="val" id="momDInitiated">—</div></div>
                    <div class="mom-d-item"><div class="lbl">Attended By</div><div class="val" id="momDAttendees">—</div></div>
                    <div class="mom-d-item"><div class="lbl">Attachment</div><div class="val" id="momDAttachment">—</div></div>
                    <div class="mom-d-item"><div class="lbl">Change Request</div><div class="val" id="momDCR">—</div></div>
                </div>
                <div class="mom-d-section-title">Attendee Details (Customer Side)</div>
                <div id="momDAttRows"></div>
                <div class="mom-d-section-title">Discussion Notes</div>
                <div class="mom-d-desc" id="momDDesc">—</div>
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
        function fmtTime(d) { return pad(d.getHours()) + ':' + pad(d.getMinutes()); }
        function initials(name) {
            return String(name || '?').split(/\s+/).map(function(w) { return w.charAt(0); }).join('').toUpperCase().slice(0, 2);
        }
        var AV_COLORS = ['#7c3aed', '#2563eb', '#0ca308', '#d97706', '#dc2626', '#0891b2'];
        function avColor(name) {
            var h = 0;
            for (var i = 0; i < String(name).length; i++) h = (h * 31 + String(name).charCodeAt(i)) % 997;
            return AV_COLORS[h % AV_COLORS.length];
        }

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
                '<td><input type="text" class="form-control" placeholder="Name"></td>' +
                '<td><input type="text" class="form-control" placeholder="Department"></td>' +
                '<td><input type="text" class="form-control" placeholder="Designation"></td>' +
                '<td><input type="email" class="form-control" placeholder="Email"></td>' +
                '<td><input type="text" class="form-control" placeholder="Mobile"></td>' +
                '<td style="text-align:center;"><button type="button" class="momx-del-btn" title="Remove"><i class="bi bi-trash"></i></button></td>' +
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
                var btn = e.target.closest('.momx-del-btn');
                if (btn) btn.closest('tr').remove();
            });
        }

        function crRowHtml() {
            return '<tr>' +
                '<td><select class="form-select select2" data-placeholder="-- Select Milestone --"><option value="">-- Select Milestone --</option><option>Founder</option><option>Beam</option><option>Design</option><option>Handover</option></select></td>' +
                '<td><input type="text" class="form-control" placeholder="Task"></td>' +
                '<td><select class="form-select select2" data-placeholder="Status"><option selected>Pending</option><option>Done</option></select></td>' +
                '<td style="text-align:center;"><button type="button" class="momx-del-btn" title="Remove"><i class="bi bi-trash"></i></button></td>' +
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
                var btn = e.target.closest('.momx-del-btn');
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
                    '<td><input type="text" class="form-control" placeholder="Name" value="' + (a.name || '') + '"></td>' +
                    '<td><input type="text" class="form-control" placeholder="Department" value="' + (a.dept || '') + '"></td>' +
                    '<td><input type="text" class="form-control" placeholder="Designation" value="' + (a.desig || '') + '"></td>' +
                    '<td><input type="email" class="form-control" placeholder="Email" value="' + (a.email || '') + '"></td>' +
                    '<td><input type="text" class="form-control" placeholder="Mobile" value="' + (a.mobile || '') + '"></td>' +
                    '<td style="text-align:center;"><button type="button" class="momx-del-btn" title="Remove"><i class="bi bi-trash"></i></button></td>' +
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
                    '<td><select class="form-select select2" data-placeholder="-- Select Milestone --"><option value="">-- Select Milestone --</option><option>Founder</option><option>Beam</option><option>Design</option><option>Handover</option></select></td>' +
                    '<td><input type="text" class="form-control" placeholder="Task" value="' + task + '"></td>' +
                    '<td><select class="form-select select2" data-placeholder="Status"><option selected>Pending</option><option>Done</option></select></td>' +
                    '<td style="text-align:center;"><button type="button" class="momx-del-btn" title="Remove"><i class="bi bi-trash"></i></button></td>' +
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
                '<span class="mom-attach"><i class="bi bi-paperclip"></i><span>' + rec.attachment + '</span></span>' : '—';
            document.getElementById('momDAttRows').innerHTML = (rec.attendeeDetails && rec.attendeeDetails.length) ?
                '<div class="table-responsive"><table class="momx-table"><thead><tr><th>Name</th><th>Department</th><th>Designation</th><th>Email</th><th>Mobile</th></tr></thead><tbody>' +
                rec.attendeeDetails.map(function(a) {
                    return '<tr><td>' + a.name + '</td><td>' + (a.dept || '—') + '</td><td>' + (a.desig || '—') + '</td><td>' + (a.email || '—') + '</td><td>' + (a.mobile || '—') + '</td></tr>';
                }).join('') + '</tbody></table></div>' :
                '<div class="small text-muted" style="font-weight:600;">No customer-side attendee details.</div>';
            document.getElementById('momDCR').innerHTML = (rec.crs && rec.crs.length) ?
                rec.crs.map(function(cr) {
                    return '<span class="mom-cr-chip ' + (cr.status === 'Pending' ? 'pending' : 'done') + '">' + cr.title + '</span>';
                }).join(' ') : '—';
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


