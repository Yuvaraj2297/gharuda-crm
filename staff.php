<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header & Breadcrumbs -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <span>Team &amp; HR</span>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Staff &amp; Sales Force</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Staff Management</h1>
                <span class="badge rounded-pill" style="background: rgba(22, 163, 74, 0.12); color: #16a34a; font-weight:600;">24 Active Reps</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <!-- View Switcher -->
            <div class="btn-group p-1 bg-white border rounded-3 shadow-none me-1" role="group">
                <button type="button" class="btn btn-sm btn-light border-0 active" id="btnViewGrid" title="Grid View" style="border-radius: 6px;">
                    <i class="bi bi-grid-fill text-dark"></i>
                </button>
                <button type="button" class="btn btn-sm btn-light border-0" id="btnViewTable" title="Table View" style="border-radius: 6px;">
                    <i class="bi bi-list-ul text-dark"></i>
                </button>
            </div>

            <!-- Export dropdown -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 8px;">
                    <i class="bi bi-download me-1"></i> Export
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 fs-13">
                    <li><button type="button" class="dropdown-item py-2" id="exportStaffCsv"><i class="bi bi-file-earmark-spreadsheet me-2 text-success"></i>Export Staff Directory (CSV)</button></li>
                    <li><button type="button" class="dropdown-item py-2" id="printStaffDirectory"><i class="bi bi-printer me-2 text-primary"></i>Print Staff Directory</button></li>
                </ul>
            </div>

            <a href="staff-visting-report.php" class="btn btn-outline-secondary btn-sm" style="border-radius: 8px;">
                <i class="bi bi-geo-alt me-1"></i> Field Visits
            </a>

            <!-- Quick Add Modal Trigger -->
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addStaffModal" style="border-radius: 8px;">
                <i class="bi bi-lightning-charge me-1"></i> Quick Add
            </button>

            <!-- Full Onboarding Form Link -->
            <a href="staff-create.php" class="btn btn-primary btn-sm shadow-sm" style="border-radius: 8px;">
                <i class="bi bi-person-plus-fill me-1"></i> Add Staff Member
            </a>
        </div>
    </div>

    <?php if (isset($_GET['created'])): ?>
    <div id="staffCreatedAlert" class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between p-3 rounded-3 shadow-sm mb-4 border-0" style="background: rgba(22, 163, 74, 0.12); color: #16a34a;" role="alert">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <div>
                <strong>Staff Member Onboarded Successfully!</strong> <span id="newStaffAlertDesc">The new team member record has been created and login credentials dispatched.</span>
            </div>
        </div>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- KPI Summary Strip -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Total Staff Strength</span>
                    <span class="p-2 rounded-2" style="background: rgba(22, 163, 74, 0.12); color: #16a34a;"><i class="bi bi-people-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">24 Members</h3>
                <span class="text-muted small"><span class="text-success fw-semibold">21 Active</span> &bull; 3 On Leave</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Field Force on Duty</span>
                    <span class="p-2 rounded-2" style="background: rgba(1, 51, 118, 0.12); color: #013376;"><i class="bi bi-pin-map-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">18 Checked In</h3>
                <span class="text-muted small"><span class="text-primary fw-semibold">92%</span> Daily Attendance Rate</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Monthly Quota Pipeline</span>
                    <span class="p-2 rounded-2" style="background: rgba(234, 88, 12, 0.12); color: #ea580c;"><i class="bi bi-cash-stack"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹1.48 Crore</h3>
                <span class="text-muted small"><span class="text-success fw-semibold">₹1.12 Cr</span> (75.6% Achieved)</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 bg-white">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Top Performer (Oct)</span>
                    <span class="p-2 rounded-2" style="background: rgba(147, 51, 234, 0.12); color: #9333ea;"><i class="bi bi-trophy-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">David Chen</h3>
                <span class="text-muted small">Sr. Enterprise AE &bull; <span class="text-success fw-semibold">118% Quota</span></span>
            </div>
        </div>
    </div>

    <!-- Filters & Search Toolbar -->
    <div class="card border-0 shadow-sm rounded-3 p-3 mb-4 bg-white">
        <div class="row g-2 align-items-center">
            <div class="col-md-4">
                <div class="position-relative">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    <input type="text" id="staffSearchInput" class="form-control form-control-sm ps-5 py-2 shadow-none border" placeholder="Search by name, EMP ID, mobile, role..." style="border-radius: 8px;">
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <select id="roleFilter" class="form-select form-select-sm py-2 shadow-none border" style="border-radius: 8px;">
                    <option value="">All Designations</option>
                    <option value="Enterprise AE">Enterprise AE</option>
                    <option value="Field Sales Officer">Field Sales Officer</option>
                    <option value="Sales Representative">Sales Representative</option>
                    <option value="Sales Manager">Sales Manager</option>
                    <option value="Support Engineer">Support Engineer</option>
                </select>
            </div>
            <div class="col-sm-6 col-md-2">
                <select id="branchFilter" class="form-select form-select-sm py-2 shadow-none border" style="border-radius: 8px;">
                    <option value="">All Branches</option>
                    <option value="Bangalore HQ">Bangalore HQ</option>
                    <option value="Chennai Central">Chennai Central</option>
                    <option value="Mumbai South">Mumbai South</option>
                    <option value="Hyderabad">Hyderabad</option>
                </select>
            </div>
            <div class="col-sm-6 col-md-2">
                <select id="statusFilter" class="form-select form-select-sm py-2 shadow-none border" style="border-radius: 8px;">
                    <option value="">All Statuses</option>
                    <option value="Active">Active</option>
                    <option value="On Leave">On Leave</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="col-sm-6 col-md-2 text-md-end">
                <button type="button" id="resetStaffFilters" class="btn btn-outline-secondary btn-sm w-100 py-2" style="border-radius: 8px;">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filters
                </button>
            </div>
        </div>
    </div>

    <!-- View 1: Card Grid View -->
    <div id="staffGridView">
        <div class="row g-3" id="staffCardContainer">

            <!-- Card 1 -->
            <div class="col-md-6 col-lg-4 col-xl-3 staff-card-item" data-name="David Chen" data-empid="EMP-1001" data-role="Enterprise AE" data-branch="Bangalore HQ" data-status="Active">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 staff-card bg-white position-relative">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="position-relative">
                            <img src="./assets/img/profile-2.jpg" alt="David Chen" class="rounded-circle object-fit-cover" style="width: 52px; height: 52px;">
                            <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle" title="Active on Duty"></span>
                        </div>
                        <div class="min-w-0">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-bold mb-0 text-truncate text-dark">David Chen</h6>
                                <span class="badge bg-light text-secondary border fs-11">EMP-1001</span>
                            </div>
                            <span class="badge rounded-pill mt-1" style="background: rgba(1, 51, 118, 0.1); color: #013376; font-size:11px;">Enterprise AE</span>
                            <div class="text-muted small mt-1 fs-12"><i class="bi bi-building me-1"></i>Bangalore HQ</div>
                        </div>
                    </div>

                    <div class="p-2 rounded-2 bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1 fs-12">
                            <span class="text-muted">Quota Attainment:</span>
                            <span class="fw-bold text-success">118% (₹23.6L / ₹20L)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 100%;"></div>
                        </div>
                    </div>

                    <div class="row g-2 text-center mb-3 fs-12">
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">32</span>
                            <span class="text-muted">Leads</span>
                        </div>
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">8</span>
                            <span class="text-muted">Deals</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block fw-bold text-dark fs-14">24</span>
                            <span class="text-muted">Visits</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                        <div class="d-flex gap-2">
                            <a href="tel:+919845012345" class="btn btn-sm btn-light border p-1 px-2 rounded-2" title="Call David"><i class="bi bi-telephone text-primary"></i></a>
                            <a href="mailto:david.chen@gharuda.com" class="btn btn-sm btn-light border p-1 px-2 rounded-2" title="Email David"><i class="bi bi-envelope text-primary"></i></a>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="employee-revenue-report.php" class="btn btn-sm btn-outline-secondary py-1 px-2" style="border-radius:6px; font-size:12px;">Stats</a>
                            <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-staff" data-name="David Chen" data-role="Enterprise AE" data-branch="Bangalore HQ" data-target="2000000" data-phone="+91 98450 12345" data-email="david.chen@gharuda.com" style="border-radius:6px; font-size:12px;">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-4 col-xl-3 staff-card-item" data-name="Olivia Brown" data-empid="EMP-1002" data-role="Field Sales Officer" data-branch="Chennai Central" data-status="Active">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 staff-card bg-white position-relative">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="position-relative">
                            <img src="./assets/img/profile-3.jpg" alt="Olivia Brown" class="rounded-circle object-fit-cover" style="width: 52px; height: 52px;">
                            <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle" title="Active on Duty"></span>
                        </div>
                        <div class="min-w-0">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-bold mb-0 text-truncate text-dark">Olivia Brown</h6>
                                <span class="badge bg-light text-secondary border fs-11">EMP-1002</span>
                            </div>
                            <span class="badge rounded-pill mt-1" style="background: rgba(22, 163, 74, 0.1); color: #16a34a; font-size:11px;">Field Sales Officer</span>
                            <div class="text-muted small mt-1 fs-12"><i class="bi bi-building me-1"></i>Chennai Central</div>
                        </div>
                    </div>

                    <div class="p-2 rounded-2 bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1 fs-12">
                            <span class="text-muted">Quota Attainment:</span>
                            <span class="fw-bold text-primary">88% (₹13.2L / ₹15L)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-primary" style="width: 88%;"></div>
                        </div>
                    </div>

                    <div class="row g-2 text-center mb-3 fs-12">
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">45</span>
                            <span class="text-muted">Leads</span>
                        </div>
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">5</span>
                            <span class="text-muted">Deals</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block fw-bold text-dark fs-14">38</span>
                            <span class="text-muted">Visits</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                        <div class="d-flex gap-2">
                            <a href="tel:+919845012346" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-telephone text-primary"></i></a>
                            <a href="mailto:olivia.brown@gharuda.com" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-envelope text-primary"></i></a>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="staff-visting-report.php" class="btn btn-sm btn-outline-secondary py-1 px-2" style="border-radius:6px; font-size:12px;">Visits</a>
                            <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-staff" data-name="Olivia Brown" data-role="Field Sales Officer" data-branch="Chennai Central" data-target="1500000" data-phone="+91 98450 12346" data-email="olivia.brown@gharuda.com" style="border-radius:6px; font-size:12px;">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-lg-4 col-xl-3 staff-card-item" data-name="Sarah Mitchell" data-empid="EMP-1003" data-role="Sales Manager" data-branch="Bangalore HQ" data-status="Active">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 staff-card bg-white position-relative">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="position-relative">
                            <img src="./assets/img/profile-1.jpg" alt="Sarah Mitchell" class="rounded-circle object-fit-cover" style="width: 52px; height: 52px;">
                            <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                        </div>
                        <div class="min-w-0">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-bold mb-0 text-truncate text-dark">Sarah Mitchell</h6>
                                <span class="badge bg-light text-secondary border fs-11">EMP-1003</span>
                            </div>
                            <span class="badge rounded-pill mt-1" style="background: rgba(147, 51, 234, 0.1); color: #9333ea; font-size:11px;">Sales Manager</span>
                            <div class="text-muted small mt-1 fs-12"><i class="bi bi-building me-1"></i>Bangalore HQ</div>
                        </div>
                    </div>

                    <div class="p-2 rounded-2 bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1 fs-12">
                            <span class="text-muted">Team Target:</span>
                            <span class="fw-bold text-success">96% (₹48L / ₹50L)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 96%;"></div>
                        </div>
                    </div>

                    <div class="row g-2 text-center mb-3 fs-12">
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">72</span>
                            <span class="text-muted">Team Leads</span>
                        </div>
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">19</span>
                            <span class="text-muted">Deals</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block fw-bold text-dark fs-14">6</span>
                            <span class="text-muted">Direct Reps</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                        <div class="d-flex gap-2">
                            <a href="tel:+919845012347" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-telephone text-primary"></i></a>
                            <a href="mailto:sarah.mitchell@gharuda.com" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-envelope text-primary"></i></a>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="target.php" class="btn btn-sm btn-outline-secondary py-1 px-2" style="border-radius:6px; font-size:12px;">Team</a>
                            <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-staff" data-name="Sarah Mitchell" data-role="Sales Manager" data-branch="Bangalore HQ" data-target="5000000" data-phone="+91 98450 12347" data-email="sarah.mitchell@gharuda.com" style="border-radius:6px; font-size:12px;">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-6 col-lg-4 col-xl-3 staff-card-item" data-name="Rajesh Kumar" data-empid="EMP-1004" data-role="Sales Representative" data-branch="Mumbai South" data-status="Active">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 staff-card bg-white position-relative">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="position-relative">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-none" style="width: 52px; height: 52px; background: linear-gradient(135deg, #0284c7, #0369a1); font-size:18px;">
                                RK
                            </div>
                            <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                        </div>
                        <div class="min-w-0">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-bold mb-0 text-truncate text-dark">Rajesh Kumar</h6>
                                <span class="badge bg-light text-secondary border fs-11">EMP-1004</span>
                            </div>
                            <span class="badge rounded-pill mt-1" style="background: rgba(2, 132, 199, 0.1); color: #0284c7; font-size:11px;">Sales Representative</span>
                            <div class="text-muted small mt-1 fs-12"><i class="bi bi-building me-1"></i>Mumbai South</div>
                        </div>
                    </div>

                    <div class="p-2 rounded-2 bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1 fs-12">
                            <span class="text-muted">Quota Attainment:</span>
                            <span class="fw-bold text-warning">72% (₹7.2L / ₹10L)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" style="width: 72%;"></div>
                        </div>
                    </div>

                    <div class="row g-2 text-center mb-3 fs-12">
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">28</span>
                            <span class="text-muted">Leads</span>
                        </div>
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">3</span>
                            <span class="text-muted">Deals</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block fw-bold text-dark fs-14">16</span>
                            <span class="text-muted">Visits</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                        <div class="d-flex gap-2">
                            <a href="tel:+919845012348" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-telephone text-primary"></i></a>
                            <a href="mailto:rajesh.kumar@gharuda.com" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-envelope text-primary"></i></a>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="employee-revenue-report.php" class="btn btn-sm btn-outline-secondary py-1 px-2" style="border-radius:6px; font-size:12px;">Stats</a>
                            <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-staff" data-name="Rajesh Kumar" data-role="Sales Representative" data-branch="Mumbai South" data-target="1000000" data-phone="+91 98450 12348" data-email="rajesh.kumar@gharuda.com" style="border-radius:6px; font-size:12px;">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-6 col-lg-4 col-xl-3 staff-card-item" data-name="Priya Sharma" data-empid="EMP-1005" data-role="Field Sales Officer" data-branch="Hyderabad" data-status="Active">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 staff-card bg-white position-relative">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="position-relative">
                            <img src="./assets/img/profile-4.jpg" alt="Priya Sharma" class="rounded-circle object-fit-cover" style="width: 52px; height: 52px;">
                            <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                        </div>
                        <div class="min-w-0">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-bold mb-0 text-truncate text-dark">Priya Sharma</h6>
                                <span class="badge bg-light text-secondary border fs-11">EMP-1005</span>
                            </div>
                            <span class="badge rounded-pill mt-1" style="background: rgba(22, 163, 74, 0.1); color: #16a34a; font-size:11px;">Field Sales Officer</span>
                            <div class="text-muted small mt-1 fs-12"><i class="bi bi-building me-1"></i>Hyderabad</div>
                        </div>
                    </div>

                    <div class="p-2 rounded-2 bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1 fs-12">
                            <span class="text-muted">Quota Attainment:</span>
                            <span class="fw-bold text-success">91% (₹10.9L / ₹12L)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 91%;"></div>
                        </div>
                    </div>

                    <div class="row g-2 text-center mb-3 fs-12">
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">39</span>
                            <span class="text-muted">Leads</span>
                        </div>
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">4</span>
                            <span class="text-muted">Deals</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block fw-bold text-dark fs-14">31</span>
                            <span class="text-muted">Visits</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                        <div class="d-flex gap-2">
                            <a href="tel:+919845012349" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-telephone text-primary"></i></a>
                            <a href="mailto:priya.sharma@gharuda.com" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-envelope text-primary"></i></a>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="staff-visting-report.php" class="btn btn-sm btn-outline-secondary py-1 px-2" style="border-radius:6px; font-size:12px;">Visits</a>
                            <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-staff" data-name="Priya Sharma" data-role="Field Sales Officer" data-branch="Hyderabad" data-target="1200000" data-phone="+91 98450 12349" data-email="priya.sharma@gharuda.com" style="border-radius:6px; font-size:12px;">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-6 col-lg-4 col-xl-3 staff-card-item" data-name="Vikram Patel" data-empid="EMP-1006" data-role="Enterprise AE" data-branch="Mumbai South" data-status="On Leave">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 staff-card bg-white position-relative">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="position-relative">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-none" style="width: 52px; height: 52px; background: linear-gradient(135deg, #f59e0b, #d97706); font-size:18px;">
                                VP
                            </div>
                            <span class="position-absolute bottom-0 end-0 p-1 bg-warning border border-white rounded-circle" title="On Leave"></span>
                        </div>
                        <div class="min-w-0">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-bold mb-0 text-truncate text-dark">Vikram Patel</h6>
                                <span class="badge bg-light text-secondary border fs-11">EMP-1006</span>
                            </div>
                            <span class="badge rounded-pill mt-1" style="background: rgba(1, 51, 118, 0.1); color: #013376; font-size:11px;">Enterprise AE</span>
                            <div class="text-muted small mt-1 fs-12"><i class="bi bi-building me-1"></i>Mumbai South</div>
                        </div>
                    </div>

                    <div class="p-2 rounded-2 bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1 fs-12">
                            <span class="text-muted">Quota Attainment:</span>
                            <span class="fw-bold text-dark">65% (₹11.7L / ₹18L)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-info" style="width: 65%;"></div>
                        </div>
                    </div>

                    <div class="row g-2 text-center mb-3 fs-12">
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">22</span>
                            <span class="text-muted">Leads</span>
                        </div>
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">4</span>
                            <span class="text-muted">Deals</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block fw-bold text-dark fs-14">12</span>
                            <span class="text-muted">Visits</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                        <div class="d-flex gap-2">
                            <a href="tel:+919845012350" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-telephone text-primary"></i></a>
                            <a href="mailto:vikram.patel@gharuda.com" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-envelope text-primary"></i></a>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="employee-revenue-report.php" class="btn btn-sm btn-outline-secondary py-1 px-2" style="border-radius:6px; font-size:12px;">Stats</a>
                            <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-staff" data-name="Vikram Patel" data-role="Enterprise AE" data-branch="Mumbai South" data-target="1800000" data-phone="+91 98450 12350" data-email="vikram.patel@gharuda.com" style="border-radius:6px; font-size:12px;">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="col-md-6 col-lg-4 col-xl-3 staff-card-item" data-name="Sneha Reddy" data-empid="EMP-1007" data-role="Support Engineer" data-branch="Bangalore HQ" data-status="Active">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 staff-card bg-white position-relative">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="position-relative">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-none" style="width: 52px; height: 52px; background: linear-gradient(135deg, #10b981, #059669); font-size:18px;">
                                SR
                            </div>
                            <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                        </div>
                        <div class="min-w-0">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-bold mb-0 text-truncate text-dark">Sneha Reddy</h6>
                                <span class="badge bg-light text-secondary border fs-11">EMP-1007</span>
                            </div>
                            <span class="badge rounded-pill mt-1" style="background: rgba(13, 202, 240, 0.1); color: #0dcaf0; font-size:11px;">Support Engineer</span>
                            <div class="text-muted small mt-1 fs-12"><i class="bi bi-building me-1"></i>Bangalore HQ</div>
                        </div>
                    </div>

                    <div class="p-2 rounded-2 bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1 fs-12">
                            <span class="text-muted">Tickets Resolved:</span>
                            <span class="fw-bold text-success">98% (49/50 SLA)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 98%;"></div>
                        </div>
                    </div>

                    <div class="row g-2 text-center mb-3 fs-12">
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">54</span>
                            <span class="text-muted">Tickets</span>
                        </div>
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">4.9</span>
                            <span class="text-muted">CSAT</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block fw-bold text-dark fs-14">1.8h</span>
                            <span class="text-muted">Avg SLA</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                        <div class="d-flex gap-2">
                            <a href="tel:+919845012351" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-telephone text-primary"></i></a>
                            <a href="mailto:sneha.reddy@gharuda.com" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-envelope text-primary"></i></a>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="support-tickets.php" class="btn btn-sm btn-outline-secondary py-1 px-2" style="border-radius:6px; font-size:12px;">Tickets</a>
                            <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-staff" data-name="Sneha Reddy" data-role="Support Engineer" data-branch="Bangalore HQ" data-target="0" data-phone="+91 98450 12351" data-email="sneha.reddy@gharuda.com" style="border-radius:6px; font-size:12px;">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="col-md-6 col-lg-4 col-xl-3 staff-card-item" data-name="Karthik Sundaram" data-empid="EMP-1008" data-role="Field Sales Officer" data-branch="Chennai Central" data-status="Active">
                <div class="card border-0 shadow-sm rounded-3 p-3 h-100 staff-card bg-white position-relative">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="position-relative">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-none" style="width: 52px; height: 52px; background: linear-gradient(135deg, #16a34a, #15803d); font-size:18px;">
                                KS
                            </div>
                            <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                        </div>
                        <div class="min-w-0">
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-bold mb-0 text-truncate text-dark">Karthik Sundaram</h6>
                                <span class="badge bg-light text-secondary border fs-11">EMP-1008</span>
                            </div>
                            <span class="badge rounded-pill mt-1" style="background: rgba(22, 163, 74, 0.1); color: #16a34a; font-size:11px;">Field Sales Officer</span>
                            <div class="text-muted small mt-1 fs-12"><i class="bi bi-building me-1"></i>Chennai Central</div>
                        </div>
                    </div>

                    <div class="p-2 rounded-2 bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1 fs-12">
                            <span class="text-muted">Quota Attainment:</span>
                            <span class="fw-bold text-success">104% (₹12.5L / ₹12L)</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 100%;"></div>
                        </div>
                    </div>

                    <div class="row g-2 text-center mb-3 fs-12">
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">41</span>
                            <span class="text-muted">Leads</span>
                        </div>
                        <div class="col-4 border-end">
                            <span class="d-block fw-bold text-dark fs-14">6</span>
                            <span class="text-muted">Deals</span>
                        </div>
                        <div class="col-4">
                            <span class="d-block fw-bold text-dark fs-14">34</span>
                            <span class="text-muted">Visits</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                        <div class="d-flex gap-2">
                            <a href="tel:+919845012352" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-telephone text-primary"></i></a>
                            <a href="mailto:karthik.s@gharuda.com" class="btn btn-sm btn-light border p-1 px-2 rounded-2"><i class="bi bi-envelope text-primary"></i></a>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="staff-visting-report.php" class="btn btn-sm btn-outline-secondary py-1 px-2" style="border-radius:6px; font-size:12px;">Visits</a>
                            <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-staff" data-name="Karthik Sundaram" data-role="Field Sales Officer" data-branch="Chennai Central" data-target="1200000" data-phone="+91 98450 12352" data-email="karthik.s@gharuda.com" style="border-radius:6px; font-size:12px;">Edit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- View 2: Table View -->
    <div id="staffTableView" class="d-none">
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light fs-12 text-uppercase text-muted border-bottom">
                        <tr>
                            <th class="ps-3 py-3">Emp ID</th>
                            <th>Staff Member</th>
                            <th>Designation</th>
                            <th>Branch / Location</th>
                            <th>Contact</th>
                            <th>Monthly Quota</th>
                            <th>Leads</th>
                            <th>Status</th>
                            <th class="text-end pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fs-13" id="staffTableBody">
                        <tr class="staff-row" data-name="David Chen" data-empid="EMP-1001" data-role="Enterprise AE" data-branch="Bangalore HQ" data-status="Active">
                            <td class="ps-3 fw-bold text-secondary">EMP-1001</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="./assets/img/profile-2.jpg" alt="" class="rounded-circle object-fit-cover" style="width:36px; height:36px;">
                                    <div>
                                        <div class="fw-bold text-dark">David Chen</div>
                                        <div class="text-muted fs-11">david.chen@gharuda.com</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge rounded-pill" style="background: rgba(1, 51, 118, 0.1); color: #013376;">Enterprise AE</span></td>
                            <td>Bangalore HQ</td>
                            <td>+91 98450 12345</td>
                            <td>
                                <div class="fw-bold text-success fs-12">118% (₹23.6L / ₹20L)</div>
                                <div class="progress" style="height:4px; width:100px;">
                                    <div class="progress-bar bg-success" style="width:100%;"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">32 Leads</span></td>
                            <td><span class="badge bg-success-subtle text-success">Active</span></td>
                            <td class="text-end pe-3">
                                <a href="employee-revenue-report.php" class="btn btn-sm btn-light border py-1 px-2" title="Reports"><i class="bi bi-graph-up"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 btn-edit-staff" data-name="David Chen" data-role="Enterprise AE" data-branch="Bangalore HQ" data-target="2000000" data-phone="+91 98450 12345" data-email="david.chen@gharuda.com" title="Edit"><i class="bi bi-pencil"></i></button>
                            </td>
                        </tr>
                        <tr class="staff-row" data-name="Olivia Brown" data-empid="EMP-1002" data-role="Field Sales Officer" data-branch="Chennai Central" data-status="Active">
                            <td class="ps-3 fw-bold text-secondary">EMP-1002</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="./assets/img/profile-3.jpg" alt="" class="rounded-circle object-fit-cover" style="width:36px; height:36px;">
                                    <div>
                                        <div class="fw-bold text-dark">Olivia Brown</div>
                                        <div class="text-muted fs-11">olivia.brown@gharuda.com</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge rounded-pill" style="background: rgba(22, 163, 74, 0.1); color: #16a34a;">Field Sales Officer</span></td>
                            <td>Chennai Central</td>
                            <td>+91 98450 12346</td>
                            <td>
                                <div class="fw-bold text-primary fs-12">88% (₹13.2L / ₹15L)</div>
                                <div class="progress" style="height:4px; width:100px;">
                                    <div class="progress-bar bg-primary" style="width:88%;"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">45 Leads</span></td>
                            <td><span class="badge bg-success-subtle text-success">Active</span></td>
                            <td class="text-end pe-3">
                                <a href="staff-visting-report.php" class="btn btn-sm btn-light border py-1 px-2" title="Visits"><i class="bi bi-geo-alt"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 btn-edit-staff" data-name="Olivia Brown" data-role="Field Sales Officer" data-branch="Chennai Central" data-target="1500000" data-phone="+91 98450 12346" data-email="olivia.brown@gharuda.com" title="Edit"><i class="bi bi-pencil"></i></button>
                            </td>
                        </tr>
                        <tr class="staff-row" data-name="Sarah Mitchell" data-empid="EMP-1003" data-role="Sales Manager" data-branch="Bangalore HQ" data-status="Active">
                            <td class="ps-3 fw-bold text-secondary">EMP-1003</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="./assets/img/profile-1.jpg" alt="" class="rounded-circle object-fit-cover" style="width:36px; height:36px;">
                                    <div>
                                        <div class="fw-bold text-dark">Sarah Mitchell</div>
                                        <div class="text-muted fs-11">sarah.mitchell@gharuda.com</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge rounded-pill" style="background: rgba(147, 51, 234, 0.1); color: #9333ea;">Sales Manager</span></td>
                            <td>Bangalore HQ</td>
                            <td>+91 98450 12347</td>
                            <td>
                                <div class="fw-bold text-success fs-12">96% (₹48L / ₹50L)</div>
                                <div class="progress" style="height:4px; width:100px;">
                                    <div class="progress-bar bg-success" style="width:96%;"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">72 Leads</span></td>
                            <td><span class="badge bg-success-subtle text-success">Active</span></td>
                            <td class="text-end pe-3">
                                <a href="target.php" class="btn btn-sm btn-light border py-1 px-2" title="Team Quotas"><i class="bi bi-bullseye"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 btn-edit-staff" data-name="Sarah Mitchell" data-role="Sales Manager" data-branch="Bangalore HQ" data-target="5000000" data-phone="+91 98450 12347" data-email="sarah.mitchell@gharuda.com" title="Edit"><i class="bi bi-pencil"></i></button>
                            </td>
                        </tr>
                        <tr class="staff-row" data-name="Rajesh Kumar" data-empid="EMP-1004" data-role="Sales Representative" data-branch="Mumbai South" data-status="Active">
                            <td class="ps-3 fw-bold text-secondary">EMP-1004</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:36px; height:36px; background:#0284c7; font-size:13px;">RK</div>
                                    <div>
                                        <div class="fw-bold text-dark">Rajesh Kumar</div>
                                        <div class="text-muted fs-11">rajesh.kumar@gharuda.com</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge rounded-pill" style="background: rgba(2, 132, 199, 0.1); color: #0284c7;">Sales Rep</span></td>
                            <td>Mumbai South</td>
                            <td>+91 98450 12348</td>
                            <td>
                                <div class="fw-bold text-warning fs-12">72% (₹7.2L / ₹10L)</div>
                                <div class="progress" style="height:4px; width:100px;">
                                    <div class="progress-bar bg-warning" style="width:72%;"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">28 Leads</span></td>
                            <td><span class="badge bg-success-subtle text-success">Active</span></td>
                            <td class="text-end pe-3">
                                <a href="employee-revenue-report.php" class="btn btn-sm btn-light border py-1 px-2" title="Reports"><i class="bi bi-graph-up"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 btn-edit-staff" data-name="Rajesh Kumar" data-role="Sales Representative" data-branch="Mumbai South" data-target="1000000" data-phone="+91 98450 12348" data-email="rajesh.kumar@gharuda.com" title="Edit"><i class="bi bi-pencil"></i></button>
                            </td>
                        </tr>
                        <tr class="staff-row" data-name="Vikram Patel" data-empid="EMP-1006" data-role="Enterprise AE" data-branch="Mumbai South" data-status="On Leave">
                            <td class="ps-3 fw-bold text-secondary">EMP-1006</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:36px; height:36px; background:#f59e0b; font-size:13px;">VP</div>
                                    <div>
                                        <div class="fw-bold text-dark">Vikram Patel</div>
                                        <div class="text-muted fs-11">vikram.patel@gharuda.com</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge rounded-pill" style="background: rgba(1, 51, 118, 0.1); color: #013376;">Enterprise AE</span></td>
                            <td>Mumbai South</td>
                            <td>+91 98450 12350</td>
                            <td>
                                <div class="fw-bold text-muted fs-12">65% (₹11.7L / ₹18L)</div>
                                <div class="progress" style="height:4px; width:100px;">
                                    <div class="progress-bar bg-secondary" style="width:65%;"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">22 Leads</span></td>
                            <td><span class="badge bg-warning-subtle text-warning">On Leave</span></td>
                            <td class="text-end pe-3">
                                <a href="employee-revenue-report.php" class="btn btn-sm btn-light border py-1 px-2" title="Reports"><i class="bi bi-graph-up"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 btn-edit-staff" data-name="Vikram Patel" data-role="Enterprise AE" data-branch="Mumbai South" data-target="1800000" data-phone="+91 98450 12350" data-email="vikram.patel@gharuda.com" title="Edit"><i class="bi bi-pencil"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Add Staff Member -->
<div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom pb-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2" style="background: rgba(22, 163, 74, 0.12); color: #16a34a;"><i class="bi bi-person-plus-fill fs-5"></i></span>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0" id="addStaffModalLabel">Add New Staff Member</h5>
                        <p class="text-muted small mb-0">Onboard sales rep, field executive, or support engineer to CRM</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addStaffForm">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control form-control-sm py-2 shadow-none border" placeholder="e.g. Ramesh Varma" required style="border-radius:8px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Employee Code <span class="text-danger">*</span></label>
                            <input type="text" name="empid" class="form-control form-control-sm py-2 shadow-none border" value="EMP-1009" required style="border-radius:8px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control form-control-sm py-2 shadow-none border" placeholder="ramesh@gharuda.com" required style="border-radius:8px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Mobile Number <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" class="form-control form-control-sm py-2 shadow-none border" placeholder="+91 98450 XXXXX" required style="border-radius:8px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Role / Designation <span class="text-danger">*</span></label>
                            <select name="role" class="form-select form-select-sm py-2 shadow-none border" required style="border-radius:8px;">
                                <option value="Enterprise AE">Enterprise AE</option>
                                <option value="Field Sales Officer" selected>Field Sales Officer</option>
                                <option value="Sales Representative">Sales Representative</option>
                                <option value="Sales Manager">Sales Manager</option>
                                <option value="Support Engineer">Support Engineer</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Branch / Territory <span class="text-danger">*</span></label>
                            <select name="branch" class="form-select form-select-sm py-2 shadow-none border" required style="border-radius:8px;">
                                <option value="Bangalore HQ">Bangalore HQ</option>
                                <option value="Chennai Central" selected>Chennai Central</option>
                                <option value="Mumbai South">Mumbai South</option>
                                <option value="Hyderabad">Hyderabad</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Monthly Target Quota (₹)</label>
                            <input type="number" name="target" class="form-control form-control-sm py-2 shadow-none border" placeholder="1000000" value="1000000" style="border-radius:8px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-dark">Status</label>
                            <select name="status" class="form-select form-select-sm py-2 shadow-none border" style="border-radius:8px;">
                                <option value="Active" selected>Active</option>
                                <option value="On Leave">On Leave</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3">
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3" data-bs-dismiss="modal" style="border-radius:8px;">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm px-4" style="border-radius:8px;">Save Staff Member</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: View Staff Member Profile -->
<div class="modal fade" id="viewStaffModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <!-- Modal Header with gradient profile bar -->
            <div class="p-4 text-white position-relative" style="background: linear-gradient(135deg, #013376 0%, #16a34a 100%);">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="d-flex align-items-center gap-3">
                    <div id="vmAvatarContainer" class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow border border-2 border-white overflow-hidden" style="width: 68px; height: 68px; font-size: 24px; background: rgba(255,255,255,0.25);">
                        <span id="vmInitials">DC</span>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h4 class="fw-bold mb-0 text-white" id="vmName">David Chen</h4>
                            <span class="badge bg-white text-dark shadow-sm fs-11" id="vmEmpId">EMP-1001</span>
                            <span class="badge bg-success text-white shadow-sm fs-11" id="vmStatus">Active</span>
                        </div>
                        <div class="opacity-90 small mt-1 d-flex align-items-center gap-3 flex-wrap text-white">
                            <span><i class="bi bi-briefcase me-1"></i><span id="vmRole">Enterprise AE</span></span>
                            <span>&bull;</span>
                            <span><i class="bi bi-building me-1"></i><span id="vmBranch">Bangalore HQ</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Metrics Strip -->
            <div class="bg-light border-bottom p-3">
                <div class="row g-2 text-center fs-12">
                    <div class="col-3 border-end">
                        <span class="text-muted d-block small">Monthly Quota</span>
                        <span class="fw-bold fs-14 text-dark" id="vmQuota">₹20,00,000</span>
                    </div>
                    <div class="col-3 border-end">
                        <span class="text-muted d-block small">Attainment</span>
                        <span class="fw-bold fs-14 text-success" id="vmAttainment">118%</span>
                    </div>
                    <div class="col-3 border-end">
                        <span class="text-muted d-block small">Active Leads</span>
                        <span class="fw-bold fs-14 text-dark" id="vmLeads">32 Leads</span>
                    </div>
                    <div class="col-3">
                        <span class="text-muted d-block small">Field Visits</span>
                        <span class="fw-bold fs-14 text-primary" id="vmVisits">24 Visits</span>
                    </div>
                </div>
            </div>

            <!-- Modal Body Details -->
            <div class="modal-body p-4">
                <div class="row g-4">
                    <!-- Contact Information -->
                    <div class="col-md-6 border-end">
                        <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-person-lines-fill text-primary"></i> Contact Information
                        </h6>
                        <div class="d-flex flex-column gap-2 fs-13">
                            <div class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                <span class="text-muted">Work Email:</span>
                                <a href="#" id="vmEmailLink" class="fw-semibold text-decoration-none text-dark"><span id="vmEmail">david.chen@gharuda.com</span></a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                <span class="text-muted">Mobile Number:</span>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fw-semibold text-dark" id="vmPhone">+91 98450 12345</span>
                                    <a href="#" id="vmCallLink" class="btn btn-sm btn-outline-primary py-0 px-2 rounded" title="Call"><i class="bi bi-telephone"></i></a>
                                    <a href="#" id="vmWaLink" target="_blank" rel="noopener" class="btn btn-sm btn-outline-success py-0 px-2 rounded" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                <span class="text-muted">Operating Branch:</span>
                                <span class="fw-semibold text-dark" id="vmBranchDetail">Bangalore HQ</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                <span class="text-muted">Sales Territory:</span>
                                <span class="fw-semibold text-dark" id="vmTerritory">South Zone &amp; Metro Hub</span>
                            </div>
                        </div>
                    </div>

                    <!-- Operational & HR Governance -->
                    <div class="col-md-6">
                        <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-shield-check text-success"></i> Operational Governance
                        </h6>
                        <div class="d-flex flex-column gap-2 fs-13">
                            <div class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                <span class="text-muted">Department:</span>
                                <span class="fw-semibold text-dark" id="vmDept">Enterprise Business Group</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                <span class="text-muted">Reporting Manager:</span>
                                <span class="fw-semibold text-dark" id="vmManager">Suresh Menon (VP Sales)</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                <span class="text-muted">Employment Type:</span>
                                <span class="badge bg-secondary-subtle text-secondary" id="vmEmpType">Full-time Regular</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between p-2 rounded bg-light">
                                <span class="text-muted">Field GPS Tracking:</span>
                                <span class="badge bg-success-subtle text-success"><i class="bi bi-check-circle me-1"></i>Active / Geofenced</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-top p-3 bg-light d-flex align-items-center justify-content-between">
                <a href="staff-visting-report.php" class="btn btn-outline-secondary btn-sm" id="vmVisitReportBtn">
                    <i class="bi bi-geo-alt me-1"></i> View Visiting Reports
                </a>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm" id="vmEditBtn">
                        <i class="bi bi-pencil me-1"></i> Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Edit Staff Member -->
<div class="modal fade" id="editStaffModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-dark mb-0">Edit Staff Profile</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editStaffForm">
                <input type="hidden" id="editEmpId">
                <div class="modal-body p-3">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Staff Name</label>
                        <input type="text" id="editName" class="form-control form-control-sm shadow-none" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Designation</label>
                        <select id="editRole" class="form-select form-select-sm shadow-none">
                            <option value="Enterprise AE">Enterprise AE</option>
                            <option value="Field Sales Officer">Field Sales Officer</option>
                            <option value="Sales Representative">Sales Representative</option>
                            <option value="Sales Manager">Sales Manager</option>
                            <option value="Support Engineer">Support Engineer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Branch</label>
                        <select id="editBranch" class="form-select form-select-sm shadow-none">
                            <option value="Bangalore HQ">Bangalore HQ</option>
                            <option value="Chennai Central">Chennai Central</option>
                            <option value="Mumbai South">Mumbai South</option>
                            <option value="Hyderabad">Hyderabad</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Monthly Target Quota (₹)</label>
                        <input type="number" id="editTarget" class="form-control form-control-sm shadow-none">
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label small fw-bold">Phone</label>
                            <input type="text" id="editPhone" class="form-control form-control-sm shadow-none">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold">Email</label>
                            <input type="email" id="editEmail" class="form-control form-control-sm shadow-none">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm px-3">Update Staff</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.staff-card {
    border: 1px solid rgba(0,0,0,0.06) !important;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.staff-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 0.5rem 1.25rem rgba(0,0,0,0.08) !important;
}
.fs-11 { font-size: 11px !important; }
.fs-12 { font-size: 12px !important; }
.fs-14 { font-size: 14px !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('staffSearchInput');
    const roleFilter = document.getElementById('roleFilter');
    const branchFilter = document.getElementById('branchFilter');
    const statusFilter = document.getElementById('statusFilter');
    const resetBtn = document.getElementById('resetStaffFilters');

    const btnViewGrid = document.getElementById('btnViewGrid');
    const btnViewTable = document.getElementById('btnViewTable');
    const gridView = document.getElementById('staffGridView');
    const tableView = document.getElementById('staffTableView');
    const cardContainer = document.getElementById('staffCardContainer');
    const tableBody = document.getElementById('staffTableBody');

    const viewModal = new bootstrap.Modal(document.getElementById('viewStaffModal'));
    const editModal = new bootstrap.Modal(document.getElementById('editStaffModal'));

    // Format currency to Indian Lakhs/Crores
    function formatCurrency(amt) {
        amt = parseInt(amt) || 0;
        if (amt >= 10000000) {
            return '₹' + (amt / 10000000).toFixed(2) + ' Cr';
        } else if (amt >= 100000) {
            return '₹' + (amt / 100000).toFixed(1) + 'L';
        }
        return '₹' + amt.toLocaleString('en-IN');
    }

    // Role badge color helper
    function getRoleBadge(role) {
        if (role.includes('Enterprise')) return { bg: 'rgba(1, 51, 118, 0.1)', color: '#013376' };
        if (role.includes('Manager')) return { bg: 'rgba(147, 51, 234, 0.1)', color: '#9333ea' };
        if (role.includes('Field')) return { bg: 'rgba(22, 163, 74, 0.1)', color: '#16a34a' };
        if (role.includes('Representative')) return { bg: 'rgba(2, 132, 199, 0.1)', color: '#0284c7' };
        return { bg: 'rgba(107, 114, 128, 0.1)', color: '#4b5563' };
    }

    // Prepend custom staff member into Card Grid & Table View
    function insertStaffMember(staff, isNewHighlight = false) {
        const badge = getRoleBadge(staff.role || '');
        const quotaDisplay = formatCurrency(staff.target || 500000);
        const attainmentPct = staff.attainmentPct || 0;
        const attainmentText = attainmentPct ? `${attainmentPct}%` : 'New Onboard (0%)';
        const barColor = attainmentPct >= 100 ? 'bg-success' : (attainmentPct > 50 ? 'bg-primary' : 'bg-warning');

        // Avatar HTML
        let avatarHtml = '';
        if (staff.avatarImg) {
            avatarHtml = `<img src="${staff.avatarImg}" alt="${staff.name}" class="rounded-circle object-fit-cover" style="width: 52px; height: 52px;">`;
        } else {
            avatarHtml = `
                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold text-white shadow-none" style="width: 52px; height: 52px; background: linear-gradient(135deg, #16a34a, #013376); font-size:18px;">
                    ${staff.initials || 'SM'}
                </div>
            `;
        }

        // Card Element
        const cardCol = document.createElement('div');
        cardCol.className = 'col-md-6 col-lg-4 col-xl-3 staff-card-item' + (isNewHighlight ? ' new-onboard-highlight' : '');
        cardCol.setAttribute('data-name', staff.name);
        cardCol.setAttribute('data-empid', staff.empid);
        cardCol.setAttribute('data-role', staff.role);
        cardCol.setAttribute('data-branch', staff.branch);
        cardCol.setAttribute('data-status', staff.status || 'Active');
        cardCol.innerHTML = `
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100 staff-card bg-white position-relative ${isNewHighlight ? 'border-primary border-2' : ''}">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="position-relative cursor-pointer staff-profile-trigger">
                        ${avatarHtml}
                        <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle" title="Active on Duty"></span>
                    </div>
                    <div class="min-w-0">
                        <div class="d-flex align-items-center gap-2">
                            <h6 class="fw-bold mb-0 text-truncate text-dark staff-profile-trigger" style="cursor:pointer;">${staff.name}</h6>
                            <span class="badge bg-light text-secondary border fs-11">${staff.empid}</span>
                        </div>
                        <span class="badge rounded-pill mt-1" style="background: ${badge.bg}; color: ${badge.color}; font-size:11px;">${staff.role}</span>
                        <div class="text-muted small mt-1 fs-12"><i class="bi bi-building me-1"></i>${staff.branch}</div>
                    </div>
                </div>

                <div class="p-2 rounded-2 bg-light mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1 fs-12">
                        <span class="text-muted">Quota Attainment:</span>
                        <span class="fw-bold text-success">${attainmentText} (${quotaDisplay})</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar ${barColor}" style="width: ${Math.min(100, attainmentPct || 10)}%;"></div>
                    </div>
                </div>

                <div class="row g-2 text-center mb-3 fs-12">
                    <div class="col-4 border-end">
                        <span class="d-block fw-bold text-dark fs-14">${staff.leads || 0}</span>
                        <span class="text-muted">Leads</span>
                    </div>
                    <div class="col-4 border-end">
                        <span class="d-block fw-bold text-dark fs-14">${staff.deals || 0}</span>
                        <span class="text-muted">Deals</span>
                    </div>
                    <div class="col-4">
                        <span class="d-block fw-bold text-dark fs-14">${staff.visits || 0}</span>
                        <span class="text-muted">Visits</span>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                    <div class="d-flex gap-2">
                        <a href="tel:${staff.phone}" class="btn btn-sm btn-light border p-1 px-2 rounded-2" title="Call ${staff.name}"><i class="bi bi-telephone text-primary"></i></a>
                        <a href="mailto:${staff.email}" class="btn btn-sm btn-light border p-1 px-2 rounded-2" title="Email ${staff.name}"><i class="bi bi-envelope text-primary"></i></a>
                    </div>
                    <div class="d-flex gap-1">
                        <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2 btn-view-staff" data-empid="${staff.empid}" style="border-radius:6px; font-size:12px;">View</button>
                        <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 btn-edit-staff" data-name="${staff.name}" data-empid="${staff.empid}" data-role="${staff.role}" data-branch="${staff.branch}" data-target="${staff.target || 500000}" data-phone="${staff.phone}" data-email="${staff.email}" style="border-radius:6px; font-size:12px;">Edit</button>
                    </div>
                </div>
            </div>
        `;
        cardContainer.prepend(cardCol);

        // Table Row Element
        const tr = document.createElement('tr');
        tr.className = 'staff-row' + (isNewHighlight ? ' table-success' : '');
        tr.setAttribute('data-name', staff.name);
        tr.setAttribute('data-empid', staff.empid);
        tr.setAttribute('data-role', staff.role);
        tr.setAttribute('data-branch', staff.branch);
        tr.setAttribute('data-status', staff.status || 'Active');
        tr.innerHTML = `
            <td class="ps-3 fw-bold text-secondary">${staff.empid}</td>
            <td>
                <div class="d-flex align-items-center gap-2 staff-profile-trigger" style="cursor:pointer;">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:36px; height:36px; background:linear-gradient(135deg, #16a34a, #013376); font-size:13px;">
                        ${staff.initials || 'SM'}
                    </div>
                    <div>
                        <div class="fw-bold text-dark">${staff.name}</div>
                        <div class="text-muted fs-11">${staff.email}</div>
                    </div>
                </div>
            </td>
            <td><span class="badge rounded-pill" style="background: ${badge.bg}; color: ${badge.color};">${staff.role}</span></td>
            <td>${staff.branch}</td>
            <td>${staff.phone}</td>
            <td>
                <div class="fw-bold text-success fs-12">${attainmentText} (${quotaDisplay})</div>
                <div class="progress" style="height:4px; width:100px;">
                    <div class="progress-bar ${barColor}" style="width:${Math.min(100, attainmentPct || 10)}%;"></div>
                </div>
            </td>
            <td><span class="badge bg-light text-dark border">${staff.leads || 0} Leads</span></td>
            <td><span class="badge bg-success-subtle text-success">${staff.status || 'Active'}</span></td>
            <td class="text-end pe-3">
                <button type="button" class="btn btn-sm btn-light border py-1 px-2 btn-view-staff" data-empid="${staff.empid}" title="View Profile"><i class="bi bi-eye"></i></button>
                <button type="button" class="btn btn-sm btn-light border py-1 px-2 btn-edit-staff" data-name="${staff.name}" data-empid="${staff.empid}" data-role="${staff.role}" data-branch="${staff.branch}" data-target="${staff.target || 500000}" data-phone="${staff.phone}" data-email="${staff.email}" title="Edit"><i class="bi bi-pencil"></i></button>
            </td>
        `;
        tableBody.prepend(tr);

        // Bind interactive events for new elements
        bindStaffEvents(cardCol);
        bindStaffEvents(tr);
        updateCounters();
    }

    // Update Strength KPIs
    function updateCounters() {
        const totalCards = document.querySelectorAll('.staff-card-item').length;
        const activeCards = document.querySelectorAll('.staff-card-item[data-status="Active"]').length;
        const pillBadge = document.querySelector('.badge.rounded-pill[style*="#16a34a"]');
        if (pillBadge) pillBadge.textContent = `${activeCards} Active Reps`;
        const kpiTotal = document.querySelector('.card h3.fw-bold');
        if (kpiTotal && kpiTotal.textContent.includes('Members')) {
            kpiTotal.textContent = `${totalCards} Members`;
        }
    }

    // Load stored custom staff from localStorage
    try {
        const stored = JSON.parse(localStorage.getItem('gharuda_custom_staff') || '[]');
        stored.forEach(staff => insertStaffMember(staff, false));
    } catch(err) {
        console.error('Error loading custom staff:', err);
    }

    // Check if coming from staff-create.php with a newly added member
    const newStaffDataStr = sessionStorage.getItem('newStaffAdded');
    if (newStaffDataStr) {
        try {
            const newStaff = JSON.parse(newStaffDataStr);
            const descEl = document.getElementById('newStaffAlertDesc');
            if (descEl) {
                descEl.innerHTML = `<strong>${newStaff.name} (${newStaff.empid})</strong> has been successfully registered as <em>${newStaff.role}</em> at <em>${newStaff.branch}</em>.`;
            }
            // If not already in container
            if (!document.querySelector(`.staff-card-item[data-empid="${newStaff.empid}"]`)) {
                insertStaffMember(newStaff, true);
            }
            sessionStorage.removeItem('newStaffAdded');
        } catch(e){}
    }

    // View switcher
    btnViewGrid.addEventListener('click', function () {
        btnViewGrid.classList.add('active');
        btnViewTable.classList.remove('active');
        gridView.classList.remove('d-none');
        tableView.classList.add('d-none');
    });

    btnViewTable.addEventListener('click', function () {
        btnViewTable.classList.add('active');
        btnViewGrid.classList.remove('active');
        tableView.classList.remove('d-none');
        gridView.classList.add('d-none');
    });

    // Filtering logic
    function applyFilters() {
        const query = (searchInput.value || '').trim().toLowerCase();
        const role = roleFilter.value;
        const branch = branchFilter.value;
        const status = statusFilter.value;

        // Filter cards
        document.querySelectorAll('.staff-card-item').forEach(card => {
            const cName = (card.getAttribute('data-name') || '').toLowerCase();
            const cEmpId = (card.getAttribute('data-empid') || '').toLowerCase();
            const cRole = card.getAttribute('data-role') || '';
            const cBranch = card.getAttribute('data-branch') || '';
            const cStatus = card.getAttribute('data-status') || '';

            const matchQuery = !query || cName.includes(query) || cEmpId.includes(query);
            const matchRole = !role || cRole.toLowerCase().includes(role.toLowerCase());
            const matchBranch = !branch || cBranch.toLowerCase().includes(branch.toLowerCase());
            const matchStatus = !status || cStatus.toLowerCase() === status.toLowerCase();

            if (matchQuery && matchRole && matchBranch && matchStatus) {
                card.classList.remove('d-none');
            } else {
                card.classList.add('d-none');
            }
        });

        // Filter table rows
        document.querySelectorAll('.staff-row').forEach(row => {
            const rName = (row.getAttribute('data-name') || '').toLowerCase();
            const rEmpId = (row.getAttribute('data-empid') || '').toLowerCase();
            const rRole = row.getAttribute('data-role') || '';
            const rBranch = row.getAttribute('data-branch') || '';
            const rStatus = row.getAttribute('data-status') || '';

            const matchQuery = !query || rName.includes(query) || rEmpId.includes(query);
            const matchRole = !role || rRole.toLowerCase().includes(role.toLowerCase());
            const matchBranch = !branch || rBranch.toLowerCase().includes(branch.toLowerCase());
            const matchStatus = !status || rStatus.toLowerCase() === status.toLowerCase();

            if (matchQuery && matchRole && matchBranch && matchStatus) {
                row.classList.remove('d-none');
            } else {
                row.classList.add('d-none');
            }
        });
    }

    searchInput.addEventListener('input', applyFilters);
    roleFilter.addEventListener('change', applyFilters);
    branchFilter.addEventListener('change', applyFilters);
    statusFilter.addEventListener('change', applyFilters);

    resetBtn.addEventListener('click', function () {
        searchInput.value = '';
        roleFilter.value = '';
        branchFilter.value = '';
        statusFilter.value = '';
        applyFilters();
    });

    // Populate and open View Profile modal
    function openViewModal(empid) {
        const card = document.querySelector(`.staff-card-item[data-empid="${empid}"]`);
        if (!card) return;
        const name = card.getAttribute('data-name') || '';
        const role = card.getAttribute('data-role') || '';
        const branch = card.getAttribute('data-branch') || '';
        const status = card.getAttribute('data-status') || 'Active';
        const editBtn = card.querySelector('.btn-edit-staff');
        const phone = editBtn ? editBtn.getAttribute('data-phone') : '+91 98450 12345';
        const email = editBtn ? editBtn.getAttribute('data-email') : 'staff@gharuda.com';
        const target = editBtn ? editBtn.getAttribute('data-target') : '1000000';

        document.getElementById('vmName').textContent = name;
        document.getElementById('vmEmpId').textContent = empid;
        document.getElementById('vmStatus').textContent = status;
        document.getElementById('vmRole').textContent = role;
        document.getElementById('vmBranch').textContent = branch;
        document.getElementById('vmBranchDetail').textContent = branch;
        document.getElementById('vmPhone').textContent = phone;
        document.getElementById('vmEmail').textContent = email;
        document.getElementById('vmQuota').textContent = formatCurrency(target);
        
        // Clean initials
        const parts = name.trim().split(/\s+/);
        const initials = parts.length > 1 ? (parts[0][0] + parts[parts.length - 1][0]).toUpperCase() : parts[0].substring(0,2).toUpperCase();
        document.getElementById('vmInitials').textContent = initials;

        document.getElementById('vmCallLink').href = `tel:${phone}`;
        document.getElementById('vmWaLink').href = `https://wa.me/${phone.replace(/[^0-9]/g, '')}`;
        document.getElementById('vmEmailLink').href = `mailto:${email}`;

        // Link Edit Button to open edit modal
        document.getElementById('vmEditBtn').onclick = function() {
            viewModal.hide();
            setTimeout(() => {
                openEditModal(empid, name, role, branch, target, phone, email);
            }, 300);
        };

        viewModal.show();
    }

    // Populate and open Edit modal
    function openEditModal(empid, name, role, branch, target, phone, email) {
        document.getElementById('editEmpId').value = empid || '';
        document.getElementById('editName').value = name || '';
        document.getElementById('editRole').value = role || '';
        document.getElementById('editBranch').value = branch || '';
        document.getElementById('editTarget').value = target || '';
        document.getElementById('editPhone').value = phone || '';
        document.getElementById('editEmail').value = email || '';
        editModal.show();
    }

    // Event binder for cards and table rows
    function bindStaffEvents(scopeEl) {
        scopeEl.querySelectorAll('.btn-edit-staff').forEach(btn => {
            btn.onclick = function (e) {
                e.stopPropagation();
                const container = this.closest('[data-empid]');
                const empid = this.getAttribute('data-empid') || (container ? container.getAttribute('data-empid') : '');
                openEditModal(
                    empid,
                    this.getAttribute('data-name') || (container ? container.getAttribute('data-name') : ''),
                    this.getAttribute('data-role') || (container ? container.getAttribute('data-role') : ''),
                    this.getAttribute('data-branch') || (container ? container.getAttribute('data-branch') : ''),
                    this.getAttribute('data-target') || '1000000',
                    this.getAttribute('data-phone') || '+91 98450 12345',
                    this.getAttribute('data-email') || 'staff@gharuda.com'
                );
            };
        });

        // Make avatar, staff name, or any .btn-view-staff trigger View Profile modal
        scopeEl.querySelectorAll('.staff-card-item, .staff-row').forEach(container => {
            const empid = container.getAttribute('data-empid');
            if (!empid) return;

            // Name
            const nameEl = container.querySelector('h6, .fw-bold.text-dark');
            if (nameEl) {
                nameEl.style.cursor = 'pointer';
                nameEl.title = 'Click to view full profile';
                nameEl.onclick = function(e) {
                    e.stopPropagation();
                    openViewModal(empid);
                };
            }

            // Avatar
            const avatarEl = container.querySelector('img, .rounded-circle');
            if (avatarEl) {
                avatarEl.style.cursor = 'pointer';
                avatarEl.title = 'Click to view full profile';
                avatarEl.onclick = function(e) {
                    e.stopPropagation();
                    openViewModal(empid);
                };
            }

            // Existing or dynamic View buttons
            container.querySelectorAll('.btn-view-staff').forEach(btn => {
                btn.onclick = function(e) {
                    e.stopPropagation();
                    openViewModal(empid);
                };
            });
        });
    }

    // Bind all initial elements
    bindStaffEvents(document);

    // Edit modal submit
    document.getElementById('editStaffForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const empid = document.getElementById('editEmpId').value;
        const name = document.getElementById('editName').value.trim();
        const role = document.getElementById('editRole').value;
        const branch = document.getElementById('editBranch').value;
        const target = document.getElementById('editTarget').value;
        const phone = document.getElementById('editPhone').value.trim();
        const email = document.getElementById('editEmail').value.trim();

        // Update Card
        const card = document.querySelector(`.staff-card-item[data-empid="${empid}"]`);
        if (card) {
            card.setAttribute('data-name', name);
            card.setAttribute('data-role', role);
            card.setAttribute('data-branch', branch);
            const nameEl = card.querySelector('.staff-profile-trigger h6');
            if (nameEl) nameEl.textContent = name;
            const roleEl = card.querySelector('.badge.rounded-pill');
            if (roleEl) {
                const badge = getRoleBadge(role);
                roleEl.textContent = role;
                roleEl.style.background = badge.bg;
                roleEl.style.color = badge.color;
            }
            const branchEl = card.querySelector('.fs-12 i.bi-building')?.parentElement;
            if (branchEl) branchEl.innerHTML = `<i class="bi bi-building me-1"></i>${branch}`;
            const editBtn = card.querySelector('.btn-edit-staff');
            if (editBtn) {
                editBtn.setAttribute('data-name', name);
                editBtn.setAttribute('data-role', role);
                editBtn.setAttribute('data-branch', branch);
                editBtn.setAttribute('data-target', target);
                editBtn.setAttribute('data-phone', phone);
                editBtn.setAttribute('data-email', email);
            }
        }

        // Update Table Row
        const row = document.querySelector(`.staff-row[data-empid="${empid}"]`);
        if (row) {
            row.setAttribute('data-name', name);
            row.setAttribute('data-role', role);
            row.setAttribute('data-branch', branch);
            const nameEl = row.querySelector('.fw-bold.text-dark');
            if (nameEl) nameEl.textContent = name;
            const emailEl = row.querySelector('.text-muted.fs-11');
            if (emailEl) emailEl.textContent = email;
            const roleEl = row.querySelector('.badge.rounded-pill');
            if (roleEl) {
                const badge = getRoleBadge(role);
                roleEl.textContent = role;
                roleEl.style.background = badge.bg;
                roleEl.style.color = badge.color;
            }
            const branchCell = row.children[3];
            if (branchCell) branchCell.textContent = branch;
            const phoneCell = row.children[4];
            if (phoneCell) phoneCell.textContent = phone;
            const editBtn = row.querySelector('.btn-edit-staff');
            if (editBtn) {
                editBtn.setAttribute('data-name', name);
                editBtn.setAttribute('data-role', role);
                editBtn.setAttribute('data-branch', branch);
                editBtn.setAttribute('data-target', target);
                editBtn.setAttribute('data-phone', phone);
                editBtn.setAttribute('data-email', email);
            }
        }

        // Update localStorage if custom
        try {
            let stored = JSON.parse(localStorage.getItem('gharuda_custom_staff') || '[]');
            const idx = stored.findIndex(s => s.empid === empid);
            if (idx !== -1) {
                stored[idx].name = name;
                stored[idx].role = role;
                stored[idx].branch = branch;
                stored[idx].target = parseInt(target) || 500000;
                stored[idx].phone = phone;
                stored[idx].email = email;
                localStorage.setItem('gharuda_custom_staff', JSON.stringify(stored));
            }
        } catch(err){}

        editModal.hide();
        alert(`Profile for ${name} (${empid}) has been updated successfully!`);
    });

    // Quick Add modal submit handler
    const addStaffModalEl = document.getElementById('addStaffModal');
    if (addStaffModalEl) {
        const addModal = new bootstrap.Modal(addStaffModalEl);
        const addFormEl = document.getElementById('addStaffForm');
        if (addFormEl) {
            addFormEl.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(addFormEl);
                const name = formData.get('name').trim();
                const empid = formData.get('empid').trim();
                const email = formData.get('email').trim();
                const phone = formData.get('phone').trim();
                const role = formData.get('role');
                const branch = formData.get('branch');
                const target = parseInt(formData.get('target')) || 1000000;
                const status = formData.get('status') || 'Active';

                const parts = name.split(/\s+/);
                const initials = parts.length > 1 ? (parts[0][0] + parts[parts.length - 1][0]).toUpperCase() : parts[0].substring(0, 2).toUpperCase();

                const newStaff = {
                    name,
                    empid,
                    email,
                    phone: phone.startsWith('+91') ? phone : '+91 ' + phone,
                    role,
                    branch,
                    target,
                    status,
                    initials,
                    leads: 0,
                    deals: 0,
                    visits: 0,
                    attainmentPct: 0
                };

                try {
                    let stored = JSON.parse(localStorage.getItem('gharuda_custom_staff') || '[]');
                    stored = stored.filter(s => s.empid !== empid);
                    stored.unshift(newStaff);
                    localStorage.setItem('gharuda_custom_staff', JSON.stringify(stored));
                } catch(err){}

                insertStaffMember(newStaff, true);
                addFormEl.reset();
                addModal.hide();
                alert(`New staff member ${name} (${empid}) onboarded successfully!`);
            });
        }
    }

    // Export Staff Directory to CSV
    document.getElementById('exportStaffCsv')?.addEventListener('click', function(e) {
        e.preventDefault();
        const rows = [];
        rows.push(['Emp ID', 'Staff Name', 'Designation', 'Branch', 'Mobile', 'Email', 'Monthly Quota', 'Status']);
        
        document.querySelectorAll('.staff-card-item').forEach(card => {
            const empid = card.getAttribute('data-empid') || '';
            const name = card.getAttribute('data-name') || '';
            const role = card.getAttribute('data-role') || '';
            const branch = card.getAttribute('data-branch') || '';
            const status = card.getAttribute('data-status') || '';
            const editBtn = card.querySelector('.btn-edit-staff');
            const phone = editBtn ? editBtn.getAttribute('data-phone') : '';
            const email = editBtn ? editBtn.getAttribute('data-email') : '';
            const target = editBtn ? editBtn.getAttribute('data-target') : '';
            rows.push([empid, `"${name}"`, `"${role}"`, `"${branch}"`, `"${phone}"`, `"${email}"`, target, status]);
        });

        const csvContent = "data:text/csv;charset=utf-8," + rows.map(r => r.join(',')).join('\n');
        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", `Gharuda_Staff_Directory_${new Date().toISOString().slice(0,10)}.csv`);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    // Print Staff Directory
    document.getElementById('printStaffDirectory')?.addEventListener('click', function(e) {
        e.preventDefault();
        // Switch to table view for cleaner printing
        btnViewTable.click();
        setTimeout(() => window.print(), 250);
    });
});
</script>

<?php include 'footer.php'; ?>
