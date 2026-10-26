<?php include 'header.php'; ?>

 

<style>
    /* ===== Page ===== */
    .page-title {
        font-size: 1.7rem;
    }

    .breadcrumb-nav {
        font-size: 13px;
    }

    .payslip-topbar {
        position: sticky;
        top: 0;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 10px 12px;
        background: #fff;
        border: 1px solid #dfe5eb;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, .06);
        max-width: 860px;
        margin: 0 auto 18px;
    }

    .payslip-btn {
        padding: 8px 14px;
        border-radius: 8px;
        border: none;
        font-weight: 700;
        font-size: 12px;
        cursor: pointer;
    }

    .payslip-btn-primary {
        background: #0d7a42;
        color: #fff;
    }

    .payslip-btn-light {
        background: #f4f6f8;
        border: 1px solid #dfe5eb;
        color: #1d1d1d;
    }

    .payslip-sheet {
        width: 100%;
        max-width: 860px;
        margin: 0 auto;
        background: #fff;
        border: 1px solid #dfe5eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(15, 23, 42, .08);
    }

    .payslip-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 22px;
        border-bottom: 1px solid #dfe5eb;
        background: #f7f9fb;
    }

    .payslip-brand {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .payslip-brand-mark {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #dff5e7;
        color: #0d7a42;
        font-size: 24px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .payslip-company-name {
        font-size: 14px;
        font-weight: 800;
        letter-spacing: .2px;
        color: #1d1d1d;
    }

    .payslip-company-address {
        font-size: 10px;
        color: #5d6570;
        margin-top: 2px;
        max-width: 410px;
        line-height: 1.5;
    }

    .payslip-header-side {
        text-align: right;
    }

    .payslip-header-label {
        font-size: 11px;
        color: #5d6570;
        font-weight: 700;
    }

    .payslip-header-month {
        font-size: 18px;
        font-weight: 800;
        color: #1d1d1d;
        margin-top: 2px;
    }

    .payslip-summary {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 18px 22px;
        border-bottom: 1px solid #dfe5eb;
        background: #fff;
    }

    .payslip-summary-left {
        flex: 1;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px 18px;
    }

    .payslip-summary-title {
        grid-column: 1 / -1;
        font-size: 12px;
        font-weight: 800;
        color: #1d1d1d;
        letter-spacing: .5px;
        margin-bottom: 4px;
    }

    .payslip-summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 8px 0;
        border-bottom: 1px dashed #ebeff3;
    }

    .payslip-summary-row span {
        font-size: 12px;
        color: #5d6570;
        font-weight: 600;
    }

    .payslip-summary-row strong {
        font-size: 12px;
        color: #111827;
        font-weight: 800;
    }

    .payslip-summary-right {
        display: flex;
        align-items: stretch;
        justify-content: flex-end;
    }

    .payslip-amount-box {
        background: #f2fbf4;
        border: 1px solid #d7ebdc;
        border-radius: 12px;
        padding: 14px 18px;
        min-width: 220px;
    }

    .payslip-amount {
        font-size: 18px;
        font-weight: 900;
        color: #0d7a42;
        text-align: right;
    }

    .payslip-amount-label {
        font-size: 12px;
        color: #5d6570;
        text-align: right;
        margin-top: 4px;
        font-weight: 700;
    }

    .payslip-sub-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
        padding-top: 8px;
        border-top: 1px solid #dceee0;
        font-size: 12px;
        font-weight: 700;
        color: #2b2f34;
    }

    .payslip-sub-row strong {
        color: #1d1d1d;
    }

    .payslip-table-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        border-bottom: 1px solid #dfe5eb;
    }

    .payslip-col {
        padding: 0;
        border-right: 1px solid #dfe5eb;
    }

    .payslip-col:last-child {
        border-right: none;
    }

    .payslip-col-title {
        font-size: 12px;
        font-weight: 800;
        padding: 12px 16px;
        background: #f7f9fb;
        border-bottom: 1px solid #dfe5eb;
        color: #1d1d1d;
        letter-spacing: .4px;
    }

    .payslip-row {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        padding: 8px 16px;
        border-bottom: 1px solid #f2f4f7;
        font-size: 12px;
    }

    .payslip-row:last-child {
        border-bottom: none;
    }

    .payslip-row span {
        color: #49515a;
        font-weight: 600;
    }

    .payslip-row strong {
        font-weight: 800;
        color: #111827;
    }

    .payslip-row.p-total {
        background: #fcfdfd;
        font-weight: 800;
        border-top: 1px solid #dfe5eb;
    }

    .payslip-row.p-total span {
        color: #1b1d1f;
    }

    .payslip-row.p-total strong {
        color: #0d7a42;
    }

    .payslip-net-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 16px;
        background: #dff5e7;
        font-weight: 800;
        color: #1d1d1d;
        border-bottom: 1px solid #dfe5eb;
    }

    .payslip-net-total span {
        font-size: 12px;
        letter-spacing: .5px;
    }

    .payslip-net-total strong {
        font-size: 18px;
        color: #0d7a42;
    }

    .payslip-words {
        padding: 14px 16px;
        border-bottom: 1px solid #dfe5eb;
        font-size: 12px;
        color: #4b5563;
    }

    .payslip-words em {
        font-style: normal;
        color: #1d1d1d;
        font-weight: 700;
    }

    .payslip-footer-text {
        padding: 10px 16px 16px;
        color: #6b7280;
        font-size: 11px;
        text-align: center;
        font-style: italic;
    }

    @media (max-width: 720px) {
        .payslip-summary {
            flex-direction: column;
        }

        .payslip-summary-left {
            grid-template-columns: 1fr;
        }

        .payslip-table-grid {
            grid-template-columns: 1fr;
        }

        .payslip-col {
            border-right: none;
            border-bottom: 1px solid #dfe5eb;
        }

        .payslip-col:last-child {
            border-bottom: none;
        }
    }

    /* ===== Role Tabs ===== */
    .role-tab-bar {
        display: flex;
        gap: 4px;
        background: #dfe5eb;
        border-radius: 14px;
        padding: 5px;
        width: fit-content;
        margin-bottom: 20px;
    }

    .role-tab {
        padding: 9px 22px;
        border-radius: 10px;
        border: none;
        background: transparent;
        font-size: 13px;
        font-weight: 700;
        color: #5d6570;
        cursor: pointer;
        transition: all .2s ease;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .role-tab.active {
        color: #fff;
        background: #0b5d32;
        box-shadow: 0 2px 10px rgba(0, 0, 0, .08);
    }

    .role-tab .tab-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 18px;
        height: 18px;
        padding: 0 5px;
        border-radius: 99px;
        font-size: 10px;
        font-weight: 800;
        background: #e5484d;
        color: #fff;
    }

    /* ===== KPI mini cards ===== */
    .ps-kpi {
        border-radius: 14px;
        border: 1px solid #dfe5eb;
        padding: 16px 20px;
        background: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, .04);
    }

    .ps-kpi .kpi-label {
        font-size: 11px;
        font-weight: 700;
        color: #5d6570;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    .ps-kpi .kpi-value {
        font-size: 22px;
        font-weight: 800;
        color: #1d1d1d;
    }

    .ps-kpi .kpi-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: grid;
        place-items: center;
        font-size: 17px;
    }

    /* ===== Status badges ===== */
    .ps-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 99px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .ps-badge.pending {
        background: #fff4d9;
        color: #9a6200;
    }

    .ps-badge.approved {
        background: #e7f7eb;
        color: #087a24;
    }

    .ps-badge.rejected {
        background: #fdebed;
        color: #be3035;
    }

    .ps-badge.generated {
        background: #eaf1ff;
        color: #3564e0;
    }

    /* ===== Request form card ===== */
    .req-form-card {
        border-radius: 16px;
        border: 1px solid #dfe5eb;
        background: #fff;
        padding: 24px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, .04);
    }

    /* ===== Table helpers ===== */
    .salary-stack .amount {
        font-weight: 800;
        color: #1d1d1d;
        font-size: 13px;
    }

    .salary-stack .bar {
        height: 5px;
        margin-top: 4px;
        overflow: hidden;
        border-radius: 999px;
        background: #edf1ee;
    }

    .salary-stack .bar span {
        display: block;
        height: 100%;
        border-radius: inherit;
        background: #0d7a42;
    }

    .earning-col-th {
        border-bottom: 1px solid #fff !important;
        font-weight: 700 !important;
    }

    .deduction-col-th {
        border-bottom: 1px solid #fff !important;
        font-weight: 700 !important;
    }

    /* ===== Timeline stepper ===== */
    .ps-stepper {
        display: flex;
        align-items: center;
        gap: 0;
        margin-bottom: 24px;
    }

    .ps-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
        position: relative;
        cursor: pointer;
    }

    .ps-step:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 17px;
        left: calc(50% + 18px);
        width: calc(100% - 36px);
        height: 2px;
        background: #dfe5eb;
        z-index: 0;
    }

    .ps-step.done:not(:last-child)::after {
        background: #0d7a42;
    }

    .ps-step.active:not(:last-child)::after {
        background: #0d7a42;
    }

    .ps-step-dot {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 2px solid #dfe5eb;
        background: #fff;
        display: grid;
        place-items: center;
        font-size: 14px;
        color: #7b8490;
        z-index: 1;
        transition: all .2s;
    }

    .ps-step.done .ps-step-dot {
        background: #0d7a42;
        border-color: #0d7a42;
        color: #fff;
    }

    .ps-step.active .ps-step-dot {
        border-color: #0d7a42;
        color: #0d7a42;
        background: #e8f7ea;
    }

    .ps-step:hover .ps-step-dot {
        border-color: #0d7a42;
    }

    .ps-step-label {
        font-size: 11px;
        font-weight: 600;
        color: #5d6570;
        margin-top: 6px;
        text-align: center;
    }

    .ps-step.done .ps-step-label,
    .ps-step.active .ps-step-label {
        color: #0b5d32;
    }

    /* ===== Step panels ===== */
    .step-panel {
        display: none;
    }

    .step-panel.active {
        display: block;
    }

    /* ===== Action Dropdown Modern Professional Styling ===== */
    .payslip-action-btn {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        color: #475569;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        cursor: pointer;
        padding: 0;
    }
    .payslip-action-btn:hover, 
    .payslip-action-btn[aria-expanded="true"] {
        background: #ffffff;
        color: #0d7a42;
        border-color: #0d7a42;
        box-shadow: 0 3px 12px rgba(13, 122, 66, 0.18);
    }

    .payslip-dropdown-menu {
        border-radius: 14px !important;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 12px 30px -4px rgba(15, 23, 42, 0.14), 0 4px 12px -2px rgba(15, 23, 42, 0.08) !important;
        padding: 6px !important;
        min-width: 225px !important;
        background: #ffffff !important;
        z-index: 1060 !important;
        margin-top: 4px !important;
    }

    .payslip-dropdown-item {
        border-radius: 8px !important;
        padding: 8px 12px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        color: #334155 !important;
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        background: transparent !important;
        border: none !important;
        width: 100% !important;
        text-align: left !important;
        transition: all 0.15s ease !important;
        cursor: pointer !important;
        outline: none !important;
        box-shadow: none !important;
    }

    .payslip-dropdown-item:hover,
    .payslip-dropdown-item:focus,
    .payslip-dropdown-item:active {
        background: #f1f5f9 !important;
        color: #0f172a !important;
        outline: none !important;
        box-shadow: none !important;
    }

    .payslip-dropdown-item .action-icon-badge {
        width: 28px;
        height: 28px;
        border-radius: 7px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
        transition: all 0.15s ease;
    }

    /* Icon badge styles */
    .icon-badge-lightning {
        background: #fef9c3;
        color: #d97706;
    }
    .payslip-dropdown-item:hover .icon-badge-lightning {
        background: #fde047;
        color: #b45309;
    }

    .icon-badge-edit {
        background: #eff6ff;
        color: #2563eb;
    }
    .payslip-dropdown-item:hover .icon-badge-edit {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .icon-badge-view {
        background: #f1f5f9;
        color: #475569;
    }
    .payslip-dropdown-item:hover .icon-badge-view {
        background: #e2e8f0;
        color: #0f172a;
    }

    .icon-badge-print {
        background: #f1f5f9;
        color: #475569;
    }
    .payslip-dropdown-item:hover .icon-badge-print {
        background: #e2e8f0;
        color: #0f172a;
    }

    .icon-badge-download {
        background: #f1f5f9;
        color: #475569;
    }
    .payslip-dropdown-item:hover .icon-badge-download {
        background: #e2e8f0;
        color: #0f172a;
    }

    .payslip-dropdown-divider {
        height: 1px;
        background: #e2e8f0;
        margin: 5px 6px;
        border: none;
    }
</style>

<!-- Page header -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1 page-title">Payslip Management</h1>
    </div>
</div>

<div class="row g-3 mb-3">
    <!-- Generate Payslip Form Card -->
    <div class="col-lg-4">
        <div class="req-form-card h-100">
            <div class="fw-bold mb-3" style="font-size:15px;"><i class="bi bi-lightning-charge me-2 text-primary"></i>Generate Payslip</div>
            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size:12px;">Select Employee</label>
                <select class="form-select select2" id="reqEmployee" style="border-radius:10px;font-size:13px;">
                    <option value="">-- Select Employee --</option>
                    <option value="1">EMP0001 — Amelia Curr</option>
                    <option value="2">EMP0002 — Daniel Martinez</option>
                    <option value="3">EMP0003 — David Anderson</option>
                    <option value="4">EMP0004 — Emily Clark</option>
                    <option value="5">EMP0005 — Sophia Johnson</option>
                    <option value="6">EMP0006 — Michael Brown</option>
                    <option value="7">EMP0007 — Olivia Wilson</option>
                    <option value="8">EMP0008 — James Taylor</option>
                    <option value="9">EMP0009 — Isabella Moore</option>
                    <option value="10">EMP0010 — William Thomas</option>
                    <option value="11">EMP0011 — Mia Harris</option>
                    <option value="12">EMP0012 — Benjamin Martin</option>
                    <option value="13">EMP0013 — Charlotte Lee</option>
                    <option value="14">EMP0014 — Henry Walker</option>
                    <option value="15">EMP0015 — Evelyn Hall</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold" style="font-size:12px;">Pay Period</label>
                <select class="form-select select2" id="reqPeriod" style="border-radius:10px;font-size:13px;">
                    <option value="Aug 2026">August 2026</option>
                    <option value="Jul 2026">July 2026</option>
                    <option value="Jun 2026">June 2026</option>
                    <option value="May 2026">May 2026</option>
                    <option value="Apr 2026">April 2026</option>
                    <option value="Mar 2026">March 2026</option>
                </select>
            </div>
            <button class="btn btn-primary w-100 fw-bold" id="submitReqBtn" style="border-radius:10px;padding:10px;">
                <i class="bi bi-lightning-charge me-2"></i>Generate Payslip
            </button>
        </div>
    </div>

    <!-- Generated Payslips Table Card -->
    <div class="col-lg-8">
        <div class="card-custom p-0 h-100">
            <div style="padding:16px 20px;border-bottom:1px solid #dfe5eb;display:flex;align-items:center;justify-content:space-between;">
                <span class="fw-bold" style="font-size:14px;"><i class="bi bi-file-earmark-pdf me-2 text-primary"></i>Generated Payslips</span>
                <span class="ps-badge generated" id="kpiGenerated">0 Generated</span>
            </div>
            <div class="table-responsive table-modern-wrap column-border">
                <table class="table-modern w-100 datatable" id="myReqTable" data-table-name="Generated Payslips">
                    <thead>
                        <tr>
                            <th class="text-nowrap" style="width: 70px;">S.No</th>
                            <th class="text-nowrap">Employee</th>
                            <th class="text-nowrap">Pay Period</th>
                            <th class="text-nowrap">Generated On</th>
                            <th class="text-nowrap">Status</th>
                            <th class="text-nowrap" style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="myReqTbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Reject Reason Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:16px;border:none;overflow:hidden;">
            <div class="modal-header" style="background:#fdebed;border:none;padding:16px 24px;">
                <h5 class="modal-title fw-bold" style="font-size:15px;color:#be3035;"><i class="bi bi-x-circle me-2"></i>Reject Payslip Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <p style="font-size:13px;color:#5d6570;" id="rejectModalDesc">Rejecting request for <strong id="rejectEmpName"></strong> — <span id="rejectPeriod"></span></p>
                <label class="form-label fw-semibold" style="font-size:12px;">Reason for Rejection</label>
                <textarea class="form-control" id="rejectReason" rows="3" placeholder="Enter reason..." style="border-radius:10px;font-size:13px;resize:none;"></textarea>
            </div>
            <div class="modal-footer" style="padding:14px 24px;border-top:1px solid #dfe5eb;">
                <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn fw-bold" id="confirmRejectBtn" style="border-radius:10px;background:#fdebed;color:#be3035;border:none;padding:8px 20px;">
                    <i class="bi bi-x-circle me-1"></i>Confirm Reject
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Manual Pay Slip Modal -->
<div class="modal fade" id="manualPayslipModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:16px;border:none;overflow:hidden;">
            <div class="modal-header" style="background:linear-gradient(135deg,#0d7a42,#0e7c3a);color:#fff;padding:18px 24px;border:none;">
                <div>
                    <h5 class="modal-title fw-bold" style="font-size:15px;"><i class="bi bi-pencil-square me-2"></i>Manual Pay Slip</h5>
                    <div style="font-size:12px;opacity:.85;" id="manualModalSubtitle"></div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <div class="row g-3">
                    <!-- Attendance -->
                    <div class="col-12">
                        <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                            <i class="bi bi-calendar-check" style="color:#0d7a42;font-size:14px;"></i>
                            <span style="font-size:13px;font-weight:700;color:#1d1d1d;">Attendance</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold" style="font-size:12px;">Working Days</label>
                        <input type="number" class="form-control" id="mWorkingDays" min="0" max="31" style="border-radius:10px;font-size:13px;">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold" style="font-size:12px;">Present Days</label>
                        <input type="number" class="form-control" id="mPresent" min="0" max="31" style="border-radius:10px;font-size:13px;">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold" style="font-size:12px;">Absent Days</label>
                        <input type="number" class="form-control" id="mAbsent" min="0" max="31" style="border-radius:10px;font-size:13px;">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold" style="font-size:12px;">Pay Period</label>
                        <input type="text" class="form-control" id="mPeriod" style="border-radius:10px;font-size:13px;" readonly>
                    </div>

                    <div class="col-12">
                        <hr style="border-color:#dfe5eb;margin:4px 0;">
                    </div>

                    <!-- Earnings -->
                    <div class="col-12">
                        <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                            <i class="bi bi-plus-circle" style="color:#0d7a42;font-size:14px;"></i>
                            <span style="font-size:13px;font-weight:700;color:#1d1d1d;">Earning Components</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold" style="font-size:12px;">Basic Salary</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#e8f7ea;color:#0ca308;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-earn" id="mBasic" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold" style="font-size:12px;">HRA</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#e8f7ea;color:#0ca308;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-earn" id="mHra" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold" style="font-size:12px;">Dearness Allowance (DA)</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#e8f7ea;color:#0ca308;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-earn" id="mDa" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold" style="font-size:12px;">Conveyance</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#e8f7ea;color:#0ca308;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-earn" id="mConvey" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold" style="font-size:12px;">Medical</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#e8f7ea;color:#0ca308;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-earn" id="mMedical" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold" style="font-size:12px;">Special Allowance</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#e8f7ea;color:#0ca308;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-earn" id="mSpecial" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>

                    <div class="col-12">
                        <hr style="border-color:#dfe5eb;margin:4px 0;">
                    </div>

                    <!-- Deductions -->
                    <div class="col-12">
                        <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
                            <i class="bi bi-dash-circle" style="color:#be3035;font-size:14px;"></i>
                            <span style="font-size:13px;font-weight:700;color:#1d1d1d;">Deduction Components</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold" style="font-size:12px;">PF</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#fdebed;color:#be3035;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-deduct" id="mPf" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold" style="font-size:12px;">ESI</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#fdebed;color:#be3035;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-deduct" id="mEsi" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold" style="font-size:12px;">Professional Tax</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#fdebed;color:#be3035;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-deduct" id="mProfTax" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold" style="font-size:12px;">TDS</label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-radius:10px 0 0 10px;background:#fdebed;color:#be3035;font-weight:700;font-size:13px;border-color:#dfe5eb;">&#8377;</span>
                            <input type="number" class="form-control manual-deduct" id="mTds" style="border-radius:0 10px 10px 0;font-size:13px;">
                        </div>
                    </div>

                    <!-- Net Pay Preview -->
                    <div class="col-12">
                        <div style="display:flex;align-items:center;justify-content:space-between;background:linear-gradient(135deg,#0d7a42,#0e7c3a);border-radius:12px;padding:14px 20px;">
                            <div>
                                <div style="font-size:11px;font-weight:600;color:rgba(255,255,255,.8);">GROSS SALARY</div>
                                <div style="font-size:16px;font-weight:800;color:#fff;" id="mGrossPreview">&#8377;0</div>
                            </div>
                            <div style="width:1px;height:36px;background:rgba(255,255,255,.3);"></div>
                            <div>
                                <div style="font-size:11px;font-weight:600;color:rgba(255,255,255,.8);">TOTAL DEDUCTIONS</div>
                                <div style="font-size:16px;font-weight:800;color:#ffd7d7;" id="mDeductPreview">&#8377;0</div>
                            </div>
                            <div style="width:1px;height:36px;background:rgba(255,255,255,.3);"></div>
                            <div>
                                <div style="font-size:11px;font-weight:600;color:rgba(255,255,255,.8);">NET PAY</div>
                                <div style="font-size:20px;font-weight:800;color:#fff;" id="mNetPreview">&#8377;0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="padding:14px 24px;border-top:1px solid #dfe5eb;">
                <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary fw-bold" id="saveManualPayslipBtn" style="border-radius:10px;">
                    <i class="bi bi-file-earmark-check me-1"></i>Generate Payslip
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="payslipPreviewModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="border-radius:16px;border:none;overflow:hidden;">
            <div class="modal-header" style="background:#0d7a42;color:#fff;padding:16px 24px;border:none;">
                <h5 class="modal-title fw-bold" style="font-size:15px;"><i class="bi bi-file-earmark-text me-2"></i>Payslip Preview</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:0;" id="payslipPreviewBody"></div>
            <div class="modal-footer" style="padding:14px 24px;border-top:1px solid #dfe5eb;">
                <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-secondary fw-bold" id="previewPrintBtn" style="border-radius:10px;"><i class="bi bi-printer me-1"></i>Print</button>
                <button type="button" class="btn btn-primary fw-bold" id="previewDownloadBtn" style="border-radius:10px;"><i class="bi bi-download me-1"></i>Download PDF</button>
</div>


<script src="./assets/js/pages/payslip.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>


