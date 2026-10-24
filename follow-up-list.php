<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">

<?php
/* ---------------------------------------------------------------
   Follow Up List — lead.php Activity Stats "Follow Up" card click
   la open aagum. Range (today/weekly/monthly) + type (actual/completed)
   GET params vechu pre-set aagum.
---------------------------------------------------------------- */
$range = isset($_GET['range']) ? $_GET['range'] : 'today';
if (!in_array($range, ['today', 'weekly', 'monthly'], true)) $range = 'today';
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

    /* ----- Range summary cards (matrix table oda improved version) ----- */
    .ful-page .ful-card {
        position: relative;
        height: 100%;
        overflow: hidden;
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        box-shadow: 0 2px 10px rgba(20, 20, 43, .04);
        padding: 14px 16px;
        cursor: pointer;
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }

    .ful-page .ful-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(20, 30, 20, .1);
    }

    .ful-page .ful-card.active {
        border-color: rgba(22, 163, 74, .45);
        box-shadow: 0 10px 26px rgba(22, 163, 74, .14), 0 0 0 3px rgba(22, 163, 74, .08);
    }

    .ful-page .ful-card::before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), #4ade80);
        opacity: .35;
        transition: opacity .18s ease;
    }

    .ful-page .ful-card.active::before {
        opacity: 1;
    }

    .ful-page .ful-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }

    .ful-page .ful-card-title {
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .04em;
        text-transform: uppercase;
        color: var(--ink-500);
    }

    .ful-page .ful-card-ico {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        background: var(--primary-light);
        color: var(--primary-dark);
        flex: 0 0 auto;
    }

    .ful-page .ful-card-num {
        font-size: 26px;
        font-weight: 800;
        color: var(--ink-900);
        line-height: 1.1;
        margin-top: 8px;
    }

    .ful-page .ful-card-sub {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--ink-500);
        margin-top: 2px;
    }

    .ful-page .ful-card-sub b {
        color: var(--primary-dark);
    }

    .ful-page .ful-card-sub.zero {
        color: var(--ink-500);
    }

    .ful-page .ful-card-sub .ful-sub-danger {
        color: #e5484d;
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

    @media (max-width: 768px) {
        .ful-page .ful-card-num { font-size: 22px; }
    }
</style>

<main class="ful-page">
    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Follow Up List</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
                <i class="bi bi-person-lines-fill fs-6"></i>
                <span>CRM</span>
                <i class="bi bi-chevron-right"></i>
                <a href="lead.php" style="text-decoration:none;color:inherit;">Leads</a>
                <i class="bi bi-chevron-right"></i>
                <span class="fw-bold text-dark">Follow Up List</span>
            </nav>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <div class="ful-type-toggle" id="fulTypeToggle">
                <button type="button" data-type="actual">Actual</button>
                <button type="button" data-type="completed">Completed</button>
            </div>
            <div class="ful-date-range">
                <i class="bi bi-calendar3 me-1"></i>Date: <span id="fulToday"></span>
            </div>
        </div>
    </div>

    <!-- ===== Range summary cards (Activity / Closure matrix oda info, improved) ===== -->
    <div class="row g-3 mb-3">
        <div class="col-lg-4 col-md-6">
            <div class="ful-card" data-range="today">
                <div class="ful-card-top">
                    <span class="ful-card-title">Today Follow Up</span>
                    <span class="ful-card-ico"><i class="bi bi-sun"></i></span>
                </div>
                <div class="ful-card-num" id="fulCnt-today">0</div>
                <div class="ful-card-sub">Completed: <b id="fulCntDone-today">0</b></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="ful-card" data-range="weekly">
                <div class="ful-card-top">
                    <span class="ful-card-title">This Week</span>
                    <span class="ful-card-ico"><i class="bi bi-calendar-week"></i></span>
                </div>
                <div class="ful-card-num" id="fulCnt-weekly">0</div>
                <div class="ful-card-sub">Completed: <b id="fulCntDone-weekly">0</b></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="ful-card" data-range="monthly">
                <div class="ful-card-top">
                    <span class="ful-card-title">This Month</span>
                    <span class="ful-card-ico"><i class="bi bi-calendar3"></i></span>
                </div>
                <div class="ful-card-num" id="fulCnt-monthly">0</div>
                <div class="ful-card-sub">Completed: <b id="fulCntDone-monthly">0</b></div>
            </div>
        </div>
    </div>

    <!-- ===== Filters ===== -->
    <form class="card-custom mb-3 filters-card" autocomplete="off" onsubmit="return false;">
        <div class="row g-3 align-items-end">
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label" for="fulFrom">From Date</label>
                <input type="date" class="form-control" id="fulFrom">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label" for="fulTo">To Date</label>
                <input type="date" class="form-control" id="fulTo">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <label class="form-label" for="fulAssigned">Assigned</label>
                <select class="form-select select2" id="fulAssigned">
                    <option value="">Non selected</option>
                    <option>GHARUDA SOFTWARE</option>
                    <option>Harish D.</option>
                    <option>Divya A.</option>
                    <option>Karthik R.</option>
                    <option>Priya S.</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <label class="form-label" for="fulStatus">Status</label>
                <select class="form-select select2" id="fulStatus" multiple>
                    <option selected>Lead</option>
                    <option selected>Quotation</option>
                    <option selected>Followup</option>
                    <option selected>Qualified</option>
                    <option selected>DIRECT</option>
                    <option>New Enquiry</option>
                    <option>New</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-reject flex-fill text-nowrap" id="fulClear">Clear</button>
                    <button type="button" class="btn btn-primary flex-fill text-nowrap" id="fulSubmit">
                        <i class="bi bi-funnel me-1"></i>Submit
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- ===== Table card (MasterTable flow — toolbar/footer/search/export auto) ===== -->
    <div class="card-custom p-0 overflow-hidden">
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
                    </tr>
                </thead>
                <tbody id="fulTbody">
                    <!-- Rows injected by master-table.js -->
                </tbody>
            </table>
        </div>
        <!-- Footer (showing + pagination auto-created by master-table.js) -->
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
            range: ['today', 'weekly', 'monthly'].indexOf(urlParams.get('range')) !== -1 ? urlParams.get('range') : 'today',
            type: urlParams.get('type') === 'completed' ? 'completed' : 'actual',
            from: null,
            to: null,
            assigned: '',
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
            var w = rangeWindow(range);
            return d >= w.start && d <= w.end;
        }

        /* ---------- Summary cards (matrix info — live counts) ---------- */
        function renderSummary() {
            ['today', 'weekly', 'monthly'].forEach(function(r) {
                var actual = 0, done = 0;
                fulData.forEach(function(row) {
                    if (!inRange(row.reminder, r)) return;
                    actual++;
                    if (row.call === 'Completed') done++;
                });
                document.getElementById('fulCnt-' + r).textContent = actual;
                var sub = document.getElementById('fulCntDone-' + r);
                sub.textContent = done;
            });
            document.querySelectorAll('.ful-card').forEach(function(c) {
                c.classList.toggle('active', c.getAttribute('data-range') === state.range);
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
                        render: function(v) {
                            return '<a href="#" class="ful-name" onclick="return false;">' + v + '</a>';
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
            renderSummary();
            syncTable();
            /* URL sync — refresh pannalum same state */
            var p = new URLSearchParams();
            p.set('range', state.range);
            p.set('type', state.type);
            window.history.replaceState({}, '', window.location.pathname + '?' + p.toString());
        }

        /* ---------- Wiring ---------- */
        /* Range cards click */
        document.querySelectorAll('.ful-card').forEach(function(card) {
            card.addEventListener('click', function() {
                state.range = card.getAttribute('data-range');
                renderAll();
            });
        });

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

        /* Submit -> apply form filters (search MasterTable toolbar la auto irukku) */
        document.getElementById('fulSubmit').addEventListener('click', function() {
            state.from = document.getElementById('fulFrom').value || null;
            state.to = document.getElementById('fulTo').value || null;
            state.assigned = document.getElementById('fulAssigned').value || '';
            var sel = document.getElementById('fulStatus');
            var picked = Array.from(sel.selectedOptions || []).map(function(o) { return o.text; });
            state.statuses = picked.length ? picked : [];
            renderAll();
        });

        /* Clear -> reset filters (range/type remain) */
        document.getElementById('fulClear').addEventListener('click', function() {
            document.getElementById('fulFrom').value = '';
            document.getElementById('fulTo').value = '';
            document.getElementById('fulAssigned').value = '';
            var sel = document.getElementById('fulStatus');
            Array.from(sel.options || []).forEach(function(o) { o.selected = false; });
            if (typeof $ !== 'undefined' && $.fn.select2) $(sel).val(null).trigger('change');
            state.from = null;
            state.to = null;
            state.assigned = '';
            state.statuses = null;
            renderAll();
        });

        /* ---------- Init ---------- */
        renderAll();
    })();
</script>
