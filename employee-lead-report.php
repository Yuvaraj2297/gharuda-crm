<?php include 'header.php'; ?>


<style>
    .lead-report-page .lead-date-range {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-700);
        white-space: nowrap;
    }

    .lead-report-page .lead-date-range i {
        color: var(--primary);
    }

    .lead-report-page .table-modern thead th,
    .lead-report-page .table-modern tbody td {
        padding-left: 12px;
        padding-right: 12px;
        white-space: nowrap;
    }

    .lead-report-page .table-modern thead th:nth-child(1) {
        width: 60px;
    }

    .lead-report-page .person-name {
        font-weight: 700;
        color: var(--ink-900);
    }

    .lead-report-page .lead-count {
        font-weight: 800;
        color: var(--ink-900);
    }

    .lead-report-page .lead-count.zero {
        font-weight: 600;
        color: var(--ink-500);
    }
</style>

<main class="lead-report-page">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Employee Lead Report</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap overflow-auto breadcrumb-text">
                <i class="bi bi-bar-chart-line fs-6"></i><span>Reports</span><i class="bi bi-chevron-right"></i><span class="fw-bold text-dark">Employee Lead Report</span>
            </nav>
        </div>
        <div class="lead-date-range align-self-center">
            <i class="bi bi-calendar3 me-1"></i>Date: 01-10-2026 to 31-10-2026
        </div>
    </div>

    <!-- Filters -->
    <form method="get" class="card-custom mb-3 filters-card" autocomplete="off">
        <div class="row g-3 align-items-end">
            <div class="col-lg-4 col-md-12">
                <label class="form-label" for="leadSearch">Name / Mobile / Employee Id</label>
                <input class="form-control" id="leadSearch" name="search" placeholder="Enter Name / Mobile / Employee Id" value="">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="leadFrom">From Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="leadFrom" name="from" value="01-10-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="leadTo">To Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="leadTo" name="to" value="31-10-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="d-flex gap-2">
                    <a href="employee-lead-report.php" class="btn btn-reject flex-fill" id="leadClear">Clear</a>
                    <button type="submit" class="btn btn-primary flex-fill"><i class="bi bi-search me-1"></i>Search</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Table (toolbar: Columns, Export, Search, Show entries, Pagination are auto-created by the datatable class) -->
    <div class="card-custom p-0" id="employeeLeadTableWrap">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="employeeLeadTable" data-table-name="Employee Lead Report">
                <thead>
                    <tr>
                        <th style="width: 60px;">S.no</th>
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
                <tbody>
                    <tr class="lead-row" data-empid="EMP0001">
                        <td>1</td>
                        <td>
                            <div class="person-name">GHARUDA SOFTWARE</div>
                        </td>
                        <td><span class="lead-count">17</span></td>
                        <td><span class="lead-count">87</span></td>
                        <td><span class="lead-count">5</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count">4</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count">1</span></td>
                        <td><span class="lead-count">2</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0002">
                        <td>2</td>
                        <td>
                            <div class="person-name">ASHISH</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0003">
                        <td>3</td>
                        <td>
                            <div class="person-name">Thilak Ma</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0004">
                        <td>4</td>
                        <td>
                            <div class="person-name">KISHORE R</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0005">
                        <td>5</td>
                        <td>
                            <div class="person-name">Rokith R</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count">2</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0006">
                        <td>6</td>
                        <td>
                            <div class="person-name">Prabhu S</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

