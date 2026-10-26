<?php include 'header.php'; ?>

<div class="container-fluid px-0">

    <!-- Title row -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width:42px;height:42px;font-size:20px;">
                <i class="bi bi-bar-chart-line"></i>
            </div>
            <div>
                <h4 class="fw-bold text-dark mb-0">Summary Report</h4>
                <span class="text-muted small">Appointment metrics and trend distribution across staff and status</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="appointments.php" class="btn btn-sm btn-outline-success"><i class="bi bi-calendar2-week me-1"></i>Appointments</a>
            <a href="callbacks.php" class="btn btn-sm btn-outline-primary"><i class="bi bi-telephone-forward me-1"></i>Callbacks</a>
            <a href="past-meeting.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-calendar-check me-1"></i>Past Meeting</a>
        </div>
    </div>

    <!-- Filter strip -->
    <div class="card border-0 shadow-sm rounded-3 mb-3">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-funnel-fill text-primary me-2"></i>Filters</h6>
            <button type="button" class="btn btn-sm btn-outline-secondary" id="sr5ResetBtn">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
            </button>
        </div>
        <div class="card-body p-3">
            <div class="row g-3">
                <div class="col-md-4 col-lg-2 sr5-fld">
                    <label class="form-label fw-semibold small text-secondary" for="sr5AttendedBy">Attended By</label>
                    <select class="form-select select2" id="sr5AttendedBy">
                        <option value="">All Staff</option>
                        <option value="GHARUDA SOFTWARE">GHARUDA SOFTWARE</option>
                        <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                        <option value="Harish D.">Harish D.</option>
                        <option value="Divya A.">Divya A.</option>
                        <option value="Priya S.">Priya S.</option>
                    </select>
                </div>
                <div class="col-md-4 col-lg-2 sr5-fld">
                    <label class="form-label fw-semibold small text-secondary" for="sr5InitiatedBy">Initiated By</label>
                    <select class="form-select select2" id="sr5InitiatedBy">
                        <option value="">All Staff</option>
                        <option value="GHARUDA SOFTWARE">GHARUDA SOFTWARE</option>
                        <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                        <option value="Harish D.">Harish D.</option>
                        <option value="Divya A.">Divya A.</option>
                        <option value="Priya S.">Priya S.</option>
                    </select>
                </div>
                <div class="col-md-4 col-lg-2 sr5-fld">
                    <label class="form-label fw-semibold small text-secondary" for="sr5Period">Period</label>
                    <select class="form-select select2" id="sr5Period">
                        <option value="date" selected>Period By Date</option>
                        <option value="week">Period By Week</option>
                        <option value="month">Period By Month</option>
                        <option value="year">Period By Year</option>
                    </select>
                </div>
                <div class="col-md-4 col-lg-2 sr5-fld">
                    <label class="form-label fw-semibold small text-secondary" for="sr5Status">Status</label>
                    <select class="form-select select2" id="sr5Status">
                        <option value="">All Statuses</option>
                        <option value="Finished" data-color="#16a34a">Finished</option>
                        <option value="Pending" data-color="#f59e0b">Pending</option>
                        <option value="Cancelled" data-color="#ef4444">Cancelled</option>
                        <option value="Missed" data-color="#64748b">Missed</option>
                    </select>
                </div>
                <div class="col-md-4 col-lg-2 sr5-fld">
                    <label class="form-label fw-semibold small text-secondary" for="sr5Month">Month</label>
                    <select class="form-select select2" id="sr5Month">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10" selected>October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col-md-4 col-lg-2 sr5-fld">
                    <label class="form-label fw-semibold small text-secondary" for="sr5Year">Year</label>
                    <select class="form-select select2" id="sr5Year">
                        <option value="2026" selected>2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- KPI cards -->
    <div class="row g-3 mb-3">
        <div class="col-sm-6 col-lg">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-secondary small fw-semibold">Total</span>
                    <span class="badge bg-primary-subtle text-primary p-2"><i class="bi bi-calendar2-check fs-6"></i></span>
                </div>
                <div class="fs-3 fw-bold text-dark mb-1" id="sr5KpiTotal">148</div>
                <div class="text-muted small" id="sr5KpiTotalSub">All statuses</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-secondary small fw-semibold">Finished</span>
                    <span class="badge bg-success-subtle text-success p-2"><i class="bi bi-check2-circle fs-6"></i></span>
                </div>
                <div class="fs-3 fw-bold text-success mb-1" id="sr5KpiFinished">82</div>
                <div class="progress mb-2" style="height:5px;">
                    <div class="progress-bar bg-success" id="sr5BarFinished" role="progressbar" style="width:55%;"></div>
                </div>
                <div class="text-muted small" id="sr5SubFinished">55% of total</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-secondary small fw-semibold">Pending</span>
                    <span class="badge bg-warning-subtle text-warning p-2"><i class="bi bi-hourglass-split fs-6"></i></span>
                </div>
                <div class="fs-3 fw-bold text-warning mb-1" id="sr5KpiPending">34</div>
                <div class="progress mb-2" style="height:5px;">
                    <div class="progress-bar bg-warning" id="sr5BarPending" role="progressbar" style="width:23%;"></div>
                </div>
                <div class="text-muted small" id="sr5SubPending">23% of total</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-secondary small fw-semibold">Cancelled</span>
                    <span class="badge bg-danger-subtle text-danger p-2"><i class="bi bi-x-circle fs-6"></i></span>
                </div>
                <div class="fs-3 fw-bold text-danger mb-1" id="sr5KpiCancelled">18</div>
                <div class="progress mb-2" style="height:5px;">
                    <div class="progress-bar bg-danger" id="sr5BarCancelled" role="progressbar" style="width:12%;"></div>
                </div>
                <div class="text-muted small" id="sr5SubCancelled">12% of total</div>
            </div>
        </div>
        <div class="col-sm-6 col-lg">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-secondary small fw-semibold">Missed</span>
                    <span class="badge bg-secondary-subtle text-secondary p-2"><i class="bi bi-exclamation-circle fs-6"></i></span>
                </div>
                <div class="fs-3 fw-bold text-secondary mb-1" id="sr5KpiMissed">14</div>
                <div class="progress mb-2" style="height:5px;">
                    <div class="progress-bar bg-secondary" id="sr5BarMissed" role="progressbar" style="width:10%;"></div>
                </div>
                <div class="text-muted small" id="sr5SubMissed">10% of total</div>
            </div>
        </div>
    </div>

    <!-- Chart card -->
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h6 class="fw-bold mb-0 text-dark" id="sr5ChartTitle">Appointments by Date</h6>
                <span class="text-muted small" id="sr5ChartSub">October 2026 · all staff</span>
            </div>
            <div class="d-flex align-items-center gap-3 flex-wrap small">
                <span class="d-inline-flex align-items-center gap-1"><span class="badge rounded-circle bg-success p-1" style="width:8px;height:8px;"></span>Finished <strong id="sr5LgFinished">82</strong></span>
                <span class="d-inline-flex align-items-center gap-1"><span class="badge rounded-circle bg-warning p-1" style="width:8px;height:8px;"></span>Pending <strong id="sr5LgPending">34</strong></span>
                <span class="d-inline-flex align-items-center gap-1"><span class="badge rounded-circle bg-danger p-1" style="width:8px;height:8px;"></span>Cancelled <strong id="sr5LgCancelled">18</strong></span>
                <span class="d-inline-flex align-items-center gap-1"><span class="badge rounded-circle bg-secondary p-1" style="width:8px;height:8px;"></span>Missed <strong id="sr5LgMissed">14</strong></span>
            </div>
        </div>

        <div class="card-body p-4 position-relative" style="min-height: 380px;">
            <canvas id="sr5Chart" style="max-height:360px;"></canvas>
            <div class="position-absolute top-50 start-50 translate-middle text-center text-muted d-none" id="sr5Empty">
                <i class="bi bi-bar-chart fs-1 mb-2 d-block"></i>
                <span>No appointments for the selected filters</span>
            </div>
        </div>
    </div>

</div>

<script src="./assets/js/pages/summary-report.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>