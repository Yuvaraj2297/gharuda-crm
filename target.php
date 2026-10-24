<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/target.css">

<main class="tgt5-page">
    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Target</h1>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <div class="tgt5-year-pills" id="tgt5YearPills">
                <button type="button" class="tgt5-year-pill" data-year="2027">2027</button>
                <button type="button" class="tgt5-year-pill active" data-year="2026">2026</button>
                <button type="button" class="tgt5-year-pill" data-year="2025">2025</button>
            </div>
            <button type="button" class="btn btn-primary btn-sm" id="tgt5CreateBtn">
                <i class="bi bi-plus-lg me-1"></i>Create New Target
            </button>
        </div>
    </div>

    <!-- ===== KPI strip ===== -->
    <div class="row g-3 mb-3">
        <div class="col-xl-3 col-md-6">
            <div class="tgt5-kpi">
                <div class="lbl">Business Target</div>
                <div class="val" id="tgt5KpiBv">₹10.60 L</div>
                <div class="bar"><span id="tgt5KpiBvBar" style="width:51%;"></span></div>
                <div class="sub" id="tgt5KpiBvSub">51% achieved</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="tgt5-kpi">
                <div class="lbl">Business Achieved</div>
                <div class="val" id="tgt5KpiBvA">₹5.35 L</div>
                <div class="sub" id="tgt5KpiBvGap">Gap: ₹5.25 L</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="tgt5-kpi">
                <div class="lbl">Collection Target</div>
                <div class="val" id="tgt5KpiCv">₹65.00 L</div>
                <div class="bar"><span id="tgt5KpiCvBar" style="width:22%;"></span></div>
                <div class="sub" id="tgt5KpiCvSub">22% achieved</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="tgt5-kpi">
                <div class="lbl">Collection Achieved</div>
                <div class="val" id="tgt5KpiCvA">₹14.10 L</div>
                <div class="sub" id="tgt5KpiCvGap">Gap: ₹50.90 L</div>
            </div>
        </div>
    </div>

    <!-- ===== Grouped table card (jobtype.php table flow with datatable class) ===== -->
    <div class="card-custom p-0 overflow-hidden mb-3" id="targetTableWrap">
        <!-- Table (toolbar + export + column visibility + pagination auto-created by datatable class via auto-master-table.js) -->
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="targetTable" data-table-name="Targets">
                <thead>
                    <tr>
                        <th rowspan="2" style="width:60px;">S.No</th>
                        <th rowspan="2" style="min-width:150px;">Month &amp; Year</th>
                        <th rowspan="2" style="min-width:170px;">Staff Name</th>
                        <th rowspan="2" style="width:90px;">Sourcing</th>
                        <th colspan="2" class="thead-group gb-bvn">BV Numbers</th>
                        <th colspan="2" class="thead-group gb-bvv">BV Value</th>
                        <th colspan="2" class="thead-group gb-cvv">CV Value</th>
                        <th rowspan="2" style="width:110px;">Option</th>
                    </tr>
                    <tr>
                        <th class="thead-sub" data-col-title="BV Numbers (Actual)">Actual</th>
                        <th class="thead-sub" data-col-title="BV Numbers (Achieved)">Achieved</th>
                        <th class="thead-sub" data-col-title="BV Value (Actual)">Actual</th>
                        <th class="thead-sub" data-col-title="BV Value (Achieved)">Achieved</th>
                        <th class="thead-sub" data-col-title="CV Value (Actual)">Actual</th>
                        <th class="thead-sub" data-col-title="CV Value (Achieved)">Achieved</th>
                    </tr>
                </thead>
                <tbody id="targetTbody">
                    <tr data-id="1">
                        <td>1</td>
                        <td><span class="fw-bold">February - 2026</span></td>
                        <td>gharuda SOFTWARE</td>
                        <td>0</td>
                        <td>5</td>
                        <td><span class="up">6 ↑</span></td>
                        <td>₹ 1,50,000.00</td>
                        <td><span class="up">₹ 3,00,400.00 ↑</span></td>
                        <td>₹ 10,00,000.00</td>
                        <td><span class="down">₹ 0.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="tgt5-act edit" title="Edit" data-t5act="edit" data-id="1"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="tgt5-act del" title="Delete" data-t5act="del" data-id="1"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919500123456" target="_blank" class="tgt5-act wa" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="2">
                        <td>2</td>
                        <td><span class="fw-bold">February - 2026</span></td>
                        <td>GEO Care</td>
                        <td>0</td>
                        <td>7</td>
                        <td><span class="down">0 ↓</span></td>
                        <td>₹ 5,00,000.00</td>
                        <td><span class="down">₹ 0.00 ↓</span></td>
                        <td>₹ 30,00,000.00</td>
                        <td><span class="down">₹ 0.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="tgt5-act edit" title="Edit" data-t5act="edit" data-id="2"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="tgt5-act del" title="Delete" data-t5act="del" data-id="2"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919841023456" target="_blank" class="tgt5-act wa" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="3">
                        <td>3</td>
                        <td><span class="fw-bold">January - 2026</span></td>
                        <td>GHARUDA SOFTWARE</td>
                        <td>2</td>
                        <td>4</td>
                        <td>4</td>
                        <td>₹ 1,20,000.00</td>
                        <td><span class="up">₹ 1,35,000.00 ↑</span></td>
                        <td>₹ 8,00,000.00</td>
                        <td><span class="up">₹ 9,10,000.00 ↑</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="tgt5-act edit" title="Edit" data-t5act="edit" data-id="3"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="tgt5-act del" title="Delete" data-t5act="del" data-id="3"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919791023456" target="_blank" class="tgt5-act wa" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="4">
                        <td>4</td>
                        <td><span class="fw-bold">January - 2026</span></td>
                        <td>Harish D.</td>
                        <td>1</td>
                        <td>3</td>
                        <td><span class="down">1 ↓</span></td>
                        <td>₹ 90,000.00</td>
                        <td><span class="down">₹ 25,000.00 ↓</span></td>
                        <td>₹ 5,00,000.00</td>
                        <td><span class="down">₹ 1,60,000.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="tgt5-act edit" title="Edit" data-t5act="edit" data-id="4"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="tgt5-act del" title="Delete" data-t5act="del" data-id="4"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919884023456" target="_blank" class="tgt5-act wa" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="5">
                        <td>5</td>
                        <td><span class="fw-bold">March - 2026</span></td>
                        <td>Divya A.</td>
                        <td>3</td>
                        <td>6</td>
                        <td><span class="down">2 ↓</span></td>
                        <td>₹ 2,00,000.00</td>
                        <td><span class="down">₹ 75,000.00 ↓</span></td>
                        <td>₹ 12,00,000.00</td>
                        <td><span class="down">₹ 3,40,000.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="tgt5-act edit" title="Edit" data-t5act="edit" data-id="5"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="tgt5-act del" title="Delete" data-t5act="del" data-id="5"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919962023456" target="_blank" class="tgt5-act wa" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="6">
                        <td>6</td>
                        <td><span class="fw-bold">December - 2025</span></td>
                        <td>GHARUDA SOFTWARE</td>
                        <td>1</td>
                        <td>5</td>
                        <td>5</td>
                        <td>₹ 1,75,000.00</td>
                        <td><span class="up">₹ 1,90,000.00 ↑</span></td>
                        <td>₹ 9,00,000.00</td>
                        <td><span class="up">₹ 9,90,000.00 ↑</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="tgt5-act edit" title="Edit" data-t5act="edit" data-id="6"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="tgt5-act del" title="Delete" data-t5act="del" data-id="6"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919791023456" target="_blank" class="tgt5-act wa" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="7">
                        <td>7</td>
                        <td><span class="fw-bold">April - 2026</span></td>
                        <td>Karthik R.</td>
                        <td>2</td>
                        <td>4</td>
                        <td><span class="up">5 ↑</span></td>
                        <td>₹ 1,40,000.00</td>
                        <td><span class="up">₹ 1,80,000.00 ↑</span></td>
                        <td>₹ 7,50,000.00</td>
                        <td><span class="up">₹ 8,20,000.00 ↑</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="tgt5-act edit" title="Edit" data-t5act="edit" data-id="7"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="tgt5-act del" title="Delete" data-t5act="del" data-id="7"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919840123789" target="_blank" class="tgt5-act wa" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="8">
                        <td>8</td>
                        <td><span class="fw-bold">May - 2026</span></td>
                        <td>Priya S.</td>
                        <td>1</td>
                        <td>5</td>
                        <td><span class="down">3 ↓</span></td>
                        <td>₹ 1,60,000.00</td>
                        <td><span class="down">₹ 95,000.00 ↓</span></td>
                        <td>₹ 8,50,000.00</td>
                        <td><span class="down">₹ 4,10,000.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1">
                                <button type="button" class="tgt5-act edit" title="Edit" data-t5act="edit" data-id="8"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="tgt5-act del" title="Delete" data-t5act="del" data-id="8"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919940123456" target="_blank" class="tgt5-act wa" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="tgt5-total-row" id="tgt5Totals">
                        <td class="tt-label" colspan="3">Target Vs Achieved</td>
                        <td class="tc-src">9</td>
                        <td class="tc-bvn-actual">34</td>
                        <td class="tc-bvn-ach">21</td>
                        <td class="tc-bvv-actual">₹ 13,60,000.00</td>
                        <td class="tc-bvv-ach">₹ 8,10,400.00</td>
                        <td class="tc-cvv-actual">₹ 81,00,000.00</td>
                        <td class="tc-cvv-ach">₹ 26,40,000.00</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- ===== Chart card ===== -->
    <div class="tgt5-chart-card">
        <div class="tgt5-chart-head">
            <div>
                <div class="tgt5-chart-title">Business &amp; Collection — Target vs Achieved</div>
                <div class="tgt5-chart-sub" id="tgt5ChartSub">2026 · monthly totals, all staff</div>
            </div>
        </div>
        <div class="tgt5-chart-wrap">
            <canvas id="tgt5Chart"></canvas>
        </div>
    </div>
</main>

<!-- ===== Create / Edit Target Modal ===== -->
<div class="modal fade" id="tgt5Modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-3">
                <h6 class="fw-bold mb-0" style="font-size:15px;" id="tgt5ModalTitle">New Target</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <label class="form-label">Year</label>
                        <select class="form-select select2" id="tgt5Year" data-placeholder="Select year">
                            <option value="2027">2027</option>
                            <option value="2026" selected>2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Month</label>
                        <select class="form-select select2" id="tgt5MonthSel" data-placeholder="Select month">
                            <option value="1">January</option>
                            <option value="2" selected>February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Employee Name</label>
                        <select class="form-select select2" id="tgt5Staff" data-placeholder="Select employee">
                            <option value=""></option>
                            <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                            <option value="GHARUDA SOFTWARE">GHARUDA SOFTWARE</option>
                            <option value="GEO Care">GEO Care</option>
                            <option value="Harish D.">Harish D.</option>
                            <option value="Divya A.">Divya A.</option>
                            <option value="Karthik R.">Karthik R.</option>
                            <option value="Priya S.">Priya S.</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">BV Numbers</label>
                        <input type="number" class="form-control" id="tgt5BvNumbers" min="0" placeholder="0">
                    </div>
                    <div class="col-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Business Value</label>
                        <input type="number" class="form-control" id="tgt5BusinessValue" min="0" placeholder="0">
                    </div>
                    <div class="col-6">
                        <label class="form-label"><span style="color:#dc2626;">*</span> Collection Value</label>
                        <input type="number" class="form-control" id="tgt5CollectionValue" min="0" placeholder="0">
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="tgt5SubmitBtn">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    (function() {
        'use strict';

        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var MONTHS_SHORT = MONTHS.map(function(m) { return m.slice(0, 3); });
        var activeYear = 2026;

        /* Target mock records for editing */
        var tgtData = [
            { id: 1, year: 2026, month: 2, staff: 'gharuda SOFTWARE', phone: '9500123456', sourcing: 0, bvnAct: 5, bvnAch: 6, bvvAct: 150000, bvvAch: 300400, cvvAct: 1000000, cvvAch: 0 },
            { id: 2, year: 2026, month: 2, staff: 'GEO Care', phone: '9841023456', sourcing: 0, bvnAct: 7, bvnAch: 0, bvvAct: 500000, bvvAch: 0, cvvAct: 3000000, cvvAch: 0 },
            { id: 3, year: 2026, month: 1, staff: 'GHARUDA SOFTWARE', phone: '9791023456', sourcing: 2, bvnAct: 4, bvnAch: 4, bvvAct: 120000, bvvAch: 135000, cvvAct: 800000, cvvAch: 910000 },
            { id: 4, year: 2026, month: 1, staff: 'Harish D.', phone: '9884023456', sourcing: 1, bvnAct: 3, bvnAch: 1, bvvAct: 90000, bvvAch: 25000, cvvAct: 500000, cvvAch: 160000 },
            { id: 5, year: 2026, month: 3, staff: 'Divya A.', phone: '9962023456', sourcing: 3, bvnAct: 6, bvnAch: 2, bvvAct: 200000, bvvAch: 75000, cvvAct: 1200000, cvvAch: 340000 },
            { id: 6, year: 2025, month: 12, staff: 'GHARUDA SOFTWARE', phone: '9791023456', sourcing: 1, bvnAct: 5, bvnAch: 5, bvvAct: 175000, bvvAch: 190000, cvvAct: 900000, cvvAch: 990000 },
            { id: 7, year: 2026, month: 4, staff: 'Karthik R.', phone: '9840123789', sourcing: 2, bvnAct: 4, bvnAch: 5, bvvAct: 140000, bvvAch: 180000, cvvAct: 750000, cvvAch: 820000 },
            { id: 8, year: 2026, month: 5, staff: 'Priya S.', phone: '9940123456', sourcing: 1, bvnAct: 5, bvnAch: 3, bvvAct: 160000, bvvAch: 95000, cvvAct: 850000, cvvAch: 410000 }
        ];

        /* Year pill click */
        var yearPills = document.getElementById('tgt5YearPills');
        if (yearPills) {
            yearPills.addEventListener('click', function(e) {
                var pill = e.target.closest('.tgt5-year-pill');
                if (!pill) return;
                yearPills.querySelectorAll('.tgt5-year-pill').forEach(function(p) { p.classList.remove('active'); });
                pill.classList.add('active');
                activeYear = Number(pill.getAttribute('data-year'));
                buildChart();
            });
        }

        /* Modal Select2 Init (re-destroy body-attached select2 and attach to modal) */
        function initTargetModalSelects() {
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('#tgt5Modal select.select2').each(function() {
                    var $this = $(this);
                    if ($this.data('select2')) {
                        $this.select2('destroy');
                    }
                    $this.select2({
                        dropdownParent: $('#tgt5Modal'),
                        width: '100%',
                        placeholder: $this.attr('data-placeholder') || 'Select...'
                    });
                });
            }
        }

        var modalEl = document.getElementById('tgt5Modal');
        if (modalEl) {
            modalEl.addEventListener('shown.bs.modal', function() {
                initTargetModalSelects();
            });
        }

        /* Helper to select matching value case-insensitively or append */
        function selectOrAdd(selEl, value) {
            if (!selEl || !value) return;
            var $sel = $(selEl);
            var foundVal = null;
            $sel.find('option').each(function() {
                if ($(this).val().toLowerCase() === String(value).toLowerCase() || $(this).text().toLowerCase() === String(value).toLowerCase()) {
                    foundVal = $(this).val();
                    return false;
                }
            });
            if (foundVal !== null) {
                $sel.val(foundVal).trigger('change');
            } else {
                var newOption = new Option(value, value, true, true);
                $sel.append(newOption).trigger('change');
            }
        }

        /* Modal Open / Edit */
        var editId = null;
        function openModal(rec) {
            editId = rec ? rec.id : null;
            var titleEl = document.getElementById('tgt5ModalTitle');
            if (titleEl) titleEl.textContent = rec ? 'Edit Target' : 'New Target';

            var yVal = rec ? String(rec.year) : String(activeYear);
            var mVal = rec ? String(rec.month) : String(new Date().getMonth() + 1);

            var ySel = $('#tgt5Year');
            var mSel = $('#tgt5MonthSel');
            var staffSel = document.getElementById('tgt5Staff');

            ySel.val(yVal).trigger('change');
            mSel.val(mVal).trigger('change');

            if (rec && rec.staff) {
                selectOrAdd(staffSel, rec.staff);
            } else {
                $(staffSel).val('').trigger('change');
            }

            var bvNum = document.getElementById('tgt5BvNumbers'); if (bvNum) bvNum.value = (rec && rec.bvnAct !== undefined) ? rec.bvnAct : '';
            var bvVal = document.getElementById('tgt5BusinessValue'); if (bvVal) bvVal.value = (rec && rec.bvvAct !== undefined) ? rec.bvvAct : '';
            var cvVal = document.getElementById('tgt5CollectionValue'); if (cvVal) cvVal.value = (rec && rec.cvvAct !== undefined) ? rec.cvvAct : '';

            bootstrap.Modal.getOrCreateInstance(document.getElementById('tgt5Modal')).show();
        }

        var createBtn = document.getElementById('tgt5CreateBtn');
        if (createBtn) {
            createBtn.addEventListener('click', function() {
                openModal(null);
            });
        }

        var submitBtn = document.getElementById('tgt5SubmitBtn');
        if (submitBtn) {
            submitBtn.addEventListener('click', function() {
                var staffVal = document.getElementById('tgt5Staff').value;
                var bvVal = document.getElementById('tgt5BusinessValue').value;
                var cvVal = document.getElementById('tgt5CollectionValue').value;
                if (!staffVal || bvVal === '' || cvVal === '') {
                    alert('Please fill all the required fields.');
                    return;
                }
                alert('Target saved successfully!');
                bootstrap.Modal.getOrCreateInstance(document.getElementById('tgt5Modal')).hide();
            });
        }

        /* Table actions delegation */
        var tableEl = document.getElementById('targetTable');
        if (tableEl) {
            tableEl.addEventListener('click', function(e) {
                var btn = e.target.closest('[data-t5act]');
                if (!btn) return;
                var act = btn.getAttribute('data-t5act');
                var id = Number(btn.getAttribute('data-id'));
                if (act === 'edit') {
                    var rec = tgtData.filter(function(r) { return r.id === id; })[0];
                    if (rec) openModal(rec);
                } else if (act === 'del') {
                    if (confirm('Delete this target?')) {
                        var tr = btn.closest('tr');
                        if (tr) tr.remove();
                    }
                }
            });
        }

        /* Chart */
        var chart = null;
        function inrShort(n) {
            if (n >= 10000000) return '\u20B9' + (n / 10000000).toFixed(2).replace(/\.00$/, '') + ' Cr';
            if (n >= 100000) return '\u20B9' + (n / 100000).toFixed(2).replace(/\.00$/, '') + ' L';
            if (n >= 1000) return '\u20B9' + (n / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
            return '\u20B9' + n;
        }

        function buildChart() {
            var subEl = document.getElementById('tgt5ChartSub');
            if (subEl) subEl.textContent = activeYear + ' · monthly totals, all staff';
            var bvT = [120000, 650000, 200000, 140000, 160000, 0, 0, 0, 0, 0, 0, 0];
            var bvA = [135000, 300400, 75000, 180000, 95000, 0, 0, 0, 0, 0, 0, 0];
            var cvT = [800000, 4000000, 1200000, 750000, 850000, 0, 0, 0, 0, 0, 0, 0];
            var cvA = [910000, 0, 340000, 820000, 410000, 0, 0, 0, 0, 0, 0, 0];

            var cv = document.getElementById('tgt5Chart');
            if (!cv || typeof Chart === 'undefined') return;
            if (chart) chart.destroy();
            chart = new Chart(cv, {
                data: {
                    labels: MONTHS_SHORT,
                    datasets: [
                        { type: 'bar', label: 'BV Target', data: bvT, backgroundColor: 'rgba(37,99,235,.15)', borderColor: '#2563eb', borderWidth: 1.5, borderRadius: 6, maxBarThickness: 22 },
                        { type: 'line', label: 'BV Achieved', data: bvA, borderColor: '#2563eb', backgroundColor: 'rgba(37,99,235,.08)', borderWidth: 2.5, tension: .35, fill: true, pointRadius: 3, pointBackgroundColor: '#2563eb' },
                        { type: 'bar', label: 'CV Target', data: cvT, backgroundColor: 'rgba(22,163,74,.15)', borderColor: '#16a34a', borderWidth: 1.5, borderRadius: 6, maxBarThickness: 22 },
                        { type: 'line', label: 'CV Achieved', data: cvA, borderColor: '#16a34a', backgroundColor: 'rgba(22,163,74,.08)', borderWidth: 2.5, tension: .35, fill: true, pointRadius: 3, pointBackgroundColor: '#16a34a' }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: { position: 'top', labels: { boxWidth: 12, font: { size: 11 } } },
                        tooltip: { callbacks: { label: function(c) { return ' ' + c.dataset.label + ': ' + inrShort(c.parsed.y); } } }
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { font: { size: 10 } } },
                        y: {
                            grid: { color: '#eef0f3' },
                            border: { display: false },
                            ticks: { font: { size: 10 }, callback: function(v) { return inrShort(v); } }
                        }
                    }
                }
            });
        }

        /* Chart.js lazy load */
        function loadChart(cb) {
            if (window.Chart && parseInt(Chart.version, 10) >= 3) return cb();
            var s = document.createElement('script');
            s.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';
            s.onload = cb;
            document.head.appendChild(s);
        }
        loadChart(function() {
            buildChart();
        });
    })();
</script>