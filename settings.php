<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header & Breadcrumb -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <span>System Administration</span>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">System Settings Hub</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">System Settings</h1>
                <span class="badge rounded-pill" style="background: rgba(22, 163, 74, 0.12); color: #16a34a; font-weight:600;">System Configuration</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <div class="position-relative" style="min-width: 280px;">
                <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                <input type="text" id="settingSearchInput" class="form-control form-control-sm ps-5 py-2 shadow-none border" placeholder="Search system settings & masters..." style="border-radius: 8px;">
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm" id="clearSearchBtn" style="border-radius: 8px;" title="Reset Filter">
                <i class="bi bi-arrow-counterclockwise"></i>
            </button>
        </div>
    </div>

    <!-- Quick System KPI Strip -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">System Configuration</span>
                    <span class="p-2 rounded-2" style="background: rgba(22, 163, 74, 0.12); color: #16a34a;"><i class="bi bi-gear-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Core Settings</h3>
                <span class="text-muted small">Branches, Roles, Currencies &amp; SLAs</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Primary Currency</span>
                    <span class="p-2 rounded-2" style="background: rgba(1, 51, 118, 0.12); color: #013376;"><i class="bi bi-currency-rupee"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">INR (₹)</h3>
                <span class="text-muted small">Indian Rupee (Default)</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">SLA Resolution Policies</span>
                    <span class="p-2 rounded-2" style="background: rgba(234, 88, 12, 0.12); color: #ea580c;"><i class="bi bi-shield-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">4 Severity Tiers</h3>
                <span class="text-muted small">Critical to Low Escalations</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Data Masters Status</span>
                    <span class="p-2 rounded-2" style="background: rgba(16, 185, 129, 0.12); color: #10b981;"><i class="bi bi-database-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">16 Masters</h3>
                <span class="text-muted small">Managed via Master Menu</span>
            </div>
        </div>
    </div>

    <!-- Business Type & Multi-Industry CRM/ERP Mode Selector -->
    <div class="card border-0 shadow-sm rounded-3 p-4 mb-4 bg-white">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3 pb-2 border-bottom">
            <div>
                <h5 class="fw-bold text-dark mb-1"><i class="bi bi-Shop-window text-success me-2"></i>Company Business Type &amp; Industry Workflow Mode</h5>
                <span class="text-muted small">Configure which business model your organization operates so CRM &amp; ERP workflows adapt automatically</span>
            </div>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold" id="activeBizModeBadge">
                <i class="bi bi-check-circle-fill me-1"></i>Active: Hybrid Multi-Industry ERP (All 6 Business Types Enabled)
            </span>
        </div>

        <div class="row g-3" id="bizTypeCards">
            <div class="col-md-6 col-xl-4">
                <div class="border rounded-3 p-3 h-100 bg-light-subtle position-relative biz-mode-card border-success" data-mode="Hybrid Multi-Industry ERP (All Modules)" onclick="selectBusinessMode(this)" role="button">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-success text-white">1. All-in-One Hybrid</span>
                        <a href="lead.php" class="small fw-bold text-decoration-none">Test Flow &rarr;</a>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Solar, CCTV, Biometrics &amp; Automation</h6>
                    <p class="text-muted small mb-2">Combines On-Site Surveys, Hardware Stock Dispatch, Vendor POs, Site Installation Projects &amp; Warranty RMA Tickets.</p>
                    <div class="d-flex flex-wrap gap-1">
                        <span class="badge bg-white text-dark border">Inventory &amp; PO</span>
                        <span class="badge bg-white text-dark border">Installation Projects</span>
                        <span class="badge bg-white text-dark border">AMC &amp; RMA</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="border rounded-3 p-3 h-100 bg-white position-relative biz-mode-card" data-mode="IT, Software &amp; Digital Agency" onclick="selectBusinessMode(this)" role="button">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle">2. Software &amp; IT</span>
                        <a href="projects-list.php" class="small fw-bold text-decoration-none">Open Projects &rarr;</a>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">IT, SaaS &amp; Software Companies</h6>
                    <p class="text-muted small mb-2">Leads &rarr; Online Demo (Meet/Zoom) &rarr; SAC Proposals &rarr; Agile Projects &amp; Kanban Tasks &rarr; Cloud SLA &amp; Bug Helpdesk.</p>
                    <div class="d-flex flex-wrap gap-1">
                        <span class="badge bg-light text-secondary border">Online Demos</span>
                        <span class="badge bg-light text-secondary border">Projects &amp; Tasks</span>
                        <span class="badge bg-light text-secondary border">Bug / API SLA</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="border rounded-3 p-3 h-100 bg-white position-relative biz-mode-card" data-mode="Manufacturing, Trading &amp; Distribution" onclick="selectBusinessMode(this)" role="button">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-warning-subtle text-dark border border-warning-subtle">3. Manufacturing &amp; Trading</span>
                        <a href="inventory.php" class="small fw-bold text-decoration-none">Open Inventory &rarr;</a>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Manufacturing, Wholesale &amp; Dealers</h6>
                    <p class="text-muted small mb-2">IndiaMART/Dealer Leads &rarr; HSN Quotes &rarr; Sales Orders (SO) &rarr; Warehouse Stock &amp; Vendor POs &rarr; Brand Sales Targets.</p>
                    <div class="d-flex flex-wrap gap-1">
                        <span class="badge bg-light text-secondary border">Sales Orders</span>
                        <span class="badge bg-light text-secondary border">Stock &amp; Vendor PO</span>
                        <span class="badge bg-light text-secondary border">Brand Targets</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="border rounded-3 p-3 h-100 bg-white position-relative biz-mode-card" data-mode="Real Estate, Construction &amp; Interiors" onclick="selectBusinessMode(this)" role="button">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-info-subtle text-info border border-info-subtle">4. Construction &amp; Interiors</span>
                        <a href="mom.php" class="small fw-bold text-decoration-none">Site MOMs &rarr;</a>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Real Estate, Builders &amp; Interiors</h6>
                    <p class="text-muted small mb-2">Site Visit Scheduling &amp; MOM &rarr; BoQ Estimates &rarr; Stage-wise Project Milestones &rarr; Petty Cash &amp; Site Expenses.</p>
                    <div class="d-flex flex-wrap gap-1">
                        <span class="badge bg-light text-secondary border">Site Visits &amp; MOM</span>
                        <span class="badge bg-light text-secondary border">Milestone Billing</span>
                        <span class="badge bg-light text-secondary border">Petty Cash</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="border rounded-3 p-3 h-100 bg-white position-relative biz-mode-card" data-mode="B2B Services, Consulting &amp; Healthcare" onclick="selectBusinessMode(this)" role="button">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-secondary-subtle text-secondary border">5. B2B Services &amp; Clinics</span>
                        <a href="follow-up-list.php" class="small fw-bold text-decoration-none">Follow-Ups &rarr;</a>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Consulting, Agencies &amp; Healthcare</h6>
                    <p class="text-muted small mb-2">Daily Tele-calling Follow-Ups &amp; Callbacks &rarr; Client Appointments &rarr; Annual Retainer Contracts &rarr; GST Billing.</p>
                    <div class="d-flex flex-wrap gap-1">
                        <span class="badge bg-light text-secondary border">Follow-Up List</span>
                        <span class="badge bg-light text-secondary border">Callbacks</span>
                        <span class="badge bg-light text-secondary border">Retainer Contracts</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="border rounded-3 p-3 h-100 bg-white position-relative biz-mode-card" data-mode="Field Sales &amp; FMCG Distribution" onclick="selectBusinessMode(this)" role="button">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle">6. Field Force &amp; Retail</span>
                        <a href="staff-visiting-location-report.php" class="small fw-bold text-decoration-none">GPS Map &rarr;</a>
                    </div>
                    <h6 class="fw-bold text-dark mb-1">Field Sales &amp; Territory Distribution</h6>
                    <p class="text-muted small mb-2">Lead Map View &rarr; Field Executive GPS Visit Tracking &rarr; Travel Expense Claims &rarr; Executive Revenue Quotas.</p>
                    <div class="d-flex flex-wrap gap-1">
                        <span class="badge bg-light text-secondary border">Staff GPS Map</span>
                        <span class="badge bg-light text-secondary border">Field Expenses</span>
                        <span class="badge bg-light text-secondary border">Sales Targets</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function selectBusinessMode(cardEl) {
        document.querySelectorAll('.biz-mode-card').forEach(function(c) {
            c.classList.remove('border-success', 'bg-light-subtle');
            c.classList.add('bg-white');
        });
        cardEl.classList.remove('bg-white');
        cardEl.classList.add('border-success', 'bg-light-subtle');
        var modeName = cardEl.getAttribute('data-mode');
        localStorage.setItem('gh_business_mode', modeName);
        var badge = document.getElementById('activeBizModeBadge');
        if (badge) {
            badge.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i>Active: ' + modeName;
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        var savedMode = localStorage.getItem('gh_business_mode');
        if (savedMode) {
            document.querySelectorAll('.biz-mode-card').forEach(function(c) {
                if (c.getAttribute('data-mode') === savedMode) {
                    selectBusinessMode(c);
                }
            });
        }
    });
    </script>

    <!-- Category Filter Tabs -->
    <div class="d-flex align-items-center gap-2 mb-4 overflow-auto pb-2" id="categoryTabs">
        <button type="button" class="btn btn-sm btn-dark rounded-pill px-3 cat-btn active" data-filter="all">All Settings</button>
        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 cat-btn" data-filter="org">System &amp; Organization</button>
        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 cat-btn" data-filter="crm">CRM &amp; Pipeline Masters</button>
        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 cat-btn" data-filter="customer">Customers &amp; Finance</button>
        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 cat-btn" data-filter="meetings">Meetings &amp; Visits</button>
        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 cat-btn" data-filter="projects">Projects &amp; Support SLA</button>
        <button type="button" class="btn btn-sm btn-light border rounded-pill px-3 cat-btn" data-filter="catalog">Brand &amp; Catalog</button>
    </div>

    <!-- Settings Sections -->
    <div id="settingsContainer">

        <!-- 1. Organization & System -->
        <div class="settings-group mb-4" data-category="org">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="p-1 rounded-2" style="background: rgba(1, 51, 118, 0.1); color: #013376;"><i class="bi bi-building"></i></span>
                <h5 class="fw-bold mb-0 text-dark">Organization &amp; System Geography</h5>
                <span class="text-muted small ms-2">Company headquarters, branch infrastructure, and role authorizations</span>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="branch geography country state district location office">
                    <a href="branch.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-primary" style="background: rgba(13, 110, 253, 0.1);"><i class="bi bi-geo-alt fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Core</span>
                        </div>
                        <h6 class="fw-bold mb-1">Branch Setup</h6>
                        <p class="text-muted small mb-0">Manage company regional branches, GSTIN mappings, and office premises.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="country international codes territories">
                    <a href="country.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-primary" style="background: rgba(13, 110, 253, 0.1);"><i class="bi bi-globe-americas fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Location</span>
                        </div>
                        <h6 class="fw-bold mb-1">Countries</h6>
                        <p class="text-muted small mb-0">Configure operating countries, telephone ISD codes, and currency tags.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="state province zones regions">
                    <a href="state.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-primary" style="background: rgba(13, 110, 253, 0.1);"><i class="bi bi-map fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Location</span>
                        </div>
                        <h6 class="fw-bold mb-1">States &amp; Provinces</h6>
                        <p class="text-muted small mb-0">Define state territory divisions and GST state codes.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="district city territory municipality">
                    <a href="district.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-primary" style="background: rgba(13, 110, 253, 0.1);"><i class="bi bi-pin-map fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Location</span>
                        </div>
                        <h6 class="fw-bold mb-1">Districts &amp; Cities</h6>
                        <p class="text-muted small mb-0">Manage district jurisdiction lines and city-level sales territories.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="role permission access authorization security user admin">
                    <a href="role.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-success" style="background: rgba(22, 163, 74, 0.1);"><i class="bi bi-shield-lock fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Security</span>
                        </div>
                        <h6 class="fw-bold mb-1">Roles &amp; Permissions</h6>
                        <p class="text-muted small mb-0">Role-based privileges, data access rights, and admin designations.</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- 2. CRM & Pipeline -->
        <div class="settings-group mb-4" data-category="crm">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="p-1 rounded-2" style="background: rgba(22, 163, 74, 0.1); color: #16a34a;"><i class="bi bi-kanban"></i></span>
                <h5 class="fw-bold mb-0 text-dark">CRM &amp; Sales Pipeline</h5>
                <span class="text-muted small ms-2">Lead lifecycle stages, attribution channels, and rep quotas</span>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="lead stage pipeline deals progression win loss probability">
                    <a href="lead-stage.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-success" style="background: rgba(22, 163, 74, 0.1);"><i class="bi bi-layers fs-5"></i></span>
                            <span class="badge bg-success-subtle text-success">Funnel</span>
                        </div>
                        <h6 class="fw-bold mb-1">Lead Stages</h6>
                        <p class="text-muted small mb-0">Configure opportunity funnel stages from Discovery to Won/Closed.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="lead source attribution channel indiamart website referral cold call">
                    <a href="lead-sources-master.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-success" style="background: rgba(22, 163, 74, 0.1);"><i class="bi bi-diagram-2 fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Attribution</span>
                        </div>
                        <h6 class="fw-bold mb-1">Lead Sources</h6>
                        <p class="text-muted small mb-0">Track inbound marketing channels, referrals, portals, and digital ads.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="lead status disposition qualification follow up warm hot cold">
                    <a href="lead-status-master.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-success" style="background: rgba(22, 163, 74, 0.1);"><i class="bi bi-flag fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Lifecycle</span>
                        </div>
                        <h6 class="fw-bold mb-1">Lead Status</h6>
                        <p class="text-muted small mb-0">Define disposition tags (New, Contacted, In Review, Disqualified).</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="sales target slab quota incentive bonus achievement revenue">
                    <a href="sales-target-slabs.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-success" style="background: rgba(22, 163, 74, 0.1);"><i class="bi bi-bar-chart-steps fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Targets</span>
                        </div>
                        <h6 class="fw-bold mb-1">Sales Target Slabs</h6>
                        <p class="text-muted small mb-0">Establish executive quota slabs, achievement tiers, and commissions.</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- 3. Customers & Finance -->
        <div class="settings-group mb-4" data-category="customer">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="p-1 rounded-2" style="background: rgba(13, 148, 136, 0.1); color: #0d9488;"><i class="bi bi-wallet2"></i></span>
                <h5 class="fw-bold mb-0 text-dark">Customers &amp; Finance Masters</h5>
                <span class="text-muted small ms-2">Client classifications, industry domains, and invoice credit rules</span>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="customer category enterprise sme retail government tier client">
                    <a href="customer-categories.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-info" style="background: rgba(13, 202, 240, 0.1);"><i class="bi bi-people fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Client</span>
                        </div>
                        <h6 class="fw-bold mb-1">Customer Categories</h6>
                        <p class="text-muted small mb-0">Segment accounts into Enterprise, Mid-Market, SME, and VIP client groups.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="industry vertical sector it manufacturing healthcare domain finance">
                    <a href="industry-verticals.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-info" style="background: rgba(13, 202, 240, 0.1);"><i class="bi bi-buildings fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Sector</span>
                        </div>
                        <h6 class="fw-bold mb-1">Industry Verticals</h6>
                        <p class="text-muted small mb-0">Classify clients by market sector (Healthcare, Tech, Real Estate, Retail).</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="customer group conglomerate holding parent account association">
                    <a href="group-master.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-info" style="background: rgba(13, 202, 240, 0.1);"><i class="bi bi-collection fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Grouping</span>
                        </div>
                        <h6 class="fw-bold mb-1">Customer Groups</h6>
                        <p class="text-muted small mb-0">Group affiliated subsidiaries and multi-location corporate entities.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="payment terms credit net 15 net 30 advance milestone billing terms">
                    <a href="payment-terms-master.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-warning" style="background: rgba(255, 193, 7, 0.15);"><i class="bi bi-credit-card-2-front fs-5 text-dark"></i></span>
                            <span class="badge bg-warning-subtle text-dark">Invoicing</span>
                        </div>
                        <h6 class="fw-bold mb-1">Payment Terms</h6>
                        <p class="text-muted small mb-0">Set up standard credit agreements (Net 30, 50% Advance, Due on Receipt).</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="currency exchange rate inr usd eur foreign currency symbol format">
                    <a href="currency-master.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-warning" style="background: rgba(255, 193, 7, 0.15);"><i class="bi bi-currency-exchange fs-5 text-dark"></i></span>
                            <span class="badge bg-warning-subtle text-dark">Billing</span>
                        </div>
                        <h6 class="fw-bold mb-1">Currency Setup</h6>
                        <p class="text-muted small mb-0">Multi-currency exchange rates, default symbols, and financial display formats.</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- 4. Meetings & Visits -->
        <div class="settings-group mb-4" data-category="meetings">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="p-1 rounded-2" style="background: rgba(147, 51, 234, 0.1); color: #9333ea;"><i class="bi bi-calendar2-check"></i></span>
                <h5 class="fw-bold mb-0 text-dark">Meetings &amp; Field Visits</h5>
                <span class="text-muted small ms-2">Appointment classifications, MOM dispositions, and site activity types</span>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="meeting type appointment schedule demo negotiation consultation">
                    <a href="appointment-types.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3" style="background: rgba(147, 51, 234, 0.1); color: #9333ea;"><i class="bi bi-calendar2-event fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Calendar</span>
                        </div>
                        <h6 class="fw-bold mb-1">Meeting Types</h6>
                        <p class="text-muted small mb-0">Product demonstrations, contract sign-offs, and project kickoffs.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="meeting outcome mom disposition result success reschedule disqualified">
                    <a href="meeting-outcomes-master.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3" style="background: rgba(147, 51, 234, 0.1); color: #9333ea;"><i class="bi bi-clipboard2-check fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">MOM</span>
                        </div>
                        <h6 class="fw-bold mb-1">Meeting Outcomes</h6>
                        <p class="text-muted small mb-0">Standardized outcome dispositions (Deal Progressed, Follow-up Needed).</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="visit activity type field inspection audit onsite survey">
                    <a href="visit-activity-types.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3" style="background: rgba(147, 51, 234, 0.1); color: #9333ea;"><i class="bi bi-pin-map fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Field</span>
                        </div>
                        <h6 class="fw-bold mb-1">Visit Activity Types</h6>
                        <p class="text-muted small mb-0">Categorize on-site engineering visits, client visits, and field audits.</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- 5. Projects & Support SLA -->
        <div class="settings-group mb-4" data-category="projects">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="p-1 rounded-2" style="background: rgba(220, 38, 38, 0.1); color: #dc2626;"><i class="bi bi-briefcase"></i></span>
                <h5 class="fw-bold mb-0 text-dark">Projects &amp; Support SLA</h5>
                <span class="text-muted small ms-2">Delivery milestones, support helpdesk ticketing, and SLA response times</span>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="project type delivery turnkey retainer implementation consulting">
                    <a href="project-types-master.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-danger" style="background: rgba(220, 38, 38, 0.1);"><i class="bi bi-folder-check fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Delivery</span>
                        </div>
                        <h6 class="fw-bold mb-1">Project Types</h6>
                        <p class="text-muted small mb-0">Classify customer projects by delivery model and contractual scope.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="milestone template task checklist delivery phases sprint">
                    <a href="milestone-templates.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-danger" style="background: rgba(220, 38, 38, 0.1);"><i class="bi bi-signpost-split fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Templates</span>
                        </div>
                        <h6 class="fw-bold mb-1">Milestone Templates</h6>
                        <p class="text-muted small mb-0">Pre-defined project work-breakdown structures and sprint phases.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="ticket category support bug issue request billing helpdesk">
                    <a href="ticket-categories.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-danger" style="background: rgba(220, 38, 38, 0.1);"><i class="bi bi-ticket-perforated fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Helpdesk</span>
                        </div>
                        <h6 class="fw-bold mb-1">Ticket Categories</h6>
                        <p class="text-muted small mb-0">Customer ticket taxonomy (Technical, Billing, Feature, Incident).</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="sla policy severity escalation response time resolution agreement">
                    <a href="sla-policies.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-danger" style="background: rgba(220, 38, 38, 0.1);"><i class="bi bi-shield-check fs-5"></i></span>
                            <span class="badge bg-danger-subtle text-danger">Compliance</span>
                        </div>
                        <h6 class="fw-bold mb-1">SLA Policies &amp; Severity</h6>
                        <p class="text-muted small mb-0">Target resolution hours, response deadlines, and severity matrix.</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- 6. Brand & Catalog -->
        <div class="settings-group mb-4" data-category="catalog">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="p-1 rounded-2" style="background: rgba(14, 165, 233, 0.1); color: #0ea5e9;"><i class="bi bi-box-seam"></i></span>
                <h5 class="fw-bold mb-0 text-dark">Brand &amp; Product Catalog</h5>
                <span class="text-muted small ms-2">Products, SKUs, brand labels, and inventory rate cards</span>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="brand manufacturer label oem product vendor">
                    <a href="brand-master.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-info" style="background: rgba(14, 165, 233, 0.1);"><i class="bi bi-patch-check fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Brand</span>
                        </div>
                        <h6 class="fw-bold mb-1">Brand Master</h6>
                        <p class="text-muted small mb-0">Configure manufacturer brands and product line labels.</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 setting-card-col" data-keywords="product catalog sku inventory item pricing rate card service">
                    <a href="product-catalog-master.php" class="card border-0 shadow-sm rounded-3 p-3 text-decoration-none text-dark h-100 setting-card transition-hover">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="p-2 rounded-3 text-info" style="background: rgba(14, 165, 233, 0.1);"><i class="bi bi-box-seam fs-5"></i></span>
                            <span class="badge bg-light text-secondary border">Catalog</span>
                        </div>
                        <h6 class="fw-bold mb-1">Product Catalog</h6>
                        <p class="text-muted small mb-0">Master catalog list with SKUs, standard pricing, and descriptions.</p>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- No Results Placeholder -->
    <div id="noResultsAlert" class="card border-0 shadow-sm rounded-3 p-5 text-center my-4 d-none bg-white">
        <i class="bi bi-search fs-1 text-muted mb-2"></i>
        <h5 class="fw-bold text-dark">No Matching Settings Found</h5>
        <p class="text-muted small mb-3">We couldn't find any configuration master matching your search query.</p>
        <div>
            <button type="button" class="btn btn-outline-primary btn-sm" id="resetSearchFromAlert">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset Filter
            </button>
        </div>
    </div>
</div>

<style>
.setting-card {
    border: 1px solid rgba(0,0,0,0.06) !important;
    transition: all 0.2s ease-in-out;
}
.setting-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 0.5rem 1.25rem rgba(0,0,0,0.08) !important;
    border-color: rgba(22, 163, 74, 0.35) !important;
}
.cat-btn.active {
    background-color: var(--primary, #16a34a) !important;
    border-color: var(--primary, #16a34a) !important;
    color: #fff !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('settingSearchInput');
    const clearBtn = document.getElementById('clearSearchBtn');
    const resetFromAlert = document.getElementById('resetSearchFromAlert');
    const cards = document.querySelectorAll('.setting-card-col');
    const groups = document.querySelectorAll('.settings-group');
    const noResultsAlert = document.getElementById('noResultsAlert');
    const categoryBtns = document.querySelectorAll('.cat-btn');

    let currentCategory = 'all';

    function filterSettings() {
        const query = (searchInput.value || '').trim().toLowerCase();
        let visibleCount = 0;

        groups.forEach(group => {
            const groupCategory = group.getAttribute('data-category');
            const categoryMatches = (currentCategory === 'all' || currentCategory === groupCategory);
            let groupVisibleCount = 0;

            const groupCards = group.querySelectorAll('.setting-card-col');
            groupCards.forEach(col => {
                const text = col.innerText.toLowerCase();
                const keywords = (col.getAttribute('data-keywords') || '').toLowerCase();
                const matchesQuery = (!query || text.includes(query) || keywords.includes(query));

                if (categoryMatches && matchesQuery) {
                    col.classList.remove('d-none');
                    groupVisibleCount++;
                    visibleCount++;
                } else {
                    col.classList.add('d-none');
                }
            });

            if (groupVisibleCount > 0) {
                group.classList.remove('d-none');
            } else {
                group.classList.add('d-none');
            }
        });

        if (visibleCount === 0) {
            noResultsAlert.classList.remove('d-none');
        } else {
            noResultsAlert.classList.add('d-none');
        }
    }

    searchInput.addEventListener('input', filterSettings);

    function resetFilters() {
        searchInput.value = '';
        currentCategory = 'all';
        categoryBtns.forEach(b => {
            b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
            b.classList.toggle('btn-dark', b.getAttribute('data-filter') === 'all');
            b.classList.toggle('btn-light', b.getAttribute('data-filter') !== 'all');
        });
        filterSettings();
    }

    clearBtn.addEventListener('click', resetFilters);
    if (resetFromAlert) resetFromAlert.addEventListener('click', resetFilters);

    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            categoryBtns.forEach(b => {
                b.classList.remove('active', 'btn-dark');
                b.classList.add('btn-light');
            });
            this.classList.add('active', 'btn-dark');
            this.classList.remove('btn-light');
            currentCategory = this.getAttribute('data-filter');
            filterSettings();
        });
    });
});
</script>

<?php include 'footer.php'; ?>
