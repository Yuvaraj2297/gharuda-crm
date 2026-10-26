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

</div>

<?php include 'footer.php'; ?>
