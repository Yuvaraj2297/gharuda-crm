<?php include 'header.php'; ?>

<div class="container-fluid px-0">

    <!-- Title row -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <h1 class="h3 fw-bold text-dark mb-0">Manage Leads</h1>
    </div>

    <!-- Filters card (pure Bootstrap 5) -->
    <div class="card border-0 shadow-sm rounded-3 mb-3">
        <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
            <span class="fw-semibold text-dark"><i class="bi bi-funnel me-1 text-primary"></i> Filter Leads</span>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="mlFiltersToggle">
                <span>Filters</span><i class="bi bi-chevron-down ms-1"></i>
            </button>
        </div>
        <div class="card-body" id="mlFiltersCollapse">
            <div class="row g-3" id="mlFiltersForm">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label small fw-semibold text-muted">Search Lead</label>
                    <input class="form-control" id="mlfSearch" placeholder="Name, company or phone">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label small fw-semibold text-muted">Status</label>
                    <select class="form-select select2" id="mlfStatus">
                        <option>All Status</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label small fw-semibold text-muted">Assigned</label>
                    <select class="form-select select2" id="mlfAssigned">
                        <option>All Assigned</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label small fw-semibold text-muted">Lead Source</label>
                    <select class="form-select select2" id="mlfSource">
                        <option>All Sources</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label small fw-semibold text-muted">Year</label>
                    <select class="form-select select2" id="mlfYear">
                        <option>All Years</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 align-self-end">
                    <div class="d-flex gap-2 w-100">
                        <button type="button" class="btn btn-outline-secondary flex-fill w-100" id="mlfClear">Clear Filters</button>
                        <button type="button" class="btn btn-primary w-100 flex-fill" id="mlfApply"><i class="bi bi-funnel me-1"></i>Apply Filters</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active filters bar (chips) -->
    <div class="card border-0 shadow-sm rounded-3 mb-3 p-3 bg-white" id="mlActiveBar" hidden>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <span class="text-muted small fw-semibold"><i class="bi bi-funnel-fill me-1 text-primary"></i>Active Filters:</span>
            <div id="mlActiveList" class="d-flex flex-wrap gap-2"></div>
            <button type="button" class="btn btn-link btn-sm text-danger text-decoration-none ms-auto p-0" id="mlActiveClear">Clear All</button>
        </div>
    </div>

    <!-- Table Card Wrap -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden" id="manageLeadsTableWrap">
        <div class="table-responsive table-modern-wrap">
            <table class="table table-modern table-hover align-middle mb-0 datatable" id="manageLeadsTable" data-table-name="Manage Leads">
                <thead class="table-light">
                    <tr>
                        <th class="text-nowrap" style="width: 70px;">S.No</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap" data-no-sort>Lead Manager</th>
                        <th class="text-nowrap">Company</th>
                        <th class="text-nowrap" data-no-sort>Phone</th>
                        <th class="text-nowrap" data-no-sort>Assigned</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Last Contact</th>
                        <th class="text-nowrap">Next Follow up</th>
                        <th class="text-nowrap">Created</th>
                        <th class="text-nowrap" data-no-sort>Remark</th>
                        <th class="text-nowrap">Lead Score</th>
                        <th class="text-nowrap" data-no-sort data-no-export style="width: 120px;">Action</th>
                    </tr>
                </thead>
                <tbody id="manageLeadsTbody">
                    <tr data-id="172" data-name="f" data-company="" data-phone="" data-email="f.contact@gharuda-hrms.in"
                        data-assigned="GHRAUDA SOFTWARE" data-status="Lead" data-source="Direct" data-year="2026"
                        data-month="September" data-remark="">
                        <td>1</td>
                        <td><a href="#" class="ml-name-link" data-id="172">f</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="172" data-name="f"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="172"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td><span style="color:#adb5bd;">—</span></td>
                        <td><span style="color:#adb5bd;">—</span></td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn" data-bs-toggle="dropdown"
                                    aria-expanded="false">Lead <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item active" href="#" data-val="Lead">Lead</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New">New</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span class="ml-ago-text">3 days ago</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">3 days ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="172"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="172"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="172"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="172"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="172"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="171" data-name="MOHAN" data-company="GG COMPANY" data-phone="9677063368"
                        data-email="mohan@ggcompany.com" data-assigned="GHRAUDA SOFTWARE" data-status="New"
                        data-source="Website Form" data-year="2026" data-month="September"
                        data-remark="New enquiry from website">
                        <td>2</td>
                        <td><a href="#" class="ml-name-link" data-id="171">MOHAN</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="171" data-name="MOHAN"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="171"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>GG COMPANY</td>
                        <td><a href="tel:9677063368"
                                style="color:var(--primary);font-weight:600;text-decoration:none;font-size:12.5px;">9677063368</a>
                        </td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn ml-st-new" data-bs-toggle="dropdown"
                                    aria-expanded="false">New <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="Lead">Lead</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item active" href="#" data-val="New">New</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span class="ml-ago-text">23 hrs ago</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">6 days ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="171"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="171"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="171"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="171"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="171"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="170" data-name="Sample Data" data-company="Sample Data" data-phone="Sample Data"
                        data-email="sample.data@gharuda-hrms.in" data-assigned="GHRAUDA SOFTWARE"
                        data-status="Quotation" data-source="Indiamart" data-year="2026" data-month="August"
                        data-remark="Quotation shared">
                        <td>3</td>
                        <td><a href="#" class="ml-name-link" data-id="170">Sample Data</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="170" data-name="Sample Data"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="170"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>Sample Data</td>
                        <td>Sample Data</td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn" data-bs-toggle="dropdown"
                                    aria-expanded="false">Quotation <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="Lead">Lead</a></li>
                                    <li><a class="dropdown-item ml-status-item active" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New">New</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span style="color:#adb5bd;">—</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">4 weeks ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="170"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="170"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="170"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="170"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="170"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="169" data-name="test" data-company="q" data-phone="8015603089"
                        data-email="test.q@gharuda-hrms.in" data-assigned="GHRAUDA SOFTWARE" data-status="Lead"
                        data-source="Direct" data-year="2026" data-month="August" data-remark="">
                        <td>4</td>
                        <td><a href="#" class="ml-name-link" data-id="169">test</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="169" data-name="test"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="169"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>q</td>
                        <td><a href="tel:8015603089"
                                style="color:var(--primary);font-weight:600;text-decoration:none;font-size:12.5px;">8015603089</a>
                        </td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn" data-bs-toggle="dropdown"
                                    aria-expanded="false">Lead <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item active" href="#" data-val="Lead">Lead</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New">New</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span class="ml-ago-text">4 weeks ago</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">4 weeks ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="169"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="169"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="169"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="169"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="169"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="168" data-name="Vasanth" data-company="Tgk TEST" data-phone="09003247271"
                        data-email="vasanth@tgktest.com" data-assigned="GHRAUDA SOFTWARE" data-status="Lead"
                        data-source="Website Form" data-year="2026" data-month="August"
                        data-remark="Interested in basic plan">
                        <td>5</td>
                        <td><a href="#" class="ml-name-link" data-id="168">Vasanth</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="168" data-name="Vasanth"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="168"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>Tgk TEST</td>
                        <td><a href="tel:09003247271"
                                style="color:var(--primary);font-weight:600;text-decoration:none;font-size:12.5px;">09003247271</a>
                        </td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn" data-bs-toggle="dropdown"
                                    aria-expanded="false">Lead <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item active" href="#" data-val="Lead">Lead</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New">New</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span class="ml-ago-text">4 weeks ago</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">4 weeks ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="168"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="168"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="168"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="168"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="168"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="167" data-name="QA TEST ENGINEER" data-company="TGK" data-phone="8015"
                        data-email="qa.engineer@tgk.com" data-assigned="GHRAUDA SOFTWARE" data-status="New"
                        data-source="Referral" data-year="2026" data-month="August" data-remark="">
                        <td>6</td>
                        <td><a href="#" class="ml-name-link" data-id="167">QA TEST ENGINEER</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="167" data-name="QA TEST ENGINEER"><i
                                        class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="167"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>TGK</td>
                        <td>8015</td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn ml-st-new" data-bs-toggle="dropdown"
                                    aria-expanded="false">New <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="Lead">Lead</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item active" href="#" data-val="New">New</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span class="ml-ago-text">4 weeks ago</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">4 weeks ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="167"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="167"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="167"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="167"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="167"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="166" data-name="Suresh" data-company="ghrA SOFTWARE TECHNOLOGY" data-phone="9876543218"
                        data-email="suresh@ghratechnology.com" data-assigned="GHRAUDA SOFTWARE" data-status="Followup"
                        data-source="Indiamart" data-year="2026" data-month="August"
                        data-remark="Payment follow-up pending">
                        <td>7</td>
                        <td><a href="#" class="ml-name-link" data-id="166">Suresh</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="166" data-name="Suresh"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="166"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>ghrA SOFTWARE TECHNOLOGY</td>
                        <td><a href="tel:9876543218"
                                style="color:var(--primary);font-weight:600;text-decoration:none;font-size:12.5px;">9876543218</a>
                        </td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn ml-st-followup" data-bs-toggle="dropdown"
                                    aria-expanded="false">Followup <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="Lead">Lead</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item active" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New">New</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span class="ml-ago-text">17 hrs ago</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">a month ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="166"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="166"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="166"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="166"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="166"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="116" data-name="Hamid/ Mehdi" data-company="Kings Wharf/ Fares" data-phone=""
                        data-email="hamid.mehdi@kingswharf.com" data-assigned="GHRAUDA SOFTWARE" data-status="Lead"
                        data-source="Referral" data-year="2026" data-month="August" data-remark="Import enquiry">
                        <td>8</td>
                        <td><a href="#" class="ml-name-link" data-id="116">Hamid/ Mehdi</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="116" data-name="Hamid/ Mehdi"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="116"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>Kings Wharf/ Fares</td>
                        <td><span style="color:#adb5bd;">—</span></td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn" data-bs-toggle="dropdown"
                                    aria-expanded="false">Lead <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item active" href="#" data-val="Lead">Lead</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New">New</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span style="color:#adb5bd;">—</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">a month ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="116"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="116"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="116"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="116"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="116"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="117" data-name="James" data-company="Morrison Hershfield" data-phone=""
                        data-email="james@morrisonhershfield.com" data-assigned="GHRAUDA SOFTWARE" data-status="Lead"
                        data-source="Direct" data-year="2025" data-month="December" data-remark="">
                        <td>9</td>
                        <td><a href="#" class="ml-name-link" data-id="117">James</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="117" data-name="James"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="117"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>Morrison Hershfield</td>
                        <td><span style="color:#adb5bd;">—</span></td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn" data-bs-toggle="dropdown"
                                    aria-expanded="false">Lead <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item active" href="#" data-val="Lead">Lead</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New">New</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span style="color:#adb5bd;">—</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">10 months ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="117"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="117"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="117"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="117"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="117"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="118" data-name="Priya Sundar" data-company="Sundar Enterprises" data-phone="9840011223"
                        data-email="priya@sundarenterprises.com" data-assigned="GHRAUDA SOFTWARE"
                        data-status="Quotation" data-source="Exhibition" data-year="2026" data-month="July"
                        data-remark="Solar package quotation">
                        <td>10</td>
                        <td><a href="#" class="ml-name-link" data-id="118">Priya Sundar</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="118" data-name="Priya Sundar"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="118"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>Sundar Enterprises</td>
                        <td><a href="tel:9840011223"
                                style="color:var(--primary);font-weight:600;text-decoration:none;font-size:12.5px;">9840011223</a>
                        </td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn" data-bs-toggle="dropdown"
                                    aria-expanded="false">Quotation <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="Lead">Lead</a></li>
                                    <li><a class="dropdown-item ml-status-item active" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New">New</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span class="ml-ago-text">2 days ago</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">a month ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="118"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="118"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="118"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="118"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="118"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="119" data-name="Karthik Raja" data-company="KR Traders" data-phone="9884455667"
                        data-email="karthik@krtraders.in" data-assigned="GHRAUDA SOFTWARE" data-status="New"
                        data-source="Indiamart" data-year="2026" data-month="July" data-remark="">
                        <td>11</td>
                        <td><a href="#" class="ml-name-link" data-id="119">Karthik Raja</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="119" data-name="Karthik Raja"><i class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="119"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>KR Traders</td>
                        <td><a href="tel:9884455667"
                                style="color:var(--primary);font-weight:600;text-decoration:none;font-size:12.5px;">9884455667</a>
                        </td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn ml-st-new" data-bs-toggle="dropdown"
                                    aria-expanded="false">New <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="Lead">Lead</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item active" href="#" data-val="New">New</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span class="ml-ago-text">5 days ago</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">2 months ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="119"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="119"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="119"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="119"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="119"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="120" data-name="Lakshmi Pharma" data-company="Lakshmi Pharma" data-phone="9884200088"
                        data-email="info@lakshmipharma.in" data-assigned="GHRAUDA SOFTWARE" data-status="Followup"
                        data-source="Website Form" data-year="2025" data-month="July"
                        data-remark="AMC renewal discussion">
                        <td>12</td>
                        <td><a href="#" class="ml-name-link" data-id="120">Lakshmi Pharma</a></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-lm-btn ml-chat-btn" title="SMS GHRAUDA SOFTWARE"
                                    data-id="120" data-name="Lakshmi Pharma"><i
                                        class="bi bi-chat-dots-fill"></i></button>
                                <button type="button" class="ml-lm-btn ml-mail-btn" title="Email GHRAUDA SOFTWARE"
                                    data-id="120"><i class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                        <td>Lakshmi Pharma</td>
                        <td><a href="tel:9884200088"
                                style="color:var(--primary);font-weight:600;text-decoration:none;font-size:12.5px;">9884200088</a>
                        </td>
                        <td><span class="ml-avatar" data-bs-toggle="tooltip" data-bs-title="GHRAUDA SOFTWARE">GS</span>
                        </td>
                        <td>
                            <div class="dropdown ml-status-dd">
                                <button type="button" class="ml-status-btn ml-st-followup" data-bs-toggle="dropdown"
                                    aria-expanded="false">Followup <i class="bi bi-chevron-down"
                                        style="font-size:9px;"></i></button>
                                <ul class="dropdown-menu ml-status-menu">
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="Lead">Lead</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Quotation">Quotation</a></li>
                                    <li><a class="dropdown-item ml-status-item active" href="#"
                                            data-val="Followup">Followup</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Qualified">Qualified</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="DIRECT">DIRECT</a>
                                    </li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New Enquiry">New
                                            Enquiry</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#" data-val="New">New</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Customer">Customer</a></li>
                                    <li><a class="dropdown-item ml-status-item" href="#"
                                            data-val="Waiting for Response">Waiting for Response</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><span class="ml-ago-text">1 week ago</span></td>
                        <td><span class="ml-no-pill">No</span></td>
                        <td><span class="ml-ago-text">14 months ago</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn doc" title="View / Edit remark" data-id="120"><i
                                        class="bi bi-file-earmark-text-fill"></i></button>
                                <button type="button" class="ml-act-btn view ml-remark-eye" title="View remark"
                                    data-id="120"><i class="bi bi-eye-fill"></i></button>
                            </div>
                        </td>
                        <td>0</td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="ml-act-btn view" title="View lead" data-id="120"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button type="button" class="ml-act-btn del" title="Delete lead" data-id="120"><i
                                        class="bi bi-trash-fill"></i></button>
                                <button type="button" class="ml-act-btn mail" title="Send to Email" data-id="120"><i
                                        class="bi bi-envelope-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Bulk SMS modal (image flow: Message + Close/Confirm) -->
<div class="modal fade" id="bulkSmsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Bulk SMS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div>
                    <label>Message</label>
                    <textarea class="form-control" id="bulkSmsMessage"
                        placeholder="Type your SMS message here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="bulkSmsConfirmBtn">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- SMS to lead modal (chat button) -->
<div class="modal fade" id="mlSmsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="mlSmsTitle" style="font-size:15px;">SMS To:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div>
                    <label class="form-label fw-bold" style="font-size:12.5px;">Message</label>
                    <textarea class="form-control" id="mlSmsMessage" rows="5"
                        placeholder="Type your message here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="mlSmsSendBtn">send</button>
            </div>
        </div>
    </div>
</div>

<!-- Compose Email modal (mail button) -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<div class="modal fade" id="mlComposeEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Compose Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mce-field">
                    <label style="text-transform:uppercase;">Send email using (SMTP)</label>
                    <select class="form-select select2" id="mlCeSmtp">
                        <option selected>USE SYSTEM SMTP ( info@gharuda-hrms.in )</option>
                    </select>
                </div>
                <div class="mce-field">
                    <label>Templates</label>
                    <select class="form-select select2" id="mlCeTemplate">
                        <option value="" selected>Non selected</option>
                        <option>Standard Quotation</option>
                        <option>Solar Installation</option>
                    </select>
                </div>
                <div class="mce-field">
                    <label>Email To</label>
                    <select class="form-select select2" id="mlCeTo">
                        <option value="">Non selected</option>
                    </select>
                </div>
                <div class="mce-field">
                    <label>Email CC</label>
                    <input type="email" class="form-control" id="mlCeCc" placeholder="">
                </div>
                <div class="mce-field">
                    <label>Email Subject</label>
                    <input type="text" class="form-control" id="mlCeSubject" placeholder="">
                </div>
                <div class="mce-field">
                    <label>Email Content</label>
                    <div class="mce-quill-wrap">
                        <div id="mlCeQuill"></div>
                    </div>
                </div>
                <div class="mce-field">
                    <label>Attachment</label>
                    <div class="mce-attach-row">
                        <input type="file" class="form-control" id="mlCeAttachment" multiple>
                        <button type="button" class="mce-add-file" id="mlCeAddFile" title="Add more attachments"><i
                                class="bi bi-plus-lg"></i></button>
                    </div>
                    <div id="mlCeFileList" class="mt-2"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="mlCeSend">send</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Remark modal (remark doc button) -->
<div class="modal fade" id="mlRemarkModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="mlRemarkTitle">Add Remark</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Message</label>
                    <textarea class="form-control" id="mlRemarkMessage"
                        placeholder="Type your remark here..."></textarea>
                </div>
                <div>
                    <label>Next Follow up</label>
                    <input type="date" class="form-control" id="mlRemarkFollow">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="mlRemarkSave">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Remarks view modal (remark eye button) -->
<div class="modal fade" id="mlRemarksViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="mrvTitle">Remarks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="d-flex px-2 border-bottom" style="background:#fff;border-radius:12px 12px 0 0;">
                <button type="button" class="mrv-tab active">Remark</button>
            </div>
            <div class="modal-body">
                <div class="mrv-timeline" id="mrvList"></div>
            </div>
        </div>
    </div>
</div>

<!-- Lead View modal (view button) -->
<div class="modal fade" id="mlViewLeadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="mlViewTitle">#172 - f</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="px-4 pt-3 border-bottom bg-white">
                <ul class="nav nav-pills gap-1" id="mlvTabs">
                    <li class="nav-item"><button type="button" class="nav-link active py-1 px-3 mlv-tab" data-tab="all">All <span class="badge bg-secondary-subtle text-secondary ms-1 mlv-tab-count">0</span></button></li>
                    <li class="nav-item"><button type="button" class="nav-link py-1 px-3 mlv-tab" data-tab="call">Call Details <span class="badge bg-secondary-subtle text-secondary ms-1 mlv-tab-count">0</span></button></li>
                    <li class="nav-item"><button type="button" class="nav-link py-1 px-3 mlv-tab" data-tab="sms">Sms <span class="badge bg-secondary-subtle text-secondary ms-1 mlv-tab-count">0</span></button></li>
                    <li class="nav-item"><button type="button" class="nav-link py-1 px-3 mlv-tab" data-tab="recordings">Recordings <span class="badge bg-secondary-subtle text-secondary ms-1 mlv-tab-count">0</span></button></li>
                    <li class="nav-item"><button type="button" class="nav-link py-1 px-3 mlv-tab" data-tab="conference">Conference call <span class="badge bg-secondary-subtle text-secondary ms-1 mlv-tab-count">0</span></button></li>
                    <li class="nav-item"><button type="button" class="nav-link py-1 px-3 mlv-tab" data-tab="remarks">Remarks <span class="badge bg-secondary-subtle text-secondary ms-1 mlv-tab-count">0</span></button></li>
                </ul>
            </div>
            <div class="modal-body">
                <div class="mlv-timeline" id="mlvActivityList"></div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        'use strict';

        var statusOptions = ['Lead', 'Quotation', 'Followup', 'Qualified', 'DIRECT', 'New Enquiry', 'New', 'Customer', 'Waiting for Response'];

        function getLeadData(id) {
            var tr = document.querySelector('#manageLeadsTable tbody tr[data-id="' + id + '"]');
            if (!tr) return null;
            return {
                id: tr.getAttribute('data-id'),
                name: tr.getAttribute('data-name') || '',
                company: tr.getAttribute('data-company') || '',
                phone: tr.getAttribute('data-phone') || '',
                email: tr.getAttribute('data-email') || '',
                assigned: tr.getAttribute('data-assigned') || '',
                status: tr.getAttribute('data-status') || '',
                source: tr.getAttribute('data-source') || '',
                year: tr.getAttribute('data-year') || '',
                month: tr.getAttribute('data-month') || '',
                remark: tr.getAttribute('data-remark') || ''
            };
        }

        function getAllLeadsData() {
            var rows = document.querySelectorAll('#manageLeadsTable tbody tr[data-id]');
            return Array.from(rows).map(function (tr) {
                return {
                    id: tr.getAttribute('data-id'),
                    name: tr.getAttribute('data-name') || '',
                    company: tr.getAttribute('data-company') || '',
                    phone: tr.getAttribute('data-phone') || '',
                    email: tr.getAttribute('data-email') || '',
                    assigned: tr.getAttribute('data-assigned') || '',
                    status: tr.getAttribute('data-status') || '',
                    source: tr.getAttribute('data-source') || '',
                    year: tr.getAttribute('data-year') || '',
                    month: tr.getAttribute('data-month') || '',
                    remark: tr.getAttribute('data-remark') || ''
                };
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            var tableEl = document.getElementById('manageLeadsTable');
            var tbody = document.getElementById('manageLeadsTbody');

            /* ---- Compose Email modal (lazy-init Quill, lead.php pattern) ---- */
            var mlCeQuill = null;

            function initMlComposeEmail(rec) {
                var m = document.getElementById('mlComposeEmailModal');
                if (!m) return;
                if (!mlCeQuill && typeof Quill !== 'undefined') {
                    mlCeQuill = new Quill('#mlCeQuill', {
                        theme: 'snow',
                        placeholder: 'Write your email here...',
                        modules: {
                            toolbar: [
                                [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                                [{ color: [] }, { background: [] }],
                                ['bold', 'italic', 'underline'],
                                [{ align: [] }],
                                ['image', 'link'],
                                [{ list: 'bullet' }, { list: 'ordered' }],
                                ['clean']
                            ]
                        }
                    });
                }
                var toEl = document.getElementById('mlCeTo');
                var subjEl = document.getElementById('mlCeSubject');
                if (toEl) {
                    toEl.innerHTML = '<option value="">Non selected</option>';
                    getAllLeadsData().forEach(function (r) {
                        if (r.email) {
                            toEl.innerHTML += '<option value="' + r.email + '"' + (rec && String(r.id) === String(rec.id) ? ' selected' : '') + '>' + r.name + ' ( ' + r.email + ' )</option>';
                        }
                    });
                    if (window.jQuery && jQuery(toEl).data('select2')) {
                        jQuery(toEl).trigger('change.select2');
                    }
                }
                if (subjEl) subjEl.value = rec ? 'Lead #' + rec.id + (rec.name ? ' - ' + rec.name : '') : '';

                if (window.jQuery && jQuery.fn.select2) {
                    jQuery('#mlComposeEmailModal .select2').each(function () {
                        var $s = jQuery(this);
                        if ($s.data('select2')) $s.select2('destroy');
                        $s.select2({ width: '100%', dropdownParent: jQuery('#mlComposeEmailModal') });
                    });
                }

                bootstrap.Modal.getOrCreateInstance(m).show();
            }

            /* ---- Template select -> fill editor (demo templates) ---- */
            var mlCeTplSel = document.getElementById('mlCeTemplate');
            if (mlCeTplSel) {
                var applyTpl = function () {
                    if (!mlCeQuill) return;
                    var tpl = mlCeTplSel.value;
                    if (tpl === 'Standard Quotation') {
                        mlCeQuill.root.innerHTML = '<p>Dear Customer,</p><p>Please find our standard quotation attached.</p><p>Kind Regards,</p><p>GHARUDA SOFTWARE</p>';
                    } else if (tpl === 'Solar Installation') {
                        mlCeQuill.root.innerHTML = '<p>Dear Customer,</p><p>Thank you for your interest in our solar installation services.</p><p>Kind Regards,</p><p>GHARUDA SOFTWARE</p>';
                    } else {
                        mlCeQuill.root.innerHTML = '';
                    }
                };
                mlCeTplSel.addEventListener('change', applyTpl);
                if (window.jQuery) {
                    window.jQuery(mlCeTplSel).on('change.select2', applyTpl);
                }
            }

            /* ---- Attachment + add-file rows ---- */
            var mlCeAddFileBtn = document.getElementById('mlCeAddFile');
            if (mlCeAddFileBtn) {
                mlCeAddFileBtn.addEventListener('click', function () {
                    var row = document.createElement('div');
                    row.className = 'mce-attach-row mt-2';
                    row.innerHTML = '<input type="file" class="form-control" multiple>' +
                        '<button type="button" class="mce-add-file" title="Remove this row" style="background:#ef4444;"><i class="bi bi-x-lg"></i></button>';
                    row.querySelector('button').addEventListener('click', function () { row.remove(); });
                    var listWrap = document.getElementById('mlCeAttachment').closest('.mce-attach-row').parentNode;
                    listWrap.insertBefore(row, document.getElementById('mlCeFileList'));
                });
            }

            /* ---- send click -> validation + spinner + success ---- */
            var mlCeSendBtn = document.getElementById('mlCeSend');
            if (mlCeSendBtn) {
                mlCeSendBtn.addEventListener('click', function () {
                    var toEl = document.getElementById('mlCeTo');
                    var subjEl = document.getElementById('mlCeSubject');
                    if (!toEl.value) { alert('Please select Email To.'); toEl.focus(); return; }
                    if (!subjEl.value.trim()) { alert('Email Subject is required.'); subjEl.focus(); return; }
                    mlCeSendBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Sending...';
                    setTimeout(function () {
                        mlCeSendBtn.innerHTML = 'send';
                        var m = document.getElementById('mlComposeEmailModal');
                        if (m) bootstrap.Modal.getOrCreateInstance(m).hide();
                        var toName = toEl.options[toEl.selectedIndex] ? toEl.options[toEl.selectedIndex].textContent : toEl.value;
                        alert('\u2705 Email sent to ' + toName + '.');
                        toEl.value = '';
                        document.getElementById('mlCeCc').value = '';
                        subjEl.value = '';
                        if (mlCeQuill) mlCeQuill.root.innerHTML = '';
                        document.getElementById('mlCeTemplate').value = '';
                        if (window.jQuery) {
                            jQuery('#mlCeTo, #mlCeTemplate').trigger('change.select2');
                        }
                    }, 900);
                });
            }

            /* ---- Table Row Delegated Clicks (chat, mail, doc, eye, view, delete, status) ---- */
            if (tbody) {
                tbody.addEventListener('click', function (e) {
                    var chatBtn = e.target.closest('.ml-chat-btn');
                    if (chatBtn) {
                        var leadId = chatBtn.getAttribute('data-id');
                        var leadName = chatBtn.getAttribute('data-name') || '';
                        var titleEl = document.getElementById('mlSmsTitle');
                        var msgEl = document.getElementById('mlSmsMessage');
                        if (titleEl) titleEl.textContent = 'SMS To: #' + leadId + (leadName ? ' - ' + leadName : '');
                        if (msgEl) msgEl.value = '';
                        var smsModalEl = document.getElementById('mlSmsModal');
                        if (smsModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(smsModalEl).show();
                        }
                        return;
                    }

                    var mailBtn = e.target.closest('.ml-mail-btn');
                    if (mailBtn) {
                        var rec = getLeadData(mailBtn.getAttribute('data-id'));
                        initMlComposeEmail(rec);
                        return;
                    }

                    /* ---- Remark column: doc = Add Remark modal ---- */
                    var remDocBtn = e.target.closest('.ml-act-btn.doc');
                    if (remDocBtn) {
                        mlvRemarkLeadId = remDocBtn.getAttribute('data-id');
                        var remRec = getLeadData(mlvRemarkLeadId);
                        var titleEl = document.getElementById('mlRemarkTitle');
                        var msgEl = document.getElementById('mlRemarkMessage');
                        var folEl = document.getElementById('mlRemarkFollow');
                        if (titleEl) titleEl.textContent = 'Add Remark' + (remRec ? ' — #' + remRec.id + (remRec.name ? ' ' + remRec.name : '') : '');
                        if (msgEl) msgEl.value = remRec ? (remRec.remark || '') : '';
                        if (folEl) folEl.value = '';
                        var rm = document.getElementById('mlRemarkModal');
                        if (rm && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(rm).show();
                        return;
                    }

                    var remEyeBtn = e.target.closest('.ml-remark-eye');
                    if (remEyeBtn) {
                        var vId = remEyeBtn.getAttribute('data-id');
                        var vRec = getLeadData(vId);
                        var listEl = document.getElementById('mrvList');
                        var titleEl = document.getElementById('mrvTitle');
                        if (titleEl) titleEl.textContent = 'Remarks' + (vRec ? ' — #' + vRec.id + (vRec.name ? ' ' + vRec.name : '') : '');
                        if (listEl) {
                            var items = [];
                            if (vRec && vRec.remark) {
                                items.push({ text: vRec.remark, when: '17 MINUTES AGO', by: vRec.assigned || 'GHARUDA SOFTWARE' });
                            }
                            items.push(
                                { text: 'Customer requested revised quotation with GST breakdown', when: 'AN HOUR AGO', by: 'GHARUDA SOFTWARE' },
                                { text: 'Discussed payment terms — 50% advance confirmed', when: '5 HOURS AGO', by: 'GHRAUDA SOFTWARE' },
                                { text: 'Site visit scheduled for next week inspection', when: 'YESTERDAY', by: 'GHARUDA SOFTWARE' },
                                { text: 'Initial enquiry received from Indiamart', when: '2 DAYS AGO', by: 'GHRAUDA SOFTWARE' },
                                { text: 'Lead assigned and first contact made', when: '3 DAYS AGO', by: 'GHARUDA SOFTWARE' }
                            );

                            var html = '';
                            items.forEach(function (it) {
                                var initials = it.by.split(' ').map(function (w) { return w[0]; }).join('').substring(0, 4).toUpperCase();
                                html +=
                                    '<div class="card border-0 shadow-sm rounded-3 mb-3 p-3">' +
                                    '<div class="d-flex justify-content-between align-items-center mb-2">' +
                                    '<span class="badge bg-primary-subtle text-primary border border-primary-subtle"><i class="bi bi-chat-left-quote-fill me-1"></i>REMARK</span>' +
                                    '<span class="text-muted small">' + it.when + '</span>' +
                                    '</div>' +
                                    '<p class="mb-2 text-dark">' + it.text + '</p>' +
                                    '<div class="d-flex align-items-center justify-content-end gap-2 pt-2 border-top small text-muted">' +
                                    '<span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold" style="width:24px;height:24px;display:inline-flex;align-items:center;justify-content:center;">' + initials + '</span>' +
                                    '<span>' + it.by + '</span>' +
                                    '</div>' +
                                    '</div>';
                            });
                            listEl.innerHTML = html;
                        }
                        var rm = document.getElementById('mlRemarksViewModal');
                        if (rm && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(rm).show();
                        return;
                    }

                    /* ---- Action column: view / delete / send-to-email ---- */
                    var viewBtn = e.target.closest('.ml-act-btn.view');
                    if (viewBtn) {
                        var recId = viewBtn.getAttribute('data-id');
                        openMlViewLead(recId);
                        return;
                    }

                    var delBtn = e.target.closest('.ml-act-btn.del');
                    if (delBtn) {
                        var delId = delBtn.getAttribute('data-id');
                        var delTr = delBtn.closest('tr[data-id]');
                        var delRec = getLeadData(delId);
                        if (confirm('Are you sure you want to delete Lead #' + delId + (delRec && delRec.name ? ' — ' + delRec.name : '') + '?')) {
                            if (tableEl && tableEl.autoTable) {
                                tableEl.autoTable.deleteRow(delTr);
                            } else if (delTr) {
                                delTr.remove();
                            }
                            updateBulkSmsToolbar();
                        }
                        return;
                    }

                    var actMailBtn = e.target.closest('.ml-act-btn.mail');
                    if (actMailBtn) {
                        var mRec = getLeadData(actMailBtn.getAttribute('data-id'));
                        initMlComposeEmail(mRec);
                        return;
                    }

                    var item = e.target.closest('.ml-status-item');
                    if (item) {
                        e.preventDefault();
                        var tr = item.closest('tr[data-id]');
                        if (tr) {
                            var val = item.getAttribute('data-val');
                            tr.setAttribute('data-status', val);
                            var btn = tr.querySelector('.ml-status-btn');
                            if (btn) {
                                btn.className = 'ml-status-btn' + (val === 'New' ? ' ml-st-new' : (val === 'Followup' ? ' ml-st-followup' : ''));
                                btn.innerHTML = val + ' <i class="bi bi-chevron-down" style="font-size:9px;"></i>';
                            }
                            tr.querySelectorAll('.ml-status-item').forEach(function (si) {
                                si.classList.toggle('active', si.getAttribute('data-val') === val);
                            });
                            var dd = item.closest('.dropdown');
                            if (dd && typeof bootstrap !== 'undefined') {
                                var ddBtn = dd.querySelector('[data-bs-toggle="dropdown"]');
                                if (ddBtn) bootstrap.Dropdown.getOrCreateInstance(ddBtn).hide();
                            }
                            if (tableEl && tableEl.autoTable) {
                                tableEl.autoTable.refresh();
                            }
                        }
                        return;
                    }

                    var link = e.target.closest('.ml-name-link');
                    if (link) {
                        e.preventDefault();
                        var nId = link.getAttribute('data-id');
                        openMlViewLead(nId);
                        return;
                    }
                });
            }

            /* ---- Bulk SMS modal (image flow: Message + Close/Confirm) ---- */
            var bulkSmsModalEl = document.getElementById('bulkSmsModal');
            var bulkSmsModal = (typeof bootstrap !== 'undefined' && bulkSmsModalEl) ? bootstrap.Modal.getOrCreateInstance(bulkSmsModalEl) : null;

            var bulkSmsBtn = document.getElementById('mlBulkSmsBtn');
            if (bulkSmsBtn) {
                bulkSmsBtn.addEventListener('click', function () {
                    var n = countSelectedLeads();
                    if (!n) return;
                    var msgEl = document.getElementById('bulkSmsMessage');
                    if (msgEl) msgEl.value = '';
                    if (bulkSmsModal) bulkSmsModal.show();
                });
            }

            var bulkSmsConfirmBtn = document.getElementById('bulkSmsConfirmBtn');
            if (bulkSmsConfirmBtn) {
                bulkSmsConfirmBtn.addEventListener('click', function () {
                    var msgEl = document.getElementById('bulkSmsMessage');
                    var n = countSelectedLeads();
                    if (!msgEl.value.trim()) { alert('Please type a message.'); msgEl.focus(); return; }
                    bulkSmsConfirmBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Sending...';
                    setTimeout(function () {
                        bulkSmsConfirmBtn.innerHTML = 'Confirm';
                        if (bulkSmsModal) bulkSmsModal.hide();
                        alert('\u2705 Bulk SMS sent to ' + n + ' lead(s).');
                        msgEl.value = '';
                        document.querySelectorAll('#manageLeadsTable tbody .row-select:checked').forEach(function (c) { c.checked = false; });
                        updateBulkSmsToolbar();
                    }, 800);
                });
            }

            var smsSendBtn = document.getElementById('mlSmsSendBtn');
            if (smsSendBtn) {
                smsSendBtn.addEventListener('click', function () {
                    var msgEl = document.getElementById('mlSmsMessage');
                    var titleEl = document.getElementById('mlSmsTitle');
                    if (!msgEl.value.trim()) { alert('Please type a message.'); return; }
                    smsSendBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Sending...';
                    setTimeout(function () {
                        smsSendBtn.innerHTML = 'send';
                        var smsModalEl = document.getElementById('mlSmsModal');
                        if (smsModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(smsModalEl).hide();
                        }
                        alert('\u2705 SMS sent' + (titleEl ? ' — ' + titleEl.textContent : '') + '.');
                        msgEl.value = '';
                    }, 800);
                });
            }

            /* ================================================================
               Lead View modal — tabs + activity timeline (image flow)
               ================================================================ */
            var mlvCurrentTab = 'all';
            var mlvRemarkLeadId = null;

            /* ---- Add Remark modal: Save -> update remark + next follow up ---- */
            var remarkSaveBtn = document.getElementById('mlRemarkSave');
            if (remarkSaveBtn) {
                remarkSaveBtn.addEventListener('click', function () {
                    var msgEl = document.getElementById('mlRemarkMessage');
                    var folEl = document.getElementById('mlRemarkFollow');
                    var msg = msgEl.value.trim();
                    if (!msg) { alert('Please enter a remark message.'); msgEl.focus(); return; }
                    if (mlvRemarkLeadId !== null) {
                        var tr = document.querySelector('#manageLeadsTable tbody tr[data-id="' + mlvRemarkLeadId + '"]');
                        if (tr) {
                            tr.setAttribute('data-remark', msg);
                            if (folEl.value) {
                                var nextCol = tr.children[9];
                                if (nextCol) nextCol.innerHTML = '<span class="ml-no-pill">' + folEl.value + '</span>';
                            }
                            if (tableEl && tableEl.autoTable) tableEl.autoTable.refresh();
                        }
                    }
                    var rm = document.getElementById('mlRemarkModal');
                    if (rm && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(rm).hide();
                    msgEl.value = '';
                    if (folEl) folEl.value = '';
                    mlvRemarkLeadId = null;
                    alert('\u2705 Remark saved successfully.');
                });
            }
            var mlvCurrentLead = null;

            function mlvActivitiesFor(lead) {
                var acts = [
                    { type: 'remarks', label: 'REMARKS', text: lead.remark || 'Lead created and under follow-up', when: '17 minutes ago', by: 'GHARUDA SOFTWARE', direction: 'Outgoing', recorded: 'No' },
                    { type: 'call', label: 'CALL DETAILS', text: 'Call duration 4m 32s', when: '2 hours ago', by: 'GHRAUDA SOFTWARE', direction: 'Outgoing', recorded: 'Yes' },
                    { type: 'call', label: 'CALL DETAILS', text: 'Call duration 1m 08s', when: '1 day ago', by: 'GHRAUDA SOFTWARE', direction: 'Incoming', recorded: 'No' },
                    { type: 'sms', label: 'SMS', text: 'Quotation details shared via SMS', when: '2 days ago', by: 'GHRAUDA SOFTWARE', direction: 'Outgoing', recorded: 'No' },
                    { type: 'recordings', label: 'RECORDING', text: 'call-recording-' + lead.id + '-0214.mp3', when: '3 days ago', by: 'GHRAUDA SOFTWARE', direction: 'Outgoing', recorded: 'Yes' },
                    { type: 'conference', label: 'CONFERENCE CALL', text: 'Conference with 3 participants (20 min)', when: '5 days ago', by: 'GHRAUDA SOFTWARE', direction: 'Outgoing', recorded: 'Yes' },
                    { type: 'remarks', label: 'REMARKS', text: 'Customer asked for revised pricing', when: '1 week ago', by: 'GHARUDA SOFTWARE', direction: 'Outgoing', recorded: 'No' }
                ];
                return acts;
            }

            function mlvRenderActivities() {
                var listEl = document.getElementById('mlvActivityList');
                if (!listEl || !mlvCurrentLead) return;
                var acts = mlvActivitiesFor(mlvCurrentLead);
                var filtered = mlvCurrentTab === 'all' ? acts : acts.filter(function (a) { return a.type === mlvCurrentTab; });

                document.querySelectorAll('#mlvTabs .mlv-tab').forEach(function (tab) {
                    var t = tab.getAttribute('data-tab');
                    var count = t === 'all' ? acts.length : acts.filter(function (a) { return a.type === t; }).length;
                    var cEl = tab.querySelector('.mlv-tab-count');
                    if (cEl) cEl.textContent = count;
                });

                if (!filtered.length) {
                    listEl.innerHTML = '<div class="mlv-empty"><i class="bi bi-inbox"></i><div>No activities found for this tab.</div></div>';
                    return;
                }

                var typeStyle = {
                    call: { c: '#2563eb', icon: 'bi-telephone-fill' },
                    sms: { c: '#8b5cf6', icon: 'bi-chat-dots-fill' },
                    recordings: { c: '#f59e0b', icon: 'bi-mic-fill' },
                    conference: { c: '#ec4899', icon: 'bi-people-fill' },
                    remarks: { c: 'var(--primary)', icon: 'bi-sticky-fill' }
                };

                var html = '';
                filtered.forEach(function (a) {
                    var ts = typeStyle[a.type] || typeStyle.remarks;
                    html +=
                        '<div class="card border-0 shadow-sm rounded-3 mb-3 p-3">' +
                        '<div class="d-flex justify-content-between align-items-start mb-2">' +
                        '<span class="badge bg-primary-subtle text-primary border border-primary-subtle"><i class="bi ' + ts.icon + ' me-1"></i>' + a.label + '</span>' +
                        '<span class="text-muted small">' + a.when + '</span>' +
                        '</div>' +
                        '<p class="mb-2 text-dark fw-medium">' + a.text + '</p>' +
                        '<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">' +
                        '<div class="d-flex gap-2">' +
                        '<span class="badge ' + (a.direction === 'Incoming' ? 'bg-info-subtle text-info' : 'bg-success-subtle text-success') + '"><i class="bi bi-arrow-left-right me-1"></i>Direction: ' + a.direction + '</span>' +
                        '<span class="badge ' + (a.recorded === 'Yes' ? 'bg-success-subtle text-success' : 'bg-light text-secondary border') + '"><i class="bi bi-mic me-1"></i>Recorded: ' + a.recorded + '</span>' +
                        '</div>' +
                        '<div class="d-flex align-items-center gap-2 small text-muted">' +
                        '<span class="badge rounded-circle bg-secondary-subtle text-secondary fw-bold" style="width:24px;height:24px;display:inline-flex;align-items:center;justify-content:center;">G</span>' +
                        '<span>' + a.by + '</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                });
                listEl.innerHTML = html;
            }

            function openMlViewLead(leadId) {
                var rec = getLeadData(leadId);
                mlvCurrentLead = rec || { id: leadId, remark: '' };
                var titleEl = document.getElementById('mlViewTitle');
                if (titleEl) titleEl.textContent = '#' + leadId + (mlvCurrentLead.name ? ' - ' + mlvCurrentLead.name : '');
                mlvCurrentTab = 'all';
                document.querySelectorAll('#mlvTabs .mlv-tab').forEach(function (t) {
                    t.classList.toggle('active', t.getAttribute('data-tab') === 'all');
                });
                mlvRenderActivities();
                var m = document.getElementById('mlViewLeadModal');
                if (m && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(m).show();
            }

            var mlvTabsEl = document.getElementById('mlvTabs');
            if (mlvTabsEl) {
                mlvTabsEl.addEventListener('click', function (e) {
                    var tab = e.target.closest('.mlv-tab');
                    if (!tab) return;
                    mlvCurrentTab = tab.getAttribute('data-tab');
                    document.querySelectorAll('#mlvTabs .mlv-tab').forEach(function (t) {
                        t.classList.toggle('active', t === tab);
                    });
                    mlvRenderActivities();
                });
            }

            /* ================================================================
               Filters card (leave-report flow: toggle + apply/clear + chips)
               ================================================================ */
            var mlfApplied = { search: '', status: '', assigned: '', source: '', year: '' };

            function mlfPopulate() {
                var data = getAllLeadsData();
                function uniq(arr) {
                    var seen = {}, out = [];
                    arr.forEach(function (v) { if (v && !seen[v]) { seen[v] = 1; out.push(v); } });
                    return out.sort();
                }
                function fill(id, values, allLabel) {
                    var el = document.getElementById(id);
                    if (!el) return;
                    var cur = el.value;
                    el.innerHTML = '<option>' + allLabel + '</option>' + values.map(function (v) { return '<option>' + v + '</option>'; }).join('');
                    if (cur) el.value = cur;
                    if (window.jQuery && jQuery(el).data('select2')) {
                        jQuery(el).trigger('change.select2');
                    }
                }
                fill('mlfStatus', uniq(data.map(function (r) { return r.status; })), 'All Status');
                fill('mlfAssigned', uniq(data.map(function (r) { return r.assigned; })), 'All Assigned');
                fill('mlfSource', uniq(data.map(function (r) { return r.source; })), 'All Sources');
                fill('mlfYear', uniq(data.map(function (r) { return r.year; })), 'All Years');
            }
            mlfPopulate();

            function mlfChips() {
                var list = document.getElementById('mlActiveList');
                var bar = document.getElementById('mlActiveBar');
                if (!list || !bar) return;
                var labels = { search: 'Search', status: 'Status', assigned: 'Assigned', source: 'Source', year: 'Year' };
                var items = Object.keys(mlfApplied).filter(function (k) { return mlfApplied[k]; }).map(function (k) {
                    return { key: k, label: labels[k], value: mlfApplied[k] };
                });
                list.innerHTML = '';
                items.forEach(function (it) {
                    var chip = document.createElement('span');
                    chip.className = 'badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle d-inline-flex align-items-center gap-2 py-2 px-3 fw-semibold';
                    chip.innerHTML = it.label + ': ' + it.value +
                        ' <button type="button" class="btn-close btn-close-sm mlf-chip-close" style="font-size:8px;" aria-label="Remove ' + it.label + ' filter"></button>';
                    chip.querySelector('.mlf-chip-close').addEventListener('click', function () {
                        mlfApplied[it.key] = '';
                        var fieldMap = { search: 'mlfSearch', status: 'mlfStatus', assigned: 'mlfAssigned', source: 'mlfSource', year: 'mlfYear' };
                        var el = document.getElementById(fieldMap[it.key]);
                        if (el) {
                            if (it.key === 'status') el.value = 'All Status';
                            else if (it.key === 'assigned') el.value = 'All Assigned';
                            else if (it.key === 'source') el.value = 'All Sources';
                            else if (it.key === 'year') el.value = 'All Years';
                            else el.value = '';
                            if (window.jQuery && jQuery(el).data('select2')) {
                                jQuery(el).trigger('change.select2');
                            }
                        }
                        mlfApply();
                    });
                    list.appendChild(chip);
                });
                bar.hidden = !items.length;
            }

            /* External filter matcher used automatically by auto-master-table.js */
            window.attendanceRowMatches = function (tr) {
                if (!tr || tr.classList.contains('no-record-row')) return true;
                if (mlfApplied.search) {
                    var q = mlfApplied.search.toLowerCase();
                    var name = (tr.getAttribute('data-name') || '').toLowerCase();
                    var comp = (tr.getAttribute('data-company') || '').toLowerCase();
                    var ph = (tr.getAttribute('data-phone') || '').toLowerCase();
                    var em = (tr.getAttribute('data-email') || '').toLowerCase();
                    if (name.indexOf(q) === -1 && comp.indexOf(q) === -1 && ph.indexOf(q) === -1 && em.indexOf(q) === -1) {
                        return false;
                    }
                }
                if (mlfApplied.status && tr.getAttribute('data-status') !== mlfApplied.status) return false;
                if (mlfApplied.assigned && tr.getAttribute('data-assigned') !== mlfApplied.assigned) return false;
                if (mlfApplied.source && tr.getAttribute('data-source') !== mlfApplied.source) return false;
                if (mlfApplied.year && tr.getAttribute('data-year') !== mlfApplied.year) return false;
                return true;
            };

            function mlfApply() {
                mlfApplied.search = (document.getElementById('mlfSearch').value || '').trim();
                mlfApplied.status = selVal('mlfStatus', 'All Status');
                mlfApplied.assigned = selVal('mlfAssigned', 'All Assigned');
                mlfApplied.source = selVal('mlfSource', 'All Sources');
                mlfApplied.year = selVal('mlfYear', 'All Years');

                if (tableEl && tableEl.autoTable) {
                    tableEl.autoTable.goToPage(1);
                }
                mlfChips();
            }

            function selVal(id, allLabel) {
                var el = document.getElementById(id);
                if (!el || !el.value || el.value === allLabel) return '';
                return el.value;
            }

            var mlfApplyBtn = document.getElementById('mlfApply');
            if (mlfApplyBtn) {
                mlfApplyBtn.addEventListener('click', function () {
                    var icon = mlfApplyBtn.innerHTML;
                    mlfApplyBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Applying...';
                    setTimeout(function () {
                        mlfApplyBtn.innerHTML = icon;
                        mlfApply();
                    }, 300);
                });
            }

            var mlfClearBtn = document.getElementById('mlfClear');
            if (mlfClearBtn) {
                mlfClearBtn.addEventListener('click', function () {
                    document.getElementById('mlfSearch').value = '';
                    document.getElementById('mlfStatus').value = 'All Status';
                    document.getElementById('mlfAssigned').value = 'All Assigned';
                    document.getElementById('mlfSource').value = 'All Sources';
                    document.getElementById('mlfYear').value = 'All Years';
                    if (window.jQuery) {
                        jQuery('#mlfStatus, #mlfAssigned, #mlfSource, #mlfYear').trigger('change.select2');
                    }
                    mlfApply();
                });
            }

            var mlfActiveClear = document.getElementById('mlActiveClear');
            if (mlfActiveClear) {
                mlfActiveClear.addEventListener('click', function () {
                    if (mlfClearBtn) mlfClearBtn.click();
                });
            }

            var mlfToggle = document.getElementById('mlFiltersToggle');
            if (mlfToggle) {
                mlfToggle.addEventListener('click', function () {
                    var panel = document.getElementById('mlFiltersCollapse');
                    if (panel) {
                        var isHidden = panel.classList.toggle('d-none');
                        this.querySelector('span').textContent = isHidden ? 'Filters' : 'Hide Filters';
                        var icon = this.querySelector('i');
                        if (icon) icon.className = isHidden ? 'bi bi-chevron-down ms-1' : 'bi bi-chevron-up ms-1';
                    }
                });
            }
        });
    })();
</script>

<?php include 'footer.php'; ?>