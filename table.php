<?php
$currentPage = 'table.php';
include 'header.php';
?>

<!-- =========================================================================
     PURE BOOTSTRAP 5 DATA TABLE SHOWCASE
     Zero Custom CSS - 100% Native Bootstrap 5.3 Classes
     ========================================================================= -->

<div class="container-fluid px-0">

    <!-- Top Navigation Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 bg-white p-4 rounded-4 shadow-sm border-0">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-1 rounded-pill">UI Elements</span>
                <span class="badge bg-success-subtle text-success fw-semibold px-3 py-1 rounded-pill">Pure Bootstrap</span>
            </div>
            <h1 class="h3 fw-bold text-dark mb-1">Employee Attendance & Reports Table</h1>
            <p class="text-secondary small mb-0">Built strictly using native Bootstrap 5 table utilities, badges, flex layouts, and shadows.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="ui-library.php" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="bi bi-grid-fill me-1"></i> UI Library
            </a>
            <button type="button" class="btn btn-primary btn-sm rounded-pill px-3" onclick="window.print()">
                <i class="bi bi-printer me-1"></i> Print
            </button>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="card border-0 shadow-sm rounded-3 mb-4 bg-white">
        <!-- Card Header & Filter Toolbar -->
        <div class="card-header bg-white py-3 border-bottom">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        <i class="bi bi-calendar-check-fill fs-5"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Daily Attendance Log</h6>
                        <small class="text-secondary">4 August 2026 &middot; Shift A (General)</small>
                    </div>
                </div>

                <!-- Action Toolbar -->
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="input-group input-group-sm" style="max-width: 220px;">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" class="form-control border-start-0" id="tableSearch" placeholder="Search employee...">
                    </div>
                    <select class="form-select form-select-sm" style="width: auto;">
                        <option selected>All Statuses</option>
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                        <option value="leave">On Leave</option>
                    </select>
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn btn-outline-secondary"><i class="bi bi-file-earmark-arrow-down me-1"></i> Export</button>
                        <button type="button" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Mark Attendance</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-uppercase text-secondary small fw-bold">
                    <tr>
                        <th scope="col" style="width: 45px;" class="text-center">#</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th scope="col">Punch In</th>
                        <th scope="col">Break</th>
                        <th scope="col">Punch Out</th>
                        <th scope="col">Total Hours</th>
                        <th scope="col">Late Arrival</th>
                        <th scope="col">Overtime</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="pgBody">
                    <!-- Record 1 -->
                    <tr>
                        <td class="text-center text-secondary small">1</td>
                        <td>
                            <span class="badge bg-light text-dark border px-2 py-1 font-monospace">
                                <i class="bi bi-person-badge text-primary me-1"></i>EMP001
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-1.jpg" alt="Praveena" class="rounded-circle object-fit-cover shadow-xs" width="34" height="34">
                                <span class="fw-semibold text-dark">Praveena</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 fw-semibold">
                                <i class="bi bi-check-circle-fill me-1"></i> Present
                            </span>
                        </td>
                        <td class="text-secondary small">04-08-2026</td>
                        <td class="fw-medium text-dark small">10:10 AM</td>
                        <td class="text-secondary small">30 Mins</td>
                        <td class="fw-medium text-dark small">07:00 PM</td>
                        <td class="fw-semibold text-dark small">7 hrs</td>
                        <td class="text-danger small">10 Mins</td>
                        <td class="text-muted small">-</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Edit Record"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-title="Delete Record"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Record 2 -->
                    <tr>
                        <td class="text-center text-secondary small">2</td>
                        <td>
                            <span class="badge bg-light text-dark border px-2 py-1 font-monospace">
                                <i class="bi bi-person-badge text-primary me-1"></i>EMP002
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-2.jpg" alt="Keerthana" class="rounded-circle object-fit-cover" width="34" height="34">
                                <span class="fw-semibold text-dark">Keerthana</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-danger-subtle text-danger px-3 py-2 fw-semibold">
                                <i class="bi bi-x-circle-fill me-1"></i> Absent
                            </span>
                        </td>
                        <td class="text-secondary small">04-08-2026</td>
                        <td class="text-muted small">00:00</td>
                        <td class="text-muted small">00:00</td>
                        <td class="text-muted small">00:00</td>
                        <td>
                            <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis px-2 py-1 small">Leave</span>
                        </td>
                        <td class="text-muted small">-</td>
                        <td class="text-muted small">-</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Edit Record"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-title="Delete Record"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Record 3 -->
                    <tr>
                        <td class="text-center text-secondary small">3</td>
                        <td>
                            <span class="badge bg-light text-dark border px-2 py-1 font-monospace">
                                <i class="bi bi-person-badge text-primary me-1"></i>EMP003
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-3.jpg" alt="Mani" class="rounded-circle object-fit-cover" width="34" height="34">
                                <span class="fw-semibold text-dark">Mani Kandan</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 fw-semibold">
                                <i class="bi bi-check-circle-fill me-1"></i> Present
                            </span>
                        </td>
                        <td class="text-secondary small">04-08-2026</td>
                        <td class="fw-medium text-dark small">10:10 AM</td>
                        <td class="text-secondary small">30 Mins</td>
                        <td class="fw-medium text-dark small">07:00 PM</td>
                        <td class="fw-semibold text-dark small">7 hrs</td>
                        <td class="text-danger small">10 Mins</td>
                        <td class="text-muted small">-</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Edit Record"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-title="Delete Record"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Record 4 -->
                    <tr>
                        <td class="text-center text-secondary small">4</td>
                        <td>
                            <span class="badge bg-light text-dark border px-2 py-1 font-monospace">
                                <i class="bi bi-person-badge text-primary me-1"></i>EMP004
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="./assets/img/profile-4.jpg" alt="Dinesh" class="rounded-circle object-fit-cover" width="34" height="34">
                                <span class="fw-semibold text-dark">Dinesh Kumar</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 fw-semibold">
                                <i class="bi bi-check-circle-fill me-1"></i> Present
                            </span>
                        </td>
                        <td class="text-secondary small">04-08-2026</td>
                        <td class="fw-medium text-dark small">09:55 AM</td>
                        <td class="text-secondary small">45 Mins</td>
                        <td class="fw-medium text-dark small">07:15 PM</td>
                        <td class="fw-semibold text-dark small">8 hrs</td>
                        <td class="text-success small">On Time</td>
                        <td class="text-primary small fw-semibold">+1.5 hrs</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-title="Edit Record"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-title="Delete Record"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Table Footer Pagination -->
        <div class="card-footer bg-white py-3 border-top d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
            <span class="text-secondary small">Showing 1 to 4 of 24 entries</span>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- ===================================================================== -->
    <!-- FOOTER FREEZER & INNER SCROLL DEMONSTRATION                           -->
    <!-- ===================================================================== -->
    <div class="card border-0 rounded-3 mb-4 bg-white">
        <div class="card-header bg-white py-3 border-bottom d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary-subtle text-primary fw-semibold px-2 py-1 rounded-pill">Component Pattern</span>
                    <span class="badge bg-secondary-subtle text-dark fw-semibold px-2 py-1 rounded-pill">Freeze Architecture</span>
                </div>
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-pin-angle-fill text-primary me-2"></i>Table Footer Freezer with Smooth Inner Scroll</h6>
                <small class="text-secondary">Sticky table header at top + inner scrollable row body + frozen sticky summary footer at bottom</small>
            </div>
            <div>
                <span class="badge bg-light text-dark border px-3 py-1 font-monospace">class="table-scroll-frozen"</span>
            </div>
        </div>
        <div class="card-body p-3">
            <div class="table-scroll-frozen" style="max-height: 320px;">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase text-secondary small fw-bold">
                        <tr>
                            <th scope="col" style="width: 45px;" class="text-center">#</th>
                            <th scope="col">Staff Code</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Shift</th>
                            <th scope="col">Status</th>
                            <th scope="col">Punch In</th>
                            <th scope="col">Punch Out</th>
                            <th scope="col">Logged Hours</th>
                            <th scope="col">Overtime</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center text-secondary small">1</td>
                            <td><span class="badge bg-light text-dark border px-2 py-1 font-monospace">EMP-01</span></td>
                            <td class="fw-semibold text-dark">Aravind Raj</td>
                            <td class="text-secondary small">Operations</td>
                            <td class="text-secondary small">General (09:30 - 18:30)</td>
                            <td><span class="badge rounded-pill bg-success-subtle text-success px-2 py-1">Present</span></td>
                            <td class="text-dark small">09:28 AM</td>
                            <td class="text-dark small">06:40 PM</td>
                            <td class="fw-semibold text-dark small">8.5 hrs</td>
                            <td class="text-primary small fw-semibold">+0.5 hrs</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-secondary py-0 px-2"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td class="text-center text-secondary small">2</td>
                            <td><span class="badge bg-light text-dark border px-2 py-1 font-monospace">EMP-02</span></td>
                            <td class="fw-semibold text-dark">Kavitha M</td>
                            <td class="text-secondary small">Accounts</td>
                            <td class="text-secondary small">General (09:30 - 18:30)</td>
                            <td><span class="badge rounded-pill bg-success-subtle text-success px-2 py-1">Present</span></td>
                            <td class="text-dark small">09:15 AM</td>
                            <td class="text-dark small">07:00 PM</td>
                            <td class="fw-semibold text-dark small">9.0 hrs</td>
                            <td class="text-primary small fw-semibold">+1.0 hrs</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-secondary py-0 px-2"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td class="text-center text-secondary small">3</td>
                            <td><span class="badge bg-light text-dark border px-2 py-1 font-monospace">EMP-03</span></td>
                            <td class="fw-semibold text-dark">Santhosh Kumar</td>
                            <td class="text-secondary small">Support</td>
                            <td class="text-secondary small">Morning (08:00 - 17:00)</td>
                            <td><span class="badge rounded-pill bg-warning-subtle text-warning px-2 py-1">Late (15m)</span></td>
                            <td class="text-dark small">08:15 AM</td>
                            <td class="text-dark small">05:15 PM</td>
                            <td class="fw-semibold text-dark small">8.0 hrs</td>
                            <td class="text-muted small">-</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-secondary py-0 px-2"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td class="text-center text-secondary small">4</td>
                            <td><span class="badge bg-light text-dark border px-2 py-1 font-monospace">EMP-04</span></td>
                            <td class="fw-semibold text-dark">Deepak Sharma</td>
                            <td class="text-secondary small">Sales</td>
                            <td class="text-secondary small">General (09:30 - 18:30)</td>
                            <td><span class="badge rounded-pill bg-danger-subtle text-danger px-2 py-1">Absent</span></td>
                            <td class="text-muted small">-</td>
                            <td class="text-muted small">-</td>
                            <td class="text-muted small">0.0 hrs</td>
                            <td class="text-muted small">-</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-secondary py-0 px-2"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td class="text-center text-secondary small">5</td>
                            <td><span class="badge bg-light text-dark border px-2 py-1 font-monospace">EMP-05</span></td>
                            <td class="fw-semibold text-dark">Revathi Suresh</td>
                            <td class="text-secondary small">Sales</td>
                            <td class="text-secondary small">General (09:30 - 18:30)</td>
                            <td><span class="badge rounded-pill bg-success-subtle text-success px-2 py-1">Present</span></td>
                            <td class="text-dark small">09:30 AM</td>
                            <td class="text-dark small">06:30 PM</td>
                            <td class="fw-semibold text-dark small">8.0 hrs</td>
                            <td class="text-muted small">-</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-secondary py-0 px-2"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td class="text-center text-secondary small">6</td>
                            <td><span class="badge bg-light text-dark border px-2 py-1 font-monospace">EMP-06</span></td>
                            <td class="fw-semibold text-dark">Mohamed Bilal</td>
                            <td class="text-secondary small">Field Support</td>
                            <td class="text-secondary small">Flexible</td>
                            <td><span class="badge rounded-pill bg-info-subtle text-info px-2 py-1">On Visit</span></td>
                            <td class="text-dark small">09:00 AM</td>
                            <td class="text-dark small">06:00 PM</td>
                            <td class="fw-semibold text-dark small">8.0 hrs</td>
                            <td class="text-muted small">-</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-secondary py-0 px-2"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td class="text-center text-secondary small">7</td>
                            <td><span class="badge bg-light text-dark border px-2 py-1 font-monospace">EMP-07</span></td>
                            <td class="fw-semibold text-dark">Sneha Reddy</td>
                            <td class="text-secondary small">HR</td>
                            <td class="text-secondary small">General (09:30 - 18:30)</td>
                            <td><span class="badge rounded-pill bg-success-subtle text-success px-2 py-1">Present</span></td>
                            <td class="text-dark small">09:25 AM</td>
                            <td class="text-dark small">07:30 PM</td>
                            <td class="fw-semibold text-dark small">9.5 hrs</td>
                            <td class="text-primary small fw-semibold">+1.5 hrs</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-secondary py-0 px-2"><i class="bi bi-eye"></i></button></td>
                        </tr>
                        <tr>
                            <td class="text-center text-secondary small">8</td>
                            <td><span class="badge bg-light text-dark border px-2 py-1 font-monospace">EMP-08</span></td>
                            <td class="fw-semibold text-dark">Manoj Prabhakar</td>
                            <td class="text-secondary small">IT Admin</td>
                            <td class="text-secondary small">General (09:30 - 18:30)</td>
                            <td><span class="badge rounded-pill bg-success-subtle text-success px-2 py-1">Present</span></td>
                            <td class="text-dark small">09:10 AM</td>
                            <td class="text-dark small">06:45 PM</td>
                            <td class="fw-semibold text-dark small">8.7 hrs</td>
                            <td class="text-primary small fw-semibold">+0.5 hrs</td>
                            <td class="text-center"><button class="btn btn-sm btn-outline-secondary py-0 px-2"><i class="bi bi-eye"></i></button></td>
                        </tr>
                    </tbody>
                    <!-- FROZEN FOOTER: STICKY AT BOTTOM OF INNER SCROLL CONTAINER -->
                    <tfoot class="table-freeze-footer">
                        <tr>
                            <th colspan="3" class="text-dark">Totals &amp; Summary (8 Staff Displayed)</th>
                            <th class="text-secondary small">8 Recorded</th>
                            <th class="text-secondary small">-</th>
                            <th><span class="badge bg-success text-white px-2 py-1">6 Present &middot; 1 Late &middot; 1 Absent</span></th>
                            <th colspan="2" class="text-secondary small">Avg: 09:20 AM - 06:45 PM</th>
                            <th class="text-dark fw-bold">59.7 Total Hours</th>
                            <th class="text-primary fw-bold">+3.5 Overtime</th>
                            <th class="text-center"><button class="btn btn-sm btn-primary py-1 px-3">Export Log</button></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2 px-1">
                <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Header is pinned to the top; footer summary is pinned to the bottom during vertical scrolling.</small>
                <span class="badge bg-light text-secondary border">Freeze Footer Active</span>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php'; ?>
