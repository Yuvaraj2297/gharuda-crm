<?php include 'header.php'; ?>

<main class="py-3 pb-5">
    <div class="container-fluid px-3 px-md-4">

        <!-- Title row -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="font-display fw-bold mb-0 fs-3 text-dark d-flex align-items-center">
                <i class="bi bi-chat-dots-fill text-primary me-2"></i> SMS Conversations
            </h1>
        </div>

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white">
            <div class="row g-0" style="height: calc(100vh - 200px); min-height: 580px;">

                <!-- ===== Sidebar : contacts ===== -->
                <div class="col-12 col-md-5 col-lg-4 border-end d-flex flex-column h-100 bg-white">
                    <div class="p-3 bg-primary text-white d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-white text-primary fw-bold d-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px; font-size: 11px;">GHRA</div>
                        <div>
                            <div class="fw-bold fs-6 lh-1">GHARUDA SOFTWARE</div>
                            <small class="opacity-75" style="font-size: 11px;">SMS Gateway</small>
                        </div>
                    </div>

                    <div class="p-2 border-bottom bg-light d-flex align-items-center gap-2">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" id="smsSearch" placeholder="Search contacts...">
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle bg-white" id="smsTypeBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                All
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li><button type="button" class="dropdown-item sms-type-item active" data-val="all">All</button></li>
                                <li><button type="button" class="dropdown-item sms-type-item" data-val="answered">Answered</button></li>
                                <li><button type="button" class="dropdown-item sms-type-item" data-val="unanswered">Unanswered</button></li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-2 border-bottom bg-white" id="smsTabs">
                        <div class="nav nav-pills nav-fill" role="tablist">
                            <button type="button" class="nav-link sms-tab active py-1 small fw-bold d-flex align-items-center justify-content-center gap-2" data-tab="lead">
                                <i class="bi bi-person-plus"></i> Leads <span class="badge bg-primary text-white rounded-pill ms-1">5</span>
                            </button>
                            <button type="button" class="nav-link sms-tab py-1 small fw-bold d-flex align-items-center justify-content-center gap-2" data-tab="customer">
                                <i class="bi bi-people"></i> Customers <span class="badge bg-secondary text-white rounded-pill ms-1">3</span>
                            </button>
                        </div>
                    </div>

                    <div class="overflow-auto flex-grow-1 p-2" id="smsContacts">
                        <!-- Static Contact 1 -->
                        <button type="button" class="btn sms-contact active w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0" data-id="171" data-type="lead" data-name="MOHAN" data-phone="9677063368" style="background:#eafaf1;">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#2563eb; width:36px; height:36px;">MO</span>
                                <div>
                                    <div class="fw-bold text-dark small">MOHAN <span class="badge bg-light text-primary border ms-1">Lead</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9677063368</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">2 min ago</small>
                                <span class="sms-c-unread badge bg-danger rounded-pill">2</span>
                            </div>
                        </button>

                        <!-- Static Contact 2 -->
                        <button type="button" class="btn sms-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="170" data-type="lead" data-name="Test" data-phone="9807456321">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#8b5cf6; width:36px; height:36px;">TE</span>
                                <div>
                                    <div class="fw-bold text-dark small">Test <span class="badge bg-light text-primary border ms-1">Lead</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9807456321</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">1 hr ago</small>
                            </div>
                        </button>

                        <!-- Static Contact 3 -->
                        <button type="button" class="btn sms-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="168" data-type="customer" data-name="Sundar" data-phone="9876543210">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#0d9488; width:36px; height:36px;">SU</span>
                                <div>
                                    <div class="fw-bold text-dark small">Sundar <span class="badge bg-light text-success border ms-1">Cust</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9876543210</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">3 hrs ago</small>
                            </div>
                        </button>

                        <!-- Static Contact 4 -->
                        <button type="button" class="btn sms-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="166" data-type="customer" data-name="Suresh" data-phone="9876543218">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#d97706; width:36px; height:36px;">SU</span>
                                <div>
                                    <div class="fw-bold text-dark small">Suresh <span class="badge bg-light text-success border ms-1">Cust</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9876543218</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">Yesterday</small>
                            </div>
                        </button>

                        <!-- Static Contact 5 -->
                        <button type="button" class="btn sms-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="118" data-type="lead" data-name="Priya Sundar" data-phone="9840011223">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#e11d48; width:36px; height:36px;">PS</span>
                                <div>
                                    <div class="fw-bold text-dark small">Priya Sundar <span class="badge bg-light text-primary border ms-1">Lead</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9840011223</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">2 days ago</small>
                            </div>
                        </button>

                        <!-- Static Contact 6 -->
                        <button type="button" class="btn sms-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="119" data-type="lead" data-name="Test Lead" data-phone="NA">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#64748b; width:36px; height:36px;">TL</span>
                                <div>
                                    <div class="fw-bold text-dark small">Test Lead <span class="badge bg-light text-primary border ms-1">Lead</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">NA</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">3 days ago</small>
                            </div>
                        </button>

                        <!-- Static Contact 7 -->
                        <button type="button" class="btn sms-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="117" data-type="customer" data-name="test Java" data-phone="NA">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#7c3aed; width:36px; height:36px;">TJ</span>
                                <div>
                                    <div class="fw-bold text-dark small">test Java <span class="badge bg-light text-success border ms-1">Cust</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">NA</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">1 wk ago</small>
                            </div>
                        </button>

                        <!-- Static Contact 8 -->
                        <button type="button" class="btn sms-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="116" data-type="lead" data-name="Hello" data-phone="NA">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#059669; width:36px; height:36px;">HE</span>
                                <div>
                                    <div class="fw-bold text-dark small">Hello <span class="badge bg-light text-primary border ms-1">Lead</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">NA</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">2 wks ago</small>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- ===== Chat panel ===== -->
                <div class="col-12 col-md-7 col-lg-8 d-flex flex-column h-100 bg-light">
                    <div class="p-3 bg-white border-bottom d-flex align-items-center justify-content-between" id="smsChatHead">
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" id="smsHeadAvatar" style="background:#2563eb; width:40px; height:40px;">MO</span>
                            <div>
                                <div class="fw-bold text-dark fs-6 lh-1" id="smsHeadName">MOHAN</div>
                                <small class="text-muted" id="smsHeadPhone">9677063368 &bull; Lead</small>
                            </div>
                        </div>
                        <div>
                            <a href="tel:9677063368" class="btn btn-outline-success btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:36px; height:36px;" title="Call"><i class="bi bi-telephone-fill"></i></a>
                        </div>
                    </div>

                    <div class="flex-grow-1 p-3 overflow-auto d-flex flex-column gap-2" id="smsMessages" style="background: #f8fafc;">
                        <div class="text-center small text-muted my-2 fw-semibold">Today</div>
                        <div class="sms-msg in d-flex flex-column align-items-start">
                            <span class="sms-bubble p-2.5 px-3 rounded-3 bg-white shadow-sm border text-dark" style="max-width: 75%;">Hello, have you sent the quotation details?</span>
                            <span class="sms-msg-time small text-muted mt-1" style="font-size:11px;">10:02 AM</span>
                        </div>
                        <div class="sms-msg out d-flex flex-column align-items-end">
                            <span class="sms-bubble p-2.5 px-3 rounded-3 bg-primary text-white shadow-sm" style="max-width: 75%;">Hello MOHAN, I am sending it now. Please wait a moment.</span>
                            <span class="sms-msg-time small text-muted mt-1" style="font-size:11px;">10:05 AM <i class="bi bi-check2-all text-primary"></i></span>
                        </div>
                        <div class="sms-msg in d-flex flex-column align-items-start">
                            <span class="sms-bubble p-2.5 px-3 rounded-3 bg-white shadow-sm border text-dark" style="max-width: 75%;">OK sir, thank you.</span>
                            <span class="sms-msg-time small text-muted mt-1" style="font-size:11px;">10:06 AM</span>
                        </div>
                        <div class="sms-msg out d-flex flex-column align-items-end">
                            <span class="sms-bubble p-2.5 px-3 rounded-3 bg-primary text-white shadow-sm" style="max-width: 75%;">You're welcome! Please let us know if any modifications are needed.</span>
                            <span class="sms-msg-time small text-muted mt-1" style="font-size:11px;">10:08 AM <i class="bi bi-check2-all text-primary"></i></span>
                        </div>
                    </div>

                    <div class="p-3 bg-white border-top d-flex align-items-center gap-2" id="smsInputBar">
                        <textarea id="smsInput" class="form-control" rows="1" placeholder="Write your message here..." style="resize:none;"></textarea>
                        <button type="button" class="btn btn-primary px-3 py-2 rounded-2 shadow-sm d-flex align-items-center justify-content-center" id="smsSendBtn" title="Send"><i class="bi bi-send-fill"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<script src="./assets/js/pages/sms-chat.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
