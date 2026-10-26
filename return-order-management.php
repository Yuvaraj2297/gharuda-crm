<?php
include 'header.php';

$plStaff     = ['Admin User', 'Ravi Kumar', 'Priya S', 'Karthik M'];
$plStatuses  = ['Draft', 'Adjusted', 'Reject', 'Approved'];
$plTypes     = ['Receive', 'Export', 'Return'];
$plCustomers = ['Abcd c', 'Sri Ganesh Traders', 'Kovai Metals Pvt Ltd', 'Anand Industries', 'Lakshmi Enterprises'];
$plVendors   = ['Vendor A', 'Vendor B', 'Apex Supplies Co', 'Global Trading Corp', 'Sri Ganesh Traders', 'Lakshmi Enterprises'];

$plOpts = function (array $a) {
    foreach ($a as $v) {
        echo '<option value="' . htmlspecialchars($v) . '">' . htmlspecialchars($v) . '</option>';
    }
};
?>

<style>
    .rom-page .filters-card { position: relative; z-index: 50; }
    .rom-page .filters-toggle-row { display: flex; align-items: center; justify-content: space-between; }
    .rom-page .filters-toggle-btn {
        display: inline-flex; align-items: center; gap: 8px;
        background: var(--primary-light, #e8f7ea); color: var(--primary-dark, #0ca308);
        border: none; font-weight: 600; font-size: 13.5px; padding: 9px 16px;
        border-radius: 10px; cursor: pointer; transition: background .2s ease;
    }
    .rom-page .filters-toggle-btn:hover { background: #d7f0da; }
    .rom-page .filters-toggle-btn .chevron { transition: transform .35s cubic-bezier(.4,0,.2,1); font-size: 12px; }
    .rom-page .filters-toggle-btn.open .chevron { transform: rotate(180deg); }
    .rom-page .filters-collapse {
        max-height: 0; opacity: 0; overflow: hidden; transform: translateY(-8px); margin-top: 0;
        transition: max-height .45s cubic-bezier(.4,0,.2,1), opacity .35s ease, transform .4s cubic-bezier(.34,1.1,.64,1), margin .45s ease;
    }
    .rom-page .filters-collapse.open { max-height: 900px; opacity: 1; transform: translateY(0); margin-top: 16px; overflow: visible; }

    .rom-page .leave-active-bar {
        display: flex; align-items: center; flex-wrap: wrap; gap: 8px;
        padding: 10px 14px; margin-bottom: 12px; border: 1px solid #eef0f3; border-radius: 14px; background: #fff;
    }
    .rom-page .leave-active-bar[hidden] { display: none; }
    .rom-page .leave-active-label { color: var(--ink-500); font-size: 12.5px; font-weight: 600; }
    .rom-page .leave-chip {
        display: inline-flex; align-items: center; gap: 7px; padding: 6px 8px 6px 11px; border-radius: 999px;
        background: var(--primary-light); color: var(--primary-dark); font-size: 12px; font-weight: 700;
    }
    .rom-page .leave-chip-close {
        width: 18px; height: 18px; display: inline-flex; align-items: center; justify-content: center;
        border: 0; border-radius: 50%; background: rgba(0,0,0,.06); color: inherit; cursor: pointer;
        font-size: 13px; line-height: 1; padding: 0;
    }
    .rom-page .leave-chip-close:hover { background: rgba(0,0,0,.14); }
    .rom-page .leave-active-clear {
        margin-left: auto; border: 0; background: transparent; color: var(--accent-red);
        font-size: 12.5px; font-weight: 700; text-decoration: underline; cursor: pointer;
    }

    .form-label { font-size: 12px; font-weight: 700; color: #475569; margin-bottom: 4px; }
    .table-modern th, .table-modern td { white-space: nowrap; }
    .select2-container--open { z-index: 2000 !important; }
    .select2-dropdown         { z-index: 2001 !important; }

    /* Sticky Options column */
    #romTable th:last-child,
    #romTable td:last-child {
        position: sticky; right: 0; z-index: 2;
        background: var(--bg-card, #fff); min-width: 90px; text-align: center;
        box-shadow: -8px 0 8px -8px rgba(15,23,42,.18);
    }
    #romTable thead th:last-child { z-index: 5; top: 0; background: var(--table-th, #f1f5f9); }
    #romTable tbody tr:hover td:last-child { background: var(--table-hover, #f8fafc); }

    /* Action icon buttons */
    .rom-actions { display: inline-flex; align-items: center; justify-content: center; gap: 6px; }
    .rom-act {
        width: 30px; height: 30px; border: none; border-radius: 6px;
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 14px; cursor: pointer;
        transition: transform .15s ease, box-shadow .15s ease, filter .15s ease;
    }
    .rom-act:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(15,23,42,.14); filter: brightness(.96); }
    .rom-act-view   { background: #e8f1fe; color: #2563eb; }
    .rom-act-delete { background: #dc2626; color: #fff; }

    /* Status pills */
    .rom-status-pill { display: inline-block; padding: 4px 12px; font-size: 12px; font-weight: 700; border-radius: 6px; color: #fff; }
    .rom-status-approved { background-color: #10b981; }
    .rom-status-adjusted { background-color: #10b981; }
    .rom-status-draft    { background-color: #6b7280; }
    .rom-status-reject   { background-color: #ef4444; }

    /* Items table inside modal */
    .rom-items-table { width: 100%; border-collapse: collapse; font-size: 12.5px; border: 1px solid #e2e8f0; }
    .rom-items-table th {
        background: #f8fafc; color: #475569; font-size: 11.5px; font-weight: 700;
        padding: 10px 12px; border: 1px solid #e2e8f0; text-align: center;
    }
    .rom-items-table td { padding: 8px; border: 1px solid #e2e8f0; vertical-align: middle; }
    .rom-check-btn {
        width: 32px; height: 32px; border: none; border-radius: 6px;
        background: var(--primary); color: #fff; font-size: 16px;
        display: inline-flex; align-items: center; justify-content: center; cursor: pointer;
    }
    .rom-check-btn:hover { background: #0369a1; }
    .required-star { color: #ef4444; margin-right: 2px; }

    /* View Modal */
    #romViewModal .modal-content {
        border-radius: 0; border: none; background-color: #f8fafc;
        display: flex; flex-direction: column; height: 100%;
    }
    #romViewModal .modal-header {
        background: #fff; border-bottom: 1px solid #e2e8f0;
        padding: 16px 24px; display: flex; align-items: center; gap: 12px; flex-shrink: 0;
    }
    #romViewModal .vw-header-icon {
        width: 38px; height: 38px; border-radius: 10px;
        background: var(--primary-light, #e8f7ea); color: var(--primary-dark, #0ca308);
        display: inline-flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;
    }
    #romViewModal .vw-header-title { font-size: 15.5px; font-weight: 700; color: #1e293b; margin: 0; flex: 1; }
    #romViewModal .vw-header-sub   { font-size: 12px; color: #94a3b8; margin-top: 1px; }
    #romViewModal .vw-status-badge {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 5px 14px; border-radius: 999px; font-size: 12px; font-weight: 700; letter-spacing: 0.3px;
    }
    #romViewModal .vw-status-badge.approved { background: #d1fae5; color: #065f46; }
    #romViewModal .vw-status-badge.draft    { background: #f1f5f9; color: #475569; }
    #romViewModal .vw-status-badge.reject   { background: #fee2e2; color: #991b1b; }
    #romViewModal .vw-status-badge.adjusted { background: #d1fae5; color: #065f46; }
    #romViewModal .vw-status-badge::before {
        content: ''; width: 7px; height: 7px; border-radius: 50%; background: currentColor; opacity: 0.8;
    }
    #romViewModal .modal-body { flex: 1; overflow-y: auto; padding: 24px; }
    .vw-section-label {
        font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;
        color: #94a3b8; margin-bottom: 14px; display: flex; align-items: center; gap: 8px;
    }
    .vw-section-label::after { content: ''; flex: 1; height: 1px; background: #e2e8f0; }
    .vw-info-grid {
        display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 12px; margin-bottom: 28px;
    }
    .vw-info-card {
        background: #fff; border: 1px solid #e2e8f0; border-radius: 12px;
        padding: 14px 16px; transition: box-shadow 0.2s ease;
    }
    .vw-info-card:hover { box-shadow: 0 4px 14px rgba(15,23,42,.07); }
    .vw-info-card .vw-card-label {
        font-size: 11px; font-weight: 600; color: #94a3b8;
        text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;
        display: flex; align-items: center; gap: 5px;
    }
    .vw-info-card .vw-card-value { font-size: 13.5px; font-weight: 600; color: #1e293b; word-break: break-word; }
    .vw-info-card .vw-card-value.empty { color: #cbd5e1; font-style: italic; }
    .vw-detail-table {
        width: 100%; border-collapse: separate; border-spacing: 0; font-size: 12.5px;
        background: #fff; border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden;
    }
    .vw-detail-table th {
        background: #f8fafc; color: #475569; font-size: 11.5px; font-weight: 700;
        padding: 11px 14px; border-bottom: 1px solid #e2e8f0; text-align: left; white-space: nowrap;
    }
    .vw-detail-table td { padding: 11px 14px; border-bottom: 1px solid #f1f5f9; color: #334155; vertical-align: middle; }
    .vw-detail-table tbody tr:last-child td { border-bottom: none; }
    .vw-detail-table tbody tr:hover td { background: #f8fafc; }
    .vw-sno-badge {
        display: inline-flex; align-items: center; justify-content: center;
        width: 22px; height: 22px; border-radius: 50%;
        background: var(--primary-light, #e8f7ea); color: var(--primary-dark, #0ca308);
        font-size: 11px; font-weight: 700;
    }
    #romViewModal .modal-footer {
        background: #fff; border-top: 1px solid #e2e8f0;
        padding: 14px 24px; display: flex; align-items: center; justify-content: flex-end; gap: 10px; flex-shrink: 0;
    }
</style>

<main class="rom-page">
    <!-- Page header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-1 page-title">Management receiving-exporting return order</h1>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <div class="dropdown">
                <button type="button" class="btn btn-primary px-3 py-2 dropdown-toggle" id="btnAddRom" data-bs-toggle="dropdown" aria-expanded="false">
                    Add
                </button>
                <ul class="dropdown-menu shadow-sm" aria-labelledby="btnAddRom" style="min-width:220px; border-radius:10px; border:1px solid #e2e8f0; padding:6px;">
                    <li>
                        <a class="dropdown-item rounded-2 py-2 px-3" href="javascript:void(0);" id="btnRomReceiptReturn" style="font-size:13.5px;">
                            <i class="bi bi-receipt me-2 text-primary"></i>Receipt return order
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-2 py-2 px-3" href="javascript:void(0);" id="btnRomDeliveryReturn" style="font-size:13.5px;">
                            <i class="bi bi-truck me-2 text-success"></i>Delivery return purchasing goods
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Filters card -->
    <div class="card-custom mb-3 filters-card">
        <div class="filters-toggle-row">
            <span class="fw-semibold" style="font-size:14.5px;color:var(--ink-900);">
                <i class="bi bi-funnel me-1"></i> Filter
            </span>
            <button type="button" class="filters-toggle-btn open" id="romFiltersToggle">
                <span>Hide Filters</span><i class="bi bi-chevron-down chevron"></i>
            </button>
        </div>
        <div class="filters-collapse open" id="romFiltersCollapse">
            <div class="row g-3">
                <!-- From date -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <label class="form-label" for="f_from_date">From date</label>
                    <input type="date" class="form-control" id="f_from_date">
                </div>
                <!-- To date -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <label class="form-label" for="f_to_date">To date</label>
                    <input type="date" class="form-control" id="f_to_date">
                </div>
                <!-- Type -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <label class="form-label" for="f_type">Type</label>
                    <select class="form-select select2" id="f_type" data-placeholder="Non selected">
                        <option value="">Non selected</option>
                        <?php $plOpts($plTypes); ?>
                    </select>
                </div>
                <!-- Staff -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label class="form-label" for="f_staff">Staff</label>
                    <select class="form-select select2" id="f_staff" data-placeholder="Non selected">
                        <option value="">Non selected</option>
                        <?php $plOpts($plStaff); ?>
                    </select>
                </div>
                <!-- Status -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <label class="form-label" for="f_status">Status</label>
                    <select class="form-select select2" id="f_status" data-placeholder="Non selected">
                        <option value="">Non selected</option>
                        <?php $plOpts($plStatuses); ?>
                    </select>
                </div>
                <!-- Buttons -->
                <div class="col-12 text-end mt-3">
                    <div class="d-flex gap-2 justify-content-end">
                        <button type="button" class="btn btn-reject px-4" id="romClear">Clear Filters</button>
                        <button type="button" class="btn btn-primary px-4" id="romApply">
                            <i class="bi bi-funnel me-1"></i>Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active filter chips -->
    <div class="leave-active-bar" id="romActiveBar" hidden>
        <span class="leave-active-label"><i class="bi bi-funnel-fill me-1"></i>Active Filters:</span>
        <div id="romActiveList" class="d-flex flex-wrap gap-2"></div>
        <button type="button" class="leave-active-clear" id="romActiveClear">Clear All</button>
    </div>

    <!-- Table card -->
    <div class="card-custom p-0" id="romTableWrap">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100" id="romTable">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Order Return Number <i class="bi bi-caret-down-fill text-muted ms-1" style="font-size:10px;"></i></th>
                        <th>Customer name</th>
                        <th>Total amount</th>
                        <th>Discount total</th>
                        <th>Total after discount</th>
                        <th>Date created</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody id="romTbody"></tbody>
            </table>
        </div>
    </div>
</main>

<!-- Add Modal -->
<div class="modal fade" id="romModal" tabindex="-1" aria-labelledby="romModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content rounded-0">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold" id="romModalLabel">
                    <i class="bi bi-arrow-left-right me-1"></i> Return Order
                </h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body p-4">
                <form id="romForm" onsubmit="return false;" autocomplete="off">
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label" for="rom_order_no">
                                <span class="required-star">*</span>Order Return Number
                            </label>
                            <input type="text" class="form-control" id="rom_order_no" placeholder="e.g. ORN-0001">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="rom_customer">
                                <span class="required-star">*</span>Customer Name
                            </label>
                            <select class="form-select select2" id="rom_customer" data-placeholder="Non selected">
                                <option value="">Non selected</option>
                                <?php $plOpts($plCustomers); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="rom_type">
                                <span class="required-star">*</span>Type
                            </label>
                            <select class="form-select select2" id="rom_type" data-placeholder="Non selected">
                                <option value="">Non selected</option>
                                <?php $plOpts($plTypes); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="rom_staff">
                                <span class="required-star">*</span>Staff
                            </label>
                            <select class="form-select select2" id="rom_staff" data-placeholder="Non selected">
                                <option value="">Non selected</option>
                                <?php $plOpts($plStaff); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="rom_date_created">Date Created</label>
                            <input type="date" class="form-control" id="rom_date_created" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="rom_status">Status</label>
                            <select class="form-select select2" id="rom_status" data-placeholder="Non selected">
                                <option value="">Non selected</option>
                                <?php $plOpts($plStatuses); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="rom_total_amount">Total Amount</label>
                            <input type="number" class="form-control" id="rom_total_amount" placeholder="0.00" min="0" step="0.01">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="rom_discount">Discount Total</label>
                            <input type="number" class="form-control" id="rom_discount" placeholder="0.00" min="0" step="0.01">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="rom_total_after_discount">Total After Discount</label>
                            <input type="number" class="form-control" id="rom_total_after_discount" placeholder="0.00" readonly style="background:#f8fafc;">
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="table-responsive mb-4">
                        <table class="rom-items-table">
                            <thead>
                                <tr>
                                    <th style="width:35%;">Item</th>
                                    <th style="width:15%;">Lot Number</th>
                                    <th style="width:15%;">Expiry Date</th>
                                    <th style="width:15%;">Available Qty</th>
                                    <th style="width:15%;">Quantity</th>
                                    <th style="width:5%;"><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody id="romItemsTbody">
                                <tr>
                                    <td><textarea class="form-control" id="rom_item_desc" rows="2" placeholder="Description"></textarea></td>
                                    <td><input type="text" class="form-control" id="rom_lot" placeholder="Lot number"></td>
                                    <td><input type="date" class="form-control" id="rom_expiry"></td>
                                    <td class="text-center align-middle">
                                        <div id="rom_avail_qty" class="fw-bold text-secondary">-</div>
                                        <small class="text-muted">Unit</small>
                                    </td>
                                    <td><input type="number" class="form-control" id="rom_qty" min="1"></td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="rom-check-btn" id="btnAddRomRow">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="rom_notes">Notes / Reason</label>
                        <textarea class="form-control" id="rom_notes" rows="4"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top justify-content-end gap-2">
                <button type="button" class="btn btn-light px-4 border" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary px-4" id="btnRomSave">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Receipt Return Order Modal ===== -->
<div class="modal fade" id="receiptReturnModal" tabindex="-1" aria-labelledby="receiptReturnModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content rounded-0">
            <div class="modal-header border-bottom py-3">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="receiptReturnModalLabel">
                    <i class="bi bi-receipt text-primary"></i> Add receipt return order
                </h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body p-4">
                <form id="receiptReturnForm" onsubmit="return false;" autocomplete="off">

                    <!-- Row 1: Related type | Related data | Order Number | Order Date -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="rr_related_type">Related type</label>
                            <select class="form-select select2" id="rr_related_type">
                                <option value="Manual" selected>Manual</option>
                                <option value="Sales Return Order">Sales Return Order</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="rr_related_data">Related data</label>
                            <select class="form-select select2" id="rr_related_data" data-placeholder="Non selected">
                                <option value="">Non selected</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="rr_order_number">Order Number</label>
                            <input type="text" class="form-control" id="rr_order_number" placeholder="Order Number">
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="rr_order_date">Order Date</label>
                            <input type="datetime-local" class="form-control" id="rr_order_date" value="<?= date('Y-m-d\TH:i') ?>">
                        </div>
                    </div>

                    <!-- Row 2: Customer | Date created | Return type -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label" for="rr_customer">
                                <span class="required-star">*</span>Customer
                            </label>
                            <select class="form-select select2" id="rr_customer" data-placeholder="Non selected">
                                <option value="">Non selected</option>
                                <?php $plOpts($plCustomers); ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="rr_date_created">Date created</label>
                            <input type="datetime-local" class="form-control" id="rr_date_created" value="<?= date('Y-m-d\TH:i') ?>">
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="rr_return_type">Return type</label>
                            <select class="form-select select2" id="rr_return_type">
                                <option value="Fully" selected>Fully</option>
                                <option value="Partial">Partial</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3: Email | Phone Number -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label" for="rr_email">
                                <span class="required-star">*</span>Email
                            </label>
                            <input type="email" class="form-control" id="rr_email" placeholder="Email">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label" for="rr_phone">
                                <span class="required-star">*</span>Phone Number
                            </label>
                            <input type="text" class="form-control" id="rr_phone" placeholder="Phone Number">
                        </div>
                    </div>

                    <!-- Row 4: Order Return Number -->
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label" for="rr_return_no">Order Return Number</label>
                            <div class="input-group">
                                <span class="input-group-text fw-semibold" style="font-size:12.5px;background:#f8fafc;color:#475569;border-right:none;">RaReturn1</span>
                                <input type="text" class="form-control" id="rr_return_no" value="<?= 'RECEIPT_RETURN' . date('Ymd') . rand(10000,99999) ?>" readonly style="background:#f8fafc;border-left:none;">
                            </div>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="table-responsive mb-3">
                        <table style="width:100%;border-collapse:collapse;font-size:12.5px;border:1px solid #e2e8f0;" id="rrItemsTable">
                            <thead>
                                <tr>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 10px;border:1px solid #e2e8f0;width:26%;">
                                        <button type="button" class="btn btn-sm btn-primary px-2 me-1" id="btnRrAddItem" style="font-size:11px;line-height:1.6;"><i class="bi bi-plus"></i></button>Item
                                    </th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:8%;">Quantity</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:8%;">Rate</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:9%;">Tax</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:10%;">Subtotal</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:9%;">Discount</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:12%;">Discount(money)</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:12%;">Total payment</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:4%;"><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody id="rrItemsTbody">
                                <tr id="rrNoItems">
                                    <td colspan="9" style="padding:18px;text-align:center;border:1px solid #e2e8f0;color:#94a3b8;font-size:12.5px;">
                                        <i class="bi bi-plus-circle me-1"></i> Click the <strong>+</strong> button above to add items
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Summary -->
                    <div class="row mb-4">
                        <div class="col-lg-5 col-md-7 ms-auto">
                            <table style="width:100%;font-size:13px;">
                                <tr>
                                    <td style="padding:7px 10px;color:#64748b;border-top:1px solid #f1f5f9;">Subtotal :</td>
                                    <td style="padding:7px 10px;text-align:right;font-weight:600;color:#1e293b;border-top:1px solid #f1f5f9;" id="rr_subtotal">&#8377; 0.00</td>
                                </tr>
                                <tr>
                                    <td style="padding:7px 10px;color:#64748b;border-top:1px solid #f1f5f9;">Additional discount :</td>
                                    <td style="padding:4px 10px;text-align:right;border-top:1px solid #f1f5f9;">
                                        <input type="number" class="form-control form-control-sm text-end" id="rr_add_discount" value="0" min="0" style="width:110px;margin-left:auto;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:7px 10px;color:#64748b;border-top:1px solid #f1f5f9;">Total discount :</td>
                                    <td style="padding:7px 10px;text-align:right;font-weight:600;color:#1e293b;border-top:1px solid #f1f5f9;" id="rr_total_discount">&#8377; 0.00</td>
                                </tr>
                                <tr>
                                    <td style="padding:9px 10px;color:#1e293b;font-weight:700;border-top:2px solid #e2e8f0;">Total payment :</td>
                                    <td style="padding:9px 10px;text-align:right;font-weight:700;color:#1e293b;border-top:2px solid #e2e8f0;" id="rr_total_payment">&#8377; 0.00</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Reason -->
                    <div class="mb-3">
                        <label class="form-label" for="rr_reason">Reason</label>
                        <textarea class="form-control" id="rr_reason" rows="4" style="resize:vertical;"></textarea>
                    </div>

                    <!-- Admin note -->
                    <div class="mb-3">
                        <label class="form-label" for="rr_admin_note">Admin note</label>
                        <textarea class="form-control" id="rr_admin_note" rows="4" style="resize:vertical;"></textarea>
                    </div>

                    <!-- Return policies information -->
                    <div class="mb-2">
                        <small class="text-muted" style="font-size:12px;">Return policies information</small>
                    </div>

                </form>
            </div>
            <div class="modal-footer border-top justify-content-end gap-2">
                <button type="button" class="btn btn-light px-4 border" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary px-4" id="btnRrSave">
                    <i class="bi bi-save me-1"></i>Save
                </button>
                <button type="button" class="btn btn-success px-4" id="btnRrSaveSend">
                    <i class="bi bi-send me-1"></i>Save &amp; Send Request
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Delivery Return Purchasing Goods Modal ===== -->
<div class="modal fade" id="deliveryReturnModal" tabindex="-1" aria-labelledby="deliveryReturnModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content rounded-0">
            <div class="modal-header border-bottom py-3">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="deliveryReturnModalLabel">
                    <i class="bi bi-box-seam text-primary"></i> Add Delivery return purchasing goods
                </h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body p-4">
                <form id="deliveryReturnForm" onsubmit="return false;" autocomplete="off">

                    <!-- Row 1: Related type | Related data | Order Number | Order Date -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="dr_related_type">Related type</label>
                            <select class="form-select select2" id="dr_related_type">
                                <option value="Manual" selected>Manual</option>
                                <option value="Purchase Return Order">Purchase Return Order</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="dr_related_data">Related data</label>
                            <select class="form-select select2" id="dr_related_data" data-placeholder="Non selected">
                                <option value="">Non selected</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="dr_order_number">Order Number</label>
                            <input type="text" class="form-control" id="dr_order_number" placeholder="Order Number">
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="dr_order_date">Order Date</label>
                            <input type="datetime-local" class="form-control" id="dr_order_date" value="<?= date('Y-m-d\TH:i') ?>">
                        </div>
                    </div>

                    <!-- Row 2: Vendor | Date created | Return type -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label" for="dr_vendor">
                                <span class="required-star">*</span>Vendor
                            </label>
                            <select class="form-select select2" id="dr_vendor" data-placeholder="Non selected">
                                <option value="">Non selected</option>
                                <?php $plOpts($plVendors); ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="dr_date_created">Date created</label>
                            <input type="datetime-local" class="form-control" id="dr_date_created" value="<?= date('Y-m-d\TH:i') ?>">
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label" for="dr_return_type">Return type</label>
                            <select class="form-select select2" id="dr_return_type">
                                <option value="Fully" selected>Fully</option>
                                <option value="Partial">Partial</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3: Email | Phone Number -->
                    <div class="row g-3 mb-3">
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label" for="dr_email">
                                <span class="required-star">*</span>Email
                            </label>
                            <input type="email" class="form-control" id="dr_email" placeholder="Email">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-label" for="dr_phone">
                                <span class="required-star">*</span>Phone Number
                            </label>
                            <input type="text" class="form-control" id="dr_phone" placeholder="Phone Number">
                        </div>
                    </div>

                    <!-- Row 4: Order Return Number -->
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label" for="dr_return_no">Order Return Number</label>
                            <div class="input-group">
                                <span class="input-group-text fw-semibold" style="font-size:12.5px;background:#f8fafc;color:#475569;border-right:none;">DeReturn2</span>
                                <input type="text" class="form-control" id="dr_return_no" value="<?= 'DELIVERY_RETURN' . date('Ymd') . rand(10000,99999) ?>" readonly style="background:#f8fafc;border-left:none;">
                            </div>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="table-responsive mb-3">
                        <table style="width:100%;border-collapse:collapse;font-size:12.5px;border:1px solid #e2e8f0;" id="drItemsTable">
                            <thead>
                                <tr>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 10px;border:1px solid #e2e8f0;width:26%;">
                                        <button type="button" class="btn btn-sm btn-primary px-2 me-1" id="btnDrAddItem" style="font-size:11px;line-height:1.6;"><i class="bi bi-plus"></i></button>Item
                                    </th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:8%;">Quantity</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:9%;">Purchase Price</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:9%;">Tax</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:10%;">Subtotal</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:9%;">Discount</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:12%;">Discount(money)</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:12%;">Total payment</th>
                                    <th style="background:#f8fafc;color:#475569;font-size:11.5px;font-weight:700;padding:10px 8px;border:1px solid #e2e8f0;text-align:center;width:4%;"><i class="bi bi-gear"></i></th>
                                </tr>
                            </thead>
                            <tbody id="drItemsTbody">
                                <tr id="drNoItems">
                                    <td colspan="9" style="padding:18px;text-align:center;border:1px solid #e2e8f0;color:#94a3b8;font-size:12.5px;">
                                        <i class="bi bi-plus-circle me-1"></i> Click the <strong>+</strong> button above to add items
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Summary -->
                    <div class="row mb-4">
                        <div class="col-lg-5 col-md-7 ms-auto">
                            <table style="width:100%;font-size:13px;">
                                <tr>
                                    <td style="padding:7px 10px;color:#64748b;border-top:1px solid #f1f5f9;">Subtotal :</td>
                                    <td style="padding:7px 10px;text-align:right;font-weight:600;color:#1e293b;border-top:1px solid #f1f5f9;" id="dr_subtotal">&#8377; 0.00</td>
                                </tr>
                                <tr>
                                    <td style="padding:7px 10px;color:#64748b;border-top:1px solid #f1f5f9;">Additional discount :</td>
                                    <td style="padding:4px 10px;text-align:right;border-top:1px solid #f1f5f9;">
                                        <input type="number" class="form-control form-control-sm text-end" id="dr_add_discount" value="0" min="0" style="width:110px;margin-left:auto;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:7px 10px;color:#64748b;border-top:1px solid #f1f5f9;">Total discount :</td>
                                    <td style="padding:7px 10px;text-align:right;font-weight:600;color:#1e293b;border-top:1px solid #f1f5f9;" id="dr_total_discount">-&#8377; 0.00</td>
                                </tr>
                                <tr>
                                    <td style="padding:9px 10px;color:#1e293b;font-weight:700;border-top:2px solid #e2e8f0;">Total payment :</td>
                                    <td style="padding:9px 10px;text-align:right;font-weight:700;color:#1e293b;border-top:2px solid #e2e8f0;" id="dr_total_payment">&#8377; 0.00</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Reason -->
                    <div class="mb-3">
                        <label class="form-label" for="dr_reason">Reason</label>
                        <textarea class="form-control" id="dr_reason" rows="4" style="resize:vertical;"></textarea>
                    </div>

                    <!-- Admin note -->
                    <div class="mb-3">
                        <label class="form-label" for="dr_admin_note">Admin note</label>
                        <textarea class="form-control" id="dr_admin_note" rows="4" style="resize:vertical;"></textarea>
                    </div>

                    <!-- Return policies information -->
                    <div class="mb-2">
                        <small class="text-muted" style="font-size:12px;">Return policies information</small>
                    </div>

                </form>
            </div>
            <div class="modal-footer border-top justify-content-end gap-2">
                <button type="button" class="btn btn-light px-4 border" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary px-4" id="btnDrSave">
                    Save
                </button>
                <button type="button" class="btn btn-primary text-white px-4" id="btnDrSaveSend">
                    Save &amp; Send Request
                </button>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->

<div class="modal fade" id="romViewModal" tabindex="-1" aria-labelledby="romViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">

            <div class="modal-header">
                <div class="vw-header-icon"><i class="bi bi-arrow-left-right"></i></div>
                <div class="flex-grow-1">
                    <div class="vw-header-title">Return Order — Details</div>
                    <div class="vw-header-sub">View full record information</div>
                </div>
                <span class="vw-status-badge draft" id="vwRomStatusBadge">Draft</span>
                <button type="button" class="modal-close ms-3" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>

            <div class="modal-body">
                <div class="vw-section-label"><i class="bi bi-info-circle-fill"></i> General Information</div>
                <div class="vw-info-grid">
                    <div class="vw-info-card">
                        <div class="vw-card-label"><i class="bi bi-hash"></i> Order Return Number</div>
                        <div class="vw-card-value" id="vwRomOrderNo">—</div>
                    </div>
                    <div class="vw-info-card">
                        <div class="vw-card-label"><i class="bi bi-person"></i> Customer Name</div>
                        <div class="vw-card-value" id="vwRomCustomer">—</div>
                    </div>
                    <div class="vw-info-card">
                        <div class="vw-card-label"><i class="bi bi-tag"></i> Type</div>
                        <div class="vw-card-value" id="vwRomType">—</div>
                    </div>
                    <div class="vw-info-card">
                        <div class="vw-card-label"><i class="bi bi-person-badge"></i> Staff</div>
                        <div class="vw-card-value" id="vwRomStaff">—</div>
                    </div>
                    <div class="vw-info-card">
                        <div class="vw-card-label"><i class="bi bi-calendar"></i> Date Created</div>
                        <div class="vw-card-value" id="vwRomDateCreated">—</div>
                    </div>
                    <div class="vw-info-card">
                        <div class="vw-card-label"><i class="bi bi-currency-rupee"></i> Total Amount</div>
                        <div class="vw-card-value" id="vwRomTotal">—</div>
                    </div>
                    <div class="vw-info-card">
                        <div class="vw-card-label"><i class="bi bi-percent"></i> Discount Total</div>
                        <div class="vw-card-value" id="vwRomDiscount">—</div>
                    </div>
                    <div class="vw-info-card">
                        <div class="vw-card-label"><i class="bi bi-cash-stack"></i> Total After Discount</div>
                        <div class="vw-card-value" id="vwRomTotalAfter">—</div>
                    </div>
                    <div class="vw-info-card" style="grid-column: 1 / -1;">
                        <div class="vw-card-label"><i class="bi bi-chat-left-text"></i> Notes / Reason</div>
                        <div class="vw-card-value" id="vwRomNotes"><span class="empty">No notes provided</span></div>
                    </div>
                </div>

                <div class="vw-section-label"><i class="bi bi-boxes"></i> Item Details</div>
                <div class="table-responsive mb-2">
                    <table class="vw-detail-table">
                        <thead>
                            <tr>
                                <th style="width:4%;" class="text-center">#</th>
                                <th style="width:34%;">Item</th>
                                <th style="width:14%;">Lot Number</th>
                                <th style="width:14%;">Expiry Date</th>
                                <th style="width:14%;">Available Qty</th>
                                <th style="width:10%;">Quantity</th>
                            </tr>
                        </thead>
                        <tbody id="vwRomItemsTbody">
                            <tr>
                                <td class="text-center"><span class="vw-sno-badge">1</span></td>
                                <td>—</td><td>—</td><td>—</td><td>—</td><td>—</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal" style="font-size:13px;color:#475569;">
                    <i class="bi bi-x me-1"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/pages/return-order-management.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
