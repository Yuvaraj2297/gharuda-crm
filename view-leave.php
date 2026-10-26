<?php include 'header.php'; ?>




 

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







<?php
include 'footer.php';
?>


 
<script src="./assets/js/select2.js"></script>










<script src="./assets/js/pages/view-leave.js?v=<?php echo time(); ?>"></script>