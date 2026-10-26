<?php include 'header.php'; ?>

<main class="py-3 pb-5">
    <div class="container-fluid px-3 px-md-4">

        <!-- Title row -->
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="font-display fw-bold mb-0 fs-3 text-dark d-flex align-items-center">
                <i class="bi bi-whatsapp text-success me-2"></i> WhatsApp Conversations
            </h1>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill d-inline-flex align-items-center gap-2">
                <span class="spinner-grow spinner-grow-sm text-success" role="status" style="width: 8px; height: 8px;"></span>
                WhatsApp Connected
            </span>
        </div>

        <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white">
            <div class="row g-0" style="height: calc(100vh - 200px); min-height: 580px;">

                <!-- ===== Sidebar ===== -->
                <div class="col-12 col-md-5 col-lg-4 border-end d-flex flex-column h-100 bg-white">
                    <div class="p-3 bg-success text-white d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-white text-success fw-bold d-flex align-items-center justify-content-center shadow-sm" style="width: 38px; height: 38px; font-size: 18px;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <div class="fw-bold fs-6 lh-1">GHARUDA SOFTWARE</div>
                            <small class="opacity-75" style="font-size: 11px;">WhatsApp Business</small>
                        </div>
                    </div>

                    <div class="p-2 border-bottom bg-light d-flex align-items-center gap-2">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" id="waSearch" placeholder="Search contacts...">
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle bg-white" id="waTypeBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                All
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li><button type="button" class="dropdown-item wa-type-item active" data-val="all">All</button></li>
                                <li><button type="button" class="dropdown-item wa-type-item" data-val="answered">Answered</button></li>
                                <li><button type="button" class="dropdown-item wa-type-item" data-val="unanswered">Unanswered</button></li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-2 border-bottom bg-white" id="waTabs">
                        <div class="nav nav-pills nav-fill" role="tablist">
                            <button type="button" class="nav-link wa-tab active py-1 small fw-bold d-flex align-items-center justify-content-center gap-1" data-tab="lead">
                                <i class="bi bi-person-plus"></i> Leads <span class="badge bg-success text-white rounded-pill ms-1">4</span>
                            </button>
                            <button type="button" class="nav-link wa-tab py-1 small fw-bold d-flex align-items-center justify-content-center gap-1" data-tab="customer">
                                <i class="bi bi-people"></i> Cust <span class="badge bg-secondary text-white rounded-pill ms-1">2</span>
                            </button>
                            <button type="button" class="nav-link wa-tab py-1 small fw-bold d-flex align-items-center justify-content-center gap-1" data-tab="internal">
                                <i class="bi bi-person-badge"></i> Staff <span class="badge bg-secondary text-white rounded-pill ms-1">2</span>
                            </button>
                        </div>
                    </div>

                    <div class="overflow-auto flex-grow-1 p-2" id="waContacts">
                        <!-- Static Contact 1 -->
                        <button type="button" class="btn wa-contact active w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0" data-id="1" data-type="lead" data-name="Kumar" data-phone="9876543211" style="background:#f0fdf4;">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#2563eb; width:36px; height:36px;">KU</span>
                                <div>
                                    <div class="fw-bold text-dark small">Kumar <span class="badge bg-light text-primary border ms-1">Lead</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9876543211</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">1 hr ago</small>
                                <span class="wa-c-unread badge bg-danger rounded-pill">2</span>
                            </div>
                        </button>

                        <!-- Static Contact 2 -->
                        <button type="button" class="btn wa-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="2" data-type="lead" data-name="Tezt" data-phone="7410852963">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#8b5cf6; width:36px; height:36px;">TE</span>
                                <div>
                                    <div class="fw-bold text-dark small">Tezt <span class="badge bg-light text-primary border ms-1">Lead</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">7410852963</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">3 hrs ago</small>
                            </div>
                        </button>

                        <!-- Static Contact 3 -->
                        <button type="button" class="btn wa-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="3" data-type="customer" data-name="Sundar" data-phone="9876543210">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#0d9488; width:36px; height:36px;">SU</span>
                                <div>
                                    <div class="fw-bold text-dark small">Sundar <span class="badge bg-light text-success border ms-1">Cust</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9876543210</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">2 min ago</small>
                            </div>
                        </button>

                        <!-- Static Contact 4 -->
                        <button type="button" class="btn wa-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="4" data-type="customer" data-name="Sundar" data-phone="9500076041">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#d97706; width:36px; height:36px;">SU</span>
                                <div>
                                    <div class="fw-bold text-dark small">Sundar <span class="badge bg-light text-success border ms-1">Cust</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9500076041</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">Yesterday</small>
                            </div>
                        </button>

                        <!-- Static Contact 5 -->
                        <button type="button" class="btn wa-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="5" data-type="lead" data-name="Suresh" data-phone="9874561598">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#e11d48; width:36px; height:36px;">SU</span>
                                <div>
                                    <div class="fw-bold text-dark small">Suresh <span class="badge bg-light text-primary border ms-1">Lead</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9874561598</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">Yesterday</small>
                            </div>
                        </button>

                        <!-- Static Contact 6 -->
                        <button type="button" class="btn wa-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="6" data-type="internal" data-name="ghra shalu" data-phone="9788096533">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#7c3aed; width:36px; height:36px;">GS</span>
                                <div>
                                    <div class="fw-bold text-dark small">ghra shalu <span class="badge bg-light text-secondary border ms-1">Staff</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9788096533</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">2 days ago</small>
                            </div>
                        </button>

                        <!-- Static Contact 7 -->
                        <button type="button" class="btn wa-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="7" data-type="internal" data-name="Priya (Staff)" data-phone="9840011223">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#0ea5e9; width:36px; height:36px;">PS</span>
                                <div>
                                    <div class="fw-bold text-dark small">Priya (Staff) <span class="badge bg-light text-secondary border ms-1">Staff</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">9840011223</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">3 days ago</small>
                            </div>
                        </button>

                        <!-- Static Contact 8 -->
                        <button type="button" class="btn wa-contact w-100 text-start d-flex align-items-center justify-content-between p-2 mb-1 rounded-2 border-0 bg-transparent" data-id="8" data-type="lead" data-name="Vasanth" data-phone="09003247271">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" style="background:#059669; width:36px; height:36px;">VA</span>
                                <div>
                                    <div class="fw-bold text-dark small">Vasanth <span class="badge bg-light text-primary border ms-1">Lead</span></div>
                                    <small class="text-muted d-block" style="font-size:11px;">09003247271</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size:10px;">1 wk ago</small>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- ===== Chat panel ===== -->
                <div class="col-12 col-md-7 col-lg-8 d-flex flex-column h-100 bg-light">
                    <div class="p-3 bg-white border-bottom d-flex align-items-center justify-content-between" id="waChatHead">
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge rounded-circle p-2 text-white fw-bold d-flex align-items-center justify-content-center" id="waHeadAvatar" style="background:#2563eb; width:40px; height:40px;">KU</span>
                            <div>
                                <div class="fw-bold text-dark fs-6 lh-1" id="waHeadName">Kumar</div>
                                <small class="text-muted" id="waHeadPhone">9876543211 &bull; Lead</small>
                            </div>
                        </div>
                        <div>
                            <a href="tel:9876543211" class="btn btn-outline-success btn-sm rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:36px; height:36px;" title="Call"><i class="bi bi-telephone-fill"></i></a>
                        </div>
                    </div>

                    <div class="flex-grow-1 p-3 overflow-auto d-flex flex-column gap-2" id="waMessages" style="background: #efeae2;">
                        <div class="text-center small text-muted my-2 fw-semibold">
                            <span class="bg-white px-2 py-1 rounded-2 shadow-sm">Today</span>
                        </div>
                        <div class="wa-msg out d-flex flex-column align-items-end">
                            <span class="wa-bubble p-2 px-3 rounded-3 bg-success text-white shadow-sm" style="max-width: 75%;">Our new solar package offer is live, would you like the details?</span>
                            <span class="wa-msg-time small text-muted mt-1" style="font-size:11px;">09:10 AM <i class="bi bi-check2-all text-success"></i></span>
                        </div>
                        <div class="wa-msg in d-flex flex-column align-items-start">
                            <span class="wa-bubble p-2 px-3 rounded-3 bg-white shadow-sm border-0 text-dark" style="max-width: 75%;">Yes please, send me the brochure and warranty info.</span>
                            <span class="wa-msg-time small text-muted mt-1" style="font-size:11px;">09:32 AM</span>
                        </div>
                        <div class="wa-msg out d-flex flex-column align-items-end">
                            <span class="wa-bubble p-2 px-3 rounded-3 bg-success text-white shadow-sm" style="max-width: 75%;">Sent! Please find the brochure above. Let me know if you would like to schedule a site inspection.</span>
                            <span class="wa-msg-time small text-muted mt-1" style="font-size:11px;">09:35 AM <i class="bi bi-check2-all text-success"></i></span>
                        </div>
                        <div class="wa-msg in d-flex flex-column align-items-start">
                            <span class="wa-bubble p-2 px-3 rounded-3 bg-white shadow-sm border-0 text-dark" style="max-width: 75%;">Thank you, reviewing it now.</span>
                            <span class="wa-msg-time small text-muted mt-1" style="font-size:11px;">09:40 AM</span>
                        </div>
                    </div>

                    <div class="p-3 bg-white border-top d-flex align-items-center gap-2" id="waInputBar">
                        <button type="button" class="btn btn-light border text-muted" title="Attach"><i class="bi bi-paperclip"></i></button>
                        <textarea id="waInput" class="form-control" rows="1" placeholder="Type a message..." style="resize:none;"></textarea>
                        <button type="button" class="btn btn-success px-3 py-2 rounded-2 shadow-sm d-flex align-items-center justify-content-center" id="waSendBtn" title="Send"><i class="bi bi-send-fill"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<script src="./assets/js/pages/whatsapp-chat.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>

