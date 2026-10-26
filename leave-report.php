<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/date-picker.css">



<style>
    .month-nav {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .month-arrow {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: transparent;
        border-radius: 12px;
        background: transparent;
        color: var(--ink-900);
        cursor: pointer;
        transition: background .15s ease, color .15s ease, transform .15s ease;
    }

    .month-arrow.previews {
        margin-right: -49px;
        position: relative;
        border-radius: 50px;
        margin-top: -1px;
        z-index: 1;
    }

    .month-arrow.next {
        margin-left: -50px;
        position: relative;
        border-radius: 50px;
        margin-top: -1px;
    }

    .month-arrow:hover {
        color: var(--primary);
    }

    .month-nav input.date-input {
        box-shadow: unset;
        border: 1px solid var(--border-soft);
        border-radius: 10px;
        text-align: center;
        font-weight: 700;
    }

    .month-nav input.date-input:hover {
        border: 1px solid var(--primary);
    }

    .month-select-wrap {
        position: relative;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
    }

    .leave-report-page {
        --leave-blue: #3b82f6;
    }

    .leave-report-page .leave-month-nav {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .leave-report-page .leave-month-arrow {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 50px;
        background: transparent;
        color: var(--ink-900);
        cursor: pointer;
        transition: color .15s ease, transform .15s ease;
    }

    .leave-report-page .leave-month-arrow:hover {
        color: var(--primary);
        transform: scale(1.08);
    }

    .leave-report-page .leave-month-arrow:first-child {
        margin-right: -49px;
        position: relative;
        z-index: 1;
    }

    .leave-report-page .leave-month-arrow:last-child {
        margin-left: -50px;
        position: relative;
        z-index: 1;
    }

    .leave-report-page .leave-date-picker .date-input {
        width: 150px;
        text-align: center;
        font-weight: 700;
        border: 1px solid var(--border-soft);
        border-radius: 10px;
        box-shadow: none;
    }

    .leave-report-page .leave-date-picker .date-input:hover {
        border-color: var(--primary);
    }

    .leave-report-page .leave-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 11px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 800;
    }

    .leave-report-page .leave-status.approved {
        color: var(--primary-dark);
        background: var(--primary-light);
    }

    .leave-report-page .leave-status.pending {
        color: #a3670a;
        background: var(--accent-amber-soft);
    }

    .leave-report-page .leave-status.rejected {
        color: #c0362c;
        background: var(--accent-red-soft);
    }

    .leave-report-page .leave-type {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-weight: 700;
        white-space: nowrap;
    }

    .leave-report-page .leave-type::before {
        content: '';
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--leave-blue);
    }

    .leave-report-page .leave-type.sick::before {
        background: var(--accent-amber);
    }

    .leave-report-page .leave-type.earned::before {
        background: var(--primary);
    }

    .leave-report-page .leave-type.wfh::before {
        background: var(--accent-violet);
    }

    .leave-report-page .leave-balance {
        min-width: 125px;
        font-size: 11px;
    }

    .leave-report-page .balance-track {
        height: 6px;
        margin-top: 5px;
        overflow: hidden;
        border-radius: 999px;
        background: #eef0f3;
    }

    .leave-report-page .balance-fill {
        height: 100%;
        border-radius: 999px;
        background: linear-gradient(90deg, #16a34a, #4ade80);
    }

    .leave-report-page .leave-active-bar {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        padding: 10px 14px;
        margin-bottom: 12px;
        border: 1px solid #eef0f3;
        border-radius: 14px;
        background: #fff;
    }

    .leave-report-page .leave-active-label {
        color: var(--ink-500);
        font-size: 12.5px;
        font-weight: 600;
    }

    .leave-report-page .leave-chip {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 6px 8px 6px 11px;
        border-radius: 999px;
        background: var(--primary-light);
        color: var(--primary-dark);
        font-size: 12px;
        font-weight: 700;
    }

    .leave-report-page .leave-chip-close {
        width: 18px;
        height: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 50%;
        background: rgba(0, 0, 0, .06);
        color: inherit;
        cursor: pointer;
        font-size: 13px;
        line-height: 1;
        padding: 0;
    }

    .leave-report-page .leave-chip-close:hover {
        background: rgba(0, 0, 0, .14);
    }

    .leave-report-page .leave-summary-card.active {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(22, 163, 74, .38);
        background: linear-gradient(135deg, #f0fbf3 0%, #ffffff 78%);
        box-shadow: 0 10px 26px rgba(22, 163, 74, .13), 0 0 0 3px rgba(22, 163, 74, .07);
    }

    .leave-report-page .leave-summary-card.active::before {
        content: '';
        position: absolute;
        inset: 0 auto 0 0;
        width: 4px;
        background: var(--primary);
    }

    .leave-report-page .leave-summary-card.active::after {
        /* content: 'ACTIVE';
        position: absolute;
        top: 12px;
        right: 14px;
        padding: 3px 8px;
        border-radius: 999px;
        background: var(--primary-light);
        color: var(--primary-dark);
        font-size: 9px;
        font-weight: 800;
        letter-spacing: .06em; */
    }

    /* Override ::after color for theme-specific active states - all use green */
    .leave-report-page .leave-summary-card.stat-theme-primary.active::after,
    .leave-report-page .leave-summary-card.stat-theme-amber.active::after,
    .leave-report-page .leave-summary-card.stat-theme-red.active::after,
    .leave-report-page .leave-summary-card.stat-theme-violet.active::after,
    .leave-report-page .leave-summary-card.stat-theme-blue.active::after {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .leave-report-page .leave-summary-card.active .stat-icon {
        background: var(--primary) !important;
        color: #fff !important;
        box-shadow: 0 5px 12px rgba(22, 163, 74, .22);
    }

    .leave-report-page .leave-summary-card.active .label {
        color: var(--primary-dark);
        font-weight: 800;
    }

    .leave-report-page .leave-summary-card {
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .leave-report-page .leave-summary-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Theme-specific active states - all use green */
    .leave-report-page .leave-summary-card.stat-theme-primary.active,
    .leave-report-page .leave-summary-card.stat-theme-amber.active,
    .leave-report-page .leave-summary-card.stat-theme-red.active,
    .leave-report-page .leave-summary-card.stat-theme-violet.active,
    .leave-report-page .leave-summary-card.stat-theme-blue.active {
        border-color: rgba(22, 163, 74, .38);
        background: linear-gradient(135deg, #f0fbf3 0%, #ffffff 78%);
        box-shadow: 0 10px 26px rgba(22, 163, 74, .13), 0 0 0 3px rgba(22, 163, 74, .07);
    }

    .leave-report-page .leave-summary-card.stat-theme-primary.active::before,
    .leave-report-page .leave-summary-card.stat-theme-amber.active::before,
    .leave-report-page .leave-summary-card.stat-theme-red.active::before,
    .leave-report-page .leave-summary-card.stat-theme-violet.active::before,
    .leave-report-page .leave-summary-card.stat-theme-blue.active::before {
        background: var(--primary);
    }

    .leave-report-page .leave-summary-card.stat-theme-primary.active .stat-icon,
    .leave-report-page .leave-summary-card.stat-theme-amber.active .stat-icon,
    .leave-report-page .leave-summary-card.stat-theme-red.active .stat-icon,
    .leave-report-page .leave-summary-card.stat-theme-violet.active .stat-icon,
    .leave-report-page .leave-summary-card.stat-theme-blue.active .stat-icon {
        background: var(--primary) !important;
        color: #fff !important;
        box-shadow: 0 5px 12px rgba(22, 163, 74, .22);
    }

    .leave-report-page .leave-active-clear {
        margin-left: auto;
        border: 0;
        background: transparent;
        color: var(--accent-red);
        font-size: 12.5px;
        font-weight: 700;
        text-decoration: underline;
        cursor: pointer;
    }

    .leave-report-page .table-modern-wrap {
        /* overflow-x: hidden !important; */
    }

    .leave-report-page .table-modern {
        width: 100%;
        /* table-layout: fixed; */
        min-width: 0;
    }

    .leave-report-page .table-modern thead th,
    .leave-report-page .table-modern tbody td {
        padding-left: 10px;
        padding-right: 10px;
        white-space: nowrap !important;
    }

    .leave-report-page .table-modern thead th:nth-child(1) {
        width: 52px;
    }

    .leave-report-page .table-modern thead th:nth-child(2) {
        width: 105px;
    }

    .leave-report-page .table-modern thead th:nth-child(3) {
        width: 155px;
    }

    .leave-report-page .table-modern thead th:nth-child(4) {
        width: 135px;
    }

    .leave-report-page .table-modern thead th:nth-child(5),
    .leave-report-page .table-modern thead th:nth-child(6) {
        width: 95px;
    }

    .leave-report-page .table-modern thead th:nth-child(7) {
        width: 55px;
    }

    .leave-report-page .table-modern thead th:nth-child(8) {
        width: 145px;
    }

    .leave-report-page .table-modern thead th:nth-child(9) {
        width: 145px;
    }

    .leave-report-page .table-modern thead th:nth-child(10) {
        width: 105px;
    }

    .leave-report-page .table-modern thead th:nth-child(11) {
        width: 75px;
    }

    .leave-report-page .table-modern tbody td:nth-child(5),
    .leave-report-page .table-modern tbody td:nth-child(6),
    .leave-report-page .table-modern tbody td:nth-child(8) {
        white-space: normal;
        word-break: break-word;
    }

    .leave-report-page .person-name {
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* ===== Leave Apply Modal (native Bootstrap modal) ===== */
    #leaveApplyModal .modal-dialog {
        max-width: min(100%, 760px);
    }

    #leaveApplyModal .modal-content {
        border: 0;
        border-radius: 16px;
        /* max-height: 90vh; */
        /* overflow-y: auto; */
        box-shadow: 0 24px 70px rgba(22, 32, 43, .22);
        overflow: unset;
    }

    .leave-apply-body {
        padding: 20px 22px;
    }

    .leave-apply-grid {
        display: grid;
        grid-template-columns: 1fr 230px;
        gap: 22px;
    }

    @media (max-width: 720px) {
        .leave-apply-grid {
            grid-template-columns: 1fr;
        }
    }

    .leave-apply-row {
        margin-bottom: 16px;
    }

    .leave-apply-row label {
        font-weight: 600;
        font-size: 13px;
        color: var(--ink-900);
        margin-bottom: 6px;
        display: block;
    }

    .leave-apply-date-row {
        display: flex;
        gap: 10px;
    }

    .leave-apply-date-row .date-picker {
        flex: 1 1 0;
    }

    .leave-apply-summary-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 6px 2px;
    }

    .leave-apply-summary-row .summary-date {
        font-weight: 600;
        font-size: 13.5px;
        color: var(--ink-900);
    }

    .leave-apply-summary-row select {
        max-width: 150px;
    }

    .leave-apply-summary-row.total-row {
        border-top: 1px solid #eef0f3;
        padding-top: 10px;
        margin-top: 4px;
        margin-bottom: 18px;
    }

    .leave-apply-summary-row.total-row span:first-child {
        font-weight: 600;
        color: var(--ink-500);
        font-size: 13px;
    }

    .leave-apply-summary-row.total-row strong {
        font-size: 13.5px;
    }

    /* Right-side balance summary */
    .leave-apply-side {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .leave-balance-box {
        background: #f8f9fa;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        padding: 12px;
        font-size: 13px;
    }

    .leave-balance-box-head {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        font-size: 11.5px;
        color: var(--ink-500);
        margin-bottom: 10px;
        font-weight: 600;
    }

    .leave-balance-line {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        font-size: 12.5px;
    }

    .leave-balance-line span {
        color: var(--ink-500);
    }

    .leave-balance-line strong {
        font-weight: 700;
    }

    .leave-balance-line.total {
        border-top: 1px solid #e3e6ea;
        padding-top: 8px;
        margin-top: 2px;
        margin-bottom: 0;
    }

    .leave-balance-line.total span {
        color: var(--ink-900);
        font-weight: 600;
    }

    .leave-balance-line.total strong {
        color: var(--primary);
    }

    /* Select2 customization for leave modal */
    .select2-user-option {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .select2-user-image {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        object-fit: cover;
    }

    .select2-user-selected {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* ===== Active Filters Bar ===== */
    .active-filters-bar {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        background: #fff;
        border: 1px solid var(--ink-100, #eef0f3);
        border-radius: 14px;
        padding: 0 14px;
        margin-bottom: 0;
        box-shadow: 0 2px 10px rgba(20, 20, 43, 0.04);

        max-height: 0;
        opacity: 0;
        overflow: hidden;
        border-width: 0;
        transform: translateY(-6px);
        transition: max-height 0.4s cubic-bezier(.4, 0, .2, 1),
            opacity 0.3s ease,
            transform 0.35s cubic-bezier(.34, 1.2, .64, 1),
            padding 0.4s ease,
            margin 0.4s ease,
            border-width 0.3s ease;
    }

    .active-filters-bar.show {
        max-height: 200px;
        opacity: 1;
        padding: 12px 14px;
        margin-bottom: 12px;
        border-width: 1px;
        transform: translateY(0);
    }

    .active-filters-label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-500, #7a7f8c);
        white-space: nowrap;
        margin-right: 2px;
    }

    .filter-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--primary-light, #e8f7ea);
        color: var(--primary-dark, #0ca308);
        font-size: 12.5px;
        font-weight: 600;
        padding: 6px 8px 6px 12px;
        border-radius: 999px;
        opacity: 0;
        transform: translateY(-8px) scale(0.92);
        animation: chipIn 0.35s cubic-bezier(.34, 1.56, .64, 1) forwards;
    }

    @keyframes chipIn {
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .filter-chip .chip-key {
        font-weight: 500;
        color: var(--ink-500, #7a7f8c);
    }

    .filter-chip .chip-close {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.06);
        color: inherit;
        cursor: pointer;
        border: none;
        font-size: 11px;
        line-height: 1;
        transition: background 0.15s ease, transform 0.15s ease;
    }

    .filter-chip .chip-close:hover {
        background: rgba(0, 0, 0, 0.14);
        transform: rotate(90deg);
    }

    .filter-chip.removing {
        animation: chipOut 0.25s ease forwards;
    }

    @keyframes chipOut {
        to {
            opacity: 0;
            transform: translateY(-6px) scale(0.9);
            margin: 0 -100px 0 0;
            padding: 0;
            width: 0;
        }
    }

    .active-filters-clear {
        margin-left: auto;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--accent-red, #e5484d);
        background: transparent;
        border: none;
        cursor: pointer;
        white-space: nowrap;
    }

    .active-filters-clear:hover {
        text-decoration: underline;
    }

    .filters-card {
        position: relative;
        z-index: 50;
    }

    /* ===== Partial Approve Modal — Per-Day Cards ===== */
    .partial-emp-info {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        background: #f8f9fa;
        border-radius: 10px;
        margin-bottom: 14px;
    }

    .partial-days-summary-bar {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .partial-summary-chip {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
    }

    .partial-summary-chip.approved-chip {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .partial-summary-chip.rejected-chip {
        background: var(--accent-red-soft);
        color: #c0362c;
    }

    .partial-summary-chip.pending-chip {
        background: var(--accent-amber-soft);
        color: #a3670a;
    }

    .partial-days-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        max-height: 320px;
        overflow-y: auto;
        padding-right: 4px;
    }

    .partial-day-card {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border: 1.5px solid #e5e7eb;
        border-radius: 12px;
        background: #fff;
        cursor: pointer;
        transition: all 0.2s ease;
        user-select: none;
    }

    .partial-day-card:hover {
        border-color: #c7d2da;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .partial-day-card.status-approved {
        border-color: #86efac;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
    }

    .partial-day-card.status-rejected {
        border-color: #fca5a5;
        background: linear-gradient(135deg, #fef2f2 0%, #ffffff 100%);
    }

    .partial-day-card.status-pending {
        border-color: #fcd34d;
        background: linear-gradient(135deg, #fffbeb 0%, #ffffff 100%);
    }

    .partial-day-num {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: var(--ink-50);
        color: var(--ink-700);
        font-weight: 800;
        font-size: 14px;
        flex-shrink: 0;
        transition: all 0.2s ease;
    }

    .partial-day-card.status-approved .partial-day-num {
        background: var(--primary);
        color: #fff;
    }

    .partial-day-card.status-rejected .partial-day-num {
        background: #ef4444;
        color: #fff;
    }

    .partial-day-card.status-pending .partial-day-num {
        background: #f59e0b;
        color: #fff;
    }

    .partial-day-info {
        flex: 1;
        min-width: 0;
    }

    .partial-day-date {
        font-size: 13.5px;
        font-weight: 700;
        color: var(--ink-900);
    }

    .partial-day-dow {
        font-size: 11px;
        color: var(--ink-500);
        font-weight: 600;
    }

    .partial-day-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 800;
        flex-shrink: 0;
    }

    .partial-day-status-badge.badge-approved {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .partial-day-status-badge.badge-rejected {
        background: var(--accent-red-soft);
        color: #c0362c;
    }

    .partial-day-status-badge.badge-pending {
        background: var(--accent-amber-soft);
        color: #a3670a;
    }

    .partial-day-status-badge .bi {
        font-size: 10px;
    }

    .partial-day-actions {
        display: flex;
        gap: 8px;
        flex-shrink: 0;
    }

    .partial-day-approve-btn,
    .partial-day-reject-btn {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #fff;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .partial-day-approve-btn {
        border: 1.5px solid #86efac;
        color: #16a34a;
    }

    .partial-day-approve-btn:hover {
        background: #f0fdf4;
        border-color: #16a34a;
    }

    .partial-day-reject-btn {
        border: 1.5px solid #fca5a5;
        color: #dc2626;
    }

    .partial-day-reject-btn:hover {
        background: #fef2f2;
        border-color: #dc2626;
    }

    .partial-day-card.status-approved .partial-day-approve-btn {
        background: #16a34a;
        border-color: #16a34a;
        color: #fff;
    }

    .partial-day-card.status-rejected .partial-day-reject-btn {
        background: #ef4444;
        border-color: #ef4444;
        color: #fff;
    }

    .partial-day-view-reason {
        display: none;
        align-items: center;
        gap: 5px;
        margin-top: 6px;
        padding: 0;
        border: 0;
        background: none;
        color: #dc2626;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
    }

    .partial-day-card.status-rejected .partial-day-view-reason {
        display: inline-flex;
    }

    .partial-day-view-reason:hover {
        text-decoration: underline;
    }

    /* Action menu items: app.css forces display:flex !important — hidden attribute must win */
    .leave-action-item[hidden],
    .leave-action-menu .leave-action-item[hidden] {
        display: none !important;
    }

    /* Export dropdown (duplicated here because table.css loads in <body> and may not apply) */
    .mt-export-menu {
        position: relative;
        display: inline-block;
    }

    .mt-export-dropdown {
        position: fixed !important;
        z-index: 9999 !important;
        min-width: 160px;
        background: #fff;
        border: 1px solid var(--border-soft);
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, .12);
        padding: 6px !important;
        display: none !important;
        flex-direction: column;
    }

    .mt-export-dropdown.show {
        display: flex !important;
    }

    .mt-export-item {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 8px 12px;
        font-size: 12px;
        font-weight: 600;
        font-family: 'Manrope', sans-serif;
        color: var(--ink-700);
        background: none;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background .12s;
        text-align: left;
        white-space: nowrap;
    }

    .mt-export-item:hover {
        background: var(--primary-soft);
        color: var(--primary-dark);
    }

    .mt-export-item i {
        font-size: 14px;
        color: var(--ink-500);
    }

    .mt-export-item:hover i {
        color: var(--primary);
    }

    .mt-export-trigger[aria-expanded="true"] .bi-chevron-down {
        transform: rotate(180deg);
    }

    .partial-note-row {
        margin-top: 4px;
    }

    .partial-note-row textarea {
        font-size: 13px;
    }

    /* Toast notification */
    .partial-toast {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 10000;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        opacity: 0;
        transform: translateY(12px);
        transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .partial-toast.show {
        opacity: 1;
        transform: translateY(0);
    }

    .partial-toast-success {
        background: #f0fdf4;
        color: #15803d;
        border: 1px solid #bbf7d0;
    }

    .filters-toggle-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .filters-toggle-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--primary-light, #e8f7ea);
        color: var(--primary-dark, #0ca308);
        border: none;
        font-weight: 600;
        font-size: 13.5px;
        padding: 9px 16px;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .filters-toggle-btn:hover {
        background: #d7f0da;
    }

    .filters-toggle-btn .chevron {
        transition: transform 0.35s cubic-bezier(.4, 0, .2, 1);
        font-size: 12px;
    }

    .filters-toggle-btn.open .chevron {
        transform: rotate(180deg);
    }

    .filters-collapse {
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transform: translateY(-8px);
        transition: max-height 0.45s cubic-bezier(.4, 0, .2, 1),
            opacity 0.35s ease,
            transform 0.4s cubic-bezier(.34, 1.1, .64, 1),
            margin 0.45s ease;
        margin-top: 0;
    }

    .filters-collapse.open {
        max-height: 600px;
        opacity: 1;
        transform: translateY(0);
        margin-top: 16px;
        overflow: visible;
    }

    .filters-collapse .row>div {
        /* opacity: 0; */
        transform: translateY(-6px);
    }

    .filters-collapse.open .row>div {
        animation: fieldIn 0.35s ease forwards;
    }

    .filters-collapse.open .row>div:nth-child(1) {
        animation-delay: 0.03s;
    }

    .filters-collapse.open .row>div:nth-child(2) {
        animation-delay: 0.06s;
    }

    .filters-collapse.open .row>div:nth-child(3) {
        animation-delay: 0.09s;
    }

    .filters-collapse.open .row>div:nth-child(4) {
        animation-delay: 0.12s;
    }

    .filters-collapse.open .row>div:nth-child(5) {
        animation-delay: 0.15s;
    }

    .filters-collapse.open .row>div:nth-child(6) {
        animation-delay: 0.18s;
    }

    /* ===== Leave Balance cards (Leave Balance tab) ===== */
    .leave-balance-scroll-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }

    .leave-balance-scroll {
        display: flex;
        gap: 18px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding: 6px 4px 14px;
        scrollbar-width: none;
    }

    .leave-balance-scroll::-webkit-scrollbar {
        display: none;
    }

    .leave-balance-card {
        flex: 0 0 auto;
        width: 220px;
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        padding: 18px 20px 16px;
        cursor: pointer;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .leave-balance-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
    }

    .leave-balance-card-title {
        font-weight: 800;
        font-size: 15px;
        color: var(--ink-900);
        margin-bottom: 16px;
    }

    .leave-balance-card-icon {
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-size: 17px;
        margin-bottom: 18px;
    }

    .leave-balance-theme-blue .leave-balance-card-icon {
        background: #e8f0fe;
        color: #3b82f6;
    }

    .leave-balance-theme-amber .leave-balance-card-icon {
        background: #fdf1e0;
        color: #d98a17;
    }

    .leave-balance-theme-green .leave-balance-card-icon {
        background: var(--primary-light, #e8f7ea);
        color: var(--primary, #16a34a);
    }

    .leave-balance-theme-violet .leave-balance-card-icon {
        background: #f0eafb;
        color: var(--accent-violet, #8b5cf6);
    }

    .leave-balance-card-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 13px;
        color: var(--ink-500);
        margin-bottom: 4px;
    }

    .leave-balance-card-row strong {
        color: var(--ink-900);
        font-weight: 700;
    }

    .leave-balance-nav-arrow {
        flex: 0 0 auto;
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #eef0f3;
        border-radius: 50%;
        background: #fff;
        color: var(--ink-900);
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
        z-index: 1;
    }

    .leave-balance-nav-prev {
        margin-right: -17px;
    }

    .leave-balance-nav-next {
        margin-left: -17px;
    }

    /* ===== Team Calendar (inline version of the attendance calendar modal) ===== */
    .leave-report-page {
        --att-present-bg: #e8f7ea;
        --att-absent-bg: #fdeceb;
        --att-danger: #e5484d;
        --att-late-bg: #fff4e0;
        --att-late-fg: #c07a00;
        --att-half-bg: #f1ecff;
        --att-half-fg: #7c5cfa;
        --att-leave-bg: #eaf0fe;
        --att-leave-fg: #3564e0;
        --att-holiday-bg: #f1f3f5;
        --att-holiday-fg: #6c757d;
    }

    .leave-report-page .acm-body {
        display: flex;
        gap: 15px;
    }

    .leave-report-page .acm-summary {
        gap: 12px;
        position: relative;
        z-index: 2;
        flex-direction: column;
        display: flex;
    }

    .leave-report-page .acm-summary .card {
        background: #fff;
        border: 1px solid var(--border-soft, #ece6da);
        border-radius: 14px;
        padding: 14px 12px;
        text-align: center;
        box-shadow: 0 10px 24px rgba(20, 30, 20, .07);
        transition: transform .2s ease, box-shadow .2s ease;
        min-width: 170px;
        height: 100%;
        width: 100%;
        align-items: center;
        justify-content: center;
    }

    .leave-report-page .acm-summary .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(20, 30, 20, .1);
    }

    .leave-report-page .acm-summary .card .n {
        font-size: 21px;
        font-weight: 800;
        line-height: 1.2;
    }

    .leave-report-page .acm-summary .card .l {
        font-size: 10px;
        font-weight: 700;
        color: var(--bs-gray);
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-top: 4px;
    }

    .leave-report-page .acm-cal-head {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 18px;
        margin-bottom: 16px;
    }

    .leave-report-page .acm-cal-head.mb-0 {
        margin-bottom: 0;
    }

    .leave-report-page .acm-cal-head .month {
        font-weight: 800;
        font-size: 15.5px;
        min-width: 150px;
        text-align: center;
    }

    .leave-report-page .acm-nav-btn {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        border: 1px solid var(--border-soft, #ece6da);
        background: #fff;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .15s ease, transform .15s ease;
    }

    .leave-report-page .acm-nav-btn:hover {
        background: var(--att-present-bg);
        color: var(--primary);
        transform: scale(1.06);
    }

    .leave-report-page .acm-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
    }

    .leave-report-page .acm-dow {
        text-align: center;
        font-size: 10.5px;
        font-weight: 700;
        color: var(--bs-gray);
        text-transform: uppercase;
        letter-spacing: .4px;
        padding-bottom: 10px;
        margin-bottom: 4px;
        border-bottom: 1px solid var(--border-soft, #ece6da);
    }

    .leave-report-page .acm-day {
        height: 100px;
        border-radius: 12px;
        border: 1px solid rgba(0, 0, 0, .04);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: space-between;
        padding: 8px 9px;
        font-size: 12px;
        font-weight: 700;
        cursor: default;
        opacity: 0;
        transform: scale(.9);
        animation: tcDayIn .28s ease forwards;
        position: relative;
        transition: transform .15s ease, box-shadow .15s ease;
    }

    .leave-report-page .acm-day:not(.empty):hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(20, 30, 20, .1);
        z-index: 1;
    }

    .leave-report-page .acm-day.empty {
        visibility: hidden;
    }

    .leave-report-page .acm-day.acm-today {
        border: 1.5px solid currentColor;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, .12);
    }

    .leave-report-page .acm-day.acm-holiday {
        background-image: repeating-linear-gradient(135deg, rgba(0, 0, 0, .025) 0px, rgba(0, 0, 0, .025) 5px, transparent 5px, transparent 10px);
    }

    .leave-report-page .acm-day .num {
        font-size: 13px;
        font-weight: 800;
        align-self: flex-start;
    }

    .leave-report-page .acm-day .tag {
        align-self: flex-start;
        font-size: 8.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .3px;
        padding: 2px 7px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .55);
    }

    @keyframes tcDayIn {
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .leave-report-page .acm-legend {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 18px;
        margin-top: 20px;
        padding-top: 16px;
        border-top: 1px dashed var(--border-soft, #ece6da);
    }

    .leave-report-page .acm-legend .item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 600;
        color: var(--bs-gray);
    }

    .leave-report-page .acm-legend .swatch {
        width: 10px;
        height: 10px;
        border-radius: 3px;
    }

    @media (max-width: 768px) {
        .leave-report-page .acm-body {
            flex-direction: column;
        }

        .leave-report-page .acm-summary {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .leave-report-page .acm-day {
            height: 58px;
            padding: 6px 7px;
        }

        .leave-report-page .acm-day .num {
            font-size: 11.5px;
        }

        .leave-report-page .acm-day .tag {
            font-size: 7.5px;
            padding: 1px 5px;
        }
    }
</style>

<main class="leave-report-page">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Leave Report</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap overflow-auto breadcrumb-text">
                <i class="bi bi-calendar-heart fs-6"></i><span>Leave Management</span><i class="bi bi-chevron-right"></i><span class="fw-bold text-dark">Leave Reports</span>
            </nav>
        </div>
        <!-- <div class="d-flex gap-2"><button type="button" class="btn btn-primary px-3 py-2" data-bs-toggle="modal" data-bs-target="#leaveApplyModal"><i class="bi bi-plus-lg me-1"></i>Apply Leave</button></div> -->
    </div>

    <div class="d-flex gap-2 mb-3 flex-wrap text-nowrap" role="group" aria-label="Leave report tabs">
        <button type="button" class="btn btn-outline-primary active" id="leaveTabRequests" data-leave-tab="requests">Leave Requests</button>
        <!-- <button type="button" class="btn btn-outline-primary" id="" >Leave Balance</button> -->
        <button type="button" class="btn btn-outline-primary" id="leaveTabTeamCalendar" data-leave-tab="team-calendar">Team Calendar</button>
    </div>

    <div id="leaveSectionRequests">
        <div class="row g-3 mb-3">
            <div class="col-sm-6 col-md-4 col-xl text-nowrap">
                <div class="stat-card stat-theme-violet leave-summary-card active d-flex align-items-center gap-3" aria-current="true" data-status-filter="all">
                    <div class="stat-icon stat-icon-lg"><i class="bi bi-file-earmark-text"></i></div>
                    <div>
                        <div class="label">Total Requests</div>
                        <div class="value">24</div>
                        <div class="delta text-neutral">This month</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl text-nowrap">
                <div class="stat-card stat-theme-primary d-flex align-items-center gap-3 leave-summary-card" data-status-filter="Approved">
                    <div class="stat-icon stat-icon-lg"><i class="bi bi-check2-circle"></i></div>
                    <div>
                        <div class="label">Approved</div>
                        <div class="value">16</div>
                        <div class="delta text-up">66.7% approved</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl text-nowrap">
                <div class="stat-card stat-theme-amber d-flex align-items-center gap-3 leave-summary-card" data-status-filter="Pending">
                    <div class="stat-icon stat-icon-lg"><i class="bi bi-hourglass-split"></i></div>
                    <div>
                        <div class="label">Pending Review</div>
                        <div class="value">5</div>
                        <div class="delta text-neutral">Needs attention</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl text-nowrap">
                <div class="stat-card stat-theme-blue d-flex align-items-center gap-3 leave-summary-card" data-status-filter="all">
                    <div class="stat-icon stat-icon-lg"><i class="bi bi-calendar2-minus"></i></div>
                    <div>
                        <div class="label">Days On Leave</div>
                        <div class="value">31</div>
                        <div class="delta text-neutral">Across all teams</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl text-nowrap">
                <div class="stat-card stat-theme-red d-flex align-items-center gap-3 leave-summary-card" data-status-filter="Rejected">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon stat-icon-lg"><i class="bi bi-person-x"></i></div>
                        <div>
                            <div class="label">Rejected</div>
                            <div class="value">3</div>
                            <div class="delta text-neutral">This month</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-custom mb-3 filters-card">
            <div class="filters-toggle-row"><span class="fw-semibold" style="font-size:14.5px;color:var(--ink-900);"><i class="bi bi-funnel me-1"></i> Filter Leave Requests</span><button type="button" class="filters-toggle-btn" id="leaveFiltersToggle"><span>Filters</span><i class="bi bi-chevron-down chevron"></i></button></div>
            <div class="filters-collapse" id="leaveFiltersCollapse">
                <div class="row g-3" id="leaveFiltersForm">
                    <div class="col-lg-3 col-md-4 col-sm-6"><label class="form-label">Search Employee</label><input class="form-control" id="leaveSearch" placeholder="Name or ID"></div>
                    <div class="col-lg-3 col-md-4 col-sm-6"><label class="form-label">Leave Type</label><select class="form-select select2" id="leaveType">
                            <option>All Types</option>
                            <option>Casual Leave</option>
                            <option>Sick Leave</option>
                            <option>Earned Leave</option>
                        </select></div>
                    <div class="col-lg-3 col-md-4 col-sm-6"><label class="form-label">Status</label><select class="form-select select2" id="leaveStatus">
                            <option>All Status</option>
                            <option>Approved</option>
                            <option>Pending</option>
                            <option>Rejected</option>
                        </select></div>
                    <div class="col-lg-3 col-md-4 col-sm-6"><label class="form-label">Applied Date Range</label>
                        <div class="date-picker date-range-picker right-0"><input class="date-input form-control" id="leaveRange" placeholder="From date  —  To date" autocomplete="off"></div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="align-self-end col-md-4 d-flex gap-2 w-100"><button type="button" class="btn btn-reject flex-fill w-100" id="leaveClear">Clear Filters</button><button type="button" class="btn btn-primary w-100 flex-fill" id="leaveApply"><i class="bi bi-funnel me-1"></i>Apply Filters</button></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="leave-active-bar" id="leaveActiveBar" hidden><span class="leave-active-label"><i class="bi bi-funnel-fill me-1"></i>Active Filters:</span>
            <div id="leaveActiveList" class="d-flex flex-wrap gap-2"></div>
            <button type="button" class="leave-active-clear" id="leaveActiveClear">Clear All</button>
        </div>

        <div class="card-custom js-report-table p-0" data-export-name="leave-report">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <button class="btn columns-btn" id="mtColumnsBtn"><i class="bi bi-eye me-1"></i>Columns</button>
                    <div class="mt-export-menu">
                        <button type="button" class="btn export-btn-pdf mt-export-trigger" id="mtExportTrigger" aria-expanded="false">
                            <i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i>
                        </button>
                        <div class="mt-export-dropdown" id="mtExportDropdown" role="menu">
                            <button type="button" class="mt-export-item" id="mtCopyBtn"><i class="bi bi-clipboard me-2"></i>Copy</button>
                            <button type="button" class="mt-export-item" id="mtCsvBtn"><i class="bi bi-filetype-csv me-2"></i>CSV</button>
                            <button type="button" class="mt-export-item" id="mtExcelBtn"><i class="bi bi-filetype-xlsx me-2"></i>Excel</button>
                            <button type="button" class="mt-export-item" id="mtPdfBtn"><i class="bi bi-filetype-pdf me-2"></i>PDF</button>
                            <button type="button" class="mt-export-item" id="mtPrintBtn"><i class="bi bi-printer me-2"></i>Print</button>
                        </div>
                    </div>
                </div>
                <div class="month-nav ms-auto">
                    <button type="button" class="month-arrow previews" id="leavePrevDate" aria-label="Previous date">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="date-picker right-0">
                        <input type="text" class="date-input form-control" id="leaveDateSelect" value="27-08-2026" autocomplete="off" aria-label="Choose leave date">
                    </div>
                    <button type="button" class="month-arrow next" id="leaveNextDate" aria-label="Next date">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                <table class="table-modern w-100">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Employee ID</th>
                            <th>Employee</th>
                            <th>Leave Type</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Days</th>
                            <th>Reason</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="pgBody">
                        <?php
                        $leaveRows = [
                            ['Amelia Curr', 'EMP0001', 'Casual Leave', '2026-08-27', '2026-08-27', '1', 'Personal work', 'casual', 'Approved', 14, 20],
                            ['Daniel Martinez', 'EMP0002', 'Sick Leave', '2026-08-27', '2026-08-28', '2', 'Medical appointment', 'sick', 'Pending', 7, 12],
                            ['David Anderson', 'EMP0003', 'Earned Leave', '2026-08-26', '2026-08-29', '4', 'Family function', 'earned', 'Approved', 10, 18],
                            ['Emily Clark', 'EMP0004', 'Work From Home', '2026-08-27', '2026-08-27', '1', 'Home maintenance', 'wfh', 'Approved', 8, 10],
                            ['Sophia Johnson', 'EMP0005', 'Casual Leave', '2026-08-25', '2026-08-26', '2', 'Personal work', 'casual', 'Rejected', 12, 20],
                            ['Liam Wilson', 'EMP0006', 'Sick Leave', '2026-08-20', '2026-08-21', '2', 'Fever and rest', 'sick', 'Approved', 5, 12],
                            ['Olivia Brown', 'EMP0007', 'Earned Leave', '2026-08-14', '2026-08-15', '2', 'Travel plan', 'earned', 'Pending', 9, 18],
                            ['Noah Davis', 'EMP0008', 'Casual Leave', '2026-08-08', '2026-08-08', '1', 'Personal work', 'casual', 'Approved', 16, 20],
                            ['Emma Garcia', 'EMP0009', 'Sick Leave', '2026-08-05', '2026-08-06', '2', 'Cold and cough', 'sick', 'Approved', 4, 12],
                            ['James Rodriguez', 'EMP0010', 'Casual Leave', '2026-08-01', '2026-08-02', '2', 'Family event', 'casual', 'Approved', 11, 20],
                            ['Olivia Martinez', 'EMP0011', 'Earned Leave', '2026-07-28', '2026-07-30', '3', 'Vacation trip', 'earned', 'Approved', 7, 18],
                            ['William Anderson', 'EMP0012', 'Work From Home', '2026-07-25', '2026-07-25', '1', 'Remote work', 'wfh', 'Approved', 6, 10],
                            ['Sophia Thomas', 'EMP0013', 'Casual Leave', '2026-07-22', '2026-07-23', '2', 'Personal errands', 'casual', 'Pending', 13, 20],
                            ['Benjamin Jackson', 'EMP0014', 'Sick Leave', '2026-07-18', '2026-07-19', '2', 'Doctor visit', 'sick', 'Approved', 3, 12],
                            ['Isabella White', 'EMP0015', 'Earned Leave', '2026-07-15', '2026-07-18', '4', 'Holiday trip', 'earned', 'Rejected', 8, 18],
                            ['Mason Harris', 'EMP0016', 'Casual Leave', '2026-07-12', '2026-07-12', '1', 'Birthday leave', 'casual', 'Approved', 15, 20],
                            ['Mia Clark', 'EMP0017', 'Work From Home', '2026-07-08', '2026-07-09', '2', 'Home repair', 'wfh', 'Pending', 5, 10],
                            ['Ethan Lewis', 'EMP0018', 'Sick Leave', '2026-07-05', '2026-07-06', '2', 'Stomach ache', 'sick', 'Approved', 9, 12],
                            ['Charlotte Walker', 'EMP0019', 'Earned Leave', '2026-07-01', '2026-07-03', '3', 'Wedding ceremony', 'earned', 'Approved', 6, 18],
                            ['Alexander Hall', 'EMP0020', 'Casual Leave', '2026-06-28', '2026-06-29', '2', 'Personal matter', 'casual', 'Rejected', 10, 20],
                            ['Amelia Allen', 'EMP0021', 'Sick Leave', '2026-06-25', '2026-06-25', '1', 'Headache', 'sick', 'Approved', 11, 12],
                            ['Daniel Young', 'EMP0022', 'Earned Leave', '2026-06-20', '2026-06-22', '3', 'Family vacation', 'earned', 'Pending', 4, 18],
                            ['Emily King', 'EMP0023', 'Work From Home', '2026-06-15', '2026-06-15', '1', 'Remote work', 'wfh', 'Approved', 7, 10],
                            ['David Wright', 'EMP0024', 'Casual Leave', '2026-06-12', '2026-06-13', '2', 'Relocation', 'casual', 'Approved', 14, 20],
                            ['Sophia Lopez', 'EMP0025', 'Sick Leave', '2026-06-08', '2026-06-10', '3', 'Flu recovery', 'sick', 'Approved', 2, 12],
                            ['Liam Hill', 'EMP0026', 'Earned Leave', '2026-06-05', '2026-06-07', '3', 'Conference trip', 'earned', 'Pending', 12, 18],
                            ['Olivia Scott', 'EMP0027', 'Casual Leave', '2026-06-01', '2026-06-01', '1', 'Personal errands', 'casual', 'Approved', 9, 20],
                            ['Noah Green', 'EMP0028', 'Work From Home', '2026-05-28', '2026-05-28', '1', 'Remote work', 'wfh', 'Approved', 6, 10],
                            ['Emma Adams', 'EMP0029', 'Sick Leave', '2026-05-25', '2026-05-26', '2', 'Dental appointment', 'sick', 'Rejected', 8, 12],
                            ['James Baker', 'EMP0030', 'Earned Leave', '2026-05-20', '2026-05-23', '4', 'Family reunion', 'earned', 'Approved', 5, 18],
                        ];
                        foreach ($leaveRows as $index => $row):
                            $name = $row[0];
                            $empId = $row[1];
                            $type = $row[2];
                            $from = $row[3];
                            $to = $row[4];
                            $days = $row[5];
                            $reason = $row[6];
                            $typeKey = $row[7];
                            $status = $row[8];
                            $balance = $row[9];
                            $quota = $row[10];
                            $rejectionReason = ($name === 'Sophia Johnson' && $status === 'Rejected') ? 'Insufficient leave balance' : '';
                        ?>
                            <tr class="leave-row" data-empid="<?= htmlspecialchars($empId) ?>" data-date="<?= $from ?>" data-type="<?= htmlspecialchars($type) ?>" data-status="<?= htmlspecialchars($status) ?>" data-rejection-reason="<?= htmlspecialchars($rejectionReason) ?>">
                                <td><span class="sno-value"><?= $index + 1 ?></span></td>
                                <td class="fw-semibold" style="color:var(--primary-dark);">
                                    <?= htmlspecialchars($empId) ?>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2 text-nowrap"><img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:36px;height:36px;" alt="<?= htmlspecialchars($name) ?>">
                                        <div>
                                            <div class="person-name"><?= htmlspecialchars($name) ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="leave-type <?= $typeKey ?>" data-leave-type="<?= htmlspecialchars($type) ?>" role="button" tabindex="0"><?= htmlspecialchars($type) ?></span></td>
                                <td><?= date('d M Y', strtotime($from)) ?></td>
                                <td><?= date('d M Y', strtotime($to)) ?></td>
                                <td class="fw-bold"><?= $days ?></td>
                                <td class="text-neutral"><?= htmlspecialchars($reason) ?></td>
                                <td>
                                    <div class="leave-balance"><strong><?= $balance ?></strong> / <?= $quota ?> days<div class="balance-track">
                                            <div class="balance-fill" style="width:<?= round(($balance / $quota) * 100) ?>%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="leave-status <?= strtolower($status) ?>"><i class="bi bi-circle-fill" style="font-size:6px;"></i><?= htmlspecialchars($status) ?></span></td>
                                <td>
                                    <div class="profile-menu leave-action-profile">
                                        <button type="button" class="menu-trigger btn border btn-sm" onclick="toggleActionMenu(this)" title="Review request"><i class="bi bi-three-dots-vertical"></i></button>
                                        <div class="profile-menu-dropdown leave-action-menu" role="menu" style="position:fixed;z-index:1100;width:180px;padding:8px;background:var(--bg-card);border:1px solid var(--border-soft);border-radius:12px;box-shadow:0 14px 32px rgba(20,30,25,.14);display:none;">
                                            <button type="button" class="leave-action-item approve-action" data-employee="<?= htmlspecialchars($name) ?>" data-empid="<?= htmlspecialchars($empId) ?>" data-from="<?= $from ?>">Approve</button>
                                            <button type="button" class="leave-action-item partial-approve-action" data-employee="<?= htmlspecialchars($name) ?>" data-empid="<?= htmlspecialchars($empId) ?>" data-days="<?= $days ?>" data-from="<?= $from ?>" data-to="<?= $to ?>" data-type="<?= htmlspecialchars($type) ?>">Partial Approve</button>
                                            <button type="button" class="leave-action-item reject-action" data-employee="<?= htmlspecialchars($name) ?>" data-empid="<?= htmlspecialchars($empId) ?>" data-from="<?= $from ?>">Reject</button>
                                            <button type="button" class="leave-action-item view-reason-action" data-employee="<?= htmlspecialchars($name) ?>" data-empid="<?= htmlspecialchars($empId) ?>" data-from="<?= $from ?>" data-reason="">View Reason</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center report-footer p-3">
                <div class="d-flex gap-2 align-items-center"><span class="small text-muted text-nowrap text-nowrap">Show:</span><select class="form-select form-select-sm gh-w-auto" id="showEntries">
                        <option selected>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select><span class="small text-muted text-nowrap text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">3</strong> of <strong id="pgTotal">3</strong></span></div>
                <nav>
                    <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- /#leaveSectionRequests -->

    <div id="leaveSectionBalance" class="leave-balance-scroll-wrap" hidden>
        <button type="button" class="leave-balance-nav-arrow leave-balance-nav-prev" aria-label="Scroll left"><i class="bi bi-chevron-left"></i></button>
        <div class="leave-balance-scroll" id="leaveBalanceScroll">
            <?php
            $balanceCards = [
                ['Annual Leave', 'bi-calendar3', 'blue', 10, 0],
                ['Bereavement Leave', 'bi-bag-plus', 'blue', 1, 0],
                ['Casual Leave', 'bi-bag-x-fill', 'amber', 12, 2],
                ['Compensatory Off', 'bi-calendar2-check', 'green', 0, 0],
                ['PTO', 'bi-briefcase-fill', 'blue', 2, 0],
                ['Sick Leave', 'bi-heart-fill', 'violet', 12, 0],
            ];
            foreach ($balanceCards as $card):
                $label = $card[0];
                $icon = $card[1];
                $theme = $card[2];
                $available = $card[3];
                $booked = $card[4];
            ?>
                <div class="leave-balance-card leave-balance-theme-<?= $theme ?>" data-leave-type="<?= htmlspecialchars($label) ?>" role="button" tabindex="0">
                    <div class="leave-balance-card-title"><?= htmlspecialchars($label) ?></div>
                    <div class="leave-balance-card-icon"><i class="bi <?= $icon ?>"></i></div>
                    <div class="leave-balance-card-row"><span>Available</span><strong>: <?= $available ?></strong></div>
                    <div class="leave-balance-card-row"><span>Booked</span><strong>: <?= $booked ?></strong></div>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" class="leave-balance-nav-arrow leave-balance-nav-next" aria-label="Scroll right"><i class="bi bi-chevron-right"></i></button>
    </div>

    <!-- ===== Team Calendar (inline — same view as the attendance calendar modal, without the modal) ===== -->
    <div id="leaveSectionTeamCalendar" hidden>
        <div class="card-custom team-cal-card p-3 mb-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center gap-2">
                        <label class="form-label mb-0 fw-semibold breadcrumb-text" for="tcTeamSelect">Team</label>
                        <select class="form-select select2" id="tcTeamSelect" style="width:180px;">
                            <option value="">All Teams</option>
                            <option value="Node JS">Node JS</option>
                            <option value="Design">Design</option>
                            <option value="iOS">iOS</option>
                            <option value="Business">Business</option>
                            <option value="Marketing">Marketing</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <label class="form-label mb-0 fw-semibold breadcrumb-text text-nowrap" for="tcEmployeeSelect">Team Member</label>
                        <select class="form-select select2" id="tcEmployeeSelect" style="width:250px;"></select>
                    </div>
                </div>
                <div class="acm-cal-head mb-0">
                    <button type="button" class="acm-nav-btn" id="tcPrevMonth" aria-label="Previous month"><i class="bi bi-chevron-left"></i></button>
                    <span class="month" id="tcMonthLabel">&mdash;</span>
                    <button type="button" class="acm-nav-btn" id="tcNextMonth" aria-label="Next month"><i class="bi bi-chevron-right"></i></button>
                </div>
            </div>

            <div class="acm-body">
                <div class="acm-summary">
                    <div class="card">
                        <div class="n" style="color:var(--primary);" id="tcPresentCount">0</div>
                        <div class="l">Present</div>
                    </div>
                    <div class="card">
                        <div class="n" style="color:var(--att-danger);" id="tcAbsentCount">0</div>
                        <div class="l">Absent</div>
                    </div>
                    <div class="card">
                        <div class="n" style="color:var(--att-late-fg);" id="tcLateCount">0</div>
                        <div class="l">Late</div>
                    </div>
                    <div class="card">
                        <div class="n" style="color:var(--att-leave-fg);" id="tcLeaveCount">0</div>
                        <div class="l">On Leave</div>
                    </div>
                    <div class="card">
                        <div class="n" id="tcAvgHours">0h</div>
                        <div class="l">Avg Hours</div>
                    </div>
                </div>
                <div class="d-flex gap-2 flex-column w-100">
                    <div class="acm-grid" id="tcCalendarGrid">
                        <div class="acm-dow">Sun</div>
                        <div class="acm-dow">Mon</div>
                        <div class="acm-dow">Tue</div>
                        <div class="acm-dow">Wed</div>
                        <div class="acm-dow">Thu</div>
                        <div class="acm-dow">Fri</div>
                        <div class="acm-dow">Sat</div>
                        <!-- .acm-day cells get injected here by JS, after the 7 headers -->
                    </div>
                    <div class="acm-legend">
                        <div class="item"><span class="swatch" style="background:var(--primary);"></span>Present</div>
                        <div class="item"><span class="swatch" style="background:var(--att-danger);"></span>Absent</div>
                        <div class="item"><span class="swatch" style="background:var(--att-late-fg);"></span>Late</div>
                        <div class="item"><span class="swatch" style="background:var(--att-half-fg);"></span>Half Day</div>
                        <div class="item"><span class="swatch" style="background:var(--att-leave-fg);"></span>On Leave</div>
                        <div class="item"><span class="swatch" style="background:var(--att-holiday-fg);"></span>Weekend/Holiday</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="leave-reject-modal" id="leaveRejectModal" role="dialog" aria-modal="true" aria-labelledby="leaveRejectTitle">
    <div class="leave-reject-dialog">
        <div class="leave-reject-head">
            <h3 id="leaveRejectTitle">Reject Leave Request</h3><button type="button" class="modal-close" id="leaveRejectClose" aria-label="Close">&times;</button>
        </div>
        <div class="leave-reject-body">
            <p class="small text-muted text-nowrap mb-2">Reason for rejecting <strong id="leaveRejectEmployee"></strong></p><textarea class="form-control" id="leaveRejectReason" placeholder="Enter rejection reason" required></textarea>
            <div class="text-danger small mt-1" id="leaveRejectError" hidden>Please enter a reason.</div>
        </div>
        <div class="leave-reject-foot"><button type="button" class="btn btn-reject" id="leaveRejectCancel">Cancel</button><button type="button" class="btn btn-primary" id="leaveRejectSubmit">Submit Rejection</button></div>
    </div>
</div>

<div class="leave-reject-modal" id="partialApproveModal" role="dialog" aria-modal="true" aria-labelledby="partialApproveTitle">
    <div class="leave-reject-dialog" style="max-width:560px;">
        <div class="leave-reject-head">
            <h3 id="partialApproveTitle"><i class="bi bi-check2-circle" style="color:var(--primary);"></i> Review Leave Days</h3>
            <button type="button" class="modal-close" id="partialApproveClose" aria-label="Close">&times;</button>
        </div>
        <div class="leave-reject-body">
            <div class="partial-emp-info">
                <img src="./assets/img/profile-1.jpg" class="avatar-sm" style="width:40px;height:40px;">
                <div>
                    <div class="fw-bold" id="partialEmpName">Employee</div>
                    <div class="small text-muted" id="partialLeaveType">Leave Type</div>
                </div>
            </div>
            <div class="partial-days-summary-bar">
                <span class="partial-summary-chip approved-chip"><i class="bi bi-check-circle-fill"></i> <span id="paApprovedCount">0</span> Approved</span>
                <span class="partial-summary-chip rejected-chip"><i class="bi bi-x-circle-fill"></i> <span id="paRejectedCount">0</span> Rejected</span>
                <span class="partial-summary-chip pending-chip"><i class="bi bi-hourglass-split"></i> <span id="paPendingCount">0</span> Pending</span>
            </div>
            <div class="partial-days-list" id="partialDaysList">
                <!-- Day cards injected by JS -->
            </div>
            <div class="partial-note-row" style="margin-top:14px;">
                <label class="form-label fw-semibold mb-1">Note (Optional)</label>
                <textarea class="form-control" id="partialNote" rows="2" placeholder="Add a note for this review"></textarea>
            </div>
        </div>
        <div class="leave-reject-foot">
            <button type="button" class="btn btn-reject" id="partialApproveCancel">Cancel</button>
            <button type="button" class="btn btn-primary" id="partialApproveSubmit"><i class="bi bi-check2 me-1"></i>Confirm Review</button>
        </div>
    </div>
</div>

<div class="leave-reject-modal" id="partialRejectModal" role="dialog" aria-modal="true" aria-labelledby="partialRejectTitle">
    <div class="leave-reject-dialog" style="max-width:480px;">
        <div class="leave-reject-head">
            <h3 id="partialRejectTitle"><i class="bi bi-x-circle" style="color:#ef4444;"></i> Reject Day</h3>
            <button type="button" class="modal-close" id="partialRejectClose" aria-label="Close">&times;</button>
        </div>
        <div class="leave-reject-body">
            <p class="small text-muted mb-2">Reason for rejecting <strong id="partialRejectEmployee"></strong> &mdash; <strong id="partialRejectDay"></strong></p>
            <textarea class="form-control" id="partialRejectReasonText" rows="3" placeholder="Enter rejection reason" required></textarea>
            <div class="text-danger small mt-1" id="partialRejectError" hidden>Please enter a reason.</div>
        </div>
        <div class="leave-reject-foot">
            <button type="button" class="btn btn-reject" id="partialRejectCancel">Cancel</button>
            <button type="button" class="btn btn-primary" id="partialRejectSubmit">Submit Rejection</button>
        </div>
    </div>
</div>

<div class="leave-reject-modal" id="leaveViewReasonModal" role="dialog" aria-modal="true" aria-labelledby="leaveViewReasonTitle">
    <div class="leave-reject-dialog">
        <div class="leave-reject-head">
            <h3 id="leaveViewReasonTitle">Rejection Reason</h3><button type="button" class="modal-close" id="leaveViewReasonClose" aria-label="Close">&times;</button>
        </div>
        <div class="leave-reject-body">
            <p class="small text-muted text-nowrap mb-2">Rejection reason for <strong id="leaveViewReasonEmployee"></strong></p>
            <div class="form-control" id="leaveViewReasonText" style="background: #f8f9fa; min-height: 100px; padding: 12px; border-radius: 8px;"></div>
        </div>
        <div class="leave-reject-foot"><button type="button" class="btn btn-primary" id="leaveViewReasonOk">OK</button></div>
    </div>
</div>

<!-- Leave Application Modal (native Bootstrap modal) -->
<div class="modal fade" id="leaveApplyModal" tabindex="-1" aria-labelledby="leaveApplyTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="leave-reject-head">
                <h3 id="leaveApplyTitle">Leave</h3>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="leave-apply-body ">
                <div class="leave-apply-grid">
                    <!-- LEFT: form -->
                    <div class="leave-apply-form">
                        <!-- <div class="leave-apply-row">
                            <label for="inputtext" class="form-label">Select Employee</label>
                            <select id="employeeSelect" class="form-select">
                                <option value=""></option>
                                <option value="1"
                                    data-image="./assets/img/profile-1.jpg">
                                    Arun Kumar
                                </option>
                                <option value="2"
                                    data-image="./assets/img/profile-2.jpg">
                                    Bala Kumar
                                </option>
                                <option value="3"
                                    data-image="./assets/img/profile-3.jpg">
                                    Chandran
                                </option>
                                <option value="4"
                                    data-image="./assets/img/profile-4.jpg">
                                    Dinesh Kumar
                                </option>
                            </select>
                        </div> -->

                        <div class="leave-apply-row w-100">
                            <label>Leave type</label>
                            <select class="form-select select2 w-100" id="leaveApplyType">
                                <option value="">Select Leave Type</option>
                                <option value="Annual Leave">Annual Leave</option>
                                <option value="Bereavement Leave">Bereavement Leave</option>
                                <option value="Casual Leave">Casual Leave</option>
                                <option value="Compensatory Off">Compensatory Off</option>
                                <option value="PTO">PTO</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="Earned Leave">Earned Leave</option>
                                <option value="Work From Home">Work From Home</option>
                            </select>
                        </div>

                        <div class="leave-apply-row">
                            <label>Date</label>
                            <div class="leave-apply-date-row flex-sm-row flex-column">
                                <div class="date-picker"><input type="text" class="date-input form-control" id="leaveApplyFromDate" placeholder="Select date" autocomplete="off"></div>
                                <div class="date-picker"><input type="text" class="date-input form-control" id="leaveApplyToDate" placeholder="Select date" autocomplete="off"></div>
                            </div>
                        </div>

                        <div class="leave-apply-summary-row">
                            <span class="summary-date w-100" id="leaveApplyDateSummary">Select a date</span>
                            <select class="form-select select2 form-select-sm" id="leaveApplyDayType">
                                <option value="Full Day">Full Day</option>
                                <option value="First Half">First Half</option>
                                <option value="Second Half">Second Half</option>
                            </select>
                        </div>

                        <div class="leave-apply-summary-row total-row">
                            <span>Total</span>
                            <strong id="leaveApplyTotalDays">0 Day(s)</strong>
                        </div>


                        <div class="leave-apply-row mb-0">
                            <label>Reason for leave</label>
                            <textarea class="form-control" id="leaveApplyReason" rows="3" placeholder="Enter reason for leave"></textarea>
                        </div>
                    </div>

                    <!-- RIGHT: balance summary -->
                    <div class="leave-apply-side">
                        <div class="leave-balance-box">
                            <div class="leave-balance-box-head">
                                <span>As of <span id="balanceAsOfDate">05-Feb-2020</span></span>
                                <span>Day(s)</span>
                            </div>
                            <div class="leave-balance-line"><span>Available balance</span><strong id="availableBalance">5</strong></div>
                            <div class="leave-balance-line"><span>Currently booked</span><strong id="currentlyBooked">1</strong></div>
                            <div class="leave-balance-line total"><span>Balance after booked leave</span><strong id="balanceAfterBooking">4</strong></div>
                        </div>

                        <div class="leave-balance-box">
                            <div class="leave-balance-box-head"><span>As of 31-Dec-2020</span></div>
                            <div class="leave-balance-line total"><span>Estimated balance</span><strong id="estimatedBalance">4</strong></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="leave-reject-foot">
                <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="leaveApplySubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="./assets/js/tabel.js"></script>
<script src="./assets/js/date-picker.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var trigger = document.getElementById('mtExportTrigger');
        var dropdown = document.getElementById('mtExportDropdown');
        if (!trigger || !dropdown) return;

        function position() {
            if (!dropdown.classList.contains('show')) return;
            var r = trigger.getBoundingClientRect(),
                dw = dropdown.offsetWidth || 160,
                dh = dropdown.offsetHeight || 200;
            var left = r.left + (r.width / 2) - (dw / 2);
            left = Math.max(8, Math.min(left, window.innerWidth - dw - 8));
            var top = r.bottom + 6;
            if (top + dh > window.innerHeight - 8) top = r.top - dh - 6;
            dropdown.style.left = left + 'px';
            dropdown.style.top = Math.max(8, top) + 'px';
        }

        function close() {
            dropdown.classList.remove('show');
            trigger.setAttribute('aria-expanded', 'false');
        }
        trigger.addEventListener('click', function(e) {
            e.stopPropagation();
            document.querySelectorAll('.mt-export-dropdown.show').forEach(function(d) {
                d.classList.remove('show');
            });
            if (!dropdown.classList.contains('show')) {
                dropdown.classList.add('show');
                trigger.setAttribute('aria-expanded', 'true');
                position();
            } else close();
        });
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && e.target !== trigger) close();
        });
        window.addEventListener('resize', position);
        window.addEventListener('scroll', position, true);

        function getTableData() {
            var table = document.querySelector('.js-report-table table');
            if (!table) return null;
            var headers = [];
            table.querySelectorAll('thead th').forEach(function(th) {
                headers.push(th.textContent.trim());
            });
            var rows = [];
            table.querySelectorAll('tbody tr').forEach(function(tr) {
                if (tr.style.display === 'none' || tr.classList.contains('no-record-row')) return;
                var cells = [];
                tr.querySelectorAll('td').forEach(function(td) {
                    cells.push(td.textContent.trim());
                });
                if (cells.length) rows.push(cells);
            });
            return {
                headers: headers,
                rows: rows
            };
        }

        function toCSV(data) {
            return data.headers.map(function(h) {
                    return '"' + h.replace(/"/g, '""') + '"';
                }).join(',') + '\n' +
                data.rows.map(function(r) {
                    return r.map(function(c) {
                        return '"' + c.replace(/"/g, '""') + '"';
                    }).join(',');
                }).join('\n');
        }

        function download(filename, content, mime) {
            var blob = new Blob([content], {
                type: mime
            });
            var a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = filename;
            a.click();
        }

        function printTable() {
            var table = document.querySelector('.js-report-table table');
            if (!table) return;
            var w = window.open('');
            w.document.write('<html><head><title>Leave Report</title><style>table{border-collapse:collapse;width:100%}th,td{border:1px solid #ddd;padding:8px;text-align:left;font-size:12px}th{background:#f5f5f5}</style></head><body>' + table.outerHTML + '</body></html>');
            w.document.close();
            w.print();
        }
        var copyBtn = document.getElementById('mtCopyBtn');
        var csvBtn = document.getElementById('mtCsvBtn');
        var excelBtn = document.getElementById('mtExcelBtn');
        var pdfBtn = document.getElementById('mtPdfBtn');
        var printBtn = document.getElementById('mtPrintBtn');
        if (copyBtn) copyBtn.addEventListener('click', function() {
            var d = getTableData();
            if (!d) return;
            var text = d.headers.join('\t') + '\n' + d.rows.map(function(r) {
                return r.join('\t');
            }).join('\n');
            navigator.clipboard.writeText(text);
            close();
        });
        if (csvBtn) csvBtn.addEventListener('click', function() {
            var d = getTableData();
            if (!d) return;
            download('leave-report.csv', toCSV(d), 'text/csv');
            close();
        });
        if (excelBtn) excelBtn.addEventListener('click', function() {
            var d = getTableData();
            if (!d) return;
            var html = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel"><head><meta charset="UTF-8"></head><body><table>' + document.querySelector('.js-report-table table').outerHTML + '</table></body></html>';
            download('leave-report.xls', html, 'application/vnd.ms-excel');
            close();
        });
        if (pdfBtn) pdfBtn.addEventListener('click', function() {
            var d = getTableData();
            if (!d || typeof pdfMake === 'undefined') {
                alert('PDF library not loaded.');
                return;
            }
            var body = [d.headers];
            d.rows.forEach(function(r) {
                body.push(r);
            });
            pdfMake.createPdf({
                content: [{
                    table: {
                        headerRows: 1,
                        widths: 'auto',
                        body: body
                    }
                }],
                defaultStyle: {
                    fontSize: 10
                }
            }).download('leave-report.pdf');
            close();
        });
        if (printBtn) printBtn.addEventListener('click', function() {
            printTable();
            close();
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dateInput = document.getElementById('leaveDateSelect'),
            rows = Array.from(document.querySelectorAll('.leave-row')),
            rejectModal = document.getElementById('leaveRejectModal'),
            rejectRow = null,
            selectedDate = '',
            rangeStart = '',
            rangeEnd = '',
            appliedSearch = '',
            appliedType = 'All Types',
            appliedStatus = 'All Status';

        function iso(value) {
            var p = value.split('-');
            return p.length === 3 ? p[2] + '-' + p[1] + '-' + p[0] : '';
        }

        function range(value) {
            var p = value.split(' to ').map(iso).filter(Boolean);
            return {
                start: p[0] || '',
                end: p[1] || p[0] || ''
            };
        }

        window.attendanceRowMatches = function(row) {
            var search = appliedSearch.toLowerCase().trim();
            var dateMatch = rangeStart ? row.dataset.date >= rangeStart && row.dataset.date <= rangeEnd : (!selectedDate || row.dataset.date === selectedDate);
            return dateMatch && (!search || row.textContent.toLowerCase().includes(search)) &&
                (appliedType === 'All Types' || row.dataset.type === appliedType) &&
                (appliedStatus === 'All Status' || row.dataset.status === appliedStatus);
        };

        // Find a table row by employee id + from-date (buttons live in a teleported dropdown on <body>,
        // so closest('.leave-row') does not work from them)
        function findRowByEmp(empId, fromDate) {
            var found = null;
            document.querySelectorAll('.leave-row').forEach(function(r) {
                if (r.dataset.empid !== empId || r.dataset.date !== fromDate) return;
                // Prefer the Pending row — partial approve only applies to pending requests
                if (!found || (r.dataset.status === 'Pending' && found.dataset.status !== 'Pending')) found = r;
            });
            return found;
        }

        function refreshTable() {
            if (window.refreshAttendanceTable) window.refreshAttendanceTable();
        }

        function updateActionState(row) {
            var status = row.dataset.status;
            var profileMenu = row.querySelector('.leave-action-profile');
            var toggle = profileMenu.querySelector('.menu-trigger');
            var menu = profileMenu.querySelector('.leave-action-menu');
            var approveAction = menu.querySelector('.approve-action');
            var rejectAction = menu.querySelector('.reject-action');
            var viewReasonAction = menu.querySelector('.view-reason-action');

            var isPending = status === 'Pending';
            var isRejected = status === 'Rejected';
            // Partial rows have status='Approved' but their text contains 'Partial ('
            var statusText = row.querySelector('.leave-status') ? row.querySelector('.leave-status').textContent : '';
            var isPartial = /partial/i.test(statusText);
            var isReviewed = isRejected || isPartial;

            // Enable actions for pending, rejected, and partial status
            toggle.disabled = !isPending && !isReviewed;
            toggle.classList.toggle('leave-action-disabled', !isPending && !isReviewed);
            toggle.title = isPending ? 'Review request' : (isReviewed ? 'View rejection reason' : 'Action unavailable for ' + status + ' request');
            menu.hidden = !isPending && !isReviewed;

            // Show/hide actions based on status
            // NOTE: hidden attribute is required because app.css forces .leave-action-item { display: flex !important }
            // which overrides inline style.display — the [hidden] selector beats it via !important in the page CSS.
            var partialAction = menu.querySelector('.partial-approve-action');
            var rowDays = parseInt(row.querySelector('td.fw-bold') ? row.querySelector('td.fw-bold').textContent.trim() : '1', 10);
            if (approveAction) {
                approveAction.hidden = !isPending;
                approveAction.style.display = isPending ? 'block' : 'none';
            }
            if (partialAction) {
                partialAction.hidden = !(isPending && rowDays > 1);
                partialAction.style.display = (isPending && rowDays > 1) ? 'block' : 'none';
            }
            if (rejectAction) {
                rejectAction.hidden = !isPending;
                rejectAction.style.display = isPending ? 'block' : 'none';
            }
            if (viewReasonAction) {
                viewReasonAction.hidden = !isReviewed;
                viewReasonAction.style.display = isReviewed ? 'block' : 'none';
            }

            if (!isPending && !isReviewed) {
                menu.classList.remove('open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        }

        rows.forEach(updateActionState);

        function closeRejectModal() {
            rejectModal.classList.remove('show');
            document.getElementById('leaveRejectReason').value = '';
            document.getElementById('leaveRejectError').hidden = true;
            rejectRow = null;
        }

        document.querySelectorAll('.approve-action').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = findRowByEmp(button.dataset.empid, button.dataset.from);
                if (!row) return;
                row.dataset.status = 'Approved';
                row.querySelector('.leave-status').className = 'leave-status approved';
                row.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Approved';
                updateActionState(row);
                refreshTable();
            });
        });

        document.addEventListener('click', function(event) {
            document.querySelectorAll('.leave-action-profile').forEach(function(profileMenu) {
                if (!profileMenu.contains(event.target)) {
                    profileMenu.querySelector('.leave-action-menu').classList.remove('open');
                    profileMenu.querySelector('.menu-trigger').setAttribute('aria-expanded', 'false');
                }
            });
        });

        document.querySelectorAll('.reject-action').forEach(function(button) {
            button.addEventListener('click', function() {
                rejectRow = findRowByEmp(button.dataset.empid, button.dataset.from);
                if (!rejectRow) return;
                document.getElementById('leaveRejectEmployee').textContent = button.dataset.employee;
                rejectModal.classList.add('show');
                document.getElementById('leaveRejectReason').focus();
            });
        });

        document.getElementById('leaveRejectSubmit').addEventListener('click', function() {
            var reason = document.getElementById('leaveRejectReason').value.trim();
            if (!reason || !rejectRow) {
                document.getElementById('leaveRejectError').hidden = false;
                return;
            }
            rejectRow.dataset.status = 'Rejected';
            rejectRow.dataset.rejectionReason = reason;
            rejectRow.querySelector('.leave-status').className = 'leave-status rejected';
            rejectRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Rejected';

            // Update the view reason button with the rejection reason
            var viewReasonBtn = rejectRow.querySelector('.view-reason-action');
            if (viewReasonBtn) {
                viewReasonBtn.dataset.reason = reason;
            }

            updateActionState(rejectRow);
            closeRejectModal();
            refreshTable();
        });

        document.getElementById('leaveRejectClose').addEventListener('click', closeRejectModal);
        document.getElementById('leaveRejectCancel').addEventListener('click', closeRejectModal);
        rejectModal.addEventListener('click', function(event) {
            if (event.target === rejectModal) closeRejectModal();
        });

        // View reason modal functionality
        var viewReasonModal = document.getElementById('leaveViewReasonModal');

        function closeViewReasonModal() {
            viewReasonModal.classList.remove('show');
        }

        document.querySelectorAll('.view-reason-action').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = findRowByEmp(button.dataset.empid, button.dataset.from);
                if (!row) return;
                var rejectionReason = row.dataset.rejectionReason || button.dataset.reason || 'No rejection reason provided';
                document.getElementById('leaveViewReasonEmployee').textContent = button.dataset.employee;
                document.getElementById('leaveViewReasonText').textContent = rejectionReason;
                viewReasonModal.classList.add('show');
            });
        });

        document.getElementById('leaveViewReasonClose').addEventListener('click', closeViewReasonModal);
        document.getElementById('leaveViewReasonOk').addEventListener('click', closeViewReasonModal);
        viewReasonModal.addEventListener('click', function(event) {
            if (event.target === viewReasonModal) closeViewReasonModal();
        });

        // ===== Partial Approval =====
        // ===== Partial Approval — Per-Day Cards =====
        var partialModal = document.getElementById('partialApproveModal');
        var partialRow = null;
        var partialTotal = 0;
        var partialDayStatuses = []; // array of 'approved' | 'rejected' | 'pending'
        var partialDayReasons = []; // per-day rejection reason text
        var weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        function openPartialModal(row) {
            partialRow = row;
            var name = row.querySelector('.person-name') ? row.querySelector('.person-name').textContent.trim() : '';
            var type = row.dataset.type || '';
            var from = row.dataset.date || '';
            var daysCell = row.querySelector('td.fw-bold');
            partialTotal = parseInt(daysCell ? daysCell.textContent.trim() : '1', 10);

            document.getElementById('partialEmpName').textContent = name;
            document.getElementById('partialLeaveType').textContent = type;

            // Build per-day cards
            var listEl = document.getElementById('partialDaysList');
            listEl.innerHTML = '';
            partialDayStatuses = [];
            partialDayReasons = [];

            var fromDate = new Date(from);
            for (var i = 0; i < partialTotal; i++) {
                var d = new Date(fromDate);
                d.setDate(d.getDate() + i);
                var status = 'pending';
                partialDayStatuses.push(status);

                var dayNum = i + 1;
                var dateStr = d.toLocaleDateString('en-GB', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                });
                var dow = weekdays[d.getDay()];

                var card = document.createElement('div');
                card.className = 'partial-day-card status-pending';
                card.dataset.index = i;
                card.innerHTML =
                    '<div class="partial-day-num">' + dayNum + '</div>' +
                    '<div class="partial-day-info">' +
                    '<div class="partial-day-date">' + dow + ', ' + dateStr + '</div>' +
                    '<div class="partial-day-dow">Day ' + dayNum + ' of ' + partialTotal + '</div>' +
                    '<button type="button" class="partial-day-view-reason" data-index="' + i + '" title="View rejection reason"><i class="bi bi-eye"></i> Reason</button>' +
                    '</div>' +
                    '<div class="partial-day-actions">' +
                    '<button type="button" class="partial-day-approve-btn" data-index="' + i + '" title="Approve this day"><i class="bi bi-check-lg"></i></button>' +
                    '<button type="button" class="partial-day-reject-btn" data-index="' + i + '" title="Reject this day"><i class="bi bi-x-lg"></i></button>' +
                    '</div>' +
                    '<div class="partial-day-status-badge badge-pending"><i class="bi bi-hourglass-split"></i> Pending</div>';

                listEl.appendChild(card);
            }

            updatePartialSummary();
            document.getElementById('partialNote').value = '';
            partialModal.classList.add('show');
        }

        function renderDayCard(idx) {
            var listEl = document.getElementById('partialDaysList');
            var card = listEl.children[idx];
            if (!card) return;
            var status = partialDayStatuses[idx];

            card.className = 'partial-day-card status-' + status;

            var badgeMap = {
                approved: '<i class="bi bi-check-circle-fill"></i> Approved',
                rejected: '<i class="bi bi-x-circle-fill"></i> Rejected',
                pending: '<i class="bi bi-hourglass-split"></i> Pending'
            };
            var badge = card.querySelector('.partial-day-status-badge');
            badge.className = 'partial-day-status-badge badge-' + status;
            badge.innerHTML = badgeMap[status];
        }

        function updatePartialSummary() {
            var approved = 0,
                rejected = 0,
                pending = 0;
            for (var i = 0; i < partialDayStatuses.length; i++) {
                if (partialDayStatuses[i] === 'approved') approved++;
                else if (partialDayStatuses[i] === 'rejected') rejected++;
                else pending++;
            }
            document.getElementById('paApprovedCount').textContent = approved;
            document.getElementById('paRejectedCount').textContent = rejected;
            document.getElementById('paPendingCount').textContent = pending;
        }

        // Event delegation: _inside_ partialDaysList — save reason + view reason
        document.getElementById('partialDaysList').addEventListener('click', function(e) {
            var approveBtn = e.target.closest('.partial-day-approve-btn');
            if (approveBtn) {
                var aIdx = parseInt(approveBtn.dataset.index, 10);
                var nextStatus = partialDayStatuses[aIdx] === 'approved' ? 'pending' : 'approved';
                partialDayStatuses[aIdx] = nextStatus;
                if (nextStatus !== 'rejected') partialDayReasons[aIdx] = '';
                renderDayCard(aIdx);
                updatePartialSummary();
                return;
            }

            var rejectBtn = e.target.closest('.partial-day-reject-btn');
            if (rejectBtn) {
                openPartialRejectModal(parseInt(rejectBtn.dataset.index, 10));
                return;
            }

            var viewBtn = e.target.closest('.partial-day-view-reason');
            if (viewBtn) {
                var vIdx = parseInt(viewBtn.dataset.index, 10);
                var empName = document.getElementById('partialEmpName');
                var reason = partialDayReasons[vIdx] || '';
                var card = viewBtn.closest('.partial-day-card');
                var dayDateLabel = card ? card.querySelector('.partial-day-date').textContent : '';

                var viewReasonModal = document.getElementById('leaveViewReasonModal');
                document.getElementById('leaveViewReasonEmployee').textContent = (empName ? empName.textContent : '') + (dayDateLabel ? ' (' + dayDateLabel + ')' : '');
                document.getElementById('leaveViewReasonText').textContent = reason || 'No rejection reason provided';
                viewReasonModal.classList.add('show');
                e.preventDefault();
                e.stopPropagation();
                return;
            }
        });

        // ===== Per-day Reject Reason Modal =====
        var partialRejectModal = document.getElementById('partialRejectModal');
        var partialRejectIdx = -1;

        function openPartialRejectModal(idx) {
            partialRejectIdx = idx;
            var empName = document.getElementById('partialEmpName').textContent;
            var listEl = document.getElementById('partialDaysList');
            var card = listEl.children[idx];
            var dayLabel = card ? card.querySelector('.partial-day-date').textContent : '';
            document.getElementById('partialRejectEmployee').textContent = empName;
            document.getElementById('partialRejectDay').textContent = dayLabel;
            document.getElementById('partialRejectReasonText').value = partialDayReasons[idx] || '';
            document.getElementById('partialRejectError').hidden = true;
            partialRejectModal.classList.add('show');
            document.getElementById('partialRejectReasonText').focus();
        }

        function closePartialRejectModal() {
            partialRejectModal.classList.remove('show');
            partialRejectIdx = -1;
        }

        document.getElementById('partialRejectSubmit').addEventListener('click', function() {
            var reason = document.getElementById('partialRejectReasonText').value.trim();
            if (!reason) {
                document.getElementById('partialRejectError').hidden = false;
                return;
            }
            if (partialRejectIdx > -1) {
                partialDayReasons[partialRejectIdx] = reason;
                partialDayStatuses[partialRejectIdx] = 'rejected';
                renderDayCard(partialRejectIdx);
                updatePartialSummary();
            }
            closePartialRejectModal();
        });

        document.getElementById('partialRejectClose').addEventListener('click', closePartialRejectModal);
        document.getElementById('partialRejectCancel').addEventListener('click', closePartialRejectModal);
        partialRejectModal.addEventListener('click', function(event) {
            if (event.target === partialRejectModal) closePartialRejectModal();
        });

        function closePartialModal() {
            partialModal.classList.remove('show');
            partialRow = null;
        }

        // Bind Partial Approve action buttons
        document.querySelectorAll('.partial-approve-action').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = findRowByEmp(button.dataset.empid, button.dataset.from);
                if (!row) return;
                openPartialModal(row);
            });
        });

        // Submit partial approval
        document.getElementById('partialApproveSubmit').addEventListener('click', function() {
            if (!partialRow) return;
            var approvedCount = 0,
                rejectedCount = 0,
                pendingCount = 0;
            for (var i = 0; i < partialDayStatuses.length; i++) {
                if (partialDayStatuses[i] === 'approved') approvedCount++;
                else if (partialDayStatuses[i] === 'rejected') rejectedCount++;
                else pendingCount++;
            }

            var daysCell = partialRow.querySelector('td.fw-bold');

            if (approvedCount === 0 && rejectedCount === 0) {
                // Nothing decided — just close
                closePartialModal();
                return;
            }

            // Update the original row to reflect approved days
            if (approvedCount > 0) {
                daysCell.textContent = approvedCount;
                partialRow.dataset.status = 'Approved';
                partialRow.querySelector('.leave-status').className = 'leave-status approved';
                if (approvedCount < partialTotal) {
                    partialRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Partial (' + approvedCount + '/' + partialTotal + 'd)';
                } else {
                    partialRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Approved';
                }
            } else if (rejectedCount > 0 && pendingCount === 0) {
                // All rejected
                daysCell.textContent = rejectedCount;
                partialRow.dataset.status = 'Rejected';
                partialRow.querySelector('.leave-status').className = 'leave-status rejected';
                partialRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Rejected';
            }

            // Persist rejection reasons on the row for the View Reason modal
            var rejectedReasons = [];
            for (var r = 0; r < partialDayStatuses.length; r++) {
                if (partialDayStatuses[r] === 'rejected' && partialDayReasons[r]) rejectedReasons.push(partialDayReasons[r]);
            }
            if (rejectedReasons.length) partialRow.dataset.rejectionReason = rejectedReasons.join(' | ');

            // Create new rows for rejected and pending groups
            if (rejectedCount > 0 && approvedCount > 0) {
                addRemainderRow(partialRow, rejectedCount, 'Rejected');
            }
            if (pendingCount > 0 && approvedCount > 0) {
                addRemainderRow(partialRow, pendingCount, 'Pending');
            }

            var parts = [];
            if (approvedCount > 0) parts.push(approvedCount + ' approved');
            if (rejectedCount > 0) parts.push(rejectedCount + ' rejected');
            if (pendingCount > 0) parts.push(pendingCount + ' pending');
            showToast('Review complete — ' + parts.join(', '), 'success');

            updateActionState(partialRow);
            closePartialModal();
            refreshTable();
        });

        function addRemainderRow(afterRow, count, status) {
            var newRow = afterRow.cloneNode(true);
            var newDaysCell = newRow.querySelector('td.fw-bold');
            newDaysCell.textContent = count;

            var statusLower = status.toLowerCase();
            var newStatus = newRow.querySelector('.leave-status');
            newStatus.className = 'leave-status ' + statusLower;
            newStatus.innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>' + status;

            var allRows = document.querySelectorAll('#pgBody .leave-row');
            newRow.querySelector('.sno-value').textContent = allRows.length + 1;
            newRow.dataset.status = status;
            if (status !== 'Rejected') newRow.dataset.rejectionReason = '';

            afterRow.parentNode.insertBefore(newRow, afterRow.nextSibling);

            // Re-bind action events for new row
            var newToggle = newRow.querySelector('.menu-trigger');
            var newMenu = newRow.querySelector('.leave-action-menu');
            if (newMenu) newMenu.classList.remove('open');
            if (newToggle) newToggle.setAttribute('aria-expanded', 'false');

            var newApproveAction = newRow.querySelector('.approve-action');
            if (newApproveAction) {
                newApproveAction.addEventListener('click', function() {
                    newRow.dataset.status = 'Approved';
                    newRow.querySelector('.leave-status').className = 'leave-status approved';
                    newRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Approved';
                    updateActionState(newRow);
                    refreshTable();
                });
            }

            var newRejectAction = newRow.querySelector('.reject-action');
            if (newRejectAction) {
                newRejectAction.addEventListener('click', function() {
                    rejectRow = newRow;
                    document.getElementById('leaveRejectEmployee').textContent = newRejectAction.dataset.employee;
                    rejectModal.classList.add('show');
                    document.getElementById('leaveRejectReason').focus();
                });
            }

            var newPartialAction = newRow.querySelector('.partial-approve-action');
            if (newPartialAction) {
                newPartialAction.addEventListener('click', function() {
                    var foundRow = findRowByEmp(newPartialAction.dataset.empid, newPartialAction.dataset.from);
                    if (foundRow) openPartialModal(foundRow);
                });
            }

            var newViewReason = newRow.querySelector('.view-reason-action');
            if (newViewReason) {
                newViewReason.addEventListener('click', function() {
                    var rejReason = newRow.dataset.rejectionReason || newViewReason.dataset.reason || 'No rejection reason provided';
                    document.getElementById('leaveViewReasonEmployee').textContent = newViewReason.dataset.employee;
                    document.getElementById('leaveViewReasonText').textContent = rejReason;
                    viewReasonModal.classList.add('show');
                });
            }

            updateActionState(newRow);
        }

        document.getElementById('partialApproveClose').addEventListener('click', closePartialModal);
        document.getElementById('partialApproveCancel').addEventListener('click', closePartialModal);
        partialModal.addEventListener('click', function(event) {
            if (event.target === partialModal) closePartialModal();
        });

        // Simple toast notification
        function showToast(message, type) {
            var toast = document.createElement('div');
            toast.className = 'partial-toast partial-toast-' + (type || 'info');
            toast.innerHTML = '<i class="bi ' + (type === 'success' ? 'bi-check-circle-fill' : 'bi-info-circle-fill') + '"></i> ' + message;
            document.body.appendChild(toast);
            setTimeout(function() {
                toast.classList.add('show');
            }, 10);
            setTimeout(function() {
                toast.classList.remove('show');
                setTimeout(function() {
                    toast.remove();
                }, 400);
            }, 3000);
        }

        function chips() {
            var list = document.getElementById('leaveActiveList'),
                items = [{
                    label: 'Employee',
                    value: document.getElementById('leaveSearch').value,
                    field: 'leaveSearch'
                }, {
                    label: 'Type',
                    value: document.getElementById('leaveType').value === 'All Types' ? '' : document.getElementById('leaveType').value,
                    field: 'leaveType'
                }, {
                    label: 'Status',
                    value: document.getElementById('leaveStatus').value === 'All Status' ? '' : document.getElementById('leaveStatus').value,
                    field: 'leaveStatus'
                }, {
                    label: 'Date Range',
                    value: document.getElementById('leaveRange').value,
                    field: 'leaveRange'
                }].filter(function(item) {
                    return item.value;
                });
            list.innerHTML = '';
            items.forEach(function(item) {
                var chip = document.createElement('span');
                chip.className = 'leave-chip';
                var text = document.createElement('span');
                text.textContent = item.label + ': ' + item.value;
                var close = document.createElement('button');
                close.type = 'button';
                close.className = 'leave-chip-close';
                close.setAttribute('aria-label', 'Remove ' + item.label + ' filter');
                close.innerHTML = '&times;';
                close.addEventListener('click', function() {
                    if (item.field === 'leaveType') document.getElementById(item.field).value = 'All Types';
                    else if (item.field === 'leaveStatus') document.getElementById(item.field).value = 'All Status';
                    else document.getElementById(item.field).value = '';
                    if (item.field === 'leaveRange') {
                        rangeStart = '';
                        rangeEnd = '';
                    }
                    if (item.field === 'leaveSearch') appliedSearch = '';
                    if (item.field === 'leaveType') appliedType = 'All Types';
                    if (item.field === 'leaveStatus') appliedStatus = 'All Status';
                    chips();
                    refreshTable();
                });
                chip.appendChild(text);
                chip.appendChild(close);
                list.appendChild(chip);
            });
            document.getElementById('leaveActiveBar').hidden = !items.length;
        }

        function setDate(delta) {
            var d = new Date(selectedDate || '2026-08-27');
            d.setDate(d.getDate() + delta);
            selectedDate = d.toISOString().slice(0, 10);
            dateInput.value = selectedDate.split('-').reverse().join('-');
            rangeStart = '';
            rangeEnd = '';
            refreshTable();
        }
        dateInput.addEventListener('change', function() {
            var date = iso(this.value);
            if (date) {
                selectedDate = date;
                rangeStart = '';
                rangeEnd = '';
                refreshTable();
            }
        });
        document.getElementById('leavePrevDate').onclick = function() {
            setDate(-1);
        };
        document.getElementById('leaveNextDate').onclick = function() {
            setDate(1);
        };
        document.getElementById('leaveApply').onclick = function() {
            var r = range(document.getElementById('leaveRange').value);
            appliedSearch = document.getElementById('leaveSearch').value;
            appliedType = document.getElementById('leaveType').value;
            appliedStatus = document.getElementById('leaveStatus').value;
            rangeStart = r.start;
            rangeEnd = r.end;
            chips();
            refreshTable();
        };
        document.getElementById('leaveClear').onclick = function() {
            document.getElementById('leaveSearch').value = '';
            document.getElementById('leaveType').value = 'All Types';
            document.getElementById('leaveStatus').value = 'All Status';
            document.getElementById('leaveRange').value = '';
            appliedSearch = '';
            appliedType = 'All Types';
            appliedStatus = 'All Status';
            rangeStart = '';
            rangeEnd = '';
            chips();
            refreshTable();
        };
        document.getElementById('leaveActiveClear').onclick = function() {
            document.getElementById('leaveClear').click();
        };
        document.getElementById('leaveFiltersToggle').onclick = function() {
            var panel = document.getElementById('leaveFiltersCollapse'),
                open = panel.classList.toggle('open');
            this.classList.toggle('open', open);
            this.querySelector('span').textContent = open ? 'Hide Filters' : 'Filters';
        };

        // Summary card click functionality
        document.querySelectorAll('.leave-summary-card').forEach(function(card) {
            card.addEventListener('click', function() {
                // Skip if card has no status filter
                if (!this.dataset.statusFilter) return;

                // Remove active class from all cards
                document.querySelectorAll('.leave-summary-card').forEach(function(c) {
                    c.classList.remove('active');
                    c.removeAttribute('aria-current');
                });

                // Add active class to clicked card
                this.classList.add('active');
                this.setAttribute('aria-current', 'true');

                // Get the status filter from data attribute
                var statusFilter = this.dataset.statusFilter;

                // Update the applied status
                if (statusFilter === 'all') {
                    appliedStatus = 'All Status';
                } else {
                    appliedStatus = statusFilter;
                }

                // Update the status dropdown in filter panel
                document.getElementById('leaveStatus').value = appliedStatus;

                // Update filter chips
                chips();

                // Refresh the table
                refreshTable();
            });
        });

        // ===== Tab switching: Leave Requests / Leave Balance / Team Calendar =====
        var leaveTabButtons = document.querySelectorAll('[data-leave-tab]'),
            requestsSection = document.getElementById('leaveSectionRequests'),
            balanceSection = document.getElementById('leaveSectionBalance'),
            teamCalSection = document.getElementById('leaveSectionTeamCalendar');

        leaveTabButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                leaveTabButtons.forEach(function(b) {
                    b.classList.remove('active');
                });
                this.classList.add('active');

                var tab = this.dataset.leaveTab;
                if (requestsSection) requestsSection.hidden = tab !== 'requests';
                if (balanceSection) balanceSection.hidden = tab !== 'balance';
                if (teamCalSection) {
                    teamCalSection.hidden = tab !== 'team-calendar';
                    if (tab === 'team-calendar' && typeof window.renderTeamCalendar === 'function') {
                        window.renderTeamCalendar();
                    }
                }
            });
        });

        // ===== Team Calendar (inline replica of the attendance calendar modal) =====
        (function() {
            var grid = document.getElementById('tcCalendarGrid');
            if (!grid) return;

            var TC_MONTHS = ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];

            var TC_STATUS_COLORS = {
                present: {
                    bg: 'var(--att-present-bg)',
                    fg: 'var(--primary)'
                },
                absent: {
                    bg: 'var(--att-absent-bg)',
                    fg: 'var(--att-danger)'
                },
                late: {
                    bg: 'var(--att-late-bg)',
                    fg: 'var(--att-late-fg)'
                },
                half: {
                    bg: 'var(--att-half-bg)',
                    fg: 'var(--att-half-fg)'
                },
                leave: {
                    bg: 'var(--att-leave-bg)',
                    fg: 'var(--att-leave-fg)'
                },
                holiday: {
                    bg: 'var(--att-holiday-bg)',
                    fg: 'var(--att-holiday-fg)'
                }
            };

            // Build the team roster from the leave-request rows on this page
            var team = [];
            rows.forEach(function(row, i) {
                var nameEl = row.querySelector('.person-name');
                if (!nameEl || !row.cells[1]) return;
                team.push({
                    id: row.cells[1].textContent.trim(),
                    name: nameEl.textContent.trim(),
                    seed: i + 1
                });
            });

            var empSelect = document.getElementById('tcEmployeeSelect');
            var teamSelect = document.getElementById('tcTeamSelect');

            // Team mapping: employee ID -> team name
            var empTeamMap = {
                'EMP0001': 'Node JS',
                'EMP0002': 'Design',
                'EMP0003': 'iOS',
                'EMP0004': 'Business',
                'EMP0005': 'Marketing',
                'EMP0006': 'Design',
                'EMP0007': 'iOS',
                'EMP0008': 'Business',
                'EMP0009': 'Marketing',
                'EMP0010': 'Node JS',
                'EMP0011': 'iOS',
                'EMP0012': 'Business',
                'EMP0013': 'Marketing',
                'EMP0014': 'Node JS',
                'EMP0015': 'iOS',
                'EMP0016': 'Business',
                'EMP0017': 'Marketing',
                'EMP0018': 'Node JS',
                'EMP0019': 'iOS',
                'EMP0020': 'Business'
            };

            function populateMembers(selectedTeam) {
                empSelect.innerHTML = '';
                team.forEach(function(member) {
                    if (selectedTeam && empTeamMap[member.id] !== selectedTeam) return;
                    var opt = document.createElement('option');
                    opt.value = member.id;
                    opt.textContent = member.name + ' (' + member.id + ')';
                    empSelect.appendChild(opt);
                });
                if (window.jQuery && jQuery.fn.select2) {
                    jQuery(empSelect).select2({
                        width: 'style',
                        placeholder: 'Select Team Member'
                    });
                }
                if (empSelect.options.length > 0) {
                    currentEmpId = empSelect.options[0].value;
                    render();
                }
            }

            var currentEmpId = team.length ? team[0].id : null,
                todayInit = new Date(),
                currentYear = todayInit.getFullYear(),
                currentMonth = todayInit.getMonth();

            populateMembers('');

            // Team select filter
            if (window.jQuery && jQuery.fn.select2) {
                jQuery(teamSelect).select2({
                    width: 'style',
                    placeholder: 'All Teams'
                });
            }
            teamSelect.addEventListener('change', function() {
                populateMembers(this.value);
            });

            // Deterministic pseudo-random pattern per member/day (same formula
            // as the attendance calendar modal, so views stay consistent)
            function statusForDay(seed, year, month, day) {
                var dow = new Date(year, month, day).getDay();
                if (dow === 0 || dow === 6) return 'holiday';

                var n = (seed * 31 + year * 7 + (month + 1) * 13 + day * 3) % 100;

                if (n < 4) return 'leave';
                if (n < 10) return 'absent';
                if (n < 22) return 'late';
                if (n < 28) return 'half';
                return 'present';
            }

            function render() {
                var member = null;
                for (var t = 0; t < team.length; t++) {
                    if (team[t].id === currentEmpId) {
                        member = team[t];
                        break;
                    }
                }
                if (!member) return;

                document.getElementById('tcMonthLabel').textContent =
                    TC_MONTHS[currentMonth] + ' ' + currentYear;

                // Only remove day cells — the 7 .acm-dow header cells stay put
                grid.querySelectorAll('.acm-day').forEach(function(cell) {
                    cell.remove();
                });

                var firstDay = new Date(currentYear, currentMonth, 1).getDay();
                var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

                var counts = {
                    present: 0,
                    absent: 0,
                    late: 0,
                    half: 0,
                    leave: 0
                };
                var totalHours = 0,
                    workedDays = 0,
                    delay = 0;

                var todayDate = new Date();
                var isCurrentMonth = (todayDate.getFullYear() === currentYear && todayDate.getMonth() === currentMonth);

                for (var i = 0; i < firstDay; i++) {
                    var empty = document.createElement('div');
                    empty.className = 'acm-day empty';
                    grid.appendChild(empty);
                }

                for (var d = 1; d <= daysInMonth; d++) {
                    var status = statusForDay(member.seed, currentYear, currentMonth, d);
                    var colors = TC_STATUS_COLORS[status];

                    var cell = document.createElement('div');
                    cell.className = 'acm-day' +
                        (status === 'holiday' ? ' acm-holiday' : '') +
                        (isCurrentMonth && d === todayDate.getDate() ? ' acm-today' : '');
                    cell.style.background = colors.bg;
                    cell.style.color = colors.fg;
                    cell.style.animationDelay = (delay * 12) + 'ms';
                    cell.dataset.day = d;
                    cell.dataset.status = status;
                    cell.style.cursor = status !== 'holiday' ? 'pointer' : 'default';
                    delay++;

                    var numSpan = document.createElement('span');
                    numSpan.className = 'num';
                    numSpan.textContent = d;
                    cell.appendChild(numSpan);

                    var tagSpan = document.createElement('span');
                    tagSpan.className = 'tag';
                    tagSpan.textContent = status === 'holiday' ? 'Off' :
                        status === 'half' ? 'Half' :
                        status.charAt(0).toUpperCase() + status.slice(1);
                    cell.appendChild(tagSpan);

                    if (counts.hasOwnProperty(status)) counts[status]++;

                    if (status === 'present') {
                        totalHours += 8.5;
                        workedDays++;
                    } else if (status === 'late') {
                        totalHours += 7.8;
                        workedDays++;
                    } else if (status === 'half') {
                        totalHours += 4.2;
                        workedDays++;
                    }

                    grid.appendChild(cell);
                }

                document.getElementById('tcPresentCount').textContent = counts.present;
                document.getElementById('tcAbsentCount').textContent = counts.absent;
                document.getElementById('tcLateCount').textContent = counts.late;
                document.getElementById('tcLeaveCount').textContent = counts.leave;
                document.getElementById('tcAvgHours').textContent =
                    workedDays > 0 ? (totalHours / workedDays).toFixed(1) + 'h' : '0h';
            }

            empSelect.addEventListener('change', function() {
                currentEmpId = this.value;
                render();
            });

            document.getElementById('tcPrevMonth').addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                render();
            });

            document.getElementById('tcNextMonth').addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                render();
            });

            // Exposed so the tab switch can (re)render when the tab opens
            window.renderTeamCalendar = render;
        })();

        // Leave Balance scroll arrows
        var balanceScroll = document.getElementById('leaveBalanceScroll');
        if (balanceScroll) {
            var prevArrow = document.querySelector('.leave-balance-nav-prev'),
                nextArrow = document.querySelector('.leave-balance-nav-next');
            if (prevArrow) prevArrow.addEventListener('click', function() {
                balanceScroll.scrollBy({
                    left: -240,
                    behavior: 'smooth'
                });
            });
            if (nextArrow) nextArrow.addEventListener('click', function() {
                balanceScroll.scrollBy({
                    left: 240,
                    behavior: 'smooth'
                });
            });
        }

        // ===== Leave Type badge click -> open Apply Leave modal with that type preselected =====
        function openApplyModalWithType(type) {
            var typeSelect = document.getElementById('leaveApplyType');
            var matched = Array.from(typeSelect.options).some(function(opt) {
                return opt.value === type;
            });
            typeSelect.value = matched ? type : '';

            var modalEl = document.getElementById('leaveApplyModal');
            var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modal.show();
        }

        // Generic: any element carrying data-leave-type, OR any element inside
        // a ".leave-balance-card" whose text matches a known leave type
        // (covers cards like "Annual leave" / "PTO" / "Compensatory off" in
        // the Leave Balance tab, even without exact markup being known here).
        var knownLeaveTypes = Array.from(document.getElementById('leaveApplyType').options)
            .map(function(o) {
                return o.value;
            })
            .filter(Boolean);

        function normalize(str) {
            return (str || '').trim().toLowerCase().replace(/\s+/g, ' ');
        }

        document.addEventListener('click', function(event) {
            var card = event.target.closest('.leave-balance-card, [data-leave-type]');
            if (!card) return;

            var type = card.dataset.leaveType;
            if (!type) {
                var text = normalize(card.textContent);
                type = knownLeaveTypes.find(function(t) {
                    return normalize(t) === text || text.indexOf(normalize(t)) === 0;
                });
            }
            if (!type) return;

            event.stopPropagation();
            openApplyModalWithType(type);
        });

        document.addEventListener('keydown', function(event) {
            if (event.key !== 'Enter' && event.key !== ' ') return;
            var card = event.target.closest('.leave-balance-card');
            if (!card) return;
            event.preventDefault();
            event.stopPropagation();
            openApplyModalWithType(card.dataset.leaveType);
        });

        document.querySelectorAll('.leave-type[data-leave-type]').forEach(function(badge) {
            badge.style.cursor = 'pointer';

            badge.addEventListener('click', function(event) {
                event.stopPropagation();
                openApplyModalWithType(this.dataset.leaveType);
            });

            // keyboard accessibility (Enter / Space)
            badge.addEventListener('keydown', function(event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    event.stopPropagation();
                    openApplyModalWithType(this.dataset.leaveType);
                }
            });
        });

        // ===== Leave Apply Modal: date summary + balance auto-calc (Bootstrap-managed modal) =====
        (function() {
            var applyModal = document.getElementById('leaveApplyModal'),
                fromInput = document.getElementById('leaveApplyFromDate'),
                toInput = document.getElementById('leaveApplyToDate'),
                dayTypeSel = document.getElementById('leaveApplyDayType'),
                summaryEl = document.getElementById('leaveApplyDateSummary'),
                totalEl = document.getElementById('leaveApplyTotalDays'),
                availableEl = document.getElementById('availableBalance'),
                bookedEl = document.getElementById('currentlyBooked'),
                afterEl = document.getElementById('balanceAfterBooking'),
                estimatedEl = document.getElementById('estimatedBalance'),
                asOfEl = document.getElementById('balanceAsOfDate'),
                empSelect = document.getElementById('leaveEmployeeSelect');

            var weekday = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            // Static per-employee balances (swap for a real data source as needed)
            var employeeBalances = {
                EMP0001: 14,
                EMP0002: 7,
                EMP0003: 10,
                EMP0004: 8,
                EMP0005: 12,
                EMP0006: 5,
                EMP0007: 9,
                EMP0008: 16
            };

            function parseDMY(str) {
                var p = (str || '').split('-');
                if (p.length !== 3) return null;
                var d = new Date(p[2], p[1] - 1, p[0]);
                return isNaN(d.getTime()) ? null : d;
            }

            function fmt(d) {
                var dd = String(d.getDate()).padStart(2, '0'),
                    months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                return dd + '-' + months[d.getMonth()] + '-' + d.getFullYear();
            }

            function currentAvailable() {
                var val = employeeBalances[empSelect.value];
                return typeof val === 'number' ? val : (parseFloat(availableEl.textContent) || 0);
            }

            function recalc() {
                var fromDate = parseDMY(fromInput.value),
                    toDate = parseDMY(toInput.value) || fromDate,
                    dayType = dayTypeSel.value;

                if (!fromDate) {
                    summaryEl.textContent = 'Select a date';
                    totalEl.textContent = '0 Day(s)';
                    return;
                }

                var label = weekday[fromDate.getDay()] + ' ' + fromInput.value;
                if (toDate && toInput.value && toInput.value !== fromInput.value) {
                    label += '  –  ' + weekday[toDate.getDay()] + ' ' + toInput.value;
                }
                summaryEl.textContent = label;

                var days = Math.round((toDate - fromDate) / 86400000) + 1;
                if (days < 1) days = 1;
                if (dayType !== 'Full Day') days = days > 1 ? days - 0.5 : 0.5;
                totalEl.textContent = days + ' Day(s)';

                var available = currentAvailable(),
                    after = Math.max(available - days, 0);

                availableEl.textContent = available;
                bookedEl.textContent = days;
                afterEl.textContent = after;
                estimatedEl.textContent = after;
                asOfEl.textContent = fmt(new Date());
            }

            [fromInput, toInput, dayTypeSel, empSelect].forEach(function(el) {
                el.addEventListener('change', recalc);
            });

            // Bootstrap fires this automatically after the modal (opened via
            // data-bs-toggle/data-bs-target) has fully finished animating in.
            applyModal.addEventListener('shown.bs.modal', recalc);

            document.getElementById('leaveApplySubmit').addEventListener('click', function() {
                // Wire this up to your actual submit/API call before hiding.
                var instance = bootstrap.Modal.getInstance(applyModal);
                if (instance) instance.hide();
            });

            recalc();
        })();

        refreshTable();
    });
</script>

<script>
    $('#employeeSelect').select2({
        width: '100%',
        placeholder: 'Select Employee',
        allowClear: true,

        templateResult: function(data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-option">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        },

        templateSelection: function(data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-selected">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#leaveApplyType').select2({
            width: '100%',
        });
    });
</script>