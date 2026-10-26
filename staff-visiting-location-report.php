<?php include 'header.php'; ?>


<style>
    /* Report switch tabs */
    .report-switch-tabs {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .rstab {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 700;
        color: #374151;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 9px 18px;
        text-decoration: none;
        transition: .15s;
    }

    .rstab i {
        font-size: 14px;
        color: #6b7280;
    }

    .rstab:hover {
        border-color: #86efac;
        color: #15803d;
        text-decoration: none;
    }

    .rstab:hover i {
        color: #15803d;
    }

    .rstab.active {
        background: linear-gradient(135deg, #16a34a, #15803d);
        border-color: transparent;
        color: #fff;
        box-shadow: 0 2px 6px rgba(22, 163, 74, .3);
    }

    .rstab.active i {
        color: #fff;
    }

    .svr-page .table-modern thead th,
    .svr-page .table-modern tbody td {
        padding-left: 12px;
        padding-right: 12px;
        white-space: nowrap;
        vertical-align: top;
    }

    .svr-page .table-modern thead th:nth-child(1) {
        width: 60px;
    }

    /* long address columns wrap */
    .svr-page .table-modern tbody td:nth-child(6),
    .svr-page .table-modern tbody td:nth-child(7) {
        white-space: normal;
        min-width: 240px;
        max-width: 300px;
        color: var(--ink-500);
        font-size: 12.5px;
    }

    .svr-page .svr-name {
        font-weight: 700;
        color: var(--ink-900);
    }

    .svr-page .svr-sub {
        font-size: 11.5px;
        color: var(--ink-500);
        font-weight: 600;
    }

    .svr-page .svr-type {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 800;
    }

    .svr-page .svr-type.lead {
        color: #3564e0;
        background: #eaf0fe;
    }

    .svr-page .svr-type.customer {
        color: var(--primary-dark);
        background: var(--primary-light);
    }

    .svr-page .svr-diff {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 800;
    }

    .svr-page .svr-diff.ok {
        color: var(--primary-dark);
        background: var(--primary-light);
    }

    .svr-page .svr-diff.warn {
        color: #a3670a;
        background: var(--accent-amber-soft);
    }

    .svr-page .svr-diff.far {
        color: #c0362c;
        background: var(--accent-red-soft);
    }
</style>

<main class="svr-page">

    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Staff Visiting Location Report</h1>
        </div>
    </div>

    <!-- Report switch tabs -->
    <div class="report-switch-tabs" style="margin-bottom:12px;">
        <a class="rstab" href="staff-visting-report.php"><i class="bi bi-signpost-split"></i>Staff Visiting Reports</a>
        <a class="rstab active" href="staff-visiting-location-report.php"><i class="bi bi-geo-alt"></i>Staff Visiting Location Report</a>
    </div>

    <!-- Filters -->
    <form id="svrFilterForm" class="card-custom mb-3 filters-card" autocomplete="off" onsubmit="return false;">
        <div class="row g-3 align-items-end">
            <div class="col-lg-3 col-md-6">
                <label class="form-label" for="svrStaff">Staff</label>
                <select class="form-select select2" id="svrStaff">
                    <option value="0">All Staff</option>
                    <option value="1">GHARUDA SOFTWARE</option>
                    <option value="2">PREM KUMAR.R</option>
                    <option value="3">Jude S</option>
                    <option value="4">KISHORE R</option>
                    <option value="5">Prabhu S</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-6">
                <label class="form-label" for="svrBranch">Branch</label>
                <select class="form-select select2" id="svrBranch">
                    <option value="">All Branches</option>
                    <option value="West Mogappair">West Mogappair</option>
                    <option value="Ambattur">Ambattur</option>
                    <option value="Anna Nagar">Anna Nagar</option>
                    <option value="Velachery">Velachery</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <label class="form-label" for="svrFrom">From Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="svrFrom" value="17-09-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <label class="form-label" for="svrTo">To Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="svrTo" value="17-10-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-reject flex-fill" id="svrReset">Reset</button>
                    <button type="button" class="btn btn-primary flex-fill" id="svrSearch"><i class="bi bi-search me-1"></i>Search</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Table (toolbar, columns, export, search, show entries & pagination are auto-created by the "datatable" class) -->
    <div class="card-custom p-0">
        <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">Lead Visits</h3>
                </div>
            </div>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="svrTable" data-table-name="Lead Visits">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Staff Name</th>
                        <th>Type</th>
                        <th>Lead Name</th>
                        <th>Date</th>
                        <th>Original Location</th>
                        <th>Current Checkin Location</th>
                        <th>Checkin Difference</th>
                        <th>In-Time</th>
                        <th>Out-Time</th>
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
</main>

<script src="./assets/js/pages/staff-visiting-location-report.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
