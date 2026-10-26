/**
 * Gharuda CRM - Appointment Schedule Page Script
 * File: assets/js/pages/appointment-schedule.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
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
