<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Target</h1>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <div class="btn-group btn-group-sm" id="tgt5YearPills" role="group" aria-label="Target year">
                <button type="button" class="btn btn-outline-primary tgt5-year-pill" data-year="2027">2027</button>
                <button type="button" class="btn btn-outline-primary tgt5-year-pill active" data-year="2026">2026</button>
                <button type="button" class="btn btn-outline-primary tgt5-year-pill" data-year="2025">2025</button>
            </div>
            <button type="button" class="btn btn-primary btn-sm" id="tgt5CreateBtn">
                <i class="bi bi-plus-lg me-1"></i>Create New Target
            </button>
        </div>
    </div>

    <!-- ===== KPI strip ===== -->
    <div class="row g-3 mb-3">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <small class="text-muted fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.05em;">Business Target</small>
                <div class="fs-4 fw-bold text-dark mt-1" id="tgt5KpiBv">₹10.60 L</div>
                <div class="progress mt-2" style="height: 5px;">
                    <div class="progress-bar bg-primary" id="tgt5KpiBvBar" style="width:51%;"></div>
                </div>
                <small class="text-muted fw-semibold mt-1 d-block" id="tgt5KpiBvSub">51% achieved</small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <small class="text-muted fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.05em;">Business Achieved</small>
                <div class="fs-4 fw-bold text-dark mt-1" id="tgt5KpiBvA">₹5.35 L</div>
                <small class="text-muted fw-semibold mt-2 d-block" id="tgt5KpiBvGap">Gap: ₹5.25 L</small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <small class="text-muted fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.05em;">Collection Target</small>
                <div class="fs-4 fw-bold text-dark mt-1" id="tgt5KpiCv">₹65.00 L</div>
                <div class="progress mt-2" style="height: 5px;">
                    <div class="progress-bar bg-primary" id="tgt5KpiCvBar" style="width:22%;"></div>
                </div>
                <small class="text-muted fw-semibold mt-1 d-block" id="tgt5KpiCvSub">22% achieved</small>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                <small class="text-muted fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.05em;">Collection Achieved</small>
                <div class="fs-4 fw-bold text-dark mt-1" id="tgt5KpiCvA">₹14.10 L</div>
                <small class="text-muted fw-semibold mt-2 d-block" id="tgt5KpiCvGap">Gap: ₹50.90 L</small>
            </div>
        </div>
    </div>

    <!-- ===== Grouped table card ===== -->
    <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden mb-3" id="targetTableWrap">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 text-center datatable" id="targetTable" data-table-name="Targets">
                <thead class="table-light">
                    <tr>
                        <th rowspan="2" style="width:60px;">S.No</th>
                        <th rowspan="2" style="min-width:150px;">Month &amp; Year</th>
                        <th rowspan="2" style="min-width:170px;">Staff Name</th>
                        <th rowspan="2" style="width:90px;">Sourcing</th>
                        <th colspan="2" class="fw-bold border-bottom">BV Numbers</th>
                        <th colspan="2" class="fw-bold border-bottom">BV Value</th>
                        <th colspan="2" class="fw-bold border-bottom">CV Value</th>
                        <th rowspan="2" style="width:110px;">Option</th>
                    </tr>
                    <tr>
                        <th class="small text-muted" data-col-title="BV Numbers (Actual)">Actual</th>
                        <th class="small text-muted" data-col-title="BV Numbers (Achieved)">Achieved</th>
                        <th class="small text-muted" data-col-title="BV Value (Actual)">Actual</th>
                        <th class="small text-muted" data-col-title="BV Value (Achieved)">Achieved</th>
                        <th class="small text-muted" data-col-title="CV Value (Actual)">Actual</th>
                        <th class="small text-muted" data-col-title="CV Value (Achieved)">Achieved</th>
                    </tr>
                </thead>
                <tbody id="targetTbody">
                    <tr data-id="1">
                        <td>1</td>
                        <td><span class="fw-bold">February - 2026</span></td>
                        <td>gharuda SOFTWARE</td>
                        <td>0</td>
                        <td>5</td>
                        <td><span class="badge bg-success-subtle text-success">6 ↑</span></td>
                        <td>₹ 1,50,000.00</td>
                        <td><span class="badge bg-success-subtle text-success">₹ 3,00,400.00 ↑</span></td>
                        <td>₹ 10,00,000.00</td>
                        <td><span class="badge bg-danger-subtle text-danger">₹ 0.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <button type="button" class="btn btn-sm btn-light border text-primary" title="Edit" data-t5act="edit" data-id="1"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-sm btn-light border text-danger" title="Delete" data-t5act="del" data-id="1"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919500123456" target="_blank" class="btn btn-sm btn-light border text-success" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="2">
                        <td>2</td>
                        <td><span class="fw-bold">February - 2026</span></td>
                        <td>GEO Care</td>
                        <td>0</td>
                        <td>7</td>
                        <td><span class="badge bg-danger-subtle text-danger">0 ↓</span></td>
                        <td>₹ 5,00,000.00</td>
                        <td><span class="badge bg-danger-subtle text-danger">₹ 0.00 ↓</span></td>
                        <td>₹ 30,00,000.00</td>
                        <td><span class="badge bg-danger-subtle text-danger">₹ 0.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <button type="button" class="btn btn-sm btn-light border text-primary" title="Edit" data-t5act="edit" data-id="2"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-sm btn-light border text-danger" title="Delete" data-t5act="del" data-id="2"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919841023456" target="_blank" class="btn btn-sm btn-light border text-success" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
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
                        <td><span class="badge bg-success-subtle text-success">₹ 1,35,000.00 ↑</span></td>
                        <td>₹ 8,00,000.00</td>
                        <td><span class="badge bg-success-subtle text-success">₹ 9,10,000.00 ↑</span></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <button type="button" class="btn btn-sm btn-light border text-primary" title="Edit" data-t5act="edit" data-id="3"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-sm btn-light border text-danger" title="Delete" data-t5act="del" data-id="3"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919791023456" target="_blank" class="btn btn-sm btn-light border text-success" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="4">
                        <td>4</td>
                        <td><span class="fw-bold">January - 2026</span></td>
                        <td>Harish D.</td>
                        <td>1</td>
                        <td>3</td>
                        <td><span class="badge bg-danger-subtle text-danger">1 ↓</span></td>
                        <td>₹ 90,000.00</td>
                        <td><span class="badge bg-danger-subtle text-danger">₹ 25,000.00 ↓</span></td>
                        <td>₹ 5,00,000.00</td>
                        <td><span class="badge bg-danger-subtle text-danger">₹ 1,60,000.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <button type="button" class="btn btn-sm btn-light border text-primary" title="Edit" data-t5act="edit" data-id="4"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-sm btn-light border text-danger" title="Delete" data-t5act="del" data-id="4"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919884023456" target="_blank" class="btn btn-sm btn-light border text-success" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="5">
                        <td>5</td>
                        <td><span class="fw-bold">March - 2026</span></td>
                        <td>Divya A.</td>
                        <td>3</td>
                        <td>6</td>
                        <td><span class="badge bg-danger-subtle text-danger">2 ↓</span></td>
                        <td>₹ 2,00,000.00</td>
                        <td><span class="badge bg-danger-subtle text-danger">₹ 75,000.00 ↓</span></td>
                        <td>₹ 12,00,000.00</td>
                        <td><span class="badge bg-danger-subtle text-danger">₹ 3,40,000.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <button type="button" class="btn btn-sm btn-light border text-primary" title="Edit" data-t5act="edit" data-id="5"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-sm btn-light border text-danger" title="Delete" data-t5act="del" data-id="5"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919962023456" target="_blank" class="btn btn-sm btn-light border text-success" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
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
                        <td><span class="badge bg-success-subtle text-success">₹ 1,90,000.00 ↑</span></td>
                        <td>₹ 9,00,000.00</td>
                        <td><span class="badge bg-success-subtle text-success">₹ 9,90,000.00 ↑</span></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <button type="button" class="btn btn-sm btn-light border text-primary" title="Edit" data-t5act="edit" data-id="6"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-sm btn-light border text-danger" title="Delete" data-t5act="del" data-id="6"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919791023456" target="_blank" class="btn btn-sm btn-light border text-success" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="7">
                        <td>7</td>
                        <td><span class="fw-bold">April - 2026</span></td>
                        <td>Karthik R.</td>
                        <td>2</td>
                        <td>4</td>
                        <td><span class="badge bg-success-subtle text-success">5 ↑</span></td>
                        <td>₹ 1,40,000.00</td>
                        <td><span class="badge bg-success-subtle text-success">₹ 1,80,000.00 ↑</span></td>
                        <td>₹ 7,50,000.00</td>
                        <td><span class="badge bg-success-subtle text-success">₹ 8,20,000.00 ↑</span></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <button type="button" class="btn btn-sm btn-light border text-primary" title="Edit" data-t5act="edit" data-id="7"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-sm btn-light border text-danger" title="Delete" data-t5act="del" data-id="7"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919840123789" target="_blank" class="btn btn-sm btn-light border text-success" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr data-id="8">
                        <td>8</td>
                        <td><span class="fw-bold">May - 2026</span></td>
                        <td>Priya S.</td>
                        <td>1</td>
                        <td>5</td>
                        <td><span class="badge bg-danger-subtle text-danger">3 ↓</span></td>
                        <td>₹ 1,60,000.00</td>
                        <td><span class="badge bg-danger-subtle text-danger">₹ 95,000.00 ↓</span></td>
                        <td>₹ 8,50,000.00</td>
                        <td><span class="badge bg-danger-subtle text-danger">₹ 4,10,000.00 ↓</span></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <button type="button" class="btn btn-sm btn-light border text-primary" title="Edit" data-t5act="edit" data-id="8"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-sm btn-light border text-danger" title="Delete" data-t5act="del" data-id="8"><i class="bi bi-x-lg"></i></button>
                                <a href="https://wa.me/919940123456" target="_blank" class="btn btn-sm btn-light border text-success" title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="table-light fw-bold">
                    <tr id="tgt5Totals">
                        <td class="text-center text-danger bg-danger-subtle" colspan="3">Target Vs Achieved</td>
                        <td class="bg-primary-subtle">9</td>
                        <td class="bg-info-subtle">34</td>
                        <td class="bg-success-subtle">21</td>
                        <td class="bg-primary-subtle">₹ 13,60,000.00</td>
                        <td class="bg-warning-subtle">₹ 8,10,400.00</td>
                        <td class="bg-info-subtle">₹ 81,00,000.00</td>
                        <td class="bg-danger-subtle">₹ 26,40,000.00</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- ===== Chart card ===== -->
    <div class="card border-0 shadow-sm rounded-3 p-3 mb-3">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div>
                <h6 class="fw-bold mb-0 text-dark">Business &amp; Collection — Target vs Achieved</h6>
                <small class="text-muted" id="tgt5ChartSub">2026 · monthly totals, all staff</small>
            </div>
        </div>
        <div style="height: 300px; position: relative;">
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

<script src="./assets/js/pages/target.js?v=<?php echo time(); ?>"></script>