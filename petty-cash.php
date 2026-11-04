<?php include 'header.php'; ?>

<main class="pc-page container-fluid px-0">
    <!-- Page Header & Action Bar in Single Row (lead.php & follow-up-list.php style, no breadcrumb, no stat cards) -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- LEFT: Icon badge + Title -->
        <div class="d-flex align-items-center gap-2.5">
            <div class="rounded-3 bg-primary-subtle text-primary d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;font-size:18px;">
                <i class="bi bi-safe2"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title fs-4">Petty Cash &amp; Statement Ledger</h1>
                <span class="text-muted font-11 d-none d-sm-inline">Manage staff petty cash disbursements, credit/debit audit statements, running balances &amp; splitups</span>
            </div>
        </div>

        <!-- RIGHT: Actions in Single Row -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <div class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="pcTypeTabs" role="tablist">
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold pc-filter-btn active" data-filter="all">All Transactions</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold pc-filter-btn" data-filter="credit">Cash In (Credit)</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold pc-filter-btn" data-filter="debit">Cash Out (Debit)</button>
                <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold pc-filter-btn" data-filter="splitup">With Splitup</button>
            </div>

            <button class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5" type="button" data-bs-toggle="offcanvas" data-bs-target="#pcFilterOffcanvas" aria-controls="pcFilterOffcanvas" id="pcOffcanvasFilterBtn">
                <i class="bi bi-funnel"></i><span>Filters</span>
                <span class="badge bg-primary rounded-pill d-none" id="pcFilterCountBadge">0</span>
            </button>

            <div class="dropdown">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">
                    <i class="bi bi-lightning-charge-fill"></i><span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu" style="min-width: 245px;">
                    <li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Petty Cash Actions</li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="petty-cash-create.php">
                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-plus-lg"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">New Petty Cash Form</div>
                                <div class="text-muted" style="font-size:10px;">Record disbursement &amp; splitup</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" data-bs-toggle="modal" data-bs-target="#quickPettyCashModal">
                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-lightning"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Quick Entry Modal</div>
                                <div class="text-muted" style="font-size:10px;">Fast inline credit / debit log</div>
                            </div>
                        </button>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="expenses.php">
                            <span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-receipt"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Field Expenses</div>
                                <div class="text-muted" style="font-size:10px;">View organizational expenses</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" href="payments.php">
                            <span class="action-icon-pill bg-info-subtle text-info"><i class="bi bi-credit-card-2-front"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Payments Received</div>
                                <div class="text-muted" style="font-size:10px;">View customer receipt ledger</div>
                            </div>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5" onclick="window.print();">
                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-printer"></i></span>
                            <div class="text-start">
                                <div class="fw-semibold text-dark font-12">Print Audit Statement</div>
                                <div class="text-muted" style="font-size:10px;">Print petty cash ledger</div>
                            </div>
                        </button>
                    </li>
                </ul>
            </div>

            <a href="petty-cash-create.php" class="btn btn-success btn-sm font-12 fw-semibold d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs">
                <i class="bi bi-plus-lg"></i><span>New Petty Cash</span>
            </a>
        </div>
    </div>

    <!-- Unified Petty Cash & Statement Ledger Table -->
    <div class="card-custom p-0 mb-4" style="overflow: visible;">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern master-table column-border w-100 mb-0" id="pcTable">
                <thead>
                    <tr>
                        <th style="width: 55px; text-align: center;">#</th>
                        <th class="text-nowrap" style="width: 120px;">Date</th>
                        <th class="text-nowrap" style="min-width: 165px;">From Staff</th>
                        <th class="text-nowrap" style="min-width: 140px;">To Staff</th>
                        <th class="text-nowrap" style="min-width: 240px;">Description / Remarks</th>
                        <th class="text-nowrap text-end" style="width: 140px;">Credit (In)</th>
                        <th class="text-nowrap text-end" style="width: 140px;">Debit (Out)</th>
                        <th class="text-nowrap text-end" style="width: 145px;">Balance</th>
                        <th class="text-nowrap text-center" style="width: 95px;">Splitup</th>
                        <th class="text-nowrap text-end pe-3" style="width: 110px;">Action</th>
                    </tr>
                </thead>
                <tbody id="pcTbody"></tbody>
            </table>
        </div>
    </div>
</main>

<!-- ===== Petty Cash Filter Offcanvas (lead.php & follow-up-list.php style) ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="pcFilterOffcanvas" aria-labelledby="pcFilterOffcanvasLabel" style="width: 380px;">
    <div class="offcanvas-header border-bottom py-3 px-3">
        <h6 class="offcanvas-title fw-bold d-flex align-items-center gap-2 mb-0" id="pcFilterOffcanvasLabel">
            <i class="bi bi-funnel text-primary"></i> Filter Petty Cash &amp; Statement
        </h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-3">
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="pcTypeFilterSelect">Transaction Type</label>
            <select class="form-select select2 form-select-sm" id="pcTypeFilterSelect">
                <option value="all">All Transactions</option>
                <option value="credit">Cash In (Credit)</option>
                <option value="debit">Cash Out (Debit)</option>
                <option value="splitup">With Splitup</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="pcStaffFilterSelect">Staff Member</label>
            <select class="form-select select2 form-select-sm" id="pcStaffFilterSelect">
                <option value="">All Staff Members</option>
                <option value="KOWSHIK SOFTWARE">KOWSHIK SOFTWARE</option>
                <option value="thilak ma">thilak ma</option>
                <option value="PREM KUMAR.R">PREM KUMAR.R</option>
                <option value="Siddharth N">Siddharth N (Finance)</option>
                <option value="Priya Sharma">Priya Sharma (HR)</option>
                <option value="Rajesh Kumar">Rajesh Kumar (Ops)</option>
            </select>
        </div>
        <div class="row g-2 mb-3">
            <div class="col-6">
                <label class="form-label text-muted small fw-bold mb-1" for="pcFromDate">From Date</label>
                <input type="date" class="form-control form-control-sm" id="pcFromDate">
            </div>
            <div class="col-6">
                <label class="form-label text-muted small fw-bold mb-1" for="pcToDate">To Date</label>
                <input type="date" class="form-control form-control-sm" id="pcToDate">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label text-muted small fw-bold mb-1" for="pcSearchInput">Keyword / Remarks</label>
            <input type="text" class="form-control form-control-sm" id="pcSearchInput" placeholder="Search staff, description, remarks...">
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 d-flex gap-2 bg-light-subtle">
        <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" id="pcResetFilterBtn">
            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
        </button>
        <button type="button" class="btn btn-primary btn-sm flex-fill" id="pcApplyFilterBtn">
            <i class="bi bi-funnel me-1"></i> Apply Filters
        </button>
    </div>
</div>

<!-- ===== Petty Cash 360° Voucher Modal ===== -->
<div class="modal fade" id="pcDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px;">
                        <i class="bi bi-safe2 fs-5"></i>
                    </span>
                    <div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-5" id="pcModalTitle">Petty Cash Voucher</h5>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5" id="pcModalTypeBadge">Cash In (Credit)</span>
                        </div>
                        <div class="small text-muted" id="pcModalSubtitle">Staff Disbursement &amp; Statement Record</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-white">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Credit (Cash In)</span>
                            <h6 class="fw-bold text-success mb-0 fs-6" id="pcModalCredit">+ ₹0.00</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Debit (Cash Out)</span>
                            <h6 class="fw-bold text-danger mb-0 fs-6" id="pcModalDebit">- ₹0.00</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Running Balance</span>
                            <h6 class="fw-bold text-dark mb-0 fs-6" id="pcModalBalance">₹0.00</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="p-3 rounded-3 bg-light border border-light-subtle">
                            <span class="text-muted d-block small mb-1 fw-semibold text-uppercase font-10">Transaction Date</span>
                            <h6 class="fw-bold text-primary mb-0 fs-6" id="pcModalDate">—</h6>
                        </div>
                    </div>
                </div>

                <div class="card border border-light-subtle rounded-3 p-3 mb-4">
                    <h6 class="fw-bold text-dark mb-3 font-13 text-uppercase" style="letter-spacing:0.5px;">
                        <i class="bi bi-people text-primary me-1.5"></i>Staff &amp; Voucher Details
                    </h6>
                    <div class="row g-3 font-13">
                        <div class="col-sm-6">
                            <div class="text-muted small">From Staff (Issued By)</div>
                            <div class="fw-semibold text-dark mt-0.5" id="pcModalFromStaff">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">To Staff (Recipient)</div>
                            <div class="fw-semibold text-dark mt-0.5" id="pcModalToStaff">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Description / Remarks</div>
                            <div class="fw-semibold text-dark mt-0.5" id="pcModalRemarks">—</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted small">Splitup Status</div>
                            <div class="fw-semibold text-dark mt-0.5" id="pcModalSplitup">No</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-2 border-top">
                    <span class="text-muted small fw-semibold">Quick Actions:</span>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <a href="petty-cash-create.php" class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-plus-lg"></i> New Petty Cash
                        </a>
                        <a href="expenses.php" class="btn btn-sm btn-outline-warning d-inline-flex align-items-center gap-1.5 fw-semibold font-12">
                            <i class="bi bi-receipt"></i> Field Expenses
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center gap-1.5 fw-semibold font-12" onclick="window.print();">
                            <i class="bi bi-printer"></i> Print Voucher
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light-subtle py-2.5 px-4 border-top">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Quick Petty Cash Entry Modal ===== -->
<div class="modal fade" id="quickPettyCashModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom py-3 px-4 bg-light-subtle">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-safe2"></i></span>
                    <h5 class="modal-title fw-bold text-dark mb-0">Quick Petty Cash Entry</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formQuickPettyCash">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">From Staff <span class="text-danger">*</span></label>
                            <select class="form-select select2" name="from_staff" required>
                                <option value="KOWSHIK SOFTWARE">KOWSHIK SOFTWARE</option>
                                <option value="thilak ma">thilak ma</option>
                                <option value="PREM KUMAR.R">PREM KUMAR.R</option>
                                <option value="Siddharth N">Siddharth N</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">To Staff</label>
                            <input type="text" class="form-control" name="to_staff" placeholder="e.g. Rajesh Kumar or -">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark small">Transaction Type <span class="text-danger">*</span></label>
                            <select class="form-select" name="tx_type" required>
                                <option value="credit">Cash In (Credit)</option>
                                <option value="debit">Cash Out (Debit)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark small">Amount (₹) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" name="amount" placeholder="e.g. 5000.00" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark small">Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-bold text-dark small">Description / Remarks</label>
                            <input type="text" class="form-control" name="remarks" placeholder="e.g. Petty cash top-up / Office stationery">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark small">Splitup</label>
                            <select class="form-select" name="splitup">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm fw-bold">
                        <i class="bi bi-check2-circle me-1"></i> Save Petty Cash
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Unified dataset combining petty-cash.php & petty-cash-report.php
    var rawPettyCashLogs = [
        { id: 1, date: '2025-10-31', fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', description: 'Bank Top-up for Petty Cash', credit: 2500.00, debit: 0, splitup: 'No' },
        { id: 2, date: '2025-11-12', fromStaff: 'thilak ma', toStaff: '-', description: 'Petty cash top-up from main ledger', credit: 5000.00, debit: 0, splitup: 'No' },
        { id: 3, date: '2025-11-13', fromStaff: 'thilak ma', toStaff: 'Office Pantry', description: 'Tea & snacks for client meeting', credit: 0, debit: 450.00, splitup: 'Yes' },
        { id: 4, date: '2025-11-15', fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', description: 'tra - Conveyance & courier', credit: 2500.00, debit: 0, splitup: 'No' },
        { id: 5, date: '2025-11-17', fromStaff: 'PREM KUMAR.R', toStaff: '-', description: 'Petty disbursement for office items', credit: 2000.00, debit: 0, splitup: 'No' },
        { id: 6, date: '2025-12-04', fromStaff: 'PREM KUMAR.R', toStaff: 'Courier Desk', description: 'Local speed post & parcel dispatch', credit: 0, debit: 320.00, splitup: 'Yes' },
        { id: 7, date: '2026-01-06', fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', description: 'xerox and document printouts', credit: 16.00, debit: 0, splitup: 'No' },
        { id: 8, date: '2026-02-14', fromStaff: 'Siddharth N', toStaff: 'Facility Ops', description: 'Office drinking water cans purchase', credit: 0, debit: 600.00, splitup: 'Yes' },
        { id: 9, date: '2026-03-30', fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', description: 'Petty topup for end-of-month minor expenses', credit: 5000.00, debit: 0, splitup: 'No' },
        { id: 10, date: '2026-04-09', fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', description: 'pett6 cash - Quarterly cash pool refill', credit: 50000.00, debit: 0, splitup: 'No' },
        { id: 11, date: '2026-04-10', fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', description: 'petty cash - Advance payout to operational staff', credit: 15000.00, debit: 0, splitup: 'No' },
        { id: 12, date: '2026-10-03', fromStaff: 'KOWSHIK SOFTWARE', toStaff: 'Rajesh Kumar', description: 'Daily refreshment & stationery replenishment', credit: 1200.00, debit: 350.00, splitup: 'Yes' }
    ];

    function esc(s) {
        return String(s == null ? '' : s)
            .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }

    function formatINR(val) {
        var num = parseFloat(val) || 0;
        return num.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function buildPcActionMenuHtml(row) {
        return '<div class="dropdown text-end">' +
            '<button type="button" class="btn btn-sm btn-table-action dropdown-toggle font-12 fw-semibold py-1 px-2.5 d-inline-flex align-items-center gap-1.5 rounded-2 shadow-xs" data-bs-toggle="dropdown" data-bs-boundary="viewport" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' +
                '<span>Actions</span>' +
            '</button>' +
            '<ul class="dropdown-menu dropdown-menu-end shadow border font-12 py-1 table-action-menu">' +
                '<li class="px-2.5 py-1 text-muted text-uppercase fw-bold" style="font-size: 10px; letter-spacing: 0.5px;">Petty Cash Actions</li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn btn-pc-360" data-id="' + row.id + '"><span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-safe2"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Petty Cash 360&deg; Voucher</div><div class="text-muted" style="font-size: 10px;">Audit credit, debit &amp; balance</div></div></button></li>' +
                '<li><a class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" href="petty-cash-create.php"><span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-plus-circle"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Record New Petty Cash</div><div class="text-muted" style="font-size: 10px;">Open full disbursement form</div></div></a></li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 lead-act-btn" onclick="window.print();"><span class="action-icon-pill bg-warning-subtle text-warning"><i class="bi bi-printer"></i></span><div class="text-start"><div class="fw-semibold text-dark font-12">Print Voucher</div><div class="text-muted" style="font-size: 10px;">Download petty cash slip</div></div></button></li>' +
                '<li><hr class="dropdown-divider my-1"></li>' +
                '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2.5 py-1.5 text-danger lead-act-btn btn-delete-pc" data-id="' + row.id + '"><span class="action-icon-pill bg-danger-subtle text-danger"><i class="bi bi-trash"></i></span><div class="text-start"><div class="fw-semibold text-danger font-12">Delete Entry</div><div class="text-muted" style="font-size: 10px;">Remove petty cash log</div></div></button></li>' +
            '</ul>' +
        '</div>';
    }

    var tableInstance = null;
    var processedRowsById = {};

    function processAndRenderLedger(dataset) {
        var runningBalance = 0;
        processedRowsById = {};

        var processed = dataset.map(function (item) {
            var cr = parseFloat(item.credit) || 0;
            var dr = parseFloat(item.debit) || 0;
            runningBalance += (cr - dr);

            var rowObj = {
                id: item.id,
                date: item.date,
                fromStaff: item.fromStaff,
                toStaff: item.toStaff || '-',
                description: item.description || '—',
                credit: cr,
                debit: dr,
                balance: runningBalance,
                splitup: item.splitup || 'No'
            };
            processedRowsById[rowObj.id] = rowObj;
            return rowObj;
        });

        if (tableInstance) {
            tableInstance.setData(processed);
        } else if (typeof MasterTable !== 'undefined') {
            tableInstance = MasterTable.init({
                tableId: 'pcTable',
                tbodyId: 'pcTbody',
                idPrefix: 'pc',
                data: processed,
                tableName: 'Petty_Cash_Ledger',
                primaryKey: 'id',
                searchFields: ['date', 'fromStaff', 'toStaff', 'description', 'credit', 'debit', 'balance', 'splitup'],
                columns: [
                    {
                        field: 'date',
                        title: 'Date',
                        sortable: true,
                        render: function (v) {
                            return '<span class="text-secondary font-monospace" style="font-size:12.5px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'fromStaff',
                        title: 'From Staff',
                        sortable: true,
                        render: function (v, row) {
                            return '<a href="#" class="fw-bold text-primary text-decoration-none pc-row-link" data-id="' + row.id + '">' + esc(v) + '</a>';
                        }
                    },
                    {
                        field: 'toStaff',
                        title: 'To Staff',
                        sortable: true,
                        render: function (v) {
                            return '<span class="text-muted fw-semibold">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'description',
                        title: 'Description / Remarks',
                        sortable: true,
                        render: function (v) {
                            return '<span class="fw-semibold text-dark">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'credit',
                        title: 'Credit (In)',
                        sortable: true,
                        render: function (v) {
                            var num = parseFloat(v) || 0;
                            return num > 0
                                ? '<div class="text-end"><span class="amount-credit font-monospace" style="font-size:13px;">+ ₹ ' + formatINR(num) + '</span></div>'
                                : '<div class="text-end"><span class="text-muted">—</span></div>';
                        }
                    },
                    {
                        field: 'debit',
                        title: 'Debit (Out)',
                        sortable: true,
                        render: function (v) {
                            var num = parseFloat(v) || 0;
                            return num > 0
                                ? '<div class="text-end"><span class="amount-debit font-monospace" style="font-size:13px;">- ₹ ' + formatINR(num) + '</span></div>'
                                : '<div class="text-end"><span class="text-muted">—</span></div>';
                        }
                    },
                    {
                        field: 'balance',
                        title: 'Balance',
                        sortable: true,
                        render: function (v) {
                            return '<div class="text-end"><span class="amount-balance font-monospace" style="font-size:13px;">₹ ' + formatINR(v) + '</span></div>';
                        }
                    },
                    {
                        field: 'splitup',
                        title: 'Splitup',
                        sortable: true,
                        render: function (v) {
                            var cls = v === 'Yes' ? 'badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2.5 py-1' : 'pc-split-pill';
                            return '<div class="text-center"><span class="' + cls + '">' + esc(v) + '</span></div>';
                        }
                    },
                    {
                        field: null,
                        title: 'Action',
                        sortable: false,
                        render: function (v, row) {
                            return buildPcActionMenuHtml(row);
                        }
                    }
                ]
            });
        }
    }

    processAndRenderLedger(rawPettyCashLogs);

    // Capture-phase dropdown delegation with viewport boundary & fixed popper strategy
    document.addEventListener('click', function (e) {
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

    window.openPc360ModalById = function (id) {
        var row = processedRowsById[Number(id)];
        if (!row) return;

        var setTxt = function (elId, val) {
            var el = document.getElementById(elId);
            if (el) el.textContent = val;
        };

        setTxt('pcModalTitle', 'Petty Cash Voucher #' + row.id);
        setTxt('pcModalSubtitle', row.fromStaff + ' · Date: ' + row.date);
        setTxt('pcModalCredit', row.credit > 0 ? ('+ ₹ ' + formatINR(row.credit)) : '₹ 0.00');
        setTxt('pcModalDebit', row.debit > 0 ? ('- ₹ ' + formatINR(row.debit)) : '₹ 0.00');
        setTxt('pcModalBalance', '₹ ' + formatINR(row.balance));
        setTxt('pcModalDate', row.date);
        setTxt('pcModalFromStaff', row.fromStaff);
        setTxt('pcModalToStaff', row.toStaff);
        setTxt('pcModalRemarks', row.description);
        setTxt('pcModalSplitup', row.splitup);

        var badge = document.getElementById('pcModalTypeBadge');
        if (badge) {
            var isCr = row.credit >= row.debit;
            badge.textContent = isCr ? 'Cash In (Credit)' : 'Cash Out (Debit)';
            badge.className = isCr
                ? 'badge bg-success-subtle text-success border border-success-subtle rounded-pill font-11 px-2.5 py-0.5'
                : 'badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill font-11 px-2.5 py-0.5';
        }

        var modalEl = document.getElementById('pcDetailModal');
        if (modalEl && window.bootstrap && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    };

    // Delegated Action Handlers (Petty Cash 360 & Delete Entry)
    document.addEventListener('click', function (e) {
        var pc360Btn = e.target.closest('.btn-pc-360');
        if (pc360Btn) {
            e.preventDefault();
            window.openPc360ModalById(pc360Btn.getAttribute('data-id'));
            return;
        }

        var delBtn = e.target.closest('.btn-delete-pc');
        if (delBtn) {
            e.preventDefault();
            var pcId = Number(delBtn.getAttribute('data-id'));
            if (confirm('Are you sure you want to delete petty cash entry #' + pcId + '?')) {
                rawPettyCashLogs = rawPettyCashLogs.filter(function (item) { return Number(item.id) !== pcId; });
                applyPcFilter();
            }
        }
    });

    // Safe Row Click -> opens Petty Cash 360 Modal while ignoring Actions dropdown
    var tableEl = document.getElementById('pcTable');
    if (tableEl) {
        tableEl.addEventListener('click', function (e) {
            if (
                e.target.closest('input, button, select, textarea') ||
                e.target.closest('.btn-table-action') ||
                e.target.closest('.lead-act-btn') ||
                e.target.closest('.dropdown') ||
                e.target.closest('.dropdown-menu') ||
                e.target.closest('.table-action-menu') ||
                e.target.closest('[data-bs-toggle="dropdown"]') ||
                e.target.closest('a:not(.pc-row-link)')
            ) {
                return;
            }

            var cell = e.target.closest('td');
            if (cell && (cell.querySelector('.btn-table-action, .lead-act-btn, .dropdown') || cell.classList.contains('text-end'))) {
                return;
            }

            var tr = e.target.closest('tbody tr');
            if (tr) {
                var btn = tr.querySelector('.btn-pc-360[data-id]');
                if (btn) {
                    e.preventDefault();
                    window.openPc360ModalById(btn.getAttribute('data-id'));
                }
            }
        });
    }

    // Quick Petty Cash Entry Form Submit
    var quickForm = document.getElementById('formQuickPettyCash');
    if (quickForm) {
        quickForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var fd = new FormData(quickForm);
            var txType = fd.get('tx_type') || 'credit';
            var amt = parseFloat(fd.get('amount')) || 0;
            rawPettyCashLogs.push({
                id: rawPettyCashLogs.length + 100,
                date: fd.get('date') || '2026-10-29',
                fromStaff: fd.get('from_staff') || 'KOWSHIK SOFTWARE',
                toStaff: fd.get('to_staff') || '-',
                description: fd.get('remarks') || 'Petty cash entry',
                credit: txType === 'credit' ? amt : 0,
                debit: txType === 'debit' ? amt : 0,
                splitup: fd.get('splitup') || 'No'
            });
            applyPcFilter();
            quickForm.reset();
            var mEl = document.getElementById('quickPettyCashModal');
            if (mEl && window.bootstrap && bootstrap.Modal.getInstance(mEl)) {
                bootstrap.Modal.getInstance(mEl).hide();
            }
        });
    }

    // Filter & Search State
    var currentPcFilter = 'all';

    function updateFilterBadge() {
        var count = 0;
        var staff = document.getElementById('pcStaffFilterSelect') ? document.getElementById('pcStaffFilterSelect').value : '';
        var fromD = document.getElementById('pcFromDate') ? document.getElementById('pcFromDate').value : '';
        var toD = document.getElementById('pcToDate') ? document.getElementById('pcToDate').value : '';
        var q = (document.getElementById('pcSearchInput').value || '').trim();
        if (currentPcFilter && currentPcFilter !== 'all') count++;
        if (staff) count++;
        if (fromD || toD) count++;
        if (q) count++;

        var badge = document.getElementById('pcFilterCountBadge');
        if (badge) {
            badge.textContent = count;
            badge.classList.toggle('d-none', count === 0);
        }
    }

    function applyPcFilter() {
        var staff = document.getElementById('pcStaffFilterSelect') ? document.getElementById('pcStaffFilterSelect').value.toLowerCase() : '';
        var fromD = document.getElementById('pcFromDate') ? document.getElementById('pcFromDate').value : '';
        var toD = document.getElementById('pcToDate') ? document.getElementById('pcToDate').value : '';
        var q = (document.getElementById('pcSearchInput').value || '').toLowerCase().trim();

        var filtered = rawPettyCashLogs.filter(function (item) {
            var matchType = true;
            if (currentPcFilter === 'credit') {
                matchType = (parseFloat(item.credit) || 0) > 0;
            } else if (currentPcFilter === 'debit') {
                matchType = (parseFloat(item.debit) || 0) > 0;
            } else if (currentPcFilter === 'splitup') {
                matchType = item.splitup === 'Yes';
            }

            var matchStaff = !staff || (item.fromStaff.toLowerCase().indexOf(staff) !== -1) || ((item.toStaff || '').toLowerCase().indexOf(staff) !== -1);
            var matchFrom = !fromD || (item.date >= fromD);
            var matchTo = !toD || (item.date <= toD);
            var hay = [item.fromStaff, item.toStaff, item.description, item.date, item.splitup].join(' ').toLowerCase();
            var matchQ = !q || (hay.indexOf(q) !== -1);

            return matchType && matchStaff && matchFrom && matchTo && matchQ;
        });

        processAndRenderLedger(filtered);
        updateFilterBadge();
    }

    // Header Type Toggle Pills
    Array.prototype.forEach.call(document.querySelectorAll('.pc-filter-btn'), function (btn) {
        btn.addEventListener('click', function () {
            Array.prototype.forEach.call(document.querySelectorAll('.pc-filter-btn'), function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            currentPcFilter = btn.getAttribute('data-filter') || 'all';
            var typeSel = document.getElementById('pcTypeFilterSelect');
            if (typeSel) {
                typeSel.value = currentPcFilter;
                if (window.jQuery && jQuery.fn.select2) jQuery(typeSel).trigger('change.select2');
            }
            applyPcFilter();
        });
    });

    // Offcanvas Apply Filters
    var applyBtn = document.getElementById('pcApplyFilterBtn');
    if (applyBtn) {
        applyBtn.addEventListener('click', function () {
            var typeSel = document.getElementById('pcTypeFilterSelect');
            if (typeSel) {
                currentPcFilter = typeSel.value || 'all';
                Array.prototype.forEach.call(document.querySelectorAll('.pc-filter-btn'), function (b) {
                    b.classList.toggle('active', b.getAttribute('data-filter') === currentPcFilter);
                });
            }
            applyPcFilter();
            var oc = document.getElementById('pcFilterOffcanvas');
            if (oc && window.bootstrap && bootstrap.Offcanvas) {
                var inst = bootstrap.Offcanvas.getInstance(oc);
                if (inst) inst.hide();
            }
        });
    }

    // Offcanvas Reset Filters
    var resetBtn = document.getElementById('pcResetFilterBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function () {
            currentPcFilter = 'all';
            document.getElementById('pcFromDate').value = '';
            document.getElementById('pcToDate').value = '';
            document.getElementById('pcSearchInput').value = '';
            ['pcTypeFilterSelect', 'pcStaffFilterSelect'].forEach(function (id) {
                var el = document.getElementById(id);
                if (el) {
                    el.value = id === 'pcTypeFilterSelect' ? 'all' : '';
                    if (window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change.select2');
                }
            });
            Array.prototype.forEach.call(document.querySelectorAll('.pc-filter-btn'), function (b) {
                b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
            });
            applyPcFilter();
        });
    }
});
</script>

<?php include 'footer.php'; ?>
