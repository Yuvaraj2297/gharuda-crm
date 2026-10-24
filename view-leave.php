<?php include 'header.php'; ?>

<script>
/* Demo employee list — same source as Add Manual Attendance modal.
   Each entry is [name, employee id, department]. It feeds the Reporting
   Manager select and the Assign Employee select further down the page. */
window.leavePageEmployees = [
    ['Amelia Curr', 'EMP0001', 'Design'],
    ['Daniel Martinez', 'EMP0002', 'Design'],
    ['David Anderson', 'EMP0003', 'iOS Dev'],
    ['Emily Clark', 'EMP0004', 'Business'],
    ['Sophia Johnson', 'EMP0005', 'Marketing']
];
</script>


 

<style>
    .view-leave-page {
        --leave-blue: #3b82f6;
        --leave-amber: #f59e0b;
        --leave-violet: #8b5cf6;
        --leave-green: #10b981;
    }

    .view-leave-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        /* margin-bottom: 24px; */
        padding-bottom: 16px;
    }

    .employee-select {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        padding: 6px 12px 6px 6px;
        border-radius: 10px;
        transition: background 0.15s ease;
    }

    .employee-select:hover {
        background: var(--ink-50);
    }

    .employee-select img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--primary-soft);
    }

    .employee-select .emp-info {
        display: flex;
        flex-direction: column;
        line-height: 1.2;
    }

    .employee-select .emp-id {
        font-size: 11.5px;
        color: var(--ink-500);
        font-weight: 600;
    }

    .employee-select .emp-name {
        font-size: 14.5px;
        font-weight: 700;
        color: var(--ink-900);
    }

    .employee-select .bi-chevron-down {
        color: var(--ink-400);
        font-size: 12px;
    }

    .view-leave-date-nav {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }

    .view-leave-date-nav .nav-arrow {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 50%;
        background: transparent;
        color: var(--ink-700);
        cursor: pointer;
        transition: background 0.15s ease, color 0.15s ease, transform 0.15s ease;
    }

    .view-leave-date-nav .nav-arrow:hover {
        background: var(--primary-soft);
        color: var(--primary-dark);
        transform: scale(1.08);
    }

    .view-leave-date-nav .date-range {
        padding: 6px 16px;
        font-weight: 700;
        font-size: 14.5px;
        color: var(--ink-900);
        border-radius: 8px;
        background: transparent;
        cursor: pointer;
        transition: background 0.15s ease;
    }

    .view-leave-date-nav .date-range:hover {
        background: var(--ink-50);
    }

    .view-leave-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-apply-leave {
        background: var(--primary);
        color: #fff;
        border: 0;
        padding: 9px 18px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 13.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        transition: background 0.2s ease, box-shadow 0.2s ease, transform 0.15s ease;
        box-shadow: 0 2px 8px rgba(22, 163, 74, 0.25);
    }

    .btn-apply-leave:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(22, 163, 74, 0.32);
    }

    .btn-more {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        border-radius: 8px;
        background: transparent;
        color: var(--ink-600);
        cursor: pointer;
        transition: background 0.15s ease, color 0.15s ease;
    }

    .btn-more:hover {
        background: var(--ink-50);
        color: var(--ink-900);
    }

    /* Leave Balance Cards */
    .leave-balance-section {
        margin-bottom: 24px;
        position: relative;
    }

    .leave-balance-scroll {
        display: flex;
        gap: 14px;
        overflow-x: auto;
        padding-bottom: 4px;
        scroll-behavior: smooth;
    }

    /* .leave-balance-scroll::-webkit-scrollbar {
        height: 4px;
    }

    .leave-balance-scroll::-webkit-scrollbar-track {
        background: transparent;
    }

    .leave-balance-scroll::-webkit-scrollbar-thumb {
        background: var(--ink-200);
        border-radius: 4px;
    } */

    .leave-balance-card {
        flex: 0 0 auto;
        width: 185px;
        background: #fff;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        padding: 20px 18px;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        position: relative;
        cursor: pointer;
    }

    .leave-balance-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        border-color: var(--primary-soft);
    }

    .leave-balance-card .card-title {
        font-size: 13.5px;
        font-weight: 700;
        color: var(--ink-900);
        text-align: center;
        margin-bottom: 18px;
    }

    .leave-balance-card .card-icon {
        width: 52px;
        height: 52px;
        margin: 0 auto 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 26px;
    }

    .leave-balance-card .card-icon.icon-blue {
        background: rgba(59, 130, 246, 0.1);
        color: var(--leave-blue);
    }

    .leave-balance-card .card-icon.icon-amber {
        background: rgba(245, 158, 11, 0.1);
        color: var(--leave-amber);
    }

    .leave-balance-card .card-icon.icon-violet {
        background: rgba(139, 92, 246, 0.1);
        color: var(--leave-violet);
    }

    .leave-balance-card .card-icon.icon-green {
        background: rgba(16, 185, 129, 0.1);
        color: var(--leave-green);
    }

    .leave-balance-card .card-icon.icon-red {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
    }

    .leave-balance-card .balance-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 4px 0;
        font-size: 13px;
    }

    .leave-balance-card .balance-row .label {
        color: var(--ink-500);
        font-weight: 600;
    }

    .leave-balance-card .balance-row .value {
        color: var(--ink-900);
        font-weight: 800;
    }

    .scroll-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #fff;
        border: 1px solid var(--border-soft);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        color: var(--ink-700);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 5;
        transition: background 0.15s ease, color 0.15s ease, transform 0.15s ease;
    }

    .scroll-nav-btn:hover {
        background: var(--primary-soft);
        color: var(--primary-dark);
    }

    .scroll-nav-btn.scroll-left {
        left: -10px;
    }

    .scroll-nav-btn.scroll-right {
        right: -10px;
    }

    /* Bradford Score */
    .bradford-section {
        background: #fff;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        padding: 18px 22px;
        margin-bottom: 24px;
    }

    .bradford-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .bradford-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15.5px;
        font-weight: 700;
        color: var(--ink-900);
    }

    .bradford-title .period {
        font-size: 12.5px;
        color: var(--ink-500);
        font-weight: 500;
    }

    .bradford-title .period::before {
        content: '';
        display: inline-block;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: var(--ink-400);
        margin-right: 8px;
        vertical-align: middle;
    }

    .view-detailed-link {
        font-size: 13px;
        font-weight: 700;
        color: var(--primary);
        cursor: pointer;
        transition: color 0.15s ease;
        text-decoration: none;
    }

    .view-detailed-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .bradford-body {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 4px;
    }

    .bradford-label {
        font-size: 14px;
        font-weight: 600;
        color: var(--ink-700);
    }

    .bradford-score {
        display: flex;
        align-items: baseline;
        gap: 8px;
    }

    .bradford-score .score-num {
        font-family: 'Sora', sans-serif;
        font-size: 22px;
        font-weight: 800;
        color: var(--ink-900);
    }

    .bradford-score .score-level {
        font-size: 13px;
        font-weight: 600;
        color: var(--ink-500);
    }

    /* Leave & Holidays Section - redesigned */
    .leave-holidays-section {
        background: #f8fafc;
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(15, 23, 42, 0.05);
    }

    .leave-holidays-head {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 18px;
        padding: 18px 22px 16px;
        background: #fff;
        border-bottom: 1px solid var(--border-soft);
    }

    .leave-holidays-heading {
        display: flex;
        align-items: flex-start;
        gap: 11px;
        min-width: 0;
    }

    .leave-holidays-heading-copy {
        min-width: 0;
    }

    .leave-holidays-heading-copy {
        position: relative;
    }

    .leave-holidays-heading .section-subtitle {
        margin-top: 3px;
        color: var(--ink-500);
        font-size: 12px;
        font-weight: 600;
    }

    .leave-filter-select {
        width: 250px;
        height: 38px;
        padding: 0 34px 0 10px;
        border: 1px solid #60a5fa;
        border-radius: 5px;
        background: #fff;
        color: var(--ink-900);
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        outline: 0;
    }

    .leave-filter-select:focus {
        box-shadow: 0 0 0 2px rgba(59, 130, 246, .15);
    }

    .all-items-dropdown {
        position: absolute;
        top: calc(100% + 12px);
        left: 0;
        width: 320px;
        padding: 12px;
        background: #fff;
        border: 1px solid var(--border-soft);
        border-radius: 12px;
        box-shadow: 0 14px 32px rgba(20, 30, 25, .14);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-6px);
        transition: opacity .16s ease, transform .16s ease, visibility .16s ease;
        z-index: 20;
    }

    .all-items-dropdown.open {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .all-items-dropdown-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2px 4px 9px;
        border-bottom: 1px solid var(--border-soft);
    }

    .all-items-dropdown-head strong {
        color: var(--ink-900);
        font-size: 12px;
    }

    .all-items-dropdown-head span {
        color: var(--ink-500);
        font-size: 11px;
        font-weight: 700;
    }

    .overview-group {
        padding-top: 10px;
    }

    .overview-group-title {
        padding: 0 4px 5px;
        color: var(--ink-500);
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .45px;
        text-transform: uppercase;
    }

    .overview-item {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 7px 4px;
        border-radius: 7px;
    }

    .overview-item:hover {
        background: var(--ink-50);
    }

    .overview-item-icon {
        width: 28px;
        height: 28px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: var(--primary-soft);
        color: var(--primary-dark);
        font-size: 12px;
        flex-shrink: 0;
    }

    .overview-item-copy {
        min-width: 0;
        flex: 1;
    }

    .overview-item-copy strong {
        display: block;
        overflow: hidden;
        color: var(--ink-900);
        font-size: 12px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .overview-item-copy span {
        display: block;
        margin-top: 2px;
        color: var(--ink-500);
        font-size: 10.5px;
    }

    .overview-item-status {
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
    }

    .overview-item-status.pending {
        color: #a3670a;
    }

    .overview-item-status.approved {
        color: var(--primary-dark);
    }

    .overview-empty {
        padding: 12px 4px 4px;
        color: var(--ink-500);
        font-size: 11px;
        text-align: center;
    }

    .section-title-dropdown {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 800;
        color: var(--ink-900);
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 8px;
        margin-left: -8px;
        transition: background 0.15s ease;
    }

    .section-title-dropdown:hover {
        background: var(--ink-50);
    }

    .section-title-dropdown .section-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        background: linear-gradient(135deg, var(--primary-soft), var(--primary-light));
        color: var(--primary-dark);
        box-shadow: 0 3px 8px rgba(22, 163, 74, 0.15);
    }

    .section-title-dropdown .bi-chevron-down {
        font-size: 12px;
        color: var(--ink-500);
        margin-left: 2px;
    }

    .tab-switch {
        display: inline-flex;
        background: var(--ink-50);
        border-radius: 10px;
        padding: 3px;
        flex-shrink: 0;
    }

    .tab-switch .tab-btn {
        border: 0;
        background: transparent;
        padding: 7px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-500);
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .tab-switch .tab-btn.active {
        background: #fff;
        color: var(--primary);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .tab-btn .tab-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 20px;
        height: 20px;
        margin-left: 5px;
        padding: 0 5px;
        border-radius: 999px;
        background: var(--ink-100);
        color: var(--ink-600);
        font-size: 10px;
        font-weight: 800;
    }

    .tab-btn.active .tab-count {
        background: var(--primary-soft);
        color: var(--primary-dark);
    }

    .tab-switch .tab-btn:not(.active):hover {
        color: var(--ink-700);
    }

    .leave-holidays-list {
        padding: 14px 18px 20px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        background: #f8fafc;
    }

    .leave-holiday-item {
        display: grid;
        grid-template-columns: 188px minmax(0, 1fr) auto;
        align-items: center;
        gap: 18px;
        padding: 13px 16px;
        border: 1px solid #e7ebef;
        border-radius: 10px;
        background: #fff;
        position: relative;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .leave-holiday-item.leave-item {
        grid-template-columns: 216px 1fr auto;
    }

    .leave-holiday-item:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 14px rgba(15, 23, 42, 0.07);
        border-color: var(--primary-soft);
    }

    .leave-holiday-item.selected-overview-item {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-soft);
    }

    /* Holiday edit / delete hover actions */
    .leave-holiday-item .holiday-acts {
        display: flex;
        align-items: center;
        gap: 6px;
        opacity: 0;
        transform: translateX(6px);
        transition: opacity .18s ease, transform .18s ease;
        pointer-events: none;
    }

    .leave-holiday-item:hover .holiday-acts,
    .leave-holiday-item:focus-within .holiday-acts {
        opacity: 1;
        transform: translateX(0);
        pointer-events: auto;
    }

    .holiday-act-btn {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        border: 1px solid #dbe3e9;
        background: #fff;
        color: var(--ink-700);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        cursor: pointer;
        transition: all .15s ease;
    }

    .holiday-act-btn.hol-edit:hover {
        background: var(--primary-soft);
        border-color: var(--primary);
        color: var(--primary-dark);
    }

    .holiday-act-btn.hol-del {
        color: #dc2626;
        border-color: #fecaca;
    }

    .holiday-act-btn.hol-del:hover {
        background: #dc2626;
        border-color: #dc2626;
        color: #fff;
    }

    @media (max-width: 768px) {
        .leave-holiday-item .holiday-acts {
            opacity: 1;
            transform: none;
            pointer-events: auto;
        }
    }

    .date-col {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f1f5f9;
        border-radius: 8px;
        padding: 8px 10px;
    }

    .date-col .date-main {
        font-size: 14px;
        font-weight: 800;
        color: var(--primary-dark);
    }

    .date-col .date-to {
        font-size: 11px;
        color: var(--ink-500);
        font-weight: 600;
        margin: 1px 0;
    }

    .date-col .date-sub {
        font-size: 14px;
        font-weight: 800;
        color: var(--primary-dark);
    }

    .date-col.holiday-date {
        flex-direction: row;
        align-items: center;
        gap: 12px;
        background: transparent;
        padding: 0;
    }

    .date-col.holiday-date .holiday-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--primary-soft), var(--primary-light));
        color: var(--primary-dark);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
        box-shadow: 0 3px 10px rgba(22, 163, 74, 0.15);
    }

    .date-col.holiday-date .holiday-text {
        display: flex;
        flex-direction: column;
    }

    .date-col.holiday-date .date-main {
        font-size: 14px;
        font-weight: 700;
        color: var(--ink-900);
    }

    .details-col {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .item-kind {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        width: fit-content;
        margin-bottom: 3px;
        color: var(--ink-500);
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .45px;
        text-transform: uppercase;
    }

    .item-kind.leave-kind {
        color: var(--primary-dark);
    }

    .item-kind.holiday-kind {
        color: #b45309;
    }

    .leave-type-indicator {
        width: 5px;
        height: 42px;
        border-radius: 4px;
        background: var(--primary);
        flex-shrink: 0;
    }

    .leave-type-indicator.type-sick {
        background: var(--leave-amber);
    }

    .leave-type-indicator.type-casual {
        background: var(--primary);
    }

    .leave-type-indicator.type-annual {
        background: var(--leave-blue);
    }

    .leave-type-indicator.type-pto {
        background: var(--leave-violet);
    }

    .leave-info .leave-name {
        font-size: 14.5px;
        font-weight: 700;
        color: var(--ink-900);
        margin-bottom: 2px;
    }

    .leave-info .leave-days {
        font-size: 12.5px;
        color: var(--ink-500);
        font-weight: 600;
    }

    .holiday-name {
        font-size: 14.5px;
        font-weight: 700;
        color: var(--ink-900);
    }

    .status-col {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .leave-status-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
    }

    .leave-status-pill.status-pending {
        color: #a3670a;
        background: var(--accent-amber-soft);
    }

    .leave-status-pill.status-approved {
        color: var(--primary-dark);
        background: var(--primary-light);
    }

    .leave-status-pill.status-rejected {
        color: #c0362c;
        background: var(--accent-red-soft);
    }

    .leave-status-pill.status-cancelled {
        color: #52525b;
        background: #f1f5f9;
    }

    /* Cancel leave hover action */
    .leave-cancel-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 13px;
        border-radius: 999px;
        border: 1px solid #fecaca;
        background: #fff;
        color: #dc2626;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all .15s ease;
    }

    .leave-cancel-btn:hover {
        background: #dc2626;
        border-color: #dc2626;
        color: #fff;
    }

    .leave-status-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .leave-status-wrap .leave-cancel-btn {
        opacity: 0;
        transform: translateX(6px);
        transition: opacity .18s ease, transform .18s ease;
    }

    .leave-holiday-item:hover .leave-status-wrap .leave-cancel-btn,
    .leave-holiday-item:focus-within .leave-status-wrap .leave-cancel-btn {
        opacity: 1;
        transform: translateX(0);
    }

    @media (max-width: 768px) {
        .leave-status-wrap .leave-cancel-btn {
            opacity: 1;
            transform: none;
        }
    }

    .leave-status-pill .bi {
        font-size: 10px;
    }

    @media (max-width: 768px) {

        .leave-holidays-head {
            align-items: stretch;
            flex-direction: column;
            padding: 16px;
        }

        .tab-switch {
            width: 100%;
        }

        .tab-switch .tab-btn {
            flex: 1;
        }

        .leave-holiday-item,
        .leave-holiday-item.leave-item {
            grid-template-columns: 1fr;
            gap: 10px;
            padding: 14px 16px;
        }

        .date-col.holiday-date {
            gap: 8px;
        }

        .status-col {
            justify-content: flex-start;
        }

        .leave-balance-card {
            width: 160px;
            padding: 16px 14px;
        }
    }

    #leaveApplyModal .modal-dialog {
        max-width: min(100%, 760px);
    }

    #leaveApplyModal .modal-content {
        border: 0;
        border-radius: 16px;
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

    /* Apply Permission modal */
    #permissionApplyModal .modal-dialog {
        max-width: min(100%, 560px);
    }

    #permissionApplyModal .modal-content {
        border: 0;
        border-radius: 16px;
        box-shadow: 0 24px 70px rgba(22, 32, 43, .22);
        overflow: unset;
    }

    .permission-apply-body {
        padding: 22px;
    }

    .permission-time-row {
        display: flex;
        gap: 10px;
    }

    .permission-time-row>input {
        flex: 1 1 0;
    }

    .permission-time-hint {
        font-weight: 500;
        font-size: 11.5px;
        color: var(--ink-500);
        text-transform: none;
    }

    #permissionTotalText.is-ok {
        color: var(--primary-dark, #047857);
    }

    #permissionTotalText.is-over {
        color: #c0362c;
    }

    .permission-result {
        display: none;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 10px;
        padding: 10px 4px 4px;
    }

    .permission-result.show {
        display: flex;
    }

    .permission-result-icon {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        background: var(--accent-amber-soft, #fff3cd);
        color: #a3670a;
    }

    .permission-result-title {
        font: 700 15px 'Sora', sans-serif;
        color: var(--ink-900);
    }

    .permission-result-sub {
        font-size: 12.5px;
        color: var(--ink-500);
        max-width: 360px;
    }

    /* Holiday Offcanvas */
    .btn-add-holiday {
        background: #fff;
        color: var(--primary);
        border: 1.5px solid var(--primary);
        padding: 8px 18px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 13.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        transition: background 0.2s ease, color 0.2s ease, box-shadow 0.2s ease, transform 0.15s ease;
    }

    .btn-add-holiday:hover {
        background: var(--primary-soft);
        color: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(22, 163, 74, 0.18);
    }

    #holidayOffcanvas .offcanvas-header {
        padding: 14px 22px;
        border-bottom: 1px solid var(--border-soft);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    #holidayOffcanvas .offcanvas-title {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 800;
        color: var(--ink-900);
        margin: 0;
    }

    #holidayOffcanvas .offcanvas-title .offcanvas-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        background: linear-gradient(135deg, var(--primary-soft), var(--primary-light));
        color: var(--primary-dark);
        box-shadow: 0 3px 8px rgba(22, 163, 74, 0.15);
    }

    .holiday-header-actions {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-left: auto;
        margin-bottom: 18px;
    }

    .holiday-header-actions .btn {
        font-size: 12.5px;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    .holiday-header-actions .btn-bulk {
        background: #fff;
        color: var(--primary);
        border: 1.5px solid var(--primary);
    }

    .holiday-header-actions .btn-bulk:hover {
        background: var(--primary-soft);
    }

    .holiday-header-actions .btn-bulk.active {
        background: var(--primary);
        color: #fff;
    }

    .holiday-header-actions .btn-sample {
        background: #fff;
        color: var(--ink-700);
        border: 1.5px solid #d1d5db;
    }

    .holiday-header-actions .btn-sample:hover {
        background: var(--ink-50);
        border-color: #9ca3af;
    }

    #holidayOffcanvas .offcanvas-body {
        padding: 22px;
    }

    /* Bulk upload section */
    .bulk-upload-section {
        display: none;
    }

    .bulk-upload-section.show {
        display: block;
    }

    .single-holiday-section.hidden {
        display: none;
    }

    .bulk-dropzone {
        border: 2px dashed #d1d5db;
        border-radius: 14px;
        padding: 40px 20px;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.2s, background 0.2s;
        background: #fafbfc;
    }

    .bulk-dropzone:hover,
    .bulk-dropzone.dragover {
        border-color: var(--primary);
        background: var(--primary-soft);
    }

    .bulk-dropzone .dz-icon {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-soft), var(--primary-light));
        color: var(--primary-dark);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 14px;
    }

    .bulk-dropzone .dz-title {
        font-size: 14px;
        font-weight: 700;
        color: var(--ink-900);
        margin-bottom: 6px;
    }

    .bulk-dropzone .dz-subtitle {
        font-size: 12.5px;
        color: var(--ink-500);
    }

    .bulk-dropzone .dz-subtitle span {
        color: var(--primary);
        font-weight: 700;
        text-decoration: underline;
        cursor: pointer;
    }

    .bulk-dropzone .dz-formats {
        font-size: 11px;
        color: var(--ink-400);
        margin-top: 10px;
    }

    .bulk-file-preview {
        display: none;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        margin-top: 14px;
    }

    .bulk-file-preview.show {
        display: flex;
    }

    .bulk-file-preview .fp-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #dcfce7;
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .bulk-file-preview .fp-info {
        flex: 1;
        min-width: 0;
    }

    .bulk-file-preview .fp-name {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-900);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .bulk-file-preview .fp-size {
        font-size: 11.5px;
        color: var(--ink-500);
    }

    .bulk-file-preview .fp-remove {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        border: 0;
        background: transparent;
        color: var(--ink-400);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        flex-shrink: 0;
    }

    .bulk-file-preview .fp-remove:hover {
        background: var(--accent-red-soft);
        color: #dc2626;
    }

    .holiday-form-row {
        margin-bottom: 16px;
    }

    .holiday-form-row label {
        font-weight: 600;
        font-size: 13px;
        color: var(--ink-900);
        margin-bottom: 6px;
        display: block;
    }

    .holiday-form-row .form-control,
    .holiday-form-row .form-select {
        font-size: 13.5px;
    }

    .holiday-form-foot {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 16px 22px;
        border-top: 1px solid var(--border-soft);
    }
</style>

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

    /* ===== Assign Leave Offcanvas ===== */
    #assignLeaveOffcanvas .offcanvas-header {
        padding: 14px 22px;
        border-bottom: 1px solid var(--border-soft);
    }

    #assignLeaveOffcanvas .offcanvas-title {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 800;
        color: var(--ink-900);
        margin: 0;
    }

    #assignLeaveOffcanvas .offcanvas-title .offcanvas-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        background: linear-gradient(135deg, var(--primary-soft), var(--primary-light));
        color: var(--primary-dark);
        box-shadow: 0 3px 8px rgba(22, 163, 74, 0.15);
    }

    #assignLeaveOffcanvas .offcanvas-body {
        padding: 22px;
    }

    .assign-form-row {
        margin-bottom: 16px;
    }

    .assign-form-row.mb-0 {
        margin-bottom: 0;
    }

    .assign-form-row label {
        font-weight: 600;
        font-size: 13px;
        color: var(--ink-900);
        margin-bottom: 6px;
        display: block;
    }

    .assign-days-row {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .assign-days-stepper {
        display: inline-flex;
        align-items: stretch;
        border: 1px solid var(--border-soft);
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);
    }

    .assign-days-stepper button {
        width: 40px;
        border: 0;
        background: var(--ink-50);
        color: var(--ink-700);
        font-size: 14px;
        cursor: pointer;
        transition: background 0.15s ease, color 0.15s ease, transform 0.1s ease;
    }

    .assign-days-stepper button:hover {
        background: var(--primary-soft);
        color: var(--primary-dark);
    }

    .assign-days-stepper button:active {
        transform: scale(0.94);
    }

    .assign-days-stepper input {
        width: 62px;
        text-align: center;
        border: 0;
        outline: 0;
        box-shadow: none;
        font-weight: 800;
        font-size: 15px;
        color: var(--ink-900);
        background: #fff;
    }

    .assign-quick-chips {
        display: inline-flex;
        gap: 6px;
    }

    .assign-chip {
        border: 1px dashed var(--primary);
        background: #fff;
        color: var(--primary);
        font-size: 12px;
        font-weight: 800;
        padding: 7px 13px;
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .assign-chip:hover {
        background: var(--primary-soft);
        color: var(--primary-dark);
        border-style: solid;
    }

    .assign-summary-box {
        margin-top: 22px;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 70%);
        border: 1px solid #bbf7d0;
        border-radius: 12px;
        padding: 14px 16px;
    }

    .asb-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .asb-title {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 800;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: var(--primary-dark);
    }

    .asb-year {
        font-size: 11px;
        font-weight: 800;
        color: var(--ink-500);
        background: #fff;
        border: 1px solid var(--border-soft);
        padding: 2px 10px;
        border-radius: 999px;
    }

    .asb-employee {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 12px 0;
        min-height: 42px;
    }

    .asb-employee .asb-emp-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #bbf7d0;
    }

    .asb-employee .asb-emp-copy strong {
        display: block;
        font-size: 13.5px;
        color: var(--ink-900);
        line-height: 1.25;
    }

    .asb-employee .asb-emp-copy span {
        font-size: 11px;
        color: var(--ink-500);
        font-weight: 600;
    }

    .asb-employee .asb-emp-placeholder {
        font-size: 12px;
        color: var(--ink-400);
        font-weight: 600;
    }

    .asb-line {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        font-size: 13px;
        border-top: 1px dashed #d1fae5;
    }

    .asb-line span {
        color: var(--ink-500);
        font-weight: 600;
    }

    .asb-line strong {
        color: var(--ink-900);
        font-weight: 800;
    }

    .asb-line.add strong {
        color: var(--primary);
    }

    .asb-line.total {
        border-top: 1px solid #bbf7d0;
    }

    .asb-line.total strong {
        color: var(--primary-dark);
        font-size: 15px;
    }

    .date-input-w280 {
        min-width: 280px;
    }

    .leave-heading-w300 {
        min-width: 300px;
    }

    .text-primary-color {
        color: var(--primary);
    }

    .text-accent-red {
        color: var(--accent-red);
    }

    .leave-reason-display {
        background: #f8f9fa;
        min-height: 100px;
        padding: 12px;
        border-radius: 8px;
    }

    .cursor-pointer {
        cursor: pointer;
    }
</style>



<main class="view-leave-page">
    <div class="view-leave-header">
        <!-- <div>
            <select id="employeeSelect" class="form-select">
                <option value=""></option>
                <option value="1" selected
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

        <div class="month-nav">
            <button class="month-arrow previews" aria-label="Previous year">
                <i class="bi bi-chevron-left"></i>
            </button>
            <div class="">
                <input type="text" class="date-input form-control date-input-w280"
                    placeholder="01-Jan-2026 to 31-Dec-2026" autocomplete="off" disabled />
            </div>
            <button class="month-arrow next" aria-label="Next year">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

        <div class="view-leave-actions">
            <button class="btn-add-holiday" data-bs-toggle="offcanvas" data-bs-target="#assignLeaveOffcanvas"
                aria-controls="assignLeaveOffcanvas">
                <i class="bi bi-person-plus"></i>
                Assign Leave
            </button>
            <button class="btn-add-holiday" data-bs-toggle="offcanvas" data-bs-target="#holidayOffcanvas"
                aria-controls="holidayOffcanvas">
                <i class="bi bi-calendar-heart"></i>
                Add Holiday
            </button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#leaveApplyModal">
                <i class="bi bi-plus-lg"></i>
                Apply Leave
            </button>
        </div>
    </div>

    <section class="leave-balance-section">
        <div class="leave-balance-scroll" id="balanceScroll">
            <div class="leave-balance-card" data-leave-type="Annual leave" data-available="10">
                <div class="card-title">Annual leave</div>
                <div class="card-icon icon-blue">
                    <i class="bi bi-calendar3"></i>
                </div>
                <div class="balance-row">
                    <span class="label">Available</span>
                    <span class="value">: 10</span>
                </div>
                <div class="balance-row">
                    <span class="label">Booked</span>
                    <span class="value">: 0</span>
                </div>
            </div>

            <div class="leave-balance-card" data-leave-type="Bereavement leave" data-available="1">
                <div class="card-title">Bereavement leave</div>
                <div class="card-icon icon-blue">
                    <i class="bi bi-bag-plus"></i>
                </div>
                <div class="balance-row">
                    <span class="label">Available</span>
                    <span class="value">: 1</span>
                </div>
                <div class="balance-row">
                    <span class="label">Booked</span>
                    <span class="value">: 0</span>
                </div>
            </div>

            <div class="leave-balance-card" data-leave-type="Casual Leave" data-available="12">
                <div class="card-title">Casual Leave</div>
                <div class="card-icon icon-amber">
                    <i class="bi bi-calendar-x-fill"></i>
                </div>
                <div class="balance-row">
                    <span class="label">Available</span>
                    <span class="value">: 12</span>
                </div>
                <div class="balance-row">
                    <span class="label">Booked</span>
                    <span class="value">: 2</span>
                </div>
            </div>

            <div class="leave-balance-card" data-leave-type="Compensatory off" data-available="0">
                <div class="card-title">Compensatory off</div>
                <div class="card-icon icon-green">
                    <i class="bi bi-calendar2-check"></i>
                </div>
                <div class="balance-row">
                    <span class="label">Available</span>
                    <span class="value">: 0</span>
                </div>
                <div class="balance-row">
                    <span class="label">Booked</span>
                    <span class="value">: 0</span>
                </div>
            </div>

            <div class="leave-balance-card" data-leave-type="PTO" data-available="2">
                <div class="card-title">PTO</div>
                <div class="card-icon icon-blue">
                    <i class="bi bi-briefcase-fill"></i>
                </div>
                <div class="balance-row">
                    <span class="label">Available</span>
                    <span class="value">: 2</span>
                </div>
                <div class="balance-row">
                    <span class="label">Booked</span>
                    <span class="value">: 0</span>
                </div>
            </div>

            <div class="leave-balance-card" data-leave-type="Sick Leave" data-available="12">
                <div class="card-title">Sick Leave</div>
                <div class="card-icon icon-violet">
                    <i class="bi bi-calendar-heart-fill"></i>
                </div>
                <div class="balance-row">
                    <span class="label">Available</span>
                    <span class="value">: 12</span>
                </div>
                <div class="balance-row">
                    <span class="label">Booked</span>
                    <span class="value">: 0</span>
                </div>
            </div>
        </div>
    </section>


    <section class="leave-holidays-section">
        <div class="leave-holidays-head">
            <div class="leave-holidays-heading">
                <div class="leave-holidays-heading-copy leave-heading-w300">
                    <label class="visually-hidden" for="leaveCategoryFilter">Leave and holiday view</label>
                    <select class="leave-filter-select select2" id="leaveCategoryFilter">
                        <option value="all">Upcoming Leaves &amp; Holidays</option>
                        <option value="leaves">Upcoming Leaves</option>
                        <option value="holidays">Upcoming Holidays</option>
                    </select>
                </div>
            </div>
            <div class="tab-switch">
                <button class="tab-btn active" data-tab="upcoming">Upcoming <span class="tab-count">4</span></button>
                <button class="tab-btn" data-tab="history">History <span class="tab-count">2</span></button>
            </div>
        </div>
        <div class="leave-holidays-list" id="leaveHolidaysList">
            <div class="leave-holiday-item leave-item">
                <div class="date-col text-nowrap">
                    <span class="date-main">01 Feb, Mon</span>
                    <span class="date-to">to</span>
                    <span class="date-sub">02 Feb, Tue</span>
                </div>
                <div class="details-col">
                    <div class="leave-type-indicator type-casual"></div>
                    <div class="leave-info">
                        <div class="item-kind leave-kind"><i class="bi bi-person-walking"></i> Leave request</div>
                        <div class="leave-name">Casual Leave</div>
                        <div class="leave-days">2 Day(s)</div>
                    </div>
                </div>
                <div class="status-col">
                    <div class="leave-status-wrap">
                        <button type="button" class="leave-cancel-btn" data-cancel-leave title="Cancel this leave request"><i class="bi bi-x-circle"></i> Cancel</button>
                        <span class="leave-status-pill status-pending">
                            <i class="bi bi-hourglass-split"></i>
                            Pending
                        </span>
                    </div>
                </div>
            </div>

            <div class="leave-holiday-item">
                <div class="date-col holiday-date">
                    <div class="holiday-icon">
                        <i class="bi bi-calendar-heart-fill"></i>
                    </div>
                    <div class="holiday-text">
                        <span class="date-main">02 Apr, Fri</span>
                    </div>
                </div>
                <div class="details-col">
                    <div>
                        <div class="item-kind holiday-kind"><i class="bi bi-calendar-heart"></i> Public holiday</div>
                        <div class="holiday-name">Good Friday</div>
                    </div>
                </div>
                <div class="status-col">
                    <div class="holiday-acts">
                        <button type="button" class="holiday-act-btn hol-edit" data-hol-edit="Good Friday" data-hol-date="02 Apr, Fri" title="Edit holiday" aria-label="Edit holiday"><i class="bi bi-pencil-fill"></i></button>
                        <button type="button" class="holiday-act-btn hol-del" data-hol-del="Good Friday" title="Delete holiday" aria-label="Delete holiday"><i class="bi bi-trash3-fill"></i></button>
                    </div>
                </div>
            </div>

            <div class="leave-holiday-item">
                <div class="date-col holiday-date">
                    <div class="holiday-icon">
                        <i class="bi bi-calendar-heart-fill"></i>
                    </div>
                    <div class="holiday-text">
                        <span class="date-main">01 May, Sat</span>
                    </div>
                </div>
                <div class="details-col">
                    <div>
                        <div class="item-kind holiday-kind"><i class="bi bi-calendar-heart"></i> Public holiday</div>
                        <div class="holiday-name">May Day</div>
                    </div>
                </div>
                <div class="status-col">
                    <div class="holiday-acts">
                        <button type="button" class="holiday-act-btn hol-edit" data-hol-edit="May Day" data-hol-date="01 May, Sat" title="Edit holiday" aria-label="Edit holiday"><i class="bi bi-pencil-fill"></i></button>
                        <button type="button" class="holiday-act-btn hol-del" data-hol-del="May Day" title="Delete holiday" aria-label="Delete holiday"><i class="bi bi-trash3-fill"></i></button>
                    </div>
                </div>
            </div>

            <div class="leave-holiday-item">
                <div class="date-col holiday-date">
                    <div class="holiday-icon">
                        <i class="bi bi-calendar-heart-fill"></i>
                    </div>
                    <div class="holiday-text">
                        <span class="date-main">25 Dec, Sat</span>
                    </div>
                </div>
                <div class="details-col">
                    <div>
                        <div class="item-kind holiday-kind"><i class="bi bi-calendar-heart"></i> Public holiday</div>
                        <div class="holiday-name">Christmas</div>
                    </div>
                </div>
                <div class="status-col">
                    <div class="holiday-acts">
                        <button type="button" class="holiday-act-btn hol-edit" data-hol-edit="Christmas" data-hol-date="25 Dec, Sat" title="Edit holiday" aria-label="Edit holiday"><i class="bi bi-pencil-fill"></i></button>
                        <button type="button" class="holiday-act-btn hol-del" data-hol-del="Christmas" title="Delete holiday" aria-label="Delete holiday"><i class="bi bi-trash3-fill"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Partial leave decision modal (read-only) -->
<div class="modal fade" id="leavePartialModal" tabindex="-1" aria-labelledby="leavePartialTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="leave-reject-head">
                <h3 id="leavePartialTitle"><i class="bi bi-check2-circle text-primary-color"></i> Partial Leave — Decision</h3>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="leave-apply-body">
                <div class="partial-info-grid">
                    <div class="partial-info-item">
                        <span class="k">Employee</span>
                        <span class="v" id="partialEmpName">-</span>
                    </div>
                    <div class="partial-info-item">
                        <span class="k">Leave Type</span>
                        <span class="v" id="partialLeaveType">-</span>
                    </div>
                    <div class="partial-info-item">
                        <span class="k">Applied Dates</span>
                        <span class="v" id="partialDates">-</span>
                    </div>
                    <div class="partial-info-item">
                        <span class="k">Applied Days</span>
                        <span class="v" id="partialAppliedDays">-</span>
                    </div>
                </div>

                <div class="partial-decision-row">
                    <div class="partial-decision approved">
                        <div class="pd-head"><i class="bi bi-check-circle-fill"></i> Approved</div>
                        <div class="pd-days" id="partialApprovedDays">-</div>
                        <div class="pd-sub" id="partialApprovedSub">-</div>
                    </div>
                    <div class="partial-decision rejected">
                        <div class="pd-head"><i class="bi bi-x-circle-fill"></i> Rejected</div>
                        <div class="pd-days" id="partialRejectedDays">-</div>
                        <div class="pd-sub" id="partialRejectedSub">-</div>
                    </div>
                </div>

                <div class="partial-reason-box" id="partialReasonBox">
                    <div class="prb-label"><i class="bi bi-chat-left-text"></i> Rejection reason</div>
                    <div class="prb-text" id="partialRejectReason">-</div>
                </div>
            </div>
            <div class="leave-reject-foot">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    #leavePartialModal .partial-info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-bottom: 16px;
    }

    #leavePartialModal .partial-info-item {
        border: 1px solid #eef0f3;
        border-radius: 10px;
        padding: 10px 13px;
        background: #fbfcfb;
        display: flex;
        flex-direction: column;
        gap: 3px;
    }

    #leavePartialModal .partial-info-item .k {
        font-size: 10.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .4px;
        color: var(--ink-500);
    }

    #leavePartialModal .partial-info-item .v {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-900);
        word-break: break-word;
    }

    #leavePartialModal .partial-decision-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-bottom: 14px;
    }

    #leavePartialModal .partial-decision {
        border-radius: 12px;
        padding: 14px 16px;
        border: 1px solid #eef0f3;
        background: #fbfcfb;
        display: flex;
        flex-direction: column;
        gap: 3px;
    }

    #leavePartialModal .partial-decision.approved {
        background: var(--primary-soft, #eafaf1);
        border-color: #cdebd8;
    }

    #leavePartialModal .partial-decision.rejected {
        background: var(--accent-red-soft, #fef2f2);
        border-color: #fecaca;
    }

    #leavePartialModal .partial-decision .pd-head {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    #leavePartialModal .partial-decision.approved .pd-head {
        color: var(--primary-dark, #0f7a38);
    }

    #leavePartialModal .partial-decision.rejected .pd-head {
        color: #c0362c;
    }

    #leavePartialModal .partial-decision .pd-days {
        font-size: 22px;
        font-weight: 800;
        color: var(--ink-900);
        line-height: 1.2;
    }

    #leavePartialModal .partial-decision .pd-sub {
        font-size: 11px;
        font-weight: 600;
        color: var(--ink-500);
    }

    #leavePartialModal .partial-reason-box {
        border: 1px dashed #dbe4de;
        border-radius: 10px;
        background: #fbfcfb;
        padding: 11px 14px;
    }

    #leavePartialModal .partial-reason-box .prb-label {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 800;
        color: var(--ink-700);
        margin-bottom: 5px;
    }

    #leavePartialModal .partial-reason-box .prb-label i {
        color: var(--ink-500);
    }

    #leavePartialModal .partial-reason-box .prb-text {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-900);
        line-height: 1.6;
    }
</style>

<div class="modal fade" id="leaveRejectReasonModal" tabindex="-1" aria-labelledby="leaveRejectReasonTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="leave-reject-head">
                <h3 id="leaveRejectReasonTitle"><i class="bi bi-x-circle text-accent-red"></i>
                    Rejection Reason</h3>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="leave-apply-body">
                <p class="small text-muted text-nowrap mb-2">Rejection reason for <strong
                        id="leaveRejectReasonEmployee">-</strong></p>
                <div class="form-control leave-reason-display" id="leaveRejectReasonText"></div>
            </div>
            <div class="leave-reject-foot"><button type="button" class="btn btn-primary"
                    data-bs-dismiss="modal">OK</button></div>
        </div>
    </div>
</div>

<div class="modal fade" id="leaveApplyModal" tabindex="-1" aria-labelledby="leaveApplyTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="leave-reject-head">
                <h3 id="leaveApplyTitle">Leave</h3>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="leave-apply-body ">
                <div class="leave-apply-grid">
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

                        <div class="leave-apply-row">
                            <label>Leave type</label>
                            <select class="form-select select2" id="leaveApplyType">
                                <option value="">Select Leave Type</option>
                                <option value="Annual leave">Annual leave</option>
                                <option value="Bereavement Leave">Bereavement Leave</option>
                                <option value="Casual Leave">Casual Leave</option>
                                <option value="Compensatory off">Compensatory off</option>
                                <option value="PTO">PTO</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="Earned Leave">Earned Leave</option>
                            </select>
                        </div>

                        <div class="leave-apply-row">
                            <label>Reporting Manager</label>
                            <select class="form-select select2" id="leaveReportingManager">
                                <option value="">Select Reporting Manager</option>
                                <!-- Employee options are generated from window.leavePageEmployees -->
                            </select>
                        </div>

                        <div class="leave-apply-row">
                            <label>Date</label>
                            <div class="leave-apply-date-row flex-sm-row flex-column">
                                <div class="date-picker"><input type="text" class="date-input form-control"
                                        id="leaveApplyFromDate" placeholder="Select date" autocomplete="off"></div>
                                <div class="date-picker"><input type="text" class="date-input form-control"
                                        id="leaveApplyToDate" placeholder="Select date" autocomplete="off"></div>
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
                            <textarea class="form-control" id="leaveApplyReason" rows="3"
                                placeholder="Enter reason for leave"></textarea>
                        </div>
                    </div>

                    <div class="leave-apply-side">
                        <div class="leave-balance-box">
                            <div class="leave-balance-box-head">
                                <span>As of <span id="balanceAsOfDate">05-Feb-2020</span></span>
                                <span>Day(s)</span>
                            </div>
                            <div class="leave-balance-line"><span>Available balance</span><strong
                                    id="availableBalance">5</strong></div>
                            <div class="leave-balance-line"><span>Currently booked</span><strong
                                    id="currentlyBooked">1</strong></div>
                            <div class="leave-balance-line total"><span>Balance after booked leave</span><strong
                                    id="balanceAfterBooking">4</strong></div>
                        </div>

                        <div class="leave-balance-box">
                            <div class="leave-balance-box-head"><span>As of 31-Dec-2020</span></div>
                            <div class="leave-balance-line total"><span>Estimated balance</span><strong
                                    id="estimatedBalance">4</strong></div>
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

<!-- Apply Permission Modal -->
<div class="modal fade" id="permissionApplyModal" tabindex="-1" aria-labelledby="permissionApplyTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="leave-reject-head">
                <h3 id="permissionApplyTitle">Apply Permission</h3>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="permission-apply-body">

                <!-- Step 1: Form -->
                <div id="permissionFormWrap">
                    <div class="leave-apply-row">
                        <label>Date</label>
                        <div class="date-picker"><input type="text" class="date-input form-control" id="permissionDate"
                                placeholder="Select date" autocomplete="off"></div>
                    </div>

                    <div class="leave-apply-row">
                        <label>Time <span class="permission-time-hint">(max 2 hours)</span></label>
                        <div class="permission-time-row">
                            <input type="time" class="form-control" id="permissionFromTime">
                            <input type="time" class="form-control" id="permissionToTime">
                        </div>
                    </div>

                    <div class="leave-apply-summary-row total-row">
                        <span>Total permission time</span>
                        <strong id="permissionTotalText">--</strong>
                    </div>

                    <div class="leave-apply-row">
                        <label>Approve by</label>
                        <select class="form-select select2" id="permissionApprover">
                            <option value="">Select approver</option>
                            <option value="Manager">Manager</option>
                            <option value="Team Lead">Team Lead</option>
                            <option value="HR">HR</option>
                        </select>
                    </div>

                    <div class="leave-apply-row mb-0">
                        <label>Reason</label>
                        <textarea class="form-control" id="permissionReason" rows="3"
                            placeholder="Enter reason for permission"></textarea>
                    </div>
                </div>

                <!-- Step 2: after submit -->
                <div class="permission-result" id="permissionResult">
                    <div class="permission-result-icon" id="permissionResultIcon"><i class="bi bi-hourglass-split"></i>
                    </div>
                    <div class="permission-result-title" id="permissionResultTitle">Request Submitted</div>
                    <div class="permission-result-sub" id="permissionResultSub">Your permission request has been sent
                        for approval.</div>
                </div>

            </div>
            <div class="leave-reject-foot" id="permissionFormFoot">
                <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="permissionApplySubmit">Submit Request</button>
            </div>
            <div class="leave-reject-foot d-none" id="permissionResultFoot">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Assign Leave Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="assignLeaveOffcanvas"
    aria-labelledby="assignLeaveOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="assignLeaveOffcanvasLabel">
            <span class="offcanvas-icon"><i class="bi bi-person-plus-fill"></i></span>
            Assign Leave
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="holiday-header-actions">
            <button type="button" class="btn btn-bulk" id="assignBulkToggle">
                <i class="bi bi-upload"></i> Bulk
            </button>
            <button type="button" class="btn btn-sample" id="assignSampleDownload">
                <i class="bi bi-download"></i> Sample Excel
            </button>
        </div>
        <!-- Single assign form -->
        <div class="single-holiday-section" id="assignSingleSection">
            <div class="assign-form-row">
                <label for="assignEmployeeSelect">Select Employee</label>
                <select id="assignEmployeeSelect" class="form-select w-100">
                    <option value=""></option>
                    <!-- Employee options are generated from window.leavePageEmployees -->
                </select>
            </div>

            <div class="assign-form-row">
                <label for="assignLeaveTypeSelect">Leave Type</label>
                <select class="form-select select2" id="assignLeaveTypeSelect">
                    <option value="">Select Leave Type</option>
                    <option>Annual leave</option>
                    <option>Bereavement leave</option>
                    <option>Casual Leave</option>
                    <option>Compensatory off</option>
                    <option>PTO</option>
                    <option>Sick Leave</option>
                    <option>Earned Leave</option>
                </select>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="date-picker">
                        <label class="form-label">DatePicker</label>
                        <input type="text" class="date-input form-control" placeholder="DD-MM-YYYY" maxlength="10"
                            autocomplete="off" />
                    </div>
                </div>

                <div class=" col-md-6">
                    <div class="date-picker right-0">
                        <label class="form-label">DatePicker</label>
                        <input type="text" class="date-input form-control" placeholder="DD-MM-YYYY" maxlength="10"
                            autocomplete="off" />
                    </div>
                </div>
            </div>

            <div class="assign-form-row mb-0">
                <label for="assignNote">Note (Optional)</label>
                <textarea class="form-control" id="assignNote" rows="2"
                    placeholder="Add a note for this assignment"></textarea>
            </div>

            <div class="assign-summary-box" id="assignSummaryBox">
                <div class="asb-head">
                    <span class="asb-title"><i class="bi bi-calculator"></i> Assignment Summary</span>
                    <span class="asb-year" id="asbYear">2026</span>
                </div>
                <div class="asb-employee" id="asbEmployee">
                    <span class="asb-emp-placeholder">Select an employee to preview the assignment</span>
                </div>
                <div class="asb-line"><span>Current balance</span><strong id="asbCurrent">0 Day(s)</strong></div>
                <div class="asb-line add"><span>Newly assigned</span><strong id="asbAdding">+ 1 Day(s)</strong></div>
                <div class="asb-line total"><span>New total balance</span><strong id="asbTotal">1 Day(s)</strong></div>
            </div>
        </div>

        <!-- Bulk upload section -->
        <div class="bulk-upload-section" id="assignBulkSection">
            <div class="bulk-dropzone" id="assignDropzone">
                <div class="dz-icon">
                    <i class="bi bi-cloud-arrow-up"></i>
                </div>
                <div class="dz-title">Drop your Excel file here</div>
                <div class="dz-subtitle">or <span id="assignBrowseBtn">browse</span> to upload</div>
                <div class="dz-formats">Supports .xlsx, .xls, .csv (Max 5MB)</div>
            </div>
            <input type="file" id="assignFileInput" accept=".xlsx,.xls,.csv" class="d-none">
            <div class="bulk-file-preview" id="assignFilePreview">
                <div class="fp-icon"><i class="bi bi-file-earmark-excel"></i></div>
                <div class="fp-info">
                    <div class="fp-name" id="assignFileName"></div>
                    <div class="fp-size" id="assignFileSize"></div>
                </div>
                <button type="button" class="fp-remove" id="assignFileRemove"><i class="bi bi-x-lg"></i></button>
            </div>
        </div>
    </div>
    <div class="holiday-form-foot">
        <button type="button" class="btn btn-reject" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="button" class="btn btn-primary" id="assignLeaveSubmit"><i class="bi bi-check2"></i> Assign
            Leave</button>
    </div>
</div>

<!-- Holiday Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="holidayOffcanvas" aria-labelledby="holidayOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="holidayOffcanvasLabel">
            <span class="offcanvas-icon"><i class="bi bi-calendar-heart-fill"></i></span>
            Add Holiday
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="holiday-header-actions">
            <button type="button" class="btn btn-bulk" id="btnBulkToggle">
                <i class="bi bi-upload"></i> Bulk
            </button>
            <button type="button" class="btn btn-sample" id="btnSampleDownload">
                <i class="bi bi-download"></i> Sample Excel
            </button>
        </div>
        <!-- Single holiday form -->
        <div class="single-holiday-section" id="singleHolidaySection">
            <form id="holidayForm">
                <div class="holiday-form-row">
                    <label for="holidayName">Holiday Name</label>
                    <input type="text" class="form-control" id="holidayName" name="holiday_name"
                        placeholder="Enter holiday name" autocomplete="off">
                </div>

                <div class="holiday-form-row">
                    <label for="holidayDate">Date</label>
                    <div class="date-picker">
                        <input type="text" class="date-input form-control" id="holidayDate" name="holiday_date"
                            placeholder="Select date" autocomplete="off">
                    </div>
                </div>

                <div class="holiday-form-row">
                    <label for="holidayType">Holiday Type</label>
                    <select class="form-select select2" id="holidayType" name="holiday_type">
                        <option value="">Select Holiday Type</option>
                        <option value="Public Holiday">Public Holiday</option>
                        <option value="Optional Holiday">Optional Holiday</option>
                        <option value="Restricted Holiday">Restricted Holiday</option>
                        <option value="Company Holiday">Company Holiday</option>
                    </select>
                </div>

                <div class="holiday-form-row mb-0">
                    <label for="holidayYear">Holiday Year</label>
                    <select class="form-select select2" id="holidayYear" name="holiday_year">
                        <option value="">Select Holiday Year</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026" selected>2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Bulk upload section -->
        <div class="bulk-upload-section" id="bulkUploadSection">
            <div class="bulk-dropzone" id="bulkDropzone">
                <div class="dz-icon">
                    <i class="bi bi-cloud-arrow-up"></i>
                </div>
                <div class="dz-title">Drop your Excel file here</div>
                <div class="dz-subtitle">or <span id="dzBrowseBtn">browse</span> to upload</div>
                <div class="dz-formats">Supports .xlsx, .xls, .csv (Max 5MB)</div>
            </div>
            <input type="file" id="bulkFileInput" accept=".xlsx,.xls,.csv" class="d-none">
            <div class="bulk-file-preview" id="bulkFilePreview">
                <div class="fp-icon"><i class="bi bi-file-earmark-excel"></i></div>
                <div class="fp-info">
                    <div class="fp-name" id="bulkFileName"></div>
                    <div class="fp-size" id="bulkFileSize"></div>
                </div>
                <button type="button" class="fp-remove" id="bulkFileRemove"><i class="bi bi-x-lg"></i></button>
            </div>
        </div>
    </div>
    <div class="holiday-form-foot">
        <button type="button" class="btn btn-reject" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="button" class="btn btn-primary" id="holidaySubmit">Submit</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollContainer = document.getElementById('balanceScroll');
        // const scrollLeftBtn = document.getElementById('balanceScrollLeft');
        // const scrollRightBtn = document.getElementById('balanceScrollRight');
        const scrollAmount = 220;

        // scrollLeftBtn.addEventListener('click', function() {
        //     scrollContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        // });

        // scrollRightBtn.addEventListener('click', function() {
        //     scrollContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        // });

        const tabBtns = document.querySelectorAll('.tab-switch .tab-btn');
        tabBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                tabBtns.forEach(function(b) { b.classList.remove('active'); });
                btn.classList.add('active');
            });
        });

        const holidayItems = [
            { date: '02 Apr, Fri', name: 'Good Friday' },
            { date: '01 May, Sat', name: 'May Day' },
            { date: '25 Dec, Sat', name: 'Christmas' }
        ];

        const leaveItems = [
            {
                from: '01 Feb, Mon',
                to: '02 Feb, Tue',
                type: 'Casual Leave',
                typeClass: 'type-casual',
                days: '2',
                status: 'Pending',
                statusClass: 'status-pending',
                statusIcon: 'bi-hourglass-split'
            },
            {
                from: '10 Aug, Wed',
                to: '12 Aug, Fri',
                type: 'Annual Leave',
                typeClass: 'type-annual',
                days: '3',
                status: 'Partial',
                approvedDays: '2',
                employee: 'Daniel Martinez',
                statusIcon: 'bi-check2-circle'
            },
            {
                from: '05 Sep, Mon',
                to: '06 Sep, Tue',
                type: 'Sick Leave',
                typeClass: 'type-sick',
                days: '2',
                status: 'Rejected',
                rejectionReason: 'Insufficient leave balance for remaining days',
                employee: 'Sophia Johnson',
                statusIcon: 'bi-x-circle-fill'
            }
        ];

        const historyLeaveItems = [
            {
                from: '15 Dec, Tue',
                to: '17 Dec, Thu',
                type: 'Annual Leave',
                typeClass: 'type-annual',
                days: '3',
                status: 'Approved',
                statusClass: 'status-approved',
                statusIcon: 'bi-check-circle-fill'
            },
            {
                from: '10 Nov, Wed',
                to: '11 Nov, Thu',
                type: 'Sick Leave',
                typeClass: 'type-sick',
                days: '2',
                status: 'Approved',
                statusClass: 'status-approved',
                statusIcon: 'bi-check-circle-fill'
            }
        ];

        let assignmentItems = [];

        function typeClassFor(t) {
            const s = (t || '').toLowerCase();
            if (s.indexOf('sick') > -1) return 'type-sick';
            if (s.indexOf('annual') > -1) return 'type-annual';
            if (s === 'pto') return 'type-pto';
            return 'type-casual';
        }

        function buildAssignmentRow(a) {
            return `
                <div class="leave-holiday-item leave-item">
                    <div class="date-col text-nowrap">
                        <span class="date-main">${a.year}</span>
                        <span class="date-to">Leave cycle</span>
                    </div>
                    <div class="details-col">
                        <div class="leave-type-indicator ${a.typeClass}"></div>
                        <div class="leave-info">
                            <div class="item-kind leave-kind"><i class="bi bi-person-plus"></i> Leave assignment</div>
                            <div class="leave-name">${a.type}</div>
                            <div class="leave-days">${a.days} Day(s) &middot; ${a.employee}</div>
                        </div>
                    </div>
                    <div class="status-col">
                        <span class="leave-status-pill status-approved">
                            <i class="bi bi-person-check-fill"></i>
                            Assigned
                        </span>
                    </div>
                </div>
            `;
        }

        let selectedCategory = 'all';
        function applyCategoryFilter(category) {
            selectedCategory = category;
            const activeTab = document.querySelector('.tab-switch .tab-btn.active');
            renderList(activeTab && activeTab.getAttribute('data-tab') === 'history', selectedCategory);
        }
        const categoryFilter = document.getElementById('leaveCategoryFilter');
        categoryFilter.addEventListener('change', function(event) {
            applyCategoryFilter(event.target.value);
        });
        if (window.jQuery) {
            jQuery(categoryFilter).on('select2:select', function(event) {
                applyCategoryFilter(event.params.data.id);
            });
        }

        function renderList(isHistory, category) {
            const listEl = document.getElementById('leaveHolidaysList');
            let html = '';

            if (!isHistory && category !== 'holidays') {
                assignmentItems.forEach(function(a) { html += buildAssignmentRow(a); });
            }

            const items = (category === 'holidays' && !isHistory) ? [] : (isHistory ? historyLeaveItems : leaveItems);

            items.forEach(function(item) {
                let statusHtml = '';
                if (item.status === 'Partial') {
                    statusHtml = '<span class="leave-status-pill status-approved"><i class="bi bi-check2-circle"></i> Partial (' + item.approvedDays + '/' + item.days + 'd)</span>';
                } else if (item.status === 'Rejected') {
                    statusHtml = '<span class="leave-status-pill status-rejected"><i class="bi bi-x-circle-fill"></i> Rejected';
                    if (item.rejectionReason) {
                        statusHtml += ' <i class="bi bi-eye" title="Rejection reason" data-employee="' + (item.employee || '') + '" data-reason="' + (item.rejectionReason || '') + '"></i></span>';
                    } else {
                        statusHtml += '</span>';
                    }
                } else {
                    statusHtml = '<span class="leave-status-pill ' + item.statusClass + '"><i class="bi ' + item.statusIcon + '"></i>' + item.status + '</span>';
                    if (item.status === 'Pending') {
                        statusHtml = '<div class="leave-status-wrap"><button type="button" class="leave-cancel-btn" data-cancel-leave title="Cancel this leave request"><i class="bi bi-x-circle"></i> Cancel</button>' + statusHtml + '</div>';
                    }
                }

                html += `
                    <div class="leave-holiday-item leave-item cursor-pointer">
                        <div class="date-col text-nowrap">
                            <span class="date-main">${item.from}</span>
                            <span class="date-to">to</span>
                            <span class="date-sub">${item.to}</span>
                        </div>
                        <div class="details-col">
                            <div class="leave-type-indicator ${item.typeClass}"></div>
                            <div class="leave-info">
                                <div class="item-kind leave-kind"><i class="bi bi-person-walking"></i> Leave request</div>
                                <div class="leave-name">${item.type}</div>
                                <div class="leave-days">${item.days} Day(s)</div>
                            </div>
                        </div>
                        <div class="status-col">
                            ${statusHtml}
                        </div>
                    </div>
                `;
            });

            if (!isHistory && category !== 'leaves') {
                holidayItems.forEach(function(h) {
                    html += `
                        <div class="leave-holiday-item">
                            <div class="date-col holiday-date">
                                <div class="holiday-icon">
                                    <i class="bi bi-calendar-heart"></i>
                                </div>
                                <div class="holiday-text">
                                    <span class="date-main">${h.date}</span>
                                </div>
                            </div>
                            <div class="details-col">
                                <div><div class="item-kind holiday-kind"><i class="bi bi-calendar-heart"></i> Public holiday</div><div class="holiday-name">${h.name}</div></div>
                            </div>
                            <div class="status-col">
                                <div class="holiday-acts">
                                    <button type="button" class="holiday-act-btn hol-edit" data-hol-edit="${h.name}" data-hol-date="${h.date}" title="Edit holiday" aria-label="Edit holiday"><i class="bi bi-pencil-fill"></i></button>
                                    <button type="button" class="holiday-act-btn hol-del" data-hol-del="${h.name}" title="Delete holiday" aria-label="Delete holiday"><i class="bi bi-trash3-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    `;
                });
            }

            listEl.innerHTML = html;
        }

        // Rejection reason eye icon click -> open reason modal
        document.getElementById('leaveHolidaysList').addEventListener('click', function(e) {
            var eye = e.target.closest('[data-reason]');
            if (!eye) return;
            var reasonModal = document.getElementById('leaveRejectReasonModal');
            var reasonText = document.getElementById('leaveRejectReasonText');
            var empText = document.getElementById('leaveRejectReasonEmployee');
            empText.textContent = eye.dataset.employee || '-';
            reasonText.textContent = eye.dataset.reason || 'No rejection reason provided';
            var bsModal = bootstrap.Modal.getInstance(reasonModal) || new bootstrap.Modal(reasonModal);
            bsModal.show();
        });

        /* ===== Partial leave row click -> decision modal (read-only) ===== */
        document.getElementById('leaveHolidaysList').addEventListener('click', function(e) {
            /* ignore clicks on buttons / pills (cancel, reason eye etc.) */
            if (e.target.closest('button') || e.target.closest('.leave-status-pill')) return;

            var row = e.target.closest('.leave-holiday-item.leave-item');
            if (!row) return;

            var pill = row.querySelector('.leave-status-pill');
            if (!pill || !/Partial/i.test(pill.textContent)) return;

            /* read row info */
            var from = (row.querySelector('.date-main') || {}).textContent || '-',
                to = (row.querySelector('.date-sub') || {}).textContent || '-',
                type = (row.querySelector('.leave-name') || {}).textContent || '-',
                days = (row.querySelector('.leave-days') || {}).textContent || '-',
                pillText = pill.textContent.replace(/\s+/g, ' ').trim();

            /* parse approved days from "Partial (2/3d)" */
            var m = pillText.match(/\((\d+)\/(\d+)d\)/),
                approved = m ? parseInt(m[1], 10) : 0,
                applied = m ? parseInt(m[2], 10) : (parseInt(days, 10) || 0),
                rejected = Math.max(0, applied - approved);

            /* fill modal */
            document.getElementById('partialEmpName').textContent = 'Daniel Martinez';
            document.getElementById('partialLeaveType').textContent = type.trim();
            document.getElementById('partialDates').textContent = from.trim() + ' to ' + to.trim();
            document.getElementById('partialAppliedDays').textContent = applied + ' Day(s)';
            document.getElementById('partialApprovedDays').textContent = approved + ' Day(s)';
            document.getElementById('partialRejectedDays').textContent = rejected + ' Day(s)';

            /* compute exact dates from row labels (trust row's day names, increment sequence) */
            var MN = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var WD = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            function parseRowDate(s) {
                var mm = s.trim().match(/(\d{1,2})\s+([A-Za-z]{3}),?\s*([A-Za-z]{3})?/);
                return mm ? { d: parseInt(mm[1], 10), m: MN.indexOf(mm[2]), w: mm[3] || null } : null;
            }
            var startRow = parseRowDate(from),
                endRow = parseRowDate(to),
                appliedDates = [];
            if (startRow && endRow) {
                /* build date list from `from` to `to` inclusive */
                var cur = { d: startRow.d, m: startRow.m, w: startRow.w },
                    guard = 0;
                while (guard++ < 60) {
                    appliedDates.push(cur.d + ' ' + MN[cur.m] + ', ' + (cur.w || ''));
                    if (cur.d === endRow.d && cur.m === endRow.m) break;
                    cur = { d: cur.d + 1, m: cur.m, w: cur.w };
                    var dim = new Date(new Date().getFullYear(), cur.m + 1, 0).getDate();
                    if (cur.d > dim) { cur.d = 1; cur.m = (cur.m + 1) % 12; }
                    if (cur.w) cur.w = WD[(WD.indexOf(cur.w) + 1) % 7];
                }
            }
            var approvedList = appliedDates.slice(0, approved),
                rejectedList = appliedDates.slice(approved);
            document.getElementById('partialApprovedSub').textContent = approvedList.join(', ') || '-';
            document.getElementById('partialRejectedSub').textContent = rejectedList.join(', ') || '-';

            var reason = row.getAttribute('data-reason') || '';
            var reasonBox = document.getElementById('partialReasonBox');
            var reasonText = document.getElementById('partialRejectReason');
            if (rejected > 0) {
                reasonBox.style.display = '';
                reasonText.textContent = reason || 'Approved days only — remaining day rejected due to insufficient team coverage on that date. Please re-apply with a different date if required.';
            } else {
                reasonBox.style.display = 'none';
            }

            var modal = document.getElementById('leavePartialModal');
            var bsModal = bootstrap.Modal.getInstance(modal) || new bootstrap.Modal(modal);
            bsModal.show();
        });

        function renderSelectedItem(item, isHoliday) {
            const listEl = document.getElementById('leaveHolidaysList');
            if (isHoliday) {
                listEl.innerHTML = `
                    <div class="leave-holiday-item selected-overview-item">
                        <div class="date-col holiday-date"><div class="holiday-icon"><i class="bi bi-calendar-heart"></i></div><div class="holiday-text"><span class="date-main">${item.date}</span></div></div>
                        <div class="details-col"><div><div class="item-kind holiday-kind"><i class="bi bi-calendar-heart"></i> Public holiday</div><div class="holiday-name">${item.name}</div></div></div>
                        <div class="status-col"><span class="leave-status-pill status-approved"><i class="bi bi-check-circle-fill"></i> Scheduled</span></div>
                    </div>`;
                return;
            }
            listEl.innerHTML = `
                <div class="leave-holiday-item leave-item selected-overview-item">
                    <div class="date-col text-nowrap"><span class="date-main">${item.from}</span><span class="date-to">to</span><span class="date-sub">${item.to}</span></div>
                    <div class="details-col"><div class="leave-type-indicator ${item.typeClass}"></div><div class="leave-info"><div class="item-kind leave-kind"><i class="bi bi-person-walking"></i> Leave request</div><div class="leave-name">${item.type}</div><div class="leave-days">${item.days} Day(s)</div></div></div>
                    <div class="status-col"><span class="leave-status-pill ${item.statusClass}"><i class="bi ${item.statusIcon}"></i> ${item.status}</span></div>
                </div>`;
        }

        document.querySelectorAll('.tab-switch .tab-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const tab = btn.getAttribute('data-tab');
                    renderList(tab === 'history', selectedCategory);
            });
        });

        /* Initial load: render upcoming tab content by default */
        renderList(false, selectedCategory);

        // Leave balance card click -> open Apply Leave modal with matching leave type preselected
        document.querySelectorAll('.leave-balance-card').forEach(function(card) {
            card.addEventListener('click', function() {
                const leaveType = card.getAttribute('data-leave-type');
                const leaveTypeSelect = document.getElementById('leaveApplyType');

                if (leaveTypeSelect && leaveType) {
                    let matched = false;
                    for (let i = 0; i < leaveTypeSelect.options.length; i++) {
                        if (leaveTypeSelect.options[i].value.toLowerCase() === leaveType.toLowerCase()) {
                            leaveTypeSelect.value = leaveTypeSelect.options[i].value;
                            matched = true;
                            break;
                        }
                    }
                    if (!matched) {
                        leaveTypeSelect.value = '';
                    }
                }

                const modalEl = document.getElementById('leaveApplyModal');
                const modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
                modalInstance.show();
            });
        });

        /* ===== Assign Leave ===== */
        var assignEmployee = document.getElementById('assignEmployeeSelect');
        var assignType = document.getElementById('assignLeaveTypeSelect');
        var assignDaysInput = document.getElementById('assignDaysInput');
        var assignYear = document.getElementById('assignLeaveYear');
        var asbEmployee = document.getElementById('asbEmployee');
        var asbYear = document.getElementById('asbYear');
        var asbCurrent = document.getElementById('asbCurrent');
        var asbAdding = document.getElementById('asbAdding');
        var asbTotal = document.getElementById('asbTotal');

        function getAssignDays() {
            var d = parseInt(assignDaysInput.value, 10);
            return isNaN(d) || d < 1 ? 0 : d;
        }

        function lookupBalance(type) {
            var val = 0;
            document.querySelectorAll('.leave-balance-card').forEach(function(card) {
                if ((card.getAttribute('data-leave-type') || '').toLowerCase() === (type || '').toLowerCase()) {
                    val = parseInt(card.getAttribute('data-available'), 10) || 0;
                }
            });
            return val;
        }

        function updateAssignSummary() {
            var days = getAssignDays();
            var empIdx = assignEmployee.selectedIndex;
            var type = assignType.value;
            var current = lookupBalance(type);

            if (assignYear.value) asbYear.textContent = assignYear.value;

            if (empIdx > 0) {
                var opt = assignEmployee.options[empIdx];
                var img = opt.getAttribute('data-image') || './assets/img/profile-1.jpg';
                var empParts = (opt.text || '').trim().split(' — ');
                asbEmployee.innerHTML = '<img src="' + img + '" class="asb-emp-avatar" alt="">' +
                    '<div class="asb-emp-copy"><strong>' + (empParts[0] || opt.text) + '</strong><span>' + (empParts[1] || opt.value) + '</span></div>';
            } else {
                asbEmployee.innerHTML = '<span class="asb-emp-placeholder">Select an employee to preview the assignment</span>';
            }

            asbCurrent.textContent = current + ' Day(s)';
            asbAdding.textContent = '+ ' + days + ' Day(s)';
            asbTotal.textContent = (current + days) + ' Day(s)';
        }

        [assignEmployee, assignType, assignYear].forEach(function(el) {
            el && el.addEventListener('change', updateAssignSummary);
        });
        if (window.jQuery) {
            jQuery(assignType).on('select2:select', updateAssignSummary);
            jQuery(assignYear).on('select2:select', updateAssignSummary);
            jQuery(assignEmployee).on('select2:select', updateAssignSummary);
        }

        document.getElementById('assignDayMinus').addEventListener('click', function() {
            assignDaysInput.value = Math.max(getAssignDays() - 1, 1);
            updateAssignSummary();
        });

        document.getElementById('assignDayPlus').addEventListener('click', function() {
            assignDaysInput.value = getAssignDays() + 1;
            updateAssignSummary();
        });

        assignDaysInput.addEventListener('input', function() {
            assignDaysInput.value = assignDaysInput.value.replace(/[^0-9]/g, '');
            updateAssignSummary();
        });

        document.querySelectorAll('.assign-chip').forEach(function(chip) {
            chip.addEventListener('click', function() {
                assignDaysInput.value = getAssignDays() + parseInt(chip.getAttribute('data-add'), 10);
                updateAssignSummary();
            });
        });

        function refreshTabCounts() {
            var upcomingCount = document.querySelector('.tab-btn[data-tab="upcoming"] .tab-count');
            var historyCount = document.querySelector('.tab-btn[data-tab="history"] .tab-count');
            if (upcomingCount) upcomingCount.textContent = assignmentItems.length + leaveItems.length + holidayItems.length;
            if (historyCount) historyCount.textContent = historyLeaveItems.length;
        }

        document.getElementById('assignLeaveSubmit').addEventListener('click', function() {
            /* Bulk mode has its own upload handler */
            if (document.getElementById('assignBulkSection') && document.getElementById('assignBulkSection').classList.contains('show')) return;
            var days = getAssignDays();
            if (assignEmployee.selectedIndex < 1) { alert('Please select an employee.'); return; }
            if (!assignType.value) { alert('Please select a leave type.'); return; }
            if (days < 1) { alert('Days to assign must be at least 1.'); return; }

            var empOpt = assignEmployee.options[assignEmployee.selectedIndex];
            var empNameParts = (empOpt.text || '').trim().split(' — ');

            assignmentItems.unshift({
                employee: empNameParts[0] || empOpt.text,
                type: assignType.value,
                typeClass: typeClassFor(assignType.value),
                days: days,
                year: assignYear.value || '2026'
            });

            /* Bump the matching balance card */
            document.querySelectorAll('.leave-balance-card').forEach(function(card) {
                if ((card.getAttribute('data-leave-type') || '').toLowerCase() === assignType.value.toLowerCase()) {
                    var avail = (parseInt(card.getAttribute('data-available'), 10) || 0) + days;
                    card.setAttribute('data-available', avail);
                    var valEl = card.querySelector('.balance-row .value');
                    if (valEl) valEl.textContent = ': ' + avail;
                }
            });

            /* Switch to Upcoming tab so the new assignment is visible */
            var upcomingTab = document.querySelector('.tab-btn[data-tab="upcoming"]');
            if (upcomingTab && !upcomingTab.classList.contains('active')) upcomingTab.click();

            refreshTabCounts();
            var activeTab = document.querySelector('.tab-switch .tab-btn.active');
            renderList(activeTab && activeTab.getAttribute('data-tab') === 'history', selectedCategory);

            var ocEl = document.getElementById('assignLeaveOffcanvas');
            var inst = bootstrap.Offcanvas.getInstance(ocEl);
            if (inst) inst.hide();
        });

        document.getElementById('assignLeaveOffcanvas').addEventListener('hidden.bs.offcanvas', function() {
            assignDaysInput.value = '1';
            document.getElementById('assignNote').value = '';
            if (window.jQuery) {
                jQuery(assignEmployee).val(null).trigger('change');
                jQuery(assignType).val(null).trigger('change');
                jQuery(assignYear).val('2026').trigger('change');
            } else {
                assignEmployee.value = '';
                assignType.value = '';
                assignYear.value = '2026';
            }
            updateAssignSummary();
        });

        refreshTabCounts();
    });
</script>


<script>
    /* Employee options for the Reporting Manager / Assign Employee selects.
       Single source is window.leavePageEmployees (defined at the top of the
       page). This runs inside <body> but before the Select2 inits further
       down, so those inits see every option. */
    (function () {
        var employees = window.leavePageEmployees || [];

        function fillEmployeeOptions(selectEl, withDept) {
            if (!selectEl) return;
            employees.forEach(function (emp) {
                var opt = document.createElement('option');
                opt.value = emp[1];
                opt.setAttribute('data-image', './assets/img/profile-1.jpg');
                if (withDept) opt.setAttribute('data-dept', emp[2]);
                opt.textContent = withDept ? (emp[0] + ' \u2014 ' + emp[1]) : emp[0];
                selectEl.appendChild(opt);
            });
        }

        fillEmployeeOptions(document.getElementById('leaveReportingManager'), false);
        fillEmployeeOptions(document.getElementById('assignEmployeeSelect'), true);
    })();
</script>


<?php
include 'footer.php';
?>


 
<script src="./assets/js/select2.js"></script>


<script>
    $('#employeeSelect').select2({
        width: '100%',
        placeholder: 'Select Employee',
        allowClear: true,
        dropdownParent: $('#leaveApplyModal'),

        templateResult: function (data) {

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

        templateSelection: function (data) {

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

    $('#leaveReportingManager').select2({
        width: '100%',
        placeholder: 'Select Reporting Manager',
        allowClear: true,
        dropdownParent: $('#leaveApplyModal'),

        templateResult: function (data) {

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

        templateSelection: function (data) {

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

    $('#permissionApprover').select2({
        width: '100%',
        placeholder: 'Select approver',
        allowClear: true,
        dropdownParent: $('#permissionApplyModal')
    });

    (function () {
        var modal = document.getElementById('permissionApplyModal'),
            formWrap = document.getElementById('permissionFormWrap'),
            resultWrap = document.getElementById('permissionResult'),
            resultSub = document.getElementById('permissionResultSub'),
            formFoot = document.getElementById('permissionFormFoot'),
            resultFoot = document.getElementById('permissionResultFoot'),
            submitBtn = document.getElementById('permissionApplySubmit'),
            dateInput = document.getElementById('permissionDate'),
            fromTimeInput = document.getElementById('permissionFromTime'),
            toTimeInput = document.getElementById('permissionToTime'),
            reasonInput = document.getElementById('permissionReason'),
            totalText = document.getElementById('permissionTotalText');

        var MAX_MINUTES = 120; // 2 hours

        function parseTimeToMinutes(str) {
            if (!str) return null;
            var m = str.trim().match(/^(\d{1,2}):(\d{2})$/);
            if (!m) return null;
            var h = parseInt(m[1], 10),
                min = parseInt(m[2], 10);
            if (h > 23 || min > 59) return null;
            return h * 60 + min;
        }

        function formatDuration(mins) {
            var h = Math.floor(mins / 60),
                m = mins % 60,
                parts = [];
            if (h) parts.push(h + 'h');
            if (m || !h) parts.push(m + 'm');
            return parts.join(' ');
        }

        // Returns the current duration in minutes, or null if inputs are
        // missing/invalid/out of order. Also updates the "Total" display.
        function recalcTotal() {
            var from = parseTimeToMinutes(fromTimeInput.value),
                to = parseTimeToMinutes(toTimeInput.value);

            totalText.classList.remove('is-ok', 'is-over');

            if (from === null || to === null) {
                totalText.textContent = '--';
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

        [fromTimeInput, toTimeInput].forEach(function (el) {
            el.addEventListener('input', recalcTotal);
            el.addEventListener('change', recalcTotal);
        });

        submitBtn.addEventListener('click', function () {
            var approver = jQuery('#permissionApprover').val();
            var totalMinutes = recalcTotal();

            if (!dateInput.value || !fromTimeInput.value || !toTimeInput.value || !approver || !reasonInput.value.trim()) {
                alert('Please fill date, time, approver and reason before submitting.');
                return;
            }
            if (totalMinutes === null) {
                alert('Please select a valid time range (To time should be after From time).');
                return;
            }
            if (totalMinutes > MAX_MINUTES) {
                alert('Permission time cannot be more than 2 hours. Please adjust the From/To time.');
                return;
            }

            formWrap.style.display = 'none';
            formFoot.classList.add('d-none');
            resultWrap.classList.add('show');
            resultFoot.classList.remove('d-none');
            resultSub.textContent = 'Sent to ' + approver + ' for approval (' + formatDuration(totalMinutes) + ').';
        });

        modal.addEventListener('hidden.bs.modal', function () {
            formWrap.style.display = '';
            formFoot.classList.remove('d-none');
            resultWrap.classList.remove('show');
            resultFoot.classList.add('d-none');
            dateInput.value = '';
            fromTimeInput.value = '';
            toTimeInput.value = '';
            reasonInput.value = '';
            totalText.textContent = '--';
            totalText.classList.remove('is-ok', 'is-over');
            jQuery('#permissionApprover').val(null).trigger('change');
        });
    })();

    (function () {
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
            empSelect = document.getElementById('employeeSelect');

        var weekday = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        var employeeBalances = {
            '1': 14,
            '2': 7,
            '3': 10,
            '4': 8
        };

        var lastCardAvailable = null;

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
            if (lastCardAvailable !== null) {
                return lastCardAvailable;
            }
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
            } else {
                var label = weekday[fromDate.getDay()] + ' ' + fromInput.value;
                if (toDate && toInput.value && toInput.value !== fromInput.value) {
                    label += '  –  ' + weekday[toDate.getDay()] + ' ' + toInput.value;
                }
                summaryEl.textContent = label;

                var days = Math.round((toDate - fromDate) / 86400000) + 1;
                if (days < 1) days = 1;
                if (dayType !== 'Full Day') days = days > 1 ? days - 0.5 : 0.5;
                totalEl.textContent = days + ' Day(s)';
            }

            var daysVal = parseFloat(totalEl.textContent) || 0;
            var available = currentAvailable(),
                after = Math.max(available - daysVal, 0);

            availableEl.textContent = available;
            bookedEl.textContent = daysVal;
            afterEl.textContent = after;
            estimatedEl.textContent = after;
            asOfEl.textContent = fmt(new Date());
        }

        [fromInput, toInput, dayTypeSel, empSelect].forEach(function (el) {
            el && el.addEventListener('change', recalc);
        });

        document.querySelectorAll('.leave-balance-card').forEach(function (card) {
            card.addEventListener('click', function () {
                var avail = parseInt(card.getAttribute('data-available'), 10);
                lastCardAvailable = isNaN(avail) ? null : avail;
            });
        });

        applyModal.addEventListener('hidden.bs.modal', function () {
            lastCardAvailable = null;
        });

        applyModal.addEventListener('shown.bs.modal', recalc);

        document.getElementById('leaveApplySubmit') &&
            document.getElementById('leaveApplySubmit').addEventListener('click', function () {
                var instance = bootstrap.Modal.getInstance(applyModal);
                if (instance) instance.hide();
            });

        recalc();
    })();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var bulkToggle = document.getElementById('btnBulkToggle');
        var singleSection = document.getElementById('singleHolidaySection');
        var bulkSection = document.getElementById('bulkUploadSection');
        var dropzone = document.getElementById('bulkDropzone');
        var fileInput = document.getElementById('bulkFileInput');
        var browseBtn = document.getElementById('dzBrowseBtn');
        var filePreview = document.getElementById('bulkFilePreview');
        var fileName = document.getElementById('bulkFileName');
        var fileSize = document.getElementById('bulkFileSize');
        var fileRemove = document.getElementById('bulkFileRemove');
        var submitBtn = document.getElementById('holidaySubmit');

        /* ---- Bulk toggle ---- */
        bulkToggle.addEventListener('click', function () {
            var isBulk = bulkSection.classList.contains('show');
            if (isBulk) {
                bulkSection.classList.remove('show');
                singleSection.classList.remove('hidden');
                bulkToggle.classList.remove('active');
                bulkToggle.innerHTML = '<i class="bi bi-upload"></i> Bulk';
            } else {
                singleSection.classList.add('hidden');
                bulkSection.classList.add('show');
                bulkToggle.classList.add('active');
                bulkToggle.innerHTML = '<i class="bi bi-pencil-square"></i> Single';
            }
        });

        /* ---- Dropzone interactions ---- */
        browseBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            fileInput.click();
        });

        dropzone.addEventListener('click', function () {
            fileInput.click();
        });

        dropzone.addEventListener('dragover', function (e) {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', function () {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', function (e) {
            e.preventDefault();
            dropzone.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                handleFile(e.dataTransfer.files[0]);
            }
        });

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length) {
                handleFile(fileInput.files[0]);
            }
        });

        function handleFile(file) {
            var validExts = ['.xlsx', '.xls', '.csv'];
            var ext = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
            if (validExts.indexOf(ext) === -1) {
                alert('Please upload a valid Excel or CSV file.');
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be under 5MB.');
                return;
            }
            fileName.textContent = file.name;
            fileSize.textContent = formatBytes(file.size);
            filePreview.classList.add('show');
            dropzone.style.display = 'none';
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            var k = 1024, sizes = ['Bytes', 'KB', 'MB', 'GB'];
            var i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        fileRemove.addEventListener('click', function () {
            fileInput.value = '';
            filePreview.classList.remove('show');
            dropzone.style.display = '';
        });

        /* ---- Submit button text changes based on mode ---- */
        var offcanvasEl = document.getElementById('holidayOffcanvas');
        offcanvasEl.addEventListener('show.bs.offcanvas', function () {
            updateSubmitBtn();
        });

        bulkToggle.addEventListener('click', function () {
            setTimeout(updateSubmitBtn, 50);
        });

        function updateSubmitBtn() {
            if (bulkSection.classList.contains('show')) {
                submitBtn.textContent = 'Upload';
            } else {
                submitBtn.textContent = 'Submit';
            }
        }

        /* ---- Sample Excel download ---- */
        document.getElementById('btnSampleDownload').addEventListener('click', function () {
            var csvContent = 'Holiday Name,Date,Holiday Type,Holiday Year\n';
            csvContent += 'Republic Day,26-01-2026,Public Holiday,2026\n';
            csvContent += 'Maha Shivaratri,18-03-2026,Public Holiday,2026\n';
            csvContent += 'Ugadi,28-03-2026,Public Holiday,2026\n';
            csvContent += 'Good Friday,02-04-2026,Public Holiday,2026\n';
            csvContent += 'May Day,01-05-2026,Public Holiday,2026\n';
            csvContent += 'Independence Day,15-08-2026,Public Holiday,2026\n';
            csvContent += 'Ganesh Chaturthi,26-08-2026,Optional Holiday,2026\n';
            csvContent += 'Gandhi Jayanti,02-10-2026,Public Holiday,2026\n';
            csvContent += 'Dasara,20-10-2026,Public Holiday,2026\n';
            csvContent += 'Diwali,20-11-2026,Public Holiday,2026\n';
            csvContent += 'Christmas,25-12-2026,Public Holiday,2026\n';

            var blob = new Blob([csvContent], {type: 'text/csv;charset=utf-8;'});
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'holiday_sample_upload.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });

        /* ---- Reset on offcanvas close ---- */
        offcanvasEl.addEventListener('hidden.bs.offcanvas', function () {
            singleSection.classList.remove('hidden');
            bulkSection.classList.remove('show');
            bulkToggle.classList.remove('active');
            bulkToggle.innerHTML = '<i class="bi bi-upload"></i> Bulk';
            fileInput.value = '';
            filePreview.classList.remove('show');
            dropzone.style.display = '';
            submitBtn.textContent = 'Submit';
        });
    });
</script>

<script>
    /* ===== Holiday Edit / Delete actions ===== */
    document.addEventListener('DOMContentLoaded', function() {
        var listEl = document.getElementById('leaveHolidaysList');
        if (!listEl) return;

        /* holidayItems array access — it lives in another script scope,
           so re-read from DOM on every action instead of sharing state */
        function holidayToast(msg, ok) {
            var t = document.createElement('div');
            t.style.cssText = 'position:fixed;bottom:24px;right:24px;z-index:10000;display:flex;align-items:center;gap:8px;padding:12px 18px;border-radius:10px;font-size:13px;font-weight:600;background:' + (ok === false ? '#fef2f2;color:#b91c1c;border:1px solid #fecaca;' : '#f0fdf4;color:#15803d;border:1px solid #bbf7d0;') + 'box-shadow:0 8px 24px rgba(0,0,0,.15);opacity:0;transform:translateY(12px);transition:all .3s ease;';
            t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
            document.body.appendChild(t);
            setTimeout(function() { t.style.opacity = '1'; t.style.transform = 'translateY(0)'; }, 10);
            setTimeout(function() {
                t.style.opacity = '0';
                t.style.transform = 'translateY(12px)';
                setTimeout(function() { t.remove(); }, 350);
            }, 2600);
        }

        /* ---- Delegate clicks ---- */
        listEl.addEventListener('click', function(e) {
            var editBtn = e.target.closest('[data-hol-edit]'),
                delBtn = e.target.closest('[data-hol-del]');

            /* ---- Edit: open Add Holiday offcanvas prefilled ---- */
            if (editBtn) {
                var name = editBtn.getAttribute('data-hol-edit'),
                    dateStr = editBtn.getAttribute('data-hol-date'),
                    item = editBtn.closest('.leave-holiday-item');

                var ocTitle = document.querySelector('#holidayOffcanvas .offcanvas-title');
                if (ocTitle) ocTitle.innerHTML = '<span class="offcanvas-icon"><i class="bi bi-pencil-square"></i></span> Edit Holiday';
                var nameInput = document.getElementById('holidayName');
                if (nameInput) nameInput.value = name;

                /* mark edit mode + remember the row for submit updates */
                var oc = document.getElementById('holidayOffcanvas');
                oc.setAttribute('data-editing', name);
                if (item) item.setAttribute('data-editing-row', '1');

                /* keep the offcanvas submit in edit mode even after it closes */
                window.__holidayEditMode = { name: name, row: item };

                bootstrap.Offcanvas.getOrCreateInstance(oc).show();
                return;
            }

            /* ---- Delete: confirm + remove row ---- */
            if (delBtn) {
                var dName = delBtn.getAttribute('data-hol-del');
                if (!window.confirm('Delete holiday "' + dName + '"? This cannot be undone.')) return;
                var dRow = delBtn.closest('.leave-holiday-item');
                if (dRow) dRow.remove();
                holidayToast('Holiday "' + dName + '" deleted');
            }
        });

        /* ---- Offcanvas submit: if editing, update the row in place ---- */
        var ocEl2 = document.getElementById('holidayOffcanvas');
        var submitBtn2 = document.getElementById('holidaySubmit');
        if (ocEl2 && submitBtn2) {
            submitBtn2.addEventListener('click', function() {
                var editing = window.__holidayEditMode;
                if (!editing || !editing.row || !document.body.contains(editing.row)) return;

                var newName = (document.getElementById('holidayName') || {}).value || '',
                    newDate = (document.getElementById('holidayDate') || {}).value || '';
                if (!newName.trim()) return;

                /* update row text + button data */
                var row = editing.row;
                row.querySelector('.holiday-name').textContent = newName.trim();
                var dateMain = row.querySelector('.date-main');
                if (dateMain && newDate) {
                    var d = new Date(newDate);
                    if (!isNaN(d)) {
                        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                        dateMain.textContent = String(d.getDate()).padStart(2, '0') + ' ' + months[d.getMonth()] + ', ' + days[d.getDay()];
                    }
                }
                var eBtn = row.querySelector('[data-hol-edit]'),
                    dBtn = row.querySelector('[data-hol-del]');
                if (eBtn) { eBtn.setAttribute('data-hol-edit', newName.trim()); eBtn.setAttribute('data-hol-date', dateMain ? dateMain.textContent : newDate); }
                if (dBtn) dBtn.setAttribute('data-hol-del', newName.trim());

                window.__holidayEditMode = null;
                bootstrap.Offcanvas.getOrCreateInstance(ocEl2).hide();
                holidayToast('Holiday "' + newName.trim() + '" updated');
            });
        }

        /* ===== Cancel pending leave request ===== */
        listEl.addEventListener('click', function(e) {
            var cancelBtn = e.target.closest('[data-cancel-leave]');
            if (!cancelBtn) return;

            var row = cancelBtn.closest('.leave-holiday-item');
            if (!row) return;

            var leaveName = (row.querySelector('.leave-name') || {}).textContent || 'this leave';
            var dateMain = row.querySelector('.date-main');
            var dateLabel = dateMain ? dateMain.textContent.trim() : '';
            var when = dateLabel ? ' (' + dateLabel + ')' : '';

            if (!window.confirm('Cancel leave request "' + leaveName.trim() + '"' + when + '?')) return;

            /* swap status pill -> Cancelled */
            var wrap = cancelBtn.closest('.leave-status-wrap') || row.querySelector('.status-col');
            wrap.innerHTML = '<span class="leave-status-pill status-cancelled"><i class="bi bi-slash-circle-fill"></i> Cancelled</span>';

            holidayToast('Leave request "' + leaveName.trim() + '" cancelled');
        });
    });
</script>

<script>
    (function () {
        var ocEl = document.getElementById('assignLeaveOffcanvas');
        if (!ocEl) return;

        /* Init Select2 after offcanvas shown — same pattern as Add Manual Attendance */
        ocEl.addEventListener('shown.bs.offcanvas', function () {
            if (typeof $ === 'undefined' || !$.fn.select2) return;
            $('#assignEmployeeSelect').select2({
                dropdownParent: $(ocEl),
                width: '100%',
                placeholder: 'Search employee…',
                allowClear: true,
                templateResult: function (data) {
                    if (!data.id) return data.text;
                    var img = $(data.element).data('image') || './assets/img/profile-1.jpg';
                    return $('<div class="select2-user-option"><img src="' + img + '" class="select2-user-image"><span>' + data.text + '</span></div>');
                },
                templateSelection: function (data) {
                    if (!data.id) return data.text;
                    var img = $(data.element).data('image') || './assets/img/profile-1.jpg';
                    return $('<div class="select2-user-selected"><img src="' + img + '" class="select2-user-image"><span>' + data.text + '</span></div>');
                }
            });
        });

        /* Destroy on close so it re-inits fresh next time */
        ocEl.addEventListener('hidden.bs.offcanvas', function () {
            if (typeof $ !== 'undefined' && $.fn.select2) {
                try {
                    $('#assignEmployeeSelect').select2('destroy');
                } catch (e) { }
            }
        });
    })();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var assignOc = document.getElementById('assignLeaveOffcanvas');
        if (!assignOc) return;

        var bulkToggle = document.getElementById('assignBulkToggle');
        var singleSection = document.getElementById('assignSingleSection');
        var bulkSection = document.getElementById('assignBulkSection');
        var dropzone = document.getElementById('assignDropzone');
        var fileInput = document.getElementById('assignFileInput');
        var browseBtn = document.getElementById('assignBrowseBtn');
        var filePreview = document.getElementById('assignFilePreview');
        var fileName = document.getElementById('assignFileName');
        var fileSize = document.getElementById('assignFileSize');
        var fileRemove = document.getElementById('assignFileRemove');
        var submitBtn = document.getElementById('assignLeaveSubmit');

        var SUBMIT_SINGLE = '<i class="bi bi-check2"></i> Assign Leave';
        var SUBMIT_UPLOAD = '<i class="bi bi-cloud-arrow-up"></i> Upload';

        function updateSubmitBtn() {
            submitBtn.innerHTML = bulkSection.classList.contains('show') ? SUBMIT_UPLOAD : SUBMIT_SINGLE;
        }

        /* ---- Bulk / Single toggle ---- */
        bulkToggle.addEventListener('click', function () {
            var isBulk = bulkSection.classList.contains('show');
            if (isBulk) {
                bulkSection.classList.remove('show');
                singleSection.classList.remove('hidden');
                bulkToggle.classList.remove('active');
                bulkToggle.innerHTML = '<i class="bi bi-upload"></i> Bulk';
            } else {
                singleSection.classList.add('hidden');
                bulkSection.classList.add('show');
                bulkToggle.classList.add('active');
                bulkToggle.innerHTML = '<i class="bi bi-pencil-square"></i> Single';
            }
            updateSubmitBtn();
        });

        /* ---- Dropzone interactions ---- */
        browseBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            fileInput.click();
        });

        dropzone.addEventListener('click', function () {
            fileInput.click();
        });

        dropzone.addEventListener('dragover', function (e) {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', function () {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', function (e) {
            e.preventDefault();
            dropzone.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                handleFile(e.dataTransfer.files[0]);
            }
        });

        fileInput.addEventListener('change', function () {
            if (fileInput.files.length) {
                handleFile(fileInput.files[0]);
            }
        });

        function handleFile(file) {
            var validExts = ['.xlsx', '.xls', '.csv'];
            var ext = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
            if (validExts.indexOf(ext) === -1) {
                alert('Please upload a valid Excel or CSV file.');
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be under 5MB.');
                return;
            }
            fileName.textContent = file.name;
            fileSize.textContent = formatBytes(file.size);
            filePreview.classList.add('show');
            dropzone.style.display = 'none';
        }

        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            var k = 1024, sizes = ['Bytes', 'KB', 'MB', 'GB'];
            var i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        fileRemove.addEventListener('click', function () {
            fileInput.value = '';
            filePreview.classList.remove('show');
            dropzone.style.display = '';
        });

        /* ---- Upload (bulk mode submit) ---- */
        submitBtn.addEventListener('click', function () {
            if (!bulkSection.classList.contains('show')) return;
            if (!fileInput.files.length) {
                alert('Please choose an Excel file to upload.');
                return;
            }
            var inst = bootstrap.Offcanvas.getInstance(assignOc);
            if (inst) inst.hide();
        });

        /* ---- Sample Excel download ---- */
        document.getElementById('assignSampleDownload').addEventListener('click', function () {
            var csvContent = 'Employee ID,Employee Name,Leave Type,Days,Leave Year,Note\n';
            csvContent += 'EMP0001,Arun Kumar,Casual Leave,12,2026,Annual quota\n';
            csvContent += 'EMP0002,Bala Kumar,Sick Leave,12,2026,Annual quota\n';
            csvContent += 'EMP0003,Chandran,Annual leave,10,2026,Carry forward\n';
            csvContent += 'EMP0004,Dinesh Kumar,PTO,5,2026,Project buffer\n';

            var blob = new Blob([csvContent], {type: 'text/csv;charset=utf-8;'});
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'assign_leave_sample.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });

        assignOc.addEventListener('show.bs.offcanvas', updateSubmitBtn);

        /* ---- Reset on offcanvas close ---- */
        assignOc.addEventListener('hidden.bs.offcanvas', function () {
            singleSection.classList.remove('hidden');
            bulkSection.classList.remove('show');
            bulkToggle.classList.remove('active');
            bulkToggle.innerHTML = '<i class="bi bi-upload"></i> Bulk';
            fileInput.value = '';
            filePreview.classList.remove('show');
            dropzone.style.display = '';
            updateSubmitBtn();
        });
    });
</script>