<?php include 'header.php'; ?>

 
 

<style>
    /* Punch Report table */
    .punch-table .date-col-header {
        text-align: center;
        white-space: nowrap;
        min-width: 110px;
    }

    .punch-table .date-col-header .date-label {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-900, #201a14);
    }

    .punch-table .date-col-header .day-label {
        font-size: 10.5px;
        font-weight: 600;
        color: var(--ink-500, #6b7684);
        margin-top: 1px;
    }

    .punch-table .punch-cell {
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
    }

    .punch-table .punch-cell:hover {
        background: #f6f9f7;
    }

    .punch-table .punch-cell .punch-time {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: var(--ink-900, #201a14);
        line-height: 1.6;
        text-decoration: underline;
        text-decoration-style: dotted;
        text-underline-offset: 2px;
    }

    .punch-table .punch-cell .punch-warn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #fff4e0;
        color: #c07a00;
        font-size: 10px;
        margin-left: 3px;
        vertical-align: middle;
        cursor: help;
    }

    .punch-table .punch-cell .no-punch {
        color: var(--ink-300, #b0b5be);
        font-size: 13px;
        font-weight: 700;
    }

    .punch-table .emp-cell {
        min-width: 180px;
    }

    .punch-table .emp-cell .person-name {
        font-weight: 700;
        font-size: 13.5px;
        color: var(--ink-900, #201a14);
    }

    .punch-table .emp-cell .emp-id {
        font-size: 11.5px;
        color: var(--primary-dark, #0ca308);
        font-weight: 600;
    }

    .punch-table .role-cell {
        min-width: 140px;
    }

    #pgBody tr {
        opacity: 0;
        animation: rowIn 0.35s ease forwards;
    }

    @keyframes rowIn {
        from {
            opacity: 0;
            transform: translateY(6px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Filters */
    .punch-filters-row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 14px;
    }

    .punch-filters-row .date-picker {
        min-width: 240px;
    }

    .punch-filters-row .date-picker .date-input {
        border-radius: 10px;
        font-weight: 600;
        font-size: 13px;
    }

    .punch-branch-select {
        min-width: 170px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
    }

    .punch-search-btn {
        border-radius: 10px;
        padding: 9px 24px;
        font-weight: 700;
        font-size: 13px;
    }

    /* Active filters */
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
        transition: max-height 0.4s cubic-bezier(.4, 0, .2, 1), opacity 0.3s ease, transform 0.35s cubic-bezier(.34, 1.2, .64, 1), padding 0.4s ease, margin 0.4s ease, border-width 0.3s ease;
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
    }

    .filter-chip .chip-close:hover {
        background: rgba(0, 0, 0, 0.14);
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
    }

    .active-filters-clear:hover {
        text-decoration: underline;
    }

    /* Column toggle */
    .col-toggle-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 12px;
        border: 1px solid var(--border-soft, #eaeef0);
        border-radius: 10px;
        margin-bottom: 6px;
        background: #fff;
    }

    .col-toggle-item:hover {
        background: var(--primary-light, #e8f7ea);
    }

    .col-toggle-item label {
        margin: 0;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        user-select: none;
    }

    /* ===== Attendance Log Offcanvas ===== */
    #attendanceLogOffcanvas {
        width: 640px !important;
        max-width: 96vw !important;
        background: #f7f8fa;
        height: 100% !important;
        right:0 !important;
        top: 0 !important;
        border-radius: 0 !important;
    }

    #attendanceLogOffcanvas .offcanvas-header {
        padding: 18px 22px;
        background: #fff;
        /* border-bottom: none; */
    }

    #attendanceLogOffcanvas .offcanvas-header .al-title {
        font-size: 12px;
        font-weight: 700;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: .6px;
    }

    #attendanceLogOffcanvas .offcanvas-header .al-sub {
        font-size: 17px;
        margin-top: 3px;
        font-weight: 800;
    }

    #attendanceLogOffcanvas .offcanvas-header .btn-close {}

    #attendanceLogOffcanvas .offcanvas-body {
        padding: 0;
        overflow-y: auto;
        overflow-x: hidden;
    }

    /* Day summary hero card */
    .al-hero {
        margin: 16px 20px 4px;
        padding: 16px 18px;
        border-radius: 16px;
        background: #fff;
        border: 1px solid #eef0f3;
        box-shadow: 0 2px 10px rgba(20, 20, 43, 0.05);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .al-hero-date {
        font-size: 14.5px;
        font-weight: 800;
        color: var(--ink-900, #201a14);
    }

    .al-hero-day {
        font-size: 12px;
        font-weight: 600;
        color: #9aa0a8;
        margin-top: 1px;
    }

    .al-hero-hours {
        text-align: right;
    }

    .al-hero-hours .al-hero-hours-val {
        font-size: 20px;
        font-weight: 800;
        color: var(--primary-dark, #0ca308);
        line-height: 1;
    }

    .al-hero-hours .al-hero-hours-label {
        font-size: 10px;
        font-weight: 700;
        color: #9aa0a8;
        letter-spacing: .3px;
        margin-top: 3px;
        text-transform: uppercase;
    }

    .al-status-badge {
        font-size: 11.5px;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 999px;
        white-space: nowrap;
        letter-spacing: .3px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .al-status-badge.half-day {
        background: #fef3c7;
        color: #92400e;
    }

    .al-status-badge.full-day {
        background: #dcfce7;
        color: #166534;
    }

    .al-status-badge.absent {
        background: #fee2e2;
        color: #991b1b;
    }

    .al-status-badge.weekoff {
        background: #f3f4f6;
        color: #6b7280;
    }

    /* Timeline label */
    .al-section-label {
        font-size: 11px;
        font-weight: 800;
        color: #9aa0a8;
        letter-spacing: .6px;
        text-transform: uppercase;
        padding: 18px 20px 8px;
    }

    /* Timeline */
    .al-timeline {
        position: relative;
        padding: 4px 20px 6px 50px;
        max-width: 100%;
        box-sizing: border-box;
    }

    .al-timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 6px;
        bottom: 6px;
        width: 3px;
        background: var(--primary-lightTwo);
        border-radius: 3px;
    }

    /* Date group */
    .al-date-group {
        /* margin-bottom: 8px; */
    }

    /* Timeline node sitting on the vertical line */
    .al-timeline-dot {
        position: absolute;
        left: -38px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        top: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border: 3px solid #e5e7eb;
        z-index: 2;
        font-size: 9px;
        box-shadow: 0 0 0 4px #f7f8fa;
    }

    .al-timeline-dot.in {
        border-color: #10b981;
        color: #10b981;
    }

    .al-timeline-dot.out {
        border-color: #ef4444;
        color: #ef4444;
    }

    .al-timeline-connector {
        position: absolute;
        left: 32px;
        top: 50%;
        width: 14px;
        height: 2px;
        transform: translateY(-50%);
        z-index: 1;
    }

    /* Punch row -> card style */
    .al-punch-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 0 0 22px 0;
        padding: 12px 14px;
        background: #fff;
        border: 1px solid #eef0f3;
        border-left: 4px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 1px 4px rgba(20, 20, 43, 0.04);
        position: relative;
        width: fit-content;
        box-sizing: border-box;
        flex-wrap: nowrap;
        transition: box-shadow .15s, border-color .15s, transform .15s;
    }

    .al-punch-row:hover {
        box-shadow: 0 4px 14px rgba(20, 20, 43, 0.1);
        /* transform: translateX(2px); */
    }

    .al-punch-row.in {
        border-left-color: #10b981;
    }

    .al-punch-row.out {
        border-left-color: #ef4444;
    }

    .al-punch-row .al-punch-time-tag {
        position: absolute;
        top: -10px;
        left: 14px;
        background: #fff;
        padding: 1px 8px;
        border-radius: 999px;
        font-size: 9.5px;
        font-weight: 800;
        letter-spacing: .4px;
        border: 1px solid #eef0f3;
        color: #9aa0a8;
    }

    .al-punch-node {
        flex-shrink: 0;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: 700;
        border: none;
        position: relative;
        z-index: 1;
    }

    .al-punch-node.in {
        background: #ecfdf5;
        color: #059669;
    }

    .al-punch-node.out {
        background: #fef2f2;
        color: #dc2626;
    }

    .al-punch-text {
        display: flex;
        flex-direction: column;
        min-width: 30px;
    }

    .al-punch-label {
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .4px;
        text-transform: uppercase;
    }

    .al-punch-label.in {
        color: #059669;
    }

    .al-punch-label.out {
        color: #dc2626;
    }

    .al-punch-sub {
        font-size: 9.5px;
        color: #b0b5be;
        font-weight: 600;
    }

    .al-punch-time-input {
        flex: 1;
        min-width: 0;
        border: 1px solid transparent;
        border-radius: 9px;
        padding: 9px 12px;
        font-size: 13px;
        font-weight: 800;
        color: #1f2937;
        background: #f8f9fb;
        outline: none;
        text-align: center;
        transition: border-color .15s, box-shadow .15s;
        letter-spacing: .5px;
    }

    .al-punch-time-input:focus {
        border-color: var(--primary, #0ca308);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
        background: #fff;
    }

    .al-punch-more {
        flex-shrink: 0;
        width: 34px;
        height: 34px;
        border-radius: 9px;
        border: 1px solid #eef0f3;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #9ca3af;
        font-size: 16px;
        transition: background .15s, color .15s;
    }

    .al-punch-more:hover {
        background: var(--primary-light, #e8f7ea);
        color: var(--primary-dark, #0ca308);
    }

    /* Break badge */
    .al-break-badge {
        display: flex;
        align-items: center;
        gap: 7px;
        justify-content: start;
        padding: 7px 16px;
        border-radius: 8px;
        background: #fffbeb;
        border: 1px dashed #fbbf24;
        font-size: 11.5px;
        font-weight: 700;
        color: #92400e;
        width: fit-content;
        letter-spacing: .2px;
        box-sizing: border-box;
        max-width: 100%;
        margin-top: -12px;
        margin-bottom: 10px;
    }

    /* Add punch button */
    .al-add-punch {
        display: flex;
        align-items: center;
        gap: 8px;
        width: fit-content;
        height: 38px;
        border-radius: 12px;
        background: #fff;
        color: var(--primary-dark, #0ca308);
        border: 1.5px dashed #b8e6b9;
        justify-content: center;
        padding: 0 16px;
        font-size: 12.5px;
        font-weight: 700;
        cursor: pointer;
        margin: 4px 0 10px 0;
        transition: background .15s, border-color .15s;
    }

    .al-add-punch:hover {
        background: var(--primary-light, #e8f7ea);
        border-color: var(--primary, #0ca308);
    }

    .al-add-punch i {
        font-size: 15px;
    }

    /* No punches empty */
    .al-empty {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 20px 18px;
        /* margin: 0 0 12px; */
        background: #fff;
        border: 1px dashed #e5e7eb;
        border-radius: 14px;
        color: var(--ink-300, #9aa0a8);
        font-size: 13px;
        font-weight: 600;
    }

    .al-empty i {
        font-size: 20px;
        color: #d1d5db;
    }

    /* Quick Actions & Insight */
    .al-section {
        margin: 14px 20px 20px;
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 14px;
        overflow: hidden;
    }

    .al-section-toggle {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 14px 18px;
        border: none;
        background: var(--border-soft);
        font-size: 13.5px;
        font-weight: 700;
        color: var(--ink-900, #201a14);
        cursor: pointer;
        transition: background .15s;
    }

    .al-section-toggle:hover {
        opacity: 0.85;
    }

    .al-section-toggle .chevron {
        transition: transform .3s ease;
        font-size: 12px;
        color: var(--ink-500);
    }

    .al-section-toggle.open .chevron {
        transform: rotate(180deg);
    }

    .al-section-body {
        max-height: 0;
        overflow: hidden;
        transition: max-height .35s ease;
    }

    .al-section-body.open {
        max-height: 300px;
    }

    .al-section-body-inner {
        padding: 2px 18px 16px;
        font-size: 13px;
        color: var(--ink-500);
        box-sizing: border-box;
        max-width: 100%;
        overflow-wrap: break-word;
        border-top: 1px solid #f3f4f6;
        padding-top: 14px;
    }

    /* Insight stat cards */
    .al-stat-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .al-stat-card {
        text-align: center;
        padding: 14px 6px;
        border-radius: 14px;
        background: #f9fafb;
        border: 1px solid #eef0f3;
    }

    .al-stat-card i {
        font-size: 17px;
        color: var(--primary, #0ca308);
        margin-bottom: 4px;
        display: block;
    }

    .al-stat-card .al-stat-val {
        font-size: 18px;
        font-weight: 800;
        color: var(--ink-900, #201a14);
    }

    .al-stat-card .al-stat-label {
        font-size: 9px;
        font-weight: 700;
        color: #9aa0a8;
        letter-spacing: .3px;
        margin-top: 3px;
        text-transform: uppercase;
    }

    /* Quick Action chip buttons */
    .al-qa-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 16px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        background: #fff;
        font-size: 12px;
        font-weight: 600;
        color: #374151;
        cursor: pointer;
        white-space: nowrap;
        transition: all .15s ease;
    }
    .al-qa-btn:hover {
        background: #f0fdf4;
        border-color: #059669;
        color: #059669;
        box-shadow: 0 1px 4px rgba(5,150,105,.12);
    }
    .al-qa-btn:active {
        transform: scale(.97);
    }

    /* Punch more dropdown */
    .al-punch-actions {
        position: relative;
        flex-shrink: 0;
    }
    .al-punch-dropdown {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        margin-top: 4px;
        min-width: 140px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0,0,0,.12);
        padding: 4px;
        z-index: 100;
    }
    .al-punch-dropdown.show {
        display: block;
        animation: ddIn .2s ease forwards;
    }
    @keyframes ddIn {
        from { opacity: 0; transform: translateY(-6px) scale(.96); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    .al-punch-dropdown-item {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 8px 12px;
        border: none;
        background: none;
        font-size: 12.5px;
        font-weight: 600;
        color: #374151;
        border-radius: 8px;
        cursor: pointer;
        transition: background .12s;
        text-align: left;
    }
    .al-punch-dropdown-item:hover {
        background: #f0fdf4;
        color: #059669;
    }
    .al-punch-dropdown-item.al-punch-dropdown-danger:hover {
        background: #fef2f2;
        color: #dc2626;
    }

    /* ---------- Offcanvas body smooth content swap (common fix) ---------- */
    /* Keep this minimal — only a tiny loading shimmer if we ever go async.
       The OFFCANVAS root has Bootstrap's slide-in. Never double-layer it. */
    #alBody.al-loading::before {
        content: '';
        display: block;
        height: 3px;
        border-radius: 3px;
        margin: 16px 20px 10px;
        background: linear-gradient(90deg, rgba(12,163,8,.12), rgba(12,163,8,.55), rgba(12,163,8,.12));
        background-size: 200% 100%;
        animation: al-loading-shimmer 900ms linear infinite;
    }

    @keyframes al-loading-shimmer {
        0%   { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* ---------- Neutralize global app.css fadeSlideUp for THIS offcanvas ---------- */
    /* app.css line ~2671 forces fadeSlideUp replay on every direct child of
       .offcanvas-body whenever the offcanvas has .show — which means EVERY
       repopulate re-animates the cards. That is the "double refresh" the user
       sees: content appears → then animation replays 450ms → looks like refresh.
       FIX: kill default replay. Only re-enable animation while .al-once is set.
       We set .al-once ONCE per open (shown.bs.offcanvas) and clear it RIGHT BEFORE
       the next populate — so animation runs exactly ONCE on first open, never again. */
    #attendanceLogOffcanvas.offcanvas.show .offcanvas-body > * {
        animation: none !important;
        opacity: 1 !important;
        transform: none !important;
    }


    #attendanceLogOffcanvas.offcanvas.show.al-once .offcanvas-body > *:nth-child(1)    { animation-delay: 0.08s; }
    #attendanceLogOffcanvas.offcanvas.show.al-once .offcanvas-body > *:nth-child(2)    { animation-delay: 0.14s; }
    #attendanceLogOffcanvas.offcanvas.show.al-once .offcanvas-body > *:nth-child(3)    { animation-delay: 0.20s; }
    #attendanceLogOffcanvas.offcanvas.show.al-once .offcanvas-body > *:nth-child(4)    { animation-delay: 0.26s; }
    #attendanceLogOffcanvas.offcanvas.show.al-once .offcanvas-body > *:nth-child(n+5)  { animation-delay: 0.32s; }

    /* =========================================================
       Add / Edit Punch Modal  (reference: attendance-report.php editEntryModal)
       ========================================================= */
    #addPunchModal .modal-content {
        border: 0;
        border-radius: 20px;
        overflow: hidden;
    }

    .ap-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 22px 26px;
        background: linear-gradient(135deg, #16a34a 0%, #0e7c3a 100%);
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .ap-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(circle at 85% 20%, rgba(255, 255, 255, .14) 0%, transparent 55%),
                          radial-gradient(circle at 15% 90%, rgba(255, 255, 255, .1) 0%, transparent 50%);
        pointer-events: none;
    }

    .ap-header .avatar {
        width: 48px; height: 48px;
        border-radius: 14px;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, .6);
        position: relative; z-index: 1; flex-shrink: 0;
    }

    .ap-header .info { position: relative; z-index: 1; flex: 1; min-width: 0; }
    .ap-header .name { font-size: 16px; font-weight: 800; }
    .ap-header .sub  { font-size: 12px; opacity: .85; margin-top: 2px; }

    .ap-header .ap-date-pill {
        position: relative; z-index: 1;
        background: rgba(255, 255, 255, .18);
        font-size: 12px; font-weight: 700;
        padding: 7px 14px;
        border-radius: 999px;
        white-space: nowrap;
    }

    .ap-close {
        position: relative; z-index: 2;
        width: 32px; height: 32px;
        border-radius: 9px; border: none;
        background: rgba(255, 255, 255, .18);
        color: #fff;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        transition: background .15s ease, transform .15s ease;
    }
    .ap-close:hover { background: rgba(255, 255, 255, .32); transform: rotate(90deg); }

    .ap-body {
        padding: 24px 26px 8px;
    }

    /* Punch-type segmented control (In / Out toggle) */
    .ap-toggle-wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        background: #f6f9f7;
        border-radius: 14px;
        padding: 10px 14px;
        margin-bottom: 20px;
    }
    .ap-toggle-wrap .ap-toggle-label {
        font-size: 13px; font-weight: 700; color: var(--ink-900, #201a14);
        display: flex; align-items: center; gap: 8px;
    }
    .ap-toggle {
        display: inline-flex;
        background: #ffffff;
        padding: 4px;
        border-radius: 999px;
        border: 1px solid #e6ebe6;
        position: relative;
        z-index: 0;
    }
    .ap-toggle input[type="radio"] { position: absolute; opacity: 0; pointer-events: none; }
    .ap-toggle-btn {
        position: relative;
        z-index: 1;
        min-width: 92px;
        padding: 7px 16px;
        font-size: 13px; font-weight: 700;
        color: var(--ink-500, #6b6c85);
        border-radius: 999px;
        cursor: pointer;
        display: inline-flex; align-items: center; justify-content: center; gap: 6px;
        transition: color .2s ease;
    }
    .ap-toggle-btn i { font-size: 14px; }
    .ap-toggle input:checked + .ap-toggle-btn {
        background: linear-gradient(135deg, #16a34a 0%, #0e7c3a 100%);
        color: #fff;
        box-shadow: 0 4px 10px rgba(22, 163, 74, .2);
    }

    /* Time row (big styled input, same as aee-time-input) */
    .ap-time-row {
        background: #f6f9f7;
        border-radius: 14px;
        padding: 18px 18px 22px;
        margin-bottom: 16px;
    }
    .ap-time-row label.ap-time-label {
        display: flex; align-items: center; gap: 8px;
        font-size: 13px; font-weight: 700;
        color: var(--ink-900, #201a14);
        margin-bottom: 12px;
    }
    .ap-time-row label.ap-time-label i { color: var(--primary); font-size: 15px; }

    .ap-time-input-wrap {
        display: flex; align-items: center; gap: 10px;
    }

    .ap-time-input {
        flex: 1;
        border: 2px solid var(--att-present-bg, #e8f7ea);
        background: #ffffff;
        color: var(--primary-dark, #0ca308);
        font-size: 18px;
        font-weight: 800;
        padding: 14px 16px;
        border-radius: 12px;
        outline: none;
        width: 100%;
        text-align: center;
        letter-spacing: .5px;
        transition: background .2s ease, box-shadow .2s ease, border-color .2s ease;
    }
    .ap-time-input:focus {
        background: #fff;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .12);
    }
    .ap-time-input::placeholder { color: #b8bec6; font-weight: 700; }

    .ap-preset-times {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 8px;
        margin-top: 12px;
    }
    .ap-preset {
        background: #ffffff;
        border: 1px solid #eceff1;
        color: var(--ink-600, #4b5563);
        padding: 7px 6px;
        font-size: 12px; font-weight: 700;
        border-radius: 9px;
        cursor: pointer;
        transition: all .15s ease;
    }
    .ap-preset:hover {
        border-color: var(--primary);
        color: var(--primary-dark, #0ca308);
        background: var(--att-present-bg);
    }

    .ap-note {
        display: flex; align-items: flex-start; gap: 8px;
        background: var(--att-present-bg);
        color: var(--primary-dark, #0ca308);
        font-size: 12px; font-weight: 600;
        padding: 11px 14px;
        border-radius: 12px;
        margin: 0 0 6px;
        line-height: 1.45;
    }
    .ap-note i { margin-top: 1px; }

    .ap-footer {
        display: flex; justify-content: flex-end; gap: 10px;
        padding: 16px 26px 24px;
    }
    .ap-save-btn { min-width: 150px; }

    /* Save button saved state */
    .ap-save-btn.ap-saved .ap-default { display: none; }
    .ap-save-btn.ap-saved .ap-check { display: inline; }
    .ap-save-btn .ap-check { display: none; }

    /* --- Responsive: smaller screens --- */
    @media (max-width: 520px) {
        .ap-header { padding: 18px 18px; gap: 10px; }
        .ap-header .avatar { width: 42px; height: 42px; }
        .ap-header .name { font-size: 14.5px; }
        .ap-header .ap-date-pill { display: none; }
        .ap-body { padding: 20px 18px 6px; }
        .ap-footer { padding: 14px 18px 20px; }
        .ap-preset-times { grid-template-columns: repeat(3, 1fr); }
    }

    .ap-time-label-danger {
        color: #dc2626;
    }

    .col-sno-70 {
        width: 70px;
    }

    .avatar-34 {
        width: 34px;
        height: 34px;
    }

    .role-name {
        font-size: 13px;
    }

    .sub-role-name {
        font-size: 12px;
        color: var(--ink-500);
    }

    .al-status-badge-wrap {
        margin: 10px 20px 0;
    }

    .al-timeline-item {
        position: relative;
    }

    .punch-warn-mr {
        margin-right: 2px;
    }

    .text-brand-primary {
        color: var(--primary, #0ca308);
    }

    .ap-out-row-hidden {
        display: none;
    }
</style>

<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Punch In and Punch Out Report</h1>
        </div>
    </div>

<!-- ===== Filters row ===== -->
<div class="card-custom mb-3">
    <div class="row">
        <div class="col-md-4">
            <div class="date-picker date-range-picker">
                <input type="text" class="date-input form-control" id="filterDateRange"
                    value="01 Aug 2026  —  31 Aug 2026"
                    placeholder="From date  —  To date" autocomplete="off">
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-select punch-branch-select select2" id="filterBranch">
                <option value="">Choose Branch</option>
            </select>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary punch-search-btn" id="searchBtn">
                <i class="bi bi-search me-1"></i> Search
            </button>
        </div>
    </div>
</div>

<!-- ===== Active Filters ===== -->
<div class="active-filters-bar" id="activeFiltersBar">
    <span class="active-filters-label"><i class="bi bi-funnel-fill me-1"></i>Active Filters:</span>
    <div class="d-flex align-items-center gap-2">
        <div class="d-flex flex-wrap gap-2" id="activeFiltersList"></div>
        <button type="button" class="active-filters-clear text-decoration-underline" id="activeFiltersClearAll">Clear All</button>
    </div>
</div>

<!-- ===== Table card ===== -->
<div class="card-custom p-0" id="punchReportTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip"><i class="bi bi-clipboard2-pulse"></i></div>
            <div>
                <h3 class="card-title mb-0">Daily Punch Report</h3>
            </div>
        </div>
    </div>
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 punch-table stickyBlock datatable" id="myReqTable" data-table-name="Daily Punch Report">
            <thead>
                <tr id="punchTableHead"></tr>
            </thead>
            <tbody id="pgBody"></tbody>
        </table>
    </div>
</div>

<!-- ===== Attendance Log Offcanvas ===== -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="attendanceLogOffcanvas">
    <div class="offcanvas-header">
        <div>
            <div class="al-title" id="alTitle">Attendance Log</div>
            <div class="al-sub" id="alSub">—</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="alBody">
        <!-- timeline injected by JS -->
    </div>
</div>

<!-- ===== Add Punch Modal ===== -->
<div class="modal fade" id="addPunchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="ap-header">
                <img src="./assets/img/profile-1.jpg" id="apAvatar" class="avatar" alt="Profile">
                <div class="info">
                    <div class="name" id="apName">—</div>
                    <div class="sub"><span id="apEmpId">—</span> &middot; <span id="apRole">—</span></div>
                </div>
                <div class="ap-date-pill"><i class="bi bi-calendar3 me-1"></i><span id="apDate">—</span></div>
                <button type="button" class="ap-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <div class="ap-body">
                <!-- In / Out Toggle -->
                <div class="ap-toggle-wrap">
                    <div class="ap-toggle-label">
                        <i class="bi bi-arrow-left-right"></i> Punch Type
                    </div>
                    <div class="ap-toggle">
                        <input type="radio" name="apPunchType" id="apPunchIn" value="in" checked>
                        <label class="ap-toggle-btn" for="apPunchIn"><i class="bi bi-box-arrow-in-right"></i> In</label>
                        <input type="radio" name="apPunchType" id="apPunchOut" value="out">
                        <label class="ap-toggle-btn" for="apPunchOut"><i class="bi bi-box-arrow-right"></i> Out</label>
                    </div>
                </div>

                <!-- Punch In Time -->
                <div class="ap-time-row" id="apInTimeRow">
                    <label class="ap-time-label"><i class="bi bi-clock"></i> Punch In Time</label>
                    <div class="ap-time-input-wrap">
                        <div class="time-picker w-100">
                            <input type="text" class="form-control time-input" id="apInTime" placeholder="HH:MM AM/PM" autocomplete="off" readonly>
                        </div>
                    </div>
                    <div class="ap-preset-times">
                        <button type="button" class="ap-preset" data-time="09:00 AM" data-target="apInTime">9:00 AM</button>
                        <button type="button" class="ap-preset" data-time="09:15 AM" data-target="apInTime">9:15 AM</button>
                        <button type="button" class="ap-preset" data-time="09:30 AM" data-target="apInTime">9:30 AM</button>
                        <button type="button" class="ap-preset" data-time="09:45 AM" data-target="apInTime">9:45 AM</button>
                        <button type="button" class="ap-preset" data-time="10:00 AM" data-target="apInTime">10:00 AM</button>
                        <button type="button" class="ap-preset" data-time="10:30 AM" data-target="apInTime">10:30 AM</button>
                        <button type="button" class="ap-preset" data-time="11:00 AM" data-target="apInTime">11:00 AM</button>
                        <button type="button" class="ap-preset" data-time="01:00 PM" data-target="apInTime">1:00 PM</button>
                    </div>
                </div>

                <!-- Punch Out Time -->
                <div class="ap-time-row ap-out-row-hidden" id="apOutTimeRow">
                    <label class="ap-time-label ap-time-label-danger"><i class="bi bi-clock"></i> Punch Out Time</label>
                    <div class="ap-time-input-wrap">
                        <div class="time-picker w-100">
                            <input type="text" class="form-control time-input" id="apOutTime" placeholder="HH:MM AM/PM" autocomplete="off" readonly>
                        </div>
                    </div>
                    <div class="ap-preset-times">
                        <button type="button" class="ap-preset" data-time="05:00 PM" data-target="apOutTime">5:00 PM</button>
                        <button type="button" class="ap-preset" data-time="05:30 PM" data-target="apOutTime">5:30 PM</button>
                        <button type="button" class="ap-preset" data-time="06:00 PM" data-target="apOutTime">6:00 PM</button>
                        <button type="button" class="ap-preset" data-time="06:30 PM" data-target="apOutTime">6:30 PM</button>
                        <button type="button" class="ap-preset" data-time="07:00 PM" data-target="apOutTime">7:00 PM</button>
                        <button type="button" class="ap-preset" data-time="07:30 PM" data-target="apOutTime">7:30 PM</button>
                        <button type="button" class="ap-preset" data-time="08:00 PM" data-target="apOutTime">8:00 PM</button>
                        <button type="button" class="ap-preset" data-time="09:00 PM" data-target="apOutTime">9:00 PM</button>
                    </div>
                </div>

                <div class="ap-note">
                    <i class="bi bi-info-circle"></i>
                    Select the punch type and enter the correct time. This will be added to the employee's attendance record.
                </div>
            </div>

            <div class="ap-footer">
                <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary ap-save-btn" id="apSaveBtn">
                    <span class="ap-default"><i class="bi bi-check2"></i> Save Punch</span>
                    <span class="ap-check"><i class="bi bi-check-circle-fill"></i> Saved</span>
                </button>
            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

 
<script>
    (function() {
        'use strict';

        // ================================================================
        // DATA (all in JS)
        // ================================================================
        var employees = [{
                id: 1,
                emp_id: 41,
                name: 'Vijai',
                role: 'Developer',
                sub_role: 'OpenSource',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 2,
                emp_id: 40,
                name: 'Anbarasan',
                role: 'Developer',
                sub_role: 'OpenSource',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 3,
                emp_id: 39,
                name: 'Shailni Raj',
                role: 'Branch Manager',
                sub_role: 'Branch Manager',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 4,
                emp_id: 36,
                name: 'venkatesanB',
                role: 'Developer',
                sub_role: 'Windows',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 5,
                emp_id: 35,
                name: 'Bhuvaneswari',
                role: 'Marketing',
                sub_role: 'Marketing Executive',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 6,
                emp_id: 34,
                name: 'Karthik Raja',
                role: 'Developer',
                sub_role: 'Backend',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 7,
                emp_id: 33,
                name: 'Priya Sharma',
                role: 'Designer',
                sub_role: 'UI/UX',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 8,
                emp_id: 32,
                name: 'Mohammed Farhan',
                role: 'Developer',
                sub_role: 'Frontend',
                branch: 'Gharuda IT Park',
                avatar: 'profile-4.jpg'
            },
            {
                id: 9,
                emp_id: 31,
                name: 'Deepa Nair',
                role: 'HR',
                sub_role: 'Recruiter',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 10,
                emp_id: 30,
                name: 'Suresh Kumar',
                role: 'Developer',
                sub_role: 'DevOps',
                branch: 'Gharuda IT Park',
                avatar: 'profile-2.jpg'
            },
            {
                id: 11,
                emp_id: 29,
                name: 'Lakshmi Devi',
                role: 'Finance',
                sub_role: 'Accountant',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 12,
                emp_id: 28,
                name: 'Arun Prakash',
                role: 'Developer',
                sub_role: 'Mobile',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 13,
                emp_id: 27,
                name: 'Nithya Selvi',
                role: 'Marketing',
                sub_role: 'Content Writer',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 14,
                emp_id: 26,
                name: 'Rajesh Verma',
                role: 'Developer',
                sub_role: 'Full Stack',
                branch: 'Gharuda IT Park',
                avatar: 'profile-2.jpg'
            },
            {
                id: 15,
                emp_id: 25,
                name: 'Divya Prakash',
                role: 'HR',
                sub_role: 'HR Manager',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 16,
                emp_id: 24,
                name: 'Vignesh T',
                role: 'Developer',
                sub_role: 'QA',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 17,
                emp_id: 23,
                name: 'Meena Kumari',
                role: 'Admin',
                sub_role: 'Office Admin',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 18,
                emp_id: 22,
                name: 'Senthil Nathan',
                role: 'Developer',
                sub_role: 'ML Engineer',
                branch: 'Gharuda IT Park',
                avatar: 'profile-2.jpg'
            },
            {
                id: 19,
                emp_id: 21,
                name: 'Harini R',
                role: 'Designer',
                sub_role: 'Graphic Design',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 20,
                emp_id: 20,
                name: 'Kiran Patel',
                role: 'Developer',
                sub_role: 'Cloud',
                branch: 'Gharuda IT Park',
                avatar: 'profile-4.jpg'
            },
            {
                id: 21,
                emp_id: 19,
                name: 'Swathi Reddy',
                role: 'Marketing',
                sub_role: 'Digital Marketing',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 22,
                emp_id: 18,
                name: 'Mohan Raj',
                role: 'Developer',
                sub_role: 'Java',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 23,
                emp_id: 17,
                name: 'Anitha J',
                role: 'Finance',
                sub_role: 'Payroll Officer',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 24,
                emp_id: 16,
                name: 'Prabhu K',
                role: 'Developer',
                sub_role: 'Python',
                branch: 'Gharuda IT Park',
                avatar: 'profile-4.jpg'
            },
            {
                id: 25,
                emp_id: 15,
                name: 'Revathi M',
                role: 'HR',
                sub_role: 'Payroll',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 26,
                emp_id: 14,
                name: 'Thirunavukkarasu',
                role: 'Developer',
                sub_role: 'React',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 27,
                emp_id: 13,
                name: 'Kavitha B',
                role: 'Admin',
                sub_role: 'Facilities',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 28,
                emp_id: 12,
                name: 'Yuvaraj S',
                role: 'Developer',
                sub_role: 'Node.js',
                branch: 'Gharuda IT Park',
                avatar: 'profile-4.jpg'
            },
            {
                id: 29,
                emp_id: 11,
                name: 'Sabari Ganesh',
                role: 'Designer',
                sub_role: 'Motion Design',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 30,
                emp_id: 10,
                name: 'Geetha Lakshmi',
                role: 'Finance',
                sub_role: 'Auditor',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 31,
                emp_id: 9,
                name: 'Ravi Shankar',
                role: 'Developer',
                sub_role: 'Angular',
                branch: 'Gharuda IT Park',
                avatar: 'profile-3.jpg'
            },
            {
                id: 32,
                emp_id: 8,
                name: 'Pooja Verma',
                role: 'Marketing',
                sub_role: 'SEO Specialist',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 33,
                emp_id: 7,
                name: 'Manikandan R',
                role: 'Developer',
                sub_role: 'Flutter',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 34,
                emp_id: 6,
                name: 'Sunitha Devi',
                role: 'HR',
                sub_role: 'Training',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 35,
                emp_id: 5,
                name: 'Balaji Venkat',
                role: 'Developer',
                sub_role: 'C++',
                branch: 'Gharuda IT Park',
                avatar: 'profile-3.jpg'
            },
            {
                id: 36,
                emp_id: 4,
                name: 'Aparna Rajan',
                role: 'Designer',
                sub_role: 'Product Design',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 37,
                emp_id: 3,
                name: 'Gokul Krishna',
                role: 'Developer',
                sub_role: 'Spring Boot',
                branch: 'Gharuda IT Park',
                avatar: 'profile-1.jpg'
            },
            {
                id: 38,
                emp_id: 2,
                name: 'Nandhini K',
                role: 'Finance',
                sub_role: 'Billing',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            }
        ];
        var branches = ['Gharuda Infotech', 'Gharuda IT Park'];

        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        function makeDate(y, m, d) {
            return new Date(y, m - 1, d);
        }

        function fmtDateParts(s) {
            var p = s.split('-');
            return {
                y: +p[0],
                m: +p[1],
                d: +p[2]
            };
        }

        function fmtDateKey(dt) {
            return dt.getFullYear() + '-' + String(dt.getMonth() + 1).padStart(2, '0') + '-' + String(dt.getDate()).padStart(2, '0');
        }

        function dateRange(f, t) {
            var a = fmtDateParts(f),
                b = fmtDateParts(t),
                c = makeDate(a.y, a.y, a.d),
                e = makeDate(b.y, b.m, b.d),
                r = [];
            c = makeDate(a.y, a.m, a.d);
            while (c <= e) {
                r.push(fmtDateKey(c));
                c.setDate(c.getDate() + 1);
            }
            return r;
        }

        function formatDateHeader(s) {
            var p = fmtDateParts(s),
                dt = makeDate(p.y, p.m, p.d);
            return {
                date: p.d + '-' + String(p.m).padStart(2, '0') + '-' + p.y,
                full: p.d + ' ' + monthNames[dt.getMonth()] + ' ' + p.y,
                day: dayNames[dt.getDay()]
            };
        }

        // Punch generator
        var _seed = 42;

        function srand() {
            _seed = (_seed * 1664525 + 1013904223) & 0x7fffffff;
            return _seed / 0x7fffffff;
        }

        function randInt(a, b) {
            return a + Math.floor(srand() * (b - a + 1));
        }

        function randTime(h1, m1, h2, m2) {
            var h = randInt(h1, h2),
                m = (h === h1 && h === h2) ? randInt(m1, m2) : randInt(0, 59);
            var sfx = h >= 12 ? 'PM' : 'AM',
                h12 = h % 12;
            if (h12 === 0) h12 = 12;
            return String(h12).padStart(2, '0') + ':' + String(m).padStart(2, '0') + ' ' + sfx;
        }

        function generatePunchData() {
            var data = {};
            employees.forEach(function(emp) {
                var ps = {},
                    d = makeDate(2026, 8, 1),
                    end = makeDate(2026, 8, 31);
                while (d <= end) {
                    var key = fmtDateKey(d),
                        dow = d.getDay();
                    if (dow === 0) {
                        ps[key] = [];
                        d.setDate(d.getDate() + 1);
                        continue;
                    }
                    if (dow === 6 && emp.id % 3 === 0) {
                        ps[key] = [];
                        d.setDate(d.getDate() + 1);
                        continue;
                    }
                    var shift = 'general',
                        sr = emp.sub_role.toLowerCase();
                    if (sr.indexOf('marketing') >= 0 || sr.indexOf('content') >= 0 || sr.indexOf('graphic') >= 0 || sr.indexOf('seo') >= 0 || sr.indexOf('social') >= 0 || sr.indexOf('motion') >= 0 || sr.indexOf('brand') >= 0) shift = 'morning';
                    else if (sr.indexOf('devops') >= 0 || sr.indexOf('ml') >= 0 || sr.indexOf('cloud') >= 0 || sr.indexOf('angular') >= 0 || sr.indexOf('node') >= 0 || sr.indexOf('go') >= 0 || sr.indexOf('rust') >= 0 || sr.indexOf('ios') >= 0 || sr.indexOf('typescript') >= 0 || sr.indexOf('python') >= 0 || emp.branch === 'Gharuda IT Park') shift = 'evening';
                    if (randInt(1, 100) <= 10) {
                        ps[key] = [];
                        d.setDate(d.getDate() + 1);
                        continue;
                    }
                    var arr = [];
                    if (shift === 'morning') {
                        arr.push({
                            time: randTime(5, 50, 6, 20)
                        });
                        arr.push({
                            time: randTime(13, 45, 14, 15)
                        });
                        if (randInt(1, 100) <= 5) arr.splice(1, 0, {
                            time: randTime(10, 0, 12, 0),
                            warn: true
                        });
                    } else if (shift === 'evening') {
                        arr.push({
                            time: randTime(13, 45, 14, 15)
                        });
                        arr.push({
                            time: randTime(21, 45, 22, 15)
                        });
                        if (randInt(1, 100) <= 5) arr.splice(1, 0, {
                            time: randTime(17, 0, 19, 0),
                            warn: true
                        });
                    } else {
                        arr.push({
                            time: randTime(9, 15, 9, 45)
                        });
                        arr.push({
                            time: randTime(18, 15, 18, 45)
                        });
                        if (randInt(1, 100) <= 8) {
                            arr.splice(1, 0, {
                                time: randTime(12, 30, 13, 0)
                            });
                            arr.splice(2, 0, {
                                time: randTime(13, 15, 13, 45)
                            });
                        }
                        if (randInt(1, 100) <= 4) arr.splice(1, 0, {
                            time: randTime(15, 0, 17, 0),
                            warn: true
                        });
                    }
                    ps[key] = arr;
                    d.setDate(d.getDate() + 1);
                }
                data[emp.id] = ps;
            });
            return data;
        }
        var punchData = generatePunchData();

        // Override emp 1-3 with exact image data
        punchData[1] = {};
        '2026-08-01 01:05PM 01:32PM 07:08PM|2026-08-03 01:02PM 01:35PM 07:10PM|2026-08-04 01:08PM 01:30PM 07:05PM|2026-08-05 01:00PM 01:38PM 07:12PM|2026-08-06 01:10PM 01:33PM 07:08PM|2026-08-07 01:06PM 01:36PM 07:15PM|2026-08-08 01:03PM 01:31PM 07:09PM|2026-08-10 01:07PM 01:34PM 07:11PM|2026-08-11 01:01PM 01:37PM 07:06PM|2026-08-12 01:09PM 01:32PM 07:13PM|2026-08-13 01:04PM 01:35PM 07:07PM|2026-08-14 01:06PM 01:30PM 07:10PM|2026-08-17 01:03PM 01:36PM 07:12PM|2026-08-18 01:08PM 01:31PM 07:09PM|2026-08-19 01:05PM 01:33PM 07:08PM|2026-08-20 07:05PM 07:12PM|2026-08-21 01:04PM 01:35PM 07:08PM|2026-08-24 01:02PM 01:39PM 07:08PM|2026-08-25 01:05PM 01:39PM 07:10PM|2026-08-26 01:05PM 01:33PM 07:12PM|2026-08-27 01:04PM 01:37PM 07:13PM|2026-08-28 01:06PM 01:32PM 07:11PM|2026-08-29 01:03PM 01:34PM 07:09PM|2026-08-31 01:07PM 01:30PM 07:14PM'.split('|').forEach(function(s) {
            var p = s.split(' '),
                k = p[0],
                a = [];
            for (var i = 1; i < p.length; i++) a.push({
                time: p[i]
            });
            punchData[1][k] = a;
        });
        punchData[2] = {};
        '2026-08-01 09:55AM 07:02PM|2026-08-03 09:48AM 07:05PM|2026-08-04 09:52AM 07:08PM|2026-08-05 09:50AM 07:00PM|2026-08-06 09:58AM 07:03PM|2026-08-07 09:45AM 07:10PM|2026-08-08 09:53AM 07:06PM|2026-08-10 09:51AM 07:04PM|2026-08-11 09:47AM 07:09PM|2026-08-12 09:56AM 07:01PM|2026-08-13 09:49AM 07:07PM|2026-08-14 09:54AM 07:05PM|2026-08-17 09:50AM 07:08PM|2026-08-18 09:46AM 07:02PM|2026-08-19 09:52AM 07:06PM|2026-08-20 07:02PM 07:12PM|2026-08-21 09:50AM 07:09PM|2026-08-24 09:53AM 07:08PM|2026-08-25 09:54AM 01:05PM 01:29PM 07:20PM|2026-08-26 09:50AM 01:07PM 01:36PM 07:33PM|2026-08-28 09:51AM 07:05PM|2026-08-29 09:48AM 07:03PM|2026-08-31 09:55AM 07:07PM'.split('|').forEach(function(s) {
            var p = s.split(' '),
                k = p[0],
                a = [];
            for (var i = 1; i < p.length; i++) a.push({
                time: p[i]
            });
            punchData[2][k] = a;
        });
        punchData[3] = {};
        '2026-08-01 10:05AM 06:50PM|2026-08-03 10:02AM 06:55PM|2026-08-04 09:58AM 06:48PM|2026-08-05 10:08AM 06:52PM|2026-08-06 10:00AM 06:45PM|2026-08-07 09:55AM 06:58PM|2026-08-08 10:03AM 06:50PM|2026-08-10 10:01AM 06:53PM|2026-08-11 09:57AM 06:47PM|2026-08-12 10:06AM 06:55PM|2026-08-13 09:59AM 06:50PM|2026-08-14 10:04AM 06:52PM|2026-08-17 10:00AM 06:48PM|2026-08-18 09:56AM 06:55PM|2026-08-19 10:02AM 06:50PM|2026-08-20 09:52AM 03:53PM* 07:06PM|2026-08-21 10:01AM 10:03AM|2026-08-22 11:05AM 04:16PM|2026-08-24 10:03AM 06:56PM|2026-08-25 10:26AM 06:47PM|2026-08-26 10:05AM 06:55PM|2026-08-27 10:06AM 01:42PM|2026-08-28 10:00AM 06:50PM|2026-08-29 09:58AM 06:53PM|2026-08-31 10:04AM 06:48PM'.split('|').forEach(function(s) {
            var p = s.split(' '),
                k = p[0],
                a = [];
            for (var i = 1; i < p.length; i++) {
                if (p[i].indexOf('*') >= 0) a.push({
                    time: p[i].replace('*', ''),
                    warn: true
                });
                else a.push({
                    time: p[i]
                });
            }
            punchData[3][k] = a;
        });

        // Populate branch dropdown
        var branchSelect = document.getElementById('filterBranch');
        branches.forEach(function(b) {
            var o = document.createElement('option');
            o.value = b;
            o.textContent = b;
            branchSelect.appendChild(o);
        });

        // ================================================================
        // STATE
        // ================================================================
        var dates = dateRange('2026-08-01', '2026-08-31');
        var tbody = document.getElementById('pgBody'),
            thead = document.getElementById('punchTableHead');
        var showSelect = document.getElementById('mtShowEntries'),
            pgList = document.getElementById('pgList');
        var pgStart = document.getElementById('mtStart'),
            pgEnd = document.getElementById('mtEnd'),
            pgTotal = document.getElementById('mtTotal');
        var tableWrap = document.getElementById('punchReportTableWrap');
        var currentPage = 1,
            activeFilters = {
                branch: '',
                search: ''
            };

        function esc(v) {
            var d = document.createElement('div');
            d.appendChild(document.createTextNode(String(v)));
            return d.innerHTML;
        }

        // ================================================================
        // MASTER TABLE INIT
        // ================================================================
        var thead = document.getElementById('punchTableHead');
        var h = '<th class="gh-cursor-pointer text-nowrap col-sno-70">S.No</th><th class="gh-cursor-pointer text-nowrap">Employee</th><th class="gh-cursor-pointer text-nowrap">Roles</th>';
        
        var cols = [
            {
                field: 'employee', title: 'Employee', sortable: false,
                render: function(val, row) {
                    return '<div class="d-flex align-items-center gap-2"><img src="./assets/img/' + esc(row.avatar) + '" class="avatar-sm avatar-34"><div><div class="person-name">' + esc(row.name) + '</div><div class="emp-id">' + esc(row.emp_id) + '</div></div></div>';
                }
            },
            {
                field: 'roles', title: 'Roles', sortable: false,
                render: function(val, row) {
                    return '<div><div class="fw-semibold role-name">' + esc(row.role) + '</div><div class="sub-role-name">' + esc(row.sub_role) + '</div></div>';
                }
            }
        ];

        dates.forEach(function(d) {
            var hdr = formatDateHeader(d);
            h += '<th class="date-col-header"><div class="date-label">' + esc(hdr.full) + '</div><div class="day-label">' + esc(hdr.day) + '</div></th>';
            cols.push({
                field: 'date_' + d,
                title: hdr.full + ' ' + hdr.day.substring(0, 3),
                sortable: false,
                render: function(val, row) {
                    var p = punchData[row.id] || {}, ps = p[d] || [];
                    if (!ps.length) {
                        return '<div class="punch-cell" data-emp="' + row.id + '" data-date="' + d + '"><span class="no-punch">&mdash;</span></div>';
                    }
                    var t = '';
                    ps.forEach(function(x) {
                        t += '<span class="punch-time">' + esc(x.time) + '</span>';
                        if (x.warn) t += ' <span class="punch-warn" title="Irregular">&#9888;</span>';
                    });
                    return '<div class="punch-cell" data-emp="' + row.id + '" data-date="' + d + '">' + t + '</div>';
                }
            });
        });
        thead.innerHTML = h;

        function buildRowHtml(row, index) {
            var html = '<tr data-id="' + esc(row.id) + '">';
            html += '<td class="text-nowrap col-sno-70">' + index + '</td>';
            html += '<td class="text-nowrap">' +
                '<div class="d-flex align-items-center gap-2">' +
                    '<img src="./assets/img/' + esc(row.avatar) + '" class="avatar-sm avatar-34">' +
                    '<div>' +
                        '<div class="person-name">' + esc(row.name) + '</div>' +
                        '<div class="emp-id">' + esc(row.emp_id) + '</div>' +
                    '</div>' +
                '</div>' +
            '</td>';
            html += '<td class="text-nowrap">' +
                '<div>' +
                    '<div class="fw-semibold role-name">' + esc(row.role) + '</div>' +
                    '<div class="sub-role-name">' + esc(row.sub_role) + '</div>' +
                '</div>' +
            '</td>';

            dates.forEach(function(d) {
                var p = punchData[row.id] || {}, ps = p[d] || [];
                if (!ps.length) {
                    html += '<td><div class="punch-cell" data-emp="' + row.id + '" data-date="' + d + '"><span class="no-punch">&mdash;</span></div></td>';
                } else {
                    var t = '';
                    ps.forEach(function(x) {
                        t += '<span class="punch-time">' + esc(x.time) + '</span>';
                        if (x.warn) t += ' <span class="punch-warn" title="Irregular">&#9888;</span>';
                    });
                    html += '<td><div class="punch-cell" data-emp="' + row.id + '" data-date="' + d + '">' + t + '</div></td>';
                }
            });

            html += '</tr>';
            return html;
        }

        function renderPunchTable(list) {
            var dataList = list || employees;
            if (!dataList.length) {
                tbody.innerHTML = '<tr class="no-record-row"><td colspan="' + (3 + dates.length) + '" class="text-center text-muted py-4">No records found</td></tr>';
            } else {
                tbody.innerHTML = dataList.map(function(emp, i) {
                    return buildRowHtml(emp, i + 1);
                }).join('');
            }

            var tableEl = document.getElementById('myReqTable') || document.getElementById('punchReportTable');
            if (tableEl) {
                if (tableEl.autoTable) {
                    tableEl.autoTable.refresh();
                } else if (window.AutoMasterTable) {
                    window.AutoMasterTable.init(tableEl);
                }
            }
        }

        renderPunchTable(employees);

        document.getElementById('pgBody').addEventListener('click', function(e) {
            var cell = e.target.closest('.punch-cell');
            if (cell) {
                var empId = parseInt(cell.getAttribute('data-emp'), 10);
                var dateStr = cell.getAttribute('data-date');
                if (empId) openAttendanceLog(empId, dateStr);
            }
        });

        // Branch filter
        document.getElementById('searchBtn').addEventListener('click', function() {
            var bv = document.getElementById('filterBranch').value;
            activeFilters.branch = bv;
            
            var list = document.getElementById('activeFiltersList'),
                bar = document.getElementById('activeFiltersBar');
            list.innerHTML = '';
            
            if (bv) {
                var ch = document.createElement('span');
                ch.className = 'filter-chip';
                ch.innerHTML = '<span class="chip-key">Branch:</span> ' + esc(bv) + ' <button type="button" class="chip-close">&times;</button>';
                ch.querySelector('.chip-close').addEventListener('click', function() {
                    document.getElementById('filterBranch').value = '';
                    activeFilters.branch = '';
                    ch.classList.add('removing');
                    setTimeout(function() {
                        ch.remove();
                        if (!list.children.length) bar.classList.remove('show');
                        renderPunchTable(employees);
                    }, 220);
                });
                list.appendChild(ch);
                bar.classList.add('show');
                
                var filtered = employees.filter(function(e) { return e.branch === bv; });
                renderPunchTable(filtered);
            } else {
                bar.classList.remove('show');
                renderPunchTable(employees);
            }
        });

        document.getElementById('activeFiltersClearAll').addEventListener('click', function() {
            document.getElementById('filterBranch').value = '';
            activeFilters.branch = '';
            document.getElementById('activeFiltersList').innerHTML = '';
            document.getElementById('activeFiltersBar').classList.remove('show');
            var searchInput = document.querySelector('.mt-search-input');
            if (searchInput) {
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('input'));
            }
            renderPunchTable(employees);
        });

        // ================================================================
        // ATTENDANCE LOG OFFCANVAS  (common refresh-animation fix — FINAL)
        // ================================================================
        var alOffcanvasEl = document.getElementById('attendanceLogOffcanvas');

        // alReqSeq prevents a mid-hide `hidden.bs.offcanvas` handler from
        // wiping fresher data that was populated while the hide was still animating.
        var alReqSeq = 0;

        // Get Bootstrap's SINGLETON offcanvas instance — never new-up another.
        // Bootstrap stores instances on the element; this avoids stale references.
        function getAlInstance() {
            if (!alOffcanvasEl) return null;
            return bootstrap.Offcanvas.getOrCreateInstance(alOffcanvasEl);
        }

        // ----------------------------------------------------------------
        // Delegated handlers: bound ONCE. No leak, no re-attaches.
        // ----------------------------------------------------------------
        if (alOffcanvasEl) {
            var alBody = document.getElementById('alBody');

            /* Context for Add Punch modal */
            var apCurrentEmpId = null;
            var apCurrentDate = null;
            var apEditMode = false;
            var apEditIndex = -1;

            alBody.addEventListener('click', function(e) {
                var toggleBtn = e.target.closest('.al-punch-more[data-action="toggle"]');
                if (toggleBtn) {
                    e.stopPropagation();
                    var dd = toggleBtn.nextElementSibling;
                    alBody.querySelectorAll('.al-punch-dropdown.show').forEach(function(d) {
                        if (d !== dd) d.classList.remove('show');
                    });
                    if (dd) dd.classList.toggle('show');
                    return;
                }

                /* Add Punch button click -> open modal */
                var addPunchBtn = e.target.closest('.al-add-punch');
                if (addPunchBtn) {
                    e.stopPropagation();
                    apEditMode = false;
                    apEditIndex = -1;
                    openAddPunchModal();
                    return;
                }

                /* Edit punch from three-dot dropdown */
                var editBtn = e.target.closest('.al-punch-dropdown-item[data-action="edit"]');
                if (editBtn) {
                    e.stopPropagation();
                    editBtn.closest('.al-punch-dropdown').classList.remove('show');
                    /* Find the punch row and its index */
                    var punchRow = editBtn.closest('.al-punch-row');
                    if (punchRow) {
                        var punchRows = alBody.querySelectorAll('.al-punch-row');
                        var idx = Array.from(punchRows).indexOf(punchRow);
                        if (idx >= 0) {
                            apEditMode = true;
                            apEditIndex = idx;
                            openAddPunchModal();
                        }
                    }
                    return;
                }

                if (!e.target.closest('.al-punch-dropdown')) {
                    alBody.querySelectorAll('.al-punch-dropdown.show').forEach(function(d) {
                        d.classList.remove('show');
                    });
                }
            });

            function openAddPunchModal() {
                var emp = employees.find(function(e) { return e.id === apCurrentEmpId; });
                if (!emp) return;
                var hdr = apCurrentDate ? formatDateHeader(apCurrentDate) : { full: '—' };
                document.getElementById('apDate').textContent = hdr.full;
                document.getElementById('apAvatar').src = './assets/img/' + (emp.avatar || 'profile-1.jpg');
                if (apEditMode) {
                    document.querySelector('#addPunchModal .ap-header .name').textContent = 'Edit Punch';
                    document.querySelector('#addPunchModal .ap-header .sub').innerHTML = '<span>Edit Punch</span>';
                } else {
                    document.querySelector('#addPunchModal .ap-header .name').textContent = emp.name;
                    document.querySelector('#addPunchModal .ap-header .sub').innerHTML = '<span>' + emp.emp_id + '</span> &middot; <span>' + emp.role + '</span>';
                }
                /* Reset to In type */
                document.getElementById('apPunchIn').checked = true;
                document.getElementById('apInTimeRow').classList.remove('ap-out-row-hidden');
                document.getElementById('apOutTimeRow').classList.add('ap-out-row-hidden');
                /* Edit mode: pre-fill with existing punch time */
                if (apEditMode && apEditIndex >= 0) {
                    var ps = (punchData[apCurrentEmpId] || {})[apCurrentDate] || [];
                    var punch = ps[apEditIndex];
                    if (punch) {
                        document.getElementById('apInTime').value = punch.time;
                    }
                } else {
                    document.getElementById('apInTime').value = '09:00 AM';
                    document.getElementById('apOutTime').value = '06:00 PM';
                }
                /* Init time pickers (created after DOMContentLoaded) */
                document.querySelectorAll('#addPunchModal .time-picker').forEach(function(tp) {
                    if (!tp._timePickerInit) initTimePicker(tp);
                });
                var modalEl = document.getElementById('addPunchModal');
                var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.show();
            }

            /* Reset edit mode when modal is closed (cancel, X, or backdrop) */
            document.getElementById('addPunchModal').addEventListener('hidden.bs.modal', function() {
                apEditMode = false;
                apEditIndex = -1;
            });

            /* In / Out toggle handler */
            document.querySelectorAll('input[name="apPunchType"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    var isIn = this.value === 'in';
                    document.getElementById('apInTimeRow').classList.toggle('ap-out-row-hidden', !isIn);
                    document.getElementById('apOutTimeRow').classList.toggle('ap-out-row-hidden', isIn);
                });
            });

            /* Preset time buttons */
            document.querySelectorAll('.ap-preset').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var targetId = this.getAttribute('data-target');
                    var timeVal = this.getAttribute('data-time');
                    var input = document.getElementById(targetId);
                    if (input) {
                        input.value = timeVal;
                        input.dispatchEvent(new Event('input', { bubbles: true }));
                    }
                });
            });

            /* Save punch button */
            document.getElementById('apSaveBtn').addEventListener('click', function() {
                var isIn = document.getElementById('apPunchIn').checked;
                var time = isIn ? document.getElementById('apInTime').value : document.getElementById('apOutTime').value;
                if (!apCurrentEmpId || !apCurrentDate || !time) return;
                /* Time is already in 'HH:MM AM/PM' format from the TimePicker */
                var displayTime = time.trim();
                if (!displayTime) return;
                /* Add to punchData */
                if (!punchData[apCurrentEmpId]) punchData[apCurrentEmpId] = {};
                if (!punchData[apCurrentEmpId][apCurrentDate]) punchData[apCurrentEmpId][apCurrentDate] = [];
                var ps = punchData[apCurrentEmpId][apCurrentDate];
                if (apEditMode && apEditIndex >= 0 && apEditIndex < ps.length) {
                    /* Edit mode: update existing punch */
                    ps[apEditIndex].time = displayTime;
                } else {
                    /* Add mode: add new punch */
                    if (isIn) {
                        ps.unshift({ time: displayTime });
                    } else {
                        ps.push({ time: displayTime });
                    }
                }
                /* Show saved state */
                this.classList.add('ap-saved');
                var self = this;
                setTimeout(function() {
                    self.classList.remove('ap-saved');
                    bootstrap.Modal.getInstance(document.getElementById('addPunchModal')).hide();
                    /* Reset edit mode */
                    apEditMode = false;
                    apEditIndex = -1;
                    /* Refresh the offcanvas */
                    openAttendanceLog(apCurrentEmpId, apCurrentDate);
                }, 800);
            });

            // shown.bs.offcanvas: after slide-in fully complete. We keep as future hook
            // (al-once is now added BEFORE show() — see openAttendanceLog)
            // alOffcanvasEl.addEventListener('shown.bs.offcanvas', function() {});

            // Before slide-out starts: strip .al-once so no animation state lingers.
            alOffcanvasEl.addEventListener('hide.bs.offcanvas', function() {
                alOffcanvasEl.classList.remove('al-once');
            });

            // hidden fires AFTER slide-out finishes. If NO newer request has
            // populated alBody since the hide started, it is safe to clear.
            alOffcanvasEl.addEventListener('hidden.bs.offcanvas', function() {
                var stamped = parseInt(alBody.getAttribute('data-req-seq') || '0', 10);
                if (stamped === alReqSeq) {
                    // SAFE clear — no newer populate ran while hiding
                    alBody.classList.remove('al-loading');
                    alBody.innerHTML = '';
                    alBody.removeAttribute('data-req-seq');
                }
                // Always sweep stale Bootstrap transition classes here.
                // This is the "anti double-refresh" safety net: next open()
                // starts 100% clean of showing/show/hiding/backdrop leftovers.
                alOffcanvasEl.classList.remove('showing', 'hiding', 'al-once');
                alOffcanvasEl.style.visibility = '';
            });
        }

        // Synchronous body populate. NO setTimeout, NO rAF wrappers on content.
        // CRITICAL: strips .al-once BEFORE touching innerHTML so the global
        // fadeSlideUp animation in app.css never replays on repopulate.
        // (If we're doing a fresh open, caller will re-ADD al-once AFTER set + BEFORE show().)
        function setAlBodyHtml(html) {
            var body = document.getElementById('alBody');
            if (!body) return;

            // Kill animation permission BEFORE innerHTML set.
            // Once al-once is removed, our CSS override forces:
            //   animation: none !important; opacity: 1 !important; transform: none !important;
            // So swap is instant and invisible. No "again animation refresh".
            if (alOffcanvasEl) alOffcanvasEl.classList.remove('al-once');

            body.classList.remove('al-loading');
            body.innerHTML = html;
            body.setAttribute('data-req-seq', String(alReqSeq));
        }

        function computeBreakTime(outTime, inTime) {
            // Parse times and compute difference
            function parseT(t) {
                var m = t.match(/(\d+):(\d+)\s*(AM|PM)/i);
                if (!m) return null;
                var h = parseInt(m[1], 10),
                    mn = parseInt(m[2], 10),
                    ap = m[3].toUpperCase();
                if (ap === 'PM' && h !== 12) h += 12;
                if (ap === 'AM' && h === 12) h = 0;
                return h * 60 + mn;
            }
            var o = parseT(outTime),
                i = parseT(inTime);
            if (o === null || i === null) return null;
            var diff = i - o;
            if (diff < 0) diff += 24 * 60;
            var bh = Math.floor(diff / 60),
                bm = diff % 60;
            return String(bh).padStart(2, '0') + 'h ' + String(bm).padStart(2, '0') + 'm';
        }

        function getStatusBadge(empId, dateStr) {
            var p = punchData[empId] || {};
            var ps = p[dateStr] || [];
            var dt = new Date(dateStr + 'T00:00:00');
            var dow = dt.getDay();
            if (dow === 0 || (dow === 6 && empId % 3 === 0)) return {
                cls: 'weekoff',
                text: 'Week Off'
            };
            if (ps.length === 0) return {
                cls: 'absent',
                text: 'Absent'
            };
            // Determine status based on punch count and times
            if (ps.length === 2) {
                // Check if total hours < 5 => half day
                var inT = ps[0].time,
                    outT = ps[1].time;

                function parseM(t) {
                    var m = t.match(/(\d+):(\d+)\s*(AM|PM)/i);
                    if (!m) return 0;
                    var h = parseInt(m[1], 10),
                        mn = parseInt(m[2]),
                        ap = m[3].toUpperCase();
                    if (ap === 'PM' && h !== 12) h += 12;
                    if (ap === 'AM' && h === 12) h = 0;
                    return h * 60 + mn;
                }
                var diff = parseM(outT) - parseM(inT);
                if (diff < 0) diff += 1440;
                if (diff < 360) return {
                    cls: 'half-day',
                    text: 'Half Day'
                };
            }
            return {
                cls: 'full-day',
                text: 'Full Day'
            };
        }

        function openAttendanceLog(empId, dateStr) {
            /* Store context for Add Punch modal */
            apCurrentEmpId = empId;
            apCurrentDate = dateStr;
            var emp = employees.find(function(e) {
                return e.id === empId;
            });
            if (!emp) return;
            var p = punchData[empId] || {};

            document.getElementById('alTitle').textContent = emp.name;
            document.getElementById('alSub').textContent = emp.role;

            var ps0 = p[dateStr] || [];
            var hdr0 = formatDateHeader(dateStr);
            var status0 = getStatusBadge(empId, dateStr);
            var dt0 = new Date(dateStr + 'T00:00:00');
            var isOff0 = (dt0.getDay() === 0 || (dt0.getDay() === 6 && empId % 3 === 0));

            // Day total hours (paired punches)
            var dayMin = 0;
            for (var k = 0; k + 1 < ps0.length; k += 2) {
                (function(a, b) {
                    function parseM(t) {
                        var m = t.match(/(\d+):(\d+)\s*(AM|PM)/i);
                        if (!m) return 0;
                        var h = parseInt(m[1], 10),
                            mn = parseInt(m[2]),
                            ap = m[3].toUpperCase();
                        if (ap === 'PM' && h !== 12) h += 12;
                        if (ap === 'AM' && h === 12) h = 0;
                        return h * 60 + mn;
                    }
                    var diff = parseM(b) - parseM(a);
                    if (diff < 0) diff += 1440;
                    dayMin += diff;
                })(ps0[k].time, ps0[k + 1].time);
            }
            var dayH = Math.floor(dayMin / 60),
                dayM = dayMin % 60;

            var html = '<div class="al-hero">';
            html += '<div><div class="al-hero-date">' + esc(hdr0.full) + '</div><div class="al-hero-day">' + esc(hdr0.day) + '</div></div>';
            if (!isOff0 && ps0.length > 0 && dayMin > 0) {
                html += '<div class="al-hero-hours"><div class="al-hero-hours-val">' + dayH + 'h ' + dayM + 'm</div><div class="al-hero-hours-label">Hours Logged</div></div>';
            }
            html += '</div>';
            html += '<div class="al-status-badge-wrap"><span class="al-status-badge ' + status0.cls + '"><i class="bi ' + (status0.cls === 'half-day' ? 'bi-hourglass-split' : status0.cls === 'full-day' ? 'bi-check-circle-fill' : status0.cls === 'absent' ? 'bi-x-circle-fill' : 'bi-moon-stars-fill') + '"></i>' + status0.text + '</span></div>';

            html += '<div class="al-section-label">Punch Timeline</div>';
            html += '<div class="al-timeline">';

            // Only show the clicked date
            (function() {
                var d = dateStr;
                var ps = p[d] || [];
                var dt = new Date(d + 'T00:00:00');
                var dow = dt.getDay();
                var isOff = (dow === 0 || (dow === 6 && empId % 3 === 0));

                html += '<div class="al-date-group">';

                if (isOff || ps.length === 0) {
                    html += '<div class="al-empty"><i class="bi bi-clock-history"></i> No punches recorded for this day</div>';
                } else {
                    // Render each punch as In/Out pairs
                    for (var i = 0; i < ps.length; i++) {
                        var isIn = (i % 2 === 0);
                        var nodeCls = isIn ? 'in' : 'out';
                        var labelCls = isIn ? 'in' : 'out';
                        var arrow = isIn ? '<i class="bi bi-box-arrow-in-right"></i>' : '<i class="bi bi-box-arrow-right"></i>';
                        var labelText = isIn ? 'In' : 'Out';
                        var timeVal = ps[i].time.replace(/\s+/, ''); // '01:05 PM' -> '01:05PM'
                        var isWarn = !!ps[i].warn;
                        var dotIcon = isIn ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';

                        html += '<div class="al-timeline-item">';
                        html += '<div class="al-timeline-dot ' + nodeCls + '">' + dotIcon + '</div>';
                        html += '<div class="al-timeline-connector"></div>';
                        html += '<div class="al-punch-row ' + nodeCls + '">';
                        // html += '<span class="al-punch-time-tag">PUNCH ' + (i + 1) + '</span>';
                        html += '<div class="al-punch-node ' + nodeCls + '">' + arrow + '</div>';
                        html += '<div class="al-punch-text"><span class="al-punch-label ' + labelCls + '">' + labelText + '</span></div>';
                        html += '<input type="text" class="al-punch-time-input" value="' + esc(timeVal) + '" readonly>';
                        if (isWarn) html += '<span class="punch-warn punch-warn-mr" title="Irregular punch">&#9888;</span>';
                        html += '<div class="al-punch-actions">';
                        html += '<button type="button" class="al-punch-more" data-action="toggle"><i class="bi bi-three-dots"></i></button>';
                        html += '<div class="al-punch-dropdown">';
                        html += '<button type="button" class="al-punch-dropdown-item" data-action="edit"><i class="bi bi-pencil-square me-2"></i>Edit</button>';
                        html += '<button type="button" class="al-punch-dropdown-item al-punch-dropdown-danger" data-action="delete"><i class="bi bi-trash3 me-2"></i>Delete</button>';
                        html += '</div></div>';
                        html += '</div>';
                        html += '</div>';

                        // After an Out, show break time if next is In
                        if (!isIn && i + 1 < ps.length) {
                            var prevOut = ps[i].time;
                            var nextIn = ps[i + 1] ? ps[i + 1].time : '';
                            var bt = computeBreakTime(prevOut, nextIn);
                            if (bt) html += '<div class="al-break-badge"><i class="bi bi-cup-hot"></i> Break Time : ' + esc(bt) + '</div>';
                        }
                    }
                    // Add punch button
                    html += '<button type="button" class="al-add-punch" title="Add Punch"><i class="bi bi-plus-lg"></i> Add Punch</button>';
                }

                html += '</div>';
            })();

            html += '</div>';

            // Quick Actions section
            html += '<div class="al-section">';
            html += '<button type="button" class="al-section-toggle open" onclick="this.classList.toggle(\'open\');this.nextElementSibling.classList.toggle(\'open\');">';
            html += '<span><i class="bi bi-lightning-charge-fill me-2 text-brand-primary"></i>Quick Actions</span><i class="bi bi-chevron-up chevron"></i></button>';
            html += '<div class="al-section-body open"><div class="al-section-body-inner">';
            html += '<div class="d-flex flex-wrap gap-2">';
            html += '<button class="al-qa-btn">Mark Full Day</button>';
            html += '<button class="al-qa-btn">Add Penalty</button>';
            html += '<button class="al-qa-btn">Mark Half Day</button>';
            html += '<button class="al-qa-btn">Mark Absent</button>';
            html += '<button class="al-qa-btn">Add Working Hours</button>';
            html += '<button class="al-qa-btn">Convert To Paid Leave</button>';
            html += '<button class="al-qa-btn">Mark Week Off</button>';
            html += '</div></div></div></div>';

            // Insight section
            html += '<div class="al-section">';
            html += '<button type="button" class="al-section-toggle open" onclick="this.classList.toggle(\'open\');this.nextElementSibling.classList.toggle(\'open\');">';
            html += '<span><i class="bi bi-bar-chart-fill me-2 text-brand-primary"></i>Insight (This Month)</span><i class="bi bi-chevron-up chevron"></i></button>';
            html += '<div class="al-section-body open"><div class="al-section-body-inner">';

            // Compute stats
            var totalDays = 0,
                totalPunches = 0,
                totalMin = 0;
            dates.forEach(function(d) {
                var ps = p[d] || [];
                if (ps.length) totalDays++;
                totalPunches += ps.length;
                // Sum hours for paired punches
                for (var i = 0; i + 1 < ps.length; i += 2) {
                    function parseM(t) {
                        var m = t.match(/(\d+):(\d+)\s*(AM|PM)/i);
                        if (!m) return 0;
                        var h = parseInt(m[1], 10),
                            mn = parseInt(m[2]),
                            ap = m[3].toUpperCase();
                        if (ap === 'PM' && h !== 12) h += 12;
                        if (ap === 'AM' && h === 12) h = 0;
                        return h * 60 + mn;
                    }
                    var diff = parseM(ps[i + 1].time) - parseM(ps[i].time);
                    if (diff < 0) diff += 1440;
                    totalMin += diff;
                }
            });
            var totalH = Math.floor(totalMin / 60),
                totalM = totalMin % 60;

            html += '<div class="al-stat-grid">';
            html += '<div class="al-stat-card"><i class="bi bi-calendar-check"></i><div class="al-stat-val">' + totalDays + '</div><div class="al-stat-label">WORKING DAYS</div></div>';
            html += '<div class="al-stat-card"><i class="bi bi-fingerprint"></i><div class="al-stat-val">' + totalPunches + '</div><div class="al-stat-label">TOTAL PUNCHES</div></div>';
            html += '<div class="al-stat-card"><i class="bi bi-clock-history"></i><div class="al-stat-val">' + totalH + 'h ' + totalM + 'm</div><div class="al-stat-label">TOTAL HOURS</div></div>';
            html += '</div></div></div></div>';

            // ---------- FINAL FIX v2: populate BEFORE show() + gate fadeSlideUp once ----------
            ++alReqSeq;

            // 1) Clean any lingering Bootstrap transition classes BEFORE we touch anything.
            //    This guarantees the guard checks below reflect real state.
            if (alOffcanvasEl && !alOffcanvasEl.classList.contains('show')) {
                alOffcanvasEl.classList.remove('showing', 'hiding');
            }

            // 2) Populate body synchronously. setAlBodyHtml STRIPS .al-once so
            //    during repop (offcanvas already visible) animation never replays.
            setAlBodyHtml(html);

            // 3) Decide if show() is actually needed.
            //    show() ONLY when element has ZERO Bootstrap lifecycle classes.
            //    Otherwise: already visible / mid-transition → do NOT re-trigger.
            var needsShow = alOffcanvasEl &&
                !alOffcanvasEl.classList.contains('show')   &&
                !alOffcanvasEl.classList.contains('showing')&&
                !alOffcanvasEl.classList.contains('hiding');

            if (needsShow) {
                // CRITICAL ORDER for the user-reported "cards appear static then animate":
                //   a) Add .al-once BEFORE show() — this is the animation GATE class
                //   b) .fadeSlideUp has `backwards` fill-mode — so when Bootstrap adds .show
                //      on the offcanvas root, the child <div class="p-3 py-2 border rounded mb-2">
                //      elements already match the gated animation selector, fill-mode keeps
                //      them at opacity:0 / translate:14px UNTIL their nth-child delay fires.
                //   c) Then show() triggers slide-in + fadeSlideUp stagger simultaneously —
                //      never first shows static cards, then "refreshes" them.
                alOffcanvasEl.classList.add('al-once');
                var inst = getAlInstance();
                inst && inst.show();
            }
            // If needsShow=false (offcanvas already open) → .al-once is NOT added back,
            // so the CSS kill-switch keeps: animation:none !important on new cards →
            // instantly rendered, zero replay.
        }

    })();
</script>