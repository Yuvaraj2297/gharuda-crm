<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">

<style>
    /* ===== Page ===== */
    .as-page {
        padding: 18px 22px 28px;
        max-width: 1500px;
        margin: 0 auto;
    }

    /* ===== Title row ===== */
    .as-title-row {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 2px 2px 16px;
        flex-wrap: wrap;
    }

    .as-title-row h5 {
        font-size: 17px;
        font-weight: 800;
        color: #111827;
        margin: 0;
        letter-spacing: -.01em;
    }

    /* ===== Filter card (From / To + funnel) ===== */
    .as-filter-card {
        background: #fff;
        border: 1px solid #eef0f2;
        border-radius: 14px;
        box-shadow: 0 1px 2px rgba(17, 24, 39, .04);
        padding: 16px 18px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 18px;
        flex-wrap: wrap;
    }

    .as-filter-card .as-field {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .as-filter-card label {
        font-size: 12px;
        font-weight: 800;
        color: #374151;
        margin: 0;
    }

    .as-filter-card .form-control {
        font-size: 13px;
        border-radius: 10px;
        min-width: 190px;
        border-color: #e5e7eb;
    }

    .as-filter-card .form-control:focus {
        border-color: #86efac;
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .as-filter-btn {
        font-size: 13px;
        font-weight: 800;
        border-radius: 10px;
        padding: 9px 16px;
        background: linear-gradient(135deg, #16a34a, #15803d);
        border: none;
        box-shadow: 0 2px 6px rgba(22, 163, 74, .3);
        color: #fff;
        margin-left: auto;
    }

    .as-filter-btn:hover {
        background: linear-gradient(135deg, #15803d, #166534);
        color: #fff;
    }

    /* ===== Meetings table card ===== */
    .as-list-card {
        padding: 0;
        border: none;
        border-radius: 14px;
        box-shadow: 0 1px 2px rgba(17, 24, 39, .05), 0 4px 14px rgba(17, 24, 39, .04);
        overflow: hidden;
    }

    /* Status pill */
    .as-badge {
        display: inline-block;
        font-size: 10.5px;
        font-weight: 800;
        border-radius: 999px;
        padding: 4px 12px;
    }

    .as-badge.b-blue   { background: #dbeafe; color: #1d4ed8; }
    .as-badge.b-green  { background: #dcfce7; color: #15803d; }
    .as-badge.b-amber  { background: #fef3c7; color: #b45309; }
    .as-badge.b-red    { background: #fee2e2; color: #b91c1c; }
    .as-badge.b-grey   { background: #f3f4f6; color: #6b7280; }

    /* Customer/Lead chip */
    .as-cl-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 800;
        border-radius: 999px;
        padding: 4px 12px;
    }

    .as-cl-chip.customer { background: #ede9fe; color: #6d28d9; }
    .as-cl-chip.lead     { background: var(--primary-soft); color: var(--primary-dark); }

    /* Zoom meeting link */
    .as-zoom-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--primary);
        font-weight: 700;
        font-size: 12px;
        text-decoration: none;
        max-width: 230px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        vertical-align: middle;
    }

    .as-zoom-link:hover {
        text-decoration: underline;
        color: var(--primary-dark);
    }

    .as-zoom-link i {
        flex-shrink: 0;
    }
</style>

<div class="as-page">

    <!-- Title row -->
    <div class="as-title-row">
        <h5><i class="bi bi-calendar2-week me-2" style="color:#0ca308;"></i>Appointment Schedule</h5>
    </div>

    <!-- From / To filters -->
    <div class="as-filter-card">
        <div class="as-field">
            <label>From Date</label>
            <input type="date" class="form-control" id="asFromDate">
        </div>
        <div class="as-field">
            <label>To Date</label>
            <input type="date" class="form-control" id="asToDate">
        </div>
        <button type="button" class="btn as-filter-btn" id="asFilterBtn" title="Apply date filter">
            <i class="bi bi-funnel-fill me-1"></i>Filter
        </button>
    </div>

    <!-- Meetings table (toolbar auto-created by master-table.js) -->
    <div class="card-custom as-list-card">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0" id="meetingsTable">
                <thead>
                    <tr>
                        <th class="text-nowrap">S.No</th>
                        <th class="text-nowrap">Customer Name</th>
                        <th class="text-nowrap">Customer Email</th>
                        <th class="text-nowrap">Staff Name</th>
                        <th class="text-nowrap">Customer/Lead</th>
                        <th class="text-nowrap">Zoom Meeting</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Remark</th>
                    </tr>
                </thead>
                <tbody id="meetingsTbody">
                    <!-- Rows injected by master-table.js -->
                </tbody>
            </table>
        </div>
        <!-- Footer (showing + pagination auto-created by master-table.js) -->
    </div>

</div>

<script>
    (function () {
        'use strict';

        /* ---------------- Dummy data ---------------- */
        var meetings = [
            { id: 1, customerName: 'Ravi Shankar',  customerEmail: 'ravi.shankar@gmail.com',   staffName: 'GHRAUDA SOFTWARE', cl: 'Customer', zoom: 'https://zoom.us/j/98123456789',            status: 'Scheduled',   remark: 'Product demo for new enquiry' },
            { id: 2, customerName: 'Meena Ramesh',  customerEmail: 'meena.ramesh@yahoo.com',   staffName: 'Harish D.',        cl: 'Lead',     zoom: 'https://zoom.us/j/87291034567',            status: 'Scheduled',   remark: 'Quotation discussion — solar package' },
            { id: 3, customerName: 'Arun Kumar',    customerEmail: 'arun.kumar@outlook.com',   staffName: 'Divya A.',         cl: 'Lead',     zoom: 'https://zoom.us/j/76543210987',            status: 'Completed',   remark: 'Requirements collected, proposal pending' },
            { id: 4, customerName: 'Priya Sundar',  customerEmail: 'priya.sundar@gmail.com',   staffName: 'GHRAUDA SOFTWARE', cl: 'Customer', zoom: 'https://zoom.us/j/65098765432',            status: 'Cancelled',   remark: 'Customer not available, reschedule needed' },
            { id: 5, customerName: 'Suresh Babu',   customerEmail: 'suresh.babu@gmail.com',    staffName: 'Priya S.',         cl: 'Lead',     zoom: 'https://zoom.us/j/54321098765',            status: 'Scheduled',   remark: 'Follow-up meeting for pending payment' },
            { id: 6, customerName: 'Lakshmi Pharma',customerEmail: 'info@lakshmipharma.in',    staffName: 'Harish D.',        cl: 'Customer', zoom: 'https://zoom.us/j/43219876543',            status: 'Completed',   remark: 'Annual maintenance contract reviewed' },
            { id: 7, customerName: 'Karthik Raja',  customerEmail: 'karthik.raja@gmail.com',   staffName: 'Divya A.',         cl: 'Lead',     zoom: 'https://zoom.us/j/32109876543',            status: 'Missed',      remark: 'Staff on leave — meeting not held' },
            { id: 8, customerName: 'Vasanth Auto Works', customerEmail: 'vasanth.auto@gmail.com', staffName: 'Priya S.',      cl: 'Customer', zoom: 'https://zoom.us/j/21098765432',            status: 'Scheduled',   remark: 'Site discussion with engineer' },
            { id: 9, customerName: 'Kaveri Textiles', customerEmail: 'sales@kaveritex.in',     staffName: 'GHRAUDA SOFTWARE', cl: 'Lead',     zoom: '',                                         status: 'Scheduled',   remark: 'Zoom link to be shared' },
            { id: 10, customerName: 'Balaji Electricals', customerEmail: 'balaji.elec@gmail.com', staffName: 'Harish D.',     cl: 'Customer', zoom: 'https://zoom.us/j/10987654321',            status: 'Completed',   remark: 'Order confirmed for 5 inverters' },
            { id: 11, customerName: 'Sakthi Hardware', customerEmail: 'sakthi.hw@gmail.com',    staffName: 'Divya A.',         cl: 'Lead',     zoom: 'https://zoom.us/j/19876543210',            status: 'Cancelled',   remark: 'Budget concern — customer paused' },
            { id: 12, customerName: 'Ambal Foods',  customerEmail: 'contact@ambalfoods.in',    staffName: 'Priya S.',         cl: 'Customer', zoom: 'https://zoom.us/j/28765432109',            status: 'Missed',      remark: 'Network issue at customer side' }
        ];

        var statusColors = {
            'Scheduled': 'b-blue',
            'Completed': 'b-green',
            'Cancelled': 'b-red',
            'Missed':    'b-amber'
        };

        var meetingsTable = null;

        function initMeetingsTable() {
            if (typeof MasterTable === 'undefined') return;
            meetingsTable = MasterTable.init({
                tableId: 'meetingsTable',
                tbodyId: 'meetingsTbody',
                idPrefix: 'mtg',
                data: meetings,
                tableName: 'Meetings',
                primaryKey: 'id',
                searchFields: ['customerName', 'customerEmail', 'staffName', 'cl', 'status', 'remark'],
                columns: [
                    {
                        field: 'customerName', title: 'Customer Name', sortable: true,
                        render: function (v) {
                            return '<span style="font-weight:700;color:#111827;">' + v + '</span>';
                        }
                    },
                    {
                        field: 'customerEmail', title: 'Customer Email', sortable: true,
                        render: function (v) {
                            return '<a href="mailto:' + v + '" style="color:var(--primary);text-decoration:none;font-weight:600;">' + v + '</a>';
                        }
                    },
                    { field: 'staffName', title: 'Staff Name', sortable: true },
                    {
                        field: 'cl', title: 'Customer/Lead', sortable: true,
                        render: function (v) {
                            return '<span class="as-cl-chip ' + (v === 'Customer' ? 'customer' : 'lead') + '"><i class="bi ' + (v === 'Customer' ? 'bi-person-check' : 'bi-person-plus') + '"></i>' + v + '</span>';
                        }
                    },
                    {
                        field: 'zoom', title: 'Zoom Meeting', sortable: false,
                        render: function (v) {
                            if (!v) return '<span style="color:#adb5bd;font-weight:600;">—</span>';
                            return '<a class="as-zoom-link" href="' + v + '" target="_blank" title="' + v + '"><i class="bi bi-camera-video-fill"></i>' + v.replace('https://zoom.us/j/', 'zoom.us/j/') + '</a>';
                        }
                    },
                    {
                        field: 'status', title: 'Status', sortable: true,
                        render: function (v) {
                            /* Scheduled = primary green; others accent colours */
                            var cls = v === 'Scheduled' ? 'b-green' : (statusColors[v] || 'b-grey');
                            return '<span class="as-badge ' + cls + '">' + v + '</span>';
                        }
                    },
                    { field: 'remark', title: 'Remark', sortable: false, render: function (v) { return '<span title="' + v + '">' + v + '</span>'; } }
                ]
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            initMeetingsTable();

            /* From / To filter (demo) */
            var filterBtn = document.getElementById('asFilterBtn');
            if (filterBtn) {
                filterBtn.addEventListener('click', function () {
                    var f = document.getElementById('asFromDate');
                    var t = document.getElementById('asToDate');
                    filterBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Applying...';
                    setTimeout(function () {
                        filterBtn.innerHTML = '<i class="bi bi-funnel-fill me-1"></i>Filter';
                        if (f.value && t.value && f.value > t.value) {
                            alert('From Date cannot be after To Date.');
                            return;
                        }
                        alert('Meetings filtered for ' + (f.value || 'all dates') + ' → ' + (t.value || 'all dates') + '.');
                    }, 500);
                });
            }
        });
    })();
</script>

<?php include 'footer.php'; ?>
