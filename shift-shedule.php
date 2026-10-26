<?php include 'header.php'; ?>

  



<style>
    .bulk-action-bar {
        display: none;
        align-items: center;
        gap: 12px;
        background: var(--primary-soft, #e8f7ea);
        border: 1px solid var(--primary, #0ca308);
        border-radius: 12px;
        padding: 10px 14px;
        margin-bottom: 12px;
    }

    .bulk-action-bar.show {
        display: flex;
    }

    .bulk-action-bar .bulk-count {
        font-weight: 700;
        color: var(--primary-dark, #0ca308);
        font-size: 13.5px;
    }

    .bulk-action-bar .bulk-clear {
        margin-left: auto;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--danger, #e5484d);
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .shift-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        background: var(--primary-soft, #e8f7ea);
        color: var(--primary-dark, #0ca308);
    }

    .shift-badge.unassigned {
        background: #f1f3f5;
        color: #7a7f8c;
    }

    .schedule-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 600;
        padding: 3px 9px;
        border-radius: 999px;
    }

    .schedule-pill.permanent {
        background: #e7effe;
        color: #2f6fed;
    }

    .schedule-pill.ranged {
        background: #fff4e5;
        color: #b8730a;
    }

    .schedule-pill.none {
        background: #f1f3f5;
        color: #9aa0a8;
    }

    #assignSelectedList {
        max-height: 120px;
        overflow-y: auto;
    }

    .assign-emp-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f1f3f5;
        border-radius: 999px;
        padding: 3px 10px 3px 4px;
        font-size: 12px;
        font-weight: 600;
        margin: 2px;
    }

    .assign-emp-chip img {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        object-fit: cover;
    }

    .duration-options .btn-check:checked+.btn {
        background: var(--primary, #0ca308);
        color: #fff;
        border-color: var(--primary, #0ca308);
    }

    #customRangeWrap,
    #quickRangePreview {
        display: none;
    }

    /* ===== Filters card (same pattern as attendance-report.php) ===== */
    .filters-card {
        position: relative;
        z-index: 50;
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
    }

    .filters-collapse .row>div {
        opacity: 0;
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

    @keyframes fieldIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
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

    /* ===== View Toggle (Weekly / Monthly) ===== */
    .view-toggle {
        display: inline-flex;
        align-items: center;
        background: var(--bg-app, #f4f7f6);
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 12px;
        padding: 4px;
        position: relative;
        gap: 2px;
    }

    .view-toggle-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 18px;
        border: none;
        background: transparent;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        color: var(--ink-500, #6b7684);
        cursor: pointer;
        transition: all .2s ease;
        z-index: 2;
        position: relative;
    }

    .view-toggle-btn:hover {
        color: var(--ink-700, #3a4652);
    }

    .view-toggle-btn.active {
        color: var(--primary-dark, #0f7a38);
    }

    .view-toggle-btn i {
        font-size: 15px;
    }

    .view-toggle-slider {
        position: absolute;
        top: 4px;
        left: 4px;
        height: calc(100% - 8px);
        width: calc(50% - 5px);
        background: var(--bg-card, #fff);
        border-radius: 10px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 1px 2px rgba(0, 0, 0, .06);
        transition: transform .25s cubic-bezier(.22, 1, .36, 1);
        z-index: 1;
    }

    .view-toggle-slider.right {
        transform: translateX(calc(100% + 2px));
    }

    /* ===== Day columns for shift schedule grid ===== */
    .shift-schedule-table .day-col {
        text-align: center;
        white-space: nowrap;
    }

    .shift-schedule-table .day-col-header {
        text-align: center;
        white-space: nowrap;
        min-width: 90px;
        /* background: linear-gradient(135deg, var(--primary-soft, #e8f7ea) 0%, var(--bg-card, #fff) 100%) !important; */
        position: relative;
    }

    /* .shift-schedule-table .day-col-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--primary, #0ca308) 0%, transparent 100%);
    } */

    .shift-schedule-table .day-col-header .day-label {
        font-size: 10px;
        font-weight: 600;
        color: var(--ink-500);
    }

    .shift-schedule-table .day-col-header .day-num {
        font-size: 13px;
        font-weight: 700;
        /* color: var(--primary-dark, #0f7a38); */
    }

    .shift-schedule-table th.day-col-past {
        opacity: 0.45;
        pointer-events: none;
        background: #f1f3f5 !important;
        color: var(--ink-300);
    }

    .shift-schedule-table th.day-col-past::after {
        background: transparent;
    }

    .shift-schedule-table td.day-col-past {
        opacity: 0.4;
        pointer-events: none;
        background: #f9fafb;
    }

    .shift-schedule-table .day-col-past .shift-badge {
        background: #f1f3f5;
        color: #9aa0a8;
    }

    /* ===== Bulk Upload Dropzone ===== */
    .shift-bulk-dropzone { padding: 32px 18px; border: 2px dashed #d1d5db; border-radius: 12px; background: #fafbfc; text-align: center; cursor: pointer; transition: border-color .2s ease, background .2s ease; }
    .shift-bulk-dropzone:hover { border-color: var(--primary); background: var(--primary-soft); }
    .shift-bulk-dropzone .mode-icon { width: 48px; height: 48px; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 10px; border-radius: 12px; background: var(--primary-soft); color: var(--primary); font-size: 21px; }
    .shift-bulk-dropzone h6 { margin-bottom: 5px; color: var(--ink-900); font-size: 14px; font-weight: 800; }
    .shift-bulk-dropzone p { margin-bottom: 14px; color: var(--ink-500); font-size: 12px; }
    .shift-bulk-dropzone .browse-link { color: var(--primary); font-weight: 700; text-decoration: underline; }
    .shift-bulk-dropzone.dragover { border-color: var(--primary); background: var(--primary-soft); }
    .shift-upload-file { display: none; align-items: center; gap: 10px; margin-top: 12px; padding: 10px; border: 1px solid #bbf7d0; border-radius: 8px; background: #f0fdf4; color: var(--ink-900); font-size: 12px; font-weight: 700; }
    .shift-upload-file.show { display: flex; }
    .shift-upload-file i { color: var(--primary); font-size: 18px; }
    .shift-upload-file .shift-upload-remove { margin-left: auto; background: transparent; border: none; color: var(--danger, #e5484d); font-size: 14px; cursor: pointer; }
    .shift-upload-count { display: none; align-items: center; justify-content: space-between; margin-top: 10px; padding: 10px 12px; border-radius: 8px; background: #f1f5f9; color: var(--ink-700); font-size: 12px; font-weight: 700; }
    .shift-upload-count.show { display: flex; }
    .shift-upload-preview { display: none; margin-top: 12px; max-height: 200px; overflow-y: auto; border: 1px solid var(--border-soft); border-radius: 8px; }
    .shift-upload-preview.show { display: block; }
    .shift-upload-preview table { font-size: 11px; margin: 0; }
    .shift-upload-preview th { background: #f1f5f9; font-size: 10px; font-weight: 700; position: sticky; top: 0; }
    .shift-upload-preview td { font-size: 11px; padding: 4px 8px; }

    /* ===== Gender / Stat card active states (CSS classes, not inline) ===== */
    .stat-gender-card.active-all {
        border: 2px solid #4f46e5 !important;
        background: #eef2ff !important;
        transform: scale(1.02);
    }
    .stat-gender-card.active-male {
        border: 2px solid #3b82f6 !important;
        background: #eff6ff !important;
        transform: scale(1.02);
    }
    .stat-gender-card.active-female {
        border: 2px solid #ec4899 !important;
        background: #fdf2f8 !important;
        transform: scale(1.02);
    }

    /* ===== Clickable shift badge (opens Shift Change Request modal) ===== */
    .shift-badge.clickable {
        cursor: pointer;
        border: 1px solid transparent;
        transition: transform .15s ease, box-shadow .15s ease, border-color .15s ease;
    }

    .shift-badge.clickable:hover {
        transform: translateY(-1px);
        border-color: var(--primary, #0ca308);
        box-shadow: 0 2px 8px rgba(12, 163, 8, .18);
    }

    .shift-badge.clickable.unassigned:hover {
        border-color: #adb5bd;
        box-shadow: 0 2px 8px rgba(20, 20, 43, .12);
    }

    .shift-badge .badge-swap-icon {
        font-size: 10px;
        opacity: 0;
        transition: opacity .15s ease;
    }

    .shift-badge.clickable:hover .badge-swap-icon {
        opacity: .85;
    }

    /* pending request marker on a badge */
    .shift-badge.req-pending {
        background: #fff4e5 !important;
        color: #b8730a !important;
        border-color: #f0b429 !important;
    }

    .shift-badge.req-approved {
        background: #e8f7ea !important;
        color: #0f7a38 !important;
        border-color: #0ca308 !important;
    }

    .shift-badge.req-rejected {
        background: #fdecec !important;
        color: #d3373c !important;
        border-color: #e5484d !important;
    }

    /* ===== Shift Change Request modal ===== */
    .scr-emp-card {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8fafb;
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 12px;
        padding: 10px 12px;
    }

    .scr-emp-card img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .scr-emp-card .scr-emp-name {
        font-size: 13.5px;
        font-weight: 700;
        color: var(--ink-900);
        line-height: 1.2;
    }

    .scr-emp-card .scr-emp-meta {
        font-size: 11.5px;
        color: var(--ink-500);
        font-weight: 600;
    }

    .scr-emp-card .scr-day-chip {
        margin-left: auto;
        text-align: right;
    }

    .scr-emp-card .scr-day-chip .scr-day {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--primary-dark, #0f7a38);
    }

    .scr-emp-card .scr-day-chip .scr-date {
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

    .scr-shift-box.requested {
        border-color: var(--primary, #0ca308);
        background: var(--primary-soft, #e8f7ea);
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

    .scr-shift-box .scr-box-time {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--ink-500);
    }

    .scr-arrow {
        display: flex;
        align-items: center;
        color: var(--primary, #0ca308);
        font-size: 18px;
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

    /* success / submitted view inside modal */
    #scrSuccessView {
        display: none;
        text-align: center;
        padding: 6px 0 2px;
    }

    /* ID rule above outranks a single class, so the "show" state is ID-qualified */
    #scrSuccessView.ssh-shown {
        display: block;
    }

    .scr-success-icon {
        width: 62px;
        height: 62px;
        margin: 0 auto 12px;
        border-radius: 50%;
        background: var(--primary-soft, #e8f7ea);
        color: var(--primary, #0ca308);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        animation: scrPop .4s cubic-bezier(.34, 1.56, .64, 1);
    }

    @keyframes scrPop {
        from { transform: scale(.6); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .scr-req-id {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .5px;
        background: #f1f3f5;
        color: var(--ink-700, #3a4652);
        border-radius: 999px;
        padding: 5px 14px;
        margin-bottom: 14px;
    }

    .scr-timeline {
        text-align: left;
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 12px;
        padding: 14px 14px 4px;
        background: #fff;
    }

    .scr-step {
        position: relative;
        padding-left: 30px;
        padding-bottom: 16px;
    }

    .scr-step:last-child {
        padding-bottom: 6px;
    }

    .scr-step::before {
        content: '';
        position: absolute;
        left: 9px;
        top: 20px;
        bottom: 0;
        width: 2px;
        background: #e9ecef;
    }

    .scr-step:last-child::before {
        display: none;
    }

    .scr-step .scr-dot {
        position: absolute;
        left: 0;
        top: 1px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #f1f3f5;
        color: #adb5bd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
    }

    .scr-step.done .scr-dot {
        background: var(--primary, #0ca308);
        color: #fff;
    }

    .scr-step.active .scr-dot {
        background: #fff4e5;
        color: #b8730a;
        box-shadow: 0 0 0 3px rgba(240, 180, 41, .22);
    }

    .scr-step .scr-step-title {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-900);
        line-height: 1.3;
    }

    .scr-step .scr-step-sub {
        font-size: 11.5px;
        color: var(--ink-500);
        font-weight: 600;
    }

    /* ===== Requests list card ===== */
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

    /* ===== live scope preview on the table ===== */
    .shift-badge.scr-preview {
        background: var(--primary-soft, #e8f7ea) !important;
        color: var(--primary-dark, #0f7a38) !important;
        border: 1px dashed var(--primary, #0ca308) !important;
        animation: scrPreviewPulse 1.4s ease-in-out infinite;
    }

    @keyframes scrPreviewPulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(12, 163, 8, .28); }
        50% { box-shadow: 0 0 0 4px rgba(12, 163, 8, 0); }
    }

    .shift-badge.scr-skipped {
        outline: 1px dashed #ced4da;
        opacity: .55;
    }

    /* ===== Employee / Manager view toggle on the requests card ===== */
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

    .scr-view-btn.active[data-role="manager"] {
        color: #b8730a;
    }

    /* row action buttons (manager view) */
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

    .scr-manager-banner {
        display: none;
        align-items: center;
        gap: 8px;
        background: #fff4e5;
        color: #8a5a06;
        font-size: 12px;
        font-weight: 600;
        padding: 8px 14px;
        border-bottom: 1px solid #f0dfb8;
    }

    .scr-manager-banner.show { display: flex; }

    .scr-reject-reason-note {
        font-size: 11px;
        color: #d3373c;
        font-weight: 600;
        margin-top: 2px;
    }

    /* ===== Stacked modal fix =====
       scrRejectModal always opens ON TOP of the fullscreen scrRequestsModal.
       Bootstrap gives every modal + its backdrop the same default z-index
       (1055 / 1050), so the 2nd backdrop was covering the 1st modal's
       content instead of sitting between the two modals. Bump both the
       reject modal and its own backdrop above the requests modal. */
    #scrRejectModal {
        z-index: 1070;
    }

    .modal-backdrop.scr-reject-backdrop {
        z-index: 1065 !important;
    }

    /* View Rejection modal — also opens on top of the fullscreen requests
       modal, same stacking treatment as the Reject modal above. */
    #scrViewRejectionModal {
        z-index: 1070;
    }

    .modal-backdrop.scr-view-rejection-backdrop {
        z-index: 1065 !important;
    }

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

    /* ===== Shift Change Requests — fullscreen modal ===== */
    #scrRequestsModal .modal-content {
        border-radius: 0;
    }

    #scrRequestsModal .modal-header {
        padding: 16px 20px;
        border-bottom: 1px solid var(--border-soft, #eaeef0);
        flex-wrap: wrap;
        gap: 12px;
    }

    #scrRequestsModal .modal-body {
        padding: 0;
        overflow-y: auto;
        background: var(--bg-app, #f4f7f6);
    }

    #scrRequestsModal .scr-requests-table-wrap {
        margin: 18px;
        background: #fff;
        border-radius: 14px;
        border: 1px solid var(--border-soft, #eaeef0);
        overflow: hidden;
    }

    /* ===== Reject Reason modal ===== */
    .scr-reject-emp-line {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-700, #3a4652);
        background: #f8fafb;
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 10px;
        padding: 9px 12px;
    }

    /* preview mode la table theriyanum -> backdrop light aakkaren */
    body.scr-preview-mode .modal-backdrop.show { opacity: .2; }

    .scr-scope-hint {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--primary-dark, #0f7a38);
        margin-top: 5px;
    }

    .scr-scope-hint.muted { color: var(--ink-500, #7a7f8c); }

    .scr-toast.out { animation: scrToastOut .25s ease forwards; }
    .scr-toast i { color: var(--primary, #0ca308); font-size: 17px; }

    @keyframes scrToastIn {
        from { opacity: 0; transform: translateY(14px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes scrToastOut {
        to { opacity: 0; transform: translateX(20px); }
    }

    /* ===== Assign Shift Flow Modal Styles ===== */
    .asf-modal .modal-content {
        border-radius: 18px !important;
        overflow: hidden;
        border: none !important;
        box-shadow: 0 25px 70px rgba(15, 23, 42, 0.22);
    }

    .asf-section-title {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-900);
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .asf-mode-pill {
        cursor: pointer;
        border: 2px solid #e2e8f0;
        border-radius: 14px;
        padding: 12px 16px;
        background: #fff;
        transition: all .2s ease;
        display: flex;
        align-items: center;
        gap: 12px;
        flex: 1;
        user-select: none;
    }

    .asf-mode-pill:hover {
        border-color: #cbd5e1;
        background: #f8fafc;
        transform: translateY(-1px);
    }

    .asf-mode-pill.active {
        border-color: var(--primary, #0ca308) !important;
        background: var(--primary-soft, #e8f7ea) !important;
        box-shadow: 0 4px 14px rgba(12, 163, 8, 0.14);
    }

    .asf-mode-pill .asf-mode-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        background: #f1f5f9;
        color: var(--ink-700);
        flex-shrink: 0;
        transition: all .2s ease;
    }

    .asf-mode-pill.active .asf-mode-icon {
        background: #fff;
        color: var(--primary, #0ca308);
        box-shadow: 0 2px 6px rgba(0, 0, 0, .06);
    }

    /* Batch cards */
    .asf-batch-card {
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        background: #fff;
        padding: 14px;
        transition: all .2s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        position: relative;
    }

    .asf-batch-card:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        border-color: #cbd5e1;
    }

    .asf-batch-card.batch-theme-0 { border-top: 4px solid #10b981; }
    .asf-batch-card.batch-theme-1 { border-top: 4px solid #0ea5e9; }
    .asf-batch-card.batch-theme-2 { border-top: 4px solid #8b5cf6; }
    .asf-batch-card.batch-theme-3 { border-top: 4px solid #f59e0b; }
    .asf-batch-card.batch-theme-4 { border-top: 4px solid #ec4899; }

    .asf-batch-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .asf-batch-title {
        font-size: 13.5px;
        font-weight: 700;
        color: var(--ink-900);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .asf-emp-preview-list {
        max-height: 125px;
        overflow-y: auto;
        padding: 6px;
        background: #f8fafc;
        border: 1px solid #edf2f7;
        border-radius: 10px;
        margin-top: 8px;
    }

    .asf-emp-chip-item {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 999px;
        padding: 2px 8px 2px 3px;
        margin: 2px;
        font-size: 11.5px;
        font-weight: 600;
        color: var(--ink-800);
    }

    .asf-emp-chip-item img {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        object-fit: cover;
    }

    .asf-emp-customizer {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px;
        margin-top: 10px;
        display: none;
    }

    .asf-emp-customizer.show {
        display: block;
        animation: fieldIn 0.3s ease forwards;
    }

    .asf-emp-checkbox-grid {
        max-height: 170px;
        overflow-y: auto;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
        gap: 6px;
        padding: 4px;
    }

    .asf-emp-check-item {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 5px 8px;
        font-size: 12px;
        cursor: pointer;
        transition: background .15s ease;
    }

    .asf-emp-check-item:hover {
        background: #f1f5f9;
    }

    .asf-parts-btn.active {
        background: var(--primary, #0ca308) !important;
        color: #fff !important;
        border-color: var(--primary, #0ca308) !important;
    }

    /* Weekly Shift Rotation Preview & Timeline */
    .asf-rotation-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 14px;
        margin-top: 14px;
    }

    .asf-shift-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 6px;
        white-space: nowrap;
    }
    .asf-shift-pill.shift-mor { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
    .asf-shift-pill.shift-eve { background: #e0f2fe; color: #075985; border: 1px solid #bae6fd; }
    .asf-shift-pill.shift-ngt { background: #ede9fe; color: #5b21b6; border: 1px solid #ddd6fe; }
    .asf-shift-pill.shift-gen { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
    .asf-shift-pill.shift-off { background: #f1f5f9; color: #64748b; border: 1px solid #e2e8f0; }

    .asf-rotation-timeline-table th, .asf-rotation-timeline-table td {
        padding: 8px 10px;
        font-size: 11.5px;
    }

    /* ===== Multi-Step Stepper Header for Rotational Shift Flow ===== */
    .asf-stepper-wrap {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 14px 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .asf-stepper-track {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }

    .asf-step-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        position: relative;
        z-index: 2;
        user-select: none;
        transition: transform .15s ease;
    }

    .asf-step-item:hover {
        transform: translateY(-1px);
    }

    .asf-step-circle {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
        background: #f1f5f9;
        color: #64748b;
        border: 2px solid #e2e8f0;
        transition: all .25s ease;
    }

    .asf-step-item.active .asf-step-circle {
        background: var(--primary, #0ca308);
        color: #fff;
        border-color: var(--primary, #0ca308);
        box-shadow: 0 4px 12px rgba(12, 163, 8, 0.35);
    }

    .asf-step-item.completed .asf-step-circle {
        background: #e8f7ea;
        color: #0f7a38;
        border-color: #0ca308;
    }

    .asf-step-label {
        font-size: 11.5px;
        font-weight: 600;
        color: #64748b;
        white-space: nowrap;
        transition: color .2s ease;
    }

    .asf-step-item.active .asf-step-label {
        color: var(--primary-dark, #0f7a38);
        font-weight: 700;
    }

    .asf-step-item.completed .asf-step-label {
        color: #0f7a38;
    }

    .asf-step-line {
        flex: 1;
        height: 3px;
        background: #e2e8f0;
        margin: 0 8px;
        position: relative;
        top: -10px;
        z-index: 1;
        transition: background .3s ease;
    }

    .asf-step-line.active {
        background: var(--primary, #0ca308);
    }

    /* Step Panels */
    .asf-step-panel {
        display: none;
    }

    .asf-step-panel.active {
        display: block;
        animation: asfPanelFadeIn .25s ease-out;
    }

    @keyframes asfPanelFadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ===== 2. Shift Schedule Modal Styles ===== */

    /* Section headers: icon chip + title (matches the modal header chip) */
    .ssm-sec-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        padding-bottom: 10px;
        margin-bottom: 14px;
        border-bottom: 1px solid var(--border-soft, #eaeef0);
    }
    .ssm-sec-head-left {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 0;
    }
    .ssm-sec-icon {
        width: 30px;
        height: 30px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
        background: var(--primary-soft, #e8f7ea);
        color: var(--primary, #0ca308);
    }
    .ssm-sec-icon.is-blue { background: var(--accent-blue-soft, #eaf1ff); color: var(--accent-blue, #3b82f6); }
    .ssm-sec-icon.is-amber { background: var(--accent-amber-soft, #fef6e0); color: var(--accent-amber, #f59e0b); }
    .ssm-sec-icon.is-violet { background: var(--accent-violet-soft, #f2ecfe); color: var(--accent-violet, #8b5cf6); }
    .ssm-sec-title {
        font-weight: 700;
        font-size: 13.5px;
        color: var(--ink-900, #1e293b);
        line-height: 1.25;
    }
    .ssm-sec-title small {
        display: block;
        font-size: 11px;
        font-weight: 500;
        color: var(--ink-500, #6b7684);
        margin-top: 1px;
    }
    .ssm-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 18px 20px;
        margin-bottom: 16px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        transition: border-color .2s ease, box-shadow .2s ease;
    }
    .ssm-card:hover {
        border-color: #cbd5e1;
    }
    .ssm-type-option {
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 14px 16px;
        cursor: pointer;
        transition: all .2s ease;
        background: #fff;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .ssm-type-option:hover {
        border-color: #94a3b8;
        transform: translateY(-2px);
    }
    .ssm-type-option.active {
        border-color: var(--primary, #0ca308);
        background: #f0fdf4;
        box-shadow: 0 4px 12px rgba(12, 163, 8, 0.12);
    }
    .ssm-day-btn {
        min-width: 48px;
        height: 40px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 1.5px solid #e2e8f0;
        background: #fff;
        color: #334155;
        transition: all .15s ease;
        user-select: none;
    }
    .ssm-day-btn:hover {
        border-color: #cbd5e1;
        background: #f8fafc;
    }
    .ssm-day-btn.off-day {
        background: #fee2e2;
        border-color: #ef4444;
        color: #b91c1c;
        box-shadow: 0 2px 6px rgba(239, 68, 68, 0.2);
    }
    .ssm-day-btn.work-day {
        background: #f0fdf4;
        border-color: #22c55e;
        color: #15803d;
    }
    .ssm-cal-table th, .ssm-cal-table td {
        padding: 9px 12px;
        font-size: 11.5px;
        text-align: center;
        vertical-align: middle;
    }
    .ssm-cal-table thead th {
        background: #f8fafc;
        font-weight: 700;
        color: #475569;
        border-bottom: 2px solid #e2e8f0;
    }
</style>

<!-- ===== Extracted inline styles — the markup is now class-only ===== -->
<style>
    /* Visibility state — replaces the old inline display rules */
    .ssh-hidden { display: none; }
    /* Page chrome */
    .ssh-page-title { font-size: 1.7rem; }
    .ssh-strong-145 { font-size: 14.5px; color: var(--ink-900); }
    .ssh-btn-primary { font-size: 12.5px; font-weight: 700; border-radius: 8px; background: linear-gradient(135deg, #0ca308 0%, #078804 100%); border: none; box-shadow: 0 3px 10px rgba(12,163,8,0.25); }
    .ssh-btn-outline-sm { font-size: 12.5px; font-weight: 600; border-radius: 8px; }
    .ssh-btn-soft { background: #f1f3f5; border-radius: 8px; font-size: 12px; font-weight: 600; color: var(--ink-500); }
    .ssh-db-icon { background: #eef2ff; color: #4f46e5; width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 17px; }
    .ssh-card-title { font-size: 13px; font-weight: 700; color: var(--ink-900); }
    .ssh-week-btn { font-size: 12px; padding: 5px 10px; border-radius: 8px; }
    .ssh-week-btn-cur { font-size: 12px; padding: 5px 12px; border-radius: 8px; }
    .ssh-month-select { width: 170px; }
    .ssh-th-sno { width: 70px; }
    .ssh-th-batch { width: 190px; }
    /* Shared typography / spacing utilities */
    .ssh-fs-11 { font-size: 11px; }
    .ssh-fs-12 { font-size: 12px; }
    .ssh-fs-125 { font-size: 12.5px; }
    .ssh-fs-13 { font-size: 13px; }
    .ssh-fs-115 { font-size: 11.5px; }
    .ssh-label { font-size: 12.5px; }
    .ssh-muted-11 { font-size: 11px; }
    .ssh-muted-12 { font-size: 12px; }
    .ssh-pointer { cursor: pointer; }
    .ssh-lh-16 { line-height: 1.6; }
    .ssh-select { font-size: 13px; border-radius: 10px; }
    .ssh-input-r8 { border-radius: 8px; }
    .ssh-input-r10 { border-radius: 10px; }
    .ssh-input-search { max-width: 260px; font-size: 12px; border-radius: 8px; }
    .ssh-input-group-l8 { border-radius: 8px 0 0 8px; }
    .ssh-input-group-r8 { border-radius: 0 8px 8px 0; font-size: 12.5px; }
    .ssh-mini-btn-8 { font-size: 11.5px; border-radius: 8px; }
    .ssh-mini-btn-6 { font-size: 11.5px; border-radius: 6px; }
    .ssh-scope-btn-l { border-radius: 8px 0 0 8px; font-size: 11.5px; font-weight: 600; }
    .ssh-scope-btn-r { border-radius: 0 8px 8px 0; font-size: 11.5px; font-weight: 600; }
    .ssh-btn-outline-sm2 { font-size: 12.5px; font-weight: 600; border-radius: 8px; }
    .ssh-btn-primary-sm { font-size: 12.5px; font-weight: 700; border-radius: 8px; }
    .ssh-btn-success-sm { font-size: 12.5px; font-weight: 700; border-radius: 8px; background: linear-gradient(135deg, #0ca308 0%, #078804 100%); border: none; box-shadow: 0 3px 10px rgba(12,163,8,0.28); }
    /* Modals */
    .ssh-modal-asf { border-radius: 0px !important; overflow: hidden; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.18); }
    .ssh-modal-config { border-radius: 18px; overflow: hidden; border: none; box-shadow: 0 25px 70px rgba(0,0,0,0.22); }
    .ssh-modal-head { background: #fff; border-bottom: 1px solid #edf2f7; }
    .ssh-modal-ico { background: var(--primary-soft,#e8f7ea); color: var(--primary,#0ca308); display: flex; align-items: center; justify-content: center; }
    .ssh-modal-ico-42 { width: 42px; height: 42px; border-radius: 12px; font-size: 20px; }
    .ssh-modal-ico-44 { width: 44px; height: 44px; border-radius: 14px; font-size: 22px; flex-shrink: 0; }
    .ssh-modal-title-16 { font-size: 16px; }
    .ssh-modal-title-17 { font-size: 17px; }
    .ssh-modal-body { background: #f8fafc; overflow-y: auto; }
    .ssh-modal-body-lg { background: #f8fafc; max-height: calc(85vh - 120px); overflow-y: auto; }
    /* Step badges / highlights */
    .ssh-step-badge { font-size: 10.5px; }
    .ssh-eligible-badge { background: #e8f7ea; color: #0f7a38; font-size: 12px; padding: 7px 14px; border-radius: 20px; }
    .ssh-badge-115 { font-size: 11.5px; }
    .ssh-trigger-highlight { background: #fffbeb; border-color: #fde68a !important; }
    .ssh-border-amber { border-color: #f59e0b; }
    .ssh-summary-banner { background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0 !important; }
    .ssh-summary-text { font-size: 12.5px; line-height: 1.6; }
    .ssh-switch { width: 2.4em; height: 1.25em; cursor: pointer; }
    .ssh-emp-list { max-height: 190px; overflow-y: auto; }
    .ssh-bg-slate { background: #f8fafc; }
    /* Assign-shift button + config modal chrome */
    .ssh-btn-success-lg { font-size: 12.5px; font-weight: 700; border-radius: 8px; background: linear-gradient(135deg, #0ca308 0%, #078804 100%); border: none; box-shadow: 0 3px 10px rgba(12,163,8,0.25); }
    .ssh-modal-scr { overflow: unset; max-height: calc(100vh - 80px); display: flex; flex-direction: column; }
    .ssh-modal-footer-inherit { border-bottom-left-radius: inherit; }
    .ssh-ic-primary { color: var(--primary); }
    .ssh-ic-danger { color: #d3373c; }
    .ssh-fs-10 { font-size: 10px; }
    .ssh-title-16 { font-size: 16px; }
    .ssh-note { font-size: 11.5px; margin-top: 5px; }
    .ssh-remark-count { font-size: 11px; margin-top: 3px; }
    .ssh-muted-115 { font-size: 11.5px; color: var(--ink-500); }
    .ssh-muted-115-600 { font-size: 11.5px; font-weight: 600; }
    .ssh-month-preset-btn { border-radius: 6px; font-size: 11px; }
    .ssh-mini-btn-11-6 { font-size: 11px; border-radius: 6px; }
    .ssh-rot-btn-l { border-radius: 8px 0 0 8px; font-size: 11.5px; font-weight: 600; }
    .ssh-rot-btn-r { border-radius: 0 8px 8px 0; font-size: 11.5px; font-weight: 600; }
    .ssh-month-note-info { background: #f0f9ff; border-color: #bae6fd !important; }
    .ssh-month-note-green { background: #f0fdf4; border-color: #bbf7d0 !important; }
    .ssh-month-note-amber { background: #fffbeb; border-color: #fde68a !important; }
    .ssh-month-note-slate { background: #f8fafc; border-color: #e2e8f0 !important; }
    .ssh-perm-strip { min-height: 38px; border-color: #bbf7d0 !important; }
    .ssh-scr-box-bad { border-color: #e5484d; background: #fdecec; }
    .ssh-scr-box-label-bad { color: #d3373c; }
    .ssh-btn-danger-flat { background: #e5484d; border-color: #e5484d; }
    .ssh-offcanvas-footer { gap: 8px; }
    /* Duration-picker date inputs inside the config modal keep the same radius */
    #shiftScheduleConfigModal .date-input { border-radius: 10px; }
    /* JS-rendered markup (dept breakdown, table rows, batch cycle cards, requests) */
    .ssh-fs-105 { font-size: 10.5px; }
    .ssh-fs-95 { font-size: 9.5px; }
    .ssh-op-90 { opacity: .9; }
    .ssh-trans { transition: all .15s ease; }
    .ssh-line-clamp { line-height: 1.2; min-width: 0; }
    .ssh-th-min95 { min-width: 95px; }
    .ssh-th-group { width: 200px; text-align: left; background: #f8fafc; }
    .ssh-th-week { background: #f8fafc; text-align: center; }
    .ssh-td-left { text-align: left; vertical-align: middle; }
    .ssh-td-center { vertical-align: middle; text-align: center; }
    .ssh-td-branch { max-width: 220px; white-space: normal; font-size: 12.5px; color: var(--ink-700); }
    .ssh-day-label { font-size: 10.5px; color: var(--ink-500); font-weight: 600; }
    .ssh-day-num { font-size: 12.5px; font-weight: 700; color: var(--ink-800); }
    .ssh-avatar-34 { width: 34px; height: 34px; }
    .ssh-avatar-20 { width: 20px; height: 20px; border-radius: 50%; object-fit: cover; }
    .ssh-avatar-30 { width: 30px; height: 30px; }
    .ssh-avatar-26 { width: 26px; height: 26px; }
    .ssh-avatar-30b { width: 30px; height: 30px; border-radius: 50%; object-fit: cover; border: 1px solid #e2e8f0; }
    .ssh-emp-code { font-size: 12px; color: var(--primary-dark); font-weight: 600; }
    .ssh-muted-11 { font-size: 11px; color: var(--ink-500); }
    .ssh-muted-12 { font-size: 12px; color: var(--ink-500); }
    .ssh-req-id { font-size: 12.5px; color: var(--primary-dark); }
    .ssh-select-sm { border-radius: 8px; font-size: 12px; font-weight: 600; }
    .ssh-btn-outline-115 { font-size: 11.5px; font-weight: 600; border-radius: 8px; }
    .ssh-badge-active { font-size: 9.5px; padding: 2px 5px; }
    .ssh-empty-ico { font-size: 26px; display: block; margin-bottom: 8px; }
    .ssh-dept-stat-card { border: 2px solid #eef0f3; border-radius: 12px; padding: 14px; display: flex; align-items: center; gap: 12px; background: #fff; cursor: pointer; transition: all .2s ease; }
    .ssh-dept-stat-name { font-size: 11px; font-weight: 600; color: var(--ink-500); line-height: 1.2; }
    .ssh-dept-stat-count { font-size: 18px; font-weight: 800; color: var(--ink-900); }
    /* Runtime state flags (were inline writes) */
    .ssh-ov-visible { overflow: visible; }
    .ssh-shown { display: block; }
    .ssh-scaled { transform: scale(1.02); }
    .ssh-dept-active { border-color: #8b5cf6 !important; background: #f5f3ff !important; }
    /* Department filter-card active palette (was written inline from the map above) */
    .ssh-dcard-admin { border-color: #4f46e5 !important; background: #4f46e514 !important; }
    .ssh-dcard-branch { border-color: #0ea5e9 !important; background: #0ea5e914 !important; }
    .ssh-dcard-designer { border-color: #10b981 !important; background: #10b98114 !important; }
    .ssh-dcard-developer { border-color: #f59e0b !important; background: #f59e0b14 !important; }
    .ssh-dcard-finance { border-color: #ef4444 !important; background: #ef444414 !important; }
    .ssh-dcard-hr { border-color: #8b5cf6 !important; background: #8b5cf614 !important; }
    .ssh-dcard-marketing { border-color: #ec4899 !important; background: #ec489914 !important; }
    .ssh-hl-today { background: #fcfdfd; }
    /* Shift pill palette for the schedule preview grid (was inline bg/color/border) */
    .ssh-spill { font-size: 11px; font-weight: 700; }
    .ssh-spill-0 { background: #f8fafc; color: #334155; border: 1px solid #cbd5e1; }
    .ssh-spill-1 { background: #dcfce7; color: #16a34a; border: 1px solid #bbf7d0; }
    .ssh-spill-2 { background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; }
    .ssh-spill-3 { background: #fef3c7; color: #d97706; border: 1px solid #fde68a; }
    .ssh-spill-4 { background: #f3e8ff; color: #9333ea; border: 1px solid #e9d5ff; }
    /* Batch cycle cards — per-part themes */
    .ssh-batch-card { border-radius: 12px; }
    .ssh-batch-title { font-size: 13px; }
    .ssh-batch-badge { background: #fff; border: 1px solid #0284c7; font-size: 11px; color: #0369a1; }
    .ssh-batch-foot { font-size: 11px; }
    .ssh-theme-1 { border-color: #0284c7 !important; background: #f0f9ff !important; }
    .ssh-theme-1 .ssh-batch-title, .ssh-theme-1 .ssh-batch-foot { color: #0369a1; }
    .ssh-theme-1 .ssh-batch-badge { color: #0369a1; border-color: #0284c7; }
    .ssh-theme-2 { border-color: #d97706 !important; background: #fffbeb !important; }
    .ssh-theme-2 .ssh-batch-title, .ssh-theme-2 .ssh-batch-foot { color: #b45309; }
    .ssh-theme-2 .ssh-batch-badge { color: #b45309; border-color: #d97706; }
    .ssh-theme-3 { border-color: #9333ea !important; background: #faf5ff !important; }
    .ssh-theme-3 .ssh-batch-title, .ssh-theme-3 .ssh-batch-foot { color: #7e22ce; }
    .ssh-theme-3 .ssh-batch-badge { color: #7e22ce; border-color: #9333ea; }
    .ssh-theme-4 { border-color: #16a34a !important; background: #f0fdf4 !important; }
    .ssh-theme-4 .ssh-batch-title, .ssh-theme-4 .ssh-batch-foot { color: #15803d; }
    .ssh-theme-4 .ssh-batch-badge { color: #15803d; border-color: #16a34a; }
    /* Department breakdown icon tiles — palette moved out of the JS strings */
    .ssh-dept-stat-ico { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
    .ssh-dcol-1 { background: #4f46e514; color: #4f46e5; }
    .ssh-dcol-2 { background: #0ea5e914; color: #0ea5e9; }
    .ssh-dcol-3 { background: #10b98114; color: #10b981; }
    .ssh-dcol-4 { background: #f59e0b14; color: #f59e0b; }
    .ssh-dcol-5 { background: #ef444414; color: #ef4444; }
    .ssh-dcol-6 { background: #8b5cf614; color: #8b5cf6; }
    .ssh-dcol-7 { background: #ec489914; color: #ec4899; }
    .ssh-dcol-8 { background: #06b6d414; color: #06b6d4; }
</style>

<!-- ===== Page header ===== -->
<div class="d-flex align-items-start justify-content-between flex-sm-row flex-column gap-3 mb-3">
    <div class="w-100 overflow-auto">
        <h1 class="font-display fw-bold mb-1 ssh-page-title">Shift Schedule</h1>
    </div>
    <div class="d-flex align-items-center gap-2 text-nowrap">
        <button type="button" class="btn btn-primary ssh-btn-primary" id="openShiftScheduleModalBtn" data-bs-toggle="modal" data-bs-target="#shiftScheduleConfigModal" onclick="if(window.openShiftScheduleConfigModal) window.openShiftScheduleConfigModal();">
            <i class="bi bi-calendar2-range me-1 fs-6"></i> Shift Schedule
        </button>
        <!-- <a href="assets/excel/HRMS Title Data.xlsx" download class="btn btn-outline-primary ssh-btn-outline-sm">
            <i class="bi bi-download me-1"></i> Sample Excel
        </a>
        <button type="button" class="btn btn-outline-primary" id="bulkUploadBtn" data-bs-toggle="offcanvas" data-bs-target="#shiftBulkUploadOffcanvas" aria-controls="shiftBulkUploadOffcanvas">
            <i class="bi bi-upload me-1"></i> Bulk Upload
        </button> -->
    </div>
</div>


<!-- ===== Department-wise breakdown (hidden by default) ===== -->
<div class="card-custom mb-3 p-3 ssh-hidden" id="deptBreakdownSection">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center gap-2">
            <div class="ssh-db-icon">
                <i class="bi bi-building"></i>
            </div>
            <div class="ssh-card-title">Department-wise Employee Count</div>
        </div>
        <button type="button" class="btn btn-sm ssh-btn-soft" id="closeDeptBreakdown"><i class="bi bi-x-lg me-1"></i>Close</button>
    </div>
    <div class="row g-2" id="deptBreakdown"></div>
</div>

<!-- ===== Filters card ===== -->
<div class="card-custom mb-3 filters-card">
    <div class="filters-toggle-row flex-wrap gap-2">
        <span class="fw-semibold ssh-strong-145">
            <i class="bi bi-funnel me-1"></i> Filter Schedule
        </span>
        <button type="button" class="filters-toggle-btn" id="toggleFiltersBtn">
            <span>Filters</span>
            <i class="bi bi-chevron-down chevron"></i>
        </button>
    </div>

    <div class="filters-collapse" id="filtersCollapse">
        <div class="row g-3" id="filtersForm">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label">Search Employee</label>
                <input type="text" class="form-control" placeholder="Name or ID" id="filterSearch" data-label="Search">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label">Shift Name</label>
                <select class="form-select select2" id="filterShift" data-label="Shift Name">
                    <option value="">All Shifts</option>
                    <!-- Shift options are generated from window.shiftScheduleShifts -->
                    <option value="unassigned">Not Assigned</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label">Shift Type</label>
                <select class="form-select select2" id="filterShiftType" data-label="Shift Type">
                    <option value="">All Types</option>
                    <option value="regular">Regular Shift</option>
                    <option value="overtime">Overtime Shift</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label">Department</label>
                <select class="form-select select2" id="filterDepartment" data-label="Department">
                    <option value="">All Departments</option>
                    <option>Developer</option>
                    <option>Branch Manager</option>
                    <option>Marketing</option>
                    <option>HR</option>
                    <option>Finance</option>
                    <option>Designer</option>
                    <option>Admin</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label">Position</label>
                <select class="form-select select2" id="filterPosition" data-label="Position">
                    <option value="">All Positions</option>
                    <option>OpenSource</option>
                    <option>Branch Manager</option>
                    <option>Windows</option>
                    <option>Marketing Executive</option>
                    <option>Backend</option>
                    <option>UI/UX</option>
                    <option>Frontend</option>
                    <option>Recruiter</option>
                    <option>DevOps</option>
                    <option>Accountant</option>
                    <option>Mobile</option>
                    <option>Content Writer</option>
                    <option>Full Stack</option>
                    <option>HR Manager</option>
                    <option>QA</option>
                    <option>Office Admin</option>
                    <option>ML Engineer</option>
                    <option>Graphic Design</option>
                    <option>Cloud</option>
                    <option>Digital Marketing</option>
                    <option>Java</option>
                    <option>Payroll Officer</option>
                    <option>Python</option>
                    <option>Payroll</option>
                    <option>React</option>
                    <option>Facilities</option>
                    <option>Node.js</option>
                    <option>Motion Design</option>
                    <option>Auditor</option>
                    <option>Angular</option>
                    <option>SEO Specialist</option>
                    <option>Flutter</option>
                    <option>Training</option>
                    <option>C++</option>
                    <option>Product Design</option>
                    <option>Spring Boot</option>
                    <option>Billing</option>
                    <option>Django</option>
                    <option>Vue.js</option>
                    <option>Go</option>
                    <option>Onboarding</option>
                    <option>Rust</option>
                    <option>Social Media</option>
                    <option>Kotlin</option>
                    <option>TypeScript</option>
                    <option>Receptionist</option>
                    <option>iOS</option>
                    <option>Brand Design</option>
                </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label">Schedule Type</label>
                <select class="form-select select2" id="filterScheduleType" data-label="Schedule Type">
                    <option value="">All Types</option>
                    <option value="permanent">Permanent</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="custom">Custom Range</option>
                </select>
            </div>
            <div class="col-12">
                <div class="align-self-end col-md-6 d-flex gap-2 flex-wrap">
                    <button type="button" class="btn btn-reject flex-fill text-nowrap flex-lg-grow-0" id="clearFiltersBtn">Clear Filters</button>
                    <button type="button" class="btn btn-primary flex-fill text-nowrap flex-lg-grow-0" id="applyFiltersBtn">
                        <i class="bi bi-funnel"></i> Apply Filters
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== Active Filters Bar (animated chips) ===== -->
<div class="active-filters-bar" id="activeFiltersBar">
    <span class="active-filters-label"><i class="bi bi-funnel-fill me-1"></i>Active Filters:</span>
    <div class="d-flex align-items-center gap-2">
        <div class="d-flex flex-wrap gap-2" id="activeFiltersList"></div>
        <button type="button" class="active-filters-clear text-decoration-underline" id="activeFiltersClearAll">Clear All</button>
    </div>
</div>



<div class="card-custom js-report-table p-0" id="shiftScheduleTableWrap" data-export-name="shift-schedule">
    <div class="card-head align-items-center justify-content-between flex-wrap gap-2 border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-calendar2-week"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Employee Shift Schedule</h3>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <div id="weekNavigatorWrap" class="d-flex align-items-center gap-1">
                <button type="button" class="btn btn-outline-secondary btn-sm ssh-week-btn" id="btnPrevWeek" title="Previous Week">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button type="button" class="btn btn-sm btn-light border fw-semibold ssh-week-btn-cur" id="btnCurrentWeek" title="Click to return to current week">
                    <i class="bi bi-calendar-week me-1 text-primary"></i> <span id="weekDisplayLabel">Current Week</span>
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm ssh-week-btn" id="btnNextWeek" title="Next Week (View Rotated Shifts)">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
            <div id="monthSelectorWrap" class="ssh-hidden">
                <!-- Options are generated from window.shiftScheduleMonthNames -->
                <select class="form-select form-select-sm ssh-month-select" id="monthSelector"></select>
            </div>
            <div class="view-toggle overflow-auto text-nowrap" role="group">
                <button type="button" class="view-toggle-btn" id="viewMonthlyBtn">
                    <i class="bi bi-calendar-month"></i>
                    <span>Monthly View</span>
                </button>
                <button type="button" class="view-toggle-btn active" id="viewWeeklyBtn">
                    <i class="bi bi-calendar-week"></i>
                    <span>Weekly View</span>
                </button>
                <div class="view-toggle-slider"></div>
            </div>
        </div>
    </div>

    <!-- Table (toolbar auto-created by datatable class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 shift-schedule-table stickyBlock datatable" id="shiftScheduleTable">
            <thead>
                <tr>
                    <th class="ssh-th-sno">S.No</th>
                    <th>Employee</th>
                    <th>Roles</th>
                    <th>Punch In Branch</th>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody id="pgBody"></tbody>
        </table>
    </div>

    <!-- Footer auto-created by master-table.js -->
</div>

<!-- ===== Assign Shift Modal (Department & Designation Wise + Multi-Part Split Flow) ===== -->
<div class="modal fade asf-modal" id="assignShiftModal" tabindex="-1" aria-labelledby="assignShiftModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content ssh-modal-asf">
            <!-- Modal Header -->
            <div class="modal-header py-3 px-4 ssh-modal-head">
                <div class="d-flex align-items-center gap-3">
                    <div class="ssh-modal-ico ssh-modal-ico-42">
                        <i class="bi bi-calendar2-check"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0 ssh-modal-title-16" id="assignShiftModalLabel">Assign Shift Schedule</h5>
                        <div class="text-muted ssh-fs-12">Department & Designation-wise shift assignment with multi-batch split flow</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4 ssh-modal-body">
                
                <!-- MULTI-STEP PROGRESS STEPPER HEADER -->
                <div class="asf-stepper-wrap">
                    <div class="asf-stepper-track">
                        <div class="asf-step-item active" data-step="1">
                            <div class="asf-step-circle">1</div>
                            <div class="asf-step-label">1. Staff & Department</div>
                        </div>
                        <div class="asf-step-line"></div>
                        <div class="asf-step-item" data-step="2">
                            <div class="asf-step-circle">2</div>
                            <div class="asf-step-label">2. Shift Parts & Batches</div>
                        </div>
                        <div class="asf-step-line"></div>
                        <div class="asf-step-item" data-step="3">
                            <div class="asf-step-circle">3</div>
                            <div class="asf-step-label">3. Frequency & Offs</div>
                        </div>
                        <div class="asf-step-line"></div>
                        <div class="asf-step-item" data-step="4">
                            <div class="asf-step-circle">4</div>
                            <div class="asf-step-label">4. Rotation Calendar</div>
                        </div>
                        <div class="asf-step-line"></div>
                        <div class="asf-step-item" data-step="5">
                            <div class="asf-step-circle">5</div>
                            <div class="asf-step-label">5. Review & Deploy</div>
                        </div>
                    </div>
                </div>

                <form id="assignShiftFlowForm" onsubmit="return false;">
                    
                    <!-- ========================================================
                         STEP PANEL 1: Department, Designation & Staff Allocation
                         ======================================================== -->
                    <div class="asf-step-panel active" id="asfStepPanel1">
                        <div class="card border-0 shadow-sm rounded-4 mb-3 p-4 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                <div class="asf-section-title mb-0">
                                    <span class="badge bg-primary text-white rounded-pill px-2 py-1 ssh-step-badge">Step 1 of 5</span>
                                    <span class="fs-6 fw-bold">Select Target Department & Employees</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge ssh-eligible-badge" id="asfEligibleBadge">
                                        <i class="bi bi-people-fill me-1"></i> <strong id="asfTotalEligible">0</strong> Employees Available
                                    </span>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Target Department <span class="text-danger">*</span></label>
                                    <select class="form-select ssh-select" id="asfDepartmentSelect">
                                        <option value="ALL">All Departments</option>
                                        <option value="Developer" selected>Developer</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="HR">HR</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Designer">Designer</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Branch Manager">Branch Manager</option>
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Designation / Position</label>
                                    <select class="form-select ssh-select" id="asfDesignationSelect">
                                        <option value="ALL">All Designations</option>
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Branch Location</label>
                                    <select class="form-select ssh-select" id="asfBranchSelect">
                                        <option value="ALL">All Branches</option>
                                        <option value="Gharuda Infotech">Gharuda Infotech</option>
                                        <option value="Gharuda IT Park">Gharuda IT Park</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Parts count and auto distribution tools -->
                            <div class="row g-3 mt-2 pt-3 border-top align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold d-block ssh-label">Divide Department into Parts / Batches:</label>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-outline-primary asf-parts-btn" data-parts="2">2 Parts</button>
                                        <button type="button" class="btn btn-primary asf-parts-btn active" data-parts="3">3 Parts (Morning, Evening, Night)</button>
                                        <button type="button" class="btn btn-outline-primary asf-parts-btn" data-parts="4">4 Parts</button>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <label class="form-label fw-semibold d-block text-md-end ssh-label">Distribution Helpers:</label>
                                    <div class="d-inline-flex gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-success py-1 px-2 ssh-mini-btn-8" id="asfBalanceGenderBtn" title="Evenly distribute male and female staff across batches">
                                            <i class="bi bi-gender-ambiguous me-1"></i> Balance Gender
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2 ssh-mini-btn-8" id="asfShuffleBtn" title="Randomize employee assignment">
                                            <i class="bi bi-shuffle me-1"></i> Shuffle
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2 ssh-mini-btn-8" id="asfSequentialBtn" title="Order by Employee ID">
                                            <i class="bi bi-sort-numeric-down me-1"></i> Sequential
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Target Employee summary bar & expand toggle -->
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-3 pt-3 border-top">
                                <div class="d-flex align-items-center gap-2 flex-wrap ssh-fs-12">
                                    <span class="text-muted fw-semibold">Allocated:</span>
                                    <span class="badge bg-light text-dark border px-2 py-1"><strong id="asfSelectedEmpCount">0</strong> Staff Selected</span>
                                    <span class="badge bg-light text-primary border px-2 py-1" id="asfBoysCount"><i class="bi bi-gender-male"></i> 0 Boys</span>
                                    <span class="badge bg-light text-danger border px-2 py-1" id="asfGirlsCount"><i class="bi bi-gender-female"></i> 0 Girls</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2 ssh-mini-btn-6" id="asfSelectAllBtn">Select All</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2 ssh-mini-btn-6" id="asfDeselectAllBtn">Clear</button>
                                    <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 ssh-mini-btn-6" id="asfToggleCustomizerBtn">
                                        <i class="bi bi-list-check me-1"></i> Custom Employee List <i class="bi bi-chevron-down ms-1" id="asfCustomizerChevron"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Collapsible custom employee picker -->
                            <div class="asf-emp-customizer" id="asfEmpCustomizer">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <input type="text" class="form-control form-control-sm ssh-input-search" id="asfEmpSearchInput">
                                    <span class="text-muted small">Check or uncheck employees to include / exclude:</span>
                                </div>
                                <div class="asf-emp-checkbox-grid" id="asfEmpCheckboxGrid"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ========================================================
                         STEP PANEL 2: Shift Parts & Cycle Order Mapping
                         ======================================================== -->
                    <div class="asf-step-panel" id="asfStepPanel2">
                        <div class="card border-0 shadow-sm rounded-4 mb-3 p-4 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                <div class="asf-section-title mb-0">
                                    <span class="badge bg-primary text-white rounded-pill px-2 py-1 ssh-step-badge">Step 2 of 5</span>
                                    <span class="fs-6 fw-bold">Map Shifts to Parts (Part 1: Morning, Part 2: Evening, Part 3: Night)</span>
                                </div>
                                <span class="badge bg-light text-primary border px-3 py-1 ssh-badge-115">
                                    <i class="bi bi-arrow-repeat me-1"></i> Rotates Weekly
                                </span>
                            </div>

                            <!-- Mode Selector Pills -->
                            <div class="d-flex gap-3 flex-md-row flex-column mb-3">
                                <div class="asf-mode-pill active" id="asfModeSplitPill" data-mode="split">
                                    <div class="asf-mode-icon">
                                        <i class="bi bi-pie-chart-fill"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark ssh-fs-13">Split into Batches (Multi-Shift Rotation)</div>
                                        <div class="text-muted ssh-muted-115">Separate employees into 3 parts to rotate Morning, Evening, Night</div>
                                    </div>
                                    <i class="bi bi-check-circle-fill text-primary ms-auto fs-5 asf-mode-check" id="asfSplitCheckIcon"></i>
                                </div>

                                <div class="asf-mode-pill" id="asfModeSinglePill" data-mode="single">
                                    <div class="asf-mode-icon">
                                        <i class="bi bi-person-check-fill"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark ssh-fs-13">Single Fixed Shift (All Staff)</div>
                                        <div class="text-muted ssh-muted-115">Assign the exact same shift to all employees without rotation</div>
                                    </div>
                                    <i class="bi bi-check-circle-fill text-primary ms-auto fs-5 asf-mode-check ssh-hidden" id="asfSingleCheckIcon"></i>
                                </div>
                            </div>

                            <!-- SPLIT SECTION: Dynamic Part Cards (Part 1: Morning, Part 2: Evening, Part 3: Night) -->
                            <div id="asfSplitConfigSection" class="pt-2">
                                <div class="row g-3" id="asfBatchCardsRow">
                                    <!-- Populated dynamically by JS -->
                                </div>
                            </div>

                            <!-- SINGLE SHIFT SECTION -->
                            <div id="asfSingleConfigSection" class="mt-3 pt-3 border-top ssh-hidden">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold ssh-label">Select Fixed Shift <span class="text-danger">*</span></label>
                                        <select class="form-select ssh-select" id="asfSingleShiftSelect">
                                            <option value="">Choose shift...</option>
                                            <!-- Enabled shifts are generated from window.shiftScheduleShifts -->
                                        </select>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end">
                                        <div id="asfSingleShiftTimingPreview" class="alert alert-light border w-100 mb-0 py-2 px-3 ssh-fs-125 ssh-hidden">
                                            <i class="bi bi-clock me-1 text-primary"></i> Timing: <strong id="asfSingleShiftTimingText">-</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ========================================================
                         STEP PANEL 3: Rotation Frequency, Duration & Off Days
                         ======================================================== -->
                    <div class="asf-step-panel" id="asfStepPanel3">
                        <div class="card border-0 shadow-sm rounded-4 mb-3 p-4 bg-white">
                            <div class="asf-section-title mb-3">
                                <span class="badge bg-primary text-white rounded-pill px-2 py-1 ssh-step-badge">Step 3 of 5</span>
                                <span class="fs-6 fw-bold">Rotation Frequency & Work Schedule Rules</span>
                            </div>

                            <div class="row g-3">
                                <div class="col-lg-7">
                                    <label class="form-label fw-semibold ssh-label">Schedule Duration Type</label>
                                    <div class="btn-group duration-options w-100 flex-wrap" role="group">
                                        <input type="radio" class="btn-check" name="asfDurationType" id="asf_dur_permanent" value="permanent" checked>
                                        <label class="btn btn-outline-primary btn-sm py-2" for="asf_dur_permanent">Permanent</label>

                                        <input type="radio" class="btn-check" name="asfDurationType" id="asf_dur_wed" value="wed_to_wed">
                                        <label class="btn btn-outline-warning text-dark btn-sm py-2 fw-bold ssh-border-amber" for="asf_dur_wed">
                                            <i class="bi bi-calendar-range me-1 text-warning"></i> Wed ➔ Wed (7 Days)
                                        </label>

                                        <input type="radio" class="btn-check" name="asfDurationType" id="asf_dur_week" value="week">
                                        <label class="btn btn-outline-primary btn-sm py-2" for="asf_dur_week">This Week</label>

                                        <input type="radio" class="btn-check" name="asfDurationType" id="asf_dur_month" value="month">
                                        <label class="btn btn-outline-primary btn-sm py-2" for="asf_dur_month">This Month</label>

                                        <input type="radio" class="btn-check" name="asfDurationType" id="asf_dur_custom" value="custom">
                                        <label class="btn btn-outline-primary btn-sm py-2" for="asf_dur_custom">Custom</label>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <label class="form-label fw-semibold ssh-label">Weekly Rotation Cycle Day (சுழற்சி தொடங்கும் நாள்)</label>
                                    <select class="form-select ssh-select fw-semibold" id="asfRotationAnchorDay">
                                        <option value="3" selected>Wednesday ➔ Next Wednesday (Wed to Wed Cycle) ★</option>
                                        <option value="1">Monday ➔ Next Monday (Mon to Mon Cycle)</option>
                                        <option value="0">Sunday ➔ Next Sunday (Sun to Sun Cycle)</option>
                                        <option value="2">Tuesday ➔ Next Tuesday</option>
                                        <option value="4">Thursday ➔ Next Thursday</option>
                                        <option value="5">Friday ➔ Next Friday</option>
                                        <option value="6">Saturday ➔ Next Saturday</option>
                                    </select>
                                    <div class="form-text text-muted ssh-fs-11">
                                        <i class="bi bi-arrow-repeat text-warning"></i> Shifts automatically advance to the next shift on this day every week.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold ssh-label">Working Days & Week-Off Pattern</label>
                                    <select class="form-select ssh-select" id="asfWorkingDaysPattern">
                                        <option value="mon-sat" selected>Mon – Sat (Sunday Week-Off)</option>
                                        <option value="mon-fri">Mon – Fri (Saturday & Sunday Week-Off)</option>
                                        <option value="all-7">All 7 Days (Sun – Sat Continuous)</option>
                                    </select>
                                </div>

                                <!-- Custom Date Range Picker Row -->
                                <div class="col-12 ssh-hidden" id="asfCustomRangeRow">
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold">Effective From</label>
                                            <div class="date-picker">
                                                <input type="text" class="date-input form-control form-control-sm ssh-input-r8" id="asfCustomDateFrom">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold">Effective To</label>
                                            <div class="date-picker">
                                                <input type="text" class="date-input form-control form-control-sm ssh-input-r8" id="asfCustomDateTo">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Duration preview note -->
                                <div class="col-12">
                                    <div class="alert alert-primary py-2 px-3 mb-0 small" id="asfDurationPreviewAlert">
                                        <i class="bi bi-infinity me-1"></i> Shift starts from <strong id="asfDurationFromText">Today</strong> and rotates weekly in effect permanently until updated.
                                    </div>
                                </div>

                                <!-- Rotation Interval Highlights -->
                                <div class="col-12">
                                    <div class="p-3 rounded-3 border d-flex align-items-center justify-content-between flex-wrap gap-2 ssh-trigger-highlight" id="asfRotationTriggerHighlight">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-arrow-repeat text-warning fs-4"></i>
                                            <div>
                                                <div class="fw-bold text-dark ssh-fs-125" id="asfRotationTriggerTitle">Automatic Rotation Trigger: Every Wednesday 00:00 AM</div>
                                                <div class="text-muted ssh-muted-115" id="asfRotationTriggerDesc">System automatically advances shift assignments at the start of each Wednesday without manual reconfiguration.</div>
                                            </div>
                                        </div>
                                        <span class="badge bg-warning text-dark border border-warning-subtle rounded-pill px-3 py-1" id="asfRotationTriggerBadge">Wed ➔ Wed Cycle</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ========================================================
                         STEP PANEL 4: 4-Week Rotation Matrix & Calendar Preview
                         ======================================================== -->
                    <div class="asf-step-panel" id="asfStepPanel4">
                        <div class="card border-0 shadow-sm rounded-4 mb-3 p-4 bg-white">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                                <div class="asf-section-title mb-0">
                                    <span class="badge bg-primary text-white rounded-pill px-2 py-1 ssh-step-badge">Step 4 of 5</span>
                                    <span class="fs-6 fw-bold">Live Weekly Rotation Calendar Preview Matrix</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="form-check form-switch mb-0">
                                        <input class="form-check-input ssh-switch" type="checkbox" id="asfEnableRotationSwitch" checked>
                                        <label class="form-check-label fw-bold text-dark ms-1 ssh-fs-13 ssh-pointer" for="asfEnableRotationSwitch">
                                            Auto Weekly Shift Rotation
                                        </label>
                                    </div>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-1 ssh-fs-11" id="asfRotationStatusBadge">
                                        <i class="bi bi-arrow-clockwise me-1"></i>Rotating Weekly
                                    </span>
                                </div>
                            </div>

                            <p class="text-muted mb-3 ssh-fs-12">
                                This matrix demonstrates how employees in each batch rotate between morning, evening, and night shifts across future weeks:
                            </p>

                            <!-- 4-WEEK ROTATION PREVIEW TIMELINE TABLE -->
                            <div class="bg-white rounded-3 border p-2 overflow-auto" id="asfRotationTimelineWrap">
                                <table class="table table-bordered mb-0 align-middle text-center asf-rotation-timeline-table" id="asfRotationTimelineTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-start ssh-th-batch">Batch / Part</th>
                                            <th>Week 1 <span class="fw-normal text-muted">(Current Week)</span></th>
                                            <th>Week 2 <span class="fw-normal text-muted">(+1 Wk)</span></th>
                                            <th>Week 3 <span class="fw-normal text-muted">(+2 Wks)</span></th>
                                            <th>Week 4 <span class="fw-normal text-muted">(Repeats)</span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="asfRotationTimelineBody">
                                        <!-- Dynamically generated by JS -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="alert alert-light border mt-3 mb-0 p-3 small d-flex align-items-center gap-2">
                                <i class="bi bi-info-circle-fill text-primary fs-5"></i>
                                <div>
                                    <strong>How it works:</strong> Part 1 starts in Morning Shift, then shifts to Evening in Week 2, then Night in Week 3, and loops back to Morning in Week 4. All parts rotate in lockstep, guaranteeing balanced 24x7 coverage!
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ========================================================
                         STEP PANEL 5: Review Summary & Deploy
                         ======================================================== -->
                    <div class="asf-step-panel" id="asfStepPanel5">
                        <div class="card border-0 shadow-sm rounded-4 mb-3 p-4 bg-white">
                            <div class="asf-section-title mb-3">
                                <span class="badge bg-success text-white rounded-pill px-2 py-1 ssh-step-badge">Step 5 of 5</span>
                                <span class="fs-6 fw-bold">Review Allocation & Deploy Rotational Shift Schedule</span>
                            </div>

                            <!-- Remarks -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold ssh-label">Schedule Remarks / Allocation Note <span class="text-muted fw-normal">(Optional)</span></label>
                                <input type="text" class="form-control ssh-input-r10" id="asfRemarksInput">
                            </div>

                            <!-- LIVE ALLOCATION SUMMARY BANNER -->
                            <div class="alert alert-success border-0 shadow-sm rounded-4 p-4 mb-0 ssh-summary-banner" id="asfLiveSummaryBanner">
                                <div class="d-flex align-items-center gap-2 fw-bold mb-2 fs-6">
                                    <i class="bi bi-check2-circle fs-4 text-success"></i>
                                    <span>Deployment Summary Ready</span>
                                </div>
                                <div id="asfLiveSummaryText" class="ssh-summary-text">
                                    <!-- Dynamically populated summary text -->
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Modal Footer with Stepper Controls -->
            <div class="modal-footer py-3 px-4 bg-white border-top d-flex align-items-center justify-content-between mt-auto">
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-outline-secondary px-3 ssh-btn-outline-sm2 ssh-hidden" id="asfPrevStepBtn">
                        <i class="bi bi-chevron-left me-1"></i> Previous Step
                    </button>
                    <span class="badge bg-light text-dark border px-3 py-2 ssh-fs-12" id="asfStepBadge">
                        Step 1 of 5: Select Department & Staff
                    </span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-light px-3 ssh-btn-outline-sm2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary px-4 ssh-btn-primary-sm" id="asfNextStepBtn">
                        Next Step <i class="bi bi-chevron-right ms-1"></i>
                    </button>
                    <button type="button" class="btn btn-success px-4 ssh-btn-success-sm ssh-hidden" id="asfConfirmAssignBtn">
                        <i class="bi bi-check-circle-fill me-1"></i> Deploy Rotational Shifts
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== 2. Shift Schedule Modal (Schedule Name, Type, Duration, Rotation Pattern, Week-Off & Calendar) ===== -->
<div class="modal fade" id="shiftScheduleConfigModal" tabindex="-1" aria-labelledby="shiftScheduleConfigModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content ssh-modal-config">
            
            <!-- Modal Header -->
            <div class="modal-header py-3 px-4 ssh-modal-head">
                <div class="d-flex align-items-center gap-3">
                    <div class="ssh-modal-ico ssh-modal-ico-44">
                        <i class="bi bi-calendar2-range-fill"></i>
                    </div>
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <h5 class="modal-title fw-bold text-dark mb-0 ssh-modal-title-17" id="shiftScheduleConfigModalLabel">
                                Shift Schedule
                            </h5>
                        </div>
                        
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4 ssh-modal-body-lg">
                <form id="shiftScheduleConfigForm" onsubmit="return false;">

                    <!-- Scope (Department & Employee Selection) -->
                    <div class="ssm-card">
                        <div class="ssm-sec-head">
                            <div class="ssm-sec-head-left">
                                <span class="ssm-sec-icon"><i class="bi bi-people-fill"></i></span>
                                <span class="ssm-sec-title">Scope<small>(Department or By Employee Name)</small></span>
                            </div>
                            <!-- Scope Type Switcher -->
                            <div class="btn-group btn-group-sm" role="group" id="ssmScopeModeGroup">
                                <button type="button" class="btn btn-primary active ssm-scope-mode-btn ssh-scope-btn-l" data-mode="department" id="ssmScopeDeptBtn">
                                    <i class="bi bi-building me-1"></i> By Department
                                </button>
                                <button type="button" class="btn btn-outline-primary ssm-scope-mode-btn ssh-scope-btn-r" data-mode="employee" id="ssmScopeEmpBtn">
                                    <i class="bi bi-person-check-fill me-1"></i> By Employee Name
                                </button>
                            </div>
                        </div>

                        <!-- 1. BY DEPARTMENT VIEW -->
                        <div id="ssmScopeDeptView">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Department</label>
                                    <select class="form-select ssh-select" id="ssmDepartmentSelect">
                                        <option value="ALL">All Departments</option>
                                        <option value="Developer" selected>Developer</option>
                                        <option value="Branch Manager">Branch Manager</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="HR">HR</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Designer">Designer</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Designation</label>
                                    <select class="form-select ssh-select" id="ssmDesignationSelect">
                                        <option value="ALL" selected>All Designations</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- 2. BY EMPLOYEE NAME VIEW -->
                        <div id="ssmScopeEmpView" class="d-none">
                            <div class="row g-2 align-items-center mb-2">
                                <div class="col-md-7 col-12">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-white border-end-0 ssh-input-group-l8">
                                            <i class="bi bi-search text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0 ssh-input-group-r8" id="ssmEmpSearchInput">
                                    </div>
                                </div>
                                <div class="col-md-5 col-12 text-md-end">
                                    <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2 ssh-mini-btn-11-6" id="ssmSelectAllEmpsBtn">Select All</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary py-1 px-2 ssh-mini-btn-11-6" id="ssmDeselectAllEmpsBtn">Clear All</button>
                                </div>
                            </div>

                            <!-- Interactive Employee List Box -->
                            <div class="border rounded-3 p-2 bg-white ssh-emp-list" id="ssmEmpListContainer">
                                <!-- Populated dynamically with employee name cards and checkboxes -->
                            </div>
                        </div>

                        <!-- Target Employees Summary Bar -->
                        <div class="mt-3">
                            <div class="d-flex align-items-center justify-content-between p-2 px-3 rounded-3 bg-light border">
                                <div class="d-flex align-items-center gap-2 ssh-fs-12">
                                    <i class="bi bi-people-fill text-primary fs-5"></i>
                                    <span class="text-muted">Target Employees:</span>
                                    <span class="badge bg-primary text-white" id="ssmSelectedEmpBadge">0 Employees Included</span>
                                </div>
                                <div class="small text-muted" id="ssmScopeInfoText">Applies to all eligible staff in selected department</div>
                            </div>
                        </div>
                    </div>

                    <!-- Schedule Type (week / month / permanent / custom range) -->
                    <div class="ssm-card">
                        <div class="ssm-sec-head">
                            <div class="ssm-sec-head-left">
                                <span class="ssm-sec-icon is-blue"><i class="bi bi-calendar-week-fill"></i></span>
                                <span class="ssm-sec-title">Schedule Type</span>
                            </div>
                            <span class="badge bg-light text-primary border ssh-fs-11" id="ssmSelectedTypeBadge">Week Selected</span>
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-3 col-sm-6">
                                <div class="ssm-type-option active" data-type="week" id="ssmTypeWeek">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-calendar-week text-primary fs-5"></i>
                                            <span class="fw-bold ssh-fs-13">Week</span>
                                        </div>
                                        <i class="bi bi-check-circle-fill text-primary ssm-type-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ssm-type-option" data-type="month" id="ssmTypeMonth">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-calendar-month text-info fs-5"></i>
                                            <span class="fw-bold ssh-fs-13">Month</span>
                                        </div>
                                        <i class="bi bi-check-circle-fill text-info d-none ssm-type-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ssm-type-option" data-type="permanent" id="ssmTypePermanent">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-infinity text-success fs-5"></i>
                                            <span class="fw-bold ssh-fs-13">Permanent</span>
                                        </div>
                                        <i class="bi bi-check-circle-fill text-success d-none ssm-type-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ssm-type-option" data-type="custom" id="ssmTypeCustom">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-calendar-range text-warning fs-5"></i>
                                            <span class="fw-bold ssh-fs-13">Custom Range</span>
                                        </div>
                                        <i class="bi bi-check-circle-fill text-warning d-none ssm-type-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Effective From & To (Condition-based Display) -->
                    <div class="ssm-card" id="ssmEffectiveDatesCard">
                        <div class="ssm-sec-head">
                            <div class="ssm-sec-head-left">
                                <span class="ssm-sec-icon is-amber"><i class="bi bi-calendar-check-fill"></i></span>
                                <span class="ssm-sec-title">Effective From &amp; To</span>
                            </div>
                        </div>

                        <!-- 1. Condition: WEEK -->
                        <div class="ssm-duration-condition-block" id="ssmConditionWeek">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Week Starts From <span class="text-danger">*</span></label>
                                    <div class="date-picker">
                                        <input type="text" class="date-input form-control ssh-input-r10" id="ssmWeekFrom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Week Ends On (7 Days)</label>
                                    <div class="date-picker">
                                        <input type="text" class="date-input form-control bg-light ssh-input-r10" id="ssmWeekTo">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="alert alert-light border mb-0 py-2 px-3 small d-flex align-items-center gap-2 ssh-bg-slate">
                                        <i class="bi bi-calendar-week text-primary fs-5"></i>
                                        <span id="ssmWeekAlertText">Weekly 7-Day Cycle: Wednesday to next Wednesday. Shift rotation automatically advances every week.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Condition: MONTH -->
                        <div class="ssm-duration-condition-block d-none" id="ssmConditionMonth">
                            <div class="row g-3 align-items-center">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label fw-semibold ssh-label">Select Month <span class="text-danger">*</span></label>
                                    <div class="date-picker">
                                        <input type="text" class="date-input form-control" id="ssmMonthPicker" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label fw-semibold ssh-label">Month Start Date (From)</label>
                                    <div class="date-picker">
                                        <input type="text" class="date-input form-control bg-light" id="ssmMonthFrom" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label fw-semibold ssh-label">Month End Date (To)</label>
                                    <div class="date-picker">
                                        <input type="text" class="date-input form-control bg-light" id="ssmMonthTo" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                        <div class="d-flex gap-1">
                                            <button type="button" class="btn btn-sm btn-outline-info ssm-month-preset-btn ssh-month-preset-btn fw-bold active" data-preset="current_month">Current Month</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary ssm-month-preset-btn ssh-month-preset-btn" data-preset="next_month">Next Month</button>
                                        </div>
                                        <span class="text-muted small ssh-fs-11"><i class="bi bi-info-circle me-1"></i>Full calendar month coverage</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="alert alert-light border mb-0 py-2 px-3 small d-flex align-items-center gap-2 ssh-month-note-info">
                                        <i class="bi bi-calendar-month text-info fs-5"></i>
                                        <span id="ssmMonthAlertText">Monthly Schedule: Active from 1st of month to end of month with structured weekly rotations.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Condition: PERMANENT -->
                        <div class="ssm-duration-condition-block d-none" id="ssmConditionPermanent">
                            <div class="row g-3 align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Effective From (Start Date) <span class="text-danger">*</span></label>
                                    <div class="date-picker">
                                        <input type="text" class="date-input form-control" id="ssmPermFrom" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Effective To (End Date)</label>
                                    <div class="p-2 px-3 rounded-2 border d-flex align-items-center justify-content-between bg-success bg-opacity-10 text-success fw-bold ssh-perm-strip">
                                        <div class="d-flex align-items-center gap-2 ssh-fs-125">
                                            <i class="bi bi-infinity fs-5 text-success"></i>
                                            <span>Ongoing / Permanent (No End Date)</span>
                                        </div>
                                        <span class="badge bg-success text-white ssh-fs-10">Active Continuously</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="alert alert-light border mb-0 py-2 px-3 small d-flex align-items-center gap-2 ssh-month-note-green">
                                        <i class="bi bi-shield-check text-success fs-5"></i>
                                        <span>Permanent Schedule: Active indefinitely. Rotational shifts cycle automatically week over week without requiring periodic renewal.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Condition: CUSTOM RANGE -->
                        <div class="ssm-duration-condition-block d-none" id="ssmConditionCustom">
                            <div class="row g-3 align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Effective From <span class="text-danger">*</span></label>
                                    <div class="date-picker">
                                        <input type="text" class="date-input form-control" id="ssmCustomFrom" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label fw-semibold ssh-label">Effective To <span class="text-danger">*</span></label>
                                    <div class="date-picker">
                                        <input type="text" class="date-input form-control" id="ssmCustomTo" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="alert alert-light border mb-0 py-2 px-3 small d-flex align-items-center gap-2 ssh-month-note-amber">
                                        <i class="bi bi-calendar-range text-warning fs-5"></i>
                                        <span id="ssmCustomAlertText">Custom Range: Shifts apply strictly within the selected start and end dates.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden inputs to keep backward compatibility with applySsmSchedule and any external callers -->
                        <input type="hidden" id="ssmEffectiveFrom">
                        <input type="hidden" id="ssmEffectiveTo">
                    </div>

                    <!-- Shift Rotation Pattern -->
                    <div class="ssm-card">
                        <div class="ssm-sec-head">
                            <div class="ssm-sec-head-left">
                                <span class="ssm-sec-icon"><i class="bi bi-arrow-repeat"></i></span>
                                <span class="ssm-sec-title">Shift Rotation Pattern</span>
                            </div>
                            <!-- Rotation Mode Toggle (Rotation vs Fixed Single Shift) -->
                            <div class="btn-group btn-group-sm" role="group" id="ssmRotationModeGroup">
                                <button type="button" class="btn btn-primary active ssm-rot-mode-btn ssh-rot-btn-l" data-mode="rotation" id="ssmModeRotationBtn">
                                    <i class="bi bi-arrow-repeat me-1"></i> Rotational Shift
                                </button>
                                <button type="button" class="btn btn-outline-primary ssm-rot-mode-btn ssh-rot-btn-r" data-mode="fixed" id="ssmModeFixedBtn">
                                    <i class="bi bi-check2-circle me-1"></i> Fixed Shift (No Rotation)
                                </button>
                            </div>
                        </div>

                        <!-- 1. FLOW A: ROTATIONAL SHIFT (Enabled by default) -->
                        <div id="ssmRotationFlowWrap">
                            <div class="row g-3">
                                <div class="col-md-6 col-12">
                                    <label class="form-label fw-semibold ssh-label">Divide Staff Into Batches</label>
                                    <div class="btn-group btn-group-sm w-100" role="group">
                                        <button type="button" class="btn btn-outline-primary ssm-batch-btn" data-batches="2">2 Parts</button>
                                        <button type="button" class="btn btn-primary ssm-batch-btn active" data-batches="3">3 Parts</button>
                                        <button type="button" class="btn btn-outline-primary ssm-batch-btn" data-batches="4">4 Parts</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-semibold text-muted mb-2">Shift Cycle Order & Timing Mapping:</label>
                                    <div class="row g-2" id="ssmShiftCycleCardsRow">
                                        <!-- Dynamic batch mapping cards -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. FLOW B: FIXED SINGLE SHIFT (Same shift for all days) -->
                        <div id="ssmFixedShiftFlowWrap" class="d-none">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold ssh-label">
                                        Select Single Shift to Assign <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select ssh-select fw-semibold" id="ssmFixedShiftSelect">
                                        <!-- Populated dynamically with shifts -->
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="alert alert-light border mb-0 py-2 px-3 small d-flex align-items-center gap-2 ssh-month-note-slate">
                                        <i class="bi bi-info-circle-fill text-primary fs-5"></i>
                                        <span><strong>Fixed Shift Mode:</strong> All selected staff will work the same shift continuously without weekly rotation.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Schedule Calendar -->
                    <div class="ssm-card mb-0">
                        <div class="ssm-sec-head">
                            <div class="ssm-sec-head-left">
                                <span class="ssm-sec-icon is-violet"><i class="bi bi-table"></i></span>
                                <span class="ssm-sec-title">Schedule Calendar<small>(Live Schedule Preview Matrix)</small></span>
                            </div>
                        </div>
                        <div class="table-responsive rounded-3 border bg-white p-2">
                            <table class="table table-bordered mb-0 ssm-cal-table" id="ssmCalendarPreviewTable">
                                <thead id="ssmCalendarPreviewHead">
                                    <!-- Dynamic header rendered by JS -->
                                </thead>
                                <tbody id="ssmCalendarPreviewBody">
                                    <!-- Dynamic body rendered by JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer py-3 px-4 bg-white border-top d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <!-- <button type="button" class="btn btn-outline-secondary px-3 ssh-btn-outline-sm2" id="ssmSaveDraftBtn">
                        <i class="bi bi-bookmark me-1"></i> Save as Draft Template
                    </button>
                    <span class="text-muted small" id="ssmFooterStatusText">Ready to deploy schedule</span> -->
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-light px-3 ssh-btn-outline-sm2" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success px-4 ssh-btn-success-lg" id="ssmDeployScheduleBtn">
                        <i class="bi bi-check-circle-fill me-1"></i> Save & Apply Shift Schedule
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ===== Shift Change Request Modal (opens on shift-badge click) ===== -->
<div class="modal fade" id="shiftChangeModal" tabindex="-1" aria-labelledby="shiftChangeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content ssh-modal-scr">
            <style>
                #shiftChangeModal .modal-body {
                    flex: 1 1 auto;
                    min-height: 0;
                    overflow-y: auto;
                }

                #shiftChangeModal .modal-header,
                #shiftChangeModal .modal-footer {
                    flex: 0 0 auto;
                }

                #shiftChangeModal .modal-dialog-scrollable .modal-body {
                    overflow-y: auto;
                }

                /* Date-range calendar popup: modal-body oda overflow-la clip aagama,
                   screen center-la floating-a kaattum (JS andha popup-ku class add pannum) */
                #shiftChangeModal .scr-dp-float {
                    position: fixed !important;
                    top: 50% !important;
                    left: 50% !important;
                    right: auto !important;
                    bottom: auto !important;
                    transform: translate(-50%, -50%) !important;
                    margin: 0 !important;
                    width: max-content !important;
                    max-width: calc(100vw - 24px) !important;
                    max-height: calc(100vh - 24px) !important;
                    overflow: auto;
                    z-index: 2000;
                    box-shadow: 0 12px 40px rgba(20, 20, 43, .25);
                }

                /* select2 boxes popup-ku mela varaama: popup open-a irukkumbodhu
                   date-range wrap-oda stacking level-a select2-vida mela thookurom */
                #shiftChangeModal #scrRangeWrap { position: relative; }
                #shiftChangeModal #scrRangeWrap.scr-range-open { z-index: 9999; }
            </style>
            <div class="modal-header">
                <h5 class="modal-title" id="shiftChangeModalLabel">
                    <i class="bi bi-arrow-left-right me-1 ssh-ic-primary"></i> Shift Change Request
                </h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>

            <div class="modal-body">
                <!-- ---------- FORM VIEW ---------- -->
                <form id="shiftChangeForm" onsubmit="return false;">

                    <div class="scr-emp-card mb-3">
                        <img id="scrEmpAvatar" src="./assets/img/profile-1.jpg" alt="">
                        <div class="min-w-0">
                            <div class="scr-emp-name" id="scrEmpName">-</div>
                            <div class="scr-emp-meta" id="scrEmpMeta">-</div>
                        </div>
                        <div class="scr-day-chip">
                            <div class="scr-day" id="scrDayName">-</div>
                            <div class="scr-date" id="scrDayDate">-</div>
                        </div>
                    </div>

                    <div class="scr-shift-compare mb-3">
                        <div class="scr-shift-box current">
                            <div class="scr-box-label">Current Shift</div>
                            <div class="scr-box-name" id="scrCurrentShiftName">-</div>
                            <div class="scr-box-time" id="scrCurrentShiftTime">-</div>
                        </div>
                        <div class="scr-arrow"><i class="bi bi-arrow-right"></i></div>
                        <div class="scr-shift-box requested">
                            <div class="scr-box-label">Requested Shift</div>
                            <div class="scr-box-name" id="scrNewShiftName">Not selected</div>
                            <div class="scr-box-time" id="scrNewShiftTime">-</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="scr_new_shift">Change To <span class="text-danger">*</span></label>
                        <select class="form-select" id="scr_new_shift">
                            <option value="">Select the shift you want</option>
                        </select>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="scr_reason">Reason <span class="text-danger">*</span></label>
                            <select class="form-select" id="scr_reason">
                                <option value="">Select reason</option>
                                <option value="Personal">Personal</option>
                                <option value="Medical">Medical</option>
                                <option value="Travel / Commute">Travel / Commute</option>
                                <option value="Swap with colleague">Swap with colleague</option>
                                <option value="Family emergency">Family emergency</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="scr_apply_scope">Apply For</label>
                            <select class="form-select" id="scr_apply_scope">
                                <option value="day">This day only</option>
                                <!-- <option value="week">Full week</option> -->
                                <option value="month">Rest of the month</option>
                                <option value="date_range">Select Date Range</option>
                            </select>
                            <div class="scr-scope-hint" id="scrScopeHint"></div>
                        </div>
                    </div>

                    <!-- Date range picker: "Select Date Range" choose panna mattum theriyum -->
                    <div class="mb-3 ssh-hidden" id="scrRangeWrap">
                        <label class="form-label" for="scr_custom_range">Select Date Range <span class="text-danger">*</span></label>
                        <div class="date-picker date-range-picker bottom-0">
                            <input type="text" class="date-input form-control" id="scr_custom_range" placeholder="DD-MM-YYYY to DD-MM-YYYY" autocomplete="off" />
                        </div>
                    </div>

                    <div class="mb-3 ssh-hidden" id="scrSwapWrap">
                        <label class="form-label" for="scr_swap_with">Swap With</label>
                        <select class="form-select" id="scr_swap_with">
                            <option value="">Select colleague</option>
                        </select>
                        <div class="text-muted ssh-note">
                            <i class="bi bi-info-circle me-1"></i>Your colleague will also receive a confirmation notification.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="scr_remarks">Remarks <span class="text-muted">(optional)</span></label>
                        <textarea class="form-control" id="scr_remarks" rows="2" maxlength="250" placeholder="e.g. I have an evening class, need the morning shift"></textarea>
                        <div class="text-muted text-end ssh-remark-count"><span id="scrRemarkCount">0</span>/250</div>
                    </div>

                    <div class="mb-1">
                        <label class="form-label">Approval goes to</label>
                        <div class="scr-manager-card">
                            <img id="scrMgrAvatar" src="./assets/img/profile-3.jpg" alt="">
                            <div>
                                <div class="scr-mgr-name" id="scrMgrName">-</div>
                                <div class="scr-mgr-role" id="scrMgrRole">-</div>
                            </div>
                            <span class="scr-mgr-tag"><i class="bi bi-shield-check me-1"></i>Approver</span>
                        </div>
                    </div>
                </form>

                <!-- ---------- SUCCESS VIEW ---------- -->
                <div id="scrSuccessView">
                    <div class="scr-success-icon"><i class="bi bi-send-check"></i></div>
                    <h5 class="fw-bold mb-1 ssh-title-16">Request sent to manager</h5>
                    <p class="text-muted mb-3 ssh-fs-125">
                        The schedule will be updated as soon as the manager approves.
                    </p>
                    <div class="scr-req-id" id="scrSuccessReqId">SCR-0000</div>

                    <div class="scr-timeline">
                        <div class="scr-step done">
                            <div class="scr-dot"><i class="bi bi-check-lg"></i></div>
                            <div class="scr-step-title">Request submitted</div>
                            <div class="scr-step-sub" id="scrStepSubmitted">-</div>
                        </div>
                        <div class="scr-step active">
                            <div class="scr-dot"><i class="bi bi-hourglass-split"></i></div>
                            <div class="scr-step-title">Pending with manager</div>
                            <div class="scr-step-sub" id="scrStepManager">-</div>
                        </div>
                        <div class="scr-step">
                            <div class="scr-dot"><i class="bi bi-calendar2-check"></i></div>
                            <div class="scr-step-title">Schedule updated</div>
                            <div class="scr-step-sub">Updates automatically once approved</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer ssh-modal-footer-inherit">
                <button type="button" class="btn btn-primary" id="scrSubmitBtn">
                    <i class="bi bi-send me-1"></i> Send Request
                </button>
                <button type="button" class="btn btn-secondary" id="scrCancelBtn" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary ssh-hidden" id="scrDoneBtn" data-bs-dismiss="modal">
                    <i class="bi bi-check-lg me-1"></i> Done
                </button>
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
                    <i class="bi bi-x-circle me-1 ssh-ic-danger"></i> Request Rejected
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
                        <div class="scr-day" id="scrViewRejReqId">-</div>
                        <div class="scr-date" id="scrViewRejDate">-</div>
                    </div>
                </div>

                <div class="scr-shift-compare mb-3">
                    <div class="scr-shift-box current">
                        <div class="scr-box-label">Current Shift</div>
                        <div class="scr-box-name" id="scrViewRejFromShift">-</div>
                    </div>
                    <div class="scr-arrow"><i class="bi bi-arrow-right"></i></div>
                    <div class="scr-shift-box ssh-scr-box-bad">
                        <div class="scr-box-label ssh-scr-box-label-bad">Requested Shift</div>
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
                    <i class="bi bi-x-circle me-1 ssh-ic-danger"></i> Reject Shift Change Request
                </h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div class="scr-reject-emp-line mb-3" id="scrRejectEmpLine">-</div>
                <div class="mb-1">
                    <label class="form-label" for="scr_reject_reason">Reason for rejection <span class="text-muted">(optional, visible to the employee)</span></label>
                    <textarea class="form-control" id="scr_reject_reason" rows="3" maxlength="200" placeholder="e.g. No coverage for that shift, please wait some time"></textarea>
                    <div class="text-muted text-end ssh-remark-count"><span id="scrRejectRemarkCount">0</span>/200</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger ssh-btn-danger-flat" id="scrRejectConfirmBtn">
                    <i class="bi bi-x-lg me-1"></i> Confirm Reject
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Shift Change Requests — fullscreen modal ===== -->
<div class="modal fade" id="scrRequestsModal" tabindex="-1" aria-labelledby="scrRequestsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-chip"><i class="bi bi-arrow-left-right"></i></div>
                    <div>
                        <h5 class="modal-title mb-0" id="scrRequestsModalLabel">Shift Change Requests</h5>
                        <div class="text-muted ssh-muted-115-600">
                            <span id="scrPendingCount">0</span> pending with manager
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap ms-auto">
                    <div class="scr-view-toggle" id="scrViewToggle" role="group" aria-label="Switch view">
                        <button type="button" class="scr-view-btn active" data-role="employee">
                            <i class="bi bi-person"></i> Employee View
                        </button>
                        <button type="button" class="scr-view-btn" data-role="manager">
                            <i class="bi bi-shield-check"></i> Manager View
                        </button>
                    </div>
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
            </div>
            <div class="scr-manager-banner" id="scrManagerBanner">
                <i class="bi bi-info-circle-fill"></i>
                Manager View — Approve or Reject pending requests. This is demo mode and shows all pending requests.
            </div>
            <div class="modal-body">
                <div class="scr-requests-table-wrap table-responsive table-modern-wrap overflow-auto">
                    <table class="table-modern w-100">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Request ID</th>
                                <th class="text-nowrap">Employee</th>
                                <th class="text-nowrap">Day</th>
                                <th class="text-nowrap">Shift Change</th>
                                <th class="text-nowrap">Reason</th>
                                <th class="text-nowrap">Approver</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody id="scrRequestsBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="scr-toast-wrap" id="scrToastWrap"></div>

<!-- ===== Bulk Upload Offcanvas ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="shiftBulkUploadOffcanvas" aria-labelledby="shiftBulkUploadTitle">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="shiftBulkUploadTitle"><i class="bi bi-upload me-2 ssh-ic-primary"></i> Bulk Upload Shift Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="shift-bulk-dropzone" id="shiftBulkDropzone">
            <div class="mode-icon"><i class="bi bi-cloud-arrow-up"></i></div>
            <h6>Upload shift schedule spreadsheet</h6>
            <p>Drop your Excel or CSV file here, or <span class="browse-link">browse</span>.</p>
            <div class="text-muted ssh-fs-11">Supports .xlsx, .xls, .csv (Max 5MB)</div>
        </div>
        <div class="shift-upload-file" id="shiftUploadFile">
            <i class="bi bi-file-earmark-excel"></i>
            <span id="shiftUploadFileName"></span>
            <button type="button" class="shift-upload-remove" id="shiftUploadRemove" title="Remove file"><i class="bi bi-x-lg"></i></button>
        </div>
        <div class="shift-upload-count" id="shiftUploadCount">
            <span><i class="bi bi-people me-1"></i> Rows detected</span>
            <strong id="shiftUploadRowCount">0</strong>
        </div>
        <div class="shift-upload-preview" id="shiftUploadPreview">
            <table class="table table-sm table-bordered mb-0">
                <thead id="shiftPreviewHead"></thead>
                <tbody id="shiftPreviewBody"></tbody>
            </table>
        </div>
        <input type="file" id="shiftBulkInput" accept=".xlsx,.xls,.csv" hidden>
    </div>
    <div class="offcanvas-footer p-3 border-top d-flex justify-content-end ssh-offcanvas-footer">
        <button type="button" class="btn btn-reject" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmShiftBulkUpload" disabled><i class="bi bi-check-lg me-1"></i> Confirm Upload</button>
    </div>
</div>

<?php include 'footer.php'; ?>



 



<script src="./assets/js/pages/shift-shedule.js?v=<?php echo time(); ?>"></script>
