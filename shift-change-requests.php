<?php include 'header.php'; ?>

 

<!--
    Shift Change Requests — standalone page.
    Previously this content lived inside the fullscreen #scrRequestsModal on
    shift-shedule.php. It is now its own page (the "Shift Requests" button on
    the Shift Schedule header navigates here). Dummy demo data below.
-->

<style>
    /* ===== Scoped: .scr- (Shift Change Requests) ===== */
    .scr-page {
        padding-bottom: 24px;
    }

    /* main card */
    .scr-card {
        background: #fff;
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 18px rgba(20, 20, 43, .05);
    }

    .scr-card-head {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        padding: 16px 20px;
        border-bottom: 1px solid var(--border-soft, #eaeef0);
    }

    .scr-card-head .scr-card-title {
        font-size: 15px;
        font-weight: 800;
        color: var(--ink-900);
        margin: 0;
    }

    .scr-card-head .scr-card-sub {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--ink-500, #6b7684);
    }

    .scr-status-tabs { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; padding: 14px 18px; border-bottom: 1px solid var(--border-soft, #eaeef0); }
    .scr-status-tab { display: inline-flex; align-items: center; gap: 8px; padding: 8px 12px; border: 1px solid #e7ebef; border-radius: 10px; background: #fff; color: var(--ink-600, #667085); font-size: 11.5px; font-weight: 800; cursor: pointer; transition: .18s ease; }
    .scr-status-tab:hover { border-color: #cbd5d1; background: #f8faf9; }
    .scr-status-tab.active { border-color: #bfe4c5; background: #eff9f0; color: var(--primary-dark, #0f7a38); box-shadow: 0 2px 7px rgba(15, 122, 56, .08); }
    .scr-status-tab .scr-tab-count { display: inline-grid; place-items: center; min-width: 22px; height: 22px; padding: 0 6px; border-radius: 7px; background: #f1f3f5; color: #697586; font-size: 10px; }
    .scr-status-tab.active .scr-tab-count { background: #d9f0dd; color: #0f7a38; }

    /* ===== Employee / Manager view toggle ===== */
    .scr-view-toggle {
        display: inline-flex;
        align-items: center;
        background: var(--bg-app, #f4f7f6);
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 10px;
        padding: 3px;
        gap: 2px;
    }

    .scr-view-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border: none;
        background: transparent;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        color: var(--ink-500, #6b7684);
        cursor: pointer;
        white-space: nowrap;
        transition: all .2s ease;
    }

    .scr-view-btn.active {
        background: #fff;
        color: var(--primary-dark, #0f7a38);
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08);
    }

    /* status pills */
    .scr-status-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 999px;
    }

    .scr-status-pill.pending { background: #fff4e5; color: #b8730a; }
    .scr-status-pill.approved { background: #e8f7ea; color: #0f7a38; }
    .scr-status-pill.rejected { background: #fdecec; color: #d3373c; }
    .scr-status-pill.withdrawn { background: #f1f3f5; color: #7a7f8c; }

    .scr-mini-shift {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-700, #3a4652);
        white-space: nowrap;
    }

    .scr-mini-shift .scr-old { color: var(--ink-500); text-decoration: line-through; }
    .scr-mini-shift .scr-new { color: var(--primary-dark, #0f7a38); font-weight: 700; }

    /* row action buttons */
    .scr-approve-btn, .scr-reject-btn {
        font-size: 11.5px;
        font-weight: 700;
        border-radius: 8px;
        padding: 5px 12px;
        border: none;
        cursor: pointer;
        white-space: nowrap;
    }

    .scr-approve-btn {
        background: var(--primary-soft, #e8f7ea);
        color: var(--primary-dark, #0f7a38);
    }

    .scr-approve-btn:hover { background: #cdefd2; }

    .scr-reject-btn {
        background: #fdecec;
        color: #d3373c;
    }

    .scr-reject-btn:hover { background: #fbd7d7; }

    .scr-view-btn-action {
        font-size: 11.5px;
        font-weight: 700;
        border-radius: 8px;
        padding: 5px 12px;
        border: none;
        cursor: pointer;
        white-space: nowrap;
        background: #eef2ff;
        color: #4f46e5;
    }

    .scr-view-btn-action:hover { background: #dfe4fd; }

    .scr-rejection-eye-btn {
        display: inline-grid;
        place-items: center;
        width: 27px;
        height: 27px;
        margin-top: 5px;
        border: 1px solid #f2c7c8;
        border-radius: 8px;
        background: #fff7f7;
        color: #d3373c;
        cursor: pointer;
        transition: background .15s ease, transform .15s ease;
    }

    .scr-rejection-eye-btn:hover { background: #fdecec; transform: translateY(-1px); }

    /* table wrapper (page version, no margins) */
    .scr-requests-table-wrap {
        background: #fff;
        overflow: hidden;
    }

    /* ===== Reject / View-rejection modal bits ===== */
    .scr-reject-emp-line {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-700, #3a4652);
        background: #f8fafb;
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 10px;
        padding: 9px 12px;
    }

    .scr-rejection-summary {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8fafb;
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 12px;
        padding: 10px 12px;
    }

    .scr-rejection-summary img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .scr-rejection-summary .scr-emp-name {
        font-size: 13.5px;
        font-weight: 700;
        color: var(--ink-900);
        line-height: 1.2;
    }

    .scr-rejection-summary .scr-emp-meta {
        font-size: 11.5px;
        color: var(--ink-500);
        font-weight: 600;
    }

    .scr-rejection-summary .scr-day-chip {
        margin-left: auto;
        text-align: right;
    }

    .scr-rejection-summary .scr-day-chip .scr-date {
        font-size: 11px;
        color: var(--ink-500);
        font-weight: 600;
    }

    .scr-shift-compare {
        display: flex;
        align-items: stretch;
        gap: 10px;
    }

    .scr-shift-box {
        flex: 1;
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 12px;
        padding: 10px 12px;
        background: #fff;
        min-width: 0;
    }

    .scr-shift-box.current {
        background: #f8fafb;
    }

    .scr-shift-box .scr-box-label {
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: .4px;
        text-transform: uppercase;
        color: var(--ink-500);
        margin-bottom: 4px;
    }

    .scr-shift-box .scr-box-name {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-900);
        line-height: 1.3;
        word-break: break-word;
    }

    .scr-arrow {
        display: flex;
        align-items: center;
        color: var(--primary, #0ca308);
        font-size: 18px;
    }

    .scr-rejection-reason-box {
        background: #fdecec;
        border: 1px solid #f6c8c9;
        border-radius: 12px;
        padding: 12px 14px;
    }

    .scr-rejection-reason-box .scr-box-label {
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: .4px;
        text-transform: uppercase;
        color: #d3373c;
        margin-bottom: 5px;
    }

    .scr-rejection-reason-box .scr-box-text {
        font-size: 13px;
        font-weight: 600;
        color: #7a1f22;
        line-height: 1.4;
    }

    .scr-manager-card {
        display: flex;
        align-items: center;
        gap: 10px;
        border: 1px dashed var(--primary, #0ca308);
        background: var(--primary-soft, #e8f7ea);
        border-radius: 12px;
        padding: 10px 12px;
    }

    .scr-manager-card img {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        object-fit: cover;
    }

    .scr-manager-card .scr-mgr-name {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-900);
        line-height: 1.2;
    }

    .scr-manager-card .scr-mgr-role {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--primary-dark, #0f7a38);
    }

    .scr-manager-card .scr-mgr-tag {
        margin-left: auto;
        font-size: 10.5px;
        font-weight: 700;
        background: #fff;
        color: var(--primary-dark, #0f7a38);
        border-radius: 999px;
        padding: 4px 10px;
        white-space: nowrap;
    }

    /* small toast */
    .scr-toast-wrap {
        position: fixed;
        right: 20px;
        bottom: 20px;
        z-index: 2000;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .scr-toast {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        border: 1px solid var(--border-soft, #eaeef0);
        border-left: 4px solid var(--primary, #0ca308);
        border-radius: 10px;
        padding: 11px 14px;
        box-shadow: 0 8px 24px rgba(20, 20, 43, .14);
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-900);
        max-width: 330px;
        animation: scrToastIn .3s cubic-bezier(.34, 1.3, .64, 1);
    }

    .scr-toast.out { animation: scrToastOut .25s ease forwards; }
    .scr-toast i { color: var(--primary, #0ca308); font-size: 17px; }

    @keyframes scrToastIn {
        from { opacity: 0; transform: translateY(14px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes scrToastOut {
        to { opacity: 0; transform: translateX(20px); }
    }

    /* Shared MasterTable toolbar, pagination and search layout */
    .scr-page { padding-bottom: 32px; }
    .scr-page-header { padding: 4px 0 18px; }
    .scr-page-header h1 { font-size: clamp(1.45rem, 2.5vw, 1.85rem); letter-spacing: -.04em; }
    .scr-card { border-radius: 16px; }
    .scr-card-head { min-height: 76px; }
    .scr-card-head .icon-chip { width: 42px; height: 42px; border-radius: 12px; font-size: 18px; }
    .scr-page .scr-card .table-responsive { border: 0; border-radius: 0 0 16px 16px; }
    .scr-page .scr-card .table-modern { min-width: 1120px; }
    .scr-page .scr-card .table-modern thead th { padding: 13px 15px; font-size: 10.5px; white-space: nowrap; }
    .scr-page .scr-card .table-modern tbody td { padding: 13px 15px; white-space: normal; }
    .scr-page .scr-card .table-modern tbody tr:hover td { background: #f7faf8; }
    .scr-page .scr-card .table-modern tbody td:first-child { color: var(--ink-500); font-weight: 700; }
    .scr-page .mt-search-input { width: min(260px, 70vw); }
    .scr-employee-cell { display: flex; align-items: center; gap: 10px; min-width: 150px; }
    .scr-employee-cell img { width: 34px; height: 34px; border-radius: 50%; object-fit: cover; border: 2px solid #fff; box-shadow: 0 1px 4px rgba(20, 20, 43, .14); }
    .scr-approver-cell { display: flex; align-items: center; gap: 8px; min-width: 125px; font-size: 12px; font-weight: 700; color: var(--ink-700); }
    .scr-approver-cell img { width: 28px; height: 28px; border-radius: 50%; object-fit: cover; }
    .scr-table-primary { color: var(--ink-900); font-size: 12.5px; font-weight: 800; }
    .scr-table-meta { color: var(--ink-500); font-size: 10.5px; font-weight: 600; margin-top: 3px; line-height: 1.4;text-wrap:nowrap; }
    .scr-shift-compare-cell { display: flex; align-items: center; gap: 7px; min-width: 185px; font-size: 11.5px; font-weight: 700; }
    .scr-shift-compare-cell .scr-old { color: var(--ink-500); text-decoration: line-through; }
    .scr-shift-compare-cell .scr-new { color: var(--primary-dark, #0f7a38); }
    .scr-shift-compare-cell i { color: var(--ink-300); }
    .scr-reason-text { min-width: 170px; max-width: 240px; white-space: normal; line-height: 1.45; }
    .scr-row-actions { display: flex; gap: 6px; }
    .scr-row-actions .scr-approve-btn, .scr-row-actions .scr-reject-btn { padding: 7px 10px; font-size: 10.5px; border-radius: 7px; }
    .scr-action-done { display: inline-flex; align-items: center; color: var(--ink-500); font-size: 11px; font-weight: 700; white-space: nowrap; }
    .scr-page .report-footer { border-top: 1px solid var(--border-soft); }
    .scr-manager-change-btn { display: inline-flex; align-items: center; gap: 8px; padding: 9px 14px; border-radius: 10px; font-size: 12px; font-weight: 800; box-shadow: 0 5px 14px rgba(12, 163, 8, .16); }
    .scr-change-modal .modal-content { overflow: hidden; border: 0; border-radius: 18px; box-shadow: 0 24px 70px rgba(15, 23, 42, .22); }
    .scr-change-modal .modal-header { padding: 20px 22px; border-bottom: 1px solid #edf0f2; }
    .scr-change-modal .modal-body { padding: 22px; }
    .scr-change-modal .modal-footer { padding: 14px 22px 20px; border-top: 1px solid #edf0f2; }
    .scr-change-modal .modal-title { font-size: 16px; font-weight: 800; }
    .scr-change-modal .scr-change-intro { color: var(--ink-500); font-size: 12px; margin-top: 3px; }
    .scr-change-modal .form-label { color: var(--ink-700); font-size: 11.5px; font-weight: 800; margin-bottom: 7px; }
    .scr-change-modal .form-select, .scr-change-modal .form-control { min-height: 42px; border-color: #e4e9ed; border-radius: 9px; font-size: 12.5px; }
    .scr-change-modal .form-select:focus, .scr-change-modal .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-soft); }
    .scr-change-modal .select2-container { width: 100% !important; }
    .scr-change-modal .select2-container--default .select2-selection--single { height: 42px; border-color: #e4e9ed; border-radius: 9px; display: flex; align-items: center; }
    .scr-change-modal .select2-container--default .select2-selection--single .select2-selection__rendered { padding-left: 12px; color: var(--ink-700); font-size: 12.5px; line-height: 40px; }
    .scr-change-modal .select2-container--default .select2-selection--single .select2-selection__arrow { height: 40px; right: 7px; }
    .scr-change-modal .select2-container--default.select2-container--open .select2-selection--single,
    .scr-change-modal .select2-container--default.select2-container--focus .select2-selection--single { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-soft); }
    .scr-change-modal .select2-dropdown { z-index: 1065; border-color: #e4e9ed; border-radius: 9px; overflow: hidden; }
    .scr-change-modal .select2-results__option { padding: 9px 12px; font-size: 12px; }
    .scr-change-compare { display: grid; grid-template-columns: 1fr 32px 1fr; align-items: center; gap: 10px; margin: 18px 0; }
    .scr-change-shift-card { min-width: 0; padding: 13px 14px; border: 1px solid #e7ebef; border-radius: 12px; background: #f8fafb; }
    .scr-change-shift-card.next { border-color: #cdebd1; background: linear-gradient(135deg, #f2fbf3, #fff); }
    .scr-change-shift-card .scr-change-label { color: var(--ink-500); font-size: 9.5px; font-weight: 800; letter-spacing: .07em; text-transform: uppercase; margin-bottom: 6px; }
    .scr-change-shift-card .scr-change-name { color: var(--ink-900); font-size: 13px; font-weight: 800; line-height: 1.3; }
    .scr-change-shift-card.next .scr-change-name { color: var(--primary-dark); }
    .scr-change-shift-card .scr-change-time { color: var(--ink-500); font-size: 10.5px; font-weight: 600; margin-top: 4px; }
    .scr-change-arrow { display: grid; place-items: center; width: 30px; height: 30px; border-radius: 50%; color: var(--primary-dark); background: var(--primary-soft); }
    .scr-change-duration { display: grid; grid-template-columns: 1fr 1fr; gap: 9px; }
    .scr-change-duration-option { position: relative; display: flex; align-items: center; gap: 9px; min-height: 46px; padding: 9px 11px; border: 1px solid #e4e9ed; border-radius: 10px; cursor: pointer; font-size: 11.5px; font-weight: 700; color: var(--ink-700); }
    .scr-change-duration-option:has(input:checked) { border-color: var(--primary); background: var(--primary-soft); color: var(--primary-dark); }
    .scr-change-duration-option input { accent-color: var(--primary); }
    .scr-change-demo-note { display: flex; gap: 8px; padding: 10px 12px; border-radius: 9px; background: #f5f7ff; color: #5963a8; font-size: 10.5px; line-height: 1.45; }
    .scr-change-error { display: none; color: #c0362c; background: #fff2f1; border: 1px solid #f6d0cd; border-radius: 8px; padding: 8px 10px; font-size: 11px; font-weight: 700; }
    .scr-change-error.show { display: block; }

    @media (max-width: 767.98px) {
        .scr-page-header { padding-bottom: 14px; }
        .scr-card-head { padding: 14px; }
        .scr-status-tabs { gap: 6px; padding: 12px; }
        .scr-status-tab { padding: 7px 9px; font-size: 10.5px; }
        .scr-page .scr-card .table-modern { min-width: 1000px; }
        .scr-page .scr-card .table-modern tbody td { padding: 11px 12px; }
        .scr-change-modal .modal-body { padding: 17px; }
        .scr-change-modal .modal-header, .scr-change-modal .modal-footer { padding-left: 17px; padding-right: 17px; }
        .scr-change-compare { grid-template-columns: 1fr 26px 1fr; gap: 6px; }
        .scr-change-shift-card { padding: 10px; }
    }

    /* ===== Extracted inline styles ===== */
    .scr-th-sno { width: 70px; }
    .scr-th-action { width: 100px; }
    .scr-icon-chip-lg { width: 42px; height: 42px; border-radius: 12px; background: #e8f7ea; color: #0f7a38; display: grid; place-items: center; font-size: 18px; }
    .scr-ic-danger { color: #d3373c; }
    .scr-ic-primary { color: var(--primary-dark); }
    .scr-back-link { font-size: 12.5px; font-weight: 700; border-radius: 10px; padding: 9px 14px; }
    .scr-shift-box.rejected { border-color: #e5484d; background: #fdecec; }
    .scr-shift-box.rejected .scr-box-label { color: #d3373c; }
    .scr-remark-count { font-size: 11px; margin-top: 3px; }
    .scr-btn-danger-flat { background: #e5484d; border-color: #e5484d; }
    .scr-btn-danger-flat:hover, .scr-btn-danger-flat:focus { background: #e5484d; border-color: #e5484d; }
</style>

<div class="scr-page">
    <!-- ===== Page header ===== -->
    <div class="scr-page-header d-flex align-items-start justify-content-between flex-sm-row flex-column gap-3">
        <div class="w-100 overflow-auto">
            <h1 class="font-display fw-bold mb-1">Shift Change Requests</h1>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap text-nowrap">
            <button type="button" class="btn btn-primary scr-manager-change-btn" id="scrOpenManagerShiftChange" data-bs-toggle="modal" data-bs-target="#scrManagerShiftChangeModal">
                <i class="bi bi-arrow-repeat"></i> Change Employee Shift
            </button>
            <!-- <a href="shift-shedule.php" class="btn btn-outline-primary scr-back-link">
                <i class="bi bi-arrow-left me-1"></i> Back to Shift Schedule
            </a> -->
        </div>
    </div>

    <!-- ===== Requests card ===== -->
    <div class="scr-card card-custom p-0">
        <div class="scr-card-head">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-arrow-left-right"></i></div>
                <div>
                    <h5 class="scr-card-title">Shift Change Requests</h5>
                    <div class="scr-card-sub">
                        <span id="scrPendingCount">0</span> <span id="scrCurrentStatusLabel">pending</span> requests
                    </div>
                </div>
            </div>
        </div>

        <nav class="scr-status-tabs" id="scrStatusTabs" aria-label="Filter requests by status">
            <button type="button" class="scr-status-tab active" data-status="Pending" aria-pressed="true"><i class="bi bi-hourglass-split"></i> Pending <span class="scr-tab-count" id="scrTabPendingCount">0</span></button>
            <button type="button" class="scr-status-tab" data-status="Approved" aria-pressed="false"><i class="bi bi-check-circle"></i> Approved <span class="scr-tab-count" id="scrTabApprovedCount">0</span></button>
            <button type="button" class="scr-status-tab" data-status="Rejected" aria-pressed="false"><i class="bi bi-x-circle"></i> Rejected <span class="scr-tab-count" id="scrTabRejectedCount">0</span></button>
            <button type="button" class="scr-status-tab" data-status="Withdrawn" aria-pressed="false"><i class="bi bi-slash-circle"></i> Withdrawn <span class="scr-tab-count" id="scrTabWithdrawnCount">0</span></button>
        </nav>

        <div class="scr-requests-table-wrap table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="scrRequestsTable" data-table-name="Shift Change Requests">
                <thead>
                    <tr>
                        <th class="scr-th-sno">S.No</th>
                        <th>Request Date</th>
                        <th>Employee</th>
                        <th>Day</th>
                        <th>Shift Change</th>
                        <th>Reason</th>
                        <th>Approver</th>
                        <th>Status</th>
                        <th class="scr-th-action">Action</th>
                    </tr>
                </thead>
                <tbody id="scrRequestsBody"></tbody>
            </table>
        </div>
    </div>
</div>

<!-- ===== Manager direct shift reassignment ===== -->
<div class="modal fade scr-change-modal" id="scrManagerShiftChangeModal" tabindex="-1" aria-labelledby="scrManagerShiftChangeTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-chip scr-icon-chip-lg"><i class="bi bi-arrow-left-right"></i></div>
                    <div>
                        <h5 class="modal-title" id="scrManagerShiftChangeTitle">Change Employee Shift</h5>
                        <div class="scr-change-intro">Select an employee and assign a different shift.</div>
                    </div>
                </div>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="scrManagerEmployee">Employee</label>
                    <select class="form-select" id="scrManagerEmployee">
                        <option value="">Select employee</option>
                    </select>
                </div>

                <div class="scr-change-compare" aria-live="polite">
                    <div class="scr-change-shift-card">
                        <div class="scr-change-label">Current shift</div>
                        <div class="scr-change-name" id="scrManagerCurrentShift">Select employee</div>
                        <div class="scr-change-time" id="scrManagerCurrentTime">Current assignment</div>
                    </div>
                    <div class="scr-change-arrow"><i class="bi bi-arrow-right"></i></div>
                    <div class="scr-change-shift-card next">
                        <div class="scr-change-label">New shift</div>
                        <div class="scr-change-name" id="scrManagerNewShiftPreview">Select shift</div>
                        <div class="scr-change-time" id="scrManagerNewTimePreview">Choose a shift below</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="scrManagerNewShift">Assign new shift</label>
                    <select class="form-select" id="scrManagerNewShift">
                        <option value="">Select a different shift</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Change duration</label>
                    <div class="scr-change-duration">
                        <label class="scr-change-duration-option"><input type="radio" name="scrManagerDuration" value="permanent" checked> Permanent</label>
                        <label class="scr-change-duration-option"><input type="radio" name="scrManagerDuration" value="range"> Date range</label>
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label" for="scrManagerEffectiveFrom">Effective from</label>
                        <input type="date" class="form-control" id="scrManagerEffectiveFrom">
                    </div>
                    <div class="col-6" id="scrManagerEffectiveToWrap" hidden>
                        <label class="form-label" for="scrManagerEffectiveTo">Effective to</label>
                        <input type="date" class="form-control" id="scrManagerEffectiveTo">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="scrManagerShiftRemarks">Remarks <span class="text-muted fw-normal">(optional)</span></label>
                    <textarea class="form-control" id="scrManagerShiftRemarks" rows="2" placeholder="Add a note for this shift change"></textarea>
                </div>

                <div class="scr-change-error mb-3" id="scrManagerShiftError" role="alert"></div>
                <div class="scr-change-demo-note"><i class="bi bi-info-circle-fill"></i><span>Demo mode: this assignment is held in this page only. Connect the save action to the shift schedule backend to persist it.</span></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="scrManagerShiftSave"><i class="bi bi-check2-circle me-1"></i>Apply Shift</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== View Rejection Modal (Employee View) ===== -->
<div class="modal fade" id="scrViewRejectionModal" tabindex="-1" aria-labelledby="scrViewRejectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrViewRejectionModalLabel">
                    <i class="bi bi-x-circle me-1 scr-ic-danger"></i> Request Rejected
                </h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div class="scr-rejection-summary mb-3">
                    <img id="scrViewRejEmpAvatar" src="./assets/img/profile-1.jpg" alt="">
                    <div class="min-w-0">
                        <div class="scr-emp-name" id="scrViewRejEmpName">-</div>
                        <div class="scr-emp-meta" id="scrViewRejMeta">-</div>
                    </div>
                    <div class="scr-day-chip">
                        <div class="scr-date" id="scrViewRejDate">-</div>
                    </div>
                </div>

                <div class="scr-shift-compare mb-3">
                    <div class="scr-shift-box current">
                        <div class="scr-box-label">Current Shift</div>
                        <div class="scr-box-name" id="scrViewRejFromShift">-</div>
                    </div>
                    <div class="scr-arrow"><i class="bi bi-arrow-right"></i></div>
                    <div class="scr-shift-box rejected">
                        <div class="scr-box-label">Requested Shift</div>
                        <div class="scr-box-name" id="scrViewRejToShift">-</div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="scr-rejection-reason-box">
                        <div class="scr-box-label"><i class="bi bi-chat-left-text me-1"></i>Reason from Manager</div>
                        <div class="scr-box-text" id="scrViewRejReasonText">No reason provided.</div>
                    </div>
                </div>

                <div class="scr-manager-card">
                    <img id="scrViewRejMgrAvatar" src="./assets/img/profile-3.jpg" alt="">
                    <div>
                        <div class="scr-mgr-name" id="scrViewRejMgrName">-</div>
                        <div class="scr-mgr-role" id="scrViewRejMgrWhen">-</div>
                    </div>
                    <span class="scr-mgr-tag"><i class="bi bi-x-circle me-1"></i>Rejected</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <i class="bi bi-check-lg me-1"></i> OK
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Reject Reason Modal (Manager View) ===== -->
<div class="modal fade" id="scrRejectModal" tabindex="-1" aria-labelledby="scrRejectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrRejectModalLabel">
                    <i class="bi bi-x-circle me-1 scr-ic-danger"></i> Reject Shift Change Request
                </h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div class="scr-reject-emp-line mb-3" id="scrRejectEmpLine">-</div>
                <div class="mb-1">
                    <label class="form-label" for="scr_reject_reason">Reason for rejection <span class="text-muted">(optional, visible to the employee)</span></label>
                    <textarea class="form-control" id="scr_reject_reason" rows="3" maxlength="200" placeholder="e.g. No coverage for that shift, please wait some time"></textarea>
                    <div class="text-muted text-end scr-remark-count"><span id="scrRejectRemarkCount">0</span>/200</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger scr-btn-danger-flat" id="scrRejectConfirmBtn">
                    <i class="bi bi-x-lg me-1"></i> Confirm Reject
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="scr-toast-wrap" id="scrToastWrap"></div>

<script src="./assets/js/pages/shift-change-requests.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
