<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/select2.css">
 






<div class="card-custom js-report-table mb-3 p-0">
    <div class="card-head align-items-center justify-content-start border-light-subtle border-bottom mb-0 p-3">
        <div class="icon-chip">
            <i class="bi bi-file-earmark-text-fill"></i>
        </div>
        <div>
            <h3 class="card-title">Normal table</h3>
        </div>
    </div>


    <div class="table-responsive overflow-auto column-border border-bottom mb-3">
        <table class="table-modern  w-100" >
            <thead>
                <tr>
                    <th class="gh-cursor-pointer text-nowrap">S.No</th>
                    <th class="gh-cursor-pointer text-nowrap">Employee ID</th>
                    <th class="gh-cursor-pointer text-nowrap">Employee Name</th>
                    <th class="gh-cursor-pointer text-nowrap">Attendance Status</th>
                    <th class="gh-cursor-pointer text-nowrap">Attendance Date</th>
                    <th class="gh-cursor-pointer text-nowrap">Punch In Time</th>
                    <th class="gh-cursor-pointer text-nowrap">Break Time</th>
                    <th class="gh-cursor-pointer text-nowrap">Punch Out Time</th>
                    <th class="gh-cursor-pointer text-nowrap">Total Working Hours</th>
                    <th class="gh-cursor-pointer text-nowrap">Late Arrival Time</th>
                    <th class="gh-cursor-pointer text-nowrap">Over Time Hours</th>
                    <th class="gh-cursor-pointer text-nowrap">Early Exists</th>
                    <th class="gh-cursor-pointer text-nowrap">Action</th>
                </tr>
            </thead>

            <tbody id="pgBody">

                <!-- Record 1 -->
                <tr>
                    <td data-label="S.No">1</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP001</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-1.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Praveena</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-approved">Present</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In">10:10 AM</td>
                    <td data-label="Break Time">30 Minutes</td>
                    <td data-label="Punch Out">19:00 PM</td>
                    <td data-label="Working Hours">7 hours</td>
                    <td data-label="Late Arrival">10 Minutes</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Record 2 -->
                <tr>
                    <td data-label="S.No">2</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP002</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-2.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Keerthana</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-rejected">Absent</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In" class="text-muted">00:00</td>
                    <td data-label="Break Time" class="text-muted">00:00</td>
                    <td data-label="Punch Out" class="text-muted">00:00</td>
                    <td data-label="Working Hours"><span class="status-pill status-pending">Leave</span></td>
                    <td data-label="Late Arrival" class="text-muted">-</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Record 3 -->
                <tr>
                    <td data-label="S.No">3</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP003</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-3.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Mani</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-approved">Present</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In">10:10 AM</td>
                    <td data-label="Break Time">30 Minutes</td>
                    <td data-label="Punch Out">19:00 PM</td>
                    <td data-label="Working Hours">7 hours</td>
                    <td data-label="Late Arrival">10 Minutes</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Record 4 -->
                <tr>
                    <td data-label="S.No">4</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP004</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-4.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Lokesh</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-approved">Present</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In">10:10 AM</td>
                    <td data-label="Break Time">30 Minutes</td>
                    <td data-label="Punch Out">19:00 PM</td>
                    <td data-label="Working Hours">7 hours</td>
                    <td data-label="Late Arrival">10 Minutes</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Record 5 -->
                <tr>
                    <td data-label="S.No">5</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP005</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-2.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Krishna</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-approved">Present</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In">10:00 AM</td>
                    <td data-label="Break Time">15 Minutes</td>
                    <td data-label="Punch Out">19:00 PM</td>
                    <td data-label="Working Hours">8 hours</td>
                    <td data-label="Late Arrival" class="text-muted">-</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>


<div class="card-custom js-report-table ">
    <div class="card-head align-items-center justify-content-start border-light-subtle border-bottom p-3">
        <div class="icon-chip">
            <i class="bi bi-file-earmark-text-fill"></i>
        </div>
        <div>
            <h3 class="card-title">Colum, Export, Pagination and Column Sticky Table</h3>
        </div>
    </div>

    <div class="report-toolbar px-3 mb-0">
        <div class="btn-group">
            <button class="btn btn-soft-primary columns-btn"><i class="mdi mdi-eye me-1"></i>Columns</button>
            <div class="border h-100"></div>
            <button class="btn btn-soft-primary export-btn"><i class="mdi mdi-download me-1"></i>Export</button>
        </div>

        <div class="report-search">
            <i class="mdi mdi-magnify"></i>
            <input type="text" placeholder="search here..." id="employeeSearch">
        </div>

        <!-- <button class="report-date-btn date-picker" data-bs-toggle="tooltip" data-bs-placement="top" title="Calender Search">
            <i class="mdi mdi-calendar"></i>
        </button> -->
    </div>

    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern stickyBlock w-100" id="attendanceTable">
            <thead>
                <tr>
                    <th class="gh-cursor-pointer text-nowrap">S.No</th>
                    <th class="gh-cursor-pointer text-nowrap">Employee ID</th>
                    <th class="gh-cursor-pointer text-nowrap">Employee Name</th>
                    <th class="gh-cursor-pointer text-nowrap">Attendance Status</th>
                    <th class="gh-cursor-pointer text-nowrap">Attendance Date</th>
                    <th class="gh-cursor-pointer text-nowrap">Punch In Time</th>
                    <th class="gh-cursor-pointer text-nowrap">Break Time</th>
                    <th class="gh-cursor-pointer text-nowrap">Punch Out Time</th>
                    <th class="gh-cursor-pointer text-nowrap">Total Working Hours</th>
                    <th class="gh-cursor-pointer text-nowrap">Late Arrival Time</th>
                    <th class="gh-cursor-pointer text-nowrap">Over Time Hours</th>
                    <th class="gh-cursor-pointer text-nowrap">Early Exists</th>
                    <th class="gh-cursor-pointer text-nowrap">Action</th>
                </tr>
            </thead>

            <tbody id="pgBody">

                <!-- Record 1 -->
                <tr>
                    <td data-label="S.No">1</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP001</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-1.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Praveena</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-approved">Present</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In">10:10 AM</td>
                    <td data-label="Break Time">30 Minutes</td>
                    <td data-label="Punch Out">19:00 PM</td>
                    <td data-label="Working Hours">7 hours</td>
                    <td data-label="Late Arrival">10 Minutes</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Record 2 -->
                <tr>
                    <td data-label="S.No">2</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP002</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-2.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Keerthana</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-rejected">Absent</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In" class="text-muted">00:00</td>
                    <td data-label="Break Time" class="text-muted">00:00</td>
                    <td data-label="Punch Out" class="text-muted">00:00</td>
                    <td data-label="Working Hours"><span class="status-pill status-pending">Leave</span></td>
                    <td data-label="Late Arrival" class="text-muted">-</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Record 3 -->
                <tr>
                    <td data-label="S.No">3</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP003</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-3.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Mani</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-approved">Present</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In">10:10 AM</td>
                    <td data-label="Break Time">30 Minutes</td>
                    <td data-label="Punch Out">19:00 PM</td>
                    <td data-label="Working Hours">7 hours</td>
                    <td data-label="Late Arrival">10 Minutes</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Record 4 -->
                <tr>
                    <td data-label="S.No">4</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP004</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-4.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Lokesh</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-approved">Present</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In">10:10 AM</td>
                    <td data-label="Break Time">30 Minutes</td>
                    <td data-label="Punch Out">19:00 PM</td>
                    <td data-label="Working Hours">7 hours</td>
                    <td data-label="Late Arrival">10 Minutes</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

                <!-- Record 5 -->
                <tr>
                    <td data-label="S.No">5</td>
                    <td data-label="Employee ID"><span class="emp-id-chip"><i class="mdi mdi-badge-account-horizontal-outline"></i>EMP005</span></td>
                    <td data-label="Employee Name">
                        <div class="emp-name-cell">
                            <div class="emp-avatar">
                                <img src="./assets/img/profile-2.jpg" alt="" class="h-100 object-fit-cover rounded-5 w-100">
                            </div>
                            <span class="font-weight-bold">Krishna</span>
                        </div>
                    </td>
                    <td data-label="Status"><span class="status-pill status-approved">Present</span></td>
                    <td data-label="Date">4-8-2026</td>
                    <td data-label="Punch In">10:00 AM</td>
                    <td data-label="Break Time">15 Minutes</td>
                    <td data-label="Punch Out">19:00 PM</td>
                    <td data-label="Working Hours">8 hours</td>
                    <td data-label="Late Arrival" class="text-muted">-</td>
                    <td data-label="Over Time" class="text-muted">-</td>
                    <td data-label="Early Exit" class="text-muted">-</td>
                    <td data-label="Action" class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button class="btn btn-sm edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button class="btn btn-sm danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center report-footer p-3">
        <div class="d-flex gap-2 align-items-center">
            <div class="d-flex gap-2 align-items-center">
                <span class="small text-muted text-nowrap">Show:</span>
                <select class="form-select select2 form-select-sm gh-w-auto" id="showEntries">
                    <option selected>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart"></strong>–<strong
                    id="pgEnd"></strong> of <strong id="pgTotal"></strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList">
                <li class="page-item"><a class="page-link" href="#"><i
                            class="mdi mdi-chevron-double-left"></i></a></li>
                <li class="page-item"><a class="page-link" href="#">←</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item disabled"><span class="page-link">…</span></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
                <li class="page-item"><a class="page-link" href="#">→</a></li>
                <li class="page-item"><a class="page-link" href="#"><i
                            class="mdi mdi-chevron-double-right"></i></a></li>
            </ul>
        </nav>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var wrap = document.querySelector('.table-modern-wrap');
        if (!wrap) return;

        function toggleStickyShadow() {
            if (wrap.scrollLeft > 0) {
                wrap.classList.add('is-scrolled');
            } else {
                wrap.classList.remove('is-scrolled');
            }
        }

        wrap.addEventListener('scroll', toggleStickyShadow);
        toggleStickyShadow();
    });
</script>

<script src="./assets/js/tabel.js"></script>


<?php include 'footer.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const tooltipTriggerList = document.querySelectorAll(
            '[data-bs-toggle="tooltip"]'
        );

        [...tooltipTriggerList].forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });

    });
</script>


 


