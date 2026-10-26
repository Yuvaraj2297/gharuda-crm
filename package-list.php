<?php
include 'header.php';
$plStaff    = ['Admin User', 'Ravi Kumar', 'Priya S', 'Karthik M'];
$plVouchers = ['IDV-0001', 'IDV-0002', 'IDV-0003', 'IDV-0004'];
$plStatuses = ['Approved', 'Not yet approve', 'Reject'];
$plDelivery = ['Ready To Deliver', 'Delivery In Progress', 'Delivered', 'Received', 'Returned', 'Not Delivered'];
$plCustomers = ['Abcd c', 'Sri Ganesh Traders', 'Kovai Metals Pvt Ltd', 'Anand Industries', 'Lakshmi Enterprises'];
$plCountries = ['India', 'United States', 'United Kingdom', 'Singapore', 'Australia'];
$plOpts = function (array $a) {
    foreach ($a as $v) {
        echo '<option value="' . htmlspecialchars($v) . '">' . htmlspecialchars($v) . '</option>';
    }
};
?>

 

<style>
    .packing-page .filters-card { position: relative; z-index: 50; }
    .packing-page .filters-toggle-row { display: flex; align-items: center; justify-content: space-between; }
    .packing-page .filters-toggle-btn {
        display: inline-flex; align-items: center; gap: 8px;
        background: var(--primary-light, #e8f7ea); color: var(--primary-dark, #0ca308);
        border: none; font-weight: 600; font-size: 13.5px; padding: 9px 16px;
        border-radius: 10px; cursor: pointer; transition: background .2s ease;
    }
    .packing-page .filters-toggle-btn:hover { background: #d7f0da; }
    .packing-page .filters-toggle-btn .chevron { transition: transform .35s cubic-bezier(.4, 0, .2, 1); font-size: 12px; }
    .packing-page .filters-toggle-btn.open .chevron { transform: rotate(180deg); }
    .packing-page .filters-collapse {
        max-height: 0; opacity: 0; overflow: hidden; transform: translateY(-8px); margin-top: 0;
        transition: max-height .45s cubic-bezier(.4, 0, .2, 1), opacity .35s ease, transform .4s cubic-bezier(.34, 1.1, .64, 1), margin .45s ease;
    }
    .packing-page .filters-collapse.open { max-height: 900px; opacity: 1; transform: translateY(0); margin-top: 16px; overflow: visible; }

    .packing-page .leave-active-bar {
        display: flex; align-items: center; flex-wrap: wrap; gap: 8px;
        padding: 10px 14px; margin-bottom: 12px; border: 1px solid #eef0f3; border-radius: 14px; background: #fff;
    }
    .packing-page .leave-active-bar[hidden] { display: none; }
    .packing-page .leave-active-label { color: var(--ink-500); font-size: 12.5px; font-weight: 600; }
    .packing-page .leave-chip {
        display: inline-flex; align-items: center; gap: 7px; padding: 6px 8px 6px 11px; border-radius: 999px;
        background: var(--primary-light); color: var(--primary-dark); font-size: 12px; font-weight: 700;
    }
    .packing-page .leave-chip-close {
        width: 18px; height: 18px; display: inline-flex; align-items: center; justify-content: center;
        border: 0; border-radius: 50%; background: rgba(0, 0, 0, .06); color: inherit; cursor: pointer;
        font-size: 13px; line-height: 1; padding: 0;
    }
    .packing-page .leave-chip-close:hover { background: rgba(0, 0, 0, .14); }
    .packing-page .leave-active-clear {
        margin-left: auto; border: 0; background: transparent; color: var(--accent-red);
        font-size: 12.5px; font-weight: 700; text-decoration: underline; cursor: pointer;
    }

    .form-label { font-size: 12px; font-weight: 700; color: #475569; margin-bottom: 4px; }
    .table-modern th, .table-modern td { white-space: nowrap; }
    .select2-container--open { z-index: 2000 !important; }
    .select2-dropdown { z-index: 2001 !important; }

    /* Delivery status dropdown */
    .pl-dd { position: relative; display: inline-block; }
    .pl-dd-toggle {
        display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px;
        background: #fff; border: 1px solid #cbd5e1; border-radius: 6px;
        font-size: 12px; font-weight: 600; color: #64748b; cursor: pointer;
        transition: border-color .15s ease, color .15s ease;
    }
    .pl-dd-toggle:hover { border-color: var(--primary, #0ca308); color: var(--primary, #0ca308); }
    .pl-dd-toggle .bi { font-size: 9px; }
    .pl-dd-toggle.ds-ready { color: #64748b; }
    .pl-dd-toggle.ds-progress { border-color: #fcd34d; color: #b45309; background: #fffbeb; }
    .pl-dd-toggle.ds-delivered { border-color: #86efac; color: #15803d; background: #f0fdf4; }
    .pl-dd-toggle.ds-received { border-color: #93c5fd; color: #1d4ed8; background: #eff6ff; }
    .pl-dd-toggle.ds-returned { border-color: #fdba74; color: #c2410c; background: #fff7ed; }
    .pl-dd-toggle.ds-notdel { border-color: #fca5a5; color: #b91c1c; background: #fef2f2; }
    .pl-dd-menu { font-size: 12.5px; min-width: 200px; padding: 6px 0; }
    .pl-dd-menu .dropdown-item { padding: 7px 16px; color: #334155; }
    .pl-dd-menu .dropdown-item.active { background: var(--primary-light, #e8f7ea); color: var(--primary-dark, #0ca308); font-weight: 700; }

    .pl-link { font-weight: 600; text-decoration: none; }
    .pl-link:hover { text-decoration: underline; }

    /* ===== Sticky Action column (table-la last column) ===== */
    #packingTable th:last-child,
    #packingTable td:last-child {
        position: sticky;
        right: 0;
        z-index: 2;
        background: var(--bg-card, #fff);
        min-width: 76px;
        text-align: center;
        box-shadow: -8px 0 8px -8px rgba(15, 23, 42, .18);
    }
    #packingTable thead th:last-child {
        z-index: 5;
        top: 0;
        background: var(--table-th, #f1f5f9);
    }
    #packingTable tbody tr:hover td:last-child {
        background: var(--table-hover, #f8fafc);
    }

    /* ===== Action icon button (view) ===== */
    .pl-actions { display: inline-flex; align-items: center; justify-content: center; gap: 6px; }
    .pl-act {
        width: 30px; height: 30px; border: none; border-radius: 8px;
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 15px; cursor: pointer;
        transition: transform .15s ease, box-shadow .15s ease, filter .15s ease;
    }
    .pl-act:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(15, 23, 42, .14); filter: brightness(.96); }
    .pl-act-view   { background: #e8f1fe; color: #2563eb; }

    /* ===== Add Packing List modal layout ===== */
    .pl-addr-block {
        margin-top: 14px; padding: 14px; border: 1px dashed var(--border-soft);
        border-radius: 12px; background: #fbfcfd;
    }
    .pl-addr-head { position: relative; }
    .pl-addr-edit {
        position: absolute; top: -2px; left: 0;
        width: 26px; height: 26px; border: none; border-radius: 7px;
        background: #e8f1fe; color: #2563eb; font-size: 13px; cursor: pointer;
        display: inline-flex; align-items: center; justify-content: center;
    }
    .pl-addr-edit:hover { background: #2563eb; color: #fff; }
    .pl-addr-cols { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; padding-top: 32px; }
    .pl-addr-title { font-size: 12px; font-weight: 700; color: #475569; }
    .pl-addr-text { font-size: 12.5px; color: #94a3b8; line-height: 1.6; margin-top: 4px; }

    .pl-no-group { display: flex; align-items: stretch; }
    .pl-no-prefix {
        display: inline-flex; align-items: center; padding: 0 14px;
        background: #f1f5f9; border: 1px solid var(--border-soft); border-right: none;
        border-radius: 8px 0 0 8px; font-size: 13px; font-weight: 700; color: #475569;
    }
    .pl-no-group .form-control { border-radius: 0 8px 8px 0; }
    .pl-readonly { background: #eef2f7 !important; color: #64748b; }

    /* Items table + totals */
    .pl-items-table { width: 100%; border-collapse: collapse; font-size: 12.5px; }
    .pl-items-table th {
        background: var(--table-th, #f1f5f9); color: var(--table-black, #0f172a);
        font-size: 11.5px; font-weight: 700; text-transform: uppercase; letter-spacing: .04em;
        padding: 10px 12px; text-align: left; border-bottom: 2px solid var(--border-soft);
        white-space: nowrap;
    }
    .pl-items-table td {
        padding: 16px 12px; border-bottom: 1px solid var(--border-soft); color: #94a3b8;
        vertical-align: middle;
    }

    /* Static sample item rows (voucher / customer select panna show aagum) */
    .pl-item-cell { display: flex; align-items: center; gap: 8px; min-width: 300px; }
    .pl-item-grip { color: #cbd5e1; font-size: 14px; cursor: grab; flex-shrink: 0; }
    .pl-item-chip {
        display: inline-flex; align-items: center; gap: 8px;
        background: #eef4ff; border: 1px dashed #bcd0f5; color: #1f2937;
        border-radius: 8px; padding: 7px 10px; font-size: 12px; font-weight: 600;
        line-height: 1.35;
    }
    .pl-item-chip .pl-item-edit { color: #2563eb; font-size: 12px; cursor: pointer; flex-shrink: 0; }
    .pl-item-unit { display: block; font-size: 11px; color: #2563eb; margin-top: 4px; font-weight: 600; }
    .pl-item-num { width: 110px; }
    .pl-item-tax { min-width: 120px; }
    .pl-item-disc { max-width: 130px; }
    .pl-item-money { color: #94a3b8; font-weight: 600; white-space: nowrap; }
    .pl-item-del {
        width: 32px; height: 32px; border: none; border-radius: 8px;
        background: #ef4444; color: #fff; font-size: 15px; cursor: pointer;
        display: inline-flex; align-items: center; justify-content: center;
        transition: background .15s ease;
    }
    .pl-item-del:hover { background: #dc2626; }
    .pl-totals { margin-top: 14px; margin-left: auto; width: 340px; max-width: 100%; }
    .pl-total-row {
        display: flex; align-items: center; justify-content: space-between; gap: 14px;
        padding: 7px 0; font-size: 13px;
    }
    .pl-total-row .pl-total-label { color: #475569; font-weight: 600; }
    .pl-total-row .pl-total-val { font-weight: 700; color: #0f172a; }
    .pl-total-row input {
        width: 130px; padding: 4px 10px; font-size: 13px;
        border: 1px solid var(--border-soft); border-radius: 7px;
    }
    .pl-total-final .pl-total-val { color: var(--primary-dark, #0ca308); font-size: 14.5px; }

    /* Address modal */
    .pl-addr-sep { display: flex; justify-content: flex-end; margin: 14px 0 4px; }
    .pl-addr-avatar {
        width: 30px; height: 30px; border-radius: 8px; background: #e8f1fe; color: #2563eb;
        display: inline-flex; align-items: center; justify-content: center; font-size: 15px;
    }

    /* ===== View modal (fullscreen - image flow, namba design) ===== */
    .vw-addr-ico-lg {
        width: 38px; height: 38px; border-radius: 10px;
        background: var(--primary-light, #e8f7ea); color: var(--primary-dark, #0ca308);
        display: inline-flex; align-items: center; justify-content: center; font-size: 18px;
    }
    .vw-summary {
        background: #fbfcfd; border: 1px dashed var(--border-soft);
        border-radius: 12px; padding: 16px 18px; margin-bottom: 22px;
    }
    .vw-sum-label {
        display: block; font-size: 11.5px; font-weight: 700; text-transform: uppercase;
        letter-spacing: .04em; color: var(--ink-500, #7a7f8c); margin-bottom: 4px;
    }
    .vw-sum-val { font-size: 14px; font-weight: 700; color: var(--ink-900, #0f172a); word-break: break-word; }
    .vw-addr-grid {
        display: grid; grid-template-columns: 1fr auto 1fr; gap: 18px; align-items: stretch;
    }
    .vw-addr-card {
        border: 1px solid var(--border-soft); border-radius: 14px; background: #fff;
        overflow: hidden; box-shadow: 0 2px 10px rgba(20, 20, 43, .04);
        display: flex; flex-direction: column;
    }
    .vw-addr-card-head {
        display: flex; align-items: center; gap: 10px; padding: 12px 16px;
        background: var(--table-th, #f1f5f9); border-bottom: 1px solid var(--border-soft);
    }
    .vw-addr-ico {
        width: 30px; height: 30px; border-radius: 8px;
        background: var(--primary-light, #e8f7ea); color: var(--primary-dark, #0ca308);
        display: inline-flex; align-items: center; justify-content: center; font-size: 15px;
    }
    .vw-addr-title { font-size: 13.5px; font-weight: 800; color: var(--ink-900, #0f172a); }
    .vw-addr-card-body { padding: 16px; }
    .vw-addr-card-body .form-label { font-size: 12px; font-weight: 700; color: #475569; margin-bottom: 5px; }
    .vw-addr-card-body .form-control,
    .vw-addr-card-body .form-select { border-radius: 10px; font-size: 13px; }
    .vw-sep { display: flex; align-items: center; justify-content: center; }
    .vw-sep-rail { display: flex; flex-direction: column; align-items: center; gap: 10px; height: 100%; }
    .vw-sep-avatar {
        width: 36px; height: 36px; border-radius: 50%; background: #e8f1fe; color: #2563eb;
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 16px; flex-shrink: 0; box-shadow: 0 0 0 4px #fff;
    }
    .vw-sep-line {
        flex: 1; width: 2px; min-height: 60px;
        background: repeating-linear-gradient(to bottom, var(--border-soft) 0 6px, transparent 6px 12px);
    }
    @media (max-width: 767.98px) {
        .vw-addr-grid { grid-template-columns: 1fr; }
        .vw-sep-rail { flex-direction: row; width: 100%; }
        .vw-sep-line {
            min-height: 0; height: 2px; width: auto;
            background: repeating-linear-gradient(to right, var(--border-soft) 0 6px, transparent 6px 12px);
        }
    }

    /* ===== View modal: tabs (image flow, namba design) ===== */
    .vw-tabs {
        display: flex; align-items: center; gap: 4px;
        border-bottom: 1px solid var(--border-soft); margin-bottom: 22px;
    }
    .vw-tab {
        border: none; background: none; padding: 10px 16px;
        font-size: 13.5px; font-weight: 700; color: var(--ink-500, #7a7f8c);
        border-bottom: 2px solid transparent; cursor: pointer;
        display: inline-flex; align-items: center; gap: 7px;
        transition: color .15s ease, border-color .15s ease;
    }
    .vw-tab:hover { color: var(--primary-dark, #0ca308); }
    .vw-tab.active {
        color: var(--primary-dark, #0ca308); border-bottom-color: var(--primary, #0ca308);
    }

    /* Doc header (packing list detail) */
    .vw-doc-title { font-size: 19px; font-weight: 800; color: var(--ink-900, #0f172a); word-break: break-word; }
    .vw-doc-org { font-size: 14px; font-weight: 800; color: #0f172a; margin-top: 8px; }
    .vw-doc-addr { font-size: 13px; color: var(--ink-500, #7a7f8c); line-height: 1.75; margin-top: 8px; }
    .vw-doc-voucher { font-size: 13.5px; font-weight: 700; color: #334155; margin-top: 14px; }
    .vw-doc-voucher a { color: var(--primary-dark, #0ca308); font-weight: 800; text-decoration: none; }
    .vw-doc-voucher a:hover { text-decoration: underline; }
    .vw-doc-right { text-align: right; font-size: 13px; color: var(--ink-500, #7a7f8c); }
    .vw-doc-right .vw-doc-k { display: block; margin-top: 14px; font-weight: 600; }
    .vw-doc-right a { color: #2563eb; font-weight: 700; text-decoration: none; }
    .vw-doc-right a:hover { text-decoration: underline; }
    .vw-doc-date { font-weight: 700; color: #334155; }

    /* Detail items table */
    .vw-items { width: 100%; border-collapse: collapse; font-size: 13px; }
    .vw-items th {
        background: var(--table-th, #f1f5f9); color: var(--table-black, #0f172a);
        font-size: 11.5px; font-weight: 800; text-transform: uppercase; letter-spacing: .04em;
        padding: 10px 14px; text-align: left; white-space: nowrap;
        border-bottom: 1px solid var(--border-soft);
    }
    .vw-items td {
        padding: 14px; border-bottom: 1px solid var(--border-soft);
        color: #334155; font-weight: 600; vertical-align: middle;
    }
    .vw-items .num { text-align: right; }

    .vw-totals { margin-left: auto; width: 360px; max-width: 100%; margin-top: 16px; }
    .vw-total-row {
        display: flex; justify-content: space-between; gap: 14px;
        padding: 9px 14px; font-size: 13.5px;
        border-bottom: 1px solid var(--border-soft);
    }
    .vw-total-row .k { color: #475569; font-weight: 600; }
    .vw-total-row .v { font-weight: 800; color: #0f172a; }
    .vw-total-row.final .v { color: var(--primary-dark, #0ca308); font-size: 15px; }

    /* Shipping log */
    .vw-log-item {
        position: relative; border: 1px solid var(--border-soft); border-radius: 12px;
        padding: 14px 16px; background: #fbfcfd; margin-bottom: 14px;
    }
    .vw-log-meta {
        display: flex; align-items: center; gap: 8px;
        font-size: 11px; font-weight: 800; letter-spacing: .05em;
        text-transform: uppercase; color: var(--ink-500, #7a7f8c);
    }
    .vw-log-dot {
        width: 10px; height: 10px; border: 2px solid #94a3b8;
        border-radius: 50%; display: inline-block; box-sizing: border-box;
    }
    .vw-log-user {
        display: flex; align-items: center; gap: 8px;
        margin-top: 10px; font-size: 13px; font-weight: 700; color: #0f172a;
    }
    .vw-log-avatar {
        width: 24px; height: 24px; border-radius: 50%; background: #7c3aed; color: #fff;
        font-size: 10.5px; font-weight: 800; display: inline-flex; align-items: center;
        justify-content: center; flex-shrink: 0;
    }
    .vw-log-text { font-size: 13px; color: #475569; margin-top: 6px; line-height: 1.6; }
    .vw-log-del {
        position: absolute; top: 12px; right: 12px; border: none; background: none;
        color: #ef4444; font-size: 16px; line-height: 1; cursor: pointer;
    }
    .vw-log-del:hover { color: #dc2626; }
</style>

<main class="packing-page">
    <!-- Page header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-1 page-title">Packing List Management</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap overflow-auto breadcrumb-text">
                <i class="bi bi-inbox fs-6"></i><span>Warehouse</span><i class="bi bi-chevron-right"></i><span class="fw-bold text-dark">Packing List Management</span>
            </nav>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <button type="button" class="btn btn-primary px-3 py-2" id="btnAddPacking"><i class="bi bi-plus-lg me-1"></i>Add</button>
        </div>
    </div>

    <!-- Filters card -->
    <div class="card-custom mb-3 filters-card">
        <div class="filters-toggle-row">
            <span class="fw-semibold" style="font-size:14.5px;color:var(--ink-900);"><i class="bi bi-funnel me-1"></i> Filter Packing Lists</span>
            <button type="button" class="filters-toggle-btn open" id="plFiltersToggle"><span>Hide Filters</span><i class="bi bi-chevron-down chevron"></i></button>
        </div>
        <div class="filters-collapse open" id="plFiltersCollapse">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label" for="f_from">From date</label>
                    <input type="date" class="form-control" id="f_from" value="2026-09-21">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label" for="f_to">To date</label>
                    <input type="date" class="form-control" id="f_to" value="2026-10-06">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label" for="f_staff">Staff</label>
                    <select class="form-select select2" id="f_staff" data-placeholder="Non selected">
                        <option value="">Non selected</option><?php $plOpts($plStaff); ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label" for="f_voucher">Inventory delivery voucher</label>
                    <select class="form-select select2" id="f_voucher" data-placeholder="Non selected">
                        <option value="">Non selected</option><?php $plOpts($plVouchers); ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="form-label" for="f_status">Status</label>
                    <select class="form-select select2" id="f_status" multiple data-placeholder="All Status">
                        <?php $plOpts($plStatuses); ?>
                    </select>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="d-flex gap-2 w-100 h-100 align-items-end">
                        <button type="button" class="btn btn-reject flex-fill w-100" id="plClear">Clear Filters</button>
                        <button type="button" class="btn btn-primary w-100 flex-fill" id="plApply"><i class="bi bi-funnel me-1"></i>Apply Filters</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active filter chips -->
    <div class="leave-active-bar" id="plActiveBar" hidden>
        <span class="leave-active-label"><i class="bi bi-funnel-fill me-1"></i>Active Filters:</span>
        <div id="plActiveList" class="d-flex flex-wrap gap-2"></div>
        <button type="button" class="leave-active-clear" id="plActiveClear">Clear All</button>
    </div>

    <!-- Table card (toolbar + footer auto-created by master-table.js) -->
    <div class="card-custom p-0" id="packingTableWrap">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100" id="packingTable">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Packing list number</th>
                        <th>Customer name</th>
                        <th>Dimension</th>
                        <th>Volume(m3)</th>
                        <th>Total amount</th>
                        <th>Discount total</th>
                        <th>Total after discount</th>
                        <th>Status</th>
                        <th>Delivery status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="packingTbody"></tbody>
            </table>
        </div>
    </div>
</main>

<!-- Add Packing List Modal (static) -->
<div class="modal fade" id="packingModal" tabindex="-1" aria-labelledby="packingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="packingModalLabel">Add Packing List</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="packingForm" onsubmit="return false;" autocomplete="off">
                    <div class="row g-3">
                        <!-- LEFT COLUMN -->
                        <div class="col-lg-6">
                            <label class="form-label" for="pl_voucher">* Inventory delivery voucher</label>
                            <select class="form-select select2" id="pl_voucher" data-placeholder="Non selected">
                                <option value="">Non selected</option><?php $plOpts($plVouchers); ?>
                            </select>

                            <label class="form-label mt-3" for="pl_customer">* Customer</label>
                            <select class="form-select select2" id="pl_customer" data-placeholder="Non selected">
                                <option value="">Non selected</option><?php $plOpts($plCustomers); ?>
                            </select>

                            <!-- Bill To / Ship to (edit icon -> address modal) -->
                            <div class="pl-addr-block">
                                <div class="pl-addr-head">
                                    <button type="button" class="pl-addr-edit" id="btnEditAddress" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit address"><i class="bi bi-pencil"></i></button>
                                    <div class="pl-addr-cols">
                                        <div>
                                            <div class="pl-addr-title">Bill To</div>
                                            <div class="pl-addr-text" id="billToText">--<br>--, --<br>--, --</div>
                                        </div>
                                        <div>
                                            <div class="pl-addr-title">Ship to</div>
                                            <div class="pl-addr-text" id="shipToText">--<br>--, --<br>--, --</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <label class="form-label mt-3" for="pl_no">Packing list number</label>
                            <div class="pl-no-group">
                                <span class="pl-no-prefix" id="plNoPrefix">PL4</span>
                                <input type="text" class="form-control" id="pl_no" value="PACKING_LIST202610071015">
                            </div>
                        </div>

                        <!-- RIGHT COLUMN -->
                        <div class="col-lg-6">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="pl_w">Width(m)</label>
                                    <input type="number" class="form-control" id="pl_w" min="0" step="0.01" value="0">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="pl_h">Height(m)</label>
                                    <input type="number" class="form-control" id="pl_h" min="0" step="0.01" value="0">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="pl_l">Leng(m)</label>
                                    <input type="number" class="form-control" id="pl_l" min="0" step="0.01" value="0">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="pl_kg">Weight(kg)</label>
                                    <input type="number" class="form-control" id="pl_kg" min="0" step="0.01" value="0">
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="pl_vol">Volume(m3)</label>
                                    <input type="text" class="form-control pl-readonly" id="pl_vol" value="0" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="pl_cnote">Client note</label>
                                    <textarea class="form-control" id="pl_cnote" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- ITEMS TABLE + TOTALS -->
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="pl-items-table" id="plItemsTable">
                                    <thead>
                                        <tr>
                                            <th>&#128205; Item</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Tax</th>
                                            <th>Subtotal</th>
                                            <th>Discount</th>
                                            <th>Discount(money)</th>
                                            <th>Total payment</th>
                                            <th class="text-end"><i class="bi bi-gear"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody id="plItemsTbody">
                                        <tr><td colspan="9" class="text-center text-muted py-4">No items added</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="pl-totals">
                                <div class="pl-total-row"><span class="pl-total-label">Subtotal :</span><span class="pl-total-val" id="plSubtotal">&#8377; 0.00</span></div>
                                <div class="pl-total-row"><span class="pl-total-label">Additional discount :</span><input type="number" id="plAddDiscount" value="0" min="0" step="0.01"></div>
                                <div class="pl-total-row"><span class="pl-total-label">Total discount :</span><span class="pl-total-val" id="plTotalDiscount">-&#8377; 0.00</span></div>
                                <div class="pl-total-row"><span class="pl-total-label">Shipping fee :</span><input type="number" id="plShipFee" value="0" min="0" step="0.01"></div>
                                <div class="pl-total-row pl-total-final"><span class="pl-total-label">Total payment :</span><span class="pl-total-val" id="plTotalPay">&#8377; 0.00</span></div>
                            </div>
                        </div>

                        <!-- ADMIN NOTE -->
                        <div class="col-12">
                            <label class="form-label" for="pl_anote">Admin note</label>
                            <textarea class="form-control" id="pl_anote" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="btnPackingSave"><i class="mdi mdi-content-save me-1"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Bill To / Ship to Address Modal (static - image 2) -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressModalLabel">Edit Address</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="addressForm" onsubmit="return false;" autocomplete="off">
                    <!-- BILL TO -->
                    <label class="form-label" for="ad_bill_street">Street</label>
                    <textarea class="form-control" id="ad_bill_street" rows="3"></textarea>
                    <label class="form-label mt-3" for="ad_bill_city">City</label>
                    <input type="text" class="form-control" id="ad_bill_city">
                    <label class="form-label mt-3" for="ad_bill_state">State</label>
                    <input type="text" class="form-control" id="ad_bill_state">
                    <label class="form-label mt-3" for="ad_bill_zip">Zip Code</label>
                    <input type="text" class="form-control" id="ad_bill_zip">
                    <label class="form-label mt-3" for="ad_bill_country">Country</label>
                    <select class="form-select select2" id="ad_bill_country" data-placeholder="Non selected">
                        <option value="">Non selected</option><?php $plOpts($plCountries); ?>
                    </select>

                    <!-- separator with person icon -->
                    <div class="pl-addr-sep"><span class="pl-addr-avatar"><i class="bi bi-person"></i></span></div>

                    <!-- SHIP TO -->
                    <label class="form-label" for="ad_ship_street">Street</label>
                    <textarea class="form-control" id="ad_ship_street" rows="3"></textarea>
                    <label class="form-label mt-3" for="ad_ship_city">City</label>
                    <input type="text" class="form-control" id="ad_ship_city">
                    <label class="form-label mt-3" for="ad_ship_state">State</label>
                    <input type="text" class="form-control" id="ad_ship_state">
                    <label class="form-label mt-3" for="ad_ship_zip">Zip Code</label>
                    <input type="text" class="form-control" id="ad_ship_zip">
                    <label class="form-label mt-3" for="ad_ship_country">Country</label>
                    <select class="form-select select2" id="ad_ship_country" data-placeholder="Non selected">
                        <option value="">Non selected</option><?php $plOpts($plCountries); ?>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary px-4" id="btnAddressApply">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- View Packing List Modal (fullscreen - image flow) -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-3">
                    <span class="vw-addr-ico-lg"><i class="bi bi-eye"></i></span>
                    <div>
                        <h5 class="modal-title mb-0" id="viewModalLabel">Packing List Detail</h5>
                        <small class="text-muted" id="vwHeadDate">-</small>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span id="vwStatus"></span>
                    <button type="button" class="btn btn-primary px-3 py-2" id="btnViewPdf"><i class="bi bi-file-earmark-pdf me-1"></i>PDF</button>
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
            </div>
            <div class="modal-body">
                <!-- Tabs: Packing list detail | Shipping Log -->
                <div class="vw-tabs">
                    <button type="button" class="vw-tab active" data-vw-tab="detail"><i class="bi bi-file-earmark-text"></i> Packing list detail</button>
                    <button type="button" class="vw-tab" data-vw-tab="log"><i class="bi bi-clock-history"></i> Shipping Log</button>
                </div>

                <!-- ===== PANE 1: Packing list detail ===== -->
                <div id="vwPaneDetail">
                    <div class="row g-4 mb-4">
                        <div class="col-lg-7">
                            <h4 class="vw-doc-title" id="vwPlNo">-</h4>
                            <div class="vw-doc-org" id="vwOrg">ghrA SOFTWARE TECHNOLOGY PRIVATE LIMITED</div>
                            <div class="vw-doc-addr">
                                PC 20/3, 3rd Block, Mogappair West<br>
                                Chennai - 560086 , Tamil Nadu<br>
                                India<br>
                                9865321470<br>
                                GST Number: 29AABCR7796N000
                            </div>
                            <div class="vw-doc-voucher">Inventory delivery voucher <a href="#" id="vwVoucher">-</a></div>
                        </div>
                        <div class="col-lg-5">
                            <div class="vw-doc-right">
                                <span class="vw-doc-k">Bill To: <a href="#" id="vwBillTo">-</a></span>
                                <span class="vw-doc-k">IN</span>
                                <span class="vw-doc-k">Ship to: <span id="vwShipTo">-</span></span>
                                <span class="vw-doc-k">Packaging Date <span class="vw-doc-date" id="vwDate">-</span></span>
                            </div>
                        </div>
                    </div>

                    <!-- Items table -->
                    <div class="table-responsive">
                        <table class="vw-items">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Commodity Code</th>
                                    <th>Quantity</th>
                                    <th class="num">Rate</th>
                                    <th class="num">Tax</th>
                                    <th class="num">Subtotal</th>
                                    <th class="num">Discount(%)</th>
                                    <th class="num">Discount(money)</th>
                                    <th class="num">Total payment</th>
                                </tr>
                            </thead>
                            <tbody id="vwItemsBody">
                                <tr><td colspan="9" class="text-center text-muted py-4">No items</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Totals -->
                    <div class="vw-totals">
                        <div class="vw-total-row"><span class="k">Subtotal</span><span class="v" id="vwSubtotal">&#8377; 0.00</span></div>
                        <div class="vw-total-row"><span class="k">Total discount</span><span class="v" id="vwTotalDisc">&#8377; 0.00</span></div>
                        <div class="vw-total-row"><span class="k">Shipping fee</span><span class="v" id="vwShipFee">&#8377; 0.00</span></div>
                        <div class="vw-total-row final"><span class="k">Total payment</span><span class="v" id="vwTotalPay">&#8377; 0.00</span></div>
                    </div>
                </div>

                <!-- ===== PANE 2: Shipping Log ===== -->
                <div id="vwPaneLog" hidden>
                    <div id="vwLogList">
                        <div class="vw-log-item">
                            <button type="button" class="vw-log-del" aria-label="Delete">&times;</button>
                            <div class="vw-log-meta"><span class="vw-log-dot"></span> JUST NOW</div>
                            <div class="vw-log-user"><span class="vw-log-avatar">KS</span> gharuda SOFTWARE - Test</div>
                        </div>
                    </div>

                    <label class="form-label mt-2" for="vwLogInput">Shipping Log</label>
                    <textarea class="form-control" id="vwLogInput" rows="4" placeholder="Shipping Log"></textarea>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-primary px-4" id="btnLogSubmit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.PL_DELIVERY = <?= json_encode($plDelivery) ?>;
</script>
<script src="./assets/js/pages/package-list.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>