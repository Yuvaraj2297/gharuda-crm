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
            <button type="button" class="btn btn-primary btn-sm d-none d-md-inline-flex align-items-center gap-1 fw-bold px-3 shadow-sm" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius:999px; font-size:12.5px; height:36px;">
                <i class="bi bi-plus-lg"></i> <span>Quick Create</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 p-2" style="min-width: 235px; font-size: 13px;">
                <li class="px-2 py-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">CRM &amp; Pipeline</li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="lead.php"><i class="bi bi-person-plus text-success"></i> New Lead</a></li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="deals.php"><i class="bi bi-currency-rupee text-primary"></i> New Opportunity / Deal</a></li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="quotation-create.php"><i class="bi bi-file-earmark-text text-info"></i> Create Quotation</a></li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="appointments.php"><i class="bi bi-calendar2-plus text-warning"></i> Book Appointment</a></li>
                <li><hr class="dropdown-divider my-1"></li>
                <li class="px-2 py-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Clients &amp; Execution</li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="customer-new.php"><i class="bi bi-building-add text-success"></i> New Customer Account</a></li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="project-create.php"><i class="bi bi-briefcase text-primary"></i> New Project</a></li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="task-create.php"><i class="bi bi-check2-square text-info"></i> Assign New Task</a></li>
                <li><hr class="dropdown-divider my-1"></li>
                <li class="px-2 py-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Billing &amp; Helpdesk</li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="invoice-create.php"><i class="bi bi-file-earmark-plus text-success"></i> Create Tax Invoice</a></li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="expense-create.php"><i class="bi bi-receipt text-warning"></i> Record Field Expense</a></li>
                <li><a class="dropdown-item rounded-3 py-1.5 d-flex align-items-center gap-2" href="support-create-ticket.php"><i class="bi bi-headset text-danger"></i> New Support Ticket</a></li>
            </ul>
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

                    <!-- 1. CRM: Leads, Deals, Quotes, Contracts & Omnichannel -->
                    <div class="panel-section" data-panel="CRM">
                        <div class="nav-label">Leads &amp; Sales Pipeline</div>

                        <a data-active-pages="lead-dashboard.php" class="nav-link-custom fw-semibold mb-2" href="lead-dashboard.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-speedometer2 me-2"></i> <span>Lead Dashboard</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">1. Lead Capture &amp; Follow-Up</div>
                        <a data-active-pages="lead.php" class="nav-link-custom" href="lead.php">
                            <i class="bi bi-person-lines-fill me-2"></i> <span>All Leads</span>
                        </a>
                        <a data-active-pages="manage-leads.php" class="nav-link-custom" href="manage-leads.php">
                            <i class="bi bi-kanban me-2"></i> <span>Manage Leads</span>
                        </a>
                        <a data-active-pages="follow-up-list.php" class="nav-link-custom" href="follow-up-list.php">
                            <i class="bi bi-clock-history me-2"></i> <span>Follow-Up Schedule</span>
                        </a>
                        <a data-active-pages="lead-map.php" class="nav-link-custom" href="lead-map.php">
                            <i class="bi bi-geo-alt me-2"></i> <span>Lead Map View</span>
                        </a>
                        <a data-active-pages="lead-filter.php" class="nav-link-custom" href="lead-filter.php">
                            <i class="bi bi-funnel me-2"></i> <span>Advanced Lead Filter</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">2. Deals, Quotes &amp; Contracts</div>
                        <a data-active-pages="deals.php" class="nav-link-custom" href="deals.php">
                            <i class="bi bi-currency-rupee me-2"></i> <span>Deals Pipeline</span>
                        </a>
                        <a data-active-pages="quotations.php" class="nav-link-custom" href="quotations.php">
                            <i class="bi bi-file-earmark-text me-2"></i> <span>Quotations &amp; Proposals</span>
                        </a>
                        <a data-active-pages="quotation-create.php" class="nav-link-custom" href="quotation-create.php">
                            <i class="bi bi-file-earmark-plus me-2 text-primary"></i> <span>Create Quotation</span>
                        </a>
                        <a data-active-pages="contracts.php" class="nav-link-custom" href="contracts.php">
                            <i class="bi bi-pen me-2"></i> <span>Contracts &amp; SLAs</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">3. Omnichannel Engage</div>
                        <a data-active-pages="whatsapp-chat.php" class="nav-link-custom" href="whatsapp-chat.php">
                            <i class="bi bi-whatsapp me-2 text-success"></i> <span>WhatsApp Chat</span>
                        </a>
                        <a data-active-pages="mailbox.php" class="nav-link-custom" href="mailbox.php">
                            <i class="bi bi-envelope me-2"></i> <span>Email Mailbox</span>
                        </a>
                        <a data-active-pages="sms-chat.php" class="nav-link-custom" href="sms-chat.php">
                            <i class="bi bi-chat-dots me-2"></i> <span>SMS Center</span>
                        </a>

                        <a data-toggle-flag="isLeadReportActive" class="nav-link-custom org-toggle-btn d-flex align-items-center justify-content-between collapsed mt-2"
                            data-bs-toggle="collapse"
                            href="#leadReportsSubmenu"
                            role="button"
                            aria-expanded="false"
                            aria-controls="leadReportsSubmenu">
                            <span><i class="bi bi-graph-up-arrow me-2 text-primary"></i> <span>Sales &amp; Lead Reports</span></span>
                            <i class="bi bi-chevron-down toggle-icon ms-auto"></i>
                        </a>
                        <div data-show-flag="isLeadReportActive" class="collapse tree-submenu" id="leadReportsSubmenu">
                            <a data-active-pages="employee-revenue-report.php" class="tree-link" href="employee-revenue-report.php">Employee Revenue Report</a>
                            <a data-active-pages="employee-lead-report.php" class="tree-link" href="employee-lead-report.php">Employee Lead Report</a>
                            <a data-active-pages="lead-source-report.php" class="tree-link" href="lead-source-report.php">Lead Source Report</a>
                            <a data-active-pages="brandwise-report.php" class="tree-link" href="brandwise-report.php">Brandwise Sales Report</a>
                        </div>
                    </div>

                    <!-- 2. Appointments & MOM Panel Section -->
                    <div class="panel-section" data-panel="Appointments">
                        <div class="nav-label">Meetings &amp; MOM</div>

                        <a data-active-pages="appointments.php" class="nav-link-custom fw-semibold mb-2" href="appointments.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-calendar2-week me-2"></i> <span>Appointments Overview</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Schedule &amp; Follow-Ups</div>
                        <a data-active-pages="appointment-schedule.php" class="nav-link-custom" href="appointment-schedule.php">
                            <i class="bi bi-calendar-check me-2"></i> <span>Appointment Schedule</span>
                        </a>
                        <a data-active-pages="callbacks.php" class="nav-link-custom" href="callbacks.php">
                            <i class="bi bi-telephone-inbound me-2"></i> <span>Client Callbacks</span>
                        </a>
                        <a data-active-pages="past-meeting.php" class="nav-link-custom" href="past-meeting.php">
                            <i class="bi bi-clock-history me-2"></i> <span>Past Meetings Log</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Meeting Records &amp; Insights</div>
                        <a data-active-pages="mom.php" class="nav-link-custom" href="mom.php">
                            <i class="bi bi-journal-text me-2"></i> <span>Minutes of Meeting (MOM)</span>
                        </a>
                        <a data-active-pages="summary-report.php" class="nav-link-custom" href="summary-report.php">
                            <i class="bi bi-bar-chart-line me-2"></i> <span>Meeting Summary Report</span>
                        </a>
                    </div>

                    <!-- 3. Customers & Contacts Panel Section -->
                    <div class="panel-section" data-panel="Customers">
                        <div class="nav-label">Customers &amp; 360&deg;</div>

                        <a data-active-pages="customer-dashboard.php" class="nav-link-custom fw-semibold mb-2" href="customer-dashboard.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-pie-chart me-2"></i> <span>Customer 360&deg; Dashboard</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Accounts &amp; Contacts</div>
                        <a data-active-pages="customers.php,customer-view.php" class="nav-link-custom" href="customers.php">
                            <i class="bi bi-person-vcard me-2"></i> <span>Customers Directory</span>
                        </a>
                        <a data-active-pages="customer-new.php" class="nav-link-custom" href="customer-new.php">
                            <i class="bi bi-building-add me-2 text-primary"></i> <span>Add New Customer</span>
                        </a>
                        <a data-active-pages="contacts.php" class="nav-link-custom" href="contacts.php">
                            <i class="bi bi-people me-2"></i> <span>Contacts Directory</span>
                        </a>
                        <a data-active-pages="customer-import.php" class="nav-link-custom" href="customer-import.php">
                            <i class="bi bi-cloud-arrow-up me-2"></i> <span>Bulk Import Customers</span>
                        </a>
                    </div>

                    <!-- 4. Project Management & Tasks Panel Section -->
                    <div class="panel-section" data-panel="Project Management">
                        <div class="nav-label">Projects &amp; Tasks</div>

                        <a data-active-pages="project-dashboard.php" class="nav-link-custom fw-semibold mb-2" href="project-dashboard.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-speedometer2 me-2"></i> <span>Project Dashboard</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Projects &amp; Milestones</div>
                        <a data-active-pages="projects-list.php" class="nav-link-custom" href="projects-list.php">
                            <i class="bi bi-briefcase me-2"></i> <span>Projects Directory</span>
                        </a>
                        <a data-active-pages="project-create.php" class="nav-link-custom" href="project-create.php">
                            <i class="bi bi-plus-circle me-2 text-primary"></i> <span>Create New Project</span>
                        </a>
                        <a data-active-pages="projects-report.php" class="nav-link-custom" href="projects-report.php">
                            <i class="bi bi-clipboard-data me-2"></i> <span>Projects Status Report</span>
                        </a>
                        <a data-active-pages="projectwise-daily-task-report.php" class="nav-link-custom" href="projectwise-daily-task-report.php">
                            <i class="bi bi-calendar2-range me-2"></i> <span>Daily Task Log Report</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Tasks &amp; Team Execution</div>
                        <a data-active-pages="task-overview.php" class="nav-link-custom" href="task-overview.php">
                            <i class="bi bi-kanban me-2"></i> <span>Tasks Kanban Board</span>
                        </a>
                        <a data-active-pages="tasks-list.php" class="nav-link-custom" href="tasks-list.php">
                            <i class="bi bi-check2-square me-2"></i> <span>Tasks Directory</span>
                        </a>
                        <a data-active-pages="task-create.php" class="nav-link-custom" href="task-create.php">
                            <i class="bi bi-plus-square me-2 text-primary"></i> <span>Assign New Task</span>
                        </a>
                        <a data-active-pages="score-card.php" class="nav-link-custom" href="score-card.php">
                            <i class="bi bi-trophy me-2"></i> <span>Team KPI Score Card</span>
                        </a>
                    </div>

                    <!-- 5. Billing, Invoicing & Expenses Panel Section -->
                    <div class="panel-section" data-panel="Expenses">
                        <div class="nav-label">Billing &amp; Invoicing</div>

                        <a data-active-pages="invoices.php" class="nav-link-custom fw-semibold mb-2" href="invoices.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-file-earmark-ruled me-2"></i> <span>Invoices Ledger</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Tax Billing &amp; Collections</div>
                        <a data-active-pages="invoice-create.php" class="nav-link-custom" href="invoice-create.php">
                            <i class="bi bi-file-earmark-plus me-2 text-primary"></i> <span>Create Tax Invoice</span>
                        </a>
                        <a data-active-pages="payments.php" class="nav-link-custom" href="payments.php">
                            <i class="bi bi-credit-card-2-front me-2"></i> <span>Payments Received</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Field Expense Claims</div>
                        <a data-active-pages="expenses.php" class="nav-link-custom" href="expenses.php">
                            <i class="bi bi-receipt me-2"></i> <span>Field Expenses Ledger</span>
                        </a>
                        <a data-active-pages="expense-create.php" class="nav-link-custom" href="expense-create.php">
                            <i class="bi bi-plus-circle me-2 text-primary"></i> <span>Record Field Expense</span>
                        </a>
                    </div>

                    <!-- 6. Petty Cash Panel Section -->
                    <div class="panel-section" data-panel="PettyCash">
                        <div class="nav-label">Petty Cash</div>

                        <a data-active-pages="petty-cash.php,petty-cash-list.php" class="nav-link-custom fw-semibold mb-2" href="petty-cash.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-safe me-2"></i> <span>Petty Cash Ledger</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Vouchers &amp; Audits</div>
                        <a data-active-pages="petty-cash-create.php" class="nav-link-custom" href="petty-cash-create.php">
                            <i class="bi bi-file-earmark-plus me-2 text-primary"></i> <span>Create Expense Voucher</span>
                        </a>
                        <a data-active-pages="petty-cash-report.php" class="nav-link-custom" href="petty-cash-report.php">
                            <i class="bi bi-bar-chart-steps me-2"></i> <span>Petty Cash Report</span>
                        </a>
                    </div>

                    <!-- 7. Customer Support & Helpdesk Panel Section -->
                    <div class="panel-section" data-panel="Support">
                        <div class="nav-label">Support &amp; SLA Helpdesk</div>

                        <a data-active-pages="ticket-dashboard.php" class="nav-link-custom fw-semibold mb-2" href="ticket-dashboard.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-speedometer2 me-2"></i> <span>Support SLA Dashboard</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Helpdesk Queue &amp; SLA</div>
                        <a data-active-pages="support-tickets.php" class="nav-link-custom" href="support-tickets.php">
                            <i class="bi bi-headset me-2"></i> <span>Support Tickets Queue</span>
                        </a>
                        <a data-active-pages="support-create-ticket.php" class="nav-link-custom" href="support-create-ticket.php">
                            <i class="bi bi-plus-circle me-2 text-primary"></i> <span>Create Support Ticket</span>
                        </a>
                        <a data-active-pages="ticket-reports.php" class="nav-link-custom" href="ticket-reports.php">
                            <i class="bi bi-file-earmark-bar-graph me-2"></i> <span>Ticket &amp; SLA Reports</span>
                        </a>
                    </div>

                    <!-- 8. Sales Targets & Quotas Panel Section -->
                    <div class="panel-section" data-panel="Target">
                        <div class="nav-label">Sales Targets &amp; Quotas</div>

                        <a data-active-pages="target.php" class="nav-link-custom fw-semibold mb-2" href="target.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-bullseye me-2"></i> <span>Sales Target Overview</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Quotas &amp; Incentive Slabs</div>
                        <a data-active-pages="brand-target.php" class="nav-link-custom" href="brand-target.php">
                            <i class="bi bi-tags me-2"></i> <span>Brand-wise Targets</span>
                        </a>
                        <a data-active-pages="sales-target-slabs.php" class="nav-link-custom" href="sales-target-slabs.php">
                            <i class="bi bi-bar-chart-steps me-2"></i> <span>Target Incentive Slabs</span>
                        </a>
                    </div>

                    <!-- 9. Sales Team & Field Force Panel Section -->
                    <div class="panel-section" data-panel="Staff">
                        <div class="nav-label">Sales Team &amp; Field Force</div>

                        <a data-active-pages="staff.php" class="nav-link-custom fw-semibold mb-2" href="staff.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-people-fill me-2"></i> <span>Staff &amp; Sales Directory</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Team Onboarding &amp; Field Visits</div>
                        <a data-active-pages="staff-create.php" class="nav-link-custom" href="staff-create.php">
                            <i class="bi bi-person-plus me-2 text-primary"></i> <span>Onboard Staff Member</span>
                        </a>
                        <a data-active-pages="staff-visting-report.php" class="nav-link-custom" href="staff-visting-report.php">
                            <i class="bi bi-geo-alt me-2"></i> <span>Field Visit Reports</span>
                        </a>
                        <a data-active-pages="staff-visiting-location-report.php" class="nav-link-custom" href="staff-visiting-location-report.php">
                            <i class="bi bi-pin-map me-2"></i> <span>Live GPS Location Map</span>
                        </a>
                    </div>

                    <!-- 10. Master Data Panel Section -->
                    <div class="panel-section" data-panel="Master">
                        <div class="nav-label">Master Data</div>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">CRM &amp; Sales Pipeline</div>
                        <a data-active-pages="lead-stage.php,lead-stages-master.php" class="nav-link-custom" href="lead-stage.php">
                            <i class="bi bi-layers me-2"></i> <span>Lead Stages</span>
                        </a>
                        <a data-active-pages="lead-sources-master.php" class="nav-link-custom" href="lead-sources-master.php">
                            <i class="bi bi-diagram-2 me-2"></i> <span>Lead Sources</span>
                        </a>
                        <a data-active-pages="lead-status-master.php" class="nav-link-custom" href="lead-status-master.php">
                            <i class="bi bi-flag me-2"></i> <span>Lead Status</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Customers &amp; Billing</div>
                        <a data-active-pages="customer-categories.php" class="nav-link-custom" href="customer-categories.php">
                            <i class="bi bi-people me-2"></i> <span>Customer Categories</span>
                        </a>
                        <a data-active-pages="industry-verticals.php" class="nav-link-custom" href="industry-verticals.php">
                            <i class="bi bi-buildings me-2"></i> <span>Industry Verticals</span>
                        </a>
                        <a data-active-pages="group-master.php" class="nav-link-custom" href="group-master.php">
                            <i class="bi bi-collection me-2"></i> <span>Customer Groups</span>
                        </a>
                        <a data-active-pages="payment-terms-master.php" class="nav-link-custom" href="payment-terms-master.php">
                            <i class="bi bi-credit-card-2-front me-2"></i> <span>Payment Terms</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Meetings &amp; Field Visits</div>
                        <a data-active-pages="appointment-types.php,meeting-types-master.php" class="nav-link-custom" href="appointment-types.php">
                            <i class="bi bi-calendar2-event me-2"></i> <span>Meeting Types</span>
                        </a>
                        <a data-active-pages="meeting-outcomes-master.php" class="nav-link-custom" href="meeting-outcomes-master.php">
                            <i class="bi bi-clipboard2-check me-2"></i> <span>Meeting Outcomes</span>
                        </a>
                        <a data-active-pages="visit-activity-types.php" class="nav-link-custom" href="visit-activity-types.php">
                            <i class="bi bi-pin-map me-2"></i> <span>Visit Activity Types</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Projects &amp; Support</div>
                        <a data-active-pages="project-types-master.php" class="nav-link-custom" href="project-types-master.php">
                            <i class="bi bi-folder-check me-2"></i> <span>Project Types</span>
                        </a>
                        <a data-active-pages="milestone-templates.php" class="nav-link-custom" href="milestone-templates.php">
                            <i class="bi bi-signpost-split me-2"></i> <span>Milestone Templates</span>
                        </a>
                        <a data-active-pages="ticket-categories.php" class="nav-link-custom" href="ticket-categories.php">
                            <i class="bi bi-ticket-perforated me-2"></i> <span>Ticket Categories</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Brand &amp; Product Catalog</div>
                        <a data-active-pages="brand-master.php" class="nav-link-custom" href="brand-master.php">
                            <i class="bi bi-patch-check me-2"></i> <span>Brand Master</span>
                        </a>
                        <a data-active-pages="product-catalog-master.php" class="nav-link-custom" href="product-catalog-master.php">
                            <i class="bi bi-box-seam me-2"></i> <span>Product &amp; Service Catalog</span>
                        </a>
                    </div>

                    <!-- 11. System Settings Panel Section -->
                    <div class="panel-section" data-panel="Settings">
                        <div class="nav-label">System Settings</div>

                        <a data-active-pages="settings.php" class="nav-link-custom fw-semibold mb-2" href="settings.php" style="color:var(--primary, #16a34a); background:rgba(22, 163, 74, 0.08); border-radius:8px;">
                            <i class="bi bi-grid-fill me-2"></i> <span>Settings Overview Hub</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Organization &amp; Geo Setup</div>
                        <a data-active-pages="branch.php" class="nav-link-custom" href="branch.php">
                            <i class="bi bi-geo-alt me-2"></i> <span>Branch Setup</span>
                        </a>
                        <a data-active-pages="country.php" class="nav-link-custom" href="country.php">
                            <i class="bi bi-globe-americas me-2"></i> <span>Countries</span>
                        </a>
                        <a data-active-pages="state.php" class="nav-link-custom" href="state.php">
                            <i class="bi bi-map me-2"></i> <span>States &amp; Provinces</span>
                        </a>
                        <a data-active-pages="district.php" class="nav-link-custom" href="district.php">
                            <i class="bi bi-pin-map me-2"></i> <span>Districts &amp; Cities</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Security &amp; Access Control</div>
                        <a data-active-pages="role.php" class="nav-link-custom" href="role.php">
                            <i class="bi bi-shield-lock me-2"></i> <span>Roles &amp; Permissions</span>
                        </a>
                        <a data-active-pages="permission-modules.php" class="nav-link-custom" href="permission-modules.php">
                            <i class="bi bi-key me-2"></i> <span>Permission Modules</span>
                        </a>

                        <div class="px-2 pt-2 pb-1 text-uppercase text-muted fw-bold" style="font-size:10px; letter-spacing:0.5px;">Finance &amp; SLA Policies</div>
                        <a data-active-pages="currency-master.php" class="nav-link-custom" href="currency-master.php">
                            <i class="bi bi-currency-exchange me-2"></i> <span>Currency Setup</span>
                        </a>
                        <a data-active-pages="sla-policies.php,sla-policies-severity.php" class="nav-link-custom" href="sla-policies.php">
                            <i class="bi bi-shield-check me-2"></i> <span>SLA Policies &amp; Severity</span>
                        </a>
                    </div>
                </div>
            </div>
        </aside>

        <!-- backdrop for mobile drawer -->
        <div class="sb-backdrop" id="sbBackdrop"></div>

        <!-- ============ MAIN ============ -->
        <div class="main-area">
            <div class="content-pad">