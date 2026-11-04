<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/lead.css">

<?php
/* ---------------------------------------------------------------
   Follow Up List — lead.php Activity Stats "Follow Up" card click
   la open aagum. Range (today/weekly/monthly) + type (actual/completed)
   GET params vechu pre-set aagum.
---------------------------------------------------------------- */
$range = isset($_GET['range']) ? $_GET['range'] : 'today';
if (!in_array($range, ['today', 'weekly', 'monthly', 'all'], true)) $range = 'today';
$type = isset($_GET['type']) ? $_GET['type'] : 'actual';
if (!in_array($type, ['actual', 'completed'], true)) $type = 'actual';
?>

<style>
    /* ===== Follow Up List page — scoped to .ful-page ===== */
    .ful-page .ful-date-range {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-700);
        white-space: nowrap;
    }

    .ful-page .ful-date-range i {
        color: var(--primary);
    }



    /* ----- Actual / Completed toggle ----- */
    .ful-page .ful-type-toggle {
        display: inline-flex;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
    }

    .ful-page .ful-type-toggle button {
        border: none;
        background: transparent;
        padding: 8px 16px;
        font-size: 12px;
        font-weight: 800;
        color: var(--ink-500);
        cursor: pointer;
        transition: .15s;
    }

    .ful-page .ful-type-toggle button.active {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .ful-page .ful-type-toggle button+button {
        border-left: 1px solid #eef0f3;
    }

    /* ----- Total value chip ----- */
    .ful-page .ful-total-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #f0fbf3 0%, #ffffff 80%);
        border: 1px solid rgba(22, 163, 74, .35);
        border-radius: 12px;
        padding: 8px 14px;
        font-size: 12px;
        font-weight: 700;
        color: var(--ink-700);
        white-space: nowrap;
    }

    .ful-page .ful-total-chip b {
        font-size: 14px;
        font-weight: 800;
        color: var(--primary-dark);
    }

    /* ----- Status / call chips ----- */
    .ful-page .ful-chip {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .ful-page .ful-chip.c-green { background: #dcfce7; color: #16a34a; }
    .ful-page .ful-chip.c-blue  { background: #dbeafe; color: #2563eb; }
    .ful-page .ful-chip.c-amber { background: #fef3c7; color: #d97706; }
    .ful-page .ful-chip.c-violet{ background: #ede9fe; color: #7c3aed; }
    .ful-page .ful-chip.c-red   { background: #fee2e2; color: #dc2626; }
    .ful-page .ful-chip.c-gray  { background: #f1f5f9; color: #64748b; }

    .ful-page .ful-name {
        font-weight: 700;
        color: var(--ink-900);
        text-decoration: none;
        cursor: default;
    }

    .ful-page .ful-name:hover {
        /* color: var(--primary-dark); */
        /* text-decoration: underline; */
    }

    .ful-page .ful-phone {
        color: var(--ink-700);
        text-decoration: none;
        white-space: nowrap;
    }

    .ful-page .ful-phone:hover {
        color: var(--primary-dark);
    }

    .ful-page .ful-val {
        font-weight: 800;
        color: var(--ink-900);
        white-space: nowrap;
    }

        .ful-page .card-custom {
        overflow: visible !important;
    }

    .ful-page .table-modern-wrap {
        min-height: 440px;
        padding-bottom: 50px;
    }

    .ful-page .ful-name {
        cursor: pointer !important;
        color: #0f172a !important;
        font-weight: 700;
        transition: color 0.15s ease;
    }

    .ful-page .ful-name:hover {
        color: var(--primary) !important;
        text-decoration: underline;
    }

    .ful-page .table-modern thead th,
    .ful-page .table-modern tbody td {
        white-space: nowrap;
    }

    .ful-page .ful-empty {
        text-align: center;
        padding: 34px 10px !important;
        color: var(--ink-500);
        font-weight: 600;
    }


</style>

<main class="ful-page">
    <!-- Page Header & Action Bar in Single Row (lead.php style, no breadcrumb) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;font-size:18px;">
                <i class="bi bi-arrow-repeat"></i>
            </div>
            <div class="ps-2">
                <h1 class="font-display fw-bold mb-0 page-title fs-4">Follow Up List</h1>
                <span class="text-muted font-11 d-none d-sm-inline">Manage scheduled call reminders, customer touchpoints &amp; pipeline activities</span>
            </div>
        </div>

        <!-- RIGHT: Actions in Single Row -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="ful-type-toggle" id="fulRangeToggle">
                <button type="button" data-range="today">Today</button>
                <button type="button" data-range="weekly">This Week</button>
                <button type="button" data-range="monthly">This Month</button>
                <button type="button" data-range="all">All</button>
            </div>
            <div class="ful-type-toggle" id="fulTypeToggle">
                <button type="button" data-type="actual">Actual</button>
                <button type="button" data-type="completed">Completed</button>
            </div>
            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="offcanvas" data-bs-target="#fulFilterOffcanvas" aria-controls="fulFilterOffcanvas" id="fulOffcanvasFilterBtn">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="fulFilterCountBadge">0</span>
            </button>
            <div class="dropdown">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                    <i class="bi bi-lightning-charge-fill"></i><span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu" style="min-width: 230px;">
                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Quick Actions</li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="appointments.php"><span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-calendar2-week"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Book Appointment</div><div class="text-muted" style="font-size:10px;">Schedule demo / visit</div></div></a></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="quotation-create.php"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-file-earmark-text"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Create Quotation</div><div class="text-muted" style="font-size:10px;">Issue GST proposal</div></div></a></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="customer-new.php"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-person-check"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">New Customer</div><div class="text-muted" style="font-size:10px;">Add customer record</div></div></a></li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="lead.php"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-person-lines-fill"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Back to Leads</div><div class="text-muted" style="font-size:10px;">View all leads pipeline</div></div></a></li>
                </ul>
            </div>
            <div class="ful-date-range ms-1 d-none d-md-inline-flex">
                <i class="bi bi-calendar3 me-1"></i><span id="fulToday"></span>
            </div>
        </div>
    </div>





    <!-- ===== Table card (MasterTable flow — toolbar/footer/search/export auto) ===== -->
    <div class="card-custom p-0" style="overflow: visible;">
        <!-- Total value + count chip (MasterTable toolbar ku mela) -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 px-3 pt-3 pb-0">
            <div class="ful-total-chip">
                <i class="bi bi-cash-stack" style="color:var(--primary-dark);"></i>
                Total Value : <b id="fulTotalValue">₹ 0.00</b>
            </div>
            <div class="small text-muted text-nowrap" id="fulShowing">Showing 0 follow-ups</div>
        </div>
        <!-- Table (toolbar auto-created by master-table.js) -->
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 mb-0" id="fulTable">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Company Name</th>
                        <th>Lead Value</th>
                        <th>Closure Date</th>
                        <th>Next Reminder Date</th>
                        <th>Product</th>
                        <th>Assigned</th>
                        <th>Sourcer</th>
                        <th>Status</th>
                        <th>Call Status</th>
                        <th class="text-end pe-3">Action</th>
                    </tr>
                </thead>
                <tbody id="fulTbody">
                    <!-- Rows injected by master-table.js -->
                </tbody>
            </table>
        </div>
        <!-- Footer (showing + pagination auto-created by master-table.js) -->
    </div>


<!-- ===== Follow-Up Filter Offcanvas (lead.php style) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="fulFilterOffcanvas" aria-labelledby="fulFilterOffcanvasLabel" style="width: 380px;">
    <div class="offcanvas-header border-bottom py-3 px-3">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2 mb-0" id="fulFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Follow-Ups
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1">Staff Members / Assigned</label>
            <select class="form-select select2 form-select-sm" id="fulAssigned" data-label="Assigned" onchange="window.updateFulBadge && window.updateFulBadge()">
                <option value="">All Staff</option>
                <option>GHARUDA SOFTWARE</option>
                <option>Harish D.</option>
                <option>Divya A.</option>
                <option>Karthik R.</option>
                <option>Priya S.</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1">Lead Status</label>
            <select class="form-select select2 form-select-sm" id="fulStatus" multiple data-label="Status" onchange="window.updateFulBadge && window.updateFulBadge()">
                <option selected>Lead</option>
                <option selected>Quotation</option>
                <option selected>Followup</option>
                <option selected>Qualified</option>
                <option selected>DIRECT</option>
                <option>New Enquiry</option>
                <option>New</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1">Call Status</label>
            <select class="form-select select2 form-select-sm" id="fulCallStatus" onchange="window.updateFulBadge && window.updateFulBadge()">
                <option value="">All Call Statuses</option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Missed">Missed</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1">Product Scope</label>
            <select class="form-select select2 form-select-sm" id="fulProduct" onchange="window.updateFulBadge && window.updateFulBadge()">
                <option value="">All Products</option>
                <option value="Solar">Solar Panel</option>
                <option value="Inverter">Inverter</option>
                <option value="CCTV">CCTV</option>
                <option value="AMC">AMC Contract</option>
                <option value="Automation">Home Automation</option>
            </select>
        </div>
        <div class="row g-2 mb-3">
            <div class="col-6">
                <label class="form-label text-muted small fw-bold mb-1">From Date</label>
                <input type="date" class="form-control form-control-sm" id="fulFrom" onchange="window.updateFulBadge && window.updateFulBadge()">
            </div>
            <div class="col-6">
                <label class="form-label text-muted small fw-bold mb-1">To Date</label>
                <input type="date" class="form-control form-control-sm" id="fulTo" onchange="window.updateFulBadge && window.updateFulBadge()">
            </div>
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2 bg-light-subtle">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill text-nowrap" id="fulClear">Clear Filters</button>
        <button type="button" class="btn btn-primary btn-sm flex-fill text-nowrap" id="fulSubmit">
            <i class="bi bi-funnel"></i> Apply Filters
        </button>
    </div>
</div>

<!-- ===== Lead 360 Detail Modal for Follow-Up List ===== -->
<div class="modal fade" id="fulDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <!-- Modal Header -->
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-person-vcard fs-5"></i>
                    </span>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-5" id="fulModalName">Lead Details</h5>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill font-11 px-2.5 py-0.5" id="fulModalStatus">Followup</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5" id="fulModalCall">Pending</span>
                        </div>
                        <div class="small text-muted" id="fulModalCompany">Lead Overview &amp; Follow-up Details</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4 bg-white">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Lead Value</span>
                            <h6 class="fw-bold text-success mb-0 fs-6" id="fulModalValue">₹ 0.00</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Product Scope</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6 text-truncate" id="fulModalProduct">—</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Next Reminder</span>
                            <h6 class="fw-bold text-primary mb-0 fs-6" id="fulModalReminder">—</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Closure Target</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="fulModalClosure">—</h6>
                        </div>
                    </div>
                </div>

                <!-- Info Grid -->
                <div class="card border border-light-subtle rounded-3 p-3 mb-4">
                    <h6 class="fw-bold text-dark mb-3 font-13 text-uppercase" style="letter-spacing:0.5px;">
                        <i class="bi bi-info-circle text-primary me-1.5"></i>Contact &amp; Assignment
                    </h6>
                    <div class="row g-3 font-13">
                        <div class="col-sm-6">
                            <div class="text-muted small">Phone Number</div>
                            <div class="fw-semibold mt-0.5">
                                <a href="#" id="fulModalPhoneLink" class="text-decoration-none text-dark"><i class="bi bi-telephone text-primary me-1"></i><span id="fulModalPhone">—</span></a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">WhatsApp</div>
                            <div class="fw-semibold mt-0.5">
                                <a href="#" id="fulModalWaLink" target="_blank" class="text-decoration-none text-success"><i class="bi bi-whatsapp me-1"></i>Chat on WhatsApp</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Assigned Staff</div>
                            <div class="fw-semibold text-dark mt-0.5" id="fulModalAssigned">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Sourcer Channel</div>
                            <div class="fw-semibold text-dark mt-0.5" id="fulModalSourcer">—</div>
                        </div>
                    </div>
                </div>

                <!-- Fast Actions -->
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">
                    <span class="text-muted small fw-semibold">Quick Actions:</span>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <a href="#" id="fulModalMeetBtn" class="btn btn-sm btn-outline-warning d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-calendar2-week"></i> Schedule Meeting
                        </a>
                        <a href="#" id="fulModalQuoteBtn" class="btn btn-sm btn-outline-info d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-file-earmark-text"></i> Create Quotation
                        </a>
                        <a href="#" id="fulModalConvertBtn" class="btn btn-sm btn-success d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-person-check"></i> Convert Customer
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

</main>

<?php include 'footer.php'; ?>

<script>
    (function() {
        'use strict';

        /* ---------- Helpers ---------- */
        var pad = function(n) { return String(n).padStart(2, '0'); };
        function fmtDMY(d) { return pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear(); }
        function fmtISO(d) { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }
        function inrFmt(n) {
            var s = n.toFixed(2).split('.');
            var int = s[0], last3 = int.slice(-3), rest = int.slice(0, -3);
            if (rest) rest = rest.replace(/\B(?=(\d{2})+(?!\d))/g, ',') + ',';
            return '\u20B9 ' + rest + last3 + '.' + s[1];
        }
        function midnight(d) { return new Date(d.getFullYear(), d.getMonth(), d.getDate()); }

        var TODAY = midnight(new Date());
        document.getElementById('fulToday').textContent = fmtDMY(TODAY);

        /* ---------- Dummy follow-up data (reminder dates: today oda relative offset) ---------- */
        function rel(days) { var d = new Date(TODAY); d.setDate(d.getDate() + days); return d; }
        var fulData = [
            { id: 1,  name: 'Suresh Babu',   phone: '9500123456', company: 'GHARUDA TECHNOLOGY', value: 23629,    reminder: rel(0),  closure: rel(12), product: 'Solar Panel 3kW',   assigned: 'GHARUDA SOFTWARE', sourcer: 'IndiaMART',  status: 'Followup',    call: 'Pending' },
            { id: 2,  name: 'Ravi Kumar',    phone: '9841023456', company: 'Ravi Enterprises',   value: 48500,    reminder: rel(0),  closure: rel(20), product: 'Inverter 5kVA',     assigned: 'Harish D.',        sourcer: 'Website',    status: 'Quotation',   call: 'Completed' },
            { id: 3,  name: 'Priya R',       phone: '9791023456', company: 'Sri Priya Traders',  value: 15600,    reminder: rel(1),  closure: rel(9),  product: 'CCTV 4-Cam Kit',    assigned: 'Divya A.',         sourcer: 'Referral',   status: 'Lead',        call: 'Pending' },
            { id: 4,  name: 'Karthik M',     phone: '9884023456', company: 'KM Solar Solutions', value: 112000,   reminder: rel(2),  closure: rel(18), product: 'Solar Panel 5kW',   assigned: 'GHARUDA SOFTWARE', sourcer: 'IndiaMART',  status: 'Qualified',   call: 'Pending' },
            { id: 5,  name: 'Divya Shankar', phone: '9962023456', company: 'DS Interiors',       value: 30800,    reminder: rel(3),  closure: rel(15), product: 'AMC Contract',      assigned: 'Priya S.',         sourcer: 'Facebook Ads', status: 'Followup',  call: 'Missed' },
            { id: 6,  name: 'Mohan Raj',     phone: '9176023456', company: 'MR Motors',          value: 75999,    reminder: rel(4),  closure: rel(25), product: 'Home Automation',   assigned: 'Karthik R.',       sourcer: 'Google Ads', status: 'Quotation',   call: 'Completed' },
            { id: 7,  name: 'Lakshmi Devi',  phone: '9345023456', company: 'Lakshmi Textiles',   value: 18999,    reminder: rel(6),  closure: rel(28), product: 'Solar Street Light',assigned: 'Divya A.',         sourcer: 'Walk-in',    status: 'Lead',        call: 'Pending' },
            { id: 8,  name: 'Arun Prakash',  phone: '9094023456', company: 'AP Constructions',   value: 254000,   reminder: rel(8),  closure: rel(35), product: 'Solar Panel 10kW',  assigned: 'GHARUDA SOFTWARE', sourcer: 'IndiaMART',  status: 'DIRECT',      call: 'Completed' },
            { id: 9,  name: 'Nithya Sri',    phone: '9003023456', company: 'NS Beauty Clinic',   value: 12800,    reminder: rel(11), closure: rel(40), product: 'CCTV 8-Cam Kit',    assigned: 'Priya S.',         sourcer: 'Referral',   status: 'New Enquiry', call: 'Pending' },
            { id: 10, name: 'Vikram S',      phone: '9382023456', company: 'VS Enterprises',     value: 54200,    reminder: rel(14), closure: rel(45), product: 'Inverter 3kVA',     assigned: 'Harish D.',        sourcer: 'Website',    status: 'Followup',    call: 'Missed' },
            { id: 11, name: 'Gopal Krishnan',phone: '9444023456', company: 'GK Traders',         value: 36750,    reminder: rel(-1), closure: rel(10), product: 'AMC Contract',      assigned: 'Karthik R.',       sourcer: 'Cold Call',  status: 'Quotation',   call: 'Completed' },
            { id: 12, name: 'Meena K',       phone: '9566023456', company: 'Meena Silks',        value: 22400,    reminder: rel(-3), closure: rel(6),  product: 'Solar Panel 2kW',   assigned: 'Divya A.',         sourcer: 'IndiaMART',  status: 'Lead',        call: 'Missed' }
        ];

        /* ---------- State ---------- */
        var urlParams = new URLSearchParams(window.location.search);
        var state = {
            range: ['today', 'weekly', 'monthly', 'all'].indexOf(urlParams.get('range')) !== -1 ? urlParams.get('range') : 'today',
            type: urlParams.get('type') === 'completed' ? 'completed' : 'actual',
            from: null,
            to: null,
            assigned: '',
            callStatus: '',
            product: '',
            statuses: null /* null = "all" (initial, select2 pre-selected list use pannum) */
        };

        /* ---------- Range window ---------- */
        function rangeWindow(range) {
            var s = new Date(TODAY), e = new Date(TODAY);
            if (range === 'weekly') {
                var day = (s.getDay() + 6) % 7; /* Monday = 0 */
                s.setDate(s.getDate() - day);
                e = new Date(s);
                e.setDate(e.getDate() + 6);
            } else if (range === 'monthly') {
                s = new Date(TODAY.getFullYear(), TODAY.getMonth(), 1);
                e = new Date(TODAY.getFullYear(), TODAY.getMonth() + 1, 0);
            }
            return { start: s, end: e };
        }

        function inRange(d, range) {
            if (range === 'all') return true;
            var w = rangeWindow(range);
            return d >= w.start && d <= w.end;
        }

                /* ---------- Range Toggle sync ---------- */
        var rangeToggle = document.getElementById('fulRangeToggle');
        function syncRangeToggle() {
            if (!rangeToggle) return;
            rangeToggle.querySelectorAll('button').forEach(function(b) {
                b.classList.toggle('active', b.getAttribute('data-range') === state.range);
            });
        }

        /* ---------- Filters ---------- */
        function getFiltered() {
            var statuses = state.statuses; /* null = ellame include */
            return fulData.filter(function(row) {
                if (!inRange(row.reminder, state.range)) return false;
                if (state.type === 'completed' && row.call !== 'Completed') return false;
                if (state.from && row.reminder < midnight(new Date(state.from + 'T00:00:00'))) return false;
                if (state.to && row.reminder > midnight(new Date(state.to + 'T00:00:00'))) return false;
                if (state.assigned && row.assigned !== state.assigned) return false;
                if (state.callStatus && row.call !== state.callStatus) return false;
                if (state.product && (row.product || '').toLowerCase().indexOf(state.product.toLowerCase()) === -1) return false;
                if (statuses && statuses.indexOf(row.status) === -1) return false;
                return true;
            });
        }

        /* ---------- Chip renderers (MasterTable column render) ---------- */
        function statusChip(s) {
            var map = {
                'Lead': 'c-blue', 'Quotation': 'c-violet', 'Followup': 'c-amber',
                'Qualified': 'c-green', 'DIRECT': 'c-red', 'New Enquiry': 'c-blue', 'New': 'c-gray'
            };
            return '<span class="ful-chip ' + (map[s] || 'c-gray') + '">' + s + '</span>';
        }
        function callChip(s) {
            var map = { 'Completed': 'c-green', 'Pending': 'c-amber', 'Missed': 'c-red' };
            return '<span class="ful-chip ' + (map[s] || 'c-gray') + '">' + s + '</span>';
        }

        /* ---------- MasterTable init ---------- */
        var fulTable = null;
        if (typeof MasterTable !== 'undefined') {
            fulTable = MasterTable.init({
                tableId: 'fulTable',
                tbodyId: 'fulTbody',
                idPrefix: 'ful',
                data: [],
                tableName: 'Follow Up List',
                primaryKey: 'id',
                searchFields: ['name', 'phone', 'company', 'product'],
                columns: [
                    {
                        field: 'name',
                        title: 'Name',
                        sortable: true,
                        render: function(v, row) {
                            return '<a href="#" class="ful-name" data-id="' + row.id + '">' + v + '</a>';
                        }
                    },
                    {
                        field: 'phone',
                        title: 'Phone',
                        sortable: true,
                        render: function(v) {
                            return '<a href="tel:' + v + '" class="ful-phone">' + v + '</a>';
                        }
                    },
                    {
                        field: 'company',
                        title: 'Company Name',
                        sortable: true
                    },
                    {
                        field: 'value_fmt',
                        title: 'Lead Value',
                        sortable: false,
                        render: function(v, row) {
                            return '<span class="ful-val">' + row.value_fmt + '</span>';
                        }
                    },
                    {
                        field: 'closure',
                        title: 'Closure Date',
                        sortable: false
                    },
                    {
                        field: 'reminder',
                        title: 'Next Reminder Date',
                        sortable: false,
                        render: function(v) {
                            return '<span class="fw-bold">' + v + '</span>';
                        }
                    },
                    {
                        field: 'product',
                        title: 'Product',
                        sortable: true
                    },
                    {
                        field: 'assigned',
                        title: 'Assigned',
                        sortable: true
                    },
                    {
                        field: 'sourcer',
                        title: 'Sourcer',
                        sortable: true
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        sortable: true,
                        render: statusChip
                    },
                    {
                        field: 'call',
                        title: 'Call Status',
                        sortable: true,
                        render: callChip
                    },
                    {
                        field: null,
                        title: 'Action',
                        sortable: false,
                        render: function(v, row) {
                            var isHw = /Solar|CCTV|Inverter|Biometric/i.test(row.product || '');
                            var mType = isHw ? 'HW' : 'SW';
                            var isCompleted = row.call === 'Completed';

                            var toggleDoneItem = !isCompleted
                                ? '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" onclick="window.markFulDone(' + row.id + ')"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-check2-circle"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Mark Completed</div><div class="text-muted" style="font-size: 10px;">Log call &amp; finish follow-up</div></div></button></li>'
                                : '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" onclick="window.markFulPending(' + row.id + ')"><span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-arrow-counterclockwise"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Mark as Pending</div><div class="text-muted" style="font-size: 10px;">Reopen follow-up status</div></div></button></li>';

                            return '<div class="dropdown text-end pe-2">' +
                                '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                                    '<span>Actions</span>' +
                                '</button>' +
                                '<ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">' +
                                    '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Follow-Up Actions</li>' +
                                    '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" onclick="window.viewFulModal(' + row.id + ')"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-person-vcard"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Lead 360° View</div><div class="text-muted" style="font-size: 10px;">Overview, timeline &amp; notes</div></div></button></li>' +
                                    toggleDoneItem +
                                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="quotation-create.php?client=' + encodeURIComponent(row.company || row.name) + '&item=' + encodeURIComponent(row.product || 'Solution') + '&price=' + encodeURIComponent(row.value || 0) + '"><span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-file-earmark-text"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Create Quotation</div><div class="text-muted" style="font-size: 10px;">Issue GST proposal</div></div></a></li>' +
                                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="customer-new.php?company=' + encodeURIComponent(row.company || '') + '&contact=' + encodeURIComponent(row.name || '') + '&phone=' + encodeURIComponent(row.phone || '') + '"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-person-check"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Convert to Customer</div><div class="text-muted" style="font-size: 10px;">Promote lead to client</div></div></a></li>' +
                                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="appointments.php?from_ticket=' + row.id + '&type=' + mType + '&subject=' + encodeURIComponent(mType + ' Follow-Up Meeting: ' + row.product) + '&client=' + encodeURIComponent(row.company) + '&phone=' + encodeURIComponent(row.phone) + '"><span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-calendar2-week"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Book Appointment</div><div class="text-muted" style="font-size: 10px;">Schedule demo / site visit</div></div></a></li>' +
                                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="https://wa.me/91' + String(row.phone || '').replace(/[^0-9]/g, '') + '" target="_blank"><span class="action-icon-pill bg-success-subtle text-success" style="background:#dcfce7;color:#16a34a;"><i class="bi bi-whatsapp"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">WhatsApp Chat</div><div class="text-muted" style="font-size: 10px;">Direct messaging</div></div></a></li>' +
                                    '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="mailto:' + encodeURIComponent((row.name.toLowerCase().replace(/\s+/g, '') || 'client') + '@example.com') + '"><span class="action-icon-pill bg-purple-subtle text-purple" style="background:#faf5ff;color:#7c3aed;"><i class="bi bi-envelope"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Send Email</div><div class="text-muted" style="font-size: 10px;">Compose message</div></div></a></li>' +
                                    '<li><hr class="dropdown-divider my-1"></li>' +
                                    '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn" onclick="window.deleteFul(' + row.id + ')"><span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span><div class="text-start"><div class="fw-semibold text-danger font-12">Delete Follow-Up</div><div class="text-muted" style="font-size: 10px;">Remove record</div></div></button></li>' +
                                '</ul>' +
                            '</div>';
                        }
                    }
                ]
            });
        }

        /* ---------- Table sync (filtered rows -> MasterTable) ----------
           fulData la Date objects irukku; MasterTable ku formatted-string copies pass pannrom
           (original-a mutate pannama — repeated sync safe-a irukum) */
        function syncTable() {
            var rows = getFiltered().map(function(r) {
                return {
                    id: r.id,
                    name: r.name,
                    phone: r.phone,
                    company: r.company,
                    value: r.value,
                    value_fmt: inrFmt(r.value),
                    closure: fmtDMY(r.closure),
                    reminder: fmtDMY(r.reminder),
                    product: r.product,
                    assigned: r.assigned,
                    sourcer: r.sourcer,
                    status: r.status,
                    call: r.call
                };
            });
            if (fulTable) fulTable.setData(rows);
            var total = rows.reduce(function(sum, r) { return sum + r.value; }, 0);
            document.getElementById('fulTotalValue').textContent = inrFmt(total);
            document.getElementById('fulShowing').textContent = 'Showing ' + rows.length + ' follow-up' + (rows.length === 1 ? '' : 's');
        }

        function renderAll() {
            syncRangeToggle();
            syncTable();
            /* URL sync — refresh pannalum same state */
            var p = new URLSearchParams();
            p.set('range', state.range);
            p.set('type', state.type);
            window.history.replaceState({}, '', window.location.pathname + '?' + p.toString());
        }

        /* ---------- Wiring ---------- */
        /* Range toggle click */
        if (rangeToggle) {
            rangeToggle.querySelectorAll('button').forEach(function(b) {
                b.addEventListener('click', function() {
                    state.range = b.getAttribute('data-range');
                    syncRangeToggle();
                    renderAll();
                });
            });
        }
        syncRangeToggle();

        /* Actual / Completed toggle */
        var typeToggle = document.getElementById('fulTypeToggle');
        function syncTypeToggle() {
            typeToggle.querySelectorAll('button').forEach(function(b) {
                b.classList.toggle('active', b.getAttribute('data-type') === state.type);
            });
        }
        typeToggle.querySelectorAll('button').forEach(function(b) {
            b.addEventListener('click', function() {
                state.type = b.getAttribute('data-type');
                syncTypeToggle();
                renderAll();
            });
        });
        syncTypeToggle();

        /* Filter badge updater */
        window.updateFulBadge = function() {
            var count = 0;
            var fromVal = document.getElementById('fulFrom') ? document.getElementById('fulFrom').value : '';
            var toVal = document.getElementById('fulTo') ? document.getElementById('fulTo').value : '';
            var assVal = document.getElementById('fulAssigned') ? document.getElementById('fulAssigned').value : '';
            var callVal = document.getElementById('fulCallStatus') ? document.getElementById('fulCallStatus').value : '';
            var prodVal = document.getElementById('fulProduct') ? document.getElementById('fulProduct').value : '';
            if (fromVal) count++;
            if (toVal) count++;
            if (assVal) count++;
            if (callVal) count++;
            if (prodVal) count++;
            var sel = document.getElementById('fulStatus');
            if (sel && sel.selectedOptions && sel.selectedOptions.length < 5) count++;

            var badge = document.getElementById('fulFilterCountBadge');
            if (badge) {
                badge.textContent = count;
                if (count > 0) badge.classList.remove('d-none');
                else badge.classList.add('d-none');
            }
        };

        /* Submit -> apply offcanvas filters and auto-close offcanvas */
        document.getElementById('fulSubmit').addEventListener('click', function() {
            state.from = document.getElementById('fulFrom').value || null;
            state.to = document.getElementById('fulTo').value || null;
            state.assigned = document.getElementById('fulAssigned').value || '';
            state.callStatus = document.getElementById('fulCallStatus') ? document.getElementById('fulCallStatus').value : '';
            state.product = document.getElementById('fulProduct') ? document.getElementById('fulProduct').value : '';
            var sel = document.getElementById('fulStatus');
            var picked = Array.from(sel.selectedOptions || []).map(function(o) { return o.text; });
            state.statuses = picked.length ? picked : [];
            window.updateFulBadge();

            var oc = document.getElementById('fulFilterOffcanvas');
            if (oc && window.bootstrap && bootstrap.Offcanvas) {
                var inst = bootstrap.Offcanvas.getInstance(oc);
                if (inst) inst.hide();
            }
            renderAll();
        });

        /* Clear -> reset filters (range/type remain) */
        document.getElementById('fulClear').addEventListener('click', function() {
            document.getElementById('fulFrom').value = '';
            document.getElementById('fulTo').value = '';
            document.getElementById('fulAssigned').value = '';
            if (document.getElementById('fulCallStatus')) document.getElementById('fulCallStatus').value = '';
            if (document.getElementById('fulProduct')) document.getElementById('fulProduct').value = '';
            var sel = document.getElementById('fulStatus');
            var defaultStatuses = ['Lead', 'Quotation', 'Followup', 'Qualified', 'DIRECT'];
            Array.from(sel.options || []).forEach(function(o) { o.selected = defaultStatuses.indexOf(o.text) !== -1; });
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('#fulAssigned').val('').trigger('change');
                $('#fulCallStatus').val('').trigger('change');
                $('#fulProduct').val('').trigger('change');
                $(sel).val(defaultStatuses).trigger('change');
            }
            state.from = null;
            state.to = null;
            state.assigned = '';
            state.callStatus = '';
            state.product = '';
            state.statuses = null;
            window.updateFulBadge();
            renderAll();
        });

        window.markFulDone = function(id) {
            var item = fulData.find(function(r) { return r.id === id; });
            if (item) {
                item.call = 'Completed';
                renderAll();
            }
        };

        window.markFulPending = function(id) {
            var item = fulData.find(function(r) { return r.id === id; });
            if (item) {
                item.call = 'Pending';
                renderAll();
            }
        };

        window.deleteFul = function(id) {
            var item = fulData.find(function(r) { return r.id === id; });
            if (!item) return;
            if (confirm('Are you sure you want to delete follow-up for "' + item.name + '"?')) {
                fulData = fulData.filter(function(r) { return r.id !== id; });
                renderAll();
            }
        };

        window.viewFulModal = function(id) {
            var item = fulData.find(function(r) { return r.id === id; });
            if (!item) return;
            var setTxt = function(elId, val) { var el = document.getElementById(elId); if (el) el.textContent = val; };
            setTxt('fulModalName', item.name);
            setTxt('fulModalCompany', (item.company || item.name) + ' · Lead Overview & Follow-up Details');
            setTxt('fulModalPhone', item.phone || '—');
            setTxt('fulModalValue', inrFmt(item.value));
            setTxt('fulModalProduct', item.product || '—');
            setTxt('fulModalStatus', item.status || 'Lead');
            setTxt('fulModalCall', item.call || 'Pending');
            setTxt('fulModalReminder', fmtDMY(item.reminder));
            setTxt('fulModalClosure', fmtDMY(item.closure));
            setTxt('fulModalAssigned', item.assigned || '—');
            setTxt('fulModalSourcer', item.sourcer || '—');

            var phLink = document.getElementById('fulModalPhoneLink');
            if (phLink) phLink.href = 'tel:' + item.phone;
            var waLink = document.getElementById('fulModalWaLink');
            if (waLink) waLink.href = 'https://wa.me/91' + String(item.phone || '').replace(/[^0-9]/g, '');

            var isHw = /Solar|CCTV|Inverter|Biometric/i.test(item.product || '');
            var mType = isHw ? 'HW' : 'SW';

            var qBtn = document.getElementById('fulModalQuoteBtn');
            if (qBtn) qBtn.href = 'quotation-create.php?client=' + encodeURIComponent(item.company || item.name) + '&item=' + encodeURIComponent(item.product || 'Solution') + '&price=' + encodeURIComponent(item.value || 0);

            var cBtn = document.getElementById('fulModalConvertBtn');
            if (cBtn) cBtn.href = 'customer-new.php?company=' + encodeURIComponent(item.company || '') + '&contact=' + encodeURIComponent(item.name || '') + '&phone=' + encodeURIComponent(item.phone || '');

            var mBtn = document.getElementById('fulModalMeetBtn');
            if (mBtn) mBtn.href = 'appointments.php?from_ticket=' + item.id + '&type=' + mType + '&subject=' + encodeURIComponent(mType + ' Follow-Up Meeting: ' + item.product) + '&client=' + encodeURIComponent(item.company) + '&phone=' + encodeURIComponent(item.phone);

            var modalEl = document.getElementById('fulDetailModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getOrCreateInstance(modalEl).show();
            }
        };

        // Table click listener: opens detail modal on name or row click, while safely ignoring Actions button & dropdowns
        var fulTableEl = document.getElementById('fulTable');
        if (fulTableEl) {
            fulTableEl.addEventListener('click', function(e) {
                if (
                    e.target.closest('input, button, select, textarea') ||
                    e.target.closest('.btn-table-action') ||
                    e.target.closest('.lead-act-btn') ||
                    e.target.closest('.dropdown') ||
                    e.target.closest('.dropdown-menu') ||
                    e.target.closest('.table-action-menu') ||
                    e.target.closest('[data-bs-toggle="dropdown"]') ||
                    e.target.closest('a:not(.ful-name)')
                ) {
                    return;
                }

                var cell = e.target.closest('td');
                if (cell && (cell.querySelector('.btn-table-action, .lead-act-btn, .dropdown') || cell.classList.contains('text-end'))) {
                    return;
                }

                var nameLink = e.target.closest('.ful-name');
                var tr = e.target.closest('tr');
                if (nameLink || tr) {
                    var idAttr = nameLink ? nameLink.getAttribute('data-id') : null;
                    if (!idAttr && tr) {
                        var idBtn = tr.querySelector('[onclick*="markFulDone"], [onclick*="viewFulModal"]');
                        if (idBtn) {
                            var m = idBtn.getAttribute('onclick').match(/\d+/);
                            if (m) idAttr = m[0];
                        }
                    }
                    if (idAttr) {
                        e.preventDefault();
                        window.viewFulModal(Number(idAttr));
                    }
                }
            });
        }

        // Safe dropdown delegation in capture phase with viewport boundary and fixed popper strategy
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

        /* ---------- Init ---------- */
        renderAll();
    })();
</script>
