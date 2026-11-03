<?php include 'header.php'; ?>

<div class="container-fluid px-0">    <!-- Page Header & Action Bar -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width:42px;height:42px;font-size:20px;">
                <i class="bi bi-telephone-forward"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title">Callbacks</h1>
                <p class="text-secondary small mb-0">Manage client callback requests and scheduled contact follow-ups</p>
            </div>
        </div>

        <div class="d-flex align-items-center flex-wrap gap-2">
            <!-- Filter Button triggering Offcanvas Drawer -->
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-2.5" data-bs-toggle="offcanvas" data-bs-target="#callbackFilterOffcanvas" aria-controls="callbackFilterOffcanvas" title="Filter Callbacks">
                <i class="bi bi-funnel"></i>
                <span>Filters</span>
                <span class="badge bg-primary text-white rounded-pill px-1.5 py-0.5 d-none font-11" id="cb5FilterCountBadge">0</span>
            </button>

            <!-- Primary Action: New Callback -->
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-3 shadow-sm" id="cb5NewBtn">
                <i class="bi bi-plus-lg"></i><span>Log Callback</span>
            </button>
        </div>
    </div>

    <!-- Hidden compatibility store for legacy IDs -->
    <div class="d-none" aria-hidden="true">
        <span id="cb5TotalCount">32</span>
        <span id="cb5OverdueCount2">3</span>
        <div id="cb5SumGrid"></div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-4" id="cb5TableWrap">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-telephone-inbound text-primary me-2"></i>All Callbacks</h6>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2.5 py-1 font-12" id="cb5TotalCountBadge">32 Callbacks</span>
                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2.5 py-1 font-12" title="Overdue follow-ups">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i><span id="cb5OverdueCount">3</span> Overdue
                </span>
            </div>
            <!-- Quick status tabs inside card header -->
            <div class="d-flex align-items-center gap-1 flex-wrap">
                <button type="button" class="btn btn-xs btn-outline-secondary active cb5-quick-btn py-1 px-2.5 font-11 fw-semibold" data-quick="reset">All (32)</button>
                <button type="button" class="btn btn-xs btn-outline-primary cb5-quick-btn py-1 px-2.5 font-11 fw-semibold" data-quick="upcoming">Upcoming (8)</button>
                <button type="button" class="btn btn-xs btn-outline-warning text-dark cb5-quick-btn py-1 px-2.5 font-11 fw-semibold" data-quick="postponed">Postponed (5)</button>
                <button type="button" class="btn btn-xs btn-outline-danger cb5-quick-btn py-1 px-2.5 font-11 fw-semibold" data-quick="datePassed">Overdue (3)</button>
                <button type="button" class="btn btn-xs btn-outline-success cb5-quick-btn py-1 px-2.5 font-11 fw-semibold" data-sum-status="Complete">Complete (16)</button>
            </div>
        </div>
        <div class="table-responsive table-modern-wrap">
            <table class="table table-modern table-hover align-middle mb-0 datatable" id="cb5Table" data-table-name="Callbacks">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">S.No</th>
                        <th style="min-width:220px;">Full Name</th>
                        <th style="width:130px;">Phone</th>
                        <th style="width:150px;">Status</th>
                        <th style="width:180px;">Timezone</th>
                        <th style="width:165px;">Available from</th>
                        <th style="width:100px;">To</th>
                        <th style="width:130px;">Date requested</th>
                        <th style="width:150px;">Assignees</th>
                        <th style="width:100px;">Priority</th>
                        <th style="width:160px;">Options</th>
                    </tr>
                </thead>
                <tbody id="cb5Tbody">
                    <tr data-id="1" data-status="Upcoming" data-source="Contact" data-assignee="Harish D." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="28-09-2026" data-req-date="27-09-2026">
                        <td>1</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-violet">R</span>
                                    <span class="fw-bold" title="Ravi Shankar">Ravi Shankar</span>
                                </span>
                                <span class="cb5-meta">Contact &middot; Quotation follow-up</span>
                            </span>
                        </td>
                        <td><a href="tel:9838472910" class="cb5-phone">9838472910</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-upcoming" data-id="1" title="Change status">
                                <option value="Upcoming" data-color="#2563eb" selected>Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">28-09-2026 09:00 AM</span></td>
                        <td><span class="cb5-time-chip">09:30 AM</span></td>
                        <td><span class="cb5-date-txt">27-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-high">High</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9838472910" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919838472910" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="1" data-name="Ravi Shankar" data-phone="9838472910" data-tz="Asia/Kolkata (GMT+5:30)" data-source="Contact" data-status="Upcoming" data-priority="High" data-assignee="Harish D." data-from-date="28-09-2026" data-to-date="28-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="27-09-2026" data-note="Quotation follow-up" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="1" data-name="Ravi Shankar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="2" data-status="Upcoming" data-source="Lead" data-assignee="Divya A." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="30-09-2026" data-req-date="28-09-2026">
                        <td>2</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-rose">M</span>
                                    <span class="fw-bold" title="Meena Ramesh">Meena Ramesh</span>
                                </span>
                                <span class="cb5-meta">Lead &middot; Installation status</span>
                            </span>
                        </td>
                        <td><a href="tel:9840401284" class="cb5-phone">9840401284</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-upcoming" data-id="2" title="Change status">
                                <option value="Upcoming" data-color="#2563eb" selected>Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">30-09-2026 10:30 AM</span></td>
                        <td><span class="cb5-time-chip">11:00 AM</span></td>
                        <td><span class="cb5-date-txt">28-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-rose" title="Divya A.">D</span>
                                <span>Divya A.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9840401284" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919840401284" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="2" data-name="Meena Ramesh" data-phone="9840401284" data-tz="Asia/Colombo (GMT+5:30)" data-source="Lead" data-status="Upcoming" data-priority="Low" data-assignee="Divya A." data-from-date="30-09-2026" data-to-date="30-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="28-09-2026" data-note="Installation status" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="2" data-name="Meena Ramesh" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="3" data-status="Postponed" data-source="External" data-assignee="Priya S." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="01-10-2026" data-req-date="28-09-2026">
                        <td>3</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-blue">L</span>
                                    <span class="fw-bold" title="Lakshmi Pharma">Lakshmi Pharma</span>
                                </span>
                                <span class="cb5-meta">External &middot; Payment reminder</span>
                            </span>
                        </td>
                        <td><a href="tel:9842329658" class="cb5-phone">9842329658</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-postponed" data-id="3" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706" selected>Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip">01-10-2026 11:00 AM</span></td>
                        <td><span class="cb5-time-chip">11:30 AM</span></td>
                        <td><span class="cb5-date-txt">28-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-violet" title="Priya S.">P</span>
                                <span>Priya S.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9842329658" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919842329658" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="3" data-name="Lakshmi Pharma" data-phone="9842329658" data-tz="Asia/Dubai (GMT+4:00)" data-source="External" data-status="Postponed" data-priority="Medium" data-assignee="Priya S." data-from-date="01-10-2026" data-to-date="01-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="28-09-2026" data-note="Payment reminder" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="3" data-name="Lakshmi Pharma" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="4" data-status="Cancelled" data-source="Internal Staff" data-assignee="Karthik R." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="02-10-2026" data-req-date="28-09-2026">
                        <td>4</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-violet">S</span>
                                    <span class="fw-bold" title="Sundar Exports">Sundar Exports</span>
                                </span>
                                <span class="cb5-meta">Internal Staff &middot; Support issue</span>
                            </span>
                        </td>
                        <td><a href="tel:9844258032" class="cb5-phone">9844258032</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-cancelled" data-id="4" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626" selected>Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">02-10-2026 12:30 PM</span></td>
                        <td><span class="cb5-time-chip">01:00 PM</span></td>
                        <td><span class="cb5-date-txt">28-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-blue" title="Karthik R.">K</span>
                                <span>Karthik R.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9844258032" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919844258032" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="4" data-name="Sundar Exports" data-phone="9844258032" data-tz="Asia/Kolkata (GMT+5:30)" data-source="Internal Staff" data-status="Cancelled" data-priority="Low" data-assignee="Karthik R." data-from-date="02-10-2026" data-to-date="02-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="28-09-2026" data-note="Support issue" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="4" data-name="Sundar Exports" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="5" data-status="Complete" data-source="Contact" data-assignee="Harish D." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="03-10-2026" data-req-date="02-10-2026">
                        <td>5</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-amber">K</span>
                                    <span class="fw-bold" title="Kumar &amp; Sons">Kumar &amp; Sons</span>
                                </span>
                                <span class="cb5-meta">Contact &middot; AMC renewal talk</span>
                            </span>
                        </td>
                        <td><a href="tel:9846186406" class="cb5-phone">9846186406</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="5" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">03-10-2026 01:00 PM</span></td>
                        <td><span class="cb5-time-chip">01:30 PM</span></td>
                        <td><span class="cb5-date-txt">02-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9846186406" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919846186406" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="5" data-name="Kumar &amp; Sons" data-phone="9846186406" data-tz="Asia/Colombo (GMT+5:30)" data-source="Contact" data-status="Complete" data-priority="Medium" data-assignee="Harish D." data-from-date="03-10-2026" data-to-date="03-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="02-10-2026" data-note="AMC renewal talk" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="5" data-name="Kumar &amp; Sons" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="6" data-status="Complete" data-source="Lead" data-assignee="Arun K." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="04-10-2026" data-req-date="02-10-2026">
                        <td>6</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-amber">P</span>
                                    <span class="fw-bold" title="Priya Textiles">Priya Textiles</span>
                                </span>
                                <span class="cb5-meta">Lead &middot; New enquiry</span>
                            </span>
                        </td>
                        <td><a href="tel:9848114780" class="cb5-phone">9848114780</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="6" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip">04-10-2026 02:30 PM</span></td>
                        <td><span class="cb5-time-chip">03:00 PM</span></td>
                        <td><span class="cb5-date-txt">02-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-amber" title="Arun K.">A</span>
                                <span>Arun K.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-high">High</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9848114780" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919848114780" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="6" data-name="Priya Textiles" data-phone="9848114780" data-tz="Asia/Dubai (GMT+4:00)" data-source="Lead" data-status="Complete" data-priority="High" data-assignee="Arun K." data-from-date="04-10-2026" data-to-date="04-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="02-10-2026" data-note="New enquiry" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="6" data-name="Priya Textiles" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="7" data-status="Complete" data-source="External" data-assignee="Harish D." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="05-10-2026" data-req-date="02-10-2026">
                        <td>7</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-grey">A</span>
                                    <span class="fw-bold" title="Anand Associates">Anand Associates</span>
                                </span>
                                <span class="cb5-meta">External &middot; Quotation follow-up</span>
                            </span>
                        </td>
                        <td><a href="tel:9850043154" class="cb5-phone">9850043154</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="7" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">05-10-2026 03:00 PM</span></td>
                        <td><span class="cb5-time-chip">03:30 PM</span></td>
                        <td><span class="cb5-date-txt">02-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9850043154" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919850043154" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="7" data-name="Anand Associates" data-phone="9850043154" data-tz="Asia/Kolkata (GMT+5:30)" data-source="External" data-status="Complete" data-priority="Medium" data-assignee="Harish D." data-from-date="05-10-2026" data-to-date="05-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="02-10-2026" data-note="Quotation follow-up" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="7" data-name="Anand Associates" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="8" data-status="Upcoming" data-source="Internal Staff" data-assignee="Divya A." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="26-09-2026" data-req-date="22-09-2026">
                        <td>8</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-grey">V</span>
                                    <span class="fw-bold" title="Vetri Logistics">Vetri Logistics</span>
                                </span>
                                <span class="cb5-meta is-overdue">Internal Staff &middot; Installation status</span>
                            </span>
                        </td>
                        <td><a href="tel:9851971528" class="cb5-phone">9851971528</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-upcoming" data-id="8" title="Change status">
                                <option value="Upcoming" data-color="#2563eb" selected>Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip is-past">26-09-2026 04:30 PM</span></td>
                        <td><span class="cb5-time-chip is-past">05:00 PM</span></td>
                        <td><span class="cb5-date-txt">22-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-rose" title="Divya A.">D</span>
                                <span>Divya A.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9851971528" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919851971528" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="8" data-name="Vetri Logistics" data-phone="9851971528" data-tz="Asia/Colombo (GMT+5:30)" data-source="Internal Staff" data-status="Upcoming" data-priority="Low" data-assignee="Divya A." data-from-date="26-09-2026" data-to-date="26-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="22-09-2026" data-note="Installation status" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="8" data-name="Vetri Logistics" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="9" data-status="Postponed" data-source="Contact" data-assignee="Harish D." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="07-10-2026" data-req-date="06-10-2026">
                        <td>9</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-violet">N</span>
                                    <span class="fw-bold" title="Naveen Traders">Naveen Traders</span>
                                </span>
                                <span class="cb5-meta">Contact &middot; Payment reminder</span>
                            </span>
                        </td>
                        <td><a href="tel:9853899902" class="cb5-phone">9853899902</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-postponed" data-id="9" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706" selected>Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip">07-10-2026 09:00 AM</span></td>
                        <td><span class="cb5-time-chip">09:30 AM</span></td>
                        <td><span class="cb5-date-txt">06-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9853899902" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919853899902" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="9" data-name="Naveen Traders" data-phone="9853899902" data-tz="Asia/Dubai (GMT+4:00)" data-source="Contact" data-status="Postponed" data-priority="Medium" data-assignee="Harish D." data-from-date="07-10-2026" data-to-date="07-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="06-10-2026" data-note="Payment reminder" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="9" data-name="Naveen Traders" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="10" data-status="Cancelled" data-source="Lead" data-assignee="Karthik R." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="28-09-2026" data-req-date="26-09-2026">
                        <td>10</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-blue">S</span>
                                    <span class="fw-bold" title="Shalu Agencies">Shalu Agencies</span>
                                </span>
                                <span class="cb5-meta">Lead &middot; Support issue</span>
                            </span>
                        </td>
                        <td><a href="tel:9855828276" class="cb5-phone">9855828276</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-cancelled" data-id="10" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626" selected>Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">28-09-2026 10:30 AM</span></td>
                        <td><span class="cb5-time-chip">11:00 AM</span></td>
                        <td><span class="cb5-date-txt">26-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-blue" title="Karthik R.">K</span>
                                <span>Karthik R.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9855828276" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919855828276" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="10" data-name="Shalu Agencies" data-phone="9855828276" data-tz="Asia/Kolkata (GMT+5:30)" data-source="Lead" data-status="Cancelled" data-priority="Low" data-assignee="Karthik R." data-from-date="28-09-2026" data-to-date="28-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="26-09-2026" data-note="Support issue" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="10" data-name="Shalu Agencies" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="11" data-status="Complete" data-source="External" data-assignee="Meena V." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="29-09-2026" data-req-date="26-09-2026">
                        <td>11</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-blue">K</span>
                                    <span class="fw-bold" title="Karthik Motors">Karthik Motors</span>
                                </span>
                                <span class="cb5-meta">External &middot; AMC renewal talk</span>
                            </span>
                        </td>
                        <td><a href="tel:9857756650" class="cb5-phone">9857756650</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="11" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">29-09-2026 11:00 AM</span></td>
                        <td><span class="cb5-time-chip">11:30 AM</span></td>
                        <td><span class="cb5-date-txt">26-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-blue" title="Meena V.">M</span>
                                <span>Meena V.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-high">High</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9857756650" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919857756650" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="11" data-name="Karthik Motors" data-phone="9857756650" data-tz="Asia/Colombo (GMT+5:30)" data-source="External" data-status="Complete" data-priority="High" data-assignee="Meena V." data-from-date="29-09-2026" data-to-date="29-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="26-09-2026" data-note="AMC renewal talk" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="11" data-name="Karthik Motors" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="12" data-status="Complete" data-source="Internal Staff" data-assignee="Arun K." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="26-09-2026" data-req-date="22-09-2026">
                        <td>12</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-rose">D</span>
                                    <span class="fw-bold" title="Divya Foods">Divya Foods</span>
                                </span>
                                <span class="cb5-meta">Internal Staff &middot; New enquiry</span>
                            </span>
                        </td>
                        <td><a href="tel:9859685024" class="cb5-phone">9859685024</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="12" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip">26-09-2026 12:30 PM</span></td>
                        <td><span class="cb5-time-chip">01:00 PM</span></td>
                        <td><span class="cb5-date-txt">22-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-amber" title="Arun K.">A</span>
                                <span>Arun K.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9859685024" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919859685024" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="12" data-name="Divya Foods" data-phone="9859685024" data-tz="Asia/Dubai (GMT+4:00)" data-source="Internal Staff" data-status="Complete" data-priority="Low" data-assignee="Arun K." data-from-date="26-09-2026" data-to-date="26-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="22-09-2026" data-note="New enquiry" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="12" data-name="Divya Foods" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="13" data-status="Complete" data-source="Contact" data-assignee="Harish D." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="01-10-2026" data-req-date="30-09-2026">
                        <td>13</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-violet">A</span>
                                    <span class="fw-bold" title="Arun Steels">Arun Steels</span>
                                </span>
                                <span class="cb5-meta">Contact &middot; Quotation follow-up</span>
                            </span>
                        </td>
                        <td><a href="tel:9861613398" class="cb5-phone">9861613398</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="13" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">01-10-2026 01:00 PM</span></td>
                        <td><span class="cb5-time-chip">01:30 PM</span></td>
                        <td><span class="cb5-date-txt">30-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9861613398" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919861613398" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="13" data-name="Arun Steels" data-phone="9861613398" data-tz="Asia/Kolkata (GMT+5:30)" data-source="Contact" data-status="Complete" data-priority="Medium" data-assignee="Harish D." data-from-date="01-10-2026" data-to-date="01-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="30-09-2026" data-note="Quotation follow-up" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="13" data-name="Arun Steels" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="14" data-status="Upcoming" data-source="Lead" data-assignee="Divya A." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="02-10-2026" data-req-date="30-09-2026">
                        <td>14</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-green">B</span>
                                    <span class="fw-bold" title="Bharath Cements">Bharath Cements</span>
                                </span>
                                <span class="cb5-meta">Lead &middot; Installation status</span>
                            </span>
                        </td>
                        <td><a href="tel:9863541772" class="cb5-phone">9863541772</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-upcoming" data-id="14" title="Change status">
                                <option value="Upcoming" data-color="#2563eb" selected>Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">02-10-2026 02:30 PM</span></td>
                        <td><span class="cb5-time-chip">03:00 PM</span></td>
                        <td><span class="cb5-date-txt">30-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-rose" title="Divya A.">D</span>
                                <span>Divya A.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9863541772" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919863541772" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="14" data-name="Bharath Cements" data-phone="9863541772" data-tz="Asia/Colombo (GMT+5:30)" data-source="Lead" data-status="Upcoming" data-priority="Low" data-assignee="Divya A." data-from-date="02-10-2026" data-to-date="02-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="30-09-2026" data-note="Installation status" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="14" data-name="Bharath Cements" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="15" data-status="Upcoming" data-source="External" data-assignee="Priya S." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="26-09-2026" data-req-date="23-09-2026">
                        <td>15</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-rose">C</span>
                                    <span class="fw-bold" title="Chitra Jewellers">Chitra Jewellers</span>
                                </span>
                                <span class="cb5-meta is-overdue">External &middot; Payment reminder</span>
                            </span>
                        </td>
                        <td><a href="tel:9865470146" class="cb5-phone">9865470146</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-upcoming" data-id="15" title="Change status">
                                <option value="Upcoming" data-color="#2563eb" selected>Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip is-past">26-09-2026 03:00 PM</span></td>
                        <td><span class="cb5-time-chip is-past">03:30 PM</span></td>
                        <td><span class="cb5-date-txt">23-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-violet" title="Priya S.">P</span>
                                <span>Priya S.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9865470146" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919865470146" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="15" data-name="Chitra Jewellers" data-phone="9865470146" data-tz="Asia/Dubai (GMT+4:00)" data-source="External" data-status="Upcoming" data-priority="Medium" data-assignee="Priya S." data-from-date="26-09-2026" data-to-date="26-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="23-09-2026" data-note="Payment reminder" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="15" data-name="Chitra Jewellers" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="16" data-status="Postponed" data-source="Internal Staff" data-assignee="Karthik R." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="04-10-2026" data-req-date="30-09-2026">
                        <td>16</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-green">D</span>
                                    <span class="fw-bold" title="Deepak Electricals">Deepak Electricals</span>
                                </span>
                                <span class="cb5-meta">Internal Staff &middot; Support issue</span>
                            </span>
                        </td>
                        <td><a href="tel:9867398520" class="cb5-phone">9867398520</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-postponed" data-id="16" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706" selected>Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">04-10-2026 04:30 PM</span></td>
                        <td><span class="cb5-time-chip">05:00 PM</span></td>
                        <td><span class="cb5-date-txt">30-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-blue" title="Karthik R.">K</span>
                                <span>Karthik R.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-high">High</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9867398520" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919867398520" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="16" data-name="Deepak Electricals" data-phone="9867398520" data-tz="Asia/Kolkata (GMT+5:30)" data-source="Internal Staff" data-status="Postponed" data-priority="High" data-assignee="Karthik R." data-from-date="04-10-2026" data-to-date="04-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="30-09-2026" data-note="Support issue" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="16" data-name="Deepak Electricals" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="17" data-status="Complete" data-source="Contact" data-assignee="Harish D." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="05-10-2026" data-req-date="04-10-2026">
                        <td>17</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-green">E</span>
                                    <span class="fw-bold" title="Ezhil Software">Ezhil Software</span>
                                </span>
                                <span class="cb5-meta">Contact &middot; AMC renewal talk</span>
                            </span>
                        </td>
                        <td><a href="tel:9869326894" class="cb5-phone">9869326894</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="17" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">05-10-2026 09:00 AM</span></td>
                        <td><span class="cb5-time-chip">09:30 AM</span></td>
                        <td><span class="cb5-date-txt">04-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9869326894" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919869326894" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="17" data-name="Ezhil Software" data-phone="9869326894" data-tz="Asia/Colombo (GMT+5:30)" data-source="Contact" data-status="Complete" data-priority="Medium" data-assignee="Harish D." data-from-date="05-10-2026" data-to-date="05-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="04-10-2026" data-note="AMC renewal talk" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="17" data-name="Ezhil Software" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="18" data-status="Complete" data-source="Lead" data-assignee="Arun K." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="06-10-2026" data-req-date="04-10-2026">
                        <td>18</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-blue">F</span>
                                    <span class="fw-bold" title="Fathima Stores">Fathima Stores</span>
                                </span>
                                <span class="cb5-meta">Lead &middot; New enquiry</span>
                            </span>
                        </td>
                        <td><a href="tel:9871255268" class="cb5-phone">9871255268</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="18" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip">06-10-2026 10:30 AM</span></td>
                        <td><span class="cb5-time-chip">11:00 AM</span></td>
                        <td><span class="cb5-date-txt">04-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-amber" title="Arun K.">A</span>
                                <span>Arun K.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9871255268" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919871255268" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="18" data-name="Fathima Stores" data-phone="9871255268" data-tz="Asia/Dubai (GMT+4:00)" data-source="Lead" data-status="Complete" data-priority="Low" data-assignee="Arun K." data-from-date="06-10-2026" data-to-date="06-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="04-10-2026" data-note="New enquiry" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="18" data-name="Fathima Stores" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="19" data-status="Complete" data-source="External" data-assignee="Harish D." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="28-09-2026" data-req-date="25-09-2026">
                        <td>19</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-grey">G</span>
                                    <span class="fw-bold" title="Ganesh Hardwares">Ganesh Hardwares</span>
                                </span>
                                <span class="cb5-meta">External &middot; Quotation follow-up</span>
                            </span>
                        </td>
                        <td><a href="tel:9873183642" class="cb5-phone">9873183642</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="19" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">28-09-2026 11:00 AM</span></td>
                        <td><span class="cb5-time-chip">11:30 AM</span></td>
                        <td><span class="cb5-date-txt">25-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9873183642" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919873183642" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="19" data-name="Ganesh Hardwares" data-phone="9873183642" data-tz="Asia/Kolkata (GMT+5:30)" data-source="External" data-status="Complete" data-priority="Medium" data-assignee="Harish D." data-from-date="28-09-2026" data-to-date="28-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="25-09-2026" data-note="Quotation follow-up" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="19" data-name="Ganesh Hardwares" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="20" data-status="Complete" data-source="Internal Staff" data-assignee="Divya A." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="08-10-2026" data-req-date="04-10-2026">
                        <td>20</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-green">H</span>
                                    <span class="fw-bold" title="Hema Boutique">Hema Boutique</span>
                                </span>
                                <span class="cb5-meta">Internal Staff &middot; Installation status</span>
                            </span>
                        </td>
                        <td><a href="tel:9875112016" class="cb5-phone">9875112016</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="20" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">08-10-2026 12:30 PM</span></td>
                        <td><span class="cb5-time-chip">01:00 PM</span></td>
                        <td><span class="cb5-date-txt">04-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-rose" title="Divya A.">D</span>
                                <span>Divya A.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9875112016" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919875112016" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="20" data-name="Hema Boutique" data-phone="9875112016" data-tz="Asia/Colombo (GMT+5:30)" data-source="Internal Staff" data-status="Complete" data-priority="Low" data-assignee="Divya A." data-from-date="08-10-2026" data-to-date="08-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="04-10-2026" data-note="Installation status" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="20" data-name="Hema Boutique" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="21" data-status="Upcoming" data-source="Contact" data-assignee="Harish D." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="29-09-2026" data-req-date="28-09-2026">
                        <td>21</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-green">I</span>
                                    <span class="fw-bold" title="Ilango Paints">Ilango Paints</span>
                                </span>
                                <span class="cb5-meta">Contact &middot; Payment reminder</span>
                            </span>
                        </td>
                        <td><a href="tel:9877040390" class="cb5-phone">9877040390</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-upcoming" data-id="21" title="Change status">
                                <option value="Upcoming" data-color="#2563eb" selected>Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip">29-09-2026 01:00 PM</span></td>
                        <td><span class="cb5-time-chip">01:30 PM</span></td>
                        <td><span class="cb5-date-txt">28-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-high">High</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9877040390" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919877040390" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="21" data-name="Ilango Paints" data-phone="9877040390" data-tz="Asia/Dubai (GMT+4:00)" data-source="Contact" data-status="Upcoming" data-priority="High" data-assignee="Harish D." data-from-date="29-09-2026" data-to-date="29-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="28-09-2026" data-note="Payment reminder" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="21" data-name="Ilango Paints" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="22" data-status="Postponed" data-source="Lead" data-assignee="Karthik R." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="26-09-2026" data-req-date="24-09-2026">
                        <td>22</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-rose">J</span>
                                    <span class="fw-bold" title="Jaya Hospitals">Jaya Hospitals</span>
                                </span>
                                <span class="cb5-meta">Lead &middot; Support issue</span>
                            </span>
                        </td>
                        <td><a href="tel:9878968764" class="cb5-phone">9878968764</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-postponed" data-id="22" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706" selected>Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">26-09-2026 02:30 PM</span></td>
                        <td><span class="cb5-time-chip">03:00 PM</span></td>
                        <td><span class="cb5-date-txt">24-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-blue" title="Karthik R.">K</span>
                                <span>Karthik R.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9878968764" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919878968764" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="22" data-name="Jaya Hospitals" data-phone="9878968764" data-tz="Asia/Kolkata (GMT+5:30)" data-source="Lead" data-status="Postponed" data-priority="Low" data-assignee="Karthik R." data-from-date="26-09-2026" data-to-date="26-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="24-09-2026" data-note="Support issue" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="22" data-name="Jaya Hospitals" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="23" data-status="Cancelled" data-source="External" data-assignee="Meena V." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="26-09-2026" data-req-date="23-09-2026">
                        <td>23</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-rose">K</span>
                                    <span class="fw-bold" title="Kala Ceramics">Kala Ceramics</span>
                                </span>
                                <span class="cb5-meta">External &middot; AMC renewal talk</span>
                            </span>
                        </td>
                        <td><a href="tel:9880897138" class="cb5-phone">9880897138</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-cancelled" data-id="23" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626" selected>Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">26-09-2026 03:00 PM</span></td>
                        <td><span class="cb5-time-chip">03:30 PM</span></td>
                        <td><span class="cb5-date-txt">23-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-blue" title="Meena V.">M</span>
                                <span>Meena V.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9880897138" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919880897138" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="23" data-name="Kala Ceramics" data-phone="9880897138" data-tz="Asia/Colombo (GMT+5:30)" data-source="External" data-status="Cancelled" data-priority="Medium" data-assignee="Meena V." data-from-date="26-09-2026" data-to-date="26-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="23-09-2026" data-note="AMC renewal talk" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="23" data-name="Kala Ceramics" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="24" data-status="Complete" data-source="Internal Staff" data-assignee="Arun K." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="02-10-2026" data-req-date="28-09-2026">
                        <td>24</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-rose">L</span>
                                    <span class="fw-bold" title="Loganathan Cotton">Loganathan Cotton</span>
                                </span>
                                <span class="cb5-meta">Internal Staff &middot; New enquiry</span>
                            </span>
                        </td>
                        <td><a href="tel:9882825512" class="cb5-phone">9882825512</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="24" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip">02-10-2026 04:30 PM</span></td>
                        <td><span class="cb5-time-chip">05:00 PM</span></td>
                        <td><span class="cb5-date-txt">28-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-amber" title="Arun K.">A</span>
                                <span>Arun K.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9882825512" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919882825512" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="24" data-name="Loganathan Cotton" data-phone="9882825512" data-tz="Asia/Dubai (GMT+4:00)" data-source="Internal Staff" data-status="Complete" data-priority="Low" data-assignee="Arun K." data-from-date="02-10-2026" data-to-date="02-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="28-09-2026" data-note="New enquiry" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="24" data-name="Loganathan Cotton" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="25" data-status="Complete" data-source="Contact" data-assignee="Harish D." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="03-10-2026" data-req-date="02-10-2026">
                        <td>25</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-blue">M</span>
                                    <span class="fw-bold" title="Mani Plastics">Mani Plastics</span>
                                </span>
                                <span class="cb5-meta">Contact &middot; Quotation follow-up</span>
                            </span>
                        </td>
                        <td><a href="tel:9884753886" class="cb5-phone">9884753886</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="25" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">03-10-2026 09:00 AM</span></td>
                        <td><span class="cb5-time-chip">09:30 AM</span></td>
                        <td><span class="cb5-date-txt">02-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9884753886" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919884753886" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="25" data-name="Mani Plastics" data-phone="9884753886" data-tz="Asia/Kolkata (GMT+5:30)" data-source="Contact" data-status="Complete" data-priority="Medium" data-assignee="Harish D." data-from-date="03-10-2026" data-to-date="03-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="02-10-2026" data-note="Quotation follow-up" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="25" data-name="Mani Plastics" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="26" data-status="Complete" data-source="Lead" data-assignee="Divya A." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="04-10-2026" data-req-date="02-10-2026">
                        <td>26</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-rose">N</span>
                                    <span class="fw-bold" title="Nithya Interiors">Nithya Interiors</span>
                                </span>
                                <span class="cb5-meta">Lead &middot; Installation status</span>
                            </span>
                        </td>
                        <td><a href="tel:9886682260" class="cb5-phone">9886682260</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="26" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">04-10-2026 10:30 AM</span></td>
                        <td><span class="cb5-time-chip">11:00 AM</span></td>
                        <td><span class="cb5-date-txt">02-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-rose" title="Divya A.">D</span>
                                <span>Divya A.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-high">High</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9886682260" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919886682260" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="26" data-name="Nithya Interiors" data-phone="9886682260" data-tz="Asia/Colombo (GMT+5:30)" data-source="Lead" data-status="Complete" data-priority="High" data-assignee="Divya A." data-from-date="04-10-2026" data-to-date="04-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="02-10-2026" data-note="Installation status" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="26" data-name="Nithya Interiors" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="27" data-status="Upcoming" data-source="External" data-assignee="Priya S." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="05-10-2026" data-req-date="02-10-2026">
                        <td>27</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-amber">O</span>
                                    <span class="fw-bold" title="Oviya Dairy">Oviya Dairy</span>
                                </span>
                                <span class="cb5-meta">External &middot; Payment reminder</span>
                            </span>
                        </td>
                        <td><a href="tel:9888610634" class="cb5-phone">9888610634</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-upcoming" data-id="27" title="Change status">
                                <option value="Upcoming" data-color="#2563eb" selected>Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip">05-10-2026 11:00 AM</span></td>
                        <td><span class="cb5-time-chip">11:30 AM</span></td>
                        <td><span class="cb5-date-txt">02-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-violet" title="Priya S.">P</span>
                                <span>Priya S.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9888610634" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919888610634" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="27" data-name="Oviya Dairy" data-phone="9888610634" data-tz="Asia/Dubai (GMT+4:00)" data-source="External" data-status="Upcoming" data-priority="Medium" data-assignee="Priya S." data-from-date="05-10-2026" data-to-date="05-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="02-10-2026" data-note="Payment reminder" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="27" data-name="Oviya Dairy" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="28" data-status="Upcoming" data-source="Internal Staff" data-assignee="Karthik R." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="28-09-2026" data-req-date="24-09-2026">
                        <td>28</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-green">P</span>
                                    <span class="fw-bold" title="Prakash Tools">Prakash Tools</span>
                                </span>
                                <span class="cb5-meta">Internal Staff &middot; Support issue</span>
                            </span>
                        </td>
                        <td><a href="tel:9890539008" class="cb5-phone">9890539008</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-upcoming" data-id="28" title="Change status">
                                <option value="Upcoming" data-color="#2563eb" selected>Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">28-09-2026 12:30 PM</span></td>
                        <td><span class="cb5-time-chip">01:00 PM</span></td>
                        <td><span class="cb5-date-txt">24-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-blue" title="Karthik R.">K</span>
                                <span>Karthik R.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9890539008" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919890539008" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="28" data-name="Prakash Tools" data-phone="9890539008" data-tz="Asia/Kolkata (GMT+5:30)" data-source="Internal Staff" data-status="Upcoming" data-priority="Low" data-assignee="Karthik R." data-from-date="28-09-2026" data-to-date="28-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="24-09-2026" data-note="Support issue" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="28" data-name="Prakash Tools" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="29" data-status="Postponed" data-source="Contact" data-assignee="Harish D." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="26-09-2026" data-req-date="25-09-2026">
                        <td>29</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-grey">R</span>
                                    <span class="fw-bold" title="Raji Catering">Raji Catering</span>
                                </span>
                                <span class="cb5-meta">Contact &middot; AMC renewal talk</span>
                            </span>
                        </td>
                        <td><a href="tel:9892467382" class="cb5-phone">9892467382</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-postponed" data-id="29" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706" selected>Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a">Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">26-09-2026 01:00 PM</span></td>
                        <td><span class="cb5-time-chip">01:30 PM</span></td>
                        <td><span class="cb5-date-txt">25-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-medium">Medium</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9892467382" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919892467382" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="29" data-name="Raji Catering" data-phone="9892467382" data-tz="Asia/Colombo (GMT+5:30)" data-source="Contact" data-status="Postponed" data-priority="Medium" data-assignee="Harish D." data-from-date="26-09-2026" data-to-date="26-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="25-09-2026" data-note="AMC renewal talk" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="29" data-name="Raji Catering" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="30" data-status="Complete" data-source="Lead" data-assignee="Arun K." data-tz="Asia/Dubai (GMT+4:00)" data-from-date="08-10-2026" data-req-date="06-10-2026">
                        <td>30</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-rose">S</span>
                                    <span class="fw-bold" title="Senthil Papers">Senthil Papers</span>
                                </span>
                                <span class="cb5-meta">Lead &middot; New enquiry</span>
                            </span>
                        </td>
                        <td><a href="tel:9894395756" class="cb5-phone">9894395756</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="30" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Dubai (GMT+4:00)</span></td>
                        <td><span class="cb5-time-chip">08-10-2026 02:30 PM</span></td>
                        <td><span class="cb5-time-chip">03:00 PM</span></td>
                        <td><span class="cb5-date-txt">06-10-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-amber" title="Arun K.">A</span>
                                <span>Arun K.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9894395756" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919894395756" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="30" data-name="Senthil Papers" data-phone="9894395756" data-tz="Asia/Dubai (GMT+4:00)" data-source="Lead" data-status="Complete" data-priority="Low" data-assignee="Arun K." data-from-date="08-10-2026" data-to-date="08-10-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="06-10-2026" data-note="New enquiry" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="30" data-name="Senthil Papers" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="31" data-status="Complete" data-source="External" data-assignee="Harish D." data-tz="Asia/Kolkata (GMT+5:30)" data-from-date="29-09-2026" data-req-date="26-09-2026">
                        <td>31</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-grey">T</span>
                                    <span class="fw-bold" title="Thamarai Books">Thamarai Books</span>
                                </span>
                                <span class="cb5-meta">External &middot; Quotation follow-up</span>
                            </span>
                        </td>
                        <td><a href="tel:9896324130" class="cb5-phone">9896324130</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="31" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Kolkata (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">29-09-2026 03:00 PM</span></td>
                        <td><span class="cb5-time-chip">03:30 PM</span></td>
                        <td><span class="cb5-date-txt">26-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-green" title="Harish D.">H</span>
                                <span>Harish D.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-high">High</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9896324130" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919896324130" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="31" data-name="Thamarai Books" data-phone="9896324130" data-tz="Asia/Kolkata (GMT+5:30)" data-source="External" data-status="Complete" data-priority="High" data-assignee="Harish D." data-from-date="29-09-2026" data-to-date="29-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="26-09-2026" data-note="Quotation follow-up" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="31" data-name="Thamarai Books" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="32" data-status="Complete" data-source="Internal Staff" data-assignee="Divya A." data-tz="Asia/Colombo (GMT+5:30)" data-from-date="30-09-2026" data-req-date="26-09-2026">
                        <td>32</td>
                        <td>
                            <span class="cb5-name-cell">
                                <span class="cb5-name-row">
                                    <span class="cb5-avatar av-amber">U</span>
                                    <span class="fw-bold" title="Uma Fabrics">Uma Fabrics</span>
                                </span>
                                <span class="cb5-meta">Internal Staff &middot; Installation status</span>
                            </span>
                        </td>
                        <td><a href="tel:9898252504" class="cb5-phone">9898252504</a></td>
                        <td style="min-width:140px;">
                            <select class="form-select select2 cb5-status-select st-complete" data-id="32" title="Change status">
                                <option value="Upcoming" data-color="#2563eb">Upcoming</option>
                                <option value="Postponed" data-color="#d97706">Postponed</option>
                                <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                                <option value="Complete" data-color="#16a34a" selected>Complete</option>
                            </select>
                        </td>
                        <td><span class="cb5-muted">Asia/Colombo (GMT+5:30)</span></td>
                        <td><span class="cb5-time-chip">30-09-2026 04:30 PM</span></td>
                        <td><span class="cb5-time-chip">05:00 PM</span></td>
                        <td><span class="cb5-date-txt">26-09-2026</span></td>
                        <td>
                            <span class="cb5-name-row">
                                <span class="cb5-avatar av-rose" title="Divya A.">D</span>
                                <span>Divya A.</span>
                            </span>
                        </td>
                        <td><span class="cb5-pri p-low">Low</span></td>
                        <td>
                            <div class="cb5-actions-group">
                                <a href="tel:9898252504" class="cb5-act-btn act-call" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Call"><i class="bi bi-telephone-fill"></i></a>
                                <a href="https://wa.me/919898252504" target="_blank" rel="noopener" class="cb5-act-btn act-wa" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                <button type="button" class="cb5-act-btn act-edit" data-cb5="edit" data-id="32" data-name="Uma Fabrics" data-phone="9898252504" data-tz="Asia/Colombo (GMT+5:30)" data-source="Internal Staff" data-status="Complete" data-priority="Low" data-assignee="Divya A." data-from-date="30-09-2026" data-to-date="30-09-2026" data-from-time="10:30" data-to-time="11:00" data-req-date="26-09-2026" data-note="Installation status" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil-outline"></i></button>
                                <button type="button" class="cb5-act-btn act-del" data-cb5="del" data-id="32" data-name="Uma Fabrics" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-trash-can-outline"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- ==================== OFFCANVAS SLIDER: CALLBACKS FILTER DRAWER ==================== -->
<div class="offcanvas offcanvas-end border-start shadow-lg" tabindex="-1" id="callbackFilterOffcanvas" aria-labelledby="callbackFilterTitle" style="width: 360px;">
    <div class="offcanvas-header border-bottom py-3 px-4 bg-light">
        <div class="d-flex align-items-center gap-2">
            <span class="p-1.5 rounded-2 bg-primary-subtle text-primary d-inline-flex"><i class="bi bi-funnel fs-6"></i></span>
            <h5 class="offcanvas-title fw-bold text-dark fs-6 mb-0" id="callbackFilterTitle">Filter Callbacks</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4 d-flex flex-column gap-3.5">
        <!-- Assignee Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1" for="cb5Assignees">Assignee SPOC</label>
            <select class="form-select form-select-sm select2" id="cb5Assignees">
                <option value="">All Assignees</option>
                <option value="Harish D.">Harish D.</option>
                <option value="Divya A.">Divya A.</option>
                <option value="Priya S.">Priya S.</option>
                <option value="Karthik R.">Karthik R.</option>
                <option value="Meena V.">Meena V.</option>
                <option value="Arun K.">Arun K.</option>
            </select>
        </div>

        <!-- Status Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1" for="cb5Status">Callback Status</label>
            <select class="form-select form-select-sm select2" id="cb5Status">
                <option value="">All Statuses</option>
                <option value="Upcoming">Upcoming</option>
                <option value="Postponed">Postponed</option>
                <option value="Cancelled">Cancelled</option>
                <option value="Complete">Complete</option>
            </select>
        </div>

        <!-- Timezone Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1" for="cb5Tz">Timezone</label>
            <select class="form-select form-select-sm select2" id="cb5Tz">
                <option value="">All Timezones</option>
                <option value="Asia/Kolkata (GMT+5:30)">Asia/Kolkata (GMT+5:30)</option>
                <option value="Asia/Colombo (GMT+5:30)">Asia/Colombo (GMT+5:30)</option>
                <option value="Asia/Dubai (GMT+4:00)">Asia/Dubai (GMT+4:00)</option>
                <option value="Asia/Singapore (GMT+8:00)">Asia/Singapore (GMT+8:00)</option>
                <option value="Europe/London (GMT+0:00)">Europe/London (GMT+0:00)</option>
            </select>
        </div>

        <!-- Source Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1" for="cb5Source">Contact Source</label>
            <select class="form-select form-select-sm select2" id="cb5Source">
                <option value="">All Sources</option>
                <option value="Contact">Contact</option>
                <option value="Lead">Lead</option>
                <option value="External">External</option>
                <option value="Internal Staff">Internal Staff</option>
            </select>
        </div>

        <!-- Date Range Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Date Range</label>
            <div class="row g-2">
                <div class="col-6">
                    <input type="text" class="date-input form-control form-control-sm" id="cb5From" placeholder="From DD-MM-YYYY" maxlength="10" autocomplete="off">
                </div>
                <div class="col-6">
                    <input type="text" class="date-input form-control form-control-sm" id="cb5To" placeholder="To DD-MM-YYYY" maxlength="10" autocomplete="off">
                </div>
            </div>
            <div class="form-text text-muted font-11">Filter by scheduled follow-up date</div>
        </div>

        <!-- Related Activity Views -->
        <div class="pt-2 border-top">
            <label class="form-label fw-semibold small text-dark mb-2">Related Activity Views</label>
            <div class="d-flex flex-column gap-1.5">
                <a href="appointments.php" class="btn btn-sm btn-light border text-start d-flex align-items-center justify-content-between text-secondary py-2">
                    <span class="d-inline-flex align-items-center gap-2"><i class="bi bi-calendar2-week text-primary"></i><span>All Appointments</span></span>
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
        <button type="button" class="btn btn-outline-secondary btn-sm fw-semibold px-3" id="cb5ClearBtn">
            <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm fw-semibold px-4" id="cb5SearchBtn" data-bs-dismiss="offcanvas">
            <i class="bi bi-check-lg me-1"></i>Apply Filters
        </button>
    </div>
</div>


<!-- Modal: New / Edit Callback (pure Bootstrap 5) -->
<div class="modal fade" id="cb5Modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom py-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:18px;">
                        <i class="bi bi-telephone-forward-fill"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0"><span id="cb5ModalTitle">New Callback</span></h5>
                        <span class="text-muted small">Schedule or update a customer callback request</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <input type="hidden" id="cb5EditId" value="">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small" for="cb5NmName">Full Name <span class="text-danger me-1">*</span></label>
                        <input type="text" class="form-control" id="cb5NmName" placeholder="Ex: Ravi Shankar" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small" for="cb5NmPhone">Phone <span class="text-danger me-1">*</span></label>
                        <input type="text" class="form-control" id="cb5NmPhone" placeholder="Ex: 9840123456" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small" for="cb5NmTz">Timezone</label>
                        <select class="form-select select2" id="cb5NmTz">
                            <option value="Asia/Kolkata (GMT+5:30)" selected>Asia/Kolkata (GMT+5:30)</option>
                            <option value="Asia/Colombo (GMT+5:30)">Asia/Colombo (GMT+5:30)</option>
                            <option value="Asia/Dubai (GMT+4:00)">Asia/Dubai (GMT+4:00)</option>
                            <option value="Asia/Singapore (GMT+8:00)">Asia/Singapore (GMT+8:00)</option>
                            <option value="Europe/London (GMT+0:00)">Europe/London (GMT+0:00)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small" for="cb5NmSource">Source</label>
                        <select class="form-select select2" id="cb5NmSource">
                            <option value="Contact" selected>Contact</option>
                            <option value="Lead">Lead</option>
                            <option value="External">External</option>
                            <option value="Internal Staff">Internal Staff</option>
                        </select>
                    </div>
                    <!-- Available From (DatePicker + TimePicker) -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small">Available From <span class="text-danger me-1">*</span></label>
                        <div class="row g-2">
                            <div class="col-7">
                                <div class="date-picker">
                                    <input type="text" class="date-input form-control" id="cb5NmFromDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" value="28-09-2026">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="time-picker right-0">
                                    <input type="text" class="time-input form-control" id="cb5NmFromTime" placeholder="HH:MM" autocomplete="off" value="10:30">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- To (DatePicker + TimePicker) -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small">To <span class="text-danger me-1">*</span></label>
                        <div class="row g-2">
                            <div class="col-7">
                                <div class="date-picker">
                                    <input type="text" class="date-input form-control" id="cb5NmToDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" value="28-09-2026">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="time-picker right-0">
                                    <input type="text" class="time-input form-control" id="cb5NmToTime" placeholder="HH:MM" autocomplete="off" value="11:00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small" for="cb5NmStatus">Status</label>
                        <select class="form-select select2" id="cb5NmStatus">
                            <option value="Upcoming" data-color="#2563eb" selected>Upcoming</option>
                            <option value="Postponed" data-color="#d97706">Postponed</option>
                            <option value="Cancelled" data-color="#dc2626">Cancelled</option>
                            <option value="Complete" data-color="#16a34a">Complete</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small" for="cb5NmPriority">Priority</label>
                        <select class="form-select select2" id="cb5NmPriority">
                            <option value="High" data-color="#dc2626">High</option>
                            <option value="Medium" data-color="#f59e0b" selected>Medium</option>
                            <option value="Low" data-color="#16a34a">Low</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small" for="cb5NmAssignees">Assignees</label>
                        <select class="form-select select2" id="cb5NmAssignees">
                            <option value="Harish D." selected>Harish D.</option>
                            <option value="Divya A.">Divya A.</option>
                            <option value="Priya S.">Priya S.</option>
                            <option value="Karthik R.">Karthik R.</option>
                            <option value="Meena V.">Meena V.</option>
                            <option value="Arun K.">Arun K.</option>
                        </select>
                    </div>
                    <!-- Date requested (DatePicker) -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary small" for="cb5NmRequested">Date requested</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control" id="cb5NmRequested" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" value="25-09-2026">
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold text-secondary small" for="cb5NmNote">Note</label>
                        <textarea class="form-control" id="cb5NmNote" rows="3" placeholder="Enter details or notes regarding this callback..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top bg-light py-2 px-3">
                <button type="button" class="btn btn-sm btn-outline-secondary px-3" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary px-4" id="cb5NmSubmit"><i class="bi bi-check-lg me-1"></i>Save Callback</button>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        'use strict';

        document.addEventListener('DOMContentLoaded', function () {
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

            var cbModalEl = document.getElementById('cb5Modal');

            /* Pure Bootstrap 5 Toast Notification */
            var toastContainer = null;
            function showToast(msg, isWarn) {
                if (!toastContainer) {
                    toastContainer = document.createElement('div');
                    toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
                    toastContainer.style.zIndex = '1090';
                    document.body.appendChild(toastContainer);
                }
                var toastEl = document.createElement('div');
                toastEl.className = 'toast align-items-center text-bg-' + (isWarn ? 'warning' : 'primary') + ' border-0 shadow';
                toastEl.setAttribute('role', 'alert');
                toastEl.setAttribute('aria-live', 'assertive');
                toastEl.setAttribute('aria-atomic', 'true');
                toastEl.innerHTML = '<div class="d-flex"><div class="toast-body d-flex align-items-center gap-2"><i class="bi ' + (isWarn ? 'bi-exclamation-triangle-fill' : 'bi-check-circle-fill') + ' fs-5"></i><span>' + msg + '</span></div><button type="button" class="btn-close ' + (isWarn ? '' : 'btn-close-white') + ' me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>';
                toastContainer.appendChild(toastEl);
                var bsToast = new bootstrap.Toast(toastEl, { delay: 4000 });
                bsToast.show();
                toastEl.addEventListener('hidden.bs.toast', function () { toastEl.remove(); });
            }

            /* New Callback button */
            var newBtn = document.getElementById('cb5NewBtn');
            if (newBtn) {
                newBtn.addEventListener('click', function () {
                    document.getElementById('cb5EditId').value = '';
                    document.getElementById('cb5ModalTitle').textContent = 'New Callback';
                    document.getElementById('cb5NmName').value = '';
                    document.getElementById('cb5NmPhone').value = '';
                    document.getElementById('cb5NmNote').value = '';

                    if (document.getElementById('cb5NmFromDate')) document.getElementById('cb5NmFromDate').value = '28-09-2026';
                    if (document.getElementById('cb5NmToDate')) document.getElementById('cb5NmToDate').value = '28-09-2026';
                    if (document.getElementById('cb5NmFromTime')) document.getElementById('cb5NmFromTime').value = '10:30';
                    if (document.getElementById('cb5NmToTime')) document.getElementById('cb5NmToTime').value = '11:00';
                    if (document.getElementById('cb5NmRequested')) document.getElementById('cb5NmRequested').value = '28-09-2026';

                    if (window.jQuery && jQuery.fn.select2) {
                        jQuery('#cb5NmTz').val('Asia/Kolkata (GMT+5:30)').trigger('change.select2');
                        jQuery('#cb5NmSource').val('Contact').trigger('change.select2');
                        jQuery('#cb5NmStatus').val('Upcoming').trigger('change.select2');
                        jQuery('#cb5NmPriority').val('Medium').trigger('change.select2');
                        jQuery('#cb5NmAssignees').val('Harish D.').trigger('change.select2');
                    }

                    if (cbModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(cbModalEl).show();
                    }
                });
            }

            /* Table Row Actions (delegation) */
            var tbody = document.getElementById('cb5Tbody');
            if (tbody) {
                tbody.addEventListener('click', function (e) {
                    var tr = e.target.closest('tr');
                    if (!tr) return;

                    var delBtn = e.target.closest('[data-cb5="del"]');
                    if (delBtn) {
                        e.preventDefault();
                        var name = delBtn.getAttribute('data-name') || 'Callback';
                        if (confirm('Delete callback for "' + name + '"?')) {
                            tr.remove();
                            showToast('Callback "' + name + '" deleted successfully');
                        }
                        return;
                    }

                    var editBtn = e.target.closest('[data-cb5="edit"]');
                    if (editBtn) {
                        e.preventDefault();
                        document.getElementById('cb5EditId').value = editBtn.getAttribute('data-id') || '';
                        document.getElementById('cb5ModalTitle').textContent = 'Edit Callback';
                        document.getElementById('cb5NmName').value = editBtn.getAttribute('data-name') || '';
                        document.getElementById('cb5NmPhone').value = editBtn.getAttribute('data-phone') || '';
                        document.getElementById('cb5NmNote').value = editBtn.getAttribute('data-note') || '';

                        var tz = editBtn.getAttribute('data-tz');
                        var src = editBtn.getAttribute('data-source');
                        var st = editBtn.getAttribute('data-status');
                        var pri = editBtn.getAttribute('data-priority');
                        var asg = editBtn.getAttribute('data-assignee');
                        var fromDate = editBtn.getAttribute('data-from-date') || '';
                        var toDate = editBtn.getAttribute('data-to-date') || fromDate;
                        var fromTime = editBtn.getAttribute('data-from-time') || '10:30';
                        var toTime = editBtn.getAttribute('data-to-time') || '11:00';
                        var reqDate = editBtn.getAttribute('data-req-date') || '';

                        if (document.getElementById('cb5NmFromDate')) document.getElementById('cb5NmFromDate').value = fromDate;
                        if (document.getElementById('cb5NmToDate')) document.getElementById('cb5NmToDate').value = toDate;
                        if (document.getElementById('cb5NmFromTime')) document.getElementById('cb5NmFromTime').value = fromTime;
                        if (document.getElementById('cb5NmToTime')) document.getElementById('cb5NmToTime').value = toTime;
                        if (document.getElementById('cb5NmRequested')) document.getElementById('cb5NmRequested').value = reqDate;

                        if (window.jQuery && jQuery.fn.select2) {
                            if (tz) jQuery('#cb5NmTz').val(tz).trigger('change.select2');
                            if (src) jQuery('#cb5NmSource').val(src).trigger('change.select2');
                            if (st) jQuery('#cb5NmStatus').val(st).trigger('change.select2');
                            if (pri) jQuery('#cb5NmPriority').val(pri).trigger('change.select2');
                            if (asg) jQuery('#cb5NmAssignees').val(asg).trigger('change.select2');
                        }

                        if (cbModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(cbModalEl).show();
                        }
                        return;
                    }
                });

                /* Inline table select2 status change */
                if (window.jQuery) {
                    jQuery(document).on('change', '.cb5-status-select', function () {
                        var sel = this;
                        var tr = sel.closest('tr');
                        if (!tr) return;
                        var name = tr.querySelector('.fw-bold') ? tr.querySelector('.fw-bold').textContent.trim() : 'Callback';
                        var val = sel.value;
                        tr.setAttribute('data-status', val);
                        showToast('"' + name + '" status changed to ' + val);
                    });
                }
            }

            /* Modal Submit */
            var submitBtn = document.getElementById('cb5NmSubmit');
            if (submitBtn) {
                submitBtn.addEventListener('click', function () {
                    var nm = document.getElementById('cb5NmName').value.trim();
                    var ph = document.getElementById('cb5NmPhone').value.trim();
                    if (!nm) {
                        showToast('Please enter the customer name', true);
                        return;
                    }
                    if (!ph) {
                        showToast('Please enter a phone number', true);
                        return;
                    }
                    if (cbModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(cbModalEl).hide();
                    }
                    showToast('Callback saved successfully');
                });
            }

            /* Date formatting helper DD-MM-YYYY -> YYYY-MM-DD */
            function parseDMY(str) {
                if (!str || str.length < 10) return null;
                var p = str.split('-');
                if (p.length !== 3) return null;
                return p[2] + '-' + p[1] + '-' + p[0];
            }

            /* Filter helper */
            function filterTableRows(attr, val) {
                var rows = document.querySelectorAll('#cb5Tbody tr');
                rows.forEach(function (tr) {
                    if (!val) {
                        tr.style.display = '';
                    } else if (tr.getAttribute('data-' + attr) === val) {
                        tr.style.display = '';
                    } else {
                        tr.style.display = 'none';
                    }
                });
            }

            /* Quick Filters */
            document.querySelectorAll('.cb5-quick-btn').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var type = this.getAttribute('data-quick');
                    document.querySelectorAll('.cb5-quick-btn').forEach(function (b) { b.classList.remove('active'); });
                    if (type === 'reset') {
                        if (window.jQuery && jQuery.fn.select2) {
                            jQuery('#cb5Assignees, #cb5Status, #cb5Tz, #cb5Source').val('').trigger('change.select2');
                        }
                        var f1 = document.getElementById('cb5From');
                        var f2 = document.getElementById('cb5To');
                        if (f1) f1.value = '';
                        if (f2) f2.value = '';
                        filterTableRows('', '');
                        showToast('Filters reset');
                        return;
                    }
                    this.classList.add('active');
                    if (type === 'upcoming') filterTableRows('status', 'Upcoming');
                    else if (type === 'postponed') filterTableRows('status', 'Postponed');
                    else if (type === 'todayCallback') filterTableRows('status', 'Upcoming');
                    else if (type === 'datePassed') filterTableRows('status', 'Upcoming');
                    showToast('Filtered by ' + this.textContent.trim());
                });
            });

            /* Summary Card Clicks */
            document.querySelectorAll('.cb5-sum').forEach(function (card) {
                card.addEventListener('click', function () {
                    var st = this.getAttribute('data-sum-status');
                    document.querySelectorAll('.cb5-sum').forEach(function (c) { c.classList.remove('active'); });
                    this.classList.add('active');
                    if (window.jQuery && jQuery.fn.select2) {
                        jQuery('#cb5Status').val(st).trigger('change.select2');
                    }
                    filterTableRows('status', st);
                    showToast('Filtered: ' + st);
                });
            });

            /* Search button with Date filtering */
            var searchBtn = document.getElementById('cb5SearchBtn');
            if (searchBtn) {
                searchBtn.addEventListener('click', function () {
                    var st = document.getElementById('cb5Status') ? document.getElementById('cb5Status').value : '';
                    var asg = document.getElementById('cb5Assignees') ? document.getElementById('cb5Assignees').value : '';
                    var tz = document.getElementById('cb5Tz') ? document.getElementById('cb5Tz').value : '';
                    var src = document.getElementById('cb5Source') ? document.getElementById('cb5Source').value : '';
                    var fromVal = document.getElementById('cb5From') ? document.getElementById('cb5From').value.trim() : '';
                    var toVal = document.getElementById('cb5To') ? document.getElementById('cb5To').value.trim() : '';

                    var fromIso = parseDMY(fromVal);
                    var toIso = parseDMY(toVal);

                    var rows = document.querySelectorAll('#cb5Tbody tr');
                    var count = 0;
                    rows.forEach(function (tr) {
                        var match = true;
                        if (st && tr.getAttribute('data-status') !== st) match = false;
                        if (asg && tr.getAttribute('data-assignee') !== asg) match = false;
                        if (tz && tr.getAttribute('data-tz') !== tz) match = false;
                        if (src && tr.getAttribute('data-source') !== src) match = false;

                        var rowDate = tr.getAttribute('data-from-date') || '';
                        var rowIso = parseDMY(rowDate);
                        if (rowIso) {
                            if (fromIso && rowIso < fromIso) match = false;
                            if (toIso && rowIso > toIso) match = false;
                        }

                        tr.style.display = match ? '' : 'none';
                        if (match) count++;
                    });
                    showToast(count + ' callbacks found');
                    var filterCount = 0;
                    if (st) filterCount++;
                    if (asg) filterCount++;
                    if (tz) filterCount++;
                    if (src) filterCount++;
                    if (fromVal || toVal) filterCount++;
                    var badge = document.getElementById('cb5FilterCountBadge');
                    if (badge) {
                        badge.textContent = filterCount;
                        badge.classList.toggle('d-none', filterCount === 0);
                    }
                });
            }

            /* Clear button */
            var clearBtn = document.getElementById('cb5ClearBtn');
            if (clearBtn) {
                clearBtn.addEventListener('click', function () {
                    if (window.jQuery && jQuery.fn.select2) {
                        jQuery('#cb5Assignees, #cb5Status, #cb5Tz, #cb5Source').val('').trigger('change.select2');
                    }
                    var f1 = document.getElementById('cb5From');
                    var f2 = document.getElementById('cb5To');
                    if (f1) f1.value = '';
                    if (f2) f2.value = '';
                    document.querySelectorAll('.cb5-quick-btn').forEach(function (b) { b.classList.remove('active'); });
                    document.querySelectorAll('.cb5-sum').forEach(function (c) { c.classList.remove('active'); });
                    filterTableRows('', '');
                    showToast('Filters cleared');
                    var badge = document.getElementById('cb5FilterCountBadge');
                    if (badge) {
                        badge.textContent = '0';
                        badge.classList.add('d-none');
                    }
                });
            }

            /* Check URL parameter ?new=1 */
            if (new URLSearchParams(window.location.search).get('new') === '1') {
                if (newBtn) newBtn.click();
            }
        });
    })();
</script>

<?php include 'footer.php'; ?>