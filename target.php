<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/lead.css">

<main class="container-fluid px-0">
    <!-- Page Header (single row) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3 flex-wrap">
            <h1 class="font-display fw-bold mb-0 page-title">Sales Targets</h1>
            <div class="btn-group btn-group-sm" role="group" aria-label="Target type" id="tgTabs">
                <button type="button" class="btn btn-outline-secondary font-12 fw-semibold px-2.5 active" data-tab="staff"><i class="bi bi-person-badge me-1"></i>Staff</button>
                <button type="button" class="btn btn-outline-secondary font-12 fw-semibold px-2.5" data-tab="brand"><i class="bi bi-tags me-1"></i>Brand</button>
                <button type="button" class="btn btn-outline-secondary font-12 fw-semibold px-2.5" data-tab="slabs"><i class="bi bi-bar-chart-steps me-1"></i>Incentive Slabs</button>
            </div>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="btn-group btn-group-sm" role="group" aria-label="Target year" id="tgYears">
                <button type="button" class="btn btn-outline-secondary font-12" data-year="2027">2027</button>
                <button type="button" class="btn btn-outline-secondary font-12 active" data-year="2026">2026</button>
                <button type="button" class="btn btn-outline-secondary font-12" data-year="2025">2025</button>
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-2.5" data-bs-toggle="offcanvas" data-bs-target="#tgFilterOffcanvas" aria-controls="tgFilterOffcanvas">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary text-white rounded-pill px-1.5 py-0.5 d-none font-11" id="tgFilterBadge">0</span>
            </button>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-3" id="tgCreateBtn">
                <i class="bi bi-plus-lg"></i><span id="tgCreateLabel">Create Staff Target</span>
            </button>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border shadow-sm rounded-3 bg-white overflow-hidden mb-4">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <h6 class="fw-bold text-dark mb-0" id="tgCardTitle"><i class="bi bi-person-badge text-primary me-2"></i>Staff Targets</h6>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2.5 py-1 font-12" id="tgCountBadge">0 Records</span>
                <span class="text-muted font-12 d-none d-md-inline" id="tgSummary"></span>
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold" id="tgExportBtn">
                <i class="bi bi-download"></i><span>Export CSV</span>
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 font-13" id="tgTable">
                <thead class="table-light text-muted small text-uppercase font-11" id="tgThead"></thead>
                <tbody id="tgTbody"></tbody>
                <tfoot class="table-light fw-bold font-13" id="tgTfoot"></tfoot>
            </table>
        </div>

        <div class="p-3 border-top bg-light bg-opacity-25 d-flex align-items-center justify-content-between flex-wrap gap-2">
            <span class="text-muted font-12" id="tgFooterText"></span>
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Next</a></li>
            </ul>
        </div>
    </div>

    <!-- Chart (Staff tab only) -->
    <div class="card border shadow-sm rounded-3 bg-white p-3 mb-4" id="tgChartCard">
        <div class="mb-3">
            <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-graph-up text-primary me-2"></i>Business &amp; Collection &mdash; Target vs Achieved</h6>
            <small class="text-muted" id="tgChartSub"></small>
        </div>
        <div style="height: 300px; position: relative;"><canvas id="tgChart"></canvas></div>
    </div>
</main>

<!-- ==================== Filter Offcanvas ==================== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="tgFilterOffcanvas" aria-labelledby="tgFilterTitle">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title font-16 fw-bold" id="tgFilterTitle"><i class="bi bi-funnel text-primary me-2"></i>Filter Targets</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="mb-3">
            <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Search</label>
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                <input type="text" class="form-control" id="fSearch" placeholder="Name, month, slab...">
            </div>
        </div>
        <div class="mb-3" data-ftab="staff brand">
            <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Month</label>
            <select class="form-select" id="fMonth"><option value="">All Months</option></select>
        </div>
        <div class="mb-3" data-ftab="staff">
            <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Staff Member</label>
            <select class="form-select" id="fStaff"><option value="">All Staff</option></select>
        </div>
        <div class="mb-3" data-ftab="staff">
            <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Performance</label>
            <select class="form-select" id="fPerf">
                <option value="">All</option>
                <option value="hit">Target Achieved</option>
                <option value="miss">Below Target</option>
            </select>
        </div>
        <div class="mb-3" data-ftab="brand">
            <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Brand</label>
            <select class="form-select" id="fBrand"><option value="">All Brands</option></select>
        </div>
        <div class="mb-3" data-ftab="slabs">
            <label class="form-label font-12 fw-semibold text-muted text-uppercase mb-1">Status</label>
            <select class="form-select" id="fStatus">
                <option value="">All Statuses</option>
                <option value="Enable">Enable</option>
                <option value="Disable">Disable</option>
            </select>
        </div>
    </div>
    <div class="border-top p-3 bg-light d-flex gap-2">
        <button type="button" class="btn btn-outline-secondary w-50 font-13" id="fReset">Reset</button>
        <button type="button" class="btn btn-primary w-50 font-13" id="fApply">Apply Filters</button>
    </div>
</div>

<!-- ==================== Staff Target Modal ==================== -->
<div class="modal fade" id="staffModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3 bg-light bg-opacity-50">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-person-badge"></i></span>
                    <h5 class="modal-title fw-bold text-dark mb-0 fs-6" id="staffModalTitle">New Staff Target</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-6"><label class="form-label small fw-semibold">Year <span class="text-danger">*</span></label><select class="form-select" id="smYear"></select></div>
                    <div class="col-6"><label class="form-label small fw-semibold">Month <span class="text-danger">*</span></label><select class="form-select" id="smMonth"></select></div>
                    <div class="col-12"><label class="form-label small fw-semibold">Employee <span class="text-danger">*</span></label><select class="form-select" id="smStaff"></select></div>
                    <div class="col-6"><label class="form-label small fw-semibold">BV Numbers (deals)</label><input type="number" class="form-control" id="smBvn" min="0" placeholder="0"></div>
                    <div class="col-6"><label class="form-label small fw-semibold">Business Value (&#8377;) <span class="text-danger">*</span></label><input type="number" class="form-control" id="smBvv" min="0" placeholder="0"></div>
                    <div class="col-12"><label class="form-label small fw-semibold">Collection Value (&#8377;) <span class="text-danger">*</span></label><input type="number" class="form-control" id="smCvv" min="0" placeholder="0"></div>
                </div>
            </div>
            <div class="modal-footer border-top p-3 bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="smSave"><i class="bi bi-check2 me-1"></i>Save Target</button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== Brand Target Modal ==================== -->
<div class="modal fade" id="brandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3 bg-light bg-opacity-50">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-tags-fill"></i></span>
                    <h5 class="modal-title fw-bold text-dark mb-0 fs-6" id="brandModalTitle">New Brand Target</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-6"><label class="form-label small fw-semibold">Year <span class="text-danger">*</span></label><select class="form-select" id="bmYear"></select></div>
                    <div class="col-6"><label class="form-label small fw-semibold">Month <span class="text-danger">*</span></label><select class="form-select" id="bmMonth"></select></div>
                    <div class="col-12"><label class="form-label small fw-semibold">Brand <span class="text-danger">*</span></label><select class="form-select" id="bmBrand"></select></div>
                    <div class="col-12"><label class="form-label small fw-semibold">Collection Target (&#8377;) <span class="text-danger">*</span></label><input type="number" class="form-control" id="bmCv" min="0" placeholder="0"></div>
                </div>
            </div>
            <div class="modal-footer border-top p-3 bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="bmSave"><i class="bi bi-check2 me-1"></i>Save Target</button>
            </div>
        </div>
    </div>
</div>

<!-- ==================== Slab Modal ==================== -->
<div class="modal fade" id="slabModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3 bg-light bg-opacity-50">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-bar-chart-steps"></i></span>
                    <h5 class="modal-title fw-bold text-dark mb-0 fs-6" id="slabModalTitle">New Incentive Slab</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-5"><label class="form-label small fw-semibold">Slab Code</label><input type="text" class="form-control" id="slCode" placeholder="SLAB-5"></div>
                    <div class="col-7"><label class="form-label small fw-semibold">Slab Title <span class="text-danger">*</span></label><input type="text" class="form-control" id="slTitle" placeholder="Diamond Achiever"></div>
                    <div class="col-6"><label class="form-label small fw-semibold">Collection Min (&#8377;) <span class="text-danger">*</span></label><input type="number" class="form-control" id="slMin" min="0" placeholder="0"></div>
                    <div class="col-6"><label class="form-label small fw-semibold">Collection Max (&#8377;)</label><input type="number" class="form-control" id="slMax" min="0" placeholder="Blank = Unlimited"></div>
                    <div class="col-6"><label class="form-label small fw-semibold">Incentive % <span class="text-danger">*</span></label><input type="number" class="form-control" id="slPct" min="0" step="0.1" placeholder="0"></div>
                    <div class="col-6"><label class="form-label small fw-semibold">Status</label><select class="form-select" id="slStatus"><option>Enable</option><option>Disable</option></select></div>
                </div>
            </div>
            <div class="modal-footer border-top p-3 bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="slSave"><i class="bi bi-check2 me-1"></i>Save Slab</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
(function () {
    'use strict';

    /* ==================== DATA ==================== */
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var YEARS = [2027, 2026, 2025, 2024];
    var STAFF = [
        { name: 'Harish D.', phone: '919884023456' },
        { name: 'Divya A.', phone: '919962023456' },
        { name: 'Karthik R.', phone: '919840123789' },
        { name: 'Priya S.', phone: '919940123456' },
        { name: 'Ramesh V.', phone: '919500123456' }
    ];
    var BRANDS = [
        { name: 'PhDAssistance', bg: '#eff6ff', fg: '#2563eb' },
        { name: 'GEO Care', bg: '#ecfdf5', fg: '#16a34a' },
        { name: 'Gharuda Software', bg: '#f5f3ff', fg: '#7c3aed' },
        { name: 'Zen Publications', bg: '#fffbeb', fg: '#d97706' }
    ];

    // Staff targets: T = target, A = achieved
    var staffData = [
        { id: 1, year: 2026, month: 1, staff: 'Harish D.', src: 1, bvnT: 3, bvnA: 1, bvvT: 90000, bvvA: 25000, cvT: 500000, cvA: 160000 },
        { id: 2, year: 2026, month: 1, staff: 'Ramesh V.', src: 2, bvnT: 4, bvnA: 4, bvvT: 120000, bvvA: 135000, cvT: 800000, cvA: 910000 },
        { id: 3, year: 2026, month: 2, staff: 'Divya A.', src: 0, bvnT: 5, bvnA: 6, bvvT: 150000, bvvA: 300400, cvT: 1000000, cvA: 640000 },
        { id: 4, year: 2026, month: 2, staff: 'Karthik R.', src: 1, bvnT: 7, bvnA: 3, bvvT: 500000, bvvA: 210000, cvT: 1500000, cvA: 1620000 },
        { id: 5, year: 2026, month: 3, staff: 'Divya A.', src: 3, bvnT: 6, bvnA: 2, bvvT: 200000, bvvA: 75000, cvT: 1200000, cvA: 340000 },
        { id: 6, year: 2026, month: 4, staff: 'Karthik R.', src: 2, bvnT: 4, bvnA: 5, bvvT: 140000, bvvA: 180000, cvT: 750000, cvA: 820000 },
        { id: 7, year: 2026, month: 5, staff: 'Priya S.', src: 1, bvnT: 5, bvnA: 3, bvvT: 160000, bvvA: 95000, cvT: 850000, cvA: 410000 },
        { id: 8, year: 2026, month: 5, staff: 'Harish D.', src: 2, bvnT: 4, bvnA: 4, bvvT: 130000, bvvA: 142000, cvT: 600000, cvA: 255000 },
        { id: 9, year: 2025, month: 12, staff: 'Ramesh V.', src: 1, bvnT: 5, bvnA: 5, bvvT: 175000, bvvA: 190000, cvT: 900000, cvA: 990000 },
        { id: 10, year: 2025, month: 11, staff: 'Priya S.', src: 0, bvnT: 4, bvnA: 2, bvvT: 110000, bvvA: 60000, cvT: 500000, cvA: 120000 }
    ];

    var brandData = [
        { id: 1, year: 2026, month: 10, brand: 'PhDAssistance', cvT: 80000, cvA: 92000 },
        { id: 2, year: 2026, month: 10, brand: 'GEO Care', cvT: 120000, cvA: 95000 },
        { id: 3, year: 2026, month: 9, brand: 'Gharuda Software', cvT: 150000, cvA: 175000 },
        { id: 4, year: 2026, month: 9, brand: 'Zen Publications', cvT: 75000, cvA: 60000 },
        { id: 5, year: 2026, month: 8, brand: 'Gharuda Software', cvT: 200000, cvA: 215000 },
        { id: 6, year: 2026, month: 7, brand: 'PhDAssistance', cvT: 50000, cvA: 0 },
        { id: 7, year: 2026, month: 6, brand: 'GEO Care', cvT: 90000, cvA: 105000 },
        { id: 8, year: 2026, month: 5, brand: 'Zen Publications', cvT: 85000, cvA: 85000 },
        { id: 9, year: 2026, month: 4, brand: 'Gharuda Software', cvT: 130000, cvA: 142000 },
        { id: 10, year: 2025, month: 12, brand: 'GEO Care', cvT: 100000, cvA: 88000 }
    ];

    // Incentive slabs (based on monthly collection achieved). max = null => unlimited
    var slabData = [
        { id: 1, code: 'SLAB-1', title: 'Bronze Performer', min: 100000, max: 300000, pct: 2.5, status: 'Enable' },
        { id: 2, code: 'SLAB-2', title: 'Silver Performer', min: 300001, max: 750000, pct: 5.0, status: 'Enable' },
        { id: 3, code: 'SLAB-3', title: 'Gold Champion', min: 750001, max: 1500000, pct: 7.5, status: 'Enable' },
        { id: 4, code: 'SLAB-4', title: 'Platinum Elite', min: 1500001, max: null, pct: 10.0, status: 'Enable' }
    ];
    var SLAB_TINT = ['warning', 'secondary', 'success', 'primary', 'info', 'danger'];

    /* ==================== STATE ==================== */
    var state = { tab: 'staff', year: 2026, editId: null };
    var filters = { staff: {}, brand: {}, slabs: {} };
    var chart = null;

    /* ==================== HELPERS ==================== */
    function $id(id) { return document.getElementById(id); }
    function esc(s) { return String(s).replace(/[&<>"']/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]; }); }
    function inr(n) {
        var s = Math.round(Math.abs(n)).toString(), last3 = s.slice(-3), rest = s.slice(0, -3);
        if (rest) rest = rest.replace(/\B(?=(\d{2})+(?!\d))/g, ',') + ',';
        return '\u20B9' + rest + last3;
    }
    function inrShort(n) {
        if (n >= 10000000) return '\u20B9' + (n / 10000000).toFixed(2).replace(/\.00$/, '') + ' Cr';
        if (n >= 100000) return '\u20B9' + (n / 100000).toFixed(2).replace(/\.00$/, '') + ' L';
        if (n >= 1000) return '\u20B9' + (n / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
        return '\u20B9' + n;
    }
    function initials(name) {
        var w = String(name).trim().split(/\s+/);
        return (w.length > 1 ? w[0].charAt(0) + w[1].charAt(0) : w[0].slice(0, 2)).toUpperCase();
    }
    function pct(a, t) { return t > 0 ? Math.round(a / t * 100) : 0; }
    function achBadge(a, t, money) {
        var txt = money ? inr(a) : a;
        if (a > t) return '<span class="badge bg-success-subtle text-success border border-success-subtle font-11"><i class="bi bi-arrow-up-right me-1"></i>' + txt + '</span>';
        if (a < t) return '<span class="badge bg-danger-subtle text-danger border border-danger-subtle font-11"><i class="bi bi-arrow-down-right me-1"></i>' + txt + '</span>';
        return '<span class="badge bg-light text-secondary border font-11"><i class="bi bi-dash-lg me-1"></i>' + txt + '</span>';
    }
    function progressBar(p) {
        var c = p >= 100 ? 'success' : p >= 60 ? 'warning' : 'danger';
        return '<div class="d-flex align-items-center gap-2"><div class="progress flex-grow-1" style="height:6px;min-width:70px;"><div class="progress-bar bg-' + c + '" style="width:' + Math.min(p, 100) + '%"></div></div><span class="font-12 fw-semibold text-' + c + '">' + p + '%</span></div>';
    }
    function earnedSlab(collection) {
        var active = slabData.filter(function (s) { return s.status === 'Enable'; });
        for (var i = 0; i < active.length; i++) {
            var s = active[i];
            if (collection >= s.min && (s.max === null || collection <= s.max)) return s;
        }
        return null;
    }
    function slabTint(slab) {
        var idx = slabData.indexOf(slab);
        return SLAB_TINT[(idx < 0 ? 0 : idx) % SLAB_TINT.length];
    }
    function menu(tab, id, items) {
        var html = '<div class="dropdown text-end"><button type="button" class="btn btn-sm btn-table-action dropdown-toggle" data-bs-toggle="dropdown" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">Actions</button><ul class="dropdown-menu dropdown-menu-end shadow border table-action-menu">';
        items.forEach(function (it) {
            if (it === '-') { html += '<li><hr class="dropdown-divider my-1"></li>'; return; }
            var attrs = it.href ? 'href="' + it.href + '" target="_blank" rel="noopener"' : 'href="javascript:void(0)" data-act="' + it.act + '" data-tab="' + tab + '" data-id="' + id + '"';
            html += '<li><a class="dropdown-item' + (it.danger ? ' text-danger' : '') + '" ' + attrs + '>' +
                '<div class="action-icon-pill bg-' + it.color + '-subtle text-' + it.color + '"><i class="bi ' + it.icon + '"></i></div>' +
                '<div><div class="fw-semibold font-12 ' + (it.danger ? 'text-danger' : 'text-dark') + '">' + it.title + '</div><div class="text-muted" style="font-size:10px;">' + it.sub + '</div></div></a></li>';
        });
        return html + '</ul></div>';
    }
    function fillSelect(el, opts, placeholder) {
        el.innerHTML = (placeholder !== undefined ? '<option value="">' + placeholder + '</option>' : '') +
            opts.map(function (o) { return '<option value="' + esc(o.v) + '">' + esc(o.t) + '</option>'; }).join('');
    }
    function modal(id) { return bootstrap.Modal.getOrCreateInstance($id(id)); }

    /* ==================== FILTERING ==================== */
    function rowsFor(tab) {
        var f = filters[tab], q = (f.q || '').toLowerCase();
        if (tab === 'staff') {
            return staffData.filter(function (r) {
                if (r.year !== state.year) return false;
                if (f.month && r.month !== Number(f.month)) return false;
                if (f.staff && r.staff !== f.staff) return false;
                if (f.perf === 'hit' && r.cvA < r.cvT) return false;
                if (f.perf === 'miss' && r.cvA >= r.cvT) return false;
                var slab = earnedSlab(r.cvA);
                return !q || (r.staff + ' ' + MONTHS[r.month - 1] + ' ' + (slab ? slab.title : '')).toLowerCase().indexOf(q) !== -1;
            }).sort(function (a, b) { return b.month - a.month || a.staff.localeCompare(b.staff); });
        }
        if (tab === 'brand') {
            return brandData.filter(function (r) {
                if (r.year !== state.year) return false;
                if (f.month && r.month !== Number(f.month)) return false;
                if (f.brand && r.brand !== f.brand) return false;
                return !q || (r.brand + ' ' + MONTHS[r.month - 1]).toLowerCase().indexOf(q) !== -1;
            }).sort(function (a, b) { return b.month - a.month || a.brand.localeCompare(b.brand); });
        }
        return slabData.filter(function (r) {
            if (f.status && r.status !== f.status) return false;
            return !q || (r.code + ' ' + r.title + ' ' + r.pct).toLowerCase().indexOf(q) !== -1;
        }).sort(function (a, b) { return a.min - b.min; });
    }

    /* ==================== RENDER ==================== */
    function renderStaff(rows) {
        $id('tgThead').innerHTML =
            '<tr><th rowspan="2" class="ps-4">S.No</th><th rowspan="2">Month</th><th rowspan="2" style="min-width:160px;">Staff</th><th rowspan="2" class="text-center">Sourcing</th>' +
            '<th colspan="2" class="text-center text-primary border-bottom">BV Numbers</th><th colspan="2" class="text-center text-info border-bottom">Business Value</th><th colspan="2" class="text-center text-success border-bottom">Collection Value</th>' +
            '<th rowspan="2" style="min-width:170px;">Earned Slab</th><th rowspan="2" class="text-end pe-4">Actions</th></tr>' +
            '<tr><th class="text-center">Target</th><th class="text-center">Achieved</th><th class="text-center">Target</th><th class="text-center">Achieved</th><th class="text-center">Target</th><th class="text-center">Achieved</th></tr>';

        var t = { src: 0, bvnT: 0, bvnA: 0, bvvT: 0, bvvA: 0, cvT: 0, cvA: 0, inc: 0 };
        $id('tgTbody').innerHTML = rows.map(function (r, i) {
            var slab = earnedSlab(r.cvA), inc = slab ? r.cvA * slab.pct / 100 : 0;
            var person = STAFF.find(function (s) { return s.name === r.staff; }) || {};
            ['src', 'bvnT', 'bvnA', 'bvvT', 'bvvA', 'cvT', 'cvA'].forEach(function (k) { t[k] += r[k]; });
            t.inc += inc;
            var slabHtml = slab
                ? '<span class="badge bg-' + slabTint(slab) + '-subtle text-' + slabTint(slab) + ' border font-11">' + esc(slab.title) + ' &middot; ' + slab.pct + '%</span><div class="text-muted" style="font-size:11px;">Incentive ' + inr(inc) + '</div>'
                : '<span class="badge bg-light text-muted border font-11">No slab yet</span>';
            var items = [
                { act: 'edit', icon: 'bi-pencil-square', color: 'primary', title: 'Edit Target', sub: 'Update BV / CV targets' }
            ];
            if (person.phone) items.push({ href: 'https://wa.me/' + person.phone + '?text=' + encodeURIComponent(r.staff + ' - ' + MONTHS[r.month - 1] + ' ' + r.year + ': Collection ' + inr(r.cvA) + ' of ' + inr(r.cvT) + ' (' + pct(r.cvA, r.cvT) + '%)'), icon: 'bi-whatsapp', color: 'success', title: 'WhatsApp Report', sub: 'Send progress to staff' });
            items.push('-', { act: 'del', icon: 'bi-trash', color: 'danger', title: 'Delete Target', sub: 'Remove this record', danger: true });
            return '<tr>' +
                '<td class="ps-4 fw-semibold text-muted">' + (i + 1) + '</td>' +
                '<td><span class="fw-semibold text-dark">' + MONTHS[r.month - 1] + ' ' + r.year + '</span></td>' +
                '<td><div class="d-flex align-items-center gap-2"><span class="badge rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center" style="width:30px;height:30px;">' + initials(r.staff) + '</span><span class="fw-semibold text-dark">' + esc(r.staff) + '</span></div></td>' +
                '<td class="text-center"><span class="badge bg-light text-dark border">' + r.src + '</span></td>' +
                '<td class="text-center">' + r.bvnT + '</td><td class="text-center">' + achBadge(r.bvnA, r.bvnT, false) + '</td>' +
                '<td class="text-center">' + inr(r.bvvT) + '</td><td class="text-center">' + achBadge(r.bvvA, r.bvvT, true) + '</td>' +
                '<td class="text-center">' + inr(r.cvT) + '</td><td class="text-center">' + achBadge(r.cvA, r.cvT, true) + '</td>' +
                '<td>' + slabHtml + '</td>' +
                '<td class="text-end pe-4">' + menu('staff', r.id, items) + '</td></tr>';
        }).join('') || emptyRow(12);

        $id('tgTfoot').innerHTML = rows.length ? '<tr><td colspan="3" class="ps-4 text-danger">Total</td><td class="text-center">' + t.src + '</td>' +
            '<td class="text-center">' + t.bvnT + '</td><td class="text-center">' + t.bvnA + '</td>' +
            '<td class="text-center">' + inr(t.bvvT) + '</td><td class="text-center">' + inr(t.bvvA) + '</td>' +
            '<td class="text-center">' + inr(t.cvT) + '</td><td class="text-center">' + inr(t.cvA) + '</td>' +
            '<td class="text-success">' + inr(t.inc) + ' incentive</td><td></td></tr>' : '';
        $id('tgSummary').textContent = rows.length ? 'BV ' + pct(t.bvvA, t.bvvT) + '% \u00B7 Collection ' + pct(t.cvA, t.cvT) + '% achieved' : '';
    }

    function renderBrand(rows) {
        $id('tgThead').innerHTML = '<tr><th class="ps-4">S.No</th><th>Month</th><th style="min-width:200px;">Brand</th><th>Collection Target</th><th>Collection Achieved</th><th style="min-width:160px;">Progress</th><th class="text-end pe-4">Actions</th></tr>';
        var tT = 0, tA = 0;
        $id('tgTbody').innerHTML = rows.map(function (r, i) {
            var b = BRANDS.find(function (x) { return x.name === r.brand; }) || { bg: '#f1f5f9', fg: '#475569' };
            tT += r.cvT; tA += r.cvA;
            return '<tr>' +
                '<td class="ps-4 fw-semibold text-muted">' + (i + 1) + '</td>' +
                '<td><span class="fw-semibold text-dark">' + MONTHS[r.month - 1] + ' ' + r.year + '</span></td>' +
                '<td><div class="d-flex align-items-center gap-2"><span class="d-inline-flex align-items-center justify-content-center rounded-2 fw-bold" style="width:30px;height:30px;font-size:11px;background:' + b.bg + ';color:' + b.fg + ';">' + initials(r.brand) + '</span><span class="fw-semibold text-dark">' + esc(r.brand) + '</span></div></td>' +
                '<td>' + inr(r.cvT) + '</td><td>' + achBadge(r.cvA, r.cvT, true) + '</td><td>' + progressBar(pct(r.cvA, r.cvT)) + '</td>' +
                '<td class="text-end pe-4">' + menu('brand', r.id, [
                    { act: 'edit', icon: 'bi-pencil-square', color: 'primary', title: 'Edit Target', sub: 'Update collection target' }, '-',
                    { act: 'del', icon: 'bi-trash', color: 'danger', title: 'Delete Target', sub: 'Remove this record', danger: true }
                ]) + '</td></tr>';
        }).join('') || emptyRow(7);
        $id('tgTfoot').innerHTML = rows.length ? '<tr><td colspan="3" class="ps-4 text-danger">Total</td><td>' + inr(tT) + '</td><td>' + inr(tA) + '</td><td>' + progressBar(pct(tA, tT)) + '</td><td></td></tr>' : '';
        $id('tgSummary').textContent = rows.length ? 'Collection ' + pct(tA, tT) + '% achieved' : '';
    }

    function renderSlabs(rows) {
        $id('tgThead').innerHTML = '<tr><th class="ps-4">S.No</th><th>Code</th><th>Slab Title</th><th>Collection Min</th><th>Collection Max</th><th>Incentive %</th><th>Staff in Slab (' + state.year + ')</th><th>Status</th><th class="text-end pe-4">Actions</th></tr>';
        $id('tgTbody').innerHTML = rows.map(function (r, i) {
            var inSlab = staffData.filter(function (s) { return s.year === state.year && earnedSlab(s.cvA) === r; }).length;
            var tint = slabTint(r);
            return '<tr>' +
                '<td class="ps-4 fw-semibold text-muted">' + (i + 1) + '</td>' +
                '<td><span class="badge bg-secondary-subtle text-secondary border font-12">' + esc(r.code) + '</span></td>' +
                '<td><span class="badge bg-' + tint + '-subtle text-' + tint + ' border font-12">' + esc(r.title) + '</span></td>' +
                '<td>' + inr(r.min) + '</td><td>' + (r.max === null ? '<span class="text-muted">Unlimited</span>' : inr(r.max)) + '</td>' +
                '<td><span class="badge bg-info-subtle text-info border font-11">' + r.pct.toFixed(1) + '%</span></td>' +
                '<td>' + (inSlab ? '<span class="fw-semibold text-dark">' + inSlab + '</span> <span class="text-muted font-12">record' + (inSlab > 1 ? 's' : '') + '</span>' : '<span class="text-muted">&mdash;</span>') + '</td>' +
                '<td><span class="badge bg-' + (r.status === 'Enable' ? 'success' : 'secondary') + '-subtle text-' + (r.status === 'Enable' ? 'success' : 'secondary') + ' border font-11">' + r.status + '</span></td>' +
                '<td class="text-end pe-4">' + menu('slabs', r.id, [
                    { act: 'edit', icon: 'bi-pencil-square', color: 'primary', title: 'Edit Slab', sub: 'Modify range & %' },
                    { act: 'toggle', icon: r.status === 'Enable' ? 'bi-toggle-off' : 'bi-toggle-on', color: 'warning', title: r.status === 'Enable' ? 'Disable Slab' : 'Enable Slab', sub: 'Exclude / include in payouts' }, '-',
                    { act: 'del', icon: 'bi-trash', color: 'danger', title: 'Delete Slab', sub: 'Remove slab tier', danger: true }
                ]) + '</td></tr>';
        }).join('') || emptyRow(9);
        $id('tgTfoot').innerHTML = '';
        $id('tgSummary').textContent = 'Incentive is paid on monthly collection achieved';
    }

    function emptyRow(cols) {
        return '<tr><td colspan="' + cols + '" class="text-center text-muted py-5"><i class="bi bi-inbox fs-3 d-block mb-2"></i>No records for the selected year / filters</td></tr>';
    }

    var TAB_META = {
        staff: { title: 'Staff Targets', icon: 'bi-person-badge', create: 'Create Staff Target', unit: 'Records' },
        brand: { title: 'Brand Targets', icon: 'bi-tags', create: 'Create Brand Target', unit: 'Records' },
        slabs: { title: 'Incentive Slabs', icon: 'bi-bar-chart-steps', create: 'Add Incentive Slab', unit: 'Slabs' }
    };

    function render() {
        var tab = state.tab, meta = TAB_META[tab], rows = rowsFor(tab);
        if (tab === 'staff') renderStaff(rows); else if (tab === 'brand') renderBrand(rows); else renderSlabs(rows);

        $id('tgCardTitle').innerHTML = '<i class="bi ' + meta.icon + ' text-primary me-2"></i>' + meta.title;
        $id('tgCreateLabel').textContent = meta.create;
        $id('tgCountBadge').textContent = rows.length + ' ' + meta.unit;
        var total = tab === 'slabs' ? slabData.length : (tab === 'staff' ? staffData : brandData).filter(function (r) { return r.year === state.year; }).length;
        $id('tgFooterText').textContent = 'Showing ' + rows.length + ' of ' + total + ' ' + meta.unit.toLowerCase() + (tab === 'slabs' ? '' : ' for ' + state.year);
        $id('tgYears').classList.toggle('d-none', tab === 'slabs');
        $id('tgChartCard').classList.toggle('d-none', tab !== 'staff');

        document.querySelectorAll('[data-ftab]').forEach(function (el) {
            el.classList.toggle('d-none', el.getAttribute('data-ftab').split(' ').indexOf(tab) === -1);
        });
        var f = filters[tab], n = Object.keys(f).filter(function (k) { return f[k]; }).length;
        $id('tgFilterBadge').textContent = n;
        $id('tgFilterBadge').classList.toggle('d-none', n === 0);

        if (tab === 'staff') buildChart();
    }

    /* ==================== CHART ==================== */
    function buildChart() {
        $id('tgChartSub').textContent = state.year + ' \u00B7 monthly totals, all staff';
        if (typeof Chart === 'undefined') return;
        var bvT = new Array(12).fill(0), bvA = new Array(12).fill(0), cvT = new Array(12).fill(0), cvA = new Array(12).fill(0);
        staffData.forEach(function (r) {
            if (r.year !== state.year) return;
            bvT[r.month - 1] += r.bvvT; bvA[r.month - 1] += r.bvvA; cvT[r.month - 1] += r.cvT; cvA[r.month - 1] += r.cvA;
        });
        if (chart) chart.destroy();
        chart = new Chart($id('tgChart'), {
            data: {
                labels: MONTHS.map(function (m) { return m.slice(0, 3); }),
                datasets: [
                    { type: 'bar', label: 'BV Target', data: bvT, backgroundColor: 'rgba(37,99,235,.15)', borderColor: '#2563eb', borderWidth: 1.5, borderRadius: 6, maxBarThickness: 22 },
                    { type: 'line', label: 'BV Achieved', data: bvA, borderColor: '#2563eb', borderWidth: 2.5, tension: .35, pointRadius: 3, pointBackgroundColor: '#2563eb' },
                    { type: 'bar', label: 'CV Target', data: cvT, backgroundColor: 'rgba(22,163,74,.15)', borderColor: '#16a34a', borderWidth: 1.5, borderRadius: 6, maxBarThickness: 22 },
                    { type: 'line', label: 'CV Achieved', data: cvA, borderColor: '#16a34a', borderWidth: 2.5, tension: .35, pointRadius: 3, pointBackgroundColor: '#16a34a' }
                ]
            },
            options: {
                responsive: true, maintainAspectRatio: false, interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: { position: 'top', labels: { boxWidth: 12, font: { size: 11 } } },
                    tooltip: { callbacks: { label: function (c) { return ' ' + c.dataset.label + ': ' + inrShort(c.parsed.y); } } }
                },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { size: 10 } } },
                    y: { grid: { color: '#eef0f3' }, border: { display: false }, ticks: { font: { size: 10 }, callback: function (v) { return inrShort(v); } } }
                }
            }
        });
    }
    function loadChart(cb) {
        if (window.Chart && parseInt(Chart.version, 10) >= 3) return cb();
        var s = document.createElement('script');
        s.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';
        s.onload = cb;
        document.head.appendChild(s);
    }

    /* ==================== TABS & YEAR ==================== */
    function setTab(tab) {
        if (!TAB_META[tab]) tab = 'staff';
        state.tab = tab;
        document.querySelectorAll('#tgTabs [data-tab]').forEach(function (b) { b.classList.toggle('active', b.getAttribute('data-tab') === tab); });
        syncFilterForm();
        if (window.history && history.replaceState) history.replaceState(null, '', tab === 'staff' ? 'target.php' : 'target.php?tab=' + tab);
        render();
    }
    $id('tgTabs').addEventListener('click', function (e) {
        var b = e.target.closest('[data-tab]');
        if (b) setTab(b.getAttribute('data-tab'));
    });
    $id('tgYears').addEventListener('click', function (e) {
        var b = e.target.closest('[data-year]');
        if (!b) return;
        state.year = Number(b.getAttribute('data-year'));
        this.querySelectorAll('[data-year]').forEach(function (x) { x.classList.toggle('active', x === b); });
        render();
    });

    /* ==================== FILTER FORM ==================== */
    var FIELD_MAP = { q: 'fSearch', month: 'fMonth', staff: 'fStaff', perf: 'fPerf', brand: 'fBrand', status: 'fStatus' };
    var TAB_FIELDS = { staff: ['q', 'month', 'staff', 'perf'], brand: ['q', 'month', 'brand'], slabs: ['q', 'status'] };
    function syncFilterForm() {
        var f = filters[state.tab];
        Object.keys(FIELD_MAP).forEach(function (k) { $id(FIELD_MAP[k]).value = f[k] || ''; });
    }
    function closeFilters() {
        var oc = bootstrap.Offcanvas.getInstance($id('tgFilterOffcanvas'));
        if (oc) oc.hide();
    }
    $id('fApply').addEventListener('click', function () {
        var f = {};
        TAB_FIELDS[state.tab].forEach(function (k) { f[k] = $id(FIELD_MAP[k]).value.trim(); });
        filters[state.tab] = f;
        render();
        closeFilters();
    });
    $id('fReset').addEventListener('click', function () {
        filters[state.tab] = {};
        syncFilterForm();
        render();
        closeFilters();
    });
    $id('fSearch').addEventListener('keydown', function (e) { if (e.key === 'Enter') $id('fApply').click(); });

    /* ==================== CREATE / EDIT ==================== */
    $id('tgCreateBtn').addEventListener('click', function () {
        state.editId = null;
        if (state.tab === 'staff') {
            $id('staffModalTitle').textContent = 'New Staff Target';
            $id('smYear').value = state.year; $id('smMonth').value = new Date().getMonth() + 1; $id('smStaff').value = '';
            $id('smBvn').value = ''; $id('smBvv').value = ''; $id('smCvv').value = '';
            modal('staffModal').show();
        } else if (state.tab === 'brand') {
            $id('brandModalTitle').textContent = 'New Brand Target';
            $id('bmYear').value = state.year; $id('bmMonth').value = new Date().getMonth() + 1; $id('bmBrand').value = ''; $id('bmCv').value = '';
            modal('brandModal').show();
        } else {
            $id('slabModalTitle').textContent = 'New Incentive Slab';
            $id('slCode').value = 'SLAB-' + (slabData.length + 1); $id('slTitle').value = ''; $id('slMin').value = ''; $id('slMax').value = ''; $id('slPct').value = ''; $id('slStatus').value = 'Enable';
            modal('slabModal').show();
        }
    });

    document.addEventListener('click', function (e) {
        var a = e.target.closest('[data-act][data-tab]');
        if (!a) return;
        var tab = a.getAttribute('data-tab'), id = Number(a.getAttribute('data-id')), act = a.getAttribute('data-act');
        var list = tab === 'staff' ? staffData : tab === 'brand' ? brandData : slabData;
        var rec = list.find(function (r) { return r.id === id; });
        if (!rec) return;

        if (act === 'del') {
            if (confirm('Delete this record?')) { list.splice(list.indexOf(rec), 1); render(); }
            return;
        }
        if (act === 'toggle') {
            rec.status = rec.status === 'Enable' ? 'Disable' : 'Enable';
            render();
            return;
        }
        state.editId = id;
        if (tab === 'staff') {
            $id('staffModalTitle').textContent = 'Edit Staff Target';
            $id('smYear').value = rec.year; $id('smMonth').value = rec.month; $id('smStaff').value = rec.staff;
            $id('smBvn').value = rec.bvnT; $id('smBvv').value = rec.bvvT; $id('smCvv').value = rec.cvT;
            modal('staffModal').show();
        } else if (tab === 'brand') {
            $id('brandModalTitle').textContent = 'Edit Brand Target';
            $id('bmYear').value = rec.year; $id('bmMonth').value = rec.month; $id('bmBrand').value = rec.brand; $id('bmCv').value = rec.cvT;
            modal('brandModal').show();
        } else {
            $id('slabModalTitle').textContent = 'Edit Incentive Slab';
            $id('slCode').value = rec.code; $id('slTitle').value = rec.title; $id('slMin').value = rec.min;
            $id('slMax').value = rec.max === null ? '' : rec.max; $id('slPct').value = rec.pct; $id('slStatus').value = rec.status;
            modal('slabModal').show();
        }
    });

    function nextId(list) { return list.reduce(function (m, r) { return Math.max(m, r.id); }, 0) + 1; }

    $id('smSave').addEventListener('click', function () {
        var v = { year: Number($id('smYear').value), month: Number($id('smMonth').value), staff: $id('smStaff').value, bvnT: Number($id('smBvn').value) || 0, bvvT: Number($id('smBvv').value) || 0, cvT: Number($id('smCvv').value) || 0 };
        if (!v.staff || !v.bvvT || !v.cvT) { alert('Please select an employee and enter Business & Collection values.'); return; }
        var dup = staffData.find(function (r) { return r.year === v.year && r.month === v.month && r.staff === v.staff && r.id !== state.editId; });
        if (dup) { alert(v.staff + ' already has a target for ' + MONTHS[v.month - 1] + ' ' + v.year + '. Edit that record instead.'); return; }
        if (state.editId) Object.assign(staffData.find(function (r) { return r.id === state.editId; }), v);
        else staffData.push(Object.assign({ id: nextId(staffData), src: 0, bvnA: 0, bvvA: 0, cvA: 0 }, v));
        modal('staffModal').hide();
        goToYear(v.year);
    });

    $id('bmSave').addEventListener('click', function () {
        var v = { year: Number($id('bmYear').value), month: Number($id('bmMonth').value), brand: $id('bmBrand').value, cvT: Number($id('bmCv').value) || 0 };
        if (!v.brand || !v.cvT) { alert('Please select a brand and enter the collection target.'); return; }
        var dup = brandData.find(function (r) { return r.year === v.year && r.month === v.month && r.brand === v.brand && r.id !== state.editId; });
        if (dup) { alert(v.brand + ' already has a target for ' + MONTHS[v.month - 1] + ' ' + v.year + '. Edit that record instead.'); return; }
        if (state.editId) Object.assign(brandData.find(function (r) { return r.id === state.editId; }), v);
        else brandData.push(Object.assign({ id: nextId(brandData), cvA: 0 }, v));
        modal('brandModal').hide();
        goToYear(v.year);
    });

    $id('slSave').addEventListener('click', function () {
        var maxRaw = $id('slMax').value.trim();
        var v = { code: $id('slCode').value.trim() || 'SLAB', title: $id('slTitle').value.trim(), min: Number($id('slMin').value), max: maxRaw === '' ? null : Number(maxRaw), pct: Number($id('slPct').value), status: $id('slStatus').value };
        if (!v.title || $id('slMin').value === '' || $id('slPct').value === '') { alert('Please enter title, minimum collection and incentive %.'); return; }
        if (v.max !== null && v.max < v.min) { alert('Maximum must be greater than minimum.'); return; }
        var overlap = slabData.find(function (s) {
            if (s.id === state.editId || s.status !== 'Enable' || v.status !== 'Enable') return false;
            var sMax = s.max === null ? Infinity : s.max, vMax = v.max === null ? Infinity : v.max;
            return v.min <= sMax && s.min <= vMax;
        });
        if (overlap && !confirm('This range overlaps with "' + overlap.title + '". Save anyway?')) return;
        if (state.editId) Object.assign(slabData.find(function (r) { return r.id === state.editId; }), v);
        else slabData.push(Object.assign({ id: nextId(slabData) }, v));
        modal('slabModal').hide();
        render();
    });

    function goToYear(y) {
        var btn = document.querySelector('#tgYears [data-year="' + y + '"]');
        if (btn) btn.click(); else render();
    }

    /* ==================== EXPORT ==================== */
    $id('tgExportBtn').addEventListener('click', function () {
        var rows = rowsFor(state.tab), out;
        if (state.tab === 'staff') {
            out = [['Month', 'Staff', 'Sourcing', 'BV No. Target', 'BV No. Achieved', 'BV Target', 'BV Achieved', 'CV Target', 'CV Achieved', 'CV %', 'Earned Slab', 'Incentive %', 'Incentive Amount']];
            rows.forEach(function (r) {
                var s = earnedSlab(r.cvA);
                out.push([MONTHS[r.month - 1] + ' ' + r.year, r.staff, r.src, r.bvnT, r.bvnA, r.bvvT, r.bvvA, r.cvT, r.cvA, pct(r.cvA, r.cvT) + '%', s ? s.title : '', s ? s.pct : '', s ? Math.round(r.cvA * s.pct / 100) : 0]);
            });
        } else if (state.tab === 'brand') {
            out = [['Month', 'Brand', 'CV Target', 'CV Achieved', 'Achieved %']];
            rows.forEach(function (r) { out.push([MONTHS[r.month - 1] + ' ' + r.year, r.brand, r.cvT, r.cvA, pct(r.cvA, r.cvT) + '%']); });
        } else {
            out = [['Code', 'Title', 'Collection Min', 'Collection Max', 'Incentive %', 'Status']];
            rows.forEach(function (r) { out.push([r.code, r.title, r.min, r.max === null ? 'Unlimited' : r.max, r.pct, r.status]); });
        }
        var csv = out.map(function (row) { return row.map(function (c) { return '"' + String(c).replace(/"/g, '""') + '"'; }).join(','); }).join('\n');
        var a = document.createElement('a');
        a.href = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
        a.download = (state.tab === 'slabs' ? 'incentive_slabs' : state.tab + '_targets_' + state.year) + '_' + new Date().toISOString().slice(0, 10) + '.csv';
        document.body.appendChild(a); a.click(); a.remove();
    });

    /* ==================== INIT ==================== */
    var monthOpts = MONTHS.map(function (m, i) { return { v: i + 1, t: m }; });
    var yearOpts = YEARS.map(function (y) { return { v: y, t: y }; });
    fillSelect($id('fMonth'), monthOpts, 'All Months');
    fillSelect($id('fStaff'), STAFF.map(function (s) { return { v: s.name, t: s.name }; }), 'All Staff');
    fillSelect($id('fBrand'), BRANDS.map(function (b) { return { v: b.name, t: b.name }; }), 'All Brands');
    fillSelect($id('smYear'), yearOpts); fillSelect($id('smMonth'), monthOpts);
    fillSelect($id('smStaff'), STAFF.map(function (s) { return { v: s.name, t: s.name }; }), 'Select employee');
    fillSelect($id('bmYear'), yearOpts); fillSelect($id('bmMonth'), monthOpts);
    fillSelect($id('bmBrand'), BRANDS.map(function (b) { return { v: b.name, t: b.name }; }), 'Select brand');

    setTab(new URLSearchParams(window.location.search).get('tab') || 'staff');
    loadChart(function () { if (state.tab === 'staff') buildChart(); });
})();
</script>
