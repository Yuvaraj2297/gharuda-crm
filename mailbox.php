<?php include 'header.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

<main class="py-3 pb-5">
    <div class="container-fluid px-3 px-md-4">

        <!-- Title row -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="font-display fw-bold mb-0 fs-3 text-dark d-flex align-items-center">
                <i class="bi bi-envelope-open text-primary me-2"></i> Mailbox
            </h1>
        </div>

        <div class="row g-3">

            <!-- ===== Sidebar ===== -->
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white sticky-top" style="top: 1rem;">
                    <button type="button" class="btn btn-primary w-100 fw-bold py-2 mb-3 shadow-sm d-flex align-items-center justify-content-center gap-2" id="mbxComposeBtn">
                        <i class="bi bi-pencil-square"></i> Compose Email
                    </button>
                    <div class="nav nav-pills flex-column gap-1" id="mbxNavWrap">
                        <button type="button" class="nav-link mbx-nav active text-start py-2 px-3 fw-semibold d-flex align-items-center justify-content-between rounded-2" data-view="inbox">
                            <span><i class="bi bi-inbox me-2"></i>Inbox</span>
                            <span class="badge bg-primary rounded-pill" id="mbxInboxCount">5</span>
                        </button>
                        <button type="button" class="nav-link mbx-nav text-start py-2 px-3 fw-semibold d-flex align-items-center justify-content-between rounded-2" data-view="sent">
                            <span><i class="bi bi-send me-2"></i>Sent</span>
                        </button>
                        <button type="button" class="nav-link mbx-nav text-start py-2 px-3 fw-semibold d-flex align-items-center justify-content-between rounded-2" data-view="draft">
                            <span><i class="bi bi-file-earmark me-2"></i>Draft</span>
                            <span class="badge bg-secondary rounded-pill" id="mbxDraftCount">0</span>
                        </button>
                        <button type="button" class="nav-link mbx-nav text-start py-2 px-3 fw-semibold d-flex align-items-center justify-content-between rounded-2" data-view="trash">
                            <span><i class="bi bi-trash me-2"></i>Trash</span>
                        </button>
                        <hr class="my-2">
                        <button type="button" class="nav-link mbx-nav text-start py-2 px-3 fw-semibold d-flex align-items-center justify-content-between rounded-2" data-view="setting">
                            <span><i class="bi bi-gear me-2"></i>Settings</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- ===== Main panel ===== -->
            <div class="col-12 col-md-8 col-lg-9">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white" style="min-height: calc(100vh - 210px);">
                    <div class="p-3 border-bottom d-flex align-items-center gap-2 bg-white" id="mbxHead">
                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle d-inline-flex align-items-center justify-content-center mbx-back" id="mbxBackBtn" title="Back" style="width:32px; height:32px; display:none;">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <h6 class="fw-bold text-dark mb-0 fs-6" id="mbxHeadTitle">Inbox</h6>
                    </div>
                    <div class="p-0" id="mbxBody">

                        <!-- 1. Mail List View (Static HTML) -->
                        <div id="mbxListView" class="mbx-view-pane">
                            <div class="list-group list-group-flush">
                                <!-- Mail 1 -->
                                <div class="list-group-item list-group-item-action mbx-mail unread p-3 d-flex align-items-start gap-3 border-start-0 border-end-0" data-id="1" role="button" style="background:#f4fbf6;">
                                    <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="background:#2563eb; width:40px; height:40px;">MR</span>
                                    <div class="flex-grow-1 min-w-0" style="min-width:0;">
                                        <div class="d-flex align-items-baseline justify-content-between gap-2 mb-1">
                                            <div class="fw-bold text-dark small text-truncate">
                                                Meena Ramesh <span class="text-muted fw-normal">&lt;meena@srlakshmi.in&gt;</span>
                                                <span class="badge bg-primary rounded-pill ms-1" style="font-size:9px;">New</span>
                                            </div>
                                            <small class="text-muted flex-shrink-0" style="font-size:11px;">10:24 AM</small>
                                        </div>
                                        <div class="fw-bold text-primary small text-truncate">Solar package quotation request</div>
                                        <small class="text-muted d-block text-truncate" style="font-size:12px;">Hi, we are planning a 5kW rooftop installation. Please share your latest quotation with GST breakdown...</small>
                                    </div>
                                    <div class="d-flex align-items-center gap-1 flex-shrink-0">
                                        <button type="button" class="btn btn-sm btn-link text-warning p-1 mbx-mail-star starred" title="Star"><i class="bi bi-star-fill"></i></button>
                                        <button type="button" class="btn btn-sm btn-link text-muted p-1 mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>

                                <!-- Mail 2 -->
                                <div class="list-group-item list-group-item-action mbx-mail unread p-3 d-flex align-items-start gap-3 border-start-0 border-end-0" data-id="2" role="button" style="background:#f4fbf6;">
                                    <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="background:#16a34a; width:40px; height:40px;">GS</span>
                                    <div class="flex-grow-1 min-w-0" style="min-width:0;">
                                        <div class="d-flex align-items-baseline justify-content-between gap-2 mb-1">
                                            <div class="fw-bold text-dark small text-truncate">
                                                GHARUDA Support <span class="text-muted fw-normal">&lt;support@gharuda-hrms.in&gt;</span>
                                                <span class="badge bg-primary rounded-pill ms-1" style="font-size:9px;">New</span>
                                            </div>
                                            <small class="text-muted flex-shrink-0" style="font-size:11px;">09:05 AM</small>
                                        </div>
                                        <div class="fw-bold text-primary small text-truncate">Your ticket #4582 has been resolved</div>
                                        <small class="text-muted d-block text-truncate" style="font-size:12px;">Good news! Your support ticket regarding payroll sync has been resolved. Let us know if you need anything else...</small>
                                    </div>
                                    <div class="d-flex align-items-center gap-1 flex-shrink-0">
                                        <button type="button" class="btn btn-sm btn-link text-muted p-1 mbx-mail-star" title="Star"><i class="bi bi-star"></i></button>
                                        <button type="button" class="btn btn-sm btn-link text-muted p-1 mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>

                                <!-- Mail 3 -->
                                <div class="list-group-item list-group-item-action mbx-mail p-3 d-flex align-items-start gap-3 border-start-0 border-end-0" data-id="3" role="button">
                                    <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="background:#8b5cf6; width:40px; height:40px;">AK</span>
                                    <div class="flex-grow-1 min-w-0" style="min-width:0;">
                                        <div class="d-flex align-items-baseline justify-content-between gap-2 mb-1">
                                            <div class="fw-bold text-dark small text-truncate">
                                                Arun Kumar <span class="text-muted fw-normal">&lt;arun.kumar@outlook.com&gt;</span>
                                            </div>
                                            <small class="text-muted flex-shrink-0" style="font-size:11px;">Yesterday</small>
                                        </div>
                                        <div class="fw-semibold text-dark small text-truncate">Site visit confirmation — Friday</div>
                                        <small class="text-muted d-block text-truncate" style="font-size:12px;">Confirmed for Friday 11 AM at the Ambattur site. Please bring the proposal document and previous bill copy...</small>
                                    </div>
                                    <div class="d-flex align-items-center gap-1 flex-shrink-0">
                                        <button type="button" class="btn btn-sm btn-link text-muted p-1 mbx-mail-star" title="Star"><i class="bi bi-star"></i></button>
                                        <button type="button" class="btn btn-sm btn-link text-muted p-1 mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>

                                <!-- Mail 4 -->
                                <div class="list-group-item list-group-item-action mbx-mail p-3 d-flex align-items-start gap-3 border-start-0 border-end-0" data-id="4" role="button">
                                    <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="background:#d97706; width:40px; height:40px;">LP</span>
                                    <div class="flex-grow-1 min-w-0" style="min-width:0;">
                                        <div class="d-flex align-items-baseline justify-content-between gap-2 mb-1">
                                            <div class="fw-bold text-dark small text-truncate">
                                                Lakshmi Pharma <span class="text-muted fw-normal">&lt;info@lakshmipharma.in&gt;</span>
                                            </div>
                                            <small class="text-muted flex-shrink-0" style="font-size:11px;">Yesterday</small>
                                        </div>
                                        <div class="fw-semibold text-dark small text-truncate">AMC renewal for inverter units</div>
                                        <small class="text-muted d-block text-truncate" style="font-size:12px;">We would like to renew the annual maintenance contract for 12 inverter units. Kindly send the renewal invoice...</small>
                                    </div>
                                    <div class="d-flex align-items-center gap-1 flex-shrink-0">
                                        <button type="button" class="btn btn-sm btn-link text-warning p-1 mbx-mail-star starred" title="Star"><i class="bi bi-star-fill"></i></button>
                                        <button type="button" class="btn btn-sm btn-link text-muted p-1 mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>

                                <!-- Mail 5 -->
                                <div class="list-group-item list-group-item-action mbx-mail p-3 d-flex align-items-start gap-3 border-start-0 border-end-0" data-id="5" role="button">
                                    <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="background:#0d9488; width:40px; height:40px;">IE</span>
                                    <div class="flex-grow-1 min-w-0" style="min-width:0;">
                                        <div class="d-flex align-items-baseline justify-content-between gap-2 mb-1">
                                            <div class="fw-bold text-dark small text-truncate">
                                                Indiamart Enquiries <span class="text-muted fw-normal">&lt;leads@indiamart.com&gt;</span>
                                            </div>
                                            <small class="text-muted flex-shrink-0" style="font-size:11px;">Mon</small>
                                        </div>
                                        <div class="fw-semibold text-dark small text-truncate">New buyer requirement — solar inverter</div>
                                        <small class="text-muted d-block text-truncate" style="font-size:12px;">A buyer is looking for 10kW solar inverters, quantity 4. Contact details attached. Respond quickly to win the lead...</small>
                                    </div>
                                    <div class="d-flex align-items-center gap-1 flex-shrink-0">
                                        <button type="button" class="btn btn-sm btn-link text-muted p-1 mbx-mail-star" title="Star"><i class="bi bi-star"></i></button>
                                        <button type="button" class="btn btn-sm btn-link text-muted p-1 mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Single Static Detail / Reading View -->
                        <div id="mbxDetailView" class="mbx-view-pane p-4" style="display:none;">
                            <div class="d-flex align-items-center gap-3 pb-3 mb-3 border-bottom">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="background:#2563eb; width:48px; height:48px; font-size:16px;">MR</span>
                                <div class="flex-grow-1 min-w-0">
                                    <h5 class="fw-bold text-dark mb-1">Solar package quotation request</h5>
                                    <small class="text-muted">
                                        <strong class="text-dark">Meena Ramesh</strong> &lt;meena@srlakshmi.in&gt; &bull; Today at 10:24 AM
                                    </small>
                                </div>
                            </div>
                            <div class="lh-base text-dark small mb-4">
                                <p class="mb-2">Hi team,</p>
                                <p class="mb-2">We are planning a 5kW rooftop solar installation at our Textiles unit located in Ambattur. Please share your latest quotation with the complete GST breakdown, subsidy details, and expected delivery timeline.</p>
                                <p class="mb-2">Also, let us know if a site inspection is required prior to finalizing the proposal. Attached is our preliminary roof layout drawing for your review.</p>
                                <p class="mt-3 mb-0">Kind regards,<br><strong>Meena Ramesh</strong><br><span class="text-muted" style="font-size:12px;">Head of Procurement &bull; Sri Lakshmi Textiles Pvt Ltd</span></p>
                            </div>
                            <div class="mt-3 pt-3 border-top mb-4">
                                <div class="small fw-bold text-muted mb-2"><i class="bi bi-paperclip me-1"></i>1 Attachment</div>
                                <a href="#" class="btn btn-sm btn-light border rounded-3 text-start d-inline-flex align-items-center gap-2" onclick="event.preventDefault();alert('Downloading Roof_Layout_Ambattur.pdf...');">
                                    <i class="bi bi-file-earmark-pdf-fill text-danger fs-6"></i>
                                    <span>Roof_Layout_Ambattur.pdf <span class="text-muted">(1.2 MB)</span></span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center gap-2 pt-2 border-top">
                                <button type="button" class="btn btn-primary btn-sm px-3" id="mbxReplyBtn"><i class="bi bi-reply me-1"></i>Reply</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm px-3" id="mbxForwardBtn"><i class="bi bi-arrow-right me-1"></i>Forward</button>
                                <button type="button" class="btn btn-outline-danger btn-sm px-3" id="mbxDetailDeleteBtn"><i class="bi bi-trash me-1"></i>Delete</button>
                            </div>
                        </div>

                        <!-- 3. Compose View (Static HTML) -->
                        <div id="mbxComposeView" class="mbx-view-pane p-4" style="display:none;">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-secondary">To</label>
                                <input type="email" class="form-control" id="mbxTo" placeholder="recipient@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-secondary">CC</label>
                                <input type="email" class="form-control" id="mbxCc" placeholder="cc@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-secondary">Subject</label>
                                <input type="text" class="form-control" id="mbxSubject" placeholder="Email subject">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-secondary">Message</label>
                                <div class="border rounded-3 overflow-hidden">
                                    <div id="mbxQuill" style="min-height: 220px;"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-secondary">Attachment</label>
                                <div class="d-flex align-items-center gap-2" id="mbxAttachWrap">
                                    <input type="file" class="form-control" multiple>
                                    <button type="button" class="btn btn-outline-primary d-inline-flex align-items-center justify-content-center" id="mbxAddFile" title="Add more attachments" style="width:38px; height:38px;"><i class="bi bi-plus-lg"></i></button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                                <button type="button" class="btn btn-outline-secondary px-4" id="mbxDraftBtn"><i class="bi bi-file-earmark me-1"></i>Save as draft</button>
                                <button type="button" class="btn btn-primary px-4" id="mbxSendBtn"><i class="bi bi-send me-1"></i>Send</button>
                            </div>
                        </div>

                        <!-- 4. Settings View (Static HTML) -->
                        <div id="mbxSettingView" class="mbx-view-pane p-4" style="display:none;">
                            <div class="card border border-light-subtle rounded-3 p-3 mb-4 bg-light">
                                <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                                    <i class="bi bi-arrow-up-right-circle text-primary"></i> Outgoing Emails (SMTP)
                                </h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">SMTP Server address</label>
                                        <input class="form-control" id="mbxSmtpHost" placeholder="smtp.gmail.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">SMTP Encryption</label>
                                        <select class="form-select" id="mbxSmtpEnc">
                                            <option value="">Non selected</option>
                                            <option selected>TLS</option>
                                            <option>SSL</option>
                                            <option>STARTTLS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">SMTP User name</label>
                                        <input class="form-control" id="mbxSmtpUser" value="info@ghratechnology.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">SMTP Password</label>
                                        <input type="password" class="form-control" id="mbxSmtpPass" value="ghratech">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">SMTP Port</label>
                                        <input class="form-control" id="mbxSmtpPort" value="587" placeholder="587">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">SMTP From Name</label>
                                        <input class="form-control" id="mbxSmtpFrom" value="GHARUDA HRMS" placeholder="">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3 mt-3">
                                    <span class="small fw-bold text-secondary"><i class="bi bi-question-circle-fill text-primary me-1"></i> Is SMTP</span>
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="mbxIsSmtp" id="smtpYes" value="yes" checked>
                                        <label class="form-check-label small" for="smtpYes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="mbxIsSmtp" id="smtpNo" value="no">
                                        <label class="form-check-label small" for="smtpNo">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="card border border-light-subtle rounded-3 p-3 mb-4 bg-light">
                                <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                                    <i class="bi bi-arrow-down-left-circle text-primary"></i> Incoming Emails (IMAP)
                                </h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">IMAP Server address</label>
                                        <input class="form-control" id="mbxImapHost" placeholder="imap.gmail.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">IMAP Encryption</label>
                                        <select class="form-select" id="mbxImapEnc">
                                            <option value="">Non selected</option>
                                            <option selected>SSL</option>
                                            <option>TLS</option>
                                            <option>STARTTLS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">IMAP User name</label>
                                        <input class="form-control" id="mbxImapUser" value="info@ghratechnology.com" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">IMAP Password</label>
                                        <input type="password" class="form-control" id="mbxImapPass" value="••••••••" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-secondary">IMAP Port</label>
                                        <input class="form-control" id="mbxImapPort" value="993">
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="d-flex align-items-center gap-3 pt-3">
                                            <span class="small fw-bold text-secondary"><i class="bi bi-question-circle-fill text-primary me-1"></i> Is IMAP</span>
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="radio" name="mbxIsImap" id="imapYes" value="yes" checked>
                                                <label class="form-check-label small" for="imapYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-0">
                                                <input class="form-check-input" type="radio" name="mbxIsImap" id="imapNo" value="no">
                                                <label class="form-check-label small" for="imapNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                                <button type="button" class="btn btn-primary px-4" id="mbxSetSave">Save Settings</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</main>


<script src="./assets/js/pages/mailbox.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
