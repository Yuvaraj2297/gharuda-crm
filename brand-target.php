<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <span class="badge bg-primary-subtle text-primary p-3 rounded-3 fs-4"><i class="bi bi-tags-fill"></i></span>
            <div>
                <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Brand Target</h1>
                <nav class="d-flex align-items-center gap-2 text-muted" style="font-size:13px;">
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
    <div class="card border-0 shadow-sm rounded-3 p-3 mb-3">
        <div class="row g-3 align-items-end">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label small fw-bold text-muted text-uppercase mb-1">Brands</label>
                <select class="form-select select2" id="bt5BrandFilter" data-placeholder="All Brands">
                    <option value="">All Brands</option>
                    <option value="PhDAssistance">PhDAssistance</option>
                    <option value="GEO Care">GEO Care</option>
                    <option value="gharuda Software">gharuda Software</option>
                    <option value="GHARUDA SOFTWARE">GHARUDA SOFTWARE</option>
                    <option value="Zen Publications">Zen Publications</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label small fw-bold text-muted text-uppercase mb-1" for="bt5FromDate">From Date</label>
                <div class="date-picker">
                    <input type="text" class="date-input form-control" id="bt5FromDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label small fw-bold text-muted text-uppercase mb-1" for="bt5ToDate">To Date</label>
                <div class="date-picker">
                    <input type="text" class="date-input form-control" id="bt5ToDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <button type="button" class="btn btn-primary w-100" id="bt5SearchBtn">
                    <i class="bi bi-search me-1"></i>Search
                </button>
            </div>
        </div>
    </div>

    <!-- ===== Grouped table card ===== -->
    <div class="card border-0 shadow-sm rounded-3 p-0 overflow-hidden mb-3" id="brandTargetTableWrap">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 text-center datatable" id="bt5Table" data-table-name="Brand Targets">
                <thead class="table-light">
                    <tr>
                        <th rowspan="2" style="width:60px;">S.No</th>
                        <th rowspan="2" style="min-width:150px;">Month &amp; Year</th>
                        <th rowspan="2" style="min-width:200px;">Brand Name</th>
                        <th colspan="2" class="fw-bold border-bottom">CV Value</th>
                        <th rowspan="2" style="width:110px;">Option</th>
                    </tr>
                    <tr>
                        <th class="small text-muted" data-col-title="CV Value (Actual)">Actual</th>
                        <th class="small text-muted" data-col-title="CV Value (Achieved)">Achieved</th>
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
                <tfoot class="table-light fw-bold">
                    <tr class="bt5-subtotal">
                        <td colspan="3" class="text-center bg-danger-subtle text-danger">Target Vs Achieved</td>
                        <td class="bg-warning-subtle">₹ 11,40,000.00</td>
                        <td class="bg-success-subtle">₹ 10,79,000.00</td>
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
                    <span class="badge bg-primary-subtle text-primary p-2 rounded-2 fs-6"><i class="bi bi-tags-fill"></i></span>
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

<script src="./assets/js/pages/brand-target.js?v=<?php echo time(); ?>"></script>
