<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">
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
                <h3 class="fw-bold m-0 text-dark">Support Tickets</h3>
                <span class="text-muted small">Manage customer support tickets, status breakdown, and response logs</span>
            </div>
        </div>
        <a href="support-create-ticket.php" class="st-new-btn">
            <i class="bi bi-plus-lg"></i> New Ticket
        </a>
    </div>

    <!-- Filter Card -->
    <div class="st-filter-card">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-4">
                <label class="form-label fw-bold text-secondary small mb-1" for="stDepartment">Department</label>
                <select class="form-select select2" id="stDepartment">
                    <option value="">All Departments</option>
                    <option value="Tech Support">Tech Support</option>
                    <option value="Production">Production</option>
                    <option value="Sales">Sales</option>
                    <option value="HR">HR</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Tickets Summary Counter Bar -->
    <div class="st-summary-card">
        <div class="st-summary-title">
            <i class="bi bi-clipboard-data-fill text-primary"></i> Tickets Summary
        </div>
        <div class="st-counter-list">
            <div class="st-counter-item" onclick="filterTicketsByStatus('Open')">
                <span class="st-cnt-num st-cnt-open" id="cntOpen">43</span>
                <span>Open</span>
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
            <div class="st-counter-divider"></div>
            <div class="st-counter-item" onclick="filterTicketsByStatus('In Progress')">
                <span class="st-cnt-num st-cnt-progress" id="cntProgress">4</span>
                <span>In Progress</span>
            </div>
            <div class="st-counter-divider"></div>
            <div class="st-counter-item" onclick="filterTicketsByStatus('Answered')">
                <span class="st-cnt-num st-cnt-answered" id="cntAnswered">2</span>
                <span>Answered</span>
            </div>
        </div>
    </div>

    <!-- Table Container matching projectwise-daily-task-report.php -->
    <div class="card-custom mb-4">
        <div class="table-responsive">
            <table class="table-modern master-table column-border" id="stTable">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center;">#</th>
                        <th style="width: 40px; text-align: center;"><input type="checkbox" id="stSelectAllCheckbox" class="form-check-input" onclick="toggleStSelectAllRows(this)"></th>
                        <th class="text-nowrap" style="min-width: 220px;">SUBJECT</th>
                        <th class="text-nowrap" style="width: 110px;">TAGS</th>
                        <th class="text-nowrap" style="width: 140px;">DEPARTMENT</th>
                        <th class="text-nowrap" style="width: 110px;">SERVICE</th>
                        <th class="text-nowrap" style="min-width: 200px;">CONTACT</th>
                        <th class="text-nowrap" style="width: 130px;">STATUS</th>
                        <th class="text-nowrap" style="width: 110px;">PRIORITY</th>
                        <th class="text-nowrap" style="width: 160px;">LAST REPLY</th>
                        <th class="text-nowrap" style="width: 170px;">CREATED</th>
                    </tr>
                </thead>
                <tbody id="stTbody"></tbody>
            </table>
        </div>
    </div>
</main>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/select2.js"></script>
<script src="./assets/js/master-table.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (window.jQuery && jQuery.fn.select2) {
            jQuery('.select2').select2({
                width: '100%'
            });
        }

        /* Sample Ticket Data matching user mockup image */
        var ticketsData = [
            {
                id: 1,
                no: 68,
                subject: 'general issue',
                dotColor: '#db2777',
                tags: 'Tech',
                department: 'Tech Support',
                service: '',
                contact: 'KOKA SOFTWARE (koka soft )',
                status: 'Closed',
                priority: 'Medium',
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
                service: '',
                contact: 'Jeevajothi SOFTWARE (Abode)',
                status: 'In Progress',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '03-07-2026 11:23:18'
            },
            {
                id: 3,
                no: 66,
                subject: 'laptop not working',
                dotColor: '#db2777',
                tags: 'Hardware',
                department: 'Sales',
                service: '',
                contact: 'Sundar',
                status: 'Closed',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '20-06-2026 17:35:44'
            },
            {
                id: 4,
                no: 65,
                subject: 'machine issue',
                dotColor: '#db2777',
                tags: 'Tech',
                department: 'Tech Support',
                service: '',
                contact: 'Mahesh A (Raja Enterprises)',
                status: 'Closed',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '05-06-2026 11:40:05'
            },
            {
                id: 5,
                no: 64,
                subject: 'Reg - System Issue',
                dotColor: '#eab308',
                tags: 'System',
                department: 'Tech Support',
                service: '',
                contact: 'Chaki',
                status: 'Closed',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '25-05-2026 17:13:27'
            },
            {
                id: 6,
                no: 63,
                subject: 'assess',
                dotColor: '#9333ea',
                tags: 'HR',
                department: 'HR',
                service: 'test',
                contact: 'Heena B (Subra )',
                status: 'Closed',
                priority: 'Low',
                lastReply: '25-05-2026 13:29:03',
                created: '25-05-2026 13:22:12'
            },
            {
                id: 7,
                no: 62,
                subject: 'Solar Issue',
                dotColor: '#db2777',
                tags: 'Solar',
                department: 'Sales',
                service: '',
                contact: 'Sundar Arumugam (Sundar Arumugam)',
                status: 'Closed',
                priority: 'Medium',
                lastReply: '05-05-2026 13:58:46',
                created: '05-05-2026 11:55:18'
            },
            {
                id: 8,
                no: 61,
                subject: 'speaker not working',
                dotColor: '#db2777',
                tags: 'Audio',
                department: 'HR',
                service: 'sundar',
                contact: 'sundar',
                status: 'Open',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '14-04-2026 14:40:21'
            },
            {
                id: 9,
                no: 60,
                subject: 'System Issue',
                dotColor: '#db2777',
                tags: 'System',
                department: 'Tech Support',
                service: 'test',
                contact: 'Selvam Chokkanathan (Subra)',
                status: 'Open',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '27-03-2026 11:50:20'
            },
            {
                id: 10,
                no: 59,
                subject: 'loan request',
                dotColor: '#db2777',
                tags: 'Finance',
                department: 'HR',
                service: '',
                contact: 'Aarthi',
                status: 'Open',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '06-01-2026 16:30:10'
            }
        ];

        function esc(s) {
            return String(s == null ? '' : s)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        var stMasterTable = null;

        if (typeof MasterTable !== 'undefined') {
            stMasterTable = MasterTable.init({
                tableId: 'stTable',
                tbodyId: 'stTbody',
                idPrefix: 'st',
                data: ticketsData,
                tableName: 'Support_Tickets',
                primaryKey: 'id',
                searchFields: ['subject', 'contact', 'department', 'service', 'status', 'priority', 'no'],
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
                        title: 'SUBJECT',
                        sortable: true,
                        render: function(v, row) {
                            var dot = row.dotColor || '#db2777';
                            return '<div class="d-flex align-items-center gap-2">' +
                                   '<span style="width:9px;height:9px;border-radius:50%;background-color:' + dot + ';display:inline-block;flex-shrink:0;"></span>' +
                                   '<a href="#" class="fw-bold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' +
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
                        title: 'SERVICE',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'contact',
                        title: 'CONTACT',
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
                            return '<span class="fw-semibold text-secondary" style="font-size:13px;">' + esc(v) + '</span>';
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
