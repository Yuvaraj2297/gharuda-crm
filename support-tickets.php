<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    .st-page {
        padding: 24px 20px;
        background-color: #f8fafc;
        min-height: calc(100vh - 70px);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .st-header-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .st-title-group {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .st-title-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #f0fdf4;
        color: #16a34a;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 2px 6px rgba(22, 163, 74, 0.15);
    }

    .st-new-btn {
        background: #2563eb;
        border: none;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 10px 22px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none !important;
    }

    .st-new-btn:hover {
        background: #1d4ed8;
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
    }

    /* Filter Card */
    .st-filter-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
    }

    /* Summary Bar */
    .st-summary-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 18px 24px;
        margin-bottom: 24px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
    }

    .st-summary-title {
        font-size: 14px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .st-counter-list {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 24px;
    }

    .st-counter-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13.5px;
        font-weight: 700;
        color: #475569;
        cursor: pointer;
        transition: opacity 0.2s ease;
    }

    .st-counter-item:hover {
        opacity: 0.8;
    }

    .st-cnt-num {
        font-weight: 800;
        font-size: 15px;
    }

    .st-cnt-open { color: #2563eb; }
    .st-cnt-hold { color: #d97706; }
    .st-cnt-closed { color: #dc2626; }
    .st-cnt-progress { color: #16a34a; }
    .st-cnt-answered { color: #db2777; }

    .st-counter-divider {
        width: 1px;
        height: 18px;
        background-color: #cbd5e1;
    }

    /* Select2 Customization */
    .select2-container--default .select2-selection--single {
        height: 42px !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 6px 12px !important;
        font-size: 13.5px !important;
        font-weight: 600 !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px !important;
        right: 10px !important;
    }

    .select2-container--default.select2-container--open .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 3.5px rgba(16, 185, 129, 0.18) !important;
    }

    .select2-dropdown {
        border-radius: 12px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12) !important;
        z-index: 99999 !important;
    }

    .select2-search__field {
        border-radius: 8px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 6px 12px !important;
    }

    /* Status Pills */
    .st-pill {
        display: inline-flex;
        align-items: center;
        padding: 3px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        border: 1px solid transparent;
    }

    .st-pill-closed { background: #fef2f2; color: #dc2626; border-color: #fecaca; }
    .st-pill-progress { background: #f0fdf4; color: #16a34a; border-color: #bbf7d0; }
    .st-pill-open { background: #eff6ff; color: #2563eb; border-color: #bfdbfe; }
    .st-pill-answered { background: #fdf2f8; color: #db2777; border-color: #fbcfe8; }
    .st-pill-hold { background: #fffbeb; color: #d97706; border-color: #fde68a; }

    .st-card-custom {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }
</style>

<main class="st-page">
    <!-- Header Card -->
    <div class="st-header-card">
        <div class="st-title-group">
            <div class="st-title-icon">
                <i class="bi bi-headset"></i>
            </div>
            <div>
                <h3 class="fw-bold m-0 text-dark">Support Tickets &amp; SLA Follow-Up</h3>
                <span class="text-muted small">Manage Software Bug/API Tickets &amp; Hardware RMA/Field Service Tickets with end-to-end follow-up logs</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <a href="ticket-dashboard.php" class="btn btn-outline-secondary btn-sm fw-semibold px-3 py-2 rounded-3">
                <i class="bi bi-speedometer2 me-1"></i>SLA Dashboard
            </a>
            <a href="support-create-ticket.php" class="st-new-btn">
                <i class="bi bi-plus-lg"></i> New Ticket
            </a>
        </div>
    </div>

    <!-- Filter Card -->
    <div class="st-filter-card">
        <div class="row g-3 align-items-end justify-content-between">
            <div class="col-md-5 col-lg-4">
                <label class="form-label fw-bold text-secondary small mb-1" for="stDepartment">Filter by Department / Division</label>
                <select class="form-select select2" id="stDepartment">
                    <option value="">All Departments</option>
                    <option value="Software Support">Software Support (SaaS / Cloud / API)</option>
                    <option value="Hardware Support">Hardware Support (Biometrics / RMA / Field)</option>
                    <option value="Tech Support">Tech Support</option>
                    <option value="Production">Production</option>
                    <option value="Sales">Sales</option>
                    <option value="HR">HR</option>
                </select>
            </div>
            <div class="col-md-7 col-lg-8 d-flex align-items-center justify-content-md-end flex-wrap gap-2">
                <button type="button" class="btn btn-sm btn-dark fw-semibold px-3" onclick="quickFilterDivision('')">
                    All Tickets
                </button>
                <button type="button" class="btn btn-sm btn-outline-success fw-semibold px-3" onclick="quickFilterDivision('Software Support')">
                    <i class="bi bi-code-slash me-1"></i>Software Company Tickets (SW)
                </button>
                <button type="button" class="btn btn-sm btn-outline-warning text-dark fw-semibold px-3" onclick="quickFilterDivision('Hardware Support')">
                    <i class="bi bi-cpu me-1"></i>Hardware Company Tickets (HW)
                </button>
            </div>
        </div>
    </div>

    <!-- Tickets Summary Counter Bar -->
    <div class="st-summary-card">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
            <div class="st-summary-title mb-0">
                <i class="bi bi-clipboard-data-fill text-primary"></i> Tickets Summary (Click to Filter Status)
            </div>
            <button type="button" class="btn btn-link btn-sm text-decoration-none p-0 fw-semibold" onclick="quickFilterDivision('')">Reset Filters</button>
        </div>
        <div class="st-counter-list">
            <div class="st-counter-item" onclick="filterTicketsByStatus('Open')">
                <span class="st-cnt-num st-cnt-open" id="cntOpen">44</span>
                <span>Open</span>
            </div>
            <div class="st-counter-divider"></div>
            <div class="st-counter-item" onclick="filterTicketsByStatus('In Progress')">
                <span class="st-cnt-num st-cnt-progress" id="cntProgress">5</span>
                <span>In Progress</span>
            </div>
            <div class="st-counter-divider"></div>
            <div class="st-counter-item" onclick="filterTicketsByStatus('Answered')">
                <span class="st-cnt-num st-cnt-answered" id="cntAnswered">2</span>
                <span>Answered</span>
            </div>
            <div class="st-counter-divider"></div>
            <div class="st-counter-item" onclick="filterTicketsByStatus('On Hold')">
                <span class="st-cnt-num st-cnt-hold" id="cntHold">0</span>
                <span>On Hold</span>
            </div>
            <div class="st-counter-divider"></div>
            <div class="st-counter-item" onclick="filterTicketsByStatus('Closed')">
                <span class="st-cnt-num st-cnt-closed" id="cntClosed">11</span>
                <span>Closed</span>
            </div>
        </div>
    </div>

    <!-- Table Container -->
    <div class="card-custom mb-4">
        <div class="table-responsive">
            <table class="table-modern master-table column-border" id="stTable">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center;">#</th>
                        <th style="width: 40px; text-align: center;"><input type="checkbox" id="stSelectAllCheckbox" class="form-check-input" onclick="toggleStSelectAllRows(this)"></th>
                        <th class="text-nowrap" style="min-width: 240px;">SUBJECT &amp; SLA</th>
                        <th class="text-nowrap" style="width: 110px;">TAGS</th>
                        <th class="text-nowrap" style="width: 150px;">DEPARTMENT</th>
                        <th class="text-nowrap" style="width: 140px;">SERVICE / SERIAL</th>
                        <th class="text-nowrap" style="min-width: 190px;">CLIENT / CONTACT</th>
                        <th class="text-nowrap" style="width: 130px;">STATUS</th>
                        <th class="text-nowrap" style="width: 100px;">PRIORITY</th>
                        <th class="text-nowrap" style="width: 160px;">LAST REPLY</th>
                        <th class="text-nowrap" style="width: 150px;">CREATED</th>
                        <th class="text-nowrap text-center" style="width: 180px;">FOLLOW-UP &amp; ACTIONS</th>
                    </tr>
                </thead>
                <tbody id="stTbody"></tbody>
            </table>
        </div>
    </div>
</main>

<!-- ===== Ticket Follow-Up, Reply & Cross-Module Action Modal ===== -->
<div class="modal fade" id="ticketFollowupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-light border-bottom px-4 py-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge bg-primary font-monospace" id="mdlTkNo">#70</span>
                        <span class="badge bg-success-subtle text-success border border-success-subtle" id="mdlTkDept">Software Support</span>
                        <span class="st-pill st-pill-open" id="mdlTkStatusBadge">Open</span>
                    </div>
                    <h5 class="modal-title fw-bold text-dark mb-0" id="mdlTkSubject">Ticket Subject</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 py-3">
                <!-- Ticket Metadata Summary -->
                <div class="row g-2 p-3 rounded-3 bg-light border mb-3 small">
                    <div class="col-md-4">
                        <div class="text-muted">Client Account:</div>
                        <div class="fw-bold text-dark" id="mdlTkContact">—</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted">Service / Serial / Env:</div>
                        <div class="fw-bold text-primary" id="mdlTkService">—</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted">Priority &amp; Assigned To:</div>
                        <div class="fw-bold text-dark"><span id="mdlTkPriority">High</span> &middot; <span id="mdlTkAssignee">Harish D.</span></div>
                    </div>
                </div>

                <!-- 1-Click CRM / ERP Handoff Bar -->
                <div class="p-3 rounded-3 border border-primary-subtle bg-primary-subtle bg-opacity-10 mb-3">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <span class="small fw-bold text-dark"><i class="bi bi-lightning-charge-fill text-primary me-1"></i>Next-Step Workflow Actions:</span>
                        <div class="d-flex flex-wrap gap-2" id="mdlActionButtons">
                            <!-- Dynamically populated for SW vs HW -->
                        </div>
                    </div>
                </div>

                <!-- Follow-Up Conversation Timeline -->
                <h6 class="fw-bold text-dark mb-2"><i class="bi bi-clock-history text-success me-1"></i>Ticket Follow-Up &amp; Activity Log</h6>
                <div class="d-flex flex-column gap-2 mb-4" id="mdlFollowupTimeline"></div>

                <!-- Add New Follow-Up Reply Form -->
                <div class="card border shadow-none rounded-3 p-3 bg-light-subtle">
                    <h6 class="fw-bold text-dark mb-3"><i class="bi bi-reply-fill text-primary me-1"></i>Post Follow-Up Update / Client Reply</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Update Ticket Status</label>
                            <select class="form-select form-select-sm" id="mdlNewStatus">
                                <option value="Open">Open</option>
                                <option value="In Progress">In Progress (Working on Fix / RMA)</option>
                                <option value="Answered">Answered (Awaiting Client Confirmation)</option>
                                <option value="On Hold">On Hold (Pending Spare Part / Change Request)</option>
                                <option value="Closed">Closed / Resolved</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Logged By (Support Engineer)</label>
                            <select class="form-select form-select-sm" id="mdlReplyAuthor">
                                <option value="Harish D. (Software Support)">Harish D. (Software Support)</option>
                                <option value="Divya A. (Hardware RMA Desk)">Divya A. (Hardware RMA Desk)</option>
                                <option value="Karthik R. (Field Service Eng)">Karthik R. (Field Service Eng)</option>
                                <option value="Priya S. (Helpdesk Lead)">Priya S. (Helpdesk Lead)</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Follow-Up Resolution Note / Next Action <span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-sm" id="mdlReplyNote" rows="3" placeholder="Enter diagnostic findings, patch version deployed, or field technician visit confirmation..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light px-4 py-2">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-sm fw-bold px-3" onclick="saveTicketFollowup()">
                    <i class="bi bi-check2-circle me-1"></i>Save Follow-Up &amp; Update Status
                </button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/select2.js"></script>
<script src="./assets/js/master-table.js"></script>

<script>
    var ticketsData = [
        {
            id: 70,
            no: 70,
            subject: 'REST API Webhook Timeout during Lead Sync',
            dotColor: '#16a34a',
            tags: 'SW · API Bug',
            department: 'Software Support',
            service: 'Cloud ERP v4.2',
            contact: 'Gharuda Software (Aravind Swamy)',
            status: 'Open',
            priority: 'High',
            assignee: 'Harish D.',
            lastReply: '10 mins ago',
            created: '29-10-2026 10:15:00',
            followups: [
                {
                    time: '29-10-2026 10:15:00',
                    author: 'Gharuda Software (Client)',
                    role: 'Ticket Raised',
                    note: 'Webhook payloads returning HTTP 504 Gateway Timeout during peak lead sync hours. Need async queue worker fix.',
                    status: 'Open'
                },
                {
                    time: '29-10-2026 10:30:00',
                    author: 'Harish D. (Software Support)',
                    role: 'Triage & Diagnostics',
                    note: 'Identified slow DB lock on duplicate phone check. Preparing hotfix patch v4.2.1 and scheduling online verification call.',
                    status: 'In Progress'
                }
            ]
        },
        {
            id: 69,
            no: 69,
            subject: 'Biometric Optical Sensor Failure - RMA Replacement',
            dotColor: '#d97706',
            tags: 'HW · RMA',
            department: 'Hardware Support',
            service: 'SN-BIO-2026-9041',
            contact: 'Power Spares Engineering (Suresh Babu)',
            status: 'In Progress',
            priority: 'Urgent',
            assignee: 'Divya A.',
            lastReply: '25 mins ago',
            created: '29-10-2026 09:40:12',
            followups: [
                {
                    time: '29-10-2026 09:40:12',
                    author: 'Power Spares Engineering (Client)',
                    role: 'Ticket Raised',
                    note: 'Factory gate eSSL biometric terminal optical sensor stopped scanning after voltage surge. Under 1-Yr OEM warranty.',
                    status: 'Open'
                },
                {
                    time: '29-10-2026 10:05:00',
                    author: 'Divya A. (Hardware RMA Desk)',
                    role: 'RMA Approved',
                    note: 'Verified Serial SN-BIO-2026-9041 is under active OEM warranty. Reserved standby unit from Chennai Warehouse and assigning field engineer Karthik R. for on-site swap.',
                    status: 'In Progress'
                }
            ]
        },
        {
            id: 1,
            no: 68,
            subject: 'general issue',
            dotColor: '#db2777',
            tags: 'Tech',
            department: 'Tech Support',
            service: 'Portal',
            contact: 'KOKA SOFTWARE (koka soft )',
            status: 'Closed',
            priority: 'Medium',
            assignee: 'Harish D.',
            lastReply: 'No Reply Yet',
            created: '04-07-2026 12:40:07'
        },
        {
            id: 2,
            no: 67,
            subject: 'Fire Installation',
            dotColor: '#2563eb',
            tags: 'Production',
            department: 'Production',
            service: 'Site Setup',
            contact: 'Jeevajothi SOFTWARE (Abode)',
            status: 'In Progress',
            priority: 'Medium',
            assignee: 'Karthik R.',
            lastReply: 'No Reply Yet',
            created: '03-07-2026 11:23:18'
        },
        {
            id: 3,
            no: 66,
            subject: 'laptop not working',
            dotColor: '#db2777',
            tags: 'Hardware',
            department: 'Hardware Support',
            service: 'SN-LPT-4410',
            contact: 'Sundar',
            status: 'Closed',
            priority: 'Medium',
            assignee: 'Divya A.',
            lastReply: 'No Reply Yet',
            created: '20-06-2026 17:35:44'
        },
        {
            id: 4,
            no: 65,
            subject: 'machine issue',
            dotColor: '#db2777',
            tags: 'Hardware',
            department: 'Hardware Support',
            service: 'SN-MCH-109',
            contact: 'Mahesh A (Raja Enterprises)',
            status: 'Closed',
            priority: 'Medium',
            assignee: 'Karthik R.',
            lastReply: 'No Reply Yet',
            created: '05-06-2026 11:40:05'
        },
        {
            id: 5,
            no: 64,
            subject: 'Reg - System Issue',
            dotColor: '#eab308',
            tags: 'System',
            department: 'Software Support',
            service: 'Cloud CRM',
            contact: 'Chaki',
            status: 'Closed',
            priority: 'Medium',
            assignee: 'Harish D.',
            lastReply: 'No Reply Yet',
            created: '25-05-2026 17:13:27'
        }
    ];

    var stMasterTable = null;
    var activeTicketId = null;

    function esc(s) {
        return String(s == null ? '' : s)
            .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }

    function updateSummaryCounters() {
        var openCnt = 0, progCnt = 0, ansCnt = 0, holdCnt = 0, closedCnt = 0;
        ticketsData.forEach(function(t) {
            if (t.status === 'Open') openCnt++;
            else if (t.status === 'In Progress') progCnt++;
            else if (t.status === 'Answered') ansCnt++;
            else if (t.status === 'On Hold') holdCnt++;
            else if (t.status === 'Closed') closedCnt++;
        });
        document.getElementById('cntOpen').textContent = openCnt;
        document.getElementById('cntProgress').textContent = progCnt;
        document.getElementById('cntAnswered').textContent = ansCnt;
        document.getElementById('cntHold').textContent = holdCnt;
        document.getElementById('cntClosed').textContent = closedCnt;
    }

    document.addEventListener("DOMContentLoaded", function () {
        /* Prepend any newly raised tickets from support-create-ticket.php */
        try {
            var stored = JSON.parse(localStorage.getItem('gh_support_tickets') || '[]');
            if (Array.isArray(stored) && stored.length > 0) {
                ticketsData = stored.concat(ticketsData);
            }
        } catch (err) {}

        /* Apply saved status/followup overrides */
        try {
            var updates = JSON.parse(localStorage.getItem('gh_ticket_updates') || '{}');
            ticketsData.forEach(function(t) {
                if (updates[t.id]) {
                    t.status = updates[t.id].status || t.status;
                    t.lastReply = updates[t.id].lastReply || t.lastReply;
                    t.followups = updates[t.id].followups || t.followups;
                }
            });
        } catch (err) {}

        updateSummaryCounters();

        if (window.jQuery && jQuery.fn.select2) {
            jQuery('.select2').select2({
                width: '100%'
            });
        }

        if (typeof MasterTable !== 'undefined') {
            stMasterTable = MasterTable.init({
                tableId: 'stTable',
                tbodyId: 'stTbody',
                idPrefix: 'st',
                data: ticketsData,
                tableName: 'Support_Tickets',
                primaryKey: 'id',
                searchFields: ['subject', 'contact', 'department', 'service', 'status', 'priority', 'no', 'tags'],
                columns: [
                    {
                        field: null,
                        title: '<input type="checkbox" id="stSelectAllCheckbox" class="form-check-input" onclick="toggleStSelectAllRows(this)">',
                        sortable: false,
                        render: function(v, row) {
                            return '<input type="checkbox" class="form-check-input st-row-checkbox" data-id="' + row.id + '">';
                        }
                    },
                    {
                        field: 'subject',
                        title: 'SUBJECT & SLA',
                        sortable: true,
                        render: function(v, row) {
                            var dot = row.dotColor || '#db2777';
                            var isHw = (row.department === 'Hardware Support');
                            var divBadge = isHw
                                ? '<span class="badge bg-warning-subtle text-dark border border-warning-subtle me-1">HW</span>'
                                : '<span class="badge bg-success-subtle text-success border border-success-subtle me-1">SW</span>';
                            return '<div class="d-flex align-items-center gap-2">' +
                                   '<span style="width:9px;height:9px;border-radius:50%;background-color:' + dot + ';display:inline-block;flex-shrink:0;"></span>' +
                                   divBadge +
                                   '<a href="javascript:void(0)" onclick="openTicketFollowup(' + row.id + ')" class="fw-bold text-primary text-decoration-none" style="font-size:13px;">#' + esc(row.no) + ' &middot; ' + esc(v) + '</a>' +
                                   '</div>';
                        }
                    },
                    {
                        field: 'tags',
                        title: 'TAGS',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="badge bg-light text-secondary border">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'department',
                        title: 'DEPARTMENT',
                        sortable: true,
                        render: function(v) {
                            return '<span class="fw-semibold text-dark" style="font-size:13px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'service',
                        title: 'SERVICE / SERIAL',
                        sortable: true,
                        render: function(v, row) {
                            var val = v || row.serialOrEnv || '';
                            return val ? '<span class="badge bg-light text-dark border font-monospace">' + esc(val) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'contact',
                        title: 'CLIENT / CONTACT',
                        sortable: true,
                        render: function(v) {
                            return '<span class="fw-semibold text-secondary" style="font-size:13px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'status',
                        title: 'STATUS',
                        sortable: true,
                        render: function(v) {
                            var cls = 'st-pill-open';
                            if (v === 'Closed') cls = 'st-pill-closed';
                            if (v === 'In Progress') cls = 'st-pill-progress';
                            if (v === 'Answered') cls = 'st-pill-answered';
                            if (v === 'On Hold') cls = 'st-pill-hold';
                            return '<span class="st-pill ' + cls + '">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'priority',
                        title: 'PRIORITY',
                        sortable: true,
                        render: function(v) {
                            var pCls = (v === 'Urgent' || v === 'High') ? 'text-danger fw-bold' : 'text-secondary fw-semibold';
                            return '<span class="' + pCls + '" style="font-size:13px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'lastReply',
                        title: 'LAST REPLY',
                        sortable: true,
                        render: function(v) {
                            return '<span class="text-muted" style="font-size:12.5px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'created',
                        title: 'CREATED',
                        sortable: true,
                        render: function(v) {
                            return '<span class="text-muted" style="font-size:12.5px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: null,
                        title: 'FOLLOW-UP & ACTIONS',
                        sortable: false,
                        render: function(v, row) {
                            var isHw = (row.department === 'Hardware Support');
                            var scheduleBtn = isHw
                                ? '<a href="appointments.php?from_ticket=' + encodeURIComponent(row.no) + '&type=HW&subject=' + encodeURIComponent('Site Visit: ' + row.subject) + '&client=' + encodeURIComponent(row.contact) + '" class="btn btn-sm btn-outline-warning text-dark py-0 px-2" title="Schedule Field Engineer Visit"><i class="bi bi-calendar2-check"></i> Visit</a>'
                                : '<a href="appointments.php?from_ticket=' + encodeURIComponent(row.no) + '&type=SW&subject=' + encodeURIComponent('Debug Call: ' + row.subject) + '&client=' + encodeURIComponent(row.contact) + '" class="btn btn-sm btn-outline-success py-0 px-2" title="Schedule Online Debug Call"><i class="bi bi-camera-video"></i> Call</a>';
                            return '<div class="d-flex align-items-center justify-content-center gap-1">' +
                                   '<button type="button" class="btn btn-sm btn-primary py-0 px-2 fw-semibold" onclick="openTicketFollowup(' + row.id + ')"><i class="bi bi-chat-dots me-1"></i>Follow-Up</button>' +
                                   scheduleBtn +
                                   '</div>';
                        }
                    }
                ]
            });
        }

        /* Filter by Department listener */
        jQuery('#stDepartment').on('change', function() {
            var dept = jQuery(this).val();
            if (!stMasterTable) return;
            if (!dept) {
                stMasterTable.setData(ticketsData);
            } else {
                var filtered = ticketsData.filter(function(t) {
                    return t.department === dept;
                });
                stMasterTable.setData(filtered);
            }
        });
    });

    function quickFilterDivision(dept) {
        if (window.jQuery) {
            jQuery('#stDepartment').val(dept).trigger('change');
        }
    }

    function openTicketFollowup(ticketId) {
        var ticket = ticketsData.find(function(t) { return String(t.id) === String(ticketId); });
        if (!ticket) return;
        activeTicketId = ticket.id;

        document.getElementById('mdlTkNo').textContent = '#' + ticket.no;
        document.getElementById('mdlTkDept').textContent = ticket.department;
        document.getElementById('mdlTkSubject').textContent = ticket.subject;
        document.getElementById('mdlTkContact').textContent = ticket.contact;
        document.getElementById('mdlTkService').textContent = ticket.service || ticket.serialOrEnv || 'Standard SLA';
        document.getElementById('mdlTkPriority').textContent = ticket.priority;
        document.getElementById('mdlTkAssignee').textContent = ticket.assignee || 'Support Team';
        document.getElementById('mdlNewStatus').value = ticket.status;
        document.getElementById('mdlReplyNote').value = '';

        var statusBadge = document.getElementById('mdlTkStatusBadge');
        statusBadge.textContent = ticket.status;
        statusBadge.className = 'st-pill ' + (
            ticket.status === 'Closed' ? 'st-pill-closed' :
            ticket.status === 'In Progress' ? 'st-pill-progress' :
            ticket.status === 'Answered' ? 'st-pill-answered' :
            ticket.status === 'On Hold' ? 'st-pill-hold' : 'st-pill-open'
        );

        var isHw = (ticket.department === 'Hardware Support');
        var actionsWrap = document.getElementById('mdlActionButtons');
        if (isHw) {
            actionsWrap.innerHTML =
                '<a href="appointments.php?from_ticket=' + encodeURIComponent(ticket.no) + '&type=HW&subject=' + encodeURIComponent('On-Site RMA Visit: ' + ticket.subject) + '&client=' + encodeURIComponent(ticket.contact) + '" class="btn btn-sm btn-warning text-dark fw-semibold"><i class="bi bi-geo-alt-fill me-1"></i>Schedule Engineer Site Visit</a>' +
                '<a href="purchase-order-create.php" class="btn btn-sm btn-outline-primary fw-semibold"><i class="bi bi-cart-plus me-1"></i>Order Replacement Part (PO)</a>' +
                '<a href="task-create.php" class="btn btn-sm btn-outline-secondary fw-semibold"><i class="bi bi-check2-square me-1"></i>Assign Field Task</a>';
        } else {
            actionsWrap.innerHTML =
                '<a href="task-create.php" class="btn btn-sm btn-success fw-semibold"><i class="bi bi-bug-fill me-1"></i>Assign Developer Bug-Fix Task</a>' +
                '<a href="appointments.php?from_ticket=' + encodeURIComponent(ticket.no) + '&type=SW&subject=' + encodeURIComponent('Screen-Share Debug Call: ' + ticket.subject) + '&client=' + encodeURIComponent(ticket.contact) + '" class="btn btn-sm btn-outline-primary fw-semibold"><i class="bi bi-camera-video-fill me-1"></i>Schedule Online Debug Meeting</a>' +
                '<a href="mom.php" class="btn btn-sm btn-outline-secondary fw-semibold"><i class="bi bi-journal-text me-1"></i>Log Post-Mortem MOM</a>';
        }

        renderFollowupTimeline(ticket);
        var modalEl = document.getElementById('ticketFollowupModal');
        var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.show();
    }

    function renderFollowupTimeline(ticket) {
        var timeline = document.getElementById('mdlFollowupTimeline');
        var list = ticket.followups || [
            {
                time: ticket.created,
                author: ticket.contact,
                role: 'Ticket Created',
                note: 'Support ticket logged for ' + ticket.subject,
                status: ticket.status
            }
        ];
        timeline.innerHTML = list.map(function(item) {
            return '<div class="p-3 rounded-3 border bg-white shadow-sm">' +
                   '<div class="d-flex align-items-center justify-content-between mb-1">' +
                   '<span class="fw-bold text-dark small"><i class="bi bi-person-circle text-primary me-1"></i>' + esc(item.author) + ' <span class="badge bg-light text-secondary border ms-1">' + esc(item.role) + '</span></span>' +
                   '<span class="text-muted small font-monospace">' + esc(item.time) + '</span>' +
                   '</div>' +
                   '<div class="text-secondary small">' + esc(item.note) + '</div>' +
                   '</div>';
        }).join('');
    }

    function saveTicketFollowup() {
        var ticket = ticketsData.find(function(t) { return String(t.id) === String(activeTicketId); });
        if (!ticket) return;

        var newStatus = document.getElementById('mdlNewStatus').value;
        var author = document.getElementById('mdlReplyAuthor').value;
        var note = document.getElementById('mdlReplyNote').value.trim() || ('Status updated to ' + newStatus);

        var now = new Date();
        var pad = function(n) { return n < 10 ? '0' + n : n; };
        var timeStr = pad(now.getDate()) + '-' + pad(now.getMonth() + 1) + '-' + now.getFullYear() + ' ' +
                      pad(now.getHours()) + ':' + pad(now.getMinutes()) + ':' + pad(now.getSeconds());

        if (!ticket.followups) {
            ticket.followups = [{
                time: ticket.created,
                author: ticket.contact,
                role: 'Ticket Created',
                note: 'Initial ticket logged: ' + ticket.subject,
                status: 'Open'
            }];
        }

        ticket.followups.push({
            time: timeStr,
            author: author,
            role: 'Status -> ' + newStatus,
            note: note,
            status: newStatus
        });

        ticket.status = newStatus;
        ticket.lastReply = 'Just now (' + author.split(' ')[0] + ')';

        /* Persist follow-up in localStorage */
        try {
            var updates = JSON.parse(localStorage.getItem('gh_ticket_updates') || '{}');
            updates[ticket.id] = {
                status: ticket.status,
                lastReply: ticket.lastReply,
                followups: ticket.followups
            };
            localStorage.setItem('gh_ticket_updates', JSON.stringify(updates));
        } catch (err) {}

        updateSummaryCounters();
        if (stMasterTable) {
            stMasterTable.setData(ticketsData);
        }

        renderFollowupTimeline(ticket);
        document.getElementById('mdlReplyNote').value = '';
        var statusBadge = document.getElementById('mdlTkStatusBadge');
        statusBadge.textContent = ticket.status;
    }

    function toggleStSelectAllRows(masterCheckbox) {
        var isChecked = masterCheckbox.checked;
        var checkboxes = document.querySelectorAll('.st-row-checkbox');
        checkboxes.forEach(function(cb) {
            cb.checked = isChecked;
        });
    }

    function filterTicketsByStatus(statusName) {
        if (!stMasterTable) return;
        var filtered = ticketsData.filter(function(t) {
            return t.status === statusName;
        });
        stMasterTable.setData(filtered);
    }
</script>

<?php include 'footer.php'; ?>
