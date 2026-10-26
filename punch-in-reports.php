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

 
<script src="./assets/js/pages/punch-in-reports.js?v=<?php echo time(); ?>"></script>