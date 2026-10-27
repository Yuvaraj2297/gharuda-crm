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

        /* ===== Quick Create High-Contrast Mega-Menu ===== */
        .qc-trigger-btn {
            border-radius: 999px !important;
            font-size: 13px !important;
            font-weight: 700 !important;
            height: 38px;
            padding: 0 16px !important;
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%) !important;
            border: 1.5px solid #15803d !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.28) !important;
            transition: all 0.2s ease !important;
        }
        .qc-trigger-btn:hover,
        .qc-trigger-btn[aria-expanded="true"] {
            background: linear-gradient(135deg, #15803d 0%, #166534 100%) !important;
            box-shadow: 0 6px 18px rgba(22, 163, 74, 0.38) !important;
            transform: translateY(-1px);
        }
        .qc-mega-menu {
            width: 560px;
            max-width: 94vw;
            padding: 0 !important;
            margin-top: 10px !important;
            background: #ffffff !important;
            border: 1.5px solid #cbd5e1 !important;
            border-radius: 16px !important;
            box-shadow: 0 24px 54px -10px rgba(15, 23, 42, 0.28), 0 8px 20px -4px rgba(15, 23, 42, 0.14) !important;
            overflow: hidden;
            z-index: 2050 !important;
        }
        .qc-mega-head {
            background: linear-gradient(135deg, #0f172a 0%, #14532d 100%);
            padding: 14px 18px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .qc-mega-body {
            padding: 14px 16px;
            background: #ffffff;
            max-height: 74vh;
            overflow-y: auto;
        }
        .qc-sec-label {
            font-size: 10.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #475569;
            margin: 6px 4px 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .qc-sec-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }
        .qc-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 8px;
            margin-bottom: 10px;
        }
        @media (max-width: 575.98px) {
            .qc-grid {
                grid-template-columns: 1fr;
            }
        }
        .qc-card-item {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 9px 11px;
            border-radius: 11px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            text-decoration: none !important;
            transition: all 0.16s ease;
        }
        .qc-card-item:hover {
            background: #f0fdf4;
            border-color: #86efac;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.10);
            transform: translateY(-1px);
        }
        .qc-ico {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            flex-shrink: 0;
        }
        .qc-item-title {
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.2;
        }
        .qc-card-item:hover .qc-item-title {
            color: #15803d;
        }
        .qc-item-sub {
            font-size: 11px;
            font-weight: 500;
            color: #64748b;
            line-height: 1.25;
            margin-top: 2px;
        }
        .qc-mega-foot {
            background: #f1f5f9;
            border-top: 1px solid #e2e8f0;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
        }
        .qc-foot-link {
            font-size: 11.5px;
            font-weight: 700;
            color: #334155;
            text-decoration: none;
            padding: 4px 10px;
            border-radius: 8px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            transition: all 0.15s ease;
        }
        .qc-foot-link:hover {
            background: #16a34a;
            color: #ffffff;
            border-color: #16a34a;
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
        <a href="lead-dashboard.php" class="d-flex gap-2 align-items-center text-decoration-none" title="Go to Lead Dashboard">
            <img src="./assets/img/logo-icon.png" alt="" class="topbar-brand-icon">
            <img src="./assets/img/logo-text.png" alt="" class="topbar-brand-text">
        </a>
        <button type="button" class="topbar-brand sbToggle" aria-label="Toggle sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div class="search-box ms-auto position-relative" id="globalSearchWrap">
            <i class="bi bi-search"></i>
            <input type="text" id="globalSearchInput" autocomplete="off" placeholder="Search leads, clients, deals, quotes... (Ctrl+K)" onkeydown="if(event.key==='Enter'&&this.value.trim()){window.location.href='lead-filter.php?q='+encodeURIComponent(this.value.trim());}">
            <div id="globalSearchDropdown" class=" shadow-lg border rounded-4 bg-white position-absolute start-0 end-0 mt-2 d-none" style="top:100%; z-index:2000; max-height:380px; overflow-y:auto;"></div>
        </div>
        <div class="dropdown">
            <button type="button" class="btn qc-trigger-btn d-none d-md-inline-flex align-items-center gap-1.5" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-plus-circle-fill"></i> <span>Quick Create</span> <i class="bi bi-chevron-down" style="font-size:10px;"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end qc-mega-menu">
                <div class="qc-mega-head">
                    <div class="d-flex align-items-center gap-2.5">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-3" style="width:34px;height:34px;background:rgba(255,255,255,0.16);font-size:17px;">
                            <i class="bi bi-lightning-charge-fill text-warning"></i>
                        </span>
                        <div>
                            <div class="fw-bold" style="font-size:14px;line-height:1.2;">Quick Create Center</div>
                            <div style="font-size:11.5px;color:rgba(255,255,255,0.75);">Instant 1-click record creation across CRM modules</div>
                        </div>
                    </div>
                    <span class="badge rounded-pill" style="background:rgba(255,255,255,0.18);font-size:11px;">15 Actions</span>
                </div>
                <div class="qc-mega-body">
                    <div class="qc-sec-label"><i class="bi bi-kanban text-success"></i> Sales, Pipeline &amp; Meetings</div>
                    <div class="qc-grid">
                        <a href="lead.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#dcfce7;color:#15803d;"><i class="bi bi-person-plus-fill"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">New Lead</div>
                                <div class="qc-item-sub">Capture inbound enquiry</div>
                            </div>
                        </a>
                        <a href="deals.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#dbeafe;color:#1d4ed8;"><i class="bi bi-currency-rupee"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">New Opportunity / Deal</div>
                                <div class="qc-item-sub">Add sales pipeline deal</div>
                            </div>
                        </a>
                        <a href="quotation-create.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#e0f2fe;color:#0369a1;"><i class="bi bi-file-earmark-text-fill"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">Create Quotation</div>
                                <div class="qc-item-sub">Send GST estimate / quote</div>
                            </div>
                        </a>
                        <a href="contracts.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#f3e8ff;color:#7e22ce;"><i class="bi bi-pen-fill"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">New SLA Contract</div>
                                <div class="qc-item-sub">Draft client AMC agreement</div>
                            </div>
                        </a>
                        <a href="appointments.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#fef3c7;color:#b45309;"><i class="bi bi-calendar2-plus-fill"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">Book Appointment</div>
                                <div class="qc-item-sub">Schedule client demo / visit</div>
                            </div>
                        </a>
                        <a href="mom.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#fce7f3;color:#be185d;"><i class="bi bi-journal-text"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">Minutes of Meeting</div>
                                <div class="qc-item-sub">Record MOM &amp; action items</div>
                            </div>
                        </a>
                    </div>

                    <div class="qc-sec-label"><i class="bi bi-briefcase text-primary"></i> Clients, Projects &amp; Billing</div>
                    <div class="qc-grid mb-0">
                        <a href="customer-new.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#dcfce7;color:#15803d;"><i class="bi bi-building-add"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">New Customer Account</div>
                                <div class="qc-item-sub">Onboard B2B / B2C client</div>
                            </div>
                        </a>
                        <a href="contacts.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#e0e7ff;color:#4338ca;"><i class="bi bi-person-badge-fill"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">Add Client Contact</div>
                                <div class="qc-item-sub">Save key decision maker</div>
                            </div>
                        </a>
                        <a href="project-create.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#dbeafe;color:#1d4ed8;"><i class="bi bi-briefcase-fill"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">Create New Project</div>
                                <div class="qc-item-sub">Launch project milestones</div>
                            </div>
                        </a>
                        <a href="task-create.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#ccfbf1;color:#0f766e;"><i class="bi bi-check2-square"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">Assign New Task</div>
                                <div class="qc-item-sub">Delegate team deliverable</div>
                            </div>
                        </a>
                        <a href="invoice-create.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#dcfce7;color:#15803d;"><i class="bi bi-file-earmark-plus-fill"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">Create Tax Invoice</div>
                                <div class="qc-item-sub">Generate GST tax invoice</div>
                            </div>
                        </a>
                        <a href="support-create-ticket.php" class="qc-card-item">
                            <span class="qc-ico" style="background:#fee2e2;color:#dc2626;"><i class="bi bi-headset"></i></span>
                            <div class="min-w-0">
                                <div class="qc-item-title">New Support Ticket</div>
                                <div class="qc-item-sub">Raise SLA helpdesk ticket</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="qc-mega-foot">
                    <span class="text-muted fw-semibold" style="font-size:11px;">More Actions:</span>
                    <div class="d-flex align-items-center gap-1.5 flex-wrap">
                        <a href="expense-create.php" class="qc-foot-link"><i class="bi bi-receipt me-1 text-warning"></i>Field Expense</a>
                        <a href="petty-cash-create.php" class="qc-foot-link"><i class="bi bi-safe me-1 text-primary"></i>Petty Cash Voucher</a>
                        <a href="staff-create.php" class="qc-foot-link"><i class="bi bi-person-plus me-1 text-success"></i>Add Staff</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="icon-pill" id="helpWorkflowBtn" style="cursor:pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="CRM Workflow Guide"><i class="bi bi-question-circle"></i></div>
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
                <a href="settings.php" class="profile-menu-item d-flex align-items-center gap-2 px-3 py-2 text-decoration-none text-dark" role="menuitem" style="font-size:13px; font-weight:500;">
                    <i class="bi bi-gear text-secondary"></i>
                    <span>System Settings</span>
                </a>
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

    <!-- ===== CRM End-to-End Lifecycle Guide Offcanvas ===== -->
    <div class="offcanvas offcanvas-end notif-oc" tabindex="-1" id="crmWorkflowOffcanvas" aria-labelledby="crmWorkflowOffcanvasLabel" style="width:430px;">
        <div class="offcanvas-header border-bottom">
            <div class="d-flex align-items-center gap-2 min-w-0">
                <div class="notif-oc-icon"><i class="bi bi-diagram-3-fill"></i></div>
                <div class="min-w-0">
                    <div class="notif-oc-title" id="crmWorkflowOffcanvasLabel">CRM Lifecycle &amp; Workflow</div>
                    <div class="notif-oc-sub">End-to-End Pipeline Navigation</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-3">
            <div class="d-flex flex-column gap-2">
                <div class="p-2.5 rounded-3 border bg-light-subtle">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="badge bg-success-subtle text-success fw-bold">Stage 1 &middot; Lead Capture</span>
                        <a href="lead.php" class="small fw-bold text-decoration-none">Open Leads &rarr;</a>
                    </div>
                    <div class="small text-muted mb-2">Capture inbound enquiries (IndiaMART, Website, Direct), score leads, and assign reps.</div>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="lead-dashboard.php" class="badge bg-white text-dark border text-decoration-none">Lead Dashboard</a>
                        <a href="lead.php" class="badge bg-white text-dark border text-decoration-none">All Leads</a>
                        <a href="manage-leads.php" class="badge bg-white text-dark border text-decoration-none">Manage Leads</a>
                    </div>
                </div>
                <div class="p-2.5 rounded-3 border bg-light-subtle">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="badge bg-primary-subtle text-primary fw-bold">Stage 2 &middot; Engage &amp; Meet</span>
                        <a href="follow-up-list.php" class="small fw-bold text-decoration-none">Follow-Ups &rarr;</a>
                    </div>
                    <div class="small text-muted mb-2">Follow up via WhatsApp, Email, SMS, schedule client demos, and log Minutes of Meeting (MOM).</div>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="follow-up-list.php" class="badge bg-white text-dark border text-decoration-none">Follow-Up List</a>
                        <a href="appointments.php" class="badge bg-white text-dark border text-decoration-none">Appointments</a>
                        <a href="mom.php" class="badge bg-white text-dark border text-decoration-none">Minutes of Meeting</a>
                        <a href="whatsapp-chat.php" class="badge bg-white text-dark border text-decoration-none">WhatsApp</a>
                    </div>
                </div>
                <div class="p-2.5 rounded-3 border bg-light-subtle">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="badge bg-info-subtle text-info fw-bold">Stage 3 &middot; Deals &amp; Proposals</span>
                        <a href="deals.php" class="small fw-bold text-decoration-none">Pipeline &rarr;</a>
                    </div>
                    <div class="small text-muted mb-2">Track opportunity stages, generate GST Quotations, and finalize client SLA Contracts.</div>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="deals.php" class="badge bg-white text-dark border text-decoration-none">Deals Pipeline</a>
                        <a href="quotations.php" class="badge bg-white text-dark border text-decoration-none">Quotations</a>
                        <a href="quotation-create.php" class="badge bg-white text-dark border text-decoration-none">+ New Quote</a>
                        <a href="contracts.php" class="badge bg-white text-dark border text-decoration-none">Contracts &amp; SLAs</a>
                    </div>
                </div>
                <div class="p-2.5 rounded-3 border bg-light-subtle">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="badge bg-warning-subtle text-warning fw-bold">Stage 4 &middot; Customer 360</span>
                        <a href="customers.php" class="small fw-bold text-decoration-none">Customers &rarr;</a>
                    </div>
                    <div class="small text-muted mb-2">Convert won deals into Customer Accounts with unified 360&deg; ledger, contacts, and files.</div>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="customer-dashboard.php" class="badge bg-white text-dark border text-decoration-none">360 Dashboard</a>
                        <a href="customers.php" class="badge bg-white text-dark border text-decoration-none">Customers Directory</a>
                        <a href="contacts.php" class="badge bg-white text-dark border text-decoration-none">Contacts</a>
                    </div>
                </div>
                <div class="p-2.5 rounded-3 border bg-light-subtle">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="badge bg-secondary-subtle text-secondary fw-bold">Stage 5 &middot; Project Delivery</span>
                        <a href="projects-list.php" class="small fw-bold text-decoration-none">Projects &rarr;</a>
                    </div>
                    <div class="small text-muted mb-2">Deliver client projects, milestones, daily tasks, and track team KPI scorecards.</div>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="project-dashboard.php" class="badge bg-white text-dark border text-decoration-none">Project Dashboard</a>
                        <a href="projects-list.php" class="badge bg-white text-dark border text-decoration-none">Projects List</a>
                        <a href="task-overview.php" class="badge bg-white text-dark border text-decoration-none">Tasks Kanban</a>
                        <a href="score-card.php" class="badge bg-white text-dark border text-decoration-none">Score Card</a>
                    </div>
                </div>
                <div class="p-2.5 rounded-3 border bg-light-subtle">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="badge bg-success-subtle text-success fw-bold">Stage 6 &middot; Billing &amp; Finance</span>
                        <a href="invoices.php" class="small fw-bold text-decoration-none">Invoices &rarr;</a>
                    </div>
                    <div class="small text-muted mb-2">Issue GST Tax Invoices, record NEFT/UPI payments, and manage field expenses &amp; petty cash.</div>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="invoices.php" class="badge bg-white text-dark border text-decoration-none">Invoices Ledger</a>
                        <a href="invoice-create.php" class="badge bg-white text-dark border text-decoration-none">+ Tax Invoice</a>
                        <a href="payments.php" class="badge bg-white text-dark border text-decoration-none">Payments</a>
                        <a href="expenses.php" class="badge bg-white text-dark border text-decoration-none">Field Expenses</a>
                    </div>
                </div>
                <div class="p-2.5 rounded-3 border bg-light-subtle">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="badge bg-danger-subtle text-danger fw-bold">Stage 7 &middot; Support &amp; SLA</span>
                        <a href="ticket-dashboard.php" class="small fw-bold text-decoration-none">Helpdesk &rarr;</a>
                    </div>
                    <div class="small text-muted mb-2">Resolve post-sales client tickets with SLA response tracking and escalation alerts.</div>
                    <div class="d-flex flex-wrap gap-1">
                        <a href="ticket-dashboard.php" class="badge bg-white text-dark border text-decoration-none">Support Dashboard</a>
                        <a href="support-tickets.php" class="badge bg-white text-dark border text-decoration-none">All Tickets</a>
                        <a href="ticket-reports.php" class="badge bg-white text-dark border text-decoration-none">SLA Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-shell">

        <!-- ============ ICON RAIL (Ordered by End-to-End CRM Lifecycle Flow) ============ -->
        <aside class="icon-rail">
            <div class="icon-rail-scroll">
                <!-- 1. CRM: Leads, Deals, Quotes, Contracts & Omnichannel -->
                <button data-rail-flag="isLeadActive" type="button" class="rail-btn" data-panel-target="CRM" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Leads &amp; Sales Pipeline" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-kanban"></i>
                </button>

                <!-- 2. Meetings, Appointments, Callbacks & MOM -->
                <button data-rail-flag="isApptMomActive" type="button" class="rail-btn" data-panel-target="Appointments" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Meetings &amp; MOM" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-calendar2-week"></i>
                </button>

                <!-- 3. Customers 360 & Contacts -->
                <button data-rail-flag="isCustomersActive" type="button" class="rail-btn" data-panel-target="Customers" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers &amp; 360&deg;" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-person-vcard"></i>
                </button>

                <!-- 4. Project Delivery & Tasks -->
                <button data-rail-flag="isProjectMgmtActive" type="button" class="rail-btn" data-panel-target="Project Management" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Projects &amp; Tasks" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-briefcase-fill"></i>
                </button>

                <!-- 5. Billing, GST Invoicing, Payments & Field Expenses -->
                <button data-rail-flag="isExpenseActive" type="button" class="rail-btn" data-panel-target="Expenses" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Billing &amp; Invoicing" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-receipt"></i>
                </button>

                <!-- 6. Petty Cash Management -->
                <button data-rail-flag="isPettyCashActive" type="button" class="rail-btn" data-panel-target="PettyCash" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Petty Cash" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-safe"></i>
                </button>

                <!-- 7. Customer Support & SLA Helpdesk -->
                <button data-rail-flag="isSupportActive" type="button" class="rail-btn" data-panel-target="Support" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Support &amp; SLA" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-headset"></i>
                </button>

                <!-- 8. Sales Targets & Quotas -->
                <button data-rail-flag="isTargetActive" type="button" class="rail-btn" data-panel-target="Target" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Sales Targets" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-bullseye"></i>
                </button>

                <!-- 9. Sales Team & Field Force -->
                <button data-rail-flag="isStaffActive" type="button" class="rail-btn" data-panel-target="Staff" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Sales Team &amp; Field Force" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-people-fill"></i>
                </button>

                <!-- 10. Master Data Configuration -->
                <button data-rail-flag="isMasterActive" type="button" class="rail-btn" data-panel-target="Master" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Master Data" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-database"></i>
                </button>
            </div>

            <!-- 11. System Settings -->
            <div class="icon-rail-bottom">
                <button data-rail-flag="isSettingsActive" type="button" class="rail-btn" data-panel-target="Settings" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="System Settings" data-bs-custom-class="custom-tooltip">
                    <i class="bi bi-gear"></i>
                </button>
            </div>
        </aside>

        <!-- ============ SLIDING SIDE PANEL ============ -->
        <aside class="side-panel" id="sidePanel">

            <div class="side-panel-inner">
                <div class="panel-scroll">

                    <!-- 1. CRM: Leads & Sales -->
                    <div class="panel-section" data-panel="CRM">
                        <div class="nav-label">Leads &amp; Sales</div>

                        <a data-active-pages="lead-dashboard.php" class="nav-link-custom" href="lead-dashboard.php">
                            <i class="bi bi-speedometer2 me-2"></i> <span>Lead Dashboard</span>
                        </a>

                        <!-- Leads & Follow-Ups Group -->
                        <a data-toggle-flag="isLeadCoreActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#leadsSubmenu" role="button" aria-expanded="false" aria-controls="leadsSubmenu">
                            <span><i class="bi bi-person-lines-fill me-2"></i> <span>Leads &amp; Follow-Ups</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div data-show-flag="isLeadCoreActive" class="collapse tree-submenu" id="leadsSubmenu">
                            <a data-active-pages="lead.php" class="tree-link" href="lead.php">All Leads</a>
                            <a data-active-pages="manage-leads.php" class="tree-link" href="manage-leads.php">Manage Leads</a>
                            <a data-active-pages="follow-up-list.php" class="tree-link" href="follow-up-list.php">Follow-Up List</a>
                            <a data-active-pages="lead-map.php" class="tree-link" href="lead-map.php">Lead Map View</a>
                            <a data-active-pages="lead-filter.php" class="tree-link" href="lead-filter.php">Search &amp; Filter</a>
                        </div>

                        <!-- Deals & Quotations Group -->
                        <a data-toggle-flag="isDealActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#dealsSubmenu" role="button" aria-expanded="false" aria-controls="dealsSubmenu">
                            <span><i class="bi bi-currency-rupee me-2"></i> <span>Deals &amp; Quotations</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div data-show-flag="isDealActive" class="collapse tree-submenu" id="dealsSubmenu">
                            <a data-active-pages="deals.php" class="tree-link" href="deals.php">Deals Pipeline</a>
                            <a data-active-pages="quotations.php,quotation-create.php" class="tree-link" href="quotations.php">Quotations</a>
                            <a data-active-pages="contracts.php" class="tree-link" href="contracts.php">Contracts &amp; SLAs</a>
                        </div>

                        <!-- Communications Group -->
                        <a data-toggle-flag="isCommActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#commSubmenu" role="button" aria-expanded="false" aria-controls="commSubmenu">
                            <span><i class="bi bi-chat-dots me-2"></i> <span>Communications</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div data-show-flag="isCommActive" class="collapse tree-submenu" id="commSubmenu">
                            <a data-active-pages="whatsapp-chat.php" class="tree-link" href="whatsapp-chat.php">WhatsApp Chat</a>
                            <a data-active-pages="mailbox.php" class="tree-link" href="mailbox.php">Mailbox</a>
                            <a data-active-pages="sms-chat.php" class="tree-link" href="sms-chat.php">SMS Center</a>
                        </div>

                        <!-- Sales Reports Group -->
                        <a data-toggle-flag="isLeadReportActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#leadReportsSubmenu" role="button" aria-expanded="false" aria-controls="leadReportsSubmenu">
                            <span><i class="bi bi-graph-up-arrow me-2"></i> <span>Sales Reports</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div data-show-flag="isLeadReportActive" class="collapse tree-submenu" id="leadReportsSubmenu">
                            <a data-active-pages="employee-revenue-report.php" class="tree-link" href="employee-revenue-report.php">Revenue Report</a>
                            <a data-active-pages="employee-lead-report.php" class="tree-link" href="employee-lead-report.php">Employee Lead Report</a>
                            <a data-active-pages="lead-source-report.php" class="tree-link" href="lead-source-report.php">Lead Source Report</a>
                            <a data-active-pages="brandwise-report.php" class="tree-link" href="brandwise-report.php">Brandwise Sales</a>
                        </div>
                    </div>

                    <!-- 2. Appointments & MOM -->
                    <div class="panel-section" data-panel="Appointments">
                        <div class="nav-label">Meetings &amp; MOM</div>
                        <a data-active-pages="appointments.php" class="nav-link-custom" href="appointments.php">
                            <i class="bi bi-calendar2-week me-2"></i> <span>Appointments</span>
                        </a>
                        <a data-active-pages="appointment-schedule.php" class="nav-link-custom" href="appointment-schedule.php">
                            <i class="bi bi-calendar-check me-2"></i> <span>Appointment Schedule</span>
                        </a>
                        <a data-active-pages="callbacks.php" class="nav-link-custom" href="callbacks.php">
                            <i class="bi bi-telephone-inbound me-2"></i> <span>Callbacks</span>
                        </a>
                        <a data-active-pages="past-meeting.php" class="nav-link-custom" href="past-meeting.php">
                            <i class="bi bi-clock-history me-2"></i> <span>Past Meetings</span>
                        </a>
                        <a data-active-pages="mom.php" class="nav-link-custom" href="mom.php">
                            <i class="bi bi-journal-text me-2"></i> <span>Minutes of Meeting</span>
                        </a>
                        <a data-active-pages="summary-report.php" class="nav-link-custom" href="summary-report.php">
                            <i class="bi bi-bar-chart-line me-2"></i> <span>Summary Report</span>
                        </a>
                    </div>

                    <!-- 3. Customers & Contacts -->
                    <div class="panel-section" data-panel="Customers">
                        <div class="nav-label">Customers</div>
                        <a data-active-pages="customer-dashboard.php" class="nav-link-custom" href="customer-dashboard.php">
                            <i class="bi bi-pie-chart me-2"></i> <span>Customer 360&deg;</span>
                        </a>
                        <a data-active-pages="customers.php,customer-view.php,customer-new.php,customer-import.php" class="nav-link-custom" href="customers.php">
                            <i class="bi bi-person-vcard me-2"></i> <span>Customers List</span>
                        </a>
                        <a data-active-pages="contacts.php" class="nav-link-custom" href="contacts.php">
                            <i class="bi bi-people me-2"></i> <span>Contacts</span>
                        </a>
                    </div>

                    <!-- 4. Project Management & Tasks -->
                    <div class="panel-section" data-panel="Project Management">
                        <div class="nav-label">Projects &amp; Tasks</div>
                        <a data-active-pages="project-dashboard.php" class="nav-link-custom" href="project-dashboard.php">
                            <i class="bi bi-speedometer2 me-2"></i> <span>Project Dashboard</span>
                        </a>

                        <!-- Projects Group -->
                        <a data-toggle-flag="isProjectCoreActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#projectsSubmenu" role="button" aria-expanded="false" aria-controls="projectsSubmenu">
                            <span><i class="bi bi-briefcase me-2"></i> <span>Projects</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div data-show-flag="isProjectCoreActive" class="collapse tree-submenu" id="projectsSubmenu">
                            <a data-active-pages="projects-list.php,project-create.php" class="tree-link" href="projects-list.php">Projects List</a>
                            <a data-active-pages="projects-report.php" class="tree-link" href="projects-report.php">Projects Report</a>
                            <a data-active-pages="projectwise-daily-task-report.php" class="tree-link" href="projectwise-daily-task-report.php">Daily Task Report</a>
                        </div>

                        <!-- Tasks Group -->
                        <a data-toggle-flag="isTaskCoreActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#tasksSubmenu" role="button" aria-expanded="false" aria-controls="tasksSubmenu">
                            <span><i class="bi bi-check2-square me-2"></i> <span>Tasks</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div data-show-flag="isTaskCoreActive" class="collapse tree-submenu" id="tasksSubmenu">
                            <a data-active-pages="task-overview.php" class="tree-link" href="task-overview.php">Tasks Kanban</a>
                            <a data-active-pages="tasks-list.php,task-create.php" class="tree-link" href="tasks-list.php">Tasks List</a>
                            <a data-active-pages="score-card.php" class="tree-link" href="score-card.php">Score Card</a>
                        </div>
                    </div>

                    <!-- 5. Billing & Finance -->
                    <div class="panel-section" data-panel="Expenses">
                        <div class="nav-label">Billing &amp; Finance</div>
                        <a data-active-pages="invoices.php,invoice-create.php" class="nav-link-custom" href="invoices.php">
                            <i class="bi bi-file-earmark-ruled me-2"></i> <span>Invoices</span>
                        </a>
                        <a data-active-pages="payments.php" class="nav-link-custom" href="payments.php">
                            <i class="bi bi-credit-card-2-front me-2"></i> <span>Payments Received</span>
                        </a>
                        <a data-active-pages="expenses.php,expense-create.php" class="nav-link-custom" href="expenses.php">
                            <i class="bi bi-receipt me-2"></i> <span>Field Expenses</span>
                        </a>
                    </div>

                    <!-- 6. Petty Cash -->
                    <div class="panel-section" data-panel="PettyCash">
                        <div class="nav-label">Petty Cash</div>
                        <a data-active-pages="petty-cash.php,petty-cash-list.php,petty-cash-create.php" class="nav-link-custom" href="petty-cash.php">
                            <i class="bi bi-safe me-2"></i> <span>Petty Cash List</span>
                        </a>
                        <a data-active-pages="petty-cash-report.php" class="nav-link-custom" href="petty-cash-report.php">
                            <i class="bi bi-bar-chart-steps me-2"></i> <span>Petty Cash Report</span>
                        </a>
                    </div>

                    <!-- 7. Support & SLA -->
                    <div class="panel-section" data-panel="Support">
                        <div class="nav-label">Support &amp; Helpdesk</div>
                        <a data-active-pages="ticket-dashboard.php" class="nav-link-custom" href="ticket-dashboard.php">
                            <i class="bi bi-speedometer2 me-2"></i> <span>Support Dashboard</span>
                        </a>
                        <a data-active-pages="support-tickets.php,support-create-ticket.php" class="nav-link-custom" href="support-tickets.php">
                            <i class="bi bi-headset me-2"></i> <span>Support Tickets</span>
                        </a>
                        <a data-active-pages="ticket-reports.php" class="nav-link-custom" href="ticket-reports.php">
                            <i class="bi bi-file-earmark-bar-graph me-2"></i> <span>SLA Reports</span>
                        </a>
                    </div>

                    <!-- 8. Sales Targets -->
                    <div class="panel-section" data-panel="Target">
                        <div class="nav-label">Sales Targets</div>
                        <a data-active-pages="target.php" class="nav-link-custom" href="target.php">
                            <i class="bi bi-bullseye me-2"></i> <span>Target Overview</span>
                        </a>
                        <a data-active-pages="brand-target.php" class="nav-link-custom" href="brand-target.php">
                            <i class="bi bi-tags me-2"></i> <span>Brand Targets</span>
                        </a>
                        <a data-active-pages="sales-target-slabs.php" class="nav-link-custom" href="sales-target-slabs.php">
                            <i class="bi bi-bar-chart-steps me-2"></i> <span>Target Slabs</span>
                        </a>
                    </div>

                    <!-- 9. Sales Team & Field Force -->
                    <div class="panel-section" data-panel="Staff">
                        <div class="nav-label">Staff &amp; Field Force</div>
                        <a data-active-pages="staff.php,staff-create.php" class="nav-link-custom" href="staff.php">
                            <i class="bi bi-people-fill me-2"></i> <span>Staff Directory</span>
                        </a>
                        <a data-active-pages="staff-visting-report.php" class="nav-link-custom" href="staff-visting-report.php">
                            <i class="bi bi-geo-alt me-2"></i> <span>Visiting Reports</span>
                        </a>
                        <a data-active-pages="staff-visiting-location-report.php" class="nav-link-custom" href="staff-visiting-location-report.php">
                            <i class="bi bi-pin-map me-2"></i> <span>Location Map</span>
                        </a>
                    </div>

                    <!-- 10. Master Data (Grouped into Clean Collapsible Categories) -->
                    <div class="panel-section" data-panel="Master">
                        <div class="nav-label">Master Data</div>

                        <a class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#masterLeadSubmenu" role="button" aria-expanded="false">
                            <span><i class="bi bi-layers me-2"></i> <span>Lead Masters</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div class="collapse tree-submenu" id="masterLeadSubmenu">
                            <a data-active-pages="lead-stage.php,lead-stages-master.php" class="tree-link" href="lead-stage.php">Lead Stages</a>
                            <a data-active-pages="lead-sources-master.php" class="tree-link" href="lead-sources-master.php">Lead Sources</a>
                            <a data-active-pages="lead-status-master.php" class="tree-link" href="lead-status-master.php">Lead Status</a>
                        </div>

                        <a class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#masterCustSubmenu" role="button" aria-expanded="false">
                            <span><i class="bi bi-people me-2"></i> <span>Customer Masters</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div class="collapse tree-submenu" id="masterCustSubmenu">
                            <a data-active-pages="customer-categories.php" class="tree-link" href="customer-categories.php">Customer Categories</a>
                            <a data-active-pages="industry-verticals.php" class="tree-link" href="industry-verticals.php">Industry Verticals</a>
                            <a data-active-pages="group-master.php" class="tree-link" href="group-master.php">Customer Groups</a>
                            <a data-active-pages="payment-terms-master.php" class="tree-link" href="payment-terms-master.php">Payment Terms</a>
                        </div>

                        <a class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#masterMeetSubmenu" role="button" aria-expanded="false">
                            <span><i class="bi bi-calendar2-event me-2"></i> <span>Meeting Masters</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div class="collapse tree-submenu" id="masterMeetSubmenu">
                            <a data-active-pages="appointment-types.php,meeting-types-master.php" class="tree-link" href="appointment-types.php">Meeting Types</a>
                            <a data-active-pages="meeting-outcomes-master.php" class="tree-link" href="meeting-outcomes-master.php">Meeting Outcomes</a>
                            <a data-active-pages="visit-activity-types.php" class="tree-link" href="visit-activity-types.php">Visit Activity Types</a>
                        </div>

                        <a class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#masterProjSubmenu" role="button" aria-expanded="false">
                            <span><i class="bi bi-box-seam me-2"></i> <span>Catalog &amp; Projects</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div class="collapse tree-submenu" id="masterProjSubmenu">
                            <a data-active-pages="brand-master.php" class="tree-link" href="brand-master.php">Brands</a>
                            <a data-active-pages="product-catalog-master.php" class="tree-link" href="product-catalog-master.php">Product Catalog</a>
                            <a data-active-pages="project-types-master.php" class="tree-link" href="project-types-master.php">Project Types</a>
                            <a data-active-pages="milestone-templates.php" class="tree-link" href="milestone-templates.php">Milestone Templates</a>
                            <a data-active-pages="ticket-categories.php" class="tree-link" href="ticket-categories.php">Ticket Categories</a>
                        </div>
                    </div>

                    <!-- 11. System Settings -->
                    <div class="panel-section" data-panel="Settings">
                        <div class="nav-label">Settings</div>

                        <a data-active-pages="settings.php" class="nav-link-custom" href="settings.php">
                            <i class="bi bi-grid-fill me-2"></i> <span>Settings Overview</span>
                        </a>
                        <a data-active-pages="branch.php" class="nav-link-custom" href="branch.php">
                            <i class="bi bi-geo-alt me-2"></i> <span>Branch Setup</span>
                        </a>
                        <a data-active-pages="role.php,permission-modules.php" class="nav-link-custom" href="role.php">
                            <i class="bi bi-shield-lock me-2"></i> <span>Roles &amp; Access</span>
                        </a>
                        <a data-active-pages="currency-master.php" class="nav-link-custom" href="currency-master.php">
                            <i class="bi bi-currency-exchange me-2"></i> <span>Currency Setup</span>
                        </a>
                        <a data-active-pages="sla-policies.php,sla-policies-severity.php" class="nav-link-custom" href="sla-policies.php">
                            <i class="bi bi-shield-check me-2"></i> <span>SLA Policies</span>
                        </a>

                        <a class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed"
                            data-bs-toggle="collapse" href="#settingsGeoSubmenu" role="button" aria-expanded="false">
                            <span><i class="bi bi-globe-americas me-2"></i> <span>Locations</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div class="collapse tree-submenu" id="settingsGeoSubmenu">
                            <a data-active-pages="country.php" class="tree-link" href="country.php">Countries</a>
                            <a data-active-pages="state.php" class="tree-link" href="state.php">States</a>
                            <a data-active-pages="district.php" class="tree-link" href="district.php">Districts</a>
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