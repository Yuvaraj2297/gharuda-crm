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

<script src="./assets/js/pages/manage-leads.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>