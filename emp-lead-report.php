<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">

<div class="card-custom p-0" id="empLeadReportWrap">

    <!-- Card Head -->
    <div class="card-head d-flex align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <h3 class="card-title mb-0">Employee Lead Report :</h3>
        <div class="report-date">
            Date : <span id="dateFrom">--</span> to <span id="dateTo">--</span>
        </div>
    </div>

    <!-- Filter -->
    <div class="p-3 border-light-subtle border-bottom">
        <form id="filterForm" onsubmit="return false;">
            <div class="row g-3 align-items-end">
                <div class="col-lg-4 col-md-12">
                    <label class="form-label" for="filter_search">Name / Mobile / Employee Id</label>
                    <input type="text" class="form-control" id="filter_search" placeholder="Enter Name / Mobile / Employee Id" autocomplete="off">
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <label class="form-label" for="filter_from">From Date</label>
                    <input type="date" class="form-control" id="filter_from">
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <label class="form-label" for="filter_to">To Date</label>
                    <input type="date" class="form-control" id="filter_to">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-primary" id="btnSearch">Search</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Table (toolbar auto-created by master-table.js) -->
    <div class="p-3">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100" id="empLeadReportTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Customer</th>
                        <th>Lead</th>
                        <th>Quotation</th>
                        <th>Waiting for Response</th>
                        <th>Followup</th>
                        <th>Qualified</th>
                        <th>DIRECT</th>
                        <th>New Enquiry</th>
                        <th>New</th>
                    </tr>
                </thead>
                <tbody id="empLeadTbody">
                    <!-- Rows injected by emp-lead-report.js -->
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    (function() {
        'use strict';

        // ---------- Dummy data ----------
        var employees = [{
                empId: 'ghrA0011',
                mobile: '9876543210',
                name: 'GHRAUDASOFTWARE',
                customer: 17,
                lead: 87,
                quotation: 5,
                waiting: 0,
                followup: 4,
                qualified: 0,
                direct: 1,
                newEnquiry: 1,
                newLead: 2
            },
            {
                empId: 'ghrA0012',
                mobile: '9876500001',
                name: 'ASHISH',
                customer: 0,
                lead: 0,
                quotation: 0,
                waiting: 0,
                followup: 0,
                qualified: 0,
                direct: 0,
                newEnquiry: 0,
                newLead: 0
            },
            {
                empId: '1234',
                mobile: '9876500002',
                name: 'thilak ma',
                customer: 0,
                lead: 0,
                quotation: 0,
                waiting: 0,
                followup: 0,
                qualified: 0,
                direct: 0,
                newEnquiry: 0,
                newLead: 0
            },
            {
                empId: 'ghrA0014',
                mobile: '9876500003',
                name: 'KISHORE R',
                customer: 0,
                lead: 0,
                quotation: 0,
                waiting: 0,
                followup: 0,
                qualified: 0,
                direct: 0,
                newEnquiry: 0,
                newLead: 0
            },
            {
                empId: 'ghrA0015',
                mobile: '9876500004',
                name: 'Rokith R',
                customer: 0,
                lead: 2,
                quotation: 0,
                waiting: 0,
                followup: 0,
                qualified: 0,
                direct: 0,
                newEnquiry: 0,
                newLead: 0
            },
            {
                empId: 'ghrA0016',
                mobile: '9876500005',
                name: 'Prabhu S',
                customer: 0,
                lead: 0,
                quotation: 0,
                waiting: 0,
                followup: 0,
                qualified: 0,
                direct: 0,
                newEnquiry: 0,
                newLead: 0
            }
        ];

        // ---------- Helpers ----------
        function pad(n) {
            return ('0' + n).slice(-2);
        }

        function toISO(d) {
            return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate());
        }

        function fmt(iso) { // yyyy-mm-dd -> dd-mm-yyyy
            if (!iso) return '--';
            var p = iso.split('-');
            return p[2] + '-' + p[1] + '-' + p[0];
        }

        function esc(s) {
            return String(s).replace(/[&<>"']/g, function(c) {
                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#39;'
                } [c];
            });
        }

        // ---------- Render ----------
        function renderTable(list) {
            var tbody = document.getElementById('empLeadTbody');
            if (!list.length) {
                tbody.innerHTML = '<tr><td colspan="11" class="text-center text-muted py-3">No records found</td></tr>';
                return;
            }
            var html = '';
            list.forEach(function(e, i) {
                html += '<tr>' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td>' + esc(e.name) + '</td>' +
                    '<td>' + e.customer + '</td>' +
                    '<td>' + e.lead + '</td>' +
                    '<td>' + e.quotation + '</td>' +
                    '<td>' + e.waiting + '</td>' +
                    '<td>' + e.followup + '</td>' +
                    '<td>' + e.qualified + '</td>' +
                    '<td>' + e.direct + '</td>' +
                    '<td>' + e.newEnquiry + '</td>' +
                    '<td>' + e.newLead + '</td>' +
                    '</tr>';
            });
            tbody.innerHTML = html;
        }

        function updateDateLabel() {
            document.getElementById('dateFrom').textContent = fmt(document.getElementById('filter_from').value);
            document.getElementById('dateTo').textContent = fmt(document.getElementById('filter_to').value);
        }

        function search() {
            var q = document.getElementById('filter_search').value.trim().toLowerCase();
            var list = employees.filter(function(e) {
                return !q ||
                    e.name.toLowerCase().indexOf(q) > -1 ||
                    e.mobile.indexOf(q) > -1 ||
                    e.empId.toLowerCase().indexOf(q) > -1;
            });
            updateDateLabel();
            renderTable(list);
        }

        // ---------- Init ----------
        document.addEventListener('DOMContentLoaded', function() {
            var now = new Date();
            document.getElementById('filter_from').value = toISO(new Date(now.getFullYear(), now.getMonth(), 1));
            document.getElementById('filter_to').value = toISO(new Date(now.getFullYear(), now.getMonth() + 1, 0));

            search();

            document.getElementById('btnSearch').addEventListener('click', search);
            document.getElementById('filter_search').addEventListener('keydown', function(e) {
                if (e.key === 'Enter') search();
            });
        });
    })();
</script>

<?php include 'footer.php'; ?>