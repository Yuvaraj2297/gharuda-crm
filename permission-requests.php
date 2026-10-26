<?php include 'header.php'; ?>

 
 

<style>
    /* ===== Status stat blocks ===== */
    .perm-stat-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #fff;
        border: 1.5px solid var(--border-soft, #eef0f3);
        border-radius: 14px;
        padding: 16px 18px;
        cursor: pointer;
        height: 100%;
        user-select: none;
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease, background .18s ease;
    }

    .perm-stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(20, 20, 43, .08);
    }

    .perm-stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .perm-stat-card.total .perm-stat-icon {
        background: #eaf1ff;
        color: #3564e0;
    }

    .perm-stat-card.pending .perm-stat-icon {
        background: #fff4d9;
        color: #9a6200;
    }

    .perm-stat-card.approved .perm-stat-icon {
        background: #e7f7eb;
        color: #087a24;
    }

    .perm-stat-card.rejected .perm-stat-icon {
        background: #fdebed;
        color: #be3035;
    }

    .perm-stat-info {
        min-width: 0;
    }

    .perm-stat-count {
        font: 800 22px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
        line-height: 1;
    }

    .perm-stat-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--ink-500, #6b7684);
        margin-top: 4px;
    }

    .perm-stat-arrow {
        margin-left: auto;
        color: var(--ink-300, #b0b5be);
        font-size: 14px;
        transition: transform .2s ease, color .2s ease;
    }

    .perm-stat-card.active .perm-stat-arrow {
        transform: rotate(90deg);
    }

    .perm-stat-card.total.active {
        border-color: #3564e0;
        background: #f5f8ff;
    }

    .perm-stat-card.pending.active {
        border-color: #f0b429;
        background: #fffbf0;
    }

    .perm-stat-card.approved.active {
        border-color: #16a34a;
        background: #f4fcf6;
    }

    .perm-stat-card.rejected.active {
        border-color: #e5484d;
        background: #fff6f6;
    }

    .perm-stat-card.total.active .perm-stat-count {
        color: #3564e0;
    }

    .perm-stat-card.total.active .perm-stat-arrow {
        color: #3564e0;
    }

    .perm-stat-card.pending.active .perm-stat-count {
        color: #9a6200;
    }

    .perm-stat-card.approved.active .perm-stat-count {
        color: #087a24;
    }

    .perm-stat-card.rejected.active .perm-stat-count {
        color: #be3035;
    }

    .perm-stat-card.pending.active .perm-stat-arrow {
        color: #9a6200;
    }

    .perm-stat-card.approved.active .perm-stat-arrow {
        color: #087a24;
    }

    .perm-stat-card.rejected.active .perm-stat-arrow {
        color: #be3035;
    }

    /* ===== Month & Year filter ===== */
    .perm-month-wrap {
        min-width: 170px;
        max-width: 200px;
    }

    .perm-year-wrap {
        min-width: 130px;
        max-width: 150px;
    }

    .perm-filter-apply {
        border-radius: 10px;
        padding: 9px 26px;
        font-weight: 700;
        font-size: 13px;
        height: 42px;
        display: inline-flex;
        align-items: center;
    }

    #permMonthSelect+.select2-container--default .select2-selection--single,
    #permYearSelect+.select2-container--default .select2-selection--single {
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 10px;
        height: 42px;
        display: flex;
        align-items: center;
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-900, #201a14);
        background: #fff;
    }

    #permMonthSelect+.select2-container--default .select2-selection--single .select2-selection__arrow,
    #permYearSelect+.select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px;
    }

    #permMonthSelect+.select2-container--default.select2-container--focus .select2-selection--single,
    #permMonthSelect+.select2-container--default.select2-container--open .select2-selection--single,
    #permYearSelect+.select2-container--default.select2-container--focus .select2-selection--single,
    #permYearSelect+.select2-container--default.select2-container--open .select2-selection--single {
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    /* ===== Permission type chip ===== */
    .perm-type-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 700;
        padding: 5px 11px;
        border-radius: 999px;
        white-space: nowrap;
    }

    .perm-type-chip i {
        font-size: 12px;
    }

    .perm-type-chip.type-late {
        background: #fff4d9;
        color: #9a6200;
    }

    .perm-type-chip.type-early {
        background: #fdebed;
        color: #be3035;
    }

    .perm-type-chip.type-out {
        background: #eaf1ff;
        color: #3564e0;
    }

    .perm-type-chip.type-business {
        background: #f3e8ff;
        color: #7e22ce;
    }

    /* ===== Status badge ===== */
    .perm-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        border-radius: 99px;
        font-size: 11.5px;
        font-weight: 700;
        white-space: nowrap;
    }

    .perm-status-badge i {
        font-size: 11px;
    }

    .perm-status-badge.pending {
        background: #fff4d9;
        color: #9a6200;
    }

    .perm-status-badge.approved {
        background: #e7f7eb;
        color: #087a24;
    }

    .perm-status-badge.rejected {
        background: #fdebed;
        color: #be3035;
    }

    .perm-reason-cell {
        max-width: 220px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 12.5px;
        color: var(--ink-600, #4b5563);
    }

    /* ===== Apply Permission Modal ===== */
    #permissionApplyModal .modal-dialog {
        max-width: min(100%, 560px);
    }

    #permissionApplyModal .modal-content {
        border: 0;
        border-radius: 16px;
        box-shadow: 0 24px 70px rgba(22, 32, 43, .22);
        overflow: unset;
    }

    .perm-body {
        padding: 22px;
    }

    .perm-row {
        margin-bottom: 16px;
    }

    .perm-row>label {
        display: block;
        font-weight: 600;
        font-size: 13px;
        color: var(--ink-900, #201a14);
        margin-bottom: 6px;
    }

    .perm-time-hint {
        font-weight: 500;
        font-size: 11.5px;
        color: var(--ink-500, #6b7684);
        text-transform: none;
    }

    .perm-time-row {
        display: flex;
        gap: 10px;
    }

    .perm-time-row>input {
        flex: 1 1 0;
    }

    #permissionApplyModal .form-control,
    #permissionApplyModal .form-select {
        background: #f8f9fb;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink-900, #201a14);
    }

    #permissionApplyModal .form-control:focus,
    #permissionApplyModal .form-select:focus {
        background: #fff;
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    #permissionApplyModal .form-control::placeholder {
        color: #b0b5be;
        font-weight: 500;
    }

    #permissionApplyModal .select2-container--default .select2-selection--single {
        background: #f8f9fb;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        height: 42px;
        display: flex;
        align-items: center;
        padding: 6px 14px;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink-900, #201a14);
    }

    #permissionApplyModal .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #b0b5be;
        font-weight: 500;
    }

    #permissionApplyModal .select2-container--default.select2-container--focus .select2-selection--single,
    #permissionApplyModal .select2-container--default.select2-container--open .select2-selection--single {
        background: #fff;
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    /* Total permission time row */
    .perm-total-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        border-top: 1px solid #eef0f3;
        padding: 12px 2px;
        margin-bottom: 16px;
    }

    /* Inline field error state */
    .perm-row .field-error-msg {
        display: none;
        font-size: 11px;
        font-weight: 600;
        color: #be3035;
        margin-top: 5px;
    }

    .perm-row.has-error .field-error-msg {
        display: block;
    }

    .perm-row.has-error .form-control,
    .perm-row.has-error .form-select,
    .perm-row.has-error .select2-container--default .select2-selection--single,
    .perm-row.has-error .date-picker .date-input {
        border-color: #e5484d !important;
        box-shadow: 0 0 0 3px rgba(229, 72, 77, .1);
    }

    /* Submit button loading state */
    #permSubmitBtn .btn-spinner {
        display: none;
    }

    #permSubmitBtn.loading {
        pointer-events: none;
        opacity: .75;
    }

    #permSubmitBtn.loading .btn-spinner {
        display: inline-block;
    }

    #permSubmitBtn.loading .btn-label-default {
        display: none;
    }

    #permSubmitBtn.loading .btn-label-loading {
        display: inline;
    }

    #permSubmitBtn .btn-label-loading {
        display: none;
    }

    /* ===== Advance Payment Request (Go on business) ===== */
    .advance-payment-wrap {
        background: #fffdf7;
        border: 1px solid #fef3c7;
        border-radius: 12px;
        padding: 14px;
        margin-bottom: 16px;
    }

    .adv-pay-header {
        background: #fffbeb;
        color: #92400e;
        font-weight: 700;
        font-size: 13px;
        padding: 9px 13px;
        border-radius: 8px;
        margin-bottom: 12px;
        border: 1px solid #fde68a;
    }

    .adv-pay-labels {
        display: flex;
        gap: 10px;
        margin-bottom: 6px;
        padding: 0 2px;
    }

    .adv-pay-col-label {
        flex: 1 1 0;
        font-weight: 600;
        font-size: 12px;
        color: var(--ink-700, #374151);
    }

    .adv-pay-col-action {
        width: 38px;
        flex-shrink: 0;
    }

    .adv-pay-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .adv-pay-row:last-child {
        margin-bottom: 0;
    }

    .adv-pay-col {
        flex: 1 1 0;
        min-width: 0;
    }

    .adv-pay-col-btn {
        width: 38px;
        flex-shrink: 0;
    }

    .btn-adv-add,
    .btn-adv-remove {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: 700;
        border: none;
        color: #fff;
        transition: transform .15s ease, background-color .15s ease;
    }

    .btn-adv-add {
        background-color: #16a34a;
    }

    .btn-adv-add:hover {
        background-color: #15803d;
        transform: scale(1.05);
        color: #fff;
    }

    .btn-adv-remove {
        background-color: #dc2626;
    }

    .btn-adv-remove:hover {
        background-color: #b91c1c;
        transform: scale(1.05);
        color: #fff;
    }

    .perm-total-row span {
        font-weight: 600;
        color: var(--ink-500, #6b7684);
        font-size: 13px;
    }

    .perm-total-row strong {
        font-size: 13.5px;
        color: var(--ink-900, #201a14);
    }

    #permTotalText.is-ok {
        color: var(--primary-dark, #0ca308);
    }

    #permTotalText.is-over {
        color: #c0362c;
    }

    /* Result step */
    .perm-result {
        display: none;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 10px;
        padding: 10px 4px 4px;
    }

    .perm-result.show {
        display: flex;
    }

    .perm-result-icon {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        background: #fff3cd;
        color: #a3670a;
    }

    .perm-result-title {
        font: 700 15px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
    }

    .perm-result-sub {
        font-size: 12.5px;
        color: var(--ink-500, #6b7684);
        max-width: 360px;
    }

    /* ===== Employee identity chip in card head ===== */
    .perm-emp-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--att-present-bg, #e8f7ea);
        border: 1px solid rgba(12, 163, 8, .18);
        border-radius: 999px;
        padding: 4px 12px 4px 4px;
    }

    .perm-emp-chip img {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        object-fit: cover;
    }

    .perm-emp-chip .chip-name {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--primary-dark, #0ca308);
        line-height: 1.1;
    }

    .perm-emp-chip .chip-id {
        font-size: 10.5px;
        font-weight: 600;
        color: var(--ink-500, #6b7684);
    }

    /* Empty state */
    .perm-empty-state {
        text-align: center;
        padding: 38px 16px;
    }

    .perm-empty-state .empty-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 12px;
        border-radius: 16px;
        background: #f3f4f6;
        color: #b0b5be;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .perm-empty-state .empty-title {
        font: 700 14px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
    }

    .perm-empty-state .empty-sub {
        font-size: 12px;
        color: var(--ink-500, #6b7684);
        margin-top: 4px;
    }

    @media (max-width: 576px) {
        .perm-time-row {
            flex-direction: column;
        }
    }

    /* ===== Employee Permission (fullscreen modal) ===== */
    #employeePermModal .modal-content {
        border: 0;
        border-radius: 0;
        background: #f7f8fa;
        height: 100vh;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    #employeePermModal .emp-perm-body {
        flex: 1 1 auto;
        min-height: 0;
        overflow-y: auto;
    }

    .emp-perm-head {
        position: sticky;
        top: 0;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 18px 26px;
        background: #fff;
        border-bottom: 1px solid var(--border-soft, #eef0f3);
    }

    .emp-perm-head h3 {
        margin: 0;
        font: 700 18px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .emp-perm-head h3 .ep-head-icon {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        background: var(--att-present-bg, #e8f7ea);
        color: var(--primary-dark, #0ca308);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .emp-perm-head p {
        margin: 3px 0 0 48px;
        font-size: 12.5px;
        color: var(--ink-500, #6b7684);
    }

    .emp-perm-body {
        padding: 20px 26px 30px;
    }

    .emp-perm-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 14px;
    }

    .emp-perm-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 14px;
        border-radius: 999px;
        border: 1.5px solid var(--border-soft, #eef0f3);
        background: #fff;
        font-size: 12px;
        font-weight: 700;
        color: var(--ink-600, #4b5563);
        cursor: pointer;
        transition: all .15s ease;
    }

    .emp-perm-chip:hover {
        border-color: var(--primary, #16a34a);
    }

    .emp-perm-chip.active {
        background: linear-gradient(135deg, #16a34a 0%, #0e7c3a 100%);
        border-color: transparent;
        color: #fff;
        box-shadow: 0 4px 12px rgba(22, 163, 74, .25);
    }

    .emp-perm-chip .chip-n {
        background: rgba(0, 0, 0, .07);
        border-radius: 99px;
        padding: 1px 8px;
        font-size: 11px;
    }

    .emp-perm-chip.active .chip-n {
        background: rgba(255, 255, 255, .25);
    }

    .emp-perm-card {
        background: #fff;
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(20, 20, 43, .04);
    }

    .ep-emp-cell {
        min-width: 190px;
    }

    .ep-action-btns {
        display: flex;
        gap: 6px;
    }

    .ep-action-btns .btn {
        padding: 5px 12px;
        font-size: 11.5px;
        font-weight: 700;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .ep-approve {
        background: #e7f7eb;
        color: #087a24;
        border: 1px solid rgba(8, 122, 36, .25);
    }

    .ep-approve:hover {
        background: #16a34a;
        color: #fff;
    }

    .ep-reject {
        background: #fdebed;
        color: #be3035;
        border: 1px solid rgba(190, 48, 53, .25);
    }

    .ep-reject:hover {
        background: #e5484d;
        color: #fff;
    }

    .ep-decided-flash {
        animation: epFlash .8s ease;
    }

    @keyframes epFlash {
        0% {
            background: #fff8e1;
        }

        100% {
            background: transparent;
        }
    }

    /* ===== Notification badge on Employee Permissions button ===== */
    .perm-notify-btn {
        position: relative;
    }

    .perm-notify-badge {
        position: absolute;
        top: -10px;
        right: -6px;
        min-width: 20px;
        height: 20px;
        padding: 0 6px;
        border-radius: 999px;
        background: #e5484d;
        color: #fff;
        font-size: 10.5px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #fff;
        box-shadow: 0 2px 6px rgba(229, 72, 77, .4);
        animation: badgePulse 2s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes badgePulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.15);
        }
    }

    .perm-month-subtitle {
        font-size: 11.5px;
    }

    .perm-adv-section-hidden {
        display: none;
    }

    .col-sno-50 {
        width: 50px;
    }

    .col-sno-70 {
        width: 70px;
    }

    .empty-icon-success {
        background: #e7f7eb;
        color: #087a24;
    }

    .ep-avatar-size {
        width: 34px;
        height: 34px;
    }

    .ep-name-text {
        font-weight: 700;
        font-size: 13px;
    }

    .ep-meta-text {
        font-size: 11.5px;
        color: var(--primary-dark);
        font-weight: 600;
    }

    .perm-cell-semibold {
        font-size: 12.5px;
        font-weight: 600;
    }

    .perm-cell-regular {
        font-size: 12.5px;
    }

    .perm-cell-total {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--primary-dark, #0ca308);
    }

    .perm-cell-muted {
        font-size: 12.5px;
        color: var(--ink-500, #6b7684);
    }
</style>

<!-- ===== Page header ===== -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
    <div class="overflow-auto">
        <h1 class="font-display fw-bold mb-1 page-title">Permission Requests</h1>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-primary perm-notify-btn" data-bs-toggle="modal" data-bs-target="#employeePermModal">
            <i class="bi bi-people me-1"></i> Employee Permissions
            <span class="perm-notify-badge" id="epBadgeCount">0</span>
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#permissionApplyModal">
            <i class="bi bi-clock-history me-1"></i> Apply Permission
        </button>
    </div>
</div>



<!-- ===== Status stat blocks ===== -->
<div class="row g-3 mb-3" id="permStatBlocks">
    <div class="col-lg-3 col-md-6">
        <div class="perm-stat-card total" data-status="" title="Click to show all requests">
            <div class="perm-stat-icon"><i class="bi bi-stack"></i></div>
            <div class="perm-stat-info">
                <div class="perm-stat-count" id="permCountTotal">0</div>
                <div class="perm-stat-label">Total Requests</div>
            </div>
            <i class="bi bi-chevron-right perm-stat-arrow"></i>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="perm-stat-card pending" data-status="Pending" title="Click to filter. Click again to show all">
            <div class="perm-stat-icon"><i class="bi bi-hourglass-split"></i></div>
            <div class="perm-stat-info">
                <div class="perm-stat-count" id="permCountPending">0</div>
                <div class="perm-stat-label">Pending Requests</div>
            </div>
            <i class="bi bi-chevron-right perm-stat-arrow"></i>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="perm-stat-card approved" data-status="Approved" title="Click to filter. Click again to show all">
            <div class="perm-stat-icon"><i class="bi bi-check-circle-fill"></i></div>
            <div class="perm-stat-info">
                <div class="perm-stat-count" id="permCountApproved">0</div>
                <div class="perm-stat-label">Approved Requests</div>
            </div>
            <i class="bi bi-chevron-right perm-stat-arrow"></i>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="perm-stat-card rejected" data-status="Rejected" title="Click to filter. Click again to show all">
            <div class="perm-stat-icon"><i class="bi bi-x-circle-fill"></i></div>
            <div class="perm-stat-info">
                <div class="perm-stat-count" id="permCountRejected">0</div>
                <div class="perm-stat-label">Rejected Requests</div>
            </div>
            <i class="bi bi-chevron-right perm-stat-arrow"></i>
        </div>
    </div>
</div>

<!-- ===== Month & Year filter + Apply ===== -->
<div class="d-flex align-items-center flex-wrap gap-2 mb-3 bg-white p-3 rounded-4 border-light border">
    <div class="perm-month-wrap">
        <select id="permMonthSelect" class="form-select" aria-label="Select month"></select>
    </div>
    <div class="perm-year-wrap">
        <select id="permYearSelect" class="form-select" aria-label="Select year"></select>
    </div>
    <button type="button" class="btn btn-primary perm-filter-apply" id="permApplyFilter">
        <i class="bi bi-funnel-fill me-1"></i> Apply
    </button>
</div>

<!-- ===== Table card ===== -->
<div class="card-custom p-0" id="permissionTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
            <div>
                <h3 class="card-title mb-0">My Permission Requests</h3>
                <div class="small text-muted perm-month-subtitle" id="permMonthLabel">Your permission history &amp; status</div>
            </div>
            <span class="perm-emp-chip ms-2">
                <img src="./assets/img/profile-1.jpg" alt="Vijai">
                <span>
                    <span class="chip-name d-block">Vijai</span>
                    <span class="chip-id d-block">EMP 41 &middot; Developer</span>
                </span>
            </span>
        </div>
    </div>
    <div class="table-responsive table-modern-wrap overflow-auto column-border" id="permTableScroll">
        <table class="table-modern w-100 datatable" id="myReqTable" data-table-name="Permission Requests">
            <thead>
                <tr id="permTableHead"></tr>
            </thead>
            <tbody id="permBody"></tbody>
        </table>
    </div>
</div>

<!-- ===== Apply Permission Modal ===== -->
<div class="modal fade" id="permissionApplyModal" tabindex="-1" aria-labelledby="permissionApplyTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="leave-reject-head">
                <h3 id="permissionApplyTitle">Apply Permission</h3>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="perm-body">

                <!-- Step 1: Form -->
                <div id="permFormWrap">
                    <div class="perm-row" data-field="date">
                        <label>Date</label>
                        <div class="date-picker"><input type="text" class="date-input form-control" id="permDate" placeholder="Select date" autocomplete="off"></div>
                        <div class="field-error-msg">Please select a date</div>
                    </div>

                    <div class="perm-row" data-field="type">
                        <label>Permission Type</label>
                        <select class="form-select select2" id="permType">
                            <option></option>
                            <option value="Late Coming">Late Coming</option>
                            <option value="Early Leaving">Early Leaving</option>
                            <option value="Out Permission">Out Permission</option>
                            <option value="Go on business">Go on business</option>
                        </select>
                        <div class="field-error-msg">Please select a permission type</div>
                    </div>

                    <!-- Advance payment request section (shown only when 'Go on business' is selected) -->
                    <div class="perm-row advance-payment-wrap perm-adv-section-hidden" id="advancePaymentSection">
                        <div class="adv-pay-header">Advance payment request</div>
                        <div class="adv-pay-body">
                            <div class="adv-pay-labels">
                                <span class="adv-pay-col-label">Used to</span>
                                <span class="adv-pay-col-label">Amount of money</span>
                                <span class="adv-pay-col-action"></span>
                            </div>
                            <div id="advPayRows">
                                <div class="adv-pay-row">
                                    <div class="adv-pay-col">
                                        <select class="form-select adv-used-to">
                                            <option value="" disabled selected>Select category</option>
                                            <option value="Food Reimbursement">Food Reimbursement</option>
                                            <option value="Travel Expense">Travel Expense</option>
                                            <option value="Lodging & Hotel">Lodging & Hotel</option>
                                            <option value="Client Meeting">Client Meeting</option>
                                            <option value="Fuel Expense">Fuel Expense</option>
                                            <option value="Other Expenses">Other Expenses</option>
                                        </select>
                                    </div>
                                    <div class="adv-pay-col">
                                        <input type="number" min="0" step="1" class="form-control adv-amount" placeholder="Enter amount (₹)">
                                    </div>
                                    <div class="adv-pay-col-btn">
                                        <button type="button" class="btn btn-adv-add" id="advAddRowBtn" title="Add row">
                                            <i class="bi bi-plus-lg"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="perm-row" data-field="time">
                        <label>Time <span class="perm-time-hint">(max 2 hours)</span></label>
                        <div class="perm-time-row">
                            <input type="time" class="form-control" id="permFromTime">
                            <input type="time" class="form-control" id="permToTime">
                        </div>
                        <div class="field-error-msg" id="permTimeError">Please select both From and To time</div>
                    </div>

                    <div class="perm-total-row">
                        <span>Total permission time</span>
                        <strong id="permTotalText">&ndash;</strong>
                    </div>

                    <div class="perm-row" data-field="approver">
                        <label>Approve by</label>
                        <select class="form-select select2" id="permApprover">
                            <option></option>
                            <option value="Manager">Manager</option>
                            <option value="Team Lead">Team Lead</option>
                            <option value="HR">HR</option>
                        </select>
                        <div class="field-error-msg">Please select an approver</div>
                    </div>

                    <div class="perm-row mb-0" data-field="reason">
                        <label>Reason</label>
                        <textarea class="form-control" id="permReason" rows="3" placeholder="Enter reason for permission (min 5 characters)"></textarea>
                        <div class="field-error-msg">Please enter a reason (min 5 characters)</div>
                    </div>
                </div>

                <!-- Step 2: after submit -->
                <div class="perm-result" id="permResult">
                    <div class="perm-result-icon"><i class="bi bi-hourglass-split"></i></div>
                    <div class="perm-result-title">Request Submitted</div>
                    <div class="perm-result-sub" id="permResultSub">Your permission request has been sent for approval.</div>
                </div>

            </div>
            <div class="leave-reject-foot" id="permFormFoot">
                <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="permSubmitBtn">
                    <span class="btn-spinner spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                    <span class="btn-label-default">Submit Request</span>
                    <span class="btn-label-loading">Submitting&hellip;</span>
                </button>
            </div>
            <div class="leave-reject-foot d-none" id="permResultFoot">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Employee Permission Requests (Fullscreen Modal) ===== -->
<div class="modal fade" id="employeePermModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="emp-perm-head">
                <div>
                    <h3><span class="ep-head-icon"><i class="bi bi-people-fill"></i></span> Employee Permission Requests</h3>
                    <p>Review and approve / reject permission requests raised by your team members</p>
                </div>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="emp-perm-body">
                <div class="emp-perm-card">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100" id="epPermTable">
                            <thead>
                                <tr>
                                    <th class="text-nowrap col-sno-50">S.No</th>
                                    <th class="text-nowrap">Employee</th>
                                    <th class="text-nowrap">Permission Type</th>
                                    <th class="text-nowrap">Date</th>
                                    <th class="text-nowrap">From Time</th>
                                    <th class="text-nowrap">To Time</th>
                                    <th class="text-nowrap">Total Hours</th>
                                    <th class="text-nowrap">Reason</th>
                                    <th class="text-nowrap">Requested On</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody id="epPermTbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

 


<script src="./assets/js/pages/permission-requests.js?v=<?php echo time(); ?>"></script>
