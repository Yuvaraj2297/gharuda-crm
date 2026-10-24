<?php include 'header.php'; ?>

 

<style>
    /* Asset KPI Cards */
    .asset-kpi {
        min-height: 96px;
        padding: 16px;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        background: var(--white);
        box-shadow: 0 4px 16px rgba(20, 30, 25, .04);
        transition: transform .2s ease;
    }
    .asset-kpi:hover { transform: translateY(-2px); }
    .asset-kpi .icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .asset-kpi .label {
        color: var(--ink-500, #64748b);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .asset-kpi .value {
        color: var(--ink-900, #0f172a);
        font-size: 22px;
        font-weight: 800;
    }
    .asset-kpi .sub {
        color: var(--ink-500, #64748b);
        font-size: 11px;
        margin-top: 2px;
    }

    /* Workflow Stage Badges */
    .asset-status-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 99px;
    }
    .asset-status-requested { background: #fef3c7; color: #b45309; }
    .asset-status-approved { background: #e0f2fe; color: #0369a1; }
    .asset-status-assigned { background: #dcfce7; color: #15803d; }
    .asset-status-returned { background: #f3e8ff; color: #7e22ce; }
    .asset-status-damaged { background: #ffe4e6; color: #be123c; }

    /* Filter Tabs */
    .ln-stage-tab {
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #475569;
        font-weight: 600;
        font-size: 12.5px;
        padding: 6px 14px;
        border-radius: 20px;
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .ln-stage-tab:hover {
        background: #f8fafc;
        color: var(--primary, #087a24);
    }
    .ln-stage-tab.active {
        background: var(--primary, #087a24) !important;
        color: #fff !important;
        border-color: var(--primary, #087a24) !important;
    }

    .tag-badge {
        font-family: monospace;
        font-weight: 700;
        letter-spacing: 0.5px;
        background: #f1f5f9;
        color: #1e293b;
        padding: 2px 8px;
        border-radius: 6px;
        font-size: 11.5px;
        border: 1px solid #cbd5e1;
    }

    /* Workflow Timeline */
    .workflow-steps {
        display: flex;
        justify-content: space-between;
        position: relative;
        margin: 20px 0;
    }
    .workflow-steps::before {
        content: '';
        position: absolute;
        top: 14px;
        left: 20px;
        right: 20px;
        height: 3px;
        background: #e2e8f0;
        z-index: 1;
    }
    .workflow-step {
        position: relative;
        z-index: 2;
        text-align: center;
        background: #fff;
        padding: 0 5px;
    }
    .workflow-icon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #cbd5e1;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 6px;
        font-size: 13px;
        font-weight: 700;
    }
    .workflow-step.completed .workflow-icon { background: #087a24; }
    .workflow-step.active .workflow-icon { background: #0284c7; ring: 3px solid #bae6fd; }
    .workflow-text { font-size: 11px; font-weight: 600; color: #64748b; }
    .workflow-step.completed .workflow-text, .workflow-step.active .workflow-text { color: #0f172a; font-weight: 700; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Asset Provisioning & Lifecycle Management</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-person-check fs-6 text-success"></i>
            <span>Onboarding</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Asset Provisioning</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#provisionAssetModal" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-plus-lg me-1"></i> Allocate  Asset
        </button>
    </div>
</div>

<!-- KPI Metric Cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="asset-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e8f7ea;color:#087a24;"><i class="bi bi-laptop"></i></div>
            <div>
                <div class="label">Total Provisioned Assets</div>
                <div class="value">5 Devices</div>
                <div class="sub">Laptops, Mobile & Access Cards</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="asset-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#fff3dc;color:#b56b00;"><i class="bi bi-hourglass-split"></i></div>
            <div>
                <div class="label">Pending Approval & Request</div>
                <div class="value">2 Requests</div>
                <div class="sub">Awaiting HR / IT allocation</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="asset-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#e0f2fe;color:#0369a1;"><i class="bi bi-check2-square"></i></div>
            <div>
                <div class="label">Active In-Use Assets</div>
                <div class="value">2 Assigned</div>
                <div class="sub">Assigned to active employees</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="asset-kpi d-flex align-items-center gap-3">
            <div class="icon" style="background:#f3e8ff;color:#7e22ce;"><i class="bi bi-box-arrow-in-left"></i></div>
            <div>
                <div class="label">Returned & Maintenance</div>
                <div class="value">1 Returned / Damaged</div>
                <div class="sub">Exit clearance & repair</div>
            </div>
        </div>
    </div>
</div>

<!-- Workflow Stage Filter Tabs -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div class="d-flex align-items-center gap-2 flex-wrap" id="assetTabsWrap">
        <button class="ln-stage-tab active" data-filter="all">All Assets <span class="badge bg-light text-dark border ms-1">5</span></button>
        <button class="ln-stage-tab" data-filter="requested">Requested <span class="badge bg-light text-dark border ms-1">1</span></button>
        <button class="ln-stage-tab" data-filter="approved">Approved <span class="badge bg-light text-dark border ms-1">1</span></button>
        <button class="ln-stage-tab" data-filter="assigned">Assigned (In Use) <span class="badge bg-light text-dark border ms-1">2</span></button>
        <button class="ln-stage-tab" data-filter="returned">Returned <span class="badge bg-light text-dark border ms-1">1</span></button>
    </div>
</div>

<!-- Table Card with Columns modal, Excel export & Live search -->
<div class="card-custom js-report-table p-0 overflow-hidden" data-export-name="asset-provisioning-report">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search employee, asset ID, serial #..." id="employeeSearch">
        </div>
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="assetsTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Employee</th>
                    <th class="text-nowrap">Asset Type & Model</th>
                    <th class="text-nowrap">Asset Tag & Serial #</th>
                    <th class="text-nowrap">Assigned Date & By</th>
                    <th class="text-nowrap">Condition & Location</th>
                    <th class="text-nowrap">Accessories</th>
                    <th class="text-nowrap">Expected Return</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap text-end">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr class="asset-row"
                    data-empname="Kavitha Raman"
                    data-empid="EMP-2026-041"
                    data-dept="Design"
                    data-role="UI/UX Designer"
                    data-type="Laptop"
                    data-model="MacBook Pro 16&quot; (M3 Max, 36GB RAM, 1TB SSD)"
                    data-assetid="AST-MAC-2026-081"
                    data-serial="C02G4109Q05P"
                    data-assigneddate="2026-03-15"
                    data-assignedby="IT Admin (Sarah Mitchell)"
                    data-condition="New"
                    data-accessories="Magic Mouse, 140W USB-C Charger, Laptop Bag"
                    data-location="Office (HQ - Chennai)"
                    data-returndate=""
                    data-status="Assigned"
                    data-remarks="High-performance workstation for design team."
                >
                    <td class="sno-value">1</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Kavitha Raman">
                            <div>
                                <div class="fw-bold text-dark">Kavitha Raman</div>
                                <div class="text-muted" style="font-size:11px;">EMP-2026-041 • UI/UX Designer</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-laptop me-1 text-primary"></i> Laptop</div>
                        <div class="text-muted" style="font-size:11.5px;">MacBook Pro 16" (M3 Max)</div>
                    </td>
                    <td>
                        <div><span class="tag-badge">AST-MAC-2026-081</span></div>
                        <div class="text-muted" style="font-size:11px; font-family:monospace;">SN: C02G4109Q05P</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark" style="font-size:12.5px;">15-Mar-2026</div>
                        <div class="text-muted" style="font-size:11px;">IT Admin</div>
                    </td>
                    <td>
                        <span class="badge bg-success-subtle text-success border border-success-subtle me-1">New</span>
                        <span class="badge bg-light text-dark border">Office</span>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Mouse, Charger, Bag</span>
                    </td>
                    <td class="text-muted" style="font-size:12px;">N/A (Permanent)</td>
                    <td><span class="asset-status-pill asset-status-assigned"><i class="bi bi-check-circle-fill"></i> Assigned</span></td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-asset" data-bs-toggle="tooltip" title="View Handover & Lifecycle Sheet"><i class="bi bi-file-earmark-text"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-edit-asset" data-bs-toggle="tooltip" title="Edit Asset / Change Status"><i class="bi bi-pencil"></i></button>
                        </div>
                    </td>
                </tr>

                <tr class="asset-row"
                    data-empname="Rahul Verma"
                    data-empid="EMP-2026-042"
                    data-dept="Engineering"
                    data-role="Backend Engineer"
                    data-type="Monitor"
                    data-model="Dell UltraSharp 27&quot; 4K USB-C Monitor"
                    data-assetid="AST-MON-2026-014"
                    data-serial="CN-0V283H-74261"
                    data-assigneddate="2026-04-01"
                    data-assignedby="IT Hardware Lead"
                    data-condition="Good"
                    data-accessories="HDMI Cable, DisplayPort, Power Cable"
                    data-location="Office"
                    data-returndate=""
                    data-status="Approved"
                    data-remarks="Allocation approved by Tech Lead, awaiting employee pickup."
                >
                    <td class="sno-value">2</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-2.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Rahul Verma">
                            <div>
                                <div class="fw-bold text-dark">Rahul Verma</div>
                                <div class="text-muted" style="font-size:11px;">EMP-2026-042 • Backend Eng</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-display me-1 text-info"></i> Monitor</div>
                        <div class="text-muted" style="font-size:11.5px;">Dell UltraSharp 27" 4K</div>
                    </td>
                    <td>
                        <div><span class="tag-badge">AST-MON-2026-014</span></div>
                        <div class="text-muted" style="font-size:11px; font-family:monospace;">SN: CN-0V283H-74261</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark" style="font-size:12.5px;">01-Apr-2026</div>
                        <div class="text-muted" style="font-size:11px;">IT Hardware</div>
                    </td>
                    <td>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle me-1">Good</span>
                        <span class="badge bg-light text-dark border">Office</span>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">HDMI, Power Cable</span>
                    </td>
                    <td class="text-muted" style="font-size:12px;">N/A (Permanent)</td>
                    <td><span class="asset-status-pill asset-status-approved"><i class="bi bi-hand-thumbs-up-fill"></i> Approved</span></td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-asset" data-bs-toggle="tooltip" title="View Handover & Lifecycle Sheet"><i class="bi bi-file-earmark-text"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-edit-asset" data-bs-toggle="tooltip" title="Edit Asset / Change Status"><i class="bi bi-pencil"></i></button>
                        </div>
                    </td>
                </tr>

                <tr class="asset-row"
                    data-empname="Siddharth Nair"
                    data-empid="EMP-2026-043"
                    data-dept="iOS Dev"
                    data-role="iOS App Developer"
                    data-type="Mobile"
                    data-model="iPhone 15 Pro 256GB (Test Device)"
                    data-assetid="AST-MOB-2026-009"
                    data-serial="F2LXW099PN23"
                    data-assigneddate="2026-03-20"
                    data-assignedby="IT Support"
                    data-condition="Used"
                    data-accessories="USB-C Cable, Protective Case"
                    data-location="Remote (WFH)"
                    data-returndate="2026-09-20"
                    data-status="Requested"
                    data-remarks="Requested for iOS build & testing."
                >
                    <td class="sno-value">3</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <img src="./assets/img/profile-3.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:50%;" alt="Siddharth Nair">
                            <div>
                                <div class="fw-bold text-dark">Siddharth Nair</div>
                                <div class="text-muted" style="font-size:11px;">EMP-2026-043 • iOS Dev</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-phone me-1 text-warning"></i> Mobile</div>
                        <div class="text-muted" style="font-size:11.5px;">iPhone 15 Pro (Test Unit)</div>
                    </td>
                    <td>
                        <div><span class="tag-badge">AST-MOB-2026-009</span></div>
                        <div class="text-muted" style="font-size:11px; font-family:monospace;">SN: F2LXW099PN23</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark" style="font-size:12.5px;">20-Mar-2026</div>
                        <div class="text-muted" style="font-size:11px;">IT Support</div>
                    </td>
                    <td>
                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle me-1">Used</span>
                        <span class="badge bg-light text-dark border">Remote</span>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Cable, Case</span>
                    </td>
                    <td class="fw-semibold text-primary" style="font-size:12px;">20-Sep-2026</td>
                    <td><span class="asset-status-pill asset-status-requested"><i class="bi bi-hourglass-split"></i> Requested</span></td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-asset" data-bs-toggle="tooltip" title="View Handover & Lifecycle Sheet"><i class="bi bi-file-earmark-text"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-edit-asset" data-bs-toggle="tooltip" title="Edit Asset / Change Status"><i class="bi bi-pencil"></i></button>
                        </div>
                    </td>
                </tr>

                <tr class="asset-row"
                    data-empname="Priya Sundaram"
                    data-empid="EMP-2026-044"
                    data-dept="Finance"
                    data-role="Financial Analyst"
                    data-type="Access Card"
                    data-model="Biometric Smart RFID Access Card"
                    data-assetid="ACC-BLR-8819"
                    data-serial="RFID-994821"
                    data-assigneddate="2026-01-10"
                    data-assignedby="HR Operations"
                    data-condition="Good"
                    data-accessories="Company Lanyard, Card Holder"
                    data-location="Branch Office"
                    data-returndate="2026-03-31"
                    data-status="Returned"
                    data-remarks="Returned upon employee exit clearance."
                >
                    <td class="sno-value">4</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar-sm d-flex align-items-center justify-content-center bg-success text-white fw-bold" style="width:34px;height:34px;border-radius:50%;">P</div>
                            <div>
                                <div class="fw-bold text-dark">Priya Sundaram</div>
                                <div class="text-muted" style="font-size:11px;">EMP-2026-044 • Finance</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-key-fill me-1 text-success"></i> Access Card</div>
                        <div class="text-muted" style="font-size:11.5px;">Biometric RFID Card</div>
                    </td>
                    <td>
                        <div><span class="tag-badge">ACC-BLR-8819</span></div>
                        <div class="text-muted" style="font-size:11px; font-family:monospace;">SN: RFID-994821</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark" style="font-size:12.5px;">10-Jan-2026</div>
                        <div class="text-muted" style="font-size:11px;">HR Ops</div>
                    </td>
                    <td>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle me-1">Good</span>
                        <span class="badge bg-light text-dark border">Branch</span>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Lanyard, Card Holder</span>
                    </td>
                    <td class="fw-semibold text-purple" style="font-size:12px;">31-Mar-2026</td>
                    <td><span class="asset-status-pill asset-status-returned"><i class="bi bi-box-arrow-in-left"></i> Returned</span></td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-asset" data-bs-toggle="tooltip" title="View Handover & Lifecycle Sheet"><i class="bi bi-file-earmark-text"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-edit-asset" data-bs-toggle="tooltip" title="Edit Asset / Change Status"><i class="bi bi-pencil"></i></button>
                        </div>
                    </td>
                </tr>

                <tr class="asset-row"
                    data-empname="Ananya Sundaram"
                    data-empid="EMP-2026-045"
                    data-dept="Design"
                    data-role="UI/UX Designer"
                    data-type="Headset"
                    data-model="Jabra Evolve2 65 Wireless Headset"
                    data-assetid="AST-HDS-2026-033"
                    data-serial="JAB-772910"
                    data-assigneddate="2026-02-05"
                    data-assignedby="IT Support"
                    data-condition="Damaged"
                    data-accessories="Charging Stand, USB Dongle"
                    data-location="Office"
                    data-returndate=""
                    data-status="Damaged"
                    data-remarks="Mic boom arm faulty; sent to vendor repair."
                >
                    <td class="sno-value">5</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar-sm d-flex align-items-center justify-content-center bg-danger text-white fw-bold" style="width:34px;height:34px;border-radius:50%;">A</div>
                            <div>
                                <div class="fw-bold text-dark">Ananya Sundaram</div>
                                <div class="text-muted" style="font-size:11px;">EMP-2026-045 • Design</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark"><i class="bi bi-headphones me-1 text-danger"></i> Headset</div>
                        <div class="text-muted" style="font-size:11.5px;">Jabra Evolve2 65</div>
                    </td>
                    <td>
                        <div><span class="tag-badge">AST-HDS-2026-033</span></div>
                        <div class="text-muted" style="font-size:11px; font-family:monospace;">SN: JAB-772910</div>
                    </td>
                    <td>
                        <div class="fw-semibold text-dark" style="font-size:12.5px;">05-Feb-2026</div>
                        <div class="text-muted" style="font-size:11px;">IT Support</div>
                    </td>
                    <td>
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle me-1">Damaged</span>
                        <span class="badge bg-light text-dark border">Office</span>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border" style="font-size:10.5px;">Charger, Dongle</span>
                    </td>
                    <td class="text-muted" style="font-size:12px;">N/A (Repair)</td>
                    <td><span class="asset-status-pill asset-status-damaged"><i class="bi bi-exclamation-triangle-fill"></i> Damaged</span></td>
                    <td class="text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-view-asset" data-bs-toggle="tooltip" title="View Handover & Lifecycle Sheet"><i class="bi bi-file-earmark-text"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-secondary btn-edit-asset" data-bs-toggle="tooltip" title="Edit Asset / Change Status"><i class="bi bi-pencil"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Table Footer with Show Entries & Pagination -->
    <div class="d-flex justify-content-between align-items-center report-footer p-3">
        <div class="d-flex gap-2 align-items-center">
            <span class="small text-muted text-nowrap">Show:</span>
            <select class="form-select form-select-sm gh-w-auto" id="showEntries">
                <option selected>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">5</strong> of <strong id="pgTotal">5</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Modal 1: Allocate / Request Asset Modal (13 Schema Fields) -->
<div class="modal fade" id="provisionAssetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Allocate  Company Asset</h4>
                        <div class="text-muted" style="font-size:13px;">Assign Hardware, Accessories & Access Badges to Joiners</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="provisionAssetForm" onsubmit="return false;">
                <div class="modal-body p-4">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-person-badge text-success me-1"></i> Employee & Asset Classification</h6>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Select Employee *</label>
                            <select class="form-select" id="addEmpSelect" required>
                                <option value="Kavitha Raman|EMP-2026-041|Design|UI/UX Designer">Kavitha Raman (EMP-2026-041 - UI/UX Designer)</option>
                                <option value="Rahul Verma|EMP-2026-042|Engineering|Backend Engineer">Rahul Verma (EMP-2026-042 - Backend Eng)</option>
                                <option value="Siddharth Nair|EMP-2026-043|iOS Dev|iOS App Developer">Siddharth Nair (EMP-2026-043 - iOS Dev)</option>
                                <option value="Priya Sundaram|EMP-2026-044|Finance|Financial Analyst">Priya Sundaram (EMP-2026-044 - Finance)</option>
                                <option value="Ananya Sundaram|EMP-2026-045|Design|UI/UX Designer">Ananya Sundaram (EMP-2026-045 - Design)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Asset Type *</label>
                            <select class="form-select" id="addAssetType" required>
                                <option value="Laptop">Laptop Workstation</option>
                                <option value="Desktop">Desktop PC</option>
                                <option value="Monitor">Monitor & Display</option>
                                <option value="Mobile">Mobile / Test Device</option>
                                <option value="Headset">Headset & Audio</option>
                                <option value="ID Card">Employee ID Card</option>
                                <option value="Access Card">Access Card / Key</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Asset Name / Model *</label>
                            <input type="text" class="form-control" id="addAssetModel" placeholder="e.g. MacBook Pro 16 M3 Max 36GB" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Asset Tag / ID *</label>
                            <input type="text" class="form-control" id="addAssetId" placeholder="e.g. AST-MAC-2026-099" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Serial Number *</label>
                            <input type="text" class="form-control" id="addSerial" placeholder="e.g. C02G4109Q05P" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Assigned Date</label>
                            <input type="date" class="form-control" id="addAssignedDate" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Assigned By</label>
                            <select class="form-select" id="addAssignedBy">
                                <option value="IT Admin (Sarah Mitchell)">IT Admin (Sarah Mitchell)</option>
                                <option value="HR Operations">HR Operations</option>
                                <option value="Admin Support">Admin Support</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Initial Condition</label>
                            <select class="form-select" id="addCondition">
                                <option value="New">New</option>
                                <option value="Good">Good</option>
                                <option value="Used">Used</option>
                                <option value="Damaged">Damaged</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Accessories Included</label>
                            <input type="text" class="form-control" id="addAccessories" placeholder="e.g. Mouse, Keyboard, Charger, Bag">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Location</label>
                            <select class="form-select" id="addLocation">
                                <option value="Office (HQ - Chennai)">Office (HQ)</option>
                                <option value="Branch Office">Branch Office</option>
                                <option value="Remote (WFH)">Remote (WFH)</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Expected Return Date</label>
                            <input type="date" class="form-control" id="addReturnDate" placeholder="For temporary assets">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Lifecycle Status *</label>
                            <select class="form-select" id="addStatus">
                                <option value="Requested">Requested</option>
                                <option value="Approved">Approved</option>
                                <option value="Assigned" selected>Assigned (In Use)</option>
                                <option value="Returned">Returned</option>
                                <option value="Damaged">Damaged / Repair</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Remarks / Notes</label>
                            <input type="text" class="form-control" id="addRemarks" placeholder="e.g. Handover completed & sign-off received">
                        </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnSaveAsset" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                        <i class="bi bi-check2-circle me-1"></i> Save Asset Allocation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2: View Asset Handover & Inspection Sheet -->
<div class="modal fade" id="viewAssetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" id="viewAssetIconWrap" style="width:48px;height:48px;background:var(--primary, #087a24);font-size:22px;">
                        <i class="bi bi-laptop" id="viewAssetIcon"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0" id="viewAssetTitle">MacBook Pro 16" (M3 Max)</h4>
                        <div class="text-muted" style="font-size:13px;" id="viewEmpSub">Kavitha Raman • EMP-2026-041 • Design Department</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">

                <!-- Workflow Step Bar -->
                <div class="card p-3 bg-light border-0 mb-4" style="border-radius:12px;">
                    <div class="fw-bold text-dark mb-2" style="font-size:12.5px;"><i class="bi bi-diagram-3 text-success me-1"></i> Asset Lifecycle Stage</div>
                    <div class="workflow-steps" id="viewWorkflowSteps">
                        <div class="workflow-step completed" id="wfStep1">
                            <div class="workflow-icon"><i class="bi bi-check"></i></div>
                            <div class="workflow-text">Requested</div>
                        </div>
                        <div class="workflow-step completed" id="wfStep2">
                            <div class="workflow-icon"><i class="bi bi-check"></i></div>
                            <div class="workflow-text">Approved</div>
                        </div>
                        <div class="workflow-step active" id="wfStep3">
                            <div class="workflow-icon"><i class="bi bi-laptop"></i></div>
                            <div class="workflow-text">Assigned</div>
                        </div>
                        <div class="workflow-step" id="wfStep4">
                            <div class="workflow-icon"><i class="bi bi-box-arrow-in-left"></i></div>
                            <div class="workflow-text">Returned</div>
                        </div>
                        <div class="workflow-step" id="wfStep5">
                            <div class="workflow-icon"><i class="bi bi-search"></i></div>
                            <div class="workflow-text">Inspected</div>
                        </div>
                    </div>
                </div>

                <!-- Hardware Specifications Card -->
                <div class="card p-3 border mb-3" style="border-radius:12px;">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-cpu text-primary me-1"></i> Device Specifications & Identification Tag</h6>
                    <div class="row g-3 text-dark" style="font-size:13px;">
                        <div class="col-md-4"><strong>Asset Category:</strong> <br><span id="viewAssetType" class="badge bg-light text-dark border mt-1">-</span></div>
                        <div class="col-md-4"><strong>Asset Tag ID:</strong> <br><span id="viewAssetTag" class="tag-badge mt-1">-</span></div>
                        <div class="col-md-4"><strong>Serial Number:</strong> <br><span id="viewSerial" class="fw-bold text-primary mt-1" style="font-family:monospace;">-</span></div>
                        <div class="col-md-4"><strong>Condition:</strong> <br><span id="viewCondition" class="badge bg-success-subtle text-success border border-success-subtle mt-1">-</span></div>
                        <div class="col-md-4"><strong>Location:</strong> <br><span id="viewLocation" class="badge bg-light text-dark border mt-1">-</span></div>
                        <div class="col-md-4"><strong>Expected Return:</strong> <br><span id="viewReturnDate" class="fw-semibold text-muted mt-1">-</span></div>
                    </div>
                </div>

                <!-- Handover & Accessories Checklist Card -->
                <div class="card p-3 border mb-3" style="border-radius:12px;">
                    <h6 class="fw-bold text-dark mb-2"><i class="bi bi-person-check text-success me-1"></i> Handover Sign-off & Accessories</h6>
                    <div class="row g-2 text-dark" style="font-size:13px;">
                        <div class="col-md-6"><strong>Assigned Date:</strong> <span id="viewAssignedDate" class="fw-semibold">-</span></div>
                        <div class="col-md-6"><strong>Allocated By:</strong> <span id="viewAssignedBy" class="fw-semibold">-</span></div>
                        <div class="col-12 mt-2">
                            <strong>Accessories Checklist:</strong> <br>
                            <div id="viewAccessoriesWrap" class="mt-1 d-flex flex-wrap gap-1"></div>
                        </div>
                        <div class="col-12 mt-2">
                            <strong>Remarks & Notes:</strong> <br>
                            <span id="viewRemarks" class="text-muted fst-italic">-</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3: Edit Asset & Lifecycle Status Modal -->
<div class="modal fade" id="editAssetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Edit Asset & Transition Lifecycle</h4>
                        <div class="text-muted" style="font-size:13px;">Update Device Tag, Accessories or Progress Workflow Stage</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="editAssetForm" onsubmit="return false;">
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Employee Name *</label>
                            <input type="text" class="form-control" id="editEmpName" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Employee ID & Department</label>
                            <input type="text" class="form-control" id="editEmpInfo" placeholder="EMP-2026-041 • Design">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Asset Category *</label>
                            <select class="form-select" id="editAssetType" required>
                                <option value="Laptop">Laptop Workstation</option>
                                <option value="Desktop">Desktop PC</option>
                                <option value="Monitor">Monitor & Display</option>
                                <option value="Mobile">Mobile / Test Device</option>
                                <option value="Headset">Headset & Audio</option>
                                <option value="ID Card">Employee ID Card</option>
                                <option value="Access Card">Access Card / Key</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Asset Name / Model *</label>
                            <input type="text" class="form-control" id="editAssetModel" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Asset Tag ID *</label>
                            <input type="text" class="form-control" id="editAssetId" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Device Serial Number *</label>
                            <input type="text" class="form-control" id="editSerial" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Assigned Date</label>
                            <input type="date" class="form-control" id="editAssignedDate">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Assigned By</label>
                            <input type="text" class="form-control" id="editAssignedBy">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" style="font-size:13px;">Device Condition</label>
                            <select class="form-select" id="editCondition">
                                <option value="New">New</option>
                                <option value="Good">Good</option>
                                <option value="Used">Used</option>
                                <option value="Damaged">Damaged</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Accessories Included</label>
                            <input type="text" class="form-control" id="editAccessories">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Location</label>
                            <select class="form-select" id="editLocation">
                                <option value="Office (HQ - Chennai)">Office (HQ)</option>
                                <option value="Branch Office">Branch Office</option>
                                <option value="Remote (WFH)">Remote (WFH)</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Expected Return Date</label>
                            <input type="date" class="form-control" id="editReturnDate">
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Workflow Lifecycle Status *</label>
                            <select class="form-select" id="editStatus">
                                <option value="Requested">Requested (Asset Requested)</option>
                                <option value="Approved">Approved (HR/Manager Approved)</option>
                                <option value="Assigned">Assigned (In-Use by Employee)</option>
                                <option value="Returned">Returned (Exit / Handed back)</option>
                                <option value="Damaged">Damaged / Repair / Lost</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold" style="font-size:13px;">Remarks & Inspection Notes</label>
                            <input type="text" class="form-control" id="editRemarks">
                        </div>
                    </div>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnUpdateAsset" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
                        <i class="bi bi-check-lg me-1"></i> Update Asset Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentFilter = 'all';
    let currentEditRow = null;

    // Helper functions for date formatting
    function parseDateForInput(str) {
        if (!str) return '';
        str = str.trim();
        if (/^\d{4}-\d{2}-\d{2}$/.test(str)) return str;
        const months = { Jan: '01', Feb: '02', Mar: '03', Apr: '04', May: '05', Jun: '06', Jul: '07', Aug: '08', Sep: '09', Oct: '10', Nov: '11', Dec: '12' };
        const parts = str.split('-');
        if (parts.length === 3) {
            const day = parts[0].padStart(2, '0');
            const month = months[parts[1]] || '01';
            const year = parts[2];
            return `${year}-${month}-${day}`;
        }
        return '';
    }

    function formatDateForDisplay(str) {
        if (!str) return 'N/A';
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const d = new Date(str);
        if (isNaN(d.getTime())) return str;
        const day = String(d.getDate()).padStart(2, '0');
        const month = months[d.getMonth()];
        const year = d.getFullYear();
        return `${day}-${month}-${year}`;
    }

    function getAssetIconClass(type) {
        switch((type || '').toLowerCase()) {
            case 'laptop': return 'bi-laptop text-primary';
            case 'desktop': return 'bi-pc-display text-info';
            case 'monitor': return 'bi-display text-info';
            case 'mobile': return 'bi-phone text-warning';
            case 'headset': return 'bi-headphones text-danger';
            case 'id card': return 'bi-person-badge text-success';
            case 'access card': return 'bi-key-fill text-success';
            default: return 'bi-box-seam text-secondary';
        }
    }

    // Hook used by tabel.js for stage filtering
    window.attendanceRowMatches = function(row) {
        if (!row || !row.getAttribute) return true;
        const status = (row.getAttribute('data-status') || '').toLowerCase();

        if (currentFilter === 'requested') return status === 'requested';
        if (currentFilter === 'approved') return status === 'approved';
        if (currentFilter === 'assigned') return status === 'assigned';
        if (currentFilter === 'returned') return status === 'returned' || status === 'damaged';

        return true;
    };

    // Filter Tabs Click
    document.querySelectorAll('#assetTabsWrap .ln-stage-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('#assetTabsWrap .ln-stage-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            currentFilter = this.getAttribute('data-filter');
            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    });

    // View Asset Click Handler
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-view-asset');
        if (!btn) return;

        const row = btn.closest('tr');
        if (!row) return;

        const empName = row.getAttribute('data-empname') || '';
        const empId = row.getAttribute('data-empid') || '';
        const dept = row.getAttribute('data-dept') || '';
        const role = row.getAttribute('data-role') || '';
        const type = row.getAttribute('data-type') || 'Asset';
        const model = row.getAttribute('data-model') || '';
        const assetId = row.getAttribute('data-assetid') || '-';
        const serial = row.getAttribute('data-serial') || '-';
        const assignedDate = row.getAttribute('data-assigneddate') || '';
        const assignedBy = row.getAttribute('data-assignedby') || '-';
        const condition = row.getAttribute('data-condition') || 'New';
        const accessories = row.getAttribute('data-accessories') || 'Standard accessories';
        const location = row.getAttribute('data-location') || 'Office';
        const returnDate = row.getAttribute('data-returndate') || 'N/A';
        const status = row.getAttribute('data-status') || 'Assigned';
        const remarks = row.getAttribute('data-remarks') || 'No remarks provided.';

        document.getElementById('viewAssetTitle').innerText = model || type;
        document.getElementById('viewEmpSub').innerText = `${empName} • ${empId} • ${role} (${dept})`;
        document.getElementById('viewAssetType').innerText = type;
        document.getElementById('viewAssetTag').innerText = assetId;
        document.getElementById('viewSerial').innerText = serial;
        document.getElementById('viewCondition').innerText = condition;
        document.getElementById('viewLocation').innerText = location;
        document.getElementById('viewReturnDate').innerText = formatDateForDisplay(returnDate);
        document.getElementById('viewAssignedDate').innerText = formatDateForDisplay(assignedDate);
        document.getElementById('viewAssignedBy').innerText = assignedBy;
        document.getElementById('viewRemarks').innerText = remarks;

        // Render Accessories Badges
        const accWrap = document.getElementById('viewAccessoriesWrap');
        accWrap.innerHTML = '';
        accessories.split(',').forEach(item => {
            const span = document.createElement('span');
            span.className = 'badge bg-light text-dark border me-1 mb-1';
            span.style.fontSize = '11px';
            span.innerHTML = `<i class="bi bi-check2 text-success me-1"></i>${item.trim()}`;
            accWrap.appendChild(span);
        });

        // Set Workflow Steps
        const s1 = document.getElementById('wfStep1');
        const s2 = document.getElementById('wfStep2');
        const s3 = document.getElementById('wfStep3');
        const s4 = document.getElementById('wfStep4');
        const s5 = document.getElementById('wfStep5');

        [s1, s2, s3, s4, s5].forEach(s => { if (s) s.className = 'workflow-step'; });

        if (status === 'Requested') {
            s1.className = 'workflow-step active';
        } else if (status === 'Approved') {
            s1.className = 'workflow-step completed';
            s2.className = 'workflow-step active';
        } else if (status === 'Assigned') {
            s1.className = 'workflow-step completed';
            s2.className = 'workflow-step completed';
            s3.className = 'workflow-step active';
        } else if (status === 'Returned') {
            s1.className = 'workflow-step completed';
            s2.className = 'workflow-step completed';
            s3.className = 'workflow-step completed';
            s4.className = 'workflow-step active';
        } else {
            s1.className = 'workflow-step completed';
            s2.className = 'workflow-step completed';
            s3.className = 'workflow-step completed';
            s4.className = 'workflow-step completed';
            s5.className = 'workflow-step active';
        }

        const modalEl = document.getElementById('viewAssetModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    });

    // Edit Asset Click Handler
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-edit-asset');
        if (!btn) return;

        const row = btn.closest('tr');
        if (!row) return;
        currentEditRow = row;

        const empName = row.getAttribute('data-empname') || '';
        const empId = row.getAttribute('data-empid') || '';
        const dept = row.getAttribute('data-dept') || '';
        const type = row.getAttribute('data-type') || 'Laptop';
        const model = row.getAttribute('data-model') || '';
        const assetId = row.getAttribute('data-assetid') || '';
        const serial = row.getAttribute('data-serial') || '';
        const assignedDate = row.getAttribute('data-assigneddate') || '';
        const assignedBy = row.getAttribute('data-assignedby') || '';
        const condition = row.getAttribute('data-condition') || 'New';
        const accessories = row.getAttribute('data-accessories') || '';
        const location = row.getAttribute('data-location') || 'Office (HQ - Chennai)';
        const returnDate = row.getAttribute('data-returndate') || '';
        const status = row.getAttribute('data-status') || 'Assigned';
        const remarks = row.getAttribute('data-remarks') || '';

        document.getElementById('editEmpName').value = empName;
        document.getElementById('editEmpInfo').value = `${empId} • ${dept}`;
        document.getElementById('editAssetType').value = type;
        document.getElementById('editAssetModel').value = model;
        document.getElementById('editAssetId').value = assetId;
        document.getElementById('editSerial').value = serial;
        document.getElementById('editAssignedDate').value = parseDateForInput(assignedDate);
        document.getElementById('editAssignedBy').value = assignedBy;
        document.getElementById('editCondition').value = condition;
        document.getElementById('editAccessories').value = accessories;
        document.getElementById('editLocation').value = location;
        document.getElementById('editReturnDate').value = parseDateForInput(returnDate);
        document.getElementById('editStatus').value = status;
        document.getElementById('editRemarks').value = remarks;

        const modalEl = document.getElementById('editAssetModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    });

    // Update Asset Submit Handler
    const btnUpdate = document.getElementById('btnUpdateAsset');
    if (btnUpdate) {
        btnUpdate.addEventListener('click', function() {
            if (!currentEditRow) return;

            const empName = document.getElementById('editEmpName').value.trim();
            const type = document.getElementById('editAssetType').value;
            const model = document.getElementById('editAssetModel').value.trim();
            const assetId = document.getElementById('editAssetId').value.trim();
            const serial = document.getElementById('editSerial').value.trim();
            const assignedDate = document.getElementById('editAssignedDate').value;
            const assignedBy = document.getElementById('editAssignedBy').value.trim();
            const condition = document.getElementById('editCondition').value;
            const accessories = document.getElementById('editAccessories').value.trim();
            const location = document.getElementById('editLocation').value;
            const returnDate = document.getElementById('editReturnDate').value;
            const status = document.getElementById('editStatus').value;
            const remarks = document.getElementById('editRemarks').value.trim();

            if (!empName || !model || !assetId) {
                alert('Please fill out mandatory fields.');
                return;
            }

            let statusPillHtml = '';
            if (status === 'Assigned') statusPillHtml = '<span class="asset-status-pill asset-status-assigned"><i class="bi bi-check-circle-fill"></i> Assigned</span>';
            else if (status === 'Approved') statusPillHtml = '<span class="asset-status-pill asset-status-approved"><i class="bi bi-hand-thumbs-up-fill"></i> Approved</span>';
            else if (status === 'Requested') statusPillHtml = '<span class="asset-status-pill asset-status-requested"><i class="bi bi-hourglass-split"></i> Requested</span>';
            else if (status === 'Returned') statusPillHtml = '<span class="asset-status-pill asset-status-returned"><i class="bi bi-box-arrow-in-left"></i> Returned</span>';
            else statusPillHtml = '<span class="asset-status-pill asset-status-damaged"><i class="bi bi-exclamation-triangle-fill"></i> Damaged</span>';

            const iconClass = getAssetIconClass(type);

            // Update row dataset
            currentEditRow.setAttribute('data-empname', empName);
            currentEditRow.setAttribute('data-type', type);
            currentEditRow.setAttribute('data-model', model);
            currentEditRow.setAttribute('data-assetid', assetId);
            currentEditRow.setAttribute('data-serial', serial);
            currentEditRow.setAttribute('data-assigneddate', assignedDate);
            currentEditRow.setAttribute('data-assignedby', assignedBy);
            currentEditRow.setAttribute('data-condition', condition);
            currentEditRow.setAttribute('data-accessories', accessories);
            currentEditRow.setAttribute('data-location', location);
            currentEditRow.setAttribute('data-returndate', returnDate);
            currentEditRow.setAttribute('data-status', status);
            currentEditRow.setAttribute('data-remarks', remarks);

            // Update DOM Cells
            const cells = currentEditRow.querySelectorAll('td');
            if (cells[2]) cells[2].innerHTML = `<div class="fw-bold text-dark"><i class="bi ${iconClass} me-1"></i> ${type}</div><div class="text-muted" style="font-size:11.5px;">${model}</div>`;
            if (cells[3]) cells[3].innerHTML = `<div><span class="tag-badge">${assetId}</span></div><div class="text-muted" style="font-size:11px; font-family:monospace;">SN: ${serial}</div>`;
            if (cells[4]) cells[4].innerHTML = `<div class="fw-semibold text-dark" style="font-size:12.5px;">${formatDateForDisplay(assignedDate)}</div><div class="text-muted" style="font-size:11px;">${assignedBy}</div>`;
            if (cells[5]) cells[5].innerHTML = `<span class="badge bg-light text-dark border me-1">${condition}</span><span class="badge bg-light text-dark border">${location}</span>`;
            if (cells[6]) cells[6].innerHTML = `<span class="badge bg-light text-dark border" style="font-size:10.5px;">${accessories || 'Standard'}</span>`;
            if (cells[7]) cells[7].textContent = formatDateForDisplay(returnDate);
            if (cells[8]) cells[8].innerHTML = statusPillHtml;

            const modalEl = document.getElementById('editAssetModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getInstance(modalEl).hide();
            }

            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    }

    // Allocate / Save New Asset Handler
    const btnSaveAsset = document.getElementById('btnSaveAsset');
    if (btnSaveAsset) {
        btnSaveAsset.addEventListener('click', function() {
            const empVal = document.getElementById('addEmpSelect').value.split('|');
            const empName = empVal[0] || 'Employee';
            const empId = empVal[1] || 'EMP-2026-000';
            const dept = empVal[2] || 'Operations';
            const role = empVal[3] || 'Staff';

            const type = document.getElementById('addAssetType').value;
            const model = document.getElementById('addAssetModel').value.trim();
            const assetId = document.getElementById('addAssetId').value.trim();
            const serial = document.getElementById('addSerial').value.trim();
            const assignedDate = document.getElementById('addAssignedDate').value;
            const assignedBy = document.getElementById('addAssignedBy').value;
            const condition = document.getElementById('addCondition').value;
            const accessories = document.getElementById('addAccessories').value.trim();
            const location = document.getElementById('addLocation').value;
            const returnDate = document.getElementById('addReturnDate').value;
            const status = document.getElementById('addStatus').value;
            const remarks = document.getElementById('addRemarks').value.trim();

            if (!model || !assetId || !serial) {
                alert('Please fill out model name, asset tag ID, and serial number.');
                return;
            }

            const iconClass = getAssetIconClass(type);
            const pgBody = document.getElementById('pgBody');
            const rowCount = pgBody ? pgBody.querySelectorAll('tr').length + 1 : 1;

            let statusPillHtml = '';
            if (status === 'Assigned') statusPillHtml = '<span class="asset-status-pill asset-status-assigned"><i class="bi bi-check-circle-fill"></i> Assigned</span>';
            else if (status === 'Approved') statusPillHtml = '<span class="asset-status-pill asset-status-approved"><i class="bi bi-hand-thumbs-up-fill"></i> Approved</span>';
            else if (status === 'Requested') statusPillHtml = '<span class="asset-status-pill asset-status-requested"><i class="bi bi-hourglass-split"></i> Requested</span>';
            else if (status === 'Returned') statusPillHtml = '<span class="asset-status-pill asset-status-returned"><i class="bi bi-box-arrow-in-left"></i> Returned</span>';
            else statusPillHtml = '<span class="asset-status-pill asset-status-damaged"><i class="bi bi-exclamation-triangle-fill"></i> Damaged</span>';

            const tr = document.createElement('tr');
            tr.className = 'asset-row';
            tr.setAttribute('data-empname', empName);
            tr.setAttribute('data-empid', empId);
            tr.setAttribute('data-dept', dept);
            tr.setAttribute('data-role', role);
            tr.setAttribute('data-type', type);
            tr.setAttribute('data-model', model);
            tr.setAttribute('data-assetid', assetId);
            tr.setAttribute('data-serial', serial);
            tr.setAttribute('data-assigneddate', assignedDate);
            tr.setAttribute('data-assignedby', assignedBy);
            tr.setAttribute('data-condition', condition);
            tr.setAttribute('data-accessories', accessories);
            tr.setAttribute('data-location', location);
            tr.setAttribute('data-returndate', returnDate);
            tr.setAttribute('data-status', status);
            tr.setAttribute('data-remarks', remarks);

            tr.innerHTML = `
                <td class="sno-value">${rowCount}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <div class="avatar-sm d-flex align-items-center justify-content-center bg-primary text-white fw-bold" style="width:34px;height:34px;border-radius:50%;">${empName.charAt(0)}</div>
                        <div>
                            <div class="fw-bold text-dark">${empName}</div>
                            <div class="text-muted" style="font-size:11px;">${empId} • ${role}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fw-bold text-dark"><i class="bi ${iconClass} me-1"></i> ${type}</div>
                    <div class="text-muted" style="font-size:11.5px;">${model}</div>
                </td>
                <td>
                    <div><span class="tag-badge">${assetId}</span></div>
                    <div class="text-muted" style="font-size:11px; font-family:monospace;">SN: ${serial}</div>
                </td>
                <td>
                    <div class="fw-semibold text-dark" style="font-size:12.5px;">${formatDateForDisplay(assignedDate)}</div>
                    <div class="text-muted" style="font-size:11px;">${assignedBy}</div>
                </td>
                <td>
                    <span class="badge bg-light text-dark border me-1">${condition}</span>
                    <span class="badge bg-light text-dark border">${location}</span>
                </td>
                <td>
                    <span class="badge bg-light text-dark border" style="font-size:10.5px;">${accessories || 'Standard'}</span>
                </td>
                <td class="text-muted" style="font-size:12px;">${formatDateForDisplay(returnDate)}</td>
                <td>${statusPillHtml}</td>
                <td class="text-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-asset" data-bs-toggle="tooltip" title="View Handover & Lifecycle Sheet"><i class="bi bi-file-earmark-text"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-secondary btn-edit-asset" data-bs-toggle="tooltip" title="Edit Asset / Change Status"><i class="bi bi-pencil"></i></button>
                    </div>
                </td>
            `;

            if (pgBody) pgBody.appendChild(tr);

            const modalEl = document.getElementById('provisionAssetModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getInstance(modalEl).hide();
            }

            const form = document.getElementById('provisionAssetForm');
            if (form) form.reset();

            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    }
});
</script>
