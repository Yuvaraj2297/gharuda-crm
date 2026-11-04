<?php include 'header.php'; ?>
<!-- Leaflet (map) -->
<link rel="stylesheet" href="./assets/css/leaflet.css">

<main class="lm-page py-3 pb-5">
    <div class="container-fluid px-3 px-md-4">

        <!-- Page Header & Action Bar in Single Row (lead.php & follow-up-list.php style, no breadcrumb) -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
            <!-- LEFT: Icon badge + Title -->
            <div class="d-flex align-items-center gap-2.5">
                <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;font-size:18px;">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div>
                    <h1 class="font-display fw-bold mb-0 page-title fs-4">Staff Location Map</h1>
                    <span class="text-muted font-11 d-none d-sm-inline">Monitor real-time field staff routes, GPS check-ins, visit logs &amp; daily travel metrics</span>
                </div>
            </div>

            <!-- RIGHT: Actions in Single Row -->
            <div class="d-flex align-items-center flex-wrap gap-2">
                <div class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="lmStatusToggle" role="tablist">
                    <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold active" data-status="all">All Staff</button>
                    <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold" data-status="online">Online</button>
                    <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold" data-status="offline">Offline</button>
                </div>
                <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="offcanvas" data-bs-target="#lmFilterOffcanvas" aria-controls="lmFilterOffcanvas" id="lmOffcanvasFilterBtn">
                    <i class="bi bi-funnel"></i><span>Filters</span>
                    <span class="badge bg-primary rounded-pill d-none" id="lmFilterCountBadge">0</span>
                </button>
                <div class="dropdown">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                        <i class="bi bi-lightning-charge-fill"></i><span>Actions</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu" style="min-width: 240px;">
                        <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Quick Actions</li>
                        <li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" id="lmJumpToMapBtn"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-map"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Live Route Map</div><div class="text-muted" style="font-size:10px;">Jump to GPS map &amp; timeline</div></div></button></li>
                        <li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" id="lmRefreshMapBtn"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-arrow-clockwise"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Refresh Locations</div><div class="text-muted" style="font-size:10px;">Sync latest GPS pings</div></div></button></li>
                        <li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="appointments.php"><span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-calendar2-week"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Schedule Field Visit</div><div class="text-muted" style="font-size:10px;">Assign client appointment</div></div></a></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="lead.php"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-person-lines-fill"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Back to Leads</div><div class="text-muted" style="font-size:10px;">View all leads pipeline</div></div></a></li>
                    </ul>
                </div>
                <div class="lm-date-range ms-1 d-none d-md-inline-flex">
                    <i class="bi bi-calendar3 me-1"></i><span id="lmHeaderDate"></span>
                </div>
            </div>
        </div>

        <div id="leadMapWrap">

            <!-- Table (toolbar auto-created by datatable class) -->
            <div class="card-custom p-0 mb-4" style="overflow: visible;">
                <div class="table-responsive table-modern-wrap overflow-auto column-border">
                    <table class="table-modern w-100 mb-0 datatable" id="leadMapTable" data-table-name="Staff Location">
                        <thead>
                            <tr>
                                <th class="ps-3" style="width: 60px;">S.No</th>
                                <th class="text-nowrap">Id</th>
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Login Time</th>
                                <th class="text-nowrap">Login Area</th>
                                <th class="text-nowrap">Logout Time</th>
                                <th class="text-nowrap">Logout Area</th>
                                <th class="text-nowrap text-center">Tot. Visit</th>
                                <th class="text-nowrap">Tot. Kms</th>
                                <th class="text-nowrap">Battery</th>
                                <th class="text-nowrap text-center">Status</th>
                                <th class="text-nowrap text-end pe-3" style="width: 110px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="leadMapTbody" class="small">
                            <?php
                            $staffRows = [
                                ['sno' => 1,  'id' => 'GHRA0011', 'name' => 'GHRAUDA SOFTWARE', 'login' => '09:02 AM', 'loginArea' => 'Nungambakkam', 'logout' => '06:15 PM', 'logoutArea' => 'T. Nagar',    'visits' => 5, 'kms' => '32.4 km', 'battery' => '78 %', 'online' => true],
                                ['sno' => 2,  'id' => '1234',     'name' => 'thilak ma',        'login' => '09:30 AM', 'loginArea' => 'Anna Nagar',   'logout' => '05:45 PM', 'logoutArea' => 'Koyambedu',   'visits' => 3, 'kms' => '18.7 km', 'battery' => '54 %', 'online' => true],
                                ['sno' => 3,  'id' => 'GHRA0012', 'name' => 'ARUN KUMAR',       'login' => '08:55 AM', 'loginArea' => 'Guindy',       'logout' => '06:00 PM', 'logoutArea' => 'Adyar',       'visits' => 6, 'kms' => '41.2 km', 'battery' => '66 %', 'online' => false],
                                ['sno' => 4,  'id' => 'GHRA0013', 'name' => 'MOHAN RAJ',        'login' => '09:10 AM', 'loginArea' => 'Velachery',    'logout' => '05:30 PM', 'logoutArea' => 'Tambaram',    'visits' => 4, 'kms' => '27.9 km', 'battery' => '91 %', 'online' => true],
                                ['sno' => 5,  'id' => 'GHRA0014', 'name' => 'PRIYA DHARSHINI',  'login' => '09:45 AM', 'loginArea' => 'Mylapore',     'logout' => '06:20 PM', 'logoutArea' => 'Egmore',      'visits' => 7, 'kms' => '35.0 km', 'battery' => '43 %', 'online' => false],
                                ['sno' => 6,  'id' => 'GHRA0015', 'name' => 'SURESH BABU',      'login' => 'Nill',     'loginArea' => 'Nill',         'logout' => 'Nill',     'logoutArea' => 'Nill',        'visits' => 0, 'kms' => '0 km',    'battery' => '0 %',  'online' => false],
                                ['sno' => 7,  'id' => 'GHRA0016', 'name' => 'DIVYA LAKSHMI',    'login' => '10:00 AM', 'loginArea' => 'Porur',        'logout' => '06:05 PM', 'logoutArea' => 'Vadapalani',  'visits' => 2, 'kms' => '14.3 km', 'battery' => '82 %', 'online' => true],
                                ['sno' => 8,  'id' => 'GHRA0017', 'name' => 'KARTHIK RAJA',     'login' => '09:20 AM', 'loginArea' => 'Perambur',     'logout' => '05:50 PM', 'logoutArea' => 'Tondiarpet',  'visits' => 5, 'kms' => '29.6 km', 'battery' => '60 %', 'online' => true],
                                ['sno' => 9,  'id' => 'GHRA0018', 'name' => 'NANDHINI S',       'login' => 'Nill',     'loginArea' => 'Nill',         'logout' => 'Nill',     'logoutArea' => 'Nill',        'visits' => 0, 'kms' => '0 km',    'battery' => '0 %',  'online' => false],
                                ['sno' => 10, 'id' => 'GHRA0019', 'name' => 'VIGNESH R',        'login' => '09:05 AM', 'loginArea' => 'Ashok Nagar',  'logout' => '06:30 PM', 'logoutArea' => 'Saidapet',    'visits' => 6, 'kms' => '38.1 km', 'battery' => '37 %', 'online' => false],
                                ['sno' => 11, 'id' => 'GHRA0020', 'name' => 'SANTHOSH M',       'login' => '09:40 AM', 'loginArea' => 'Kodambakkam',  'logout' => '05:55 PM', 'logoutArea' => 'Ambattur',    'visits' => 3, 'kms' => '21.5 km', 'battery' => '72 %', 'online' => true],
                            ];
                            foreach ($staffRows as $r):
                                $sid = htmlspecialchars($r['id'], ENT_QUOTES, 'UTF-8');
                                $sname = htmlspecialchars($r['name'], ENT_QUOTES, 'UTF-8');
                                $visitBtnClass = $r['visits'] > 0 ? 'btn-outline-primary' : 'btn-outline-secondary';
                                $statusBg = $r['online'] ? 'bg-success' : 'bg-danger';
                                $statusTitle = $r['online'] ? 'Online' : 'Offline';
                            ?>
                            <tr data-id="<?php echo $sid; ?>" data-online="<?php echo $r['online'] ? 'online' : 'offline'; ?>" data-area="<?php echo htmlspecialchars($r['loginArea'] . ' ' . $r['logoutArea'], ENT_QUOTES, 'UTF-8'); ?>" data-visits="<?php echo (int)$r['visits']; ?>">
                                <td class="ps-3"><?php echo (int)$r['sno']; ?></td>
                                <td class="fw-semibold"><?php echo $sid; ?></td>
                                <td><a href="#" class="lm-staff-name" data-id="<?php echo $sid; ?>"><?php echo $sname; ?></a></td>
                                <td><?php echo htmlspecialchars($r['login']); ?></td>
                                <td><?php echo htmlspecialchars($r['loginArea']); ?></td>
                                <td><?php echo htmlspecialchars($r['logout']); ?></td>
                                <td><?php echo htmlspecialchars($r['logoutArea']); ?></td>
                                <td class="text-center"><button type="button" class="btn btn-sm <?php echo $visitBtnClass; ?> py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="<?php echo $sid; ?>"><?php echo (int)$r['visits']; ?></button></td>
                                <td><?php echo htmlspecialchars($r['kms']); ?></td>
                                <td><?php echo htmlspecialchars($r['battery']); ?></td>
                                <td class="text-center"><span class="badge rounded-circle p-1 <?php echo $statusBg; ?> d-inline-block" style="width:10px;height:10px;" title="<?php echo $statusTitle; ?>"><span class="visually-hidden"><?php echo $statusTitle; ?></span></span></td>
                                <td class="text-end pe-3">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                                            <span>Actions</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">
                                            <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Staff Location Actions</li>
                                            <li>
                                                <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-staff-360" data-id="<?php echo $sid; ?>">
                                                    <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-person-vcard"></i></span>
                                                    <div class="text-start">
                                                        <div class="fw-semibold text-dark font-12">Staff 360° Summary</div>
                                                        <div class="text-muted" style="font-size: 10px;">Route overview, stats &amp; logs</div>
                                                    </div>
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-view-map" data-id="<?php echo $sid; ?>">
                                                    <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-geo-alt-fill"></i></span>
                                                    <div class="text-start">
                                                        <div class="fw-semibold text-dark font-12">View Route on Map</div>
                                                        <div class="text-muted" style="font-size: 10px;">Focus GPS path &amp; timeline</div>
                                                    </div>
                                                </button>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="appointments.php?staff=<?php echo urlencode($r['name']); ?>">
                                                    <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-calendar2-week"></i></span>
                                                    <div class="text-start">
                                                        <div class="fw-semibold text-dark font-12">Assign Field Visit</div>
                                                        <div class="text-muted" style="font-size: 10px;">Schedule client meeting</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="follow-up-list.php">
                                                    <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-arrow-repeat"></i></span>
                                                    <div class="text-start">
                                                        <div class="fw-semibold text-dark font-12">View Follow-Ups</div>
                                                        <div class="text-muted" style="font-size: 10px;">Check assigned call reminders</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider my-1"></li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="lead.php">
                                                    <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-person-lines-fill"></i></span>
                                                    <div class="text-start">
                                                        <div class="fw-semibold text-dark font-12">View Assigned Leads</div>
                                                        <div class="text-muted" style="font-size: 10px;">Open pipeline records</div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Map + Timeline Section -->
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white p-3 mb-4" id="mapSection">
                <div class="p-2.5 px-3 mb-3 bg-light rounded-3 border d-flex align-items-center justify-content-between flex-wrap gap-2" id="mapTitle">
                    <div class="fw-bold text-dark small d-flex align-items-center gap-2">
                        <i class="bi bi-map-fill text-primary fs-5"></i>
                        <span>Staff Route View: <span id="mapUserName" class="text-primary">GHRAUDA SOFTWARE</span> (<span id="mapUserId">GHRA0011</span>)</span>
                    </div>
                    <span class="badge bg-secondary rounded-pill" id="mapDate">--</span>
                </div>

                <div class="row g-3">
                    <div class="col-lg-8 col-12">
                        <div id="leadMap" class="rounded-3 border overflow-hidden shadow-sm" style="width: 100%; height: 520px;"></div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="card border rounded-3 h-100 bg-light-subtle d-flex flex-column">
                            <div class="p-3 border-bottom bg-white d-flex align-items-center justify-content-between rounded-top-3">
                                <span class="fw-bold text-dark small"><i class="bi bi-clock-history me-1 text-primary"></i> Daily Activity Timeline</span>
                                <span class="badge bg-primary rounded-pill" id="timelineCount">7</span>
                            </div>
                            <div class="p-3 overflow-auto flex-grow-1" style="max-height: 460px;">
                                <div class="list-group list-group-flush gap-2" id="timelineList">
                                    <!-- Populated dynamically by renderTimeline() -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>

<!-- ===== Staff Location Filter Offcanvas (lead.php & follow-up-list.php style) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="lmFilterOffcanvas" aria-labelledby="lmFilterOffcanvasLabel" style="width: 380px;">
    <div class="offcanvas-header border-bottom py-3 px-3">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2 mb-0" id="lmFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Staff Locations
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <form id="filterForm" onsubmit="return false;">
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filter_date">Tracking Date</label>
                <input type="text" class="date-input form-control form-control-sm" id="filter_date" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filter_staff">Staff Member</label>
                <select class="form-select select2 form-select-sm" id="filter_staff">
                    <option value="">All Staff Members</option>
                    <option value="GHRA0011">GHRAUDA SOFTWARE (GHRA0011)</option>
                    <option value="1234">thilak ma (1234)</option>
                    <option value="GHRA0012">ARUN KUMAR (GHRA0012)</option>
                    <option value="GHRA0013">MOHAN RAJ (GHRA0013)</option>
                    <option value="GHRA0014">PRIYA DHARSHINI (GHRA0014)</option>
                    <option value="GHRA0015">SURESH BABU (GHRA0015)</option>
                    <option value="GHRA0016">DIVYA LAKSHMI (GHRA0016)</option>
                    <option value="GHRA0017">KARTHIK RAJA (GHRA0017)</option>
                    <option value="GHRA0018">NANDHINI S (GHRA0018)</option>
                    <option value="GHRA0019">VIGNESH R (GHRA0019)</option>
                    <option value="GHRA0020">SANTHOSH M (GHRA0020)</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filter_status">Tracking Status</label>
                <select class="form-select select2 form-select-sm" id="filter_status">
                    <option value="">All Statuses</option>
                    <option value="online">Online Only</option>
                    <option value="offline">Offline Only</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filter_area">Area / Zone</label>
                <select class="form-select select2 form-select-sm" id="filter_area">
                    <option value="">All Zones</option>
                    <option value="Nungambakkam">Nungambakkam</option>
                    <option value="T. Nagar">T. Nagar</option>
                    <option value="Anna Nagar">Anna Nagar</option>
                    <option value="Guindy">Guindy</option>
                    <option value="Velachery">Velachery</option>
                    <option value="Mylapore">Mylapore</option>
                    <option value="Porur">Porur</option>
                    <option value="Perambur">Perambur</option>
                    <option value="Ashok Nagar">Ashok Nagar</option>
                    <option value="Kodambakkam">Kodambakkam</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-muted small fw-bold mb-1" for="filter_min_visits">Minimum Visits</label>
                <select class="form-select select2 form-select-sm" id="filter_min_visits">
                    <option value="0">Any Visit Count</option>
                    <option value="1">1+ Visits</option>
                    <option value="3">3+ Visits</option>
                    <option value="5">5+ Visits</option>
                </select>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2 bg-light-subtle">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" id="btnReset">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" id="btnSearch">
            <i class="bi bi-funnel me-1"></i> Apply Filters
        </button>
    </div>
</div>

<!-- ===== Staff 360° Location & Route Detail Modal ===== -->
<div class="modal fade" id="lmDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-person-Check fs-5 bi-person-badge"></i>
                    </span>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-5" id="lmModalName">Staff Details</h5>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill font-11 px-2.5 py-0.5" id="lmModalId">GHRA0011</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5" id="lmModalStatus">Online</span>
                        </div>
                        <div class="small text-muted" id="lmModalSubtitle">Daily Field Route &amp; Check-In Overview</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-white">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Total Visits</span>
                            <h6 class="fw-bold text-primary mb-0 fs-6" id="lmModalVisits">0 Visits</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Distance Travelled</span>
                            <h6 class="fw-bold text-success mb-0 fs-6" id="lmModalKms">0 km</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Device Battery</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="lmModalBattery">0 %</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Tracking Date</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="lmModalDate">--</h6>
                        </div>
                    </div>
                </div>

                <div class="card border border-light-subtle rounded-3 p-3 mb-4">
                    <h6 class="fw-bold text-dark mb-3 font-13 text-uppercase" style="letter-spacing:0.5px;">
                        <i class="bi bi-clock-history text-primary me-1.5"></i>Check-In &amp; Check-Out Summary
                    </h6>
                    <div class="row g-3 font-13">
                        <div class="col-sm-6">
                            <div class="text-muted small">Login Time &amp; Area</div>
                            <div class="fw-semibold text-dark mt-0.5" id="lmModalLogin">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Logout Time &amp; Area</div>
                            <div class="fw-semibold text-dark mt-0.5" id="lmModalLogout">—</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">
                    <span class="text-muted small fw-semibold">Quick Actions:</span>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="button" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1.5 fw-semibold font-12" id="lmModalFocusMapBtn">
                            <i class="bi bi-geo-alt-fill"></i> Focus on Live Map
                        </button>
                        <a href="appointments.php" id="lmModalAssignVisitBtn" class="btn btn-sm btn-outline-warning d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-calendar2-week"></i> Assign Field Visit
                        </a>
                        <a href="lead.php" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-person-lines-fill"></i> View Leads
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light-subtle py-2.5 px-4 border-top">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet JS -->
<script src="./assets/js/leaflet.js"></script>
<script>
    (function() {
        'use strict';

        // ---------- Dummy data ----------
        var TL = {
            login: {
                icon: 'bi-box-arrow-in-right',
                label: 'Login',
                color: '#1fb141'
            },
            visit: {
                icon: 'bi-geo-alt-fill',
                label: 'Visit',
                color: '#3b9bff'
            },
            idle: {
                icon: 'bi-cup-hot-fill',
                label: 'Idle',
                color: '#f0a500'
            },
            logout: {
                icon: 'bi-box-arrow-right',
                label: 'Logout',
                color: '#e60000'
            }
        };

        var users = [{
                id: 'GHRA0011',
                name: 'GHRAUDA SOFTWARE',
                login: '09:02 AM',
                loginArea: 'Nungambakkam',
                logout: '06:15 PM',
                logoutArea: 'T. Nagar',
                visits: 5,
                kms: 32.4,
                battery: 78,
                online: true
            },
            {
                id: '1234',
                name: 'thilak ma',
                login: '09:30 AM',
                loginArea: 'Anna Nagar',
                logout: '05:45 PM',
                logoutArea: 'Koyambedu',
                visits: 3,
                kms: 18.7,
                battery: 54,
                online: true
            },
            {
                id: 'GHRA0012',
                name: 'ARUN KUMAR',
                login: '08:55 AM',
                loginArea: 'Guindy',
                logout: '06:00 PM',
                logoutArea: 'Adyar',
                visits: 6,
                kms: 41.2,
                battery: 66,
                online: false
            },
            {
                id: 'GHRA0013',
                name: 'MOHAN RAJ',
                login: '09:10 AM',
                loginArea: 'Velachery',
                logout: '05:30 PM',
                logoutArea: 'Tambaram',
                visits: 4,
                kms: 27.9,
                battery: 91,
                online: true
            },
            {
                id: 'GHRA0014',
                name: 'PRIYA DHARSHINI',
                login: '09:45 AM',
                loginArea: 'Mylapore',
                logout: '06:20 PM',
                logoutArea: 'Egmore',
                visits: 7,
                kms: 35.0,
                battery: 43,
                online: false
            },
            {
                id: 'GHRA0015',
                name: 'SURESH BABU',
                login: 'Nill',
                loginArea: 'Nill',
                logout: 'Nill',
                logoutArea: 'Nill',
                visits: 0,
                kms: 0,
                battery: 0,
                online: false
            },
            {
                id: 'GHRA0016',
                name: 'DIVYA LAKSHMI',
                login: '10:00 AM',
                loginArea: 'Porur',
                logout: '06:05 PM',
                logoutArea: 'Vadapalani',
                visits: 2,
                kms: 14.3,
                battery: 82,
                online: true
            },
            {
                id: 'GHRA0017',
                name: 'KARTHIK RAJA',
                login: '09:20 AM',
                loginArea: 'Perambur',
                logout: '05:50 PM',
                logoutArea: 'Tondiarpet',
                visits: 5,
                kms: 29.6,
                battery: 60,
                online: true
            },
            {
                id: 'GHRA0018',
                name: 'NANDHINI S',
                login: 'Nill',
                loginArea: 'Nill',
                logout: 'Nill',
                logoutArea: 'Nill',
                visits: 0,
                kms: 0,
                battery: 0,
                online: false
            },
            {
                id: 'GHRA0019',
                name: 'VIGNESH R',
                login: '09:05 AM',
                loginArea: 'Ashok Nagar',
                logout: '06:30 PM',
                logoutArea: 'Saidapet',
                visits: 6,
                kms: 38.1,
                battery: 37,
                online: false
            },
            {
                id: 'GHRA0020',
                name: 'SANTHOSH M',
                login: '09:40 AM',
                loginArea: 'Kodambakkam',
                logout: '05:55 PM',
                logoutArea: 'Ambattur',
                visits: 3,
                kms: 21.5,
                battery: 72,
                online: true
            }
        ];

        // Dummy timeline (same route used for every user that has visits)
        var routeTemplate = [{
                type: 'login',
                time: '09:02 AM',
                title: 'Login',
                area: 'Nungambakkam',
                note: 'Battery 92%',
                lat: 13.0605,
                lng: 80.2425
            },
            {
                type: 'visit',
                time: '09:40 AM',
                title: 'Visit - Hona Traders',
                area: 'Thousand Lights',
                note: 'Duration 25 min',
                lat: 13.0580,
                lng: 80.2590
            },
            {
                type: 'visit',
                time: '10:45 AM',
                title: 'Visit - Sri Vel Agencies',
                area: 'Royapettah',
                note: 'Duration 30 min',
                lat: 13.0530,
                lng: 80.2640
            },
            {
                type: 'idle',
                time: '12:30 PM',
                title: 'Idle / Lunch Break',
                area: 'Mylapore',
                note: 'Duration 45 min',
                lat: 13.0339,
                lng: 80.2690
            },
            {
                type: 'visit',
                time: '02:10 PM',
                title: 'Visit - Kumar Stores',
                area: 'Teynampet',
                note: 'Duration 20 min',
                lat: 13.0450,
                lng: 80.2500
            },
            {
                type: 'visit',
                time: '03:35 PM',
                title: 'Visit - Balaji Motors',
                area: 'Guindy',
                note: 'Duration 35 min',
                lat: 13.0100,
                lng: 80.2200
            },
            {
                type: 'logout',
                time: '06:15 PM',
                title: 'Logout',
                area: 'T. Nagar',
                note: 'Total 32.4 km travelled',
                lat: 13.0418,
                lng: 80.2341
            }
        ];

        // ---------- State ----------
        var map, layerGroup, markers = [];
        var selectedUser = users[0];
        var filterState = {
            status: 'all',
            staffId: '',
            area: '',
            minVisits: 0
        };

        // ---------- Helpers ----------
        function todayDMY() {
            var d = new Date();
            var m = ('0' + (d.getMonth() + 1)).slice(-2);
            var day = ('0' + d.getDate()).slice(-2);
            return day + '-' + m + '-' + d.getFullYear();
        }

        function currentDate() {
            var el = document.getElementById('filter_date');
            var val = (el ? el.value : '').trim();
            return val || todayDMY();
        }

        // ---------- Map ----------
        function initMap() {
            if (typeof L === 'undefined') return;
            try {
                map = L.map('leadMap').setView([13.0605, 80.2425], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);
                layerGroup = L.layerGroup().addTo(map);
                setTimeout(function() {
                    if (map) map.invalidateSize();
                }, 300);
            } catch (e) {
                console.warn('Map initialization error:', e);
            }
        }

        function markerIcon(type, label) {
            if (typeof L === 'undefined') return null;
            var colors = { login: '#198754', visit: '#0d6efd', idle: '#ffc107', logout: '#dc3545' };
            var c = colors[type] || '#0d6efd';
            return L.divIcon({
                className: '',
                html: '<div style="width:28px;height:28px;border-radius:50%;color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center;border:2px solid #fff;box-shadow:0 1px 5px rgba(0,0,0,.5);background:' + c + ';">' + label + '</div>',
                iconSize: [28, 28],
                iconAnchor: [14, 14],
                popupAnchor: [0, -14]
            });
        }

        function getTimeline(user) {
            return user && user.visits > 0 ? routeTemplate : [];
        }

        function renderMap(user) {
            if (!map || typeof L === 'undefined') return;
            try {
                layerGroup.clearLayers();
                markers = [];
                var items = getTimeline(user);

                if (!items.length) {
                    map.setView([13.0605, 80.2425], 13);
                    return;
                }

                var latlngs = [];
                items.forEach(function(it, i) {
                    var icon = markerIcon(it.type, i + 1);
                    var opts = icon ? { icon: icon } : {};
                    var m = L.marker([it.lat, it.lng], opts)
                        .bindPopup('<b>' + it.title + '</b><br>' + it.area + '<br>' + it.time)
                        .addTo(layerGroup);
                    markers.push(m);
                    latlngs.push([it.lat, it.lng]);
                });

                if (latlngs.length > 0) {
                    L.polyline(latlngs, {
                        color: '#3b9bff',
                        weight: 4,
                        opacity: .8,
                        dashArray: '8 6'
                    }).addTo(layerGroup);

                    try {
                        map.fitBounds(latlngs, { padding: [40, 40] });
                    } catch (e) {
                        map.setView(latlngs[0], 13);
                    }
                }

                setTimeout(function() {
                    try {
                        map.invalidateSize();
                        if (markers.length > 0 && markers[0].openPopup) {
                            markers[0].openPopup();
                        }
                    } catch (e) {}
                }, 200);
            } catch (err) {
                console.warn('renderMap warning:', err);
            }
        }

        // ---------- Timeline ----------
        function renderTimeline(user) {
            var items = getTimeline(user);
            document.getElementById('timelineCount').textContent = items.length;
            var ul = document.getElementById('timelineList');

            if (!items.length) {
                ul.innerHTML = '<div class="text-center text-muted p-4 small"><i class="bi bi-inbox fs-3 d-block mb-2"></i>No activity found for this staff member.</div>';
                return;
            }

            var html = '';
            items.forEach(function(it, i) {
                var t = TL[it.type] || { icon: 'bi-geo-alt', color: '#0d6efd' };
                var badgeBg = it.type === 'login' ? 'bg-success' : (it.type === 'logout' ? 'bg-danger' : (it.type === 'idle' ? 'bg-warning text-dark' : 'bg-primary'));
                var activeClass = i === 0 ? ' border-primary bg-primary-subtle' : ' bg-white';
                html += '<div class="list-group-item list-group-item-action border rounded-3 p-2.5 tl-item shadow-sm' + activeClass + '" data-index="' + i + '" role="button">' +
                    '<div class="d-flex align-items-center justify-content-between mb-1">' +
                    '<span class="fw-bold text-dark small d-flex align-items-center gap-2">' +
                    '<span class="badge rounded-circle p-1 text-white ' + badgeBg + ' d-inline-flex align-items-center justify-content-center" style="width:24px;height:24px;">' +
                    '<i class="bi ' + t.icon + '" style="font-size:12px;"></i>' +
                    '</span>' +
                    it.title +
                    '</span>' +
                    '<span class="badge bg-light text-secondary border rounded-pill" style="font-size:10px;">' + it.time + '</span>' +
                    '</div>' +
                    '<div class="small text-muted ps-4 ms-2">' +
                    '<div><i class="bi bi-geo-alt text-secondary"></i> ' + it.area + '</div>' +
                    '<small class="text-muted" style="font-size:11px;">' + it.note + '</small>' +
                    '</div>' +
                    '</div>';
            });
            ul.innerHTML = html;
        }

        // ---------- Titles ----------
        function updateTitles(user) {
            var d = currentDate();
            var mapDateEl = document.getElementById('mapDate');
            if (mapDateEl) mapDateEl.textContent = d;
            var hdrDateEl = document.getElementById('lmHeaderDate');
            if (hdrDateEl) hdrDateEl.textContent = d;
            var nameEl = document.getElementById('mapUserName');
            if (nameEl) nameEl.textContent = user.name;
            var idEl = document.getElementById('mapUserId');
            if (idEl) idEl.textContent = user.id;
        }

        function scrollToMap() {
            var mapSec = document.getElementById('mapSection');
            if (!mapSec) return;
            try {
                mapSec.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } catch (e) {}
            var rect = mapSec.getBoundingClientRect();
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
            window.scrollTo({
                top: rect.top + scrollTop - 80,
                behavior: 'smooth'
            });
        }

        function selectUser(id) {
            if (!id) return;
            var u = users.filter(function(x) {
                return String(x.id).trim() === String(id).trim();
            })[0];
            if (!u) return;
            selectedUser = u;
            updateTitles(u);
            renderMap(u);
            renderTimeline(u);
        }

        // ---------- Staff 360 Modal ----------
        window.openStaff360Modal = function(id) {
            var u = users.filter(function(x) {
                return String(x.id).trim() === String(id).trim();
            })[0];
            if (!u) return;
            selectedUser = u;
            updateTitles(u);
            renderMap(u);
            renderTimeline(u);

            var setTxt = function(elId, val) {
                var el = document.getElementById(elId);
                if (el) el.textContent = val;
            };
            setTxt('lmModalName', u.name);
            setTxt('lmModalId', u.id);
            setTxt('lmModalVisits', u.visits + (u.visits === 1 ? ' Visit' : ' Visits'));
            setTxt('lmModalKms', u.kms + ' km');
            setTxt('lmModalBattery', u.battery + ' %');
            setTxt('lmModalDate', currentDate());
            setTxt('lmModalLogin', u.login === 'Nill' ? 'Not Logged In' : (u.login + ' · ' + u.loginArea));
            setTxt('lmModalLogout', u.logout === 'Nill' ? 'Not Logged Out' : (u.logout + ' · ' + u.logoutArea));

            var stBadge = document.getElementById('lmModalStatus');
            if (stBadge) {
                stBadge.textContent = u.online ? 'Online' : 'Offline';
                stBadge.className = u.online
                    ? 'badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5'
                    : 'badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill font-11 px-2.5 py-0.5';
            }

            var assignBtn = document.getElementById('lmModalAssignVisitBtn');
            if (assignBtn) assignBtn.href = 'appointments.php?staff=' + encodeURIComponent(u.name);

            var modalEl = document.getElementById('lmDetailModal');
            if (modalEl && window.bootstrap && bootstrap.Modal) {
                bootstrap.Modal.getOrCreateInstance(modalEl).show();
            }
        };

        // ---------- Filtering & Badge ----------
        function updateFilterBadge() {
            var count = 0;
            var dateEl = document.getElementById('filter_date');
            if (dateEl && dateEl.value && dateEl.value !== todayDMY()) count++;
            if (filterState.staffId) count++;
            if (filterState.status && filterState.status !== 'all') count++;
            if (filterState.area) count++;
            if (filterState.minVisits > 0) count++;

            var badge = document.getElementById('lmFilterCountBadge');
            if (badge) {
                badge.textContent = count;
                badge.classList.toggle('d-none', count === 0);
            }
        }

        var allStaffTrs = [];
        function applyTableFilters() {
            var tbody = document.getElementById('leadMapTbody');
            var tableEl = document.getElementById('leadMapTable');
            if (!tbody) return;
            if (!allStaffTrs.length) {
                allStaffTrs = Array.from(tbody.querySelectorAll('tr[data-id]'));
            }
            var firstMatchedId = null;
            var matchedRows = [];

            allStaffTrs.forEach(function(tr) {
                var id = tr.getAttribute('data-id') || '';
                var onlineAttr = tr.getAttribute('data-online') || '';
                var areaAttr = (tr.getAttribute('data-area') || '').toLowerCase();
                var visitsAttr = parseInt(tr.getAttribute('data-visits') || '0', 10);

                var match = true;
                if (filterState.status !== 'all' && onlineAttr !== filterState.status) match = false;
                if (filterState.staffId && id !== filterState.staffId) match = false;
                if (filterState.area && areaAttr.indexOf(filterState.area.toLowerCase()) === -1) match = false;
                if (filterState.minVisits > 0 && visitsAttr < filterState.minVisits) match = false;

                if (match) {
                    tr.style.display = '';
                    matchedRows.push(tr);
                    if (!firstMatchedId) firstMatchedId = id;
                }
            });

            tbody.innerHTML = '';
            matchedRows.forEach(function(tr) {
                tbody.appendChild(tr);
            });
            if (tableEl && tableEl.autoTable && typeof tableEl.autoTable.render === 'function') {
                tableEl.autoTable.render();
            }

            if (firstMatchedId) {
                selectUser(firstMatchedId);
            } else {
                updateTitles(selectedUser);
            }
            updateFilterBadge();
        }

        // ---------- Events ----------
        document.addEventListener('DOMContentLoaded', function() {
            var tbodyInit = document.getElementById('leadMapTbody');
            if (tbodyInit && !allStaffTrs.length) {
                allStaffTrs = Array.from(tbodyInit.querySelectorAll('tr[data-id]'));
            }
            var dateEl = document.getElementById('filter_date');
            if (dateEl && !dateEl.value) {
                dateEl.value = todayDMY();
            }

            initMap();
            selectUser(selectedUser.id);

            // Capture-phase dropdown delegation with viewport boundary & fixed popper strategy
            document.addEventListener('click', function(e) {
                var toggle = e.target.closest('.btn-table-action[data-bs-toggle="dropdown"]');
                if (toggle && window.bootstrap && bootstrap.Dropdown) {
                    bootstrap.Dropdown.getOrCreateInstance(toggle, {
                        boundary: 'viewport',
                        popperConfig: { strategy: 'fixed' }
                    });
                }
                var actItem = e.target.closest('.table-action-menu .dropdown-item');
                if (actItem && window.bootstrap && bootstrap.Dropdown) {
                    var dd = actItem.closest('.dropdown');
                    var btn = dd ? dd.querySelector('[data-bs-toggle="dropdown"]') : null;
                    if (btn) {
                        var inst = bootstrap.Dropdown.getInstance(btn);
                        if (inst) inst.hide();
                    }
                }
            }, true);

            // Header Status Toggle (All | Online | Offline)
            var statusToggle = document.getElementById('lmStatusToggle');
            if (statusToggle) {
                statusToggle.querySelectorAll('button').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        filterState.status = btn.getAttribute('data-status') || 'all';
                        statusToggle.querySelectorAll('button').forEach(function(b) {
                            b.classList.toggle('active', b === btn);
                        });
                        var selStatus = document.getElementById('filter_status');
                        if (selStatus) {
                            selStatus.value = filterState.status === 'all' ? '' : filterState.status;
                            if (window.jQuery && jQuery.fn.select2) jQuery(selStatus).trigger('change.select2');
                        }
                        applyTableFilters();
                    });
                });
            }

            // Quick Actions header buttons
            var jumpBtn = document.getElementById('lmJumpToMapBtn');
            if (jumpBtn) {
                jumpBtn.addEventListener('click', function() {
                    scrollToMap();
                });
            }
            var refreshBtn = document.getElementById('lmRefreshMapBtn');
            if (refreshBtn) {
                refreshBtn.addEventListener('click', function() {
                    selectUser(selectedUser.id);
                });
            }

            // Modal Focus Map button
            var modalFocusBtn = document.getElementById('lmModalFocusMapBtn');
            if (modalFocusBtn) {
                modalFocusBtn.addEventListener('click', function() {
                    var modalEl = document.getElementById('lmDetailModal');
                    if (modalEl && window.bootstrap && bootstrap.Modal) {
                        var inst = bootstrap.Modal.getInstance(modalEl);
                        if (inst) inst.hide();
                    }
                    scrollToMap();
                });
            }

            // Delegated click for .btn-view-map and .btn-staff-360
            document.addEventListener('click', function(e) {
                var staff360Btn = e.target.closest('.btn-staff-360');
                if (staff360Btn) {
                    e.preventDefault();
                    var sid = staff360Btn.getAttribute('data-id');
                    if (sid) window.openStaff360Modal(sid);
                    return;
                }

                var btn = e.target.closest('.btn-view-map');
                if (!btn) return;
                e.preventDefault();
                var id = btn.getAttribute('data-id');
                if (id) {
                    selectUser(id);
                    scrollToMap();
                }
            });

            // Table Row Click -> opens Staff 360 Modal while safely ignoring Actions dropdown & interactive buttons
            var tableEl = document.getElementById('leadMapTable');
            if (tableEl) {
                tableEl.addEventListener('click', function(e) {
                    if (
                        e.target.closest('input, button, select, textarea') ||
                        e.target.closest('.btn-table-action') ||
                        e.target.closest('.lead-act-btn') ||
                        e.target.closest('.btn-view-map') ||
                        e.target.closest('.dropdown') ||
                        e.target.closest('.dropdown-menu') ||
                        e.target.closest('.table-action-menu') ||
                        e.target.closest('[data-bs-toggle="dropdown"]') ||
                        e.target.closest('a:not(.lm-staff-name)')
                    ) {
                        return;
                    }

                    var cell = e.target.closest('td');
                    if (cell && (cell.querySelector('.btn-table-action, .lead-act-btn, .dropdown') || cell.classList.contains('text-end'))) {
                        return;
                    }

                    var nameLink = e.target.closest('.lm-staff-name');
                    var tr = e.target.closest('tr[data-id]');
                    var idAttr = nameLink ? nameLink.getAttribute('data-id') : (tr ? tr.getAttribute('data-id') : null);
                    if (idAttr) {
                        e.preventDefault();
                        window.openStaff360Modal(idAttr);
                    }
                });
            }

            // Timeline click -> focus marker
            document.getElementById('timelineList').addEventListener('click', function(e) {
                var li = e.target.closest('.tl-item');
                if (!li) return;
                var idx = +li.getAttribute('data-index');
                document.querySelectorAll('#timelineList .tl-item').forEach(function(n) {
                    n.classList.remove('border-primary', 'bg-primary-subtle');
                    n.classList.add('bg-white');
                });
                li.classList.remove('bg-white');
                li.classList.add('border-primary', 'bg-primary-subtle');
                if (markers[idx] && map) {
                    map.flyTo(markers[idx].getLatLng(), 15, {
                        duration: .8
                    });
                    markers[idx].openPopup();
                }
            });

            // Offcanvas Apply Filters
            document.getElementById('btnSearch').addEventListener('click', function() {
                var stEl = document.getElementById('filter_staff');
                var statusEl = document.getElementById('filter_status');
                var areaEl = document.getElementById('filter_area');
                var mvEl = document.getElementById('filter_min_visits');

                filterState.staffId = stEl ? stEl.value : '';
                filterState.status = (statusEl && statusEl.value) ? statusEl.value : 'all';
                filterState.area = areaEl ? areaEl.value : '';
                filterState.minVisits = mvEl ? parseInt(mvEl.value || '0', 10) : 0;

                if (statusToggle) {
                    statusToggle.querySelectorAll('button').forEach(function(b) {
                        b.classList.toggle('active', b.getAttribute('data-status') === filterState.status);
                    });
                }

                applyTableFilters();

                var oc = document.getElementById('lmFilterOffcanvas');
                if (oc && window.bootstrap && bootstrap.Offcanvas) {
                    var inst = bootstrap.Offcanvas.getInstance(oc);
                    if (inst) inst.hide();
                }
            });

            // Offcanvas Reset Filters
            document.getElementById('btnReset').addEventListener('click', function() {
                var dateEl = document.getElementById('filter_date');
                if (dateEl) dateEl.value = todayDMY();

                ['filter_staff', 'filter_status', 'filter_area'].forEach(function(id) {
                    var el = document.getElementById(id);
                    if (el) {
                        el.value = '';
                        if (window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change.select2');
                    }
                });
                var mvEl = document.getElementById('filter_min_visits');
                if (mvEl) {
                    mvEl.value = '0';
                    if (window.jQuery && jQuery.fn.select2) jQuery(mvEl).trigger('change.select2');
                }

                filterState.status = 'all';
                filterState.staffId = '';
                filterState.area = '';
                filterState.minVisits = 0;

                if (statusToggle) {
                    statusToggle.querySelectorAll('button').forEach(function(b) {
                        b.classList.toggle('active', b.getAttribute('data-status') === 'all');
                    });
                }

                applyTableFilters();
                selectUser(users[0].id);
            });
        });
    })();
</script>

<?php include 'footer.php'; ?>
