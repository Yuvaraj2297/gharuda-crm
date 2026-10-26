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

 
<script>
    // ================================================================
    // EMPLOYEE PERMISSION MODAL — team members oda requests review
    // panni Approve / Reject panna (fullscreen)
    // ================================================================
    (function() {
        'use strict';

        var MONTHS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Team members (approver paakura employees)
        var epEmployees = [{
                emp_id: 40, name: 'Anbarasan', role: 'Developer', avatar: 'profile-2.jpg'
            },
            {
                emp_id: 39, name: 'Shailni Raj', role: 'Branch Manager', avatar: 'profile-3.jpg'
            },
            {
                emp_id: 36, name: 'venkatesanB', role: 'Developer', avatar: 'profile-4.jpg'
            },
            {
                emp_id: 35, name: 'Bhuvaneswari', role: 'Marketing', avatar: 'profile-1.jpg'
            },
            {
                emp_id: 34, name: 'Karthik Raja', role: 'Developer', avatar: 'profile-2.jpg'
            },
            {
                emp_id: 33, name: 'Priya Sharma', role: 'Designer', avatar: 'profile-3.jpg'
            },
            {
                emp_id: 32, name: 'Mohammed Farhan', role: 'Developer', avatar: 'profile-4.jpg'
            },
            {
                emp_id: 31, name: 'Deepa Nair', role: 'HR', avatar: 'profile-1.jpg'
            }
        ];

        var epTypes = ['Late Coming', 'Early Leaving', 'Out Permission', 'Go on business'];
        var epReasons = [
            'Traffic delay due to vehicle breakdown',
            'Family function at home',
            'Bank work - loan document submission',
            'Child school pickup',
            'Train delayed by 45 minutes',
            'Aadhaar update at government office',
            'Eye checkup appointment',
            'Courier pickup at residence',
            'Flat tyre on the way to office',
            'Property document signing'
        ];

        function tmin(s) {
            var m = s.match(/(\d{1,2}):(\d{2})\s*(AM|PM)/i);
            var hh = (parseInt(m[1], 10) % 12) + (m[3].toUpperCase() === 'PM' ? 12 : 0);
            return hh * 60 + parseInt(m[2], 10);
        }

        function durText(mins) {
            var hh = Math.floor(mins / 60),
                mm = mins % 60,
                p = [];
            if (hh) p.push(hh + 'h');
            if (mm || !hh) p.push(mm + 'm');
            return p.join(' ');
        }

        function hhmm12(mins) {
            var h24 = Math.floor(mins / 60),
                mm = mins % 60,
                sfx = h24 >= 12 ? 'PM' : 'AM',
                h12 = h24 % 12;
            if (!h12) h12 = 12;
            return String(h12).padStart(2, '0') + ':' + String(mm).padStart(2, '0') + ' ' + sfx;
        }

        function epEsc(v) {
            var d = document.createElement('div');
            d.appendChild(document.createTextNode(String(v)));
            return d.innerHTML;
        }

        // Seeded PRNG — same month ku same dummy data
        var _s = 99;

        function srand(s) { _s = s; }

        function rnd() {
            _s = (_s * 1664525 + 1013904223) & 0x7fffffff;
            return _s / 0x7fffffff;
        }

        function rint(a, b) { return a + Math.floor(rnd() * (b - a + 1)); }

        var epRequests = [];

        function buildEpData() {
            epRequests = [];
            var today = new Date();
            var yr = today.getFullYear(),
                mo = today.getMonth(),
                todayD = today.getDate();
            srand(yr * 100 + mo + 21);

            // 14 team requests — indha month-la, random members
            for (var i = 0; i < 14; i++) {
                var back = rint(0, Math.max(0, todayD - 1));
                var d = todayD - back;
                if (d < 1) continue;
                var emp = epEmployees[rint(0, epEmployees.length - 1)];
                var type = epTypes[rint(0, epTypes.length - 1)];
                var f, t;
                if (type === 'Late Coming') {
                    f = rint(9 * 60 + 40, 11 * 60);
                    t = f + rint(30, 60);
                } else if (type === 'Early Leaving') {
                    t = rint(16 * 60 + 30, 18 * 60);
                    f = t - rint(30, 60);
                } else {
                    f = rint(10 * 60, 14 * 60);
                    t = f + rint(30, 120);
                }
                if (t - f > 120) t = f + 120;
                var sr = rint(1, 100);
                var status = sr <= 55 ? 'Pending' : (sr <= 82 ? 'Approved' : 'Rejected');
                var dayStr = d + ' ' + MONTHS[mo] + ' ' + yr;
                epRequests.push({
                    id: i + 1,
                    emp_id: emp.emp_id, name: emp.name, role: emp.role, avatar: emp.avatar,
                    type: type,
                    date: dayStr,
                    dateKey: yr + '-' + String(mo + 1).padStart(2, '0') + '-' + String(d).padStart(2, '0'),
                    from: hhmm12(f), to: hhmm12(t),
                    totalMin: t - f, total: durText(t - f),
                    reason: epReasons[rint(0, epReasons.length - 1)],
                    status: status,
                    requestedOn: dayStr
                });
            }
            epRequests.sort(function(a, b) { return b.dateKey.localeCompare(a.dateKey); });
        }

        var epTypeMeta = {
            'Late Coming': { icon: 'bi-sunrise', cls: 'type-late' },
            'Early Leaving': { icon: 'bi-sunset', cls: 'type-early' },
            'Out Permission': { icon: 'bi-box-arrow-right', cls: 'type-out' },
            'Go on business': { icon: 'bi-briefcase', cls: 'type-business' }
        };

        // Modal-la PENDING requests mattum dha kaatanum — approve/reject pannadhu
        // list-la irundhu remove aagum, ella mudinja "No permission request" empty state
        function epRender() {
            var tbody = document.getElementById('epPermTbody');
            var list = epRequests.filter(function(r) { return r.status === 'Pending'; });

            if (!list.length) {
                tbody.innerHTML = '<tr><td colspan="10" class="text-center py-5">' +
                    '<div class="perm-empty-state">' +
                    '<div class="empty-icon empty-icon-success"><i class="bi bi-check-circle-fill"></i></div>' +
                    '<div class="empty-title">No permission request</div>' +
                    '<div class="empty-sub">All employee permission requests have been reviewed. Great job!</div>' +
                    '</div></td></tr>';
                return;
            }

            var html = '';
            list.forEach(function(r, i) {
                var tm = epTypeMeta[r.type] || { icon: 'bi-clock', cls: 'type-out' };
                html += '<tr data-id="' + r.id + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><div class="d-flex align-items-center gap-2"><img src="./assets/img/' + epEsc(r.avatar) + '" class="avatar-sm ep-avatar-size"><div><div class="person-name ep-name-text">' + epEsc(r.name) + '</div><div class="emp-id ep-meta-text">EMP ' + epEsc(r.emp_id) + ' \u00b7 ' + epEsc(r.role) + '</div></div></div></td>' +
                    '<td><span class="perm-type-chip ' + tm.cls + '"><i class="bi ' + tm.icon + '"></i>' + epEsc(r.type) + '</span></td>' +
                    '<td><span class="perm-cell-semibold">' + epEsc(r.date) + '</span></td>' +
                    '<td><span class="perm-cell-semibold">' + epEsc(r.from) + '</span></td>' +
                    '<td><span class="perm-cell-semibold">' + epEsc(r.to) + '</span></td>' +
                    '<td><span class="perm-cell-total">' + epEsc(r.total) + '</span></td>' +
                    '<td><div class="perm-reason-cell" title="' + epEsc(r.reason).replace(/"/g, '&quot;') + '">' + epEsc(r.reason) + '</div></td>' +
                    '<td><span class="perm-cell-muted">' + epEsc(r.requestedOn) + '</span></td>' +
                    '<td>' +
                    '<div class="ep-action-btns"><button type="button" class="btn ep-approve" data-act="approve" data-id="' + r.id + '"><i class="bi bi-check-lg"></i> Approve</button><button type="button" class="btn ep-reject" data-act="reject" data-id="' + r.id + '"><i class="bi bi-x-lg"></i> Reject</button></div>' +
                    '</td></tr>';
            });
            tbody.innerHTML = html;
        }

        function epFlash(row) {
            row.classList.remove('ep-decided-flash');
            void row.offsetWidth;
            row.classList.add('ep-decided-flash');
        }

        var epModalEl = document.getElementById('employeePermModal');

        function updateHeaderBadge() {
            var pending = epRequests.filter(function(r) { return r.status === 'Pending'; }).length;
            var badge = document.getElementById('epBadgeCount');
            if (!badge) return;
            badge.textContent = String(pending);
            badge.style.display = pending > 0 ? 'flex' : 'none';
        }

        // Page load-la badge set — dummy data build panni count edu
        buildEpData();
        updateHeaderBadge();

        epModalEl.addEventListener('show.bs.modal', function() {
            buildEpData();
            updateHeaderBadge();
            epRender();
        });

        // Approve / Reject (delegated)
        document.getElementById('epPermTbody').addEventListener('click', function(e) {
            var btn = e.target.closest('.ep-approve, .ep-reject');
            if (!btn) return;
            var id = parseInt(btn.getAttribute('data-id'), 10);
            var act = btn.getAttribute('data-act');
            var req = epRequests.find(function(r) { return r.id === id; });
            if (!req || req.status !== 'Pending') return;

            req.status = (act === 'approve') ? 'Approved' : 'Rejected';
            updateHeaderBadge();
            epRender();
            // Flash the updated row for feedback (inno still pending render-la irundha)
            var row = document.querySelector('#epPermTbody tr[data-id="' + id + '"]');
            if (row) epFlash(row);
        });
    })();
</script>

<script>
    (function() {
        'use strict';

        // ================================================================
        // DUMMY DATA — Logged-in employee (Vijai) oda permission requests.
        // CURRENT MONTH base panni dynamic-a generate aagum — page refresh
        // panna ella thadavayum indha month dates (today varai) dha varum.
        // ================================================================
        var MONTHS_SHORT = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var MONTHS_FULL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        var TODAY_DT = new Date();
        var CUR_YR = TODAY_DT.getFullYear(),
            CUR_MO = TODAY_DT.getMonth();
        var VIEW_YR = CUR_YR,
            VIEW_MO = CUR_MO;

        var REASONS = [
            'Traffic delay due to vehicle breakdown',
            'Family function at home',
            'Bank work - loan document submission',
            'Annual medical checkup',
            'Courier pickup at residence',
            'Child school pickup',
            'Train delayed by 45 minutes',
            'Aadhaar update at government office',
            'Eye checkup appointment',
            'Flat tyre on the way to office',
            'Property document signing',
            'Tenant house visit',
            'Home maintenance work',
            'Medical shop visit'
        ];

        function tmin(s) {
            var m = s.match(/(\d{1,2}):(\d{2})\s*(AM|PM)/i);
            var hh = (parseInt(m[1], 10) % 12) + (m[3].toUpperCase() === 'PM' ? 12 : 0);
            return hh * 60 + parseInt(m[2], 10);
        }

        function durText(mins) {
            var hh = Math.floor(mins / 60),
                mm = mins % 60,
                p = [];
            if (hh) p.push(hh + 'h');
            if (mm || !hh) p.push(mm + 'm');
            return p.join(' ');
        }

        function hhmm12(mins) {
            var h24 = Math.floor(mins / 60),
                mm = mins % 60,
                sfx = h24 >= 12 ? 'PM' : 'AM',
                h12 = h24 % 12;
            if (!h12) h12 = 12;
            return String(h12).padStart(2, '0') + ':' + String(mm).padStart(2, '0') + ' ' + sfx;
        }

        // Seeded PRNG — past month data stable-a irukkum (same month = same dummy data)
        var _seed = 1;

        function srand(s) { _seed = s; }

        function rnd() {
            _seed = (_seed * 1664525 + 1013904223) & 0x7fffffff;
            return _seed / 0x7fffffff;
        }

        function rint(a, b) { return a + Math.floor(rnd() * (b - a + 1)); }

        function pushRow(rows, yr, mo, d, type, from, to, approver, reason, status) {
            var dayStr = d + ' ' + MONTHS_SHORT[mo] + ' ' + yr;
            var key = yr + '-' + String(mo + 1).padStart(2, '0') + '-' + String(d).padStart(2, '0');
            var total = tmin(to) - tmin(from);
            rows.push({
                id: rows.length + 1,
                emp_id: 41, name: 'Vijai', avatar: 'profile-1.jpg',
                type: type, date: dayStr, dateKey: key,
                from: from, to: to, totalMin: total, total: durText(total),
                approver: approver, reason: reason,
                status: status,
                requestedOn: dayStr, requestedOnKey: key
            });
        }

        function buildMonthData(yr, mo) {
            var rows = [];

            // Current month: fixed configs (today-la irundhu days back)
            if (yr === CUR_YR && mo === CUR_MO) {
                var configs = [
                    [0, 'Late Coming', '09:45 AM', '10:45 AM', 'Manager', 'Traffic delay due to vehicle breakdown', 'Pending'],
                    [1, 'Early Leaving', '04:30 PM', '05:30 PM', 'Team Lead', 'Family function at home', 'Pending'],
                    [2, 'Out Permission', '11:00 AM', '01:00 PM', 'HR', 'Bank work - loan document submission', 'Pending'],
                    [4, 'Late Coming', '10:00 AM', '11:00 AM', 'Manager', 'Annual medical checkup', 'Rejected'],
                    [5, 'Out Permission', '02:00 PM', '03:30 PM', 'Team Lead', 'Courier pickup at residence', 'Approved'],
                    [6, 'Early Leaving', '05:00 PM', '06:00 PM', 'Manager', 'Child school pickup', 'Approved'],
                    [7, 'Late Coming', '09:30 AM', '10:30 AM', 'HR', 'Train delayed by 45 minutes', 'Approved'],
                    [9, 'Out Permission', '12:00 PM', '02:00 PM', 'Manager', 'Aadhaar update at government office', 'Rejected'],
                    [10, 'Early Leaving', '03:30 PM', '05:00 PM', 'Team Lead', 'Eye checkup appointment', 'Approved'],
                    [11, 'Late Coming', '10:15 AM', '11:15 AM', 'Manager', 'Flat tyre on the way to office', 'Approved'],
                    [13, 'Out Permission', '10:00 AM', '11:00 AM', 'HR', 'Property document signing', 'Approved'],
                    [14, 'Early Leaving', '04:00 PM', '05:00 PM', 'Team Lead', 'Tenant house visit', 'Approved']
                ];
                var todayD = TODAY_DT.getDate();
                configs.forEach(function(c) {
                    var d = todayD - c[0];
                    if (d < 1) return; // indha month-la andha date innum vandha illa — skip
                    pushRow(rows, yr, mo, d, c[1], c[2], c[3], c[4], c[5], c[6]);
                });
                return rows;
            }

            // Past months: seeded deterministic dummy data (refresh panna same dha varum)
            srand(yr * 100 + mo + 7);
            var daysInMonth = new Date(yr, mo + 1, 0).getDate();
            for (var d = daysInMonth; d >= 1; d--) {
                var dow = new Date(yr, mo, d).getDay();
                if (dow === 0) continue; // week off
                if (rint(1, 100) > 32) continue; // ~1/3 working days la permission
                var tr = rint(1, 4);
                var type = tr === 1 ? 'Late Coming' : (tr === 2 ? 'Early Leaving' : (tr === 3 ? 'Out Permission' : 'Go on business'));
                var f, t;
                if (type === 'Late Coming') {
                    f = rint(9 * 60 + 40, 11 * 60);
                    t = f + rint(30, 60);
                } else if (type === 'Early Leaving') {
                    t = rint(16 * 60 + 30, 18 * 60);
                    f = t - rint(30, 60);
                } else {
                    f = rint(10 * 60, 14 * 60 + 30);
                    t = f + rint(30, 120);
                }
                if (t - f > 120) t = f + 120; // max 2h
                var sr = rint(1, 100);
                var status = sr <= 68 ? 'Approved' : (sr <= 88 ? 'Rejected' : 'Pending');
                pushRow(rows, yr, mo, d, type, hhmm12(f), hhmm12(t),
                    ['Manager', 'Team Lead', 'HR'][rint(0, 2)], REASONS[rint(0, REASONS.length - 1)], status);
            }
            return rows;
        }

        var permRequests = buildMonthData(CUR_YR, CUR_MO);

        function updateMonthLabel() {
            var el = document.getElementById('permMonthLabel');
            if (el) el.textContent = 'Permission history \u00b7 ' + MONTHS_FULL[VIEW_MO] + ' ' + VIEW_YR;
        }
        updateMonthLabel();

        // Current user (requests are self-applied, same as Apply Leave flow)
        var currentUser = {
            emp_id: 41,
            name: 'Vijai',
            avatar: 'profile-1.jpg'
        };

        var typeMeta = {
            'Late Coming': { icon: 'bi-sunrise', cls: 'type-late' },
            'Early Leaving': { icon: 'bi-sunset', cls: 'type-early' },
            'Out Permission': { icon: 'bi-box-arrow-right', cls: 'type-out' },
            'Go on business': { icon: 'bi-briefcase', cls: 'type-business' }
        };

        var statusMeta = {
            'Pending': { icon: 'bi-hourglass-split', cls: 'pending' },
            'Approved': { icon: 'bi-check-circle-fill', cls: 'approved' },
            'Rejected': { icon: 'bi-x-circle-fill', cls: 'rejected' }
        };

        function esc(v) {
            var d = document.createElement('div');
            d.appendChild(document.createTextNode(String(v)));
            return d.innerHTML;
        }

        var currentStatusFilter = '';

        function refreshKpis() {
            var pending = 0,
                approved = 0,
                rejected = 0;
            permRequests.forEach(function(r) {
                if (r.status === 'Pending') pending++;
                else if (r.status === 'Approved') approved++;
                else if (r.status === 'Rejected') rejected++;
            });
            document.getElementById('permCountTotal').textContent = String(permRequests.length);
            document.getElementById('permCountPending').textContent = String(pending);
            document.getElementById('permCountApproved').textContent = String(approved);
            document.getElementById('permCountRejected').textContent = String(rejected);
        }

        // Show only rows matching the clicked status block;
        // clicking the active block again resets to all.
        function applyStatusFilter() {
            var list = currentStatusFilter ?
                permRequests.filter(function(r) { return r.status === currentStatusFilter; }) :
                permRequests;
            renderPermissionTable(list);
            document.querySelectorAll('#permStatBlocks .perm-stat-card').forEach(function(card) {
                card.classList.toggle('active', card.getAttribute('data-status') === currentStatusFilter);
            });
        }

        document.querySelectorAll('#permStatBlocks .perm-stat-card').forEach(function(card) {
            card.addEventListener('click', function() {
                var status = card.getAttribute('data-status');
                // Total block = reset to all; status blocks = toggle filter
                currentStatusFilter = status ? ((currentStatusFilter === status) ? '' : status) : '';
                applyStatusFilter();
            });
        });

        // ================================================================
        // MASTER TABLE INIT (same flow as Punch In Report)
        // ================================================================
        var thead = document.getElementById('permTableHead');
        var h = '<th class="gh-cursor-pointer text-nowrap col-sno-70">S.No</th><th class="gh-cursor-pointer text-nowrap">Employee</th><th class="gh-cursor-pointer text-nowrap">Permission Type</th><th class="gh-cursor-pointer text-nowrap">Date</th><th class="gh-cursor-pointer text-nowrap">From Time</th><th class="gh-cursor-pointer text-nowrap">To Time</th><th class="gh-cursor-pointer text-nowrap">Total Hours</th><th class="gh-cursor-pointer text-nowrap">Approved By</th><th class="gh-cursor-pointer text-nowrap">Reason</th><th class="gh-cursor-pointer text-nowrap">Requested On</th><th class="gh-cursor-pointer text-nowrap">Status</th>';
        thead.innerHTML = h;

        function buildRowHtml(row, index) {
            var mType = typeMeta[row.type] || { icon: 'bi-clock', cls: 'type-out' };
            var mStatus = statusMeta[row.status] || { icon: 'bi-clock', cls: 'pending' };

            var html = '<tr data-id="' + esc(row.id) + '">';
            html += '<td class="text-nowrap col-sno-70">' + index + '</td>';
            html += '<td class="text-nowrap">' +
                '<div class="d-flex align-items-center gap-2">' +
                    '<img src="./assets/img/' + esc(row.avatar) + '" class="avatar-sm ep-avatar-size">' +
                    '<div>' +
                        '<div class="person-name">' + esc(row.name) + '</div>' +
                        '<div class="emp-id">' + esc(row.emp_id) + '</div>' +
                    '</div>' +
                '</div>' +
            '</td>';
            html += '<td class="text-nowrap"><span class="perm-type-chip ' + mType.cls + '"><i class="bi ' + mType.icon + '"></i>' + esc(row.type) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-semibold">' + esc(row.date) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-semibold">' + esc(row.from) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-semibold">' + esc(row.to) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-total">' + esc(row.total) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-regular">' + esc(row.approver) + '</span></td>';
            html += '<td><div class="perm-reason-cell" title="' + esc(row.reason).replace(/"/g, '&quot;') + '">' + esc(row.reason) + '</div></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-muted">' + esc(row.requestedOn) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-status-badge ' + mStatus.cls + '"><i class="bi ' + mStatus.icon + '"></i>' + esc(row.status) + '</span></td>';
            html += '</tr>';
            return html;
        }

        function renderPermissionTable(list) {
            var dataList = list || permRequests;
            var tbody = document.getElementById('permBody');
            if (!tbody) return;

            if (!dataList.length) {
                tbody.innerHTML = '<tr class="no-record-row"><td colspan="11" class="text-center text-muted py-4">' +
                    '<div class="perm-empty-state">' +
                        '<div class="empty-icon"><i class="bi bi-inbox"></i></div>' +
                        '<div class="empty-title">No permission requests</div>' +
                        '<div class="empty-sub">You have not applied for any permission in this period.</div>' +
                    '</div>' +
                '</td></tr>';
            } else {
                tbody.innerHTML = dataList.map(function(item, i) {
                    return buildRowHtml(item, i + 1);
                }).join('');
            }

            var tableEl = document.getElementById('myReqTable') || document.getElementById('permissionTable');
            if (tableEl) {
                if (tableEl.autoTable) {
                    tableEl.autoTable.refresh();
                } else if (window.AutoMasterTable) {
                    window.AutoMasterTable.init(tableEl);
                }
            }
        }

        renderPermissionTable(permRequests);

        refreshKpis();

        // ================================================================
        // MONTH + YEAR SELECT2 — thani thaniya select panni,
        // Apply button click panna mattum dummy data filter aagum
        // ================================================================
        var monthSelect = document.getElementById('permMonthSelect');
        var yearSelect = document.getElementById('permYearSelect');

        (function populateMonthYearOptions() {
            // Month options — 12 months full name
            for (var m = 0; m < 12; m++) {
                var opt = document.createElement('option');
                opt.value = String(m);
                opt.textContent = MONTHS_FULL[m];
                monthSelect.appendChild(opt);
            }
            // Year options — current year irundhu 2 varsham back
            for (var y = CUR_YR; y >= CUR_YR - 2; y--) {
                var yopt = document.createElement('option');
                yopt.value = String(y);
                yopt.textContent = y;
                yearSelect.appendChild(yopt);
            }
        })();

        function updateMonthNavState() {
            jQuery(monthSelect).val(String(VIEW_MO)).trigger('change.select2');
            jQuery(yearSelect).val(String(VIEW_YR)).trigger('change.select2');
        }

        function switchMonth(yr, mo) {
            VIEW_YR = yr;
            VIEW_MO = mo;
            permRequests = buildMonthData(yr, mo);
            currentStatusFilter = '';
            applyStatusFilter();
            refreshKpis();
            updateMonthLabel();
            updateMonthNavState();
        }

        // Apply click panna mattum dha filter aagum — select maathina udane illa
        document.getElementById('permApplyFilter').addEventListener('click', function() {
            var btnEl = this;
            var mo = parseInt(jQuery(monthSelect).val(), 10);
            var yr = parseInt(jQuery(yearSelect).val(), 10);
            if (isNaN(mo) || isNaN(yr)) return;
            if (mo === VIEW_MO && yr === VIEW_YR) return; // same selection — nothing to do

            // Short loading flash for feedback
            btnEl.disabled = true;
            btnEl.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Loading…';
            setTimeout(function() {
                switchMonth(yr, mo);
                btnEl.disabled = false;
                btnEl.innerHTML = '<i class="bi bi-funnel-fill me-1"></i> Apply';
                // Filter apply aana odane table-ku scroll
                var sc = document.getElementById('permTableScroll');
                if (sc) sc.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 400);
        });

        // ================================================================
        // SELECT2 INIT — month/year picker + modal dropdowns
        // ================================================================
        jQuery(function() {
            var commonOpts = {
                width: '100%',
                minimumResultsForSearch: Infinity
            };
            jQuery(monthSelect).select2(commonOpts);
            jQuery(yearSelect).select2(commonOpts);
            updateMonthNavState();

            jQuery('#permType').select2({
                width: '100%',
                placeholder: 'Select permission type',
                allowClear: true,
                minimumResultsForSearch: Infinity,
                dropdownParent: jQuery('#permissionApplyModal')
            });

            jQuery('#permApprover').select2({
                width: '100%',
                placeholder: 'Select approver',
                allowClear: true,
                dropdownParent: jQuery('#permissionApplyModal')
            });
        });

        // ================================================================
        // APPLY PERMISSION MODAL
        // ================================================================
        var modal = document.getElementById('permissionApplyModal'),
            formWrap = document.getElementById('permFormWrap'),
            resultWrap = document.getElementById('permResult'),
            resultSub = document.getElementById('permResultSub'),
            formFoot = document.getElementById('permFormFoot'),
            resultFoot = document.getElementById('permResultFoot'),
            submitBtn = document.getElementById('permSubmitBtn'),
            dateInput = document.getElementById('permDate'),
            fromTimeInput = document.getElementById('permFromTime'),
            toTimeInput = document.getElementById('permToTime'),
            reasonInput = document.getElementById('permReason'),
            totalText = document.getElementById('permTotalText');

        var MAX_MINUTES = 120; // Permission maximum = 2 hours

        var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        function parseTimeToMinutes(str) {
            if (!str) return null;
            var m = str.trim().match(/^(\d{1,2}):(\d{2})$/);
            if (!m) return null;
            var hh = parseInt(m[1], 10),
                min = parseInt(m[2], 10);
            if (hh > 23 || min > 59) return null;
            return hh * 60 + min;
        }

        // '14:30' -> '02:30 PM'
        function to12h(str) {
            var mins = parseTimeToMinutes(str);
            if (mins === null) return '';
            var hh = Math.floor(mins / 60),
                min = mins % 60;
            var sfx = hh >= 12 ? 'PM' : 'AM',
                h12 = hh % 12;
            if (h12 === 0) h12 = 12;
            return String(h12).padStart(2, '0') + ':' + String(min).padStart(2, '0') + ' ' + sfx;
        }

        function formatDuration(mins) {
            var hh = Math.floor(mins / 60),
                min = mins % 60,
                parts = [];
            if (hh) parts.push(hh + 'h');
            if (min || !hh) parts.push(min + 'm');
            return parts.join(' ');
        }

        // date-picker format dd-mm-yyyy -> '16 Sep 2026'
        function formatDisplayDate(str) {
            var p = (str || '').split('-');
            if (p.length !== 3) return str;
            var mi = parseInt(p[1], 10) - 1;
            return p[0] + ' ' + (monthNames[mi] || p[1]) + ' ' + p[2];
        }

        // Returns duration in minutes or null when invalid; updates the Total display.
        function recalcTotal() {
            var from = parseTimeToMinutes(fromTimeInput.value),
                to = parseTimeToMinutes(toTimeInput.value);

            totalText.classList.remove('is-ok', 'is-over');

            if (from === null || to === null) {
                totalText.innerHTML = '&ndash;';
                return null;
            }

            var diff = to - from;
            if (diff <= 0) {
                totalText.textContent = 'Invalid range';
                totalText.classList.add('is-over');
                return null;
            }

            totalText.textContent = formatDuration(diff);
            totalText.classList.add(diff > MAX_MINUTES ? 'is-over' : 'is-ok');
            return diff;
        }

        [fromTimeInput, toTimeInput].forEach(function(el) {
            el.addEventListener('input', recalcTotal);
            el.addEventListener('change', recalcTotal);
        });

        submitBtn.addEventListener('click', function() {
            var type = jQuery('#permType').val();
            var approver = jQuery('#permApprover').val();
            var totalMinutes = recalcTotal();

            // ---- Inline validation (red borders + per-field messages) ----
            var errors = {};
            if (!dateInput.value) errors.date = true;
            if (!type) errors.type = true;
            if (!fromTimeInput.value || !toTimeInput.value) errors.time = 'Please select both From and To time';
            else if (totalMinutes === null) errors.time = 'To time should be after From time';
            else if (totalMinutes > MAX_MINUTES) errors.time = 'Permission total cannot be more than 2 hours';
            if (!approver) errors.approver = true;
            if (!reasonInput.value.trim() || reasonInput.value.trim().length < 5) errors.reason = true;

            document.querySelectorAll('#permFormWrap .perm-row[data-field]').forEach(function(row) {
                var f = row.getAttribute('data-field');
                row.classList.toggle('has-error', !!errors[f]);
                if (f === 'time' && typeof errors.time === 'string') {
                    document.getElementById('permTimeError').textContent = errors.time;
                }
            });

            if (Object.keys(errors).length) {
                var firstErr = document.querySelector('#permFormWrap .perm-row.has-error');
                if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // ---- Loading state (fake save delay — dummy flow) ----
            submitBtn.classList.add('loading');
            var btn = this;
            setTimeout(function() {
                submitBtn.classList.remove('loading');

                // Pudhu request current month-ku dha — vera month paakumbothu current-ku jump
                if (!(VIEW_YR === CUR_YR && VIEW_MO === CUR_MO)) switchMonth(CUR_YR, CUR_MO);

                // Add as a new Pending row in the table (dummy flow)
                var nextId = permRequests.reduce(function(m, r) {
                    return Math.max(m, r.id);
                }, 0) + 1;
                var now = new Date();
                var todayStr = now.getDate() + ' ' + monthNames[now.getMonth()] + ' ' + now.getFullYear();
                var todayKey = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0') + '-' + String(now.getDate()).padStart(2, '0');

                permRequests.unshift({
                    id: nextId,
                    emp_id: currentUser.emp_id,
                    name: currentUser.name,
                    avatar: currentUser.avatar,
                    type: type,
                    date: formatDisplayDate(dateInput.value),
                    dateKey: dateInput.value.split('-').reverse().join('-'),
                    from: to12h(fromTimeInput.value),
                    to: to12h(toTimeInput.value),
                    totalMin: totalMinutes,
                    total: formatDuration(totalMinutes),
                    approver: approver,
                    reason: reasonInput.value.trim(),
                    status: 'Pending',
                    requestedOn: todayStr,
                    requestedOnKey: todayKey
                });
                renderPermissionTable(permRequests);
                refreshKpis();
                // New requests are Pending — jump to the Pending block view
                currentStatusFilter = 'Pending';
                applyStatusFilter();

                // Success step
                formWrap.style.display = 'none';
                formFoot.classList.add('d-none');
                resultWrap.classList.add('show');
                resultFoot.classList.remove('d-none');
                resultSub.textContent = type + ' \u00b7 ' + formatDuration(totalMinutes) + ' request sent to ' + approver + ' for approval.';
            }, 650);
        });

        // Error state live clear — user type panna udane poidum
        [dateInput, reasonInput, fromTimeInput, toTimeInput].forEach(function(el) {
            el.addEventListener('input', function() {
                var row = el.closest('.perm-row[data-field]');
                if (row) row.classList.remove('has-error');
            });
        });
        ['#permType', '#permApprover'].forEach(function(sel) {
            jQuery(document).on('change', sel, function() {
                var row = jQuery(sel).closest('.perm-row[data-field]');
                if (this.value) row.removeClass('has-error');
            });
        });

        // Toggle Advance Payment Section when Permission Type is 'Go on business'
        function getAdvRowTemplate(isFirst) {
            var btnHtml = isFirst ?
                '<button type="button" class="btn btn-adv-add" id="advAddRowBtn" title="Add row"><i class="bi bi-plus-lg"></i></button>' :
                '<button type="button" class="btn btn-adv-remove" title="Remove row"><i class="bi bi-dash-lg"></i></button>';

            return '<div class="adv-pay-row">' +
                '<div class="adv-pay-col">' +
                '<select class="form-select adv-used-to">' +
                '<option value="" disabled selected>Select category</option>' +
                '<option value="Food Reimbursement">Food Reimbursement</option>' +
                '<option value="Travel Expense">Travel Expense</option>' +
                '<option value="Lodging & Hotel">Lodging & Hotel</option>' +
                '<option value="Client Meeting">Client Meeting</option>' +
                '<option value="Fuel Expense">Fuel Expense</option>' +
                '<option value="Other Expenses">Other Expenses</option>' +
                '</select>' +
                '</div>' +
                '<div class="adv-pay-col">' +
                '<input type="number" min="0" step="1" class="form-control adv-amount" placeholder="Enter amount (₹)">' +
                '</div>' +
                '<div class="adv-pay-col-btn">' +
                btnHtml +
                '</div>' +
                '</div>';
        }

        function resetAdvPaySection() {
            var rowsContainer = document.getElementById('advPayRows');
            if (rowsContainer) {
                rowsContainer.innerHTML = getAdvRowTemplate(true);
            }
            var advSec = document.getElementById('advancePaymentSection');
            if (advSec) advSec.style.display = 'none';
        }

        jQuery('#permType').on('change', function() {
            var val = jQuery(this).val();
            if (val === 'Go on business') {
                jQuery('#advancePaymentSection').slideDown(220);
            } else {
                jQuery('#advancePaymentSection').slideUp(200);
            }
        });

        var advRowsContainer = document.getElementById('advPayRows');
        if (advRowsContainer) {
            advRowsContainer.addEventListener('click', function(e) {
                var addBtn = e.target.closest('#advAddRowBtn');
                if (addBtn) {
                    var temp = document.createElement('div');
                    temp.innerHTML = getAdvRowTemplate(false);
                    advRowsContainer.appendChild(temp.firstElementChild);
                    return;
                }
                var removeBtn = e.target.closest('.btn-adv-remove');
                if (removeBtn) {
                    var row = removeBtn.closest('.adv-pay-row');
                    if (row) row.remove();
                }
            });
        }

        // Enter key = submit (textarea avoid)
        modal.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA' && !e.shiftKey &&
                formWrap.style.display !== 'none') {
                e.preventDefault();
                submitBtn.click();
            }
        });

        // Reset to the form step on close
        modal.addEventListener('hidden.bs.modal', function() {
            formWrap.style.display = '';
            formFoot.classList.remove('d-none');
            resultWrap.classList.remove('show');
            resultFoot.classList.add('d-none');
            dateInput.value = '';
            fromTimeInput.value = '';
            toTimeInput.value = '';
            reasonInput.value = '';
            totalText.innerHTML = '&ndash;';
            totalText.classList.remove('is-ok', 'is-over');
            document.querySelectorAll('#permFormWrap .perm-row.has-error').forEach(function(row) {
                row.classList.remove('has-error');
            });
            submitBtn.classList.remove('loading');
            jQuery('#permType').val(null).trigger('change');
            jQuery('#permApprover').val(null).trigger('change');
            resetAdvPaySection();
        });
    })();
</script>
