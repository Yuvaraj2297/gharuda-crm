<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">
<link rel="stylesheet" href="./assets/css/brand-target.css">

<main class="bt5-page">
    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="bt5-title-ico"><i class="bi bi-tags-fill"></i></div>
            <div>
                <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Brand Target</h1>
                <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
                    <span>CRM</span>
                    <i class="bi bi-chevron-right" style="font-size:10px;"></i>
                    <span class="fw-bold text-dark">Brand Target</span>
                </nav>
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="bt5CreateBtn">
            <i class="bi bi-plus-lg me-1"></i>Create New Brand Target
        </button>
    </div>

    <!-- ===== Filter strip ===== -->
    <div class="bt5-filter-bar mb-3">
        <div>
            <div class="bt5-filter-label">Brands</div>
            <select class="form-select select2 bt5-field" id="bt5BrandFilter" data-placeholder="All Brands" style="min-width:190px;">
                <option value="">All Brands</option>
                <option value="PhDAssistance">PhDAssistance</option>
                <option value="GEO Care">GEO Care</option>
                <option value="gharuda Software">gharuda Software</option>
                <option value="GHARUDA SOFTWARE">GHARUDA SOFTWARE</option>
                <option value="Zen Publications">Zen Publications</option>
            </select>
        </div>
        <div>
            <label class="bt5-filter-label" for="bt5FromDate">From Date</label>
            <div class="date-picker">
                <input type="text" class="date-input form-control bt5-field" id="bt5FromDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
            </div>
        </div>
        <div>
            <label class="bt5-filter-label" for="bt5ToDate">To Date</label>
            <div class="date-picker">
                <input type="text" class="date-input form-control bt5-field" id="bt5ToDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
            </div>
        </div>
        <button type="button" class="btn btn-primary px-4" id="bt5SearchBtn">
            <i class="bi bi-search me-1"></i>Search
        </button>
    </div>

    <!-- ===== Grouped table card (jobtype.php table flow with datatable class) ===== -->
    <div class="card-custom p-0 overflow-hidden mb-3" id="brandTargetTableWrap">
        <!-- Table (toolbar + export + column visibility + search + show entries + pagination auto-created by datatable class via auto-master-table.js) -->
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="bt5Table" data-table-name="Brand Targets">
                <thead>
                    <tr>
                        <th rowspan="2" style="width:60px;">S.No</th>
                        <th rowspan="2" style="min-width:150px;">Month &amp; Year</th>
                        <th rowspan="2" style="min-width:200px;">Brand Name</th>
                        <th colspan="2" class="thead-group gb-cvv">CV Value</th>
                        <th rowspan="2" style="width:110px;">Option</th>
                    </tr>
                    <tr>
                        <th class="thead-sub" data-col-title="CV Value (Actual)">Actual</th>
                        <th class="thead-sub" data-col-title="CV Value (Achieved)">Achieved</th>
                    </tr>
                </thead>
                <tbody id="bt5Tbody">
                    <tr data-id="1" data-year="2026" data-month="10" data-brand="PhDAssistance" data-actual="80000" data-achieved="92000">
                        <td>1</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>October - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#eff6ff;color:#2563eb;">PA</span>
                                <span class="fw-bold">PhDAssistance</span>
                            </div>
                        </td>
                        <td>₹ 80,000.00</td>
                        <td><span class="ach-pill pill-up"><i class="bi bi-arrow-up-right"></i>₹ 92,000.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="1"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="1"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="2" data-year="2026" data-month="10" data-brand="GEO Care" data-actual="120000" data-achieved="95000">
                        <td>2</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>October - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#ecfdf5;color:#16a34a;">GC</span>
                                <span class="fw-bold">GEO Care</span>
                            </div>
                        </td>
                        <td>₹ 1,20,000.00</td>
                        <td><span class="ach-pill pill-down"><i class="bi bi-arrow-down-right"></i>₹ 95,000.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="2"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="2"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="3" data-year="2026" data-month="9" data-brand="gharuda Software" data-actual="150000" data-achieved="175000">
                        <td>3</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>September - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#f5f3ff;color:#7c3aed;">GS</span>
                                <span class="fw-bold">gharuda Software</span>
                            </div>
                        </td>
                        <td>₹ 1,50,000.00</td>
                        <td><span class="ach-pill pill-up"><i class="bi bi-arrow-up-right"></i>₹ 1,75,000.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="3"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="3"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="4" data-year="2026" data-month="9" data-brand="Zen Publications" data-actual="75000" data-achieved="60000">
                        <td>4</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>September - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#fffbeb;color:#d97706;">ZP</span>
                                <span class="fw-bold">Zen Publications</span>
                            </div>
                        </td>
                        <td>₹ 75,000.00</td>
                        <td><span class="ach-pill pill-down"><i class="bi bi-arrow-down-right"></i>₹ 60,000.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="4"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="4"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="5" data-year="2026" data-month="8" data-brand="GHARUDA SOFTWARE" data-actual="200000" data-achieved="215000">
                        <td>5</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>August - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#fdf2f8;color:#db2777;">GS</span>
                                <span class="fw-bold">GHARUDA SOFTWARE</span>
                            </div>
                        </td>
                        <td>₹ 2,00,000.00</td>
                        <td><span class="ach-pill pill-up"><i class="bi bi-arrow-up-right"></i>₹ 2,15,000.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="5"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="5"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="6" data-year="2026" data-month="7" data-brand="PhDAssistance" data-actual="50000" data-achieved="0">
                        <td>6</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>July - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#eff6ff;color:#2563eb;">PA</span>
                                <span class="fw-bold">PhDAssistance</span>
                            </div>
                        </td>
                        <td>₹ 50,000.00</td>
                        <td><span class="ach-pill pill-down"><i class="bi bi-arrow-down-right"></i>₹ 0.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="6"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="6"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="7" data-year="2026" data-month="6" data-brand="GEO Care" data-actual="90000" data-achieved="105000">
                        <td>7</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>June - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#ecfdf5;color:#16a34a;">GC</span>
                                <span class="fw-bold">GEO Care</span>
                            </div>
                        </td>
                        <td>₹ 90,000.00</td>
                        <td><span class="ach-pill pill-up"><i class="bi bi-arrow-up-right"></i>₹ 1,05,000.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="7"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="7"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="8" data-year="2026" data-month="5" data-brand="Zen Publications" data-actual="85000" data-achieved="85000">
                        <td>8</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>May - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#ecfeff;color:#0891b2;">ZP</span>
                                <span class="fw-bold">Zen Publications</span>
                            </div>
                        </td>
                        <td>₹ 85,000.00</td>
                        <td><span class="ach-pill pill-flat"><i class="bi bi-dash-lg"></i>₹ 85,000.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="8"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="8"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="9" data-year="2026" data-month="4" data-brand="gharuda Software" data-actual="130000" data-achieved="142000">
                        <td>9</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>April - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#f5f3ff;color:#7c3aed;">GS</span>
                                <span class="fw-bold">gharuda Software</span>
                            </div>
                        </td>
                        <td>₹ 1,30,000.00</td>
                        <td><span class="ach-pill pill-up"><i class="bi bi-arrow-up-right"></i>₹ 1,42,000.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="9"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="9"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="10" data-year="2026" data-month="3" data-brand="GHARUDA SOFTWARE" data-actual="160000" data-achieved="115000">
                        <td>10</td>
                        <td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>March - 2026</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="brand-chip" style="background:#fdf2f8;color:#db2777;">GS</span>
                                <span class="fw-bold">GHARUDA SOFTWARE</span>
                            </div>
                        </td>
                        <td>₹ 1,60,000.00</td>
                        <td><span class="ach-pill pill-down"><i class="bi bi-arrow-down-right"></i>₹ 1,15,000.00</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="10"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="10"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="bt5-subtotal">
                        <td colspan="3" class="bt-label">Target Vs Achieved</td>
                        <td class="bt-actual">₹ 11,40,000.00</td>
                        <td class="bt-ach">₹ 10,79,000.00</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>

<!-- ===== New / Edit Brand Target Modal ===== -->
<div class="modal fade" id="bt5Modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="bt5-modal-ico"><i class="bi bi-tags-fill"></i></div>
                    <h6 class="fw-bold mb-0" style="font-size:15px;" id="bt5ModalTitle">New Brand Target</h6>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Year</label>
                        <select class="form-select select2" id="bt5Year" data-placeholder="Select Year">
                            <option value=""></option>
                            <option value="2027">2027</option>
                            <option value="2026" selected>2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Month</label>
                        <select class="form-select select2" id="bt5MonthSel" data-placeholder="Select Month">
                            <option value=""></option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10" selected>October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Brand</label>
                        <select class="form-select select2" id="bt5Brand" data-placeholder="Select Brand">
                            <option value=""></option>
                            <option value="PhDAssistance">PhDAssistance</option>
                            <option value="GEO Care">GEO Care</option>
                            <option value="gharuda Software">gharuda Software</option>
                            <option value="GHARUDA SOFTWARE">GHARUDA SOFTWARE</option>
                            <option value="Zen Publications">Zen Publications</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Collection Value</label>
                        <input type="number" class="form-control" id="bt5CollectionValue" min="0" placeholder="0">
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="bt5SubmitBtn">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    (function() {
        'use strict';

        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var BRAND_COLORS = [
            { bg: '#eff6ff', fg: '#2563eb' },
            { bg: '#ecfdf5', fg: '#16a34a' },
            { bg: '#fffbeb', fg: '#d97706' },
            { bg: '#f5f3ff', fg: '#7c3aed' },
            { bg: '#fdf2f8', fg: '#db2777' },
            { bg: '#ecfeff', fg: '#0891b2' }
        ];

        function inrFmt(n) {
            var neg = n < 0;
            var s = Math.abs(n).toFixed(2).split('.');
            var int = s[0], last3 = int.slice(-3), rest = int.slice(0, -3);
            if (rest) rest = rest.replace(/\B(?=(\d{2})+(?!\d))/g, ',') + ',';
            return (neg ? '-₹ ' : '₹ ') + rest + last3 + '.' + s[1];
        }

        function brandStyle(name) {
            var h = 0;
            String(name).split('').forEach(function(c) { h = (h * 31 + c.charCodeAt(0)) % 997; });
            return BRAND_COLORS[h % BRAND_COLORS.length];
        }

        function brandInitials(name) {
            var w = String(name).trim().split(/\s+/);
            var s = w.length > 1 ? (w[0].charAt(0) + w[1].charAt(0)) : w[0].slice(0, 2);
            return s.toUpperCase();
        }

        function achPill(v, act) {
            var cls = v > act ? 'pill-up' : v < act ? 'pill-down' : 'pill-flat';
            var ico = v > act ? 'bi-arrow-up-right' : v < act ? 'bi-arrow-down-right' : 'bi-dash-lg';
            return '<span class="ach-pill ' + cls + '"><i class="bi ' + ico + '"></i>' + inrFmt(v) + '</span>';
        }

        /* ---------- Date helper ---------- */
        function dateToMonthKey(dStr) {
            if (!dStr) return 0;
            var p = String(dStr).trim().split('-');
            if (p.length === 3) {
                var m = Number(p[1]), y = Number(p[2]);
                if (y && m) return y * 100 + m;
            }
            if (p.length === 2) {
                return Number(p[0]) * 100 + Number(p[1]);
            }
            return 0;
        }

        /* ---------- Filter strip handler ---------- */
        function applyFilters() {
            var brandVal = document.getElementById('bt5BrandFilter').value.trim();
            var fromKey = dateToMonthKey(document.getElementById('bt5FromDate').value);
            var toKey = dateToMonthKey(document.getElementById('bt5ToDate').value);

            if (fromKey && toKey && fromKey > toKey) {
                alert('From Date cannot be after To Date.');
                return;
            }

            var rows = document.querySelectorAll('#bt5Tbody tr[data-id]');
            rows.forEach(function(tr) {
                var rBrand = tr.getAttribute('data-brand') || '';
                var rYear = Number(tr.getAttribute('data-year') || 0);
                var rMonth = Number(tr.getAttribute('data-month') || 0);
                var rKey = rYear * 100 + rMonth;

                var show = true;
                if (brandVal && rBrand !== brandVal) show = false;
                if (fromKey && rKey < fromKey) show = false;
                if (toKey && rKey > toKey) show = false;

                tr.style.display = show ? '' : 'none';
            });
        }

        document.getElementById('bt5SearchBtn').addEventListener('click', applyFilters);

        ['bt5FromDate', 'bt5ToDate'].forEach(function(id) {
            var el = document.getElementById(id);
            if (el) {
                el.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') applyFilters();
                });
            }
        });

        /* ---------- Modal Edit / Create State ---------- */
        var editTr = null;
        var nextId = 11;

        document.getElementById('bt5CreateBtn').addEventListener('click', function() {
            editTr = null;
            document.getElementById('bt5ModalTitle').textContent = 'New Brand Target';
            document.getElementById('bt5Year').value = '2026';
            document.getElementById('bt5MonthSel').value = String(new Date().getMonth() + 1);
            document.getElementById('bt5Brand').value = '';
            document.getElementById('bt5CollectionValue').value = '';

            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('#bt5Year').val('2026').trigger('change.select2');
                $('#bt5MonthSel').val(String(new Date().getMonth() + 1)).trigger('change.select2');
                $('#bt5Brand').val('').trigger('change.select2');
            }

            bootstrap.Modal.getOrCreateInstance(document.getElementById('bt5Modal')).show();
        });

        /* ---------- Table Actions (Edit / Delete) ---------- */
        document.getElementById('bt5Table').addEventListener('click', function(e) {
            var btn = e.target.closest('[data-b5act]');
            if (!btn) return;
            var act = btn.getAttribute('data-b5act');
            var tr = btn.closest('tr');
            if (!tr) return;

            if (act === 'edit') {
                editTr = tr;
                var year = tr.getAttribute('data-year') || '2026';
                var month = tr.getAttribute('data-month') || '10';
                var brand = tr.getAttribute('data-brand') || '';
                var actual = tr.getAttribute('data-actual') || '0';

                document.getElementById('bt5ModalTitle').textContent = 'Edit Brand Target';
                document.getElementById('bt5Year').value = year;
                document.getElementById('bt5MonthSel').value = month;
                document.getElementById('bt5Brand').value = brand;
                document.getElementById('bt5CollectionValue').value = actual;

                if (typeof $ !== 'undefined' && $.fn.select2) {
                    $('#bt5Year').val(year).trigger('change.select2');
                    $('#bt5MonthSel').val(month).trigger('change.select2');
                    $('#bt5Brand').val(brand).trigger('change.select2');
                }

                bootstrap.Modal.getOrCreateInstance(document.getElementById('bt5Modal')).show();
            } else if (act === 'del') {
                if (confirm('Delete this brand target?')) {
                    tr.remove();
                }
            }
        });

        /* ---------- Modal Submit ---------- */
        document.getElementById('bt5SubmitBtn').addEventListener('click', function() {
            var yearVal = Number(document.getElementById('bt5Year').value);
            var monthVal = Number(document.getElementById('bt5MonthSel').value);
            var brandVal = document.getElementById('bt5Brand').value;
            var cvVal = document.getElementById('bt5CollectionValue').value;

            if (!yearVal || !monthVal || !brandVal || cvVal === '') {
                alert('Please fill all the required fields.');
                return;
            }

            var actNum = Number(cvVal) || 0;
            var monthName = MONTHS[monthVal - 1] + ' - ' + yearVal;
            var c = brandStyle(brandVal);
            var inits = brandInitials(brandVal);

            if (editTr) {
                var achNum = Number(editTr.getAttribute('data-achieved')) || 0;
                editTr.setAttribute('data-year', yearVal);
                editTr.setAttribute('data-month', monthVal);
                editTr.setAttribute('data-brand', brandVal);
                editTr.setAttribute('data-actual', actNum);

                editTr.cells[1].innerHTML = '<span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>' + monthName + '</span>';
                editTr.cells[2].innerHTML = '<div class="d-flex align-items-center gap-2"><span class="brand-chip" style="background:' + c.bg + ';color:' + c.fg + ';">' + inits + '</span><span class="fw-bold">' + brandVal + '</span></div>';
                editTr.cells[3].textContent = inrFmt(actNum);
                editTr.cells[4].innerHTML = achPill(achNum, actNum);
            } else {
                var newId = nextId++;
                var tbody = document.getElementById('bt5Tbody');
                var tr = document.createElement('tr');
                tr.setAttribute('data-id', newId);
                tr.setAttribute('data-year', yearVal);
                tr.setAttribute('data-month', monthVal);
                tr.setAttribute('data-brand', brandVal);
                tr.setAttribute('data-actual', actNum);
                tr.setAttribute('data-achieved', 0);

                var sNo = tbody.children.length + 1;
                tr.innerHTML =
                    '<td>' + sNo + '</td>' +
                    '<td><span class="fw-bold"><i class="bi bi-calendar3 me-2 text-neutral" style="font-size:12px;"></i>' + monthName + '</span></td>' +
                    '<td><div class="d-flex align-items-center gap-2"><span class="brand-chip" style="background:' + c.bg + ';color:' + c.fg + ';">' + inits + '</span><span class="fw-bold">' + brandVal + '</span></div></td>' +
                    '<td>' + inrFmt(actNum) + '</td>' +
                    '<td>' + achPill(0, actNum) + '</td>' +
                    '<td>' +
                        '<div class="d-flex align-items-center gap-1">' +
                            '<button type="button" class="bt5-act edit" title="Edit" data-b5act="edit" data-id="' + newId + '"><i class="bi bi-pencil-square"></i></button>' +
                            '<button type="button" class="bt5-act del" title="Delete" data-b5act="del" data-id="' + newId + '"><i class="bi bi-x-lg"></i></button>' +
                        '</div>' +
                    '</td>';
                tbody.insertBefore(tr, tbody.firstChild);
            }

            bootstrap.Modal.getOrCreateInstance(document.getElementById('bt5Modal')).hide();
        });

        /* ---------- Init Modal & Filter Select2 ---------- */
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $('#bt5BrandFilter').select2({
                width: '100%',
                placeholder: 'All Brands',
                allowClear: true
            }).on('change', applyFilters);

            $('#bt5Modal').on('shown.bs.modal', function() {
                var $m = $(this);
                $m.find('select.select2').each(function() {
                    if ($(this).data('select2')) {
                        $(this).select2('destroy');
                    }
                    $(this).select2({
                        dropdownParent: $m,
                        width: '100%',
                        placeholder: $(this).attr('data-placeholder') || 'Select...'
                    });
                });
            });
        }
    })();
</script>
