<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gharuda HR | Dashboard</title>
    <link rel="icon" href="./assets/img/logo-icon.png" />

    <!-- Bootstrap 5 -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/icon/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/icon/materialdesignicon/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/css/app.css">
    <link rel="stylesheet" href="./assets/css/select2.css">
    <link rel="stylesheet" href="./assets/css/date-picker.css">
    <link rel="stylesheet" href="./assets/css/table.css">
    <link rel="stylesheet" href="./assets/css/ui-kit.css">

    <link rel="stylesheet" href="./assets/js/DataTables/datatables.min.css">

    <style>
        :root {
            --gh-green: #0B7A02;
            --gh-blue: #013376;
            --gh-mist: #8A8698;
            --gh-paper: #FFFFFF;
        }

        #gh-loader {
            position: fixed;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 36px;
            background: #ffffff99;
            z-index: 99999;
            transition: opacity 0.6s ease, visibility 0.6s ease;
        }

        #gh-loader.gh-hide {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        body.gh-loading {
            overflow: hidden !important;
        }

        .main-area {
            transition: opacity 0.4s ease;
        }

        body.gh-loading .main-area {
            opacity: 0 !important;
        }

        .gh-mark-wrap {
            opacity: 0.6;
            position: relative;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .gh-ring {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            -webkit-mask: radial-gradient(farthest-side, transparent calc(100% - 3px), #000 calc(100% - 3px));
            mask: radial-gradient(farthest-side, transparent calc(100% - 3px), #000 calc(100% - 3px));
            background: conic-gradient(from 0deg, transparent 0deg, var(--gh-green) 90deg, var(--gh-blue) 260deg, transparent 320deg, transparent 360deg);
            animation: gh-spin 1.8s linear infinite;
        }

        @keyframes gh-spin {
            to {
                transform: rotate(360deg);
            }
        }

        .gh-logo {
            position: relative;
            width: 40px;
            height: auto;
            opacity: 1;
            transform: scale(0.9);
            animation: gh-reveal-logo 1.5s ease-in-out infinite alternate;
        }

        @keyframes gh-reveal-logo {
            to {
                transform: scale(1);
            }
        }

        .gh-label {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 12px;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--gh-mist);
            opacity: 0;
            animation: gh-fade-in 0.8s ease 0.4s forwards, gh-breathe-text 2.4s ease-in-out 1.2s infinite;
        }

        @keyframes gh-fade-in {
            to {
                opacity: 0.55;
            }
        }

        @keyframes gh-breathe-text {

            0%,
            100% {
                opacity: 0.4;
            }

            50% {
                opacity: 0.85;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .gh-ring,
            .gh-logo,
            .gh-label {
                animation: none !important;
                opacity: 1 !important;
                transform: none !important;
            }
        }

        /* ================= ATTRACTIVE TREE SUBMENU DESIGN ================= */

        /* Arrow icon rotation animation */
        .org-toggle-btn .toggle-icon {
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.75rem;
            opacity: 0.7;
        }

        .org-toggle-btn[aria-expanded="true"] .toggle-icon {
            transform: rotate(180deg);
            opacity: 1;
            color: var(--gh-green);
        }

        .org-toggle-btn[aria-expanded="true"] {
            font-weight: 600;
            color: var(--primary);
        }

        .org-toggle-btn[aria-expanded="true"] i {
            color: var(--primary);
        }

        /* Tree Structure Vertical Line Box */
        .tree-submenu {
            position: relative;
            margin-left: 18px !important;
            padding-left: 0 !important;
            border-left: 1.5px dashed var(--primary);
            /* Dashed Line */
            margin-top: 4px;
            margin-bottom: 6px;
            margin-right: 6px;
        }

        /* Submenu Link Styling */
        .tree-submenu .tree-link {
            position: relative;
            display: flex;
            align-items: center;
            padding: 6px 10px 6px 10px;
            font-size: 0.82rem;
            color: #4b5563;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-left: 5px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        /* Connector Horizontal Line */
        .tree-submenu .tree-link::before {
            /* content: '';
            position: absolute;
            left: -5px;
            top: 50%;
            width: 0;
            height: 1.5px;
            background-color: var(--primary);
            transition: width 0.2s ease; */
        }

        /* Hover Effect */
        .tree-submenu .tree-link:hover {
            background-color: var(--border-soft);
            font-weight: 600;
            padding-left: 18px;
        }

        .tree-submenu .tree-link:hover::before {
            width: 10px;
        }

        /* Active Link State with Horizontal Line Connection */
        .tree-submenu .tree-link.active {
            background: var(--primary-light);
            color: var(--primary-dark);
            font-weight: 700;
            padding-left: 18px;
        }

        .tree-submenu .tree-link.active::before {
            width: 12px;
            background-color: var(--primary);
        }

        /* ===== Bell Notification Offcanvas ===== */
        .notif-oc {
            width: 400px;
            max-width: 92vw;
            border-left: 1px solid var(--border-soft, #e5e7eb);
        }

        .notif-oc .offcanvas-header {
            padding: 14px 18px;
            background: linear-gradient(135deg, #f8f9fb 0%, #fff 100%);
        }

        .notif-oc-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: var(--primary-light, #e8f7ea);
            color: var(--primary, #0ca308);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .notif-oc-title {
            font-size: 14px;
            font-weight: 800;
            color: #111827;
            line-height: 1.25;
        }

        .notif-oc-sub {
            font-size: 11.5px;
            font-weight: 600;
            color: #6b7280;
        }

        .notif-count-pill {
            font-size: 11px;
            font-weight: 700;
            color: #fff;
            background: var(--primary, #0ca308);
            padding: 3px 9px;
            border-radius: 10px;
            white-space: nowrap;
        }

        .notif-oc-list {
            display: flex;
            flex-direction: column;
        }

        .bell-notif-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            text-decoration: none;
            color: inherit;
            border-bottom: 1px solid #f8f9fa;
            transition: background .15s;
        }

        .bell-notif-item:hover {
            background: #f8f9fb;
        }

        .bell-notif-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
        }

        .bell-notif-info {
            flex: 1;
        }

        .bell-notif-name {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
        }

        .bell-notif-text {
            font-size: 12px;
            color: #6b7280;
        }

        .bell-notif-time {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 2px;
        }

        .bell-notif-badge {
            font-size: 10.5px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 10px;
            white-space: nowrap;
        }

        .bell-notif-badge.pending {
            background: #fef3c7;
            color: #d97706;
        }

        .bell-notif-badge.approved {
            background: #dcfce7;
            color: #16a34a;
        }

        .bell-notif-badge.rejected {
            background: #fee2e2;
            color: #dc2626;
        }

        .notif-oc-footer {
            padding: 12px 18px;
            border-top: 1px solid #f0f2f5;
        }

        /* leave item: hover reveal approve / reject icons */
        .notif-hover-actions {
            display: none;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .bell-notif-item:hover .notif-time-swap {
            display: none !important;
        }

        .bell-notif-item:hover .notif-hover-actions {
            display: inline-flex;
        }

        .notif-ico-btn {
            width: 30px;
            height: 30px;
            border-radius: 9px;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            cursor: pointer;
            transition: background .15s ease, color .15s ease, transform .1s ease;
        }

        .notif-ico-btn.approve {
            background: var(--primary-light, #e8f7ea);
            color: var(--primary-dark, #0f7a38);
        }

        .notif-ico-btn.approve:hover {
            background: var(--primary, #0ca308);
            color: #fff;
        }

        .notif-ico-btn.reject {
            background: #fdecec;
            color: #d3373c;
        }

        .notif-ico-btn.reject:hover {
            background: #e5484d;
            color: #fff;
        }

        .notif-ico-btn:active {
            transform: scale(.92);
        }
    </style>
</head>

<body class="gh-loading">

    <!-- Page Loader -->
    <div id="gh-loader" class="overflow-hidden">
        <div class="gh-mark-wrap">
            <div class="gh-ring"></div>
            <img class="gh-logo" src="./assets/img/logo-icon.png" alt="Gharuda Infotech">
        </div>
    </div>

    <!-- ============ FULL-WIDTH TOP HEADER ============ -->
    <div class="topbar">
        <div class="d-flex gap-2 align-items-center">
            <img src="./assets/img/logo-icon.png" alt="" class="topbar-brand-icon">
            <img src="./assets/img/logo-text.png" alt="" class="topbar-brand-text">
        </div>
        <button type="button" class="topbar-brand sbToggle" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div class="search-box ms-auto">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Search leads, clients, deals, tickets...">
        </div>
        <div class="icon-pill"><i class="bi bi-question-circle"></i></div>
        <div class="icon-pill" id="bellIcon" style="position:relative;cursor:pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Notifications">
            <i class="bi bi-bell"></i><span class="badge-dot">3</span>
        </div>
        <div class="profile-menu">
            <button type="button" class="profile-menu-trigger" id="profileMenuTrigger"
                aria-expanded="false" aria-controls="profileMenuDropdown" aria-label="Open admin menu">
                <img src="./assets/img/profile-1.jpg" class="avatar-sm" alt="Admin" title="Admin">
            </button>
            <div class="profile-menu-dropdown" id="profileMenuDropdown" role="menu">
                <div class="profile-menu-user">
                    <img src="./assets/img/profile-1.jpg" class="avatar-sm" alt="Sarah Mitchell">
                    <div>
                        <strong>Sarah Mitchell</strong>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="profile-menu-divider"></div>
                <a href="login.php" class="profile-menu-logout" role="menuitem">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>

    <!-- ===== Bell Notification Offcanvas ===== -->
    <div class="offcanvas offcanvas-end notif-oc" tabindex="-1" id="bellNotifOffcanvas" aria-labelledby="bellNotifOffcanvasLabel">
        <div class="offcanvas-header border-bottom">
            <div class="d-flex align-items-center gap-2 min-w-0">
                <div class="notif-oc-icon"><i class="bi bi-bell"></i></div>
                <div class="min-w-0">
                    <div class="notif-oc-title" id="bellNotifOffcanvasLabel">Notifications</div>
                    <div class="notif-oc-sub">Lead & Client Alerts</div>
                </div>
                <span class="notif-count-pill ms-2">3 new</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="notif-oc-list" id="notifPendingList">
                <a href="callbacks.php?new=1" class="bell-notif-item" id="notifCallbackItem">
                    <img src="./assets/img/profile-1.jpg" class="bell-notif-avatar" alt="">
                    <div class="bell-notif-info">
                        <div class="bell-notif-name">Emma Miller</div>
                        <div class="bell-notif-text">Requested <b>Callback</b> for Quote</div>
                        <div class="bell-notif-text" style="font-weight:700;color:#111827;">Scheduled &middot; Today, 04:30 PM</div>
                    </div>
                    <span class="bell-notif-time notif-time-swap" style="white-space:nowrap;">10 mins ago</span>
                </a>
                <a href="appointments.php" class="bell-notif-item">
                    <img src="./assets/img/profile-2.jpg" class="bell-notif-avatar" alt="">
                    <div class="bell-notif-info">
                        <div class="bell-notif-name">Daniel Martinez</div>
                        <div class="bell-notif-text">Booked Client Presentation</div>
                    </div>
                    <span class="bell-notif-time" style="white-space:nowrap;">1 hour ago</span>
                </a>
                <a href="manage-leads.php" class="bell-notif-item">
                    <img src="./assets/img/profile-3.jpg" class="bell-notif-avatar" alt="">
                    <div class="bell-notif-info">
                        <div class="bell-notif-name">Olivia Brown</div>
                        <div class="bell-notif-text">New inbound Indiamart lead assigned</div>
                    </div>
                    <span class="bell-notif-time" style="white-space:nowrap;">3 hours ago</span>
                </a>
            </div>
        </div>
        <div class="notif-oc-footer">
            <a href="manage-leads.php" class="btn btn-primary w-100" style="font-size:13px;font-weight:700;border-radius:10px;">
                <i class="bi bi-box-arrow-in-right me-1"></i> View All Leads
            </a>
        </div>
    </div>

    <div class="app-shell">

        <!-- ============ ICON RAIL ============ -->
        <aside class="icon-rail">
            <div class="icon-rail-scroll">
                <!-- Master Link -->
                <button data-rail-flag="isMasterActive" type="button" class="rail-btn" data-panel-target="Master" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Master" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-database"></i>
                </button>

                <!-- CRM / Lead Management Link -->
                <button data-rail-flag="isLeadActive" type="button" class="rail-btn" data-panel-target="CRM" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Lead Management" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-kanban"></i>
                </button>

                <!-- Customers Link — opens side panel with customer pages -->
                <button data-rail-flag="isCustomersActive" type="button" class="rail-btn" data-panel-target="Customers" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-person-vcard"></i>
                </button>

                <!-- Appointments / MOM Link -->
                <button data-rail-flag="isApptMomActive" type="button" class="rail-btn" data-panel-target="Appointments" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Appointments & MOM" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-calendar2-week"></i>
                </button>

                <!-- Target Link -->
                <button data-rail-flag="isTargetActive" type="button" class="rail-btn" data-panel-target="Target" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Target" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-bullseye"></i>
                </button>
                
                <!-- Project Management Link -->
                <!-- <button data-rail-flag="isProjectMgmtActive" type="button" class="rail-btn"
                    data-panel-target="Project Management" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Project Management" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-briefcase-fill"></i>
                </button> -->
 
                <!-- Support Link -->
                <!-- <button data-rail-flag="isSupportActive" type="button" class="rail-btn"
                    data-panel-target="Support" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Support" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-headset"></i>
                </button> -->
 
                <!-- Expenses Link -->
                <!-- <button data-rail-flag="isExpenseActive" type="button" class="rail-btn"
                    data-panel-target="Expenses" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Expenses" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-receipt"></i>
                </button> -->
 
                <!-- Petty Cash Link -->
                <!-- <button data-rail-flag="isPettyCashActive" type="button" class="rail-btn"
                    data-panel-target="PettyCash" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Petty Cash" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-safe"></i>
                </button> -->
                <!-- Bootstrap UI Library Rail Button -->
                <button type="button" class="rail-btn" data-panel-target="UI" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Bootstrap UI Library" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-bootstrap-fill text-primary"></i>
                </button>
            </div>

            <div class="icon-rail-bottom">
                <button type="button" class="rail-btn" data-panel-target="account" title="Settings">
                    <i class="bi bi-gear"></i>
                </button>
            </div>
        </aside>

        <!-- ============ SLIDING SIDE PANEL ============ -->
        <aside class="side-panel" id="sidePanel">

            <div class="side-panel-inner">
                <div class="panel-scroll">
                    <!-- Bootstrap UI Library Panel Section -->
                    <div class="panel-section" data-panel="UI">
                        <div class="nav-label">Bootstrap UI Library</div>
                        <a data-active-pages="ui-library.php" class="nav-link-custom" href="ui-library.php">
                            <i class="bi bi-grid-1x2 me-2 text-primary"></i> <span>Component Showcase</span>
                        </a>
                        <a data-active-pages="buttons.php" class="nav-link-custom" href="buttons.php">
                            <i class="bi bi-menu-button-wide me-2"></i> <span>Buttons & Badges</span>
                        </a>
                        <a data-active-pages="input-block.php" class="nav-link-custom" href="input-block.php">
                            <i class="bi bi-input-cursor-text me-2"></i> <span>Form Controls</span>
                        </a>
                        <a data-active-pages="table.php" class="nav-link-custom" href="table.php">
                            <i class="bi bi-table me-2"></i> <span>Data Table</span>
                        </a>
                        <a data-active-pages="modal&offcanvas.php" class="nav-link-custom" href="modal&offcanvas.php">
                            <i class="bi bi-window-stack me-2"></i> <span>Modals & Drawers</span>
                        </a>
                    </div>

                    <!-- Master Panel Section -->
                    <div class="panel-section" data-panel="Master">
                        <div class="nav-label">Master</div>
                        <a data-active-pages="ui-library.php" class="nav-link-custom" href="ui-library.php">
                            <i class="bi bi-bootstrap me-2 text-primary"></i> <span>Bootstrap UI Library</span>
                        </a>
                        <a data-active-pages="lead-stage.php,lead-stages-master.php" class="nav-link-custom" href="lead-stage.php">
                            <i class="bi bi-layers me-2"></i> <span>Lead Stages</span>
                        </a>
                        <a data-active-pages="lead-sources-master.php" class="nav-link-custom" href="lead-sources-master.php">
                            <i class="bi bi-diagram-2 me-2"></i> <span>Lead Sources</span>
                        </a>
                        <a data-active-pages="lead-status-master.php" class="nav-link-custom" href="lead-status-master.php">
                            <i class="bi bi-flag me-2"></i> <span>Lead Status</span>
                        </a>
                        <a data-active-pages="brand-master.php" class="nav-link-custom" href="brand-master.php">
                            <i class="bi bi-patch-check me-2"></i> <span>Brand</span>
                        </a>
                        <a data-active-pages="product-catalog-master.php" class="nav-link-custom" href="product-catalog-master.php">
                            <i class="bi bi-box-seam me-2"></i> <span>Product Catalog</span>
                        </a>
                        <a data-active-pages="visit-activity-types.php" class="nav-link-custom" href="visit-activity-types.php">
                            <i class="bi bi-geo-alt me-2"></i> <span>Visit Activity Types</span>
                        </a>
                        <a data-active-pages="customer-categories.php" class="nav-link-custom" href="customer-categories.php">
                            <i class="bi bi-people me-2"></i> <span>Customer Categories</span>
                        </a>
                        <a data-active-pages="industry-verticals.php" class="nav-link-custom" href="industry-verticals.php">
                            <i class="bi bi-buildings me-2"></i> <span>Industry Verticals</span>
                        </a>
                        <a data-active-pages="payment-terms-master.php" class="nav-link-custom" href="payment-terms-master.php">
                            <i class="bi bi-credit-card-2-front me-2"></i> <span>Payment Terms</span>
                        </a>
                        <a data-active-pages="appointment-types.php,meeting-types-master.php" class="nav-link-custom" href="appointment-types.php">
                            <i class="bi bi-calendar2-event me-2"></i> <span>Meeting Types</span>
                        </a>
                        <a data-active-pages="meeting-outcomes-master.php" class="nav-link-custom" href="meeting-outcomes-master.php">
                            <i class="bi bi-clipboard2-check me-2"></i> <span>Meeting Outcomes</span>
                        </a>
                        <a data-active-pages="sales-target-slabs.php" class="nav-link-custom" href="sales-target-slabs.php">
                            <i class="bi bi-bar-chart-steps me-2"></i> <span>Sales Target Slabs</span>
                        </a>
                        <a data-active-pages="project-types-master.php" class="nav-link-custom" href="project-types-master.php">
                            <i class="bi bi-folder-check me-2"></i> <span>Project Types</span>
                        </a>
                        <a data-active-pages="milestone-templates.php" class="nav-link-custom" href="milestone-templates.php">
                            <i class="bi bi-signpost-split me-2"></i> <span>Milestone Templates</span>
                        </a>
                        <a data-active-pages="ticket-categories.php" class="nav-link-custom" href="ticket-categories.php">
                            <i class="bi bi-ticket-perforated me-2"></i> <span>Ticket Categories</span>
                        </a>
                        <a data-active-pages="sla-policies.php,sla-policies-severity.php" class="nav-link-custom" href="sla-policies.php">
                            <i class="bi bi-shield-check me-2"></i> <span>SLA Policies & Severity</span>
                        </a>
                        <a data-active-pages="group-master.php" class="nav-link-custom" href="group-master.php">
                            <i class="bi bi-collection me-2"></i> <span>Group </span>
                        </a>
                        <a data-active-pages="currency-master.php" class="nav-link-custom" href="currency-master.php">
                            <i class="bi bi-currency-exchange me-2"></i> <span>Currency</span>
                        </a>
                    </div>

                    <!-- CRM Panel Section -->
                    <div class="panel-section" data-panel="CRM">
                        <div class="nav-label">Lead Management</div>

                        <!-- ===== Leads ===== -->
                        <a data-toggle-flag="isLeadCoreActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse"
                            href="#leadsSubmenu"
                            role="button"
                            aria-expanded="false"
                            aria-controls="leadsSubmenu">
                            <span><i class="bi bi-person-badge me-2"></i> Leads</span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>

                        <div data-show-flag="isLeadCoreActive" class="collapse tree-submenu" id="leadsSubmenu">
                            <a data-active-pages="lead-map.php" class="tree-link" href="lead-map.php">Map</a>
                            <a data-active-pages="lead.php" class="tree-link" href="lead.php">Leads</a>
                            <a data-active-pages="employee-revenue-report.php" class="tree-link" href="employee-revenue-report.php">Employee Revenue Report</a>
                            <a data-active-pages="employee-lead-report.php" class="tree-link" href="employee-lead-report.php">Employee Lead Report</a>
                            <a data-active-pages="lead-source-report.php" class="tree-link" href="lead-source-report.php">Lead Source Report</a>
                            <a data-active-pages="staff-visting-report.php,staff-visiting-location-report.php" class="tree-link" href="staff-visting-report.php">Staff Visiting Reports</a>
                            <a data-active-pages="brandwise-report.php" class="tree-link" href="brandwise-report.php">Brandwise Report</a>
                            <a data-active-pages="lead-stage.php" class="tree-link" href="lead-stage.php">Lead Stage</a>
                            <a data-active-pages="lead-dashboard.php" class="tree-link" href="lead-dashboard.php">Lead Dashboard</a>
                        </div>
                        
                        <!-- ===== Lead Manager ===== -->
                        <a data-toggle-flag="isLeadMgrActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse"
                            href="#leadMgrSubmenu"
                            role="button"
                            aria-expanded="false"
                            aria-controls="leadMgrSubmenu">
                            <span><i class="bi bi-people-fill me-2"></i> Lead Manager</span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div data-show-flag="isLeadMgrActive" class="collapse tree-submenu" id="leadMgrSubmenu">
                            <a data-active-pages="manage-leads.php" class="tree-link" href="manage-leads.php">Manage Lead</a>
                            <a data-active-pages="sms-chat.php" class="tree-link" href="sms-chat.php">SMS</a>
                            <a data-active-pages="mailbox.php" class="tree-link" href="mailbox.php">Mailbox</a>
                            <a data-active-pages="whatsapp-chat.php" class="tree-link" href="whatsapp-chat.php">WhatsApp</a>
                        </div>
                    </div>
 
                    <!-- Support Panel Section -->
                    <div class="panel-section" data-panel="Support">
                        <div class="nav-label">Support</div>
                        <a data-active-pages="support-tickets.php" class="nav-link-custom"
                            href="support-tickets.php"><i class="bi bi-headset me-2"></i> <span>Support Tickets</span></a>
                    </div>
 
                    <!-- Expenses Panel Section -->
                    <div class="panel-section" data-panel="Expenses">
                        <div class="nav-label">Expenses</div>
                        <a data-active-pages="expenses.php,expense-create.php" class="nav-link-custom"
                            href="expenses.php"><i class="bi bi-receipt me-2"></i> <span>Expenses</span></a>
                    </div>
 
                    <!-- Petty Cash Panel Section (Outside Expenses) -->
                    <div class="panel-section" data-panel="PettyCash">
                        <div class="nav-label">Petty Cash</div>
                        <a data-toggle-flag="isPettyCashActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#pettyCashSubmenu" role="button"
                            aria-expanded="false" aria-controls="pettyCashSubmenu">
                            <span><i class="bi bi-safe me-2"></i> <span>Petty Cash</span></span>
                            <i class="bi bi-chevron-down toggle-arrow"></i>
                        </a>
                        <div data-show-flag="isPettyCashActive" class="collapse tree-submenu" id="pettyCashSubmenu">
                            <a data-active-pages="petty-cash.php,petty-cash-list.php" class="nav-link-custom"
                                href="petty-cash.php">
                                <span>Petty Cash List</span>
                            </a>
                            <a data-active-pages="petty-cash-report.php" class="nav-link-custom"
                                href="petty-cash-report.php">
                                <span>Petty Cash Report</span>
                            </a>
                        </div>
                    </div>

                    <!-- Customers Panel Section -->
                    <div class="panel-section" data-panel="Customers">
                        <div class="nav-label">Customers</div>
                        <a data-active-pages="customers.php,customer-view.php,customer-new.php,customer-import.php" class="nav-link-custom" href="customers.php"><i class="bi bi-person-vcard me-2"></i> <span>Customers</span></a>
                    </div>

                    <!-- Appointments / MOM Panel Section -->
                    <div class="panel-section" data-panel="Appointments">
                        <div class="nav-label">Appointments & MOM</div>

                        <a data-toggle-flag="isApptActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse"
                            href="#appointmentsSubmenu"
                            role="button"
                            aria-expanded="false"
                            aria-controls="appointmentsSubmenu">
                            <span><i class="bi bi-calendar2-week me-2"></i> <span>Appointments</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>

                        <div data-show-flag="isApptActive" class="collapse tree-submenu" id="appointmentsSubmenu">
                            <a data-active-pages="appointments.php" class="tree-link" href="appointments.php">Appointments</a>
                            <a data-active-pages="past-meeting.php" class="tree-link" href="past-meeting.php">Past Meeting</a>
                            <a data-active-pages="callbacks.php" class="tree-link" href="callbacks.php">Callbacks</a>
                            <a data-active-pages="summary-report.php" class="tree-link" href="summary-report.php">Summary Report</a>
                            <a data-active-pages="appointment-types.php" class="tree-link" href="appointment-types.php">Appointment Types</a>
                        </div>
                        <a data-active-pages="mom.php" class="nav-link-custom" href="mom.php"><i class="bi bi-journal-text me-2"></i> <span>Minutes of Meeting</span></a>
                    </div>

                    <!-- Target Panel Section -->
                    <div class="panel-section" data-panel="Target">
                        <div class="nav-label">Target</div>
                        <a data-active-pages="target.php" class="nav-link-custom" href="target.php"><i class="bi bi-bullseye me-2"></i> <span>Target</span></a>
                        <a data-active-pages="brand-target.php" class="nav-link-custom" href="brand-target.php"><i class="bi bi-tags me-2"></i> <span>Brand Target</span></a>
                    </div>

                    <!-- Project Management Panel Section -->
                    <div class="panel-section" data-panel="Project Management">
                        <div class="nav-label">Project Management</div>
 
                        <!-- ===== Projects ===== -->
                        <a data-toggle-flag="isProjectCoreActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#projectsSubmenu" role="button"
                            aria-expanded="false"
                            aria-controls="projectsSubmenu">
                            <span><i class="bi bi-kanban me-2"></i> Projects</span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
 
                        <div data-show-flag="isProjectCoreActive" class="collapse tree-submenu" id="projectsSubmenu">
                            <a data-active-pages="project-dashboard.php" class="tree-link"
                                href="project-dashboard.php">Project Dashboard</a>
                            <a data-active-pages="projects-list.php" class="tree-link"
                                href="projects-list.php">Projects List</a>
                            <a data-active-pages="projects-report.php" class="tree-link"
                                href="projects-report.php">Projects Report</a>
                            <a data-active-pages="projectwise-daily-task-report.php" class="tree-link"
                                href="projectwise-daily-task-report.php">Projectwise Daily Task Report</a>
                        </div>
 
                        <!-- ===== Tasks ===== -->
                        <a data-toggle-flag="isTaskCoreActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#tasksSubmenu" role="button"
                            aria-expanded="false" aria-controls="tasksSubmenu">
                            <span><i class="bi bi-check-circle me-2"></i> Tasks</span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
 
                        <div data-show-flag="isTaskCoreActive" class="collapse tree-submenu" id="tasksSubmenu">
                            <a data-active-pages="tasks-list.php" class="tree-link"
                                href="tasks-list.php">Tasks List</a>
                            <a data-active-pages="score-card.php" class="tree-link"
                                href="score-card.php">Score Card</a>
                        </div>
                    </div>
                </div>

            </div>
        </aside>

        <!-- backdrop for mobile drawer -->
        <div class="sb-backdrop" id="sbBackdrop"></div>

        <!-- ============ MAIN ============ -->
        <div class="main-area">
            <div class="content-pad">