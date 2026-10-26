<?php include 'header.php'; ?>

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

<script src="./assets/js/pages/emp-lead-report.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>