<?php include 'header.php'; ?>

<main class="svr-page">

    <!-- Single-Row Enterprise Page Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip bg-primary-subtle text-primary d-flex align-items-center justify-content-center rounded-3" style="width:42px;height:42px;">
                <i class="bi bi-geo-alt fs-5"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title">Staff Visiting Location Report</h1>
                <p class="text-muted font-12 mb-0">Audit field staff visit check-ins, GPS distance variance, lead/customer locations &amp; in/out timestamps</p>
            </div>
        </div>

        <div class="d-flex align-items-center flex-wrap gap-2">
            <!-- Bootstrap 5 Nav-Pills Visit Type & Variance Filter Tabs -->
            <ul class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="svrTypeTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link active rounded-pill px-3 py-1 font-12 fw-semibold" data-type="all">
                        <i class="bi bi-layers me-1"></i>All Visits
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold" data-type="lead">
                        <i class="bi bi-person-plus me-1"></i>Lead Visits
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold" data-type="customer">
                        <i class="bi bi-building-check me-1"></i>Customer Visits
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold" data-type="high_diff">
                        <i class="bi bi-exclamation-triangle me-1"></i>High Variance (&gt;1 km)
                    </button>
                </li>
            </ul>

            <!-- Offcanvas Filter Button -->
            <button type="button" class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs" data-bs-toggle="offcanvas" data-bs-target="#svrFilterOffcanvas">
                <i class="bi bi-funnel text-primary"></i>
                <span>Filters</span>
                <span class="badge rounded-pill bg-primary text-white font-10 d-none" id="svrFilterCountBadge">0</span>
            </button>

            <!-- Header Actions Dropdown -->
            <div class="dropdown">
                <button class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-lightning-charge text-primary"></i>
                    <span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end table-action-menu shadow-lg border-0 p-2">
                    <li>
                        <a class="dropdown-item rounded-2 py-2" href="staff-visting-report.php">
                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-signpost-split"></i></span>
                            <span>Staff Visiting Summary</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-2 py-2" href="lead-map.php">
                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-map"></i></span>
                            <span>Field Staff Live Map</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-2 py-2" href="appointments.php">
                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-calendar2-check"></i></span>
                            <span>Schedule Field Visit</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2 py-2" onclick="window.print()">
                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-printer"></i></span>
                            <span>Print Location Audit</span>
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Primary CTA -->
            <a href="staff-visting-report.php" class="btn btn-primary fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-sm">
                <i class="bi bi-signpost-split"></i>
                <span>Visiting Summary</span>
            </a>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card-custom p-0 mb-4" style="overflow: visible;">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="svrTable" data-table-name="Staff Visiting Location Report">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Staff Name</th>
                        <th>Type</th>
                        <th>Lead / Customer</th>
                        <th>Date</th>
                        <th>Original Location</th>
                        <th>Current Checkin Location</th>
                        <th>Checkin Difference</th>
                        <th>In-Time</th>
                        <th>Out-Time</th>
                        <th class="text-end pe-3" style="width: 110px;">Action</th>
                    </tr>
                </thead>
                <tbody id="svrTbody">
                    <tr class="visit-row" data-staff="1" data-branch="West Mogappair" data-date="2026-10-17">
                        <td><span class="sno-value">1</span></td>
                        <td>
                            <div class="svr-name">GHARUDA SOFTWARE</div>
                            <div class="svr-sub">PH : 9865321470</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">annai engineering</div>
                            <div class="svr-sub">PH : 9841200011</div>
                        </td>
                        <td>17-10-2026</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td><span class="svr-diff ok" data-sort="0.12"><i class="bi bi-signpost-2"></i>0.12 km</span></td>
                        <td>09:00:00 am</td>
                        <td>09:20:00 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="5" data-branch="Velachery" data-date="2026-10-17">
                        <td><span class="sno-value">2</span></td>
                        <td>
                            <div class="svr-name">Prabhu S</div>
                            <div class="svr-sub">PH : 9944556677</div>
                            <div class="svr-sub">Work Branch : Velachery</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Vasanth Auto Works</div>
                            <div class="svr-sub">PH : 9884600033</div>
                        </td>
                        <td>17-10-2026</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td><span class="svr-diff ok" data-sort="0.06"><i class="bi bi-signpost-2"></i>0.06 km</span></td>
                        <td>03:38:02 pm</td>
                        <td>04:12:02 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="1" data-branch="West Mogappair" data-date="2026-10-17">
                        <td><span class="sno-value">3</span></td>
                        <td>
                            <div class="svr-name">GHARUDA SOFTWARE</div>
                            <div class="svr-sub">PH : 9865321470</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Sakthi Hardware</div>
                            <div class="svr-sub">PH : 9941900066</div>
                        </td>
                        <td>17-10-2026</td>
                        <td>Velachery Main Road, Vijaya Nagar, Velachery, Chennai, Tamil Nadu, 600042, India</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td><span class="svr-diff warn" data-sort="0.72"><i class="bi bi-signpost-2"></i>0.72 km</span></td>
                        <td>04:45:15 pm</td>
                        <td>05:20:15 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="5" data-branch="Velachery" data-date="2026-10-17">
                        <td><span class="sno-value">4</span></td>
                        <td>
                            <div class="svr-name">Prabhu S</div>
                            <div class="svr-sub">PH : 9944556677</div>
                            <div class="svr-sub">Work Branch : Velachery</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Lakshmi Pharma</div>
                            <div class="svr-sub">PH : 9884200088</div>
                        </td>
                        <td>17-10-2026</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td><span class="svr-diff far" data-sort="2.30"><i class="bi bi-signpost-2"></i>2.30 km</span></td>
                        <td>02:23:17 pm</td>
                        <td>03:12:17 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="2" data-branch="Ambattur" data-date="2026-10-14">
                        <td><span class="sno-value">5</span></td>
                        <td>
                            <div class="svr-name">PREM KUMAR.R</div>
                            <div class="svr-sub">PH : 9840011223</div>
                            <div class="svr-sub">Work Branch : Ambattur</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Kaveri Textiles</div>
                            <div class="svr-sub">PH : 9962700044</div>
                        </td>
                        <td>14-10-2026</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td><span class="svr-diff ok" data-sort="0.35"><i class="bi bi-signpost-2"></i>0.35 km</span></td>
                        <td>10:07:13 am</td>
                        <td>10:28:13 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="2" data-branch="Ambattur" data-date="2026-10-14">
                        <td><span class="sno-value">6</span></td>
                        <td>
                            <div class="svr-name">PREM KUMAR.R</div>
                            <div class="svr-sub">PH : 9840011223</div>
                            <div class="svr-sub">Work Branch : Ambattur</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">annai engineering</div>
                            <div class="svr-sub">PH : 9841200011</div>
                        </td>
                        <td>14-10-2026</td>
                        <td>Industrial Estate Road, Ambattur, Chennai, Tamil Nadu, 600058, India</td>
                        <td>Industrial Estate Road, Ambattur, Chennai, Tamil Nadu, 600058, India</td>
                        <td><span class="svr-diff ok" data-sort="0.12"><i class="bi bi-signpost-2"></i>0.12 km</span></td>
                        <td>09:52:28 am</td>
                        <td>10:28:28 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="3" data-branch="Anna Nagar" data-date="2026-10-11">
                        <td><span class="sno-value">7</span></td>
                        <td>
                            <div class="svr-name">Jude S</div>
                            <div class="svr-sub">PH : 9884455667</div>
                            <div class="svr-sub">Work Branch : Anna Nagar</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Balaji Electricals</div>
                            <div class="svr-sub">PH : 9840100077</div>
                        </td>
                        <td>11-10-2026</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td><span class="svr-diff ok" data-sort="0.48"><i class="bi bi-signpost-2"></i>0.48 km</span></td>
                        <td>11:14:26 am</td>
                        <td>11:36:26 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="4" data-branch="West Mogappair" data-date="2026-10-11">
                        <td><span class="sno-value">8</span></td>
                        <td>
                            <div class="svr-name">KISHORE R</div>
                            <div class="svr-sub">PH : 9791122334</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Sri Murugan Traders</div>
                            <div class="svr-sub">PH : 9840300022</div>
                        </td>
                        <td>11-10-2026</td>
                        <td>Velachery Main Road, Vijaya Nagar, Velachery, Chennai, Tamil Nadu, 600042, India</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td><span class="svr-diff warn" data-sort="0.90"><i class="bi bi-signpost-2"></i>0.90 km</span></td>
                        <td>12:21:39 pm</td>
                        <td>12:44:39 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="3" data-branch="Anna Nagar" data-date="2026-10-11">
                        <td><span class="sno-value">9</span></td>
                        <td>
                            <div class="svr-name">Jude S</div>
                            <div class="svr-sub">PH : 9884455667</div>
                            <div class="svr-sub">Work Branch : Anna Nagar</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Kaveri Textiles</div>
                            <div class="svr-sub">PH : 9962700044</div>
                        </td>
                        <td>11-10-2026</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td><span class="svr-diff ok" data-sort="0.35"><i class="bi bi-signpost-2"></i>0.35 km</span></td>
                        <td>10:59:41 am</td>
                        <td>11:36:41 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="4" data-branch="West Mogappair" data-date="2026-10-11">
                        <td><span class="sno-value">10</span></td>
                        <td>
                            <div class="svr-name">KISHORE R</div>
                            <div class="svr-sub">PH : 9791122334</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Balaji Electricals</div>
                            <div class="svr-sub">PH : 9840100077</div>
                        </td>
                        <td>11-10-2026</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td><span class="svr-diff ok" data-sort="0.48"><i class="bi bi-signpost-2"></i>0.48 km</span></td>
                        <td>11:06:54 am</td>
                        <td>11:44:54 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="5" data-branch="Velachery" data-date="2026-10-08">
                        <td><span class="sno-value">11</span></td>
                        <td>
                            <div class="svr-name">Prabhu S</div>
                            <div class="svr-sub">PH : 9944556677</div>
                            <div class="svr-sub">Work Branch : Velachery</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Ambal Foods</div>
                            <div class="svr-sub">PH : 9790800055</div>
                        </td>
                        <td>08-10-2026</td>
                        <td>Industrial Estate Road, Ambattur, Chennai, Tamil Nadu, 600058, India</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td><span class="svr-diff warn" data-sort="1.40"><i class="bi bi-signpost-2"></i>1.40 km</span></td>
                        <td>01:28:52 pm</td>
                        <td>01:52:52 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="5" data-branch="Velachery" data-date="2026-10-08">
                        <td><span class="sno-value">12</span></td>
                        <td>
                            <div class="svr-name">Prabhu S</div>
                            <div class="svr-sub">PH : 9944556677</div>
                            <div class="svr-sub">Work Branch : Velachery</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Sri Murugan Traders</div>
                            <div class="svr-sub">PH : 9840300022</div>
                        </td>
                        <td>08-10-2026</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td>Velachery Main Road, Vijaya Nagar, Velachery, Chennai, Tamil Nadu, 600042, India</td>
                        <td><span class="svr-diff warn" data-sort="0.90"><i class="bi bi-signpost-2"></i>0.90 km</span></td>
                        <td>12:13:07 pm</td>
                        <td>12:52:07 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="1" data-branch="West Mogappair" data-date="2026-10-05">
                        <td><span class="sno-value">13</span></td>
                        <td>
                            <div class="svr-name">GHARUDA SOFTWARE</div>
                            <div class="svr-sub">PH : 9865321470</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Lakshmi Pharma</div>
                            <div class="svr-sub">PH : 9884200088</div>
                        </td>
                        <td>05-10-2026</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td><span class="svr-diff far" data-sort="2.30"><i class="bi bi-signpost-2"></i>2.30 km</span></td>
                        <td>02:35:05 pm</td>
                        <td>03:00:05 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="2" data-branch="Ambattur" data-date="2026-10-05">
                        <td><span class="sno-value">14</span></td>
                        <td>
                            <div class="svr-name">PREM KUMAR.R</div>
                            <div class="svr-sub">PH : 9840011223</div>
                            <div class="svr-sub">Work Branch : Ambattur</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Vasanth Auto Works</div>
                            <div class="svr-sub">PH : 9884600033</div>
                        </td>
                        <td>05-10-2026</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td><span class="svr-diff ok" data-sort="0.06"><i class="bi bi-signpost-2"></i>0.06 km</span></td>
                        <td>03:42:18 pm</td>
                        <td>04:08:18 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="1" data-branch="West Mogappair" data-date="2026-10-05">
                        <td><span class="sno-value">15</span></td>
                        <td>
                            <div class="svr-name">GHARUDA SOFTWARE</div>
                            <div class="svr-sub">PH : 9865321470</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Ambal Foods</div>
                            <div class="svr-sub">PH : 9790800055</div>
                        </td>
                        <td>05-10-2026</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td>Industrial Estate Road, Ambattur, Chennai, Tamil Nadu, 600058, India</td>
                        <td><span class="svr-diff warn" data-sort="1.40"><i class="bi bi-signpost-2"></i>1.40 km</span></td>
                        <td>01:20:20 pm</td>
                        <td>02:00:20 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="2" data-branch="Ambattur" data-date="2026-10-05">
                        <td><span class="sno-value">16</span></td>
                        <td>
                            <div class="svr-name">PREM KUMAR.R</div>
                            <div class="svr-sub">PH : 9840011223</div>
                            <div class="svr-sub">Work Branch : Ambattur</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Lakshmi Pharma</div>
                            <div class="svr-sub">PH : 9884200088</div>
                        </td>
                        <td>05-10-2026</td>
                        <td>Velachery Main Road, Vijaya Nagar, Velachery, Chennai, Tamil Nadu, 600042, India</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td><span class="svr-diff far" data-sort="2.30"><i class="bi bi-signpost-2"></i>2.30 km</span></td>
                        <td>02:27:33 pm</td>
                        <td>03:08:33 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="3" data-branch="Anna Nagar" data-date="2026-10-02">
                        <td><span class="sno-value">17</span></td>
                        <td>
                            <div class="svr-name">Jude S</div>
                            <div class="svr-sub">PH : 9884455667</div>
                            <div class="svr-sub">Work Branch : Anna Nagar</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Sakthi Hardware</div>
                            <div class="svr-sub">PH : 9941900066</div>
                        </td>
                        <td>02-10-2026</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td>Velachery Main Road, Vijaya Nagar, Velachery, Chennai, Tamil Nadu, 600042, India</td>
                        <td><span class="svr-diff warn" data-sort="0.72"><i class="bi bi-signpost-2"></i>0.72 km</span></td>
                        <td>04:49:31 pm</td>
                        <td>05:16:31 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="3" data-branch="Anna Nagar" data-date="2026-10-02">
                        <td><span class="sno-value">18</span></td>
                        <td>
                            <div class="svr-name">Jude S</div>
                            <div class="svr-sub">PH : 9884455667</div>
                            <div class="svr-sub">Work Branch : Anna Nagar</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Vasanth Auto Works</div>
                            <div class="svr-sub">PH : 9884600033</div>
                        </td>
                        <td>02-10-2026</td>
                        <td>Industrial Estate Road, Ambattur, Chennai, Tamil Nadu, 600058, India</td>
                        <td>Industrial Estate Road, Ambattur, Chennai, Tamil Nadu, 600058, India</td>
                        <td><span class="svr-diff ok" data-sort="0.06"><i class="bi bi-signpost-2"></i>0.06 km</span></td>
                        <td>03:34:46 pm</td>
                        <td>04:16:46 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="4" data-branch="West Mogappair" data-date="2026-09-29">
                        <td><span class="sno-value">19</span></td>
                        <td>
                            <div class="svr-name">KISHORE R</div>
                            <div class="svr-sub">PH : 9791122334</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">annai engineering</div>
                            <div class="svr-sub">PH : 9841200011</div>
                        </td>
                        <td>29-09-2026</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td><span class="svr-diff ok" data-sort="0.12"><i class="bi bi-signpost-2"></i>0.12 km</span></td>
                        <td>09:56:44 am</td>
                        <td>10:24:44 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="5" data-branch="Velachery" data-date="2026-09-29">
                        <td><span class="sno-value">20</span></td>
                        <td>
                            <div class="svr-name">Prabhu S</div>
                            <div class="svr-sub">PH : 9944556677</div>
                            <div class="svr-sub">Work Branch : Velachery</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Kaveri Textiles</div>
                            <div class="svr-sub">PH : 9962700044</div>
                        </td>
                        <td>29-09-2026</td>
                        <td>Velachery Main Road, Vijaya Nagar, Velachery, Chennai, Tamil Nadu, 600042, India</td>
                        <td>Velachery Main Road, Vijaya Nagar, Velachery, Chennai, Tamil Nadu, 600042, India</td>
                        <td><span class="svr-diff ok" data-sort="0.35"><i class="bi bi-signpost-2"></i>0.35 km</span></td>
                        <td>10:03:57 am</td>
                        <td>10:32:57 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="4" data-branch="West Mogappair" data-date="2026-09-29">
                        <td><span class="sno-value">21</span></td>
                        <td>
                            <div class="svr-name">KISHORE R</div>
                            <div class="svr-sub">PH : 9791122334</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Sakthi Hardware</div>
                            <div class="svr-sub">PH : 9941900066</div>
                        </td>
                        <td>29-09-2026</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td><span class="svr-diff warn" data-sort="0.72"><i class="bi bi-signpost-2"></i>0.72 km</span></td>
                        <td>04:41:59 pm</td>
                        <td>05:24:59 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="5" data-branch="Velachery" data-date="2026-09-29">
                        <td><span class="sno-value">22</span></td>
                        <td>
                            <div class="svr-name">Prabhu S</div>
                            <div class="svr-sub">PH : 9944556677</div>
                            <div class="svr-sub">Work Branch : Velachery</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">annai engineering</div>
                            <div class="svr-sub">PH : 9841200011</div>
                        </td>
                        <td>29-09-2026</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td><span class="svr-diff ok" data-sort="0.12"><i class="bi bi-signpost-2"></i>0.12 km</span></td>
                        <td>09:48:12 am</td>
                        <td>10:32:12 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="1" data-branch="West Mogappair" data-date="2026-09-26">
                        <td><span class="sno-value">23</span></td>
                        <td>
                            <div class="svr-name">GHARUDA SOFTWARE</div>
                            <div class="svr-sub">PH : 9865321470</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Balaji Electricals</div>
                            <div class="svr-sub">PH : 9840100077</div>
                        </td>
                        <td>26-09-2026</td>
                        <td>Industrial Estate Road, Ambattur, Chennai, Tamil Nadu, 600058, India</td>
                        <td>Industrial Estate Road, Ambattur, Chennai, Tamil Nadu, 600058, India</td>
                        <td><span class="svr-diff ok" data-sort="0.48"><i class="bi bi-signpost-2"></i>0.48 km</span></td>
                        <td>11:10:10 am</td>
                        <td>11:40:10 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="1" data-branch="West Mogappair" data-date="2026-09-26">
                        <td><span class="sno-value">24</span></td>
                        <td>
                            <div class="svr-name">GHARUDA SOFTWARE</div>
                            <div class="svr-sub">PH : 9865321470</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Kaveri Textiles</div>
                            <div class="svr-sub">PH : 9962700044</div>
                        </td>
                        <td>26-09-2026</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td><span class="svr-diff ok" data-sort="0.35"><i class="bi bi-signpost-2"></i>0.35 km</span></td>
                        <td>10:55:25 am</td>
                        <td>11:40:25 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="2" data-branch="Ambattur" data-date="2026-09-23">
                        <td><span class="sno-value">25</span></td>
                        <td>
                            <div class="svr-name">PREM KUMAR.R</div>
                            <div class="svr-sub">PH : 9840011223</div>
                            <div class="svr-sub">Work Branch : Ambattur</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Sri Murugan Traders</div>
                            <div class="svr-sub">PH : 9840300022</div>
                        </td>
                        <td>23-09-2026</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td><span class="svr-diff warn" data-sort="0.90"><i class="bi bi-signpost-2"></i>0.90 km</span></td>
                        <td>12:17:23 pm</td>
                        <td>12:48:23 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="3" data-branch="Anna Nagar" data-date="2026-09-23">
                        <td><span class="sno-value">26</span></td>
                        <td>
                            <div class="svr-name">Jude S</div>
                            <div class="svr-sub">PH : 9884455667</div>
                            <div class="svr-sub">Work Branch : Anna Nagar</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Ambal Foods</div>
                            <div class="svr-sub">PH : 9790800055</div>
                        </td>
                        <td>23-09-2026</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td><span class="svr-diff warn" data-sort="1.40"><i class="bi bi-signpost-2"></i>1.40 km</span></td>
                        <td>01:24:36 pm</td>
                        <td>01:56:36 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="2" data-branch="Ambattur" data-date="2026-09-23">
                        <td><span class="sno-value">27</span></td>
                        <td>
                            <div class="svr-name">PREM KUMAR.R</div>
                            <div class="svr-sub">PH : 9840011223</div>
                            <div class="svr-sub">Work Branch : Ambattur</div>
                        </td>
                        <td><span class="svr-type lead">Lead</span></td>
                        <td>
                            <div class="svr-name">Balaji Electricals</div>
                            <div class="svr-sub">PH : 9840100077</div>
                        </td>
                        <td>23-09-2026</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td>2nd Avenue, Anna Nagar East, Anna Nagar, Chennai, Tamil Nadu, 600102, India</td>
                        <td><span class="svr-diff ok" data-sort="0.48"><i class="bi bi-signpost-2"></i>0.48 km</span></td>
                        <td>11:02:38 am</td>
                        <td>11:48:38 am</td>
                    </tr>
                    <tr class="visit-row" data-staff="3" data-branch="Anna Nagar" data-date="2026-09-23">
                        <td><span class="sno-value">28</span></td>
                        <td>
                            <div class="svr-name">Jude S</div>
                            <div class="svr-sub">PH : 9884455667</div>
                            <div class="svr-sub">Work Branch : Anna Nagar</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Sri Murugan Traders</div>
                            <div class="svr-sub">PH : 9840300022</div>
                        </td>
                        <td>23-09-2026</td>
                        <td>Velachery Main Road, Vijaya Nagar, Velachery, Chennai, Tamil Nadu, 600042, India</td>
                        <td>Padi Kuppam Road, Thirumangalam, Anna Nagar West, Chennai, Tamil Nadu, 600040, India</td>
                        <td><span class="svr-diff warn" data-sort="0.90"><i class="bi bi-signpost-2"></i>0.90 km</span></td>
                        <td>12:09:51 pm</td>
                        <td>12:56:51 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="4" data-branch="West Mogappair" data-date="2026-09-20">
                        <td><span class="sno-value">29</span></td>
                        <td>
                            <div class="svr-name">KISHORE R</div>
                            <div class="svr-sub">PH : 9791122334</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Lakshmi Pharma</div>
                            <div class="svr-sub">PH : 9884200088</div>
                        </td>
                        <td>20-09-2026</td>
                        <td>Mogappair West Main Road, Nolambur, Ward 92, Zone 8 Ambattur, Chennai, Tamil Nadu, 600037, India</td>
                        <td>Velachery Main Road, Vijaya Nagar, Velachery, Chennai, Tamil Nadu, 600042, India</td>
                        <td><span class="svr-diff far" data-sort="2.30"><i class="bi bi-signpost-2"></i>2.30 km</span></td>
                        <td>02:31:49 pm</td>
                        <td>03:04:49 pm</td>
                    </tr>
                    <tr class="visit-row" data-staff="4" data-branch="West Mogappair" data-date="2026-09-20">
                        <td><span class="sno-value">30</span></td>
                        <td>
                            <div class="svr-name">KISHORE R</div>
                            <div class="svr-sub">PH : 9791122334</div>
                            <div class="svr-sub">Work Branch : West Mogappair</div>
                        </td>
                        <td><span class="svr-type customer">Customer</span></td>
                        <td>
                            <div class="svr-name">Ambal Foods</div>
                            <div class="svr-sub">PH : 9790800055</div>
                        </td>
                        <td>20-09-2026</td>
                        <td>Industrial Estate Road, Ambattur, Chennai, Tamil Nadu, 600058, India</td>
                        <td>Mother's Speciality Hospital, Old Township Road, Venkatapuram, Ambattur OT, Ward 81, Zone 7 Ambattur, Chennai Corporation, Ambattur, Thiruvallur, Tamil Nadu, 600053, India</td>
                        <td><span class="svr-diff warn" data-sort="1.40"><i class="bi bi-signpost-2"></i>1.40 km</span></td>
                        <td>01:16:04 pm</td>
                        <td>02:04:04 pm</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Slide-Over Offcanvas Filter Drawer -->
    <div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="svrFilterOffcanvas" aria-labelledby="svrFilterOffcanvasLabel" style="width: 380px;">
        <div class="offcanvas-header border-bottom bg-light py-3 px-4">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-chip bg-primary-subtle text-primary rounded-2 d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                    <i class="bi bi-sliders"></i>
                </div>
                <div>
                    <h6 class="offcanvas-title fw-bold mb-0 font-14" id="svrFilterOffcanvasLabel">Filter Location Visits</h6>
                    <span class="text-muted font-11">Narrow by visit type, staff, branch &amp; date range</span>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-4 py-3">
            <form id="svrFilterForm" autocomplete="off" onsubmit="return false;">
                <div class="mb-3">
                    <label class="form-label font-12 fw-semibold text-secondary mb-1" for="svrTypeFilter">Visit Category / Variance</label>
                    <select class="form-select font-13" id="svrTypeFilter">
                        <option value="all">All Visits</option>
                        <option value="lead">Lead Visits Only</option>
                        <option value="customer">Customer Visits Only</option>
                        <option value="high_diff">High GPS Variance (&gt; 1.0 km)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label font-12 fw-semibold text-secondary mb-1" for="svrStaff">Field Staff</label>
                    <select class="form-select select2" id="svrStaff">
                        <option value="0">All Staff</option>
                        <option value="1">GHARUDA SOFTWARE</option>
                        <option value="2">PREM KUMAR.R</option>
                        <option value="3">Jude S</option>
                        <option value="4">KISHORE R</option>
                        <option value="5">Prabhu S</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label font-12 fw-semibold text-secondary mb-1" for="svrBranch">Work Branch</label>
                    <select class="form-select select2" id="svrBranch">
                        <option value="">All Branches</option>
                        <option value="West Mogappair">West Mogappair</option>
                        <option value="Ambattur">Ambattur</option>
                        <option value="Anna Nagar">Anna Nagar</option>
                        <option value="Velachery">Velachery</option>
                    </select>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="svrFrom">From Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="svrFrom" value="17-09-2026" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="svrTo">To Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="svrTo" value="17-10-2026" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label font-12 fw-semibold text-secondary mb-1" for="svrKeywordFilter">Keyword / Location Search</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control border-start-0 font-13" id="svrKeywordFilter" placeholder="Lead name, phone, street or pincode...">
                    </div>
                </div>
            </form>
        </div>
        <div class="offcanvas-footer border-top bg-light p-3 d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-semibold font-13" id="svrReset">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
            </button>
            <button type="button" class="btn btn-primary flex-fill fw-semibold font-13" id="svrSearch" data-bs-dismiss="offcanvas">
                <i class="bi bi-check2-circle me-1"></i>Apply Filters
            </button>
        </div>
    </div>

    <!-- Visit 360° Location Audit Modal -->
    <div class="modal fade" id="svrDetailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header bg-light border-bottom py-3 px-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-chip bg-primary-subtle text-primary rounded-3 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                            <i class="bi bi-geo-alt-fill fs-5"></i>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <h5 class="modal-title fw-bold mb-0 font-16" id="svrModalLeadName">Visit Location Audit</h5>
                                <span id="svrModalTypeBadge"></span>
                                <span id="svrModalDiffBadge"></span>
                            </div>
                            <div class="text-muted font-12">
                                <i class="bi bi-calendar3 me-1"></i><span id="svrModalDate">-</span>
                                <span class="mx-2">&bull;</span>
                                <i class="bi bi-clock-history me-1"></i>Duration: <strong class="text-dark" id="svrModalDuration">-</strong>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 border bg-light-subtle h-100">
                                <div class="text-uppercase text-muted fw-bold font-11 mb-2"><i class="bi bi-person-badge me-1 text-primary"></i>Field Staff Details</div>
                                <div class="fw-bold text-dark font-14 mb-1" id="svrModalStaffName">-</div>
                                <div class="text-secondary font-12 mb-1"><i class="bi bi-telephone me-1"></i><span id="svrModalStaffPhone">-</span></div>
                                <div class="text-secondary font-12"><i class="bi bi-diagram-3 me-1"></i><span id="svrModalStaffBranch">-</span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 border bg-light-subtle h-100">
                                <div class="text-uppercase text-muted fw-bold font-11 mb-2"><i class="bi bi-building me-1 text-success"></i>Visited Lead / Customer</div>
                                <div class="fw-bold text-dark font-14 mb-1" id="svrModalPartyName">-</div>
                                <div class="text-secondary font-12 mb-1"><i class="bi bi-telephone me-1"></i><span id="svrModalPartyPhone">-</span></div>
                                <div class="text-secondary font-12"><i class="bi bi-clock me-1"></i>In: <strong class="text-success" id="svrModalInTime">-</strong> &nbsp;|&nbsp; Out: <strong class="text-danger" id="svrModalOutTime">-</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 border h-100">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="text-uppercase text-muted fw-bold font-11"><i class="bi bi-pin-map-fill text-primary me-1"></i>Original Registered Location</span>
                                    <a href="#" target="_blank" rel="noopener" id="svrModalOrigMapLink" class="font-11 fw-semibold text-primary text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i>Map
                                    </a>
                                </div>
                                <p class="font-13 text-dark mb-0" id="svrModalOrigAddr">-</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 border h-100">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="text-uppercase text-muted fw-bold font-11"><i class="bi bi-crosshair text-success me-1"></i>Actual GPS Check-in Location</span>
                                    <a href="#" target="_blank" rel="noopener" id="svrModalCurrMapLink" class="font-11 fw-semibold text-success text-decoration-none">
                                        <i class="bi bi-box-arrow-up-right me-1"></i>Map
                                    </a>
                                </div>
                                <p class="font-13 text-dark mb-0" id="svrModalCurrAddr">-</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-top py-2 px-4 justify-content-between">
                    <a href="staff-visting-report.php" class="btn btn-light border fw-semibold font-13">
                        <i class="bi bi-signpost-split me-1 text-primary"></i>Staff Visiting Summary
                    </a>
                    <div class="d-flex gap-2">
                        <a href="#" target="_blank" rel="noopener" id="svrModalDirectionsBtn" class="btn btn-outline-primary fw-semibold font-13">
                            <i class="bi bi-compass me-1"></i>Compare Route on Google Maps
                        </a>
                        <button type="button" class="btn btn-secondary fw-semibold font-13" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    (function() {
        'use strict';

        var DEFAULT_FROM = '17-09-2026';
        var DEFAULT_TO = '17-10-2026';

        var tbody = document.getElementById('svrTbody');
        var table = document.getElementById('svrTable');

        // Inject unclipped Action dropdown column and metadata attributes before AutoMasterTable snapshots rows
        Array.prototype.forEach.call(tbody.querySelectorAll('tr'), function(tr) {
            var typeBadge = tr.querySelector('.svr-type');
            var diffBadge = tr.querySelector('.svr-diff');
            var vType = typeBadge && typeBadge.classList.contains('customer') ? 'customer' : 'lead';
            var vDiff = diffBadge ? parseFloat(diffBadge.getAttribute('data-sort') || '0') : 0;

            tr.setAttribute('data-type', vType);
            tr.setAttribute('data-diff', String(vDiff));

            var actionTd = document.createElement('td');
            actionTd.className = 'text-end pe-3';
            actionTd.innerHTML =
                '<div class="dropdown d-inline-block">' +
                    '<button class="btn btn-table-action dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                        '<i class="bi bi-three-dots-vertical"></i> Actions' +
                    '</button>' +
                    '<ul class="dropdown-menu dropdown-menu-end table-action-menu shadow-lg border-0 p-2">' +
                        '<li><button type="button" class="dropdown-item rounded-2 py-2 svr-act-view"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-eye"></i></span><span>Visit 360° Location Audit</span></button></li>' +
                        '<li><button type="button" class="dropdown-item rounded-2 py-2 svr-act-map"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-compass"></i></span><span>Compare on Google Maps</span></button></li>' +
                        '<li><a class="dropdown-item rounded-2 py-2" href="staff-visting-report.php"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-signpost-split"></i></span><span>Staff Visiting Summary</span></a></li>' +
                        '<li><hr class="dropdown-divider my-1"></li>' +
                        '<li><button type="button" class="dropdown-item rounded-2 py-2 text-danger svr-act-delete"><span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash3"></i></span><span>Remove Visit Log</span></button></li>' +
                    '</ul>' +
                '</div>';
            tr.appendChild(actionTd);
        });

        // Keep a pristine copy of the static rows (taken before the datatable initialises)
        var allRows = Array.prototype.map.call(tbody.querySelectorAll('tr'), function(tr) {
            return {
                staff: tr.getAttribute('data-staff'),
                branch: tr.getAttribute('data-branch'),
                date: tr.getAttribute('data-date'), // yyyy-mm-dd
                type: tr.getAttribute('data-type') || 'lead',
                diff: parseFloat(tr.getAttribute('data-diff') || '0'),
                text: (tr.textContent || '').toLowerCase(),
                html: tr.outerHTML
            };
        });

        // dd-mm-yyyy  ->  yyyy-mm-dd (or '' when invalid)
        function dmyToISO(str) {
            var m = /^(\d{2})-(\d{2})-(\d{4})$/.exec((str || '').trim());
            return m ? (m[3] + '-' + m[2] + '-' + m[1]) : '';
        }

        function isoToDMY(iso) {
            var p = iso.split('-');
            return p[2] + '-' + p[1] + '-' + p[0];
        }

        function updateFilterBadge() {
            var count = 0;
            var typeVal = document.getElementById('svrTypeFilter').value;
            var staffVal = document.getElementById('svrStaff').value;
            var branchVal = document.getElementById('svrBranch').value;
            var fromVal = document.getElementById('svrFrom').value;
            var toVal = document.getElementById('svrTo').value;
            var kwVal = (document.getElementById('svrKeywordFilter').value || '').trim();

            if (typeVal !== 'all') count++;
            if (staffVal !== '0') count++;
            if (branchVal !== '') count++;
            if (fromVal && fromVal !== DEFAULT_FROM) count++;
            if (toVal && toVal !== DEFAULT_TO) count++;
            if (kwVal !== '') count++;

            var badge = document.getElementById('svrFilterCountBadge');
            if (badge) {
                badge.textContent = count;
                badge.classList.toggle('d-none', count === 0);
            }
        }

        function syncHeaderTabs(typeVal) {
            var tabs = document.querySelectorAll('#svrTypeTabs .nav-link');
            Array.prototype.forEach.call(tabs, function(btn) {
                btn.classList.toggle('active', btn.getAttribute('data-type') === typeVal);
            });
        }

        function applyFilter() {
            var typeVal = document.getElementById('svrTypeFilter').value;
            var staff = document.getElementById('svrStaff').value;
            var branch = document.getElementById('svrBranch').value;
            var fromEl = document.getElementById('svrFrom');
            var toEl = document.getElementById('svrTo');
            var kw = (document.getElementById('svrKeywordFilter').value || '').trim().toLowerCase();
            var from = dmyToISO(fromEl.value);
            var to = dmyToISO(toEl.value);

            // swap when From is after To
            if (from && to && from > to) {
                var t = from;
                from = to;
                to = t;
                fromEl.value = isoToDMY(from);
                toEl.value = isoToDMY(to);
            }

            syncHeaderTabs(typeVal);
            updateFilterBadge();

            var html = allRows.filter(function(r) {
                if (typeVal === 'lead' && r.type !== 'lead') return false;
                if (typeVal === 'customer' && r.type !== 'customer') return false;
                if (typeVal === 'high_diff' && r.diff < 1.0) return false;
                if (staff !== '0' && r.staff !== staff) return false;
                if (branch !== '' && r.branch !== branch) return false;
                if (from && r.date < from) return false;
                if (to && r.date > to) return false;
                if (kw && r.text.indexOf(kw) === -1) return false;
                return true;
            }).map(function(r) {
                return r.html;
            }).join('');

            tbody.innerHTML = html;
            if (table && table.autoTable) table.autoTable.refresh(); // re-run search / sort / pagination / S.No
        }

        // Header Nav-Pills Click Sync
        var tabButtons = document.querySelectorAll('#svrTypeTabs .nav-link');
        Array.prototype.forEach.call(tabButtons, function(btn) {
            btn.addEventListener('click', function() {
                var t = btn.getAttribute('data-type') || 'all';
                document.getElementById('svrTypeFilter').value = t;
                applyFilter();
            });
        });

        document.getElementById('svrSearch').addEventListener('click', applyFilter);

        document.getElementById('svrReset').addEventListener('click', function() {
            document.getElementById('svrTypeFilter').value = 'all';
            document.getElementById('svrStaff').value = '0';
            document.getElementById('svrBranch').value = '';
            document.getElementById('svrKeywordFilter').value = '';
            if (window.jQuery) window.jQuery('#svrStaff, #svrBranch').trigger('change'); // refresh select2
            document.getElementById('svrFrom').value = DEFAULT_FROM;
            document.getElementById('svrTo').value = DEFAULT_TO;
            applyFilter();
        });

        // Parse 12-hour time string "02:35:45 pm" into minutes from midnight
        function parseTimeMins(str) {
            var m = /(\d{1,2}):(\d{2}):(\d{2})\s*(am|pm)/i.exec((str || '').trim());
            if (!m) return null;
            var hh = parseInt(m[1], 10);
            var mm = parseInt(m[2], 10);
            var ap = m[4].toLowerCase();
            if (ap === 'pm' && hh < 12) hh += 12;
            if (ap === 'am' && hh === 12) hh = 0;
            return hh * 60 + mm;
        }

        function extractRowDetails(tr) {
            var cells = tr.querySelectorAll('td');
            if (cells.length < 10) return null;

            var staffNameEl = cells[1].querySelector('.svr-name');
            var staffSubs = cells[1].querySelectorAll('.svr-sub');
            var partyNameEl = cells[3].querySelector('.svr-name');
            var partySubEl = cells[3].querySelector('.svr-sub');

            var origAddr = (cells[5].textContent || '').trim();
            var currAddr = (cells[6].textContent || '').trim();
            var inTime = (cells[8].textContent || '').trim();
            var outTime = (cells[9].textContent || '').trim();

            var inMins = parseTimeMins(inTime);
            var outMins = parseTimeMins(outTime);
            var durationStr = '-';
            if (inMins !== null && outMins !== null && outMins >= inMins) {
                durationStr = (outMins - inMins) + ' mins';
            }

            return {
                staffName: staffNameEl ? staffNameEl.textContent.trim() : '-',
                staffPhone: staffSubs[0] ? staffSubs[0].textContent.trim() : '-',
                staffBranch: staffSubs[1] ? staffSubs[1].textContent.trim() : '-',
                typeHtml: cells[2].innerHTML,
                partyName: partyNameEl ? partyNameEl.textContent.trim() : '-',
                partyPhone: partySubEl ? partySubEl.textContent.trim() : '-',
                date: (cells[4].textContent || '').trim(),
                origAddr: origAddr,
                currAddr: currAddr,
                diffHtml: cells[7].innerHTML,
                inTime: inTime,
                outTime: outTime,
                duration: durationStr
            };
        }

        function openVisit360Modal(tr) {
            var info = extractRowDetails(tr);
            if (!info) return;

            document.getElementById('svrModalLeadName').textContent = info.partyName;
            document.getElementById('svrModalTypeBadge').innerHTML = info.typeHtml;
            document.getElementById('svrModalDiffBadge').innerHTML = info.diffHtml;
            document.getElementById('svrModalDate').textContent = info.date;
            document.getElementById('svrModalDuration').textContent = info.duration;

            document.getElementById('svrModalStaffName').textContent = info.staffName;
            document.getElementById('svrModalStaffPhone').textContent = info.staffPhone;
            document.getElementById('svrModalStaffBranch').textContent = info.staffBranch;

            document.getElementById('svrModalPartyName').textContent = info.partyName;
            document.getElementById('svrModalPartyPhone').textContent = info.partyPhone;
            document.getElementById('svrModalInTime').textContent = info.inTime;
            document.getElementById('svrModalOutTime').textContent = info.outTime;

            document.getElementById('svrModalOrigAddr').textContent = info.origAddr;
            document.getElementById('svrModalCurrAddr').textContent = info.currAddr;

            var origUrl = 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(info.origAddr);
            var currUrl = 'https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(info.currAddr);
            var dirUrl = 'https://www.google.com/maps/dir/?api=1&origin=' + encodeURIComponent(info.origAddr) + '&destination=' + encodeURIComponent(info.currAddr);

            document.getElementById('svrModalOrigMapLink').setAttribute('href', origUrl);
            document.getElementById('svrModalCurrMapLink').setAttribute('href', currUrl);
            document.getElementById('svrModalDirectionsBtn').setAttribute('href', dirUrl);

            var modalEl = document.getElementById('svrDetailModal');
            if (modalEl && window.bootstrap) {
                window.bootstrap.Modal.getOrCreateInstance(modalEl).show();
            }
        }

        // Row Click & Action Menu Delegation
        tbody.addEventListener('click', function(e) {
            var tr = e.target.closest('tr');
            if (!tr) return;

            var viewBtn = e.target.closest('.svr-act-view');
            if (viewBtn) {
                e.preventDefault();
                openVisit360Modal(tr);
                return;
            }

            var mapBtn = e.target.closest('.svr-act-map');
            if (mapBtn) {
                e.preventDefault();
                var info = extractRowDetails(tr);
                if (info) {
                    var dirUrl = 'https://www.google.com/maps/dir/?api=1&origin=' + encodeURIComponent(info.origAddr) + '&destination=' + encodeURIComponent(info.currAddr);
                    window.open(dirUrl, '_blank', 'noopener');
                }
                return;
            }

            var delBtn = e.target.closest('.svr-act-delete');
            if (delBtn) {
                e.preventDefault();
                tr.remove();
                if (table && table.autoTable) table.autoTable.refresh();
                return;
            }

            // Ignore clicks inside action dropdown or interactive controls
            if (e.target.closest('.btn-table-action, .lead-act-btn, .dropdown, .dropdown-menu, a, button, input')) {
                return;
            }

            openVisit360Modal(tr);
        });
    })();
</script>

<?php include 'footer.php'; ?>
